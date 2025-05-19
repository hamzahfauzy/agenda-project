<?php

use Core\Database;

$pendamping = $data['pendamping'];
$pelaksana = $data['pelaksana'];

unset($data['pendamping']);
unset($data['pelaksana']);

$data['instruksi'] = implode(',', $data['instruksi']);

$db = new Database;
$db->delete('ag_pendamping_kegiatan', [
    'kegiatan_id' => $_GET['id']
]);

foreach($pendamping as $p)
{
    $db->insert('ag_pendamping_kegiatan', [
        'kegiatan_id' => $_GET['id'],
        'pejabat_id' => $p,
        'record_type' => 'PENDAMPING'
    ]);
}

foreach($pelaksana as $p)
{
    $db->insert('ag_pendamping_kegiatan', [
        'kegiatan_id' => $_GET['id'],
        'pejabat_id' => $p,
        'record_type' => 'PELAKSANA'
    ]);
}