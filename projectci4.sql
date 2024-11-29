-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2024 at 05:30 PM
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
-- Database: `projectci4`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_info`
--

CREATE TABLE `admin_info` (
  `id` int(250) NOT NULL,
  `name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_info`
--

INSERT INTO `admin_info` (`id`, `name`, `email`, `password`, `created_at`) VALUES
(1, 'demo', 'demo@gmail.com', 'demo', '2024-11-28 12:16:45'),
(2, 'admin', 'admin@gmail.com', 'admin', '2024-11-28 12:24:01'),
(3, 'ritika', 'ritika@gmail.com', '123456', '2024-11-28 14:08:37');

-- --------------------------------------------------------

--
-- Table structure for table `programme_info`
--

CREATE TABLE `programme_info` (
  `prog_id` int(200) NOT NULL,
  `progTitle` varchar(200) NOT NULL,
  `targetGroup` varchar(200) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `progDirector` varchar(200) NOT NULL,
  `dealingAsstt` varchar(200) NOT NULL,
  `progPdf` longblob NOT NULL,
  `attandancePdf` longblob NOT NULL,
  `materialLink` varchar(200) NOT NULL,
  `paymentdone` varchar(200) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `programme_info`
--

INSERT INTO `programme_info` (`prog_id`, `progTitle`, `targetGroup`, `date`, `progDirector`, `dealingAsstt`, `progPdf`, `attandancePdf`, `materialLink`, `paymentdone`, `created_at`, `updated_at`) VALUES
(32, 'sameer', 'sameer', '2024-11-29', 'sameer', 'DA-1', '', '', 'sameer', 'yes', '2024-11-29 15:46:35', '2024-11-29 15:46:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_info`
--
ALTER TABLE `admin_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `programme_info`
--
ALTER TABLE `programme_info`
  ADD PRIMARY KEY (`prog_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_info`
--
ALTER TABLE `admin_info`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `programme_info`
--
ALTER TABLE `programme_info`
  MODIFY `prog_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
