<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    protected $table = 'materi';
    protected $primaryKey = 'materi_id';

    protected $fillable = [
        'judul',
        'room_id',
        'deskripsi',
        'konten',
    ];

    public function room()
    {
        return $this->belongsTo(Room::class, 'room_id', 'room_id');
    }
}
