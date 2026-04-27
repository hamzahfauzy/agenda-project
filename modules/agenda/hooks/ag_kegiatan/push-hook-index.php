<?php

use Core\Page;
use Core\Route;

// page section
$filter = isset($_GET['filter']) ? $_GET['filter'] : [];
$title = isset($filter['status_kegiatan']) && $filter['status_kegiatan'] == 'Kegiatan Telah Selesai' ? 'Arsip Agenda' : 'Agenda';
$active = isset($filter['status_kegiatan']) && $filter['status_kegiatan'] == 'Kegiatan Telah Selesai' ? 'agenda.ag_kegiatan_selesai' : 'agenda.ag_kegiatan_akan_datang';
Page::setActive($active);
Page::setTitle($title);

if(isset($filter['status_kegiatan']) && $filter['status_kegiatan'] == 'Kegiatan Telah Selesai')
{
    Route::additional_allowed_routes(['route_path' => '!crud/create?table=ag_kegiatan']);
    Route::additional_allowed_routes(['route_path' => '!crud/edit?table=ag_kegiatan']);
    Route::additional_allowed_routes(['route_path' => '!crud/delete?table=ag_kegiatan']);
}