-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2024 at 02:04 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sampaguita_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `cottage`
--

CREATE TABLE `cottage` (
  `cottage_Id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `Category` varchar(250) NOT NULL,
  `Description` varchar(250) NOT NULL,
  `Amenities` varchar(250) NOT NULL,
  `Price` varchar(250) NOT NULL,
  `Discount` varchar(250) NOT NULL,
  `Capacity` varchar(250) NOT NULL,
  `Status` varchar(250) NOT NULL,
  `name` varchar(250) NOT NULL,
  `image_dir` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cottage`
--

INSERT INTO `cottage` (`cottage_Id`, `title`, `Category`, `Description`, `Amenities`, `Price`, `Discount`, `Capacity`, `Status`, `name`, `image_dir`) VALUES
(1, 'Cottage 1', 'Regular', '                                                                        Description Example                                                                        ', '                                                                        Amenities Example                                                                   ', '500', '0', '15', 'Available', 'Cottage1', '../img/cottage1.jpg'),
(2, 'Cottage 2', 'Regular', 'Description Example', 'Amenities Example', '600', '0', '15', 'Available', 'Cottage2', '../img/cottage2.jpg'),
(3, 'Cottage 3', 'Regular', 'Description Example', 'Amenities Example', '700', '0', '15', 'Available', 'Cottage3', '../img/cottage3.jpg'),
(4, 'Cottage 4', 'Regular', 'Description Example', 'Amenities Example', '800', '0', '15', 'Available', 'Cottage4', '../img/cottage4.jpg'),
(5, 'Cottage 5', 'Regular', '                                    Description Example                                    ', '                                    Amenities Example                                    ', '900', '10', '15', 'Unavailable', 'Cottage5', '../img/cottage5.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `hall`
--

CREATE TABLE `hall` (
  `hall_Id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `Category` varchar(250) NOT NULL,
  `Description` varchar(250) NOT NULL,
  `Amenities` varchar(250) NOT NULL,
  `Price` varchar(250) NOT NULL,
  `Discount` varchar(250) NOT NULL,
  `Capacity` varchar(250) NOT NULL,
  `Status` varchar(250) NOT NULL,
  `name` varchar(250) NOT NULL,
  `image_dir` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hall`
--

INSERT INTO `hall` (`hall_Id`, `title`, `Category`, `Description`, `Amenities`, `Price`, `Discount`, `Capacity`, `Status`, `name`, `image_dir`) VALUES
(1, 'Hall 1', 'Regular', '                                                                                                            sample description                                                                                                            ', '                                                                                                            sample amenities                                                                                                      ', '10000', '20', '30', 'Available', 'Eventhall1', '../img/eventhall1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_Id` int(11) NOT NULL,
  `people_Id` int(11) NOT NULL,
  `reservation_Id` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `downpayment` int(11) NOT NULL,
  `balance` int(11) NOT NULL,
  `reference` varchar(250) NOT NULL,
  `payment_status` varchar(250) NOT NULL,
  `date_of_pay` varchar(250) NOT NULL,
  `name` varchar(250) NOT NULL,
  `image_dir` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_Id`, `people_Id`, `reservation_Id`, `total`, `downpayment`, `balance`, `reference`, `payment_status`, `date_of_pay`, `name`, `image_dir`) VALUES
(101, 1, 104, 9610, 4805, 4805, '', '1stPay', '2023-08-13', 'Osart', '../img/Osart.png'),
(102, 1, 105, 2510, 1255, 1255, '', '1stPay', '2023-08-13', 'Osart', '../img/Osart.png'),
(103, 1, 106, 9610, 4805, 4805, '', '1stPay', '2023-08-13', 'Osart', '../img/Osart.png'),
(104, 1, 106, 9610, 4805, 0, '123', '2ndPay', '2023-08-13', '', ''),
(105, 7, 108, 2300, 1150, 1150, '', '1stPay', '2023-08-13', 'Osart', '../img/Osart.png'),
(106, 7, 109, 2200, 1100, 1100, '', '1stPay', '2023-08-13', 'Osart', '../img/Osart.png'),
(107, 7, 110, 3100, 1550, 1550, '', '1stPay', '2023-08-13', 'Osart', '../img/Osart.png'),
(108, 7, 111, 2100, 1050, 1050, '', '1stPay', '2023-08-13', 'Osart', '../img/Osart.png'),
(109, 7, 111, 2100, 1050, 0, '123', '2ndPay', '2023-08-13', '', ''),
(110, 1, 105, 2510, 1255, 0, '1255', '2ndPay', '2023-08-13', 'Osart', '../img/Osart.png'),
(111, 2, 112, 10000, 5000, 5000, '', '1stPay', '2023-08-13', 'Osart', '../img/Osart.png'),
(112, 2, 112, 10000, 5000, 0, '123', '2ndPay', '2023-08-13', '', ''),
(113, 3, 113, 2500, 1250, 1250, '', '1stPay', '2023-08-13', 'Osart', '../img/Osart.png'),
(114, 3, 113, 2500, 1250, 0, '1250', '2ndPay', '2023-08-13', 'Osart', '../img/Osart.png'),
(115, 1, 114, 2510, 1255, 1255, '', '1stPay', '2023-08-15', 'Osart', '../img/Osart.png'),
(116, 1, 114, 2510, 1255, 0, '123', '2ndPay', '2023-08-15', '', ''),
(117, 3, 116, 1500, 750, 750, '', '1stPay', '2023-10-07', 'RegularRoom', '../img/RegularRoom.jpg'),
(118, 3, 116, 1500, 1, 0, '1', '2ndPay', '2023-10-07', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `people`
--

CREATE TABLE `people` (
  `people_Id` int(11) NOT NULL,
  `fName` varchar(250) NOT NULL,
  `lName` varchar(250) NOT NULL,
  `user_type` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `contactNumber` varchar(250) NOT NULL,
  `address` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `user_date_created` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `people`
--

INSERT INTO `people` (`people_Id`, `fName`, `lName`, `user_type`, `email`, `contactNumber`, `address`, `password`, `user_date_created`) VALUES
(1, 'Dave', 'Carandang', 'User', 'davecarandang9@gmail.com', '0214748364', 'Brgy Example Manila', '1610838743cc90e3e4fdda748282d9b8', '2023-08-09'),
(2, 'Andrew', 'Ala', 'User', 'andrew@gmail.com', '12345678909', 'Address example', 'd914e3ecf6cc481114a3f534a5faf90b', '2023-08-09'),
(3, 'Mharcia', 'Raguindin', 'User', 'mharciamaer@gmail.com', '09658755848', 'Teresa Rizal', '965fcc0b77bf173adf5d1702c08e83db', '2023-08-13'),
(4, 'Mae', 'Angelou', 'User', 'mae@gmail.com', '1231231', 'Dyan lang', 'eb4a4a36e4d53916f9979759c3d3b822', '2023-08-13'),
(5, 'qwe', 'qwe', 'User', 'qwe@gmail.com', '90909090', 'qwe', '76d80224611fc919a5d54f0ff9fba446', '2023-08-13'),
(6, 'Trisha', 'Mae', 'User', 'trishamae@gmail.com', '0999999', 'Dyan lang', '43a1915ee4fbc781a138e38bcbf3a43a', '2023-08-12'),
(7, 'Ralf', 'San Juan', 'User', 'ralf@gmail.com', '09999999', 'Add ress', '3cca634013591eb51173fb6207572e37', '2023-08-12'),
(8, 'Kenneth', 'Jose', 'User', 'kenneth@gmail.com', '123123123', 'wdqwdq', '7ca955bd92ca8b00548ddf36d2e79217', '2023-08-13'),
(9, 'Paul', 'San Juan', 'User', 'paul@gmail.com', '012312312', 'Paul Address', '6c63212ab48e8401eaf6b59b95d816a9', '2023-08-10'),
(10, 'John ', 'Doe', 'User', 'dcarandang32@gmail.com', '09274974849', 'Brgy Example Manila', '0a632138623874d68157eec9c1a4068c', '2023-08-10'),
(11, 'Albert', 'Einstein', 'User', 'albert@gmail.com', '1231231', 'Albert Address', '6c5bc43b443975b806740d8e41146479', '2023-08-14'),
(12, 'qwe', 'qwe', 'User', 'qwe@gmail.com', '123', 'qweqw', '76d80224611fc919a5d54f0ff9fba446', '2023-08-15');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `reservation_Id` int(11) NOT NULL,
  `people_Id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `number` int(11) NOT NULL,
  `room_Id` varchar(250) NOT NULL,
  `cottage_Id` varchar(250) NOT NULL,
  `hall_Id` varchar(250) NOT NULL,
  `timeInOut` varchar(250) NOT NULL,
  `dateIn` varchar(250) NOT NULL,
  `dateOut` varchar(250) NOT NULL,
  `adult` varchar(250) NOT NULL,
  `children` varchar(250) NOT NULL,
  `reservationStatus` varchar(250) NOT NULL,
  `payment_status` varchar(250) NOT NULL,
  `dateCreated` varchar(250) NOT NULL,
  `code` varchar(250) NOT NULL,
  `downCheckOut` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`reservation_Id`, `people_Id`, `name`, `email`, `number`, `room_Id`, `cottage_Id`, `hall_Id`, `timeInOut`, `dateIn`, `dateOut`, `adult`, `children`, `reservationStatus`, `payment_status`, `dateCreated`, `code`, `downCheckOut`) VALUES
(105, 1, 'Dave Carandang', 'davecarandang9@gmail.com', 214748364, '4', '5', '', '8pm - 4am', '08/13/2023', '08/14/2023', '2', '2', 'Arrived', 'Full Paid', '2023-08-13', 'UDAJJK8V8NQJSP2', '1255'),
(106, 1, 'Dave Carandang', 'davecarandang9@gmail.com', 214748364, '1', '5', '1', '8pm - 4am', '08/16/2023', '08/17/2023', '2', '1', 'Arrived', 'Full Paid', '2023-08-13', 'E3CN6I9DIYMSV9P', '4805'),
(111, 7, 'Ralf San Juan', 'ralf@gmail.com', 9999999, '2', '2', '', '8pm - 4am', '08/13/2023', '08/14/2023', '2', '2', 'Arrived', 'Full Paid', '2023-08-13', '5LXS2G5A5DTGJZA', '1050'),
(112, 2, 'Andrew Ala', 'andrew@gmail.com', 2147483647, '3', '1', '1', '8pm - 4am', '08/13/2023', '08/14/2023', '1', '1', 'Arrived', 'Full Paid', '2023-08-13', '7HJ784BY8S06EBJ', '5000'),
(113, 3, 'Mharcia Raguindin', 'mharciamaer@gmail.com', 2147483647, '5', '', '', '8pm - 4am', '08/13/2023', '08/14/2023', '1', '1', 'Arrived', 'Full Paid', '2023-08-13', 'MTIATJXS2R4JDVM', '1250'),
(114, 1, 'Dave Carandang', 'davecarandang9@gmail.com', 214748364, '4', '5', '', '8pm - 4am', '08/15/2023', '08/16/2023', '1', '1', 'Successed', 'Full Paid', '2023-08-15', 'JMJZ2UV8PJWKGS1', '1255'),
(115, 2, 'Andrew Ala', 'andrew@gmail.com', 2147483647, '2', '4', '', '8pm - 4am', '08/16/2023', '08/16/2023', '2', '2', 'Unpaid', '', '2023-08-15', '', ''),
(116, 3, 'Mharcia Raguindin', 'mharciamaer@gmail.com', 2147483647, '2', '', '', '8pm - 4am', '10/12/2023', '06/11/2023', '2', '2', '\r\n                  \r\n                    Confirmed                    \r\n                ', 'Full Paid', '2023-10-07', 'O13X9LRDJYB55UL', '750');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `room_Id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `Category` varchar(255) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `Amenities` varchar(250) NOT NULL,
  `Price` int(11) NOT NULL,
  `Discount` int(11) NOT NULL,
  `Capacity` varchar(255) NOT NULL,
  `Status` varchar(255) NOT NULL,
  `name` varchar(250) NOT NULL,
  `image_dir` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`room_Id`, `title`, `Category`, `Description`, `Amenities`, `Price`, `Discount`, `Capacity`, `Status`, `name`, `image_dir`) VALUES
(1, 'Room 101', 'Regular', '                                                                  Beds: 1 Single(s)                                                                        ', '                                                                        Wifi, Bath, Safe, Electricfan                                                                        ', 1000, 20, '4', 'Available', 'RegularRoom', '../img/RegularRoom.jpg'),
(2, 'Room 102', 'Double', ' Beds: 2 Single(s)', 'Wifi, Bath, Safe, Electricfan, Sofa', 1500, 0, '6', 'Available', 'DoubleRoom', '../img/DoubleRoom.jpeg'),
(3, 'Room 104', 'Standard', ' Beds: 1 King(s)', 'AC, Wifi, Bath, Safe, Smoking Allowed', 1500, 0, '2', 'Available', 'StandardRoom', '../img/StandardRoom.jpeg'),
(4, 'Room 105', 'Deluxe', '                                    Beds: 1 Super-King(s)                                    ', '                                    AC, Wifi, Bath, Safe, Shower, Towels                                    ', 2000, 15, '4', 'Available', 'DeluxeRoom', '../img/DeluxeRoom.jpeg'),
(5, 'Room 103', 'Family', 'Beds (2) Queens                                                                      ', 'AC, Wifi, Bath, Safe, Shower, Towels                                                                       ', 2500, 0, '6', 'Available', 'FamilyRoom', '../img/FamilyRoom.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `user_form`
--

CREATE TABLE `user_form` (
  `admin_Id` int(255) NOT NULL,
  `username` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `user_type` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_form`
--

INSERT INTO `user_form` (`admin_Id`, `username`, `email`, `password`, `user_type`) VALUES
(4, 'villa', 'resortvillasampaguita@gmail.com', '123', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cottage`
--
ALTER TABLE `cottage`
  ADD PRIMARY KEY (`cottage_Id`);

--
-- Indexes for table `hall`
--
ALTER TABLE `hall`
  ADD PRIMARY KEY (`hall_Id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_Id`);

--
-- Indexes for table `people`
--
ALTER TABLE `people`
  ADD PRIMARY KEY (`people_Id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`reservation_Id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`room_Id`);

--
-- Indexes for table `user_form`
--
ALTER TABLE `user_form`
  ADD PRIMARY KEY (`admin_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cottage`
--
ALTER TABLE `cottage`
  MODIFY `cottage_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `hall`
--
ALTER TABLE `hall`
  MODIFY `hall_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT for table `people`
--
ALTER TABLE `people`
  MODIFY `people_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `reservation_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `room_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `user_form`
--
ALTER TABLE `user_form`
  MODIFY `admin_Id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
