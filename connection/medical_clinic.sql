-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 01, 2023 at 04:55 AM
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
-- Database: `medical_clinic`
--

-- --------------------------------------------------------

--
-- Table structure for table `active`
--

CREATE TABLE `active` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `ticket` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `department` varchar(50) NOT NULL,
  `doctor` varchar(50) NOT NULL,
  `clinic_loc` varchar(50) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `date` varchar(50) NOT NULL,
  `time` varchar(50) NOT NULL,
  `message` longtext NOT NULL,
  `province` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `barangay` varchar(50) NOT NULL,
  `age` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `doctor_contact` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `level` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `doctor` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `user_name`, `level`, `password`, `name`, `doctor`) VALUES
(15, 'admin', 'Owner', '4297f44b13955235245b2497399d7a93', 'Tira', ''),
(24, 'demo', 'Admin', '4297f44b13955235245b2497399d7a93', 'ggg', ''),
(25, 'gg', 'Secretary', '4297f44b13955235245b2497399d7a93', 'awdaw', ''),
(26, 'Tira', 'Doctor', '4297f44b13955235245b2497399d7a93', '', 'Dr. Dahryll Tira'),
(27, 'peter', 'Doctor', '4297f44b13955235245b2497399d7a93', '', 'Dr. Peter Parker');

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `ticket` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `department` varchar(50) NOT NULL,
  `doctor` varchar(50) NOT NULL,
  `clinic_loc` varchar(50) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `date` varchar(50) NOT NULL,
  `time` varchar(50) NOT NULL,
  `message` longtext NOT NULL,
  `province` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `barangay` varchar(50) NOT NULL,
  `age` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `doctor_contact` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `archive`
--

CREATE TABLE `archive` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `ticket` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `department` varchar(50) NOT NULL,
  `doctor` varchar(50) NOT NULL,
  `clinic_loc` varchar(50) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `date` varchar(50) NOT NULL,
  `time` varchar(50) NOT NULL,
  `message` longtext NOT NULL,
  `province` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `barangay` varchar(50) NOT NULL,
  `age` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `doctor_contact` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contact1`
--

CREATE TABLE `contact1` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `message` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact1`
--

INSERT INTO `contact1` (`id`, `name`, `email`, `subject`, `message`) VALUES
(1, 'John Merwin Cielo', 'cielomerwin@gmail.com', 'awdaw', 'wadawdawd'),
(2, 'John Merwin Cielo', 'cielomerwin@gmail.com', 'Appointment issues', 'hi'),
(3, 'John Merwin Cielo', 'cielomerwin@gmail.com', 'awdaw', 'awdaw');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `id` int(11) NOT NULL,
  `doctor_name` varchar(50) NOT NULL,
  `doctor_specialization` varchar(50) NOT NULL,
  `doctor_location` varchar(50) NOT NULL,
  `doctor_phone` varchar(50) NOT NULL,
  `doctor_gender` varchar(50) NOT NULL,
  `doctor_email` varchar(50) NOT NULL,
  `profile` varchar(255) NOT NULL,
  `info` longtext NOT NULL,
  `logo` varchar(255) NOT NULL,
  `doctor_license` varchar(50) NOT NULL,
  `E_signature` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`id`, `doctor_name`, `doctor_specialization`, `doctor_location`, `doctor_phone`, `doctor_gender`, `doctor_email`, `profile`, `info`, `logo`, `doctor_license`, `E_signature`) VALUES
(46, 'Dr. Dahryll Tira', 'Pediatrics', 'Pila, Laguna', '+639455602169', 'Male', 'cielomerwin@gmail.com', 'gmale.png', 'hrhrhrhrh', 'background.jpg', '123123', 'gg.png'),
(47, 'Dr. Peter Parker', 'Pediatrics', 'awdaw', '+639455602169', 'Male', 'cielomerwin@gmail.com', 'gfemale.png', 'awdawdaw', 'background.jpg', '12312312', 'gg.png');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `ticket` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `department` varchar(50) NOT NULL,
  `doctor` varchar(50) NOT NULL,
  `clinic_loc` varchar(50) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `date` varchar(50) NOT NULL,
  `time` varchar(50) NOT NULL,
  `message` longtext NOT NULL,
  `province` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `barangay` varchar(50) NOT NULL,
  `age` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `doctor_contact` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`id`, `name`, `ticket`, `gender`, `phone`, `email`, `department`, `doctor`, `clinic_loc`, `contact`, `date`, `time`, `message`, `province`, `city`, `barangay`, `age`, `status`, `doctor_contact`) VALUES
