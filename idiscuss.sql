-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 08, 2021 at 07:13 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `idiscuss`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `categories_id` int(11) NOT NULL,
  `categories_name` varchar(255) NOT NULL,
  `categories_discription` varchar(255) NOT NULL,
  `categories_img` varchar(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categories_id`, `categories_name`, `categories_discription`, `categories_img`, `created`) VALUES
(1, 'Python', 'Python is an interpreted high-level general-purpose programming language. Python\'s design philosophy emphasizes code readability with its notable use of significant indentation.', 'scroll1.png', '2021-06-15 12:10:37'),
(2, 'Java', 'Java is a high-level, class-based, object-oriented programming language that is designed to have as few implementation dependencies as possible.', 'scroll3.png', '2021-06-15 12:10:56'),
(3, 'pHp', 'php is a backend framework. php is easy and use backend lanuage and it is the most powerfull language and mostly user language in backend.', 'social.jpeg', '2021-06-15 19:15:04'),
(4, 'Flask', 'Flask is a micro web framework written in Python. It is classified as a microframework because it does not require particular tools or libraries. It has no database abstraction layer, form validation, or any other components where pre-existing third-party', 'social.jpeg', '2021-06-18 22:26:02'),
(5, 'Django', 'Django is a Python-based free and open-source web framework that follows the model–template–views architectural pattern. It is maintained by the Django Software Foundation, an American independent organization established as a 501 non-profit.', 'scroll1.png', '2021-06-18 22:26:47');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `comment_content` text NOT NULL,
  `thread_id` int(8) NOT NULL,
  `common_time` datetime NOT NULL DEFAULT current_timestamp(),
  `comment_by` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_content`, `thread_id`, `common_time`, `comment_by`) VALUES
(1, 'Django is backend framework of python', 1, '2021-06-18 22:21:52', '1'),
(2, 'Sagar is a full stack developer', 2, '2021-06-18 22:23:06', '2'),
(3, 'mostly used in android development', 3, '2021-06-18 22:24:17', '2'),
(4, 'yes', 4, '2021-06-18 22:27:35', '2'),
(5, 'yes  ', 6, '2021-06-19 01:07:41', '2'),
(6, 'yes sagar is a software engineer', 2, '2021-06-19 01:20:43', '2'),
(7, 'from flask import Flask', 21, '2021-06-19 22:31:17', '3'),
(8, 'sdcnjkdj', 22, '2021-06-20 02:02:13', '4'),
(9, 'sndbchjbdv\r\n', 23, '2021-06-29 13:30:27', '2'),
(10, 'aldkcncajnsojcoqnfqih', 24, '2021-07-08 19:44:48', '5');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `sno` int(11) NOT NULL,
  `user_fname` text NOT NULL,
  `user_lname` text NOT NULL,
  `email` varchar(45) NOT NULL,
  `subject` text NOT NULL,
  `message` text NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`sno`, `user_fname`, `user_lname`, `email`, `subject`, `message`, `date`) VALUES
(1, 'Sagar', 'Singh', 'Sagarsi0202@gmail.com', 'General', 'which language to use in this forum', '2021-06-19 23:34:18'),
(2, 'q', 'q', 'q', 'q', 'q', '2021-06-19 23:48:46'),
(3, 'q', 'q', 'q', 'q', 'q', '2021-06-19 23:49:05'),
(4, 'q', 'q', 'q', 'q', 'q', '2021-06-19 23:49:16'),
(5, 'q', 'q', 'q', 'q', 'q', '2021-06-19 23:52:03'),
(6, 'q', 'q', 'q', 'q', 'q', '2021-06-20 00:01:22'),
(7, 'q', 'q', 'q', 'q', 'q', '2021-06-20 00:02:06'),
(8, 'q', 'q', 'qq', 'q', 'q', '2021-06-20 00:15:14'),
(9, 'q', 'q', 'q', 'q', 'q', '2021-06-20 00:16:12');

-- --------------------------------------------------------

--
-- Table structure for table `threads`
--

