-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 07, 2017 at 11:17 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `farm`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment_posts`
--

CREATE TABLE `comment_posts` (
  `ID` int(11) NOT NULL,
  `postID` varchar(100) NOT NULL,
  `comment` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `liked` varchar(100) NOT NULL,
  `userpic` varchar(100) NOT NULL,
  `timer` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(55, '17', 'Hii hgfhghjggh', 'Manu El', '', '205659.jpg', '2017-04-06 13:08:37'),
(56, '19', 'nice post', 'Manu El', '', '205659.jpg', '2017-05-18 13:23:03'),
(57, '18', 'rrraaah', 'Manu El', '', '205659.jpg', '2017-06-02 13:43:37'),
(58, '18', 'riah', 'Manu El', '', '205659.jpg', '2017-06-02 13:43:59'),
(59, '2', 'real', 'Manu El', '', '205659.jpg', '2017-06-06 19:49:42');

-- --------------------------------------------------------

--
-- Table structure for table `farmer_posts`
--

CREATE TABLE `farmer_posts` (
  `ID` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL,
  `cartegory` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `userID` int(10) NOT NULL,
  `userpic` varchar(100) NOT NULL,
  `timer` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `hidden` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `farmer_posts`
--

INSERT INTO `farmer_posts` (`ID`, `title`, `price`, `description`, `cartegory`, `phone`, `location`, `photo`, `email`, `userID`, `userpic`, `timer`, `hidden`) VALUES
(7, 'Vitunguu Real', '650', 'wewe kuja hapa', 'Feeds, Suppliments and Seeds', '0724540039', 'Kisii Uni', '690800.png', 'Manu El', 0, '205659.jpg', '2017-06-05 20:50:18', ''),
(8, 'Vitunguu ni wewe', '650', 'true stuff', 'Feeds, Suppliments and Seeds', '0724540039', 'Kisii Uni', '570986.png', 'Manu El', 0, '205659.jpg', '2017-06-06 10:44:00', ''),
(9, 'Vitunguu', '650 per kg', 'very purple leafy and healthy fresh onions.\r\nRound and clean.\r\n2 days old', 'chick', '0724540039', 'Kisii Uni', '442971.png', 'emashmagak@gmail.com', 0, '', '2017-02-23 10:01:03', ''),
(10, 'Vitunguu', '650 per kg', 'very purple leafy and healthy fresh onions.\r\nRound and clean.\r\n2 days old', 'chick', '0724540039', 'Kisii Uni', '556688.png', 'emashmagak@gmail.com', 0, '', '2017-02-23 10:01:03', ''),
(11, 'Vitunguu', '650 per kg', 'very purple leafy and healthy fresh onions.\r\nRound and clean.\r\n2 days old', 'chick', '0724540039', 'Kisii Uni', '86363.png', 'emashmagak@gmail.com', 0, '', '2017-02-23 10:01:03', ''),
(12, 'Vitunguu', '650 per kg', 'very purple leafy and healthy fresh onions.\r\nRound and clean.\r\n2 days old', 'chick', '0724540039', 'Kisii Uni', '539036.png', 'emashmagak@gmail.com', 0, '', '2017-02-23 10:01:03', ''),
(13, 'Vitunguu', '650 per kg', 'very purple leafy and healthy fresh onions.\r\nRound and clean.\r\n2 days old', 'chick', '0724540039', 'Kisii Uni', '331998.png', 'emashmagak@gmail.com', 0, '', '2017-02-23 10:01:03', ''),
(14, 'Vitunguu', '650 per kg', 'very purple leafy and healthy fresh onions.\r\nRound and clean.\r\n2 days old', 'chick', '0724540039', 'Kisii Uni', '940764.png', 'emashmagak@gmail.com', 0, '', '2017-02-23 10:01:03', ''),
(16, 'Cabbage', '120', 'very fersh and leafy type. grown under irrigation...', 'Farm Produce', '0712345678', 'Kisumu', '378521.png', 'Humphrey Otieno', 0, '', '2017-02-23 10:01:03', ''),
(17, 'Tomatoes', '600 per stack', 'Very big, ripe and healthy ones. seeds from the green house.', 'Feeds, Suppliments and Seeds', '0712345678', 'Kitui', '247853.png', 'Humphrey Otieno', 0, '', '2017-02-23 10:01:03', ''),
(18, 'Tomatoes', '600 per stack', 'Very big, ripe and healthy ones. seeds from the green house.', 'Feeds, Suppliments and Seeds', '0712345678', 'Kitui', '420685.png', 'Humphrey Otieno', 0, '', '2017-02-23 10:01:03', ''),
(19, 'Tomatoes', '600 per stack', 'Very big, ripe and healthy ones. seeds from the green house.', 'Feeds, Suppliments and Seeds', '0712345678', 'Kitui', '824608.png', 'Humphrey Otieno', 0, '', '2017-02-23 10:01:03', ''),
(34, 'Carrots', '250 per bunch', 'One reason for this is that they help us build upon the combined experience of many developers <br /> that came before us and ensure we structure our code in an <br />optimized way, meeting the needs of problems we\'re attempting to solve.\r\n						Design patterns also provide us a common vocabulary to describe solutions. This can be significantly simpler than describing syntax and semantics when we\'re attempting to convey a way of structuring a solution in code form to others.', 'Farm Produce', '0724540039', 'Nairobi', '295017.png', 'Manu El', 0, '29993.jpg', '2017-02-23 10:01:03', ''),
(35, 'Kuku', '750', 'It is true that complication and problem are inevitable in human life but we all acknowledge the fact that great disaster also hurt less if we someone to support us. If you feel emotionally tired and helpless, you must seek counselling from someone you trust. Sharing your problem does reduce the pain but if the issue is way too complicated then seek an expert advice from counsellor.', 'Livestock, Poultry and Fish', '0724540039', 'Lamu', '751012.png', 'Manu El', 0, '29993.jpg', '2017-02-23 10:01:03', ''),
(36, 'chinese chicken', '897989', 'fhghghjgjgh fhgfgfhjghjghj vfjhgjughgjkj', 'Feeds, Suppliments and Seeds', '567576879', 'Lodwar', '91180.jpg', 'Manu El', 0, '', '2017-03-23 09:31:33', ''),
(37, 'Cocoa', 'Ksh 3445', 'hsdhdhjds\r\ndsndcndsssd dshsdjsd sdahgshgsda\r\n dgsda', 'Feeds, Suppliments and Seeds', '0724540039', 'Kitale', '239409.png', 'Manu El', 0, '205659.jpg', '2017-04-04 20:57:14', ''),
(38, 'Kifaranga', 'ksh 548', 'yule msee ako lir huku nsana\r\nkuja unione hapa....', 'Feeds, Suppliments and Seeds', '0724540039', 'Oyugis', '157337.png', 'Manu El', 0, '205659.jpg', '2017-04-04 20:58:44', ''),
(39, 'Kifaranga', 'ksh 548', 'yule msee ako lir huku nsana\r\nkuja unione hapa....', 'Feeds, Suppliments and Seeds', '0724540039', 'Oyugis', '310291.png', 'Manu El', 0, '205659.jpg', '2017-04-04 20:58:48', ''),
(40, 'Kifaranga', 'ksh 548', 'yule msee ako lir huku nsana\r\nkuja unione hapa....', 'Feeds, Suppliments and Seeds', '0724540039', 'Oyugis', '233372.png', 'Manu El', 0, '205659.jpg', '2017-04-04 20:58:52', ''),
(41, 'Kifaranga', 'ksh 548', 'yule msee ako lir huku nsana\r\nkuja unione hapa....', 'Feeds, Suppliments and Seeds', '0724540039', 'Oyugis', '387545.png', 'Manu El', 0, '205659.jpg', '2017-04-04 20:58:55', ''),
(42, 'Kifaranga', 'ksh 548', 'yule msee ako lir huku nsana\r\nkuja unione hapa....', 'Feeds, Suppliments and Seeds', '0724540039', 'Oyugis', '818175.png', 'Manu El', 0, '205659.jpg', '2017-04-04 20:58:58', ''),
(43, 'Kifaranga', 'ksh 548', 'yule msee ako lir huku nsana\r\nkuja unione hapa....', 'Feeds, Suppliments and Seeds', '0724540039', 'Oyugis', '226269.png', 'Manu El', 0, '205659.jpg', '2017-04-04 20:59:02', ''),
(44, 'Kifaranga', 'ksh 548', 'yule msee ako lir huku nsana\r\nkuja unione hapa....', 'Feeds, Suppliments and Seeds', '0724540039', 'Oyugis', '627875.png', 'Manu El', 0, '205659.jpg', '2017-04-04 20:59:05', ''),
(45, 'Kifaranga', 'ksh 548', 'yule msee ako lir huku nsana\r\nkuja unione hapa....', 'Feeds, Suppliments and Seeds', '0724540039', 'Oyugis', '743513.png', 'Manu El', 0, '205659.jpg', '2017-04-04 20:59:08', ''),
(46, 'Kifaranga', 'ksh 548', 'yule msee ako lir huku nsana\r\nkuja unione hapa....', 'Feeds, Suppliments and Seeds', '0724540039', 'Oyugis', '720007.png', 'Manu El', 0, '205659.jpg', '2017-04-04 20:59:11', ''),
(47, 'Kifaranga', 'ksh 548', 'yule msee ako lir huku nsana\r\nkuja unione hapa....', 'Feeds, Suppliments and Seeds', '0724540039', 'Oyugis', '327608.png', 'Manu El', 0, '205659.jpg', '2017-04-04 20:59:15', ''),
(48, 'Kifaranga', 'ksh 548', 'yule msee ako lir huku nsana\r\nkuja unione hapa....', 'Feeds, Suppliments and Seeds', '0724540039', 'Oyugis', '247762.png', 'Manu El', 0, '205659.jpg', '2017-04-04 20:59:18', ''),
(49, 'Kifaranga', 'ksh 548', 'yule msee ako lir huku nsana\r\nkuja unione hapa....', 'Feeds, Suppliments and Seeds', '0724540039', 'Oyugis', '582419.png', 'Manu El', 0, '205659.jpg', '2017-04-04 20:59:22', ''),
(50, 'kibuyu', 'free', '<p>this is</p>\r\n\r\n<h1>very true. <strong>try i</strong>t</h1>', 'Feeds, Suppliments and Seeds', '0724540039', 'kitui', '657082.png', 'Manu El', 0, '205659.jpg', '2017-04-08 18:27:07', ''),
(53, 'chips kuku', '250', '<p>hii ni tamu walahi</p>\r\n\r\n<p>ask around</p>\r\n\r\n<p>ata watu wa KFC wanapiga order kwangu</p>\r\n\r\n<p>ulizia ninja wa kuku</p>', 'Farm Produce', '0712103837', 'kejani', '969090.jpg', 'Dennis Seroney', 0, '', '2017-04-24 16:12:35', ''),
(54, 'Kuku Boilo', '600', '<p>ttht tyuumndfgh fghjk&nbsp; fdghj hj qwetfg ghj gtyu</p>', 'Farm Machinery and Tools', '0724540039', 'Kitui', '370761.jpg', 'Manu El', 0, '205659.jpg', '2017-05-02 11:49:46', ''),
(56, 'Fisi Tibim aww', '500', 'this is full', 'Feeds, Suppliments and Seeds', '0724540039', 'Nairobi', '891438.jpg', 'Manu El', 1, '205659.jpg', '2017-06-06 22:14:16', '1'),
(57, 'try', '67', 'fghj fgh ui', 'Feeds, Suppliments and Seeds', '0724540039', 'kidii', '833741.jpg', 'Manu El', 1, '205659.jpg', '2017-06-06 21:50:42', '1');

-- --------------------------------------------------------

--
-- Table structure for table `message_fav`
--

CREATE TABLE `message_fav` (
  `ID` int(11) NOT NULL,
  `postID` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `favourite` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message_fav`
