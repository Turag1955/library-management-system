-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 02, 2020 at 06:20 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lms`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `id` int(5) NOT NULL,
  `book_name` varchar(50) NOT NULL,
  `book_author` varchar(50) NOT NULL,
  `book_pub_name` varchar(50) NOT NULL,
  `book_purchase_date` date NOT NULL,
  `book_price` varchar(10) NOT NULL,
  `book_quenty` int(5) NOT NULL,
  `abailavily_quenty` int(5) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `book_image` varchar(200) NOT NULL,
  `insert_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`id`, `book_name`, `book_author`, `book_pub_name`, `book_purchase_date`, `book_price`, `book_quenty`, `abailavily_quenty`, `user_name`, `book_image`, `insert_date`) VALUES
(2, 'Never Stop Learning', 'Ayman Sadik', 'Adorsho', '2020-06-01', '180', 1, 100, 'radif381955', 'Never Stop Learning-1593324434-.jpg', '2020-06-28 06:07:14'),
(3, 'Programing Coddo Gusti', 'Jankar Mahbub', 'Adarsha', '2020-06-11', '200', 1, 100, 'radif381955', 'Programing Coddo Gusti-1593324489-.jpg', '2020-06-28 06:08:09'),
(4, 'Habluder Jonno Programmin', 'Jhankar Mahbub', 'Adorsha', '2020-06-20', '250', 2, 250, 'radif381955', 'Habluder Jonno Programmin-1593324584-.jpg', '2020-06-28 06:09:44'),
(6, 'Recharge You Down Battery', 'Jhankar Mahbub', 'Adorsha', '2020-06-20', '200', 2, 0, 'radif381955', 'Recharge You Down Battery-1593324737-.jpg', '2020-06-28 06:12:17'),
(7, 'peradoxical sajid', 'arif azad', 'gardiyan', '2020-06-16', '180', 2, 200, 'radif381955', 'peradoxical sajid-1593488996-.jpg', '2020-06-30 03:49:56'),
(8, 'choker bali', 'robindo thakur', 'gardiyan', '2020-06-03', '222', 2, 10, 'radif381955', 'choker bali-1593493021-.jpg', '2020-06-30 04:57:01');

-- --------------------------------------------------------

--
-- Table structure for table `bookissu`
--

