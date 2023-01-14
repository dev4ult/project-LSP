-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2023 at 07:06 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lsp_dbs`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` char(64) NOT NULL,
  `id_biodata_admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`, `id_biodata_admin`) VALUES
(1, 'admin', 'admin@example.com', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 1);

-- --------------------------------------------------------

--
-- Table structure for table `asesi`
--

CREATE TABLE `asesi` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` char(64) NOT NULL,
  `id_biodata_asesi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `asesi`
--

INSERT INTO `asesi` (`id`, `username`, `email`, `password`, `id_biodata_asesi`) VALUES
(1, 'gerry', 'gerry@example.com', '7a2a08c407e2a1fe812a5c6379142778f896ac2f8342377b77fdf64933c3b547', 1),
(2, 'einar96', 'napoleon.lebsack@example.com', '9466bbb87b10af0d01c1f051f378c67d13d855d2', 2),
(3, 'alexandrine63', 'janis86@example.net', '066c17d4ee61c1e0ffc8358593a084d5d37c68be', 3),
(4, 'patrick56', 'gabrielle22@example.com', '8e96847285667aab93870d80f38ed1f2ec8e2015', 4),
(5, 'cedrick42', 'dooley.mellie@example.net', 'ab988499fee81e009742ddf8d35e578198a2ee9f', 5),
(6, 'cierra.balistreri', 'marley.luettgen@example.org', '1eff3dd3b91fa136d31774c2fcdbdf8f5b75bb49', 6),
(7, 'lilly.cronin', 'jarvis02@example.net', '723f547a33641c9c0453dd5bb7f55a067f2802ed', 7),
(8, 'mia45', 'letitia07@example.org', '8cd84bed226bf8ce40dff2c53289c67041e96421', 8),
(9, 'dryan', 'hermiston.loyce@example.net', '2b463a86b7d13430f144a5398d637069ceb4baba', 9),
(10, 'woodrow34', 'bfay@example.net', '7a4772c52e037223f579eb894b92d7a449e298d3', 10),
(11, 'ignacio.gutkowski', 'melyna.feest@example.org', 'bd6a2cb49d3eadaa6bb7ad03d5e6a2a014f70185', 11),
(12, 'boyer.domenic', 'jaquan.powlowski@example.com', '701da1079c2ae8b0b22d0618ce1aebcb42bd8ebd', 12),
(13, 'waldo.jacobi', 'price.neal@example.org', '1d3240f94a0dca7e65f1ab02e009d5ce95f46e0f', 13),
(14, 'itorp', 'maximus.spinka@example.net', '69482b24904d2e823486c8258fe5de49a866f13c', 14),
(15, 'erdman.noah', 'erica94@example.org', '3d1f1147ae4faf9bf9e6db2a54d6adc51ba1c5f8', 15),
(16, 'rreynolds', 'peyton.hammes@example.org', 'ee9e4acc90e0290d7b86a06620cec140927c4729', 16),
(17, 'george.haag', 'shemar25@example.com', '224e7ee8b819307da8fbd1269db06f73b9d4bf01', 17),
(18, 'adelbert21', 'mohamed51@example.org', '77a033529a187e2cdfcf9462beaaba073dbcb575', 18),
(19, 'leonel.beatty', 'andre.breitenberg@example.com', '7111808a805db2cf81d0237d36f3ce89f8d93802', 19),
(20, 'sarbin', 'sarbin@example.com', '7a2a08c407e2a1fe812a5c6379142778f896ac2f8342377b77fdf64933c3b547', 20);

-- --------------------------------------------------------

--
-- Table structure for table `asesor`
--

CREATE TABLE `asesor` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` char(64) NOT NULL,
  `id_biodata_asesor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `asesor`
--

INSERT INTO `asesor` (`id`, `username`, `email`, `password`, `id_biodata_asesor`) VALUES
(1, 'isom.cormier', 'lockman.marianna@example.com', 'a94623e64a751ea0c1229de5094f1b6543735c8c', 1),
(2, 'umueller', 'emie.kub@example.org', 'f460f6429701eacaf6d105e8ea68b0cddaba7a7b', 2),
(3, 'zprosacco', 'davon.treutel@example.org', 'f070097447255e2ff6beabf9628189a41e0fd1cd', 3),
(5, 'afay', 'schinner.eloy@example.net', 'fe475d8bbdb84dd1b5a27adbe1aa0d0e0aa3c2eb', 5),
(6, 'kari87', 'jessie28@example.org', 'b8abcb5b906cf66d2551c2d174982eae228a587b', 6),
(7, 'bsipes', 'frieda50@example.org', '2cfbf8ef17c959a85ef63290c2355ffe9a59f186', 7),
(8, 'beer.marian', 'clifford81@example.com', 'e30c0a01539ad1b8f7bee4c98a93a673e878557e', 8),
(9, 'orlando.parker', 'kuhn.mateo@example.org', 'cde359586097e42ae05992ac804b8b86874a5906', 9),
(10, 'ecruickshank', 'ggrady@example.net', 'bb9267a129ea301b1c4a5ad0a75596d6184ff99d', 10),
(11, 'floyd.marquardt', 'kassulke.zack@example.com', 'e231cb3d6456d25c2439b04bc5d712fab3b21128', 11),
(12, 'ahoppe', 'ewest@example.net', 'b27cc33f5f604050e1b4c6389d96d824076dbb2e', 12),
(13, 'nsipes', 'barrows.rosalee@example.org', '961abd7dde61c6e5402c565a8527f041e3024bef', 13),
(14, 'qmraz', 'noble.schamberger@example.net', '63292044b1454e9130449af35696e734129e2504', 14),
(15, 'akuhlman', 'yasmine02@example.org', '189a63cef13a903488bdafb3cec6d380e0a9ab84', 15),
(16, 'mfeest', 'ola55@example.com', '8cb3ea51663f3100f560af2e4e4092e3e8c53438', 16),
(17, 'blangosh', 'elwyn.predovic@example.com', 'a1086a14fcbd9c151a5b836804c7a0ca1e9ff14b', 17),
(18, 'fjacobs', 'davonte95@example.net', 'edbafcb56c13b6c6e34932bfd6e7d65d59ccac06', 18),
(19, 'dbergnaum', 'hackett.michael@example.com', 'e212842e3ef77e804c0bb40de6a09ac308b3f55e', 19),
(20, 'johnston.franz', 'christopher.rowe@example.org', '92448723b0f63c467e829728e613d60936894a3c', 20),
(21, 'fares', 'fares@example.com', 'e9fdc00e7a228ea3948d4d1f144bc9671d41e613a94e6aca0d9497d43d7472b7', 4);

