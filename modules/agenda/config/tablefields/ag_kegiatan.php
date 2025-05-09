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
        'type' => 'checkbox:Pelajari/Kaji|Ingatkan|Telaah|Selesaikan|Wakili/Hadiri|Koordinasikan|Untuk Dilaksanakan|Untuk Ditindaklanjuti',
    ],
    'deskripsi' => [
        'label' => 'Instruksi Tambahan',
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