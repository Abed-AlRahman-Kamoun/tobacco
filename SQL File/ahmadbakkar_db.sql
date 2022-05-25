-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 08, 2021 at 11:34 PM
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
-- Database: `ahmadbakkar db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admininfo`
--

CREATE TABLE `admininfo` (
  `id` int(11) NOT NULL,
  `AdminName` varchar(100) NOT NULL,
  `AdminPass` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admininfo`
--

INSERT INTO `admininfo` (`id`, `AdminName`, `AdminPass`) VALUES
(0, 'AhmadBakkar', 'iamtheadmin');

-- --------------------------------------------------------

--
-- Table structure for table `allproducts`
--

CREATE TABLE `allproducts` (
  `id` int(11) NOT NULL,
  `ImageScr` varchar(100) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Description` varchar(100) NOT NULL,
  `Price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `allproducts`
--

INSERT INTO `allproducts` (`id`, `ImageScr`, `Name`, `Description`, `Price`) VALUES
(1, 'https://i.ibb.co/g9GGRKg/7.webp', 'Davidoff Classic', 'Classic 1 packet', 16),
(2, 'https://i.ibb.co/4gHd40f/4.webp', 'Davidoff Blue', 'Blue 1 packet', 16),
(3, 'https://i.ibb.co/qmnYDbt/6.webp', 'Davidoff Gold', 'Gold 1 packet', 17),
(4, 'https://i.ibb.co/5vxzcsc/5.webp', 'Davidoff Gold Slims', 'Gold Slims 1 packet', 18),
(5, 'https://i.ibb.co/f48pyVd/1.webp', 'Cedars American', 'American 1 packet', 4),
(6, 'https://i.ibb.co/Sxmt49c/3.webp', 'Cedars Silver', 'Silver 1 packet', 4),
(7, 'https://i.ibb.co/zs0qQfS/2.webp', 'Cedars Black', 'Black 1 packet', 5),
(8, 'https://i.ibb.co/wwzXfts/9.webp', 'Kent Switch', 'Switch 1 packet', 15),
(9, 'https://i.ibb.co/pP8qwh8/10.webp', 'Kent Nano', 'Nano 1 packet', 15),
(10, 'https://i.ibb.co/bg9MLdn/8.webp', 'Gitanes Indigo', 'Indigo 1 packet', 10),
(11, 'https://i.ibb.co/qBf7DY0/11.jpg', 'Al Fakher Shisha Tobacco', 'This collection great for beginners and experts that desire pinpoint accuracy on single note flavor', 40),
(12, 'https://i.ibb.co/0yvcw3V/15.jpg', 'Nakhla Shisha Tobacco', 'Traditional Middle Eastern shisha made from unwashed tobacco. It\'s a classic!', 50),
(13, 'https://i.ibb.co/m9G3VFN/13.jpg', 'Nu Shisha Tobacco', 'Nu Tobacco has arrived with a fresh selection of remarkable hookah flavors.', 55),
(14, 'https://i.ibb.co/rZPSQ2k/14.jpg', 'Starbuzz Bold Shisha Tobacco', 'A tasty collection of unique Starbuzz recipes crafted with an extra boost of bold flavoring for long', 60),
(15, 'https://i.ibb.co/qkt4fpB/12.jpg', 'Starbuzz Shisha Tobacco', 'Over 80 Exotic shisha flavors of Starbuzz tobacco give this long-lasting shisha a distinctive smooth', 45);

-- --------------------------------------------------------

--
-- Table structure for table `contactmessage`
--

CREATE TABLE `contactmessage` (
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `phone` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `comment` varchar(900) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `shishaproducts`
--

CREATE TABLE `shishaproducts` (
  `id` int(11) NOT NULL,
  `ImageSrc` varchar(100) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Description` varchar(100) NOT NULL,
  `Price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shishaproducts`
--

INSERT INTO `shishaproducts` (`id`, `ImageSrc`, `Name`, `Description`, `Price`) VALUES
(11, 'https://i.ibb.co/qBf7DY0/11.jpg', 'Al Fakher Shisha Tobacco', 'This collection great for beginners and experts that desire pinpoint accuracy on single note flavor ', 40),
(12, 'https://i.ibb.co/0yvcw3V/15.jpg', 'Nakhla Shisha Tobacco', 'Traditional Middle Eastern shisha made from unwashed tobacco. It\'s a classic!', 50),
(13, 'https://i.ibb.co/m9G3VFN/13.jpg', 'Nu Shisha Tobacco', 'Nu Tobacco has arrived with a fresh selection of remarkable hookah flavors.', 55),
(14, 'https://i.ibb.co/rZPSQ2k/14.jpg', 'Starbuzz Bold Shisha Tobacco', 'A tasty collection of unique Starbuzz recipes crafted with an extra boost of bold flavoring for long', 60),
(15, 'https://i.ibb.co/qkt4fpB/12.jpg', 'Starbuzz Shisha Tobacco', 'Over 80 Exotic shisha flavors of Starbuzz tobacco give this long-lasting shisha a distinctive smooth', 45);

-- --------------------------------------------------------

--
-- Table structure for table `smokeproducts`
--

CREATE TABLE `smokeproducts` (
  `id` int(11) NOT NULL,
  `ImageSrc` varchar(100) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Description` varchar(100) NOT NULL,
  `Price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `smokeproducts`
--

INSERT INTO `smokeproducts` (`id`, `ImageSrc`, `Name`, `Description`, `Price`) VALUES
(1, 'https://i.ibb.co/g9GGRKg/7.webp', 'Davidoff Classic', 'Classic 1 packet', 16),
(2, 'https://i.ibb.co/4gHd40f/4.webp', 'Davidoff Blue', 'Blue 1 packet', 16),
(3, 'https://i.ibb.co/qmnYDbt/6.webp', 'Davidoff Gold', 'Gold 1 packet', 17),
(4, 'https://i.ibb.co/5vxzcsc/5.webp', 'Davidoff Gold Slims', 'Gold Slims 1 packet', 18),
(5, 'https://i.ibb.co/f48pyVd/1.webp\r\n', 'Cedars American', 'American 1 packet', 4),
(6, 'https://i.ibb.co/Sxmt49c/3.webp', 'Cedars Silver', 'Silver 1 packet', 4),
(7, 'https://i.ibb.co/zs0qQfS/2.webp', 'Cedars Black', 'Black 1 packet', 5),
(8, 'https://i.ibb.co/wwzXfts/9.webp\r\n', 'Kent Switch', 'Switch 1 packet', 15),
(9, 'https://i.ibb.co/pP8qwh8/10.webp', 'Kent Nano', 'Nano 1 packet', 15),
(10, 'https://i.ibb.co/bg9MLdn/8.webp', 'Gitanes Indigo', 'Indigo 1 packet', 10);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