-- --------------------------------------------------------

--
-- Table structure for table `biodata_admin`
--

CREATE TABLE `biodata_admin` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `nip` varchar(18) NOT NULL,
  `no_telepon` varchar(20) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `pendidikan_terakhir` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `biodata_admin`
--

INSERT INTO `biodata_admin` (`id`, `nama`, `jenis_kelamin`, `nip`, `no_telepon`, `nik`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `pendidikan_terakhir`) VALUES
(1, 'Mavis Hamill', 'Laki-laki', '129501301934942604', '1-261-839-8956x139', '3654844365082681', 'Suite 508', '2000-05-13', '176 Marty Hills Suite 119\nLake Celia, OR 45264', ' d4');

-- --------------------------------------------------------

--
-- Table structure for table `biodata_asesi`
--

CREATE TABLE `biodata_asesi` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `nim` int(11) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `prodi` varchar(50) NOT NULL,
  `no_telepon` varchar(20) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `pendidikan_terakhir` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `biodata_asesi`
--

INSERT INTO `biodata_asesi` (`id`, `nama`, `jenis_kelamin`, `nim`, `jurusan`, `prodi`, `no_telepon`, `alamat`, `pendidikan_terakhir`) VALUES
(1, 'Shayne Hand', 'Laki-laki', 2107416464, '', '', '(591)904-4978x144', '875 Bethany Orchard Apt. 011\nNorth Brenna, SD 04176-8700', ' S1'),
(2, 'Prof. Jillian Zemlak Jr.', 'Perempuan', 2107437939, '', '', '1-685-043-1788x7619', '8368 Roberts Locks Suite 175\nChristiansenhaven, CT 55878-2316', ' S1'),
(3, 'Elouise Anderson', 'Laki-laki', 2107450588, '', '', '+31(7)6113464749', '4838 Wiegand Lakes\nGradytown, MI 19734', 'SMA'),
(4, 'Dr. Jarvis Turner', 'Perempuan', 2107445951, '', '', '06641192310', '56238 Rosa Mall Suite 647\nLake Lennyville, OR 00134-1562', 'SMA'),
(5, 'Jenifer Trantow MD', 'Laki-laki', 2107414268, '', '', '02606606887', '26335 Rice Station\nEast Edythe, OK 33899-6649', ' D1'),
(6, 'Earnestine Okuneva IV', 'Laki-laki', 2107436484, '', '', '670.130.7560', '403 Watsica Green Suite 634\nEast Evelyn, TX 43875-7796', ' SMK'),
(7, 'Jackeline Effertz', 'Perempuan', 2107423766, '', '', '(474)608-0425x91225', '467 Emard Lane Apt. 697\nJarvisshire, DC 52388', ' D2'),
(8, 'Bonnie Little', 'Laki-laki', 2107447982, '', '', '577.036.4748x1493', '8314 August Walks Apt. 180\nSouth Arvelport, WY 19495', ' D4'),
(9, 'Lavada Lowe I', 'Laki-laki', 2107420041, '', '', '431.981.2921', '3922 Jana Place\nDayanahaven, DC 50173', ' D2'),
(10, 'Daren Huels', 'Laki-laki', 2107443008, '', '', '1-900-227-4554x158', '380 Silas Pass\nWest Wymantown, CO 49824', ' D2'),
(11, 'Telly Kuphal', 'Perempuan', 2107429710, '', '', '(493)068-3487', '570 Wyman Flats\nGreenfeldershire, HI 55399-2066', ' S2'),
(12, 'Sandrine Kulas', 'Laki-laki', 2107433910, '', '', '1-157-372-5832x11267', '75028 Celestine Extensions\nLake Vergie, SC 12394-8479', ' S2'),
(13, 'Prof. Ashtyn Hansen Jr.', 'Perempuan', 2107418008, '', '', '336.227.1483', '31516 Eldora Gateway Suite 273\nEast Rileytown, SC 94266', ' S2'),
(14, 'Easter King', 'Perempuan', 2107446008, '', '', '1-526-990-8791x8956', '468 Hermiston Manor\nNorth Valentinahaven, DE 89790', ' D1'),
(15, 'Marlee Huel', 'Perempuan', 2107425121, '', '', '354.222.3996x7272', '84466 Dina Locks\nWilfordland, NV 29505', ' D2'),
(16, 'Simone Effertz', 'Perempuan', 2107437036, '', '', '(107)190-2158x8214', '4842 Isabella Streets\nPort Terrill, AZ 75022', ' S1'),
(17, 'Abigail Fisher', 'Laki-laki', 2107418555, '', '', '134-163-0266', '353 Feeney Divide\nHintzton, MI 34558-4174', ' D2'),
(18, 'Miss Grace Kemmer', 'Laki-laki', 2107438145, '', '', '1-030-798-6601x4353', '2211 Kautzer Plain\nDorothyport, SD 96740', ' S1'),
(19, 'Amely Auer', 'Perempuan', 2107432113, '', '', '02135658539', '67531 Marjolaine Cliff\nPort Garland, IA 84965', 'SMA'),
(20, 'Dr. Gilberto Metz DDS', 'Laki-laki', 2107428311, '', '', '1-734-344-1110', '42904 Rowena Ridges Apt. 712\nFlatleyville, AR 10651', ' S2');

