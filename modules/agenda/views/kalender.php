<?php get_header() ?>
<style>
:root {
    --sidebar-bg: #0f172a;
    --sidebar-active: #2563eb;
    --bg-light: #f1f5f9;
    --text-main: #1e293b;
    --text-muted: #64748b;
    --border-color: #e2e8f0;
}
/* FullCalendar Customization to Match Image */
.calendar-container {
    background: white;
    border-radius: 16px;
    border: 1px solid var(--border-color);
    padding: 24px;
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
}

.fc .fc-toolbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 24px !important;
}

.fc .fc-toolbar-title {
    font-size: 1.25rem !important;
    font-weight: 700 !important;
    color: #1e293b;
    display: flex;
    align-items: center;
}

.fc .fc-toolbar-title::after {
    content: '\F2E0'; /* bi-chevron-down */
    font-family: 'bootstrap-icons';
    font-size: 0.8rem;
    margin-left: 8px;
    color: var(--text-muted);
}

.fc .fc-button {
    background: white !important;
    border: 1px solid var(--border-color) !important;
    color: var(--text-main) !important;
    font-weight: 500 !important;
    font-size: 0.85rem !important;
    padding: 8px 16px !important;
    border-radius: 8px !important;
    box-shadow: none !important;
    height: auto !important;
}

