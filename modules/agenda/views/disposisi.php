<?php get_header() ?>
<style>
/* Cards & Tabs */
.card-custom {
    background: white;
    border: 1px solid #e2e8f0;
    border-radius: 12px;
    box-shadow: 0 1px 3px rgba(0,0,0,0.02);
    height: 100%;
}

.nav-tabs-custom .nav-link {
    border: none;
    color: #64748b;
    font-weight: 500;
    padding: 15px 20px;
}

.nav-tabs-custom .nav-link.active {
    color: var(--primary-blue);
    border-bottom: 3px solid var(--primary-blue);
    background: none;
}

/* Disposition Options */
.option-card {
    border: 1px solid #e2e8f0;
    border-radius: 10px;
    padding: 15px;
    text-align: center;
    cursor: pointer;
    transition: all 0.2s;
    background: white;
    height: 100%;
}

.option-card:hover {
    border-color: var(--primary-blue);
    background: #f0f7ff;
}

.option-card.selected {
    border: 2px solid var(--primary-blue);
    background: #f0f7ff;
}

.option-icon {
    margin-bottom: 8px;
}

/* Timeline */
.timeline {
    position: relative;
    padding-left: 30px;
}

.timeline-item {
    position: relative;
    padding-bottom: 25px;
}

.timeline-item::before {
    content: "";
    position: absolute;
    left: -22px;
    top: 5px;
    width: 12px;
    height: 12px;
    background: #cbd5e1;
    border-radius: 50%;
    z-index: 1;
}

.timeline-item.active::before {
    background: var(--primary-blue);
    box-shadow: 0 0 0 4px rgba(0,97,242,0.1);
}

.timeline-item::after {
    content: "";
    position: absolute;
    left: -17px;
    top: 15px;
    width: 2px;
    height: 100%;
    background: #e2e8f0;
}

.timeline-item:last-child::after {
    display: none;
}

/* Status Badges */
.badge-soft-success {
    background-color: #dcfce7;
    color: #15803d;
    border-radius: 4px;
    font-size: 0.75rem;
    padding: 4px 8px;
}

.badge-soft-info {
    background-color: #e0f2fe;
    color: #0369a1;
    padding: 4px 10px;
}

