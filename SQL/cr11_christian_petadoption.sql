-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2020 at 04:05 PM
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
-- Database: `cr11_christian_petadoption`
--
CREATE DATABASE IF NOT EXISTS `cr11_christian_petadoption` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `cr11_christian_petadoption`;

-- --------------------------------------------------------

--
-- Table structure for table `animal`
--

CREATE TABLE `animal` (
  `id` int(11) NOT NULL,
  `category` enum('small','large','senior') NOT NULL,
  `name` varchar(55) NOT NULL,
  `zipCode` varchar(10) NOT NULL,
  `city` varchar(55) NOT NULL,
  `address` varchar(100) NOT NULL,
  `image` text NOT NULL,
  `description` varchar(255) NOT NULL,
  `hobbies` varchar(255) NOT NULL,
  `website` varchar(100) NOT NULL,
  `age` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `animal`
--

INSERT INTO `animal` (`id`, `category`, `name`, `zipCode`, `city`, `address`, `image`, `description`, `hobbies`, `website`, `age`) VALUES
(1, 'small', 'Una', '1050', 'Wien', 'Magarethen Str. 23', 'https://images.unsplash.com/photo-1589391248100-0da9b7819dab?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=779&q=80', 'A gourgous , loyal , kind dog', 'fetching balls , sleep ,eat', 'in progress', 2),
(2, 'small', 'Leo', '1020', 'Wien', 'Leopoldstr.1', 'https://images.unsplash.com/photo-1503301360699-4f60cf292ec8?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=800&q=80', 'A nice roommate for warm flats', 'Sun bathing ', 'in progress', 11),
(3, 'small', 'Slimy', '1080', 'Wien', 'Josephstätter Str 5 ', 'https://images.unsplash.com/photo-1565057450737-8ed99c9170f4?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=834&q=80', 'A slimy snail', 'Beeing quite, travel slow', 'in progress', 12),
(4, 'large', 'Nessie', 'IV3 8AU', 'Loch Ness', 'Lakedrive 1', 'https://images.unsplash.com/photo-1590771768846-dca39f172fcf?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=800&q=80', 'A medieval water dragon.', 'hiding, sleeping', 'in progress', 552),
(5, 'large', 'Otto', '1234', 'Faketown', 'Green Madow 1', 'https://images.unsplash.com/photo-1569914918431-d51b6a052fed?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=2000&q=80', 'A strong Bull', 'Eating gras, mooohing', 'in progress', 7),
(6, 'large', 'Brego', '5345', 'Piber', 'Piber 1', 'https://images.unsplash.com/photo-1573751056139-2ab65b6b03be?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=828&q=80', 'Awesome Horse', 'doing stuff', 'in progress', 10),
(7, 'small', 'Bruno', '1230', 'Wien', 'Hauptstr. 67', 'https://images.unsplash.com/photo-1564539279948-9931a76c05be?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=800&q=80', 'Sassy Kitty', 'beeing sassy, eat, sleep', 'in progress', 3),
(10, 'small', 'Gundula', '1120', 'Wien', 'Schönbrunner Allee 5', 'https://images.unsplash.com/photo-1505576652881-6b80543182f5?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=800&q=80', 'A lovely giraffe', 'looking over the fence', 'in progress', 7);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userId` int(11) NOT NULL,
  `userName` varchar(30) NOT NULL,
  `userEmail` varchar(60) NOT NULL,
  `userPass` varchar(255) NOT NULL,
  `status` enum('user','admin') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `userName`, `userEmail`, `userPass`, `status`) VALUES
(1, 'User', 'user@mail.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 'user'),
(2, 'Admin', 'admin@mail.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `animal`
--
ALTER TABLE `animal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`),
  ADD UNIQUE KEY `userEmail` (`userEmail`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `animal`
--
ALTER TABLE `animal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
