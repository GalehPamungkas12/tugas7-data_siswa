-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Agu 2022 pada 12.34
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `data_siswa`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `kelas` varchar(50) NOT NULL,
  `nip` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `kelas`, `nip`) VALUES
(6, 'I', 111111),
(7, 'II', 121212),
(8, 'III', 102030),
(9, 'IV', 444444),
(10, 'V', 555555),
(11, 'VI', 666666);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mapel`
--

CREATE TABLE `mapel` (
  `id_mapel` int(11) NOT NULL,
  `nama_mapel` varchar(200) NOT NULL,
  `kkm` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mapel`
--

INSERT INTO `mapel` (`id_mapel`, `nama_mapel`, `kkm`) VALUES
(8, 'Bahasa Inggris', 62),
(9, 'IPA', 62),
(10, 'Penjas', 70),
(12, 'IPS', 63),
(13, 'B.Indonesia', 64);

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai`
--

CREATE TABLE `nilai` (
  `id_nilai` int(11) NOT NULL,
  `nisn` int(20) NOT NULL,
  `nip` int(20) NOT NULL,
  `semester` varchar(11) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `nilai` int(11) NOT NULL DEFAULT 0,
  `predikat_nilai` varchar(1) DEFAULT '-',
  `tugas` int(11) NOT NULL DEFAULT 0,
  `predikat_tugas` varchar(1) NOT NULL DEFAULT '-',
  `uts` int(11) NOT NULL DEFAULT 0,
  `predikat_uts` varchar(1) NOT NULL DEFAULT '-',
  `uas` int(11) NOT NULL DEFAULT 0,
  `predikat_uas` varchar(1) NOT NULL DEFAULT '-',
  `sikap` varchar(2) NOT NULL DEFAULT '-',
  `kompetensi` varchar(2) NOT NULL DEFAULT '-',
  `keterampilan` varchar(2) NOT NULL DEFAULT '-',
  `catatan` text NOT NULL,
  `tahun_ajaran` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `nilai`
--

INSERT INTO `nilai` (`id_nilai`, `nisn`, `nip`, `semester`, `id_mapel`, `nilai`, `predikat_nilai`, `tugas`, `predikat_tugas`, `uts`, `predikat_uts`, `uas`, `predikat_uas`, `sikap`, `kompetensi`, `keterampilan`, `catatan`, `tahun_ajaran`) VALUES
(112, 111001, 111111, 'Ganjil', 13, 80, 'B', 80, 'B', 80, 'B', 80, 'B', 'A', 'A', 'A', 'Mantap', '2022/2023'),
(113, 111001, 111111, 'Ganjil', 8, 86, 'B', 86, 'B', 89, 'A', 83, 'B', 'A', 'A', 'A', 'Mantap', '2022/2023'),
(114, 111001, 111111, 'Ganjil', 9, 80, 'B', 80, 'B', 80, 'B', 80, 'B', 'A', 'A', 'A', 'Mantap', '2022/2023'),
(115, 111001, 111111, 'Ganjil', 12, 84, 'B', 84, 'B', 84, 'B', 84, 'B', 'A', 'A', 'A', 'Mantap', '2022/2023'),
(116, 111001, 111111, 'Ganjil', 10, 88, 'A', 88, 'A', 88, 'A', 88, 'A', 'A', 'A', 'A', 'Mantap', '2022/2023');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `nip` int(20) NOT NULL,
  `nama_pegawai` varchar(30) NOT NULL,
  `status` varchar(30) NOT NULL,
  `jenis_kelamin` varchar(15) NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `hp` varchar(30) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `photo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`nip`, `nama_pegawai`, `status`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `hp`, `alamat`, `photo`) VALUES
