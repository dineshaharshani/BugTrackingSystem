-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 22, 2021 at 06:52 AM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bugtrackingsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `bugs`
--

CREATE TABLE `bugs` (
  `BugId` int(11) NOT NULL,
  `BugRefId` varchar(11) NOT NULL,
  `BugDescription` varchar(255) NOT NULL,
  `Project` text NOT NULL,
  `BugPiority` text NOT NULL,
  `BugStatus` text NOT NULL,
  `BugSummary` varchar(255) NOT NULL,
  `Attachments` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bugs`
--

INSERT INTO `bugs` (`BugId`, `BugRefId`, `BugDescription`, `Project`, `BugPiority`, `BugStatus`, `BugSummary`, `Attachments`) VALUES
(3, '', 'System is not working', '3', '--Select Piority--', '--Select Status--', 'snajnjds', ''),
(9, '', 'hbgvfcdx', '5', '2', '', 'jyhtgrfed', ''),
(17, '', 'Analysis data report has mismatch with production environment', '3', '2', '1', 'User cannot seen the real data with analysis detail report', '');

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

CREATE TABLE `district` (
  `DistrictId` int(11) NOT NULL,
  `DistrictName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `district`
--

INSERT INTO `district` (`DistrictId`, `DistrictName`) VALUES
(1, 'Colombo'),
(2, 'Gampaha'),
(3, 'Kaluthara'),
(4, 'Kandy'),
(5, 'Mathale'),
(6, 'Nuwara Eliya'),
(7, 'Galle'),
(8, 'Mathara'),
(9, 'Hambanthota'),
(10, 'Jaffna'),
(11, 'Mannar'),
(12, 'Vauniya'),
(13, 'Mulathivu'),
(14, 'Kilinochchi'),
(15, 'Batticaloa'),
(16, 'Ampara'),
(17, 'Trincomalee'),
(18, 'Kurunegala'),
(19, 'Puttalam'),
(20, 'Anuradhapura'),
(21, 'Polonnaruwa'),
(22, 'Badulla'),
(23, 'Monaraala'),
(24, 'Rathnapura'),
(25, 'Kegalle');

-- --------------------------------------------------------

--
-- Table structure for table `institutions`
--

CREATE TABLE `institutions` (
  `Ins_Id` int(11) NOT NULL,
  `Ins_Name` varchar(255) NOT NULL,
  `Ins_Code` int(11) NOT NULL,
  `Ins_Email` varchar(255) NOT NULL,
  `Ins_Tel` int(10) NOT NULL,
  `Title` text NOT NULL,
  `Director` varchar(255) NOT NULL,
  `Subjects` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `institutions`
--

INSERT INTO `institutions` (`Ins_Id`, `Ins_Name`, `Ins_Code`, `Ins_Email`, `Ins_Tel`, `Title`, `Director`, `Subjects`) VALUES
(1, 'Ministry Of Health', 111, 'health@gov.lk', 112974256, 'Mr.', 'Jagath Rohana', ''),
(2, 'Ministry of Finance and planning', 102, 'mof@treasury.gov.lk', 775689561, 'Mr.', 'Vishal Ranasinghe', ''),
(3, 'Ministry of Finance and planning', 102, 'mof@treasury.gov.lk', 775689561, 'Mr.', 'Vishal Ranasinghe', ''),
(4, 'Ministry of Finance and planning', 102, 'mof@treasury.gov.lk', 775689561, 'Mr.', 'Vishal Ranasinghe', ''),
(5, 'Ministry of Finance and planning', 102, 'mof@treasury.gov.lk', 775689561, 'Mr.', 'Vishal Ranasinghe', ''),
(6, 'Ministry of Finance and planning', 102, 'mof@treasury.gov.lk', 775689561, 'Mr.', 'Vishal Ranasinghe', '');

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE `modules` (
  `ModuleId` int(11) NOT NULL,
  `ModuleName` varchar(255) DEFAULT NULL,
  `ModulePath` varchar(255) DEFAULT NULL,
  `ModuleView` varchar(255) DEFAULT NULL,
  `ModuleIcon` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`ModuleId`, `ModuleName`, `ModulePath`, `ModuleView`, `ModuleIcon`) VALUES
(1, 'Bugs', 'Bugs', 'bugs', ''),
(2, 'Users', 'Users', 'user', ''),
(3, 'Projects', 'Projects', 'projects', '');

-- --------------------------------------------------------

--
-- Table structure for table `piority`
--

CREATE TABLE `piority` (
  `PiorityId` int(11) NOT NULL,
  `PiorityName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `piority`
--

INSERT INTO `piority` (`PiorityId`, `PiorityName`) VALUES
(1, 'High'),
(2, 'Medium'),
(3, 'Low');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `ProjectId` int(11) NOT NULL,
  `ProjectName` varchar(255) NOT NULL,
  `ProjectManager` varchar(200) NOT NULL,
  `StartDate` date NOT NULL,
  `EndDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`ProjectId`, `ProjectName`, `ProjectManager`, `StartDate`, `EndDate`) VALUES
(3, 'RAMIS', 'Dilshan Kodithuwakku', '2019-02-01', '2024-06-29'),
(4, 'CIGASSSJ', 'SKJSIJSKS', '2021-09-30', '2024-03-09'),
(5, 'HGRFEDSA', 'JHTGRFEDWS', '2021-10-08', '2021-09-01'),
(6, 'bgfvdcxs', 'nhgbfvdcs', '2021-09-01', '2021-09-21'),
(7, 'bgfvdcxs', 'nhgbfvdcs', '2021-09-01', '2021-09-21'),
(8, 'test', 'JHTGRFEDWS', '2021-10-02', '2021-10-02');

-- --------------------------------------------------------

--
-- Table structure for table `release_notes`
--

CREATE TABLE `release_notes` (
  `DocId` int(11) NOT NULL,
  `DocName` varchar(255) NOT NULL,
  `DocDate` date NOT NULL,
  `DocImage` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `release_notes`
--

INSERT INTO `release_notes` (`DocId`, `DocName`, `DocDate`, `DocImage`) VALUES
(1, '100620 RELEASE', '2021-10-19', '../Uploads/1558968665.PDF'),
(2, '100620 RELEASE', '2021-10-19', '../Uploads/600003487.PDF'),
(3, '100620 RELEASE', '2021-10-19', '../Uploads/1479438445.PDF'),
(4, '102450', '2021-09-09', '../Uploads/2136275587.PDF'),
(5, '102450', '2021-09-09', '../Uploads/250160123.PDF'),
(6, '102450', '2021-09-09', '../Uploads/1503210299.PDF');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `StatusId` int(11) NOT NULL,
  `StatusName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`StatusId`, `StatusName`) VALUES
(1, 'Open'),
(2, 'Inprogress'),
(3, 'Resolved'),
(4, 'Closed');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserId` int(11) NOT NULL,
  `UserName` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `FirstName` varchar(255) NOT NULL,
  `LastName` varchar(255) NOT NULL,
  `UserTitle` varchar(10) NOT NULL,
  `FullName` varchar(255) NOT NULL,
  `UserAddress` text NOT NULL,
  `UserEmail` varchar(255) NOT NULL,
  `UserTel` varchar(10) NOT NULL,
  `UserMobile` varchar(10) NOT NULL,
  `UserDistrict` int(11) NOT NULL,
  `DashBoard` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserId`, `UserName`, `Password`, `FirstName`, `LastName`, `UserTitle`, `FullName`, `UserAddress`, `UserEmail`, `UserTel`, `UserMobile`, `UserDistrict`, `DashBoard`) VALUES
(1, '967492019v', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Dinesha', 'Harshani', 'Mr.', 'Solanga Arachchige Dinesha Harshani', '217,Sooriyapaluwa,Ganemulla', 'dineshaharshani1996@gmail.com', '0112974200', '0773295704', 0, 'admin'),
(2, '997425612v', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Bhashura', 'Perera', '', 'Withana Mudiyansege Dewduni Harshani', '295,Koswaththa,Mathara', 'bhashura98@gmail.com', '0332257091', '0752224526', 0, 'manager'),
(3, '524512553v', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Kumudu', 'Sampath', 'Mr.', 'Ranathunga Mudiyanselage Kumudu Sampath Ranathunga', '561/A/3,Ja-ela road,Wattala', 'sampath@fmepsl.org', '0112987500', '0773431453', 0, 'developer'),
(7, '789548596v', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Uththara', 'Rajapaksha', 'Mrs.', 'Uththara', '123,Gamunu Mawatha', 'uththara@gmail.com', 'gfrde', '0776642490', 0, 'user'),
(18, '', '', '', '', 'Mr.', 'Dharani', 'Colombo 12', 'Dharani123@gmail.com', '0776642490', '0776642490', 17, '');

-- --------------------------------------------------------

--
-- Table structure for table `user_module`
--

CREATE TABLE `user_module` (
  `UserModuleId` int(11) NOT NULL,
  `UserId` int(11) DEFAULT NULL,
  `ModuleId` int(11) DEFAULT NULL,
  `ModuleStatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_module`
--

INSERT INTO `user_module` (`UserModuleId`, `UserId`, `ModuleId`, `ModuleStatus`) VALUES
(1, 1, 1, 1),
(2, 1, 2, 1),
(3, 1, 3, 1),
(4, 2, 1, 1),
(5, 2, 3, 1),
(6, 4, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bugs`
--
ALTER TABLE `bugs`
  ADD PRIMARY KEY (`BugId`);

--
-- Indexes for table `district`
--
ALTER TABLE `district`
  ADD PRIMARY KEY (`DistrictId`);

--
-- Indexes for table `institutions`
--
ALTER TABLE `institutions`
  ADD PRIMARY KEY (`Ins_Id`);

--
-- Indexes for table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`ModuleId`);

--
-- Indexes for table `piority`
--
ALTER TABLE `piority`
  ADD PRIMARY KEY (`PiorityId`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`ProjectId`);

--
-- Indexes for table `release_notes`
--
ALTER TABLE `release_notes`
  ADD PRIMARY KEY (`DocId`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`StatusId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserId`);

--
-- Indexes for table `user_module`
--
ALTER TABLE `user_module`
  ADD PRIMARY KEY (`UserModuleId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bugs`
--
ALTER TABLE `bugs`
  MODIFY `BugId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `district`
--
ALTER TABLE `district`
  MODIFY `DistrictId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `institutions`
--
ALTER TABLE `institutions`
  MODIFY `Ins_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
  MODIFY `ModuleId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `piority`
--
ALTER TABLE `piority`
  MODIFY `PiorityId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `ProjectId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `release_notes`
--
ALTER TABLE `release_notes`
  MODIFY `DocId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `StatusId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `user_module`
--
ALTER TABLE `user_module`
  MODIFY `UserModuleId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
