-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 07 Agu 2024 pada 17.02
-- Versi Server: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `spk-pm1`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `hitung`
--

CREATE TABLE IF NOT EXISTS `hitung` (
`id_hitung` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `faktor` varchar(20) NOT NULL,
  `rata_rata` double NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `hitung`
--

INSERT INTO `hitung` (`id_hitung`, `id_karyawan`, `id_kriteria`, `faktor`, `rata_rata`) VALUES
(5, 56, 6, 'Core', 5.5),
(6, 56, 6, 'Secondary', 5.5),
(7, 56, 7, 'Core', 5.5),
(8, 56, 7, 'Secondary', 4.5),
(9, 52, 6, 'Core', 5.75),
(10, 52, 6, 'Secondary', 5.5),
(11, 52, 7, 'Core', 6),
(12, 52, 7, 'Secondary', 4.5),
(13, 53, 6, 'Core', 5.5),
(14, 53, 6, 'Secondary', 6),
(15, 53, 7, 'Core', 5.75),
(16, 53, 7, 'Secondary', 5.5),
(17, 59, 6, 'Core', 2.5),
(18, 59, 6, 'Secondary', 3),
(19, 59, 7, 'Core', 3),
(20, 59, 7, 'Secondary', 4),
(21, 62, 6, 'Core', 2.5),
(22, 62, 6, 'Secondary', 3),
(23, 62, 7, 'Core', 3),
(24, 62, 7, 'Secondary', 4),
(25, 61, 6, 'Core', 2.5),
(26, 61, 6, 'Secondary', 3),
(27, 61, 7, 'Core', 3),
(28, 61, 7, 'Secondary', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `hitung_saw`
--

CREATE TABLE IF NOT EXISTS `hitung_saw` (
`id_normalisasi` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `id_subkriteria` int(11) NOT NULL,
  `nilai_normalisasi` varchar(50) NOT NULL,
  `nilai_preverensi` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=586 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `hitung_saw`
--

INSERT INTO `hitung_saw` (`id_normalisasi`, `id_karyawan`, `id_kriteria`, `id_subkriteria`, `nilai_normalisasi`, `nilai_preverensi`) VALUES
(514, 52, 4, 5, '0.5', '0.2'),
(515, 53, 4, 5, '1', '0.4'),
(516, 54, 4, 5, '0.75', '0.3'),
(517, 55, 4, 5, '0.25', '0.1'),
(518, 56, 4, 5, '1', '0.4'),
(519, 57, 4, 5, '0.25', '0.1'),
(520, 58, 4, 5, '0.5', '0.2'),
(521, 52, 4, 6, '1', '0.3'),
(522, 53, 4, 6, '0.25', '0.075'),
(523, 54, 4, 6, '0.25', '0.075'),
(524, 55, 4, 6, '0.25', '0.075'),
(525, 56, 4, 6, '0.5', '0.15'),
(526, 57, 4, 6, '1', '0.3'),
(527, 58, 4, 6, '0.25', '0.075'),
(528, 52, 4, 9, '1', '0.3'),
(529, 53, 4, 9, '1', '0.3'),
(530, 54, 4, 9, '1', '0.3'),
(531, 55, 4, 9, '0.8', '0.24'),
(532, 56, 4, 9, '1', '0.3'),
(533, 57, 4, 9, '1', '0.3'),
(534, 58, 4, 9, '0.8', '0.24'),
(553, 59, 4, 5, '0.66666666666667', '0.26666666666667'),
(554, 60, 4, 5, '0.66666666666667', '0.26666666666667'),
(555, 61, 4, 5, '1', '0.4'),
(556, 62, 4, 5, '1', '0.4'),
(557, 59, 4, 6, '1', '0.3'),
(558, 60, 4, 6, '1', '0.3'),
(559, 61, 4, 6, '1', '0.3'),
(560, 62, 4, 6, '1', '0.3'),
(561, 59, 4, 9, '0.6', '0.18'),
(562, 60, 4, 9, '0.6', '0.18'),
(563, 61, 4, 9, '1', '0.3'),
(564, 62, 4, 9, '1', '0.3'),
(580, 63, 4, 5, '1', '0.4'),
(581, 63, 4, 6, '1', '0.3'),
(582, 63, 4, 9, '1', '0.3'),
(583, 65, 4, 5, '0.8', '0.32'),
(584, 65, 4, 6, '1', '0.3'),
(585, 65, 4, 9, '1', '0.3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan`
--

CREATE TABLE IF NOT EXISTS `karyawan` (
`id_karyawan` int(11) NOT NULL,
  `nama_karyawan` varchar(100) NOT NULL,
  `periode` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `karyawan`
--

INSERT INTO `karyawan` (`id_karyawan`, `nama_karyawan`, `periode`) VALUES
(63, 'Ibu bertha', '01-25'),
(65, 'ibu yelly', '01-25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kriteria`
--

CREATE TABLE IF NOT EXISTS `kriteria` (
`id_kriteria` int(11) NOT NULL,
  `nama_kriteria` varchar(100) NOT NULL,
  `nilai_kriteria` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `nama_kriteria`, `nilai_kriteria`) VALUES
(6, 'Kemampuan dan Kecerdasan', 40),
(7, 'Perilaku', 60);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kriteria_saw`
--

CREATE TABLE IF NOT EXISTS `kriteria_saw` (
`id_kriteria` int(11) NOT NULL,
  `nama_kriteria` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kriteria_saw`
--

INSERT INTO `kriteria_saw` (`id_kriteria`, `nama_kriteria`) VALUES
(4, 'Kualifikasi dan Pendidikan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kuota`
--

CREATE TABLE IF NOT EXISTS `kuota` (
`id_kuota` int(11) NOT NULL,
  `nilai` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kuota`
--

INSERT INTO `kuota` (`id_kuota`, `nilai`) VALUES
(1, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai_akhir`
--

CREATE TABLE IF NOT EXISTS `nilai_akhir` (
`id_nilai_akhir` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `nilai_total` double NOT NULL,
  `nilai_akhir` double NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `nilai_akhir`
--

INSERT INTO `nilai_akhir` (`id_nilai_akhir`, `id_karyawan`, `id_kriteria`, `nilai_total`, `nilai_akhir`) VALUES
(3, 56, 6, 5.5, 2.2),
(4, 56, 7, 5.1, 3.06),
(5, 52, 6, 5.65, 2.26),
(6, 52, 7, 5.4, 3.24),
(7, 53, 6, 5.7, 2.28),
(8, 53, 7, 5.65, 3.39),
(9, 59, 6, 2.7, 1.08),
(10, 59, 7, 3.4, 2.04),
(11, 62, 6, 2.7, 1.08),
(12, 62, 7, 3.4, 2.04),
(13, 61, 6, 2.7, 1.08),
(14, 61, 7, 3.4, 2.04);

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai_gap`
--

CREATE TABLE IF NOT EXISTS `nilai_gap` (
`id_gap` int(11) NOT NULL,
  `selisih_gap` int(11) NOT NULL,
  `nilai_gap` double NOT NULL,
  `keterangan` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `nilai_gap`
--

INSERT INTO `nilai_gap` (`id_gap`, `selisih_gap`, `nilai_gap`, `keterangan`) VALUES
(10, 0, 6, 'Tidak ada selisih (kompetensi sesuai dengan yang dibutuhkan)'),
(11, 1, 5.5, 'Kompetensi individu kelebihan 1 tingkat'),
(12, -1, 5, 'Kompetensi individu kekurangan 1 tingkat'),
(13, 2, 4.5, 'Kompetensi individu kelebihan 2 tingkat'),
(14, -2, 4, 'Kompetensi individu kekurangan 2 tingkat'),
(15, 3, 3.5, 'Kompetensi individu kelebihan 3 tingkat'),
(18, -3, 3, 'Kompetensi individu kekurangan 3 tingkat'),
(19, 4, 2.5, 'Kompetensi individu kelebihan 4 tingkat'),
(20, -4, 2, 'Kompetensi individu kekurangan 4 tingkat'),
(21, 5, 1.5, 'Kompetensi individu kelebihan 5 tingkat'),
(22, -5, 1, 'Kompetensi individu kekurangan 5 tingkat');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penerimaan`
--

CREATE TABLE IF NOT EXISTS `penerimaan` (
`id_penerimaan` int(11) NOT NULL,
  `usia` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `id_subkriteria` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penerimaan`
--

INSERT INTO `penerimaan` (`id_penerimaan`, `usia`, `id_karyawan`, `id_kriteria`, `id_subkriteria`) VALUES
(22, 26, 52, 4, 9),
(23, 23, 53, 4, 9),
(24, 23, 54, 4, 9),
(25, 19, 55, 4, 9),
(26, 27, 56, 4, 9),
(27, 25, 57, 4, 9),
(28, 21, 58, 4, 9),
(29, 21, 59, 4, 9),
(30, 22, 60, 4, 9),
(31, 30, 61, 4, 9),
(32, 31, 62, 4, 9),
(33, 40, 63, 4, 9),
(34, 37, 65, 4, 9);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penilaian`
--

CREATE TABLE IF NOT EXISTS `penilaian` (
`id_penilaian` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `id_subkriteria` int(11) NOT NULL,
  `nilai` int(11) NOT NULL,
  `selisih` double NOT NULL,
  `nilai_gap` double NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penilaian`
--

INSERT INTO `penilaian` (`id_penilaian`, `id_karyawan`, `id_kriteria`, `id_subkriteria`, `nilai`, `selisih`, `nilai_gap`) VALUES
(13, 56, 6, 21, 3, -1, 5),
(14, 56, 6, 22, 5, 1, 5.5),
(15, 56, 6, 23, 5, 0, 6),
(16, 56, 7, 24, 3, -1, 5),
(17, 56, 7, 25, 4, 0, 6),
(18, 56, 7, 26, 5, 2, 4.5),
(19, 52, 6, 21, 5, 1, 5.5),
(20, 52, 6, 22, 5, 1, 5.5),
(21, 52, 6, 23, 5, 0, 6),
(22, 52, 7, 24, 4, 0, 6),
(23, 52, 7, 25, 4, 0, 6),
(24, 52, 7, 26, 5, 2, 4.5),
(25, 53, 6, 21, 4, 0, 6),
(26, 53, 6, 22, 4, 0, 6),
(27, 53, 6, 23, 4, -1, 5),
(28, 53, 7, 24, 5, 1, 5.5),
(29, 53, 7, 25, 4, 0, 6),
(30, 53, 7, 26, 4, 1, 5.5),
(31, 59, 6, 21, 1, -3, 3),
(32, 59, 6, 22, 1, -3, 3),
(33, 59, 6, 23, 1, -4, 2),
(34, 59, 7, 24, 1, -3, 3),
(35, 59, 7, 25, 1, -3, 3),
(36, 59, 7, 26, 1, -2, 4),
(37, 62, 6, 21, 1, -3, 3),
(38, 62, 6, 22, 1, -3, 3),
(39, 62, 6, 23, 1, -4, 2),
(40, 62, 7, 24, 1, -3, 3),
(41, 62, 7, 25, 1, -3, 3),
(42, 62, 7, 26, 1, -2, 4),
(43, 61, 6, 21, 1, -3, 3),
(44, 61, 6, 22, 1, -3, 3),
(45, 61, 6, 23, 1, -4, 2),
(46, 61, 7, 24, 1, -3, 3),
(47, 61, 7, 25, 1, -3, 3),
(48, 61, 7, 26, 1, -2, 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penilaian_saw`
--

CREATE TABLE IF NOT EXISTS `penilaian_saw` (
`id_penilaian` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `id_subkriteria` int(11) NOT NULL,
  `nilai` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=413 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penilaian_saw`
--

INSERT INTO `penilaian_saw` (`id_penilaian`, `id_kriteria`, `id_subkriteria`, `nilai`, `id_karyawan`) VALUES
(374, 4, 5, 2, 52),
(375, 4, 6, 4, 52),
(376, 4, 9, 4, 52),
(377, 4, 5, 4, 53),
(378, 4, 6, 1, 53),
(379, 4, 9, 4, 53),
(380, 4, 5, 3, 54),
(381, 4, 6, 1, 54),
(382, 4, 9, 4, 54),
(383, 4, 5, 1, 55),
(384, 4, 6, 1, 55),
(385, 4, 9, 5, 55),
(386, 4, 5, 4, 56),
(387, 4, 6, 2, 56),
(388, 4, 9, 4, 56),
(389, 4, 5, 1, 57),
(390, 4, 6, 4, 57),
(391, 4, 9, 4, 57),
(392, 4, 5, 2, 58),
(393, 4, 6, 1, 58),
(394, 4, 9, 5, 58),
(395, 4, 5, 2, 59),
(396, 4, 6, 1, 59),
(397, 4, 9, 5, 59),
(398, 4, 5, 2, 60),
(399, 4, 6, 1, 60),
(400, 4, 9, 5, 60),
(401, 4, 5, 3, 61),
(402, 4, 6, 1, 61),
(403, 4, 9, 3, 61),
(404, 4, 5, 3, 62),
(405, 4, 6, 1, 62),
(406, 4, 9, 3, 62),
(407, 4, 5, 5, 63),
(408, 4, 6, 5, 63),
(409, 4, 9, 1, 63),
(410, 4, 5, 4, 65),
(411, 4, 6, 5, 65),
(412, 4, 9, 1, 65);

-- --------------------------------------------------------

--
-- Struktur dari tabel `rangking`
--

CREATE TABLE IF NOT EXISTS `rangking` (
`id_rangking` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `nilai_rangking` double NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rangking`
--

INSERT INTO `rangking` (`id_rangking`, `id_karyawan`, `nilai_rangking`) VALUES
(2, 56, 5.26),
(3, 52, 5.5),
(4, 53, 5.67),
(5, 59, 3.12),
(6, 62, 3.12),
(7, 61, 3.12);

-- --------------------------------------------------------

--
-- Struktur dari tabel `rangking_saw`
--

CREATE TABLE IF NOT EXISTS `rangking_saw` (
`id_rangking` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `nilai_rangking` float NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=494 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rangking_saw`
--

INSERT INTO `rangking_saw` (`id_rangking`, `id_karyawan`, `nilai_rangking`) VALUES
(470, 52, 0.8),
(471, 53, 0.775),
(472, 54, 0.675),
(473, 55, 0.415),
(474, 56, 0.85),
(475, 57, 0.7),
(476, 58, 0.515),
(483, 59, 0.746667),
(484, 60, 0.746667),
(485, 61, 1),
(486, 62, 1),
(492, 63, 1),
(493, 65, 0.92);

-- --------------------------------------------------------

--
-- Struktur dari tabel `subkriteria`
--

CREATE TABLE IF NOT EXISTS `subkriteria` (
`id_subkriteria` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `nama_subkriteria` varchar(100) NOT NULL,
  `faktor` varchar(50) NOT NULL,
  `nilai_subkriteria` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `subkriteria`
--

INSERT INTO `subkriteria` (`id_subkriteria`, `id_kriteria`, `nama_subkriteria`, `faktor`, `nilai_subkriteria`) VALUES
(21, 6, 'Kreativitas dan Inovasi', 'Core', 4),
(22, 6, 'Pengetahuan Teknis', 'Secondary', 4),
(23, 6, 'Kemampuan Komunikasi', 'Core', 5),
(24, 7, 'Kepercayaan Diri', 'Core', 4),
(25, 7, 'Tata Krama dan Etika', 'Core', 4),
(26, 7, 'Keramahan', 'Secondary', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `subkriteria_saw`
--

CREATE TABLE IF NOT EXISTS `subkriteria_saw` (
`id_subkriteria` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `nama_subkriteria` varchar(100) NOT NULL,
  `atribut` varchar(50) NOT NULL,
  `persentase` int(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `subkriteria_saw`
--

INSERT INTO `subkriteria_saw` (`id_subkriteria`, `id_kriteria`, `nama_subkriteria`, `atribut`, `persentase`) VALUES
(5, 4, 'Pengalaman Kerja', 'Benefit', 40),
(6, 4, 'Pendidikan', 'Benefit', 30),
(9, 4, 'Usia', 'Cost', 30);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(22, 'manager', 'manager@mail.com', 'default.jpg', '$2y$10$Qk7Gb6Sjryw/7k4c/JWFo.CsU6nh6bSoseInAEh2OFfWulJhJPRR6', 1, 1, 1615522442),
(29, 'admin', 'admin@mail.com', 'default.jpg', '$2y$10$rY4MprdQ0b2ZNqe4B8.y8.YK3TBT7.T8lmezJOzPjUux5sZlA0gRO', 3, 1, 1615535854);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_access_menu`
--

CREATE TABLE IF NOT EXISTS `user_access_menu` (
`id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(13, 2, 2),
(21, 1, 5),
(25, 1, 6),
(27, 2, 6),
(28, 2, 7),
(29, 2, 5),
(58, 3, 2),
(60, 3, 8),
(61, 1, 7),
(62, 3, 3),
(63, 1, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_menu`
--

CREATE TABLE IF NOT EXISTS `user_menu` (
`id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Manager'),
(2, 'Admin'),
(3, 'User'),
(4, 'Menu'),
(5, 'Wawancara'),
(6, 'User_management'),
(7, 'Laporan'),
(8, 'Penerimaan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE IF NOT EXISTS `user_role` (
`id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Manager'),
(3, 'Admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_sub_menu`
--

CREATE TABLE IF NOT EXISTS `user_sub_menu` (
`id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL,
  `urutan` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`, `urutan`) VALUES
(1, 1, 'Beranda', 'manager', 'fas fa-fw fa-tachometer-alt', 1, 1),
(2, 3, 'Profil Saya', 'user', 'fas fa-fw fa-user', 1, 3),
(3, 3, 'Ubah Profil', 'user/edit', 'fas fa-fw fa-user-edit', 1, 4),
(4, 4, 'Menu Management', 'menu', 'fas fa-fw fa-folder', 1, 6),
(5, 4, 'Submenu Management', 'menu/submenu', 'fas fa-fw fa-folder-open', 1, 7),
(7, 1, 'Role', 'manager/role', 'fas fa-fw fa-user-tie', 1, 2),
(8, 3, 'Ubah Kata Sandi', 'user/changepassword', 'fas fa-fw fa-key', 1, 5),
(9, 5, 'Kriteria', 'wawancara/kriteria', 'fas fa-fw fa-file', 1, 8),
(10, 5, 'Sub Kriteria', 'wawancara/subkriteria', 'fas fa-fw fa-file-alt', 1, 9),
(11, 8, 'Pelamar', 'penerimaan/karyawan', 'fas fa-fw fa-users', 1, 11),
(12, 5, 'Nilai GAP', 'wawancara/nilaigap', 'fas fa-fw fa-book', 1, 10),
(13, 5, 'Penilaian', 'wawancara/penilaian', 'fas fa-fw fa-print', 1, 12),
(14, 6, 'User', 'user_management', 'fas fa-user-edit', 1, 0),
(16, 7, 'Laporan', 'laporan', 'fas fa-paste', 1, 0),
(17, 8, 'Kriteria SAW', 'penerimaan/kriteria_saw', 'fas fa-fw fa-file', 1, 0),
(18, 8, 'Sub Kriteria SAW', 'penerimaan/subkriteria_saw', 'fas fa-fw fa-file-alt', 1, 0),
(20, 8, 'Penilaian SAW', 'penerimaan/penilaian_saw', 'fas fa-fw fa-file', 1, 0),
(22, 2, 'Beranda', 'admin', 'fas fa-fw fa-tachometer-alt', 1, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_token`
--

CREATE TABLE IF NOT EXISTS `user_token` (
`id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `wawancara`
--

CREATE TABLE IF NOT EXISTS `wawancara` (
`id_wawancara` int(11) NOT NULL,
  `id_subkriteria` int(11) NOT NULL,
  `nama_penilaian` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=87 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `wawancara`
--

INSERT INTO `wawancara` (`id_wawancara`, `id_subkriteria`, `nama_penilaian`) VALUES
(44, 21, 'Mampu menghasilkan ide-ide baru dan orisinal.'),
(45, 21, 'Menyampaikan ide-ide mereka dengan jelas dan ringkas.'),
(46, 21, 'Mampu melihat masalah dari berbagai sudut pandang.'),
(47, 21, 'Berani mengambil risiko dan mencoba ide-ide baru'),
(48, 21, 'Termotivasi untuk mencapai hasil yang terbaik.'),
(49, 21, 'Belajar dari kegagalan dan menggunakannya untuk meningkatkan diri.'),
(50, 21, 'Mampu mengatasi hambatan dan rintangan dengan cara yang kreatif.'),
(51, 22, 'Mampu menjawab pertanyaan teknis tentang produk atau layanan dengan meyakinkan.'),
(52, 22, 'Mampu menjelaskan produk atau layanan dengan cara yang jelas, ringkas, dan mudah dipahami.'),
(53, 22, 'Mampu mengidentifikasi kebutuhan dan permasalahan calon pelanggan.'),
(54, 22, 'Memahami tren industri dan kondisi pasar yang relevan dengan produk atau layanan yang ditawarkan.'),
(55, 22, 'Mengetahui harga produk, program promosi, dan kebijakan penjualan perusahaan.'),
(56, 22, 'Mengetahui profil pesaing utama dan strategi penjualan mereka.'),
(57, 22, 'Menawarkan solusi yang tepat dan sesuai dengan kebutuhan calon pelanggan.'),
(58, 23, 'Mampu menyampaikan ide dan gagasan dengan cara yang jelas dan mudah dipahami.'),
(59, 23, 'Mampu berbicara dengan lancar dan tanpa ragu-ragu.'),
(60, 23, 'Memperhatikan reaksi audiens dan menyesuaikan pesan sesuai kebutuhan.'),
(61, 23, 'Menghindari penggunaan kata-kata yang tidak perlu dan jeda yang terlalu lama.'),
(62, 23, 'Menjaga tempo bicara yang baik dan tidak terlalu cepat atau lambat.'),
(63, 23, 'Mampu menunjukkan rasa percaya diri saat berbicara.'),
(65, 23, 'Mampu membangkitkan minat dari audiens.'),
(66, 24, 'Mampu berbicara dengan lancar dan jelas, tanpa ragu-ragu atau terbata-bata.'),
(67, 24, 'Menggunakan suara yang jelas dan intonasi yang tepat.'),
(68, 24, 'Menunjukkan bahasa tubuh positif dan terbuka, postur tubuh yang tegap, senyuman, dan gestur tangan yang natural.'),
(69, 24, 'Memiliki keyakinan yang kuat pada kemampuan diri untuk mencapai tujuan.'),
(70, 24, 'Tidak mudah terpengaruh oleh pendapat orang lain.'),
(71, 24, 'Menjaga kontak mata dengan lawan bicara.'),
(72, 24, 'Menunjukkan sikap mental yang positif, seperti optimisme, antusiasme, dan kegigihan.'),
(73, 25, 'Tepat waktu.'),
(74, 25, 'Berpakaian rapi dan profesional.'),
(75, 25, 'Menggunakan bahasa tubuh yang sopan dan menghormati.'),
(76, 25, 'Menjaga kontak mata dengan pewawancara.'),
(77, 25, 'Berbicara dengan nada suara yang sopan dan santun.'),
(78, 25, 'Mendengarkan dengan seksama saat pewawancara berbicara.'),
(79, 25, 'Menggunakan bahasa yang sopan dan tidak menyinggung.'),
(80, 26, 'Tersenyum dan menyapa orang lain dengan ramah.'),
(81, 26, 'Menunjukkan antusiasme saat berbicara dengan orang lain.'),
(82, 26, 'Menggunakan bahasa tubuh yang terbuka dan ramah.'),
(83, 26, 'Menunjukkan minat pada apa yang orang lain katakan.'),
(84, 26, 'Menawarkan bantuan kepada orang lain yang membutuhkan.'),
(85, 26, 'Bersedia bekerja sama dengan orang lain dan menunjukkan rasa hormat kepada mereka.'),
(86, 26, 'Menunjukkan sikap yang positif dan optimis, bahkan dalam situasi yang sulit.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hitung`
--
ALTER TABLE `hitung`
 ADD PRIMARY KEY (`id_hitung`);

--
-- Indexes for table `hitung_saw`
--
ALTER TABLE `hitung_saw`
 ADD PRIMARY KEY (`id_normalisasi`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
 ADD PRIMARY KEY (`id_karyawan`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
 ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `kriteria_saw`
--
ALTER TABLE `kriteria_saw`
 ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `kuota`
--
ALTER TABLE `kuota`
 ADD PRIMARY KEY (`id_kuota`);

--
-- Indexes for table `nilai_akhir`
--
ALTER TABLE `nilai_akhir`
 ADD PRIMARY KEY (`id_nilai_akhir`);

--
-- Indexes for table `nilai_gap`
--
ALTER TABLE `nilai_gap`
 ADD PRIMARY KEY (`id_gap`);

--
-- Indexes for table `penerimaan`
--
ALTER TABLE `penerimaan`
 ADD PRIMARY KEY (`id_penerimaan`);

--
-- Indexes for table `penilaian`
--
ALTER TABLE `penilaian`
 ADD PRIMARY KEY (`id_penilaian`);

--
-- Indexes for table `penilaian_saw`
--
ALTER TABLE `penilaian_saw`
 ADD PRIMARY KEY (`id_penilaian`);

--
-- Indexes for table `rangking`
--
ALTER TABLE `rangking`
 ADD PRIMARY KEY (`id_rangking`);

--
-- Indexes for table `rangking_saw`
--
ALTER TABLE `rangking_saw`
 ADD PRIMARY KEY (`id_rangking`);

--
-- Indexes for table `subkriteria`
--
ALTER TABLE `subkriteria`
 ADD PRIMARY KEY (`id_subkriteria`);

--
-- Indexes for table `subkriteria_saw`
--
ALTER TABLE `subkriteria_saw`
 ADD PRIMARY KEY (`id_subkriteria`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wawancara`
--
ALTER TABLE `wawancara`
 ADD PRIMARY KEY (`id_wawancara`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hitung`
--
ALTER TABLE `hitung`
MODIFY `id_hitung` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `hitung_saw`
--
ALTER TABLE `hitung_saw`
MODIFY `id_normalisasi` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=586;
--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
MODIFY `id_karyawan` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=66;
--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `kriteria_saw`
--
ALTER TABLE `kriteria_saw`
MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `kuota`
--
ALTER TABLE `kuota`
MODIFY `id_kuota` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `nilai_akhir`
--
ALTER TABLE `nilai_akhir`
MODIFY `id_nilai_akhir` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `nilai_gap`
--
ALTER TABLE `nilai_gap`
MODIFY `id_gap` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `penerimaan`
--
ALTER TABLE `penerimaan`
MODIFY `id_penerimaan` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `penilaian`
--
ALTER TABLE `penilaian`
MODIFY `id_penilaian` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `penilaian_saw`
--
ALTER TABLE `penilaian_saw`
MODIFY `id_penilaian` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=413;
--
-- AUTO_INCREMENT for table `rangking`
--
ALTER TABLE `rangking`
MODIFY `id_rangking` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `rangking_saw`
--
ALTER TABLE `rangking_saw`
MODIFY `id_rangking` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=494;
--
-- AUTO_INCREMENT for table `subkriteria`
--
ALTER TABLE `subkriteria`
MODIFY `id_subkriteria` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `subkriteria_saw`
--
ALTER TABLE `subkriteria_saw`
MODIFY `id_subkriteria` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=64;
--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `wawancara`
--
ALTER TABLE `wawancara`
MODIFY `id_wawancara` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=87;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
