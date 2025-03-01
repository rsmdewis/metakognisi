<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HasilMetakognisi extends Model
{
    use HasFactory;
    // The table associated with the model
    protected $table = 'hasil_metakognisis';

    // The attributes that are mass assignable
    protected $fillable = [
        'nim',
        'jawaban',
        'nilai_km',
        'nilai_rm',
        'total',
        'level_km',
        'level_rm'
    ];
}