(46, 'justine cielo gg', '81832', 'Male', '+639271789423', 'glassmer54@gmail.com', 'Pediatrics', 'Dr. Dahryll Tira', 'Pila, Laguna', '+639455602169', '03/25/2023', '02:00pm to 03:00pm', 'adadaw', 'LAGUNA', 'PILA', 'San Antonio', 22, 0, '+639455602169'),
(47, 'justine cielo gg', '32798', 'Male', '+639271789423', 'glassmer54@gmail.com', 'Pediatrics', 'Dr. Peter Parker', 'awdaw', '+639455602169', '03/26/2023', '02:00pm to 03:00pm', 'awdawdawd', 'LAGUNA', 'PILA', 'San Antonio', 22, 0, '+639455602169'),
(48, 'justine cielo gg', '46937', 'Male', '+639271789423', 'glassmer54@gmail.com', 'Pediatrics', 'Dr. Dahryll Tira', 'Pila, Laguna', '+639455602169', '03/20/2023', '02:00pm to 03:00pm', 'awdawda', 'LAGUNA', 'PILA', 'San Antonio', 22, 0, '+639455602169');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `level` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `logintime` datetime NOT NULL DEFAULT current_timestamp(),
  `doctor` varchar(50) NOT NULL,
  `logouttime` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `user_name`, `level`, `password`, `name`, `logintime`, `doctor`, `logouttime`) VALUES
