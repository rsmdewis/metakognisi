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
        Schema::create('sub_angkets', function (Blueprint $table) {
            $table->id();
            $table->string('kode_angket');
            $table->string('kode_subangket');
            $table->string('nama');
            $table->timestamps();
            // Membuat foreign key pada kode_angket yang mengacu pada tabel kode_angkets
            $table->foreign('kode_angket')->references('kode_angket')->on('kode_angkets')->onDelete('cascade');
            $table->index('kode_subangket');
            // Membuat kombinasi unik pada kode_angket dan kode_subangket
            $table->unique(['kode_angket', 'kode_subangket']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sub_angkets');
    }
};
