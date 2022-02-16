<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDatakimTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datakim', function (Blueprint $table) {
            $table->id();
            $table->string('kd_kim')->nullable();
            $table->string('nama_kim');
            $table->foreignId('kd_daerah')->constrained('daerah')->onDelete('cascade');
            $table->string('email_kim');
            $table->string('medsos');
            $table->string('web_resmi');
            $table->date('tanggal_terbentuk');
            $table->string('alamat_kim');
            $table->string('kecamatan');
            $table->string('desa');
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
        Schema::dropIfExists('datakim');
    }
}
