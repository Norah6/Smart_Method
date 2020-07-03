-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2020 at 04:43 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mappingcontrol`
--

-- --------------------------------------------------------

--
-- Table structure for table `directions`
--

CREATE TABLE `directions` (
  `Steps` int(11) NOT NULL,
  `Directions` varchar(10) NOT NULL,
  `Distance` int(11) NOT NULL,
  `ID_Place` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `directions`
--

INSERT INTO `directions` (`Steps`, `Directions`, `Distance`, `ID_Place`) VALUES
(1, 'Forwards', 8, 11),
(1, 'Right', 5, 12),
(1, 'Right', 12, 13),
(2, 'Forwards', 30, 13),
(3, 'Left', 20, 13),
(4, 'Forwards', 10, 13),
(5, 'Left', 7, 13),
(6, 'Forwards', 20, 13),
(2, 'Right', 3, 11),
(1, 'Forwards', 20, 15),
(1, 'Forwards', 6, 1),
(1, 'Forwards', 9, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `directions`
--
ALTER TABLE `directions`
  ADD KEY `ID_Place` (`ID_Place`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `directions`
--
ALTER TABLE `directions`
  ADD CONSTRAINT `directions_ibfk_1` FOREIGN KEY (`ID_Place`) REFERENCES `places` (`IDp`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
