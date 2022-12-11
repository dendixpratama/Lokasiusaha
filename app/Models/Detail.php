<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    use HasFactory;

    protected $table    = 'tb_detail';

    protected $fillable = ['id_penilaian', 'id_lokasi', 'kriteria1', 'kriteria2', 'kriteria3', 'kriteria4', 'kriteria5', 'kriteria6', 'kriteria7', 'catatan'];

    public $timestamps  = false;
}
