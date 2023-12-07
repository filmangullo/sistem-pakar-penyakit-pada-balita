<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('diagnosas', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pasien');
            $table->string('usia_pasien');
            $table->string('kelas_pasien');
            $table->json('data_input');
            $table->json('list_penyakit');
            $table->string('hasil_cf');
            $table->unsignedBigInteger('penyakit_id');

            $table->foreign('penyakit_id')->references('id')->on('penyakits');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('diagnosas');
    }
};
