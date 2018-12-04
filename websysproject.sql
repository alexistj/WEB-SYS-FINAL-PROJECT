-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2018 at 08:24 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `websysproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `age` int(10) UNSIGNED NOT NULL,
  `email` varchar(100) NOT NULL,
  `location` varchar(100) DEFAULT NULL,
  `gender` varchar(100) DEFAULT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `name`, `age`, `email`, `location`, `gender`, `password`) VALUES
(1, 'Cindy Levy', 18, 'clev6@rpi.edu', 'NY', 'Female', '&-fweL%8t?P=U$J#'),
(2, 'Leo Martin', 16, 'lmart7@rpi.edu', 'NY', 'Male', 'r7ennjcV^8V%&sfz'),
(3, 'Kassandra Cooley', 14, 'kool2@rpi.edu', 'NY', 'Female', 'KP!Zx-q?&mHuh739'),
(4, 'Frederick Kaufman', 20, 'faufman4@rpi.edu', 'NY', 'Male', '^!^E9xvs#zw=pKP5'),
(5, 'Izabelle Robinson', 30, 'ison3@rpi.edu', 'NY', 'Female', '&cu?XcbtFsC9w8j-'),
(6, 'Gunner Burns', 27, 'gurns6@rpi.edu', 'NY', 'Male', 'vG=nygD6WM=j6!ka'),
(7, 'Tia Archer', 28, 'tarch5@rpi.edu', 'NY', 'Female', '2aLP$Y4%w%^7FJ8n');

-- --------------------------------------------------------

--
-- Table structure for table `mentees`
--

CREATE TABLE `mentees` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `age` int(10) UNSIGNED NOT NULL,
  `email` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `picture` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mentees`
--

INSERT INTO `mentees` (`id`, `name`, `age`, `email`, `location`, `gender`, `picture`, `password`) VALUES
(1, 'Travis', 18, 'petert6', 'here', 'male', 'none', 'welcome'),
(2, 'James', 18, 'petert7', 'here', 'male', 'none', 'welcome'),
(3, 'Jackie', 18, 'petert8', 'here', 'female', 'none', 'welcome');

-- --------------------------------------------------------

--
-- Table structure for table `mentors`
--

CREATE TABLE `mentors` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `age` int(10) UNSIGNED NOT NULL,
  `email` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `picture` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `occupation` varchar(100) NOT NULL,
  `num_mentees` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mentors`
--

INSERT INTO `mentors` (`id`, `name`, `age`, `email`, `location`, `gender`, `picture`, `password`, `occupation`, `num_mentees`) VALUES
(12, 'Travis', 30, 'petert9', 'here', 'male', 'none', 'welcome', 'Instructor', 3),
(13, 'Max', 30, 'petert10', 'here', 'male', 'none', 'welcome', 'Instructor', 4),
(14, 'London', 30, 'petert15', 'here', 'female', 'none', 'welcome', 'Instructor', 3);

-- --------------------------------------------------------

--
-- Table structure for table `messenger`
--

CREATE TABLE `messenger` (
  `SenderID` int(11) NOT NULL,
  `ReceiverID` int(11) NOT NULL,
  `Message` varchar(255) NOT NULL,
  `Date` date NOT NULL,
  `Time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `messenger`
--

