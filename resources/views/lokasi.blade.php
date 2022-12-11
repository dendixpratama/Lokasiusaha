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
                            <li class="breadcrumb-item text-white active" aria-current="page">Lokasi</li>
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
        <nav class="navbar navbar-expand-lg bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Cari Rukoku</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <form class="d-flex" role="search" action="{{ url('/cari1') }}" method="post">
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
            @foreach ($lokasi as $lokasi)
            <div class="col-lg-4 col-md-6 portfolio-item first wow zoomIn" data-wow-delay="0.1s">
                <div class="position-relative rounded overflow-hidden">
                    <img class="img-fluid w-100" src="{{ url('ypathfile/'.$lokasi->gambar)}}" alt="">

                    <div class="portfolio-overlay">
                        <a class="btn btn-light" href="{{ url('ypathfile/'.$lokasi->gambar)}}" data-lightbox="portfolio">
                            <label title="{{$lokasi->alamat}} fasilitas: {{$lokasi->fasilitas}} {{$lokasi->deskripsi}}">
                                <i class="fa fa-plus fa-2x text-primary">
                            </label>
                            </i></a>
                        <div class="mt-auto">
                            <small class="text-white"><?php echo RP($lokasi->harga); ?></small>
                            <a class="h5 d-block text-white mt-1 mb-0" href="{{ route('detail.detailrk',$lokasi->id_lokasi) }}">

                                <label title="{{$lokasi->alamat}} fasilitas: {{$lokasi->fasilitas}} {{$lokasi->deskripsi}}">
                                    {{$lokasi->nama_lokasi}}
                                </label>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Portfolio End -->

@include('layouts.Footer')