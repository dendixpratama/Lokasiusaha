<?php

function getV1($v)
{
    $h = 0;
    if ($v == "Sangat Murah") {
        $h = "0.1";
    } else if ($v == "Murah") {
        $h = "0.15";
    } else if ($v == "Sedang") {
        $h = "0.15";
    } else if ($v == "Mahal") {
        $h = "0.2";
    } else if ($v == "Sangat Mahal") {
        $h = "0.4";
    }
    return $h;
}


function getV2($v)
{
    $h = 0;
    if ($v == "Sangat Terlihat") {
        $h = "0.4";
    } else if ($v == "Terlihat") {
        $h = "0.35";
    } else if ($v == "Kurang Terlihat") {
        $h = "0.25";
    }
    return $h;
}



function getV3($v)
{
    $h = 0;
    if ($v == "Sangat Ramai") {
        $h = "0.4";
    } else if ($v == "Ramai") {
        $h = "0.35";
    } else if ($v == "Sepi") {
        $h = "0.25";
    }
    return $h;
}



function getV4($v)
{
    $h = 0;
    if ($v == "Sangat Banyak") {
        $h = "0.4";
    } else if ($v == "Banyak") {
        $h = "0.35";
    } else if ($v == "Sedikit") {
        $h = "0.25";
    }
    return $h;
}



function getV5($v)
{
    $h = 0;
    if ($v == "Sangat Luas") {
        $h = "0.4";
    } else if ($v == "Luas") {
        $h = "0.35";
    } else if ($v == "Sempit") {
        $h = "0.25";
    }
    return $h;
}



function getV6($v)
{
    $h = 0;
    if ($v == "Sangat Banyak") {
        $h = "0.4";
    } else if ($v == "Banyak") {
        $h = "0.35";
    } else if ($v == "Sedikit") {
        $h = "0.25";
    }
    return $h;
}



function getV7($v)
{
    $h = 0;
    if ($v == "Sedikit") {
        $h = "1";
    } else if ($v == "Banyak") {
        $h = "2";
    }
    return $h;
}

function RP($angka)
{
    $hasil_rupiah = "Rp " . number_format($angka, 2, ',', '.');
    echo $hasil_rupiah;
}


function WKT($sekarang)
{
    $tanggal = substr($sekarang, 8, 2) + 0;
    $bulan = substr($sekarang, 5, 2);
    $tahun = substr($sekarang, 0, 4);

    $judul_bln = array(1 => "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
    $wk = $tanggal . " " . $judul_bln[(int)$bulan] . " " . $tahun;
    return $wk;
}

function WKTP($sekarang)
{
    $tanggal = substr($sekarang, 8, 2) + 0;
    $bulan = substr($sekarang, 5, 2);
    $tahun = substr($sekarang, 2, 2);

    $judul_bln = array(1 => "Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Agu", "Sep", "Okt", "Nov", "Des");
    $wk = $tanggal . " " . $judul_bln[(int)$bulan] . "'" . $tahun;
    return $wk;
}


function getPelanggan($kode)
{
    $sql = "SELECT `nama_pelanggan` FROM `tb_pelanggan` WHERE `id_pelanggan`= '" . $kode . "'";
    $results = DB::select($sql);
    $hasil = $results[0]->nama_pelanggan;
    return "$hasil";
}

function getPenilaian($kode)
{
    $sql = "SELECT `nama_penilaian` FROM `tb_penilaian` WHERE `id_penilaian`= '" . $kode . "'";
    $results = DB::select($sql);
    $hasil = $results[0]->nama_penilaian;
    return "$hasil";
}

function getLokasi($kode)
{
    $sql = "SELECT `nama_lokasi` FROM `tb_lokasi` WHERE `id_lokasi`= '" . $kode . "'";
    $results = DB::select($sql);
    $hasil = $results[0]->nama_lokasi;
    return "$hasil";
}


function getAdmin($kode)
{
    $sql = "SELECT `nama_admin` FROM `tb_admin` WHERE `id_admin`= '" . $kode . "'";
    $results = DB::select($sql);
    $hasil = $results[0]->nama_admin;
    return "$hasil";
}

function getDetail($kode)
{
    $sql = "SELECT `id_penilaian` FROM `tb_detail` WHERE `id_detail`= '" . $kode . "'";
    $results = DB::select($sql);
    $hasil = $results[0]->id_penilaian;
    return "$hasil";
}
