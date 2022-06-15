<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Pengguna;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        User::create([
            'name' => 'admin',
            'password' => Hash::make('admin123'),
        ]);

        Pengguna::create([
            'name' => 'Abdul Azis Basyari',
            'password' => Hash::make('abdulazisbasyari'),
            'id_provinsi' => 32,
            'id_kota' => 3273,
            'id_kecamatan' => 3273050,
        ]);
        Pengguna::create([
            'name' => 'Wahyudin',
            'password' => Hash::make('wahyudin'),
            'id_provinsi' => 32,
            'id_kota' => 3273,
            'id_kecamatan' => 3273050,
        ]);
    }
}
