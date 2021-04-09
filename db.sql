-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 31, 2021 at 08:27 AM
-- Server version: 5.6.47-cll-lve
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mountainclimber`
--

-- --------------------------------------------------------

--
-- Table structure for table `early_signups`
--

CREATE TABLE `early_signups` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `site` varchar(120) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `early_signups`
--

INSERT INTO `early_signups` (`id`, `email`, `reg_date`, `site`) VALUES
(1, 'a@mail.com', '2021-01-09 15:59:06', ''),
(2, 'jeff@bridges.com', '2021-01-09 15:59:20', ''),
(3, 'admin@admin.com', '2021-01-09 16:02:15', ''),
(4, 'jeff_bridges312@yahoo.com', '2021-01-09 16:05:25', ''),
(5, 'jason@gmail.net', '2021-02-14 16:12:19', ''),
(6, 'rat@gmail.com', '2021-02-27 18:21:54', ''),
(7, 'gabriel@garfield.com', '2021-02-27 18:24:07', 'webfly'),
(8, 'ubzzy214don@gmail.com', '2021-03-07 07:20:29', 'webfly'),
(9, 'franziska.spoddig@gmx.de', '2021-03-11 08:52:25', 'webfly'),
(10, 'rataidrums@gmail.com', '2021-03-13 17:26:49', 'aidrums');

-- --------------------------------------------------------

--
-- Table structure for table `race`
--

CREATE TABLE `race` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `starting_lat` double NOT NULL,
  `starting_lon` double NOT NULL,
  `ending_lat` double NOT NULL,
  `ending_lon` double NOT NULL,
  `default_race_type` int(11) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `race`
--

INSERT INTO `race` (`id`, `name`, `starting_lat`, `starting_lon`, `ending_lat`, `ending_lon`, `default_race_type`) VALUES
(1, 'Hammer', 43.2506872, -79.8595106, 43.2436279, -79.8804181, 1),
(2, 'Rat', 43.2448764, -79.8806354, 43.2448764, -79.8806354, 1),
(3, 'Test2', 43.2448764, -79.8806354, 43.2436279, -79.8804181, 1);

-- --------------------------------------------------------

--
-- Table structure for table `racer_profile`
--

CREATE TABLE `racer_profile` (
  `id` int(11) NOT NULL,
  `name` varchar(80) NOT NULL,
  `initials` varchar(20) NOT NULL,
  `email` varchar(200) NOT NULL,
  `message` varchar(600) NOT NULL,
  `url` varchar(200) NOT NULL,
  `reg_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(11) NOT NULL DEFAULT 'NEUTRAL',
  `start_time` datetime NOT NULL,
  `end_time` datetime NOT NULL,
  `hash` varchar(20) NOT NULL,
  `show_email` tinyint(1) NOT NULL DEFAULT '0',
  `confirmed` tinyint(1) NOT NULL DEFAULT '0',
  `race_type` int(11) DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `racer_profile`
--

INSERT INTO `racer_profile` (`id`, `name`, `initials`, `email`, `message`, `url`, `reg_date`, `status`, `start_time`, `end_time`, `hash`, `show_email`, `confirmed`, `race_type`) VALUES
(110, 'James Frak', 'FRAK', 'frak_432@gmail.com', 'Wow no way, first place?  \r\ncheck out my band on hamontify: hamontify.com/jfrak', 'https://hamontify.com/', '2021-01-08 07:54:34', 'finished', '2021-01-09 11:01:37', '2021-01-09 11:20:40', '9115fe3cec19e9f81662', 0, 0, 2),
(127, 'Jeffrey Malone', 'JEFM', 'Jeff_312_w@gmail.com', 'Cool!', '', '2021-01-10 08:11:35', 'finished', '2021-01-08 14:30:27', '2021-01-08 14:52:37', '', 0, 0, 2),
(126, 'Gary B', 'GHI', 'gary_312@webfly.io', 'Wow I did it.  EMail me if anyone needs bike repair services', 'garyb.webfly.io', '2021-01-10 07:42:30', 'finished', '2021-01-08 14:34:37', '2021-01-08 14:59:32', '8789asdiui23987', 0, 1, 2),
(128, 'Catharine', 'CATH', 'catharine_38@webfly.io', 'That was tiring', '', '2021-01-10 08:18:51', 'finished', '2021-01-08 14:14:37', '2021-01-08 14:58:37', '', 0, 1, 1),
(133, 'Garreth Malone', 'GMM', 'garreth@menufox.net', 'I cant believe i ate the whole thing', '', '2021-01-10 10:27:17', 'finished', '2021-01-10 14:04:37', '2021-01-10 14:58:37', '', 0, 0, 1),
(132, 'Garreth Malone', 'DAN', 'garreth@menufox.net', 'I cant believe i ate the whole thing', '', '2021-01-10 10:22:47', 'finished', '2021-01-10 14:04:37', '2021-01-10 14:58:36', 'jkhsd987asdfjk', 0, 1, 1),
(134, '', 'XXY', '', '', '', '2021-01-10 12:47:12', 'finished', '2021-01-10 12:04:37', '2021-01-10 12:34:35', '', 0, 0, 2),
(136, '', 'dsd', '', '', '', '2021-01-10 20:39:05', 'ready', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0, 0, 1),
(137, 'Jeff H', 'Jeff', 'Jeff@menufox.net', 'Wow I blew it! ????????', '', '2021-01-12 07:58:20', 'finished', '2021-01-12 14:58:44', '2021-01-12 16:04:02', '91a4c8858f284a084c6f', 0, 0, 1),
(138, 'Damien', 'DAMI', 'Damien_43@gmail.com', 'Reading this message?  Head over to Damiens for half price wings any day of the week', 'https://damiens-grill.com', '2021-01-14 06:09:07', 'finished', '2021-01-12 14:08:45', '2021-01-12 14:58:44', '', 0, 0, 1),
(139, '', 'Abra', '', '', '', '2021-01-14 11:31:58', 'finished', '2021-01-14 18:32:00', '2021-01-14 19:33:42', '', 0, 0, 1),
(141, '', 'Russ', '', '', '', '2021-01-24 07:13:00', 'finished', '2021-01-24 14:13:01', '2021-01-24 14:56:22', '', 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `race_types`
--

CREATE TABLE `race_types` (
  `id` int(11) NOT NULL,
  `name` varchar(128) DEFAULT NULL,
  `is_system` binary(128) DEFAULT '0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `race_types`
--

INSERT INTO `race_types` (`id`, `name`, `is_system`) VALUES
(1, 'On Foot', 0x3100000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000),
(2, 'Bicycle', 0x3100000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000);

-- --------------------------------------------------------

--
-- Table structure for table `records`
--

CREATE TABLE `records` (
  `id` int(11) NOT NULL,
  `profile_id` int(11) NOT NULL,
  `code` varchar(20) NOT NULL,
  `time_start` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `time_end` datetime NOT NULL,
  `race_type` int(11) NOT NULL DEFAULT '1' COMMENT '1 for walk 2 for bicycle'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `early_signups`
--
ALTER TABLE `early_signups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `race`
--
ALTER TABLE `race`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `racer_profile`
--
ALTER TABLE `racer_profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `race_types`
--
ALTER TABLE `race_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `records`
--
ALTER TABLE `records`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `early_signups`
--
ALTER TABLE `early_signups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `race`
--
ALTER TABLE `race`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `racer_profile`
--
ALTER TABLE `racer_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;

--
-- AUTO_INCREMENT for table `race_types`
--
ALTER TABLE `race_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `records`
--
ALTER TABLE `records`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
