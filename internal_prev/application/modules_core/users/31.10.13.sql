-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 31, 2013 at 06:08 AM
-- Server version: 5.5.24-log
-- PHP Version: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `iit_modified`
--
CREATE DATABASE `iit_modified` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `iit_modified`;

-- --------------------------------------------------------

--
-- Table structure for table `achievement_pictures`
--

CREATE TABLE IF NOT EXISTS `achievement_pictures` (
  `picture_id` int(11) NOT NULL AUTO_INCREMENT,
  `picture_heading` varchar(1000) DEFAULT NULL,
  `picture_description` varchar(500) DEFAULT NULL,
  `big_pic_path` varchar(100) DEFAULT NULL,
  `small_pic_path` varchar(100) DEFAULT NULL,
  `status` enum('activated','deactivated') NOT NULL DEFAULT 'activated',
  `date_of_modification` varchar(20) DEFAULT NULL,
  `time_of_modification` varchar(30) DEFAULT NULL,
  `user_of_modification` int(11) DEFAULT NULL,
  `user_ip` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`picture_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `achievement_pictures`
--

INSERT INTO `achievement_pictures` (`picture_id`, `picture_heading`, `picture_description`, `big_pic_path`, `small_pic_path`, `status`, `date_of_modification`, `time_of_modification`, `user_of_modification`, `user_ip`) VALUES
(1, NULL, 'IIT Champion in Cricket', 'path', 'path', 'activated', NULL, NULL, NULL, NULL),
(2, NULL, 'Programming Competition Runner Up', 'path', 'path', 'activated', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `activity_log`
--

CREATE TABLE IF NOT EXISTS `activity_log` (
  `activity_log_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) DEFAULT NULL,
  `activity_date` varchar(30) DEFAULT NULL,
  `activity_time` varchar(20) DEFAULT NULL,
  `activity_description` varchar(2000) DEFAULT NULL,
  `user_ip` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`activity_log_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `activity_log`
--

INSERT INTO `activity_log` (`activity_log_id`, `user_id`, `activity_date`, `activity_time`, `activity_description`, `user_ip`) VALUES
(1, 0, '09-Oct-2013', '01:10:02', 'add upcoming events', '::1'),
(2, 0, '09-Oct-2013', '02:10:57', 'modify upcoming events', '::1'),
(3, 0, '09-Oct-2013', '02:10:12', 'add upcoming events', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `admin_roles`
--

CREATE TABLE IF NOT EXISTS `admin_roles` (
  `admin_role_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_role_type` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`admin_role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `admin_roles`
--

INSERT INTO `admin_roles` (`admin_role_id`, `admin_role_type`) VALUES
(1, 'admin_management'),
(2, 'website_management'),
(3, 'faculty_management'),
(4, 'exam_management'),
(5, 'program_management'),
(6, 'head_admin');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE IF NOT EXISTS `admins` (
  `user_id` int(11) NOT NULL,
  `admin_role_id` int(11) DEFAULT NULL,
  `full_name` varchar(500) DEFAULT NULL,
  `description` varchar(5000) DEFAULT NULL,
  `status` enum('activated','deactivated') NOT NULL DEFAULT 'activated',
  `date_of_modification` varchar(30) DEFAULT NULL,
  `time_of_modification` varchar(30) DEFAULT NULL,
  `user_of_modification` int(11) DEFAULT NULL,
  `user_ip` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`user_id`, `admin_role_id`, `full_name`, `description`, `status`, `date_of_modification`, `time_of_modification`, `user_of_modification`, `user_ip`) VALUES
