-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 09, 2023 at 06:56 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `market`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_admin`
--

CREATE TABLE `data_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `admin_telp` varchar(20) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_admin`
--

INSERT INTO `data_admin` (`admin_id`, `admin_name`, `username`, `password`, `admin_telp`, `admin_email`, `admin_address`) VALUES
(1, 'Ikhsan Hadi Nugraha', 'admin', 'fcea920f7412b5da7be0cf42b8c93759', '+6287881024667', 'nugrahaikhsanhadi@gmail.com', 'Lembang, Bandung Barat');

-- --------------------------------------------------------

--
-- Table structure for table `data_category`
--

CREATE TABLE `data_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_category`
--

INSERT INTO `data_category` (`category_id`, `category_name`) VALUES
(7, 'Pakaian Pria'),
(8, 'Pakaian Wanita');

-- --------------------------------------------------------

--
-- Table structure for table `data_market`
--

CREATE TABLE `data_market` (
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_description` text NOT NULL,
  `product_image` varchar(100) NOT NULL,
  `product_marker` varchar(100) NOT NULL,
  `product_pattern` varchar(100) NOT NULL,
  `product_status` tinyint(1) NOT NULL,
  `data_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_market`
--

INSERT INTO `data_market` (`product_id`, `category_id`, `product_name`, `product_price`, `product_description`, `product_image`, `product_marker`, `product_pattern`, `product_status`, `data_created`) VALUES
(24, 7, 'sweater', 20000, '<p>Sweater kualitas tinggi</p>\r\n', 'produk1675946672.jpg', 'marker1675946672.png', 'patt1675946672.patt', 1, '2023-02-09 12:44:32'),
(25, 7, 'hoodie', 200000, '<p>Hoodie dengan bahan yang adem dan terasa nyaman saat dipakai</p>\r\n', 'produk1675953378.jpg', 'marker1675953378.png', 'patt1675953378.patt', 1, '2023-02-09 14:34:21'),
(26, 8, 'dress', 500000, '<p>Dress</p>\r\n', 'produk1675954804.jpg', 'marker1675954804.png', 'patt1675954804.patt', 1, '2023-02-09 15:00:04'),
(27, 8, 'Blazer Sky Blue', 300000, '<p>Blazer Biru dengan bahan halus sangat nyaman dipakai untuk kegiatan sehari-hari.</p>\r\n', 'produk1675958123.jfif', 'marker1675958123.png', 'patt1675958123.patt', 1, '2023-02-09 15:55:23'),
(28, 8, 'Blazer Motif Kotak-Kotak', 200000, '<p>Blazer yang nyaman untuk dikenakan pada acara formal atau casual</p>\r\n', 'produk1675958702.jpg', 'marker1675958702.png', 'patt1675958702.patt', 1, '2023-02-09 16:00:54'),
(29, 8, 'Blazer Hitam', 300000, '<p>Blazer warna hitam yang cocok untuk dipakai kemana saja serta nyaman untuk digunakan setiap saat.</p>\r\n', 'produk1675964664.jpg', 'marker1675964664.png', 'patt1675964664.patt', 1, '2023-02-09 17:44:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_admin`
--
ALTER TABLE `data_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `data_category`
--
ALTER TABLE `data_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `data_market`
--
ALTER TABLE `data_market`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_id` (`category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_admin`
--
ALTER TABLE `data_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `data_category`
--
ALTER TABLE `data_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `data_market`
--
ALTER TABLE `data_market`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
