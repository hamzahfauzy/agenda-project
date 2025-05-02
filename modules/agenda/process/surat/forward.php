<?php

use Core\Database;

// init table fields
$tableName  = 'ag_surat';
$db = new Database;
$surat = $db->single($tableName, [
    'id' => $_GET['id']
]);

$userIds = [];

if(isset($_POST['user_id']))
{
    $db->query = "SELECT user_roles.user_id, ag_pejabat.jabatan, ag_pejabat.nama FROM roles LEFT JOIN user_roles ON user_roles.role_id = roles.id LEFT JOIN ag_pejabat ON ag_pejabat.user_id = user_roles.user_id WHERE ag_pejabat.user_id = $_POST[user_id]";
    $userIds[] = $db->exec('single');
}

forwardFlow($surat, $userIds);

if(isset($_POST['catatan']))
{
    $db->insert('ag_catatan_surat', [
        'created_by' => auth()->id,
        'surat_id' => $_GET['id'],
        'deskripsi' => $_POST['catatan']
    ]);
}

set_flash_msg(['success'=>"Surat berhasil diteruskan"]);

header('location:'.routeTo('agenda/surat/view', [
    'id' => $_GET['id']
]));
die();