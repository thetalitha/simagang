<?php

namespace Database\Seeders;

use App\Models\mentor;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'nama' => 'nadia',
            'username' => 'admin911',
            'role' => 'admin',
            'password' =>  Hash::make('123123123'),
        ]);

        User::create([
            'nama' => 'putri',
            'username' => 'mentor911',
            'role' => 'mentor',
            'password' =>  Hash::make('123123123'),
        ]);

        User::create([
            'nama' => 'nia',
            'username' => 'peserta911',
            'role' => 'peserta',
            'password' =>  Hash::make('123123123'),
        ]);

        mentor::create([
            'mentor_id' => '2',
            'handphone' => '0822576882'
        ]);


    }
}
