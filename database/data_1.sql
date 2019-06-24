-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2019 at 08:46 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `data_1`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `status` int(255) NOT NULL,
  `user_type` int(255) NOT NULL,
  `bio` varchar(255) NOT NULL,
  `bg` varchar(255) NOT NULL,
  `profile_img` varchar(255) NOT NULL,
  `gender` int(255) NOT NULL,
  `phone` int(255) NOT NULL,
  `studied` varchar(255) NOT NULL,
  `lives` varchar(255) NOT NULL,
  `age` int(255) NOT NULL,
  `weight` int(255) NOT NULL,
  `height` int(255) NOT NULL,
  `bmi` varchar(255) NOT NULL,
  `bmitext` varchar(255) NOT NULL,
  `heart_pts` int(255) NOT NULL,
  `moves_per_minutes` int(255) NOT NULL,
  `steps` int(255) NOT NULL,
  `cals_burnt` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `firstname`, `lastname`, `password`, `email`, `status`, `user_type`, `bio`, `bg`, `profile_img`, `gender`, `phone`, `studied`, `lives`, `age`, `weight`, `height`, `bmi`, `bmitext`, `heart_pts`, `moves_per_minutes`, `steps`, `cals_burnt`) VALUES
(1, 'dzul', 'fikri', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'a@gmail.com', 0, 0, 'none', 'default', 'default', 0, 123, 'none', 'none', 0, 0, 0, '', '', 0, 0, 0, 0),
(16, 'asd', 'asd', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'asd@gmail.com', 0, 1, 'none', 'default', 'default', 0, 123, 'none', 'none', 25, 70, 170, '24.221453287197235', 'Normal Weight', 0, 80, 2622, 1149),
(17, 'dsa', 'dsa', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'dsa@gmail.com', 0, 1, 'none', 'default', 'default', 0, 123, 'none', 'none', 0, 0, 0, 'None', 'None', 0, 68, 1773, 1474);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
