-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2024 at 11:36 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `we_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `fname` varchar(12) NOT NULL,
  `password` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `email` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `fname`, `password`, `lname`, `email`) VALUES
(2, 'Imran', '9081', 'Ali', 'imranali529081@gmail.com'),
(3, 'Taha', '427', 'Jawaid', 'TJawaid@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `attendances`
--

CREATE TABLE `attendances` (
  `sid` varchar(20) NOT NULL,
  `cid` varchar(20) NOT NULL,
  `Presence` enum('A','P','L') NOT NULL,
  `hours` enum('1','2','3') NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attendances`
--

INSERT INTO `attendances` (`sid`, `cid`, `Presence`, `hours`, `date`) VALUES
('1', 'AT1007', 'P', '2', '2024-04-30'),
('1', 'cs2004', 'A', '1', '2024-04-25'),
('1', 'cs2004', 'L', '1', '2024-05-04'),
('1', 'cs2004', 'A', '1', '2024-05-09'),
('1', 'cs2004', 'A', '2', '2024-05-12');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `cid` varchar(11) NOT NULL,
  `cname` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`cid`, `cname`) VALUES
('mt1009', 'calculas'),
('mt1012', 'ds'),
('ss2272', 'pakistan studies'),
('cs2004', 'programing fund'),
('AT1007', 'Web Eng');

-- --------------------------------------------------------

--
-- Table structure for table `course_reg`
--

CREATE TABLE `course_reg` (
  `sid` varchar(20) NOT NULL,
  `cid` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course_reg`
--

INSERT INTO `course_reg` (`sid`, `cid`) VALUES
('1', 'AT1007'),
('1', 'cs2004'),
('1', 'mt1009'),
('1', 'ss2272'),
('2', 'mt1009');

-- --------------------------------------------------------

--
-- Table structure for table `marks`
--

CREATE TABLE `marks` (
  `sid` varchar(20) NOT NULL,
  `cid` varchar(20) NOT NULL,
  `mid_1_marks` int(11) NOT NULL,
  `mid_2_marks` int(11) NOT NULL,
  `Assigment_1` int(11) NOT NULL,
  `Assigment_2` int(11) NOT NULL,
  `project` int(11) NOT NULL,
  `Final` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `marks`
--

INSERT INTO `marks` (`sid`, `cid`, `mid_1_marks`, `mid_2_marks`, `Assigment_1`, `Assigment_2`, `project`, `Final`) VALUES
('1', 'cs2004', 12, 7, 3, 2, 8, 35),
('1', 'ss2272', 12, 7, 4, 5, 8, 35);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `sid` varchar(11) NOT NULL,
  `fname` varchar(10) NOT NULL,
  `lname` varchar(10) NOT NULL,
  `cnic` varchar(13) NOT NULL,
  `pno` varchar(11) NOT NULL,
  `city` varchar(15) NOT NULL,
  `password` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`sid`, `fname`, `lname`, `cnic`, `pno`, `city`, `password`) VALUES
('1', 'taha', 'jawaid', '441038974123', '92124454321', 'karachi', '234'),
('2', 'fahad', 'khalil', '4410334489763', '03120034346', 'umerkot', 'Zain123'),
('3', 'akbe', 'df', '2346543', '675768', 'sagsrs', 'imran');

--
-- Triggers `students`
--
DELIMITER $$
CREATE TRIGGER `Save_Histroy` AFTER DELETE ON `students` FOR EACH ROW INSERT INTO student_history VALUES (OLD.sid,OLD.fname,OLD.Lname,Now(),'DELETED')
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `student_history`
--

CREATE TABLE `student_history` (
  `sid` varchar(20) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `STATUS` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_history`
--

INSERT INTO `student_history` (`sid`, `fname`, `lname`, `date`, `STATUS`) VALUES
('4', 'abc', 'sjnjc', '2024-05-13 08:24:56', 'DELETED'),
('5', 'ali', 'akber', '2024-05-13 08:25:02', 'DELETED');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `tid` varchar(20) NOT NULL,
  `fname` varchar(10) NOT NULL,
  `lname` varchar(10) NOT NULL,
  `cnic` varchar(13) NOT NULL,
  `pno` varchar(11) NOT NULL,
  `city` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`tid`, `fname`, `lname`, `cnic`, `pno`, `city`, `password`) VALUES
