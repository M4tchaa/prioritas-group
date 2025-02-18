-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 18, 2025 at 06:32 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prioritas`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `stock` int NOT NULL,
  `is_sell` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `stock`, `is_sell`, `created_at`, `updated_at`) VALUES
(18, 'AC LG', '1000000.00', 5, 0, '2025-02-18 05:26:13', '2025-02-18 06:23:27'),
(20, 'Kulkas Sharp', '3000000.00', 3, 0, '2025-02-18 05:26:55', '2025-02-18 06:29:18'),
(21, 'Kulkas LG', '500000.00', 2, 1, '2025-02-18 05:27:06', '2025-02-18 05:27:06'),
(22, 'Mesin Cuci LG', '4000000.00', 5, 1, '2025-02-18 05:53:06', '2025-02-18 05:53:06'),
(23, 'Mesin Cuci LG Large', '10000000.00', 2, 1, '2025-02-18 05:53:25', '2025-02-18 05:53:25'),
(24, 'Mesin Cuci Lg Small', '2000000.00', 10, 1, '2025-02-18 05:53:47', '2025-02-18 05:53:47'),
(25, 'Mesin Cuci Sharp', '4000000.00', 5, 1, '2025-02-18 05:54:06', '2025-02-18 05:54:06'),
(26, 'Mesin Cuci Sharp Small', '2000000.00', 10, 1, '2025-02-18 05:54:19', '2025-02-18 05:54:19'),
(27, 'Mesin Cuci Sharp Large', '10000000.00', 2, 1, '2025-02-18 05:54:32', '2025-02-18 05:54:32'),
(28, 'AC LG 2 Pk', '4000000.00', 10, 1, '2025-02-18 05:54:52', '2025-02-18 05:54:52');

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
