-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2023 at 09:56 AM
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
(68, '', 3, '2023-05-10', 38, 'Pending', '18:38:00', 10),
(69, '', 4, '2023-05-12', 38, 'Pending', '18:39:00', 10),
(74, '', 2, '2023-06-09', 37, 'Paid', '07:41:00', 41),
(75, '', 3, '2023-05-24', 37, 'Pending', '07:42:00', 41),
(76, '', 4, '2023-05-26', 39, 'Paid', '07:55:00', 41);

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
(2, 'Drink & Drive', 1000),
(3, 'Without Helmet or Seatbelt', 1500),
(4, 'Without driver\'s License', 1000),
(5, 'Speeding', 500),
(6, 'Lane', 500);

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
(36, 'Sagar Budhathoki', '9840877988', 'Sagar@gmail.com', 'Naya Thimi, Bhaktapur'),
(37, 'Kumar Khadka', '9845787623', 'kumar@gmail.com', 'Kalopul, Kathmandu'),
(38, 'Amrit Regmi Magar', '9867354653', 'amrit@gmail.com', 'Koteshwor, Kathmandu'),
(39, 'Ashok kumar', '9844586948', 'ashok@gmail.com', 'kupondole'),
(61, 'Sujan kharel', '9846456565', 'sujan@gmail.com', 'kathmandu');

-- --------------------------------------------------------

--
-- Table structure for table `tblextpst`
--

CREATE TABLE `tblextpst` (
  `extPstId` int(10) UNSIGNED NOT NULL,
  `extPstUserId` int(10) UNSIGNED NOT NULL,
  `extPstAction` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblextpst`
--

INSERT INTO `tblextpst` (`extPstId`, `extPstUserId`, `extPstAction`) VALUES
(8, 13, 'Agree'),
(6, 13, 'Agree'),
(8, 12, 'Agree'),
(6, 12, 'Disagree'),
(10, 12, 'Agree'),
(11, 12, 'Agree'),
(12, 12, 'Agree'),
(12, 13, 'Agree'),
(10, 13, 'Agree'),
(1, 13, 'Agree'),
(1, 12, 'Agree'),
(13, 12, 'Disagree'),
(15, 12, 'Agree'),
(17, 12, 'Agree'),
(16, 12, 'Agree'),
(16, 16, 'Agree'),
(20, 12, 'Agree'),
(21, 13, 'Agree'),
(21, 12, 'Agree'),
(23, 13, 'Disagree'),
(24, 48, 'Agree'),
(26, 49, 'Agree'),
(25, 52, 'Disagree');

-- --------------------------------------------------------

--
-- Table structure for table `tblpst`
--

CREATE TABLE `tblpst` (
  `pstId` int(10) UNSIGNED NOT NULL,
  `pstFrom` int(10) UNSIGNED NOT NULL,
  `pstMsg` text NOT NULL,
  `pstCreated` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblpst`
--

INSERT INTO `tblpst` (`pstId`, `pstFrom`, `pstMsg`, `pstCreated`) VALUES
(8, 13, 'Feri try', '2023-04-11 16:57:52'),
(16, 12, 'Asasaa', '2023-04-12 02:30:04'),
(19, 16, 'This ss', '2023-04-15 02:24:08'),
(20, 12, 'hbhjvbhjbvhxbv', '2023-04-15 13:30:06'),
(22, 12, 'sfsfsfsf', '2023-04-25 15:19:08'),
(23, 13, 'vbcvhbv', '2023-04-28 01:56:52'),
(24, 48, 'Hello everyone, Welcome to My Traffic ', '2023-05-07 12:41:33'),
(25, 48, 'This is a good website for challan payment system', '2023-05-07 12:42:13'),
(26, 49, ' bcbcgc', '2023-05-08 08:01:26');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `Id` int(11) NOT NULL,
  `owner_of` int(10) UNSIGNED NOT NULL DEFAULT 0,
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
(48, 12, 'Manjil', 9857687456, 'Bhaktapur,Thimi', 'manjil@gmail.com', 'male', 'manjil', 'images/user.png'),
(49, 40, 'Sagar ', 9846575847, 'Kapan', 'sagar@gmail.com', 'male', 'sagar1', 'images/user.png'),
(51, 14, 'Saurya', 9845123454, 'Putalisadak', 'saurya@gmail.com', 'female', 'saurya', 'images/user.png'),
(52, 41, 'Saurya2', 9845637458, 'koteshwor', 'saurya12@gmail.com', 'female', 'saurya12', 'images/user.png'),
(53, 42, 'Ashok shrestha', 9845768374, 'kuleshwor', 'ashok@gmail.com', 'male', 'ashok12', 'images/user.png'),
(54, 0, 'Rohan', 9812211221, 'kathmandu', 'rohan@gmail.com', 'male', 'rohan123', 'images/user.png');

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
(10, 'BA 001 09 3456', 'Sagar ', '9847568355', 'Four-Wheelers', 'Honda'),
(41, 'BA 006 06 4456', 'Saurya2', '9854855868', 'Four-Wheelers', 'Hundai'),
(42, 'BA 004 56 3456', 'Ashok shrestha', '9586848567', 'Eight-Wheelers', 'Yamaha');

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
-- Indexes for table `tblpst`
--
ALTER TABLE `tblpst`
  ADD PRIMARY KEY (`pstId`);

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
  MODIFY `offense_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `offense_type`
--
ALTER TABLE `offense_type`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `police`
--
ALTER TABLE `police`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `tblpst`
--
ALTER TABLE `tblpst`
  MODIFY `pstId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `vehicle_info`
--
ALTER TABLE `vehicle_info`
  MODIFY `Id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

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
