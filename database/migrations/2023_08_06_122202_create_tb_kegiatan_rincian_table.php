<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbKegiatanRincianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_kegiatan_rincian', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('tb_kegiatan_id');
            $table->integer('m_skp_id');
            $table->string('m_diagnosa_id');
            $table->string('nama');
            $table->string('tindakan');
            $table->time('waktu_mulai');
            $table->time('waktu_selesai');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_kegiatan_rincian');
    }
}
