-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 17, 2023 at 07:55 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ajax_lesson`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_khachhang`
--

CREATE TABLE `tbl_khachhang` (
  `khachhang_id` int(11) NOT NULL,
  `hovaten` varchar(200) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `diachi` varchar(150) NOT NULL,
  `email` varchar(100) NOT NULL,
  `ghichu` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_khachhang`
--

INSERT INTO `tbl_khachhang` (`khachhang_id`, `hovaten`, `phone`, `diachi`, `email`, `ghichu`) VALUES
(9, 'Nguyễn Ngọc Hải', '023121212', 'bình phước', 'hai@gmail.com', 'thành công'),
(11, 'tranh thanh an', '5465465465', 'ha noi', 'an@gmail.com', 'bbbb'),
(12, 'hoang', '12123112332', 'bbbb', 'g@gmail.com', '1223333333');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_quocgia`
--

CREATE TABLE `tbl_quocgia` (
  `id_quocgia` int(11) NOT NULL,
  `tenquocgia` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_quocgia`
--

INSERT INTO `tbl_quocgia` (`id_quocgia`, `tenquocgia`) VALUES
(1, 'VN'),
(2, 'Japan'),
(3, 'American');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_thudo`
--

CREATE TABLE `tbl_thudo` (
  `id_thudo` int(11) NOT NULL,
  `tenthudo` varchar(200) NOT NULL,
  `id_quocgia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_thudo`
--

INSERT INTO `tbl_thudo` (`id_thudo`, `tenthudo`, `id_quocgia`) VALUES
(1, 'Hà Nội', 1),
(2, 'Tokyo', 2),
(3, 'Washington', 3),
(4, 'Newyork', 3),
(5, 'LA', 3),
(6, 'kali', 3),
(7, 'Tphcm', 1),
(8, 'Binh phuoc', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_khachhang`
--
ALTER TABLE `tbl_khachhang`
  ADD PRIMARY KEY (`khachhang_id`);

--
-- Indexes for table `tbl_quocgia`
--
ALTER TABLE `tbl_quocgia`
  ADD PRIMARY KEY (`id_quocgia`);

--
-- Indexes for table `tbl_thudo`
--
ALTER TABLE `tbl_thudo`
  ADD PRIMARY KEY (`id_thudo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_khachhang`
--
ALTER TABLE `tbl_khachhang`
  MODIFY `khachhang_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_quocgia`
--
ALTER TABLE `tbl_quocgia`
  MODIFY `id_quocgia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_thudo`
--
ALTER TABLE `tbl_thudo`
  MODIFY `id_thudo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
