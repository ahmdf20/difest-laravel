<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            'username' => 'ADMIN1',
            'name' => 'Ahmad Fadilah',
            'password' => bcrypt('admin123'),
            'email' => 'ahmadfadilah202003@gmail.com',
            'phone' => '085795069461',
            'role' => 'admin',
            'from_competition' => 'Admin',
            'created_at' => now('Asia/Jakarta')
        ]);
        User::insert([
            'username' => 'ADMIN2',
            'name' => 'Daffa Hafizh',
            'password' => bcrypt('admin321'),
            'email' => 'masdapp123@gmail.com',
            'phone' => '-',
            'role' => 'admin',
            'from_competition' => 'Admin',
            'created_at' => now('Asia/Jakarta')
        ]);
    }
}
