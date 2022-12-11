@extends('layout.v_template')
@section('title','Hasil | Lokasi Usaha')
@section('mnhasil','active')

@section('content')
<!-- Content Wrapper -->
<div class="card">
    <div class="card-body">
        <a href="javascript.void(0)" class="btn btn-primary btn-sm" data-target="#ModalAdd" data-toggle="modal"><i class="fa fa-plus"></i> Tambah Data Hasil</a>
        <br>
        <hr>
        @if(session()->has('pesan'))
        <div class="alert alert-success">
            {{ session()->get('pesan')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
    </div>
</div>



@forelse ($penilaians as $pen)
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <h4>Nama Penilaian: {{$pen->nama_penilaian}}</h4>
            <h5>Nama User: {{getUser($pen->id_user)}} # {{$pen->tanggal}} {{$pen->jam}} Wib</h5>

            <table class="table" id="dataTable">
                <thead class="table-primary">
                    <tr>
                        <th>No</th>
                        <th width="10%">Gambar</th>
                        <th width="30%">Info Lokasi</th>
                        <th>Rekapitulasi</th>
                        <th>Hasil</th>
                        <th>Bobot</th>
                        <th>Keterangan</th>
                        <th class="text-center">Menu</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $id_penilaian = $pen->id_penilaian;
                    $sql = "select * from tb_penilaian,tb_lokasi,tb_hasil 
		where tb_hasil.id_penilaian=tb_penilaian.id_penilaian
		and tb_hasil.id_lokasi=tb_lokasi.id_lokasi and tb_penilaian.id_penilaian='$id_penilaian' order by tb_hasil.id_hasil asc";
                    $hasils = DB::select($sql);
                    ?>
                    @forelse ($hasils as $hasil)
                    <tr>
                        <td class="text-center">{{$loop->iteration}}</td>
                        <td><img src="{{ url('ypathfile/'.$hasil->gambar)}}" width="100px" height="100px"></td>
                        <td>
                            <b>{{$hasil->nama_lokasi}}</b><br>
                            <small>{{$hasil->deskripsi}}, Alamat: {{$hasil->alamat}}
                            </small>
                        </td>

                        <td>{{$hasil->rekapitulasi}}</td>
                        <td>{{$hasil->hasil}}</td>
                        <td>{{$hasil->bobot}}</td>
                        <td>{{$hasil->keterangan}}</td>
                        <td class="text-center">
                            <div>
                                <a href="#edit{{ $hasil->id_hasil }}" data-toggle="modal"><i class="fa fa-edit text-warning" title="Ubah"></i></a>
                                <a href="#del{{ $hasil->id_hasil }}" data-toggle="modal"><i class="fa fa-trash text-danger" title="Hapus"></i></a>
                                @include('admin.hasil.modal')
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
@empty
<small>Data Belum tersedia</small>
@endforelse








<!-- Modal Popup untuk Add-->
<div id="ModalAdd" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content text-dark">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Hasil</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-dark">
                <form action="{{ route('hasils.store') }}" method="POST">
                    @csrf

                    <div class="card shadow mb-4">
                        <div class="card-body text-dark">
                            <div class="form-group col-md-12">
                                <label>Pilih Penilaian :</label>
                                <input type="text" class="form-control" placeholder="" name="id_penilaian" value="" required>
                            </div>

                            {{-- <div class="form-group col-md-12">
                                            <label>Pilih Penilaian :</label>
                                            <select class="form-control selectpicker" data-live-search="true" name="id_penilaian" required="">
                                             <option value="" disabled selected>- Pilih Lokasi -</option>
                                           @foreach ($penilaians as $id_penilaian => $nama_penilaian)
                                                <option value="{{ $id_penilaian }}">{{ $nama_penilaian }}</option>
                            @endforeach
                            </select>
                        </div> --}}

                        <div class="form-group col-md-12">
                            <label>Pilih Lokasi :</label>
                            <input type="text" class="form-control" placeholder="" name="id_lokasi" value="" required>
                        </div>

                        {{-- <div class="form-group col-md-12">
                                            <label>Pilih Lokasi :</label>
                                            <select class="form-control selectpicker" data-live-search="true" name="id_lokasi" required="">
                                             <option value="" disabled selected>- Pilih Lokasi -</option>
                                           @foreach ($lokasis as $id_lokasi => $nama_lokasi)
                                                <option value="{{ $id_lokasi }}">{{ $nama_lokasi }}</option>
                        @endforeach
                        </select>
                    </div> --}}

                    <div class="form-group col-md-12">
                        <label>Rekapitulasi :</label>
                        <input type="text" class="form-control" placeholder="" name="rekapitulasi" value="" required>
                    </div>

                    <div class="form-group col-md-12">
                        <label>Bobot :</label>
                        <input type="text" class="form-control" placeholder="" name="bobot" value="" required>
                    </div>
                    <div class="form-group col-md-12">
                        <label>Hasil :</label>
                        <input type="text" class="form-control" placeholder="" name="hasil" value="" required>
                    </div>
                    <div class="form-group col-md-12">
                        <label>Keterangan :</label>
                        <input type="text" class="form-control" placeholder="" id="keterangan" name="keterangan">
                    </div>
            </div>
        </div>
        <div class="modal-footer">
            <button class="btn btn-success " type="submit">
                Simpan
            </button>

            <button type="reset" class="btn btn-danger" data-dismiss="modal" aria-hidden="true">
                Batal
            </button>
        </div>

        </form>

    </div>
</div>
</div>
</div>
<!-- /.modal -->

<!-- End of Content Wrapper -->
@endsection