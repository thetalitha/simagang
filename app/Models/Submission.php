<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Submission extends Model
{
    use HasFactory;

    protected $table = 'submission';
    protected $primaryKey = 'submission_id';

    protected $fillable = [
        'task_id',
        'user_id',
        'file_path',
        'catatan',
        'status',
        'nilai',
        'feedback',
    ];

    protected $casts = [
        'nilai' => 'integer',
    ];

    // Relasi ke Task
    public function task()
    {
        return $this->belongsTo(Task::class, 'task_id', 'task_id');
    }

    // Relasi ke User (peserta yang submit)
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    // Helper: cek apakah terlambat submit
    public function isLate()
    {
        return $this->created_at > $this->task->deadline;
    }

    // Helper: cek apakah sudah dinilai
    public function isGraded()
    {
        return $this->status === 'graded' && $this->nilai !== null;
    }
}