-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 19, 2022 at 02:17 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cockpit`
--

-- --------------------------------------------------------

--
-- Table structure for table `businesses`
--

CREATE TABLE `businesses` (
  `id` int(255) NOT NULL,
  `uid` text NOT NULL,
  `business_name` text NOT NULL,
  `email` varchar(500) NOT NULL,
  `mobile_number` text NOT NULL,
  `whatsapp_number` text NOT NULL,
  `address` text NOT NULL,
  `country` text NOT NULL,
  `city` text NOT NULL,
  `pincode` text NOT NULL,
  `google_map_embed_code` text NOT NULL,
  `description` text NOT NULL,
  `facebook` text NOT NULL,
  `instagram` text NOT NULL,
  `twitter` text NOT NULL,
  `linkedin` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `businesses`
--

INSERT INTO `businesses` (`id`, `uid`, `business_name`, `email`, `mobile_number`, `whatsapp_number`, `address`, `country`, `city`, `pincode`, `google_map_embed_code`, `description`, `facebook`, `instagram`, `twitter`, `linkedin`) VALUES
(1, '2', 'RK SOFTWARE LABS', 'ratneshkarbhari18@gmail.com', '+919137976398', 'India', '80/2220, Kannamwar Nagar 2,, Vikrholi East, Mumbai, Vikrholi East, Mumbai\r\nVikrholi East, Mumbai', 'India', 'Mumbai', '400083', '', '400083', 'https://www.facebook.com/rkarbhari47/', 'https://instagram.com/rksoftwarelabs', '#', '#');

-- --------------------------------------------------------

--
-- Table structure for table `email_verif_codes`
--

CREATE TABLE `email_verif_codes` (
  `id` int(255) NOT NULL,
  `email` varchar(500) NOT NULL,
  `code` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `email_verif_codes`
--

INSERT INTO `email_verif_codes` (`id`, `email`, `code`) VALUES
(3, 'ratneshkarbhari18@gmail.com', '61f0e945ad69f');

-- --------------------------------------------------------

--
-- Table structure for table `kyc_requests`
--

CREATE TABLE `kyc_requests` (
  `id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `aadhaar_image` text NOT NULL,
  `pan_image` text NOT NULL,
  `aadhaar_number` text NOT NULL,
  `pan_number` text NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `products_services`
--

CREATE TABLE `products_services` (
  `id` int(255) NOT NULL,
  `bizid` text NOT NULL,
  `title` text NOT NULL,
  `slug` varchar(500) NOT NULL,
  `price` text NOT NULL,
  `currency` text NOT NULL,
  `stock_count` int(255) NOT NULL,
  `product_service` text NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products_services`
--

INSERT INTO `products_services` (`id`, `bizid`, `title`, `slug`, `price`, `currency`, `stock_count`, `product_service`, `description`) VALUES
(3, '61f92739dc9e5', 'Product title', '', '10', 'INR', 5, 'product', 'PRoduct Description');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `first_name` text NOT NULL,
  `last_name` text NOT NULL,
  `email` varchar(500) NOT NULL,
  `mobile_number` text NOT NULL,
  `role` varchar(50) NOT NULL,
  `password` varchar(500) NOT NULL,
  `address` longtext NOT NULL,
  `country` text NOT NULL,
  `state` text NOT NULL,
  `plan` text NOT NULL,
  `expiry` text NOT NULL,
  `kyc_status` text NOT NULL,
  `email_verified` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `mobile_number`, `role`, `password`, `address`, `country`, `state`, `plan`, `expiry`, `kyc_status`, `email_verified`) VALUES
(2, 'Ratnesh', 'Karbhari', 'ratneshkarbhari18@gmail.com', '', 'user', '$2y$10$SlbcFogpxI5QBjolySZyluZ2HDbIZ0LqcOGwoX2.NBH.D5JdbCjc6', '', '', '', 'free', '27-02-2022', 'approved', 'yes'),
(3, 'Ratnesh', 'Karbhari', 'ratneshkarbhari18@gmail.com', '', 'admin', '$2y$10$SlbcFogpxI5QBjolySZyluZ2HDbIZ0LqcOGwoX2.NBH.D5JdbCjc6', '', '', '', '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `businesses`
--
ALTER TABLE `businesses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_verif_codes`
--
ALTER TABLE `email_verif_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kyc_requests`
--
ALTER TABLE `kyc_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products_services`
--
ALTER TABLE `products_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `businesses`
--
ALTER TABLE `businesses`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `email_verif_codes`
--
ALTER TABLE `email_verif_codes`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kyc_requests`
--
ALTER TABLE `kyc_requests`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products_services`
--
ALTER TABLE `products_services`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
