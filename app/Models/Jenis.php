<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jenis extends Model
{
    use HasFactory;

    protected $table = 'jenis';
    protected $fillable = ['nama_jenis'];

    // Relasi ke Produk: Satu jenis mempunyai banyak produk
    public function produk()
    {
        return $this->hasMany(Produk::class, 'jenis_id');
    }
}
