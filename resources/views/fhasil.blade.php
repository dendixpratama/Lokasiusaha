@include('layouts.header')
@section('title','hasil')
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
                <a href="/fpenilaian" class="nav-item nav-link">Penilaian</a>
                <a href="/fhasil" class="nav-item nav-link active">Hasil</a>
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
                            <li class="breadcrumb-item text-white active" aria-current="page">Hasil</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Navbar & Hero End -->

@forelse ($penilaians as $pen)
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <h4>Nama Penilaian: {{$pen->nama_penilaian}}</h4>
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
		and tb_hasil.id_lokasi=tb_lokasi.id_lokasi 
		and tb_penilaian.id_user='$userid' and  tb_penilaian.id_penilaian='$id_penilaian' order by tb_hasil.id_hasil asc";
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

<div class="modal fade" id="edit{{ $hasil->id_hasil }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content text-dark">
            <div class="modal-header">
                <h5 class="modal-title">Edit Data Hasil</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form action="{{ route('hasils.update',['hasil' => $hasil->id_hasil]) }}" method="POST">

                    @method('PATCH')
                    @csrf

                    <div class="card shadow mb-4">
                        <div class="card-body" style="text-align: left">

                            <div class="form-group col-md-12">
                                <label>Keterangan :</label>
                                <input type="text" class="form-control" placeholder="" name="keterangan" value="{{ $hasil->keterangan }}">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-check"></span> Simpan</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>