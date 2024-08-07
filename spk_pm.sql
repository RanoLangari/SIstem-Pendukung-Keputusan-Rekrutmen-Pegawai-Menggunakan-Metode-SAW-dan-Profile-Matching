-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 12 Mar 2021 pada 09.14
-- Versi Server: 10.1.13-MariaDB
-- PHP Version: 7.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spk_pm`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `hitung`
--

CREATE TABLE `hitung` (
  `id_hitung` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `faktor` varchar(20) NOT NULL,
  `rata_rata` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `hitung`
--

INSERT INTO `hitung` (`id_hitung`, `id_karyawan`, `id_kriteria`, `faktor`, `rata_rata`) VALUES
(101, 1, 1, 'Core', 2),
(102, 1, 1, 'Secondary', 3.5),
(103, 1, 2, 'Core', 3.5),
(104, 1, 2, 'Secondary', 4),
(105, 1, 3, 'Core', 4.5),
(106, 1, 3, 'Secondary', 4),
(107, 1, 4, 'Core', 4.25),
(108, 1, 4, 'Secondary', 3.5),
(109, 1, 5, 'Core', 4.5),
(110, 1, 5, 'Secondary', 4),
(111, 2, 1, 'Core', 2),
(112, 2, 1, 'Secondary', 3.5),
(113, 2, 2, 'Core', 2),
(114, 2, 2, 'Secondary', 3.5),
(115, 2, 3, 'Core', 3.5),
(116, 2, 3, 'Secondary', 4.5),
(117, 2, 4, 'Core', 4.75),
(118, 2, 4, 'Secondary', 3.5),
(119, 2, 5, 'Core', 5),
(120, 2, 5, 'Secondary', 4),
(121, 3, 1, 'Core', 3.5),
(122, 3, 1, 'Secondary', 4.75),
(123, 3, 2, 'Core', 4.5),
(124, 3, 2, 'Secondary', 5),
(125, 3, 3, 'Core', 4),
(126, 3, 3, 'Secondary', 5),
(127, 3, 4, 'Core', 4.5),
(128, 3, 4, 'Secondary', 3.5),
(129, 3, 5, 'Core', 4.5),
(130, 3, 5, 'Secondary', 4),
(131, 4, 1, 'Core', 4.25),
(132, 4, 1, 'Secondary', 4.75),
(133, 4, 2, 'Core', 4.25),
(134, 4, 2, 'Secondary', 4.5),
(135, 4, 3, 'Core', 4.25),
(136, 4, 3, 'Secondary', 4),
(137, 4, 4, 'Core', 4.75),
(138, 4, 4, 'Secondary', 4.5),
(139, 4, 5, 'Core', 4.75),
(140, 4, 5, 'Secondary', 5),
(141, 5, 1, 'Core', 4.25),
(142, 5, 1, 'Secondary', 4.75),
(143, 5, 2, 'Core', 3.5),
(144, 5, 2, 'Secondary', 4),
(145, 5, 3, 'Core', 4),
(146, 5, 3, 'Secondary', 3),
(147, 5, 4, 'Core', 4.75),
(148, 5, 4, 'Secondary', 4.5),
(149, 5, 5, 'Core', 4.5),
(150, 5, 5, 'Secondary', 3),
(151, 6, 1, 'Core', 3.5),
(152, 6, 1, 'Secondary', 4.5),
(153, 6, 2, 'Core', 4.5),
(154, 6, 2, 'Secondary', 4),
(155, 6, 3, 'Core', 4),
(156, 6, 3, 'Secondary', 5),
(157, 6, 4, 'Core', 4.75),
(158, 6, 4, 'Secondary', 5),
(159, 6, 5, 'Core', 3.75),
(160, 6, 5, 'Secondary', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan`
--

