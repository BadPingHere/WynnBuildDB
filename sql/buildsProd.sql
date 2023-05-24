-- phpMyAdmin SQL Dump
-- version 4.9.11
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 23, 2023 at 11:04 PM
-- Server version: 10.3.38-MariaDB-log-cll-lve
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `badprtbv_wynndb`
--

-- --------------------------------------------------------

--
-- Table structure for table `buildsProd`
--

CREATE TABLE `buildsProd` (
  `id` int(20) NOT NULL,
  `classURL` varchar(999) NOT NULL,
  `creator` varchar(999) NOT NULL,
  `buildTitle` varchar(999) NOT NULL,
  `buildDesc` varchar(999) NOT NULL,
  `conMythic` varchar(999) NOT NULL,
  `conQuest` varchar(999) NOT NULL,
  `conCrafted` varchar(999) NOT NULL,
  `conLI` varchar(999) NOT NULL,
  `minlvl` int(255) NOT NULL,
  `date` varchar(999) NOT NULL,
  `link` varchar(999) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buildsProd`
--
ALTER TABLE `buildsProd`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buildsProd`
--
ALTER TABLE `buildsProd`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
