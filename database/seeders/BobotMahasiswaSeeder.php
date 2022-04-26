<?php

namespace Database\Seeders;

use App\Models\BobotMahasiswa;
use Illuminate\Database\Seeder;

class BobotMahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BobotMahasiswa::create([
            "user_id" => 2,
            "bidang_kompetensi" => 10,
            "fungsional" => 4,
            "pendidikan_terakhir" => 8,
            "kuota_mahasiswa" => 2
        ]);
    }
}
