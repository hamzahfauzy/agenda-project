<?php

use Core\Storage;
use Core\Validation;

Validation::run([
    'no_surat' => [
        'required',
        'unique:ag_surat'
    ]
], $data);

$file = $_FILES['file_url'];
$data['file_url'] = Storage::upload($file);

$_POST['kegiatan'] = [
    'nama' => $data['nama_kegiatan'],
    'lokasi' => $data['lokasi'],
    'tanggal' => $data['tanggal']
];

unset($data['nama_kegiatan']);
unset($data['tanggal']);
unset($data['lokasi']);