-- --------------------------------------------------------

--
-- Table structure for table `biodata_asesor`
--

CREATE TABLE `biodata_asesor` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `nip` varchar(18) NOT NULL,
  `no_telepon` varchar(20) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `pendidikan_terakhir` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `biodata_asesor`
--

INSERT INTO `biodata_asesor` (`id`, `nama`, `jenis_kelamin`, `nip`, `no_telepon`, `nik`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `pendidikan_terakhir`) VALUES
(1, 'Mavis Hamill', 'Laki-laki', '129501301934942604', '1-261-839-8956x139', '3654844365082681', 'Suite 508', '2000-05-13', '176 Marty Hills Suite 119\nLake Celia, OR 45264', ' d4'),
(2, 'Mabel Ryan', 'Laki-laki', '100185575848445296', '+05(8)1055907048', '3963091949466616', 'Apt. 873', '1981-07-21', '3781 Lorenzo Extensions\nOkunevaside, TN 32903', ' sma'),
(3, 'Brooks Hirthe', 'Laki-laki', '170522559434175488', '161-358-2112x5929', '3895342235919088', 'Apt. 545', '1983-05-30', '297 O\'Keefe Prairie\nAllietown, MN 06960-7594', ' smp'),
(4, 'Gilbert Maggio', 'Laki-laki', '193346344493329520', '04901603586', '3970906001282856', 'Apt. 811', '1974-11-22', '2940 Becker Trafficway Apt. 683\nSouth Alexandro, MN 13544-9552', ' smp'),
(5, 'Gilbert Deckow', 'Laki-laki', '168456686381250616', '(793)956-2527', '3669538227608427', 'Suite 680', '1970-12-26', '7595 Brook Rapid Suite 687\nSouth Alfreda, AR 87322', ' d4'),
(6, 'Scotty Bruen', 'Laki-laki', '198316235886886720', '1-873-605-3673', '3902034688508138', 'Suite 759', '1976-07-31', '554 Emard Crossroad Suite 128\nPort Sigmund, AL 00725-0344', ' d3'),
(7, 'Florine Gislason', 'Laki-laki', '105541795352473855', '(918)330-2684x25702', '3782835075166077', 'Suite 201', '1977-12-31', '848 Wuckert Forks\nQuitzonfort, WI 00745', ' d4'),
(8, 'Prof. Neal Lesch', 'Laki-laki', '131430605100467800', '+98(7)1826441814', '3713609973900020', 'Suite 228', '1978-06-21', '106 Tyson Trail Apt. 751\nSouth Araceliberg, OH 21540', ' s2'),
(9, 'Freeda Stanton III', 'Laki-laki', '135466175386682152', '(928)548-2221x0015', '3547564543085172', 'Suite 994', '2013-08-21', '15281 Maximus Land\nSouth Stanford, MI 81761', ' s1'),
(10, 'Winifred Hilpert', 'Laki-laki', '108273440087214112', '1-399-883-1114x262', '3669099253835156', 'Suite 923', '1981-03-15', '412 Lockman Fords Suite 571\nMurrayview, FL 38150-4662', 'sd'),
(11, 'Harold Walter', 'Laki-laki', '166802866663783792', '1-201-662-4991', '3727931997971609', 'Suite 697', '1982-01-07', '65369 Willms Ville Suite 832\nNorth Harry, CA 69107-4479', ' d4'),
(12, 'Eugene Kutch', 'Laki-laki', '140643592504784464', '1-574-027-7112x847', '3535704107256606', 'Apt. 087', '1995-06-29', '689 Sanford Falls Apt. 957\nPreciousland, MS 95750', ' s1'),
(13, 'Orville Smith', 'Laki-laki', '186581065645441408', '649-740-4314', '3851184366736561', 'Suite 450', '2018-05-10', '4842 Van Ferry Suite 607\nNew Tyriquetown, NE 83210-4026', ' s2'),
(14, 'Joe Wyman DVM', 'Laki-laki', '154634852660819888', '061-188-4901x41410', '3953267939621583', 'Suite 011', '1995-06-18', '07680 Shanahan Hollow Suite 969\nSouth Samirview, MT 07087', ' smp'),
(15, 'Enos Windler', 'Laki-laki', '165150455432012680', '07274959290', '3568057440686971', 'Apt. 330', '2007-02-25', '1278 Orn Place Suite 887\nStrackeshire, CT 12871-9091', 'sd'),
(16, 'Nels Koch', 'Laki-laki', '195857730461284512', '09900502640', '3936503416625783', 'Suite 874', '1992-05-29', '356 Koss Ports\nRaleighland, CA 58491', ' s3'),
(17, 'Caroline Greenholt', 'Laki-laki', '141221022140234712', '440-000-9007x85342', '3633834657957777', 'Apt. 993', '2018-03-05', '78611 Cyrus Plain\nNorth Isadoreborough, RI 28766', ' s2'),
(18, 'Prof. Brisa Robel', 'Laki-laki', '160946208005771040', '519-756-7814x8292', '3612121232086792', 'Apt. 021', '1975-12-25', '48484 Collins Track Apt. 545\nSwaniawskichester, PA 74172', ' s3'),
(19, 'Mr. Derek McCullough', 'Laki-laki', '159418515535071496', '1-486-675-4964x8679', '3657770285615697', 'Apt. 312', '2002-11-14', '3298 Unique Run\nSouth Eliseo, MD 99013-3814', ' s2'),
(20, 'Mrs. Krystina Abernathy', 'Laki-laki', '141073595779016616', '513.340.4821x40839', '3854092663852498', 'Suite 842', '1984-08-24', '89682 Purdy Lane Apt. 928\nPort Francesberg, WV 93135', ' s1'),
(51, 'fares', 'Laki-laki', '2107411020', '12345678', '23113121', 'Indonesia', '2023-01-04', 'jalan', 'SMA');

