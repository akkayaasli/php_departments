-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2020 at 06:24 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siparismarkaled`
--

-- --------------------------------------------------------

--
-- Table structure for table `kullanici_bilgileri`
--

CREATE TABLE `kullanici_bilgileri` (
  `id2` int(250) NOT NULL,
  `siparis_no` int(250) NOT NULL,
  `sifre` varchar(250) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Dumping data for table `kullanici_bilgileri`
--

INSERT INTO `kullanici_bilgileri` (`id2`, `siparis_no`, `sifre`) VALUES
(1, 2019030886, 'Markaled.1'),
(2, 2019103400, 'Markaled.2'),
(3, 2019123841, 'Markaled.3'),
(4, 2020010001, 'Markaled.4'),
(5, 2020010002, 'Markaled.5');

-- --------------------------------------------------------

--
-- Table structure for table `siparis`
--

CREATE TABLE `siparis` (
  `id` int(250) NOT NULL,
  `aa_siparis_no` int(100) NOT NULL,
  `aa_siparis_tarihi` varchar(200) COLLATE utf8_turkish_ci NOT NULL,
  `aa_musteri` varchar(200) COLLATE utf8_turkish_ci NOT NULL,
  `aa_urun_adet` int(150) NOT NULL,
  `aa_muhtemel_uretim_tarih` varchar(200) COLLATE utf8_turkish_ci NOT NULL,
  `aa_uretilen_tarih` varchar(200) COLLATE utf8_turkish_ci NOT NULL,
  `aa_teslim_montaj_ihracat_tarih` varchar(200) COLLATE utf8_turkish_ci NOT NULL,
  `aa_teslim_sekli` varchar(200) COLLATE utf8_turkish_ci NOT NULL,
  `aa_ozel_not` varchar(200) COLLATE utf8_turkish_ci NOT NULL,
  `aa_islem_tarihi` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id2` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Dumping data for table `siparis`
--

INSERT INTO `siparis` (`id`, `aa_siparis_no`, `aa_siparis_tarihi`, `aa_musteri`, `aa_urun_adet`, `aa_muhtemel_uretim_tarih`, `aa_uretilen_tarih`, `aa_teslim_montaj_ihracat_tarih`, `aa_teslim_sekli`, `aa_ozel_not`, `aa_islem_tarihi`, `updated_at`, `id2`) VALUES
(1, 2147483647, '21.03.2019', 'MY DIAMOND', 60, '05.05.2019', '10.04.2019', '06.11.2019', 'İHRACAT', '20 ADET HATLIGHT + 30 ADET RP516 CHA.', '2020-11-19 07:41:10', '2020-11-20 12:12:42', 1),
(2, 2019103400, '21.11.2019', 'MARKALED EUROPE', 8, '28.11.2019', '5.12.2019', '31.10.2020', 'İHRACAT', 'XXX', '2020-11-19 07:42:53', '2020-11-23 14:21:04', 1),
(3, 2019123841, '31.12.2019', 'SO-TEC KUYUMCU MAKİNA SAN. VE PAZ.LTD.ŞTİ', 30, '5.01.2020', '6.01.2020', '', 'İHRACAT', 'XXX', '2020-11-19 07:44:30', '2020-11-23 14:21:01', 5),
(4, 2020010001, '', 'MUHAMMED CEZAYİR', 3, '', '', '', 'İHRACAT', '', '2020-11-19 07:46:00', '2020-11-20 14:18:59', 4),
(5, 2020010002, '2.01.2020', 'İSMAİL BÜYÜKCİRİT', 35, '7.01.2020', '6.01.2020', '6.01.2020', 'KARGO', '', '2020-11-19 07:47:36', '2020-11-20 12:13:01', 5),
(8, 21000, '01.03.2020', 'Umut Ekici', 45, '01.04.2020', '01.05.2020', '01.02.2020', 'Kargo', 'Not', '2020-11-19 09:07:57', '2020-11-23 14:21:13', 2),
(9, 25, '01.06.2019', 'Aslı Akkaya', 25, '01.07.2019', '01.08.2019', '01.05.2019', 'kargo', 'Notes', '2020-11-19 09:16:31', '2020-11-23 14:21:15', 1),
(10, 25000, '01.02.2020', 'ASLI AKKAYA', 25, '01.02.2020', '01.02.2020', '01.02.2020', 'KARGO', 'NOTE', '2020-11-19 11:16:41', '2020-11-23 10:06:03', 6),
(11, 2019030886, '01.05.2020', 'John Back', 200, '01.05.2020', '01.05.2020', '01.05.2020', 'Kargo', 'Note', '2020-11-19 14:29:22', '2020-11-23 14:21:06', 4),
(12, 2019030886, '2020-11-11', 'Aslı Akkaya', 200, '2020-11-24', '2020-11-10', '2020-09-01', 'Kargo', 'Note', '2020-11-19 14:33:55', '2020-11-23 14:21:10', 3),
(13, 2020010002, '07.11.2020', 'MarkaledCompany', 18, '07.12.2020', '10.01.2021', '07.01.2021', 'İhracat', 'İhracat Ürünü', '2020-11-20 07:13:58', '2020-11-20 12:13:19', 1);

-- --------------------------------------------------------

--
-- Table structure for table `yetkili`
--

CREATE TABLE `yetkili` (
  `id` int(200) NOT NULL,
  `kullanici_no` int(200) NOT NULL,
  `sifre` varchar(200) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Dumping data for table `yetkili`
--

INSERT INTO `yetkili` (`id`, `kullanici_no`, `sifre`) VALUES
(1, 202013, 'markaled013');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kullanici_bilgileri`
--
ALTER TABLE `kullanici_bilgileri`
  ADD PRIMARY KEY (`id2`);

--
-- Indexes for table `siparis`
--
ALTER TABLE `siparis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `yetkili`
--
ALTER TABLE `yetkili`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kullanici_bilgileri`
--
ALTER TABLE `kullanici_bilgileri`
  MODIFY `id2` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `siparis`
--
ALTER TABLE `siparis`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `yetkili`
--
ALTER TABLE `yetkili`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
