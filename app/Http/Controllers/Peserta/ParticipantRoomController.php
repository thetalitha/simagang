<?php

namespace App\Http\Controllers\Peserta;
use App\Models\Room;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ParticipantRoomController extends Controller
{
     public function index()
    {
        $user = Auth::user();
        $rooms = $user->joinedRooms; // ambil semua room yang diikuti user

        $data = [
            'judul' => 'My Room',
            'rooms' => $rooms,
        ];

        return view('peserta.room.roomlist', $data);
    }

    // proses join room pakai kode
    public function join(Request $request)
    {
        $request->validate([
            'code' => 'required|string|exists:room,code',
        ], [
            'code.exists' => 'Kode room tidak ditemukan.',
        ]);

        $room = Room::where('code', $request->code)->first();

        // cek apakah user sudah join sebelumnya
        if ($room->users()->where('user_id', Auth::id())->exists()) {
            return back()->with('error', 'Kamu sudah bergabung di room ini!');
        }

        $room->users()->attach(Auth::id());


        return redirect()->route('peserta.roomlist')->with('success', 'Berhasil bergabung ke room!');
    }
}
