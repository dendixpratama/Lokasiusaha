<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penilaian extends Model
{


    protected $table    = 'tb_penilaian';

    protected $fillable = ['id_user', 'nama_penilaian', 'deskripsi', 'tanggal', 'jam', 'status', 'keterangan'];

    public $timestamps  = false;
}
