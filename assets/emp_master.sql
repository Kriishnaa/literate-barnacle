-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2019 at 03:13 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `emp_data`
--

-- --------------------------------------------------------

--
-- Table structure for table `emp_master`
--

CREATE TABLE `emp_master` (
  `emp_id` int(50) NOT NULL,
  `emp_name` varchar(255) DEFAULT NULL,
  `emp_password` varchar(255) DEFAULT NULL,
  `emp_mail` varchar(255) DEFAULT NULL,
  `emp_mobile` varchar(15) DEFAULT NULL,
  `emp_birthdate` varchar(255) DEFAULT NULL,
  `emp_address` text,
  `emp_city` varchar(50) DEFAULT NULL,
  `emp_gender` char(1) DEFAULT NULL,
  `emp_language` varchar(255) DEFAULT NULL,
  `emp_profile` varchar(255) DEFAULT NULL,
  `emp_status` char(1) NOT NULL DEFAULT 'Y' COMMENT 'Y=active N=Not active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emp_master`
--

INSERT INTO `emp_master` (`emp_id`, `emp_name`, `emp_password`, `emp_mail`, `emp_mobile`, `emp_birthdate`, `emp_address`, `emp_city`, `emp_gender`, `emp_language`, `emp_profile`, `emp_status`) VALUES
(1, 'krishnaaa', '202cb962ac59075b964b07152d234b70', 'kk@gmail.com', '7978787878', '1550620861', 'test address here', 'Navsari', 'M', 'English,Hindi,Gujarati', 'Lighthouse.jpg', 'Y'),
(2, 'kishan', '664a1b50ea33727a8ad898e8c1f5f079', 'kkk@kkkiiii.in', '7878', '1517270461', 'thjrgrsygwretywetywetwetwet', 'Surat', 'F', 'English,Gujarati', 'Hydrangeas.jpg', 'Y');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `emp_master`
--
ALTER TABLE `emp_master`
  ADD PRIMARY KEY (`emp_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `emp_master`
--
ALTER TABLE `emp_master`
  MODIFY `emp_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
