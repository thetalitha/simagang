<?php

namespace App\Http\Controllers\Mentor;

use App\Http\Controllers\Controller;
use App\Models\mentor;
use App\Models\User;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoomController extends Controller
{
    public function index()
    {
        $data = [
            "judul" => "Room",
            "menuMentorRoom" => "active",
            // tampilkan hanya room yang dibuat oleh mentor yang login
            "rooms" => Room::with('mentor.user')
            ->where('mentor_id', Auth::user()->mentorProfile->mentor_id ?? null)
            ->get(),

        ];

        return view('mentor.room.index', $data);
    }

    public function create()
    {
        $data = [
            "judul" => "Add Room",
            "menuMentorRoom" => "active",
        ];

        return view('mentor.room.create', $data);
    }

    public function store(Request $request)
    {
        // validasi input
        $request->validate([
            'nama_room' => 'required|string|max:100',
            'deskripsi' => 'nullable|string',
        ]);

        // simpan ke database
        Room::create([
            'nama_room'  => $request->nama_room,
            'deskripsi'  => $request->deskripsi,
            'mentor_id'  => Auth::id(),
        ]);

        // redirect balik ke halaman room dengan pesan sukses
        return redirect()->route('mentor.room')->with('success', 'Room berhasil ditambahkan!');
    }
}
