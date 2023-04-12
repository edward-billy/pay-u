<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
    protected $fillable = [
        'email',
        "nama",
        "alamat",
        "noHp"
    ];
    use HasFactory;
    public function produks()
    {
        return $this->hasMany(produk::class);
    }
    public function transaksis()
    {
        return $this->hasMany(transaksi::class);
    }
    public function transaksiDetails()
    {
        return $this->hasMany(transaksiDetail::class);
    }


}