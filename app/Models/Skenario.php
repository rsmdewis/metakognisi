<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skenario extends Model
{
    use HasFactory;
    protected $table = 'skenarios'; // Nama tabel di database

    protected $fillable = [
        'skenario',
    ];
}
