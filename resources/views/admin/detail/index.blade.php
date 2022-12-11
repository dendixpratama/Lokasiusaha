@extends('layout.v_template')
@section('title','Detail | Lokasi Usaha')
@section('mndetail','active')

@section('content')



<div class="card">
	<div class="card-body">
		<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
		<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>

		<script>
			$(document).ready(function() {
				$('#examplec').DataTable();
			});
		</script>
		<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
		<h3>ID Penilaian: {{$id_penilaian}}</h3>
		<big>Nama Penilaian: {{getPenilaian($id_penilaian)}}</big>

		<form action="{{ route('detail.add') }}" method="post">
			@csrf

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
							<b><label title="{{$lokasi->deskripsi}} {{$lokasi->fasilitas}}"><small> {{$lokasi->nama_lokasi}}</small> </label>
						</td>

						<td>
							<select name="pil1[<?php echo $count; ?>]">
								<option value="Sangat Murah">Sangat Murah</option>
								<option value="Murah">Murah</option>
								<option value="Sedang">Sedang</option>
								<option value="Mahal">Mahal</option>
								<option value="Sangat Mahal">Sangat Mahal</option>
							</select>
						</td>

						<td>
							<select name='pil2[<?php echo $count; ?>]'>
								<option value="Sangat Terlihat">Sangat Terlihat</option>
								<option value="Terlihat">Terlihat</option>
								<option value="Kurang Terlihat">Kurang Terlihat</option>
							</select>
						</td>

						<td>
							<select name='pil3[<?php echo $count; ?>]'>
								<option value="Sangat Ramai">Sangat Ramai</option>
								<option value="Ramai">Ramai</option>
								<option value="Sepi">Sepi</option>
							</select>
						</td>

						<td>
							<select name='pil4[<?php echo $count; ?>]'>
								<option value="Sangat Banyak">Sangat Banyak</option>
								<option value="Banyak">Banyak</option>
								<option value="Sedikit">Sedikit</option>
							</select>
						</td>

						<td>
							<select name='pil5[<?php echo $count; ?>]'>
								<option value="Sangat Luas">Sangat Luas</option>
								<option value="Luas">Luas</option>
								<option value="Sempit">Sempit</option>
							</select>
						</td>

						<td>
							<select name='pil6[<?php echo $count; ?>]'>
								<option value="Sangat Banyak">Sangat Banyak</option>
								<option value="Banyak">Banyak</option>
								<option value="Sedikit">Sedikit</option>
							</select>
						</td>

						<td>
							<select name='pil7[<?php echo $count; ?>]'>
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
							<input type="hidden" value="{{$count}}" name="counter">
							<input type="hidden" value="{{$id_penilaian}}" name="id_penilaian">

						</td>
					</tr>
				</table>

			</div>
	</div>
	</form>

	<div class="card">
		<div class="card-body">
			@if(session()->has('pesan'))
			<div class="alert alert-success">
				{{ session()->get('pesan')}}
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			@endif
			<div class="table-responsive">
				<table class="table table-bordered text-dark" id="dataTable" width="100%" cellspacing="0">
					<thead class="table-primary">
						<tr>
							<th>No</th>
							<th>Penilaian</th>
							<th>Lokasi</th>
							<th>Kriteria</th>
							<th>Catatan</th>
							<th class="text-center">Menu</th>
						</tr>
					</thead>
					<tbody>
						@forelse ($details as $detail)
						<tr>
							<td class="text-center">{{$loop->iteration}}</td>
							<td>{{$detail->id_penilaian}}</td>
							<td>{{$detail->id_lokasi}}</td>
							<td>Kriteria 1: {{$detail->kriteria1}}, Kriteria 2: {{$detail->kriteria2}}, Kriteria 3: {{$detail->kriteria3}}, Kriteria 4: {{$detail->kriteria4}}<br>
								Kriteria 5: {{$detail->kriteria5}}, Kriteria 6: {{$detail->kriteria6}}, Kriteria 7: {{$detail->kriteria7}}</td>
							<td>{{$detail->catatan}}</td>
							<td class="text-center">
								<div>
									<a href="#edit{{ $detail->id_detail }}" data-toggle="modal"><i class="fa fa-edit text-warning"></i></a>

									<a href="#del{{ $detail->id_detail }}" data-toggle="modal"><i class="fa fa-trash text-danger"></i></a>
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
		</div>
	</div>



	<!-- End of Content Wrapper -->
	@endsection