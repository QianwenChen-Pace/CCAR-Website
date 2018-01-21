-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2017 at 06:02 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ccar`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `username`, `password`) VALUES
(1, 'admin', 'topsecret'),
(3, 'admin 2', 'topsecret'),
(5, 'admin 3', 'topsecret'),
(6, 'admin 4', 'topsecret'),
(7, 'addedadmin', 'Hello123!'),
(9, 'newadmin', 'Hello123!');

-- --------------------------------------------------------

--
-- Table structure for table `community`
--

CREATE TABLE `community` (
  `communityid` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `approved` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `community`
--

INSERT INTO `community` (`communityid`, `name`, `approved`) VALUES
(128, 'Community 1', 1),
(129, 'Community 2', 1),
(130, 'Community 3', 1),
(131, 'Community 4', 0),
(132, 'Community 5', 0),
(133, 'Community 6', 1),
(134, 'Community 7', 0),
(135, 'Community 8', 0),
(136, 'Community 9', 0),
(137, 'Community 10', 0),
(138, 'Community 11', 0),
(139, 'Community 12', 0),
(140, 'Community 13', 0),
(141, 'Community 14', 0),
(142, 'Community 15', 0),
(143, 'Community 16', 0),
(144, 'Community 17', 0),
(145, 'Community 18', 0),
(146, 'Community 19', 0),
(147, 'Community 20', 0),
(148, 'Community 21', 0),
(149, 'Community 22', 0),
(150, 'Community 23', 1),
(151, 'Community 24', 1),
(152, 'Community 25', 1),
(153, 'Community 26', 0),
(154, 'Community 27', 0),
(155, 'Community 28', 0),
(156, 'Community 29', 0),
(157, 'Community 30', 0),
(158, 'Community 31', 0),
(159, 'Community 32', 0),
(160, 'Community 33', 0),
(161, 'Community 34', 0),
(162, 'Community 35', 0),
(163, 'Community 36', 0),
(164, 'Community 37', 0),
(165, 'Community 38', 0),
(166, 'Community 39', 0),
(167, 'Community 40', 0),
(168, 'Community 41', 0),
(171, 'adf', 0);

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `crn` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `coursenumber` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`crn`, `title`, `coursenumber`) VALUES
(87654, 'Course Two', 'cs432'),
(98765, 'Course Three', 'cs322'),
(111111, 'Course Four', 'cs365'),
(123412, 'Course Five', 'cs658'),
(123422, 'Course Six', 'cs145'),
(123432, 'Course Seven', 'cs312'),
(125487, 'Course Eight', 'cs412'),
(245164, 'Course Nine', 'cs765'),
(246158, 'Course Ten', 'cs310'),
(254877, 'Course Eleven', 'cs213'),
(254879, 'Course Twelve', 'cs612'),
(658544, 'Course Thirteen', 'cs123'),
(658578, 'Course Fourteen', 'cs504'),
(748233, 'Course Fifteen', 'cs415'),
(785486, 'Course One', 'cs123'),
(785548, 'Course Sixteen', 'cs504'),
(985647, 'Course Seventeen', 'cs502'),
(986577, 'Course Eighteen', 'cs610');

-- --------------------------------------------------------

--
-- Table structure for table `instructor`
--

CREATE TABLE `instructor` (
  `instructorid` int(11) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `approved` tinyint(1) NOT NULL DEFAULT '0',
  `pwd` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `instructor`
--

INSERT INTO `instructor` (`instructorid`, `firstname`, `lastname`, `email`, `approved`, `pwd`) VALUES
(92, 'Instructor', 'One', 'test1@pace.edu', 1, ''),
(93, 'Instructor', 'Two', 'test2@pace.edu', 0, '$2y$10$PPn3FOYhuR7GsZmOs.xjNe.MBLX5GJnBa8S92HrJ46ilkdbg2WIAS'),
(94, 'Instructor', 'Three', 'tester1@pace.edu', 0, '$2y$10$AR3LQgchJRlfa7xHt3tkd.oXPBgSsj3AHiOP6MChcQqC6WUF37C8a'),
(95, 'Instructor', 'Four', 'preps@pace.edu', 1, '$2y$10$9cE2fovwTIG8d1KMDZcMP.ZOyuqOmojzUpkMjaxLUDfrgUb8ngUHy'),
(98, 'New', 'Instructor', 'NewInstructor@pace.edu', 0, '$2y$10$G4UL7/c.twNpcQlxBi/GQuNyhrx2PkIp9XMIXxK1c81S7vXH4B2ZO');

-- --------------------------------------------------------

--
-- Table structure for table `student_form`
--

CREATE TABLE `student_form` (
  `form_id` int(11) NOT NULL,
  `date` varchar(30) NOT NULL,
  `thours` int(2) NOT NULL,
  `description` tinytext NOT NULL,
  `approved` tinyint(1) DEFAULT '0',
  `session` varchar(50) NOT NULL,
  `supervisorid` int(11) NOT NULL,
  `instructorid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_form`
--

INSERT INTO `student_form` (`form_id`, `date`, `thours`, `description`, `approved`, `session`, `supervisorid`, `instructorid`) VALUES
(21, '10/09/2017', 10, 'Test Form A', 0, 'u12345678', 83, 0),
(22, '10/09/2017', 9, 'Test Form B', 1, 'u12345678', 83, 0),
(24, '10/09/2017', 11, 'Test Form C', 1, 'u12345678', 120, 0),
(25, '10/09/2017', 11, 'Test Form D', 0, 'u12345678', 83, 0),
(26, '10/09/2017', 10, 'Test Form E', 0, 'u12345678', 120, 0),
(27, '10/09/2017', 14, 'Test Form F', 0, 'u12345678', 120, 0),
(28, '10/09/2017', 10, 'Test Form G', 1, 'u12345678', 83, 0),
(29, '10/22/2017', 11, 'Test Form H', 0, 'u12345678', 69, 0),
(30, '10/22/2017', 17, 'Test Form I', 0, 'u12345678', 69, 0),
(31, '10/22/2017', 1, 'Test Form J', 0, 'u12345678', 65, 0),
(32, '10/22/2017', 10, 'Test Form K', 0, 'u12345678', 69, 0),
(33, '10/22/2017', 3, 'Test Form L', 0, 'u12345678', 100, 0),
(34, '10/22/2017', 11, 'Test Form M', 0, 'u12345678', 69, 0),
(75, '01/23/2017', 13, 'Test Form N', 1, 'u12345678', 122, 95),
(76, '01/11/2017', 10, 'Test Form O', 0, 'u12345678', 122, 95),
(77, '01/12/2017', 10, 'Test Form P', 0, 'u12345678', 122, 95),
(78, '01/12/2017', 10, 'Test Form Q', 1, 'u12345678', 122, 95),
(79, '01/12/2017', 1, 'Test Form R', 1, 'u12345678', 122, 95),
(80, '01/12/2017', 10, 'Test Form S', 1, 'u12345678', 120, 95);

-- --------------------------------------------------------

--
-- Table structure for table `student_register`
--

CREATE TABLE `student_register` (
  `unumber` varchar(9) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `sphone` varchar(12) NOT NULL,
  `stradress` varchar(50) NOT NULL,
  `city` varchar(30) NOT NULL,
  `state` varchar(2) NOT NULL,
  `zipcode` int(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `user_pwd` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_register`
