<?php
use Core\Page;
Page::setActive('agenda.kalender');
Page::setTitle('Kalender');

$script = "
<script>
document.addEventListener('DOMContentLoaded', function() {
    const calendarEl = document.getElementById('calendar');
    const eventModal = new bootstrap.Modal(document.getElementById('eventModal'));
    
    const calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        initialDate: '2025-05-22',
        locale: 'id',
        firstDay: 1, // Start week on Monday
        headerToolbar: {
            left: 'today prev,next',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay'
        },
        buttonText: {
            today: 'Hari Ini',
            month: 'Bulan',
            week: 'Minggu',
            day: 'Hari'
        },
        events: [
            { title: '08.30 Rapat Internal', start: '2025-04-29', className: 'event-kunjungan' },
            { title: '13.30 Audiensi BUMN', start: '2025-04-29', className: 'event-rapat' },
            { title: '09.00 Upacara Hari Buruh', start: '2025-05-01', className: 'event-upacara' },
            { title: '09.00 Rapat Pimpinan', start: '2025-05-05', className: 'event-kunjungan' },
            { title: '14.00 Kunjungan Kerja', start: '2025-05-05', className: 'event-rapat' },
            { title: '10.00 Audiensi DPRD', start: '2025-05-06', className: 'event-rapat' },
            { title: '09.00 Rapat OPD', start: '2025-05-07', className: 'event-lainnya' },
            { title: '13.30 Kunjungan', start: '2025-05-07', className: 'event-kunjungan' },
            { title: '08.30 Rapat Forkopimda', start: '2025-05-08', className: 'event-rapat' },
            { title: '10.00 Seminar Pendidikan', start: '2025-05-09', className: 'event-upacara' },
            { title: '09.00 Rapat Evaluasi', start: '2025-05-12', className: 'event-kunjungan' },
            { title: '09.00 Kunjungan Lapangan', start: '2025-05-14', className: 'event-upacara' },
            { title: '08.30 Rakor Program Daerah', start: '2025-05-15', className: 'event-lainnya' },
            { title: '13.30 Audiensi', start: '2025-05-15', className: 'event-kunjungan' },
            { title: '08.30 Rapat Pimpinan', start: '2025-05-22', className: 'event-rapat' },
            { title: '13.00 Kunjungan Kerja', start: '2025-05-22', className: 'event-upacara' }
        ],
        eventClick: function(info) {
            const event = info.event;
            
            // Update Konten Modal
            document.getElementById('eventDetailTitle').innerText = event.title;
            document.getElementById('eventDetailDate').innerText = event.start.toLocaleDateString('id-ID', { 
                weekday: 'long', 
                year: 'numeric', 
                month: 'long', 
                day: 'numeric' 
            });
            
            const categoryEl = document.getElementById('eventDetailCategory');
            const category = event.extendedProps.category || 'Umum';
            categoryEl.innerText = category;
            
            // Sesuaikan warna badge kategori
            categoryEl.className = 'badge';
            if (event.classNames.includes('event-rapat')) categoryEl.classList.add('bg-primary-subtle', 'text-primary');
            else if (event.classNames.includes('event-kunjungan')) categoryEl.classList.add('bg-success-subtle', 'text-success');
            else if (event.classNames.includes('event-upacara')) categoryEl.classList.add('bg-warning-subtle', 'text-warning');
            else categoryEl.classList.add('bg-secondary-subtle', 'text-secondary');

            document.getElementById('eventDetailLocation').innerText = event.extendedProps.location || 'Lokasi Belum Ditentukan';

            // Tampilkan Modal
            eventModal.show();
        },
        dayHeaderFormat: { weekday: 'long' },
        height: 'auto'
    });
    calendar.render();

    // Toggle Sidebar
    const sidebar = document.getElementById('sidebar');
    const mainContent = document.getElementById('mainContent');
    const toggleBtn = document.getElementById('sidebarToggle');

    toggleBtn.addEventListener('click', function() {
        if(window.innerWidth > 992) {
            sidebar.classList.toggle('collapsed');
            mainContent.classList.toggle('expanded');
        } else {
            sidebar.classList.toggle('active');
        }
        setTimeout(() => calendar.updateSize(), 350);
    });
});
</script>
";

Page::pushFoot('<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.10/index.global.min.js"></script><script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>'.$script);
return view('agenda/views/kalender');