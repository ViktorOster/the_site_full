-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 20, 2020 at 12:51 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wager_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `chat_message`
--

CREATE TABLE `chat_message` (
  `chat_message_id` int(11) NOT NULL,
  `to_user_id` int(11) NOT NULL,
  `from_user_id` int(11) NOT NULL,
  `chat_message` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `gamekey` text NOT NULL,
  `user` text NOT NULL,
  `comment` text NOT NULL,
  `post_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `gamekey`, `user`, `comment`, `post_time`) VALUES
(37, '1', 'asdasd', 'sdasd', '2020-01-06 10:28:40'),
(38, '1', 'asdasd', 'sdasd', '2020-01-06 10:45:24'),
(39, '1', 'asdasd', 'sdasdsdf', '2020-01-06 10:45:26'),
(40, '1', 'Player_1', '5641651651651', '2020-01-06 11:26:20'),
(41, '1', 'Player_1', '5641651651651', '2020-01-06 11:26:21'),
(42, '78423732', 'Player_1', 'asdasdasa', '2020-01-06 11:28:18'),
(43, '78423732', 'Player_1', 'asdasdsdddd', '2020-01-06 11:30:11'),
(44, '78423732', 'Player_1', 'asdasdsdddd', '2020-01-06 11:30:14'),
(45, '78423732', 'Player_3', 'hi', '2020-01-06 11:59:12'),
(46, '78423732', 'Player_14', 'ddddddd', '2020-01-06 12:40:39'),
(47, '275445916', 'Player_6', 'hi', '2020-01-06 13:24:56'),
(48, '275445916', 'Player_11', 'asdasdasd', '2020-01-06 13:29:20'),
(49, '275445916', 'Player_14', 'hello', '2020-01-06 13:30:26'),
(50, '275445916', 'Player_14', 'what is the problem', '2020-01-06 13:30:33'),
(51, '275445916', 'Player_6', 'no problem mistr', '2020-01-06 13:30:44'),
(52, '358657820', 'Player_1', 'hi', '2020-01-06 14:49:34'),
(53, '275445916', 'Player_6', 'iasudgfoisaghdfiashdfopihsopdifh', '2020-01-06 19:08:03'),
(54, '275445916', 'Player_11', 'sadfafasdfas', '2020-01-06 19:08:11'),
(55, '275445916', 'Player_14', 'hi whats the issue', '2020-01-06 19:08:33'),
(56, '66235855', 'Player_5', 'asdasdasd', '2020-01-06 19:14:43'),
(57, '66235855', 'Player_8', 'asdasda', '2020-01-06 19:14:47'),
(58, '358657820', 'Player_8', '21651651651', '2020-01-06 20:07:50'),
(59, '358657820', 'Player_8', '32103521631', '2020-01-06 20:07:53'),
(60, '232624876', 'Player_14', 'asda', '2020-01-06 21:55:51'),
(61, '444154809', 'Player_1', 'hi', '2020-01-07 12:56:37'),
(62, '444154809', 'Player_1', 'hi', '2020-01-07 12:56:41'),
(63, '444154809', 'Player_1', 'asda', '2020-01-07 12:58:39'),
(64, '444154809', 'Player_1', 'asdaasd', '2020-01-07 12:58:52'),
(65, '444154809', 'Player_1', 'werwe', '2020-01-07 13:00:15'),
(66, '444154809', 'Player_1', 'werwe', '2020-01-07 13:00:30'),
(78, '121369313', 'Player_1', 'asd', '2020-01-08 16:01:48'),
(79, '121369313', 'Player_1', 'asd', '2020-01-08 16:01:51'),
(82, '121369313', 'admin_1', '&lt;i&gt;asdasdasda&lt;/i&gt;', '2020-01-10 14:55:24'),
(83, '227411184', 'Player_2', 'lkasd', '2020-01-12 14:26:35'),
(84, '170264612', 'asdasda', 'Hi ', '2020-01-18 20:12:04'),
(85, '170264612', 'asdasda', 'Hi how are you', '2020-01-18 20:12:10'),
(86, '170264612', 'asdasda', 'Hi how are you', '2020-01-18 20:12:49'),
(87, '170264612', 'admin_1', 'HI how can i help', '2020-01-18 20:35:42');

-- --------------------------------------------------------

--
-- Table structure for table `loginform`
--

CREATE TABLE `loginform` (
  `ID` int(11) NOT NULL,
  `User` varchar(50) NOT NULL,
  `Pass` varchar(50) NOT NULL,
  `admin` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `loginform`
--

INSERT INTO `loginform` (`ID`, `User`, `Pass`, `admin`) VALUES
(1, 'Player_1', 'admin', 0),
(2, 'Player_2', 'admin', 0),
(3, 'Player_3', 'admin', 0),
(4, 'Player_4', 'admin', 0),
(5, 'Player_5', 'admin', 0),
(6, 'Player_6', 'admin', 0),
(7, 'Player_7', 'admin', 0),
(8, 'Player_8', 'admin', 0),
(9, 'Player_9', 'admin', 0),
(10, 'Player_10', 'admin', 0),
(11, 'Player_11', 'admin', 0),
(12, 'Player_12', 'admin', 0),
(13, 'admin_2', 'admin', 1),
(14, 'admin_1', 'admin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ongoing_game_list`
--

CREATE TABLE `ongoing_game_list` (
  `ID` int(11) NOT NULL,
  `gamername` varchar(30) NOT NULL,
  `gamemode` varchar(30) NOT NULL,
  `vs_type` varchar(10) NOT NULL,
  `serverr` varchar(10) NOT NULL,
  `amount` int(11) NOT NULL,
  `Game_Key` varchar(200) NOT NULL,
  `confirmation` int(1) NOT NULL DEFAULT 0,
  `dispute` int(1) NOT NULL DEFAULT 0,
  `score` int(10) NOT NULL DEFAULT 0,
  `dispute_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `image` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ongoing_game_list`
--

INSERT INTO `ongoing_game_list` (`ID`, `gamername`, `gamemode`, `vs_type`, `serverr`, `amount`, `Game_Key`, `confirmation`, `dispute`, `score`, `dispute_time`, `image`) VALUES
(212, 'Player_1', 'Fortnite Boxfight', '1v1', 'NAE', 10, '121369313', 0, 1, 445, '2020-01-10 15:21:40', 'images/waiting list.PNG'),
(213, 'Player_5', 'Fortnite Boxfight', '1v1', 'NAE', 10, '121369313', 0, 1, 445, '2020-01-10 15:21:40', ''),
(214, 'Player_2', 'Fortnite Boxfight', '1v1', 'EU', 15, '227411184', 0, 0, 0, '2020-01-07 16:01:35', ''),
(215, 'Player_3', 'Fortnite Boxfight', '1v1', 'EU', 15, '227411184', 0, 0, 0, '2020-01-07 16:01:35', ''),
(219, 'asdasda', 'Fortnite Boxfight', '1v1', 'NAE', 15, '170264612', 0, 1, 456211, '2020-01-18 20:36:26', 'images/1280px-Flag_of_Portugal.svg.png'),
(220, 'Player_6', 'Fortnite Boxfight', '1v1', 'NAE', 15, '170264612', 0, 1, 456211, '2020-01-18 20:36:26', '');

-- --------------------------------------------------------

--
-- Table structure for table `setteled`
--

CREATE TABLE `setteled` (
  `id` int(11) NOT NULL,
  `gamername` varchar(20) NOT NULL,
  `gamekey` int(50) NOT NULL,
  `admin` varchar(10) NOT NULL,
  `score` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `setteled`
--

INSERT INTO `setteled` (`id`, `gamername`, `gamekey`, `admin`, `score`) VALUES
(7, 'Player_1', 121369313, 'admin_1', 445),
(8, 'Player_5', 121369313, 'admin_1', 445),
(9, 'asdasda', 170264612, 'admin_1', 456211),
(10, 'Player_6', 170264612, 'admin_1', 456211);

-- --------------------------------------------------------

--
-- Table structure for table `terminated_game_list`
--

CREATE TABLE `terminated_game_list` (
  `id` int(11) NOT NULL,
  `gamername` varchar(30) NOT NULL,
  `gamemode` varchar(30) NOT NULL,
  `vs_type` varchar(10) NOT NULL,
  `serverr` varchar(10) NOT NULL,
  `amount` int(11) NOT NULL,
  `Game_Key` varchar(200) NOT NULL,
  `confirmation` int(1) NOT NULL DEFAULT 0,
  `dispute` int(1) NOT NULL DEFAULT 0,
  `score` int(10) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `terminated_game_list`
--

INSERT INTO `terminated_game_list` (`id`, `gamername`, `gamemode`, `vs_type`, `serverr`, `amount`, `Game_Key`, `confirmation`, `dispute`, `score`) VALUES
(212, 'Player_1', 'Fortnite Boxfight', '1v1', 'NAE', 10, '121369313', 0, 0, 0),
(213, 'Player_5', 'Fortnite Boxfight', '1v1', 'NAE', 10, '121369313', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(240) NOT NULL,
  `gamername` varchar(50) NOT NULL,
  `email` varchar(240) NOT NULL,
  `password` varchar(240) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `img` int(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `gamername`, `email`, `password`, `date`, `img`) VALUES
(11, 'asd', 'asdas', 'a@a.c', '0cc175b9c0f1b6a831c399e269772661', '2020-01-19 11:26:23', 36);

-- --------------------------------------------------------

--
-- Table structure for table `wager_list`
--

CREATE TABLE `wager_list` (
  `ID` int(11) NOT NULL,
  `gamername` varchar(25) NOT NULL,
  `gamemode` varchar(25) NOT NULL,
  `vs_type` varchar(10) NOT NULL,
  `serverr` varchar(10) NOT NULL,
  `amount` bigint(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `wager_list`
--

INSERT INTO `wager_list` (`ID`, `gamername`, `gamemode`, `vs_type`, `serverr`, `amount`) VALUES
(242, 'Player_4', 'Fortnite Boxfight', '1v1', 'NAE', 5),
(245, 'Player_7', 'Fortnite Buildfight', '1v1', 'EU', 5),
(246, 'Player_8', 'Fortnite Buildfight', '1v1', 'EU', 10),
(248, 'Player_10', 'Fortnite Buildfight', '1v1', 'NAE', 5),
(249, 'Player_11', 'Fortnite Buildfight', '1v1', 'NAE', 10),
(250, 'Player_12', 'Fortnite Buildfight', '1v1', 'NAE', 15);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loginform`
--
ALTER TABLE `loginform`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `ongoing_game_list`
--
ALTER TABLE `ongoing_game_list`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `setteled`
--
ALTER TABLE `setteled`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `terminated_game_list`
--
ALTER TABLE `terminated_game_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wager_list`
--
ALTER TABLE `wager_list`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `loginform`
--
ALTER TABLE `loginform`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `ongoing_game_list`
--
ALTER TABLE `ongoing_game_list`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=221;

--
-- AUTO_INCREMENT for table `setteled`
--
ALTER TABLE `setteled`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `wager_list`
--
ALTER TABLE `wager_list`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=252;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
