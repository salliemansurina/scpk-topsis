<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDospemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dospems', function (Blueprint $table) {
            $table->id();
            $table->string("nama");
            $table->string("nip");
            $table->string("email");

            $table->text("bidang_kompetensi");
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
        Schema::dropIfExists('dospems');
    }
}
