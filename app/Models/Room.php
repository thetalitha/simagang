<?php

namespace App\Models;

use App\Models\Mentor;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $table = 'room';
    protected $primaryKey = 'room_id';
    public $timestamps = true; // kalau cuma pakai created_at saja

    protected $fillable = [
        'nama_room',
        'deskripsi',
        'mentor_id',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($room) {
            // generate kode unik, misal: ABC123 atau Room-XY91Z
            do {
                $code = 'ROOM-' . now()->format('ym') . '-' . strtoupper(Str::random(4)); // 6 karakter acak
            } while (self::where('code', $code)->exists()); // pastiin unik

            $room->code = $code;
        });
    }

    public function mentor()
    {
        // relasi room → mentor
        return $this->belongsTo(Mentor::class, 'mentor_id', 'mentor_id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'room_user', 'room_id', 'user_id');
    }

    public function materis()
    {
        return $this->hasMany(Materi::class, 'room_id', 'room_id');
    }

    public function peserta()
    {
        // Kalau tabel pivot-nya `room_user` dan field-nya `room_id`, `user_id`
        return $this->belongsToMany(User::class, 'room_user', 'room_id', 'user_id')
                    ->where('role', 'peserta'); // optional: filter kalau user punya role
    }
}
