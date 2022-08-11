-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 11, 2022 at 06:09 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `food_ordering_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_email`, `password`) VALUES
(2, 'admin', 'admin@admin.com', '$2y$10$QW2O2ySOPewnkzCK4MXzWedZ6SGMMEY2I8SC7Uql0IZlc.gLTiQy6');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `food_id` int(11) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `food_name` varchar(255) NOT NULL,
  `food_price` int(11) NOT NULL,
  `food_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `food_id`, `user_email`, `food_name`, `food_price`, `food_img`) VALUES
(15, 25, 'tejas@test.com', 'Marathi Katta', 300, 'marathiKatta.jpg'),
(16, 31, 'tejas@test.com', 'Idly', 60, 'idly.jpg'),
(17, 27, 'tejas@test.com', 'Samosa', 15, 'samosa.jpg'),
(18, 22, 'tejas@test.com', 'Noodles', 120, 'specialnoodles.jpg'),
(19, 28, 'user@demo.com', 'Garlic Soup', 80, 'garlicSoup.jpg'),
(20, 22, 'user@demo.com', 'Noodles', 120, 'specialnoodles.jpg'),
(21, 27, 'user@demo.com', 'Samosa', 15, 'samosa.jpg'),
(22, 31, '', 'Idly', 60, 'idly.jpg'),
(23, 28, 'user@xyz.com', 'Garlic Soup', 80, 'garlicSoup.jpg'),
(24, 25, 'user@xyz.com', 'Marathi Katta', 300, 'marathiKatta.jpg'),
(25, 27, 'user@xyz.com', 'Samosa', 15, 'samosa.jpg'),
(26, 27, '', 'Samosa', 15, 'samosa.jpg'),
(27, 28, '', 'Garlic Soup', 80, 'garlicSoup.jpg'),
(28, 27, 'user@a.com', 'Samosa', 15, 'samosa.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `delivery_boy`
--

CREATE TABLE `delivery_boy` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  `doj` datetime NOT NULL,
  `ratings` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `delivery_boy`
--

INSERT INTO `delivery_boy` (`id`, `name`, `phone`, `email`, `doj`, `ratings`) VALUES
(2, 'ranjit', '9632145871', 'rohit@delivery.com', '2021-05-30 19:25:52', NULL),
(3, 'ramesh', '9874563210', 'ramesh@delivery.com', '2021-05-30 19:26:24', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `food_id` int(11) NOT NULL,
  `food_name` varchar(30) NOT NULL,
  `food_desc` text NOT NULL,
  `category` varchar(255) NOT NULL,
  `food_type` varchar(256) NOT NULL,
  `food_price` int(11) NOT NULL,
  `food_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`food_id`, `food_name`, `food_desc`, `category`, `food_type`, `food_price`, `food_img`) VALUES
(25, 'Marathi Katta', 'Maharashtrian food, Special marathi katta ', 'food', 'veg', 300, 'marathiKatta.jpg'),
(27, 'Samosa', 'samosa', 'fast food', 'veg', 15, 'samosa.jpg'),
(28, 'Garlic Soup', 'Special Garlic Soup', 'soup', 'veg', 80, 'garlicSoup.jpg'),
(29, 'Dominos Pizza', 'Dominos Pizza', 'italian', 'veg', 150, 'dominosPizza.jpg'),
(30, 'Pasta', 'Pasta', 'italian', 'veg', 100, 'pasta2.jpg'),
(31, 'Idly', 'idly', 'veg', 'veg', 60, 'idly.jpg'),
(66, 'asdf', 'sadf', 'asdf', '', 321, 'burger 2.jpg'),
(67, 'iuyiukj', 'ytd', 'veg', '', 13, 'balanced-diet.png');

-- --------------------------------------------------------

--
-- Table structure for table `food_category`
--

CREATE TABLE `food_category` (
  `id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  `cat_img` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `food_category`
--

INSERT INTO `food_category` (`id`, `category`, `cat_img`) VALUES
(2, 'non veg', 'nonveg.jpg'),
(3, 'veg', 'pureveg.jpg'),
(8, 'sweet', 'sweet.jpg'),
(9, 'sea food', 'seafood.jpg'),
(10, 'juice', 'juce.jpg'),
(11, 'soup', 'vegsoup.jpg'),
(13, 'italian', 'italion.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `food_id` int(11) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `food_name` varchar(30) NOT NULL,
  `food_img` varchar(255) NOT NULL,
  `qty` int(5) NOT NULL,
  `city` varchar(255) NOT NULL,
  `pin_code` int(11) NOT NULL,
  `user_address` text NOT NULL,
  `user_phone` varchar(10) DEFAULT NULL,
  `delivery_boy_name` varchar(255) DEFAULT NULL,
  `order_time` datetime NOT NULL,
  `total_bill` int(100) NOT NULL,
  `payment_type` varchar(255) NOT NULL,
  `payment_status` varchar(25) NOT NULL,
  `order_status` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `food_id`, `user_email`, `user_name`, `food_name`, `food_img`, `qty`, `city`, `pin_code`, `user_address`, `user_phone`, `delivery_boy_name`, `order_time`, `total_bill`, `payment_type`, `payment_status`, `order_status`) VALUES
(37, 27, 'user@a.com', 'user', 'Samosa', 'samosa.jpg', 4, 'sdfas', 5443, 'asdf', '666', 'ranjit', '2022-08-07 16:58:16', 60, 'cod', 'Received', 'delivered');

-- --------------------------------------------------------

--
-- Table structure for table `sale`
--

CREATE TABLE `sale` (
  `sale_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `food_id` int(11) NOT NULL,
  `food_name` varchar(255) NOT NULL,
  `food_img` varchar(255) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `total_bill` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sale`
--

INSERT INTO `sale` (`sale_id`, `order_id`, `food_id`, `food_name`, `food_img`, `qty`, `price`, `total_bill`) VALUES
(2, 37, 27, 'Samosa', 'samosa.jpg', 4, 15, 60);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(256) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `doj` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `address`, `password`, `doj`) VALUES
(19, 'user', 'user@demo.com', NULL, '$2y$10$MlOa7SROn6xdRxeKYEbT4e9FtOXADBPYw1biZuhCCAi1cntTfd.B.', '2022-06-06 15:22:40'),
(20, 'user', 'tejas@test.com', NULL, '$2y$10$/qukLRIAlMO2h44A6NLhB.A9geogKWboGcaZKe0sfO9QHyeAWlW7e', '2022-06-25 19:24:54'),
(32, 'asdf', 'asdf', 'asd', 'asdf', '2022-07-14 22:33:02'),
(33, 'asdf', 'asdf@a.com', NULL, '$2y$10$ZDVbK1Xn.76F0mepkohyRuBaY0sBq6VGEHMm/t1RNyOb36HofeMJ2', '2022-07-22 17:28:10'),
(34, 'user', 'user@a.com', NULL, '$2y$10$/BoY7FCRULPKTmnnNPUH5.ZqJruBSND5ILszait/6.0h7hI1jdw8K', '2022-08-02 12:19:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `admin_email` (`admin_email`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delivery_boy`
--
ALTER TABLE `delivery_boy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`food_id`);

--
-- Indexes for table `food_category`
--
ALTER TABLE `food_category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `category` (`category`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sale`
--
ALTER TABLE `sale`
  ADD PRIMARY KEY (`sale_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `delivery_boy`
--
ALTER TABLE `delivery_boy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `food_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `food_category`
--
ALTER TABLE `food_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `sale`
--
ALTER TABLE `sale`
  MODIFY `sale_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
