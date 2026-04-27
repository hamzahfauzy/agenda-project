<?php 

return [
    [
        'label' => 'agenda.menu.dashboard',
        'icon'  => 'ph ph-house',
        'route' => routeTo('agenda/dashboard'),
        'activeState' => 'agenda.dashboard'
    ],
    [
        'label' => 'agenda.menu.agenda',
        'icon'  => 'ph ph-calendar-blank',
        'route' => routeTo('crud/index',['table' => 'ag_kegiatan', 'filter' => ['status_kegiatan'=>'Kegiatan Akan Datang']]),
        'activeState' => 'agenda.ag_kegiatan_akan_datang'
    ],
    [
        'label' => 'agenda.menu.disposisi',
        'icon'  => 'ph ph-paper-plane-right',
        'route' => routeTo('agenda/disposisi'),
        'activeState' => 'agenda.disposisi'
    ],
    [
        'label' => 'agenda.menu.kalender',
        'icon'  => 'ph ph-calendar-check',
        'route' => routeTo('agenda/kalender'),
        'activeState' => 'agenda.kalender'
    ],
    [
        'label' => 'agenda.menu.undangan masuk',
        'icon'  => 'ph ph-envelope-simple-open',
        'route' => routeTo('crud/index',['table' => 'ag_surat']),
        'activeState' => 'agenda.ag_surat'
    ],
    [
        'label' => 'agenda.menu.arsip agenda',
        'icon'  => 'ph-fill ph-archive',
        'route' => routeTo('crud/index',['table' => 'ag_kegiatan', 'filter' => ['status_kegiatan'=>'Kegiatan Telah Selesai']]),
        'activeState' => 'agenda.ag_kegiatan_selesai'
    ],
    [
        'label' => 'agenda.menu.laporan',
        'icon'  => 'ph ph-chart-bar',
        'route' => routeTo('agenda/laporan'),
        'activeState' => 'agenda.laporan'
    ],
    // [
    //     'label' => 'agenda.menu.pejabat',
    //     'icon'  => 'fa-fw fa-lg me-2 fa-solid fa-users',
    //     'route' => routeTo('crud/index',['table' => 'ag_pejabat']),
    //     'activeState' => 'agenda.ag_pejabat'
    // ],
    // [
    //     'label' => 'agenda.menu.surat',
    //     'icon'  => 'fa-fw fa-lg me-2 fa-solid fa-envelope',
    //     'route' => routeTo('crud/index',['table' => 'ag_surat']),
    //     'activeState' => 'agenda.ag_surat'
    // ],
    // [
    //     'label' => 'agenda.menu.kegiatan',
    //     'icon'  => 'fa-fw fa-lg me-2 fa-solid fa-calendar',
    //     'route' => routeTo('crud/index',['table' => 'ag_kegiatan']),
    //     'activeState' => 'agenda.ag_kegiatan'
    // ],
];