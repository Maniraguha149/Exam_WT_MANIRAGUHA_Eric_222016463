-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2024 at 04:31 PM
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
-- Database: `online_personal_branding_workshop_platform`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendees`
--

CREATE TABLE `attendees` (
  `attendee_id` int(11) NOT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telephone` varchar(20) DEFAULT NULL,
  `registration_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `workshop_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attendees`
--

INSERT INTO `attendees` (`attendee_id`, `firstname`, `lastname`, `email`, `telephone`, `registration_date`, `workshop_id`) VALUES
(1, 'matama', '0', 'ineza1@gmail.com', '65434567', '2024-04-30 22:00:00', 2);

-- --------------------------------------------------------

--
-- Table structure for table `branding_resources`
--

CREATE TABLE `branding_resources` (
  `resource_id` int(11) NOT NULL,
  `resource_name` varchar(100) DEFAULT NULL,
  `resource_type` varchar(50) DEFAULT NULL,
  `file_path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `branding_resources`
--

INSERT INTO `branding_resources` (`resource_id`, `resource_name`, `resource_type`, `file_path`) VALUES
(2, 'sonny', '0', 'railway'),
(3, 'kenny', '0', 'road'),
(4, 'apple', '0', 'water transport'),
(5, 'samsang', '0', 'txl');

-- --------------------------------------------------------

--
-- Table structure for table `instructors`
--

