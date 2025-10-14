<?php

namespace App\Http\Controllers\Mentor;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
      $data = array(
         "judul" => "Dashboard - Monitoring Peserta Magang",
         "menuDashboard" => "active",
         );
         return view('mentor/dashboard', $data);
      }

         

}
        



