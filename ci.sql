-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 01, 2013 at 11:02 PM
-- Server version: 5.5.25
-- PHP Version: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ci`
--

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `session_id` varchar(40) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `ip_address` varchar(16) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `user_agent` varchar(150) COLLATE utf8_bin NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`session_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('0c4404325be6247cca91078836ad2ed2', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.8; rv:14.0) Gecko/20100101 Firefox/14.0.1', 1370120458, 0x613a343a7b733a393a22757365725f64617461223b733a303a22223b733a373a22757365725f6964223b733a313a2234223b733a383a22757365726e616d65223b733a343a2275736572223b733a363a22737461747573223b733a313a2231223b7d);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `parent_post` int(11) NOT NULL,
  `body` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `parent_post`, `body`) VALUES
(11, 4, 79, 'hi');

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(40) COLLATE utf8_bin NOT NULL,
  `login` varchar(50) COLLATE utf8_bin NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `thumb_url` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=83 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `url`, `thumb_url`) VALUES
(73, 'Tokyo Station by night', 'http://www.flickr.com/photos/64496432@N00/8174695346/', 'http://f.thumbs.redditmedia.com/nsmhqj2Qx-mpM_Zw.jpg'),
(74, 'Hiroo, Tokyo Evening', 'http://www.flickr.com/photos/alexkane/8895704086/in/photostream/', 'http://a.thumbs.redditmedia.com/VV-6OPnEldFZR2k0.jpg'),
(75, 'Friday night in a Shinagawa Gyutan restaurant', 'http://www.flickr.com/photos/chadyosh/7204818004/sizes/l/in/set-72157629959043081/', 'http://b.thumbs.redditmedia.com/-kdg38IU1Bktand7.jpg'),
(76, 'Futon shop', 'http://www.flickr.com/photos/alexkane/8873642462/sizes/l/in/photostream/', 'http://c.thumbs.redditmedia.com/TbD7ze_uiYxNOHun.jpg'),
(77, 'Here are some pictures I took during my trip to Japan last month. Hope you enjoy them.', 'http://www.flickr.com/photos/amerikkujin/sets/72157633445282940/', 'http://d.thumbs.redditmedia.com/cLuMlWz74gvI5Wpi.jpg'),
(78, 'A truck', 'http://www.flickr.com/photos/alexkane/8861362118/sizes/h/in/photostream/', 'http://c.thumbs.redditmedia.com/xGXf5nYYURYtSYhh.jpg'),
(79, 'Fading Fuji-san', 'http://i.imgur.com/ZqEpODY.jpg', 'http://d.thumbs.redditmedia.com/WEs9BZG5AGX28k8E.jpg'),
(80, 'Date Masamune On A Spring Evening', 'http://i.imgur.com/wFF8K4E.jpg', 'http://d.thumbs.redditmedia.com/BxEGfyVM34aS9Uhu.jpg'),
(81, 'Koraku-en has amazing cherry blossoms!', 'http://i.imgur.com/zprZc0q.jpg', 'http://c.thumbs.redditmedia.com/8hepdTfN2Ff58D2t.jpg'),
(82, 'Spring photos from Miyagi.', 'http://www.flickr.com/photos/44227128@N00/sets/72157633648831470/', 'http://a.thumbs.redditmedia.com/uz_FHyoCukjvu9jx.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE utf8_bin NOT NULL,
  `password` varchar(255) COLLATE utf8_bin NOT NULL,
  `email` varchar(100) COLLATE utf8_bin NOT NULL,
  `activated` tinyint(1) NOT NULL DEFAULT '1',
  `banned` tinyint(1) NOT NULL DEFAULT '0',
  `ban_reason` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `new_password_key` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `new_password_requested` datetime DEFAULT NULL,
  `new_email` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `new_email_key` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `last_ip` varchar(40) COLLATE utf8_bin NOT NULL,
  `last_login` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=5 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `activated`, `banned`, `ban_reason`, `new_password_key`, `new_password_requested`, `new_email`, `new_email_key`, `last_ip`, `last_login`, `created`, `modified`, `admin`) VALUES
(4, 'user', '$2a$08$UZ51Ug6mcfKu59gAHJBRpO2IRqtFCujl.GRNvMqs8D9r44VK3eAMq', 'j@j.com', 1, 0, NULL, NULL, NULL, NULL, NULL, '::1', '2013-06-01 22:31:54', '2013-06-01 21:50:37', '2013-06-01 20:31:54', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_autologin`
--

CREATE TABLE `user_autologin` (
  `key_id` char(32) COLLATE utf8_bin NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `user_agent` varchar(150) COLLATE utf8_bin NOT NULL,
  `last_ip` varchar(40) COLLATE utf8_bin NOT NULL,
  `last_login` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`key_id`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `user_profiles`
--

CREATE TABLE `user_profiles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `country` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `website` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=4 ;

--
-- Dumping data for table `user_profiles`
--

INSERT INTO `user_profiles` (`id`, `user_id`, `country`, `website`) VALUES
(3, 4, 'usa', 'www.superman.gov');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
