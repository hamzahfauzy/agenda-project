<?php get_header() ?>
<style>
/* --- Dashboard Cards --- */
.stat-card {
    background: white;
    border-radius: 16px;
    padding: 20px;
    border: 1px solid var(--slate-200);
    transition: transform 0.2s;
}

.stat-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 20px rgba(0,0,0,0.05);
}

.icon-box {
    width: 48px;
    height: 48px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
}

.bg-light-blue { background-color: #eef2ff; color: #4338ca; }
.bg-light-orange { background-color: #fff7ed; color: #c2410c; }
.bg-light-green { background-color: #f0fdf4; color: #15803d; }
.bg-light-purple { background-color: #faf5ff; color: #7e22ce; }

/* --- Timeline Style --- */
.timeline {
    position: relative;
    padding-left: 30px;
}

.timeline::before {
    content: '';
    position: absolute;
    left: 0;
    top: 0;
    bottom: 0;
    width: 2px;
    background-color: var(--slate-200);
    margin-left: 4px;
}

.timeline-item {
    position: relative;
    margin-bottom: 25px;
}

.timeline-item::after {
    content: '';
    position: absolute;
    left: -30px;
    top: 5px;
    width: 10px;
    height: 10px;
    border-radius: 50%;
    background-color: var(--primary-blue);
    border: 2px solid white;
    box-shadow: 0 0 0 3px rgba(13, 110, 253, 0.2);
}

.badge-status {
    font-size: 0.7rem;
    padding: 4px 8px;
    border-radius: 6px;
    font-weight: 600;
    text-transform: uppercase;
}

.badge-pimpinan { background-color: #eef2ff; color: #4338ca; }
.badge-internal { background-color: #f0fdf4; color: #15803d; }
</style>
<div class="row g-4 mb-4">
    <div class="col-md-3">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <div class="icon-box bg-light-blue"><i class="ph-fill ph-calendar-plus"></i></div>
                <a href="#" class="text-primary text-decoration-none small">Lihat Agenda <i class="ph ph-arrow-right"></i></a>
            </div>
            <p class="text-slate-500 small mb-1">AGENDA HARI INI</p>
            <h3 class="fw-bold mb-0">6 <span class="fs-6 fw-normal text-slate-500">Kegiatan</span></h3>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <div class="icon-box bg-light-orange"><i class="ph-fill ph-paper-plane-tilt"></i></div>
                <a href="#" class="text-primary text-decoration-none small">Lihat Disposisi <i class="ph ph-arrow-right"></i></a>
            </div>
            <p class="text-slate-500 small mb-1">MENUNGGU DISPOSISI</p>
            <h3 class="fw-bold mb-0">5 <span class="fs-6 fw-normal text-slate-500">Agenda / Surat</span></h3>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <div class="icon-box bg-light-green"><i class="ph-fill ph-check-circle"></i></div>
                <a href="#" class="text-primary text-decoration-none small">Lihat Riwayat <i class="ph ph-arrow-right"></i></a>
            </div>
            <p class="text-slate-500 small mb-1">AGENDA SELESAI</p>
            <h3 class="fw-bold mb-0">4 <span class="fs-6 fw-normal text-slate-500">Kegiatan</span></h3>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <div class="icon-box bg-light-purple"><i class="ph-fill ph-envelope-simple-open"></i></div>
                <a href="#" class="text-primary text-decoration-none small">Lihat Undangan <i class="ph ph-arrow-right"></i></a>
            </div>
            <p class="text-slate-500 small mb-1">UNDANGAN BARU</p>
            <h3 class="fw-bold mb-0">3 <span class="fs-6 fw-normal text-slate-500">Undangan</span></h3>
        </div>
    </div>
</div>

<div class="row g-4">
    <!-- Left Side: Timeline -->
    <div class="col-lg-8">
        <div class="card border-0 rounded-4 shadow-sm p-4 h-100">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div class="d-flex align-items-center gap-2">
                    <i class="ph-fill ph-calendar-blank text-primary fs-4"></i>
                    <h5 class="fw-bold mb-0">AGENDA HARI INI</h5>
                </div>
                <button class="btn btn-sm btn-link text-decoration-none fw-600">Lihat Semua Agenda</button>
            </div>

            <div class="timeline mt-2">
                <div class="timeline-item">
                    <div class="row align-items-center">
                        <div class="col-auto" style="width: 80px;"><span class="fw-bold">08.30</span></div>
                        <div class="col">
                            <h6 class="fw-bold mb-1">Rapat Forkopimda</h6>
                            <p class="text-slate-500 small mb-0"><i class="ph ph-map-pin"></i> Ruang Rapat Melati, Kantor Bupati Asahan</p>
                        </div>
                        <div class="col-auto">
                            <span class="badge-status badge-pimpinan">PIMPINAN</span>
                        </div>
                    </div>
                </div>
                <div class="timeline-item">
                    <div class="row align-items-center">
                        <div class="col-auto" style="width: 80px;"><span class="fw-bold">10.00</span></div>
                        <div class="col">
                            <h6 class="fw-bold mb-1">Audiensi DPRD Kabupaten Asahan</h6>
                            <p class="text-slate-500 small mb-0"><i class="ph ph-map-pin"></i> Ruang Tamu Bupati Asahan</p>
                        </div>
                        <div class="col-auto">
                            <span class="badge-status badge-pimpinan">PIMPINAN</span>
                        </div>
                    </div>
                </div>
                <div class="timeline-item">
                    <div class="row align-items-center">
                        <div class="col-auto" style="width: 80px;"><span class="fw-bold">13.00</span></div>
                        <div class="col">
                            <h6 class="fw-bold mb-1">Kunjungan Kerja ke Kecamatan Air Batu</h6>
                            <p class="text-slate-500 small mb-0"><i class="ph ph-map-pin"></i> Kec. Air Batu</p>
                        </div>
                        <div class="col-auto">
                            <span class="badge-status badge-pimpinan">PIMPINAN</span>
                        </div>
                    </div>
                </div>
                <div class="timeline-item">
                    <div class="row align-items-center">
                        <div class="col-auto" style="width: 80px;"><span class="fw-bold">15.00</span></div>
                        <div class="col">
                            <h6 class="fw-bold mb-1">Rapat Evaluasi Program</h6>
                            <p class="text-slate-500 small mb-0"><i class="ph ph-map-pin"></i> Ruang Rapat Melati</p>
                        </div>
                        <div class="col-auto">
                            <span class="badge-status badge-internal">INTERNAL</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Right Side: Disposisi & Ringkasan -->
    <div class="col-lg-4">
        <div class="card border-0 rounded-4 shadow-sm p-4 mb-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div class="d-flex align-items-center gap-2">
                    <i class="ph-fill ph-paper-plane-tilt text-primary fs-4"></i>
                    <h5 class="fw-bold mb-0">DISPOSISI MENUNGGU</h5>
                </div>
                <button class="btn btn-sm btn-link text-decoration-none">Lihat Semua</button>
            </div>

            <div class="list-group list-group-flush gap-3">
                <div class="p-3 bg-light rounded-3 border-0">
                    <div class="d-flex justify-content-between mb-2">
                        <h6 class="fw-bold mb-0 small">Surat Dinas Pendidikan Kab. Asahan</h6>
                        <span class="badge bg-warning-subtle text-warning" style="font-size: 0.6rem;">PRIORITAS</span>
                    </div>
                    <p class="text-slate-500 x-small mb-1" style="font-size: 0.75rem;">Permohonan Bantuan Sarpras Sekolah</p>
                    <small class="text-muted" style="font-size: 0.7rem;">22 Mei 2025 • Dinas Pendidikan</small>
                </div>
                <div class="p-3 bg-light rounded-3 border-0">
                    <div class="d-flex justify-content-between mb-2">
                        <h6 class="fw-bold mb-0 small">Permohonan Audiensi</h6>
                        <span class="badge bg-primary-subtle text-primary" style="font-size: 0.6rem;">NORMAL</span>
                    </div>
                    <p class="text-slate-500 x-small mb-1" style="font-size: 0.75rem;">DPD Asosiasi Pengusaha Asahan</p>
                    <small class="text-muted" style="font-size: 0.7rem;">22 Mei 2025 • DPC APKA</small>
                </div>
            </div>
        </div>

        <!-- Summary Chart Area (Visualized with HTML/CSS) -->
        <div class="card border-0 rounded-4 shadow-sm p-4">
            <div class="d-flex align-items-center gap-2 mb-3">
                <i class="ph ph-chart-bar text-primary fs-4"></i>
                <h5 class="fw-bold mb-0">RINGKASAN BULAN INI</h5>
            </div>
            <div class="row text-center mb-3">
                <div class="col-6">
                    <small class="text-slate-500">Total Agenda</small>
                    <h4 class="fw-bold">86</h4>
                </div>
                <div class="col-6">
                    <small class="text-slate-500">Tingkat Kehadiran</small>
                    <h4 class="fw-bold text-success">92%</h4>
                </div>
            </div>
            <!-- Placeholder for Chart -->
            <div class="d-flex align-items-end justify-content-around bg-light rounded-3 p-3" style="height: 100px;">
                <div class="bg-primary opacity-25 rounded-top" style="width: 15px; height: 40%;"></div>
                <div class="bg-primary opacity-50 rounded-top" style="width: 15px; height: 60%;"></div>
                <div class="bg-primary opacity-75 rounded-top" style="width: 15px; height: 80%;"></div>
                <div class="bg-primary rounded-top" style="width: 15px; height: 95%;"></div>
                <div class="bg-primary opacity-50 rounded-top" style="width: 15px; height: 50%;"></div>
            </div>
        </div>
    </div>
</div>
<?php get_footer() ?>