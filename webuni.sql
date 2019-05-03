-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2019 at 08:18 AM
-- Server version: 5.7.21-log
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
(9, 'About New Course', 'What is the enrollment key?', 1),
(10, 'Khema', 'HI', 1),
(11, 'Good Morning', 'Good Morning', 1),
(12, 'A', 'SV', 1),
(13, 'YY', 'YY', 1),
(14, 'chamu', 'yuyuy', 1),
(15, 'Khema', 'HI', 1),
(16, 'OOP', 'To know about 2nd lecture', 1);

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
(27, 'it7879', 'ITSD', 'dilshan', 2, '2019-03-17'),
(35, 'it3034', 'SD', 'Janandhi', 2, '2019-03-17'),
(37, 'IT8920', 'Cyber Security', 'Chamodi', 1, '2019-05-02'),
(38, 'IT2525', 'Information Tech', 'Khema', 3, '2019-05-02'),
(39, 'IT2415', 'ITDB', 'Janandhi', 3, '2019-03-18'),
(43, 'IT2628', 'EFG', 'Chamodi', 2, '2019-03-19'),
(45, 'IT1723', 'UYT', 'Khema', 1, '2019-05-02'),
(46, 'IT3020', 'PAF', 'Janandhi', 4, '2019-04-01'),
(47, 'IT1010', 'OOP', 'Khema', 4, '2019-05-02');

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
(77, 18, 45, 'IT1723', 'UYT', 'Chamu97'),
(78, 18, 27, 'it7879', 'ITSD', 'Chamu97'),
(83, 18, 35, 'it3034', 'SD', 'Chamu97'),
(85, 21, 35, 'it3034', 'SD', 'Modi96'),
(86, 21, 47, 'IT1010', 'OOP', 'Modi96');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `course` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `comment`, `name`, `course`) VALUES
(2, 'About OOP Lecture 2', 'Chamu97', 'ITSD'),
(3, 'About SD Assignment', 'Chamu97', 'SD'),
(6, 'Unable to download Lecture 1', 'Chamu97', 'SD'),
(7, 'Unable to download Assignment\r\n', 'Chamu97', 'SD'),
(18, 'To know About Lecture 2', 'Modi96', 'SD');

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
(6, 'notice', 'Participate for the lectures', '2019-03-18'),
(7, 'notice', 'Today is a holiday for all the students \r\n', '2019-03-18'),
(23, 'welcome', 'All the students are need to participated ', '2019-03-19'),
(24, 'About Examinations', 'All the Examinations are postponed due to the unstable status of the country.', '2019-05-02');

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
(3, 'Probability and Staticstic', 'IT1997', 1),
(4, 'EFG', 'IT2628', 1),
(5, 'dfgfg', 'IT1536', 1),
(6, 'UYT', 'IT1723', 1),
(7, 'PAF', 'IT3020', 1),
(8, 'OOP', 'IT1010', 1);

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
(18, 'Janandhi', 'Chamudika', 'Chamu97', 'chamudika@gmail.com', '0776709726', 'b9d6c5bd784b3809d115ee2854113e51'),
(21, 'Khema', 'Jayasena', 'Modi96', 'upsalajayasena@gmail.com', '0771234569', '5dec5b41849c5f5858d81a2022781e45');

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
(5, 'assignment5', 'KhemaJayasena.docx', 'ITSD'),
(7, 'lecture6', 'Point of Sales System .docx', 'PAF'),
(9, 'Journal', 'Doc1.docx', 'ITSD'),
(10, 'Lecture 1', 'Workload Allocation.docx', 'SD'),
(11, 'Assignment1', 'Product and Sprint Backlog.docx', 'Cyber Security'),
(12, 'erqaf', 'Parts of Speech.docx', 'ITDB'),
(13, 'Assignment', 'Open Book Note.docx', 'OOP');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_books`
--

CREATE TABLE `tbl_books` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(250) NOT NULL,
  `course` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_books`
--

