-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 27, 2023 at 09:11 AM
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
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `people`
--

INSERT INTO `people` (`people_Id`, `fName`, `lName`, `user_type`, `email`, `contactNumber`, `address`, `password`) VALUES
(1, 'Dave', 'Carandang', 'User', 'davecarandang9@gmail.com', '0214748364', 'Brgy Example Manila', '1610838743cc90e3e4fdda748282d9b8'),
(2, 'Andrew', 'Ala', 'User', 'andrew@gmail.com', '12345678909', 'Address example', 'd914e3ecf6cc481114a3f534a5faf90b'),
(3, 'Mharcia', 'Raguindin', 'User', 'mharciamaer@gmail.com', '09658755848', 'Teresa Rizal', '965fcc0b77bf173adf5d1702c08e83db'),
(4, 'Mae', 'Angelou', 'User', 'mae@gmail.com', '1231231', 'Dyan lang', 'eb4a4a36e4d53916f9979759c3d3b822'),
(5, 'qwe', 'qwe', 'User', 'qwe@gmail.com', '90909090', 'qwe', '76d80224611fc919a5d54f0ff9fba446'),
(6, 'Trisha', 'Mae', 'User', 'trishamae@gmail.com', '0999999', 'Dyan lang', '43a1915ee4fbc781a138e38bcbf3a43a'),
(7, 'Ralf', 'San Juan', 'User', 'ralf@gmail.com', '09999999', 'Add ress', '3cca634013591eb51173fb6207572e37'),
(8, 'Kenneth', 'Jose', 'User', 'kenneth@gmail.com', '123123123', 'wdqwdq', '7ca955bd92ca8b00548ddf36d2e79217'),
(9, 'Paul', 'San Juan', 'User', 'paul@gmail.com', '012312312', 'Paul Address', '6c63212ab48e8401eaf6b59b95d816a9'),
(10, 'John ', 'Doe', 'User', 'dcarandang32@gmail.com', '09274974849', 'Brgy Example Manila', '0a632138623874d68157eec9c1a4068c'),
(11, 'Albert', 'Einstein', 'User', 'albert@gmail.com', '1231231', 'Albert Address', '6c5bc43b443975b806740d8e41146479');

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
  MODIFY `payment_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `people`
--
ALTER TABLE `people`
  MODIFY `people_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `reservation_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

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
