@include('layouts.header')
@section('title','Lokasi')

<!-- Navbar & Hero Start -->
<div class="container-xxl position-relative p-0">
	<nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
		<a href="" class="navbar-brand p-0">
			<h1 class="m-0">Ruko<span class="fs-5">ku</span></h1>
			<!-- <img src="img/logo.png" alt="Logo"> -->
		</a>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
			<span class="fa fa-bars"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarCollapse">
			<div class="navbar-nav ms-auto py-0">
				<a href="/dashboard" class="nav-item nav-link">Beranda</a>
				<a href="/lokasi" class="nav-item nav-link">Lokasi</a>
				<a href="/fpenilaian" class="nav-item nav-link active">Penilaian</a>
				<a href="/fhasil" class="nav-item nav-link">Hasil</a>
			</div>
			<a href="/logout" class="btn btn-secondary text-light rounded-pill py-2 px-4 ms-3">Logout</a>
		</div>
	</nav>

	<div class="container-xxl py-5 bg-primary hero-header mb-5">
		<div class="container my-5 py-5 px-lg-5">
			<div class="row g-5 py-5">
				<div class="col-12 text-center">
					<h1 class="text-white animated zoomIn">Rukoku</h1>
					<hr class="bg-white mx-auto mt-0" style="width: 90px;">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb justify-content-center">
							<li class="breadcrumb-item"><a class="text-white" href="/">Beranda</a></li>
							<li class="breadcrumb-item text-white active" aria-current="page">Penilaian</li>
						</ol>
					</nav>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Navbar & Hero End -->

