-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 01, 2022 at 01:27 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_lokasiusahafinal`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(8) NOT NULL,
  `nama_admin` varchar(35) NOT NULL,
  `email` varchar(30) NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(15) NOT NULL,
  `status` varchar(15) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `nama_admin`, `email`, `telepon`, `username`, `password`, `status`, `keterangan`) VALUES
(1, 'dendi', 'dendipratama44@gmail.com', '0881024225074', 'denday', '123', 'Aktif', '-');

-- --------------------------------------------------------

--
-- Table structure for table `tb_detail`
--

CREATE TABLE `tb_detail` (
  `id_detail` int(8) NOT NULL,
  `id_penilaian` int(15) NOT NULL,
  `id_lokasi` int(15) NOT NULL,
  `kriteria1` varchar(25) NOT NULL,
  `kriteria2` varchar(25) NOT NULL,
  `kriteria3` varchar(25) NOT NULL,
  `kriteria4` varchar(25) NOT NULL,
  `kriteria5` varchar(25) NOT NULL,
  `kriteria6` varchar(25) NOT NULL,
  `kriteria7` varchar(25) NOT NULL,
  `catatan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_detail`
--

INSERT INTO `tb_detail` (`id_detail`, `id_penilaian`, `id_lokasi`, `kriteria1`, `kriteria2`, `kriteria3`, `kriteria4`, `kriteria5`, `kriteria6`, `kriteria7`, `catatan`) VALUES
(8, 1, 2, 'Sangat Murah', 'Sangat Terlihat', 'Sangat Ramai', 'Sangat Banyak', 'Sangat Luas', 'Sangat Banyak', 'Banyak', 'cocok'),
(9, 1, 3, 'Sangat Murah', 'Sangat Terlihat', 'Sangat Ramai', 'Sangat Banyak', 'Sangat Luas', 'Sangat Banyak', 'Banyak', 'cocok'),
(10, 1, 4, 'Sangat Murah', 'Sangat Terlihat', 'Sangat Ramai', 'Sangat Banyak', 'Sangat Luas', 'Sangat Banyak', 'Banyak', 'cocok'),
(11, 1, 5, 'Sangat Murah', 'Sangat Terlihat', 'Sangat Ramai', 'Sangat Banyak', 'Sangat Luas', 'Sangat Banyak', 'Banyak', 'cocok');

-- --------------------------------------------------------

--
-- Table structure for table `tb_hasil`
--

CREATE TABLE `tb_hasil` (
  `id_hasil` int(11) NOT NULL,
  `id_penilaian` int(8) NOT NULL,
  `id_lokasi` int(15) NOT NULL,
  `rekapitulasi` varchar(25) NOT NULL,
  `hasil` varchar(25) NOT NULL,
  `bobot` int(25) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_lokasi`
--

