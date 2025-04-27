<?php

use Core\Database;

$users = [
    'name' => $data['nama'],
    'username' => $data['username'],
    'password' => md5($data['password']),
];

unset($data['username']);
unset($data['password']);

$db = new Database;
$user = $db->insert('users', $users);
$role = $db->single('roles', [
    'name' => 'User'
]);

$db->insert('user_roles', [
    'user_id' => $user->id,
    'role_id' => $role->id
]);

$data['user_id'] = $user->id;