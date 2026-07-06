-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2026 at 08:23 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `2509c1-ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(100) NOT NULL,
  `cat_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_name`, `cat_desc`) VALUES
(1, 'Electronics', 'Good quality products'),
(2, 'Clothing', 'Good quality products'),
(3, 'Grocery', 'Good quality');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `price` double NOT NULL,
  `stock` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `title`, `description`, `price`, `stock`, `image`, `cat_id`, `status`, `created_at`) VALUES
(2, 'HAIER T-DOOR INVERTER REFRIGERATOR Model HRF-578TGGU-IOT', ' The Haier HRF-578TGGU-IOT is a premium T-Door inverter refrigerator built for modern homes. With a sleek black glass finish, advanced cooling features, and smart IoT connectivity, it offers high performance, energy efficiency, and elegant design. Its spacious layout and hygienic technology make it ideal for large families seeking convenience and freshness.\r\n\r\nBenefits \r\n\r\nT-Door Design: Separate compartments for better organization and odor control\r\nTwin Inverter Technology: Adjusts compressor and fan speed for energy savings and quiet operation\r\nNo Frost Cooling: Prevents ice build-up and maintains consistent temperature\r\nTurbo Cooling: Rapid cooling for quick preservation of fresh items\r\nHCS Freshness System: Maintains ideal humidity for longer-lasting fruits and vegetables\r\nT-ABT Sterilization: Eliminates 99.99% of bacteria using negative ion technology\r\nSmart IoT Control: Remote monitoring and temperature adjustment via mobile app\r\nDigital Display Panel: Touch interface for easy control of settings\r\nSpecifications\r\n\r\nBrand: Haier\r\nModel: HRF-578TGGU-IOT\r\nType: T-Door / Side-by-Side\r\nCooling System: No Frost\r\nCompressor Type: Twin Inverter\r\nTotal Gross Capacity: 505 Liters\r\nTotal Net Capacity: 456 Liters\r\nRefrigerator Capacity: 274 Liters\r\nFreezer Capacity: 182 Liters\r\nVoltage Range: 187V – 252V\r\nClimate Class: T (Tropical)\r\nRefrigerant: R600a\r\nTurbo Cooling: Yes\r\nDisplay Panel: Integrated Digital Display\r\nShelves (Freezer): 3 Tempered Glass\r\nShelves (Refrigerator): Multiple Wire Shelves\r\nDoor Pockets (Refrigerator): 6\r\nCrisper Drawers: Humidity-controlled + My Zone\r\nEgg Trays: 2\r\nIce Trays: 2\r\nLighting: LED (Freezer and Refrigerator)\r\nDimensions (HxWxD): 1804 × 833 × 666 mm\r\nNet Weight: 105 kg\r\nGross Weight: 115 kg\"', 225999, 76, '6a34e6ae14cdd.webp', 2, 0, '2026-06-10 11:47:29');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','user') NOT NULL DEFAULT 'user',
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`, `role`, `status`, `created_at`) VALUES
(2, 'owaisahmed', 'owais_ahmed@aptechnorth.edu.pk', '$2y$10$ZXry56edf2UKPV5fD9Wxue..0dfuFD6JeEf4/5kyuMn.7EnuWwH0e', 'user', 1, '2026-06-24 11:48:51'),
(3, 'haris', 'haris_naseer@aptechnorth.edu.pk', '$2y$10$iyD7sw5OeBiE44AeEq.jkugKnBfMUP/xy1DcitMFO0M.tzCPS2pXe', 'user', 1, '2026-07-01 12:21:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `cat_id` (`cat_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email_unique_index` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `categories` (`cat_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
