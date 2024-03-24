-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql112.epizy.com
-- Generation Time: May 28, 2023 at 11:48 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `epiz_34044351_checkinn`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `bookingID` int(11) NOT NULL,
  `hotelID` varchar(45) NOT NULL,
  `roomID` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `noOfNight` int(11) NOT NULL,
  `checkInDate` date NOT NULL,
  `checkOutDate` date NOT NULL,
  `notes` varchar(500) NOT NULL,
  `noOfCustomer` varchar(45) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`bookingID`, `hotelID`, `roomID`, `email`, `noOfNight`, `checkInDate`, `checkOutDate`, `notes`, `noOfCustomer`) VALUES
(33, 'hma', 'hma_1', 'junior@gmail.com', 2, '2023-06-13', '2023-06-15', 'High-level room', '2'),
(32, 'hbg', 'hbg_1', 'peter@test.com', 2, '2023-06-14', '2023-06-16', '', '3'),
(31, 'hbg', 'hbg_1', 'hj@gmail.com', 1, '2023-06-08', '2023-06-09', 'Early Check-In', '1'),
(30, 'hlj', 'hlj_1', 'hj@gmail.com', 1, '2023-06-10', '2023-06-11', 'Early Check-In', '2'),
(29, 'hma', 'hma_1', 'peter@test.com', 1, '2023-05-30', '2023-05-31', '', '2'),
(28, 'hbs', 'hbs_3', 'beni@gmail.com', 1, '2023-05-31', '2023-06-01', '', '2'),
(25, 'hba', 'hba_2', 'aylchia001@gmail.com', 1, '2023-05-27', '2023-05-28', '', '1'),
(26, 'hbs', 'hbs_3', 'anica0206@gmail.com', 3, '2023-05-27', '2023-05-30', '', '2'),
(27, 'hba', 'hba_1', 'anica0206@gmail.com', 2, '2023-06-01', '2023-06-03', '', '2'),
(34, 'hbg', 'hbg_1', 'anica0206@naver.com', 2, '2023-05-27', '2023-05-29', '', '2');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customerID` int(255) NOT NULL,
  `email` text CHARACTER SET utf8mb4 NOT NULL,
  `customerName` text CHARACTER SET utf8mb4 NOT NULL,
  `dateOfBirth` date NOT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `notes` text CHARACTER SET utf8mb4 NOT NULL,
  `gender` text CHARACTER SET utf8mb4 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customerID`, `email`, `customerName`, `dateOfBirth`, `phone`, `notes`, `gender`) VALUES
(4, 'anica0206@gmail.com', 'Anica', '2002-02-06', '85104592', '', 'Female'),
(3, 'aylchia001@gmail.com', 'anon', '2023-05-27', '99918892', '', 'Female'),
(5, 'beni@gmail.com', 'beni', '2023-05-19', '90902891', '', 'Female'),
(6, 'peter@test.com', 'Peter', '2001-03-08', '74108520', '', 'Male'),
(7, 'hj@gmail.com', 'Hao Jie', '2023-05-26', '89291038', '', 'Male'),
(8, 'james@test.com', 'James', '1999-02-18', '78945612', '', 'Male'),
(9, 'junior@gmail.com', 'Junior', '2023-05-04', '82910283', '', 'Male'),
(10, 'customer@test.com', 'Customer', '2023-05-03', '90182937', '', 'Female'),
(11, 'anica0206@naver.com', 'Anica', '2023-05-27', '96862106', '', 'Male');

-- --------------------------------------------------------

--
-- Table structure for table `google_oauth`
--

CREATE TABLE `google_oauth` (
  `id` int(11) NOT NULL,
  `provider` varchar(255) NOT NULL,
  `provider_value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `hotel`
--

CREATE TABLE `hotel` (
  `hotelID` varchar(45) NOT NULL,
  `hotelName` varchar(100) NOT NULL,
  `fileName` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hotel`
--

INSERT INTO `hotel` (`hotelID`, `hotelName`, `fileName`, `address`) VALUES
('hba', 'Hotel Bay', 'hotel3.jpg', '670237 ring rd'),
('hbg', 'Hotel Grand', 'hotel6.jpg', '902 Edgefield Tide'),
('hbs', 'Hotel Boss', 'hotel1.jpg', '670613 bukit timah'),
('hkg', 'Hotel King', 'hotel4.jpg', '456123 Petir Rd'),
('hlj', 'Hotel Swiss', 'hotel5.jpeg', '890 bukit timah'),
('hma', 'Hotel Marina', 'hotel2.jpg', '456213 senja rd');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `paymentID` int(10) NOT NULL,
  `nameOnCard` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `cardNumber` varchar(45) NOT NULL,
  `expiryDate` varchar(45) NOT NULL,
  `cvc` varchar(45) NOT NULL,
  `hotelID` varchar(45) NOT NULL,
  `roomID` varchar(45) NOT NULL,
  `qrcodes` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`paymentID`, `nameOnCard`, `email`, `cardNumber`, `expiryDate`, `cvc`, `hotelID`, `roomID`, `qrcodes`) VALUES
