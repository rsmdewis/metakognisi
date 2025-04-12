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
        Schema::create('saran_metakognisis', function (Blueprint $table) {
            $table->id();
            $table->string('kode_angket');
            $table->enum('kategori', ['Rendah', 'Sedang', 'Tinggi']);
            $table->text('saran');
            $table->timestamps();
            $table->foreign('kode_angket')->references('kode_angket')->on('kode_angkets')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('saran_metakognisis');
    }
};
