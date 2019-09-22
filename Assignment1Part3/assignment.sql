-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 22, 2019 at 10:09 AM
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

CREATE DEFINER=`root`@`localhost` PROCEDURE `spAddUser` (IN `firstname` TINYTEXT, IN `lastname` TINYTEXT, IN `gender` TINYTEXT, IN `email` TINYTEXT, IN `address` TINYTEXT, IN `street` TINYTEXT, IN `suburb` TINYTEXT, IN `city` TINYTEXT, IN `po` INT, IN `mobile` BIGINT, IN `dob` DATE, IN `password` TINYTEXT)  MODIFIES SQL DATA
    DETERMINISTIC
    COMMENT 'SP to add userdata into the table'
BEGIN
INSERT INTO userdetails (UserId,firstname, lastname,gender,email,address,street,suburb,city,po,mobile,dob,password)
VALUES(NULL,firstname, lastname, gender,email,address,street,suburb,city,po,mobile,dob,password);
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
  `MessageForTherapist` varchar(100) DEFAULT NULL,
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
(20, 'don@mail.com', 'Sports Massage', 30, 45, '2019-09-21', '14:31:08', 'test', 1, 7, '2019-12-12', '08:00:00', 'Cancelled'),
(21, 'don@mail.com', 'Sports Massage', 30, 45, '2019-09-21', '20:18:42', 'Running marathon', 1, 14, '2019-09-22', '08:00:00', 'Cancelled'),
(22, 'don@mail.com', 'Therapeutic Massage', 60, 60, '2019-09-21', '20:19:08', 'Recovering from spine injury and leg fracture.Mainly for pain reduction in leg', 2, 17, '2019-09-23', '08:00:00', 'Cancelled'),
(23, 'don@mail.com', 'Deep Tissue Massage', 60, 90, '2019-09-21', '20:19:34', 'For relaxation and stress relieving', 6, 17, '2019-09-30', '09:10:00', 'Cancelled'),
(24, 'don@mail.com', 'Sports Massage', 30, 45, '2019-09-21', '22:49:32', 'Running marathon', 1, 14, '2019-09-22', '08:00:00', 'Cancelled'),
(25, 'don@mail.com', 'Deep Tissue Massage', 60, 90, '2019-09-21', '22:50:32', 'Relaxation for body', 6, 14, '2019-09-25', '08:35:00', 'Cancelled'),
(26, 'don@mail.com', 'Sports Massage', 30, 45, '2019-09-21', '22:52:00', 'Running marathon', 1, 7, '2019-09-22', '08:00:00', 'Cancelled'),
(27, 'don@mail.com', 'Deep Tissue Massage', 60, 90, '2019-09-21', '22:52:31', 'For body relaxation', 6, 15, '2019-09-30', '09:10:00', 'Cancelled'),
(28, 'don@mail.com', 'Sports Massage', 30, 45, '2019-09-21', '22:54:18', 'Athlete playing badminton', 1, 17, '2019-09-25', '08:00:00', 'Cancelled'),
(29, 'don@mail.com', 'Therapeutic Massage', 60, 60, '2019-09-21', '22:54:52', 'Relaxation for body', 2, 10, '2019-11-25', '09:45:00', 'Cancelled'),
(30, 'don@mail.com', 'Deep Tissue Massage', 60, 90, '2019-09-21', '22:58:42', 'Skin rejuvenation ', 6, 18, '2019-09-22', '09:45:00', 'Cancelled'),
(31, 'anna@mail.com', 'Sports Massage', 30, 45, '2019-09-21', '23:24:32', 'Going for cycling competition soon', 1, 15, '2019-11-23', '08:00:00', ''),
(32, 'anna@mail.com', 'Aromatherapy', 45, 60, '2019-09-21', '23:25:05', 'Vacation relaxation and stress relieving', 7, 17, '2019-12-23', '08:00:00', ''),
(33, 'anna@mail.com', 'Deep Tissue Massage', 60, 90, '2019-09-21', '23:26:39', 'Skin rejuvenation', 6, 22, '2019-04-30', '09:45:00', ''),
(34, 'don@mail.com', 'Sports Massage', 30, 45, '2019-09-21', '23:55:08', 'test', 1, 15, '2019-11-25', '08:00:00', 'Cancelled'),
(35, 'don@mail.com', 'Therapeutic Massage', 60, 60, '2019-09-22', '00:11:52', 'Therapy', 2, 17, '2019-11-25', '08:00:00', 'Cancelled'),
(36, 'don@mail.com', 'Sports Massage', 30, 45, '2019-09-22', '00:15:57', 'test', 1, 15, '2019-09-22', '09:10:00', 'Cancelled'),
(37, 'anna@mail.com', 'Sports Massage', 30, 45, '2019-09-22', '00:35:38', 'test', 1, 17, '2019-09-23', '08:35:00', 'Cancelled'),
(38, 'don@mail.com', 'Deep Tissue Massage', 60, 90, '2019-09-22', '12:34:02', 'Deep tissue massage for relaxation', 6, 22, '2019-10-20', '08:00:00', 'Cancelled'),
(39, 'don@mail.com', 'Sports Massage', 30, 45, '2019-09-22', '12:35:31', 'preparing for running marathon', 1, 15, '2019-10-20', '08:00:00', 'Cancelled'),
(40, 'don@mail.com', 'Sports Massage', 30, 45, '2019-09-22', '16:02:55', 'one', 1, 15, '2019-10-25', '08:00:00', 'Cancelled'),
(41, 'don@mail.com', 'Sports Massage', 30, 45, '2019-09-22', '16:04:17', 'two', 1, 17, '2019-10-25', '08:35:00', 'Cancelled'),
(42, 'don@mail.com', 'Therapeutic Massage', 60, 60, '2019-09-22', '16:04:47', 'three', 2, 17, '2019-10-25', '08:00:00', 'Cancelled'),
(43, 'don@mail.com', 'Sports Massage', 30, 45, '2019-09-22', '16:15:58', 'one', 1, 15, '2019-09-23', '08:35:00', 'Cancelled'),
(44, 'don@mail.com', 'Therapeutic Massage', 30, 60, '2019-09-22', '16:16:43', 'test', 2, 17, '2019-10-20', '08:00:00', ''),
(45, 'don@mail.com', 'Aromatherapy', 30, 60, '2019-09-22', '16:58:56', 'stress relieving', 7, 21, '2019-10-25', '08:00:00', ''),
(46, 'don@mail.com', 'Therapeutic Massage', 30, 60, '2019-09-22', '17:00:49', 'four', 2, 17, '2019-11-25', '08:00:00', ''),
(47, 'don@mail.com', 'Deep Tissue Massage', 30, 90, '2019-09-22', '18:45:57', 'tissue massage', 6, 22, '2019-09-25', '08:00:00', ''),
(48, 'anna@mail.com', 'Aromatherapy', 30, 60, '2019-09-22', '19:19:15', 'therapy', 7, 23, '2019-12-26', '08:00:00', '');

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
(15, 'tony@123', 'rony', 'tony', '1963-05-20', 987456321, 0, '827ccb0eea8a706c4c34a16891f84e7b'),
(16, 'sad@123', 'das', 'sad', '1995-05-30', 1234567, 1, '827ccb0eea8a706c4c34a16891f84e7b'),
(17, 'kim@123', 'lee', 'kim', '1992-06-25', 987456321, 0, '827ccb0eea8a706c4c34a16891f84e7b'),
(19, 'adam@123', 'Sandy', 'Adam', '1999-04-25', 2041871686, 1, '827ccb0eea8a706c4c34a16891f84e7b'),
(21, 'sadam@123', 'Sandy', 'Adam', '2001-12-20', 987456213, 0, '827ccb0eea8a706c4c34a16891f84e7b'),
(22, 'dpam@123', 'Dev', 'Pam', '1999-12-20', 123547896, 0, '827ccb0eea8a706c4c34a16891f84e7b'),
(23, 'rdon@123', 'ron', 'dan', '2001-12-20', 963258741, 0, '827ccb0eea8a706c4c34a16891f84e7b');

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
(9, 9, 'anitaanna.stephen@gmail.com', 4.5, '2019-09-19 00:00:00'),
(10, 21, 'don@mail.com', 4.5, '2019-09-21 00:00:00'),
(11, 24, 'don@mail.com', 4.5, '2019-09-21 00:00:00'),
(12, 26, 'don@mail.com', 4.5, '2019-09-21 00:00:00'),
(13, 30, 'don@mail.com', 9, '2019-09-21 00:00:00'),
(14, 36, 'don@mail.com', 4.5, '2019-09-21 00:00:00'),
(15, 43, 'don@mail.com', 4.5, '2019-09-22 00:00:00'),
(16, 37, 'anna@mail.com', 4.5, '2019-09-22 00:00:00');

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
(2, 'Therapeutic Massage', 30, '60'),
(6, 'Deep Tissue Massage', 30, '90'),
(7, 'Aromatherapy', 30, '60');

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
(15, 1),
(17, 2),
(22, 6),
(21, 7),
(17, 1),
(17, 6),
(17, 7),
(15, 7),
(23, 7);

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
(73, 'Don', 'Ben', 'Male', 'don@mail.com', '17A', 'Parr Street', 'Frankton', 'Hamilton', 3204, 2016864187, '1994-04-30', '9888cd5c082b9e015300afd756fc7f13'),
(78, 'Anita Anna', 'Stephen', 'Female', 'anna@mail.com', '1/1 Beatty Street', 'Melville', 'Hamilton', 'Hamilton', 2145, 2041871686, '1996-04-25', '9888cd5c082b9e015300afd756fc7f13'),
(82, 'Dannah', 'Philip', 'Female', 'cakespothomebakes@gmail.com', '1/1 Beatty Street, Melville', 'beatty', 'Hamilton', 'Hamilton', 3206, 9632587411, '2015-04-30', '827ccb0eea8a706c4c34a16891f84e7b'),
(83, 'Dave', 'Matt', 'Male', 'matt@mail.com', '1/11', 'Queens Ave', 'Frankton', 'Hamilton', 3206, 2041871686, '1989-10-30', '9888cd5c082b9e015300afd756fc7f13');

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
  MODIFY `BookingId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `employeedetails`
--
ALTER TABLE `employeedetails`
  MODIFY `EmployeeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `finedetails`
--
ALTER TABLE `finedetails`
  MODIFY `FineId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `ServiceId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `userdetails`
--
ALTER TABLE `userdetails`
  MODIFY `UserId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
