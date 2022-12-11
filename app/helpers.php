<?php
function bulat($v)
{
	return round($v, 2);
}
function rupiah($angka)
{
	$hasil_rupiah = "Rp " . number_format($angka, 2, ',', '.');
	echo $hasil_rupiah;
}

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
	if ($v == "Banyak") {
		$h = "2";
	} else if ($v == "Sedikit") {
		$h = "1";
	}
	return $h;
}
