-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2023 at 03:15 PM
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
-- Database: `jumpshot2`
--

-- --------------------------------------------------------

--
-- Table structure for table `leage_player_detail`
--

CREATE TABLE `leage_player_detail` (
  `id` int(11) NOT NULL,
  `leage_table_id` int(11) NOT NULL,
  `club_name` text NOT NULL,
  `player_name` text NOT NULL,
  `player_agge` text NOT NULL,
  `profile_image` text NOT NULL,
  `total_score` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `leage_table_name`
--

CREATE TABLE `leage_table_name` (
  `id` int(11) NOT NULL,
  `leage_table_name` text NOT NULL,
  `exp_date` text NOT NULL,
  `player_time` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `leage_table_player_score`
--

CREATE TABLE `leage_table_player_score` (
  `id` int(11) NOT NULL,
  `player_name` text NOT NULL,
  `play_date` text NOT NULL,
  `score` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `player1score`
--

CREATE TABLE `player1score` (
  `id` int(11) NOT NULL,
  `player_name` text NOT NULL,
  `score` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `player1score`
--

INSERT INTO `player1score` (`id`, `player_name`, `score`) VALUES
(10, 'Khaleem', 84),
(11, 'Madison', 25),
(12, 'Leona', 12);

-- --------------------------------------------------------

--
-- Table structure for table `playerimages`
--

CREATE TABLE `playerimages` (
  `id` int(11) NOT NULL,
  `player_name` text NOT NULL,
  `ImageName` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `playerimages`
--

INSERT INTO `playerimages` (`id`, `player_name`, `ImageName`) VALUES
(9, 'Khaleem', 'Untitled.jpg'),
(10, 'Madison', 'back.png'),
(11, 'Leona', 'front.png');

-- --------------------------------------------------------

--
-- Table structure for table `player_registration`
--

CREATE TABLE `player_registration` (
  `name1` text NOT NULL,
  `name2` text NOT NULL,
  `name3` text NOT NULL,
  `age` text NOT NULL,
  `timer` text NOT NULL,
  `id` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `player_registration`
--

INSERT INTO `player_registration` (`name1`, `name2`, `name3`, `age`, `timer`, `id`) VALUES
('khawar', 'sohail', 'aslam', '24', '10', '649ed14ce465f'),
('df', 'df', 'df', '34', '33', '64a254da54f7d');

-- --------------------------------------------------------

--
-- Table structure for table `score_table`
--

CREATE TABLE `score_table` (
  `id` int(11) NOT NULL,
  `player_id` text NOT NULL,
  `player_one_name` text NOT NULL,
  `player_one_score` text NOT NULL,
  `player_two_name` text NOT NULL,
  `player_two_score` text NOT NULL,
  `player_three_name` text NOT NULL,
  `player_three_score` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `score_table`
--

INSERT INTO `score_table` (`id`, `player_id`, `player_one_name`, `player_one_score`, `player_two_name`, `player_two_score`, `player_three_name`, `player_three_score`) VALUES
(6, '649ed14ce465f', 'khawar', '5', 'sohail', '7', 'aslam', '2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `leage_player_detail`
--
ALTER TABLE `leage_player_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leage_table_name`
--
ALTER TABLE `leage_table_name`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leage_table_player_score`
--
ALTER TABLE `leage_table_player_score`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `player1score`
--
ALTER TABLE `player1score`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `playerimages`
--
ALTER TABLE `playerimages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `score_table`
--
ALTER TABLE `score_table`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `leage_player_detail`
--
ALTER TABLE `leage_player_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `leage_table_name`
--
ALTER TABLE `leage_table_name`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `leage_table_player_score`
--
ALTER TABLE `leage_table_player_score`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `player1score`
--
ALTER TABLE `player1score`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `playerimages`
--
ALTER TABLE `playerimages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `score_table`
--
ALTER TABLE `score_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
