-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 18 Jul 2017 pada 05.39
-- Versi Server: 5.6.35
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fstunair_snma`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `idkategori` int(11) NOT NULL,
  `nmkategori` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`idkategori`, `nmkategori`) VALUES
(1, 'Analisis dan Aljabar'),
(2, 'Matematika Terapan'),
(3, 'Statistika'),
(4, 'Sistem Informasi'),
(5, 'Pendidikan Matematika');

-- --------------------------------------------------------

--
-- Struktur dari tabel `makalah`
--

CREATE TABLE `makalah` (
  `iduser` varchar(60) NOT NULL,
  `thnsnma` int(4) NOT NULL,
  `abstraktext` longtext,
  `pesanabstrak` longtext,
  `fileabstrak` varchar(100) DEFAULT NULL,
  `filefull` varchar(100) DEFAULT NULL,
  `pesanfull` longtext,
  `judul` longtext,
  `keyword` varchar(100) DEFAULT NULL,
  `idkategori` int(11) DEFAULT NULL,
  `idmakalah` int(11) NOT NULL,
  `author1` varchar(60) DEFAULT NULL,
  `hadir1` int(1) DEFAULT '0',
  `author2` varchar(60) DEFAULT NULL,
  `hadir2` int(1) DEFAULT '0',
  `author3` varchar(60) DEFAULT NULL,
  `hadir3` int(1) DEFAULT '0',
  `author4` varchar(60) DEFAULT NULL,
  `hadir4` int(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `makalah`
--

INSERT INTO `makalah` (`iduser`, `thnsnma`, `abstraktext`, `pesanabstrak`, `fileabstrak`, `filefull`, `pesanfull`, `judul`, `keyword`, `idkategori`, `idmakalah`, `author1`, `hadir1`, `author2`, `hadir2`, `author3`, `hadir3`, `author4`, `hadir4`) VALUES
('a.mukhibin1@gmail.com', 2017, NULL, NULL, NULL, NULL, NULL, 'Melacak Nilai-nilai Pendidikan Karakter dalam Penyusunan Algoritma ', 'Pendidikan Karakter, Teknologi, Algoritma ', 5, 24, 'Ahmad Mukhibin ', 1, '', 1, '', 1, '', 1),
('edi_winarko@yahoo.com', 2017, NULL, NULL, '', '', NULL, 'Rancang Bangun Pembangkit Soal Matematika Berbasis WEB', 'Pemangkit, Soal, Bank Soal, Matematika, SMA', 4, 30, 'Drs. Edi Winarko', 1, '', 1, '', 1, '', 1),
('endrikmifta16@gmail.com', 2017, NULL, NULL, NULL, NULL, NULL, 'ANALISIS MODEL MATEMATIKA PENYEBARAN PENYAKIT HIV DAN AIDS PADA POPULASI HETEROSEKSUAL', 'HIV, AIDS, Basic Reproduction Number, Titik Setimbang, Kestabilan, Simulasi Numerik', 2, 10, 'Endrik Mifta Shaiful', 1, 'Angga Setiawan', 1, '', 1, '', 1),
('fatma47unair@gmail.com', 2017, NULL, NULL, NULL, NULL, NULL, 'Model Matematika Penyebaran HIV pada populasi yang heterogen', 'Model matematika; HIV; Titik setimbang; Kestabilan', 2, 17, 'Fatmawati', 1, 'Endrik Mifta Shaiful', 1, '', 1, '', 1),
('fm.fariz@yahoo.com', 2017, NULL, NULL, NULL, NULL, NULL, 'Model Regresi Nonparametrik Multivariabelberdasarkan Estimator Deret Cosinus dan SinusFourier untuk Tingkat Kemiskinan di Jawa Timur', 'Regresi Nonparametrik, Deret Fourier, Tingkat Kemiskinan, Jawa Timur', 3, 21, 'M. Fariz Fadillah Mardianto', 1, 'Sri Haryatmi Kartiko', 1, 'Herni Utami', 1, 'I Nyoman Budiantara', 1),
('ibnurafi789@gmail.com', 2017, NULL, NULL, NULL, NULL, NULL, '', '', 0, 13, '', 1, '', 1, '', 1, '', 1),
('kamsyakawuni@gmail.com', 2017, NULL, NULL, NULL, NULL, NULL, 'Penerapan Algoritma Modified Variable Neighborhood Search (MVNS)pada Multi Knapsack 0-1 Problem with Multiple Constraints', 'Modified Variable Neighborhood Search, Multi Knapsack 0-1 Problem with Multiple Constraints', 2, 22, 'R.J. Mega Putri', 1, 'M. Ziaul Arif', 1, '', 1, '', 1),
('kamsyakawuni@gmail.com', 2017, NULL, NULL, NULL, NULL, NULL, 'Penerapan Algoritma Modified Variable Neighborhood Search (MVNS)pada Multi Knapsack 0-1 Problem with Multiple Constraints', 'Modified Variable Neighborhood Search, Multi Knapsack 0-1 Problem with Multiple Constraints', 2, 23, 'R.J. Mega Putri', 1, 'M.Ziaul Arif', 1, '', 1, '', 1),
('lamisuhamid@yahoo.co.id', 2017, NULL, NULL, NULL, NULL, NULL, 'Profil Metakognisi Mahasiswa Matematika dan Pendidikan Matematika dalam Memahami Konsep Kalkulus Integral ', 'Profil Metakognisi, Konsep Kalkulus Integral', 5, 8, 'La Misu', 1, '', 1, '', 1, '', 1),
('marisa_rifada@yahoo.com', 2017, NULL, NULL, NULL, NULL, NULL, '', '', 0, 26, '', 1, '', 1, '', 1, '', 1),
('marisa_rifada@yahoo.com', 2017, NULL, NULL, NULL, NULL, NULL, '', '', 0, 27, '', 1, '', 1, '', 1, '', 1),
('medqashlim@gmail.com', 2017, NULL, NULL, NULL, NULL, NULL, 'Sistem Integrasi Pendistribusian Obat Pada Instalasi Farmasi Berbasis Supply Chain Managemen', 'Integrasi Sistem, Instalasi Farmasi, Supply Chain Management.', 4, 28, 'Akhmad Qashlim', 1, 'Basri', 1, '', 1, '', 1),
('mr.iyes@yahoo.co.id', 2017, NULL, NULL, NULL, NULL, NULL, 'CASE BASED REASONING UNTUK MENENTUKAN KELOMPOK UKT (Studi Universitas Sembilanbelas November Kolaka)', 'CBR, UKT', 4, 9, 'Muh. Nurtanzis Sutoyo', 1, 'Andi Tenri Sumpala', 1, '', 1, '', 1),
('nurhamidah1408@gmail.com', 2017, NULL, NULL, NULL, NULL, NULL, 'PENGARUH KETERLIBATAN IBU DALAM PEMBELAJARAN MATEMATIKA ANAK USIA DINI DENGAN MEDIA SCRAPMATIK', 'anak usia dini, scrapmatik, pola pikir', 5, 25, 'NUR AINI', 1, 'RISMA RINTIAS SAPUTRI', 1, 'ELOK RAHMAWATI', 1, '', 1),
('rahmawatien.srf@unipasby.ac.id', 2017, NULL, NULL, NULL, NULL, NULL, 'Clustering Menggunakan K-Means Algorithm untuk Menentukan Kelompok Minat Belajar Mahasiswa (Studi Kasus: Program Studi Pendidikan Matematika di Universitas PGRI Adi Buana Surabaya)', 'clustering, k-means, minat belajar', 5, 19, 'Sri Rahmawati Fitriatien, S.Pd., M.Si.', 1, '', 1, '', 1, '', 1),
('trias.nyta@gmail.com', 2017, NULL, NULL, NULL, NULL, NULL, 'Pemodelan dan Pemetaan Faktor Unmet Need KB di Jawa Timur sebagai Perencanaan Mencegah Ledakan Penduduk dengan Regresi Logistik Biner', 'Analisis Klaster, Pemetaan Daerah, Regresi Logistik Biner, Unmet Need KB', 3, 11, 'Anita Trias Anggraeni,S.Si', 1, 'Dra Destri Susilaningrum, M.Si', 1, '', 1, '', 1),
('trias.nyta@gmail.com', 2017, NULL, NULL, NULL, NULL, NULL, 'Pemodelan dan Pemetaan Faktor Unmet Need KB di Jawa Timur sebagai Perencanaan Mencegah Ledakan Penduduk dengan Regresi Logistik Biner', 'Analisis Klaster, Pemetaan Daerah, Regresi Logistik Biner, Unmet Need KB', 3, 12, 'Anita Trias Anggraeni,S.Si', 1, 'Dra Destri Susilaningrum, M.Si', 1, '', 1, '', 1),
('vyaoktaviyani@gmail.com', 2017, NULL, NULL, NULL, NULL, NULL, 'Penerapan Algoritma Apriori untuk Transaksi Penjualan Obat pada Apotek Azka', 'Algoritma Apriori, Association Rule, Data Mining, Transaksi Penjualan', 2, 20, 'Winda Aprianti', 1, 'Jaka Permadi', 1, 'Oktaviyani', 1, '', 1),
('winda.ap17@gmail.com', 2017, NULL, NULL, NULL, NULL, NULL, 'Analisa Indikator Kemiskinan di Kabupaten Tanah Laut menggunakan Association Rules dengan Algoritma Apriori', 'Association Rules, Algoritma Apriori, Indikator, Kemiskinan', 2, 14, 'Winda Aprianti', 1, 'Khairul Anwar Hafizd', 1, 'M. Redhy Rizani', 1, '', 1),
('winda.ap17@gmail.com', 2017, NULL, NULL, NULL, NULL, NULL, 'Analisa Indikator Kemiskinan di Kabupaten Tanah Laut menggunakan Association Rules dengan Algoritma Apriori', 'Association Rules, Algoritma Apriori, Indikator, Kemiskinan', 2, 15, 'Winda Aprianti', 1, 'Khairul Anwar Hafizd', 1, 'M. Redhy Rizani', 1, '', 1),
('zetta0606@gmail.com', 2017, NULL, NULL, NULL, NULL, NULL, 'coba dulu', 'coba ah', 4, 18, '', 1, '', 1, '', 1, '', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `otoritas`
--

CREATE TABLE `otoritas` (
  `idoto` int(3) NOT NULL,
  `nmoto` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `otoritas`
--

INSERT INTO `otoritas` (`idoto`, `nmoto`) VALUES
(0, 'ADMIN'),
(1, 'PESERTA'),
(2, 'REVIEWER');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peserta`
--

