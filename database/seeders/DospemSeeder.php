<?php

namespace Database\Seeders;

use App\Models\Dospem;
use Illuminate\Database\Seeder;

class DospemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Dospem::create([
            "nama" => "Tazkya Humaira, S.Kom., M.Kom",
            "nip" => "196404011999031001",
            "email" => "tazkya@lecture.itk.ac.id",
            "bidang_kompetensi" => "UI/UX Research, Human Computer Interaction, User Behavior",
            "fungsional" => "Asisten Ahli",
            "pendidikan_terakhir" => "S2",
            "kuota_mahasiswa" => "1-6",
        ]);

        Dospem::create([
            "nama" => "Qurrota Ayun S.Kom., M.Kom",
            "nip" => "196404011999031002",
            "email" => "ayun@lecture.itk.ac.id",
            "bidang_kompetensi" => "Business Process Management, Enterprise Resource Planning, Knowledge Management, Information System Audit, IT Service Management",
            "fungsional" => "Lektor Kepala",
            "pendidikan_terakhir" => "S2",
            "kuota_mahasiswa" => "1-6",
        ]);

        Dospem::create([
            "nama" => "Adelia Putri S.Kom., M.Kom",
            "nip" => "196404011999031003",
            "email" => "adel@lecture.itk.ac.id",
            "bidang_kompetensi" => "UI/UX Research, Human Computer Interaction, User Behavior",
            "fungsional" => "Lektor",
            "pendidikan_terakhir" => "S3",
            "kuota_mahasiswa" => "7-12",
        ]);

        Dospem::create([
            "nama" => "Wiwit Maulida S.Kom., M.Kom",
            "nip" => "196404011999031004",
            "email" => "wiwit@lecture.itk.ac.id",
            "bidang_kompetensi" => "Cloud Computing, Computer Networking, Network Security, Client Server, Kriptografi",
            "fungsional" => "Lektor",
            "pendidikan_terakhir" => "S2",
            "kuota_mahasiswa" => "13-18",
        ]);

        Dospem::create([
            "nama" => "Suci Noorjannah S.Kom., M.Kom",
            "nip" => "196404011999031005",
            "email" => "suci@lecture.itk.ac.id",
            "bidang_kompetensi" => "Big Data: Data Scientist, Data Engineer, Data Analyst, Artificial Intelligence, Machine Learning, Basis Data",
            "fungsional" => "Lektor",
            "pendidikan_terakhir" => "S2",
            "kuota_mahasiswa" => "13-18",
        ]);

        Dospem::create([
            "nama" => "Nanang Ismail S.Kom., M.Kom",
            "nip" => "196404011999031006",
            "email" => "nanang@lecture.itk.ac.id",
            "bidang_kompetensi" => "Programmer: Software Developer, Web Developer, Mobile Developer, Software Engineering, RPL, Sistem Pendukung Keputusan, Kecerdasan Buatan, Sistem Informasi",
            "fungsional" => "Lektor Kepala",
            "pendidikan_terakhir" => "S3",
            "kuota_mahasiswa" => "25-30",
        ]);

        Dospem::create([
            "nama" => "Muhammad Yus Fadillah S.Kom., M.Kom",
            "nip" => "196404011999031007",
            "email" => "yus@lecture.itk.ac.id",
            "bidang_kompetensi" => "Big Data: Data Scientist, Data Engineer, Data Analyst, Artificial Intelligence, Machine Learning, Basis Data",
            "fungsional" => "Asisten Ahli",
            "pendidikan_terakhir" => "S3",
            "kuota_mahasiswa" => "25-30",
        ]);

        Dospem::create([
            "nama" => "Muhammad Arifansyah S.Kom., M.Kom",
            "nip" => "196404011999031008",
            "email" => "arif@lecture.itk.ac.id",
            "bidang_kompetensi" => "Business Process Management, Enterprise Resource Planning, Knowledge Management, Information System Audit, IT Service Management",
            "fungsional" => "Profesor",
            "pendidikan_terakhir" => "S2",
            "kuota_mahasiswa" => "13-18",
        ]);

        Dospem::create([
            "nama" => "Muhammad Rizki S.Kom., M.Kom",
            "nip" => "196404011999031009",
            "email" => "rizki@lecture.itk.ac.id",
            "bidang_kompetensi" => "Programmer: Software Developer, Web Developer, Mobile Developer, Software Engineering, RPL, Sistem Pendukung Keputusan, Kecerdasan Buatan, Sistem Informasi",
            "fungsional" => "Asisten Ahli",
            "pendidikan_terakhir" => "S2",
            "kuota_mahasiswa" => "1-6",
        ]);

        Dospem::create([
            "nama" => "Nikita Samantha S.Kom., M.Kom",
            "nip" => "196404011999031010",
            "email" => "niki@lecture.itk.ac.id",
            "bidang_kompetensi" => "Business Process Management, Enterprise Resource Planning, Knowledge Management, Information System Audit, IT Service Management",
            "fungsional" => "Asisten Ahli",
            "pendidikan_terakhir" => "S3",
            "kuota_mahasiswa" => "19-24",
        ]);
    }
}
