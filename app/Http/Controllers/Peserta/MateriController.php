<?php

namespace App\Http\Controllers\Peserta;

use App\Http\Controllers\Controller;
use App\Models\Materi;
use App\Models\Room;
use App\Models\Peserta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class MateriController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $peserta = Peserta::where('peserta_id', $user->id)->first();

        if (!$peserta) {
            abort(403, 'Data peserta tidak ditemukan.');
        }

        // Materi dari room "general"
        $generalMaterials = Materi::whereHas('room', function ($query) {
                $query->whereRaw('LOWER(nama_room) = ?', ['general']);
            })
            ->with('room')
            ->orderBy('created_at', 'desc')
            ->get();

        // Room yang diikuti peserta (bukan "general")
        $joinedRooms = Room::whereHas('peserta', function ($query) use ($peserta) {
                $query->where('users.id', $peserta->peserta_id);
            })
            ->whereRaw('LOWER(nama_room) != ?', ['general'])
            ->with(['materis' => function ($query) {
                $query->orderBy('created_at', 'desc');
            }])
            ->get();

        return view('peserta.materials.index', compact('generalMaterials', 'joinedRooms'));
    }

    public function view($id)
    {
        $user = Auth::user();
        $peserta = Peserta::where('peserta_id', $user->id)->first();
        $materi = Materi::with('room')->findOrFail($id);

        if (strtolower($materi->room->nama_room) !== 'general') {
            $hasAccess = $materi->room->peserta()
                ->where('users.id', $peserta->peserta_id)
                ->exists();

            if (!$hasAccess) {
                abort(403, 'Anda tidak memiliki akses ke materi ini. Silakan join room terlebih dahulu.');
            }
        }

        return view('peserta.materials.view', compact('materi'));
    }

    public function download($id)
    {
        $user = Auth::user();
        $peserta = Peserta::where('peserta_id', $user->id)->first();
        $materi = Materi::with('room')->findOrFail($id);

        if (strtolower($materi->room->nama_room) !== 'general') {
            $hasAccess = $materi->room->peserta()
                ->where('users.id', $peserta->peserta_id)
                ->exists();

            if (!$hasAccess) {
                abort(403, 'Anda tidak memiliki akses ke materi ini.');
            }
        }

        if (filter_var($materi->konten, FILTER_VALIDATE_URL)) {
            return redirect($materi->konten);
        }

        $filePath = 'materi/' . $materi->konten;
        if (!Storage::exists($filePath)) {
            abort(404, 'File materi tidak ditemukan.');
        }

        return Storage::download($filePath, $materi->judul . '.pdf');
    }
}
