@include('layouts.header')
@section('title','Tentang')
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
                <a href="/" class="nav-item nav-link">Beranda</a>
                <a href="/tentang" class="nav-item nav-link active">Tentang</a>
                <a href="/kontak" class="nav-item nav-link">Kontak</a>
            </div>
            <a href="/cpanel" class="btn btn-secondary text-light rounded-pill py-2 px-4 ms-3">Login Admin</a>
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
                            <li class="breadcrumb-item text-white active" aria-current="page">Tentang Kami</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Navbar & Hero End -->

<div class="container-xxl py-5">
    <div class="container px-lg-5">
        <div class="row g-5">
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="section-title position-relative mb-4 pb-2">
                    <h6 class="position-relative text-primary ps-4">Tentang Kami</h6>
                    <h2 class="mt-2">Rekomendasi Lokasi Usaha Terbaik di Jakarta</h2>
                </div>
                <p class="mb-4">Aplikasi rekomendasi lokasi usaha di Jakarta dengan menggunakan metode Composite Performance Index (CPI) output yang dihasilkan berupa perangkingan lokasi usaha di Jakarta</p>
                <div class="row g-3">
                    <div class="col-sm-6">
                        <h6 class="mb-3"><i class="fa fa-check text-primary me-2"></i>Akurasi Perangkingan</h6>
                        <h6 class="mb-0"><i class="fa fa-check text-primary me-2"></i>Rekomendasi usaha di Jakarta</h6>
                    </div>
                    <div class="col-sm-6">
                        <h6 class="mb-3"><i class="fa fa-check text-primary me-2"></i>Lokasi Usaha yang Strategis & Potensial</h6>
                        <h6 class="mb-0"><i class="fa fa-check text-primary me-2"></i>Informasi Akurat</h6>
                    </div>
                </div>
                <div class="d-flex align-items-center mt-4">
                    <a class="btn btn-primary rounded-pill px-4 me-3" href="">Read More</a>
                    <a class="btn btn-outline-primary btn-square me-3" href=""><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-outline-primary btn-square me-3" href=""><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-outline-primary btn-square me-3" href=""><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            <div class="col-lg-6">
                <img class="img-fluid wow zoomIn" data-wow-delay="0.5s" src="{{ asset('assets/img/about.jpg') }}">
            </div>
        </div>
    </div>
</div>
<!-- About End -->

@include('layouts.Footer')