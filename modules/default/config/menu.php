<?php

return [
    [
        'label' => 'default.menu.users',
        'icon'  => 'ph ph-users',
        'route' => routeTo('crud/index',['table'=>'users']),
        'activeState' => 'default.users'
    ],
    [
        'label' => 'default.menu.roles',
        'icon'  => 'ph ph-toolbox',
        'route' => routeTo('crud/index',['table'=>'roles']),
        'activeState' => 'default.roles'
    ],
    [
        'label' => 'default.menu.settings',
        'icon'  => 'ph ph-gear',
        'route' => routeTo('default/settings/index'),
        'activeState' => 'default.settings'
    ],
];