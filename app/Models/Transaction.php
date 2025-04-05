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

    // Relasi ke User
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }

    // Relasi ke Admin
    public function admin()
    {
        return $this->belongsTo(Admin::class, 'id_admin', 'id_admin');
    }

    // Relasi ke Kendaraan
    public function kendaraan()
    {
        return $this->belongsTo(Kendaraan::class, 'id_kendaraan', 'id_kendaraan');
    }

    // Relasi ke LayananTransaksi
    public function layananTransaksi()
    {
        return $this->belongsTo(LayananTransaksi::class, 'id_layanan_transaksi', 'id_layanan_transaksi');
    }

    // Relasi ke StatusTransaksi
    public function status()
    {
        return $this->belongsTo(StatusTransaksi::class, 'id_status_transaksi', 'id_status_transaksi');
    }
}
