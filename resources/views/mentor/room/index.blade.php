@extends('layout/app')

@section('konten')
<h1 class="h3 mb-4 text-gray-800">
    <i class="fas fa-book"></i>
    {{ $judul }}
</h1>

<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
        <h6 class="m-0 font-weight-bold text-primary">Daftar Room</h6>
        <a href="{{ route('mentor.roomCreate') }}" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#addRoomModal">
            <i class="fas fa-plus mr-2"></i>
            Add Room
        </a>
        
        <!-- Include modal create -->
        @include('mentor.room.create')
    </div>
    
    <div class="card-body">
        @forelse ($rooms as $room)
        <div class="card border-left-primary shadow-sm mb-3">
            <div class="card-body">
                <div class="row">
                    <!-- Info Room -->
                    <div class="col-md-8">
                        <h5 class="font-weight-bold text-primary mb-2">
                            <i class="fas fa-door-open mr-2"></i>
                            {{ $room->nama_room }}
                        </h5>
                        
                        <p class="text-gray-700 mb-3">
                            {{ $room->deskripsi ?? 'Tidak ada deskripsi' }}
                        </p>
                        
                        <div class="row text-sm">
                            <div class="col-md-6 mb-2">
                                <i class="fas fa-user text-gray-600 mr-2"></i>
                                <span class="text-gray-600">Mentor:</span>
                                <span class="font-weight-bold">{{ $room->mentor->user->nama ?? 'by Admin' }}</span>
                            </div>
                            <div class="col-md-6 mb-2">
                                <i class="fas fa-calendar text-gray-600 mr-2"></i>
                                <span class="text-gray-600">Dibuat:</span>
                                <span class="font-weight-bold">{{ $room->created_at->format('d/m/Y H:i') }}</span>
                            </div>
                        </div>
                        
                        <!-- Room Code -->
                        <div class="mt-3">
                            <div class="d-inline-flex align-items-center bg-light border rounded px-3 py-2">
                                <span class="text-gray-600 mr-2">Kode Room:</span>
                                <span id="code-{{ $room->id }}" class="font-weight-bold text-primary mr-3">{{ $room->code }}</span>
                                <button 
                                    type="button" 
                                    class="btn btn-sm btn-outline-primary"
                                    onclick="copyCode('{{ $room->id }}')"
                                    title="Salin kode"
                                >
                                    <i class="fas fa-copy"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Action Buttons -->
                    <div class="col-md-4 d-flex flex-column justify-content-center align-items-end">
                        <a href="#" class="btn-action btn-action-primary mb-2 w-100">
                            <i class="fas fa-eye mr-2"></i>
                            Lihat Detail
                        </a>
                        <a href="#" class="btn-action btn-action-primary mb-2 w-100">
                            <i class="fas fa-edit mr-2"></i>
                            Edit Room
                        </a>
                        <form action="#" method="POST" class="w-100" 
                              onsubmit="return confirm('Yakin ingin hapus room ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-action btn-action-danger w-100">
                                <i class="fas fa-trash mr-2"></i>
                                Hapus Room
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="text-center py-5">
            <i class="fas fa-inbox fa-4x text-gray-300 mb-3"></i>
            <h5 class="text-gray-600">Belum ada data room</h5>
            <p class="text-gray-500 mb-4">Klik tombol "Add Room" untuk membuat room baru</p>
            <a href="{{ route('mentor.roomCreate') }}" class="btn btn-primary" data-toggle="modal" data-target="#addRoomModal">
                <i class="fas fa-plus mr-2"></i>
                Buat Room Pertama
            </a>
        </div>
        @endforelse
    </div>
</div>

@push('scripts')
<script>
function copyCode(roomId) {
    const codeElement = document.getElementById('code-' + roomId);
    const code = codeElement.textContent;
    
    // Copy to clipboard
    navigator.clipboard.writeText(code).then(function() {
        // Show success feedback
        const originalHTML = codeElement.parentElement.innerHTML;
        codeElement.parentElement.innerHTML = '<span class="text-success"><i class="fas fa-check mr-1"></i>Tersalin!</span>';
        
        // Reset after 2 seconds
        setTimeout(function() {
            codeElement.parentElement.innerHTML = originalHTML;
        }, 2000);
    }).catch(function(err) {
        alert('Gagal menyalin kode');
    });
}
</script>
@endpush

@push('styles')
<style>
.btn-action {
    padding: 10px 20px;
    border: none;
    border-radius: 6px;
    font-size: 14px;
    font-weight: 500;
    text-decoration: none;
    text-align: center;
    transition: all 0.3s ease;
    cursor: pointer;
    display: inline-block;
}

.btn-action-primary {
    background-color: #4e73df;
    color: white;
}

.btn-action-primary:hover {
    background-color: #2e59d9;
    color: white;
    transform: translateY(-2px);
    box-shadow: 0 4px 8px rgba(78, 115, 223, 0.3);
}

.btn-action-danger {
    background-color: #e74a3b;
    color: white;
}

.btn-action-danger:hover {
    background-color: #c02d1f;
    color: white;
    transform: translateY(-2px);
    box-shadow: 0 4px 8px rgba(231, 74, 59, 0.3);
}
</style>
@endpush

@endsection