('1', 'shoib', 'rauf', '4410335487763', '03040034346', 'khi', '123'),
('2', 'sara', 'zafar', '123456789', '567789123', 'khi', '789');

--
-- Triggers `teachers`
--
DELIMITER $$
CREATE TRIGGER `Save_Histroy_Teacher` AFTER DELETE ON `teachers` FOR EACH ROW INSERT INTO teacher_history VALUES (OLD.tid,OLD.fname,OLD.Lname,Now(),'DELETED')
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `teacher_assign_course`
--

CREATE TABLE `teacher_assign_course` (
  `tid` varchar(20) NOT NULL,
  `cid` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teacher_assign_course`
--

INSERT INTO `teacher_assign_course` (`tid`, `cid`) VALUES
('1', 'cs2004'),
('2', 'mt1009'),
('2', 'mt1012'),
('2', 'ss2272');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_history`
--

CREATE TABLE `teacher_history` (
  `tid` varchar(20) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `STATUS` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teacher_history`
--

INSERT INTO `teacher_history` (`tid`, `fname`, `lname`, `Date`, `STATUS`) VALUES
('3', 'taha', 'bilal', '2024-05-13 08:26:55', 'DELETED'),
('4', 'haider', 'alsdms', '2024-05-13 08:26:58', 'DELETED');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendances`
--
ALTER TABLE `attendances`
  ADD PRIMARY KEY (`sid`,`cid`,`hours`,`date`),
  ADD KEY `foreign key of student table` (`sid`),
  ADD KEY `foreign key of course table` (`cid`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`cid`),
  ADD UNIQUE KEY `cname` (`cname`);

--
-- Indexes for table `course_reg`
--
ALTER TABLE `course_reg`
  ADD PRIMARY KEY (`sid`,`cid`),
  ADD KEY `cid` (`cid`);

--
-- Indexes for table `marks`
--
ALTER TABLE `marks`
  ADD PRIMARY KEY (`sid`,`cid`),
  ADD KEY `cid` (`cid`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`sid`),
  ADD UNIQUE KEY `cnic` (`cnic`),
  ADD UNIQUE KEY `pno` (`pno`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`tid`),
  ADD UNIQUE KEY `cnic` (`cnic`),
  ADD UNIQUE KEY `pno` (`pno`);

--
-- Indexes for table `teacher_assign_course`
--
ALTER TABLE `teacher_assign_course`
  ADD PRIMARY KEY (`tid`,`cid`),
  ADD KEY `cid` (`cid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendances`
--
ALTER TABLE `attendances`
  ADD CONSTRAINT `attendances_ibfk_1` FOREIGN KEY (`cid`) REFERENCES `course_reg` (`cid`),
  ADD CONSTRAINT `foreign key of student table` FOREIGN KEY (`sid`) REFERENCES `course_reg` (`sid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `course_reg`
--
ALTER TABLE `course_reg`
  ADD CONSTRAINT `course_reg_ibfk_1` FOREIGN KEY (`sid`) REFERENCES `students` (`sid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `course_reg_ibfk_2` FOREIGN KEY (`cid`) REFERENCES `course` (`cid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `marks`
--
ALTER TABLE `marks`
  ADD CONSTRAINT `marks_ibfk_1` FOREIGN KEY (`sid`) REFERENCES `course_reg` (`sid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `marks_ibfk_2` FOREIGN KEY (`cid`) REFERENCES `course_reg` (`cid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `teacher_assign_course`
--
ALTER TABLE `teacher_assign_course`
  ADD CONSTRAINT `teacher_assign_course_ibfk_2` FOREIGN KEY (`tid`) REFERENCES `teachers` (`tid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `teacher_assign_course_ibfk_3` FOREIGN KEY (`cid`) REFERENCES `course` (`cid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
