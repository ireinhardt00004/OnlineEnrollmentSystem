-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 30, 2023 at 04:07 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_enroll`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `contact_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` varchar(500) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`contact_id`, `name`, `email`, `subject`, `message`, `timestamp`) VALUES
(1, 'XXXXXXX', 'kalboposting@gmail.com', 'Nothing', 'Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.\r\n\r\nMagnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem h', '2023-06-23 15:08:41'),
(3, 'kevin', 'aaa@gmail.com', 'aaaaa', '\"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tem', '2023-06-28 05:24:01');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `dept_id` int(11) NOT NULL,
  `dept_name` varchar(55) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`dept_id`, `dept_name`, `description`) VALUES
(1, 'Bachelor of Science in Information Technology', ''),
(2, 'Bachelor of Science in Business Management', ''),
(3, 'Bachelor of Science in Hospitality Management', '');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `faculty_id` int(11) NOT NULL,
  `img_url` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `accountID` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `bdate` date NOT NULL,
  `course` varchar(255) NOT NULL,
  `cnum` varchar(11) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`faculty_id`, `img_url`, `fname`, `middlename`, `lname`, `accountID`, `email`, `password`, `bdate`, `course`, `cnum`, `gender`, `address`, `role`) VALUES
(1, 'IMG-649ac9b04ad289.43473465.png', 'Marjorie', '', 'Barabat', '649ac9b05b27a1.84549617', '0123@gmail.com', '$2y$10$dw9jRWzo0rzbzGY.L7cvP.lVIiZENkwlrkVjec/bIjxs1HcspKeRm', '2000-01-01', 'Department of Information Technology', '2147483647', 'Female', 'Trece Martires', 'admin'),
(2, 'IMG-649ac9f0ade806.47499790.png', 'Mikaela', '', 'Sevilla', '649ac9f0be2af4.81496302', '123@gmail.com', '$2y$10$AirEahW8gScU.aNEvtLA/.sVCTmZvzfHGTZPS8/TR5bFI73GSJgFG', '2000-01-01', 'Department of Information Technology', '2147483647', 'Female', 'Trece Martires', 'admin'),
(3, 'IMG-649aca1b93f938.38202675.png', 'Aquer', '', 'Bersimo', '649aca1ba48870.04255838', '1234@gmail.com', '$2y$10$8PTzWBrUWv.dRUfOSz2Z7eyihhMWFdGAh/LHr8g0TIlF/F8qlwPuO', '1990-01-01', 'Department of General Education', '2147483647', 'Male', 'Trece Martires', 'admin'),
(4, 'IMG-649aca5b904495.68559382.png', 'Ariel', '', 'Olimpiada', '649aca5ba14313.70709880', '12345@gmail.com', '$2y$10$UB0YVddV8zoHxd/4RB4ZyuP7dX0OXIEYBfQSDyVwIvqm8aUZtmHCS', '2000-01-01', 'Department of Information Technology', '978945640', 'Male', 'Trece Martires', 'admin'),
(5, 'IMG-649aca9082da34.80632764.png', ' Keno', ' ', ' Villavicencio', '649aca90944013.38270636', '123456@gmail.com', '$2y$10$rJ6vSNUxsHbY8BFa4hDCDOvp7tFBNPaW5mjiWrd/wFpHk0UCUJH0S', '0001-01-01', 'Department of Information Technology', '0910100000', 'Male', 'Trece Martires', 'admin'),
(6, 'IMG-649ad17b693187.99643797.png', 'Khenny', '', 'Lewis', '649ad17b7a82c6.35676989', '1234567@gmail.com', '$2y$10$OwyB/IHH64Ta1BcYGRwRxe8exGRWXz38bLJXoiTthJ4o0N7VpaQrC', '2000-01-01', 'Department of Information Technology', '2147483647', 'Female', 'Trece Martires', 'admin'),
(9, 'IMG-649d7003492706.80826334.png', '  Kevin', '          Rosarda', '          Maceda', '649d66ca72ac76.64249977', 'xxx@gmail.com', '$2y$10$77Ndm3nqgzOfvi7M9RaqtOMt3JxRgAmaeOye7tN.nvaTHi0k5XQMa', '2000-02-26', 'Department of Information Technology', '0910100000', 'Male', 'Cabuco, Trece Martires', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `fee`
--

CREATE TABLE `fee` (
  `fee_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `fee_description` varchar(255) NOT NULL,
  `price` double NOT NULL,
  `fee_department` enum('Bachelor of Science in Information Technology','Bachelor of Science in Hospitality Management','Bachelor of Science in Business Management','General Education') NOT NULL,
  `year` varchar(50) NOT NULL,
  `semester` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fee`
--

INSERT INTO `fee` (`fee_id`, `name`, `fee_description`, `price`, `fee_department`, `year`, `semester`) VALUES
(4, 'Tuition Fee', '', 1575, 'Bachelor of Science in Information Technology', 'Third', 'Second'),
(5, 'Library', 'MIscellaneous', 250, 'Bachelor of Science in Information Technology', 'Third', 'Second'),
(6, 'Medical', 'MIscellaneous', 75, 'Bachelor of Science in Information Technology', 'Third', 'Second'),
(7, 'Publication', 'MIscellaneous', 105, 'Bachelor of Science in Information Technology', 'Third', 'Second'),
(8, 'Guidance', 'MIscellaneous', 25, 'Bachelor of Science in Information Technology', 'Third', 'Second'),
(9, 'Registration', 'MIscellaneous', 55, 'Bachelor of Science in Information Technology', 'Third', 'Second'),
(10, 'SRF', '', 5025, 'Bachelor of Science in Information Technology', 'Third', 'Second'),
(11, 'SFDF', '', 1000, 'Bachelor of Science in Information Technology', 'Third', 'Second'),
(12, 'SCUAA', '', 55, 'Bachelor of Science in Information Technology', 'Third', 'Second'),
(13, 'Athletic Fee', '', 55, 'Bachelor of Science in Information Technology', 'Third', 'Second'),
(14, 'NSTP Fee', '', 0, 'Bachelor of Science in Information Technology', 'Third', 'Second'),
(15, 'Deposit', '', 0, 'Bachelor of Science in Information Technology', 'Third', 'Second'),
(16, 'Residency fee', '', 0, 'Bachelor of Science in Information Technology', 'Third', 'Second'),
(17, 'Computer Laboratory', 'Laboratory', 800, 'Bachelor of Science in Information Technology', 'Third', 'Second'),
(18, 'HRM Lab', 'Laboratory', 0, 'Bachelor of Science in Information Technology', 'Third', 'Second'),
(19, 'Science Lab', 'Laboratory', 0, 'Bachelor of Science in Information Technology', 'Third', 'Second'),
(20, 'Tuition Fee', '', 1575, 'Bachelor of Science in Hospitality Management', 'Third', 'Second'),
(21, 'Library', 'MIscellaneous', 250, 'Bachelor of Science in Hospitality Management', 'Third', 'Second'),
(22, 'Medical', 'MIscellaneous', 75, 'Bachelor of Science in Hospitality Management', 'Third', 'Second'),
(23, 'Publication', 'MIscellaneous', 105, 'Bachelor of Science in Hospitality Management', 'Third', 'Second'),
(24, 'Guidance', 'MIscellaneous', 25, 'Bachelor of Science in Hospitality Management', 'Third', 'Second'),
(25, 'Registration', 'MIscellaneous', 55, 'Bachelor of Science in Hospitality Management', 'Third', 'Second'),
(26, 'SRF', '', 5025, 'Bachelor of Science in Hospitality Management', 'Third', 'Second'),
(27, 'SFDF', '', 1000, 'Bachelor of Science in Hospitality Management', 'Third', 'Second'),
(28, 'SCUAA', '', 55, 'Bachelor of Science in Hospitality Management', 'Third', 'Second'),
(29, 'Athletic Fee', '', 55, 'Bachelor of Science in Hospitality Management', 'Third', 'Second'),
(30, 'NSTP Fee', '', 0, 'Bachelor of Science in Hospitality Management', 'Third', 'Second'),
(31, 'Deposit', '', 0, 'Bachelor of Science in Hospitality Management', 'Third', 'Second'),
(32, 'Residency fee', '', 0, 'Bachelor of Science in Hospitality Management', 'Third', 'Second'),
(33, 'Computer Laboratory', 'Laboratory', 0, 'Bachelor of Science in Hospitality Management', 'Third', 'Second'),
(34, 'HRM Lab', 'Laboratory', 800, 'Bachelor of Science in Hospitality Management', 'Third', 'Second'),
(35, 'Science Lab', 'Laboratory', 0, 'Bachelor of Science in Hospitality Management', 'Third', 'Second'),
(36, 'Tuition Fee', '', 1575, 'Bachelor of Science in Business Management', 'Third', 'Second'),
(37, 'Library', 'MIscellaneous', 250, 'Bachelor of Science in Business Management', 'Third', 'Second'),
(38, 'Medical', 'MIscellaneous', 75, 'Bachelor of Science in Business Management', 'Third', 'Second'),
(39, 'Publication', 'MIscellaneous', 105, 'Bachelor of Science in Business Management', 'Third', 'Second'),
(40, 'Guidance', 'MIscellaneous', 25, 'Bachelor of Science in Business Management', 'Third', 'Second'),
(41, 'Registration', 'MIscellaneous', 55, 'Bachelor of Science in Business Management', 'Third', 'Second'),
(42, 'SRF', '', 5025, 'Bachelor of Science in Business Management', 'Third', 'Second'),
(43, 'SFDF', '', 1000, 'Bachelor of Science in Business Management', 'Third', 'Second'),
(44, 'SCUAA', '', 55, 'Bachelor of Science in Business Management', 'Third', 'Second'),
(45, 'Athletic Fee', '', 55, 'Bachelor of Science in Business Management', 'Third', 'Second'),
(46, 'NSTP Fee', '', 0, 'Bachelor of Science in Business Management', 'Third', 'Second'),
(47, 'Deposit', '', 0, 'Bachelor of Science in Business Management', 'Third', 'Second'),
(48, 'Residency fee', '', 0, 'Bachelor of Science in Business Management', 'Third', 'Second'),
(49, 'Computer Laboratory', 'Laboratory', 800, 'Bachelor of Science in Business Management', 'Third', 'Second'),
(50, 'HRM Lab', 'Laboratory', 0, 'Bachelor of Science in Business Management', 'Third', 'Second'),
(51, 'Science Lab', 'Laboratory', 0, 'Bachelor of Science in Business Management', 'Third', 'Second');

-- --------------------------------------------------------

--
-- Table structure for table `grade`
--

CREATE TABLE `grade` (
  `grade_id` int(11) NOT NULL,
  `student_num` varchar(50) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `subject_code` varchar(50) NOT NULL,
  `midterm` double NOT NULL,
  `finals` double NOT NULL,
  `remark` enum('Passed','Failed') NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `faculty_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `grade`
