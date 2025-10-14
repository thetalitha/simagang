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
        <!-- Page Heading -->
        <div class="page-heading">
            <h1 class="h3 mb-2 text-gray-800">Dashboard Monitoring Peserta Magang</h1>
    
        </div>

        <!-- Room Cards Row -->
        <h5 class="section-title">Jumlah Peserta Berdasarkan Room</h5>
        <div class="row mb-4">
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card room-card technical h-100 py-2" onclick="showRoomDetail('Technical')">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Room Technical</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">13 Peserta</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-laptop-code fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card room-card marketing h-100 py-2" onclick="showRoomDetail('Marketing')">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Room Marketing</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">8 Peserta</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-bullhorn fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card room-card finance h-100 py-2" onclick="showRoomDetail('Finance')">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Room Finance</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">6 Peserta</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-chart-line fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card room-card hr h-100 py-2" onclick="showRoomDetail('HR')">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Room HR</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">5 Peserta</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-users fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Countdown Period Row -->
        <h5 class="section-title">Sisa Waktu Magang Per Periode</h5>
        <p class="text-muted small mb-3">Klik card untuk melihat daftar peserta magang dalam periode tersebut</p>
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
                        <p class="mb-0">Periode Agustus - Januari</p>
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
                        <p class="mb-0">Periode Juni - September</p>
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
                        <p class="mb-0">Periode Februari - Mei</p>
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
                        <i class="fas fa-user-check mr-2"></i>Peserta Aktif Berdasarkan Institut
                    </h6>
                    <p class="text-muted small mb-3">Klik bar untuk melihat detail peserta</p>
                    <canvas id="activeChart"></canvas>
                </div>
            </div>

            <!-- Completed Participants Chart -->
            <div class="col-xl-6 col-lg-6 mb-4">
                <div class="chart-container">
                    <h6 class="m-0 font-weight-bold text-success mb-3">
                        <i class="fas fa-user-graduate mr-2"></i>Peserta Selesai Berdasarkan Institut
                    </h6>
                    <p class="text-muted small mb-3">Klik bar untuk melihat detail peserta</p>
                    <canvas id="completedChart"></canvas>
                </div>
            </div>
        </div>

        <!-- Trend Chart -->
        <div class="row">
            <div class="col-12">
                <div class="chart-container">
                    <h6 class="m-0 font-weight-bold text-info mb-3">
                        <i class="fas fa-chart-line mr-2"></i>Grafik Jumlah Peserta Magang Per Periode
                    </h6>
                    <p class="text-muted small mb-3">Menampilkan tren jumlah peserta magang yang masuk setiap periode</p>
                    <canvas id="trendChart"></canvas>
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
                    <h5 class="modal-title" id="roomModalTitle">
                        <i class="fas fa-door-open mr-2"></i>Peserta Room
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
                                    <th>Room</th>
                                    <th>Sisa Hari</th>
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
                                    <th>Room</th>
                                    <th>Periode</th>
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
        // Dummy data - Ganti dengan data dari Laravel backend
        const roomData = {
            'Technical': [
                {nama: 'Ahmad Rizki', institut: 'Universitas Indonesia', periode: 'Agustus - Januari', status: 'Aktif'},
                {nama: 'Siti Nurhaliza', institut: 'ITB', periode: 'Agustus - Januari', status: 'Aktif'},
                {nama: 'Budi Santoso', institut: 'UGM', periode: 'Juni - September', status: 'Aktif'},
                {nama: 'Dewi Lestari', institut: 'Universitas Brawijaya', periode: 'Agustus - Januari', status: 'Aktif'},
                {nama: 'Eko Prasetyo', institut: 'Universitas Airlangga', periode: 'Februari - Mei', status: 'Aktif'},
                {nama: 'Fitri Handayani', institut: 'Universitas Indonesia', periode: 'Juni - September', status: 'Aktif'},
                {nama: 'Galih Pratama', institut: 'UGM', periode: 'Agustus - Januari', status: 'Aktif'},
                {nama: 'Hana Permata', institut: 'ITB', periode: 'Juni - September', status: 'Aktif'},
                {nama: 'Irfan Setiawan', institut: 'Universitas Brawijaya', periode: 'Agustus - Januari', status: 'Aktif'},
                {nama: 'Joko Widodo', institut: 'Universitas Airlangga', periode: 'Februari - Mei', status: 'Aktif'},
                {nama: 'Kartika Sari', institut: 'UGM', periode: 'Juni - September', status: 'Aktif'},
                {nama: 'Lina Marlina', institut: 'Universitas Indonesia', periode: 'Agustus - Januari', status: 'Aktif'},
                {nama: 'Made Wirawan', institut: 'ITB', periode: 'Februari - Mei', status: 'Aktif'}
            ],
            'Marketing': [
                {nama: 'Nina Kusuma', institut: 'Universitas Brawijaya', periode: 'Agustus - Januari', status: 'Aktif'},
                {nama: 'Omar Bakri', institut: 'Universitas Airlangga', periode: 'Februari - Mei', status: 'Aktif'},
                {nama: 'Putri Ayu', institut: 'Universitas Indonesia', periode: 'Juni - September', status: 'Aktif'},
                {nama: 'Qori Sandika', institut: 'UGM', periode: 'Agustus - Januari', status: 'Aktif'},
                {nama: 'Rina Susanti', institut: 'ITB', periode: 'Juni - September', status: 'Aktif'},
                {nama: 'Sandi Permana', institut: 'Universitas Brawijaya', periode: 'Agustus - Januari', status: 'Aktif'},
                {nama: 'Taufik Hidayat', institut: 'Universitas Airlangga', periode: 'Februari - Mei', status: 'Aktif'},
                {nama: 'Umar Hadi', institut: 'UGM', periode: 'Juni - September', status: 'Aktif'}
            ],
            'Finance': [
                {nama: 'Vina Melinda', institut: 'Universitas Indonesia', periode: 'Juni - September', status: 'Aktif'},
                {nama: 'Wawan Setiawan', institut: 'ITB', periode: 'Agustus - Januari', status: 'Aktif'},
                {nama: 'Xena Putri', institut: 'UGM', periode: 'Februari - Mei', status: 'Aktif'},
                {nama: 'Yudi Prasetyo', institut: 'Universitas Brawijaya', periode: 'Juni - September', status: 'Aktif'},
                {nama: 'Zahra Amalia', institut: 'Universitas Airlangga', periode: 'Agustus - Januari', status: 'Aktif'},
                {nama: 'Andi Wijaya', institut: 'Universitas Indonesia', periode: 'Februari - Mei', status: 'Aktif'}
            ],
            'HR': [
                {nama: 'Bayu Saputra', institut: 'UGM', periode: 'Agustus - Januari', status: 'Aktif'},
                {nama: 'Citra Dewi', institut: 'ITB', periode: 'Juni - September', status: 'Aktif'},
                {nama: 'Doni Hermawan', institut: 'Universitas Brawijaya', periode: 'Agustus - Januari', status: 'Aktif'},
                {nama: 'Eka Saputri', institut: 'Universitas Airlangga', periode: 'Februari - Mei', status: 'Aktif'},
                {nama: 'Fajar Rahman', institut: 'Universitas Indonesia', periode: 'Juni - September', status: 'Aktif'}
            ]
        };

        const periodData = {
            'Agustus - Januari': [
                {nama: 'Ahmad Rizki', institut: 'Universitas Indonesia', room: 'Technical', sisaHari: 50},
                {nama: 'Siti Nurhaliza', institut: 'ITB', room: 'Technical', sisaHari: 50},
                {nama: 'Dewi Lestari', institut: 'Universitas Brawijaya', room: 'Technical', sisaHari: 50},
                {nama: 'Galih Pratama', institut: 'UGM', room: 'Technical', sisaHari: 50},
                {nama: 'Irfan Setiawan', institut: 'Universitas Brawijaya', room: 'Technical', sisaHari: 50},
                {nama: 'Lina Marlina', institut: 'Universitas Indonesia', room: 'Technical', sisaHari: 50},
                {nama: 'Nina Kusuma', institut: 'Universitas Brawijaya', room: 'Marketing', sisaHari: 50},
                {nama: 'Qori Sandika', institut: 'UGM', room: 'Marketing', sisaHari: 50},
                {nama: 'Sandi Permana', institut: 'Universitas Brawijaya', room: 'Marketing', sisaHari: 50},
                {nama: 'Wawan Setiawan', institut: 'ITB', room: 'Finance', sisaHari: 50},
                {nama: 'Zahra Amalia', institut: 'Universitas Airlangga', room: 'Finance', sisaHari: 50},
                {nama: 'Bayu Saputra', institut: 'UGM', room: 'HR', sisaHari: 50},
                {nama: 'Doni Hermawan', institut: 'Universitas Brawijaya', room: 'HR', sisaHari: 50}
            ],
            'Juni - September': [
                {nama: 'Budi Santoso', institut: 'UGM', room: 'Technical', sisaHari: 30},
                {nama: 'Fitri Handayani', institut: 'Universitas Indonesia', room: 'Technical', sisaHari: 30},
                {nama: 'Hana Permata', institut: 'ITB', room: 'Technical', sisaHari: 30},
                {nama: 'Kartika Sari', institut: 'UGM', room: 'Technical', sisaHari: 30},
                {nama: 'Putri Ayu', institut: 'Universitas Indonesia', room: 'Marketing', sisaHari: 30},
                {nama: 'Rina Susanti', institut: 'ITB', room: 'Marketing', sisaHari: 30},
                {nama: 'Umar Hadi', institut: 'UGM', room: 'Marketing', sisaHari: 30},
                {nama: 'Vina Melinda', institut: 'Universitas Indonesia', room: 'Finance', sisaHari: 30},
                {nama: 'Yudi Prasetyo', institut: 'Universitas Brawijaya', room: 'Finance', sisaHari: 30},
                {nama: 'Citra Dewi', institut: 'ITB', room: 'HR', sisaHari: 30},
                {nama: 'Fajar Rahman', institut: 'Universitas Indonesia', room: 'HR', sisaHari: 30}
            ],
            'Februari - Mei': [
                {nama: 'Eko Prasetyo', institut: 'Universitas Airlangga', room: 'Technical', sisaHari: 75},
                {nama: 'Joko Widodo', institut: 'Universitas Airlangga', room: 'Technical', sisaHari: 75},
                {nama: 'Made Wirawan', institut: 'ITB', room: 'Technical', sisaHari: 75},
                {nama: 'Omar Bakri', institut: 'Universitas Airlangga', room: 'Marketing', sisaHari: 75},
                {nama: 'Taufik Hidayat', institut: 'Universitas Airlangga', room: 'Marketing', sisaHari: 75},
                {nama: 'Xena Putri', institut: 'UGM', room: 'Finance', sisaHari: 75},
                {nama: 'Andi Wijaya', institut: 'Universitas Indonesia', room: 'Finance', sisaHari: 75},
                {nama: 'Eka Saputri', institut: 'Universitas Airlangga', room: 'HR', sisaHari: 75}
            ]
        };

        const institutActiveData = {
            'Universitas Indonesia': [
                {nama: 'Ahmad Rizki', room: 'Technical', periode: 'Agustus - Januari', status: 'Aktif'},
                {nama: 'Fitri Handayani', room: 'Technical', periode: 'Juni - September', status: 'Aktif'},
                {nama: 'Lina Marlina', room: 'Technical', periode: 'Agustus - Januari', status: 'Aktif'},
                {nama: 'Putri Ayu', room: 'Marketing', periode: 'Juni - September', status: 'Aktif'},
                {nama: 'Vina Melinda', room: 'Finance', periode: 'Juni - September', status: 'Aktif'},
                {nama: 'Andi Wijaya', room: 'Finance', periode: 'Februari - Mei', status: 'Aktif'},
                {nama: 'Fajar Rahman', room: 'HR', periode: 'Juni - September', status: 'Aktif'}
            ],
            'ITB': [
                {nama: 'Siti Nurhaliza', room: 'Technical', periode: 'Agustus - Januari', status: 'Aktif'},
                {nama: 'Hana Permata', room: 'Technical', periode: 'Juni - September', status: 'Aktif'},
                {nama: 'Made Wirawan', room: 'Technical', periode: 'Februari - Mei', status: 'Aktif'},
                {nama: 'Rina Susanti', room: 'Marketing', periode: 'Juni - September', status: 'Aktif'},
                {nama: 'Wawan Setiawan', room: 'Finance', periode: 'Agustus - Januari', status: 'Aktif'},
                {nama: 'Citra Dewi', room: 'HR', periode: 'Juni - September', status: 'Aktif'}
            ],
            'UGM': [
                {nama: 'Budi Santoso', room: 'Technical', periode: 'Juni - September', status: 'Aktif'},
                {nama: 'Galih Pratama', room: 'Technical', periode: 'Agustus - Januari', status: 'Aktif'},
                {nama: 'Kartika Sari', room: 'Technical', periode: 'Juni - September', status: 'Aktif'},
                {nama: 'Qori Sandika', room: 'Marketing', periode: 'Agustus - Januari', status: 'Aktif'},
                {nama: 'Umar Hadi', room: 'Marketing', periode: 'Juni - September', status: 'Aktif'},
                {nama: 'Xena Putri', room: 'Finance', periode: 'Februari - Mei', status: 'Aktif'},
                {nama: 'Bayu Saputra', room: 'HR', periode: 'Agustus - Januari', status: 'Aktif'}
            ],
            'Universitas Brawijaya': [
                {nama: 'Dewi Lestari', room: 'Technical', periode: 'Agustus - Januari', status: 'Aktif'},
                {nama: 'Irfan Setiawan', room: 'Technical', periode: 'Agustus - Januari', status: 'Aktif'},
                {nama: 'Nina Kusuma', room: 'Marketing', periode: 'Agustus - Januari', status: 'Aktif'},
                {nama: 'Sandi Permana', room: 'Marketing', periode: 'Agustus - Januari', status: 'Aktif'},
                {nama: 'Yudi Prasetyo', room: 'Finance', periode: 'Juni - September', status: 'Aktif'},
                {nama: 'Doni Hermawan', room: 'HR', periode: 'Agustus - Januari', status: 'Aktif'}
            ],
            'Universitas Airlangga': [
                {nama: 'Eko Prasetyo', room: 'Technical', periode: 'Februari - Mei', status: 'Aktif'},
                {nama: 'Joko Widodo', room: 'Technical', periode: 'Februari - Mei', status: 'Aktif'},
                {nama: 'Omar Bakri', room: 'Marketing', periode: 'Februari - Mei', status: 'Aktif'},
                {nama: 'Taufik Hidayat', room: 'Marketing', periode: 'Februari - Mei', status: 'Aktif'},
                {nama: 'Zahra Amalia', room: 'Finance', periode: 'Agustus - Januari', status: 'Aktif'},
                {nama: 'Eka Saputri', room: 'HR', periode: 'Februari - Mei', status: 'Aktif'}
            ]
        };

        const institutCompletedData = {
            'Universitas Indonesia': [
                {nama: 'Rudi Hartono', room: 'Technical', periode: 'Februari - Mei 2024', status: 'Selesai'},
                {nama: 'Siska Wijaya', room: 'Marketing', periode: 'Agustus - Januari 2024', status: 'Selesai'},
                {nama: 'Tono Sugiarto', room: 'Finance', periode: 'Juni - September 2024', status: 'Selesai'},
                {nama: 'Uci Sanusi', room: 'HR', periode: 'Februari - Mei 2024', status: 'Selesai'},
                {nama: 'Vivi Lestari', room: 'Technical', periode: 'Agustus - Januari 2024', status: 'Selesai'}
            ],
            'ITB': [
                {nama: 'Wulan Dari', room: 'Technical', periode: 'Juni - September 2024', status: 'Selesai'},
                {nama: 'Yanto Basuki', room: 'Marketing', periode: 'Februari - Mei 2024', status: 'Selesai'},
                {nama: 'Zaki Permana', room: 'Finance', periode: 'Agustus - Januari 2024', status: 'Selesai'},
                {nama: 'Ani Yudhoyono', room: 'HR', periode: 'Juni - September 2024', status: 'Selesai'}
            ],
            'UGM': [
                {nama: 'Benny Sutrisno', room: 'Technical', periode: 'Februari - Mei 2024', status: 'Selesai'},
                {nama: 'Cindy Claudia', room: 'Marketing', periode: 'Agustus - Januari 2024', status: 'Selesai'},
                {nama: 'Dedy Mizwar', room: 'Finance', periode: 'Juni - September 2024', status: 'Selesai'},
                {nama: 'Endang Rahayu', room: 'HR', periode: 'Februari - Mei 2024', status: 'Selesai'},
                {nama: 'Fanny Ghassani', room: 'Technical', periode: 'Agustus - Januari 2024', status: 'Selesai'}
            ],
            'Universitas Brawijaya': [
                {nama: 'Gita Gutawa', room: 'Technical', periode: 'Juni - September 2024', status: 'Selesai'},
                {nama: 'Hendra Gunawan', room: 'Marketing', periode: 'Februari - Mei 2024', status: 'Selesai'},
                {nama: 'Indah Permatasari', room: 'Finance', periode: 'Agustus - Januari 2024', status: 'Selesai'}
            ],
            'Universitas Airlangga': [
                {nama: 'Jefri Nichol', room: 'Technical', periode: 'Juni - September 2024', status: 'Selesai'},
                {nama: 'Kirana Larasati', room: 'Marketing', periode: 'Februari - Mei 2024', status: 'Selesai'},
                {nama: 'Luna Maya', room: 'Finance', periode: 'Agustus - Januari 2024', status: 'Selesai'},
                {nama: 'Maruli Tampubolon', room: 'HR', periode: 'Juni - September 2024', status: 'Selesai'}
            ]
        };

        function showRoomDetail(room) {
            $('#roomModalTitle').html('<i class="fas fa-door-open mr-2"></i>Peserta Room ' + room);
            const tbody = $('#roomTableBody');
            tbody.empty();
            
            const data = roomData[room] || [];
            data.forEach((item, index) => {
                tbody.append(`
                    <tr>
                        <td>${index + 1}</td>
                        <td><strong>${item.nama}</strong></td>
                        <td>${item.institut}</td>
                        <td>${item.periode}</td>
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
                        <td><span class="badge badge-primary">${item.room}</span></td>
                        <td><span class="badge badge-info">${item.sisaHari} hari</span></td>
                    </tr>
                `);
            });
            
            $('#periodModal').modal('show');
        }

        function showInstitutDetail(institut, type) {
            $('#institutModalTitle').html(`<i class="fas fa-university mr-2"></i>Peserta dari ${institut}`);
            const tbody = $('#institutTableBody');
            tbody.empty();
            
            const data = type === 'active' ? institutActiveData[institut] : institutCompletedData[institut];
            if (data) {
                data.forEach((item, index) => {
                    const statusBadge = item.status === 'Aktif' ? 'badge-success' : 'badge-secondary';
                    tbody.append(`
                        <tr>
                            <td>${index + 1}</td>
                            <td><strong>${item.nama}</strong></td>
                            <td><span class="badge badge-primary">${item.room}</span></td>
                            <td>${item.periode}</td>
                            <td><span class="badge ${statusBadge}">${item.status}</span></td>
                        </tr>
                    `);
                });
            }
            
            $('#institutModal').modal('show');
        }

        // Active Participants Chart
        const activeCtx = document.getElementById('activeChart').getContext('2d');
        const activeChart = new Chart(activeCtx, {
            type: 'bar',
            data: {
                labels: ['Universitas Indonesia', 'ITB', 'UGM', 'Univ. Brawijaya', 'Univ. Airlangga'],
                datasets: [{
                    label: 'Peserta Aktif',
                    data: [7, 6, 7, 6, 6],
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
                            stepSize: 2
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
                            afterLabel: function() {
                                return '👆 Klik untuk detail';
                            }
                        }
                    }
                }
            }
        });

        // Completed Participants Chart
        const completedCtx = document.getElementById('completedChart').getContext('2d');
        const completedChart = new Chart(completedCtx, {
            type: 'bar',
            data: {
                labels: ['Universitas Indonesia', 'ITB', 'UGM', 'Univ. Brawijaya', 'Univ. Airlangga'],
                datasets: [{
                    label: 'Peserta Selesai',
                    data: [5, 4, 5, 3, 4],
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
                            stepSize: 2
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
                            afterLabel: function() {
                                return '👆 Klik untuk detail';
                            }
                        }
                    }
                }
            }
        });

        // Trend Chart
        const trendCtx = document.getElementById('trendChart').getContext('2d');
        const trendChart = new Chart(trendCtx, {
            type: 'line',
            data: {
                labels: ['Jan-Apr 2024', 'Feb-Mei 2024', 'Mar-Jun 2024', 'Apr-Jul 2024', 'Mei-Agt 2024', 'Jun-Sep 2024', 'Jul-Okt 2024', 'Agt-Nov 2024', 'Sep-Des 2024'],
                datasets: [{
                    label: 'Technical',
                    data: [8, 12, 10, 15, 13, 11, 14, 12, 13],
                    borderColor: 'rgba(78, 115, 223, 1)',
                    backgroundColor: 'rgba(78, 115, 223, 0.1)',
                    tension: 0.4,
                    borderWidth: 3,
                    pointRadius: 5,
                    pointHoverRadius: 7
                }, {
                    label: 'Marketing',
                    data: [5, 7, 6, 8, 7, 9, 8, 10, 8],
                    borderColor: 'rgba(28, 200, 138, 1)',
                    backgroundColor: 'rgba(28, 200, 138, 0.1)',
                    tension: 0.4,
                    borderWidth: 3,
                    pointRadius: 5,
                    pointHoverRadius: 7
                }, {
                    label: 'Finance',
                    data: [4, 5, 6, 5, 7, 6, 8, 7, 6],
                    borderColor: 'rgba(54, 185, 204, 1)',
                    backgroundColor: 'rgba(54, 185, 204, 0.1)',
                    tension: 0.4,
                    borderWidth: 3,
                    pointRadius: 5,
                    pointHoverRadius: 7
                }, {
                    label: 'HR',
                    data: [3, 4, 5, 4, 6, 5, 7, 6, 5],
                    borderColor: 'rgba(246, 194, 62, 1)',
                    backgroundColor: 'rgba(246, 194, 62, 0.1)',
                    tension: 0.4,
                    borderWidth: 3,
                    pointRadius: 5,
                    pointHoverRadius: 7
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 5
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: true,
                        position: 'top'
                    },
                    tooltip: {
                        mode: 'index',
                        intersect: false
                    }
                },
                interaction: {
                    mode: 'nearest',
                    axis: 'x',
                    intersect: false
                }
            }
        });
    </script>
</body>
</html>
    
@endsection