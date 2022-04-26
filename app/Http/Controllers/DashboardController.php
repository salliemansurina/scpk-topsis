<?php

namespace App\Http\Controllers;

use App\Models\Dospem;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        // return Auth::user();
        return view("home");
    }

    public function submitDospem(Request $request)
    {
        User::find(Auth::user()->id)
            ->update([
                "dospem_id" => $request->dospem_id,
                "judul_ta" => $request->judul_ta,
            ]);
        return back();
    }

    public function daftarDosen()
    {
        $dospem = Dospem::all();
        return view("daftar-dosen", compact("dospem"));
    }

    public function login()
    {
        return view("login");
    }
    public function logout()
    {
        Auth::logout();
        return redirect("/login");
    }
    public function loginPost(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if (auth()->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect('/');
        }

        return back()->with('error', 'Email or password is incorrect');
    }

    public function getTopsisApi(Request $request)
    {
        if ($request->judul_ta == null) {
            return response()->json(['status' => '400', 'message' => 'Judul TA tidak boleh kosong'], 400);
        }
        $data = $this->rankTopsis($request);

        return response()->json($data);
    }


    public function topsis($dataSubmit)
    {
        $bobot = $dataSubmit;
        $dospem = Dospem::all();
        $nama = [];
        $table_kriteria = [
            "bidang_kompetensi" => [],
            "fungsional" => [],
            "pendidikan_terakhir" => [],
            "kuota_mahasiswa" => []
        ];

        foreach ($dospem as $dp) {
            $nama[] = $dp->nama;
            $table_kriteria["bidang_kompetensi"][] = $dp->bidang_kompetensi;
            $table_kriteria["fungsional"][] = $dp->fungsional;
            $table_kriteria["pendidikan_terakhir"][] = $dp->pendidikan_terakhir;
            $table_kriteria["kuota_mahasiswa"][] = $dp->kuota_mahasiswa;
        }

        $matriks_kecocokan = [
            "bidang_kompetensi" => [],
            "fungsional" => [],
            "pendidikan_terakhir" => [],
            "kuota_mahasiswa" => []
        ];

        foreach ($table_kriteria["bidang_kompetensi"] as $bk) {
            switch ($bk) {
                case "Big Data: Data Scientist, Data Engineer, Data Analyst, Artificial Intelligence, Machine Learning, Basis Data":
                    $matriks_kecocokan["bidang_kompetensi"][] = 10;
                    break;
                case "Cloud Computing, Computer Networking, Network Security, Client Server, Kriptografi":
                    $matriks_kecocokan["bidang_kompetensi"][] = 8;
                    break;
                case "Programmer: Software Developer, Web Developer, Mobile Developer, Software Engineering, RPL, Sistem Pendukung Keputusan, Kecerdasan Buatan, Sistem Informasi":
                    $matriks_kecocokan["bidang_kompetensi"][] = 6;
                    break;
                case "Business Process Management, Enterprise Resource Planning, Knowledge Management, Information System Audit, IT Service Management":
                    $matriks_kecocokan["bidang_kompetensi"][] = 4;
                    break;
                case "UI/UX Research, Human Computer Interaction, User Behavior":
                    $matriks_kecocokan["bidang_kompetensi"][] = 2;
                    break;
            }
        }

        foreach ($table_kriteria["fungsional"] as $fs) {
            switch ($fs) {
                case "Asisten Ahli":
                    $matriks_kecocokan["fungsional"][] = 2;
                    break;
                case "Lektor":
                    $matriks_kecocokan["fungsional"][] = 4;
                    break;
                case "Lektor Kepala":
                    $matriks_kecocokan["fungsional"][] = 8;
                    break;
                case "Profesor":
                    $matriks_kecocokan["fungsional"][] = 10;
                    break;
            }
        }

        foreach ($table_kriteria["pendidikan_terakhir"] as $pt) {
            switch ($pt) {
                case "S2":
                    $matriks_kecocokan["pendidikan_terakhir"][] = 5;
                    break;
                case "S3":
                    $matriks_kecocokan["pendidikan_terakhir"][] = 10;
                    break;
            }
        }

        foreach ($table_kriteria["kuota_mahasiswa"] as $km) {
            switch ($km) {
                case "25-30":
                    $matriks_kecocokan["kuota_mahasiswa"][] = 2;
                    break;
                case "19-24":
                    $matriks_kecocokan["kuota_mahasiswa"][] = 4;
                    break;
                case "13-18":
                    $matriks_kecocokan["kuota_mahasiswa"][] = 6;
                    break;
                case "7-12":
                    $matriks_kecocokan["kuota_mahasiswa"][] = 8;
                    break;
                case "1-6":
                    $matriks_kecocokan["kuota_mahasiswa"][] = 10;
                    break;
            }
        }

        $temp_norm = [
            "bidang_kompetensi" => 0,
            "fungsional" => 0,
            "pendidikan_terakhir" => 0,
            "kuota_mahasiswa" => 0
        ];

        foreach ($matriks_kecocokan["bidang_kompetensi"] as $bk) {
            $temp_norm["bidang_kompetensi"] += pow($bk, 2);
        }
        $temp_norm["bidang_kompetensi"] = sqrt($temp_norm["bidang_kompetensi"]);
        foreach ($matriks_kecocokan["fungsional"] as $fs) {
            $temp_norm["fungsional"] += pow($fs, 2);
        }
        $temp_norm["fungsional"] = sqrt($temp_norm["fungsional"]);
        foreach ($matriks_kecocokan["pendidikan_terakhir"] as $pk) {
            $temp_norm["pendidikan_terakhir"] += pow($pk, 2);
        }
        $temp_norm["pendidikan_terakhir"] = sqrt($temp_norm["pendidikan_terakhir"]);
        foreach ($matriks_kecocokan["kuota_mahasiswa"] as $km) {
            $temp_norm["kuota_mahasiswa"] += pow($km, 2);
        }
        $temp_norm["kuota_mahasiswa"] = sqrt($temp_norm["kuota_mahasiswa"]);

        $matriks_keputusan_ternormalisasi = [
            "bidang_kompetensi" => [],
            "fungsional" => [],
            "pendidikan_terakhir" => [],
            "kuota_mahasiswa" => []
        ];

        foreach ($matriks_kecocokan["bidang_kompetensi"] as $bk) {
            $matriks_keputusan_ternormalisasi["bidang_kompetensi"][] = $bk / $temp_norm["bidang_kompetensi"];
        }
        foreach ($matriks_kecocokan["fungsional"] as $fs) {
            $matriks_keputusan_ternormalisasi["fungsional"][] = $fs / $temp_norm["fungsional"];
        }
        foreach ($matriks_kecocokan["pendidikan_terakhir"] as $pk) {
            $matriks_keputusan_ternormalisasi["pendidikan_terakhir"][] = $pk / $temp_norm["pendidikan_terakhir"];
        }
        foreach ($matriks_kecocokan["kuota_mahasiswa"] as $km) {
            $matriks_keputusan_ternormalisasi["kuota_mahasiswa"][] = $km / $temp_norm["kuota_mahasiswa"];
        }

        $matriks_ternormalisasi_terbobot = [
            "bidang_kompetensi" => [],
            "fungsional" => [],
            "pendidikan_terakhir" => [],
            "kuota_mahasiswa" => []
        ];
        foreach ($matriks_keputusan_ternormalisasi["bidang_kompetensi"] as $bk) {
            $matriks_ternormalisasi_terbobot["bidang_kompetensi"][] = $bk * $bobot->bidang_kompetensi;
        }
        foreach ($matriks_keputusan_ternormalisasi["fungsional"] as $fs) {
            $matriks_ternormalisasi_terbobot["fungsional"][] = $fs * $bobot->fungsional;
        }
        foreach ($matriks_keputusan_ternormalisasi["pendidikan_terakhir"] as $pk) {
            $matriks_ternormalisasi_terbobot["pendidikan_terakhir"][] = $pk * $bobot->pendidikan_terakhir;
        }
        foreach ($matriks_keputusan_ternormalisasi["kuota_mahasiswa"] as $km) {
            $matriks_ternormalisasi_terbobot["kuota_mahasiswa"][] = $km * $bobot->kuota_mahasiswa;
        }

        $dp = [];
        for ($i = 0; $i < count($nama); $i++) {
            $dp[] = sqrt(
                pow($matriks_ternormalisasi_terbobot["bidang_kompetensi"][$i] - max($matriks_ternormalisasi_terbobot["bidang_kompetensi"]), 2) +
                    pow($matriks_ternormalisasi_terbobot["fungsional"][$i] - max($matriks_ternormalisasi_terbobot["fungsional"]), 2) +
                    pow($matriks_ternormalisasi_terbobot["pendidikan_terakhir"][$i] - max($matriks_ternormalisasi_terbobot["pendidikan_terakhir"]), 2) +
                    pow($matriks_ternormalisasi_terbobot["kuota_mahasiswa"][$i] - max($matriks_ternormalisasi_terbobot["kuota_mahasiswa"]), 2)
            );
        }
        $dm = [];
        for ($i = 0; $i < count($nama); $i++) {
            $dm[] = sqrt(
                pow($matriks_ternormalisasi_terbobot["bidang_kompetensi"][$i] - min($matriks_ternormalisasi_terbobot["bidang_kompetensi"]), 2) +
                    pow($matriks_ternormalisasi_terbobot["fungsional"][$i] - min($matriks_ternormalisasi_terbobot["fungsional"]), 2) +
                    pow($matriks_ternormalisasi_terbobot["pendidikan_terakhir"][$i] - min($matriks_ternormalisasi_terbobot["pendidikan_terakhir"]), 2) +
                    pow($matriks_ternormalisasi_terbobot["kuota_mahasiswa"][$i] - min($matriks_ternormalisasi_terbobot["kuota_mahasiswa"]), 2)
            );
        }

        $result = [];
        for ($i = 0; $i < count($nama); $i++) {
            $result[] = [
                "dospem" => $dospem[$i],
                "nilai" => $dm[$i] / ($dp[$i] + $dm[$i]),
            ];
        }



        $data = [
            "nama" => $nama,
            "table_kriteria" => $table_kriteria,
            "matriks_kecocokan" => $matriks_kecocokan,
            "temp_norm" => $temp_norm,
            "matriks_keputusan_ternormalisasi" => $matriks_keputusan_ternormalisasi,
            "matriks_ternormalisasi_terbobot" => $matriks_ternormalisasi_terbobot,
            "d+" => $dp,
            "d-" => $dm,
            "result" => $result
        ];

        return $result;
    }

    public function rankTopsis($dataSubmit)
    {
        $data = $this->topsis($dataSubmit);
        usort($data, function ($a, $b) {
            return $a['nilai'] < $b['nilai'];
        });
        return $data;
    }
}
