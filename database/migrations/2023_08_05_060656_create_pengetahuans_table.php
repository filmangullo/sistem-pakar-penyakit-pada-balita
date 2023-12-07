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
        Schema::create('pengetahuans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('penyakit_id');
            $table->unsignedBigInteger('gejala_id');
            $table->float('mb');
            $table->float('md');
            $table->float('cf');

            $table->foreign('penyakit_id')->references('id')->on('penyakits');
            $table->foreign('gejala_id')->references('id')->on('gejalas');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengetahuans');
    }
};