INSERT INTO `messenger` (`SenderID`, `ReceiverID`, `Message`, `Date`, `Time`) VALUES
(0, 0, '', '0000-00-00', ''),
(0, 0, '', '0000-00-00', ''),
(0, 0, '', '0000-00-00', ''),
(0, 0, '', '0000-00-00', ''),
(0, 0, '', '0000-00-00', ''),
(0, 0, '', '0000-00-00', ''),
(0, 0, '', '0000-00-00', ''),
(0, 0, '', '0000-00-00', ''),
(0, 0, '', '0000-00-00', ''),
(0, 0, '', '0000-00-00', ''),
(0, 0, '', '0000-00-00', ''),
(0, 0, '', '0000-00-00', ''),
(0, 0, '', '0000-00-00', ''),
(0, 0, '', '0000-00-00', ''),
(0, 0, '', '0000-00-00', ''),
(0, 0, '', '0000-00-00', ''),
(0, 0, '', '0000-00-00', ''),
(12, 34, 'hi', '0000-00-00', ''),
(0, 0, '', '0000-00-00', ''),
(12, 23, 'hi', '0000-00-00', ''),
(12, 23, 'hi', '0000-00-00', ''),
(12, 23, 'hi', '0000-00-00', ''),
(12, 23, 'hi', '0000-00-00', ''),
(12, 23, 'hi', '0000-00-00', ''),
(12, 23, 'hi', '0000-00-00', ''),
(12, 23, 'hi', '0000-00-00', ''),
(12, 23, 'hi', '0000-00-00', ''),
(12, 23, 'hi', '0000-00-00', ''),
(12, 23, 'hi', '0000-00-00', ''),
(12, 23, 'hi', '0000-00-00', ''),
(12, 23, 'hi', '0000-00-00', ''),
(12, 23, 'hi', '0000-00-00', ''),
(12, 23, 'hi', '0000-00-00', '1541907025'),
(32, 23, 'hello', '0000-00-00', '1541907036'),
(32, 34, 'Hello I am travis', '0000-00-00', '1541907076'),
(1, 2, 'This is just a test', '0000-00-00', '1541908649'),
(1, 2, 'This is just a test', '0000-00-00', '1541908807'),
(1, 2, 'This is just a test', '0000-00-00', '1541912892'),
(1, 2, 'This is just a test', '0000-00-00', '1541913097'),
(1, 2, 'This is just a test', '0000-00-00', '1541913308'),
(6, 7, 'Yet another Test', '0000-00-00', '1541966180'),
(6, 7, 'Yet another Test', '2018-11-11', '1541969581'),
(334, 445, 'how ya doing', '2018-11-11', '1541969592'),
(334, 445, 'how ya doing', '2018-11-11', '05:17:55pm'),
(11119, 11118, 'Having some fun', '2018-11-11', '05:18:09pm'),
(12345, 678910, 'This is a test', '2018-11-13', '09:59:08am'),
(12345, 678910, 'This is a test', '2018-11-13', '09:59:45am'),
(12345, 678910, 'This is a test', '2018-11-13', '10:05:14am'),
(12345, 678910, 'This is a test', '2018-11-13', '10:06:43am'),
(12345, 678910, 'This is a test', '2018-11-13', '10:10:14am'),
(12345, 678910, 'This is a test', '2018-11-13', '10:10:29am'),
(12345, 678910, 'This is a test', '2018-11-13', '10:11:07am'),
(12345, 678910, 'This is a test', '2018-11-13', '10:11:43am'),
(12345, 678910, 'This is a test', '2018-11-13', '10:11:48am'),
(12345, 678910, 'This is a test', '2018-11-13', '10:12:00am'),
(12345, 678910, 'This is a test', '2018-11-13', '10:14:21am'),
(12345, 678910, 'This is a test', '2018-11-13', '10:14:46am'),
(2147483647, 2147483647, 'This is tricky', '2018-11-13', '10:15:01am'),
(12345678, 87654321, 'What is wrong with this thing?', '2018-11-13', '10:15:41am'),
(12345678, 87654321, 'What is wrong with this thing?', '2018-11-13', '10:20:53am'),
(12, 13, 'here', '2018-11-13', '10:21:09am'),
(12, 13, 'here', '2018-11-13', '10:21:17am'),
(12, 13, 'here', '2018-11-13', '10:25:19am'),
(334, 445, 'Does this work', '2018-11-13', '10:25:30am'),
(334, 445, 'Does this work', '2018-11-13', '10:25:48am'),
(334, 445, 'Does this work', '2018-11-13', '10:30:28am'),
(334, 445, 'Does this work', '2018-11-13', '10:31:06am'),
(334, 445, 'Does this work', '2018-11-13', '10:31:12am'),
(334, 445, 'Does this work', '2018-11-13', '10:36:43am'),
(334, 445, 'Does this work', '2018-11-13', '10:36:52am'),
(334, 445, 'Does this work', '2018-11-13', '10:42:09am'),
(334, 445, 'Does this work', '2018-11-13', '10:42:14am'),
(999999, 888888, 'This is a test for the messenger page of the project.', '2018-11-13', '03:39:50pm'),
(12, 13, 'hi', '2018-11-13', '10:14:32pm'),
(12, 13, 'hi', '2018-11-13', '10:17:06pm'),
(12, 13, 'hi', '2018-11-13', '10:18:08pm'),
(12, 13, 'hi', '2018-11-13', '10:18:24pm'),
(12, 13, 'hi', '2018-11-13', '10:22:20pm'),
(12, 13, 'hi', '2018-11-13', '10:25:37pm'),
(12, 13, 'hi', '2018-11-13', '10:37:39pm'),
(12, 13, 'hi', '2018-11-13', '10:40:31pm'),
(12, 13, 'hi', '2018-11-13', '10:40:39pm'),
(12, 13, 'hi', '2018-11-13', '10:42:01pm'),
(12, 13, 'hi', '2018-11-13', '10:43:59pm'),
(12, 13, 'hi', '2018-11-13', '10:53:59pm'),
(12, 13, 'hi', '2018-11-13', '10:55:17pm'),
(12, 13, 'hi', '2018-11-13', '10:55:56pm'),
(12, 13, 'hi', '2018-11-13', '10:57:27pm'),
(12, 13, 'hi', '2018-11-13', '10:58:22pm'),
(12, 13, 'hi', '2018-11-13', '10:58:38pm'),
(12, 13, 'hi', '2018-11-13', '10:59:00pm'),
(12, 13, 'hi', '2018-11-13', '11:00:52pm'),
(12, 13, 'hi', '2018-11-13', '11:01:18pm'),
(12, 13, 'hi', '2018-11-13', '11:04:52pm'),
(12, 14, 'hi', '2018-11-13', '11:29:20pm'),
(12, 14, 'hi', '2018-11-13', '11:30:21pm'),
(12, 14, 'hi', '2018-11-13', '11:30:37pm'),
(12, 14, 'hi', '2018-11-13', '11:31:20pm'),
(12, 14, 'hi', '2018-11-13', '11:32:47pm'),
(12, 34, 'What is up', '2018-11-14', '05:00:11pm'),
(1, 2, 'Hi', '2018-11-14', '05:01:20pm'),
(100, 200, 'hi', '2018-11-14', '05:01:29pm'),
(100, 200, 'hi', '2018-11-14', '05:02:18pm'),
(1, 3, 'Testing testing', '2018-11-14', '05:02:44pm'),
(1, 3, 'Testing testing', '2018-11-14', '05:04:50pm'),
(1, 3, 'Testing testing', '2018-11-14', '05:05:39pm'),
(1, 3, 'Testing testing', '2018-11-14', '05:05:55pm'),
(1, 2, 'Hi', '2018-11-14', '05:29:37pm'),
(1, 2, 'Hi', '2018-11-14', '05:30:17pm'),
(1, 2, 'Hi', '2018-11-14', '05:42:13pm'),
(1, 2, 'Hi', '2018-11-14', '05:42:34pm'),
(1, 2, 'Hi', '2018-11-14', '05:47:36pm'),
(1, 2, 'Hi', '2018-11-14', '05:49:10pm'),
(1, 2, 'Hi', '2018-11-14', '05:49:24pm'),
(1, 2, 'Hi', '2018-11-14', '05:51:46pm'),
(1, 2, 'Hi', '2018-11-14', '05:52:01pm'),
(1, 2, 'Hi', '2018-11-14', '05:52:33pm'),
(1, 2, 'Hi', '2018-11-14', '05:54:33pm'),
(1, 2, 'Hi', '2018-11-14', '05:55:01pm'),
(1, 2, 'This is yet another test', '2018-11-16', '02:06:48pm'),
(1, 2, 'Hi', '2018-11-18', '11:27:03pm'),
(1, 2, 'Hi', '2018-11-18', '11:28:01pm'),
(1, 2, 'Hi', '2018-11-18', '11:31:00pm'),
(1, 2, 'hi', '2018-11-18', '11:31:26pm'),
(1, 2, 'hi', '2018-11-18', '11:32:06pm'),
(1, 2, 'hi', '2018-11-18', '11:33:21pm'),
(1, 2, 'hi', '2018-11-18', '11:34:52pm'),
(1, 2, 'hi', '2018-11-18', '11:38:59pm'),
(1, 2, 'hi', '2018-11-18', '11:40:00pm'),
(1, 2, 'hi', '2018-11-18', '11:40:55pm'),
(1, 2, 'hi', '2018-11-18', '11:41:57pm'),
(1, 2, 'Hi', '2018-11-18', '11:42:41pm'),
(1, 2, 'Hi', '2018-11-18', '11:43:59pm'),
(1, 2, 'hi', '2018-11-18', '11:44:22pm'),
(1, 4, 'Hi', '2018-11-18', '11:48:26pm'),
(3, 6, 'hello', '2018-11-19', '09:19:25am'),
(85, 95, 'hi', '2018-11-20', '02:26:44pm'),
(1, 2, 'Hello this is a test', '2018-11-20', '02:35:07pm');

