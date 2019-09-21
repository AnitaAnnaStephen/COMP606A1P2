-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 12, 2019 at 11:10 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `assignment`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `spAddUser` (IN `firstname` TINYTEXT, IN `lastname` TINYTEXT, IN `gender` TINYTEXT, IN `email` TINYTEXT, IN `address` TINYTEXT, IN `street` TINYTEXT, IN `suburb` TINYTEXT, IN `city` TINYTEXT, IN `po` INT, IN `mobile` BIGINT, IN `dob` DATE, IN `password` TINYTEXT)  MODIFIES SQL DATA
    DETERMINISTIC
    COMMENT 'SP to add userdata into the table'
BEGIN
INSERT INTO userdetails (UserId,firstname, lastname,gender,email,address,street,suburb,city,po,mobile,dob,password)
VALUES(NULL,firstname, lastname, gender,email,address,street,suburb,city,po,mobile,dob,password);
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `userdetails`
--

CREATE TABLE `userdetails` (
  `UserId` int(11) NOT NULL,
  `FirstName` tinytext NOT NULL,
  `LastName` tinytext NOT NULL,
  `Gender` tinytext DEFAULT NULL,
  `Email` varchar(50) NOT NULL,
  `Address` tinytext DEFAULT NULL,
  `Street` tinytext DEFAULT NULL,
  `Suburb` tinytext DEFAULT NULL,
  `City` tinytext DEFAULT NULL,
  `PO` int(11) DEFAULT NULL,
  `Mobile` bigint(20) NOT NULL,
  `DOB` date DEFAULT NULL,
  `Password` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userdetails`
--

INSERT INTO `userdetails` (`UserId`, `FirstName`, `LastName`, `Gender`, `Email`, `Address`, `Street`, `Suburb`, `City`, `PO`, `Mobile`, `DOB`, `Password`) VALUES
(2, 'sam', 'tim', NULL, 'sam@123.com', 'beatty', 'elville', 'frankton', 'Hamilton', 3206, 642041871686, NULL, '123456'),
(25, 'Adam', 'John', 'Male', 'adam@hotmail.com', '1/1 ', ' Beatty Street', ' Melville', 'Hamilton', 3206, 2041871686, NULL, '12345'),
(26, 'Tom', 'Sam', 'Male', 'tom.sam@gmail.com', '4/8', 'Lyon street', 'frankton', 'Hamilton', 3210, 2041871686, NULL, '40bd001563085fc35165329ea1ff5c5ecbdbbeef'),
(31, 'qwe', 'MATHEW', 'Female', 'afsasascq@edf.com', 'KOTTAMKOMBIL HOUSE, PUTHUVELY P.O.', 'dccd', 'KOTTAYAM', 'KOTTAYAM', 5656, 2345678765, '0000-00-00', '1966'),
(33, 'fdscd', 'cxcv', 'Female', 'cakespotdcmkihomebakes@gmail.com', 'ascf', 'fcddf', 'vfdsfe', 'fscxsx', 3206, 963852741, '1963-01-25', '202cb962ac59075b964b07152d234b70'),
(36, 'wds', 'csac', 'Female', 'davd@gmail.com', 'KOTTAMKOMBIL HOUSE, PUTHUVELY P.O.', 'Melville', 'KOTTAYAM', 'KOTTAYAM', 3625, 2041871686, '1993-12-20', '202cb962ac59075b964b07152d234b70'),
(37, 'wds', 'csac', 'Female', 'dassvd@gmail.com', 'KOTTAMKOMBIL HOUSE, PUTHUVELY P.O.', 'Melville', 'KOTTAYAM', 'KOTTAYAM', 3625, 2041871686, '1993-12-20', '202cb962ac59075b964b07152d234b70'),
(38, 'wds', 'csac', 'Female', 'dasasdsvd@gmail.com', 'KOTTAMKOMBIL HOUSE, PUTHUVELY P.O.', 'Melville', 'KOTTAYAM', 'KOTTAYAM', 3625, 2041871686, '1993-12-20', '202cb962ac59075b964b07152d234b70'),
(39, 'wdqs', 'acfs', 'Female', 'scacd@dfgf.com', '1/1 Beatty Street', 'Melville', 'Hamilton', 'Hamilton', 3456, 2041871686, '1986-04-22', '202cb962ac59075b964b07152d234b70'),
(40, 'wdqs', 'acfs', 'Female', 'scdcdaacd@dfgf.com', '1/1 Beatty Street', 'Melville', 'Hamilton', 'Hamilton', 3456, 2041871686, '1986-04-22', '202cb962ac59075b964b07152d234b70'),
(44, 'dah', 'lkhyaidh', 'Female', 'xks@jkk.com', '1/1 Beatty Street', 'Melville', 'Hamilton', 'Hamilton', 32001, 2041871686, '1993-02-25', '202cb962ac59075b964b07152d234b70'),
(45, 'RAYMOL', 'MATHEW', 'Female', 'anaaita@gmail.com', 'KOTTAMKOMBIL HOUSE, PUTHUVELY P.O.', 'Melville', 'KOTTAYAM', 'KOTTAYAM', 3203, 2041871686, '1993-11-25', '202cb962ac59075b964b07152d234b70'),
(66, 'Anita', 'Anna', 'Female', 'aanna.stephen@gmail.com', '1/1 Beatty Street', 'Melville', 'Hamilton', 'Hamilton', 3206, 2041871686, '1992-04-30', '123456'),
(67, 'Anita', 'Anna', 'Female', 'annaanitastephen@gmail.com', '1/1 Beatty Street', 'Melville', 'Hamilton', 'Hamilton', 3206, 2041871686, '1992-04-30', '123456'),
(68, 'anna', 'sne', 'Female', 'anna@gmail.com', '1/1 Beatty Street', 'Melville', 'Hamilton', 'Hamilton', 3206, 2041871686, '1992-04-30', 'e10adc3949ba59abbe56e057f20f883e'),
(69, 'Anita', 'Anna', 'Female', 'Anita@mail.com', '1/1 Beatty Street', 'Melville', 'Hamilton', 'Hamilton', 3206, 2041871686, '1996-09-20', 'd8578edf8458ce06fbc5bb76a58c5ca4'),
(70, 'RAYMOL', 'MATHEW', 'Female', 'qwerty@mail.co', 'KOTTAMKOMBIL HOUSE, PUTHUVELY P.O.', 'Melville', 'KOTTAYAM', 'KOTTAYAM', 3206, 2041871686, '1992-04-30', 'asdfg'),
(71, 'sam', 'sim', 'Male', 'sam@abc.co', 'mahoe', 'Melville', 'Hamilton', 'Hamilton', 3206, 2041871686, '1992-04-30', '827ccb0eea8a706c4c34a16891f84e7b'),
(72, 'tom', 'cat', 'Male', 'tom@cat.com', '5/8', 'Lyon street', 'Frankton', 'Hamilton', 3204, 2041871686, '1993-04-30', '827ccb0eea8a706c4c34a16891f84e7b'),
(73, 'Don', 'Ben', 'Male', 'don@mail.com', '17A', 'Parr Street', 'Frankton', 'Hamilton', 3204, 2016864187, '1994-04-30', 'd3ed79e3a86152e36ee9e8345ea135ba'),
(74, 'Dan', 'Ben', 'Male', 'dan@mail.com', '1/1 Beatty Street', 'Melville', 'Hamilton', 'Hamilton', 3206, 2041871686, '1994-04-30', '25f9e794323b453885f5181f1b624d0b'),
(75, 'RAYMOL', 'MATHEW', 'Female', 'anitaanna.stephen@gmail.com', 'KOTTAMKOMBIL HOUSE, PUTHUVELY P.O.', 'Melville', 'KOTTAYAM', 'KOTTAYAM', 3201, 2041871686, '1963-05-20', '827ccb0eea8a706c4c34a16891f84e7b');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `userdetails`
--
ALTER TABLE `userdetails`
  ADD PRIMARY KEY (`UserId`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `userdetails`
--
ALTER TABLE `userdetails`
  MODIFY `UserId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
