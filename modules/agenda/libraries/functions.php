<?php

use Core\Database;
use Core\Page;

function getFlow()
{
    return ['Asisten','Sekda','Bupati'];
}

function getNextFlow($current)
{
    $flow = getFlow();
    $index = array_search($current, $flow);
    if(end($flow) ==  $index) return false;

    return $flow[$index+1];
}

function forwardFlow($surat)
{
    // get surat flow
    $db = new Database;
    $db->query = "SELECT 
                    ag_surat_flow.* FROM ag_surat_flow 
                    WHERE ag_surat_flow.surat_id = $surat->id 
                    ORDER BY ag_surat_flow.id DESC";
    $suratFlow = $db->exec('single');
    $flow = getFlow();

    if(empty($suratFlow))
    {
        // send to first
        $flow = $flow[0];
    }
    else
    {
        $roles = get_roles($suratFlow->user_id);
        $roles = array_column((array) $roles, 'name');
        $roleInFlow = null;
        foreach($flow as $f)
        {
            if(in_array($f, $roles))
            {
                $roleInFlow = $f;
                break;
            }
        }

        $flow = getNextFlow($roleInFlow);
    }

    if($flow)
    {
        // get users when role in flow
        $db->query = "SELECT user_roles.user_id, ag_pejabat.jabatan, ag_pejabat.nama FROM roles LEFT JOIN user_roles ON user_roles.role_id = roles.id LEFT JOIN ag_pejabat ON ag_pejabat.user_id = user_roles.user_id WHERE roles.name = '$flow'";
        $userIds = $db->exec('all');
    
        foreach($userIds as $user)
        {
            $db->insert('ag_surat_flow', [
                'surat_id' => $surat->id,
                'user_id' => $user->user_id,
                'created_by' => auth()->id,
                'logs' => json_encode([
                    [
                        'status' => 'Diteruskan',
                        'jabatan' => $user->jabatan,
                        'nama_pejabat' => $user->nama,
                        'created_at' => date('Y-m-d H:i:s')
                    ]
                ])
            ]);

            $dt = [
                'target' => $user->user_id,
                'message' => 'Ada surat masuk perihal ' . $surat->perihal . ' yang harus anda baca.',
                'url' => routeTo('agenda/surat/view', ['id' => $surat->id])
            ];

            simple_curl(env('SOCKET_URL', 'http://localhost:3000') . '/broadcast', 'POST', http_build_query($dt), [
                'content-type: application/x-www-form-urlencoded'
            ]);
        }
    }
    
}

$auth = auth();
$db = new Database;
if($auth)
{
    $employee = $db->single('ag_pejabat', [
        'user_id' => $auth->id
    ]);
    
    if(!empty($employee))
    {
        $_SESSION['employee'] = $employee;
    
        Page::pushFoot('<script>window.employee = '.json_encode($employee).'</script>');
        Page::pushFoot('<script src="https://cdn.socket.io/4.8.1/socket.io.min.js" integrity="sha384-mkQ3/7FUtcGyoppY6bz/PORYoGqOl7/aSUMn2ymDOJcapfS6PHqxhRTMh1RR0Q6+" crossorigin="anonymous"></script>');
        Page::pushFoot('<script src="/assets/agenda/js/socket.js"></script>');
    }
}

$socketUrl = env('SOCKET_URL', 'http://localhost:3001');
Page::pushFoot('<script>window.SOCKET_URL = "'.$socketUrl.'";</script>');