<?php

use Core\Database;

$userIds = [];

if(hasRole(auth()->id, 'Ajudan'))
{
    $db = new Database;
    $db->query = "SELECT user_roles.user_id, ag_pejabat.jabatan, ag_pejabat.nama FROM roles LEFT JOIN user_roles ON user_roles.role_id = roles.id LEFT JOIN ag_pejabat ON ag_pejabat.user_id = user_roles.user_id WHERE roles.name = 'Bupati'";
    $userIds[] = $db->exec('single');
}

forwardFlow($data, $userIds);