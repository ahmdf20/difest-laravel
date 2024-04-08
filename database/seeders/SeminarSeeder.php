<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SeminarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            'username' => 'SEMINAR1',
            'name' => 'Admin Seminar',
            'password' => bcrypt('seminar@difest5.0'),
            'email' => 'himatikompolsubofficial@gmail.com',
            'phone' => '-',
            'role' => 'admin seminar',
            'from_competition' => 'Admin Seminar',
            'created_at' => now('Asia/Jakarta')
        ]);
    }
}
