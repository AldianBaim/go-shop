-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 03, 2020 at 12:32 PM
-- Server version: 8.0.20-0ubuntu0.20.04.1
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `app_goshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int NOT NULL,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `record_status` enum('PUBLISH','DELETED') DEFAULT 'PUBLISH'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `record_status`) VALUES
(1, 'Men Shirt', 'PUBLISH'),
(2, 'Woman Shirt', 'PUBLISH'),
(3, 'Shoes', 'PUBLISH'),
(4, 'Electronic', 'PUBLISH');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `category_id` int DEFAULT NULL,
  `price` int DEFAULT NULL,
  `description` varchar(256) DEFAULT NULL,
  `image` varchar(256) DEFAULT NULL,
  `record_status` enum('PUBLISH','DELETED') CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT 'PUBLISH'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `category_id`, `price`, `description`, `image`, `record_status`) VALUES
(1, 'Iphone X', 4, 8000000, 'Raw denim you probably haven\'t heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terr.', 'iphone-x.jpeg', 'PUBLISH'),
(2, 'air jordan', 3, 300000, 'Raw denim you probably haven\'t heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terr.', 'air-jordan.jpeg', 'PUBLISH'),
(3, 'Samsung Galaxy S20', 4, 20000000, 'Raw denim you probably haven\'t heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terr.', 'samsung-s20.jpg', 'PUBLISH'),
(5, 'Luis Vuitton Original', 1, 300000, 'description item', 'shirt-luis-vuitton.jpg', 'PUBLISH'),
(6, 'Yeezy Boost 350 V2 Zebra', 3, 450000, 'Limited Edition', 'yeezy.jpg', 'PUBLISH'),
(7, 'Red Disty Dress', 2, 280000, 'Limited Edition', 'red-ditsy-floral-print-skater-dress.jpeg', 'PUBLISH');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `fullname` varchar(100) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(128) DEFAULT NULL,
  `role_id` int DEFAULT NULL,
  `date_created` date DEFAULT NULL,
  `record_status` enum('ACTIVE','INACTIVE') CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT 'ACTIVE'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `email`, `password`, `role_id`, `date_created`, `record_status`) VALUES
(1, 'Aldiansyah', 'admin@gmail.com', 'admin', 1, '2020-08-28', 'ACTIVE'),
(2, 'Andrean Maulana', 'user@gmail.com', 'user', 2, '2020-08-28', 'ACTIVE'),
(3, 'Ahmad Oriza', 'ahmad@gmail.com', '12345', 2, '2020-08-27', 'ACTIVE'),
(4, 'Alfian Pratama', 'alfian@gmail.com', '12345', 2, '2020-08-28', 'ACTIVE'),
(5, 'Yusuf Alfin', 'yusuf@gmail.com', '12345', 1, '2020-08-28', 'ACTIVE'),
(8, 'Ilhan Rahman', 'ilhan@gmail.com', '12345', 1, '2020-08-28', 'INACTIVE'),
(9, 'Syafiq Ghiyats', 'syafiq@gmail.com', '12345', 2, '2020-08-28', 'INACTIVE');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int NOT NULL,
  `role` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'User');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
