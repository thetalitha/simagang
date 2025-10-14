@extends('layout/app')

@section('konten')
<h1 class="h3 mb-4 text-gray-800">
    <i class="fas fa-book"></i>
    {{ $judul }}
</h1>
    <div class="card">
        <div class="card-header d-flex flex-wrap b">
            <a href="{{ route('mentor.materiCreate') }}" class="btn btn-sm btn-primary">
               <i class="fas fa-plus mr-2"></i>
                Add Materi</a>
        </div>
        <div class="card-body">
                <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead class="bg-primary text-white">
                <tr class="text-center">
                    <th>No</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Description</th>
                    <th>Created at</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($materi as $index => $m)
                <tr>
                   <td>{{ $loop->iteration }}</td>
                   <td>{{ $m->judul }}</td>
                   <td>{{ $m->room ? $m->room->nama_room : '-' }}</td>
                   <td>{{ $m->deskripsi ?? '-' }}</td>
                   <td>{{ $m->created_at->format('d/m/Y H:i') }}</td>
                   <td class="text-center">
                       <a href="#" class="btn btn-success btn-sm">
                           <i class="fas fa-eye"></i>
                       </a>
                       <a href="#" class="btn btn-warning btn-sm">
                           <i class="fas fa-edit"></i>
                       </a>
                       <form action="#" method="POST" style="display: inline-block;" 
                      onsubmit="return confirm('Yakin ingin hapus room ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" title="Hapus">
                        <i class="fas fa-trash"></i>
                   </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center text-muted">
                        <div class="py-4">
                            <i class="fas fa-inbox fa-3x mb-3"></i>
                            <h5>Belum ada data room</h5>
                            <p>Klik tombol "Add Room" untuk membuat room baru</p>
                        </div>
                    </td>
                </tr>
                    
                @endforelse
            </tbody>
        </table>
                            </div>
        </div>
    </div>

@endsection