INSERT INTO `tbl_books` (`id`, `name`, `image`, `course`) VALUES
(32, 'Lecture 2', 'cn labs answers.pdf', 'SD'),
(34, 'Lecture 8', 'IT17076326_Lab_2.pdf', 'Information Tech'),
(36, 'lecture11', 'IT3020-Database Systems.pdf', 'Information Tech'),
(37, 'Lecture5', 'Project Spec_Learning Management System.pdf', 'SD'),
(39, 'IT', 'lec 7 - Threads.pdf', 'Information Tech');

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
(32, 'Lecture 2', 'cn labs answers.pdf', 'SD'),
(34, 'Lecture 8', 'IT17076326_Lab_2.pdf', 'Information Tech'),
(36, 'lecture11', 'IT3020-Database Systems.pdf', 'Information Tech'),
(37, 'Lecture5', 'Project Spec_Learning Management System.pdf', 'SD'),
(38, 'Lecture 1', 'lec 1 - Introduction to Java.pdf', 'OOP');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_papers`
--

CREATE TABLE `tbl_papers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `file` varchar(250) DEFAULT NULL,
  `course` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_papers`
--

INSERT INTO `tbl_papers` (`id`, `name`, `file`, `course`) VALUES
(14, '2018', 'Lecture01-Code.zip', 'OOP');

-- --------------------------------------------------------

--
-- Table structure for table `timer`
--

CREATE TABLE `timer` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `h` int(50) NOT NULL,
  `m` int(50) NOT NULL,
  `s` int(50) NOT NULL,
  `name` varchar(255) NOT NULL,
  `course` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `timer`
--

INSERT INTO `timer` (`id`, `date`, `h`, `m`, `s`, `name`, `course`) VALUES
(1, '2019-05-21', 1, 1, 2, '', ''),
(2, '2019-05-22', 2, 3, 4, '', ''),
(3, '2019-05-29', 5, 3, 4, '', ''),
(5, '2019-05-27', 5, 2, 2, 'assignment5', 'ITSD'),
(6, '2019-04-09', 8, 3, 4, 'Assignment1', 'Cyber Security'),
(7, '2019-04-09', 7, 3, 4, 'lecture6', 'PAF'),
(9, '2019-04-04', 2, 1, 2, 'Journal', 'ITSD'),
(10, '2019-04-18', 4, 3, 1, 'Lecture 1', 'SD'),
(11, '2019-04-18', 4, 5, 6, 'Assignment 1', 'Cyber Security');

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
(1, 'Administrator', 'admin', 'itpm765@gmail.com', '0112345678', '21232f297a57a5a743894a0e4a801fc3', 0),
(3, 'Chamodi', 'Rangani', 'chamodirangani@gmail.com', '0776589865', '12dbebb1b572aacc9a5bda1d05862c5a', 1),
(9, 'Janandhi', 'Chamudika', 'majchemachandra@gmail.com', '0776709726', 'b9d6c5bd784b3809d115ee2854113e51', 1),
(12, 'rangani', 'perera', 'rangani@gmail.com', '0711234567', '857287b4d29a082ef586b2026b051dda', 1),
(13, 'umindu', 'pasan', 'umindup@gmail.com', '0785130134', '01a9ed401074595caa616624ea4f4c39', 1),
(14, 'Khema', 'Upsala', 'upsalamodi@gmail.com', '0778962531', '5dec5b41849c5f5858d81a2022781e45', 1);

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
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `tbl_books`
--
ALTER TABLE `tbl_books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_file`
--
ALTER TABLE `tbl_file`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_papers`
--
ALTER TABLE `tbl_papers`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `enrolled_courses`
--
ALTER TABLE `enrolled_courses`
  MODIFY `en_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_asses`
--
ALTER TABLE `tbl_asses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_books`
--
ALTER TABLE `tbl_books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `tbl_file`
--
ALTER TABLE `tbl_file`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `tbl_papers`
--
ALTER TABLE `tbl_papers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `timer`
--
ALTER TABLE `timer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
