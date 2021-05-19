-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql200.ezyro.com
-- Generation Time: May 19, 2021 at 01:18 PM
-- Server version: 5.6.48-88.0
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ezyro_27839184_ams`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendence`
--

CREATE TABLE `attendence` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `month` varchar(100) NOT NULL,
  `date` int(11) NOT NULL,
  `day` varchar(20) NOT NULL,
  `attendence_status` varchar(50) NOT NULL,
  `username` varchar(200) NOT NULL,
  `rollNo` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendence`
--

INSERT INTO `attendence` (`id`, `user_id`, `year`, `month`, `date`, `day`, `attendence_status`, `username`, `rollNo`) VALUES
(1, 1, 2021, 'March', 11, 'Thursday', 'P', 'Student', 12),
(22, 1, 2021, 'March', 22, 'Monday', 'P', 'Student', 12);

-- --------------------------------------------------------

--
-- Table structure for table `emails`
--

CREATE TABLE `emails` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `rollNo` int(11) NOT NULL,
  `user_email` varchar(200) NOT NULL,
  `subject` text NOT NULL,
  `send_date` date NOT NULL,
  `message` text NOT NULL,
  `email_status` varchar(20) NOT NULL DEFAULT 'unapproved'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emails`
--

INSERT INTO `emails` (`id`, `user_id`, `username`, `rollNo`, `user_email`, `subject`, `send_date`, `message`, `email_status`) VALUES
(1, 1, 'test', 12, 'test@gmail.com', 'sfdsfsdfsdf', '2021-02-21', 'dfsfsfsfd', 'approved'),
(2, 1, 'Student', 2, 'student@gmail.com', 'werwer', '2021-03-11', 'werwer', 'approved'),
(3, 1, 'Student', 2, 'student@gmail.com', 'werwer', '2021-03-11', 'werwer', 'unapproved'),
(4, 1, 'Student', 2, 'student@gmail.com', 'werwer', '2021-03-11', 'werwer', 'approved'),
(5, 1, 'Ahmad', 12, 'student@gmail.com', 'Just kidding', '2021-03-11', 'Can i have a break.', 'unapproved');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `rollNo` int(3) NOT NULL,
  `address` varchar(200) NOT NULL,
  `user_email` varchar(200) NOT NULL,
  `user_password` varchar(200) NOT NULL,
  `user_role` varchar(20) NOT NULL,
  `user_image` varchar(200) NOT NULL DEFAULT 'student.png'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `rollNo`, `address`, `user_email`, `user_password`, `user_role`, `user_image`) VALUES
(1, 'Student', 12, 'Islamabad, Pakistan', 'student@gmail.com', '$2y$12$iLPbOYygjMu3YVuY9bRcGuSmujVhYDVZrRe48gdQZrURQoQT7u33u', 'student', 'user-11.jpg'),
(2, 'admin', 4, 'Abbottabad, pakistan', 'admin@gmail.com', '$2y$12$BYMH3naHRH7ST5K/CzG9vePyJ6ydCGNyRDp1rFMx0qad1KY6ikSMS', 'admin', 'student.png'),
(3, 'test', 101, 'abc', 'testy@gmail.com', '$2y$12$2AE2xztyxfPEfTjrRE0Kz.7n/2JTUZJu.gSM.TCBLfRfLN3OlFj6y', 'student', 'student.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendence`
--
ALTER TABLE `attendence`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emails`
--
ALTER TABLE `emails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendence`
--
ALTER TABLE `attendence`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `emails`
--
ALTER TABLE `emails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
