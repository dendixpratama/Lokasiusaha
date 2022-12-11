@include('layouts.header')
@section('title','Kontak Kami')

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
                <a href="/tentang" class="nav-item nav-link">Tentang</a>
                <a href="/kontak" class="nav-item nav-link active">Kontak</a>
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
                            <li class="breadcrumb-item text-white active" aria-current="page">Kontak Kami</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Navbar & Hero End -->


<!-- Full Screen Search Start -->
<div class="modal fade" id="searchModal" tabindex="-1">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content" style="background: rgba(29, 29, 39, 0.7);">
            <div class="modal-header border-0">
                <button type="button" class="btn bg-white btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body d-flex align-items-center justify-content-center">
                <div class="input-group" style="max-width: 600px;">
                    <input type="text" class="form-control bg-transparent border-light p-3" placeholder="Type search keyword">
                    <button class="btn btn-light px-4"><i class="bi bi-search"></i></button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Full Screen Search End -->


<!-- Contact Start -->
<div class="container px-lg-5">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="section-title position-relative text-center mb-5 pb-2 wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="position-relative d-inline text-primary ps-4">Kontak Kami</h6>
                <h2 class="mt-2">Alamat Kami</h2>
            </div>
            <div class="wow fadeInUp" data-wow-delay="0.3s">
                <div class="container py-5 px-lg-5">
                    <div class="row g-5">
                        <div class="col-md-6 col-lg-4">
                            <h6 class="position-relative d-inline text-primary ps-4">Alamat Kami</h6>
                            <p><i class="fa fa-map-marker-alt me-3"></i>Teknik Informatika, Fakultas Teknik, Universitas Persada Indonesia Y.A.I
                                Jl. Pangeran Diponegoro No. 74, Kenari, Senen, Jakarta Pusat</p>
                            <p><i class="fa fa-phone-alt me-3"></i>+62881024225073</p>
                            <p><i class="fa fa-envelope me-3"></i>Rukoku@gmail.com</p>
                        </div>

                        <div class="col-md-6 col-lg-8">
                            <h6 class="position-relative d-inline text-primary ps-4">Map</h6>
                            <p><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.504833828431!2d106.84694011426845!3d-6.196927062433673!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69ec24e3f773c3%3A0x483a1180bc6cf18f!2sUniversitas%20Persada%20Indonesia%20Y.A.I!5e0!3m2!1sid!2sid!4v1658381507860!5m2!1sid!2sid" width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Contact End -->

@include('layouts.Footer')