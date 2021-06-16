-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 16, 2021 at 04:37 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_employee_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` bigint(100) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `info` varchar(255) NOT NULL,
  `date_of_birth` date NOT NULL,
  `gender` text NOT NULL,
  `mobile_number` varchar(15) NOT NULL,
  `profile_image` varchar(255) DEFAULT NULL,
  `hobbies` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `name`, `email`, `info`, `date_of_birth`, `gender`, `mobile_number`, `profile_image`, `hobbies`) VALUES
(4, 'Tohidul Alam', 'tohidul@gmail.com', 'Professional Web design & developer, graphics designer also,', '1998-06-03', 'Male', '+8801993627736', 'Null', 'Gardening'),
(6, 'Majiya Alam', 'marjiyalam@gmail.com', 'My self Marjiya', '1998-01-01', 'Female', '+88018352472', 'images/profile images/5f6e158aca55f70004b5b62f.png', 'Sports,Gardening'),
(9, 'Robiul Alam', 'robiul@gmail.com', 'dfadsfas', '2015-08-09', 'Male', '+880181432374', NULL, NULL),
(10, 'Riyad Hossain', 'riyad@gmail.com', 'Riyad', '2015-08-09', 'Male', '+8801937328262', NULL, 'Sports,Gardening'),
(11, 'Demo Test', 'demo@gmail.com', 'dfas', '2015-08-09', 'Male', '+880181432374', NULL, 'Sports,Gardening,Reading'),
(12, 'Demo Test', 'demo@gmail.com', 'Demo updated', '2015-08-09', 'Male', '+880181432374', 'images/profile images/67-674286_png-free-stock-vegetable-free-broccoli-clip-art.png', 'Sports'),
(14, 'Kader Uddin', 'kaderuddin@gmail.com', 'Kader Uddin', '1990-07-19', 'Male', '+8801937328262', 'images/profile images/1606792234593.jpeg', 'Sports,Gaming,Gardening,Reading');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` bigint(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
