<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Mentor;
use App\Models\Peserta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(){
        return view('auth.login');
    }

    public function loginProses(Request $request){
        $request->validate([
            'username'  => 'required',
            'password'  => 'required|min:5',  
        ],
        [
            'username.required' => 'Username Tidak Boleh Kosong',
            'password.required' => 'Password Tidak Boleh Kosong',
            'password.min' => 'Password Minimal 8 karakter',
        ]);

        $data = array(
            'username'  => $request->username,
            'password'  => $request->password,

        );
        if (Auth::attempt($data)){
            $user = Auth::user();

            if ($user->role == 'admin') {
                return redirect()->route('dashboard')->with('success', 'Anda berhasil login sebagai Admin');
            } elseif ($user->role == 'mentor') {
                return redirect()->route('mentor.dashboard')->with('success', 'Anda berhasil login sebagai Mentor');
            } elseif ($user->role == 'peserta') {
                return redirect()->route('peserta.dashboard')->with('success', 'Anda berhasil login sebagai Peserta');
            } else {
                Auth::logout(); // kalau role tidak dikenali
                return redirect()->route('login')->with('error', 'Role tidak dikenali');
            }

        }else{
            return redirect()->back()->with('error','Email atau Password Salah');
        }

    }

    public function logout(){
        Auth::logout();

        return redirect()->route('login')->with('success', 'Anda Berhasil Logout');
    }

    public function register(){
        return view('auth.register');
    }

    public function registerProses(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:150',
            'username' => 'required|string|max:100|unique:users,username',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|in:mentor,peserta',
        ]);

        $user = User::create([
            'nama' => $request->nama,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        if ($request->role === 'mentor') {
            $request->validate([
                'handphone' => 'required|string|max:20',
            ]);

            Mentor::create([
                'mentor_id' => $user->id,
                'handphone' => $request->handphone,
            ]);
        }

        if ($request->role === 'peserta') {
            $request->validate([
                'institut' => 'required|string|max:150',
                'periode_start' => 'required|date',
                'periode_end' => 'required|date|after_or_equal:periode_start',
            ]);

            Peserta::create([
                'peserta_id' => $user->id,
                'institut' => $request->institut,
                'periode_start' => $request->periode_start,
                'periode_end' => $request->periode_end,
            ]);
        }

        return redirect()->route('login')->with('success', 'Registrasi berhasil, silakan login.');
    }
}
