-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 29, 2020 at 03:14 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `desa`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(200) NOT NULL,
  `nama_admin` varchar(100) NOT NULL,
  `telp` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `nama_admin`, `telp`) VALUES
(1, 'admin', 'f865b53623b121fd34ee5426c792e5c33af8c227', 'Dzawin', '08976543212'),
(2, 'admin2', 'tes123', 'Rose', '08123456789');


-- --------------------------------------------------------

--
-- Table structure for table `apartur_desa`
--

CREATE TABLE `apartur_desa` (
  `id_apartur` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `jkel` set('Laki-laki','Perempuan','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `apartur_desa`
--

INSERT INTO `apartur_desa` (`id_apartur`, `nama`, `jabatan`, `jkel`) VALUES
(1, 'MURTAKIL HUMAM', 'Kepala Desa', 'Laki-laki'),
(2, 'FAJAR PUDIARNA, ST', 'Sekretaris Desa', 'Laki-laki'),
(3, 'RADEN ARIS SUKENDAR, SPDT', 'Kepala Urusan Umum Agama', 'Laki-laki'),
(4, 'SITI MANGISAH', 'Kepala Urusan Perencanaan', 'Perempuan'),
(5, 'SURYONO', 'Kepala Seksi Pemerintahan', 'Laki-laki'),
(6, 'SUNARDI', 'Kepala Seksi Pembangan', 'Laki-laki'),
(7, 'ANDI FITRIYONO', 'Kepala Seksi Kemasyarakatan', 'Laki-laki'),
(20, 'BISA DIEDIT', 'Alhamdulillah bisa ya', 'Perempuan');

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `isi_berita` text NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_admin` int(11) NOT NULL,
  `file` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id`, `judul`, `isi_berita`, `tanggal`, `id_admin`, `file`) VALUES
(1, 'Siapkah Desa di Indonesia Masuk Era New Normal?', 'Menteri Desa, Pembangunan Daerah Tertinggal dan Transmigrasi (PDTT) Abdul Halim Iskandar membeberkan skema persiapan desa dalam menghadapi New Normal.\r\n\r\nMenurutnya, desa harus lebih siap menghadapi New Normal pada konteks pertahanan diri dan lingkungan dari dampak Corona dengan memadukan protokol kesehatan dari Kementerian dan Lembaga serta kearifan lokal.\"Jadi protokolnya ini sesuai dengan Kementerian dan Lembaga yang mengeluarkan. Kalau urusan kesehatan berarti mengacu ke Kemenkes, kalau pemerintahan berarti mengacu ke Kemendagri. Di sini, Kemendes PDTT mengisi ruang kosong,\" jelasnya dalam paparan virtual, Selasa (2/6/2020).\r\n\r\nLebih lanjut, pria yang akrab disapa Gus Halim ini menjelaskan, desa diminta berimprovisasi dan menyesuaikan protokol yang hendak disusun dan diterapkan sesuai dengan akar budaya desa.', '2020-06-26 14:36:59', 1, 'berita1.jpg'),
(2, 'Doni Monardo: Pimpinan Desa Bisa Jadi Ujung Tombak', 'Liputan6.com, Jakarta - Ketua Gugus Tugas Percepatan Penanganan Virus Corona Covid-19 Doni Monardo menyebut, pimpinan di desa memiliki kontribusi yang luar biasa dalam melindungi warganya dari pandemi Corona.\r\n\r\nMenurut Doni, pada masa seperti pandemi corona Covid-19 ini, pimpinan desa memiliki peranan yang begitu strategis.\r\n\r\n\"Kepala desa, termasuk juga para lurah dan wali nagari memiliki kontribusi yang luar biasa dalam melindungi segenap warga bangsa kita,\" kata Doni dalam konferensi pers daring, Minggu (19/4/2020).\r\n\r\nDoni menyebut, desa harusnya menjadi ujung tombak dalam masa-masa sulit seperti sekarang ini.\r\n\r\n\"Kepala desa harus menjadi pimpinan terbaik saat ini yang juga harus bisa menjalin kolaborasi dengan segenap komponen yang ada di desa,\" ucap dia.\r\n\r\nDoni menjabarkan, komponen yang ada di desa itu, mulai dari PKK, Karang Taruna, dan sejumlah organisasi lain, seperti relawan, tokoh agama, dan tokoh pemuda.\r\n\r\n\"Termasuk juga para ketua RT dan juga ketua RW,\" terang Doni.', '2020-06-28 11:53:29', 2, 'berita2.jpeg'),
(3, 'Proyek Tol Yogya-Cilacap Ditargetkan Mulai 2022', 'Tahapan pembangunan jalan tol Yogyakarta-Cilacap baru akan memasuki proses pembebasan lahan.\r\n\r\nSelain persiapan pembebasan lahan, penentuan jalur yang nantinya dilewati pengerjaan jalan tol tersebut juga masih dalam pembahasan.\r\n\r\nKepala Badan Perencanaan Pembangunan Daerah (Bappeda) DIY Budi Wibowo menyampaikan, tahapan pembangunan tol Yogyakarta-Cilacap baru dalam proses kajian penentuan jalur.\r\n\r\nIa mengatakan, setelah proses pembebasan lahan proyek tol Solo-Jogja-Bawen usai, pihaknya langsung bergeser untuk pembangunan tol lintas Selatan.\r\n\r\n\"Sudah mulai masuk kajian. Begitu administrasi tol Solo-Yogyakarta-Bawen selesai, langsung lanjut untuk jalur Yogyakarta-Cilacap,\" katanya kepada Tribunjogja.com, Senin (22/6/2020)', '2020-06-20 17:00:00', 2, NULL),
(4, 'Bismillah', 'Bismillah', '2020-06-28 09:57:41', 1, NULL),
(5, 'Gelar Musrenbangdes 2018, Pemdes Sumberjo Siapkan ', 'KabarDesa.com, Bojonegoro – Puluhan hadirin yang berasal dari berbagai unsur masyarakat ikut serta dalam Musyawarah Rencana Pembangunan Desa (Musrenbangdes) 2018 desa Sumberjo, kecamatan Margomulyo hari ini (10/01). Unsur-unsur tersebut diantaranya Muspika, Perangkat Desa, Kepala Dusun dan jajaran RT/RW, BPD, LPMD, PKK, perwakilan UPTD hingga para tokoh masyarakat.\r\n\r\nKegiatan Musrenbangdes 2018 sendiri dilaksanakan sebagai bentuk kesiapan Desa Sumberjo untuk membentuk rumusan program kerja yang akan dilaksanakan pada tahun 2019 mendatang. Kegiatan ini juga sebagai bentuk tindak lanjut dari Musyawarah Dusun yang telah dilaksanakan di 8 dusun yang ada di desa Sumberjo.\r\n\r\nKepala Desa Sumberjo, Nurjito Evendi dalam sambutannya juga memaparkan rencana program pembangunan tahun 2018 serta mengajak seluruh lapisan masyarakat untuk aktif memberikan masukan demi kemajuan desa.\r\n\r\n“Forum ini mari kita gunakan untuk saling bermusyawarah dan mendiskusikan program-program prioritas yang akan kita laksanakan ke depan. Semua yang hadir pada hari ini silakan memberikan usulan-usulan yang membangun untuk kemajuan desa Sumberjo”, pungkasnya.\r\n\r\nKegiatan dilanjutkan dengan diskusi bidang yang dibagi dalam 4 kelompok yakni Pemerintahan, Pembangunan, Pembinaan dan Pemberdayaan masyarakat. Dari hasil musyawarah bidang tersebut lah poin-poin hasil Musrenbangdes dikumpulkan untuk selanjutnya akan dibawa dalam Musrenbangcam Margomulyo pada Februari mendatang.', '2020-06-29 06:53:02', 1, 'berita1.jpeg'),
(6, 'KKN Universitas Negeri Malang Adakan Sosialisasi ', 'KabarDesa.com, Jombang – Hari Jum’at, tanggal 25 Mei 2018 bertempat di balai desa, mahasiswa Universitas Negeri Malang yang sedang menjalankan KKN (Kuliah Kerja Nyata) mengadakan pertemuan dengan tim penggerak PKK (Pemberdayaan Kesejahteraan Keluarga) Desa Tondowulan, Kecamatan Plandaan, Kabupaten Jombang.\r\n\r\nPertemuan tersebut diadakan dalam rangka memperkenalkan salah satu program kerja dari kegiatan KKN.\r\n\r\nSosialisasi pengelolaan potensi hasil pertanian, itulah nama dari kegiatan yang dimulai sejak pukul 10.00 WIB. Pembawa acaranya adalah Ibu Andrik yang merupakan salah satu anggota PKK. Acara dimulai begitu khidmat dengan menyanyikan lagu Indonesia Raya dan Mars PKK yang dipimpin oleh Ibu Bambang. Dilanjutkan dengan sambutan oleh Ibu Kepala Desa Tondowulan, Ibu Yatini selaku ketua tim penggerak PKK Desa Tondowulan.\r\n\r\nSetelah itu, acara sosialisasi berlangsung dengan dua pembicara yaitu Denata sebagai penanggung jawab program kerja tersebut dan Deni sebagai koordinator desa.\r\n\r\n', '2020-06-29 06:53:02', 2, 'berita2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `data_rt`
--

CREATE TABLE `data_rt` (
  `id_rt` varchar(11) NOT NULL,
  `no_rt` varchar(10) NOT NULL,
  `id_dusun` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_rt`
--

INSERT INTO `data_rt` (`id_rt`, `no_rt`, `id_dusun`) VALUES
('BL01', 'RT 01', 2),
('BL02', 'RT 02', 2),
('BL03', 'RT 03', 2),
('BLM01', 'RT 01', 1),
('BLM02', 'RT 02', 1),
('BLM03', 'RT 03', 1),
('JLT01', 'RT 01', 3),
('JLT02', 'RT 02', 3),
('JLT03', 'RT 03', 3),
('JRG01', 'RT 01', 4),
('JRG02', 'RT 02', 4),
('JRG03', 'RT 03', 4),
('KRG01', 'RT 01', 5),
('KRG02', 'RT 02', 5),
('KRG03', 'RT 03', 5),
('KRI01', 'RT 01', 6),
('KRI02', 'RT 02', 6),
('KRI03', 'RT 03', 6),
('KRII01', 'RT 01', 7),
('KRII02', 'RT 02', 7),
('KRII03', 'RT 03', 7),
('KRS01', 'RT 01', 8),
('KRS02', 'RT 02', 8),
('KRS03', 'RT 03', 8),
('MRB01', 'RT 01', 10),
('MRB02', 'RT 02', 10),
('MRB03', 'RT 03', 10),
('RJS01', 'RT 01', 9),
('RJS02', 'RT 02', 9),
('RJS03', 'RT 03', 9);

-- --------------------------------------------------------

--
-- Table structure for table `dusun`
--

CREATE TABLE `dusun` (
  `id_dusun` int(11) NOT NULL,
  `nama_dsn` varchar(20) NOT NULL,
  `kepala_dkh` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dusun`
--

INSERT INTO `dusun` (`id_dusun`, `nama_dsn`, `kepala_dkh`) VALUES
(1, 'Blambangan', 'Maryadi,A.Md'),
(2, 'Bulu', 'Sudarmo'),
(3, 'Jlatren', 'Mashuri, S.Pd'),
(4, 'Jranggung', 'Tikno'),
(5, 'Karongan', 'Aris Warsito'),
(6, 'Kranggan I', 'Suharmadi'),
(7, 'Kranggan II', 'Sukamto'),
(8, 'Krasaan', 'Suatmirah, A.Md'),
(9, 'Rejosari', 'Hartono'),
(10, 'Morobangun', '	Budi Santosa');

-- --------------------------------------------------------

--
-- Table structure for table `kepala_keluarga`
--

CREATE TABLE `kepala_keluarga` (
  `no_kk` bigint(16) NOT NULL,
  `nama_kk` varchar(150) NOT NULL,
  `id_rt` varchar(11) NOT NULL,
  `id_dusun` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kepala_keluarga`
--

INSERT INTO `kepala_keluarga` (`no_kk`, `nama_kk`, `id_rt`, `id_dusun`) VALUES
(23344555556465, 'MENCOBA', 'BLM02', 1),
(3404080802059634, 'SULISTYO', 'BLM01', 1),
(3404080802059635, 'PARIMAN', 'BLM01', 1),
(3404080802059636, 'AMIN WIDODO', 'BLM01', 1),
(3404080802059637, 'RUSTAMADI', 'BLM01', 1),
(3404080802059638, 'SUGIYADI', 'BLM01', 1),
(3404080802059639, 'SRI SUWARNI', 'BLM02', 1),
(3404080802059640, 'ADI SUWARNO', 'BLM02', 1),
(3404080802059641, 'BASIRAN', 'BLM02', 1),
(3404080802059642, 'SUGIYONO', 'BLM02', 1),
(3404080802059643, 'PURWANTO', 'BLM02', 1),
(3404080802059644, 'SUJADI', 'BLM02', 1),
(3404080802059645, 'HADI SUTRISNO', 'BLM03', 1),
(3404080802059646, 'SUBAGYO', 'BLM03', 1),
(3404080802059647, 'SAHID', 'BLM03', 1),
(3404080802059648, 'CIPTO SUWARNO', 'BLM03', 1),
(3404080802059649, 'SUDARMO', 'BLM03', 1),
(3404080802059650, 'DUL JALIL', 'BL01', 2),
(3404080802059651, 'AMADI /AMAD BADRI', 'BL01', 2),
(3404080802059652, 'AGUS JOKO WIDODO', 'BL01', 2),
(3404080802059653, 'MUJIYEM', 'BL01', 2),
(3404080802059654, 'MARGONO', 'BL01', 2),
(3404080802059655, 'MARYANTO', 'BL01', 2),
(3404080802059656, 'HAWIN MUSTOFA.S.Pd.T', 'BL02', 2),
(3404080802059657, 'WAGIYO', 'BL02', 2),
(3404080802059658, 'TUKIYO HADI,Sag', 'BL02', 2),
(3404080802059659, 'SUKAMDI', 'BL02', 2),
(3404080802059660, 'SIYAMTO', 'BL02', 2),
(3404080802059661, 'MUSTAVIT NUR AZIS', 'BL03', 2),
(3404080802059662, 'SARJONO', 'BL03', 2),
(3404080802059663, 'SIGIT PRAMONO', 'BL03', 2),
(3404080802059664, 'AGUS SUKINO S.Sn', 'BL03', 2),
(3404080802059665, 'DRS.HENDRY HARYANTO', 'BL03', 2),
(3404080802059666, 'DWI SANTOSO', 'JLT01', 3),
(3404080802059667, 'NURYADI', 'JLT01', 3),
(3404080802059668, 'DANDUT MARYADI', 'JLT01', 3),
(3404080802059669, 'ARJO WIYONO/NGADIRAN', 'JLT01', 3),
(3404080802059670, 'TRI SANTOSO', 'JLT01', 3),
(3404080802059671, 'AGUNG NUGROHO', 'JLT02', 3),
(3404080802059672, 'SUBARJO', 'JLT02', 3),
(3404080802059673, 'NOTO MULYONO', 'JLT02', 3),
(3404080802059674, 'BOWO KARDIYONO', 'JLT02', 3),
(3404080802059675, 'JUBAEDI MR BIN MADRO`I', 'JLT02', 3),
(3404080802059676, 'JAMHARI', 'JLT03', 3),
(3404080802059677, 'SUMARJONO', 'JLT03', 3),
(3404080802059678, 'PARJINEM', 'JLT03', 3),
(3404080802059679, 'NGATINI', 'JLT03', 3),
(3404080802059680, 'JUMADIYANTO', 'JLT03', 3),
(3404080802059681, 'PAWIRO SUDARMO', 'JRG01', 4),
(3404080802059682, 'AMAT SUMADI', 'JRG01', 4),
(3404080802059683, 'AGUS HARYADI PANGGIH LESTARI', 'JRG01', 4),
(3404080802059684, 'BASUKI', 'JRG02', 4),
(3404080802059685, 'NGATIJO', 'JRG02', 4),
(3404080802059687, 'AGUS HARYADI TRIYONO WIDODO', 'JRG02', 4),
(3404080802059688, 'SLAMET RIYADI', 'JRG03', 4),
(3404080802059689, 'PURYANTO', 'JRG03', 4),
(3404080802059690, 'SISWO WIYARJO/T.WIDODO', 'JRG03', 4),
(3404080802059691, 'BEJO', 'KRG01', 5),
(3404080802059692, 'JAKA PRAPTONO', 'KRG01', 5),
(3404080802059693, 'TUKIJAN', 'KRG01', 5),
(3404080802059694, 'DRS.WARSITO AJI', 'KRG02', 5),
(3404080802059695, 'BUDI SUSANTO', 'KRG02', 5),
(3404080802059696, 'ADI PRAYITNO', 'KRG02', 5),
(3404080802059697, 'BAMBANG SUPRIYONO', 'KRG03', 5),
(3404080802059698, 'ARI INDRIYADI', 'KRG03', 5),
(3404080802059699, 'MUNDAKIR', 'KRG03', 5),
(3404080802059700, 'EKO PRASETYO', 'KRI01', 6),
(3404080802059701, 'JOKO WALUYO', 'KRI01', 6),
(3404080802059702, 'DAMAR WAHYU NUR WIDAYAT', 'KRI02', 6),
(3404080802059703, 'SAMSUDIN', 'KRI02', 6),
(3404080802059704, 'MUTHOHAR', 'KRI03', 6),
(3404080802059705, 'B.SUGENG', 'KRI03', 6),
(3404080802059706, 'SUPARMAN', 'KRII01', 7),
(3404080802059707, 'DANANG WAHYUDI', 'KRII01', 7),
(3404080802059708, 'ARJO SENTONO', 'KRII02', 7),
(3404080802059709, 'DRS,EDY WIBOWO', 'KRII02', 7),
(3404080802059710, 'TARTO SUKRISNO', 'KRII03', 7),
(3404080802059711, 'MARSUDI', 'KRII03', 7),
(3404080802059712, 'SUWANDI', 'KRS01', 8),
(3404080802059713, 'HARTO WIYONO', 'KRS01', 8),
(3404080802059714, 'NOTO SUDARMO /RUBIMAN', 'KRS01', 8),
(3404080802059715, 'WARDANI', 'KRS02', 8),
(3404080802059716, 'SLAMET WARSI', 'KRS02', 8),
(3404080802059717, 'KARDIYAH', 'KRS03', 8),
(3404080802059718, 'BUDIDOYO', 'KRS03', 8),
(3404080802059719, 'IRWAN WIDIANTORO', 'RJS01', 9),
(3404080802059720, 'KAMIJO', 'RJS01', 9),
(3404080802059721, 'DARMO WIYONO', 'RJS02', 9),
(3404080802059722, 'PONIRAN', 'RJS02', 9),
(3404080802059723, 'ARJO PRAYITNO', 'RJS03', 9),
(3404080802059724, 'PONIRAH', 'RJS03', 9),
(3404080802059725, 'SLAMET', 'MRB01', 10),
(3404080802059726, 'BEJO', 'MRB01', 10),
(3404080802059727, 'PARIYO', 'MRB02', 10),
(3404080802059728, 'SUGIMAN', 'MRB02', 10),
(3404080802059729, 'SURISNO', 'MRB03', 10),
(3404080802059730, 'SUGIYANTO', 'MRB03', 10),
(3404080802059731, 'WAGIAMN', 'MRB03', 10),
(233445555564655555, 'Sarjito', 'BLM03', 1);

-- --------------------------------------------------------

--
-- Table structure for table `penduduk`
--

CREATE TABLE `penduduk` (
  `nik` bigint(20) NOT NULL,
  `no_kk` bigint(16) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `jkel` set('Laki-laki','Perempuan','','') NOT NULL,
  `tgl_lahir` date NOT NULL,
  `agama` set('Islam','Kristen','Katolik','Hindu','Budha','') NOT NULL,
  `pendidikan` varchar(20) NOT NULL,
  `pekerjaan` varchar(20) NOT NULL,
  `status` set('Menikah','Belum Menikah','','') NOT NULL,
  `ket` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penduduk`
--

INSERT INTO `penduduk` (`nik`, `no_kk`, `nama`, `jkel`, `tgl_lahir`, `agama`, `pendidikan`, `pekerjaan`, `status`, `ket`) VALUES
(344080, 3404080802059715, 'INDRA MARTNUARI', 'Perempuan', '1999-01-26', 'Islam', 'SD', 'PELAJAR', 'Menikah', NULL),
(34408000, 3404080802059652, 'AGUS JOKO WIDODO', 'Perempuan', '1978-03-24', 'Islam', 'SLTA', 'Karyawan', 'Belum Menikah', 'Kepala'),
(788377746633, 3404080802059635, 'Diaan', 'Perempuan', '2000-04-05', 'Islam', 'SMA', 'Pelajar', 'Belum Menikah', NULL),
(987364726151, 3404080802059635, 'Ibrohim Elhaq', 'Laki-laki', '2000-06-13', 'Islam', 'SMA', 'Pelajar', 'Menikah', NULL),
(3440871124676, 3404080802059645, 'HADI SUTRISNO', 'Perempuan', '1943-03-09', 'Islam', 'SLTP', 'PENSIUNAN', 'Menikah', 'Kepala'),
(344080202090002, 3404080802059725, 'MARYADI', 'Laki-laki', '1967-05-10', 'Islam', 'SLTA', 'Buruh', 'Menikah', NULL),
(344080203810001, 3404080802059659, 'RAFA ZAHRAN AYALA ALI', 'Perempuan', '2006-11-29', 'Islam', '0', 'PELAJAR', 'Belum Menikah', NULL),
(344080211520001, 3404080802059657, 'MUTIARA CHARUNIA', 'Laki-laki', '1989-08-25', 'Islam', 'SLTA', 'Karyawan', 'Menikah', NULL),
(344080303920003, 3404080802059643, 'DIAN PALUPI', 'Laki-laki', '2003-12-15', 'Islam', '0', 'PELAJAR', 'Belum Menikah', NULL),
(344080308920003, 3404080802059646, 'SUBAGYO', 'Laki-laki', '1943-06-26', 'Islam', 'SLTP', 'Peternak', 'Belum Menikah', 'Kepala'),
(344080405820001, 3404080802059664, 'SEPTA DWI PURNAMO', 'Perempuan', '2005-09-14', 'Islam', '0', 'PELAJAR', 'Belum Menikah', NULL),
(344080407650001, 3404080802059653, 'MASPUAH', 'Perempuan', '1973-04-02', 'Islam', 'SLTA', 'Karyawan', 'Menikah', NULL),
(344080408730003, 3404080802059719, 'IRWAN WIDIANTORO', 'Perempuan', '1962-03-13', 'Islam', 'SLTA', 'Buruh', 'Belum Menikah', 'Kepala'),
(344080502020001, 3404080802059717, 'ISTI YUNARIAH.DRA.HJ.', 'Laki-laki', '1960-01-21', 'Islam', 'S 1', 'P N S', 'Belum Menikah', NULL),
(344080505050001, 3404080802059722, 'LATIFA RUNINGTYAS', 'Perempuan', '2000-04-07', 'Islam', 'SD', 'PELAJAR', 'Belum Menikah', NULL),
(344080505630005, 3404080802059652, 'KUMALA FAJAR', 'Laki-laki', '1979-11-01', 'Islam', 'S 1', 'Dokter hwn', 'Belum Menikah', NULL),
(344080506760005, 3404080802059722, 'PONIRAN', 'Perempuan', '1973-11-23', 'Islam', 'SLTA', 'Wiraswasta', 'Menikah', NULL),
(344080510560001, 3404080802059642, 'DAVINA PUTRI WIJAYA', 'Perempuan', '2003-05-09', 'Islam', '0', 'PELAJAR', 'Menikah', NULL),
(344080607860002, 3404080802059635, 'PARIMAN', 'Laki-laki', '1980-11-09', 'Islam', 'S 1', 'Karyawan', 'Belum Menikah', 'Kepala'),
(344080704600004, 3404080802059639, 'SRI SUWARNI', 'Laki-laki', '1957-11-18', 'Islam', 'SLTP', 'Karyawan', 'Belum Menikah', 'Kepala'),
(344080705910004, 3404080802059635, 'ALI MURTONO', 'Perempuan', '1979-07-09', 'Islam', 'S 1', 'Karyawan', 'Menikah', NULL),
(344080705910054, 3404080802059635, 'ALI MURTONO', 'Perempuan', '1979-07-09', 'Islam', 'S 1', 'Karyawan', 'Menikah', NULL),
(344080711750002, 3404080802059650, 'DUL JALIL', 'Perempuan', '1956-12-31', 'Islam', 'SD', 'Tani', 'Belum Menikah', 'Kepala'),
(344080711990001, 3404080802059656, 'MUKINAH', 'Perempuan', '1966-06-27', 'Islam', 'SLTA', '0', 'Menikah', NULL),
(344081002690003, 3404080802059636, 'ANA WALJINAH', 'Perempuan', '1973-10-26', 'Islam', 'SLTA', 'Wiraswasta', 'Menikah', NULL),
(344081102080001, 3404080802059636, 'APRILIA SETYAWAN', 'Laki-laki', '1992-08-04', 'Islam', 'SLTA', 'PELAJAR', 'Menikah', NULL),
(344081104750003, 3404080802059638, 'CHEKA KAILA HAMDAN', 'Laki-laki', '2007-08-18', 'Islam', '0', '0', 'Menikah', NULL),
(344081111050003, 3404080802059660, 'RATNA ARIANI SURYAWATI', 'Laki-laki', '1969-03-15', 'Islam', 'S 1', '0', 'Belum Menikah', NULL),
(344081207630002, 3404080802059729, 'SURISNO', 'Laki-laki', '1968-10-01', 'Islam', 'SLTA', '0', 'Menikah', 'Kepala'),
(344081302980001, 3404080802059727, 'PARIYO', 'Perempuan', '1953-03-13', 'Islam', 'SD', 'Buruh', 'Belum Menikah', 'Kepala'),
(344081304710003, 3404080802059649, 'ISTANING HARTATI', 'Laki-laki', '1975-09-03', 'Islam', 'S 1', 'Karyawan', 'Belum Menikah', NULL),
(344081305640003, 3404080802059634, 'SULISTYO', 'Laki-laki', '1957-05-09', 'Islam', 'S 1', 'Karyawan', 'Menikah', 'Kepala'),
(344081308560001, 3404080802059711, 'GRITA SUPRIYATI', 'Laki-laki', '1994-12-02', 'Islam', 'SLTA', 'PELAJAR', 'Menikah', NULL),
(344081408850003, 3404080802059707, 'DANANG WAHYUDI', 'Perempuan', '1975-07-25', 'Islam', 'SLTA', 'Karyawan', 'Menikah', 'Kepala'),
(344081409080001, 3404080802059728, 'MUSIRAN', 'Perempuan', '1965-01-07', 'Islam', 'SLTP', 'Karyawan', 'Belum Menikah', NULL),
(344081502600001, 3404080802059654, 'MELIO VENAGY ARWANNU. R.A.', 'Perempuan', '2000-05-01', 'Islam', 'SD', 'PELAJAR', 'Belum Menikah', NULL),
(344081507680002, 3404080802059722, 'LUTHFI FAIRUZZAMAN', 'Perempuan', '1992-09-10', 'Islam', 'SLTA', 'Karyawan', 'Menikah', NULL),
(344081601820002, 3404080802059651, 'AMADI /AMAD BADRI', 'Perempuan', '1931-12-31', 'Islam', '0', 'Karyawan', 'Menikah', NULL),
(344081603050001, 3404080802059651, 'KEMI WARYATI', 'Laki-laki', '1973-08-27', 'Islam', 'SLTA', 'Wiraswasta', 'Menikah', NULL),
(344081605680001, 3404080802059640, 'DALIYEM', 'Laki-laki', '1943-03-09', 'Islam', 'SLTP', 'PENSIUNAN', 'Menikah', 'Kepala'),
(344081607850002, 3404080802059655, 'MARYANTO', 'Laki-laki', '1978-03-24', 'Islam', 'SLTA', 'Karyawan', 'Belum Menikah', 'Kepala'),
(344081607880002, 3404080802059710, 'FX.MURTI WAHYUDI', 'Perempuan', '1978-06-03', 'Islam', 'SLTA', 'Karyawan', 'Menikah', NULL),
(344081706020001, 3404080802059661, 'ROSIDAH', 'Perempuan', '1950-10-31', 'Islam', 'SD', 'Wiraswasta', 'Menikah', NULL),
(344081708780006, 3404080802059650, 'JAMIARIYANTI', 'Perempuan', '1985-01-21', 'Islam', 'SLTA', 'Wiraswasta', 'Menikah', NULL),
(344081709750002, 3404080802059661, 'MUSTAVIT NUR AZIS', 'Perempuan', '1973-10-13', 'Islam', 'SLTA', 'Wiraswasta', 'Belum Menikah', 'Kepala'),
(344081906820001, 3404080802059646, 'FUZI KHOLIDAH', 'Laki-laki', '1994-08-05', 'Islam', 'SLTA', 'PELAJAR', 'Belum Menikah', NULL),
(344082101950001, 3404080802059648, 'CIPTO SUWARNO', 'Laki-laki', '1970-07-12', 'Islam', 'SLTA', 'Karyawan', 'Belum Menikah', 'Kepala'),
(344082202680004, 3404080802059647, 'HALILINTAR SUKMA CAHYA JAGAD', 'Laki-laki', '2003-02-16', 'Islam', '0', 'PELAJAR', 'Menikah', NULL),
(344082304690003, 3404080802059724, 'MARDIYONO', 'Perempuan', '1963-09-17', 'Islam', 'SLTA', '5', 'Menikah', NULL),
(344082304920001, 3404080802059717, 'KARDIYAH', 'Laki-laki', '1966-12-31', 'Islam', 'SLTP', 'Wiraswasta', 'Menikah', 'Kepala'),
(344082305620001, 3404080802059716, 'ISTI YUNARIAH.DRA.HJ.', 'Laki-laki', '1960-01-21', 'Islam', 'S 1', 'P N S', 'Belum Menikah', NULL),
(344082305730001, 3404080802059727, 'MULYANI', 'Perempuan', '1972-05-07', 'Islam', 'SLTP', '0', 'Menikah', NULL),
(344082406080001, 3404080802059637, 'ARUM SA\'IDAH', 'Laki-laki', '1997-05-13', 'Islam', 'SLTP', 'PELAJAR', 'Belum Menikah', NULL),
(344082504780001, 3404080802059707, 'FEBRYAN MUKTI', 'Laki-laki', '2006-02-11', 'Islam', '0', 'PELAJAR', 'Menikah', NULL),
(344082507630003, 3404080802059709, 'FITRIANA NUR YUDIAWATI', 'Laki-laki', '2002-07-12', 'Islam', '0', 'PELAJAR', 'Menikah', NULL),
(344082509040001, 3404080802059724, 'M.YULI WIYASTUTI', 'Laki-laki', '1975-07-25', 'Islam', 'SLTA', 'Karyawan', 'Menikah', NULL),
(344082511680003, 3404080802059635, 'ALLEA PHOAN ADHITYA', 'Laki-laki', '2007-12-31', 'Islam', '0', '0', 'Menikah', NULL),
(344082602070002, 3404080802059730, 'NGATINEM', 'Laki-laki', '1966-12-31', 'Islam', 'SLTP', 'Wiraswasta', 'Menikah', NULL),
(344082610720001, 3404080802059726, 'MINGLAN BAGUS PURWOKO', 'Perempuan', '1994-10-05', 'Islam', 'SLTA', 'Karyawan', 'Menikah', NULL),
(344082712730003, 3404080802059655, 'MIFTA RIZQI HIDAYATI', 'Perempuan', '2003-02-07', 'Islam', '0', 'PELAJAR', 'Menikah', NULL),
(344082804920002, 3404080802059653, 'MUJIYEM', 'Perempuan', '1930-12-31', 'Islam', '0', '0', 'Menikah', 'Kepala'),
(344082807650001, 3404080802059720, 'KAMINEM', 'Laki-laki', '1925-12-31', 'Islam', '0', '0', 'Menikah', NULL),
(344082904090001, 3404080802059730, 'NUR RAHMAWATI', 'Laki-laki', '2001-09-10', 'Islam', '0', 'PELAJAR', 'Menikah', NULL),
(344082910890002, 3404080802059714, 'HASNA UL\'AZIZAH', 'Perempuan', '1986-07-27', 'Islam', 'SLTA', '0', 'Menikah', NULL),
(344082912990002, 3404080802059648, 'INTANG LINDU AJI', 'Laki-laki', '1997-02-27', 'Islam', 'SLTP', 'PELAJAR', 'Belum Menikah', NULL),
(344083012680005, 3404080802059712, 'HANIYAH', 'Perempuan', '1944-01-01', 'Islam', 'SLTA', 'PENSIUNAN', 'Menikah', NULL),
(344083103940001, 3404080802059637, 'ARKAN HAUZAN ALI', 'Laki-laki', '2005-08-17', 'Islam', '0', 'PELAJAR', 'Menikah', NULL),
(344083103950003, 3404080802059658, 'OKTAFIANO HESTANTA', 'Perempuan', '2009-10-23', 'Islam', '0', '0', 'Menikah', NULL),
(344083112360069, 3404080802059638, 'SUGIYADI', 'Perempuan', '1984-07-29', 'Islam', 'SLTP', 'Karyawan', 'Belum Menikah', 'Kepala'),
(344083112410043, 3404080802059731, 'WAGIYO', 'Perempuan', '1991-05-15', 'Islam', 'SLTA', 'Karyawan', 'Belum Menikah', 'Kepala'),
(344083112420082, 3404080802059725, 'MARYATI', 'Perempuan', '1945-08-24', 'Islam', 'SLTA', 'PENSIUNAN', 'Menikah', NULL),
(344083112460018, 3404080802059649, 'SUDARMO', 'Perempuan', '1965-05-07', 'Islam', 'SLTP', 'Karyawan', 'Menikah', 'Kepala'),
(344083112510028, 3404080802059657, 'WAGIYO', 'Laki-laki', '1985-09-11', 'Islam', 'SLTA', 'POLRI', 'Belum Menikah', 'Kepala'),
(344083112520060, 3404080802059708, 'FATIMAH AZZAHRA', 'Perempuan', '2004-06-04', 'Islam', '0', 'PELAJAR', 'Belum Menikah', NULL),
(344083112590055, 3404080802059645, 'FAREIL HIWAYASSA', 'Laki-laki', '2008-03-28', 'Islam', '0', '0', 'Belum Menikah', NULL),
(344083112690025, 3404080802059714, 'NOTO SUDARMO /RUBIMAN', 'Perempuan', '1965-01-07', 'Islam', 'SLTP', 'Karyawan', 'Belum Menikah', 'Kepala'),
(344084105630001, 3404080802059643, 'PURWANTO', 'Laki-laki', '1966-08-17', 'Islam', 'SLTA', 'Wiraswasta', 'Menikah', 'Kepala'),
(344084106950005, 3404080802059713, 'HARISWAN SAPUTRO', 'Perempuan', '1991-04-22', 'Islam', 'S 1', 'Karyawan', 'Belum Menikah', NULL),
(344084301940003, 3404080802059712, 'SUWANDI', 'Perempuan', '1968-05-18', 'Islam', 'S 1', 'Wiraswasta', 'Menikah', 'Kepala'),
(344084301980002, 3404080802059641, 'DAVIN AL ADHA', 'Perempuan', '2000-03-15', 'Islam', 'SD', 'PELAJAR', 'Belum Menikah', NULL),
(344084307640001, 3404080802059662, 'RUBIYEM', 'Perempuan', '1940-12-31', 'Islam', '0', 'Buruh', 'Belum Menikah', NULL),
(344084311720001, 3404080802059647, 'HIRYUU DAGNA ORLIN', 'Laki-laki', '2007-01-25', 'Islam', '0', '0', 'Menikah', NULL),
(344084401010001, 3404080802059634, 'AJI ONDRO WINATA', 'Laki-laki', '1975-10-11', 'Islam', 'SLTA', 'Wiraswasta', 'Menikah', NULL),
(344084404770005, 3404080802059709, 'FIDAYANI KARIMAWATI', 'Laki-laki', '1983-06-18', 'Islam', 'S 1', '0', 'Menikah', NULL),
(344084405720002, 3404080802059634, 'ADITYA WIRA SYAFIRA', 'Laki-laki', '2006-12-11', 'Islam', 'S 1', 'Karyawan', 'Belum Menikah', NULL),
(344084410930002, 3404080802059640, 'CITRA DEWI ANISA PUTRI', 'Laki-laki', '1992-01-03', 'Islam', 'SLTA', 'Karyawan', 'Menikah', NULL),
(344084412340002, 3404080802059638, 'BIMA YOGA PURNAWAN', 'Laki-laki', '1991-11-22', 'Islam', 'SLTA', 'Karyawan', 'Menikah', NULL),
(344084505700003, 3404080802059663, 'SIGIT PRAMONO', 'Perempuan', '1963-03-06', 'Islam', 'SLTP', 'tukang', 'Menikah', 'Kepala'),
(344084511590003, 3404080802059662, 'RUBIDO', 'Perempuan', '1958-12-31', 'Islam', 'SD', 'Karyawan', 'Belum Menikah', NULL),
(344084604000001, 3404080802059730, 'SUGIYANTO', 'Laki-laki', '1986-07-27', 'Islam', 'SLTA', 'Karyawan', 'Menikah', 'Kepala'),
(344084706770004, 3404080802059641, 'BASIRAN', 'Laki-laki', '1956-03-09', 'Islam', 'SLTA', 'Guru', 'Belum Menikah', NULL),
(344084709060003, 3404080802059648, 'IQBAL NURROCHMAN.B', 'Perempuan', '2001-10-27', 'Islam', '0', 'PELAJAR', 'Menikah', NULL),
(344084710740003, 3404080802059726, 'MOF RAUF', 'Perempuan', '1960-02-07', 'Islam', 'S 1', 'Buruh', 'Menikah', NULL),
(344084803010003, 3404080802059712, 'HAJJAS AROSMAN', 'Perempuan', '2001-12-23', 'Islam', '0', 'PELAJAR', 'Belum Menikah', NULL),
(344084806710001, 3404080802059711, 'HAIDARUL HAFIDZ NASRULLAH', 'Perempuan', '2000-05-22', 'Islam', 'SD', 'PELAJAR', 'Belum Menikah', NULL),
(344084905650001, 3404080802059720, 'KEISYA ANINDITHA PUTRI CHAYAN', 'Laki-laki', '2004-09-23', 'Islam', '0', 'PELAJAR', 'Menikah', NULL),
(344084908110002, 3404080802059662, 'SARJONO', 'Laki-laki', '1929-04-07', 'Islam', 'SD', 'PENSIUNAN', 'Belum Menikah', 'Kepala'),
(344084911640002, 3404080802059716, 'IVAN TARUNA MAHARDIKA.L.', 'Perempuan', '2000-11-08', 'Islam', 'SD', 'PELAJAR', 'Menikah', NULL),
(344085005680004, 3404080802059654, 'MELISA TIA WIJAYANTI', 'Laki-laki', '1986-04-13', 'Islam', 'SLTA', 'Karyawan', 'Menikah', NULL),
(344085006760002, 3404080802059724, 'PONIRAH', 'Perempuan', '1970-01-05', 'Islam', 'SLTA', '0', 'Menikah', 'Kepala'),
(344085010010002, 3404080802059643, 'EKA AYU PRAMUDITA', 'Perempuan', '1996-03-09', 'Islam', 'SLTP', 'PELAJAR', 'Belum Menikah', NULL),
(344085012530001, 3404080802059647, 'GALEN FINNEGAN', 'Laki-laki', '1994-02-13', 'Islam', 'SLTA', 'Karyawan', 'Belum Menikah', NULL),
(344085109710001, 3404080802059654, 'MARGONO', 'Perempuan', '1970-04-11', 'Islam', 'SLTP', 'Buruh', 'Belum Menikah', 'Kepala'),
(344085109800003, 3404080802059725, 'SLAMET', 'Perempuan', '1959-12-31', 'Islam', 'SD', 'Buruh', 'Belum Menikah', 'Kepala'),
(344085202990001, 3404080802059728, 'MURTIASIH', 'Perempuan', '1967-06-02', 'Islam', 'SLTA', 'Tani', 'Menikah', NULL),
(344085204840001, 3404080802059647, 'SAHID', 'Laki-laki', '1972-09-02', 'Islam', 'SLTA', 'Wiraswasta', 'Belum Menikah', 'Kepala'),
(344085205690002, 3404080802059639, 'CINDHI PERMATASARI', 'Laki-laki', '1999-06-24', 'Islam', 'SD', 'PELAJAR', 'Belum Menikah', NULL),
(344085212660005, 3404080802059652, 'LASIYEM', 'Perempuan', '1956-02-09', 'Islam', 'SLTA', '0', 'Belum Menikah', NULL),
(344085302840002, 3404080802059715, 'ISMURJATIE', 'Perempuan', '1970-05-27', 'Islam', 'S 1', 'Karyawan', 'Menikah', NULL),
(344085303080001, 3404080802059722, 'LESTIANA NINDYA PUTRI', 'Perempuan', '1993-03-10', 'Islam', 'SLTA', 'PELAJAR', 'Belum Menikah', NULL),
(344085402740001, 3404080802059729, 'NGADIMIN', 'Perempuan', '1967-12-31', 'Islam', 'SLTP', 'Wiraswasta', 'Menikah', NULL),
(344085507640005, 3404080802059645, 'FARHAN LESTA HERNANDA', 'Laki-laki', '1998-02-14', 'Islam', 'SD', 'PELAJAR', 'Belum Menikah', NULL),
(344085605960001, 3404080802059715, 'WARDANI', 'Perempuan', '1967-12-31', 'Islam', 'SLTP', 'Wiraswasta', 'Menikah', 'Kepala'),
(344085607930001, 3404080802059634, 'ADITYA WIRAWAN', 'Laki-laki', '1980-11-09', 'Islam', 'SLTA', 'Karyawan', 'Menikah', NULL),
(344085707960001, 3404080802059643, 'DWI ROHMAT BASUKI', 'Perempuan', '1988-04-29', 'Islam', 'SLTA', 'Karyawan', 'Belum Menikah', NULL),
(344085708720005, 3404080802059719, 'JUMIRAH', 'Laki-laki', '1963-08-17', 'Islam', 'SLTA', '6', 'Menikah', NULL),
(344085711980004, 3404080802059646, 'FAUZAN RIDHO PRAKOSO', 'Perempuan', '2001-11-11', 'Islam', '0', 'PELAJAR', 'Belum Menikah', NULL),
(344085712040003, 3404080802059642, 'SUGIYONO', 'Perempuan', '1982-06-03', 'Islam', 'SLTA', 'Karyawan', 'Belum Menikah', 'Kepala'),
(344085712980001, 3404080802059721, 'LANJAR KIWASIYADI', 'Laki-laki', '1974-09-04', 'Islam', 'SLTP', 'Buruh', 'Menikah', NULL),
(344085802030001, 3404080802059713, 'HARYANA', 'Laki-laki', '1961-05-09', 'Islam', 'SLTA', 'POLRI', 'Menikah', NULL),
(344085805990003, 3404080802059636, 'ANGGIT DIKA SAPUTRI', 'Perempuan', '1993-08-17', 'Islam', 'SLTA', 'Karyawan', 'Menikah', NULL),
(344085807730001, 3404080802059728, 'SUGIMAN', 'Perempuan', '1991-03-02', 'Islam', 'SLTA', 'Karyawan', 'Belum Menikah', 'Kepala'),
(344085810900001, 3404080802059711, 'MARSUDI', 'Laki-laki', '1960-02-07', 'Islam', 'S 1', 'Buruh', 'Menikah', 'Kepala'),
(344085905000002, 3404080802059720, 'KAMIJO', 'Perempuan', '1958-12-31', 'Islam', 'SD', 'Buruh', 'Menikah', 'Kepala'),
(344085907040002, 3404080802059660, 'SIYAMTO', 'Laki-laki', '1940-12-31', 'Islam', '0', 'Buruh', 'Belum Menikah', 'Kepala'),
(344085908080002, 3404080802059716, 'SLAMET WARSI', 'Perempuan', '1939-12-03', 'Islam', 'SD', 'PENSIUNAN', 'Belum Menikah', 'Kepala'),
(344086002950001, 3404080802059656, 'MUHAMMAD FATHONI', 'Perempuan', '1995-11-11', 'Islam', 'SLTA', 'PELAJAR', 'Belum Menikah', NULL),
(344086006830005, 3404080802059722, 'LASIMAN', 'Perempuan', '1949-01-07', 'Islam', 'SD', 'Wiraswasta', 'Belum Menikah', 'Kepala'),
(344086108060003, 3404080802059727, 'MUHAMMAD MUTHOHAR', 'Laki-laki', '1968-05-18', 'Islam', 'S 1', 'Wiraswasta', 'Menikah', NULL),
(344086302600002, 3404080802059710, 'TARTO SUKRISNO', 'Perempuan', '1945-08-24', 'Islam', 'SLTA', 'PENSIUNAN', 'Menikah', 'Kepala'),
(344086305050002, 3404080802059721, 'LANJARWATI', 'Laki-laki', '1981-01-02', 'Islam', 'SLTP', 'Buruh', 'Menikah', NULL),
(344086306700001, 3404080802059636, 'AMIN WIDODO', 'Perempuan', '1975-10-11', 'Islam', 'SLTA', 'Karyawan', 'Belum Menikah', 'Kepala'),
(344086307050001, 3404080802059665, 'DRS.HENDRY HARYANTO', 'Laki-laki', '1958-02-25', 'Islam', 'S 1', 'Wiraswasta', 'Belum Menikah', 'Kepala'),
(344086307070001, 3404080802059658, 'PAIKEM', 'Perempuan', '1950-12-13', 'Islam', 'SD', 'Tani', 'Belum Menikah', NULL),
(344086310220001, 3404080802059659, 'SUKAMDI', 'Laki-laki', '1958-12-31', 'Islam', 'SD', 'Karyawan', 'Belum Menikah', 'Kepala'),
(344086407970001, 3404080802059729, 'NGADINI', 'Perempuan', '1939-12-03', 'Islam', 'SD', 'PENSIUNAN', 'Belum Menikah', NULL),
(344086409750001, 3404080802059661, 'RIZKY CAMELIA ILHAM', 'Perempuan', '1999-12-22', 'Islam', 'SD', 'PELAJAR', 'Belum Menikah', NULL),
(344086411850001, 3404080802059664, 'SIGIT HARY SETYAWAN', 'Laki-laki', '1982-11-30', 'Islam', 'SLTA', 'Karyawan', 'Belum Menikah', NULL),
(344086504700002, 3404080802059713, 'HARTO WIYONO', 'Perempuan', '1972-05-07', 'Islam', 'SLTP', '0', 'Belum Menikah', 'Kepala'),
(344086505660003, 3404080802059644, 'ELRA FIRSTA PRIANDIA HAKIM', 'Perempuan', '1995-03-25', 'Islam', 'SLTA', 'PELAJAR', 'Belum Menikah', NULL),
(344086505780007, 3404080802059644, 'ETIK SUPRIHATIN', 'Laki-laki', '1975-04-06', 'Islam', 'S 1', 'Karyawan', 'Belum Menikah', NULL),
(344086511740004, 3404080802059659, 'RAIHAN AULA ZAKI', 'Laki-laki', '2006-10-16', 'Islam', '0', 'PELAJAR', 'Menikah', NULL),
(344086606730002, 3404080802059637, 'RUSTAMADI', 'Laki-laki', '1979-07-09', 'Islam', 'S 1', 'Karyawan', 'Menikah', 'Kepala'),
(344086704050001, 3404080802059708, 'FARID YUSISTIYO WURANGGIAN', 'Perempuan', '2005-04-05', 'Islam', '0', 'PELAJAR', 'Belum Menikah', NULL),
(344086806820002, 3404080802059708, 'ARJO SENTONO', 'Laki-laki', '1963-09-17', 'Islam', 'SLTA', '5', 'Menikah', 'Kepala'),
(344086806920002, 3404080802059640, 'ADI SUWARNO', 'Laki-laki', '1966-08-17', 'Islam', 'SLTA', 'Wiraswasta', 'Menikah', 'Kepala'),
(344086912820002, 3404080802059651, 'KARTIKA DWI HAPSARI', 'Perempuan', '2004-06-12', 'Islam', '0', 'PELAJAR', 'Menikah', NULL),
(344087004750002, 3404080802059656, 'HAWIN MUSTOFA.S.Pd.T', 'Laki-laki', '1979-06-03', 'Islam', 'S 1', 'Karyawan', 'Menikah', 'Kepala'),
(344087008900002, 3404080802059655, 'MIA LISNA ANDRIYANI', 'Perempuan', '1996-05-26', 'Islam', 'SLTP', 'PELAJAR', 'Belum Menikah', NULL),
(344087103940001, 3404080802059721, 'DARMO WIYONO', 'Perempuan', '1965-01-07', 'Islam', 'SLTP', 'Wiraswasta', 'Menikah', 'Kepala'),
(344087112280090, 3404080802059653, 'MAQFIRO IZANIA PUTRI FAISZAL', 'Laki-laki', '1999-05-10', 'Islam', 'SD', 'PELAJAR', 'Belum Menikah', NULL),
(344087112400057, 3404080802059650, 'JUMIRAN', 'Perempuan', '1969-08-04', 'Islam', 'SLTP', 'Karyawan', 'Belum Menikah', NULL),
(344087112430128, 3404080802059731, 'PRATAMITA PURBOSARI', 'Perempuan', '1991-03-02', 'Islam', 'SLTA', 'Karyawan', 'Belum Menikah', NULL),
(344087112460029, 3404080802059644, 'SUJADI', 'Laki-laki', '1953-09-08', 'Islam', 'S 1', 'PENSIUNAN', 'Belum Menikah', 'Kepala'),
(344087112460078, 3404080802059726, 'BEJO', 'Perempuan', '1957-12-12', 'Islam', 'SLTP', '0', 'Menikah', 'Kepala'),
(344087112520054, 3404080802059649, 'ISNA DEWI RAHAYU', 'Perempuan', '1985-01-24', 'Islam', 'SLTA', 'Wiraswasta', 'Menikah', NULL),
(344087112560094, 3404080802059709, 'DRS,EDY WIBOWO', 'Laki-laki', '1967-05-10', 'Islam', 'SLTA', 'Buruh', 'Belum Menikah', 'Kepala'),
(344087112620052, 3404080802059652, 'KORI IMAMI', 'Laki-laki', '1989-11-04', 'Islam', 'S 1', 'PELAJAR', 'Menikah', NULL),
(344087112690040, 3404080802059714, 'HASNA SIFAAH', 'Perempuan', '1988-05-30', 'Islam', 'S 1', 'Guru', 'Menikah', NULL),
(344087511222044, 3404080802059715, 'IMA LISTIYONINGSIH', 'Perempuan', '1987-03-25', 'Islam', 'SLTA', 'Karyawan', 'Menikah', NULL),
(344090110000003, 3404080802059718, 'JOHAN NASRULLAH', 'Perempuan', '1969-02-22', 'Islam', 'SLTA', 'Wiraswasta', 'Belum Menikah', NULL),
(344092904020001, 3404080802059718, 'JUMINI', 'Laki-laki', '1963-12-31', 'Islam', 'SLTP', 'Buruh', 'Menikah', NULL),
(344092911760001, 3404080802059717, 'IVAN TARUNA MAHARDIKA.L.', 'Laki-laki', '2000-11-08', 'Islam', 'SD', 'PELAJAR', 'Belum Menikah', 'Kepala'),
(344094909740004, 3404080802059718, 'BUDIDOYO', 'Laki-laki', '1963-12-31', 'Islam', 'SLTP', 'Buruh', 'Belum Menikah', NULL),
(354084908110002, 3404080802059662, 'SARJONO', 'Laki-laki', '1929-04-07', 'Islam', 'SD', 'PENSIUNAN', 'Belum Menikah', 'Kepala'),
(354085109710001, 3404080802059658, 'TUKIYO HADI,Sag', 'Laki-laki', '1972-07-21', 'Islam', 'SLTA', 'Buruh', 'Belum Menikah', 'Kepala'),
(364084511590003, 3404080802059662, 'RUBIDO', 'Perempuan', '1958-12-31', 'Islam', 'SD', 'Karyawan', 'Belum Menikah', NULL),
(364087112560094, 3404080802059706, 'SUPARMAN', 'Perempuan', '1949-01-07', 'Islam', 'SD', 'Wiraswasta', 'Belum Menikah', 'Kepala'),
(384084908110002, 3404080802059662, 'SARJONO', 'Laki-laki', '1929-04-07', 'Islam', 'SD', 'PENSIUNAN', 'Belum Menikah', 'Kepala'),
(2345677654322456, 3404080802059681, 'Sari', 'Perempuan', '2000-06-11', 'Katolik', 'SMP', 'Pelajar', 'Belum Menikah', NULL),
(3401096306920001, 3404080802059634, 'Seno', 'Laki-laki', '1990-06-06', 'Kristen', 'SMA', 'Karyawan', 'Menikah', NULL),
(3456789345643780, 3404080802059666, 'MULYANTO', 'Laki-laki', '2020-06-23', 'Hindu', 'SMA', 'Karyawan', 'Menikah', NULL),
(4567837638927382, 3404080802059701, 'AMANDA RAWLES', 'Perempuan', '1999-03-12', 'Katolik', 'S 2', 'WIRAUSAHA', 'Belum Menikah', NULL),
(9873647261888851, 3404080802059650, 'TESTING', 'Laki-laki', '1990-08-07', 'Budha', 'SMA', 'Pelajar', 'Menikah', NULL),
(9876545678986666, 3404080802059635, 'COBA', 'Perempuan', '2000-11-11', 'Budha', 'SMP', 'WIRAUSAHA', 'Belum Menikah', NULL),
(9876545678987654, 3404080802059684, 'Chacha Marica', 'Perempuan', '1997-02-04', 'Katolik', 'SMA', 'Karyawan', 'Menikah', NULL),
(54788854377700088, 3404080802059669, 'ARUM LESTARI', 'Perempuan', '1993-02-08', 'Katolik', 'S 1', 'Ibu Rumah Tangga', 'Belum Menikah', NULL),
(54788854377700099, 3404080802059693, 'BISMILLAH', 'Laki-laki', '2000-02-22', 'Katolik', 'SMA', 'Pelajar', 'Belum Menikah', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `apartur_desa`
--
ALTER TABLE `apartur_desa`
  ADD PRIMARY KEY (`id_apartur`);

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_admin` (`id_admin`),
  ADD KEY `id_admin_2` (`id_admin`),
  ADD KEY `id_admin_3` (`id_admin`);

--
-- Indexes for table `data_rt`
--
ALTER TABLE `data_rt`
  ADD PRIMARY KEY (`id_rt`),
  ADD KEY `id_dusun` (`id_dusun`);

--
-- Indexes for table `dusun`
--
ALTER TABLE `dusun`
  ADD PRIMARY KEY (`id_dusun`);

--
-- Indexes for table `kepala_keluarga`
--
ALTER TABLE `kepala_keluarga`
  ADD PRIMARY KEY (`no_kk`),
  ADD KEY `kepala_keluarga_ibfk_2` (`id_dusun`),
  ADD KEY `id_rt` (`id_rt`);

--
-- Indexes for table `penduduk`
--
ALTER TABLE `penduduk`
  ADD PRIMARY KEY (`nik`),
  ADD KEY `penduduk_ibfk_1` (`no_kk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `apartur_desa`
--
ALTER TABLE `apartur_desa`
  MODIFY `id_apartur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `dusun`
--
ALTER TABLE `dusun`
  MODIFY `id_dusun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `berita`
--
ALTER TABLE `berita`
  ADD CONSTRAINT `berita_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`);

--
-- Constraints for table `data_rt`
--
ALTER TABLE `data_rt`
  ADD CONSTRAINT `data_rt_ibfk_1` FOREIGN KEY (`id_dusun`) REFERENCES `dusun` (`id_dusun`);

--
-- Constraints for table `kepala_keluarga`
--
ALTER TABLE `kepala_keluarga`
  ADD CONSTRAINT `kepala_keluarga_ibfk_2` FOREIGN KEY (`id_dusun`) REFERENCES `dusun` (`id_dusun`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kepala_keluarga_ibfk_3` FOREIGN KEY (`id_rt`) REFERENCES `data_rt` (`id_rt`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `penduduk`
--
ALTER TABLE `penduduk`
  ADD CONSTRAINT `penduduk_ibfk_1` FOREIGN KEY (`no_kk`) REFERENCES `kepala_keluarga` (`no_kk`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
