<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'nama',
        'username',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    

    // Hapus atau ubah jadi
    public function mentorProfile()
    {
        return $this->hasOne(Mentor::class, 'mentor_id', 'id');
    }


    public function peserta()
    {
        return $this->hasOne(Peserta::class, 'peserta_id', 'id');
    }

    public function joinedRooms()
    {
        // ini untuk peserta → room (via pivot)
        return $this->belongsToMany(Room::class, 'room_user', 'user_id', 'room_id');
    }

    public function mentor()
{
    return $this->hasOne(Mentor::class, 'mentor_id', 'id');
}


}
