<?php

return [
    'no_surat' => [
        'label' => 'Nomor Surat',
        'type' => 'text'
    ],
    'tanggal_surat' => [
        'label' => 'Tanggal Surat',
        'type' => 'date'
    ],
    'tanggal_kegiatan' => [
        'label' => 'Tanggal dan Waktu Kegiatan',
        'type' => 'datetime-local'
    ],
    'perihal' => [
        'label' => 'Perihal',
        'type' => 'text'
    ],
    'asal' => [
        'label' => 'Asal Surat',
        'type' => 'text'
    ],
    'tujuan' => [
        'label' => 'Tujuan Surat',
        'type' => 'text'
    ],
    'file_url' => [
        'label' => 'File',
        'type' => 'file',
        'attr' => [
            'accept' => '.pdf'
        ]
    ],
    '_userstamp' => true,
];