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
        Schema::create('hasil_metakognisis', function (Blueprint $table) {
            $table->id();
            $table->string('nim', 9); 
            $table->text('jawaban'); 
            $table->integer('nilai_km'); 
            $table->integer('nilai_rm'); 
            $table->integer('total'); 
            $table->enum('level_km', ['Rendah', 'Sedang', 'Tinggi']);
            $table->enum('level_rm', ['Rendah', 'Sedang', 'Tinggi']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hasil_metakognisis');
    }
};
