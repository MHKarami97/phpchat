-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 11, 2018 at 12:26 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `messengerdb`
--
DROP DATABASE IF EXISTS `messengerdb`;
CREATE DATABASE IF NOT EXISTS `messengerdb` DEFAULT CHARACTER SET utf8 COLLATE utf8_persian_ci;
USE `messengerdb`;

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--
-- Creation: Jul 11, 2018 at 05:50 AM
--

DROP TABLE IF EXISTS `activities`;
CREATE TABLE `activities` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `login_time` varchar(255) COLLATE utf8_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- RELATIONSHIPS FOR TABLE `activities`:
--

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`id`, `user_id`, `login_time`) VALUES
(3, 6, '1531304710'),
(4, 7, '1531304662');

-- --------------------------------------------------------

--
-- Table structure for table `clean`
--
-- Creation: Jul 10, 2018 at 07:21 AM
--

DROP TABLE IF EXISTS `clean`;
CREATE TABLE `clean` (
  `id` int(11) NOT NULL,
  `message_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- RELATIONSHIPS FOR TABLE `clean`:
--

--
-- Dumping data for table `clean`
--

INSERT INTO `clean` (`id`, `message_id`, `user_id`) VALUES
(3, 1, 6),
(4, 57, 7);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--
-- Creation: Jul 10, 2018 at 06:55 AM
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `message` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `type` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- RELATIONSHIPS FOR TABLE `messages`:
--   `user_id`
--       `users` -> `id`
--

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `message`, `type`, `user_id`, `time`) VALUES
(53, 'سلام', 'text', 6, '2018-07-11 10:22:50'),
(54, 'خوبی؟', 'text', 6, '2018-07-11 10:22:54'),
(55, 'چی کار میکنی؟', 'text', 6, '2018-07-11 10:23:03'),
(56, 'assets/img/emoji/2.png', 'emoji', 6, '2018-07-11 10:23:08'),
(57, 'hello', 'text', 7, '2018-07-11 10:24:36'),
(58, 'lets start chat', 'text', 7, '2018-07-11 10:24:54'),
(59, 'چی کارا میکنی؟', 'text', 6, '2018-07-11 10:25:33');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--
-- Creation: Jul 10, 2018 at 07:15 AM
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `status` int(11) NOT NULL,
  `clean_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- RELATIONSHIPS FOR TABLE `users`:
--

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `image`, `status`, `clean_status`) VALUES
(6, 'mohammad', 'itarfand@gmail.com', '$2y$10$egIGJWvA0H7t.fsylOLmYOEu4cv1LUUm77AvHI.yw3FuSzDa..UIO', 'IAMIRANIAN813786.png', 1, 1),
(7, 'ali', 'mhkarami1997@gmail.com', '$2y$10$GtDUscnDeZmU29FqCIZTSeSBSWoVskoTUSw1kjV.nbtUfSn3H1sDO', 'avatar (81)406515.png', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clean`
--
ALTER TABLE `clean`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `clean`
--
ALTER TABLE `clean`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;


--
-- Metadata
--
USE `phpmyadmin`;

--
-- Metadata for table activities
--

--
-- Metadata for table clean
--

--
-- Dumping data for table `pma__table_uiprefs`
--

INSERT INTO `pma__table_uiprefs` (`username`, `db_name`, `table_name`, `prefs`, `last_update`) VALUES
('root', 'messengerdb', 'clean', '{\"CREATE_TIME\":\"2018-07-10 11:51:43\",\"col_order\":[0,2,1],\"col_visib\":[1,1,1]}', '2018-07-10 13:42:08');

--
-- Metadata for table messages
--

--
-- Dumping data for table `pma__table_uiprefs`
--

INSERT INTO `pma__table_uiprefs` (`username`, `db_name`, `table_name`, `prefs`, `last_update`) VALUES
('root', 'messengerdb', 'messages', '{\"sorted_col\":\"`id`  DESC\"}', '2018-07-11 10:18:34');

--
-- Metadata for table users
--

--
-- Metadata for database messengerdb
--
SET FOREIGN_KEY_CHECKS=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
