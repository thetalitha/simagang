@extends('layout/app')

@section('konten')

<link href="{{ asset('sbadmin2/css/dashboard.css') }}" rel="stylesheet">

<div class="container-fluid">

    <!-- Header -->
    <div class="mentor-header mb-4">
        <h1 class="h3 text-gray-800">
            <i class="fas fa-user-graduate mr-2"></i>Dashboard Peserta
        </h1>
        <p>Selamat datang, <strong>{{ auth()->user()->name }}</strong></p>
        <p>Mentor: <span class="badge badge-primary">{{ $mentor->name ?? 'Belum Ditentukan' }}</span></p>
    </div>

    <!-- Stat Cards -->
    <div class="row">

        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Logbook</div>
                            <div class="h4 mb-0 font-weight-bold text-gray-800">{{ $logbookTotal ?? 0 }}</div>
                        </div>
                        <i class="fas fa-book fa-2x text-primary" style="opacity: 0.4;"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Disetujui</div>
                            <div class="h4 mb-0 font-weight-bold text-gray-800">{{ $logbookApproved ?? 0 }}</div>
                        </div>
                        <i class="fas fa-check-circle fa-2x text-success" style="opacity: 0.4;"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Menunggu Approval</div>
                            <div class="h4 mb-0 font-weight-bold text-gray-800">{{ $logbookPending ?? 0 }}</div>
                        </div>
                        <i class="fas fa-hourglass-half fa-2x text-warning" style="opacity: 0.4;"></i>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Room Aktif -->
    <h5 class="section-title mt-4">Room Aktif</h5>

    @if(isset($rooms) && count($rooms) > 0)
        <div class="row">
            @foreach($rooms as $room)
                <div class="col-xl-4 col-md-6 mb-4">
                    <div class="card room-card h-100 py-3" style="cursor:pointer;">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">{{ $room->name }}</div>
                                    <a href="{{ route('peserta.room.show', $room->id) }}" class="btn btn-primary btn-sm mt-2">
                                        Lihat Room
                                    </a>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-door-open fa-2x text-primary" style="opacity: 0.4;"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p class="text-muted">Tidak ada room aktif.</p>
    @endif

</div>

@endsection
