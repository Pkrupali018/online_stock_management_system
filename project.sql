-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 07, 2021 at 03:57 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `kishu`
--

CREATE TABLE `kishu` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(70) NOT NULL,
  `product_catagory` varchar(70) NOT NULL,
  `price` int(11) NOT NULL,
  `available_product` int(11) NOT NULL,
  `required_product` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kishu`
--

INSERT INTO `kishu` (`product_id`, `product_name`, `product_catagory`, `price`, `available_product`, `required_product`) VALUES
(1, 'Book', 'Classmate', 60, 10, 20);

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `ratings` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`ratings`) VALUES
(5);

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `cpassword` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`id`, `username`, `email`, `password`, `cpassword`, `token`) VALUES
(0, 'a', 'a@gmail.com', '$2y$10$3sTDX8nrYmtvlR6Rv9X15OcRGFMaBzr2xq6QPboXRioCmKjHtruWe', '$2y$10$O1qCq44fJnlz8rIFF3HcGO/fZUqfJ5jaeoUBZYcsGY2T7xmfD9VTi', '0a4eace15d6d94b4f5ced5f7fa5192'),
(0, 'Kishu', 'krupalii018@gmail.com', '$2y$10$yMN/QqjqHr5uZJLEK5u4derZF8gaN.j/3jvX1conYzJ7BGWM5vEiO', '$2y$10$IQZid91OrKocrAgBh88ygu6FCLHsbNoX5pXnCTfKuLYJxKAUQ20CK', 'b7e02aa2ef32c78fda48c587320afc');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kishu`
--
ALTER TABLE `kishu`
  ADD PRIMARY KEY (`product_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