.fc .fc-button:hover { background: #f8fafc !important; }

.fc .fc-button-primary:not(:disabled).fc-button-active {
    background: var(--sidebar-active) !important;
    border-color: var(--sidebar-active) !important;
    color: white !important;
}

.fc .fc-today-button { font-weight: 600 !important; }

/* Event Styling */
.fc-event {
    padding: 4px 8px !important;
    font-size: 0.75rem !important;
    font-weight: 600 !important;
    border-radius: 6px !important;
    margin: 2px 4px !important;
    border: none !important;
    cursor: pointer;
}

.fc-h-event .fc-event-title {
    color: #4b4949;
}

.event-rapat { background-color: #f0f9ff !important; color: #0369a1 !important; border-left: 4px solid #0ea5e9 !important; }
.event-kunjungan { background-color: #f0fdf4 !important; color: #15803d !important; border-left: 4px solid #22c55e !important; }
.event-upacara { background-color: #fffbeb !important; color: #b45309 !important; border-left: 4px solid #f59e0b !important; }
.event-lainnya { background-color: #faf5ff !important; color: #7e22ce !important; border-left: 4px solid #a855f7 !important; }

.fc-day-today { background-color: transparent !important; }
.fc-day-today .fc-daygrid-day-number {
    background: var(--sidebar-active);
    color: white !important;
    border-radius: 50%;
    width: 28px;
    height: 28px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    margin: 4px;
}

/* Panels */
.card-panel {
    background: white;
    border-radius: 16px;
    border: 1px solid var(--border-color);
    padding: 20px;
    margin-bottom: 20px;
}

.panel-title { font-weight: 700; font-size: 0.95rem; margin-bottom: 16px; }

.agenda-item {
    position: relative;
    padding-left: 20px;
    border-left: 2px solid #e2e8f0;
    padding-bottom: 20px;
}

.agenda-item::before {
    content: '';
    position: absolute;
    left: -6px;
    top: 0;
    width: 10px;
    height: 10px;
    border-radius: 50%;
    background: #2563eb;
}

.legend-dot { width: 12px; height: 12px; border-radius: 3px; margin-right: 12px; }
</style>
<div class="row g-4">
    <div class="col-xl-9">
        <div class="calendar-container">
            <div id="calendar"></div>
        </div>
    </div>
    <!-- Right Sidebar Panels -->
    <div class="col-xl-3">
        <!-- Filter Button (Matching Image) -->
        <button class="btn btn-white border w-100 mb-4 py-2 fw-semibold small d-flex align-items-center justify-content-center">
            <i class="bi bi-filter me-2"></i> Filter
        </button>

        <!-- Agenda Today -->
        <div class="card-panel">
            <div class="panel-title">Agenda Hari Ini</div>
            <div class="text-muted small mb-3">Kamis, 22 Mei 2025</div>

            <div class="agenda-item">
                <div class="d-flex justify-content-between">
                    <span class="fw-bold small">08.30</span>
                    <span class="badge bg-primary-subtle text-primary border-0" style="font-size: 0.6rem;">PIMPINAN</span>
                </div>
                <div class="fw-bold small mt-1">Rapat Pimpinan</div>
                <div class="text-muted" style="font-size: 0.75rem;"><i class="bi bi-geo-alt me-1"></i> Ruang Rapat Melati</div>
                <div class="text-muted" style="font-size: 0.75rem;"><i class="bi bi-building me-1"></i> Kantor Bupati Asahan</div>
            </div>

            <div class="agenda-item border-0 pb-0">
                <div class="d-flex justify-content-between">
                    <span class="fw-bold small" style="color: #f59e0b;">13.00</span>
                    <span class="badge bg-warning-subtle text-warning border-0" style="font-size: 0.6rem;">KUNJUNGAN</span>
                </div>
                <div class="fw-bold small mt-1">Kunjungan Kerja</div>
                <div class="text-muted" style="font-size: 0.75rem;"><i class="bi bi-geo-alt me-1"></i> Kec. Air Batu</div>
            </div>

            <button class="btn btn-outline-primary btn-sm w-100 mt-3 border-opacity-25" style="font-size: 0.75rem;">Lihat Agenda Hari Ini <i class="bi bi-chevron-right ms-1"></i></button>
        </div>

        <!-- Legend -->
        <div class="card-panel">
            <div class="panel-title">Legenda</div>
            <div class="d-flex align-items-center mb-2 small"><div class="legend-dot" style="background: #0ea5e9;"></div> Rapat</div>
            <div class="d-flex align-items-center mb-2 small"><div class="legend-dot" style="background: #22c55e;"></div> Kunjungan / Audiensi</div>
            <div class="d-flex align-items-center mb-2 small"><div class="legend-dot" style="background: #f59e0b;"></div> Upacara / Seremoni</div>
            <div class="d-flex align-items-center mb-2 small"><div class="legend-dot" style="background: #a855f7;"></div> Kegiatan Lainnya</div>
            <div class="d-flex align-items-center small"><div class="legend-dot" style="background: #fee2e2; border: 1px solid #ef4444;"></div> Libur Nasional</div>
        </div>

        <!-- Sync -->
        <div class="card-panel">
            <div class="panel-title">Sinkronisasi Kalender</div>
            <p class="text-muted" style="font-size: 0.75rem;">Integrasikan dengan Google Calendar atau Outlook untuk sinkronisasi jadwal otomatis.</p>
            <button class="btn btn-outline-dark btn-sm w-100 d-flex align-items-center justify-content-between px-3" style="font-size: 0.75rem;">
                <span><i class="bi bi-calendar-plus me-2"></i> Hubungkan Kalender</span>
                <i class="bi bi-chevron-right small"></i>
            </button>
        </div>
    </div>

    <!-- Modal Detail Agenda -->
    <div class="modal fade" id="eventModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content shadow-lg">
                <div class="modal-header d-flex justify-content-between align-items-center">
                    <h6 class="modal-title fw-bold mb-0" id="modalEventTitle">Detail Kegiatan</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <div class="row">
                        <div class="col-12">
                            <div class="detail-label">Judul Agenda</div>
                            <h5 class="detail-value text-primary" id="eventDetailTitle">-</h5>
                        </div>
                        <div class="col-md-6">
                            <div class="detail-label">Tanggal</div>
                            <div class="detail-value" id="eventDetailDate">-</div>
                        </div>
                        <div class="col-md-6">
                            <div class="detail-label">Kategori</div>
                            <div class="detail-value"><span id="eventDetailCategory" class="badge">Kategori</span></div>
                        </div>
                        <div class="col-12">
                            <div class="detail-label">Lokasi</div>
                            <div class="detail-value"><i class="bi bi-geo-alt me-1 text-danger"></i> <span id="eventDetailLocation">Kantor Bupati Asahan</span></div>
                        </div>
                        <div class="col-12 mt-2">
                            <div class="p-3 bg-light rounded-3 small text-muted border">
                                <i class="bi bi-info-circle me-2"></i> Informasi tambahan terkait kegiatan pimpinan akan ditampilkan di sini berdasarkan database sistem.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer bg-light border-0 px-4 py-3">
                    <button type="button" class="btn btn-white border px-4 py-2 small fw-bold" data-bs-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-primary px-4 py-2 small fw-bold">Cetak Agenda</button>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer() ?>