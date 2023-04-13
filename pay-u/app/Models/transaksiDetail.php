<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaksiDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        "transaksiId",
        "produkId",
        "jumlah",
        "harga"
    ];
    protected $table = 'transaksidetails';
    public function customer()
    {
        return $this->belongsTo(customer::class);
    }
    public function transaksi()
    {
        return $this->belongsTo(transaksi::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function produk()
    {
        return $this->belongsTo(produk::class);
    }

    public static function addTransaksiDetail($transID, $prodId, $jumlah, $harga)
    {
        transaksiDetail::create([
            "transaksiId" => $transID,
            "produkId" => $prodId,
            "jumlah" => $jumlah,
            "harga" => $harga,
        ]);
    }
}