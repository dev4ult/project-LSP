-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 07, 2023 at 06:00 PM
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
  `password` char(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`) VALUES
(28, 'admin', 'agunnuga12321@gmail.com', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918'),
(29, 'admin', 'nibrasbiasaaja@gmail.com', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918');

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
(1, 'annabelle.schmitt', 'zmurphy@example.com', '6f1c5397ba346d899494fef30b5f33b0829741c6', 1),
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
(20, 'browe', 'quigley.raegan@example.com', '3812eeaa47d463f89b8825235899c9af6ab0b7ec', 20);

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
(4, 'jamarcus.walsh', 'norene.franecki@example.net', '8d444959e1102e00d0c5dfb128d3e8fee4729b8d', 4),
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
(20, 'johnston.franz', 'christopher.rowe@example.org', '92448723b0f63c467e829728e613d60936894a3c', 20);

-- --------------------------------------------------------

--
-- Table structure for table `biodata_asesi`
--

CREATE TABLE `biodata_asesi` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `id_prodi` int(11) DEFAULT NULL,
  `nim` int(11) NOT NULL,
  `no_telepon` varchar(20) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `pendidikan_terakhir` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `biodata_asesi`
--

INSERT INTO `biodata_asesi` (`id`, `nama`, `jenis_kelamin`, `id_prodi`, `nim`, `no_telepon`, `alamat`, `pendidikan_terakhir`) VALUES
(1, 'Shayne Hand', 'Laki-laki', 1, 2107416464, '(591)904-4978x144', '875 Bethany Orchard Apt. 011\nNorth Brenna, SD 04176-8700', ' S1'),
(2, 'Prof. Jillian Zemlak Jr.', 'Perempuan', 2, 2107437939, '1-685-043-1788x7619', '8368 Roberts Locks Suite 175\nChristiansenhaven, CT 55878-2316', ' S1'),
(3, 'Elouise Anderson', 'Laki-laki', 3, 2107450588, '+31(7)6113464749', '4838 Wiegand Lakes\nGradytown, MI 19734', 'SMA'),
(4, 'Dr. Jarvis Turner', 'Perempuan', 4, 2107445951, '06641192310', '56238 Rosa Mall Suite 647\nLake Lennyville, OR 00134-1562', 'SMA'),
(5, 'Jenifer Trantow MD', 'Laki-laki', 1, 2107414268, '02606606887', '26335 Rice Station\nEast Edythe, OK 33899-6649', ' D1'),
(6, 'Earnestine Okuneva IV', 'Laki-laki', 2, 2107436484, '670.130.7560', '403 Watsica Green Suite 634\nEast Evelyn, TX 43875-7796', ' SMK'),
(7, 'Jackeline Effertz', 'Perempuan', 3, 2107423766, '(474)608-0425x91225', '467 Emard Lane Apt. 697\nJarvisshire, DC 52388', ' D2'),
(8, 'Bonnie Little', 'Laki-laki', 4, 2107447982, '577.036.4748x1493', '8314 August Walks Apt. 180\nSouth Arvelport, WY 19495', ' D4'),
(9, 'Lavada Lowe I', 'Laki-laki', 1, 2107420041, '431.981.2921', '3922 Jana Place\nDayanahaven, DC 50173', ' D2'),
(10, 'Daren Huels', 'Laki-laki', 2, 2107443008, '1-900-227-4554x158', '380 Silas Pass\nWest Wymantown, CO 49824', ' D2'),
(11, 'Telly Kuphal', 'Perempuan', 3, 2107429710, '(493)068-3487', '570 Wyman Flats\nGreenfeldershire, HI 55399-2066', ' S2'),
(12, 'Sandrine Kulas', 'Laki-laki', 4, 2107433910, '1-157-372-5832x11267', '75028 Celestine Extensions\nLake Vergie, SC 12394-8479', ' S2'),
(13, 'Prof. Ashtyn Hansen Jr.', 'Perempuan', 1, 2107418008, '336.227.1483', '31516 Eldora Gateway Suite 273\nEast Rileytown, SC 94266', ' S2'),
(14, 'Easter King', 'Perempuan', 2, 2107446008, '1-526-990-8791x8956', '468 Hermiston Manor\nNorth Valentinahaven, DE 89790', ' D1'),
(15, 'Marlee Huel', 'Perempuan', 3, 2107425121, '354.222.3996x7272', '84466 Dina Locks\nWilfordland, NV 29505', ' D2'),
(16, 'Simone Effertz', 'Perempuan', 4, 2107437036, '(107)190-2158x8214', '4842 Isabella Streets\nPort Terrill, AZ 75022', ' S1'),
(17, 'Abigail Fisher', 'Laki-laki', 1, 2107418555, '134-163-0266', '353 Feeney Divide\nHintzton, MI 34558-4174', ' D2'),
(18, 'Miss Grace Kemmer', 'Laki-laki', 2, 2107438145, '1-030-798-6601x4353', '2211 Kautzer Plain\nDorothyport, SD 96740', ' S1'),
(19, 'Amely Auer', 'Perempuan', 3, 2107432113, '02135658539', '67531 Marjolaine Cliff\nPort Garland, IA 84965', 'SMA'),
(20, 'Dr. Gilberto Metz DDS', 'Laki-laki', 4, 2107428311, '1-734-344-1110', '42904 Rowena Ridges Apt. 712\nFlatleyville, AR 10651', ' S2'),
(21, 'Ford Collier', 'Perempuan', 1, 2107422042, '369-942-0595x30906', '508 Bertram Lake\nWest Blaise, NH 69209-5240', ' S1'),
(22, 'Chester Gorczany MD', 'Laki-laki', 2, 2107439632, '(564)718-2931x8619', '3794 Treutel Circle\nNew Lurlineport, WY 10609-1044', ' D4'),
(23, 'Prof. Earlene Rath I', 'Laki-laki', 3, 2107428014, '1-804-889-0203', '46457 Kirlin Expressway Apt. 752\nAudramouth, OR 42620-2217', ' S2'),
(24, 'Patrick Jast', 'Laki-laki', 4, 2107436006, '(228)687-8095', '62527 Bins Walk\nJerryland, FL 28580', ' D1'),
(25, 'Sigmund Dickinson', 'Perempuan', 1, 2107433927, '(198)181-5775', '3049 Smitham Bridge\nWisozkburgh, WI 34102-4752', ' D3'),
(26, 'Mr. Jordi Boyle Sr.', 'Laki-laki', 2, 2107415570, '1-823-530-0692', '796 Juston Junctions\nParkerfort, VA 00264-3502', ' D2'),
(27, 'Enrico Ward', 'Perempuan', 3, 2107446881, '(368)236-3039x05746', '63125 Schneider Wall\nNewtonborough, IL 33081', ' D3'),
(28, 'Dr. Immanuel Mosciski PhD', 'Perempuan', 4, 2107435194, '(240)026-3420', '649 Adelbert Trafficway Suite 585\nShawnside, MA 26681', ' S1'),
(29, 'Destin Donnelly', 'Laki-laki', 1, 2107449254, '553-112-1061x42026', '277 Cassandra Estates Suite 141\nCassinmouth, AR 40100-5480', ' D3'),
(30, 'Marlee Kuhic', 'Perempuan', 2, 2107416236, '1-583-012-5616x533', '908 O\'Reilly Track\nMeghanborough, AR 78618', ' D3'),
(31, 'Dr. Lane Pacocha MD', 'Perempuan', 3, 2107431346, '1-746-113-0551x2954', '40405 Keebler Springs\nSouth Claudebury, NY 67666', 'SMA'),
(32, 'Liam Hane', 'Perempuan', 4, 2107447612, '161.108.0616', '9688 Stroman Landing\nWest Domenickside, CA 89039-2098', ' D4'),
(33, 'Levi Armstrong III', 'Laki-laki', 1, 2107429746, '388-211-4094', '80886 Lexi Spur Suite 730\nSouth Meghan, MI 21041-0732', ' D4'),
(34, 'Ms. Lucile Strosin III', 'Laki-laki', 2, 2107412810, '1-490-006-2437', '60576 Auer Inlet Suite 368\nHackettmouth, KY 49446', 'SMA'),
(35, 'Prof. Jacquelyn Heidenreich', 'Laki-laki', 3, 2107424795, '337.595.4878', '40773 Russel Green Apt. 420\nEmardport, NC 53377-3362', ' D3'),
(36, 'Gilbert Schaden', 'Perempuan', 4, 2107412290, '(276)461-9766', '00092 Caleigh Ways Suite 612\nLake Jayceefurt, MA 02978-1409', ' S1'),
(37, 'Prof. Frederic Schmeler PhD', 'Perempuan', 1, 2107448274, '(953)152-4245', '0737 Lubowitz Corners\nClevelandview, WV 17250-7942', ' S1'),
(38, 'Angel Hilpert', 'Perempuan', 2, 2107424522, '898-778-1531x0557', '72326 Cormier Point Apt. 328\nNorth Kelsi, WA 50050-5046', ' D4'),
(39, 'Mrs. Imogene Wilderman', 'Perempuan', 3, 2107445528, '017-362-5203x113', '226 Smitham Ridge\nAndreanebury, VA 60209-7809', ' D1'),
(40, 'Jevon Keebler III', 'Perempuan', 4, 2107449427, '795-918-5292x900', '9328 Ellsworth Cliff\nLake Cassandra, NV 15243', ' SMK'),
(41, 'Heber Wolff', 'Laki-laki', 1, 2107446053, '1-219-259-0619x3777', '3537 Selena Knolls\nNicholeland, DC 86721', ' D4'),
(42, 'Anya Cole', 'Perempuan', 2, 2107442324, '1-374-942-6999', '4512 Lang Harbors\nWest Imelda, NJ 65766-8268', 'SMA'),
(43, 'Dr. Eddie Homenick DVM', 'Perempuan', 3, 2107426797, '1-460-233-8682x86265', '72354 Dallin Road Apt. 001\nSkylaland, NY 95074', ' S1'),
(44, 'Ms. Jannie Hessel II', 'Laki-laki', 4, 2107449539, '1-772-736-0587x0726', '52469 Kale Via Suite 114\nNorth Yeseniaburgh, KS 76967-5334', 'SMA'),
(45, 'Aida Metz', 'Laki-laki', 1, 2107437755, '186.197.8904x161', '632 Nova Wells Suite 727\nSouth Emilia, GA 77836', ' D2'),
(46, 'Sammie Ankunding', 'Laki-laki', 2, 2107427686, '(645)127-0359', '9710 Orpha Ville Suite 878\nNew Melodyberg, AK 44633-4107', 'SMA'),
(47, 'Elmer Mayer', 'Perempuan', 3, 2107436613, '00251230631', '440 Hansen Ferry Apt. 240\nTeresatown, KY 04301-2387', ' D1'),
(48, 'Blake Sporer', 'Laki-laki', 4, 2107431780, '733.991.2833x4407', '577 Savanna Route Suite 759\nJastbury, CT 51686-2086', 'SMA'),
(49, 'Selina Homenick', 'Laki-laki', 1, 2107425786, '310-581-2112', '884 Roger Pine Apt. 702\nWest Russellborough, SD 52508-5463', ' D1'),
(50, 'Dr. Gertrude Armstrong', 'Perempuan', 2, 2107425532, '006-792-8065', '478 Armani Lock Suite 706\nSouth Jalen, GA 24902-9074', ' S1');

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
(21, 'Marcelina Green', 'Laki-laki', '194479997362941504', '155.113.8360x6757', '3538645492866635', 'Suite 210', '1997-02-17', '50599 Hintz Light\nLake Tavaresmouth, MA 72878', ' sma'),
(22, 'Elinor Bode', 'Laki-laki', '100091487821191549', '450-997-2910x51351', '3935497557045892', 'Suite 575', '1997-06-02', '419 Nedra Viaduct Suite 333\nNorth Isaiah, NM 79170-5699', ' d4'),
(23, 'Wanda Bahringer', 'Laki-laki', '165676223998889328', '1-792-764-0494x74829', '3542976851342246', 'Apt. 624', '2014-04-04', '814 Boyer Squares\nNorth Marlon, RI 39006', ' sma'),
(24, 'Dr. Jeremie Gleason MD', 'Laki-laki', '131867627194151284', '851.772.7408', '3687608457636088', 'Suite 067', '1991-07-05', '3761 Jamar Squares\nShieldsshire, CO 71006-1664', ' s3'),
(25, 'Fleta Kreiger', 'Laki-laki', '155156504036858680', '(275)775-1208', '3779892658581957', 'Suite 618', '2009-11-26', '642 Lockman Summit\nHeleneport, WA 06028-6666', ' smp'),
(26, 'Mrs. Chanelle Roberts MD', 'Laki-laki', '106565735628828406', '(797)776-3509', '3817827163031325', 'Apt. 338', '2010-05-04', '25168 Wilderman Port Apt. 423\nPort Fanny, MD 06132-5442', ' s1'),
(27, 'Luz Weissnat', 'Laki-laki', '143166276905685664', '1-749-375-0510x71752', '3650061096064746', 'Suite 730', '1972-04-30', '910 Myriam Plain\nKrisbury, OK 53515-7396', ' s3'),
(28, 'Gardner Schimmel', 'Laki-laki', '180890213139355184', '216.120.2195x200', '3714456761721522', 'Suite 099', '1970-02-09', '6357 Gust Forge\nGusikowskifurt, LA 22179-2898', 'sd'),
(29, 'Carroll Adams', 'Laki-laki', '134979236638173460', '(707)359-2071', '3594841291662305', 'Apt. 831', '2001-08-23', '976 King Loop Apt. 105\nPort Maynardshire, NE 62800', ' smp'),
(30, 'Kyler Schmeler', 'Laki-laki', '100129679217934608', '822-910-9616x5562', '3668212105985731', 'Apt. 419', '1971-12-03', '011 Ona Stravenue Suite 043\nArmstrongbury, NM 60920-0195', ' s3'),
(31, 'Henry Bins', 'Laki-laki', '151730566658079624', '822-296-1852x262', '3946303507080302', 'Suite 645', '1971-06-21', '16063 Adelia Point Apt. 936\nNorth Jordyville, TN 40916-9581', ' smp'),
(32, 'Ms. Lenore Gutmann', 'Laki-laki', '181765102874487632', '852-027-7053x34251', '3605833599343896', 'Apt. 970', '1981-09-16', '9717 Turner Forks Apt. 225\nLake Domenickfurt, VT 46787', ' smp'),
(33, 'Torrey Rutherford MD', 'Laki-laki', '171899778582155704', '703-685-6697x691', '3556944880168885', 'Suite 671', '2013-01-02', '3383 Johns Rest Suite 665\nAlberthaburgh, OR 47879', ' d4'),
(34, 'Mallie Okuneva', 'Laki-laki', '169754403689876200', '395.853.1479x371', '3530603815568611', 'Apt. 282', '2004-10-26', '501 Harris Ferry Suite 154\nTrevorhaven, ID 15215', ' s2'),
(35, 'Dr. Noemi Bashirian', 'Laki-laki', '168643929297104480', '+78(9)5339391828', '3642688752384856', 'Apt. 444', '1978-03-09', '7612 Garland Summit\nCartwrightshire, HI 32516-7253', ' s1'),
(36, 'Aubree Brekke MD', 'Laki-laki', '168446330865845088', '+38(6)6230723489', '3903200054308400', 'Suite 154', '1979-10-30', '27754 McCullough Stream Apt. 093\nRosenbaumfurt, KS 55910-3128', ' s3'),
(37, 'Jaida Russel I', 'Laki-laki', '182546816160902384', '1-137-801-0981x922', '3524247147841379', 'Apt. 341', '2015-10-03', '20539 Runolfsson Hills Suite 055\nPort Noelia, NY 81545-7704', ' s3'),
(38, 'Jane Lesch', 'Laki-laki', '172173495916649696', '111-951-5943x6675', '3793440586188808', 'Apt. 676', '2022-04-29', '399 Ali Harbor\nPort Modesta, DC 33806-7185', ' d4'),
(39, 'Gaylord Kutch', 'Laki-laki', '185258828522637488', '+09(7)4312207253', '3635773105546832', 'Suite 263', '1994-12-05', '11307 Mustafa Falls\nShanelstad, CA 79932', ' s3'),
(40, 'Miss Shaylee Goldner V', 'Laki-laki', '100068784086033701', '203-561-5479', '3981531406054274', 'Suite 577', '1999-11-06', '217 Armand Pines\nNorth Flavioshire, DC 02871-4067', ' sma'),
(41, 'Joana Bode', 'Laki-laki', '105413125827908516', '1-967-973-8499x111', '3746992882806808', 'Apt. 248', '2004-06-16', '42942 Green Ferry Apt. 206\nNew German, TN 86114', ' sma'),
(42, 'Arvel Windler III', 'Laki-laki', '107302882429212332', '1-497-303-7068x78307', '3773819198366255', 'Apt. 411', '1986-03-01', '63968 Wehner Avenue\nVolkmanfort, CT 50583', ' sma'),
(43, 'Prof. Leif Ernser', 'Laki-laki', '106419982248917222', '(290)707-9345', '3980836118804291', 'Apt. 806', '1995-11-03', '3086 Elmer Spurs Suite 369\nNorth Jacklynton, HI 38740-5796', ' s2'),
(44, 'Domenic Kautzer', 'Laki-laki', '141095176571980120', '355-075-2021', '3811570351477713', 'Apt. 490', '2004-07-10', '666 Doug Lodge\nNew Howell, AZ 69945-0984', ' s3'),
(45, 'Prof. Hal Tremblay', 'Laki-laki', '158870163420215248', '828-402-4569', '3605037625646218', 'Suite 368', '1973-08-16', '26547 Powlowski Green\nMooreborough, ME 23832-7681', ' d4'),
(46, 'Mr. Keyshawn Ziemann', 'Laki-laki', '131845371890813112', '885.925.9125x95377', '3629533029859885', 'Suite 296', '2015-05-20', '3947 Lebsack Cape Suite 348\nPort Kipfurt, WA 12172', ' d4'),
(47, 'Ella O\'Conner', 'Laki-laki', '183394823316484688', '(106)316-5923x2232', '3627006909111514', 'Suite 462', '2003-10-05', '76292 Burley Turnpike Apt. 329\nBruenville, KY 63101', ' d3'),
(48, 'Edmond Reichert DVM', 'Laki-laki', '106010434171184897', '+91(4)6550177377', '3586927716387435', 'Suite 043', '2003-11-02', '6655 Nat Lake\nSouth Venamouth, ND 30667-5326', ' s1'),
(49, 'Maximilian Thiel', 'Laki-laki', '141139851696789264', '(401)716-4047x663', '3954656640300528', 'Apt. 899', '1994-09-13', '336 Gerda Village\nHoythaven, WV 28701-3503', ' s1'),
(50, 'Mr. Mohammad Bailey', 'Laki-laki', '183938752207905056', '+33(6)6564292782', '3957812644075603', 'Apt. 707', '1973-11-20', '68335 Keaton Dale Suite 484\nNorth Connie, OH 70164-6124', ' s2');

-- --------------------------------------------------------

--
-- Table structure for table `daftar_asesi_sertifikasi`
--

CREATE TABLE `daftar_asesi_sertifikasi` (
  `id` int(11) NOT NULL,
  `status_kelulusan` enum('Lulus','Belum Lulus') NOT NULL,
  `status_asesmen` enum('Sudah','Belum') NOT NULL,
  `id_biodata_asesi` int(11) NOT NULL,
  `id_skema_sertifikasi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `daftar_asesi_sertifikasi`
--

INSERT INTO `daftar_asesi_sertifikasi` (`id`, `status_kelulusan`, `status_asesmen`, `id_biodata_asesi`, `id_skema_sertifikasi`) VALUES
(1, 'Belum Lulus', 'Belum', 1, 21),
(2, 'Belum Lulus', 'Sudah', 2, 21),
(3, 'Belum Lulus', 'Belum', 3, 23),
(4, 'Belum Lulus', 'Sudah', 4, 23),
(5, 'Belum Lulus', 'Belum', 5, 25),
(6, 'Belum Lulus', 'Sudah', 6, 25),
(7, 'Belum Lulus', 'Belum', 7, 21),
(8, 'Belum Lulus', 'Sudah', 8, 28),
(9, 'Belum Lulus', 'Belum', 9, 29),
(10, 'Belum Lulus', 'Sudah', 10, 30),
(11, 'Belum Lulus', 'Belum', 11, 32),
(12, 'Belum Lulus', 'Belum', 12, 33),
(13, 'Belum Lulus', 'Sudah', 13, 34),
(14, 'Belum Lulus', 'Belum', 14, 35),
(15, 'Belum Lulus', 'Sudah', 15, 36);

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
  `deskripsi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `persyaratan_skema`
--

CREATE TABLE `persyaratan_skema` (
  `id` int(11) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `id_skema` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(21, ' Laravel Developer', 'SKKNI Industri Modifikasi Kendaraan Bermotor', 'Aktif', 'Level II', 1, 1),
(22, ' Database Administrator', 'SKKNI Teknis Ototronik', 'Nonaktif', 'Level I', 2, 2),
(23, ' Network Engineer', 'SKKNI Industri Modifikasi Kendaraan Bermotor', 'Nonaktif', 'Level V', 3, 3),
(24, ' Laravel Developer', 'SKKNI Perakitan Telepon Seluler', 'Nonaktif', 'Level III', 4, 4),
(25, 'Flutter Developer', 'SKKNI Industri Cat', 'Aktif', 'Level IV', 5, 5),
(26, ' Cloud Developer', 'SKKNI Perakitan Telepon Seluler', 'Nonaktif', 'Level V', 6, 6),
(27, ' Cloud Developer', 'SKKNI Perakitan Telepon Seluler', 'Nonaktif', 'Level IV', 7, 7),
(28, ' Database Administrator', 'SKKNI Perakitan Telepon Seluler', 'Aktif', 'Level V', 8, 1),
(29, ' Database Administrator', 'SKKNI Industri Cat', 'Nonaktif', 'Level IV', 9, 2),
(30, ' Laravel Developer', 'SKKNI Perakitan Telepon Seluler', 'Aktif', 'Level I', 10, 3),
(32, 'Flutter Developer', 'SKKNI Perakitan Telepon Seluler', 'Nonaktif', 'Level I', 12, 5),
(33, ' Cloud Developer', 'SKKNI Peralatan Elektronika', 'Aktif', 'Level II', 13, 6),
(34, ' Web Developer', 'SKKNI Perakitan Telepon Seluler', 'Aktif', 'Level I', 14, 7),
(35, ' Network Engineer', 'SKKNI Industri Cat', 'Aktif', 'Level III', 15, 1),
(36, ' Database Administrator', 'SKKNI Perakitan Telepon Seluler', 'Aktif', 'Level III', 16, 2),
(39, ' Network Engineer', 'SKKNI Industri Modifikasi Kendaraan Bermotor', 'Aktif', 'Level II', 19, 5),
(40, ' Laravel Developer', 'SKKNI Perakitan Telepon Seluler', 'Aktif', 'Level V', 20, 6),
(41, 'Machine Learning Developer', 'SKKNI Teknis Ototronik', 'Aktif', 'Level I', NULL, NULL),
(46, 'Machine Learning Developer', 'SKKNI Industri Cat', 'Aktif', 'Level V', NULL, NULL);

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
  `jenis_pelaksanaan` varchar(20) NOT NULL,
  `tempat_unit_kompetensi` varchar(255) NOT NULL,
  `file_opsional` varchar(255) NOT NULL,
  `id_skema` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `unreg_admin`
--

CREATE TABLE `unreg_admin` (
  `id` int(11) NOT NULL,
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
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `biodata_asesi`
--
ALTER TABLE `biodata_asesi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_prodi` (`id_prodi`);

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
  ADD PRIMARY KEY (`id`);

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
  ADD KEY `fk_unit_kompetensi_skema` (`id_skema`);

--
-- Indexes for table `unreg_admin`
--
ALTER TABLE `unreg_admin`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `daftar_asesi_sertifikasi`
--
ALTER TABLE `daftar_asesi_sertifikasi`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `persyaratan_skema`
--
ALTER TABLE `persyaratan_skema`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prodi`
--
ALTER TABLE `prodi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `skema_sertifikasi`
--
ALTER TABLE `skema_sertifikasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `skkni`
--
ALTER TABLE `skkni`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `unit_kompetensi`
--
ALTER TABLE `unit_kompetensi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `unreg_admin`
--
ALTER TABLE `unreg_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- Constraints for dumped tables
--

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
-- Constraints for table `biodata_asesi`
--
ALTER TABLE `biodata_asesi`
  ADD CONSTRAINT `fk_id_prodi` FOREIGN KEY (`id_prodi`) REFERENCES `biodata_asesi` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `daftar_asesi_sertifikasi`
--
ALTER TABLE `daftar_asesi_sertifikasi`
  ADD CONSTRAINT `fk_daftar_asesi` FOREIGN KEY (`id_biodata_asesi`) REFERENCES `biodata_asesi` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_daftar_skema` FOREIGN KEY (`id_skema_sertifikasi`) REFERENCES `skema_sertifikasi` (`id`) ON DELETE CASCADE;

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
