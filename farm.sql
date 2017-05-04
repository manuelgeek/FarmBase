-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2017 at 10:19 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `farm`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment_posts`
--

CREATE TABLE IF NOT EXISTS `comment_posts` (
`ID` int(11) NOT NULL,
  `postID` varchar(100) NOT NULL,
  `comment` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `liked` varchar(100) NOT NULL,
  `userpic` varchar(100) NOT NULL,
  `timer` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment_posts`
--

INSERT INTO `comment_posts` (`ID`, `postID`, `comment`, `email`, `liked`, `userpic`, `timer`) VALUES
(1, '14', 'This is very nice...', 'Magak Emmanuel', '', '', '2017-02-23 10:02:23'),
(2, '14', 'Awesome app for farmers', 'emashmagak@live.com', '', '', '2017-02-23 10:02:23'),
(5, '14', 'Comment here... here', 'emashmagak@live.com', '', '', '2017-02-23 10:02:23'),
(6, '14', 'awesome things here', 'emashmagak@live.com', '', '', '2017-02-23 10:02:23'),
(7, '14', 'awesome things here', 'emashmagak@live.com', '', '', '2017-02-23 10:02:23'),
(8, '14', 'awesome things here', 'emashmagak@live.com', '', '', '2017-02-23 10:02:23'),
(9, '14', 'awesome things here', 'emashmagak@live.com', '', '', '2017-02-23 10:02:23'),
(10, '14', 'awesome things here', 'emashmagak@live.com', '', '', '2017-02-23 10:02:23'),
(11, '14', 'awesome things here', 'Magak Emmanuel', '', '584309.jpg', '2017-02-23 10:02:23'),
(12, '14', 'awesome things here', 'Magak Emmanuel', '', '584309.jpg', '2017-02-23 10:02:23'),
(13, '14', 'awesome things here', 'Magak Emmanuel', '', '584309.jpg', '2017-02-23 10:02:23'),
(14, '15', 'awesome stuff here....like this', 'Manu El', '', '29993.jpg', '2017-02-23 10:02:23'),
(15, '15', 'awesome stuff here....like this', 'Manu El', '', '29993.jpg', '2017-02-23 10:02:23'),
(16, '15', 'awesome stuff here....like this', 'Manu El', '', '29993.jpg', '2017-02-23 10:02:23'),
(17, '15', 'awesome stuff here....like this', 'Manu El', '', '29993.jpg', '2017-02-23 10:02:23'),
(18, '15', 'awesome stuff here....like this', 'Manu El', '', '29993.jpg', '2017-02-23 10:02:23'),
(19, '15', 'awesome stuff here....like this', 'Manu El', '', '29993.jpg', '2017-02-23 10:02:23'),
(20, '15', 'awesome stuff here....like this', 'Manu El', '', '29993.jpg', '2017-02-23 10:02:23'),
(21, '15', 'awesome stuff here....like this', 'Manu El', '', '29993.jpg', '2017-02-23 10:02:23'),
(22, '15', 'awesome stuff here....like this', 'Manu El', '', '29993.jpg', '2017-02-23 10:02:23'),
(23, '15', 'awesome stuff here....like this', 'Manu El', '', '29993.jpg', '2017-02-23 10:02:23'),
(24, '15', 'awesome stuff here....like this', 'Manu El', '', '29993.jpg', '2017-02-23 10:02:23'),
(25, '16', 'Comment here...', 'Magak Emmanuel', '', '584309.jpg', '2017-02-23 10:02:23'),
(26, '16', 'Comment here...', 'Magak Emmanuel', '', '584309.jpg', '2017-02-23 10:02:23'),
(27, '16', 'Comment here... very good here', 'Anonymous', '', '', '2017-02-23 10:02:23'),
(28, '16', 'this is very nice', 'Manu El', '', '29993.jpg', '2017-02-24 10:03:21'),
(29, '16', 'hamara', 'Manu El', '', '', '2017-03-23 09:54:19'),
(30, '16', 'hamara', 'Manu El', '', '', '2017-03-23 10:02:49'),
(31, '17', 'great', 'Manu El', '', '205659.jpg', '2017-03-31 13:06:28'),
(32, '17', 'biggg', 'Manu El', '', '205659.jpg', '2017-04-03 11:43:52'),
(33, '17', 'biggg', 'Manu El', '', '205659.jpg', '2017-04-03 11:52:04'),
(34, '17', 'read', 'Manu El', '', '205659.jpg', '2017-04-03 12:36:43'),
(35, '17', '', 'Manu El', '', '205659.jpg', '2017-04-03 12:36:51'),
(36, '17', 'real', 'Manu El', '', '205659.jpg', '2017-04-03 12:36:59'),
(37, '17', '', 'Manu El', '', '205659.jpg', '2017-04-03 12:37:31'),
(38, '17', 'good', 'Manu El', '', '205659.jpg', '2017-04-03 12:39:32'),
(39, '17', 'noe', 'Manu El', '', '205659.jpg', '2017-04-03 12:47:11'),
(40, '17', 'noe', 'Manu El', '', '205659.jpg', '2017-04-03 12:47:14'),
(41, '17', 'true', 'Manu El', '', '205659.jpg', '2017-04-03 12:50:15'),
(42, '17', 'true', 'Manu El', '', '205659.jpg', '2017-04-03 12:55:44'),
(43, '17', 'true', 'Manu El', '', '205659.jpg', '2017-04-03 12:57:36'),
(44, '17', 'true', 'Manu El', '', '205659.jpg', '2017-04-03 12:57:37'),
(45, '17', 'true', 'Manu El', '', '205659.jpg', '2017-04-03 12:59:05'),
(46, '17', 'true', 'Manu El', '', '205659.jpg', '2017-04-03 12:59:06'),
(47, '17', 'true', 'Manu El', '', '205659.jpg', '2017-04-03 12:59:11'),
(48, '17', 'wewe', 'Manu El', '', '205659.jpg', '2017-04-03 12:59:14'),
(49, '17', 'yui', 'Manu El', '', '205659.jpg', '2017-04-03 13:00:38'),
(50, '17', 'ygg', 'Manu El', '', '205659.jpg', '2017-04-03 13:01:58'),
(51, '17', 'see', 'Manu El', '', '205659.jpg', '2017-04-03 13:02:26'),
(52, '17', 'jumia', 'Manu El', '', '205659.jpg', '2017-04-03 13:08:59'),
(53, '17', 'try', 'Manu El', '', '205659.jpg', '2017-04-03 13:11:35'),
(54, '17', 'ime work', 'Manu El', '', '205659.jpg', '2017-04-03 13:16:09'),
(55, '17', 'Hii hgfhghjggh', 'Manu El', '', '205659.jpg', '2017-04-06 13:08:37');

