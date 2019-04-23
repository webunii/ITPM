-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2019 at 06:33 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webuni`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `comment_subject` varchar(250) NOT NULL,
  `comment_text` text NOT NULL,
  `comment_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `comment_subject`, `comment_text`, `comment_status`) VALUES
(1, 'hi', 'hi', 1),
(2, 'Welcome', 'Added a course', 1),
(8, 'Hello World', 'Good Morning!', 1),
(9, 'About New Course', 'What is the enrollment key?', 0);

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `c_code` varchar(10) NOT NULL,
  `c_name` varchar(255) NOT NULL,
  `c_incharge` varchar(255) NOT NULL,
  `c_credits` int(11) NOT NULL,
  `ad_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `c_code`, `c_name`, `c_incharge`, `c_credits`, `ad_date`) VALUES
(25, 'IT2328', 'ITP', 'dilshan', 2, '2019-03-15'),
(27, 'it7879', 'ITSD', 'dilshan', 2, '2019-03-17'),
(31, 'IT8989', 'dee', 'dilshan', 2, '2019-03-17'),
(33, 'it1707', 'rfef', 'fefef', 1, '2019-03-17'),
(34, 'IT1513', 'DBMS', 'dilshan', 3, '2019-03-19'),
(35, 'it3034', 'SD', 'Janandhi', 2, '2019-03-17'),
(37, 'IT8920', 'Cyber Security', 'Chamodi Rangani', 1, '2019-03-17'),
(38, 'IT2525', 'Information Tech', 'Chamodi', 3, '2019-03-18'),
(39, 'IT2415', 'ITDB', 'Janandhi', 3, '2019-03-18'),
(40, 'IT1997', 'Probability and Staticstic', 'Janandhi', 4, '2019-03-18'),
(41, 'IT1709', 'awdaw', 'Chamodi Rangani', 1, '2019-03-19'),
(42, 'it1236', 'hvgv', 'Chamodi Rangani', 4, '2019-03-19'),
(43, 'IT25', 'DBDS', 'sadas', 3, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `enrolled_courses`
--

CREATE TABLE `enrolled_courses` (
  `en_id` int(11) NOT NULL,
  `st_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `c_code` varchar(10) NOT NULL,
  `c_name` varchar(255) NOT NULL,
  `user_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `enrolled_courses`
--

INSERT INTO `enrolled_courses` (`en_id`, `st_id`, `c_id`, `c_code`, `c_name`, `user_name`) VALUES
(1, 2, 3, 'ds', 'ds', 'ds'),
(2, 3, 4, 'fd', 'fd', 'fd'),
(76, 18, 25, 'IT2328', 'ITP', 'Chamu97');

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `id` int(11) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `messageNote` varchar(255) NOT NULL,
  `datet` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`id`, `subject`, `messageNote`, `datet`) VALUES
(4, 'Notice', 'Submit your CV', '2019-03-16'),
(6, 'notice', 'Participate for the lectures', '2019-03-18'),
(7, 'notice', 'Today is a holiday for all the students \r\n', '2019-03-18'),
(22, 'HI Khema', 'Good Morning', '2019-03-18');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id`, `subject`, `message`, `status`) VALUES
(1, 'ISM', 'IT2525', 1),
(2, 'ITDB', 'IT2415', 1),
(3, 'Probability and Staticstic', 'IT1997', 1);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(10) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(25) NOT NULL,
  `phone` char(10) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `fname`, `lname`, `username`, `email`, `phone`, `password`) VALUES
(1, 'dinuka', 'Kulathunga', 'dinukakulatunga', 'dinukakulatunga@gmail.com', '0714240755', '53973b28603ce84c4fa5543ca8511d72'),
(18, 'Janandhi', 'Chamudika', 'chamu97', 'chamu@gmail.com', '0776709726', 'b9d6c5bd784b3809d115ee2854113e51');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_asses`
--

CREATE TABLE `tbl_asses` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `file` varchar(250) DEFAULT NULL,
  `course` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_asses`
--

INSERT INTO `tbl_asses` (`id`, `name`, `file`, `course`) VALUES
(4, 'assignment3', 'Lab Report Templete.docx', ''),
(5, 'assignment5', 'KhemaJayasena.docx', ''),
(7, 'lecture6', 'Point of Sales System .docx', ''),
(9, 'Journal', 'Doc1.docx', ''),
(10, 'Lecture 1', 'Workload Allocation.docx', 'SD');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_file`
--

CREATE TABLE `tbl_file` (
  `id` int(11) NOT NULL,
  `name` varchar(12) NOT NULL,
  `image` varchar(250) NOT NULL,
  `course` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_file`
--

INSERT INTO `tbl_file` (`id`, `name`, `image`, `course`) VALUES
(17, 'lecture1', 'IT3030 PAF - 00 Module proforma.pdf', ''),
(20, 'Janandhi', 'TCP State Transition diagram.pdf', ''),
(21, 'lecture1', 'Target Process Labsheet.pdf', ''),
(32, 'Lecture 2', 'cn labs answers.pdf', 'SD'),
(34, 'Lecture 8', 'IT17076326_Lab_2.pdf', 'Information Tech');

-- --------------------------------------------------------

--
-- Table structure for table `timer`
--

CREATE TABLE `timer` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `h` int(50) NOT NULL,
  `m` int(50) NOT NULL,
  `s` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `timer`
--

INSERT INTO `timer` (`id`, `date`, `h`, `m`, `s`) VALUES
(1, '2019-02-22', 24, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `fname`, `lname`, `email`, `phone`, `password`, `role`) VALUES
(1, 'admin', 'admin', 'itpm765@gmail.com', '0112345678', '21232f297a57a5a743894a0e4a801fc3', 0),
(3, 'Chamodi', 'Rangani', 'chamodirangani@gmail.com', '0776589865', '12dbebb1b572aacc9a5bda1d05862c5a', 1),
(11, 'dinuka', 'kulathunga', 'dinukakulatunga@gmail.com', '0714240755', '7ee119d5e8b2d62c01452ad601e3f244', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enrolled_courses`
--
ALTER TABLE `enrolled_courses`
  ADD PRIMARY KEY (`en_id`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_asses`
--
ALTER TABLE `tbl_asses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_file`
--
ALTER TABLE `tbl_file`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `timer`
--
ALTER TABLE `timer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `enrolled_courses`
--
ALTER TABLE `enrolled_courses`
  MODIFY `en_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_asses`
--
ALTER TABLE `tbl_asses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_file`
--
ALTER TABLE `tbl_file`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
