-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 25, 2023 at 05:55 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `newfutwork`
--

-- --------------------------------------------------------

--
-- Table structure for table `likeview`
--

CREATE TABLE `likeview` (
  `id` int(11) NOT NULL,
  `team_name` text NOT NULL,
  `likes` text NOT NULL,
  `views` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `player_score`
--

CREATE TABLE `player_score` (
  `id` int(11) NOT NULL,
  `team_name` text NOT NULL,
  `team_score` text NOT NULL,
  `play_date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `player_total_score`
--

CREATE TABLE `player_total_score` (
  `id` int(11) NOT NULL,
  `team_name` text NOT NULL,
  `total_score` text NOT NULL,
  `playCount` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_reg`
--

CREATE TABLE `user_reg` (
  `id` int(11) NOT NULL,
  `team_name` text NOT NULL,
  `team_logo_name` text NOT NULL,
  `name_player1` text NOT NULL,
  `age_player1` text NOT NULL,
  `location_player1` text NOT NULL,
  `name_player2` text NOT NULL,
  `age_player2` text NOT NULL,
  `location_player2` text NOT NULL,
  `profile_pic2` text NOT NULL,
  `name_player3` text NOT NULL,
  `age_player3` text NOT NULL,
  `location_player3` text NOT NULL,
  `profile_pic3` text NOT NULL,
  `name_player4` text NOT NULL,
  `age_player4` text NOT NULL,
  `location_player4` text NOT NULL,
  `profile_pic4` text NOT NULL,
  `category_player` text NOT NULL,
  `profile_pic1` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `likeview`
--
ALTER TABLE `likeview`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `player_score`
--
ALTER TABLE `player_score`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `player_total_score`
--
ALTER TABLE `player_total_score`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_reg`
--
ALTER TABLE `user_reg`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `likeview`
--
ALTER TABLE `likeview`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `player_score`
--
ALTER TABLE `player_score`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `player_total_score`
--
ALTER TABLE `player_total_score`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_reg`
--
ALTER TABLE `user_reg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