CREATE TABLE `peserta` (
  `iduser` varchar(60) NOT NULL,
  `thnsnma` int(4) NOT NULL,
  `statusbayar` int(1) DEFAULT NULL,
  `statuspeserta` int(1) DEFAULT NULL,
  `tglbayar` date DEFAULT NULL,
  `filebayar` varbinary(100) DEFAULT NULL,
  `ketbayar` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `peserta`
--

INSERT INTO `peserta` (`iduser`, `thnsnma`, `statusbayar`, `statuspeserta`, `tglbayar`, `filebayar`, `ketbayar`) VALUES
('a.mukhibin1@gmail.com', 2017, 0, 0, NULL, NULL, ''),
('abdjae@gmail.com', 2017, 0, 1, NULL, NULL, ''),
('edi_winarko@yahoo.com', 2017, 0, 0, NULL, NULL, ''),
('endrikmifta16@gmail.com', 2017, 0, 0, NULL, NULL, ''),
('fatma47unair@gmail.com', 2017, 0, 0, NULL, NULL, ''),
('fm.fariz@yahoo.com', 2017, 0, 0, NULL, NULL, ''),
('ibnurafi789@gmail.com', 2017, 0, 0, NULL, NULL, ''),
('kamsyakawuni@gmail.com', 2017, 0, 0, NULL, NULL, ''),
('khoni_84@yahoo.com', 2017, 0, 1, NULL, NULL, ''),
('lamisuhamid@yahoo.co.id', 2017, 0, 0, NULL, NULL, ''),
('marisa_rifada@yahoo.com', 2017, 0, 0, NULL, NULL, ''),
('medqashlim@gmail.com', 2017, 0, 0, NULL, NULL, ''),
('mr.iyes@yahoo.co.id', 2017, 1, 0, NULL, 0x3232323830353942756b74692050656d6261796172616e2e4a5047, ''),
('nurhamidah1408@gmail.com', 2017, 0, 0, NULL, NULL, ''),
('rahmawatien.srf@unipasby.ac.id', 2017, 0, 0, NULL, NULL, ''),
('trias.nyta@gmail.com', 2017, 0, 0, NULL, NULL, ''),
('vyaoktaviyani@gmail.com', 2017, 0, 0, NULL, NULL, ''),
('winda.ap17@gmail.com', 2017, 0, 0, NULL, NULL, ''),
('zetta0606@gmail.com', 2017, 0, 0, NULL, NULL, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `Reviewer`
--

CREATE TABLE `Reviewer` (
  `idreviewer` int(5) NOT NULL,
  `nmreviewer` varchar(60) NOT NULL,
  `emailreviewer` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `thnsnma`
--

CREATE TABLE `thnsnma` (
  `thnsnma` int(4) NOT NULL,
  `logosnma` varchar(60) DEFAULT NULL,
  `temasnma` varbinary(100) DEFAULT NULL,
  `tglsnma` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `thnsnma`
--

INSERT INTO `thnsnma` (`thnsnma`, `logosnma`, `temasnma`, `tglsnma`) VALUES
(2017, 'snma2017.png', 0x506572616e616e204d6174656d6174696b612064616e2053697374656d20496e666f726d6173690d0a64692045726120426967204461746120756e74756b204d656e756e6a616e67205065726b656d62616e67616e20497074656b20646920496e646f6e, 'Surabaya, 21 Oktober 2017');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `iduser` varchar(60) NOT NULL,
  `nmuser` varchar(100) DEFAULT NULL,
  `instansi` varchar(100) DEFAULT NULL,
  `hp` varchar(30) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `idoto` int(3) DEFAULT NULL,
  `passworda` varchar(30) DEFAULT NULL,
  `passworde` varchar(60) DEFAULT NULL,
  `tgldaftar` date DEFAULT NULL,
  `status` char(1) DEFAULT NULL,
  `verified` int(11) NOT NULL,
  `emaile` varchar(60) NOT NULL,
  `kirimveri` int(5) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`iduser`, `nmuser`, `instansi`, `hp`, `email`, `idoto`, `passworda`, `passworde`, `tgldaftar`, `status`, `verified`, `emaile`, `kirimveri`) VALUES
('a.mukhibin1@gmail.com', 'Ahmad Mukhibin ', 'Institut Agama Islam Negeri Salatiga ', '085777543256', NULL, 1, 'kiringan94', 'f8e7873d022430cd9a1f5b6aa4938772', '2017-07-05', 'M', 1, '0f850fca1dcac5f3f067aeeb31524273', 0),
('abdjae@gmail.com', 'jae', 'jae', '085852136447', NULL, 1, '123456789', '25f9e794323b453885f5181f1b624d0b', '2017-04-07', 'D', 1, '54845f6a5ef12010d9e637cc092e51b5', 0),
('abialmusthafa@yahoo.com', 'Syaharuddin, S.Pd., M.Si', 'Universitas Muhammadiyah Mataram', '087864003847', NULL, 1, '1144db', '241f4cfe11153f3b752453e8494cf40e', '2017-07-04', 'D', 0, '2b717eabf9ca3d6de4d1c03e7d6ce014', 2),
('admin@yahoo.com', 'ADMIN SNMA2017', NULL, '088888888881', NULL, 0, 'Adm1nku', 'f40bc07bf1a75bc430ff1e40f9c912b1', NULL, NULL, 1, '3325b3371681e9381a2c8610f34aaae7', 0),
('aisyahsyahai@gmail.com', 'Siti Nur Aisyah', 'Politeknik Negeri Tanah Laut', '082150348785', NULL, 1, 'aisyah25', 'e6a74234e8ea295dc12ce6a90511d338', '2017-07-13', 'M', 1, 'e966cebc9ce6a9fdcd89e01148c55f8e', 0),
('andreasronywijaya@gmail.com', 'Andreas Rony Wijaya', 'Universitas Sebelas Maret', '085725554093', NULL, 1, 'andRONYjayMU5', '55af29fa3e92a9ec6ddafdfaaf913cf7', '2017-07-15', 'M', 1, '3a42d186ee311ba3a38930737800583a', 0),
('anna.nj20@gmail.com', 'Nur Jannah', 'Universitas PGRI Adi Buana Surabaya', '085785447447', NULL, 1, 'alfasala', '917bedb24d2247112118b2ff98c99cb8', '2017-06-19', 'M', 1, 'b2e954668117d6e6c513eebe634857bc', 3),
('asmunin@unesa.ac.id', 'Asmunin, S.Kom., M.Kom', 'Universitas Negeri Surabaya', '085732587200', NULL, 1, 'bidadariku01', '1d0c42de096832fdc66ead95167a2878', '2017-07-11', 'D', 1, '045c742d2b8ecd3afa6c7c6820d85ff9', 1),
('asubhanp@untirta.ac.id', 'Aan Subhan Pamungkas, M.Pd.', 'Pendidikan Matematika FKIP Universitas Sultan Ageng Tirtayasa', '085939932121', NULL, 1, 'ihsanudin', '1af5aedb6e2659cb30b63e4db3eeca8e', '2017-07-05', '', 1, '0a0edca39cbd6b3428bbd25e8d858317', 0),
('attin.warmi@yahoo.com', 'Attin Warmi, M.Pd', 'Universitas Singaperbangsa Karawang', '08111222979', NULL, 1, 'Telkomsel28', '5d1537b95180a7f312d7cf201977fec8', '2017-06-06', 'D', 1, '430a2c8fa8c6b56eeb5dbece374e7720', 0),
('badruszaman@fst.unair.ac.id', 'Badrus Zaman', 'Universitas Airlangga', '085730141434', NULL, 1, 'Rahas1a', '740374bef9b9993e8b906a8e1313f7e2', '2017-07-07', 'D', 1, '7736f5c08f9174a7ce4640a7371d85a8', 2),
('chit.chicit@gmail.com', 'Siti Munadhiroh', 'Universitas PGRI Adi Buana Surabaya', '082230559557', NULL, 1, 'nadhiroh', 'ad8fe6d175639cbf173552900003c1bb', '2017-06-19', 'M', 1, '3f52e5447f3fd39a48f9c4136bbaa666', 1),
('dariani_m@yahoo.com', 'Dariani Matualage, S.Si, M.Si', 'Universitas Papua', '081282153435', NULL, 1, 'dariani', 'ed9a4afe82cdcf3ec7dda86acc954771', '2017-07-17', 'D', 0, 'aef8c4f13d17d0874ed25c75ec9fc818', 0),
('davod_ebady@yahoo.com', 'Davod ebadi', '', '', NULL, 1, '10809144062802', 'dda1e3309512880c6df4ae59e3d8adff', '2017-07-16', 'M', 1, '37d274cbc3ee2ce240dddeb3c97f395a', 0),
('dnadityas@gmail.com', 'Dona Adityas', 'Institut Teknologi Sepuluh Nopember', '082231064728', NULL, 1, 'yusnadaasanurani', '902a375fa54e7ec00884cc17901e924b', '2017-07-12', 'M', 1, 'cf206f25b1610a62efbd55abc0d65713', 0),
('edi_winarko@yahoo.com', 'Drs. Edi Winarko, M.Cs.', 'fst-unair', '085648188001', NULL, 1, 'Edw1n', '152cc25f1e51dda431721ca2e0168358', '2017-04-06', 'D', 1, '424caf30cc9adff0478b0f7e152c9d03', 0),
('endrayanaputut29@gmail.com', 'Endrayana Putut Laksminto Emanuel, S.Si., M.Si.', 'Universitas Wijaya Kusuma Surabaya', '0816556844', NULL, 1, 'ekaputri', '406af5b4afcc2531133ed76fc5df0616', '2017-06-29', 'D', 1, '9511f425dd17217c4d1721b03de563ca', 1),
('endrikmifta16@gmail.com', 'Endrik Mifta Shaiful', 'Universitas Airlangga', '085230846247', NULL, 1, 'trembul@02', '6bffe79fdb7fac7433b4e06e5a25008e', '2017-05-12', 'M', 1, '634771df59300ad66ccf2bb4ccd95e90', 0),
('fatma47unair@gmail.com', 'Dr. Fatmawati, M.Si', 'Universitas Airlangga', '081357913543', NULL, 1, '35wati47', '12b38de9998bb5fa741952c2dd0d9581', '2017-04-04', 'D', 1, '29df2f6e722e89c7d8fc314d476c319e', 0),
('fm.fariz@yahoo.com', 'M. Fariz Fadillah Mardianto, S.Si, M.Si', 'Program Studi Statistika Departemen Matematika Universitas Airlangga', '081330733130', NULL, 1, 'farizfarizfariz', '575ecee1fbd2fb6e3cbdefcc2ce486fe', '2017-07-06', 'D', 1, 'f433208d357400296bafd8be6bf243e7', 0),
('herfasoewardini_fbs@uwks.ac.id', 'Herfa Maulina Dewi Soewardini, S.Si, M.Pd', 'Universitas Wijaya Kusuma Surabaya', '085855971961', NULL, 1, 'ZaumarGhania12', '48d270a2647465b0fd5d5e884876eaed', '2017-07-12', 'D', 1, '38a49b1d8869188c355f5aa639bd1641', 0),
('ibnurafi789@gmail.com', 'Ibnu Rafi', 'Universitas Negeri Yogyakarta', '081210558954', NULL, 1, 'ibnusnma', 'b398d252b31a738334def7b32d9a84c9', '2017-06-18', 'M', 1, '296e7078cb2ec91f84eeaec42dc31d74', 0),
('ihsanudin1979@yahoo.com', 'Ihsanudin, M.Si.', 'Pendidikan Matematika FKIP Universitas Sultan Ageng Tirtayasa', '085939932121', NULL, 1, 'ihsanudin', '1af5aedb6e2659cb30b63e4db3eeca8e', '2017-07-05', 'D', 0, 'c775ed2a777d3908abbcd6364e856d6f', 3),
('iisholisin.pendmat@fkip.um-surabaya.ac.id', 'Dr. IIS HOLISIN, M.Pd.', 'Prodi Pendidikan Matematika Universitas Muhammadiyah Surabaya', '081331525590', NULL, 1, 'surabaya60285', 'dd5e8a4dfca24f5b8b5e27d7ebc5fed5', '2017-05-10', 'D', 1, 'f8a8b332c1d5ee1e7594247dc9837f11', 0),
('kamsyakawuni@gmail.com', 'Ahmad Kamsyakawuni, S.Si, M.Kom', 'Jurusan Matematika, FMIPA, Universitas Jember', '08155035247', NULL, 1, 'seminar2017', '63f766103c32794371735505e06384e8', '2017-07-06', 'D', 1, '5528b94dffba99d1950045d4a9d89758', 0),
('khoni_84@yahoo.com', 'wanto', 'swasta', '085103573594', NULL, 1, '1234567890', 'e807f1fcf82d132f9bb018ca6738a19f', '2017-04-06', 'D', 1, '6ac98714c54e5a38ea6ced1c5e7d74bb', 0),
('kristianusviktorpantaleon@yahoo.com', 'Kristianus Viktor Pantaleon, M.Pd', 'STKIP St. Paulus Ruteng', '085253379307', NULL, 1, 'viktor1', '4179603460662d025353b058490f333e', '2017-07-12', 'M', 1, '375bafdea5f6b162f897a3bd503efc5f', 0),
('lamisuhamid@yahoo.co.id', 'La Misu, Drs., M.Pd', 'Universitas Halu Oleo atau Mahasiswa S3 Pend. Matematika Unesa', '081245714699', NULL, 1, 'wanonihamid', '844b7eb46787112b0a9ca4fc66917ffa', '2017-04-24', 'M', 1, 'b79e2c7b27c7ece5c7d0be00f2ce726a', 0),
('marisa_rifada@yahoo.com', 'Marisa Rifada, S.Si., M.Si', 'Universitas Airlangga', '085648266260', NULL, 1, 'khansa151212', '39972a4877b7e772f0f3048d550d1409', '2017-07-10', 'D', 1, 'a8bafa3b9e69f172699ac87998763ca8', 0),
('matematika.ummat@gmail.com', 'Syaefudin Suhaedi, M.Pd', 'Universitas Muhammadiyah Mataram', '081803654530', NULL, 1, 'AimaN', '901c92c157ee9b3dfceeab3a83dcca95', '2017-07-04', 'D', 0, '97147e38b299c2d9b0c2f88a179bd51a', 3),
('medqashlim@gmail.com', 'Akhmad Qashlim', 'Univesitas Al Asyariah Mandar', '08112891822', NULL, 1, 'fikomunasman', '4586c511c0412f480ffb3f65bbe404cc', '2017-07-10', 'D', 1, 'abd9ee09d28d1ca252133f80dfa6b3d0', 0),
('mr.iyes@yahoo.co.id', 'Muh. Nurtanzis Sutoyo, S.Kom.,M.Cs', 'Universitas Sembilanbelas November Kolaka', '085241784560', NULL, 1, 'iyes1984', '73ca6852f6881b0ab2b1611b54c6008a', '2017-04-25', 'D', 1, 'a815ee5e1e744e32003b05bb951d2693', 0),
('neilah15@mhs.matematika.its.ac.id', 'Neilah Muazaroh, S.Si', 'Institut Teknologi Sepuluh Nopember', '081333371926', NULL, 1, 'ProtegoMaxima', 'cc71644206c451d0880cedff4da61533', '2017-07-05', 'M', 1, 'f1a1543d4374697ed00bb00b5092cd09', 0),
('novitmath@gmail.com', 'Novita Sari, M.Pd', 'Universitas PGRI Palembang', '082175187352', NULL, 1, 'PASSword1', '6428310f1de8a7c760664a8b110c3160', '2017-07-14', 'D', 1, '96eb13f6728ac7072ff361328ccaf286', 0),
('nurhamidah1408@gmail.com', 'Nur Hamidah', 'Universitas Jember', '086607791869', NULL, 1, 'SCRAPMATIK', '82570c34da90f7431bf2ad34aff7ef16', '2017-07-05', 'M', 1, 'a732a2e159fd2ef0c732bcf3943db4e7', 0),
('nurulanggraeni130809@gmail.com', 'Nurul Anggraeni Hidayati', 'Universitas Islam Negeri Maulana Malik Ibrahim Malang', '085733071430', NULL, 1, 'anggraeni', '1673159a5815bb44524c1f6386becee7', '2017-07-11', 'M', 1, '0261e322d49033381dcdd611ba41ee7d', 0),
('putrifitriasari20@gmail.com', 'Putri Fitriasari, M.Pd', 'Universitas PGRI Palembang', '082176561605', NULL, 1, '20maret1990', '116bc51cfd47db56ac3f2fcd75e97c5f', '2017-07-14', 'D', 1, 'ac531ad2dfd38f1aa8a776b9803e1c83', 0),
('rahmawati28hidayat@gmail.com', 'Rahmawati Maisaroh Hidayat', 'Institut Teknologi Sepuluh Nopember', '089654113828', NULL, 1, 'atik08', '7c5281c55df34c8b128b6a761d60c77e', '2017-05-31', 'M', 1, '194dab254dd5f5f347e6a48c08c5c68a', 2),
('rahmawatien.srf@unipasby.ac.id', 'Sri Rahmawati Fitriatien, S.Pd., M.Si.', 'Universitas PGRI Adi Buana Surabaya', '087806884888', NULL, 1, 'pendidikanmatematika', '6bfeae927c64d3ca8c09145150d2ef15', '2017-07-05', 'D', 1, '9fb2daa64c5fca4b0f2512c52c797fe8', 0),
('ratihunipa@gmail.com', 'Indah Ratih Anggriyani, S.Si, M.Si', 'Universitas Papua', '081344091528', NULL, 1, 'matematika', '04246ef4da8c2508fbdf25b0efd84521', '2017-07-17', 'D', 1, '18ce36045ca731c64ea7c5cc16d06f2b', 0),
('rima_hiiiii@yahoo.com', 'Esther Ria Matulessy, S.Si, M.Si', 'Universitas Papua', '081344151231', NULL, 1, 'ester_ria', '5008d06863e52ad7d542c49b32278202', '2017-07-17', 'D', 0, '66a4e4003e5b509fcb579d3ff72bc021', 0),
('saiful.ghozi@poltekba.ac.id', 'Saiful Ghozi', 'Politeknik Negeri Balikpapan', '081352168498', NULL, 1, 'kanigoro', 'ec3ffc8e04e4ea13db938798664a7ad9', '2017-06-03', 'D', 0, '579529e860f2e640037fec14a1b3fab4', 2),
('snma@fst.unair.ac.id', 'ADMIN SNMA', 'FST-UNAIR', NULL, 'snma@fst.unair.ac.id', 0, 'Adm1nSnma', 'd8c62b20bb0abf53010b4bd3740b3bf5', '2017-04-13', NULL, 1, '3709321627598f5b6e381c1dba176511', 0),
('tanzimah.imah@yahoo.com', 'Tanzimah, M.Pd', 'Universitas PGRI Palembang', '081273960288', NULL, 1, 'Hamiznat211075', 'fd9c96697d6efee0a3d67d7fc4bff55a', '2017-07-14', 'D', 0, 'bce922c3d0101dab4cea5daf7c40cd99', 0),
('titindwiagustin@yahoo.co.id', 'Titin Dwi Agustin', 'Universitas Nusantara PGRI Kediri', '085750266674', NULL, 1, '123456', 'e10adc3949ba59abbe56e057f20f883e', '2017-07-06', 'M', 1, 'c4f00fe725917dd7b0554ce50b02ce30', 0),
('trias.nyta@gmail.com', 'Anita Trias Anggraeni', 'Institut Teknologi Sepuluh Nopember', '085646573255', NULL, 1, 'bismillah070493', 'ba5049a0eccb8969d84358176bbfc7d5', '2017-06-16', 'D', 1, '054bb6f02851e2258041de7138695a42', 0),
('vineezz.brbs89@gmail.com', 'EVI YULIASARI, S.Pd. Si.', 'Universitas Negeri Jakarta', '087739380665', NULL, 1, 'eviyuli4', '7e9d8e5ed0b0a483eb17c8c026086847', '2017-06-06', 'D', 1, '408c8f15140ebeba09c901da5d4c1fc6', 1),
('vyaoktaviyani@gmail.com', 'Oktaviyani', 'Politeknik Negeri Tanah Laut', '081347734200', NULL, 1, 'oktavia20', 'b99b504e0a29e7134ba13c5318fe763a', '2017-07-03', 'M', 1, '2c8cf4201ac578995d503599a7d89b7b', 0),
('wahyu_fistia@matematika.its.ac.id', 'Dra.Wahyu Fistia Doctorina, M Si.', 'Institut Teknologi Sepuluh Nopember Surabaya', '085655744798', NULL, 1, 'B1sm1ll4h', '23b323dbcbe34962f9da783fe2bc387f', '2017-07-11', 'D', 1, '8d57cd53dd1a56ce78075f5ea738ed98', 0),
('wawan24_ezzar@yahoo.co.id', 'Wawan Septiawan', 'SMK PGRI KAMAL', '089669317108', NULL, 1, 'wawan', '0a000f688d85de79e3761dec6816b2a5', '2017-05-28', 'D', 1, '7e1fef2fc560ce370c456957a119b302', 0),
('winda.ap17@gmail.com', 'WINDA APRIANTI', 'POLITEKNIK NEGERI TANAH LAUT', '08115475777', NULL, 1, 'J1a107054', '037245f05147c237529f12b08868ef88', '2017-07-03', 'D', 1, '60dca88b8ba680c7b145cdf26fafb290', 0),
('zetta0606@gmail.com', 'Faried Effendy', 'UNAIR', '087854864845', NULL, 1, 'ardiani99', 'fed5f494421202d8d58918f8e2f35aaf', '2017-07-05', 'D', 1, '02a554990b41e6142d4b6f08ba0a2aef', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`idkategori`);

--
-- Indexes for table `makalah`
--
ALTER TABLE `makalah`
  ADD PRIMARY KEY (`iduser`,`thnsnma`,`idmakalah`),
  ADD KEY `idmakalah` (`idmakalah`);

--
-- Indexes for table `otoritas`
--
ALTER TABLE `otoritas`
  ADD PRIMARY KEY (`idoto`);

--
-- Indexes for table `peserta`
--
ALTER TABLE `peserta`
  ADD PRIMARY KEY (`iduser`,`thnsnma`);

--
-- Indexes for table `Reviewer`
--
ALTER TABLE `Reviewer`
  ADD KEY `indreviewer` (`idreviewer`);

--
-- Indexes for table `thnsnma`
--
ALTER TABLE `thnsnma`
  ADD PRIMARY KEY (`thnsnma`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `idkategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `makalah`
--
ALTER TABLE `makalah`
  MODIFY `idmakalah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `Reviewer`
--
ALTER TABLE `Reviewer`
  MODIFY `idreviewer` int(5) NOT NULL AUTO_INCREMENT;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
