-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 21, 2018 at 04:17 PM
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
-- Database: `e-commerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `customer_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `firstname` varchar(20) DEFAULT NULL,
  `lastname` varchar(20) DEFAULT NULL,
  `dob` date NOT NULL,
  `phone` char(10) NOT NULL,
  `address` varchar(30) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `gender` char(7) DEFAULT NULL,
  `password` varchar(150) DEFAULT '5f4dcc3b5aa765d61d8327deb882cf99'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `firstname`, `lastname`, `dob`, `phone`, `address`, `email`, `gender`, `password`) VALUES
(42, 'jinesh', 'marfatia', '1998-04-21', '9987456466', 'mumbai', 'jinesh@gmail.com', 'Male', '5f4dcc3b5aa765d61d8327deb882cf99'),
(43, 'sanya', 'khare', '0000-00-00', '8887456466', 'mumbai', 'sanya@gmail.com', 'Female', '5f4dcc3b5aa765d61d8327deb882cf99'),
(44, 'arham', 'mehta', '0000-00-00', '9987456466', 'mumbai', 'arham@gmail.com', 'Male', '5f4dcc3b5aa765d61d8327deb882cf99'),
(46, 'aakruti', 'kharwal', '0000-00-00', '9987456466', 'mumbai', 'aakruti.kharwal9@gmail.com', 'Female', '5f4dcc3b5aa765d61d8327deb882cf99'),
(47, 'deepa', 'kharwal', '0000-00-00', '9987456466', 'mumbai', 'deepa.kharwal@gmail.com', 'Female', '5f4dcc3b5aa765d61d8327deb882cf99'),
(48, 'aayush', 'kharwal', '0000-00-00', '9987456466', 'mumbai', 'aayush.kharwal@gmail.com', 'Male', '5f4dcc3b5aa765d61d8327deb882cf99'),
(49, 'Devansh', 'Dalal', '0000-00-00', '9987456466', 'mumbai', 'devansh@gmail.com', 'Male', '5f4dcc3b5aa765d61d8327deb882cf99'),
(50, 'Juhi', 'Krjriwal', '0000-00-00', '9987456466', 'mumbai', 'juhi@gmail.com', 'Female', '5f4dcc3b5aa765d61d8327deb882cf99'),
(51, 'mustafa', 'b', '0000-00-00', '9987456466', 'mumbai', 'mussa@gmail.com', 'Male', '5f4dcc3b5aa765d61d8327deb882cf99'),
(52, 'kabir', 'KAPOOR', '0000-00-00', '9987456466', 'mumbai', 'kabir@gmail.com', 'Male', '5f4dcc3b5aa765d61d8327deb882cf99'),
(53, 'aditya', 'jeswani', '0000-00-00', '9987456466', 'mumbai', 'j@gmail.com', 'Male', '5f4dcc3b5aa765d61d8327deb882cf99'),
(60, 'aa', 'xv', '0000-00-00', '9987456466', 'mumbai', 'aaxv@gmail.com', 'Male', '5f4dcc3b5aa765d61d8327deb882cf99'),
(61, 'hey', 'you', '1998-01-01', '9987456466', 'mumbai', 'hey@gmail.com', 'Male', '5f4dcc3b5aa765d61d8327deb882cf99');

-- --------------------------------------------------------

--
-- Stand-in structure for view `item`
-- (See below for the actual view)
--
CREATE TABLE `item` (
`id` int(30)
,`price` int(30)
,`name` varchar(30)
,`category` varchar(30)
,`customer_id` int(11)
);

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(30) NOT NULL,
  `price` int(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `category` varchar(30) NOT NULL,
  `customer_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `price`, `name`, `category`, `customer_id`) VALUES
(1, 1000, 'asus ', 'laptop', 43),
(2, 6000, 'accord', 'laptop', 42),
(3, 1300, 'accord', 'laptop', 42),
(4, 1000, 'zara', 'shirt', 42),
(5, 1000, 'asus', 'sleeve', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders_card`
--

CREATE TABLE `orders_card` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'Pending',
  `price` int(11) NOT NULL,
  `card_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders_card`
--

INSERT INTO `orders_card` (`id`, `customer_id`, `status`, `price`, `card_no`) VALUES
(4, 43, 'Pending', 1000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `orders_cash`
--

CREATE TABLE `orders_cash` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'Pending',
  `price` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders_cash`
--

INSERT INTO `orders_cash` (`id`, `customer_id`, `status`, `price`) VALUES
(6, 42, 'Pending', 1300),
(7, 42, 'Pending', 6000),
(8, 42, 'Pending', 1300),
(9, 43, 'Pending', 6000),
(10, 42, 'Pending', 7300),
(11, 42, 'Pending', 7300),
(12, 42, 'Pending', 7300),
(13, 42, 'Pending', 7300),
(14, 42, 'Pending', 7300),
(15, 42, 'Pending', 1000);

-- --------------------------------------------------------

--
-- Structure for view `item`
--
DROP TABLE IF EXISTS `item`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `item`  AS  select `items`.`id` AS `id`,`items`.`price` AS `price`,`items`.`name` AS `name`,`items`.`category` AS `category`,`items`.`customer_id` AS `customer_id` from `items` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`customer_id`,`item_id`),
  ADD KEY `cart_ibfk_2` (`item_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `items_ibfk_1` (`customer_id`);

--
-- Indexes for table `orders_card`
--
ALTER TABLE `orders_card`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `orders_cash`
--
ALTER TABLE `orders_cash`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `customer_id` (`customer_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders_card`
--
ALTER TABLE `orders_card`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders_cash`
--
ALTER TABLE `orders_cash`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `customer_id` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `item_id` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE NO ACTION;

--
-- Constraints for table `orders_card`
--
ALTER TABLE `orders_card`
  ADD CONSTRAINT `orders_card_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`);

--
-- Constraints for table `orders_cash`
--
ALTER TABLE `orders_cash`
  ADD CONSTRAINT `orders_cash_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `orders_cash_ibfk_3` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `orders_cash_ibfk_4` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
