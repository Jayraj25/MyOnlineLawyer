-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 15, 2019 at 11:34 PM
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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
