<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Peserta extends Model
{
    use HasFactory;

    protected $table = 'peserta'; // nama tabel
    protected $fillable = [
        'peserta_id',
        'institut',
        'periode_start',
        'periode_end',
    ];

    // relasi ke User
    public function user()
    {
        return $this->belongsTo(User::class, 'peserta_id', 'id');
    }
}