(38, 'Anica', 'anica0206@naver.com', '1234123412341234', '2023-06', '123', 'hbg', 'hbg_1', ''),
(37, 'Junior', 'junior@gmail.com', '8291829318203829', '2023-02', '323', 'hma', 'hma_1', ''),
(36, 'Peter', 'peter@test.com', '7894789478947894', '2026-06', '789', 'hbg', 'hbg_1', ''),
(35, 'Hao Jie', 'hj@gmail.com', '8938192938291729', '2023-02', '314', 'hbg', 'hbg_1', ''),
(34, 'Hao Jie', 'hj@gmail.com', '9039029832910293', '2023-01', '212', 'hlj', 'hlj_1', ''),
(33, 'Peter', 'peter@test.com', '7894789478947894', '2027-05', '789', 'hma', 'hma_1', ''),
(32, 'beni', 'beni@gmail.com', '9086477854568896', '2023-01', '456', 'hbs', 'hbs_3', ''),
(31, 'Anica', 'anica0206@gmail.com', '1234123412341234', '2025-05', '123', 'hba', 'hba_1', ''),
(30, 'Anica', 'anica0206@gmail.com', '1234123412341234', '2025-05', '123', 'hbs', 'hbs_3', ''),
(29, 'anon', 'aylchia001@gmail.com', '8889707977546787', '2023-05', '520', 'hba', 'hba_2', '');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `id` int(11) NOT NULL,
  `roomID` varchar(45) NOT NULL,
  `hotelID` varchar(45) NOT NULL,
  `roomType` varchar(45) NOT NULL,
  `price` int(11) NOT NULL,
  `noOfGuestCanStay` int(11) NOT NULL,
  `fileName` varchar(100) NOT NULL,
  `QR` varchar(500) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`id`, `roomID`, `hotelID`, `roomType`, `price`, `noOfGuestCanStay`, `fileName`, `QR`) VALUES
(1, 'hba_1', 'hba', 'King Deluxe With City View', 2100, 4, 'king.jpg', 'https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=hba_1&choe=UTF-8'),
(1, 'hbs_1', 'hbs', 'Single', 500, 2, 'img_1.jpg', 'https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=hbs_1&choe=UTF-8'),
(2, 'hbs_2', 'hbs', 'Double', 1000, 4, 'img_2.jpg', 'https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=hbs_2&choe=UTF-8'),
(3, 'hbs_3', 'hbs', 'Sweet', 2000, 4, 'img_3.jpg', 'https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=hbs_3&choe=UTF-8'),
(4, 'hkg_1', 'hkg', 'Double', 1200, 4, 'img_4.jpg', 'https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=hkg_1&choe=UTF-8'),
(5, 'hkg_2', 'hkg', 'Deluxe', 1100, 2, 'img_6.jpg', 'https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=hkg_2&choe=UTF-8'),
(6, 'hma_1', 'hma', 'Twin', 800, 2, 'slider-5.jpg', ''),
(7, 'hma_2', 'hma', 'Sweet', 1500, 4, 'hero_2.jpg', ''),
(8, 'hba_2', 'hba', 'Single', 1000, 1, 'single.jpg', 'https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=hba_2&choe=UTF-8'),
(9, 'hlj_1', 'hlj', 'Single', 2, 2, 'hotelroom.jpg', 'https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=hlj_1&choe=UTF-8'),
(17, 'hbg_1', 'hbg', 'King Deluxe', 1300, 4, 'hero-presidential-suite_wide.jpg', 'https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=hbg_1&choe=UTF-8'),
(19, 'hbg_2', 'hbg', 'Double Deluxe', 1500, 2, 'hotel.jpg', 'https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=hbg_2&choe=UTF-8');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(45) NOT NULL,
  `name` varchar(45) NOT NULL,
  `dateofbirth` date NOT NULL,
  `profile` varchar(45) NOT NULL,
  `status` varchar(45) NOT NULL,
  `hotelID` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `name`, `dateofbirth`, `profile`, `status`, `hotelID`) VALUES
(2, 'hbs@test.com', 'hoteloperator', 'James', '2000-10-03', 'Hotel Operator', 'Active', 'hbs'),
(4, 'hba@test.com', 'hoteloperator', 'John', '1993-01-25', 'Hotel Operator', 'Active', 'hba'),
(5, 'hkg@test.com', 'hoteloperator', 'Kai', '1985-03-08', 'Hotel Operator', 'Active', 'hkg'),
(7, 'admin@test.com', 'admin', 'admin', '1991-02-06', 'Administrator', 'Active', NULL),
(52, 'ben@test.com', 'hoteloperator', 'ben', '2023-05-18', 'Hotel Operator', 'Active', 'hbg'),
(70, 'aylchia001@gmail.com', 'anica123', 'anon', '2023-05-27', 'Customer', 'Active', NULL),
(71, 'anica0206@gmail.com', 'moon7410', 'Anica', '2002-02-06', 'Customer', 'Active', NULL),
(72, 'beni@gmail.com', 'anica123', 'beni', '2023-05-19', 'Customer', 'Active', NULL),
(73, 'peter@test.com', 'customer', 'Peter', '2001-03-08', 'Customer', 'Active', NULL),
(74, 'hj@gmail.com', 'anica123', 'Hao Jie', '2023-05-26', 'Customer', 'Active', NULL),
(75, 'james@test.com', 'customer', 'James', '1999-02-18', 'Customer', 'Active', NULL),
(76, 'junior@gmail.com', 'customer', 'Junior', '2023-05-04', 'Customer', 'Active', NULL),
(77, 'customer@test.com', 'customer', 'Customer', '2023-05-03', 'Customer', 'Active', NULL),
(78, 'admin@user.com', 'admin123', 'Admin', '2023-05-27', 'Administrator', 'Active', NULL),
(80, 'anica0206@naver.com', 'customer', 'Anica', '2023-05-27', 'Customer', 'Active', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`bookingID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customerID`);

--
-- Indexes for table `google_oauth`
--
ALTER TABLE `google_oauth`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`hotelID`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`paymentID`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`id`,`roomID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `bookingID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customerID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `google_oauth`
--
ALTER TABLE `google_oauth`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `paymentID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
