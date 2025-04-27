<?php

use Core\Database;

// init table fields
$tableName  = 'ag_surat';
$db = new Database;
$surat = $db->single($tableName, [
    'id' => $_GET['id']
]);

forwardFlow($surat);

set_flash_msg(['success'=>"Surat berhasil diteruskan"]);

header('location:'.routeTo('agenda/surat/view', [
    'id' => $_GET['id']
]));
die();