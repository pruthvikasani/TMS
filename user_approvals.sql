-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2019 at 06:18 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `user_approvals`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `firstname` text NOT NULL,
  `lastname` text NOT NULL,
  `email` text NOT NULL,
  `type` text NOT NULL,
  `password` text NOT NULL,
  `designation` text NOT NULL,
  `institute` text NOT NULL,
  `expertise` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `firstname`, `lastname`, `email`, `type`, `password`, `designation`, `institute`, `expertise`) VALUES
(1, 'Pruthvi', 'Kasani', 'admin@website.com', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'CEO', 'IIT M', 'Mobile Tech'),
(2, 'Pruthvi Sai', 'Kasani', 'pkasani1@gmail.com', 'user', '14d6273036cd421133b7115e3ca57a96', 'CEO', 'IIITDM Kancheepuram', 'Mobile Tech'),
(3, 'Leela', 'Pallem', 'leela@gmail.com', 'user', '06d778aa57cb002fe849bf880324d2ad', 'CEO', 'IIT M', 'Android'),
(4, 'Prasad', 'Kasani', 'prasad@gmail.com', 'user', 'c246ad314ab52745b71bb00f4608c82a', 'CEO', 'IIITDM Kancheepuram', 'Electronics'),
(5, 'Shanmukha', 'Pasumarthy', 'shanmukha@gmail.com', 'user', '0fd5006e92c00efa7f0487a4062602f0', 'CEO', 'IIIT', 'Mobile'),
(6, 'Harsha', 'Bangi', 'harsha@gmail.com', 'user', '226280c5dd9b1bd4e67c72ff2c94bf1b', 'CEO', 'IIT M', 'Embedded systems'),
(7, 'Leela', 'Krish', 'leelakrishna@gmal.com', 'user', '831379822843b73bac4216ece643c3b6', 'CEO', 'IIT', 'Tech'),
(8, 'Nikhila', 'Pinniti', 'nikhila@gmail.com', 'user', '9804c8d40072c5bb05f2248bd6caa71d', 'CEO', 'IIITDM Kancheepuram', 'Mobile'),
(10, 'Prabanj', 'Selvaraj', 'prabanj@gmail.com', 'user', 'f624b1d0c709117fc952e656df760e20', 'CEO', 'PSG Tech', 'Embedded Systems'),
(11, 'Maitreya', 'Rayabaram', 'maitreya@gmail.com', 'user', '00fb7a062261da0c11bcd9cd2074f134', 'CEO', 'NIT Trichy', 'Automobile'),
(12, 'Vaibhav', 'Koneti', 'vaibhav@gmail.com', 'user', '310a87565a48526e9d096f917007dbfe', 'CEO', 'IIITDM ', 'Mobile Tech'),
(13, 'Thouseeth', 'Ahamed', 'thouseeth.ia@gmail.com', 'user', '1deabae0ed553012f63a63f5ecd06c33', 'CEO', 'Titan', 'TATA'),
(14, 'Sakshi', 'Mahajan', 'sakshi@gmail.com', 'user', 'b31e31dac8811d89bb1cbfc384414aaf', 'CEO', 'IIITDM Kancheepuram', 'Tech'),
(15, 'Shanmukh', 'Krishn', 'shanmukh@gmail.com', 'user', '1697a726e2694945147fccd5bc268988', 'CEO', 'VIT Chennai', 'Cloud Computing'),
(16, 'HARSHITHA', 'REDDY', 'srihanu08@gmail.com', 'user', 'c873ed862d2ab9f7f8e1271df425f61a', 'CEO', 'unknown', 'hahaha'),
(17, 'Vaibhav', 'Koneti', 'vaibhav@gmail.com', 'user', '310a87565a48526e9d096f917007dbfe', 'CEO', 'IIIT Kancheepuram', 'Embedded Systems'),
(18, 'Harsha', 'Leela', 'harsha@gmail.com', 'user', '226280c5dd9b1bd4e67c72ff2c94bf1b', 'CEO', 'IIT Delhi', 'Embedded Systems');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `comment_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `userid`, `pid`, `name`, `comment`, `comment_date`) VALUES
(17, 2, 5, 'Pruthvi Sai Kasani', 'Cool', '2019-05-17 17:00:14'),
(18, 2, 6, 'Pruthvi Sai Kasani', 'Cool', '2019-05-27 09:36:50');

-- --------------------------------------------------------

--
-- Table structure for table `edit_content`
--

CREATE TABLE `edit_content` (
  `userid` varchar(50) NOT NULL,
  `pushpull` varchar(2000) NOT NULL,
  `voiceoftech` varchar(2000) NOT NULL,
  `functional` varchar(2000) NOT NULL,
  `resource` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `edit_content`
--

INSERT INTO `edit_content` (`userid`, `pushpull`, `voiceoftech`, `functional`, `resource`) VALUES
('1', 'Address how we get to know the research work carried out by the experts in the forum for a different application be useful to us and mapping the potential possibilities of horizontally deploying them. Also, Expert who has developed the technology posts it in the discussion forum and we get to hear various applications for the same from people in the forum', 'It will examine how to bridge the awareness gaps between recent innovations/researches and our knowledge on the same. Posting the recent technology that we come across and debating on the various aspects of it.', 'It will provide knowledge transfer from experts on varied topics for industry experts who are busy in regular schedules (from managers to our shop floor employees)', 'It will help our group companies to identify the right candidate for various roles. Also, lab and testing facility identification becomes handly.');

-- --------------------------------------------------------

--
-- Table structure for table `likeunlike_comment`
--

CREATE TABLE `likeunlike_comment` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `commentid` int(11) NOT NULL,
  `type` int(2) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `likeunlike_comment`
--

INSERT INTO `likeunlike_comment` (`id`, `userid`, `commentid`, `type`, `timestamp`) VALUES
(24, 2, 17, 1, '2019-05-17 11:30:17'),
(25, 2, 6, 0, '2019-05-27 04:06:39');

-- --------------------------------------------------------

--
-- Table structure for table `like_unlike`
--

CREATE TABLE `like_unlike` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `postid` int(11) NOT NULL,
  `type` int(2) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `like_unlike`
--

INSERT INTO `like_unlike` (`id`, `userid`, `postid`, `type`, `timestamp`) VALUES
(1, 2, 5, 0, '2019-05-23 09:55:05'),
(2, 2, 6, 0, '2019-05-27 04:06:39'),
(3, 2, 9, 0, '2019-05-29 05:48:59'),
(4, 2, 8, 0, '2019-05-29 05:49:54'),
(5, 2, 7, 1, '2019-05-29 06:00:19');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `image` text NOT NULL,
  `bookmark` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `userid`, `title`, `content`, `image`, `bookmark`, `timestamp`) VALUES
(2, 4, 'Football', 'I would love playing it in style', '', 0, '2019-02-07 12:20:32'),
(5, 6, 'Baseball', 'There are some interesting facts about this Game.', '', 0, '2019-02-11 04:34:15'),
(6, 2, 'Great', 'What do you like in this?', 'postpic/2', 0, '2019-05-27 04:06:22'),
(7, 2, 'Good ', 'Great\r\n', 'postpic/2', 0, '2019-05-27 04:54:23'),
(8, 1, 'Great', 'Nice work', 'postpic/1', 0, '2019-05-28 07:08:33'),
(9, 2, 'vs', 'dwf', 'postpic/2', 0, '2019-05-28 10:41:18'),
(10, 2, '', '', 'postpic/2', 0, '2019-05-29 09:40:46');

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `id` int(11) NOT NULL,
  `profilepic` varchar(500) NOT NULL,
  `aboutme` text NOT NULL,
  `fblink` text NOT NULL,
  `gitlink` text NOT NULL,
  `twitterlink` text NOT NULL,
  `pinlink` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`id`, `profilepic`, `aboutme`, `fblink`, `gitlink`, `twitterlink`, `pinlink`) VALUES
(2, 'propic/2IMG_20180623_083459.jpg', 'Undergrad in IIIT', '', '', '', ''),
(3, '', '', 'HEllo', '', '', ''),
(4, '', '', '', '', '', ''),
(5, '', '', '', '', '', ''),
(6, '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `pushpull`
--

CREATE TABLE `pushpull` (
  `id` int(11) NOT NULL,
  `userid` varchar(1000) NOT NULL,
  `title` varchar(1000) NOT NULL,
  `univname` varchar(1000) NOT NULL,
  `forum` varchar(1000) NOT NULL,
  `relevant` varchar(1000) NOT NULL,
  `wherehow` varchar(1000) NOT NULL,
  `paper_location` varchar(1000) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pushpull`
