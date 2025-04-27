<?php

use Core\Database;

$pendamping = $data['pendamping'];

unset($data['pendamping']);

$db = new Database;
$db->delete('ag_pendamping_kegiatan', [
    'kegiatan_id' => $_GET['id']
]);

foreach($pendamping as $p)
{
    $db->insert('ag_pendamping_kegiatan', [
        'kegiatan_id' => $_GET['id'],
        'pejabat_id' => $p
    ]);
}