-- --------------------------------------------------------

--
-- Table structure for table `farmer_posts`
--

CREATE TABLE IF NOT EXISTS `farmer_posts` (
`ID` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL,
  `cartegory` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `userpic` varchar(100) NOT NULL,
  `timer` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `farmer_posts`
--

INSERT INTO `farmer_posts` (`ID`, `title`, `price`, `description`, `cartegory`, `phone`, `location`, `photo`, `email`, `userpic`, `timer`) VALUES
(6, 'Vitunguu', '650 per kg', 'very purple leafy and healthy fresh onions.\r\nRound and clean.\r\n2 days old', 'chick', '0724540039', 'Kisii Uni', '962349.png', 'emashmagak@gmail.com', '', '2017-02-23 10:01:03'),
(7, 'Vitunguu', '650 per kg', 'very purple leafy and healthy fresh onions.\r\nRound and clean.\r\n2 days old', 'chick', '0724540039', 'Kisii Uni', '690800.png', 'emashmagak@gmail.com', '', '2017-02-23 10:01:03'),
(8, 'Vitunguu', '650 per kg', 'very purple leafy and healthy fresh onions.\r\nRound and clean.\r\n2 days old', 'chick', '0724540039', 'Kisii Uni', '570986.png', 'emashmagak@gmail.com', '', '2017-02-23 10:01:03'),
(9, 'Vitunguu', '650 per kg', 'very purple leafy and healthy fresh onions.\r\nRound and clean.\r\n2 days old', 'chick', '0724540039', 'Kisii Uni', '442971.png', 'emashmagak@gmail.com', '', '2017-02-23 10:01:03'),
(10, 'Vitunguu', '650 per kg', 'very purple leafy and healthy fresh onions.\r\nRound and clean.\r\n2 days old', 'chick', '0724540039', 'Kisii Uni', '556688.png', 'emashmagak@gmail.com', '', '2017-02-23 10:01:03'),
(11, 'Vitunguu', '650 per kg', 'very purple leafy and healthy fresh onions.\r\nRound and clean.\r\n2 days old', 'chick', '0724540039', 'Kisii Uni', '86363.png', 'emashmagak@gmail.com', '', '2017-02-23 10:01:03'),
(12, 'Vitunguu', '650 per kg', 'very purple leafy and healthy fresh onions.\r\nRound and clean.\r\n2 days old', 'chick', '0724540039', 'Kisii Uni', '539036.png', 'emashmagak@gmail.com', '', '2017-02-23 10:01:03'),
(13, 'Vitunguu', '650 per kg', 'very purple leafy and healthy fresh onions.\r\nRound and clean.\r\n2 days old', 'chick', '0724540039', 'Kisii Uni', '331998.png', 'emashmagak@gmail.com', '', '2017-02-23 10:01:03'),
(14, 'Vitunguu', '650 per kg', 'very purple leafy and healthy fresh onions.\r\nRound and clean.\r\n2 days old', 'chick', '0724540039', 'Kisii Uni', '940764.png', 'emashmagak@gmail.com', '', '2017-02-23 10:01:03'),
(16, 'Cabbage', '120', 'very fersh and leafy type. grown under irrigation...', 'Farm Produce', '0712345678', 'Kisumu', '378521.png', 'Humphrey Otieno', '', '2017-02-23 10:01:03'),
(17, 'Tomatoes', '600 per stack', 'Very big, ripe and healthy ones. seeds from the green house.', 'Feeds, Suppliments and Seeds', '0712345678', 'Kitui', '247853.png', 'Humphrey Otieno', '', '2017-02-23 10:01:03'),
(18, 'Tomatoes', '600 per stack', 'Very big, ripe and healthy ones. seeds from the green house.', 'Feeds, Suppliments and Seeds', '0712345678', 'Kitui', '420685.png', 'Humphrey Otieno', '', '2017-02-23 10:01:03'),
(19, 'Tomatoes', '600 per stack', 'Very big, ripe and healthy ones. seeds from the green house.', 'Feeds, Suppliments and Seeds', '0712345678', 'Kitui', '824608.png', 'Humphrey Otieno', '', '2017-02-23 10:01:03'),
(34, 'Carrots', '250 per bunch', 'One reason for this is that they help us build upon the combined experience of many developers <br /> that came before us and ensure we structure our code in an <br />optimized way, meeting the needs of problems we''re attempting to solve.\r\n						Design patterns also provide us a common vocabulary to describe solutions. This can be significantly simpler than describing syntax and semantics when we''re attempting to convey a way of structuring a solution in code form to others.', 'Farm Produce', '0724540039', 'Nairobi', '295017.png', 'Manu El', '29993.jpg', '2017-02-23 10:01:03'),
(35, 'Kuku', '750', 'It is true that complication and problem are inevitable in human life but we all acknowledge the fact that great disaster also hurt less if we someone to support us. If you feel emotionally tired and helpless, you must seek counselling from someone you trust. Sharing your problem does reduce the pain but if the issue is way too complicated then seek an expert advice from counsellor.', 'Livestock, Poultry and Fish', '0724540039', 'Lamu', '751012.png', 'Manu El', '29993.jpg', '2017-02-23 10:01:03'),
(36, 'chinese chicken', '897989', 'fhghghjgjgh fhgfgfhjghjghj vfjhgjughgjkj', 'Feeds, Suppliments and Seeds', '567576879', 'Lodwar', '91180.jpg', 'Manu El', '', '2017-03-23 09:31:33'),
(37, 'Cocoa', 'Ksh 3445', 'hsdhdhjds\r\ndsndcndsssd dshsdjsd sdahgshgsda\r\n dgsda', 'Feeds, Suppliments and Seeds', '0724540039', 'Kitale', '239409.png', 'Manu El', '205659.jpg', '2017-04-04 20:57:14'),
(38, 'Kifaranga', 'ksh 548', 'yule msee ako lir huku nsana\r\nkuja unione hapa....', 'Feeds, Suppliments and Seeds', '0724540039', 'Oyugis', '157337.png', 'Manu El', '205659.jpg', '2017-04-04 20:58:44'),
(39, 'Kifaranga', 'ksh 548', 'yule msee ako lir huku nsana\r\nkuja unione hapa....', 'Feeds, Suppliments and Seeds', '0724540039', 'Oyugis', '310291.png', 'Manu El', '205659.jpg', '2017-04-04 20:58:48'),
(40, 'Kifaranga', 'ksh 548', 'yule msee ako lir huku nsana\r\nkuja unione hapa....', 'Feeds, Suppliments and Seeds', '0724540039', 'Oyugis', '233372.png', 'Manu El', '205659.jpg', '2017-04-04 20:58:52'),
(41, 'Kifaranga', 'ksh 548', 'yule msee ako lir huku nsana\r\nkuja unione hapa....', 'Feeds, Suppliments and Seeds', '0724540039', 'Oyugis', '387545.png', 'Manu El', '205659.jpg', '2017-04-04 20:58:55'),
(42, 'Kifaranga', 'ksh 548', 'yule msee ako lir huku nsana\r\nkuja unione hapa....', 'Feeds, Suppliments and Seeds', '0724540039', 'Oyugis', '818175.png', 'Manu El', '205659.jpg', '2017-04-04 20:58:58'),
(43, 'Kifaranga', 'ksh 548', 'yule msee ako lir huku nsana\r\nkuja unione hapa....', 'Feeds, Suppliments and Seeds', '0724540039', 'Oyugis', '226269.png', 'Manu El', '205659.jpg', '2017-04-04 20:59:02'),
(44, 'Kifaranga', 'ksh 548', 'yule msee ako lir huku nsana\r\nkuja unione hapa....', 'Feeds, Suppliments and Seeds', '0724540039', 'Oyugis', '627875.png', 'Manu El', '205659.jpg', '2017-04-04 20:59:05'),
(45, 'Kifaranga', 'ksh 548', 'yule msee ako lir huku nsana\r\nkuja unione hapa....', 'Feeds, Suppliments and Seeds', '0724540039', 'Oyugis', '743513.png', 'Manu El', '205659.jpg', '2017-04-04 20:59:08'),
(46, 'Kifaranga', 'ksh 548', 'yule msee ako lir huku nsana\r\nkuja unione hapa....', 'Feeds, Suppliments and Seeds', '0724540039', 'Oyugis', '720007.png', 'Manu El', '205659.jpg', '2017-04-04 20:59:11'),
(47, 'Kifaranga', 'ksh 548', 'yule msee ako lir huku nsana\r\nkuja unione hapa....', 'Feeds, Suppliments and Seeds', '0724540039', 'Oyugis', '327608.png', 'Manu El', '205659.jpg', '2017-04-04 20:59:15'),
(48, 'Kifaranga', 'ksh 548', 'yule msee ako lir huku nsana\r\nkuja unione hapa....', 'Feeds, Suppliments and Seeds', '0724540039', 'Oyugis', '247762.png', 'Manu El', '205659.jpg', '2017-04-04 20:59:18'),
(49, 'Kifaranga', 'ksh 548', 'yule msee ako lir huku nsana\r\nkuja unione hapa....', 'Feeds, Suppliments and Seeds', '0724540039', 'Oyugis', '582419.png', 'Manu El', '205659.jpg', '2017-04-04 20:59:22'),
(50, 'kibuyu', 'free', '<p>this is</p>\r\n\r\n<h1>very true. <strong>try i</strong>t</h1>', 'Feeds, Suppliments and Seeds', '0724540039', 'kitui', '657082.png', 'Manu El', '205659.jpg', '2017-04-08 18:27:07'),
(52, 'Dhgfhfhgh', '4500', '<p>fhghghghg</p>', 'Feeds, Suppliments and Seeds', '56778687678886', 'Kisii', '952471.png', 'Silali Gibson', '', '2017-04-12 10:30:23');

-- --------------------------------------------------------

--
-- Table structure for table `message_fav`
--

CREATE TABLE IF NOT EXISTS `message_fav` (
`ID` int(11) NOT NULL,
  `postID` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `favourite` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message_fav`
--

INSERT INTO `message_fav` (`ID`, `postID`, `email`, `favourite`) VALUES
(3, '16', 'emashmagak@gmail.com', '1'),
(5, '14', 'emashmagak@gmail.com', '1'),
(6, '17', 'emashmagak@gmail.com', '1');

-- --------------------------------------------------------

--
-- Table structure for table `message_posts`
--

CREATE TABLE IF NOT EXISTS `message_posts` (
`ID` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL,
  `cartegory` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `userpic` varchar(100) NOT NULL,
  `timer` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message_posts`
--

INSERT INTO `message_posts` (`ID`, `title`, `description`, `cartegory`, `phone`, `email`, `photo`, `userpic`, `timer`) VALUES
(1, 'Cabbage Farm', 'One reason for this is that they help us build upon the combined experience of many developers <br /> that came before us and ensure we structure our code in an <br />optimized way, meeting the needs of problems we''re attempting to solve.\r\n						Design patterns also provide us a common vocabulary to describe solutions. This can be significantly simpler than describing syntax and semantics when we''re attempting to convey a way of structuring a solution in code form to others.', 'Feeds, Suppliments and Seeds', '0724540039', 'Magak Emmanuel', '193739.png', '', '2017-02-23 09:59:32'),
(2, 'Cabbage Farm', 'One reason for this is that they help us build upon the combined experience of many developers <br /> that came before us and ensure we structure our code in an <br />optimized way, meeting the needs of problems we''re attempting to solve.\r\n						Design patterns also provide us a common vocabulary to describe solutions. This can be significantly simpler than describing syntax and semantics when we''re attempting to convey a way of structuring a solution in code form to others.', 'Feeds, Suppliments and Seeds', '0724540039', 'Magak Emmanuel', '875217.png', '', '2017-02-23 09:59:32'),
(3, 'Cabbage Farm', 'One reason for this is that they help us build upon the combined experience of many developers <br /> that came before us and ensure we structure our code in an <br />optimized way, meeting the needs of problems we''re attempting to solve.\r\n						Design patterns also provide us a common vocabulary to describe solutions. This can be significantly simpler than describing syntax and semantics when we''re attempting to convey a way of structuring a solution in code form to others.', 'Feeds, Suppliments and Seeds', '0724540039', 'Magak Emmanuel', '818694.png', '', '2017-02-23 09:59:32'),
(4, 'Cabbage Farm', 'One reason for this is that they help us build upon the combined experience of many developers <br /> that came before us and ensure we structure our code in an <br />optimized way, meeting the needs of problems we''re attempting to solve.\r\n						Design patterns also provide us a common vocabulary to describe solutions. This can be significantly simpler than describing syntax and semantics when we''re attempting to convey a way of structuring a solution in code form to others.', 'Feeds, Suppliments and Seeds', '0724540039', 'Magak Emmanuel', '641777.png', '', '2017-02-23 09:59:32'),
(5, 'Cabbage Farm', 'One reason for this is that they help us build upon the combined experience of many developers <br /> that came before us and ensure we structure our code in an <br />optimized way, meeting the needs of problems we''re attempting to solve.\r\n						Design patterns also provide us a common vocabulary to describe solutions. This can be significantly simpler than describing syntax and semantics when we''re attempting to convey a way of structuring a solution in code form to others.', 'Feeds, Suppliments and Seeds', '0724540039', 'Magak Emmanuel', '590254.png', '', '2017-02-23 09:59:32'),
(6, 'Cabbage Farm', 'One reason for this is that they help us build upon the combined experience of many developers <br /> that came before us and ensure we structure our code in an <br />optimized way, meeting the needs of problems we''re attempting to solve.\r\n						Design patterns also provide us a common vocabulary to describe solutions. This can be significantly simpler than describing syntax and semantics when we''re attempting to convey a way of structuring a solution in code form to others.', 'Feeds, Suppliments and Seeds', '0724540039', 'Magak Emmanuel', '5237.png', '', '2017-02-23 09:59:32'),
(7, 'Cabbage Farm', 'One reason for this is that they help us build upon the combined experience of many developers <br /> that came before us and ensure we structure our code in an <br />optimized way, meeting the needs of problems we''re attempting to solve.\r\n						Design patterns also provide us a common vocabulary to describe solutions. This can be significantly simpler than describing syntax and semantics when we''re attempting to convey a way of structuring a solution in code form to others.', 'Feeds, Suppliments and Seeds', '0724540039', 'Magak Emmanuel', '542694.png', '', '2017-02-23 09:59:32'),
(8, 'Cabbage Farm', 'One reason for this is that they help us build upon the combined experience of many developers <br /> that came before us and ensure we structure our code in an <br />optimized way, meeting the needs of problems we''re attempting to solve.\r\n						Design patterns also provide us a common vocabulary to describe solutions. This can be significantly simpler than describing syntax and semantics when we''re attempting to convey a way of structuring a solution in code form to others.', 'Feeds, Suppliments and Seeds', '0724540039', 'Magak Emmanuel', '855644.png', '', '2017-02-23 09:59:32'),
(9, 'Cabbage Farm', 'One reason for this is that they help us build upon the combined experience of many developers <br /> that came before us and ensure we structure our code in an <br />optimized way, meeting the needs of problems we''re attempting to solve.\r\n						Design patterns also provide us a common vocabulary to describe solutions. This can be significantly simpler than describing syntax and semantics when we''re attempting to convey a way of structuring a solution in code form to others.', 'Feeds, Suppliments and Seeds', '0724540039', 'Magak Emmanuel', '236299.png', '', '2017-02-23 09:59:32'),
(10, 'Cabbage Farm', 'One reason for this is that they help us build upon the combined experience of many developers <br /> that came before us and ensure we structure our code in an <br />optimized way, meeting the needs of problems we''re attempting to solve.\r\n						Design patterns also provide us a common vocabulary to describe solutions. This can be significantly simpler than describing syntax and semantics when we''re attempting to convey a way of structuring a solution in code form to others.', 'Feeds, Suppliments and Seeds', '0724540039', 'Magak Emmanuel', '207062.png', '', '2017-02-23 09:59:32'),
(11, 'Cabbage Farm', 'One reason for this is that they help us build upon the combined experience of many developers <br /> that came before us and ensure we structure our code in an <br />optimized way, meeting the needs of problems we''re attempting to solve.\r\n						Design patterns also provide us a common vocabulary to describe solutions. This can be significantly simpler than describing syntax and semantics when we''re attempting to convey a way of structuring a solution in code form to others.', 'Feeds, Suppliments and Seeds', '0724540039', 'Magak Emmanuel', '135966.png', '', '2017-02-23 09:59:32'),
(12, 'Cabbage Farm', 'One reason for this is that they help us build upon the combined experience of many developers <br /> that came before us and ensure we structure our code in an <br />optimized way, meeting the needs of problems we''re attempting to solve.\r\n						Design patterns also provide us a common vocabulary to describe solutions. This can be significantly simpler than describing syntax and semantics when we''re attempting to convey a way of structuring a solution in code form to others.', 'Feeds, Suppliments and Seeds', '0724540039', 'Magak Emmanuel', '806103.png', '', '2017-02-23 09:59:32'),
(13, 'Cabbage Farm', 'One reason for this is that they help us build upon the combined experience of many developers <br /> that came before us and ensure we structure our code in an <br />optimized way, meeting the needs of problems we''re attempting to solve.\r\n						Design patterns also provide us a common vocabulary to describe solutions. This can be significantly simpler than describing syntax and semantics when we''re attempting to convey a way of structuring a solution in code form to others.', 'Feeds, Suppliments and Seeds', '0724540039', 'Magak Emmanuel', '596138.png', '', '2017-02-23 09:59:32'),
(14, 'Cabbage Farm', 'One reason for this is that they help us build upon the combined experience of many developers <br /> that came before us and ensure we structure our code in an <br />optimized way, meeting the needs of problems we''re attempting to solve.\r\n						Design patterns also provide us a common vocabulary to describe solutions. This can be significantly simpler than describing syntax and semantics when we''re attempting to convey a way of structuring a solution in code form to others.', 'Feeds, Suppliments and Seeds', '0724540039', 'Magak Emmanuel', '747202.png', '', '2017-02-23 09:59:32'),
(15, 'Cabbage Farm', 'One reason for this is that they help us build upon the combined experience of many developers <br /> that came before us and ensure we structure our code in an <br />optimized way, meeting the needs of problems we''re attempting to solve.\r\n						Design patterns also provide us a common vocabulary to describe solutions. This can be significantly simpler than describing syntax and semantics when we''re attempting to convey a way of structuring a solution in code form to others.', 'Feeds, Suppliments and Seeds', '0724540039', 'Magak Emmanuel', '856742.png', '', '2017-02-23 09:59:32'),
(16, 'Vegetable Planting', 'IMPORTANCE OF COUNSELLING \r\nCounselling is important to the institution and even to the modern world. The importance are:\r\n1.	Counselling in marriage and relationship help people to bond better and make relationship smoother with fewer conflicts.\r\n\r\n2.	Helps one improve the skills of decision making, reduce tension, maintain a better self-esteem and confidence and feel more positive and optimistic towards life.\r\n\r\n\r\n3.	Many old age people who are often treated as commodity in the houses feed nee', 'Feeds, Suppliments and Seeds', '0724540039', 'Magak Emmanuel', '918417.png', '584309.jpg', '2017-02-23 09:59:32'),
(17, 'githeri', 'jhejhdhjsad dehedgh ggd <br>hjbjwdd <b>hgsdhdshhjsdgsw</b>', 'Feeds, Suppliments and Seeds', '0724540039', 'Magak Emmanuel', '', '584309.jpg', '2017-03-30 20:44:12');

-- --------------------------------------------------------

--
-- Table structure for table `product_fav`
--

CREATE TABLE IF NOT EXISTS `product_fav` (
`ID` int(11) NOT NULL,
  `postID` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `favourite` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_fav`
--

INSERT INTO `product_fav` (`ID`, `postID`, `email`, `favourite`) VALUES
(2, '49', 'emashmagak@gmail.com', '1'),
(3, '50', 'emashmagak@gmail.com', '1'),
(4, '47', 'emashmagak@gmail.com', '1');

-- --------------------------------------------------------

--
-- Table structure for table `sent_messages`
--

CREATE TABLE IF NOT EXISTS `sent_messages` (
`ID` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `senderEmail` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `message` longtext NOT NULL,
  `postID` varchar(100) NOT NULL,
  `receiverEmail` varchar(100) NOT NULL,
  `status` varchar(10) NOT NULL,
  `timer` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sent_messages`
--

INSERT INTO `sent_messages` (`ID`, `name`, `senderEmail`, `phone`, `message`, `postID`, `receiverEmail`, `status`, `timer`) VALUES
(1, 'Manu El', 'emashmagak@gmail.com', '0724540039', 'trial messo', '49', 'Manu El', '', '2017-04-10 21:30:57'),
(2, 'Manu El', 'emashmagak@gmail.com', '0724540039', 'this is true', '49', 'Manu El', '', '2017-04-10 21:30:57'),
(3, 'Manu El', 'emashmagak@gmail.com', '0724540039', 'this is true', '49', 'Manu El', '', '2017-04-10 21:30:57'),
(4, 'Siali Gibs', 'silali@gmail.com', '0704700155', 'this is the niggah', '49', 'Manu El', 'unread', '2017-04-10 21:51:15'),
(5, 'Manu El', 'emashmagak@gmail.com', '0724540039', 'true dat', '49', 'Manu El', 'unread', '2017-04-10 22:37:18'),
(6, 'Manu El', 'emashmagak@gmail.com', '0724540039', 'message here...', '49', 'Manu El', 'unread', '2017-04-11 09:37:14'),
(7, 'Silali Gibson', 'gibson@mail.com', '56778687678886', 'stupid product', '49', 'Manu El', 'unread', '2017-04-12 09:33:17'),
(8, 'Manu El', 'emashmagak@gmail.com', '0724540039', 'Stuff blah blah bl;ah', '51', 'Silali Gibson', 'unread', '2017-04-12 09:36:38'),
(9, 'Manu El', 'emashmagak@gmail.com', '0724540039', 'jik', '51', 'Silali Gibson', 'unread', '2017-04-12 09:36:46'),
(10, 'John', 'john@mail.com', '989008908908', 'gfdjhgfdkhfdkjf', '51', 'Silali Gibson', 'unread', '2017-04-12 09:38:34'),
(11, 'Silali', 'silali@mail.com', '43546565656', 'fgfgfhgf', '50', 'Manu El', 'unread', '2017-04-12 10:28:51'),
(12, 'Sgfhgfh', 'fdgf@mil.dfdf', '4354678', 'gfdhfgjhgkjgh', '52', 'Silali Gibson', 'unread', '2017-04-12 10:31:44');

-- --------------------------------------------------------

--
-- Table structure for table `sent_messages_cons`
--

CREATE TABLE IF NOT EXISTS `sent_messages_cons` (
`ID` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `senderEmail` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `message` longtext NOT NULL,
  `postID` varchar(100) NOT NULL,
  `receiverEmail` varchar(100) NOT NULL,
  `cartegory` varchar(100) NOT NULL,
  `status` varchar(10) NOT NULL,
  `timer` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sent_messages_cons`
--

INSERT INTO `sent_messages_cons` (`ID`, `name`, `senderEmail`, `phone`, `message`, `postID`, `receiverEmail`, `cartegory`, `status`, `timer`) VALUES
(1, 'Manu El', 'emashmagak@gmail.com', '0724540039', '', '16', 'Magak Emmanuel', '', 'unread', '2017-04-10 23:19:00'),
(2, 'Manu El', 'emashmagak@gmail.com', '0724540039', '', '16', 'Magak Emmanuel', '', 'unread', '2017-04-10 23:19:17'),
(3, 'Manu El', 'emashmagak@gmail.com', '0724540039', '', '16', 'Magak Emmanuel', '', 'unread', '2017-04-10 23:19:46'),
(4, 'Manu El', 'emashmagak@gmail.com', '0724540039', 'tester', '16', 'Magak Emmanuel', '', 'unread', '2017-04-10 23:20:55');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE IF NOT EXISTS `tbl_admin` (
`ID` int(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `pass` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`ID`, `email`, `pass`) VALUES
(1, 'emashmagak@appslab.co.ke', 'mlab.,.,');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_consultants`
--

CREATE TABLE IF NOT EXISTS `tbl_consultants` (
`ID` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `pass` varchar(500) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_consultants`
--

INSERT INTO `tbl_consultants` (`ID`, `name`, `email`, `phone`, `photo`, `pass`) VALUES
(1, 'Magak Emmanuel', 'emashmagak@live.com', '0724540039', '584309.jpg', '2b385e6093aa32e2a6da96353658c1ab');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_farmers`
--

CREATE TABLE IF NOT EXISTS `tbl_farmers` (
`ID` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `pass` varchar(500) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_farmers`
--

INSERT INTO `tbl_farmers` (`ID`, `name`, `email`, `phone`, `photo`, `pass`) VALUES
(1, 'Manu El', 'emashmagak@gmail.com', '0724540039', '205659.jpg', '2b385e6093aa32e2a6da96353658c1ab'),
(2, 'Manu El', 'emashmagak@live.com', '0724540039', '', '52e6faa3e83e3da54a804455d0b8e74d'),
(3, 'Silali Gibson', 'silali@gmail.com', '0733725491', '', 'fc51f44e790e8f04b54f733356b45183'),
(4, 'Humphrey Otieno', 'humphrey@yahoo.com', '0712345678', '804060.jpg', '262d4d3f6cf9f553a1dfd5f902426147'),
(5, 'Manu El', 'el@mail.com', '567576879', '', 'db442f230d3deca58e3f481f3338381b'),
(6, 'Naf Zeu', 'zeu@gmail.com', '0723456789', '509707.png', 'db442f230d3deca58e3f481f3338381b'),
(7, 'Silali Gibson', 'gibson@mail.com', '56778687678886', '', 'db442f230d3deca58e3f481f3338381b');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment_posts`
--
ALTER TABLE `comment_posts`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `farmer_posts`
--
ALTER TABLE `farmer_posts`
 ADD PRIMARY KEY (`ID`), ADD UNIQUE KEY `photo` (`photo`);

--
-- Indexes for table `message_fav`
--
ALTER TABLE `message_fav`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `message_posts`
--
ALTER TABLE `message_posts`
 ADD PRIMARY KEY (`ID`), ADD UNIQUE KEY `photo` (`photo`);

--
-- Indexes for table `product_fav`
--
ALTER TABLE `product_fav`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `sent_messages`
--
ALTER TABLE `sent_messages`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `sent_messages_cons`
--
ALTER TABLE `sent_messages_cons`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_consultants`
--
ALTER TABLE `tbl_consultants`
 ADD PRIMARY KEY (`ID`), ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `tbl_farmers`
--
ALTER TABLE `tbl_farmers`
 ADD PRIMARY KEY (`ID`), ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment_posts`
--
ALTER TABLE `comment_posts`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=56;
--
-- AUTO_INCREMENT for table `farmer_posts`
--
ALTER TABLE `farmer_posts`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `message_fav`
--
ALTER TABLE `message_fav`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `message_posts`
--
ALTER TABLE `message_posts`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `product_fav`
--
ALTER TABLE `product_fav`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `sent_messages`
--
ALTER TABLE `sent_messages`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `sent_messages_cons`
--
ALTER TABLE `sent_messages_cons`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_consultants`
--
ALTER TABLE `tbl_consultants`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_farmers`
--
ALTER TABLE `tbl_farmers`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
