-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 12, 2017 at 11:44 PM
-- Server version: 5.7.11
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `morfix`
--

-- --------------------------------------------------------

--
-- Table structure for table `analyses`
--

CREATE TABLE `analyses` (
  `analysisID` int(11) NOT NULL,
  `tense` varchar(11) NOT NULL,
  `body` varchar(11) NOT NULL,
  `isPassive` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `analyses`
--

INSERT INTO `analyses` (`analysisID`, `tense`, `body`, `isPassive`) VALUES
(1, 'past', 'הוא', 0),
(2, 'past', 'הוא', 1),
(3, 'past', 'שניהם', 0),
(4, 'past', 'שניהם', 1),
(5, 'past', 'הם', 0),
(6, 'past', 'הם', 1),
(7, 'past', 'היא', 0),
(8, 'past', 'היא', 1),
(9, 'past', 'שתיהן', 0),
(10, 'past', 'שתיהן', 1),
(11, 'past', 'הן', 0),
(12, 'past', 'הן', 1),
(13, 'past', 'אתה', 0),
(14, 'past', 'אתה', 1),
(15, 'past', 'שניכם', 0),
(16, 'past', 'שניכם', 1),
(17, 'past', 'אתם', 0),
(18, 'past', 'אתם', 1),
(19, 'past', 'את', 0),
(20, 'past', 'את', 1),
(21, 'past', 'שתיכן', 0),
(22, 'past', 'שתיכן', 1),
(23, 'past', 'אתן', 0),
(24, 'past', 'אתן', 1),
(25, 'past', 'אני', 0),
(26, 'past', 'אני', 1),
(27, 'past', 'אנחנו', 0),
(28, 'past', 'אנחנו', 1),
(29, 'present', 'הוא', 0),
(30, 'present', 'הוא', 1),
(31, 'present', 'שניהם', 0),
(32, 'present', 'שניהם', 1),
(33, 'present', 'הם', 0),
(34, 'present', 'הם', 1),
(35, 'present', 'היא', 0),
(36, 'present', 'היא', 1),
(37, 'present', 'שתיהן', 0),
(38, 'present', 'שתיהן', 1),
(39, 'present', 'הן', 0),
(40, 'present', 'הן', 1),
(41, 'present', 'אתה', 0),
(42, 'present', 'אתה', 1),
(43, 'present', 'שניכם', 0),
(44, 'present', 'שניכם', 1),
(45, 'present', 'אתם', 0),
(46, 'present', 'אתם', 1),
(47, 'present', 'את', 0),
(48, 'present', 'את', 1),
(49, 'present', 'שתיכן', 0),
(50, 'present', 'שתיכן', 1),
(51, 'present', 'אתן', 0),
(52, 'present', 'אתן', 1),
(53, 'present', 'אני', 0),
(54, 'present', 'אני', 1),
(55, 'present', 'אנחנו', 0),
(56, 'present', 'אנחנו', 1),
(57, 'imper', 'אתה', 0),
(58, 'imper', 'שניכם', 0),
(59, 'imper', 'אתם', 0),
(60, 'imper', 'את', 0),
(61, 'imper', 'שתיכן', 0),
(62, 'imper', 'אתן', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `analyses`
--
ALTER TABLE `analyses`
  ADD PRIMARY KEY (`analysisID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `analyses`
--
ALTER TABLE `analyses`
  MODIFY `analysisID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