CREATE TABLE `bookissu` (
  `id` int(7) NOT NULL,
  `student_name` varchar(50) NOT NULL,
  `student_id` int(6) NOT NULL,
  `book_id` int(6) NOT NULL,
  `book_issu_date` varchar(50) NOT NULL,
  `book_return_date` varchar(50) NOT NULL,
  `data_insert_data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bookissu`
--

INSERT INTO `bookissu` (`id`, `student_name`, `student_id`, `book_id`, `book_issu_date`, `book_return_date`, `data_insert_data`) VALUES
(1, 'Rdif', 2, 2, '28-Jun-2020', '29-Jun-2020', '2020-06-28 10:50:26'),
(2, 'Rdif', 1, 6, '28-Jun-2020', '29-Jun-2020', '2020-06-28 10:54:25'),
(3, 'Rdif', 1, 3, '28-Jun-2020', '29-Jun-2020', '2020-06-28 17:47:37'),
(4, 'Rdif', 1, 4, '28-Jun-2020', '29-Jun-2020', '2020-06-28 17:47:49'),
(5, 'Juty', 2, 5, '28-Jun-2020', '29-Jun-2020', '2020-06-28 17:50:16'),
(6, 'Shimun', 3, 2, '28-Jun-2020', '30-Jun-2020', '2020-06-28 17:58:13'),
(7, 'Shimun', 3, 4, '29-Jun-2020', '29-Jun-2020', '2020-06-29 04:27:44'),
(8, 'Juty', 2, 2, '29-Jun-2020', '01-Jul-2020', '2020-06-29 04:47:45'),
(9, 'Rdif', 1, 5, '29-Jun-2020', '', '2020-06-29 10:53:52'),
(10, 'Shimun', 3, 4, '29-Jun-2020', '', '2020-06-29 11:03:14'),
(11, 'Shimun', 3, 2, '30-Jun-2020', '', '2020-06-30 03:51:40'),
(12, 'Yeasin', 4, 8, '30-Jun-2020', '', '2020-06-30 04:57:21'),
(13, 'Juty', 2, 4, '01-Jul-2020', '', '2020-07-01 08:49:38');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(5) NOT NULL,
  `student_id` int(5) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `message` varchar(300) NOT NULL,
  `admin_replay` varchar(500) NOT NULL,
  `insertdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `student_id`, `name`, `email`, `message`, `admin_replay`, `insertdate`) VALUES
(1, 3, 'Shimun', 'shimun@gmail.com', 'now this time 1.14', '', '2020-06-30 19:14:05'),
(2, 3, 'Shimun', 'shimun@gmail.com', 'ok bye', '', '2020-06-30 19:16:58'),
(3, 1, 'radif', 'radif@gmail.com', 'i am radif', '', '2020-06-30 19:23:31'),
(4, 3, 'Shimun', 'shimun@gmail.com', 'now this time 9.18', '', '2020-07-01 03:18:26'),
(5, 3, 'Shimun', 'shimun@gmail.com', 'now this time 9.18', '', '2020-07-01 03:20:08'),
(6, 1, 'radif', 'radif@gmail.com', 'i am message for juti', '', '2020-07-01 03:21:23');

-- --------------------------------------------------------

--
-- Table structure for table `librariyan`
--

CREATE TABLE `librariyan` (
  `id` int(5) NOT NULL,
  `librariyan_name` varchar(50) NOT NULL,
  `librariyan_email` varchar(50) NOT NULL,
  `librariyan_username` varchar(50) NOT NULL,
  `librariyan_password` varchar(200) NOT NULL,
  `librariyan_status` tinyint(4) NOT NULL,
  `libraiyan_image` varchar(200) NOT NULL,
  `insertdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `librariyan`
--

INSERT INTO `librariyan` (`id`, `librariyan_name`, `librariyan_email`, `librariyan_username`, `librariyan_password`, `librariyan_status`, `libraiyan_image`, `insertdate`) VALUES
(3, 'turag', 'radif@gmail.com', 'turag32@', '48826f08b0c4f3941a440ab2f00fa961', 1, 'pic-3.jpg', '2020-06-26 04:20:15'),
(4, 'onu', 'juty@gmail.com', 'onu2233', 'ccdf7402223ed1540a6f6b7760cac300', 1, 'juty-1593142945-.jpg', '2020-06-30 19:25:30'),
(5, 'Rakib iqbal', 'rakib@gmail.com', 'rakib2233', 'd810c0d9c12994511f5675b4ee9d2b5c', 1, 'Rakib iqbal-1593582626-.jpg', '2020-07-01 05:50:26');

-- --------------------------------------------------------

--
-- Table structure for table `replaymessage`
--

CREATE TABLE `replaymessage` (
  `id` int(5) NOT NULL,
  `admin_id` int(5) NOT NULL,
  `student_id` int(5) NOT NULL,
  `replay_message` varchar(300) NOT NULL,
  `insertdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `replaymessage`
--

INSERT INTO `replaymessage` (`id`, `admin_id`, `student_id`, `replay_message`, `insertdate`) VALUES
(1, 3, 3, 'now this time 1.16', '2020-06-30 19:16:15'),
(2, 3, 3, 'welcome student', '2020-06-30 19:17:40'),
(3, 0, 3, 'welcome student', '2020-06-30 19:23:40'),
(4, 4, 1, 'i am new admi in liraiyan ', '2020-06-30 19:27:52'),
(5, 3, 3, 'now time 9.19', '2020-07-01 03:20:01');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(6) NOT NULL,
  `student_name` varchar(50) NOT NULL,
  `student_roll` varchar(8) NOT NULL,
  `student_reg` varchar(8) NOT NULL,
  `student_department` varchar(30) NOT NULL,
  `student_number` varchar(11) NOT NULL,
  `student_email` varchar(50) NOT NULL,
  `student_username` varchar(50) NOT NULL,
  `student_password` varchar(200) NOT NULL,
  `student_status` tinyint(4) NOT NULL,
  `student_image` varchar(200) DEFAULT NULL,
  `insert_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `student_name`, `student_roll`, `student_reg`, `student_department`, `student_number`, `student_email`, `student_username`, `student_password`, `student_status`, `student_image`, `insert_date`) VALUES
(1, 'rdif', '381978', '219677', 'cmt', '01822010286', 'ra@gmail.com', 'radif381955', '$2y$10$jKXwDQ4TE5xbamPLOQkEAe95aBvkcztZhWsAOV3IY9erWtZO29bQO', 1, 'rdif-1593143187-.jpg', '2020-06-26 03:46:27'),
(2, 'juty', '3976', '5767', 'ET', '01822010286', 'juty@gmail.com', 'juty381955', '$2y$10$7Ymm3H7/uPjkrRnnzWXupeOJiGaqCAVHpYNLtLZy0IjSIZ8eXDsqC', 1, 'juty-1593152091-.jpg', '2020-06-26 06:14:51'),
(3, 'Shimun', '3097', '1232', 'Finance', '018332271', 'shimun@gmail.com', 'shimun10', '$2y$10$2KujERisnWsI0U4g/EyjKuliC4qWwng09v5uQoIXaWvcG62MIeQUi', 1, 'Shimun-1593366899-.jpg', '2020-06-28 17:54:59'),
(4, 'yeasin', '572', '22222', 'Accounting', '01690118523', 'yesin@gmail.com', 'yesin22', '$2y$10$qphVZL61TvlHuaPp7ppmbuy0DYDdGSdtr9r42pOaJ0YUW74yO7JcS', 0, 'yeasin-1593492859-.jpg', '2020-06-30 04:54:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookissu`
--
ALTER TABLE `bookissu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `librariyan`
--
ALTER TABLE `librariyan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `librariyan_email` (`librariyan_email`),
  ADD UNIQUE KEY `librariyan_username` (`librariyan_username`);

--
-- Indexes for table `replaymessage`
--
ALTER TABLE `replaymessage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `student_email` (`student_email`),
  ADD UNIQUE KEY `student_username` (`student_username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `bookissu`
--
ALTER TABLE `bookissu`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `librariyan`
--
ALTER TABLE `librariyan`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `replaymessage`
--
ALTER TABLE `replaymessage`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
