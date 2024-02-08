-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 06, 2024 at 02:56 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sisforbk`
--

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `ID` int(5) UNSIGNED NOT NULL,
  `jadwal` date NOT NULL,
  `waktu` time NOT NULL,
  `userID` int(5) UNSIGNED NOT NULL,
  `guruBK` int(5) UNSIGNED NOT NULL,
  `permasalahan` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `ID` int(5) UNSIGNED NOT NULL,
  `kelas` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`ID`, `kelas`) VALUES
(1, 'X DPIB'),
(2, 'X TPM'),
(3, 'X TKR 1'),
(4, 'X TKR 2'),
(5, 'X TBSM'),
(6, 'X TPL'),
(7, 'X AV'),
(8, 'X TELI 1'),
(9, 'X TELI 2'),
(10, 'X TITL'),
(11, 'X TKJ 1'),
(12, 'X TKJ 2'),
(13, 'X TKJ 3'),
(14, 'X TKJ 4'),
(15, 'XI DPIB'),
(16, 'XI TPM'),
(17, 'XI TKR 1'),
(18, 'XI TKR 2'),
(19, 'XI TBSM'),
(20, 'XI TPL'),
(21, 'XI AV'),
(22, 'XI TELI 1'),
(23, 'XI TELI 2'),
(24, 'XI TITL'),
(25, 'XI TKJ 1'),
(26, 'XI TKJ 2'),
(27, 'XI TKJ 3'),
(28, 'XI TKJ 4'),
(29, 'XII DPIB'),
(30, 'XII TPM'),
(31, 'XII TKR 1'),
(32, 'XII TKR 2'),
(33, 'XII TBSM'),
(34, 'XII TPL'),
(35, 'XII AV'),
(36, 'XII TELI 1'),
(37, 'XII TELI 2'),
(38, 'XII TITL'),
(39, 'XII TKJ 1'),
(40, 'XII TKJ 2'),
(41, 'XII TKJ 3'),
(42, 'XII TKJ 4');

-- --------------------------------------------------------

--
-- Table structure for table `konseling`
--

CREATE TABLE `konseling` (
  `ID` int(5) UNSIGNED NOT NULL,
  `jadwalID` int(5) UNSIGNED NOT NULL,
  `guruBK` int(5) UNSIGNED NOT NULL,
  `pelanggaranID` int(5) UNSIGNED NOT NULL,
  `tindakan` text NOT NULL,
  `sanksi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2023-10-28-092744', 'App\\Database\\Migrations\\User', 'default', 'App', 1707184216, 1),
