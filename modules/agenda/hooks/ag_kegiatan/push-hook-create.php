<?php

use Core\Page;

// page section
$filter = isset($_GET['filter']) ? $_GET['filter'] : [];
$title = isset($filter['status_kegiatan']) && $filter['status_kegiatan'] == 'Kegiatan Telah Selesai' ? 'Arsip Agenda' : 'Agenda';
$active = isset($filter['status_kegiatan']) && $filter['status_kegiatan'] == 'Kegiatan Telah Selesai' ? 'agenda.ag_kegiatan_selesai' : 'agenda.ag_kegiatan_akan_datang';
Page::setActive($active);
Page::setTitle($title);