CREATE TABLE `threads` (
  `thread_id` int(10) NOT NULL,
  `thread_title` varchar(255) NOT NULL,
  `thread_desc` text NOT NULL,
  `thread_cat_id` int(7) NOT NULL,
  `thread_user_id` int(7) NOT NULL,
  `thread_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `threads`
--

INSERT INTO `threads` (`thread_id`, `thread_title`, `thread_desc`, `thread_cat_id`, `thread_user_id`, `thread_time`) VALUES
(1, 'Django', 'Django is good', 1, 1, '2021-06-18 22:20:30'),
(2, 'Sagar Singh', 'Sagar is a web developer', 1, 1, '2021-06-18 22:21:23'),
(3, 'java ', 'java is a backend language in web development', 2, 2, '2021-06-18 22:24:00'),
(4, 'Django', 'django is python framework', 5, 2, '2021-06-18 22:27:26'),
(5, 'java language', 'java is a backend language', 2, 2, '2021-06-19 01:06:21'),
(6, 'python vs java', 'python is most use in web development but java in android development', 2, 2, '2021-06-19 01:07:01'),
(7, 'java forum', 'This is peer to peer this forums for sharing knowledge with each other. NoSpam / Advertising / Self-promote in the forums.Do not post copyright-infringing material.Do not post “offensive” posts, links or images.\r\n\r\n\r\n', 2, 2, '2021-06-19 01:40:15'),
(8, 'java forum', 'This is peer to peer this forums for sharing knowledge with each other. NoSpam / Advertising / Self-promote in the forums.Do not post copyright-infringing material.Do not post “offensive” posts, links or images.\r\n\r\n\r\n', 2, 2, '2021-06-19 01:40:31'),
(9, 'php forum', 'php is a backend framework. php is easy and use backend lanuage and it is the most powerfull language and mostly user language in backend.\r\n\r\n', 3, 2, '2021-06-19 01:41:45'),
(10, 'Sagar Singh', 'php is a backend framework. php is easy and use backend lanuage and it is the most powerfull language and mostly user language in backend.\r\n\r\n', 3, 2, '2021-06-19 01:41:50'),
(11, 'Angular Episode', 'php is a backend framework. php is easy and use backend lanuage and it is the most powerfull language and mostly user language in backend.\r\n\r\n', 3, 2, '2021-06-19 01:41:55'),
(12, '&ltscript&gtalert(\"Hello\");&ltscript&gt', 'php is a backend framework. php is easy and use backend lanuage and it is the most powerfull language and mostly user language in backend.\r\n\r\n', 3, 2, '2021-06-19 01:42:03'),
(13, 'Django', 'php is a backend framework. php is easy and use backend lanuage and it is the most powerfull language and mostly user language in backend.\r\n\r\n', 3, 2, '2021-06-19 01:42:10'),
(14, '&ltscript&gtalert(\"Hello\");&ltscript&gt', 'php is a backend framework. php is easy and use backend lanuage and it is the most powerfull language and mostly user language in backend.\r\n', 3, 2, '2021-06-19 01:42:22'),
(15, 'Sagar Singh', 'python developer are getting highest job', 1, 2, '2021-06-19 01:43:03'),
(16, '&ltscript&gtalert(\"Hello\");&ltscript&gt', 'php is a backend framework. php is easy and use backend lanuage and it is the most powerfull language and mostly user language in backend.\r\n\r\n', 1, 2, '2021-06-19 01:43:12'),
(17, 'Django', 'php is a backend framework. php is easy and use backend lanuage and it is the most powerfull language and mostly user language in backend.\r\n\r\n', 1, 2, '2021-06-19 01:43:20'),
(18, 'Sagar Singh', 'python developer are getting highest job', 1, 2, '2021-06-19 01:43:29'),
(19, 'hey ho ja n bhai', 'ho ja ylllq presaan kr rha hai', 0, 2, '2021-06-19 02:39:48'),
(20, 'hey ho ja n bhai', 'ho ja ylllq presaan kr rha hai', 1, 2, '2021-06-19 02:40:07'),
(21, 'how to import flask', 'please help me how to import flask in pycharm', 4, 3, '2021-06-19 22:31:00'),
(22, 'sbcjhbd', 'nsojavnorjrhuh urhgoihrwigohqroigjhwiprvj', 2, 4, '2021-06-20 02:02:07'),
(23, 'heyqq sndnvsa', 'sdan vkjsfnvjkv fvk vkjsdabvjbv  cvcdnvdajov', 5, 2, '2021-06-29 13:30:20'),
(24, 'snclkn', 'admdak;vmdkvpwk,c;ldmp  dc vclkadnvjo', 4, 5, '2021-07-08 19:44:41');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_sno` int(11) NOT NULL,
  `user_email` varchar(35) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `user_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_sno`, `user_email`, `user_pass`, `user_date`) VALUES
(1, 'sagarsi0202@gmail.com', '$2y$10$02t9OYn1a4kqf80oBoG.6ui7z2SmVgA.ysX3NdtoOyZZRiFvyuknS', '2021-06-18 22:17:50'),
(2, 'sagarsi5353@gmail.com', '$2y$10$nHNKPyQYG1QGhzwWXYLyEOvlIt16bY.QfEzqYnJRMhgTfUVygps1K', '2021-06-18 22:22:25'),
(3, 'sagar@sagar.com', '$2y$10$pS5fgQDqa/byC4bQ7vMYtuhtdOcI.8FXJ6hGS089c0J0.OkYCo2jm', '2021-06-19 22:29:43'),
(4, 'sagarsi786@gmail.com', '$2y$10$ZS3.Zv3.3FFlkEQ25F1uzeS9YqzqTbjoV0Ws4Bzgraz7SogA6AWw2', '2021-06-20 02:01:43'),
(5, 'nilesh@nilesh.com', '$2y$10$QnNG98Y0ilvbxUwi/SnVHuVo1C9/0iOrc05ZtqE4TlDty2OaIWRAO', '2021-07-08 19:44:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categories_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `threads`
--
ALTER TABLE `threads`
  ADD PRIMARY KEY (`thread_id`);
ALTER TABLE `threads` ADD FULLTEXT KEY `thread_title` (`thread_title`,`thread_desc`);
ALTER TABLE `threads` ADD FULLTEXT KEY `thread_title_2` (`thread_title`,`thread_desc`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_sno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `categories_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `threads`
--
ALTER TABLE `threads`
  MODIFY `thread_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