--

INSERT INTO `grade` (`grade_id`, `student_num`, `full_name`, `subject_code`, `midterm`, `finals`, `remark`, `timestamp`, `faculty_id`) VALUES
(8, '2023-100-33', 'Kevin Rosarda Maceda', 'GNED 09', 99, 85.4, 'Passed', '2023-06-26 13:40:44', '6499953822da43.61747528'),
(9, '2023-100-33', 'Kevin Rosarda Maceda', 'ITEC 200A', 60, 65, 'Failed', '2023-06-26 13:56:04', '649995880b4dc4.50948817'),
(10, '2023-100-933', 'Juan X. Dela Cruz', 'ITEC 105', 80.2, 85.4, 'Passed', '2023-06-27 11:58:19', '649ac9b05b27a1.84549617'),
(11, '2023-100-933', 'Juan X. Dela Cruz', 'ITEC 95', 87, 85.4, 'Passed', '2023-06-27 11:58:35', '649ac9b05b27a1.84549617'),
(12, '2023-100-933', 'Juan X. Dela Cruz', 'ITEC 100', 99, 98, 'Passed', '2023-06-27 11:59:06', '649ac9f0be2af4.81496302'),
(13, '2023-100-933', 'Juan X. Dela Cruz', 'GNED 09', 80.2, 79, 'Passed', '2023-06-27 11:59:38', '649aca1ba48870.04255838'),
(14, '2023-100-933', 'Juan X. Dela Cruz', 'ITEC 106', 87, 87, 'Passed', '2023-06-27 12:00:03', '649aca5ba14313.70709880'),
(15, '2023-100-933', 'Juan X. Dela Cruz', 'ITEC 101', 90, 92, 'Passed', '2023-06-27 12:00:25', '649aca90944013.38270636'),
(16, '2023-100-933', 'Juan X. Dela Cruz', 'ITEC 200A', 85, 85, 'Passed', '2023-06-27 12:10:59', '649ad17b7a82c6.35676989'),
(17, '2023-100-182', 'Mark Kevin Rosarda Maceda', 'GNED 09', 99, 95, 'Passed', '2023-06-29 09:49:12', '649d53542e57f6.76037862'),
(18, '2023-100-635', 'kaps wow kapitan', 'GNED 09', 80.2, 65, 'Failed', '2023-06-29 09:56:30', '649d5487dde488.07944717'),
(19, '2023-100-635', 'kaps wow kapitan', 'GNED 09', 0, 90, 'Failed', '2023-06-29 10:27:55', '649d5487dde488.07944717'),
(20, '2023-100-182', 'Kevin Rosarda Maceda', 'BGMT 200A', 80.2, 87, 'Passed', '2023-06-29 11:49:33', '649d66ca72ac76.64249977');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(255) NOT NULL,
  `accountID` varchar(255) NOT NULL,
  `img_url` varchar(255) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `middlename` varchar(100) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('user','admin') NOT NULL,
  `address` varchar(255) NOT NULL,
  `cnum` varchar(11) NOT NULL,
  `bdate` date NOT NULL,
  `course` enum('Bachelor of Science in Information Technology','Bachelor of Science in Hospitality Management','Bachelor of Science in Business Management','General Education') NOT NULL,
  `year` varchar(255) NOT NULL,
  `semester` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `pay_status` varchar(11) NOT NULL,
  `acadyear` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `accountID`, `img_url`, `lname`, `middlename`, `fname`, `email`, `password`, `role`, `address`, `cnum`, `bdate`, `course`, `year`, `semester`, `gender`, `category`, `pay_status`, `acadyear`) VALUES
