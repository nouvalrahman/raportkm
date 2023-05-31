-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 31 Bulan Mei 2023 pada 10.05
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eraport`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `gurumengajar`
--

CREATE TABLE `gurumengajar` (
  `id` int(5) NOT NULL,
  `userid` int(4) DEFAULT NULL,
  `mapelid` int(4) DEFAULT NULL,
  `kelasid` int(4) DEFAULT NULL,
  `tapelid` int(4) DEFAULT NULL,
  `semesterid` int(2) DEFAULT NULL,
  `is_active` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `identitas`
--

CREATE TABLE `identitas` (
  `id` int(4) NOT NULL,
  `tglraport` date DEFAULT NULL,
  `kepsek` varchar(255) NOT NULL,
  `sekolah` varchar(100) NOT NULL,
  `is_active` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `identitas`
--

INSERT INTO `identitas` (`id`, `tglraport`, `kepsek`, `sekolah`, `is_active`) VALUES
(1, '2023-07-28', 'Irma Rusdiana, S.Pd', 'SMA Muhammadiyah 1 Taman', 0),
(2, '2023-07-13', 'Irma Rusdiana, S.Pd', 'SMA Muhammadiyah 1 Taman', 0),
(3, '2023-05-16', 'Irma Rusdiana, S.Pd', 'SMA Muhammadiyah 1 Taman', 1),
(4, '2023-05-03', 'Irma Rusdiana, S.Pd', 'SMA Muhammadiyah 1 Taman', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurusan`
--

