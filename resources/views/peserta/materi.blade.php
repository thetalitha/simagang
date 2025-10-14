{{-- Other Materials from Same Room --}}
    @if($materi->room && $materi->room->materis->where('materi_id', '!=', $materi->materi_id)->count() > 0)
        <div class="bg-white rounded-lg shadow-lg p-6">
            <h2 class="text-xl font-bold text-gray-800 mb-4">Materi Lain dari {{ $materi->room->nama ?? 'Room ini' }}</h2>
            <div class="space-y-3">
                @foreach($materi->room->materis->where('materi_id', '!=', $materi->materi_id)->take(5) as $otherMateri)
                    <a href="{{ route('participant.materials.view', $otherMateri->materi_id) }}" 
                       class="block p-4 bg-gray-50 hover{{-- resources/views/participant/materials/view.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8 max-w-4xl">
    {{-- Back Button --}}
    <div class="mb-6">
        <a href="{{ route('participant.materials') }}" 
           class="inline-flex items-center text-blue-600 hover:text-blue-800">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
            Kembali ke Daftar Materi
        </a>
    </div>

    {{-- Material Header --}}
    <div class="bg-white rounded-lg shadow-lg overflow-hidden mb-6">
        <div class="p-6 bg-gradient-to-r from-blue-500 to-blue-600 text-white">
            <div class="flex items-start justify-between mb-4">
                <div class="flex-1">
                    <h1 class="text-3xl font-bold mb-2">{{ $materi->judul }}</h1>
                    <div class="flex items-center text-blue-100">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                        <span class="font-medium">{{ $materi->room->nama ?? 'Room' }}</span>
                    </div>
                </div>
                <div class="ml-4">
                    <span class="bg-blue-400 text-white text-sm px-4 py-2 rounded-full font-medium">File</span>
                </div>
            </div>
        </div>

        {{-- Material Info --}}
        <div class="p-6 border-b">
            <div class="grid grid-cols-2 md:grid-cols-3 gap-4 text-sm">
                <div>
                    <p class="text-gray-500">Tanggal Upload</p>
                    <p class="font-semibold text-gray-800">{{ $materi->created_at->format('d M Y') }}</p>
                </div>
                <div>
                    <p class="text-gray-500">Diupdate</p>
                    <p class="font-semibold text-gray-800">{{ $materi->updated_at->format('d M Y') }}</p>
                </div>
            </div>
        </div>

        {{-- Description --}}
        @if($materi->deskripsi)
            <div class="p-6 bg-gray-50 border-b">
                <h3 class="text-lg font-semibold text-gray-800 mb-2">Deskripsi</h3>
                <p class="text-gray-700 leading-relaxed">{{ $materi->deskripsi }}</p>
            </div>
        @endif

        {{-- Konten --}}
        @if($materi->konten)
            <div class="p-6 bg-gray-50 border-b">
                <h3 class="text-lg font-semibold text-gray-800 mb-2">Konten</h3>
                <div class="text-gray-700 leading-relaxed prose max-w-none">
                    {!! nl2br(e($materi->konten)) !!}
                </div>
            </div>
        @endif

        {{-- Download Button --}}
        <div class="p-6">
            <a href="{{ route('participant.materials.download', $materi->materi_id) }}" 
               class="inline-flex items-center justify-center w-full bg-green-600 hover:bg-green-700 text-white font-semibold py-3 px-6 rounded-lg transition-colors duration-200">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                </svg>
                Download Materi
            </a>
        </div>
    </div>

    {{-- Other Materials from Same Room --}}
    @if($materi->room && $materi->room->materis->where('materi_id', '!=', $materi->materi_id)->count() > 0)
        <div class="bg-white rounded-lg shadow-lg p-6">
            <h2 class="text-xl font-bold text-gray-800 mb-4">Materi Lain dari {{ $materi->room->nama ?? 'Room ini' }}</h2>
            <div class="space-y-3">
                @foreach($materi->room->materis->where('materi_id', '!=', $materi->materi_id)->take(5) as $otherMateri)
                    <a href="{{ route('participant.materials.view', $otherMateri->materi_id) }}" 
                       class="block p-4 bg-gray-50 hover:bg-gray-100 rounded-lg transition-colors duration-200">
                        <div class="flex items-center justify-between">
                            <div class="flex-1">
                                <h3 class="font-semibold text-gray-800">{{ $otherMateri->judul }}</h3>
                                <p class="text-sm text-gray-500 mt-1">{{ $otherMateri->created_at->format('d M Y') }}</p>
                            </div>
                            <span class="bg-blue-100 text-blue-600 text-xs px-2 py-1 rounded ml-3">File</span>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    @endif
</div>
@endsection