--

INSERT INTO `pushpull` (`id`, `userid`, `title`, `univname`, `forum`, `relevant`, `wherehow`, `paper_location`, `timestamp`) VALUES
(15, '2', 'Pruthvi', 'aadc', 'csdc', 'adcd', 'cad', 'pushpull_papers/Pruthvi Sai_Bonafide_Pruthvi.pdf', '2019-05-29 11:09:25');

-- --------------------------------------------------------

--
-- Table structure for table `resource_post`
--

CREATE TABLE `resource_post` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `title` varchar(1000) NOT NULL,
  `content` varchar(1000) NOT NULL,
  `bookmark` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_requests`
--

CREATE TABLE `user_requests` (
  `id` int(11) NOT NULL,
  `firstname` text NOT NULL,
  `lastname` text NOT NULL,
  `email` text NOT NULL,
  `password` varchar(300) NOT NULL,
  `message` varchar(500) NOT NULL,
  `designation` text NOT NULL,
  `profile` text NOT NULL,
  `institute` text NOT NULL,
  `expetise` text NOT NULL,
  `experience` int(11) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_requests`
--

INSERT INTO `user_requests` (`id`, `firstname`, `lastname`, `email`, `password`, `message`, `designation`, `profile`, `institute`, `expetise`, `experience`, `date`) VALUES
(2, 'Sakshi', 'Hasa', 'sakshi@gmail.com', 'b31e31dac8811d89bb1cbfc384414aaf', 'Like to contribute', 'CEO', 'link', 'NIT Trichy', 'Mechanics', 5, '2019-05-27 22:42:27'),
(3, 'Prasad', 'Kasani', 'prasad@gmail.com', 'c246ad314ab52745b71bb00f4608c82a', 'Like to take part', 'CEO', 'link', 'BITS Pilani', 'Material Science', 6, '2019-05-27 22:45:20'),
(4, 'ede', 'ac', 'cac', '712ad68b518fb2820aa68e3746035236', 'cae', 'CEO', 'CandidateHallTicket_English.pdf', 'cac', 'cewe', 3, '2019-05-29 16:46:08');

