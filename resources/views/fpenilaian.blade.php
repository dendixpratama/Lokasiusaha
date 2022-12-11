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
			<h2 class="mt-2">Rekomendasi Lokasi Usaha</h2>
		</div>

		<!-- search menu -->
		<nav class="navbar navbar-expand-lg bg-light">
			<div class="container-fluid">
				<a class="navbar-brand" href="#">Cari Rukoku</a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">

					<form class="d-flex" role="search" action="{{ url('/cari2') }}" method="post">
						@csrf
						<input class="form-control me-2" value="{{$txt1}}" name="txt1" type="search" placeholder="Item" aria-label="Search">
						<input class="form-control me-2" value="{{$txt2}}" name="txt2" type="number" placeholder="Harga Max" aria-label="Search">

						<button class="btn btn-outline-success" name="Search" type="submit">Search</button>
					</form>
				</div>
			</div>
		</nav>
		<br>


		<div class="row g-4 portfolio-container">


			<form action="{{ route('detail.fadd') }}" method="post">
				@csrf
				<div class="card shadow mb-2">
					<div class="card-body text-dark">
						<div class="form-group col-md-12">
							<label><big>Nama User :</label>
							<?php echo $atas; ?></big>
						</div>
						<div class="form-group col-md-12">
							<label><big>Email User :</label>
							<?php echo $bawah; ?></big>
						</div>
						<div class="form-group col-md-12">
							<label>Nama Penilaian :</label>
							<input type="text" required class="form-control" placeholder="" name="nama_penilaian" value="" required />
						</div>
						<div class="form-group col-md-12">
							<label>Deskripsi :</label>
							<input type="text" required class="form-control" placeholder="" name="deskripsi" value="" required />
						</div>
					</div>
				</div>



				<div class="table-responsive">
					<table class="table table-bordered text-dark" id="dataTable" width="100%" cellspacing="0">
						<thead class="table-primary">
							<tr>
								<th>No</th>
								<th>Gambar</th>
								<th>Lokasi</th>
								<th><label title="Harga Lokasi">HRG</label></th>
								<th><label title="Visibilitas">VSB</label></th>
								<th><label title="Traffic">TFC</label></th>
								<th><label title="Ruangan">RGN</label></th>
								<th><label title="Tempat Parkir">TPR</label></th>
								<th><label title="Akses">AKS</label></th>
								<th><label title="Persaingan">PSG</label></th>
								<th class="text-center">Catatan</th>
								<th>Pilih</th>
							</tr>
						</thead>
						@php($count=0)
						@forelse ($lokasis as $lokasi)
						<tr>
							<td class="text-center">{{$loop->iteration}}</td>
							<td><img src="{{ url('ypathfile/'.$lokasi->gambar)}}" width="100px" height="80px"></td>
							<td>
								<label title="{{$lokasi->deskripsi}} {{$lokasi->fasilitas}} {{RP($lokasi->harga)}}"><small> {{$lokasi->nama_lokasi}}</small> </label>
							</td>

							<td>
								<select class="form-control selectpicker" name="pil1[<?php echo $count; ?>]">
									<option value="Sangat Murah">Sangat Murah</option>
									<option value="Murah">Murah</option>
									<option value="Sedang">Sedang</option>
									<option value="Mahal">Mahal</option>
									<option value="Sangat Mahal">Sangat Mahal</option>
								</select>
							</td>

							<td>
								<select class="form-control selectpicker" name='pil2[<?php echo $count; ?>]'>
									<option value="Sangat Terlihat">Sangat Terlihat</option>
									<option value="Terlihat">Terlihat</option>
									<option value="Kurang Terlihat">Kurang Terlihat</option>
								</select>
							</td>

							<td>
								<select class="form-control selectpicker" name='pil3[<?php echo $count; ?>]'>
									<option value="Sangat Ramai">Sangat Ramai</option>
									<option value="Ramai">Ramai</option>
									<option value="Sepi">Sepi</option>
								</select>
							</td>

							<td>
								<select class="form-control selectpicker" name='pil4[<?php echo $count; ?>]'>
									<option value="Sangat Banyak">Sangat Banyak</option>
									<option value="Banyak">Banyak</option>
									<option value="Sedikit">Sedikit</option>
								</select>
							</td>

							<td>
								<select class="form-control selectpicker" name='pil5[<?php echo $count; ?>]'>
									<option value="Sangat Luas">Sangat Luas</option>
									<option value="Luas">Luas</option>
									<option value="Sempit">Sempit</option>
								</select>
							</td>

							<td>
								<select class="form-control selectpicker" name='pil6[<?php echo $count; ?>]'>
									<option value="Sangat Banyak">Sangat Banyak</option>
									<option value="Banyak">Banyak</option>
									<option value="Sedikit">Sedikit</option>
								</select>
							</td>

							<td>
								<select class="form-control selectpicker" name='pil7[<?php echo $count; ?>]'>
									<option value="Banyak">Banyak</option>
									<option value="Sedikit">Sedikit</option>
								</select>
							</td>
							<input type="hidden" value="{{$lokasi->id_lokasi}}" name="id_lokasi[<?php echo $count; ?>]">
							<td>
								<input type="text" name='catatan[<?php echo $count; ?>]'>
							</td>
							<td>
								<input type="checkbox" value="1" name="pilih[<?php echo $count; ?>]">
							</td>
						</tr>

						@php($count++)
						@empty
						<td colspan="8" class="text-center">Belum Ada Data Lokasi Usaha...</td>
						@endforelse

						<tr>
							<td>
							<td>
							<td>
							<td colspan="5">
								<input name="PROSES" class="btn btn-success" value="Analysis By CPI's" type="submit">
								<input type="hidden" value="<?php echo $userid; ?>" name="id_user">
								<input type="hidden" value="{{$count}}" name="counter">

								<input name="Reset" class="btn btn-danger" value="Reset" type="Reset">
							</td>
						</tr>
					</table>

				</div>
		</div>
		</form>
	</div>
</div>
<!-- Portfolio End -->