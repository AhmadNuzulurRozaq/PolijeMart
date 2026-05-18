<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    protected $table = 'penjualans';
    protected $fillable = [
        'id',
        'nomor_pesanan',
        'user_id',
        'tanggal_penjualan',
        'total_bayar',
        'status',
        'batas_waktu',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function detail_penjualans(){
        return $this->hasMany(Detail_penjualan::class, 'penjualan_id');
    }
}
