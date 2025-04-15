<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
{
    use HasFactory;

    // Nama tabel
    protected $table = 'transaksi';

    // Primary key kustom
    protected $primaryKey = 'id_transaksi';

    // Mass assignable fields
    protected $fillable = [
        'id_user',
        'id_admin',
        'id_kendaraan',
        'id_layanan_transaksi',
        'id_status_transaksi',
    ];

    public function kendaraan()
    {
        return $this->belongsTo(Kendaraan::class, 'id_kendaraan', 'id_kendaraan');
    }

    public function layananTransaksi()
    {
        return $this->belongsTo(LayananTransaksi::class, 'id_layanan_transaksi', 'id_layanan_transaksi');
    }

    public function statusTransaksi()
    {
        return $this->belongsTo(StatusTransaksi::class, 'id_status_transaksi', 'id_status_transaksi');
    }
}
