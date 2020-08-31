-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 03, 2019 at 09:26 AM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webc`
--

-- --------------------------------------------------------

--
-- Table structure for table `caption_login`
--

CREATE TABLE `caption_login` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `caption_login`
--

INSERT INTO `caption_login` (`id`, `username`, `email`, `password`, `type`) VALUES
(1, 'yasiru', 'yasiru@gmail.com', 'd1612190e9f7d6583693dd5cd0803998', 'member'),
(2, 'chamindu', 'chami@gmail.com', '354d1b5eb9d763dd1978e819ae99410e', 'admin'),
(3, 'pasindu', 'pasindu@gmail.com', '8106e3e401bded729dc48f331447175d', 'caption'),
(4, 'pavithra', 'pavithra@gmail.com', '03281c79f2b20e91ffb93b2ee9712710', 'staff'),
(5, 'pavithra1', 'pavithra1@gmail.con', 'b814b355bea5aeb151034749db0f1191', 'staff'),
(6, 'ravindu', 'ravindu@gmail.com', 'f9c0bd350fec1f5a2342e444663c66a6', 'member'),
(7, 'yasiruc', 'yasiru1@gmail.com', '077b5cd562da8efd6c7e34f33ef5fd37', 'captain');

-- --------------------------------------------------------

--
-- Table structure for table `marker`
--

CREATE TABLE `marker` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `image` varchar(250) NOT NULL,
  `lat` float NOT NULL,
  `lng` float NOT NULL,
  `description` varchar(50) NOT NULL,
  `location_status` varchar(50) NOT NULL,
  `important` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `marker`
--

INSERT INTO `marker` (`id`, `name`, `image`, `lat`, `lng`, `description`, `location_status`, `important`) VALUES
(1, 'Colombo 2', 'downlord1.jpg', 6.92228, 79.8549, 'terrible smell', 'yes', ' immediate'),
(2, 'Maradana', 'images (2).jpg', 6.92671, 79.8637, 'very dirty', 'yes', 'no'),
(3, 'Borella north', 'images (3).jpg', 6.919, 79.8811, 'terrible smell', 'yes', ' immediate'),
(4, 'Colombo 9', 'rsz_download.png', 6.93297, 79.8783, 'very dirty', 'yes', 'no'),
(7, 'Fort', 'images (1).jpg', 6.93553, 79.8452, 'terrible smell', 'no', ''),
(8, 'Colombo 10', 'downlord1.jpg', 6.92178, 79.866, 'very dirty', 'yes', ' immediate'),
(10, 'Gall face', 'rsz_download.png', 6.92611, 79.8445, 'terrible smell', 'yes', 'no'),
(11, 'Morgan Road', 'rsz_download.png', 6.92752, 79.8522, 'wild life', 'yes', ' immediate');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `description` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `name`, `description`) VALUES
(28, 'wdq', 'heloooooooooooooooooo'),
(29, 'Nimal', 'people must use practical way to trowing garbage. '),
(30, 'nimal', 'People must stop throwing garbage into roads'),
(31, 'Nimal', 'People must separate garbage into different types. such as plastic, polithin etc.');

-- --------------------------------------------------------

--
-- Table structure for table `spots`
--

CREATE TABLE `spots` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `lat` float(10,6) NOT NULL,
  `lng` float(10,6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `spots`
--

INSERT INTO `spots` (`id`, `name`, `lat`, `lng`) VALUES
(7, 'fort garbage dump', 6.934190, 79.844139),
(8, 'colombo 2 garbage dump', 6.922389, 79.854485),
(9, 'Orugodawaththa garbage dump', 6.944882, 79.880150),
(10, 'Gajabapura Garbage Dump', 6.928822, 79.885551),
(11, 'ibbanwela Garbage Dump', 6.917320, 79.859634);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `caption_login`
--
ALTER TABLE `caption_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `marker`
--
ALTER TABLE `marker`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `spots`
--
ALTER TABLE `spots`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `caption_login`
--
ALTER TABLE `caption_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `marker`
--
ALTER TABLE `marker`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `spots`
--
ALTER TABLE `spots`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
