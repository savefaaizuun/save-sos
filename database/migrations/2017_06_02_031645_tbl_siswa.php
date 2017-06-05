<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TblSiswa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_siswa', function (Blueprint $table){
            $table->increments('nim');
            $table->string('nama');
            $table->string('gender');
            $table->string('tgl_lahir');
            $table->string('tempat_lahir');
            $table->string('kode_agama');
            $table->string('foto');
            $table->string('id_rombel');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
