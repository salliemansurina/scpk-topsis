<?php

namespace Database\Seeders;

use App\Models\User;
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
        User::create([
            "email" => "admin@gmail.com",
            "password" => bcrypt("admin123"),
            "role" => "admin",

            "nama" => "Admin",
            "nim" => "-",
            "prodi" => "-",
            "judul_ta" => "-"
        ]);

        User::create([
            "email" => "tata@gmail.com",
            "password" => bcrypt("tata123"),
            "role" => "user",

            "nama" => "Tazkiyah",
            "nim" => "10191077",
            "prodi" => "Sistem Informasi",
        ]);
    }
}
