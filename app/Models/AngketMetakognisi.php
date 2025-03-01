<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AngketMetakognisi extends Model
{
    use HasFactory;
    protected $table = 'angket_metakognisis'; // Nama tabel yang digunakan

    protected $fillable = [
        'no', 
        'pertanyaan', 
        'kode_angket', 
        'kode_subangket'
    ];

    /**
     * Relasi ke model KodeAngket
     */
    public function kodeAngket()
    {
        return $this->belongsTo(KodeAngket::class, 'kode_angket', 'kode_angket');
    }

    /**
     * Relasi ke model SubAngket
     */
    public function subAngket()
    {
        return $this->belongsTo(SubAngket::class, 'kode_subangket', 'kode_subangket');
    }
}
