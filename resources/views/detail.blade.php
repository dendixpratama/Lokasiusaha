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
                <a href="/lokasi" class="nav-item nav-link active">Lokasi</a>
                <a href="/fpenilaian" class="nav-item nav-link">Penilaian</a>
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
                            <li class="breadcrumb-item text-white active" aria-current="page">Detail Lokasi</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Navbar & Hero End -->

<!-- About Start -->
<div class="container-xxl py-5">
    <div class="container px-lg-5">
        <div class="row g-5">
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="section-title position-relative mb-4 pb-2">
                    <h2 class="mt-2">{{$lokasi->nama_lokasi}}</h2>
                </div>
                <h6 class="mb-3"><?php echo RP($lokasi->harga); ?></h6>
                <h6 class="mb-4">{{$lokasi->deskripsi}}</h6>
                <div class="row g-3">
                    <div class="col-sm-12">
                        <h6 class="mb-2">- {{$lokasi->alamat}}</h6>
                        <h6 class="mb-2">- {{$lokasi->fasilitas}}</h6>
                        <h6 class="mb-2">- {{$lokasi->status}}</h6>
                    </div>
                </div>
                <div class="row g-3">
                    <div class="col-sm-12">
                        <h6 class="mb-2">Map: </h6>
                        <iframe src="{{$lokasi->keterangan}}"></iframe>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <img class="img-fluid wow zoomIn" data-wow-delay="0.5s" src="{{ url('ypathfile/'.$lokasi->gambar)}}">
            </div>
        </div>
    </div>
</div>
<!-- About End -->