CREATE TABLE `karyawan` (
  `id_karyawan` int(11) NOT NULL,
  `nama_karyawan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `karyawan`
--

INSERT INTO `karyawan` (`id_karyawan`, `nama_karyawan`) VALUES
(1, 'Melisa Hart'),
(2, 'Anggi Marito'),
(3, 'Rimar Calista'),
(4, 'Yoga'),
(5, 'Deni'),
(6, 'Budi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `nama_kriteria` varchar(100) NOT NULL,
  `nilai_kriteria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `nama_kriteria`, `nilai_kriteria`) VALUES
(1, 'Disiplin', 30),
(2, 'Kerja Sama', 25),
(3, 'Sikap', 20),
(4, 'Absensi', 15),
(5, 'Kesetiaan', 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai_akhir`
--

CREATE TABLE `nilai_akhir` (
  `id_nilai_akhir` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `nilai_total` double NOT NULL,
  `nilai_akhir` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `nilai_akhir`
--

INSERT INTO `nilai_akhir` (`id_nilai_akhir`, `id_karyawan`, `id_kriteria`, `nilai_total`, `nilai_akhir`) VALUES
(66, 1, 1, 2.6, 0.78),
(67, 1, 2, 3.7, 0.925),
(68, 1, 3, 4.3, 0.86),
(69, 1, 4, 3.95, 0.5925),
(70, 1, 5, 4.3, 0.43),
(71, 2, 1, 2.6, 0.78),
(72, 2, 2, 2.6, 0.65),
(73, 2, 3, 3.9, 0.78),
(74, 2, 4, 4.25, 0.6375),
(75, 2, 5, 4.6, 0.46),
(76, 3, 1, 4, 1.2),
(77, 3, 2, 4.7, 1.175),
(78, 3, 3, 4.4, 0.88),
(79, 3, 4, 4.1, 0.615),
(80, 3, 5, 4.3, 0.43),
(81, 4, 1, 4.45, 1.335),
(82, 4, 2, 4.35, 1.0875),
(83, 4, 3, 4.15, 0.83),
(84, 4, 4, 4.65, 0.6975),
(85, 4, 5, 4.85, 0.485),
(86, 5, 1, 4.45, 1.335),
(87, 5, 2, 3.7, 0.925),
(88, 5, 3, 3.6, 0.72),
(89, 5, 4, 4.65, 0.6975),
(90, 5, 5, 3.9, 0.39),
(91, 6, 1, 3.9, 1.17),
(92, 6, 2, 4.3, 1.075),
(93, 6, 3, 4.4, 0.88),
(94, 6, 4, 4.85, 0.7275),
(95, 6, 5, 3.85, 0.385);

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai_gap`
--

CREATE TABLE `nilai_gap` (
  `id_gap` int(11) NOT NULL,
  `selisih_gap` int(11) NOT NULL,
  `nilai_gap` double NOT NULL,
  `keterangan` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `nilai_gap`
--

INSERT INTO `nilai_gap` (`id_gap`, `selisih_gap`, `nilai_gap`, `keterangan`) VALUES
(10, 0, 5, 'Tidak ada selisih (kompetensi sesuai dengan yang dibutuhkan)'),
(11, 1, 4.5, 'Kompetensi individu kelebihan 1 tingkat'),
(12, -1, 4, 'Kompetensi individu kekurangan 1 tingkat'),
(13, 2, 3.5, 'Kompetensi individu kelebihan 2 tingkat'),
(14, -2, 3, 'Kompetensi individu kekurangan 2 tingkat'),
(15, 3, 2.5, 'Kompetensi individu kelebihan 3 tingkat'),
(18, -3, 2, 'Kompetensi individu kekurangan 3 tingkat'),
(19, 4, 1.5, 'Kompetensi individu kelebihan 4 tingkat'),
(20, -4, 1, 'Kompetensi individu kekurangan 4 tingkat');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penilaian`
--

CREATE TABLE `penilaian` (
  `id_penilaian` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `id_subkriteria` int(11) NOT NULL,
  `nilai` int(11) NOT NULL,
  `selisih` double NOT NULL,
  `nilai_gap` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penilaian`
--

INSERT INTO `penilaian` (`id_penilaian`, `id_karyawan`, `id_kriteria`, `id_subkriteria`, `nilai`, `selisih`, `nilai_gap`) VALUES
(492, 1, 1, 5, 1, -2, 3),
(493, 1, 1, 6, 1, -4, 1),
(494, 1, 1, 7, 2, -2, 3),
(495, 1, 2, 8, 3, -1, 4),
(496, 1, 2, 9, 2, -1, 4),
(497, 1, 2, 10, 2, -2, 3),
(498, 1, 3, 11, 3, -1, 4),
(499, 1, 3, 12, 4, 0, 5),
(500, 1, 3, 13, 4, -1, 4),
(501, 1, 4, 14, 5, 1, 4.5),
(502, 1, 4, 15, 3, -1, 4),
(503, 1, 4, 16, 5, 2, 3.5),
(504, 1, 5, 17, 5, 1, 4.5),
(505, 1, 5, 18, 4, -1, 4),
(506, 1, 5, 19, 5, 1, 4.5),
(507, 1, 1, 20, 3, -1, 4),
(508, 2, 1, 5, 2, -1, 4),
(509, 2, 1, 6, 2, -3, 2),
(510, 2, 1, 7, 1, -3, 2),
(511, 2, 2, 8, 1, -3, 2),
(512, 2, 2, 9, 5, 2, 3.5),
(513, 2, 2, 10, 1, -3, 2),
(514, 2, 3, 11, 5, 1, 4.5),
(515, 2, 3, 12, 2, -2, 3),
(516, 2, 3, 13, 4, -1, 4),
(517, 2, 4, 14, 5, 1, 4.5),
(518, 2, 4, 15, 4, 0, 5),
(519, 2, 4, 16, 5, 2, 3.5),
(520, 2, 5, 17, 4, 0, 5),
(521, 2, 5, 18, 4, -1, 4),
(522, 2, 5, 19, 4, 0, 5),
(523, 2, 1, 20, 2, -2, 3),
(524, 3, 1, 5, 4, 1, 4.5),
(525, 3, 1, 6, 3, -2, 3),
(526, 3, 1, 7, 3, -1, 4),
(527, 3, 2, 8, 4, 0, 5),
(528, 3, 2, 9, 3, 0, 5),
(529, 3, 2, 10, 3, -1, 4),
(530, 3, 3, 11, 4, 0, 5),
(531, 3, 3, 12, 4, 0, 5),
(532, 3, 3, 13, 3, -2, 3),
(533, 3, 4, 14, 5, 1, 4.5),
(534, 3, 4, 15, 5, 1, 4.5),
(535, 3, 4, 16, 5, 2, 3.5),
(536, 3, 5, 17, 4, 0, 5),
(537, 3, 5, 18, 4, -1, 4),
(538, 3, 5, 19, 3, -1, 4),
(539, 3, 1, 20, 4, 0, 5),
(540, 4, 1, 5, 4, 1, 4.5),
(541, 4, 1, 6, 4, -1, 4),
(542, 4, 1, 7, 5, 1, 4.5),
(543, 4, 2, 8, 3, -1, 4),
(544, 4, 2, 9, 4, 1, 4.5),
(545, 4, 2, 10, 5, 1, 4.5),
(546, 4, 3, 11, 3, -1, 4),
(547, 4, 3, 12, 5, 1, 4.5),
(548, 4, 3, 13, 4, -1, 4),
(549, 4, 4, 14, 5, 1, 4.5),
(550, 4, 4, 15, 4, 0, 5),
(551, 4, 4, 16, 4, 1, 4.5),
(552, 4, 5, 17, 5, 1, 4.5),
(553, 4, 5, 18, 5, 0, 5),
(554, 4, 5, 19, 4, 0, 5),
(555, 4, 1, 20, 4, 0, 5),
(556, 5, 1, 5, 4, 1, 4.5),
(557, 5, 1, 6, 4, -1, 4),
(558, 5, 1, 7, 5, 1, 4.5),
(559, 5, 2, 8, 3, -1, 4),
(560, 5, 2, 9, 2, -1, 4),
(561, 5, 2, 10, 2, -2, 3),
(562, 5, 3, 11, 2, -2, 3),
(563, 5, 3, 12, 4, 0, 5),
(564, 5, 3, 13, 3, -2, 3),
(565, 5, 4, 14, 5, 1, 4.5),
(566, 5, 4, 15, 4, 0, 5),
(567, 5, 4, 16, 4, 1, 4.5),
(568, 5, 5, 17, 4, 0, 5),
(569, 5, 5, 18, 3, -2, 3),
(570, 5, 5, 19, 3, -1, 4),
(571, 5, 1, 20, 4, 0, 5),
(572, 6, 1, 5, 4, 1, 4.5),
(573, 6, 1, 6, 4, -1, 4),
(574, 6, 1, 7, 2, -2, 3),
(575, 6, 2, 8, 4, 0, 5),
(576, 6, 2, 9, 2, -1, 4),
(577, 6, 2, 10, 3, -1, 4),
(578, 6, 3, 11, 4, 0, 5),
(579, 6, 3, 12, 4, 0, 5),
(580, 6, 3, 13, 3, -2, 3),
(581, 6, 4, 14, 5, 1, 4.5),
(582, 6, 4, 15, 4, 0, 5),
(583, 6, 4, 16, 3, 0, 5),
(584, 6, 5, 17, 2, -2, 3),
(585, 6, 5, 18, 4, -1, 4),
(586, 6, 5, 19, 5, 1, 4.5),
(587, 6, 1, 20, 5, 1, 4.5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `rangking`
--

CREATE TABLE `rangking` (
  `id_rangking` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `nilai_rangking` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rangking`
--

INSERT INTO `rangking` (`id_rangking`, `id_karyawan`, `nilai_rangking`) VALUES
(10, 1, 3.5875),
(11, 2, 3.3075),
(12, 3, 4.3),
(13, 4, 4.4350000000000005),
(14, 5, 4.067499999999999),
(15, 6, 4.2375);

-- --------------------------------------------------------

--
-- Struktur dari tabel `subkriteria`
--

CREATE TABLE `subkriteria` (
  `id_subkriteria` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `nama_subkriteria` varchar(100) NOT NULL,
  `faktor` varchar(50) NOT NULL,
  `nilai_subkriteria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `subkriteria`
--

INSERT INTO `subkriteria` (`id_subkriteria`, `id_kriteria`, `nama_subkriteria`, `faktor`, `nilai_subkriteria`) VALUES
(5, 1, 'Pakaian Rapi dan Sopan', 'Secondary', 3),
(6, 1, 'Tanggung Jawab', 'Core', 5),
(7, 1, 'Tepat Waktu', 'Core', 4),
(8, 2, 'Bekerja Kelompok', 'Core', 4),
(9, 2, 'Bersifat Aktif', 'Secondary', 3),
(10, 2, 'Membantu Rekan', 'Core', 4),
(11, 3, 'Tutur Kata Santun', 'Secondary', 4),
(12, 3, 'Menghormati dan Menghargai', 'Core', 4),
(13, 3, 'Etika dan Nilai Kerja', 'Core', 5),
(14, 4, 'Kehadiran Meningkat', 'Core', 4),
(15, 4, 'Memberi Keterangan Jika Tidak Hadir', 'Core', 4),
(16, 4, 'Selalu Hadir (Tidak Pernah Absen)', 'Secondary', 3),
(17, 5, 'Membela Citra Perusahaan', 'Core', 4),
(18, 5, 'Mementingkan Kepentingan Perusahaan', 'Secondary', 5),
(19, 5, 'Penyesuaian Terhadap Norma Perusahaan', 'Core', 4),
(20, 1, 'Disipin Waktu', 'Secondary', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(22, 'admin', 'admin@admin.com', 'default.jpg', '$2y$10$aL3mYFbsajB4M.PXEQicA.L/KztIESOCAb5v55nR46yCjCAiRfmvC', 1, 1, 1615522442),
(29, 'Direktur', 'direktur@direktur.com', 'default.jpg', '$2y$10$jT.mQis6CaHCR23LVC95ievjdWqCWYozmryt/fP3V7lLLOEUB3gTm', 2, 1, 1615535854),
(30, 'Admin 2', 'admin2@admin.com', 'default.jpg', '$2y$10$tUzaTeNeYyQOLibRE5p4..RM7hmpj.AihNkF/7jSwxbKPWpVLqfAq', 1, 1, 1615535886);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(12, 1, 2),
(13, 2, 2),
(14, 1, 4),
(20, 2, 6),
(21, 1, 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'Menu'),
(4, 'SPK'),
(5, 'User_management'),
(6, 'Laporan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Admin'),
(2, 'Direktur');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL,
  `urutan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`, `urutan`) VALUES
(1, 1, 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt', 1, 1),
(2, 2, 'My Profile', 'user', 'fas fa-fw fa-user', 1, 3),
(3, 2, 'Edit Profile', 'user/edit', 'fas fa-fw fa-user-edit', 1, 4),
(4, 3, 'Menu Management', 'menu', 'fas fa-fw fa-folder', 1, 6),
(5, 3, 'Submenu Management', 'menu/submenu', 'fas fa-fw fa-folder-open', 1, 7),
(7, 1, 'Role', 'admin/role', 'fas fa-fw fa-user-tie', 1, 2),
(8, 2, 'Change Password', 'user/changepassword', 'fas fa-fw fa-key', 1, 5),
(9, 4, 'Kriteria', 'spk/kriteria', 'fas fa-fw fa-file', 1, 8),
(10, 4, 'Sub Kriteria', 'spk/subkriteria', 'fas fa-fw fa-file-alt', 1, 9),
(11, 4, 'Karyawan', 'spk/karyawan', 'fas fa-fw fa-users', 1, 11),
(12, 4, 'Nilai GAP', 'spk/nilaigap', 'fas fa-fw fa-book', 1, 10),
(13, 4, 'Penilaian', 'spk/penilaian', 'fas fa-fw fa-print', 1, 12),
(14, 5, 'User', 'user_management', 'fas fa-user-edit', 1, 0),
(15, 6, 'Diagram Rangking', 'laporan/diagram', 'fas fa-chart-bar', 1, 0),
(16, 6, 'Laporan', 'laporan', 'fas fa-paste', 1, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hitung`
--
ALTER TABLE `hitung`
  ADD PRIMARY KEY (`id_hitung`);

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
-- Indexes for table `penilaian`
--
ALTER TABLE `penilaian`
  ADD PRIMARY KEY (`id_penilaian`);

--
-- Indexes for table `rangking`
--
ALTER TABLE `rangking`
  ADD PRIMARY KEY (`id_rangking`);

--
-- Indexes for table `subkriteria`
--
ALTER TABLE `subkriteria`
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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hitung`
--
ALTER TABLE `hitung`
  MODIFY `id_hitung` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=161;
--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id_karyawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `nilai_akhir`
--
ALTER TABLE `nilai_akhir`
  MODIFY `id_nilai_akhir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;
--
-- AUTO_INCREMENT for table `nilai_gap`
--
ALTER TABLE `nilai_gap`
  MODIFY `id_gap` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `penilaian`
--
ALTER TABLE `penilaian`
  MODIFY `id_penilaian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=588;
--
-- AUTO_INCREMENT for table `rangking`
--
ALTER TABLE `rangking`
  MODIFY `id_rangking` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `subkriteria`
--
ALTER TABLE `subkriteria`
  MODIFY `id_subkriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
