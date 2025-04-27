<?php

use Core\Database;

$db = new Database;
$pendamping = $_POST['pendamping'];
foreach($pendamping as $p)
{
    $db->insert('ag_pendamping_kegiatan', [
        'kegiatan_id' => $data->id,
        'pejabat_id' => $p
    ]);
}