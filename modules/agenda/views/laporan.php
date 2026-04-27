<?php get_header() ?>
<style>
.filter-card {
    background: white;
    border-radius: 12px;
    padding: 20px;
    border: 1px solid #e2e8f0;
    box-shadow: 0 1px 3px rgba(0,0,0,0.05);
    margin-bottom: 24px;
}

.filter-label {
    font-size: 11px;
    font-weight: 700;
    color: var(--text-muted);
    text-transform: uppercase;
    margin-bottom: 6px;
    display: block;
}

/* Stat Cards */
.card-stat {
    background: white;
    border: 1px solid #e2e8f0;
    border-radius: 12px;
    padding: 20px;
    height: 100%;
}

.icon-box {
    width: 42px;
    height: 42px;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 12px;
}

.stat-label {
    font-size: 10px;
    font-weight: 600;
    color: var(--text-muted);
    text-transform: uppercase;
    margin-bottom: 4px;
}

.stat-value {
    font-size: 24px;
    font-weight: 700;
    margin: 0;
}

.stat-unit {
    font-size: 11px;
    color: var(--text-muted);
    margin-left: 4px;
}

.stat-meta {
    font-size: 10px;
    margin-top: 8px;
}

/* Charts & Tables */
.card-chart {
    background: white;
    border: 1px solid #e2e8f0;
    border-radius: 12px;
    padding: 20px;
    height: 100%;
}

.chart-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
}

.donut-container {
    position: relative;
    height: 200px;
    display: flex;
    justify-content: center;
    align-items: center;
}

.donut-center-text {
    position: absolute;
    text-align: center;
    pointer-events: none;
}

.info-box {
    background-color: #eff6ff;
    border: 1px solid #dbeafe;
    border-radius: 12px;
    padding: 20px;
    height: 100%;
}

.custom-progress {
    height: 8px;
    background-color: #f1f5f9;
    border-radius: 10px;
}
</style>
<!-- Filters -->
<div class="filter-card">
    <div class="row g-3 align-items-end">
        <div class="col-md-3">
            <label class="filter-label">Periode</label>
            <div class="input-group input-group-sm">
                <span class="input-group-text bg-white border-end-0"><i data-lucide="calendar" style="width: 14px;"></i></span>
                <input type="text" class="form-control border-start-0" value="01/05/2025 - 22/05/2025">
            </div>
        </div>
        <div class="col-md-2">
            <label class="filter-label">Pimpinan</label>
            <select class="form-select form-select-sm">
                <option>Semua Pimpinan</option>
            </select>
        </div>
        <div class="col-md-2">
            <label class="filter-label">Kategori Agenda</label>
            <select class="form-select form-select-sm">
                <option>Semua Kategori</option>
            </select>
        </div>
        <div class="col-md-2">
            <label class="filter-label">OPD / Penyelenggara</label>
            <select class="form-select form-select-sm">
                <option>Semua OPD</option>
            </select>
        </div>
        <div class="col-md-3">
            <div class="d-flex gap-2">
                <button class="btn btn-primary btn-sm flex-grow-1 d-flex align-items-center justify-content-center gap-2" style="background-color: #0056b3; font-weight: 600;">
                    <i data-lucide="search" style="width: 14px;"></i> Tampilkan Laporan
                </button>
                <button class="btn btn-outline-secondary btn-sm d-flex align-items-center gap-2">
                    <i data-lucide="download" style="width: 14px;"></i> Export
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Stats Grid -->
<div class="row g-3 mb-4">
    <div class="col">
        <div class="card-stat">
            <div class="icon-box" style="background: #eff6ff; color: #2563eb;"><i data-lucide="calendar-check"></i></div>
            <div class="stat-label">Total Agenda</div>
            <div class="d-flex align-items-baseline">
                <h3 class="stat-value">286</h3>
                <span class="stat-unit">Kegiatan</span>
            </div>
            <div class="stat-meta" style="color: #22c55e;">
                <i data-lucide="trending-up" style="width: 12px; vertical-align: middle;"></i> 12% dari periode lalu
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card-stat">
            <div class="icon-box" style="background: #f0fdf4; color: #22c55e;"><i data-lucide="check-circle"></i></div>
            <div class="stat-label">Agenda Selesai</div>
            <div class="d-flex align-items-baseline">
                <h3 class="stat-value">245</h3>
                <span class="stat-unit">Kegiatan</span>
            </div>
            <div class="stat-meta" style="color: var(--text-muted);">85,7% dari total agenda</div>
        </div>
    </div>
    <div class="col">
        <div class="card-stat">
            <div class="icon-box" style="background: #fff7ed; color: #f97316;"><i data-lucide="clock"></i></div>
            <div class="stat-label">Agenda Ditunda</div>
            <div class="d-flex align-items-baseline">
                <h3 class="stat-value">25</h3>
                <span class="stat-unit">Kegiatan</span>
            </div>
            <div class="stat-meta" style="color: var(--text-muted);">8,7% dari total agenda</div>
        </div>
    </div>
    <div class="col">
        <div class="card-stat">
            <div class="icon-box" style="background: #fef2f2; color: #ef4444;"><i data-lucide="x-circle"></i></div>
            <div class="stat-label">Agenda Dibatalkan</div>
            <div class="d-flex align-items-baseline">
                <h3 class="stat-value">16</h3>
                <span class="stat-unit">Kegiatan</span>
            </div>
            <div class="stat-meta" style="color: var(--text-muted);">5,6% dari total agenda</div>
        </div>
    </div>
    <div class="col">
        <div class="card-stat">
            <div class="icon-box" style="background: #faf5ff; color: #a855f7;"><i data-lucide="users"></i></div>
            <div class="stat-label">Rata-rata Agenda / Hari</div>
            <div class="d-flex align-items-baseline">
                <h3 class="stat-value">13</h3>
                <span class="stat-unit">Kegiatan</span>
            </div>
            <div class="stat-meta" style="color: var(--text-muted);">Dalam periode ini</div>
        </div>
    </div>
