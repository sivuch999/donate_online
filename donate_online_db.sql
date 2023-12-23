-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 02, 2023 at 04:39 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `donate_online_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id_event` int(255) NOT NULL,
  `name` varchar(30) NOT NULL,
  `event_name` varchar(30) NOT NULL,
  `subtitles_event` varchar(500) NOT NULL,
  `date` date NOT NULL,
  `bg_event` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id_event`, `name`, `event_name`, `subtitles_event`, `date`, `bg_event`) VALUES
(3, 'EARTHTEKAY', 'event01', 'Super', '2023-11-20', 'Chained Echoes.jpg'),
(9, 'EARTHTEKAY', 'event_02', 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx', '2023-11-30', 'NET-ZERO-SPACE-INITIATIVE-1.png'),
(14, 'EARTHTEKAY', 'event_03', 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx', '2023-12-10', 'dullahan_by_mikiko_art_de762x3-375w.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `name` varchar(30) NOT NULL,
  `password` varchar(256) NOT NULL,
  `salt` varchar(30) NOT NULL,
  `type` varchar(50) NOT NULL,
  `picture` varchar(60) NOT NULL,
  `subtitles` varchar(256) NOT NULL,
  `status` varchar(1) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `location` varchar(30) NOT NULL,
  `request_item` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`name`, `password`, `salt`, `type`, `picture`, `subtitles`, `status`, `contact`, `location`, `request_item`) VALUES
('EARTHTEKAY', '$2y$10$6199nD.yDwlaXa57U0xEiupwXdC2KU3IieVjsSxt3z4.ZMOdaLZ7y', 'GXlKJyvJEaKw06S', 'Educational Organizations', '867186_v2.webp', '-', '1', 'earthtekayhaha@gmail.com', 'A-B-C-D', 'Mechanic_tool, Food'),
('user_1', '$2y$10$aB1DRwVOiPWcushHtBUls.PTIDah2HD6p8EHSe6VHz5RahDLND0ea', 'oyatQeHGoAwYFuM', 'Social Services Organizations', '8446880939_d85eafd8e8_b.jpg', '-', '1', 'earthtekayhaha@gmail.com', 'A-B-C-E', 'Food, Clothes'),
('user_2', '$2y$10$vOssap.lN/Nj7nWixU0fnOdy4NSLSYTQJOujJVOrwCsoPT/W1WbkW', 'VKNIfvkFejfDf2x', 'Environmental Organizations', 'NET-ZERO-SPACE-INITIATIVE-1.png', '-', '1', 'earthtekayhaha@gmail.com', 'A-B-C-D', 'Mechanic_tool, Clothes'),
('user_4', '$2y$10$M2Z5ehcZOVehqYsk8sUuH.FKZ9MuUK0wHtex8rU0imHx0ZOl6SgL6', 'Kg21oa4GBhik0rt', 'Charitable Organizations', '53.jpg', '-', '1', 'earthtekayhaha@gmail.com', 'A-B-C-D', 'Food'),
('user_5', '$2y$10$6zKEcS5l84CdesC0aYmS/uSZ/BDpYXVps2GCll6bErb8E5VzQaFXS', '9bme2TCXiKF8uRZ', 'Social Services Organizations', 'ใบสำคัญแสดงการจดทะเบียน.png', 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX', '1', 'earthtekayhaha@gmail.com', 'A-B-C-D', 'Food, Clothes');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id_event`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id_event` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
