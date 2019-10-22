-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 22, 2019 at 03:55 AM
-- Server version: 5.7.24
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `addiction_manager`
--

-- --------------------------------------------------------

--
-- Table structure for table `addiction`
--

CREATE TABLE `addiction` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `date_created` date NOT NULL,
  `money_usually_spent` decimal(10,2) NOT NULL,
  `money_goal` decimal(10,2) NOT NULL,
  `money_achieved` decimal(10,2) NOT NULL,
  `streak_goal` int(11) NOT NULL,
  `streak_achieved` int(11) NOT NULL,
  `achieved_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `addiction`
--

INSERT INTO `addiction` (`id`, `user_id`, `name`, `date_created`, `money_usually_spent`, `money_goal`, `money_achieved`, `streak_goal`, `streak_achieved`, `achieved_stamp`) VALUES
(1, 1, 'alcohol', '2019-09-26', '0.00', '50.00', '0.00', 7, 2, '2019-10-08 02:43:31'),
(2, 1, 'smoking', '2019-09-26', '0.00', '50.00', '0.00', 7, 4, '2019-10-08 02:43:31'),
(5, 3, 'junk food', '2019-09-27', '0.00', '50.00', '0.00', 7, 0, '2019-10-08 02:43:31'),
(6, 1, 'junk food', '2019-10-07', '0.00', '50.00', '0.00', 7, 0, '2019-10-08 02:43:31'),
(7, 1, 'weed', '2019-10-08', '0.00', '50.00', '0.00', 7, 1, '2019-10-08 02:43:31'),
(8, 1, 'fsjksfdkj', '2019-10-08', '0.00', '50.00', '0.00', 7, 0, '2019-10-08 02:43:31'),
(9, 6, 'hihihi', '2019-10-08', '0.00', '50.00', '0.00', 14, 7, '2019-10-08 03:33:11'),
(10, 6, 'sdflkjdsfkj', '2019-10-08', '0.00', '50.00', '0.00', 7, 1, '2019-10-08 02:48:38'),
(12, 3, 'smoking', '2019-10-22', '0.00', '50.00', '0.00', 7, 2, '2019-10-22 03:13:47'),
(13, 3, 'weed', '2019-10-22', '25.00', '50.00', '50.00', 7, 3, '2019-10-22 03:31:37');

-- --------------------------------------------------------

--
-- Table structure for table `pledges`
--

CREATE TABLE `pledges` (
  `id` int(11) NOT NULL,
  `a_id` int(11) NOT NULL,
  `pledge` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pledges`
--

INSERT INTO `pledges` (`id`, `a_id`, `pledge`) VALUES
(5, 5, 'lskjdflsjdf lskjd flksjdf'),
(6, 5, 'lskdjflsiu gh'),
(7, 1, 'fsdjfsdkjdsfkj'),
(8, 6, 'kjlfsdjklfdsjkldsf'),
(9, 9, 'fsdjkdfskjdsfkjdfskjdfskjfdsjk'),
(10, 9, 'actual data to check'),
(11, 13, 'bleh');

-- --------------------------------------------------------

--
-- Table structure for table `suggestions`
--

CREATE TABLE `suggestions` (
  `id` int(11) NOT NULL,
  `sugg` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `suggestions`
--

INSERT INTO `suggestions` (`id`, `sugg`) VALUES
(1, 'Seeking help? Call 0800 787 797'),
(2, 'Seeking help? Text 8681'),
(3, 'Stay away from situations that may trigger you'),
(4, 'Take care of yourself'),
(5, 'Create a trigger plan, and practice it'),
(6, 'Don\'t test yourself');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(4) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(40) NOT NULL,
  `session_id` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `session_id`) VALUES
(1, 'KJ', '123', NULL),
(3, 'hihi', 'hihi', '6d5b688bd63d9c83a89d367de714c96b'),
(4, 'bleh', '123', NULL),
(5, 'muk', 'muk', NULL),
(6, 'test', 'test', '85bd2bf471e79a29399c3310f2a243db'),
(7, 'new acc', '123', 'acdefac3ad06f93e60c303155e0f6d4c');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addiction`
--
ALTER TABLE `addiction`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `pledges`
--
ALTER TABLE `pledges`
  ADD PRIMARY KEY (`id`),
  ADD KEY `a_id` (`a_id`);

--
-- Indexes for table `suggestions`
--
ALTER TABLE `suggestions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addiction`
--
ALTER TABLE `addiction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `pledges`
--
ALTER TABLE `pledges`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `suggestions`
--
ALTER TABLE `suggestions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `addiction`
--
ALTER TABLE `addiction`
  ADD CONSTRAINT `addiction_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `pledges`
--
ALTER TABLE `pledges`
  ADD CONSTRAINT `pledges_ibfk_1` FOREIGN KEY (`a_id`) REFERENCES `addiction` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