</div>

<!-- Graphs -->
<div class="row g-4 mb-4">
    <div class="col-md-5">
        <div class="card-chart">
            <h5 style="font-size: 14px; font-weight: 700; margin-bottom: 20px;">Agenda per Kategori</h5>
            <div class="donut-container">
                <canvas id="categoryChart"></canvas>
                <div class="donut-center-text">
                    <div style="font-size: 20px; font-weight: 700;">286</div>
                    <div style="font-size: 10px; color: var(--text-muted);">Total</div>
                </div>
            </div>
            <div style="margin-top: 20px;">
                <div class="d-flex justify-content-between mb-2" style="font-size: 11px;">
                    <span><span style="display:inline-block; width:8px; height:8px; border-radius:50%; background:#2563eb; margin-right:6px;"></span> Rapat</span>
                    <span style="font-weight: 700;">114 (39,9%)</span>
                </div>
                <div class="d-flex justify-content-between mb-2" style="font-size: 11px;">
                    <span><span style="display:inline-block; width:8px; height:8px; border-radius:50%; background:#22c55e; margin-right:6px;"></span> Kunjungan Kerja</span>
                    <span style="font-weight: 700;">72 (25,2%)</span>
                </div>
                <div class="d-flex justify-content-between mb-2" style="font-size: 11px;">
                    <span><span style="display:inline-block; width:8px; height:8px; border-radius:50%; background:#eab308; margin-right:6px;"></span> Audiensi</span>
                    <span style="font-weight: 700;">45 (15,7%)</span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-7">
        <div class="card-chart">
            <div class="chart-header">
                <h5 style="font-size: 14px; font-weight: 700; margin: 0;">Agenda per Bulan</h5>
                <select class="form-select form-select-sm" style="width: 120px; font-size: 11px;">
                    <option>Tahun 2025</option>
                </select>
            </div>
            <div style="height: 250px;">
                <canvas id="lineChart"></canvas>
            </div>
        </div>
    </div>
</div>