/* Table Custom */
.table-custom thead th {
    background-color: #f8fafc;
    color: #64748b;
    text-transform: uppercase;
    font-size: 0.7rem;
    letter-spacing: 0.05em;
    border-bottom: 1px solid #e2e8f0;
}
</style>
<div>
    <!-- Tabs -->
    <ul class="nav nav-tabs nav-tabs-custom mb-4">
        <li class="nav-item">
            <a class="nav-link active" href="#">Menunggu Disposisi <span class="badge bg-danger ms-1">5</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Sudah Disposisi</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Semua Disposisi</a>
        </li>
    </ul>

    <div class="row g-4 mb-4">
        <!-- Left: Detail Card -->
        <div class="col-xl-4">
            <div class="card-custom p-4">
                <div class="d-flex justify-content-between align-items-start mb-3">
                    <h6 class="fw-bold">Detail Agenda / Surat</h6>
                    <span class="badge-soft-success">UNDANGAN</span>
                </div>
                
                <h6 class="fw-bold text-primary mb-3">Rapat Koordinasi Program Pembangunan Daerah</h6>
                
                <div class="mb-4">
                    <div class="row mb-2">
                        <div class="col-4 text-muted small">Dari</div>
                        <div class="col-8 small fw-medium">Bappeda Provinsi Sumatera Utara</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-4 text-muted small">Tanggal Surat</div>
                        <div class="col-8 small">20 Mei 2025</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-4 text-muted small">Nomor Surat</div>
                        <div class="col-8 small font-monospace">005/1257/Bappeda/2025</div>
                    </div>
                </div>

                <div class="row g-3 mb-4">
                    <div class="col-6">
                        <div class="p-2 bg-light rounded">
                            <div class="text-muted" style="font-size: 0.65rem;">Tanggal Agenda</div>
                            <div class="fw-bold small"><i data-lucide="calendar" size="12" class="me-1"></i> 27 Mei 2025</div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="p-2 bg-light rounded">
                            <div class="text-muted" style="font-size: 0.65rem;">Waktu</div>
                            <div class="fw-bold small"><i data-lucide="clock" size="12" class="me-1"></i> 09.00 WIB</div>
                        </div>
                    </div>
                </div>

                <div class="mb-4">
                    <label class="text-muted small d-block mb-1">Tempat</label>
                    <div class="small"><i data-lucide="map-pin" size="12" class="me-1 text-danger"></i> Aula Raja Inal Siregar, Kantor Gubernur Sumatera Utara</div>
                </div>

                <div class="mb-4">
                    <label class="text-muted small d-block mb-1">Lampiran</label>
                    <div class="border rounded-3 p-3 d-flex align-items-center justify-content-between bg-light shadow-sm">
                        <div class="d-flex align-items-center">
                            <div class="bg-danger-subtle p-2 rounded me-3 text-danger">
                                <i data-lucide="file-text"></i>
                            </div>
                            <div>
                                <div class="small fw-bold text-truncate" style="max-width: 150px;">Surat_Undangan.pdf</div>
                                <div class="text-muted" style="font-size: 0.65rem;">245 KB</div>
                            </div>
                        </div>
                        <button class="btn btn-link p-0 text-primary"><i data-lucide="download" size="18"></i></button>
                    </div>
                </div>

                <hr class="my-4 opacity-10">

                <h6 class="fw-bold small mb-3">Informasi Tambahan</h6>
                <div class="row mb-2">
                    <div class="col-5 text-muted small">Penyelenggara</div>
                    <div class="col-7 small fw-medium">Bappeda Provinsi Sumatera Utara</div>
                </div>
                <div class="row mb-2">
                    <div class="col-5 text-muted small">Peserta yang diundang</div>
                    <div class="col-7 small fw-medium">Bupati / Wakil Bupati Asahan</div>
                </div>
            </div>
        </div>

        <!-- Middle: Give Disposition -->
        <div class="col-xl-5">
            <div class="card-custom p-4">
                <h6 class="fw-bold mb-4">Berikan Disposisi</h6>
                
                <div class="row g-2 mb-4">
                    <div class="col-md-4 col-6">
                        <div class="option-card selected">
                            <i data-lucide="user-check" class="text-primary option-icon"></i>
                            <div class="fw-bold" style="font-size: 0.8rem;">Hadir Langsung</div>
                            <div class="text-muted" style="font-size: 0.6rem;">Pimpinan menghadiri kegiatan tersebut</div>
                        </div>
                    </div>
                    <div class="col-md-4 col-6">
                        <div class="option-card">
                            <i data-lucide="users" class="text-success option-icon"></i>
                            <div class="fw-bold" style="font-size: 0.8rem;">Diwakilkan</div>
                            <div class="text-muted" style="font-size: 0.6rem;">Diwakilkan kepada pejabat tertentu</div>
                        </div>
                    </div>
                    <div class="col-md-4 col-6">
                        <div class="option-card">
                            <i data-lucide="clock" class="text-warning option-icon"></i>
                            <div class="fw-bold" style="font-size: 0.8rem;">Ditunda</div>
                            <div class="text-muted" style="font-size: 0.6rem;">Jadwalkan ulang kegiatan</div>
                        </div>
                    </div>
                    <div class="col-md-4 col-6">
                        <div class="option-card">
                            <i data-lucide="search" class="text-purple option-icon" style="color: #6b21a8;"></i>
                            <div class="fw-bold" style="font-size: 0.8rem;">Minta Kajian</div>
                            <div class="text-muted" style="font-size: 0.6rem;">Minta kajian atau tindak lanjut</div>
                        </div>
                    </div>
                    <div class="col-md-4 col-6">
                        <div class="option-card">
                            <i data-lucide="x-circle" class="text-danger option-icon"></i>
                            <div class="fw-bold" style="font-size: 0.8rem;">Tolak / Batal</div>
                            <div class="text-muted" style="font-size: 0.6rem;">Tidak dapat dilaksanakan</div>
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label small fw-bold">Catatan / Arahan</label>
                    <textarea class="form-control" rows="5" placeholder="Tuliskan arahan pimpinan di sini...">Saya akan hadir langsung.</textarea>
                    <div class="text-end small text-muted mt-1">26 / 500</div>
                </div>

                <div class="mb-4">
                    <label class="form-label small fw-bold">Tindak Lanjut</label>
                    <select class="form-select form-select-sm">
                        <option>Pilih tindak lanjut (opsional)</option>
                        <option>Sekda</option>
                        <option>Asisten</option>
                    </select>
                </div>

                <div class="row g-3 mb-4">
                    <div class="col-md-7">
                        <label class="form-label small fw-bold">Pengingat (Reminder)</label>
                        <div class="input-group input-group-sm">
                            <span class="input-group-text"><i data-lucide="calendar" size="14"></i></span>
                            <input type="text" class="form-control" value="26 Mei 2025">
                        </div>
                    </div>
                    <div class="col-md-5">
                        <label class="form-label small fw-bold">&nbsp;</label>
                        <div class="input-group input-group-sm">
                            <span class="input-group-text"><i data-lucide="clock" size="14"></i></span>
                            <input type="text" class="form-control" value="08.00 WIB">
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-between align-items-center pt-3 border-top">
                    <button class="btn btn-light px-4">Batal</button>
                    <button class="btn btn-primary px-4"><i data-lucide="send" size="16" class="me-2 d-inline"></i> Kirim Disposisi</button>
                </div>
            </div>
        </div>

        <!-- Right: History -->
        <div class="col-xl-3">
            <div class="card-custom p-4">
                <h6 class="fw-bold mb-4">Riwayat Disposisi</h6>
                
                <div class="timeline">
                    <div class="timeline-item active">
                        <div class="fw-bold small">Menunggu Disposisi</div>
                        <div class="text-muted" style="font-size: 0.7rem;">22 Mei 2025 10.15 WIB</div>
                        <div class="text-muted" style="font-size: 0.7rem;">Oleh Admin Protokol</div>
                    </div>
                    <div class="timeline-item">
                        <div class="fw-bold small">Diajukan</div>
                        <div class="text-muted" style="font-size: 0.7rem;">22 Mei 2025 09.30 WIB</div>
                        <div class="text-muted" style="font-size: 0.7rem;">Oleh Bappeda Asahan</div>
                    </div>
                    <div class="timeline-item">
                        <div class="fw-bold small">Verifikasi</div>
                        <div class="text-muted" style="font-size: 0.7rem;">22 Mei 2025 08.45 WIB</div>
                        <div class="text-muted" style="font-size: 0.7rem;">Oleh Admin Protokol</div>
                    </div>
                </div>

                <button class="btn btn-outline-secondary w-100 mt-2 btn-sm rounded-pill">
                    <i data-lucide="list" size="14" class="me-2"></i> Lihat Riwayat Lengkap
                </button>
            </div>
        </div>
    </div>

    <!-- Footer: Table -->
    <div class="card-custom overflow-hidden">
        <div class="p-4 d-flex justify-content-between align-items-center">
            <h6 class="fw-bold mb-0"><i data-lucide="calendar" class="me-2 text-primary" size="20"></i> Agenda Terkait Lainnya</h6>
            <a href="#" class="text-decoration-none small">Lihat Semua Agenda <i data-lucide="arrow-right" size="14"></i></a>
        </div>
        <div class="table-responsive">
            <table class="table table-custom mb-0">
                <thead>
                    <tr>
                        <th class="ps-4">Tanggal</th>
                        <th>Kegiatan</th>
                        <th>Tempat</th>
                        <th>Penyelenggara</th>
                        <th class="pe-4">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="ps-4 small">28 Mei 2025</td>
                        <td class="small fw-medium">Rapat Evaluasi Triwulan II</td>
                        <td class="small">Ruang Rapat Melati</td>
                        <td class="small">Bappeda Asahan</td>
                        <td class="pe-4"><span class="badge-soft-success">Terjadwal</span></td>
                    </tr>
                    <tr>
                        <td class="ps-4 small">30 Mei 2025</td>
                        <td class="small fw-medium">Kunjungan Kerja Lapangan</td>
                        <td class="small">Kecamatan Kisaran Barat</td>
                        <td class="small">Setdakab Asahan</td>
                        <td class="pe-4"><span class="badge-soft-success">Terjadwal</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php get_footer() ?>