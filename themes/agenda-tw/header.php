<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Agenda - Arsip Agenda</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- DataTables Bootstrap CSS -->
    <link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="<?= asset('theme/assets/style.css') ?>" rel="stylesheet">
    
    <!-- Google Fonts: Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Phosphor Icons -->
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
</head>
<body>

    <!-- Layout Wrapper -->
    <div class="d-flex vh-100 overflow-hidden">
        
        <?php get_sidebar() ?>

        <main class="d-flex flex-column flex-grow-1 overflow-hidden w-100">
            
            <!-- Header -->
            <header class="header-top d-flex align-items-center justify-content-between px-3 px-lg-4 z-1 py-4">
                <div class="d-flex align-items-center gap-3">
                    <button onclick="toggleSidebar()" class="btn btn-light d-lg-none border-0 p-2">
                        <i class="ph ph-list fs-4 text-slate-500"></i>
                    </button>
                    <div>
                        <h2 class="fs-5 fw-bold text-slate-800 mb-0 d-flex align-items-center gap-2">
                            E Agenda Pemkab Asahan
                        </h2>
                        <p class="fs-8 text-slate-500 mb-0 d-none d-sm-block">Kelola dan lihat arsip seluruh agenda kegiatan</p>
                    </div>
                </div>

                <div class="d-flex align-items-center gap-3 gap-sm-4">
                    <!-- Notifications -->
                    <button class="btn btn-light rounded-circle border-0 p-2 position-relative d-flex align-items-center justify-content-center text-slate-500">
                        <i class="ph ph-bell fs-5"></i>
                        <span class="position-absolute top-0 end-0 translate-middle p-1 bg-danger border border-light rounded-circle" style="margin-top: 10px; margin-right: 2px;"></span>
                    </button>

                    <div class="d-none d-sm-flex align-items-center gap-2 fs-7 text-slate-500 border-start border-end px-3">
                        <i class="ph ph-calendar-blank fs-5"></i>
                        <span><?= tanggalHariIni() ?></span>
                    </div>

                    <!-- User Dropdown -->
                    <button class="btn btn-light border-0 d-flex align-items-center gap-3 p-1 rounded-3">
                        <div class="text-end d-none d-md-block ms-2">
                            <p class="fs-7 fw-semibold text-slate-800 mb-0 lh-1"><?=auth()->name?></p>
                            <p class="text-slate-500 mb-0 lh-1" style="font-size: 11px;"><?= lastRole(auth()->id)?></p>
                        </div>
                        <img src="<?=asset(auth()->profile->pic ?? 'https://ui-avatars.com/api/?name=H+Surya&background=f1f5f9&color=0f172a&bold=true')?>" alt="Profile" class="rounded-circle object-fit-cover" style="width: 36px; height: 36px;">
                        <i class="ph ph-caret-down text-slate-500 fs-8 d-none d-sm-block me-1"></i>
                    </button>
                </div>
            </header>

            <!-- Scrollable Content -->
            <div class="flex-grow-1 overflow-auto p-3 p-lg-4">