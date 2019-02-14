-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 14, 2019 at 11:48 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `registered`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(32) NOT NULL,
  `category` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category`) VALUES
(1, 'Nature'),
(2, 'Urban'),
(3, 'Animal'),
(4, 'Food'),
(5, 'Landscape'),
(6, 'Cars'),
(7, 'Cat'),
(10, 'Uncategorized'),
(12, 'emad');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `image_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `image` varchar(50) NOT NULL,
  `title` text NOT NULL,
  `approved` int(3) NOT NULL DEFAULT '0',
  `a` varchar(32) NOT NULL,
  `category` varchar(32) NOT NULL DEFAULT 'uncatagorized',
  `rating` float NOT NULL DEFAULT '0',
  `votes` int(32) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`image_id`, `id`, `image`, `title`, `approved`, `a`, `category`, `rating`, `votes`) VALUES
(9, 9, 'logo1.png', 'edited', 0, 'edited', 'urban', 0, 0),
(11, 10, 'img1.jpg', 'cvcv', 0, 'cvcv', 'Urban', 0, 0),
(12, 9, 'zszs.jpg', 'cvcvcv', 1, '', 'uncatagorized', 0, 0),
(16, 9, 'foodcollage.jpg', 'these are some delicious foods', 1, '', 'food', 5, 1),
(17, 9, 'c92083ac7afba5fc139cf390edb1adba.png', 'Two cute dogs', 1, '', 'animal', 3.66667, 3),
(18, 22, 'nature1.jpg', 'cc', 1, 'vv', 'nature', 0, 0),
(19, 22, 'nature2.jpg', 'dfsgfdsg', 1, 'fdsge vtrfgv sfdgd rtrfvds', 'nature', 0, 0),
(20, 25, 'dogo.png', 'erer', 1, '', 'animal', 1, 1),
(21, 22, 'lambo.jpg', 'Aventador', 1, 'Dreams :*', 'Cars', 5, 1),
(22, 26, 'cat1.jpg', 'Cat', 1, 'A persian cat', 'Cat', 0, 0),
(23, 26, 'cat23.jpg', 'Cat 2', 1, 'another cat', 'Cat', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `name` varchar(32) NOT NULL,
  `email` text NOT NULL,
  `password` varchar(32) NOT NULL,
  `hash` varchar(32) NOT NULL,
  `active` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `hash`, `active`) VALUES
(1, 'aa', 'bb', 'cc', 'ec5decca5ed3d6b8079e2e7e7bacc9f2', 0),
(2, 'aa', 'vxez@n.spamtrap.co', 'cc', 'c8c41c4a18675a74e01c8a20e8a0f662', 0),
(3, 'ab', 'vv', 'dd', 'fc3cf452d3da8402bebb765225ce8c0e', 1),
(4, '', 'aa', 'bb', '2a084e55c87b1ebcdaad1f62fdbbac8e', 0),
(5, '', 'aa', 'bb', '854d6fae5ee42911677c739ee1734486', 0),
(6, 'we', 'we', 'we', '3435c378bb76d4357324dd7e69f3cd18', 1),
(7, 'cc1', 'cc1', 'cc1', '01386bd6d8e091c2ab4c7c7de644d37b', 0),
(8, 'emad', 'e', 'e', 'addfa9b7e234254d26e9c7f2af1005cb', 1),
(9, 'tyty', 'qq      ', 'qq', '9188905e74c28e489b44e954ec0b9bca', 1),
(10, 'ff', 'ff', 'ff', '091d584fced301b442654dd8c23b3fc9', 1),
(11, 'dd', 'dd', 'dd', '4c5bde74a8f110656874902f07378009', 0),
(12, 'uu', 'uu', 'uu', 'acf4b89d3d503d8252c9c4ba75ddbf6d', 0),
(13, 'hh', 'hh', 'hh', 'b83aac23b9528732c23cc7352950e880', 1),
(15, '', '', '', '0a09c8844ba8f0936c20bd791130d6b6', 0),
(16, '', '', '', 'd81f9c1be2e08964bf9f24b15f0e4900', 0),
(17, '', '', '', 'f57a2f557b098c43f11ab969efe1504b', 0),
(18, 'gh', 'gh', 'gh', '6974ce5ac660610b44d9b9fed0ff9548', 1),
(19, '', '', '', 'bca82e41ee7b0833588399b1fcd177c7', 1),
(20, 'uivi', 'uivi', 'uivi', '0e65972dce68dad4d52d063967f0a705', 1),
(21, 'uiui', 'uiui', 'uiui', '621bf66ddb7c962aa0d22ac97d69b793', 1),
(22, 'Sadif', 'minhaz.sadif@gmail.com', '9f6e6800cfae7749eb6c486619254b9c', 'd1f491a404d6854880943e5c3cd9ca25', 5),
(23, 'qwqw', 'qwqw', 'qwqw', '432aca3a1e345e339f35a30c8f65edce', 0),
(24, 'qwqw', 'qwqw', 'qwqw', '68ce199ec2c5517597ce0a4d89620f55', 0),
(25, 'qwqw', 'qwqw', 'qwqw', 'f4be00279ee2e0a53eafdaa94a151e2c', 1),
(26, 'cvcv', 'cvcv', 'cvcv', '26dd0dbc6e3f4c8043749885523d6a25', 1),
(27, 'md5', 'md5', '1bc29b36f623ba82aaf6724fd3b16718', '2f37d10131f2a483a8dd005b3d14b0d9', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`image_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
