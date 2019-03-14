-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 13, 2019 at 06:15 PM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

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
  `img` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(0, 0, 4);

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
(8, 15, 'himan chiman11', 'Accident', 'sdsdsdsdsdsdsdsdsdssdsd      	', 'eewew', 3),
(0, 4, 'Swergyt', 'ANY', 'bvgvgvnvnvnvnbvnb nbnbnvbvbnvnbvbnv', 'Kolkata', 1),
(0, 4, 'Swergyt', 'ANY', 'bvgvgvnvnvnvnbvnb nbnbnvbvbnvnbvbnv', 'Kolkata', 0),
(0, 4, 'Project Ek Maut', 'Environmental', 'Itna project kyu dete hai bhai	\r\n                        	', 'Worldwide Problem', 0);

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
(0, 2, 4, 'bhbhmbmnvmmggvjm', 1);

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
(9, 8, 15),
(0, 2, 4),
(0, 4, 4),
(0, 5, 4),
(0, 7, 4),
(0, 8, 4),
(0, 0, 4);

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
(1, 'Shashwat Sanket', 'root', 'Shashwat_997', 'shashwatsanket997@gmail.com', '9162812185', 'admin'),
(2, 'Jayraj Thakor', 'admin', 'asdf@1007', 'jayrajthakor998@gmail.com', '9080787890', 'admin'),
(3, 'Aayush Agarwal', 'aayush1936', 'aayush', 'aayush.agarwal1936@gmail.com', '8100258835', 'Client'),
(4, 'Ankush Agarwal', 'aaa999', '$2y$10$thisisshashwatsanket1ucz50kYhtd0lQ4sGlLGrvVVtAWfCTb1e', 'hackerboy2908@gmail.com', '9143163826', 'Advocate'),
(5, 'Ashray Saluja', 'ash99', '$2y$10$thisisshashwatsanket1u9baQKpOh7RpWsxO.3cm3krrDECdSIR2', 'ashrayyoboy@gmail.com', '7854123658', 'Advocate');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adv_profile`
--
ALTER TABLE `adv_profile`
  ADD KEY `foreign key` (`id`);

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
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `adv_profile`
--
ALTER TABLE `adv_profile`
  ADD CONSTRAINT `foreign key` FOREIGN KEY (`id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
