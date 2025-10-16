<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\MateriController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\RoomController;
use App\Http\Controllers\Mentor\RoomViewController as MentorRoomViewController;
use App\Http\Controllers\Mentor\DashboardController as MentorDashboardController;
use App\Http\Controllers\Mentor\MateriController as MentorMateriController;
use App\Http\Controllers\Mentor\PesertaController as MentorPesertaController;
use App\Http\Controllers\Mentor\RoomController as MentorRoomController;
use App\Http\Controllers\Peserta\PesertaDashboardController;
use App\Http\Controllers\Peserta\ParticipantRoomController as PesertaParticipantRoomController;
use App\Http\Controllers\Peserta\MateriController as PesertaMateriController;

// ===== PUBLIC ROUTES =====
Route::get('/', function(){
    return view('welcome');
})->name('welcome');

// Register
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'registerProses'])->name('register.proses');

// Login
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginProses'])->name('loginProses');

// Logout
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// ===== DASHBOARD (SEMUA ROLE BISA AKSES) =====
// Route::middleware('MidLogin')->group(function(){
    
// });

// ===== ADMIN ROUTES =====
Route::middleware(['MidLogin:admin'])->group(function(){
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    // User Management
    Route::get('user', [UserController::class, 'index'])->name('user');
    
    // Materi Management
    Route::get('materi', [MateriController::class, 'index'])->name('materi');
    Route::get('materi/create', [MateriController::class, 'create'])->name('materiCreate');
    Route::post('materi/store', [MateriController::class, 'store'])->name('materiStore');
    
    // Room Management
    Route::get('room', [RoomController::class, 'index'])->name('room');
    Route::get('room/create', [RoomController::class, 'create'])->name('roomCreate');
    Route::post('room/store', [RoomController::class, 'store'])->name('room.store');
});

// ===== MENTOR ROUTES =====
Route::middleware(['MidLogin:mentor'])->group(function(){
    Route::get('mentor/dashboard', [MentorDashboardController::class, 'index'])->name('mentor.dashboard');
    // Materi Mentor
    Route::get('mentor/materi', [MentorMateriController::class, 'index'])->name('mentor.materi');
    Route::get('mentor/materi/create', [MentorMateriController::class, 'create'])->name('mentor.materiCreate');
    Route::post('mentor/materi/store', [MentorMateriController::class, 'store'])->name('mentor.materiStore');
    
    // Room Mentor
    Route::get('mentor/room', [MentorRoomController::class, 'index'])->name('mentor.room');
    Route::get('mentor/room/create', [MentorRoomController::class, 'create'])->name('mentor.roomCreate');
    Route::post('mentor/room/store', [MentorRoomController::class, 'store'])->name('mentor.roomStore');

    Route::prefix('mentor')->name('mentor.')->group(function () {
        Route::get('/room/{room_id}', [MentorRoomViewController::class, 'show'])->name('room.show');
        
        // API untuk get data
        Route::get('/room/{room_id}/participants', [MentorRoomViewController::class, 'getParticipants']);
        Route::get('/room/{room_id}/tasks', [MentorRoomViewController::class, 'getTasks']);
        
        // API untuk create task
        Route::post('/room/{room_id}/tasks', [MentorRoomViewController::class, 'storeTask']);

    });
    
    // Peserta Mentor
    // Route::get('mentor/peserta', [MentorPesertaController:class, 'mentorPeserta'])->name('mentor.peserta');
});

// ===== PESERTA ROUTES =====
Route::middleware(['MidLogin:peserta'])->group(function(){
    Route::get('peserta/dashboard', [PesertaDashboardController::class, 'index'])->name('peserta.dashboard');
    Route::get('peserta/roomlist', [PesertaParticipantRoomController::class, 'index'])->name('peserta.roomlist');
    Route::post('peserta/roomlist/join', [PesertaParticipantRoomController::class, 'join'])->name('peserta.roomlist.join');
    // Route::get('peserta/room/join', [PesertaRoomController::class, ''])->name('peserta.roomlist');


    Route::prefix('peserta')->name('peserta.')->group(function () {

         Route::get('/rooms/{room_id}', [MentorRoomViewController::class, 'show'])
            ->name('mentor.room.show'); 
        
        // API untuk get data
        Route::get('/rooms/{room_id}/participants', [MentorRoomViewController::class, 'getParticipants']);
        Route::get('/rooms/{room_id}/tasks', [MentorRoomViewController::class, 'getTasks']);
        
        // API untuk create task
        Route::post('/rooms/{room_id}/tasks', [MentorRoomViewController::class, 'storeTask']);
    });

 
});