-- --------------------------------------------------------

--
-- Table structure for table `voiceoftech`
--

CREATE TABLE `voiceoftech` (
  `id` int(11) NOT NULL,
  `userid` varchar(100) NOT NULL,
  `title` varchar(1000) NOT NULL,
  `relevancy` varchar(1000) NOT NULL,
  `business` varchar(1000) NOT NULL,
  `invention` varchar(1000) NOT NULL,
  `public` varchar(100) NOT NULL,
  `location` varchar(1000) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `voiceoftech`
--

INSERT INTO `voiceoftech` (`id`, `userid`, `title`, `relevancy`, `business`, `invention`, `public`, `location`, `timestamp`) VALUES
(1, '2', 'test', 'test', 'test', 'test', 'test', '', '2019-05-26 18:09:01'),
(2, '2', 'test', 'vssv', 'vsv', 'vsfv', 'svs', '', '2019-05-29 11:33:51'),
(3, '2', 'fewf', 'gdtgb', '', 'nfn', 'nfnfnnf', '', '2019-05-29 11:36:16'),
(4, '2', 'sqs', 'bgb', 'vee', 'vvfv', 'svsvcscs', 'voiceoftech_papers/Pruthvi Sai_Resume_Pruthvi.pdf', '2019-05-29 11:38:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `likeunlike_comment`
--
ALTER TABLE `likeunlike_comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `like_unlike`
--
ALTER TABLE `like_unlike`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pushpull`
--
ALTER TABLE `pushpull`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resource_post`
--
ALTER TABLE `resource_post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_requests`
--
ALTER TABLE `user_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `voiceoftech`
--
ALTER TABLE `voiceoftech`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `likeunlike_comment`
--
ALTER TABLE `likeunlike_comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `like_unlike`
--
ALTER TABLE `like_unlike`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pushpull`
--
ALTER TABLE `pushpull`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `resource_post`
--
ALTER TABLE `resource_post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_requests`
--
ALTER TABLE `user_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `voiceoftech`
--
ALTER TABLE `voiceoftech`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
