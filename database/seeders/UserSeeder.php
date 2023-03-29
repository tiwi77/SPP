<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Petugas;
use App\Models\Siswa;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'username'       => 'petugas1',
            'password'       => Hash::make('petugas'),
            'nama_petugas'   => 'Andi',
            'level'          => 'Petugas',
            'created_at'     => now(),
            'updated_at'     => now()
        ]);
        User::create([
            'username'       => 'admin',
            'password'       => Hash::make('admin'),
            'nama_petugas'   => 'Andi',
            'level'          => 'Admin',
            'created_at'     => now(),
            'updated_at'     => now()
        ]);
        User::create([
            'username'       => 'siswa',
            'password'       => Hash::make('siswa'),
            'nama_petugas'   => 'Andi',
            'level'          => 'Siswa',
            'created_at'     => now(),
            'updated_at'     => now()
        ]);

    }
}
