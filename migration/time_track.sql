-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u1build0.15.04.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 21, 2016 at 04:22 PM
-- Server version: 5.6.28-0ubuntu0.15.04.1
-- PHP Version: 5.6.4-4ubuntu6.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `time_track`
--

-- --------------------------------------------------------

--
-- Table structure for table `log_entry`
--

CREATE TABLE IF NOT EXISTS `log_entry` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `entry_date` datetime NOT NULL,
  `started_working` datetime NOT NULL,
  `stopped_working` datetime NOT NULL,
  `comment` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log_entry`
--

INSERT INTO `log_entry` (`id`, `user_id`, `entry_date`, `started_working`, `stopped_working`, `comment`, `created_at`) VALUES
(7, 6, '2016-06-15 00:00:00', '2016-06-21 10:10:00', '2016-06-21 15:15:00', 'Memo of work', '2016-06-16 19:32:29'),
(8, 6, '2016-06-16 00:00:00', '2016-06-21 15:10:00', '2016-06-21 20:15:00', 'COntact us', '2016-06-16 19:32:51'),
(10, 6, '2016-06-20 00:00:00', '2016-06-21 00:00:00', '2016-06-21 00:00:00', 'Website', '2016-06-21 14:37:08'),
(13, 6, '2014-06-20 16:00:00', '2016-06-21 20:52:00', '2016-06-21 21:00:00', 'This is demo', '2016-06-21 14:52:24'),
(14, 8, '2020-06-20 16:00:00', '2016-06-14 12:00:00', '2016-06-14 21:00:00', 'Responsive design', '2016-06-21 15:14:23'),
(15, 8, '2015-06-20 16:00:00', '2016-06-15 13:30:00', '2016-06-15 23:15:00', 'Nodejs Programming', '2016-06-21 15:15:12'),
(16, 8, '2019-06-20 16:00:00', '2016-06-19 15:16:00', '2016-06-19 16:00:00', 'Game of Codes', '2016-06-21 15:16:33'),
(17, 3, '2020-06-20 16:00:00', '2016-06-20 15:44:00', '2016-06-21 18:00:00', 'Web Development on Time Tracking', '2016-06-21 15:45:14'),
(18, 3, '2007-06-20 16:00:00', '2016-06-07 17:00:00', '2016-06-07 20:00:00', 'Productivity Tools', '2016-06-21 16:19:13');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` varchar(7) NOT NULL DEFAULT 'normal',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `type`, `created_at`) VALUES
(3, 'new', '4297f44b13955235245b2497399d7a93', 'normal', '2016-06-15 11:42:28'),
(6, 'mit', '4297f44b13955235245b2497399d7a93', 'normal', '2016-06-15 12:33:28'),
(7, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', '2016-06-15 15:03:47'),
(8, 'hk', '4297f44b13955235245b2497399d7a93', 'normal', '2016-06-21 15:13:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `log_entry`
--
ALTER TABLE `log_entry`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `log_entry`
--
ALTER TABLE `log_entry`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
