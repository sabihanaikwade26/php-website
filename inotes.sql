-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2021 at 10:30 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `notes`
--

-- --------------------------------------------------------

--
-- Table structure for table `inotes`
--

CREATE TABLE `inotes` (
  `sno` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inotes`
--

INSERT INTO `inotes` (`sno`, `title`, `description`, `datetime`) VALUES
(1, 'Go to store', 'buy vegies', '2021-04-25 13:55:54'),
(2, 'fsdf', 'sdfsdaf', '2021-04-25 13:57:06'),
(3, 'fdsf', 'fsdfs', '2021-04-25 13:57:09'),
(4, 'fsdf', 'fdsg', '2021-04-25 13:57:12'),
(5, 'fdsf', 'fds', '2021-04-25 13:57:14'),
(6, 'gfg', 'ghd', '2021-04-25 13:57:18'),
(7, 'fdsf', 'fdsaf', '2021-04-25 13:57:23'),
(8, 'fgsdg', 'ghdfgdr', '2021-04-25 13:57:25'),
(9, 'dfgdf', 'gdfgfg', '2021-04-25 13:57:28'),
(10, 'gdfg', 'dgs', '2021-04-25 13:57:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `inotes`
--
ALTER TABLE `inotes`
  ADD PRIMARY KEY (`sno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `inotes`
--
ALTER TABLE `inotes`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
