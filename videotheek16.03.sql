-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 16, 2023 at 03:17 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `videotheek`
--

-- --------------------------------------------------------

--
-- Table structure for table `exemplaren`
--

CREATE TABLE `exemplaren` (
  `exemplarID` int(11) NOT NULL,
  `exemplarNummer` int(11) NOT NULL,
  `exemplarStatus` int(11) NOT NULL,
  `filmId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `exemplaren`
--

INSERT INTO `exemplaren` (`exemplarID`, `exemplarNummer`, `exemplarStatus`, `filmId`) VALUES
(1, 5, 1, 5),
(2, 6, 1, 5),
(3, 98, 1, 1),
(4, 66, 2, 1),
(5, 65, 2, 1),
(6, 54, 2, 7),
(7, 187, 1, 7),
(8, 188, 1, 7),
(10, 189, 1, 1),
(25, 196, 2, 5),
(26, 197, 2, 14),
(38, 198, 1, 17);

-- --------------------------------------------------------

--
-- Table structure for table `films`
--

CREATE TABLE `films` (
  `id` int(11) NOT NULL,
  `FilmTitle` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `films`
--

INSERT INTO `films` (`id`, `FilmTitle`) VALUES
(1, 'Darkest Hour'),
(5, 'Descendants, The'),
(7, 'Safe House '),
(14, 'Titanic'),
(17, 'Avatar 2');

-- --------------------------------------------------------

--
-- Table structure for table `statuses`
--

CREATE TABLE `statuses` (
  `statusId` int(11) NOT NULL,
  `statusName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `statuses`
--

INSERT INTO `statuses` (`statusId`, `statusName`) VALUES
(1, 'available'),
(2, 'not available');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` int(11) NOT NULL,
  `FirstName` varchar(255) NOT NULL,
  `LastName` varchar(255) NOT NULL,
  `wachtwoord` varchar(255) NOT NULL,
  `email` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `FirstName`, `LastName`, `wachtwoord`, `email`) VALUES
(1, 'John', 'Vick', '$2y$10$yxUX2GkAVbUb5r1Z/AUJ.Ow6Aywr2XVYEE5A264j7GR6cUCGxVfSq', '1@videotheek.be'),
(2, 'John', 'Vick', '$2y$10$otZtLKLHi7JT11wdqjlIf.hhXifcBHJnfv/I1gZxTbcDhLR9CDmR6', '2@videotheek.be'),
(3, 'John', 'Vick', '$2y$10$of2YSJZ5qUiQ99JlHV2ab.BGA3J8/pqDRlXRCTb58xnCai7tdr/5e', '3@videotheek.be'),
(4, 'John', 'Vick', '$2y$10$BVDmd4PYIx0KmkEIqI8pse47JIvoyNwmyY5RjajG.qXVUfjCSCad6', '4@videotheek.be');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `Videoid` int(11) NOT NULL,
  `videoTitle` varchar(255) NOT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`Videoid`, `videoTitle`, `status`) VALUES
(1, 'Girl With The Dragon Tattoo', 1),
(2, 'Girl With The Dragon Tattoo', 1),
(3, 'Trespass', 2),
(4, 'Trespass', 2),
(5, 'Trespass', 1),
(6, 'Trespass', 2),
(7, 'Safe House', 2),
(8, 'Safe House', 2),
(9, 'Safe House', 1),
(10, 'Descendants, The', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `exemplaren`
--
ALTER TABLE `exemplaren`
  ADD PRIMARY KEY (`exemplarID`),
  ADD UNIQUE KEY `exemplarNummer` (`exemplarNummer`),
  ADD KEY `filmId` (`filmId`),
  ADD KEY `exemplarStatus` (`exemplarStatus`);

--
-- Indexes for table `films`
--
ALTER TABLE `films`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`statusId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`Videoid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `exemplaren`
--
ALTER TABLE `exemplaren`
  MODIFY `exemplarID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `films`
--
ALTER TABLE `films`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `statuses`
--
ALTER TABLE `statuses`
  MODIFY `statusId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `Videoid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `exemplaren`
--
ALTER TABLE `exemplaren`
  ADD CONSTRAINT `exemplaren_ibfk_1` FOREIGN KEY (`exemplarStatus`) REFERENCES `statuses` (`statusId`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