(21, 6, 'Sujit', NULL, 'activated', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `album_head`
--

CREATE TABLE IF NOT EXISTS `album_head` (
  `album_head_picture_id` int(10) NOT NULL AUTO_INCREMENT,
  `album_head_big_picture_path` varchar(500) DEFAULT NULL,
  `album_head_small_picture_path` varchar(500) DEFAULT NULL,
  `album_title` varchar(500) DEFAULT NULL,
  `status` enum('activated','deactivated') NOT NULL DEFAULT 'activated',
  `date_of_modification` varchar(20) DEFAULT NULL,
  `time_of_modification` varchar(30) DEFAULT NULL,
  `user_of_modification` int(11) DEFAULT NULL,
  `user_ip` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`album_head_picture_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `album_head`
--

INSERT INTO `album_head` (`album_head_picture_id`, `album_head_big_picture_path`, `album_head_small_picture_path`, `album_title`, `status`, `date_of_modification`, `time_of_modification`, `user_of_modification`, `user_ip`) VALUES
(1, 'big_pic_path', 'small_pic_path', 'New_title', 'activated', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `album_sub`
--

CREATE TABLE IF NOT EXISTS `album_sub` (
  `album_sub_picture_id` int(10) NOT NULL AUTO_INCREMENT,
  `album_sub_big_picture_path` varchar(500) DEFAULT NULL,
  `album_sub_small_picture_path` varchar(500) DEFAULT NULL,
  `album_head_picture_id` int(10) DEFAULT NULL,
  `picture_description` varchar(500) DEFAULT NULL,
  `date_of_modification` varchar(30) DEFAULT NULL,
  `time_of_modification` varchar(30) DEFAULT NULL,
  `user_of_modification` int(11) DEFAULT NULL,
  `user_ip` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`album_sub_picture_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `attendance_details`
--

CREATE TABLE IF NOT EXISTS `attendance_details` (
  `attendance_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `attendance_status` enum('yes','no') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendance_details`
--

INSERT INTO `attendance_details` (`attendance_id`, `user_id`, `attendance_status`) VALUES
(1, 22, 'yes'),
(1, 23, 'yes'),
(1, 24, 'yes'),
(1, 25, 'yes'),
(1, 26, 'yes'),
(1, 27, 'yes'),
(1, 28, 'yes'),
(1, 29, 'yes'),
(1, 30, 'yes'),
(1, 31, 'yes'),
(2, 22, 'yes'),
(2, 23, 'yes'),
(2, 24, 'yes'),
(2, 25, 'yes'),
(2, 26, 'yes'),
(2, 27, 'yes'),
(2, 28, 'yes'),
(2, 29, 'yes'),
(2, 30, 'yes'),
(2, 31, 'yes'),
(3, 32, 'yes'),
(3, 33, 'yes'),
(3, 34, 'yes'),
(3, 35, 'yes'),
(3, 36, 'yes'),
(3, 37, 'yes'),
(3, 38, 'yes'),
(3, 39, 'yes'),
(3, 40, 'yes'),
(3, 41, 'yes'),
(4, 22, 'no'),
(4, 23, 'no'),
(4, 24, 'yes'),
(4, 25, 'no'),
(4, 26, 'yes'),
(4, 27, 'yes'),
(4, 28, 'yes'),
(4, 29, 'yes'),
(4, 30, 'yes'),
(4, 31, 'no'),
(5, 22, 'yes'),
(5, 23, 'yes'),
(5, 24, 'yes'),
(5, 25, 'yes'),
(5, 26, 'yes'),
(5, 27, 'yes'),
(5, 28, 'yes'),
(5, 29, 'yes'),
(5, 30, 'yes'),
(5, 31, 'yes'),
(6, 22, 'no'),
(6, 23, 'no'),
(6, 24, 'yes'),
(6, 25, 'no'),
(6, 26, 'yes'),
(6, 27, 'no'),
(6, 28, 'yes'),
(6, 29, 'yes'),
(6, 30, 'yes'),
(6, 31, 'no'),
(7, 22, 'yes'),
(7, 23, 'no'),
(7, 24, 'yes'),
(7, 25, 'no'),
(7, 26, 'yes'),
(7, 27, 'yes'),
(7, 28, 'yes'),
(7, 29, 'yes'),
(7, 30, 'yes'),
(7, 31, 'yes'),
(8, 22, 'yes'),
(8, 23, 'yes'),
(8, 24, 'yes'),
(8, 25, 'yes'),
(8, 26, 'yes'),
(8, 27, 'yes'),
(8, 28, 'yes'),
(8, 29, 'yes'),
(8, 30, 'yes'),
(8, 31, 'yes'),
(9, 22, 'yes'),
(9, 23, 'yes'),
(9, 24, 'yes'),
(9, 25, 'yes'),
(9, 26, 'yes'),
(9, 27, 'yes'),
(9, 28, 'yes'),
(9, 29, 'yes'),
(9, 30, 'yes'),
(9, 31, 'yes'),
(10, 22, 'yes'),
(10, 23, 'yes'),
(10, 24, 'yes'),
(10, 25, 'yes'),
(10, 26, 'yes'),
(10, 27, 'yes'),
(10, 28, 'yes'),
(10, 29, 'yes'),
(10, 30, 'yes'),
(10, 31, 'yes'),
(11, 22, 'yes'),
(11, 23, 'yes'),
(11, 24, 'yes'),
(11, 25, 'yes'),
(11, 26, 'yes'),
(11, 27, 'yes'),
(11, 28, 'yes'),
(11, 29, 'yes'),
(11, 30, 'yes'),
(11, 31, 'yes'),
(12, 22, 'yes'),
(12, 23, 'yes'),
(12, 24, 'yes'),
(12, 25, 'yes'),
(12, 26, 'yes'),
(12, 27, 'yes'),
(12, 28, 'yes'),
(12, 29, 'yes'),
(12, 30, 'yes'),
(12, 31, 'yes'),
(13, 22, 'yes'),
(13, 23, 'yes'),
(13, 24, 'yes'),
(13, 25, 'yes'),
(13, 26, 'yes'),
(13, 27, 'yes'),
(13, 28, 'yes'),
(13, 29, 'yes'),
(13, 30, 'yes'),
(13, 31, 'yes'),
(14, 22, 'yes'),
(14, 23, 'yes'),
(14, 24, 'yes'),
(14, 25, 'yes'),
(14, 26, 'yes'),
(14, 27, 'yes'),
(14, 28, 'yes'),
(14, 29, 'yes'),
(14, 30, 'yes'),
(14, 31, 'yes'),
(15, 22, 'yes'),
(15, 23, 'yes'),
(15, 24, 'yes'),
(15, 25, 'yes'),
(15, 26, 'yes'),
(15, 27, 'yes'),
(15, 28, 'yes'),
(15, 29, 'yes'),
(15, 30, 'yes'),
(15, 31, 'yes'),
(16, 22, 'yes'),
(16, 23, 'yes'),
(16, 24, 'yes'),
(16, 25, 'yes'),
(16, 26, 'yes'),
(16, 27, 'yes'),
(16, 28, 'yes'),
(16, 29, 'yes'),
(16, 30, 'yes'),
(16, 31, 'yes'),
(17, 22, 'yes'),
(17, 23, 'yes'),
(17, 24, 'yes'),
(17, 25, 'yes'),
(17, 26, 'yes'),
(17, 27, 'yes'),
(17, 28, 'yes'),
(17, 29, 'yes'),
(17, 30, 'yes'),
(17, 31, 'yes'),
(18, 22, 'yes'),
(18, 23, 'yes'),
(18, 24, 'yes'),
(18, 25, 'yes'),
(18, 26, 'yes'),
(18, 27, 'yes'),
(18, 28, 'yes'),
(18, 29, 'yes'),
(18, 30, 'yes'),
(18, 31, 'yes'),
(19, 22, 'yes'),
(19, 23, 'yes'),
(19, 24, 'yes'),
(19, 25, 'yes'),
(19, 26, 'yes'),
(19, 27, 'yes'),
(19, 28, 'yes'),
(19, 29, 'yes'),
(19, 30, 'yes'),
(19, 31, 'yes'),
(20, 22, 'yes'),
(20, 23, 'yes'),
(20, 24, 'yes'),
(20, 25, 'yes'),
(20, 26, 'yes'),
(20, 27, 'yes'),
(20, 28, 'yes'),
(20, 29, 'yes'),
(20, 30, 'yes'),
(20, 31, 'yes'),
(21, 22, 'yes'),
(21, 23, 'yes'),
(21, 24, 'yes'),
(21, 25, 'yes'),
(21, 26, 'yes'),
(21, 27, 'yes'),
(21, 28, 'yes'),
(21, 29, 'yes'),
(21, 30, 'yes'),
(21, 31, 'yes'),
(22, 22, 'yes'),
(22, 23, 'yes'),
(22, 24, 'yes'),
(22, 25, 'yes'),
(22, 26, 'yes'),
(22, 27, 'yes'),
(22, 28, 'yes'),
(22, 29, 'yes'),
(22, 30, 'yes'),
(22, 31, 'yes'),
(23, 22, 'yes'),
(23, 23, 'yes'),
(23, 24, 'yes'),
(23, 25, 'yes'),
(23, 26, 'yes'),
(23, 27, 'yes'),
(23, 28, 'yes'),
(23, 29, 'yes'),
(23, 30, 'yes'),
(23, 31, 'yes'),
(24, 22, 'yes'),
(24, 23, 'yes'),
(24, 24, 'yes'),
(24, 25, 'yes'),
(24, 26, 'yes'),
(24, 27, 'yes'),
(24, 28, 'yes'),
(24, 29, 'yes'),
(24, 30, 'yes'),
(24, 31, 'yes'),
(25, 22, 'yes'),
(25, 23, 'yes'),
(25, 24, 'yes'),
(25, 25, 'yes'),
(25, 26, 'yes'),
(25, 27, 'yes'),
(25, 28, 'yes'),
(25, 29, 'yes'),
(25, 30, 'yes'),
(25, 31, 'yes'),
(26, 22, 'yes'),
(26, 23, 'yes'),
(26, 24, 'yes'),
(26, 25, 'yes'),
(26, 26, 'yes'),
(26, 27, 'yes'),
(26, 28, 'yes'),
(26, 29, 'yes'),
(26, 30, 'yes'),
(26, 31, 'yes'),
(27, 22, 'yes'),
(27, 23, 'yes'),
(27, 24, 'yes'),
(27, 25, 'yes'),
(27, 26, 'yes'),
(27, 27, 'yes'),
(27, 28, 'yes'),
(27, 29, 'yes'),
(27, 30, 'yes'),
(27, 31, 'yes'),
(28, 22, 'yes'),
(28, 23, 'yes'),
(28, 24, 'yes'),
(28, 25, 'yes'),
(28, 26, 'yes'),
(28, 27, 'yes'),
(28, 28, 'yes'),
(28, 29, 'yes'),
(28, 30, 'yes'),
(28, 31, 'yes'),
(29, 32, 'yes'),
(29, 33, 'yes'),
(29, 34, 'yes'),
(29, 35, 'yes'),
(29, 36, 'no'),
(29, 37, 'no'),
(29, 38, 'yes'),
(29, 39, 'yes'),
(29, 40, 'yes'),
(29, 41, 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `attendance_log`
--

CREATE TABLE IF NOT EXISTS `attendance_log` (
  `attendance_id` int(11) NOT NULL AUTO_INCREMENT,
  `course_log_id` int(11) DEFAULT NULL,
  `attendance_date` varchar(30) DEFAULT NULL,
  `attendance_time` varchar(30) DEFAULT NULL,
  `user_of_modification` int(11) DEFAULT NULL,
  `user_ip` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`attendance_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `attendance_log`
--

INSERT INTO `attendance_log` (`attendance_id`, `course_log_id`, `attendance_date`, `attendance_time`, `user_of_modification`, `user_ip`) VALUES
(1, 19, '09-Oct-2013', '09:10:01', 0, '::1'),
(2, 23, '09-Oct-2013', '09:10:23', 0, '::1'),
(3, 42, '09-Oct-2013', '09:10:27', 0, '::1'),
(4, 19, '09-Oct-2013', '09:10:00', 0, '::1'),
(5, 23, '09-Oct-2013', '09:10:39', 0, '::1'),
(6, 19, '09-Oct-2013', '09:10:38', 0, '::1'),
(7, 19, '09-Oct-2013', '09:10:32', 0, '::1'),
(8, 19, '09-Oct-2013', '09:10:04', 0, '::1'),
(9, 19, '09-Oct-2013', '09:10:06', 0, '::1'),
(10, 19, '09-Oct-2013', '09:10:08', 0, '::1'),
(11, 19, '09-Oct-2013', '09:10:10', 0, '::1'),
(12, 19, '09-Oct-2013', '09:10:12', 0, '::1'),
(13, 19, '09-Oct-2013', '09:10:14', 0, '::1'),
(14, 19, '09-Oct-2013', '09:10:16', 0, '::1'),
(15, 19, '09-Oct-2013', '09:10:18', 0, '::1'),
(16, 19, '09-Oct-2013', '09:10:37', 0, '::1'),
(17, 19, '09-Oct-2013', '09:10:40', 0, '::1'),
(18, 19, '09-Oct-2013', '09:10:42', 0, '::1'),
(19, 19, '09-Oct-2013', '09:10:44', 0, '::1'),
(20, 19, '09-Oct-2013', '09:10:47', 0, '::1'),
(21, 19, '09-Oct-2013', '09:10:49', 0, '::1'),
(22, 19, '09-Oct-2013', '09:10:51', 0, '::1'),
(23, 19, '09-Oct-2013', '09:10:05', 0, '::1'),
(24, 19, '09-Oct-2013', '09:10:07', 0, '::1'),
(25, 19, '09-Oct-2013', '09:10:10', 0, '::1'),
(26, 19, '09-Oct-2013', '09:10:14', 0, '::1'),
(27, 19, '09-Oct-2013', '09:10:17', 0, '::1'),
(28, 19, '09-Oct-2013', '09:10:19', 0, '::1'),
(29, 42, '09-Oct-2013', '09:10:00', 0, '::1');

-- --------------------------------------------------------

--
-- Table structure for table `batches`
--

CREATE TABLE IF NOT EXISTS `batches` (
  `batch_id` int(11) NOT NULL AUTO_INCREMENT,
  `batch_name` varchar(20) DEFAULT NULL,
  `program_id` int(11) DEFAULT NULL,
  `academic_status` enum('active','passed') NOT NULL DEFAULT 'active',
  `status` enum('activated','deactivated') DEFAULT 'activated',
  `date_of_modification` varchar(30) DEFAULT NULL,
  `time_of_modification` varchar(30) DEFAULT NULL,
  `user_of_modification` int(11) DEFAULT NULL,
  `user_ip` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`batch_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `batches`
--

INSERT INTO `batches` (`batch_id`, `batch_name`, `program_id`, `academic_status`, `status`, `date_of_modification`, `time_of_modification`, `user_of_modification`, `user_ip`) VALUES
(1, '1st Batch', 1, 'passed', 'activated', NULL, NULL, NULL, NULL),
(2, '2nd Batch', 1, 'active', 'activated', NULL, NULL, NULL, NULL),
(3, '3rd Batch', 1, 'active', 'activated', NULL, NULL, NULL, NULL),
(4, '4th Batch', 1, 'active', 'activated', NULL, NULL, NULL, NULL),
(5, '5th Batch', 1, 'active', 'activated', NULL, NULL, NULL, NULL),
(6, '1st Batch', 2, 'active', 'activated', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `club`
--

CREATE TABLE IF NOT EXISTS `club` (
  `club_id` int(11) NOT NULL AUTO_INCREMENT,
  `club_tittle` varchar(20) NOT NULL,
  `description` varchar(2000) NOT NULL,
  PRIMARY KEY (`club_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `club`
--

INSERT INTO `club` (`club_id`, `club_tittle`, `description`) VALUES
(1, 'Programming club', 'do some programming..some sort of problem solving. nothing else.'),
(2, 'Debating Club', 'IIt Debating club is one of the awesome clubs of iit ever has.'),
(3, 'Photography club', 'capture photos of wonderful moments.'),
(4, 'Tourism Club ', 'khali ghora fera kore');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `comments_id` int(11) NOT NULL,
  `comment` varchar(2000) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `date` varchar(20) DEFAULT NULL,
  `time` varchar(20) DEFAULT NULL,
  `post_details_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`comments_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
  `contact_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `e_mail` varchar(50) DEFAULT NULL,
  `message` varchar(2000) DEFAULT NULL,
  `date` varchar(15) DEFAULT NULL,
  `time` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`contact_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`contact_id`, `name`, `e_mail`, `message`, `date`, `time`) VALUES
(1, 'asfdsadas', 'sdsafdf@hfhfdh', 'fgfdhfdhfghghgh', '09-Oct-2013', '02:10:05');

-- --------------------------------------------------------

--
-- Table structure for table `course_log`
--

CREATE TABLE IF NOT EXISTS `course_log` (
  `course_log_id` int(11) NOT NULL AUTO_INCREMENT,
  `semester_log_id` int(11) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `teacher_id` int(11) DEFAULT NULL,
  `result_status` enum('pending','published') NOT NULL DEFAULT 'pending',
  `status` enum('activated','deactivated') DEFAULT 'activated',
  `date_of_modification` varchar(30) DEFAULT NULL,
  `time_of_modification` varchar(30) DEFAULT NULL,
  `user_of_modification` int(11) DEFAULT NULL,
  `user_ip` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`course_log_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=43 ;

--
-- Dumping data for table `course_log`
--

INSERT INTO `course_log` (`course_log_id`, `semester_log_id`, `course_id`, `teacher_id`, `result_status`, `status`, `date_of_modification`, `time_of_modification`, `user_of_modification`, `user_ip`) VALUES
(19, 16, 31, 20, 'pending', 'activated', NULL, NULL, NULL, NULL),
(20, 16, 32, 12, 'pending', 'activated', NULL, NULL, NULL, NULL),
(21, 16, 33, 11, 'pending', 'activated', NULL, NULL, NULL, NULL),
(22, 16, 34, 20, 'pending', 'activated', NULL, NULL, NULL, NULL),
(23, 16, 35, 20, 'pending', 'activated', NULL, NULL, NULL, NULL),
(24, 16, 36, 13, 'pending', 'activated', NULL, NULL, NULL, NULL),
(25, 18, 25, 11, 'published', 'activated', NULL, NULL, NULL, NULL),
(26, 18, 26, 12, 'published', 'activated', NULL, NULL, NULL, NULL),
(27, 18, 27, 13, 'published', 'activated', NULL, NULL, NULL, NULL),
(28, 18, 28, 14, 'published', 'activated', NULL, NULL, NULL, NULL),
(29, 18, 29, 15, 'published', 'activated', NULL, NULL, NULL, NULL),
(30, 18, 30, 20, 'published', 'activated', NULL, NULL, NULL, NULL),
(31, 17, 1, 11, 'published', 'activated', NULL, NULL, NULL, NULL),
(32, 17, 2, 12, 'published', 'activated', NULL, NULL, NULL, NULL),
(33, 17, 3, 13, 'published', 'activated', NULL, NULL, NULL, NULL),
(34, 17, 4, 14, 'published', 'activated', NULL, NULL, NULL, NULL),
(35, 17, 5, 15, 'published', 'activated', NULL, NULL, NULL, NULL),
(36, 17, 6, 16, 'published', 'activated', NULL, NULL, NULL, NULL),
(37, 19, 7, 11, 'published', 'activated', NULL, NULL, NULL, NULL),
(38, 19, 8, 12, 'published', 'activated', NULL, NULL, NULL, NULL),
(39, 19, 9, 13, 'published', 'activated', NULL, NULL, NULL, NULL),
(40, 19, 10, 14, 'published', 'activated', NULL, NULL, NULL, NULL),
(41, 19, 11, 20, 'published', 'activated', NULL, NULL, NULL, NULL),
(42, 19, 12, 20, 'published', 'activated', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE IF NOT EXISTS `courses` (
  `course_id` int(11) NOT NULL AUTO_INCREMENT,
  `course_code` varchar(10) DEFAULT NULL,
  `course_title` varchar(100) DEFAULT NULL,
  `course_credit` varchar(5) DEFAULT NULL,
  `semester_id` int(11) DEFAULT NULL,
  `status` enum('activated','deactivated') NOT NULL DEFAULT 'activated',
  `date_of_modification` varchar(20) DEFAULT NULL,
  `time_of_modification` varchar(30) DEFAULT NULL,
  `user_of_modification` varchar(100) DEFAULT NULL,
  `user_ip` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`course_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=53 ;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_id`, `course_code`, `course_title`, `course_credit`, `semester_id`, `status`, `date_of_modification`, `time_of_modification`, `user_of_modification`, `user_ip`) VALUES
(1, 'CSE 101', 'Structured Programming', '3', 1, 'activated', NULL, NULL, NULL, NULL),
(2, 'CSE 102', 'Discrete Mathematics', '3', 1, 'activated', NULL, NULL, NULL, NULL),
(3, 'STAT 103', 'Probability and Statistics for Engineer-I', '3', 1, 'activated', NULL, NULL, NULL, NULL),
(4, 'MATH 104', 'Calculus and Analytical ', '3', 1, 'activated', NULL, NULL, NULL, NULL),
(5, 'GE 105', 'Sociology', '3', 1, 'activated', NULL, NULL, NULL, NULL),
(6, 'SE 106', 'Introduction to Software Engineering', '3', 1, 'activated', NULL, NULL, NULL, NULL),
(7, 'CSE 201', 'Data Structure and Algorith', '3', 2, 'activated', NULL, NULL, NULL, NULL),
(8, 'EEE 202', 'Digital System Design', '3', 2, 'activated', NULL, NULL, NULL, NULL),
(9, 'STAT 203', 'Probability and Statistics for Engineer-II', '3', 2, 'activated', NULL, NULL, NULL, NULL),
(10, 'MATH 204', 'Ordinary Differential Equation', '3', 2, 'activated', NULL, NULL, NULL, NULL),
(11, 'SE 205', 'Theory of Computing ', '3', 2, 'activated', NULL, NULL, NULL, NULL),
(12, 'SE 206', 'Object Oriented Concepts-I', '3', 2, 'activated', NULL, NULL, NULL, NULL),
(13, 'CSE 301', 'Combinatorial Optimiaztion ', '3', 3, 'activated', NULL, NULL, NULL, NULL),
(14, 'CSE 302', 'Computer Architecture', '3', 3, 'activated', NULL, NULL, NULL, NULL),
(15, 'CSE 303', 'Data Communication and Networking', '3', 3, 'activated', NULL, NULL, NULL, NULL),
(16, 'MATH 304', 'Numerical Analysis for Engineers', '3', 3, 'activated', NULL, NULL, NULL, NULL),
(17, 'SE 305', 'Software Project Lab-I', '3', 3, 'activated', NULL, NULL, NULL, NULL),
(18, 'SE 306', 'Object Oriented Concepts-II', '3', 3, 'activated', NULL, NULL, NULL, NULL),
(19, 'CSE 401', 'Operating Systems and system Programming', '3', 4, 'activated', NULL, NULL, NULL, NULL),
(20, 'GE 402', 'Business Psychology', '3', 4, 'activated', NULL, NULL, NULL, NULL),
(21, 'CSE 403', 'Computer Networking', '3', 4, 'activated', NULL, NULL, NULL, NULL),
(22, 'CSE 404', 'Database Management System â€“ I', '3', 4, 'activated', NULL, NULL, NULL, NULL),
(23, 'BUS 405', 'Business Studies for Engineers', '3', 4, 'activated', NULL, NULL, NULL, NULL),
(24, 'SE 406', 'Software Requirements Spec and Analysis', '3', 4, 'activated', NULL, NULL, NULL, NULL),
(25, 'CSE 501', 'Parallel Computing', '3', 5, 'activated', NULL, NULL, NULL, NULL),
(26, 'CSE 502', 'Web Technology', '3', 5, 'activated', NULL, NULL, NULL, NULL),
(27, 'BUS 503', 'Business Communications', '3', 5, 'activated', NULL, NULL, NULL, NULL),
(28, 'CSE 504', 'Database Management System - II', '3', 5, 'activated', NULL, NULL, NULL, NULL),
(29, 'SE 505', 'Software Project Lab II', '3', 5, 'activated', NULL, NULL, NULL, NULL),
(30, 'SE 506', 'Design Patterns', '3', 5, 'activated', NULL, NULL, NULL, NULL),
(31, 'CSE 601', 'Distributed Systems', '3', 6, 'activated', NULL, NULL, NULL, NULL),
(32, 'BUS 602', 'Management Information Systems', '3', 6, 'activated', NULL, NULL, NULL, NULL),
(33, 'GE 603', 'Information Systems Ethics', '3', 6, 'activated', NULL, NULL, NULL, NULL),
(34, 'CSE 604', 'Artificial Intelligence', '3', 6, 'activated', NULL, NULL, NULL, NULL),
(35, 'SE 605', 'Software Testing and Quality Assurance', '3', 6, 'activated', NULL, NULL, NULL, NULL),
(36, 'SE 606', 'Software Design and Analysis', '3', 6, 'activated', NULL, NULL, NULL, NULL),
(37, 'SE 701', 'Internship', '18', 7, 'activated', NULL, NULL, NULL, NULL),
(38, 'SE 801', 'Eight Semester Course 1', '5', 8, 'activated', NULL, NULL, NULL, NULL),
(39, 'SE 802', 'Eight Semester Course 2', '5', 8, 'activated', NULL, NULL, NULL, NULL),
(40, 'SE 803', 'Eight Semester Course 3', '5', 8, 'activated', NULL, NULL, NULL, NULL),
(41, 'SE 804', 'Eight Semester Course 4', '3', 8, 'activated', NULL, NULL, NULL, NULL),
(42, 'MSE 101', 'MSSE 1st Semester Course 1', '5', 9, 'activated', NULL, NULL, NULL, NULL),
(43, 'MSE 102', 'MSSE 1st Semester Course 2', '5', 9, 'activated', NULL, NULL, NULL, NULL),
(44, 'MSE 103', 'MSSE 1st Semester Course 3', '5', 9, 'activated', NULL, NULL, NULL, NULL),
(45, 'MSE 201', 'MSSE 2nd Semester Course 1', '4', 10, 'activated', NULL, NULL, NULL, NULL),
(46, 'MSE 202', 'MSSE 2nd Semester Course 2', '4', 10, 'activated', NULL, NULL, NULL, NULL),
(47, 'MSE 203', 'MSSE 2nd Semester Course 3', '4', 10, 'activated', NULL, NULL, NULL, NULL),
(48, 'MSE 204', 'MSSE 2nd Semester Course 4', '4', 10, 'activated', NULL, NULL, NULL, NULL),
(49, 'MSE 301', 'MSSE 3rd Semester Course 1', '5', 11, 'activated', NULL, NULL, NULL, NULL),
(50, 'MSE 302', 'MSSE 3rd Semester Course 2', '5', 11, 'activated', NULL, NULL, NULL, NULL),
(51, 'MSE 303', 'MSSE 3rd Semester Course 3', '5', 11, 'activated', NULL, NULL, NULL, NULL),
(52, 'MSE 304', 'MSSE 3rd Semester Course 4', '5', 11, 'activated', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `current_exam_results`
--

CREATE TABLE IF NOT EXISTS `current_exam_results` (
  `current_exam_results_id` int(11) NOT NULL AUTO_INCREMENT,
  `current_exams_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `marks` varchar(5) DEFAULT NULL,
  `date_of_modification` varchar(30) DEFAULT NULL,
  `time_of_modification` varchar(30) DEFAULT NULL,
  `user_of_modification` int(11) DEFAULT NULL,
  `user_ip` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`current_exam_results_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=151 ;

--
-- Dumping data for table `current_exam_results`
--

INSERT INTO `current_exam_results` (`current_exam_results_id`, `current_exams_id`, `user_id`, `marks`, `date_of_modification`, `time_of_modification`, `user_of_modification`, `user_ip`) VALUES
(1, 1, 22, '20', '04-Oct-2013', '04:10:29', 0, '127.0.0.1'),
(2, 1, 23, '30', '04-Oct-2013', '04:10:29', 0, '127.0.0.1'),
(3, 1, 24, '15', '04-Oct-2013', '04:10:29', 0, '127.0.0.1'),
(4, 1, 25, '17', '04-Oct-2013', '04:10:29', 0, '127.0.0.1'),
(5, 1, 26, '16', '04-Oct-2013', '04:10:29', 0, '127.0.0.1'),
(6, 1, 27, '10', '04-Oct-2013', '04:10:29', 0, '127.0.0.1'),
(7, 1, 28, '17', '04-Oct-2013', '04:10:29', 0, '127.0.0.1'),
(8, 1, 29, '10', '04-Oct-2013', '04:10:29', 0, '127.0.0.1'),
(9, 1, 30, '7', '04-Oct-2013', '04:10:29', 0, '127.0.0.1'),
(10, 1, 31, '20', '04-Oct-2013', '04:10:29', 0, '127.0.0.1'),
(11, 2, 22, '20', '04-Oct-2013', '05:10:34', 0, '127.0.0.1'),
(12, 2, 23, '10', '04-Oct-2013', '05:10:34', 0, '127.0.0.1'),
(13, 2, 24, '30', '04-Oct-2013', '05:10:34', 0, '127.0.0.1'),
(14, 2, 25, '20', '04-Oct-2013', '05:10:34', 0, '127.0.0.1'),
(15, 2, 26, '10', '04-Oct-2013', '05:10:34', 0, '127.0.0.1'),
(16, 2, 27, '13', '04-Oct-2013', '05:10:34', 0, '127.0.0.1'),
(17, 2, 28, '29', '04-Oct-2013', '05:10:34', 0, '127.0.0.1'),
(18, 2, 29, '25', '04-Oct-2013', '05:10:34', 0, '127.0.0.1'),
(19, 2, 30, '27', '04-Oct-2013', '05:10:34', 0, '127.0.0.1'),
(20, 2, 31, '30', '04-Oct-2013', '05:10:34', 0, '127.0.0.1'),
(21, 3, 22, '10', '04-Oct-2013', '05:10:52', 0, '127.0.0.1'),
(22, 3, 23, '11', '04-Oct-2013', '05:10:52', 0, '127.0.0.1'),
(23, 3, 24, '12', '04-Oct-2013', '05:10:52', 0, '127.0.0.1'),
(24, 3, 25, '13', '04-Oct-2013', '05:10:52', 0, '127.0.0.1'),
(25, 3, 26, '14', '04-Oct-2013', '05:10:52', 0, '127.0.0.1'),
(26, 3, 27, '15', '04-Oct-2013', '05:10:52', 0, '127.0.0.1'),
(27, 3, 28, '16', '04-Oct-2013', '05:10:52', 0, '127.0.0.1'),
(28, 3, 29, '17', '04-Oct-2013', '05:10:52', 0, '127.0.0.1'),
(29, 3, 30, '18', '04-Oct-2013', '05:10:52', 0, '127.0.0.1'),
(30, 3, 31, '19', '04-Oct-2013', '05:10:52', 0, '127.0.0.1'),
(31, 4, 22, '9', '04-Oct-2013', '05:10:43', 0, '127.0.0.1'),
(32, 4, 23, '8.9', '04-Oct-2013', '05:10:43', 0, '127.0.0.1'),
(33, 4, 24, '4.7', '04-Oct-2013', '05:10:43', 0, '127.0.0.1'),
(34, 4, 25, '5', '04-Oct-2013', '05:10:43', 0, '127.0.0.1'),
(35, 4, 26, '7', '04-Oct-2013', '05:10:43', 0, '127.0.0.1'),
(36, 4, 27, '5', '04-Oct-2013', '05:10:43', 0, '127.0.0.1'),
(37, 4, 28, '4', '04-Oct-2013', '05:10:43', 0, '127.0.0.1'),
(38, 4, 29, '7', '04-Oct-2013', '05:10:43', 0, '127.0.0.1'),
(39, 4, 30, '9', '04-Oct-2013', '05:10:43', 0, '127.0.0.1'),
(40, 4, 31, '5', '04-Oct-2013', '05:10:43', 0, '127.0.0.1'),
(41, 5, 22, '5', '04-Oct-2013', '05:10:21', 0, '127.0.0.1'),
(42, 5, 23, '4', '04-Oct-2013', '05:10:21', 0, '127.0.0.1'),
(43, 5, 24, '6', '04-Oct-2013', '05:10:21', 0, '127.0.0.1'),
(44, 5, 25, '7', '04-Oct-2013', '05:10:21', 0, '127.0.0.1'),
(45, 5, 26, '4', '04-Oct-2013', '05:10:21', 0, '127.0.0.1'),
(46, 5, 27, '3', '04-Oct-2013', '05:10:21', 0, '127.0.0.1'),
(47, 5, 28, '6', '04-Oct-2013', '05:10:21', 0, '127.0.0.1'),
(48, 5, 29, '7', '04-Oct-2013', '05:10:21', 0, '127.0.0.1'),
(49, 5, 30, '6', '04-Oct-2013', '05:10:21', 0, '127.0.0.1'),
(50, 5, 31, '4', '04-Oct-2013', '05:10:21', 0, '127.0.0.1'),
(51, 6, 22, '56', '04-Oct-2013', '05:10:11', 0, '127.0.0.1'),
(52, 6, 23, '76', '04-Oct-2013', '05:10:11', 0, '127.0.0.1'),
(53, 6, 24, '67', '04-Oct-2013', '05:10:11', 0, '127.0.0.1'),
(54, 6, 25, '57', '04-Oct-2013', '05:10:11', 0, '127.0.0.1'),
(55, 6, 26, '56', '04-Oct-2013', '05:10:11', 0, '127.0.0.1'),
(56, 6, 27, '56', '04-Oct-2013', '05:10:11', 0, '127.0.0.1'),
(57, 6, 28, '67', '04-Oct-2013', '05:10:11', 0, '127.0.0.1'),
(58, 6, 29, '87', '04-Oct-2013', '05:10:11', 0, '127.0.0.1'),
(59, 6, 30, '87', '04-Oct-2013', '05:10:11', 0, '127.0.0.1'),
(60, 6, 31, '56', '04-Oct-2013', '05:10:11', 0, '127.0.0.1'),
(61, 7, 22, '54', '04-Oct-2013', '05:10:42', 0, '127.0.0.1'),
(62, 7, 23, '56', '04-Oct-2013', '05:10:42', 0, '127.0.0.1'),
(63, 7, 24, '56', '04-Oct-2013', '05:10:42', 0, '127.0.0.1'),
(64, 7, 25, '67', '04-Oct-2013', '05:10:42', 0, '127.0.0.1'),
(65, 7, 26, '7', '04-Oct-2013', '05:10:42', 0, '127.0.0.1'),
(66, 7, 27, '87', '04-Oct-2013', '05:10:42', 0, '127.0.0.1'),
(67, 7, 28, '87', '04-Oct-2013', '05:10:42', 0, '127.0.0.1'),
(68, 7, 29, '56', '04-Oct-2013', '05:10:42', 0, '127.0.0.1'),
(69, 7, 30, '54', '04-Oct-2013', '05:10:42', 0, '127.0.0.1'),
(70, 7, 31, '54', '04-Oct-2013', '05:10:42', 0, '127.0.0.1'),
(71, 8, 32, '10', '04-Oct-2013', '08:10:13', 0, '127.0.0.1'),
(72, 8, 33, '20', '04-Oct-2013', '08:10:13', 0, '127.0.0.1'),
(73, 8, 34, '10', '04-Oct-2013', '08:10:13', 0, '127.0.0.1'),
(74, 8, 35, '11', '04-Oct-2013', '08:10:13', 0, '127.0.0.1'),
(75, 8, 36, '23', '04-Oct-2013', '08:10:13', 0, '127.0.0.1'),
(76, 8, 37, '30', '04-Oct-2013', '08:10:13', 0, '127.0.0.1'),
(77, 8, 38, '12', '04-Oct-2013', '08:10:13', 0, '127.0.0.1'),
(78, 8, 39, '23', '04-Oct-2013', '08:10:13', 0, '127.0.0.1'),
(79, 8, 40, '25', '04-Oct-2013', '08:10:13', 0, '127.0.0.1'),
(80, 8, 41, '27', '04-Oct-2013', '08:10:13', 0, '127.0.0.1'),
(81, 9, 22, '54', '05-Oct-2013', '11:10:46', 0, '127.0.0.1'),
(82, 9, 23, '54', '05-Oct-2013', '11:10:46', 0, '127.0.0.1'),
(83, 9, 24, '54', '05-Oct-2013', '11:10:46', 0, '127.0.0.1'),
(84, 9, 25, '5454', '05-Oct-2013', '11:10:46', 0, '127.0.0.1'),
(85, 9, 26, '56', '05-Oct-2013', '11:10:46', 0, '127.0.0.1'),
(86, 9, 27, '56', '05-Oct-2013', '11:10:46', 0, '127.0.0.1'),
(87, 9, 28, '556', '05-Oct-2013', '11:10:46', 0, '127.0.0.1'),
(88, 9, 29, '67', '05-Oct-2013', '11:10:46', 0, '127.0.0.1'),
(89, 9, 30, '67', '05-Oct-2013', '11:10:46', 0, '127.0.0.1'),
(90, 9, 31, '76', '05-Oct-2013', '11:10:46', 0, '127.0.0.1'),
(91, 10, 22, '7', '06-Oct-2013', '01:10:57', 0, '127.0.0.1'),
(92, 10, 23, '56', '06-Oct-2013', '01:10:57', 0, '127.0.0.1'),
(93, 10, 24, '675', '06-Oct-2013', '01:10:57', 0, '127.0.0.1'),
(94, 10, 25, '675', '06-Oct-2013', '01:10:57', 0, '127.0.0.1'),
(95, 10, 26, '675', '06-Oct-2013', '01:10:57', 0, '127.0.0.1'),
(96, 10, 27, '675', '06-Oct-2013', '01:10:57', 0, '127.0.0.1'),
(97, 10, 28, '67', '06-Oct-2013', '01:10:57', 0, '127.0.0.1'),
(98, 10, 29, '57', '06-Oct-2013', '01:10:57', 0, '127.0.0.1'),
(99, 10, 30, '876', '06-Oct-2013', '01:10:57', 0, '127.0.0.1'),
(100, 10, 31, '876', '06-Oct-2013', '01:10:57', 0, '127.0.0.1'),
(101, 11, 22, '7', '06-Oct-2013', '01:10:57', 0, '127.0.0.1'),
(102, 11, 23, '56', '06-Oct-2013', '01:10:57', 0, '127.0.0.1'),
(103, 11, 24, '675', '06-Oct-2013', '01:10:57', 0, '127.0.0.1'),
(104, 11, 25, '675', '06-Oct-2013', '01:10:57', 0, '127.0.0.1'),
(105, 11, 26, '675', '06-Oct-2013', '01:10:57', 0, '127.0.0.1'),
(106, 11, 27, '675', '06-Oct-2013', '01:10:57', 0, '127.0.0.1'),
(107, 11, 28, '67', '06-Oct-2013', '01:10:57', 0, '127.0.0.1'),
(108, 11, 29, '57', '06-Oct-2013', '01:10:57', 0, '127.0.0.1'),
(109, 11, 30, '876', '06-Oct-2013', '01:10:57', 0, '127.0.0.1'),
(110, 11, 31, '876', '06-Oct-2013', '01:10:57', 0, '127.0.0.1'),
(111, 12, 22, '76576', '06-Oct-2013', '01:10:46', 0, '127.0.0.1'),
(112, 12, 23, '756', '06-Oct-2013', '01:10:46', 0, '127.0.0.1'),
(113, 12, 24, '67', '06-Oct-2013', '01:10:46', 0, '127.0.0.1'),
(114, 12, 25, '567', '06-Oct-2013', '01:10:46', 0, '127.0.0.1'),
(115, 12, 26, '57', '06-Oct-2013', '01:10:46', 0, '127.0.0.1'),
(116, 12, 27, '65', '06-Oct-2013', '01:10:46', 0, '127.0.0.1'),
(117, 12, 28, '76', '06-Oct-2013', '01:10:46', 0, '127.0.0.1'),
(118, 12, 29, '5', '06-Oct-2013', '01:10:46', 0, '127.0.0.1'),
(119, 12, 30, '675', '06-Oct-2013', '01:10:46', 0, '127.0.0.1'),
(120, 12, 31, '657', '06-Oct-2013', '01:10:46', 0, '127.0.0.1'),
(121, 13, 22, '76576', '06-Oct-2013', '01:10:46', 0, '127.0.0.1'),
(122, 13, 23, '756', '06-Oct-2013', '01:10:46', 0, '127.0.0.1'),
(123, 13, 24, '67', '06-Oct-2013', '01:10:46', 0, '127.0.0.1'),
(124, 13, 25, '567', '06-Oct-2013', '01:10:46', 0, '127.0.0.1'),
(125, 13, 26, '57', '06-Oct-2013', '01:10:46', 0, '127.0.0.1'),
(126, 13, 27, '65', '06-Oct-2013', '01:10:46', 0, '127.0.0.1'),
(127, 13, 28, '76', '06-Oct-2013', '01:10:46', 0, '127.0.0.1'),
(128, 13, 29, '5', '06-Oct-2013', '01:10:46', 0, '127.0.0.1'),
(129, 13, 30, '675', '06-Oct-2013', '01:10:46', 0, '127.0.0.1'),
(130, 13, 31, '657', '06-Oct-2013', '01:10:46', 0, '127.0.0.1'),
(131, 14, 22, '75', '06-Oct-2013', '01:10:09', 0, '127.0.0.1'),
(132, 14, 23, '75', '06-Oct-2013', '01:10:09', 0, '127.0.0.1'),
(133, 14, 24, '675', '06-Oct-2013', '01:10:09', 0, '127.0.0.1'),
(134, 14, 25, '675', '06-Oct-2013', '01:10:09', 0, '127.0.0.1'),
(135, 14, 26, '675', '06-Oct-2013', '01:10:09', 0, '127.0.0.1'),
(136, 14, 27, '67567', '06-Oct-2013', '01:10:09', 0, '127.0.0.1'),
(137, 14, 28, '567', '06-Oct-2013', '01:10:09', 0, '127.0.0.1'),
(138, 14, 29, '567', '06-Oct-2013', '01:10:09', 0, '127.0.0.1'),
(139, 14, 30, '5', '06-Oct-2013', '01:10:09', 0, '127.0.0.1'),
(140, 14, 31, '8768', '06-Oct-2013', '01:10:09', 0, '127.0.0.1'),
(141, 15, 22, '5656', '07-Oct-2013', '01:10:44', 0, '127.0.0.1'),
(142, 15, 23, '56', '07-Oct-2013', '01:10:44', 0, '127.0.0.1'),
(143, 15, 24, '24', '07-Oct-2013', '01:10:44', 0, '127.0.0.1'),
(144, 15, 25, '56', '07-Oct-2013', '01:10:44', 0, '127.0.0.1'),
(145, 15, 26, '55', '07-Oct-2013', '01:10:44', 0, '127.0.0.1'),
(146, 15, 27, '55', '07-Oct-2013', '01:10:44', 0, '127.0.0.1'),
(147, 15, 28, '5', '07-Oct-2013', '01:10:44', 0, '127.0.0.1'),
(148, 15, 29, '54', '07-Oct-2013', '01:10:44', 0, '127.0.0.1'),
(149, 15, 30, '45', '07-Oct-2013', '01:10:44', 0, '127.0.0.1'),
(150, 15, 31, '4', '07-Oct-2013', '01:10:44', 0, '127.0.0.1');

-- --------------------------------------------------------

--
-- Table structure for table `current_exams`
--

CREATE TABLE IF NOT EXISTS `current_exams` (
  `current_exams_id` int(11) NOT NULL AUTO_INCREMENT,
  `exam_name` varchar(50) DEFAULT NULL,
  `course_log_id` int(11) DEFAULT NULL,
  `total_marks` varchar(5) DEFAULT NULL,
  `marks_percentage` varchar(5) DEFAULT NULL,
  `exam_type` varchar(100) DEFAULT NULL,
  `top_marks` varchar(5) DEFAULT NULL,
  `topper_name` varchar(300) DEFAULT NULL,
  `exam_date` varchar(30) DEFAULT NULL,
  `access_status` enum('unlocked','locked','published') NOT NULL DEFAULT 'unlocked',
  `status` enum('activated','deactivated') NOT NULL DEFAULT 'activated',
  `date_of_modification` varchar(30) DEFAULT NULL,
  `time_of_modification` varchar(30) DEFAULT NULL,
  `user_of_modification` int(11) DEFAULT NULL,
  `user_ip` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`current_exams_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `current_exams`
--

INSERT INTO `current_exams` (`current_exams_id`, `exam_name`, `course_log_id`, `total_marks`, `marks_percentage`, `exam_type`, `top_marks`, `topper_name`, `exam_date`, `access_status`, `status`, `date_of_modification`, `time_of_modification`, `user_of_modification`, `user_ip`) VALUES
(1, 'Mid Term 1 tested', 19, '30', '10', 'yugyug', '30', NULL, '04-Oct-2013', 'locked', 'deactivated', '05-Oct-2013', '11:10:37', 0, '127.0.0.1'),
(2, 'Mid Term 2', 19, '30', '10', 'iug', '30', NULL, '04-Oct-2013', 'locked', 'deactivated', '05-Oct-2013', '11:10:48', 0, '127.0.0.1'),
(3, 'Assignment 1', 19, '20', '10', 'ygv', '19', NULL, '04-Oct-2013', 'locked', 'activated', '04-Oct-2013', '05:10:52', 0, '127.0.0.1'),
(4, 'Assignment 2', 19, '10', '10', 'gh', '9', NULL, '04-Oct-2013', 'locked', 'activated', '04-Oct-2013', '05:10:43', 0, '127.0.0.1'),
(5, 'Attendance', 19, '10', '10', 'yuv', '7', NULL, '04-Oct-2013', 'locked', 'activated', '04-Oct-2013', '05:10:21', 0, '127.0.0.1'),
(6, 'Final', 19, '100', '50', 'uyg', '87', NULL, '04-Oct-2013', 'locked', 'activated', '04-Oct-2013', '08:10:25', 0, '127.0.0.1'),
(7, 'Final 2', 19, '100', '20', '65', '87', NULL, '04-Oct-2013', 'locked', 'deactivated', '04-Oct-2013', '05:10:48', 0, '127.0.0.1'),
(8, 'SE 206', 42, '30', '20', 'yugv', '30', NULL, '05-Oct-2013', 'unlocked', 'activated', '04-Oct-2013', '08:10:13', 0, '127.0.0.1'),
(9, 'Extra', 19, '566', '20', '87og', '5454', NULL, '05-Oct-2013', 'locked', 'activated', '05-Oct-2013', '11:10:46', 0, '127.0.0.1'),
(10, 'Testing', 23, '10', '32', 'uyfgyuf', '876', NULL, '06-Oct-2013', 'unlocked', 'activated', '06-Oct-2013', '01:10:55', 0, '127.0.0.1'),
(11, 'Testing', 23, '10', '32', 'uyfgyuf', '876', NULL, '06-Oct-2013', 'unlocked', 'activated', '06-Oct-2013', '01:10:55', 0, '127.0.0.1'),
(12, 'qqq', 23, '87', '10', 'qqq', '76576', NULL, '06-Oct-2013', 'unlocked', 'activated', '06-Oct-2013', '01:10:46', 0, '127.0.0.1'),
(13, 'qqq', 23, '87', '10', 'qqq', '76576', NULL, '06-Oct-2013', 'unlocked', 'activated', '06-Oct-2013', '01:10:46', 0, '127.0.0.1'),
(14, 'yyy', 23, '6767', '16', 'yyyy', '67567', NULL, '06-Oct-2013', 'unlocked', 'activated', '06-Oct-2013', '01:10:08', 0, '127.0.0.1'),
(15, 'mid term', 22, '100', '10', 'mcq', '5656', NULL, '03-Oct-2013', 'unlocked', 'deactivated', '08-Oct-2013', '12:10:49', 0, '127.0.0.1');

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE IF NOT EXISTS `documents` (
  `user_id` int(11) NOT NULL,
  `document_id` int(111) NOT NULL AUTO_INCREMENT,
  `document_name` varchar(255) NOT NULL,
  `document_dir` varchar(100) NOT NULL,
  `document_size` varchar(100) NOT NULL,
  `document_type` varchar(100) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `student_id` varchar(10) DEFAULT NULL,
  `course_code` varchar(11) NOT NULL,
  `uploaded_time` varchar(40) NOT NULL,
  `document_description` varchar(255) DEFAULT NULL,
  `user_type` varchar(10) NOT NULL,
  `doc_status` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`document_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=50 ;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`user_id`, `document_id`, `document_name`, `document_dir`, `document_size`, `document_type`, `user_name`, `student_id`, `course_code`, `uploaded_time`, `document_description`, `user_type`, `doc_status`) VALUES
(22, 44, 'genetic algorithm', 'Software_Engineering_A_Practitioners_Approach_7th_Edition_(Pressman).pdf', '20530.88kb', 'assignment', 'Tanim', NULL, 'CSE 102', ' 2013 / 10 / 08 - 08:10 am', '', 'student', 'activate'),
(22, 45, 'RPC', 'ProvIntsec_paper_with_corrections_(1).pdf', '698.79kb', 'assignment', 'Tanim', NULL, 'CSE 102', ' 2013 / 10 / 08 - 08:10 am', '', 'student', 'activate'),
(22, 46, 'dfd', 'misn11.pdf', '69.55kb', 'assignment', 'Tanim', NULL, 'STAT 103', ' 2013 / 10 / 08 - 08:12 am', '', 'student', 'activate'),
(22, 47, 'IIT mission vision', 'Artificial_Intelligence-A_Guide_to_Intelligent_Systems.pdf', '12513.05kb', 'assignment', 'Tanim', NULL, 'STAT 103', ' 2013 / 10 / 08 - 08:20 am', '', 'student', 'activate'),
(22, 49, 'new', 'arc.docx', '23.95kb', 'assignment', 'Tanim', 'bsse0101', 'CSE 101', ' 2013 / 10 / 08 - 12:44 pm', 'rw', 'student', 'activate');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User'),
(3, 'main_admin', 'admin of all admin'),
(4, 'site_admin', 'website admin'),
(5, 'exam_admin', 'exam committee admins'),
(6, 'admission_admin', 'admission management admin'),
(7, 'faculty_admin', 'faculty related admin'),
(8, 'teachers', 'all teacher users'),
(9, 'students', 'all student users');

-- --------------------------------------------------------

--
-- Table structure for table `list_of_directors`
--

CREATE TABLE IF NOT EXISTS `list_of_directors` (
  `user_id` int(11) DEFAULT NULL,
  `from` varchar(20) DEFAULT NULL,
  `to` varchar(20) DEFAULT NULL,
  `status` enum('activated','deactivated') NOT NULL DEFAULT 'activated',
  `date_of_modification` varchar(30) DEFAULT NULL,
  `time_of_modification` varchar(30) DEFAULT NULL,
  `user_of_modification` int(11) DEFAULT NULL,
  `user_ip` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `list_of_directors`
--

INSERT INTO `list_of_directors` (`user_id`, `from`, `to`, `status`, `date_of_modification`, `time_of_modification`, `user_of_modification`, `user_ip`) VALUES
(NULL, '2006', '2008', 'activated', NULL, NULL, NULL, NULL),
(NULL, '2008', '2011', 'activated', NULL, NULL, NULL, NULL),
(NULL, '2011', 'present', 'activated', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE IF NOT EXISTS `login_attempts` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varbinary(16) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `message_details`
--

CREATE TABLE IF NOT EXISTS `message_details` (
  `message_details_id` int(11) NOT NULL AUTO_INCREMENT,
  `message_description` varchar(4000) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `date` varchar(20) DEFAULT NULL,
  `time` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`message_details_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `message_receivers`
--

CREATE TABLE IF NOT EXISTS `message_receivers` (
  `message_details_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `massege_sent_to` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `meta`
--

CREATE TABLE IF NOT EXISTS `meta` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` mediumint(8) unsigned DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `meta`
--

INSERT INTO `meta` (`id`, `user_id`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1, 1, 'Admin', 'istrator', 'ADMIN', '0');

-- --------------------------------------------------------

--
-- Table structure for table `news_events`
--

CREATE TABLE IF NOT EXISTS `news_events` (
  `news_events_id` int(11) NOT NULL AUTO_INCREMENT,
  `news_events_header` varchar(500) DEFAULT NULL,
  `news_events_details` varchar(2000) DEFAULT NULL,
  `news_events_place` varchar(200) DEFAULT NULL,
  `news_events_date` varchar(20) DEFAULT NULL,
  `news_events_time` varchar(20) DEFAULT NULL,
  `news_events_type` enum('news_events','upcoming_events') DEFAULT NULL,
  `news_status_timestamp` timestamp NULL DEFAULT NULL,
  `status` enum('activated','deactivated') NOT NULL DEFAULT 'activated',
  `date_of_modification` varchar(20) DEFAULT NULL,
  `time_of_modification` varchar(30) DEFAULT NULL,
  `user_of_modification` int(11) DEFAULT NULL,
  `user_ip` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`news_events_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `news_events`
--

INSERT INTO `news_events` (`news_events_id`, `news_events_header`, `news_events_details`, `news_events_place`, `news_events_date`, `news_events_time`, `news_events_type`, `news_status_timestamp`, `status`, `date_of_modification`, `time_of_modification`, `user_of_modification`, `user_ip`) VALUES
(1, 'Programming Contest', 'vvghvhgvhg', 'IIT Premises ', '12th June 2013', '12:00 pm', 'upcoming_events', '2013-10-04 17:00:32', 'deactivated', NULL, NULL, NULL, NULL),
(2, 'Iftar Parth', 'bhghgj hgghj', 'IIT', '31st July 2013', '6:55 pm', 'upcoming_events', NULL, 'deactivated', NULL, NULL, NULL, NULL),
(3, 'dfsdfs', 'sdfsfd', 'sdfsdf', '08-Oct-2013', '0', 'upcoming_events', '0000-00-00 00:00:00', 'activated', '07-Oct-2013', '04:10:19', 0, '127.0.0.1'),
(4, 'asd', 'asd', 'asdad', '16-Oct-2013', '0', 'upcoming_events', '0000-00-00 00:00:00', 'activated', '07-Oct-2013', '04:10:14', 0, '127.0.0.1'),
(5, 'adsa', 'sdasd', 'asdasd', '09-Oct-2013', '0', 'upcoming_events', '0000-00-00 00:00:00', 'activated', '07-Oct-2013', '11:10:40', 0, '127.0.0.1'),
(6, 'dasd', 'asdasd', 'asdasd', '08-Oct-2013', '18:08:45', 'upcoming_events', '0000-00-00 00:00:00', 'activated', '07-Oct-2013', '12:10:02', 0, '127.0.0.1'),
(7, 'asif', 'sdflkh', 'klsdnfn', '08-Oct-2013', '18:08:45', 'upcoming_events', '0000-00-00 00:00:00', 'activated', '07-Oct-2013', '12:10:55', 0, '127.0.0.1'),
(8, ' fsfsdf', ' sdfsf', ' sdfsdf', '03-Oct-2013', '02:02:00', 'upcoming_events', '2013-10-08 20:10:12', 'activated', '09-Oct-2013', '02:10:12', 0, '::1');

-- --------------------------------------------------------

--
-- Table structure for table `news_events_pictures`
--

CREATE TABLE IF NOT EXISTS `news_events_pictures` (
  `news_events_pictures_id` int(11) NOT NULL,
  `news_events_id` int(11) DEFAULT NULL,
  `news_events_small_pic_path` varchar(500) DEFAULT NULL,
  `news_events_big_pic_path` varchar(500) DEFAULT NULL,
  `status` enum('activated','deactivated') DEFAULT NULL,
  `date_of_modification` varchar(20) DEFAULT NULL,
  `time_of_modification` varchar(30) DEFAULT NULL,
  `user_of_modification` int(11) DEFAULT NULL,
  `user_ip` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`news_events_pictures_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `notice_announcement`
--

CREATE TABLE IF NOT EXISTS `notice_announcement` (
  `notice_announcement_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(70) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `status` enum('activated','deactivated') DEFAULT 'activated',
  `date_of_modification` varchar(15) DEFAULT NULL,
  `user_ip` varchar(30) DEFAULT NULL,
  `user_of_modification` int(11) DEFAULT NULL,
  PRIMARY KEY (`notice_announcement_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=69 ;

--
-- Dumping data for table `notice_announcement`
--

INSERT INTO `notice_announcement` (`notice_announcement_id`, `title`, `description`, `status`, `date_of_modification`, `user_ip`, `user_of_modification`) VALUES
(1, 'a', 'q25', 'activated', '2013-10-09', NULL, NULL),
(2, 'class suspend again', 'suspend from 1.1.15 to 31.12.15', 'activated', '2013-10-06', NULL, NULL),
(3, '123', '321456987', 'deactivated', '2013-10-06', NULL, NULL),
(4, 'new Test', 'uykfgu', 'deactivated', '2013-10-05', NULL, NULL),
(5, 'Test 2', 'kjuh', 'deactivated', '2013-10-05', NULL, NULL),
(6, 'Test 3', 'iuh', 'activated', '2013-10-05', NULL, NULL),
(7, '$$', '$$', 'activated', '2013-10-05', NULL, NULL),
(8, 'uyfgyuf', 'yjtf', 'activated', '2013-10-05', NULL, NULL),
(9, 'yjtt', 'tdy', 'activated', '2013-10-05', NULL, NULL),
(10, 'aaaaaaaaa', 'aaaaaaaaaa', 'activated', '2013-10-06', NULL, NULL),
(11, 'aaa', 'aa', 'activated', '2013-10-05', NULL, NULL),
(12, 'aaa', 'aaa', 'deactivated', '2013-10-05', NULL, NULL),
(13, 'zzzzzz', 'zzzzzzzzzzzz', 'activated', '2013-10-06', NULL, NULL),
(14, 'safdwaef', 'sefsa', 'activated', '2013-10-05', NULL, NULL),
(15, 'zdrgdzrg', 'zdrgzd', 'activated', '2013-10-05', NULL, NULL),
(16, 'Hello', 'uyg', 'activated', '2013-10-06', NULL, NULL),
(17, 'sefds', 'se', 'activated', '2013-10-05', NULL, NULL),
(18, 'tttt', 'ttt', 'activated', '2013-10-05', NULL, NULL),
(19, 'q2e', 'q2e', 'deactivated', '2013-10-06', NULL, NULL),
(20, 'wre', 'wr', 'deactivated', '2013-10-06', NULL, NULL),
(21, 'jjj', 'jj', 'deactivated', '2013-10-06', NULL, NULL),
(22, '', '..........................', 'activated', '2013-10-06', NULL, NULL),
(23, 'qqqqqqqq', 'qqqqqqqqqqqqqq', 'activated', '2013-10-06', NULL, NULL),
(24, '1111111', '1111111111111', 'activated', '2013-10-06', NULL, NULL),
(25, '2', '2', 'activated', '2013-10-06', NULL, NULL),
(26, '3', '3', 'activated', '2013-10-06', NULL, NULL),
(27, '4', '4', 'activated', '2013-10-06', NULL, NULL),
(28, '5', '5', 'activated', '2013-10-06', NULL, NULL),
(29, '6', '6', 'activated', '2013-10-06', NULL, NULL),
(30, '7', '7', 'activated', '2013-10-06', NULL, NULL),
(31, '8', '8', 'activated', '2013-10-06', NULL, NULL),
(32, '9', '9', 'activated', '2013-10-06', NULL, NULL),
(33, '10', '01', 'activated', '2013-10-06', NULL, NULL),
(34, '11', '11', 'activated', '2013-10-06', NULL, NULL),
(35, '12', '12', 'activated', '2013-10-06', NULL, NULL),
(36, '13', '13', 'activated', '2013-10-06', NULL, NULL),
(37, '14', '14', 'activated', '2013-10-06', NULL, NULL),
(38, '15', '145', 'activated', '2013-10-06', NULL, NULL),
(39, '21', '21', 'activated', '2013-10-06', NULL, NULL),
(40, '22', '22', 'activated', '2013-10-06', NULL, NULL),
(41, 'a', 'a', 'activated', '2013-10-06', NULL, NULL),
(42, 'q', 'q', 'activated', '2013-10-06', NULL, NULL),
(43, 'w', 'w', 'activated', '2013-10-06', NULL, NULL),
(44, 'qwe', 'qwe', 'activated', '2013-10-06', NULL, NULL),
(45, 'abc', 'abc', 'activated', '2013-10-06', NULL, NULL),
(46, '123', '123', 'activated', '2013-10-06', NULL, NULL),
(47, '31', '31', 'deactivated', '2013-10-06', NULL, NULL),
(48, '32', '3222', 'activated', '2013-10-06', NULL, NULL),
(49, '21', '123', 'activated', '2013-10-06', NULL, NULL),
(50, '123', '321', 'activated', '2013-10-06', NULL, NULL),
(51, '43', '43', 'deactivated', '2013-10-06', NULL, NULL),
(52, '12', '323233', 'activated', '2013-10-06', NULL, NULL),
(53, 'qqqq', '36333', 'deactivated', '2013-10-06', NULL, NULL),
(54, 'aaa', 'aaaa', 'activated', '2013-10-06', NULL, NULL),
(55, '21', '21', 'deactivated', '2013-10-06', NULL, NULL),
(56, '32', '23', 'activated', '2013-10-06', NULL, NULL),
(57, '147', '741234', 'deactivated', '2013-10-06', NULL, NULL),
(58, '44444444445', '14', 'deactivated', '2013-10-06', NULL, NULL),
(59, '1221', '21213', 'deactivated', '2013-10-06', NULL, NULL),
(60, '21', '21', 'activated', '2013-10-06', NULL, NULL),
(61, '123', '123123', 'deactivated', '2013-10-07', NULL, NULL),
(62, '123', '123123', 'activated', '2013-10-06', NULL, NULL),
(63, '123sdgsdgsdgsdg', '123123sdgsgsdg', 'deactivated', '2013-10-07', NULL, NULL),
(64, '121', '121', 'activated', '2013-10-07', NULL, NULL),
(65, '258', '258', 'deactivated', '2013-10-07', NULL, NULL),
(66, '21', '212', 'activated', '2013-10-07', NULL, NULL),
(67, 'New not', 'ice breakers', 'deactivated', '2013-10-09', NULL, NULL),
(68, 'dfasdg', 'ghdfhrtjyt', 'activated', '2013-10-09', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `notification_files_in_semester_log`
--

CREATE TABLE IF NOT EXISTS `notification_files_in_semester_log` (
  `p_n_files_id` int(11) NOT NULL AUTO_INCREMENT,
  `notification_in_semester_log_id` int(11) DEFAULT NULL,
  `file_path` varchar(100) DEFAULT NULL,
  `file_name` varchar(100) DEFAULT NULL,
  `file_size` varchar(11) DEFAULT NULL,
  `date_of_modification` varchar(30) DEFAULT NULL,
  `time_of_modification` varchar(30) DEFAULT NULL,
  `user_of_modification` int(11) DEFAULT NULL,
  `user_ip` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`p_n_files_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `notification_files_in_semester_log`
--

INSERT INTO `notification_files_in_semester_log` (`p_n_files_id`, `notification_in_semester_log_id`, `file_path`, `file_name`, `file_size`, `date_of_modification`, `time_of_modification`, `user_of_modification`, `user_ip`) VALUES
(1, 5, NULL, 'jkl', NULL, NULL, NULL, NULL, NULL),
(2, 5, NULL, 'kl', NULL, NULL, NULL, NULL, NULL),
(3, 6, NULL, 'k', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `notifications_in_semester_log`
--

CREATE TABLE IF NOT EXISTS `notifications_in_semester_log` (
  `notification_in_semester_log_id` int(11) NOT NULL AUTO_INCREMENT,
  `semester_log_id` int(11) DEFAULT NULL,
  `notification` varchar(500) DEFAULT NULL,
  `date_of_modification` varchar(30) DEFAULT NULL,
  `time_of_modification` varchar(30) DEFAULT NULL,
  `status` enum('activated','deactivated') NOT NULL DEFAULT 'activated',
  `user_of_modification` int(11) DEFAULT NULL,
  `user_ip` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`notification_in_semester_log_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `notifications_in_semester_log`
--

INSERT INTO `notifications_in_semester_log` (`notification_in_semester_log_id`, `semester_log_id`, `notification`, `date_of_modification`, `time_of_modification`, `status`, `user_of_modification`, `user_ip`) VALUES
(1, 1, 'Hello First Batch- Here is a notification.... Please Watch This... He He He..', '17th July 2013', '12:00 pm', 'activated', NULL, NULL),
(2, 2, 'Hello Second Batch- Here is a notification.... Please Watch This... He He He..', '17th July 2013', '6:55 pm', 'activated', NULL, NULL),
(3, 3, 'Hello Third Batch- Here is a notification.... Please Watch This... He He He..', '17th July 2013', '6:55 pm', 'activated', NULL, NULL),
(4, 4, 'Hello Fourth Batch- Here is a notification.... Please Watch This... He He He..', '17th July 2013', '6:55 pm', 'activated', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `post_details`
--

CREATE TABLE IF NOT EXISTS `post_details` (
  `post_details_id` int(11) NOT NULL AUTO_INCREMENT,
  `post_description` varchar(3000) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `date` varchar(20) DEFAULT NULL,
  `time` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`post_details_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `post_recievers`
--

CREATE TABLE IF NOT EXISTS `post_recievers` (
  `post_details_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `tagged_with` varchar(5000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE IF NOT EXISTS `profile` (
  `username` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `e_mail` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `social_network_address` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `ImageDirectory` varchar(1000) NOT NULL,
  `ImageName` varchar(1000) NOT NULL,
  `description` varchar(5000) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`username`, `user_id`, `e_mail`, `contact`, `social_network_address`, `address`, `ImageDirectory`, `ImageName`, `description`) VALUES
('Shanto ', 22, 'bit0321', '01554', 'Facebook', 'SK', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `program_notification_files`
--

CREATE TABLE IF NOT EXISTS `program_notification_files` (
  `program_notification_files_id` int(11) NOT NULL AUTO_INCREMENT,
  `program_notification_id` int(11) DEFAULT NULL,
  `file_path` varchar(100) DEFAULT NULL,
  `file_name` varchar(100) DEFAULT NULL,
  `file_size` varchar(11) DEFAULT NULL,
  `status` enum('activated','deactivated') NOT NULL DEFAULT 'activated',
  `date_of_modification` varchar(30) DEFAULT NULL,
  `time_of_modification` varchar(30) DEFAULT NULL,
  `user_of_modification` int(11) DEFAULT NULL,
  `user_ip` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`program_notification_files_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `program_notifications`
--

CREATE TABLE IF NOT EXISTS `program_notifications` (
  `program_notification_id` int(11) NOT NULL AUTO_INCREMENT,
  `program_id` int(11) DEFAULT NULL,
  `notification` varchar(500) DEFAULT NULL,
  `date_of_modification` varchar(30) DEFAULT NULL,
  `time_of_modification` varchar(30) DEFAULT NULL,
  `status` enum('activated','deactivated') NOT NULL DEFAULT 'activated',
  `user_of_modification` int(11) DEFAULT NULL,
  `user_ip` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`program_notification_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `program_notifications`
--

INSERT INTO `program_notifications` (`program_notification_id`, `program_id`, `notification`, `date_of_modification`, `time_of_modification`, `status`, `user_of_modification`, `user_ip`) VALUES
(1, 1, 'Hello BSSE Students... This is a Demo Notice', '12th June 2013', '12:00 pm', 'activated', NULL, NULL),
(2, 2, 'Hello MSE Students... This is a Demo Notice', '17th July 2013', '6:55 pm', 'activated', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `programs`
--

CREATE TABLE IF NOT EXISTS `programs` (
  `program_id` int(11) NOT NULL AUTO_INCREMENT,
  `program_name` varchar(20) NOT NULL,
  `program_description` varchar(2000) DEFAULT NULL,
  `status` enum('activated','deactivated') NOT NULL DEFAULT 'activated',
  `date_of_modification` varchar(20) DEFAULT NULL,
  `time_of_modification` varchar(20) DEFAULT NULL,
  `user_of_modification` int(11) DEFAULT NULL,
  `user_ip` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`program_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `programs`
--

INSERT INTO `programs` (`program_id`, `program_name`, `program_description`, `status`, `date_of_modification`, `time_of_modification`, `user_of_modification`, `user_ip`) VALUES
(1, 'BSSE', 'Bachelor of Science in Software Engineering', 'activated', NULL, NULL, NULL, NULL),
(2, 'MSE', 'Master of Science in Software Engineering', 'activated', NULL, NULL, NULL, NULL),
(3, 'MSE (Evening)', 'Master of Science in Software Engineering', 'activated', NULL, NULL, NULL, NULL),
(4, 'PGDIT', 'Post Graduation in Software Engineering', 'activated', NULL, NULL, NULL, NULL),
(5, 'Short Course', 'Short Courses', 'activated', NULL, NULL, NULL, NULL),
(6, 'BIT', 'Bachelor of Information Technology', 'activated', NULL, NULL, NULL, NULL),
(7, 'MIT', 'Master of Information Technology', 'activated', NULL, NULL, NULL, NULL),
(8, 'MIT (Evening)', 'Master of Information Technology', 'activated', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `project_thesis`
--

CREATE TABLE IF NOT EXISTS `project_thesis` (
  `project_thesis_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `description` varchar(300) DEFAULT NULL,
  `type` enum('project','thesis') NOT NULL,
  `status` enum('activated','deactivated') NOT NULL DEFAULT 'activated',
  `user_id` int(11) NOT NULL,
  `user_ip` varchar(30) NOT NULL,
  `date_of_modification` date NOT NULL,
  PRIMARY KEY (`project_thesis_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `project_thesis`
--

INSERT INTO `project_thesis` (`project_thesis_id`, `title`, `description`, `type`, `status`, `user_id`, `user_ip`, `date_of_modification`) VALUES
(1, 'onee', 'hahah', 'project', 'deactivated', 22, '127.0.0.1', '2013-10-06'),
(2, 'two', 'kakak', 'project', 'activated', 22, '10.10.10.10', '2013-10-02'),
(5, 'one2', 'lolu', 'thesis', 'deactivated', 22, '127.0.0.1', '2013-10-06'),
(6, ':)', 'lll', 'project', 'activated', 22, '127.0.0.1', '2013-10-06'),
(7, 'another', ':P', 'thesis', 'activated', 22, '127.0.0.1', '2013-10-06'),
(8, 'hello', 'mello hjdfhjshf', 'thesis', 'activated', 25, '10.127.55.255', '2013-10-01'),
(9, 'hello', 'mello hjdfhjshf', 'thesis', 'activated', 25, '10.127.55.255', '2013-10-01'),
(10, 'hello', 'mello hjdfhjshf', 'thesis', 'activated', 25, '10.127.55.255', '2013-10-01');

-- --------------------------------------------------------

--
-- Table structure for table `project_thesis_files`
--

CREATE TABLE IF NOT EXISTS `project_thesis_files` (
  `project_thesis_files_id` int(11) NOT NULL AUTO_INCREMENT,
  `project_thesis_id` int(11) NOT NULL,
  `file_name` varchar(30) NOT NULL,
  `file_path` varchar(100) NOT NULL,
  `file_size` varchar(20) NOT NULL,
  PRIMARY KEY (`project_thesis_files_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `project_thesis_files`
--

INSERT INTO `project_thesis_files` (`project_thesis_files_id`, `project_thesis_id`, `file_name`, `file_path`, `file_size`) VALUES
(1, 1, 'pom', 'nao', '11'),
(2, 1, 'tom', 'no', '9');

-- --------------------------------------------------------

--
-- Table structure for table `semester_log`
--

CREATE TABLE IF NOT EXISTS `semester_log` (
  `semester_log_id` int(11) NOT NULL AUTO_INCREMENT,
  `semester_log_name` varchar(100) DEFAULT NULL,
  `starting_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `ending_date` timestamp NULL DEFAULT NULL,
  `program_id` int(11) DEFAULT NULL,
  `batch_id` int(11) DEFAULT NULL,
  `semester_id` int(11) DEFAULT NULL,
  `academic_status` enum('active','passed') NOT NULL DEFAULT 'active',
  `status` enum('activated','deactivated') DEFAULT 'activated',
  `date_of_modification` varchar(30) DEFAULT NULL,
  `time_of_modification` varchar(30) DEFAULT NULL,
  `user_of_modification` int(11) DEFAULT NULL,
  `user_ip` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`semester_log_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `semester_log`
--

INSERT INTO `semester_log` (`semester_log_id`, `semester_log_name`, `starting_date`, `ending_date`, `program_id`, `batch_id`, `semester_id`, `academic_status`, `status`, `date_of_modification`, `time_of_modification`, `user_of_modification`, `user_ip`) VALUES
(16, '3rd Batch 6th Semester', '2013-09-23 20:23:37', NULL, 1, 3, 6, 'active', 'activated', NULL, NULL, NULL, NULL),
(17, '5th Batch 1st Semester', '2013-09-23 20:23:37', NULL, 1, 5, 1, 'passed', 'activated', NULL, NULL, NULL, NULL),
(18, '3rd Batch 5th Semester', '2013-09-23 20:30:44', NULL, 1, 3, 5, 'passed', 'activated', NULL, NULL, NULL, NULL),
(19, '5th Batch 2nd Semester', '2013-09-23 20:30:44', NULL, 1, 5, 2, 'active', 'activated', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `semesters`
--

CREATE TABLE IF NOT EXISTS `semesters` (
  `semester_id` int(11) NOT NULL AUTO_INCREMENT,
  `semester_name` varchar(20) DEFAULT NULL,
  `total_credit` varchar(5) DEFAULT NULL,
  `program_id` int(11) DEFAULT NULL,
  `status` enum('activated','deactivated') NOT NULL DEFAULT 'activated',
  `date_of_modification` varchar(20) DEFAULT NULL,
  `time_of_modification` varchar(30) DEFAULT NULL,
  `user_of_modification` varchar(100) DEFAULT NULL,
  `user_ip` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`semester_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `semesters`
--

INSERT INTO `semesters` (`semester_id`, `semester_name`, `total_credit`, `program_id`, `status`, `date_of_modification`, `time_of_modification`, `user_of_modification`, `user_ip`) VALUES
(1, '1st Semester', '18', 1, 'activated', NULL, NULL, NULL, NULL),
(2, '2nd Semester', '18', 1, 'activated', NULL, NULL, NULL, NULL),
(3, '3rd Semester', '18', 1, 'activated', NULL, NULL, NULL, NULL),
(4, '4th Semester', '18', 1, 'activated', NULL, NULL, NULL, NULL),
(5, '5th Semester', '18', 1, 'activated', NULL, NULL, NULL, NULL),
(6, '6th Semester', '18', 1, 'activated', NULL, NULL, NULL, NULL),
(7, '7th Semester', '18', 1, 'activated', NULL, NULL, NULL, NULL),
(8, '8th Semester', '18', 1, 'activated', NULL, NULL, NULL, NULL),
(9, '1st Semester', '15', 2, 'activated', NULL, NULL, NULL, NULL),
(10, '2nd Semester', '16', 2, 'activated', NULL, NULL, NULL, NULL),
(11, '3rd Semester', '20', 2, 'activated', NULL, NULL, NULL, NULL),
(12, 'Empty Semester', '0', 1, 'activated', NULL, NULL, NULL, NULL),
(13, 'Empty Semester', '0', 4, 'activated', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `student_course_result`
--

CREATE TABLE IF NOT EXISTS `student_course_result` (
  `students_course_result_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `course_log_id` int(11) DEFAULT NULL,
  `marks` varchar(10) DEFAULT NULL,
  `grade` varchar(10) DEFAULT NULL,
  `gpa` varchar(10) DEFAULT NULL,
  `passing_status` enum('passed','failed') DEFAULT NULL,
  `status` enum('activated','deactivated') DEFAULT 'activated',
  `date_of_modification` varchar(30) DEFAULT NULL,
  `time_of_modification` varchar(30) DEFAULT NULL,
  `user_of_modification` int(11) DEFAULT NULL,
  `user_ip` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`students_course_result_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=377 ;

--
-- Dumping data for table `student_course_result`
--

INSERT INTO `student_course_result` (`students_course_result_id`, `user_id`, `course_log_id`, `marks`, `grade`, `gpa`, `passing_status`, `status`, `date_of_modification`, `time_of_modification`, `user_of_modification`, `user_ip`) VALUES
(187, 22, 25, NULL, NULL, '1.89', NULL, NULL, NULL, NULL, NULL, NULL),
(188, 23, 25, NULL, NULL, '1.8', NULL, NULL, NULL, NULL, NULL, NULL),
(189, 24, 25, NULL, NULL, '1.89', NULL, NULL, NULL, NULL, NULL, NULL),
(190, 25, 25, NULL, NULL, '1.89', NULL, NULL, NULL, NULL, NULL, NULL),
(191, 26, 25, NULL, NULL, '1.8', NULL, NULL, NULL, NULL, NULL, NULL),
(192, 27, 25, NULL, NULL, '1.89', NULL, NULL, NULL, NULL, NULL, NULL),
(193, 28, 25, NULL, NULL, '1.8', NULL, NULL, NULL, NULL, NULL, NULL),
(194, 29, 25, NULL, NULL, '1.89', NULL, NULL, NULL, NULL, NULL, NULL),
(195, 30, 25, NULL, NULL, '1.8', NULL, NULL, NULL, NULL, NULL, NULL),
(196, 31, 25, NULL, NULL, '1.8', NULL, NULL, NULL, NULL, NULL, NULL),
(197, 22, 26, NULL, NULL, '2.89', NULL, NULL, NULL, NULL, NULL, NULL),
(198, 23, 26, NULL, NULL, '3.8', NULL, NULL, NULL, NULL, NULL, NULL),
(199, 24, 26, NULL, NULL, '2.89', NULL, NULL, NULL, NULL, NULL, NULL),
(200, 25, 26, NULL, NULL, '2.89', NULL, NULL, NULL, NULL, NULL, NULL),
(201, 26, 26, NULL, NULL, '3.8', NULL, NULL, NULL, NULL, NULL, NULL),
(202, 27, 26, NULL, NULL, '2.89', NULL, NULL, NULL, NULL, NULL, NULL),
(203, 28, 26, NULL, NULL, '3.8', NULL, NULL, NULL, NULL, NULL, NULL),
(204, 29, 26, NULL, NULL, '2.89', NULL, NULL, NULL, NULL, NULL, NULL),
(205, 30, 26, NULL, NULL, '3.8', NULL, NULL, NULL, NULL, NULL, NULL),
(206, 31, 26, NULL, NULL, '3.8', NULL, NULL, NULL, NULL, NULL, NULL),
(207, 22, 27, NULL, NULL, '3.89', NULL, NULL, NULL, NULL, NULL, NULL),
(208, 23, 27, NULL, NULL, '3.8', NULL, NULL, NULL, NULL, NULL, NULL),
(209, 24, 27, NULL, NULL, '3.89', NULL, NULL, NULL, NULL, NULL, NULL),
(210, 25, 27, NULL, NULL, '3.89', NULL, NULL, NULL, NULL, NULL, NULL),
(211, 26, 27, NULL, NULL, '3.8', NULL, NULL, NULL, NULL, NULL, NULL),
(212, 27, 27, NULL, NULL, '2.89', NULL, NULL, NULL, NULL, NULL, NULL),
(213, 28, 27, NULL, NULL, '3.8', NULL, NULL, NULL, NULL, NULL, NULL),
(214, 29, 27, NULL, NULL, '2.89', NULL, NULL, NULL, NULL, NULL, NULL),
(215, 30, 27, NULL, NULL, '3.8', NULL, NULL, NULL, NULL, NULL, NULL),
(216, 31, 27, NULL, NULL, '3.8', NULL, NULL, NULL, NULL, NULL, NULL),
(217, 22, 28, NULL, NULL, '2.89', NULL, NULL, NULL, NULL, NULL, NULL),
(218, 23, 28, NULL, NULL, '3.8', NULL, NULL, NULL, NULL, NULL, NULL),
(219, 24, 28, NULL, NULL, '2.89', NULL, NULL, NULL, NULL, NULL, NULL),
(220, 25, 28, NULL, NULL, '2.89', NULL, NULL, NULL, NULL, NULL, NULL),
(221, 26, 28, NULL, NULL, '3.8', NULL, NULL, NULL, NULL, NULL, NULL),
(222, 27, 28, NULL, NULL, '2.89', NULL, NULL, NULL, NULL, NULL, NULL),
(223, 28, 28, NULL, NULL, '3.8', NULL, NULL, NULL, NULL, NULL, NULL),
(224, 29, 28, NULL, NULL, '2.89', NULL, NULL, NULL, NULL, NULL, NULL),
(225, 30, 28, NULL, NULL, '3.8', NULL, NULL, NULL, NULL, NULL, NULL),
(226, 31, 28, NULL, NULL, '3.8', NULL, NULL, NULL, NULL, NULL, NULL),
(227, 22, 29, NULL, NULL, '2.89', NULL, NULL, NULL, NULL, NULL, NULL),
(228, 23, 29, NULL, NULL, '3.8', NULL, NULL, NULL, NULL, NULL, NULL),
(229, 24, 29, NULL, NULL, '2.89', NULL, NULL, NULL, NULL, NULL, NULL),
(230, 25, 29, NULL, NULL, '2.89', NULL, NULL, NULL, NULL, NULL, NULL),
(231, 26, 29, NULL, NULL, '3.8', NULL, NULL, NULL, NULL, NULL, NULL),
(232, 27, 29, NULL, NULL, '2.89', NULL, NULL, NULL, NULL, NULL, NULL),
(233, 28, 29, NULL, NULL, '3.8', NULL, NULL, NULL, NULL, NULL, NULL),
(234, 29, 29, NULL, NULL, '2.89', NULL, NULL, NULL, NULL, NULL, NULL),
(235, 30, 29, NULL, NULL, '3.8', NULL, NULL, NULL, NULL, NULL, NULL),
(236, 31, 29, NULL, NULL, '3.8', NULL, NULL, NULL, NULL, NULL, NULL),
(237, 22, 30, NULL, NULL, '2.89', NULL, NULL, NULL, NULL, NULL, NULL),
(238, 23, 30, NULL, NULL, '3.8', NULL, NULL, NULL, NULL, NULL, NULL),
(239, 24, 30, NULL, NULL, '2.89', NULL, NULL, NULL, NULL, NULL, NULL),
(240, 25, 30, NULL, NULL, '2.89', NULL, NULL, NULL, NULL, NULL, NULL),
(241, 26, 30, NULL, NULL, '3.8', NULL, NULL, NULL, NULL, NULL, NULL),
(242, 27, 30, NULL, NULL, '2.89', NULL, NULL, NULL, NULL, NULL, NULL),
(243, 28, 30, NULL, NULL, '3.8', NULL, NULL, NULL, NULL, NULL, NULL),
(244, 29, 30, NULL, NULL, '2.89', NULL, NULL, NULL, NULL, NULL, NULL),
(245, 30, 30, NULL, NULL, '3.8', NULL, NULL, NULL, NULL, NULL, NULL),
(246, 31, 30, NULL, NULL, '3.8', NULL, NULL, NULL, NULL, NULL, NULL),
(247, 32, 31, NULL, NULL, '2.89', NULL, NULL, NULL, NULL, NULL, NULL),
(248, 33, 31, NULL, NULL, '3.8', NULL, NULL, NULL, NULL, NULL, NULL),
(249, 34, 31, NULL, NULL, '2.89', NULL, NULL, NULL, NULL, NULL, NULL),
(250, 35, 31, NULL, NULL, '2.89', NULL, NULL, NULL, NULL, NULL, NULL),
(251, 36, 31, NULL, NULL, '3.8', NULL, NULL, NULL, NULL, NULL, NULL),
(252, 37, 31, NULL, NULL, '2.89', NULL, NULL, NULL, NULL, NULL, NULL),
(253, 38, 31, NULL, NULL, '3.8', NULL, NULL, NULL, NULL, NULL, NULL),
(254, 39, 31, NULL, NULL, '2.89', NULL, NULL, NULL, NULL, NULL, NULL),
(255, 40, 31, NULL, NULL, '3.8', NULL, NULL, NULL, NULL, NULL, NULL),
(256, 41, 31, NULL, NULL, '3.8', NULL, NULL, NULL, NULL, NULL, NULL),
(257, 32, 32, NULL, NULL, '2.89', NULL, NULL, NULL, NULL, NULL, NULL),
(258, 33, 32, NULL, NULL, '3.8', NULL, NULL, NULL, NULL, NULL, NULL),
(259, 34, 32, NULL, NULL, '2.89', NULL, NULL, NULL, NULL, NULL, NULL),
(260, 35, 32, NULL, NULL, '2.89', NULL, NULL, NULL, NULL, NULL, NULL),
(261, 36, 32, NULL, NULL, '3.8', NULL, NULL, NULL, NULL, NULL, NULL),
(262, 37, 32, NULL, NULL, '2.89', NULL, NULL, NULL, NULL, NULL, NULL),
(263, 38, 32, NULL, NULL, '3.8', NULL, NULL, NULL, NULL, NULL, NULL),
(264, 39, 32, NULL, NULL, '2.89', NULL, NULL, NULL, NULL, NULL, NULL),
(265, 40, 32, NULL, NULL, '3.8', NULL, NULL, NULL, NULL, NULL, NULL),
(266, 41, 32, NULL, NULL, '3.8', NULL, NULL, NULL, NULL, NULL, NULL),
(267, 32, 33, NULL, NULL, '2.89', NULL, NULL, NULL, NULL, NULL, NULL),
(268, 33, 33, NULL, NULL, '3.8', NULL, NULL, NULL, NULL, NULL, NULL),
(269, 34, 33, NULL, NULL, '2.89', NULL, NULL, NULL, NULL, NULL, NULL),
(270, 35, 33, NULL, NULL, '2.89', NULL, NULL, NULL, NULL, NULL, NULL),
(271, 36, 33, NULL, NULL, '3.8', NULL, NULL, NULL, NULL, NULL, NULL),
(272, 37, 33, NULL, NULL, '2.89', NULL, NULL, NULL, NULL, NULL, NULL),
(273, 38, 33, NULL, NULL, '3.8', NULL, NULL, NULL, NULL, NULL, NULL),
(274, 39, 33, NULL, NULL, '2.89', NULL, NULL, NULL, NULL, NULL, NULL),
(275, 40, 33, NULL, NULL, '3.8', NULL, NULL, NULL, NULL, NULL, NULL),
(276, 41, 33, NULL, NULL, '3.8', NULL, NULL, NULL, NULL, NULL, NULL),
(277, 32, 34, NULL, NULL, '2.89', NULL, NULL, NULL, NULL, NULL, NULL),
(278, 33, 34, NULL, NULL, '3.8', NULL, NULL, NULL, NULL, NULL, NULL),
(279, 34, 34, NULL, NULL, '2.89', NULL, NULL, NULL, NULL, NULL, NULL),
(280, 35, 34, NULL, NULL, '2.89', NULL, NULL, NULL, NULL, NULL, NULL),
(281, 36, 34, NULL, NULL, '3.8', NULL, NULL, NULL, NULL, NULL, NULL),
(282, 37, 34, NULL, NULL, '2.89', NULL, NULL, NULL, NULL, NULL, NULL),
(283, 38, 34, NULL, NULL, '3.8', NULL, NULL, NULL, NULL, NULL, NULL),
(284, 39, 34, NULL, NULL, '2.89', NULL, NULL, NULL, NULL, NULL, NULL),
(285, 40, 34, NULL, NULL, '3.8', NULL, NULL, NULL, NULL, NULL, NULL),
(286, 41, 34, NULL, NULL, '3.8', NULL, NULL, NULL, NULL, NULL, NULL),
(287, 32, 35, NULL, NULL, '2.89', NULL, NULL, NULL, NULL, NULL, NULL),
(288, 33, 35, NULL, NULL, '3.8', NULL, NULL, NULL, NULL, NULL, NULL),
(289, 34, 35, NULL, NULL, '2.89', NULL, NULL, NULL, NULL, NULL, NULL),
(290, 35, 35, NULL, NULL, '2.89', NULL, NULL, NULL, NULL, NULL, NULL),
(291, 36, 35, NULL, NULL, '3.8', NULL, NULL, NULL, NULL, NULL, NULL),
(292, 37, 35, NULL, NULL, '2.89', NULL, NULL, NULL, NULL, NULL, NULL),
(293, 38, 35, NULL, NULL, '3.8', NULL, NULL, NULL, NULL, NULL, NULL),
(294, 39, 35, NULL, NULL, '2.89', NULL, NULL, NULL, NULL, NULL, NULL),
(295, 40, 35, NULL, NULL, '3.8', NULL, NULL, NULL, NULL, NULL, NULL),
(296, 41, 35, NULL, NULL, '3.8', NULL, NULL, NULL, NULL, NULL, NULL),
(297, 32, 36, NULL, NULL, '2.89', NULL, NULL, NULL, NULL, NULL, NULL),
(298, 33, 36, NULL, NULL, '3.8', NULL, NULL, NULL, NULL, NULL, NULL),
(299, 34, 36, NULL, NULL, '2.89', NULL, NULL, NULL, NULL, NULL, NULL),
(300, 35, 36, NULL, NULL, '2.89', NULL, NULL, NULL, NULL, NULL, NULL),
(301, 36, 36, NULL, NULL, '3.8', NULL, NULL, NULL, NULL, NULL, NULL),
(302, 37, 36, NULL, NULL, '2.89', NULL, NULL, NULL, NULL, NULL, NULL),
(303, 38, 36, NULL, NULL, '3.8', NULL, NULL, NULL, NULL, NULL, NULL),
(304, 39, 36, NULL, NULL, '2.89', NULL, NULL, NULL, NULL, NULL, NULL),
(305, 40, 36, NULL, NULL, '3.8', NULL, NULL, NULL, NULL, NULL, NULL),
(306, 41, 36, NULL, NULL, '3.8', NULL, NULL, NULL, NULL, NULL, NULL),
(367, 22, 19, '49', 'C', '2.25', 'passed', 'activated', '05-Oct-2013', '11:10:55', 0, '127.0.0.1'),
(368, 23, 19, '58', 'B-', '2.75', 'passed', 'activated', '05-Oct-2013', '11:10:55', 0, '127.0.0.1'),
(369, 24, 19, '52', 'C+', '2.5', 'passed', 'activated', '05-Oct-2013', '11:10:55', 0, '127.0.0.1'),
(370, 25, 19, '240', 'A+', '4', 'passed', 'activated', '05-Oct-2013', '11:10:55', 0, '127.0.0.1'),
(371, 26, 19, '48', 'C', '2.25', 'passed', 'activated', '05-Oct-2013', '11:10:55', 0, '127.0.0.1'),
(372, 27, 19, '45', 'C', '2.25', 'passed', 'activated', '05-Oct-2013', '11:10:55', 0, '127.0.0.1'),
(373, 28, 19, '71', 'A-', '3.5', 'passed', 'activated', '05-Oct-2013', '11:10:55', 0, '127.0.0.1'),
(374, 29, 19, '68', 'B+', '3.25', 'passed', 'activated', '05-Oct-2013', '11:10:55', 0, '127.0.0.1'),
(375, 30, 19, '70', 'A-', '3.5', 'passed', 'activated', '05-Oct-2013', '11:10:55', 0, '127.0.0.1'),
(376, 31, 19, '49', 'C', '2.25', 'passed', 'activated', '05-Oct-2013', '11:10:55', 0, '127.0.0.1');

-- --------------------------------------------------------

--
-- Table structure for table `student_semester_result`
--

CREATE TABLE IF NOT EXISTS `student_semester_result` (
  `student_semester_result_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `semester_log_id` int(11) DEFAULT NULL,
  `cgpa` varchar(10) DEFAULT NULL,
  `date_of_modification` varchar(30) DEFAULT NULL,
  `time_of_modification` varchar(30) DEFAULT NULL,
  `user_of_modification` int(11) DEFAULT NULL,
  `user_ip` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`student_semester_result_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=261 ;

--
-- Dumping data for table `student_semester_result`
--

INSERT INTO `student_semester_result` (`student_semester_result_id`, `user_id`, `semester_log_id`, `cgpa`, `date_of_modification`, `time_of_modification`, `user_of_modification`, `user_ip`) VALUES
(241, 32, 17, '2.90', NULL, NULL, NULL, NULL),
(242, 33, 17, '3.9', NULL, NULL, NULL, NULL),
(243, 34, 17, '2.90', NULL, NULL, NULL, NULL),
(244, 35, 17, '2.96', NULL, NULL, NULL, NULL),
(245, 36, 17, '2.90', NULL, NULL, NULL, NULL),
(246, 37, 17, '3.97', NULL, NULL, NULL, NULL),
(247, 38, 17, '2.30', NULL, NULL, NULL, NULL),
(248, 39, 17, '2.59', NULL, NULL, NULL, NULL),
(249, 40, 17, '3.59', NULL, NULL, NULL, NULL),
(250, 41, 17, '3.9', NULL, NULL, NULL, NULL),
(251, 22, 18, '2.90', NULL, NULL, NULL, NULL),
(252, 23, 18, '2.96', NULL, NULL, NULL, NULL),
(253, 24, 18, '2.90', NULL, NULL, NULL, NULL),
(254, 25, 18, '2.96', NULL, NULL, NULL, NULL),
(255, 26, 18, '2.90', NULL, NULL, NULL, NULL),
(256, 27, 18, '3.97', NULL, NULL, NULL, NULL),
(257, 28, 18, '2.30', NULL, NULL, NULL, NULL),
(258, 29, 18, '2.59', NULL, NULL, NULL, NULL),
(259, 30, 18, '3.59', NULL, NULL, NULL, NULL),
(260, 31, 18, '3.9', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE IF NOT EXISTS `students` (
  `user_id` int(11) NOT NULL,
  `full_name` varchar(500) DEFAULT NULL,
  `batch_id` int(11) DEFAULT NULL,
  `roll_number` varchar(10) DEFAULT NULL,
  `registration_number` varchar(50) DEFAULT NULL,
  `description` varchar(5000) DEFAULT NULL,
  `re_admission_status` enum('activated','deactivated') NOT NULL DEFAULT 'deactivated',
  `status` enum('activated','deactivated') NOT NULL DEFAULT 'activated',
  `date_of_modification` varchar(30) DEFAULT NULL,
  `time_of_modification` varchar(30) DEFAULT NULL,
  `user_of_modification` int(11) DEFAULT NULL,
  `user_ip` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`user_id`, `full_name`, `batch_id`, `roll_number`, `registration_number`, `description`, `re_admission_status`, `status`, `date_of_modification`, `time_of_modification`, `user_of_modification`, `user_ip`) VALUES
(22, 'Tanim', 3, 'bsse0301', NULL, NULL, 'deactivated', 'activated', NULL, NULL, NULL, NULL),
(23, 'Asif', 3, 'bsse0302', NULL, NULL, 'deactivated', 'activated', NULL, NULL, NULL, NULL),
(24, 'Tanvir', 3, 'bsse0305', NULL, NULL, 'deactivated', 'activated', NULL, NULL, NULL, NULL),
(25, 'Arif', 3, 'bsse0308', NULL, NULL, 'deactivated', 'activated', NULL, NULL, NULL, NULL),
(26, 'samsuddoha', 3, 'bsse0309', NULL, NULL, 'deactivated', 'activated', NULL, NULL, NULL, NULL),
(27, 'S.M.', 3, 'bsse0310', NULL, NULL, 'deactivated', 'activated', NULL, NULL, NULL, NULL),
(28, 'Lamisha', 3, 'bsse0311', NULL, NULL, 'deactivated', 'activated', NULL, NULL, NULL, NULL),
(29, 'Bidoura', 3, 'bsse0312', NULL, NULL, 'deactivated', 'activated', NULL, NULL, NULL, NULL),
(30, 'Abdullah', 3, 'bsse0313', NULL, NULL, 'deactivated', 'activated', NULL, NULL, NULL, NULL),
(31, 'Sujon', 3, 'bsse0316', NULL, NULL, 'deactivated', 'activated', NULL, NULL, NULL, NULL),
(32, 'Pola', 5, 'bsse0501', NULL, NULL, 'deactivated', 'activated', NULL, NULL, NULL, NULL),
(33, 'Pola', 5, 'bsse0502', NULL, NULL, 'deactivated', 'activated', NULL, NULL, NULL, NULL),
(34, 'Pola', 5, 'bsse0503', NULL, NULL, 'deactivated', 'activated', NULL, NULL, NULL, NULL),
(35, 'Pola', 5, 'bsse0504', NULL, NULL, 'deactivated', 'activated', NULL, NULL, NULL, NULL),
(36, 'Pola', 5, 'bsse0505', NULL, NULL, 'deactivated', 'activated', NULL, NULL, NULL, NULL),
(37, 'Pola', 5, 'bsse0506', NULL, NULL, 'deactivated', 'activated', NULL, NULL, NULL, NULL),
(38, 'Pola', 5, 'bsse0507', NULL, NULL, 'deactivated', 'activated', NULL, NULL, NULL, NULL),
(39, 'Pola', 5, 'bsse0508', NULL, NULL, 'deactivated', 'activated', NULL, NULL, NULL, NULL),
(40, 'Pola', 5, 'bsse0509', NULL, NULL, 'deactivated', 'activated', NULL, NULL, NULL, NULL),
(41, 'Pola', 5, 'bsse0510', NULL, NULL, 'deactivated', 'activated', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `students_in_semester_log`
--

CREATE TABLE IF NOT EXISTS `students_in_semester_log` (
  `user_id` int(11) DEFAULT NULL,
  `semester_log_id` int(11) DEFAULT NULL,
  `status` enum('activated','deactivated') NOT NULL DEFAULT 'activated',
  `date_of_modification` varchar(30) DEFAULT NULL,
  `time_of_modification` varchar(30) DEFAULT NULL,
  `user_of_modification` int(11) DEFAULT NULL,
  `user_ip` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students_in_semester_log`
--

INSERT INTO `students_in_semester_log` (`user_id`, `semester_log_id`, `status`, `date_of_modification`, `time_of_modification`, `user_of_modification`, `user_ip`) VALUES
(22, 16, 'activated', NULL, NULL, NULL, NULL),
(23, 16, 'activated', NULL, NULL, NULL, NULL),
(24, 16, 'activated', NULL, NULL, NULL, NULL),
(25, 16, 'activated', NULL, NULL, NULL, NULL),
(26, 16, 'activated', NULL, NULL, NULL, NULL),
(27, 16, 'activated', NULL, NULL, NULL, NULL),
(28, 16, 'activated', NULL, NULL, NULL, NULL),
(29, 16, 'activated', NULL, NULL, NULL, NULL),
(30, 16, 'activated', NULL, NULL, NULL, NULL),
(31, 16, 'activated', NULL, NULL, NULL, NULL),
(32, 17, 'activated', NULL, NULL, NULL, NULL),
(33, 17, 'activated', NULL, NULL, NULL, NULL),
(34, 17, 'activated', NULL, NULL, NULL, NULL),
(35, 17, 'activated', NULL, NULL, NULL, NULL),
(36, 17, 'activated', NULL, NULL, NULL, NULL),
(37, 17, 'activated', NULL, NULL, NULL, NULL),
(38, 17, 'activated', NULL, NULL, NULL, NULL),
(39, 17, 'activated', NULL, NULL, NULL, NULL),
(40, 17, 'activated', NULL, NULL, NULL, NULL),
(41, 17, 'activated', NULL, NULL, NULL, NULL),
(22, 18, 'activated', NULL, NULL, NULL, NULL),
(23, 18, 'activated', NULL, NULL, NULL, NULL),
(24, 18, 'activated', NULL, NULL, NULL, NULL),
(25, 18, 'activated', NULL, NULL, NULL, NULL),
(26, 18, 'activated', NULL, NULL, NULL, NULL),
(27, 18, 'activated', NULL, NULL, NULL, NULL),
(28, 18, 'activated', NULL, NULL, NULL, NULL),
(29, 18, 'activated', NULL, NULL, NULL, NULL),
(30, 18, 'activated', NULL, NULL, NULL, NULL),
(31, 18, 'activated', NULL, NULL, NULL, NULL),
(32, 19, 'activated', NULL, NULL, NULL, NULL),
(33, 19, 'activated', NULL, NULL, NULL, NULL),
(34, 19, 'activated', NULL, NULL, NULL, NULL),
(35, 19, 'activated', NULL, NULL, NULL, NULL),
(36, 19, 'activated', NULL, NULL, NULL, NULL),
(37, 19, 'activated', NULL, NULL, NULL, NULL),
(38, 19, 'activated', NULL, NULL, NULL, NULL),
(39, 19, 'activated', NULL, NULL, NULL, NULL),
(40, 19, 'activated', NULL, NULL, NULL, NULL),
(41, 19, 'activated', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE IF NOT EXISTS `teachers` (
  `user_id` int(11) NOT NULL,
  `full_name` varchar(500) DEFAULT NULL,
  `designation` varchar(100) DEFAULT NULL,
  `qualification` varchar(100) DEFAULT NULL,
  `description` varchar(5000) DEFAULT NULL,
  `status` enum('activated','deactivated') NOT NULL DEFAULT 'activated',
  `date_of_modification` varchar(30) DEFAULT NULL,
  `time_of_modification` varchar(30) DEFAULT NULL,
  `user_of_modification` int(11) DEFAULT NULL,
  `user_ip` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`user_id`, `full_name`, `designation`, `qualification`, `description`, `status`, `date_of_modification`, `time_of_modification`, `user_of_modification`, `user_ip`) VALUES
(11, 'Mahbubul', 'Director and Professor', NULL, NULL, 'activated', NULL, NULL, NULL, NULL),
(12, 'Ahmedul', 'Lecturer', NULL, NULL, 'activated', NULL, NULL, NULL, NULL),
(13, 'Golam', 'Lecturer', NULL, NULL, 'activated', NULL, NULL, NULL, NULL),
(14, 'Amullo', 'Professor', NULL, NULL, 'activated', NULL, NULL, NULL, NULL),
(15, 'Mahmuda', 'Lecturer', NULL, NULL, 'activated', NULL, NULL, NULL, NULL),
(16, 'Zerina', 'Professor', NULL, NULL, 'activated', NULL, NULL, NULL, NULL),
(17, 'Sumon', 'Lecturer', NULL, NULL, 'activated', NULL, NULL, NULL, NULL),
(18, 'Nowshin', 'Lecturer', NULL, NULL, 'activated', NULL, NULL, NULL, NULL),
(19, 'Shariful', 'Associate Professor', NULL, NULL, 'activated', NULL, NULL, NULL, NULL),
(20, 'Z.H.', 'Professor', NULL, NULL, 'activated', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varbinary(16) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(80) NOT NULL,
  `salt` varchar(40) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) unsigned DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=47 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1, '\0\0', 'administrator', '40feb3e0da785ca5e6dea784a2be3a591b57ea91', '9462e8eee0', 'admin@admin.com', '', NULL, NULL, NULL, 1268889823, 1381164311, 1, 'Admin', 'istrator', 'ADMIN', '0'),
(11, '\0\0', 'joared', '40feb3e0da785ca5e6dea784a2be3a591b57ea91', NULL, 'joarder@gmail.com', NULL, NULL, NULL, NULL, 1381139071, 1381398175, 1, NULL, NULL, NULL, NULL),
(12, '\0\0', 'kabir', '40feb3e0da785ca5e6dea784a2be3a591b57ea91', NULL, 'kabir@gmail.com', NULL, NULL, NULL, NULL, 1381139071, NULL, 1, NULL, NULL, NULL, NULL),
(13, '\0\0', 'rabbani', '40feb3e0da785ca5e6dea784a2be3a591b57ea91', NULL, 'rabbani@gmail.com', NULL, NULL, NULL, NULL, 1381139071, NULL, 1, NULL, NULL, NULL, NULL),
(14, '\0\0', 'amullo', '40feb3e0da785ca5e6dea784a2be3a591b57ea91', NULL, 'amullo@gmail.com', NULL, NULL, NULL, NULL, 1381139071, NULL, 1, NULL, NULL, NULL, NULL),
(15, '\0\0', 'mahmuda', '40feb3e0da785ca5e6dea784a2be3a591b57ea91', NULL, 'mahmuda@gmail.com', NULL, NULL, NULL, NULL, 1381139071, NULL, 1, NULL, NULL, NULL, NULL),
(16, '\0\0', 'zerina', '40feb3e0da785ca5e6dea784a2be3a591b57ea91', NULL, 'zerina@gmail.com', NULL, NULL, NULL, NULL, 1381139071, NULL, 1, NULL, NULL, NULL, NULL),
(17, '\0\0', 'sumon', '40feb3e0da785ca5e6dea784a2be3a591b57ea91', NULL, 'sumon@gmail.com', NULL, NULL, NULL, NULL, 1381139071, NULL, 1, NULL, NULL, NULL, NULL),
(18, '\0\0', 'nowsin', '40feb3e0da785ca5e6dea784a2be3a591b57ea91', NULL, 'nowshin@gmail.com', NULL, NULL, NULL, NULL, 1381139071, NULL, 1, NULL, NULL, NULL, NULL),
(19, '\0\0', 'sharif', '40feb3e0da785ca5e6dea784a2be3a591b57ea91', NULL, 'sharif@gmail.com', NULL, NULL, NULL, NULL, 1381139071, NULL, 1, NULL, NULL, NULL, NULL),
(20, '\0\0', 'jewel', '40feb3e0da785ca5e6dea784a2be3a591b57ea91', NULL, 'jewel@gmail.com', NULL, NULL, NULL, NULL, 1381139071, NULL, 1, NULL, NULL, NULL, NULL),
(21, '\0\0', 'main_admin', '40feb3e0da785ca5e6dea784a2be3a591b57ea91', NULL, 'main_admin@gmail.com', NULL, NULL, NULL, NULL, 1381139071, 1381382585, 1, NULL, NULL, NULL, NULL),
(22, '\0\0', 'tanim', '40feb3e0da785ca5e6dea784a2be3a591b57ea91', NULL, 'bsse0301@gmail.com', NULL, NULL, NULL, NULL, 1381139071, 1381393553, 1, NULL, NULL, NULL, NULL),
(23, '\0\0', 'asif', '40feb3e0da785ca5e6dea784a2be3a591b57ea91', NULL, 'bsse0302@gmail.com', NULL, NULL, NULL, NULL, 1381139071, NULL, 1, NULL, NULL, NULL, NULL),
(24, '\0\0', 'tanvir', '40feb3e0da785ca5e6dea784a2be3a591b57ea91', NULL, 'bsse0305@gmail.com', NULL, NULL, NULL, NULL, 1381139071, NULL, 1, NULL, NULL, NULL, NULL),
(25, '\0\0', 'arif', '40feb3e0da785ca5e6dea784a2be3a591b57ea91', NULL, 'bsse0308@gmail.com', NULL, NULL, NULL, NULL, 1381139071, NULL, 1, NULL, NULL, NULL, NULL),
(26, '\0\0', 'arif', '40feb3e0da785ca5e6dea784a2be3a591b57ea91', NULL, 'bsse0308@gmail.com', NULL, NULL, NULL, NULL, 1381139071, NULL, 1, NULL, NULL, NULL, NULL),
(27, '\0\0', 'samsu', '40feb3e0da785ca5e6dea784a2be3a591b57ea91', NULL, 'bsse0309@gmail.com', NULL, NULL, NULL, NULL, 1381139071, NULL, 1, NULL, NULL, NULL, NULL),
(28, '\0\0', 'shofiq', '40feb3e0da785ca5e6dea784a2be3a591b57ea91', NULL, 'bsse0310@gmail.com', NULL, NULL, NULL, NULL, 1381139071, NULL, 1, NULL, NULL, NULL, NULL),
(29, '\0\0', 'lamisha', '40feb3e0da785ca5e6dea784a2be3a591b57ea91', NULL, 'bsse0311@gmail.com', NULL, NULL, NULL, NULL, 1381139071, NULL, 1, NULL, NULL, NULL, NULL),
(30, '\0\0', 'raju', '40feb3e0da785ca5e6dea784a2be3a591b57ea91', NULL, 'bsse0312@gmail.com', NULL, NULL, NULL, NULL, 1381139071, NULL, 1, NULL, NULL, NULL, NULL),
(31, '\0\0', 'mello', '40feb3e0da785ca5e6dea784a2be3a591b57ea91', NULL, 'bsse0313@gmail.com', NULL, NULL, NULL, NULL, 1381139071, NULL, 1, NULL, NULL, NULL, NULL),
(32, '\0\0', 'hridi', '40feb3e0da785ca5e6dea784a2be3a591b57ea91', NULL, 'bsse0316@gmail.com', NULL, NULL, NULL, NULL, 1381139071, NULL, 1, NULL, NULL, NULL, NULL),
(33, '\0\0', 'pola_1', '40feb3e0da785ca5e6dea784a2be3a591b57ea91', NULL, 'bsse0501@gmail.com', NULL, NULL, NULL, NULL, 1381139071, NULL, 1, NULL, NULL, NULL, NULL),
(34, '\0\0', 'pola_2', '40feb3e0da785ca5e6dea784a2be3a591b57ea91', NULL, 'bsse0502@gmail.com', NULL, NULL, NULL, NULL, 1381139071, NULL, 1, NULL, NULL, NULL, NULL),
(35, '\0\0', 'pola_3', '40feb3e0da785ca5e6dea784a2be3a591b57ea91', NULL, 'bsse0503@gmail.com', NULL, NULL, NULL, NULL, 1381139071, NULL, 1, NULL, NULL, NULL, NULL),
(36, '\0\0', 'pola_4', '40feb3e0da785ca5e6dea784a2be3a591b57ea91', NULL, 'bsse0504@gmail.com', NULL, NULL, NULL, NULL, 1381139071, NULL, 1, NULL, NULL, NULL, NULL),
(37, '\0\0', 'pola_5', '40feb3e0da785ca5e6dea784a2be3a591b57ea91', NULL, 'bsse0505@gmail.com', NULL, NULL, NULL, NULL, 1381139071, NULL, 1, NULL, NULL, NULL, NULL),
(38, '\0\0', 'pola_6', '40feb3e0da785ca5e6dea784a2be3a591b57ea91', NULL, 'bsse0506@gmail.com', NULL, NULL, NULL, NULL, 1381139071, NULL, 1, NULL, NULL, NULL, NULL),
(39, '\0\0', 'pola_7', '40feb3e0da785ca5e6dea784a2be3a591b57ea91', NULL, 'bsse0507@gmail.com', NULL, NULL, NULL, NULL, 1381139071, NULL, 1, NULL, NULL, NULL, NULL),
(40, '\0\0', 'pola_8', '40feb3e0da785ca5e6dea784a2be3a591b57ea91', NULL, 'bsse0508@gmail.com', NULL, NULL, NULL, NULL, 1381139071, NULL, 1, NULL, NULL, NULL, NULL),
(41, '\0\0', 'pola_9', '40feb3e0da785ca5e6dea784a2be3a591b57ea91', NULL, 'bsse0509@gmail.com', NULL, NULL, NULL, NULL, 1381139071, NULL, 1, NULL, NULL, NULL, NULL),
(42, '\0\0', 'pola_10', '40feb3e0da785ca5e6dea784a2be3a591b57ea91', NULL, 'bsse0510@gmail.com', NULL, NULL, NULL, NULL, 1381139071, NULL, 1, NULL, NULL, NULL, NULL),
(43, '\0\0', 'site_admin', '40feb3e0da785ca5e6dea784a2be3a591b57ea91', NULL, 'site_admin@gmail.com', NULL, NULL, NULL, NULL, 1381139071, 1381324966, 1, NULL, NULL, NULL, NULL),
(44, '\0\0', 'exam_admin', '40feb3e0da785ca5e6dea784a2be3a591b57ea91', NULL, 'exam_admin@gmail.com', NULL, NULL, NULL, NULL, 1381139071, 1381385955, 1, NULL, NULL, NULL, NULL),
(45, '\0\0', 'admission_admin', '40feb3e0da785ca5e6dea784a2be3a591b57ea91', NULL, 'admission_admin@gmail.com', NULL, NULL, NULL, NULL, 1381139071, NULL, 1, NULL, NULL, NULL, NULL),
(46, '\0\0', 'faculty_admin', '40feb3e0da785ca5e6dea784a2be3a591b57ea91', NULL, 'faculty_admin@gmail.com', NULL, NULL, NULL, NULL, 1381139071, 1381383575, 1, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE IF NOT EXISTS `users_groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` mediumint(8) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=42 ;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(6, 11, 8),
(7, 12, 8),
(8, 13, 8),
(9, 14, 8),
(10, 15, 8),
(11, 16, 8),
(12, 17, 8),
(13, 18, 8),
(14, 19, 8),
(15, 20, 8),
(16, 21, 3),
(17, 43, 4),
(18, 44, 5),
(19, 45, 6),
(20, 46, 7),
(21, 22, 9),
(22, 23, 9),
(23, 24, 9),
(24, 25, 9),
(25, 26, 9),
(26, 27, 9),
(27, 28, 9),
(28, 29, 9),
(29, 30, 9),
(30, 31, 9),
(31, 32, 9),
(32, 33, 9),
(33, 34, 9),
(34, 35, 9),
(35, 36, 9),
(36, 37, 9),
(37, 38, 9),
(38, 39, 9),
(39, 40, 9),
(40, 41, 9),
(41, 42, 9);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
