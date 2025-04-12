<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaranMetakognisi extends Model
{
    use HasFactory;
    protected $table = 'saran_metakognisis'; // Nama tabel yang digunakan

    protected $fillable = [
        'kode_angket', 
        'kategori',
        'saran'
    ];

    /**
     * Relasi ke model KodeAngket
     */
    public function kodeAngket()
    {
        return $this->belongsTo(KodeAngket::class, 'kode_angket', 'kode_angket');
    }
}
