<!-- Overlay for mobile sidebar -->
<div id="sidebar-overlay" class="sidebar-overlay" onclick="toggleSidebar()"></div>

<!-- SIDEBAR -->
<aside id="sidebar" class="sidebar d-flex flex-column flex-shrink-0 text-white h-100">
    
    <!-- Brand -->
    <div class="sidebar-brand d-flex align-items-center gap-3 p-4">
        <img src="<?= asset('theme/assets/logo_kab_asahan.png') ?>" alt="" height="40px">
        <div>
            <h1 class="text-white fw-bold fs-6 mb-0 tracking-wide">E-AGENDA</h1>
            <p class="text-secondary fw-medium mb-0 text-uppercase" style="font-size: 10px; letter-spacing: 0.05em;">Pemkab Asahan</p>
        </div>
    </div>

    <!-- User Profile -->
    <div class="sidebar-brand d-flex align-items-center gap-3 p-4">
        <img src="<?=asset(auth()->profile->pic ?? 'https://ui-avatars.com/api/?name=H+Surya&background=f8fafc&color=0f172a&bold=true')?>" alt="Profile" class="rounded-circle border border-secondary object-fit-cover" style="width: 48px; height: 48px;">
        <div>
            <p class="text-white fw-semibold fs-7 mb-0"><?=auth()->name?></p>
            <p class="text-secondary fs-8 mb-0"><?= lastRole(auth()->id)?></p>
            <div class="d-flex align-items-center gap-1 mt-1">
                <span class="rounded-circle bg-success" style="width: 8px; height: 8px;"></span>
                <span class="text-secondary" style="font-size: 11px;">Online</span>
            </div>
        </div>
    </div>

    <!-- Navigation -->
    <nav class="flex-grow-1 overflow-auto p-3 custom-scrollbar">
        <!-- <a href="#" class="nav-link-custom">
            <i class="ph ph-house fs-5"></i> Dashboard
        </a>
        <a href="#" class="nav-link-custom">
            <i class="ph ph-calendar-blank fs-5"></i> Agenda
        </a>
        <a href="#" class="nav-link-custom">
            <i class="ph ph-paper-plane-right fs-5"></i> Disposisi
        </a>
        <a href="#" class="nav-link-custom">
            <i class="ph ph-calendar-check fs-5"></i> Kalender
        </a>
        <a href="#" class="nav-link-custom">
            <i class="ph ph-envelope-simple-open fs-5"></i> Undangan Masuk
        </a> -->
        
        <!-- Active State -->
        <!-- <a href="#" class="nav-link-custom active">
            <i class="ph-fill ph-archive fs-5"></i> Arsip Agenda
        </a>
        
        <a href="#" class="nav-link-custom">
            <i class="ph ph-chart-bar fs-5"></i> Laporan
        </a>
        <a href="#" class="nav-link-custom">
            <i class="ph ph-gear fs-5"></i> Pengaturan
        </a> -->
        
        <?php foreach (get_menu() as $key => $module) : ?>
            <?php foreach ($module['menu'] as $k => $menu) : ?>
                <a href="<?= $menu['route'] ?>" class="nav-link-custom <?= in_array(getActive(), is_array($menu['activeState']) ? $menu['activeState'] : [$menu['activeState']]) ? 'active' : '' ?>">
                    <i class="<?= $menu['icon'] ?> fs-5"></i> <?= __($menu['label']) ?>
                </a>
            <?php endforeach ?>
        <?php endforeach ?>
    </nav>

    <!-- Footer / Logout -->
    <div class="sidebar-footer p-4">
        <a href="<?=routeTo('auth/logout')?>" class="nav-link-custom mb-4 text-danger" style="color: #f87171 !important;">
            <i class="ph ph-sign-out fs-5"></i> Keluar
        </a>
        
        <div class="d-flex align-items-center gap-3 px-2">
            <img src="<?= asset('theme/assets/logo_kab_asahan.png') ?>" alt="" height="40px">
            <div>
                <p class="text-secondary mb-0 lh-1" style="font-size: 10px;">© 2025 Pemerintah</p>
                <p class="text-secondary mb-0 lh-1" style="font-size: 10px;">Kabupaten Asahan</p>
                <p class="text-secondary mb-0 mt-1 lh-1" style="font-size: 10px;">All rights reserved.</p>
            </div>
        </div>
    </div>
</aside>