<!-- Tables -->
<div class="row g-4">
    <div class="col-md-5">
        <div class="card-chart">
            <h5 style="font-size: 14px; font-weight: 700; margin-bottom: 15px;">Agenda per OPD (Top 5)</h5>
            <div class="table-responsive">
                <table class="table table-sm table-borderless" style="font-size: 11px;">
                    <thead>
                        <tr style="color: var(--text-muted); border-bottom: 1px solid #f1f5f9;">
                            <th class="py-2">OPD / PENYELENGGARA</th>
                            <th class="py-2 text-center">JUMLAH</th>
                            <th class="py-2 text-end">PERSENTASE</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="py-2">Sekretariat Daerah</td>
                            <td class="py-2 text-center font-bold">56</td>
                            <td class="py-2 text-end">
                                <div class="d-flex align-items-center justify-content-end gap-2">
                                    <div class="custom-progress" style="width: 50px;"><div style="width: 70%; background:#2563eb; height:100%; border-radius:10px;"></div></div>
                                    <b>19,6%</b>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="py-2">Bappeda</td>
                            <td class="py-2 text-center font-bold">43</td>
                            <td class="py-2 text-end">
                                <div class="d-flex align-items-center justify-content-end gap-2">
                                    <div class="custom-progress" style="width: 50px;"><div style="width: 55%; background:#2563eb; height:100%; border-radius:10px;"></div></div>
                                    <b>15,0%</b>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="py-2">Dinas Pendidikan</td>
                            <td class="py-2 text-center font-bold">38</td>
                            <td class="py-2 text-end">
                                <div class="d-flex align-items-center justify-content-end gap-2">
                                    <div class="custom-progress" style="width: 50px;"><div style="width: 48%; background:#2563eb; height:100%; border-radius:10px;"></div></div>
                                    <b>13,3%</b>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="text-center mt-3 pt-2 border-top">
                <button class="btn btn-outline-light btn-sm" style="font-size: 10px; color: #2563eb; border-color: #e2e8f0; font-weight: 700;">Lihat Selengkapnya</button>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card-chart">
            <h5 style="font-size: 14px; font-weight: 700; margin-bottom: 20px;">Ringkasan Status Agenda</h5>
            <div class="mb-4">
                <div class="d-flex justify-content-between mb-1" style="font-size: 11px; font-weight: 700;">
                    <span>Selesai</span>
                    <span>245 (85,7%)</span>
                </div>
                <div class="custom-progress"><div style="width: 85.7%; background:#22c55e; height:100%; border-radius:10px;"></div></div>
            </div>
            <div class="mb-4">
                <div class="d-flex justify-content-between mb-1" style="font-size: 11px; font-weight: 700;">
                    <span>Ditunda</span>
                    <span>25 (8,7%)</span>
                </div>
                <div class="custom-progress"><div style="width: 8.7%; background:#f97316; height:100%; border-radius:10px;"></div></div>
            </div>
            <div>
                <div class="d-flex justify-content-between mb-1" style="font-size: 11px; font-weight: 700;">
                    <span>Dibatalkan</span>
                    <span>16 (5,6%)</span>
                </div>
                <div class="custom-progress"><div style="width: 5.6%; background:#ef4444; height:100%; border-radius:10px;"></div></div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="info-box">
            <div class="d-flex align-items-center gap-2 mb-2" style="color: #1d4ed8;">
                <i data-lucide="info" style="width: 18px;"></i>
                <b style="font-size: 13px;">Informasi</b>
            </div>
            <p style="font-size: 11px; line-height: 1.5; color: #475569;">
                Laporan ini menampilkan ringkasan agenda kegiatan berdasarkan filter yang dipilih.
            </p>
            <div style="margin-top: 50px; border-top: 1px solid #dbeafe; padding-top: 15px;">
                <div class="d-flex align-items-center gap-2">
                    <i data-lucide="refresh-cw" style="width: 12px; color: var(--text-muted);"></i>
                    <div style="font-size: 9px; line-height: 1.2; color: var(--text-muted);">
                        <b>Data terakhir diperbarui</b><br>
                        22 Mei 2025 10:30 WIB
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div style="margin-top: 30px; font-size: 10px; color: #94a3b8; font-style: italic;">
    Catatan: Persentase dihitung berdasarkan total agenda pada periode yang dipilih.
</div>
<?php get_footer() ?>