-- --------------------------------------------------------

--
-- Table structure for table `practice`
--

CREATE TABLE `practice` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `age` int(10) UNSIGNED NOT NULL,
  `email` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `picture` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `practice2`
--

CREATE TABLE `practice2` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `age` int(10) UNSIGNED NOT NULL,
  `email` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `picture` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `mentorOrMentee` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `practice2`
--

INSERT INTO `practice2` (`id`, `name`, `age`, `email`, `location`, `gender`, `picture`, `password`, `mentorOrMentee`) VALUES
(1, 'Travis', 21, 'petert6', '513 Willow Grove Road', 'male', 'none', 'hello', b'1111111111111111111111111111111'),
(2, 'James', 19, 'James6', '513 Willow Grove Road', 'male', 'none', 'hello', b'1111111111111111111111111111111'),
(3, 'Jackie', 22, 'Jackie6', '513 Willow Grove Road', 'female', 'none', 'hello', b'1111111111111111111111111111111'),
(4, 'John', 30, 'John6', '513 Willow Grove Road', 'male', 'none', 'hello', b'1111111111111111111111111111111'),
(5, 'Donna', 31, 'donna6', '513 Willow Grove Road', 'female', 'none', 'hello', b'1111111111111111111111111111111'),
(6, 'Debbie', 32, 'Debbie6', '513 Willow Grove Road', 'female', 'none', 'hello', b'1111111111111111111111111111111');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mentees`
--
ALTER TABLE `mentees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mentors`
--
ALTER TABLE `mentors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messenger`
--
ALTER TABLE `messenger`
  ADD KEY `SenderID` (`SenderID`) USING BTREE;

--
-- Indexes for table `practice`
--
ALTER TABLE `practice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `practice2`
--
ALTER TABLE `practice2`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `mentees`
--
ALTER TABLE `mentees`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mentors`
--
ALTER TABLE `mentors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `practice`
--
ALTER TABLE `practice`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `practice2`
--
ALTER TABLE `practice2`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
