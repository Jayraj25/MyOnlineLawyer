-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 26, 2019 at 02:59 PM
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
-- Table structure for table `adv_profile`
--

CREATE TABLE `adv_profile` (
  `id` int(2) NOT NULL,
  `name` varchar(20) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `email` varchar(20) NOT NULL,
  `cemail` varchar(20) NOT NULL,
  `mob` int(10) NOT NULL,
  `addr` varchar(30) NOT NULL,
  `website` varchar(20) NOT NULL,
  `pcity` varchar(20) NOT NULL,
  `area` varchar(20) NOT NULL,
  `pin` varchar(6) NOT NULL,
  `edudetails` varchar(50) NOT NULL,
  `exp` int(2) NOT NULL,
  `spec` varchar(60) NOT NULL,
  `pcourts` varchar(20) NOT NULL,
  `lang` varchar(50) NOT NULL,
  `bcno` int(10) NOT NULL,
  `img` varchar(30) NOT NULL,
  `likes` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adv_profile`
--

INSERT INTO `adv_profile` (`id`, `name`, `gender`, `email`, `cemail`, `mob`, `addr`, `website`, `pcity`, `area`, `pin`, `edudetails`, `exp`, `spec`, `pcourts`, `lang`, `bcno`, `img`, `likes`) VALUES
(3, 'Aayush Agarwal', 'Male', 'aayush.agarwal', 'dfghjk', 852014782, 'sdfghjk', 'xcvbnm,.', 'cvbnm', 'xcvbnm,', 'cvbnm', 'xcvbnm,', 5, 'sdfghjkl', 'xcvbnm,', 'bnm,.', 852165, 'vdycas.j[g', 0),
(6, 'Pankaj Mangla', '', 'pankajmangla10@gmail', 'pankajmangla10@gmail', 2147483647, '', '', '', 'jkbsi', '', '', 0, '', '', '', 0, '', 0),
(6, 'Pankaj Mangla', '', 'pankajmangla10@gmail', 'pankajmangla10@gmail', 2147483647, '', '', '', 'jkbsi', '', '', 0, '', '', '', 0, '', 0),
(5, 'Ashray ', 'male', 'ashrayyoboy@gmail.co', 'ashrayyoboy@gmail.co', 2147483647, '', '', '', '', '', '', 0, '', '', '', 0, '', 0);

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
(6, 6, 15),
(7, 7, 15);

-- --------------------------------------------------------

--
-- Table structure for table `biding`
--

CREATE TABLE `biding` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL,
  `category` varchar(70) NOT NULL,
  `budget` varchar(20) NOT NULL,
  `location` varchar(80) NOT NULL,
  `posted_on` datetime NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `biding`
--

INSERT INTO `biding` (`id`, `user_id`, `title`, `description`, `category`, `budget`, `location`, `posted_on`, `status`) VALUES
(17, 21, 'PS 1', 'I have Doubt?', 'Banking', '1000-1500', 'Chennai', '2019-03-26 12:38:30', 1),
(20, 21, 'dsdds', 'dsfdsfsdffs', 'Information Technology', 'sdfsdfdsf', 'dsfsdfdsf', '2019-03-26 14:19:20', 0),
(21, 21, 'dssdfsdf', 'asdadasdadasd', 'Civil', '1000-1500', 'dssdsad', '2019-03-26 14:22:13', 0);

-- --------------------------------------------------------

--
-- Table structure for table `bid_made`
--

CREATE TABLE `bid_made` (
  `id` int(10) NOT NULL,
  `bid_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `price` int(50) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bid_made`
--

INSERT INTO `bid_made` (`id`, `bid_id`, `user_id`, `price`, `status`) VALUES
(4, 17, 20, 1200, 1),
(5, 20, 20, 2000, 1),
(6, 21, 20, 2300, 0);

-- --------------------------------------------------------

--
-- Table structure for table `binding_ref_file`
--

CREATE TABLE `binding_ref_file` (
  `id` int(10) NOT NULL,
  `bid_id` int(10) NOT NULL,
  `file_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `binding_ref_file`
--

INSERT INTO `binding_ref_file` (`id`, `bid_id`, `file_name`) VALUES
(15, 17, 'imageHex.txt'),
(16, 17, 'requirements.txt'),
(17, 20, 'hostel3rd.pdf'),
(18, 21, 'gurumahraj.jpg'),
(19, 21, 'hostel3rd.pdf'),
(20, 21, 'requirements.txt');

-- --------------------------------------------------------

--
-- Table structure for table `chat_message`
--

CREATE TABLE `chat_message` (
  `id` int(10) NOT NULL,
  `to_user_id` int(10) NOT NULL,
  `from_user_id` int(10) NOT NULL,
  `chat_message` varchar(300) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(2, 15, 'Hello', 'Business', 'Hi i am Shashwat Sanket', 'Chennai', 34),
(4, 15, 'Hello111', 'Constitution', 'Shashwat Sanket', 'Patna', 5),
(5, 15, 'himan chiman ', 'Civil', 'lfjldsjklsdafjkasjfkdsfkladmklfmdsakfmdsklafmklsdamfklsdfmasdfsdafsdfdsfsdfsadfdsfsdafdsafsdafdsfdsafdsfdsfdsfadsfdsafdsfdsfdsfdsfsdfasfdsfdsfsa', 'Luckhnow', 5),
(7, 15, 'Hello1112w1', 'Civil', 'ldfldsjfklmskdlsdkcsklmsklmslkdmklmsdlkdsasa', 'vellore', 4),
(8, 15, 'himan chiman11', 'Accident', 'sdsdsdsdsdsdsdsdsdssdsd      	', 'eewew', 2),
(9, 15, 'fsdfds', 'Banking', '	\r\n                        	sdfsfdfdsfdsfsdfs', 'sfsfdfdsf', 0),
(10, 15, 'sddsd', 'Accident', '	dsdsdsdsdsdsdsd\r\n                        	', 'ddsds', 0),
(11, 15, 'hahs', 'ANY', 'dsfsdsdsdsdsdsd	\r\n                        	', 'dsdsfsdsd', 0);

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
(6, 7, 15, 'dasdsddsdasddasdasd', 3),
(7, 11, 15, 'xxdsdsdsdsdsdsd', 1);

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
(10, 2, 15),
(11, 4, 15),
(12, 5, 15),
(13, 7, 15);

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
(15, 'Shashwat Sanket', 'admin', '$2y$10$thisisshashwatsanket1u4bQ9/MjkEfb8WXCKXR8xTpXELL5DYNu', 'shashwatsanket997@gmail.com', '9162812185', 'Admin'),
(20, 'Dummy Advo', 'advo', '$2y$10$thisisshashwatsanket1usFSYERRORmZBy/VHVaVFpYJm5K5Y5Ai', 'sdfdfdf@gmail.com', '9874563281', 'Advocate'),
(21, 'Dummy Client', 'client', '$2y$10$thisisshashwatsanket1usFSYERRORmZBy/VHVaVFpYJm5K5Y5Ai', 'sdsd@gmail.com', '9875624456', 'Client');

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
-- Indexes for table `biding`
--
ALTER TABLE `biding`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user` (`user_id`);

--
-- Indexes for table `bid_made`
--
ALTER TABLE `bid_made`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bid key` (`bid_id`),
  ADD KEY `user key` (`user_id`);

--
-- Indexes for table `binding_ref_file`
--
ALTER TABLE `binding_ref_file`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bid_key` (`bid_id`);

--
-- Indexes for table `chat_message`
--
ALTER TABLE `chat_message`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_ky` (`to_user_id`),
  ADD KEY `ree` (`from_user_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `biding`
--
ALTER TABLE `biding`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `bid_made`
--
ALTER TABLE `bid_made`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `binding_ref_file`
--
ALTER TABLE `binding_ref_file`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `chat_message`
--
ALTER TABLE `chat_message`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ola`
--
ALTER TABLE `ola`
  MODIFY `q_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `ola_answer`
--
ALTER TABLE `ola_answer`
  MODIFY `a_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `ques_like_details`
--
ALTER TABLE `ques_like_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

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
-- Constraints for table `biding`
--
ALTER TABLE `biding`
  ADD CONSTRAINT `user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `bid_made`
--
ALTER TABLE `bid_made`
  ADD CONSTRAINT `bid key` FOREIGN KEY (`bid_id`) REFERENCES `biding` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user key` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `binding_ref_file`
--
ALTER TABLE `binding_ref_file`
  ADD CONSTRAINT `bid_key` FOREIGN KEY (`bid_id`) REFERENCES `biding` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `chat_message`
--
ALTER TABLE `chat_message`
  ADD CONSTRAINT `ree` FOREIGN KEY (`from_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_ky` FOREIGN KEY (`to_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
