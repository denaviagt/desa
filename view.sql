-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 30, 2020 at 01:29 AM
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
-- Stand-in structure for view `administratif_view`
-- (See below for the actual view)
--
CREATE TABLE `administratif_view` (
`id_dusun` int(11)
,`nama_dsn` varchar(20)
,`kepala_dkh` varchar(100)
,`jumlah_kk` bigint(21)
,`total_penduduk` decimal(42,0)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `dusun_blmnikah`
-- (See below for the actual view)
--
CREATE TABLE `dusun_blmnikah` (
`id_dusun` int(11)
,`belum_menikah` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `dusun_menikah`
-- (See below for the actual view)
--
CREATE TABLE `dusun_menikah` (
`id_dusun` int(11)
,`menikah` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `jumlah_budha`
-- (See below for the actual view)
--
CREATE TABLE `jumlah_budha` (
`id_dusun` int(11)
,`jum_pend` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `jumlah_hindu`
-- (See below for the actual view)
--
CREATE TABLE `jumlah_hindu` (
`id_dusun` int(11)
,`jum_pend` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `jumlah_islam`
-- (See below for the actual view)
--
CREATE TABLE `jumlah_islam` (
`id_dusun` int(11)
,`jum_pend` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `jumlah_katholik`
-- (See below for the actual view)
--
CREATE TABLE `jumlah_katholik` (
`id_dusun` int(11)
,`jum_pend` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `jumlah_kristen`
-- (See below for the actual view)
--
CREATE TABLE `jumlah_kristen` (
`id_dusun` int(11)
,`jum_pend` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `jumlah_laki`
-- (See below for the actual view)
--
CREATE TABLE `jumlah_laki` (
`id_dusun` int(11)
,`jum_laki` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `jumlah_penduduk`
-- (See below for the actual view)
--
CREATE TABLE `jumlah_penduduk` (
`id_rt` varchar(11)
,`no_rt` varchar(10)
,`id_dusun` int(11)
,`nama_dsn` varchar(20)
,`kepala_dkh` varchar(100)
,`no_kk` bigint(16)
,`jumlah_penduduk` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `jumlah_perempuan`
-- (See below for the actual view)
--
CREATE TABLE `jumlah_perempuan` (
`id_dusun` int(11)
,`jum_perempuan` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `rt_view`
-- (See below for the actual view)
--
CREATE TABLE `rt_view` (
`no_rt` varchar(10)
,`nama_dsn` varchar(20)
,`jumlah_kk` bigint(21)
,`total_penduduk` decimal(42,0)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `total_warga`
-- (See below for the actual view)
--
CREATE TABLE `total_warga` (
`id_rt` varchar(11)
,`id_dusun` int(11)
,`jumlah_kk` bigint(21)
,`total_penduduk` decimal(42,0)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `warga`
-- (See below for the actual view)
--
CREATE TABLE `warga` (
`id_rt` varchar(11)
,`id_dusun` int(11)
,`no_kk` bigint(16)
,`jumlah_penduduk` bigint(21)
);

-- --------------------------------------------------------

--
-- Structure for view `administratif_view`
--
DROP TABLE IF EXISTS `administratif_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `administratif_view`  AS  select `jumlah_penduduk`.`id_dusun` AS `id_dusun`,`jumlah_penduduk`.`nama_dsn` AS `nama_dsn`,`jumlah_penduduk`.`kepala_dkh` AS `kepala_dkh`,count(`jumlah_penduduk`.`no_kk`) AS `jumlah_kk`,sum(`jumlah_penduduk`.`jumlah_penduduk`) AS `total_penduduk` from `jumlah_penduduk` group by `jumlah_penduduk`.`id_dusun` ;

-- --------------------------------------------------------

--
-- Structure for view `dusun_blmnikah`
--
DROP TABLE IF EXISTS `dusun_blmnikah`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `dusun_blmnikah`  AS  select `dusun`.`id_dusun` AS `id_dusun`,count(`penduduk`.`nik`) AS `belum_menikah` from ((`penduduk` join `kepala_keluarga` on(`kepala_keluarga`.`no_kk` = `penduduk`.`no_kk`)) join `dusun` on(`dusun`.`id_dusun` = `kepala_keluarga`.`id_dusun`)) where `penduduk`.`status` = 'belum menikah' group by `dusun`.`id_dusun` ;

-- --------------------------------------------------------

--
-- Structure for view `dusun_menikah`
--
DROP TABLE IF EXISTS `dusun_menikah`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `dusun_menikah`  AS  select `dusun`.`id_dusun` AS `id_dusun`,count(`penduduk`.`nik`) AS `menikah` from ((`penduduk` join `kepala_keluarga` on(`kepala_keluarga`.`no_kk` = `penduduk`.`no_kk`)) join `dusun` on(`dusun`.`id_dusun` = `kepala_keluarga`.`id_dusun`)) where `penduduk`.`status` = 'menikah' group by `dusun`.`id_dusun` ;

-- --------------------------------------------------------

--
-- Structure for view `jumlah_budha`
--
DROP TABLE IF EXISTS `jumlah_budha`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `jumlah_budha`  AS  select `kk`.`id_dusun` AS `id_dusun`,count(`p`.`nik`) AS `jum_pend` from (`penduduk` `p` join `kepala_keluarga` `kk` on(`p`.`no_kk` = `kk`.`no_kk`)) where `p`.`agama` = 'budha' group by `kk`.`id_dusun` ;

-- --------------------------------------------------------

--
-- Structure for view `jumlah_hindu`
--
DROP TABLE IF EXISTS `jumlah_hindu`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `jumlah_hindu`  AS  select `kk`.`id_dusun` AS `id_dusun`,count(`p`.`nik`) AS `jum_pend` from (`penduduk` `p` join `kepala_keluarga` `kk` on(`p`.`no_kk` = `kk`.`no_kk`)) where `p`.`agama` = 'hindu' group by `kk`.`id_dusun` ;

-- --------------------------------------------------------

--
-- Structure for view `jumlah_islam`
--
DROP TABLE IF EXISTS `jumlah_islam`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `jumlah_islam`  AS  select `kk`.`id_dusun` AS `id_dusun`,count(`p`.`nik`) AS `jum_pend` from (`penduduk` `p` join `kepala_keluarga` `kk` on(`p`.`no_kk` = `kk`.`no_kk`)) where `p`.`agama` = 'islam' group by `kk`.`id_dusun` ;

-- --------------------------------------------------------

--
-- Structure for view `jumlah_katholik`
--
DROP TABLE IF EXISTS `jumlah_katholik`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `jumlah_katholik`  AS  select `kk`.`id_dusun` AS `id_dusun`,count(`p`.`nik`) AS `jum_pend` from (`penduduk` `p` join `kepala_keluarga` `kk` on(`p`.`no_kk` = `kk`.`no_kk`)) where `p`.`agama` = 'katholik' group by `kk`.`id_dusun` ;

-- --------------------------------------------------------

--
-- Structure for view `jumlah_kristen`
--
DROP TABLE IF EXISTS `jumlah_kristen`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `jumlah_kristen`  AS  select `kk`.`id_dusun` AS `id_dusun`,count(`p`.`nik`) AS `jum_pend` from (`penduduk` `p` join `kepala_keluarga` `kk` on(`p`.`no_kk` = `kk`.`no_kk`)) where `p`.`agama` = 'kristen' group by `kk`.`id_dusun` ;

-- --------------------------------------------------------

--
-- Structure for view `jumlah_laki`
--
DROP TABLE IF EXISTS `jumlah_laki`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `jumlah_laki`  AS  (select `kk`.`id_dusun` AS `id_dusun`,count(`p`.`nik`) AS `jum_laki` from (`penduduk` `p` join `kepala_keluarga` `kk` on(`p`.`no_kk` = `kk`.`no_kk`)) where `p`.`jkel` = 'laki-laki' group by `kk`.`id_dusun`) ;

-- --------------------------------------------------------

--
-- Structure for view `jumlah_penduduk`
--
DROP TABLE IF EXISTS `jumlah_penduduk`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `jumlah_penduduk`  AS  select `kk`.`id_rt` AS `id_rt`,`rt`.`no_rt` AS `no_rt`,`kk`.`id_dusun` AS `id_dusun`,`d`.`nama_dsn` AS `nama_dsn`,`d`.`kepala_dkh` AS `kepala_dkh`,`kk`.`no_kk` AS `no_kk`,count(`p`.`nik`) AS `jumlah_penduduk` from (((`kepala_keluarga` `kk` join `penduduk` `p` on(`kk`.`no_kk` = `p`.`no_kk`)) join `dusun` `d` on(`kk`.`id_dusun` = `d`.`id_dusun`)) join `data_rt` `rt` on(`kk`.`id_rt` = `rt`.`id_rt`)) group by `kk`.`no_kk` order by `kk`.`no_kk` ;

-- --------------------------------------------------------

--
-- Structure for view `jumlah_perempuan`
--
DROP TABLE IF EXISTS `jumlah_perempuan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `jumlah_perempuan`  AS  (select `kk`.`id_dusun` AS `id_dusun`,count(`p`.`nik`) AS `jum_perempuan` from (`penduduk` `p` join `kepala_keluarga` `kk` on(`p`.`no_kk` = `kk`.`no_kk`)) where `p`.`jkel` = 'perempuan' group by `kk`.`id_dusun`) ;

-- --------------------------------------------------------

--
-- Structure for view `rt_view`
--
DROP TABLE IF EXISTS `rt_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `rt_view`  AS  select `jumlah_penduduk`.`no_rt` AS `no_rt`,`jumlah_penduduk`.`nama_dsn` AS `nama_dsn`,count(`jumlah_penduduk`.`no_kk`) AS `jumlah_kk`,sum(`jumlah_penduduk`.`jumlah_penduduk`) AS `total_penduduk` from `jumlah_penduduk` group by `jumlah_penduduk`.`id_rt`,`jumlah_penduduk`.`id_dusun` ;

-- --------------------------------------------------------

--
-- Structure for view `total_warga`
--
DROP TABLE IF EXISTS `total_warga`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `total_warga`  AS  select `warga`.`id_rt` AS `id_rt`,`warga`.`id_dusun` AS `id_dusun`,count(`warga`.`no_kk`) AS `jumlah_kk`,sum(`warga`.`jumlah_penduduk`) AS `total_penduduk` from `warga` group by `warga`.`id_rt`,`warga`.`id_dusun` ;

-- --------------------------------------------------------

--
-- Structure for view `warga`
--
DROP TABLE IF EXISTS `warga`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `warga`  AS  select `kk`.`id_rt` AS `id_rt`,`kk`.`id_dusun` AS `id_dusun`,`kk`.`no_kk` AS `no_kk`,count(`p`.`nik`) AS `jumlah_penduduk` from (`kepala_keluarga` `kk` join `penduduk` `p` on(`kk`.`no_kk` = `p`.`no_kk`)) group by `kk`.`no_kk` order by `kk`.`no_kk` ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
