<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lokasi extends Model
{
    use HasFactory;

    protected $table    = 'tb_lokasi';

    protected $fillable = ['nama_lokasi', 'deskripsi', 'harga', 'fasilitas', 'alamat', 'gambar', 'status', 'keterangan'];

    public $timestamps  = false;
}
