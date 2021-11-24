<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // User::create([
        //     'nisn' => '1234567',
        //     'name' => 'adzanmagrib',
        //     'email' => 'meyzan1605@gmail.com',
        //     'password' => bcrypt('monmon16'),
        //     'tahun_daftar' => date('y'),
        //     'roles' => 'SISWA',
        //     'remember_token' => Str::random(10),
        // ]);

        // User::create([
        //     'nisn' => '12345678',
        //     'name' => 'adzanmagrib',
        //     'email' => 'meyzanal1605@gmail.com',
        //     'password' => bcrypt('monmon16'),
        //     'tahun_daftar' => date('y'),
        //     'roles' => 'SISWA',
        //     'remember_token' => Str::random(10),
        // ]);
    }
}
