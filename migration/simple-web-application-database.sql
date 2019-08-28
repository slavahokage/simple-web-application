-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Aug 26, 2019 at 11:35 AM
-- Server version: 5.7.23
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `simple-web-application`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `description`) VALUES
(1, '123', '123'),
(2, '', ''),
(3, '123', '123'),
(4, '', ''),
(5, '321', '321'),
(6, '', ''),
(7, '432', '432'),
(8, '', ''),
(9, 'sdf', 'fds'),
(10, '', ''),
(11, 'dsf', 'dsf'),
(12, '', ''),
(13, 'sdfsdf', 'dsffsd'),
(14, '', ''),
(15, 'sdfdsf', 'sdffds'),
(16, '', ''),
(17, 'sdfdfsdf', 'dsfdfsdf'),
(18, '', ''),
(19, 'fds1', 'dsf1'),
(20, '', ''),
(21, '123dfs', 'sdf21'),
(22, '', ''),
(23, 'dsf123', 'sdf123'),
(24, '', ''),
(25, 'fdfs', 'dsfsd'),
(26, '', ''),
(27, 'sdf', 'sfd'),
(28, 'dsf', 'dsf');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `description`) VALUES
(1, 'test 1233', 'test description1123'),
(2, 'hello word1', 'hello word'),
(3, 'Это торф', 'ыtest123аывва'),
(4, 'test', 'das'),
(5, 'русский', 'русский'),
(6, 'sdf', 'sdf'),
(7, 'hello word', 'hello wordd'),
(8, 'asdhello word', 'hello wordasd'),
(9, 'adsdas', 'asdasd'),
(10, 'sfdfdsdf', 'sdfdf'),
(11, 'dfsfsdfsfd', 'sdffdsfd'),
(12, 'hello worddsf', 'fsdfsd'),
(13, 'fsdfds', 'dsffd'),
(14, 'sdfdsfdsfdfsdfsdf', 'dfsfsdfdfsdfsdfsdf'),
(15, 'test titlesad', 'test descriptionads');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;