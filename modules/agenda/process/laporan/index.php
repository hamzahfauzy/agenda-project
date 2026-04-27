<?php
use Core\Page;
Page::setActive('agenda.laporan');
Page::setTitle('Laporan');

$script = "
<script>
    // Start script after window load to ensure all resources (Lucide, Chart.js) are ready
    window.onload = function() {
        // Initialize Icons
        if (typeof lucide !== 'undefined') {
            lucide.createIcons();
        } else {
            console.error('Lucide failed to load');
        }

        // Category Chart
        const catCanvas = document.getElementById('categoryChart');
        if (catCanvas) {
            const catCtx = catCanvas.getContext('2d');
            new Chart(catCtx, {
                type: 'doughnut',
                data: {
                    labels: ['Rapat', 'Kunjungan Kerja', 'Audiensi', 'Upacara', 'Lainnya'],
                    datasets: [{
                        data: [114, 72, 45, 28, 27],
                        backgroundColor: ['#2563eb', '#22c55e', '#eab308', '#a855f7', '#cbd5e1'],
                        borderWidth: 0,
                        cutout: '75%'
                    }]
                },
                options: {
                    plugins: { legend: { display: false } },
                    maintainAspectRatio: false
                }
            });
        }

        // Line Chart
        const lineCanvas = document.getElementById('lineChart');
        if (lineCanvas) {
            const lineCtx = lineCanvas.getContext('2d');
            new Chart(lineCtx, {
                type: 'line',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
                    datasets: [{
                        data: [210, 198, 235, 265, 286, null, null, null, null, null, null, null],
                        borderColor: '#2563eb',
                        backgroundColor: 'rgba(37, 99, 235, 0.1)',
                        fill: true,
                        tension: 0.4,
                        pointRadius: 4,
                        pointBackgroundColor: '#fff',
                        pointBorderWidth: 2
                    }]
                },
                options: {
                    plugins: { legend: { display: false } },
                    scales: {
                        y: { beginAtZero: true, grid: { display: false }, ticks: { font: { size: 10 } } },
                        x: { grid: { display: false }, ticks: { font: { size: 10 } } }
                    },
                    maintainAspectRatio: false
                }
            });
        }
    };
</script>";

Page::pushFoot('<script src="https://unpkg.com/lucide@latest"></script><script src="https://cdn.jsdelivr.net/npm/chart.js"></script>'.$script);

return view('agenda/views/laporan');