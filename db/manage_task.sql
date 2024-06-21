-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 01, 2024 at 01:56 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `manage_task`
--

-- --------------------------------------------------------

--
-- Table structure for table `budget`
--

CREATE TABLE `budget` (
  `bud_id` int(11) NOT NULL,
  `bud_name` varchar(255) NOT NULL,
  `bud_type` varchar(255) NOT NULL,
  `bud_amount` int(100) NOT NULL,
  `bud_date` date NOT NULL,
  `bud_remark` varchar(255) NOT NULL,
  `bud_stat` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `budget`
--

INSERT INTO `budget` (`bud_id`, `bud_name`, `bud_type`, `bud_amount`, `bud_date`, `bud_remark`, `bud_stat`) VALUES
(11, 'dd', 'hardwares', 85, '2024-01-17', '45', 1),
(12, 'subrata', 'foods', 2222, '2024-01-17', 'subrata remark', 1),
(13, 'name3', 'foods', 555, '2024-01-13', 'remark\r\n', 1),
(14, 'name4', 'electronics', 100, '2024-01-17', 'ghghh', 1),
(15, 'name5', 'stationary', 636, '2024-01-17', '4582', 1),
(16, 'name_exp', 'hardwares', 500, '2023-12-13', 'remark', 1),
(17, 'exp', 'foods', 50, '2024-01-15', 'hhgghgg', 1),
(18, 'd', 'foods', 500, '2024-01-19', 'food expenses', 1),
(19, 'h', 'hardwares', 3, '2024-01-19', '5', 1),
(20, 'fbfggtg', 'hardwares', 78, '2024-01-19', '45', 1),
(21, 'tt', 'hardwares', 20, '2024-01-19', 'tt', 1);

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` int(11) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `course_fees` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `course_name`, `course_fees`) VALUES
(1, 'c 1', 5000),
(2, 'c 2', 4000),
(3, 'c 3', 6000),
(4, 'c 4', 7000),
(5, 'web_html', 1800);

-- --------------------------------------------------------

--
-- Table structure for table `income`
--

CREATE TABLE `income` (
  `inc_id` int(11) NOT NULL,
  `inc_name` varchar(255) NOT NULL,
  `inc_type` varchar(255) NOT NULL,
  `inc_amount` int(255) NOT NULL,
  `inc_date` date NOT NULL,
  `inc_remark` varchar(255) NOT NULL,
  `inc_stat` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `income`
--

INSERT INTO `income` (`inc_id`, `inc_name`, `inc_type`, `inc_amount`, `inc_date`, `inc_remark`, `inc_stat`) VALUES
(1, 'first', 'product1', 200, '2024-01-20', 'remark', 1),
(2, 'name', 'product1', 455, '2023-10-11', 'remark', 1),
(3, 'name1', 'product2', 11111, '2023-12-20', 'remark1', 1),
(4, 'hey', 'hey1', 1111, '2024-01-20', 'hey', 1);

-- --------------------------------------------------------

--
-- Table structure for table `option_for`
--

CREATE TABLE `option_for` (
  `option_id` int(11) NOT NULL,
  `option_name` varchar(255) NOT NULL,
  `options_list` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `option_for`
--

INSERT INTO `option_for` (`option_id`, `option_name`, `options_list`) VALUES
(1, 'expenses', 'stationary,hardwares,electronics,foods'),
(2, 'income', 'product1,product2,hey1,course_fee'),
(3, 'shortcut', '{\"addsh\": \"Addtask\", \"addex\": \"Addexpenses\", \"addin\": \"Addincome\", \"expda\": \"Expensesdashboard\", \"incda\": \"Incomedashboard\", \"expca\": \"Allexpenses\", \"incca\": \"Allincome\"}'),
(4, 'batch', '{\"yy\":[\"test\",\"c 1,c 2,c 3\",\"2024-01-24\",\"12:04\",\"16:04\"],\"kk\":[\"ll\",\"c 1\",\"2024-01-11\",\"15:06\",\"15:07\"],\"web batch\":[\"web batch\",\"web_html\",\"2024-02-04\",\"11:05\",\"15:05\"],\"0\":[\"batch new\",\"web_html\",\"2024-02-02\",\"19:07\",\"23:04\"],\"1\":[\"batc new4\",\"c 1,c 2,c 3,c 4,web_html\",\"2024-02-10\",\"16:05\",\"18:06\"],\"batch final\":[\"batch final\",\"web_html\",\"2024-02-05\",\"16:09\",\"18:09\"]}'),
(5, 'payment_method', 'Cash,UPI,PAYTM,CARD');

-- --------------------------------------------------------

--
-- Table structure for table `scope`
--

CREATE TABLE `scope` (
  `role_id` int(11) NOT NULL,
  `role` varchar(225) NOT NULL,
  `role_scope` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `scope`
--

INSERT INTO `scope` (`role_id`, `role`, `role_scope`) VALUES
(1, 'employee', '{\"task\":[\"view\"],\"student\":[\"Add Student\",\"Add Payment\"]}'),
(2, 'manager', '{\"manager\":[\"deleteTask\",\"Assigned Sheets To You\",\"Assigned Sheet To Employee\"],\"task\":[\"view\",\"editTask\",\"Add Task\",\"addTask\",\"add_Task\",\"Assignedsheettoemployee\",\"deleteTask\"],\"student\":[\"Add Student\",\"Add Payment\"]}'),
(3, 'admin', '{\r\n    \"admin\": {\r\n        \"index\":{\r\n            \"display\":\"Dashboard\",\r\n            \"group_by\": \"\"\r\n        },\r\n        \"getAllTasks\":{\r\n            \"display\":\"All Tasks\",\r\n            \"group_by\": \"tasks\"\r\n        },\r\n        \"getAllUser\":{\r\n            \"display\":\"All Users\",\r\n            \"group_by\": \"users\"\r\n        }\r\n    },\r\n    \"task\": {\r\n        \"view\":{\r\n            \"display\":\"Task\",\r\n            \"group_by\": \"tasks\"\r\n        },\r\n        \"addTask\":{\r\n            \"display\":\"add task\",\r\n            \"group_by\": \"tasks\"\r\n        },\r\n        \"addMember\":{\r\n            \"display\":\"Add Member\",\r\n            \"group_by\": \"member\"\r\n        }\r\n    }\r\n}');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` int(11) NOT NULL,
  `student_course` varchar(255) NOT NULL,
  `student_batch` varchar(255) NOT NULL,
  `student_name` varchar(255) NOT NULL,
  `student_father` varchar(255) NOT NULL,
  `student_mobile` varchar(255) DEFAULT NULL,
  `student_email` varchar(255) NOT NULL,
  `student_other_info` longtext NOT NULL,
  `student_fees_final` int(255) NOT NULL,
  `student_payment_history` longtext NOT NULL,
  `total_paid` int(255) NOT NULL,
  `total_due` int(255) NOT NULL,
  `student_added_by` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `assigned_by` int(100) NOT NULL,
  `assigned_to` varchar(255) NOT NULL,
  `deadline` date NOT NULL,
  `assigned_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('employee','manager','admin') NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `user_type` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `name`, `user_type`) VALUES
(18, 'lsdmgovind', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'Super Admin', 1),
(19, 'demo', '21232f297a57a5a743894a0e4a801fc3', 'employee', 'demo', 1),
(22, 'manager', '21232f297a57a5a743894a0e4a801fc3', 'manager', 'manager1 Name', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `budget`
--
ALTER TABLE `budget`
  ADD PRIMARY KEY (`bud_id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `income`
--
ALTER TABLE `income`
  ADD PRIMARY KEY (`inc_id`);

--
-- Indexes for table `option_for`
--
ALTER TABLE `option_for`
  ADD PRIMARY KEY (`option_id`);

--
-- Indexes for table `scope`
--
ALTER TABLE `scope`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `budget`
--
ALTER TABLE `budget`
  MODIFY `bud_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `income`
--
ALTER TABLE `income`
  MODIFY `inc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `option_for`
--
ALTER TABLE `option_for`
  MODIFY `option_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `scope`
--
ALTER TABLE `scope`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1252;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
