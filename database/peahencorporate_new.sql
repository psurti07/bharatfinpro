-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 28, 2026 at 09:51 AM
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
-- Database: `peahencorporate`
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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `administration`
--

INSERT INTO `administration` (`id`, `rec_date`, `fullname`, `mobile`, `emailid`, `password`, `role`, `isActive`, `isDelete`) VALUES
(1, '2020-07-22 12:47:03', 'Developer', '9904466599', 'info@verloopweb.com', '3fdc2b96e5de6df321152e254d28ddac', 0, 1, 0),
(3, '2023-06-06 12:08:00', 'kishan patel', '9687887028', 'kishanverloop@gmail.com', '68c507f0a520db0f95ce94ca1c8097db', 1, 0, 1),
(4, '2023-06-06 12:08:54', 'kishan vasoya', '9687887028', 'kishanverloop@gmail.com', '68c507f0a520db0f95ce94ca1c8097db', 0, 0, 1),
(5, '2023-12-01 14:50:43', 'Arvind Sir', '7046134946', 'admin@kreditbazar.com', '4e58867bdd582123c1f05946346ce097', 0, 0, 1),
(6, '2023-12-01 14:51:43', 'Vijay Makwana', '9316122755', 'info@peahencorporate.com', 'a89e68194df8fc205a15bb5d09276d30', 0, 0, 1),
(7, '2024-02-16 14:17:21', 'PEAHEN CORPORATE DIPALI', '9638979166', 'info@peahencorporate.com', 'a89e68194df8fc205a15bb5d09276d30', 1, 0, 1),
(8, '2024-07-18 16:30:22', 'Kreditbazar', '9724157166', 'company@kreditbazar.com', '38fdf8319a7bd4c0625d108499a2bfd2', 0, 0, 1),
(9, '2024-09-24 15:37:51', 'Vijay Makwana', '9316884097', 'info@peahencorporate.com', '6082dc9194d860909d4706596ab9c5d4', 0, 0, 1),
(10, '2024-11-21 14:52:25', 'rudreshbhai', '7227976446', 'rudreshpurabiya37@gmail.com', '646c1c555bda55c2ec9fdb92714843fb', 0, 0, 1),
(11, '2025-02-13 13:25:56', 'krishna', '9316884097', 'peahencorporate@gmail.com', '7543f6bdd93c1f064841bc44cb338ede', 0, 1, 0);

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `administration_log`
--

INSERT INTO `administration_log` (`id`, `adminid`, `login_at`, `logout_at`, `server_ip`) VALUES
(1, 1, '2025-08-19 17:25:15', NULL, '::1');

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
  `fbpage` varchar(256) COLLATE utf8mb4_general_ci NOT NULL,
  `instapage` varchar(256) COLLATE utf8mb4_general_ci NOT NULL,
  `businessid` varchar(256) COLLATE utf8mb4_general_ci NOT NULL,
  `pixelid` varchar(256) COLLATE utf8mb4_general_ci NOT NULL,
  `isVerified` int NOT NULL DEFAULT '0' COMMENT '0=No, 1=Yes',
  `isDelete` int NOT NULL DEFAULT '0' COMMENT '0=No, 1=Yes',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `allremarks`
--

