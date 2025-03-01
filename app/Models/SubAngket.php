<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubAngket extends Model
{
    use HasFactory;
    // Menentukan nama tabel jika berbeda dengan nama model
    protected $table = 'sub_angkets';

    // Menentukan atribut yang dapat diisi massal
    protected $fillable = ['kode_angket', 'kode_subangket', 'nama'];

    // Relasi balik ke KodeAngket
    public function kodeAngket()
    {
        return $this->belongsTo(KodeAngket::class, 'kode_angket', 'kode_angket');
    }
    public function angketMetakognisis()
    {
        return $this->hasMany(angketMetakognisi::class, 'kode_subangket', 'kode_subangket');
    }
}
