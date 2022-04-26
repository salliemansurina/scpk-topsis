<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBobotMahasiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bobot_mahasiswas', function (Blueprint $table) {
            $table->id();
            $table->string("user_id");
            $table->string("bidang_kompetensi");
            $table->string("fungsional");
            $table->string("pendidikan_terakhir");
            $table->string("kuota_mahasiswa");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bobot_mahasiswas');
    }
}
