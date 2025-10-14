<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
   public function index(){
      $data = array(
      "judul" => "Dashboard - Monitoring Peserta Magang",
      "menuDashboard" => "active",
      );
      return view('admin/dashboard', $data);

   }
                
}