--

INSERT INTO `message_fav` (`ID`, `postID`, `email`, `favourite`) VALUES
(3, '16', 'emashmagak@gmail.com', '0'),
(5, '14', 'emashmagak@gmail.com', '1'),
(6, '17', 'emashmagak@gmail.com', '1'),
(7, '19', 'emashmagak@live.com', '1'),
(8, '19', 'emashmagak@gmail.com', '0'),
(9, '2', 'emashmagak@gmail.com', '1');

-- --------------------------------------------------------

--
-- Table structure for table `message_posts`
--

CREATE TABLE `message_posts` (
  `ID` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL,
  `cartegory` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `userName` varchar(100) NOT NULL,
  `userEmail` varchar(100) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `userpic` varchar(100) NOT NULL,
  `timer` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message_posts`
--

INSERT INTO `message_posts` (`ID`, `title`, `description`, `cartegory`, `phone`, `userName`, `userEmail`, `photo`, `userpic`, `timer`) VALUES
(2, 'Kisii Hill gth', 'fghjkl', 'Feeds, Suppliments and Seeds', '0724540039', 'Magak Emmanuel', 'emashmagak@live.com', '640978.jpg', '584309.jpg', '2017-06-06 14:37:13');

-- --------------------------------------------------------

--
-- Table structure for table `product_fav`
--

CREATE TABLE `product_fav` (
  `ID` int(11) NOT NULL,
  `postID` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `favourite` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_fav`
--

INSERT INTO `product_fav` (`ID`, `postID`, `email`, `favourite`) VALUES
(2, '49', 'emashmagak@gmail.com', '0'),
(3, '50', 'emashmagak@gmail.com', '1'),
(4, '47', 'emashmagak@gmail.com', '1'),
(5, '50', 'john@mail.com', '1'),
(6, '42', 'emashmagak@gmail.com', '1'),
(7, '8', 'emashmagak@gmail.com', '1'),
(8, '45', 'emashmagak@gmail.com', '0'),
(9, '56', 'emashmagak@gmail.com', '1');

-- --------------------------------------------------------

--
-- Table structure for table `sent_messages`
--

CREATE TABLE `sent_messages` (
  `ID` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `senderEmail` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `message` longtext NOT NULL,
  `postID` varchar(100) NOT NULL,
  `receiverEmail` varchar(100) NOT NULL,
  `status` varchar(10) NOT NULL,
  `timer` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sent_messages`
--

INSERT INTO `sent_messages` (`ID`, `name`, `senderEmail`, `phone`, `message`, `postID`, `receiverEmail`, `status`, `timer`) VALUES
(1, 'Manu El', 'emashmagak@gmail.com', '0724540039', 'trial messo', '49', 'Manu El', '', '2017-04-10 21:30:57'),
(2, 'Manu El', 'emashmagak@gmail.com', '0724540039', 'this is true', '49', 'Manu El', 'read', '2017-05-18 09:47:38'),
(3, 'Manu El', 'emashmagak@gmail.com', '0724540039', 'this is true', '49', 'Manu El', 'read', '2017-04-21 17:29:53'),
(4, 'Siali Gibs', 'silali@gmail.com', '0704700155', 'this is the niggah', '49', 'Manu El', 'read', '2017-04-21 17:26:06'),
(5, 'Manu El', 'emashmagak@gmail.com', '0724540039', 'true dat', '49', 'Manu El', 'read', '2017-05-18 09:46:47'),
(6, 'Manu El', 'emashmagak@gmail.com', '0724540039', 'message here...', '49', 'Manu El', 'read', '2017-05-18 09:31:36'),
(7, 'Silali Gibson', 'gibson@mail.com', '56778687678886', 'stupid product', '49', 'Manu El', 'read', '2017-05-17 15:49:58'),
(8, 'Manu El', 'emashmagak@gmail.com', '0724540039', 'Stuff blah blah bl;ah', '51', 'Silali Gibson', 'unread', '2017-04-12 09:36:38'),
(9, 'Manu El', 'emashmagak@gmail.com', '0724540039', 'jik', '51', 'Silali Gibson', 'unread', '2017-04-12 09:36:46'),
(10, 'John', 'john@mail.com', '989008908908', 'gfdjhgfdkhfdkjf', '51', 'Silali Gibson', 'unread', '2017-04-12 09:38:34'),
(11, 'Silali', 'silali@mail.com', '43546565656', 'fgfgfhgf', '50', 'Manu El', 'read', '2017-04-21 16:55:01'),
(12, 'Sgfhgfh', 'fdgf@mil.dfdf', '4354678', 'gfdhfgjhgkjgh', '52', 'Silali Gibson', 'unread', '2017-04-12 10:31:44'),
(13, 'Manu El', 'emashmagak@gmail.com', '0724540039', 'send this', '50', 'Manu El', 'read', '2017-04-21 16:54:56'),
(14, 'Magak Emmanuel', 'emashmagak@live.com', '0724540039', 'vipi nugui', '50', 'Manu El', 'read', '2017-05-17 15:49:27'),
(15, 'Magak Emmanuel', 'emashmagak@live.com', '0724540039', 'holla\r\n', '49', 'Manu El', 'read', '2017-05-17 15:49:06'),
(16, 'Dennis Seroney', 'dennisseroney@yahoo.com', '0712103837', 'kuku mbili bro', '53', 'Dennis Seroney', 'read', '2017-04-24 16:13:43'),
(17, 'John', 'john@mail.com', '0712103837', 'sadfghjk', '58', 'John', 'read', '2017-05-02 13:01:34'),
(18, 'John', 'john@mail.com', '0712103837', 'afghjk', '57', 'John', 'read', '2017-05-02 13:03:12'),
(19, 'Manu El', 'emashmagak@gmail.com', '0724540039', 'nataka\r\n', '58', 'John', 'unread', '2017-05-18 09:31:14'),
(20, 'Manu El', 'emashmagak@gmail.com', '0724540039', 'real', '49', 'Manu El', 'read', '2017-06-02 08:27:18'),
(21, 'Manu El', 'emashmagak@gmail.com', '0724540039', 'naji message', '49', 'Manu El', 'read', '2017-06-02 13:47:33'),
(22, 'Manu El', 'emashmagak@gmail.com', '0724540039', 'ert ety', '47', 'Manu El', 'read', '2017-06-06 22:19:30');

-- --------------------------------------------------------

--
-- Table structure for table `sent_messages_cons`
--

CREATE TABLE `sent_messages_cons` (
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sent_messages_cons`
--

INSERT INTO `sent_messages_cons` (`ID`, `name`, `senderEmail`, `phone`, `message`, `postID`, `receiverEmail`, `cartegory`, `status`, `timer`) VALUES
(1, 'Manu El', 'emashmagak@gmail.com', '0724540039', '', '16', 'Magak Emmanuel', '', 'read', '2017-04-21 17:32:12'),
(2, 'Manu El', 'emashmagak@gmail.com', '0724540039', '', '16', 'Magak Emmanuel', '', 'read', '2017-04-24 15:54:56'),
(3, 'Manu El', 'emashmagak@gmail.com', '0724540039', '', '16', 'Magak Emmanuel', '', 'read', '2017-04-21 17:26:58'),
(4, 'Manu El', 'emashmagak@gmail.com', '0724540039', 'tester', '16', 'Magak Emmanuel', '', 'read', '2017-04-21 17:40:56'),
(5, 'Magak Emmanuel', 'emashmagak@live.com', '0724540039', 'ask a question', '19', 'Magak Emmanuel', '', 'read', '2017-05-18 13:22:39');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `ID` int(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `pass` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`ID`, `email`, `pass`) VALUES
(1, 'emashmagak@appslab.co.ke', 'mlab.,.,');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_consultants`
--

CREATE TABLE `tbl_consultants` (
  `ID` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `pass` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_consultants`
--

INSERT INTO `tbl_consultants` (`ID`, `name`, `email`, `phone`, `photo`, `pass`) VALUES
(1, 'Magak Emmanuel', 'emashmagak@live.com', '0724540039', '584309.jpg', '2b385e6093aa32e2a6da96353658c1ab');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_farmers`
--

CREATE TABLE `tbl_farmers` (
  `ID` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `pass` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(7, 'Silali Gibson', 'gibson@mail.com', '56778687678886', '', 'db442f230d3deca58e3f481f3338381b'),
(8, 'Dennis Seroney', 'dennisseroney@yahoo.com', '0712103837', '', '29ea5826fae0475ac770806e3337c315'),
(9, 'Sammy Kosgey', 'sammy@gmail.com', '0712121212', '', '6132a0be89e2fe074e19f9dacf487412'),
(10, 'John', 'john@mail.com', '0712103837', '948799.jpg', '59530efe0732fded24139374563b0e83'),
(11, 'Ule msee', 'msee@mail.com', '837895465', '', 'db442f230d3deca58e3f481f3338381b');

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
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `photo` (`photo`);

--
-- Indexes for table `message_fav`
--
ALTER TABLE `message_fav`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `message_posts`
--
ALTER TABLE `message_posts`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `photo` (`photo`);

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
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `tbl_farmers`
--
ALTER TABLE `tbl_farmers`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment_posts`
--
ALTER TABLE `comment_posts`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
--
-- AUTO_INCREMENT for table `farmer_posts`
--
ALTER TABLE `farmer_posts`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
--
-- AUTO_INCREMENT for table `message_fav`
--
ALTER TABLE `message_fav`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `message_posts`
--
ALTER TABLE `message_posts`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `product_fav`
--
ALTER TABLE `product_fav`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `sent_messages`
--
ALTER TABLE `sent_messages`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `sent_messages_cons`
--
ALTER TABLE `sent_messages_cons`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_consultants`
--
ALTER TABLE `tbl_consultants`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_farmers`
--
ALTER TABLE `tbl_farmers`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
