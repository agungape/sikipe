<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbKegiatanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_kegiatans', function (Blueprint $table) {
            $table->id('id_kegiatan');
            $table->integer('user_id');
            $table->integer('m_unitkerja_id');
            $table->integer('m_jabatan_id');
            $table->string('pk_bk');
            $table->integer('jumlah_kegiatan')->default(0);
            $table->integer('jam_efektif')->default(0);
            $table->date('tanggal');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_kegiatan');
    }
}