<!-- Portfolio Start -->
<div class="container-xxl py-5">
	<div class="container px-lg-5">
		<div class="section-title position-relative text-center mb-5 pb-2 wow fadeInUp" data-wow-delay="0.1s">
			<h6 class="position-relative d-inline text-primary ps-4">Lokasi Usaha</h6>
			<h2 class="mt-2">Hasil Rekomendasi Lokasi Usaha</h2>
		</div>
		<div class="row g-4 portfolio-container">

			<?php

			use App\Models\Hasil; ?>

			<?php
			$id_penilaian = $data1[0]->id_penilaian;
			$id_user = $data1[0]->id_user;
			$user = getUser($id_user);
			$nama_penilaian = $data1[0]->nama_penilaian;
			$deskripsi = $data1[0]->deskripsi;
			$tanggal = WKT($data1[0]->tanggal);
			$jam = $data1[0]->jam;
			$status = $data1[0]->status;
			$keterangan = $data1[0]->keterangan;

			?>

			<div class="modal-body text-dark">
				<div class="card shadow mb-4">
					<div class="card-body text-dark"> </div>
					<div class="form-group col-md-12">
						<label>Nama User :</label>
						<input disabled type="text" class="form-control" placeholder="" value="{{$user}}" required />
					</div>
					<div class="form-group col-md-12">
						<label>Nama Penilaian :</label>
						<input disabled type="text" class="form-control" placeholder="" value="{{ $nama_penilaian}} - {{$tanggal}} - {{$jam}}" required />

					</div>
					<div class="form-group col-md-12">
						<label>Deskripsi :</label>
						<input disabled type="text" class="form-control" placeholder="" value="{{$deskripsi}}" value="" required />
					</div>

					<div class="form-group col-md-12">
						<label>Keterangan :</label>
						<input disabled type="text" class="form-control" placeholder="" value="{{$status}} - {{$keterangan}}" value="" required />
					</div>
				</div>
			</div>

			<div class="table-responsive">
				<table class="table table-bordered text-dark" id="dataTable" width="100%" cellspacing="0">
					<thead class="table-primary">
						<tr>
							<th>No</th>
							<th width="70px">Gambar</th>
							<th>Lokasi</th>
							<th><label title="Harga Lokasi">HRG</label></th>
							<th><label title="Visibilitas">VSB</label></th>
							<th><label title="Traffic">TFC</label></th>
							<th><label title="Ruangan">RGN</label></th>
							<th><label title="Tempat Parkir">TPR</label></th>
							<th><label title="Akses">AKS</label></th>
							<th><label title="Persaingan">PSG</label></th>
							<th>Catatan</th>
							<th class="text-center">Menu</th>
						</tr>
					</thead>
					<tbody>
						@php ($NL = [])
						@php ($IL = [])
						@php ($ID = [])
						@php ($GB = [])
						@php ($kr1 = [])
						@php ($kr2 = [])
						@php ($kr3 = [])
						@php ($kr4 = [])
						@php ($kr5 = [])
						@php ($kr6 = [])
						@php ($kr7 = [])
						@forelse ($data2 as $detail)

						@php ($IL[] = $detail->id_lokasi)
						@php ($NL[] = $detail->nama_lokasi)
						@php ($ID[] = $detail->id_detail)
						@php ($GB[] = $detail->gambar)
						@php ($kr1[] = $detail->kriteria1)
						@php ($kr2[] = $detail->kriteria2)
						@php ($kr3[] = $detail->kriteria3)
						@php ($kr4[] = $detail->kriteria4)
						@php ($kr5[] = $detail->kriteria5)
						@php ($kr6[] = $detail->kriteria6)
						@php ($kr7[] = $detail->kriteria7)
						<tr>
							<td class="text-center">{{$loop->iteration}}</td>
							<td><img src="{{ url('ypathfile/'.$detail->gambar)}}" width="80px" height="80px"></td>
							<td><label title="{{$detail->alamat}} {{$detail->fasilitas}} {{$detail->deskripsi}} RP.  {{$detail->harga}}">{{$detail->nama_lokasi}}</label></td>
							<td>{{$detail->kriteria1}}
							<td>{{$detail->kriteria2}}
							<td>{{$detail->kriteria3}}
							<td>{{$detail->kriteria4}}
							<td>{{$detail->kriteria5}}
							<td>{{$detail->kriteria6}}
							<td>{{$detail->kriteria7}}
							<td>{{$detail->catatan}}</td>
							<td class="text-center">
								<div>
									<a href="#del{{ $detail->id_detail }}" data-toggle="modal" class="btn btn-danger"><i class="fa fa-trash"></i></a>
									@include('admin.detail.modal')
								</div>
							</td>
						</tr>
						@empty
						<td colspan="8" class="text-center">Tidak ada data...</td>
						@endforelse
					</tbody>

				</table>
			</div>


			<?php
			/*
C1	0.2	Harga	tren negatif
C2	0.15	Visibilitas	tren positif
C3	0.15	Traffic	tren positif
C4	0.15	Ruangan	tren positif
C5	0.15	Tempat Parkir	tren positif
C6	0.1	Akses	tren positif
C7	0.1	Persaingan	tren negatif
*/
			$arKRI[0] = "Harga";
			$arKRI[1] = "Visibilitas";
			$arKRI[2] = "Traffic";
			$arKRI[3] = "Ruangan";
			$arKRI[4] = "Tempat Parkir";
			$arKRI[5] = "Akses";
			$arKRI[6] = "Persaingan";

			$arKR[0] = "Hrg";
			$arKR[1] = "Vis";
			$arKR[2] = "Tra";
			$arKR[3] = "Rgn";
			$arKR[4] = "Prk";
			$arKR[5] = "Aks";
			$arKR[6] = "Prs";

			$arB[0] = 0.2;
			$arB[1] = 0.15;
			$arB[2] = 0.15;
			$arB[3] = 0.15;
			$arB[4] = 0.15;
			$arB[5] = 0.1;
			$arB[6] = 0.1;

			$arT[0] = "Cost";
			$arT[1] = "Benefit";
			$arT[2] = "Benefit";
			$arT[3] = "Benefit";
			$arT[4] = "Benefit";
			$arT[5] = "Benefit";
			$arT[6] = "Cost";

			$arBobot = array();
			$gab = "<big>Nilai Bobot Kriteria</big><ol>";
			for ($i = 0; $i < 7; $i++) {
				$arBobot[$i] = $arB[$i] * 100;
				$gab .= "<li>$arKRI[$i] ($arKR[$i]) :: $arT[$i] =>" . $arBobot[$i] . " %</li>";
			}
			$gab .= "</ol><br>";
			echo $gab;


			$jd = count($NL);
			//echo "JD=$jd<br>";
			$arN1 = array();
			$arN2 = array();
			$arN3 = array();
			$arN4 = array();
			$arN5 = array();
			$arN6 = array();
			$arN7 = array();

			$gab1 = "<big>Retrive Data Uji</big>";
			$gab1 .= "<table width='100%' border='1'>";
			$gab1 .= "<tr bgcolor='#cccccc'><td>No<td>Nama Lokasi<td>$arKR[0]<td>$arKR[1]<td>$arKR[2]<td>$arKR[3]<td>$arKR[4]<td>$arKR[5]<td>$arKR[6]</tr>";
			for ($i = 0; $i < $jd; $i++) {
				$no = $i + 1;
				$arN1[$i] = getV1($kr1[$i]);
				$arN2[$i] = getV2($kr2[$i]);
				$arN3[$i] = getV3($kr3[$i]);
				$arN4[$i] = getV4($kr4[$i]);
				$arN5[$i] = getV5($kr5[$i]);
				$arN6[$i] = getV6($kr6[$i]);
				$arN7[$i] = getV7($kr7[$i]);

				$gab1 .= "<tr><td>$no<td>$NL[$i]<td>$kr1[$i]<td>$kr2[$i]<td>$kr3[$i]<td>$kr4[$i]<td>$kr5[$i]<td>$kr6[$i]<td>$kr7[$i]</tr>";
			}
			$gab1 .= "</table><br><br>";
			echo $gab1;


			$min1 = min($arN1);
			$min2 = min($arN2);
			$min3 = min($arN3);
			$min4 = min($arN4);
			$min5 = min($arN5);
			$min6 = min($arN6);
			$min7 = min($arN7);



			$gab1 = "<big>Normalisasi Data Uji</big>";
			$gab1 .= "<table width='100%' border='1'>";
			$gab1 .= "<tr bgcolor='#cccccc'><td>No<td>Nama Lokasi<td>$arKR[0]<td>$arKR[1]<td>$arKR[2]<td>$arKR[3]<td>$arKR[4]<td>$arKR[5]<td>$arKR[6]</tr>";
			for ($i = 0; $i < $jd; $i++) {
				$no = $i + 1;
				$gab1 .= "<tr><td>$no<td>$NL[$i]<td>$arN1[$i]<td>$arN2[$i]<td>$arN3[$i]<td>$arN4[$i]<td>$arN5[$i]<td>$arN6[$i]<td>$arN7[$i]</tr>";
			}
			$gab1 .= "<tr><td colspan='2'>Min<td>$min1<td>$min2<td>$min3<td>$min4<td>$min5<td>$min6<td>$min7</tr>";
			$gab1 .= "</table><br><br>";
			echo $gab1;

			////////////////////
			$arM = array();
			$arR = array();
			$arR_ = array();
			$gab1 = "<big>Trend +/- Data Uji</big>";
			$gab1 .= "<table width='100%' border='1'>";
			$gab1 .= "<tr bgcolor='#cccccc'><td>No<td>Nama Lokasi<td>$arKR[0]<td>$arKR[1]<td>$arKR[2]<td>$arKR[3]<td>$arKR[4]<td>$arKR[5]<td>$arKR[6]</tr>";
			for ($i = 0; $i < $jd; $i++) {
				$no = $i + 1;
				//=====================================
				$v1 = 0;
				$v1_ = "";
				if ($arT[0] == "Cost") {
					$v1 = ($arN1[$i] / $min1) * 100;
					$v1_ = "($arN1[$i]/$min1) x 100";
				} else {
					$v1 = ($min1 / $arN1[$i]) * 100;
					$v1_ = "($min1/$arN1[$i]) x 100";
				}
				//=====================================
				$v2 = 0;
				$v2_ = "";
				if ($arT[1] == "Benefit") {
					$v2 = ($arN2[$i] / $min2) * 100;
					$v2_ = "($arN2[$i]/$min2) x 100";
				} else {
					$v2 = ($min2 / $arN2[$i]) * 100;
					$v2_ = "($min2/$arN2[$i]) x 100";
				}

				//=====================================
				$v3 = 0;
				$v3_ = "";
				if ($arT[2] == "Benefit") {
					$v3 = ($arN3[$i] / $min3) * 100;
					$v3_ = "($arN3[$i]/$min3) x 100";
				} else {
					$v3 = ($min3 / $arN3[$i]) * 100;
					$v3_ = "($min3/$arN3[$i]) x 100";
				}


				//=====================================
				$v4 = 0;
				$v4_ = "";
				if ($arT[3] == "Benefit") {
					$v4 = ($arN4[$i] / $min4) * 100;
					$v4_ = "($arN4[$i]/$min4) x 100";
				} else {
					$v4 = ($min4 / $arN4[$i]) * 100;
					$v4_ = "($min4/$arN4[$i]) x 100";
				}


				//=====================================
				$v5 = 0;
				$v5_ = "";
				if ($arT[4] == "Benefit") {
					$v5 = ($arN5[$i] / $min5) * 100;
					$v5_ = "($arN5[$i]/$min5) x 100";
				} else {
					$v5 = ($min5 / $arN5[$i]) * 100;
					$v5_ = "($min5/$arN5[$i]) x 100";
				}


				//=====================================
				$v6 = 0;
				$v6_ = "";
				if ($arT[5] == "Benefit") {
					$v6 = ($arN6[$i] / $min6) * 100;
					$v6_ = "($arN6[$i]/$min6) x 100";
				} else {
					$v6 = ($min6 / $arN6[$i]) * 100;
					$v6_ = "($min6/$arN6[$i]) x 100";
				}


				//=====================================
				$v7 = 0;
				$v7_ = "";
				if ($arT[6] == "Cost") {
					$v7 = ($arN7[$i] / $min7) * 100;
					$v7_ = "($arN7[$i]/$min7) x 100";
				} else {
					$v7 = ($min7 / $arN7[$i]) * 100;
					$v7_ = "($min7/$arN7[$i]) x 100";
				}

				//=====================================
				$v1 = bul($v1);
				$v2 = bul($v2);
				$v3 = bul($v3);
				$v4 = bul($v4);
				$v5 = bul($v5);
				$v6 = bul($v6);
				$v7 = bul($v7);

				$arM1[$i] = $v1;
				$arM2[$i] = $v2;
				$arM3[$i] = $v3;
				$arM4[$i] = $v4;
				$arM5[$i] = $v5;
				$arM6[$i] = $v6;
				$arM7[$i] = $v7;

				$arR[$i] = ($v1 * $arBobot[0]) + ($v2 * $arBobot[1]) + ($v3 * $arBobot[2]) + ($v4 * $arBobot[3]) + ($v5 * $arBobot[4]) + ($v6 * $arBobot[5]) + ($v7 * $arBobot[6]);
				$arR_[$i] = "($v1 * $arBobot[0])+($v2 * $arBobot[1])+($v3 * $arBobot[2])+($v4 * $arBobot[3])+($v5 * $arBobot[4])+($v6 * $arBobot[5])+($v7 * $arBobot[6])";



				$gab1 .= "<tr><td>$no<td>$NL[$i]
<td><label title='$v1_'>$v1
<td><label title='$v2_'>$v2
<td><label title='$v3_'>$v3
<td><label title='$v4_'>$v4
<td><label title='$v5_'>$v5
<td><label title='$v6_'>$v6
<td><label title='$v7_'>$v7
</tr>";
			}
			$gab1 .= "</table><br><br>";
			echo $gab1;

			$gab1 = "<big>Perhitungan CPI Data Uji</big>";
			$gab1 .= "<table width='100%' border='1'>";
			$gab1 .= "<tr bgcolor='#cccccc'><td>No<td>Nama Lokasi<td>Formulasi<td>Hasil</tr>";
			for ($i = 0; $i < $jd; $i++) {
				$no = $i + 1;
				$gab1 .= "<tr><td>$no<td>$NL[$i]
				<td><label title='$arR_[$i]'>$arR_[$i]
				<td><label title='$arR_[$i]'>$arR[$i]
				</tr>";
			}
			$gab1 .= "</table><br><br>";
			echo $gab1;

			$array_count = count($arR);
			for ($x = 0; $x < $array_count; $x++) {
				for ($a = 0; $a < $array_count - 1; $a++) {
					if ($a < $array_count) {
						if ($arR[$a] < $arR[$a + 1]) {
							swap($arR, $a, $a + 1);
							swap($arR_, $a, $a + 1);
							swap($IL, $a, $a + 1);
							swap($NL, $a, $a + 1);
							swap($ID, $a, $a + 1);
							swap($GB, $a, $a + 1);
						}
					}
				}
			}


			$gab1 = "<big>Sorting Hasil CPI Data Uji</big>";
			$gab1 .= "<table width='100%' border='1'>";
			$gab1 .= "<tr bgcolor='#cccccc'><td>No<td>Gambar <td>Nama Lokasi<td>Hasil</tr>";
			for ($i = 0; $i < $jd; $i++) {
				$no = $i + 1;
				$gambar = $GB[$i];
				$id_lokasi = $IL[$i];
				$GBR = url("ypathfile/" . $gambar);
				$gab1 .= "<tr><td>$no
<td><img src='$GBR' width='100px' height='80px'></td>
<td>$NL[$i]
<td><label title='$arR_[$i]'>$arR[$i]
</tr>";

				// narik hasil
				$payload = array(
					"id_penilaian" => $id_penilaian,
					"id_lokasi" => $id_lokasi,
					"rekapitulasi" => $arR_[$i],
					"hasil" => $no,
					"bobot" => $arR[$i],
					"keterangan" => "",
				);

				$create = Hasil::create($payload);
			}
			$gab1 .= "</table><br><br>";
			echo $gab1;



			function swap(&$arr, $a, $b)
			{
				$tmp = $arr[$a];
				$arr[$a] = $arr[$b];
				$arr[$b] = $tmp;
			}
			function bul($v)
			{
				return round($v, 2);
			}

			?>
		</div>
	</div>
















</div>
</form>
</div>
</div>
<!-- Portfolio End -->