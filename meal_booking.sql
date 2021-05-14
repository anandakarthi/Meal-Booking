-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 14, 2021 at 03:09 PM
-- Server version: 5.7.24
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `meal_booking`
--

-- --------------------------------------------------------

--
-- Table structure for table `core_meal_booking`
--

DROP TABLE IF EXISTS `core_meal_booking`;
CREATE TABLE IF NOT EXISTS `core_meal_booking` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` int(11) NOT NULL,
  `meal_config_id` int(11) NOT NULL,
  `meal_booking_date` date DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created` date DEFAULT NULL,
  `meal_id` int(11) NOT NULL,
  `plant_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `core_meal_booking`
--

INSERT INTO `core_meal_booking` (`id`, `employee_id`, `meal_config_id`, `meal_booking_date`, `created_at`, `updated_at`, `created`, `meal_id`, `plant_id`) VALUES
(5, 2, 2, '2021-05-12', '2021-05-11 18:11:06', '2021-05-11 18:11:06', '2021-05-11', 5, NULL),
(6, 1, 2, '2021-05-12', '2021-05-11 18:13:43', '2021-05-11 18:13:43', '2021-05-11', 5, NULL),
(7, 1, 1, '2021-05-12', '2021-05-11 18:14:28', '2021-05-11 18:14:28', '2021-05-11', 4, NULL),
(8, 1, 3, '2021-05-11', '2021-05-11 18:14:45', '2021-05-11 18:14:45', '2021-05-11', 6, NULL),
(9, 2, 1, '2021-05-12', '2021-05-11 18:15:15', '2021-05-11 18:15:15', '2021-05-11', 4, NULL),
(10, 2, 3, '2021-05-11', '2021-05-11 18:15:22', '2021-05-11 18:15:22', '2021-05-11', 6, NULL),
(12, 2, 2, '2021-05-13', '2021-05-12 11:06:02', '2021-05-12 11:06:02', '2021-05-12', 5, NULL),
(13, 2, 1, '2021-05-13', '2021-05-12 11:06:10', '2021-05-12 11:06:10', '2021-05-12', 4, NULL),
(16, 2, 3, '2021-05-12', '2021-05-12 11:35:38', '2021-05-12 11:35:38', '2021-05-12', 6, NULL),
(18, 1, 3, '2021-05-12', '2021-05-12 13:18:11', '2021-05-12 13:18:11', '2021-05-12', 6, NULL),
(19, 2, 1, '2021-05-14', '2021-05-14 17:07:12', '2021-05-14 17:07:12', '2021-05-14', 4, NULL),
(20, 2, 2, '2021-05-14', '2021-05-14 17:07:15', '2021-05-14 17:07:15', '2021-05-14', 5, NULL),
(21, 2, 3, '2021-05-14', '2021-05-14 17:07:20', '2021-05-14 17:07:20', '2021-05-14', 6, NULL),
(22, 1, 1, '2021-05-14', '2021-05-14 17:07:33', '2021-05-14 17:07:33', '2021-05-14', 4, NULL),
(23, 1, 2, '2021-05-14', '2021-05-14 17:07:43', '2021-05-14 17:07:43', '2021-05-14', 5, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `core_meal_config`
--

DROP TABLE IF EXISTS `core_meal_config`;
CREATE TABLE IF NOT EXISTS `core_meal_config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `plant_id` int(11) NOT NULL,
  `meal_id` int(11) NOT NULL,
  `from_time` varchar(100) NOT NULL,
  `to_time` varchar(100) NOT NULL,
  `availing_time` varchar(100) DEFAULT NULL,
  `supplier_price` varchar(100) NOT NULL,
  `staff_cost` varchar(100) NOT NULL,
  `workforce_cost` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `previous_day` int(1) DEFAULT '0' COMMENT '0-no,1-Yes',
  `created_by` varchar(100) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `core_meal_config`
--

INSERT INTO `core_meal_config` (`id`, `plant_id`, `meal_id`, `from_time`, `to_time`, `availing_time`, `supplier_price`, `staff_cost`, `workforce_cost`, `created_at`, `previous_day`, `created_by`, `updated_at`) VALUES
(1, 1, 4, '6:00 AM', '6:30 PM', '7:30 PM', '50', '30', '20', '2021-05-11 14:59:36', 1, '2', '2021-05-11 18:14:22'),
(2, 1, 5, '8:00 AM', '6:30 PM', '8:00 PM', '75', '50', '60', '2021-05-11 15:00:02', 1, '2', '2021-05-11 15:00:54'),
(3, 1, 6, '6:00 AM', '7:00 PM', '6:30 PM', '60', '30', '20', '2021-05-11 15:00:28', 0, '2', '2021-05-11 18:14:39');

-- --------------------------------------------------------

--
-- Table structure for table `core_meal_name`
--

DROP TABLE IF EXISTS `core_meal_name`;
CREATE TABLE IF NOT EXISTS `core_meal_name` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `plant_id` int(11) DEFAULT NULL,
  `menu_name` varchar(100) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0' COMMENT '0-working ,1-not working',
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `core_meal_name`
--

