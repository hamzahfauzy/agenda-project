<?php

return [
    'nama' => [
        'label' => 'Nama Kegiatan',
        'type' => 'text',
    ],
    'tanggal' => [
        'label' => 'Tanggal dan Waktu Kegiatan',
        'type' => 'datetime-local',
    ],
    'lokasi' => [
        'label' => 'Lokasi Kegiatan',
        'type' => 'text',
    ],
    'instruksi' => [
        'label' => 'Instruksi Disposisi',
        'type' => 'checkbox:Dihadiri Bupati|Dihadiri Wakil Bupati|Dihadiri Sekdakab|Wakilkan/Hadiri|Untuk ditindaklanjuti|Untuk dilaksanakan',
    ],
    'deskripsi' => [
        'label' => 'Instruksi Tambahan',
        'type' => 'text',
    ],
    'pelaksana' => [
        'label' => 'Pejabat Pelaksana',
        'type' => 'options-obj:ag_pejabat,id,jabatan',
        'attr' => [
            'multiple' => 'multiple'
        ]
    ],
    'pendamping' => [
        'label' => 'Pejabat Pendamping Kegiatan',
        'type' => 'options-obj:ag_pejabat,id,jabatan',
        'attr' => [
            'multiple' => 'multiple'
        ]
    ],
    '_userstamp' => true
];