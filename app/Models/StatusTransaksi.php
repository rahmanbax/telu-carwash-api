<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StatusTransaksi extends Model
{
    use HasFactory;

    protected $table = 'status_transaksi';
    protected $primaryKey = 'id_status_transaksi';

    protected $fillable = ['nama_status_transaksi'];

    public function transaksi()
    {
        return $this->hasMany(Transaction::class, 'id_status_transaksi', 'id_status_transaksi');
    }
}