INSERT INTO `core_meal_name` (`id`, `plant_id`, `menu_name`, `status`, `created_at`, `created_by`, `updated_at`) VALUES
(4, 1, 'BreakFast', 1, '2021-05-07 10:24:49', 2, '2021-05-10 18:43:32'),
(5, 1, 'Lunch', 1, '2021-05-07 10:25:04', 2, '2021-05-07 10:25:04'),
(6, 1, 'Dinner', 1, '2021-05-07 10:25:10', 2, '2021-05-11 06:39:02');

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

DROP TABLE IF EXISTS `units`;
CREATE TABLE IF NOT EXISTS `units` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `unit_name` varchar(50) DEFAULT NULL,
  `short_name` varchar(50) DEFAULT NULL,
  `unit_descpn` varchar(100) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1' COMMENT '1-Active,0-inactive',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `unit_name`, `short_name`, `unit_descpn`, `status`, `created_at`, `updated_at`) VALUES
(1, '1001', 'PHU1 - DTA', 'PHU1 Plastic DTA (Kelambakkam)', 1, '2019-11-28 03:57:42', '2020-07-21 10:41:53'),
(2, '1002', 'PHU1 - EOU', 'PHU1 Plastic EOU (Kelambakkam)', 1, '2019-12-05 01:25:30', '2020-07-21 10:42:13'),
(3, '1003', 'PHU4 - Assembly', 'PHU4 Assembly (Kannivakkam)', 1, '2020-01-10 00:18:56', '2020-07-21 10:42:30'),
(4, '1004', 'PHU2 - Pithampur', 'PHU2 (Pitampur)', 1, '2020-01-10 00:19:09', '2020-07-21 10:42:53'),
(5, '1005', 'PHU3 - JSR', 'PHU3 (Jamshedpur)', 1, '2020-01-14 05:59:03', '2020-07-21 10:43:09'),
(6, '1006', 'PHU4 - Fittings', 'PHU4 Fittings (Kannivakkam)', 1, '2020-01-14 05:59:03', '2020-07-21 10:44:11'),
(7, '1007', 'PHU5 - PNR', 'PHU5 (Pant Nagar)', 1, '2020-01-14 05:59:34', '2020-07-21 10:44:31'),
(8, '1008', 'PHU6 - FBD', 'PHU6 (Faridabad)', 1, '2020-01-14 05:59:34', '2020-07-21 10:44:43'),
(9, '1009', 'PHU4 - DTA - Extrusion', 'PHU4 Extrusion (Kannivakkam)', 1, '2020-01-14 06:00:11', '2020-07-21 10:45:38'),
(10, '2001', 'PHIR - Rubber', 'PHIR (Irungattukottai)', 1, '2020-01-14 06:00:11', '2020-07-29 20:09:39'),
(16, '1000', 'PHIN - HO', 'Head Office', 1, '2020-03-25 08:39:09', '2020-08-02 10:00:21'),
(18, '1010', 'PHU7 - PNQ', 'PHAP Pune Hyd', 1, '2020-07-20 04:19:46', '2020-08-02 08:05:59'),
(19, '9001', 'PHHP', 'PHHP (Marakkanam)', 1, '2021-02-15 10:11:05', '2021-02-15 10:11:05');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `emp_code` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `org_password` longtext COLLATE utf8mb4_unicode_ci,
  `lastname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `firstname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `phone` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `department` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '3-meal_admin',
  `report_to` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `device_OS_type` varbinary(100) DEFAULT NULL,
  `device_token` longtext COLLATE utf8mb4_unicode_ci,
  `staff_status` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `emp_code`, `email`, `password`, `org_password`, `lastname`, `firstname`, `remember_token`, `deleted_at`, `created_at`, `updated_at`, `phone`, `department`, `unit`, `status`, `role`, `report_to`, `email_verified_at`, `device_OS_type`, `device_token`, `staff_status`) VALUES
(1, 'admin', '123456', 'admin@gmail.com', '$2y$10$8cP3Yh1P1H/eFIqNjEzFqe/Y1YsQ4MHWHKbFdAODYuJrYfzpLbgta', NULL, 'Mr', 'admin', 'pLbHyzoT1Fz8Axu2zBUrDSrsfOQkFaICCUBHgAPqNxHuJZpZnfk29WKTlTzt', NULL, '2021-04-30 06:39:53', '2021-04-30 06:39:53', '9751709199', 'Test department', '1', NULL, '3', NULL, NULL, NULL, NULL, 'staff'),
(2, 'Karthick', '654321', 'karthick@gmail.com', '$2y$10$8cP3Yh1P1H/eFIqNjEzFqe/Y1YsQ4MHWHKbFdAODYuJrYfzpLbgta', '123456', NULL, 'Karthick', 'wv7NfyW6aLhDO4OivVxHnoioVPqi0CgRIIpEpiplulzRo0IUcoO0jBFkhfNH', NULL, '2021-04-30 06:42:57', '2021-04-30 06:42:57', '8056653499', 'Test department', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'staff'),
(3, 'AnandaKarthick', '963258', 'anandakarthick@gmail.com', '$2y$10$WoYOa03u7JEH6uELvIGgUemjokh8jFDP5wMZe.bwBR2Sqgy/rY.hi', NULL, NULL, 'AnandaKarthick', NULL, NULL, '2021-05-06 04:11:24', '2021-05-06 04:11:24', '9003096885', 'Test department', '1', NULL, '', NULL, NULL, NULL, NULL, 'staff');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
