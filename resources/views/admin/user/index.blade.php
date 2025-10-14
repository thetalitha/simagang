@extends('layout/app')

@section('konten')
<h1 class="h3 mb-4 text-gray-800">
    <i class="fas fa-user mr-2"></i>
    {{ $judul }}
</h1>
    <div class="card">

        <div class="card-body">
                <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead class="bg-primary text-white">
                <tr class="text-center">
                    <th>No</th>
                    <th>Name</th>
                    <th>Username</th>
                    <th>Handphone</th>
                    <th>Room</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($mentor as $item)
                <tr>
                   <td class="text-center">{{ $loop->iteration }}</td>
                   <td>{{ $item->nama }}</td>
                   <td>{{ $item->username }}</td>
                   <td>{{ $item->mentor->handphone ?? '-' }}</td>
                   <td>
                    @if($item->mentor && $item->mentor->rooms->count() > 0)
                        {{ $item->mentor->rooms->pluck('nama_room')->join(', ') }}
                    @else
                        -
                    @endif
                   </td>
                   <td class="text-center">
                       <a href="#" class="btn btn-warning btn-sm">
                           <i class="fas fa-eye"></i>
                       </a>
                       <a href="#" class="btn btn-danger btn-sm">
                           <i class="fas fa-trash"></i>
                       </a>
                   </td>
                </tr>
                    
                @endforeach
            </tbody>
        </table>
                            </div>
        </div>
    </div>

@endsection