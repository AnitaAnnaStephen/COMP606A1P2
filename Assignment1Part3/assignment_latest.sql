-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 21, 2019 at 04:43 AM
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
CREATE DEFINER=`root`@`localhost` PROCEDURE `spAddBooking` (IN `email` VARCHAR(255), IN `massagetype` VARCHAR(255), IN `duration` INT, IN `amount` DOUBLE, IN `messagefortherapist` VARCHAR(255), IN `serviceid` INT, IN `employeeid` INT, IN `bookeddate` DATE, IN `bookedtime` TIME)  MODIFIES SQL DATA
    DETERMINISTIC
    COMMENT 'SP to add user booking into the table'
BEGIN
INSERT INTO bookings (email,massagetype,duration,amount,messagefortherapist,serviceid,employeeid,bookeddate,bookedtime,bookingdate,bookingtime)
VALUES(email,massagetype,duration,amount,messagefortherapist,serviceid,employeeid,bookeddate,bookedtime,curdate(),curtime());
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spAddEmployee` (IN `FirstName` VARCHAR(50), IN `LastName` VARCHAR(50), IN `Email` VARCHAR(50), IN `Mobile` BIGINT(20), IN `dob` DATE, IN `Password` VARCHAR(50), IN `IsAdmin` INT)  MODIFIES SQL DATA
    DETERMINISTIC
    COMMENT 'Add data to employeedetails table'
BEGIN
INSERT INTO employeedetails (EmployeeId,email,firstname, lastname,dob,mobile,password,IsAdmin)
VALUES(NULL,email,firstname, lastname,dob,mobile,password,IsAdmin);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spAddFineDetails` (IN `BookingId` INT, IN `Email` VARCHAR(50), IN `FineAmount` DOUBLE, IN `DateofCancelling` DATE)  MODIFIES SQL DATA
    DETERMINISTIC
    COMMENT 'sp to add data in fine details'
BEGIN
INSERT INTO finedetails (FineId,bookingid,email,fineamount,date)
VALUES(NULL,bookingid,email,fineamount,DateofCancelling);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spAddUser` (IN `firstname` TINYTEXT, IN `lastname` TINYTEXT, IN `gender` TINYTEXT, IN `email` TINYTEXT, IN `address` TINYTEXT, IN `street` TINYTEXT, IN `suburb` TINYTEXT, IN `city` TINYTEXT, IN `po` INT, IN `mobile` BIGINT, IN `dob` DATE, IN `password` TINYTEXT, IN `isadmin` INT)  MODIFIES SQL DATA
    DETERMINISTIC
    COMMENT 'SP to add userdata into the table'
BEGIN
INSERT INTO userdetails (UserId,firstname, lastname,gender,email,address,street,suburb,city,po,mobile,dob,password,IsAdmin)
VALUES(NULL,firstname, lastname, gender,email,address,street,suburb,city,po,mobile,dob,password,isadmin);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spAssignService` (IN `Employeeid` INT, IN `ServiceId` INT)  MODIFIES SQL DATA
    DETERMINISTIC
    COMMENT 'SP to insert data into therapistdetails'
BEGIN
INSERT INTO therapistdetails (employeeid,serviceid)
VALUES(employeeid,serviceid);
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `BookingId` int(11) NOT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `MassageType` varchar(50) DEFAULT NULL,
  `Duration` int(11) DEFAULT NULL,
  `Amount` double DEFAULT NULL,
  `BookingDate` date DEFAULT NULL,
  `BookingTime` time DEFAULT NULL,
  `MessageForTherapist` varchar(70) DEFAULT NULL,
  `ServiceId` int(11) NOT NULL,
  `EmployeeId` int(11) NOT NULL,
  `BookedDate` date NOT NULL,
  `Bookedtime` time NOT NULL,
  `BookingStatus` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`BookingId`, `Email`, `MassageType`, `Duration`, `Amount`, `BookingDate`, `BookingTime`, `MessageForTherapist`, `ServiceId`, `EmployeeId`, `BookedDate`, `Bookedtime`, `BookingStatus`) VALUES
