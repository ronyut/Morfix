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
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `typeID` int(11) NOT NULL,
  `typeName` varchar(3) NOT NULL,
  `typeComment` text
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`typeID`, `typeName`, `typeComment`) VALUES
(1, 'AA1', NULL),
(2, 'AA2', NULL),
(3, 'AA3', NULL),
(4, 'AA4', NULL),
(5, 'AA5', NULL),
(6, 'AA6', NULL),
(7, 'AA7', NULL),
(8, 'AD1', NULL),
(9, 'AD2', NULL),
(10, 'AD3', NULL),
(11, 'AD4', NULL),
(12, 'AG1', NULL),
(13, 'AG2', NULL),
(14, 'AG3', NULL),
(15, 'AG4', NULL),
(16, 'AH1', NULL),
(17, 'AH2', NULL),
(18, 'AH3', NULL),
(19, 'AH4', NULL),
(20, 'AH5', NULL),
(21, 'AH6', NULL),
(22, 'AS1', NULL),
(23, 'AS2', NULL),
(24, 'AS3', NULL),
(25, 'AS4', NULL),
(26, 'AS5', NULL),
(27, 'AS6', NULL),
(28, 'AS7', NULL),
(29, 'AS8', NULL),
(30, 'AW1', NULL),
(31, 'AW2', NULL),
(32, 'AW3', NULL),
(33, 'AW4', NULL),
(34, 'AW5', NULL),
(35, 'AW6', NULL),
(36, 'AW7', NULL),
(37, 'AW8', NULL),
(38, 'AW9', NULL),
(39, 'AWA', NULL),
(40, 'AWB', NULL),
(41, 'AZ1', NULL),
(42, 'AZ2', NULL),
(43, 'AZ3', NULL),
(44, 'AZ4', NULL),
(45, 'AZ5', NULL),
(46, 'AZ6', NULL),
(47, 'AZ7', NULL),
(48, 'AZ8', NULL),
(49, 'AZ9', NULL),
(50, 'AZA', NULL),
(51, 'AZB', NULL),
(52, 'BA1', NULL),
(53, 'BA2', NULL),
(54, 'BD1', NULL),
(55, 'BD2', NULL),
(56, 'BG1', NULL),
(57, 'BH1', NULL),
(58, 'BH2', NULL),
(59, 'BS1', NULL),
(60, 'BW1', NULL),
(61, 'BW2', NULL),
(62, 'BW3', NULL),
(63, 'BW4', NULL),
(64, 'BW5', NULL),
(65, 'BW6', NULL),
(66, 'BW7', NULL),
(67, 'BZ1', NULL),
(68, 'BZ2', NULL),
(69, 'BZ3', NULL),
(70, 'CA1', NULL),
(71, 'CA2', NULL),
(72, 'CD1', NULL),
(73, 'CD2', NULL),
(74, 'CG1', NULL),
(75, 'CH1', NULL),
(76, 'CH2', NULL),
(77, 'CS1', NULL),
(78, 'CW1', NULL),
(79, 'CW2', NULL),
(80, 'CZ1', NULL),
(81, 'CZ2', NULL),
(82, 'CZ3', NULL),
(83, 'DA1', NULL),
(84, 'DA2', NULL),
(85, 'DD1', NULL),
(86, 'DD2', NULL),
(87, 'DG1', NULL),
(88, 'DH1', NULL),
(89, 'DH2', NULL),
(90, 'DS1', NULL),
(91, 'DW1', NULL),
(92, 'DW2', NULL),
(93, 'DW3', NULL),
(94, 'DW4', NULL),
(95, 'DW5', NULL),
(96, 'DZ1', NULL),
(97, 'DZ2', NULL),
(98, 'DZ3', NULL),
(99, 'EA1', NULL),
(100, 'EA2', NULL),
(101, 'ED1', NULL),
(102, 'ED2', NULL),
(103, 'EG1', NULL),
(104, 'EH1', NULL),
(105, 'EH2', NULL),
(106, 'ES1', NULL),
(107, 'EW1', NULL),
(108, 'EZ1', NULL),
(109, 'EZ2', NULL),
(110, 'EZ3', NULL),
(111, 'FA1', NULL),
(112, 'FD1', NULL),
(113, 'FD2', NULL),
(114, 'FG1', NULL),
(115, 'FH1', NULL),
(116, 'FH2', NULL),
(117, 'FS1', NULL),
(118, 'FW1', NULL),
(119, 'FW2', NULL),
(120, 'FZ1', NULL),
(121, 'FZ2', NULL),
(122, 'FZ3', NULL),
(123, 'GD1', NULL),
(124, 'GG1', NULL),
(125, 'GH1', NULL),
(126, 'GH2', NULL),
(127, 'GS1', NULL),
(128, 'GW1', NULL),
(129, 'GZ1', NULL),
(130, 'HA1', NULL),
(131, 'HD1', NULL),
(132, 'HD2', NULL),
(133, 'HD3', NULL),
(134, 'HG1', NULL),
(135, 'HG2', NULL),
(136, 'HH1', NULL),
(137, 'HH2', NULL),
(138, 'HH3', NULL),
(139, 'HH4', NULL),
(140, 'HH5', NULL),
(141, 'HS1', NULL),
(142, 'HS2', NULL),
(143, 'HS3', NULL),
(144, 'HS4', NULL),
(145, 'HS5', NULL),
(146, 'HS6', NULL),
(147, 'HS7', NULL),
(148, 'HS8', NULL),
(149, 'HW1', NULL),
(150, 'HW2', NULL),
(151, 'HW3', NULL),
(152, 'HZ1', NULL),
(153, 'HZ2', NULL),
(154, 'HZ3', NULL),
(155, 'HZ4', NULL),
(156, 'IH1', NULL),
(157, 'IH2', NULL),
(158, 'IS1', NULL),
(159, 'JA1', NULL),
(160, 'JA2', NULL),
(161, 'JD1', NULL),
(162, 'JD2', NULL),
(163, 'JG1', NULL),
(164, 'JH1', NULL),
(165, 'JH2', NULL),
(166, 'JH3', NULL),
(167, 'JS1', NULL),
(168, 'JW1', NULL),
(169, 'JW2', NULL),
(170, 'JW3', NULL),
(171, 'JZ1', NULL),
(172, 'JZ2', NULL),
(173, 'JZ3', NULL),
(174, 'KS1', NULL),
(175, 'KZ1', NULL),
(176, 'LS1', NULL),
(177, 'MS1', NULL),
(178, 'NS1', NULL),
(179, 'NZ1', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`typeID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `typeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=180;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
