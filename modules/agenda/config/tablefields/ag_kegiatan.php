<?php

return [
    'nama' => [
        'label' => 'Nama',
        'type' => 'text',
    ],
    'tanggal' => [
        'label' => 'Tanggal',
        'type' => 'datetime-local',
    ],
    'lokasi' => [
        'label' => 'Lokasi',
        'type' => 'text',
    ],
    'deskripsi' => [
        'label' => 'Instruksi',
        'type' => 'text',
    ],
    'pejabat_id' => [
        'label' => 'Disposisi',
        'type' => 'options-obj:ag_pejabat,id,jabatan',
    ],
    'pendamping' => [
        'label' => 'Pejabat Pendamping',
        'type' => 'options-obj:ag_pejabat,id,jabatan',
        'attr' => [
            'multiple' => 'multiple'
        ]
    ],
    '_userstamp' => true
];