(102030, 'Arsyad', 'Aktif', 'Laki-Laki', 'FDASFS', '1999-02-03', 'AFDADFSFA', 'asdfasdfasf', 'banjir1.jpg'),
(111111, 'ryu', 'Aktif', 'Laki-Laki', 'Pekanbaru', '2022-04-20', '08121221232', 'afsfewfaw', 'bakwan_jagung.jpg'),
(121212, 'Doni', 'Aktif', 'Laki-Laki', 'Pekanbaru', '2022-04-13', '08121221232', 'gfdcghcgh', 'es_semangka.png'),
(123123, 'Debri', 'Aktif', 'Laki-Laki', 'Pekanbaru', '2022-03-25', '08121221232', 'asdfsadf', 'banjir.jpg'),
(444444, 'guru 4', 'PNS', 'Perempuan', 'Pekanbaru', '2022-08-05', '123123', 'asdfasfd', '1111.jpg'),
(555555, 'Guru 5', 'PNS', 'Perempuan', 'Pekanbaru', '2022-08-01', '4124142', 'afdefawe', '333.jpg'),
(666666, 'Guru 6', 'PNS', 'Laki-Laki', 'Pekanbaru', '2022-08-06', '08121221232', 'ADFASDFAFAF', 'eril.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `nisn` int(20) NOT NULL,
  `nama_siswa` varchar(50) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `agama` varchar(30) NOT NULL,
  `jenis_kelamin` varchar(15) NOT NULL,
  `hp_ortu` varchar(20) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `photo` varchar(100) NOT NULL,
  `no_kk` int(11) NOT NULL,
  `nama_ayah` varchar(100) NOT NULL,
  `nama_ibu` varchar(100) NOT NULL,
  `tahun_ajaran` varchar(20) NOT NULL,
  `penilaian` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`nisn`, `nama_siswa`, `id_kelas`, `alamat`, `agama`, `jenis_kelamin`, `hp_ortu`, `tempat_lahir`, `tanggal_lahir`, `photo`, `no_kk`, `nama_ayah`, `nama_ibu`, `tahun_ajaran`, `penilaian`) VALUES
(111001, 'Udin', 6, 'Jl. Apa', 'Islam', 'Laki-Laki', '2222222222', 'Pekanbaru', '2022-08-05', '88.jpg', 1231231, 'Dono', 'Rina', '2022/2023', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(256) NOT NULL,
  `akses_level` varchar(50) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `akses_level`, `tanggal`) VALUES
(17, '123123', '$2y$10$E8pVFvjwpZ7ryL1b5nPN9uDRKOVfQUocWzoEqDDe3AdMF9mccVofu', 'TU', '2022-03-18 16:22:34'),
(18, '102030', '$2y$10$KcKHyADSijhFDvAy8Z2XGeMEaU9P4BiWpZvAnBfqJtg9gnCtv4gGS', 'Guru', '2022-03-18 16:24:56'),
(24, '121212', '$2y$10$x/kPz6v7DhtoFNG/CITbYevWcLpXU.q0wNIrE9r.EGtBPvKlm97Ke', 'Guru', '2022-04-15 10:06:23'),
(26, '111111', '$2y$10$FLBTiEOtZRinXaQnf/Cy9e0T7Eyk2qIn8S7eOPm7F.gwWx6mrEtoS', 'Guru', '2022-04-15 15:16:54'),
(29, '444444', '$2y$10$Zv.BEZpmAopoLQRyQQb0NuwHuTEyT1paKP0UlxSfTCWAM.hjwCz9W', 'Guru', '2022-08-05 10:16:36'),
(30, '555555', '$2y$10$AFySHVhBwqbW7E9CRyAlTOWolQQbpooidvrfLh1R4rDOnDe5aYu/2', 'Guru', '2022-08-05 10:18:38'),
(31, '666666', '$2y$10$1K8MWEBkgehOM0gHg8HkJuL/Id58bPQkULFDDQtQwaqC7Mwgspbnm', 'Guru', '2022-08-05 10:23:24'),
(32, '111001', '$2y$10$knps8ICPBPAPM8XvD8RKP.tjf8Lzi9sRd/uQLExA6hLLQtgYsiMee', 'SISWA', '2022-08-05 10:26:02');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indeks untuk tabel `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`id_mapel`);

--
-- Indeks untuk tabel `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id_nilai`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`nip`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nisn`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `mapel`
--
ALTER TABLE `mapel`
  MODIFY `id_mapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