--

INSERT INTO `student_register` (`unumber`, `firstname`, `lastname`, `sphone`, `stradress`, `city`, `state`, `zipcode`, `email`, `user_pwd`) VALUES
('u12345678', 'Test Student', 'One', '1234567891', '123 test street', 'White Plains', 'NY', 12345, 'student1@Pace.edu', '$2y$10$P5cerEhVO5Lfe.5YIeFWH.wvf3cyd/AOQRmd6wbMRB8VQBYrEkchq'),
('u12348765', 'Test-Student', 'Two', '1234567890', '118 smith ave', 'White Plains', 'NY', 12345, 'StudentEmail@pace.edu', '$2y$10$1mVp5Yy3Bcjkr0O0TwZYFeZEWCoHD.XmkiIE6ZXI4pVWb.yhrArPW'),
('u57483271', 'Test-student', 'Three', '0987654321', '123 test street', 'Testington', 'MI', 11111, 'EmailName@pace.edu', '$2y$10$08EiFJA.jV1HwGqKAznuPuRHc4e.QDoLDSU6ZILARypz8RifLr/kC'),
('u57483729', 'Test-Student', 'Four', '1234567890', '123 test street', 'Testington', 'AL', 11111, 'NameEmail@pace.edu', '$2y$10$QimE0pjMf3HCvm7X3p5N4.G.4/NhOO54wJN1CrJI7GoSY3cTQAQQe'),
('u87654321', 'Test-Student', 'Five', '1234567891', '123 test street', 'White Plains', 'NY', 12345, 'Name5@PaCe.edu', '$2y$10$memOJmiNx/4AtxCZZapj6.f7tOW8.wPVhWmX1PSQ1hFKNORlE90sm'),
('u89382746', 'Test-student', 'Six', '1231231234', '118 smith ave', 'Gershwinville', 'AL', 11233, '1234@pace.edu', '$2y$10$WAw7/5YF8spr0OSFRfAc7Ow4Kj6Nwp3NEZDBzsWryg97beetNE2cu'),
('u96754654', 'Test-Student', 'Seven', '0987654321', '118 smith ave', 'Testington', 'AL', 11111, 'email123@pace.edu', '$2y$10$Mc3L206ll8AUDG3mhz7xUOtA44whpyb0nwG/XYDBsdUbfrWalGDs.');

