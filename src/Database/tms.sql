-- phpMyAdmin SQL Dump
-- version 5.2.2-dev+20230208.10b4fb35d9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: May 10, 2023 at 09:43 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.5

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
  `Status` varchar(30) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chalani`
--

INSERT INTO `chalani` (`Id`, `User_Id`, `Police_Id`, `Status`) VALUES
(1, 1, 20, 'Pending'),
(2, 13, 29, 'Pending'),
(3, 12, 29, 'Pending');

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
(92, 'Anish Khatiwada', 1, '2023-05-26', 29, 'Pending', '13:22:00', 4),
(104, '', 1, '2023-05-17', 20, 'Pending', '16:18:00', 5),
(105, '', 1, '2023-05-19', 20, 'Pending', '16:18:00', 4),
(106, '', 3, '2023-05-23', 32, 'Pending', '12:22:00', 7),
(110, '', 6, '2023-05-12', 34, 'Pending', '08:18:00', 8);

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
(1, 'Running in a Red light', 500),
(2, 'Drunk and Drive', 1000),
(3, 'Over speed', 500),
(4, 'Reckless Driving', 1000),
(5, 'Improper Lane Changing', 500),
(6, 'Driving with Faulty Equipments', 500);

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
(20, 'Sakar Budhathoki', '98540488888uu', 'sakarbudathoki@gmail.com', 'Balaju, KTMm'),
(29, 'Saurya', '9843584545', 'saurya@gmail.com', 'Koteshwor, KTM'),
(32, 'Man bahadur', '1357911131517', 'manbahadur@gmail.com', 'Putalisadak'),
(33, 'Ramkumar', '0', 'ramkumar@gmail.com', 'KTM'),
(34, 'Golkappa', '9842642678', ' why you need email?', 'Naxal');

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
(16, 1, 'Disagree'),
(20, 1, 'Agree'),
(8, 1, 'Disagree');

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
(19, 16, 'This ss', '2023-04-15 02:24:08');

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
(1, 5, 'Anish Khatiwada', 9806088266, 'Kathmandu', 'anishkhatioda@gmail.com', 'Male', 'anish123', 'images/user.png'),
(12, 1, 'Samir', 9807898070, 'Balaju', 'samir@gmail.com', 'male', 'samir', 'images/user.png'),
(13, 3, 'Sagar', 12121212, 'Thimi', 'sagar@gmail.com', 'male', 'sagar', 'images/sagar.jpg'),
(14, 1, 'Saroj', 98475637457, 'Koteshwor', 'saroj@gmail.com', 'male', 'saroj', 'images/user.png'),
(17, 0, 'Hemant', 9840677877, 'kapan', 'hemant@gmail.com', 'male', 'hemant', 'images/user.png'),
(18, 0, 'testman', 98, 'ktm', 'test', 'male', 'test', 'images/user.png'),
(19, 7, 'Vikas Sharma', 9852626356, 'Patan', 'vikas@gmail.com', 'male', 'vikas', 'images/user.png'),
(20, 8, 'Saurav', 9846573846, 'Kharibot', 'saurav@gmail.com', 'male', 'saurav', 'images/user.png');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_info`
--

CREATE TABLE `vehicle_info` (
  `Id` int(11) UNSIGNED NOT NULL,
  `vec_num` int(11) NOT NULL,
  `Owner_Name` varchar(50) NOT NULL,
  `License_Plate_No` varchar(20) NOT NULL,
  `Vehicle_Type` varchar(255) NOT NULL,
  `Manufacturer` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vehicle_info`
--

INSERT INTO `vehicle_info` (`Id`, `vec_num`, `Owner_Name`, `License_Plate_No`, `Vehicle_Type`, `Manufacturer`) VALUES
(4, 56, 'Anish Khatiwada', 'B1A', 'Two-Wheelers', 'Toyoto'),
(5, 57, 'Anish Khatiwada', 'B123457', 'Three-Wheelers', 'BMW'),
(6, 0, 'Vikas Sharma', 'L12345', 'Four-Wheelers', 'Farari'),
(7, 0, 'Vikas Sharma', 'L16', 'Four-Wheelers', 'Yatri'),
(8, 0, 'Saurav', '98384596', 'Six-Wheelers', 'tesla');

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
-- AUTO_INCREMENT for table `offense_record`
--
ALTER TABLE `offense_record`
  MODIFY `offense_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `offense_type`
--
ALTER TABLE `offense_type`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `police`
--
ALTER TABLE `police`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tblpst`
--
ALTER TABLE `tblpst`
  MODIFY `pstId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `vehicle_info`
--
ALTER TABLE `vehicle_info`
  MODIFY `Id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
-- Constraints for table `offense_record`
--
ALTER TABLE `offense_record`
  ADD CONSTRAINT `offense_record_ibfk_1` FOREIGN KEY (`Offense_Type_Id`) REFERENCES `offense_type` (`Id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `offense_record_ibfk_3` FOREIGN KEY (`Police_Id`) REFERENCES `police` (`Id`) ON DELETE SET NULL ON UPDATE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
