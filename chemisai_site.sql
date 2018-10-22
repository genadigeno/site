-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 22, 2018 at 10:42 PM
-- Server version: 5.6.39-cll-lve
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chemisai_site`
--

-- --------------------------------------------------------

--
-- Table structure for table `addcart`
--

CREATE TABLE `addcart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `admin_name` varchar(30) NOT NULL,
  `admin_password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `fullname` varchar(40) NOT NULL,
  `address` varchar(30) NOT NULL,
  `city` varchar(20) NOT NULL,
  `region` varchar(20) NOT NULL,
  `phone` varchar(9) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(255) NOT NULL,
  `user_id` int(255) DEFAULT NULL,
  `name` varchar(2000) NOT NULL,
  `image` varchar(2000) NOT NULL,
  `departament` varchar(200) NOT NULL,
  `price` float(100,0) NOT NULL,
  `display` varchar(200) NOT NULL,
  `color` varchar(200) NOT NULL,
  `quantity` int(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `user_id`, `name`, `image`, `departament`, `price`, `display`, `color`, `quantity`) VALUES
(30, 1, 'Citizen Eco Drive', 'citizen-eco-drive.jpg', 'men', 113, 'analog', 'black', 6),
(31, 1, 'Tissot', 'IMG_0324.JPG', 'men', 199, 'analog', 'other', 4),
(32, 1, 'RAYMOND WEIL', 'IMG_0325.JPG', 'men', 549, 'analog', 'black', 2),
(33, 1, 'Omega Speedmaster', 'IMG_0326.JPG', 'men', 3129, 'analog', 'black', 1),
(34, 1, 'Michael Kors', 'IMG_0327.JPG', 'women', 149, 'analog', 'other', 6),
(35, 1, 'Michael Kors', 'IMG_0328.JPG', 'women', 1099, 'analog', 'gray', 1),
(36, 1, 'OMEGA', 'IMG_0329.JPG', 'women', 9450, 'analog', 'white', 1),
(37, 1, 'Versace', 'IMG_0330.JPG', 'women', 449, 'analog', 'other', 3),
(38, 1, 'DANIEL WELLINGTON ', 'IMG_0331.JPG', 'women', 109, 'analog', 'white', 3),
(39, 1, 'Tissot', 'IMG_0332.JPG', 'women', 445, 'analog', 'other', 2),
(40, 1, 'DANIEL WELLINGTON ', 'IMG_0333.JPG', 'women', 456, 'analog', 'other', 2),
(41, 1, 'Michael Kors ', 'IMG_0334.JPG', 'women', 158, 'analog', 'white', 2),
(42, 1, 'MAURICE LACROIX', 'IMG_0335.JPG', 'women', 249, 'analog', 'black', 2),
(43, 1, 'TISSOT', 'IMG_0336.JPG', 'women', 159, 'analog', 'gray', 2),
(44, 1, 'TISSOT', 'IMG_0337.JPG', 'women', 129, 'analog', 'gray', 3),
(45, 1, 'TISSOT', 'IMG_0338.JPG', 'women', 149, 'analog', 'black', 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `user_mail` varchar(30) NOT NULL,
  `user_password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_mail`, `user_password`) VALUES
(1, 'plato', 'plato@mail.com', '321321'),
(2, 'socrates', 'socrates@mail.com', '123123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addcart`
--
ALTER TABLE `addcart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addcart`
--
ALTER TABLE `addcart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
