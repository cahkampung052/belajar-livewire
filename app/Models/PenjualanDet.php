<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenjualanDet extends Model
{
    use HasFactory;

    protected $table = 'penjualan_det';

    protected $fillable = [
        'penjualan_id', 'barang', 'jumlah', 'harga'
    ];
}
