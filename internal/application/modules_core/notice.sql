-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 16, 2015 at 11:15 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `iit_modified`
--

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE IF NOT EXISTS `notice` (
  `notice_Title` varchar(200) NOT NULL,
  `notice_des` varchar(200) NOT NULL,
`ID` int(11) NOT NULL,
  `description` varchar(200) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`notice_Title`, `notice_des`, `ID`, `description`) VALUES
('hgsvmhnvc', 'bitcoin8.pdf', 2, '0'),
('hgsvmhnvc', 'bitcoin9.pdf', 3, '0'),
('hgsvmhnvc', 'bitcoin10.pdf', 4, 'gvnxcnhzvcmxz'),
('hgsvmhnvc', 'bitcoin11.pdf', 5, 'wsakhgdjdfhlkhlg'),
('hgsvmhnvc', 'bitcoin12.pdf', 6, 'hfdhgfjyuhfgjuhg'),
('hgsvmhnvc', 'bitcoin13.pdf', 7, 'gfcngvnb'),
('hgsvmhnvc', '1.docx', 8, 'fchgsavdchgsvmhnvchgsv mhnvchgsvmhnvchgs vmhnvcfchgsavdchgsvmhn vchgsvmhnvchgsvmhnvchgs vmhnvc');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
 ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
