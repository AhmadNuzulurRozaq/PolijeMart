<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Detail_penjualan extends Model
{
    protected $table = 'detail_penjualans';
    protected $fillable = [
        'id',
        'penjualan_id',
        'barang_id',
        'jumlah',
        'harga',
        'subtotal',
    ];

    public function barang(){
        return $this->belongsTo(Barang::class, 'barang_id');
    }
}
