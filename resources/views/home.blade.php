<div class="container-xxl py-5">
    <div class="container px-lg-5">
        <div class="section-title position-relative text-center mb-5 pb-2 wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="position-relative d-inline text-primary ps-4">Lokasi Usaha</h6>
            <h2 class="mt-2">Rekomendasi Lokasi Usaha</h2>
        </div>
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
<!-- content End -->