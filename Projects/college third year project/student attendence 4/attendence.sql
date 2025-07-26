-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 15, 2025 at 08:31 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `attendence`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` varchar(255) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `admin_name`, `password`) VALUES
('2', 'paresh', '$2y$10$CYFdhczNXL1Jx0zLVOXIoOrrwFDUy5KAjQuGMnnlSx.Np7PAOtH0e'),
('3', 'rahul', '$2y$10$RD2INY/o8RpBJODjWqp.jOVqvhzOntHUDB2Zv6c2gNMA/yQV2o5dS');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(11) NOT NULL,
  `student_id` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `status` enum('Present','Absent','Late') NOT NULL,
  `teacher_id` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `student_id`, `date`, `status`, `teacher_id`, `subject`, `time`) VALUES
(50, 'STU001', '2025-03-04', 'Absent', 'TCHR0001', 'Computer Science', '18:30:39'),
(51, 'STU002', '2025-03-04', 'Present', 'TCHR0001', 'Computer Science', '18:31:14'),
(52, 'STU001', '2025-03-08', 'Present', 'TCHR0001', 'Computer Science', '11:03:40'),
(53, 'STU001', '2025-03-08', 'Present', 'TCHR0001', 'Computer Science', '11:03:56'),
(54, 'STU003', '2025-03-11', 'Absent', 'TCHR0001', 'Computer Science', '12:35:04');

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `class_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`class_name`) VALUES
('bsc fy'),
('bsc sy'),
('bsc ty'),
('msc fy'),
('msc sy');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `student_id` varchar(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `contact_no` varchar(15) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gender` enum('Male','Female','Other') NOT NULL,
  `dob` date NOT NULL,
  `class` varchar(100) NOT NULL,
  `subjects` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_id`, `name`, `address`, `contact_no`, `email`, `gender`, `dob`, `class`, `subjects`) VALUES
('STU001', 'pavan korade', 'jahdjcbhz', '1111111111', 'jgadsjgh@gmail.com', 'Male', '1111-11-01', 'bsc fy', 'Computer Science,math,psychology'),
('STU002', 'pavan korade', 'iwehjgr', '1111111111', 'juaoiduskjh@gmail.com', 'Male', '2222-02-22', 'bsc sy', 'Computer Science,math,psychology'),
('STU003', 'ram', 'khafkjs', '1111111111', 'hdsjaghh@gmail.com', 'Male', '2222-02-22', 'bsc ty', 'Computer Science,math,psychology'),
('STU004', 'rahul shinde', 'jhkwjhdkasjb', '1111111111', 'kjhadskhj@gmail.com', 'Female', '2222-02-22', 'msc fy', 'Economics,psychology'),
('STU005', 'prathamesh joshi', 'sbes', '1111111111', 'adsjfkjh@gmail.com', 'Male', '2005-02-22', 'msc fy', 'Computer Science,Home Science,psychology');

-- --------------------------------------------------------

--
-- Table structure for table `student_problems`
--

CREATE TABLE `student_problems` (
  `id` int(11) NOT NULL,
  `student_name` varchar(255) NOT NULL,
  `problem` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_problems`
--

INSERT INTO `student_problems` (`id`, `student_name`, `problem`, `created_at`) VALUES
(1, 'rahul shinde', 'hay', '2025-03-08 07:19:39');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `subject_id` int(11) NOT NULL,
  `subject_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`subject_id`, `subject_name`) VALUES
(2, 'Computer Science'),
(4, 'Economics'),
(5, 'Home Science'),
(3, 'math'),
(1, 'psychology');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `teacher_id` varchar(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `contact_no` varchar(15) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gender` enum('Male','Female','Other') NOT NULL,
  `age` int(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `assigned_classes` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`teacher_id`, `name`, `subject`, `address`, `contact_no`, `email`, `gender`, `age`, `password`, `subject_id`, `assigned_classes`) VALUES
('TCHR0001', 'pavan korade', 'Computer Science', 'msnbmf', '1111111111', 'ksjhdfkjhb@gmail.com', 'Male', 22, '2577', NULL, 'bsc fy, bsc ty'),
('TCHR0002', 'pavan korade', 'Computer Science', 'msnbcm', '1111111111', 'jhgsfjhg@gmail.com', 'Male', 22, '2577', NULL, 'bsc fy, bsc sy'),
('TCHR0003', 'rahul shinde', 'Computer Science', 'khqwkrjhbda', '1111111111', 'kejhfksd@wgmail.com', 'Male', 25, '2577', NULL, 'bsc fy, bsc sy, bsc ty'),
('TCHR0004', 'prakash soni', 'Home Science', 'sbes', '1111111111', 'jdkafjh@gmail.com', 'Male', 22, '2577', NULL, 'msc fy, msc sy');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_responses`
--

CREATE TABLE `teacher_responses` (
  `id` int(11) NOT NULL,
  `teacher_name` varchar(255) NOT NULL,
  `response` text NOT NULL,
  `student_problem_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teacher_responses`
--

INSERT INTO `teacher_responses` (`id`, `teacher_name`, `response`, `student_problem_id`, `created_at`) VALUES
(1, 'rahul ', 'hi', 1, '2025-03-08 07:19:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`class_name`),
  ADD UNIQUE KEY `class_name` (`class_name`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `class` (`class`);

--
-- Indexes for table `student_problems`
--
ALTER TABLE `student_problems`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`subject_id`),
  ADD UNIQUE KEY `subject_name` (`subject_name`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`teacher_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `fk_teacher_subject` (`subject_id`);

--
-- Indexes for table `teacher_responses`
--
ALTER TABLE `teacher_responses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_problem_id` (`student_problem_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `student_problems`
--
ALTER TABLE `student_problems`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `teacher_responses`
--
ALTER TABLE `teacher_responses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`class`) REFERENCES `classes` (`class_name`) ON DELETE CASCADE;

--
-- Constraints for table `teachers`
--
ALTER TABLE `teachers`
  ADD CONSTRAINT `fk_teacher_subject` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`subject_id`) ON DELETE SET NULL;

--
-- Constraints for table `teacher_responses`
--
ALTER TABLE `teacher_responses`
  ADD CONSTRAINT `teacher_responses_ibfk_1` FOREIGN KEY (`student_problem_id`) REFERENCES `student_problems` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
