-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 28, 2024 at 08:25 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phonebook`
--

-- --------------------------------------------------------

--
-- Table structure for table `phonebook`
--

CREATE TABLE `phonebook` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `phonebook`
--

INSERT INTO `phonebook` (`id`, `name`, `phone`, `email`, `address`, `image`) VALUES
(1, 'Chai Tan Hiu', '601132339126', 'Chai@gamil.com', 'Address1,\r\nAddress2,\r\nAddress3,\r\nAddress4,', '5.jpg'),
(2, 'Ling Liang Thok', '60377236036', 'Ling@gmail.com', 'Address1,\r\nAddress2,\r\nAddress3,\r\nAddress4,', '7.jpg'),
(3, 'Amirah', '0152045292', 'Amirah@gmail.com', 'Address1,\r\nAddress2,\r\nAddress3,\r\nAddress4,', '1.jpg'),
(4, 'Muhammet Firdaus ', '0102727980', 'Firdaus@gmail.com', 'Address1,\r\nAddress2,\r\nAddress3,\r\nAddress4,', '6.jpg'),
(5, 'Mira', '0195798898', 'Mira@gmail.com', 'Address1,\r\nAddress2,\r\nAddress3,\r\nAddress4,', '2.jpg'),
(6, 'William', '01128791234', 'William@gmail.com', 'Address1,\r\nAddress2,\r\nAddress3,\r\nAddress4,', 'Alexandar.PNG'),
(7, 'Charles ', '0174578964', 'Charles@gmail.com', 'Address1,\r\nAddress2,\r\nAddress3,\r\nAddress4,', 'Charles_Edwin_Cutler.PNG'),
(8, 'Johnson', '0124759845', 'Johnson@gmail.com', 'Address1,\r\nAddress2,\r\nAddress3,\r\nAddress4,', 'Arshak_Sarkies.PNG'),
(9, 'David Anthony', '0164123786', 'Anthony@gmail.com', 'Address1,\r\nAddress2,\r\nAddress3,\r\nAddress4,', 'Anna_Stewart_Wright.PNG'),
(10, 'David', '0185463128', 'David@gmail.com', 'Address1,\r\nAddress2,\r\nAddress3,\r\nAddress4,', 'Able_Seaman_John_Francis_Durnin.PNG'),
(11, 'May', '01112347556', 'May@gmail.com', 'Address1,\r\nAddress2,\r\nAddress3,\r\nAddress4,', 'Capt_Stephen_Charles_Toolseram.PNG');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `status`) VALUES
(1, 'q', 'ss@gmail.com', '7eff9089779c24362546c6e6f01e0358fd936a18', '1'),
(7, 'ali@gmail.com', 'ali@gmail.com', 'ccb2b0b2ccd52166f809a71c5f5c3b851c8d7e3e', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `phonebook`
--
ALTER TABLE `phonebook`
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
-- AUTO_INCREMENT for table `phonebook`
--
ALTER TABLE `phonebook`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
