<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hasil extends Model
{
    use HasFactory;

    protected $table    = 'tb_hasil';

    protected $fillable = ['id_penilaian', 'id_lokasi', 'rekapitulasi', 'hasil', 'bobot', 'keterangan'];

    public $timestamps  = false;
}
