-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 17, 2019 at 08:51 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myonlinelawyer`
--

-- --------------------------------------------------------

--
-- Table structure for table `ans_like_details`
--

CREATE TABLE `ans_like_details` (
  `id` int(11) NOT NULL,
  `a_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ans_like_details`
--

INSERT INTO `ans_like_details` (`id`, `a_id`, `user_id`) VALUES
(1, 1, 15),
(2, 2, 15),
(3, 3, 15),
(4, 4, 15),
(5, 5, 15),
(6, 6, 15);

-- --------------------------------------------------------

--
-- Table structure for table `ola`
--

CREATE TABLE `ola` (
  `q_id` int(15) NOT NULL,
  `user_id` int(15) NOT NULL,
  `heading` varchar(100) NOT NULL,
  `topic` varchar(100) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `city` varchar(100) NOT NULL,
  `likes` int(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ola`
--

INSERT INTO `ola` (`q_id`, `user_id`, `heading`, `topic`, `description`, `city`, `likes`) VALUES
(2, 15, 'Hello', 'Business', 'Hi i am Shashwat Sanket', 'Chennai', 33),
(4, 15, 'Hello111', 'Constitution', 'Shashwat Sanket', 'Patna', 4),
(5, 15, 'himan chiman ', 'Civil', 'lfjldsjklsdafjkasjfkdsfkladmklfmdsakfmdsklafmklsdamfklsdfmasdfsdafsdfdsfsdfsadfdsfsdafdsafsdafdsfdsafdsfdsfdsfadsfdsafdsfdsfdsfdsfsdfasfdsfdsfsa', 'Luckhnow', 4),
(7, 15, 'Hello1112w1', 'Civil', 'ldfldsjfklmskdlsdkcsklmsklmslkdmklmsdlkdsasa', 'vellore', 3),
(8, 15, 'himan chiman11', 'Accident', 'sdsdsdsdsdsdsdsdsdssdsd      	', 'eewew', 2);

-- --------------------------------------------------------

--
-- Table structure for table `ola_answer`
--

CREATE TABLE `ola_answer` (
  `a_id` int(15) NOT NULL,
  `q_id` int(15) NOT NULL,
  `user_id` int(15) NOT NULL,
  `answer` varchar(1000) NOT NULL,
  `likes` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ola_answer`
--

INSERT INTO `ola_answer` (`a_id`, `q_id`, `user_id`, `answer`, `likes`) VALUES
(1, 2, 15, 'Piyush Kappor', 42),
(2, 4, 15, 'sdsdsdsdsdsdsdd', 5),
(3, 4, 15, 'dsdsdsdsdsdd', 3),
(4, 7, 15, 'sczcccsadcacsaascacacasc', 4),
(5, 7, 15, 'dadadasdasdsadsdsadsad', 4),
(6, 7, 15, 'dasdsddsdasddasdasd', 3);

-- --------------------------------------------------------

--
-- Table structure for table `ques_like_details`
--

CREATE TABLE `ques_like_details` (
  `id` int(11) NOT NULL,
  `q_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ques_like_details`
--

INSERT INTO `ques_like_details` (`id`, `q_id`, `user_id`) VALUES
(1, 2, 15),
(6, 4, 15),
(7, 5, 15),
(8, 7, 15),
(9, 8, 15);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `email` varchar(60) NOT NULL,
  `mobileNo` varchar(10) NOT NULL,
  `type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `email`, `mobileNo`, `type`) VALUES
(15, 'Shashwat Sanket', 'admin', '$2y$10$thisisshashwatsanket1u4bQ9/MjkEfb8WXCKXR8xTpXELL5DYNu', 'shashwatsanket997@gmail.com', '9162812185', 'Advocate'),
(16, 'Sanket', 'admin211', '$2y$10$thisisshashwatsanket1u4bQ9/MjkEfb8WXCKXR8xTpXELL5DYNu', 'shashwat#sanket997@gmail.com', '8523697412', 'Client'),
(17, 'sanket', 'admin65656', '$2y$10$thisisshashwatsanket1u9O6dpc6bu9KSk.g4/4tnUZ55D1mhvrm', 'shaswat.sankey997@gmail.com', '9455041618', 'Advocate'),
(18, 'client ', 'user_name', '$2y$10$thisisshashwatsanket1u9O6dpc6bu9KSk.g4/4tnUZ55D1mhvrm', 'shashwat.sanket78@gmail.com', '8563241452', 'Client');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ans_like_details`
--
ALTER TABLE `ans_like_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ans_like_details_ibfk_1` (`a_id`),
  ADD KEY `ans_like_details_ibfk_2` (`user_id`);

--
-- Indexes for table `ola`
--
ALTER TABLE `ola`
  ADD PRIMARY KEY (`q_id`),
  ADD KEY `ola_ibfk_1` (`user_id`);

--
-- Indexes for table `ola_answer`
--
ALTER TABLE `ola_answer`
  ADD PRIMARY KEY (`a_id`),
  ADD KEY `ola_answer_ibfk_1` (`q_id`),
  ADD KEY `ola_answer_ibfk_2` (`user_id`);

--
-- Indexes for table `ques_like_details`
--
ALTER TABLE `ques_like_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ques_like_details_ibfk_1` (`q_id`),
  ADD KEY `ques_like_details_ibfk_2` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`,`mobileNo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ans_like_details`
--
ALTER TABLE `ans_like_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ola`
--
ALTER TABLE `ola`
  MODIFY `q_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `ola_answer`
--
ALTER TABLE `ola_answer`
  MODIFY `a_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ques_like_details`
--
ALTER TABLE `ques_like_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ans_like_details`
--
ALTER TABLE `ans_like_details`
  ADD CONSTRAINT `ans_like_details_ibfk_1` FOREIGN KEY (`a_id`) REFERENCES `ola_answer` (`a_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ans_like_details_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ola`
--
ALTER TABLE `ola`
  ADD CONSTRAINT `ola_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ola_answer`
--
ALTER TABLE `ola_answer`
  ADD CONSTRAINT `ola_answer_ibfk_1` FOREIGN KEY (`q_id`) REFERENCES `ola` (`q_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ola_answer_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ques_like_details`
--
ALTER TABLE `ques_like_details`
  ADD CONSTRAINT `ques_like_details_ibfk_1` FOREIGN KEY (`q_id`) REFERENCES `ola` (`q_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ques_like_details_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
