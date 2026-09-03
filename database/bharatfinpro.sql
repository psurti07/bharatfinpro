-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 17, 2026 at 08:25 AM
-- Server version: 9.1.0
-- PHP Version: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bharatfinpro`
--

-- --------------------------------------------------------

--
-- Table structure for table `administration`
--

DROP TABLE IF EXISTS `administration`;
CREATE TABLE IF NOT EXISTS `administration` (
  `id` int NOT NULL AUTO_INCREMENT,
  `rec_date` datetime DEFAULT NULL,
  `fullname` varchar(80) NOT NULL,
  `mobile` varchar(40) NOT NULL,
  `emailid` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` int NOT NULL DEFAULT '1' COMMENT '0=Admin, 1=Employee',
  `isActive` int NOT NULL DEFAULT '0' COMMENT '0=No, 1=Yes',
  `isDelete` int NOT NULL DEFAULT '0' COMMENT '0=No, 1=Yes',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `administration`
--

INSERT INTO `administration` (`id`, `rec_date`, `fullname`, `mobile`, `emailid`, `password`, `role`, `isActive`, `isDelete`) VALUES
(1, '2026-08-17 12:53:20', 'Developer', '9408881214', 'info@verloopweb.com', '3fdc2b96e5de6df321152e254d28ddac', 0, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `administration_log`
--

DROP TABLE IF EXISTS `administration_log`;
CREATE TABLE IF NOT EXISTS `administration_log` (
  `id` int NOT NULL AUTO_INCREMENT,
  `adminid` int NOT NULL,
  `login_at` datetime DEFAULT NULL,
  `logout_at` datetime DEFAULT NULL,
  `server_ip` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `administration_log`
--

INSERT INTO `administration_log` (`id`, `adminid`, `login_at`, `logout_at`, `server_ip`) VALUES
(1, 1, '2026-02-18 12:21:49', NULL, '::1'),
(2, 1, '2026-04-14 14:00:13', NULL, '::1'),
(3, 1, '2026-04-15 12:27:40', NULL, '::1'),
(4, 1, '2026-04-15 15:11:55', NULL, '::1'),
(5, 1, '2026-04-15 17:10:23', NULL, '::1'),
(6, 1, '2026-04-16 12:20:02', NULL, '::1'),
(7, 1, '2026-04-17 13:59:36', NULL, '::1'),
(8, 1, '2026-04-17 15:54:46', NULL, '::1'),
(9, 1, '2026-04-18 10:43:18', NULL, '::1'),
(10, 1, '2026-04-18 17:00:24', NULL, '::1'),
(11, 1, '2026-04-29 12:12:13', NULL, '::1'),
(12, 1, '2026-06-19 17:46:17', NULL, '::1'),
(13, 1, '2026-06-20 11:15:17', NULL, '::1'),
(14, 1, '2026-06-20 12:34:57', NULL, '::1'),
(15, 1, '2026-06-20 14:01:34', NULL, '::1'),
(16, 1, '2026-06-22 15:18:04', NULL, '::1'),
(17, 1, '2026-07-22 14:34:15', NULL, '::1'),
(18, 1, '2026-08-10 15:58:36', NULL, '::1'),
(19, 1, '2026-08-11 14:38:59', '2026-08-11 16:43:15', '::1'),
(20, 1, '2026-08-11 16:46:14', NULL, '::1'),
(21, 1, '2026-08-12 11:29:33', NULL, '::1'),
(22, 1, '2026-08-13 10:39:46', NULL, '::1'),
(23, 1, '2026-08-17 12:49:01', NULL, '::1');

-- --------------------------------------------------------

--
-- Table structure for table `adsdata`
--

DROP TABLE IF EXISTS `adsdata`;
CREATE TABLE IF NOT EXISTS `adsdata` (
  `id` int NOT NULL AUTO_INCREMENT,
  `rec_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `partnertype` int NOT NULL DEFAULT '1' COMMENT '1=Channel, 2=Associate',
  `partnerid` int NOT NULL DEFAULT '0',
  `fbpage` varchar(256) NOT NULL,
  `instapage` varchar(256) NOT NULL,
  `businessid` varchar(256) NOT NULL,
  `pixelid` varchar(256) NOT NULL,
  `isVerified` int NOT NULL DEFAULT '0' COMMENT '0=No, 1=Yes',
  `isDelete` int NOT NULL DEFAULT '0' COMMENT '0=No, 1=Yes',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `airpay_entry`
--

DROP TABLE IF EXISTS `airpay_entry`;
CREATE TABLE IF NOT EXISTS `airpay_entry` (
  `id` int NOT NULL AUTO_INCREMENT,
  `rec_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `entryfor` int NOT NULL DEFAULT '0' COMMENT '1=Customer, 2=Channel, 11=Digital PL, 12=Digital BL',
  `userid` int NOT NULL,
  `orderid` varchar(50) NOT NULL,
  `orderamount` float(11,2) NOT NULL,
  `ordernote` varchar(256) DEFAULT NULL,
  `statuscode` varchar(256) DEFAULT NULL,
  `transactionid` varchar(256) DEFAULT NULL,
  `paymentmode` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `allremarks`
--

DROP TABLE IF EXISTS `allremarks`;
CREATE TABLE IF NOT EXISTS `allremarks` (
  `id` int NOT NULL AUTO_INCREMENT,
  `rec_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `module` varchar(256) NOT NULL,
  `linkid` int NOT NULL,
  `notetext` varchar(256) NOT NULL,
  `isDelete` int NOT NULL DEFAULT '0' COMMENT '0=No, 1=Yes',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bankapplylink`
--

DROP TABLE IF EXISTS `bankapplylink`;
CREATE TABLE IF NOT EXISTS `bankapplylink` (
  `id` int NOT NULL AUTO_INCREMENT,
  `rec_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `loantype` int NOT NULL,
  `bankid` int NOT NULL,
  `applyurl` varchar(256) NOT NULL,
  `isDelete` tinyint NOT NULL DEFAULT '0' COMMENT '0=No, 1=Yes',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

DROP TABLE IF EXISTS `banks`;
CREATE TABLE IF NOT EXISTS `banks` (
  `id` int NOT NULL AUTO_INCREMENT,
  `rec_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `bank_name` varchar(100) NOT NULL,
  `bank_image` varchar(255) NOT NULL,
  `order_no` int NOT NULL DEFAULT '0',
  `isDelete` int NOT NULL DEFAULT '0' COMMENT '0=No, 1=Yes',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=48 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `banks`
--

INSERT INTO `banks` (`id`, `rec_date`, `bank_name`, `bank_image`, `order_no`, `isDelete`) VALUES
(1, '2019-12-21 16:57:32', 'Axis Bank', '001.png', 1, 1),
(2, '2019-12-21 16:57:32', 'Yes Bank', '002.png', 2, 1),
(3, '2019-12-21 16:58:04', 'ICICI Bank', '003.png', 3, 1),
(4, '2019-12-21 16:58:04', 'Kotak Mahindra Bank', '004.png', 4, 1),
(5, '2019-12-21 16:58:18', 'HDFC Bank', '005.png', 5, 1),
(6, '2019-12-21 16:59:08', 'TATA Capital', '006.png', 6, 1),
(7, '2019-12-21 16:59:08', 'Indusind Bank', '007.png', 7, 1),
(8, '2021-03-23 12:18:01', 'SBI Bank', '008.png', 8, 1),
(9, '2019-12-21 16:59:38', 'IDBI Bank', '009.png', 9, 1),
(10, '2019-12-21 17:00:10', 'Bandhan Bank', '010.png', 10, 1),
(11, '2019-12-21 17:00:10', 'Union Bank', '011.png', 11, 1),
(12, '2019-12-21 17:00:10', 'RBL Bank', '012.png', 12, 1),
(13, '2019-12-21 17:00:10', 'Aditya Birla Capital', '013.png', 13, 1),
(14, '2020-03-02 20:50:08', 'Indiabulls', '014.png', 14, 1),
(15, '2020-03-02 20:50:08', 'Faircent.com', '015.png', 15, 0),
(16, '2020-03-02 20:50:48', 'Fullertor India', '016.png', 16, 1),
(17, '2020-03-02 20:50:48', 'DCB Bank', '017.png', 17, 1),
(18, '2020-03-02 20:51:27', 'Grihashakti', '018.png', 18, 1),
(19, '2020-03-02 20:51:27', 'PaySense', '019.png', 19, 1),
(20, '2021-03-23 12:17:34', 'Lendingkart', '023.png', 20, 0),
(21, '2020-03-02 20:51:27', 'Indifi', '021.png', 21, 1),
(22, '2020-03-02 20:51:27', 'Money View', '022.png', 22, 0),
(26, '2021-10-22 13:00:49', 'Moneytap', '024.png', 24, 1),
(27, '2021-10-22 13:01:12', 'IDFC First Bank', '025.png', 25, 1),
(28, '2021-10-22 13:01:51', 'Bajaj Finserv', '026.png', 26, 1),
(29, '2024-07-12 16:31:25', 'Ziploan', 'Untitled-2-removebg-preview_(2).png', 28, 1),
(30, '2021-10-22 13:02:10', 'Other Bank', '099.jpg', 99, 1),
(31, '2021-10-22 13:01:51', 'WeRize', '034.png', 34, 0),
(32, '2021-10-22 13:01:51', 'FinBox', '035.png', 35, 1),
(33, '2025-04-05 15:39:01', 'Upwards', 'Untitled-45.png', 37, 0),
(34, '2023-08-17 17:55:10', 'L&T Finance', '044.png', 44, 1),
(35, '2024-07-12 17:39:28', 'IIFL', 'Untitled-1_4.png', 39, 1),
(36, '2024-07-12 17:32:20', 'Credizy', 'Untitled-1.png', 1, 1),
(37, '2024-07-12 17:35:11', 'Prefr', 'Untitled-31.png', 1, 0),
(39, '2024-09-03 13:24:15', 'Ramfincorp', 'Ramfincorp.jpeg', 45, 1),
(38, '2024-07-26 13:14:15', 'Deals of loan', 'logo.jpeg', 9, 0),
(41, '2025-04-05 15:27:33', 'investkraft', 'Untitled-42.png', 38, 0),
(40, '2025-04-05 15:29:26', 'Fibe', 'Untitled-43.png', 46, 1),
(42, '2025-04-05 15:32:46', 'moneyview', 'Untitled-44.png', 1, 0),
(43, '2025-05-03 13:19:29', 'Urban Money', 'logoBlack.png', 1, 0),
(44, '2025-05-03 13:20:00', 'Finway', 'logo-dark.png', 1, 0),
(45, '2025-05-03 13:21:22', 'MY Mudra', 'LOGO-small.png', 1, 0),
(46, '2025-05-03 13:23:36', 'InCred', 'download.png', 1, 0),
(47, '2025-05-06 15:25:57', 'Poonawalla Fincorp', 'logo.png', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `bulksms`
--

DROP TABLE IF EXISTS `bulksms`;
CREATE TABLE IF NOT EXISTS `bulksms` (
  `id` int NOT NULL AUTO_INCREMENT,
  `rec_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fullname` varchar(250) DEFAULT NULL,
  `mobileno` varchar(80) NOT NULL,
  `emailid` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cardoffer_order`
--

DROP TABLE IF EXISTS `cardoffer_order`;
CREATE TABLE IF NOT EXISTS `cardoffer_order` (
  `id` int NOT NULL AUTO_INCREMENT,
  `rec_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `offerpage` int NOT NULL DEFAULT '1' COMMENT '1=Cardoffer, 2=Specialoffer',
  `fullname` varchar(256) NOT NULL,
  `mobile` varchar(256) NOT NULL,
  `emailid` varchar(256) NOT NULL,
  `card_number` varchar(256) NOT NULL,
  `registration_date` date DEFAULT NULL,
  `expiry_date` date DEFAULT NULL,
  `amount` float(11,2) NOT NULL,
  `paymentid` varchar(50) NOT NULL,
  `isCustomer` int NOT NULL DEFAULT '0' COMMENT '0=No, 1=Yes',
  `isActive` int NOT NULL DEFAULT '0' COMMENT '0=No, 1=Yes',
  `isDelete` int NOT NULL DEFAULT '0' COMMENT '0=No. 1=Yes',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `career_enquiry`
--

DROP TABLE IF EXISTS `career_enquiry`;
CREATE TABLE IF NOT EXISTS `career_enquiry` (
  `id` int NOT NULL AUTO_INCREMENT,
  `rec_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `applyfor` varchar(255) NOT NULL,
  `resume` varchar(255) NOT NULL,
  `qualifications` varchar(255) NOT NULL,
  `experience` varchar(255) NOT NULL,
  `keyskills` longtext NOT NULL,
  `city` varchar(256) DEFAULT NULL,
  `isDelete` int NOT NULL DEFAULT '0' COMMENT '0=No, 1=Yes',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `career_opening`
--

DROP TABLE IF EXISTS `career_opening`;
CREATE TABLE IF NOT EXISTS `career_opening` (
  `id` int NOT NULL AUTO_INCREMENT,
  `rec_date` datetime NOT NULL,
  `slug` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `descriptions` longtext NOT NULL,
  `isActive` int NOT NULL DEFAULT '1' COMMENT '0=No, 1=Yes',
  `isDelete` int NOT NULL DEFAULT '0' COMMENT '0=No, 1=Yes',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cashfree_entry`
--

DROP TABLE IF EXISTS `cashfree_entry`;
CREATE TABLE IF NOT EXISTS `cashfree_entry` (
  `id` int NOT NULL AUTO_INCREMENT,
  `rec_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `entryfor` int NOT NULL DEFAULT '0' COMMENT '1=Customer, 2=Channel, 11=Digital PL, 12=Digital BL',
  `userid` int NOT NULL,
  `orderid` varchar(50) NOT NULL,
  `orderamount` float(11,2) NOT NULL,
  `ordernote` varchar(256) DEFAULT NULL,
  `referenceid` varchar(256) DEFAULT NULL,
  `txstatus` varchar(256) DEFAULT NULL,
  `paymentmode` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

DROP TABLE IF EXISTS `ci_sessions`;
CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ci_sessions_timestamp` (`timestamp`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('20sepbho8iqikdunvit6ilf5tbd2t5bc', '::1', 1786601355, 0x5f5f63695f6c6173745f726567656e65726174657c693a313738363539383430333b61646d696e6c6f6769647c693a32323b61646d696e69647c733a313a2231223b61646d696e6e616d657c733a393a22446576656c6f706572223b61646d696e70617373776f72647c733a33323a223366646332623936653564653664663332313135326532353464323864646163223b61646d696e6163746976657c733a313a2231223b61646d696e64656c6574657c733a313a2230223b61646d696e747970657c733a313a2230223b),
('2rl5g876fdmdu6h532oh76l3655jseg5', '::1', 1786523058, 0x5f5f63695f6c6173745f726567656e65726174657c693a313738363532333035373b),
('6m01rd01af0rr3nafnmh2bn9tr4idtll', '::1', 1786951273, 0x5f5f63695f6c6173745f726567656e65726174657c693a313738363935313233323b61646d696e6c6f6769647c693a32333b61646d696e69647c733a313a2231223b61646d696e6e616d657c733a393a22446576656c6f706572223b61646d696e70617373776f72647c733a33323a223366646332623936653564653664663332313135326532353464323864646163223b61646d696e6163746976657c733a313a2231223b61646d696e64656c6574657c733a313a2230223b61646d696e747970657c733a313a2230223b),
('8m4rrsscs8uroa1paopb5942mksutc35', '::1', 1786519610, 0x5f5f63695f6c6173745f726567656e65726174657c693a313738363531393539353b6266702d637573746f6d65726c6f6769647c693a323b6266702d637573746f6d657269647c733a33323a224f4664456131466a62314a5a5569747157566c45557a463053476c465a7a3039223b6266702d637573746f6d65726e616d657c733a31313a225665726c6f6f7020576562223b6266702d637573746f6d65726d6f62696c657c733a31303a2239343038383831323134223b),
('9de7ss90t7j8c4jekvmgb20s9e7j3ldj', '::1', 1786516997, 0x5f5f63695f6c6173745f726567656e65726174657c693a313738363531363939373b),
('ol9vjivqak1vf0mult01rifq379jg6se', '::1', 1786532395, 0x5f5f63695f6c6173745f726567656e65726174657c693a313738363533323339343b),
('orm9af6fmf1ngcp3n977l3q5hukshvf6', '::1', 1786610970, 0x5f5f63695f6c6173745f726567656e65726174657c693a313738363631303936313b),
('q2dmhb1ogavc3jd61rkp3oa0l86c6c8n', '::1', 1786516785, 0x5f5f63695f6c6173745f726567656e65726174657c693a313738363531363738353b);

-- --------------------------------------------------------

--
-- Table structure for table `contact_enquiry`
--

DROP TABLE IF EXISTS `contact_enquiry`;
CREATE TABLE IF NOT EXISTS `contact_enquiry` (
  `id` int NOT NULL AUTO_INCREMENT,
  `rec_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `customer_log`
--

DROP TABLE IF EXISTS `customer_log`;
CREATE TABLE IF NOT EXISTS `customer_log` (
  `id` int NOT NULL AUTO_INCREMENT,
  `customerid` int NOT NULL,
  `login_at` datetime DEFAULT NULL,
  `logout_at` datetime DEFAULT NULL,
  `server_ip` varchar(256) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `enquiry`
--

DROP TABLE IF EXISTS `enquiry`;
CREATE TABLE IF NOT EXISTS `enquiry` (
  `id` int NOT NULL AUTO_INCREMENT,
  `rec_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `fullname` varchar(256) NOT NULL,
  `email` varchar(256) DEFAULT NULL,
  `mobile` varchar(50) NOT NULL,
  `persontype` int NOT NULL DEFAULT '0' COMMENT '0=Salaried; 1=Self Employed',
  `loanamount` int NOT NULL DEFAULT '0',
  `loantype` int DEFAULT NULL,
  `isDelete` int NOT NULL DEFAULT '0' COMMENT '0=No, 1=Yes',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `important_update`
--

DROP TABLE IF EXISTS `important_update`;
CREATE TABLE IF NOT EXISTS `important_update` (
  `id` int NOT NULL AUTO_INCREMENT,
  `rec_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tags` varchar(256) NOT NULL,
  `descriptions` longtext NOT NULL,
  `isActive` int NOT NULL DEFAULT '0' COMMENT '0=No, 1=Yes',
  `isDelete` int NOT NULL DEFAULT '0' COMMENT '0=No, 1=Yes',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `important_update`
--

INSERT INTO `important_update` (`id`, `rec_date`, `tags`, `descriptions`, `isActive`, `isDelete`) VALUES
(1, '2025-01-13 16:00:15', 'Welcome to Bharatfinpro.com!', '<p>Welcome to Bharatfinpro.com!</p>\r\n\r\n<p>We will be closed today due to Makar Sankranti. We will resume on 15/1/2025 (Wednesday) from 10 a.m. to 5 p.m.</p>\r\n\r\n<p>Thank&nbsp;you.</p>\r\n', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

DROP TABLE IF EXISTS `invoice`;
CREATE TABLE IF NOT EXISTS `invoice` (
  `id` int NOT NULL AUTO_INCREMENT,
  `rec_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `userid` int NOT NULL,
  `cardid` int NOT NULL DEFAULT '0',
  `inv_for` int NOT NULL COMMENT '0=None, 1=PL, 2=BL, 3=Channel',
  `inv_prefix` varchar(50) NOT NULL,
  `inv_number` int NOT NULL,
  `inv_date` date DEFAULT NULL,
  `inv_price` float(11,2) NOT NULL,
  `inv_cgst` float(11,2) NOT NULL,
  `inv_sgst` float(11,2) NOT NULL,
  `inv_igst` float(11,2) NOT NULL,
  `inv_grandtotal` float(11,2) NOT NULL,
  `remarks` varchar(256) DEFAULT NULL,
  `isDelete` int NOT NULL DEFAULT '0' COMMENT '0=No, 1=Yes',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `loanlist`
--

DROP TABLE IF EXISTS `loanlist`;
CREATE TABLE IF NOT EXISTS `loanlist` (
  `id` int NOT NULL AUTO_INCREMENT,
  `loanname` varchar(255) NOT NULL,
  `isDelete` int NOT NULL DEFAULT '0' COMMENT '0=No, 1=Yes',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `loanlist`
--

INSERT INTO `loanlist` (`id`, `loanname`, `isDelete`) VALUES
(1, 'Personal Loan', 0),
(2, 'Car Loan', 0),
(3, 'Education Loan', 0),
(4, 'Business Loan', 0),
(5, 'Home Loan', 0),
(6, 'Mortgage Loan', 0),
(7, 'Cibil Loan', 0),
(8, 'Franchise Loan', 0),
(9, 'Home Loan B.T. & Top-up', 0),
(10, 'Mortgage Loan B.T. & Top-up', 0),
(11, 'Digital Personal Loan', 0),
(12, 'Digital Business Loan', 0);

-- --------------------------------------------------------

--
-- Table structure for table `loanstatus`
--

DROP TABLE IF EXISTS `loanstatus`;
CREATE TABLE IF NOT EXISTS `loanstatus` (
  `id` int NOT NULL AUTO_INCREMENT,
  `rec_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `statusname` varchar(256) NOT NULL,
  `priorityno` int NOT NULL DEFAULT '1',
  `colorclass` varchar(50) NOT NULL,
  `isDelete` int NOT NULL DEFAULT '0' COMMENT '0=No, 1=Yes',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `loanstatus`
--

INSERT INTO `loanstatus` (`id`, `rec_date`, `statusname`, `priorityno`, `colorclass`, `isDelete`) VALUES
(1, '2020-10-13 19:30:40', 'Approved', 1, 'success', 0),
(2, '2020-10-13 19:30:40', 'Rejected', 2, 'danger', 0),
(3, '2020-10-13 19:30:40', 'In Process', 1, 'info', 0),
(4, '2021-08-28 08:03:33', 'Query Process', 4, 'warning', 0),
(5, '2021-10-29 11:04:29', 'File Reopen', 5, 'info', 0),
(6, '2024-08-30 09:58:10', 'Verification', 1, 'success', 0);

-- --------------------------------------------------------

--
-- Table structure for table `loanstatus_remarks`
--

DROP TABLE IF EXISTS `loanstatus_remarks`;
CREATE TABLE IF NOT EXISTS `loanstatus_remarks` (
  `id` int NOT NULL AUTO_INCREMENT,
  `rec_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `title` varchar(256) NOT NULL,
  `remarks` longtext NOT NULL,
  `statusid` int NOT NULL DEFAULT '0',
  `isDelete` tinyint NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `loanstatus_remarks`
--

INSERT INTO `loanstatus_remarks` (`id`, `rec_date`, `title`, `remarks`, `statusid`, `isDelete`) VALUES
(1, '2025-03-05 13:22:44', 'Verification Successful', 'Dear Customer, Congratulations! Your verification is successfully done. The Login Department has asked you for the required documents. Kindly submit the documents in your customer portal in the next 24 to 48 hours. Please stay in contact with the company for the next 7 working days. If you have any doubts or queries, call on __6358274370_____. You can call us between 10 AM to 5 PM (Monday to Saturday - only business days).', 6, 0),
(2, '2025-03-05 13:22:36', '4 day documents pending new (document warning)', 'Dear Customer, you\'ve still not submitted the documents for the loan process. Kindly submit the documents in your customer portal in 24-48 hours else your file will be automatically rejected from the system – and the same would be updated in your portal. For more info, you can call us on __6358274370___ between 10 AM to 5 PM (Monday to Saturday - only business days).', 3, 0),
(3, '2022-03-21 11:36:20', '4 day documents pending new (documents reject)', 'Dear Customer, the company has yet not received any documents or information from your side – and due to this, your file has been rejected. You can reapply for a loan after 6 months.', 2, 0),
(4, '2025-03-05 13:22:23', 'OTP Not Given (OTP warning remark)', 'Dear Customer, our company asked you for the OTP for your loan process but you denied to share the OTP. As per bank rules, OPT is a must for the loan process. So, if you wish to give OTP for your loan process, kindly call us on __6358274370___ in the next 24-48 hours else your file will be automatically rejected from our system. You can call us between 10 AM to 5 PM (Monday to Saturday - only business days).', 3, 0),
(5, '2022-03-21 11:36:47', 'OTP Not Given (OTP reject)', 'Dear Customer, we are sorry to inform you that your Personal Loan application in our organization has been declined because you didn\'t provide the required OTP for further processes.', 2, 0),
(6, '2025-03-05 13:22:11', 'Customer not connect 3 days new (warning)', 'Dear Customer, our login department is trying to contact you for the loan process for the last 3 days. But you\'ve not responded or you\'re not coming in contact with the company. If you\'re willing to go ahead with your loan process, kindly call on _6358274370__ in the next 24-48 hours (between 10 AM – 5 PM; between Monday and Saturday – only business days); otherwise, your file will be automatically rejected from the system.', 3, 0),
(7, '2022-03-21 11:37:15', 'Customer not connect 3 days new (reject)', 'Dear Customer, the company\'s Login Department has tried contacting you regarding the loan process – to which you\'ve not responded or you\'re not coming in contact with us, and due to this your file has been automatically rejected from the system – and the same has been updated and shown in your portal.', 2, 0),
(8, '2022-03-21 11:37:15', 'File Reject (ABP Low, CIBIL Low, PL Inquiry)', 'Dear Customer, we are sorry to inform you that your application for a loan in our organization has been rejected because you do not meet the required criteria (Average Banking, PL inquiries, Obligations, CIBIL low, ABP low, etc.).', 2, 0),
(9, '2025-03-05 13:22:00', 'Language issue (warning)', 'Dear Customer, our Login Department contacted you but the process couldn\'t proceed due to unclear or non-understandable communication/language from your end. We suggest you make a trusted person/third-party call on your behalf within the next 24-48 hours and communicate in an understandable language/manner – failing in doing so would lead to automatic rejection of your file from the system. You can call us on __6358274370___ between 10 AM to 5 PM (Monday to Saturday - only business days).', 3, 0),
(10, '2022-03-21 11:37:38', 'Language Issue (reject)', 'Dear Customer, we are sorry to inform you that your Personal Loan application in our organization has been declined due to unclear or non-understandable communication from your end.', 2, 0),
(11, '2025-03-05 13:21:11', 'NR Switched Off At Login Time (warning)', 'Dear Customer, our login department called you at the Customer Login Time but either your contact number was switched off or unreachable. If you wish to proceed with your loan process, kindly call us on ___6358274370____ within the next 24-48 hours else your file will be automatically rejected in the system. You can call us between 10 AM to 5 PM (Monday to Saturday - only business days).', 3, 0),
(12, '2025-03-05 13:20:56', 'NR Switched Off At Login Time (reject)', 'Dear Customer, we are sorry to inform you that your application for a personal loan in our organization has been declined because even after several tries of reaching out, you are unreachable or your registered mobile number is switched off. For more info call on ___6358274370____. You can call us between 10 AM to 5 PM (Monday to Saturday - only business days).', 2, 0),
(13, '2022-03-21 11:38:23', 'Loan Approval Confirmation', 'Dear Customer, Congratulations! Your Personal Loan of amount ________ is approved.', 1, 0),
(14, '2022-03-21 11:38:23', 'Application Reopened', 'Dear Customer, you had applied to our company for a loan but as you were not in contact with our company, your file is closed - the reason could be one of the following: (1) You didn\'t submit your document to the company for the login process; (2) You didn\'t respond to our calls; (3) You didn\'t send any of OTP for the login process, etc. So now, as you contacted us again to reopen your file, we are re-opening your file for the loan process and after that, you have to be in contact with our company for 7 days.', 5, 0),
(15, '2025-03-05 13:20:40', 'Customer not interested (warning)', 'Dear Customer, when our login department called you regarding your loan process, you expressed uninterest. If you want to take your loan process forward, call us on __6358274370_____ within the next 24-48 hours else your file will be automatically rejected in the system. You can call us between 10 AM to 5 PM (Monday to Saturday - only business days).', 3, 0),
(16, '2024-10-03 15:04:37', 'Customer not interested (reject)', 'Dear Customer, we are sorry to inform you that your Loan application in our organization has been declined because of the uninterest shown by you due to any reason(s).', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `lyra_entry`
--

DROP TABLE IF EXISTS `lyra_entry`;
CREATE TABLE IF NOT EXISTS `lyra_entry` (
  `id` int NOT NULL AUTO_INCREMENT,
  `rec_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `entryfor` int NOT NULL DEFAULT '0' COMMENT '1=Customer, 2=Channel, 11=Digital PL, 12=Digital BL',
  `userid` int NOT NULL,
  `orderid` varchar(50) NOT NULL,
  `orderamount` float(11,2) NOT NULL,
  `ordernote` varchar(256) DEFAULT NULL,
  `transactionid` varchar(256) DEFAULT NULL,
  `statuscode` varchar(256) DEFAULT NULL,
  `paymentmode` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `membership_order`
--

DROP TABLE IF EXISTS `membership_order`;
CREATE TABLE IF NOT EXISTS `membership_order` (
  `id` int NOT NULL AUTO_INCREMENT,
  `rec_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `userid` int NOT NULL,
  `registration_date` date DEFAULT NULL,
  `expiry_date` date DEFAULT NULL,
  `card_number` varchar(256) NOT NULL,
  `amount` float(11,2) NOT NULL,
  `paymentid` varchar(256) NOT NULL,
  `isActive` int NOT NULL DEFAULT '1',
  `isDelete` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `meta_keywords`
--

DROP TABLE IF EXISTS `meta_keywords`;
CREATE TABLE IF NOT EXISTS `meta_keywords` (
  `id` int NOT NULL AUTO_INCREMENT,
  `rec_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `slug` varchar(100) NOT NULL,
  `title` varchar(256) NOT NULL,
  `descriptions` mediumtext NOT NULL,
  `keywords` mediumtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `meta_keywords`
--

INSERT INTO `meta_keywords` (`id`, `rec_date`, `slug`, `title`, `descriptions`, `keywords`) VALUES
(1, '2021-07-08 19:28:54', 'home', 'Bharatfinpro - Personal & Business Loan Solutions', 'Get the fastest loan approvals online, Bharatfinpro helps you in applying for Personal Loan & Business Loan through multiple Banks & NBFCs for free, paperless process Bharatfinpro provides tailored personal and business loan solutions. Simplify your finances with fast approvals and hassle-free processes.', 'personal loan, business loan, hassle-free loan, instant loan approval, Bharatfinpro loans, Surat loans'),
(2, '2021-07-08 19:28:54', 'company', 'Providing Top-Notch Quick Loan Services Online | Bharatfinpro', 'Quick loan services, Instant personal loan, Instant Business Loan\r\nMeta: Providing top-notch quick instant personal loans & Business loans through multiple banks along with minimal fees online, Bharatfinpro has served a lot of customers', 'Instant personal loan'),
(3, '2021-07-08 19:30:16', 'contact', 'Personal Loan, Business Loan, Home Loan &amp; Loan Against Property | Bharatfinpro', 'Bharatfinpro offers instant personal loans, business loans, home loan, loan against property and many more at attractive interest rates &amp; easy EMI options. Apply now!', 'growuploan, personal loan, instant personal loan, growuploan personal loan, growuploan india personal loans, instant loan in india, online loan in india, personal loan india'),
(4, '2021-07-08 19:30:16', 'career', 'Personal Loan, Business Loan, Home Loan &amp; Loan Against Property | Bharatfinpro', 'Bharatfinpro offers instant personal loans, business loans, home loan, loan against property and many more at attractive interest rates &amp; easy EMI options. Apply now!', 'growuploan, personal loan, instant personal loan, growuploan personal loan, growuploan india personal loans, instant loan in india, online loan in india, personal loan india'),
(5, '2021-07-08 19:31:43', 'privacy-policy', 'Personal Loan, Business Loan, Home Loan &amp; Loan Against Property | Bharatfinpro', 'Bharatfinpro offers instant personal loans, business loans, home loan, loan against property and many more at attractive interest rates &amp; easy EMI options. Apply now!', 'growuploan, personal loan, instant personal loan, growuploan personal loan, growuploan india personal loans, instant loan in india, online loan in india, personal loan india'),
(6, '2021-07-08 19:31:43', 'terms', 'Personal Loan, Business Loan, Home Loan &amp; Loan Against Property | Bharatfinpro', 'Bharatfinpro offers instant personal loans, business loans, home loan, loan against property and many more at attractive interest rates &amp; easy EMI options. Apply now!', 'growuploan, personal loan, instant personal loan, growuploan personal loan, growuploan india personal loans, instant loan in india, online loan in india, personal loan india'),
(7, '2021-07-08 19:32:28', 'blog', 'Personal Loan, Business Loan, Home Loan &amp; Loan Against Property | Bharatfinpro', 'Bharatfinpro offers instant personal loans, business loans, home loan, loan against property and many more at attractive interest rates &amp; easy EMI options. Apply now!', 'growuploan, personal loan, instant personal loan, growuploan personal loan, growuploan india personal loans, instant loan in india, online loan in india, personal loan india'),
(8, '2021-07-08 19:33:51', 'personal-loan', 'Personal Loan - Bharatfinpro', 'Apply for a personal loan with Bharatfinpro. Enjoy competitive rates, quick approvals, and a stress-free application process.', 'personal loan, quick personal loans, low-interest loans, Bharatfinpro personal loan, Surat personal loan'),
(9, '2021-07-08 19:33:51', 'business-loan', 'Business Loan - Bharatfinpro', 'Grow your business with Bharatfinpro\'s business loans. Competitive rates, flexible terms, and fast approval to support your goals.', 'Business loan online, Instant Business Loan, Business loanbusiness loan, Surat business loans, Bharatfinpro business loan, flexible loan terms, instant business loan'),
(12, '2021-07-08 19:36:13', 'digital-personal', 'Get Instant personal loan online at low interest | Bharatfinpro', 'Personal loan, Instant Personal loan, personal loan online\r\nMEta: Apply for an instant personal loan online through multiple NBFCs. Bharatfinpro provides easy loan approval with online paperless process', 'Instant Personal loan'),
(13, '2021-07-08 19:36:13', 'digital-business', 'Personal Loan, Business Loan, Home Loan &amp; Loan Against Property | Bharatfinpro', 'Bharatfinpro offers instant personal loans, business loans, home loan, loan against property and many more at attractive interest rates &amp; easy EMI options. Apply now!', 'growuploan, personal loan, instant personal loan, growuploan personal loan, growuploan india personal loans, instant loan in india, online loan in india, personal loan india'),
(19, '2021-07-09 11:12:01', 'portal-customer', 'Personal Loan, Business Loan, Home Loan &amp; Loan Against Property | Bharatfinpro', 'Bharatfinpro offers instant personal loans, business loans, home loan, loan against property and many more at attractive interest rates &amp; easy EMI options. Apply now!', 'growuploan, personal loan, instant personal loan, growuploan personal loan, growuploan india personal loans, instant loan in india, online loan in india, personal loan india'),
(21, '2021-07-21 14:29:51', 'our-product', 'Personal Loan, Business Loan, Home Loan &amp; Loan Against Property | Bharatfinpro', 'Bharatfinpro offers instant personal loans, business loans, home loan, loan against property and many more at attractive interest rates &amp; easy EMI options. Apply now!', 'growuploan, personal loan, instant personal loan, growuploan personal loan, growuploan india personal loans, instant loan in india, online loan in india, personal loan india'),
(22, '2021-08-03 13:51:12', 'imperial-membership-card', 'With Imperial Membership Card, Getting Personal Loan is a Matter of Minutes!', 'Bharatfinpro Royal Membership Card provides you with an Instant Personal Loan of up to ₹15 Lakhs plus several attractive benefits.', 'growuploan membership card'),
(23, '2021-08-03 13:51:49', 'diamond-membership-card', 'Get Business Loans online - Diamond Membership Card | Bharatfinpro', 'Instant Business Loan with an easy online process, Bharatfinpros helps customers to apply for a loan from numerous banks. 100% quick paperless process', 'growuploan membership card');

-- --------------------------------------------------------

--
-- Table structure for table `newsletter_subscribe`
--

DROP TABLE IF EXISTS `newsletter_subscribe`;
CREATE TABLE IF NOT EXISTS `newsletter_subscribe` (
  `id` int NOT NULL AUTO_INCREMENT,
  `rec_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `subscribeemail` varchar(256) NOT NULL,
  `isActive` int NOT NULL DEFAULT '1' COMMENT '0=No, 1=Yes',
  `isDelete` int NOT NULL DEFAULT '0' COMMENT '0=No, 1=Yes',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `onboarding_transaction`
--

DROP TABLE IF EXISTS `onboarding_transaction`;
CREATE TABLE IF NOT EXISTS `onboarding_transaction` (
  `id` int NOT NULL AUTO_INCREMENT,
  `company_code` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `rec_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `total_leads` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `total_customers` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `total_amount` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `gst_amount` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `isActive` tinyint DEFAULT '1',
  `isDelete` tinyint DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `otpverification`
--

DROP TABLE IF EXISTS `otpverification`;
CREATE TABLE IF NOT EXISTS `otpverification` (
  `id` int NOT NULL AUTO_INCREMENT,
  `rec_date` date DEFAULT NULL,
  `mobile` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `otpcode` varchar(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `paygic_entry`
--

DROP TABLE IF EXISTS `paygic_entry`;
CREATE TABLE IF NOT EXISTS `paygic_entry` (
  `id` int NOT NULL AUTO_INCREMENT,
  `rec_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `entryfor` int NOT NULL DEFAULT '0' COMMENT '1=Customer, 2=Channel, 11=Digital PL, 12=Digital BL',
  `userid` int NOT NULL,
  `orderid` varchar(50) NOT NULL,
  `orderamount` float(11,2) NOT NULL,
  `ordernote` varchar(256) DEFAULT NULL,
  `transactionid` varchar(256) DEFAULT NULL,
  `statuscode` varchar(256) DEFAULT NULL,
  `paymentmode` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `paytm_entry`
--

DROP TABLE IF EXISTS `paytm_entry`;
CREATE TABLE IF NOT EXISTS `paytm_entry` (
  `id` int NOT NULL AUTO_INCREMENT,
  `rec_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `entryfor` int NOT NULL DEFAULT '0' COMMENT '1=Customer, 2=Channel, 11=Digital PL, 12=Digital BL',
  `userid` int NOT NULL,
  `orderid` varchar(50) NOT NULL,
  `orderamount` float(11,2) NOT NULL,
  `ordernote` varchar(256) DEFAULT NULL,
  `referenceid` varchar(256) DEFAULT NULL,
  `txstatus` varchar(256) DEFAULT NULL,
  `paymentmode` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payu_entry`
--

DROP TABLE IF EXISTS `payu_entry`;
CREATE TABLE IF NOT EXISTS `payu_entry` (
  `id` int NOT NULL AUTO_INCREMENT,
  `rec_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `entryfor` int NOT NULL DEFAULT '0' COMMENT '1=Customer, 2=Channel, 11=Digital PL, 12=Digital BL',
  `userid` int NOT NULL,
  `orderid` varchar(50) NOT NULL,
  `orderamount` float(11,2) NOT NULL,
  `ordernote` varchar(256) DEFAULT NULL,
  `referenceid` varchar(256) DEFAULT NULL,
  `txstatus` varchar(256) DEFAULT NULL,
  `paymentmode` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `phonepe_entry`
--

DROP TABLE IF EXISTS `phonepe_entry`;
CREATE TABLE IF NOT EXISTS `phonepe_entry` (
  `id` int NOT NULL AUTO_INCREMENT,
  `rec_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `entryfor` int NOT NULL DEFAULT '0' COMMENT '1=Customer, 2=Channel, 11=Digital PL, 12=Digital BL',
  `userid` int NOT NULL,
  `orderid` varchar(50) NOT NULL,
  `orderamount` float(11,2) NOT NULL,
  `ordernote` varchar(256) DEFAULT NULL,
  `referenceid` varchar(256) DEFAULT NULL,
  `txstatus` varchar(256) DEFAULT NULL,
  `paymentmode` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `plan_order`
--

DROP TABLE IF EXISTS `plan_order`;
CREATE TABLE IF NOT EXISTS `plan_order` (
  `id` int NOT NULL AUTO_INCREMENT,
  `rec_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `userid` int NOT NULL,
  `registration_date` date DEFAULT NULL,
  `expiry_date` date DEFAULT NULL,
  `card_number` varchar(256) NOT NULL,
  `amount` float(11,2) NOT NULL,
  `paymentid` varchar(256) NOT NULL,
  `isActive` int NOT NULL DEFAULT '1',
  `isDelete` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `plan_user_application`
--

DROP TABLE IF EXISTS `plan_user_application`;
CREATE TABLE IF NOT EXISTS `plan_user_application` (
  `id` int NOT NULL AUTO_INCREMENT,
  `rec_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `userid` int NOT NULL,
  `loantype` int NOT NULL,
  `loanamount` bigint NOT NULL,
  `cibilscore` varchar(256) NOT NULL,
  `loanpurpose` varchar(256) NOT NULL,
  `income` bigint NOT NULL,
  `currentemi` int NOT NULL,
  `emibounce` int NOT NULL DEFAULT '0' COMMENT '0=No, 1=Yes',
  `loantenure` int DEFAULT NULL,
  `preferred_date_time` datetime DEFAULT NULL,
  `status` int NOT NULL DEFAULT '1' COMMENT '1=New, 2=Approve, 3=Reject',
  `isDelete` int NOT NULL DEFAULT '0' COMMENT '0=No, 1=Yes',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `plan_user_application_status`
--

DROP TABLE IF EXISTS `plan_user_application_status`;
CREATE TABLE IF NOT EXISTS `plan_user_application_status` (
  `id` int NOT NULL AUTO_INCREMENT,
  `rec_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `applicationid` int NOT NULL,
  `statusid` int NOT NULL,
  `statusdate` date DEFAULT NULL,
  `bankid` int NOT NULL,
  `loanamount` int NOT NULL,
  `loanroi` varchar(256) NOT NULL,
  `loanterms` varchar(256) NOT NULL,
  `processfees` int NOT NULL,
  `insurance` varchar(256) NOT NULL,
  `monthlyemi` int NOT NULL,
  `remarks` longtext NOT NULL,
  `sanction_letter` varchar(256) NOT NULL,
  `staffid` int NOT NULL,
  `isDelete` int NOT NULL DEFAULT '0' COMMENT '0=No, 1=Yes',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `plan_user_documents`
--

DROP TABLE IF EXISTS `plan_user_documents`;
CREATE TABLE IF NOT EXISTS `plan_user_documents` (
  `id` int NOT NULL AUTO_INCREMENT,
  `rec_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `userid` int NOT NULL,
  `profilephoto` varchar(256) DEFAULT NULL,
  `aadharcard` varchar(256) DEFAULT NULL,
  `aadharcard_number` varchar(256) DEFAULT NULL,
  `pancard` varchar(256) DEFAULT NULL,
  `pancard_number` varchar(256) DEFAULT NULL,
  `cancelcheque` varchar(256) DEFAULT NULL,
  `lightbill` varchar(256) DEFAULT NULL,
  `bankstatement` varchar(256) DEFAULT NULL,
  `formsixteen` varchar(256) DEFAULT NULL,
  `salaryslip` varchar(256) DEFAULT NULL,
  `businessproof` varchar(256) DEFAULT NULL,
  `itreturn` varchar(256) DEFAULT NULL,
  `remarks` varchar(256) NOT NULL,
  `isVerified` tinyint NOT NULL DEFAULT '0' COMMENT '0=No, 1=Yes',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `plan_user_registration`
--

DROP TABLE IF EXISTS `plan_user_registration`;
CREATE TABLE IF NOT EXISTS `plan_user_registration` (
  `id` int NOT NULL AUTO_INCREMENT,
  `rec_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fullname` varchar(256) NOT NULL DEFAULT 'noname',
  `mobile` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(256) NOT NULL,
  `new_password` varchar(255) NOT NULL,
  `pincode` varchar(6) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(256) DEFAULT NULL,
  `usertype` int NOT NULL,
  `cardtype` int DEFAULT NULL COMMENT '11=Premium, 12=Platinum',
  `refcode` varchar(50) DEFAULT NULL,
  `gstno` varchar(256) DEFAULT NULL,
  `process_step` int NOT NULL DEFAULT '1',
  `isUser` int NOT NULL DEFAULT '0' COMMENT '0=None, 1=Steps, 2=Register',
  `iAgree` int NOT NULL DEFAULT '0' COMMENT '0=No, 1=Yes',
  `isDnd` tinyint NOT NULL DEFAULT '0' COMMENT '0=No, 1=Yes',
  `isActive` int NOT NULL DEFAULT '1' COMMENT '0=No, 1=Yes',
  `isDelete` int NOT NULL DEFAULT '0' COMMENT '0=No, 1=Yes',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int NOT NULL AUTO_INCREMENT,
  `rec_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `productname` varchar(256) NOT NULL,
  `productslug` varchar(256) NOT NULL,
  `amount` float(11,2) NOT NULL,
  `offeramount` float(11,2) NOT NULL,
  `inOffer` tinyint NOT NULL DEFAULT '0' COMMENT '0=No, 1=Yes',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `rec_date`, `productname`, `productslug`, `amount`, `offeramount`, `inOffer`) VALUES
(1, '2024-12-04 18:09:38', 'Digital Personal Loan', 'digital-personal-loan', 1499.00, 499.00, 1),
(2, '2024-12-04 18:09:38', 'Digital Business Loan', 'digital-business-loan', 1499.00, 499.00, 1),
(3, '2024-12-04 18:09:38', 'Card Offer', 'card-offer', 1499.00, 499.00, 1),
(4, '2024-12-04 18:09:38', 'Special Offer', 'special-offer', 1499.00, 499.00, 1),
(5, '2024-12-04 18:09:38', 'Bumper offer', 'bumper-offer', 1499.00, 499.00, 1),
(6, '2024-12-04 18:09:38', 'Star Offer', 'star-offer', 1499.00, 499.00, 1),
(7, '2024-12-04 18:09:38', 'Prime Offer', 'prime-offer', 1499.00, 499.00, 1),
(8, '2025-04-02 15:38:00', 'Mega Offer', 'mega-offer', 1499.00, 499.00, 1),
(9, '2026-04-20 10:19:31', 'Bharat Pro Finance', 'bharat-pro-finance', 1999.00, 499.00, 1),
(10, '2026-04-29 12:49:38', 'Super Offer', 'super-offer', 1999.00, 499.00, 1),
(11, '2026-04-30 14:27:29', 'Quick Offer', 'quick-offer', 1999.00, 499.00, 1);

-- --------------------------------------------------------

--
-- Table structure for table `razorpay_entry`
--

DROP TABLE IF EXISTS `razorpay_entry`;
CREATE TABLE IF NOT EXISTS `razorpay_entry` (
  `id` int NOT NULL AUTO_INCREMENT,
  `rec_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `entryfor` int NOT NULL DEFAULT '0' COMMENT '1=Customer, 2=Channel, 11=Digital PL, 12=Digital BL',
  `userid` int NOT NULL,
  `orderid` varchar(50) NOT NULL,
  `orderamount` float(11,2) NOT NULL,
  `ordernote` varchar(256) DEFAULT NULL,
  `referenceid` varchar(256) DEFAULT NULL,
  `txstatus` varchar(256) DEFAULT NULL,
  `paymentmode` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roipackages`
--

DROP TABLE IF EXISTS `roipackages`;
CREATE TABLE IF NOT EXISTS `roipackages` (
  `id` int NOT NULL AUTO_INCREMENT,
  `rec_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `loantype` int NOT NULL,
  `bankid` int NOT NULL,
  `roi` float(11,2) NOT NULL,
  `termsyears` float(11,2) NOT NULL,
  `termsmonths` int NOT NULL,
  `isDelete` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `schedule_slots`
--

DROP TABLE IF EXISTS `schedule_slots`;
CREATE TABLE IF NOT EXISTS `schedule_slots` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `language` tinyint NOT NULL DEFAULT '1' COMMENT '1=Hindi,2=English,3=Gujarati',
  `remarks` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` tinyint NOT NULL DEFAULT '1' COMMENT '1=Schedule,2=Completed,3=Cancelled,4=Not Reachable',
  `isDnd` tinyint(1) NOT NULL DEFAULT '0',
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `schedule_slots_user_id_foreign` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `site_options`
--

DROP TABLE IF EXISTS `site_options`;
CREATE TABLE IF NOT EXISTS `site_options` (
  `id` int NOT NULL AUTO_INCREMENT,
  `rec_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `option_key` varchar(255) NOT NULL,
  `option_value` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `site_options`
--

INSERT INTO `site_options` (`id`, `rec_date`, `option_key`, `option_value`) VALUES
(1, '2026-08-17 12:49:52', 'privacy-policy', '<p>The privacy of every user of Bharatfinpro is crucial for the company. This Privacy Policy mentions the data and information we gather about you, how we treat it, with whom we share it, and how we preserve and protect it.</p>\r\n\r\n<p>In the regular course of our business through this website, we gather your personal information through several sources, including:</p>\r\n\r\n<ul>\r\n	<li>Information from you, such as applications or other sources which includes your name, address, marital status, employment, assets and income; and</li>\r\n	<li>Information about you, your accounts, and your holdings and transactions that we receive from you or others, such as account custodians, brokers, and other financial services firms, banks, etc.</li>\r\n</ul>\r\n\r\n<p>We&#39;re also dedicated to protecting the users of our website by addressing potential privacy concerns. Our privacy guidelines apply to all users globally. This policy applies to all information, in whatever form, relating to Bharatfinpro&#39;s business activities across the world, and to all information handled by Bharatfinpro, relating to other companies and organizations with whom it deals. It also covers all IT and information communications facilities operated by Bharatfinpro or on its behalf.</p>\r\n\r\n<p>This Privacy Policy covers the security, information, IT equipment and use of Bharatfinpro, a company incorporated under the laws, presently in force in India and having its registered office at {{ # address #}}&nbsp;and all its affiliates. It also includes the use of email, internet, voice and mobile IT equipment. This policy applies to all Bharatfinpro Users, Clients, and employees (hereafter referred to as &lsquo;individuals&#39;).</p>\r\n\r\n<p>Subject to arbitration, only the courts and tribunals of Surat, Gujarat, shall have exclusive jurisdiction with respect to any suit, action or any other proceedings arising out of or in relation to the Loan Documents. Nothing contained in this clause shall limit any right of the Lender to commence any legal action or proceedings arising in relation to the Loan or the Loan Documents in any other court, tribunal or another appropriate forum, competent jurisdiction and the Borrower and/or the Guarantor hereby consent to that jurisdiction.</p>\r\n\r\n<p><strong>How Bharatfinpro manages and protects Your Personal Information:</strong></p>\r\n\r\n<p>Bharatfinpro doesn&rsquo;t sell or trade information about current or former clients to third parties. We may disclose your personal information as necessary to:</p>\r\n\r\n<ul>\r\n	<li>Effect, administer, or enforce a transaction that you request or authorize;</li>\r\n	<li>Process or service a financial product or service that you request or authorize; or</li>\r\n	<li>Maintain or service your account with us or with another entity.</li>\r\n</ul>\r\n\r\n<p>Bharatfinpro may also disclose your personal information and data for everyday business purposes to organizations or firms who provide consulting, technology or other services for us and agree to maintain its confidentiality; others, such as attorneys, trustees, family members, or others who are authorized to represent you, your estate, or a joint or co-owner of your account; regulatory agencies; or as we are otherwise permitted or required by law or process of law.</p>\r\n\r\n<p>Bharatfinpro restricts access to your personal information to our employees and to permitted third-parties who need to know that information to provide products or services for us, or to provide, process, or maintain any security, account, or investment product, service or program for you or your benefit. To protect your personal information from unauthorized access and use, we have adopted administrative, technical, and physical security procedures that comply with the Laws in India. These measures include computer safeguards and secured files and buildings.</p>\r\n\r\n<p><strong>What Bharatfinpro can do with your personal information:</strong></p>\r\n\r\n<p>We may use your personal information that we collect, or that is provided to us, for the following reasons:</p>\r\n\r\n<ol>\r\n	<li>Considering any application for an account or service;</li>\r\n	<li>Carrying out our business functions and activities;</li>\r\n	<li>Collecting amounts you owe us, including taking enforcement action;</li>\r\n	<li>Exercising our rights and fulfilling our obligations under any agreement with you;</li>\r\n	<li>Exercising our rights and fulfilling our obligations for the purposes of complying with all applicable laws, including those relating to money laundering, terrorist financing, bribery, corruption, tax evasion, fraud and similar; and managing all economic and trade sanction risks;</li>\r\n	<li>Generally administering and monitoring services provided to you (or any related entity); and</li>\r\n	<li>Providing you with information about our other services, or the services of selected third parties in which we think you may have an interest, including by post, telephone and electronic message &ndash; you can opt-out of receiving information about our other services and/or the services of selected third parties by informing us in writing.</li>\r\n</ol>\r\n\r\n<p><strong>Sharing of Personal Information with Third Parties:</strong></p>\r\n\r\n<p>Bharatfinpro does not sell, trade, or otherwise transfer to outside parties your personally identifiable information. This does not include trusted third parties who assist us in operating our website, conducting our business, or servicing you, so long as those parties agree to keep this information confidential. We may also release your information when we believe release is appropriate to comply with the law, enforce our site policies, or protect our or others&#39; rights, property, or safety. However, non-personally identifiable visitor information may be provided to other parties for marketing, advertising, or other uses.</p>\r\n\r\n<p><strong>Security and Confidentiality:</strong></p>\r\n\r\n<p>The protection and security of your personal information are important to us. We generally follow industry-standard information security tools and measures, as well as internal procedures and strict guidelines to prevent information submitted to us, both during transmission and once we receive it from misuse and data leakage. No method of transmission over the internet, or method of electronic storage, is 100% secure, however. Therefore, while we strive to use commercially acceptable means to protect your personal information, which considerably reduces the risks of data misuse, we cannot guarantee its absolute security. To notify the Company about any security vulnerability or potential data breach, please contact us at: support@bharatfinpro.com and we will take the appropriate measures to address such an incident, as deemed necessary.</p>\r\n\r\n<p>Our employees can access the information on a &quot;need-to-know&quot; basis and are subject to confidentiality obligations.</p>\r\n\r\n<h3>DATA ACCURACY</h3>\r\n\r\n<p>Personal Data must be accurate and, where necessary, kept up to date. It must be corrected or deleted without delay when inaccurate. It is advisable that you ensure that the Personal Data we use and hold is accurate, complete, kept up to date and relevant to the purpose for which we collected it. You must check the accuracy of any Personal Data at the point of collection and at regular intervals afterwards. You must take all reasonable steps to destroy or amend inaccurate or out-of-date Personal Data.</p>\r\n\r\n<h3>LIMIT OF LIABILITY</h3>\r\n\r\n<p>We shall not be liable for any confusion caused as a result of any of your actions or omission of any action, anything as a result of your viewing, reading or listening of any content. Although we will do our best to provide constant, uninterrupted access to our website, we accept no responsibility or liability for any interruption or delay.</p>\r\n\r\n<p>In no event will our total liability to you for all damages arising from your use of the service or information, materials or products included on or otherwise made available to you through the service exceed the amount you paid for the service related to your claim.</p>\r\n\r\n<p>We have no liability for any loss, damage or misappropriation of your files under any circumstances or for any consequences related to changes, restrictions, suspension or termination of your service or the agreement. These liabilities shall apply to you even if their remedies shall fail their essential purpose.</p>\r\n\r\n<h3>USAGE OF ADVERTISING ID</h3>\r\n\r\n<p>When you are using our application that incorporates our Services, we may also automatically record your Google and/or any other Advertising ID (if you are using an Android device) or your Advertising Identifier (IDFA - if you are using an IOS device; together with the Google and/or any other Advertising ID-&quot;Mobile Advertising IDs&quot;), for advertising or analytics purposes. The said Advertising ID is an anonymous identifier, provided by Google. If your device has an Advertising ID, we may collect and use it for advertising and user analytics purposes. If your device does not have an Advertising ID, we may use other persistent identifiers. The information collected may also be stored on your device. You can reset your mobile Advertising ID or opt-out of receiving targeted ads through your mobile Advertising IDs which are provided in our settings.</p>\r\n\r\n<h3>COMPLIANCE &amp; COOPERATION WITH REGULATORS</h3>\r\n\r\n<p>We regularly review this Privacy Policy and make sure that we process your personal information in ways that comply with regulations currently in force in India. We firmly comply with legal frameworks including data protection laws relating to the transfer of data.</p>\r\n\r\n<h3>CONSENT</h3>\r\n\r\n<p>By using our website, you consent to our website&#39;s Privacy Policy. The usage of the website shall be construed as an acceptance of the Privacy Policy.</p>\r\n\r\n<h3>GRIEVANCES</h3>\r\n\r\n<p>For any complaints and/or inquiries, you can send us formal written inquiries or complaints at {{ # email # }}. All inquiries and/or complaints shall be examined and will be resolved expeditiously. Our team of experts will respond by contacting the person who made such inquiries and/or complaints. We work with the appropriate regulatory authorities, including local data protection authorities, to resolve any complaints regarding the transfer of your data that we cannot resolve with you directly.</p>\r\n\r\n<h3>MODIFICATION OF THE POLICY</h3>\r\n\r\n<p>We reserve the right to modify this Privacy Policy at our own independent decision at any time. If the changes are significant, the Company shall spare no efforts to apprise its clientele and provide a prominent notice (including, for certain services, email notification of Privacy Policy changes). It is pertinent to remember that it shall be the Clients&#39; responsibility to read the Policy as amended every once in a while.</p>\r\n\r\n<h3>USAGE OF COOKIES/COOKIES POLICY</h3>\r\n\r\n<p>Cookies are small files that a site or its service provider transfers to your computer&#39;s hard drive through your web browser with your permission which enables the site or service provider&#39;s systems to recognize your browser and capture and remember certain information. We use cookies to help us understand and save your preferences for future visits, keep track of advertisements and compile aggregate data about site traffic and site interaction so that we can offer better site experiences and tools in the future.</p>\r\n'),
(2, '2023-08-17 15:26:45', 'terms-conditions', '<p>The following are the terms and conditions for Customers and Employees. So, these will apply as per your role.</p>\r\n\r\n<p>Bharatfinpro Private Limited wishes to procure the services under the terms and conditions set forth and the user/customer wishes to be associated with these terms and conditions.</p>\r\n\r\n<p>Therefore, in consideration of the agreements contained in this, the parties, intending to be legally bound, agree to the authenticity of the following:</p>\r\n\r\n<ul>\r\n	<li>Information from you, such as applications or other forms (which include your name, address, marital status, employment, assets and income); and</li>\r\n	<li>Information about you, your accounts, and your holdings and transactions that we receive from you or others, such as account custodians, brokers, and other financial services firms, banks, etc.</li>\r\n</ul>\r\n\r\n<p>If the company by any source comes across by anyone bad-mouthing or defaming the company&#39;s reputation or company&#39;s members then strict legal action will be taken against the individual or group.</p>\r\n\r\n<p>We&#39;re also serious about protecting our users by addressing potential privacy concerns. Our terms and condition guidelines apply to all users across the world. These terms and conditions apply to all information, in whatever form, relating to Bharatfinpro Private Limited&#39;s business activities worldwide, and to all information handled by Bharatfinpro Private Limited, relating to other organizations with whom it deals. It also covers all IT and information communications facilities operated by Bharatfinpro Private Limited or on its behalf.</p>\r\n\r\n<h3>MEMBERSHIP CARD TERMS AND CONDITIONS AND RETURN POLICY:</h3>\r\n\r\n<ol>\r\n	<li>Membership Card fee is refundable only as per the company&rsquo;s Refund &amp; Return Policy.</li>\r\n	<li>The Bharatfinpro Private Limited Membership Card is not transferable and is only valid up to its date of expiry and the card may not be used by any person other than the cardholder.</li>\r\n	<li>The Membership Card is not a payment card or credit card.</li>\r\n	<li>Renewal terms and conditions are at the discretion of Bharatfinpro Private Limited.</li>\r\n</ol>\r\n\r\n<h3>CUSTOMER TERMS AND CONDITIONS:</h3>\r\n\r\n<ol>\r\n	<li>Membership Card fee is refundable only as per the company&rsquo;s Refund &amp; Return Policy.</li>\r\n	<li>The company only takes the cost of the Membership Card. No other tip of service is charged.</li>\r\n	<li>The membership card is not an ATM, DEBIT, or CREDIT CARD. Customers can use that card only for loan purposes with given benefits. Also, buying a Membership Card lets you apply for a loan and it doesn&rsquo;t guarantee loan approval as the final loan approval depends on the banks and the customer profile. If the loan is rejected, you can still avail other benefits of the Membership Card.</li>\r\n	<li>If a customer is viewing any advertisement/promotional content of the company and then approaching the company thinking that he/she will get the loan approval based on the advertisement, then it must be noted that loan application will only be submitted once the customer buys Bharatfinpro Private Limited&rsquo;s Membership Card. Even after buying the membership card, the final loan approval depends on the bank(s) and customer profile. If the customer&rsquo;s profile doesn&rsquo;t match loan eligibility criteria, he/she won&rsquo;t be able to get a loan. Still, they can avail other benefits of the membership card.</li>\r\n	<li>Membership Cards can be used by the customer or referral person.</li>\r\n	<li>If customer reference does payment through customer own referral link which is provided by the company and if that shows in customer&#39;s portal then the only company will give the payout of that customer.</li>\r\n	<li>If the customer loan is approved in our company and he/she denies that loan approval then the card payment would not be refundable.</li>\r\n	<li>The documents, cheques, and OTP that the company&#39;s employee asks the customer is for the processing of the loan, the company is not responsible if any problems/disputes arise in the future.</li>\r\n	<li>If you do not give an OTP to the company&#39;s employee for the loan process, then your file will be rejected. (According to the criteria, if your file matches without OTP, your loan will be processed).</li>\r\n	<li>If our company&#39;s executive asks you for any transaction OTP, do not provide that transaction OTP.</li>\r\n	<li>If a customer has any queries regarding the loan process then he/she would have to contact that department where their files are in process.</li>\r\n	<li>We will verify your documents in multiple banks; so whatever documents are submitted by customers in our company that will match with any bank criteria, in that bank only we will proceed with the loan process. (For example, if your file will match in 2 banks then our company&#39;s login department will log in your document only on that 2 banks. The verification is done by the company&#39;s employee. The company or bank will not give any proof for that.</li>\r\n	<li>The document will be verified by the company in multiple banks. If your documents match the criteria of the bank, then the login process will be done in that bank. If your documents do not match the criteria of a bank, the company will give you a solution. You can take the solution and reapply.</li>\r\n	<li>It is not fixed that the customer file will be logged in only certain banks. It may be verified in other banks also, depending on the customer file.</li>\r\n	<li>Our company is not taking extra charges other than membership card charges. If any third-party charges you then our company is not responsible for that.</li>\r\n	<li>There are no processing or file charges for customer loan approval. There is only one charge and that&#39;s only for the Membership Card - for a validity of 1&nbsp;years.</li>\r\n	<li>If a customer file is logged in uncoded banks, then the customer has to pay charges separately.</li>\r\n	<li>Our company will log in customer files as per their requirements. (Example: If customer requirement is INR 2 lakhs and if some bank criteria are up to INR 1 Lakh then we will not log in their file in that bank.</li>\r\n	<li>If the customer explains to us their profile and questions us whether the loan will be approved or not, to answer that, the loan approval estimated ratio is 60% and 40% means 60% chances of approval and 40% chances of rejection. So, If your file gets rejected in our company then the customer shouldn&#39;t argue for that. Because the company is not taking any guarantee for the loan.</li>\r\n	<li>Once the customer file is rejected in our company then any bank can reopen that file for processing. But code activation time is dependent on various banks, ranging from 3 to 4 months. If approval will come from that bank within that code activation time then only company reference would be applicable. So, the customer would not have any doubt that the loan has been taken from his/her own or someone else&#39;s reference. After a code deactivation, if the loan is approved by that bank then there is no responsibility of our company.</li>\r\n	<li>Wherever the customer file is logged in by the company, these details will not be given to any customer in written or digital form.</li>\r\n	<li>Whatever documents submitted by the customer are secure in our company. We are using those documents only for loan purposes. If documents are misused by any other sources, then the company will not be responsible for that.</li>\r\n	<li>Loan offers and pre-approval loans process depends only on the bank&#39;s rules and that type of loan will be given only on customer behaviour. So, there is so much difference between that type of process and the company&#39;s process. If that loan is approved by another company then the customer can&#39;t blame our company.</li>\r\n	<li>Loan approval depends on your profile so if your documents are perfect then you will get a loan from our company.</li>\r\n	<li>The loan information is only given to that person who has applied for the loan.</li>\r\n	<li>During the loan processing time, if any customer would not be in contact with us for 3 days, then that file will be rejected by our company.</li>\r\n	<li>If your file is rejected in our company, then the customer has to make sure that they have to re-submit their documents with the solution in our company after 6 months.</li>\r\n	<li>The company is not responsible if the customer loan is rejected by queries.</li>\r\n	<li>If your file gets rejected in our company then also membership card payment would not be refundable.</li>\r\n	<li>After processing if the customer cancels the file, then Membership Card payment is not refundable.</li>\r\n	<li>If the customer will apply for the first time but his/her loan is rejected in our company then the company will give them reason and solution for that. So at re-applying time if the customer will not re-submit a file with a solution then the file will be again rejected in our company for the same reason.</li>\r\n	<li>The company will provide only the reason for rejection to the customer and it would not be provided in the form of hard or soft copy. Some banks only provide general reasons, they don&#39;t give us any specific reason so the customer should not complain about that.</li>\r\n	<li>The customer has to give correct information about their CIBIL SCORE and PROFILE. If the customer gives wrong information, then the company will not be responsible for loan rejection.</li>\r\n	<li>The company will not be providing any CIBIL REPORT or VALUATION REPORT in digital or hard copy to any customer in any situation.</li>\r\n	<li>Bank charges are applicable as per banks rules and regulations.</li>\r\n	<li>The company will take legal action against the customer who submitted fake documents.</li>\r\n	<li>After logging in your file, the customer has to contact only the login department, not any telecaller or other department.</li>\r\n	<li>The person who has already applied for a loan in the same bank, then our company will not apply in that bank.</li>\r\n	<li>During the loan process if the rules of any bank change, then we have to follow those new rules.</li>\r\n	<li>The person who needs a loan only has to apply for the loan process.</li>\r\n	<li>The customer has to give their registered phone number for being contacted by the login department.</li>\r\n	<li>After completing the loan process, the customer has to cancel their cheque by visiting the concerned bank only.</li>\r\n	<li>During the loan processing time, if the company gets any queries and it is not solving that in the given time, then the company can take more time for that. So, the customer must not complain about the same.</li>\r\n	<li>If the customer wants to reapply in our company after file rejection or approval, then he/she has to re-submit their documents in the customer login menu.</li>\r\n	<li>When you are applying for a loan on our website, we are showing you only your Eligibility for the loan. So whatever details you enter on the website are accepted by software only, and that only shows your pre-approval and not your final approval. Approval only depends on your documents. We are not giving you any guarantee for that.</li>\r\n	<li>The Membership Card is shown on our websites during the processing time, which shows only for demo purposes. So that&#39;s not your real membership card. In that, whatever details are entered by the customer are accepted by the software and the system shows you the pre-approval depending on the customer details. The customer will get a card after completing the entire process of the loan on our website.</li>\r\n	<li>The company&#39;s privacy policy, terms and conditions are also applicable to marketing and advertising.</li>\r\n	<li>Marketing contains any advertisement, page update, post, video, SMS, E-mails, banners, social media updates or any type of content.</li>\r\n	<li>The customer&#39;s payment is executed by third-party payment sources. So whenever payment would be received by the company then only membership cards or codes will be generated. If a customer&#39;s payment would be debited from his/her account but we don&#39;t receive any payment in the company&#39;s account then the company will not be responsible for that.</li>\r\n	<li>For any customer&#39;s payout, Account verification is compulsory. If your account is not verified in our company and once payment is credited from the company&#39;s account then the company is not responsible for entertaining any queries.</li>\r\n	<li>Our company is a private limited company and we are tied up with banks so we are providing loans through banks only.</li>\r\n	<li>Multiple banks&#39; logos are shown on our website only for our company&#39;s marketing purpose. That banks&#39; logos only show that our company is tied up with those banks. That&#39;s not any bank&#39;s advertisement.</li>\r\n	<li>If anyone takes any legal action against the company then only our legal advisor would be dealing with that and Surat, Gujarat will only remain the junction for any legal procedure. No one would be able to contact any employee or director of our company.</li>\r\n	<li>A vocal statement would not be acceptable. Only the signed agreements would be acceptable for any customer.</li>\r\n	<li>The detailed terms and conditions are with the head office which is the core baseline to all the above-stated terms and conditions.</li>\r\n	<li>There are no age eligibility criteria for buying a membership card. Banks and NBFCs have their age criteria which everyone has to follow.</li>\r\n	<li>For referral payout, the customer will have to complete the payout agreement with Bharatfinpro Private Limited; without an agreement, no payout will be given to anyone.</li>\r\n</ol>\r\n\r\n<h3>REFERENCE TERMS AND CONDITIONS:</h3>\r\n\r\n<ol>\r\n	<li>Reference payout would be given to them as per rules and regulations of our company.</li>\r\n	<li>Our company will give payout only on membership cards; it does not depend on reference approval or rejection.</li>\r\n	<li>Whether the customer loan is approved or not, that only depends on the customer profile and the company does not give any guarantee for that.</li>\r\n	<li>If customers are giving a reference in our company for loan purposes, for that we have some criteria. The customer has to give a reference based on that criteria. The company is not giving you any type of guarantee for the loan approval in any situation at any cost so customers who give a reference have to agree with the decision of that file&#39;s login department.</li>\r\n	<li>The Company will not take any responsibility for any fake commitments given by the referral person.</li>\r\n	<li>The Customer&#39;s terms and conditions are also applicable for the reference persons.</li>\r\n	<li>Reference customer&#39;s payment is done through third-party payment sources. So whenever payment would be received by the company then only the membership card or code will be generated. If the customer&#39;s payment is debited from his/her account but the company doesn&#39;t receive any payment in the company&#39;s account then the company will not be responsible for any queries.</li>\r\n	<li>During loan offers, if any reference customer will do the online loan process then the company will give the payout up to 35% of membership (349.64/-)&nbsp;per membership card to the customer. But before that, invoice generation is most important for any payout process.</li>\r\n	<li>If the customer of reference will do an online process then the customer&#39;s payout will be given to the referral partner. But during processing time, if the company would refund that amount to the customer for any reason, then that customer&#39;s payout will be cut out from the reference person&#39;s next payout.</li>\r\n	<li>Any customer of reference will do an online process and that customer&#39;s payout will be pending from our company and during processing time if the company refunds that amount to the customer for any reason then that customer&#39;s payout will be cut out from the reference person&#39;s current payout.</li>\r\n	<li>Whatever documents are submitted by a reference person, they will be secure in our company. If documents will be misused by any other sources in future then our company is not responsible for that.</li>\r\n	<li>If a referral partner would not submit their agreement to the company within 30 days then all payout of their customers would be cancelled.</li>\r\n	<li>If anyone takes any legal action against the company then only our legal advisor would be dealing with that and Surat, Gujarat remains the only junction for any legal procedure. No one can contact any employee or director of our company.</li>\r\n	<li>A vocal statement would not be acceptable. Only the signed agreement would be acceptable for any referral person.</li>\r\n	<li>The detailed terms and conditions are with the head office which is the core baseline to all the above-stated terms and conditions.</li>\r\n	<li>For referral Payout, the customer will have to complete the payout agreement with Bharatfinpro Private Limited, without agreement no payout will be given to anyone.</li>\r\n</ol>\r\n\r\n<h3>GENERAL TERMS AND CONDITIONS:</h3>\r\n\r\n<ol>\r\n	<li>If the login department fails to solve the customer queries with accuracy, dedication and responsibility, then the login department agency will be cancelled by the company.</li>\r\n	<li>The Customer&#39;s loan process will take more days due to any festival.</li>\r\n	<li>The Company&#39;s privacy policy, terms and conditions are also applicable to marketing and advertising.</li>\r\n	<li>If anyone has GST then they have to add the GST number in their portal. So Company will provide a GST RETURN to them.</li>\r\n	<li>The Company is using Blogs for their advertising, so that content could be of the third party, so the company doesn&#39;t take guarantee of the information to be correct or incorrect.</li>\r\n	<li>If the customer has any dispute or query regarding the company&#39;s policy, product or service, he/she will have to accept the company&#39;s stated solution only.</li>\r\n	<li>If customers, employees, any other person, or any other party has a problem with the company then they have to inform that problem to our company through notice; so, we can try to give you a solution of that but after that, any of them want to take a legal action then they have to inform the company through notice. Only then, the legal process will be started.</li>\r\n	<li>If customers, employees, any other person, any other third party has a problem with the company, then they have to accept the solutions provided by the company.</li>\r\n	<li>The Company can change terms and conditions at any time and the same would be effectively applied to all the departments.</li>\r\n	<li>&nbsp;If the customer has taken the services of the company, then the company will be able to use customer photos and names for Testimonials on any platform.</li>\r\n	<li>The documents, cheques, and OTP that the company&#39;s employee asks the customer is for the processing of the loan, the company is not responsible if any problems/disputes arise in the future.</li>\r\n	<li>During any process on the website, if there is any kind of mistake that happens due to the software or website technical problems, the final decision on such disputes can only be taken by the company and it has to be accepted by anyone concerned.</li>\r\n	<li>The Company&#39;s authorized person can change any rules and regulations at any time; the concerned person must be regularly updated with the company&rsquo;s terms and conditions and has to accept them unconditionally.</li>\r\n	<li>All the commitments made by the company&rsquo;s employees (any employee/person from the company), telecallers, or salespersons, etc. should be cross-checked by any concerned person (customer) from the Terms &amp; Conditions section of Bharatfinpro.com before availing any of the company&rsquo;s services. Only the rules and regulations stated on the company website will be considered official.</li>\r\n	<li>All the detailed criteria, terms, and information behind any of the company&rsquo;s concise promotional content (social media ads, banners, SMS, advertisements, emails, etc.) are stated in the Terms &amp; Conditions and Privacy Policy sections of the website. Any concerned person (customer, employee, etc.) must check and accept all the rules and regulations before availing any of the company&rsquo;s services.</li>\r\n	<li>If any Customer Referral&rsquo;s customer gets a refund (due to any dispute like payment gateway problem or any other issue) then the referral payout will not be provided (if provided, it would be deducted from the next payout of the customer referral).</li>\r\n	<li>While generating the payout for Customer Referrals, the company uses a third-party payment gateway. So, if the payout is stuck and put on hold due to any payment gateway issue (or any other issue), then the payout would be delayed and all the terms and conditions of the third-party payment gateway would be applied. In such cases, the payout will be released only when the third-party payment gateway releases the stuck payment. In case of a payout dispute with any bank, the bank&rsquo;s criteria will be applied and the payout will be released only when the bank approves the payment.</li>\r\n	<li>If there is any dispute that arises between any concerned user (customer, customer referral, etc.) and the company, their account will be disabled immediately by the company. In such a case, the user would be needed to contact the company for any query.</li>\r\n	<li>Though in the company&rsquo;s promotional content it might be communicated that a person can get a personal loan in just 45 minutes or a business loan in just 60 hours, the actual loan processing time depends on the rules and regulations of various banks (or the concerned bank). Every customer or any other user must accept this clause and consider the bank&rsquo;s loan processing time only.</li>\r\n	<li>The loan-related figures, rates, and information used in the promotional content of the company are general and for promotional purposes. The final nature and specifics of the loan in terms of the loan amount, interest rate, repayment tenure, loan processing fees, loan insurance, etc., depends solely on the customer profile and the rules and regulations stated by the concerned bank. The final loan details depend on the criteria set by the concerned bank(s).</li>\r\n	<li>Bharatfinpro Private Limited&#39;s company name, logo, content, business concept, software and system, pattern, website structure and design, and business process and offers are copyrighted with the company. If any individual or organization uses/copies any of the above-mentioned by even 1%, legal action may be taken against them.</li>\r\n	<li>If any person (customer, employee, etc.) is involved in any of the company&#39;s processes then the company is authorized to record the phone calls with that person.</li>\r\n	<li>If any customer applies for a loan in our company and if any other external person/organization commits fraud with that customer in terms of taking money from you or in any other way then, it will not be the company&rsquo;s responsibility for any kind of loss faced by the customer.</li>\r\n	<li>If any customer data &amp; information, KYC documents, or OTP is misused in future by any third-party, our company and its directors, employees, channel partners, or associate partners, cannot be held responsible for the same in any matter whatsoever including any loss, harm, or damage due to the usage of information from the portal. Customers are advised to bring in their own discretion in such matters. The information provided on the website is of financial nature. It is a mutual understanding that customers association with the website will be at the customer&#39;s will, preference and risk.</li>\r\n	<li>If any customer&rsquo;s documents are found to be fraud by the bank/financial institution or there&rsquo;s any sort of an issue with any customer&rsquo;s repayment of the loan to the banks/financial institution &ndash; then these matters have to be solely between the customer and the bank/financial institution. Our company and its directors, employees, channel partners, or associate partners cannot be held responsible in such cases. If the customer documents are found to be fake and fraud and are used anywhere for any purpose, the company cannot be held responsible for the same.</li>\r\n	<li>If any third-party gets a loan approved on someone else&rsquo;s identity and documents, then our company and its directors, employees, channel partners, or associate partners cannot be held responsible.</li>\r\n	<li>If any of the company&rsquo;s customers or any third-party wants a legal course, action and proceedings with the company, then only the company&rsquo;s legal team can be involved. There will absolutely be no involvement of the company&rsquo;s directors, channel partners, associate partners, or employees in any legal proceeding. For any legal action or proceeding involving our company, Surat, Gujarat shall remain the only jurisdiction.</li>\r\n</ol>\r\n\r\n<h3>USAGE OF COOKIES / COOKIES POLICY</h3>\r\n\r\n<p>Cookies are small files that a site or its service provider transfers to your computer&#39;s hard drive through your web browser with your permission which enables the site or service provider&#39;s systems to recognize your browser and capture and remember certain information. We use cookies to help us understand and save your preferences for future visits, keep track of advertisements and compile aggregate data about site traffic and site interaction so that we can offer better site experiences and tools in the future.</p>\r\n'),
(3, '2024-10-30 17:28:52', 'welcome-status', '1'),
(4, '2025-03-15 09:49:19', 'welcome-message', ''),
(5, '2022-05-31 19:57:09', 'disclaimer', '<p>Bharatfinpro and its customers and employees use and present www.bharatfinpro.com (the &ldquo;Website&rdquo;) for personal and informational purposes only. In addition, we further expressly disclaim any warranties or representations (expressed or implied) in respect of quality, suitability, accuracy, reliability, completeness, timeliness, performance for a particular purpose or legality of the services listed or displayed or transacted or the content on the website. You must not perceive and construe any such information or other material as legal, tax, investment, financial, or other advice. You completely acknowledge and undertake that you are accessing the services on the Bharatfinpro website and transacting at your own risk only and are using your best and prudent judgement before entering into and making any transactions through the website. You alone assume the sole responsibility of evaluating the merits and risks associated with the use of any information or other Content contained on the Bharatfinpro Website before making any decisions based on such information or other Content.</p>\r\n\r\n<p>Nothing contained on our Website constitutes a solicitation, recommendation, endorsement, or offer by Bharatfinpro to buy or sell any securities or other financial instruments in this or in any other jurisdiction in which such solicitation or offer would be unlawful under the securities laws of such jurisdiction. You further acknowledge that at no time shall any right, title or interest in the services sold through or displayed on the website vest with Bharatfinpro nor shall Bharatfinpro have any obligations or liabilities in respect of any transactions on the website.</p>\r\n\r\n<p>After you enter your details on our website for any purpose, the company takes no responsibility in case you come across instances of data misusage of any form.</p>\r\n'),
(6, '2026-08-13 10:42:23', 'facebookpixel', '#'),
(7, '2026-08-13 10:42:20', 'facebookdomain', '#'),
(8, '2025-03-15 09:49:07', 'account-msg-customer', ''),
(9, '2021-07-08 14:26:40', 'account-msg-channel', ''),
(10, '2026-08-12 11:52:01', 'newinvoiceno', '20223'),
(11, '2026-08-17 12:50:20', 'refund-policy', '<h4 dir=\"ltr\"><strong>REFUND &amp; RETURN POLICY</strong></h4>\r\n\r\n<p dir=\"ltr\"><strong>What are the criteria for our customers to Request a Refund?</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p dir=\"ltr\"><strong>1. A customer can be eligible for a refund if an email requesting a refund is sent by the customer (with the registered email id) to {{ # email # }} within 48 hours of purchasing the membership plan. The payment mode for the refund will be the same as the mode through which the customer&#39;s payment was received. As per the banks, the refund can be received within 7 to 8 working days.</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p dir=\"ltr\"><strong>2. If the customer is unable to communicate with the company in English, Hindi, or Gujarati, they can apply for a refund within 48 hours of purchasing the membership plan.</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p dir=\"ltr\"><strong>3. There are certain areas/locations in which our company does not provide its services. If any customer has bought our membership plan and belongs to such areas/locations, they can apply for a refund within 48 hours of purchasing the membership plan.</strong></p>\r\n\r\n<p><br />\r\n<strong>If you have any query/doubt regarding our policy, please contact us by writing at {{ # email # }} &nbsp;or calling on {{ # mobile # }} between 10 AM to 5 PM (business days only).</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n');
INSERT INTO `site_options` (`id`, `rec_date`, `option_key`, `option_value`) VALUES
(12, '2022-03-30 13:37:27', 'customer-legal-agreement', '<ol>\r\n	<li>Under any circumstances, the Membership Card fees won&rsquo;t be refunded.</li>\r\n	<li>Only the charge of the Membership Card will be taken by the company; no other payment is charged by the company.</li>\r\n	<li>It must be noted that the Membership Card provided by the company is not an ATM, DEBIT, or CREDIT CARD. This card must be used for loan purposes and certain other benefits provided by the company.</li>\r\n	<li>The customer or the referral person can use this Membership Card.</li>\r\n	<li>If a customer reference makes a payment via the customer&rsquo;s own referral link which is provided by the company &ndash; &nbsp;and if it reflects in the customer&#39;s portal then only the company will release the payout of that customer.</li>\r\n	<li>In case a customer&rsquo;s loan is approved in our company but the customer denies taking the loan &ndash; still the Membership Card fees won&rsquo;t be refunded.</li>\r\n	<li>The login department&rsquo;s decision would be final for your loan process.</li>\r\n	<li>The OTP asked by the company&rsquo;s employee is for loan purposes &ndash; if any issue/problem arises in future, the company won&rsquo;t be responsible for the same.</li>\r\n	<li>If you do not share the OTP (for loan purposes) with the company&rsquo;s employee, your file will be rejected. As per the criteria, if your file matched without OTP, the loan will be processed further.</li>\r\n	<li>If the company executive asks you to share any transaction OTP, kindly do not share it.</li>\r\n	<li>In case any customer has any questions/queries regarding the loan process, they have to contact that department where their file is being processed.</li>\r\n	<li>We will verify your documents in multiple banks; so whatever documents are submitted by customers in our company that will match with any bank criteria, in that bank only we will proceed with the loan process. (For instance, if your file will match in 3 banks then our company&rsquo;s login department will log in your document only on that 3 banks. The verification is done by the company&rsquo;s employee. The company or bank won&rsquo;t provide any proof for that.</li>\r\n	<li>Your loan documents will be verified by the company in multiple banks. If the documents match the bank criteria, then the login process will be done in that bank. In case it doesn&rsquo;t match, the company will provide a solution which you can consider and reapply.</li>\r\n	<li>It is not fixed that the customer file will be logged in only certain banks. It may be verified in other banks also, depending on the customer file.</li>\r\n	<li>The company doesn&rsquo;t charge anything extra other than the Membership Card fees. If any other external person or third-party charges you then our company won&rsquo;t be responsible for the same.</li>\r\n	<li>The company doesn&rsquo;t charge for processing or file charges for customer loan approval. Only the Membership Card fee is charged by the company.</li>\r\n	<li>If a customer file is logged in uncoded banks, then the customer has to pay charges separately.</li>\r\n	<li>The customer files will be logged in by the company according to the customer&rsquo;s requirements. For instance, If the customer requirement is INR 2 lakhs and if some bank criteria is up to INR 1 Lakh then we will not log in customer file in that bank.</li>\r\n	<li>If the customer shares their profile and asks us whether the loan will be approved or not; so, the answer to this question would be &ndash; the loan approval estimated ratio is 60% and 40%. It means that there are 60% chances of approval and 40% chances of rejection. So, If your file gets rejected in our company then the customer shouldn&rsquo;t argue for that. Because the company is not taking any guarantee for the loan.</li>\r\n	<li>Even if the customer file is rejected in our company, any bank can reopen that file for processing. But code activation time is dependent on various banks, ranging from 3 to 4 months. If approval will come from that bank within that code activation time then only company reference would be applicable. So, the customer would not have any doubt that the loan has been taken from his/her own or someone else&rsquo;s reference. After a code deactivation, if the loan is approved by that bank then there is no responsibility of our company.</li>\r\n	<li>Wherever the customer file is logged in by the company, such information and details will not be given to any customer in written or digital form.</li>\r\n	<li>All the documents submitted by the customer are safe and secure in our company. We are using those documents only for loan purposes. In case the documents are misused by any other sources, then the company won&rsquo;t be responsible for the same.</li>\r\n	<li>Loan offers and pre-approval loans process is dependent only on the bank&#39;s rules and that type of loan will be given only on customer behaviour. So, there exists some difference between that type of process and the company&rsquo;s process. In case that loan is approved by another company then the customer can&rsquo;t blame our company.</li>\r\n	<li>Loan approval depends on your profile so if your documents are perfect then you will get a loan from our company.</li>\r\n	<li>Any information regarding the loan is only provided to that person who has applied for the loan.</li>\r\n	<li>During the loan processing time, if any customer would not be in contact with us for 3 days, then that file will be rejected by our company.</li>\r\n	<li>In case your file is rejected in our company, then the customer has to ascertain that they re-submit their documents with the solution in our company after a period of 6 months.</li>\r\n	<li>The company won&rsquo;t be responsible in case the customer loan is rejected by queries.</li>\r\n	<li>In case your file gets rejected in our company, then also the membership card payment remains non-refundable.</li>\r\n	<li>After processing, in case the customer cancels the file, then also the Membership Card payment remains non-refundable.</li>\r\n	<li>If the customer will apply for the first time but his/her loan is rejected in our company then the company will give them reason and solution for that. So at re-applying time, if the customer will not re-submit the file with a solution then the file will again face rejection in our company for the same reason.</li>\r\n	<li>The company will give only the reason for rejection to the customer and it would not be provided in hard or soft copy. Banks only provide general reasons, they don&rsquo;t give us the specific reason &ndash; so the customer should not complain about that.</li>\r\n	<li>The customer must give correct information about their CIBIL SCORE and PROFILE. If the customer will provide the wrong information, then the company holds no responsibility for loan rejection.</li>\r\n	<li>Under any situation, the company will not be providing any CIBIL REPORT or VALUATION REPORT in digital or hard copy to any customer.</li>\r\n	<li>Bank charges are applied according to the banks&#39; rules and regulations.</li>\r\n	<li>In case a customer submits fake documents, the company will take legal action against that customer.</li>\r\n	<li>After logging in your file, the customer has to contact only the login department &ndash; and not any telecaller or other department.</li>\r\n	<li>The person who has already applied for a loan in the same bank, then our company will not apply in that bank.</li>\r\n	<li>During the loan process if the rules of any bank change, then the company will have to follow those new rules.</li>\r\n	<li>Only the person who needs a loan has to apply for the loan process.</li>\r\n	<li>The customer has to give their registered phone number so that the login department can contact the customer.</li>\r\n	<li>Once the loan process is completed, the customer has to cancel their cheque by visiting the concerned bank only.</li>\r\n	<li>At the time of loan processing, if the company gets any queries and it is not solving that in the given time, then the company can take more time for that. So, the customer must not argue or complain about this.</li>\r\n	<li>In case the customer wants to reapply in our company after file rejection or approval, then the customer has to re-submit their documents in the customer login menu.</li>\r\n	<li>When you are applying for a loan on our website, we are showing you only your Eligibility for the loan. So whatever details you enter on the website are accepted by software only, and that only shows your pre-approval and not your final loan approval. The final loan approval depends on your documents. We are not giving you any guarantee for the final loan approval.</li>\r\n	<li>The Membership Card is shown on our websites during the processing time, which are only for demo purposes. So that&rsquo;s not your real membership card. In that, whatever details are entered by the customer are accepted by the software and the system shows you the pre-approval depending on the customer details. The customer will get a card after completing the entire process of the loan on our website.</li>\r\n	<li>The company&rsquo;s privacy policy, terms and conditions are also applicable to marketing and advertising.</li>\r\n	<li>Our marketing contains advertisements, page updates, posts, videos, SMS, E-mails, banners, social media updates or any type of content.</li>\r\n	<li>The third-party payment sources execute the customer&rsquo;s payment. So, whenever payment would be received by the company then only the membership card will be generated. If a customer&#39;s payment would be debited from their account but the company doesn&rsquo;t receive any payment in the company&#39;s account then the company holds no responsibility for the same.</li>\r\n	<li>Account verification is compulsory for any customer&#39;s payout. If your account is not verified in our company and once payment is credited from the company&#39;s account then the company is not responsible for answering any of the questions/queries/doubts.</li>\r\n	<li>Our company is a private limited company and we are tied up with banks so we are providing loans through banks only.</li>\r\n	<li>Multiple banks&rsquo; logos are displayed on our portal &ndash; they are shown only for our company&rsquo;s marketing purposes. That banks&rsquo; logos only reflect that our company is tied up with those banks. That&rsquo;s not any bank&rsquo;s advertisement.</li>\r\n	<li>In case a person takes any legal action against the company, only the company&rsquo;s legal advisor would be dealing with that; and Surat, Gujarat will only remain the junction for any legal procedure. No one would be able to contact any employee or director of our company.</li>\r\n	<li>A verbal/vocal statement won&rsquo;t be accepted. Only the signed agreements would be acceptable for any customer.</li>\r\n	<li>The detailed terms and conditions are with the head office which is the core baseline to all the above-stated terms and conditions.</li>\r\n	<li>For purchasing a membership card, there are no age eligibility criteria. Still, everyone has to follow the Banks and NBFCs&rsquo; age criteria.</li>\r\n	<li>Regarding the referral payout, the customer has to complete the payout agreement with the company. No payout will be given to anyone without an agreement.</li>\r\n</ol>\r\n'),
(13, '2024-11-07 15:36:07', 'pl-remarketing-sms', 'Congrats! Your Rs.<#cronamount>/- Loan is Approved! \r\n- Disbursal in 10 min \r\n- Low EMI Rs.63\r\n Apply Now https://bharatfinpro.com/digital/personalLoan Bharatfinpro'),
(14, '2024-10-22 10:43:39', 'bl-remarketing-sms', 'Congrats! Your Rs.<#cronamount>/- Loan is Approved! \r\n- Disbursal in 10 min \r\n- Low EMI Rs.63\r\n Apply Now https://bharatfinpro.com/digital/personalLoan Bharatfinpro\r\n'),
(15, '2024-10-22 10:42:27', 'pl-offer-sms', 'Congrats! Your Rs.<#preamount>/- Loan is Approved! \r\n- Disbursal in 10 min \r\n- Low EMI Rs.63\r\n Apply Now https://bharatfinpro.com/digital/personalLoan Bharatfinpro'),
(16, '2024-10-22 10:43:11', 'bl-offer-sms', 'Congrats! Your Rs.<#preamount>/- Loan is Approved! \r\n- Disbursal in 10 min \r\n- Low EMI Rs.63\r\n Apply Now https://bharatfinpro.com/digital/personalLoan Bharatfinpro	\r\n'),
(17, '2023-07-13 23:51:14', 'account-sms', 'Dear Customer, Congratulations! Your loan application has been successfully submitted. Please login to our customer portal to submit the required documents so our company executive will call back in 24 to 48 hours! Thanks & Regards, BHARATFINPRO'),
(18, '2026-08-13 10:42:29', 'fbeventid', '#'),
(19, '2026-08-13 10:42:27', 'fbeventname', '#'),
(20, '2026-08-13 10:42:25', 'fbaccesstoken', '#'),
(21, '2026-08-13 10:42:17', 'smssenderid', ''),
(22, '2024-10-23 17:41:54', 'wpcampaignoffer', '#'),
(23, '2025-05-14 11:47:08', 'wpcampaignsuccess', '#'),
(24, '2025-05-14 22:43:59', 'wpcampaignmain', '#'),
(25, '2024-10-18 18:25:40', 'pl-process-sms', 'Dear Customer, Your Personal Loan Application is Processed. Get Pre-Approved Offer in Just 3 Steps. Apply Now https://bharatfinpro.com/digital/personalLoan'),
(26, '2024-10-18 18:25:50', 'bl-process-sms', 'Dear Customer, Your Personal Loan Application is Processed. Get Pre-Approved Offer in Just 3 Steps. Apply Now https://bharatfinpro.com/digital/personalLoan'),
(27, '2024-10-18 18:23:34', 'payment-fail-sms', 'Sorry, your payment for Bharatfinpro Membership was not successful. We request you to try another payment method https://bharatfinpro.com/cardoffer'),
(28, '2025-05-13 22:13:10', 'intekt_get_offer_name', '#'),
(29, '2026-08-13 10:42:33', 'intekt_rm_offer_name', '#'),
(30, '2025-05-14 12:46:26', 'intkt_userwelcomename', '#'),
(31, '2024-10-21 17:12:21', 'intkt_payment_success', '#'),
(32, '2026-04-17 16:23:22', 'plansmssenderid', '#'),
(33, '2026-04-17 16:57:09', 'plan_facebookpixel', '#'),
(34, '2026-04-17 16:57:12', 'plan_fbaccesstoken', '#'),
(35, '2026-04-17 16:57:14', 'plan_fbeventname', '#'),
(36, '2026-04-17 16:57:16', 'plan_fbeventid', '#'),
(37, '2026-04-17 17:58:53', 'plan_wpcampaignmain', '#'),
(38, '2026-04-17 17:58:57', 'plan_wpcampaignoffer', '#'),
(39, '2026-04-17 17:59:00', 'plan_wpcampaignsuccess', '#'),
(40, '2026-04-17 18:13:23', 'intekt_get_offer_name_plan', ''),
(41, '2026-04-17 18:08:03', 'intekt_rm_offer_name_plan', '#'),
(42, '2026-04-17 18:06:34', 'intkt_userwelcomename_plan', ''),
(43, '2026-04-17 18:11:35', 'intkt_payment_success_plan', ''),
(44, '2026-04-18 10:46:18', 'plan-remarketing-sms', ''),
(45, '2026-04-18 10:46:18', 'plan-process-sms', ''),
(46, '2026-04-18 10:46:48', 'plan-offer-sms', '#'),
(47, '2026-04-18 10:46:44', 'plan-account-sms', '#'),
(48, '2026-04-18 10:46:39', 'plan-payment-fail-sms', '#'),
(50, '2026-06-22 15:17:43', 'facebookpixel-webinar', ''),
(51, '2026-06-22 15:17:43', 'fbaccesstokenwebinar', ''),
(52, '2026-06-22 15:17:43', 'fbeventnamewebinar', ''),
(53, '2026-06-22 15:17:43', 'fbeventidwebinar', ''),
(54, '2026-06-22 15:17:43', 'wpcampaignwebinar', ''),
(55, '2026-06-22 15:17:43', 'wpcampaignofferwebinar', ''),
(56, '2026-06-22 15:17:43', 'wpcampaignsuccesswebinar', ''),
(57, '2026-06-22 15:17:43', 'wpcampaign_userpass_webinar', ''),
(58, '2026-06-22 15:17:43', 'webinar-payment-success-sms', ''),
(59, '2026-07-22 14:34:33', 'webinar-remarketing-sms', 'Still thinking? Others are already building their Loan Agent Business. Earn upto Rs. 5L/month. Limited seats! Apply: https://kbzp.in/PYOSHA/rhyeb Bharatfinpro'),
(60, '2026-06-22 15:17:43', 'webinar-payment-fail-sms', '');

-- --------------------------------------------------------

--
-- Table structure for table `sms_log`
--

DROP TABLE IF EXISTS `sms_log`;
CREATE TABLE IF NOT EXISTS `sms_log` (
  `id` int NOT NULL AUTO_INCREMENT,
  `rec_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `crontype` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT 'company',
  `parentid` int NOT NULL DEFAULT '1',
  `cronname` varchar(256) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `msgcount` int NOT NULL,
  `msgresponse` longtext CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `steptopay_entry`
--

DROP TABLE IF EXISTS `steptopay_entry`;
CREATE TABLE IF NOT EXISTS `steptopay_entry` (
  `id` int NOT NULL AUTO_INCREMENT,
  `rec_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `entryfor` int NOT NULL DEFAULT '0' COMMENT '1=Customer, 2=Channel, 11=Digital PL, 12=Digital BL',
  `userid` int NOT NULL,
  `orderid` varchar(50) NOT NULL,
  `orderamount` float(11,2) NOT NULL,
  `ordernote` varchar(256) DEFAULT NULL,
  `referenceid` varchar(256) DEFAULT NULL,
  `txstatus` varchar(256) DEFAULT NULL,
  `paymentmode` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subpaisa_entry`
--

DROP TABLE IF EXISTS `subpaisa_entry`;
CREATE TABLE IF NOT EXISTS `subpaisa_entry` (
  `id` int NOT NULL AUTO_INCREMENT,
  `rec_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `entryfor` int NOT NULL DEFAULT '0' COMMENT '1=Customer, 2=Channel, 11=Digital PL, 12=Digital BL',
  `userid` int NOT NULL,
  `orderid` varchar(50) NOT NULL,
  `orderamount` float(11,2) NOT NULL,
  `ordernote` varchar(256) DEFAULT NULL,
  `referenceid` varchar(256) DEFAULT NULL,
  `txstatus` varchar(256) DEFAULT NULL,
  `paymentmode` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `support_query`
--

DROP TABLE IF EXISTS `support_query`;
CREATE TABLE IF NOT EXISTS `support_query` (
  `id` int NOT NULL AUTO_INCREMENT,
  `rec_date` datetime NOT NULL,
  `ticketnumber` varchar(50) NOT NULL,
  `usertype` tinyint NOT NULL COMMENT '1=CUSTOMER, 0=GUEST',
  `fullname` varchar(256) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `cardno` varchar(50) DEFAULT NULL,
  `issuetype` varchar(100) DEFAULT NULL,
  `message` varchar(256) NOT NULL,
  `status` tinyint NOT NULL DEFAULT '1',
  `isDelete` tinyint NOT NULL DEFAULT '0' COMMENT '0=No, 1=Yes',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `support_query_chat`
--

DROP TABLE IF EXISTS `support_query_chat`;
CREATE TABLE IF NOT EXISTS `support_query_chat` (
  `id` int NOT NULL AUTO_INCREMENT,
  `rec_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `requestid` int NOT NULL,
  `remarks` longtext NOT NULL,
  `staffid` int NOT NULL,
  `isDelete` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

DROP TABLE IF EXISTS `testimonials`;
CREATE TABLE IF NOT EXISTS `testimonials` (
  `id` int NOT NULL AUTO_INCREMENT,
  `rec_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `reviewpage` int NOT NULL DEFAULT '1' COMMENT '1=Site,2=Customer, 3=Partner',
  `fullname` varchar(256) NOT NULL,
  `ratings` float(11,2) NOT NULL DEFAULT '0.00',
  `photo` varchar(256) NOT NULL DEFAULT 'placeholder.jpg',
  `reviews` longtext NOT NULL,
  `isDelete` int NOT NULL DEFAULT '0' COMMENT '0=No, 1=Yes',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `rec_date`, `reviewpage`, `fullname`, `ratings`, `photo`, `reviews`, `isDelete`) VALUES
(1, '2022-05-30 17:22:18', 1, 'Kavita Patel', 5.00, 'placeholder.jpg', 'Really professional services received from Bharatfinpro. Team is amazing!', 0),
(2, '2022-05-30 17:25:58', 1, 'Ravi Singh', 4.50, 'placeholder.jpg', 'Right from consultation to services, every aspect is praise worthy! Great work team.', 0),
(3, '2022-05-30 17:26:22', 1, 'Satyajit Sharma', 5.00, 'placeholder.jpg', 'The digital process makes it special. Thank you for constant support at every process stage.', 0),
(4, '2022-05-30 17:26:43', 1, 'Renuka Mahapatra', 4.00, 'placeholder.jpg', 'Fantastic customer support!! I am highly impressed with the services.', 0),
(5, '2022-05-30 17:27:07', 1, 'Sanjay Chakraborty', 4.00, 'placeholder.jpg', 'Best part is that the process is initiated quickly. Entire process very well handled by Bharatfinpro team.', 0);

-- --------------------------------------------------------

--
-- Table structure for table `upipayment_entry`
--

DROP TABLE IF EXISTS `upipayment_entry`;
CREATE TABLE IF NOT EXISTS `upipayment_entry` (
  `id` int NOT NULL AUTO_INCREMENT,
  `rec_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `entryfor` int NOT NULL DEFAULT '0' COMMENT '1=Customer, 2=Channel, 11=Digital PL, 12=Digital BL',
  `userid` int NOT NULL,
  `orderid` varchar(50) NOT NULL,
  `orderamount` float(11,2) NOT NULL,
  `ordernote` varchar(256) DEFAULT NULL,
  `referenceid` varchar(256) DEFAULT NULL,
  `txstatus` varchar(256) DEFAULT NULL,
  `paymentmode` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_application`
--

DROP TABLE IF EXISTS `user_application`;
CREATE TABLE IF NOT EXISTS `user_application` (
  `id` int NOT NULL AUTO_INCREMENT,
  `rec_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `userid` int NOT NULL,
  `loantype` int NOT NULL,
  `loanamount` bigint NOT NULL,
  `cibilscore` varchar(256) NOT NULL,
  `loanpurpose` varchar(256) NOT NULL,
  `income` bigint NOT NULL,
  `currentemi` int NOT NULL,
  `emibounce` int NOT NULL DEFAULT '0' COMMENT '0=No, 1=Yes',
  `loantenure` int DEFAULT NULL,
  `preferred_date_time` datetime DEFAULT NULL,
  `status` int NOT NULL DEFAULT '1' COMMENT '1=New, 2=Approve, 3=Reject',
  `isDelete` int NOT NULL DEFAULT '0' COMMENT '0=No, 1=Yes',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_application_status`
--

DROP TABLE IF EXISTS `user_application_status`;
CREATE TABLE IF NOT EXISTS `user_application_status` (
  `id` int NOT NULL AUTO_INCREMENT,
  `rec_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `applicationid` int NOT NULL,
  `statusid` int NOT NULL,
  `statusdate` date DEFAULT NULL,
  `bankid` int NOT NULL,
  `loanamount` int NOT NULL,
  `loanroi` varchar(256) NOT NULL,
  `loanterms` varchar(256) NOT NULL,
  `processfees` int NOT NULL,
  `insurance` varchar(256) NOT NULL,
  `monthlyemi` int NOT NULL,
  `remarks` longtext NOT NULL,
  `sanction_letter` varchar(256) NOT NULL,
  `staffid` int NOT NULL,
  `isDelete` int NOT NULL DEFAULT '0' COMMENT '0=No, 1=Yes',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_documents`
--

DROP TABLE IF EXISTS `user_documents`;
CREATE TABLE IF NOT EXISTS `user_documents` (
  `id` int NOT NULL AUTO_INCREMENT,
  `rec_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `userid` int NOT NULL,
  `profilephoto` varchar(256) DEFAULT NULL,
  `aadharcard` varchar(256) DEFAULT NULL,
  `aadharcard_number` varchar(256) DEFAULT NULL,
  `pancard` varchar(256) DEFAULT NULL,
  `pancard_number` varchar(256) DEFAULT NULL,
  `cancelcheque` varchar(256) DEFAULT NULL,
  `lightbill` varchar(256) DEFAULT NULL,
  `bankstatement` varchar(256) DEFAULT NULL,
  `formsixteen` varchar(256) DEFAULT NULL,
  `salaryslip` varchar(256) DEFAULT NULL,
  `businessproof` varchar(256) DEFAULT NULL,
  `itreturn` varchar(256) DEFAULT NULL,
  `remarks` varchar(256) NOT NULL,
  `isVerified` tinyint NOT NULL DEFAULT '0' COMMENT '0=No, 1=Yes',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_registration`
--

DROP TABLE IF EXISTS `user_registration`;
CREATE TABLE IF NOT EXISTS `user_registration` (
  `id` int NOT NULL AUTO_INCREMENT,
  `rec_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fullname` varchar(256) NOT NULL DEFAULT 'noname',
  `mobile` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(256) NOT NULL,
  `new_password` varchar(255) NOT NULL,
  `pincode` varchar(6) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(256) DEFAULT NULL,
  `usertype` int NOT NULL,
  `cardtype` int DEFAULT NULL COMMENT '11=Premium, 12=Platinum',
  `refcode` varchar(50) DEFAULT NULL,
  `gstno` varchar(256) DEFAULT NULL,
  `process_step` int NOT NULL DEFAULT '1',
  `isUser` int NOT NULL DEFAULT '0' COMMENT '0=None, 1=Steps, 2=Register',
  `iAgree` int NOT NULL DEFAULT '0' COMMENT '0=No, 1=Yes',
  `isDnd` tinyint NOT NULL DEFAULT '0' COMMENT '0=No, 1=Yes',
  `isActive` int NOT NULL DEFAULT '1' COMMENT '0=No, 1=Yes',
  `isDelete` int NOT NULL DEFAULT '0' COMMENT '0=No, 1=Yes',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_tree`
--

DROP TABLE IF EXISTS `user_tree`;
CREATE TABLE IF NOT EXISTS `user_tree` (
  `id` int NOT NULL AUTO_INCREMENT,
  `rec_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `refferaltype` int NOT NULL DEFAULT '1' COMMENT '1=Customer, 2=Channel',
  `refferaluserid` int NOT NULL,
  `subuserid` int NOT NULL,
  `payout` int NOT NULL DEFAULT '0' COMMENT '0=No, 1=Yes',
  `payout_date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_webinar_registration`
--

DROP TABLE IF EXISTS `user_webinar_registration`;
CREATE TABLE IF NOT EXISTS `user_webinar_registration` (
  `id` int NOT NULL AUTO_INCREMENT,
  `program_type` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0=webinar, 1=workshop',
  `program_id` int NOT NULL,
  `rec_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `first_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `last_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `mobile` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `occupation` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `earning_goal` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `pincode` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `city` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `state` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `process_step` int NOT NULL,
  `isUser` int NOT NULL DEFAULT '0',
  `is_joincommunity` tinyint(1) NOT NULL DEFAULT '0',
  `isActive` int NOT NULL DEFAULT '0',
  `isDnd` tinyint(1) NOT NULL DEFAULT '0',
  `isDelete` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `webinar_event`
--

DROP TABLE IF EXISTS `webinar_event`;
CREATE TABLE IF NOT EXISTS `webinar_event` (
  `id` int NOT NULL AUTO_INCREMENT,
  `event_type` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0-online , 1-workshop',
  `event_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Webinar',
  `event_datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `event_main_price` float(11,2) NOT NULL DEFAULT '0.00',
  `event_offer_price` float(11,2) NOT NULL DEFAULT '0.00',
  `event_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `event_desc_1` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `community_link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `event_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `mentor_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `language` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `isActive` int NOT NULL DEFAULT '0',
  `isDelete` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `webinar_event_detail`
--

DROP TABLE IF EXISTS `webinar_event_detail`;
CREATE TABLE IF NOT EXISTS `webinar_event_detail` (
  `id` int NOT NULL AUTO_INCREMENT,
  `event_id` int NOT NULL,
  `event_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `event_desc_1` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `event_desc_2` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `event_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `mentor_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `language` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `isActive` int NOT NULL DEFAULT '0',
  `isDelete` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `webinar_order`
--

DROP TABLE IF EXISTS `webinar_order`;
CREATE TABLE IF NOT EXISTS `webinar_order` (
  `id` int NOT NULL AUTO_INCREMENT,
  `rec_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `webinar_id` int NOT NULL,
  `userid` int NOT NULL,
  `amount` float(11,2) NOT NULL,
  `paymentid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `orderid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `isUser` int NOT NULL DEFAULT '1',
  `isAttend` int NOT NULL DEFAULT '0',
  `isActive` int NOT NULL DEFAULT '1',
  `isDelete` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `worldline_entry`
--

DROP TABLE IF EXISTS `worldline_entry`;
CREATE TABLE IF NOT EXISTS `worldline_entry` (
  `id` int NOT NULL AUTO_INCREMENT,
  `rec_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `entryfor` int NOT NULL DEFAULT '0' COMMENT '1=Customer, 2=Channel, 11=Digital PL, 12=Digital BL',
  `userid` int NOT NULL,
  `orderid` varchar(50) NOT NULL,
  `orderamount` float(11,2) NOT NULL,
  `ordernote` varchar(256) DEFAULT NULL,
  `referenceid` varchar(256) DEFAULT NULL,
  `txstatus` varchar(256) DEFAULT NULL,
  `paymentmode` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `zaakpay_entry`
--

DROP TABLE IF EXISTS `zaakpay_entry`;
CREATE TABLE IF NOT EXISTS `zaakpay_entry` (
  `id` int NOT NULL AUTO_INCREMENT,
  `rec_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `entryfor` int NOT NULL DEFAULT '0' COMMENT '1=Customer, 2=Channel, 11=Digital PL, 12=Digital BL',
  `userid` int NOT NULL,
  `orderid` varchar(50) NOT NULL,
  `orderamount` float(11,2) NOT NULL,
  `ordernote` varchar(256) DEFAULT NULL,
  `statuscode` varchar(256) DEFAULT NULL,
  `transactionid` varchar(256) DEFAULT NULL,
  `paymentmode` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
