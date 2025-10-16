<?php

namespace App\Http\Controllers\Mentor;

use App\Http\Controllers\Controller;
use App\Models\Room;
use App\Models\Task;
use App\Models\Materi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoomViewController extends Controller
{
    public function show($room_id)
    {
        $room = Room::with(['mentor.user', 'materis'])
            ->where('room_id', $room_id)
            ->firstOrFail();
        
        // Pastikan yang akses adalah mentor dari room ini
        if ($room->mentor_id !== Auth::user()->mentor->mentor_id) {
            abort(403, 'Unauthorized');
        }
        
        return view('mentor.room.show', compact('room'));
    }
    
    public function getParticipants($room_id)
    {
        $room = Room::where('room_id', $room_id)->firstOrFail();
        
        if ($room->mentor_id !== Auth::user()->mentor->mentor_id) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }
        
        // Ambil peserta dari pivot table room_user
        $participants = $room->users()
            ->where('role', 'peserta')
            ->get()
            ->map(function($user) {
                return [
                    'id' => $user->id,
                    'nama' => $user->nama,
                    'username' => $user->username,
                    'joined_at' => $user->pivot->created_at ? $user->pivot->created_at->format('d M Y') : '-'
                ];
            });
        
        return response()->json($participants);
    }
    
    public function getTasks($room_id)
    {
        $room = Room::where('room_id', $room_id)->firstOrFail();
        
        if ($room->mentor_id !== Auth::user()->mentor->mentor_id) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }
        
        $tasks = Task::with(['submissions.user'])
            ->where('room_id', $room_id)
            ->orderBy('deadline', 'asc')
            ->get()
            ->map(function($task) {
                return [
                    'id' => $task->task_id,
                    'judul' => $task->judul,
                    'deskripsi' => $task->deskripsi,
                    'deadline' => $task->deadline->format('d M Y H:i'),
                    'total_submissions' => $task->submissions->count(),
                    'submissions' => $task->submissions->map(function($submission) {
                        return [
                            'user_id' => $submission->user->id,
                            'user_nama' => $submission->user->nama,
                            'submitted_at' => $submission->created_at->format('d M Y H:i'),
                            'status' => $submission->status
                        ];
                    })
                ];
            });
        
        return response()->json($tasks);
    }
    
    public function storeTask(Request $request, $room_id)
    {
        $room = Room::where('room_id', $room_id)->firstOrFail();
        
        if ($room->mentor_id !== Auth::user()->mentor->mentor_id) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }
        
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'deadline' => 'required|date|after:now'
        ]);
        
        $task = Task::create([
            'room_id' => $room_id,
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'deadline' => $request->deadline
        ]);
        
        return response()->json([
            'success' => true,
            'message' => 'Task berhasil ditambahkan',
            'task' => [
                'id' => $task->task_id,
                'judul' => $task->judul,
                'deskripsi' => $task->deskripsi,
                'deadline' => $task->deadline->format('d M Y H:i'),
                'total_submissions' => 0,
                'submissions' => []
            ]
        ]);
    }
}