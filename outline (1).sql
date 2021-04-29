-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 31, 2021 at 06:09 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `outline`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `fname` varchar(200) NOT NULL,
  `lname` varchar(200) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `fname`, `lname`, `email`, `password`) VALUES
(1, 'Admin', 'Admin', 'admin@gmail.com', 'admin'),
(2, 'Riya', 'Danve', 'riyardanve@gmail.com', 'riyadan'),
(4, 'Madhra', 'Nagle', 'madhura@gmail.com', 'madhura');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `domain` varchar(200) NOT NULL,
  `members` mediumtext NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `filename` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `name`, `domain`, `members`, `email`, `phone`, `date`, `filename`) VALUES
(3, 'Classification with Iris Dataset', 'Data Mining', 'Riya, Madhura, Mansi, Akhilesh', 'riyardanve@gmail.com', '8796108839', '2021-01-31', ''),
(4, 'Weather detection', 'IoT', 'xyz, new, pqr', 'xyz@gmail.com', '8877665544', '2021-01-22', ''),
(12, 'Linear Regression', 'Data Science', 'Riya, Akhilesh, Mansi, Madhura', 'riyardanve@gmail.com', '8796108839', '2021-01-31', ''),
(14, 'Project Management', 'WTL', 'Riya, Madhura, Mansi, Akhilesh', 'riyardanve@gmail.com', '08796108839', '2021-01-31', 'Wtl.html'),
(15, 'Course Survey', 'WTL', 'A,B,C,D', 'riyardanve@gmail.com', '08796108839', '2021-01-31', 'WTL End Course Survey 2020.pdf');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
