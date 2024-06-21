-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2024 at 09:10 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
(11, 'dd', 'hardware', 85, '2024-01-17', '45', 1),
(12, 'subrata', 'foods', 2222, '2024-01-17', 'subrata remark', 1),
(13, 'name3', 'foods', 555, '2024-01-13', 'remark\r\n', 1),
(14, 'name4', 'electron', 100, '2024-01-17', 'ghghh', 1),
(15, 'name5', 'stationar', 636, '2024-01-17', '4582', 1),
(16, 'name_exp', 'hardware', 500, '2023-12-13', 'remark', 1),
(17, 'exp', 'foods', 50, '2024-01-15', 'hhgghgg', 1),
(18, 'd', 'foods', 500, '2024-01-19', 'food expenses', 1),
(19, 'h', 'hardware', 3, '2024-01-19', '5', 1),
(20, 'fbfggtg', 'hardware', 78, '2024-01-19', '45', 1),
(21, 'tt', 'hardware', 20, '2024-01-19', 'tt', 1),
(22, 'f', 'hardware', 7, '2024-02-08', 'f', 1),
(23, 'expenses', 'hardware', 39, '2024-02-01', 'd', 1),
(24, 'er', 'hardware', 7878, '2024-01-31', 'er', 1);

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
(5, 'web_html', 1800),
(6, 'cv', 10000),
(7, 'demo', 4545);

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
(4, 'hey', 'hey1', 1111, '2024-01-20', 'hey', 1),
(26, 'Token payment of demo', 'course_fee', 498, '2024-02-01', 'Student Name: demo####Course Name: c 1,####Batch Name: ll####PAYMENT ADDED BYSuper Admin', 1),
(27, 'Token payment of demo1', 'course_fee', 505, '2024-02-01', 'Student Name: demo1####Course Name: c 2,####Batch Name: test####PAYMENT ADDED BYSuper Admin', 1),
(28, 'Token payment of demo2', 'course_fee', 1998, '2024-02-01', 'Student Name: demo2####Course Name: c 1,####Batch Name: ll####PAYMENT ADDED BYSuper Admin', 1),
(29, 'Course fees payment of demo1', 'course_fee', 500, '2024-02-01', 'Student Name: demo1####Course Name: c 2####Batch Name: test', 1),
(30, 'Token payment of demo4', 'course_fee', 999, '2024-02-01', 'Student Name: demo4####Course Name: c 1,####Batch Name: ll####PAYMENT ADDED BYSuper Admin', 1),
(31, 'dd', 'product2', 44, '2024-02-01', 'f', 1),
(32, 'dd', 'new income', 44444, '2024-02-17', 'd', 1),
(33, 'Token payment of a', 'course_fee', 566, '2024-02-02', 'Student Name: a####Course Name: c 3,####Batch Name: demobatch####PAYMENT ADDED BYSuper Admin', 1),
(34, 'Course fees payment of a', 'course_fee', 1000, '2024-02-02', 'Student Name: a####Course Name: c 3####Batch Name: demobatch', 1),
(35, 'Token payment of whhat', 'course_fee', 299, '2024-02-03', 'Student Name: whhat####Course Name: c 1,####Batch Name: ll####PAYMENT ADDED BYSuper Admin', 1),
(36, 'Token payment of a', 'course_fee', 999, '2024-02-03', 'Student Name: a####Course Name: c 1,####Batch Name: ll####PAYMENT ADDED BYSuper Admin', 1),
(37, 'Token payment of dd', 'course_fee', 999, '2024-02-03', 'Student Name: dd####Course Name: c 1,####Batch Name: ll####PAYMENT ADDED BYSuper Admin', 1),
(38, 'Token payment of s', 'course_fee', 890, '2024-02-03', 'Student Name: s####Course Name: c 1,####Batch Name: ll####PAYMENT ADDED BYSuper Admin', 1),
(39, 'Token payment of pppp', 'course_fee', 1000, '2024-02-03', 'Student Name: pppp####Course Name: c 1,####Batch Name: ll####PAYMENT ADDED BYSuper Admin', 1),
(40, 'Course fees payment of a', 'course_fee', 1, '2024-02-03', 'Student Name: a####Course Name: c 1####Batch Name: ll', 1),
(41, 'Course fees payment of demo2', 'course_fee', 2, '2024-02-03', 'Student Name: demo2####Course Name: c 1####Batch Name: ll', 1),
(42, 'Course fees payment of demo2', 'course_fee', 1000, '2024-02-03', 'Student Name: demo2####Course Name: c 1####Batch Name: ll', 1);

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
(1, 'expenses', 'stationar,hardware,electron,foods'),
(2, 'income', 'product1,product2,hey1,course_fee,new income'),
(3, 'shortcut', '{\"addsh\": \"Addtask\", \"addex\": \"Addexpenses\", \"addin\": \"Addincome\", \"expda\": \"Expensesdashboard\", \"incda\": \"Incomedashboard\", \"expca\": \"Allexpenses\", \"incca\": \"Allincome\"}'),
(4, 'batch', '{\"yy\":[\"test\",\"c 1,c 2,c 3\",\"2024-01-24\",\"12:04\",\"16:04\"],\"kk\":[\"ll\",\"c 1\",\"2024-01-11\",\"15:06\",\"15:07\"],\"web batch\":[\"web batch\",\"web_html\",\"2024-02-04\",\"11:05\",\"15:05\"],\"0\":[\"batch new\",\"web_html\",\"2024-02-02\",\"19:07\",\"23:04\"],\"1\":[\"batc new4\",\"c 1,c 2,c 3,c 4,web_html\",\"2024-02-10\",\"16:05\",\"18:06\"],\"batch final\":[\"batch final\",\"web_html\",\"2024-02-05\",\"16:09\",\"18:09\"],\"demo45\":[\"demo45\",\"c 2,c 3\",\"2024-02-09\",\"15:24\",\"17:24\"],\"demobatch\":[\"demobatch\",\"c 2,c 3\",\"2024-02-02\",\"20:21\",\"21:21\"]}'),
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
(1, 'employee', '{\r\n    \"Employee\": {\r\n        \"index\":{\r\n            \"display\":\"Dashboard\",\r\n            \"group_by\": \"\",\r\n            \"is_visible\": true\r\n        }\r\n        \r\n    },\r\n    \"Student\": {\r\n        \"addStudent\":{\r\n            \"display\":\"Add Student\",\r\n            \"group_by\": \"Student\",\r\n            \"is_visible\": true\r\n        },\r\n        \"add_student\":{\r\n            \"display\":\"\",\r\n            \"group_by\": \"\",\r\n            \"is_visible\": false\r\n        },\r\n        \"addPayment\":{\r\n            \"display\":\"Add Payment\",\r\n            \"group_by\": \"Student\",\r\n            \"is_visible\": true\r\n        },\r\n        \"add_payment_money\":{\r\n            \"display\":\"\",\r\n            \"group_by\": \"\",\r\n            \"is_visible\": false\r\n        }\r\n        \r\n    }\r\n\r\n}'),
(2, 'manager', '{\r\n    \"manager\": {\r\n        \"index\":{\r\n            \"display\":\"Dashboard\",\r\n            \"group_by\": \"\",\r\n            \"is_visible\": true\r\n        }\r\n        \r\n    },\r\n    \"task\": {\r\n        \"view\":{\r\n            \"display\":\"Task\",\r\n            \"group_by\": \"Tasks\",\r\n            \"is_visible\": false\r\n        },\r\n        \"assignedSheetToEmployee\":{\r\n            \"display\":\"Employee Sheet\",\r\n            \"group_by\": \"Tasks\",\r\n            \"is_visible\": true\r\n        },\r\n        \"addTask\":{\r\n            \"display\":\"Add task\",\r\n            \"group_by\": \"Tasks\",\r\n            \"is_visible\": true\r\n        },\r\n        \"add_Task\":{\r\n            \"display\":\"\",\r\n            \"group_by\": \"\",\r\n            \"is_visible\": false\r\n        },\r\n        \"editTask\":{\r\n            \"display\":\"\",\r\n            \"group_by\": \"\",\r\n            \"is_visible\": false\r\n        },\r\n        \"updateTask\":{\r\n            \"display\":\"\",\r\n            \"group_by\": \"\",\r\n            \"is_visible\": false\r\n        },\r\n        \"deleteTask\":{\r\n            \"display\":\"\",\r\n            \"group_by\": \"\",\r\n            \"is_visible\": false\r\n        }\r\n    },\r\n    \"Student\": {\r\n        \"addStudent\":{\r\n            \"display\":\"Add Student\",\r\n            \"group_by\": \"Student\",\r\n            \"is_visible\": true\r\n        },\r\n        \"add_student\":{\r\n            \"display\":\"\",\r\n            \"group_by\": \"\",\r\n            \"is_visible\": false\r\n        },\r\n        \"addPayment\":{\r\n            \"display\":\"Add Payment\",\r\n            \"group_by\": \"Student\",\r\n            \"is_visible\": true\r\n        },\r\n        \"add_payment_money\":{\r\n            \"display\":\"\",\r\n            \"group_by\": \"\",\r\n            \"is_visible\": false\r\n        }\r\n        \r\n    }\r\n\r\n}'),
(3, 'admin', '{\r\n    \"admin\": {\r\n        \"index\":{\r\n            \"display\":\"Dashboard\",\r\n            \"group_by\": \"\",\r\n            \"is_visible\": true\r\n        }\r\n        \r\n    },\r\n    \"task\": {\r\n        \"view\":{\r\n            \"display\":\"Task\",\r\n            \"group_by\": \"Tasks\",\r\n            \"is_visible\": false\r\n        },\r\n        \"addTask\":{\r\n            \"display\":\"Add task\",\r\n            \"group_by\": \"Tasks\",\r\n            \"is_visible\": true\r\n        },\r\n        \"add_Task\":{\r\n            \"display\":\"\",\r\n            \"group_by\": \"\",\r\n            \"is_visible\": false\r\n        },\r\n        \"addMember\":{\r\n            \"display\":\"Add Member\",\r\n            \"group_by\": \"Member\",\r\n            \"is_visible\": true\r\n        },\r\n        \"add_Member\":{\r\n            \"display\":\"\",\r\n            \"group_by\": \"\",\r\n            \"is_visible\": false\r\n        },\r\n        \"allEmployee\":{\r\n            \"display\":\"All Employee\",\r\n            \"group_by\": \"Member\",\r\n            \"is_visible\": true\r\n        },\r\n        \"allManager\":{\r\n            \"display\":\"All Manager\",\r\n            \"group_by\": \"Member\",\r\n            \"is_visible\": true\r\n        },\r\n        \"editTask\":{\r\n            \"display\":\"\",\r\n            \"group_by\": \"\",\r\n            \"is_visible\": false\r\n        },\r\n        \"updateTask\":{\r\n            \"display\":\"\",\r\n            \"group_by\": \"\",\r\n            \"is_visible\": false\r\n        },\r\n        \"deleteTask\":{\r\n            \"display\":\"\",\r\n            \"group_by\": \"\",\r\n            \"is_visible\": false\r\n        },\r\n        \"editMember\":{\r\n            \"display\":\"\",\r\n            \"group_by\": \"\",\r\n            \"is_visible\": false\r\n        },\r\n        \"updateMember\":{\r\n            \"display\":\"\",\r\n            \"group_by\": \"\",\r\n            \"is_visible\": false\r\n        },\r\n        \"deleteMember\":{\r\n            \"display\":\"\",\r\n            \"group_by\": \"\",\r\n            \"is_visible\": false\r\n        }\r\n        \r\n    },\r\n    \"batch\": {\r\n        \"allBatch\":{\r\n            \"display\":\"All Batch\",\r\n            \"group_by\": \"Batch\",\r\n            \"is_visible\": true\r\n        },\r\n        \"addBatch\":{\r\n            \"display\":\"Add Batch\",\r\n            \"group_by\": \"Batch\",\r\n            \"is_visible\": true\r\n        },\r\n        \r\n        \"add_batch\":{\r\n            \"display\":\"\",\r\n            \"group_by\": \"\",\r\n            \"is_visible\": false\r\n        }\r\n    },\r\n    \"course\": {\r\n        \"allCourse\":{\r\n            \"display\":\"All Course\",\r\n            \"group_by\": \"Course\",\r\n            \"is_visible\": true\r\n        },\r\n        \"addCourse\":{\r\n            \"display\":\"Add Course\",\r\n            \"group_by\": \"Course\",\r\n            \"is_visible\": true\r\n        },\r\n        \r\n        \"add_course\":{\r\n            \"display\":\"\",\r\n            \"group_by\": \"\",\r\n            \"is_visible\": false\r\n        }\r\n    },\r\n    \"Expenses\": {\r\n        \"expenses_dashboard\":{\r\n            \"display\":\"Expenses Dashboard\",\r\n            \"group_by\": \"Expenses\",\r\n            \"is_visible\": true\r\n        },\r\n        \"addExpenses\":{\r\n            \"display\":\"Add Expenses\",\r\n            \"group_by\": \"Expenses\",\r\n            \"is_visible\": true\r\n        },\r\n        \"add_expenses\":{\r\n            \"display\":\"\",\r\n            \"group_by\": \"\",\r\n            \"is_visible\": false\r\n        },\r\n        \"allExpensesCategory\":{\r\n            \"display\":\"Expenses Category\",\r\n            \"group_by\": \"Expenses\",\r\n            \"is_visible\": true\r\n        },\r\n        \"updateCategoryType\":{\r\n            \"display\":\"\",\r\n            \"group_by\": \"\",\r\n            \"is_visible\": false\r\n        },\r\n        \"deleteCategory\":{\r\n            \"display\":\"\",\r\n            \"group_by\": \"\",\r\n            \"is_visible\": false\r\n        },\r\n        \"restoreCategory\":{\r\n            \"display\":\"\",\r\n            \"group_by\": \"\",\r\n            \"is_visible\": false\r\n        }\r\n    },\r\n    \"Income\": {\r\n        \"income_dashboard\":{\r\n            \"display\":\"Income Dashboard\",\r\n            \"group_by\": \"Income\",\r\n            \"is_visible\": true\r\n        },\r\n        \"addIncome\":{\r\n            \"display\":\"Add Income\",\r\n            \"group_by\": \"Income\",\r\n            \"is_visible\": true\r\n        },\r\n        \"add_income\":{\r\n            \"display\":\"\",\r\n            \"group_by\": \"\",\r\n            \"is_visible\": false\r\n        },\r\n        \"allIncomeCategory\":{\r\n            \"display\":\"Income Category\",\r\n            \"group_by\": \"Income\",\r\n            \"is_visible\": true\r\n        },\r\n        \"updateincomeCategoryType\":{\r\n            \"display\":\"\",\r\n            \"group_by\": \"\",\r\n            \"is_visible\": false\r\n        },\r\n        \"deleteincomeCategory\":{\r\n            \"display\":\"\",\r\n            \"group_by\": \"\",\r\n            \"is_visible\": false\r\n        },\r\n        \"restoreincomeCategory\":{\r\n            \"display\":\"\",\r\n            \"group_by\": \"\",\r\n            \"is_visible\": false\r\n        }\r\n    },\r\n    \"Student\": {\r\n        \"addStudent\":{\r\n            \"display\":\"Add Student\",\r\n            \"group_by\": \"Student\",\r\n            \"is_visible\": true\r\n        },\r\n        \"add_student\":{\r\n            \"display\":\"\",\r\n            \"group_by\": \"\",\r\n            \"is_visible\": false\r\n        },\r\n        \"addPayment\":{\r\n            \"display\":\"Add Payment\",\r\n            \"group_by\": \"Student\",\r\n            \"is_visible\": true\r\n        },\r\n        \"add_payment_money\":{\r\n            \"display\":\"\",\r\n            \"group_by\": \"\",\r\n            \"is_visible\": false\r\n        }\r\n        \r\n    },\r\n    \"Passbook\": {\r\n        \"index\":{\r\n            \"display\":\"Passbook\",\r\n            \"group_by\": \"\",\r\n            \"is_visible\": true\r\n        }\r\n        \r\n    }\r\n\r\n}');

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

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `student_course`, `student_batch`, `student_name`, `student_father`, `student_mobile`, `student_email`, `student_other_info`, `student_fees_final`, `student_payment_history`, `total_paid`, `total_due`, `student_added_by`) VALUES
(1252, 'c 1', 'll', 'demo', 'demo', '7425896334', 'demo@demo', '{\"DOB\":\"2004-02-06\",\"Age\":19,\"VISIT_DATE\":\"2024-02-01\",\"ACADEMIC\":\"demo\",\"TOKEN_PAID\":\"498\",\"REFERRAL\":\"hhhhhh\",\"STUDENT_ADDED_BY\":\"{\\\"MEMBER_NAME\\\":\\\"Super Admin\\\",\\\"MEMBER_ROLE\\\":\\\"admin\\\",\\\"MEMBER_ID\\\":\\\"18\\\"}\"}', 45000, '[{\"TIME\":\"2024-02-01 11:24:49\",\"Amount\":\"498\",\"Payment_Method\":\"UPI\",\"PAYMENT_ADDED_BY\":\"{\\\"MEMBER_NAME\\\":\\\"Super Admin\\\",\\\"MEMBER_ROLE\\\":\\\"admin\\\",\\\"MEMBER_ID\\\":\\\"18\\\"}\"}]', 498, 44502, '{\"MEMBER_NAME\":\"Super Admin\",\"MEMBER_ROLE\":\"admin\",\"MEMBER_ID\":\"18\"}'),
(1253, 'c 2', 'test', 'demo1', 'demo1', '8547854545', 'demo1@demo', '{\"DOB\":\"2024-01-29\",\"Age\":0,\"VISIT_DATE\":\"2024-02-01\",\"ACADEMIC\":\"demo1\",\"TOKEN_PAID\":\"505\",\"REFERRAL\":\"rrr\",\"STUDENT_ADDED_BY\":\"{\\\"MEMBER_NAME\\\":\\\"Super Admin\\\",\\\"MEMBER_ROLE\\\":\\\"admin\\\",\\\"MEMBER_ID\\\":\\\"18\\\"}\"}', 5005, '[{\"TIME\":\"2024-02-01 11:27:16\",\"Amount\":\"505\",\"Payment_Method\":\"PAYTM\",\"PAYMENT_ADDED_BY\":\"{\\\"MEMBER_NAME\\\":\\\"Super Admin\\\",\\\"MEMBER_ROLE\\\":\\\"admin\\\",\\\"MEMBER_ID\\\":\\\"18\\\"}\"},{\"TIME\":\"2024-02-01 12:04:24\",\"AMOUNT\":\"500\",\"PAYMENT METHODE\":\"PAYTM\",\"PAYMENT_ADDED_BY\":\"{\\\"MEMBER_NAME\\\":\\\"Super Admin\\\",\\\"MEMBER_ROLE\\\":\\\"admin\\\",\\\"MEMBER_ID\\\":\\\"18\\\"}\"}]', 1005, 4000, '{\"MEMBER_NAME\":\"Super Admin\",\"MEMBER_ROLE\":\"admin\",\"MEMBER_ID\":\"18\"}'),
(1254, 'c 1', 'll', 'demo2', 'demo2', '7854254787', 'demo2@demo', '{\"DOB\":\"2024-01-29\",\"Age\":0,\"VISIT_DATE\":\"2024-02-01\",\"ACADEMIC\":\"demo2\",\"TOKEN_PAID\":\"1998\",\"REFERRAL\":\"demo2\",\"STUDENT_ADDED_BY\":\"{\\\"MEMBER_NAME\\\":\\\"Super Admin\\\",\\\"MEMBER_ROLE\\\":\\\"admin\\\",\\\"MEMBER_ID\\\":\\\"18\\\"}\"}', 8000, '[{\"TIME\":\"2024-02-01 11:49:29\",\"Amount\":\"1998\",\"Payment_Method\":\"CARD\",\"PAYMENT_ADDED_BY\":\"{\\\"MEMBER_NAME\\\":\\\"Super Admin\\\",\\\"MEMBER_ROLE\\\":\\\"admin\\\",\\\"MEMBER_ID\\\":\\\"18\\\"}\"},{\"TIME\":\"2024-02-03 13:48:13\",\"AMOUNT\":\"2\",\"PAYMENT METHODE\":\"Cash\",\"PAYMENT_ADDED_BY\":\"{\\\"MEMBER_NAME\\\":\\\"Super Admin\\\",\\\"MEMBER_ROLE\\\":\\\"admin\\\",\\\"MEMBER_ID\\\":\\\"18\\\"}\"},{\"TIME\":\"2024-02-03 13:49:14\",\"AMOUNT\":\"1000\",\"PAYMENT METHODE\":\"UPI\",\"PAYMENT_ADDED_BY\":\"{\\\"MEMBER_NAME\\\":\\\"Super Admin\\\",\\\"MEMBER_ROLE\\\":\\\"admin\\\",\\\"MEMBER_ID\\\":\\\"18\\\"}\"}]', 3000, 5000, '{\"MEMBER_NAME\":\"Super Admin\",\"MEMBER_ROLE\":\"admin\",\"MEMBER_ID\":\"18\"}'),
(1260, 'c 1', 'll', 'demo4', 'demo4', '7777777777', 'demo4@demo', '{\"DOB\":\"2024-01-31\",\"Age\":0,\"VISIT_DATE\":\"2024-02-01\",\"ACADEMIC\":\"demo4\",\"TOKEN_PAID\":\"999\",\"REFERRAL\":\"tytyty\",\"STUDENT_ADDED_BY\":\"{\\\"MEMBER_NAME\\\":\\\"Super Admin\\\",\\\"MEMBER_ROLE\\\":\\\"admin\\\",\\\"MEMBER_ID\\\":\\\"18\\\"}\"}', 5000, '[{\"TIME\":\"2024-02-01 12:06:32\",\"Amount\":\"999\",\"Payment_Method\":\"UPI\",\"PAYMENT_ADDED_BY\":\"{\\\"MEMBER_NAME\\\":\\\"Super Admin\\\",\\\"MEMBER_ROLE\\\":\\\"admin\\\",\\\"MEMBER_ID\\\":\\\"18\\\"}\"}]', 999, 4001, '{\"MEMBER_NAME\":\"Super Admin\",\"MEMBER_ROLE\":\"admin\",\"MEMBER_ID\":\"18\"}'),
(1261, 'c 3', 'demobatch', 'a', 'a', '2323232323', 's@gmail.com', '{\"DOB\":\"2024-02-01\",\"Age\":0,\"VISIT_DATE\":\"2024-02-02\",\"ACADEMIC\":\"aa\",\"TOKEN_PAID\":\"566\",\"REFERRAL\":\"demo r\",\"STUDENT_ADDED_BY\":\"{\\\"MEMBER_NAME\\\":\\\"Super Admin\\\",\\\"MEMBER_ROLE\\\":\\\"admin\\\",\\\"MEMBER_ID\\\":\\\"18\\\"}\"}', 4566, '[{\"TIME\":\"2024-02-02 19:27:23\",\"Amount\":\"566\",\"Payment_Method\":\"PAYTM\",\"PAYMENT_ADDED_BY\":\"{\\\"MEMBER_NAME\\\":\\\"Super Admin\\\",\\\"MEMBER_ROLE\\\":\\\"admin\\\",\\\"MEMBER_ID\\\":\\\"18\\\"}\"},{\"TIME\":\"2024-02-02 19:27:49\",\"AMOUNT\":\"1000\",\"PAYMENT METHODE\":\"CARD\",\"PAYMENT_ADDED_BY\":\"{\\\"MEMBER_NAME\\\":\\\"Super Admin\\\",\\\"MEMBER_ROLE\\\":\\\"admin\\\",\\\"MEMBER_ID\\\":\\\"18\\\"}\"}]', 1566, 3000, '{\"MEMBER_NAME\":\"Super Admin\",\"MEMBER_ROLE\":\"admin\",\"MEMBER_ID\":\"18\"}'),
(1262, 'c 1', 'll', 'whhat', 'rr', '7777778888', 'dd', '{\"DOB\":\"2024-02-01\",\"Age\":0,\"VISIT_DATE\":\"2024-02-03\",\"ACADEMIC\":\"rrr\",\"TOKEN_PAID\":\"299\",\"REFERRAL\":\"yt\",\"STUDENT_ADDED_BY\":\"{\\\"MEMBER_NAME\\\":\\\"Super Admin\\\",\\\"MEMBER_ROLE\\\":\\\"admin\\\",\\\"MEMBER_ID\\\":\\\"18\\\"}\"}', 5000, '[{\"TIME\":\"2024-02-03 10:29:23\",\"Amount\":\"299\",\"Payment_Method\":\"Cash\",\"PAYMENT_ADDED_BY\":\"{\\\"MEMBER_NAME\\\":\\\"Super Admin\\\",\\\"MEMBER_ROLE\\\":\\\"admin\\\",\\\"MEMBER_ID\\\":\\\"18\\\"}\"}]', 299, 4701, '{\"MEMBER_NAME\":\"Super Admin\",\"MEMBER_ROLE\":\"admin\",\"MEMBER_ID\":\"18\"}'),
(1263, 'c 1', 'll', 'a', 'a', '8585858585', 'hhggdd@gmail.com', '{\"DOB\":\"2024-02-01\",\"Age\":0,\"VISIT_DATE\":\"2024-02-03\",\"ACADEMIC\":\"fggfgg\",\"TOKEN_PAID\":\"999\",\"REFERRAL\":\"gg\",\"STUDENT_ADDED_BY\":\"{\\\"MEMBER_NAME\\\":\\\"Super Admin\\\",\\\"MEMBER_ROLE\\\":\\\"admin\\\",\\\"MEMBER_ID\\\":\\\"18\\\"}\"}', 8000, '[{\"TIME\":\"2024-02-03 10:33:52\",\"Amount\":\"999\",\"Payment_Method\":\"Cash\",\"PAYMENT_ADDED_BY\":\"{\\\"MEMBER_NAME\\\":\\\"Super Admin\\\",\\\"MEMBER_ROLE\\\":\\\"admin\\\",\\\"MEMBER_ID\\\":\\\"18\\\"}\"},{\"TIME\":\"2024-02-03 11:29:07\",\"AMOUNT\":\"1\",\"PAYMENT METHODE\":\"UPI\",\"PAYMENT_ADDED_BY\":\"{\\\"MEMBER_NAME\\\":\\\"demo455\\\",\\\"MEMBER_ROLE\\\":\\\"manager\\\",\\\"MEMBER_ID\\\":\\\"27\\\"}\"}]', 1000, 7000, '{\"MEMBER_NAME\":\"Super Admin\",\"MEMBER_ROLE\":\"admin\",\"MEMBER_ID\":\"18\"}'),
(1264, 'c 1', 'll', 'dd', 'ss', '7778889995', 'mail@gmail.com', '{\"DOB\":\"2024-02-01\",\"Age\":0,\"VISIT_DATE\":\"2024-02-03\",\"ACADEMIC\":\"rrrr\",\"TOKEN_PAID\":\"999\",\"REFERRAL\":\"new_student\",\"STUDENT_ADDED_BY\":\"{\\\"MEMBER_NAME\\\":\\\"Super Admin\\\",\\\"MEMBER_ROLE\\\":\\\"admin\\\",\\\"MEMBER_ID\\\":\\\"18\\\"}\"}', 6000, '[{\"TIME\":\"2024-02-03 10:40:41\",\"Amount\":\"999\",\"Payment_Method\":\"UPI\",\"PAYMENT_ADDED_BY\":\"{\\\"MEMBER_NAME\\\":\\\"Super Admin\\\",\\\"MEMBER_ROLE\\\":\\\"admin\\\",\\\"MEMBER_ID\\\":\\\"18\\\"}\"}]', 999, 5001, '{\"MEMBER_NAME\":\"Super Admin\",\"MEMBER_ROLE\":\"admin\",\"MEMBER_ID\":\"18\"}'),
(1265, 'c 1', 'll', 's', 's', '7878788985', 'demo', '{\"DOB\":\"2024-02-01\",\"Age\":0,\"VISIT_DATE\":\"2024-02-03\",\"ACADEMIC\":\"ss\",\"TOKEN_PAID\":\"890\",\"REFERRAL\":\"eeee\",\"STUDENT_ADDED_BY\":\"{\\\"MEMBER_NAME\\\":\\\"Super Admin\\\",\\\"MEMBER_ROLE\\\":\\\"admin\\\",\\\"MEMBER_ID\\\":\\\"18\\\"}\"}', 7889, '[{\"TIME\":\"2024-02-03 11:10:44\",\"Amount\":\"890\",\"Payment_Method\":\"PAYTM\",\"PAYMENT_ADDED_BY\":\"{\\\"MEMBER_NAME\\\":\\\"Super Admin\\\",\\\"MEMBER_ROLE\\\":\\\"admin\\\",\\\"MEMBER_ID\\\":\\\"18\\\"}\"}]', 890, 6999, '{\"MEMBER_NAME\":\"Super Admin\",\"MEMBER_ROLE\":\"admin\",\"MEMBER_ID\":\"18\"}'),
(1266, 'c 1', 'll', 'pppp', 'pppp', '8585858585', 'hhh@gmail.com', '{\"DOB\":\"2024-02-01\",\"Age\":0,\"VISIT_DATE\":\"2024-02-03\",\"ACADEMIC\":\"hhhhh\",\"TOKEN_PAID\":\"1000\",\"REFERRAL\":\"uuuu\",\"STUDENT_ADDED_BY\":\"{\\\"MEMBER_NAME\\\":\\\"Super Admin\\\",\\\"MEMBER_ROLE\\\":\\\"admin\\\",\\\"MEMBER_ID\\\":\\\"18\\\"}\"}', 10000, '[{\"TIME\":\"2024-02-03 11:12:32\",\"Amount\":\"1000\",\"Payment_Method\":\"PAYTM\",\"PAYMENT_ADDED_BY\":\"{\\\"MEMBER_NAME\\\":\\\"Super Admin\\\",\\\"MEMBER_ROLE\\\":\\\"admin\\\",\\\"MEMBER_ID\\\":\\\"18\\\"}\"}]', 1000, 9000, '{\"MEMBER_NAME\":\"Super Admin\",\"MEMBER_ROLE\":\"admin\",\"MEMBER_ID\":\"18\"}');

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

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `title`, `description`, `link`, `assigned_by`, `assigned_to`, `deadline`, `assigned_date`) VALUES
(27, 'task11', 'task11', 'task11', 27, '23', '2024-02-02', '2024-02-02 16:54:44'),
(31, 'new task', 'new task', 'new task', 18, '22,27,19,20', '2024-02-02', '2024-02-03 12:02:25'),
(32, 'gggggg', 'ggg', 'ggggggg', 22, '19,21', '2024-02-02', '2024-02-03 12:53:21'),
(33, 'ff', 'ff', 'ff', 22, '24', '2024-02-02', '2024-02-03 13:20:16'),
(34, 'hhhhh', 'hhhhh', 'hhhhhh', 22, '23', '2024-02-02', '2024-02-03 13:21:26'),
(35, 'jfbjd', 'djbdjb', 'dbubd', 18, '27,23', '2024-02-01', '2024-02-03 13:28:58'),
(36, 'hhfuh', 'idid', 'hhdj', 22, '19,21,23,24,29', '2024-02-02', '2024-02-03 13:30:44'),
(37, 'ff', 'ff', 'ff', 27, '21,23', '2024-02-17', '2024-02-03 14:30:20'),
(38, 'Rem dolores cum natu', 'Dicta eum fuga Anim', 'Magna quibusdam illo', 29, '28,19,21,23', '1992-12-27', '2024-06-06 02:15:43');

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
(18, 'SuperAdmin', 'dcf87fe2c6b58b76c9153f8cd31cba73', 'admin', 'Super Admin', 1),
(19, 'demo', 'e4da3b7fbbce2345d7772b0674a318d5', 'employee', 'demo', 1),
(20, 's', 'e4da3b7fbbce2345d7772b0674a318d5', 'employee', '44', 0),
(21, 'em', '47e2e8c3fdb7739e740b95345a803cac', 'employee', 'em', 1),
(22, 'manager1', 'c240642ddef994358c96da82c0361a58', 'manager', 'manager1 Name', 1),
(23, 'empoyee11', '2c49cf4287bf7da2eada9313f5095c81', 'employee', 'empoyee11', 1),
(24, 'employee12', '92712e43b798aa3bee001ba14ff0d341', 'employee', 'employee12', 0),
(27, 'd', '8277e0910d750195b448797616e091ad', 'manager', 'demo455', 0),
(28, 'manager100', '308217e115a2593373e68b67297ed515', 'manager', 'manager100', 1),
(29, 'subrata', '5f4dcc3b5aa765d61d8327deb882cf99', 'admin', 'Subrata Pramanik', 1),
(30, 'Subrata_pramanik', '5f4dcc3b5aa765d61d8327deb882cf99', 'manager', 'Subrata Pramanik', 1);

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
  MODIFY `bud_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `income`
--
ALTER TABLE `income`
  MODIFY `inc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

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
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1267;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
