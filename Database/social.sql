-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Nov 28, 2018 at 05:29 AM
-- Server version: 5.7.23
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `social`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `comment_writer` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `post_id`, `user_id`, `comment`, `comment_writer`, `date`) VALUES
(1, 5, 1, 'Hello... How are you!!', '', '2018-11-25 07:13:47'),
(2, 5, 1, 'hi.. hru', 'Rohit Manhas', '2018-11-25 08:29:56'),
(3, 5, 1, 'hi.. hru', 'Rohit Manhas', '2018-11-25 08:30:00'),
(4, 5, 1, 'hi.. hru', 'Rohit Manhas', '2018-11-25 08:31:55'),
(5, 5, 1, 'hello', 'Harry Singh', '2018-11-25 11:44:48'),
(6, 5, 1, 'hello', 'Harry Singh', '2018-11-25 11:44:55'),
(7, 9, 2, 'Welcome!!', 'Rohit Manhas', '2018-11-27 03:29:21'),
(17, 9, 2, 'hello', 'Rohit Manhas', '2018-11-27 06:19:54'),
(18, 26, 1, 'Nice !!!', 'Mia', '2018-11-28 05:03:42'),
(19, 26, 1, 'Thank you!!!', 'Rohit Manhas', '2018-11-28 05:03:57');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `msg_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `sender` int(11) NOT NULL,
  `receiver` int(11) NOT NULL,
  `message` text NOT NULL,
  `reply` text NOT NULL,
  `status` text NOT NULL,
  `msg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`msg_id`, `user_id`, `sender`, `receiver`, `message`, `reply`, `status`, `msg_date`) VALUES
