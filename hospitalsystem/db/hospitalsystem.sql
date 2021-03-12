-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2021 at 05:08 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hospitalsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `updationDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`, `updationDate`) VALUES
(1, 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '20-12-2020 05:45:27 AM');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `id` int(11) NOT NULL,
  `doctorSpecialization` varchar(255) NOT NULL,
  `doctorId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `consultancyFees` int(11) NOT NULL,
  `appointmentDate` varchar(255) NOT NULL,
  `appointmentTime` varchar(255) NOT NULL,
  `postingDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `userStatus` int(11) NOT NULL,
  `doctorStatus` int(11) NOT NULL,
  `updationDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`id`, `doctorSpecialization`, `doctorId`, `userId`, `consultancyFees`, `appointmentDate`, `appointmentTime`, `postingDate`, `userStatus`, `doctorStatus`, `updationDate`) VALUES
(39, 'dentist', 26, 27, 0, '2020-12-14', '19:25', '2020-12-19 23:54:52', 0, 1, ''),
(40, 'heart', 2, 23, 0, '2020-12-24', '12:44', '2020-12-20 06:14:03', 1, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `id` int(11) NOT NULL,
  `doctorSpecialization` varchar(255) NOT NULL,
  `doctorId` int(11) NOT NULL,
  `doctorName` varchar(111) NOT NULL,
  `patientId` int(11) NOT NULL,
  `patientName` varchar(111) NOT NULL,
  `doctorFees` int(11) NOT NULL,
  `hospitalFees` int(11) NOT NULL,
  `labFees` int(11) NOT NULL,
  `billDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`id`, `doctorSpecialization`, `doctorId`, `doctorName`, `patientId`, `patientName`, `doctorFees`, `hospitalFees`, `labFees`, `billDate`) VALUES
(13, 'S', 2, 'K', 64, 'K', 500, 600, 3, '9');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` int(11) NOT NULL,
  `specilization` varchar(255) NOT NULL,
  `doctorName` varchar(255) NOT NULL,
  `address` longtext NOT NULL,
  `docFees` varchar(255) NOT NULL,
  `contactno` bigint(11) NOT NULL,
  `docEmail` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `creationDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updationDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `specilization`, `doctorName`, `address`, `docFees`, `contactno`, `docEmail`, `password`, `creationDate`, `updationDate`) VALUES
(1, 'Dentist', 'sai naik', 'mapusa', '500', 8486703354, 'sai@gmail.com', 'sai12345#', '2020-11-26 00:55:37', '26-11-2020 01:27:51 PM'),
(2, 'heart', 'Raj jain', 'panjim goa', '600', 99777647, 'raj@gmail.com', 'raj1234#', '2020-11-20 06:51:51', ''),
(9, 'skin', 'rahen', 'lolo', '700', 645657556, 'rahn@gmail', 'fe7bf66c29ce0f21534456f55d5e0b99', '2020-12-12 11:09:12', ''),
(13, 'Gynecologist/Obstetrician', 'riyan', 'lolo', '450', 645657556, 'rucha@gmail', '202cb962ac59075b964b07152d234b70', '2020-12-12 11:12:39', ''),
(17, 'skin', 'sanjana', 'lolo', '450', 645657556, 'rucha@gmail', 'a01610228fe998f515a72dd730294d87', '2020-12-12 11:15:35', ''),
(25, 'heart', 'rucha naik', 'ward 4', '1000', 9911981444, 'rucha@gmail', '9947b180c97a6752b56e71a38aa48939', '2020-12-19 21:58:53', ''),
(26, 'dentist', 'ruchi sain', 'ward 17', '1000', 9911981429, 'ruchi@gmail.com', '996c43b3df35048358e637b5f80e9954', '2020-12-19 22:18:48', '20-12-2020 11:37:17 AM'),
(27, 'Gynecologist/Obstetrician', 'rahen jain', 'ward 16', '750', 233467654, 'rahnnn@gmail', '81de0b16f16d29cf7c9d956f95228f63', '2020-12-20 00:07:23', '');