(1, '2023-100-182', 'IMG-649d6b63775107.28837763.jpg', 'Maceda', 'Rosarda', ' Mark Kevin', 'macedamarkkevin@gmail.com', '$2y$10$mfm2EwUjmBlY5V5POqzqH.FqOJjr7uCZPgt15R2rdO8vtHC3Kf4sm', 'user', 'Trece Martires', '09675160433', '1994-03-04', 'Bachelor of Science in Information Technology', 'Third', 'Second', 'Male', 'Regular', '', '2023-2024'),
(2, '2023-100-933', 'IMG-649af67395b856.46284474.png', 'Dela Cruz', 'X.', 'Juan', 'juantamad@gmail.com', '$2y$10$.Be9Kb7VKXIfBG9q1g/C1eGfi7R/7PQ9uqjpRl51ptpD3zzjR1UOi', 'user', 'Trece Martires', '09101000000', '2000-01-02', 'Bachelor of Science in Information Technology', 'Third', 'Second', 'Male', 'Regular', '', '2023-2024');

-- --------------------------------------------------------

--
-- Table structure for table `student_courses`
--

CREATE TABLE `student_courses` (
  `id` int(11) NOT NULL,
  `student_id` varchar(55) NOT NULL,
  `course` varchar(255) NOT NULL,
  `subject_code` varchar(55) NOT NULL,
  `subject_name` varchar(55) NOT NULL,
  `lecture` varchar(55) NOT NULL,
  `lab` varchar(55) NOT NULL,
  `subject_year` varchar(55) NOT NULL,
  `subject_semester` varchar(55) NOT NULL,
  `enrollment_date` datetime DEFAULT current_timestamp(),
  `action` enum('added','dropped','update') NOT NULL,
  `grade` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_courses`
--

INSERT INTO `student_courses` (`id`, `student_id`, `course`, `subject_code`, `subject_name`, `lecture`, `lab`, `subject_year`, `subject_semester`, `enrollment_date`, `action`, `grade`) VALUES
(39, '2023-100-14', 'Bachelor of Science in Information Technology', 'DCIT 25', 'Data Structures And Algorithms', '2', '1', 'Second', 'Second', '2023-06-29 20:07:21', 'added', 0),
(40, '2023-100-14', 'Bachelor of Science in Information Technology', 'DCIT 55', 'Advance Database System', '2', '1', 'Second', 'Second', '2023-06-29 20:07:22', 'added', 0),
(41, '2023-100-14', 'Bachelor of Science in Information Technology', 'FITT 4', 'Physical Activities Towards  Health and Fitness 4', '2', '0', 'Second', 'Second', '2023-06-29 20:07:22', 'added', 0),
(42, '2023-100-14', 'Bachelor of Science in Information Technology', 'GNED 08', 'Understanding the Self', '3', '0', 'Second', 'Second', '2023-06-29 20:07:22', 'added', 0),
(43, '2023-100-14', 'Bachelor of Science in Information Technology', 'ITEC 60', 'Integrated Programming and Technologies 1', '3', '0', 'Second', 'Second', '2023-06-29 20:07:22', 'added', 0),
(44, '2023-100-14', 'Bachelor of Science in Information Technology', 'ITEC 65', 'Open Source Technology', '3', '0', 'Second', 'Second', '2023-06-29 20:07:22', 'added', 0),
(45, '2023-100-14', 'Bachelor of Science in Information Technology', 'ITEC 70', 'Multimedia Systems', '2', '1', 'Second', 'Second', '2023-06-29 20:07:22', 'added', 0),
(46, '2023-100-14', 'Bachelor of Science in Information Technology', 'NSTP 2', '(CWTS, LTS, ROTC )', '3', '0', 'Second', 'Second', '2023-06-29 20:07:22', 'added', 0),
(47, '2023-100-938', 'Bachelor of Science in Information Technology', 'DCIT 25', 'Data Structures And Algorithms', '2', '1', 'Second', 'Second', '2023-06-29 20:08:59', 'added', 0),
(48, '2023-100-938', 'Bachelor of Science in Information Technology', 'DCIT 55', 'Advance Database System', '2', '1', 'Second', 'Second', '2023-06-29 20:08:59', 'added', 0),
(49, '2023-100-938', 'Bachelor of Science in Information Technology', 'FITT 4', 'Physical Activities Towards  Health and Fitness 4', '2', '0', 'Second', 'Second', '2023-06-29 20:08:59', 'added', 0),
(50, '2023-100-938', 'Bachelor of Science in Information Technology', 'GNED 08', 'Understanding the Self', '3', '0', 'Second', 'Second', '2023-06-29 20:08:59', 'added', 0),
(51, '2023-100-938', 'Bachelor of Science in Information Technology', 'ITEC 60', 'Integrated Programming and Technologies 1', '3', '0', 'Second', 'Second', '2023-06-29 20:08:59', 'added', 0),
(52, '2023-100-938', 'Bachelor of Science in Information Technology', 'ITEC 65', 'Open Source Technology', '3', '0', 'Second', 'Second', '2023-06-29 20:08:59', 'added', 0),
(53, '2023-100-938', 'Bachelor of Science in Information Technology', 'ITEC 70', 'Multimedia Systems', '2', '1', 'Second', 'Second', '2023-06-29 20:08:59', 'added', 0),
(54, '2023-100-938', 'Bachelor of Science in Information Technology', 'NSTP 2', '(CWTS, LTS, ROTC )', '3', '0', 'Second', 'Second', '2023-06-29 20:08:59', 'added', 0),
(55, '2023-100-938', 'Bachelor of Science in Information Technology', 'BGMT 200A', 'Research / EDP Proposal', '3', '0', 'Second', 'Second', '2023-06-29 20:14:34', 'dropped', 0),
(56, '2023-100-933', 'Bachelor of Science in Information Technology', 'GNED 09', 'Life and Works of Rizal', '3', '0', 'Third', 'Second', '2023-06-30 18:35:02', 'added', 0),
(57, '2023-100-933', 'Bachelor of Science in Information Technology', 'ITEC 100', 'Information Assurance And Security 2', '2', '1', 'Third', 'Second', '2023-06-30 18:35:02', 'added', 0),
(58, '2023-100-933', 'Bachelor of Science in Information Technology', 'ITEC 105', 'Network Management', '2', '1', 'Third', 'Second', '2023-06-30 18:35:03', 'added', 0),
(59, '2023-100-933', 'Bachelor of Science in Information Technology', 'ITEC 101', 'Human Computer Interaction 2', '3', '0', 'Third', 'Second', '2023-06-30 18:35:03', 'added', 0),
(60, '2023-100-933', 'Bachelor of Science in Information Technology', 'ITEC 106', 'Web Systems and Technologies 2', '2', '1', 'Third', 'Second', '2023-06-30 18:35:03', 'added', 0),
(61, '2023-100-933', 'Bachelor of Science in Information Technology', 'ITEC 200A', 'Capstone Project and Research 1', '3', '0', 'Third', 'Second', '2023-06-30 18:35:03', 'added', 0),
(62, '2023-100-933', 'Bachelor of Science in Information Technology', 'ITEC 95', 'Quantitative Methods', '3', '0', 'Third', 'Second', '2023-06-30 18:35:03', 'added', 0),
(63, '2023-100-182', 'Bachelor of Science in Information Technology', 'GNED 09', 'Life and Works of Rizal', '3', '0', 'Third', 'Second', '2023-06-30 18:43:42', 'added', 0),
(64, '2023-100-182', 'Bachelor of Science in Information Technology', 'ITEC 100', 'Information Assurance And Security 2', '2', '1', 'Third', 'Second', '2023-06-30 18:43:42', 'added', 0),
(65, '2023-100-182', 'Bachelor of Science in Information Technology', 'ITEC 105', 'Network Management', '2', '1', 'Third', 'Second', '2023-06-30 18:43:42', 'added', 0),
(66, '2023-100-182', 'Bachelor of Science in Information Technology', 'ITEC 101', 'Human Computer Interaction 2', '3', '0', 'Third', 'Second', '2023-06-30 18:43:42', 'added', 0),
(67, '2023-100-182', 'Bachelor of Science in Information Technology', 'ITEC 106', 'Web Systems and Technologies 2', '2', '1', 'Third', 'Second', '2023-06-30 18:43:42', 'added', 0),
(68, '2023-100-182', 'Bachelor of Science in Information Technology', 'ITEC 200A', 'Capstone Project and Research 1', '3', '0', 'Third', 'Second', '2023-06-30 18:43:42', 'added', 0),
(69, '2023-100-182', 'Bachelor of Science in Information Technology', 'ITEC 95', 'Quantitative Methods', '3', '0', 'Third', 'Second', '2023-06-30 18:43:42', 'added', 0);

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `subject_id` int(11) NOT NULL,
  `subject_code` varchar(50) NOT NULL,
  `subject_name` varchar(255) NOT NULL,
  `subject_description` varchar(255) NOT NULL,
  `subject_department` enum('Bachelor of Science in Information Technology','Bachelor of Science in Hospitality Management','Bachelor of Science in Business Management','General Education') NOT NULL,
  `subject_year` varchar(255) NOT NULL,
  `subject_semester` varchar(255) NOT NULL,
  `lecture` int(11) NOT NULL,
  `lab` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subject_id`, `subject_code`, `subject_name`, `subject_description`, `subject_department`, `subject_year`, `subject_semester`, `lecture`, `lab`) VALUES
