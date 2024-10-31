-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 22, 2024 at 04:46 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alumni_tracking_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `generic_information`
--

CREATE TABLE `generic_information` (
  `id` int(11) NOT NULL,
  `fullname` varchar(30) NOT NULL,
  `age` int(11) NOT NULL,
  `date_of_birth` date NOT NULL,
  `place_of_birth` varchar(255) NOT NULL,
  `mobile` int(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `permanent_address` varchar(100) NOT NULL,
  `provincial_add` varchar(255) NOT NULL,
  `nos` varchar(255) NOT NULL,
  `elem` varchar(255) NOT NULL,
  `yrelem` int(255) NOT NULL,
  `hs` varchar(255) NOT NULL,
  `yrhs` int(255) NOT NULL,
  `college` varchar(255) NOT NULL,
  `courses` varchar(255) NOT NULL,
  `yrc` int(255) NOT NULL,
  `pg` varchar(255) NOT NULL,
  `coursess` varchar(255) NOT NULL,
  `yrcc` int(255) NOT NULL,
  `others` varchar(255) NOT NULL,
  `coursez` varchar(255) NOT NULL,
  `yrg` int(255) NOT NULL,
  `ah` varchar(255) NOT NULL,
  `ad` varchar(255) NOT NULL,
  `cs` varchar(255) NOT NULL,
  `oc` varchar(255) NOT NULL,
  `em` varchar(255) NOT NULL,
  `ba` text NOT NULL,
  `tl` int(255) NOT NULL,
  `los` varchar(255) NOT NULL,
  `cp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `generic_information`
--

INSERT INTO `generic_information` (`id`, `fullname`, `age`, `date_of_birth`, `place_of_birth`, `mobile`, `email`, `gender`, `permanent_address`, `provincial_add`, `nos`, `elem`, `yrelem`, `hs`, `yrhs`, `college`, `courses`, `yrc`, `pg`, `coursess`, `yrcc`, `others`, `coursez`, `yrg`, `ah`, `ad`, `cs`, `oc`, `em`, `ba`, `tl`, `los`, `cp`) VALUES
(6, 'john', 32, '2222-02-22', 'oriental mindoro', 3123212, 'alex@gmail.com', 'FEMALE', 'erewrerf', 'dffdsfds', 'xcxcx', 'queensrow ', 343214, 'eastern bacoor', 41224, 'cvsu bacoor', 'bscs', 2412, 'ewan', 'bsvs', 412422, 'n/a', 'n/a', 41421, 'lekwlewew', 'rewree', 'fsff', 'coding', 'student', 'fszfs', 41441, 'n/a', 'sskjandkn'),
(7, 'jennie', 67, '2002-02-10', 'cavite', 9898988, 'jennie@gmail.com', 'FEMALE', 'magdiwang subd molino3', 'mindoro', 'secret', 'queensrow ', 43244, 'eastern bacoor', 42342343, 'cvsu bacoor', 'bscs', 432233, 'fsdfsfs', 'ffe', 24344, 'n/a', 'n/a', 423433, 'lekwlewew', 'dfds', 'fsf', 'coding', 'student', 'fdsf', 4324, 'n/a', 'dsfse');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `lastname` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `birthday` date NOT NULL,
  `sex` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `contactnum` int(255) NOT NULL,
  `fulladd` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `lrn` int(255) NOT NULL,
  `batch` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `birthday` varchar(255) NOT NULL,
  `sex` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `contactnum` int(255) NOT NULL,
  `fulladd` varchar(255) NOT NULL,
  `lrn` int(255) NOT NULL,
  `batch` int(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `birthday`, `sex`, `status`, `contactnum`, `fulladd`, `lrn`, `batch`, `email`, `password`) VALUES
(6, 'josh', '2007-02-10', 'male', 'single', 2147483647, 'molino 3', 2147483647, 2022, 'johnwill@gmail.com', '$2y$10$aEczt39Ic9KQwYXI4e179udbbDPIaqhH53jR8SlS88jkGISQfGH0i'),
(7, 'kriz', '2003-08-22', 'female', 'single', 2147483647, 'molino 2', 392093828, 2022, 'kriz@gmail.com', '$2y$10$fzsVsCsnClR1yviZyiOOAeCvh2dzBOH09klmPFOH.X6aE5.xOokZa'),
(9, 'mama', '3333-04-03', 'male', 'single', 433, 'molino 3', 423342, 4343223, 'mama@gmail.com', '$2y$10$XKNvCHYYleS5R/4owe7vZuuk4iP4mUVHN18T90DhRr2oS9lcRHsie');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `generic_information`
--
ALTER TABLE `generic_information`
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
-- AUTO_INCREMENT for table `generic_information`
--
ALTER TABLE `generic_information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
