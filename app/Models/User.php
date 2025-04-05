<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Model
{
    use HasFactory;

    protected $table = 'users';
    protected $primaryKey = 'id_user';

    protected $fillable = [
        'username', 'password', 'nama', 'no_handphone', 'email', 'status_user'
    ];

    public function kendaraan()
    {
        return $this->hasMany(Kendaraan::class, 'id_user', 'id_user');
    }

    public function transaksi()
    {
        return $this->hasMany(Transaction::class, 'id_user', 'id_user');
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class, 'id_user', 'id_user');
    }
}