(86, 'admin', 'Owner', '4297f44b13955235245b2497399d7a93', 'Tira', '2023-02-17 20:34:17', '', '2023-03-01 11:49:44'),
(87, 'gg', 'Secretary', '4297f44b13955235245b2497399d7a93', 'awdaw', '2023-02-17 20:48:02', '', '2023-03-01 11:54:14'),
(88, 'admin', 'Owner', '4297f44b13955235245b2497399d7a93', 'Tira', '2023-02-17 20:48:48', '', '2023-03-01 11:49:44'),
(89, 'Tira', 'Doctor', '4297f44b13955235245b2497399d7a93', '', '2023-02-17 20:49:13', 'Dr. Dahryll Tira', '2023-03-01 11:53:21'),
(90, 'admin', 'Owner', '4297f44b13955235245b2497399d7a93', 'Tira', '2023-02-17 20:49:43', '', '2023-03-01 11:49:44'),
(91, 'Tira', 'Doctor', '4297f44b13955235245b2497399d7a93', '', '2023-02-17 20:51:53', 'Dr. Dahryll Tira', '2023-03-01 11:53:21'),
(92, 'admin', 'Owner', '4297f44b13955235245b2497399d7a93', 'Tira', '2023-02-17 20:53:07', '', '2023-03-01 11:49:44'),
(93, 'peter', 'Doctor', '4297f44b13955235245b2497399d7a93', '', '2023-02-17 20:53:26', 'Dr. Peter Parker', '2023-02-22 20:57:17'),
(94, 'peter', 'Doctor', '4297f44b13955235245b2497399d7a93', '', '2023-02-17 20:53:45', 'Dr. Peter Parker', '2023-02-22 20:57:17'),
(95, 'gg', 'Secretary', '4297f44b13955235245b2497399d7a93', 'awdaw', '2023-02-17 20:57:36', '', '2023-03-01 11:54:14'),
(96, 'admin', 'Owner', '4297f44b13955235245b2497399d7a93', 'Tira', '2023-02-17 20:58:20', '', '2023-03-01 11:49:44'),
(97, 'Tira', 'Doctor', '4297f44b13955235245b2497399d7a93', '', '2023-02-17 21:03:36', 'Dr. Dahryll Tira', '2023-03-01 11:53:21'),
(98, 'admin', 'Owner', '4297f44b13955235245b2497399d7a93', 'Tira', '2023-02-17 21:04:22', '', '2023-03-01 11:49:44'),
(99, 'gg', 'Secretary', '4297f44b13955235245b2497399d7a93', 'awdaw', '2023-02-17 21:06:30', '', '2023-03-01 11:54:14'),
(100, 'Tira', 'Doctor', '4297f44b13955235245b2497399d7a93', '', '2023-02-17 21:08:49', 'Dr. Dahryll Tira', '2023-03-01 11:53:21'),
(101, 'admin', 'Owner', '4297f44b13955235245b2497399d7a93', 'Tira', '2023-02-17 21:10:10', '', '2023-03-01 11:49:44'),
(102, 'Tira', 'Doctor', '4297f44b13955235245b2497399d7a93', '', '2023-02-17 21:18:38', 'Dr. Dahryll Tira', '2023-03-01 11:53:21'),
(103, 'gg', 'Secretary', '4297f44b13955235245b2497399d7a93', 'awdaw', '2023-02-17 21:19:16', '', '2023-03-01 11:54:14'),
(104, 'admin', 'Owner', '4297f44b13955235245b2497399d7a93', 'Tira', '2023-02-17 21:19:36', '', '2023-03-01 11:49:44'),
(105, 'admin', 'Owner', '4297f44b13955235245b2497399d7a93', 'Tira', '2023-02-17 21:42:07', '', '2023-03-01 11:49:44'),
(106, 'admin', 'Owner', '4297f44b13955235245b2497399d7a93', 'Tira', '2023-02-22 20:39:24', '', '2023-03-01 11:49:44'),
(107, 'admin', 'Owner', '4297f44b13955235245b2497399d7a93', 'Tira', '2023-02-22 20:50:34', '', '2023-03-01 11:49:44'),
(108, 'peter', 'Doctor', '4297f44b13955235245b2497399d7a93', '', '2023-02-22 20:52:39', 'Dr. Peter Parker', '2023-02-22 20:57:17'),
(109, 'admin', 'Owner', '4297f44b13955235245b2497399d7a93', 'Tira', '2023-02-22 20:57:20', '', '2023-03-01 11:49:44'),
(110, 'gg', 'Secretary', '4297f44b13955235245b2497399d7a93', 'awdaw', '2023-02-22 21:05:29', '', '2023-03-01 11:54:14'),
(111, 'peter', 'Doctor', '4297f44b13955235245b2497399d7a93', '', '2023-02-22 21:08:19', 'Dr. Peter Parker', ''),
(112, 'admin', 'Owner', '4297f44b13955235245b2497399d7a93', 'Tira', '2023-03-01 09:23:12', '', '2023-03-01 11:49:44'),
(113, 'Tira', 'Doctor', '4297f44b13955235245b2497399d7a93', '', '2023-03-01 10:37:23', 'Dr. Dahryll Tira', '2023-03-01 11:53:21'),
(114, 'admin', 'Owner', '4297f44b13955235245b2497399d7a93', 'Tira', '2023-03-01 10:37:47', '', '2023-03-01 11:49:44'),
(115, 'Tira', 'Doctor', '4297f44b13955235245b2497399d7a93', '', '2023-03-01 10:38:57', 'Dr. Dahryll Tira', '2023-03-01 11:53:21'),
(116, 'Tira', 'Doctor', '4297f44b13955235245b2497399d7a93', '', '2023-03-01 11:10:00', 'Dr. Dahryll Tira', '2023-03-01 11:53:21'),
(117, 'Tira', 'Doctor', '4297f44b13955235245b2497399d7a93', '', '2023-03-01 11:11:26', 'Dr. Dahryll Tira', '2023-03-01 11:53:21'),
(118, 'admin', 'Owner', '4297f44b13955235245b2497399d7a93', 'Tira', '2023-03-01 11:11:32', '', '2023-03-01 11:49:44'),
(119, 'Tira', 'Doctor', '4297f44b13955235245b2497399d7a93', '', '2023-03-01 11:11:38', 'Dr. Dahryll Tira', '2023-03-01 11:53:21'),
(120, 'gg', 'Secretary', '4297f44b13955235245b2497399d7a93', 'awdaw', '2023-03-01 11:11:51', '', '2023-03-01 11:54:14'),
(121, 'admin', 'Owner', '4297f44b13955235245b2497399d7a93', 'Tira', '2023-03-01 11:49:38', '', '2023-03-01 11:49:44'),
(122, 'Tira', 'Doctor', '4297f44b13955235245b2497399d7a93', '', '2023-03-01 11:49:47', 'Dr. Dahryll Tira', '2023-03-01 11:53:21'),
(123, 'Tira', 'Doctor', '4297f44b13955235245b2497399d7a93', '', '2023-03-01 11:51:01', 'Dr. Dahryll Tira', '2023-03-01 11:53:21'),
(124, 'gg', 'Secretary', '4297f44b13955235245b2497399d7a93', 'awdaw', '2023-03-01 11:53:24', '', '2023-03-01 11:54:14'),
(125, 'admin', 'Owner', '4297f44b13955235245b2497399d7a93', 'Tira', '2023-03-01 11:54:17', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

CREATE TABLE `medicine` (
  `id` int(11) NOT NULL,
  `medicine_name` varchar(50) NOT NULL,
  `dosage` int(11) NOT NULL,
  `frequency` varchar(50) NOT NULL,
  `duration` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `medicine`
--

INSERT INTO `medicine` (`id`, `medicine_name`, `dosage`, `frequency`, `duration`, `quantity`) VALUES
(9, 'Acetaminophen', 345, 'Twice daily', 54, 120),
(10, 'Amoxicillin', 345, 'Once daily', 2, 965),
(11, 'Ibuprofen', 123, 'As needed', 365, 120),
(14, 'Antibiotics', 345, 'Twice daily', 54, 1222),
(15, 'Anticoagulants', 770, 'Once daily', 54, 2131);

-- --------------------------------------------------------

--
-- Table structure for table `percription`
--

CREATE TABLE `percription` (
  `id` int(11) NOT NULL,
  `ticket` varchar(50) NOT NULL,
  `height` varchar(50) NOT NULL,
  `weight` varchar(50) NOT NULL,
  `bmi` varchar(50) NOT NULL,
  `bloodpressure` varchar(50) NOT NULL,
  `pulse` varchar(50) NOT NULL,
  `temp` varchar(50) NOT NULL,
  `oxygensaturation` varchar(50) NOT NULL,
  `info` longtext NOT NULL,
  `recomment1` longtext NOT NULL,
  `name` varchar(50) NOT NULL,
  `age` int(11) NOT NULL,
  `datenow` varchar(50) NOT NULL,
  `medicine` varchar(50) NOT NULL,
  `intake` int(11) NOT NULL,
  `dosage` int(11) NOT NULL,
  `frequency` varchar(50) NOT NULL,
  `time_take` int(11) NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `recomment2` longtext NOT NULL,
  `bloodtype` varchar(50) NOT NULL,
  `IDmo` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `doctor` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `percription_data`
--

CREATE TABLE `percription_data` (
  `id` int(11) NOT NULL,
  `ticket` varchar(50) NOT NULL,
  `height` varchar(50) NOT NULL,
  `weight` varchar(50) NOT NULL,
  `bmi` varchar(50) NOT NULL,
  `bloodpressure` varchar(50) NOT NULL,
  `pulse` varchar(50) NOT NULL,
  `temp` varchar(50) NOT NULL,
  `oxygensaturation` varchar(50) NOT NULL,
  `info` longtext NOT NULL,
  `recomment1` longtext NOT NULL,
  `name` varchar(50) NOT NULL,
  `age` int(11) NOT NULL,
  `datenow` varchar(50) NOT NULL,
  `medicine` varchar(50) NOT NULL,
  `intake` int(11) NOT NULL,
  `dosage` int(11) NOT NULL,
  `frequency` varchar(50) NOT NULL,
  `time_take` int(11) NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `recomment2` longtext NOT NULL,
  `bloodtype` varchar(50) NOT NULL,
  `IDmo` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `doctor` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `percription_data`
--

INSERT INTO `percription_data` (`id`, `ticket`, `height`, `weight`, `bmi`, `bloodpressure`, `pulse`, `temp`, `oxygensaturation`, `info`, `recomment1`, `name`, `age`, `datenow`, `medicine`, `intake`, `dosage`, `frequency`, `time_take`, `from_date`, `to_date`, `recomment2`, `bloodtype`, `IDmo`, `status`, `phone`, `doctor`) VALUES
(19, '42537', '123', '123', '1231', '123', '123', '123', '123', 'awdawd', 'awdawd', 'justine cielo gg', 22, '03/11/2023', 'Ibuprofen', 12, 123, 'As needed', 4, '2023-03-21', '2023-03-17', 'awdawdaw', 'B-', 45, 'Distributed', '+639271789423', 'Dr. Peter Parker'),
(21, '81832', '12', '123', '1231', '123', '123', '123', '123', 'awdawd', 'awdawd', 'justine cielo gg', 22, '03/25/2023', 'Amoxicillin', 12, 345, 'Once daily', 4, '2023-03-22', '2023-03-17', 'awdawd', 'B+', 46, 'Distributed', '+639271789423', 'Dr. Dahryll Tira'),
(22, '32798', '123', '342', '2342', '123', '123', '23', '1231', 'wdawdada', 'dawdawdawd', 'justine cielo gg', 22, '03/26/2023', 'Amoxicillin', 12, 345, 'Once daily', 4, '2023-03-20', '2023-03-17', 'dadawdadda', 'B-', 47, 'Distributed', '+639271789423', 'Dr. Peter Parker'),
(23, '46937', '12', '12', '123', '23', '32', '5', '434', 'awdawdawd', 'wadawdawd', 'justine cielo gg', 22, '03/20/2023', 'Amoxicillin', 12, 345, 'Once daily', 4, '2023-03-28', '2023-03-23', 'awdawdaw', 'B+', 48, 'Distributed', '+639271789423', 'Dr. Dahryll Tira');

-- --------------------------------------------------------

--
-- Table structure for table `referral`
--

CREATE TABLE `referral` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `ticket` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `province` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `barangay` varchar(50) NOT NULL,
  `ref_doctorname` varchar(50) NOT NULL,
  `ref_clinic` varchar(50) NOT NULL,
  `ref_phone` varchar(50) NOT NULL,
  `ref_email` varchar(50) NOT NULL,
  `ref_reason` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `IDmo` int(11) NOT NULL,
  `doctor` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `referral`
--

INSERT INTO `referral` (`id`, `name`, `ticket`, `phone`, `province`, `city`, `barangay`, `ref_doctorname`, `ref_clinic`, `ref_phone`, `ref_email`, `ref_reason`, `IDmo`, `doctor`) VALUES
(14, 'Dahryll Morfe Tira', '45057', '+639455602169', 'LAGUNA', 'PAGSANJAN', 'Maulawin', 'Dr. wdawdaw', 'adawda', '+633945834958', 'adawdawdawd', 'awdawdawdawd', 42, 'Dr. Dahryll Tira');

-- --------------------------------------------------------

--
-- Table structure for table `referral_data`
--

CREATE TABLE `referral_data` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `ticket` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `province` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `barangay` varchar(50) NOT NULL,
  `ref_doctorname` varchar(50) NOT NULL,
  `ref_clinic` varchar(50) NOT NULL,
  `ref_phone` varchar(50) NOT NULL,
  `ref_email` varchar(50) NOT NULL,
  `ref_reason` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `IDmo` int(11) NOT NULL,
  `doctor` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `referral_data`
--

INSERT INTO `referral_data` (`id`, `name`, `ticket`, `phone`, `province`, `city`, `barangay`, `ref_doctorname`, `ref_clinic`, `ref_phone`, `ref_email`, `ref_reason`, `IDmo`, `doctor`) VALUES
(15, 'justine cielo gg', '42537', '+639271789423', 'LAGUNA', 'PILA', 'San Antonio', 'Dr. ggggg', 'Pila, Laguna', '+634343423423', 'awdadawda', 'awdawdawd', 45, 'Dr. Peter Parker'),
(16, 'justine cielo gg', '81832', '+639271789423', 'LAGUNA', 'PILA', 'San Antonio', 'Dr. wdaw', 'dawda', '+633423423423', 'dawdaawdawd', 'wdawdadad', 46, 'Dr. Dahryll Tira'),
(17, 'justine cielo gg', '32798', '+639271789423', 'LAGUNA', 'PILA', 'San Antonio', 'Dr. dawdawd', 'Pila, Laguna', '+63271789423', 'cielomerwin@gmail.com', 'gegegegege', 47, 'Dr. Peter Parker'),
(18, 'justine cielo gg', '46937', '+639271789423', 'LAGUNA', 'PILA', 'San Antonio', 'Dr. wdawdawda', 'Pila, Laguna', '+632542453454', 'cielomerwin@gmail.com', 'awdawdawd', 48, 'Dr. Dahryll Tira');

-- --------------------------------------------------------

--
-- Table structure for table `usertable`
--

CREATE TABLE `usertable` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `code` mediumint(50) NOT NULL,
  `status` text NOT NULL,
  `middlename` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `statuss` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `region` varchar(50) NOT NULL,
  `province` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `barangay` varchar(50) NOT NULL,
  `birthday` varchar(50) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usertable`
--

INSERT INTO `usertable` (`id`, `firstname`, `email`, `password`, `code`, `status`, `middlename`, `lastname`, `statuss`, `phone`, `region`, `province`, `city`, `barangay`, `birthday`, `age`, `gender`) VALUES
(88, 'Dahryll', 'cielomerwin@gmail.com', '$2y$10$UFwo4IpHJ1SL38VqdsS80e03nDDYB4jRJAwo0sfMvWb4lL67dn8c2', 0, 'verified', 'Morfe', 'Tira', 'Single', '+639455602169', 'REGION IV-A (CALABARZON)', 'LAGUNA', 'PAGSANJAN', 'Maulawin', '1997-10-04', 25, 'Male'),
(89, 'justine', 'glassmer54@gmail.com', '$2y$10$K0oY0AzsEegylDYpXZP2OuxCRyoxrj3BTfxcdK4ceux1dpI3sz1.G', 0, 'verified', 'cielo', 'gg', 'Single', '+639271789423', 'REGION IV-A (CALABARZON)', 'LAGUNA', 'PILA', 'San Antonio', '2000-06-18', 22, 'Male');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `active`
--
ALTER TABLE `active`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `archive`
--
ALTER TABLE `archive`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact1`
--
ALTER TABLE `contact1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medicine`
--
ALTER TABLE `medicine`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `percription`
--
ALTER TABLE `percription`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `percription_data`
--
ALTER TABLE `percription_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `referral`
--
ALTER TABLE `referral`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `referral_data`
--
ALTER TABLE `referral_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usertable`
--
ALTER TABLE `usertable`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `active`
--
ALTER TABLE `active`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `archive`
--
ALTER TABLE `archive`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `contact1`
--
ALTER TABLE `contact1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT for table `medicine`
--
ALTER TABLE `medicine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `percription`
--
ALTER TABLE `percription`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `percription_data`
--
ALTER TABLE `percription_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `referral`
--
ALTER TABLE `referral`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `referral_data`
--
ALTER TABLE `referral_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `usertable`
--
ALTER TABLE `usertable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
