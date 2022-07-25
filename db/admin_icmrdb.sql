-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 18, 2022 at 01:27 PM
-- Server version: 10.5.15-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `admin_icmrdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `md_amc`
--

CREATE TABLE `md_amc` (
  `id` int(10) NOT NULL,
  `comp_id` int(10) NOT NULL,
  `item` int(20) NOT NULL,
  `item_serial` varchar(50) DEFAULT NULL,
  `instl_loc` varchar(100) NOT NULL,
  `instl_dt` date NOT NULL,
  `frm_dt` date NOT NULL,
  `to_dt` date NOT NULL,
  `period` enum('M','Q','H','Y') NOT NULL DEFAULT 'M',
  `amc_chrg` decimal(20,2) NOT NULL,
  `gst_rt` decimal(20,2) NOT NULL,
  `cgst` decimal(20,0) NOT NULL,
  `sgst` decimal(20,2) NOT NULL,
  `total` decimal(20,2) NOT NULL,
  `remarks` varchar(200) NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `created_dt` datetime NOT NULL,
  `modified_by` varchar(100) NOT NULL,
  `modified_dt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `md_catg`
--

CREATE TABLE `md_catg` (
  `sl_no` int(11) NOT NULL,
  `category` varchar(100) DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `created_dt` datetime DEFAULT NULL,
  `modified_by` varchar(100) DEFAULT NULL,
  `modified_dt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `md_catg`
--

INSERT INTO `md_catg` (`sl_no`, `category`, `created_by`, `created_dt`, `modified_by`, `modified_dt`) VALUES
(1, 'Computer Hardware', 'synergic', '2021-07-23 09:40:21', NULL, NULL),
(3, 'Electrical Equipments', 'synergic', '2021-07-23 10:20:22', 'synergic', '2021-07-23 11:09:59'),
(4, 'ygcfycfycyh', 'synergic', '2022-07-16 06:38:30', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `md_customer`
--

CREATE TABLE `md_customer` (
  `uin` int(10) NOT NULL,
  `cust_type` varchar(5) NOT NULL,
  `cust_name` varchar(100) NOT NULL,
  `addr_line1` varchar(100) NOT NULL,
  `addr_line2` varchar(100) DEFAULT NULL,
  `pin` int(10) NOT NULL,
  `gstin` varchar(50) NOT NULL,
  `pan` varchar(50) NOT NULL,
  `tan` varchar(50) NOT NULL,
  `propieter_namr` varchar(100) NOT NULL,
  `contact_person` varchar(100) NOT NULL,
  `mobile_no` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `company_type` varchar(5) NOT NULL,
  `bank_name` varchar(100) NOT NULL,
  `branch_name` varchar(100) NOT NULL,
  `ac_no` varchar(30) NOT NULL,
  `ifs_code` varchar(30) NOT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `created_dt` datetime DEFAULT NULL,
  `modified_by` varchar(50) DEFAULT NULL,
  `modified_dt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `md_customer`
--

INSERT INTO `md_customer` (`uin`, `cust_type`, `cust_name`, `addr_line1`, `addr_line2`, `pin`, `gstin`, `pan`, `tan`, `propieter_namr`, `contact_person`, `mobile_no`, `email`, `company_type`, `bank_name`, `branch_name`, `ac_no`, `ifs_code`, `created_by`, `created_dt`, `modified_by`, `modified_dt`) VALUES
(10000000, 'V', 'xyz', 'abc', '', 6789999, 'w6yyi99', '', '', '', '', '', '', 'P', '', '', '', '', 'synergic', '2021-08-07 05:00:42', NULL, NULL),
(10000001, 'C', 'difhisdhfihfihif', 'kjvnjsdn', 'hhcah', 700065, '', '', '', '', '', '', '', 'P', '', '', '', '', 'synergic', '2021-08-09 08:51:41', NULL, NULL),
(10000002, 'C', 'cvxvxvdfgdrg', 'bfbfsbg', 'bdfbf', 700065, '', '', '', '', '', '', '', 'P', '', '', '', '', 'synergic', '2021-08-09 08:53:13', NULL, NULL),
(10000003, 'C', 'Tanmoy Mondal', 'bfbfsbg', 'bdfbf', 700065, '', '', '', '', '', '', 'mondal.tanmoy@synergicsoftek.com', 'I', '', '', '', '', 'synergic', '2021-08-09 08:54:21', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `md_insu`
--

CREATE TABLE `md_insu` (
  `id` int(10) NOT NULL,
  `item` int(20) NOT NULL,
  `frm_dt` date NOT NULL,
  `to_dt` date NOT NULL,
  `remarks` varchar(100) DEFAULT NULL,
  `auth_person` varchar(200) NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `created_dt` datetime NOT NULL,
  `modified_by` varchar(100) NOT NULL,
  `modified_dt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `md_insu`
--

INSERT INTO `md_insu` (`id`, `item`, `frm_dt`, `to_dt`, `remarks`, `auth_person`, `created_by`, `created_dt`, `modified_by`, `modified_dt`) VALUES
(1, 2, '2021-08-09', '2021-08-31', NULL, 'uuuuuu', 'synergic', '2021-08-09 07:26:08', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `md_item`
--

CREATE TABLE `md_item` (
  `id` int(11) NOT NULL,
  `item_name` varchar(100) NOT NULL,
  `created_by` varchar(55) DEFAULT NULL,
  `created_dt` datetime DEFAULT NULL,
  `modified_by` varchar(55) DEFAULT NULL,
  `modified_dt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `md_item`
--

INSERT INTO `md_item` (`id`, `item_name`, `created_by`, `created_dt`, `modified_by`, `modified_dt`) VALUES
(2, 'bcd', 'synergic', '2021-07-29 13:13:03', 'synergic', 2021),
(3, 'ssss', 'synergic', '2021-08-04 11:19:26', 'synergic', 2021);

-- --------------------------------------------------------

--
-- Table structure for table `md_licence`
--

CREATE TABLE `md_licence` (
  `id` int(10) NOT NULL,
  `item` int(20) NOT NULL,
  `frm_dt` date NOT NULL,
  `to_dt` date NOT NULL,
  `rnw_from` date DEFAULT NULL,
  `rnw_to` date DEFAULT NULL,
  `auth_person` varchar(200) NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `created_dt` datetime NOT NULL,
  `modified_by` varchar(100) NOT NULL,
  `modified_dt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `md_licence`
--

INSERT INTO `md_licence` (`id`, `item`, `frm_dt`, `to_dt`, `rnw_from`, `rnw_to`, `auth_person`, `created_by`, `created_dt`, `modified_by`, `modified_dt`) VALUES
(4, 2, '2021-08-06', '2021-08-20', '2021-08-20', '2021-08-31', 'test1', 'synergic', '2021-08-06 14:09:39', 'synergic', '2021-08-06 14:09:45');

-- --------------------------------------------------------

--
-- Table structure for table `md_stk_item`
--

CREATE TABLE `md_stk_item` (
  `id` int(11) NOT NULL,
  `item_name` varchar(100) NOT NULL,
  `catg` varchar(100) DEFAULT NULL,
  `license` int(1) NOT NULL DEFAULT 0,
  `Insurance` int(1) NOT NULL DEFAULT 0,
  `amc` int(1) NOT NULL DEFAULT 0,
  `created_by` varchar(55) DEFAULT NULL,
  `created_dt` datetime DEFAULT NULL,
  `modified_by` varchar(55) DEFAULT NULL,
  `modified_dt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `md_stk_item`
--

INSERT INTO `md_stk_item` (`id`, `item_name`, `catg`, `license`, `Insurance`, `amc`, `created_by`, `created_dt`, `modified_by`, `modified_dt`) VALUES
(1, 'rwww', 'Electrical Equipments', 0, 0, 0, 'synergic', '2021-08-04 11:22:59', 'synergic', 2021),
(2, 'desktop computers', 'Computer Hardware', 0, 0, 0, 'synergic', '2022-07-16 06:56:44', NULL, 0),
(3, 'vsdfvgsdgdsrghdrgh', 'Electrical Equipments', 0, 0, 0, 'synergic', '2022-07-18 07:22:10', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `md_tenant`
--

CREATE TABLE `md_tenant` (
  `id` int(10) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `floor_no` int(5) DEFAULT NULL,
  `room_no` varchar(10) DEFAULT NULL,
  `agree_st_dt` varchar(15) DEFAULT NULL,
  `agree_end_dt` varchar(15) DEFAULT NULL,
  `covd_area` decimal(20,2) DEFAULT NULL,
  `rent_per_sqrt` decimal(20,2) DEFAULT NULL,
  `rent_per_mnth` decimal(20,2) DEFAULT NULL,
  `water_chrg` decimal(20,2) DEFAULT 0.00,
  `electric_chrg` decimal(20,2) DEFAULT 0.00,
  `car_pk_chrg` decimal(20,2) NOT NULL DEFAULT 0.00,
  `gst_rt` decimal(10,2) NOT NULL DEFAULT 0.00,
  `cgst` decimal(10,2) NOT NULL DEFAULT 0.00,
  `sgst` decimal(10,2) NOT NULL DEFAULT 0.00,
  `created_by` varchar(100) DEFAULT NULL,
  `created_dt` date NOT NULL,
  `modified_by` varchar(100) NOT NULL,
  `modified_dt` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `md_tenant`
--

INSERT INTO `md_tenant` (`id`, `name`, `floor_no`, `room_no`, `agree_st_dt`, `agree_end_dt`, `covd_area`, `rent_per_sqrt`, `rent_per_mnth`, `water_chrg`, `electric_chrg`, `car_pk_chrg`, `gst_rt`, `cgst`, `sgst`, `created_by`, `created_dt`, `modified_by`, `modified_dt`) VALUES
(1, 'raja', 3, '50', '2021-08-05', '2021-08-13', '555.00', '100.00', '55500.00', '512.00', '689.00', '444.00', '18.00', '455.00', '455.00', 'synergic', '2021-08-06', '', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `md_users`
--

CREATE TABLE `md_users` (
  `user_id` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_type` enum('U','M','A','B') NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_status` char(1) NOT NULL,
  `branch_id` varchar(20) NOT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `created_dt` datetime DEFAULT NULL,
  `modified_by` varchar(50) DEFAULT NULL,
  `modified_dt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `md_users`
--

INSERT INTO `md_users` (`user_id`, `password`, `user_type`, `user_name`, `user_status`, `branch_id`, `created_by`, `created_dt`, `modified_by`, `modified_dt`) VALUES
('sss', '$2y$10$4lh8owRjV9NClHfR6nA11O67Btw/HrMsU0L01QAg4DTcQRubInxdW', 'A', 'synergic', 'A', '342', 'synergic', '2020-07-27 06:20:29', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `td_stockin`
--

CREATE TABLE `td_stockin` (
  `sl_no` int(10) NOT NULL,
  `item` int(10) DEFAULT NULL,
  `inventry_no` varchar(50) DEFAULT NULL,
  `pur_dt` date DEFAULT NULL,
  `inv_no` varchar(10) DEFAULT NULL,
  `challan_no` varchar(10) DEFAULT NULL,
  `vendor` int(10) DEFAULT NULL,
  `amt` decimal(20,0) NOT NULL,
  `gst_rt` decimal(20,2) NOT NULL,
  `cgst` decimal(20,2) NOT NULL,
  `sgst` decimal(20,2) NOT NULL,
  `total` decimal(20,2) NOT NULL,
  `stock` int(10) NOT NULL,
  `created_by` varchar(20) NOT NULL,
  `created_dt` datetime NOT NULL,
  `modified_by` varchar(20) NOT NULL,
  `modified_dt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `td_stockin`
--

INSERT INTO `td_stockin` (`sl_no`, `item`, `inventry_no`, `pur_dt`, `inv_no`, `challan_no`, `vendor`, `amt`, `gst_rt`, `cgst`, `sgst`, `total`, `stock`, `created_by`, `created_dt`, `modified_by`, `modified_dt`) VALUES
(2, 1, 'InVuuii88', '2021-08-23', 'innjjjj', 'Challan_56', 10000001, '500', '20.00', '50.00', '50.00', '600.00', 10, 'synergic', '2021-08-23 11:38:45', 'synergic', '2021-08-23 12:14:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `md_amc`
--
ALTER TABLE `md_amc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `md_catg`
--
ALTER TABLE `md_catg`
  ADD UNIQUE KEY `sl_no_catg` (`sl_no`);

--
-- Indexes for table `md_customer`
--
ALTER TABLE `md_customer`
  ADD PRIMARY KEY (`uin`);

--
-- Indexes for table `md_insu`
--
ALTER TABLE `md_insu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `md_item`
--
ALTER TABLE `md_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `md_licence`
--
ALTER TABLE `md_licence`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `md_stk_item`
--
ALTER TABLE `md_stk_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `md_tenant`
--
ALTER TABLE `md_tenant`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `md_users`
--
ALTER TABLE `md_users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `td_stockin`
--
ALTER TABLE `td_stockin`
  ADD PRIMARY KEY (`sl_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `md_amc`
--
ALTER TABLE `md_amc`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `md_catg`
--
ALTER TABLE `md_catg`
  MODIFY `sl_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `md_insu`
--
ALTER TABLE `md_insu`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `md_item`
--
ALTER TABLE `md_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `md_licence`
--
ALTER TABLE `md_licence`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `md_stk_item`
--
ALTER TABLE `md_stk_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `md_tenant`
--
ALTER TABLE `md_tenant`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `td_stockin`
--
ALTER TABLE `td_stockin`
  MODIFY `sl_no` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
