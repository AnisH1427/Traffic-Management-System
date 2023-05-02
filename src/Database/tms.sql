-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 11, 2023 at 03:31 PM
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
-- Database: `tms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Id` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `MobileNumber` bigint(20) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Id`, `Name`, `MobileNumber`, `Email`, `Password`) VALUES
(1, 'Admin1', 9843584545, 'anish@gmail.com', 'admin'),
(2, 'Admin2', 9843567854, 'saagar@gmail.com', 'admin2');

-- --------------------------------------------------------

--
-- Table structure for table `chalani`
--

CREATE TABLE `chalani` (
  `Id` int(11) NOT NULL,
  `User_Id` int(11) NOT NULL,
  `Police_Id` int(11) NOT NULL,
  `Status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `chatroom`
--

CREATE TABLE `chatroom` (
  `Id` int(11) NOT NULL,
  `User_Id` int(11) NOT NULL,
  `Admin_Id` int(11) NOT NULL,
  `Message` int(11) NOT NULL,
  `Reputation_Points` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `offense_record`
--

CREATE TABLE `offense_record` (
  `offense_Id` int(11) NOT NULL,
  `Offender_Name` varchar(50) NOT NULL,
  `Offense_Type_Id` int(11) DEFAULT NULL,
  `Date` date NOT NULL DEFAULT current_timestamp(),
  `Police_Id` int(11) DEFAULT NULL,
  `Status` varchar(500) NOT NULL DEFAULT 'Pending',
  `time` time NOT NULL DEFAULT current_timestamp(),
  `vehicle_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `offense_record`
--

INSERT INTO `offense_record` (`offense_Id`, `Offender_Name`, `Offense_Type_Id`, `Date`, `Police_Id`, `Status`, `time`, `vehicle_id`) VALUES
(12, 'Anish', 2, '1899-12-31', 20, 'Paid', '11:02:40', 1),
(22, 'Sagar', 1, '2023-04-11', 29, 'Pending', '11:02:40', 1),
(34, 'afsd', 2, '2023-04-19', 29, 'Pending', '16:47:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `offense_type`
--

CREATE TABLE `offense_type` (
  `Id` int(11) NOT NULL,
  `type_Name` varchar(50) NOT NULL,
  `Penalty_Amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `offense_type`
--

INSERT INTO `offense_type` (`Id`, `type_Name`, `Penalty_Amount`) VALUES
(1, 'Red light', 500),
(2, 'Test', 5555);

-- --------------------------------------------------------

--
-- Table structure for table `police`
--

CREATE TABLE `police` (
  `Id` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `MobileNumber` varchar(13) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Location_Name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `police`
--

INSERT INTO `police` (`Id`, `Name`, `MobileNumber`, `Email`, `Location_Name`) VALUES
(20, 'Sagar Budhathoki', '9854040223', 'yeahme.sagar@gmail.commmm', 'Balaju, KTM'),
(29, 'Saurya', '9843584545', 'anish@gmail.com', 'Koteshwor, KTM');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `Id` int(11) NOT NULL,
  `owner_of` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `Name` varchar(50) NOT NULL,
  `MobileNumber` bigint(20) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `pic` varchar(255) NOT NULL DEFAULT 'images/user.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Id`, `owner_of`, `Name`, `MobileNumber`, `Address`, `Email`, `Gender`, `Password`, `pic`) VALUES
(12, 1, 'Samir', 9807898070, 'Balaju', 'samir@gmail.com', 'male', 'samir', 'images/sagar.jpg'),
(13, 0, 'Sagar', 12121212, 'Thimi', 'sagar@gmail.com', 'male', 'sagar', 'images/user.png');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_info`
--

CREATE TABLE `vehicle_info` (
  `Id` int(11) UNSIGNED NOT NULL,
  `vec_num` varchar(255) NOT NULL,
  `Owner_Name` varchar(50) NOT NULL,
  `License_Plate_No` varchar(20) NOT NULL,
  `Vehicle_Type` varchar(255) NOT NULL,
  `Manufacturer` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vehicle_info`
--

INSERT INTO `vehicle_info` (`Id`, `vec_num`, `Owner_Name`, `License_Plate_No`, `Vehicle_Type`, `Manufacturer`) VALUES
(1, 'BA 003 07 2043', 'Samir Shrestha', '123321123321', 'Bike', 'Duke');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `chalani`
--
ALTER TABLE `chalani`
  ADD KEY `User_Id` (`User_Id`),
  ADD KEY `Police_Id` (`Police_Id`);

--
-- Indexes for table `chatroom`
--
ALTER TABLE `chatroom`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `User_Id` (`User_Id`),
  ADD KEY `Admin_Id` (`Admin_Id`);

--
-- Indexes for table `offense_record`
--
ALTER TABLE `offense_record`
  ADD PRIMARY KEY (`offense_Id`),
  ADD KEY `Offense_Type_Id` (`Offense_Type_Id`),
  ADD KEY `Police_Id` (`Police_Id`);

--
-- Indexes for table `offense_type`
--
ALTER TABLE `offense_type`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `police`
--
ALTER TABLE `police`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `vehicle_info`
--
ALTER TABLE `vehicle_info`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Vehicle_Type_Id` (`Vehicle_Type`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chatroom`
--
ALTER TABLE `chatroom`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `offense_record`
--
ALTER TABLE `offense_record`
  MODIFY `offense_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `offense_type`
--
ALTER TABLE `offense_type`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `police`
--
ALTER TABLE `police`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `vehicle_info`
--
ALTER TABLE `vehicle_info`
  MODIFY `Id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chalani`
--
ALTER TABLE `chalani`
  ADD CONSTRAINT `chalani_ibfk_1` FOREIGN KEY (`User_Id`) REFERENCES `user` (`Id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `chalani_ibfk_2` FOREIGN KEY (`Police_Id`) REFERENCES `police` (`Id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `chatroom`
--
ALTER TABLE `chatroom`
  ADD CONSTRAINT `chatroom_ibfk_1` FOREIGN KEY (`User_Id`) REFERENCES `user` (`Id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `chatroom_ibfk_2` FOREIGN KEY (`Admin_Id`) REFERENCES `admin` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `offense_record`
--
ALTER TABLE `offense_record`
  ADD CONSTRAINT `offense_record_ibfk_1` FOREIGN KEY (`Offense_Type_Id`) REFERENCES `offense_type` (`Id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `offense_record_ibfk_3` FOREIGN KEY (`Police_Id`) REFERENCES `police` (`Id`) ON DELETE SET NULL ON UPDATE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
