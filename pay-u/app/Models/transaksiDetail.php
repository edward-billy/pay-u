<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaksiDetail extends Model
{
    use HasFactory;
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
}