CREATE TABLE `tb_lokasi` (
  `id_lokasi` int(8) NOT NULL,
  `nama_lokasi` varchar(55) NOT NULL,
  `deskripsi` text NOT NULL,
  `fasilitas` text NOT NULL,
  `alamat` text NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `harga` int(5) NOT NULL,
  `status` varchar(15) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_lokasi`
--

INSERT INTO `tb_lokasi` (`id_lokasi`, `nama_lokasi`, `deskripsi`, `fasilitas`, `alamat`, `gambar`, `harga`, `status`, `keterangan`) VALUES
(2, 'RUKO CEMPAKA MAS', 'DIJUAL/DISEWAKAN RUKO CEMPAKA MAS MEGA GROSIR JAKARRA PUSAT UKURAN 4.5 X 12 LUAS BANGUNAN 150 3 LANTAI HADAP SELATAN', '3 LANTAI, PARKIRAN BESAR, HARGA SEWA 85JT/THN', 'DKI Jakarta, Jakarta Pusat , Cempaka Mas', '1657095847lokasi.png', 85000000, 'Tersedia', 'Jika berminat hubungi Fero (GFA) 087877731278'),
(3, 'RUKO 2 LANTAI SENEN', 'Ruko Disewa Jl Letjen Soeprapto Jakarta Pusat', '- LINGKUNGAN AMAN DAN STRATEGLEBAR JALAN 4 MOBIL, BISA UNTUK USAHA BENGKEL DAN PERKANTORAN, DEKAT MAL ATRIUM SENEN', 'Jl Letjen Soeprapto Jakarta Pusat', '1657096251lokasi.png', 140000000, 'Tersedia', 'Jika berminat hub Albert 081319012019'),
(4, 'RUKO TANAH ABANG', 'DISEWA RUKO RAPIH SIAP PAKAI LOKASI STRATEGIS TANAH ABANG JAKARTA PUSAT', '6 UNIT AC, 2 LINE TELPON DAYA 10.600 WATT, DIMENSI 4,5 X 17,33 METER, 4 LANTAI', 'DKI Jakarta, Jakarta Pusat , Tanah Abang', '1657096587lokasi.png', 200000000, 'Tersedia', 'HADAP TIMURROW JALAN DEPAN 2 MOBILLT 1- LT 4 ADA SEKAT KACA + ALUMUNIUMDIDEPAN RUKO ADA PARKIR 6 X 4,5 METERHARGA SEWA RP 200 JT /TAHUN (NEGO)Jika berminat hub AMING 08161151273'),
(5, 'RUKO CIDENG', 'DISEWA RUKO CIDENG JAKARTA PUSAT  LT 90 M ² LB 216M²', 'CARPOT 2 MOBIL HADAP BARAT ROW JALAN 3 MOBIL COCOK UNTUK KANTOR/USAHA DLL', 'DKI Jakarta, Jakarta Pusat , Cideng', '1657096782lokasi.png', 125000000, 'Tersedia', 'HARGA SEWA RP 125 JT /THN (NEGO TIPIS)Jika berminat hub AMING 08161154608'),
(6, 'RUKO HIBRIDA KELAPA GADING', 'ROW JALAN LEBAR, AKSES KE LOKASI MUDAH, COCOK UNTUK USAHA LAUNDRY RESTO ATAU TOKO, PARKIR LUAS, KONDISI AMAN DAN NYAMAN', 'Akses lokasi mudah, parkir luas', 'DKI Jakarta, Jakarta Utara , Kelapa Gading', '1657097130lokasi.png', 95000000, 'Tersedia', 'Jika berminat hub HERRY 082156008291'),
(9, 'RUKO KEBAYORAN LAMA', 'Disewakan ruko murah strategis bintaro tanah kusir', 'Luas tanah 67 m2  Luas bangunan 150 m2 (4 lantai) Lokasi di pinggir jalan raya', 'Jalan Bintaro Raya, Tanah Kusir, Jakarta Selatan.', '1658585219lokasi.jpg', 12500000, 'Tersedia', 'Lokasi di pinggir jalan rayaDekat dengan Pasar Tradisional Kebayoran LamaDekat dengan ATMDekat dengan MRT Lebak BulusDekat stasiun Kebayoran (4 menit)2 km dari Tol VeteranStrategis dekat hook lampu merahSertifikat hak milikHarga Sewa Rp 12.500.000 / bulan (minimal sewa 1 tahun). Untuk penyewa dalam kurun waktu lebih dari 1 tahun harga masih bisa negosiasi.Contact Number :0895-3305-13658 (Anis / call or wa)'),
(10, 'RUKO KEMANG', 'Disewa murah ruko/ruang usaha di jln. benda raya dekat kemang, bangunan baru, bebas banjir, strategis, cocok utk usaha klinik kecantikan, minimarket, showroom, bakery, butik, perbankan, dll. Harga masih bisa nego', 'SHM, 1 lantai, 2 kamar mandi, LT : 200 m² LB : 150 m², parkir luas', 'Kemang, Jakarta Selatan', '1658769757lokasi.jpg', 200000000, 'Tersedia', 'Rp 250 Juta Total per tahunRuko/Ruang usaha di jakarta selatanHub : 087876812937'),
(11, 'RUKO KEMANG RAYA', 'Disewa ruko kemang raya 2 lantai jarang ada cocok utk usaha butik, salon, klinik, showroom, coffee shop, kantor, resto dll..murah', 'parkir luas, LT90 LB162, 1 lantai 2 kamar mandi', 'Kemang Raya, Jakarta Selatan', '1658769770lokasi.jpg', 225000000, 'Tersedia', 'Jika berminat hub : 0878768291827'),
(12, 'RUKO CILANDAK', 'Di sewakan Ruko murah strategis di Fatmawati Cilandak Jakarta Selatan  Luas tanah : 92 M Bangunan 2 Lantai ukuran 4.5x13×31 Air jetpump listrik : 2200 Watt  Harga sewa :  250juta/thn perunit nego 500juta/thn 2unit nego  lokasi strategis dan ramai cocok untuk tempat usaha atau perkantoran', '- dekat pusat kuliner - lokasi Ramai pertokoan dan perkantoran - dekat RS Fatmawati dan Setia Mitra - 10 menit ke Citos - dekat ITC Cipete - dekat Stasiun MRT - akses jalan besar utama Bebas banjir', 'Cilandak, Jakarta Selatan', '1658769782lokasi.jpg', 250000000, 'Tersedia', 'Jika berminat hubungi : 08314328172 (Bayu)'),
(13, 'RUKO TJ BARAT', 'Komersial disewa dengan di Tanjung Barat, Jakarta Lokasi Strategis dekat perkantoran TB Simatupang, Stasiun KRL Tj Barat, DETAIL SHM, Kondisi Bangunan Terawat, ADA TEMPAT PARKIR YANG LUAS, Listrik 2200 VA,1 Lantai, ada kamar mandinya, dan cocok untuk bisnis dan toko.  HARGA SEWA :  Rp. 25 JUTA/THN', 'SHM, Kondisi Bangunan Terawat, ADA TEMPAT PARKIR YANG LUAS, Listrik 2200 VA,1 Lantai, ada kamar mandinya, dan cocok untuk bisnis dan toko.', 'Jakarta, Jakarta Selatan, Tanjung Barat', '1658769799lokasi.jpg', 25000000, 'Tersedia', 'Jika berminat hub : 08151845677'),
(14, 'RUKO MANGGA BESAR', '2 RUKO JADI SATU, RUKO MANGGA BESAR, JAKARTA BARAT  Lt : 4 x 25 (dua ruko jadi 1, total 8 x 25)  Lb : 8 x 16 (3.5 lantai)  Listrik : ada 2 meteran terpisah, 2200 + 4400  Air pam  Lokasi strategis', '3 kamar mandi, 3 lantai, LT200m, parkir sedang, keamanan', 'Jakarta, Jakarta Barat, Mangga Besar', '1658769819lokasi.jpg', 210000000, 'Tersedia', 'Lokasi strategisHarga 210 Jt/thnJika berminat hub : CJ PRO0815 1356 5797'),
(15, 'RUKO PENGUMBEN', 'Ruko Disewa Jakarta Barat RUKO LOOSS MURAH MERIAH AJA DI PINGGIR JALAN RAYA POS PENGUMBEN. YUK BURUAN, LANGSUNG BS USAHA. PARKIR MEMADAI KRN ADA DI KOMPLEK RUKO', '2 kamar mandi, LT30m LB90m, SHM', 'Pos Pengumben, Jakarta Bara', '1658769829lokasi.jpg', 112000000, 'Tersedia', 'Ruko mumer tepat menghadap jalan rayaharga 112.000.000 per tahunJika berminat hub : 081911517281 (novita)');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pelanggan`
--

CREATE TABLE `tb_pelanggan` (
  `id_pelanggan` int(8) NOT NULL,
  `nama_pelanggan` varchar(25) NOT NULL,
  `email` varchar(35) NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(15) NOT NULL,
  `status` varchar(15) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pelanggan`
--

INSERT INTO `tb_pelanggan` (`id_pelanggan`, `nama_pelanggan`, `email`, `telepon`, `username`, `password`, `status`, `keterangan`) VALUES
(1, 'didi', 'denday233@gmail.com', '08123456778', 'Didi', '12333', 'on', '-'),
(4, 'yesi', 'yesi@gmail.com', '987593759834', 'y', 'y', 'Aktif', '-');

-- --------------------------------------------------------

--
-- Table structure for table `tb_penilaian`
--

CREATE TABLE `tb_penilaian` (
  `id_penilaian` int(8) NOT NULL,
  `id_pelanggan` int(15) NOT NULL,
  `nama_penilaian` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `status` varchar(15) NOT NULL DEFAULT 'Proses',
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_penilaian`
--

INSERT INTO `tb_penilaian` (`id_penilaian`, `id_pelanggan`, `nama_penilaian`, `deskripsi`, `tanggal`, `jam`, `status`, `keterangan`) VALUES
(1, 1, 'Mau Sewa Toko Untuk Usaha Pasca Pandemi', 'Kakak abis pindah kerjaa..mau buat usaha', '2022-07-06', '14:44:52', 'Proses', 'wer'),
(2, 1, 'Mau Sewa Toko Untuk Usaha Pasca Pandemi II', 'Kakak abis pindah kerjaa..mau buat usaha', '2022-07-14', '10:17:42', 'Proses', '-');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tb_detail`
--
ALTER TABLE `tb_detail`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indexes for table `tb_hasil`
--
ALTER TABLE `tb_hasil`
  ADD PRIMARY KEY (`id_hasil`);

--
-- Indexes for table `tb_lokasi`
--
ALTER TABLE `tb_lokasi`
  ADD PRIMARY KEY (`id_lokasi`);

--
-- Indexes for table `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `tb_penilaian`
--
ALTER TABLE `tb_penilaian`
  ADD PRIMARY KEY (`id_penilaian`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_detail`
--
ALTER TABLE `tb_detail`
  MODIFY `id_detail` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tb_hasil`
--
ALTER TABLE `tb_hasil`
  MODIFY `id_hasil` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_lokasi`
--
ALTER TABLE `tb_lokasi`
  MODIFY `id_lokasi` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  MODIFY `id_pelanggan` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_penilaian`
--
ALTER TABLE `tb_penilaian`
  MODIFY `id_penilaian` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
