<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Admin extends Model
{
    use HasFactory;

    protected $table = 'admins';
    protected $primaryKey = 'id_admin';

    protected $fillable = [
        'username', 'password', 'nama', 'no_handphone', 'email', 'id_admin_role'
    ];

    public function role()
    {
        return $this->belongsTo(AdminRole::class, 'id_admin_role', 'id_admin_role');
    }

    public function transaksi()
    {
        return $this->hasMany(Transaction::class, 'id_admin', 'id_admin');
    }
}
