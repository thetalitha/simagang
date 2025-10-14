@extends('layout/app')

@section('konten')
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard </title>
    <link href="{{ asset('sbadmin2/css/dashboard.css') }}" rel="stylesheet">
        
</head>

<body>
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Mentor Header -->
        <div class="mentor-header">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h1><i class="fas fa-chalkboard-teacher mr-2"></i>Dashboard Mentor</h1>
                    <p>Selamat datang, <strong id="mentorName">Budi Santoso</strong> - Mentor Room <strong id="mentorRoom">Technical</strong></p>
                </div>
                <div class="col-md-4 text-right">
                    <div class="stats-card d-inline-block">
                        <div class="stats-label">Total Peserta Anda</div>
                        <div class="stats-number" id="totalPeserta">13</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Room Card -->
        <h5 class="section-title">Room yang Anda Bimbing</h5>
        <div class="row mb-4">
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card room-card h-100 py-3" onclick="showRoomDetail()">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Room Technical</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">13 Peserta Aktif</div>
                                <div class="text-xs text-muted mt-2">
                                    <i class="fas fa-user-clock mr-1"></i>3 Periode Berjalan
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-laptop-code fa-3x text-primary" style="opacity: 0.3;"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Countdown Period Row -->
        <h5 class="section-title">Sisa Waktu Magang Per Periode di Room Anda</h5>
        <p class="text-muted small mb-3">Menampilkan periode yang sedang berjalan di room Technical. Klik untuk melihat detail peserta</p>
        <div class="row mb-4">
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card countdown-card h-100" onclick="showPeriodDetail('Agustus - Januari', 50)">
                    <div class="card-body text-center py-4">
                        <div class="countdown-circle">
                            <svg width="120" height="120">
                                <circle class="bg" cx="60" cy="60" r="52"></circle>
                                <circle class="progress" cx="60" cy="60" r="52" 
                                        stroke-dasharray="327" 
                                        stroke-dashoffset="98"></circle>
                            </svg>
                            <div class="countdown-text">50</div>
                        </div>
                        <h5 class="mb-1">Days Left</h5>
                        <p class="mb-1">Periode Agustus - Januari</p>
                        <small class="badge badge-light mt-2">6 Peserta</small>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card countdown-card h-100" onclick="showPeriodDetail('Juni - September', 30)">
                    <div class="card-body text-center py-4">
                        <div class="countdown-circle">
                            <svg width="120" height="120">
                                <circle class="bg" cx="60" cy="60" r="52"></circle>
                                <circle class="progress" cx="60" cy="60" r="52" 
                                        stroke-dasharray="327" 
                                        stroke-dashoffset="196"></circle>
                            </svg>
                            <div class="countdown-text">30</div>
                        </div>
                        <h5 class="mb-1">Days Left</h5>
                        <p class="mb-1">Periode Juni - September</p>
                        <small class="badge badge-light mt-2">4 Peserta</small>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card countdown-card h-100" onclick="showPeriodDetail('Februari - Mei', 75)">
                    <div class="card-body text-center py-4">
                        <div class="countdown-circle">
                            <svg width="120" height="120">
                                <circle class="bg" cx="60" cy="60" r="52"></circle>
                                <circle class="progress" cx="60" cy="60" r="52" 
                                        stroke-dasharray="327" 
                                        stroke-dashoffset="49"></circle>
                            </svg>
                            <div class="countdown-text">75</div>
                        </div>
                        <h5 class="mb-1">Days Left</h5>
                        <p class="mb-1">Periode Februari - Mei</p>
                        <small class="badge badge-light mt-2">3 Peserta</small>
                    </div>
                </div>
            </div>
        </div>

        <!-- Charts Row -->
        <div class="row">
            <!-- Active Participants Chart -->
            <div class="col-xl-6 col-lg-6 mb-4">
                <div class="chart-container">
                    <h6 class="m-0 font-weight-bold text-primary mb-3">
                        <i class="fas fa-user-check mr-2"></i>Peserta Aktif dari Room Technical Berdasarkan Institut
                    </h6>
                    <p class="text-muted small mb-3">Klik segment untuk melihat detail peserta dari institut tersebut</p>
                    <canvas id="activeChart"></canvas>
                </div>
            </div>

            <!-- Completed Participants Chart -->
            <div class="col-xl-6 col-lg-6 mb-4">
                <div class="chart-container">
                    <h6 class="m-0 font-weight-bold text-success mb-3">
                        <i class="fas fa-user-graduate mr-2"></i>Peserta Selesai dari Room Technical Berdasarkan Institut
                    </h6>
                    <p class="text-muted small mb-3">Klik segment untuk melihat detail peserta yang sudah selesai</p>
                    <canvas id="completedChart"></canvas>
                </div>
            </div>
        </div>

        <!-- Quick Stats -->
        <div class="row">
            <div class="col-12">
                <div class="chart-container">
                    <h6 class="m-0 font-weight-bold text-info mb-3">
                        <i class="fas fa-chart-bar mr-2"></i>Statistik Singkat
                    </h6>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="text-center p-3">
                                <i class="fas fa-users fa-2x text-primary mb-2"></i>
                                <h4 class="mb-0">13</h4>
                                <small class="text-muted">Peserta Aktif</small>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="text-center p-3">
                                <i class="fas fa-user-check fa-2x text-success mb-2"></i>
                                <h4 class="mb-0">8</h4>
                                <small class="text-muted">Peserta Selesai</small>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="text-center p-3">
                                <i class="fas fa-calendar-alt fa-2x text-warning mb-2"></i>
                                <h4 class="mb-0">3</h4>
                                <small class="text-muted">Periode Berjalan</small>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="text-center p-3">
                                <i class="fas fa-university fa-2x text-info mb-2"></i>
                                <h4 class="mb-0">5</h4>
                                <small class="text-muted">Institut Berbeda</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->

    <!-- Modal for Room Details -->
    <div class="modal fade" id="roomModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title">
                        <i class="fas fa-door-open mr-2"></i>Daftar Peserta Room Technical
                    </h5>
                    <button type="button" class="close text-white" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="thead-light">
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Institut</th>
                                    <th>Periode</th>
                                    <th>Sisa Hari</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody id="roomTableBody"></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for Period Details -->
    <div class="modal fade" id="periodModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white;">
                    <h5 class="modal-title" id="periodModalTitle">
                        <i class="fas fa-calendar-alt mr-2"></i>Peserta Periode
                    </h5>
                    <button type="button" class="close text-white" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="thead-light">
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Institut</th>
                                    <th>Sisa Hari</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody id="periodTableBody"></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for Institut Details -->
    <div class="modal fade" id="institutModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info text-white">
                    <h5 class="modal-title" id="institutModalTitle">
                        <i class="fas fa-university mr-2"></i>Peserta dari Institut
                    </h5>
                    <button type="button" class="close text-white" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="thead-light">
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Periode</th>
                                    <th>Sisa Hari / Selesai</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody id="institutTableBody"></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Dummy data untuk mentor Technical - Ganti dengan data dari Laravel backend
        // Data ini hanya menampilkan peserta dari room Technical saja
        
        const mentorRoom = 'Technical'; // Dari session/auth Laravel
        const mentorName = 'Budi Santoso'; // Dari session/auth Laravel
        
        const roomData = [
            {nama: 'Ahmad Rizki', institut: 'Universitas Indonesia', periode: 'Agustus - Januari', sisaHari: 50, status: 'Aktif'},
            {nama: 'Siti Nurhaliza', institut: 'ITB', periode: 'Agustus - Januari', sisaHari: 50, status: 'Aktif'},
            {nama: 'Budi Santoso', institut: 'UGM', periode: 'Juni - September', sisaHari: 30, status: 'Aktif'},
            {nama: 'Dewi Lestari', institut: 'Universitas Brawijaya', periode: 'Agustus - Januari', sisaHari: 50, status: 'Aktif'},
            {nama: 'Eko Prasetyo', institut: 'Universitas Airlangga', periode: 'Februari - Mei', sisaHari: 75, status: 'Aktif'},
            {nama: 'Fitri Handayani', institut: 'Universitas Indonesia', periode: 'Juni - September', sisaHari: 30, status: 'Aktif'},
            {nama: 'Galih Pratama', institut: 'UGM', periode: 'Agustus - Januari', sisaHari: 50, status: 'Aktif'},
            {nama: 'Hana Permata', institut: 'ITB', periode: 'Juni - September', sisaHari: 30, status: 'Aktif'},
            {nama: 'Irfan Setiawan', institut: 'Universitas Brawijaya', periode: 'Agustus - Januari', sisaHari: 50, status: 'Aktif'},
            {nama: 'Joko Widodo', institut: 'Universitas Airlangga', periode: 'Februari - Mei', sisaHari: 75, status: 'Aktif'},
            {nama: 'Kartika Sari', institut: 'UGM', periode: 'Juni - September', sisaHari: 30, status: 'Aktif'},
            {nama: 'Lina Marlina', institut: 'Universitas Indonesia', periode: 'Agustus - Januari', sisaHari: 50, status: 'Aktif'},
            {nama: 'Made Wirawan', institut: 'ITB', periode: 'Februari - Mei', sisaHari: 75, status: 'Aktif'}
        ];

        const periodData = {
            'Agustus - Januari': [
                {nama: 'Ahmad Rizki', institut: 'Universitas Indonesia', sisaHari: 50, status: 'Aktif'},
                {nama: 'Siti Nurhaliza', institut: 'ITB', sisaHari: 50, status: 'Aktif'},
                {nama: 'Dewi Lestari', institut: 'Universitas Brawijaya', sisaHari: 50, status: 'Aktif'},
                {nama: 'Galih Pratama', institut: 'UGM', sisaHari: 50, status: 'Aktif'},
                {nama: 'Irfan Setiawan', institut: 'Universitas Brawijaya', sisaHari: 50, status: 'Aktif'},
                {nama: 'Lina Marlina', institut: 'Universitas Indonesia', sisaHari: 50, status: 'Aktif'}
            ],
            'Juni - September': [
                {nama: 'Budi Santoso', institut: 'UGM', sisaHari: 30, status: 'Aktif'},
                {nama: 'Fitri Handayani', institut: 'Universitas Indonesia', sisaHari: 30, status: 'Aktif'},
                {nama: 'Hana Permata', institut: 'ITB', sisaHari: 30, status: 'Aktif'},
                {nama: 'Kartika Sari', institut: 'UGM', sisaHari: 30, status: 'Aktif'}
            ],
            'Februari - Mei': [
                {nama: 'Eko Prasetyo', institut: 'Universitas Airlangga', sisaHari: 75, status: 'Aktif'},
                {nama: 'Joko Widodo', institut: 'Universitas Airlangga', sisaHari: 75, status: 'Aktif'},
                {nama: 'Made Wirawan', institut: 'ITB', sisaHari: 75, status: 'Aktif'}
            ]
        };

        const institutActiveData = {
            'Universitas Indonesia': [
                {nama: 'Ahmad Rizki', periode: 'Agustus - Januari', sisaHari: 50, status: 'Aktif'},
                {nama: 'Fitri Handayani', periode: 'Juni - September', sisaHari: 30, status: 'Aktif'},
                {nama: 'Lina Marlina', periode: 'Agustus - Januari', sisaHari: 50, status: 'Aktif'}
            ],
            'ITB': [
                {nama: 'Siti Nurhaliza', periode: 'Agustus - Januari', sisaHari: 50, status: 'Aktif'},
                {nama: 'Hana Permata', periode: 'Juni - September', sisaHari: 30, status: 'Aktif'},
                {nama: 'Made Wirawan', periode: 'Februari - Mei', sisaHari: 75, status: 'Aktif'}
            ],
            'UGM': [
                {nama: 'Budi Santoso', periode: 'Juni - September', sisaHari: 30, status: 'Aktif'},
                {nama: 'Galih Pratama', periode: 'Agustus - Januari', sisaHari: 50, status: 'Aktif'},
                {nama: 'Kartika Sari', periode: 'Juni - September', sisaHari: 30, status: 'Aktif'}
            ],
            'Universitas Brawijaya': [
                {nama: 'Dewi Lestari', periode: 'Agustus - Januari', sisaHari: 50, status: 'Aktif'},
                {nama: 'Irfan Setiawan', periode: 'Agustus - Januari', sisaHari: 50, status: 'Aktif'}
            ],
            'Universitas Airlangga': [
                {nama: 'Eko Prasetyo', periode: 'Februari - Mei', sisaHari: 75, status: 'Aktif'},
                {nama: 'Joko Widodo', periode: 'Februari - Mei', sisaHari: 75, status: 'Aktif'}
            ]
        };

        const institutCompletedData = {
            'Universitas Indonesia': [
                {nama: 'Rudi Hartono', periode: 'Februari - Mei 2024', selesai: 'Juni 2024', status: 'Selesai'},
                {nama: 'Tono Sugiarto', periode: 'Juni - September 2024', selesai: 'September 2024', status: 'Selesai'}
            ],
            'ITB': [
                {nama: 'Wulan Dari', periode: 'Juni - September 2024', selesai: 'September 2024', status: 'Selesai'},
                {nama: 'Zaki Permana', periode: 'Agustus - Januari 2024', selesai: 'Januari 2024', status: 'Selesai'}
            ],
            'UGM': [
                {nama: 'Benny Sutrisno', periode: 'Februari - Mei 2024', selesai: 'Mei 2024', status: 'Selesai'},
                {nama: 'Fanny Ghassani', periode: 'Agustus - Januari 2024', selesai: 'Januari 2024', status: 'Selesai'}
            ],
            'Universitas Brawijaya': [
                {nama: 'Gita Gutawa', periode: 'Juni - September 2024', selesai: 'September 2024', status: 'Selesai'}
            ],
            'Universitas Airlangga': [
                {nama: 'Jefri Nichol', periode: 'Juni - September 2024', selesai: 'September 2024', status: 'Selesai'}
            ]
        };

        function showRoomDetail() {
            const tbody = $('#roomTableBody');
            tbody.empty();
            
            roomData.forEach((item, index) => {
                tbody.append(`
                    <tr>
                        <td>${index + 1}</td>
                        <td><strong>${item.nama}</strong></td>
                        <td>${item.institut}</td>
                        <td>${item.periode}</td>
                        <td><span class="badge badge-warning">${item.sisaHari} hari</span></td>
                        <td><span class="badge badge-success">${item.status}</span></td>
                    </tr>
                `);
            });
            
            $('#roomModal').modal('show');
        }

        function showPeriodDetail(periode, days) {
            $('#periodModalTitle').html(`<i class="fas fa-calendar-alt mr-2"></i>Peserta Periode ${periode} <span class="badge badge-light ml-2">${days} hari tersisa</span>`);
            const tbody = $('#periodTableBody');
            tbody.empty();
            
            const data = periodData[periode] || [];
            data.forEach((item, index) => {
                tbody.append(`
                    <tr>
                        <td>${index + 1}</td>
                        <td><strong>${item.nama}</strong></td>
                        <td>${item.institut}</td>
                        <td><span class="badge badge-info">${item.sisaHari} hari</span></td>
                        <td><span class="badge badge-success">${item.status}</span></td>
                    </tr>
                `);
            });
            
            $('#periodModal').modal('show');
        }

        function showInstitutDetail(institut, type) {
            $('#institutModalTitle').html(`<i class="fas fa-university mr-2"></i>Peserta dari ${institut} - Room ${mentorRoom}`);
            const tbody = $('#institutTableBody');
            tbody.empty();
            
            const data = type === 'active' ? institutActiveData[institut] : institutCompletedData[institut];
            if (data) {
                data.forEach((item, index) => {
                    const statusBadge = item.status === 'Aktif' ? 'badge-success' : 'badge-secondary';
                    const sisaInfo = item.status === 'Aktif' ? 
                        `<span class="badge badge-warning">${item.sisaHari} hari</span>` : 
                        `<span class="badge badge-secondary">${item.selesai}</span>`;
                    
                    tbody.append(`
                        <tr>
                            <td>${index + 1}</td>
                            <td><strong>${item.nama}</strong></td>
                            <td>${item.periode}</td>
                            <td>${sisaInfo}</td>
                            <td><span class="badge ${statusBadge}">${item.status}</span></td>
                        </tr>
                    `);
                });
            }
            
            $('#institutModal').modal('show');
        }

        // Active Participants Chart (Bar)
        const activeCtx = document.getElementById('activeChart').getContext('2d');
        const activeChart = new Chart(activeCtx, {
            type: 'bar',
            data: {
                labels: ['Universitas Indonesia', 'ITB', 'UGM', 'Univ. Brawijaya', 'Univ. Airlangga'],
                datasets: [{
                    label: 'Peserta Aktif',
                    data: [3, 3, 3, 2, 2],
                    backgroundColor: 'rgba(78, 115, 223, 0.8)',
                    borderColor: 'rgba(78, 115, 223, 1)',
                    borderWidth: 2,
                    borderRadius: 5
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: true,
                onClick: (e, activeEls) => {
                    if (activeEls.length > 0) {
                        const index = activeEls[0].index;
                        const label = activeChart.data.labels[index];
                        showInstitutDetail(label, 'active');
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 1
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: true,
                        position: 'top'
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                let label = context.dataset.label || '';
                                if (label) {
                                    label += ': ';
                                }
                                label += context.parsed.y + ' peserta';
                                return label;
                            },
                            afterLabel: function() {
                                return '👆 Klik untuk detail';
                            }
                        }
                    }
                }
            }
        });

        // Completed Participants Chart (Bar)
        const completedCtx = document.getElementById('completedChart').getContext('2d');
        const completedChart = new Chart(completedCtx, {
            type: 'bar',
            data: {
                labels: ['Universitas Indonesia', 'ITB', 'UGM', 'Univ. Brawijaya', 'Univ. Airlangga'],
                datasets: [{
                    label: 'Peserta Selesai',
                    data: [2, 2, 2, 1, 1],
                    backgroundColor: 'rgba(28, 200, 138, 0.8)',
                    borderColor: 'rgba(28, 200, 138, 1)',
                    borderWidth: 2,
                    borderRadius: 5
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: true,
                onClick: (e, activeEls) => {
                    if (activeEls.length > 0) {
                        const index = activeEls[0].index;
                        const label = completedChart.data.labels[index];
                        showInstitutDetail(label, 'completed');
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 1
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: true,
                        position: 'top'
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                let label = context.dataset.label || '';
                                if (label) {
                                    label += ': ';
                                }
                                label += context.parsed.y + ' peserta';
                                return label;
                            },
                            afterLabel: function() {
                                return '👆 Klik untuk detail';
                            }
                        }
                    }
                }
            }
        });
    </script>
</body>
</html>
    
@endsection