(20, 'don@mail.com', 'Sports Massage', 30, 45, '2019-09-21', '14:31:08', 'test', 1, 7, '2019-12-12', '08:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `employeedetails`
--

CREATE TABLE `employeedetails` (
  `EmployeeId` int(11) NOT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `FirstName` varchar(50) DEFAULT NULL,
  `LastName` varchar(50) DEFAULT NULL,
  `DOB` date NOT NULL,
  `Mobile` bigint(20) DEFAULT NULL,
  `IsAdmin` int(11) NOT NULL,
  `Password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employeedetails`
--

INSERT INTO `employeedetails` (`EmployeeId`, `Email`, `FirstName`, `LastName`, `DOB`, `Mobile`, `IsAdmin`, `Password`) VALUES
(1, '123@mail.com', 'Sam', 'Matt', '0000-00-00', 9686431491, 1, '12345'),
(2, 'anna123@mail.com', 'Ann', 'Rodd', '0000-00-00', 9874561231, 0, '12345'),
(4, 'anitaanna.stephen@gmail.com', 'Anita', 'Stephen', '2001-06-25', 2041871686, 1, '827ccb0eea8a706c4c34a16891f84e7b'),
(5, 'nc@ma.co', 'Anita', 'MATHEW', '1996-04-25', 2041871686, 0, '827ccb0eea8a706c4c34a16891f84e7b'),
(6, 'qwert@2.co', 'RAYMOL', 'MATHEW', '2003-03-25', 2041871686, 0, '827ccb0eea8a706c4c34a16891f84e7b'),
(7, 'cakespothomebakes@gmail.com', 'Anita', 'MATHEW', '2003-06-20', 2041871686, 0, 'e10adc3949ba59abbe56e057f20f883e'),
(8, 'anitadcaanna.stephen@gmail.com', 'Anita', 'Stephen', '1992-05-30', 2041871686, 0, 'e10adc3949ba59abbe56e057f20f883e'),
(9, 'anna.stephen@gmail.com', 'Anita', 'Stephen', '1992-05-30', 2041871686, 0, '827ccb0eea8a706c4c34a16891f84e7b'),
(10, 'anneda.stephen@gmail.com', 'Anita', 'Stephen', '1992-05-30', 2041871686, 0, '827ccb0eea8a706c4c34a16891f84e7b'),
(11, 'ron@123', 'ron', 'sage', '2013-03-30', 2041871686, 0, '827ccb0eea8a706c4c34a16891f84e7b'),
(12, 'ef@123', 'rgs', 'sdfgh', '1996-03-30', 2041871686, 0, '827ccb0eea8a706c4c34a16891f84e7b'),
(13, 'edf@sfd', 'hello', 'jgfg', '1993-03-28', 987456321, 0, '827ccb0eea8a706c4c34a16891f84e7b'),
(14, 'dona@123', 'dona', 'dan', '1993-05-21', 963258741, 0, '827ccb0eea8a706c4c34a16891f84e7b'),
(15, 'tony@123', 'rony', 'tony', '1963-05-20', 987456321, 0, '827ccb0eea8a706c4c34a16891f84e7b'),
(16, 'sad@123', 'das', 'sad', '1995-05-30', 1234567, 1, '827ccb0eea8a706c4c34a16891f84e7b'),
(17, 'kim@123', 'lee', 'kim', '1992-06-25', 987456321, 0, '827ccb0eea8a706c4c34a16891f84e7b'),
(18, 'anitddsaanna.stephen@gmail.com', 'Anita', 'Stephen', '1996-04-30', 2041871686, 0, '827ccb0eea8a706c4c34a16891f84e7b'),
(19, 'adam@123', 'Sandy', 'Adam', '1999-04-25', 2041871686, 1, '827ccb0eea8a706c4c34a16891f84e7b'),
(20, 'adam@12334', 'danah', 'gab', '2015-04-20', 963852741, 0, '827ccb0eea8a706c4c34a16891f84e7b');

-- --------------------------------------------------------

--
-- Table structure for table `finedetails`
--

CREATE TABLE `finedetails` (
  `FineId` int(11) NOT NULL,
  `BookingId` int(11) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `FineAmount` double NOT NULL,
  `Date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `finedetails`
--

INSERT INTO `finedetails` (`FineId`, `BookingId`, `Email`, `FineAmount`, `Date`) VALUES
(1, 3, 'don@mail.com', 4.5, '0000-00-00 00:00:00'),
(2, 5, 'anitaanna.stephen@gmail.com', 4.5, '0000-00-00 00:00:00'),
(3, 5, 'anitaanna.stephen@gmail.com', 4.5, '2019-09-19 00:00:00'),
(4, 6, 'anitaanna.stephen@gmail.com', 6, '2019-09-19 00:00:00'),
(5, 6, 'anitaanna.stephen@gmail.com', 6, '2019-09-19 00:00:00'),
(6, 7, '', 0, '2019-09-19 00:00:00'),
(7, 8, 'anitaanna.stephen@gmail.com', 0, '2019-09-19 00:00:00'),
(8, 10, 'anitaanna.stephen@gmail.com', 6, '2019-09-19 00:00:00'),
(9, 9, 'anitaanna.stephen@gmail.com', 4.5, '2019-09-19 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `ServiceId` int(11) NOT NULL,
  `MassageType` varchar(50) NOT NULL,
  `Duration` int(11) NOT NULL,
  `Amount` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`ServiceId`, `MassageType`, `Duration`, `Amount`) VALUES
(1, 'Sports Massage', 30, '45'),
(2, 'Therapeutic Massage', 60, '60'),
(6, 'Deep Tissue Massage', 60, '90');

-- --------------------------------------------------------

--
-- Table structure for table `therapistdetails`
--

CREATE TABLE `therapistdetails` (
  `EmployeeId` int(11) NOT NULL,
  `ServiceId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `therapistdetails`
--

INSERT INTO `therapistdetails` (`EmployeeId`, `ServiceId`) VALUES
(7, 1),
(10, 2),
(15, 1),
(15, 2),
(14, 6),
(17, 2),
(14, 1),
(17, 2),
(17, 1),
(15, 6),
(20, 2),
(18, 2),
(17, 6),
(18, 6),
(18, 1),
(13, 2);

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
  `Password` tinytext NOT NULL,
  `IsAdmin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userdetails`
--

INSERT INTO `userdetails` (`UserId`, `FirstName`, `LastName`, `Gender`, `Email`, `Address`, `Street`, `Suburb`, `City`, `PO`, `Mobile`, `DOB`, `Password`, `IsAdmin`) VALUES
(73, 'Don', 'Ben', 'Male', 'don@mail.com', '17A', 'Parr Street', 'Frankton', 'Hamilton', 3204, 2016864187, '1994-04-30', '9888cd5c082b9e015300afd756fc7f13', 0),
(78, 'Anita Anna', 'Stephen', 'Female', 'anna@mail.com', '1/1 Beatty Street', 'Melville', 'Hamilton', 'Hamilton', 2145, 2041871686, '1996-04-25', '9888cd5c082b9e015300afd756fc7f13', 1),
(82, 'Dannah', 'Philip', 'Female', 'cakespothomebakes@gmail.com', '1/1 Beatty Street, Melville', 'beatty', 'Hamilton', 'Hamilton', 3206, 9632587411, '2015-04-30', '827ccb0eea8a706c4c34a16891f84e7b', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`BookingId`);

--
-- Indexes for table `employeedetails`
--
ALTER TABLE `employeedetails`
  ADD PRIMARY KEY (`EmployeeId`);

--
-- Indexes for table `finedetails`
--
ALTER TABLE `finedetails`
  ADD PRIMARY KEY (`FineId`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`ServiceId`);

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
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `BookingId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `employeedetails`
--
ALTER TABLE `employeedetails`
  MODIFY `EmployeeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `finedetails`
--
ALTER TABLE `finedetails`
  MODIFY `FineId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `ServiceId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `userdetails`
--
ALTER TABLE `userdetails`
  MODIFY `UserId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