-- --------------------------------------------------------

--
-- Table structure for table `daftar_asesi_sertifikasi`
--

CREATE TABLE `daftar_asesi_sertifikasi` (
  `id` int(11) NOT NULL,
  `status_kelulusan` enum('Lulus','Belum Lulus') NOT NULL DEFAULT 'Belum Lulus',
  `status_asesmen` enum('Sudah','Belum') NOT NULL,
  `id_biodata_asesi` int(11) NOT NULL,
  `id_skema_sertifikasi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `daftar_asesi_sertifikasi`
--

INSERT INTO `daftar_asesi_sertifikasi` (`id`, `status_kelulusan`, `status_asesmen`, `id_biodata_asesi`, `id_skema_sertifikasi`) VALUES
(1, 'Lulus', 'Sudah', 1, 22),
(2, 'Belum Lulus', 'Sudah', 2, 24),
(3, 'Lulus', 'Sudah', 3, 22),
(4, 'Belum Lulus', 'Sudah', 4, 22),
(5, 'Lulus', 'Sudah', 5, 24),
(6, 'Belum Lulus', 'Sudah', 6, 25),
(7, 'Belum Lulus', 'Belum', 7, 21),
(8, 'Belum Lulus', 'Sudah', 8, 28),
(9, 'Belum Lulus', 'Belum', 9, 29),
(10, 'Belum Lulus', 'Sudah', 10, 30),
(11, 'Belum Lulus', 'Belum', 11, 32),
(12, 'Belum Lulus', 'Belum', 12, 33),
(13, 'Belum Lulus', 'Sudah', 13, 34),
(14, 'Belum Lulus', 'Belum', 14, 35),
(15, 'Belum Lulus', 'Sudah', 15, 36),
(20, 'Belum Lulus', 'Sudah', 20, 21),
(22, 'Lulus', 'Sudah', 20, 25);

-- --------------------------------------------------------

--
-- Table structure for table `dokumen_asesmen`
--

CREATE TABLE `dokumen_asesmen` (
  `id` int(11) NOT NULL,
  `id_unit_kompetensi` int(11) NOT NULL,
  `id_biodata_asesi` int(11) NOT NULL,
  `file_asesmen` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dokumen_asesmen`
--

INSERT INTO `dokumen_asesmen` (`id`, `id_unit_kompetensi`, `id_biodata_asesi`, `file_asesmen`) VALUES
(1, 38, 1, 'Dokumen_Perpusnas_38.pdf'),
(2, 33, 1, 'Dokumen_Perpusnas_33.pdf'),
(3, 33, 3, 'Dokumen_Perpusnas.pdf'),
(4, 38, 4, 'Dokumen_Perpusnas_38.pdf'),
(5, 33, 4, 'Dokumen_Perpusnas_33.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `dokumen_persyaratan`
--

CREATE TABLE `dokumen_persyaratan` (
  `id` int(11) NOT NULL,
  `id_biodata_asesi` int(11) NOT NULL,
  `id_persyaratan` int(11) NOT NULL,
  `file_dokumen` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dokumen_persyaratan`
--

INSERT INTO `dokumen_persyaratan` (`id`, `id_biodata_asesi`, `id_persyaratan`, `file_dokumen`) VALUES
(9, 51, 5, '2112000170311239.pdf'),
(10, 51, 1, 'Gerry Satria Halim.jpg'),
(11, 51, 2, 'download.jpg'),
(12, 51, 4, '923 SK LULUS SELEKSI SBMPTN 2021.pdf'),
(13, 51, 3, 'SKL.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `jenjang_studi`
--

CREATE TABLE `jenjang_studi` (
  `id` int(11) NOT NULL,
  `jenjang_studi` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenjang_studi`
--

INSERT INTO `jenjang_studi` (`id`, `jenjang_studi`) VALUES
(1, 'D-1'),
(2, 'D-2'),
(3, 'D-3'),
(4, 'D-4'),
(5, 'S-2');

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`id`, `nama`) VALUES
(1, 'Teknik Informatika dan Komputer'),
(2, 'Teknik Sipil'),
(3, 'Teknik Mesin'),
(4, 'Teknik Elektro'),
(5, 'Teknik Grafika dan Penerbitan'),
(6, 'Akuntansi'),
(7, 'Administrasi Niaga');

-- --------------------------------------------------------

--
-- Table structure for table `list_persyaratan`
--

CREATE TABLE `list_persyaratan` (
  `id` int(11) NOT NULL,
  `kategori` enum('Umum','Teknis') NOT NULL,
  `deskripsi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `list_persyaratan`
--

INSERT INTO `list_persyaratan` (`id`, `kategori`, `deskripsi`) VALUES
(1, 'Umum', 'Memiliki KTP'),
(4, 'Umum', 'Minimal pendidikan SMA/SMK'),
(8, 'Teknis', 'Mempunyai Komputer');

-- --------------------------------------------------------

--
-- Table structure for table `penilaian_asesmen`
--

CREATE TABLE `penilaian_asesmen` (
  `id` int(11) NOT NULL,
  `id_kompetensi` int(11) NOT NULL,
  `id_biodata_asesi` int(11) NOT NULL,
  `nilai` enum('A','B','C','D') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penilaian_asesmen`
--

INSERT INTO `penilaian_asesmen` (`id`, `id_kompetensi`, `id_biodata_asesi`, `nilai`) VALUES
(23, 39, 1, 'B'),
(24, 38, 1, 'D'),
(25, 33, 1, 'A'),
(26, 39, 3, 'A'),
(27, 38, 3, 'A'),
(28, 33, 3, 'B'),
(29, 39, 4, 'D'),
(30, 38, 4, 'D'),
(31, 33, 4, 'D'),
(34, 4, 5, 'A'),
(35, 23, 5, 'C'),
(36, 4, 2, 'B'),
(37, 23, 2, 'B');

-- --------------------------------------------------------

--
-- Table structure for table `persyaratan_skema`
--

CREATE TABLE `persyaratan_skema` (
  `id` int(11) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `id_skema` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `persyaratan_skema`
--

INSERT INTO `persyaratan_skema` (`id`, `deskripsi`, `id_skema`) VALUES
(6, 'Memiliki KTP', 24),
(24, 'Mempunyai Komputer', 24),
(26, 'Minimal pendidikan SMA/SMK', 32),
(27, 'Memiliki KTP', 32),
(36, 'Minimal pendidikan SMA/SMK', 22),
(37, 'Mempunyai Komputer', 22),
(40, 'Memiliki KTP', 22),
(42, 'Mempunyai Komputer', 21),
(44, 'Minimal pendidikan SMA/SMK', 23),
(45, 'Mempunyai Komputer', 23),
(49, 'Memiliki KTP', 21),
(50, 'Minimal pendidikan SMA/SMK', 21),
(51, 'Memiliki KTP', 48),
(52, 'Minimal pendidikan SMA/SMK', 48);

-- --------------------------------------------------------

--
-- Table structure for table `prodi`
--

CREATE TABLE `prodi` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `id_jurusan` int(11) NOT NULL,
  `id_jenjang_studi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prodi`
--

INSERT INTO `prodi` (`id`, `nama`, `id_jurusan`, `id_jenjang_studi`) VALUES
(1, 'Teknik Informatika', 1, 4),
(2, 'Teknik Multimedia dan Digital', 1, 4),
(3, 'Teknik Multimedia dan Jaringan', 1, 4),
(4, 'Teknik Komputer dan Jaringan', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `skema_sertifikasi`
--

CREATE TABLE `skema_sertifikasi` (
  `id` int(11) NOT NULL,
  `nama_skema` varchar(255) NOT NULL,
  `skkni` varchar(255) NOT NULL,
  `status` enum('Aktif','Nonaktif') NOT NULL,
  `level` varchar(20) DEFAULT NULL,
  `id_biodata_asesor` int(11) DEFAULT NULL,
  `id_jurusan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `skema_sertifikasi`
--

INSERT INTO `skema_sertifikasi` (`id`, `nama_skema`, `skkni`, `status`, `level`, `id_biodata_asesor`, `id_jurusan`) VALUES
(21, 'Laravel Developer', 'SKKNI Peralatan Elektronika', 'Aktif', 'Level II', 10, 1),
(22, 'Database Administrator', 'SKKNI Teknis Ototronik', 'Nonaktif', 'Level I', 4, 3),
(23, 'Network Engineer', 'SKKNI Industri Modifikasi Kendaraan Bermotor', 'Nonaktif', 'Level V', 3, 3),
(24, 'Laravel Developer', 'SKKNI Perakitan Telepon Seluler', 'Nonaktif', 'Level III', 4, 4),
(25, 'Flutter Developer', 'SKKNI Industri Cat', 'Aktif', 'Level IV', 5, 5),
(26, 'Cloud Developer', 'SKKNI Perakitan Telepon Seluler', 'Nonaktif', 'Level V', 6, 6),
(27, 'Cloud Developer', 'SKKNI Perakitan Telepon Seluler', 'Nonaktif', 'Level IV', 7, 7),
(28, 'Database Administrator', 'SKKNI Perakitan Telepon Seluler', 'Aktif', 'Level V', 8, 1),
(29, 'Database Administrator', 'SKKNI Industri Cat', 'Nonaktif', 'Level IV', 9, 2),
(30, 'Laravel Developer', 'SKKNI Perakitan Telepon Seluler', 'Aktif', 'Level I', 10, 3),
(32, 'Flutter Developer', 'SKKNI Perakitan Telepon Seluler', 'Aktif', 'Level I', 12, 5),
(33, 'Cloud Developer', 'SKKNI Peralatan Elektronika', 'Aktif', 'Level II', 13, 6),
(34, 'Web Developer', 'SKKNI Perakitan Telepon Seluler', 'Aktif', 'Level I', 14, 7),
(35, 'Network Engineer', 'SKKNI Industri Cat', 'Aktif', 'Level III', 15, 1),
(36, 'Database Administrator', 'SKKNI Perakitan Telepon Seluler', 'Aktif', 'Level III', 16, 2),
(39, 'Network Engineer', 'SKKNI Industri Modifikasi Kendaraan Bermotor', 'Aktif', 'Level II', 19, 5),
(40, 'Laravel Developer', 'SKKNI Perakitan Telepon Seluler', 'Aktif', 'Level V', 20, 6),
(41, 'Machine Learning Developer', 'SKKNI Teknis Ototronik', 'Nonaktif', 'Level I', 12, 4),
(46, 'Machine Learning Developer', 'SKKNI Industri Cat', 'Aktif', 'Level V', 4, 7),
(48, 'AI Developer', 'SKKNI Industri Cat', 'Aktif', 'Level II', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `skkni`
--

CREATE TABLE `skkni` (
  `id` int(11) NOT NULL,
  `skkni` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `skkni`
--

INSERT INTO `skkni` (`id`, `skkni`) VALUES
(1, 'SKKNI Industri Modifikasi Kendaraan Bermotor'),
(2, 'SKKNI Perakitan Telepon Seluler'),
(3, 'SKKNI Peralatan Elektronika'),
(4, 'SKKNI Industri Cat'),
(5, 'SKKNI Teknis Ototronik');

-- --------------------------------------------------------

--
-- Table structure for table `unit_kompetensi`
--

CREATE TABLE `unit_kompetensi` (
  `id` int(11) NOT NULL,
  `nama_kompetensi` varchar(100) NOT NULL,
  `tgl_ujian_kompetensi` date NOT NULL,
  `jenis_pelaksanaan` enum('Offline','Online') NOT NULL,
  `tempat_unit_kompetensi` varchar(255) NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_akhir` time NOT NULL,
  `file_opsional` varchar(255) DEFAULT NULL,
  `id_skema` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `unit_kompetensi`
--

INSERT INTO `unit_kompetensi` (`id`, `nama_kompetensi`, `tgl_ujian_kompetensi`, `jenis_pelaksanaan`, `tempat_unit_kompetensi`, `jam_mulai`, `jam_akhir`, `file_opsional`, `id_skema`) VALUES
(3, 'Kompetensi 6', '2011-04-27', 'Online', 'id', '23:41:42', '07:20:26', NULL, 23),
(4, 'Kompetensi 1', '1994-03-02', 'Offline', 'id', '23:17:59', '22:28:40', NULL, 24),
(5, 'Kompetensi 6', '1983-12-15', 'Online', 'corrupti', '22:30:10', '19:46:37', NULL, 25),
(6, 'Kompetensi 1', '2017-06-12', 'Online', 'occaecati', '22:30:57', '19:36:13', NULL, 26),
(7, 'Kompetensi 4', '1999-02-22', 'Online', 'enim', '12:12:12', '22:46:27', NULL, 27),
(8, 'Kompetensi 2', '1983-01-10', 'Offline', 'quasi', '05:06:37', '09:55:55', NULL, 28),
(9, 'Kompetensi 6', '1974-02-22', 'Online', 'voluptate', '02:37:56', '16:48:01', NULL, 29),
(10, 'Kompetensi 2', '1975-10-25', 'Offline', 'est', '05:43:29', '23:18:59', NULL, 30),
(11, 'Kompetensi 1', '1987-12-15', 'Offline', 'et', '09:30:58', '12:32:08', NULL, 32),
(12, 'Kompetensi 5', '1990-02-07', 'Offline', 'temporibus', '02:50:13', '13:31:45', NULL, 33),
(13, 'Kompetensi 1', '2003-10-07', 'Offline', 'et', '02:42:16', '11:41:35', NULL, 34),
(14, 'Kompetensi 6', '2021-05-28', 'Online', 'molestiae', '19:49:51', '08:51:27', NULL, 35),
(15, 'Kompetensi 1', '2001-10-22', 'Online', 'sed', '21:59:35', '09:49:38', NULL, 36),
(16, 'Kompetensi 5', '1982-10-16', 'Online', 'nemo', '18:21:50', '20:41:17', NULL, 39),
(17, 'Kompetensi 3', '1988-04-19', 'Online', 'ut', '17:51:50', '20:11:34', NULL, 40),
(18, 'Kompetensi 3', '2021-09-18', 'Offline', 'modi', '02:41:00', '03:20:01', NULL, 41),
(19, 'Kompetensi 4', '1982-10-06', 'Online', 'tempore', '20:28:23', '16:17:02', NULL, 46),
(20, 'Kompetensi 1', '2022-08-10', 'Online', 'Zoom Meeting', '09:56:46', '21:37:50', 'Laravel Developer-Level II_63c00fb053301.pdf', 21),
(22, 'Kompetensi 5', '1991-07-30', 'Online', 'possimus', '08:16:53', '10:17:52', NULL, 23),
(23, 'Kompetensi 5', '1991-11-17', 'Online', 'quas', '16:03:51', '17:10:02', NULL, 24),
(24, 'Kompetensi 5', '1991-08-17', 'Online', 'deserunt', '04:41:47', '12:34:30', NULL, 25),
(25, 'Kompetensi 4', '1994-02-08', 'Online', 'vel', '05:57:45', '10:17:38', NULL, 26),
(32, 'Kompetensi 6', '2023-01-12', 'Online', 'Zoom Meeting', '00:12:00', '12:12:00', '32-Laravel Developer_63c0009fe75b5.pdf', 21),
(33, 'Kompetensi 6', '2023-01-17', 'Offline', 'Gedung G', '08:54:00', '09:55:00', 'Database Administrator-Level I_63c272cb9446d.pdf', 22),
(36, 'Kompetensi 5', '2023-01-12', 'Online', 'Zoom Meeting', '08:51:00', '09:51:00', 'Laravel Developer-Level II_63c01059f3e16.pdf', 21),
(37, 'Kompetensi 6', '2023-01-13', 'Online', 'Zoom Meeting', '08:52:00', '09:52:00', 'AI Developer-Level I_63c0109959cf0.pdf', 48),
(38, 'Kompetensi 5', '2023-01-14', 'Offline', 'Gedung G', '07:16:00', '09:16:00', 'Database Administrator-Level I_63c2730333c9d.pdf', 22),
(39, 'Kompetensi 1', '2023-01-14', 'Offline', 'Gedung G', '08:17:00', '10:17:00', NULL, 22);

-- --------------------------------------------------------

--
-- Table structure for table `unreg_asesi`
--

CREATE TABLE `unreg_asesi` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nim` int(11) NOT NULL,
  `no_telepon` varchar(20) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `prodi` varchar(50) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` char(64) NOT NULL,
  `otp_code` char(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_ID_ADMIN` (`id_biodata_admin`);

--
-- Indexes for table `asesi`
--
ALTER TABLE `asesi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_biodata_asesi` (`id_biodata_asesi`);

--
-- Indexes for table `asesor`
--
ALTER TABLE `asesor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_asesor_biodata` (`id_biodata_asesor`);

--
-- Indexes for table `biodata_admin`
--
ALTER TABLE `biodata_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `biodata_asesi`
--
ALTER TABLE `biodata_asesi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `biodata_asesor`
--
ALTER TABLE `biodata_asesor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `daftar_asesi_sertifikasi`
--
ALTER TABLE `daftar_asesi_sertifikasi`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `asesi_skema_UK` (`id_biodata_asesi`,`id_skema_sertifikasi`),
  ADD KEY `fk_daftar_skema` (`id_skema_sertifikasi`);

--
-- Indexes for table `dokumen_asesmen`
--
ALTER TABLE `dokumen_asesmen`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unit_asesi_UK` (`id_unit_kompetensi`,`id_biodata_asesi`),
  ADD KEY `fk_dokumen_asesi` (`id_biodata_asesi`);

--
-- Indexes for table `dokumen_persyaratan`
--
ALTER TABLE `dokumen_persyaratan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_biodata_ases` (`id_biodata_asesi`),
  ADD KEY `fk_persyaratan` (`id_persyaratan`);

--
-- Indexes for table `jenjang_studi`
--
ALTER TABLE `jenjang_studi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `list_persyaratan`
--
ALTER TABLE `list_persyaratan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `deskripsi_UK` (`deskripsi`);

--
-- Indexes for table `penilaian_asesmen`
--
ALTER TABLE `penilaian_asesmen`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kompetensi_asesi_UK` (`id_kompetensi`,`id_biodata_asesi`),
  ADD KEY `fk_penilaian_asesi` (`id_biodata_asesi`);

--
-- Indexes for table `persyaratan_skema`
--
ALTER TABLE `persyaratan_skema`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_persyaratan_skema` (`id_skema`);

--
-- Indexes for table `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_prodi_jurusan` (`id_jurusan`),
  ADD KEY `fk_prodi_jenjang` (`id_jenjang_studi`);

--
-- Indexes for table `skema_sertifikasi`
--
ALTER TABLE `skema_sertifikasi`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nama_level_UK` (`nama_skema`,`level`),
  ADD KEY `fk_skema_jurusan` (`id_jurusan`),
  ADD KEY `fk_skema_asesor` (`id_biodata_asesor`);

--
-- Indexes for table `skkni`
--
ALTER TABLE `skkni`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unit_kompetensi`
--
ALTER TABLE `unit_kompetensi`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nama_id_skema_UK` (`nama_kompetensi`,`id_skema`),
  ADD KEY `fk_unit_kompetensi_skema` (`id_skema`);

--
-- Indexes for table `unreg_asesi`
--
ALTER TABLE `unreg_asesi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `asesi`
--
ALTER TABLE `asesi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `asesor`
--
ALTER TABLE `asesor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `biodata_admin`
--
ALTER TABLE `biodata_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `biodata_asesi`
--
ALTER TABLE `biodata_asesi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `biodata_asesor`
--
ALTER TABLE `biodata_asesor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `daftar_asesi_sertifikasi`
--
ALTER TABLE `daftar_asesi_sertifikasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `dokumen_asesmen`
--
ALTER TABLE `dokumen_asesmen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `dokumen_persyaratan`
--
ALTER TABLE `dokumen_persyaratan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `jenjang_studi`
--
ALTER TABLE `jenjang_studi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `list_persyaratan`
--
ALTER TABLE `list_persyaratan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `penilaian_asesmen`
--
ALTER TABLE `penilaian_asesmen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `persyaratan_skema`
--
ALTER TABLE `persyaratan_skema`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `prodi`
--
ALTER TABLE `prodi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `skema_sertifikasi`
--
ALTER TABLE `skema_sertifikasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `skkni`
--
ALTER TABLE `skkni`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `unit_kompetensi`
--
ALTER TABLE `unit_kompetensi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `unreg_asesi`
--
ALTER TABLE `unreg_asesi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `FK_ID_ADMIN` FOREIGN KEY (`id_biodata_admin`) REFERENCES `admin` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `asesi`
--
ALTER TABLE `asesi`
  ADD CONSTRAINT `fk_biodata_asesi` FOREIGN KEY (`id_biodata_asesi`) REFERENCES `biodata_asesi` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `asesor`
--
ALTER TABLE `asesor`
  ADD CONSTRAINT `fk_asesor_biodata` FOREIGN KEY (`id_biodata_asesor`) REFERENCES `biodata_asesor` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `daftar_asesi_sertifikasi`
--
ALTER TABLE `daftar_asesi_sertifikasi`
  ADD CONSTRAINT `fk_daftar_asesi` FOREIGN KEY (`id_biodata_asesi`) REFERENCES `biodata_asesi` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_daftar_skema` FOREIGN KEY (`id_skema_sertifikasi`) REFERENCES `skema_sertifikasi` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `dokumen_asesmen`
--
ALTER TABLE `dokumen_asesmen`
  ADD CONSTRAINT `fk_dokumen_asesi` FOREIGN KEY (`id_biodata_asesi`) REFERENCES `biodata_asesi` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_dokumen_unit` FOREIGN KEY (`id_unit_kompetensi`) REFERENCES `unit_kompetensi` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `penilaian_asesmen`
--
ALTER TABLE `penilaian_asesmen`
  ADD CONSTRAINT `fk_penilaian_asesi` FOREIGN KEY (`id_biodata_asesi`) REFERENCES `biodata_asesi` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_penilaian_kompetensi` FOREIGN KEY (`id_kompetensi`) REFERENCES `unit_kompetensi` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `persyaratan_skema`
--
ALTER TABLE `persyaratan_skema`
  ADD CONSTRAINT `fk_persyaratan_skema` FOREIGN KEY (`id_skema`) REFERENCES `skema_sertifikasi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `prodi`
--
ALTER TABLE `prodi`
  ADD CONSTRAINT `fk_prodi_jenjang` FOREIGN KEY (`id_jenjang_studi`) REFERENCES `jenjang_studi` (`id`),
  ADD CONSTRAINT `fk_prodi_jurusan` FOREIGN KEY (`id_jurusan`) REFERENCES `jurusan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `skema_sertifikasi`
--
ALTER TABLE `skema_sertifikasi`
  ADD CONSTRAINT `fk_skema_asesor` FOREIGN KEY (`id_biodata_asesor`) REFERENCES `biodata_asesor` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `fk_skema_jurusan` FOREIGN KEY (`id_jurusan`) REFERENCES `jurusan` (`id`);

--
-- Constraints for table `unit_kompetensi`
--
ALTER TABLE `unit_kompetensi`
  ADD CONSTRAINT `fk_unit_kompetensi_skema` FOREIGN KEY (`id_skema`) REFERENCES `skema_sertifikasi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
