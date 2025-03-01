<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KodeAngket extends Model
{
    use HasFactory;
    // Menentukan nama tabel jika berbeda dengan nama model
    protected $table = 'kode_angkets';

    // Menentukan atribut yang dapat diisi massal
    protected $fillable = ['kode_angket', 'nama'];

    // Relasi satu ke banyak (one-to-many) dengan sub_angkets
    public function subAngkets()
    {
        return $this->hasMany(SubAngket::class, 'kode_angket', 'kode_angket');
    }
}