-- --------------------------------------------------------

--
-- Table structure for table `student_supervisor`
--

CREATE TABLE `student_supervisor` (
  `ss_id` int(11) NOT NULL,
  `student_id` varchar(9) NOT NULL,
  `supervisor_id` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_supervisor`
--

INSERT INTO `student_supervisor` (`ss_id`, `student_id`, `supervisor_id`) VALUES
(1, 'u12345678', ''),
(2, 'u12345678', '120');

-- --------------------------------------------------------

--
-- Table structure for table `supervisor`
--

CREATE TABLE `supervisor` (
  `supervisorid` int(11) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `sup_pwd` varchar(256) NOT NULL,
  `approved` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supervisor`
--

INSERT INTO `supervisor` (`supervisorid`, `firstname`, `lastname`, `phone`, `email`, `sup_pwd`, `approved`) VALUES
(123, 'test', 'supervisor', '1231231234', 'Pace@pace.edu', '$2y$10$U7EkJ6k7bOPFvxawOzXIJuwMw9gw7DNEoMsQdHvBE6JEcG0lwK9Te', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `community`
--
ALTER TABLE `community`
  ADD PRIMARY KEY (`communityid`),
  ADD KEY `communityid` (`communityid`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`crn`),
  ADD KEY `crn` (`crn`);

--
-- Indexes for table `instructor`
--
ALTER TABLE `instructor`
  ADD PRIMARY KEY (`instructorid`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `instructorid` (`instructorid`);

--
-- Indexes for table `student_form`
--
ALTER TABLE `student_form`
  ADD PRIMARY KEY (`form_id`);

--
-- Indexes for table `student_register`
--
ALTER TABLE `student_register`
  ADD PRIMARY KEY (`unumber`),
  ADD UNIQUE KEY `unumber` (`unumber`),
  ADD KEY `unumber_2` (`unumber`);

--
-- Indexes for table `student_supervisor`
--
ALTER TABLE `student_supervisor`
  ADD PRIMARY KEY (`ss_id`);

--
-- Indexes for table `supervisor`
--
ALTER TABLE `supervisor`
  ADD PRIMARY KEY (`supervisorid`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `community`
--
ALTER TABLE `community`
  MODIFY `communityid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=172;

--
-- AUTO_INCREMENT for table `instructor`
--
ALTER TABLE `instructor`
  MODIFY `instructorid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `student_form`
--
ALTER TABLE `student_form`
  MODIFY `form_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `student_supervisor`
--
ALTER TABLE `student_supervisor`
  MODIFY `ss_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `supervisor`
--
ALTER TABLE `supervisor`
  MODIFY `supervisorid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
