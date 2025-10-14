<?php

namespace App\Http\Controllers\Peserta;

use App\Http\Controllers\Controller;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Room; // pastikan model Room sudah ada

class RoomController extends Controller{
    public function index(){
        $data = [
            "judul" => "My Room",
            "menuPesertaRoom" => "active",
            $user = Auth::user(),
            $rooms = $user->joinedRooms, 
        ];

        return view('peserta.room.roomlist', $data);

    }

}