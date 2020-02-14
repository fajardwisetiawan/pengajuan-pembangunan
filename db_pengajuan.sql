-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 15, 2019 at 05:34 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pengajuan`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama`, `username`, `password`, `foto`) VALUES
(1, 'Fajar Dwi Setiawan', 'admin', 'admin', 'Fajar Dwi Setiawan-gojek.png'),
(2, 'justin', 'biber', 'admin', '-gojek2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `nama_jabatan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `nama_jabatan`) VALUES
(2, 'Kepala Desa'),
(3, 'Sekertaris Desa'),
(4, 'Bendahara Desa'),
(5, 'KAUR Perencanaan'),
(6, 'KAUR Pembangunan');

-- --------------------------------------------------------

--
-- Table structure for table `perangkat_desa`
--

CREATE TABLE `perangkat_desa` (
  `id_perangkat_desa` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `subjabatan` varchar(100) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `perangkat_desa`
--

INSERT INTO `perangkat_desa` (`id_perangkat_desa`, `nama`, `username`, `password`, `jabatan`, `subjabatan`, `foto`) VALUES
(0, 'Sartono', 'kaurper', 'haha', 'KAUR Perencanaan', '', 'Yaqieeee-gojek2.jpg'),
(13, 'Purwono', 'kades', 'haha', 'Kepala Desa', '', 'Sani-gojek2.jpg'),
(30, 'Slamet', 'kaurpem', 'haha', 'KAUR Pembangunan', 'Pabuaran', 'Ajang-gojek2.jpg'),
(34, 'Priyatin', 'sekdes', 'haha', 'Sekertaris Desa', 'Dua', 'Yovie-gojek.png'),
(35, 'Haryadi', 'bendes', 'haha', 'Bendahara Desa', 'Satu', 'Dzaki-gojek.png');

-- --------------------------------------------------------

--
-- Table structure for table `proposal_pengajuan`
--

CREATE TABLE `proposal_pengajuan` (
  `id_proposal` int(11) NOT NULL,
  `tanggal_proposal` varchar(20) NOT NULL,
  `tahun_proposal` varchar(20) NOT NULL,
  `nomor_proposal` varchar(100) NOT NULL,
  `nilai_rab` int(255) NOT NULL,
  `jenis_kegiatan` varchar(100) NOT NULL,
  `judul_kegiatan` varchar(50) NOT NULL,
  `deskripsi_kegiatan` varchar(10000) NOT NULL,
  `lampiran1` varchar(100) NOT NULL,
  `lampiran2` varchar(100) NOT NULL,
  `tanggal_acc` varchar(20) NOT NULL,
  `tanggal_pencairan` varchar(20) NOT NULL,
  `tanggal_mulai_pelaksanaan` varchar(20) NOT NULL,
  `tanggal_selesai_pelaksanaan` varchar(20) NOT NULL,
  `gambar_kegiatan` varchar(100) NOT NULL,
  `deskripsi_gambar` varchar(10000) NOT NULL,
  `status` int(11) NOT NULL,
  `status1` int(11) NOT NULL,
  `status2` int(11) NOT NULL,
  `status_baca_kaurper` int(11) NOT NULL,
  `status_baca_sekdes1` int(11) NOT NULL,
  `status_baca_sekdes2` int(11) NOT NULL,
  `status_baca_kades1` int(11) NOT NULL,
  `status_baca_kades2` int(11) NOT NULL,
  `status_baca_bendes1` int(11) NOT NULL,
  `status_baca_bendes2` int(11) NOT NULL,
  `status_baca_kaurpem` int(11) NOT NULL,
  `keterangan` varchar(10000) NOT NULL,
  `untuk` varchar(100) NOT NULL,
  `notif` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `proposal_pengajuan`
--

INSERT INTO `proposal_pengajuan` (`id_proposal`, `tanggal_proposal`, `tahun_proposal`, `nomor_proposal`, `nilai_rab`, `jenis_kegiatan`, `judul_kegiatan`, `deskripsi_kegiatan`, `lampiran1`, `lampiran2`, `tanggal_acc`, `tanggal_pencairan`, `tanggal_mulai_pelaksanaan`, `tanggal_selesai_pelaksanaan`, `gambar_kegiatan`, `deskripsi_gambar`, `status`, `status1`, `status2`, `status_baca_kaurper`, `status_baca_sekdes1`, `status_baca_sekdes2`, `status_baca_kades1`, `status_baca_kades2`, `status_baca_bendes1`, `status_baca_bendes2`, `status_baca_kaurpem`, `keterangan`, `untuk`, `notif`) VALUES
(68, '2019-07-15', '2019', '069/Kedung Benda/Perbaikan Masjid/07/19', 150000000, 'Pembangunan', 'Perbaikan Masjid', 'Memperbaiki Masjid Baitul Muslimin', '68-Metodologi Penelitian_Fajar Dwi Setiawan_16.11.0151.docx', '', '', '', '', '', '', '', 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', 1),
(69, '2019-08-07', '2018', '070/Kedung Benda/Membangun Jembatan/07/19', 200000000, 'Pembangunan', 'Membangun Jembatan', 'Membangun Jembatan di Jalan Sukirman', '69-ELEARNING_TEORI OTOMATA_RAFLI FIRDAUSY_16.11.0247-1.pdf', '69-21-ELEARNING_TEORI OTOMATA_RAFLI FIRDAUSY_16.11.0247-1 (1).pdf', '', '2019-08-10', '', '', '', '', 2, 1, 4, 0, 0, 0, 0, 0, 0, 0, 0, 'mmm', '', 1),
(71, '2019-08-07', '2019', '072/Kedung Benda/Pembangunan Masjid/08/19', 90000000, 'Pembangunan', 'Pembangunan Masjid', 'Masjid Saka Ganda Desa Sangsurya, Purbalingga', '71-ELEARNING_TEORI OTOMATA_RAFLI FIRDAUSY_16.11.0247-1.pdf', '71-usecase.docx', '', '', '2019-08-12', '2019-08-12', '71-gojek2.jpg', 'Coba', 5, 0, 2, 0, 0, 0, 0, 0, 0, 0, 0, '', 'KAUR Perencanaan', 1),
(72, '2019-08-07', '2019', '073/Kedung Benda/Pembangunan Jembatan/08/19', 80000000, 'Pembangunan', 'Pembangunan Jembatan', 'Jembatan Merah Desa Marga Jaya, Kab. Purbalingga', '72-21-ELEARNING_TEORI OTOMATA_RAFLI FIRDAUSY_16.11.0247-1 (2).pdf', '72-makala komputer.docx', '', '', '', '', '', '', 5, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 's', 'KAUR Perencanaan', 1),
(74, '2019-08-07', '2019', '075/Kedung Benda/Pembangunan Jembatan/08/19', 80000000, 'Pembangunan', 'Pembangunan Jembatan', 'Jembatan Merah Desa Marga Jaya, Purbalingga', '74-ELEARNING_TEORI OTOMATA_RAFLI FIRDAUSY_16.11.0247-1.pdf', '74-20-E-Learning_metopen_Adit Stiawan_0017.docx', '', '', '', '', '', '', -2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 'Sekertaris Desa', 1),
(77, '2019-08-08', '2019', '078/Kedung Benda/Pembangunan Jembatan/08/19', 80000000, 'Pembangunan', 'Pembangunan Jembatan', 'Jembatan Merah Desa Marga Jaya, Kab. Purbalingga', '77-60-ELEARNING_TEORI OTOMATA_RAFLI FIRDAUSY_16.11.0247-1.pdf', '77-21-ELEARNING_TEORI OTOMATA_RAFLI FIRDAUSY_16.11.0247-1.pdf', '', '2019-08-08', '', '', '', '', 5, 1, 3, 0, 0, 0, 0, 0, 0, 0, 0, 'k\r\n', 'Sekertaris Desa', 1),
(80, '2019-08-10', '2019', '081/Kedung Benda/Pembangunan Jembatan/08/19', 80000000, 'Pembangunan', 'Pembangunan Jembatan', 'Jembatan Merah Desa Marga Jaya, Purbalingga', '80-ELEARNING_TEORI OTOMATA_RAFLI FIRDAUSY_16.11.0247-1.pdf', '80-Contoh Proposal Ruwat Bumi.pdf', '', '', '', '', '', '', 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'Kurang RAB', 'KAUR Perencanaan', 1),
(91, '2019-08-10', '2019', '092/Kedung Benda/Penyelenggaraan Belanja Siltap, Tunjangan dan Oper/08/19', 3000000, 'Penyelenggaraan Pemerintah Desa', 'Penyelenggaraan Belanja Siltap, Tunjangan dan Oper', 'Pengadaan Seragam Perangkat Desa', '91-Contoh RAB Ruwat Bumi.pdf', '91-Contoh Proposal Ruwat Bumi.pdf', '2019-08-12', '2019-08-12', '2019-08-13', '2019-08-13', '91-gojek2.jpg', '', 5, 1, 4, 0, 0, 0, 0, 0, 0, 0, 0, 'Salah RAB', 'KAUR Perencanaan', 1),
(92, '2019-08-12', '2019', '093/Kedung Benda/Pendidikan/08/19', 21600000, 'Pembangunan Desa', 'Pendidikan', 'INSENTIF /Honor Guru TK & PAUD', '92-Contoh RAB Ruwat Bumi.pdf', '', '', '', '', '', '', '', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', 1),
(93, '2019-08-12', '2019', '094/Kedung Benda/Ketentraman, Ketertiban Umum dan Perlindungan Masy/08/19', 10000000, 'Pembinaan Kemasyarakatan', 'Ketentraman, Ketertiban Umum dan Perlindungan Masy', 'Pembangunan Pos Tanggap Bencana ', '93-Contoh RAB Ruwat Bumi.pdf', '', '', '', '', '', '', '', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', 1),
(94, '2019-08-12', '2019', '095/Kedung Benda/Kelautan dan Perikanan/08/19', 15000000, 'Pemberdayaan Masyarakat', 'Kelautan dan Perikanan', 'Pembangunan/Pemeliharaan/Rehabilitasi/Karamba', '94-Contoh RAB Ruwat Bumi.pdf', '', '', '', '', '', '', '', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', 1),
(95, '', '', '', 36000000, 'Penyelenggaraan Pemerintah Desa', 'Pengelolaan Administrasi Kependudukan, Pencatatan ', 'Pemetaan dan Analisis Kemiskinan secara Partisipatif (Rantang kasih)', '', '', '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', 1),
(96, '2019-08-10', '', '097/Kedung Benda/Membangun Masjid/08/19', 30000000, 'Pembangunan', 'Membangun Masjid', 'Masjid Baitul Hikmah Dusun A', '96-Contoh RAB Ruwat Bumi.pdf', '96-Contoh Proposal Ruwat Bumi.pdf', '', '', '', '', '', '', 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', 1),
(97, '', '', '', 0, 'Masukan Jenis Kegiatan', 'Masukan Judul Kegiatan', 'Masukan Deskripsi Kegiatan', '', '', '', '', '', '', '', '', -2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 'KAUR Perencanaan', 1),
(98, '', '', '', 10000, 'Coba', 'Bangun Masjid', 'Masjid Dusun A', '', '', '', '', '', '', '', '', -2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'd', 'KAUR Perencanaan', 1),
(99, '', '', '', 20000, '', 'Bangun Kantor', 'Kantor Kades', '', '', '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', 1),
(100, '2019-08-15', '2019', '101/Kedung Benda/sidheoh/08/19', 5000, 'dsdjfs', 'sidheoh', 'jldehgoire', '100-Contoh RAB Ruwat Bumi.pdf', '', '', '', '', '', '', '', 1, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, '', '', 1),
(101, '', '', '', 10000, 'Coba', 'Bangun Masjid', 'Masjid Dusun A', '', '', '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', 1),
(102, '', '', '', 20000, '', 'Bangun Kantor', 'Kantor Kades', '', '', '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', 1),
(103, '', '', '', 10000000, 'Pembinaan Kemasyarakatan', 'Ketentraman, Ketertiban Umum dan Perlindungan Masy', 'Pembangunan Pos Tanggap Bencana ', '', '', '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', 1),
(104, '', '', '', 15000000, 'Pemberdayaan Masyarakat', 'Kelautan dan Perikanan', 'Pembangunan/Pemeliharaan/Rehabilitasi/Karamba', '', '', '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', 1),
(105, '', '', '', 36000000, 'Penyelenggaraan Pemerintah Desa', 'Pengelolaan Administrasi Kependudukan, Pencatatan ', 'Pemetaan dan Analisis Kemiskinan secara Partisipatif (Rantang kasih)', '', '', '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `rincian_biaya`
--

CREATE TABLE `rincian_biaya` (
  `id_rinbi` int(11) NOT NULL,
  `id_proposal` int(11) NOT NULL,
  `rincian` varchar(200) NOT NULL,
  `biaya` int(255) NOT NULL,
  `gambar_kwitansi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rincian_biaya`
--

INSERT INTO `rincian_biaya` (`id_rinbi`, `id_proposal`, `rincian`, `biaya`, `gambar_kwitansi`) VALUES
(4, 23, 'aaa', 333, ''),
(6, 23, 'de', 33, ''),
(7, 23, 'eerr', 44, ''),
(9, 23, 'eee', 4, ''),
(11, 23, 'aaa', 9000, ''),
(12, 23, 'm,', 9000, ''),
(16, 61, 'jjj', 15000, ''),
(17, 61, 'lll', 50000, ''),
(18, 61, 'ljhj', 20000, ''),
(19, 61, 'hahaha', 80000, ''),
(20, 61, 'gaga', 900000, ''),
(34, 59, 'kadk', 20, ''),
(35, 68, 'Aspal', 9000000, ''),
(36, 68, 'Batu', 2000000, ''),
(37, 69, 'Semen', 5000000, ''),
(38, 68, 'Semen', 450000, ''),
(39, 70, 'Ampas', 3000000, ''),
(40, 70, 'Boled', 2000000, ''),
(41, 69, 'Batu', 2000000, ''),
(43, 77, 'Semen', 1000000, ''),
(45, 77, 'J', 79000000, ''),
(47, 77, 'A', 0, ''),
(48, 71, 'Semen', 2000, ''),
(49, 71, 'Semen', 555, '71-gojek.png'),
(50, 91, 'A', 2000, '91-logo_purbalingga.png');

-- --------------------------------------------------------

--
-- Table structure for table `rpjm_des`
--

CREATE TABLE `rpjm_des` (
  `id_rpjm` int(11) NOT NULL,
  `jenis_keg` varchar(200) NOT NULL,
  `nilai_rab` int(225) NOT NULL,
  `judul_keg` varchar(100) NOT NULL,
  `deskripsi_keg` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rpjm_des`
--

INSERT INTO `rpjm_des` (`id_rpjm`, `jenis_keg`, `nilai_rab`, `judul_keg`, `deskripsi_keg`) VALUES
(5, 'Pemberdayaan Masyarakat', 15000000, 'Kelautan dan Perikanan', 'Pembangunan/Pemeliharaan/Rehabilitasi/Karamba'),
(6, 'Penyelenggaraan Pemerintah Desa', 36000000, 'Pengelolaan Administrasi Kependudukan, Pencatatan Sipil, Statistik dan Kearsipan', 'Pemetaan dan Analisis Kemiskinan secara Partisipatif (Rantang kasih)');

-- --------------------------------------------------------

--
-- Table structure for table `subjabatan`
--

CREATE TABLE `subjabatan` (
  `id_subjabatan` int(11) NOT NULL,
  `nama_jabatan` varchar(100) NOT NULL,
  `nama_subjabatan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subjabatan`
--

INSERT INTO `subjabatan` (`id_subjabatan`, `nama_jabatan`, `nama_subjabatan`) VALUES
(2, 'Sekertaris Desa', 'Satu'),
(3, 'Sekertaris Desa', 'Dua'),
(4, 'Bendahara Desa', 'Satu'),
(5, 'Bendahara Desa', 'Dua');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `perangkat_desa`
--
ALTER TABLE `perangkat_desa`
  ADD PRIMARY KEY (`id_perangkat_desa`);

--
-- Indexes for table `proposal_pengajuan`
--
ALTER TABLE `proposal_pengajuan`
  ADD PRIMARY KEY (`id_proposal`);

--
-- Indexes for table `rincian_biaya`
--
ALTER TABLE `rincian_biaya`
  ADD PRIMARY KEY (`id_rinbi`);

--
-- Indexes for table `rpjm_des`
--
ALTER TABLE `rpjm_des`
  ADD PRIMARY KEY (`id_rpjm`);

--
-- Indexes for table `subjabatan`
--
ALTER TABLE `subjabatan`
  ADD PRIMARY KEY (`id_subjabatan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `perangkat_desa`
--
ALTER TABLE `perangkat_desa`
  MODIFY `id_perangkat_desa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `proposal_pengajuan`
--
ALTER TABLE `proposal_pengajuan`
  MODIFY `id_proposal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `rincian_biaya`
--
ALTER TABLE `rincian_biaya`
  MODIFY `id_rinbi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `rpjm_des`
--
ALTER TABLE `rpjm_des`
  MODIFY `id_rpjm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `subjabatan`
--
ALTER TABLE `subjabatan`
  MODIFY `id_subjabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
