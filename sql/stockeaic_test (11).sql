-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 23, 2023 at 09:29 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stockeaic_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `acc_coa`
--

CREATE TABLE `acc_coa` (
  `HeadCode` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `HeadName` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `PHeadName` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `HeadLevel` int(11) NOT NULL,
  `IsActive` tinyint(1) NOT NULL,
  `IsTransaction` tinyint(1) NOT NULL,
  `IsGL` tinyint(1) NOT NULL,
  `HeadType` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `IsBudget` tinyint(1) NOT NULL,
  `IsDepreciation` tinyint(1) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `supplier_id` int(11) DEFAULT NULL,
  `DepreciationRate` decimal(18,2) NOT NULL,
  `CreateBy` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `CreateDate` datetime NOT NULL,
  `UpdateBy` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `UpdateDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `acc_coa`
--

INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `customer_id`, `supplier_id`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES
('102030000003', '10-Newcome', 'Customer Receivable', 4, 1, 1, 0, 'A', 0, 0, 10, NULL, '0.00', '92', '2023-06-13 11:37:31', '', '0000-00-00 00:00:00'),
('502000001', '12-AMORIO', 'Account Payable', 3, 1, 1, 0, 'L', 0, 0, NULL, 12, '0.00', '38', '2023-06-07 07:03:04', '', '0000-00-00 00:00:00'),
('502000002', '13-Doneajith', 'Account Payable', 3, 1, 1, 0, 'L', 0, 0, NULL, 13, '0.00', '38', '2023-06-07 09:31:05', '', '0000-00-00 00:00:00'),
('502000003', '14-TESTSUPPLIER', 'Account Payable', 3, 1, 1, 0, 'L', 0, 0, NULL, 14, '0.00', '38', '2023-06-07 09:40:52', '', '0000-00-00 00:00:00'),
('502000004', '15-TESTSUPPLIER', 'Account Payable', 3, 1, 1, 0, 'L', 0, 0, NULL, 15, '0.00', '38', '2023-06-07 09:41:09', '', '0000-00-00 00:00:00'),
('502000005', '16-NewVne', 'Account Payable', 3, 1, 1, 0, 'L', 0, 0, NULL, 16, '0.00', '92', '2023-06-13 11:36:30', '', '0000-00-00 00:00:00'),
('102030000001', '8-AJITHKUMAR', 'Customer Receivable', 4, 1, 1, 0, 'A', 0, 0, 8, NULL, '0.00', '38', '2023-06-07 07:01:52', '', '0000-00-00 00:00:00'),
('102030000002', '9-TESTCUST', 'Customer Receivable', 4, 1, 1, 0, 'A', 0, 0, 9, NULL, '0.00', '38', '2023-06-07 09:47:16', '', '0000-00-00 00:00:00'),
('102010203', 'Indian Bank', 'Cash At Bank', 4, 1, 1, 0, 'A', 0, 0, NULL, NULL, '0.00', '38', '2023-06-23 09:01:31', '', '0000-00-00 00:00:00'),
('102010201', 'new', 'Cash At Bank', 4, 1, 1, 0, 'A', 0, 0, NULL, NULL, '0.00', '38', '2023-06-14 08:16:05', '', '0000-00-00 00:00:00'),
('102010202', 'State Bank', 'Cash At Bank', 4, 1, 1, 0, 'A', 0, 0, NULL, NULL, '0.00', '38', '2023-06-23 08:57:55', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `acc_transaction`
--

CREATE TABLE `acc_transaction` (
  `ID` int(11) NOT NULL,
  `VNo` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Vtype` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `VDate` date DEFAULT NULL,
  `COAID` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Narration` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `Debit` decimal(18,2) DEFAULT NULL,
  `Credit` decimal(18,2) DEFAULT NULL,
  `IsPosted` char(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CreateBy` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CreateDate` datetime DEFAULT NULL,
  `UpdateBy` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `UpdateDate` datetime DEFAULT NULL,
  `IsAppove` char(10) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `acc_transaction`
--

INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES
(180, 'NAN3TCWFLT', 'PR Balance', '2023-06-07', '102030000001', 'Customer debit For AJITHKUMAR', '55.00', '0.00', '1', '38', '2023-06-07 07:01:52', NULL, NULL, '1'),
(181, 'NAN3TCWFLT', 'PR Balance', '2023-06-07', '102030000001', 'Inventory credit For Old sale ForAJITHKUMAR', '0.00', '55.00', '1', '38', '2023-06-07 07:01:52', NULL, NULL, '1'),
(182, 'BHYL71FSBU', 'PR Balance', '2023-06-07', '502000001', 'supplier debit For AMORIO', '0.00', '76.00', '1', '38', '2023-06-07 07:03:04', NULL, NULL, '1'),
(183, 'BHYL71FSBU', 'PR Balance', '2023-06-07', '10107', 'Inventory credit For  AMORIO', '76.00', '0.00', '1', '38', '2023-06-07 07:03:04', NULL, NULL, '1'),
(184, '20230607070847', 'Purchase', '2023-06-10', '10107', 'Inventory Debit For Supplier AMORIO', NULL, '0.00', '1', '38', '2023-06-07 07:08:47', NULL, NULL, '1'),
(185, '20230607070847', 'Purchase', '2023-06-10', '502000001', 'Supplier .AMORIO', '0.00', NULL, '1', '38', '2023-06-07 00:00:00', NULL, NULL, '1'),
(186, '20230607070847', 'Purchase', '2023-06-10', '402', 'Company Credit For  AMORIO', NULL, '0.00', '1', '38', '2023-06-07 07:08:47', NULL, NULL, '1'),
(187, '9793375342', 'INV', '2023-06-07', '10107', 'Inventory credit For Invoice No1000', '0.00', '0.00', '1', '38', '2023-06-07 07:12:12', NULL, NULL, '1'),
(188, '9793375342', 'INV', '2023-06-07', '102030000001', 'Customer debit For Invoice No -  1000 Customer AJITHKUMAR', '0.00', '0.00', '1', '38', '2023-06-07 07:12:12', NULL, NULL, '1'),
(189, '9793375342', 'INV', '2023-06-07', '303', 'Sale Income For Invoice NO - 1000 Customer AJITHKUMAR', '0.00', '0.00', '1', '38', '2023-06-07 07:12:12', NULL, NULL, '1'),
(190, '9793375342', 'INV', '2023-06-07', '', 'Paid amount for customer  Invoice No - 1000 customer -AJITHKUMAR', NULL, '0.00', '1', '38', '2023-06-07 07:12:12', NULL, NULL, '1'),
(191, '1985155752', 'INV', '2023-06-07', '10107', 'Inventory credit For Invoice No1000', '0.00', '0.00', '1', '38', '2023-06-07 07:13:12', NULL, NULL, '1'),
(192, '1985155752', 'INV', '2023-06-07', '303', 'Sale Income For Invoice NO - 1000 Customer ', '0.00', '0.00', '1', '38', '2023-06-07 07:13:12', NULL, NULL, '1'),
(193, '1985155752', 'INV', '2023-06-07', '', 'Paid amount for customer  Invoice No - 1000 customer -', NULL, '0.00', '1', '38', '2023-06-07 07:13:12', NULL, NULL, '1'),
(194, '20230607071648', 'Purchase', '2023-06-07', '10107', 'Inventory Debit For Supplier AMORIO', NULL, '0.00', '1', '38', '2023-06-07 07:16:48', NULL, NULL, '1'),
(195, '20230607071648', 'Purchase', '2023-06-07', '502000001', 'Supplier .AMORIO', '0.00', NULL, '1', '38', '2023-06-07 00:00:00', NULL, NULL, '1'),
(196, '20230607071648', 'Purchase', '2023-06-07', '402', 'Company Credit For  AMORIO', NULL, '0.00', '1', '38', '2023-06-07 07:16:48', NULL, NULL, '1'),
(197, '20230607071648', 'Purchase', '2023-06-07', '', 'Paid amount for Supplier  AMORIO', '0.00', '346434.00', '1', '38', '2023-06-07 07:16:48', NULL, NULL, '1'),
(198, '20230607071648', 'Purchase', '2023-06-07', '502000001', 'Supplier .AMORIO', '346434.00', '0.00', '1', '38', '2023-06-07 00:00:00', NULL, NULL, '1'),
(199, '20230607071723', 'Purchase', '2023-06-07', '10107', 'Inventory Debit For Supplier AMORIO', NULL, '0.00', '1', '38', '2023-06-07 07:17:23', NULL, NULL, '1'),
(200, '20230607071723', 'Purchase', '2023-06-07', '502000001', 'Supplier .AMORIO', '0.00', NULL, '1', '38', '2023-06-07 00:00:00', NULL, NULL, '1'),
(201, '20230607071723', 'Purchase', '2023-06-07', '402', 'Company Credit For  AMORIO', NULL, '0.00', '1', '38', '2023-06-07 07:17:23', NULL, NULL, '1'),
(202, '20230607071723', 'Purchase', '2023-06-07', '', 'Paid amount for Supplier  AMORIO', '0.00', '346434.00', '1', '38', '2023-06-07 07:17:23', NULL, NULL, '1'),
(203, '20230607071723', 'Purchase', '2023-06-07', '502000001', 'Supplier .AMORIO', '346434.00', '0.00', '1', '38', '2023-06-07 00:00:00', NULL, NULL, '1'),
(204, '3117844194', 'INV', '2023-06-07', '10107', 'Inventory credit For Invoice No1000', '0.00', '0.00', '1', '38', '2023-06-07 08:05:08', NULL, NULL, '1'),
(205, '3117844194', 'INV', '2023-06-07', '303', 'Sale Income For Invoice NO - 1000 Customer ', '0.00', '0.00', '1', '38', '2023-06-07 08:05:08', NULL, NULL, '1'),
(206, '3117844194', 'INV', '2023-06-07', '', 'Paid amount for customer  Invoice No - 1000 customer -', NULL, '0.00', '1', '38', '2023-06-07 08:05:08', NULL, NULL, '1'),
(207, 'VNG3OZ4F9Z', 'PR Balance', '2023-06-07', '502000003', 'supplier debit For TESTSUPPLIER', '0.00', '5555.00', '1', '38', '2023-06-07 09:40:52', NULL, NULL, '1'),
(208, 'VNG3OZ4F9Z', 'PR Balance', '2023-06-07', '10107', 'Inventory credit For  TESTSUPPLIER', '5555.00', '0.00', '1', '38', '2023-06-07 09:40:52', NULL, NULL, '1'),
(209, 'UVKETOC97R', 'PR Balance', '2023-06-07', '502000004', 'supplier debit For TESTSUPPLIER', '0.00', '5555.00', '1', '38', '2023-06-07 09:41:09', NULL, NULL, '1'),
(210, 'UVKETOC97R', 'PR Balance', '2023-06-07', '10107', 'Inventory credit For  TESTSUPPLIER', '5555.00', '0.00', '1', '38', '2023-06-07 09:41:09', NULL, NULL, '1'),
(211, '7OECNH1VAE', 'PR Balance', '2023-06-07', '102030000002', 'Customer debit For TESTCUST', '78.00', '0.00', '1', '38', '2023-06-07 09:47:16', NULL, NULL, '1'),
(212, '7OECNH1VAE', 'PR Balance', '2023-06-07', '102030000002', 'Inventory credit For Old sale ForTESTCUST', '0.00', '78.00', '1', '38', '2023-06-07 09:47:16', NULL, NULL, '1'),
(213, '8951569938', 'INV', '2023-06-07', '10107', 'Inventory credit For Invoice No1000', '0.00', '0.00', '1', '38', '2023-06-07 09:49:40', NULL, NULL, '1'),
(214, '8951569938', 'INV', '2023-06-07', '102030000001', 'Customer debit For Invoice No -  1000 Customer AJITHKUMAR', '0.00', '0.00', '1', '38', '2023-06-07 09:49:40', NULL, NULL, '1'),
(215, '8951569938', 'INV', '2023-06-07', '303', 'Sale Income For Invoice NO - 1000 Customer AJITHKUMAR', '0.00', '0.00', '1', '38', '2023-06-07 09:49:40', NULL, NULL, '1'),
(216, '8951569938', 'INV', '2023-06-07', '', 'Paid amount for customer  Invoice No - 1000 customer -AJITHKUMAR', NULL, '0.00', '1', '38', '2023-06-07 09:49:40', NULL, NULL, '1'),
(217, '3232251121', 'INV', '2023-06-07', '10107', 'Inventory credit For Invoice No1000', '0.00', '0.00', '1', '38', '2023-06-07 09:53:54', NULL, NULL, '1'),
(218, '3232251121', 'INV', '2023-06-07', '303', 'Sale Income For Invoice NO - 1000 Customer ', '0.00', '0.00', '1', '38', '2023-06-07 09:53:54', NULL, NULL, '1'),
(219, '3232251121', 'INV', '2023-06-07', '', 'Paid amount for customer  Invoice No - 1000 customer -', NULL, '0.00', '1', '38', '2023-06-07 09:53:54', NULL, NULL, '1'),
(220, '8844387471', 'INV', '2023-06-07', '10107', 'Inventory credit For Invoice No1000', '0.00', '0.00', '1', '38', '2023-06-07 09:55:54', NULL, NULL, '1'),
(221, '8844387471', 'INV', '2023-06-07', '303', 'Sale Income For Invoice NO - 1000 Customer ', '0.00', '0.00', '1', '38', '2023-06-07 09:55:54', NULL, NULL, '1'),
(222, '8844387471', 'INV', '2023-06-07', '', 'Paid amount for customer  Invoice No - 1000 customer -', NULL, '0.00', '1', '38', '2023-06-07 09:55:54', NULL, NULL, '1'),
(223, '20230607102416', 'Purchase', '2023-06-07', '10107', 'Inventory Debit For Supplier TESTSUPPLIER', NULL, '0.00', '1', '38', '2023-06-07 10:24:16', NULL, NULL, '1'),
(224, '20230607102416', 'Purchase', '2023-06-07', '502000004', 'Supplier .TESTSUPPLIER', '0.00', NULL, '1', '38', '2023-06-07 00:00:00', NULL, NULL, '1'),
(225, '20230607102416', 'Purchase', '2023-06-07', '402', 'Company Credit For  TESTSUPPLIER', NULL, '0.00', '1', '38', '2023-06-07 10:24:16', NULL, NULL, '1'),
(226, '20230607102416', 'Purchase', '2023-06-07', '', 'Paid amount for Supplier  TESTSUPPLIER', '0.00', '1000000.00', '1', '38', '2023-06-07 10:24:16', NULL, NULL, '1'),
(227, '20230607102416', 'Purchase', '2023-06-07', '502000004', 'Supplier .TESTSUPPLIER', '1000000.00', '0.00', '1', '38', '2023-06-07 00:00:00', NULL, NULL, '1'),
(228, '20230607102532', 'Purchase', '2023-06-07', '10107', 'Inventory Debit For Supplier TESTSUPPLIER', NULL, '0.00', '1', '38', '2023-06-07 10:25:32', NULL, NULL, '1'),
(229, '20230607102532', 'Purchase', '2023-06-07', '502000004', 'Supplier .TESTSUPPLIER', '0.00', NULL, '1', '38', '2023-06-07 00:00:00', NULL, NULL, '1'),
(230, '20230607102532', 'Purchase', '2023-06-07', '402', 'Company Credit For  TESTSUPPLIER', NULL, '0.00', '1', '38', '2023-06-07 10:25:32', NULL, NULL, '1'),
(231, '20230607102532', 'Purchase', '2023-06-07', '', 'Paid amount for Supplier  TESTSUPPLIER', '0.00', '1000000.00', '1', '38', '2023-06-07 10:25:32', NULL, NULL, '1'),
(232, '20230607102532', 'Purchase', '2023-06-07', '502000004', 'Supplier .TESTSUPPLIER', '1000000.00', '0.00', '1', '38', '2023-06-07 00:00:00', NULL, NULL, '1'),
(233, '20230607111015', 'Purchase', '2023-06-10', '10107', 'Inventory Debit For Supplier TESTSUPPLIER', NULL, '0.00', '1', '38', '2023-06-07 11:10:15', NULL, NULL, '1'),
(234, '20230607111015', 'Purchase', '2023-06-10', '502000004', 'Supplier .TESTSUPPLIER', '0.00', NULL, '1', '38', '2023-06-07 00:00:00', NULL, NULL, '1'),
(235, '20230607111015', 'Purchase', '2023-06-10', '402', 'Company Credit For  TESTSUPPLIER', NULL, '0.00', '1', '38', '2023-06-07 11:10:15', NULL, NULL, '1'),
(236, '20230607111437', 'Purchase', '2023-06-10', '10107', 'Inventory Debit For Supplier AMORIO', NULL, '0.00', '1', '38', '2023-06-07 11:14:37', NULL, NULL, '1'),
(237, '20230607111437', 'Purchase', '2023-06-10', '502000001', 'Supplier .AMORIO', '0.00', NULL, '1', '38', '2023-06-07 00:00:00', NULL, NULL, '1'),
(238, '20230607111437', 'Purchase', '2023-06-10', '402', 'Company Credit For  AMORIO', NULL, '0.00', '1', '38', '2023-06-07 11:14:37', NULL, NULL, '1'),
(239, '20230607114648', 'Purchase', '2023-06-10', '10107', 'Inventory Debit For Supplier TESTSUPPLIER', NULL, '0.00', '1', '38', '2023-06-07 11:46:48', NULL, NULL, '1'),
(240, '20230607114648', 'Purchase', '2023-06-10', '502000004', 'Supplier .TESTSUPPLIER', '0.00', NULL, '1', '38', '2023-06-07 00:00:00', NULL, NULL, '1'),
(241, '20230607114648', 'Purchase', '2023-06-10', '402', 'Company Credit For  TESTSUPPLIER', NULL, '0.00', '1', '38', '2023-06-07 11:46:48', NULL, NULL, '1'),
(242, '20230607115042', 'Purchase', '2023-06-10', '10107', 'Inventory Debit For Supplier AMORIO', NULL, '0.00', '1', '38', '2023-06-07 11:50:42', NULL, NULL, '1'),
(243, '20230607115042', 'Purchase', '2023-06-10', '502000001', 'Supplier .AMORIO', '0.00', NULL, '1', '38', '2023-06-07 00:00:00', NULL, NULL, '1'),
(244, '20230607115042', 'Purchase', '2023-06-10', '402', 'Company Credit For  AMORIO', NULL, '0.00', '1', '38', '2023-06-07 11:50:42', NULL, NULL, '1'),
(245, '20230607115059', 'Purchase', '2023-06-10', '10107', 'Inventory Debit For Supplier AMORIO', NULL, '0.00', '1', '38', '2023-06-07 11:50:59', NULL, NULL, '1'),
(246, '20230607115059', 'Purchase', '2023-06-10', '502000001', 'Supplier .AMORIO', '0.00', NULL, '1', '38', '2023-06-07 00:00:00', NULL, NULL, '1'),
(247, '20230607115059', 'Purchase', '2023-06-10', '402', 'Company Credit For  AMORIO', NULL, '0.00', '1', '38', '2023-06-07 11:50:59', NULL, NULL, '1'),
(248, '20230607115138', 'Purchase', '2023-06-10', '10107', 'Inventory Debit For Supplier AMORIO', NULL, '0.00', '1', '38', '2023-06-07 11:51:38', NULL, NULL, '1'),
(249, '20230607115138', 'Purchase', '2023-06-10', '502000001', 'Supplier .AMORIO', '0.00', NULL, '1', '38', '2023-06-07 00:00:00', NULL, NULL, '1'),
(250, '20230607115138', 'Purchase', '2023-06-10', '402', 'Company Credit For  AMORIO', NULL, '0.00', '1', '38', '2023-06-07 11:51:38', NULL, NULL, '1'),
(251, '20230607115333', 'Purchase', '2023-06-10', '10107', 'Inventory Debit For Supplier TESTSUPPLIER', NULL, '0.00', '1', '38', '2023-06-07 11:53:33', NULL, NULL, '1'),
(252, '20230607115333', 'Purchase', '2023-06-10', '502000004', 'Supplier .TESTSUPPLIER', '0.00', NULL, '1', '38', '2023-06-07 00:00:00', NULL, NULL, '1'),
(253, '20230607115333', 'Purchase', '2023-06-10', '402', 'Company Credit For  TESTSUPPLIER', NULL, '0.00', '1', '38', '2023-06-07 11:53:33', NULL, NULL, '1'),
(254, '4491946983', 'INV', '2023-06-09', '10107', 'Inventory credit For Invoice No1000', '0.00', '0.00', '1', '38', '2023-06-09 07:18:12', NULL, NULL, '1'),
(255, '4491946983', 'INV', '2023-06-09', '303', 'Sale Income For Invoice NO - 1000 Customer ', '0.00', '0.00', '1', '38', '2023-06-09 07:18:12', NULL, NULL, '1'),
(256, '4491946983', 'INV', '2023-06-09', '', 'Paid amount for customer  Invoice No - 1000 customer -', NULL, '0.00', '1', '38', '2023-06-09 07:18:12', NULL, NULL, '1'),
(257, '3259497428', 'INV', '2023-06-09', '10107', 'Inventory credit For Invoice No1000', '0.00', '0.00', '1', '38', '2023-06-09 07:27:49', NULL, NULL, '1'),
(258, '3259497428', 'INV', '2023-06-09', '303', 'Sale Income For Invoice NO - 1000 Customer ', '0.00', '0.00', '1', '38', '2023-06-09 07:27:49', NULL, NULL, '1'),
(259, '3259497428', 'INV', '2023-06-09', '', 'Paid amount for customer  Invoice No - 1000 customer -', NULL, '0.00', '1', '38', '2023-06-09 07:27:49', NULL, NULL, '1'),
(260, 'LRDQTXT8JQ', 'PR Balance', '2023-06-13', '502000005', 'supplier debit For NewVne', '0.00', '453.00', '1', '92', '2023-06-13 11:36:30', NULL, NULL, '1'),
(261, 'LRDQTXT8JQ', 'PR Balance', '2023-06-13', '10107', 'Inventory credit For  NewVne', '453.00', '0.00', '1', '92', '2023-06-13 11:36:30', NULL, NULL, '1'),
(262, 'B3PMY9LNEN', 'PR Balance', '2023-06-13', '102030000003', 'Customer debit For Newcome', '456.00', '0.00', '1', '92', '2023-06-13 11:37:31', NULL, NULL, '1'),
(263, 'B3PMY9LNEN', 'PR Balance', '2023-06-13', '102030000003', 'Inventory credit For Old sale ForNewcome', '0.00', '456.00', '1', '92', '2023-06-13 11:37:31', NULL, NULL, '1'),
(264, '2657225324', 'INV', '2023-06-13', '10107', 'Inventory credit For Invoice No1000', '0.00', '0.00', '1', '92', '2023-06-13 11:38:55', NULL, NULL, '1'),
(265, '2657225324', 'INV', '2023-06-13', '102030000003', 'Customer debit For Invoice No -  1000 Customer Newcome', '0.00', '0.00', '1', '92', '2023-06-13 11:38:55', NULL, NULL, '1'),
(266, '2657225324', 'INV', '2023-06-13', '303', 'Sale Income For Invoice NO - 1000 Customer Newcome', '0.00', '0.00', '1', '92', '2023-06-13 11:38:55', NULL, NULL, '1'),
(267, '2657225324', 'INV', '2023-06-13', '', 'Paid amount for customer  Invoice No - 1000 customer -Newcome', NULL, '0.00', '1', '92', '2023-06-13 11:38:55', NULL, NULL, '1'),
(268, 'BO6118UUF5', 'LNR', '2023-06-14', '', 'Loan for .', '0.00', '100.00', '1', '38', '2023-06-14 08:39:52', NULL, NULL, '1'),
(269, '31BRHMLPQ3', 'LNR', '2023-06-30', '1020101', 'Cash in Hand Credit For satyam mishra', '0.00', '522.00', '1', '38', '2023-06-14 10:00:03', NULL, NULL, '1'),
(270, 'WOABTHIQXT', 'LNR', '2023-06-14', '102010201', 'Loan for .satyam mishra', '0.00', '34534.00', '1', '38', '2023-06-14 10:04:13', NULL, NULL, '1'),
(271, '8OKDYRA9OM', 'LNR', '2023-06-14', '102010201', 'Loan for .satyam mishra', '0.00', '34534.00', '1', '38', '2023-06-14 10:06:36', NULL, NULL, '1'),
(272, 'Z42QI5NNXY', 'LNR', '2023-06-14', '102010201', 'Loan for .satyam mishra', '0.00', '34534.00', '1', '38', '2023-06-14 10:07:49', NULL, NULL, '1'),
(273, 'C5UIU8ALU5', 'LNR', '2023-06-14', '102010201', 'Loan for .satyam mishra', '0.00', '34534.00', '1', '38', '2023-06-14 10:10:14', NULL, NULL, '1'),
(274, 'B79HDOP5KH', 'LNR', '2023-06-14', '102010201', 'Loan for .satyam mishra', '0.00', '34534.00', '1', '38', '2023-06-14 10:19:18', NULL, NULL, '1'),
(275, '2CCD9L2XJD', 'LNR', '2023-06-14', '102010201', 'Loan for .satyam mishra', '0.00', '34534.00', '1', '38', '2023-06-14 10:19:30', NULL, NULL, '1'),
(276, '20230614133813', 'Purchase', '2023-06-14', '10107', 'Inventory Debit For Supplier TESTSUPPLIER', NULL, '0.00', '1', '38', '2023-06-14 13:38:13', NULL, NULL, '1'),
(277, '20230614133813', 'Purchase', '2023-06-14', '502000004', 'Supplier .TESTSUPPLIER', '0.00', NULL, '1', '38', '2023-06-14 00:00:00', NULL, NULL, '1'),
(278, '20230614133813', 'Purchase', '2023-06-14', '402', 'Company Credit For  TESTSUPPLIER', NULL, '0.00', '1', '38', '2023-06-14 13:38:13', NULL, NULL, '1'),
(279, '20230614133813', 'Purchase', '2023-06-14', '', 'Paid amount for Supplier  TESTSUPPLIER', '0.00', '1000000.00', '1', '38', '2023-06-14 13:38:13', NULL, NULL, '1'),
(280, '20230614133813', 'Purchase', '2023-06-14', '502000004', 'Supplier .TESTSUPPLIER', '1000000.00', '0.00', '1', '38', '2023-06-14 00:00:00', NULL, NULL, '1'),
(281, '20230616062110', 'Purchase', '2023-06-14', '10107', 'Inventory Debit For Supplier TESTSUPPLIER', NULL, '0.00', '1', '38', '2023-06-16 06:21:10', NULL, NULL, '1'),
(282, '20230616062110', 'Purchase', '2023-06-14', '502000004', 'Supplier .TESTSUPPLIER', '0.00', NULL, '1', '38', '2023-06-16 00:00:00', NULL, NULL, '1'),
(283, '20230616062110', 'Purchase', '2023-06-14', '402', 'Company Credit For  TESTSUPPLIER', NULL, '0.00', '1', '38', '2023-06-16 06:21:10', NULL, NULL, '1'),
(284, '20230616062121', 'Purchase', '2023-06-14', '10107', 'Inventory Debit For Supplier TESTSUPPLIER', NULL, '0.00', '1', '38', '2023-06-16 06:21:21', NULL, NULL, '1'),
(285, '20230616062121', 'Purchase', '2023-06-14', '502000004', 'Supplier .TESTSUPPLIER', '0.00', NULL, '1', '38', '2023-06-16 00:00:00', NULL, NULL, '1'),
(286, '20230616062121', 'Purchase', '2023-06-14', '402', 'Company Credit For  TESTSUPPLIER', NULL, '0.00', '1', '38', '2023-06-16 06:21:21', NULL, NULL, '1'),
(287, '20230616062311', 'Purchase', '2023-06-14', '10107', 'Inventory Debit For Supplier TESTSUPPLIER', NULL, '0.00', '1', '38', '2023-06-16 06:23:11', NULL, NULL, '1'),
(288, '20230616062311', 'Purchase', '2023-06-14', '502000004', 'Supplier .TESTSUPPLIER', '0.00', NULL, '1', '38', '2023-06-16 00:00:00', NULL, NULL, '1'),
(289, '20230616062311', 'Purchase', '2023-06-14', '402', 'Company Credit For  TESTSUPPLIER', NULL, '0.00', '1', '38', '2023-06-16 06:23:11', NULL, NULL, '1'),
(290, '20230616062613', 'Purchase', '2023-06-14', '10107', 'Inventory Debit For Supplier TESTSUPPLIER', NULL, '0.00', '1', '38', '2023-06-16 06:26:13', NULL, NULL, '1'),
(291, '20230616062613', 'Purchase', '2023-06-14', '502000004', 'Supplier .TESTSUPPLIER', '0.00', NULL, '1', '38', '2023-06-16 00:00:00', NULL, NULL, '1'),
(292, '20230616062613', 'Purchase', '2023-06-14', '402', 'Company Credit For  TESTSUPPLIER', NULL, '0.00', '1', '38', '2023-06-16 06:26:13', NULL, NULL, '1'),
(293, '20230616062616', 'Purchase', '2023-06-14', '10107', 'Inventory Debit For Supplier TESTSUPPLIER', NULL, '0.00', '1', '38', '2023-06-16 06:26:16', NULL, NULL, '1'),
(294, '20230616062616', 'Purchase', '2023-06-14', '502000004', 'Supplier .TESTSUPPLIER', '0.00', NULL, '1', '38', '2023-06-16 00:00:00', NULL, NULL, '1'),
(295, '20230616062616', 'Purchase', '2023-06-14', '402', 'Company Credit For  TESTSUPPLIER', NULL, '0.00', '1', '38', '2023-06-16 06:26:16', NULL, NULL, '1'),
(296, '20230616062745', 'Purchase', '2023-06-14', '10107', 'Inventory Debit For Supplier TESTSUPPLIER', NULL, '0.00', '1', '38', '2023-06-16 06:27:45', NULL, NULL, '1'),
(297, '20230616062745', 'Purchase', '2023-06-14', '502000004', 'Supplier .TESTSUPPLIER', '0.00', NULL, '1', '38', '2023-06-16 00:00:00', NULL, NULL, '1'),
(298, '20230616062745', 'Purchase', '2023-06-14', '402', 'Company Credit For  TESTSUPPLIER', NULL, '0.00', '1', '38', '2023-06-16 06:27:45', NULL, NULL, '1'),
(299, '20230616062842', 'Purchase', '2023-06-14', '10107', 'Inventory Debit For Supplier TESTSUPPLIER', NULL, '0.00', '1', '38', '2023-06-16 06:28:42', NULL, NULL, '1'),
(300, '20230616062842', 'Purchase', '2023-06-14', '502000004', 'Supplier .TESTSUPPLIER', '0.00', NULL, '1', '38', '2023-06-16 00:00:00', NULL, NULL, '1'),
(301, '20230616062842', 'Purchase', '2023-06-14', '402', 'Company Credit For  TESTSUPPLIER', NULL, '0.00', '1', '38', '2023-06-16 06:28:42', NULL, NULL, '1'),
(302, '20230616063258', 'Purchase', '2023-06-14', '10107', 'Inventory Debit For Supplier TESTSUPPLIER', NULL, '0.00', '1', '38', '2023-06-16 06:32:58', NULL, NULL, '1'),
(303, '20230616063258', 'Purchase', '2023-06-14', '502000004', 'Supplier .TESTSUPPLIER', '0.00', NULL, '1', '38', '2023-06-16 00:00:00', NULL, NULL, '1'),
(304, '20230616063258', 'Purchase', '2023-06-14', '402', 'Company Credit For  TESTSUPPLIER', NULL, '0.00', '1', '38', '2023-06-16 06:32:58', NULL, NULL, '1'),
(305, '20230616063502', 'Purchase', '2023-06-14', '10107', 'Inventory Debit For Supplier TESTSUPPLIER', NULL, '0.00', '1', '38', '2023-06-16 06:35:02', NULL, NULL, '1'),
(306, '20230616063502', 'Purchase', '2023-06-14', '502000004', 'Supplier .TESTSUPPLIER', '0.00', NULL, '1', '38', '2023-06-16 00:00:00', NULL, NULL, '1'),
(307, '20230616063502', 'Purchase', '2023-06-14', '402', 'Company Credit For  TESTSUPPLIER', NULL, '0.00', '1', '38', '2023-06-16 06:35:02', NULL, NULL, '1'),
(308, '20230616064117', 'Purchase', '2023-06-14', '10107', 'Inventory Debit For Supplier TESTSUPPLIER', NULL, '0.00', '1', '38', '2023-06-16 06:41:17', NULL, NULL, '1'),
(309, '20230616064117', 'Purchase', '2023-06-14', '502000004', 'Supplier .TESTSUPPLIER', '0.00', NULL, '1', '38', '2023-06-16 00:00:00', NULL, NULL, '1'),
(310, '20230616064117', 'Purchase', '2023-06-14', '402', 'Company Credit For  TESTSUPPLIER', NULL, '0.00', '1', '38', '2023-06-16 06:41:17', NULL, NULL, '1'),
(311, '20230616064134', 'Purchase', '2023-06-14', '10107', 'Inventory Debit For Supplier TESTSUPPLIER', NULL, '0.00', '1', '38', '2023-06-16 06:41:34', NULL, NULL, '1'),
(312, '20230616064134', 'Purchase', '2023-06-14', '502000004', 'Supplier .TESTSUPPLIER', '0.00', NULL, '1', '38', '2023-06-16 00:00:00', NULL, NULL, '1'),
(313, '20230616064134', 'Purchase', '2023-06-14', '402', 'Company Credit For  TESTSUPPLIER', NULL, '0.00', '1', '38', '2023-06-16 06:41:34', NULL, NULL, '1'),
(314, '20230616064231', 'Purchase', '2023-06-14', '10107', 'Inventory Debit For Supplier TESTSUPPLIER', NULL, '0.00', '1', '38', '2023-06-16 06:42:31', NULL, NULL, '1'),
(315, '20230616064231', 'Purchase', '2023-06-14', '502000004', 'Supplier .TESTSUPPLIER', '0.00', NULL, '1', '38', '2023-06-16 00:00:00', NULL, NULL, '1'),
(316, '20230616064231', 'Purchase', '2023-06-14', '402', 'Company Credit For  TESTSUPPLIER', NULL, '0.00', '1', '38', '2023-06-16 06:42:31', NULL, NULL, '1'),
(317, '20230616064407', 'Purchase', '2023-06-14', '10107', 'Inventory Debit For Supplier TESTSUPPLIER', NULL, '0.00', '1', '38', '2023-06-16 06:44:07', NULL, NULL, '1'),
(318, '20230616064407', 'Purchase', '2023-06-14', '502000004', 'Supplier .TESTSUPPLIER', '0.00', NULL, '1', '38', '2023-06-16 00:00:00', NULL, NULL, '1'),
(319, '20230616064407', 'Purchase', '2023-06-14', '402', 'Company Credit For  TESTSUPPLIER', NULL, '0.00', '1', '38', '2023-06-16 06:44:07', NULL, NULL, '1'),
(320, '20230616064523', 'Purchase', '2023-06-14', '10107', 'Inventory Debit For Supplier TESTSUPPLIER', NULL, '0.00', '1', '38', '2023-06-16 06:45:23', NULL, NULL, '1'),
(321, '20230616064523', 'Purchase', '2023-06-14', '502000004', 'Supplier .TESTSUPPLIER', '0.00', NULL, '1', '38', '2023-06-16 00:00:00', NULL, NULL, '1'),
(322, '20230616064523', 'Purchase', '2023-06-14', '402', 'Company Credit For  TESTSUPPLIER', NULL, '0.00', '1', '38', '2023-06-16 06:45:23', NULL, NULL, '1'),
(323, '20230616064538', 'Purchase', '2023-06-14', '10107', 'Inventory Debit For Supplier TESTSUPPLIER', NULL, '0.00', '1', '38', '2023-06-16 06:45:38', NULL, NULL, '1'),
(324, '20230616064538', 'Purchase', '2023-06-14', '502000004', 'Supplier .TESTSUPPLIER', '0.00', NULL, '1', '38', '2023-06-16 00:00:00', NULL, NULL, '1'),
(325, '20230616064538', 'Purchase', '2023-06-14', '402', 'Company Credit For  TESTSUPPLIER', NULL, '0.00', '1', '38', '2023-06-16 06:45:38', NULL, NULL, '1'),
(326, '20230616064613', 'Purchase', '2023-06-14', '10107', 'Inventory Debit For Supplier TESTSUPPLIER', NULL, '0.00', '1', '38', '2023-06-16 06:46:13', NULL, NULL, '1'),
(327, '20230616064613', 'Purchase', '2023-06-14', '502000004', 'Supplier .TESTSUPPLIER', '0.00', NULL, '1', '38', '2023-06-16 00:00:00', NULL, NULL, '1'),
(328, '20230616064613', 'Purchase', '2023-06-14', '402', 'Company Credit For  TESTSUPPLIER', NULL, '0.00', '1', '38', '2023-06-16 06:46:13', NULL, NULL, '1'),
(329, '20230616064717', 'Purchase', '2023-06-14', '10107', 'Inventory Debit For Supplier TESTSUPPLIER', NULL, '0.00', '1', '38', '2023-06-16 06:47:17', NULL, NULL, '1'),
(330, '20230616064717', 'Purchase', '2023-06-14', '502000004', 'Supplier .TESTSUPPLIER', '0.00', NULL, '1', '38', '2023-06-16 00:00:00', NULL, NULL, '1'),
(331, '20230616064717', 'Purchase', '2023-06-14', '402', 'Company Credit For  TESTSUPPLIER', NULL, '0.00', '1', '38', '2023-06-16 06:47:17', NULL, NULL, '1'),
(332, '20230616064943', 'Purchase', '2023-06-14', '10107', 'Inventory Debit For Supplier TESTSUPPLIER', NULL, '0.00', '1', '38', '2023-06-16 06:49:43', NULL, NULL, '1'),
(333, '20230616064943', 'Purchase', '2023-06-14', '502000004', 'Supplier .TESTSUPPLIER', '0.00', NULL, '1', '38', '2023-06-16 00:00:00', NULL, NULL, '1'),
(334, '20230616064943', 'Purchase', '2023-06-14', '402', 'Company Credit For  TESTSUPPLIER', NULL, '0.00', '1', '38', '2023-06-16 06:49:43', NULL, NULL, '1'),
(335, '20230616064946', 'Purchase', '2023-06-14', '10107', 'Inventory Debit For Supplier TESTSUPPLIER', NULL, '0.00', '1', '38', '2023-06-16 06:49:46', NULL, NULL, '1'),
(336, '20230616064946', 'Purchase', '2023-06-14', '502000004', 'Supplier .TESTSUPPLIER', '0.00', NULL, '1', '38', '2023-06-16 00:00:00', NULL, NULL, '1'),
(337, '20230616064946', 'Purchase', '2023-06-14', '402', 'Company Credit For  TESTSUPPLIER', NULL, '0.00', '1', '38', '2023-06-16 06:49:46', NULL, NULL, '1'),
(338, '20230616064949', 'Purchase', '2023-06-14', '10107', 'Inventory Debit For Supplier TESTSUPPLIER', NULL, '0.00', '1', '38', '2023-06-16 06:49:49', NULL, NULL, '1'),
(339, '20230616064949', 'Purchase', '2023-06-14', '502000004', 'Supplier .TESTSUPPLIER', '0.00', NULL, '1', '38', '2023-06-16 00:00:00', NULL, NULL, '1'),
(340, '20230616064949', 'Purchase', '2023-06-14', '402', 'Company Credit For  TESTSUPPLIER', NULL, '0.00', '1', '38', '2023-06-16 06:49:49', NULL, NULL, '1'),
(341, '20230616064950', 'Purchase', '2023-06-14', '10107', 'Inventory Debit For Supplier TESTSUPPLIER', NULL, '0.00', '1', '38', '2023-06-16 06:49:50', NULL, NULL, '1'),
(342, '20230616064950', 'Purchase', '2023-06-14', '502000004', 'Supplier .TESTSUPPLIER', '0.00', NULL, '1', '38', '2023-06-16 00:00:00', NULL, NULL, '1'),
(343, '20230616064950', 'Purchase', '2023-06-14', '402', 'Company Credit For  TESTSUPPLIER', NULL, '0.00', '1', '38', '2023-06-16 06:49:50', NULL, NULL, '1'),
(344, '20230616065749', 'Purchase', '2023-06-14', '10107', 'Inventory Debit For Supplier TESTSUPPLIER', NULL, '0.00', '1', '38', '2023-06-16 06:57:49', NULL, NULL, '1'),
(345, '20230616065749', 'Purchase', '2023-06-14', '502000004', 'Supplier .TESTSUPPLIER', '0.00', NULL, '1', '38', '2023-06-16 00:00:00', NULL, NULL, '1'),
(346, '20230616065749', 'Purchase', '2023-06-14', '402', 'Company Credit For  TESTSUPPLIER', NULL, '0.00', '1', '38', '2023-06-16 06:57:49', NULL, NULL, '1'),
(347, '20230616065753', 'Purchase', '2023-06-14', '10107', 'Inventory Debit For Supplier TESTSUPPLIER', NULL, '0.00', '1', '38', '2023-06-16 06:57:53', NULL, NULL, '1'),
(348, '20230616065753', 'Purchase', '2023-06-14', '502000004', 'Supplier .TESTSUPPLIER', '0.00', NULL, '1', '38', '2023-06-16 00:00:00', NULL, NULL, '1'),
(349, '20230616065753', 'Purchase', '2023-06-14', '402', 'Company Credit For  TESTSUPPLIER', NULL, '0.00', '1', '38', '2023-06-16 06:57:53', NULL, NULL, '1'),
(350, '20230616073944', 'Purchase', '2023-06-14', '10107', 'Inventory Debit For Supplier TESTSUPPLIER', NULL, '0.00', '1', '38', '2023-06-16 07:39:44', NULL, NULL, '1'),
(351, '20230616073944', 'Purchase', '2023-06-14', '502000004', 'Supplier .TESTSUPPLIER', '0.00', NULL, '1', '38', '2023-06-16 00:00:00', NULL, NULL, '1'),
(352, '20230616073944', 'Purchase', '2023-06-14', '402', 'Company Credit For  TESTSUPPLIER', NULL, '0.00', '1', '38', '2023-06-16 07:39:44', NULL, NULL, '1'),
(353, '20230616074006', 'Purchase', '2023-06-14', '10107', 'Inventory Debit For Supplier TESTSUPPLIER', NULL, '0.00', '1', '38', '2023-06-16 07:40:06', NULL, NULL, '1'),
(354, '20230616074006', 'Purchase', '2023-06-14', '502000004', 'Supplier .TESTSUPPLIER', '0.00', NULL, '1', '38', '2023-06-16 00:00:00', NULL, NULL, '1'),
(355, '20230616074006', 'Purchase', '2023-06-14', '402', 'Company Credit For  TESTSUPPLIER', NULL, '0.00', '1', '38', '2023-06-16 07:40:06', NULL, NULL, '1'),
(356, '20230616075639', 'Purchase', '2023-06-16', '10107', 'Inventory Debit For Supplier TESTSUPPLIER', NULL, '0.00', '1', '38', '2023-06-16 07:56:39', NULL, NULL, '1'),
(357, '20230616075639', 'Purchase', '2023-06-16', '502000004', 'Supplier .TESTSUPPLIER', '0.00', NULL, '1', '38', '2023-06-16 00:00:00', NULL, NULL, '1'),
(358, '20230616075639', 'Purchase', '2023-06-16', '402', 'Company Credit For  TESTSUPPLIER', NULL, '0.00', '1', '38', '2023-06-16 07:56:39', NULL, NULL, '1'),
(359, '20230616075639', 'Purchase', '2023-06-16', '', 'Paid amount for Supplier  TESTSUPPLIER', '0.00', '100.00', '1', '38', '2023-06-16 07:56:39', NULL, NULL, '1'),
(360, '20230616075639', 'Purchase', '2023-06-16', '502000004', 'Supplier .TESTSUPPLIER', '100.00', '0.00', '1', '38', '2023-06-16 00:00:00', NULL, NULL, '1'),
(361, '20230616082606', 'Purchase', '2023-06-12', '10107', 'Inventory Debit For Supplier AMORIO', NULL, '0.00', '1', '38', '2023-06-16 08:26:06', NULL, NULL, '1'),
(362, '20230616082606', 'Purchase', '2023-06-12', '502000001', 'Supplier .AMORIO', '0.00', NULL, '1', '38', '2023-06-16 00:00:00', NULL, NULL, '1'),
(363, '20230616082606', 'Purchase', '2023-06-12', '402', 'Company Credit For  AMORIO', NULL, '0.00', '1', '38', '2023-06-16 08:26:06', NULL, NULL, '1'),
(364, '20230616082723', 'Purchase', '2023-06-12', '10107', 'Inventory Debit For Supplier AMORIO', NULL, '0.00', '1', '38', '2023-06-16 08:27:23', NULL, NULL, '1'),
(365, '20230616082723', 'Purchase', '2023-06-12', '502000001', 'Supplier .AMORIO', '0.00', NULL, '1', '38', '2023-06-16 00:00:00', NULL, NULL, '1'),
(366, '20230616082723', 'Purchase', '2023-06-12', '402', 'Company Credit For  AMORIO', NULL, '0.00', '1', '38', '2023-06-16 08:27:23', NULL, NULL, '1'),
(367, '20230616082941', 'Purchase', '2023-06-16', '10107', 'Inventory Debit For Supplier AMORIO', NULL, '0.00', '1', '38', '2023-06-16 08:29:41', NULL, NULL, '1'),
(368, '20230616082941', 'Purchase', '2023-06-16', '502000001', 'Supplier .AMORIO', '0.00', NULL, '1', '38', '2023-06-16 00:00:00', NULL, NULL, '1'),
(369, '20230616082941', 'Purchase', '2023-06-16', '402', 'Company Credit For  AMORIO', NULL, '0.00', '1', '38', '2023-06-16 08:29:41', NULL, NULL, '1'),
(370, '20230616093602', 'Purchase', '2023-06-16', '10107', 'Inventory Debit For Supplier TESTSUPPLIER', NULL, '0.00', '1', '38', '2023-06-16 09:36:02', NULL, NULL, '1'),
(371, '20230616093602', 'Purchase', '2023-06-16', '502000004', 'Supplier .TESTSUPPLIER', '0.00', NULL, '1', '38', '2023-06-16 00:00:00', NULL, NULL, '1'),
(372, '20230616093602', 'Purchase', '2023-06-16', '402', 'Company Credit For  TESTSUPPLIER', NULL, '0.00', '1', '38', '2023-06-16 09:36:02', NULL, NULL, '1'),
(373, '20230616093624', 'Purchase', '2023-06-16', '10107', 'Inventory Debit For Supplier TESTSUPPLIER', NULL, '0.00', '1', '38', '2023-06-16 09:36:24', NULL, NULL, '1'),
(374, '20230616093624', 'Purchase', '2023-06-16', '502000004', 'Supplier .TESTSUPPLIER', '0.00', NULL, '1', '38', '2023-06-16 00:00:00', NULL, NULL, '1'),
(375, '20230616093624', 'Purchase', '2023-06-16', '402', 'Company Credit For  TESTSUPPLIER', NULL, '0.00', '1', '38', '2023-06-16 09:36:24', NULL, NULL, '1'),
(376, '20230616095002', 'Purchase', '2023-06-16', '10107', 'Inventory Debit For Supplier AMORIO', NULL, '0.00', '1', '38', '2023-06-16 09:50:02', NULL, NULL, '1'),
(377, '20230616095002', 'Purchase', '2023-06-16', '502000001', 'Supplier .AMORIO', '0.00', NULL, '1', '38', '2023-06-16 00:00:00', NULL, NULL, '1'),
(378, '20230616095002', 'Purchase', '2023-06-16', '402', 'Company Credit For  AMORIO', NULL, '0.00', '1', '38', '2023-06-16 09:50:02', NULL, NULL, '1'),
(379, '20230616095005', 'Purchase', '2023-06-16', '10107', 'Inventory Debit For Supplier AMORIO', NULL, '0.00', '1', '38', '2023-06-16 09:50:05', NULL, NULL, '1'),
(380, '20230616095005', 'Purchase', '2023-06-16', '502000001', 'Supplier .AMORIO', '0.00', NULL, '1', '38', '2023-06-16 00:00:00', NULL, NULL, '1'),
(381, '20230616095005', 'Purchase', '2023-06-16', '402', 'Company Credit For  AMORIO', NULL, '0.00', '1', '38', '2023-06-16 09:50:05', NULL, NULL, '1'),
(382, '20230616095222', 'Purchase', '2023-06-16', '10107', 'Inventory Debit For Supplier TESTSUPPLIER', NULL, '0.00', '1', '38', '2023-06-16 09:52:22', NULL, NULL, '1'),
(383, '20230616095222', 'Purchase', '2023-06-16', '502000004', 'Supplier .TESTSUPPLIER', '0.00', NULL, '1', '38', '2023-06-16 00:00:00', NULL, NULL, '1'),
(384, '20230616095222', 'Purchase', '2023-06-16', '402', 'Company Credit For  TESTSUPPLIER', NULL, '0.00', '1', '38', '2023-06-16 09:52:22', NULL, NULL, '1'),
(385, '20230616095222', 'Purchase', '2023-06-16', '', 'Paid amount for Supplier  TESTSUPPLIER', '0.00', '2500000.00', '1', '38', '2023-06-16 09:52:22', NULL, NULL, '1'),
(386, '20230616095222', 'Purchase', '2023-06-16', '502000004', 'Supplier .TESTSUPPLIER', '2500000.00', '0.00', '1', '38', '2023-06-16 00:00:00', NULL, NULL, '1'),
(387, '20230616095919', 'Purchase', '2023-06-16', '10107', 'Inventory Debit For Supplier TESTSUPPLIER', NULL, '0.00', '1', '38', '2023-06-16 09:59:19', NULL, NULL, '1'),
(388, '20230616095919', 'Purchase', '2023-06-16', '502000004', 'Supplier .TESTSUPPLIER', '0.00', NULL, '1', '38', '2023-06-16 00:00:00', NULL, NULL, '1'),
(389, '20230616095919', 'Purchase', '2023-06-16', '402', 'Company Credit For  TESTSUPPLIER', NULL, '0.00', '1', '38', '2023-06-16 09:59:19', NULL, NULL, '1'),
(390, '20230616095919', 'Purchase', '2023-06-16', '', 'Paid amount for Supplier  TESTSUPPLIER', '0.00', '100.00', '1', '38', '2023-06-16 09:59:19', NULL, NULL, '1'),
(391, '20230616095919', 'Purchase', '2023-06-16', '502000004', 'Supplier .TESTSUPPLIER', '100.00', '0.00', '1', '38', '2023-06-16 00:00:00', NULL, NULL, '1'),
(392, '20230616105329', 'Purchase', '2023-06-16', '10107', 'Inventory Debit For Supplier AMORIO', NULL, '0.00', '1', '38', '2023-06-16 10:53:29', NULL, NULL, '1'),
(393, '20230616105329', 'Purchase', '2023-06-16', '502000001', 'Supplier .AMORIO', '0.00', NULL, '1', '38', '2023-06-16 00:00:00', NULL, NULL, '1'),
(394, '20230616105329', 'Purchase', '2023-06-16', '402', 'Company Credit For  AMORIO', NULL, '0.00', '1', '38', '2023-06-16 10:53:29', NULL, NULL, '1'),
(395, '20230616105329', 'Purchase', '2023-06-16', '', 'Paid amount for Supplier  AMORIO', '0.00', '160000.00', '1', '38', '2023-06-16 10:53:29', NULL, NULL, '1'),
(396, '20230616105329', 'Purchase', '2023-06-16', '502000001', 'Supplier .AMORIO', '160000.00', '0.00', '1', '38', '2023-06-16 00:00:00', NULL, NULL, '1'),
(397, '20230616111049', 'Purchase', '2023-06-16', '10107', 'Inventory Debit For Supplier AMORIO', NULL, '0.00', '1', '38', '2023-06-16 11:10:49', NULL, NULL, '1'),
(398, '20230616111049', 'Purchase', '2023-06-16', '502000001', 'Supplier .AMORIO', '0.00', NULL, '1', '38', '2023-06-16 00:00:00', NULL, NULL, '1'),
(399, '20230616111049', 'Purchase', '2023-06-16', '402', 'Company Credit For  AMORIO', NULL, '0.00', '1', '38', '2023-06-16 11:10:49', NULL, NULL, '1'),
(400, '20230616111053', 'Purchase', '2023-06-16', '10107', 'Inventory Debit For Supplier AMORIO', NULL, '0.00', '1', '38', '2023-06-16 11:10:53', NULL, NULL, '1'),
(401, '20230616111053', 'Purchase', '2023-06-16', '502000001', 'Supplier .AMORIO', '0.00', NULL, '1', '38', '2023-06-16 00:00:00', NULL, NULL, '1'),
(402, '20230616111053', 'Purchase', '2023-06-16', '402', 'Company Credit For  AMORIO', NULL, '0.00', '1', '38', '2023-06-16 11:10:53', NULL, NULL, '1'),
(403, '20230616111232', 'Purchase', '2023-06-16', '10107', 'Inventory Debit For Supplier AMORIO', NULL, '0.00', '1', '38', '2023-06-16 11:12:32', NULL, NULL, '1'),
(404, '20230616111232', 'Purchase', '2023-06-16', '502000001', 'Supplier .AMORIO', '0.00', NULL, '1', '38', '2023-06-16 00:00:00', NULL, NULL, '1'),
(405, '20230616111232', 'Purchase', '2023-06-16', '402', 'Company Credit For  AMORIO', NULL, '0.00', '1', '38', '2023-06-16 11:12:32', NULL, NULL, '1'),
(406, '20230616111238', 'Purchase', '2023-06-16', '10107', 'Inventory Debit For Supplier AMORIO', NULL, '0.00', '1', '38', '2023-06-16 11:12:38', NULL, NULL, '1'),
(407, '20230616111238', 'Purchase', '2023-06-16', '502000001', 'Supplier .AMORIO', '0.00', NULL, '1', '38', '2023-06-16 00:00:00', NULL, NULL, '1'),
(408, '20230616111238', 'Purchase', '2023-06-16', '402', 'Company Credit For  AMORIO', NULL, '0.00', '1', '38', '2023-06-16 11:12:38', NULL, NULL, '1'),
(409, '10000', 'Bank Transaction', '2023-06-23', '102010202', 'sd', '2000.00', '0.00', '1', '38', '2023-06-23 09:05:40', NULL, NULL, '1');

-- --------------------------------------------------------

--
-- Table structure for table `add_cart`
--

CREATE TABLE `add_cart` (
  `id` int(11) NOT NULL,
  `tableid` varchar(100) NOT NULL,
  `product_id` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `thickness` varchar(255) NOT NULL,
  `supplier_block_no` varchar(255) NOT NULL,
  `supplier_slab_no` varchar(255) NOT NULL,
  `g_width` varchar(100) NOT NULL,
  `g_height` varchar(100) NOT NULL,
  `gross_sq_ft` varchar(255) NOT NULL,
  `bundle_no` varchar(255) NOT NULL,
  `slab_no` varchar(255) NOT NULL,
  `n_width` varchar(100) NOT NULL,
  `n_height` varchar(100) NOT NULL,
  `net_sq_ft` varchar(255) NOT NULL,
  `cost_sq_ft` varchar(255) NOT NULL,
  `cost_sq_slab` varchar(255) NOT NULL,
  `sales_amt_sq_ft` varchar(255) NOT NULL,
  `sales_slab_amt` varchar(255) NOT NULL,
  `weight` varchar(255) NOT NULL,
  `origin` varchar(255) NOT NULL,
  `total_amt` varchar(255) NOT NULL,
  `radio_action` varchar(255) DEFAULT NULL,
  `create_by` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE `administrator` (
  `adm_id` int(111) NOT NULL,
  `adm_name` varchar(111) NOT NULL,
  `adm_address` varchar(111) NOT NULL,
  `create_by` int(111) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`adm_id`, `adm_name`, `adm_address`, `create_by`) VALUES
(1000, 'Ajithkumar', 'TTKROAD ALWARPET', 38),
(1001, 'Vjiay', 'Neelankarai', 38),
(1007, 'dgdfh', 'dfhdfhdfh', 38),
(1006, 'dgdfh', 'dfhdfhdfh', 38),
(1005, 'qetrt', 'TTkfdfdjdfj', 38),
(1008, '5675687', 'tfriurtirti', 38),
(1009, 'last', 'dfdfhfdh', 38),
(1010, 'fgjrtjurturtu', 'rturt', 38);

-- --------------------------------------------------------

--
-- Table structure for table `app_setting`
--

CREATE TABLE `app_setting` (
  `id` int(11) NOT NULL,
  `localhserver` varchar(250) DEFAULT NULL,
  `onlineserver` varchar(250) DEFAULT NULL,
  `hotspot` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `app_setting`
--

INSERT INTO `app_setting` (`id`, `localhserver`, `onlineserver`, `hotspot`) VALUES
(1, 'https://192.168.1.153/saleserp_sas_v-2', 'https://saleserpnew.bdtask.com/saleserp_v9.3-demo', 'https://192.168.1.167/saleserp');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `att_id` int(11) NOT NULL,
  `create_by` varchar(100) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `sign_in` varchar(30) NOT NULL,
  `sign_out` varchar(30) NOT NULL,
  `staytime` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `bank_add`
--

CREATE TABLE `bank_add` (
  `id` int(11) NOT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `bank_id` varchar(255) NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  `ac_name` varchar(250) DEFAULT NULL,
  `ac_number` varchar(250) DEFAULT NULL,
  `branch` varchar(250) DEFAULT NULL,
  `country` varchar(250) DEFAULT NULL,
  `currency` varchar(10) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bank_add`
--

INSERT INTO `bank_add` (`id`, `created_by`, `bank_id`, `bank_name`, `ac_name`, `ac_number`, `branch`, `country`, `currency`, `status`) VALUES
(1, NULL, 'PDFG32E', 'JPMorgan Chase', NULL, NULL, NULL, NULL, NULL, 1),
(2, NULL, 'ERYYWE2', 'New York City', NULL, NULL, NULL, NULL, NULL, 1),
(3, NULL, 'ERET23R', 'Bank of America', NULL, NULL, NULL, NULL, NULL, 1),
(4, NULL, 'CQWR87I', 'Citigroup', NULL, NULL, NULL, NULL, NULL, 1),
(5, NULL, 'DZCC11H', 'Wells Fargo', NULL, NULL, NULL, NULL, NULL, 1),
(6, NULL, 'EXXS77K', 'Goldman Sachs', NULL, NULL, NULL, NULL, NULL, 1),
(7, NULL, 'FFES234', 'Morgan Stanley', NULL, NULL, NULL, NULL, NULL, 1),
(8, NULL, 'GSDF567', 'USBancorp', NULL, NULL, NULL, NULL, NULL, 1),
(9, NULL, 'HFER568', 'PNC Financial Services', NULL, NULL, NULL, NULL, NULL, 1),
(10, NULL, 'ISAF582', 'Truist Financial', NULL, NULL, NULL, NULL, NULL, 1),
(11, NULL, 'JQWE245', 'Charles Schwab Corporation', NULL, NULL, NULL, NULL, NULL, 1),
(12, NULL, 'KGTY463', 'TD Bank N.A.', NULL, NULL, NULL, NULL, NULL, 1),
(13, NULL, 'LKIO346', 'Capital One', NULL, NULL, NULL, NULL, NULL, 1),
(14, NULL, 'MLKA708', 'The Bank of New York Mellon', NULL, NULL, NULL, NULL, NULL, 1),
(15, NULL, 'NSDF908', 'State Street Corporation', NULL, NULL, NULL, NULL, NULL, 1),
(16, NULL, 'OWER232', 'American Express', NULL, NULL, NULL, NULL, NULL, 1),
(17, NULL, 'LTEW212', 'Citizens Financial Group', NULL, NULL, NULL, NULL, NULL, 1),
(18, NULL, 'MWTT444', 'HSBC Bank USA', NULL, NULL, NULL, NULL, NULL, 1),
(19, NULL, 'NWES566', 'SVB Financial Group', NULL, NULL, NULL, NULL, NULL, 1),
(20, NULL, 'OBTD888', 'First Republic Bank ', NULL, NULL, NULL, NULL, NULL, 1),
(21, NULL, 'AAXZ089', 'Fifth Third Bank', NULL, NULL, NULL, NULL, NULL, 1),
(22, NULL, 'BBBA876', 'BMO USA', NULL, NULL, NULL, NULL, NULL, 1),
(23, NULL, 'CCFP111', 'USAA', NULL, NULL, NULL, NULL, NULL, 1),
(24, NULL, 'DQNM325', 'UBS', NULL, NULL, NULL, NULL, NULL, 1),
(25, NULL, 'EEWT786', 'M&T Bank', NULL, NULL, NULL, NULL, NULL, 1),
(26, NULL, 'FIYU886', 'Ally Financial', NULL, NULL, NULL, NULL, NULL, 1),
(27, NULL, 'GXSE457', 'KeyCorp', NULL, NULL, NULL, NULL, NULL, 1),
(28, NULL, 'HYTU346', 'Huntington Bancshares', NULL, NULL, NULL, NULL, NULL, 1),
(29, NULL, 'IMMB363', 'Barclays', NULL, NULL, NULL, NULL, NULL, 1),
(30, NULL, 'JBHU232', 'Santander Bank', NULL, NULL, NULL, NULL, NULL, 1),
(31, NULL, 'KGER222', 'RBC Bank', NULL, NULL, NULL, NULL, NULL, 1),
(32, NULL, 'LHTF679', 'Ameriprise', NULL, NULL, NULL, NULL, NULL, 1),
(33, NULL, 'YDFH643', 'Regions Financial Corporation', NULL, NULL, NULL, NULL, NULL, 1),
(34, NULL, 'XKSB346', 'Northern Trust', NULL, NULL, NULL, NULL, NULL, 1),
(35, NULL, 'CVBN774', 'BNP Paribas', NULL, NULL, NULL, NULL, NULL, 1),
(36, NULL, 'VDHT742', 'Discover Financial', NULL, NULL, NULL, NULL, NULL, 1),
(37, NULL, 'HTGB999', 'First Citizens BancShares', NULL, NULL, NULL, NULL, NULL, 1),
(38, NULL, 'KXPW806', 'Synchrony Financial', NULL, NULL, NULL, NULL, NULL, 1),
(39, NULL, 'LLAQ536', 'Deutsche Bank', NULL, NULL, NULL, NULL, NULL, 1),
(40, NULL, 'PVUY543', 'New York Community Bank', NULL, NULL, NULL, NULL, NULL, 1),
(41, NULL, 'OSBB321', 'Comerica', NULL, NULL, NULL, NULL, NULL, 1),
(42, NULL, 'ISDG129', 'First Horizon National Corporation', NULL, NULL, NULL, NULL, NULL, 1),
(43, NULL, 'UFGH676', 'Raymond James Financial', NULL, NULL, NULL, NULL, NULL, 1),
(44, NULL, 'YORT798', 'Webster Bank', NULL, NULL, NULL, NULL, NULL, 1),
(45, NULL, 'TYYY457', 'Western Alliance Bank', NULL, NULL, NULL, NULL, NULL, 1),
(46, NULL, 'ETRR457', 'Popular, Inc.', NULL, NULL, NULL, NULL, NULL, 1),
(47, NULL, 'WHYU888', 'CIBC Bank USA', NULL, NULL, NULL, NULL, NULL, 1),
(48, NULL, 'RYYU444', 'East West Bank', NULL, NULL, NULL, NULL, NULL, 1),
(49, NULL, 'EPOP23A', 'Synovus', NULL, NULL, NULL, NULL, NULL, 1),
(50, NULL, 'WUIO34E', 'Valley National Bank', NULL, NULL, NULL, NULL, NULL, 1),
(51, NULL, 'QNTY74J', 'Credit Suisse ', NULL, NULL, NULL, NULL, NULL, 1),
(52, NULL, 'AFGJ32Y', 'Mizuho Financial Group', NULL, NULL, NULL, NULL, NULL, 1),
(53, NULL, 'SSDC46J', 'Wintrust Financial', NULL, NULL, NULL, NULL, NULL, 1),
(54, NULL, 'DNJUKT3', 'Cullen/Frost Bankers, Inc.', NULL, NULL, NULL, NULL, NULL, 1),
(55, NULL, 'FRRUT44', 'John Deere Capital Corporation', NULL, NULL, NULL, NULL, NULL, 1),
(56, NULL, 'GEYR364', 'MUFG Union Bank', NULL, NULL, NULL, NULL, NULL, 1),
(57, NULL, 'HERY346', 'BOK Financial Corporation', NULL, NULL, NULL, NULL, NULL, 1),
(58, NULL, 'JDHHY54', 'Old National Bank', NULL, NULL, NULL, NULL, NULL, 1),
(59, NULL, 'KREY202', 'South State Bank', NULL, NULL, NULL, NULL, NULL, 1),
(60, NULL, 'LOLA644', 'FNB Corporation', NULL, NULL, NULL, NULL, NULL, 1),
(61, NULL, 'LKKY462', 'Pinnacle Financial Partners', NULL, NULL, NULL, NULL, NULL, 1),
(62, NULL, 'IERY235', 'PacWest Bancorp', NULL, NULL, NULL, NULL, NULL, 1),
(63, NULL, 'BGTR35F', 'TIAA', NULL, NULL, NULL, NULL, NULL, 1),
(64, NULL, 'VXFT353', 'Associated Banc-Corp', NULL, NULL, NULL, NULL, NULL, 1),
(65, NULL, 'CEMOG4G', 'UMB Financial Corporation', NULL, NULL, NULL, NULL, NULL, 1),
(66, NULL, 'XBGQ346', 'Prosperity Bancshares', NULL, NULL, NULL, NULL, NULL, 1),
(67, NULL, 'ZZDT34G', 'Stifel', NULL, NULL, NULL, NULL, NULL, 1),
(68, NULL, 'NERF53F', 'BankUnited', NULL, NULL, NULL, NULL, NULL, 1),
(69, NULL, 'MMKI553', 'Hancock Whitney', NULL, NULL, NULL, NULL, NULL, 1),
(70, NULL, 'KWTFG44', 'MidFirst Bank', NULL, NULL, NULL, NULL, NULL, 1),
(71, NULL, 'LWET63O', 'Sumitomo Mitsui Banking Corporation', NULL, NULL, NULL, NULL, NULL, 1),
(72, NULL, 'FXSE42W', 'Beal Bank', NULL, NULL, NULL, NULL, NULL, 1),
(73, NULL, 'DRTU244', 'First Interstate BancSystem', NULL, NULL, NULL, NULL, NULL, 1),
(74, NULL, 'DDDR457', 'Commerce Bancshares', NULL, NULL, NULL, NULL, NULL, 1),
(75, NULL, 'RRTT755', 'Umpqua Holdings Corporation', NULL, NULL, NULL, NULL, NULL, 1),
(76, NULL, 'ENHJ235', 'United Bank (West Virginia)', NULL, NULL, NULL, NULL, NULL, 1),
(77, NULL, 'ABNMGE3', 'Texas Capital Bank', NULL, NULL, NULL, NULL, NULL, 1),
(78, NULL, 'SRTT73D', 'First National of Nebraska', NULL, NULL, NULL, NULL, NULL, 1),
(79, NULL, 'DHRY72Z', 'FirstBank Holding Co', NULL, NULL, NULL, NULL, NULL, 1),
(80, NULL, 'FZZB44F', 'Simmons Bank', NULL, NULL, NULL, NULL, NULL, 1),
(81, NULL, 'DEER17A', 'Fulton Financial Corporation', NULL, NULL, NULL, NULL, NULL, 1),
(82, NULL, 'GMGT32H', 'Glacier Bancorp', NULL, NULL, NULL, NULL, NULL, 1),
(83, NULL, 'JRTT45X', 'Arvest Bank', NULL, NULL, NULL, NULL, NULL, 1),
(84, NULL, 'HBFD11J', 'BCI Financial Group', NULL, NULL, NULL, NULL, NULL, 1),
(85, NULL, 'LZCX00A', 'Ameris Bancorp', NULL, NULL, NULL, NULL, NULL, 1),
(86, NULL, 'ALOI20G', 'First Hawaiian Bank', NULL, NULL, NULL, NULL, NULL, 1),
(87, NULL, 'SREY88Y', 'United Community Bank', NULL, NULL, NULL, NULL, NULL, 1),
(88, NULL, 'ZDHB11Y', 'Bank of Hawaii', NULL, NULL, NULL, NULL, NULL, 1),
(89, NULL, 'MHFH01G', 'Home BancShares', NULL, NULL, NULL, NULL, NULL, 1),
(90, NULL, 'IFDG53F', 'Eastern Bank', NULL, NULL, NULL, NULL, NULL, 1),
(91, NULL, 'UEYR92Z', 'Cathay Bank', NULL, NULL, NULL, NULL, NULL, 1),
(92, NULL, 'YERY29S', 'Pacific Premier Bancorp', NULL, NULL, NULL, NULL, NULL, 1),
(93, NULL, 'TGJJ63B', 'Washington Federal', NULL, NULL, NULL, NULL, NULL, 1),
(94, NULL, 'RERY55X', 'Customers Bancorp', NULL, NULL, NULL, NULL, NULL, 1),
(95, NULL, 'ERTR71G', 'Atlantic Union Bank', NULL, NULL, NULL, NULL, NULL, 1),
(96, NULL, 'OADE41H', 'Columbia Bank', NULL, NULL, NULL, NULL, NULL, 1),
(97, NULL, 'LETT97C', 'Heartland Financial USA', NULL, NULL, NULL, NULL, NULL, 1),
(98, NULL, 'PMJU05K', 'WSFS Bank', NULL, NULL, NULL, NULL, NULL, 1),
(99, NULL, 'SADS98L', 'Central Bancompany', NULL, NULL, NULL, NULL, NULL, 1),
(100, NULL, 'AXCV45B', 'Independent Bank', NULL, NULL, NULL, NULL, NULL, 1),
(101, NULL, 'XSFF56H', 'Hope Bancorp', NULL, NULL, NULL, NULL, NULL, 1),
(102, NULL, 'HIOP47G', 'SoFi', NULL, NULL, NULL, NULL, NULL, 1),
(460, '38', 'WP9YWY1', 'Pass', 'FEDF', '74747457', 'mechh', 'United States', 'USD', 1),
(461, '38', 'PI6BC1X', 'NRR$', 'rturtu', '4574575', '47457457', 'United States', 'USD', 1),
(463, '38', 'HQLMI5MAAX', 'State Bank', 'rsds', '43434', 'Chennai', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `bootgrid_data`
--

CREATE TABLE `bootgrid_data` (
  `id` int(11) NOT NULL,
  `user` varchar(50) DEFAULT NULL,
  `menu` varchar(50) DEFAULT NULL,
  `submenu` varchar(50) DEFAULT NULL,
  `setting` varchar(250) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `company_assignrole`
--

CREATE TABLE `company_assignrole` (
  `id` int(11) NOT NULL,
  `user_id` varchar(55) CHARACTER SET utf8 NOT NULL,
  `roleid` int(11) NOT NULL,
  `createby` varchar(55) CHARACTER SET utf8 NOT NULL,
  `createdate` datetime NOT NULL,
  `admin_comp` varchar(55) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company_assignrole`
--

INSERT INTO `company_assignrole` (`id`, `user_id`, `roleid`, `createby`, `createdate`, `admin_comp`) VALUES
(52, '93', 82, '2', '2023-06-16 05:48:59', 'AD93116'),
(53, '38', 84, '2', '2023-06-16 11:52:34', 'AD61952');

-- --------------------------------------------------------

--
-- Table structure for table `company_information`
--

CREATE TABLE `company_information` (
  `company_id` int(11) NOT NULL,
  `company_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `website` varchar(50) NOT NULL,
  `status` int(11) NOT NULL,
  `create_by` varchar(100) NOT NULL DEFAULT '1',
  `logo` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `company_information`
--

INSERT INTO `company_information` (`company_id`, `company_name`, `email`, `address`, `mobile`, `website`, `status`, `create_by`, `logo`) VALUES
(38, 'Stonemart', 'mic@gmail.com', 'aszf@sadf.sdf', '56456456', 'mic.net', 1, '38', '/my-assets/image/logo/Dutchmen.JPG'),
(87, 'Stone Mart Corp', 'stonemartcorp@gmail.com', 'stonemart', '435345345', 'stonemart', 1, '2', '/my-assets/image/logo/Amorio Logo.JPG'),
(88, 'Lancaster UAT', 'lancaster@amoriotech.com', 'lancaster', '645646', 'Lancaster', 1, '2', '/my-assets/image/logo/Lancaster Stones.PNG'),
(89, 'ert', 'admin@example.com', '3453453', '9566084864', 'amoriotech.net', 1, '2', 'my-assets/image/logo/564e9d3223b3a975a8ff979d9ccedc6d.png'),
(90, '444', 'admin@example.com', '3453453', '9566084864', 'amoriotech.net', 1, '2', 'my-assets/image/logo/4c3795d87951a88843969c6759e101b8.png'),
(91, '111', 'admin@example.com', '15A,12th Street ,Sunnambu Kolathur Main Road, West Anna Nagar, Kovilambakkam, KANCHIPURAM-600100 Tamil Nadu (', '9566084864', 'amoriotech.net', 1, '2', 'my-assets/image/logo/9d4b5e4b75c283e3dab3880613867a56.jpg'),
(92, 'Chaitanya', 'chaitanyatech@gmail.com', 'Workafella,Alwarpet', '549453211', 'chaitanyatech.com', 1, '2', 'my-assets/image/logo/f7f07bf5ce39e2b5c716bab6f46a39cd.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `id` int(11) NOT NULL,
  `iso` char(2) NOT NULL,
  `name` varchar(80) NOT NULL,
  `nicename` varchar(80) NOT NULL,
  `iso3` char(3) DEFAULT NULL,
  `numcode` smallint(6) DEFAULT NULL,
  `phonecode` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `iso`, `name`, `nicename`, `iso3`, `numcode`, `phonecode`) VALUES
(1, 'AF', 'AFGHANISTAN', 'Afghanistan', 'AFG', 4, 93),
(2, 'AL', 'ALBANIA', 'Albania', 'ALB', 8, 355),
(3, 'DZ', 'ALGERIA', 'Algeria', 'DZA', 12, 213),
(4, 'AS', 'AMERICAN SAMOA', 'American Samoa', 'ASM', 16, 1684),
(5, 'AD', 'ANDORRA', 'Andorra', 'AND', 20, 376),
(6, 'AO', 'ANGOLA', 'Angola', 'AGO', 24, 244),
(7, 'AI', 'ANGUILLA', 'Anguilla', 'AIA', 660, 1264),
(8, 'AQ', 'ANTARCTICA', 'Antarctica', NULL, NULL, 0),
(9, 'AG', 'ANTIGUA AND BARBUDA', 'Antigua and Barbuda', 'ATG', 28, 1268),
(10, 'AR', 'ARGENTINA', 'Argentina', 'ARG', 32, 54),
(11, 'AM', 'ARMENIA', 'Armenia', 'ARM', 51, 374),
(12, 'AW', 'ARUBA', 'Aruba', 'ABW', 533, 297),
(13, 'AU', 'AUSTRALIA', 'Australia', 'AUS', 36, 61),
(14, 'AT', 'AUSTRIA', 'Austria', 'AUT', 40, 43),
(15, 'AZ', 'AZERBAIJAN', 'Azerbaijan', 'AZE', 31, 994),
(16, 'BS', 'BAHAMAS', 'Bahamas', 'BHS', 44, 1242),
(17, 'BH', 'BAHRAIN', 'Bahrain', 'BHR', 48, 973),
(18, 'BD', 'BANGLADESH', 'Bangladesh', 'BGD', 50, 880),
(19, 'BB', 'BARBADOS', 'Barbados', 'BRB', 52, 1246),
(20, 'BY', 'BELARUS', 'Belarus', 'BLR', 112, 375),
(21, 'BE', 'BELGIUM', 'Belgium', 'BEL', 56, 32),
(22, 'BZ', 'BELIZE', 'Belize', 'BLZ', 84, 501),
(23, 'BJ', 'BENIN', 'Benin', 'BEN', 204, 229),
(24, 'BM', 'BERMUDA', 'Bermuda', 'BMU', 60, 1441),
(25, 'BT', 'BHUTAN', 'Bhutan', 'BTN', 64, 975),
(26, 'BO', 'BOLIVIA', 'Bolivia', 'BOL', 68, 591),
(27, 'BA', 'BOSNIA AND HERZEGOVINA', 'Bosnia and Herzegovina', 'BIH', 70, 387),
(28, 'BW', 'BOTSWANA', 'Botswana', 'BWA', 72, 267),
(29, 'BV', 'BOUVET ISLAND', 'Bouvet Island', NULL, NULL, 0),
(30, 'BR', 'BRAZIL', 'Brazil', 'BRA', 76, 55),
(31, 'IO', 'BRITISH INDIAN OCEAN TERRITORY', 'British Indian Ocean Territory', NULL, NULL, 246),
(32, 'BN', 'BRUNEI DARUSSALAM', 'Brunei Darussalam', 'BRN', 96, 673),
(33, 'BG', 'BULGARIA', 'Bulgaria', 'BGR', 100, 359),
(34, 'BF', 'BURKINA FASO', 'Burkina Faso', 'BFA', 854, 226),
(35, 'BI', 'BURUNDI', 'Burundi', 'BDI', 108, 257),
(36, 'KH', 'CAMBODIA', 'Cambodia', 'KHM', 116, 855),
(37, 'CM', 'CAMEROON', 'Cameroon', 'CMR', 120, 237),
(38, 'CA', 'CANADA', 'Canada', 'CAN', 124, 1),
(39, 'CV', 'CAPE VERDE', 'Cape Verde', 'CPV', 132, 238),
(40, 'KY', 'CAYMAN ISLANDS', 'Cayman Islands', 'CYM', 136, 1345),
(41, 'CF', 'CENTRAL AFRICAN REPUBLIC', 'Central African Republic', 'CAF', 140, 236),
(42, 'TD', 'CHAD', 'Chad', 'TCD', 148, 235),
(43, 'CL', 'CHILE', 'Chile', 'CHL', 152, 56),
(44, 'CN', 'CHINA', 'China', 'CHN', 156, 86),
(45, 'CX', 'CHRISTMAS ISLAND', 'Christmas Island', NULL, NULL, 61),
(46, 'CC', 'COCOS (KEELING) ISLANDS', 'Cocos (Keeling) Islands', NULL, NULL, 672),
(47, 'CO', 'COLOMBIA', 'Colombia', 'COL', 170, 57),
(48, 'KM', 'COMOROS', 'Comoros', 'COM', 174, 269),
(49, 'CG', 'CONGO', 'Congo', 'COG', 178, 242),
(50, 'CD', 'CONGO, THE DEMOCRATIC REPUBLIC OF THE', 'Congo, the Democratic Republic of the', 'COD', 180, 242),
(51, 'CK', 'COOK ISLANDS', 'Cook Islands', 'COK', 184, 682),
(52, 'CR', 'COSTA RICA', 'Costa Rica', 'CRI', 188, 506),
(53, 'CI', 'COTE D\'IVOIRE', 'Cote D\'Ivoire', 'CIV', 384, 225),
(54, 'HR', 'CROATIA', 'Croatia', 'HRV', 191, 385),
(55, 'CU', 'CUBA', 'Cuba', 'CUB', 192, 53),
(56, 'CY', 'CYPRUS', 'Cyprus', 'CYP', 196, 357),
(57, 'CZ', 'CZECH REPUBLIC', 'Czech Republic', 'CZE', 203, 420),
(58, 'DK', 'DENMARK', 'Denmark', 'DNK', 208, 45),
(59, 'DJ', 'DJIBOUTI', 'Djibouti', 'DJI', 262, 253),
(60, 'DM', 'DOMINICA', 'Dominica', 'DMA', 212, 1767),
(61, 'DO', 'DOMINICAN REPUBLIC', 'Dominican Republic', 'DOM', 214, 1809),
(62, 'EC', 'ECUADOR', 'Ecuador', 'ECU', 218, 593),
(63, 'EG', 'EGYPT', 'Egypt', 'EGY', 818, 20),
(64, 'SV', 'EL SALVADOR', 'El Salvador', 'SLV', 222, 503),
(65, 'GQ', 'EQUATORIAL GUINEA', 'Equatorial Guinea', 'GNQ', 226, 240),
(66, 'ER', 'ERITREA', 'Eritrea', 'ERI', 232, 291),
(67, 'EE', 'ESTONIA', 'Estonia', 'EST', 233, 372),
(68, 'ET', 'ETHIOPIA', 'Ethiopia', 'ETH', 231, 251),
(69, 'FK', 'FALKLAND ISLANDS (MALVINAS)', 'Falkland Islands (Malvinas)', 'FLK', 238, 500),
(70, 'FO', 'FAROE ISLANDS', 'Faroe Islands', 'FRO', 234, 298),
(71, 'FJ', 'FIJI', 'Fiji', 'FJI', 242, 679),
(72, 'FI', 'FINLAND', 'Finland', 'FIN', 246, 358),
(73, 'FR', 'FRANCE', 'France', 'FRA', 250, 33),
(74, 'GF', 'FRENCH GUIANA', 'French Guiana', 'GUF', 254, 594),
(75, 'PF', 'FRENCH POLYNESIA', 'French Polynesia', 'PYF', 258, 689),
(76, 'TF', 'FRENCH SOUTHERN TERRITORIES', 'French Southern Territories', NULL, NULL, 0),
(77, 'GA', 'GABON', 'Gabon', 'GAB', 266, 241),
(78, 'GM', 'GAMBIA', 'Gambia', 'GMB', 270, 220),
(79, 'GE', 'GEORGIA', 'Georgia', 'GEO', 268, 995),
(80, 'DE', 'GERMANY', 'Germany', 'DEU', 276, 49),
(81, 'GH', 'GHANA', 'Ghana', 'GHA', 288, 233),
(82, 'GI', 'GIBRALTAR', 'Gibraltar', 'GIB', 292, 350),
(83, 'GR', 'GREECE', 'Greece', 'GRC', 300, 30),
(84, 'GL', 'GREENLAND', 'Greenland', 'GRL', 304, 299),
(85, 'GD', 'GRENADA', 'Grenada', 'GRD', 308, 1473),
(86, 'GP', 'GUADELOUPE', 'Guadeloupe', 'GLP', 312, 590),
(87, 'GU', 'GUAM', 'Guam', 'GUM', 316, 1671),
(88, 'GT', 'GUATEMALA', 'Guatemala', 'GTM', 320, 502),
(89, 'GN', 'GUINEA', 'Guinea', 'GIN', 324, 224),
(90, 'GW', 'GUINEA-BISSAU', 'Guinea-Bissau', 'GNB', 624, 245),
(91, 'GY', 'GUYANA', 'Guyana', 'GUY', 328, 592),
(92, 'HT', 'HAITI', 'Haiti', 'HTI', 332, 509),
(93, 'HM', 'HEARD ISLAND AND MCDONALD ISLANDS', 'Heard Island and Mcdonald Islands', NULL, NULL, 0),
(94, 'VA', 'HOLY SEE (VATICAN CITY STATE)', 'Holy See (Vatican City State)', 'VAT', 336, 39),
(95, 'HN', 'HONDURAS', 'Honduras', 'HND', 340, 504),
(96, 'HK', 'HONG KONG', 'Hong Kong', 'HKG', 344, 852),
(97, 'HU', 'HUNGARY', 'Hungary', 'HUN', 348, 36),
(98, 'IS', 'ICELAND', 'Iceland', 'ISL', 352, 354),
(99, 'IN', 'INDIA', 'India', 'IND', 356, 91),
(100, 'ID', 'INDONESIA', 'Indonesia', 'IDN', 360, 62),
(101, 'IR', 'IRAN, ISLAMIC REPUBLIC OF', 'Iran, Islamic Republic of', 'IRN', 364, 98),
(102, 'IQ', 'IRAQ', 'Iraq', 'IRQ', 368, 964),
(103, 'IE', 'IRELAND', 'Ireland', 'IRL', 372, 353),
(104, 'IL', 'ISRAEL', 'Israel', 'ISR', 376, 972),
(105, 'IT', 'ITALY', 'Italy', 'ITA', 380, 39),
(106, 'JM', 'JAMAICA', 'Jamaica', 'JAM', 388, 1876),
(107, 'JP', 'JAPAN', 'Japan', 'JPN', 392, 81),
(108, 'JO', 'JORDAN', 'Jordan', 'JOR', 400, 962),
(109, 'KZ', 'KAZAKHSTAN', 'Kazakhstan', 'KAZ', 398, 7),
(110, 'KE', 'KENYA', 'Kenya', 'KEN', 404, 254),
(111, 'KI', 'KIRIBATI', 'Kiribati', 'KIR', 296, 686),
(112, 'KP', 'KOREA, DEMOCRATIC PEOPLE\'S REPUBLIC OF', 'Korea, Democratic People\'s Republic of', 'PRK', 408, 850),
(113, 'KR', 'KOREA, REPUBLIC OF', 'Korea, Republic of', 'KOR', 410, 82),
(114, 'KW', 'KUWAIT', 'Kuwait', 'KWT', 414, 965),
(115, 'KG', 'KYRGYZSTAN', 'Kyrgyzstan', 'KGZ', 417, 996),
(116, 'LA', 'LAO PEOPLE\'S DEMOCRATIC REPUBLIC', 'Lao People\'s Democratic Republic', 'LAO', 418, 856),
(117, 'LV', 'LATVIA', 'Latvia', 'LVA', 428, 371),
(118, 'LB', 'LEBANON', 'Lebanon', 'LBN', 422, 961),
(119, 'LS', 'LESOTHO', 'Lesotho', 'LSO', 426, 266),
(120, 'LR', 'LIBERIA', 'Liberia', 'LBR', 430, 231),
(121, 'LY', 'LIBYAN ARAB JAMAHIRIYA', 'Libyan Arab Jamahiriya', 'LBY', 434, 218),
(122, 'LI', 'LIECHTENSTEIN', 'Liechtenstein', 'LIE', 438, 423),
(123, 'LT', 'LITHUANIA', 'Lithuania', 'LTU', 440, 370),
(124, 'LU', 'LUXEMBOURG', 'Luxembourg', 'LUX', 442, 352),
(125, 'MO', 'MACAO', 'Macao', 'MAC', 446, 853),
(126, 'MK', 'MACEDONIA, THE FORMER YUGOSLAV REPUBLIC OF', 'Macedonia, the Former Yugoslav Republic of', 'MKD', 807, 389),
(127, 'MG', 'MADAGASCAR', 'Madagascar', 'MDG', 450, 261),
(128, 'MW', 'MALAWI', 'Malawi', 'MWI', 454, 265),
(129, 'MY', 'MALAYSIA', 'Malaysia', 'MYS', 458, 60),
(130, 'MV', 'MALDIVES', 'Maldives', 'MDV', 462, 960),
(131, 'ML', 'MALI', 'Mali', 'MLI', 466, 223),
(132, 'MT', 'MALTA', 'Malta', 'MLT', 470, 356),
(133, 'MH', 'MARSHALL ISLANDS', 'Marshall Islands', 'MHL', 584, 692),
(134, 'MQ', 'MARTINIQUE', 'Martinique', 'MTQ', 474, 596),
(135, 'MR', 'MAURITANIA', 'Mauritania', 'MRT', 478, 222),
(136, 'MU', 'MAURITIUS', 'Mauritius', 'MUS', 480, 230),
(137, 'YT', 'MAYOTTE', 'Mayotte', NULL, NULL, 269),
(138, 'MX', 'MEXICO', 'Mexico', 'MEX', 484, 52),
(139, 'FM', 'MICRONESIA, FEDERATED STATES OF', 'Micronesia, Federated States of', 'FSM', 583, 691),
(140, 'MD', 'MOLDOVA, REPUBLIC OF', 'Moldova, Republic of', 'MDA', 498, 373),
(141, 'MC', 'MONACO', 'Monaco', 'MCO', 492, 377),
(142, 'MN', 'MONGOLIA', 'Mongolia', 'MNG', 496, 976),
(143, 'MS', 'MONTSERRAT', 'Montserrat', 'MSR', 500, 1664),
(144, 'MA', 'MOROCCO', 'Morocco', 'MAR', 504, 212),
(145, 'MZ', 'MOZAMBIQUE', 'Mozambique', 'MOZ', 508, 258),
(146, 'MM', 'MYANMAR', 'Myanmar', 'MMR', 104, 95),
(147, 'NA', 'NAMIBIA', 'Namibia', 'NAM', 516, 264),
(148, 'NR', 'NAURU', 'Nauru', 'NRU', 520, 674),
(149, 'NP', 'NEPAL', 'Nepal', 'NPL', 524, 977),
(150, 'NL', 'NETHERLANDS', 'Netherlands', 'NLD', 528, 31),
(151, 'AN', 'NETHERLANDS ANTILLES', 'Netherlands Antilles', 'ANT', 530, 599),
(152, 'NC', 'NEW CALEDONIA', 'New Caledonia', 'NCL', 540, 687),
(153, 'NZ', 'NEW ZEALAND', 'New Zealand', 'NZL', 554, 64),
(154, 'NI', 'NICARAGUA', 'Nicaragua', 'NIC', 558, 505),
(155, 'NE', 'NIGER', 'Niger', 'NER', 562, 227),
(156, 'NG', 'NIGERIA', 'Nigeria', 'NGA', 566, 234),
(157, 'NU', 'NIUE', 'Niue', 'NIU', 570, 683),
(158, 'NF', 'NORFOLK ISLAND', 'Norfolk Island', 'NFK', 574, 672),
(159, 'MP', 'NORTHERN MARIANA ISLANDS', 'Northern Mariana Islands', 'MNP', 580, 1670),
(160, 'NO', 'NORWAY', 'Norway', 'NOR', 578, 47),
(161, 'OM', 'OMAN', 'Oman', 'OMN', 512, 968),
(162, 'PK', 'PAKISTAN', 'Pakistan', 'PAK', 586, 92),
(163, 'PW', 'PALAU', 'Palau', 'PLW', 585, 680),
(164, 'PS', 'PALESTINIAN TERRITORY, OCCUPIED', 'Palestinian Territory, Occupied', NULL, NULL, 970),
(165, 'PA', 'PANAMA', 'Panama', 'PAN', 591, 507),
(166, 'PG', 'PAPUA NEW GUINEA', 'Papua New Guinea', 'PNG', 598, 675),
(167, 'PY', 'PARAGUAY', 'Paraguay', 'PRY', 600, 595),
(168, 'PE', 'PERU', 'Peru', 'PER', 604, 51),
(169, 'PH', 'PHILIPPINES', 'Philippines', 'PHL', 608, 63),
(170, 'PN', 'PITCAIRN', 'Pitcairn', 'PCN', 612, 0),
(171, 'PL', 'POLAND', 'Poland', 'POL', 616, 48),
(172, 'PT', 'PORTUGAL', 'Portugal', 'PRT', 620, 351),
(173, 'PR', 'PUERTO RICO', 'Puerto Rico', 'PRI', 630, 1787),
(174, 'QA', 'QATAR', 'Qatar', 'QAT', 634, 974),
(175, 'RE', 'REUNION', 'Reunion', 'REU', 638, 262),
(176, 'RO', 'ROMANIA', 'Romania', 'ROM', 642, 40),
(177, 'RU', 'RUSSIAN FEDERATION', 'Russian Federation', 'RUS', 643, 70),
(178, 'RW', 'RWANDA', 'Rwanda', 'RWA', 646, 250),
(179, 'SH', 'SAINT HELENA', 'Saint Helena', 'SHN', 654, 290),
(180, 'KN', 'SAINT KITTS AND NEVIS', 'Saint Kitts and Nevis', 'KNA', 659, 1869),
(181, 'LC', 'SAINT LUCIA', 'Saint Lucia', 'LCA', 662, 1758),
(182, 'PM', 'SAINT PIERRE AND MIQUELON', 'Saint Pierre and Miquelon', 'SPM', 666, 508),
(183, 'VC', 'SAINT VINCENT AND THE GRENADINES', 'Saint Vincent and the Grenadines', 'VCT', 670, 1784),
(184, 'WS', 'SAMOA', 'Samoa', 'WSM', 882, 684),
(185, 'SM', 'SAN MARINO', 'San Marino', 'SMR', 674, 378),
(186, 'ST', 'SAO TOME AND PRINCIPE', 'Sao Tome and Principe', 'STP', 678, 239),
(187, 'SA', 'SAUDI ARABIA', 'Saudi Arabia', 'SAU', 682, 966),
(188, 'SN', 'SENEGAL', 'Senegal', 'SEN', 686, 221),
(189, 'CS', 'SERBIA AND MONTENEGRO', 'Serbia and Montenegro', NULL, NULL, 381),
(190, 'SC', 'SEYCHELLES', 'Seychelles', 'SYC', 690, 248),
(191, 'SL', 'SIERRA LEONE', 'Sierra Leone', 'SLE', 694, 232),
(192, 'SG', 'SINGAPORE', 'Singapore', 'SGP', 702, 65),
(193, 'SK', 'SLOVAKIA', 'Slovakia', 'SVK', 703, 421),
(194, 'SI', 'SLOVENIA', 'Slovenia', 'SVN', 705, 386),
(195, 'SB', 'SOLOMON ISLANDS', 'Solomon Islands', 'SLB', 90, 677),
(196, 'SO', 'SOMALIA', 'Somalia', 'SOM', 706, 252),
(197, 'ZA', 'SOUTH AFRICA', 'South Africa', 'ZAF', 710, 27),
(198, 'GS', 'SOUTH GEORGIA AND THE SOUTH SANDWICH ISLANDS', 'South Georgia and the South Sandwich Islands', NULL, NULL, 0),
(199, 'ES', 'SPAIN', 'Spain', 'ESP', 724, 34),
(200, 'LK', 'SRI LANKA', 'Sri Lanka', 'LKA', 144, 94),
(201, 'SD', 'SUDAN', 'Sudan', 'SDN', 736, 249),
(202, 'SR', 'SURINAME', 'Suriname', 'SUR', 740, 597),
(203, 'SJ', 'SVALBARD AND JAN MAYEN', 'Svalbard and Jan Mayen', 'SJM', 744, 47),
(204, 'SZ', 'SWAZILAND', 'Swaziland', 'SWZ', 748, 268),
(205, 'SE', 'SWEDEN', 'Sweden', 'SWE', 752, 46),
(206, 'CH', 'SWITZERLAND', 'Switzerland', 'CHE', 756, 41),
(207, 'SY', 'SYRIAN ARAB REPUBLIC', 'Syrian Arab Republic', 'SYR', 760, 963),
(208, 'TW', 'TAIWAN, PROVINCE OF CHINA', 'Taiwan, Province of China', 'TWN', 158, 886),
(209, 'TJ', 'TAJIKISTAN', 'Tajikistan', 'TJK', 762, 992),
(210, 'TZ', 'TANZANIA, UNITED REPUBLIC OF', 'Tanzania, United Republic of', 'TZA', 834, 255),
(211, 'TH', 'THAILAND', 'Thailand', 'THA', 764, 66),
(212, 'TL', 'TIMOR-LESTE', 'Timor-Leste', NULL, NULL, 670),
(213, 'TG', 'TOGO', 'Togo', 'TGO', 768, 228),
(214, 'TK', 'TOKELAU', 'Tokelau', 'TKL', 772, 690),
(215, 'TO', 'TONGA', 'Tonga', 'TON', 776, 676),
(216, 'TT', 'TRINIDAD AND TOBAGO', 'Trinidad and Tobago', 'TTO', 780, 1868),
(217, 'TN', 'TUNISIA', 'Tunisia', 'TUN', 788, 216),
(218, 'TR', 'TURKEY', 'Turkey', 'TUR', 792, 90),
(219, 'TM', 'TURKMENISTAN', 'Turkmenistan', 'TKM', 795, 7370),
(220, 'TC', 'TURKS AND CAICOS ISLANDS', 'Turks and Caicos Islands', 'TCA', 796, 1649),
(221, 'TV', 'TUVALU', 'Tuvalu', 'TUV', 798, 688),
(222, 'UG', 'UGANDA', 'Uganda', 'UGA', 800, 256),
(223, 'UA', 'UKRAINE', 'Ukraine', 'UKR', 804, 380),
(224, 'AE', 'UNITED ARAB EMIRATES', 'United Arab Emirates', 'ARE', 784, 971),
(225, 'GB', 'UNITED KINGDOM', 'United Kingdom', 'GBR', 826, 44),
(226, 'US', 'UNITED STATES', 'United States', 'USA', 840, 1),
(227, 'UM', 'UNITED STATES MINOR OUTLYING ISLANDS', 'United States Minor Outlying Islands', NULL, NULL, 1),
(228, 'UY', 'URUGUAY', 'Uruguay', 'URY', 858, 598),
(229, 'UZ', 'UZBEKISTAN', 'Uzbekistan', 'UZB', 860, 998),
(230, 'VU', 'VANUATU', 'Vanuatu', 'VUT', 548, 678),
(231, 'VE', 'VENEZUELA', 'Venezuela', 'VEN', 862, 58),
(232, 'VN', 'VIET NAM', 'Viet Nam', 'VNM', 704, 84),
(233, 'VG', 'VIRGIN ISLANDS, BRITISH', 'Virgin Islands, British', 'VGB', 92, 1284),
(234, 'VI', 'VIRGIN ISLANDS, U.S.', 'Virgin Islands, U.s.', 'VIR', 850, 1340),
(235, 'WF', 'WALLIS AND FUTUNA', 'Wallis and Futuna', 'WLF', 876, 681),
(236, 'EH', 'WESTERN SAHARA', 'Western Sahara', 'ESH', 732, 212),
(237, 'YE', 'YEMEN', 'Yemen', 'YEM', 887, 967),
(238, 'ZM', 'ZAMBIA', 'Zambia', 'ZMB', 894, 260),
(239, 'ZW', 'ZIMBABWE', 'Zimbabwe', 'ZWE', 716, 263);

-- --------------------------------------------------------

--
-- Table structure for table `currency`
--

CREATE TABLE `currency` (
  `id` int(11) NOT NULL,
  `country` varchar(191) NOT NULL,
  `in_usd` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `currency`
--

INSERT INTO `currency` (`id`, `country`, `in_usd`) VALUES
(0, 'country', 0),
(2, 'Euro', 1),
(3, 'British Pound', 1),
(4, 'Indian Rupee', 79),
(5, 'Australian Dollar', 1),
(6, 'Canadian Dollar', 1),
(7, 'Singapore Dollar', 1),
(8, 'Swiss Franc', 1),
(9, 'Malaysian Ringgit', 5),
(10, 'Japanese Yen', 142),
(11, 'Chinese Yuan Renminbi', 7),
(12, 'Alphabetical orderSep 13, 2022 09:46 UTC', 0),
(13, 'US Dollar?', 1),
(14, 'Argentine Peso', 142),
(15, 'Australian Dollar', 1),
(16, 'Bahraini Dinar', 0),
(17, 'Botswana Pula', 13),
(18, 'Brazilian Real', 5),
(19, 'British Pound', 1),
(20, 'Bruneian Dollar', 1),
(21, 'Bulgarian Lev', 2),
(22, 'Canadian Dollar', 1),
(23, 'Chilean Peso', 898),
(24, 'Chinese Yuan Renminbi', 7),
(25, 'Colombian Peso', 4363),
(26, 'Croatian Kuna', 7),
(27, 'Czech Koruna', 24),
(28, 'Danish Krone', 7),
(29, 'Emirati Dirham', 4),
(30, 'Euro', 1),
(31, 'Hong Kong Dollar', 8),
(32, 'Hungarian Forint', 391),
(33, 'Icelandic Krona', 138),
(34, 'Indian Rupee', 79),
(35, 'Indonesian Rupiah', 14852),
(36, 'Iranian Rial', 42266),
(37, 'Israeli Shekel', 3),
(38, 'Japanese Yen', 142),
(39, 'Kazakhstani Tenge', 474),
(40, 'Kuwaiti Dinar', 0),
(41, 'Libyan Dinar', 5),
(42, 'Malaysian Ringgit', 5),
(43, 'Mauritian Rupee', 45),
(44, 'Mexican Peso', 20),
(45, 'Nepalese Rupee', 127),
(46, 'New Zealand Dollar', 2),
(47, 'Norwegian Krone', 10),
(48, 'Omani Rial', 0),
(49, 'Pakistani Rupee', 232),
(50, 'Philippine Peso', 57),
(51, 'Polish Zloty', 5),
(52, 'Qatari Riyal', 4),
(53, 'Romanian New Leu', 5),
(54, 'Russian Ruble', 60),
(55, 'Saudi Arabian Riyal', 4),
(56, 'Singapore Dollar', 1),
(57, 'South African Rand', 17),
(58, 'South Korean Won', 1375),
(59, 'Sri Lankan Rupee', 360),
(60, 'Swedish Krona', 10),
(61, 'Swiss Franc', 1),
(62, 'Taiwan New Dollar', 31),
(63, 'Thai Baht', 36),
(64, 'Trinidadian Dollar', 7),
(65, 'Turkish Lira', 18),
(66, 'Venezuelan Bolivar', 796971);

-- --------------------------------------------------------

--
-- Table structure for table `currency_details`
--

CREATE TABLE `currency_details` (
  `id` int(11) NOT NULL,
  `currency_type` varchar(100) NOT NULL,
  `buy` varchar(100) NOT NULL,
  `sell` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `currency_tbl`
--

CREATE TABLE `currency_tbl` (
  `id` int(11) NOT NULL,
  `currency_name` varchar(50) NOT NULL,
  `icon` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `currency_tbl`
--

INSERT INTO `currency_tbl` (`id`, `currency_name`, `icon`) VALUES
(1, 'USD', '$'),
(2, 'INR', '₹'),
(3, 'EUR', '€'),
(4, 'AK', '#'),
(5, 'Sujai', '*'),
(6, 'Sujai', '*'),
(7, 'USD', '$');

-- --------------------------------------------------------

--
-- Table structure for table `customer_information`
--

CREATE TABLE `customer_information` (
  `customer_id` bigint(20) NOT NULL,
  `customer_name` varchar(255) DEFAULT NULL,
  `customer_type` varchar(250) DEFAULT NULL,
  `customer_address` varchar(255) NOT NULL,
  `address2` text NOT NULL,
  `customer_mobile` varchar(100) NOT NULL,
  `customer_email` varchar(100) DEFAULT NULL,
  `email_address` varchar(200) DEFAULT NULL,
  `currency_type` varchar(10) DEFAULT NULL,
  `contact` varchar(100) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `fax` varchar(100) DEFAULT NULL,
  `city` text DEFAULT NULL,
  `state` text DEFAULT NULL,
  `zip` varchar(50) DEFAULT NULL,
  `country` varchar(250) DEFAULT NULL,
  `status` int(11) NOT NULL COMMENT '1=paid,2=credit',
  `create_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `create_by` varchar(30) DEFAULT NULL,
  `payment_terms` varchar(250) NOT NULL,
  `tax_status` varchar(10) NOT NULL,
  `sales_tax` varchar(250) NOT NULL,
  `tax_percent` varchar(250) NOT NULL,
  `credit_limit` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer_information`
--

INSERT INTO `customer_information` (`customer_id`, `customer_name`, `customer_type`, `customer_address`, `address2`, `customer_mobile`, `customer_email`, `email_address`, `currency_type`, `contact`, `phone`, `fax`, `city`, `state`, `zip`, `country`, `status`, `create_date`, `create_by`, `payment_terms`, `tax_status`, `sales_tax`, `tax_percent`, `credit_limit`) VALUES
(8, 'AJITHKUMAR', 'Dealer', 'No0989', 'No077', '8707098709', 'ajithkumar0902001@gmail.com', 'ajithkumar0902001@gmail.com', 'USD', '780987078', '87870070980', '55', 'FGJF', 'STATE', '980989', 'United States', 1, '2023-06-07 07:01:52', '38', '15DAYS', '2', 'California', '55%', '55'),
(9, 'TESTCUST', 'Kitchen', 'no56gyyiutf', 'no56756', '789789789', 'ajith@amoriotech.com', 'ajith@amoriotech.com', 'EGP', '78978789', '87979789', '77', 'cirtuu', 'stataa', '687087', 'United States', 2, '2023-06-07 09:47:16', '38', '7DAYS', '1', '', '%', '78'),
(10, 'Newcome', 'Kitchen', '45646', '456', '456456', 'admin@example.com', 'admin@example.com', 'USD', '5645', '456', '6564564', '4564', '5645', '6456', 'United States', 1, '2023-06-13 11:37:31', '92', 'COD', '1', '', '%', '456');

-- --------------------------------------------------------

--
-- Table structure for table `customer_type`
--

CREATE TABLE `customer_type` (
  `c_type` varchar(100) DEFAULT NULL,
  `create_by` int(11) DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_type`
--

INSERT INTO `customer_type` (`c_type`, `create_by`, `id`) VALUES
('CTYPE', 38, 5);

-- --------------------------------------------------------

--
-- Table structure for table `dailybreak`
--

CREATE TABLE `dailybreak` (
  `id` int(11) NOT NULL,
  `dailybreak_name` int(11) NOT NULL,
  `create_by` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dailybreak`
--

INSERT INTO `dailybreak` (`id`, `dailybreak_name`, `create_by`) VALUES
(10, 25, 38),
(9, 15, 38),
(8, 10, 38),
(7, 5, 38);

-- --------------------------------------------------------

--
-- Table structure for table `daily_banking_add`
--

CREATE TABLE `daily_banking_add` (
  `banking_id` varchar(255) NOT NULL,
  `date` datetime DEFAULT NULL,
  `bank_id` varchar(100) DEFAULT NULL,
  `deposit_type` varchar(255) DEFAULT NULL,
  `transaction_type` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `daily_closing`
--

CREATE TABLE `daily_closing` (
  `id` int(11) NOT NULL,
  `closing_id` varchar(255) NOT NULL,
  `last_day_closing` float NOT NULL,
  `cash_in` float NOT NULL,
  `cash_out` float NOT NULL,
  `date` varchar(250) NOT NULL,
  `amount` float NOT NULL,
  `adjustment` float DEFAULT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `daily_closing`
--

INSERT INTO `daily_closing` (`id`, `closing_id`, `last_day_closing`, `cash_in`, `cash_out`, `date`, `amount`, `adjustment`, `status`) VALUES
(7, 'g11W9c7x5FNaMAX', 0, 0, 56555, '2023-04-28', -56555, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `designation`
--

CREATE TABLE `designation` (
  `id` int(11) NOT NULL,
  `designation` varchar(150) NOT NULL,
  `details` text NOT NULL,
  `create_by` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `designation`
--

INSERT INTO `designation` (`id`, `designation`, `details`, `create_by`) VALUES
(1, 'Software Engineer', 'Software Engineer Infinity', '1'),
(2, 'Developer', '', '38');

-- --------------------------------------------------------

--
-- Table structure for table `duration`
--

CREATE TABLE `duration` (
  `id` int(11) NOT NULL,
  `duration_name` varchar(111) NOT NULL,
  `create_by` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `duration`
--

INSERT INTO `duration` (`id`, `duration_name`, `create_by`) VALUES
(1, 'terert', 38);

-- --------------------------------------------------------

--
-- Table structure for table `email_config`
--

CREATE TABLE `email_config` (
  `id` int(11) NOT NULL,
  `protocol` text NOT NULL,
  `smtp_host` text NOT NULL,
  `smtp_port` text NOT NULL,
  `smtp_user` varchar(35) NOT NULL,
  `smtp_pass` varchar(35) NOT NULL,
  `mailtype` varchar(30) DEFAULT NULL,
  `isinvoice` tinyint(4) NOT NULL,
  `isservice` tinyint(4) NOT NULL,
  `isquotation` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `email_config`
--

INSERT INTO `email_config` (`id`, `protocol`, `smtp_host`, `smtp_port`, `smtp_user`, `smtp_pass`, `mailtype`, `isinvoice`, `isservice`, `isquotation`) VALUES
(1, 'smtp', 'ssl://smtp.googlemail.com', '465', 'suryavenkatesh3093@gmail.com', 'hdafyzlzbjqppnlq', 'text', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `email_data`
--

CREATE TABLE `email_data` (
  `id` int(11) NOT NULL,
  `to_email` varchar(255) NOT NULL,
  `cc_email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp(),
  `is_deleted` int(11) NOT NULL COMMENT '0 => Deleted, 1 => Not Deleted',
  `created_by` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `employee_history`
--

CREATE TABLE `employee_history` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `designation` varchar(100) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `rate_type` int(11) NOT NULL,
  `hrate` float NOT NULL,
  `email` varchar(50) NOT NULL,
  `blood_group` varchar(10) NOT NULL,
  `social_security_number` varchar(255) NOT NULL,
  `routing_number` varchar(255) NOT NULL,
  `address_line_1` text NOT NULL,
  `address_line_2` text NOT NULL,
  `image` text DEFAULT NULL,
  `w4form` varchar(255) NOT NULL,
  `country` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `zip` varchar(50) NOT NULL,
  `create_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employee_history`
--

INSERT INTO `employee_history` (`id`, `first_name`, `last_name`, `designation`, `phone`, `rate_type`, `hrate`, `email`, `blood_group`, `social_security_number`, `routing_number`, `address_line_1`, `address_line_2`, `image`, `w4form`, `country`, `city`, `zip`, `create_by`) VALUES
(1, 'satyam', 'mishra', '1', '8543986351', 1, 20, 'satyammishra.gkp@gmail.com', 'AB+', 'SSN1234', 'RN123', 'Prem chand park road behind sarwang hospital Betiahata', '', 'http://localhost/R17/my-assets/image/employee/1005c86acfd8828218c62bc2311eaa0a.JPG', 'https://interactivewebtech.net/erpwork/my-assets/image/employee/', 'India', 'Gorakhpur433', '273001', 38),
(2, 'Tam', '7567567', '2', '456456456', 0, 200, 'admin@example.com', 'B +ive', '4564564', '6456456', '456456', '456456456', 'http://localhost/R17/assets/images/profile/da42a00b162c7561c702d0fe0f6baa99.PNG', '', 'United States of America', 'chennai', '456456456', 0);

-- --------------------------------------------------------

--
-- Table structure for table `employee_salary_payment`
--

CREATE TABLE `employee_salary_payment` (
  `emp_sal_pay_id` int(11) NOT NULL,
  `generate_id` int(11) NOT NULL,
  `employee_id` varchar(50) CHARACTER SET latin1 NOT NULL,
  `total_salary` decimal(18,2) NOT NULL DEFAULT 0.00,
  `total_working_minutes` varchar(50) CHARACTER SET latin1 NOT NULL,
  `working_period` varchar(50) CHARACTER SET latin1 NOT NULL,
  `payment_due` varchar(50) CHARACTER SET latin1 NOT NULL,
  `payment_date` varchar(50) CHARACTER SET latin1 NOT NULL,
  `paid_by` varchar(50) CHARACTER SET latin1 NOT NULL,
  `salary_month` varchar(70) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `employee_salary_setup`
--

CREATE TABLE `employee_salary_setup` (
  `e_s_s_id` int(10) UNSIGNED NOT NULL,
  `employee_id` varchar(30) CHARACTER SET latin1 NOT NULL,
  `sal_type` varchar(30) NOT NULL,
  `salary_type_id` varchar(30) CHARACTER SET latin1 NOT NULL,
  `amount` decimal(12,2) NOT NULL DEFAULT 0.00,
  `create_date` date DEFAULT NULL,
  `update_date` datetime(6) DEFAULT NULL,
  `update_id` varchar(30) CHARACTER SET latin1 NOT NULL,
  `gross_salary` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `expense`
--

CREATE TABLE `expense` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `type` varchar(100) NOT NULL,
  `voucher_no` varchar(50) NOT NULL,
  `amount` float NOT NULL,
  `create_by` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `expense_invoice_template`
--

CREATE TABLE `expense_invoice_template` (
  `id` int(11) NOT NULL,
  `user_id` varchar(191) NOT NULL,
  `invoice_template` varchar(191) NOT NULL,
  `remarks` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `expense_item`
--

CREATE TABLE `expense_item` (
  `id` int(11) NOT NULL,
  `expense_item_name` varchar(200) NOT NULL,
  `create_by` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `expense_packing_list`
--

CREATE TABLE `expense_packing_list` (
  `id` int(11) NOT NULL,
  `expense_packing_id` varchar(255) DEFAULT NULL,
  `invoice_no` varchar(255) DEFAULT NULL,
  `invoice_date` varchar(255) DEFAULT NULL,
  `gross_weight` varchar(255) DEFAULT NULL,
  `container_no` varchar(255) DEFAULT NULL,
  `thickness` varchar(255) DEFAULT NULL,
  `grand_total_amount` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `create_by` varchar(255) DEFAULT NULL,
  `remarks` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `expense_packing_list_detail`
--

CREATE TABLE `expense_packing_list_detail` (
  `id` int(11) NOT NULL,
  `expense_packing_detail_id` varchar(255) DEFAULT NULL,
  `expense_packing_id` varchar(255) DEFAULT NULL,
  `serial_no` varchar(255) DEFAULT NULL,
  `product_id` varchar(255) DEFAULT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `bundle_ref` varchar(255) DEFAULT NULL,
  `no_of_bundle` varchar(255) DEFAULT NULL,
  `quantity_per_bundle` varchar(255) DEFAULT NULL,
  `quantity_per_package` varchar(250) NOT NULL,
  `rate` varchar(255) DEFAULT NULL,
  `total_price` varchar(255) DEFAULT NULL,
  `create_by` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `expense_trucking`
--

CREATE TABLE `expense_trucking` (
  `id` int(11) NOT NULL,
  `trucking_id` varchar(255) DEFAULT NULL,
  `invoice_no` varchar(255) DEFAULT NULL,
  `invoice_date` varchar(255) DEFAULT NULL,
  `bill_to` varchar(255) DEFAULT NULL,
  `shipment_company` varchar(255) DEFAULT NULL,
  `container_pickup_date` varchar(255) DEFAULT NULL,
  `delivery_date` varchar(255) DEFAULT NULL,
  `total_amt` varchar(250) NOT NULL,
  `tax` varchar(250) NOT NULL,
  `payment_id` int(11) DEFAULT NULL,
  `customer_gtotal` varchar(250) NOT NULL,
  `amt_paid` varchar(250) NOT NULL,
  `balance` varchar(250) NOT NULL,
  `grand_total_amount` decimal(10,2) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `create_by` varchar(255) NOT NULL,
  `container_no` varchar(250) NOT NULL,
  `remarks` varchar(250) NOT NULL,
  `shipment_number` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expense_trucking`
--

INSERT INTO `expense_trucking` (`id`, `trucking_id`, `invoice_no`, `invoice_date`, `bill_to`, `shipment_company`, `container_pickup_date`, `delivery_date`, `total_amt`, `tax`, `payment_id`, `customer_gtotal`, `amt_paid`, `balance`, `grand_total_amount`, `status`, `create_by`, `container_no`, `remarks`, `shipment_number`) VALUES
(11, '20230607101935', 'T202306-1', '2023-06-07', '8', 'TESTSUPPLIER', '2023-06-07', '2023-06-07', '3404200', '2553150.000 ( OHSYSS43CS-75% )', 1511861477, '5957350', '4565775', '1391575', '5957350.00', 1, '38', 'ERTT43566', ' ERERERYERYERY', 'BL4576457');

-- --------------------------------------------------------

--
-- Table structure for table `expense_trucking_details`
--

CREATE TABLE `expense_trucking_details` (
  `id` int(11) NOT NULL,
  `expense_trucking_detail_id` varchar(255) DEFAULT NULL,
  `expense_trucking_id` varchar(255) DEFAULT NULL,
  `trucking_date` varchar(255) DEFAULT NULL,
  `qty` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `rate` varchar(255) DEFAULT NULL,
  `pro_no_reference` varchar(255) DEFAULT NULL,
  `total` varchar(255) DEFAULT NULL,
  `create_by` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expense_trucking_details`
--

INSERT INTO `expense_trucking_details` (`id`, `expense_trucking_detail_id`, `expense_trucking_id`, `trucking_date`, `qty`, `description`, `rate`, `pro_no_reference`, `total`, `create_by`, `status`) VALUES
(30, 'AUEQKDESkCdLYu', '20230607101935', '2023-06-07', '555', 'SDFGGD', '555', '456456456 ', '308025', '38', '1'),
(31, 'ctAIUbLPlAysEqk', '20230607101935', '2023-06-07', '6775', 'FURTU', '457', '456456456 ', '3096175', '38', '1');

-- --------------------------------------------------------

--
-- Table structure for table `federal_tax`
--

CREATE TABLE `federal_tax` (
  `id` int(11) NOT NULL,
  `year` year(4) NOT NULL,
  `tax` varchar(255) NOT NULL,
  `employer` varchar(255) NOT NULL,
  `employee` varchar(255) NOT NULL,
  `details` varchar(255) DEFAULT NULL,
  `single` varchar(255) NOT NULL DEFAULT '0',
  `tax_filling` varchar(255) NOT NULL DEFAULT '0',
  `married` varchar(255) NOT NULL DEFAULT '0',
  `head_household` varchar(255) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `federal_tax`
--

INSERT INTO `federal_tax` (`id`, `year`, `tax`, `employer`, `employee`, `details`, `single`, `tax_filling`, `married`, `head_household`, `created`) VALUES
(52, 2023, 'Federal Income tax', '0', '10', '0', '11000-99999', '22000-99999', '11000-99999', '15700-99999', '2023-06-22 14:15:31'),
(53, 2023, 'Federal Income tax', '0', '12', '0', '11001-44725', '22001-89450', '11001-44725', '15701-59850', '2023-06-22 14:15:31'),
(54, 2023, 'Federal Income tax', '0', '2', '0', '44726-95375', '89451-190750', '44726-95375', '59851-95350', '2023-06-22 14:15:31'),
(55, 2023, 'Federal Income tax', '0', '24', '0', '95376-182100', '190751-364200', '95376-182100', '95351-182100', '2023-06-22 14:15:31'),
(56, 2023, 'Federal Income tax', '0', '32', '0', '182101-231250', '364201-462500', '182101-231250', '182101-231250', '2023-06-22 14:15:31'),
(57, 2023, 'Federal Income tax', '0', '35', '0', '231251-578125', '462501-693750', '231251-346875', '231251-578100', '2023-06-22 14:15:31'),
(58, 2023, 'Federal Income tax', '0', '37', '0', '578126-999999', '693751-999999', '346876-999999', '578101-999999', '2023-06-22 14:15:31'),
(60, 2023, 'Social Security', '6.2', '6.2', '0', '0-160200', '0-100', '0-00', '0-100', '2023-06-22 14:16:49'),
(61, 2023, 'Medicare', '1.45', '1.45', '0', '0-200000', '0-250000', '0-125000', '0-200000', '2023-06-22 14:17:46'),
(62, 2023, 'Medicare', '0', '0.9', '0', '200001-999999', '250000-999999', '125000-999999', '200001-999999', '2023-06-22 14:17:46'),
(63, 2023, 'Federal unemployment', '6', '0', '0', '7000-9999', '0-0', '0-0', '0-0', '2023-06-22 14:18:19'),
(64, 2023, 'Federal unemployment', '4', '0', '0', '7000-9999', '0-0', '0-0', '0-0', '2023-06-22 14:18:19');

-- --------------------------------------------------------

--
-- Table structure for table `help_desk`
--

CREATE TABLE `help_desk` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `created_at` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `help_desk`
--

INSERT INTO `help_desk` (`id`, `title`, `description`, `created_at`) VALUES
(1, 'Help', 'Content will be updated soon....', '2');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `id` int(11) NOT NULL,
  `invoice_details_id` varchar(250) NOT NULL,
  `invoice_id` bigint(20) NOT NULL,
  `customer_id` bigint(20) NOT NULL,
  `date` varchar(50) DEFAULT NULL,
  `commercial_invoice_number` varchar(255) DEFAULT NULL,
  `billing_address` varchar(255) DEFAULT NULL,
  `container_no` varchar(255) DEFAULT NULL,
  `shipping_address` varchar(250) NOT NULL,
  `bl_no` varchar(255) DEFAULT NULL,
  `total_amount` decimal(18,2) DEFAULT 0.00,
  `prevous_due` decimal(20,2) DEFAULT 0.00,
  `payment_terms` varchar(255) DEFAULT NULL,
  `payment_due_date` varchar(255) DEFAULT NULL,
  `invoice` bigint(20) DEFAULT NULL,
  `invoice_discount` decimal(10,2) DEFAULT 0.00 COMMENT 'invoice discount',
  `total_discount` decimal(10,2) DEFAULT 0.00 COMMENT 'total invoice discount',
  `total_tax` varchar(250) DEFAULT '0.00',
  `sales_by` varchar(50) NOT NULL,
  `invoice_details` text DEFAULT NULL,
  `status` int(11) NOT NULL,
  `bank_id` varchar(30) DEFAULT NULL,
  `payment_type` varchar(250) DEFAULT NULL,
  `etd` varchar(250) NOT NULL,
  `eta` varchar(250) NOT NULL,
  `gtotal` varchar(250) NOT NULL DEFAULT '0',
  `gtotal_preferred_currency` varchar(250) NOT NULL,
  `paid_amount` varchar(250) NOT NULL DEFAULT '0',
  `due_amount` varchar(250) NOT NULL,
  `payment_id` int(11) DEFAULT NULL,
  `ac_details` varchar(250) NOT NULL,
  `remark` varchar(250) NOT NULL,
  `total_gross` varchar(250) NOT NULL,
  `total_net` varchar(250) NOT NULL,
  `total_weight` varchar(250) NOT NULL,
  `amount_pay_usd` varchar(250) NOT NULL,
  `due_amount_usd` varchar(250) NOT NULL,
  `Port_of_discharge` varchar(111) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`id`, `invoice_details_id`, `invoice_id`, `customer_id`, `date`, `commercial_invoice_number`, `billing_address`, `container_no`, `shipping_address`, `bl_no`, `total_amount`, `prevous_due`, `payment_terms`, `payment_due_date`, `invoice`, `invoice_discount`, `total_discount`, `total_tax`, `sales_by`, `invoice_details`, `status`, `bank_id`, `payment_type`, `etd`, `eta`, `gtotal`, `gtotal_preferred_currency`, `paid_amount`, `due_amount`, `payment_id`, `ac_details`, `remark`, `total_gross`, `total_net`, `total_weight`, `amount_pay_usd`, `due_amount_usd`, `Port_of_discharge`) VALUES
(28, '', 3259497428, 8, '2023-06-07', 'NS202306-2', '   No0989\r\nFGJF\r\nSTATE-980989-United States\r\najithkumar0902001@gmail.com\r\n87870070980', 'ASDA43243', 'No077\r\nFGJF\r\nSTATE-980989-United States\r\najithkumar0902001@gmail.com\r\n87870070980   ', 'BL4564577', '2262.18', '0.00', '30DAYS', '2023-07-07', NULL, '0.00', '0.00', '1131.000 ( OA36X6AKVT-50% )', '38', NULL, 1, NULL, 'COD', '2023-06-15', '2023-06-10', '3393', '3393', '2282', '1111', 228219216, ' He made some derogatory remark about her appearance.It was an innocent remark, I didn\'t mean to hurt his feelings.', ' He made some derogatory remark about her appearance.It was an innocent remark, I didn\'t mean to hurt his feelings.', '118.632', '38.744', '443.000', '', '', 'PORTOFDISCHARGE'),
(29, '', 2657225324, 10, '2023-06-13', 'NS202306-1', '45646\r\n4564\r\n5645-6456-United States\r\nadmin@example.com\r\n456', '456456', '456\r\n4564\r\n5645-6456-United States\r\nadmin@example.com\r\n456', '45645645', '97.45', '0.00', 'ADVANCE', '2023-06-22', NULL, '0.00', '0.00', '48.500 ( OA36X6AKVT-50% )', '92', NULL, 1, NULL, '', '', '', '145', '145', '', '145', 1932461974, '                                           He made some derogatory remark about her appearance.\r\nIt was an innocent remark, I didn\'t mean to hurt his feelings.', '                       \r\n                                      \r\n                                        He made some derogatory remark about her appearance.\r\nIt was an innocent remark, I didn\'t mean to hurt his feelings.', '0.404', '19.501', '44.000', '', '', '45645');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_content`
--

CREATE TABLE `invoice_content` (
  `id` int(11) NOT NULL,
  `business_name` varchar(191) NOT NULL,
  `phone` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `reg_number` varchar(191) NOT NULL,
  `website` varchar(191) NOT NULL,
  `address` varchar(191) NOT NULL,
  `uid` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice_content`
--

INSERT INTO `invoice_content` (`id`, `business_name`, `phone`, `email`, `reg_number`, `website`, `address`, `uid`) VALUES
(2, 'Amorio', '7897897898', 'amorio2022@gmail.com', 'RW35325', 'www.amoriotech.com', 'TTKRoad,Alwarpet', '38'),
(3, 'AMORIO', '67878678', 'AMORIO2022@GMAIL.COM', '19328191', 'WWW.AMORIOTECH.COM', 'TTK ROAD,ALWARPET', '87'),
(4, 'Lancaster UAT', '4543543', 'lancaster@amoriotech.com', '454535345', 'lancaster.com', '454,Netherland', '88'),
(5, 'Chaitanya', '546456 ', 'chaitanyatech@gmail.com', '5655WH55', 'chaitanyatech.com', 'Workafella,Alwarpet', '92');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_design`
--

CREATE TABLE `invoice_design` (
  `id` int(11) NOT NULL,
  `logo` varchar(191) NOT NULL,
  `header` varchar(191) NOT NULL,
  `color` varchar(191) NOT NULL,
  `template` varchar(191) NOT NULL,
  `uid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice_design`
--

INSERT INTO `invoice_design` (`id`, `logo`, `header`, `color`, `template`, `uid`) VALUES
(8, 'images/logo/amorio.JPG', 'INVOICE', 'ADD8E6', '1', 38),
(9, '', 'ccc', '00BFFF', '1', 38),
(10, '', 'INVOICE ', '87CEFA', '1', 87),
(11, '', 'INVOICE', '00BFFF', '2', 88),
(12, '', '435345', 'DAA520', '1', 92);

-- --------------------------------------------------------

--
-- Table structure for table `invoice_details`
--

CREATE TABLE `invoice_details` (
  `id` int(11) NOT NULL,
  `invoice_details_id` varchar(100) NOT NULL,
  `create_by` varchar(100) NOT NULL,
  `invoice_id` varchar(100) NOT NULL,
  `product_id` varchar(30) NOT NULL,
  `product_name` varchar(250) NOT NULL,
  `tableid` varchar(250) NOT NULL,
  `in_stock` varchar(250) DEFAULT NULL,
  `description` varchar(250) DEFAULT NULL,
  `thickness` varchar(250) NOT NULL,
  `quantity` decimal(10,2) DEFAULT NULL,
  `rate` decimal(10,2) DEFAULT NULL,
  `supplier_rate` float DEFAULT NULL,
  `total_price` decimal(12,2) DEFAULT NULL,
  `discount` decimal(10,2) DEFAULT NULL,
  `discount_per` varchar(15) DEFAULT NULL,
  `tax` decimal(10,2) DEFAULT NULL,
  `paid_amount` decimal(12,0) DEFAULT NULL,
  `status` varchar(250) NOT NULL,
  `supplier_block_no` varchar(250) NOT NULL,
  `supplier_slab_no` varchar(250) NOT NULL,
  `g_width` varchar(250) NOT NULL,
  `g_height` varchar(250) NOT NULL,
  `gross_sqft` varchar(250) NOT NULL,
  `bundle_no` varchar(250) NOT NULL,
  `n_width` varchar(250) NOT NULL,
  `n_height` varchar(250) NOT NULL,
  `net_sqft` varchar(250) NOT NULL,
  `cost_sqft` varchar(250) NOT NULL,
  `cost_slab` varchar(250) NOT NULL,
  `sales_price_sqft` varchar(250) NOT NULL,
  `sales_slab_price` varchar(250) NOT NULL,
  `weight` varchar(250) NOT NULL,
  `origin` varchar(250) NOT NULL,
  `overall_gross` varchar(250) DEFAULT NULL,
  `overall_net` varchar(250) DEFAULT NULL,
  `overall_total` varchar(250) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `invoice_details`
--

INSERT INTO `invoice_details` (`id`, `invoice_details_id`, `create_by`, `invoice_id`, `product_id`, `product_name`, `tableid`, `in_stock`, `description`, `thickness`, `quantity`, `rate`, `supplier_rate`, `total_price`, `discount`, `discount_per`, `tax`, `paid_amount`, `status`, `supplier_block_no`, `supplier_slab_no`, `g_width`, `g_height`, `gross_sqft`, `bundle_no`, `n_width`, `n_height`, `net_sqft`, `cost_sqft`, `cost_slab`, `sales_price_sqft`, `sales_slab_price`, `weight`, `origin`, `overall_gross`, `overall_net`, `overall_total`) VALUES
(91, '469249822159825', '38', '3259497428', '1329325566', 'TESTPRODUCT-55', '12', NULL, ' WERER', ' 34', NULL, NULL, NULL, '632.84', NULL, NULL, NULL, NULL, '1', '34', '34', '54', '45', ' 16.875', '45', '45', '45', '14.063', ' 45', '45', '632.835', '632.835', '45', '45', NULL, NULL, NULL),
(89, '299454855273667', '38', '3259497428', '1329325566', 'TESTPRODUCT-55', '1', NULL, ' KHHG', ' 23', NULL, NULL, NULL, '473.95', NULL, NULL, NULL, NULL, '1', '23', '234', '34', '342', ' 80.750', '23', '23', '23', '3.674', ' 43', '34', '157.982', '473.946', '343', '23', '118.632', '38.744', '2262.180'),
(90, '943247828417836', '38', '3259497428', '841306731', 'PRODUCTTEST-55', '11', NULL, 'ETRE', '55', NULL, NULL, NULL, '1155.39', NULL, NULL, NULL, NULL, '1', '55', '55', '55', '55', '21.007', '55', '55', '55', '21.007', '55', '55', '1155.385', '1155.385', '55', '55', '0.000', '0.000', '0.000'),
(92, '396923557712791', '92', '2657225324', '1566412787', 'ChaiPro-CP', '1', NULL, '44', '2', NULL, NULL, NULL, '0.11', NULL, NULL, NULL, NULL, '1', '2', '2', '2', '2', '0.028', '2', '2', '2', '0.028', '2', '2', '0.056', '0.112', '22', '4234', '0.202', '0.202', '0.982'),
(93, '235135699663831', '92', '2657225324', '1566412787', 'ChaiPro-CP', '11', NULL, 'dfgdg', '5', NULL, NULL, NULL, '0.87', NULL, NULL, NULL, NULL, '1', '5', '5', '5', '5', '0.174', '5', '5', '5', '0.174', '5', '5', '0.870', '0.870', 'dfgg', '5445', '0.202', '19.299', '96.467'),
(94, '391547559149443', '92', '2657225324', '1566412787', 'ChaiPro-CP', '2', NULL, 'dfgdg', '5', NULL, NULL, NULL, '96.36', NULL, NULL, NULL, NULL, '1', '5', '5', '5', '5', '0.174', '5', '5', '555', '19.271', '5', '5', '96.355', '96.355', 'dfgg', '5445', NULL, NULL, NULL),
(95, '835563141883812', '92', '2657225324', '1566412787', 'ChaiPro-CP', '21', NULL, '44', '2', NULL, NULL, NULL, '0.11', NULL, NULL, NULL, NULL, '1', '2', '2', '2', '2', '0.028', '2', '2', '2', '0.028', '2', '2', '0.056', '0.112', '22', '4234', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `invoice_email`
--

CREATE TABLE `invoice_email` (
  `id` int(11) NOT NULL,
  `pdf_attached` int(11) NOT NULL,
  `subject` varchar(191) NOT NULL,
  `greeting` varchar(191) NOT NULL,
  `message` varchar(191) NOT NULL,
  `uid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice_email`
--

INSERT INTO `invoice_email` (`id`, `pdf_attached`, `subject`, `greeting`, `message`, `uid`) VALUES
(3, 0, '', 'Dear_First Name', '                         Amoriotech Tech Invoice\n                                ', 38);

-- --------------------------------------------------------

--
-- Table structure for table `language`
--

CREATE TABLE `language` (
  `id` int(11) NOT NULL,
  `phrase` varchar(76) NOT NULL,
  `english` varchar(282) NOT NULL,
  `spanish` varchar(383) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `language`
--

INSERT INTO `language` (`id`, `phrase`, `english`, `spanish`) VALUES
(1, 'user_profile', 'User Profile', 'Perfil del usuario'),
(2, 'setting', 'Setting', 'Configuración'),
(3, 'language', 'Language', 'Idioma'),
(4, 'manage_users', 'Manage Users', 'Administrar usuarios'),
(5, 'add_user', 'Add User', 'Agregar usuario'),
(6, 'manage_company', 'Manage Company', 'Administrar empresa'),
(7, 'web_settings', 'Manage Settings', 'Administrar configuración'),
(8, 'manage_accounts', 'Manage Accounts', 'Cuentas de administración'),
(9, 'create_accounts', 'Create Account', 'Crear una cuenta'),
(10, 'manage_bank', 'Manage Bank', 'Administrar banco'),
(11, 'add_new_bank', 'Add New Bank', 'Agregar nuevo banco'),
(12, 'settings', 'Settings', 'Ajustes'),
(13, 'closing_report', 'Closing Report', 'Informe de cierre'),
(14, 'closing', 'Closing', 'Clausura'),
(15, 'cheque_manager', 'Cheque Manager', 'Administrador de cheques'),
(16, 'accounts_summary', 'Accounts Summary', 'Resumen de cuentas'),
(17, 'expense', 'Expense', 'Gastos'),
(18, 'income', 'Income', 'Ingreso'),
(19, 'accounts', 'Accounts', 'Cuentas'),
(20, 'stock_report', 'Stock Report', 'Informe de existencias'),
(21, 'stock', 'Stock', 'Existencias'),
(22, 'pos_invoice', 'POS Sale', 'Venta POS'),
(23, 'manage_invoice', 'Manage Sale', 'Gestionar venta'),
(24, 'new_invoice', 'New Sale', 'Nueva venta'),
(25, 'invoice', 'Sale', 'Venta'),
(26, 'manage_purchase', 'Manage Expenses', 'Administrar gastos'),
(27, 'add_purchase', 'Add Expenses', 'Agregar gastos'),
(28, 'purchase', 'Expenses', 'Gastos'),
(29, 'paid_customer', 'Paid Customer', 'Cliente pagado'),
(30, 'manage_customer', 'Manage Customer', 'Gestionar Cliente'),
(31, 'add_customer', 'Add Customer', 'Añadir Cliente'),
(32, 'customer', 'Customer', 'Cliente'),
(33, 'supplier_payment_actual', 'Supplier Payment Ledger', 'Libro mayor de pagos a proveedores'),
(34, 'supplier_sales_summary', 'Supplier Sales Summary', 'Resumen de ventas del proveedor'),
(35, 'supplier_sales_details', 'Supplier Sales Details', 'Detalles de ventas del proveedor'),
(36, 'supplier_ledger', 'Supplier Ledger', 'Libro mayor de proveedores'),
(37, 'manage_supplier', 'Manage Supplier', 'Administrar proveedor'),
(38, 'add_supplier', 'Add Supplier', 'Agregar proveedor'),
(39, 'supplier', 'Supplier', 'Proveedor'),
(40, 'product_statement', 'Product Statement', 'Declaración de producto'),
(41, 'manage_product', 'Manage Product', 'Administrar producto'),
(42, 'add_product', 'Add Product', 'Agregar producto'),
(43, 'product', 'Product', 'Producto'),
(44, 'manage_category', 'Manage Category', 'Administrar categoría'),
(45, 'add_category', 'Add Category', 'Añadir categoría'),
(46, 'category', 'Category', 'Categoría'),
(47, 'sales_report_product_wise', 'Sales Report (Product Wise)', 'Informe de ventas (producto inteligente'),
(48, 'purchase_report', 'Expenses Report', 'Informe de gastos'),
(49, 'sales_report', 'Sales Report', 'Reporte de ventas'),
(50, 'todays_report', 'Todays Report', 'Informe de hoy'),
(51, 'report', 'Report', 'Informe'),
(52, 'dashboard', 'Dashboard', 'Panel'),
(53, 'online', 'Online', 'En línea'),
(54, 'logout', 'Logout', 'Cerrar sesión'),
(55, 'change_password', 'Change Password', 'Cambiar la contraseña'),
(56, 'total_purchase', 'Total Expenses', 'Gastos totales'),
(57, 'total_amount', 'Total Amount', 'Cantidad total'),
(58, 'supplier_name', 'Supplier Name', 'Nombre del proveedor'),
(59, 'invoice_no', 'Invoice No', 'Factura no'),
(60, 'purchase_date', 'Purchase Date', 'Fecha de compra'),
(61, 'todays_purchase_report', 'Todays Expenses Report', 'Informe de gastos de hoy'),
(62, 'total_sales', 'Total Sales', 'Ventas totales'),
(63, 'customer_name', 'Customer Name', 'Nombre del cliente'),
(64, 'sales_date', 'Sales Date', 'Fecha de venta'),
(65, 'todays_sales_report', 'Todays Sales Report', 'Informe de ventas de hoy'),
(66, 'home', 'Home', 'Hogar'),
(67, 'todays_sales_and_purchase_report', 'Todays sales and purchase report', 'Informe de compras y ventas de hoy'),
(68, 'total_ammount', 'Total Amount', 'Cantidad total'),
(69, 'rate', 'Rate', 'Tasa'),
(70, 'product_model', 'Product Model', 'Modelo del Producto'),
(71, 'product_name', 'Product Name', 'Nombre del producto'),
(72, 'search', 'Search', 'Buscar'),
(73, 'end_date', 'End Date', 'Fecha final'),
(74, 'start_date', 'Start Date', 'Fecha de inicio'),
(75, 'total_purchase_report', 'Total Expenses Report', 'Informe de gastos totales'),
(76, 'total_sales_report', 'Total Sales Report', 'Informe de ventas totales'),
(77, 'total_seles', 'Total Sales', 'Ventas totales'),
(78, 'all_stock_report', 'All Stock Report', 'Informe de todas las existencias'),
(79, 'search_by_product', 'Search By Product', 'Buscar por producto'),
(80, 'date', 'Date', 'Fecha'),
(81, 'print', 'Print', 'Imprimir'),
(82, 'stock_date', 'Stock Date', 'Fecha de existencias'),
(83, 'print_date', 'Print Date', 'Fecha de impresion'),
(84, 'sales', 'Sales', 'Ventas'),
(85, 'price', 'Price', 'Precio'),
(86, 'sl', 'SL.', 'SL.'),
(87, 'add_new_category', 'Add new category', 'Añadir nueva categoria'),
(88, 'category_name', 'Category Name', 'Nombre de la categoría'),
(89, 'save', 'Save', 'Ahorrar'),
(90, 'delete', 'Delete', 'Borrar'),
(91, 'update', 'Update', 'Actualizar'),
(92, 'action', 'Action', 'Acción'),
(93, 'manage_your_category', 'Manage your category', 'Gestiona tu categoría'),
(94, 'category_edit', 'Category Edit', 'Editar categoría'),
(95, 'status', 'Status', 'Estado'),
(96, 'active', 'Active', 'Activo'),
(97, 'inactive', 'Inactive', 'Inactivo'),
(98, 'save_changes', 'Save Changes', 'Guardar cambios'),
(99, 'save_and_add_another', 'Save And Add Another', 'Guardar y agregar otro'),
(100, 'model', 'Model', 'Modelo'),
(101, 'supplier_price', 'Supplier Price', 'Precio del proveedor'),
(102, 'sell_price', 'Sale Price', 'Precio de venta'),
(103, 'image', 'Image', 'Imagen'),
(104, 'select_one', 'Select One', 'Seleccione uno'),
(105, 'details', 'Details', 'Detalles'),
(106, 'new_product', 'New Product', 'Nuevo producto'),
(107, 'add_new_product', 'Add New Product', 'Añadir nuevo producto'),
(108, 'barcode', 'Barcode', 'Código de barras'),
(109, 'qr_code', 'Qr-Code', 'Código QR'),
(110, 'product_details', 'Product Details', 'Detalles de producto'),
(111, 'manage_your_product', 'Manage your product', 'Gestiona tu producto'),
(112, 'product_edit', 'Product Edit', 'Editar producto'),
(113, 'edit_your_product', 'Edit your product', 'Edita tu producto'),
(114, 'cancel', 'Cancel', 'Cancelar'),
(115, 'incl_vat', 'Incl. Vat', 'Incl. IVA'),
(116, 'money', 'TK', 'TK'),
(117, 'grand_total', 'Grand Total', 'Gran total'),
(118, 'quantity', 'Qnty', 'Cantidad'),
(119, 'product_report', 'Product Report', 'Informe de producto'),
(120, 'product_sales_and_purchase_report', 'Product sales and purchase report', 'Informe de compra y venta de productos'),
(121, 'previous_stock', 'Previous Stock', 'Existencias anteriores'),
(122, 'out', 'Out', 'Afuera'),
(123, 'in', 'In', 'En'),
(124, 'to', 'To', 'A'),
(125, 'previous_balance', 'Previous Credit Balance', 'Saldo de crédito anterior'),
(126, 'customer_address', 'Customer Address', 'Dirección del cliente'),
(127, 'customer_mobile', 'Customer Mobile', 'Móvil del cliente'),
(128, 'customer_email', 'Customer Email', 'Correo electrónico del cliente'),
(129, 'add_new_customer', 'Add new customer', 'Añadir nuevo cliente'),
(130, 'balance', 'Balance', 'Balance'),
(131, 'mobile', 'Mobile', 'Móvil'),
(132, 'address', 'Address', 'DIRECCIÓN'),
(133, 'manage_your_customer', 'Manage your customer', 'Gestiona a tu cliente'),
(134, 'customer_edit', 'Customer Edit', 'Editar cliente'),
(135, 'paid_customer_list', 'Paid Customer List', 'Lista de clientes de pago'),
(136, 'ammount', 'Amount', 'Cantidad'),
(137, 'customer_ledger', 'Customer Ledger', 'Libro mayor de clientes'),
(138, 'manage_customer_ledger', 'Manage Customer Ledger', 'Gestionar libro mayor de clientes'),
(139, 'customer_information', 'Customer Information', 'Información al cliente'),
(140, 'debit_ammount', 'Debit Amount', 'Importe de débito'),
(141, 'credit_ammount', 'Credit Amount', 'Monto de crédito'),
(142, 'balance_ammount', 'Balance Amount', 'Balance de Cuenta'),
(143, 'receipt_no', 'Receipt NO', 'Recibo NO'),
(144, 'description', 'Description', 'Descripción'),
(145, 'debit', 'Debit', 'Débito'),
(146, 'credit', 'Credit', 'Crédito'),
(147, 'item_information', 'Item Information', 'Información del artículo'),
(148, 'total', 'Total', 'Total'),
(149, 'please_select_supplier', 'Please Select Supplier', 'Seleccione proveedor'),
(150, 'submit', 'Submit', 'Entregar'),
(151, 'submit_and_add_another', 'Submit And Add Another One', 'Enviar y agregar otro'),
(152, 'add_new_item', 'Add New Item', 'Agregar ítem nuevo'),
(153, 'manage_your_purchase', 'Manage your purchase', 'Gestiona tu compra'),
(154, 'purchase_edit', 'Expenses Edit', 'Editar gastos'),
(155, 'purchase_ledger', 'Expenses Ledger', 'Libro de gastos'),
(156, 'invoice_information', 'Sale Information', 'Información de venta'),
(157, 'paid_ammount', 'Paid Amount', 'Monto de pago'),
(158, 'discount', 'Dis./Pcs.', 'Dis./Uds.'),
(159, 'save_and_paid', 'Save And Paid', 'Ahorra y paga'),
(160, 'payee_name', 'Payee Name', 'Nombre del beneficiario'),
(161, 'manage_your_invoice', 'Manage your Sale', 'Gestiona tu Venta'),
(162, 'invoice_edit', 'Sale Edit', 'Editar venta'),
(163, 'new_pos_invoice', 'New POS Sale', 'Nueva venta de POS'),
(164, 'add_new_pos_invoice', 'Add new pos Sale', 'Agregar nueva pos venta'),
(165, 'product_id', 'Product ID', 'ID del Producto'),
(166, 'paid_amount', 'Paid Amount', 'Monto de pago'),
(167, 'authorised_by', 'Authorised By', 'Autorizado por'),
(168, 'checked_by', 'Checked By', 'Revisado por'),
(169, 'received_by', 'Received By', 'Recibido por'),
(170, 'prepared_by', 'Prepared By', 'Preparado por'),
(171, 'memo_no', 'Memo No', 'Memo no'),
(172, 'website', 'Website', 'Sitio web'),
(173, 'email', 'Email', 'Correo electrónico'),
(174, 'invoice_details', 'Sale Details', 'Detalles de venta'),
(175, 'reset', 'Reset', 'Reiniciar'),
(176, 'payment_account', 'Payment Account', 'Cuenta de pago'),
(177, 'bank_name', 'Bank Name', 'Nombre del banco'),
(178, 'cheque_or_pay_order_no', 'Cheque/Pay Order No', 'Nº de orden de cheque/pago'),
(179, 'payment_type', 'Payment Type', 'Tipo de pago'),
(180, 'payment_from', 'Payment From', 'Pago de'),
(181, 'payment_date', 'Payment Date', 'Fecha de pago'),
(182, 'add_income', 'Add Income', 'Añadir Ingresos'),
(183, 'cash', 'Cash', 'Dinero en efectivo'),
(184, 'cheque', 'Cheque', 'Controlar'),
(185, 'pay_order', 'Pay Order', 'Orden de pago'),
(186, 'payment_to', 'Payment To', 'Pago Para'),
(187, 'total_outflow_ammount', 'Total Expense Amount', 'Cantidad total de gastos'),
(188, 'transections', 'Transections', 'Transecciones'),
(189, 'accounts_name', 'Accounts Name', 'Nombre de la cuenta'),
(190, 'outflow_report', 'Expense Report', 'Informe de gastos'),
(191, 'inflow_report', 'Income Report', 'Informe de ingresos'),
(192, 'all', 'All', 'Todo'),
(193, 'account', 'Account', 'Cuenta'),
(194, 'from', 'From', 'De'),
(195, 'account_summary_report', 'Account Summary Report', 'Informe de resumen de cuenta'),
(196, 'search_by_date', 'Search By Date', 'Buscar por fecha'),
(197, 'cheque_no', 'Cheque No', 'No de cheque'),
(198, 'name', 'Name', 'Nombre'),
(199, 'closing_account', 'Closing Account', 'Cuenta de cierre'),
(200, 'close_your_account', 'Close your account', 'Cierra tu cuenta'),
(201, 'last_day_closing', 'Last Day Closing', 'Último día de cierre'),
(202, 'cash_in', 'Cash In', 'Dinero en efectivo en'),
(203, 'cash_out', 'Cash Out', 'Retiro de efectivo'),
(204, 'cash_in_hand', 'Cash In Hand', 'Dinero en efectivo'),
(205, 'add_new_bank', 'Add New Bank', 'Agregar nuevo banco'),
(206, 'day_closing', 'Day Closing', 'Cierre del día'),
(207, 'account_closing_report', 'Account Closing Report', 'Informe de cierre de cuenta'),
(208, 'last_day_ammount', 'Last Day Amount', 'Cantidad del último día'),
(209, 'adjustment', 'Adjustment', 'Ajustamiento'),
(210, 'pay_type', 'Pay Type', 'Tipo de pago'),
(211, 'customer_or_supplier', 'Customer', 'Cliente'),
(212, 'transection_id', 'Transections ID', 'ID de transecciones'),
(213, 'accounts_summary_report', 'Accounts Summary Report', 'Informe de resumen de cuentas'),
(214, 'bank_list', 'Bank List', 'Lista de bancos'),
(215, 'bank_edit', 'Bank Edit', 'Edición bancaria'),
(216, 'debit_plus', 'Debit (+)', 'Débito (+'),
(217, 'credit_minus', 'Credit (-)', 'Crédito (-'),
(218, 'account_name', 'Account Name', 'Nombre de la cuenta'),
(219, 'account_type', 'Account Type', 'Tipo de cuenta'),
(220, 'account_real_name', 'Account Real Name', 'Nombre real de la cuenta'),
(221, 'manage_account', 'Manage Account', 'Administrar cuenta'),
(222, 'company_name', 'Niha International', 'Niha Internacional'),
(223, 'edit_your_company_information', 'Edit your company information', 'Editar la información de su empresa'),
(224, 'company_edit', 'Company Edit', 'Edición de empresa'),
(225, 'admin', 'Admin', 'Administración'),
(226, 'user', 'User', 'Usuario'),
(227, 'password', 'Password', 'Contraseña'),
(228, 'last_name', 'Last Name', 'Apellido'),
(229, 'first_name', 'First Name', 'Nombre de pila'),
(230, 'add_new_user_information', 'Add new user information', 'Añadir nueva información de usuario'),
(231, 'user_type', 'User Type', 'Tipo de usuario'),
(232, 'user_edit', 'User Edit', 'Edición de usuario'),
(233, 'rtr', 'RTR', 'RTR'),
(234, 'ltr', 'LTR', 'LTR'),
(235, 'ltr_or_rtr', 'LTR/RTR', 'LTR/RTR'),
(236, 'footer_text', 'Footer Text', 'Texto de pie de página'),
(237, 'favicon', 'Favicon', 'Favicón'),
(238, 'logo', 'Logo', 'Logo'),
(239, 'update_setting', 'Update Setting', 'Ajuste de actualización'),
(240, 'update_your_web_setting', 'Update your web setting', 'Actualiza tu configuración web'),
(241, 'login', 'Login', 'Acceso'),
(242, 'your_strong_password', 'Your strong password', 'Tu contraseña segura'),
(243, 'your_unique_email', 'Your unique email', 'Tu correo electrónico único'),
(244, 'please_enter_your_login_information', 'Please enter your login information.', 'Por favor'),
(245, 'update_profile', 'Update Profile', 'Actualización del perfil'),
(246, 'your_profile', 'Your Profile', 'Tu perfil'),
(247, 're_type_password', 'Re-Type Password', 'Vuelva a escribir la contraseña'),
(248, 'new_password', 'New Password', 'Nueva contraseña'),
(249, 'old_password', 'Old Password', 'Contraseña anterior'),
(250, 'new_information', 'New Information', 'Nueva información'),
(251, 'old_information', 'Old Information', 'Información antigua'),
(252, 'change_your_information', 'Change your information', 'Cambiar su información'),
(253, 'change_your_profile', 'Change your profile', 'Cambiar su perfil'),
(254, 'profile', 'Profile', 'Perfil'),
(255, 'wrong_username_or_password', 'Wrong User Name Or Password !', 'Nombre de usuario o contraseña incorrectos !'),
(256, 'successfully_updated', 'Successfully Updated.', 'Actualizado exitosamente.'),
(257, 'blank_field_does_not_accept', 'Blank Field Does Not Accept !', '¡El campo en blanco no acepta!'),
(258, 'successfully_changed_password', 'Successfully changed password.', 'Contraseña modificada con éxito.'),
(259, 'you_are_not_authorised_person', 'You are not authorised person !', '¡Usted no es una persona autorizada!'),
(260, 'password_and_repassword_does_not_match', 'Passwor and re-password does not match !', '¡La contraseña y la nueva contraseña no coinciden!'),
(261, 'new_password_at_least_six_character', 'New Password At Least 6 Character.', 'Nueva contraseña de al menos 6 caracteres.'),
(262, 'you_put_wrong_email_address', 'You put wrong email address !', '¡Puso una dirección de correo electrónico incorrecta!'),
(263, 'cheque_ammount_asjusted', 'Cheque amount adjusted.', 'Importe del cheque ajustado.'),
(264, 'successfully_payment_paid', 'Successfully Payment Paid.', 'Pago pagado con éxito.'),
(265, 'successfully_added', 'Successfully Added.', 'Agregado exitosamente.'),
(266, 'successfully_updated_2_closing_ammount_not_changeale', 'Successfully Updated -2. Note: Closing Amount Not Changeable.', 'Actualizado con éxito -2. Nota: Monto de cierre no modificable.'),
(267, 'successfully_payment_received', 'Successfully Payment Received.', 'Pago recibido con éxito.'),
(268, 'already_inserted', 'Already Inserted !', '¡Ya insertado!'),
(269, 'successfully_delete', 'Successfully Delete.', 'Eliminar con éxito.'),
(270, 'successfully_created', 'Successfully Created.', 'Creado con éxito.'),
(271, 'logo_not_uploaded', 'Logo not uploaded !', '¡Logotipo no subido!'),
(272, 'favicon_not_uploaded', 'Favicon not uploaded !', 'Favicon no subido!'),
(273, 'supplier_mobile', 'Supplier Mobile', 'Móvil de proveedor'),
(274, 'supplier_address', 'Supplier Address', 'Dirección del proveedor'),
(275, 'supplier_details', 'Supplier Details', 'Detalles del proveedor'),
(276, 'add_new_supplier', 'Add New Supplier', 'Agregar nuevo proveedor'),
(277, 'manage_suppiler', 'Manage Supplier', 'Administrar proveedor'),
(278, 'manage_your_supplier', 'Manage your supplier', 'Gestiona tu proveedor'),
(279, 'manage_supplier_ledger', 'Manage supplier ledger', 'Gestionar libro mayor de proveedores'),
(280, 'invoice_id', 'Invoice ID', 'Identificador de factura'),
(281, 'deposite_id', 'Deposite ID', 'ID de depósito'),
(282, 'supplier_actual_ledger', 'Supplier Payment Ledger', 'Libro mayor de pagos a proveedores'),
(283, 'supplier_information', 'Supplier Information', 'Información del proveedor'),
(284, 'event', 'Event', 'Evento'),
(285, 'add_new_income', 'Add New Income', 'Agregar nuevos ingresos'),
(286, 'add_expese', 'Add Expense', 'Agregar gasto'),
(287, 'add_new_expense', 'Add New Expense', 'Agregar nuevo gasto'),
(288, 'total_inflow_ammount', 'Total Income Amount', 'Cantidad total de ingresos'),
(289, 'create_new_invoice', 'Create New Sale', 'Crear nueva venta'),
(290, 'create_pos_invoice', 'Create POS Sale', 'Crear venta de PDV'),
(291, 'total_profit', 'Total Profit', 'Beneficio total'),
(292, 'monthly_progress_report', 'Monthly Progress Report', 'Reporte de progreso mensual'),
(293, 'total_invoice', 'Total Sale', 'Venta total'),
(294, 'account_summary', 'Account Summary', 'Resumen de la cuenta'),
(295, 'total_supplier', 'Total Supplier', 'Proveedor total'),
(296, 'total_product', 'Total Product', 'Producto total'),
(297, 'total_customer', 'Total Customer', 'Cliente total'),
(298, 'supplier_edit', 'Supplier Edit', 'Editar proveedor'),
(299, 'add_new_invoice', 'Add New Sale', 'Agregar nueva venta'),
(300, 'new_purchase', 'New Expenses', 'nuevos gastos'),
(301, 'currency', 'Currency', 'Divisa'),
(302, 'currency_position', 'Currency Position', 'Posición de moneda'),
(303, 'left', 'Left', 'Izquierda'),
(304, 'right', 'Right', 'Bien'),
(305, 'add_tax', 'Add Tax', 'Añadir impuestos'),
(306, 'manage_tax', 'Manage Tax', 'Administrar impuestos'),
(307, 'add_new_tax', 'Add new tax', 'Añadir nuevo impuesto'),
(308, 'enter_tax', 'Enter Tax', 'Ingresar Impuesto'),
(309, 'already_exists', 'Already Exists !', 'Ya existe !'),
(310, 'successfully_inserted', 'Successfully Inserted.', 'Insertado con éxito.'),
(311, 'tax', 'Tax', 'Impuesto'),
(312, 'tax_edit', 'Tax Edit', 'Edición de impuestos'),
(313, 'product_not_added', 'Product not added !', '¡Producto no agregado!'),
(314, 'total_tax', 'Total Tax', 'Total impuestos'),
(315, 'manage_your_supplier_details', 'Manage your supplier details.', 'Gestionar los detalles de su proveedor.'),
(316, 'invoice_description', 'Lorem Ipsum is sim ply dummy Lorem Ipsum is simply dummy Lorem Ipsum is simply dummy Lorem Ipsum is simply dummy Lorem Ipsum is simply dummy Lorem Ipsum is sim ply dummy Lorem Ipsum is simply dummy Lorem Ipsum is simply dummy Lorem Ipsum is simply dummy Lorem Ipsum is simply dummy', 'Lorem Ipsum es simplemente un tonto Lorem Ipsum es simplemente un tonto Lorem Ipsum es simplemente un tonto Lorem Ipsum es simplemente un tonto Lorem Ipsum es simplemente un tonto Lorem Ipsum es simplemente un tonto Lorem Ipsum es simplemente un tonto Lorem Ipsum es simplemente un tonto Lorem Ipsum es simplemente un tonto Lorem Ipsum es simplemente un tonto es simplemente tonto'),
(317, 'thank_you_for_choosing_us', 'Thank you very much for choosing us.', 'Muchas gracias por elegirnos.'),
(318, 'billing_date', 'Billing Date', 'Fecha de facturación'),
(319, 'billing_to', 'Billing To', 'Facturación a'),
(320, 'billing_from', 'Billing From', 'Facturación desde'),
(321, 'you_cant_delete_this_product', 'Sorry !!  You cant delete this product.This product already used in calculation system!', 'Lo siento !! No puede eliminar este producto. ¡Este producto ya se usó en el sistema de cálculo!'),
(322, 'old_customer', 'Old Customer', 'Cliente antiguo'),
(323, 'new_customer', 'New Customer', 'Nuevo cliente'),
(324, 'new_supplier', 'New Supplier', 'Nuevo proveedor'),
(325, 'old_supplier', 'Old Supplier', 'Proveedor antiguo'),
(326, 'credit_customer', 'Credit Customer', 'Cliente de crédito'),
(327, 'account_already_exists', 'This Account Already Exists !', 'Esta cuenta ya existe !'),
(328, 'edit_income', 'Edit Income', 'Editar Ingresos'),
(329, 'you_are_not_access_this_part', 'You are not authorised person !', '¡Usted no es una persona autorizada!'),
(330, 'account_edit', 'Account Edit', 'Editar cuenta'),
(331, 'due', 'Due', 'Pendiente'),
(332, 'expense_edit', 'Expense Edit', 'Edición de gastos'),
(333, 'please_select_customer', 'Please select customer !', '¡Seleccione el cliente!'),
(334, 'profit_report', 'Profit Report (Sale Wise)', 'Informe de ganancias (venta sabia'),
(335, 'total_profit_report', 'Total profit report', 'Informe de ganancias totales'),
(336, 'please_enter_valid_captcha', 'Please enter valid captcha.', 'Por favor'),
(337, 'category_not_selected', 'Category not selected.', 'Categoría no seleccionada.'),
(338, 'supplier_not_selected', 'Supplier not selected.', 'Proveedor no seleccionado.'),
(339, 'please_select_product', 'Please select product.', 'Seleccione el producto.'),
(340, 'product_model_already_exist', 'Product model already exist !', 'El modelo del producto ya existe!'),
(341, 'invoice_logo', 'Sale Logo', 'Logotipo de venta'),
(342, 'available_qnty', 'Av. Qnty.', 'AV. Cant.'),
(343, 'you_can_not_buy_greater_than_available_cartoon', 'You can not select grater than available cartoon !', '¡No puedes seleccionar más rallador que los dibujos animados disponibles!'),
(344, 'customer_details', 'Customer details', 'Detalles del cliente'),
(345, 'manage_customer_details', 'Manage customer details.', 'Gestionar detalles del cliente'),
(346, 'site_key', 'Captcha Site Key', 'Clave del sitio de Captcha'),
(347, 'secret_key', 'Captcha Secret Key', 'Clave secreta de Captcha'),
(348, 'captcha', 'Captcha', 'captcha'),
(349, 'cartoon_quantity', 'Cartoon Quantity', 'Cantidad de dibujos animados'),
(350, 'total_cartoon', 'Total Cartoon', 'Caricatura total'),
(351, 'cartoon', 'Cartoon', 'Dibujos animados'),
(352, 'item_cartoon', 'Item/Cartoon', 'Objeto/Caricatura'),
(353, 'product_and_supplier_did_not_match', 'Product and supplier did not match !', '¡Producto y proveedor no coinciden!'),
(354, 'if_you_update_purchase_first_select_supplier_then_product_and_then_quantity', 'If you update purchase', 'Si actualizas la compra'),
(355, 'item', 'Item', 'Artículo'),
(356, 'manage_your_credit_customer', 'Manage your credit customer', 'Gestiona tu crédito cliente'),
(357, 'total_quantity', 'Total Quantity', 'Cantidad total'),
(358, 'quantity_per_cartoon', 'Quantity per cartoon', 'Cantidad por caricatura'),
(359, 'barcode_qrcode_scan_here', 'Barcode or QR-code scan here', 'Escaneo de código de barras o código QR aquí'),
(360, 'synchronizer_setting', 'Synchronizer Setting', 'Configuración del sincronizador'),
(361, 'data_synchronizer', 'Data Synchronizer', 'Sincronizador de datos'),
(362, 'hostname', 'Host name', 'Nombre de host'),
(363, 'username', 'User Name', 'Nombre de usuario'),
(364, 'ftp_port', 'FTP Port', 'Puerto FTP'),
(365, 'ftp_debug', 'FTP Debug', 'Depuración de FTP'),
(366, 'project_root', 'Project Root', 'Proyecto Raíz'),
(367, 'please_try_again', 'Please try again', 'Inténtalo de nuevo'),
(368, 'save_successfully', 'Save successfully', 'Guardar correctamente'),
(369, 'synchronize', 'Synchronize', 'Sincronizar'),
(370, 'internet_connection', 'Internet Connection', 'Conexión a Internet'),
(371, 'outgoing_file', 'Outgoing File', 'Archivo saliente'),
(372, 'incoming_file', 'Incoming File', 'Archivo entrante'),
(373, 'ok', 'Ok', 'De acuerdo'),
(374, 'not_available', 'Not Available', 'No disponible'),
(375, 'available', 'Available', 'Disponible'),
(376, 'download_data_from_server', 'Download data from server', 'Descargar datos del servidor'),
(377, 'data_import_to_database', 'Data import to database', 'Importación de datos a la base de datos'),
(378, 'data_upload_to_server', 'Data uplod to server', 'Subir datos al servidor'),
(379, 'please_wait', 'Please Wait', 'Espere por favor'),
(380, 'ooops_something_went_wrong', 'Oooops Something went wrong !', '¡Oooops'),
(381, 'upload_successfully', 'Upload successfully', 'Subir con éxito'),
(382, 'unable_to_upload_file_please_check_configuration', 'Unable to upload file please check configuration', 'No se puede cargar el archivo'),
(383, 'please_configure_synchronizer_settings', 'Please configure synchronizer settings', 'Configure los ajustes del sincronizador'),
(384, 'download_successfully', 'Download successfully', 'Descarga exitosa'),
(385, 'unable_to_download_file_please_check_configuration', 'Unable to download file please check configuration', 'No se puede descargar el archivo'),
(386, 'data_import_first', 'Data import past', 'Importación de datos pasada'),
(387, 'data_import_successfully', 'Data import successfully', 'Importación de datos exitosa'),
(388, 'unable_to_import_data_please_check_config_or_sql_file', 'Unable to import data please check config or sql file', 'No se pueden importar datos'),
(389, 'total_sale_ctn', 'Total Sale Ctn', 'Ctn de venta total'),
(390, 'in_qnty', 'In Qnty.', 'En cantidad.'),
(391, 'out_qnty', 'Out Qnty.', 'Cantidad agotada.'),
(392, 'stock_report_supplier_wise', 'Stock Report (Supplier Wise)', 'Informe de existencias (proveedor inteligente'),
(393, 'all_stock_report_supplier_wise', 'Stock Report (Suppler Wise)', 'Informe de existencias (Suppler Wise'),
(394, 'select_supplier', 'Select Supplier', 'Seleccionar proveedor'),
(395, 'stock_report_product_wise', 'Stock Report (Product Wise)', 'Informe de existencias (producto inteligente'),
(396, 'phone', 'Phone', 'Teléfono'),
(397, 'select_product', 'Select Product', 'Seleccionar producto'),
(398, 'in_quantity', 'In Qnty.', 'En cantidad.'),
(399, 'out_quantity', 'Out Qnty.', 'Cantidad agotada.'),
(400, 'in_taka', 'In TK.', 'En conocimientos tradicionales'),
(401, 'out_taka', 'Out TK.', 'Fuera TK.'),
(402, 'commission', 'Commission', 'Comisión'),
(403, 'generate_commission', 'Generate Commssion', 'Generar comisión'),
(404, 'commission_rate', 'Commission Rate', 'Porcentaje de comision'),
(405, 'total_ctn', 'Total Ctn.', 'Caja Total'),
(406, 'per_pcs_commission', 'Per PCS Commission', 'Comisión por PCS'),
(407, 'total_commission', 'Total Commission', 'Comisión total'),
(408, 'enter', 'Enter', 'Ingresar'),
(409, 'please_add_walking_customer_for_default_customer', 'Please add Walking Customer for default customer.', 'Agregue Walking Customer como cliente predeterminado.'),
(410, 'supplier_ammount', 'Supplier Amount', 'Cantidad del proveedor'),
(411, 'my_sale_ammount', 'My Sale Amount', 'Monto de mi venta'),
(412, 'signature_pic', 'Signature Picture', 'Imagen de la firma'),
(413, 'branch', 'Branch', 'Rama'),
(414, 'ac_no', 'A/C Number', 'Número de aire acondicionado'),
(415, 'ac_name', 'A/C Name', 'Nombre del aire acondicionado'),
(416, 'bank_transaction', 'Bank Transaction', 'Transacción bancaria'),
(417, 'bank', 'Bank', 'Banco'),
(418, 'withdraw_deposite_id', 'Withdraw / Deposite ID', 'Retirar / Depositar DNI'),
(419, 'bank_ledger', 'Bank Ledger', 'Libro mayor bancario'),
(420, 'note_name', 'Note Name', 'Nombre de la nota'),
(421, 'pcs', 'Pcs.', 'Uds.'),
(422, '1', '1', '1'),
(423, '2', '2', '2'),
(424, '5', '5', '5'),
(425, '10', '10', '10'),
(426, '20', '20', '20'),
(427, '50', '50', '50'),
(428, '100', '100', '100'),
(429, '500', '500', '500'),
(430, '1000', '1000', '1000'),
(431, 'total_discount', 'Total Discount', 'Descuento total'),
(432, 'product_not_found', 'Product not found !', 'Producto no encontrado !'),
(433, 'this_is_not_credit_customer', 'This is not credit customer !', '¡Este no es un cliente de crédito!'),
(434, 'personal_loan', 'Personal Loan', 'Préstamo personal'),
(435, 'add_person', 'Add Person', 'Agregar persona'),
(436, 'add_loan', 'Add Loan', 'Añadir préstamo'),
(437, 'add_payment', 'Add Payment', 'Agregar pago'),
(438, 'manage_person', 'Manage Person', 'Administrar persona'),
(439, 'personal_edit', 'Person Edit', 'Editar persona'),
(440, 'person_ledger', 'Person Ledger', 'Libro mayor de personas'),
(441, 'backup_restore', 'Backup', 'Respaldo'),
(442, 'database_backup', 'Database backup', 'Copia de seguridad de la base de datos'),
(443, 'file_information', 'File information', 'Informacion del archivo'),
(444, 'filename', 'Filename', 'Nombre del archivo'),
(445, 'size', 'Size', 'Tamaño'),
(446, 'backup_date', 'Backup date', 'Fecha de copia de seguridad'),
(447, 'backup_now', 'Backup now', 'Copia ahora'),
(448, 'restore_now', 'Restore now', 'Restaurar ahora'),
(449, 'are_you_sure', 'Are you sure ?', 'Está seguro ?'),
(450, 'download', 'Download', 'Descargar'),
(451, 'backup_and_restore', 'Backup', 'Respaldo'),
(452, 'backup_successfully', 'Backup successfully', 'Copia de seguridad exitosa'),
(453, 'delete_successfully', 'Delete successfully', 'Eliminar con éxito'),
(454, 'stock_ctn', 'Stock/Qnt', 'Existencias/Qnt'),
(455, 'unit', 'Unit', 'Unidad'),
(456, 'meter_m', 'Meter (M)', 'Metro (M'),
(457, 'piece_pc', 'Piece (Pc)', 'Pieza (Pc'),
(458, 'kilogram_kg', 'Kilogram (Kg)', 'Kilogramo (Kg'),
(459, 'stock_cartoon', 'Stock Cartoon', 'Caricatura de acciones'),
(460, 'add_product_csv', 'Add Product (CSV)', 'Agregar producto (CSV'),
(461, 'import_product_csv', 'Import product (CSV)', 'Importar producto (CSV'),
(462, 'close', 'Close', 'Cerca'),
(463, 'download_example_file', 'Download example file.', 'Descargar archivo de ejemplo.'),
(464, 'upload_csv_file', 'Upload CSV File', 'Subir archivo CSV'),
(465, 'csv_file_informaion', 'CSV File Information', 'Información del archivo CSV'),
(466, 'out_of_stock', 'Out Of Stock', 'Agotado'),
(467, 'others', 'Others', 'Otros'),
(468, 'full_paid', 'Full Paid', 'Pago completo'),
(469, 'successfully_saved', 'Your Data Successfully Saved', 'Sus datos se guardaron con éxito'),
(470, 'manage_loan', 'Manage Loan', 'Administrar préstamo'),
(471, 'receipt', 'Receipt', 'Recibo'),
(472, 'payment', 'Payment', 'Pago'),
(473, 'cashflow', 'Daily Cash Flow', 'Flujo de caja diario'),
(474, 'signature', 'Signature', 'Firma'),
(475, 'supplier_reports', 'Supplier Reports', 'Informes de proveedores'),
(476, 'generate', 'Generate', 'Generar'),
(477, 'todays_overview', 'Todays Overview', 'Resumen de hoy'),
(478, 'last_sales', 'Last Sales', 'Últimas ventas'),
(479, 'manage_transaction', 'Manage Transaction', 'Gestionar transacción'),
(480, 'daily_summary', 'Daily Summary', 'Resumen diario'),
(481, 'daily_cash_flow', 'Daily Cash Flow', 'Flujo de caja diario'),
(482, 'custom_report', 'Custom Report', 'Informe personalizado'),
(483, 'transaction', 'Transaction', 'Transacción'),
(484, 'receipt_amount', 'Receipt Amount', 'Importe del recibo'),
(485, 'transaction_details_datewise', 'Transaction Details Datewise', 'Detalles de la transacción por fecha'),
(486, 'cash_closing', 'Cash Closing', 'Cierre de caja'),
(487, 'you_can_not_buy_greater_than_available_qnty', 'You can not buy greater than available qnty.', 'No se puede comprar una cantidad superior a la disponible.'),
(488, 'supplier_id', 'Supplier ID', 'Identificación del proveedor'),
(489, 'category_id', 'Category ID', 'Categoria ID'),
(490, 'select_report', 'Select Report', 'Seleccionar informe'),
(491, 'supplier_summary', 'Supplier summary', 'Resumen de proveedores'),
(492, 'sales_payment_actual', 'Sales payment actual', 'Pago de ventas real'),
(493, 'today_already_closed', 'Today already closed.', 'Hoy ya cerrado.'),
(494, 'root_account', 'Root Account', 'Cuenta raíz'),
(495, 'office', 'Office', 'Oficina'),
(496, 'loan', 'Loan', 'Préstamo'),
(497, 'transaction_mood', 'Transaction Mood', 'Estado de ánimo de transacción'),
(498, 'select_account', 'Select Account', 'Seleccionar cuenta'),
(499, 'add_receipt', 'Add Receipt', 'Agregar recibo'),
(500, 'update_transaction', 'Update Transaction', 'Actualizar transacción'),
(501, 'no_stock_found', 'No Stock Found !', '¡No se encontraron existencias!'),
(502, 'admin_login_area', 'Admin Login Area', 'Área de inicio de sesión de administrador'),
(503, 'print_qr_code', 'Print QR Code', 'Imprimir código QR'),
(504, 'discount_type', 'Discount Type', 'Tipo de descuento'),
(505, 'discount_percentage', 'Discount', 'Descuento'),
(506, 'fixed_dis', 'Fixed Dis.', 'Dis fijo'),
(507, 'return', 'Return', 'Devolver'),
(508, 'stock_return_list', 'Stock Return List', 'Lista de devolución de existencias'),
(509, 'wastage_return_list', 'Wastage Return List', 'Lista de devolución de desperdicios'),
(510, 'return_invoice', 'Sale Return', 'Devolución de venta'),
(511, 'sold_qty', 'Sold Qty', 'Cantidad vendida'),
(512, 'ret_quantity', 'Return Qty', 'Cantidad de devolución'),
(513, 'deduction', 'Deduction', 'Deducción'),
(514, 'check_return', 'Check Return', 'Devolución de cheques'),
(515, 'reason', 'Reason', 'Razón'),
(516, 'usablilties', 'Usability', 'Usabilidad'),
(517, 'adjs_with_stck', 'Adjust With Stock', 'Ajustar con existencias'),
(518, 'return_to_supplier', 'Return To Supplier', 'Devolver al proveedor'),
(519, 'wastage', 'Wastage', 'Pérdida'),
(520, 'to_deduction', 'Total Deduction', 'Deducción total'),
(521, 'nt_return', 'Net Return Amount', 'Cantidad de devolución neta'),
(522, 'return_list', 'Return List', 'Lista de devolución'),
(523, 'add_return', 'Add Return', 'Añadir devolución'),
(524, 'per_qty', 'Purchase Qty', 'Cantidad de compra'),
(525, 'return_supplier', 'Supplier Return', 'Devolución del proveedor'),
(526, 'stock_purchase', 'Stock Purchase Price', 'Precio de compra de acciones'),
(527, 'stock_sale', 'Stock Sale Price', 'Precio de venta de acciones'),
(528, 'supplier_return', 'Supplier Return', 'Devolución del proveedor'),
(529, 'purchase_id', 'Purchase ID', 'ID de compra'),
(530, 'return_id', 'Return ID', 'Identificación de retorno'),
(531, 'supplier_return_list', 'Supplier Return List', 'Lista de devoluciones de proveedores'),
(532, 'c_r_slist', 'Stock Return Stock', 'Devolución de existencias'),
(533, 'wastage_list', 'Wastage List', 'Lista de desperdicios'),
(534, 'please_input_correct_invoice_id', 'Please Input a Correct Sale ID', 'Ingrese una identificación de venta correcta'),
(535, 'please_input_correct_purchase_id', 'Please Input Your Correct  Purchase ID', 'Ingrese su ID de compra correcto'),
(536, 'add_more', 'Add More', 'Añadir más'),
(537, 'prouct_details', 'Product Details', 'Detalles de producto'),
(538, 'prouct_detail', 'Product Details', 'Detalles de producto'),
(539, 'stock_return', 'Stock Return', 'Devolución de stock'),
(540, 'choose_transaction', 'Select Transaction', 'Seleccionar transacción'),
(541, 'transection_category', 'Select  Category', 'Selecciona una categoría'),
(542, 'transaction_categry', 'Select Category', 'Selecciona una categoría'),
(543, 'search_supplier', 'Search Supplier', 'Buscar proveedor'),
(544, 'customer_id', 'Customer ID', 'Identificación del cliente'),
(545, 'search_customer', 'Search Customer Invoice', 'Buscar factura de cliente'),
(546, 'serial_no', 'SN', 'SN'),
(547, 'item_discount', 'Item Discount', 'Descuento de artículo'),
(548, 'invoice_discount', 'Sale Discount', 'Descuento de venta'),
(549, 'add_unit', 'Add Unit', 'Agregar unidad'),
(550, 'manage_unit', 'Manage Unit', 'Gestionar unidad'),
(551, 'add_new_unit', 'Add New Unit', 'Agregar nueva unidad'),
(552, 'unit_name', 'Unit Name', 'Nombre de la unidad'),
(553, 'payment_amount', 'Payment Amount', 'Monto del pago'),
(554, 'manage_your_unit', 'Manage Your Unit', 'Gestiona tu unidad'),
(555, 'unit_id', 'Unit ID', 'Identificación de la unidad'),
(556, 'unit_edit', 'Unit Edit', 'Edición de unidad'),
(557, 'vat', 'Vat', 'IVA'),
(558, 'sales_report_category_wise', 'Sales Report (Category wise)', 'Informe de ventas (categoría sabia'),
(559, 'purchase_report_category_wise', 'Expenses Report (Category wise)', 'Informe de gastos (por categoría'),
(560, 'category_wise_purchase_report', 'Category wise purchase report', 'Informe de compra por categoría'),
(561, 'category_wise_sales_report', 'Category wise sales report', 'Informe de ventas por categoría'),
(562, 'best_sale_product', 'Best Sale Product', 'Mejor producto de venta'),
(563, 'all_best_sales_product', 'All Best Sales Products', 'Todos los mejores productos de venta'),
(564, 'todays_customer_receipt', 'Todays Customer Receipt', 'Recibo de cliente de hoy'),
(565, 'not_found', 'Record not found', 'Registro no encontrado'),
(566, 'collection', 'Collection', 'Recopilación'),
(567, 'increment', 'Increment', 'Incremento'),
(568, 'accounts_tree_view', 'Accounts Tree View', 'Vista de árbol de cuentas'),
(569, 'debit_voucher', 'Debit Voucher', 'Comprobante de débito'),
(570, 'voucher_no', 'Voucher No', 'Vale No'),
(571, 'credit_account_head', 'Credit Account Head', 'Cabeza de cuenta de crédito'),
(572, 'remark', 'Remark', 'Observación'),
(573, 'code', 'Code', 'Código'),
(574, 'amount', 'Amount', 'Cantidad'),
(575, 'approved', 'Approved', 'Aprobado'),
(576, 'debit_account_head', 'Debit Account Head', 'Cabeza de cuenta de débito'),
(577, 'credit_voucher', 'Credit Voucher', 'Vale de crédito'),
(578, 'find', 'Find', 'Encontrar'),
(579, 'transaction_date', 'Transaction Date', 'Fecha de Transacción'),
(580, 'voucher_type', 'Voucher Type', 'Tipo de vale'),
(581, 'particulars', 'Particulars', 'Informe detallado'),
(582, 'with_details', 'With Details', 'Con detalles'),
(583, 'general_ledger', 'General Ledger', 'Libro mayor'),
(584, 'general_ledger_of', 'General ledger of', 'Libro mayor de'),
(585, 'pre_balance', 'Pre Balance', 'Balance previo'),
(586, 'current_balance', 'Current Balance', 'Saldo actual'),
(587, 'to_date', 'To Date', 'Hasta la fecha'),
(588, 'from_date', 'From Date', 'Partir de la fecha'),
(589, 'trial_balance', 'Trial Balance', 'Balance de prueba'),
(590, 'authorized_signature', 'Authorized Signature', 'Firma autorizada'),
(591, 'chairman', 'Chairman', 'Presidente'),
(592, 'total_income', 'Total Income', 'Ingresos totales'),
(593, 'statement_of_comprehensive_income', 'Statement of Comprehensive Income', 'Estado del resultado integral'),
(594, 'profit_loss', 'Profit Loss', 'Pérdida de beneficios'),
(595, 'cash_flow_report', 'Cash Flow Report', 'Informe de flujo de caja'),
(596, 'cash_flow_statement', 'Cash Flow Statement', 'Estado de Flujo de Efectivo'),
(597, 'amount_in_dollar', 'Amount In Dollar', 'Cantidad en dólares'),
(598, 'opening_cash_and_equivalent', 'Opening Cash and Equivalent', 'Efectivo de Apertura y Equivalente'),
(599, 'coa_print', 'Coa Print', 'Coa Imprimir'),
(600, 'cash_flow', 'Cash Flow', 'Flujo de fondos'),
(601, 'cash_book', 'Cash Book', 'Libro de pago'),
(602, 'bank_book', 'Bank Book', 'Banco de libros'),
(603, 'c_o_a', 'Chart of Account', 'Plan de cuentas'),
(604, 'journal_voucher', 'Journal Voucher', 'Documento preliminar'),
(605, 'contra_voucher', 'Contra Voucher', 'Vale Contra'),
(606, 'voucher_approval', 'Vouchar Approval', 'Aprobación de vales'),
(607, 'supplier_payment', 'Supplier Payment', 'Pago del proveedor'),
(608, 'customer_receive', 'Customer Receive', 'Recepción del cliente'),
(609, 'gl_head', 'General Head', 'jefe general'),
(610, 'account_code', 'Account Head', 'Jefe de cuenta'),
(611, 'opening_balance', 'Opening Balance', 'Saldo de apertura'),
(612, 'head_of_account', 'Head of Account', 'Jefe de Cuenta'),
(613, 'inventory_ledger', 'Inventory Ledger', 'Libro mayor de inventario'),
(614, 'newpassword', 'New Password', 'Nueva contraseña'),
(615, 'password_recovery', 'Password Recovery', 'Recuperación de contraseña'),
(616, 'forgot_password', 'Forgot Password ??', 'Has olvidado tu contraseña ??'),
(617, 'send', 'Send', 'Enviar'),
(618, 'due_report', 'Due Report', 'Informe debido'),
(619, 'due_amount', 'Due Amount', 'Cantidad debida'),
(620, 'download_sample_file', 'Download Sample File', 'Descargar archivo de muestra'),
(621, 'customer_csv_upload', 'Customer Csv Upload', 'Carga de Csv del cliente'),
(622, 'csv_supplier', 'Csv Upload Supplier', 'Proveedor de carga de CSV'),
(623, 'csv_upload_supplier', 'Csv Upload Supplier', 'Proveedor de carga de CSV'),
(624, 'previous', 'Previous', 'Anterior'),
(625, 'net_total', 'Net Total', 'Total neto'),
(626, 'currency_list', 'Currency List', 'Lista de divisas'),
(627, 'currency_name', 'Currency Name', 'Nombre de moneda'),
(628, 'currency_icon', 'Currency Symbol', 'Símbolo de moneda'),
(629, 'add_currency', 'Add Currency', 'Agregar moneda'),
(630, 'role_permission', 'Role Permission', 'Permiso de rol'),
(631, 'role_list', 'Role List', 'Lista de funciones'),
(632, 'user_assign_role', 'User Assign Role', 'Rol de asignación de usuario'),
(633, 'permission', 'Permission', 'Permiso'),
(634, 'add_role', 'Add Role', 'Agregar rol'),
(635, 'add_module', 'Add Module', 'Agregar módulo'),
(636, 'module_name', 'Module Name', 'Nombre del módulo'),
(637, 'office_loan', 'Office Loan', 'Préstamo de oficina'),
(638, 'add_menu', 'Add Menu', 'Añadir menú'),
(639, 'menu_name', 'Menu Name', 'Nombre del menú'),
(640, 'sl_no', 'Sl No', 'Si. No'),
(641, 'create', 'Create', 'Crear'),
(642, 'read', 'Read', 'Leer'),
(643, 'role_name', 'Role Name', 'Nombre de rol'),
(644, 'qty', 'Quantity', 'Cantidad'),
(645, 'max_rate', 'Max Rate', 'Máxima calificación'),
(646, 'min_rate', 'Min Rate', 'Tarifa mínima'),
(647, 'avg_rate', 'Average Rate', 'Tasa promedio'),
(648, 'role_permission_added_successfully', 'Role Permission Successfully Added', 'Permiso de función añadido con éxito'),
(649, 'update_successfully', 'Successfully Updated', 'Actualizado exitosamente'),
(650, 'role_permission_updated_successfully', 'Role Permission Successfully Updated', 'Permiso de función actualizado con éxito'),
(651, 'shipping_cost', 'Shipping Cost', 'Costo de envío'),
(652, 'in_word', 'In Word', 'En palabra'),
(653, 'shipping_cost_report', 'Shipping Cost Report', 'Informe de gastos de envío'),
(654, 'cash_book_report', 'Cash Book Report', 'Informe de libro de caja'),
(655, 'inventory_ledger_report', 'Inventory Ledger Report', 'Informe del libro mayor de inventario'),
(656, 'trial_balance_with_opening_as_on', 'Trial Balance With Opening As On', 'Balance de prueba con apertura como encendido'),
(657, 'type', 'Type', 'Tipo'),
(658, 'taka_only', 'Taka Only', 'Solo Taka'),
(659, 'item_description', 'Desc', 'desc'),
(660, 'sold_by', 'Sold By', 'Vendido por'),
(661, 'user_wise_sales_report', 'User Wise Sales Report', 'Informe de ventas inteligente del usuario'),
(662, 'user_name', 'User Name', 'Nombre de usuario'),
(663, 'total_sold', 'Total Sold', 'Total vendido'),
(664, 'user_wise_sale_report', 'User Wise Sales Report', 'Informe de ventas inteligente del usuario'),
(665, 'barcode_or_qrcode', 'Barcode/QR-code', 'Código de barras/código QR'),
(666, 'category_csv_upload', 'Category Csv  Upload', 'Categoría Csv Subir'),
(667, 'unit_csv_upload', 'Unit Csv Upload', 'Subir Csv de unidad'),
(668, 'invoice_return_list', 'Sales Return list', 'Lista de devolución de ventas'),
(669, 'invoice_return', 'Sales Return', 'Devolución de ventas'),
(670, 'tax_report', 'Tax Report', 'Informe fiscal'),
(671, 'select_tax', 'Select Tax', 'Seleccionar Impuesto'),
(672, 'hrm', 'HRM', 'HRM'),
(673, 'employee', 'Employee', 'Empleado'),
(674, 'add_employee', 'Add Employee', 'Agregar empleado'),
(675, 'manage_employee', 'Manage Employee', 'Administrar empleado'),
(676, 'attendance', 'Attendance', 'Asistencia'),
(677, 'add_attendance', 'Attendance', 'Asistencia'),
(678, 'manage_attendance', 'Manage Attendance', 'Gestionar asistencia'),
(679, 'payroll', 'Payroll', 'Nómina de sueldos'),
(680, 'add_payroll', 'Payroll', 'Nómina de sueldos'),
(681, 'manage_payroll', 'Manage Payroll', 'Gestionar nómina'),
(682, 'employee_type', 'Employee Type', 'Tipo de empleado'),
(683, 'employee_designation', 'Employee Designation', 'Designación de empleado'),
(684, 'designation', 'Designation', 'Designación'),
(685, 'add_designation', 'Add Designation', 'Añadir Designación'),
(686, 'manage_designation', 'Manage Designation', 'Gestionar designación'),
(687, 'designation_update_form', 'Designation Update form', 'Formulario de actualización de designación'),
(688, 'picture', 'Picture', 'Imagen'),
(689, 'country', 'Country', 'País'),
(690, 'blood_group', 'Blood Group', 'Grupo sanguíneo'),
(691, 'address_line_1', 'Address Line 1', 'Dirección Línea 1'),
(692, 'address_line_2', 'Address Line 2', 'Línea de dirección 2'),
(693, 'zip', 'Zip code', 'Código postal'),
(694, 'city', 'City', 'Ciudad'),
(695, 'hour_rate_or_salary', 'Houre Rate/Salary', 'Tarifa por hora/Salario'),
(696, 'rate_type', 'Rate Type', 'Tipo de cambio'),
(697, 'hourly', 'Hourly', 'Cada hora'),
(698, 'salary', 'Salary', 'Salario'),
(699, 'employee_update', 'Employee Update', 'Actualización del empleado'),
(700, 'checkin', 'Check In', 'Registrarse'),
(701, 'employee_name', 'Employee Name', 'Nombre de empleado'),
(702, 'checkout', 'Check Out', 'Verificar'),
(703, 'confirm_clock', 'Confirm Clock', 'Confirmar reloj'),
(704, 'stay', 'Stay Time', 'Tiempo de permanencia'),
(705, 'sign_in', 'Sign In', 'Iniciar sesión'),
(706, 'check_in', 'Check In', 'Registrarse'),
(707, 'single_checkin', 'Single Check In', 'Registro único'),
(708, 'bulk_checkin', 'Bulk Check In', 'Registro masivo'),
(709, 'successfully_checkout', 'Successfully Checkout', 'Pagar con éxito'),
(710, 'attendance_report', 'Attendance Report', 'Reporte de asistencia'),
(711, 'datewise_report', 'Date Wise Report', 'Informe inteligente de fechas'),
(712, 'employee_wise_report', 'Employee Wise Report', 'Informe inteligente del empleado'),
(713, 'date_in_time_report', 'Date In Time Report', 'Informe de fecha en el tiempo'),
(714, 'request', 'Request', 'Pedido'),
(715, 'sign_out', 'Sign Out', 'Desconectar'),
(716, 'work_hour', 'Work Hours', 'Horas laborales'),
(717, 's_time', 'Start Time', 'Hora de inicio'),
(718, 'e_time', 'In Time', 'A tiempo'),
(719, 'salary_benefits_type', 'Benefits Type', 'Tipo de beneficios'),
(720, 'salary_benefits', 'Salary Benefits', 'Beneficios salariales'),
(721, 'beneficial_list', 'Benefit List', 'Lista de beneficios'),
(722, 'add_beneficial', 'Add Benefits', 'Agregar beneficios'),
(723, 'add_benefits', 'Add Benefits', 'Agregar beneficios'),
(724, 'benefits_list', 'Benefit List', 'Lista de beneficios'),
(725, 'benefit_type', 'Benefit Type', 'Tipo de beneficio'),
(726, 'benefits', 'Benefit', 'Beneficio'),
(727, 'manage_benefits', 'Manage Benefits', 'Administrar beneficios'),
(728, 'deduct', 'Deduct', 'Deducir'),
(729, 'add', 'Add', 'Agregar'),
(730, 'add_salary_setup', 'Add Salary Setup', 'Agregar configuración de salario'),
(731, 'manage_salary_setup', 'Manage Salary Setup', 'Administrar configuración de salario'),
(732, 'basic', 'Basic', 'Básico'),
(733, 'salary_type', 'Salary Type', 'Tipo de salario'),
(734, 'addition', 'Addition', 'Suma'),
(735, 'gross_salary', 'Gross Salary', 'Salario bruto'),
(736, '`phrase`', '`english`', '`spanish`'),
(737, 'set', 'Set', 'Colocar'),
(738, 'salary_generate', 'Salary Generate', 'Generar salario'),
(739, 'manage_salary_generate', 'Manage Salary Generate', 'Gestionar salario generar'),
(740, 'sal_name', 'Salary Name', 'Nombre del salario'),
(741, 'gdate', 'Generated Date', 'Fecha de generación'),
(742, 'generate_by', 'Generated By', 'Generado por'),
(743, 'the_salary_of', 'The Salary of', 'El salario de'),
(744, 'already_generated', 'Already Generated', 'Ya generado'),
(745, 'salary_month', 'Salary Month', 'Mes de salario'),
(746, 'successfully_generated', 'Successfully Generated', 'Generado con éxito'),
(747, 'salary_payment', 'Salary Payment', 'Pago de salario'),
(748, 'employee_salary_payment', 'Employee Salary Payment', 'Pago del salario del empleado'),
(749, 'total_salary', 'Total Salary', 'Salario total'),
(750, 'total_working_minutes', 'Total Working Hours', 'Horas totales de trabajo'),
(751, 'working_period', 'Working Period', 'Período de trabajo'),
(752, 'paid_by', 'Paid By', 'Pagado por'),
(753, 'pay_now', 'Pay Now', 'Pagar ahora'),
(754, 'confirm', 'Confirm', 'Confirmar'),
(755, 'successfully_paid', 'Successfully Paid', 'Pagado con éxito'),
(756, 'add_incometax', 'Add Income Tax', 'Añadir Impuesto Sobre la Renta'),
(757, 'setup_tax', 'Setup Tax', 'Impuesto de instalación'),
(758, 'start_amount', 'Start Amount', 'Cantidad inicial'),
(759, 'end_amount', 'End Amount', 'Cantidad final'),
(760, 'tax_rate', 'Tax Rate', 'Tasa de impuesto'),
(761, 'setup', 'Setup', 'Configuración'),
(762, 'manage_income_tax', 'Manage Income Tax', 'Gestionar Impuesto sobre la Renta'),
(763, 'income_tax_updateform', 'Income tax Update form', 'Formulario de actualización de IRPF'),
(764, 'positional_information', 'Positional Information', 'Información posicional'),
(765, 'personal_information', 'Personal Information', 'Informacion personal'),
(766, 'timezone', 'Time Zone', 'Zona horaria'),
(767, 'sms', 'SMS', 'SMS'),
(768, 'sms_configure', 'SMS Configure', 'Configurar SMS'),
(769, 'url', 'URL', 'URL'),
(770, 'sender_id', 'Sender ID', 'Identificación del remitente'),
(771, 'api_key', 'Api Key', 'Clave API'),
(772, 'gui_pos', 'GUI POS', 'GUI TPV'),
(773, 'manage_service', 'Manage Service', 'Administrar servicio'),
(774, 'service', 'Service', 'Servicio'),
(775, 'add_service', 'Add Service', 'Agregar servicio'),
(776, 'service_edit', 'Service Edit', 'Editar servicio'),
(777, 'service_csv_upload', 'Service CSV Upload', 'Carga de CSV de servicio'),
(778, 'service_name', 'Service Name', 'Nombre del Servicio'),
(779, 'charge', 'Charge', 'Cargar'),
(780, 'service_invoice', 'Service Invoice', 'Factura de servicio'),
(781, 'service_discount', 'Service Discount', 'Descuento de servicio'),
(782, 'hanging_over', 'ETD', 'ETD'),
(783, 'service_details', 'Service Details', 'Detalles del servicio'),
(784, 'tax_settings', 'Tax Settings', 'Configuración de impuestos'),
(785, 'default_value', 'Default Value', 'Valor por defecto'),
(786, 'number_of_tax', 'Number of Tax', 'Número de Impuesto'),
(787, 'please_select_employee', 'Please Select Employee', 'Seleccione empleado'),
(788, 'manage_service_invoice', 'Manage Service Invoice', 'Gestionar Factura de Servicio'),
(789, 'update_service_invoice', 'Update Service Invoice', 'Actualizar Factura de Servicio'),
(790, 'customer_wise_tax_report', 'Customer Wise  Tax Report', 'Informe de impuestos inteligente del cliente'),
(791, 'service_id', 'Service Id', 'Identificador de servicio'),
(792, 'invoice_wise_tax_report', 'Invoice Wise Tax Report', 'Informe fiscal inteligente de facturas'),
(793, 'reg_no', 'Reg No', 'Nº de registro'),
(794, 'update_now', 'Update Now', 'Actualizar ahora'),
(795, 'import', 'Import', 'Importar'),
(796, 'add_expense_item', 'Add Expense Item', 'Añadir elemento de gasto'),
(797, 'manage_expense_item', 'Manage Expense Item', 'Gestionar artículo de gastos'),
(798, 'add_expense', 'Add Expense', 'Agregar gasto'),
(799, 'manage_expense', 'Manage Expense', 'Administrar gastos');
INSERT INTO `language` (`id`, `phrase`, `english`, `spanish`) VALUES
(800, 'expense_statement', 'Expense Statement', 'Declaración de gastos'),
(801, 'expense_type', 'Expense Type', 'Tipo de gasto'),
(802, 'expense_item_name', 'Expense Item Name', 'Nombre del elemento de gasto'),
(803, 'stock_purchase_price', 'Stock Purchase Price', 'Precio de compra de acciones'),
(804, 'purchase_price', 'Expenses Price', 'Precio de gastos'),
(805, 'customer_advance', 'Customer Advance', 'Anticipo del cliente'),
(806, 'advance_type', 'Advance Type', 'Tipo avanzado'),
(807, 'restore', 'Restore', 'Restaurar'),
(808, 'supplier_advance', 'Supplier Advance', 'Anticipo del proveedor'),
(809, 'please_input_correct_invoice_no', 'Please Input Correct Invoice NO', 'Ingrese la factura correcta NO'),
(810, 'backup', 'Back Up', 'Respaldo'),
(811, 'app_setting', 'App Settings', 'Ajustes de Aplicacion'),
(812, 'local_server_url', 'Local Server Url', 'URL del servidor local'),
(813, 'online_server_url', 'Online Server Url', 'URL del servidor en línea'),
(814, 'connet_url', 'Connected Hotspot Ip/url', 'IP/url de punto de acceso conectado'),
(815, 'update_your_app_setting', 'Update Your App Setting', 'Actualiza la configuración de tu aplicación'),
(816, 'select_category', 'Select Category', 'Selecciona una categoría'),
(817, 'mini_invoice', 'Mini Invoice', 'Mini Factura'),
(818, 'purchase_details', 'Expenses Details', 'Detalles de gastos'),
(819, 'disc', 'Dis %', 'Dis %'),
(820, 'serial', 'Serial', 'De serie'),
(821, 'transaction_head', 'Transaction Head', 'Cabeza de transacción'),
(822, 'transaction_type', 'Transaction Type', 'Tipo de transacción'),
(823, 'return_details', 'Return Details', 'Detalles de devolución'),
(824, 'return_to_customer', 'Return To Customer', 'Devolver al cliente'),
(825, 'sales_and_purchase_report_summary', 'Sales And Expenses Report Summary', 'Resumen del Informe de Ventas y Gastos'),
(826, 'add_person_officeloan', 'Add Person (Office Loan)', 'Agregar persona (préstamo de oficina'),
(827, 'add_loan_officeloan', 'Add Loan (Office Loan)', 'Agregar préstamo (préstamo de oficina'),
(828, 'add_payment_officeloan', 'Add Payment (Office Loan)', 'Agregar pago (préstamo de oficina'),
(829, 'manage_loan_officeloan', 'Manage Loan (Office Loan)', 'Administrar préstamo (préstamo de oficina'),
(830, 'add_person_personalloan', 'Add Person (Personal Loan)', 'Agregar persona (préstamo personal'),
(831, 'add_loan_personalloan', 'Add Loan (Personal Loan)', 'Agregar préstamo (préstamo personal'),
(832, 'add_payment_personalloan', 'Add Payment (Personal Loan)', 'Agregar Pago (Préstamo Personal'),
(833, 'manage_loan_personalloan', 'Manage Loan (Personal)', 'Administrar préstamo (personal'),
(834, 'hrm_management', 'Human Resource', 'Recursos humanos'),
(835, 'cash_adjustment', 'Cash Adjustment', 'Ajuste de efectivo'),
(836, 'adjustment_type', 'Adjustment Type', 'Tipo de ajuste'),
(837, 'change', 'Change', 'Cambiar'),
(838, 'sale_by', 'Sale By', 'Venta por'),
(839, 'salary_date', 'Salary Date', 'Fecha de salario'),
(840, 'earnings', 'Earnings', 'Ganancias'),
(841, 'total_addition', 'Total Addition', 'Adición total'),
(842, 'total_deduction', 'Total Deduction', 'Deducción total'),
(843, 'net_salary', 'Net Salary', 'Sueldo neto'),
(844, 'ref_number', 'Reference Number', 'Número de referencia'),
(845, 'name_of_bank', 'Name Of Bank', 'Nombre del banco'),
(846, 'salary_slip', 'Salary Slip', 'Nómina'),
(847, 'basic_salary', 'Basic Salary', 'Salario base'),
(848, 'return_from_customer', 'Return From Customer', 'Devolución del cliente'),
(849, 'quotation', 'Quotation', 'Cotización'),
(850, 'add_quotation', 'Add Quotation', 'Agregar cotización'),
(851, 'manage_quotation', 'Manage Quotation', 'Gestionar cotización'),
(852, 'terms', 'Terms', 'Términos'),
(853, 'send_to_customer', 'Sent To Customer', 'Enviado al cliente'),
(854, 'quotation_no', 'Quotation No', 'Cita No'),
(855, 'quotation_date', 'Quotation Date', 'Fecha de cotización'),
(856, 'total_service_tax', 'Total Service Tax', 'Impuesto de servicio total'),
(857, 'totalservicedicount', 'Total Service Discount', 'Descuento de servicio total'),
(858, 'item_total', 'Item Total', 'Total'),
(859, 'service_total', 'Service Total', 'Total de servicio'),
(860, 'quot_description', 'Quotation Description', 'Descripción de cotización'),
(861, 'sub_total', 'Sub Total', 'Subtotal'),
(862, 'mail_setting', 'Mail Setting', 'Configuración de correo'),
(863, 'mail_configuration', 'Mail Configuration', 'Configuración de correo'),
(864, 'mail', 'Mail', 'Correo'),
(865, 'protocol', 'Protocol', 'Protocolo'),
(866, 'smtp_host', 'SMTP Host', 'Host SMTP'),
(867, 'smtp_port', 'SMTP Port', 'Puerto SMTP'),
(868, 'sender_mail', 'Sender Mail', 'Correo del remitente'),
(869, 'mail_type', 'Mail Type', 'Tipo de correo'),
(870, 'html', 'HTML', 'HTML'),
(871, 'text', 'TEXT', 'TEXTO'),
(872, 'expiry_date', 'Expiry Date', 'Fecha de caducidad'),
(873, 'api_secret', 'Api Secret', 'Secreto API'),
(874, 'please_config_your_mail_setting', 'please_config_your_mail_setting', 'please_config_your_mail_setting'),
(875, 'quotation_successfully_added', 'Quotation Successfully Added', 'Cotización añadida con éxito'),
(876, 'add_to_invoice', 'Add To Invoice', 'Agregar a la factura'),
(877, 'added_to_invoice', 'Added To Invoice', 'Agregado a la factura'),
(878, 'closing_balance', 'Closing Balance', 'Balance de cierre'),
(879, 'contact', 'Contact', 'Contacto'),
(880, 'fax', 'Fax', 'Fax'),
(881, 'state', 'State', 'Estado'),
(882, 'discounts', 'Discount', 'Descuento'),
(883, 'address1', 'Address1', 'Dirección 1'),
(884, 'address2', 'Address2', 'Dirección 2'),
(885, 'receive', 'Receive', 'Recibir'),
(886, 'purchase_history', 'Purchase History', 'Historial de compras'),
(887, 'cash_payment', 'Cash Payment', 'Pago en efectivo'),
(888, 'bank_payment', 'Bank Payment', 'Pago bancario'),
(889, 'do_you_want_to_print', 'Do You Want to Print', 'Quieres imprimir'),
(890, 'yes', 'Yes', 'Sí'),
(891, 'no', 'No', 'No'),
(892, 'todays_sale', 'Todays Sales', 'Ventas de hoy'),
(893, 'or', 'OR', 'O'),
(894, 'no_result_found', 'No Result Found', 'No se han encontrado resultados'),
(895, 'add_service_quotation', 'Add Service Quotation', 'Agregar cotización de servicio'),
(896, 'add_to_invoice', 'Add To Invoice', 'Agregar a la factura'),
(897, 'item_quotation', 'Item Quotation', 'Cotización de artículo'),
(898, 'service_quotation', 'Service Quotation', 'Presupuesto de servicio'),
(899, 'return_from', 'Return Form', 'Formulario de devolución'),
(900, 'customer_return_list', 'Customer Return List', 'Lista de devoluciones de clientes'),
(901, 'pdf', 'Pdf', 'pdf'),
(902, 'note', 'Note', 'Nota'),
(903, 'update_debit_voucher', 'Update Debit Voucher', 'Actualizar comprobante de débito'),
(904, 'update_credit_voucher', 'Update Credit voucher', 'Actualizar comprobante de crédito'),
(905, 'on', 'On', 'En'),
(906, 'total_expenses', 'Total Expense', 'Gasto total'),
(907, 'already_exist', 'Already Exist', 'Ya existe'),
(908, 'checked_out', 'Checked Out', 'Controlado'),
(909, 'update_salary_setup', 'Update Salary Setup', 'Actualizar configuración de salario'),
(910, 'employee_signature', 'Employee Signature', 'Firma del empleado'),
(911, 'payslip', 'Payslip', 'nómina'),
(912, 'exsisting_role', 'Existing Role', 'Rol existente'),
(913, 'filter', 'Filter', 'Filtrar'),
(914, 'testinput', 'Test Input', 'Entrada de prueba'),
(915, 'update_quotation', 'Update Quotation', 'Actualizar cotización'),
(916, 'quotation_successfully_updated', 'Quotation Successfully Updated', 'Cotización actualizada con éxito'),
(917, 'successfully_approved', 'Successfully Approved', 'Aprobado con éxito'),
(918, 'expiry', 'Expiry', 'Expiración'),
(919, 'Change Password', 'Change Password', 'Cambiar la contraseña'),
(920, 'Admin Details', 'Admin Details', 'Detalles del administrador'),
(921, 'User Setting', 'User Setting', 'Configuración del usuario'),
(922, 'Dashboard Settings', 'Dashboard Settings', 'Configuración del panel'),
(923, 'Add Admin', 'Add Admin', 'Agregar administrador'),
(924, 'Create Invoice', 'Create Invoice', 'Crear factura'),
(925, 'Quote', 'Quote', 'Cita'),
(926, 'Ocean Export Tracking', 'Ocean Export Tracking', 'Seguimiento de exportaciones oceánicas'),
(927, 'Road Transport', 'Road Transport', 'Transporte por carretera'),
(928, 'Vendor', 'Vendor', 'Proveedor'),
(929, 'Purchase Order', 'Purchase Order', 'Orden de compra'),
(930, 'Quotation', 'Quotation', 'Cotización'),
(931, 'Financial Year', 'Financial Year', 'Año financiero'),
(932, 'Voucher Report', 'Voucher Report', 'Informe de comprobante'),
(933, 'Balance Sheet', 'Balance Sheet', 'Hoja de balance'),
(934, 'Financial Year Ending', 'Financial Year Ending', 'Finalización del año financiero'),
(935, 'Employee Info (W4 form)', 'Employee Info (W4 form)', 'Información del empleado (formulario W4'),
(936, 'Time sheet', 'Time sheet', 'hoja de tiempo'),
(937, 'Pay slip / Checks per user', 'Pay slip / Checks per user', 'Nómina / Cheques por usuario'),
(938, 'Payroll settings', 'Payroll settings', 'Configuración de nómina'),
(939, 'Payroll reports', 'Payroll reports', 'Informes de nómina'),
(940, 'Manage Invoice Template', 'Manage Invoice Template', 'Administrar plantilla de factura'),
(941, 'Sales Invoice', 'Sales Invoice', 'Factura de venta'),
(942, 'Invoice Design', 'Invoice Design', 'Diseño de factura'),
(943, 'Payment Due date', 'Payment Due date', 'Fecha de vencimiento del pago'),
(944, 'Estimated Time of Arrival', 'Estimated Time of Arrival', 'Tiempo estimado de llegada'),
(945, 'Estimated Time of Departure', 'Estimated Time of Departure', 'Hora estimada de partida'),
(946, 'Container / Goods Pick up date', 'Container / Goods Pick up date', 'Contenedor / Mercancía Fecha de recogida'),
(947, 'Delivery date', 'Delivery date', 'Fecha de entrega'),
(948, 'Manage my Company', 'Manage my Company', 'Administrar mi empresa'),
(949, 'Help', 'Help', 'Ayuda'),
(950, 'Create Expense', 'Create Expense', 'Crear gasto'),
(951, 'Taxes', 'Taxes', 'Impuestos'),
(952, 'Add Invoice (CSV)', 'Add Invoice (CSV)', 'Agregar factura (CSV'),
(953, 'Select Option', 'Select Option', 'Seleccionar opción'),
(954, 'Vendor Type', 'Vendor Type', 'Tipo de proveedor'),
(955, 'Service Provider', 'Service Provider', 'Proveedor de servicio'),
(956, 'Manage Service Provider', 'Manage Service Provider', 'Administrar proveedor de servicios'),
(957, 'Create Service Provider', 'Create Service Provider', 'Crear proveedor de servicios'),
(958, 'Service Provider Name', 'Service Provider Name', 'Nombre del proveedor de servicios'),
(959, 'Service Provider complete address', 'Service Provider complete address', 'Dirección completa del proveedor de servicios'),
(960, 'Payment Terms', 'Payment Terms', 'Términos de pago'),
(961, 'Bill Number', 'Bill Number', 'Número de factura'),
(962, 'Bill Date', 'Bill Date', 'Fecha de pago'),
(963, 'Due Date', 'Due Date', 'Fecha de vencimiento'),
(964, 'Account Category Name', 'Account Category Name', 'Nombre de categoría de cuenta'),
(965, 'Account Category', 'Account Category', 'Categoría de cuenta'),
(966, 'Account Sub category', 'Account Sub category', 'Subcategoría de cuenta'),
(967, 'Memo / Details', 'Memo / Details', 'Memorándum/Detalles'),
(968, 'Vendor Address', 'Vendor Address', 'Dirección del proveedor'),
(969, 'Expenses / Bill date', 'Expenses / Bill date', 'Gastos / Fecha de factura'),
(970, 'Port Of Discharge', 'Port Of Discharge', 'Puerto de descarga'),
(971, 'Select Payment Terms', 'Select Payment Terms', 'Seleccionar condiciones de pago'),
(972, 'ADVANCE', 'ADVANCE', 'AVANCE'),
(973, 'DAYS', 'DAYS', 'DÍAS'),
(974, 'Select Payment Type', 'Select Payment Type', 'Seleccionar tipo de pago'),
(975, 'CREDIT/DEBIT CARD', 'CREDIT/DEBIT CARD', 'TARJETA DE CRÉDITO / DÉBITO'),
(976, 'BANK TRANSFER', 'BANK TRANSFER', 'TRANSFERENCIA BANCARIA'),
(977, 'ISF FIELD', 'ISF FIELD', 'CAMPO ISF'),
(978, 'Select ISF NO', 'Select ISF NO', 'Seleccione ISF NO'),
(979, 'ISF NO', 'ISF NO', 'FSI NO'),
(980, 'Container Number', 'Container Number', 'Número de contenedor'),
(981, 'B/L No', 'B/L No', 'No. de B/L'),
(982, 'Attachments', 'Attachments', 'Archivos adjuntos'),
(983, 'Bundle No', 'Bundle No', 'No. de paquete'),
(984, 'Thick ness', 'Thick ness', 'Espesor'),
(985, 'Supplier Block No', 'Supplier Block No', 'Número de bloque de proveedor'),
(986, 'Supplier Slab No', 'Supplier Slab No', 'Proveedor Losa No'),
(987, 'Gross Measurement', 'Gross Measurement', 'Medida bruta'),
(988, 'Gross Sq.Ft', 'Gross Sq.Ft', 'Pies cuadrados brutos'),
(989, 'Slab No', 'Slab No', 'Losa No'),
(990, 'Net Measure', 'Net Measure', 'Medida neta'),
(991, 'Net Sq.Ft', 'Net Sq.Ft', 'Pies cuadrados netos'),
(992, 'Cost per Sq.Ft', 'Cost per Sq.Ft', 'Costo por pie cuadrado'),
(993, 'Cost per Slab', 'Cost per Slab', 'Costo por losa'),
(994, 'Price per Sq.Ft', 'Price per Sq.Ft', 'Precio por pie cuadrado'),
(995, 'Sales Slab Price', 'Sales Slab Price', 'Precio de losa de venta'),
(996, 'Weight', 'Weight', 'Peso'),
(997, 'Origin', 'Origin', 'Origen'),
(998, 'Width', 'Width', 'Ancho'),
(999, 'Height', 'Height', 'Altura'),
(1000, 'Todays Rate', 'Todays Rate', 'Tasa de hoy'),
(1001, 'Bundle', 'Bundle', 'Manojo'),
(1002, 'Select the Tax', 'Select the Tax', 'Selecciona el Impuesto'),
(1003, 'Overall TOTAL', 'Overall TOTAL', 'Total general'),
(1004, 'TAX DETAILS', 'TAX DETAILS', 'DETALLES DE IMPUESTOS'),
(1005, 'Overall Gross Sq.Ft', 'Overall Gross Sq.Ft', 'Pies cuadrados brutos totales'),
(1006, 'GRAND TOTAL', 'GRAND TOTAL', 'GRAN TOTAL'),
(1007, 'Overall Net Sq.Ft', 'Overall Net Sq.Ft', 'Pies cuadrados netos totales'),
(1008, 'Preferred Currency', 'Preferred Currency', 'Moneda preferida'),
(1009, 'Overall Weight', 'Overall Weight', 'Peso total'),
(1010, 'Amount Paid', 'Amount Paid', 'Cantidad pagada'),
(1011, 'Remarks / Details', 'Remarks / Details', 'Observaciones / Detalles'),
(1012, 'Message on Invoice', 'Message on Invoice', 'Mensaje en factura'),
(1013, 'New Invoice', 'New Invoice', 'Nueva factura'),
(1014, 'Packing List', 'Packing List', 'Lista de embalaje'),
(1015, 'Add New Vendor', 'Add New Vendor', 'Agregar nuevo proveedor'),
(1016, 'Selected vendor type', 'Selected vendor type', 'Tipo de proveedor seleccionado'),
(1017, 'Product Supplier', 'Product Supplier', 'Proveedor de productos'),
(1018, 'Service Vendor', 'Service Vendor', 'Proveedor de servicios'),
(1019, 'Company Name', 'Company Name', 'nombre de empresa'),
(1020, 'Business Phone', 'Business Phone', 'Teléfono de negocios'),
(1021, 'primary Email', 'primary Email', 'Correo electrónico principal'),
(1022, 'Secondary Email', 'Secondary Email', 'Email secundario'),
(1023, 'Contact Person', 'Contact Person', 'Persona de contacto'),
(1024, 'Tax Collected', 'Tax Collected', 'Impuesto recaudado'),
(1025, 'Credit Limit', 'Credit Limit', 'Límite de crédito'),
(1026, 'Select the Category', 'Select the Category', 'Seleccione la categoría'),
(1027, 'Select the Unit', 'Select the Unit', 'Seleccione la Unidad'),
(1028, 'ASSETS', 'ASSETS', 'ACTIVOS'),
(1029, 'RECEIVABLES', 'RECEIVABLES', 'CUENTAS POR COBRAR'),
(1030, 'INVENTORIES', 'INVENTORIES', 'INVENTARIOS'),
(1031, 'PREPAID EXPENSES & OTHER CURRENT ASSETS', 'PREPAID EXPENSES & OTHER CURRENT ASSETS', 'GASTOS PREPAGOS Y OTROS ACTIVOS CORRIENTES'),
(1032, 'PROPERTY PLANT & EQUIPMENT', 'PROPERTY PLANT & EQUIPMENT', 'PROPIEDAD PLANTA Y EQUIPO'),
(1033, 'ACCUMULATED DEPRECIATION & AMORTIZATION', 'ACCUMULATED DEPRECIATION & AMORTIZATION', 'DEPRECIACIÓN Y AMORTIZACIÓN ACUMULADA'),
(1034, 'NON – CURRENT RECEIVABLES', 'NON – CURRENT RECEIVABLES', 'DERECHOS A COBRAR NO CORRIENTES'),
(1035, 'INTERCOMPANY RECEIVABLES & OTHER NON-CURRENT ASSETS', 'INTERCOMPANY RECEIVABLES & OTHER NON-CURRENT ASSETS', 'CUENTAS POR COBRAR INTERCOMPAÑÍAS Y OTROS ACTIVOS NO CORRIENTES'),
(1036, 'LIABILITIES & PAYABLES', 'LIABILITIES & PAYABLES', 'PASIVOS Y CUENTAS POR PAGAR'),
(1037, 'ACCRUED COMPENSATION & RELATED ITEMS', 'ACCRUED COMPENSATION & RELATED ITEMS', 'COMPENSACIÓN ACUMULADA Y ARTÍCULOS RELACIONADOS'),
(1038, 'OTHER ACCRUED EXPENSES', 'OTHER ACCRUED EXPENSES', 'OTROS GASTOS ACUMULADOS'),
(1039, 'ACCRUED TAXES', 'ACCRUED TAXES', 'IMPUESTOS ACUMULADOS'),
(1040, 'DEFERRED TAXES', 'DEFERRED TAXES', 'IMPUESTOS DIFERIDOS'),
(1041, 'LONG-TERM DEBT', 'LONG-TERM DEBT', 'DEUDA A LARGO PLAZO'),
(1042, 'INTERCOMPANY PAYABLES & OTHER NON CURRENT LIABILITIES & OWNERS EQUITIES', 'INTERCOMPANY PAYABLES & OTHER NON CURRENT LIABILITIES & OWNERS EQUITIES', 'CUENTAS POR PAGAR INTERCOMPAÑÍAS Y OTROS PASIVOS NO CORRIENTES Y PATRIMONIO PROPIETARIO'),
(1043, 'REVENUE', 'REVENUE', 'GANANCIA'),
(1044, 'COST OF GOODS SOLD', 'COST OF GOODS SOLD', 'COSTO DE LOS BIENES VENDIDOS'),
(1045, 'OPERATING EXPENSES', 'OPERATING EXPENSES', 'LOS GASTOS DE EXPLOTACIÓN'),
(1046, 'Select the Product Sub Category', 'Select the Product Sub Category', 'Seleccione la subcategoría del producto'),
(1047, 'Product Sub Category', 'Product Sub Category', 'Subcategoría de producto'),
(1048, 'Granite', 'Granite', 'Granito'),
(1049, 'Quartz', 'Quartz', 'Cuarzo'),
(1050, 'Quartzite', 'Quartzite', 'Cuarcita'),
(1051, 'Lime Stone', 'Lime Stone', 'piedra caliza'),
(1052, 'Dolomite', 'Dolomite', 'Dolomita'),
(1053, 'Sand Stone', 'Sand Stone', 'piedra arenisca'),
(1054, 'Soap Stone', 'Soap Stone', 'Piedra de jabón'),
(1055, 'Product Image', 'Product Image', 'Imagen del producto'),
(1056, 'Serial No', 'Serial No', 'Número de serie'),
(1057, 'Confirmation', 'Confirmation', 'Confirmación'),
(1058, 'Your Invoice is not submitted. Would you like to submit or discard', 'Your Invoice is not submitted. Would you like to submit or discard', 'No se envía su factura. ¿Desea enviar o descartar'),
(1059, 'If you dont save', 'If you dont save', 'Si no guarda, sus cambios no se guardarán'),
(1060, 'Discard', 'Discard', 'Desechar'),
(1061, 'Reference No', 'Reference No', 'Numero de referencia'),
(1062, 'Select Bank', 'Select Bank', 'Seleccionar banco'),
(1063, 'Amount to be paid', 'Amount to be paid', 'El monto a pagar'),
(1064, 'Amount Received', 'Amount Received', 'Cantidad recibida'),
(1065, 'Additional Information', 'Additional Information', 'información adicional'),
(1066, 'Select currency', 'Select currency', 'Seleccione el tipo de moneda'),
(1067, 'Add New Payment Type', 'Add New Payment Type', 'Agregar nuevo tipo de pago'),
(1068, 'New Payment Type', 'New Payment Type', 'Nuevo tipo de pago'),
(1069, 'Add New Payment Terms', 'Add New Payment Terms', 'Agregar nuevas condiciones de pago'),
(1070, 'New Payment Terms', 'New Payment Terms', 'Nuevos términos de pago'),
(1071, 'Product Added Successfully', 'Product Added Successfully', 'Producto agregado con éxito'),
(1072, 'Payment Type Added Successfully', 'Payment Type Added Successfully', 'Tipo de pago agregado con éxito'),
(1073, 'Payment Terms Added Successfully', 'Payment Terms Added Successfully', 'Condiciones de pago añadidas con éxito'),
(1074, 'Service Provider created Successfully', 'Service Provider created Successfully', 'Proveedor de servicios creado con éxito'),
(1075, 'New Expense Created Successfully', 'New Expense Created Successfully', 'Nuevo gasto creado con éxito'),
(1076, 'Payment Successfully Completed', 'Payment Successfully Completed', 'Pago completado con éxito'),
(1077, 'Bank Added Successfully', 'Bank Added Successfully', 'Banco añadido con éxito'),
(1078, 'New Vendor Added Successfully', 'New Vendor Added Successfully', 'Nuevo proveedor agregado con éxito'),
(1079, 'Your Invoice No', 'Your Invoice No', 'Su Factura No'),
(1080, 'has been Discarded', 'has been Discarded', 'ha sido descartado'),
(1081, 'has been saved Successfully', 'has been saved Successfully', 'se ha guardado correctamente'),
(1082, 'New Expense Updated  Successfully', 'New Expense Updated  Successfully', 'Nuevo gasto actualizadoExitosamente'),
(1083, 'Create Purchase Order', 'Create Purchase Order', 'Crear orden de compra'),
(1084, 'Ship To', 'Ship To', 'Envie a'),
(1085, 'P.O Number', 'P.O Number', 'numero postal'),
(1086, 'Created By', 'Created By', 'Creado por'),
(1087, 'Shipment Terms', 'Shipment Terms', 'Términos de envío'),
(1088, 'Purchase order date', 'Purchase order date', 'fecha de la orden de compra'),
(1089, 'Expense - Purchase Order', 'Expense - Purchase Order', 'Gasto - Orden de compra'),
(1090, 'ADD PAYMENT', 'ADD PAYMENT', 'AÑADIR PAGO'),
(1091, 'Quantity', 'Quantity', 'Cantidad'),
(1092, 'Create Sale', 'Create Sale', 'Crear venta'),
(1093, 'Search By Date Range', 'Search By Date Range', 'Buscar por rango de fechas'),
(1094, 'XLS', 'XLS', 'XLS'),
(1095, 'Filter By', 'Filter By', 'Filtrado por'),
(1096, 'ID', 'ID', 'IDENTIFICACIÓN'),
(1097, 'Invoice No', 'Invoice No', 'Factura no'),
(1098, 'Date', 'Date', 'Fecha'),
(1099, 'Overall Gross', 'Overall Gross', 'Total Bruto'),
(1100, 'Overall Net', 'Overall Net', 'Total Neto'),
(1101, 'Total Amount', 'Total Amount', 'Cantidad total'),
(1102, 'BL Number', 'BL Number', 'Número BL'),
(1103, 'Payment Type', 'Payment Type', 'Tipo de pago'),
(1104, 'Invoice ID', 'Invoice ID', 'identificación de la factura'),
(1105, 'Customer Name', 'Customer Name', 'Nombre del cliente'),
(1106, 'Sales Invoice date', 'Sales Invoice date', 'Fecha de la factura de venta'),
(1107, 'Billing Address', 'Billing Address', 'Dirección de Envio'),
(1108, 'Shipping Address', 'Shipping Address', 'Dirección de envío'),
(1109, 'Balance Amount', 'Balance Amount', 'Balance de Cuenta'),
(1110, 'Remarks/Conditions', 'Remarks/Conditions', 'Observaciones/Condiciones'),
(1111, 'Account Details', 'Account Details', 'detalles de la cuenta'),
(1112, 'Select Customer', 'Select Customer', 'Seleccionar cliente'),
(1113, 'Todays Rate', 'Todays Rate', 'Tasa de hoy'),
(1114, 'Overall Gross Sq.Ft', 'Overall Gross Sq.Ft', 'Pies cuadrados brutos totales'),
(1115, 'Account Details/Additional Information', 'Account Details/Additional Information', 'Detalles de la cuenta/Información adicional'),
(1116, 'Sales - Profarma Invoice', 'Sales - Profarma Invoice', 'Ventas - Factura Profarma'),
(1117, 'If you dont submit', 'If you dont submit', 'Si no envía, sus cambios no se guardarán.'),
(1118, 'New Payment Type', 'New Payment Type', 'Nuevo tipo de pago'),
(1119, 'Select Bank:', 'Select Bank:', 'Seleccione Banco:'),
(1120, 'ADD NEW CUSTOMER', 'ADD NEW CUSTOMER', 'AÑADIR NUEVO CLIENTE'),
(1121, 'Customer Type', 'Customer Type', 'tipo de cliente'),
(1122, 'Select Customer Type', 'Select Customer Type', 'Seleccionar tipo de cliente'),
(1123, 'Distributor', 'Distributor', 'Distribuidor'),
(1124, 'Fabricator', 'Fabricator', 'Fabricante'),
(1125, 'Kitchen', 'Kitchen', 'Cocina'),
(1126, 'Dealer', 'Dealer', 'Distribuidor'),
(1127, 'Contractor', 'Contractor', 'Contratista'),
(1128, 'Builder', 'Builder', 'Constructor'),
(1129, 'Others', 'Others', 'Otros'),
(1130, 'Country', 'Country', 'País'),
(1131, 'Sales Tax', 'Sales Tax', 'Impuesto de venta'),
(1132, 'Select Sales Tax', 'Select Sales Tax', 'Seleccionar impuesto sobre las ventas'),
(1133, 'Tax Rates', 'Tax Rates', 'Las tasas de impuestos'),
(1134, 'Select Supplier', 'Select Supplier', 'Seleccionar proveedor'),
(1135, 'Invoice Number', 'Invoice Number', 'Número de factura'),
(1136, '\"Add Invoice (CSV)', '\"Add Invoice (CSV)', '\"Agregar factura (CSV)'),
(1137, 'Make Payment', 'Make Payment', 'Hacer el pago'),
(1138, 'Pre Carriage', 'Pre Carriage', 'transporte previo'),
(1139, 'Country goods', 'Country goods', 'bienes del país	'),
(1140, 'Country Destination', 'Country Destination', 'País Destino'),
(1141, 'Loading', 'Loading', 'Cargando'),
(1142, 'Discharge', 'Discharge', 'Descargar'),
(1143, 'Terms payment', 'Terms payment', 'condiciones de pago'),
(1144, 'Description goods', 'Description goods', 'Descripción bienes'),
(1145, 'Overall Gross', 'Overall Gross', 'Total Bruto'),
(1146, 'Overall Net', 'Overall Net', 'Total Neto'),
(1147, 'Buyer / Customer', 'Buyer / Customer', 'Comprador / Cliente	'),
(1148, 'Place of Receipt', 'Place of Receipt', 'Lugar de recepción'),
(1149, 'No Records Found', 'No Records Found', 'No se encontraron registros'),
(1155, '\"Add Invoice (CSV)', '\"Add Invoice (CSV)', '\"Agregar factura (CSV)'),
(1150, 'Country of final destination	', 'Country of final destination		', 'País de destino final'),
(1151, 'Country of origin of goods', 'Country of origin of goods		', 'País de origen de los bienes'),
(1152, 'Port of loading', 'Port of loading		', 'Puerto de carga'),
(1153, 'Port of discharge', 'Port of discharge		', 'Puerto de descarga'),
(1154, 'Terms of payment and delivery', 'Terms of payment and delivery	', '	Condiciones de pago y entrega'),
(1156, ' Country of final destination ', ' Country of final destination ', ' País de destino final'),
(1157, 'Create Ocean Export Tracking', 'Create Ocean Export Tracking', 'Crear seguimiento de exportación oceánica'),
(1158, 'Sales - Ocean Export', 'Sales - Ocean Export', 'Ventas - Exportación Marítima'),
(1159, 'Manage Ocean Export Tracking', 'Manage Ocean Export Tracking', 'Administrar el seguimiento de exportaciones oceánicas'),
(1160, 'Shipper', 'Shipper', 'Expedidor'),
(1161, 'Booking No.', 'Booking No.', 'Nº de reserva'),
(1162, 'Invoice Date', 'Invoice Date', 'Fecha de la factura'),
(1163, 'Customer / Consignee', 'Customer / Consignee', 'Cliente / Consignatario'),
(1164, 'Notify Party', 'Notify Party', 'Notificar a la parte'),
(1165, 'Vessel', 'Vessel', 'Buque'),
(1166, 'Voyage No', 'Voyage No', 'viaje no'),
(1167, 'Place of Delivery', 'Place of Delivery', 'Lugar de entrega'),
(1168, 'Customs Broker Name', 'Customs Broker Name', 'Nombre del agente de aduanas'),
(1169, 'MBL NO', 'MBL NO', 'MBL NO'),
(1170, 'HBL NO', 'HBL NO', 'HBL NO'),
(1171, 'OBL NO', 'OBL NO', 'NÚMERO DE OBLIGATORIO'),
(1172, 'AMS NO', 'AMS NO', 'MAM NO'),
(1173, 'ISF NO', 'ISF NO', 'FSI NO'),
(1174, 'Container No', 'Container No', 'No contenedor'),
(1175, 'Seal No', 'Seal No', 'No. de sello'),
(1176, 'Freight forwarder', 'Freight forwarder', 'Transitario'),
(1177, 'Remarks / Particulars', 'Remarks / Particulars', 'Observaciones / Detalles'),
(1178, ' Track Online', ' Track Online', 'Seguimiento en línea'),
(1179, ' Create ocean export', 'Create ocean export            ', ' Crear exportación oceánica'),
(1180, 'Booking Number', 'Booking Number', 'Número de reserva'),
(1181, 'Seal Number', 'Seal Number', 'Número de sello'),
(1182, 'Ocean Export ID ', 'Ocean Export ID ', 'Identificación de exportación oceánica'),
(1183, 'Purchase Date', 'Purchase Date', 'Fecha de compra'),
(1184, 'Create ocean export', 'Create ocean export', 'Crear exportación oceánica'),
(1188, 'Sales Price per Sq.Ft', 'Sales Price per Sq.Ft', 'Precio de venta por pie cuadrado'),
(1189, 'Net Sq. Ft', 'Net Sq. Ft', 'cuadrados netos Pie'),
(1190, 'Country of final destination', 'Country of final destination', 'País de destino final'),
(1191, 'Make Payment', 'Make Payment', 'Hacer el pago'),
(1192, 'Cost perSqFt', 'Cost perSqFt', '\r\nCosto por pie cuadrado'),
(1193, 'Sales - Profarma Invoice', 'Sales - Profarma Invoice', 'Ventas - Factura Profarma'),
(1194, 'Preferred currency', 'Preferred currency', 'Moneda preferida'),
(1195, 'Payment Date ', 'Payment Date ', 'Fecha de pago'),
(1196, 'Payment Amount', 'Payment Amount', 'Monto del pago'),
(1197, 'Confirmation ', 'Confirmation ', 'Confirmación'),
(1198, 'ADD BANK', 'ADD BANK', 'AÑADIR BANCO'),
(1199, 'Add New Product     ', 'Add New Product       ', ' Añadir nuevo producto'),
(2000, 'Create Quotation     ', 'Create Quotation       ', 'Crear cotización'),
(2001, 'Sale By     ', 'Sale By       ', 'Venta por'),
(2002, 'Sale', 'Sale', 'Venta'),
(2003, 'Due Amount ', 'Due Amount ', 'Cantidad debida'),
(2004, 'Booking No     ', 'Booking No       ', 'Número de reserva'),
(2005, 'CustomerMobile', 'CustomerMobile', 'ClienteMóvil'),
(2007, 'Mobile    ', 'Mobile      ', 'Móvil'),
(2008, 'Delivery to', 'Delivery to', 'Entregar a'),
(2009, 'Shipment company ', 'Shipment company ', 'empresa de transporte'),
(2010, 'Container / Goods Pick up date', 'Container / Goods Pick up date', '\r\nContenedor / Mercancía Fecha de recogida'),
(2011, 'Delivery Time      ', 'Delivery Time     ', 'El tiempo de entrega'),
(2012, 'Truck No', 'Truck No', 'Nº de camión'),
(2013, 'Pro No / Reference', 'Pro No / Reference', 'Núm. Profesional / Referencia'),
(2014, 'Create New Trucking Invoice  ', 'Create New Trucking Invoice   ', 'Crear nueva factura de transporte'),
(2015, 'Create Trucking Invoice ', 'Create Trucking Invoice', 'Crear factura de transporte'),
(2016, 'Trucking Invoice ', 'Trucking Invoice', 'Factura de transporte'),
(2017, 'PaymentTerms    ', 'PaymentTerms      ', 'Términos de pago'),
(2018, 'Remarks    ', 'Remarks      ', 'Observaciones'),
(2019, 'Create Sale    ', 'Create Sale      ', 'Crear venta'),
(2020, 'Buyer/Customer    ', 'Buyer/Customer      ', 'Compradora / Cliente'),
(2021, 'Manage Quotation    ', 'Manage Quotation      ', 'Administrar cotización'),
(2022, 'Track Online ', 'Track Online ', 'Seguimiento en línea'),
(2023, 'Bill to  ', 'Bill to  ', 'Cobrar a'),
(2024, 'Trucking ID', 'Trucking ID', 'Identificación de camiones'),
(2025, 'Container Pickup Date  ', 'Shipment company ', 'Fecha de recogida del contenedor'),
(2026, 'Total Amount      ', 'Total Amount      ', '     Plazo de entrega desde'),
(2027, 'Estimated Time Of Depature', 'Estimated Time Of Depature', 'Hora estimada de salida'),
(2028, 'Make Payment', 'Make Payment', 'Hacer el pago'),
(2029, 'Payment History', 'Payment History', 'historial de pagos'),
(2030, 'Estimated Shipment Date', 'Estimated Shipment Date', 'Fecha estimada de envío'),
(2031, 'Purchase Order Created Successfully', 'Purchase Order Created Successfully', 'Orden de compra creada con éxito'),
(2032, 'Edit Purchase Order', 'Edit Purchase Order', 'Editar orden de compra'),
(2033, 'Purchase Order Updated Successfully', 'Purchase Order Updated Successfully', 'Orden de compra actualizada con éxito'),
(2034, 'has been Updated Successfully', 'has been Updated Successfully', 'ha sido actualizado con éxito'),
(2035, 'Create Road Transport', 'Create Road Transport', 'Crear transporte por carretera'),
(2036, 'Invoice Date', 'Invoice Date', 'Fecha de la factura'),
(2037, 'Bill to', 'Bill to', 'Cobrar a'),
(2038, 'Trucking Company', 'Trucking Company', 'Compañía de camiones'),
(2039, 'Container/Goods Pickupdate', 'Container/Goods Pickupdate', 'Actualización de contenedores/mercancías'),
(2040, 'Shipment / BL Number', 'Shipment / BL Number', 'Envío / Número BL'),
(2041, 'Pro No / Reference', 'Pro No / Reference', 'Número Pro / Referencia'),
(2042, 'Edit Road Transport', 'Edit Road Transport', 'Editar transporte por carretera'),
(2043, 'Manage Road Transport', 'Manage Road Transport', 'Gestionar el transporte por carretera'),
(2044, 'Road Transport Created Successfully', 'Road Transport Created Successfully', 'Transporte por carretera creado con éxito'),
(2045, 'Live Rate', 'Live Rate', 'Tarifa en vivo'),
(2046, 'Create Ocean Import Tracking', 'Create Ocean Import Tracking', 'Crear seguimiento de importación oceánica'),
(2047, 'Ocean Import Tracking', 'Ocean Import Tracking', 'Seguimiento de importaciones oceánicas'),
(2048, 'Manage Ocean Import', 'Manage Ocean Import', 'Administrar Importación Marítima'),
(2049, 'Shipper / Vendor', 'Shipper / Vendor', 'Transportista / Proveedor'),
(2050, 'Booking / BL No', 'Booking / BL No', 'Reserva / BL No'),
(2051, 'Container No', 'Container No', 'No contenedor'),
(2052, 'Seal No', 'Seal No', 'No. de sello'),
(2053, 'Ocean Import Tracking date', 'Ocean Import Tracking date', 'Fecha de seguimiento de importación oceánica'),
(2054, 'Customer / Consignee', 'Customer / Consignee', 'Cliente / Consignatario'),
(2055, 'Notify Party Email', 'Notify Party Email', 'Correo electrónico de notificación de parte'),
(2056, 'Vessel', 'Vessel', 'Buque'),
(2057, 'Voyage No', 'Voyage No', 'viaje no'),
(2058, 'Port of loading', 'Port of loading', 'Puerto de carga'),
(2059, 'Place of Delivery', 'Place of Delivery', 'Lugar de entrega'),
(2060, 'Freight Forwarder', 'Freight Forwarder', 'Transitario'),
(2061, 'BL / Shipment created date', 'BL / Shipment created date', 'BL / Fecha de creación del envío'),
(2062, 'Country of Origin', 'Country of Origin', 'País de origen'),
(2063, 'Select Tax Collected', 'Select Tax Collected', 'Seleccionar impuesto recaudado'),
(2064, 'Ocean Import Tracking', 'Ocean Import Tracking', 'Seguimiento de importaciones oceánicas'),
(2065, 'Ocean Import Created Successfully', 'Ocean Import Created Successfully', 'Importación marítima creada con éxito'),
(2066, 'Your Booking No', 'Your Booking No', 'Su número de reserva'),
(2067, 'Service Provider ID', 'Service Provider ID', 'Identificación del proveedor de servicios'),
(2068, 'Provider Total', 'Provider Total', 'Proveedor Total'),
(2069, 'Manage Purchase Order', 'Manage Purchase Order', 'Administrar orden de compra'),
(2070, 'Manage Purchase', 'Manage Purchase', 'Administrar Compra'),
(2071, 'Trucking ID', 'Trucking ID', 'Identificación de camiones'),
(2072, 'Ocean Import ID', 'Ocean Import ID', 'Identificación de importación marítima'),
(2073, 'Make Payment', 'Make Payment', 'Hacer el pago'),
(2074, 'Purchase Order', 'Purchase Order', 'Orden de compra'),
(2075, 'Estimated Shipment Date', 'Estimated Shipment Date', 'Fecha estimada de envío'),
(2076, 'Road Transport', 'Road Transport', 'Transporte por carretera'),
(2077, 'ADD NEW CUSTOMER TYPE', 'Add New Customer Type', '\r\nAgregar nuevo tipo de cliente'),
(2078, 'New Customer Type', 'New  Customer Type', 'Nuevo tipo de cliente'),
(2079, 'Success  ', 'Success ', 'Éxito'),
(2080, 'Your message has been sent to us', 'Your message has been sent to us', 'Su mensaje ha sido enviado a nosotros'),
(2081, 'Error  ', 'Error ', 'Error'),
(2082, 'There was an error sending your message     ', 'There was an error sending your message      ', ' Hubo un error al enviar tu mensaje'),
(2083, 'Your name     ', 'Your name      ', ' Su nombre'),
(2084, 'Your email address     ', 'Your email address      ', 'Su dirección de correo electrónico'),
(2085, 'Message    ', 'Message    ', 'Mensaje'),
(2086, 'Sales Invoice  Created Succefully     ', 'Sales Invoice  Created Succefully      ', '\r\nFactura de venta creada con éxito'),
(2087, 'Edit Sale     ', 'Edit Sale      ', 'Editar venta'),
(2088, 'Payment History     ', 'Payment History     ', 'historial de pagos'),
(2089, 'Subject     ', 'Subject     ', ' Sujeta'),
(2090, 'ETA  ', 'ETA ', 'eta'),
(2091, 'ETD', 'ETD', 'EDT'),
(2092, 'Contact  ', 'Contact ', 'Contacto'),
(2093, 'Packing List NO  ', 'Packing List NO ', 'Lista de embalaje NO'),
(2094, 'Gross Weight', 'Gross Weight', 'Peso bruto'),
(2095, 'Companyname ', 'Companyname', 'Nombre de empresa'),
(2096, 'total_amt_paid', 'Total Amount Paid', '\r\nCantidad total pagada'),
(2097, 'Add New Unit', 'Add New Unit', '\r\nAgregar nueva unidad'),
(2098, 'Add New Category', 'Add New Category', '\r\nAñadir nueva categoria'),
(2099, 'Unit Added Successfully', 'Unit Added Successfully', 'Unidad añadida con éxito'),
(2100, 'Category Added Successfully', 'Category Added Successfully', 'Categoría agregada con éxito'),
(2101, 'Product Information', 'Product Information', 'Información del Producto'),
(2102, 'Vendor Details', 'Vendor Details', 'Detalles del proveedor'),
(2103, 'Inventory Balance', 'Inventory Balance', 'Saldo de inventario'),
(2104, 'In Stock', 'In Stock', 'En stock'),
(2105, 'Units', 'Units', 'Unidades'),
(2106, 'Packing Details', 'Packing Details', 'Detalles de empaque'),
(2107, 'Block', 'Block', 'Bloquear'),
(2108, 'PRODUCT HISTORY', 'PRODUCT HISTORY', 'HISTORIA DEL PRODUCTO'),
(2109, 'Edit', 'Edit', 'Editar'),
(2110, 'Updated Successfully', 'Updated Successfully', 'Actualizado con éxito'),
(2111, 'Edit Sale ', 'Edit Sale', 'Editar venta'),
(2112, 'Payment History ', 'Payment History', 'historial de pagos'),
(2113, 'Mail Send Successfully ', 'Mail Send Successfully', 'Correo enviado con éxito'),
(2114, 'Sales - Profarma Invoice ', 'Sales - Profarma Invoice', 'Ventas - Factura Profarma'),
(2115, 'Profarma Invoice Downloaded Successfully ', 'Profarma Invoice Downloaded Successfully', 'Factura Profarma Descargada Exitosamente'),
(2116, 'Description of goods ', 'Description of goods', 'Descripción de los bienes'),
(2117, 'Edit Ocean Export Tracking ', 'Edit Ocean Export Tracking', 'Editar seguimiento de exportación oceánica'),
(2118, 'Sales - Ocean ', 'Sales - Ocean', 'Ventas - Océano'),
(2119, 'Ocean Export Downloaded Successfully ', 'Ocean Export Downloaded Successfully', 'Ocean Export descargado con éxito'),
(2120, 'live rate ', 'live rate', 'tasa en vivo'),
(2121, 'Create Road Transport ', 'Create Road Transport', 'Crear transporte por carretera'),
(2122, 'Sales - Trucking ', 'Sales - Trucking', 'Ventas - Camiones'),
(2123, 'No Records Found ', 'No Records Found', 'No se encontraron registros'),
(2124, 'Edit Road Transport ', 'Edit Road Transport', 'Editar transporte por carretera'),
(2125, 'Expenses - Trucking ', 'Expenses - Trucking', 'Gastos - Camiones'),
(2126, 'Add Supplier ', 'Add Supplier', 'Agregar proveedor'),
(2127, 'Supplier Overview ', 'Supplier Overview', 'Descripción general del proveedor'),
(2128, 'Supplier Sales Detail ', 'Supplier Sales Detail', 'Detalle de ventas de proveedores'),
(2129, 'Zip code ', 'Zip code', 'Código postal'),
(2130, 'Supplier Details ', 'Supplier Details', '\r\nDetalles del proveedor'),
(2131, 'Company ID ', 'Company ID', 'ID de la compañía'),
(2132, 'Create Supplier ', 'Create Supplier', 'Crear proveedor'),
(2133, 'Avaliablity', 'Avaliablity', 'Disponibilidad'),
(2134, 'Inventry', 'Inventry', 'inventario'),
(2135, 'Total Sales ', 'Total Sales', 'Ventas totales'),
(2136, 'PROFIT ', 'PROFIT', 'GANANCIA'),
(2137, 'No. of Products ', 'No. of Products', 'Nº de productos'),
(2138, 'Sales and Expense Overview ', 'Sales and Expense Overview', 'Resumen de ventas y gastos'),
(2139, 'SALES ', 'SALES', 'VENTAS'),
(2140, 'No. of Sales ', 'No. of Sales', 'Nº de Ventas'),
(2141, 'Total Amount ', 'Total Amount', 'Cantidad total'),
(2142, 'Total Paid Amount', 'Total Paid Amount', 'Cantidad total pagada'),
(2143, 'Total Due Amount ', 'Total Due Amount', 'Importe total adeudado'),
(2144, 'Expense ', 'Expense', 'Gastos'),
(2145, 'Todays Sales ', 'Todays Sales', 'Ventas de hoy'),
(2146, 'Todays Expense ', 'Todays Expense', 'Gastos de hoy'),
(2147, 'No. of Vendors ', 'No. of Vendors', 'No. de Vendedoras'),
(2148, 'No. of Customers ', 'No. of Customers', 'Nº de Clientes'),
(2149, 'No. of Employees ', 'No. of Employees', 'Cantidad de Empleados'),
(2150, 'Best 10 Sales Product ', 'Best 10 Sales Product', 'Los 10 mejores productos de ventas'),
(2151, 'No. of Expense ', 'No. of Expense ', 'Nº de gastos'),
(2152, 'Manage Ocean Export Invoice ', 'Manage Ocean Export Invoice', '\r\nGestionar factura de exportación marítima'),
(2153, 'Manage Road Transport', 'Manage Road Transport', '\r\nGestionar el transporte por carretera'),
(2154, 'Edit Quotation ', 'Edit Quotation', '\r\nEditar cotización'),
(2155, 'Manage Vendor ', 'Manage Vendor', 'Administrar proveedor'),
(2156, 'Vendor', 'Vendor', 'proveedor'),
(2157, 'Add Vendor', 'Add Vendor', 'Agregar vendedora'),
(2158, 'Vendor Overview ', 'Vendor Overview', '\r\nDescripción general del proveedor'),
(2159, 'Vendor Sales Detail ', 'Vendor Sales Detail', '\r\nDetalle de ventas de proveedores'),
(2160, 'csv_vendor ', 'csv_vendor', '\r\nproveedor_csv'),
(2161, 'manage_supplier_ledger ', 'manage_supplier_ledger', '\r\nadministrar_proveedor_libro mayor'),
(2162, 'manage_vendor_ledger ', 'manage_vendor_ledger', '\r\nadministrar_vendedor_libro mayor'),
(2163, 'vendor_ledger ', 'vendor_ledger', 'proveedor_libro mayor'),
(2164, 'add_vendor ', 'add_vendor', 'agregar_vendedor'),
(2165, 'supplier_ledger ', 'supplier_ledger', 'proveedor_libro mayor'),
(2166, 'Create vendor', 'Create vendor', 'Crear proveedor'),
(2167, 'Sales - New Invoice', 'Sales - New Invoice', 'Ventas - Factura nueva'),
(2168, 'Shipping Company', 'Shipping Company', 'Compañía de envios'),
(2169, 'Container / Goods pickup date', 'Container / Goods pickup date', 'Contenedor / Fecha de recogida de mercancías'),
(2170, 'Invoive Date', 'Invoive Date', '\r\nFecha de la factura'),
(2171, 'Customs Broker', 'Customs Broker', 'Agente de aduana'),
(2172, 'Estimate time of arrival', 'Estimate time of arrival', 'Tiempo estimado de llegada'),
(2173, 'Estimate time of depature', 'Estimate time of depature', 'Tiempo estimado de salida'),
(2174, 'vendor_edit', 'vendor_edit', 'vendedor_editar'),
(2175, 'csv_upload_Vendor', 'csv_upload_Vendor', 'csv_upload_Vendor'),
(2176, 'Sales Invoice Created Succefully', 'Sales Invoice Created Succefully', 'Factura de venta creada con éxito'),
(2177, 'Create Tax', 'Create Tax', 'Crear impuesto'),
(2178, 'Show Tax On Return', 'Show Tax On Return', 'Mostrar impuestos a la devolución'),
(2179, 'Sale Rate', 'Sale Rate', 'Tasa de venta'),
(2180, 'Tax Agency', 'Tax Agency', 'Agencia Tributaria'),
(2181, 'Tax ID', 'Tax ID', 'Identificación del impuesto'),
(2182, 'S.No', 'S.No', 'S.No'),
(2183, 'Create a name for your tax rate, and give us a few details about how you wan', 'Create a name for your tax rate, and give us a few details about how you want to apply it', 'Cree un nombre para su tasa impositiva y bríndenos algunos detalles sobre cómo desea aplicarla'),
(2184, 'GST ', 'GST', 'GST'),
(2185, 'VAT ', 'VAT', 'IVA'),
(2186, 'Service Tax ', 'Service Tax', 'Impuesto de servicio'),
(2187, 'Swachh Bharat Cess ', 'Swachh Bharat Cess', 'Cruce de Swachh Bharat'),
(2188, 'Krishi Kalyan Cess ', 'Krishi Kalyan Cess', 'Cruce de Krishi Kalyan'),
(2189, 'CST ', 'CST', 'CST'),
(2190, 'Sales Rate ', 'Sales Rate', 'Tasa de ventas'),
(2191, 'Liability ', 'Liability', 'Responsabilidad'),
(2192, 'Show Tax On Return Line ', 'Show Tax On Return Line', 'Mostrar impuesto en la línea de devolución'),
(2193, 'Output Service Tax ', 'Output Service Tax', 'Impuesto de salida servicio'),
(2194, 'Output Education Tax ', 'Output Education Tax', 'Impuesto a la Educación'),
(2195, 'Output-Higher Education Tax', 'Output-Higher Education Tax', 'Impuesto a la Educación Superior'),
(2196, 'Invoice Setting', 'Invoice Setting', 'Configuración de factura'),
(2197, 'Update Sales & Quote', 'Update Sales & Quote', 'Actualizar ventas y cotización'),
(2198, 'Update Ocean Export Tracking Invoice', 'Update Ocean Export Tracking Invoice', 'Actualizar factura de seguimiento de exportación marítima'),
(2199, 'Update Road Transport Invoice', 'Update Road Transport Invoice', 'Actualizar factura de transporte por carretera'),
(2200, 'Template Color ', 'Template Color', 'Color de la plantilla'),
(2201, 'Dive in with Template ', 'Dive in with Template', 'Sumérgete con Plantilla'),
(2202, 'Invoice Header ', 'Invoice Header', 'Encabezado de factura'),
(2203, 'Invoice Content', 'Invoice Content', 'Contenido de la factura'),
(2204, 'Template Content', 'Template Content', 'Contenido de la plantilla'),
(2205, 'Email Template', 'Email Template', 'Plantilla de correo electrónico'),
(2206, 'Alerts Template', 'Alerts Template', 'Plantilla de alertas'),
(2207, 'Sale Template', 'Sale Template', 'Plantilla de venta'),
(2208, 'Help Content', 'Help Content', 'Contenido de ayuda'),
(2209, 'Manage Desk', 'Manage Desk', 'Administrar escritorio'),
(2210, 'Add Help Desk Content', 'Add Help Desk Content', 'Agregar contenido de la mesa de ayuda'),
(2211, 'Title ', 'Title', 'Título'),
(2212, 'Role List ', 'Role List', 'Lista de roles'),
(2213, 'User assign role', 'User assign role', 'Rol de asignación de usuario'),
(2214, 'Add Company ', 'Add Company', 'Agregar empresa'),
(2215, 'CompanyEmail', 'CompanyEmail', 'EmpresaEmail'),
(2216, 'Create Company Branch ', 'Create Company Branch', 'Crear sucursal de empresa'),
(2217, 'Language Name', 'Language Name', 'Nombre del lenguaje'),
(2218, 'Language ', 'Language', 'Idioma'),
(2219, 'Add Phrase ', 'Add Phrase', 'Añadir frase'),
(2220, 'Manage Language', 'Manage Language', 'Administrar idioma'),
(2221, 'Expense Setting', 'Expense Setting', 'Configuración de gastos'),
(2222, 'First Name', 'First Name', 'Nombre de pila'),
(2223, 'Last Name', 'Last Name', 'Apellido'),
(2224, 'Gender ', 'Gender', 'Género'),
(2225, 'Select Gender ', 'Select Gender', 'Seleccione género'),
(2226, 'Male ', 'Male', 'Masculina'),
(2227, 'FeMale ', 'FeMale', 'Femenina'),
(2228, 'DOB', 'DOB', 'fecha de nacimiento'),
(2229, 'Sales Setting', 'Sales Setting', 'Configuración de ventas'),
(2230, 'SELECTALL', 'SELECTALL', 'SELECCIONAR TODO'),
(2231, 'DATES', 'DATES', '\r\nFECHAS'),
(2232, 'TIME', 'TIME', 'TIEMPO'),
(2233, 'SOURCE', 'SOURCE', '\r\nFUENTE'),
(2234, 'NEW SALE', 'NEW SALE', '\r\nNUEVA VENTA'),
(2235, 'Select Preferred Email', 'Select Preferred Email', 'Seleccionar correo electrónico preferido'),
(2236, 'Select Preferred Source', 'Select Preferred Source', 'Seleccionar fuente preferida'),
(2237, 'Select Preferred Date', 'Select Preferred Date', '\r\nSeleccione la fecha preferida'),
(2238, 'TRUCKING', 'TRUCKING', 'CAMIONAJE'),
(2239, 'NEW EXPENSE', 'NEW EXPENSE', 'NUEVO GASTO'),
(2240, 'EST SHIPMENT DATE', 'EST SHIPMENT DATE', 'FECHA DE ENVÍO EST'),
(2241, 'Provider ID', 'Provider ID', 'Identificación del proveedor'),
(2242, 'Output-Education Tax', 'Output-Education Tax', 'Impuesto a la Educación'),
(2243, 'Service Provider Address', 'Service Provider Address', 'Dirección del proveedor de servicios'),
(2244, 'New Sale created Successfully', 'New Sale created Successfully', 'Venta nueva creada con éxito'),
(2245, 'Csv Upload Vendor', 'Csv Upload Vendor', 'Proveedor de carga de csv'),
(2246, 'manage_vendor', 'Manage Vendor', 'Administrar proveedor'),
(2247, 'Vendor Ledger', 'Vendor Ledger', 'Libro mayor de proveedores'),
(2248, 'vendor_sales_details', 'Vendor Sales Details', 'Detalles de ventas del proveedor'),
(2249, 'Output-Service Tax', 'Output-Service Tax', 'Impuesto de salida-servicio'),
(2250, 'Vendor Edit', 'Vendor Edit', 'Proveedor Editar'),
(2251, 'Marble', 'Marble', 'Mármol'),
(2252, 'Total Expense', 'Total Expense', 'Gasto total'),
(2257, 'New Expenses Updated Succefully', 'New Expenses Updated Succefully', 'Nuevos gastos actualizados con éxito'),
(2258, 'Expenses', 'Expenses', 'Gastos'),
(2259, 'Username', 'Username', 'Nombre de usuario'),
(2260, 'Gender', 'Gender', '\r\nGénero'),
(2261, 'Date Of Birth', 'Date Of Birth', 'Fecha de nacimiento'),
(2262, 'Update your Profile', 'Update your Profile', 'Actualiza tu perfil'),
(2263, 'Wrong Username', 'Wrong Username', '\r\nNombre de usuario incorrecto'),
(2264, 'Employee Details', 'Employee Info', 'Detalles de la empleada');

-- --------------------------------------------------------

--
-- Table structure for table `module`
--

CREATE TABLE `module` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `directory` varchar(100) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `module`
--

INSERT INTO `module` (`id`, `name`, `description`, `image`, `directory`, `status`) VALUES
(1, 'sales', NULL, NULL, NULL, 1),
(2, 'customer', NULL, NULL, NULL, 1),
(3, 'product', NULL, NULL, NULL, 1),
(4, 'supplier', NULL, NULL, NULL, 1),
(5, 'purchase', NULL, NULL, NULL, 1),
(6, 'stock', NULL, NULL, NULL, 1),
(7, 'return', NULL, NULL, NULL, 1),
(8, 'report', NULL, NULL, NULL, 1),
(9, 'accounts', NULL, NULL, NULL, 1),
(10, 'bank', NULL, NULL, NULL, 1),
(11, 'tax', NULL, NULL, NULL, 1),
(12, 'hrm', NULL, NULL, NULL, 1),
(13, 'service', NULL, NULL, NULL, 1),
(14, 'commission', NULL, NULL, NULL, 1),
(15, 'setting', NULL, NULL, NULL, 1),
(16, 'quotation', NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ocean_export_tracking`
--

CREATE TABLE `ocean_export_tracking` (
  `id` int(11) NOT NULL,
  `ocean_export_tracking_id` varchar(255) DEFAULT NULL,
  `booking_no` varchar(255) DEFAULT NULL,
  `container_no` varchar(255) DEFAULT NULL,
  `seal_no` varchar(255) DEFAULT NULL,
  `etd` varchar(255) DEFAULT NULL,
  `eta` varchar(255) DEFAULT NULL,
  `supplier_id` varchar(255) DEFAULT NULL,
  `shipper` varchar(255) DEFAULT NULL,
  `invoice_date` varchar(255) DEFAULT NULL,
  `consignee` varchar(255) DEFAULT NULL,
  `notify_party` varchar(255) DEFAULT NULL,
  `vessel` varchar(255) DEFAULT NULL,
  `voyage_no` varchar(255) DEFAULT NULL,
  `port_of_loading` varchar(255) DEFAULT NULL,
  `port_of_discharge` varchar(255) DEFAULT NULL,
  `place_of_delivery` varchar(255) DEFAULT NULL,
  `freight_forwarder` varchar(255) DEFAULT NULL,
  `particular` varchar(255) DEFAULT NULL,
  `attachment` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `create_by` varchar(255) DEFAULT NULL,
  `customs_broker_name` varchar(250) NOT NULL,
  `hbl_no` varchar(250) NOT NULL,
  `obl_no` varchar(250) NOT NULL,
  `ams_no` varchar(250) NOT NULL,
  `isf_no` varchar(250) NOT NULL,
  `mbl_no` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ocean_export_tracking`
--

INSERT INTO `ocean_export_tracking` (`id`, `ocean_export_tracking_id`, `booking_no`, `container_no`, `seal_no`, `etd`, `eta`, `supplier_id`, `shipper`, `invoice_date`, `consignee`, `notify_party`, `vessel`, `voyage_no`, `port_of_loading`, `port_of_discharge`, `place_of_delivery`, `freight_forwarder`, `particular`, `attachment`, `status`, `create_by`, `customs_broker_name`, `hbl_no`, `obl_no`, `ams_no`, `isf_no`, `mbl_no`) VALUES
(20, '20230607100511', '345345345345', '345345345', '3455335', '2023-06-07', '2023-06-07', '15', '15', '2023-06-07', '9', '534545344', '34534534', '345345344', '53453454', '345345354', '34345345', '345345344', '                53453453453453                       ', NULL, 1, '38', '345345345', '345345345', '5345345R', '345345345', '3453455F', '34534534');

-- --------------------------------------------------------

--
-- Table structure for table `ocean_import_tracking`
--

CREATE TABLE `ocean_import_tracking` (
  `id` int(11) NOT NULL,
  `ocean_import_tracking_id` bigint(20) DEFAULT NULL,
  `booking_no` varchar(255) DEFAULT NULL,
  `container_no` varchar(255) DEFAULT NULL,
  `seal_no` varchar(255) DEFAULT NULL,
  `etd` varchar(255) DEFAULT NULL,
  `eta` varchar(255) DEFAULT NULL,
  `supplier_id` varchar(255) DEFAULT NULL,
  `shipper` varchar(255) DEFAULT NULL,
  `invoice_date` varchar(255) DEFAULT NULL,
  `bl_shipment_date` varchar(255) DEFAULT NULL,
  `consignee` varchar(255) DEFAULT NULL,
  `notify_party` varchar(255) DEFAULT NULL,
  `vessel` varchar(255) DEFAULT NULL,
  `voyage_no` varchar(255) DEFAULT NULL,
  `port_of_loading` varchar(255) DEFAULT NULL,
  `port_of_discharge` varchar(255) DEFAULT NULL,
  `place_of_delivery` varchar(255) DEFAULT NULL,
  `freight_forwarder` varchar(255) DEFAULT NULL,
  `particular` varchar(255) DEFAULT NULL,
  `country_origin` varchar(255) DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  `attachment` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `create_by` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ocean_import_tracking`
--

INSERT INTO `ocean_import_tracking` (`id`, `ocean_import_tracking_id`, `booking_no`, `container_no`, `seal_no`, `etd`, `eta`, `supplier_id`, `shipper`, `invoice_date`, `bl_shipment_date`, `consignee`, `notify_party`, `vessel`, `voyage_no`, `port_of_loading`, `port_of_discharge`, `place_of_delivery`, `freight_forwarder`, `particular`, `country_origin`, `remarks`, `attachment`, `status`, `create_by`) VALUES
(7, 20230607102143, 'RRTU43666', 'WERR2343244', 'EERYT346346', '2023-06-07', '2023-06-07', '12', '12', '2023-06-07', '2023-06-07', '9', 'N41241211', 'DYERY', 'V23423411', 'ERYY346346', 'PRUTTRU11', 'ERYERYER', 'RTURTURU11', 'ERYERYER', 'United States', 'ERYERERERY', 'assets/images/ocean_import/', 1, '38');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `order_id` varchar(250) NOT NULL,
  `purchase_id` varchar(250) NOT NULL,
  `description` varchar(250) DEFAULT '',
  `customer_name` varchar(250) NOT NULL,
  `payment_date` varchar(250) NOT NULL,
  `reference_no` varchar(250) NOT NULL,
  `bank_name` varchar(250) NOT NULL,
  `total_amt` varchar(250) NOT NULL,
  `amt_received` varchar(250) NOT NULL,
  `balance` varchar(250) NOT NULL,
  `amt_paid` varchar(250) NOT NULL,
  `details` varchar(250) NOT NULL,
  `attachement` varchar(250) DEFAULT NULL,
  `create_by` varchar(250) NOT NULL,
  `mode` varchar(250) NOT NULL,
  `status` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `payment_id`, `order_id`, `purchase_id`, `description`, `customer_name`, `payment_date`, `reference_no`, `bank_name`, `total_amt`, `amt_received`, `balance`, `amt_paid`, `details`, `attachement`, `create_by`, `mode`, `status`) VALUES
(51, 183861671, '', '', '', '', '2023-06-16', 'rwerwe', 'Axis Bank Ltd.', '387', '', '87', '300', 'ewrwerwer', NULL, '38', '', ''),
(49, 183861671, '', '', '', '', '2023-06-16', 'werwer', 'JPMorgan Chase', '160387', '0.00', '387', '160000', 'retertert', NULL, '38', '', ''),
(48, 2048152704, '', '', '', '', '2023-06-16', 'ryrty', 'JPMorgan Chase', '523', '0.00', '423', '100', 'tuytyutu', NULL, '38', '', ''),
(47, 473092025, '', '', '', '', '2023-06-16', '346346346', 'Axis Bank Ltd.', '16368', '', '15368', '1000', 'gdfgdfgdfg', NULL, '38', '', ''),
(46, 1923482776, '', '', '', '', '2023-06-16', '5675675', 'JPMorgan Chase', '2516368', '0.00', '16368', '2500000', 'tuyrtrtu', NULL, '38', '', ''),
(45, 2043867941, '', '', '', '', '2023-06-16', 'ertertert', 'Axis Bank Ltd.', '1515', '', '515', '1000', 'erterter', NULL, '38', '', ''),
(44, 815991532, '', '', '', '', '2023-06-16', '2312312', 'Axis Bank Ltd.', '2585', '', '585', '2000', 'ftyrty', NULL, '38', '', ''),
(43, 1063201010, '', '', '', '', '2023-06-16', 'serwer', 'Axis Bank Ltd.', '2382', '', '382', '2000', 'tertert', NULL, '38', '', ''),
(42, 544427627, '', '', '', '', '2023-06-16', 'ertertert', 'JPMorgan Chase', '315', '0.00', '215', '100', 'truyrtuyrtu', NULL, '38', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `paymentterms_add`
--

CREATE TABLE `paymentterms_add` (
  `id` int(11) NOT NULL,
  `paymentterms_add` varchar(250) DEFAULT NULL,
  `create_by` varchar(250) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payment_terms`
--

CREATE TABLE `payment_terms` (
  `payment_terms` varchar(100) NOT NULL,
  `create_by` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment_terms`
--

INSERT INTO `payment_terms` (`payment_terms`, `create_by`, `id`) VALUES
('PAY', 38, 5);

-- --------------------------------------------------------

--
-- Table structure for table `payment_type`
--

CREATE TABLE `payment_type` (
  `id` int(11) NOT NULL,
  `payment_type` varchar(250) NOT NULL,
  `create_by` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `payment_type`
--

INSERT INTO `payment_type` (`id`, `payment_type`, `create_by`) VALUES
(4, 'COD', 38),
(5, 'GPay', 38),
(6, 'rtyr', 38),
(7, 'ccc', 38),
(8, '44', 38),
(9, 'Bi Weekly', 38);

-- --------------------------------------------------------

--
-- Table structure for table `payroll_tax_setup`
--

CREATE TABLE `payroll_tax_setup` (
  `tax_setup_id` int(10) UNSIGNED NOT NULL,
  `start_amount` decimal(12,2) NOT NULL DEFAULT 0.00,
  `end_amount` decimal(12,2) NOT NULL DEFAULT 0.00,
  `rate` decimal(12,2) NOT NULL DEFAULT 0.00,
  `status` varchar(30) CHARACTER SET latin1 NOT NULL,
  `create_by` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `payroll_tax_setup`
--

INSERT INTO `payroll_tax_setup` (`tax_setup_id`, `start_amount`, `end_amount`, `rate`, `status`, `create_by`) VALUES
(1, '0.00', '0.00', '0.00', '', ''),
(2, '0.00', '1.40', '0.00', '', ''),
(3, '0.00', '1.75', '20000.00', '', ''),
(4, '0.00', '3.50', '25000.00', '', ''),
(5, '0.00', '5.00', '20000.00', '', ''),
(6, '0.00', '6.37', '20000.00', '', ''),
(7, '0.00', '8.97', '0.00', '', ''),
(8, '0.00', '10.75', '20001.00', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `personal_loan`
--

CREATE TABLE `personal_loan` (
  `per_loan_id` int(11) NOT NULL,
  `transaction_id` varchar(30) NOT NULL,
  `person_id` varchar(30) NOT NULL,
  `debit` decimal(12,2) DEFAULT 0.00,
  `credit` decimal(12,2) NOT NULL DEFAULT 0.00,
  `date` varchar(30) NOT NULL,
  `details` varchar(100) NOT NULL,
  `status` int(11) NOT NULL COMMENT '1=no paid,2=paid'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `person_information`
--

CREATE TABLE `person_information` (
  `id` int(11) NOT NULL,
  `person_id` varchar(50) NOT NULL,
  `person_name` varchar(50) NOT NULL,
  `person_phone` varchar(50) NOT NULL,
  `person_address` text NOT NULL,
  `status` int(11) NOT NULL,
  `create_by` varchar(100) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `person_information`
--

INSERT INTO `person_information` (`id`, `person_id`, `person_name`, `person_phone`, `person_address`, `status`, `create_by`) VALUES
(1, 'RTCS6S6RFS', 'Satyam Loan', '8543986351', 'Prem chand park road behind sarwang hospital Betiahata', 1, '1');

-- --------------------------------------------------------

--
-- Table structure for table `person_ledger`
--

CREATE TABLE `person_ledger` (
  `id` int(11) NOT NULL,
  `transaction_id` varchar(50) NOT NULL,
  `person_id` varchar(50) NOT NULL,
  `date` varchar(50) NOT NULL,
  `debit` decimal(12,2) NOT NULL DEFAULT 0.00,
  `credit` decimal(12,2) NOT NULL DEFAULT 0.00,
  `details` text NOT NULL,
  `status` int(11) NOT NULL COMMENT '1=no paid,2=paid'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `person_ledger`
--

INSERT INTO `person_ledger` (`id`, `transaction_id`, `person_id`, `date`, `debit`, `credit`, `details`, `status`) VALUES
(1, 'E6ROM5D37K', 'RTCS6S6RFS', '2022-01-18', '20.00', '0.00', 'Urgent issue', 1),
(2, 'OFTLWJY2UO', '1', '2023-06-14', '3000.00', '0.00', 'tertert', 1),
(3, 'BO6118UUF5', '1', '2023-06-14', '100.00', '0.00', 'satyam bought 100 rupees', 1),
(4, 'C3JC4CD79B', '1', '2023-06-14', '7777.00', '0.00', '678678678678', 1),
(5, '6ROB92PGVM', '1', '2023-06-18', '500.00', '0.00', 'uhoihoih', 1),
(6, '31BRHMLPQ3', '1', '2023-06-30', '522.00', '0.00', 'fsfs', 1),
(7, '9OGJWUCKF4', '1', '2023-06-14', '34534.00', '0.00', '345345', 1),
(8, 'WOABTHIQXT', '1', '2023-06-14', '34534.00', '0.00', '345345', 1),
(9, '8OKDYRA9OM', '1', '2023-06-14', '34534.00', '0.00', '345345', 1),
(10, 'Z42QI5NNXY', '1', '2023-06-14', '34534.00', '0.00', '345345', 1),
(11, 'C5UIU8ALU5', '1', '2023-06-14', '34534.00', '0.00', '345345', 1),
(12, 'B79HDOP5KH', '1', '2023-06-14', '34534.00', '0.00', '345345', 1),
(13, '2CCD9L2XJD', '1', '2023-06-14', '34534.00', '0.00', '345345', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pesonal_loan_information`
--

CREATE TABLE `pesonal_loan_information` (
  `id` int(11) NOT NULL,
  `person_id` varchar(50) NOT NULL,
  `person_name` varchar(50) NOT NULL,
  `person_phone` varchar(30) NOT NULL,
  `person_address` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE `product_category` (
  `id` int(11) NOT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `category_id` varchar(255) DEFAULT NULL,
  `category_name` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`id`, `created_by`, `category_id`, `category_name`, `status`) VALUES
(4, '38', 'BJ7Q82RSL9JRAGJ', 'STONES', 1),
(5, '38', '5D6GARQYIC6LSE6', 'categorynamr', 1),
(6, '38', 'LYUXA2GJ4T4JZIF', 'CATNAME', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_details`
--

CREATE TABLE `product_details` (
  `thickness` varchar(250) DEFAULT NULL,
  `supplier_block_no` int(11) DEFAULT NULL,
  `supplier_slab_no` int(11) DEFAULT NULL,
  `g_width` int(11) DEFAULT NULL,
  `g_height` int(11) DEFAULT NULL,
  `gross_sqft` varchar(250) DEFAULT NULL,
  `bundle_no` int(11) DEFAULT NULL,
  `n_width` int(11) DEFAULT NULL,
  `n_height` int(11) DEFAULT NULL,
  `net_sqft` varchar(250) DEFAULT NULL,
  `cost_sqft` varchar(250) DEFAULT NULL,
  `cost_slab` varchar(250) DEFAULT NULL,
  `sales_price_sqft` varchar(250) DEFAULT NULL,
  `sales_slab_price` varchar(250) DEFAULT NULL,
  `weight` varchar(250) DEFAULT NULL,
  `origin` varchar(250) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `id` int(11) NOT NULL,
  `description_table` varchar(250) DEFAULT NULL,
  `total_amt` varchar(250) DEFAULT NULL,
  `create_by` int(11) NOT NULL,
  `product_id` varchar(250) NOT NULL,
  `notes` varchar(250) DEFAULT NULL,
  `block` varchar(250) DEFAULT NULL,
  `img` varchar(250) DEFAULT NULL,
  `overall_total` varchar(250) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_details`
--

INSERT INTO `product_details` (`thickness`, `supplier_block_no`, `supplier_slab_no`, `g_width`, `g_height`, `gross_sqft`, `bundle_no`, `n_width`, `n_height`, `net_sqft`, `cost_sqft`, `cost_slab`, `sales_price_sqft`, `sales_slab_price`, `weight`, `origin`, `status`, `id`, `description_table`, `total_amt`, `create_by`, `product_id`, `notes`, `block`, `img`, `overall_total`) VALUES
('45', 45, 45, 45, 45, '14.063', 45, 45, 45, '14.063', '45', '45', '632.835', '632.835', '45', '45', 1, 1, 'ONE', '632.835', 38, '248639596', NULL, NULL, NULL, NULL),
('55', 55, 55, 55, 55, '21.007', 55, 55, 55, '21.007', '55', '55', '1155.385', '2310.770', '55', '55', 1, 2, 'Two', '2310.770', 38, '248639596', NULL, NULL, NULL, NULL),
('78', 78, 78, 78, 78, '42.250', 88, 88, 78, '47.667', '88', '88', '4194.696', '12584.088', '88', '88', 1, 3, 'Three', '12584.088', 38, '248639596', NULL, NULL, NULL, NULL),
('78', 78, 778, 78, 88, '47.667', 78, 88, 888, '542.667', '66', '66', '35816.022', '71632.044', '88', '88', 1, 21, '78', '71632.04', 38, '8498321141', NULL, NULL, NULL, '71632.04'),
('55', 55, 55, 55, 55, '21.007', 55, 55, 55, '21.007', '66', '66', '1386.462', '1386.462', '55', '55', 1, 22, 'Description', NULL, 38, '8498321141', NULL, NULL, NULL, '26568'),
('55', 555, 555, 55, 55, '21.007', 55, 55, 55, '21.007', '66', '66', '1386.462', '4159.386', '55', '55', 1, 20, '55', '4159.39', 38, '8498321141', NULL, NULL, NULL, '4159.39'),
('77', 77, 77, 77, 77, '41.174', 77, 77, 77, '41.174', '66', '66', '27167.484', '1113847.000', '77', '77', 1, 16, '77', '1113847.000', 38, '8498321141', NULL, NULL, NULL, '1113847.000'),
('89', 89, 89, 98, 989, '673.069', 89, 89, 89, '55.007', '66', '66', '3630.462', '10891.386', '89', '89', 1, 9, '98', NULL, 38, '8498321141', NULL, NULL, NULL, '26568'),
('77', 77, 77, 77, 77, '41.174', 77, 77, 77, '41.174', '66', '66', '2717.484', '5434.968', '77', '77', 1, 23, '77', NULL, 38, '8498321141', NULL, NULL, NULL, '26568'),
('89', 89, 89, 98, 989, '673.069', 89, 89, 89, '55.007', '66', '66', '3630.462', '10891.386', '89', '89', 1, 24, '98', NULL, 38, '8498321141', NULL, NULL, NULL, '26568'),
('3', 3, 3, 3, 33, '0.688', 34, 33, 333, '76.313', '700', '700', '53419.100', '106838.200', '333', '33', 1, 407, '3', '106925.200', 38, '841306731', NULL, NULL, NULL, '160387'),
('2', 2, 2, 2, 2, '0.028', 2, 2, 2, '0.028', '0.00', '0.00', '0.000', '0.000', '2', '2', 1, 35, '2', '0.000', 87, '', NULL, NULL, NULL, '0.000'),
('456', 567, 6567, 567, 67, '263.813', 45, 567, 556, '2189.250', '700', '700', '1532475.000', '1532475.000', '56', '56', 1, 229, '456', '1532475.000', 38, '841306731', NULL, NULL, NULL, '2336629.00'),
('55', 55, 55, 55, 55, '21.007', 55, 55, 55, '21.007', '66', '66', '1386.462', '1386.462', '55', '55', 1, 40, 'Description', NULL, 38, '8498321141', NULL, NULL, NULL, '26568'),
('77', 77, 77, 77, 77, '41.174', 77, 77, 77, '41.174', '66', '66', '2717.484', '5434.968', '77', '77', 1, 41, '77', NULL, 38, '8498321141', NULL, NULL, NULL, '26568'),
('89', 89, 89, 98, 989, '673.069', 89, 89, 89, '55.007', '66', '66', '3630.462', '10891.386', '89', '89', 1, 42, '98', NULL, 38, '8498321141', NULL, NULL, NULL, '26568'),
('5', 5678, 768, 768768, 768, '4100096.000', 34, 768, 678, '3616.000', '66', '66', '238656.000', '715968.000', '678', '678', 1, 45, '534', '715968.000', 38, '8498321141', NULL, NULL, NULL, '1448769'),
('34', 34, 33, 334, 34, '78.861', 77, 566, 65, '255.486', '70', '07', '17884.020', '35768.040', '880', '789', 1, 187, 'RTRE', '35768.040', 38, '841306731', '                  \r\n          ', 'off', NULL, NULL),
('  5', 565, 65, 65, 66, ' 29.792', 56, 56, 56, '21.778', '  500', '500', '10889.000', '32667.000', '56', '5', 1, 237, '  56', '5565', 38, '1329325566', NULL, NULL, NULL, NULL),
('55', 55, 55, 55, 55, '21.007', 55, 55, 55, '21.007', '55', '55', '1155.385', '1155.385', '55', '55', 1, 244, 'ETRE', '1155.39', 38, '841306731', NULL, NULL, NULL, '1155.39'),
('  45', 45, 45, 45, 45, ' 14.063', 56, 45, 45, '14.063', '  500', '500', '7031.500', '14063.000', '45', '45', 1, 238, '  464', '45547', 38, '1329325566', NULL, NULL, NULL, NULL),
('55', 55, 5, 55, 55, '21.007', 55, 55, 55, '21.007', '555', '555', '11658.885', '11658.885', '55', '55', 1, 157, 'Description', NULL, 87, '1928949362', NULL, NULL, NULL, '3674244'),
('45', 45, 45, 45, 45, '14.063', 55, 45, 45, '14.063', '500', '500', '7031.500', '7031.500', '45', '45', 1, 242, 'RYEYEY', '7031.50', 38, '1329325566', NULL, NULL, NULL, '7031.50'),
('55', 67, 34, 23, 45, '7.188', 34, 45, 45, '14.063', '500', '500', '7031.500', '21094.500', '32', '23', 1, 241, 'EDYYR', '21094.50', 38, '1329325566', NULL, NULL, NULL, '21094.50'),
(' 56', 67, 67, 65, 567, ' 255.938', 76, 67, 54, '25.125', ' 500', '500', '12562.500', '25125.000', '45', '67', 1, 234, ' TRUTTU', '25125.000', 38, '1329325566', NULL, NULL, NULL, NULL),
('77', 77, 77, 777, 77, '415.479', 77, 77, 77, '41.174', '555', '555', '22851.570', '45703.140', '777', '777', 1, 152, 'Description', '45703.140', 87, '1928949362', NULL, NULL, NULL, '220353.00'),
('55', 55, 5, 55, 55, '21.007', 55, 55, 55, '21.007', '555', '555', '11658.885', '11658.885', '55', '55', 1, 145, 'Description', NULL, 87, '1928949362', NULL, NULL, NULL, '3674244'),
('46', 45, 56, 56, 56, '21.778', 546, 56, 45, '17.500', '56', '56', '980.000', '980.000', '56', '546', 1, 154, 'MARB', '980.00', 87, '1928949362', NULL, NULL, NULL, '980.00'),
('56', 56, 56, 66, 66, '30.250', 67, 67, 67, '31.174', '67', '67', '2088.658', '2088.658', '67', '5678', 1, 163, 'DHF', '2088.658', 87, '1637315826', NULL, NULL, NULL, '2088.658'),
('55', 55, 5, 55, 55, '21.007', 55, 55, 55, '21.007', '555', '555', '11658.885', '11658.885', '55', '55', 1, 142, 'Description', NULL, 87, '1928949362', NULL, NULL, NULL, '3674244'),
(' 23', 23, 234, 34, 342, ' 80.750', 23, 23, 23, '3.674', ' 43', '34', '157.982', '473.946', '343', '23', 1, 243, ' KHHG', '473.95', 38, '1329325566', NULL, NULL, NULL, '473.95'),
(' 34', 34, 34, 54, 45, ' 16.875', 45, 45, 45, '14.063', ' 45', '45', '632.835', '632.835', '45', '45', 1, 245, ' WERER', '632.84', 38, '1329325566', NULL, NULL, NULL, '632.84'),
(' 456', 45, 56, 65, 56, ' 25.278', 67, 65, 56, '25.278', ' 500', '500', '12639.000', '25278.000', '56', '56', 1, 230, ' 45REYY', '25278.000', 38, '1329325566', NULL, NULL, NULL, NULL),
('46', 45, 56, 56, 56, '21.778', 10, 56, 45, '17.500', '56', '56', '980.000', '980.000', '56', '546', 1, 156, 'MARB', '980.00', 87, '1928949362', NULL, NULL, NULL, '980.00'),
('55', 55, 5, 55, 55, '21.007', 55, 55, 55, '21.007', '555', '555', '11658.885', '11658.885', '55', '55', 1, 139, 'Description', NULL, 87, '1928949362', NULL, NULL, NULL, '3674244'),
('  45', 45, 54, 456, 45, ' 142.500', 456, 456, 56, '177.333', '  565', '56', '100193.145', '400772.580', '56', '56', 1, 233, '  JTYUT', '400772.580', 38, '1329325566', NULL, NULL, NULL, NULL),
('2', 2, 2, 2, 2, '0.028', 2, 2, 2, '0.028', '2', '2', '0.056', '0.112', '22', '4234', 1, 251, '44', '0.112', 92, '1566412787', NULL, NULL, NULL, '0.112'),
('5', 5, 5, 5, 5, '0.174', 5, 5, 555, '19.271', '5', '5', '96.355', '96.355', 'dfgg', '5445', 1, 250, 'dfgdg', '96.355', 92, '1566412787', NULL, NULL, NULL, '96.355'),
('14', 14, 14, 14, 14, '1.361', 14, 14, 14, '1.361', '500', '500', '680.500', '1361.000', '14', '14', 1, 387, '14', '1361.000', 38, '1329325566', NULL, NULL, NULL, '5655'),
('12', 12, 12, 12, 12, '1.000', 12, 12, 12, '1.000', '500', '500', '500.000', '1000.000', '12', '121', 1, 385, '12', '1000.000', 38, '1329325566', NULL, NULL, NULL, '5655'),
('11', 11, 11, 11, 11, '0.840', 11, 11, 11, '0.840', '700', '700', '588.000', '588.000', '11', '11', 1, 384, '11', '588.000', 38, '841306731', NULL, NULL, NULL, '5655'),
('678', 768, 678, 678, 67, '315.458', 456, 678, 78, '367.250', '700', '700', '257075.000', '514150.000', '678', '678', 1, 379, '456', '1157917.1', 38, '841306731', NULL, NULL, NULL, '72920223'),
('678', 678, 678, 678, 778, '3663.083', 678, 78, 778, '421.417', '500', '500', '210708.500', '632125.500', '78', '877', 1, 377, '678', '1157917.1', 38, '1329325566', NULL, NULL, NULL, '72920223'),
('44', 44, 44, 44, 44, '13.444', 44, 44, 44, '13.444', '500', '500', '6722.000', '6722.000', '44', '44', 1, 378, '44', '1157917.1', 38, '1329325566', NULL, NULL, NULL, '72920223'),
('3', 3, 3, 3, 3, '0.063', 3, 3, 35, '0.729', '500', '500', '364.500', '364.500', '3', '3', 1, 394, '3', '543.7', 38, '1329325566', NULL, NULL, NULL, '2685'),
('13', 13, 13, 13, 13, '1.174', 13, 13, 13, '1.174', '700', '700', '821.800', '821.800', '13', '13', 1, 386, '13', '821.800', 38, '841306731', NULL, NULL, NULL, '5655'),
('3', 3, 3, 3, 3, '0.063', 3, 3, 333, '6.938', '700', '700', '4856.600', '4856.600', '3', '3', 1, 381, '3', '1157917.1', 38, '841306731', NULL, NULL, NULL, '72920223'),
('2', 2, 2, 2, 2, '0.028', 2, 2, 23, '0.319', '500', '500', '159.500', '159.500', '2', '2', 1, 392, '2', '159.500', 38, '1329325566', NULL, NULL, NULL, '2685'),
('1', 1, 1, 1, 1, '0.007', 1, 1, 1, '0.007', '700', '700', '4.900', '9.800', '1', '1', 1, 393, '1', '543.7', 38, '841306731', NULL, NULL, NULL, '2685'),
('4', 4, 4, 4, 4, '0.111', 4, 4, 4, '0.111', '700', '700', '77.700', '155.400', '4', '4', 1, 395, '4', '543.7', 38, '841306731', NULL, NULL, NULL, '2685'),
('8', 8, 8, 8, 8, '0.444', 8, 8, 8, '0.444', '500', '500', '222.000', '222.000', '8', '88', 1, 398, '8', '1010.200', 38, '1329325566', NULL, NULL, NULL, '1515'),
('9', 9, 9, 9, 9, '0.563', 9, 9, 9, '0.563', '700', '700', '394.100', '788.200', '9', '99', 1, 399, '9', '1010.200', 38, '841306731', NULL, NULL, NULL, '1515'),
('5', 5, 5, 5, 5, '0.174', 5, 5, 5, '0.174', '500', '500', '87.000', '87.000', '5', '5', 1, 406, '5', '106925.200', 38, '1329325566', NULL, NULL, NULL, '160387');

-- --------------------------------------------------------

--
-- Table structure for table `product_information`
--

CREATE TABLE `product_information` (
  `id` int(11) NOT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `barcode` varchar(250) NOT NULL,
  `product_id` varchar(100) NOT NULL,
  `category_id` varchar(255) DEFAULT NULL,
  `product_name` varchar(255) NOT NULL,
  `price` float DEFAULT NULL,
  `unit` varchar(50) DEFAULT NULL,
  `p_quantity` int(11) NOT NULL DEFAULT 0,
  `serial_no` varchar(200) DEFAULT NULL,
  `product_model` varchar(100) DEFAULT NULL,
  `product_details` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `product_sub_category` varchar(250) DEFAULT NULL,
  `account_category_name` varchar(250) DEFAULT NULL,
  `account_sub_category` varchar(250) DEFAULT NULL,
  `account_category` varchar(250) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `supplier_name` varchar(250) DEFAULT NULL,
  `tax` varchar(250) DEFAULT NULL,
  `cost_persqft` varchar(250) DEFAULT NULL,
  `cost_perslab` varchar(222) DEFAULT NULL,
  `sales_pricepersqft` varchar(250) DEFAULT NULL,
  `sales_slabprice` varchar(250) DEFAULT NULL,
  `sub_category` varchar(250) DEFAULT NULL,
  `oa_total` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_information`
--

INSERT INTO `product_information` (`id`, `created_by`, `barcode`, `product_id`, `category_id`, `product_name`, `price`, `unit`, `p_quantity`, `serial_no`, `product_model`, `product_details`, `image`, `status`, `product_sub_category`, `account_category_name`, `account_sub_category`, `account_category`, `country`, `supplier_name`, `tax`, `cost_persqft`, `cost_perslab`, `sales_pricepersqft`, `sales_slabprice`, `sub_category`, `oa_total`) VALUES
(19, '38', '34535', '1329325566', 'STONES', 'TESTPRODUCT', 500, 'KG', 500, '456,YTg,ggG', '55', 'PRODUCT', NULL, 1, 'Quartzite', 'name_category', 'Category', '2000 LIABILITIES & 2100 PAYABLES', 'US-United States', '15', '55%', NULL, NULL, NULL, NULL, '2150 Current Maturities of Long-Term Debt', '531520.37'),
(17, '38', '123123321', '841306731', 'CATNAME', 'PRODUCTTEST', 700, 'KK', 50, '454,SDF,dDD', '55', 'PRODUCTDDDDDDDDDDDDDD', NULL, 1, 'Lime Stone', 'ACCOUNT', 'Category', '2700 LONG-TERM DEBT', 'US-United States', '12', '55%', NULL, NULL, NULL, NULL, '2720 LTD – Mortgages Payable', '36923.425'),
(20, '92', '4564654', '1566412787', 'categorynamr', 'ChaiPro', 535, '', 3, '3434534', 'CP', 'ertertet', NULL, 1, 'Quartz', '345345', '345343453', '1400 PREPAID EXPENSES & OTHER CURRENT ASSETS', 'US-United States', '16', '3%', NULL, NULL, NULL, NULL, '1440 PREPAID – Rent', '0.982');

-- --------------------------------------------------------

--
-- Table structure for table `product_purchase`
--

CREATE TABLE `product_purchase` (
  `id` int(11) NOT NULL,
  `purchase_id` bigint(20) NOT NULL,
  `chalan_no` varchar(100) DEFAULT NULL,
  `supplier_id` bigint(20) DEFAULT NULL,
  `total_amt` varchar(250) NOT NULL,
  `grand_total_amount` decimal(12,2) DEFAULT 0.00,
  `gtotal_preferred_currency` varchar(250) DEFAULT NULL,
  `total_tax` varchar(250) NOT NULL,
  `paid_amount` varchar(250) DEFAULT '0.00',
  `balance` varchar(250) DEFAULT NULL,
  `payment_id` int(11) DEFAULT NULL,
  `total_discount` decimal(10,2) DEFAULT NULL,
  `purchase_date` varchar(50) DEFAULT NULL,
  `payment_due_date` varchar(255) DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  `message_invoice` varchar(255) DEFAULT '',
  `etd` varchar(255) DEFAULT NULL,
  `eta` varchar(255) DEFAULT NULL,
  `shipping_line` varchar(255) DEFAULT NULL,
  `container_no` varchar(255) DEFAULT NULL,
  `bl_number` varchar(255) DEFAULT NULL,
  `isf_filling` varchar(255) DEFAULT NULL,
  `purchase_details` text DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `bank_id` varchar(30) DEFAULT NULL,
  `packing_id` varchar(250) DEFAULT NULL,
  `payment_type` varchar(111) DEFAULT NULL,
  `create_by` varchar(100) DEFAULT NULL,
  `image` varchar(500) DEFAULT NULL,
  `payment_terms` varchar(111) DEFAULT NULL,
  `Port_of_discharge` varchar(150) DEFAULT NULL,
  `overall_gross` varchar(250) NOT NULL,
  `overall_net` varchar(250) NOT NULL,
  `g_weight` varchar(250) NOT NULL,
  `total_gross` varchar(250) DEFAULT NULL,
  `total_net` varchar(250) DEFAULT NULL,
  `total_weight` varchar(250) DEFAULT NULL,
  `amount_pay_usd` varchar(250) DEFAULT '0',
  `due_amount_usd` varchar(250) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_purchase`
--

INSERT INTO `product_purchase` (`id`, `purchase_id`, `chalan_no`, `supplier_id`, `total_amt`, `grand_total_amount`, `gtotal_preferred_currency`, `total_tax`, `paid_amount`, `balance`, `payment_id`, `total_discount`, `purchase_date`, `payment_due_date`, `remarks`, `message_invoice`, `etd`, `eta`, `shipping_line`, `container_no`, `bl_number`, `isf_filling`, `purchase_details`, `status`, `bank_id`, `packing_id`, `payment_type`, `create_by`, `image`, `payment_terms`, `Port_of_discharge`, `overall_gross`, `overall_net`, `g_weight`, `total_gross`, `total_net`, `total_weight`, `amount_pay_usd`, `due_amount_usd`) VALUES
(46, 20230616093624, 'PO202306-1', 15, '1790.6000000000001', '2685.00', '2685', '895.000 ( OA36X6AKVT-50% )', '2000', '685', 544427627, NULL, '2023-06-16', '2023-06-20', '111', 'dfgdfgdgf', '', '', NULL, '', '', '', NULL, 1, NULL, NULL, 'BANK TRANSFER', '38', '', 'ADVANCE', '0', '', '', '', '0.20900000000000002', '1.166', '10.000', '2000.00', '685.00'),
(44, 20230616082723, '345345', 12, '3770.8', '5655.00', '5655', '1885.000 ( OA36X6AKVT-50% )', '2000', '3655', 1063201010, NULL, '2023-06-12', '2023-06-14', 'we111rwerwe', 'rwerwer', '2023-06-13', '2023-06-21', NULL, '345345345', '345345353', '', NULL, 1, NULL, NULL, 'CREDIT/DEBIT CARD', '38', '', 'ADVANCE', '35434535', '', '', '', '4.375', '4.375', '50.000', '', ''),
(48, 20230616095005, 'PO202306-2', 12, '1010.200', '1515.00', '1515', '505.000 ( OA36X6AKVT-50% )', '1000', '515', 231592572, NULL, '2023-06-16', '2023-06-21', '789', ' 78 9789 ', '', '', NULL, '', '', '', NULL, 1, NULL, NULL, 'CHEQUE', '38', '', 'COD', '0', '', '', '', '1.007', '1.007', '17.000', '1000.00', '515.00'),
(52, 20230616111238, 'PO202306-5', 12, '106925.200', '160387.00', '160387', '53462.500 ( OA36X6AKVT-50% )', '160300', '87', 183861671, NULL, '2023-06-16', '2023-06-20', '111111', 'ertert', '', '', NULL, '', '', '', NULL, 1, NULL, NULL, 'CREDIT/DEBIT CARD', '38', '', 'ADVANCE', '0', '', '', '', '0.8619999999999999', '76.487', '338.000', '160300.00', '87.00');

-- --------------------------------------------------------

--
-- Table structure for table `product_purchase_details`
--

CREATE TABLE `product_purchase_details` (
  `id` int(11) NOT NULL,
  `purchase_detail_id` varchar(100) DEFAULT NULL,
  `purchase_id` bigint(20) DEFAULT NULL,
  `tableid` varchar(250) NOT NULL,
  `product_id` varchar(30) DEFAULT NULL,
  `slab` varchar(250) DEFAULT NULL,
  `product_name` varchar(250) DEFAULT NULL,
  `quantity` decimal(10,2) DEFAULT NULL,
  `rate` decimal(10,2) DEFAULT NULL,
  `total_amount` varchar(250) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `discount` float DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `create_by` varchar(100) NOT NULL,
  `thickness` int(11) DEFAULT NULL,
  `supplier_block_no` int(11) DEFAULT NULL,
  `supplier_slab_no` int(11) DEFAULT NULL,
  `gross_width` int(11) DEFAULT NULL,
  `gross_height` int(11) DEFAULT NULL,
  `gross_sq_ft_1` varchar(250) DEFAULT NULL,
  `bundle_no` int(11) DEFAULT NULL,
  `slab_no` int(11) DEFAULT NULL,
  `net_width` int(11) DEFAULT NULL,
  `net_height` int(11) DEFAULT NULL,
  `net_sq_ft` varchar(250) DEFAULT NULL,
  `weight` int(11) DEFAULT NULL,
  `origin` int(11) DEFAULT NULL,
  `total` varchar(250) DEFAULT NULL,
  `cost_sq_ft` varchar(250) DEFAULT NULL,
  `cost_sq_slab` varchar(250) DEFAULT NULL,
  `sales_amt_sq_ft` varchar(250) DEFAULT NULL,
  `sales_slab_amt` varchar(222) DEFAULT NULL,
  `overall_gross` varchar(250) DEFAULT NULL,
  `overall_net` varchar(250) DEFAULT NULL,
  `overall_total` varchar(250) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_purchase_details`
--

INSERT INTO `product_purchase_details` (`id`, `purchase_detail_id`, `purchase_id`, `tableid`, `product_id`, `slab`, `product_name`, `quantity`, `rate`, `total_amount`, `description`, `discount`, `status`, `create_by`, `thickness`, `supplier_block_no`, `supplier_slab_no`, `gross_width`, `gross_height`, `gross_sq_ft_1`, `bundle_no`, `slab_no`, `net_width`, `net_height`, `net_sq_ft`, `weight`, `origin`, `total`, `cost_sq_ft`, `cost_sq_slab`, `sales_amt_sq_ft`, `sales_slab_amt`, `overall_gross`, `overall_net`, `overall_total`) VALUES
(218, 'hxztqEYIMi8P07J', 20230616111238, '1', '1329325566', NULL, 'TESTPRODUCT', NULL, NULL, NULL, '5', NULL, 1, '38', 5, 5, 5, 5, 5, '0.174', 5, NULL, 5, 5, '0.174', 5, 5, '106925.200', '500', '500', '87.000', '87.000', NULL, NULL, NULL),
(206, 'mX8keHK6OM6YHhL', 20230616093624, '2', '1329325566', NULL, 'TESTPRODUCT', NULL, NULL, NULL, '3', NULL, 1, '38', 3, 3, 3, 3, 3, '0.063', 3, NULL, 3, 35, '0.729', 3, 3, '543.7', '500', '500', '364.500', '364.500', NULL, NULL, NULL),
(207, 'KJYxXaC7KkBq3FD', 20230616093624, '21', '841306731', NULL, 'PRODUCTTEST', NULL, NULL, NULL, '4', NULL, 1, '38', 4, 4, 4, 4, 4, '0.111', 4, NULL, 4, 4, '0.111', 4, 4, '543.7', '700', '700', '77.700', '155.400', NULL, NULL, NULL),
(219, 'QG1KlEcSNZ3d5Wx', 20230616111238, '11', '841306731', NULL, 'PRODUCTTEST', NULL, NULL, NULL, '3', NULL, 1, '38', 3, 3, 3, 3, 33, '0.688', 34, NULL, 33, 333, '76.313', 333, 33, '106925.200', '700', '700', '53419.100', '106838.200', NULL, NULL, NULL),
(210, 'iLJApE3L3XXp6VO', 20230616095005, '1', '1329325566', NULL, 'TESTPRODUCT', NULL, NULL, NULL, '8', NULL, 1, '38', 8, 8, 8, 8, 8, '0.444', 8, NULL, 8, 8, '0.444', 8, 88, '1010.200', '500', '500', '222.000', '222.000', NULL, NULL, NULL),
(211, 'E3nQvSuz3vWSBIM', 20230616095005, '11', '841306731', NULL, 'PRODUCTTEST', NULL, NULL, NULL, '9', NULL, 1, '38', 9, 9, 9, 9, 9, '0.563', 9, NULL, 9, 9, '0.563', 9, 99, '1010.200', '700', '700', '394.100', '788.200', NULL, NULL, NULL),
(204, 'zvtyaoKXtYMcih', 20230616093624, '1', '1329325566', NULL, 'TESTPRODUCT', NULL, NULL, NULL, '2', NULL, 1, '38', 2, 2, 2, 2, 2, '0.028', 2, NULL, 2, 23, '0.319', 2, 2, '159.500', '500', '500', '159.500', '159.500', NULL, NULL, NULL),
(205, 'z6KP25LQVDPjdVV', 20230616093624, '11', '841306731', NULL, 'PRODUCTTEST', NULL, NULL, NULL, '1', NULL, 1, '38', 1, 1, 1, 1, 1, '0.007', 1, NULL, 1, 1, '0.007', 1, 1, '543.7', '700', '700', '4.900', '9.800', NULL, NULL, NULL),
(199, 'RsRXkBClTc7815G', 20230616082723, '21', '1329325566', NULL, 'TESTPRODUCT-55', NULL, NULL, NULL, '14', NULL, 1, '38', 14, 14, 14, 14, 14, '1.361', 14, NULL, 14, 14, '1.361', 14, 14, '1361.000', '500', '500', '680.500', '1361.000', NULL, NULL, NULL),
(198, 'UeJygL9FH5tFjIp', 20230616082723, '2', '841306731', NULL, 'PRODUCTTEST-55', NULL, NULL, NULL, '13', NULL, 1, '38', 13, 13, 13, 13, 13, '1.174', 13, NULL, 13, 13, '1.174', 13, 13, '821.800', '700', '700', '821.800', '821.800', NULL, NULL, NULL),
(196, '2PsNY5wN9KCH0a6', 20230616082723, '1', '841306731', NULL, 'PRODUCTTEST', NULL, NULL, NULL, '11', NULL, 1, '38', 11, 11, 11, 11, 11, '0.840', 11, NULL, 11, 11, '0.840', 11, 11, '588.000', '700', '700', '588.000', '588.000', NULL, NULL, NULL),
(197, 'NMGcZHolxpwbttJ', 20230616082723, '11', '1329325566', NULL, 'TESTPRODUCT', NULL, NULL, NULL, '12', NULL, 1, '38', 12, 12, 12, 12, 12, '1.000', 12, NULL, 12, 12, '1.000', 12, 121, '1000.000', '500', '500', '500.000', '1000.000', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_return`
--

CREATE TABLE `product_return` (
  `return_id` varchar(30) CHARACTER SET latin1 NOT NULL,
  `product_id` varchar(20) CHARACTER SET latin1 NOT NULL,
  `invoice_id` varchar(20) CHARACTER SET latin1 NOT NULL,
  `purchase_id` varchar(30) CHARACTER SET latin1 DEFAULT NULL,
  `date_purchase` varchar(20) CHARACTER SET latin1 NOT NULL,
  `date_return` varchar(30) CHARACTER SET latin1 NOT NULL,
  `byy_qty` float NOT NULL,
  `ret_qty` float NOT NULL,
  `customer_id` varchar(20) CHARACTER SET latin1 NOT NULL,
  `supplier_id` varchar(30) CHARACTER SET latin1 NOT NULL,
  `product_rate` decimal(10,2) NOT NULL DEFAULT 0.00,
  `deduction` float NOT NULL,
  `total_deduct` decimal(10,2) NOT NULL DEFAULT 0.00,
  `total_tax` decimal(10,2) NOT NULL DEFAULT 0.00,
  `total_ret_amount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `net_total_amount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `reason` text CHARACTER SET latin1 NOT NULL,
  `usablity` int(11) NOT NULL,
  `create_by` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `product_service`
--

CREATE TABLE `product_service` (
  `service_id` int(11) NOT NULL,
  `service_name` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `charge` decimal(10,2) NOT NULL DEFAULT 0.00,
  `create_by` varchar(100) NOT NULL,
  `tax0` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `profarma_invoice`
--

CREATE TABLE `profarma_invoice` (
  `id` int(11) NOT NULL,
  `purchase_id` bigint(20) DEFAULT NULL,
  `chalan_no` varchar(255) DEFAULT NULL,
  `purchase_date` varchar(255) DEFAULT NULL,
  `billing_address` text DEFAULT NULL,
  `customer_id` int(11) NOT NULL,
  `pre_carriage` text DEFAULT NULL,
  `receipt` text DEFAULT NULL,
  `country_goods` text DEFAULT NULL,
  `country_destination` text DEFAULT NULL,
  `loading` text DEFAULT NULL,
  `discharge` text DEFAULT NULL,
  `terms_payment` text DEFAULT NULL,
  `description_goods` varchar(250) DEFAULT NULL,
  `total` float DEFAULT NULL,
  `customer_gtotal` varchar(250) DEFAULT NULL,
  `tax_details` varchar(250) NOT NULL DEFAULT '0',
  `gtotal` varchar(250) NOT NULL,
  `amt_paid` varchar(250) NOT NULL,
  `bal_amt` varchar(250) NOT NULL,
  `payment_id` varchar(250) NOT NULL,
  `ac_details` varchar(255) DEFAULT NULL,
  `sales_by` varchar(255) DEFAULT NULL,
  `remarks` varchar(250) DEFAULT NULL,
  `total_gross` varchar(250) NOT NULL,
  `total_net` varchar(250) NOT NULL,
  `total_weight` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profarma_invoice`
--

INSERT INTO `profarma_invoice` (`id`, `purchase_id`, `chalan_no`, `purchase_date`, `billing_address`, `customer_id`, `pre_carriage`, `receipt`, `country_goods`, `country_destination`, `loading`, `discharge`, `terms_payment`, `description_goods`, `total`, `customer_gtotal`, `tax_details`, `gtotal`, `amt_paid`, `bal_amt`, `payment_id`, `ac_details`, `sales_by`, `remarks`, `total_gross`, `total_net`, `total_weight`) VALUES
(15, 20230607071452, 'PI202306-1', '2023-06-07', NULL, 8, 'RTYRU', 'RURTURT', 'Azerbaijan', 'Isle of Man', 'RTRTURU', 'RTRURUU', 'RTURTUT', 'RTURTUU', 57230, '85845', '28615.000 ( OA36X6AKVT-50 )', '85845', '4577', '81268', '863486152', '                                        He made some derogatory remark about her appearance.\r\nIt was an innocent remark, I didn\'t mean to hurt his feelings.', '38', ' \r\n                                        He made some derogatory remark about her appearance.\r\nIt was an innocent remark, I didn\'t mean to hurt his feelings.', '2225.383', '56.841', '557.000'),
(17, 20230607100225, 'PI202306-2', '2023-06-07', NULL, 9, 'precarriageby', 'PKPK', 'Aruba', 'Netherlands', 'portid loading', 'port of discharge', 'termsofpayment', 'HKJHLK', 10503.5, '2195136', '23680.000 ( OA36X6AKVT-50 )', '71040', '343464', '1851672', '1101617013', '                                        He made some derogatory remark about her appearance.It was an innocent remark, I didn\'t mean to hurt his feelings.', '38', '                                         He made some derogatory remark about her appearance.It was an innocent remark, I didn\'t mean to hurt his feelings.', '64.243', '42.021', '154.000');

-- --------------------------------------------------------

--
-- Table structure for table `profarma_invoice_details`
--

CREATE TABLE `profarma_invoice_details` (
  `id` int(11) NOT NULL,
  `purchase_detail_id` text DEFAULT NULL,
  `purchase_id` bigint(20) DEFAULT NULL,
  `product_id` varchar(222) DEFAULT NULL,
  `quantity` varchar(255) DEFAULT NULL,
  `rate` varchar(255) DEFAULT NULL,
  `total_amount` float DEFAULT NULL,
  `create_by` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `thickness` varchar(250) DEFAULT NULL,
  `tableid` varchar(250) NOT NULL,
  `description` varchar(250) DEFAULT NULL,
  `supplier_block_no` varchar(222) DEFAULT NULL,
  `supplier_slab_no` varchar(22) DEFAULT NULL,
  `gross_width` varchar(222) DEFAULT NULL,
  `gross_height` varchar(222) DEFAULT NULL,
  `gross_sq_ft` varchar(223) DEFAULT NULL,
  `bundle_no` varchar(22) DEFAULT NULL,
  `slab_no` varchar(222) DEFAULT NULL,
  `net_width` varchar(222) DEFAULT NULL,
  `net_height` varchar(111) DEFAULT NULL,
  `net_sq_ft` varchar(222) DEFAULT NULL,
  `cost_sq_ft` varchar(222) DEFAULT NULL,
  `cost_sq_slab` varchar(222) DEFAULT NULL,
  `sales_amt_sq_ft` varchar(222) DEFAULT NULL,
  `sales_slab_amt` varchar(222) DEFAULT NULL,
  `weight` varchar(222) DEFAULT NULL,
  `origin` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profarma_invoice_details`
--

INSERT INTO `profarma_invoice_details` (`id`, `purchase_detail_id`, `purchase_id`, `product_id`, `quantity`, `rate`, `total_amount`, `create_by`, `status`, `thickness`, `tableid`, `description`, `supplier_block_no`, `supplier_slab_no`, `gross_width`, `gross_height`, `gross_sq_ft`, `bundle_no`, `slab_no`, `net_width`, `net_height`, `net_sq_ft`, `cost_sq_ft`, `cost_sq_slab`, `sales_amt_sq_ft`, `sales_slab_amt`, `weight`, `origin`) VALUES
(44, '819832631918884', 20230607071452, '1329325566', NULL, NULL, 10500, 38, 1, '474', '1', '4545', '556', '55', '565', '556', '2181.528', '45', NULL, '56', '54', '21.000', '500', '500', '10500.000', '10500.000', '456', '456'),
(45, '579859475751517', 20230607071452, '1329325566', NULL, NULL, 14063, 38, 1, '45', '11', '464', '45', '45', '45', '45', '14.063', '56', NULL, '45', '45', '14.063', '500', '500', '7031.500', '14063.000', '45', '45'),
(46, '236814732554885', 20230607071452, '1329325566', NULL, NULL, 32667, 38, 1, '5', '12', '56', '565', '65', '65', '66', '29.792', '56', NULL, '56', '56', '21.778', '500', '500', '10889.000', '32667.000', '56', '5'),
(50, '815968174353533', 20230607100225, '1329325566', NULL, NULL, 10503.5, 38, 1, '55', '1', 'RYEYEY', '55', '34', '55', '55', '21.007', '55', NULL, '55', '55', '21.007', '500', '500', '10503.500', '10503.500', '55', '55'),
(51, '696164134551553', 20230607100225, '841306731', NULL, NULL, 14544.6, 38, 1, '34', '11', 'description', '34', '45', '55', '34', '12.986', '45', NULL, '34', '44', '10.389', '700', '700', '7272.300', '14544.600', '44', '45'),
(52, '794181267315368', 20230607100225, '841306731', NULL, NULL, 22312.5, 38, 1, '34', '12', 'rererer', '23', '23', '66', '66', '30.250', '34', NULL, '34', '45', '10.625', '700', '700', '7437.500', '22312.500', '55', '45');

-- --------------------------------------------------------

--
-- Table structure for table `program`
--

CREATE TABLE `program` (
  `program_id` int(11) NOT NULL,
  `program_name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `program`
--

INSERT INTO `program` (`program_id`, `program_name`) VALUES
(1, 'performance challenge fund'),
(2, 'Gender and Development'),
(3, 'Interagency');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_order`
--

CREATE TABLE `purchase_order` (
  `id` int(11) NOT NULL,
  `purchase_order_id` bigint(20) NOT NULL,
  `chalan_no` varchar(255) DEFAULT NULL,
  `supplier_id` bigint(20) DEFAULT NULL,
  `ship_to` varchar(200) DEFAULT NULL,
  `created_by` varchar(200) DEFAULT NULL,
  `payment_terms` varchar(200) DEFAULT NULL,
  `shipment_terms` varchar(200) DEFAULT NULL,
  `est_ship_date` varchar(200) DEFAULT NULL,
  `total` varchar(250) DEFAULT NULL,
  `grand_total_amount` varchar(250) NOT NULL,
  `tax_details` varchar(250) NOT NULL,
  `gtotal_preferred_currency` varchar(250) DEFAULT NULL,
  `paid_amount` varchar(255) DEFAULT '0.00',
  `due_amount` varchar(255) DEFAULT '0.00',
  `total_discount` varchar(255) DEFAULT '0.00',
  `purchase_date` varchar(255) DEFAULT NULL,
  `payment_due_date` varchar(255) DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  `message_invoice` varchar(255) DEFAULT NULL,
  `attachments` longtext DEFAULT NULL,
  `etd` varchar(255) DEFAULT NULL,
  `eta` varchar(255) DEFAULT NULL,
  `shipping_line` varchar(255) DEFAULT NULL,
  `container_no` varchar(255) DEFAULT NULL,
  `bl_number` varchar(255) DEFAULT NULL,
  `isf_filling` varchar(255) DEFAULT NULL,
  `purchase_details` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `bank_id` varchar(255) DEFAULT NULL,
  `payment_id` varchar(250) DEFAULT NULL,
  `payment_type` varchar(255) DEFAULT NULL,
  `total_gross` varchar(250) DEFAULT NULL,
  `total_net` varchar(250) DEFAULT NULL,
  `total_weight` varchar(250) DEFAULT NULL,
  `create_by` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase_order`
--

INSERT INTO `purchase_order` (`id`, `purchase_order_id`, `chalan_no`, `supplier_id`, `ship_to`, `created_by`, `payment_terms`, `shipment_terms`, `est_ship_date`, `total`, `grand_total_amount`, `tax_details`, `gtotal_preferred_currency`, `paid_amount`, `due_amount`, `total_discount`, `purchase_date`, `payment_due_date`, `remarks`, `message_invoice`, `attachments`, `etd`, `eta`, `shipping_line`, `container_no`, `bl_number`, `isf_filling`, `purchase_details`, `status`, `bank_id`, `payment_id`, `payment_type`, `total_gross`, `total_net`, `total_weight`, `create_by`) VALUES
(10, 20230616075639, 'PO202306-1', 15, '56456456', '454654', 'ADVANCE', 'FOB', '2023-06-16', '543.7', '814', '271.500 ( OA36X6AKVT-50% )', '814', '100', '714', NULL, '2023-06-16', NULL, 'dfgdfg', 'dfgdfgdgf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, '544427627', 'BANK TRANSFER', '0.20900000000000002', '0.875', '10.000', '38'),
(11, 20230616082941, 'PO202306-2', 12, '5645456456', '4565', 'COD', 'Select one', '2023-06-16', '1010.200', '1515', '505.000 ( OA36X6AKVT-50% )', '1515', '', '1515', NULL, '2023-06-16', NULL, '789', ' 78 9789 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, '1722734912', 'CHEQUE', '1.007', '1.007', '17.000', '38'),
(12, 20230616095222, 'PO202306-3', 15, '456456', '456456', 'ADVANCE', 'CIF', '2023-06-16', '1677579.900', '2516368', '838789.500 ( OA36X6AKVT-50% )', '2516368', '2500000', '16368', NULL, '2023-06-16', NULL, 'ghjg', 'jgjgj', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, '1923482776', 'CREDIT/DEBIT CARD', '198.571', '1135.376', '182.000', '38'),
(13, 20230616095919, 'PO202306-4', 15, '567567567', '56756', 'ADVANCE', 'FOB', '2023-06-16', '349.000', '523', '174.500 ( OA36X6AKVT-50% )', '523', '100', '423', NULL, '2023-06-16', NULL, '464', '64564', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, '2048152704', 'BANK TRANSFER', '0.424', '0.424', '11.000', '38'),
(14, 20230616105329, 'PO202306-5', 12, '567567567', '7567567', 'ADVANCE', 'FOB', '2023-06-16', '106925.200', '160387', '53462.500 ( OA36X6AKVT-50% )', '160387', '160000', '387', NULL, '2023-06-16', NULL, 'ert', 'ertert', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, '183861671', 'CREDIT/DEBIT CARD', '0.8619999999999999', '76.487', '338.000', '38');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_order_details`
--

CREATE TABLE `purchase_order_details` (
  `id` int(11) NOT NULL,
  `purchase_order_detail_id` bigint(20) DEFAULT NULL,
  `purchase_id` bigint(20) DEFAULT NULL,
  `tableid` varchar(250) NOT NULL,
  `product_id` varchar(255) DEFAULT NULL,
  `product_name` varchar(250) NOT NULL,
  `bundle_no` varchar(250) DEFAULT NULL,
  `description` varchar(250) DEFAULT NULL,
  `thickness` varchar(250) NOT NULL,
  `supplier_block_no` varchar(250) NOT NULL,
  `supplier_slab_no` varchar(250) NOT NULL,
  `g_width` varchar(250) NOT NULL,
  `g_height` varchar(250) NOT NULL,
  `gross_sqft` varchar(250) NOT NULL,
  `n_width` varchar(250) NOT NULL,
  `n_height` varchar(250) NOT NULL,
  `net_sqft` varchar(250) NOT NULL,
  `cost_per_sqft` varchar(250) NOT NULL,
  `cost_per_slab` varchar(250) NOT NULL,
  `sales_price_sqft` varchar(250) NOT NULL,
  `sales_slab_price` varchar(250) NOT NULL,
  `weight` varchar(250) NOT NULL,
  `origin` varchar(250) NOT NULL,
  `total_amount` decimal(10,2) DEFAULT NULL,
  `discount` float DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `create_by` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase_order_details`
--

INSERT INTO `purchase_order_details` (`id`, `purchase_order_detail_id`, `purchase_id`, `tableid`, `product_id`, `product_name`, `bundle_no`, `description`, `thickness`, `supplier_block_no`, `supplier_slab_no`, `g_width`, `g_height`, `gross_sqft`, `n_width`, `n_height`, `net_sqft`, `cost_per_sqft`, `cost_per_slab`, `sales_price_sqft`, `sales_slab_price`, `weight`, `origin`, `total_amount`, `discount`, `status`, `create_by`) VALUES
(31, 0, 20230616075639, '1', '1329325566', 'TESTPRODUCT-55', '2', '2', '2', '2', '2', '2', '2', '0.028', '2', '2', '0.028', '500', '500', '14.000', '14.000', '2', '2', '14.00', NULL, 1, '38'),
(32, 4, 20230616075639, '11', '841306731', 'PRODUCTTEST-55', '1', '1', '1', '1', '1', '1', '1', '0.007', '1', '1', '0.007', '700', '700', '4.900', '9.800', '1', '1', '9.80', NULL, 1, '38'),
(33, 7, 20230616075639, '2', '1329325566', 'TESTPRODUCT-55', '3', '3', '3', '3', '3', '3', '3', '0.063', '3', '35', '0.729', '500', '500', '364.500', '364.500', '3', '3', '364.50', NULL, 1, '38'),
(34, 0, 20230616075639, '21', '841306731', 'PRODUCTTEST-55', '4', '4', '4', '4', '4', '4', '4', '0.111', '4', '4', '0.111', '700', '700', '77.700', '155.400', '4', '4', '155.40', NULL, 1, '38'),
(35, 0, 20230616082941, '1', '1329325566', 'TESTPRODUCT-55', '8', '8', '8', '8', '8', '8', '8', '0.444', '8', '8', '0.444', '500', '500', '222.000', '222.000', '8', '88', '222.00', NULL, 1, '38'),
(36, 0, 20230616082941, '11', '841306731', 'PRODUCTTEST-55', '9', '9', '9', '9', '9', '9', '9', '0.563', '9', '9', '0.563', '700', '700', '394.100', '788.200', '9', '99', '788.20', NULL, 1, '38'),
(37, 0, 20230616095222, '1', '1329325566', 'TESTPRODUCT-55', '77', '77', '77', '7', '77', '77', '77', '41.174', '77', '77', '41.174', '500', '500', '20587.000', '20587.000', '77', '77', '20587.00', NULL, 1, '38'),
(38, 0, 20230616095222, '11', '1329325566', 'TESTPRODUCT-55', '88', '88', '88', '88', '88', '88', '88', '53.778', '88', '88', '53.778', '500', '500', '26889.000', '53778.000', '88', '88', '53778.00', NULL, 1, '38'),
(39, 0, 20230616095222, '12', '841306731', 'PRODUCTTEST-55', '99', '99', '99', '99', '99', '9', '999', '62.438', '9', '9999', '624.938', '700', '700', '437456.600', '1312369.800', '9', '999', '1312369.80', NULL, 1, '38'),
(40, 0, 20230616095222, '2', '841306731', 'PRODUCTTEST-55', '7', '777', '77', '77', '7', '77', '77', '41.174', '77', '777', '415.479', '700', '700', '290835.300', '290835.300', '7', '77', '290835.30', NULL, 1, '38'),
(41, 0, 20230616095222, '21', '841306731', 'PRODUCTTEST-55', '11', '1', '11', '1', '11', '1', '1', '0.007', '1', '1', '0.007', '700', '700', '4.900', '9.800', '1', '1', '9.80', NULL, 1, '38'),
(42, 33, 20230616095919, '1', '841306731', 'PRODUCTTEST-55', '6', '6', '6', '66', '6', '6', '6', '0.250', '6', '6', '0.250', '700', '700', '175.000', '175.000', '6', '6', '175.00', NULL, 1, '38'),
(43, 0, 20230616095919, '11', '1329325566', 'TESTPRODUCT-55', '5', '5', '5', '5', '5', '5', '5', '0.174', '5', '5', '0.174', '500', '500', '87.000', '174.000', '5', '5', '174.00', NULL, 1, '38'),
(44, 0, 20230616105329, '1', '1329325566', 'TESTPRODUCT-55', '5', '5', '5', '5', '5', '5', '5', '0.174', '5', '5', '0.174', '500', '500', '87.000', '87.000', '5', '5', '87.00', NULL, 1, '38'),
(45, 73, 20230616105329, '11', '841306731', 'PRODUCTTEST-55', '34', '3', '3', '3', '3', '3', '33', '0.688', '33', '333', '76.313', '700', '700', '53419.100', '106838.200', '333', '33', '106838.20', NULL, 1, '38');

-- --------------------------------------------------------

--
-- Table structure for table `quotation`
--

CREATE TABLE `quotation` (
  `id` int(11) NOT NULL,
  `quotation_id` varchar(30) NOT NULL,
  `quot_description` text NOT NULL,
  `customer_id` varchar(30) NOT NULL,
  `quotdate` date NOT NULL,
  `expire_date` date DEFAULT NULL,
  `item_total_amount` decimal(12,2) NOT NULL,
  `item_total_dicount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `item_total_tax` decimal(10,2) NOT NULL DEFAULT 0.00,
  `service_total_amount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `service_total_discount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `service_total_tax` decimal(10,2) NOT NULL DEFAULT 0.00,
  `quot_dis_item` decimal(10,2) NOT NULL DEFAULT 0.00,
  `quot_dis_service` decimal(10,2) NOT NULL DEFAULT 0.00,
  `quot_no` varchar(50) NOT NULL,
  `create_by` varchar(30) NOT NULL,
  `create_date` date NOT NULL,
  `update_by` varchar(30) DEFAULT NULL,
  `update_date` date DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `cust_show` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `quotation_service_used`
--

CREATE TABLE `quotation_service_used` (
  `id` int(11) NOT NULL,
  `create_by` varchar(100) NOT NULL,
  `quot_id` varchar(20) NOT NULL,
  `service_id` int(11) NOT NULL,
  `qty` decimal(10,2) NOT NULL DEFAULT 0.00,
  `charge` decimal(10,2) NOT NULL DEFAULT 0.00,
  `discount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `discount_amount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `tax` decimal(10,2) NOT NULL DEFAULT 0.00,
  `total` decimal(10,2) NOT NULL DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `quotation_taxinfo`
--

CREATE TABLE `quotation_taxinfo` (
  `id` int(11) NOT NULL,
  `create_by` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `customer_id` int(11) NOT NULL,
  `relation_id` varchar(30) NOT NULL,
  `tax0` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `quot_products_used`
--

CREATE TABLE `quot_products_used` (
  `id` int(11) NOT NULL,
  `create_by` varchar(100) NOT NULL,
  `quot_id` varchar(100) NOT NULL,
  `product_id` varchar(100) NOT NULL,
  `serial_no` varchar(30) DEFAULT NULL,
  `description` varchar(250) DEFAULT NULL,
  `used_qty` decimal(10,2) DEFAULT NULL,
  `rate` decimal(10,2) DEFAULT NULL,
  `supplier_rate` float DEFAULT NULL,
  `total_price` decimal(12,2) DEFAULT NULL,
  `discount` decimal(10,2) DEFAULT NULL,
  `discount_per` varchar(15) DEFAULT NULL,
  `tax` decimal(10,2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `role_permission`
--

CREATE TABLE `role_permission` (
  `id` int(11) NOT NULL,
  `fk_module_id` varchar(191) NOT NULL,
  `menu` varchar(191) NOT NULL,
  `role_id` int(11) NOT NULL,
  `create` tinyint(1) DEFAULT 0,
  `read` tinyint(1) DEFAULT 0,
  `update` tinyint(1) DEFAULT 0,
  `delete` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `role_permission`
--

INSERT INTO `role_permission` (`id`, `fk_module_id`, `menu`, `role_id`, `create`, `read`, `update`, `delete`) VALUES
(1, '3', 'product', 1, 0, 1, 0, 0),
(2, '3', 'product', 1, 1, 0, 0, 0),
(3, '3', 'product', 1, 0, 0, 0, 1),
(4, '3', 'product', 1, 0, 0, 1, 0),
(5, '11', 'tax', 1, 0, 1, 0, 0),
(6, '11', 'tax', 1, 1, 0, 0, 0),
(7, '11', 'tax', 1, 0, 0, 0, 1),
(8, '11', 'tax', 1, 0, 0, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `salary_sheet_generate`
--

CREATE TABLE `salary_sheet_generate` (
  `ssg_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(30) CHARACTER SET latin1 DEFAULT NULL,
  `gdate` varchar(30) DEFAULT NULL,
  `start_date` varchar(30) CHARACTER SET latin1 NOT NULL,
  `end_date` varchar(30) CHARACTER SET latin1 NOT NULL,
  `generate_by` varchar(30) CHARACTER SET latin1 NOT NULL,
  `create_by` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `salary_type`
--

CREATE TABLE `salary_type` (
  `salary_type_id` int(11) NOT NULL,
  `sal_name` varchar(100) NOT NULL,
  `salary_type` varchar(50) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sales_invoice_settings`
--

CREATE TABLE `sales_invoice_settings` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `invoice_template` varchar(255) NOT NULL,
  `account` varchar(191) NOT NULL,
  `remarks` varchar(191) NOT NULL,
  `Time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales_invoice_settings`
--

INSERT INTO `sales_invoice_settings` (`id`, `user_id`, `invoice_template`, `account`, `remarks`, `Time`) VALUES
(1, 38, 'sales&Profarma', 'He made some derogatory remark about her appearance.\r\nIt was an innocent remark, I didn\'t mean to hurt his feelings.', 'He made some derogatory remark about her appearance.\r\nIt was an innocent remark, I didn\'t mean to hurt his feelings.', '2023-06-02 13:27:46'),
(2, 87, 'sales&Profarma', 'INC435346644', 'COPYRIGHTS', '2023-06-06 10:17:57');

-- --------------------------------------------------------

--
-- Table structure for table `sale_packing_list`
--

CREATE TABLE `sale_packing_list` (
  `id` int(11) NOT NULL,
  `expense_packing_id` varchar(255) DEFAULT NULL,
  `invoice_no` varchar(255) DEFAULT NULL,
  `invoice_date` varchar(255) DEFAULT NULL,
  `gross_weight` varchar(255) DEFAULT NULL,
  `container_no` varchar(255) DEFAULT NULL,
  `thickness` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `product_id` varchar(255) DEFAULT NULL,
  `grand_total_amount` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `create_by` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sale_packing_list_detail`
--

CREATE TABLE `sale_packing_list_detail` (
  `id` int(11) NOT NULL,
  `expense_packing_detail_id` varchar(255) DEFAULT NULL,
  `expense_packing_id` varchar(255) DEFAULT NULL,
  `serial_no` varchar(255) DEFAULT NULL,
  `product_id` varchar(255) DEFAULT NULL,
  `slab_no` varchar(255) DEFAULT NULL,
  `net_measure` varchar(255) DEFAULT NULL,
  `height` varchar(255) DEFAULT NULL,
  `width` varchar(255) DEFAULT NULL,
  `area` varchar(255) DEFAULT NULL,
  `total` varchar(255) DEFAULT NULL,
  `create_by` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sale_trucking`
--

CREATE TABLE `sale_trucking` (
  `id` int(11) NOT NULL,
  `trucking_id` varchar(255) DEFAULT NULL,
  `invoice_no` varchar(255) DEFAULT NULL,
  `invoice_date` varchar(255) DEFAULT NULL,
  `bill_to` varchar(255) DEFAULT NULL,
  `shipment_company` varchar(255) DEFAULT NULL,
  `container_pickup_date` varchar(255) DEFAULT NULL,
  `delivery_date` varchar(255) DEFAULT NULL,
  `total_amt` varchar(250) NOT NULL,
  `tax` varchar(250) NOT NULL DEFAULT '0',
  `grand_total_amount` decimal(10,2) DEFAULT NULL,
  `payment_id` int(11) DEFAULT NULL,
  `customer_gtotal` varchar(250) NOT NULL,
  `amt_paid` varchar(250) NOT NULL,
  `balance` varchar(250) NOT NULL,
  `status` int(11) DEFAULT NULL,
  `create_by` varchar(255) NOT NULL,
  `remarks` varchar(250) NOT NULL,
  `delivery_time_from` varchar(250) NOT NULL,
  `delivery_time_to` varchar(250) NOT NULL,
  `truck_no` varchar(250) NOT NULL,
  `delivery_to` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sale_trucking`
--

INSERT INTO `sale_trucking` (`id`, `trucking_id`, `invoice_no`, `invoice_date`, `bill_to`, `shipment_company`, `container_pickup_date`, `delivery_date`, `total_amt`, `tax`, `grand_total_amount`, `payment_id`, `customer_gtotal`, `amt_paid`, `balance`, `status`, `create_by`, `remarks`, `delivery_time_from`, `delivery_time_to`, `truck_no`, `delivery_to`) VALUES
(6, '20230607134111', 'T202306-1', '2023-06-07', '8', 'AMORIO', '2023-06-07', '2023-06-07', '251451', '125725.5 ( OA36X6AKVT-50% )', '377176.00', 1591852684, '377176', '45767', '331409', 1, '38', '         eteryery                       ', '20:08', '23:08', 'TRUCK-115677', 'TESTCUST');

-- --------------------------------------------------------

--
-- Table structure for table `sale_trucking_details`
--

CREATE TABLE `sale_trucking_details` (
  `id` int(11) NOT NULL,
  `sale_trucking_detail_id` varchar(255) DEFAULT NULL,
  `sale_trucking_id` varchar(255) DEFAULT NULL,
  `trucking_date` varchar(255) DEFAULT NULL,
  `qty` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `rate` varchar(255) DEFAULT NULL,
  `pro_no_reference` varchar(255) DEFAULT NULL,
  `total` varchar(255) DEFAULT NULL,
  `create_by` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sale_trucking_details`
--

INSERT INTO `sale_trucking_details` (`id`, `sale_trucking_detail_id`, `sale_trucking_id`, `trucking_date`, `qty`, `description`, `rate`, `pro_no_reference`, `total`, `create_by`, `status`) VALUES
(14, '995964326242265', '20230607134111', '2023-06-07', '55', '45654', '45', 'NS202306-1 ', '2475', '38', '1'),
(15, '969149923353763', '20230607134111', '2023-06-07', '546', '456456', '456', 'NS202306-2 ', '248976', '38', '1');

-- --------------------------------------------------------

--
-- Table structure for table `sec_role`
--

CREATE TABLE `sec_role` (
  `id` int(11) NOT NULL,
  `type` varchar(100) CHARACTER SET utf8 NOT NULL,
  `uid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sec_role`
--

INSERT INTO `sec_role` (`id`, `type`, `uid`) VALUES
(1, 'role', 91);

-- --------------------------------------------------------

--
-- Table structure for table `sec_role_permission`
--

CREATE TABLE `sec_role_permission` (
  `id` bigint(20) NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `menu_id` int(11) DEFAULT NULL,
  `can_access` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `can_create` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `can_edit` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `can_delete` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `createby` int(11) NOT NULL,
  `createdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sec_role_tbl`
--

CREATE TABLE `sec_role_tbl` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(250) DEFAULT NULL,
  `create_by` int(11) DEFAULT NULL,
  `date_time` datetime DEFAULT NULL,
  `role_status` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sec_userrole`
--

CREATE TABLE `sec_userrole` (
  `id` int(11) NOT NULL,
  `user_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `roleid` int(11) NOT NULL,
  `createby` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `createdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sec_userrole`
--

INSERT INTO `sec_userrole` (`id`, `user_id`, `roleid`, `createby`, `createdate`) VALUES
(1, '91', 1, '91', '2023-06-13 10:47:16');

-- --------------------------------------------------------

--
-- Table structure for table `sec_user_access_tbl`
--

CREATE TABLE `sec_user_access_tbl` (
  `role_acc_id` int(11) NOT NULL,
  `fk_role_id` int(11) NOT NULL,
  `fk_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `serviceprovider_id` varchar(222) DEFAULT NULL,
  `id` int(11) NOT NULL,
  `sp_address` varchar(222) DEFAULT NULL,
  `payment_terms` varchar(222) DEFAULT NULL,
  `bill_number` varchar(222) DEFAULT NULL,
  `bill_date` varchar(222) DEFAULT NULL,
  `due_date` varchar(222) DEFAULT NULL,
  `total` varchar(222) DEFAULT NULL,
  `memo_details` varchar(222) DEFAULT NULL,
  `create_by` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `service_provider_name` varchar(250) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`serviceprovider_id`, `id`, `sp_address`, `payment_terms`, `bill_number`, `bill_date`, `due_date`, `total`, `memo_details`, `create_by`, `status`, `service_provider_name`) VALUES
('20230607111623', 9, '457457457', '75DAYS', 'BLLL45457', '2023-06-10', '2023-06-14', '5355.00', 'RTURTURTURTU', 38, 1, 'TRUYUTYU');

-- --------------------------------------------------------

--
-- Table structure for table `service_invoice`
--

CREATE TABLE `service_invoice` (
  `id` int(11) NOT NULL,
  `voucher_no` varchar(30) NOT NULL,
  `create_by` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `employee_id` varchar(100) DEFAULT NULL,
  `customer_id` varchar(30) NOT NULL,
  `total_amount` decimal(20,2) NOT NULL DEFAULT 0.00,
  `total_discount` decimal(20,2) NOT NULL DEFAULT 0.00,
  `invoice_discount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `total_tax` decimal(10,2) NOT NULL DEFAULT 0.00,
  `paid_amount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `due_amount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `shipping_cost` decimal(10,2) NOT NULL DEFAULT 0.00,
  `previous` decimal(10,2) NOT NULL DEFAULT 0.00,
  `details` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `service_invoice_details`
--

CREATE TABLE `service_invoice_details` (
  `id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `create_by` varchar(100) NOT NULL,
  `service_inv_id` varchar(30) NOT NULL,
  `qty` decimal(10,2) NOT NULL DEFAULT 0.00,
  `charge` decimal(10,2) NOT NULL DEFAULT 0.00,
  `discount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `discount_amount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `total` decimal(10,2) NOT NULL DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `service_provider_detail`
--

CREATE TABLE `service_provider_detail` (
  `serviceprovider_id` varchar(222) DEFAULT NULL,
  `id` int(11) NOT NULL,
  `account_name` varchar(222) DEFAULT NULL,
  `account_category` varchar(222) DEFAULT NULL,
  `acc_sub_category` varchar(222) DEFAULT NULL,
  `description` varchar(222) DEFAULT NULL,
  `total_price` varchar(222) DEFAULT NULL,
  `create_by` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service_provider_detail`
--

INSERT INTO `service_provider_detail` (`serviceprovider_id`, `id`, `account_name`, `account_category`, `acc_sub_category`, `description`, `total_price`, `create_by`, `status`) VALUES
('20230606054559', 1, 'fddg', 'dfgd', 'fgdf', 'gdfgdf', '55', 87, 1),
('20230606054559', 2, 'fd', 'rte', 'erte', 'ertert', '66', 87, 1),
('20230606060306', 3, 'fddg', 'dfgd', 'fgdf', 'gdfgdf', '55', 87, 1),
('20230606060306', 4, 'fd', 'rte', 'erte', 'ertert', '66', 87, 1),
('20230606060625', 5, 'fddg', 'dfgd', 'fgdf', 'gdfgdf', '55', 87, 1),
('20230606060625', 6, 'fd', 'rte', 'erte', 'ertert', '66', 87, 1),
('20230606060811', 7, 'fddg', 'dfgd', 'fgdf', 'gdfgdf', '55', 87, 1),
('20230606060811', 8, 'fd', 'rte', 'erte', 'ertert', '66', 87, 1),
('20230606114347', 14, 'AFYERY', '4ERYERY', 'ERYERY', '36436ERY', '6464', 87, 1),
('20230606114347', 13, 'AFAFS', 'ASFASF', 'WETSDG', 'WETWET', '3545', 87, 1),
('20230607111623', 18, 'YEYEYRT', 'YEYDHH', 'ERYERY', 'EYYERYRY', '436', 38, 1),
('20230607111623', 17, 'ERYERRTU', 'ERYERY', 'ERYERYY', 'YERYERY', '345', 38, 1),
('20230607111623', 19, 'RTURTUUU', 'UUTYUT', 'RTURTU', 'RTURTUTU', '4574', 38, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sms_settings`
--

CREATE TABLE `sms_settings` (
  `id` int(11) NOT NULL,
  `api_key` varchar(100) DEFAULT NULL,
  `api_secret` varchar(100) DEFAULT NULL,
  `from` varchar(100) DEFAULT NULL,
  `isinvoice` int(11) NOT NULL DEFAULT 0,
  `isservice` int(11) NOT NULL DEFAULT 0,
  `isreceive` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sms_settings`
--

INSERT INTO `sms_settings` (`id`, `api_key`, `api_secret`, `from`, `isinvoice`, `isservice`, `isreceive`) VALUES
(1, '5d6db102011', '456452dfgdf', '8801645452', 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `state_and_tax`
--

CREATE TABLE `state_and_tax` (
  `id` int(11) NOT NULL,
  `state` varchar(250) NOT NULL,
  `tax` varchar(250) NOT NULL,
  `created_by` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `state_and_tax`
--

INSERT INTO `state_and_tax` (`id`, `state`, `tax`, `created_by`) VALUES
(19, 'Netherlands', 'Income tax,Disability tax,Unemployment,WF Work dev,FLI,Local Income tax', 38),
(14, 'California', 'Local,Single Tax', 38),
(16, 'Newyork', 'Maintainence', 38);

-- --------------------------------------------------------

--
-- Table structure for table `state_localtax`
--

CREATE TABLE `state_localtax` (
  `id` int(11) NOT NULL,
  `year` year(4) NOT NULL,
  `tax` varchar(255) NOT NULL,
  `employer` varchar(255) NOT NULL,
  `employee` varchar(255) NOT NULL,
  `details` varchar(255) NOT NULL,
  `single` varchar(255) NOT NULL,
  `tax_filling` varchar(255) NOT NULL,
  `married` varchar(255) NOT NULL,
  `head_household` varchar(255) NOT NULL,
  `create_by` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `state_localtax`
--

INSERT INTO `state_localtax` (`id`, `year`, `tax`, `employer`, `employee`, `details`, `single`, `tax_filling`, `married`, `head_household`, `create_by`, `created`) VALUES
(8, 2023, 'Netherlands-Disability tax', '0.005', '0.0014', '', '', '', '', '', 0, '2023-06-15 11:58:46'),
(9, 2023, 'Netherlands-Unemployment', '0.1175', '0.3825', '', '', '', '', '', 0, '2023-06-15 12:00:40'),
(10, 2023, 'Netherlands-WF Work dev', '0.001175', '0.000425', '', '', '', '', '', 0, '2023-06-15 12:00:40'),
(11, 2023, 'Netherlands-FLI ', '0', '0.0014\r\n', '', '', '', '', '', 0, '2023-06-15 12:01:40'),
(42, 2023, 'Netherlands-Local Income tax', '1', '3', '3', '1-3', '3-3', '3-3', '3-3', 0, '2023-06-22 11:53:13'),
(72, 2023, '', '6', '6.2', '160200', '6-6.2', '0-100', '0-100', '0-100', 38, '2023-06-22 13:36:04'),
(73, 2023, 'Netherlands-Income tax', '0', '1.4', '0', '0-20000', '0-25000', '0-20000', '0-20000', 38, '2023-06-22 14:09:56'),
(74, 2023, 'Netherlands-Income tax', '0', '1.75', '0', '20001-35000', '25001-50000', '20001-35000', '20001-50000', 38, '2023-06-22 14:09:56'),
(75, 2023, 'Netherlands-Income tax', '0', '3.5', '0', '35001-40000', '50001-80000', '35001-40000', '50001-80000', 38, '2023-06-22 14:09:56'),
(76, 2023, 'Netherlands-Income tax', '0', '5,525', '0', '40001-75000', '80001-150000', '40001-75000', '80001-150000', 38, '2023-06-22 14:09:56'),
(77, 2023, 'Netherlands-Income tax', '0', '6.37', '0', '75001-500000', '150001-500000', '75001-500000', '150001-500000', 38, '2023-06-22 14:09:56'),
(78, 2023, 'Netherlands-Income tax', '0', '8.97', '0', '500001-5000000', '500001-5000000', '500001-5000000', '500001-5000000', 38, '2023-06-22 14:09:56'),
(79, 2023, 'Netherlands-Income tax', '0', '10.75', '0', '5000001-9999999', '5000001-9999999', '5000001-9999999', '5000001-9999999', 38, '2023-06-22 14:09:56'),
(82, 2023, 'California-Single Tax', '4111', '434', '42', '4111-434', '4-4', '4-4', '4-4', 38, '2023-06-22 14:19:14'),
(83, 2023, 'California-Single Tax', '32', '3', '3', '3-3', '3-3', '3-3', '3-3', 38, '2023-06-22 14:19:14');

-- --------------------------------------------------------

--
-- Table structure for table `sub_module`
--

CREATE TABLE `sub_module` (
  `id` int(11) NOT NULL,
  `mid` int(11) NOT NULL,
  `module` varchar(250) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `description` text CHARACTER SET utf8 DEFAULT NULL,
  `image` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `directory` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_module`
--

INSERT INTO `sub_module` (`id`, `mid`, `module`, `name`, `description`, `image`, `directory`, `status`) VALUES
(1, 1, 'sales', 'new_invoice', NULL, NULL, 'new_invoice', 1),
(2, 1, 'sales', 'manage_invoice', NULL, NULL, 'manage_invoice', 1),
(3, 1, 'sales', 'pos_invoice', NULL, NULL, 'pos_invoice', 1),
(4, 9, 'accounts', 'c_o_a', NULL, NULL, 'show_tree', 1),
(5, 9, 'accounts', 'supplier_payment', NULL, NULL, 'supplier_payment', 1),
(6, 9, 'accounts', 'customer_receive', NULL, NULL, 'customer_receive', 1),
(7, 9, 'accounts', 'debit_voucher', NULL, NULL, 'debit_voucher', 1),
(8, 9, 'accounts', 'credit_voucher', NULL, NULL, 'credit_voucher', 1),
(9, 9, 'accounts', 'voucher_approval', NULL, NULL, 'aprove_v', 1),
(10, 9, 'accounts', 'contra_voucher', NULL, NULL, 'contra_voucher', 1),
(11, 9, 'accounts', 'journal_voucher', NULL, NULL, 'journal_voucher', 1),
(12, 9, 'accounts', 'report', NULL, NULL, 'ac_report', 1),
(13, 9, 'accounts', 'cash_book', NULL, NULL, 'cash_book', 1),
(14, 9, 'accounts', 'Inventory_ledger', NULL, NULL, 'inventory_ledger', 1),
(15, 9, 'accounts', 'bank_book', NULL, NULL, 'bank_book', 1),
(16, 9, 'accounts', 'general_ledger', NULL, NULL, 'general_ledger', 1),
(17, 9, 'accounts', 'trial_balance', NULL, NULL, 'trial_balance', 1),
(18, 9, 'accounts', 'cash_flow', NULL, NULL, 'cash_flow_report', 1),
(19, 9, 'accounts', 'coa_print', NULL, NULL, 'coa_print', 1),
(21, 3, 'product', 'category', NULL, NULL, 'manage_category', 1),
(22, 3, 'product', 'add_product', NULL, NULL, 'create_product', 1),
(23, 3, 'product', 'import_product_csv', NULL, NULL, 'add_product_csv', 1),
(24, 3, 'product', 'manage_product', NULL, NULL, 'manage_product', 1),
(25, 2, 'customer', 'add_customer', NULL, NULL, 'add_customer', 1),
(26, 2, 'customer', 'manage_customer', NULL, NULL, 'manage_customer', 1),
(27, 2, 'customer', 'credit_customer', NULL, NULL, 'credit_customer', 1),
(28, 2, 'customer', 'paid_customer', NULL, NULL, 'paid_customer', 1),
(30, 3, 'product', 'unit', NULL, NULL, 'manage_unit', 1),
(31, 4, 'supplier', 'add_supplier', NULL, NULL, 'add_supplier', 1),
(32, 4, 'supplier', 'manage_supplier', NULL, NULL, 'manage_supplier', 1),
(33, 4, 'supplier', 'supplier_ledger', NULL, NULL, 'supplier_ledger_report', 1),
(35, 5, 'purchase', 'add_purchase', NULL, NULL, 'add_purchase', 1),
(36, 5, 'purchase', 'manage_purchase', NULL, NULL, 'manage_purchase', 1),
(37, 7, 'return', 'return', NULL, NULL, 'add_return', 1),
(38, 7, 'return', 'stock_return_list', NULL, NULL, 'return_list', 1),
(39, 7, 'return', 'supplier_return_list', NULL, NULL, 'supplier_return_list', 1),
(40, 7, 'return', 'wastage_return_list', NULL, NULL, 'wastage_return_list', 1),
(41, 11, 'tax', 'tax_settings', NULL, NULL, 'tax_settings', 1),
(43, 6, 'stock', 'stock_report', NULL, NULL, 'stock_report', 1),
(46, 8, 'report', 'closing', NULL, NULL, 'add_closing', 1),
(47, 8, 'report', 'closing_report', NULL, NULL, 'closing_report', 1),
(48, 8, 'report', 'todays_report', NULL, NULL, 'all_report', 1),
(49, 8, 'report', 'todays_customer_receipt', NULL, NULL, 'todays_customer_receipt', 1),
(50, 8, 'report', 'sales_report', NULL, NULL, 'todays_sales_report', 1),
(51, 8, 'report', 'due_report', NULL, NULL, 'retrieve_dateWise_DueReports', 1),
(52, 8, 'report', 'purchase_report', NULL, NULL, 'todays_purchase_report', 1),
(53, 8, 'report', 'purchase_report_category_wise', NULL, NULL, 'purchase_report_category_wise', 1),
(54, 8, 'report', 'sales_report_product_wise', NULL, NULL, 'product_sales_reports_date_wise', 1),
(55, 8, 'report', 'sales_report_category_wise', NULL, NULL, 'sales_report_category_wise', 1),
(56, 10, 'bank', 'add_new_bank', NULL, NULL, 'add_bank', 1),
(57, 10, 'bank', 'bank_transaction', NULL, NULL, 'bank_transaction', 1),
(58, 10, 'bank', 'manage_bank', NULL, NULL, 'bank_list', 1),
(59, 14, 'commission', 'generate_commission', NULL, NULL, 'commission', 1),
(60, 12, 'hrm_management', 'add_designation', NULL, NULL, 'add_designation', 1),
(61, 12, 'hrm_management', 'manage_designation', NULL, NULL, 'manage_designation', 1),
(62, 12, 'hrm_management', 'add_employee', NULL, NULL, 'add_employee', 1),
(63, 12, 'hrm_management', 'manage_employee', NULL, NULL, 'manage_employee', 1),
(64, 12, 'hrm_management', 'add_attendance', NULL, NULL, 'add_attendance', 1),
(65, 12, 'hrm_management', 'manage_attendance', NULL, NULL, 'manage_attendance', 1),
(66, 12, 'hrm_management', 'attendance_report', NULL, NULL, 'attendance_report', 1),
(67, 12, 'hrm_management', 'add_benefits', NULL, NULL, 'add_benefits', 1),
(68, 12, 'hrm_management', 'manage_benefits', NULL, NULL, 'manage_benefits', 1),
(69, 12, 'hrm_management', 'add_salary_setup', NULL, NULL, 'add_salary_setup', 1),
(70, 12, 'hrm_management', 'manage_salary_setup', NULL, NULL, 'manage_salary_setup', 1),
(71, 12, 'hrm_management', 'salary_generate', NULL, NULL, 'salary_generate', 1),
(72, 12, 'hrm_management', 'manage_salary_generate', NULL, NULL, 'manage_salary_generate', 1),
(73, 12, 'hrm_management', 'salary_payment', NULL, NULL, 'salary_payment', 1),
(74, 12, 'hrm_management', 'add_expense_item', NULL, NULL, 'add_expense_item', 1),
(75, 12, 'hrm_management', 'manage_expense_item', NULL, NULL, 'manage_expense_item', 1),
(76, 12, 'hrm_management', 'add_expense', NULL, NULL, 'add_expense', 1),
(77, 12, 'hrm_management', 'manage_expense', NULL, NULL, 'manage_expense', 1),
(78, 12, 'hrm_management', 'expense_statement', NULL, NULL, 'expense_statement', 1),
(79, 12, 'hrm_management', 'add_person_officeloan', NULL, NULL, 'add1_person', 1),
(80, 12, 'hrm_management', 'add_loan_officeloan', NULL, NULL, 'add_office_loan', 1),
(81, 12, 'hrm_management', 'add_payment_officeloan', NULL, NULL, 'add_loan_payment', 1),
(82, 12, 'hrm_management', 'manage_loan_officeloan', NULL, NULL, 'manage1_person', 1),
(83, 12, 'hrm_management', 'add_person_personalloan', NULL, NULL, 'add_person', 1),
(84, 12, 'hrm_management', 'add_loan_personalloan', NULL, NULL, 'add_loan', 1),
(85, 12, 'hrm_management', 'add_payment_personalloan', NULL, NULL, 'add_payment', 1),
(86, 12, 'hrm_management', 'manage_loan_personalloan', NULL, NULL, 'manage_person', 1),
(87, 15, 'setting', 'manage_company', NULL, NULL, 'manage_company', 1),
(88, 15, 'setting', 'add_user', NULL, NULL, 'add_user', 1),
(89, 15, 'setting', 'manage_users', NULL, NULL, 'manage_user', 1),
(90, 15, 'setting', 'language', NULL, NULL, 'add_language', 1),
(91, 15, 'setting', 'currency', NULL, NULL, 'add_currency', 1),
(92, 15, 'setting', 'setting', NULL, NULL, 'soft_setting', 1),
(93, 15, 'setting', 'add_role', NULL, NULL, 'add_role', 1),
(94, 15, 'setting', 'role_list', NULL, NULL, 'role_list', 1),
(95, 15, 'setting', 'user_assign_role', NULL, NULL, 'user_assign', 1),
(96, 15, 'setting', 'Permission', NULL, NULL, NULL, 1),
(97, 8, 'report', 'shipping_cost_report', NULL, NULL, 'shipping_cost_report', 1),
(98, 8, 'report', 'user_wise_sales_report', NULL, NULL, 'user_wise_sales_report', 1),
(99, 8, 'report', 'invoice_return', NULL, NULL, 'invoice_return', 1),
(100, 8, 'report', 'supplier_return', NULL, NULL, 'supplier_return', 1),
(101, 8, 'report', 'tax_report', NULL, NULL, 'tax_report', 1),
(102, 8, 'report', 'profit_report', NULL, NULL, 'profit_report', 1),
(103, 11, 'tax', 'add_incometax', NULL, NULL, 'add_incometax', 1),
(104, 11, 'tax', 'manage_income_tax', NULL, NULL, 'manage_income_tax', 1),
(105, 13, 'service', 'add_service', NULL, NULL, 'create_service', 1),
(106, 13, 'service', 'manage_service', NULL, NULL, 'manage_service', 1),
(107, 13, 'service', 'service_invoice', NULL, NULL, 'service_invoice', 1),
(108, 13, 'service', 'manage_service_invoice', NULL, NULL, 'manage_service_invoice', 1),
(109, 11, 'tax', 'tax_report', NULL, NULL, 'tax_report', 1),
(110, 11, 'tax', 'invoice_wise_tax_report', NULL, NULL, 'invoice_wise_tax_report', 1),
(111, 2, 'customer', 'customer_advance', NULL, NULL, 'customer_advance', 1),
(112, 4, 'supplier', 'supplier_advance', NULL, NULL, 'supplier_advance', 1),
(113, 2, 'customer', 'customer_ledger', NULL, NULL, 'customer_ledger', 1),
(114, 1, 'sales', 'gui_pos', NULL, NULL, 'gui_pos', 1),
(115, 15, 'setting', 'sms_configure', NULL, NULL, 'sms_configure', 1),
(116, 15, 'setting', 'backup_restore', NULL, NULL, 'back_up', 1),
(117, 15, 'setting', 'import', NULL, NULL, 'sql_import', 1),
(118, 15, 'setting', 'restore', NULL, NULL, 'restore', 1),
(119, 16, 'quotation', 'add_quotation', NULL, NULL, 'add_quotation', 1),
(120, 16, 'quotation', 'manage_quotation', NULL, NULL, 'manage_quotation', 1),
(121, 16, 'quotation', 'add_to_invoice', NULL, NULL, 'add_to_invoice', 1);

-- --------------------------------------------------------

--
-- Table structure for table `super_module`
--

CREATE TABLE `super_module` (
  `id` int(11) NOT NULL,
  `name` varchar(55) NOT NULL,
  `description` varchar(55) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `directory` varchar(1) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `super_module`
--

INSERT INTO `super_module` (`id`, `name`, `description`, `image`, `directory`, `status`) VALUES
(1, 'sale', NULL, NULL, NULL, 1),
(2, 'customer', NULL, NULL, NULL, 1),
(3, 'product', NULL, NULL, NULL, 1),
(4, 'vendor', NULL, NULL, NULL, 1),
(5, 'expense', NULL, NULL, NULL, 1),
(6, 'quotation', NULL, NULL, NULL, 1),
(7, 'taxes', NULL, NULL, NULL, 1),
(8, 'return', NULL, NULL, NULL, 1),
(9, 'report', NULL, NULL, NULL, 1),
(10, 'accounts', NULL, NULL, NULL, 1),
(11, 'bank', NULL, NULL, NULL, 1),
(12, 'hrm', NULL, NULL, NULL, 1),
(13, 'email', NULL, NULL, NULL, 1),
(14, 'setting', NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `super_permission`
--

CREATE TABLE `super_permission` (
  `id` int(11) NOT NULL,
  `fk_module_id` int(11) NOT NULL,
  `menu` varchar(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `create` tinyint(1) DEFAULT 0,
  `read` tinyint(1) DEFAULT 0,
  `update` tinyint(1) DEFAULT 0,
  `delete` tinyint(1) DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `super_permission`
--

INSERT INTO `super_permission` (`id`, `fk_module_id`, `menu`, `role_id`, `create`, `read`, `update`, `delete`) VALUES
(246, 13, 'email', 82, 1, 0, 0, 0),
(245, 12, 'hrm', 82, 1, 0, 0, 0),
(244, 10, 'accounts', 82, 1, 0, 0, 0),
(243, 9, 'report', 82, 1, 0, 0, 0),
(252, 3, 'product', 83, 1, 0, 0, 0),
(251, 2, 'customer', 83, 1, 0, 0, 0),
(250, 1, 'sale', 83, 1, 0, 0, 0),
(253, 4, 'vendor', 83, 1, 0, 0, 0),
(254, 1, 'sale', 84, 1, 0, 0, 0),
(255, 2, 'customer', 84, 1, 0, 0, 0),
(256, 3, 'product', 84, 1, 0, 0, 0),
(257, 4, 'vendor', 84, 1, 0, 0, 0),
(258, 5, 'expense', 84, 1, 0, 0, 0),
(259, 6, 'quotation', 84, 1, 0, 0, 0),
(260, 7, 'taxes', 84, 1, 0, 0, 0),
(261, 8, 'return', 84, 1, 0, 0, 0),
(262, 9, 'report', 84, 1, 0, 0, 0),
(263, 10, 'accounts', 84, 1, 0, 0, 0),
(264, 11, 'bank', 84, 1, 0, 0, 0),
(265, 12, 'hrm', 84, 1, 0, 0, 0),
(266, 13, 'email', 84, 1, 0, 0, 0),
(267, 14, 'setting', 84, 1, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `super_role`
--

CREATE TABLE `super_role` (
  `id` int(11) NOT NULL,
  `type` varchar(100) CHARACTER SET utf8 NOT NULL,
  `uid` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `super_role`
--

INSERT INTO `super_role` (`id`, `type`, `uid`) VALUES
(82, 'kumar', 2),
(83, 'NewRole', 2),
(84, 'Admin', 2);

-- --------------------------------------------------------

--
-- Table structure for table `supplier_information`
--

CREATE TABLE `supplier_information` (
  `supplier_id` bigint(20) NOT NULL,
  `taxcollected` varchar(255) DEFAULT NULL,
  `created_by` varchar(100) NOT NULL DEFAULT '1',
  `supplier_name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `mobile` varchar(100) DEFAULT NULL,
  `primaryemail` varchar(200) DEFAULT NULL,
  `secondaryemail` varchar(200) DEFAULT NULL,
  `contactperson` varchar(100) DEFAULT NULL,
  `businessphone` varchar(50) DEFAULT NULL,
  `fax` varchar(100) DEFAULT NULL,
  `city` text DEFAULT NULL,
  `state` text DEFAULT NULL,
  `zip` varchar(50) DEFAULT NULL,
  `country` varchar(250) DEFAULT NULL,
  `details` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `currency_type` varchar(50) NOT NULL,
  `paymentterms` varchar(250) DEFAULT NULL,
  `vendor_type` varchar(250) DEFAULT NULL,
  `credit_limit` int(11) DEFAULT NULL,
  `attachments` varchar(250) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `supplier_information`
--

INSERT INTO `supplier_information` (`supplier_id`, `taxcollected`, `created_by`, `supplier_name`, `address`, `mobile`, `primaryemail`, `secondaryemail`, `contactperson`, `businessphone`, `fax`, `city`, `state`, `zip`, `country`, `details`, `status`, `currency_type`, `paymentterms`, `vendor_type`, `credit_limit`, `attachments`) VALUES
(15, '1', '38', 'TESTSUPPLIER', 'No65rturturtutu', '78987998', 'ajithkumar0902001@gmail.com', 'ajith@amoriotech.com', '8797897889', '789789879', '78978', 'dffhh', 'state', '65568658', 'Yemen', 'no576rtu', 1, 'USD', '7DAYS', 'servicevendor', 5555, NULL),
(12, '0', '38', 'AMORIO', 'no56658', '0809809', 'ajith@amoriotech.com', 'ajith@amoriotech.com', '78979789', '8707070', '78', '78978989', 'rurtu', '6808998', 'United States', 'No679679', 1, 'USD', '15DAYS', 'servicevendor', 76, NULL),
(16, '0', '92', 'NewVne', '345', '43453', 'admin@example.com', 'admin@example.com', '4353', '3345', '5334', '345', '345', '34534', 'US-United States', '353', 1, 'USD', NULL, 'servicevendor', 453, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `supplier_product`
--

CREATE TABLE `supplier_product` (
  `supplier_pr_id` int(11) NOT NULL,
  `created_by` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `product_id` varchar(30) CHARACTER SET utf8 NOT NULL,
  `products_model` varchar(30) CHARACTER SET latin1 DEFAULT NULL,
  `supplier_id` bigint(20) NOT NULL,
  `supplier_price` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `supplier_product`
--

INSERT INTO `supplier_product` (`supplier_pr_id`, `created_by`, `product_id`, `products_model`, `supplier_id`, `supplier_price`) VALUES
(21, '38', '841306731', '55', 12, 700),
(23, '38', '1329325566', '55', 15, 500),
(24, '92', '1566412787', 'CP', 16, 535);

-- --------------------------------------------------------

--
-- Table structure for table `synchronizer_setting`
--

CREATE TABLE `synchronizer_setting` (
  `id` int(11) NOT NULL,
  `hostname` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `port` varchar(10) NOT NULL,
  `debug` varchar(10) NOT NULL,
  `project_root` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tax_collection`
--

CREATE TABLE `tax_collection` (
  `id` int(11) NOT NULL,
  `create_by` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `customer_id` varchar(30) NOT NULL,
  `relation_id` varchar(30) NOT NULL,
  `tax0` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tax_information`
--

CREATE TABLE `tax_information` (
  `id` int(11) NOT NULL,
  `tax_id` varchar(100) NOT NULL,
  `tax` double NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  `description` varchar(100) DEFAULT NULL,
  `tax_agency` varchar(200) DEFAULT NULL,
  `sale_rate` varchar(100) DEFAULT NULL,
  `account` varchar(120) DEFAULT NULL,
  `show_taxonreturn` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tax_information`
--

INSERT INTO `tax_information` (`id`, `tax_id`, `tax`, `created_by`, `status`, `description`, `tax_agency`, `sale_rate`, `account`, `show_taxonreturn`) VALUES
(2, 'OA36X6AKVT', 50, '87', 1, 'DESC', 'Krishi Kalyan Cess', '66', 'Liability', 'Output-Education Tax'),
(3, 'OHSYSS43CS', 75, '87', 1, ' OTTYIYI', 'Krishi Kalyan Cess', '65', 'Expense', 'Output-Higher Education Tax');

-- --------------------------------------------------------

--
-- Table structure for table `tax_settings`
--

CREATE TABLE `tax_settings` (
  `id` int(11) NOT NULL,
  `create_by` varchar(100) NOT NULL,
  `default_value` float NOT NULL,
  `tax_name` varchar(250) NOT NULL,
  `nt` int(11) NOT NULL,
  `reg_no` varchar(100) NOT NULL,
  `is_show` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_financialyear`
--

CREATE TABLE `tbl_financialyear` (
  `fiyear_id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `date_time` datetime DEFAULT NULL,
  `is_active` varchar(3) DEFAULT NULL COMMENT '1=ended,0=inactive,2=active',
  `create_by` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_financialyear`
--

INSERT INTO `tbl_financialyear` (`fiyear_id`, `title`, `start_date`, `end_date`, `date_time`, `is_active`, `create_by`) VALUES
(44, '2023-2024', '2023-04-28', '2024-06-02', '2023-04-28 12:30:55', '0', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `timesheet_info`
--

CREATE TABLE `timesheet_info` (
  `id` int(11) NOT NULL,
  `templ_name` varchar(111) NOT NULL,
  `duration` varchar(111) NOT NULL,
  `job_title` varchar(111) NOT NULL,
  `dailybreak` varchar(111) NOT NULL,
  `payment_term` varchar(111) NOT NULL,
  `month` varchar(111) NOT NULL,
  `timesheet_id` int(11) NOT NULL,
  `create_by` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `timesheet_info`
--

INSERT INTO `timesheet_info` (`id`, `templ_name`, `duration`, `job_title`, `dailybreak`, `payment_term`, `month`, `timesheet_id`, `create_by`) VALUES
(24, '', '', '', '5', '', '06/16/2023 - 06/25/2023', 112178, 38),
(25, '1', '', '1', '5', '', '06/01/2023 - 06/06/2023', 841347, 38);

-- --------------------------------------------------------

--
-- Table structure for table `timesheet_info_details`
--

CREATE TABLE `timesheet_info_details` (
  `id` int(11) NOT NULL,
  `timesheet_id` int(11) NOT NULL,
  `Date` varchar(250) NOT NULL,
  `Day` varchar(250) NOT NULL,
  `time_start` varchar(250) NOT NULL,
  `time_end` varchar(250) NOT NULL,
  `hours_per_day` varchar(250) NOT NULL,
  `created_by` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `timesheet_info_details`
--

INSERT INTO `timesheet_info_details` (`id`, `timesheet_id`, `Date`, `Day`, `time_start`, `time_end`, `hours_per_day`, `created_by`) VALUES
(39, 112178, '23/6/2023', 'Fri', '11:52', '16:52', '4.55', 38),
(37, 112178, '21/6/2023', 'Wed', '11:52', '14:52', '2.55', 38),
(35, 112178, '19/6/2023', 'Mon', '11:52', '13:52', '1.55', 38),
(32, 112178, '16/6/2023', 'Fri', '11:52', '12:52', '0.55', 38),
(33, 112178, '17/6/2023', 'Sat', '12:52', '14:52', '1.55', 38),
(40, 112178, '24/6/2023', 'Sat', '11:52', '15:52', '3.55', 38),
(38, 112178, '22/6/2023', 'Thu', '13:52', '17:52', '3.55', 38),
(36, 112178, '20/6/2023', 'Tue', '12:52', '17:52', '4.55', 38),
(34, 112178, '18/6/2023', 'Sun', '11:52', '14:52', '2.55', 38),
(41, 841347, '1/6/2023', 'Thu', '12:16', '14:16', '1.55', 38);

-- --------------------------------------------------------

--
-- Table structure for table `tokens`
--

CREATE TABLE `tokens` (
  `id` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `user_id` varchar(250) NOT NULL,
  `created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tokens`
--

INSERT INTO `tokens` (`id`, `token`, `user_id`, `created`) VALUES
(34, '97a538d5b46331d0ea96365f9ec234', 'AD61952', '2023-05-25');

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` int(11) NOT NULL,
  `created_by` varchar(100) NOT NULL DEFAULT '1',
  `unit_id` varchar(255) CHARACTER SET latin1 NOT NULL,
  `unit_name` varchar(255) CHARACTER SET latin1 NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `created_by`, `unit_id`, `unit_name`, `status`) VALUES
(10, '38', '1418Z88GBT14GRE', 'KG', 1),
(11, '38', '3T8FHUUA64SNWJD', '55', 1),
(12, '38', 'S8LBZY1KVV4RLVQ', 'KK', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_id` varchar(15) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `company_name` varchar(250) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `section_setting` varchar(500) DEFAULT '[{"slug":"Sale","status":"enable"},{"slug":"Expense","status":"enable"},{"slug":"Sale_invoice","status":"enable"},{"slug":"Expense_invoice","status":"enable"},{"slug":"Product_sold","status":"enable"},{"slug":"Product_purchased","status":"enable"},{"slug":"best_sales_product","status":"enable"},{"slug":"todays_overview","status":"enable"},{"slug":"yearly_report","status":"enable"},{"slug":"todays_sales_report","status":"enable"}]',
  `phone` varchar(20) DEFAULT NULL,
  `gender` varchar(191) DEFAULT NULL,
  `date_of_birth` varchar(255) DEFAULT NULL,
  `logo` varchar(250) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `unique_id` varchar(250) NOT NULL,
  `create_by` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_id`, `last_name`, `first_name`, `company_name`, `address`, `section_setting`, `phone`, `gender`, `date_of_birth`, `logo`, `status`, `unique_id`, `create_by`) VALUES
(67, '38', 'Admin', 'Stone', '38', NULL, '[{\"slug\":\"TotalSale\",\"status\":\"enable\"},{\"slug\":\"TotalExpense\",\"status\":\"enable\"},{\"slug\":\"Profit\",\"status\":\"enable\"},{\"slug\":\"NoofProduct\",\"status\":\"enable\"},{\"slug\":\"Sale_Expense_Overview\",\"status\":\"enable\"},{\"slug\":\"Pie_Chart\",\"status\":\"enable\"},{\"slug\":\"No_of_Vendor\",\"status\":\"enable\"},{\"slug\":\"No_of_Customer\",\"status\":\"enable\"},{\"slug\":\"No_of_Employee\",\"status\":\"enable\"},{\"slug\":\"Best_10_Sales_Product\",\"status\":\"enable\"}]', 'udgwedg@ahgj', 'Male', '1211-03-12', NULL, 0, '', ''),
(68, '87', 'User', 'Lancaster', '87', NULL, '[{\"slug\":\"TotalSale\",\"status\":\"enable\"},{\"slug\":\"TotalExpense\",\"status\":\"enable\"},{\"slug\":\"Profit\",\"status\":\"enable\"},{\"slug\":\"NoofProduct\",\"status\":\"enable\"},{\"slug\":\"Sale_Expense_Overview\",\"status\":\"enable\"},{\"slug\":\"Pie_Chart\",\"status\":\"enable\"},{\"slug\":\"No_of_Vendor\",\"status\":\"enable\"},{\"slug\":\"No_of_Customer\",\"status\":\"enable\"},{\"slug\":\"No_of_Employee\",\"status\":\"enable\"},{\"slug\":\"Best_10_Sales_Product\",\"status\":\"enable\"}]', 'a@gmail.com', 'male', '2023-06-09', NULL, 0, '', ''),
(69, '', '646', '56', NULL, NULL, '[{\"slug\":\"Sale\",\"status\":\"enable\"},{\"slug\":\"Expense\",\"status\":\"enable\"},{\"slug\":\"Sale_invoice\",\"status\":\"enable\"},{\"slug\":\"Expense_invoice\",\"status\":\"enable\"},{\"slug\":\"Product_sold\",\"status\":\"enable\"},{\"slug\":\"Product_purchased\",\"status\":\"enable\"},{\"slug\":\"best_sales_product\",\"status\":\"enable\"},{\"slug\":\"todays_overview\",\"status\":\"enable\"},{\"slug\":\"yearly_report\",\"status\":\"enable\"},{\"slug\":\"todays_sales_report\",\"status\":\"enable\"}]', NULL, '6456', '2023-06-09', NULL, 0, 'AD91132', '2'),
(70, '91', 'rname', '1Use', '91', NULL, '[{\"slug\":\"Sale\",\"status\":\"enable\"},{\"slug\":\"Expense\",\"status\":\"enable\"},{\"slug\":\"Sale_invoice\",\"status\":\"enable\"},{\"slug\":\"Expense_invoice\",\"status\":\"enable\"},{\"slug\":\"Product_sold\",\"status\":\"enable\"},{\"slug\":\"Product_purchased\",\"status\":\"enable\"},{\"slug\":\"best_sales_product\",\"status\":\"enable\"},{\"slug\":\"todays_overview\",\"status\":\"enable\"},{\"slug\":\"yearly_report\",\"status\":\"enable\"},{\"slug\":\"todays_sales_report\",\"status\":\"enable\"}]', 'a@gmail.com', 'female', '2023-06-09', NULL, 0, 'UD91797', '91'),
(71, '91', '7', '7', '91', NULL, '[{\"slug\":\"Sale\",\"status\":\"enable\"},{\"slug\":\"Expense\",\"status\":\"enable\"},{\"slug\":\"Sale_invoice\",\"status\":\"enable\"},{\"slug\":\"Expense_invoice\",\"status\":\"enable\"},{\"slug\":\"Product_sold\",\"status\":\"enable\"},{\"slug\":\"Product_purchased\",\"status\":\"enable\"},{\"slug\":\"best_sales_product\",\"status\":\"enable\"},{\"slug\":\"todays_overview\",\"status\":\"enable\"},{\"slug\":\"yearly_report\",\"status\":\"enable\"},{\"slug\":\"todays_sales_report\",\"status\":\"enable\"}]', 'a@gmail.com', 'male', '2023-06-08', NULL, 0, 'UD91832', '91'),
(72, '', 'yash', 'Chaitan ', NULL, NULL, '[{\"slug\":\"Sale\",\"status\":\"enable\"},{\"slug\":\"Expense\",\"status\":\"enable\"},{\"slug\":\"Sale_invoice\",\"status\":\"enable\"},{\"slug\":\"Expense_invoice\",\"status\":\"enable\"},{\"slug\":\"Product_sold\",\"status\":\"enable\"},{\"slug\":\"Product_purchased\",\"status\":\"enable\"},{\"slug\":\"best_sales_product\",\"status\":\"enable\"},{\"slug\":\"todays_overview\",\"status\":\"enable\"},{\"slug\":\"yearly_report\",\"status\":\"enable\"},{\"slug\":\"todays_sales_report\",\"status\":\"enable\"}]', NULL, 'Male', '2023-05-28', NULL, 0, 'AD92109', '2'),
(73, '', 'Mosh', 'Chaitan', NULL, NULL, '[{\"slug\":\"Sale\",\"status\":\"enable\"},{\"slug\":\"Expense\",\"status\":\"enable\"},{\"slug\":\"Sale_invoice\",\"status\":\"enable\"},{\"slug\":\"Expense_invoice\",\"status\":\"enable\"},{\"slug\":\"Product_sold\",\"status\":\"enable\"},{\"slug\":\"Product_purchased\",\"status\":\"enable\"},{\"slug\":\"best_sales_product\",\"status\":\"enable\"},{\"slug\":\"todays_overview\",\"status\":\"enable\"},{\"slug\":\"yearly_report\",\"status\":\"enable\"},{\"slug\":\"todays_sales_report\",\"status\":\"enable\"}]', NULL, 'Male', '2023-06-24', NULL, 0, 'AD92513', '2');

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE `user_login` (
  `id` int(11) NOT NULL,
  `user_id` varchar(15) NOT NULL,
  `unique_id` varchar(250) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `user_type` int(11) DEFAULT 1,
  `security_code` varchar(255) DEFAULT NULL,
  `email_id` varchar(191) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `cid` int(11) NOT NULL,
  `u_type` int(11) NOT NULL,
  `create_by` varchar(250) NOT NULL,
  `user_delete_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`id`, `user_id`, `unique_id`, `username`, `password`, `user_type`, `security_code`, `email_id`, `status`, `cid`, `u_type`, `create_by`, `user_delete_id`) VALUES
(22, '2', '', 'amorio1', '1a938854c5eaaf069b7ae32677fa87eb', 1, '211229080059', 'amorio1@gmail.com', 1, 2, 1, '', 0),
(43, '38', 'AD61952', 'Stonemart', '1a938854c5eaaf069b7ae32677fa87eb', 2, NULL, 'suryakala@amoriotech.com', 1, 38, 2, '', 0),
(77, '38', 'UD38759', 'test', '5c78a869316b832cb3ab4813c0e20722', 1, NULL, '131243131', 1, 38, 3, '', 67),
(76, '88', 'AD88051', 'heeraramji', '1a938854c5eaaf069b7ae32677fa87eb', 2, NULL, 'heeraramji@amoriotech.com', 1, 88, 2, '88', 0),
(74, '87', 'AD87527', 'Tamstonemart', '1a938854c5eaaf069b7ae32677fa87eb', 2, NULL, 'tam@amoriotech.com', 1, 87, 2, '87', 0),
(75, '88', 'AD88129', 'ramjiuat', 'dd1f02d0102b0f931b2c0a2ec0d3a020', 2, '645646', 'ramjiuat@amoriotech.com', 1, 88, 2, '2', 0),
(73, '87', 'AD87381', 'ramjistonemart', 'e57a4697ad07a90395266bd442ac80b6', 2, '435345345', 'ramji@amoriotech.com', 1, 87, 2, '2', 0),
(78, '87', 'UD87360', 'user', 'c3fa4729a1d2f206263266eba138b30f', 1, NULL, '6456456456', 1, 87, 3, '', 68),
(79, '90', 'AD90512', 'aaa', '7ed5d7a1f5678f642dff10a181053f55', 2, '9566084864', 't@gmail.com', 1, 90, 2, '2', 0),
(80, '91', 'AD91132', '111', '0d78ca41a805e50ac5c02b5bd2d1e446', 2, '9566084864', 't@gmail.com', 1, 91, 2, '2', 0),
(81, '91', 'UD91797', '121', '65e438f3bd0e750ffa2ae70732888e19', 1, NULL, '5646', 1, 91, 3, '', 0),
(82, '91', 'UD91832', '7', 'cc6dad08f622eb947f2dcae57a7ad6bb', 1, NULL, '77', 1, 91, 3, '', 0),
(83, '91', 'AD91261', '000', 'cb891aeac7d7540b53a96ea79cbc7a73', 2, NULL, 'admin@example.com', 1, 91, 2, '2', 0),
(84, '92', 'AD92109', 'chai', 'de44f6599c20a95575cb17a951fe6ec2', 2, '549453211', 'chai@gmail.com', 1, 92, 2, '2', 0),
(85, '92', 'AD92513', 'chai2', 'dba21fd21d5ca65e5d195891ee7ade38', 2, NULL, 'admin@example.com', 1, 92, 2, '2', 0);

-- --------------------------------------------------------

--
-- Table structure for table `web_setting`
--

CREATE TABLE `web_setting` (
  `setting_id` int(11) NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `invoice_logo` varchar(255) DEFAULT NULL,
  `favicon` varchar(255) DEFAULT NULL,
  `currency` varchar(10) DEFAULT NULL,
  `timezone` varchar(150) NOT NULL,
  `currency_position` varchar(10) DEFAULT NULL,
  `footer_text` varchar(255) DEFAULT NULL,
  `language` varchar(255) DEFAULT NULL,
  `rtr` varchar(255) DEFAULT NULL,
  `captcha` int(11) DEFAULT 1 COMMENT '0=active,1=inactive',
  `site_key` varchar(250) DEFAULT NULL,
  `secret_key` varchar(250) DEFAULT NULL,
  `discount_type` int(11) DEFAULT 1,
  `create_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `web_setting`
--

INSERT INTO `web_setting` (`setting_id`, `logo`, `invoice_logo`, `favicon`, `currency`, `timezone`, `currency_position`, `footer_text`, `language`, `rtr`, `captcha`, `site_key`, `secret_key`, `discount_type`, `create_by`) VALUES
(1, './my-assets/image/logo/0e57149bdb30b4404d9bf031e570c97b.JPG', './my-assets/image/logo/635b02b0f131151bd9d582a9148fa3b2.JPG', 'http://localhost/R17/my-assets/image/logo/40552f50636e6f7057e9f5a57bdf0f66.png', '$', 'Africa/Casablanca', '0', '', 'english', '0', 0, '', '', 0, 38),
(2, 'my-assets/image/logo/14369d04a45dddb76ca04fa228a36c3c.PNG', './my-assets/image/logo/555f039ba66ab59cbe28c7ebc13cf303.JPG', 'http://localhost/R17/my-assets/image/logo/0aeb51b2b7100f52b7b52175c74706e4.png', '$', 'Africa/Casablanca', '0', '', 'english', '0', 0, '', '', 0, 0),
(3, './my-assets/image/logo/6e313051855dd9992ae3dd5a622df015.JPG', './my-assets/image/logo/cbdcca85233aff0b787335383909b6d3.JPG', 'http://localhost/R17/my-assets/image/logo/e871e43b24443723e67078356bc47133.png', '$', 'Africa/Casablanca', '0', 'ddsf', 'english', '0', 0, '', '', 0, 90),
(4, 'my-assets/image/logo/843b734ae2ee78046ac1009352cd3ea2.jpg', '', '', '$', 'Africa/Casablanca', '0', '', 'english', '0', 0, '', '', 0, 91),
(5, 'my-assets/image/logo/04ac113e8b12350352c21c11b3344163.jpg', './my-assets/image/logo/3e46e2a900b38f63bca6013ecf034224.jpg', 'http://localhost/R17/my-assets/image/logo/11810fa4c40b9074fc9d7b4bbeeda0aa.png', '$', 'Africa/Casablanca', '0', 'Powered By Amorio', 'english', '0', 0, '', '', 0, 92);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acc_coa`
--
ALTER TABLE `acc_coa`
  ADD PRIMARY KEY (`HeadName`),
  ADD KEY `HeadCode` (`HeadCode`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `supplier_id` (`supplier_id`);

--
-- Indexes for table `acc_transaction`
--
ALTER TABLE `acc_transaction`
  ADD UNIQUE KEY `ID` (`ID`),
  ADD KEY `COAID` (`COAID`);

--
-- Indexes for table `add_cart`
--
ALTER TABLE `add_cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`adm_id`);

--
-- Indexes for table `app_setting`
--
ALTER TABLE `app_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`att_id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `bank_add`
--
ALTER TABLE `bank_add`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bootgrid_data`
--
ALTER TABLE `bootgrid_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_assignrole`
--
ALTER TABLE `company_assignrole`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_information`
--
ALTER TABLE `company_information`
  ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currency_details`
--
ALTER TABLE `currency_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currency_tbl`
--
ALTER TABLE `currency_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_information`
--
ALTER TABLE `customer_information`
  ADD PRIMARY KEY (`customer_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `customer_type`
--
ALTER TABLE `customer_type`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `dailybreak`
--
ALTER TABLE `dailybreak`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `daily_closing`
--
ALTER TABLE `daily_closing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `designation`
--
ALTER TABLE `designation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `duration`
--
ALTER TABLE `duration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_config`
--
ALTER TABLE `email_config`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_data`
--
ALTER TABLE `email_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_history`
--
ALTER TABLE `employee_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_salary_payment`
--
ALTER TABLE `employee_salary_payment`
  ADD PRIMARY KEY (`emp_sal_pay_id`),
  ADD KEY `employee_id` (`employee_id`),
  ADD KEY `generate_id` (`generate_id`);

--
-- Indexes for table `employee_salary_setup`
--
ALTER TABLE `employee_salary_setup`
  ADD PRIMARY KEY (`e_s_s_id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `expense`
--
ALTER TABLE `expense`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expense_item`
--
ALTER TABLE `expense_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expense_packing_list`
--
ALTER TABLE `expense_packing_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expense_packing_list_detail`
--
ALTER TABLE `expense_packing_list_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expense_trucking`
--
ALTER TABLE `expense_trucking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expense_trucking_details`
--
ALTER TABLE `expense_trucking_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `federal_tax`
--
ALTER TABLE `federal_tax`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `help_desk`
--
ALTER TABLE `help_desk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `invoice_id` (`invoice_id`);

--
-- Indexes for table `invoice_content`
--
ALTER TABLE `invoice_content`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice_design`
--
ALTER TABLE `invoice_design`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice_details`
--
ALTER TABLE `invoice_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoice_id` (`invoice_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `invoice_email`
--
ALTER TABLE `invoice_email`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `language`
--
ALTER TABLE `language`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `module`
--
ALTER TABLE `module`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ocean_export_tracking`
--
ALTER TABLE `ocean_export_tracking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ocean_import_tracking`
--
ALTER TABLE `ocean_import_tracking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paymentterms_add`
--
ALTER TABLE `paymentterms_add`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `create_by` (`paymentterms_add`);

--
-- Indexes for table `payment_terms`
--
ALTER TABLE `payment_terms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_type`
--
ALTER TABLE `payment_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payroll_tax_setup`
--
ALTER TABLE `payroll_tax_setup`
  ADD PRIMARY KEY (`tax_setup_id`);

--
-- Indexes for table `personal_loan`
--
ALTER TABLE `personal_loan`
  ADD PRIMARY KEY (`per_loan_id`);

--
-- Indexes for table `person_information`
--
ALTER TABLE `person_information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `person_ledger`
--
ALTER TABLE `person_ledger`
  ADD PRIMARY KEY (`id`),
  ADD KEY `person_id` (`person_id`);

--
-- Indexes for table `pesonal_loan_information`
--
ALTER TABLE `pesonal_loan_information`
  ADD PRIMARY KEY (`id`),
  ADD KEY `person_id` (`person_id`);

--
-- Indexes for table `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_details`
--
ALTER TABLE `product_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_information`
--
ALTER TABLE `product_information`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `product_purchase`
--
ALTER TABLE `product_purchase`
  ADD PRIMARY KEY (`id`),
  ADD KEY `purchase_id` (`purchase_id`),
  ADD KEY `supplier_id` (`supplier_id`);

--
-- Indexes for table `product_purchase_details`
--
ALTER TABLE `product_purchase_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `purchase_id` (`purchase_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `product_return`
--
ALTER TABLE `product_return`
  ADD KEY `product_id` (`product_id`),
  ADD KEY `invoice_id` (`invoice_id`),
  ADD KEY `purchase_id` (`purchase_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `supplier_id` (`supplier_id`);

--
-- Indexes for table `product_service`
--
ALTER TABLE `product_service`
  ADD PRIMARY KEY (`service_id`);

--
-- Indexes for table `profarma_invoice`
--
ALTER TABLE `profarma_invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profarma_invoice_details`
--
ALTER TABLE `profarma_invoice_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_order`
--
ALTER TABLE `purchase_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `purchase_order_id` (`purchase_order_id`);

--
-- Indexes for table `purchase_order_details`
--
ALTER TABLE `purchase_order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `purchase_id` (`purchase_id`);

--
-- Indexes for table `quotation`
--
ALTER TABLE `quotation`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `quot_no` (`quot_no`),
  ADD KEY `quotation_id` (`quotation_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `quotation_service_used`
--
ALTER TABLE `quotation_service_used`
  ADD PRIMARY KEY (`id`),
  ADD KEY `quot_id` (`quot_id`),
  ADD KEY `service_id` (`service_id`);

--
-- Indexes for table `quotation_taxinfo`
--
ALTER TABLE `quotation_taxinfo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `quot_products_used`
--
ALTER TABLE `quot_products_used`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `quot_id` (`quot_id`);

--
-- Indexes for table `role_permission`
--
ALTER TABLE `role_permission`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_id` (`role_id`);

--
-- Indexes for table `salary_sheet_generate`
--
ALTER TABLE `salary_sheet_generate`
  ADD PRIMARY KEY (`ssg_id`);

--
-- Indexes for table `salary_type`
--
ALTER TABLE `salary_type`
  ADD PRIMARY KEY (`salary_type_id`);

--
-- Indexes for table `sales_invoice_settings`
--
ALTER TABLE `sales_invoice_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sale_packing_list`
--
ALTER TABLE `sale_packing_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sale_packing_list_detail`
--
ALTER TABLE `sale_packing_list_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sale_trucking`
--
ALTER TABLE `sale_trucking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sale_trucking_details`
--
ALTER TABLE `sale_trucking_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sec_role`
--
ALTER TABLE `sec_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sec_role_permission`
--
ALTER TABLE `sec_role_permission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sec_role_tbl`
--
ALTER TABLE `sec_role_tbl`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `sec_userrole`
--
ALTER TABLE `sec_userrole`
  ADD UNIQUE KEY `ID` (`id`);

--
-- Indexes for table `sec_user_access_tbl`
--
ALTER TABLE `sec_user_access_tbl`
  ADD PRIMARY KEY (`role_acc_id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_invoice`
--
ALTER TABLE `service_invoice`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `service_invoice_details`
--
ALTER TABLE `service_invoice_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `service_id` (`service_id`);

--
-- Indexes for table `service_provider_detail`
--
ALTER TABLE `service_provider_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sms_settings`
--
ALTER TABLE `sms_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `state_and_tax`
--
ALTER TABLE `state_and_tax`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `state_localtax`
--
ALTER TABLE `state_localtax`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_module`
--
ALTER TABLE `sub_module`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `super_module`
--
ALTER TABLE `super_module`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `super_permission`
--
ALTER TABLE `super_permission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `super_role`
--
ALTER TABLE `super_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier_information`
--
ALTER TABLE `supplier_information`
  ADD PRIMARY KEY (`supplier_id`),
  ADD KEY `supplier_id` (`supplier_id`);

--
-- Indexes for table `supplier_product`
--
ALTER TABLE `supplier_product`
  ADD PRIMARY KEY (`supplier_pr_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `supplier_id` (`supplier_id`);

--
-- Indexes for table `tax_collection`
--
ALTER TABLE `tax_collection`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `tax_information`
--
ALTER TABLE `tax_information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tax_settings`
--
ALTER TABLE `tax_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_financialyear`
--
ALTER TABLE `tbl_financialyear`
  ADD PRIMARY KEY (`fiyear_id`);

--
-- Indexes for table `timesheet_info`
--
ALTER TABLE `timesheet_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `timesheet_info_details`
--
ALTER TABLE `timesheet_info_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tokens`
--
ALTER TABLE `tokens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_login`
--
ALTER TABLE `user_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `web_setting`
--
ALTER TABLE `web_setting`
  ADD PRIMARY KEY (`setting_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acc_transaction`
--
ALTER TABLE `acc_transaction`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=410;

--
-- AUTO_INCREMENT for table `add_cart`
--
ALTER TABLE `add_cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `administrator`
--
ALTER TABLE `administrator`
  MODIFY `adm_id` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1011;

--
-- AUTO_INCREMENT for table `app_setting`
--
ALTER TABLE `app_setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `att_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bank_add`
--
ALTER TABLE `bank_add`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=466;

--
-- AUTO_INCREMENT for table `bootgrid_data`
--
ALTER TABLE `bootgrid_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `company_assignrole`
--
ALTER TABLE `company_assignrole`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `company_information`
--
ALTER TABLE `company_information`
  MODIFY `company_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=240;

--
-- AUTO_INCREMENT for table `currency_details`
--
ALTER TABLE `currency_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `currency_tbl`
--
ALTER TABLE `currency_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `customer_information`
--
ALTER TABLE `customer_information`
  MODIFY `customer_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `customer_type`
--
ALTER TABLE `customer_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `dailybreak`
--
ALTER TABLE `dailybreak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `daily_closing`
--
ALTER TABLE `daily_closing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `designation`
--
ALTER TABLE `designation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `duration`
--
ALTER TABLE `duration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `email_config`
--
ALTER TABLE `email_config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `email_data`
--
ALTER TABLE `email_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employee_history`
--
ALTER TABLE `employee_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `employee_salary_payment`
--
ALTER TABLE `employee_salary_payment`
  MODIFY `emp_sal_pay_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employee_salary_setup`
--
ALTER TABLE `employee_salary_setup`
  MODIFY `e_s_s_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `expense`
--
ALTER TABLE `expense`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `expense_item`
--
ALTER TABLE `expense_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `expense_packing_list`
--
ALTER TABLE `expense_packing_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `expense_packing_list_detail`
--
ALTER TABLE `expense_packing_list_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `expense_trucking`
--
ALTER TABLE `expense_trucking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `expense_trucking_details`
--
ALTER TABLE `expense_trucking_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `federal_tax`
--
ALTER TABLE `federal_tax`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `help_desk`
--
ALTER TABLE `help_desk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `invoice_content`
--
ALTER TABLE `invoice_content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `invoice_design`
--
ALTER TABLE `invoice_design`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `invoice_details`
--
ALTER TABLE `invoice_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `invoice_email`
--
ALTER TABLE `invoice_email`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `module`
--
ALTER TABLE `module`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `ocean_export_tracking`
--
ALTER TABLE `ocean_export_tracking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `ocean_import_tracking`
--
ALTER TABLE `ocean_import_tracking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `paymentterms_add`
--
ALTER TABLE `paymentterms_add`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment_terms`
--
ALTER TABLE `payment_terms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `payment_type`
--
ALTER TABLE `payment_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `payroll_tax_setup`
--
ALTER TABLE `payroll_tax_setup`
  MODIFY `tax_setup_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `personal_loan`
--
ALTER TABLE `personal_loan`
  MODIFY `per_loan_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `person_information`
--
ALTER TABLE `person_information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `person_ledger`
--
ALTER TABLE `person_ledger`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `pesonal_loan_information`
--
ALTER TABLE `pesonal_loan_information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product_details`
--
ALTER TABLE `product_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=408;

--
-- AUTO_INCREMENT for table `product_information`
--
ALTER TABLE `product_information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `product_purchase`
--
ALTER TABLE `product_purchase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `product_purchase_details`
--
ALTER TABLE `product_purchase_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=220;

--
-- AUTO_INCREMENT for table `product_service`
--
ALTER TABLE `product_service`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `profarma_invoice`
--
ALTER TABLE `profarma_invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `profarma_invoice_details`
--
ALTER TABLE `profarma_invoice_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `purchase_order`
--
ALTER TABLE `purchase_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `purchase_order_details`
--
ALTER TABLE `purchase_order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `quotation`
--
ALTER TABLE `quotation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `quotation_service_used`
--
ALTER TABLE `quotation_service_used`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `quotation_taxinfo`
--
ALTER TABLE `quotation_taxinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `quot_products_used`
--
ALTER TABLE `quot_products_used`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `role_permission`
--
ALTER TABLE `role_permission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `salary_sheet_generate`
--
ALTER TABLE `salary_sheet_generate`
  MODIFY `ssg_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `salary_type`
--
ALTER TABLE `salary_type`
  MODIFY `salary_type_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sales_invoice_settings`
--
ALTER TABLE `sales_invoice_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sale_packing_list`
--
ALTER TABLE `sale_packing_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sale_packing_list_detail`
--
ALTER TABLE `sale_packing_list_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sale_trucking`
--
ALTER TABLE `sale_trucking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sale_trucking_details`
--
ALTER TABLE `sale_trucking_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `sec_role`
--
ALTER TABLE `sec_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sec_role_permission`
--
ALTER TABLE `sec_role_permission`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sec_role_tbl`
--
ALTER TABLE `sec_role_tbl`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sec_userrole`
--
ALTER TABLE `sec_userrole`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sec_user_access_tbl`
--
ALTER TABLE `sec_user_access_tbl`
  MODIFY `role_acc_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `service_invoice`
--
ALTER TABLE `service_invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `service_invoice_details`
--
ALTER TABLE `service_invoice_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `service_provider_detail`
--
ALTER TABLE `service_provider_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `sms_settings`
--
ALTER TABLE `sms_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `state_and_tax`
--
ALTER TABLE `state_and_tax`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `state_localtax`
--
ALTER TABLE `state_localtax`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `sub_module`
--
ALTER TABLE `sub_module`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT for table `super_module`
--
ALTER TABLE `super_module`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `super_permission`
--
ALTER TABLE `super_permission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=268;

--
-- AUTO_INCREMENT for table `super_role`
--
ALTER TABLE `super_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `supplier_information`
--
ALTER TABLE `supplier_information`
  MODIFY `supplier_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `supplier_product`
--
ALTER TABLE `supplier_product`
  MODIFY `supplier_pr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tax_collection`
--
ALTER TABLE `tax_collection`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tax_information`
--
ALTER TABLE `tax_information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tax_settings`
--
ALTER TABLE `tax_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_financialyear`
--
ALTER TABLE `tbl_financialyear`
  MODIFY `fiyear_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `timesheet_info`
--
ALTER TABLE `timesheet_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `timesheet_info_details`
--
ALTER TABLE `timesheet_info_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `tokens`
--
ALTER TABLE `tokens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `user_login`
--
ALTER TABLE `user_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `web_setting`
--
ALTER TABLE `web_setting`
  MODIFY `setting_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
