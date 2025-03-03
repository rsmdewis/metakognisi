<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HasilAngket extends Model
{
    use HasFactory;
    protected $table = 'hasil_angkets';

    protected $fillable = [
        'nim',
        'jawaban',
        'nilai_km',
        'nilai_rm',
        'km_rendah',
        'km_sedang',
        'km_tinggi',
        'rm_rendah',
        'rm_sedang',
        'rm_tinggi'
    ];
}
