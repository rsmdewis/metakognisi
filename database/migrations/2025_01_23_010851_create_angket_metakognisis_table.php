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
        Schema::create('angket_metakognisis', function (Blueprint $table) {
            $table->id();
            $table->integer('no')->unique();
            $table->string('pertanyaan');
            $table->string('kode_angket');
            $table->string('kode_subangket');
            $table->timestamps();
            $table->foreign('kode_angket')->references('kode_angket')->on('kode_angkets')->onDelete('cascade');
            $table->foreign('kode_subangket')->references('kode_subangket')->on('sub_angkets')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('angket_metakognisis');
    }
};
