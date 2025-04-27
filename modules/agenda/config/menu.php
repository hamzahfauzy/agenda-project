<?php 

return [
    [
        'label' => 'agenda.menu.pejabat',
        'icon'  => 'fa-fw fa-lg me-2 fa-solid fa-users',
        'route' => routeTo('crud/index',['table' => 'ag_pejabat']),
        'activeState' => 'agenda.ag_pejabat'
    ],
    [
        'label' => 'agenda.menu.surat',
        'icon'  => 'fa-fw fa-lg me-2 fa-solid fa-envelope',
        'route' => routeTo('crud/index',['table' => 'ag_surat']),
        'activeState' => 'agenda.ag_surat'
    ],
    [
        'label' => 'agenda.menu.kegiatan',
        'icon'  => 'fa-fw fa-lg me-2 fa-solid fa-calendar',
        'route' => routeTo('crud/index',['table' => 'ag_kegiatan']),
        'activeState' => 'agenda.ag_kegiatan'
    ],
];