<?php
namespace App\Http\Controllers\Peserta;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;

class PesertaDashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $data = [
            "judul" => "Dashboard Peserta",
            "menuDashboard" => "active", 
            "room" => $user->room,
            "tasks" => $user->tasks,
        ];

        return view('peserta.dashboard', $data);
    }
}
