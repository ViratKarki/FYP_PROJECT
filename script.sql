-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2022 at 07:13 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lifeshare`
--

-- --------------------------------------------------------

--
-- Table structure for table `blood_request`
--

CREATE TABLE `blood_request` (
  `request_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `address` varchar(30) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `dateofrequest` date NOT NULL,
  `bloodgroup` varchar(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blood_request`
--

INSERT INTO `blood_request` (`request_id`, `name`, `address`, `contact`, `dateofrequest`, `bloodgroup`, `id`) VALUES
(1, 'Prabin G.C. ', 'Bagar, Pokhara', '9812345670', '2022-03-29', 'A+', 5),
(2, 'Virat Karki', 'Chhorepaten, Pokhara', '9804132456', '2022-03-29', 'AB+', 5),
(3, 'Gahan Achraya', 'Malepatan, Pokhara ', '9804125262', '2022-03-29', 'B+', 5),
(4, 'Samir G.C', 'Ranipauwa, Pokhara', '9806534351', '2022-04-01', 'O+', 5),
(6, 'Manju Karki', 'Syangja Phedikhola ', '9846234567', '2022-03-31', 'Ab-', 8),
(7, 'Manju Karki', 'Syangja Phedikhola ', '9846234567', '2022-03-31', 'Ab-', 8);

-- --------------------------------------------------------

--
-- Table structure for table `donor`
--

CREATE TABLE `donor` (
  `donor_id` int(11) NOT NULL,
  `fullname` varchar(30) NOT NULL,
  `bloodgroup` varchar(10) NOT NULL,
  `address` varchar(50) NOT NULL,
  `contactno` varchar(20) NOT NULL,
  `age` int(3) NOT NULL,
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `donor`
--

INSERT INTO `donor` (`donor_id`, `fullname`, `bloodgroup`, `address`, `contactno`, `age`, `id`, `email`) VALUES
(7, 'Prabin G.C', 'A+', 'Bagar, Pokhara', '9801234567', 22, 6, 'prabin@gmail.com'),
(8, 'Rasmi Chhetri', 'O+', 'Nagdada, Pokhara', '9801245620', 18, 7, 'rasmi10@gmail.com'),
(9, 'Gahan Acharya ', 'B+', 'Malepatan, Pokhara', '9801234567', 24, 8, 'gahan@gmail.com '),
(10, 'Virat Karki ', 'AB+', 'Chhorepatan 17, Pokhara ', '9804177332', 22, 9, 'viratkarki@gmail.com '),
(12, 'Krishna Karki', 'AB+', 'Phedikhola-2 Syangja', '9801456235', 24, 10, 'krishna10@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `donorcampinfo`
--

CREATE TABLE `donorcampinfo` (
  `camp_id` int(11) NOT NULL,
  `time` varchar(50) NOT NULL,
  `place` varchar(50) NOT NULL,
  `information` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `donorcampinfo`
--

INSERT INTO `donorcampinfo` (`camp_id`, `time`, `place`, `information`) VALUES
(10, 'June 19, 2022', 'Phedikhola, Siddhartha school', 'We are helding a blood donation program at siddhartha school.'),
(11, 'April 28, 2022', 'Chhorepatan 17, Pokhara chhorepatan school', 'We are helding a blood donation program at chhorepatan school.'),
(13, 'July 1, 2022', 'Ranipauwa Pokhara', 'We are helding a blood donation program in Ranipauwa Pokhara in informatic collage.');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedback_id` int(100) NOT NULL,
  `id` int(100) NOT NULL,
  `message` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedback_id`, `id`, `message`) VALUES
(15, 6, 'hello world'),
(16, 5, 'cfgh'),
(17, 7, 'adssg'),
(18, 5, 'heels '),
(19, 6, 'sfgewgwey4'),
(20, 10, 'Hello team, I like your app');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `username` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(10) NOT NULL,
  `address` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `bloodgroup` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `name`, `email`, `contact`, `address`, `password`, `bloodgroup`) VALUES
(5, 'test2', 'Hello World', 'hello@gmail.com', '9801234569', 'Kathmandu', '$2y$10$fDCoZowk.e1TgY1yyZXpHun0d6.1n1UF4OKp6V/UMVVqYa55lvNlS', 'B-'),
(6, 'prabin10', 'Prabin G.C', 'prabingc@gmail.com', '9801452367', 'Bindabasini', '$2y$10$l1vEiEOPQOVC/QP/AflKGe8ufo5QZSccZgi5N/NhJHTIqMIWqzu7.', 'A+'),
(7, 'rasmi10', 'Rasmi Chhetri', 'rasmi10@gmail.com', '9801234560', 'Pokhara', '$2y$10$ykaP/ZlPXZzr1V7zwxmXv.CKtG/3C/oeRAEPNIgKRJfL0T4E3yd3C', 'O+ve'),
(8, 'gahan10', 'Gahan Acharya', 'gahan@gmail.com', '9807654321', 'Malepatan', '$2y$10$Vvt1EfqzqB29H31y.PFJpeutkaxbrMWoaldIoM.iIG/OxJLs9t/.a', 'B+'),
(9, 'virat10 ', 'virat karki', 'viratkarki@gmail.com', '9804177332', 'chhorepatan 17 pokhara ', '$2y$10$e8rrPUax7ktBnLOX6OxA9O4/Nbp1DclaGF0Ptzmcki8EelS6dmhP6', 'AB+'),
(10, 'karki10', 'Krishna Chhetri', 'krishna10@gmail.com', '985612425', 'Phedikhola-2, Syangja', '$2y$10$oqVOqQKs6NQSKKw.uPMHYe2.Hdaa2a6Fk7TJlLu7liBK/Ev8bWj6K', 'AB+');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blood_request`
--
ALTER TABLE `blood_request`
  ADD PRIMARY KEY (`request_id`),
  ADD KEY `blood_request` (`id`);

--
-- Indexes for table `donor`
--
ALTER TABLE `donor`
  ADD PRIMARY KEY (`donor_id`),
  ADD KEY `donor` (`id`);

--
-- Indexes for table `donorcampinfo`
--
ALTER TABLE `donorcampinfo`
  ADD PRIMARY KEY (`camp_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blood_request`
--
ALTER TABLE `blood_request`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `donor`
--
ALTER TABLE `donor`
  MODIFY `donor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `donorcampinfo`
--
ALTER TABLE `donorcampinfo`
  MODIFY `camp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blood_request`
--
ALTER TABLE `blood_request`
  ADD CONSTRAINT `blood_request` FOREIGN KEY (`id`) REFERENCES `users` (`id`);

--
-- Constraints for table `donor`
--
ALTER TABLE `donor`
  ADD CONSTRAINT `donor` FOREIGN KEY (`id`) REFERENCES `users` (`id`);

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `id` FOREIGN KEY (`id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