(1, 'GNED 03', 'Mathematics in the Modern World', '', 'Bachelor of Science in Business Management', 'First', 'First', 3, 0),
(2, 'GNED 04', 'Mga Babasahin Hinggil sa Kasaysayan ng Pilipinas', '', 'Bachelor of Science in Business Management', 'First', 'First', 3, 0),
(3, 'GNED 05', 'Purposive Communication', '', 'Bachelor of Science in Business Management', 'First', 'First', 3, 0),
(4, 'GNED 07', 'The Contemporary World', '', 'Bachelor of Science in Business Management', 'First', 'First', 3, 0),
(5, 'GNED 11', 'Kontekstwalisadong Komunikasyon sa Filipino', '', 'Bachelor of Science in Business Management', 'First', 'First', 3, 0),
(6, 'BGMT 21', 'Basic MicroEconomics', '', 'Bachelor of Science in Business Management', 'First', 'First', 3, 0),
(7, 'FITT 1', 'Movement Enhancement', '', 'Bachelor of Science in Business Management', 'First', 'First', 2, 0),
(8, 'NSTP 1 ', '(CWTS, LTS, ROTC )', '', 'Bachelor of Science in Business Management', 'First', 'First', 3, 0),
(9, 'CvSU101', 'Institutional Orientation', '', 'Bachelor of Science in Business Management', 'First', 'First', 1, 0),
(10, 'GNED 01', 'Arts Appreciation', '', 'Bachelor of Science in Business Management', 'First', 'Second', 3, 0),
(11, 'GNED 02', 'Ethics', '', 'Bachelor of Science in Business Management', 'First', 'Second', 3, 0),
(12, 'GNED 08', 'Understanding the Self', '', 'Bachelor of Science in Business Management', 'First', 'Second', 3, 0),
(13, 'BGMT 22', 'Quantitative Techniques in Business', '', 'Bachelor of Science in Business Management', 'First', 'Second', 3, 0),
(14, 'BGMT 23', 'Human Resource Management', '', 'Bachelor of Science in Business Management', 'First', 'Second', 3, 0),
(15, 'BGMT 24', 'Business Law', 'Obligations and Contract', 'Bachelor of Science in Business Management', 'Second', 'Second', 3, 0),
(16, 'FITT 2', 'Fitness Exercises', '', 'Bachelor of Science in Business Management', 'First', 'Second', 2, 0),
(17, 'NSTP 2', '(CWTS, LTS, ROTC )', '', 'Bachelor of Science in Business Management', 'First', 'Second', 3, 0),
(18, 'GNED 06', 'Science, Technology and Society', '', 'Bachelor of Science in Business Management', 'Second', 'First', 3, 0),
(19, 'GNED 10', 'Gender and Society', '', 'Bachelor of Science in Business Management', 'Second', 'First', 3, 0),
(20, 'GNED 12', 'Dalumat ng / Sa Filipino', '', 'Bachelor of Science in Business Management', 'Second', 'First', 3, 0),
(21, 'BGMT 25', 'Operations Management', '', 'Bachelor of Science in Business Management', 'Second', 'First', 3, 0),
(22, 'BGMT 26', 'International Trade and Agreements', '', 'Bachelor of Science in Business Management', 'Second', 'First', 3, 0),
(23, 'MKTG 50', 'Consumer Behavior', '', 'Bachelor of Science in Business Management', 'Second', 'First', 3, 0),
(24, 'MKTG 55', 'Market Research', '', 'Bachelor of Science in Business Management', 'Second', 'First', 3, 0),
(25, 'FITT 3', 'Physical Activities Towards  Health and Fitness 1', '', 'Bachelor of Science in Business Management', 'Second', 'First', 2, 0),
(26, 'GNED 14', 'Panitikang Panlipunan', '', 'Bachelor of Science in Business Management', 'Second', 'Second', 3, 0),
(27, 'BGMT 27', 'Good Governance and Social Responsibility', '', 'Bachelor of Science in Business Management', 'Second', 'Second', 3, 0),
(28, 'BGMT 28', 'Taxation', 'Income and Review', 'Bachelor of Science in Business Management', 'Second', 'Second', 3, 0),
(29, 'MKTG 60', 'Product Management', '', 'Bachelor of Science in Business Management', 'Second', 'Second', 3, 0),
(30, 'MKTG 65', 'Retail Management', '', 'Bachelor of Science in Business Management', 'Second', 'Second', 3, 0),
(31, 'MKTG 70', 'Advertising', '', 'Bachelor of Science in Business Management', 'Second', 'Second', 3, 0),
(32, 'FITT 4', 'Physical Activities Towards  Health and Fitness 2', '', 'Bachelor of Science in Business Management', 'Second', 'Second', 2, 0),
(33, 'GNED 09', 'Life and Works of Rizal', '', 'Bachelor of Science in Business Management', 'Third', 'First', 3, 0),
(34, 'BGMT 29', 'Business Research', '', 'Bachelor of Science in Business Management', 'Third', 'First', 3, 0),
(35, 'MKTG 75', 'Professional Salemanship', '', 'Bachelor of Science in Business Management', 'Third', 'First', 3, 0),
(36, 'MKTG 80', 'Marketing Management', '', 'Bachelor of Science in Business Management', 'Third', 'First', 3, 0),
(37, 'MKTG 85', 'Special Topics in Marketing and Management', '', 'Bachelor of Science in Business Management', 'Third', 'First', 3, 0),
(38, 'MKTG 126', 'Industrial / Agricultural  Marketing', '', 'Bachelor of Science in Business Management', 'Third', 'First', 3, 0),
(39, 'BGMT 30', 'Strategic  Management', '', 'Bachelor of Science in Business Management', 'Third', 'Second', 3, 0),
(40, 'BGMT 200A', 'Research / EDP Proposal', '', 'Bachelor of Science in Business Management', 'Third', 'Second', 1, 0),
(41, 'MKTG 106', 'International Marketing', '', 'Bachelor of Science in Business Management', 'Third', 'Second', 3, 0),
(42, 'MKTG 111', 'E-Commerce and Internet Marketing', '', 'Bachelor of Science in Business Management', 'Third', 'Second', 3, 0),
(43, 'MKTG 101', 'Distribution Management', '', 'Bachelor of Science in Business Management', 'Third', 'Second', 3, 0),
(44, 'BGMT 200B', 'Research / EDP Final Manuscript', '', 'Bachelor of Science in Business Management', 'Fourth', 'First', 2, 0),
(45, 'BGMT 199', 'Practicum Integrated Learning 2', '600 hours', 'Bachelor of Science in Business Management', 'Fourth', 'Second', 6, 0),
(46, 'GNED 09', 'Life and Works of Rizal', '', 'Bachelor of Science in Information Technology', 'Third', 'Second', 3, 0),
(47, 'ITEC 100', 'Information Assurance And Security 2', '', 'Bachelor of Science in Information Technology', 'Third', 'Second', 2, 1),
(48, 'ITEC 105', 'Network Management', '', 'Bachelor of Science in Information Technology', 'Third', 'Second', 2, 1),
(49, 'ITEC 101', 'Human Computer Interaction 2', 'IT Elective 1', 'Bachelor of Science in Information Technology', 'Third', 'Second', 3, 0),
(50, 'ITEC 106', 'Web Systems and Technologies 2', 'IT Elective 2', 'Bachelor of Science in Information Technology', 'Third', 'Second', 2, 1),
(51, 'ITEC 200A', 'Capstone Project and Research 1', '', 'Bachelor of Science in Information Technology', 'Third', 'Second', 3, 0),
(52, 'ITEC 95', 'Quantitative Methods', '(Modeling & Simulation', 'Bachelor of Science in Information Technology', 'Third', 'Second', 3, 0),
(53, 'ITEC 75', 'System Integration and Architecture 1', '', 'Bachelor of Science in Information Technology', 'MidYear', 'MidYear', 2, 1),
(54, 'STAT 2', 'Applied Statistics', '', 'Bachelor of Science in Information Technology', 'MidYear', 'MidYear', 3, 0),
(55, 'DCIT 26', 'Application Development and Emerging Technologies', '', 'Bachelor of Science in Information Technology', 'Third', 'First', 2, 1),
(56, 'DCIT 60', 'Methods of Research', '', 'Bachelor of Science in Information Technology', 'Third', 'First', 3, 0),
(57, 'INSY 55', 'System Analysis and Design', '', 'Bachelor of Science in Information Technology', 'Third', 'First', 2, 1),
(58, 'ITEC 80', 'Introduction to Human Computer Interaction 1', '', 'Bachelor of Science in Information Technology', 'Third', 'First', 3, 0),
(59, 'ITEC 85', 'Information Assurance And Security 1', '', 'Bachelor of Science in Information Technology', 'Third', 'First', 3, 0),
(60, 'ITEC 80', 'Network Fundamentals', '', 'Bachelor of Science in Information Technology', 'Third', 'First', 2, 1),
(61, 'DCIT 25', 'Data Structures And Algorithms', '', 'Bachelor of Science in Information Technology', 'Second', 'Second', 2, 1),
(62, 'DCIT 55', 'Advance Database System', '', 'Bachelor of Science in Information Technology', 'Second', 'Second', 2, 1),
(63, 'FITT 4', 'Physical Activities Towards  Health and Fitness 4', '', 'Bachelor of Science in Information Technology', 'Second', 'Second', 2, 0),
(64, 'GNED 08', 'Understanding the Self', '', 'Bachelor of Science in Information Technology', 'Second', 'Second', 3, 0),
(65, 'ITEC 60', 'Integrated Programming and Technologies 1', '', 'Bachelor of Science in Information Technology', 'Second', 'Second', 3, 0),
(66, 'ITEC 65', 'Open Source Technology', '', 'Bachelor of Science in Information Technology', 'Second', 'Second', 3, 0),
(67, 'ITEC 70', 'Multimedia Systems', '', 'Bachelor of Science in Information Technology', 'Second', 'Second', 2, 1),
(68, 'NSTP 2', '(CWTS, LTS, ROTC )', '', 'Bachelor of Science in Information Technology', 'Second', 'Second', 3, 0),
(69, 'DCIT 24', 'Information Management', '', 'Bachelor of Science in Information Technology', 'Second', 'First', 3, 0),
(70, 'DCIT 50', 'Object Oriented Programming', '', 'Bachelor of Science in Information Technology', 'Second', 'First', 2, 1),
(71, 'FITT 3', 'Physical Activities Towards  Health and Fitness 3', '', 'Bachelor of Science in Information Technology', 'Second', 'First', 2, 0),
(72, 'GNED 04', 'Mga Babasahin Hinggil sa Kasaysayan ng Pilipinas', '', 'Bachelor of Science in Information Technology', 'Second', 'First', 3, 0),
(73, 'GNED 07', 'The Contemporary World', '', 'Bachelor of Science in Information Technology', 'Second', 'First', 3, 0),
(74, 'GNED 10', 'Gender and Society', '', 'Bachelor of Science in Information Technology', 'Second', 'First', 3, 0),
(75, 'GNED 14', 'Panitikang Panlipunan', '', 'Bachelor of Science in Information Technology', 'Second', 'First', 3, 0),
(76, 'ITEC 55', 'Platform Technologies', '', 'Bachelor of Science in Information Technology', 'Second', 'First', 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblschedule`
--

CREATE TABLE `tblschedule` (
  `schedID` int(11) NOT NULL,
  `subject_code` varchar(11) NOT NULL,
  `accountID` varchar(100) NOT NULL,
  `facultyname` varchar(100) NOT NULL,
  `schedFrom` varchar(30) NOT NULL,
  `schedTo` varchar(30) NOT NULL,
  `schedDay` varchar(100) NOT NULL,
  `course` varchar(100) NOT NULL,
  `cnum` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblschedule`
--

INSERT INTO `tblschedule` (`schedID`, `subject_code`, `accountID`, `facultyname`, `schedFrom`, `schedTo`, `schedDay`, `course`, `cnum`) VALUES
(7, 'ITEC 95', '649ac9b05b27a1.84549617', 'Marjorie  Barabat', '8AM', '10', 'TUESDAY', 'Bachelor of Science in Information Technology', '2147483647'),
(8, 'ITEC 105', '649ac9b05b27a1.84549617', 'Marjorie  Barabat', '9AM', '12NN', 'Friday', 'Bachelor of Science in Information Technology', '2147483647'),
(9, 'ITEC 100', '649ac9f0be2af4.81496302', 'Mikaela  Sevilla', '2PM', '4PM', 'Friday', 'Bachelor of Science in Information Technology', '2147483647'),
(10, 'ITEC 106', '649aca5ba14313.70709880', 'Ariel  Olimpiada', '1PM', '4PM', 'Saturday', 'Bachelor of Science in Information Technology', '2147483647'),
(11, 'GNED 09', '649aca1ba48870.04255838', 'Aquer  Bersimo', '7AM', '8AM', 'Tuesday', 'Bachelor of Science in Information Technology', '2147483647'),
(13, 'ITEC 200A', '649ad17b7a82c6.35676989', 'Khenny  Lewis', '7AM', '12NN', 'M-W-F', 'Bachelor of Science in Information Technology', '2147483647'),
(18, 'ITEC 101', '649aca90944013.38270636', 'Keno  Villavicencio', 'Tuesday', '2PM', '4PM', 'Bachelor of Science in Information Technology', '0910100000');

-- --------------------------------------------------------

--
-- Table structure for table `useraccounts`
--

CREATE TABLE `useraccounts` (
  `id` int(11) NOT NULL,
  `admin_ID` varchar(50) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('Registrar','Administrator') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `useraccounts`
--

INSERT INTO `useraccounts` (`id`, `admin_ID`, `full_name`, `username`, `password`, `role`) VALUES
(1, 'ADMIN-100-823', 'Juan X. Dela Cruz', 'admin', '$2y$10$J900rxcEEMYiWeJazN5GNuN9tpBsopNHdbK63RDaUrqHw.zTmMJw2', 'Registrar');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`dept_id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`faculty_id`);

--
-- Indexes for table `fee`
--
ALTER TABLE `fee`
  ADD PRIMARY KEY (`fee_id`);

--
-- Indexes for table `grade`
--
ALTER TABLE `grade`
  ADD PRIMARY KEY (`grade_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_courses`
--
ALTER TABLE `student_courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`subject_id`);

--
-- Indexes for table `tblschedule`
--
ALTER TABLE `tblschedule`
  ADD PRIMARY KEY (`schedID`);

--
-- Indexes for table `useraccounts`
--
ALTER TABLE `useraccounts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `dept_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `faculty_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `fee`
--
ALTER TABLE `fee`
  MODIFY `fee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `grade`
--
ALTER TABLE `grade`
  MODIFY `grade_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `student_courses`
--
ALTER TABLE `student_courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `tblschedule`
--
ALTER TABLE `tblschedule`
  MODIFY `schedID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `useraccounts`
--
ALTER TABLE `useraccounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