CREATE TABLE `jurusan` (
  `id` int(4) NOT NULL,
  `jurusan` varchar(255) NOT NULL,
  `is_active` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jurusan`
--

INSERT INTO `jurusan` (`id`, `jurusan`, `is_active`) VALUES
(1, 'UMUM', 1),
(2, 'MIPA', 1),
(3, 'SOSIAL', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id` int(6) NOT NULL,
  `kelas` varchar(50) NOT NULL,
  `is_active` int(4) DEFAULT NULL,
  `jurusanid` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id`, `kelas`, `is_active`, `jurusanid`) VALUES
(1, 'X IPA 1', 0, 1),
(2, 'X IPA 2', 1, 1),
(3, 'X IPA 3', 1, 1),
(4, 'X IPA 4', 1, 1),
(5, 'X IPA 1', 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mapel`
--

CREATE TABLE `mapel` (
  `id` int(4) NOT NULL,
  `mata_pelajaran` varchar(50) NOT NULL,
  `kelompok` varchar(50) DEFAULT NULL,
  `is_active` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mapel`
--

INSERT INTO `mapel` (`id`, `mata_pelajaran`, `kelompok`, `is_active`) VALUES
(1, 'Pendidikan Agama dan Budi Pekerti', 'Kelompok A', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE `menu` (
  `id` int(3) NOT NULL,
  `menu` varchar(20) NOT NULL,
  `icon` varchar(100) NOT NULL,
  `is_active` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`id`, `menu`, `icon`, `is_active`) VALUES
(1, 'Dashboard', 'menu-icon tf-icons bx bx-home-circle', 1),
(2, 'Access', 'menu-icon tf-icon bx bx-lock-open-alt', 1),
(3, 'Users', 'menu-icon tf-icons bx bx-user-check', 1),
(4, 'Master', 'menu-icon tf-icons bx bx-box', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `role`
--

CREATE TABLE `role` (
  `id` int(2) NOT NULL,
  `role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `role`
--

INSERT INTO `role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Guru');

-- --------------------------------------------------------

--
-- Struktur dari tabel `semester`
--

CREATE TABLE `semester` (
  `id` int(2) NOT NULL,
  `semester` varchar(10) DEFAULT NULL,
  `is_active` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `semester`
--

INSERT INTO `semester` (`id`, `semester`, `is_active`) VALUES
(1, 'Ganjil', 1),
(2, 'Genap', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `submenu`
--

CREATE TABLE `submenu` (
  `id` int(3) NOT NULL,
  `menu_id` int(3) NOT NULL,
  `title` varchar(100) NOT NULL,
  `url` varchar(100) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `submenu`
--

INSERT INTO `submenu` (`id`, `menu_id`, `title`, `url`, `is_active`) VALUES
(1, 1, 'Dashboard', 'dashboard', 1),
(2, 2, 'Menu', 'access/menu', 1),
(3, 2, 'Submenu', 'access/submenu', 1),
(4, 2, 'Useraccess', 'access/useraccess', 1),
(5, 3, 'guru', 'users/guru', 1),
(6, 3, 'siswa', 'users/siswa', 1),
(7, 4, 'Tahun Ajaran', 'master/tahunajaran', 1),
(8, 4, 'Mata Pelajaran', 'master/matapelajaran', 1),
(9, 4, 'Kelas', 'master/kelas', 1),
(10, 4, 'Jurusan', 'master/jurusan', 1),
(11, 4, 'Identitas Sekolah', 'master/identitassekolah', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tapel`
--

CREATE TABLE `tapel` (
  `id` int(4) NOT NULL,
  `tahunpelajaran` varchar(50) NOT NULL,
  `semesterid` int(2) DEFAULT NULL,
  `is_active` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tapel`
--

INSERT INTO `tapel` (`id`, `tahunpelajaran`, `semesterid`, `is_active`) VALUES
(1, '2022/2023', 1, 0),
(2, '2022/2023', 1, 1),
(3, '2022/2023', 2, 1),
(4, '2023/2024', 1, 1),
(5, '2023/2024', 2, 1),
(6, '2024/2025', 1, 1),
(7, '2024/2025', 2, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(5) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jk` varchar(7) DEFAULT NULL,
  `is_active` int(1) DEFAULT NULL,
  `role_id` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `nama`, `jk`, `is_active`, `role_id`) VALUES
(1, 'admin', '$2y$10$EN9iU58nPzhTh7yIiX7JIu65jFL4Vv8oO0J4ZaDWfhB', 'admin', NULL, 1, 1),
(2, 'ekstra', '$2y$10$4hLMkOft.TC1e7DjCtVtyeCE2EiPLSYgmLd.wL0C6Ur', 'Admin Ekstrakurikuler', NULL, 1, 1),
(3, '043', '$2y$10$n0aQYFnBO0fJ3M8hk8doeO9LNgT86us/4qJaOEUSAoQ', 'Drs. Zainal', NULL, 0, 2),
(4, '111', '$2y$10$e4qwcWzS6cOM.cEdiAcgXu3.aP0UzX.fCOUws7luneE', 'Irma Rusdiana, S.Pd', NULL, 1, 2),
(5, '050', '$2y$10$Y0325ivPJwRc88xwx2j3peIHkfCMwgow29RrS041vaS', 'Kholidah, M.Pd', NULL, 1, 2),
(6, '017', '$2y$10$tgYJSowtYG3nbvgu4S4pOOfR2lwfJsqazpuvU8MAB/d', 'Drs. Agus Setyobudi, M.M', NULL, 1, 2),
(7, '056', '$2y$10$WGCYz0S6nI9gmyAo/I/AtenCQsekOZWnm5bqGdbE5QG', 'Dra. Sijastuti Antinarro', NULL, 1, 2),
(8, '031', '$2y$10$AU/Jh.70lrLM/nfw1ApiyubaDRf.k7RGGn1t7BgKsUW', 'Drs. Wahyu Cahyono, M.M', NULL, 1, 2),
(9, '055', '$2y$10$UhOQVo9VUbPETKEzp8zQGOh/ZQrdcKdK2Q88QPy6zKr', 'Mu\'ad Sahlan, M.Pd', NULL, 1, 2),
(10, '058', '$2y$10$chf9VVN1X1JAB/FQm6wYcO0DbmpZp0Fl/0HTSEB759t', 'Miftahol Jannah, S.Ag., M.Pd', NULL, 1, 2),
(11, '089', '$2y$10$NX13OaJ4.BlFNZYr3ovTRed8rL6xn.5TLMjYdX6UiyS', 'Tri Wahyuningsih, S.Pd', NULL, 1, 2),
(12, '092', '$2y$10$meF0FFwl/TbWisSzUigAMO8jr0FfuTyfnoFaCux5HzX', 'Chusnul Utami, S.Pd', NULL, 1, 2),
(13, '099', '$2y$10$KaXnowzDtMdd7CbTMDH9weNX9aOvA.y1rAzFBpbNOA.', 'Mokhamad Ikhuwan, S.Pd', NULL, 1, 2);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `gurumengajar`
--
ALTER TABLE `gurumengajar`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `identitas`
--
ALTER TABLE `identitas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `submenu`
--
ALTER TABLE `submenu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_id` (`menu_id`);

--
-- Indeks untuk tabel `tapel`
--
ALTER TABLE `tapel`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `gurumengajar`
--
ALTER TABLE `gurumengajar`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `identitas`
--
ALTER TABLE `identitas`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `mapel`
--
ALTER TABLE `mapel`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `role`
--
ALTER TABLE `role`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `semester`
--
ALTER TABLE `semester`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `submenu`
--
ALTER TABLE `submenu`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tapel`
--
ALTER TABLE `tapel`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `submenu`
--
ALTER TABLE `submenu`
  ADD CONSTRAINT `submenu_ibfk_1` FOREIGN KEY (`menu_id`) REFERENCES `menu` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
