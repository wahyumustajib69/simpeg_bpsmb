-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 21 Feb 2021 pada 17.57
-- Versi Server: 10.1.25-MariaDB
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
-- Database: `simpeg`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cuti`
--

CREATE TABLE `cuti` (
  `id_cuti` varchar(15) NOT NULL,
  `no_surat` varchar(50) NOT NULL,
  `tgl_surat` date NOT NULL,
  `tgl_mulai` date NOT NULL,
  `th_ini` int(11) NOT NULL,
  `th_lalu` int(11) NOT NULL,
  `th_lm` int(11) NOT NULL,
  `nip` varchar(35) NOT NULL,
  `alamat_cuti` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `cuti`
--

INSERT INTO `cuti` (`id_cuti`, `no_surat`, `tgl_surat`, `tgl_mulai`, `th_ini`, `th_lalu`, `th_lm`, `nip`, `alamat_cuti`) VALUES
('C0221570', '001/BPSMB/II/2021', '2021-02-12', '2021-02-15', 12, 6, 0, '196504051991042114', 'Jl. Berlian, Kelurahan Mentaos, Kecamatan Banjarbaru Selatan, Kota Banjarbaru');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gaji`
--

CREATE TABLE `gaji` (
  `id_gaji` varchar(20) NOT NULL,
  `tgl_gaji` date NOT NULL,
  `nip` varchar(35) NOT NULL,
  `gj_pokok` bigint(20) NOT NULL,
  `tunj_eselon` bigint(20) NOT NULL,
  `tunj_umum` bigint(20) NOT NULL,
  `t_fungsi` bigint(20) NOT NULL,
  `t_khusus` bigint(20) NOT NULL,
  `t_terp` bigint(20) NOT NULL,
  `tkd` bigint(20) NOT NULL,
  `t_beras` bigint(20) NOT NULL,
  `t_pajak` bigint(20) NOT NULL,
  `bpjs` bigint(20) NOT NULL,
  `jkk` bigint(20) NOT NULL,
  `jkm` bigint(20) NOT NULL,
  `tapera` bigint(20) NOT NULL,
  `p_pajak` bigint(20) NOT NULL,
  `b_kes` bigint(20) NOT NULL,
  `p_taperum` bigint(20) NOT NULL,
  `p_jkk` bigint(20) NOT NULL,
  `p_jkm` bigint(20) NOT NULL,
  `p_tpk` bigint(20) NOT NULL,
  `p_tpg` bigint(20) NOT NULL,
  `hutang` bigint(20) NOT NULL,
  `bulog` bigint(20) NOT NULL,
  `sewa_rmh` bigint(20) NOT NULL,
  `g_bersih` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `gaji`
--

INSERT INTO `gaji` (`id_gaji`, `tgl_gaji`, `nip`, `gj_pokok`, `tunj_eselon`, `tunj_umum`, `t_fungsi`, `t_khusus`, `t_terp`, `tkd`, `t_beras`, `t_pajak`, `bpjs`, `jkk`, `jkm`, `tapera`, `p_pajak`, `b_kes`, `p_taperum`, `p_jkk`, `p_jkm`, `p_tpk`, `p_tpg`, `hutang`, `bulog`, `sewa_rmh`, `g_bersih`) VALUES
('P21022219', '2021-02-14', '196504051991042114', 4024400, 980000, 0, 0, 0, 0, 0, 289680, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5434793),
('P21023678', '2021-02-14', '196609231993031005', 4108100, 540000, 0, 0, 0, 0, 0, 217260, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4938835),
('P21026495', '2021-02-19', '196411121986032015', 4508600, 960000, 0, 0, 0, 0, 0, 144840, 16250, 0, 0, 0, 0, 16250, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5197903),
('P21029720', '2021-02-15', '19950912', 3500000, 450000, 0, 0, 0, 0, 0, 217000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3847500);

-- --------------------------------------------------------

--
-- Struktur dari tabel `golongan`
--

CREATE TABLE `golongan` (
  `id_gol` int(11) NOT NULL,
  `pangkat` varchar(50) NOT NULL,
  `gol` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `golongan`
--

INSERT INTO `golongan` (`id_gol`, `pangkat`, `gol`) VALUES
(1, 'Juru Muda', 'I/A'),
(2, 'Juru Muda Tingkat I', 'I/B'),
(3, 'Juru', 'I/C'),
(4, 'Juru Tingkat I', 'I/D'),
(5, 'Pengatur Muda', 'II/A'),
(6, 'Pengatur Muda Tingkat I', 'II/B'),
(7, 'Pengatur', 'II/C'),
(8, 'Pengatur Tingkat I', 'II/D'),
(9, 'Penata Muda', 'III/A'),
(10, 'Penata Muda Tingkat I', 'III/B'),
(11, 'Penata', 'III/C'),
(12, 'Penata Tingkat I', 'III/D'),
(13, 'Pembina', 'IV/A'),
(14, 'Pembina Tingkat I', 'IV/B'),
(15, 'Pembina Utama Muda', 'IV/C'),
(16, 'Pembina Utama Madya', 'IV/D'),
(17, 'Pembina Utama', 'IV/E');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jbtn` int(11) NOT NULL,
  `nama_jbtn` varchar(255) NOT NULL,
  `ket` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jabatan`
--

INSERT INTO `jabatan` (`id_jbtn`, `nama_jbtn`, `ket`) VALUES
(122, 'Kepala Balai', '--'),
(198, 'Admin', '-'),
(761, 'Kepala Dinas', '-');

-- --------------------------------------------------------

--
-- Struktur dari tabel `keluarga`
--

CREATE TABLE `keluarga` (
  `id_kel` varchar(15) NOT NULL,
  `nip` varchar(35) NOT NULL,
  `nama_kel` varchar(35) NOT NULL,
  `nik` varchar(35) NOT NULL,
  `tempat_lhr` varchar(35) NOT NULL,
  `tanggal_lhr` date NOT NULL,
  `jk` varchar(20) NOT NULL,
  `pendidikan` varchar(10) NOT NULL,
  `pekerjaan` varchar(45) NOT NULL,
  `hubungan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `keluarga`
--

INSERT INTO `keluarga` (`id_kel`, `nip`, `nama_kel`, `nik`, `tempat_lhr`, `tanggal_lhr`, `jk`, `pendidikan`, `pekerjaan`, `hubungan`) VALUES
('F-104121617', '196609231993031005', 'Rudi', '15451244', 'Banjarbaru', '1995-11-24', 'LAKI-LAKI', 'D3', 'Mahasiswa', 'ANAK'),
('F-186112121', '196609231993031005', 'Fatimah', '124548754121', 'Banjarbaru', '2021-02-13', 'PEREMPUAN', 'D3', 'Pengusaha', 'ISTRI'),
('F-255230509', '196504051991042114', 'Usmawati Solehah', '2144511548950002', 'Bumi', '1995-08-15', 'PEREMPUAN', 'S1', 'Mahasiswa', 'ANAK'),
('F-324230258', '196504051991042114', 'Ahmad Dhani', '2144512505650008', 'Bumi', '1965-05-25', 'LAKI-LAKI', 'S1', 'Pengusaha', 'SUAMI'),
('F-376215326', '196411121986032015', 'Yulia', '125455754', 'Balikpapan', '1984-05-12', 'LAKI-LAKI', 'D3', 'Mahasiswa', 'ANAK'),
('F-606004430', '196504051991042114', 'Annisa', '3307062411930002', 'Bumi', '1998-05-24', 'PEREMPUAN', 'SLTP', 'Pelajar', 'ANAK');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `nip` varchar(35) NOT NULL,
  `nama_pgw` varchar(255) NOT NULL,
  `tmp_lahir` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `agama` varchar(20) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `gol` int(11) NOT NULL,
  `jabatan` int(11) NOT NULL,
  `status` varchar(20) NOT NULL,
  `sts_pegawai` varchar(20) NOT NULL,
  `unit_kerja` varchar(100) NOT NULL,
  `telp` varchar(13) NOT NULL,
  `email` varchar(50) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`nip`, `nama_pgw`, `tmp_lahir`, `tgl_lahir`, `agama`, `gender`, `gol`, `jabatan`, `status`, `sts_pegawai`, `unit_kerja`, `telp`, `email`, `alamat`, `foto`) VALUES
('196411121986032015', 'Mursidah', 'Banjarbaru', '1964-11-12', 'ISLAM', 'PEREMPUAN', 12, 761, 'JANDA', 'PNS', 'BPSMB Provinsi Kalimantan Selatan', '081348034619', 'mursidah@gmail.com', 'Jl. LAmbung Mangkurat, Kel. Sungai Ulin, Banjarbaru', 'vario.jpg'),
('196504051991042114', 'Tanwiriah, M.Mkes', 'Banjarbaru', '1965-04-05', 'ISLAM', 'PEREMPUAN', 13, 122, 'MENIKAH', 'PNS', 'BPSMB Provinsi Kalimantan Selatan', '081256431234', 'annisa@gmail.com', 'Jl. Mangku bumi', 'unnamed.jpg'),
('196609231993031005', 'Fakhriad, S.Sos', 'Banjarbaru', '1966-09-23', 'ISLAM', 'LAKI-LAKI', 12, 761, 'MENIKAH', 'PNS', 'BPSMB Provinsi Kalimantan Selatan', '081256431234', 'fakh@gmail.com', 'Jl. Lambung Mangkurat', 'vario.jpg'),
('19950912', 'Maulida Hasanah', 'Banjarbaru', '1998-08-25', 'ISLAM', 'PEREMPUAN', 9, 198, 'LAJANG', 'PTT', 'BPSMB Provinsi Kalimantan Selatan', '081248134665', 'maulida.hasanah@gmail.com', 'Jl. Bawah Langit', 'Ayo Ngaji.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendidikan`
--

CREATE TABLE `pendidikan` (
  `id_pend` varchar(20) NOT NULL,
  `nip` varchar(35) NOT NULL,
  `tingkat` varchar(35) NOT NULL,
  `nama_instansi` varchar(255) NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `jurusan` varchar(150) NOT NULL,
  `no_ijazah` varchar(50) NOT NULL,
  `tgl_ijazah` date NOT NULL,
  `pimpinan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pendidikan`
--

INSERT INTO `pendidikan` (`id_pend`, `nip`, `tingkat`, `nama_instansi`, `lokasi`, `jurusan`, `no_ijazah`, `tgl_ijazah`, `pimpinan`) VALUES
('1000', '196504051991042114', 'SARJANA', 'UNISKA', 'BANJARMASIN', 'EKONOMI MANAJEMEN', 'D-128712', '1985-09-25', 'Prof. Hamid'),
('4549', '19950912', 'DIPLOMA III', 'STAI AL-FALAH', 'BANJARBARU', 'TARBIYAH', 'B-174H78', '2009-05-16', 'M. Abdul Hadi, S.Ag');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pngg` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`id_pngg`, `username`, `password`) VALUES
(1, 'admin', '0192023a7bbd73250516f069df18b500');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sppd`
--

CREATE TABLE `sppd` (
  `id_surat` varchar(20) NOT NULL,
  `no_surat` varchar(50) NOT NULL,
  `tgl_surat` date NOT NULL,
  `nip` varchar(35) NOT NULL,
  `dasar` text NOT NULL,
  `tujuan` text NOT NULL,
  `ket` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sppd`
--

INSERT INTO `sppd` (`id_surat`, `no_surat`, `tgl_surat`, `nip`, `dasar`, `tujuan`, `ket`) VALUES
('K-2021018776', '090/170/SPT-LD/Disdag', '2020-10-09', '196504051991042114', '<p>1. Email dari Laboratorium Balikpapan tanggal 9 Oktober 2020 Perihal Permohonan Kalibrasi.</p>\r\n', '<p>1. Dalam rangka Melakukan Kegiatan Supervisi Pelayanan Jasa dan Kalibrasi ke Laboratorium PDAM Balikpapan, di Balikpapan.<br />\r\n2. Dilaksanakan selama 3 (Tiga) hari pada Tanggal <strong>12 s.d 14 Oktober 2020.</strong></p>\r\n', 'KB'),
('S-2021021571', '090/1894-TU/BPSMB/2020', '2020-10-09', '19950912', '&lt;p&gt;1. Email dai &lt;strong&gt;Laboratorium Balikpapan&amp;nbsp;&lt;/strong&gt;tanggal 9 Oktober 2020 Perihal Permohonan Kalibrasi&lt;br /&gt;\r\n2. Dolumen Pelaksanaan Anggaran Satuan Kerja Perangkat Daerah (DPA-SKPD) Balai Pengujian dan Sertifikasi Mutu Barang Prov. Kalsel tahun anggaran 2020 Nomor 3.06.0101.01.82.52&lt;/p&gt;\r\n', '&lt;p&gt;1. Dalam rangka menyelesaikan rangkaian kegiatan&lt;br /&gt;\r\n2. Dilaksanakan selama 3 (Tiga) hari tanggal&amp;nbsp;&lt;strong&gt;12 s/d 14 Maret 2021&lt;/strong&gt;&lt;/p&gt;\r\n', 'ST'),
('S-2021022756', '087/jkja/899', '2021-02-22', '196411121986032015', '&lt;p&gt;1. Penggalian sumur minyak di daerah rawan bencana&lt;/p&gt;\r\n', '&lt;p&gt;1. Memperbaiki komunikasi dengan warga sekitar yang terkena dampak&lt;/p&gt;\r\n', 'ST');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tunjangan`
--

CREATE TABLE `tunjangan` (
  `id_tunj` varchar(15) NOT NULL,
  `tgl_tunj` date NOT NULL,
  `nip` varchar(35) NOT NULL,
  `gaji` varchar(15) NOT NULL,
  `jml_ttp` bigint(20) NOT NULL,
  `bsr_ttp` bigint(20) NOT NULL,
  `jml_diterima` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tunjangan`
--

INSERT INTO `tunjangan` (`id_tunj`, `tgl_tunj`, `nip`, `gaji`, `jml_ttp`, `bsr_ttp`, `jml_diterima`) VALUES
('T140220213975', '2021-02-15', '196504051991042114', 'P21022219', 8500000, 6432184, 8435678),
('T150220213421', '2021-02-15', '196609231993031005', 'P21023678', 8075000, 6858928, 8006411),
('T150220219335', '2021-02-15', '19950912', 'P21029720', 4245000, 2678000, 4218220),
('T200220212611', '2021-02-20', '196411121986032015', 'P21026495', 4275000, 4500000, 4230000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cuti`
--
ALTER TABLE `cuti`
  ADD PRIMARY KEY (`id_cuti`),
  ADD KEY `nip` (`nip`);

--
-- Indexes for table `gaji`
--
ALTER TABLE `gaji`
  ADD PRIMARY KEY (`id_gaji`),
  ADD KEY `nip` (`nip`);

--
-- Indexes for table `golongan`
--
ALTER TABLE `golongan`
  ADD PRIMARY KEY (`id_gol`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jbtn`);

--
-- Indexes for table `keluarga`
--
ALTER TABLE `keluarga`
  ADD PRIMARY KEY (`id_kel`),
  ADD KEY `nip` (`nip`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`nip`),
  ADD KEY `gol` (`gol`),
  ADD KEY `jabatan` (`jabatan`);

--
-- Indexes for table `pendidikan`
--
ALTER TABLE `pendidikan`
  ADD PRIMARY KEY (`id_pend`),
  ADD KEY `nip` (`nip`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pngg`);

--
-- Indexes for table `sppd`
--
ALTER TABLE `sppd`
  ADD PRIMARY KEY (`id_surat`),
  ADD KEY `nip` (`nip`);

--
-- Indexes for table `tunjangan`
--
ALTER TABLE `tunjangan`
  ADD PRIMARY KEY (`id_tunj`),
  ADD KEY `nip` (`nip`),
  ADD KEY `gaji` (`gaji`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `golongan`
--
ALTER TABLE `golongan`
  MODIFY `id_gol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pngg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `cuti`
--
ALTER TABLE `cuti`
  ADD CONSTRAINT `cuti_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `pegawai` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `gaji`
--
ALTER TABLE `gaji`
  ADD CONSTRAINT `gaji_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `pegawai` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `keluarga`
--
ALTER TABLE `keluarga`
  ADD CONSTRAINT `keluarga_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `pegawai` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD CONSTRAINT `pegawai_ibfk_1` FOREIGN KEY (`gol`) REFERENCES `golongan` (`id_gol`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pegawai_ibfk_2` FOREIGN KEY (`jabatan`) REFERENCES `jabatan` (`id_jbtn`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pendidikan`
--
ALTER TABLE `pendidikan`
  ADD CONSTRAINT `pendidikan_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `pegawai` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `sppd`
--
ALTER TABLE `sppd`
  ADD CONSTRAINT `sppd_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `pegawai` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tunjangan`
--
ALTER TABLE `tunjangan`
  ADD CONSTRAINT `tunjangan_ibfk_1` FOREIGN KEY (`gaji`) REFERENCES `gaji` (`id_gaji`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tunjangan_ibfk_2` FOREIGN KEY (`nip`) REFERENCES `pegawai` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
