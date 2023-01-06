-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 04, 2023 at 02:09 AM
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
  `password` char(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `asesi`
--

INSERT INTO `asesi` (`id`, `username`, `email`, `password`) VALUES
(1, 'wilderman.phyllis', 'hirthe.ruby@example.com', 'f156366a8c391a0a478c1fefa685aa8b7620611f4f6b81049c8d0533a73e83f0'),
(2, 'kali33', 'greichert@example.net', '2a61d28ef5015610a05e8e8639b7074c8851a548c6d77eb311496e48e7ff9c25'),
(3, 'zjohns', 'kiera.effertz@example.com', 'a60883502e53a0e014596b7bcf6a84fd036e53dd8ca0833cbb680c4236c1f839'),
(4, 'xkunze', 'quigley.tania@example.org', 'cea96dd9ca2c8bda53572c2faf8f3758c917f43cb4b19ee0d3a6876befa70d32'),
(5, 'smith.herminia', 'o\'kon.agustina@example.net', '8b9cc012dcc3dee306235a5bc2529db003df17c5822a805391849912d8aa0a0e'),
(6, 'jryan', 'pat50@example.net', '18458923678760a54c826843dd44c6307039b7a3002fe598ef69d8212ed53769'),
(7, 'schamberger.wilford', 'bahringer.christopher@example.net', '2af95189475eda06d998635c85489f6435036b8b11925e4aa3b105b48e903188'),
(8, 'towne.krystel', 'larson.rhianna@example.net', '3afd0fa81031d94fa94ae6893b9f40c54fbb974d93243c5b3ecd8a97916a13f2'),
(9, 'georgiana74', 'tracey.ernser@example.net', '7162f06a735a7dc3e358060e0ffd923712bca68ccbbc6600c2c4d63fe4e88868'),
(10, 'jerry.friesen', 'buford.deckow@example.org', 'aeaa6eaca469dfd42ddb5a6f9622a63aaeeaf017035ad07c812e92105ff523bc'),
(11, 'candida17', 'woodrow36@example.com', 'aada468505184edd0cad5e6bb7b411a8a0f04b1f841056d8a6bc48130b42742d'),
(12, 'edward12', 'waters.pasquale@example.net', '45bade82179872dc7e406d5360ef7cacd35f5b64447fb9c0bb82d73f637340e3'),
(13, 'nrutherford', 'myrtice.frami@example.com', 'd9b862547fb3eaf965480b4acca8cd7684380e24566cd9a65e8e951607bf9f20'),
(14, 'wilfrid81', 'qsenger@example.org', 'ee89fad863a9dfd65891f13e638474b19565293a36c544e3c63fd8b942d7007f'),
(15, 'nstokes', 'brandon42@example.net', '001a08ab5f08b9b3a62769fbb6737e8422071f41e8b6961ba22504b263650285'),
(16, 'bell.doyle', 'gilda.greenholt@example.net', '1ab8ea7ea7cc7fd7c131060ff7aa99eae91b7a1cc17633a283e742903ca6af6c'),
(17, 'mabel45', 'mrowe@example.com', '5158627a20f22a972ec9ab52559a3f0145b154d5f593bd0d07c89edd73f485b3'),
(18, 'xzavier.mann', 'fadel.keyon@example.com', 'a5ffa5e8708ac124ef8a8f41c4348587138fea9808b687326feb80116e047258'),
(19, 'oleta.maggio', 'harvey.tomasa@example.com', 'aaee9d9fcdeefc62e47f860cfe788871ee2a5ef41c9e4c76818968242052ef74'),
(20, 'amosciski', 'etorp@example.net', '8c2ab5cda5609a15694020423ce9fb8abad4f821ac290d243f96d9715c457a52'),
(21, 'mcglynn.fern', 'albina84@example.com', '188b6a4eb0fca79019c3b979fc5061f6690a503418b458db267f9fa36e85f159'),
(22, 'mante.dillon', 'rdooley@example.com', '936c8a0305fd44e203dea8f9628d08e43b4c11dc3a0370facf032402e9f36206'),
(23, 'mavis82', 'rippin.lorenza@example.org', 'b8a0ee86006a22c1b835d0a74238cde1354215c2ecfee0dd190c6923cde0f6a2'),
(24, 'crona.reyes', 'carolanne.bernhard@example.com', 'cf9b28226753da145c3e4d34d13f93608c19256968a4648d11101f2e7d0b3aaa'),
(25, 'margaret80', 'bsmith@example.net', 'eb599e8cfc5d6454ac7b4bed3b58a60b6f6796c1ae1b680cbc8e128b9e8898b9'),
(26, 'anderson.fadel', 'gokuneva@example.com', '425bc331f5319c9140efc7a1a25f9485b036a4e25024fbc8c4165a2fb0a5b1f8'),
(27, 'upton.hans', 'bmosciski@example.net', '6f8c9bf20a6b2097dcf67e8a9e19ce03d008883e1e4902e0b003ef12f723d168'),
(28, 'tfranecki', 'mueller.dereck@example.com', '3b66616e0fc78ad465c1a30dd5b77c4c83aca76465ed7c8842b6fb25743a1340'),
(29, 'ydaniel', 'immanuel.raynor@example.org', '4068f5b1a2c6b58cde1f7dafbca8a7a7e2a9939e934aad87562c55500527f0b9'),
(30, 'barrows.carley', 'rodolfo.romaguera@example.com', 'ed40b9df49d3abf3839d043bbe88af53938ccfe5aeaa5f4caae47b6c2b34c3ce'),
(31, 'declan.christiansen', 'kilback.theodora@example.com', 'c96c8926151f42810226a3c5551e6ec04255863e2135e7bb051c13f5b43023cb'),
(32, 'rice.benny', 'johnson00@example.net', 'f454cf8c20e1a11fdf02e6d5b9c3963042b8d1d58370fbf928023d0310915c11'),
(33, 'schaden.lionel', 'nleffler@example.net', 'a5c61a1ca48c14d58a1791c854e2aff88509ba969de3eb519f0c4f0e27af4578'),
(34, 'nader.german', 'jerde.marina@example.org', 'eb6f54341f74be0bb1c90fe81995e8c913b3f40e01d6dc996cc35be6344cc882'),
(35, 'tking', 'rae01@example.net', 'fa1cb1a79e1013c41e1fb4b84e7880e2ccfd6ee5fd51e0aa77d851c31cf31634'),
(36, 'terrence90', 'kaley.goodwin@example.org', '83a4ce23447a1e4aefbb62439678a994aa632af1f8d30b3276581dd016dea0ea'),
(37, 'vdicki', 'ardith.hansen@example.com', '2d0375be9ce5d5a86b57b4dee357e31da077c4df61b4d44b155721b6a02dfe11'),
(38, 'skiles.emily', 'ukiehn@example.com', '6abc2936991550f1c6529f18f9dbd85caa2afb145a469a463079c54c61504663'),
(39, 'raul.johns', 'deja08@example.org', '1e7959fb91635afaf0cf4eb76dda98a9ed63a1df3cbf72c266bf066f46fc3983'),
(40, 'kiehn.mariah', 'lauren.pfannerstill@example.org', 'a041d2fa2c9f0a217a3829b3304aa8ba6c452fdd3fb7592cc4f5e17d336017a4'),
(41, 'padberg.jacey', 'sonya89@example.com', '7708d0e78b48ae5c395c595f9f0357ff4c8846b99888f146c30d4c09e6725274'),
(42, 'laurie91', 'hdietrich@example.net', 'fdb5ae7ac47e2a02134106b6f385593393c681fd4281d79f20f412ce877caecd'),
(43, 'conner11', 'lauretta10@example.net', '7a7e6d870ed51b5604df4c790916f4e7712be399d01258dc757e48b5d948e093'),
(44, 'assunta70', 'glover.delphia@example.net', 'e5ddf7803d5e4a459d7d8925a39dcd1df6cdf9c59585e872426a726be6e87ba1'),
(45, 'keshawn09', 'penelope.kunze@example.com', 'd42a27f558f915c67f51a4abf9040a30b924acbeaabf83afe794a23593412e9d'),
(46, 'marge29', 'pierre.gorczany@example.net', '2b1cdc2272e47c898455e3d67bd4457345e9bb3f6b8f4425b71cb1590730e685'),
(47, 'donnie62', 'blick.chanel@example.com', 'dc7746e547261a232c77f4227fc174937117e969f4ff35670ac3585bb93c8093'),
(48, 'schmeler.claudine', 'roman.kling@example.com', '56cd0055231a9aa8c70d9847325a1eb1dcc8490a5d94bb9b7a55dfad9f4f8b22'),
(49, 'uledner', 'crooks.yasmine@example.com', '8b7d583743718d264ae62fd5e17f79dd64785f40a2e6f18bb33a69a21c926f03'),
(50, 'luettgen.juanita', 'myles.daugherty@example.com', 'b5a045c24567834e4eeaa58616bfc1cec610ce49d7659b34851a51aa043f5de9');

-- --------------------------------------------------------

--
-- Table structure for table `asesor`
--

CREATE TABLE `asesor` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` char(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `biodata_asesi`
--

CREATE TABLE `biodata_asesi` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nim` int(11) NOT NULL,
  `no_telepon` varchar(20) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `pendidikan_terakhir` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `biodata_asesi`
--

INSERT INTO `biodata_asesi` (`id`, `nama`, `nim`, `no_telepon`, `alamat`, `pendidikan_terakhir`) VALUES
(1, 'Angelina Friesen', 603196, '712-131-5436', '77031 Mohr Camp Suite 369\nParkerhaven, ND 46396', '1'),
(2, 'Mr. Jarrod Waters IV', 31152233, '(764)710-4634', '21443 Cartwright Extension Suite 700\nLake Alessandraview, MT 45013', '7'),
(3, 'Helen Boyer', 8060, '(279)523-6072x3087', '39785 Dana Walk Apt. 035\nIrmaberg, ND 02402', '3'),
(4, 'Dr. Skylar McLaughlin', 388327178, '705.211.3307', '62945 Parker Roads Apt. 206\nAbernathyfurt, OH 83121', '2'),
(5, 'Damion Torphy', 0, '1-669-405-0802x3024', '3019 Charles Tunnel Apt. 329\nDachmouth, IN 73457-3607', '5'),
(6, 'Vivianne Rohan', 58109, '(973)646-5734x92250', '68210 Liana Union Apt. 395\nNorth Nellebury, MT 42881-9680', '8'),
(7, 'Emile Shanahan DVM', 3319, '123-358-9374', '2531 Tremblay Parkways\nOsinskiberg, LA 04098-8060', '2'),
(8, 'King Herzog', 9459, '1-610-680-1552x34373', '5277 Haley Run\nConroyburgh, OR 96230-5844', '1'),
(9, 'Blanche Prohaska', 2204, '(074)143-4802x461', '035 Wolff Mills Suite 882\nMcCulloughstad, IL 33818', '3'),
(10, 'Richie Rutherford', 90940, '937-264-7135x09715', '01424 Randall Square\nLavadaberg, MO 56028-9753', '8'),
(11, 'Dr. Kian Nicolas', 0, '+12(0)1400835338', '254 Hansen Road\nBridgetview, AK 73369-9915', '2'),
(12, 'Karianne Swift', 78422258, '02988489929', '36142 Elmore Canyon Apt. 860\nDachmouth, IN 48420-0056', '7'),
(13, 'Miss Chasity Rosenbaum Sr.', 39345418, '09575497563', '264 Talon Brooks Suite 903\nSouth Mabellebury, CO 71444', '5'),
(14, 'Libbie Wolff', 469, '289.349.0940', '21307 Frida Islands\nEast Lorenzoside, NM 29606', '3'),
(15, 'Prof. Holden Bartoletti', 4454907, '1-100-908-7976', '69779 Hermiston Park Suite 049\nNorth Lukaston, DE 70489', '6'),
(16, 'Tony Bauch', 341, '(335)498-4231x51874', '3597 Bruen Crescent\nEvangelineside, DE 59678-5419', '1'),
(17, 'Mrs. Tressie Medhurst', 338287722, '044.324.4301x93243', '833 Vandervort Junction\nCormierton, WI 38996', '5'),
(18, 'Prof. Quinton Mann I', 34, '(000)543-0373', '2178 Durgan Extensions Apt. 675\nEast Cliftonton, LA 52279-9392', '8'),
(19, 'Prof. Amya Hintz DDS', 370090, '02377248876', '19625 Celia Isle Apt. 437\nNew Vesta, ND 99908-9032', '3'),
(20, 'Gay Reinger', 20897814, '469.509.2804x762', '65884 Trycia Valley\nPort Sanfordland, MD 46936', '7'),
(21, 'Kadin Hermiston III', 595088467, '(564)869-4309', '29461 Icie Spurs\nLake Marilynestad, LA 29428-6006', '5'),
(22, 'Lisandro Howell', 9748980, '724-843-8797', '9766 Maggio Points\nPort Kendall, NJ 92868', '3'),
(23, 'Hayley Haag', 619963741, '091.501.7857x797', '95883 Kacey Mission Apt. 393\nArvelshire, IA 56330-3790', '6'),
(24, 'Prof. Russ Bailey PhD', 887889657, '877.795.6265x4769', '058 Oceane Spring\nAddisonshire, MT 89182-8603', '3'),
(25, 'Larue Collier', 7291577, '643.911.7593x51733', '05839 Skyla Radial Apt. 902\nLeonechester, WI 99314', '7'),
(26, 'Jamel Gislason', 751638, '1-645-514-9111x3948', '275 Stacy Roads\nEdgarchester, WY 62064-3740', '8'),
(27, 'Mrs. Hellen Stoltenberg II', 98197240, '433-894-6288x632', '3807 Nader Field\nGrimesville, DE 33449', '4'),
(28, 'Efrain Reilly', 33727774, '954.275.9078x1815', '2745 Rohan Well Apt. 790\nMozelleview, RI 69732', '4'),
(29, 'Hazle Walsh', 0, '(475)248-9770x51018', '0881 Aglae Squares\nNew Ulises, DE 71993', '5'),
(30, 'Linda Kautzer', 9680, '(066)670-4441x172', '037 Nicole Groves Suite 849\nKesslerport, ND 68961', '3'),
(31, 'Domenick Abbott', 445024, '(051)757-7690x088', '415 Leta Mills\nNew Sammie, IN 68722', '6'),
(32, 'Camden Murray Sr.', 12905, '(580)065-3076x636', '09822 Reynolds Pine\nPort Rodrigoburgh, PA 28666', '7'),
(33, 'Rosie Lubowitz DVM', 60981313, '747-704-2306x730', '209 Merl Vista\nLake Florida, OK 78351', '5'),
(34, 'Prof. Hulda Cummings Sr.', 69072, '+51(9)9307440107', '8536 Stokes Shore Suite 086\nEast Maddison, NV 53361', '2'),
(35, 'Jordy Blick', 78, '(980)761-4943', '9561 Antone Mountain Suite 815\nNew Fatimaview, ME 27946-9822', '1'),
(36, 'Prof. Santina Keeling IV', 0, '718.178.2731', '68975 Hermiston Island\nSouth Albertha, WV 58628-2371', '5'),
(37, 'Darwin Reinger', 0, '1-763-084-1640x88333', '39640 Omer Lodge Suite 451\nTellyborough, MS 21313', '7'),
(38, 'Samantha Abernathy', 149, '1-450-805-4237x40377', '236 Pacocha Harbors\nKingmouth, AL 99823', '4'),
(39, 'Mr. King Zieme III', 7742652, '042.983.1358x24244', '627 Wisoky Square Apt. 900\nHallieside, CA 41246-7872', '4'),
(40, 'Haskell Reynolds', 794792, '086.488.8390x96893', '1658 Braulio Extension Suite 295\nOndrickaside, AK 70190-1212', '5'),
(41, 'Skyla Russel', 852260, '1-867-124-1855x387', '508 Cronin Burg\nWest Jeramiemouth, AZ 30440', '8'),
(42, 'Kyle Dooley', 56570806, '566.565.7799x81577', '01320 Rossie Turnpike Suite 471\nPort Angelicamouth, IA 08808', '4'),
(43, 'Berniece Lesch', 3, '1-220-977-9175x91605', '8102 Aurelio Roads\nNew Kitty, AK 29389-9515', '8'),
(44, 'Alanis Quigley', 74821326, '(781)168-3566', '279 Rickie Row Suite 740\nEast Kevenborough, WV 74734', '8'),
(45, 'Isabell Braun', 611969500, '(711)495-1879x1082', '62382 Sylvia Throughway Suite 806\nAntoninafurt, SC 08125-8664', '3'),
(46, 'Jermain Prohaska', 408, '1-218-567-7780x469', '979 Bridgette Trail\nLake Rickey, CO 83681-0841', '8'),
(47, 'Antwan Hamill', 9, '300.939.5379x912', '85345 Malcolm Glens Apt. 132\nChandlerside, SD 64106-5351', '1'),
(48, 'Trever Wilderman', 119, '160-946-4612x231', '85062 Ted Pine Apt. 049\nLazaromouth, IA 03498', '5'),
(49, 'Nolan Schiller', 796, '(538)223-0170x24557', '11870 Eli Turnpike\nRempelside, MS 08403', '8'),
(50, 'Miss Winnifred Wiegand', 6114, '156-467-3717x039', '9953 Anderson Unions\nSouth Zolamouth, WA 53361', '9');

-- --------------------------------------------------------

--
-- Table structure for table `biodata_asesor`
--

CREATE TABLE `biodata_asesor` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
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

INSERT INTO `biodata_asesor` (`id`, `nama`, `nip`, `no_telepon`, `nik`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `pendidikan_terakhir`) VALUES
(1, 'Mavis Hamill', '129501301934942604', '1-261-839-8956x139', '3654844365082681', 'Suite 508', '2000-05-13', '176 Marty Hills Suite 119\nLake Celia, OR 45264', ' d4'),
(2, 'Mabel Ryan', '100185575848445296', '+05(8)1055907048', '3963091949466616', 'Apt. 873', '1981-07-21', '3781 Lorenzo Extensions\nOkunevaside, TN 32903', ' sma'),
(3, 'Brooks Hirthe', '170522559434175488', '161-358-2112x5929', '3895342235919088', 'Apt. 545', '1983-05-30', '297 O\'Keefe Prairie\nAllietown, MN 06960-7594', ' smp'),
(4, 'Gilbert Maggio', '193346344493329520', '04901603586', '3970906001282856', 'Apt. 811', '1974-11-22', '2940 Becker Trafficway Apt. 683\nSouth Alexandro, MN 13544-9552', ' smp'),
(5, 'Gilbert Deckow', '168456686381250616', '(793)956-2527', '3669538227608427', 'Suite 680', '1970-12-26', '7595 Brook Rapid Suite 687\nSouth Alfreda, AR 87322', ' d4'),
(6, 'Scotty Bruen', '198316235886886720', '1-873-605-3673', '3902034688508138', 'Suite 759', '1976-07-31', '554 Emard Crossroad Suite 128\nPort Sigmund, AL 00725-0344', ' d3'),
(7, 'Florine Gislason', '105541795352473855', '(918)330-2684x25702', '3782835075166077', 'Suite 201', '1977-12-31', '848 Wuckert Forks\nQuitzonfort, WI 00745', ' d4'),
(8, 'Prof. Neal Lesch', '131430605100467800', '+98(7)1826441814', '3713609973900020', 'Suite 228', '1978-06-21', '106 Tyson Trail Apt. 751\nSouth Araceliberg, OH 21540', ' s2'),
(9, 'Freeda Stanton III', '135466175386682152', '(928)548-2221x0015', '3547564543085172', 'Suite 994', '2013-08-21', '15281 Maximus Land\nSouth Stanford, MI 81761', ' s1'),
(10, 'Winifred Hilpert', '108273440087214112', '1-399-883-1114x262', '3669099253835156', 'Suite 923', '1981-03-15', '412 Lockman Fords Suite 571\nMurrayview, FL 38150-4662', 'sd'),
(11, 'Harold Walter', '166802866663783792', '1-201-662-4991', '3727931997971609', 'Suite 697', '1982-01-07', '65369 Willms Ville Suite 832\nNorth Harry, CA 69107-4479', ' d4'),
(12, 'Eugene Kutch', '140643592504784464', '1-574-027-7112x847', '3535704107256606', 'Apt. 087', '1995-06-29', '689 Sanford Falls Apt. 957\nPreciousland, MS 95750', ' s1'),
(13, 'Orville Smith', '186581065645441408', '649-740-4314', '3851184366736561', 'Suite 450', '2018-05-10', '4842 Van Ferry Suite 607\nNew Tyriquetown, NE 83210-4026', ' s2'),
(14, 'Joe Wyman DVM', '154634852660819888', '061-188-4901x41410', '3953267939621583', 'Suite 011', '1995-06-18', '07680 Shanahan Hollow Suite 969\nSouth Samirview, MT 07087', ' smp'),
(15, 'Enos Windler', '165150455432012680', '07274959290', '3568057440686971', 'Apt. 330', '2007-02-25', '1278 Orn Place Suite 887\nStrackeshire, CT 12871-9091', 'sd'),
(16, 'Nels Koch', '195857730461284512', '09900502640', '3936503416625783', 'Suite 874', '1992-05-29', '356 Koss Ports\nRaleighland, CA 58491', ' s3'),
(17, 'Caroline Greenholt', '141221022140234712', '440-000-9007x85342', '3633834657957777', 'Apt. 993', '2018-03-05', '78611 Cyrus Plain\nNorth Isadoreborough, RI 28766', ' s2'),
(18, 'Prof. Brisa Robel', '160946208005771040', '519-756-7814x8292', '3612121232086792', 'Apt. 021', '1975-12-25', '48484 Collins Track Apt. 545\nSwaniawskichester, PA 74172', ' s3'),
(19, 'Mr. Derek McCullough', '159418515535071496', '1-486-675-4964x8679', '3657770285615697', 'Apt. 312', '2002-11-14', '3298 Unique Run\nSouth Eliseo, MD 99013-3814', ' s2'),
(20, 'Mrs. Krystina Abernathy', '141073595779016616', '513.340.4821x40839', '3854092663852498', 'Suite 842', '1984-08-24', '89682 Purdy Lane Apt. 928\nPort Francesberg, WV 93135', ' s1'),
(21, 'Marcelina Green', '194479997362941504', '155.113.8360x6757', '3538645492866635', 'Suite 210', '1997-02-17', '50599 Hintz Light\nLake Tavaresmouth, MA 72878', ' sma'),
(22, 'Elinor Bode', '100091487821191549', '450-997-2910x51351', '3935497557045892', 'Suite 575', '1997-06-02', '419 Nedra Viaduct Suite 333\nNorth Isaiah, NM 79170-5699', ' d4'),
(23, 'Wanda Bahringer', '165676223998889328', '1-792-764-0494x74829', '3542976851342246', 'Apt. 624', '2014-04-04', '814 Boyer Squares\nNorth Marlon, RI 39006', ' sma'),
(24, 'Dr. Jeremie Gleason MD', '131867627194151284', '851.772.7408', '3687608457636088', 'Suite 067', '1991-07-05', '3761 Jamar Squares\nShieldsshire, CO 71006-1664', ' s3'),
(25, 'Fleta Kreiger', '155156504036858680', '(275)775-1208', '3779892658581957', 'Suite 618', '2009-11-26', '642 Lockman Summit\nHeleneport, WA 06028-6666', ' smp'),
(26, 'Mrs. Chanelle Roberts MD', '106565735628828406', '(797)776-3509', '3817827163031325', 'Apt. 338', '2010-05-04', '25168 Wilderman Port Apt. 423\nPort Fanny, MD 06132-5442', ' s1'),
(27, 'Luz Weissnat', '143166276905685664', '1-749-375-0510x71752', '3650061096064746', 'Suite 730', '1972-04-30', '910 Myriam Plain\nKrisbury, OK 53515-7396', ' s3'),
(28, 'Gardner Schimmel', '180890213139355184', '216.120.2195x200', '3714456761721522', 'Suite 099', '1970-02-09', '6357 Gust Forge\nGusikowskifurt, LA 22179-2898', 'sd'),
(29, 'Carroll Adams', '134979236638173460', '(707)359-2071', '3594841291662305', 'Apt. 831', '2001-08-23', '976 King Loop Apt. 105\nPort Maynardshire, NE 62800', ' smp'),
(30, 'Kyler Schmeler', '100129679217934608', '822-910-9616x5562', '3668212105985731', 'Apt. 419', '1971-12-03', '011 Ona Stravenue Suite 043\nArmstrongbury, NM 60920-0195', ' s3'),
(31, 'Henry Bins', '151730566658079624', '822-296-1852x262', '3946303507080302', 'Suite 645', '1971-06-21', '16063 Adelia Point Apt. 936\nNorth Jordyville, TN 40916-9581', ' smp'),
(32, 'Ms. Lenore Gutmann', '181765102874487632', '852-027-7053x34251', '3605833599343896', 'Apt. 970', '1981-09-16', '9717 Turner Forks Apt. 225\nLake Domenickfurt, VT 46787', ' smp'),
(33, 'Torrey Rutherford MD', '171899778582155704', '703-685-6697x691', '3556944880168885', 'Suite 671', '2013-01-02', '3383 Johns Rest Suite 665\nAlberthaburgh, OR 47879', ' d4'),
(34, 'Mallie Okuneva', '169754403689876200', '395.853.1479x371', '3530603815568611', 'Apt. 282', '2004-10-26', '501 Harris Ferry Suite 154\nTrevorhaven, ID 15215', ' s2'),
(35, 'Dr. Noemi Bashirian', '168643929297104480', '+78(9)5339391828', '3642688752384856', 'Apt. 444', '1978-03-09', '7612 Garland Summit\nCartwrightshire, HI 32516-7253', ' s1'),
(36, 'Aubree Brekke MD', '168446330865845088', '+38(6)6230723489', '3903200054308400', 'Suite 154', '1979-10-30', '27754 McCullough Stream Apt. 093\nRosenbaumfurt, KS 55910-3128', ' s3'),
(37, 'Jaida Russel I', '182546816160902384', '1-137-801-0981x922', '3524247147841379', 'Apt. 341', '2015-10-03', '20539 Runolfsson Hills Suite 055\nPort Noelia, NY 81545-7704', ' s3'),
(38, 'Jane Lesch', '172173495916649696', '111-951-5943x6675', '3793440586188808', 'Apt. 676', '2022-04-29', '399 Ali Harbor\nPort Modesta, DC 33806-7185', ' d4'),
(39, 'Gaylord Kutch', '185258828522637488', '+09(7)4312207253', '3635773105546832', 'Suite 263', '1994-12-05', '11307 Mustafa Falls\nShanelstad, CA 79932', ' s3'),
(40, 'Miss Shaylee Goldner V', '100068784086033701', '203-561-5479', '3981531406054274', 'Suite 577', '1999-11-06', '217 Armand Pines\nNorth Flavioshire, DC 02871-4067', ' sma'),
(41, 'Joana Bode', '105413125827908516', '1-967-973-8499x111', '3746992882806808', 'Apt. 248', '2004-06-16', '42942 Green Ferry Apt. 206\nNew German, TN 86114', ' sma'),
(42, 'Arvel Windler III', '107302882429212332', '1-497-303-7068x78307', '3773819198366255', 'Apt. 411', '1986-03-01', '63968 Wehner Avenue\nVolkmanfort, CT 50583', ' sma'),
(43, 'Prof. Leif Ernser', '106419982248917222', '(290)707-9345', '3980836118804291', 'Apt. 806', '1995-11-03', '3086 Elmer Spurs Suite 369\nNorth Jacklynton, HI 38740-5796', ' s2'),
(44, 'Domenic Kautzer', '141095176571980120', '355-075-2021', '3811570351477713', 'Apt. 490', '2004-07-10', '666 Doug Lodge\nNew Howell, AZ 69945-0984', ' s3'),
(45, 'Prof. Hal Tremblay', '158870163420215248', '828-402-4569', '3605037625646218', 'Suite 368', '1973-08-16', '26547 Powlowski Green\nMooreborough, ME 23832-7681', ' d4'),
(46, 'Mr. Keyshawn Ziemann', '131845371890813112', '885.925.9125x95377', '3629533029859885', 'Suite 296', '2015-05-20', '3947 Lebsack Cape Suite 348\nPort Kipfurt, WA 12172', ' d4'),
(47, 'Ella O\'Conner', '183394823316484688', '(106)316-5923x2232', '3627006909111514', 'Suite 462', '2003-10-05', '76292 Burley Turnpike Apt. 329\nBruenville, KY 63101', ' d3'),
(48, 'Edmond Reichert DVM', '106010434171184897', '+91(4)6550177377', '3586927716387435', 'Suite 043', '2003-11-02', '6655 Nat Lake\nSouth Venamouth, ND 30667-5326', ' s1'),
(49, 'Maximilian Thiel', '141139851696789264', '(401)716-4047x663', '3954656640300528', 'Apt. 899', '1994-09-13', '336 Gerda Village\nHoythaven, WV 28701-3503', ' s1'),
(50, 'Mr. Mohammad Bailey', '183938752207905056', '+33(6)6564292782', '3957812644075603', 'Apt. 707', '1973-11-20', '68335 Keaton Dale Suite 484\nNorth Connie, OH 70164-6124', ' s2');

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `id` int(11) NOT NULL,
  `nama` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `prodi`
--

CREATE TABLE `prodi` (
  `id` int(11) NOT NULL,
  `nama` int(11) NOT NULL,
  `id_jurusan` int(11) NOT NULL
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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `asesor`
--
ALTER TABLE `asesor`
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
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `asesor`
--
ALTER TABLE `asesor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prodi`
--
ALTER TABLE `prodi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `unreg_admin`
--
ALTER TABLE `unreg_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
