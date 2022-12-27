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
        Schema::create('detail_data', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_user');//->constrained('users');
            $table->string('alamat')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->string('tanggal_lahir')->nullable();
            $table->foreignId('id_agama')->default('1');//->constrained('agama');
            $table->string('foto_ktp')->nullable();
            $table->string('umur')->nullable();
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
        Schema::dropIfExists('detail_data');
    }
};
