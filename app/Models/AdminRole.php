<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AdminRole extends Model
{
    use HasFactory;

    protected $table = 'admin_role';
    protected $primaryKey = 'id_admin_role';

    protected $fillable = ['nama_role'];

    public function admins()
    {
        return $this->hasMany(Admin::class, 'id_admin_role', 'id_admin_role');
    }
}