(5, 0, 2, 2, 'hello', 'no_reply', 'unread', '2018-11-27 22:31:09'),
(16, 1, 1, 22, 'Hi jasmine', 'no_reply', 'unread', '2018-11-28 05:25:30'),
(17, 5, 5, 1, 'Hello Rohit... Wassup..', 'no_reply', 'unread', '2018-11-28 05:25:46'),
(18, 5, 5, 6, 'Hello Modi Ji...', 'no_reply', 'unread', '2018-11-28 05:26:06'),
(19, 6, 6, 1, 'Hey Rohit...', 'no_reply', 'unread', '2018-11-28 05:26:27'),
(20, 6, 6, 5, 'Hello Obama Ji..\r\n', 'no_reply', 'unread', '2018-11-28 05:26:44');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `page_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `page_name` text NOT NULL,
  `page_content` text NOT NULL,
  `page_author` text NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`page_id`, `user_id`, `page_name`, `page_content`, `page_author`, `date_created`) VALUES
(1, 1, 'Test', 'Testing a page', 'Rohit Manhas', '2018-11-28 00:13:43'),
(3, 2, 'HTML Page', 'Hello Everyone!!!...', 'Harry Singh', '2018-11-28 00:49:56'),
(4, 1, 'My New Page', 'New Pages will be coming soon...', 'Rohit Manhas', '2018-11-28 05:05:22'),
(7, 19, 'Women Empowerment', 'Women’s Empowerment educates and empowers women, who are homeless, with the skills and confidence necessary to secure a job, create a healthy lifestyle, and regain a home for themselves and their children.\r\n\r\nLocated in Sacramento, CA, our mission was created by homeless women expressing their needs and a community coming together with a desire to end homelessness–for good.', 'Mia', '2018-11-28 05:06:33'),
(8, 6, 'India', 'India (IAST: Bhārat), also known as the Republic of India (IAST: Bhārat Gaṇarājya),[18][e] is a country in South Asia. It is the seventh-largest country by area, the second-most populous country (with over 1.2 billion people), and the most populous democracy in the world. Bounded by the Indian Ocean on the south, the Arabian Sea on the southwest, and the Bay of Bengal on the southeast, it shares land borders with Pakistan to the west;[f] China, Nepal, and Bhutan to the northeast; and Bangladesh and Myanmar to the east. In the Indian Ocean, India is in the vicinity of Sri Lanka and the Maldives, while its Andaman and Nicobar Islands share a maritime border with Thailand and Indonesia.', 'Narendra Modi', '2018-11-28 05:13:06'),
(9, 1, 'phpMyAdmin', 'phpMyAdmin is a free software tool written in PHP, intended to handle the administration of MySQL over the Web. phpMyAdmin supports a wide range of operations on MySQL and MariaDB. Frequently used operations (managing databases, tables, columns, relations, indexes, users, permissions, etc) can be performed via the user interface, while you still have the ability to directly execute any SQL statement.', 'Rohit Manhas', '2018-11-28 05:13:45'),
(10, 19, 'DBMS', 'A database is an organized collection of data, generally stored and accessed electronically from a computer system. Where databases are more complex they are often developed using formal design and modeling techniques.\r\n\r\nThe database management system (DBMS) is the software that interacts with end users, applications, the database itself to capture and analyze the data and provides facilities to administer the database. The sum total of the database, the DBMS and the associated applications can be referred to as a \"database system\". Often the term \"database\" is also used to loosely refer to any of the DBMS, the database system or an application associated with the database.', 'Mia', '2018-11-28 05:19:55'),
(11, 5, 'United States', 'The United States of America (USA), commonly known as the United States (U.S. or US) or America, is a country composed of 50 states, a federal district, five major self-governing territories, and various possessions.[fn 6] At 3.8 million square miles (9.8 million km2), the United States is the world\'s third- or fourth-largest country by total area[fn 7] and slightly smaller than the entire continent of Europe\'s 3.9 million square miles (10.1 million km2). With a population of over 325 million people, the U.S. is the third most populous country. The capital is Washington, D.C., and the largest city by population is New York City. Forty-eight states and the capital\'s federal district are contiguous in North America between Canada and Mexico. The State of Alaska is in the northwest corner of North America, bordered by Canada to the east and across the Bering Strait from Russia to the west. The State of Hawaii is an archipelago in the mid-Pacific Ocean. The U.S. territories are scattered about the Pacific Ocean and the Caribbean Sea, stretching across nine official time zones. The extremely diverse geography, climate, and wildlife of the United States make it one of the world\'s 17 megadiverse countries.', 'Barack Obama', '2018-11-28 05:22:42'),
(12, 6, 'Global Warming', 'Global warming is happening now. The planet\'s temperature is rising. The trend is clear and unmistakable.\r\n\r\nEvery one of the past 40 years has been warmer than the 20th century average. 2016 was the hottest year on record. The 12 warmest years on record have all occurred since 1998. \r\n\r\nGlobally, the average surface temperature has increased more than one degree Fahrenheit since the late 1800s. Most of that increase has occurred over just the past three decades.', 'Narendra Modi', '2018-11-28 05:23:45'),
(13, 1, 'Dallas City', 'Dallas (/ˈdæləs/) is a city in the U.S. state of Texas. With an estimated 2017 population of 1,341,075,[8] it is the ninth most-populous city in the U.S. and third in Texas after Houston and San Antonio. Dallas is the main core of the largest metropolitan area in the Southern United States and the largest inland metropolitan area in the U.S. that lacks any navigable link to the sea.It is the most populous city in the Dallas–Fort Worth metroplex, the fourth-largest metropolitan area in the country at 7.3 million people as of 2017.[11] Dallas is the seat of Dallas County. Sections of the city extend into Collin, Denton, Kaufman, and Rockwall counties.', 'Rohit Manhas', '2018-11-28 05:24:55');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_content` text NOT NULL,
  `post_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `user_id`, `post_content`, `post_date`) VALUES
(9, 2, 'Hello everyone this is my first post.', '2018-11-27 06:11:13'),
(17, 18, 'Whatever the mind of man can conceive and believe, it can achieve. –Napoleon Hill', '2018-11-28 04:56:09'),
(18, 18, 'Definiteness of purpose is the starting point of all achievement', '2018-11-28 04:56:44'),
(19, 1, 'Life is 10% what happens to me and 90% of how I react to it.', '2018-11-28 04:56:59'),
(20, 6, 'Every child is an artist.  The problem is how to remain an artist once he grows up. ', '2018-11-28 04:57:52'),
(21, 22, 'Ask and it will be given to you; search, and you will find; knock and the door will be opened for you.', '2018-11-28 04:59:57'),
(22, 1, 'You take your life in your own hands, and what happens? A terrible thing, no one to blame.', '2018-11-28 05:00:32'),
(23, 6, 'Our lives begin to end the day we become silent about things that matter. –Martin Luther King Jr.\r\n\r\n', '2018-11-28 05:00:44'),
(24, 22, ' Life is what we make it, always has been, always will be.', '2018-11-28 05:01:18'),
(25, 19, 'The only way to do great work is to love what you do. –Steve Jobs', '2018-11-28 05:02:50'),
(26, 1, 'When everything seems to be going against you, remember that the airplane takes off against the wind, not with it. ', '2018-11-28 05:03:18');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_pass` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_country` varchar(100) NOT NULL,
  `user_gender` varchar(100) NOT NULL,
  `user_b_day` date NOT NULL,
  `user_image` text NOT NULL,
  `register_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `last_login` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` text NOT NULL,
  `posts` text NOT NULL,
  `page` text NOT NULL,
  `today_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_pass`, `user_email`, `user_country`, `user_gender`, `user_b_day`, `user_image`, `register_date`, `last_login`, `status`, `posts`, `page`, `today_date`) VALUES
(1, 'Rohit Manhas', 'password', 'rohit@gmail.com', 'India', 'Male', '1991-07-28', 'IMG_4124.JPG', '2018-11-18 06:00:00', '2018-11-18 06:00:00', 'unverified', 'yes', 'yes', '2018-11-22'),
(2, 'Harry Singh', '12345678', 'harry@gmail.com', 'United States', 'Male', '1993-01-03', 'harry.jpg', '2025-11-18 06:00:00', '2025-11-18 06:00:00', 'unverified', 'yes', 'yes', '2025-11-18'),
(5, 'Barack Obama', '11223344', 'obama@gmail.com', 'United States', 'Male', '1961-08-04', 'Obama.jpg', '2018-11-28 05:22:42', '2028-11-18 06:00:00', 'unverified', 'No', 'yes', '2028-11-18'),
(6, 'Narendra Modi', 'password', 'modi@gmail.com', 'India', 'Male', '1950-09-17', 'modi.jpg', '2018-11-28 05:13:06', '2018-11-28 04:05:44', 'unverified', 'yes', 'yes', '2028-11-18'),
(7, 'Ajay Singh', 'password', 'ajay@gmail.com', 'UAE', 'Male', '1997-02-06', 'ajay.jpg', '2018-11-28 04:46:18', '2018-11-28 04:14:25', 'unverified', 'No', 'No', '2028-11-18'),
(8, 'Rajat Kumar', '12345678', 'rajat@gmail.com', 'India', 'Male', '1994-09-23', 'rajat.jpg', '2018-11-28 04:47:11', '2018-11-28 04:15:01', 'unverified', 'No', 'No', '2028-11-18'),
(9, 'Rohan Kapoor', 'password', 'rohan@gmail.com', 'United Kingdom', 'Male', '1985-07-24', 'default.jpg', '2018-11-28 04:16:24', '2018-11-28 04:16:24', 'unverified', 'No', 'No', '2028-11-18'),
(10, 'John', '12121212', 'john@yahoo.com', 'United States', 'Male', '1978-12-03', 'default.jpg', '2018-11-28 04:17:18', '2018-11-28 04:17:18', 'unverified', 'No', 'No', '2028-11-18'),
(11, 'Peter', '12341234', 'peter@gmail.com', 'United Kingdom', 'Male', '1990-03-01', 'default.jpg', '2018-11-28 04:17:48', '2018-11-28 04:17:48', 'unverified', 'No', 'No', '2028-11-18'),
(12, 'Rajat Singh', 'password', 'rajat@yahoo.com', 'India', 'Male', '1988-02-02', 'default.jpg', '2018-11-28 04:19:34', '2018-11-28 04:19:34', 'unverified', 'No', 'No', '2028-11-18'),
(13, 'Ava', 'password', 'ava@gmail.com', 'United States', 'Female', '1990-01-02', 'default.jpg', '2018-11-28 04:20:50', '2018-11-28 04:20:50', 'unverified', 'No', 'No', '2028-11-18'),
(14, 'Sophia', 'password', 'sophia@gmail.com', 'United Kingdom', 'Female', '1993-09-08', 'default.jpg', '2018-11-28 04:21:39', '2018-11-28 04:21:39', 'unverified', 'No', 'No', '2028-11-18'),
(15, 'Emily', '12341234', 'emily@yahoo.com', 'United States', 'Female', '1994-05-02', 'default.jpg', '2018-11-28 04:22:44', '2018-11-28 04:22:44', 'unverified', 'No', 'No', '2028-11-18'),
(16, 'Neha Singh', 'password', 'neha@gmail.com', 'India', 'Female', '1987-03-27', 'default.jpg', '2018-11-28 04:23:39', '2018-11-28 04:23:39', 'unverified', 'No', 'No', '2028-11-18'),
(17, 'Pragya Kumari', '12345678', 'pragya_1232@gmail.com', 'United States', 'Female', '1989-12-14', 'default.jpg', '2018-11-28 04:24:47', '2018-11-28 04:24:47', 'unverified', 'No', 'No', '2028-11-18'),
(18, 'Jyoti Sharma', '12341234', 'sharma.jyoti@yahoo.com', 'India', 'Female', '1988-09-07', 'jyoti.jpg', '2018-11-28 04:56:09', '2018-11-28 04:25:39', 'unverified', 'yes', 'No', '2028-11-18'),
(19, 'Mia', 'mia@1234', 'mia@gmail.com', 'India', 'Female', '1986-04-06', 'Mia.jpg', '2018-11-28 05:06:33', '2018-11-28 04:39:45', 'unverified', 'yes', 'yes', '2028-11-18'),
(20, 'Aditya', '12348765', 'adi@yahoo.com', 'India', 'Male', '1992-05-04', 'aditya.jpg', '2018-11-28 04:50:37', '2018-11-28 04:40:23', 'unverified', 'No', 'No', '2028-11-18'),
(21, 'Arun Kumar', 'password', 'arun@gmail.com', 'India', 'Male', '1993-04-04', 'arun.jpg', '2018-11-28 04:49:06', '2018-11-28 04:41:30', 'unverified', 'No', 'No', '2028-11-18'),
(22, 'Jasmine', '12341234', 'jas@gmail.com', 'United Kingdom', 'Female', '1992-07-03', 'jasmine.jpg', '2018-11-28 04:59:57', '2018-11-28 04:42:27', 'unverified', 'yes', 'No', '2028-11-18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`page_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `page_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