(2, '2023-10-28-092753', 'App\\Database\\Migrations\\Jadwal', 'default', 'App', 1707184216, 1),
(3, '2023-11-04-153103', 'App\\Database\\Migrations\\Pelanggaran', 'default', 'App', 1707184216, 1),
(4, '2023-11-04-153140', 'App\\Database\\Migrations\\Konseling', 'default', 'App', 1707184216, 1),
(5, '2023-11-17-130105', 'App\\Database\\Migrations\\KelasMigration', 'default', 'App', 1707184216, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggaran`
--

CREATE TABLE `pelanggaran` (
  `ID` int(5) UNSIGNED NOT NULL,
  `namaPelanggaran` varchar(255) NOT NULL,
  `poin` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `pelanggaran`
--

INSERT INTO `pelanggaran` (`ID`, `namaPelanggaran`, `poin`) VALUES
(1, 'Terlibat perbuatan kriminal berat atau tindak pidana, misalnya : terorisme, pembunuhan, perampokan, provokasi, provokator, dsb.', 100),
(2, 'Menyimpan, mengkonsumsi atau mengedarkan narkoba / miras di lingkungan sekolah.', 100),
(3, 'Terlibat perkelahian / tawuran di dalam maupun di luar sekolah', 100),
(4, 'Terlibat dalam perbuatan asusila dilingkungan sekolah', 100),
(5, 'Melawan dan menghina guru', 100),
(6, 'Menyimpan atau membawa senjata tajam / senjata api di lingkungan sekolah', 70),
(7, 'Melakukan pemerasan, pemaksaan, tindakan intimidasi, perundungan (Bullying) secara verbal dan non verbal terhadap siswa lain dan warga sekolah', 70),
(8, 'Mengambil barang milik orang lain maupun milik sekolah secara tidak sah.', 50),
(9, 'Membawa materi yang mengandung pornografi di lingkungan sekolah.', 50),
(10, 'Berjudi di lingkungan sekolah', 50),
(11, 'Mencemarkan nama baik sekolah.', 30),
(12, 'Melompat pagar sekolah', 25),
(13, 'Membawa dan merokok di lingkungan sekolah', 20),
(14, 'Merusak atau mengotori prasarana / sarana sekolah dan barang milik orang lain', 15),
(15, 'Menggunakan HP di jam pelajaran tanpa izin guru', 10),
(16, 'Mengganggu proses belajar mengajar', 10),
(17, 'Tidak mengikuti apel / upacara', 10),
(18, 'Bolos belajar', 10),
(19, 'Terlambat masuk sekolah', 5),
(20, 'Tidak memakai seragam sekolah, baju olahraga, dan baju praktek.', 5),
(21, '1 (satu) Ketidakhadiran (ALPA)', 5),
(22, 'Ukuran rambut pria tidak sesuai aturan sekolah', 3),
(23, 'Membawa, memakai perhiasan, aksesoris, make up, dan alat musik', 3),
(24, 'Melanggar aturan sekolah lainnya', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` int(5) UNSIGNED NOT NULL,
  `username` varchar(100) NOT NULL,
  `fullName` varchar(255) DEFAULT NULL,
  `NIS` varchar(10) DEFAULT NULL,
  `TTL` date DEFAULT NULL,
  `Bapak` varchar(255) DEFAULT NULL,
  `Ibu` varchar(255) DEFAULT NULL,
  `kelas` int(5) UNSIGNED NOT NULL,
  `Role` tinyint(1) NOT NULL DEFAULT 0,
  `Password` varchar(32) NOT NULL DEFAULT 'e10adc3949ba59abbe56e057f20f883e'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `username`, `fullName`, `NIS`, `TTL`, `Bapak`, `Ibu`, `kelas`, `Role`, `Password`) VALUES
(1, 'admin', 'Admin', NULL, NULL, NULL, NULL, 0, 1, 'e10adc3949ba59abbe56e057f20f883e'),
(2, 'user', 'Siswa', '111111', NULL, NULL, NULL, 1, 0, 'e10adc3949ba59abbe56e057f20f883e');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `jadwal_userID_foreign` (`userID`),
  ADD KEY `jadwal_guruBK_foreign` (`guruBK`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `konseling`
--
ALTER TABLE `konseling`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `konseling_jadwalID_foreign` (`jadwalID`),
  ADD KEY `konseling_pelanggaranID_foreign` (`pelanggaranID`),
  ADD KEY `konseling_guruBK_foreign` (`guruBK`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pelanggaran`
--
ALTER TABLE `pelanggaran`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `namaPelanggaran` (`namaPelanggaran`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `NIS` (`NIS`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `ID` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `ID` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `konseling`
--
ALTER TABLE `konseling`
  MODIFY `ID` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pelanggaran`
--
ALTER TABLE `pelanggaran`
  MODIFY `ID` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `jadwal_guruBK_foreign` FOREIGN KEY (`guruBK`) REFERENCES `user` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `jadwal_userID_foreign` FOREIGN KEY (`userID`) REFERENCES `user` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `konseling`
--
ALTER TABLE `konseling`
  ADD CONSTRAINT `konseling_guruBK_foreign` FOREIGN KEY (`guruBK`) REFERENCES `user` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `konseling_jadwalID_foreign` FOREIGN KEY (`jadwalID`) REFERENCES `jadwal` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `konseling_pelanggaranID_foreign` FOREIGN KEY (`pelanggaranID`) REFERENCES `pelanggaran` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
