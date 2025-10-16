<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Task extends Model
{
    use HasFactory;

    protected $table = 'task';
    protected $primaryKey = 'task_id';

    protected $fillable = [
        'room_id',
        'judul',
        'deskripsi',
        'file_path',
        'deadline',
    ];

    protected $casts = [
        'deadline' => 'datetime',
    ];

    // Relasi ke Room
    public function room()
    {
        return $this->belongsTo(Room::class, 'room_id', 'room_id');
    }

    // Relasi ke Submission
    public function submissions()
    {
        return $this->hasMany(Submission::class, 'task_id', 'task_id');
    }

    // Helper: cek apakah deadline sudah lewat
    public function isOverdue()
    {
        return $this->deadline < now();
    }

    // Helper: hitung persentase yang sudah submit
    public function getSubmissionPercentage()
    {
        $totalParticipants = $this->room->users()->where('role', 'peserta')->count();
        if ($totalParticipants === 0) return 0;
        
        $totalSubmissions = $this->submissions()->count();
        return round(($totalSubmissions / $totalParticipants) * 100, 2);
    }
}