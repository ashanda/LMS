-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 22, 2022 at 07:36 AM
-- Server version: 8.0.29-0ubuntu0.22.04.2
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `atlas-lms`
--

-- --------------------------------------------------------

--
-- Table structure for table `exam_submissions`
--

CREATE TABLE `exam_submissions` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `exam_id` int NOT NULL,
  `filename` text NOT NULL,
  `time` datetime NOT NULL,
  `marks` int DEFAULT NULL,
  `remark` text NOT NULL,
  `status` int DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lmsclass`
--

CREATE TABLE `lmsclass` (
  `cid` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `add_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lmsclass`
--

INSERT INTO `lmsclass` (`cid`, `name`, `add_date`, `status`) VALUES
(1, 'Grade 03', '2022-07-18 09:03:37', 'Publish'),
(2, 'Grade 04', '2022-07-18 09:03:52', 'Publish'),
(3, 'Grade 05', '2022-07-18 09:04:04', 'Publish');

-- --------------------------------------------------------

--
-- Table structure for table `lmsclasstute`
--

CREATE TABLE `lmsclasstute` (
  `ctuid` int NOT NULL,
  `tid` int NOT NULL,
  `class` int NOT NULL,
  `subject` int NOT NULL,
  `month` varchar(50) NOT NULL,
  `ctype` varchar(50) NOT NULL,
  `title` text NOT NULL,
  `tdocument` varchar(500) NOT NULL,
  `add_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lmsclasstute`
--

INSERT INTO `lmsclasstute` (`ctuid`, `tid`, `class`, `subject`, `month`, `ctype`, `title`, `tdocument`, `add_date`, `status`) VALUES
(1, 12, 3, 14, 'July', 'Free Class', 'Tute 01', '156254.pdf', '2022-07-18 15:04:57', 1),
(2, 13, 3, 15, 'July', 'Free Class', 'Tute 01', '279852.pdf', '2022-07-18 15:05:55', 1),
(4, 13, 3, 15, 'July', 'Online Class', 'Tute 02', '469666.pdf', '2022-07-18 15:08:27', 1),
(9, 12, 3, 14, 'July', 'Paper Class', 'Yogee Media', '651408.docx', '2022-07-19 14:39:12', 1),
(10, 13, 3, 15, 'July', 'Paper Class', ' Yogee Media', '522420.docx', '2022-07-19 14:40:01', 1),
(11, 12, 3, 14, 'July', 'Online Class', 'Tute 03', '850920.pdf', '2022-07-19 16:25:11', 1);

-- --------------------------------------------------------

--
-- Table structure for table `lmsclass_schlmsle`
--

CREATE TABLE `lmsclass_schlmsle` (
  `classid` int NOT NULL,
  `level` int NOT NULL,
  `subject` int NOT NULL,
  `tealmsr` varchar(50) NOT NULL,
  `lesson` varchar(1000) NOT NULL,
  `classdate` date NOT NULL,
  `class_start_time` time NOT NULL,
  `class_end_time` time NOT NULL,
  `classlink` text NOT NULL,
  `cpassword` varchar(100) NOT NULL,
  `classtype` varchar(20) NOT NULL,
  `image` varchar(500) NOT NULL,
  `add_date` varchar(20) NOT NULL,
  `classstatus` varchar(20) NOT NULL,
  `add_date2` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lmsclass_schlmsle`
--

INSERT INTO `lmsclass_schlmsle` (`classid`, `level`, `subject`, `tealmsr`, `lesson`, `classdate`, `class_start_time`, `class_end_time`, `classlink`, `cpassword`, `classtype`, `image`, `add_date`, `classstatus`, `add_date2`) VALUES
(1, 3, 14, '12', 'Lesson 01', '2022-07-27', '18:00:00', '20:00:00', 'https://us06web.zoom.us/j/85774668516', '12345', 'Free Class', '1658458946Chaminda_copy.jpg', '2022-07-22 08:32:26', '1', '2022-07-22 03:02:26'),
(2, 3, 15, '13', 'Lesson 01', '2022-07-31', '16:00:00', '18:00:00', 'https://us06web.zoom.us/j/85774668516', '12345', 'Free Class', '1658458925Nilanthi_copy.jpg', '2022-07-22 08:32:05', '1', '2022-07-22 03:02:05'),
(7, 3, 14, '12', 'Lesson 03', '2022-07-19', '19:35:00', '21:35:00', 'https://us06web.zoom.us/j/85774668516', '12345', 'Online Class', '1658458855Chaminda_copy.jpg', '2022-07-22 08:30:55', '1', '2022-07-22 03:00:55'),
(4, 3, 15, '13', 'lesson 02', '2022-07-26', '16:00:00', '18:00:00', 'https://us06web.zoom.us/j/85774668516', '12345', 'Online Class', '1658458908Nilanthi_copy.jpg', '2022-07-22 08:31:48', '1', '2022-07-22 03:01:48'),
(5, 3, 14, '12', 'lesson 03', '2022-07-25', '18:00:00', '20:00:00', 'https://us06web.zoom.us/j/85774668516', '12345', 'Paper Class', '1658458892Chaminda_copy.jpg', '2022-07-22 08:31:32', '1', '2022-07-22 03:01:32'),
(6, 3, 15, '13', 'lesson 03', '2022-07-30', '18:00:00', '20:00:00', 'https://us06web.zoom.us/j/85774668516', '12345', 'Paper Class', '1658458876Nilanthi_copy.jpg', '2022-07-22 08:31:16', '1', '2022-07-22 03:01:16');

