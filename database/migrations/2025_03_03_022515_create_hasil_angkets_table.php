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
        Schema::create('hasil_angkets', function (Blueprint $table) {
            $table->id();
            $table->string('nim')->unique();
            $table->text('jawaban'); 
            $table->integer('nilai_km');
            $table->integer('nilai_rm');
            $table->decimal('km_rendah', 4, 3);
            $table->decimal('km_sedang', 4, 3);
            $table->decimal('km_tinggi', 4, 3);
            $table->decimal('rm_rendah', 4, 3);
            $table->decimal('rm_sedang', 4, 3);
            $table->decimal('rm_tinggi', 4, 3);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hasil_angkets');
    }
};
