-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2021 at 05:02 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */
;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */
;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */
;
/*!40101 SET NAMES utf8mb4 */
;
--
-- Database: `lms`
--
-- --------------------------------------------------------
--
-- Table structure for table `issues`
--
CREATE TABLE `issues` (
  `roll_no` int(11) NOT NULL,
  `isbn_no` varchar(100) NOT NULL,
  `issue_date` date NOT NULL,
  `due_date` date NOT NULL,
  `return_date` date NOT NULL,
  `dues` int(11) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;
--
-- Dumping data for table `issues`
--
INSERT INTO `issues` (
    `roll_no`,
    `isbn_no`,
    `issue_date`,
    `due_date`,
    `return_date`,
    `dues`
  )
VALUES (
    1019104,
    '9352866711',
    '2021-04-14',
    '2021-04-21',
    '0000-00-00',
    0
  );
--
-- Indexes for dumped tables
--
--
-- Indexes for table `issues`
--
ALTER TABLE `issues`
ADD PRIMARY KEY (`roll_no`, `isbn_no`),
  ADD KEY `FORIEGN_KEY` (`isbn_no`);
--
-- Constraints for dumped tables
--
--
-- Constraints for table `issues`
--
ALTER TABLE `issues`
ADD CONSTRAINT `FORIEGN_KEY` FOREIGN KEY (`isbn_no`) REFERENCES `books` (`isbn_no`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `FORIEGN_KEY2` FOREIGN KEY (`roll_no`) REFERENCES `users` (`roll_no`);
COMMIT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */
;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */
;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */
;