-- --------------------------------------------------------

--
-- Table structure for table `lmscomments`
--

CREATE TABLE `lmscomments` (
  `id` int NOT NULL,
  `uid` int NOT NULL,
  `tealmsr` int NOT NULL,
  `title` varchar(200) NOT NULL,
  `rate` int NOT NULL,
  `review` text NOT NULL,
  `add_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lmscomments`
--

INSERT INTO `lmscomments` (`id`, `uid`, `tealmsr`, `title`, `rate`, `review`, `add_date`, `status`) VALUES
(42, 1, 12, 'Test', 3, 'Good', '2022-07-19 10:58:12', '1'),
(45, 10, 12, 'Test', 3, 'Good', '2022-07-21 07:40:27', '1');

-- --------------------------------------------------------

--
-- Table structure for table `lmsdb`
--

CREATE TABLE `lmsdb` (
  `id` int NOT NULL,
  `dbname` varchar(400) NOT NULL,
  `username` varchar(400) NOT NULL,
  `password` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lmsdb`
--

INSERT INTO `lmsdb` (`id`, `dbname`, `username`, `password`) VALUES
(1, 'atlas-lms', 'root', 'rDG&qXXUL6z8');

-- --------------------------------------------------------

--
-- Table structure for table `lmsebook`
--

CREATE TABLE `lmsebook` (
  `ctuid` int NOT NULL,
  `tid` int NOT NULL,
  `class` int NOT NULL,
  `subject` int NOT NULL,
  `month` varchar(50) NOT NULL,
  `ctype` varchar(50) NOT NULL,
  `title` text NOT NULL,
  `tdocument` varchar(500) NOT NULL,
  `add_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lmsgallery`
--

CREATE TABLE `lmsgallery` (
  `id` int NOT NULL,
  `image` varchar(500) NOT NULL,
  `add_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lmsgetway`
--

CREATE TABLE `lmsgetway` (
  `id` int NOT NULL,
  `app_id` varchar(4000) NOT NULL,
  `hash_salt` varchar(4000) NOT NULL,
  `a_token` varchar(4000) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lmsgetway`
--

INSERT INTO `lmsgetway` (`id`, `app_id`, `hash_salt`, `a_token`) VALUES
(1, 'O3RP1189E0E4B71049D0F', '3PP41189E0E4B71049D3B', 'ec18f1ad505692f18d988fc3bd55ff923f514609cc0260b59f313a8b45a9815b8f358981a0f48bbf.IOD11189E0E4B71049D5F');

-- --------------------------------------------------------

--
-- Table structure for table `lmslesson`
--

CREATE TABLE `lmslesson` (
  `lid` int NOT NULL,
  `tid` int NOT NULL,
  `type` varchar(50) NOT NULL,
  `class` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `title` varchar(500) NOT NULL,
  `available_days` varchar(100) NOT NULL,
  `no_of_views_per_day` int NOT NULL,
  `cover` varchar(500) NOT NULL,
  `video` varchar(1000) NOT NULL,
  `add_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lmslesson`
--

INSERT INTO `lmslesson` (`lid`, `tid`, `type`, `class`, `subject`, `title`, `available_days`, `no_of_views_per_day`, `cover`, `video`, `add_date`, `status`) VALUES
(730, 12, 'Free', '3', '14', 'Video 01', '10', 10, '688290.jpg', 'W9ilpu0V3Z8', '2022-07-22 08:32:46', 1),
(731, 13, 'Free', '3', '15', 'Video 01 ', '10', 10, '59854.jpg', '6bVjs6POWYI', '2022-07-22 08:32:59', 1),
(732, 12, 'Paid', '3', '14', 'Video 02', '10', 10, '182543.jpg', '6bVjs6POWYI', '2022-07-22 08:33:13', 1),
(733, 13, 'Paid', '3', '15', 'Video 02', '10', 10, '685367.jpg', '6bVjs6POWYI', '2022-07-22 08:33:28', 1);

-- --------------------------------------------------------

--
-- Table structure for table `lmsmail`
--

CREATE TABLE `lmsmail` (
  `mid` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `message` varchar(500) NOT NULL,
  `add_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lmsonlineexams`
--

CREATE TABLE `lmsonlineexams` (
  `exid` int NOT NULL,
  `tid` int NOT NULL,
  `class` varchar(400) NOT NULL,
  `subject` int NOT NULL,
  `examname` varchar(200) NOT NULL,
  `edate` datetime NOT NULL,
  `exam_end_date` datetime NOT NULL,
  `starttime` time DEFAULT NULL,
  `endtime` time DEFAULT NULL,
  `edocument` varchar(500) NOT NULL,
  `quizcount` int NOT NULL,
  `add_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lmsonlineexams`
--

INSERT INTO `lmsonlineexams` (`exid`, `tid`, `class`, `subject`, `examname`, `edate`, `exam_end_date`, `starttime`, `endtime`, `edocument`, `quizcount`, `add_date`, `status`) VALUES
(3, 12, '3', 14, 'exam 01', '2022-07-19 20:57:00', '2022-07-26 20:57:00', NULL, NULL, '598375.pdf', 5, '2022-07-19 15:28:45', 1);

-- --------------------------------------------------------

--
-- Table structure for table `lmspayment`
--

CREATE TABLE `lmspayment` (
  `pid` int NOT NULL,
  `fileName` varchar(50) DEFAULT NULL,
  `userID` int NOT NULL,
  `feeID` int NOT NULL,
  `pay_sub_id` int NOT NULL,
  `amount` float NOT NULL,
  `accountnumber` varchar(50) NOT NULL DEFAULT '0',
  `bank` varchar(100) NOT NULL,
  `branch` varchar(100) NOT NULL DEFAULT 'Online Class',
  `paymentMethod` varchar(20) NOT NULL,
  `created_at` datetime NOT NULL,
  `expiredate` date NOT NULL,
  `session_id` varchar(20) NOT NULL DEFAULT '0',
  `status` int NOT NULL,
  `order_status` int NOT NULL DEFAULT '0',
  `pay_month` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lmspayment`
--

INSERT INTO `lmspayment` (`pid`, `fileName`, `userID`, `feeID`, `pay_sub_id`, `amount`, `accountnumber`, `bank`, `branch`, `paymentMethod`, `created_at`, `expiredate`, `session_id`, `status`, `order_status`, `pay_month`) VALUES
(1, NULL, 1, 12, 14, 500, '0', 'Pay bank', 'Online Class', 'Manual', '2022-07-18 15:37:57', '2022-07-31', '0', 1, 0, '2022-07-01'),
(2, 'MbSq7nFjVP.jpg', 2, 12, 14, 500, '0', 'Pay Bank', 'Online Class', 'Bank', '2022-07-18 18:41:31', '2022-07-31', '0', 1, 0, '2022-07-01'),
(3, 'UaIcGYx05T.jpeg', 3, 13, 15, 500, '0', 'Pay Bank', 'Online Class', 'Bank', '2022-07-18 21:09:46', '2022-07-31', '0', 1, 0, '2022-07-01'),
(4, 'MEW7whsPZb.jpg', 3, 12, 14, 500, '0', 'Pay Bank', 'Online Class', 'Bank', '2022-07-19 08:53:10', '2022-07-31', '0', 1, 0, '2022-07-01'),
(5, 'jFkufn7D2G.jpeg', 4, 13, 15, 500, '0', 'Pay Bank', 'Online Class', 'Bank', '2022-07-19 14:35:39', '2022-07-31', '0', 1, 0, '2022-07-01'),
(6, '', 5, 12, 14, 150, '0', 'Pay Online', 'Online Class', 'Card', '2022-07-19 20:29:36', '2022-07-31', '0', 1, 1, '2022-07-01'),
(7, 'jFz34RuJLu.png', 5, 13, 15, 500, '0', 'Pay Bank', 'Online Class', 'Bank', '2022-07-19 20:43:48', '2022-07-31', '0', 2, 0, '2022-07-01'),
(8, NULL, 5, 13, 15, 500, '0', 'Pay bank', 'Online Class', 'Manual', '2022-07-19 20:54:19', '2022-07-31', '0', 1, 0, '2022-07-01'),
(9, 'uKMkV4mj3l.png', 6, 12, 14, 150, '0', 'Pay Bank', 'Online Class', 'Bank', '2022-07-19 22:41:54', '2022-07-31', '0', 2, 0, '2022-07-01'),
(10, 'cZY2VUvJCB.png', 9, 12, 14, 150, '0', 'Pay Bank', 'Online Class', 'Bank', '2022-07-20 13:29:24', '2022-07-31', '0', 1, 0, '2022-07-01'),
(11, 'v76RnagBJX.jpg', 10, 12, 14, 150, '0', 'Pay Bank', 'Online Class', 'Bank', '2022-07-21 13:00:31', '2022-07-31', '0', 1, 0, '2022-07-01');

-- --------------------------------------------------------

--
-- Table structure for table `lmsregister`
--

CREATE TABLE `lmsregister` (
  `reid` int NOT NULL,
  `stnumber` varchar(200) NOT NULL,
  `email` varchar(400) NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `dob` varchar(400) NOT NULL,
  `gender` varchar(200) NOT NULL,
  `school` varchar(400) NOT NULL,
  `district` varchar(200) NOT NULL,
  `town` varchar(400) DEFAULT NULL,
  `pcontactnumber` varchar(20) DEFAULT NULL,
  `pemail` varchar(200) DEFAULT NULL,
  `pname` varchar(4000) DEFAULT NULL,
  `contactnumber` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `level` int NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(500) NOT NULL,
  `add_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` varchar(20) NOT NULL,
  `ip_address` varchar(20) NOT NULL,
  `relogin` int NOT NULL,
  `reloging_ip` int NOT NULL,
  `payment` int NOT NULL,
  `verifycode` varchar(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lmsregister`
--

INSERT INTO `lmsregister` (`reid`, `stnumber`, `email`, `fullname`, `dob`, `gender`, `school`, `district`, `town`, `pcontactnumber`, `pemail`, `pname`, `contactnumber`, `address`, `level`, `password`, `image`, `add_date`, `status`, `ip_address`, `relogin`, `reloging_ip`, `payment`, `verifycode`) VALUES
(10, 'ATL-81061', 'sumudupramuditha@gmail.com', 'Pramuditha Jayarathna', '2015-06-24', 'male', 'Testing', 'Colombo', 'Anamaduwa', '765803636', 'sumudupramuditha@gmail.com', 'test', '773853994', 'Anamaduwa', 3, '12bce374e7be15142e8172f668da00d8', '1658388590Time_table-01_(1).jpg', '2022-07-21 07:29:50', '1', '', 0, 0, 0, ''),
(3, 'ATL-11268', 'ransi@yogeemedia.com', 'Yogee Meida', '2022-03-16', 'male', 'Sample College', 'Colombo', 'Sample City', '764002007', 'sample12@gmail.com', 'sample name', '705588778', 'Sample Address Line 1', 3, '25d55ad283aa400af464c76d713c07ad', '', '2022-07-18 15:29:53', '1', '', 0, 0, 0, ''),
(4, 'ATL-11880', 'admin', 'bhanu', '2022-07-08', 'male', 'Sample College', 'Colombo', 'Sample City', '123456789', 'sample11@gmail.com', 'sample name', '774002008', 'Sample Address Line 1', 3, 'bc960478ecb50a72b71a057081e92b0b', '', '2022-07-19 08:59:54', '1', '', 0, 0, 0, ''),
(11, 'ATL-28882', 'charith.y@atlasaxillia.com', 'Charith Test', '2022-07-20', 'male', 'Test', 'Ampara', 'Test', '778781177', 'charith01yashoda@gmail.com', 'Test', '778781177', 'Test', 3, 'e807f1fcf82d132f9bb018ca6738a19f', '', '2022-07-22 07:18:54', '1', '', 0, 0, 0, ''),
(7, 'ATL-49833', 'ransiluw@gmail.com', 'Yogee Media T', '2022-07-13', 'male', 'Test', 'Colombo', 'Nugegoda', '765303051', 'ransi@gmail.com', 'Aaaa', '764002007', 'Aaa', 3, '25d55ad283aa400af464c76d713c07ad', '', '2022-07-20 04:59:17', '1', '', 0, 0, 0, ''),
(8, 'ATL-85307', 'admin', 'Kasun Yogeemedia', '2022-07-01', 'male', 'Sample College', 'Gampaha', 'Sample City', '123456789', 'sample12@gmail.com', 'sample name', '754694764', 'Sample Address Line 1', 3, 'd54d1702ad0f8326224b817c796763c9', '', '2022-07-20 07:53:46', '1', '', 0, 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `lmsrequest_relogin`
--

CREATE TABLE `lmsrequest_relogin` (
  `relog_id` int NOT NULL,
  `relog_user` int NOT NULL,
  `relog_status` int NOT NULL,
  `req_ip_add` varchar(255) NOT NULL,
  `relog_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lmsreq_subject`
--

CREATE TABLE `lmsreq_subject` (
  `sub_req_id` int NOT NULL,
  `sub_req_reg_no` varchar(50) NOT NULL,
  `sub_req_sub_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lmsreq_subject`
--

INSERT INTO `lmsreq_subject` (`sub_req_id`, `sub_req_reg_no`, `sub_req_sub_id`) VALUES
(5, '705588778', 14),
(6, '705588778', 15),
(7, '774002008', 14),
(8, '774002008', 15),
(12, '764002007', 14),
(13, '764002007', 15),
(14, '754694764', 14),
(15, '754694764', 15),
(18, '773853994', 14),
(19, '773853994', 15),
(20, '778781177', 14),
(21, '778781177', 15);

-- --------------------------------------------------------

--
-- Table structure for table `lmssms`
--

CREATE TABLE `lmssms` (
  `id` int NOT NULL,
  `sa_token` varchar(4000) NOT NULL,
  `sender_id` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lmssms`
--

INSERT INTO `lmssms` (`id`, `sa_token`, `sender_id`) VALUES
(1, '27|reicnWZOqu6gH96YONqqrkKp8F7ilNPOp5nREtjP', ' Atlas Learn ');

-- --------------------------------------------------------

--
-- Table structure for table `lmsstudent_subject`
--

CREATE TABLE `lmsstudent_subject` (
  `ssid` int NOT NULL,
  `student` int NOT NULL DEFAULT '0',
  `subject` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lmssubject`
--

CREATE TABLE `lmssubject` (
  `sid` int NOT NULL,
  `class_id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` float NOT NULL,
  `fees_valid_period` varchar(20) NOT NULL,
  `add_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lmssubject`
--

INSERT INTO `lmssubject` (`sid`, `class_id`, `name`, `price`, `fees_valid_period`, `add_date`, `status`) VALUES
(14, 3, 'Scholarship Seminar - (Chaminda Sir)', 150, '30', '2022-07-19 13:08:17', 'Publish'),
(15, 3, 'scholarship seminar - (Nilanthi Mis)', 500, '30', '2022-07-18 09:16:03', 'Publish'),
(16, 3, 'Sinhala - Chaminda Sir', 500, '30', '2022-07-22 07:32:31', 'Publish');

-- --------------------------------------------------------

--
-- Table structure for table `lmssubject_tealmsr`
--

CREATE TABLE `lmssubject_tealmsr` (
  `stid` int NOT NULL,
  `subject` int NOT NULL DEFAULT '0',
  `tealmsr` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lmstealmsr`
--

CREATE TABLE `lmstealmsr` (
  `tid` int NOT NULL,
  `systemid` int NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `contactnumber` varchar(50) NOT NULL,
  `subdetails` varchar(100) NOT NULL,
  `qualification` text NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  `image` varchar(500) NOT NULL,
  `Percentage` float NOT NULL,
  `add_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lmstealmsr`
--

INSERT INTO `lmstealmsr` (`tid`, `systemid`, `fullname`, `address`, `contactnumber`, `subdetails`, `qualification`, `username`, `password`, `image`, `Percentage`, `add_date`, `status`) VALUES
(12, 1658135781, 'Chaminda Liyanaarachchi', 'Mathara', '765803636', 'Atlas Learn', 'Principal', 'sumudupramuditha@gmail.com', '2e9fec30e25d265adaf0c454793e3014', '1658463335Chaminda_copy.jpg', 60, '2022-07-22 07:32:49', 1),
(13, 1658135903, 'Nilanthi Hapuarachchi', 'Piliyandala', '771442428', 'Atlas Learn', 'Teacher Advisor', 'sumudupramuditha@gmail.com', '51d27af68f7124357e191a5c9f114642', '1658463357Nilanthi_copy.jpg', 60, '2022-07-22 04:15:57', 1);

-- --------------------------------------------------------

--
-- Table structure for table `lmstealmsr_multiple`
--

CREATE TABLE `lmstealmsr_multiple` (
  `tealmsr_id` int NOT NULL,
  `tealmsr_system_id` int NOT NULL,
  `tealmsr_type` int NOT NULL,
  `tealmsr_contain_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lmstealmsr_multiple`
--

INSERT INTO `lmstealmsr_multiple` (`tealmsr_id`, `tealmsr_system_id`, `tealmsr_type`, `tealmsr_contain_id`) VALUES
(13, 1658135903, 2, 3),
(14, 1658135903, 3, 15),
(15, 1658135781, 2, 3),
(16, 1658135781, 3, 14),
(17, 1658135781, 3, 16);

-- --------------------------------------------------------

--
-- Table structure for table `lmsurl`
--

CREATE TABLE `lmsurl` (
  `id` int NOT NULL,
  `url` varchar(4000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lmsurl`
--

INSERT INTO `lmsurl` (`id`, `url`) VALUES
(1, 'https://atlaslearn.lk/lms');

-- --------------------------------------------------------

--
-- Table structure for table `lmsusers`
--

CREATE TABLE `lmsusers` (
  `user_id` int NOT NULL,
  `user_name` varchar(15) NOT NULL,
  `user_email` varchar(40) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `admintype` varchar(20) NOT NULL,
  `admin` varchar(20) NOT NULL,
  `students` varchar(20) NOT NULL,
  `teachers` varchar(20) NOT NULL,
  `class` varchar(20) NOT NULL,
  `subject` varchar(20) NOT NULL,
  `lesson` varchar(20) NOT NULL,
  `payments` varchar(20) NOT NULL,
  `class_schedule` varchar(20) NOT NULL,
  `mail` varchar(20) NOT NULL,
  `joining_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lmsusers`
--

INSERT INTO `lmsusers` (`user_id`, `user_name`, `user_email`, `user_pass`, `admintype`, `admin`, `students`, `teachers`, `class`, `subject`, `lesson`, `payments`, `class_schedule`, `mail`, `joining_date`, `status`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$10$PO1NRNtexDZlefvtOw/ELe6T/uwDBkpt7JUnMoaS9O1QkDkDJILBa', 'Super Admin', 'True', 'True', 'True', 'True', 'True', 'True', 'True', 'True', 'True', '2022-02-09 03:43:58', '1');

-- --------------------------------------------------------

--
-- Table structure for table `lms_answer`
--

CREATE TABLE `lms_answer` (
  `lms_answer_id` int NOT NULL,
  `lms_answer_user` int NOT NULL,
  `lms_answer_paper` int NOT NULL,
  `lms_answer_q` int NOT NULL,
  `lms_answer_a` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lms_answer`
--

INSERT INTO `lms_answer` (`lms_answer_id`, `lms_answer_user`, `lms_answer_paper`, `lms_answer_q`, `lms_answer_a`) VALUES
(1, 1, 2, 2, 2),
(2, 2, 4, 4, 3),
(3, 3, 3, 3, 1),
(4, 5, 3, 3, 2),
(5, 5, 1, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `lms_exam_details`
--

CREATE TABLE `lms_exam_details` (
  `lms_exam_id` int NOT NULL,
  `lms_exam_add_user` int NOT NULL,
  `lms_exam_system_id` int NOT NULL,
  `lms_exam_name` varchar(255) NOT NULL,
  `lms_exam_subject` int NOT NULL,
  `lms_exam_question` int NOT NULL,
  `lms_exam_time_duration` int NOT NULL,
  `lms_exam_start_time` datetime NOT NULL,
  `lms_exam_end_time` datetime NOT NULL,
  `lms_exam_add_time` datetime NOT NULL,
  `lms_exam_pay_type` int NOT NULL COMMENT '1=pay, 0=free'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lms_exam_details`
--

INSERT INTO `lms_exam_details` (`lms_exam_id`, `lms_exam_add_user`, `lms_exam_system_id`, `lms_exam_name`, `lms_exam_subject`, `lms_exam_question`, `lms_exam_time_duration`, `lms_exam_start_time`, `lms_exam_end_time`, `lms_exam_add_time`, `lms_exam_pay_type`) VALUES
(6, 12, 1658459759, 'Exam 01', 14, 1, 1, '2022-07-22 08:45:00', '2022-07-29 08:45:00', '2022-07-22 08:45:59', 0),
(7, 12, 1658460103, 'Exam 01', 14, 1, 1, '2022-07-22 08:51:00', '2022-07-29 08:54:00', '2022-07-22 08:51:43', 1);

-- --------------------------------------------------------

--
-- Table structure for table `lms_exam_report`
--

CREATE TABLE `lms_exam_report` (
  `lms_report_id` int NOT NULL,
  `exam_report_user` int NOT NULL,
  `exam_report_paper` int NOT NULL,
  `exam_report_faced` int NOT NULL,
  `exam_report_corect` int NOT NULL,
  `exam_report_percent` int NOT NULL,
  `exam_report_complet_time` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lms_exam_report`
--

INSERT INTO `lms_exam_report` (`lms_report_id`, `exam_report_user`, `exam_report_paper`, `exam_report_faced`, `exam_report_corect`, `exam_report_percent`, `exam_report_complet_time`) VALUES
(1, 1, 2, 1, 0, 0, '2022-07-18 15:53:34'),
(2, 2, 4, 1, 0, 0, '2022-07-18 19:10:25'),
(3, 3, 3, 1, 0, 0, '2022-07-18 21:12:19'),
(4, 5, 3, 1, 1, 100, '2022-07-19 20:34:25'),
(5, 5, 1, 1, 0, 0, '2022-07-19 20:34:53');

-- --------------------------------------------------------

--
-- Table structure for table `lms_mcq_questions`
--

CREATE TABLE `lms_mcq_questions` (
  `id` int NOT NULL,
  `exam_id` int NOT NULL,
  `question` text NOT NULL,
  `ans_1` text NOT NULL,
  `ans_2` text NOT NULL,
  `ans_3` text NOT NULL,
  `ans_4` text NOT NULL,
  `ans` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lms_mcq_questions`
--

INSERT INTO `lms_mcq_questions` (`id`, `exam_id`, `question`, `ans_1`, `ans_2`, `ans_3`, `ans_4`, `ans`) VALUES
(1, 1, '<p>01</p>\r\n', '1', '2', '3', '4', 4),
(2, 2, '<p>02</p>\r\n', '1', '2', '3', '4', 3),
(3, 3, '<p>03</p>\r\n', '1', '2', '3', '4', 2),
(4, 4, '<p>04</p>\r\n', '1', '2', '3', '4', 1),
(5, 5, '<p>Test</p>\r\n', '1', '2', '3', '4', 3),
(6, 6, '<p>Obage gama kumakda</p>\r\n', 'kelaniya', 'kiribathgoda', 'Gampaha', 'Minuwangoda', 3),
(7, 7, '<p>1</p>\r\n', '1', '2', '3', '4', 3);

-- --------------------------------------------------------

--
-- Table structure for table `lms_teacher_payment_history`
--

CREATE TABLE `lms_teacher_payment_history` (
  `lms_teacher_payment_history_id` int NOT NULL,
  `lms_teacher_payment_history_tid` int NOT NULL,
  `lms_teacher_payment_company_amount` float NOT NULL,
  `lms_teacher_payment_history_amount` float NOT NULL,
  `lms_teacher_payment_history_time` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `paper_image`
--

CREATE TABLE `paper_image` (
  `pi_id` int NOT NULL,
  `pi_exam_id` int NOT NULL,
  `pi_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `paper_marks`
--

CREATE TABLE `paper_marks` (
  `mid` int NOT NULL,
  `exam_id` int NOT NULL,
  `user_id` int NOT NULL,
  `quizno` tinyint NOT NULL,
  `answerstatus` tinyint(1) NOT NULL,
  `add_date` datetime NOT NULL,
  `status` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int NOT NULL,
  `reg_prefix` varchar(3) NOT NULL,
  `application_name` varchar(400) NOT NULL,
  `main_logo` varchar(4000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `reg_prefix`, `application_name`, `main_logo`) VALUES
(1, 'ATL', 'Atlas-Learn', 'atlaslogo.png');

-- --------------------------------------------------------

--
-- Table structure for table `user_attandance`
--

CREATE TABLE `user_attandance` (
  `id` int NOT NULL,
  `userid` int NOT NULL,
  `subjectid` int NOT NULL,
  `lid` int NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `exam_submissions`
--
ALTER TABLE `exam_submissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lmsclass`
--
ALTER TABLE `lmsclass`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `lmsclasstute`
--
ALTER TABLE `lmsclasstute`
  ADD PRIMARY KEY (`ctuid`);

--
-- Indexes for table `lmsclass_schlmsle`
--
ALTER TABLE `lmsclass_schlmsle`
  ADD PRIMARY KEY (`classid`);

--
-- Indexes for table `lmscomments`
--
ALTER TABLE `lmscomments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lmsdb`
--
ALTER TABLE `lmsdb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lmsebook`
--
ALTER TABLE `lmsebook`
  ADD PRIMARY KEY (`ctuid`);

--
-- Indexes for table `lmsgallery`
--
ALTER TABLE `lmsgallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lmsgetway`
--
ALTER TABLE `lmsgetway`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lmslesson`
--
ALTER TABLE `lmslesson`
  ADD PRIMARY KEY (`lid`);

--
-- Indexes for table `lmsmail`
--
ALTER TABLE `lmsmail`
  ADD PRIMARY KEY (`mid`);

--
-- Indexes for table `lmsonlineexams`
--
ALTER TABLE `lmsonlineexams`
  ADD PRIMARY KEY (`exid`);

--
-- Indexes for table `lmspayment`
--
ALTER TABLE `lmspayment`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `lmsregister`
--
ALTER TABLE `lmsregister`
  ADD PRIMARY KEY (`reid`),
  ADD UNIQUE KEY `contactnumber` (`contactnumber`),
  ADD UNIQUE KEY `fullname` (`fullname`);

--
-- Indexes for table `lmsrequest_relogin`
--
ALTER TABLE `lmsrequest_relogin`
  ADD PRIMARY KEY (`relog_id`);

--
-- Indexes for table `lmsreq_subject`
--
ALTER TABLE `lmsreq_subject`
  ADD PRIMARY KEY (`sub_req_id`);

--
-- Indexes for table `lmssms`
--
ALTER TABLE `lmssms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lmsstudent_subject`
--
ALTER TABLE `lmsstudent_subject`
  ADD PRIMARY KEY (`ssid`);

--
-- Indexes for table `lmssubject`
--
ALTER TABLE `lmssubject`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `lmssubject_tealmsr`
--
ALTER TABLE `lmssubject_tealmsr`
  ADD PRIMARY KEY (`stid`);

--
-- Indexes for table `lmstealmsr`
--
ALTER TABLE `lmstealmsr`
  ADD PRIMARY KEY (`tid`);

--
-- Indexes for table `lmstealmsr_multiple`
--
ALTER TABLE `lmstealmsr_multiple`
  ADD PRIMARY KEY (`tealmsr_id`);

--
-- Indexes for table `lmsurl`
--
ALTER TABLE `lmsurl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lmsusers`
--
ALTER TABLE `lmsusers`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `lms_answer`
--
ALTER TABLE `lms_answer`
  ADD PRIMARY KEY (`lms_answer_id`);

--
-- Indexes for table `lms_exam_details`
--
ALTER TABLE `lms_exam_details`
  ADD PRIMARY KEY (`lms_exam_id`);

--
-- Indexes for table `lms_exam_report`
--
ALTER TABLE `lms_exam_report`
  ADD PRIMARY KEY (`lms_report_id`);

--
-- Indexes for table `lms_mcq_questions`
--
ALTER TABLE `lms_mcq_questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lms_teacher_payment_history`
--
ALTER TABLE `lms_teacher_payment_history`
  ADD PRIMARY KEY (`lms_teacher_payment_history_id`);

--
-- Indexes for table `paper_image`
--
ALTER TABLE `paper_image`
  ADD PRIMARY KEY (`pi_id`);

--
-- Indexes for table `paper_marks`
--
ALTER TABLE `paper_marks`
  ADD PRIMARY KEY (`mid`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_attandance`
--
ALTER TABLE `user_attandance`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `exam_submissions`
--
ALTER TABLE `exam_submissions`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lmsclass`
--
ALTER TABLE `lmsclass`
  MODIFY `cid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `lmsclasstute`
--
ALTER TABLE `lmsclasstute`
  MODIFY `ctuid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `lmsclass_schlmsle`
--
ALTER TABLE `lmsclass_schlmsle`
  MODIFY `classid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `lmscomments`
--
ALTER TABLE `lmscomments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `lmsdb`
--
ALTER TABLE `lmsdb`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `lmsebook`
--
ALTER TABLE `lmsebook`
  MODIFY `ctuid` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lmsgallery`
--
ALTER TABLE `lmsgallery`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lmsgetway`
--
ALTER TABLE `lmsgetway`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `lmslesson`
--
ALTER TABLE `lmslesson`
  MODIFY `lid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=734;

--
-- AUTO_INCREMENT for table `lmsmail`
--
ALTER TABLE `lmsmail`
  MODIFY `mid` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lmsonlineexams`
--
ALTER TABLE `lmsonlineexams`
  MODIFY `exid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `lmspayment`
--
ALTER TABLE `lmspayment`
  MODIFY `pid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `lmsregister`
--
ALTER TABLE `lmsregister`
  MODIFY `reid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `lmsrequest_relogin`
--
ALTER TABLE `lmsrequest_relogin`
  MODIFY `relog_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lmsreq_subject`
--
ALTER TABLE `lmsreq_subject`
  MODIFY `sub_req_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `lmssms`
--
ALTER TABLE `lmssms`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `lmsstudent_subject`
--
ALTER TABLE `lmsstudent_subject`
  MODIFY `ssid` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lmssubject`
--
ALTER TABLE `lmssubject`
  MODIFY `sid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `lmssubject_tealmsr`
--
ALTER TABLE `lmssubject_tealmsr`
  MODIFY `stid` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lmstealmsr`
--
ALTER TABLE `lmstealmsr`
  MODIFY `tid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `lmstealmsr_multiple`
--
ALTER TABLE `lmstealmsr_multiple`
  MODIFY `tealmsr_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `lmsurl`
--
ALTER TABLE `lmsurl`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `lmsusers`
--
ALTER TABLE `lmsusers`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `lms_answer`
--
ALTER TABLE `lms_answer`
  MODIFY `lms_answer_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `lms_exam_details`
--
ALTER TABLE `lms_exam_details`
  MODIFY `lms_exam_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `lms_exam_report`
--
ALTER TABLE `lms_exam_report`
  MODIFY `lms_report_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `lms_mcq_questions`
--
ALTER TABLE `lms_mcq_questions`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `lms_teacher_payment_history`
--
ALTER TABLE `lms_teacher_payment_history`
  MODIFY `lms_teacher_payment_history_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `paper_image`
--
ALTER TABLE `paper_image`
  MODIFY `pi_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `paper_marks`
--
ALTER TABLE `paper_marks`
  MODIFY `mid` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_attandance`
--
ALTER TABLE `user_attandance`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