-- --------------------------------------------------------

--
-- Table structure for table `doctorspecilization`
--

CREATE TABLE `doctorspecilization` (
  `id` int(11) NOT NULL,
  `specilization` varchar(255) NOT NULL,
  `creationDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updationDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctorspecilization`
--

INSERT INTO `doctorspecilization` (`id`, `specilization`, `creationDate`, `updationDate`) VALUES
(1, 'Gynecologist/Obstetrician', '2020-11-20 06:37:25', ''),
(35, 'dentist', '2020-12-03 12:54:28', ''),
(45, 'heart', '2020-12-12 11:04:02', ''),
(47, 'eye specialist', '2020-12-19 22:00:14', ''),
(48, 'dermatology', '2020-12-19 22:03:18', ''),
(50, '', '2020-12-20 06:01:04', '');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(255) NOT NULL,
  `specilization` varchar(255) NOT NULL,
  `doctorName` varchar(255) NOT NULL,
  `q1` varchar(255) NOT NULL,
  `q2` varchar(255) NOT NULL,
  `q3` varchar(255) NOT NULL,
  `q4` varchar(255) NOT NULL,
  `q5` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `percent` varchar(255) NOT NULL,
  `patientname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `specilization`, `doctorName`, `q1`, `q2`, `q3`, `q4`, `q5`, `total`, `percent`, `patientname`) VALUES
(11, 'dentist', '1', '3', '2', '4', '5', '5', '19', '76', 'ranjana'),
(12, 'skin', '9', '5', '5', '5', '5', '5', '25', '100', 'ranjana'),
(13, 'skin', '17', '3', '4', '5', '5', '5', '22', '88', 'ranjana'),
(14, 'skin', '17', '5', '5', '4', '4', '4', '22', '88', 'sanjana'),
(15, 'dentist', '1', '4', '5', '4', '4', '3', '20', '80', 'saina naik'),
(16, 'dentist', '1', '5', '3', '1', '3', '4', '16', '64', 'saina naik'),
(17, 'dentist', '26', '5', '2', '4', '5', '3', '19', '76', 'rita naik'),
(18, 'heart', '2', '5', '4', '4', '4', '4', '21', '84', 'saina naik');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `id` int(11) NOT NULL,
  `fullName` varchar(255) NOT NULL,
  `address` longtext NOT NULL,
  `city` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `regDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updationDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`id`, `fullName`, `address`, `city`, `gender`, `email`, `password`, `regDate`, `updationDate`) VALUES
(6, 'trupti sht', 'mandrm', 'pndrsm', 'female', 'truptism2398@gmail.com', '006d2143154327a64d86a264aea225f3', '2020-12-13 12:21:06', ''),
(21, 'niki jain', 'mandrm', 'pndrsm', 'female', 'niki@gmail.com', 'c12e01f2a13ff5587e1e9e4aedb8242d', '2020-12-19 21:45:37', ''),
(23, 'saina naik', 'mandrm', 'pndrsm', 'female', 'saina@gmail.com', '192af134c5e11438e072827a6a103dcc', '2020-12-19 22:07:27', ''),
(24, 'sanjana shet', 'gudi', 'ponda', 'female', 'sanjana@gmail.com', 'c5990a201e678b5ff2d3ad5091753f2f', '2020-12-19 22:23:10', ''),
(26, 'riya naik', 'morjim', 'pernem', 'female', 'riya@gmail.com', '18f4becff6db8be4be6d560396d00ad0', '2020-12-19 23:46:01', ''),
(27, 'rita naik', 'mandrm', 'margao', 'female', 'rita@gmail.com', '2794d223f90059c9f705c73a99384085', '2020-12-19 23:51:37', '20-12-2020 05:27:46 AM');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctorspecilization`
--
ALTER TABLE `doctorspecilization`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `doctorspecilization`
--
ALTER TABLE `doctorspecilization`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
