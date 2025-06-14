<?php

use Core\Database;
use Core\Page;
use Core\Utility;

function do_upload($file, $folder, $field = false, $multiple = false)
{
    $parent_path = Utility::parentPath();
    $filename = $file['name'];
    $tmp      = $file['tmp_name'];
    if($field)
    {
        $filename = $filename[$field];
        $tmp      = $tmp[$field];
    }

    if($multiple)
    {
        $files = [];
        foreach($filename as $index => $f)
        {
            $ext  = pathinfo($f, PATHINFO_EXTENSION);
            $name = strtotime('now').rand(0, strtotime('now')).'.'.$ext;
            $file_ = $folder.'/'.$name;
            copy($tmp[$index], $parent_path . 'storage/media/'.$file_);
            $files[] = 'storage/' . $file_;
        }

        return $files;
    }
    else
    {
        $ext  = pathinfo($filename, PATHINFO_EXTENSION);
        $name = strtotime('now').rand(0, strtotime('now')).'.'.$ext;
        $file = $folder.'/'.$name;
        copy($tmp, $parent_path .  'storage/media/'.$file);
        return  'storage/' . $file;
    }

    return false;

}

function tgl_indo($raw, $time = false){
    $tanggal = date('Y-m-d', strtotime($raw));
	$bulan = array (
		1 =>   'Januari',
		'Februari',
		'Maret',
		'April',
		'Mei',
		'Juni',
		'Juli',
		'Agustus',
		'September',
		'Oktober',
		'November',
		'Desember'
	);
	$pecahkan = explode('-', $tanggal);
 
	return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0].($time ? ' '.date('H:i', strtotime($raw)) : '');
}

function getFlow()
{
    return ['Kabag Umum','Asisten','Sekda','Wakil Bupati','Bupati'];
}

function getNextFlow($current)
{
    $flow = getFlow();
    $index = array_search($current, $flow);
    if(count($flow)-1 ==  $index) return false;

    return $flow[$index+1];
}

function forwardFlow($surat, $userIds = [])
{
    $db = new Database;
    $userIds = empty($userIds) ? forwardReceivers($surat) : $userIds;

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

        $socketUrl = env('SOCKET_URL', 'http://localhost:3000') . env('SOCKET_PATH', '');
        simple_curl($socketUrl . '/broadcast', 'POST', http_build_query($dt), [
            'content-type: application/x-www-form-urlencoded'
        ]);
    }

    $db->update('ag_surat', [
        'record_status' => 'DITERUSKAN'
    ], [
        'id' => $surat->id
    ]);
}

function forwardReceivers($surat)
{
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
        $db = new Database;
        $db->query = "SELECT user_roles.user_id, ag_pejabat.jabatan, ag_pejabat.nama FROM roles LEFT JOIN user_roles ON user_roles.role_id = roles.id LEFT JOIN ag_pejabat ON ag_pejabat.user_id = user_roles.user_id WHERE roles.name = '$flow'";
        return $db->exec('all');
    }

    return [];

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
$socketPath = env('SOCKET_PATH', '');
$socketIoPath = $socketPath . env('SOCKET_IO_PATH', '');
Page::pushFoot('<script>window.SOCKET_URL = "'.$socketUrl.'"; window.SOCKET_PATH= "'.$socketIoPath.'";</script>');