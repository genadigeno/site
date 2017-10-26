-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 26, 2017 at 03:23 PM
-- Server version: 10.1.25-MariaDB
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
-- Database: `webzero`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `image` varchar(20) NOT NULL,
  `departament` varchar(20) NOT NULL,
  `price` varchar(20) NOT NULL,
  `display` varchar(20) NOT NULL,
  `color` varchar(20) NOT NULL,
  `quantity` int(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `image`, `departament`, `price`, `display`, `color`, `quantity`) VALUES
(1, '11', '11', 'men', '20.09', 'analog', 'gray', 10),
(2, '22', '22', 'men', '21.00', 'analog', 'gray', 0),
(3, 'wwmelcps', 'wwmelcps', 'men', '25', 'analog', 'black', 2),
(4, 'Sonata', 'Sonata', 'women', '55', 'analog', 'black', 6),
(5, 'SDL00359737', 'SDL00359737', 'women', '22', 'analog', 'other', 1),
(6, '999', '999', 'kids', '2', 'analog', 'other', 8),
(7, '888', '888', 'men', '664', 'analog', 'other', 2),
(8, '777', '777', 'kids', '12', 'digital', 'other', 81),
(9, '555', '555', 'women', '62', 'analog', 'white', 4),
(10, '444', '444', 'kids', '11', 'digital', 'other', 2),
(11, '333', '333', 'men', '55', 'analog', 'other', 2),
(12, '222', '222', 'men', '22', 'digital', 'black', 2),
(13, '111', '111', 'kids', '43', 'digital', 'other', 1),
(14, '99', '99', 'men', '44', 'analog', 'black', 0),
(15, '88', '88', 'men', '22', 'analog', 'other', 2),
(16, '77', '77', 'men', '77', 'analog', 'black', 1),
(17, '66', '66', 'women', '99', 'analog', 'white', 1),
(18, '55', '55', 'men', '33', 'analog', 'gray', 3),
(19, '44', '44', 'men', '11', 'analog', 'other', 3),
(20, '33', '33', 'men', '55', 'analog', 'gray', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
