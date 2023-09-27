-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:8111
-- Generation Time: Sep 27, 2023 at 08:13 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vicky`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `status` varchar(255) NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp(),
  `dest` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `title`, `description`, `status`, `time`, `dest`) VALUES
(10, 'xcxcvxcv', ' dfvdfsd', 'fdfsd', '2023-05-17 17:15:05', 'images/close.png'),
(12, 'kya karu  ', ' guys', 'party? or what? or not', '2023-05-17 18:20:57', 'images/banners.jpg'),
(13, 'khuda', ' a powerful entity', 'supper', '2023-05-24 11:05:38', 'images/baisakhilogos.png'),
(14, 'dumb', ' a week entity', 'lazy af', '2023-05-24 11:06:11', 'images/Carpet.jpg'),
(15, 'america', ' firangi', 'starwa', '2023-05-26 18:32:23', 'images/STAR.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `tid` int(6) NOT NULL,
  `cheeje` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `tid`, `cheeje`, `description`) VALUES
(1, 1, 'kpde', 'tshirt');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp(),
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `email`, `password`, `time`, `name`) VALUES
(1, 'vicky@123', 'yes', '2023-05-15 11:51:39', 'vicky'),
(2, 'rawatji@123', 'yes', '2023-05-15 13:31:43', 'vikram ');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`id`, `name`, `email`, `phone`, `password`, `time`) VALUES
(5, 'kaml', 'vvcb@1234453454565', '0987867649988', '$2y$10$Wtrxuc8SOKVLHqIR6apNdOiY8IlBHLWLtvNpgT1jnPb7YuBp/gxW2', '2023-05-10 07:51:22'),
(8, 'laali', 'qwerty@123', '1234599', '$2y$10$G2G0KkRx8cC.lHUSYGTaPe6iDsZ3EbZd9AL6YZqUj4HI4uVNYQJYG', '2023-05-10 07:53:27'),
(27, 'hojadost', 'dosttu@123', '21213423', '$2y$10$6m4a4/5ZJEJhfJkx/Um1x.zBq.xhskiOE5w3rmrDbc.CoWDPHGqX6', '2023-05-11 13:53:19'),
(29, 'kamal', 'kamalrawat@3232', '11111', '$2y$10$FnA9YQNgChvBRU7MI.Ve6ezuiHzHXpVw2lSwuD8EL0PiRHUwqUMVO', '2023-05-15 06:37:33'),
(30, 'rawatji855', 'raweatji@12123', '232345456', '$2y$10$OxPNROEenf/Iz20eDoPTm.791Lj6xAHscAV76TTndgKYyyR.ve3Ke', '2023-05-15 06:39:03'),
(32, 'vikram', 'vickyrawatji855@gmail.com', '123457878879809', '$2y$10$9eC3mZnkeP7LPYJsUV7speutr0Lxi7N0KfisWzs.EbfHH6Tr.khyS', '2023-05-15 07:48:23'),
(33, 'raja', 'raju@121', '1221324', '$2y$10$Ees1kLC1b8qI5Vi5tYaT/ubo7oA1S/LSBdKKRcTlBMdJefSLg.DWy', '2023-05-15 08:02:13'),
(34, 'raja', 'raju@121', '12345990', '$2y$10$O2i82OgvZjsYen9G4meSxOjCace5Gi8Ahb1PT5X5wFzYR9MX5OPNm', '2023-05-15 08:04:18');

-- --------------------------------------------------------

--
-- Table structure for table `people`
--

CREATE TABLE `people` (
  `id` int(11) NOT NULL,
  `first` text NOT NULL,
  `last` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `dest` varchar(255) NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp(),
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `people`
--

INSERT INTO `people` (`id`, `first`, `last`, `email`, `dest`, `time`, `password`) VALUES
(9, 'vicky', 'dfd', 'fdfdfg@232', 'images/php.gif', '2023-05-16 17:28:13', 'vicky1'),
(11, 'hussain', 'sir', 'sir@12123', 'images/hotel-png-9.png', '2023-05-16 17:30:04', 'sirji'),
(12, 'cvcvcvbcb', 'vdfdfdf', 'fdfdfg@232', 'images/php.gif', '2023-05-16 17:31:08', 'cjvnvbjk'),
(15, 'cvcvcvbcb', 'vdfdfdf', 'fdfdfg@232', 'images/php.gif', '2023-05-16 17:34:24', 'ffggr'),
(16, 'vicky', 'erwerw', 'wewew@12', 'images/php.gif', '2023-05-16 17:34:40', 'kamaal'),
(18, 'bambab  ', 'bhole', 'bhole@123', 'images/baisakhilogo.png', '2023-05-16 19:42:45', 'lamlam');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `categoryid` int(11) NOT NULL,
  `subcategoryid` int(11) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `dest` text NOT NULL,
  `meta` text NOT NULL,
  `price` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `addon` text NOT NULL,
  `status` text NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`categoryid`, `subcategoryid`, `title`, `description`, `dest`, `meta`, `price`, `discount`, `total`, `addon`, `status`, `id`) VALUES
(10, 12, 'vechile', ' cvc', 'hotel-png-9.png', 'cvcv', 123, 12, 108, 'coke', 'Active', 2),
(10, 12, 'QEQWE', ' QWQWQ', 'heroin.jpg', 'EQWEQ', 1234, 1, 1222, 'beer,juice', 'InActive', 39),
(10, 12, 'VCVCB', ' CVDFD', 'panda.jpg', 'RWEWWS', 12354, 3, 11983, 'coke,lassi', 'InActive', 40),
(12, 13, 'GIT', ' HUBBB', 'GIT.png', 'VERSION', 1234, 1, 1222, 'paratha,coke', 'Active', 41),
(12, 13, '123', ' ERWERW', 'php.gif', 'FEDEFG', 12334, 2, 12087, 'lassi,beer', 'Active', 42),
(12, 13, 'gitwa', ' hubwa', 'php.gif', 'mhihua', 756754, 1, 741619, 'paratha,coke', 'InActive', 43),
(12, 13, 'staer', ' bucks', 'STAR.jpg', 'pesssa', 12344, 55, 5431, 'paratha,coke', 'Active', 45),
(14, 16, 'newguirl', ' filegirl', 'cool.jpg', 'notexit', 343, 3, 333, 'coke', 'Active', 46),
(13, 17, 'morning', ' cuteee', 'morning.jpg', 'catty', 999, 1, 989, 'coke', 'Active', 47),
(13, 17, 'evvi', ' erer34', 'krishna.jpg', 'rttyuyu', 5644, 35, 3669, 'paratha', 'Active', 48),
(0, 0, 'existing', ' vcvxcxc', 'eXcentSolutions_Logo_white.png', 'weeret', 54564, 2, 53473, 'paratha,coke', 'Active', 49),
(10, 14, 'efee', ' rwerwerwe', 'EVII.png', 'iuiyut', 342, 2, 335, 'lassi,beer', 'Active', 62),
(12, 13, 'cAR', ' shanddar', 'STOP.jpg', 'makhabn', 76757, 2, 75222, 'coke', 'Active', 85);

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE `subcategory` (
  `id` int(11) NOT NULL,
  `categoryid` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `dest` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`id`, `categoryid`, `title`, `description`, `dest`) VALUES
(12, 10, 'wedwedwerw', ' r3r', 'images/php.gif'),
(13, 12, 'hhf  ', ' hjyt', 'images/baisakhilogos.png'),
(14, 10, 'cxcvbnbn', ' gfgdf', 'images/close.png'),
(15, 10, 'fedfwd    ', ' ededfs', 'images/php.gif'),
(16, 14, 'week', ' skinny', 'images/clean.jpg'),
(17, 13, 'power  ', ' strength ', 'images/hotel-png-9.png'),
(18, 12, 'm nhi khelra', ' darr lgta h boss', 'images/baisakhilogo.png');

-- --------------------------------------------------------

--
-- Table structure for table `table1`
--

CREATE TABLE `table1` (
  `id` int(6) NOT NULL,
  `namee` varchar(50) DEFAULT NULL,
  `email` text DEFAULT NULL,
  `age` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `table1`
--

INSERT INTO `table1` (`id`, `namee`, `email`, `age`) VALUES
(1, 'vicky', 'vccc@1212', 4);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `time`) VALUES
('don@1231', 'kedicheej', '2023-05-12 14:12:58'),
('laali', 'kaali', '2023-05-12 15:28:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tid_fk` (`tid`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `people`
--
ALTER TABLE `people`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table1`
--
ALTER TABLE `table1`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `people`
--
ALTER TABLE `people`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `table1`
--
ALTER TABLE `table1`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_ibfk_1` FOREIGN KEY (`tid`) REFERENCES `table1` (`id`);

--
-- Constraints for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD CONSTRAINT `subcategory_ibfk_1` FOREIGN KEY (`categoryid`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
