<?php

use Core\Database;

$userIds = [];
$db = new Database;

if(hasRole(auth()->id, 'Ajudan'))
{
    $db->query = "SELECT user_roles.user_id, ag_pejabat.jabatan, ag_pejabat.nama FROM roles LEFT JOIN user_roles ON user_roles.role_id = roles.id LEFT JOIN ag_pejabat ON ag_pejabat.user_id = user_roles.user_id WHERE roles.name = 'Bupati'";
    $userIds[] = $db->exec('single');
}

$_POST['kegiatan']['surat_id'] = $data->id;
$db->insert('ag_kegiatan', $_POST['kegiatan']);

forwardFlow($data, $userIds);