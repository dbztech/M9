-- phpMyAdmin SQL Dump
-- version 3.5.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 21, 2013 at 12:53 AM
-- Server version: 5.1.66-community
-- PHP Version: 5.4.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `m9`
--

-- --------------------------------------------------------

--
-- Table structure for table `data`
--

CREATE TABLE IF NOT EXISTS `data` (
  `tag` text NOT NULL COMMENT 'Name of the variable',
  `data` text NOT NULL COMMENT 'Data or value of the variable',
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Date modified',
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Variable id',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `timestamp` (`timestamp`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `data`
--

INSERT INTO `data` (`tag`, `data`, `timestamp`, `id`) VALUES
('demotitle', 'Welcome to M9!!!', '2013-04-21 06:55:53', 1),
('trialcontent', 'This is a super <i>Test</i>!!! <b>Hello World</b>', '2013-04-21 07:17:06', 2),
('callme', 'Maybe?', '2013-04-21 07:24:22', 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `username` text NOT NULL COMMENT 'User name',
  `password` text NOT NULL COMMENT 'User password',
  `clientid` text COMMENT 'Session token',
  `type` text NOT NULL COMMENT 'User type',
  `groups` text COMMENT 'User groups (array)',
  `gravatar` text COMMENT 'Gravatar data',
  `googleplus` text COMMENT 'Google plus login data',
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'User Identifier',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `clientid`, `type`, `groups`, `gravatar`, `googleplus`, `id`) VALUES
('brendan@dbztech.com', 'a79445d7c1b6c031aefb4422f85fbe436ae90deb5406e1757bb03afd9fec4f1c', '76c6d4a6b92b6143f98935ff995039195ac7c9cae67bca01faf2b77c304b13b6', 'admin', 'design|content', NULL, NULL, 1),
('help@microsoft.com', '3a7bd3e2360a3d29eea436fcfb7e44c735d117c42d1c1835420b6b9942dd4f1b', NULL, 'standard', NULL, NULL, NULL, 4);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