CREATE TABLE `instructors` (
  `instructor_id` int(11) NOT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telephone` varchar(20) DEFAULT NULL,
  `bio` text DEFAULT NULL,
  `expertise` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `instructors`
--

INSERT INTO `instructors` (`instructor_id`, `firstname`, `lastname`, `email`, `telephone`, `bio`, `expertise`) VALUES
(1, 'ineza', '0', 'karo@gmail.com', '0000000009', 'detect', 'noble'),
(2, 'matama', '0', 'maniraguha@gmail.com', '098790098', '0', 'sell'),
(3, 'teta', '0', 'teta@gmail.com', '7654567', '0', 'crypto');

-- --------------------------------------------------------

--
-- Table structure for table `session_attendees`
--

CREATE TABLE `session_attendees` (
  `attendance_id` int(11) NOT NULL,
  `session_id` int(11) DEFAULT NULL,
  `attendee_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `session_attendees`
--

INSERT INTO `session_attendees` (`attendance_id`, `session_id`, `attendee_id`) VALUES
(2, 2, 1),
(3, 2, 1),
(5, 2, 1),
(8, 2, 1),
(9, 2, 1),
(10, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `session_feedback`
--

CREATE TABLE `session_feedback` (
  `feedback_id` int(11) NOT NULL,
  `session_id` int(11) DEFAULT NULL,
  `attendee_id` int(11) DEFAULT NULL,
  `feedback_text` text DEFAULT NULL,
  `rating` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `session_feedback`
--

INSERT INTO `session_feedback` (`feedback_id`, `session_id`, `attendee_id`, `feedback_text`, `rating`) VALUES
(1, 2, 1, 'tres bier', 76),
(4, 2, 1, 'good', 65);

-- --------------------------------------------------------

--
-- Table structure for table `session_resources`
--

CREATE TABLE `session_resources` (
  `resource_id` int(11) NOT NULL,
  `session_id` int(11) DEFAULT NULL,
  `resource_name` varchar(100) DEFAULT NULL,
  `resource_type` varchar(50) DEFAULT NULL,
  `file_path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `session_resources`
--

INSERT INTO `session_resources` (`resource_id`, `session_id`, `resource_name`, `resource_type`, `file_path`) VALUES
(3, 2, 'lenovo', 'i7', 'water transport'),
(5, 2, 'samsang', 'ford', 'subway'),
(7, 2, 'sonny', 'xperia', 'txl'),
(9, 2, 'hp', 'i5', 'rood');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telephone` varchar(20) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `creationdate` timestamp NOT NULL DEFAULT current_timestamp(),
  `activation_code` varchar(50) DEFAULT NULL,
  `is_activated` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `firstname`, `lastname`, `username`, `email`, `telephone`, `password`, `creationdate`, `activation_code`, `is_activated`) VALUES
(1, 'eric', 'maniraguha', 'urhuye', 'ineza1@gmail.com', '7654333333', '$2y$10$0/pEXE39/wHuMWcNIgkC.uQGQqEWCQUXitUybrs0ICd2GPJnZ1O3e', '2024-05-11 08:55:07', '0000', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`role_id`, `role_name`) VALUES
(2, 'rooney'),
(3, 'eric'),
(5, 'vianny');

-- --------------------------------------------------------

--
-- Table structure for table `workshops`
--

CREATE TABLE `workshops` (
  `workshop_id` int(11) NOT NULL,
  `workshop_title` varchar(100) DEFAULT NULL,
  `instructor_id` int(11) DEFAULT NULL,
  `workshop_date` date DEFAULT NULL,
  `duration_hours` int(11) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `workshops`
--

INSERT INTO `workshops` (`workshop_id`, `workshop_title`, `instructor_id`, `workshop_date`, `duration_hours`, `location`, `description`) VALUES
(1, 'samsang', 1, '2024-04-30', 6, 'kigali_rwanda', 'enough'),
(2, 'iphone', 1, '2024-04-30', 2, '2024-05-07', 'iphone');

-- --------------------------------------------------------

--
-- Table structure for table `workshop_sessions`
--

CREATE TABLE `workshop_sessions` (
  `session_id` int(11) NOT NULL,
  `workshop_id` int(11) DEFAULT NULL,
  `session_title` varchar(100) DEFAULT NULL,
  `session_date` date DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `workshop_sessions`
--

INSERT INTO `workshop_sessions` (`session_id`, `workshop_id`, `session_title`, `session_date`, `start_time`, `end_time`, `location`, `description`) VALUES
(2, 1, '0', '2024-04-03', '00:12:30', '00:20:24', 'kigali_rwanda', 'premiere quality');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendees`
--
ALTER TABLE `attendees`
  ADD PRIMARY KEY (`attendee_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `fk_workshop_attendees` (`workshop_id`);

--
-- Indexes for table `branding_resources`
--
ALTER TABLE `branding_resources`
  ADD PRIMARY KEY (`resource_id`);

--
-- Indexes for table `instructors`
--
ALTER TABLE `instructors`
  ADD PRIMARY KEY (`instructor_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `session_attendees`
--
ALTER TABLE `session_attendees`
  ADD PRIMARY KEY (`attendance_id`),
  ADD KEY `fk_session_attendees_sessions` (`session_id`),
  ADD KEY `fk_session_attendees_attendees` (`attendee_id`);

--
-- Indexes for table `session_feedback`
--
ALTER TABLE `session_feedback`
  ADD PRIMARY KEY (`feedback_id`),
  ADD KEY `fk_session_feedback_sessions` (`session_id`),
  ADD KEY `fk_session_feedback_attendees` (`attendee_id`);

--
-- Indexes for table `session_resources`
--
ALTER TABLE `session_resources`
  ADD PRIMARY KEY (`resource_id`),
  ADD KEY `fk_session_resources_sessions` (`session_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `workshops`
--
ALTER TABLE `workshops`
  ADD PRIMARY KEY (`workshop_id`),
  ADD KEY `fk_instructor` (`instructor_id`);

--
-- Indexes for table `workshop_sessions`
--
ALTER TABLE `workshop_sessions`
  ADD PRIMARY KEY (`session_id`),
  ADD KEY `fk_workshop_sessions_workshops` (`workshop_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendees`
--
ALTER TABLE `attendees`
  MODIFY `attendee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `branding_resources`
--
ALTER TABLE `branding_resources`
  MODIFY `resource_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `instructors`
--
ALTER TABLE `instructors`
  MODIFY `instructor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `session_attendees`
--
ALTER TABLE `session_attendees`
  MODIFY `attendance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `session_feedback`
--
ALTER TABLE `session_feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `session_resources`
--
ALTER TABLE `session_resources`
  MODIFY `resource_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `workshops`
--
ALTER TABLE `workshops`
  MODIFY `workshop_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `workshop_sessions`
--
ALTER TABLE `workshop_sessions`
  MODIFY `session_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendees`
--
ALTER TABLE `attendees`
  ADD CONSTRAINT `fk_workshop_attendees` FOREIGN KEY (`workshop_id`) REFERENCES `workshops` (`workshop_id`);

--
-- Constraints for table `session_attendees`
--
ALTER TABLE `session_attendees`
  ADD CONSTRAINT `fk_session_attendees_attendees` FOREIGN KEY (`attendee_id`) REFERENCES `attendees` (`attendee_id`),
  ADD CONSTRAINT `fk_session_attendees_sessions` FOREIGN KEY (`session_id`) REFERENCES `workshop_sessions` (`session_id`);

--
-- Constraints for table `session_feedback`
--
ALTER TABLE `session_feedback`
  ADD CONSTRAINT `fk_session_feedback_attendees` FOREIGN KEY (`attendee_id`) REFERENCES `attendees` (`attendee_id`),
  ADD CONSTRAINT `fk_session_feedback_sessions` FOREIGN KEY (`session_id`) REFERENCES `workshop_sessions` (`session_id`);

--
-- Constraints for table `session_resources`
--
ALTER TABLE `session_resources`
  ADD CONSTRAINT `fk_session_resources_sessions` FOREIGN KEY (`session_id`) REFERENCES `workshop_sessions` (`session_id`);

--
-- Constraints for table `workshops`
--
ALTER TABLE `workshops`
  ADD CONSTRAINT `fk_instructor` FOREIGN KEY (`instructor_id`) REFERENCES `instructors` (`instructor_id`);

--
-- Constraints for table `workshop_sessions`
--
ALTER TABLE `workshop_sessions`
  ADD CONSTRAINT `fk_workshop_sessions_workshops` FOREIGN KEY (`workshop_id`) REFERENCES `workshops` (`workshop_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
