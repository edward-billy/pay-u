<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
    use HasFactory;
    protected $fillable = [
        'userId',
        "total",
        "invoiceId",
        "customerId"
    ];
    public function customer()
    {
        return $this->belongsTo(customer::class);
    }
    public function transaksiDetails()
    {
        return $this->hasMany(transaksiDetail::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function addTransaksi($total, $custID)
    {
        $createdAt = now()->format('Ymd');
        $randomNumber = str_pad(mt_rand(0, 999), 3, '0', STR_PAD_LEFT);
        $data = transaksi::create([
            "userId" => auth()->user()->id,
            "total" => $total,
            "invoiceId" => $createdAt . $randomNumber,
            "customerId" => $custID
        ]);

        return $data->id;
    }
}