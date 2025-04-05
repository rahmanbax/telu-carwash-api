<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LayananTransaksi extends Model
{
    use HasFactory;

    protected $table = 'layanan_transaksi';
    protected $primaryKey = 'id_layanan_transaksi';

    protected $fillable = ['nama_layanan', 'harga', 'deskripsi'];

    public function transaksi()
    {
        return $this->hasMany(Transaction::class, 'id_layanan_transaksi', 'id_layanan_transaksi');
    }
}
