<?php

namespace App\Http\Controllers\Peserta;

use App\Http\Controllers\Controller;
use App\Models\Logbook;
use App\Models\Room;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // pastikan user login
        $user = auth()->user();

        // Jika belum login, hindari error
        if (!$user) {
            return redirect()->route('login');
        }

        $userId = $user->id;

        // Hitung logbook
        $logbookTotal     = Logbook::where('user_id', $userId)->count();
        $logbookApproved  = Logbook::where('user_id', $userId)->where('status', 'approved')->count();
        $logbookPending   = Logbook::where('user_id', $userId)->where('status', 'pending')->count();

        // Ambil mentor berdasarkan kolom mentor_id (jika ada)
        $mentor = User::find($user->mentor_id ?? null);

        // Ambil semua room aktif / atau room yang user ikuti
        $rooms = Room::where('user_id', $userId)->get();

        return view('peserta.dashboard', compact(
            'logbookTotal',
            'logbookApproved',
            'logbookPending',
            'mentor',
            'rooms'
        ));
    }
}
