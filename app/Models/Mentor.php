<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mentor extends Model
{
    use HasFactory;
    protected $table = 'Mentor'; 

    public function user()
    {
        return $this->belongsTo(User::class, 'mentor_id', 'id');
    }

    public function rooms()
    {
        return $this->hasMany(Room::class, 'mentor_id', 'mentor_id');
    }

}
