<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnggotaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anggota', function (Blueprint $table) {
            $table->id();
            $table->string('kd_kim');
            $table->string('nama_kim');
            $table->string('pendidikan');
            $table->string('agama');
            $table->string('hp');
            $table->string('email');
            $table->enum('jk', ['L', 'P',]);
            $table->date('tanggal_lahir');
            $table->string('tempat_lahir');
            $table->string('alamat_lengkap');
            $table->string('nama');
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
        Schema::dropIfExists('anggota');
    }
}
