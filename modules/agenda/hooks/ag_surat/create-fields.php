<?php

$fields['nama_kegiatan'] = [
    'label' => 'Nama Kegiatan',
    'type' => 'text'
];

$fields['tanggal'] = [
    'label' => 'Tanggal dan Waktu Kegiatan',
    'type' => 'datetime-local'
];

$fields['lokasi'] = [
    'label' => 'Lokasi Kegiatan',
    'type' => 'text'
];

unset($fields['tanggal_kegiatan']);


return $fields;