-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 13, 2019 at 10:57 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `email` varchar(60) NOT NULL,
  `mobile_no` int(10) NOT NULL,
  `type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `email`, `mobile_no`, `type`) VALUES
(1, 'Jayraj Thakor', 'jayraj_25', 'dsdfsdf', 'asdf@gmail.com', 0, 'Advocate'),
(2, 'Jayraj Thakor', 'jayraj_25', 'asdfhjkl', 'asdf@gmail.com', 2147483647, 'Advocate'),
(3, 'Shashwat Sanket', 'Shashwat_997', 'qwertyuiop', 'shashwatsanket997@gmail.com', 2147483647, 'Advocate'),
(4, 'Himanshu Tiwari', 'Himan', '', 'himan@gmail.com', 2147483647, 'Client'),
(5, 'Himanshu Tiwari', 'Himan', '$2y$10$thisisshashwatsanket1unPOileLfXVmQxEy7MVJh7JrfhhLeneS', 'himan@gmail.com', 2147483647, 'Client'),
(6, 'Aayush Agarwal', 'aayush_99', '$2y$10$thisisshashwatsanket1uZLUz47puN9K2xviB0aPtZrkMr3pDXia', 'asdf@gmail.com', 2147483647, 'Client');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