DROP TABLE IF EXISTS `allremarks`;
CREATE TABLE IF NOT EXISTS `allremarks` (
  `id` int NOT NULL AUTO_INCREMENT,
  `rec_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `module` varchar(256) COLLATE utf8mb4_general_ci NOT NULL,
  `linkid` int NOT NULL,
  `notetext` varchar(256) COLLATE utf8mb4_general_ci NOT NULL,
  `isDelete` int NOT NULL DEFAULT '0' COMMENT '0=No, 1=Yes',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `applyurl` varchar(256) COLLATE utf8mb4_general_ci NOT NULL,
  `isDelete` tinyint NOT NULL DEFAULT '0' COMMENT '0=No, 1=Yes',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb3;

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
(16, '2020-03-02 20:50:48', 'Fullertor India', '016.png', 16, 0),
(17, '2020-03-02 20:50:48', 'DCB Bank', '017.png', 17, 1),
(18, '2020-03-02 20:51:27', 'Grihashakti', '018.png', 18, 1),
(19, '2020-03-02 20:51:27', 'PaySense', '019.png', 19, 0),
(20, '2021-03-23 12:17:34', 'Lendingkart', '023.png', 20, 1),
(21, '2020-03-02 20:51:27', 'Indifi', '021.png', 21, 1),
(22, '2020-03-02 20:51:27', 'Money View', '022.png', 22, 0),
(23, '2023-03-02 11:36:08', 'Other Bank', '099.jpg', 32, 1),
(24, '2021-09-03 13:56:55', 'Moneytap', '024.png', 24, 1),
(25, '2021-09-03 13:57:20', 'IDFC First Bank', '025.png', 25, 1),
(26, '2021-09-03 13:57:48', 'Bajaj Finserv', '026.png', 26, 1),
(28, '2021-09-03 13:59:18', 'Ziploan', '028.png', 28, 1),
(29, '2021-10-25 11:01:50', 'Credit Enable', '029.png', 29, 1),
(30, '2021-10-25 11:02:35', 'Hero Fincorp', '030.png', 30, 0),
(31, '2021-10-25 11:03:20', 'Monexo', '031.png', 31, 0),
(32, '2021-10-25 11:03:20', 'NeoGrowth', '032.png', 32, 1);

-- --------------------------------------------------------

--
-- Table structure for table `bulksms`
--

DROP TABLE IF EXISTS `bulksms`;
CREATE TABLE IF NOT EXISTS `bulksms` (
  `id` int NOT NULL AUTO_INCREMENT,
  `rec_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fullname` varchar(250) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `mobileno` varchar(80) COLLATE utf8mb4_general_ci NOT NULL,
  `emailid` varchar(80) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cardoffer_order`
--

DROP TABLE IF EXISTS `cardoffer_order`;
CREATE TABLE IF NOT EXISTS `cardoffer_order` (
  `id` int NOT NULL AUTO_INCREMENT,
  `rec_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `offerpage` int NOT NULL DEFAULT '1' COMMENT '1=Cardoffer, 2=Specialoffer',
  `fullname` varchar(256) COLLATE utf8mb4_general_ci NOT NULL,
  `mobile` varchar(256) COLLATE utf8mb4_general_ci NOT NULL,
  `emailid` varchar(256) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `card_number` varchar(256) COLLATE utf8mb4_general_ci NOT NULL,
  `registration_date` date DEFAULT NULL,
  `expiry_date` date DEFAULT NULL,
  `amount` float(11,2) NOT NULL,
  `paymentid` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `isCustomer` int NOT NULL DEFAULT '0' COMMENT '0=No, 1=Yes',
  `isActive` int NOT NULL DEFAULT '0' COMMENT '0=No, 1=Yes',
  `isDelete` int NOT NULL DEFAULT '0' COMMENT '0=No. 1=Yes',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `server_ip` varchar(256) DEFAULT NULL,
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
  `slug` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `descriptions` longtext COLLATE utf8mb4_general_ci NOT NULL,
  `isActive` int NOT NULL DEFAULT '1' COMMENT '0=No, 1=Yes',
  `isDelete` int NOT NULL DEFAULT '0' COMMENT '0=No, 1=Yes',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `orderid` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `orderamount` float(11,2) NOT NULL,
  `ordernote` varchar(256) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `referenceid` varchar(256) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `txstatus` varchar(256) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `paymentmode` varchar(256) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
('40qad837ibkptk0vd9d286a6ufjkvp25', '::1', 1755607055, 0x5f5f63695f6c6173745f726567656e65726174657c693a313735353630363939383b61646d696e6c6f6769647c693a313b61646d696e69647c733a313a2231223b61646d696e6e616d657c733a393a22446576656c6f706572223b61646d696e70617373776f72647c733a33323a223366646332623936653564653664663332313135326532353464323864646163223b61646d696e6163746976657c733a313a2231223b61646d696e64656c6574657c733a313a2230223b61646d696e747970657c733a313a2230223b7068632d637573746f6d65726c6f6769647c693a313b7068632d637573746f6d657269647c733a33323a22567a644b4e557077656b3953643156335245357a656e524b6457314755543039223b7068632d637573746f6d65726e616d657c733a343a2274657374223b7068632d637573746f6d65726d6f62696c657c733a31303a2239343038383831323134223b),
('5j5vmoo031p4g53bs36703ns5vhvhf60', '::1', 1777019371, 0x5f5f63695f6c6173745f726567656e65726174657c693a313737373031393337313b),
('as2803qa5pg6i4ut8l6cn34tfki8l36k', '::1', 1777019371, 0x5f5f63695f6c6173745f726567656e65726174657c693a313737373031393337313b),
('atg62d4qnsqrdpbfqoavqebfe53rrhcm', '::1', 1774068907, 0x5f5f63695f6c6173745f726567656e65726174657c693a313737343036383832373b757365726c6f616e616d6f756e747c733a363a22353030303030223b5f5f63695f766172737c613a343a7b733a31343a22757365726c6f616e616d6f756e74223b693a313737343036393033323b733a31303a22757365726d6f62696c65223b693a313737343036393033323b733a373a226170706c796964223b693a313737343036393230303b733a31323a22636f6d70616e79656d61696c223b693a313737343037323439383b7d757365726d6f62696c657c733a31303a2239303030303030303030223b6170706c7969647c733a313a2233223b636f6d70616e79656d61696c7c733a32343a22696e666f4070656168656e636f72706f726174652e636f6d223b),
('dgb702chjnvrscurjqjq6lnr57hebiat', '::1', 1770367714, 0x5f5f63695f6c6173745f726567656e65726174657c693a313737303336373637313b),
('fg1gsesg1gsjhj4m3nr7fsg1ov41iqb8', '::1', 1770362402, 0x5f5f63695f6c6173745f726567656e65726174657c693a313737303336323338383b5f5f63695f766172737c613a323a7b733a373a226170706c796964223b693a313737303336363030323b733a31323a22636f6d70616e79656d61696c223b693a313737303336363030323b7d6170706c7969647c733a313a2232223b636f6d70616e79656d61696c7c733a32343a22696e666f4070656168656e636f72706f726174652e636f6d223b),
('siu4o4glq638d7i9pe1f65koq8uhbqra', '::1', 1756975020, 0x5f5f63695f6c6173745f726567656e65726174657c693a313735363937353031333b);

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
  `server_ip` varchar(256) DEFAULT NULL,
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
  `server_ip` varchar(256) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer_log`
--

INSERT INTO `customer_log` (`id`, `customerid`, `login_at`, `logout_at`, `server_ip`) VALUES
(1, 1, '2025-08-19 17:40:39', NULL, '::1');

-- --------------------------------------------------------

--
-- Table structure for table `easebuzz_entry`
--

DROP TABLE IF EXISTS `easebuzz_entry`;
CREATE TABLE IF NOT EXISTS `easebuzz_entry` (
  `id` int NOT NULL AUTO_INCREMENT,
  `rec_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `entryfor` int NOT NULL DEFAULT '0' COMMENT '1=Customer, 2=Channel, 11=Digital PL, 12=Digital BL',
  `userid` int NOT NULL,
  `orderid` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `orderamount` float(11,2) NOT NULL,
  `ordernote` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `statuscode` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `transactionid` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `paymentmode` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `easebuzz_entry`
--

INSERT INTO `easebuzz_entry` (`id`, `rec_date`, `entryfor`, `userid`, `orderid`, `orderamount`, `ordernote`, `statuscode`, `transactionid`, `paymentmode`) VALUES
(1, '2026-03-21 10:25:00', 11, 3, '1774068900873', 588.82, 'Digital Personal Loan', NULL, NULL, NULL);

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
  `tags` varchar(256) COLLATE utf8mb4_general_ci NOT NULL,
  `descriptions` longtext COLLATE utf8mb4_general_ci NOT NULL,
  `isActive` int NOT NULL DEFAULT '0' COMMENT '0=No, 1=Yes',
  `isDelete` int NOT NULL DEFAULT '0' COMMENT '0=No, 1=Yes',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `inv_prefix` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `inv_number` int NOT NULL,
  `inv_date` date DEFAULT NULL,
  `inv_price` float(11,2) NOT NULL,
  `inv_cgst` float(11,2) NOT NULL,
  `inv_sgst` float(11,2) NOT NULL,
  `inv_igst` float(11,2) NOT NULL,
  `inv_grandtotal` float(11,2) NOT NULL,
  `remarks` varchar(256) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `isDelete` int NOT NULL DEFAULT '0' COMMENT '0=No, 1=Yes',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`id`, `rec_date`, `userid`, `cardid`, `inv_for`, `inv_prefix`, `inv_number`, `inv_date`, `inv_price`, `inv_cgst`, `inv_sgst`, `inv_igst`, `inv_grandtotal`, `remarks`, `isDelete`) VALUES
(1, '2025-08-19 17:40:03', 1, 1, 1, 'PL_', 41372, '2025-08-19', 0.00, 0.00, 0.00, 0.00, 0.00, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `invoice_log_data`
--

DROP TABLE IF EXISTS `invoice_log_data`;
CREATE TABLE IF NOT EXISTS `invoice_log_data` (
  `id` int NOT NULL AUTO_INCREMENT,
  `log_detail` text NOT NULL,
  `invoice_id` int NOT NULL,
  `staff_id` int NOT NULL,
  `invoice_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
  `statusname` varchar(256) COLLATE utf8mb4_general_ci NOT NULL,
  `priorityno` int NOT NULL DEFAULT '1',
  `colorclass` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `isDelete` int NOT NULL DEFAULT '0' COMMENT '0=No, 1=Yes',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `loanstatus`
--

INSERT INTO `loanstatus` (`id`, `rec_date`, `statusname`, `priorityno`, `colorclass`, `isDelete`) VALUES
(1, '2020-10-13 19:30:40', 'Approved', 1, 'success', 0),
(2, '2020-10-13 19:30:40', 'Rejected', 2, 'danger', 0),
(3, '2020-10-13 19:30:40', 'In Process', 1, 'info', 0),
(4, '2021-08-28 08:03:33', 'Query Process', 4, 'warning', 0),
(5, '2021-10-29 11:04:29', 'File Reopen', 5, 'info', 0),
(6, '2024-06-20 14:38:29', 'Verification', 1, 'success', 0);

-- --------------------------------------------------------

--
-- Table structure for table `loanstatus_remarks`
--

DROP TABLE IF EXISTS `loanstatus_remarks`;
CREATE TABLE IF NOT EXISTS `loanstatus_remarks` (
  `id` int NOT NULL AUTO_INCREMENT,
  `rec_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `title` varchar(256) COLLATE utf8mb4_general_ci NOT NULL,
  `remarks` longtext COLLATE utf8mb4_general_ci NOT NULL,
  `statusid` int DEFAULT NULL,
  `isDelete` tinyint NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `loanstatus_remarks`
--

INSERT INTO `loanstatus_remarks` (`id`, `rec_date`, `title`, `remarks`, `statusid`, `isDelete`) VALUES
(1, '2022-03-12 14:45:35', 'Verification Successful', 'Dear Customer, Congratulations! Your verification is successfully done. The Login Department has asked you for the required documents. Kindly submit the documents in your customer portal in the next 24 to 48 hours. Please stay in contact with the company for the next 7 working days. If you have any doubts or queries, call on +918758692298. You can call us between 10 AM to 5 PM (Monday to Saturday - only business days).', 6, 0),
(2, '2022-03-12 14:45:35', '4 day documents pending new (document warning)', 'Dear Customer, you\'ve still not submitted the documents for the loan process. Kindly submit the documents in your customer portal in 24-48 hours else your file will be automatically rejected from the system – and the same would be updated in your portal. For more info, you can call us on +918758692298 between 10 AM to 5 PM (Monday to Saturday - only business days).', 3, 0),
(3, '2022-03-12 14:46:46', '4 day documents pending new (documents reject)', 'Dear Customer, the company has yet not received any documents or information from your side – and due to this, your file has been rejected. You can reapply for a loan after 6 months. For more info, you can call us on +918758692298 between 10 AM to 5 PM (Monday to Saturday - only business days).', 2, 0),
(4, '2022-03-12 14:46:46', 'OTP Not Given (OTP warning remark)', 'Dear Customer, our company asked you for the OTP for your loan process but you denied to share the OTP. As per bank rules, OPT is a must for the loan process. So, if you wish to give OTP for your loan process, kindly call us on +918758692298 in the next 24-48 hours else your file will be automatically rejected from our system. You can call us between 10 AM to 5 PM (Monday to Saturday - only business days).', 3, 0),
(5, '2022-03-12 14:47:41', 'OTP Not Given (OTP reject)', 'Dear Customer, we are sorry to inform you that your Personal Loan application in our organization has been declined because you didn’t provide the required OTP for further processes. For more info, you can call us on +918758692298 between 10 AM to 5 PM (Monday to Saturday - only business days).', 4, 0),
(6, '2022-03-12 14:47:41', 'Customer not connect 3 days new (warning)', 'Dear Customer, our login department is trying to contact you for the loan process for the last 3 days. But you\'ve not responded or you\'re not coming in contact with the company. If you\'re willing to go ahead with your loan process, kindly call on +918758692298 in the next 24-48 hours (between 10 AM – 5 PM; between Monday and Saturday – only business days); otherwise, your file will be automatically rejected from the system.', 3, 0),
(7, '2022-03-12 14:48:08', 'Customer not connect 3 days new (reject)', 'Dear Customer, the company\'s Login Department has tried contacting you regarding the loan process – to which you\'ve not responded or you\'re not coming in contact with us, and due to this your file has been automatically rejected from the system – and the same has been updated and shown in your portal. For more info, you can call us on +918758692298 between 10 AM to 5 PM (Monday to Saturday - only business days).', 2, 0),
(8, '2022-03-12 14:48:08', 'File Reject (ABP Low, CIBIL Low, PL Inquiry)', 'Dear Customer, we are sorry to inform you that your application for a loan in our organization has been rejected because you do not meet the required criteria (Average Banking, PL inquiries, Obligations, CIBIL low, ABP low, etc.). For more info, you can call us on +918758692298 between 10 AM to 5 PM (Monday to Saturday - only business days).', 2, 0),
(9, '2022-03-12 14:48:38', 'Language issue (warning)', 'Dear Customer, our Login Department contacted you but the process couldn\'t proceed due to unclear or non-understandable communication/language from your end. We suggest you make a trusted person/third-party call on your behalf within the next 24-48 hours and communicate in an understandable language/manner – failing in doing so would lead to automatic rejection of your file from the system. You can call us on +918758692298 between 10 AM to 5 PM (Monday to Saturday - only business days).', 3, 0),
(10, '2022-03-12 14:48:38', 'Language Issue (reject)', 'Dear Customer, we are sorry to inform you that your Personal Loan application in our organization has been declined due to unclear or non-understandable communication from your end. For more info, you can call us on +918758692298 between 10 AM to 5 PM (Monday to Saturday - only business days).', 2, 0),
(11, '2022-03-12 14:49:02', 'NR Switched Off At Login Time (warning)', 'Dear Customer, our login department called you at the Customer Login Time but either your contact number was switched off or unreachable. If you wish to proceed with your loan process, kindly call us on +918758692298 within the next 24-48 hours else your file will be automatically rejected in the system. You can call us between 10 AM to 5 PM (Monday to Saturday - only business days).', 3, 0),
(12, '2022-03-12 14:49:02', 'NR Switched Off At Login Time (reject)', 'Dear Customer, we are sorry to inform you that your application for a personal loan in our organization has been declined because even after several tries of reaching out, you are unreachable or your registered mobile number is switched off. For more info call on +918758692298. You can call us between 10 AM to 5 PM (Monday to Saturday - only business days).', 2, 0),
(13, '2022-03-12 14:49:26', 'Loan Approval Confirmation', 'Dear Customer, Congratulations! Your Personal Loan of amount ________ is approved. For more info, you can call us on +918758692298 between 10 AM to 5 PM (Monday to Saturday - only business days).', 1, 0),
(14, '2022-03-12 14:49:26', 'Application Reopened', 'Dear Customer, you had applied to our company for a loan but as you were not in contact with our company, your file is closed - the reason could be one of the following: (1) You didn\'t submit your document to the company for the login process; (2) You didn\'t respond to our calls; (3) You didn\'t send any of OTP for the login process, etc. So now, as you contacted us again to reopen your file, we are re-opening your file for the loan process and after that, you have to be in contact with our company for 7 days. For more info, you can call us on +918758692298 between 10 AM to 5 PM (Monday to Saturday - only business days).', 5, 0),
(15, '2022-03-12 14:50:23', 'Customer not interested (warning)', 'Dear Customer, when our login department called you regarding your loan process, you expressed uninterest. If you want to take your loan process forward, call us on +918758692298 within the next 24-48 hours else your file will be automatically rejected in the system. You can call us between 10 AM to 5 PM (Monday to Saturday - only business days).', 3, 0),
(16, '2022-03-12 14:50:23', 'Customer not interested (reject)', 'Dear Customer, we are sorry to inform you that your Loan application in our organization has been declined because of the uninterest shown by you due to any reason(s). For more info, you can call us on +918758692298 between 10 AM to 5 PM (Monday to Saturday - only business days).', 2, 0);

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
  `card_number` varchar(256) COLLATE utf8mb4_general_ci NOT NULL,
  `amount` float(11,2) NOT NULL,
  `paymentid` varchar(256) COLLATE utf8mb4_general_ci NOT NULL,
  `isActive` int NOT NULL DEFAULT '1',
  `isDelete` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `membership_order`
--

INSERT INTO `membership_order` (`id`, `rec_date`, `userid`, `registration_date`, `expiry_date`, `card_number`, `amount`, `paymentid`, `isActive`, `isDelete`) VALUES
(1, '2025-08-19 17:40:03', 1, '2025-08-19', '2025-09-19', '9821393217857466', 0.00, 'cash_gpn5R7asZWUkw', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `meta_keywords`
--

DROP TABLE IF EXISTS `meta_keywords`;
CREATE TABLE IF NOT EXISTS `meta_keywords` (
  `id` int NOT NULL AUTO_INCREMENT,
  `rec_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `slug` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `title` varchar(256) COLLATE utf8mb4_general_ci NOT NULL,
  `descriptions` mediumtext COLLATE utf8mb4_general_ci NOT NULL,
  `keywords` mediumtext COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `meta_keywords`
--

INSERT INTO `meta_keywords` (`id`, `rec_date`, `slug`, `title`, `descriptions`, `keywords`) VALUES
(1, '2021-07-08 19:28:54', 'home', 'Peahen Corporate – Personal & Business Financial Consultation\n', 'Peahen Corporate|Professional Personal & Business Financial Consultation & Services\n', 'Peahen Corporate, personal loan, instant personal loan, peahen personal loan, peahen india personal loans, instant loan in india, online loan in india, peahen loan personal loan, personal loan india'),
(2, '2021-07-08 19:28:54', 'company', 'Company Profile | Peahen Corporate – Personal & Business Financial Consultation\n', 'Company Profile | Professional Personal & Business Financial Consultation & Services\n', 'Peahen Corporate, personal loan, instant personal loan, peahen personal loan, peahen india personal loans, instant loan in india, online loan in india, peahen loan personal loan, personal loan india'),
(3, '2021-07-08 19:30:16', 'contact', 'Contact Us | Peahen Corporate – Personal & Business Financial Consultation\n', 'Contact Us | Peahen Corporate – Professional Personal & Business Financial Consultation & Services\n', 'Peahen Corporate, personal loan, instant personal loan, peahen personal loan, peahen india personal loans, instant loan in india, online loan in india, peahen loan personal loan, personal loan india'),
(4, '2021-07-08 19:30:16', 'career', 'Career | Peahen Corporate – Personal & Business Financial Consultation\n', 'Career | Peahen Corporate – Professional Personal & Business Financial Consultation & Services\n', 'Peahen Corporate, personal loan, instant personal loan, peahen personal loan, peahen india personal loans, instant loan in india, online loan in india, peahen loan personal loan, personal loan india'),
(5, '2021-07-08 19:31:43', 'privacy-policy', 'Privacy Policy | Peahen Corporate – Personal & Business Financial Consultation\n', 'Privacy Policy | Peahen Corporate – Professional Personal & Business Financial Consultation & Services\r\n', 'Peahen Corporate, personal loan, instant personal loan, peahen personal loan, peahen india personal loans, instant loan in india, online loan in india, peahen loan personal loan, personal loan india'),
(6, '2021-07-08 19:31:43', 'terms', 'T&C | Peahen Corporate – Personal & Business Financial Consultation\n', 'T&C | Peahen Corporate – Professional Personal & Business Financial Consultation & Services\r\n', 'Peahen Corporate, personal loan, instant personal loan, peahen personal loan, peahen india personal loans, instant loan in india, online loan in india, peahen loan personal loan, personal loan india'),
(7, '2021-07-08 19:32:28', 'blog', 'Blogs | Peahen Corporate – Personal & Business Financial Consultation\n', 'Blogs | Peahen Corporate – Professional Personal & Business Financial Consultation & Services\r\n', 'Peahen Corporate, personal loan, instant personal loan, peahen personal loan, peahen india personal loans, instant loan in india, online loan in india, peahen loan personal loan, personal loan india'),
(8, '2021-07-08 19:33:51', 'personal-loan', 'Personal Loan | Peahen Corporate – Personal & Business Financial Consultation\r\n', 'Personal Loan | Peahen Corporate – Professional Personal & Business Financial Consultation & Services\r\n', 'Peahen Corporate, personal loan, instant personal loan, peahen personal loan, peahen india personal loans, instant loan in india, online loan in india, peahen loan personal loan, personal loan india'),
(9, '2021-07-08 19:33:51', 'business-loan', 'Business loan | Peahen Corporate – Personal & Business Financial Consultation\r\n', 'Business loan | Peahen Corporate – Professional Personal & Business Financial Consultation & Services\r\n', 'Peahen Corporate, personal loan, instant personal loan, peahen personal loan, peahen india personal loans, instant loan in india, online loan in india, peahen loan personal loan, personal loan india'),
(10, '2021-07-08 19:34:47', 'home-loan', 'Home Loan | Peahen Corporate – Personal & Business Financial Consultation\r\n', 'Home Loan | Peahen Corporate – Professional Personal & Business Financial Consultation & Services\r\n', 'Peahen Corporate, personal loan, instant personal loan, peahen personal loan, peahen india personal loans, instant loan in india, online loan in india, peahen loan personal loan, personal loan india'),
(11, '2021-07-08 19:34:47', 'mortgage-loan', 'Mortgage loan | Peahen Corporate – Personal & Business Financial Consultation\r\n', 'Mortgage loan | Peahen Corporate – Professional Personal & Business Financial Consultation & Services\r\n', 'Peahen Corporate, personal loan, instant personal loan, peahen personal loan, peahen india personal loans, instant loan in india, online loan in india, peahen loan personal loan, personal loan india'),
(12, '2021-07-08 19:36:13', 'digital-personal', 'Digital Personal Loan | Peahen Corporate – Personal & Business Financial Consultation\r\n', 'Digital Personal Loan | Peahen Corporate – Professional Personal & Business Financial Consultation & Services\r\n', 'Peahen Corporate, personal loan, instant personal loan, peahen personal loan, peahen india personal loans, instant loan in india, online loan in india, peahen loan personal loan, personal loan india'),
(13, '2021-07-08 19:36:13', 'digital-business', 'Digital Business Loan | Peahen Corporate – Personal & Business Financial Consultation\r\n', 'Digital Business Loan | Peahen Corporate – Professional Personal & Business Financial Consultation & Services\r\n', 'Peahen Corporate, personal loan, instant personal loan, peahen personal loan, peahen india personal loans, instant loan in india, online loan in india, peahen loan personal loan, personal loan india'),
(14, '2021-07-09 11:09:44', 'apply-personal-loan', 'Apply Personal Loan | Peahen Corporate – Personal & Business Financial Consultation\r\n', 'Apply Personal Loan | Peahen Corporate – \r\n Professional Personal & Business Financial Consultation & Services\r\n', 'Peahen Corporate, personal loan, instant personal loan, peahen personal loan, peahen india personal loans, instant loan in india, online loan in india, peahen loan personal loan, personal loan india'),
(15, '2021-07-09 11:10:28', 'apply-business-loan', 'Apply Business Loan | Peahen Corporate – \r\nPersonal & Business Financial Consultation\r\n', 'Apply Business Loan | Peahen Corporate – Professional Personal & Business Financial Consultation & Services\r\n', 'Peahen Corporate, personal loan, instant personal loan, peahen personal loan, peahen india personal loans, instant loan in india, online loan in india, peahen loan personal loan, personal loan india'),
(16, '2021-07-09 11:11:10', 'apply-home-loan', 'Apply Home Loan | Peahen Corporate – Personal & Business Financial Consultation\r\n', 'Apply Home Loan | Peahen Corporate –Professional Personal & Business Financial Consultation & Services\r\n', 'Peahen Corporate, personal loan, instant personal loan, peahen personal loan, peahen india personal loans, instant loan in india, online loan in india, peahen loan personal loan, personal loan india'),
(17, '2021-07-09 11:12:01', 'apply-mortgage-loan', 'Apply Mortgage Loan | Peahen Corporate – Personal & Business Financial Consultation\r\n', 'Apply Mortgage Loan | Peahen Corporate – Professional Personal & Business Financial Consultation & Services\r\n', 'Peahen Corporate, personal loan, instant personal loan, peahen personal loan, peahen india personal loans, instant loan in india, online loan in india, peahen loan personal loan, personal loan india'),
(18, '2021-07-09 11:12:01', 'portal-channel', 'Portal Channel | Peahen Corporate – Personal & Business Financial Consultation\r\n', 'Portal Channel | Peahen Corporate – Professional Personal & Business Financial Consultation & Services', ''),
(19, '2021-07-09 11:12:01', 'portal-customer', 'Portal Customer | Peahen Corporate – Personal & Business Financial Consultation\r\n', 'Portal Customer | Peahen Corporate – Professional Personal & Business Financial Consultation & Services\r\n', 'Peahen Corporate, personal loan, instant personal loan, peahen personal loan, peahen india personal loans, instant loan in india, online loan in india, peahen loan personal loan, personal loan india'),
(21, '2021-07-21 14:29:51', 'our-product', 'Our Product | Peahen Corporate – Personal & Business Financial Consultation\r\n', 'Our Product | Peahen Corporate – Professional Personal & Business Financial Consultation & Services\r\n', 'Peahen Corporate, personal loan, instant personal loan, peahen personal loan, peahen india personal loans, instant loan in india, online loan in india, peahen loan personal loan, personal loan india'),
(22, '2021-08-03 13:51:12', 'premium-membership-card', 'Premium Membership Card | Peahen Corporate – Personal & Business Financial Consultation\r\n', 'Premium Membership Card | Peahen Corporate – Professional Personal & Business Financial Consultation & Services\r\n', 'Peahen Corporate, personal loan, instant personal loan, peahen personal loan, peahen india personal loans, instant loan in india, online loan in india, peahen loan personal loan, personal loan india'),
(23, '2021-08-03 13:51:49', 'platinum-membership-card', 'Platinum Membership Card | Peahen Corporate – Personal & Business Financial Consultation\r\n', 'Platinum Membership Card | Peahen Corporate – Professional Personal & Business Financial Consultation & Services\r\n', 'Peahen Corporate, personal loan, instant personal loan, peahen personal loan, peahen india personal loans, instant loan in india, online loan in india, peahen loan personal loan, personal loan india'),
(24, '2021-08-03 13:51:49', 'royal-membership-card', 'Royal Membership Card | Peahen Corporate – Personal & Business Financial Consultation\n', 'Royal Membership Card | Peahen Corporate – Professional Personal & Business Financial Consultation & Services\n', 'Peahen Corporate, personal loan, instant personal loan, peahen personal loan, peahen india personal loans, instant loan in india, online loan in india, peahen loan personal loan, personal loan india'),
(25, '2021-08-03 13:51:49', 'loyal-membership-card', 'Loyal Membership Card | Peahen Corporate – Personal & Business Financial Consultation\n', 'Loyal Membership Card | Peahen Corporate – Professional Personal & Business Financial Consultation & Services\n', 'Peahen Corporate, personal loan, instant personal loan, peahen personal loan, peahen india personal loans, instant loan in india, online loan in india, peahen loan personal loan, personal loan india'),
(26, '2021-07-08 19:30:16', 'important-update', 'Important Update | Peahen Corporate – Personal & Business Financial Consultation\r\n', 'Important Update | Peahen Corporate – Professional Personal & Business Financial Consultation & Services\r\n', 'Peahen Corporate, personal loan, instant personal loan, peahen personal loan, peahen india personal loans, instant loan in india, online loan in india, peahen loan personal loan, personal loan india'),
(27, '2021-07-08 19:30:16', 'raise-request', 'Raise a request | Peahen Corporate – Personal & Business Financial Consultation\r\n', 'Raise a request | Peahen Corporate – Professional Personal & Business Financial Consultation & Services\r\n', 'Peahen Corporate, personal loan, instant personal loan, peahen personal loan, peahen india personal loans, instant loan in india, online loan in india, peahen loan personal loan, personal loan india'),
(28, '2021-07-08 19:30:16', 'faqs', 'Frequently Asked Questions | Peahen Corporate – Personal & Business Financial Consultation\n', 'Frequently Asked Questions | Peahen Corporate – Professional Personal & Business Financial Consultation & Services\n', 'Peahen Corporate, personal loan, instant personal loan, peahen personal loan, peahen india personal loans, instant loan in india, online loan in india, peahen loan personal loan, personal loan india'),
(29, '2021-07-08 19:30:16', 'refund-policy', 'Cancellation & Refund Policy | Peahen Corporate – Personal & Business Financial Consultation\r\n', 'Cancellation & Refund Policy | Peahen Corporate – Professional Personal & Business Financial Consultation & Services\r\n', 'Peahen Corporate, personal loan, instant personal loan, peahen personal loan, peahen india personal loans, instant loan in india, online loan in india, peahen loan personal loan, personal loan india'),
(30, '2021-07-08 19:30:16', 'disclaimer', 'Disclaimer | Peahen Corporate – Personal & Business Financial Consultation\r\n', 'Disclaimer | Peahen Corporate – Professional Personal & Business Financial Consultation & Services\r\n', 'Peahen Corporate, personal loan, instant personal loan, peahen personal loan, peahen india personal loans, instant loan in india, online loan in india, peahen loan personal loan, personal loan india'),
(31, '2021-07-08 19:30:16', 'gallery', 'Gallery | Peahen Corporate – Personal & Business Financial Consultation\r\n', 'Gallery | Peahen Corporate – Professional Personal & Business Financial Consultation & Services\r\n', 'Peahen Corporate, personal loan, instant personal loan, peahen personal loan, peahen india personal loans, instant loan in india, online loan in india, peahen loan personal loan, personal loan india');

-- --------------------------------------------------------

--
-- Table structure for table `newsletter_subscribe`
--

DROP TABLE IF EXISTS `newsletter_subscribe`;
CREATE TABLE IF NOT EXISTS `newsletter_subscribe` (
  `id` int NOT NULL AUTO_INCREMENT,
  `rec_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `subscribeemail` varchar(256) COLLATE utf8mb4_general_ci NOT NULL,
  `isActive` int NOT NULL DEFAULT '1' COMMENT '0=No, 1=Yes',
  `isDelete` int NOT NULL DEFAULT '0' COMMENT '0=No, 1=Yes',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `otpverification`
--

DROP TABLE IF EXISTS `otpverification`;
CREATE TABLE IF NOT EXISTS `otpverification` (
  `id` int NOT NULL AUTO_INCREMENT,
  `rec_date` date DEFAULT NULL,
  `mobile` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `otpcode` varchar(10) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `otpverification`
--

INSERT INTO `otpverification` (`id`, `rec_date`, `mobile`, `email`, `otpcode`) VALUES
(1, '2026-02-06', '9609096096', '', '6471'),
(2, '2026-03-21', '9000000000', '', '8835');

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
  `orderid` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `orderamount` float(11,2) NOT NULL,
  `ordernote` varchar(256) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `referenceid` varchar(256) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `txstatus` varchar(256) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `paymentmode` varchar(256) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `orderid` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `orderamount` float(11,2) NOT NULL,
  `ordernote` varchar(256) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `referenceid` varchar(256) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `txstatus` varchar(256) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `paymentmode` varchar(256) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `orderid` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `orderamount` float(11,2) NOT NULL,
  `ordernote` varchar(256) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `referenceid` varchar(256) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `txstatus` varchar(256) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `paymentmode` varchar(256) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int NOT NULL AUTO_INCREMENT,
  `rec_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `productname` varchar(256) COLLATE utf8mb4_general_ci NOT NULL,
  `productslug` varchar(256) COLLATE utf8mb4_general_ci NOT NULL,
  `amount` float(11,2) NOT NULL,
  `offeramount` float(11,2) NOT NULL,
  `inOffer` tinyint NOT NULL DEFAULT '0' COMMENT '0=No, 1=Yes',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `rec_date`, `productname`, `productslug`, `amount`, `offeramount`, `inOffer`) VALUES
(1, '2024-05-11 09:09:38', 'Digital Personal Loan', 'digital-personal-loan', 1000.00, 499.00, 1),
(2, '2021-07-26 13:10:05', 'Digital Business Loan', 'digital-business-loan', 1000.00, 499.00, 1),
(3, '2024-05-11 09:09:38', 'Card Offer', 'card-offer', 1000.00, 499.00, 1),
(4, '2024-05-11 09:09:38', 'Special Offer', 'special-offer', 1000.00, 499.00, 1),
(5, '2024-05-11 09:09:38', 'Star Offer', 'star-offer', 1000.00, 499.00, 1),
(6, '2024-05-11 09:09:38', 'Royal Offer', 'royal-offer', 1000.00, 499.00, 1),
(7, '2024-05-11 09:09:38', 'Bumper Offer', 'bumper-offer', 1000.00, 499.00, 1);

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
  `orderid` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `orderamount` float(11,2) NOT NULL,
  `ordernote` varchar(256) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `referenceid` varchar(256) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `txstatus` varchar(256) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `paymentmode` varchar(256) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roipackages`
--

INSERT INTO `roipackages` (`id`, `rec_date`, `loantype`, `bankid`, `roi`, `termsyears`, `termsmonths`, `isDelete`) VALUES
(1, '2021-10-23 14:14:14', 11, 6, 10.99, 6.00, 72, 0),
(2, '2021-10-23 14:14:14', 11, 30, 9.50, 5.00, 60, 0),
(3, '2021-10-23 14:16:03', 11, 25, 10.49, 5.00, 60, 0),
(4, '2021-10-23 14:16:03', 11, 31, 7.73, 4.00, 48, 0),
(5, '2021-10-23 14:17:16', 12, 6, 10.99, 5.00, 72, 0),
(6, '2021-10-23 14:17:16', 12, 21, 10.00, 5.00, 60, 0),
(7, '2021-10-23 14:20:04', 12, 30, 10.50, 5.00, 60, 0),
(8, '2021-10-23 14:20:04', 12, 20, 15.00, 3.00, 36, 0),
(9, '2021-10-23 14:20:51', 12, 25, 11.50, 5.00, 60, 0),
(10, '2021-10-23 14:20:51', 12, 32, 13.00, 1.50, 18, 0),
(11, '2021-10-23 14:21:28', 12, 29, 14.00, 3.00, 36, 0),
(12, '2021-10-23 14:21:28', 12, 28, 10.00, 5.00, 60, 0);

-- --------------------------------------------------------

--
-- Table structure for table `site_options`
--

DROP TABLE IF EXISTS `site_options`;
CREATE TABLE IF NOT EXISTS `site_options` (
  `id` int NOT NULL AUTO_INCREMENT,
  `rec_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `option_key` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `option_value` longtext COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `site_options`
--

INSERT INTO `site_options` (`id`, `rec_date`, `option_key`, `option_value`) VALUES
(1, '2024-02-12 11:12:06', 'privacy-policy', '<p>The privacy of every user of www.peahencorporate.com is crucial for the company. This Privacy Policy mentions the data and information we gather about you, how we treat it, with whom we share it, and how we preserve and protect it.</p>\r\n\r\n<p>In the regular course of our business through this website, we gather your personal information through several sources, including:</p>\r\n\r\n<ul>\r\n	<li>Information from you, such as applications or other sources which includes your name, address, marital status, employment, assets and income; and</li>\r\n	<li>Information about you, your accounts, and your holdings and transactions that we receive from you or others, such as account custodians, brokers, and other financial services firms, banks, etc.</li>\r\n</ul>\r\n\r\n<p>We&#39;re also dedicated to protecting the users of our website by addressing potential privacy concerns. Our privacy guidelines apply to all users globally. This policy applies to all information, in whatever form, relating to Peahen CorporateServices Pvt. Ltd.&#39; business activities across the world, and to all information handled by Peahen Corporate Services Pvt. Ltd., relating to other companies and organizations with whom it deals. It also covers all IT and information communications facilities operated by Peahen Corporate Services Pvt. Ltd. or on its behalf.</p>\r\n\r\n<p>This Privacy Policy covers the security, information, IT equipment and use of Peahen Corporate Services Pvt. Ltd., a company incorporated under the laws, presently in force in India and having its registered office at 20, 1st floor, Vijayraj Society, Causeway Road, Katargam, Surat, Gujarat, India - 395004 and all its affiliates. It also includes the use of email, internet, voice and mobile IT equipment. This policy applies to all Peahen Corporate Services Pvt. Ltd. Users, Clients, and employees (hereafter referred to as &lsquo;individuals&#39;).</p>\r\n\r\n<p>Subject to arbitration, only the courts and tribunals of Surat, Gujarat, shall have exclusive jurisdiction with respect to any suit, action or any other proceedings arising out of or in relation to the Loan Documents. Nothing contained in this clause shall limit any right of the Lender to commence any legal action or proceedings arising in relation to the Loan or the Loan Documents in any other court, tribunal or another appropriate forum, competent jurisdiction and the Borrower and/or the guarantor hereby consent to that jurisdiction.</p>\r\n\r\n<h3><strong>How Peahen CorporateServices Pvt. Ltd. manages and protects Your Personal Information:</strong></h3>\r\n\r\n<p>Peahen Corporate Services Pvt. Ltd. doesn&rsquo;t sell or trade information about current or former clients to third parties. We may disclose your personal information as necessary to:</p>\r\n\r\n<ul>\r\n	<li>Effect, administer, or enforce a transaction that you request or authorize;</li>\r\n	<li>Process or service a financial product or service that you request or authorize; or</li>\r\n	<li>Maintain or service your account with us or with another entity.</li>\r\n</ul>\r\n\r\n<p>Peahen Corporate Services Pvt. Ltd. may also disclose your personal information and data for everyday business purposes to organizations or firms who provide consulting, technology, or other services for us and agree to maintain its confidentiality; others, such as attorneys, trustees, family members, or others who are authorized to represent you, your estate, or a joint or co-owner of your account; regulatory agencies; or as we are otherwise permitted or required by law or process of law.</p>\r\n\r\n<p>Peahen Corporate Services Pvt. Ltd. restricts access to your personal information to our employees and to permitted third-parties who need to know that information to provide products or services for us, or to provide, process, or maintain any security, account, or investment product, service or program for you or your benefit. To protect your personal information from unauthorized access and use, we have adopted administrative, technical, and physical security procedures that comply with the laws in India. These measures include computer safeguards and secured files and buildings.</p>\r\n\r\n<p>What Peahen Corporate Services Pvt. Ltd. can do with your personal information:</p>\r\n\r\n<p>We may use your personal information that we collect or that is provided to us, for the following reasons:</p>\r\n\r\n<ol>\r\n	<li>Considering any application for an account or service,</li>\r\n	<li>Carrying out our business functions and activities;</li>\r\n	<li>Collecting amounts you owe us, including taking enforcement action;</li>\r\n	<li>Exercising our rights and fulfilling our obligations under any agreement with you;</li>\r\n	<li>Exercising our rights and fulfilling our obligations for the purposes of complying with all applicable laws, including those relating to money laundering, terrorist financing, bribery, corruption, tax evasion, fraud and similar; and managing all economic and trade sanction risks;</li>\r\n	<li>Generally administering and monitoring services provided to you (or any related entity); and</li>\r\n	<li>Providing you with information about our other services, or the services of selected third parties in which we think you may have an interest, including by post, telephone and electronic message &ndash; you can opt-out of receiving information about our other services and/or the services of selected third parties by informing us in writing.</li>\r\n</ol>\r\n\r\n<h4><strong>Sharing of Personal Information with Third Parties:</strong></h4>\r\n\r\n<p>Peahen Corporate Services Pvt. Ltd. does not sell, trade, or otherwise transfer to outside parties your personally identifiable information. This does not include trusted third parties who assist us in operating our website, conducting our business, or servicing you, so long as those parties agree to keep this information confidential. We may also release your information when we believe release is appropriate to comply with the law, enforce our site policies, or protect our or others&#39; rights, property, or safety. However, non-personally identifiable visitor information may be provided to other parties for marketing, advertising, or other uses.</p>\r\n\r\n<h4><strong>Security and Confidentiality:</strong></h4>\r\n\r\n<p>The protection and security of your personal information are important to us. We generally follow industry-standard information security tools and measures, as well as internal procedures and strict guidelines to prevent information submitted to us, both during transmission and once we receive it from misuse and data leakage. No method of transmission over the internet, or method of electronic storage, is 100% secure, however. Therefore, while we strive to use commercially acceptable means to protect your personal information, which considerably reduces the risks of data misuse, we cannot guarantee its absolute security. To notify the Company about any security vulnerability or potential data breach, please contact us at: info@peahencorporate.com and we will take the appropriate measures to address such an incident, as deemed necessary.</p>\r\n\r\n<p>Our employees can access the information on a &quot;need-to-know&quot; basis and are subject to confidentiality obligations.</p>\r\n\r\n<h3><strong>DATA ACCURACY</strong></h3>\r\n\r\n<p>Personal Data must be accurate and, where necessary, kept up to date. It must be corrected or deleted without delay when inaccurate. It is advisable that you ensure that the Personal Data we use and hold is accurate, complete, kept up to date and relevant to the purpose for which we collected it. You must check the accuracy of any Personal Data at the point of collection and at regular intervals afterwards. You must take all reasonable steps to destroy or amend inaccurate or out-of-date Personal Data.</p>\r\n\r\n<h3><strong>LIMIT OF LIABILITY</strong></h3>\r\n\r\n<p>We shall not be liable for any confusion caused as a result of any of your actions or omission of any action, anything as a result of your viewing, reading or listening of any content. Although we will do our best to provide constant, uninterrupted access to our website, we accept no responsibility or liability for any interruption or delay.</p>\r\n\r\n<p>In no event will our total liability to you for all damages arising from your use of the service or information, materials or products included on or otherwise made available to you through the service exceed the amount you paid for the service related to your claim.</p>\r\n\r\n<p>We have no liability for any loss, damage or misappropriation of your files under any circumstances or for any consequences related to changes, restrictions, suspension or termination of your service or the agreement. These liabilities shall apply to you even if their remedies shall fail their essential purpose.</p>\r\n\r\n<h3><strong>USAGE OF ADVERTISING ID</strong></h3>\r\n\r\n<p>When you are using our application that incorporates our Services, we may also automatically record your Google and/or any other Advertising ID (if you are using an Android device) or your Advertising Identifier (IDFA - if you are using an IOS device; together with the Google and/or any other Advertising ID-&quot;Mobile Advertising IDs&quot;), for advertising or analytics purposes. The said Advertising ID is an anonymous identifier, provided by Google. If your device has an Advertising ID, we may collect and use it for advertising and user analytics purposes. If your device does not have an Advertising ID, we may use other persistent identifiers. The information collected may also be stored on your device. You can reset your mobile Advertising ID or opt-out of receiving targeted ads through your mobile Advertising IDs which are provided in our settings.</p>\r\n\r\n<h3><strong>COMPLIANCE &amp; COOPERATION WITH REGULATORS</strong></h3>\r\n\r\n<p>We regularly review this Privacy Policy and make sure that we process your personal information in ways that comply with regulations currently in force in India. We firmly comply with legal frameworks including data protection laws relating to the transfer of data.</p>\r\n\r\n<h3><strong>CONSENT</strong></h3>\r\n\r\n<p>By using our website, you consent to our website&#39;s Privacy Policy. The usage of the website shall be construed as an acceptance of the Privacy Policy.</p>\r\n\r\n<h3><strong>GRIEVANCES</strong></h3>\r\n\r\n<p>For any complaints and/or inquiries, you can send us formal written inquiries or complaints at info@peahencorporate.com. All inquiries and/or complaints shall be examined and will be resolved expeditiously. Our team of experts will respond by contacting the person who made such inquiries and/or complaints. We work with the appropriate regulatory authorities, including local data protection authorities, to resolve any complaints regarding the transfer of your data that we cannot resolve with you directly.</p>\r\n\r\n<h3><strong>MODIFICATION OF THE POLICY</strong></h3>\r\n\r\n<p>We reserve the right to modify this Privacy Policy at our own independent decision at any time. If the changes are significant, the Company shall spare no efforts to apprise its clientele and provide a prominent notice (including, for certain services, email notification of Privacy Policy changes). It is pertinent to remember that it shall be the Clients&#39; responsibility to read the Policy as amended every once in a while.</p>\r\n\r\n<h3><strong>USAGE OF COOKIES/COOKIES POLICY</strong></h3>\r\n\r\n<p>Cookies are small files that a site or its service provider transfers to your computer&#39;s hard drive through your web browser with your permission which enables the site or service provider&#39;s systems to recognize your browser and capture and remember certain information. We use cookies to help us understand and save your preferences for future visits, keep track of advertisements and compile aggregate data about site traffic and site interaction so that we can offer better site experiences and tools in the future.</p>\r\n');
INSERT INTO `site_options` (`id`, `rec_date`, `option_key`, `option_value`) VALUES
(2, '2025-02-27 15:18:55', 'terms-conditions', '<p>In these Terms &amp; Conditions, the words such as &ldquo;we&rdquo;, &ldquo;our&rdquo;, &ldquo;company&rdquo;, and &ldquo;us&rdquo; refer to Peahen Corporate and its undertaken system. And the words such as &ldquo;you&rdquo;, &ldquo;your&rdquo; refer to Peahen Corporate users, customers, etc.</p>\r\n\r\n<p>Here are the terms and conditions for Customers, Employees, and every user of our website - <a href=\"https://peahencorporate.com\">https://peahencorporate.com</a>. So, the terms and conditions are applied as per your role. You must read all the below-mentioned Terms &amp; Conditions carefully.</p>\r\n\r\n<p>The Company wishes to offer the services under the terms and conditions set forth and the user/customer wishes to be associated unconditionally with these terms and conditions.<br />\r\nTherefore, in consideration of the agreements contained in this, the parties, intending to be legally bound, agree to the correctness and authenticity of the following details given to the company:</p>\r\n\r\n<ul>\r\n	<li>Information from you, such as applications or other forms (which include your name, address, marital status, employment, assets and income); and</li>\r\n	<li>Information about you, your accounts, and your holdings and transactions that we receive from you or others, such as account custodians, brokers, and other financial services firms, banks, etc.</li>\r\n</ul>\r\n\r\n<p>If the company by any source finds out anyone bad-mouthing or defaming the company&#39;s reputation or company&#39;s members then strict legal action will be taken against the individual or group.<br />\r\n<br />\r\nWe&#39;re also serious about protecting our users by addressing potential privacy concerns. Our terms and condition guidelines apply to all users across the world. These terms and conditions apply to all information, in whatever form, relating to Peahen Corporate&#39;s business activities worldwide, and to all information handled by Peahen Corporate, relating to other organizations with whom it deals. It also covers all IT and information communications facilities operated by Peahen Corporate or on its behalf.</p>\r\n\r\n<p><strong>MEMBERSHIP TERMS AND CONDITIONS:</strong></p>\r\n\r\n<ol>\r\n	<li>The payment of Membership fees is refundable only in accordance with the company&#39;s Cancellation &amp; Refund Policy.</li>\r\n	<li>Peahen Corporate Membership is not transferable and is only valid up to its date of expiry (valid as per Membership) and the Membership may not be used by any person other than the purchaser.</li>\r\n	<li>&nbsp;Renewal terms and conditions are at the discretion of Peahen Corporate.</li>\r\n	<li>The Membership can only be used on/for our website.</li>\r\n</ol>\r\n\r\n<p><strong>CUSTOMER TERMS AND CONDITIONS:</strong></p>\r\n\r\n<ol>\r\n	<li>The payment of Membership fees is refundable only in accordance with the company&#39;s Cancellation &amp; Refund Policy.</li>\r\n	<li>The company only takes the cost of the Membership. No other tip of service is charged.</li>\r\n	<li>Customers can use the Membership only for loan purposes with given benefits. Also, buying a Membership lets you apply for a loan and it doesn&rsquo;t guarantee loan approval as the final loan approval depends on the banks and the customer profile. If the loan is rejected, you can still avail other benefits of the Membership.</li>\r\n	<li>If a customer is viewing any advertisement/promotional content of the company and then approaching the company thinking that he/she will get the loan approval based on the advertisement, then it must be noted that a loan application will only be submitted once the customer buys Peahen Corporate&rsquo;s Membership. Even after buying the Membership, the final loan approval depends on the bank(s) and customer profile. If the customer&rsquo;s profile doesn&rsquo;t match loan eligibility criteria, he/she won&rsquo;t be able to get a loan. Still, they can avail other benefits of the Membership.</li>\r\n	<li>Membership can be used only by the persons who have purchased it and not by any other person(s), source or third party.</li>\r\n	<li>If a customer reference does payment through the customer&#39;s own referral link which is provided by the company and if that shows in the customer&#39;s portal then the only company will give the reference payout of that customer.</li>\r\n	<li>If the customer loan is approved in our company and he/she denies that loan approval then also Membership payment would not be refundable.</li>\r\n	<li>The documents, cheques, and OTP that the company&#39;s employee asks the customer are for the processing of the loan only and the company never misuses them. Just for security, after completing the loan process, the customer can go to the concerned bank and cancel their cheque. The company is not responsible if any problems/disputes arise in the future.</li>\r\n	<li>If you do not give the OTP, documents, or document query for verification to the company&#39;s employee for the loan process, then your file will be rejected. (According to the criteria, if your file matches without OTP, your loan will be processed).</li>\r\n	<li>If our company&#39;s executive asks you for any payment transaction OTP, do not provide it. If the customer pays any charges other than the charge of the Membership, the company won&rsquo;t be responsible for the same.</li>\r\n	<li>If a customer has any queries regarding the loan process then he/she would have to contact the department where their files are in process.</li>\r\n	<li>We will verify your documents in multiple banks; so whatever documents are submitted by customers in our company that will match with any bank criteria, in that bank only we will proceed with the loan process. For example, if your file will match in 2 banks then our company&#39;s login department will login your document only in that 2 banks. The verification is done by the company&#39;s employee and there is no proof available for the same.</li>\r\n	<li>The document will be verified by the company in multiple banks. If your documents match the criteria of the bank, then the login process will be done in that bank. If your documents do not match the criteria of a bank, the company will give you a solution. You can take the solution and reapply after a certain period (as per Membership) - and this will be shown on the customer portal.</li>\r\n	<li>It is not fixed that the customer file will be logged in only in the banks listed on the company website. It may be logged in/verified in other banks also, depending on the customer file.</li>\r\n	<li>Our company is not taking extra charges other than Membership charges. If any third-party charges you then our company is not responsible for that.</li>\r\n	<li>There are no processing or file charges for customer loan approval. There is only one charge and that&#39;s only for the Membership - validity as per Membership.</li>\r\n	<li>Our company will log in customer files as per their requirements. (Example: If customer requirement is INR 1 lakh and if some bank criteria is up to INR 50,000 then we will not log in their file in that bank).</li>\r\n	<li>Wherever the customer file is logged in by the company, these details will not be given to any customer in written or digital form.</li>\r\n	<li>Loan offers and the pre-approval loans process depend only on the bank&#39;s rules and that type of loan is given only on customer behaviour. So, there is so much difference between that type of process and the company&#39;s process. If that loan is rejected in our company but gets approved by another company/source then the customer can&#39;t blame our company.</li>\r\n	<li>Loan approval depends on your profile so if your documents are perfect and as per the bank criteria then you will get a loan through our company</li>\r\n	<li>The loan information is only given to the person who has applied for the loan.</li>\r\n	<li>During the loan processing time, if any customer would not be in contact with us for 3 days, then that file will be rejected by our company.</li>\r\n	<li>If your file is rejected in our company, then the customer has to make sure that they have to re-submit their documents, with the implemented company-suggested solution, in our company after a certain period (as per Membership).</li>\r\n	<li>The company is not responsible if the customer loan is rejected by any queries.</li>\r\n	<li>If the customer will apply for the first time but his/her loan is rejected in our company then the company will give them a reason and solution for that. So at re-applying time if the customer will not resubmit a file with the solution implemented then the file will be again rejected in our company for the same reason. Still, the final loan approval will depend on the customer profile and the bank&#39;s criteria and rules &amp; regulations.</li>\r\n	<li>The company will provide only the reason for rejection to the customer and it would not be provided in the form of hard or soft copy - it will only be shown in the customer portal. Some banks only provide general reasons, they don&#39;t give us any specific reason so the customer should not complain about that.</li>\r\n	<li>The customer has to give correct information about their CIBIL SCORE and PROFILE. If the customer gives wrong information, then the company will not be responsible for loan rejection.</li>\r\n	<li>The company will not be providing any CIBIL REPORT in digital or hard copy to any customer in any situation.</li>\r\n	<li>Bank charges are applicable as per banks&#39; rules and regulations.</li>\r\n	<li>The company will take legal action against the customer who submitted fake documents. And the company won&rsquo;t take any responsibility for the loan process in this case.</li>\r\n	<li>After the customer&rsquo;s file is logged in, the customer has to contact only the login department and coordinate with them &ndash; not any telecaller or other department of the company. The further process has to be done according to the login department.</li>\r\n	<li>During the loan process if the rules of any bank change, then we have to follow those new rules.</li>\r\n	<li>The customer has to give their registered phone number for being contacted by the login department.</li>\r\n	<li>During the loan processing time, if the company gets any queries and it is not solving that in the given time, then the company has the authority to take more time to address the query. So, the customer must not complain about the same.</li>\r\n	<li>If the customer wants to reapply in our company after file rejection or approval, then he/she has to re-submit their documents in the customer portal.</li>\r\n	<li>When you are applying for a loan on our website, we are showing you only your Eligibility for the loan. So whatever details you enter on the website are accepted by software only, and that only shows your pre-approval and not your final loan approval. Approval only depends on your documents and the banks&#39; rules and regulations. We are not giving you any guarantee for the final loan approval.</li>\r\n	<li>All the detailed criteria, terms, and information behind any of the company&rsquo;s concise promotional content (social media ads, banners, SMS, advertisements, emails, etc.) are stated in the Terms &amp; Conditions and Privacy Policy sections of the website. Any concerned person (customer, employee, etc.) must check and accept all the rules and regulations before availing any of the company&rsquo;s services. If any person has confusion, they can call on the company&rsquo;s customer care number to gain clarity before availing company&rsquo;s services.</li>\r\n	<li>The customer&#39;s payment is executed by third-party payment sources. So whenever payment would be received by the company then only a Membership will be activated for the customer. If a customer&#39;s payment would be debited from his/her account but we don&#39;t receive any payment in the company&#39;s account then the company will not be responsible for that.</li>\r\n	<li>For any reference customer&#39;s payout, their account verification is compulsory. After verification, if the payout amount is debited from the company&rsquo;s account and if it does not credit/reflect in the reference customer&rsquo;s account &ndash; the company won&rsquo;t be responsible for this issue.</li>\r\n	<li>Our company is a private limited company and we are tied up with banks and corporate DSA. We are providing loans through banks only.</li>\r\n	<li>Multiple partnered banks&#39; logos are shown on our website and our promotional content across many mediums &ndash; these are shown only for our company&#39;s marketing purpose. It might be possible that certain banks, whose logos are shown on our website/promotional content, are not partnered with our company. Also, these should not be assumed as any bank&#39;s advertisement.</li>\r\n	<li>If anyone takes any legal action against the company then only our legal advisor would be dealing with that and Surat, Gujarat will only remain the junction for any legal procedure. No one would be able to contact any employee or director of our company.</li>\r\n	<li>If any person has a doubt/question regarding any of the company&rsquo;s terms and conditions, they can contact the company.</li>\r\n	<li>The eligibility age for buying a Membership is 18 - 62 years. The persons in this age bracket can avail benefits of the Membership.</li>\r\n	<li>For the Reference Customers who have given customer referrals to the company, it would be compulsory for them to submit their Payout Documents to the company within 30 days. If not submitted, all the payouts of the Reference Customer will be automatically cancelled. To get the cancelled payout, you can contact the company and discuss it.</li>\r\n	<li>Every reference payout will have a deduction of 5% TDS.</li>\r\n	<li>For the loan process, the company will only coordinate with the person who has purchased the Membership and has an ongoing loan process &ndash; the company won&rsquo;t coordinate with any third party.</li>\r\n	<li>Every bank payout will have tax deductions as per the bank&rsquo;s rules and regulations.</li>\r\n	<li>The Company&#39;s authorized person can change any rules and regulations at any time; the concerned person must be regularly updated with the company&rsquo;s terms and conditions and has to accept them unconditionally.</li>\r\n	<li>The company will provide the appropriate loan services but the responsibility of customer handling will be of the reference customer.</li>\r\n	<li>If any bank&#39;s rules or company&#39;s rules are changing during the processing time of the loan then the customer has to follow those new rules.</li>\r\n	<li>The office holidays and bank holidays will not be counted as working days/business days. The company&rsquo;s office work will be done on working days only.</li>\r\n	<li>Our promotional content may communicate messages like &#39;Get Personal Loan in 30 mins&#39; or &#39;Get Rs.5,00,000 in 5 mins&#39; on our company&rsquo;s social media, blogs/articles, ads, websites, emails, SMS, or any other medium &ndash; it must be carefully noted that these messages are only meant for marketing and promotional purposes. All the numerical values that depict time/number of steps/number of clicks &ndash; are for marketing and promotional purposes only. The final loan approval and process depend on the customer profile and the bank/NBFCs&rsquo; rules, regulations and criteria. If you have any sort of doubt before starting the process, you can call our customer care number (10 am to 5 pm &ndash; Monday to Saturday).</li>\r\n	<li>As per the details/information entered by the user, even if the actual pre-approved amount is lesser than 2 Lakhs, the pre-approved amount shown on the website will be Rs.2 Lakhs (minimum). And, even if the actual pre-approved amount is more than 8.5 Lakhs, the pre-approved amount shown on the website will be Rs.8.5 Lakhs (maximum). The pre-approved amount/pre-approved loan offers are tentative &ndash; the final loan approval, loan sanction, and disbursement depend on the customer profile and the NBFCs&rsquo; rules and regulations.</li>\r\n	<li>The first login of the customer&rsquo;s file will be handled and executed by the company. To avail the reapplying option, the customer will have to perform the self-login(s).</li>\r\n</ol>\r\n\r\n<p><strong>REFERENCE TERMS AND CONDITIONS:</strong></p>\r\n\r\n<ol>\r\n	<li>Reference payout would be given to reference customers as per rules and regulations of our company.</li>\r\n	<li>Our company will give payout only on Membership; it does not depend on the reference customer&#39;s loan approval or rejection.</li>\r\n	<li>Whether the customer loan will be approved or not depends on the customer profile and the company does not give any guarantee for that.</li>\r\n	<li>If customers are giving a reference in our company for loan purposes, for that we have some criteria. The customer has to give a reference based on that criteria. The company is not giving you any type of guarantee for the loan approval in any situation at any cost so customers who give a reference have to agree with the decision of that file&#39;s login department.</li>\r\n	<li>The company will take legal action against the reference partner/customer who submitted fake documents. And the company won&rsquo;t take any responsibility for the loan process in this case.</li>\r\n	<li>&nbsp;The Customer&#39;s terms and conditions are also applicable to the reference person&#39;s customers.</li>\r\n	<li>&nbsp;Reference customer&#39;s payment is done through third-party payment sources. So whenever payment would be received by the company then only the Membership will be activated. If the customer&#39;s payment is debited from his/her account but the company doesn&#39;t receive any payment in the company&#39;s account then the company will not be responsible for any queries.</li>\r\n	<li>&nbsp;During loan offers, if any reference person will do the online loan process then the company will give the payout up to 40% per Membership to the reference person. But before that, invoice generation is most important for any payout process.</li>\r\n	<li>&nbsp;If the customer of reference will do an online process then the customer&#39;s payout will be given to the referral partner. But during processing time, if the company would refund that amount to the customer for any reason, then that customer&#39;s payout will be cut out from the reference person&#39;s next payout.</li>\r\n	<li>&nbsp;Whatever documents are submitted by a reference person, they will be secure in our company. If documents will be misused by any other sources in future then our company is not responsible for that.</li>\r\n	<li>For the Reference Customers who have given customer referrals to the company, it would be compulsory for them to submit their Payout Documents to the company within 30 days. If not submitted, all the payouts of the Reference Customer will be automatically cancelled. To get the cancelled payout, you can contact the company and discuss it.</li>\r\n	<li>&nbsp;If anyone takes any legal action against the company then only our legal advisor would be dealing with that and Surat, Gujarat remains the only junction for any legal procedure. No one can contact any employee or director of our company.</li>\r\n	<li>&nbsp;If any person has a doubt/question regarding any of the company&rsquo;s terms and conditions, they can contact the company.</li>\r\n	<li>&nbsp;Every reference payout will have a deduction of 5% TDS.</li>\r\n	<li>The office holidays and bank holidays will not be counted as working days/business days. The company&rsquo;s office work will be done on working days only.</li>\r\n	<li>The Company will have no responsibility for the promotions conducted and undertaken by the Customer Reference. The Customer Reference agrees that the promotions done by them are at their own risk, and the Customer Reference cannot hold the Company responsible for any sort of losses faced due to the promotions.</li>\r\n</ol>\r\n\r\n<p><strong>GENERAL TERMS AND CONDITIONS:</strong></p>\r\n\r\n<ol>\r\n	<li>If the login department fails to solve the customer queries with accuracy, dedication and responsibility, then the login department agency will be cancelled by the company.</li>\r\n	<li>The Customer&#39;s loan process will take more days due to any festival.</li>\r\n	<li>If anyone has GST then they have to add the GST number in their portal so that the company can provide a GST Return to them. If you haven&rsquo;t received your GST Return &ndash; you can raise a request or call on company&rsquo;s customer care number between 10 AM to 5 PM (Monday to Saturday &ndash; only business days).</li>\r\n	<li>The Company is using Blogs for their advertising, so that content could be of the third party, so the company doesn&#39;t take guarantee of the information to be correct or incorrect.</li>\r\n	<li>If customers, employees, any other person, or any other party has a problem with the company then they have to inform that problem to our company through notice; so, we can try to give you a solution of that but after that, any of them want to take a legal action then they have to inform the company through notice. Only then, the legal process will be started.</li>\r\n	<li>&nbsp;If customers, employees, any other person, any other third party has a problem/dispute/misunderstanding with the company, the right to take the final decision over the concerned issue is reserved with the company and the concerned person will have to accept the solution provided by the company.</li>\r\n	<li>The documents, cheques, and OTP that the company&#39;s employee asks the customer are for the processing of the loan, the company is not responsible if any problems/disputes arise in the future.</li>\r\n	<li>During any process on the website, if there is any kind of mistake that happens due to the software or website technical problems, the final decision on such disputes can only be taken by the company and it has to be accepted by anyone concerned.</li>\r\n	<li>The Company&#39;s authorized person can change any rules and regulations at any time; the concerned person must be regularly updated with the company&rsquo;s terms and conditions and has to accept them unconditionally.</li>\r\n	<li>All the commitments made by the company&rsquo;s employees (any employee/person from the company), telecallers, or salespersons, etc. should be cross-checked by any concerned person (customer/any other person) from the Terms &amp; Conditions section of <a href=\"https://peahencorporate.com\">https://peahencorporate.com</a> before availing any of the company&rsquo;s services. Only the rules and regulations stated on the company website will be considered official.</li>\r\n	<li>All the detailed criteria, terms, and information behind any of the company&rsquo;s concise promotional content (social media ads, banners, SMS, advertisements, emails, etc.) are stated in the Terms &amp; Conditions and Privacy Policy sections of the website. Any concerned person (customer, employee, etc.) must check and accept all the rules and regulations before availing any of the company&rsquo;s services. If any person has confusion, they can call on the company&rsquo;s customer care number to gain clarity before availing company&rsquo;s services.</li>\r\n	<li>If any Customer Referral&rsquo;s customer gets a refund (due to any dispute like payment gateway problem or any other issue) then the referral payout will not be provided (if provided, it would be deducted from the next payout of the customer referral).</li>\r\n	<li>While generating the payout for Customer Referrals, the company uses a third-party payment gateway. So, if the payout is stuck and put on hold due to any payment gateway issue (or any other issue), then the payout would be delayed and all the terms and conditions of the third-party payment gateway would be applied. In such cases, the payout will be released only when the third-party payment gateway releases the stuck payment. In case of a payout dispute with any bank, the bank&rsquo;s criteria will be applied and the payout will be released only when the bank approves the payment.</li>\r\n	<li>&nbsp;If there is any dispute that arises between any concerned user (customer, customer referral, etc.) and the company, their account will be disabled immediately by the company. In such a case, the user would be needed to contact the company for any query.</li>\r\n	<li>&nbsp;All of the promotional content put and shared by the company, either on its website or any platform, is only for advertisement purposes. Any person should not assume it as the final loan approval or details of the loan. The final loan approval and specifics of the loan depend on the rules and regulations of various banks (or the concerned bank) and the customer profile. Every customer, or any other user must accept this clause and consider the bank&rsquo;s loan processing time only.</li>\r\n	<li>The loan-related figures, rates, and information used in the promotional content of the company are general and for promotional purposes. The final nature and specifics of the loan in terms of the loan amount, interest rate, repayment tenure, loan processing fees, loan insurance, etc., depends solely on the customer profile and the rules and regulations stated by the concerned bank. The final loan details depend on the criteria set by the concerned bank(s).</li>\r\n	<li>Peahen Corporate&#39;s company name, logo, content, business concept, software and system, pattern, website structure and design, and business process and offers are copyrighted with the company. If any individual or organization uses/copies any of the above-mentioned by even 1%, legal action may be taken against them.</li>\r\n	<li>If any person (customer, employee, etc.) is involved in any of the company&#39;s processes then the company is authorized to record the phone calls with that person.</li>\r\n	<li>&nbsp;If any customer applies for a loan in our company and if any other external person/organization commits fraud with that customer in terms of taking money from you or in any other way then, it will not be the company&rsquo;s responsibility for any kind of loss faced by the customer.</li>\r\n	<li>Whatever loan offer is given to the customer is according to the customer profile. The customer will have to compulsorily accept the loan offer &ndash; he/she cannot deny the loan offer.</li>\r\n	<li>The company has full authority to use the customer&rsquo;s information for purposes such as testimonials, advertisements, marketing, SMS, etc. The customer agrees that regulations of Do Not Disturb(DND)/National Do Not Call(NDNC) won&rsquo;t be applied in such practices.</li>\r\n	<li>&nbsp;If any person (user, customer, etc.) visits our website and indulges in any activity &ndash; like clicking a button, link, filling forms, or any other activity on the website, it will clearly mean and express that the person agrees to and acknowledges all terms &amp; conditions, rules &amp; regulations, and policies of the company.</li>\r\n	<li>After the loan approval, the bank charges will be applied as per the bank&rsquo;s rules and regulations.</li>\r\n	<li>&nbsp;No customer can contact the bank&rsquo;s employees to inquire about/get any information on the loan file processes.</li>\r\n	<li>The customer, whose loan has been approved, must read and understand the bank agreement and the bank&rsquo;s terms and conditions carefully. After the loan process is done, the company can&rsquo;t be held responsible or liable for anything.</li>\r\n	<li>The company will take legal action against the customer, reference customer, or any other person who submitted fake documents. And the company won&#39;t take any responsibility for the loan process in this case.</li>\r\n	<li>&nbsp;Multiple partnered banks&#39; logos are shown on our website and our promotional content across many mediums &ndash; these are shown only for our company&#39;s marketing purpose. It might be possible that certain banks, whose logos are shown on our website/promotional content, are not partnered with our company. Also, these should not be assumed as any bank&#39;s advertisement.</li>\r\n	<li>&nbsp;If anyone takes any legal action against the company then only our legal advisor would be dealing with that and Surat, Gujarat, will only remain the junction for any legal procedure. No one would be able to contact any employee or director of our company.</li>\r\n	<li>Any wrong/fake commitment or vocal statement given by the company&rsquo;s employees, etc. would be considered invalid. Only the solutions or solution-related vocal statements would be considered valid. All the company&rsquo;s Terms &amp; Conditions, Privacy Policy, Disclaimer, all other rules will be final and have to be followed.</li>\r\n	<li>&nbsp;If any person has a doubt/question regarding any of the company&rsquo;s terms and conditions, they can contact the company.</li>\r\n	<li>&nbsp;The office holidays and bank holidays will not be counted as working days/business days. The company&rsquo;s office work will be done on working days only.</li>\r\n	<li>Loan processing time might get delayed because of any public holiday, technical problems, customer issues, etc.</li>\r\n	<li>The Company will not be providing any proof for rejection in hard or soft copy.</li>\r\n	<li>It might be possible that the content/figures/information shown on our website are not updated. So, to get the exact information regarding any of our website&rsquo;s content, Terms &amp; Conditions, Privacy Policy, Disclaimer, etc., you can call on our customer care number.</li>\r\n	<li>&nbsp;After the purchase of the Membership, the Company Executive will call the concerned person within 24-48 hours (it could be delayed due to any reason) for the loan process or partner process. If the concerned person doesn&rsquo;t get a call, they can call on the company&rsquo;s customer care number.</li>\r\n	<li>&nbsp;If the login process is going on and there has been no response from the login department, then the customer can call on the company&rsquo;s customer care number.</li>\r\n	<li>The content and any process on the website can be changed or modified at any instance. So, the older version of the content and process won&rsquo;t be functional, valid, or a subject of argument for any person &ndash; and the customers, users, etc. have to stay timely updated and accept all the changes unconditionally. Only the current content and process of the website will be considered valid.</li>\r\n	<li>&nbsp;By accessing our website, you affirm your age as 18 years or more. If you&rsquo;re someone below 18 years, we advise you not to access our website or the services</li>\r\n	<li>&nbsp;Any processes regarding the loan might get delayed due to public holidays, technical problems/software issues, etc.</li>\r\n	<li>&nbsp;In case the update email/message regarding the processes of loan is not received by the customer due to a delay because of technical problems, software issues, or any other issue &ndash; they can call on the company&rsquo;s customer care between 10 AM to 5 PM (Monday to Saturday &ndash; only business days).</li>\r\n	<li>&nbsp;In case the user, customer, any other person, or organization has a query/problem/issue or wants to raise a dispute with the company &ndash; they can either raise a request ticket or call on the company&rsquo;s customer care number between 10 AM to 5 PM (Monday to Saturday &ndash; only business days).</li>\r\n	<li>Due to a software/system issue, it might happen that the dates mentioned in the Loan Status are late by 3-4 days.</li>\r\n	<li>To get the TDS Return, the reference customer has to submit all the details/documents asked in their portal. Note: The TDS Return will be given starting from the financial year in which all the details/documents are submitted. The TDS Return won&rsquo;t be provided for the financial year(s) that are prior to the financial year in which the details/documents were submitted.</li>\r\n	<li>The general criteria to apply for a personal loan by a salaried individual are &ndash; Min. Age: 21 years; Min. Salary: Rs.15,000/month (credited in the bank account); Salary Slips available; and Job Stability proof available. Final loan approval completely depends on the customer profile and the bank&rsquo;s rules and criteria.</li>\r\n	<li>&nbsp;The general criteria to apply for a personal loan by a self-employed individual are &ndash; Min. Age: 21 years; IT Returns available (min. 1 year); Business Stability proof available; and Current Account in a bank. Final loan approval completely depends on the customer profile and the bank&rsquo;s rules and criteria.</li>\r\n	<li>The general criteria to apply for a business loan by a small business person are &ndash; Min. Age: 21 years; IT Returns available (min. 1 year); and Business Stability proof available (min. 1 year). Final loan approval completely depends on the customer profile and the bank&rsquo;s rules and criteria.</li>\r\n	<li>The general criteria to apply for a business loan by an audited report business person are &ndash; Min. Age: 21 years; Min. Rs.1 Crore+ Yearly Turnover; and Min. 2 Years Audited Report. Final loan approval completely depends on the customer profile and the bank&rsquo;s rules and criteria.</li>\r\n	<li>&nbsp;The eligible age for buying a Membership is 18 - 62 years. The persons in this age bracket can avail benefits of the Membership offered by the company. The company only offers Membership and provides its benefits to the customers. The final loan approval depends on the customer profile and the bank&rsquo;s rules and criteria.</li>\r\n	<li>For the Reference Customers who have given customer referrals to the company, it would be compulsory for them to submit their Payout Documents to the company within 30 days. If not submitted, all the payouts of the Reference Customers will be automatically cancelled. To get the cancelled payout, you can contact the company and discuss it.</li>\r\n	<li>&nbsp;Any information/flow/system regarding our website shown in the videos posted on social media (or any platform) may be inaccurate, outdated, or different from our actual website. Only the most updated version of the website, terms &amp; conditions, and other policies shall be valid.</li>\r\n	<li>The banks&rsquo; logos used in our ads, social media posts, blogs, emails, or any other medium is for promotional purposes only. The process will be done in that bank only under whose criteria the customer profile gets matched. The final loan approval and final loan process completely depend on the customer profile and the bank&rsquo;s criteria and rules and regulations.</li>\r\n	<li>The banks&rsquo; logos shown on our website and the pre-approved offer displayed on our website are tentative only. The process will be done in that bank only under whose criteria the customer profile gets matched. The final loan approval and final loan process completely depend on the customer profile and the bank&rsquo;s criteria and rules and regulations.</li>\r\n	<li>By purchasing the company&rsquo;s Membership, the customer is applying to get the company&rsquo;s services. All the benefits of the Membership will be given to the customer by the company.</li>\r\n	<li>If any customer data &amp; information, KYC documents, or OTP is misused in future by any third-party, our company and its directors, employees, or any individuals associated with the company cannot be held responsible for the same in any matter whatsoever including any loss, harm, or damage due to the usage of information from the portal. Customers are advised to bring in their own discretion in such matters. The information provided on the website is of financial nature. It is a mutual understanding that customers association with the website will be at the customer&#39;s will, preference and risk.</li>\r\n	<li>If any customer&rsquo;s documents are found to be fraud by the bank/financial institution or there&rsquo;s any sort of an issue with any customer&rsquo;s repayment of the loan to the banks/financial institution &ndash; then these matters have to be solely between the customer and the bank/financial institution. Our company and its directors, employees, or any other individual associated with the company cannot be held responsible in such cases. If the customer documents are found to be fake and fraud and are used anywhere for any purpose, the company cannot be held responsible for the same.</li>\r\n	<li>&nbsp;If any third-party gets a loan approved on someone else&rsquo;s identity and documents, then our company and its directors, employees, or any other individual associated with the company cannot be held responsible.</li>\r\n	<li>If any of the company&rsquo;s customers or any third-party wants a legal course, action and proceedings with the company, then only the company&rsquo;s legal team can be involved. There will absolutely be no involvement of the company&rsquo;s directors, any other individual associated with the company, or employees in any legal proceeding. For any legal action or proceeding involving our company, Surat, Gujarat&nbsp; shall remain the only jurisdiction.</li>\r\n	<li>TDS will be given only to the ones whose referral payout has been generated. If your TDS is deducted, you can contact your CA. If your TDS has been deducted and it&rsquo;s not showing, then you can contact the company&rsquo;s customer care number between 10 AM to 5 PM &ndash; Monday to Saturday (only business days).</li>\r\n	<li>&nbsp;If any person enters incorrect information and starts the loan process on our website, and if this leads to any sort of fraud in future, the company, its directors, employees, any other individual associated with the company cannot be held responsible for the same.</li>\r\n	<li>The pre-approved loan offers shown are from those banks/NBFCs that have eligibility criteria to which the customer&rsquo;s profile matches (profile evaluated as per the information entered by the customer). These pre-approved loan offers are tentative only &ndash; the final loan approval, loan sanction, and disbursement depend on the NBFC(s) and their rules and regulations. The company will only log in the customer&rsquo;s file in those NBFCs with which the company has tie-ups/partnerships/collaborations and where the customer&rsquo;s profile matches the NBFC eligibility criteria.</li>\r\n	<li>Our company&rsquo;s services are strictly for the residents of India only &ndash; not for the non-residents. If any non-resident purchases our Membership, they can request for a refund as per the company&rsquo;s Cancellation &amp; Refund Policy.</li>\r\n	<li>In case a customer has mistakenly made more than a single payment, the customer will be eligible to get a refund. The customer will have to request a refund within 48 hours of the payment through the Raising A Request section of the website or by calling on the company&rsquo;s registered contact number.</li>\r\n	<li>In case a customer has bought Memberships from multiple companies that belong to our group of companies, the customer will be eligible to get a refund. The customer will have to request a refund within 48 hours of the payment through the Raising A Request section of the website or by calling on the company&rsquo;s registered contact number.</li>\r\n</ol>\r\n\r\n<p><strong>PRE-APPROVAL LOAN OFFER TERMS AND CONDITIONS:</strong></p>\r\n\r\n<p>The Pre-Approved Loan Offer and the amount mentioned in it are solely shown based on the software calculation done on Monthly Income and Current Monthly EMI entered by the person. This &quot;Pre-Approved Loan Offer&quot; is tentative and not the final loan approval (this is already mentioned on the Pre-Approved loan Offer page) &ndash; as the final loan approval is given by the bank only; based on the bank&rsquo;s rules and regulations and the customer profile. And this is clearly stated in the company&rsquo;s Terms &amp; Conditions which is agreed by the person before registration.</p>\r\n\r\n<p>Here&#39;s an example to know how the &lsquo;Pre-Approved Loan Offer&rsquo; is shown:<br />\r\nConsider that a person (named &lsquo;Sam&rsquo;) enters the following details in our website:<br />\r\nMonthly Income: Rs.1,00,000<br />\r\nCurrent Monthly EMI: Rs.30,000</p>\r\n\r\n<p>Based on these details, Sam is left with Rs.70,000 in hand (deducting current EMI) every month. So, according to the general rules of the banks, the EMI of 50% of the in-hand amount can be approved. So, the loan amount that allows a maximum of Rs.35,000 (70,000/2) EMI can be approved. And based on the EMI and rate of interest (11% tentatively), the eligible amount is shown in the Pre-Approved Loan Offer. And based on this Rs.1903/lakh EMI is shown.</p>\r\n\r\n<p><strong>CANDIDATE TERMS AND CONDITIONS</strong></p>\r\n\r\n<ol>\r\n	<li>The interview time is fixed.</li>\r\n	<li>The interview can&#39;t be taken any other time than the time decided by the company.</li>\r\n	<li>&nbsp;The Company can ask any questions in the interview.</li>\r\n	<li>The candidate will have to appear for the interview as many times as the company asks.</li>\r\n	<li>A resume (Xerox) will be mandatory for the interview. The resume will not be returned.&nbsp; There will be no misuse of the resume.<br />\r\n	&nbsp;</li>\r\n</ol>\r\n\r\n<p><strong>USAGE OF COOKIES / COOKIES POLICY</strong></p>\r\n\r\n<p>Cookies are small files that a site or its service provider transfers to your computer&#39;s hard drive through your web browser with your permission which enables the site or service provider&#39;s systems to recognize your browser and capture and remember certain information. We use cookies to help us understand and save your preferences for future visits, keep track of advertisements and compile aggregate data about site traffic and site interaction so that we can offer better site experiences and tools in the future.</p>\r\n\r\n<p>The user, customer, or any other person accessing our website clearly expresses and agrees that they have fully read and understood the Terms &amp; Conditions and Privacy Policy of Peahen Corporate &ndash; and they accept them unconditionally.</p>\r\n'),
(3, '2024-12-12 16:40:52', 'welcome-status', '0'),
(4, '2024-03-04 23:22:13', 'welcome-message', '<h2 style=\"text-align:center\">To all Customer</h2>\r\n\r\n<p style=\"text-align:center\">This is to inform that all the documents and cheque submitted by customers are required for loan process only. there will be no misuse of them and all the documents and cheque, submitted by employees at the time of joining, are required for job&#39;s formality only. Our company is not responsible if there will be any issues in documents or cheques in the future.</p>\r\n\r\n<p style=\"text-align:center\">Thanks &amp; Regards,<br />\r\npeahencorporate.com</p>\r\n'),
(5, '2023-11-01 10:47:47', 'disclaimer', '<p>www.peahencorporate.com (the &quot;website&quot;) is given by The Peahen&nbsp;Corporate furthermore, its individuals, staff, channel accomplices, and partner accomplices for individual and educational purposes as it were. We likewise explicitly renounce any express or suggested guarantees or ensures about the quality, reasonableness, exactness, dependability, fulfillment, practicality, execution for a particular reason, or lawfulness of the administrations referenced, showed, or executed, or the substance on the site. Prior to settling on any choices in light of any data or other Content contained on the www.peahencorporate.com Website, you alone are answerable for assessing the benefits and dangers associated with such data or other Content.</p>\r\n\r\n<p>Nothing on our Site ought to be understood as a sales, suggestion, support, or proposition by Peahen Corporate Services Pvt. Ltd. to buy or sell any stocks or other monetary instruments in this or whatever other locale where such requesting or offer would be denied by such ward&#39;s protections regulations. Prior to settling on any choices in light of any data or other Content on the Site, you alone are answerable for assessing the benefits and dangers associated with such data or other Content.</p>\r\n'),
(6, '2024-06-24 10:41:37', 'facebookpixel', '320017660888659'),
(7, '2023-12-02 12:46:15', 'facebookdomain', '3a1nhtzph91a7thkljsehifk4ahb25'),
(8, '2023-10-16 10:00:00', 'account-msg-customer', ''),
(9, '2023-10-16 10:00:00', 'account-msg-channel', ''),
(10, '2025-08-19 17:40:03', 'newinvoiceno', '41373'),
(11, '2025-02-27 15:17:36', 'refund-policy', '<p><strong>What are the criteria for our customers to Request a Refund?</strong></p>\r\n\r\n<p>1. A customer can be eligible for a refund if an email requesting a refund is sent by the customer (with the registered email id) to <a href=\"mailto:info@peahencorporate.com\">info@peahencorporate.com</a> within 48 hours of purchasing the Membership plan. The payment mode for the refund will be the same as the mode through which the customer&#39;s payment was received. As per the banks, the refund can be received within 7 to 8 working days.</p>\r\n\r\n<p>2. If the customer is unable to communicate with the company in English, Hindi, or Gujarati, they can apply for a refund within 48 hours of purchasing the Membership plan.</p>\r\n\r\n<p>3. There are certain areas/locations in which our company does not provide its services. If any customer has bought our Membership plan and belongs to such areas/locations, they can apply for a refund within 48 hours of purchasing the Membership plan.</p>\r\n\r\n<p>If you have any query/doubt regarding our policy, please contact us by writing at <a href=\"mailto:info@peahencorporate.com\">info@peahencorporate.com</a>&nbsp;or calling on +91-81604-06656&nbsp;between 10 AM to 5 PM (business days only).</p>\r\n');
INSERT INTO `site_options` (`id`, `rec_date`, `option_key`, `option_value`) VALUES
(12, '2023-10-16 10:00:00', 'customer-legal-agreement', '<ol>\n	<li>Under any circumstances, the Membership Card fees won&rsquo;t be refunded.</li>\n	<li>Only the charge of the Membership Card will be taken by the company; no other payment is charged by the company.</li>\n	<li>It must be noted that the Membership Card provided by the company is not an ATM, DEBIT, or CREDIT CARD. This card must be used for loan purposes and certain other benefits provided by the company.</li>\n	<li>The customer or the referral person can use this Membership Card.</li>\n	<li>If a customer reference makes a payment via the customer&rsquo;s own referral link which is provided by the company &ndash; &nbsp;and if it reflects in the customer&#39;s portal then only the company will release the payout of that customer.</li>\n	<li>In case a customer&rsquo;s loan is approved in our company but the customer denies taking the loan &ndash; still the Membership Card fees won&rsquo;t be refunded.</li>\n	<li>The login department&rsquo;s decision would be final for your loan process.</li>\n	<li>The OTP asked by the company&rsquo;s employee is for loan purposes &ndash; if any issue/problem arises in future, the company won&rsquo;t be responsible for the same.</li>\n	<li>If you do not share the OTP (for loan purposes) with the company&rsquo;s employee, your file will be rejected. As per the criteria, if your file matched without OTP, the loan will be processed further.</li>\n	<li>If the company executive asks you to share any transaction OTP, kindly do not share it.</li>\n	<li>In case any customer has any questions/queries regarding the loan process, they have to contact that department where their file is being processed.</li>\n	<li>We will verify your documents in multiple banks; so whatever documents are submitted by customers in our company that will match with any bank criteria, in that bank only we will proceed with the loan process. (For instance, if your file will match in 3 banks then our company&rsquo;s login department will log in your document only on that 3 banks. The verification is done by the company&rsquo;s employee. The company or bank won&rsquo;t provide any proof for that.</li>\n	<li>Your loan documents will be verified by the company in multiple banks. If the documents match the bank criteria, then the login process will be done in that bank. In case it doesn&rsquo;t match, the company will provide a solution which you can consider and reapply.</li>\n	<li>It is not fixed that the customer file will be logged in only certain banks. It may be verified in other banks also, depending on the customer file.</li>\n	<li>The company doesn&rsquo;t charge anything extra other than the Membership Card fees. If any other external person or third-party charges you then our company won&rsquo;t be responsible for the same.</li>\n	<li>The company doesn&rsquo;t charge for processing or file charges for customer loan approval. Only the Membership Card fee is charged by the company.</li>\n	<li>If a customer file is logged in uncoded banks, then the customer has to pay charges separately.</li>\n	<li>The customer files will be logged in by the company according to the customer&rsquo;s requirements. For instance, If the customer requirement is INR 2 lakhs and if some bank criteria is up to INR 1 Lakh then we will not log in customer file in that bank.</li>\n	<li>If the customer shares their profile and asks us whether the loan will be approved or not; so, the answer to this question would be &ndash; the loan approval estimated ratio is 60% and 40%. It means that there are 60% chances of approval and 40% chances of rejection. So, If your file gets rejected in our company then the customer shouldn&rsquo;t argue for that. Because the company is not taking any guarantee for the loan.</li>\n	<li>Even if the customer file is rejected in our company, any bank can reopen that file for processing. But code activation time is dependent on various banks, ranging from 3 to 4 months. If approval will come from that bank within that code activation time then only company reference would be applicable. So, the customer would not have any doubt that the loan has been taken from his/her own or someone else&rsquo;s reference. After a code deactivation, if the loan is approved by that bank then there is no responsibility of our company.</li>\n	<li>Wherever the customer file is logged in by the company, such information and details will not be given to any customer in written or digital form.</li>\n	<li>All the documents submitted by the customer are safe and secure in our company. We are using those documents only for loan purposes. In case the documents are misused by any other sources, then the company won&rsquo;t be responsible for the same.</li>\n	<li>Loan offers and pre-approval loans process is dependent only on the bank&#39;s rules and that type of loan will be given only on customer behaviour. So, there exists some difference between that type of process and the company&rsquo;s process. In case that loan is approved by another company then the customer can&rsquo;t blame our company.</li>\n	<li>Loan approval depends on your profile so if your documents are perfect then you will get a loan from our company.</li>\n	<li>Any information regarding the loan is only provided to that person who has applied for the loan.</li>\n	<li>During the loan processing time, if any customer would not be in contact with us for 3 days, then that file will be rejected by our company.</li>\n	<li>In case your file is rejected in our company, then the customer has to ascertain that they re-submit their documents with the solution in our company after a period of 6 months.</li>\n	<li>The company won&rsquo;t be responsible in case the customer loan is rejected by queries.</li>\n	<li>In case your file gets rejected in our company, then also the membership card payment remains non-refundable.</li>\n	<li>After processing, in case the customer cancels the file, then also the Membership Card payment remains non-refundable.</li>\n	<li>If the customer will apply for the first time but his/her loan is rejected in our company then the company will give them reason and solution for that. So at re-applying time, if the customer will not re-submit the file with a solution then the file will again face rejection in our company for the same reason.</li>\n	<li>The company will give only the reason for rejection to the customer and it would not be provided in hard or soft copy. Banks only provide general reasons, they don&rsquo;t give us the specific reason &ndash; so the customer should not complain about that.</li>\n	<li>The customer must give correct information about their CIBIL SCORE and PROFILE. If the customer will provide the wrong information, then the company holds no responsibility for loan rejection.</li>\n	<li>Under any situation, the company will not be providing any CIBIL REPORT or VALUATION REPORT in digital or hard copy to any customer.</li>\n	<li>Bank charges are applied according to the banks&#39; rules and regulations.</li>\n	<li>In case a customer submits fake documents, the company will take legal action against that customer.</li>\n	<li>After logging in your file, the customer has to contact only the login department &ndash; and not any telecaller or other department.</li>\n	<li>The person who has already applied for a loan in the same bank, then our company will not apply in that bank.</li>\n	<li>During the loan process if the rules of any bank change, then the company will have to follow those new rules.</li>\n	<li>Only the person who needs a loan has to apply for the loan process.</li>\n	<li>The customer has to give their registered phone number so that the login department can contact the customer.</li>\n	<li>Once the loan process is completed, the customer has to cancel their cheque by visiting the concerned bank only.</li>\n	<li>At the time of loan processing, if the company gets any queries and it is not solving that in the given time, then the company can take more time for that. So, the customer must not argue or complain about this.</li>\n	<li>In case the customer wants to reapply in our company after file rejection or approval, then the customer has to re-submit their documents in the customer login menu.</li>\n	<li>When you are applying for a loan on our website, we are showing you only your Eligibility for the loan. So whatever details you enter on the website are accepted by software only, and that only shows your pre-approval and not your final loan approval. The final loan approval depends on your documents. We are not giving you any guarantee for the final loan approval.</li>\n	<li>The Membership Card is shown on our websites during the processing time, which are only for demo purposes. So that&rsquo;s not your real membership card. In that, whatever details are entered by the customer are accepted by the software and the system shows you the pre-approval depending on the customer details. The customer will get a card after completing the entire process of the loan on our website.</li>\n	<li>The company&rsquo;s privacy policy, terms and conditions are also applicable to marketing and advertising.</li>\n	<li>Our marketing contains advertisements, page updates, posts, videos, SMS, E-mails, banners, social media updates or any type of content.</li>\n	<li>The third-party payment sources execute the customer&rsquo;s payment. So, whenever payment would be received by the company then only the membership card will be generated. If a customer&#39;s payment would be debited from their account but the company doesn&rsquo;t receive any payment in the company&#39;s account then the company holds no responsibility for the same.</li>\n	<li>Account verification is compulsory for any customer&#39;s payout. If your account is not verified in our company and once payment is credited from the company&#39;s account then the company is not responsible for answering any of the questions/queries/doubts.</li>\n	<li>Our company is a private limited company and we are tied up with banks so we are providing loans through banks only.</li>\n	<li>Multiple banks&rsquo; logos are displayed on our portal &ndash; they are shown only for our company&rsquo;s marketing purposes. That banks&rsquo; logos only reflect that our company is tied up with those banks. That&rsquo;s not any bank&rsquo;s advertisement.</li>\n	<li>In case a person takes any legal action against the company, only the company&rsquo;s legal advisor would be dealing with that; and Surat, Gujarat will only remain the junction for any legal procedure. No one would be able to contact any employee or director of our company.</li>\n	<li>A verbal/vocal statement won&rsquo;t be accepted. Only the signed agreements would be acceptable for any customer.</li>\n	<li>The detailed terms and conditions are with the head office which is the core baseline to all the above-stated terms and conditions.</li>\n	<li>For purchasing a membership card, there are no age eligibility criteria. Still, everyone has to follow the Banks and NBFCs&rsquo; age criteria.</li>\n	<li>Regarding the referral payout, the customer has to complete the payout agreement with the company. No payout will be given to anyone without an agreement.</li>\n</ol>\n'),
(13, '2025-04-03 12:17:00', 'pl-remarketing-sms', 'Your Loan Offer Rs.2,50,000/- is Successfully Pre-Approved. Get Disbursal in Your Bank A/C Just 10 Mins. Apply https://peahencorporate.com/digital/personalLoan'),
(14, '2025-04-03 12:17:54', 'bl-remarketing-sms', 'Your Loan Offer Rs.2,50,000/- is Successfully Pre-Approved. Get Disbursal in Your Bank A/C Just 10 Mins. Apply https://peahencorporate.com/digital/personalLoan'),
(15, '2025-04-03 12:17:17', 'pl-offer-sms', 'Your Loan Offer Rs.2,50,000/- is Successfully Pre-Approved. Get Disbursal in Your Bank A/C Just 10 Mins. Apply https://peahencorporate.com/digital/personalLoan'),
(16, '2025-04-03 12:17:32', 'bl-offer-sms', 'Your Loan Offer Rs.2,50,000/- is Successfully Pre-Approved. Get Disbursal in Your Bank A/C Just 10 Mins. Apply https://peahencorporate.com/digital/personalLoan'),
(17, '2023-12-04 18:44:12', 'account-sms', 'Dear Customer, Congratulations! Your loan application has been successfully submitted. Please check your registered email and submit the required documents. Our company executive call you back soon. Thanks & Regards, Peahen Corporate'),
(18, '2023-10-23 14:05:16', 'smssenderid', 'PHNCOR'),
(19, '2025-01-24 16:07:27', 'fbeventid', '1859402554517329'),
(20, '2024-11-28 17:28:07', 'fbeventname', 'purchas'),
(21, '2025-01-24 16:08:12', 'fbaccesstoken', 'EAATzBP5De8cBO89Fh0TcRdrQqEbY6VcdSssh2pncZBe2g06bB2mjEeeqBO2mse9ZBVyqrs1iaQ4be8sZCLo1f63fQSFcYdTkk2s6NWdkDxP8uq2VwqDCZBZC41wEIQxWpSZCWYuuHunsRqfzafkhX2quWeCz6G9w5n8ZAgaRnyfOKGW5uDLy9JD6k53uJaI5kRpZCwZDZD'),
(22, '2025-02-13 19:44:08', 'wpcampaignmain', '13feb_auto'),
(23, '2025-05-21 16:57:07', 'wpcampaignoffer', '21may_get'),
(24, '2025-02-04 13:08:19', 'wpcampaignsuccess', '#'),
(25, '2025-02-04 13:08:22', 'aisency_userwelcomename', '#');

-- --------------------------------------------------------

--
-- Table structure for table `sms_log`
--

DROP TABLE IF EXISTS `sms_log`;
CREATE TABLE IF NOT EXISTS `sms_log` (
  `id` int NOT NULL AUTO_INCREMENT,
  `rec_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `crontype` varchar(50) COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT 'company',
  `parentid` int NOT NULL DEFAULT '1',
  `cronname` varchar(256) COLLATE utf8mb3_unicode_ci NOT NULL,
  `msgcount` int NOT NULL,
  `msgresponse` longtext COLLATE utf8mb3_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

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
  `orderid` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `orderamount` float(11,2) NOT NULL,
  `ordernote` varchar(256) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `referenceid` varchar(256) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `txstatus` varchar(256) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `paymentmode` varchar(256) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subscription_order`
--

DROP TABLE IF EXISTS `subscription_order`;
CREATE TABLE IF NOT EXISTS `subscription_order` (
  `id` int NOT NULL AUTO_INCREMENT,
  `rec_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `userid` int NOT NULL,
  `registration_date` date DEFAULT NULL,
  `expiry_date` date DEFAULT NULL,
  `card_number` varchar(256) COLLATE utf8mb4_general_ci NOT NULL,
  `amount` float(11,2) NOT NULL,
  `paymentid` varchar(256) COLLATE utf8mb4_general_ci NOT NULL,
  `isActive` int NOT NULL DEFAULT '1',
  `isDelete` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `support_query`
--

DROP TABLE IF EXISTS `support_query`;
CREATE TABLE IF NOT EXISTS `support_query` (
  `id` int NOT NULL AUTO_INCREMENT,
  `rec_date` datetime NOT NULL,
  `ticketnumber` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `usertype` tinyint NOT NULL COMMENT '1=CUSTOMER, 0=GUEST',
  `fullname` varchar(256) COLLATE utf8mb4_general_ci NOT NULL,
  `mobile` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `cardno` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `issuetype` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `message` varchar(256) COLLATE utf8mb4_general_ci NOT NULL,
  `server_ip` varchar(256) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` tinyint NOT NULL DEFAULT '1' COMMENT '0=No, 1=Yes',
  `isDelete` tinyint NOT NULL DEFAULT '0' COMMENT '0=No, 1=Yes',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `support_query_chat`
--

DROP TABLE IF EXISTS `support_query_chat`;
CREATE TABLE IF NOT EXISTS `support_query_chat` (
  `id` int NOT NULL AUTO_INCREMENT,
  `rec_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `requestid` int NOT NULL,
  `remarks` longtext COLLATE utf8mb4_general_ci NOT NULL,
  `staffid` int NOT NULL,
  `isDelete` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

DROP TABLE IF EXISTS `testimonials`;
CREATE TABLE IF NOT EXISTS `testimonials` (
  `id` int NOT NULL AUTO_INCREMENT,
  `rec_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `reviewpage` int NOT NULL DEFAULT '1' COMMENT '1=Site,2=Customer, 3=Partner',
  `fullname` varchar(256) COLLATE utf8mb4_general_ci NOT NULL,
  `ratings` float(11,2) NOT NULL DEFAULT '0.00',
  `photo` varchar(256) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'placeholder.jpg',
  `reviews` longtext COLLATE utf8mb4_general_ci NOT NULL,
  `isDelete` int NOT NULL DEFAULT '0' COMMENT '0=No, 1=Yes',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `rec_date`, `reviewpage`, `fullname`, `ratings`, `photo`, `reviews`, `isDelete`) VALUES
(1, '2021-07-07 12:01:12', 1, 'Chirag Khumawat', 5.00, 'placeholder.jpg', 'I really liked the concept and work, These guys are providing great assistance on how one can get an approval for any loan. I’m happy to have your service.', 0),
(2, '2021-07-07 12:10:49', 1, 'Abdul Kedar Khan', 4.50, 'placeholder.jpg', 'I’m much thankful for your quick support in getting an instant personal loan. I highly recommend Peahen Corporate for loans.', 0),
(3, '2021-07-07 12:11:24', 1, 'Manoj Mahajan', 5.00, 'placeholder.jpg', 'The processes on Peahen Corporate are so quick, easy and simple to understand. Superfast services with transparency. I\'ll surely recommend this to more of my friends and colleagues.', 0),
(5, '2021-07-07 12:14:38', 1, 'Hemant Rathod', 4.00, 'Hemant.jpg', 'I want to thank Peahen Corporate, due to which I got quick approval for a personal loan within a day.', 0),
(6, '2021-07-07 12:16:08', 1, 'Amrit Giri', 5.00, 'placeholder.jpg', 'Peahen Corporate has been very helpful, They are professionals and the best thing about it is that they are providing timely services.', 0),
(7, '2021-07-07 12:17:48', 1, 'Anil Bharti', 5.00, 'placeholder.jpg', 'Awesome experience in getting fastest loan approval. A great initiative to save applicant’s time and money. Also a government certified company, which helps people for fastest loan approvals.', 0),
(8, '2021-07-09 11:29:49', 2, 'Sapna Dasharathi', 4.50, 'Sapna.jpg', 'They have a long way to go in this market. They take some time to complete your application and also the support team can take a bit time but they are good and get you best deal in the market.', 0),
(9, '2021-07-09 11:30:43', 2, 'Mahi Manohari', 5.00, 'placeholder.jpg', 'Thank you for instant loan for being supportive in pandemic situation. I would definitely recommend Peahen Corporate.', 0),
(10, '2021-07-09 11:31:48', 2, 'Vijay Pathak', 4.50, 'placeholder.jpg', 'The loan process is very easy and support team is responding on time for issues. Thanks for support.', 0),
(11, '2021-07-09 11:32:21', 2, 'Debanjan Mukherjee', 4.00, 'placeholder.jpg', 'I have had a very good experience with Peahen Corporate where in it gives you good tenure to payback and with less processing fee I strongly suggest Peahen Corporate from my end.', 0),
(12, '2021-07-09 11:33:00', 2, 'Kunal Gohokar', 5.00, 'placeholder.jpg', 'Very quick response and got the loan amount in next 5 days which is very quick. Everything is very systemic followed love the way they do it.', 0),
(13, '2021-07-09 11:33:39', 2, 'Irfan Shaikh', 4.00, 'placeholder.jpg', 'Very Good Experience with Peahen Corporate. Very fast processing and very good cooperation customer support representative.', 0),
(14, '2021-07-09 11:34:14', 2, 'Atish Jamdade', 4.50, 'placeholder.jpg', 'The way the customer support personally handle the issues is wonderful and praise worthy. One can be ensured of customised decisions and resolutions regarding the loan you apply for. The firm is customer-friendly and not just profit-minded.', 0),
(15, '2021-07-09 11:34:40', 2, 'Shabana Begum', 4.50, 'placeholder.jpg', 'Having a great experience with it. It would be much helpfull If the credit amount get increase in repayment of previous loans.', 0);

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
  `cibilscore` varchar(256) COLLATE utf8mb4_general_ci NOT NULL,
  `loanpurpose` varchar(256) COLLATE utf8mb4_general_ci NOT NULL,
  `income` bigint NOT NULL,
  `currentemi` int NOT NULL,
  `emibounce` int NOT NULL DEFAULT '0' COMMENT '0=No, 1=Yes',
  `loantenure` int DEFAULT NULL,
  `preferred_date_time` datetime DEFAULT NULL,
  `status` int NOT NULL DEFAULT '1' COMMENT '1=New, 2=Approve, 3=Reject',
  `isDelete` int NOT NULL DEFAULT '0' COMMENT '0=No, 1=Yes',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_application`
--

INSERT INTO `user_application` (`id`, `rec_date`, `userid`, `loantype`, `loanamount`, `cibilscore`, `loanpurpose`, `income`, `currentemi`, `emibounce`, `loantenure`, `preferred_date_time`, `status`, `isDelete`) VALUES
(1, '2025-08-19 17:40:03', 1, 11, 10000, '700 - 750', 'Personal Use', 15000, 0, 0, 72, NULL, 1, 0),
(2, '2026-02-06 12:49:22', 2, 11, 500000, '700 - 750', 'Personal Use', 35000, 1000, 0, 36, NULL, 1, 0),
(3, '2026-03-21 10:25:00', 3, 11, 500000, '700 - 750', 'Personal Use', 35000, 1000, 0, 36, NULL, 1, 0);

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
  `loanroi` varchar(256) COLLATE utf8mb4_general_ci NOT NULL,
  `loanterms` varchar(256) COLLATE utf8mb4_general_ci NOT NULL,
  `processfees` int NOT NULL,
  `insurance` varchar(256) COLLATE utf8mb4_general_ci NOT NULL,
  `monthlyemi` int NOT NULL,
  `remarks` longtext COLLATE utf8mb4_general_ci NOT NULL,
  `sanction_letter` longtext COLLATE utf8mb4_general_ci NOT NULL,
  `staffid` int NOT NULL,
  `isDelete` int NOT NULL DEFAULT '0' COMMENT '0=No, 1=Yes',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_application_status`
--

INSERT INTO `user_application_status` (`id`, `rec_date`, `applicationid`, `statusid`, `statusdate`, `bankid`, `loanamount`, `loanroi`, `loanterms`, `processfees`, `insurance`, `monthlyemi`, `remarks`, `sanction_letter`, `staffid`, `isDelete`) VALUES
(1, '2025-08-19 17:40:03', 1, 1, '2025-08-19', 0, 0, '', '', 0, '', 0, '', '', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_documents`
--

DROP TABLE IF EXISTS `user_documents`;
CREATE TABLE IF NOT EXISTS `user_documents` (
  `id` int NOT NULL AUTO_INCREMENT,
  `rec_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `userid` int NOT NULL,
  `profilephoto` varchar(256) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `aadharcard` varchar(256) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `aadharcard_number` varchar(256) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `pancard` varchar(256) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `pancard_number` varchar(256) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `cancelcheque` varchar(256) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `lightbill` varchar(256) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `bankstatement` varchar(256) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `formsixteen` varchar(256) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `salaryslip` varchar(256) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `businessproof` varchar(256) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `itreturn` varchar(256) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `remarks` varchar(256) COLLATE utf8mb4_general_ci NOT NULL,
  `isVerified` tinyint NOT NULL DEFAULT '0' COMMENT '0=No, 1=Yes',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_registration`
--

DROP TABLE IF EXISTS `user_registration`;
CREATE TABLE IF NOT EXISTS `user_registration` (
  `id` int NOT NULL AUTO_INCREMENT,
  `rec_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fullname` varchar(256) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'noname',
  `mobile` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(256) COLLATE utf8mb4_general_ci NOT NULL,
  `pincode` varchar(6) COLLATE utf8mb4_general_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `state` varchar(256) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `usertype` int NOT NULL,
  `cardtype` int DEFAULT NULL COMMENT '11=Premium, 12=Platinum',
  `refcode` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `gstno` varchar(256) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `process_step` int NOT NULL DEFAULT '1',
  `isUser` int NOT NULL DEFAULT '0' COMMENT '0=None, 1=Steps, 2=Register',
  `iAgree` int NOT NULL DEFAULT '0' COMMENT '0=No, 1=Yes',
  `isActive` int NOT NULL DEFAULT '1' COMMENT '0=No, 1=Yes',
  `isDelete` int NOT NULL DEFAULT '0' COMMENT '0=No, 1=Yes',
  `isDnd` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0=No, 1=Yes',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_registration`
--

INSERT INTO `user_registration` (`id`, `rec_date`, `update_date`, `fullname`, `mobile`, `email`, `password`, `pincode`, `city`, `state`, `usertype`, `cardtype`, `refcode`, `gstno`, `process_step`, `isUser`, `iAgree`, `isActive`, `isDelete`, `isDnd`) VALUES
(1, '2025-08-19 17:40:03', '2025-08-19 17:40:03', 'test', '9408881214', 'info@verloopweb.com', 'd2pkd2krT2cwWENqcWIrNU9ieXRFUT09', '', 'surat', 'Gujarat', 0, 11, 'tes1214', NULL, 1, 2, 1, 1, 0, 0),
(2, '2026-02-06 12:45:00', '2026-02-06 12:45:11', 'test', '9609096096', 'test@g.com', '', '', 'surat', 'Gujarat', 0, 11, NULL, NULL, 2, 1, 0, 1, 0, 0),
(3, '2026-03-21 10:22:21', '2026-03-21 10:23:52', 'test', '9000000000', 'test@g.com', '', '395007', 'Surat', 'Gujarat', 0, 11, NULL, NULL, 2, 1, 0, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_subscription_application`
--

DROP TABLE IF EXISTS `user_subscription_application`;
CREATE TABLE IF NOT EXISTS `user_subscription_application` (
  `id` int NOT NULL AUTO_INCREMENT,
  `rec_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `userid` int NOT NULL,
  `loantype` int NOT NULL,
  `loanamount` bigint NOT NULL,
  `cibilscore` varchar(256) COLLATE utf8mb4_general_ci NOT NULL,
  `loanpurpose` varchar(256) COLLATE utf8mb4_general_ci NOT NULL,
  `income` bigint NOT NULL,
  `currentemi` int NOT NULL,
  `emibounce` int NOT NULL DEFAULT '0' COMMENT '0=No, 1=Yes',
  `loantenure` int DEFAULT NULL,
  `status` int NOT NULL DEFAULT '1' COMMENT '1=New, 2=Approve, 3=Reject',
  `isDelete` int NOT NULL DEFAULT '0' COMMENT '0=No, 1=Yes',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_subscription_application_status`
--

DROP TABLE IF EXISTS `user_subscription_application_status`;
CREATE TABLE IF NOT EXISTS `user_subscription_application_status` (
  `id` int NOT NULL AUTO_INCREMENT,
  `rec_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `applicationid` int NOT NULL,
  `statusid` int NOT NULL,
  `statusdate` date DEFAULT NULL,
  `bankid` int NOT NULL,
  `loanamount` int NOT NULL,
  `loanroi` varchar(256) COLLATE utf8mb4_general_ci NOT NULL,
  `loanterms` varchar(256) COLLATE utf8mb4_general_ci NOT NULL,
  `processfees` int NOT NULL,
  `insurance` varchar(256) COLLATE utf8mb4_general_ci NOT NULL,
  `monthlyemi` int NOT NULL,
  `remarks` varchar(256) COLLATE utf8mb4_general_ci NOT NULL,
  `sanction_letter` longtext COLLATE utf8mb4_general_ci NOT NULL,
  `staffid` int NOT NULL,
  `isDelete` int NOT NULL DEFAULT '0' COMMENT '0=No, 1=Yes',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_subscription_documents`
--

DROP TABLE IF EXISTS `user_subscription_documents`;
CREATE TABLE IF NOT EXISTS `user_subscription_documents` (
  `id` int NOT NULL AUTO_INCREMENT,
  `rec_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `userid` int NOT NULL,
  `profilephoto` varchar(256) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `aadharcard` varchar(256) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `aadharcard_number` varchar(256) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `pancard` varchar(256) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `pancard_number` varchar(256) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `cancelcheque` varchar(256) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `lightbill` varchar(256) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `bankstatement` varchar(256) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `formsixteen` varchar(256) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `salaryslip` varchar(256) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `businessproof` varchar(256) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `itreturn` varchar(256) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `remarks` varchar(256) COLLATE utf8mb4_general_ci NOT NULL,
  `isVerified` tinyint NOT NULL DEFAULT '0' COMMENT '0=No, 1=Yes',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_subscription_registration`
--

DROP TABLE IF EXISTS `user_subscription_registration`;
CREATE TABLE IF NOT EXISTS `user_subscription_registration` (
  `id` int NOT NULL AUTO_INCREMENT,
  `rec_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fullname` varchar(256) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'noname',
  `mobile` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(256) COLLATE utf8mb4_general_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `state` varchar(256) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `usertype` int NOT NULL,
  `cardtype` int DEFAULT NULL COMMENT '11=Premium, 12=Platinum',
  `refcode` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `gstno` varchar(256) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `process_step` int NOT NULL DEFAULT '1',
  `isUser` int NOT NULL DEFAULT '0' COMMENT '0=None, 1=Steps, 2=Register',
  `iAgree` int NOT NULL DEFAULT '0' COMMENT '0=No, 1=Yes',
  `isActive` int NOT NULL DEFAULT '1' COMMENT '0=No, 1=Yes',
  `isDelete` int NOT NULL DEFAULT '0' COMMENT '0=No, 1=Yes',
  `isDnd` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0=No, 1=Yes',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `orderid` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `orderamount` float(11,2) NOT NULL,
  `ordernote` varchar(256) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `statuscode` varchar(256) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `transactionid` varchar(256) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `paymentmode` varchar(256) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
