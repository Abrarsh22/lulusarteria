-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2022 at 06:15 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `users`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `subject` varchar(1000) NOT NULL,
  `message` varchar(1000) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `subject`, `message`, `date`) VALUES
(6, 'hgchch', 'gxgd@htfhf.gufy', 'trdyetr', 'ghdhfjghjbj', '2022-06-08 09:01:20'),
(7, 'hgchch', 'gx@jggf', 'trdyetr', 'ghdhfjghjbj', '2022-06-08 09:02:17');

-- --------------------------------------------------------

--
-- Table structure for table `otheruserrequests`
--

CREATE TABLE `otheruserrequests` (
  `id` int(11) NOT NULL,
  `hname` varchar(100) NOT NULL,
  `hphone` bigint(100) NOT NULL,
  `social` varchar(100) NOT NULL,
  `address` varchar(300) NOT NULL,
  `message` varchar(500) NOT NULL,
  `query` varchar(500) NOT NULL,
  `yname` varchar(100) NOT NULL,
  `yphone` bigint(100) NOT NULL,
  `images` varchar(256) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `pid` int(11) NOT NULL,
  `pname` varchar(50) NOT NULL,
  `pprice` int(11) NOT NULL,
  `pimage` varchar(256) NOT NULL,
  `payment_status` varchar(100) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `otheruserrequests`
--

INSERT INTO `otheruserrequests` (`id`, `hname`, `hphone`, `social`, `address`, `message`, `query`, `yname`, `yphone`, `images`, `date`, `pid`, `pname`, `pprice`, `pimage`, `payment_status`) VALUES
(1, 'afrin', 9865059849, 'lulusarteria', 'Tamilnadu', 'i love you', '', 'Abrar', 8779147253, 'sc7.jpeg,sc8.jpeg,sc9.jpeg,subbg.jpg,subscribe-bg.jpg', '2022-06-06 10:11:53', 0, '', 0, '', 'Pending'),
(3, 'adadf', 1234567890, 'kjnjkn', 'jnkjnknknk', 'kknkn', '', 'nhkjnkn', 1234567890, 'services-bg.jpg,subbg.jpg,subscribe-bg.jpg', '2022-06-06 13:54:45', 110, 'second scrapbook', 0, 'admin/uploads/WhatsApp Image 2022-05-31 at 11.03.42 PM.jpeg', 'Pending'),
(4, 'Afrin ', 9865059849, 'afrinlulu1202', 'Tanjavur', 'I Hate you', '', 'Abrar', 8779147253, 'serv2.jpg,serv3.jpg', '2022-06-07 15:51:23', 112, 'first giftbox', 0, 'admin/uploads/serv4.jpg', 'Pending'),
(5, 'htftyfytfy', 6546646464, 'trdtdrrdt@tfhm.jhg', 'ghfdghhgvgj hjgvhghc', 'hgjgjhgjbhkbhjkj', 'g', 'uyfyufuf', 6464476757, 'ser1.png,ser2.jpg', '2022-06-07 15:57:25', 113, 'first customized product', 650, 'admin/uploads/cust.jpeg', 'Pending'),
(6, 'Afrin', 9865059849, 'abrarshaikhs1234@gmail.com', 'Tanjavur', 'I Hate You', '', 'Abrar', 8779147253, 'team-2.jpg,team-3.jpg', '2022-06-07 16:02:27', 108, '1st Keychain', 380, 'admin/uploads/serv1.jpg', 'success'),
(7, 'htfhtfh', 8768687678, 'kkghhjhgj@gfdg.hjg', 'jgjhgjgjgjgjgj', 'gdffhhghgh', '', 'abu', 9879789797, 'team-1.jpg,team-2.jpg,team-3.jpg,team-4.jpg', '2022-06-07 20:09:32', 114, 'second keychain', 260, 'admin/uploads/WhatsApp Image 2022-05-31 at 11.36.54 PM.jpeg', 'success'),
(8, 'Mehabooba', 9930569009, 'tasleemhs94@gmail.com', 'Mumbai', 'Happiest Birthday', '', 'Tasleem', 9029385549, 'WhatsApp Image 2022-05-31 at 11.03.38 PM.jpeg,WhatsApp Image 2022-05-31 at 11.35.59 PM.jpeg,WhatsApp Image 2022-05-31 at 11.36.46 PM.jpeg', '2022-06-08 08:34:49', 115, 'Second Photoframe', 850, 'admin/uploads/WhatsApp Image 2022-05-31 at 11.03.31 PM.jpeg', 'Pending'),
(9, 'Afrin', 9865059849, 'abrarshaikhs1234@gmail.com', 'Tirchi', 'nothing tosay', '', 'Abrar', 8779147253, 'team-1.jpg,team-2.jpg', '2022-06-09 08:53:49', 108, '1st Keychain', 380, 'admin/uploads/serv1.jpg', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_img` varchar(255) NOT NULL,
  `product_video` varchar(1000) NOT NULL,
  `product_images` varchar(255) NOT NULL,
  `product_desc` varchar(255) NOT NULL,
  `product_type` varchar(100) NOT NULL DEFAULT 'normal'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `product_price`, `product_img`, `product_video`, `product_images`, `product_desc`, `product_type`) VALUES
(107, 'ScrapBook-1', 850, 'uploads/sc5.jpeg', 'video.mp4', 'sc6.jpeg,sc7.jpeg,sc8.jpeg,sc9.jpeg', 'This is my first Scrap Books', 'scrap books'),
(108, '1st Keychain', 380, 'uploads/serv1.jpg', 'video.mp4', 'WhatsApp Image 2022-05-31 at 11.36.05 PM.jpeg,WhatsApp Image 2022-05-31 at 11.36.37 PM.jpeg,WhatsApp Image 2022-05-31 at 11.36.51 PM.jpeg,WhatsApp Image 2022-05-31 at 11.36.54 PM.jpeg', 'This is first keychain', 'keychains'),
(110, 'second scrapbook', 650, 'uploads/WhatsApp Image 2022-05-31 at 11.03.42 PM.jpeg', 'video.mp4', 'sc1.jpeg,sc2.jpeg,sc3.jpeg,sc4.jpeg', 'this is my second scrapbook', 'scrap books'),
(111, 'first photo frame', 250, 'uploads/serv3.jpg', 'video.mp4', 'WhatsApp Image 2022-05-31 at 11.03.31 PM.jpeg,WhatsApp Image 2022-05-31 at 11.03.34 PM.jpeg,WhatsApp Image 2022-05-31 at 11.03.38 PM.jpeg,WhatsApp Image 2022-05-31 at 11.35.59 PM.jpeg', 'This is the first photo frame', 'photo frames'),
(112, 'first giftbox', 450, 'uploads/serv4.jpg', 'video.mp4', 'sc1.jpeg,sc2.jpeg,sc3.jpeg,servi4.jpg', 'This is my first gift box', 'giftbox'),
(113, 'first customized product', 650, 'uploads/cust.jpeg', 'video.mp4', 'servi4.jpg,services-bg.jpg,subbg.jpg', 'This is my first customized product', 'custom'),
(114, 'second keychain', 260, 'uploads/WhatsApp Image 2022-05-31 at 11.36.54 PM.jpeg', 'video.mp4', 'WhatsApp Image 2022-05-31 at 11.36.05 PM.jpeg,WhatsApp Image 2022-05-31 at 11.36.34 PM.jpeg,WhatsApp Image 2022-05-31 at 11.36.37 PM.jpeg,WhatsApp Image 2022-05-31 at 11.36.51 PM.jpeg,WhatsApp Image 2022-05-31 at 11.36.54 PM.jpeg', 'This is the second keychain', 'keychains'),
(115, 'Second Photoframe', 850, 'uploads/WhatsApp Image 2022-05-31 at 11.03.31 PM.jpeg', 'video.mp4', 'WhatsApp Image 2022-05-31 at 11.03.34 PM.jpeg,WhatsApp Image 2022-05-31 at 11.03.38 PM.jpeg', 'This is the second photo frame', 'photo frames'),
(116, '3rd Keychain', 550, 'uploads/WhatsApp Image 2022-05-31 at 11.36.05 PM.jpeg', 'video.mp4', 'client-1.jpg,client-2.jpg', 'Third Keychain', 'keychains'),
(117, '4th Keychain', 980, 'uploads/WhatsApp Image 2022-05-31 at 11.36.37 PM.jpeg', 'video.mp4', 'serv2.jpg,serv3.jpg', 'Fourth Keychain', 'keychains');

-- --------------------------------------------------------

--
-- Table structure for table `userrequests`
--

CREATE TABLE `userrequests` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` bigint(100) NOT NULL,
  `socialid` varchar(100) NOT NULL,
  `address` varchar(300) NOT NULL,
  `query` varchar(1000) NOT NULL,
  `images` varchar(256) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `pid` int(11) NOT NULL,
  `pname` varchar(50) NOT NULL,
  `pprice` int(11) NOT NULL,
  `pimage` varchar(256) NOT NULL,
  `payment_status` varchar(100) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userrequests`
--

INSERT INTO `userrequests` (`id`, `name`, `phone`, `socialid`, `address`, `query`, `images`, `date`, `pid`, `pname`, `pprice`, `pimage`, `payment_status`) VALUES
(130, 'Abrar', 8779147253, 'abrarshaikhs1234@gmail.com', 'Dharavi', '', 'WhatsApp Image 2022-05-31 at 11.36.37 PM.jpeg,WhatsApp Image 2022-05-31 at 11.36.39 PM.jpeg,WhatsApp Image 2022-05-31 at 11.36.46 PM.jpeg', '2022-06-07 10:59:21', 111, 'first photo frame', 250, 'admin/uploads/serv3.jpg', 'succe'),
(131, 'Afrin', 9865059849, 'afrinlulu1202', 'Tanjavur', '', 'sc6.jpeg,sc7.jpeg,sc8.jpeg,sc9.jpeg', '2022-06-07 15:01:58', 111, 'first photo frame', 250, 'admin/uploads/serv3.jpg', 'succe'),
(132, 'Abrar', 9930569009, 'abrarshaikhs1234@gmail.com', 'Matinga -400019', '', 'WhatsApp Image 2022-05-31 at 11.36.05 PM.jpeg,WhatsApp Image 2022-05-31 at 11.36.34 PM.jpeg,WhatsApp Image 2022-05-31 at 11.36.37 PM.jpeg', '2022-06-08 08:33:10', 115, 'Second Photoframe', 850, 'admin/uploads/WhatsApp Image 2022-05-31 at 11.03.31 PM.jpeg', 'Pending'),
(133, 'afrin', 9865059849, 'lulu1202@gmail.com', 'Maneparai', '', 'team-3.jpg,team-4.jpg', '2022-06-09 08:51:46', 108, '1st Keychain', 380, 'admin/uploads/serv1.jpg', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `userss`
--

CREATE TABLE `userss` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userss`
--

INSERT INTO `userss` (`id`, `name`, `email`, `pass`) VALUES
(32, 'lulu', 'lul@gmail.com', 'lulu'),
(48, 'abrar', 'abrar@gmail.com', 'abrar'),
(50, 'abrar', 'abrar@gmail.com', 'Abrar'),
(51, 'abrar', 'abrar@gmail.com', '123456');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `otheruserrequests`
--
ALTER TABLE `otheruserrequests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userrequests`
--
ALTER TABLE `userrequests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userss`
--
ALTER TABLE `userss`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `otheruserrequests`
--
ALTER TABLE `otheruserrequests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT for table `userrequests`
--
ALTER TABLE `userrequests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- AUTO_INCREMENT for table `userss`
--
ALTER TABLE `userss`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
