-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 02, 2024 at 08:28 AM
-- Server version: 8.0.30
-- PHP Version: 8.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_breeze_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `username`, `email`, `password`) VALUES
(4, 'alif', 'alfa@yahoo.com', '$2y$10$OhN44fJZknIBRptol09dO.gEOM1H.FDTqMT3ukn3.GVUOzbI96tda'),
(12, 'Ahmad', 'ahmad@ahzanmc.my.id', '$2y$10$FO45V/lU5ox1KEKqZRFqe.rYEiBFKSvWR/W/MOqG4bNtxGN.XZyhO'),
(13, 'psatir', 'p@gmail.com', '$2y$10$lXynybp9HWvF56GDvRZO8.J.O/c6pqOAulK0XzsY3OvZUNT.j0R42'),
(14, 'Firky', 'firky@gmail.co.id', '$2y$10$2dmN8Tr1IT6IKdGtLkpgV.NNsyQHvrC1qEZylPbd99UlOQMeqQ1km'),
(15, 'fajri', 'fajri@breezestore.com', '$2y$10$4.MaywCi/8VF1xS0Jexp6OY/oJ9DPaGkBoe9LKFmlEdOF9uWw2kr.'),
(16, 'admin', 'admin1234@gmail.com', '$2y$10$2NJW8Xx9xPmkW7t.XaEN2eApbD.EsHKee.9P/2BttsOhdpWxtm2XG'),
(17, 'orang', 'adminkominfo@gmailc.com', '$2y$10$5NF4Nw0.yC4PQYxBV0L7/uhCGmdiOGpkMv5nlkhN0WdRrX8XWvdPO');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id_kategori` int NOT NULL,
  `photo` varchar(255) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `harga` int NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_kategori`
--

INSERT INTO `tb_kategori` (`id_kategori`, `photo`, `kategori`, `harga`, `deskripsi`) VALUES
(1, '665d20759bb5f.jpeg', 'Free Fire', 120000, 'Jual Akun Free Fire || Harga 250k login FB lokasi Senduro siap cod'),
(2, '665d20eeaf8dd.jpeg', 'Mobile Legend', 100000, 'Akun Game Mobile Legend || Login FB Skill Legend Bisa COD Area Malang'),
(3, '665d391b07de7.png', 'Minecraft Premium (Bundle)', 300000, 'Minecraft Java & Bedrock Edition Windows/MAC FULL ACCESS Premium ORIGINAL BUKAN SHARING (BISA ONLINE MULTIPLAYER ALL SERVER, SEPERTI BELI DARI WEBSITE RESMI NYA, TIDAK ADA BEDA NYA, VERSI TERBARU 1.20/Diatasnya)'),
(4, '665d3e2d09a6c.png', 'Minecraft Dungeon', 320000, 'Minecraft Dungeons adalah permainan video dungeon crawler yang dikembangkan oleh Mojang Studios dan Double Eleven, dan diterbitkan oleh Xbox Game Studios. Permainan ini merupakan spin-off Minecraft untuk Nintendo Switch, PlayStation 4, Windows, dan Xbox One.'),
(5, '665d420e7c599.jpeg', 'Free fire', 550000, 'Akun Free Fire || Semua data aman dan login pakai akun Facebook'),
(7, '665da0aa0f1ff.jpeg', 'Genshin Impact', 650000, 'Game kikir'),
(8, '665da0e441ff8.jpg', 'Touch the Grass', 100000, 'Touch the Grass || Ini adalah game dimana kamu bisa merasakan petualangan dan menjelajah alam bebas'),
(9, '6663e00a49e94.jpg', 'Guardian Tales', 350000, 'Guardian Tales adalah video game role-playing aksi tahun 2020 yang dikembangkan oleh Kong Studios dan diterbitkan oleh penerbit Korea Selatan Kakao Games . Game ini awalnya diluncurkan secara terbatas di beberapa wilayah Asia Tenggara pada tanggal 24 Februari 2020 untuk iOS dan Android dan kemudian secara resmi pada tanggal 28 Juli 2020 untuk seluruh dunia.');

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id_transaksi` int NOT NULL,
  `nama_pembeli` varchar(255) NOT NULL,
  `nomorhp` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `harga` int NOT NULL,
  `status` varchar(255) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id_transaksi`, `nama_pembeli`, `nomorhp`, `alamat`, `kategori`, `harga`, `status`, `tanggal`) VALUES
(3, 'Ahmad', '081234678', 'Sawojajar Malang', 'Free Fire', 120000, '✅ Sukses', '2024-06-03'),
(4, 'Hasib', '0923628293', 'Malang', 'Mobile Legend', 100000, '✅ Sukses', '2024-06-03'),
(5, 'Fauzan', '0998765567', 'Lumajang', 'Minecraft Premium (Bundle)', 300000, '✅ Sukses', '2024-06-03'),
(6, 'Rangga', '074432432', 'Surabaya', 'Minecraft Dungeon', 320000, '✅ Sukses', '2024-06-03'),
(7, 'Ilham', '054326287', 'Semarang', 'Mobile Legend', 100000, '✅ Sukses', '2024-06-03'),
(8, 'Ahmad Naufal', '0843574356374', 'Jember', 'Genshin Impact', 500000, '✅ Sukses', '2024-06-03'),
(9, 'Hutao', '087568', 'Isekai\r\n', 'Genshin Impact', 650000, '✅ Sukses', '2024-06-07'),
(10, 'Rangga', '1234567890', 'Malang', 'Mobile Legend', 100000, '✅ Sukses', '2024-11-14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id_kategori` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `id_transaksi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
