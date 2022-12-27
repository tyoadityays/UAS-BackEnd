<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penduduk', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('nik');
            $table->string('nama', 100);
            $table->enum('kelamin', ['Laki-laki', 'Perempuan']);
            $table->string('alamat', 200);
            $table->enum('status', ['Belum Kawin', 'Kawin']);
            $table->string('pekerjaan', 100);
            $table->enum('warga', ['WNI', 'WNA']);
            $table->string('asal', 100);
            $table->date('tanggal');
            $table->enum('golongan', ['A','AB','O','B']);
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
        Schema::dropIfExists('penduduk');
    }
};