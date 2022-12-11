<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $table    = 'tb_user';

    protected $fillable = ['id_admin', 'nama_user', 'telepon', 'email', 'username', 'password', 'status', 'keterangan'];

    public $timestamps  = false;
}
