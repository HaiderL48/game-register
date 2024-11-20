-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 01, 2024 at 04:42 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `Admin_name` varchar(100) COLLATE latin1_general_cs NOT NULL,
  `Admin_passsword` varchar(100) COLLATE latin1_general_cs NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`Admin_name`, `Admin_passsword`) VALUES
('[Haider]', '[haider]'),
('Haider', 'haider');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `username` varchar(50) COLLATE latin1_general_cs NOT NULL,
  `email` varchar(50) COLLATE latin1_general_cs NOT NULL,
  `con` varchar(50) COLLATE latin1_general_cs NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `username`, `email`, `con`) VALUES
(1, '.Haider.', '.haide@gmail.com.', '.avasdfvbsafbsfbsfbsfbsf.'),
(2, 'Haider', 'haide@gmail.com', 'avsadbfbab aebatbna');

-- --------------------------------------------------------

--
-- Table structure for table `games`
--

CREATE TABLE `games` (
  `id` int(11) NOT NULL,
  `game_name` varchar(100) COLLATE latin1_general_cs NOT NULL,
  `discription` varchar(100) COLLATE latin1_general_cs NOT NULL,
  `img` text COLLATE latin1_general_cs NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

--
-- Dumping data for table `games`
--

INSERT INTO `games` (`id`, `game_name`, `discription`, `img`) VALUES
(11, '0', 'Battle Ground Mobile India', 'bgmi2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `singin`
--

CREATE TABLE `singin` (
  `id` int(11) NOT NULL,
  `username` varchar(100) COLLATE latin1_general_cs NOT NULL,
  `email` varchar(100) COLLATE latin1_general_cs NOT NULL,
  `phone` int(12) NOT NULL,
  `password` varchar(100) COLLATE latin1_general_cs NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

--
-- Dumping data for table `singin`
--

INSERT INTO `singin` (`id`, `username`, `email`, `phone`, `password`) VALUES
(19, 'Haider', 'haide@gmail.com', 2147483647, '123456789');

-- --------------------------------------------------------

--
-- Table structure for table `tournaments`
--

CREATE TABLE `tournaments` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE latin1_general_cs NOT NULL,
  `type` varchar(100) COLLATE latin1_general_cs NOT NULL,
  `map` varchar(50) COLLATE latin1_general_cs NOT NULL,
  `pov` varchar(50) COLLATE latin1_general_cs NOT NULL,
  `time` time NOT NULL,
  `date` date NOT NULL,
  `prize` int(100) NOT NULL,
  `prkill` int(100) NOT NULL,
  `fees` int(100) NOT NULL,
  `imge` text COLLATE latin1_general_cs NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

--
-- Dumping data for table `tournaments`
--

INSERT INTO `tournaments` (`id`, `name`, `type`, `map`, `pov`, `time`, `date`, `prize`, `prkill`, `fees`, `imge`) VALUES
(4, 'BGMI(Battle Ground Mobile India)', 'Solo', 'Erangle', 'TPP', '03:55:00', '2024-02-27', 500, 10, 20, 'bgmi2.jpg'),
(5, 'BGMI', 'Duo', 'Erangle', 'TPP', '03:30:00', '2024-02-27', 800, 10, 30, 'bgmi2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tregister`
--

CREATE TABLE `tregister` (
  `id` int(11) NOT NULL,
  `ingame_name` varchar(50) COLLATE latin1_general_cs NOT NULL,
  `ingame_id` varchar(100) COLLATE latin1_general_cs NOT NULL,
  `tournament_id` varchar(100) COLLATE latin1_general_cs NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

--
-- Dumping data for table `tregister`
--

INSERT INTO `tregister` (`id`, `ingame_name`, `ingame_id`, `tournament_id`) VALUES
(1, 'haider', '1654165', '4'),
(3, 'hiren', '85484516', ''),
(4, 'hiren', '85484516', ''),
(5, 'hiren', '85484516', ''),
(6, 'haider', '1654165', '4'),
(7, 'haider', '1654165', '4'),
(8, 'haider', '1654165', ''),
(9, 'haider', '1654165', '5');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`id`,`game_name`);

--
-- Indexes for table `singin`
--
ALTER TABLE `singin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tournaments`
--
ALTER TABLE `tournaments`
  ADD PRIMARY KEY (`id`,`name`);

--
-- Indexes for table `tregister`
--
ALTER TABLE `tregister`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `games`
--
ALTER TABLE `games`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `singin`
--
ALTER TABLE `singin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tournaments`
--
ALTER TABLE `tournaments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tregister`
--
ALTER TABLE `tregister`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
