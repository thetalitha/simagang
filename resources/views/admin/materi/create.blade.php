@extends('layout/app')

@section('konten')
<h1 class="h3 mb-4 text-gray-800">
    <i class="fas fa-plus"></i>
    {{ $judul }}
</h1>
    <div class="card">
        <div class="card-header d-flex flex-wrap b">
            {{-- ini nanti dihapus --}}
            <a href="" class="btn btn-sm btn-primary">
                <i class="fas fa-arrow-left mr-2"></i>
                Back</a>
        </div>
        <div class="card-body">
            <form action="{{ route('materiStore') }}" method="post">
                @csrf
            <div class="row mb-3">
                <div class="col-xl-4">
                    <label class="form-label"> <span class="text-danger">*</span> Judul Materi</label> 
                    <input type="text" name="judul" class="form-control @error('juduk') is-invalid  @enderror" value="{{ old('judul') }}"> 
                    @error('judul')
                    <small class="text-danger">
                        {{ $message }}
                    </small>
                    @enderror
                </div>

                <div class="col-xl-4">
                    <label class="form-label"> <span class="text-danger">*</span> Kategori</label> 
                    <select name="room_id" class="form-control @error('room_id') is-invalid  @enderror" value="{{ old('room_id') }}">
                        <option selected disabled>-- Pilih Room --</option>
                        @foreach($room as $item)
                            <option value="{{ $item->room_id }}">{{ $item->nama_room }}</option>
                        @endforeach
                    </select>
                    @error('room_id')
                    <small class="text-danger">
                        {{ $message }}
                    </small>
                    @enderror
                </div>

                <div class="col-xl-4">
                    <label class="form-label">Deskripsi</label> 
                    <input type="text" name="deskripsi" class="form-control" > 
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12">
                    <label class="form-label">Konten</label>
                    <textarea name="konten" id="editor" class="form-control @error('konten') is-invalid  @enderror">{{ old('konten') }}</textarea>
                    @error('konten')
                    <small class="text-danger">
                        {{ $message }}
                    </small>
                    @enderror
                </div>

            </div>

            <div class="d-flex justify-content-end">
                <button type="" class="btn btn-sm btn-primary me-2 mr-2">
                    <i class=""></i>
                    Preview
                </button>

                <button type="submit" class="btn btn-sm btn-primary">
                    <i class=""></i>
                    Publish
                </button>
            </div>
            </form>

        </div>
    </div>

@endsection