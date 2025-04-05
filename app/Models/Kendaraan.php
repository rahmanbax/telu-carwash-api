<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kendaraan extends Model
{
    use HasFactory;

    protected $table = 'kendaraan';
    protected $primaryKey = 'id_kendaraan';

    protected $fillable = ['no_plat', 'jenis_kendaraan', 'model_kendaraan', 'id_user'];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }

    public function transaksi()
    {
        return $this->hasMany(Transaction::class, 'id_kendaraan', 'id_kendaraan');
    }
}
