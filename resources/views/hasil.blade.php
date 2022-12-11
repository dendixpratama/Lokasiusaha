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
                <a href="/hasil" class="nav-item nav-link active">Hasil</a>
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

<!-- Portfolio Start -->
<div class="container-xxl py-5">
    <div class="container px-lg-5">
        <div class="section-title position-relative text-center mb-5 pb-2 wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="position-relative d-inline text-primary ps-4">Lokasi Usaha</h6>
            <h2 class="mt-2">Rekomendasi Lokasi Usaha</h2>
        </div>

        <?php
        $no = $i + 1;
        $gab1 .= "<tr><td>$no<td>$NL[$i]
            <td><label title='$v1_'>$v1
            <td><label title='$v2_'>$v2
            <td><label title='$v3_'>$v3
            <td><label title='$v4_'>$v4
            <td><label title='$v5_'>$v5
            <td><label title='$v6_'>$v6
            <td><label title='$v7_'>$v7
            </tr>";

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
                "id_lokasi" => $id_lokasi, //BELOMAN
                "rekapitulasi" => $arR_[$i],
                "hasil" => $no, //BELOMAN
                "bobot" => $arR[$i], //BELOMAN
                "keterangan" => "", //BELOMAN
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
</div>