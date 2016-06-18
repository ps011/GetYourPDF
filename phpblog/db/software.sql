-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 07, 2015 at 07:48 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `software`
--

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
`id` int(255) NOT NULL,
  `user` varchar(45) NOT NULL,
  `password` varchar(30) NOT NULL,
  `admin` int(2) NOT NULL DEFAULT '0',
  `profileImage` varchar(255) NOT NULL,
  `creation_date` date NOT NULL,
  `is_active` int(2) NOT NULL,
  `updates_date` date NOT NULL,
  `end_date` date NOT NULL,
  `email` varchar(255) NOT NULL,
  `ticketid` int(11) NOT NULL,
  `tickettext` longtext NOT NULL,
  `allowPost` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `user`, `password`, `admin`, `profileImage`, `creation_date`, `is_active`, `updates_date`, `end_date`, 'email', `ticketid`, `tickettext`, `allowPost`) VALUES
(1, 'admin', 'admin', 1, '../images/profileImages/524514853.jpg', '0000-00-00', 0, '0000-00-00', '0000-00-00', '', 0, '', 1),
(2, 'name', 'pass', 0, '../images/profileImages/ghjhg.jpg', '0000-00-00', 0, '0000-00-00', '0000-00-00', '', 0, '', 1),
(3, 'kush', 'kush123', 0, '../images/profileImages/maxresdefault.jpg', '0000-00-00', 0, '0000-00-00', '0000-00-00', '', 0, '', 1),
(4, 'larry', 'page', 0, '../images/profileImages/taxi-driver.jpg', '0000-00-00', 0, '0000-00-00', '0000-00-00', '', 0, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE IF NOT EXISTS `message` (
`id` int(255) NOT NULL,
  `messageid` int(255) NOT NULL,
  `message` longtext NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `messageid`, `message`) VALUES
(1, 0, 'Hey'),
(2, 0, 'Heyo'),
(3, 1142, 'last');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE IF NOT EXISTS `post` (
`id` int(11) NOT NULL,
  `user` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `text` longtext NOT NULL,
  `image` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `tags` longtext NOT NULL,
  `creation_date` date NOT NULL,
  `update_date` date NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `user`, `date`, `text`, `image`, `title`, `tags`, `creation_date`, `update_date`) VALUES
(1, 'name', '2015-08-26', 'First!!!1!11!!', '', 'First', '', '0000-00-00', '2015-08-17'),
(2, 'name', '2015-08-26', 'Restructuring test', '', 'Second', '', '0000-00-00', '0000-00-00'),
(3, 'name', '2015-08-26', 'testingggg', '', 'image upload test', '', '0000-00-00', '0000-00-00'),
(4, 'name', '2015-08-26', 'fffffffhffffffffgg', '../images/postImages/4HSai.jpg', 'aaaaaaaaa', '', '0000-00-00', '2015-08-28'),
(5, '', '2015-08-26', 'image upload first', '', 'test upload', '', '0000-00-00', '0000-00-00'),
(6, 'name', '2015-08-26', 'aaa', '../images/postImages/reverse sun.jpg', 'swsw', '', '0000-00-00', '0000-00-00'),
(7, 'larry', '2015-08-27', 'image test', '../images/postImages/reverse sun.jpg', 'first', '', '0000-00-00', '0000-00-00'),
(8, 'name', '2015-08-27', 'first image test', '', 'testing', '', '0000-00-00', '0000-00-00'),
(9, 'name', '2015-08-27', 'aaaaaaa', '../images/postImages/0tda1.jpg', 'dsffsdf', '', '0000-00-00', '0000-00-00'),
(10, 'name', '2015-08-27', 'this better work', '../images/postImages/1OkdfCQ.png', 'final image test', '', '0000-00-00', '0000-00-00'),
(19, 'name', '2015-08-28', 'this should work', '../images/postImages/4SC2sh.jpg', 'Image test #4', '', '0000-00-00', '0000-00-00'),
(20, 'name', '2015-08-28', 'aqaqaqa', '../images/postImages/m5TcTTc.jpg', 'normal test', '', '0000-00-00', '2015-08-28'),
(21, 'name', '2015-08-28', 'please work', '../images/postImages/BijF8cz.jpg', 'Image test #5', '', '0000-00-00', '2015-08-28'),
(22, 'name', '2015-08-28', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis elementum urna vel tortor porttitor mattis. In consequat leo a arcu lobortis, a sodales diam aliquam. Praesent lorem nulla, interdum ut urna tempor, facilisis gravida nisl. Maecenas est metus, cursus eu mi quis, commodo tincidunt lacus. Quisque congue velit eget eros auctor, at pharetra ipsum gravida. Vestibulum eu lorem tempor, maximus libero sed, dignissim sapien. Duis pretium dui sit amet enim euismod, vel tempus nulla semper.\r\n\r\nMorbi sit amet mauris eu nunc condimentum dignissim. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean aliquet libero vel ante auctor, vitae dignissim felis dictum. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Cras eget lorem eu tellus mattis imperdiet in vitae ligula. Aenean eleifend nibh sit amet leo ultricies condimentum. Integer quis eros metus. Nam bibendum metus odio, interdum malesuada nibh efficitur cursus.\r\n\r\nPellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vivamus commodo nisi lorem, ut eleifend mi sagittis id. Proin nisl justo, sodales dignissim magna vitae, ullamcorper feugiat velit. In hac habitasse platea dictumst. Etiam in pulvinar ante. Phasellus semper ullamcorper tellus vitae faucibus. Sed commodo pellentesque sem, quis posuere diam dapibus id.\r\n\r\nMaecenas vitae leo magna. Integer mauris ligula, tincidunt eget tempus at, consequat at turpis. Etiam orci metus, pharetra at tincidunt et, volutpat euismod turpis. Proin porta magna tempus fermentum rutrum. Aliquam fringilla augue tristique justo tempus mattis. Etiam ullamcorper ligula vel enim efficitur, in dapibus dui scelerisque. Sed elementum augue id laoreet hendrerit. Nullam sollicitudin dignissim eros, sit amet semper sem lobortis non.\r\n\r\nVestibulum eget nisl at nibh condimentum cursus. Duis finibus, eros id lobortis eleifend, ligula ex ornare metus, vel tempus dolor ligula vel nisl. Duis in egestas mauris. Ut mollis mi orci, in congue leo tincidunt ut. Aliquam risus lorem, condimentum ut ligula in, maximus suscipit lorem. Nulla facilisi. Donec vel mattis dui, non ultrices massa. Quisque ac interdum mi. Fusce at eros justo.', '../images/postImages/59ysiLG.png', 'Long text post', '', '0000-00-00', '0000-00-00'),
(23, 'larry', '2015-09-07', 'Random text', '', 'Post with tags', 'Random,post,hobby,text', '0000-00-00', '0000-00-00'),
(24, 'larry', '2015-09-07', 'Tags', '../images/postImages/ILGsASU.jpg', 'Second Tag post', 'Random,text', '0000-00-00', '0000-00-00'),
(26, 'kush', '2015-09-07', 'Alerts\r\n\r\nProvide contextual feedback messages for typical user actions with the handful of available and flexible alert messages.\r\n\r\nExamples\r\nWrap any text and an optional dismiss button in .alert and one of the four contextual classes (e.g., .alert-success) for basic alert messages.', '../images/postImages/1NltG.jpg', 'Alert Test', 'text,trial', '0000-00-00', '0000-00-00'),
(27, 'kush', '2015-09-07', 'Alert test with link', '../images/postImages/O2h2XzQ.jpg', 'Alert Test ', 'text,trial', '0000-00-00', '0000-00-00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login`
--
ALTER TABLE `login`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
