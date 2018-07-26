-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 18, 2018 at 08:44 PM
-- Server version: 5.7.22
-- PHP Version: 7.1.16

SET SQL_MODE
= "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT
= 0;
START TRANSACTION;
SET time_zone
= "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blackjack`
--
-- --------------------------------------------------------

--
-- Table structure for table `Activation`
--

DROP TABLE IF EXISTS `Activation`;
CREATE TABLE `Activation`
(
  `ID` int
(11) NOT NULL,
  `Token` varchar
(100) NOT NULL,
  `UserID` int
(11) NOT NULL,
  `DATE` varchar
(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Activation`
--

INSERT INTO `Activation` (`
ID`,
`Token
`, `UserID`, `DATE`) VALUES
(17, '5f07ad33a6684f5a71ef53d41bf47213_0bb9b68595d5e572562fbfb9544292d9\r\n', 47, 'Monday 16th of July 2018 03:27:20 PM'),
(18, '5f07ad33a6684f5a71ef53d41bf47213_2008ea89e17c548130c53929c4b963a1\r\n', 49, 'Wednesday 18th of July 2018 08:14:29 AM'),
(19, '5f07ad33a6684f5a71ef53d41bf47213_b9bcbf245b033efae659183959edfae5\r\n', 52, 'Wednesday 18th of July 2018 08:27:13 AM'),
(20, '5f07ad33a6684f5a71ef53d41bf47213_e981cc57ba6d296e5d5da76297caf6e2\r\n', 53, 'Wednesday 18th of July 2018 08:30:53 AM'),
(21, '5f07ad33a6684f5a71ef53d41bf47213_491c670eb8ebba3376b1ccd6d00d795c\r\n', 54, 'Wednesday 18th of July 2018 08:31:20 AM'),
(22, '5f07ad33a6684f5a71ef53d41bf47213_7b5a0c27adfbf85383786e44f97234ed\r\n', 55, 'Wednesday 18th of July 2018 08:35:43 AM'),
(23, '5f07ad33a6684f5a71ef53d41bf47213_84adfaccb163f2005c333f1a9fb2cd42\r\n', 56, 'Wednesday 18th of July 2018 08:37:40 AM'),
(24, '5f07ad33a6684f5a71ef53d41bf47213_13c8bd2bb0efeb18bb3012fb0f195af3\r\n', 57, 'Wednesday 18th of July 2018 08:41:08 AM'),
(25, '5f07ad33a6684f5a71ef53d41bf47213_e143ed7143cf66a13116d26c25fba060\r\n', 59, 'Wednesday 18th of July 2018 08:42:23 AM'),
(26, '5f07ad33a6684f5a71ef53d41bf47213_06c63bef97fd1a326a62c63edeccf62b\r\n', 61, 'Wednesday 18th of July 2018 08:47:01 AM'),
(27, '5f07ad33a6684f5a71ef53d41bf47213_ed809723a18c29b9f44869c3facb76fe\r\n', 62, 'Wednesday 18th of July 2018 08:58:51 AM'),
(28, '5f07ad33a6684f5a71ef53d41bf47213_16e306029b5be232ee7e00d474ae892f\r\n', 63, 'Wednesday 18th of July 2018 09:09:03 AM'),
(29, '5f07ad33a6684f5a71ef53d41bf47213_4a65b556121dad0ac9ce777424cf742b\r\n', 64, 'Wednesday 18th of July 2018 09:10:14 AM'),
(30, '5f07ad33a6684f5a71ef53d41bf47213_756d964260d20d3d20360c2737acb76d\r\n', 65, 'Wednesday 18th of July 2018 09:13:05 AM'),
(31, 'b7dd99e48deceb49e09fcb5eac063e0f_562285657b7e6b8edc14b6a6a9a3d147\r\n', 66, 'Wednesday 18th of July 2018 09:19:53 AM'),
(32, '5dff9ddc8397584ca0b54bb082c85dd0_4f88a917178ecb7eb0748047e1f863be\r\n', 67, 'Wednesday 18th of July 2018 09:32:24 AM');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

DROP TABLE IF EXISTS `test`;
CREATE TABLE `test`
(
  `id` int
(11) NOT NULL,
  `colname` varchar
(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`
id`,
`colname
`) VALUES
(1, 'What'),
(2, 'does'),
(3, 'the'),
(4, 'Fox'),
(5, 'say');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`
(
  `id` int
(11) NOT NULL,
  `password` varchar
(64) NOT NULL,
  `email` varchar
(64) NOT NULL,
  `file` varchar
(128) DEFAULT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Activation` tinyint
(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`
id`,
`password
`, `email`, `file`, `date`, `Activation`) VALUES
(10, '$2y$10$EI/JIpN10ll8GY8h6Bxwn.kK2wKlKEmU160tZI2ckWCEz2ABEEg4K', 'RRR@gmail.com', '/Library/WebServer/Documents/blackjack/data/upload/deb5cc31d469ab4d50b20b3f667dc159.xls', '2018-07-05 12:58:57', 1),
(65, '$2y$10$MODUioJIO1HOKCbjuGTLm.7.qLHz2RuTaWi15tYxw1mEj83O.AziG', 'rbaybarin@icloud.com', NULL, '2018-07-18 12:13:04', 0),
(66, '$2y$10$nfRskvUs66kEIdlD3hayX.Cn4rhzACuZn1gqXTmcbIk2ta/pcfiUm', 'kmaklashov@mail.ru', NULL, '2018-07-18 12:19:45', 0),
(67, '$2y$10$VdoeAcDhlhsg.38ofDp45eMEKe2pZY0oXYK6VTKJrKSCHvjjeubnW', 'rbaybarin@gmail.com', NULL, '2018-07-18 12:32:22', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Activation`
--
ALTER TABLE `Activation`
ADD PRIMARY KEY
(`ID`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
ADD PRIMARY KEY
(`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
ADD PRIMARY KEY
(`id`),
ADD UNIQUE KEY `email`
(`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Activation`
--
ALTER TABLE `Activation`
  MODIFY `ID` int
(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `id` int
(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int
(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
