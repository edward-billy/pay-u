<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
    use HasFactory;
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
}
