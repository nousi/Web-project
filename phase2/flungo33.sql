-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 08, 2024 at 06:25 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `flungo`
--

-- --------------------------------------------------------

--
-- Table structure for table `learner`
--

CREATE TABLE `learner` (
  `learningPreferences` char(100) NOT NULL,
  `learningGoals` char(100) NOT NULL,
  `Uemail` varchar(320) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `learner`
--

INSERT INTO `learner` (`learningPreferences`, `learningGoals`, `Uemail`) VALUES
('Beginner', 'speak spinach like native speaker.', 'Lana@gmail.com'),
('Intermediate', 'speak english like native speaker.', 'Dana@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `partner`
--

CREATE TABLE `partner` (
  `age` int(3) NOT NULL,
  `bio` mediumtext NOT NULL,
  `Uemail` varchar(320) NOT NULL,
  `Proficiency` text NOT NULL,
  `Rating` double NOT NULL,
  `SessionPrice` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `partner`
--

INSERT INTO `partner` (`age`, `bio`, `Uemail`, `Proficiency`, `Rating`, `SessionPrice`) VALUES
(25, 'English Tutor', 'john1@gmail.com', 'Advanced', 4.8, 20),
(26, 'Spanish Tutor', 'Jane@gmail.com', 'Intermediate', 4.4, 15);

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `Rnumber` tinyint(4) NOT NULL,
  `languageToLearn` tinytext NOT NULL,
  `proficiencyLevel` tinytext NOT NULL,
  `preferredSchedule` tinytext NOT NULL,
  `sessionDuration` int(11) NOT NULL,
  `requestStatus` tinytext NOT NULL DEFAULT 'Pending',
  `Uemail` varchar(320) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`Rnumber`, `languageToLearn`, `proficiencyLevel`, `preferredSchedule`, `sessionDuration`, `requestStatus`, `Uemail`) VALUES
(1, 'English', 'Intermediate', 'sunday and monday', 30, 'Pending', 'Dana@gmail.com'),
(2, 'spinach', 'Beginner', 'weekend', 60, 'Pending', 'Lana@gmail.com'),
(3, 'Spinach ', 'Beginner', 'weekend', 45, 'Pending', 'Dana@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `reviews and ratings`
--

CREATE TABLE `reviews and ratings` (
  `Reviewnum` int(11) NOT NULL,
  `reviewText` tinytext NOT NULL,
  `rating` int(11) NOT NULL,
  `sessionNum` int(11) NOT NULL,
  `Lemail` varchar(320) NOT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `reviews and ratings`
--

INSERT INTO `reviews and ratings` (`Reviewnum`, `reviewText`, `rating`, `sessionNum`, `Lemail`, `data`) VALUES
(1, 'Great Partner, very helpful!', 5, 1, 'Lana@gmail.com', '2024-04-30');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `Snumber` int(11) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `startDateTime` datetime NOT NULL,
  `endDateTime` datetime NOT NULL,
  `Lemail` varchar(320) NOT NULL,
  `Pemail` varchar(320) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`Snumber`, `subject`, `startDateTime`, `endDateTime`, `Lemail`, `Pemail`) VALUES
(1, 'Topics Covered: Vocabulary building, cultural insights', '2024-04-30 09:30:55', '2024-04-30 10:30:55', 'Lana@gmail.com', 'jane@gmail.com'),
(2, 'Spanch class meeting', '2024-04-30 09:30:55', '2024-04-30 10:30:55', 'Dana@gmail.com', 'john1@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `email` varchar(320) NOT NULL,
  `password` varchar(100) NOT NULL,
  `FirstName` varchar(100) NOT NULL,
  `LastName` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `location` varchar(50) NOT NULL,
  `age` varchar(10) DEFAULT NULL,
  `gender` varchar(6) DEFAULT NULL,
  `bio` varchar(500) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `role` varchar(2) NOT NULL,
  `img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`email`, `password`, `FirstName`, `LastName`, `city`, `location`, `age`, `gender`, `bio`, `phone`, `role`, `img`) VALUES
('Dana@gmail.com', 'D1', 'dana                    ', 'Aldokhia', 'riyadh', '', '41', 'Female', '', '', 'L', ''),
('Jane@gmail.com', 'jane1', 'Jane          ', 'Smith', 'alQaseem', '', '26', 'Male', 'i am here to teach in English!', '+966593677595', 'P', ''),
('john1@gmail.com', 'john1', 'john      ', 'Doe', 'abha', '', '25', 'Male', 'Spanish And EnglishTutor', '', 'P', ''),
('Lana@gmail.com', 'lana34', 'lana    ', 'turki', 'riyadh', '', '34', 'Female', '', '', 'L', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `learner`
--
ALTER TABLE `learner`
  ADD PRIMARY KEY (`learningPreferences`),
  ADD KEY `Uemail` (`Uemail`);

--
-- Indexes for table `partner`
--
ALTER TABLE `partner`
  ADD KEY `Uemail` (`Uemail`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`Rnumber`),
  ADD KEY `Uemail` (`Uemail`);

--
-- Indexes for table `reviews and ratings`
--
ALTER TABLE `reviews and ratings`
  ADD PRIMARY KEY (`Reviewnum`),
  ADD KEY `sessionNum` (`sessionNum`),
  ADD KEY `Lemail` (`Lemail`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`Snumber`),
  ADD KEY `Lemail` (`Lemail`),
  ADD KEY `Pemail` (`Pemail`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`email`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `learner`
--
ALTER TABLE `learner`
  ADD CONSTRAINT `learner_ibfk_1` FOREIGN KEY (`Uemail`) REFERENCES `users` (`email`);

--
-- Constraints for table `partner`
--
ALTER TABLE `partner`
  ADD CONSTRAINT `partner_ibfk_1` FOREIGN KEY (`Uemail`) REFERENCES `users` (`email`);

--
-- Constraints for table `request`
--
ALTER TABLE `request`
  ADD CONSTRAINT `request_ibfk_1` FOREIGN KEY (`Uemail`) REFERENCES `learner` (`Uemail`);

--
-- Constraints for table `reviews and ratings`
--
ALTER TABLE `reviews and ratings`
  ADD CONSTRAINT `reviews and ratings_ibfk_1` FOREIGN KEY (`Lemail`) REFERENCES `learner` (`Uemail`),
  ADD CONSTRAINT `reviews and ratings_ibfk_2` FOREIGN KEY (`sessionNum`) REFERENCES `sessions` (`Snumber`);

--
-- Constraints for table `sessions`
--
ALTER TABLE `sessions`
  ADD CONSTRAINT `sessions_ibfk_1` FOREIGN KEY (`Lemail`) REFERENCES `learner` (`Uemail`),
  ADD CONSTRAINT `sessions_ibfk_2` FOREIGN KEY (`Pemail`) REFERENCES `partner` (`Uemail`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
