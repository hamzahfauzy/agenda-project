<?php

use Core\Database;

$db = new Database;
$surat = $db->single('ag_surat', [
    'id' => $_GET['id']
]);

$data = $_POST;
$data['nama'] = $surat->perihal;
$data['created_by'] = auth()->id;
$data['instruksi'] = !empty($data['instruksi']) ? implode(',',$data['instruksi']) : '';
unset($data['_token']);
unset($data['pendamping']);

if(hasRole(auth()->id, 'Ajudan'))
{
    $db->query = "SELECT user_id FROM user_roles WHERE role_id = (SELECT id FROM roles WHERE name = 'Bupati')";
    $user = $db->exec('single');
    if($user)
    {
        $data['created_by'] = $user->user_id;
    }
}

$kegiatan = $db->insert('ag_kegiatan', $data);

$pejabat = $db->single('ag_pejabat', [
    'id' => $kegiatan->pejabat_id
]);

$dt = [
    'target' => $pejabat->user_id,
    'message' => 'Ada kegiatan baru yang harus anda hadiri',
    'url' => routeTo('crud/index', ['table' => 'ag_kegiatan', 'filter' => ['id' => $kegiatan->id]])
];

$socketUrl = env('SOCKET_URL', 'http://localhost:3000') . env('SOCKET_PATH', '');
simple_curl($socketUrl . '/broadcast', 'POST', http_build_query($dt), [
    'content-type: application/x-www-form-urlencoded'
]);

foreach($_POST['pendamping'] as $pendamping)
{
    $db->insert('ag_pendamping_kegiatan', [
        'kegiatan_id' => $kegiatan->id,
        'pejabat_id' => $pendamping
    ]);

    $pejabat_pendamping = $db->single('ag_pejabat', ['id' => $pendamping]);

    if($pendamping != $kegiatan->pejabat_id)
    {
        $dt['target'] = $pejabat_pendamping->user_id;
        
        simple_curl($socketUrl . '/broadcast', 'POST', http_build_query($dt), [
            'content-type: application/x-www-form-urlencoded'
        ]);
    }
}

$flow = $db->single('ag_surat_flow', [
    'surat_id' => $_GET['id'],
    'user_id' => $data['created_by'],
]);

$logs = json_decode($flow->logs);
$logs[] = [
    'status' => 'Disposisi',
    'jabatan' => $pejabat->jabatan,
    'nama_pejabat' => $pejabat->nama,
    'created_at' => date('Y-m-d H:i:s')
];

$db->update('ag_surat_flow', [
    'logs' => json_encode($logs),
    'updated_by' => $data['created_by'],
], [
    'id' => $flow->id
]);

set_flash_msg(['success'=>"Surat berhasil di disposisikan"]);

header('location:'.routeTo('agenda/surat/view', [
    'id' => $_GET['id']
]));
die();