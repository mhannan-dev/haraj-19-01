-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 21, 2023 at 07:11 AM
-- Server version: 5.7.33
-- PHP Version: 8.0.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `appdehjb_haraj`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `auth_id` bigint(20) UNSIGNED NOT NULL,
  `profile_pic` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_pic_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pic_mime_type` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `first_name`, `last_name`, `designation`, `auth_id`, `profile_pic`, `profile_pic_url`, `pic_mime_type`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Super', 'Admin', 'Super Admin', 1, 'profile_11102022_1665485097.jpg', 'http://localhost/haraj_final/profile/profile_11102022_1665485097.jpg', NULL, 1, NULL, '2022-10-11 04:44:57', NULL),
(4, 'Test', 'User', 'Developer', 4, 'profile_20-01-2023_1674231616.jpg', NULL, NULL, 1, '2023-01-20 10:20:16', '2023-01-20 10:35:19', NULL),
(5, 'Basic', 'User', 'Engineer', 5, 'profile_21-01-2023_1674275919.png', NULL, NULL, 1, '2023-01-20 22:38:39', '2023-01-20 22:38:39', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `advertisements`
--

CREATE TABLE `advertisements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `advertiser_id` int(10) UNSIGNED NOT NULL COMMENT 'PK on Advertiser table',
  `category_id` int(10) UNSIGNED NOT NULL COMMENT 'PK on Category table',
  `type_id` int(10) UNSIGNED NOT NULL COMMENT 'PK on Types table',
  `city_id` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT 'PK on City table',
  `sub_category_id` int(10) UNSIGNED DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` decimal(24,2) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'def.png',
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `condition` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `authenticity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `model` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `edition` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year_of_manufacture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `features` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details_informations` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0 == Pending, 1 == Published, 2 == Sold',
  `is_price_negotiable` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0 == No, 1 == Yes',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `feature_expire_date` timestamp NULL DEFAULT NULL,
  `view_count` int(11) NOT NULL DEFAULT '0',
  `location_embeded_map` text COLLATE utf8mb4_unicode_ci,
  `fuel_type` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_featured` tinyint(4) DEFAULT '0',
  `latitude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longitude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ad_type_id` int(11) DEFAULT NULL,
  `meta_tags` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `advertisements`
--

INSERT INTO `advertisements` (`id`, `advertiser_id`, `category_id`, `type_id`, `city_id`, `sub_category_id`, `title`, `slug`, `price`, `image`, `description`, `condition`, `authenticity`, `brand_id`, `model`, `color`, `edition`, `year_of_manufacture`, `features`, `details_informations`, `status`, `is_price_negotiable`, `created_at`, `updated_at`, `feature_expire_date`, `view_count`, `location_embeded_map`, `fuel_type`, `is_featured`, `latitude`, `longitude`, `ad_type_id`, `meta_tags`, `meta_title`) VALUES
(118, 3, 18, 0, 1, 20, 'testttttt', 'testttttt', '5000.00', '1673957936.webp', 'test', 'used', 'Refurbished', 1, 'test', 'dark-blue', '9th', '2017', NULL, NULL, 1, 0, '2023-01-17 06:18:58', '2023-01-17 06:18:58', NULL, 2, 'test', NULL, 0, '24.6151', '89.808', NULL, 'test', 'test'),
(119, 3, 18, 0, 1, NULL, 'test', 'test', '20000.00', '1673958727.webp', 'test', 'used', 'Original', 2, 'A20', 'light-blue', '10th', '2018', NULL, NULL, 1, 0, '2023-01-17 06:32:14', '2023-01-20 02:47:01', NULL, 7, 'test', NULL, 0, '23.85633650187151', '90.35275792413435', NULL, 'test', 'test'),
(120, 3, 18, 0, 1, NULL, 'rarar', 'rarar', '499.00', '1673958953.webp', 'test', 'new', 'Original', 2, 'ADS', 'dark-green', '8th', '2017', NULL, NULL, 1, 0, '2023-01-17 06:35:54', '2023-01-20 03:12:43', NULL, 5, 'test', NULL, 0, '23.85645200772521', '90.35271744633472', NULL, 'test', 'test'),
(121, 4, 18, 0, 1, 20, 'test', 'test', '500.00', '1674037054.webp', 'test', 'used', 'Refurbished', 1, 'teset', 'light-blue', '7th', '2017', NULL, NULL, 1, 0, '2023-01-18 04:17:35', '2023-01-20 03:11:05', NULL, 2, 'test', NULL, 0, '23.85624178300702', '90.3524957914746', NULL, 'test', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `advertisement_advertiser`
--

CREATE TABLE `advertisement_advertiser` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `advertisement_id` bigint(20) UNSIGNED NOT NULL,
  `advertiser_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `advertisement_advertiser`
--

INSERT INTO `advertisement_advertiser` (`id`, `advertisement_id`, `advertiser_id`, `created_at`, `updated_at`) VALUES
(72, 119, 3, '2023-01-17 23:49:48', '2023-01-17 23:49:48'),
(75, 120, 4, '2023-01-18 00:18:27', '2023-01-18 00:18:27'),
(76, 120, 3, '2023-01-18 11:35:22', '2023-01-18 11:35:22'),
(77, 121, 3, '2023-01-18 11:45:37', '2023-01-18 11:45:37');

-- --------------------------------------------------------

--
-- Table structure for table `advertisement_interest_advertisement`
--

CREATE TABLE `advertisement_interest_advertisement` (
  `id` int(11) NOT NULL,
  `interest_advertisement_id` int(10) UNSIGNED NOT NULL,
  `visitor_id` int(255) DEFAULT NULL,
  `ip_address` varchar(255) NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `advertisement_interest_advertisement`
--

INSERT INTO `advertisement_interest_advertisement` (`id`, `interest_advertisement_id`, `visitor_id`, `ip_address`, `updated_at`, `created_at`) VALUES
(12, 119, 4, '::1', '2023-01-18 08:40:12', '2023-01-18 08:40:12'),
(13, 120, 4, '::1', '2023-01-18 08:57:48', '2023-01-18 08:57:48');

-- --------------------------------------------------------

--
-- Table structure for table `advertisers`
--

CREATE TABLE `advertisers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_no` varchar(14) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `registration_code` int(11) NOT NULL,
  `about` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0 == Not varified, 1 == Verified',
  `show_mobile_no` tinyint(4) NOT NULL DEFAULT '1' COMMENT '0 == No, 1 == Yes',
  `last_seen` datetime DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `chat_status` tinyint(4) NOT NULL DEFAULT '0',
  `chat_delete_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `advertisers`
--

INSERT INTO `advertisers` (`id`, `first_name`, `last_name`, `mobile_no`, `designation`, `email`, `username`, `password`, `provider_id`, `city_id`, `registration_code`, `about`, `status`, `show_mobile_no`, `last_seen`, `deleted_at`, `created_at`, `updated_at`, `remember_token`, `image`, `avatar`, `chat_status`, `chat_delete_by`) VALUES
(1, 'Muhammad', 'Hannan', '01717121213', NULL, '1mdhannan.info@gmail.com', 'mdhannan.info@gmail.com', '$2y$10$cdACBs/iFbgmXKli/K5PpusSRxcf8kDZLtIm7tcXGgCtsPsAOJ0MC', NULL, 1, 882630, 'Laravel Developer', 1, 1, '2022-11-28 13:37:15', NULL, '2022-09-13 18:00:00', '2022-11-28 07:37:15', NULL, '2022-11-22-1669095354.png', NULL, 1, NULL),
(2, 'Tanvir', 'Ahmed', '01718191912', NULL, 'ahannan.info@gmail.com', 'ahannan.info@gmail.com', '$2y$10$5fNLwnSc8ELo2nXrL.agAuVNw3ft.fcslvuoQ3/JNZzR4gda2HRqe', NULL, 1, 519853, NULL, 1, 1, '2022-10-21 19:40:18', NULL, '2022-10-08 04:14:14', '2022-10-21 13:40:18', NULL, '2022-10-11-1665479537.png', NULL, 1, NULL),
(3, 'John', 'Doe', '123456789', NULL, 'testuser@gmail.com', 'testuser', '$2y$10$DVSsh3CmzAEj273eUqLviOmhYWirFyK5foSmlSze6DJuc5AELeFty', NULL, 1, 0, 'test', 1, 1, '2023-01-18 17:45:39', NULL, '2023-01-14 13:15:16', '2023-01-20 02:31:04', NULL, NULL, NULL, 0, NULL),
(4, 'FR', 'Ranad', '123456789', NULL, 'frranad1@gmail.com', 'frranad1-9378', '$2y$10$Vw6DgPqi9cfi46HIPL6ZwOq12A1R4zJTlPMo.DnbwVsGq8sA.yrVa', NULL, 1, 1247185014, 'Test', 1, 1, '2023-01-18 13:02:00', NULL, '2023-01-11 06:39:23', '2023-01-18 07:02:00', NULL, '2023-01-12-1673503312.png', NULL, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ad_complains`
--

CREATE TABLE `ad_complains` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `advertisement_id` int(10) UNSIGNED NOT NULL,
  `complain` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `complain_details` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ad_complains`
--

INSERT INTO `ad_complains` (`id`, `advertisement_id`, `complain`, `complain_details`, `created_at`, `updated_at`) VALUES
(1, 4, 'shouldn\'t be on your site', 'Test', '2022-10-01 03:53:14', '2022-10-01 03:53:14'),
(2, 4, 'illegal product', NULL, '2022-10-01 03:56:13', '2022-10-01 03:56:13'),
(3, 94, 'I think it\'s fraud', 'kjjjhjh', '2023-01-16 07:01:26', '2023-01-16 07:01:26');

-- --------------------------------------------------------

--
-- Table structure for table `ad_images`
--

CREATE TABLE `ad_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `advertisement_id` int(10) UNSIGNED NOT NULL COMMENT 'PK on advertisements table',
  `images` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ad_images`
--

INSERT INTO `ad_images` (`id`, `advertisement_id`, `images`, `created_at`, `updated_at`) VALUES
(26, 18, '166550812017269.jpg', '2022-10-11 11:08:40', '2022-10-11 11:08:40'),
(27, 19, '166550815675347.jpg', '2022-10-11 11:09:16', '2022-10-11 11:09:16'),
(28, 20, '166550822369677.jpg', '2022-10-11 11:10:23', '2022-10-11 11:10:23'),
(29, 21, '166550964166263.jpg', '2022-10-11 11:34:01', '2022-10-11 11:34:01'),
(30, 22, '166551063420028.jpg', '2022-10-11 11:50:34', '2022-10-11 11:50:34'),
(31, 23, '166551189355081.jpg', '2022-10-11 12:11:33', '2022-10-11 12:11:33'),
(32, 23, '166551189325074.jpg', '2022-10-11 12:11:33', '2022-10-11 12:11:33'),
(33, 24, '166551192027144.jpg', '2022-10-11 12:12:00', '2022-10-11 12:12:00'),
(34, 24, '166551192041469.jpg', '2022-10-11 12:12:00', '2022-10-11 12:12:00'),
(35, 25, '16655122037081.jpg', '2022-10-11 12:16:43', '2022-10-11 12:16:43'),
(36, 26, '166557353520279.jpg', '2022-10-12 05:18:55', '2022-10-12 05:18:55'),
(37, 27, '166558848076711.jpeg', '2022-10-12 09:28:00', '2022-10-12 09:28:00'),
(38, 31, '166559539854816.jpg', '2022-10-12 11:23:18', '2022-10-12 11:23:18'),
(39, 32, '166559571079151.jpg', '2022-10-12 11:28:30', '2022-10-12 11:28:30'),
(40, 33, '166559586711169.jpg', '2022-10-12 11:31:07', '2022-10-12 11:31:07'),
(41, 34, '166564614066891.jpg', '2022-10-13 01:29:00', '2022-10-13 01:29:00'),
(42, 35, '166583623667529.jpg', '2022-10-15 06:17:16', '2022-10-15 06:17:16'),
(43, 37, '166590142788019.jpg', '2022-10-16 00:23:47', '2022-10-16 00:23:47'),
(44, 39, '166590249186042.jpeg', '2022-10-16 00:41:31', '2022-10-16 00:41:31'),
(45, 40, '166590266974211.jpg', '2022-10-16 00:44:29', '2022-10-16 00:44:29'),
(46, 40, '166590266939248.jpg', '2022-10-16 00:44:29', '2022-10-16 00:44:29'),
(47, 46, '166591100813966.jpg', '2022-10-16 03:03:29', '2022-10-16 03:03:29'),
(48, 47, '166591229940782.jpg', '2022-10-16 03:24:59', '2022-10-16 03:24:59'),
(49, 47, '166591229991119.jpg', '2022-10-16 03:24:59', '2022-10-16 03:24:59'),
(50, 48, '166592019894955.jpg', '2022-10-16 05:36:38', '2022-10-16 05:36:38'),
(51, 48, '166592019884855.jpg', '2022-10-16 05:36:38', '2022-10-16 05:36:38'),
(52, 49, '16659325906244.jpg', '2022-10-16 09:03:10', '2022-10-16 09:03:10'),
(53, 49, '166593259093232.jpg', '2022-10-16 09:03:10', '2022-10-16 09:03:10'),
(54, 50, '166627803475242.png', '2022-10-20 09:00:34', '2022-10-20 09:00:34'),
(55, 50, '166627803425039.png', '2022-10-20 09:00:34', '2022-10-20 09:00:34'),
(56, 51, '166637889497352.png', '2022-10-21 13:01:34', '2022-10-21 13:01:34'),
(57, 52, '166637956795563.png', '2022-10-21 13:12:47', '2022-10-21 13:12:47'),
(58, 53, '166638022024488.png', '2022-10-21 13:23:40', '2022-10-21 13:23:40'),
(59, 54, '166638044344829.png', '2022-10-21 13:27:23', '2022-10-21 13:27:23'),
(60, 55, '166638083278023.jpeg', '2022-10-21 13:33:52', '2022-10-21 13:33:52'),
(61, 56, '166638100449813.png', '2022-10-21 13:36:44', '2022-10-21 13:36:44'),
(62, 57, '166638121381607.png', '2022-10-21 13:40:13', '2022-10-21 13:40:13'),
(63, 58, '166859065898292.jpg', '2022-11-16 03:24:18', '2022-11-16 03:24:18'),
(64, 59, '166859402389561.jpeg', '2022-11-16 04:20:23', '2022-11-16 04:20:23'),
(65, 60, '166885717425088.jpg', '2022-11-19 05:26:14', '2022-11-19 05:26:14'),
(66, 60, '166885717419175.jpg', '2022-11-19 05:26:14', '2022-11-19 05:26:14'),
(67, 61, '166894596352787.jpeg', '2022-11-20 06:06:03', '2022-11-20 06:06:03'),
(68, 62, '166894868155875.png', '2022-11-20 06:51:21', '2022-11-20 06:51:21'),
(69, 62, '166894868194053.png', '2022-11-20 06:51:21', '2022-11-20 06:51:21'),
(70, 63, '166909370393965.jpg', '2022-11-21 23:08:23', '2022-11-21 23:08:23'),
(71, 63, '166909370383839.jpg', '2022-11-21 23:08:23', '2022-11-21 23:08:23'),
(72, 64, '166910165351321.jpg', '2022-11-22 01:20:53', '2022-11-22 01:20:53'),
(73, 64, '166910165482614.jpg', '2022-11-22 01:20:54', '2022-11-22 01:20:54'),
(74, 65, '166912377346718.jpg', '2022-11-22 07:29:33', '2022-11-22 07:29:33'),
(75, 65, '166912377313072.jpg', '2022-11-22 07:29:33', '2022-11-22 07:29:33'),
(76, 66, '166912619553725.jpg', '2022-11-22 08:09:55', '2022-11-22 08:09:55'),
(77, 67, '166913279279724.jpg', '2022-11-22 09:59:52', '2022-11-22 09:59:52'),
(78, 68, '166913324558986.jpg', '2022-11-22 10:07:25', '2022-11-22 10:07:25'),
(79, 69, '166913410069490.jpg', '2022-11-22 10:21:40', '2022-11-22 10:21:40'),
(80, 70, '16691350642657.jpg', '2022-11-22 10:37:44', '2022-11-22 10:37:44'),
(81, 71, '166913643232836.jpg', '2022-11-22 11:00:32', '2022-11-22 11:00:32'),
(82, 72, '166913688690217.jpg', '2022-11-22 11:08:06', '2022-11-22 11:08:06'),
(83, 72, '166913688648668.jpg', '2022-11-22 11:08:06', '2022-11-22 11:08:06'),
(84, 73, '166913759861243.jpg', '2022-11-22 11:19:58', '2022-11-22 11:19:58'),
(85, 73, '166913759810673.jpg', '2022-11-22 11:19:58', '2022-11-22 11:19:58'),
(86, 74, '166913812570422.jpg', '2022-11-22 11:28:45', '2022-11-22 11:28:45'),
(87, 74, '166913812513413.jpg', '2022-11-22 11:28:45', '2022-11-22 11:28:45'),
(88, 75, '166913891924374.jpg', '2022-11-22 11:41:59', '2022-11-22 11:41:59'),
(89, 76, '166913897974208.jpg', '2022-11-22 11:42:59', '2022-11-22 11:42:59'),
(90, 77, '166913907720847.jpg', '2022-11-22 11:44:37', '2022-11-22 11:44:37'),
(91, 78, '166913967289991.jpg', '2022-11-22 11:54:32', '2022-11-22 11:54:32'),
(92, 78, '166913967222832.jpg', '2022-11-22 11:54:32', '2022-11-22 11:54:32'),
(93, 79, '166914016470275.jpg', '2022-11-22 12:02:44', '2022-11-22 12:02:44'),
(94, 79, '166914016456718.jpg', '2022-11-22 12:02:44', '2022-11-22 12:02:44'),
(95, 80, '166914038527060.jpg', '2022-11-22 12:06:25', '2022-11-22 12:06:25'),
(96, 80, '166914038560011.jpg', '2022-11-22 12:06:25', '2022-11-22 12:06:25'),
(97, 81, '166914069317215.jpg', '2022-11-22 12:11:33', '2022-11-22 12:11:33'),
(98, 82, '166914149619923.jpg', '2022-11-22 12:24:56', '2022-11-22 12:24:56'),
(99, 82, '166914149689420.jpg', '2022-11-22 12:24:56', '2022-11-22 12:24:56'),
(100, 83, '166914168526666.jpg', '2022-11-22 12:28:05', '2022-11-22 12:28:05'),
(101, 84, '166914242782493.jpg', '2022-11-22 12:40:27', '2022-11-22 12:40:27'),
(102, 85, '166914266822012.jpg', '2022-11-22 12:44:28', '2022-11-22 12:44:28'),
(103, 86, '16691428672949.jpg', '2022-11-22 12:47:47', '2022-11-22 12:47:47'),
(104, 88, '166914363497994.jpg', '2022-11-22 13:00:34', '2022-11-22 13:00:34'),
(105, 89, '166914407477264.jpg', '2022-11-22 13:07:54', '2022-11-22 13:07:54'),
(106, 90, '166914455435196.jpg', '2022-11-22 13:15:54', '2022-11-22 13:15:54'),
(107, 91, '16691446866317.jpg', '2022-11-22 13:18:06', '2022-11-22 13:18:06'),
(108, 92, '166918882191117.jpg', '2022-11-23 01:33:41', '2022-11-23 01:33:41'),
(109, 93, '166918924076146.jpg', '2022-11-23 01:40:40', '2022-11-23 01:40:40'),
(110, 94, '167350375557749.webp', '2023-01-12 00:09:17', '2023-01-12 00:09:17'),
(111, 114, '167378148218852.webp', '2023-01-15 05:18:03', '2023-01-15 05:18:03'),
(112, 0, '167384431450074.webp', '2023-01-15 22:45:20', '2023-01-15 22:45:20'),
(113, 0, '167392996622722.webp', '2023-01-16 22:32:46', '2023-01-16 22:32:46'),
(114, 0, '16739299672479.webp', '2023-01-16 22:32:47', '2023-01-16 22:32:47'),
(115, 0, '167395759539415.webp', '2023-01-17 06:13:18', '2023-01-17 06:13:18'),
(116, 0, '167395759897455.webp', '2023-01-17 06:13:20', '2023-01-17 06:13:20'),
(117, 118, '167395793897342.webp', '2023-01-17 06:19:01', '2023-01-17 06:19:01'),
(118, 118, '167395794181692.webp', '2023-01-17 06:19:04', '2023-01-17 06:19:04'),
(119, 0, '167395872915645.webp', '2023-01-17 06:32:11', '2023-01-17 06:32:11'),
(120, 0, '167395873114303.webp', '2023-01-17 06:32:13', '2023-01-17 06:32:13'),
(121, 120, '167395895488054.webp', '2023-01-17 06:35:56', '2023-01-17 06:35:56'),
(122, 120, '167395895639569.webp', '2023-01-17 06:35:57', '2023-01-17 06:35:57'),
(123, 0, '167395924614411.webp', '2023-01-17 06:40:49', '2023-01-17 06:40:49'),
(124, 0, '167395924910318.webp', '2023-01-17 06:40:51', '2023-01-17 06:40:51'),
(125, 121, '167403705588980.webp', '2023-01-18 04:17:37', '2023-01-18 04:17:37'),
(126, 121, '167403705780758.webp', '2023-01-18 04:17:39', '2023-01-18 04:17:39');

-- --------------------------------------------------------

--
-- Table structure for table `ad_types`
--

CREATE TABLE `ad_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `duration` int(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `price` double(24,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ad_types`
--

INSERT INTO `ad_types` (`id`, `title`, `slug`, `status`, `duration`, `created_at`, `updated_at`, `price`) VALUES
(1, 'Featured ad for 3 days', 'Featured ad for 3 days', 1, 72, '2023-01-19 14:24:52', '2023-01-19 14:24:52', 800.00),
(2, 'Featured ad for 7 days', 'Featured ad for 7 days', 1, 100, '2023-01-19 14:27:13', '2023-01-19 14:27:13', 1200.00),
(5, 'Test Package', 'Test Package', 1, 100, '2023-01-20 05:05:58', '2023-01-20 05:05:58', 120.00);

-- --------------------------------------------------------

--
-- Table structure for table `auths`
--

CREATE TABLE `auths` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile_no` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '1 = Admin',
  `gender` tinyint(4) NOT NULL DEFAULT '1',
  `dob` date DEFAULT NULL,
  `about` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook_id` bigint(20) DEFAULT NULL,
  `google_id` bigint(20) DEFAULT NULL,
  `activation_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `activation_code_expire` datetime DEFAULT NULL,
  `is_first_login` tinyint(4) NOT NULL DEFAULT '1',
  `user_type` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0 = Admin',
  `can_login` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1 = Can login, 0 = Can not login',
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1 = Active, 0 = Inactive',
  `created_by` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `updated_by` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_user` tinyint(4) NOT NULL DEFAULT '0' COMMENT '1 == Admin, 0 == User'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `auths`
--

INSERT INTO `auths` (`id`, `first_name`, `last_name`, `username`, `email`, `mobile_no`, `password`, `model_id`, `gender`, `dob`, `about`, `facebook_id`, `google_id`, `activation_code`, `salt`, `activation_code_expire`, `is_first_login`, `user_type`, `can_login`, `status`, `created_by`, `updated_by`, `remember_token`, `created_at`, `updated_at`, `image`, `is_user`) VALUES
(1, 'Muhammad', 'Hannan', 'admin@admin.com', 'admin@admin.com', '01744894492', '$2y$10$yRiqZPnaJo0dEZwapoCbnupdqOX.1fpE12AkgbswRl919vEE3Jrnq', 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 1, 1, 0, 0, NULL, NULL, '2022-10-01 11:26:18', NULL, 0),
(4, NULL, NULL, 'user123', 'admin@gmail.com', '01717121213', '$2y$10$L/g4mEP3.ATdBXWuf8OQdOjHNTD4qZLDlwFCDiEvl7GQQNolJFFGG', 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 1, 1, 0, 0, NULL, '2023-01-20 10:20:16', '2023-01-20 10:20:16', NULL, 0),
(5, NULL, NULL, 'basic_user1', 'basicuser1@gmail.com', '01212141414', '$2y$10$2wSNFGAKAmMZ/1hF3mg9/.O9ufXef4NoKJy5qcp0BuspxGCDq3MdO', 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 1, 1, 0, 0, NULL, '2023-01-20 22:38:39', '2023-01-20 22:38:39', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `auth_roles`
--

CREATE TABLE `auth_roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `auth_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `user_group_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `auth_roles`
--

INSERT INTO `auth_roles` (`id`, `auth_id`, `role_id`, `user_group_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, '2022-09-27 23:39:54', '2022-10-01 11:26:18'),
(2, 2, 1, 1, '2023-01-19 13:50:35', '2023-01-19 13:50:35'),
(3, 3, 1, 1, '2023-01-19 13:54:18', '2023-01-19 13:54:18'),
(4, 4, 3, 3, '2023-01-20 10:20:16', '2023-01-20 10:32:36'),
(5, 5, 4, 4, '2023-01-20 22:38:39', '2023-01-20 22:38:39');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `title`, `slug`, `banner_image`, `alt`, `link`, `status`, `created_at`, `updated_at`) VALUES
(5, 'Testing', 'testing', '2022-11-13-1668338148.png', 'Testing', 'https://mzamin.com/news.php?news=29510', 1, '2022-11-13 04:59:58', '2022-11-13 05:15:48');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '0 = Inactive 1 = Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `category_id`, `title`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 20, 'MI', 'mi', 1, '2023-01-11 23:44:22', '2023-01-20 04:12:33'),
(2, 18, 'Category wise brand', 'category-wise-brand', 1, '2023-01-15 22:24:26', '2023-01-20 04:12:34');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bg_color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '#a3ce71',
  `category_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `wheels` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1' COMMENT '1=Active and 0=Inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `title`, `slug`, `icon`, `bg_color`, `category_type`, `image`, `wheels`, `status`, `created_at`, `updated_at`) VALUES
(18, 0, 'Television', 'television', '<i class=\"las la-tv\"></i>', '#ff4d4d', 'electronics', '1673444157.png', NULL, 1, '2023-01-11 07:35:59', '2023-01-20 04:12:12'),
(19, 0, 'Smart Phone', 'smart-phone', '<i class=\"las la-mobile\"></i>', '#f9eb58', 'mobiles', '1673444234.png', NULL, 1, '2023-01-11 07:37:15', '2023-01-20 04:12:13'),
(20, 18, 'ranad', 'ranad', '<i class=\"las la-tv\"></i>', '#fdbfbf', 'electronics', '1673501587.webp', NULL, 1, '2023-01-11 23:33:08', '2023-01-11 23:33:08');

-- --------------------------------------------------------

--
-- Table structure for table `category_items`
--

CREATE TABLE `category_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '0 = Inactive 1 = Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country_id` int(10) UNSIGNED NOT NULL DEFAULT '1' COMMENT '1 = Turkey for now',
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '0 = Inactive 1 = Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `country_id`, `title`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Ankara', 'ankara', 0, NULL, '2023-01-20 04:38:10'),
(2, 1, 'Istanbul', 'istanbul', 0, NULL, '2023-01-20 04:38:11');

-- --------------------------------------------------------

--
-- Table structure for table `cms_pages`
--

CREATE TABLE `cms_pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_tags` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` mediumtext COLLATE utf8mb4_unicode_ci,
  `description` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '0 = Inactive 1 = Active',
  `position` tinyint(4) NOT NULL,
  `vote_count` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cms_pages`
--

INSERT INTO `cms_pages` (`id`, `title`, `slug`, `meta_title`, `meta_tags`, `meta_description`, `description`, `status`, `position`, `vote_count`, `created_at`, `updated_at`) VALUES
(1, 'Legal and privacy information', 'legal-and-privacy-information', 'Legal and privacy information', NULL, 'Legal and privacy information<br>', 'Legal and privacy information<br>', 1, 4, NULL, '2022-10-02 08:13:45', '2022-10-16 12:07:51'),
(2, 'About us', 'about-us', 'about us', NULL, 'about us<br>', '<span style=\"display: inline !important;\">about us</span><br>', 1, 4, NULL, '2022-10-02 08:18:54', '2023-01-14 03:20:04'),
(3, 'Announcements', 'announcements', 'Announcements', NULL, 'Announcements<br>', 'Announcements<br>', 1, 4, NULL, '2022-10-02 08:21:05', '2022-10-02 08:21:05'),
(4, 'Possible problems', 'possible-problems', 'Possible problems', NULL, 'Possible problems<br>', 'Possible problems<br>', 1, 4, NULL, '2022-10-02 08:23:35', '2022-10-02 08:23:35'),
(5, 'Help', 'help', 'Help', NULL, '<span style=\"display: inline !important;\">Help Text</span><br><div><span style=\"display: inline !important;\"><span style=\"display: inline !important;\">Help Text</span><br></span></div><div><span style=\"display: inline !important;\"><span style=\"display: inline !important;\">Help Text</span><br></span></div><div><span style=\"display: inline !important;\"><span style=\"display: inline !important;\">Help Text</span><br></span></div><div><span style=\"display: inline !important;\"><span style=\"display: inline !important;\"><br></span></span></div>', '<span style=\"display: inline !important;\">Help Text</span><br><div><span style=\"display: inline !important;\"><span style=\"display: inline !important;\">Help Text</span><br></span></div><div><span style=\"display: inline !important;\"><span style=\"display: inline !important;\"><span style=\"display: inline !important;\">Help Text</span><br></span></span></div><div><span style=\"display: inline !important;\"><span style=\"display: inline !important;\"><span style=\"display: inline !important;\"><span style=\"display: inline !important;\">Help Text</span><br></span></span></span></div><div><span style=\"display: inline !important;\"><span style=\"display: inline !important;\"><span style=\"display: inline !important;\"><span style=\"display: inline !important;\"><br></span></span></span></span></div>', 1, 4, NULL, '2022-10-16 09:21:44', '2022-10-16 09:21:44'),
(6, 'Safety Tips', 'safety-tips', 'Safety Tips', NULL, '<div><span style=\"color: rgb(189, 193, 198); font-family: arial, sans-serif; font-size: 14px; background-color: rgb(32, 33, 36); display: inline !important;\">In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available.</span><br></div><div><br></div><div><br></div><br><div><br></div><div><span style=\"color: rgb(189, 193, 198); font-family: arial, sans-serif; font-size: 14px; background-color: rgb(32, 33, 36); display: inline !important;\">In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available.</span><span style=\"background-color: rgb(32, 33, 36); color: rgb(189, 193, 198); font-family: arial, sans-serif; font-size: 14px; display: inline !important;\">In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available.</span><br></div>', '<span style=\"color: rgb(189, 193, 198); font-family: arial, sans-serif; font-size: 14px; background-color: rgb(32, 33, 36); display: inline !important;\">In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available.</span><div><span style=\"color: rgb(189, 193, 198); font-family: arial, sans-serif; font-size: 14px; background-color: rgb(32, 33, 36); display: inline !important;\"><span style=\"display: inline !important;\">In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available.</span><span style=\"display: inline !important;\">In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available.</span><span style=\"display: inline !important;\">In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available.</span><span style=\"display: inline !important;\">In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available.</span><span style=\"display: inline !important;\">In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available.</span><br></span></div>', 1, 2, NULL, '2023-01-14 04:02:01', '2023-01-14 04:04:13'),
(7, 'Buy from us', 'buy-from-us', 'Buy from us', NULL, '<br><div><strong style=\"margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify; background-color: rgb(255, 255, 255);\">Lorem Ipsum</strong><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify; background-color: rgb(255, 255, 255); display: inline !important;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span><br></div>', '<strong style=\"margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify; background-color: rgb(255, 255, 255);\">Lorem Ipsum</strong><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify; background-color: rgb(255, 255, 255); display: inline !important;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span><div><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify; background-color: rgb(255, 255, 255); display: inline !important;\"><br></span></div>', 1, 1, NULL, '2023-01-14 04:08:08', '2023-01-14 04:08:08'),
(8, 'Sell to us', 'sell-to-us', 'Sell to us', NULL, '<strong style=\"margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify; background-color: rgb(255, 255, 255);\">Lorem Ipsum</strong><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify; background-color: rgb(255, 255, 255); display: inline !important;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span><br>', '<strong style=\"margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify; background-color: rgb(255, 255, 255);\">Lorem Ipsum</strong><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify; background-color: rgb(255, 255, 255); display: inline !important;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span><br>', 1, 1, NULL, '2023-01-14 04:09:12', '2023-01-14 04:09:12'),
(9, 'Why choose haraj?', 'why-choose-haraj', 'Why choose haraj?', NULL, '<strong style=\"margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify; background-color: rgb(255, 255, 255);\">Lorem Ipsum</strong><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify; background-color: rgb(255, 255, 255); display: inline !important;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span><br>', '<strong style=\"margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify; background-color: rgb(255, 255, 255);\">Lorem Ipsum</strong><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify; background-color: rgb(255, 255, 255); display: inline !important;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span><br>', 1, 1, NULL, '2023-01-14 04:09:56', '2023-01-14 04:13:09'),
(10, 'Terms & Conditions', 'terms-conditions', 'Terms & Conditions', NULL, '<span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify; background-color: rgb(255, 255, 255); display: inline !important;\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</span><br>', '<div><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify; background-color: rgb(255, 255, 255); display: inline !important;\"><span style=\"display: inline !important;\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</span><br></span></div><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify; background-color: rgb(255, 255, 255); display: inline !important;\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</span><br>', 1, 3, NULL, '2023-01-14 05:31:29', '2023-01-14 05:31:29'),
(11, 'Ad Policy', 'ad-policy', 'Ad Policy', NULL, '<span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify; background-color: rgb(255, 255, 255); display: inline !important;\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</span><br>', '<span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify; background-color: rgb(255, 255, 255); display: inline !important;\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</span><br>', 1, 3, NULL, '2023-01-14 05:32:30', '2023-01-14 05:32:30'),
(12, 'Chat security tips', 'chat-security-tips', 'chat-security-tips', NULL, '<span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify; background-color: rgb(255, 255, 255); display: inline !important;\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</span><br>', '<span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify; background-color: rgb(255, 255, 255); display: inline !important;\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</span><br>', 1, 4, NULL, '2023-01-16 08:22:18', '2023-01-16 08:22:18');

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE `currencies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `currency_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency_symbol` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency_fullname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency_type` tinyint(4) DEFAULT NULL COMMENT '1 => fiat, 2 => crypto',
  `rate` decimal(28,8) DEFAULT NULL,
  `is_default` tinyint(4) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1 => active, 0 => inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`id`, `currency_code`, `currency_symbol`, `currency_fullname`, `currency_type`, `rate`, `is_default`, `status`, `created_at`, `updated_at`) VALUES
(1, 'USD', '$', 'USD', 1, '100.00000000', 1, 1, '2022-10-18 23:19:36', '2023-01-19 13:37:31');

-- --------------------------------------------------------

--
-- Table structure for table `email_logs`
--

CREATE TABLE `email_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `advertiser_id` int(10) UNSIGNED DEFAULT NULL COMMENT 'PK users table',
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mail_sender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_from` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_to` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `email_logs`
--

INSERT INTO `email_logs` (`id`, `advertiser_id`, `user_type`, `mail_sender`, `email_from`, `email_to`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 'smtp', 'AppDevs Solution noreply@appdevs.net', 'mdhannan.info@gmail.com', 'Please verify your email address', '<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">\r\n  <!--[if !mso]><!-->\r\n  <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">\r\n  <!--<![endif]-->\r\n  <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">\r\n  <title></title>\r\n  <style type=\"text/css\">\r\n.ReadMsgBody { width: 100%; background-color: #ffffff; }\r\n.ExternalClass { width: 100%; background-color: #ffffff; }\r\n.ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div { line-height: 100%; }\r\nhtml { width: 100%; }\r\nbody { -webkit-text-size-adjust: none; -ms-text-size-adjust: none; margin: 0; padding: 0; }\r\ntable { border-spacing: 0; table-layout: fixed; margin: 0 auto;border-collapse: collapse; }\r\ntable table table { table-layout: auto; }\r\n.yshortcuts a { border-bottom: none !important; }\r\nimg:hover { opacity: 0.9 !important; }\r\na { color: #0087ff; text-decoration: none; }\r\n.textbutton a { font-family: \'open sans\', arial, sans-serif !important;}\r\n.btn-link a { color:#FFFFFF !important;}\r\n\r\n@media only screen and (max-width: 480px) {\r\nbody { width: auto !important; }\r\n*[class=\"table-inner\"] { width: 90% !important; text-align: center !important; }\r\n*[class=\"table-full\"] { width: 100% !important; text-align: center !important; }\r\n/* image */\r\nimg[class=\"img1\"] { width: 100% !important; height: auto !important; }\r\n}\r\n</style>\r\n\r\n\r\n\r\n  <p><table width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" bgcolor=\"#414a51\" align=\"center\">\r\n    <tbody><tr>\r\n      <td height=\"50\"><br></td>\r\n    </tr>\r\n    <tr>\r\n      <td style=\"text-align:center;vertical-align:top;font-size:0;\" align=\"center\">\r\n        <table cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n          <tbody><tr>\r\n            <td width=\"600\" align=\"center\">\r\n              <!--header-->\r\n              <table class=\"table-inner\" width=\"95%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                <tbody><tr>\r\n                  <td style=\"border-top-left-radius:6px; border-top-right-radius:6px;text-align:center;vertical-align:top;font-size:0;\" bgcolor=\"#0087ff\" align=\"center\">\r\n                    <table width=\"90%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                      <tbody><tr>\r\n                        <td height=\"20\"><br></td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td style=\"font-family: \'Open sans\', Arial, sans-serif; color:#FFFFFF; font-size:16px; font-weight: bold;\" align=\"center\"><div align=\"center\"><a href=\"https://premium.appdevs.net/xpay/admin/dashboard\" class=\"sidebar__main-logo\"><img src=\"https://premium.appdevs.net/xpay/assets/images/logoIcon/light_logo.png\" alt=\"image\"></a><br></div></td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td height=\"20\"><br></td>\r\n                      </tr>\r\n                    </tbody></table>\r\n                  </td>\r\n                </tr>\r\n              </tbody></table>\r\n              <!--end header-->\r\n              <table class=\"table-inner\" width=\"95%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\">\r\n                <tbody><tr>\r\n                  <td style=\"text-align:center;vertical-align:top;font-size:0;\" bgcolor=\"#FFFFFF\" align=\"center\">\r\n                    <table width=\"90%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                      <tbody><tr>\r\n                        <td height=\"35\"><br></td>\r\n                      </tr>\r\n                      <!--logo-->\r\n                      <tr>\r\n                        <td style=\"vertical-align:top;font-size:0;\" align=\"center\">\r\n                          \r\n                        <br></td>\r\n                      </tr>\r\n                      <!--end logo-->\r\n                      <tr>\r\n                        <td height=\"40\"><br></td>\r\n                      </tr>\r\n                      <!--headline-->\r\n                      <tr>\r\n                        <td style=\"font-family: \'Open Sans\', Arial, sans-serif; font-size: 22px;color:#414a51;font-weight: bold;\" align=\"center\">Hello Muhammad<br></td>\r\n                      </tr>\r\n                      <!--end headline-->\r\n                      <tr>\r\n                        <td style=\"text-align:center;vertical-align:top;font-size:0;\" align=\"center\">\r\n                          <table width=\"40\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                            <tbody><tr>\r\n                              <td style=\" border-bottom:3px solid #0087ff;\" height=\"20\"><br></td>\r\n                            </tr>\r\n                          </tbody></table>\r\n                        </td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td height=\"20\"><br></td>\r\n                      </tr>\r\n                      <!--content-->\r\n                      <tr>\r\n                        <td style=\"font-family: \'Open sans\', Arial, sans-serif; color:#7f8c8d; font-size:16px; line-height: 28px;\" align=\"left\"><div><br></div><div>Thanks For joining us. <br></div><div>Please use the below code to verify your email address.<br></div><div><br></div><div>Your email verification code is:<font size=\"6\"><b> 636633</b></font></div></td>\r\n                      </tr>\r\n                      <!--end content-->\r\n                      <tr>\r\n                        <td height=\"40\"><br></td>\r\n                      </tr>\r\n              \r\n                    </tbody></table>\r\n                  </td>\r\n                </tr>\r\n                <tr>\r\n                  <td style=\"border-bottom-left-radius:6px;border-bottom-right-radius:6px;\" height=\"45\" bgcolor=\"#f4f4f4\" align=\"center\">\r\n                    <table width=\"90%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                      <tbody><tr>\r\n                        <td height=\"10\"><br></td>\r\n                      </tr>\r\n                      <!--preference-->\r\n                      <tr>\r\n                        <td class=\"preference-link\" style=\"font-family: \'Open sans\', Arial, sans-serif; color:#95a5a6; font-size:14px;\" align=\"center\">\r\n                          © 2022 AppDevs . All Rights Reserved. \r\n                        </td>\r\n                      </tr>\r\n                      <!--end preference-->\r\n                      <tr>\r\n                        <td height=\"10\"><br></td>\r\n                      </tr>\r\n                    </tbody></table>\r\n                  </td>\r\n                </tr>\r\n              </tbody></table>\r\n            </td>\r\n          </tr>\r\n        </tbody></table>\r\n      </td>\r\n    </tr>\r\n    <tr>\r\n      <td height=\"60\"><br></td>\r\n    </tr>\r\n  </tbody></table></p>', '2022-09-29 00:21:33', '2022-09-29 00:21:33'),
(2, 4, NULL, 'smtp', 'AppDevs Solution noreply@appdevs.net', 'ahannan.info@gmail.com', 'Please verify your email address', '<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">\r\n  <!--[if !mso]><!-->\r\n  <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">\r\n  <!--<![endif]-->\r\n  <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">\r\n  <title></title>\r\n  <style type=\"text/css\">\r\n.ReadMsgBody { width: 100%; background-color: #ffffff; }\r\n.ExternalClass { width: 100%; background-color: #ffffff; }\r\n.ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div { line-height: 100%; }\r\nhtml { width: 100%; }\r\nbody { -webkit-text-size-adjust: none; -ms-text-size-adjust: none; margin: 0; padding: 0; }\r\ntable { border-spacing: 0; table-layout: fixed; margin: 0 auto;border-collapse: collapse; }\r\ntable table table { table-layout: auto; }\r\n.yshortcuts a { border-bottom: none !important; }\r\nimg:hover { opacity: 0.9 !important; }\r\na { color: #0087ff; text-decoration: none; }\r\n.textbutton a { font-family: \'open sans\', arial, sans-serif !important;}\r\n.btn-link a { color:#FFFFFF !important;}\r\n\r\n@media only screen and (max-width: 480px) {\r\nbody { width: auto !important; }\r\n*[class=\"table-inner\"] { width: 90% !important; text-align: center !important; }\r\n*[class=\"table-full\"] { width: 100% !important; text-align: center !important; }\r\n/* image */\r\nimg[class=\"img1\"] { width: 100% !important; height: auto !important; }\r\n}\r\n</style>\r\n\r\n\r\n\r\n  <p><table width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" bgcolor=\"#414a51\" align=\"center\">\r\n    <tbody><tr>\r\n      <td height=\"50\"><br></td>\r\n    </tr>\r\n    <tr>\r\n      <td style=\"text-align:center;vertical-align:top;font-size:0;\" align=\"center\">\r\n        <table cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n          <tbody><tr>\r\n            <td width=\"600\" align=\"center\">\r\n              <!--header-->\r\n              <table class=\"table-inner\" width=\"95%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                <tbody><tr>\r\n                  <td style=\"border-top-left-radius:6px; border-top-right-radius:6px;text-align:center;vertical-align:top;font-size:0;\" bgcolor=\"#0087ff\" align=\"center\">\r\n                    <table width=\"90%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                      <tbody><tr>\r\n                        <td height=\"20\"><br></td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td style=\"font-family: \'Open sans\', Arial, sans-serif; color:#FFFFFF; font-size:16px; font-weight: bold;\" align=\"center\"><div align=\"center\"><a href=\"https://premium.appdevs.net/xpay/admin/dashboard\" class=\"sidebar__main-logo\"><img src=\"https://premium.appdevs.net/xpay/assets/images/logoIcon/light_logo.png\" alt=\"image\"></a><br></div></td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td height=\"20\"><br></td>\r\n                      </tr>\r\n                    </tbody></table>\r\n                  </td>\r\n                </tr>\r\n              </tbody></table>\r\n              <!--end header-->\r\n              <table class=\"table-inner\" width=\"95%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\">\r\n                <tbody><tr>\r\n                  <td style=\"text-align:center;vertical-align:top;font-size:0;\" bgcolor=\"#FFFFFF\" align=\"center\">\r\n                    <table width=\"90%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                      <tbody><tr>\r\n                        <td height=\"35\"><br></td>\r\n                      </tr>\r\n                      <!--logo-->\r\n                      <tr>\r\n                        <td style=\"vertical-align:top;font-size:0;\" align=\"center\">\r\n                          \r\n                        <br></td>\r\n                      </tr>\r\n                      <!--end logo-->\r\n                      <tr>\r\n                        <td height=\"40\"><br></td>\r\n                      </tr>\r\n                      <!--headline-->\r\n                      <tr>\r\n                        <td style=\"font-family: \'Open Sans\', Arial, sans-serif; font-size: 22px;color:#414a51;font-weight: bold;\" align=\"center\">Hello Fatiha<br></td>\r\n                      </tr>\r\n                      <!--end headline-->\r\n                      <tr>\r\n                        <td style=\"text-align:center;vertical-align:top;font-size:0;\" align=\"center\">\r\n                          <table width=\"40\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                            <tbody><tr>\r\n                              <td style=\" border-bottom:3px solid #0087ff;\" height=\"20\"><br></td>\r\n                            </tr>\r\n                          </tbody></table>\r\n                        </td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td height=\"20\"><br></td>\r\n                      </tr>\r\n                      <!--content-->\r\n                      <tr>\r\n                        <td style=\"font-family: \'Open sans\', Arial, sans-serif; color:#7f8c8d; font-size:16px; line-height: 28px;\" align=\"left\"><div><br></div><div>Thanks For joining us. <br></div><div>Please use the below code to verify your email address.<br></div><div><br></div><div>Your email verification code is:<font size=\"6\"><b> 377060</b></font></div></td>\r\n                      </tr>\r\n                      <!--end content-->\r\n                      <tr>\r\n                        <td height=\"40\"><br></td>\r\n                      </tr>\r\n              \r\n                    </tbody></table>\r\n                  </td>\r\n                </tr>\r\n                <tr>\r\n                  <td style=\"border-bottom-left-radius:6px;border-bottom-right-radius:6px;\" height=\"45\" bgcolor=\"#f4f4f4\" align=\"center\">\r\n                    <table width=\"90%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                      <tbody><tr>\r\n                        <td height=\"10\"><br></td>\r\n                      </tr>\r\n                      <!--preference-->\r\n                      <tr>\r\n                        <td class=\"preference-link\" style=\"font-family: \'Open sans\', Arial, sans-serif; color:#95a5a6; font-size:14px;\" align=\"center\">\r\n                          © 2022 AppDevs . All Rights Reserved. \r\n                        </td>\r\n                      </tr>\r\n                      <!--end preference-->\r\n                      <tr>\r\n                        <td height=\"10\"><br></td>\r\n                      </tr>\r\n                    </tbody></table>\r\n                  </td>\r\n                </tr>\r\n              </tbody></table>\r\n            </td>\r\n          </tr>\r\n        </tbody></table>\r\n      </td>\r\n    </tr>\r\n    <tr>\r\n      <td height=\"60\"><br></td>\r\n    </tr>\r\n  </tbody></table></p>', '2022-10-04 23:19:36', '2022-10-04 23:19:36'),
(3, 1, NULL, 'smtp', 'AppDevs Solution noreply@appdevs.net', 'mdhannan.info@gmail.com', 'Please verify your email address', '<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">\r\n  <!--[if !mso]><!-->\r\n  <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">\r\n  <!--<![endif]-->\r\n  <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">\r\n  <title></title>\r\n  <style type=\"text/css\">\r\n.ReadMsgBody { width: 100%; background-color: #ffffff; }\r\n.ExternalClass { width: 100%; background-color: #ffffff; }\r\n.ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div { line-height: 100%; }\r\nhtml { width: 100%; }\r\nbody { -webkit-text-size-adjust: none; -ms-text-size-adjust: none; margin: 0; padding: 0; }\r\ntable { border-spacing: 0; table-layout: fixed; margin: 0 auto;border-collapse: collapse; }\r\ntable table table { table-layout: auto; }\r\n.yshortcuts a { border-bottom: none !important; }\r\nimg:hover { opacity: 0.9 !important; }\r\na { color: #0087ff; text-decoration: none; }\r\n.textbutton a { font-family: \'open sans\', arial, sans-serif !important;}\r\n.btn-link a { color:#FFFFFF !important;}\r\n\r\n@media only screen and (max-width: 480px) {\r\nbody { width: auto !important; }\r\n*[class=\"table-inner\"] { width: 90% !important; text-align: center !important; }\r\n*[class=\"table-full\"] { width: 100% !important; text-align: center !important; }\r\n/* image */\r\nimg[class=\"img1\"] { width: 100% !important; height: auto !important; }\r\n}\r\n</style>\r\n\r\n\r\n\r\n  <p><table width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" bgcolor=\"#414a51\" align=\"center\">\r\n    <tbody><tr>\r\n      <td height=\"50\"><br></td>\r\n    </tr>\r\n    <tr>\r\n      <td style=\"text-align:center;vertical-align:top;font-size:0;\" align=\"center\">\r\n        <table cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n          <tbody><tr>\r\n            <td width=\"600\" align=\"center\">\r\n              <!--header-->\r\n              <table class=\"table-inner\" width=\"95%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                <tbody><tr>\r\n                  <td style=\"border-top-left-radius:6px; border-top-right-radius:6px;text-align:center;vertical-align:top;font-size:0;\" bgcolor=\"#0087ff\" align=\"center\">\r\n                    <table width=\"90%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                      <tbody><tr>\r\n                        <td height=\"20\"><br></td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td style=\"font-family: \'Open sans\', Arial, sans-serif; color:#FFFFFF; font-size:16px; font-weight: bold;\" align=\"center\"><div align=\"center\"><a href=\"https://premium.appdevs.net/xpay/admin/dashboard\" class=\"sidebar__main-logo\"><img src=\"https://premium.appdevs.net/xpay/assets/images/logoIcon/light_logo.png\" alt=\"image\"></a><br></div></td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td height=\"20\"><br></td>\r\n                      </tr>\r\n                    </tbody></table>\r\n                  </td>\r\n                </tr>\r\n              </tbody></table>\r\n              <!--end header-->\r\n              <table class=\"table-inner\" width=\"95%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\">\r\n                <tbody><tr>\r\n                  <td style=\"text-align:center;vertical-align:top;font-size:0;\" bgcolor=\"#FFFFFF\" align=\"center\">\r\n                    <table width=\"90%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                      <tbody><tr>\r\n                        <td height=\"35\"><br></td>\r\n                      </tr>\r\n                      <!--logo-->\r\n                      <tr>\r\n                        <td style=\"vertical-align:top;font-size:0;\" align=\"center\">\r\n                          \r\n                        <br></td>\r\n                      </tr>\r\n                      <!--end logo-->\r\n                      <tr>\r\n                        <td height=\"40\"><br></td>\r\n                      </tr>\r\n                      <!--headline-->\r\n                      <tr>\r\n                        <td style=\"font-family: \'Open Sans\', Arial, sans-serif; font-size: 22px;color:#414a51;font-weight: bold;\" align=\"center\">Hello Muhammad<br></td>\r\n                      </tr>\r\n                      <!--end headline-->\r\n                      <tr>\r\n                        <td style=\"text-align:center;vertical-align:top;font-size:0;\" align=\"center\">\r\n                          <table width=\"40\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                            <tbody><tr>\r\n                              <td style=\" border-bottom:3px solid #0087ff;\" height=\"20\"><br></td>\r\n                            </tr>\r\n                          </tbody></table>\r\n                        </td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td height=\"20\"><br></td>\r\n                      </tr>\r\n                      <!--content-->\r\n                      <tr>\r\n                        <td style=\"font-family: \'Open sans\', Arial, sans-serif; color:#7f8c8d; font-size:16px; line-height: 28px;\" align=\"left\"><div><br></div><div>Thanks For joining us. <br></div><div>Please use the below code to verify your email address.<br></div><div><br></div><div>Your email verification code is:<font size=\"6\"><b> 882630</b></font></div></td>\r\n                      </tr>\r\n                      <!--end content-->\r\n                      <tr>\r\n                        <td height=\"40\"><br></td>\r\n                      </tr>\r\n              \r\n                    </tbody></table>\r\n                  </td>\r\n                </tr>\r\n                <tr>\r\n                  <td style=\"border-bottom-left-radius:6px;border-bottom-right-radius:6px;\" height=\"45\" bgcolor=\"#f4f4f4\" align=\"center\">\r\n                    <table width=\"90%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                      <tbody><tr>\r\n                        <td height=\"10\"><br></td>\r\n                      </tr>\r\n                      <!--preference-->\r\n                      <tr>\r\n                        <td class=\"preference-link\" style=\"font-family: \'Open sans\', Arial, sans-serif; color:#95a5a6; font-size:14px;\" align=\"center\">\r\n                          © 2022 AppDevs . All Rights Reserved. \r\n                        </td>\r\n                      </tr>\r\n                      <!--end preference-->\r\n                      <tr>\r\n                        <td height=\"10\"><br></td>\r\n                      </tr>\r\n                    </tbody></table>\r\n                  </td>\r\n                </tr>\r\n              </tbody></table>\r\n            </td>\r\n          </tr>\r\n        </tbody></table>\r\n      </td>\r\n    </tr>\r\n    <tr>\r\n      <td height=\"60\"><br></td>\r\n    </tr>\r\n  </tbody></table></p>', '2022-10-08 04:11:33', '2022-10-08 04:11:33'),
(4, 2, NULL, 'smtp', 'AppDevs Solution noreply@appdevs.net', 'ahannan.info@gmail.com', 'Please verify your email address', '<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">\r\n  <!--[if !mso]><!-->\r\n  <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">\r\n  <!--<![endif]-->\r\n  <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">\r\n  <title></title>\r\n  <style type=\"text/css\">\r\n.ReadMsgBody { width: 100%; background-color: #ffffff; }\r\n.ExternalClass { width: 100%; background-color: #ffffff; }\r\n.ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div { line-height: 100%; }\r\nhtml { width: 100%; }\r\nbody { -webkit-text-size-adjust: none; -ms-text-size-adjust: none; margin: 0; padding: 0; }\r\ntable { border-spacing: 0; table-layout: fixed; margin: 0 auto;border-collapse: collapse; }\r\ntable table table { table-layout: auto; }\r\n.yshortcuts a { border-bottom: none !important; }\r\nimg:hover { opacity: 0.9 !important; }\r\na { color: #0087ff; text-decoration: none; }\r\n.textbutton a { font-family: \'open sans\', arial, sans-serif !important;}\r\n.btn-link a { color:#FFFFFF !important;}\r\n\r\n@media only screen and (max-width: 480px) {\r\nbody { width: auto !important; }\r\n*[class=\"table-inner\"] { width: 90% !important; text-align: center !important; }\r\n*[class=\"table-full\"] { width: 100% !important; text-align: center !important; }\r\n/* image */\r\nimg[class=\"img1\"] { width: 100% !important; height: auto !important; }\r\n}\r\n</style>\r\n\r\n\r\n\r\n  <p><table width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" bgcolor=\"#414a51\" align=\"center\">\r\n    <tbody><tr>\r\n      <td height=\"50\"><br></td>\r\n    </tr>\r\n    <tr>\r\n      <td style=\"text-align:center;vertical-align:top;font-size:0;\" align=\"center\">\r\n        <table cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n          <tbody><tr>\r\n            <td width=\"600\" align=\"center\">\r\n              <!--header-->\r\n              <table class=\"table-inner\" width=\"95%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                <tbody><tr>\r\n                  <td style=\"border-top-left-radius:6px; border-top-right-radius:6px;text-align:center;vertical-align:top;font-size:0;\" bgcolor=\"#0087ff\" align=\"center\">\r\n                    <table width=\"90%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                      <tbody><tr>\r\n                        <td height=\"20\"><br></td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td style=\"font-family: \'Open sans\', Arial, sans-serif; color:#FFFFFF; font-size:16px; font-weight: bold;\" align=\"center\"><div align=\"center\"><a href=\"https://premium.appdevs.net/xpay/admin/dashboard\" class=\"sidebar__main-logo\"><img src=\"https://premium.appdevs.net/xpay/assets/images/logoIcon/light_logo.png\" alt=\"image\"></a><br></div></td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td height=\"20\"><br></td>\r\n                      </tr>\r\n                    </tbody></table>\r\n                  </td>\r\n                </tr>\r\n              </tbody></table>\r\n              <!--end header-->\r\n              <table class=\"table-inner\" width=\"95%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\">\r\n                <tbody><tr>\r\n                  <td style=\"text-align:center;vertical-align:top;font-size:0;\" bgcolor=\"#FFFFFF\" align=\"center\">\r\n                    <table width=\"90%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                      <tbody><tr>\r\n                        <td height=\"35\"><br></td>\r\n                      </tr>\r\n                      <!--logo-->\r\n                      <tr>\r\n                        <td style=\"vertical-align:top;font-size:0;\" align=\"center\">\r\n                          \r\n                        <br></td>\r\n                      </tr>\r\n                      <!--end logo-->\r\n                      <tr>\r\n                        <td height=\"40\"><br></td>\r\n                      </tr>\r\n                      <!--headline-->\r\n                      <tr>\r\n                        <td style=\"font-family: \'Open Sans\', Arial, sans-serif; font-size: 22px;color:#414a51;font-weight: bold;\" align=\"center\">Hello Tanvir<br></td>\r\n                      </tr>\r\n                      <!--end headline-->\r\n                      <tr>\r\n                        <td style=\"text-align:center;vertical-align:top;font-size:0;\" align=\"center\">\r\n                          <table width=\"40\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                            <tbody><tr>\r\n                              <td style=\" border-bottom:3px solid #0087ff;\" height=\"20\"><br></td>\r\n                            </tr>\r\n                          </tbody></table>\r\n                        </td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td height=\"20\"><br></td>\r\n                      </tr>\r\n                      <!--content-->\r\n                      <tr>\r\n                        <td style=\"font-family: \'Open sans\', Arial, sans-serif; color:#7f8c8d; font-size:16px; line-height: 28px;\" align=\"left\"><div><br></div><div>Thanks For joining us. <br></div><div>Please use the below code to verify your email address.<br></div><div><br></div><div>Your email verification code is:<font size=\"6\"><b> 519853</b></font></div></td>\r\n                      </tr>\r\n                      <!--end content-->\r\n                      <tr>\r\n                        <td height=\"40\"><br></td>\r\n                      </tr>\r\n              \r\n                    </tbody></table>\r\n                  </td>\r\n                </tr>\r\n                <tr>\r\n                  <td style=\"border-bottom-left-radius:6px;border-bottom-right-radius:6px;\" height=\"45\" bgcolor=\"#f4f4f4\" align=\"center\">\r\n                    <table width=\"90%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                      <tbody><tr>\r\n                        <td height=\"10\"><br></td>\r\n                      </tr>\r\n                      <!--preference-->\r\n                      <tr>\r\n                        <td class=\"preference-link\" style=\"font-family: \'Open sans\', Arial, sans-serif; color:#95a5a6; font-size:14px;\" align=\"center\">\r\n                          © 2022 AppDevs . All Rights Reserved. \r\n                        </td>\r\n                      </tr>\r\n                      <!--end preference-->\r\n                      <tr>\r\n                        <td height=\"10\"><br></td>\r\n                      </tr>\r\n                    </tbody></table>\r\n                  </td>\r\n                </tr>\r\n              </tbody></table>\r\n            </td>\r\n          </tr>\r\n        </tbody></table>\r\n      </td>\r\n    </tr>\r\n    <tr>\r\n      <td height=\"60\"><br></td>\r\n    </tr>\r\n  </tbody></table></p>', '2022-10-08 04:14:14', '2022-10-08 04:14:14'),
(5, NULL, NULL, 'smtp', 'Haraz Alyawm noreply@appdevs.net', 'frranad1@gmail.com', 'Please verify your email address', '<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">\r\n  <!--[if !mso]><!-->\r\n  <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">\r\n  <!--<![endif]-->\r\n  <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">\r\n  <title></title>\r\n  <style type=\"text/css\">\r\n.ReadMsgBody { width: 100%; background-color: #ffffff; }\r\n.ExternalClass { width: 100%; background-color: #ffffff; }\r\n.ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div { line-height: 100%; }\r\nhtml { width: 100%; }\r\nbody { -webkit-text-size-adjust: none; -ms-text-size-adjust: none; margin: 0; padding: 0; }\r\ntable { border-spacing: 0; table-layout: fixed; margin: 0 auto;border-collapse: collapse; }\r\ntable table table { table-layout: auto; }\r\n.yshortcuts a { border-bottom: none !important; }\r\nimg:hover { opacity: 0.9 !important; }\r\na { color: #0087ff; text-decoration: none; }\r\n.textbutton a { font-family: \'open sans\', arial, sans-serif !important;}\r\n.btn-link a { color:#FFFFFF !important;}\r\n\r\n@media only screen and (max-width: 480px) {\r\nbody { width: auto !important; }\r\n*[class=\"table-inner\"] { width: 90% !important; text-align: center !important; }\r\n*[class=\"table-full\"] { width: 100% !important; text-align: center !important; }\r\n/* image */\r\nimg[class=\"img1\"] { width: 100% !important; height: auto !important; }\r\n}\r\n</style>\r\n\r\n\r\n\r\n  <p><table width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" bgcolor=\"#414a51\" align=\"center\">\r\n    <tbody><tr>\r\n      <td height=\"50\"><br></td>\r\n    </tr>\r\n    <tr>\r\n      <td style=\"text-align:center;vertical-align:top;font-size:0;\" align=\"center\">\r\n        <table cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n          <tbody><tr>\r\n            <td width=\"600\" align=\"center\">\r\n              <!--header-->\r\n              <table class=\"table-inner\" width=\"95%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                <tbody><tr>\r\n                  <td style=\"border-top-left-radius:6px; border-top-right-radius:6px;text-align:center;vertical-align:top;font-size:0;\" bgcolor=\"#0087ff\" align=\"center\">\r\n                    <table width=\"90%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                      <tbody><tr>\r\n                        <td height=\"20\"><br></td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td style=\"font-family: \'Open sans\', Arial, sans-serif; color:#FFFFFF; font-size:16px; font-weight: bold;\" align=\"center\"><div align=\"center\"><a href=\"https://premium.appdevs.net/xpay/admin/dashboard\" class=\"sidebar__main-logo\"><img src=\"https://premium.appdevs.net/xpay/assets/images/logoIcon/light_logo.png\" alt=\"image\"></a><br></div></td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td height=\"20\"><br></td>\r\n                      </tr>\r\n                    </tbody></table>\r\n                  </td>\r\n                </tr>\r\n              </tbody></table>\r\n              <!--end header-->\r\n              <table class=\"table-inner\" width=\"95%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\">\r\n                <tbody><tr>\r\n                  <td style=\"text-align:center;vertical-align:top;font-size:0;\" bgcolor=\"#FFFFFF\" align=\"center\">\r\n                    <table width=\"90%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                      <tbody><tr>\r\n                        <td height=\"35\"><br></td>\r\n                      </tr>\r\n                      <!--logo-->\r\n                      <tr>\r\n                        <td style=\"vertical-align:top;font-size:0;\" align=\"center\">\r\n                          \r\n                        <br></td>\r\n                      </tr>\r\n                      <!--end logo-->\r\n                      <tr>\r\n                        <td height=\"40\"><br></td>\r\n                      </tr>\r\n                      <!--headline-->\r\n                      <tr>\r\n                        <td style=\"font-family: \'Open Sans\', Arial, sans-serif; font-size: 22px;color:#414a51;font-weight: bold;\" align=\"center\">Hello Unknown<br></td>\r\n                      </tr>\r\n                      <!--end headline-->\r\n                      <tr>\r\n                        <td style=\"text-align:center;vertical-align:top;font-size:0;\" align=\"center\">\r\n                          <table width=\"40\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                            <tbody><tr>\r\n                              <td style=\" border-bottom:3px solid #0087ff;\" height=\"20\"><br></td>\r\n                            </tr>\r\n                          </tbody></table>\r\n                        </td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td height=\"20\"><br></td>\r\n                      </tr>\r\n                      <!--content-->\r\n                      <tr>\r\n                        <td style=\"font-family: \'Open sans\', Arial, sans-serif; color:#7f8c8d; font-size:16px; line-height: 28px;\" align=\"left\"><div><br></div><div>Thanks For joining us. <br></div><div>Please use the below code to verify your email address.<br></div><div><br></div><div>Your email verification code is:<font size=\"6\"><b> 1639322193</b></font></div></td>\r\n                      </tr>\r\n                      <!--end content-->\r\n                      <tr>\r\n                        <td height=\"40\"><br></td>\r\n                      </tr>\r\n              \r\n                    </tbody></table>\r\n                  </td>\r\n                </tr>\r\n                <tr>\r\n                  <td style=\"border-bottom-left-radius:6px;border-bottom-right-radius:6px;\" height=\"45\" bgcolor=\"#f4f4f4\" align=\"center\">\r\n                    <table width=\"90%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                      <tbody><tr>\r\n                        <td height=\"10\"><br></td>\r\n                      </tr>\r\n                      <!--preference-->\r\n                      <tr>\r\n                        <td class=\"preference-link\" style=\"font-family: \'Open sans\', Arial, sans-serif; color:#95a5a6; font-size:14px;\" align=\"center\">\r\n                          © 2022 AppDevs . All Rights Reserved. \r\n                        </td>\r\n                      </tr>\r\n                      <!--end preference-->\r\n                      <tr>\r\n                        <td height=\"10\"><br></td>\r\n                      </tr>\r\n                    </tbody></table>\r\n                  </td>\r\n                </tr>\r\n              </tbody></table>\r\n            </td>\r\n          </tr>\r\n        </tbody></table>\r\n      </td>\r\n    </tr>\r\n    <tr>\r\n      <td height=\"60\"><br></td>\r\n    </tr>\r\n  </tbody></table></p>', '2023-01-10 01:32:42', '2023-01-10 01:32:42'),
(6, NULL, NULL, 'smtp', 'Haraz Alyawm noreply@appdevs.net', 'frranad1@gmail.com', 'Please verify your email address', '<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">\r\n  <!--[if !mso]><!-->\r\n  <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">\r\n  <!--<![endif]-->\r\n  <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">\r\n  <title></title>\r\n  <style type=\"text/css\">\r\n.ReadMsgBody { width: 100%; background-color: #ffffff; }\r\n.ExternalClass { width: 100%; background-color: #ffffff; }\r\n.ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div { line-height: 100%; }\r\nhtml { width: 100%; }\r\nbody { -webkit-text-size-adjust: none; -ms-text-size-adjust: none; margin: 0; padding: 0; }\r\ntable { border-spacing: 0; table-layout: fixed; margin: 0 auto;border-collapse: collapse; }\r\ntable table table { table-layout: auto; }\r\n.yshortcuts a { border-bottom: none !important; }\r\nimg:hover { opacity: 0.9 !important; }\r\na { color: #0087ff; text-decoration: none; }\r\n.textbutton a { font-family: \'open sans\', arial, sans-serif !important;}\r\n.btn-link a { color:#FFFFFF !important;}\r\n\r\n@media only screen and (max-width: 480px) {\r\nbody { width: auto !important; }\r\n*[class=\"table-inner\"] { width: 90% !important; text-align: center !important; }\r\n*[class=\"table-full\"] { width: 100% !important; text-align: center !important; }\r\n/* image */\r\nimg[class=\"img1\"] { width: 100% !important; height: auto !important; }\r\n}\r\n</style>\r\n\r\n\r\n\r\n  <p><table width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" bgcolor=\"#414a51\" align=\"center\">\r\n    <tbody><tr>\r\n      <td height=\"50\"><br></td>\r\n    </tr>\r\n    <tr>\r\n      <td style=\"text-align:center;vertical-align:top;font-size:0;\" align=\"center\">\r\n        <table cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n          <tbody><tr>\r\n            <td width=\"600\" align=\"center\">\r\n              <!--header-->\r\n              <table class=\"table-inner\" width=\"95%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                <tbody><tr>\r\n                  <td style=\"border-top-left-radius:6px; border-top-right-radius:6px;text-align:center;vertical-align:top;font-size:0;\" bgcolor=\"#0087ff\" align=\"center\">\r\n                    <table width=\"90%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                      <tbody><tr>\r\n                        <td height=\"20\"><br></td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td style=\"font-family: \'Open sans\', Arial, sans-serif; color:#FFFFFF; font-size:16px; font-weight: bold;\" align=\"center\"><div align=\"center\"><a href=\"https://premium.appdevs.net/xpay/admin/dashboard\" class=\"sidebar__main-logo\"><img src=\"https://premium.appdevs.net/xpay/assets/images/logoIcon/light_logo.png\" alt=\"image\"></a><br></div></td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td height=\"20\"><br></td>\r\n                      </tr>\r\n                    </tbody></table>\r\n                  </td>\r\n                </tr>\r\n              </tbody></table>\r\n              <!--end header-->\r\n              <table class=\"table-inner\" width=\"95%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\">\r\n                <tbody><tr>\r\n                  <td style=\"text-align:center;vertical-align:top;font-size:0;\" bgcolor=\"#FFFFFF\" align=\"center\">\r\n                    <table width=\"90%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                      <tbody><tr>\r\n                        <td height=\"35\"><br></td>\r\n                      </tr>\r\n                      <!--logo-->\r\n                      <tr>\r\n                        <td style=\"vertical-align:top;font-size:0;\" align=\"center\">\r\n                          \r\n                        <br></td>\r\n                      </tr>\r\n                      <!--end logo-->\r\n                      <tr>\r\n                        <td height=\"40\"><br></td>\r\n                      </tr>\r\n                      <!--headline-->\r\n                      <tr>\r\n                        <td style=\"font-family: \'Open Sans\', Arial, sans-serif; font-size: 22px;color:#414a51;font-weight: bold;\" align=\"center\">Hello Unknown<br></td>\r\n                      </tr>\r\n                      <!--end headline-->\r\n                      <tr>\r\n                        <td style=\"text-align:center;vertical-align:top;font-size:0;\" align=\"center\">\r\n                          <table width=\"40\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                            <tbody><tr>\r\n                              <td style=\" border-bottom:3px solid #0087ff;\" height=\"20\"><br></td>\r\n                            </tr>\r\n                          </tbody></table>\r\n                        </td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td height=\"20\"><br></td>\r\n                      </tr>\r\n                      <!--content-->\r\n                      <tr>\r\n                        <td style=\"font-family: \'Open sans\', Arial, sans-serif; color:#7f8c8d; font-size:16px; line-height: 28px;\" align=\"left\"><div><br></div><div>Thanks For joining us. <br></div><div>Please use the below code to verify your email address.<br></div><div><br></div><div>Your email verification code is:<font size=\"6\"><b> 379814647</b></font></div></td>\r\n                      </tr>\r\n                      <!--end content-->\r\n                      <tr>\r\n                        <td height=\"40\"><br></td>\r\n                      </tr>\r\n              \r\n                    </tbody></table>\r\n                  </td>\r\n                </tr>\r\n                <tr>\r\n                  <td style=\"border-bottom-left-radius:6px;border-bottom-right-radius:6px;\" height=\"45\" bgcolor=\"#f4f4f4\" align=\"center\">\r\n                    <table width=\"90%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                      <tbody><tr>\r\n                        <td height=\"10\"><br></td>\r\n                      </tr>\r\n                      <!--preference-->\r\n                      <tr>\r\n                        <td class=\"preference-link\" style=\"font-family: \'Open sans\', Arial, sans-serif; color:#95a5a6; font-size:14px;\" align=\"center\">\r\n                          © 2022 AppDevs . All Rights Reserved. \r\n                        </td>\r\n                      </tr>\r\n                      <!--end preference-->\r\n                      <tr>\r\n                        <td height=\"10\"><br></td>\r\n                      </tr>\r\n                    </tbody></table>\r\n                  </td>\r\n                </tr>\r\n              </tbody></table>\r\n            </td>\r\n          </tr>\r\n        </tbody></table>\r\n      </td>\r\n    </tr>\r\n    <tr>\r\n      <td height=\"60\"><br></td>\r\n    </tr>\r\n  </tbody></table></p>', '2023-01-10 03:44:21', '2023-01-10 03:44:21');
INSERT INTO `email_logs` (`id`, `advertiser_id`, `user_type`, `mail_sender`, `email_from`, `email_to`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(7, NULL, NULL, 'smtp', 'Haraz Alyawm noreply@appdevs.net', 'frranad1@gmail.com', 'Please verify your email address', '<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">\r\n  <!--[if !mso]><!-->\r\n  <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">\r\n  <!--<![endif]-->\r\n  <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">\r\n  <title></title>\r\n  <style type=\"text/css\">\r\n.ReadMsgBody { width: 100%; background-color: #ffffff; }\r\n.ExternalClass { width: 100%; background-color: #ffffff; }\r\n.ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div { line-height: 100%; }\r\nhtml { width: 100%; }\r\nbody { -webkit-text-size-adjust: none; -ms-text-size-adjust: none; margin: 0; padding: 0; }\r\ntable { border-spacing: 0; table-layout: fixed; margin: 0 auto;border-collapse: collapse; }\r\ntable table table { table-layout: auto; }\r\n.yshortcuts a { border-bottom: none !important; }\r\nimg:hover { opacity: 0.9 !important; }\r\na { color: #0087ff; text-decoration: none; }\r\n.textbutton a { font-family: \'open sans\', arial, sans-serif !important;}\r\n.btn-link a { color:#FFFFFF !important;}\r\n\r\n@media only screen and (max-width: 480px) {\r\nbody { width: auto !important; }\r\n*[class=\"table-inner\"] { width: 90% !important; text-align: center !important; }\r\n*[class=\"table-full\"] { width: 100% !important; text-align: center !important; }\r\n/* image */\r\nimg[class=\"img1\"] { width: 100% !important; height: auto !important; }\r\n}\r\n</style>\r\n\r\n\r\n\r\n  <p><table width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" bgcolor=\"#414a51\" align=\"center\">\r\n    <tbody><tr>\r\n      <td height=\"50\"><br></td>\r\n    </tr>\r\n    <tr>\r\n      <td style=\"text-align:center;vertical-align:top;font-size:0;\" align=\"center\">\r\n        <table cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n          <tbody><tr>\r\n            <td width=\"600\" align=\"center\">\r\n              <!--header-->\r\n              <table class=\"table-inner\" width=\"95%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                <tbody><tr>\r\n                  <td style=\"border-top-left-radius:6px; border-top-right-radius:6px;text-align:center;vertical-align:top;font-size:0;\" bgcolor=\"#0087ff\" align=\"center\">\r\n                    <table width=\"90%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                      <tbody><tr>\r\n                        <td height=\"20\"><br></td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td style=\"font-family: \'Open sans\', Arial, sans-serif; color:#FFFFFF; font-size:16px; font-weight: bold;\" align=\"center\"><div align=\"center\"><a href=\"https://premium.appdevs.net/xpay/admin/dashboard\" class=\"sidebar__main-logo\"><img src=\"https://premium.appdevs.net/xpay/assets/images/logoIcon/light_logo.png\" alt=\"image\"></a><br></div></td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td height=\"20\"><br></td>\r\n                      </tr>\r\n                    </tbody></table>\r\n                  </td>\r\n                </tr>\r\n              </tbody></table>\r\n              <!--end header-->\r\n              <table class=\"table-inner\" width=\"95%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\">\r\n                <tbody><tr>\r\n                  <td style=\"text-align:center;vertical-align:top;font-size:0;\" bgcolor=\"#FFFFFF\" align=\"center\">\r\n                    <table width=\"90%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                      <tbody><tr>\r\n                        <td height=\"35\"><br></td>\r\n                      </tr>\r\n                      <!--logo-->\r\n                      <tr>\r\n                        <td style=\"vertical-align:top;font-size:0;\" align=\"center\">\r\n                          \r\n                        <br></td>\r\n                      </tr>\r\n                      <!--end logo-->\r\n                      <tr>\r\n                        <td height=\"40\"><br></td>\r\n                      </tr>\r\n                      <!--headline-->\r\n                      <tr>\r\n                        <td style=\"font-family: \'Open Sans\', Arial, sans-serif; font-size: 22px;color:#414a51;font-weight: bold;\" align=\"center\">Hello Unknown<br></td>\r\n                      </tr>\r\n                      <!--end headline-->\r\n                      <tr>\r\n                        <td style=\"text-align:center;vertical-align:top;font-size:0;\" align=\"center\">\r\n                          <table width=\"40\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                            <tbody><tr>\r\n                              <td style=\" border-bottom:3px solid #0087ff;\" height=\"20\"><br></td>\r\n                            </tr>\r\n                          </tbody></table>\r\n                        </td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td height=\"20\"><br></td>\r\n                      </tr>\r\n                      <!--content-->\r\n                      <tr>\r\n                        <td style=\"font-family: \'Open sans\', Arial, sans-serif; color:#7f8c8d; font-size:16px; line-height: 28px;\" align=\"left\"><div><br></div><div>Thanks For joining us. <br></div><div>Please use the below code to verify your email address.<br></div><div><br></div><div>Your email verification code is:<font size=\"6\"><b> 70251833</b></font></div></td>\r\n                      </tr>\r\n                      <!--end content-->\r\n                      <tr>\r\n                        <td height=\"40\"><br></td>\r\n                      </tr>\r\n              \r\n                    </tbody></table>\r\n                  </td>\r\n                </tr>\r\n                <tr>\r\n                  <td style=\"border-bottom-left-radius:6px;border-bottom-right-radius:6px;\" height=\"45\" bgcolor=\"#f4f4f4\" align=\"center\">\r\n                    <table width=\"90%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                      <tbody><tr>\r\n                        <td height=\"10\"><br></td>\r\n                      </tr>\r\n                      <!--preference-->\r\n                      <tr>\r\n                        <td class=\"preference-link\" style=\"font-family: \'Open sans\', Arial, sans-serif; color:#95a5a6; font-size:14px;\" align=\"center\">\r\n                          © 2022 AppDevs . All Rights Reserved. \r\n                        </td>\r\n                      </tr>\r\n                      <!--end preference-->\r\n                      <tr>\r\n                        <td height=\"10\"><br></td>\r\n                      </tr>\r\n                    </tbody></table>\r\n                  </td>\r\n                </tr>\r\n              </tbody></table>\r\n            </td>\r\n          </tr>\r\n        </tbody></table>\r\n      </td>\r\n    </tr>\r\n    <tr>\r\n      <td height=\"60\"><br></td>\r\n    </tr>\r\n  </tbody></table></p>', '2023-01-10 23:53:02', '2023-01-10 23:53:02'),
(8, NULL, NULL, 'smtp', 'Haraz Alyawm noreply@appdevs.net', 'frranad1@gmail.com', 'Please verify your email address', '<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">\r\n  <!--[if !mso]><!-->\r\n  <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">\r\n  <!--<![endif]-->\r\n  <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">\r\n  <title></title>\r\n  <style type=\"text/css\">\r\n.ReadMsgBody { width: 100%; background-color: #ffffff; }\r\n.ExternalClass { width: 100%; background-color: #ffffff; }\r\n.ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div { line-height: 100%; }\r\nhtml { width: 100%; }\r\nbody { -webkit-text-size-adjust: none; -ms-text-size-adjust: none; margin: 0; padding: 0; }\r\ntable { border-spacing: 0; table-layout: fixed; margin: 0 auto;border-collapse: collapse; }\r\ntable table table { table-layout: auto; }\r\n.yshortcuts a { border-bottom: none !important; }\r\nimg:hover { opacity: 0.9 !important; }\r\na { color: #0087ff; text-decoration: none; }\r\n.textbutton a { font-family: \'open sans\', arial, sans-serif !important;}\r\n.btn-link a { color:#FFFFFF !important;}\r\n\r\n@media only screen and (max-width: 480px) {\r\nbody { width: auto !important; }\r\n*[class=\"table-inner\"] { width: 90% !important; text-align: center !important; }\r\n*[class=\"table-full\"] { width: 100% !important; text-align: center !important; }\r\n/* image */\r\nimg[class=\"img1\"] { width: 100% !important; height: auto !important; }\r\n}\r\n</style>\r\n\r\n\r\n\r\n  <p><table width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" bgcolor=\"#414a51\" align=\"center\">\r\n    <tbody><tr>\r\n      <td height=\"50\"><br></td>\r\n    </tr>\r\n    <tr>\r\n      <td style=\"text-align:center;vertical-align:top;font-size:0;\" align=\"center\">\r\n        <table cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n          <tbody><tr>\r\n            <td width=\"600\" align=\"center\">\r\n              <!--header-->\r\n              <table class=\"table-inner\" width=\"95%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                <tbody><tr>\r\n                  <td style=\"border-top-left-radius:6px; border-top-right-radius:6px;text-align:center;vertical-align:top;font-size:0;\" bgcolor=\"#0087ff\" align=\"center\">\r\n                    <table width=\"90%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                      <tbody><tr>\r\n                        <td height=\"20\"><br></td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td style=\"font-family: \'Open sans\', Arial, sans-serif; color:#FFFFFF; font-size:16px; font-weight: bold;\" align=\"center\"><div align=\"center\"><a href=\"https://premium.appdevs.net/xpay/admin/dashboard\" class=\"sidebar__main-logo\"><img src=\"https://premium.appdevs.net/xpay/assets/images/logoIcon/light_logo.png\" alt=\"image\"></a><br></div></td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td height=\"20\"><br></td>\r\n                      </tr>\r\n                    </tbody></table>\r\n                  </td>\r\n                </tr>\r\n              </tbody></table>\r\n              <!--end header-->\r\n              <table class=\"table-inner\" width=\"95%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\">\r\n                <tbody><tr>\r\n                  <td style=\"text-align:center;vertical-align:top;font-size:0;\" bgcolor=\"#FFFFFF\" align=\"center\">\r\n                    <table width=\"90%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                      <tbody><tr>\r\n                        <td height=\"35\"><br></td>\r\n                      </tr>\r\n                      <!--logo-->\r\n                      <tr>\r\n                        <td style=\"vertical-align:top;font-size:0;\" align=\"center\">\r\n                          \r\n                        <br></td>\r\n                      </tr>\r\n                      <!--end logo-->\r\n                      <tr>\r\n                        <td height=\"40\"><br></td>\r\n                      </tr>\r\n                      <!--headline-->\r\n                      <tr>\r\n                        <td style=\"font-family: \'Open Sans\', Arial, sans-serif; font-size: 22px;color:#414a51;font-weight: bold;\" align=\"center\">Hello Unknown<br></td>\r\n                      </tr>\r\n                      <!--end headline-->\r\n                      <tr>\r\n                        <td style=\"text-align:center;vertical-align:top;font-size:0;\" align=\"center\">\r\n                          <table width=\"40\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                            <tbody><tr>\r\n                              <td style=\" border-bottom:3px solid #0087ff;\" height=\"20\"><br></td>\r\n                            </tr>\r\n                          </tbody></table>\r\n                        </td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td height=\"20\"><br></td>\r\n                      </tr>\r\n                      <!--content-->\r\n                      <tr>\r\n                        <td style=\"font-family: \'Open sans\', Arial, sans-serif; color:#7f8c8d; font-size:16px; line-height: 28px;\" align=\"left\"><div><br></div><div>Thanks For joining us. <br></div><div>Please use the below code to verify your email address.<br></div><div><br></div><div>Your email verification code is:<font size=\"6\"><b> 597066105</b></font></div></td>\r\n                      </tr>\r\n                      <!--end content-->\r\n                      <tr>\r\n                        <td height=\"40\"><br></td>\r\n                      </tr>\r\n              \r\n                    </tbody></table>\r\n                  </td>\r\n                </tr>\r\n                <tr>\r\n                  <td style=\"border-bottom-left-radius:6px;border-bottom-right-radius:6px;\" height=\"45\" bgcolor=\"#f4f4f4\" align=\"center\">\r\n                    <table width=\"90%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                      <tbody><tr>\r\n                        <td height=\"10\"><br></td>\r\n                      </tr>\r\n                      <!--preference-->\r\n                      <tr>\r\n                        <td class=\"preference-link\" style=\"font-family: \'Open sans\', Arial, sans-serif; color:#95a5a6; font-size:14px;\" align=\"center\">\r\n                          © 2022 AppDevs . All Rights Reserved. \r\n                        </td>\r\n                      </tr>\r\n                      <!--end preference-->\r\n                      <tr>\r\n                        <td height=\"10\"><br></td>\r\n                      </tr>\r\n                    </tbody></table>\r\n                  </td>\r\n                </tr>\r\n              </tbody></table>\r\n            </td>\r\n          </tr>\r\n        </tbody></table>\r\n      </td>\r\n    </tr>\r\n    <tr>\r\n      <td height=\"60\"><br></td>\r\n    </tr>\r\n  </tbody></table></p>', '2023-01-10 23:54:33', '2023-01-10 23:54:33'),
(9, NULL, NULL, 'smtp', 'Haraz Alyawm noreply@appdevs.net', 'asd@asd.asd', 'Please verify your email address', '<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">\r\n  <!--[if !mso]><!-->\r\n  <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">\r\n  <!--<![endif]-->\r\n  <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">\r\n  <title></title>\r\n  <style type=\"text/css\">\r\n.ReadMsgBody { width: 100%; background-color: #ffffff; }\r\n.ExternalClass { width: 100%; background-color: #ffffff; }\r\n.ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div { line-height: 100%; }\r\nhtml { width: 100%; }\r\nbody { -webkit-text-size-adjust: none; -ms-text-size-adjust: none; margin: 0; padding: 0; }\r\ntable { border-spacing: 0; table-layout: fixed; margin: 0 auto;border-collapse: collapse; }\r\ntable table table { table-layout: auto; }\r\n.yshortcuts a { border-bottom: none !important; }\r\nimg:hover { opacity: 0.9 !important; }\r\na { color: #0087ff; text-decoration: none; }\r\n.textbutton a { font-family: \'open sans\', arial, sans-serif !important;}\r\n.btn-link a { color:#FFFFFF !important;}\r\n\r\n@media only screen and (max-width: 480px) {\r\nbody { width: auto !important; }\r\n*[class=\"table-inner\"] { width: 90% !important; text-align: center !important; }\r\n*[class=\"table-full\"] { width: 100% !important; text-align: center !important; }\r\n/* image */\r\nimg[class=\"img1\"] { width: 100% !important; height: auto !important; }\r\n}\r\n</style>\r\n\r\n\r\n\r\n  <p><table width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" bgcolor=\"#414a51\" align=\"center\">\r\n    <tbody><tr>\r\n      <td height=\"50\"><br></td>\r\n    </tr>\r\n    <tr>\r\n      <td style=\"text-align:center;vertical-align:top;font-size:0;\" align=\"center\">\r\n        <table cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n          <tbody><tr>\r\n            <td width=\"600\" align=\"center\">\r\n              <!--header-->\r\n              <table class=\"table-inner\" width=\"95%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                <tbody><tr>\r\n                  <td style=\"border-top-left-radius:6px; border-top-right-radius:6px;text-align:center;vertical-align:top;font-size:0;\" bgcolor=\"#0087ff\" align=\"center\">\r\n                    <table width=\"90%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                      <tbody><tr>\r\n                        <td height=\"20\"><br></td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td style=\"font-family: \'Open sans\', Arial, sans-serif; color:#FFFFFF; font-size:16px; font-weight: bold;\" align=\"center\"><div align=\"center\"><a href=\"https://premium.appdevs.net/xpay/admin/dashboard\" class=\"sidebar__main-logo\"><img src=\"https://premium.appdevs.net/xpay/assets/images/logoIcon/light_logo.png\" alt=\"image\"></a><br></div></td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td height=\"20\"><br></td>\r\n                      </tr>\r\n                    </tbody></table>\r\n                  </td>\r\n                </tr>\r\n              </tbody></table>\r\n              <!--end header-->\r\n              <table class=\"table-inner\" width=\"95%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\">\r\n                <tbody><tr>\r\n                  <td style=\"text-align:center;vertical-align:top;font-size:0;\" bgcolor=\"#FFFFFF\" align=\"center\">\r\n                    <table width=\"90%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                      <tbody><tr>\r\n                        <td height=\"35\"><br></td>\r\n                      </tr>\r\n                      <!--logo-->\r\n                      <tr>\r\n                        <td style=\"vertical-align:top;font-size:0;\" align=\"center\">\r\n                          \r\n                        <br></td>\r\n                      </tr>\r\n                      <!--end logo-->\r\n                      <tr>\r\n                        <td height=\"40\"><br></td>\r\n                      </tr>\r\n                      <!--headline-->\r\n                      <tr>\r\n                        <td style=\"font-family: \'Open Sans\', Arial, sans-serif; font-size: 22px;color:#414a51;font-weight: bold;\" align=\"center\">Hello Unknown<br></td>\r\n                      </tr>\r\n                      <!--end headline-->\r\n                      <tr>\r\n                        <td style=\"text-align:center;vertical-align:top;font-size:0;\" align=\"center\">\r\n                          <table width=\"40\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                            <tbody><tr>\r\n                              <td style=\" border-bottom:3px solid #0087ff;\" height=\"20\"><br></td>\r\n                            </tr>\r\n                          </tbody></table>\r\n                        </td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td height=\"20\"><br></td>\r\n                      </tr>\r\n                      <!--content-->\r\n                      <tr>\r\n                        <td style=\"font-family: \'Open sans\', Arial, sans-serif; color:#7f8c8d; font-size:16px; line-height: 28px;\" align=\"left\"><div><br></div><div>Thanks For joining us. <br></div><div>Please use the below code to verify your email address.<br></div><div><br></div><div>Your email verification code is:<font size=\"6\"><b> 1595858532</b></font></div></td>\r\n                      </tr>\r\n                      <!--end content-->\r\n                      <tr>\r\n                        <td height=\"40\"><br></td>\r\n                      </tr>\r\n              \r\n                    </tbody></table>\r\n                  </td>\r\n                </tr>\r\n                <tr>\r\n                  <td style=\"border-bottom-left-radius:6px;border-bottom-right-radius:6px;\" height=\"45\" bgcolor=\"#f4f4f4\" align=\"center\">\r\n                    <table width=\"90%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                      <tbody><tr>\r\n                        <td height=\"10\"><br></td>\r\n                      </tr>\r\n                      <!--preference-->\r\n                      <tr>\r\n                        <td class=\"preference-link\" style=\"font-family: \'Open sans\', Arial, sans-serif; color:#95a5a6; font-size:14px;\" align=\"center\">\r\n                          © 2022 AppDevs . All Rights Reserved. \r\n                        </td>\r\n                      </tr>\r\n                      <!--end preference-->\r\n                      <tr>\r\n                        <td height=\"10\"><br></td>\r\n                      </tr>\r\n                    </tbody></table>\r\n                  </td>\r\n                </tr>\r\n              </tbody></table>\r\n            </td>\r\n          </tr>\r\n        </tbody></table>\r\n      </td>\r\n    </tr>\r\n    <tr>\r\n      <td height=\"60\"><br></td>\r\n    </tr>\r\n  </tbody></table></p>', '2023-01-11 00:00:52', '2023-01-11 00:00:52'),
(10, NULL, NULL, 'smtp', 'Haraz Alyawm noreply@appdevs.net', 'teat@tase.com', 'Please verify your email address', '<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">\r\n  <!--[if !mso]><!-->\r\n  <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">\r\n  <!--<![endif]-->\r\n  <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">\r\n  <title></title>\r\n  <style type=\"text/css\">\r\n.ReadMsgBody { width: 100%; background-color: #ffffff; }\r\n.ExternalClass { width: 100%; background-color: #ffffff; }\r\n.ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div { line-height: 100%; }\r\nhtml { width: 100%; }\r\nbody { -webkit-text-size-adjust: none; -ms-text-size-adjust: none; margin: 0; padding: 0; }\r\ntable { border-spacing: 0; table-layout: fixed; margin: 0 auto;border-collapse: collapse; }\r\ntable table table { table-layout: auto; }\r\n.yshortcuts a { border-bottom: none !important; }\r\nimg:hover { opacity: 0.9 !important; }\r\na { color: #0087ff; text-decoration: none; }\r\n.textbutton a { font-family: \'open sans\', arial, sans-serif !important;}\r\n.btn-link a { color:#FFFFFF !important;}\r\n\r\n@media only screen and (max-width: 480px) {\r\nbody { width: auto !important; }\r\n*[class=\"table-inner\"] { width: 90% !important; text-align: center !important; }\r\n*[class=\"table-full\"] { width: 100% !important; text-align: center !important; }\r\n/* image */\r\nimg[class=\"img1\"] { width: 100% !important; height: auto !important; }\r\n}\r\n</style>\r\n\r\n\r\n\r\n  <p><table width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" bgcolor=\"#414a51\" align=\"center\">\r\n    <tbody><tr>\r\n      <td height=\"50\"><br></td>\r\n    </tr>\r\n    <tr>\r\n      <td style=\"text-align:center;vertical-align:top;font-size:0;\" align=\"center\">\r\n        <table cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n          <tbody><tr>\r\n            <td width=\"600\" align=\"center\">\r\n              <!--header-->\r\n              <table class=\"table-inner\" width=\"95%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                <tbody><tr>\r\n                  <td style=\"border-top-left-radius:6px; border-top-right-radius:6px;text-align:center;vertical-align:top;font-size:0;\" bgcolor=\"#0087ff\" align=\"center\">\r\n                    <table width=\"90%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                      <tbody><tr>\r\n                        <td height=\"20\"><br></td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td style=\"font-family: \'Open sans\', Arial, sans-serif; color:#FFFFFF; font-size:16px; font-weight: bold;\" align=\"center\"><div align=\"center\"><a href=\"https://premium.appdevs.net/xpay/admin/dashboard\" class=\"sidebar__main-logo\"><img src=\"https://premium.appdevs.net/xpay/assets/images/logoIcon/light_logo.png\" alt=\"image\"></a><br></div></td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td height=\"20\"><br></td>\r\n                      </tr>\r\n                    </tbody></table>\r\n                  </td>\r\n                </tr>\r\n              </tbody></table>\r\n              <!--end header-->\r\n              <table class=\"table-inner\" width=\"95%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\">\r\n                <tbody><tr>\r\n                  <td style=\"text-align:center;vertical-align:top;font-size:0;\" bgcolor=\"#FFFFFF\" align=\"center\">\r\n                    <table width=\"90%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                      <tbody><tr>\r\n                        <td height=\"35\"><br></td>\r\n                      </tr>\r\n                      <!--logo-->\r\n                      <tr>\r\n                        <td style=\"vertical-align:top;font-size:0;\" align=\"center\">\r\n                          \r\n                        <br></td>\r\n                      </tr>\r\n                      <!--end logo-->\r\n                      <tr>\r\n                        <td height=\"40\"><br></td>\r\n                      </tr>\r\n                      <!--headline-->\r\n                      <tr>\r\n                        <td style=\"font-family: \'Open Sans\', Arial, sans-serif; font-size: 22px;color:#414a51;font-weight: bold;\" align=\"center\">Hello Unknown<br></td>\r\n                      </tr>\r\n                      <!--end headline-->\r\n                      <tr>\r\n                        <td style=\"text-align:center;vertical-align:top;font-size:0;\" align=\"center\">\r\n                          <table width=\"40\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                            <tbody><tr>\r\n                              <td style=\" border-bottom:3px solid #0087ff;\" height=\"20\"><br></td>\r\n                            </tr>\r\n                          </tbody></table>\r\n                        </td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td height=\"20\"><br></td>\r\n                      </tr>\r\n                      <!--content-->\r\n                      <tr>\r\n                        <td style=\"font-family: \'Open sans\', Arial, sans-serif; color:#7f8c8d; font-size:16px; line-height: 28px;\" align=\"left\"><div><br></div><div>Thanks For joining us. <br></div><div>Please use the below code to verify your email address.<br></div><div><br></div><div>Your email verification code is:<font size=\"6\"><b> 360703179</b></font></div></td>\r\n                      </tr>\r\n                      <!--end content-->\r\n                      <tr>\r\n                        <td height=\"40\"><br></td>\r\n                      </tr>\r\n              \r\n                    </tbody></table>\r\n                  </td>\r\n                </tr>\r\n                <tr>\r\n                  <td style=\"border-bottom-left-radius:6px;border-bottom-right-radius:6px;\" height=\"45\" bgcolor=\"#f4f4f4\" align=\"center\">\r\n                    <table width=\"90%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                      <tbody><tr>\r\n                        <td height=\"10\"><br></td>\r\n                      </tr>\r\n                      <!--preference-->\r\n                      <tr>\r\n                        <td class=\"preference-link\" style=\"font-family: \'Open sans\', Arial, sans-serif; color:#95a5a6; font-size:14px;\" align=\"center\">\r\n                          © 2022 AppDevs . All Rights Reserved. \r\n                        </td>\r\n                      </tr>\r\n                      <!--end preference-->\r\n                      <tr>\r\n                        <td height=\"10\"><br></td>\r\n                      </tr>\r\n                    </tbody></table>\r\n                  </td>\r\n                </tr>\r\n              </tbody></table>\r\n            </td>\r\n          </tr>\r\n        </tbody></table>\r\n      </td>\r\n    </tr>\r\n    <tr>\r\n      <td height=\"60\"><br></td>\r\n    </tr>\r\n  </tbody></table></p>', '2023-01-11 01:04:03', '2023-01-11 01:04:03'),
(11, NULL, NULL, 'smtp', 'Haraz Alyawm noreply@appdevs.net', 'test@test.test', 'Please verify your email address', '<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">\r\n  <!--[if !mso]><!-->\r\n  <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">\r\n  <!--<![endif]-->\r\n  <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">\r\n  <title></title>\r\n  <style type=\"text/css\">\r\n.ReadMsgBody { width: 100%; background-color: #ffffff; }\r\n.ExternalClass { width: 100%; background-color: #ffffff; }\r\n.ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div { line-height: 100%; }\r\nhtml { width: 100%; }\r\nbody { -webkit-text-size-adjust: none; -ms-text-size-adjust: none; margin: 0; padding: 0; }\r\ntable { border-spacing: 0; table-layout: fixed; margin: 0 auto;border-collapse: collapse; }\r\ntable table table { table-layout: auto; }\r\n.yshortcuts a { border-bottom: none !important; }\r\nimg:hover { opacity: 0.9 !important; }\r\na { color: #0087ff; text-decoration: none; }\r\n.textbutton a { font-family: \'open sans\', arial, sans-serif !important;}\r\n.btn-link a { color:#FFFFFF !important;}\r\n\r\n@media only screen and (max-width: 480px) {\r\nbody { width: auto !important; }\r\n*[class=\"table-inner\"] { width: 90% !important; text-align: center !important; }\r\n*[class=\"table-full\"] { width: 100% !important; text-align: center !important; }\r\n/* image */\r\nimg[class=\"img1\"] { width: 100% !important; height: auto !important; }\r\n}\r\n</style>\r\n\r\n\r\n\r\n  <p><table width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" bgcolor=\"#414a51\" align=\"center\">\r\n    <tbody><tr>\r\n      <td height=\"50\"><br></td>\r\n    </tr>\r\n    <tr>\r\n      <td style=\"text-align:center;vertical-align:top;font-size:0;\" align=\"center\">\r\n        <table cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n          <tbody><tr>\r\n            <td width=\"600\" align=\"center\">\r\n              <!--header-->\r\n              <table class=\"table-inner\" width=\"95%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                <tbody><tr>\r\n                  <td style=\"border-top-left-radius:6px; border-top-right-radius:6px;text-align:center;vertical-align:top;font-size:0;\" bgcolor=\"#0087ff\" align=\"center\">\r\n                    <table width=\"90%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                      <tbody><tr>\r\n                        <td height=\"20\"><br></td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td style=\"font-family: \'Open sans\', Arial, sans-serif; color:#FFFFFF; font-size:16px; font-weight: bold;\" align=\"center\"><div align=\"center\"><a href=\"https://premium.appdevs.net/xpay/admin/dashboard\" class=\"sidebar__main-logo\"><img src=\"https://premium.appdevs.net/xpay/assets/images/logoIcon/light_logo.png\" alt=\"image\"></a><br></div></td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td height=\"20\"><br></td>\r\n                      </tr>\r\n                    </tbody></table>\r\n                  </td>\r\n                </tr>\r\n              </tbody></table>\r\n              <!--end header-->\r\n              <table class=\"table-inner\" width=\"95%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\">\r\n                <tbody><tr>\r\n                  <td style=\"text-align:center;vertical-align:top;font-size:0;\" bgcolor=\"#FFFFFF\" align=\"center\">\r\n                    <table width=\"90%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                      <tbody><tr>\r\n                        <td height=\"35\"><br></td>\r\n                      </tr>\r\n                      <!--logo-->\r\n                      <tr>\r\n                        <td style=\"vertical-align:top;font-size:0;\" align=\"center\">\r\n                          \r\n                        <br></td>\r\n                      </tr>\r\n                      <!--end logo-->\r\n                      <tr>\r\n                        <td height=\"40\"><br></td>\r\n                      </tr>\r\n                      <!--headline-->\r\n                      <tr>\r\n                        <td style=\"font-family: \'Open Sans\', Arial, sans-serif; font-size: 22px;color:#414a51;font-weight: bold;\" align=\"center\">Hello Unknown<br></td>\r\n                      </tr>\r\n                      <!--end headline-->\r\n                      <tr>\r\n                        <td style=\"text-align:center;vertical-align:top;font-size:0;\" align=\"center\">\r\n                          <table width=\"40\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                            <tbody><tr>\r\n                              <td style=\" border-bottom:3px solid #0087ff;\" height=\"20\"><br></td>\r\n                            </tr>\r\n                          </tbody></table>\r\n                        </td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td height=\"20\"><br></td>\r\n                      </tr>\r\n                      <!--content-->\r\n                      <tr>\r\n                        <td style=\"font-family: \'Open sans\', Arial, sans-serif; color:#7f8c8d; font-size:16px; line-height: 28px;\" align=\"left\"><div><br></div><div>Thanks For joining us. <br></div><div>Please use the below code to verify your email address.<br></div><div><br></div><div>Your email verification code is:<font size=\"6\"><b> 762246070</b></font></div></td>\r\n                      </tr>\r\n                      <!--end content-->\r\n                      <tr>\r\n                        <td height=\"40\"><br></td>\r\n                      </tr>\r\n              \r\n                    </tbody></table>\r\n                  </td>\r\n                </tr>\r\n                <tr>\r\n                  <td style=\"border-bottom-left-radius:6px;border-bottom-right-radius:6px;\" height=\"45\" bgcolor=\"#f4f4f4\" align=\"center\">\r\n                    <table width=\"90%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                      <tbody><tr>\r\n                        <td height=\"10\"><br></td>\r\n                      </tr>\r\n                      <!--preference-->\r\n                      <tr>\r\n                        <td class=\"preference-link\" style=\"font-family: \'Open sans\', Arial, sans-serif; color:#95a5a6; font-size:14px;\" align=\"center\">\r\n                          © 2022 AppDevs . All Rights Reserved. \r\n                        </td>\r\n                      </tr>\r\n                      <!--end preference-->\r\n                      <tr>\r\n                        <td height=\"10\"><br></td>\r\n                      </tr>\r\n                    </tbody></table>\r\n                  </td>\r\n                </tr>\r\n              </tbody></table>\r\n            </td>\r\n          </tr>\r\n        </tbody></table>\r\n      </td>\r\n    </tr>\r\n    <tr>\r\n      <td height=\"60\"><br></td>\r\n    </tr>\r\n  </tbody></table></p>', '2023-01-11 01:05:23', '2023-01-11 01:05:23'),
(12, NULL, NULL, 'smtp', 'Haraz Alyawm noreply@appdevs.net', 'frranad1@gmail.com', 'Please verify your email address', '<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">\r\n  <!--[if !mso]><!-->\r\n  <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">\r\n  <!--<![endif]-->\r\n  <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">\r\n  <title></title>\r\n  <style type=\"text/css\">\r\n.ReadMsgBody { width: 100%; background-color: #ffffff; }\r\n.ExternalClass { width: 100%; background-color: #ffffff; }\r\n.ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div { line-height: 100%; }\r\nhtml { width: 100%; }\r\nbody { -webkit-text-size-adjust: none; -ms-text-size-adjust: none; margin: 0; padding: 0; }\r\ntable { border-spacing: 0; table-layout: fixed; margin: 0 auto;border-collapse: collapse; }\r\ntable table table { table-layout: auto; }\r\n.yshortcuts a { border-bottom: none !important; }\r\nimg:hover { opacity: 0.9 !important; }\r\na { color: #0087ff; text-decoration: none; }\r\n.textbutton a { font-family: \'open sans\', arial, sans-serif !important;}\r\n.btn-link a { color:#FFFFFF !important;}\r\n\r\n@media only screen and (max-width: 480px) {\r\nbody { width: auto !important; }\r\n*[class=\"table-inner\"] { width: 90% !important; text-align: center !important; }\r\n*[class=\"table-full\"] { width: 100% !important; text-align: center !important; }\r\n/* image */\r\nimg[class=\"img1\"] { width: 100% !important; height: auto !important; }\r\n}\r\n</style>\r\n\r\n\r\n\r\n  <p><table width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" bgcolor=\"#414a51\" align=\"center\">\r\n    <tbody><tr>\r\n      <td height=\"50\"><br></td>\r\n    </tr>\r\n    <tr>\r\n      <td style=\"text-align:center;vertical-align:top;font-size:0;\" align=\"center\">\r\n        <table cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n          <tbody><tr>\r\n            <td width=\"600\" align=\"center\">\r\n              <!--header-->\r\n              <table class=\"table-inner\" width=\"95%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                <tbody><tr>\r\n                  <td style=\"border-top-left-radius:6px; border-top-right-radius:6px;text-align:center;vertical-align:top;font-size:0;\" bgcolor=\"#0087ff\" align=\"center\">\r\n                    <table width=\"90%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                      <tbody><tr>\r\n                        <td height=\"20\"><br></td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td style=\"font-family: \'Open sans\', Arial, sans-serif; color:#FFFFFF; font-size:16px; font-weight: bold;\" align=\"center\"><div align=\"center\"><a href=\"https://premium.appdevs.net/xpay/admin/dashboard\" class=\"sidebar__main-logo\"><img src=\"https://premium.appdevs.net/xpay/assets/images/logoIcon/light_logo.png\" alt=\"image\"></a><br></div></td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td height=\"20\"><br></td>\r\n                      </tr>\r\n                    </tbody></table>\r\n                  </td>\r\n                </tr>\r\n              </tbody></table>\r\n              <!--end header-->\r\n              <table class=\"table-inner\" width=\"95%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\">\r\n                <tbody><tr>\r\n                  <td style=\"text-align:center;vertical-align:top;font-size:0;\" bgcolor=\"#FFFFFF\" align=\"center\">\r\n                    <table width=\"90%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                      <tbody><tr>\r\n                        <td height=\"35\"><br></td>\r\n                      </tr>\r\n                      <!--logo-->\r\n                      <tr>\r\n                        <td style=\"vertical-align:top;font-size:0;\" align=\"center\">\r\n                          \r\n                        <br></td>\r\n                      </tr>\r\n                      <!--end logo-->\r\n                      <tr>\r\n                        <td height=\"40\"><br></td>\r\n                      </tr>\r\n                      <!--headline-->\r\n                      <tr>\r\n                        <td style=\"font-family: \'Open Sans\', Arial, sans-serif; font-size: 22px;color:#414a51;font-weight: bold;\" align=\"center\">Hello Unknown<br></td>\r\n                      </tr>\r\n                      <!--end headline-->\r\n                      <tr>\r\n                        <td style=\"text-align:center;vertical-align:top;font-size:0;\" align=\"center\">\r\n                          <table width=\"40\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                            <tbody><tr>\r\n                              <td style=\" border-bottom:3px solid #0087ff;\" height=\"20\"><br></td>\r\n                            </tr>\r\n                          </tbody></table>\r\n                        </td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td height=\"20\"><br></td>\r\n                      </tr>\r\n                      <!--content-->\r\n                      <tr>\r\n                        <td style=\"font-family: \'Open sans\', Arial, sans-serif; color:#7f8c8d; font-size:16px; line-height: 28px;\" align=\"left\"><div><br></div><div>Thanks For joining us. <br></div><div>Please use the below code to verify your email address.<br></div><div><br></div><div>Your email verification code is:<font size=\"6\"><b> 36235388</b></font></div></td>\r\n                      </tr>\r\n                      <!--end content-->\r\n                      <tr>\r\n                        <td height=\"40\"><br></td>\r\n                      </tr>\r\n              \r\n                    </tbody></table>\r\n                  </td>\r\n                </tr>\r\n                <tr>\r\n                  <td style=\"border-bottom-left-radius:6px;border-bottom-right-radius:6px;\" height=\"45\" bgcolor=\"#f4f4f4\" align=\"center\">\r\n                    <table width=\"90%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                      <tbody><tr>\r\n                        <td height=\"10\"><br></td>\r\n                      </tr>\r\n                      <!--preference-->\r\n                      <tr>\r\n                        <td class=\"preference-link\" style=\"font-family: \'Open sans\', Arial, sans-serif; color:#95a5a6; font-size:14px;\" align=\"center\">\r\n                          © 2022 AppDevs . All Rights Reserved. \r\n                        </td>\r\n                      </tr>\r\n                      <!--end preference-->\r\n                      <tr>\r\n                        <td height=\"10\"><br></td>\r\n                      </tr>\r\n                    </tbody></table>\r\n                  </td>\r\n                </tr>\r\n              </tbody></table>\r\n            </td>\r\n          </tr>\r\n        </tbody></table>\r\n      </td>\r\n    </tr>\r\n    <tr>\r\n      <td height=\"60\"><br></td>\r\n    </tr>\r\n  </tbody></table></p>', '2023-01-11 01:06:52', '2023-01-11 01:06:52');
INSERT INTO `email_logs` (`id`, `advertiser_id`, `user_type`, `mail_sender`, `email_from`, `email_to`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(13, NULL, NULL, 'smtp', 'Haraz Alyawm noreply@appdevs.net', 'frranad1@gmail.com', 'Please verify your email address', '<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">\r\n  <!--[if !mso]><!-->\r\n  <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">\r\n  <!--<![endif]-->\r\n  <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">\r\n  <title></title>\r\n  <style type=\"text/css\">\r\n.ReadMsgBody { width: 100%; background-color: #ffffff; }\r\n.ExternalClass { width: 100%; background-color: #ffffff; }\r\n.ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div { line-height: 100%; }\r\nhtml { width: 100%; }\r\nbody { -webkit-text-size-adjust: none; -ms-text-size-adjust: none; margin: 0; padding: 0; }\r\ntable { border-spacing: 0; table-layout: fixed; margin: 0 auto;border-collapse: collapse; }\r\ntable table table { table-layout: auto; }\r\n.yshortcuts a { border-bottom: none !important; }\r\nimg:hover { opacity: 0.9 !important; }\r\na { color: #0087ff; text-decoration: none; }\r\n.textbutton a { font-family: \'open sans\', arial, sans-serif !important;}\r\n.btn-link a { color:#FFFFFF !important;}\r\n\r\n@media only screen and (max-width: 480px) {\r\nbody { width: auto !important; }\r\n*[class=\"table-inner\"] { width: 90% !important; text-align: center !important; }\r\n*[class=\"table-full\"] { width: 100% !important; text-align: center !important; }\r\n/* image */\r\nimg[class=\"img1\"] { width: 100% !important; height: auto !important; }\r\n}\r\n</style>\r\n\r\n\r\n\r\n  <p><table width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" bgcolor=\"#414a51\" align=\"center\">\r\n    <tbody><tr>\r\n      <td height=\"50\"><br></td>\r\n    </tr>\r\n    <tr>\r\n      <td style=\"text-align:center;vertical-align:top;font-size:0;\" align=\"center\">\r\n        <table cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n          <tbody><tr>\r\n            <td width=\"600\" align=\"center\">\r\n              <!--header-->\r\n              <table class=\"table-inner\" width=\"95%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                <tbody><tr>\r\n                  <td style=\"border-top-left-radius:6px; border-top-right-radius:6px;text-align:center;vertical-align:top;font-size:0;\" bgcolor=\"#0087ff\" align=\"center\">\r\n                    <table width=\"90%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                      <tbody><tr>\r\n                        <td height=\"20\"><br></td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td style=\"font-family: \'Open sans\', Arial, sans-serif; color:#FFFFFF; font-size:16px; font-weight: bold;\" align=\"center\"><div align=\"center\"><a href=\"https://premium.appdevs.net/xpay/admin/dashboard\" class=\"sidebar__main-logo\"><img src=\"https://premium.appdevs.net/xpay/assets/images/logoIcon/light_logo.png\" alt=\"image\"></a><br></div></td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td height=\"20\"><br></td>\r\n                      </tr>\r\n                    </tbody></table>\r\n                  </td>\r\n                </tr>\r\n              </tbody></table>\r\n              <!--end header-->\r\n              <table class=\"table-inner\" width=\"95%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\">\r\n                <tbody><tr>\r\n                  <td style=\"text-align:center;vertical-align:top;font-size:0;\" bgcolor=\"#FFFFFF\" align=\"center\">\r\n                    <table width=\"90%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                      <tbody><tr>\r\n                        <td height=\"35\"><br></td>\r\n                      </tr>\r\n                      <!--logo-->\r\n                      <tr>\r\n                        <td style=\"vertical-align:top;font-size:0;\" align=\"center\">\r\n                          \r\n                        <br></td>\r\n                      </tr>\r\n                      <!--end logo-->\r\n                      <tr>\r\n                        <td height=\"40\"><br></td>\r\n                      </tr>\r\n                      <!--headline-->\r\n                      <tr>\r\n                        <td style=\"font-family: \'Open Sans\', Arial, sans-serif; font-size: 22px;color:#414a51;font-weight: bold;\" align=\"center\">Hello Unknown<br></td>\r\n                      </tr>\r\n                      <!--end headline-->\r\n                      <tr>\r\n                        <td style=\"text-align:center;vertical-align:top;font-size:0;\" align=\"center\">\r\n                          <table width=\"40\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                            <tbody><tr>\r\n                              <td style=\" border-bottom:3px solid #0087ff;\" height=\"20\"><br></td>\r\n                            </tr>\r\n                          </tbody></table>\r\n                        </td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td height=\"20\"><br></td>\r\n                      </tr>\r\n                      <!--content-->\r\n                      <tr>\r\n                        <td style=\"font-family: \'Open sans\', Arial, sans-serif; color:#7f8c8d; font-size:16px; line-height: 28px;\" align=\"left\"><div><br></div><div>Thanks For joining us. <br></div><div>Please use the below code to verify your email address.<br></div><div><br></div><div>Your email verification code is:<font size=\"6\"><b> 660349194</b></font></div></td>\r\n                      </tr>\r\n                      <!--end content-->\r\n                      <tr>\r\n                        <td height=\"40\"><br></td>\r\n                      </tr>\r\n              \r\n                    </tbody></table>\r\n                  </td>\r\n                </tr>\r\n                <tr>\r\n                  <td style=\"border-bottom-left-radius:6px;border-bottom-right-radius:6px;\" height=\"45\" bgcolor=\"#f4f4f4\" align=\"center\">\r\n                    <table width=\"90%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                      <tbody><tr>\r\n                        <td height=\"10\"><br></td>\r\n                      </tr>\r\n                      <!--preference-->\r\n                      <tr>\r\n                        <td class=\"preference-link\" style=\"font-family: \'Open sans\', Arial, sans-serif; color:#95a5a6; font-size:14px;\" align=\"center\">\r\n                          © 2022 AppDevs . All Rights Reserved. \r\n                        </td>\r\n                      </tr>\r\n                      <!--end preference-->\r\n                      <tr>\r\n                        <td height=\"10\"><br></td>\r\n                      </tr>\r\n                    </tbody></table>\r\n                  </td>\r\n                </tr>\r\n              </tbody></table>\r\n            </td>\r\n          </tr>\r\n        </tbody></table>\r\n      </td>\r\n    </tr>\r\n    <tr>\r\n      <td height=\"60\"><br></td>\r\n    </tr>\r\n  </tbody></table></p>', '2023-01-11 01:16:28', '2023-01-11 01:16:28'),
(14, NULL, NULL, 'smtp', 'Haraz Alyawm noreply@appdevs.net', 'frranad1@gmail.com', 'Please verify your email address', '<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">\r\n  <!--[if !mso]><!-->\r\n  <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">\r\n  <!--<![endif]-->\r\n  <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">\r\n  <title></title>\r\n  <style type=\"text/css\">\r\n.ReadMsgBody { width: 100%; background-color: #ffffff; }\r\n.ExternalClass { width: 100%; background-color: #ffffff; }\r\n.ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div { line-height: 100%; }\r\nhtml { width: 100%; }\r\nbody { -webkit-text-size-adjust: none; -ms-text-size-adjust: none; margin: 0; padding: 0; }\r\ntable { border-spacing: 0; table-layout: fixed; margin: 0 auto;border-collapse: collapse; }\r\ntable table table { table-layout: auto; }\r\n.yshortcuts a { border-bottom: none !important; }\r\nimg:hover { opacity: 0.9 !important; }\r\na { color: #0087ff; text-decoration: none; }\r\n.textbutton a { font-family: \'open sans\', arial, sans-serif !important;}\r\n.btn-link a { color:#FFFFFF !important;}\r\n\r\n@media only screen and (max-width: 480px) {\r\nbody { width: auto !important; }\r\n*[class=\"table-inner\"] { width: 90% !important; text-align: center !important; }\r\n*[class=\"table-full\"] { width: 100% !important; text-align: center !important; }\r\n/* image */\r\nimg[class=\"img1\"] { width: 100% !important; height: auto !important; }\r\n}\r\n</style>\r\n\r\n\r\n\r\n  <p><table width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" bgcolor=\"#414a51\" align=\"center\">\r\n    <tbody><tr>\r\n      <td height=\"50\"><br></td>\r\n    </tr>\r\n    <tr>\r\n      <td style=\"text-align:center;vertical-align:top;font-size:0;\" align=\"center\">\r\n        <table cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n          <tbody><tr>\r\n            <td width=\"600\" align=\"center\">\r\n              <!--header-->\r\n              <table class=\"table-inner\" width=\"95%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                <tbody><tr>\r\n                  <td style=\"border-top-left-radius:6px; border-top-right-radius:6px;text-align:center;vertical-align:top;font-size:0;\" bgcolor=\"#0087ff\" align=\"center\">\r\n                    <table width=\"90%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                      <tbody><tr>\r\n                        <td height=\"20\"><br></td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td style=\"font-family: \'Open sans\', Arial, sans-serif; color:#FFFFFF; font-size:16px; font-weight: bold;\" align=\"center\"><div align=\"center\"><a href=\"https://premium.appdevs.net/xpay/admin/dashboard\" class=\"sidebar__main-logo\"><img src=\"https://premium.appdevs.net/xpay/assets/images/logoIcon/light_logo.png\" alt=\"image\"></a><br></div></td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td height=\"20\"><br></td>\r\n                      </tr>\r\n                    </tbody></table>\r\n                  </td>\r\n                </tr>\r\n              </tbody></table>\r\n              <!--end header-->\r\n              <table class=\"table-inner\" width=\"95%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\">\r\n                <tbody><tr>\r\n                  <td style=\"text-align:center;vertical-align:top;font-size:0;\" bgcolor=\"#FFFFFF\" align=\"center\">\r\n                    <table width=\"90%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                      <tbody><tr>\r\n                        <td height=\"35\"><br></td>\r\n                      </tr>\r\n                      <!--logo-->\r\n                      <tr>\r\n                        <td style=\"vertical-align:top;font-size:0;\" align=\"center\">\r\n                          \r\n                        <br></td>\r\n                      </tr>\r\n                      <!--end logo-->\r\n                      <tr>\r\n                        <td height=\"40\"><br></td>\r\n                      </tr>\r\n                      <!--headline-->\r\n                      <tr>\r\n                        <td style=\"font-family: \'Open Sans\', Arial, sans-serif; font-size: 22px;color:#414a51;font-weight: bold;\" align=\"center\">Hello Unknown<br></td>\r\n                      </tr>\r\n                      <!--end headline-->\r\n                      <tr>\r\n                        <td style=\"text-align:center;vertical-align:top;font-size:0;\" align=\"center\">\r\n                          <table width=\"40\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                            <tbody><tr>\r\n                              <td style=\" border-bottom:3px solid #0087ff;\" height=\"20\"><br></td>\r\n                            </tr>\r\n                          </tbody></table>\r\n                        </td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td height=\"20\"><br></td>\r\n                      </tr>\r\n                      <!--content-->\r\n                      <tr>\r\n                        <td style=\"font-family: \'Open sans\', Arial, sans-serif; color:#7f8c8d; font-size:16px; line-height: 28px;\" align=\"left\"><div><br></div><div>Thanks For joining us. <br></div><div>Please use the below code to verify your email address.<br></div><div><br></div><div>Your email verification code is:<font size=\"6\"><b> 1443905410</b></font></div></td>\r\n                      </tr>\r\n                      <!--end content-->\r\n                      <tr>\r\n                        <td height=\"40\"><br></td>\r\n                      </tr>\r\n              \r\n                    </tbody></table>\r\n                  </td>\r\n                </tr>\r\n                <tr>\r\n                  <td style=\"border-bottom-left-radius:6px;border-bottom-right-radius:6px;\" height=\"45\" bgcolor=\"#f4f4f4\" align=\"center\">\r\n                    <table width=\"90%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                      <tbody><tr>\r\n                        <td height=\"10\"><br></td>\r\n                      </tr>\r\n                      <!--preference-->\r\n                      <tr>\r\n                        <td class=\"preference-link\" style=\"font-family: \'Open sans\', Arial, sans-serif; color:#95a5a6; font-size:14px;\" align=\"center\">\r\n                          © 2022 AppDevs . All Rights Reserved. \r\n                        </td>\r\n                      </tr>\r\n                      <!--end preference-->\r\n                      <tr>\r\n                        <td height=\"10\"><br></td>\r\n                      </tr>\r\n                    </tbody></table>\r\n                  </td>\r\n                </tr>\r\n              </tbody></table>\r\n            </td>\r\n          </tr>\r\n        </tbody></table>\r\n      </td>\r\n    </tr>\r\n    <tr>\r\n      <td height=\"60\"><br></td>\r\n    </tr>\r\n  </tbody></table></p>', '2023-01-11 02:47:12', '2023-01-11 02:47:12'),
(15, NULL, NULL, 'smtp', 'Haraz Alyawm noreply@appdevs.net', 'frranad1@gmail.com', 'Please verify your email address', '<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">\r\n  <!--[if !mso]><!-->\r\n  <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">\r\n  <!--<![endif]-->\r\n  <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">\r\n  <title></title>\r\n  <style type=\"text/css\">\r\n.ReadMsgBody { width: 100%; background-color: #ffffff; }\r\n.ExternalClass { width: 100%; background-color: #ffffff; }\r\n.ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div { line-height: 100%; }\r\nhtml { width: 100%; }\r\nbody { -webkit-text-size-adjust: none; -ms-text-size-adjust: none; margin: 0; padding: 0; }\r\ntable { border-spacing: 0; table-layout: fixed; margin: 0 auto;border-collapse: collapse; }\r\ntable table table { table-layout: auto; }\r\n.yshortcuts a { border-bottom: none !important; }\r\nimg:hover { opacity: 0.9 !important; }\r\na { color: #0087ff; text-decoration: none; }\r\n.textbutton a { font-family: \'open sans\', arial, sans-serif !important;}\r\n.btn-link a { color:#FFFFFF !important;}\r\n\r\n@media only screen and (max-width: 480px) {\r\nbody { width: auto !important; }\r\n*[class=\"table-inner\"] { width: 90% !important; text-align: center !important; }\r\n*[class=\"table-full\"] { width: 100% !important; text-align: center !important; }\r\n/* image */\r\nimg[class=\"img1\"] { width: 100% !important; height: auto !important; }\r\n}\r\n</style>\r\n\r\n\r\n\r\n  <p><table width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" bgcolor=\"#414a51\" align=\"center\">\r\n    <tbody><tr>\r\n      <td height=\"50\"><br></td>\r\n    </tr>\r\n    <tr>\r\n      <td style=\"text-align:center;vertical-align:top;font-size:0;\" align=\"center\">\r\n        <table cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n          <tbody><tr>\r\n            <td width=\"600\" align=\"center\">\r\n              <!--header-->\r\n              <table class=\"table-inner\" width=\"95%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                <tbody><tr>\r\n                  <td style=\"border-top-left-radius:6px; border-top-right-radius:6px;text-align:center;vertical-align:top;font-size:0;\" bgcolor=\"#0087ff\" align=\"center\">\r\n                    <table width=\"90%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                      <tbody><tr>\r\n                        <td height=\"20\"><br></td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td style=\"font-family: \'Open sans\', Arial, sans-serif; color:#FFFFFF; font-size:16px; font-weight: bold;\" align=\"center\"><div align=\"center\"><a href=\"https://premium.appdevs.net/xpay/admin/dashboard\" class=\"sidebar__main-logo\"><img src=\"https://premium.appdevs.net/xpay/assets/images/logoIcon/light_logo.png\" alt=\"image\"></a><br></div></td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td height=\"20\"><br></td>\r\n                      </tr>\r\n                    </tbody></table>\r\n                  </td>\r\n                </tr>\r\n              </tbody></table>\r\n              <!--end header-->\r\n              <table class=\"table-inner\" width=\"95%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\">\r\n                <tbody><tr>\r\n                  <td style=\"text-align:center;vertical-align:top;font-size:0;\" bgcolor=\"#FFFFFF\" align=\"center\">\r\n                    <table width=\"90%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                      <tbody><tr>\r\n                        <td height=\"35\"><br></td>\r\n                      </tr>\r\n                      <!--logo-->\r\n                      <tr>\r\n                        <td style=\"vertical-align:top;font-size:0;\" align=\"center\">\r\n                          \r\n                        <br></td>\r\n                      </tr>\r\n                      <!--end logo-->\r\n                      <tr>\r\n                        <td height=\"40\"><br></td>\r\n                      </tr>\r\n                      <!--headline-->\r\n                      <tr>\r\n                        <td style=\"font-family: \'Open Sans\', Arial, sans-serif; font-size: 22px;color:#414a51;font-weight: bold;\" align=\"center\">Hello Unknown<br></td>\r\n                      </tr>\r\n                      <!--end headline-->\r\n                      <tr>\r\n                        <td style=\"text-align:center;vertical-align:top;font-size:0;\" align=\"center\">\r\n                          <table width=\"40\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                            <tbody><tr>\r\n                              <td style=\" border-bottom:3px solid #0087ff;\" height=\"20\"><br></td>\r\n                            </tr>\r\n                          </tbody></table>\r\n                        </td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td height=\"20\"><br></td>\r\n                      </tr>\r\n                      <!--content-->\r\n                      <tr>\r\n                        <td style=\"font-family: \'Open sans\', Arial, sans-serif; color:#7f8c8d; font-size:16px; line-height: 28px;\" align=\"left\"><div><br></div><div>Thanks For joining us. <br></div><div>Please use the below code to verify your email address.<br></div><div><br></div><div>Your email verification code is:<font size=\"6\"><b> 185633111</b></font></div></td>\r\n                      </tr>\r\n                      <!--end content-->\r\n                      <tr>\r\n                        <td height=\"40\"><br></td>\r\n                      </tr>\r\n              \r\n                    </tbody></table>\r\n                  </td>\r\n                </tr>\r\n                <tr>\r\n                  <td style=\"border-bottom-left-radius:6px;border-bottom-right-radius:6px;\" height=\"45\" bgcolor=\"#f4f4f4\" align=\"center\">\r\n                    <table width=\"90%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                      <tbody><tr>\r\n                        <td height=\"10\"><br></td>\r\n                      </tr>\r\n                      <!--preference-->\r\n                      <tr>\r\n                        <td class=\"preference-link\" style=\"font-family: \'Open sans\', Arial, sans-serif; color:#95a5a6; font-size:14px;\" align=\"center\">\r\n                          © 2022 AppDevs . All Rights Reserved. \r\n                        </td>\r\n                      </tr>\r\n                      <!--end preference-->\r\n                      <tr>\r\n                        <td height=\"10\"><br></td>\r\n                      </tr>\r\n                    </tbody></table>\r\n                  </td>\r\n                </tr>\r\n              </tbody></table>\r\n            </td>\r\n          </tr>\r\n        </tbody></table>\r\n      </td>\r\n    </tr>\r\n    <tr>\r\n      <td height=\"60\"><br></td>\r\n    </tr>\r\n  </tbody></table></p>', '2023-01-11 02:50:57', '2023-01-11 02:50:57'),
(16, NULL, NULL, 'smtp', 'Haraz Alyawm noreply@appdevs.net', 'frranad1@gmail.com', 'Please verify your email address', '<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">\r\n  <!--[if !mso]><!-->\r\n  <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">\r\n  <!--<![endif]-->\r\n  <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">\r\n  <title></title>\r\n  <style type=\"text/css\">\r\n.ReadMsgBody { width: 100%; background-color: #ffffff; }\r\n.ExternalClass { width: 100%; background-color: #ffffff; }\r\n.ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div { line-height: 100%; }\r\nhtml { width: 100%; }\r\nbody { -webkit-text-size-adjust: none; -ms-text-size-adjust: none; margin: 0; padding: 0; }\r\ntable { border-spacing: 0; table-layout: fixed; margin: 0 auto;border-collapse: collapse; }\r\ntable table table { table-layout: auto; }\r\n.yshortcuts a { border-bottom: none !important; }\r\nimg:hover { opacity: 0.9 !important; }\r\na { color: #0087ff; text-decoration: none; }\r\n.textbutton a { font-family: \'open sans\', arial, sans-serif !important;}\r\n.btn-link a { color:#FFFFFF !important;}\r\n\r\n@media only screen and (max-width: 480px) {\r\nbody { width: auto !important; }\r\n*[class=\"table-inner\"] { width: 90% !important; text-align: center !important; }\r\n*[class=\"table-full\"] { width: 100% !important; text-align: center !important; }\r\n/* image */\r\nimg[class=\"img1\"] { width: 100% !important; height: auto !important; }\r\n}\r\n</style>\r\n\r\n\r\n\r\n  <p><table width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" bgcolor=\"#414a51\" align=\"center\">\r\n    <tbody><tr>\r\n      <td height=\"50\"><br></td>\r\n    </tr>\r\n    <tr>\r\n      <td style=\"text-align:center;vertical-align:top;font-size:0;\" align=\"center\">\r\n        <table cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n          <tbody><tr>\r\n            <td width=\"600\" align=\"center\">\r\n              <!--header-->\r\n              <table class=\"table-inner\" width=\"95%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                <tbody><tr>\r\n                  <td style=\"border-top-left-radius:6px; border-top-right-radius:6px;text-align:center;vertical-align:top;font-size:0;\" bgcolor=\"#0087ff\" align=\"center\">\r\n                    <table width=\"90%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                      <tbody><tr>\r\n                        <td height=\"20\"><br></td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td style=\"font-family: \'Open sans\', Arial, sans-serif; color:#FFFFFF; font-size:16px; font-weight: bold;\" align=\"center\"><div align=\"center\"><a href=\"https://premium.appdevs.net/xpay/admin/dashboard\" class=\"sidebar__main-logo\"><img src=\"https://premium.appdevs.net/xpay/assets/images/logoIcon/light_logo.png\" alt=\"image\"></a><br></div></td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td height=\"20\"><br></td>\r\n                      </tr>\r\n                    </tbody></table>\r\n                  </td>\r\n                </tr>\r\n              </tbody></table>\r\n              <!--end header-->\r\n              <table class=\"table-inner\" width=\"95%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\">\r\n                <tbody><tr>\r\n                  <td style=\"text-align:center;vertical-align:top;font-size:0;\" bgcolor=\"#FFFFFF\" align=\"center\">\r\n                    <table width=\"90%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                      <tbody><tr>\r\n                        <td height=\"35\"><br></td>\r\n                      </tr>\r\n                      <!--logo-->\r\n                      <tr>\r\n                        <td style=\"vertical-align:top;font-size:0;\" align=\"center\">\r\n                          \r\n                        <br></td>\r\n                      </tr>\r\n                      <!--end logo-->\r\n                      <tr>\r\n                        <td height=\"40\"><br></td>\r\n                      </tr>\r\n                      <!--headline-->\r\n                      <tr>\r\n                        <td style=\"font-family: \'Open Sans\', Arial, sans-serif; font-size: 22px;color:#414a51;font-weight: bold;\" align=\"center\">Hello Unknown<br></td>\r\n                      </tr>\r\n                      <!--end headline-->\r\n                      <tr>\r\n                        <td style=\"text-align:center;vertical-align:top;font-size:0;\" align=\"center\">\r\n                          <table width=\"40\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                            <tbody><tr>\r\n                              <td style=\" border-bottom:3px solid #0087ff;\" height=\"20\"><br></td>\r\n                            </tr>\r\n                          </tbody></table>\r\n                        </td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td height=\"20\"><br></td>\r\n                      </tr>\r\n                      <!--content-->\r\n                      <tr>\r\n                        <td style=\"font-family: \'Open sans\', Arial, sans-serif; color:#7f8c8d; font-size:16px; line-height: 28px;\" align=\"left\"><div><br></div><div>Thanks For joining us. <br></div><div>Please use the below code to verify your email address.<br></div><div><br></div><div>Your email verification code is:<font size=\"6\"><b> 1625642361</b></font></div></td>\r\n                      </tr>\r\n                      <!--end content-->\r\n                      <tr>\r\n                        <td height=\"40\"><br></td>\r\n                      </tr>\r\n              \r\n                    </tbody></table>\r\n                  </td>\r\n                </tr>\r\n                <tr>\r\n                  <td style=\"border-bottom-left-radius:6px;border-bottom-right-radius:6px;\" height=\"45\" bgcolor=\"#f4f4f4\" align=\"center\">\r\n                    <table width=\"90%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                      <tbody><tr>\r\n                        <td height=\"10\"><br></td>\r\n                      </tr>\r\n                      <!--preference-->\r\n                      <tr>\r\n                        <td class=\"preference-link\" style=\"font-family: \'Open sans\', Arial, sans-serif; color:#95a5a6; font-size:14px;\" align=\"center\">\r\n                          © 2022 AppDevs . All Rights Reserved. \r\n                        </td>\r\n                      </tr>\r\n                      <!--end preference-->\r\n                      <tr>\r\n                        <td height=\"10\"><br></td>\r\n                      </tr>\r\n                    </tbody></table>\r\n                  </td>\r\n                </tr>\r\n              </tbody></table>\r\n            </td>\r\n          </tr>\r\n        </tbody></table>\r\n      </td>\r\n    </tr>\r\n    <tr>\r\n      <td height=\"60\"><br></td>\r\n    </tr>\r\n  </tbody></table></p>', '2023-01-11 02:57:03', '2023-01-11 02:57:03'),
(17, NULL, NULL, 'smtp', 'Haraz Alyawm noreply@appdevs.net', 'frranad1@gmail.com', 'Please verify your email address', '<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">\r\n  <!--[if !mso]><!-->\r\n  <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">\r\n  <!--<![endif]-->\r\n  <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">\r\n  <title></title>\r\n  <style type=\"text/css\">\r\n.ReadMsgBody { width: 100%; background-color: #ffffff; }\r\n.ExternalClass { width: 100%; background-color: #ffffff; }\r\n.ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div { line-height: 100%; }\r\nhtml { width: 100%; }\r\nbody { -webkit-text-size-adjust: none; -ms-text-size-adjust: none; margin: 0; padding: 0; }\r\ntable { border-spacing: 0; table-layout: fixed; margin: 0 auto;border-collapse: collapse; }\r\ntable table table { table-layout: auto; }\r\n.yshortcuts a { border-bottom: none !important; }\r\nimg:hover { opacity: 0.9 !important; }\r\na { color: #0087ff; text-decoration: none; }\r\n.textbutton a { font-family: \'open sans\', arial, sans-serif !important;}\r\n.btn-link a { color:#FFFFFF !important;}\r\n\r\n@media only screen and (max-width: 480px) {\r\nbody { width: auto !important; }\r\n*[class=\"table-inner\"] { width: 90% !important; text-align: center !important; }\r\n*[class=\"table-full\"] { width: 100% !important; text-align: center !important; }\r\n/* image */\r\nimg[class=\"img1\"] { width: 100% !important; height: auto !important; }\r\n}\r\n</style>\r\n\r\n\r\n\r\n  <p><table width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" bgcolor=\"#414a51\" align=\"center\">\r\n    <tbody><tr>\r\n      <td height=\"50\"><br></td>\r\n    </tr>\r\n    <tr>\r\n      <td style=\"text-align:center;vertical-align:top;font-size:0;\" align=\"center\">\r\n        <table cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n          <tbody><tr>\r\n            <td width=\"600\" align=\"center\">\r\n              <!--header-->\r\n              <table class=\"table-inner\" width=\"95%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                <tbody><tr>\r\n                  <td style=\"border-top-left-radius:6px; border-top-right-radius:6px;text-align:center;vertical-align:top;font-size:0;\" bgcolor=\"#0087ff\" align=\"center\">\r\n                    <table width=\"90%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                      <tbody><tr>\r\n                        <td height=\"20\"><br></td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td style=\"font-family: \'Open sans\', Arial, sans-serif; color:#FFFFFF; font-size:16px; font-weight: bold;\" align=\"center\"><div align=\"center\"><a href=\"https://premium.appdevs.net/xpay/admin/dashboard\" class=\"sidebar__main-logo\"><img src=\"https://premium.appdevs.net/xpay/assets/images/logoIcon/light_logo.png\" alt=\"image\"></a><br></div></td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td height=\"20\"><br></td>\r\n                      </tr>\r\n                    </tbody></table>\r\n                  </td>\r\n                </tr>\r\n              </tbody></table>\r\n              <!--end header-->\r\n              <table class=\"table-inner\" width=\"95%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\">\r\n                <tbody><tr>\r\n                  <td style=\"text-align:center;vertical-align:top;font-size:0;\" bgcolor=\"#FFFFFF\" align=\"center\">\r\n                    <table width=\"90%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                      <tbody><tr>\r\n                        <td height=\"35\"><br></td>\r\n                      </tr>\r\n                      <!--logo-->\r\n                      <tr>\r\n                        <td style=\"vertical-align:top;font-size:0;\" align=\"center\">\r\n                          \r\n                        <br></td>\r\n                      </tr>\r\n                      <!--end logo-->\r\n                      <tr>\r\n                        <td height=\"40\"><br></td>\r\n                      </tr>\r\n                      <!--headline-->\r\n                      <tr>\r\n                        <td style=\"font-family: \'Open Sans\', Arial, sans-serif; font-size: 22px;color:#414a51;font-weight: bold;\" align=\"center\">Hello Unknown<br></td>\r\n                      </tr>\r\n                      <!--end headline-->\r\n                      <tr>\r\n                        <td style=\"text-align:center;vertical-align:top;font-size:0;\" align=\"center\">\r\n                          <table width=\"40\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                            <tbody><tr>\r\n                              <td style=\" border-bottom:3px solid #0087ff;\" height=\"20\"><br></td>\r\n                            </tr>\r\n                          </tbody></table>\r\n                        </td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td height=\"20\"><br></td>\r\n                      </tr>\r\n                      <!--content-->\r\n                      <tr>\r\n                        <td style=\"font-family: \'Open sans\', Arial, sans-serif; color:#7f8c8d; font-size:16px; line-height: 28px;\" align=\"left\"><div><br></div><div>Thanks For joining us. <br></div><div>Please use the below code to verify your email address.<br></div><div><br></div><div>Your email verification code is:<font size=\"6\"><b> 1451645804</b></font></div></td>\r\n                      </tr>\r\n                      <!--end content-->\r\n                      <tr>\r\n                        <td height=\"40\"><br></td>\r\n                      </tr>\r\n              \r\n                    </tbody></table>\r\n                  </td>\r\n                </tr>\r\n                <tr>\r\n                  <td style=\"border-bottom-left-radius:6px;border-bottom-right-radius:6px;\" height=\"45\" bgcolor=\"#f4f4f4\" align=\"center\">\r\n                    <table width=\"90%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                      <tbody><tr>\r\n                        <td height=\"10\"><br></td>\r\n                      </tr>\r\n                      <!--preference-->\r\n                      <tr>\r\n                        <td class=\"preference-link\" style=\"font-family: \'Open sans\', Arial, sans-serif; color:#95a5a6; font-size:14px;\" align=\"center\">\r\n                          © 2022 AppDevs . All Rights Reserved. \r\n                        </td>\r\n                      </tr>\r\n                      <!--end preference-->\r\n                      <tr>\r\n                        <td height=\"10\"><br></td>\r\n                      </tr>\r\n                    </tbody></table>\r\n                  </td>\r\n                </tr>\r\n              </tbody></table>\r\n            </td>\r\n          </tr>\r\n        </tbody></table>\r\n      </td>\r\n    </tr>\r\n    <tr>\r\n      <td height=\"60\"><br></td>\r\n    </tr>\r\n  </tbody></table></p>', '2023-01-11 03:00:20', '2023-01-11 03:00:20'),
(18, NULL, NULL, 'smtp', 'Haraz Alyawm noreply@appdevs.net', 'frranad1@gmail.com', 'Please verify your email address', '<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">\r\n  <!--[if !mso]><!-->\r\n  <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">\r\n  <!--<![endif]-->\r\n  <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">\r\n  <title></title>\r\n  <style type=\"text/css\">\r\n.ReadMsgBody { width: 100%; background-color: #ffffff; }\r\n.ExternalClass { width: 100%; background-color: #ffffff; }\r\n.ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div { line-height: 100%; }\r\nhtml { width: 100%; }\r\nbody { -webkit-text-size-adjust: none; -ms-text-size-adjust: none; margin: 0; padding: 0; }\r\ntable { border-spacing: 0; table-layout: fixed; margin: 0 auto;border-collapse: collapse; }\r\ntable table table { table-layout: auto; }\r\n.yshortcuts a { border-bottom: none !important; }\r\nimg:hover { opacity: 0.9 !important; }\r\na { color: #0087ff; text-decoration: none; }\r\n.textbutton a { font-family: \'open sans\', arial, sans-serif !important;}\r\n.btn-link a { color:#FFFFFF !important;}\r\n\r\n@media only screen and (max-width: 480px) {\r\nbody { width: auto !important; }\r\n*[class=\"table-inner\"] { width: 90% !important; text-align: center !important; }\r\n*[class=\"table-full\"] { width: 100% !important; text-align: center !important; }\r\n/* image */\r\nimg[class=\"img1\"] { width: 100% !important; height: auto !important; }\r\n}\r\n</style>\r\n\r\n\r\n\r\n  <p><table width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" bgcolor=\"#414a51\" align=\"center\">\r\n    <tbody><tr>\r\n      <td height=\"50\"><br></td>\r\n    </tr>\r\n    <tr>\r\n      <td style=\"text-align:center;vertical-align:top;font-size:0;\" align=\"center\">\r\n        <table cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n          <tbody><tr>\r\n            <td width=\"600\" align=\"center\">\r\n              <!--header-->\r\n              <table class=\"table-inner\" width=\"95%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                <tbody><tr>\r\n                  <td style=\"border-top-left-radius:6px; border-top-right-radius:6px;text-align:center;vertical-align:top;font-size:0;\" bgcolor=\"#0087ff\" align=\"center\">\r\n                    <table width=\"90%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                      <tbody><tr>\r\n                        <td height=\"20\"><br></td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td style=\"font-family: \'Open sans\', Arial, sans-serif; color:#FFFFFF; font-size:16px; font-weight: bold;\" align=\"center\"><div align=\"center\"><a href=\"https://premium.appdevs.net/xpay/admin/dashboard\" class=\"sidebar__main-logo\"><img src=\"https://premium.appdevs.net/xpay/assets/images/logoIcon/light_logo.png\" alt=\"image\"></a><br></div></td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td height=\"20\"><br></td>\r\n                      </tr>\r\n                    </tbody></table>\r\n                  </td>\r\n                </tr>\r\n              </tbody></table>\r\n              <!--end header-->\r\n              <table class=\"table-inner\" width=\"95%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\">\r\n                <tbody><tr>\r\n                  <td style=\"text-align:center;vertical-align:top;font-size:0;\" bgcolor=\"#FFFFFF\" align=\"center\">\r\n                    <table width=\"90%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                      <tbody><tr>\r\n                        <td height=\"35\"><br></td>\r\n                      </tr>\r\n                      <!--logo-->\r\n                      <tr>\r\n                        <td style=\"vertical-align:top;font-size:0;\" align=\"center\">\r\n                          \r\n                        <br></td>\r\n                      </tr>\r\n                      <!--end logo-->\r\n                      <tr>\r\n                        <td height=\"40\"><br></td>\r\n                      </tr>\r\n                      <!--headline-->\r\n                      <tr>\r\n                        <td style=\"font-family: \'Open Sans\', Arial, sans-serif; font-size: 22px;color:#414a51;font-weight: bold;\" align=\"center\">Hello Unknown<br></td>\r\n                      </tr>\r\n                      <!--end headline-->\r\n                      <tr>\r\n                        <td style=\"text-align:center;vertical-align:top;font-size:0;\" align=\"center\">\r\n                          <table width=\"40\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                            <tbody><tr>\r\n                              <td style=\" border-bottom:3px solid #0087ff;\" height=\"20\"><br></td>\r\n                            </tr>\r\n                          </tbody></table>\r\n                        </td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td height=\"20\"><br></td>\r\n                      </tr>\r\n                      <!--content-->\r\n                      <tr>\r\n                        <td style=\"font-family: \'Open sans\', Arial, sans-serif; color:#7f8c8d; font-size:16px; line-height: 28px;\" align=\"left\"><div><br></div><div>Thanks For joining us. <br></div><div>Please use the below code to verify your email address.<br></div><div><br></div><div>Your email verification code is:<font size=\"6\"><b> 197713998</b></font></div></td>\r\n                      </tr>\r\n                      <!--end content-->\r\n                      <tr>\r\n                        <td height=\"40\"><br></td>\r\n                      </tr>\r\n              \r\n                    </tbody></table>\r\n                  </td>\r\n                </tr>\r\n                <tr>\r\n                  <td style=\"border-bottom-left-radius:6px;border-bottom-right-radius:6px;\" height=\"45\" bgcolor=\"#f4f4f4\" align=\"center\">\r\n                    <table width=\"90%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                      <tbody><tr>\r\n                        <td height=\"10\"><br></td>\r\n                      </tr>\r\n                      <!--preference-->\r\n                      <tr>\r\n                        <td class=\"preference-link\" style=\"font-family: \'Open sans\', Arial, sans-serif; color:#95a5a6; font-size:14px;\" align=\"center\">\r\n                          © 2022 AppDevs . All Rights Reserved. \r\n                        </td>\r\n                      </tr>\r\n                      <!--end preference-->\r\n                      <tr>\r\n                        <td height=\"10\"><br></td>\r\n                      </tr>\r\n                    </tbody></table>\r\n                  </td>\r\n                </tr>\r\n              </tbody></table>\r\n            </td>\r\n          </tr>\r\n        </tbody></table>\r\n      </td>\r\n    </tr>\r\n    <tr>\r\n      <td height=\"60\"><br></td>\r\n    </tr>\r\n  </tbody></table></p>', '2023-01-11 05:28:05', '2023-01-11 05:28:05');
INSERT INTO `email_logs` (`id`, `advertiser_id`, `user_type`, `mail_sender`, `email_from`, `email_to`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(19, NULL, NULL, 'smtp', 'Haraz Alyawm noreply@appdevs.net', 'frranad1@gmail.com', 'Please verify your email address', '<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">\r\n  <!--[if !mso]><!-->\r\n  <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">\r\n  <!--<![endif]-->\r\n  <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">\r\n  <title></title>\r\n  <style type=\"text/css\">\r\n.ReadMsgBody { width: 100%; background-color: #ffffff; }\r\n.ExternalClass { width: 100%; background-color: #ffffff; }\r\n.ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div { line-height: 100%; }\r\nhtml { width: 100%; }\r\nbody { -webkit-text-size-adjust: none; -ms-text-size-adjust: none; margin: 0; padding: 0; }\r\ntable { border-spacing: 0; table-layout: fixed; margin: 0 auto;border-collapse: collapse; }\r\ntable table table { table-layout: auto; }\r\n.yshortcuts a { border-bottom: none !important; }\r\nimg:hover { opacity: 0.9 !important; }\r\na { color: #0087ff; text-decoration: none; }\r\n.textbutton a { font-family: \'open sans\', arial, sans-serif !important;}\r\n.btn-link a { color:#FFFFFF !important;}\r\n\r\n@media only screen and (max-width: 480px) {\r\nbody { width: auto !important; }\r\n*[class=\"table-inner\"] { width: 90% !important; text-align: center !important; }\r\n*[class=\"table-full\"] { width: 100% !important; text-align: center !important; }\r\n/* image */\r\nimg[class=\"img1\"] { width: 100% !important; height: auto !important; }\r\n}\r\n</style>\r\n\r\n\r\n\r\n  <p><table width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" bgcolor=\"#414a51\" align=\"center\">\r\n    <tbody><tr>\r\n      <td height=\"50\"><br></td>\r\n    </tr>\r\n    <tr>\r\n      <td style=\"text-align:center;vertical-align:top;font-size:0;\" align=\"center\">\r\n        <table cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n          <tbody><tr>\r\n            <td width=\"600\" align=\"center\">\r\n              <!--header-->\r\n              <table class=\"table-inner\" width=\"95%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                <tbody><tr>\r\n                  <td style=\"border-top-left-radius:6px; border-top-right-radius:6px;text-align:center;vertical-align:top;font-size:0;\" bgcolor=\"#0087ff\" align=\"center\">\r\n                    <table width=\"90%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                      <tbody><tr>\r\n                        <td height=\"20\"><br></td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td style=\"font-family: \'Open sans\', Arial, sans-serif; color:#FFFFFF; font-size:16px; font-weight: bold;\" align=\"center\"><div align=\"center\"><a href=\"https://premium.appdevs.net/xpay/admin/dashboard\" class=\"sidebar__main-logo\"><img src=\"https://premium.appdevs.net/xpay/assets/images/logoIcon/light_logo.png\" alt=\"image\"></a><br></div></td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td height=\"20\"><br></td>\r\n                      </tr>\r\n                    </tbody></table>\r\n                  </td>\r\n                </tr>\r\n              </tbody></table>\r\n              <!--end header-->\r\n              <table class=\"table-inner\" width=\"95%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\">\r\n                <tbody><tr>\r\n                  <td style=\"text-align:center;vertical-align:top;font-size:0;\" bgcolor=\"#FFFFFF\" align=\"center\">\r\n                    <table width=\"90%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                      <tbody><tr>\r\n                        <td height=\"35\"><br></td>\r\n                      </tr>\r\n                      <!--logo-->\r\n                      <tr>\r\n                        <td style=\"vertical-align:top;font-size:0;\" align=\"center\">\r\n                          \r\n                        <br></td>\r\n                      </tr>\r\n                      <!--end logo-->\r\n                      <tr>\r\n                        <td height=\"40\"><br></td>\r\n                      </tr>\r\n                      <!--headline-->\r\n                      <tr>\r\n                        <td style=\"font-family: \'Open Sans\', Arial, sans-serif; font-size: 22px;color:#414a51;font-weight: bold;\" align=\"center\">Hello Unknown<br></td>\r\n                      </tr>\r\n                      <!--end headline-->\r\n                      <tr>\r\n                        <td style=\"text-align:center;vertical-align:top;font-size:0;\" align=\"center\">\r\n                          <table width=\"40\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                            <tbody><tr>\r\n                              <td style=\" border-bottom:3px solid #0087ff;\" height=\"20\"><br></td>\r\n                            </tr>\r\n                          </tbody></table>\r\n                        </td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td height=\"20\"><br></td>\r\n                      </tr>\r\n                      <!--content-->\r\n                      <tr>\r\n                        <td style=\"font-family: \'Open sans\', Arial, sans-serif; color:#7f8c8d; font-size:16px; line-height: 28px;\" align=\"left\"><div><br></div><div>Thanks For joining us. <br></div><div>Please use the below code to verify your email address.<br></div><div><br></div><div>Your email verification code is:<font size=\"6\"><b> 2102785078</b></font></div></td>\r\n                      </tr>\r\n                      <!--end content-->\r\n                      <tr>\r\n                        <td height=\"40\"><br></td>\r\n                      </tr>\r\n              \r\n                    </tbody></table>\r\n                  </td>\r\n                </tr>\r\n                <tr>\r\n                  <td style=\"border-bottom-left-radius:6px;border-bottom-right-radius:6px;\" height=\"45\" bgcolor=\"#f4f4f4\" align=\"center\">\r\n                    <table width=\"90%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                      <tbody><tr>\r\n                        <td height=\"10\"><br></td>\r\n                      </tr>\r\n                      <!--preference-->\r\n                      <tr>\r\n                        <td class=\"preference-link\" style=\"font-family: \'Open sans\', Arial, sans-serif; color:#95a5a6; font-size:14px;\" align=\"center\">\r\n                          © 2022 AppDevs . All Rights Reserved. \r\n                        </td>\r\n                      </tr>\r\n                      <!--end preference-->\r\n                      <tr>\r\n                        <td height=\"10\"><br></td>\r\n                      </tr>\r\n                    </tbody></table>\r\n                  </td>\r\n                </tr>\r\n              </tbody></table>\r\n            </td>\r\n          </tr>\r\n        </tbody></table>\r\n      </td>\r\n    </tr>\r\n    <tr>\r\n      <td height=\"60\"><br></td>\r\n    </tr>\r\n  </tbody></table></p>', '2023-01-11 06:00:30', '2023-01-11 06:00:30'),
(20, NULL, NULL, 'smtp', 'Haraz Alyawm noreply@appdevs.net', 'frranad1@gmail.com', 'Please verify your email address', '<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">\r\n  <!--[if !mso]><!-->\r\n  <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">\r\n  <!--<![endif]-->\r\n  <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">\r\n  <title></title>\r\n  <style type=\"text/css\">\r\n.ReadMsgBody { width: 100%; background-color: #ffffff; }\r\n.ExternalClass { width: 100%; background-color: #ffffff; }\r\n.ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div { line-height: 100%; }\r\nhtml { width: 100%; }\r\nbody { -webkit-text-size-adjust: none; -ms-text-size-adjust: none; margin: 0; padding: 0; }\r\ntable { border-spacing: 0; table-layout: fixed; margin: 0 auto;border-collapse: collapse; }\r\ntable table table { table-layout: auto; }\r\n.yshortcuts a { border-bottom: none !important; }\r\nimg:hover { opacity: 0.9 !important; }\r\na { color: #0087ff; text-decoration: none; }\r\n.textbutton a { font-family: \'open sans\', arial, sans-serif !important;}\r\n.btn-link a { color:#FFFFFF !important;}\r\n\r\n@media only screen and (max-width: 480px) {\r\nbody { width: auto !important; }\r\n*[class=\"table-inner\"] { width: 90% !important; text-align: center !important; }\r\n*[class=\"table-full\"] { width: 100% !important; text-align: center !important; }\r\n/* image */\r\nimg[class=\"img1\"] { width: 100% !important; height: auto !important; }\r\n}\r\n</style>\r\n\r\n\r\n\r\n  <p><table width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" bgcolor=\"#414a51\" align=\"center\">\r\n    <tbody><tr>\r\n      <td height=\"50\"><br></td>\r\n    </tr>\r\n    <tr>\r\n      <td style=\"text-align:center;vertical-align:top;font-size:0;\" align=\"center\">\r\n        <table cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n          <tbody><tr>\r\n            <td width=\"600\" align=\"center\">\r\n              <!--header-->\r\n              <table class=\"table-inner\" width=\"95%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                <tbody><tr>\r\n                  <td style=\"border-top-left-radius:6px; border-top-right-radius:6px;text-align:center;vertical-align:top;font-size:0;\" bgcolor=\"#0087ff\" align=\"center\">\r\n                    <table width=\"90%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                      <tbody><tr>\r\n                        <td height=\"20\"><br></td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td style=\"font-family: \'Open sans\', Arial, sans-serif; color:#FFFFFF; font-size:16px; font-weight: bold;\" align=\"center\"><div align=\"center\"><a href=\"https://premium.appdevs.net/xpay/admin/dashboard\" class=\"sidebar__main-logo\"><img src=\"https://premium.appdevs.net/xpay/assets/images/logoIcon/light_logo.png\" alt=\"image\"></a><br></div></td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td height=\"20\"><br></td>\r\n                      </tr>\r\n                    </tbody></table>\r\n                  </td>\r\n                </tr>\r\n              </tbody></table>\r\n              <!--end header-->\r\n              <table class=\"table-inner\" width=\"95%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\">\r\n                <tbody><tr>\r\n                  <td style=\"text-align:center;vertical-align:top;font-size:0;\" bgcolor=\"#FFFFFF\" align=\"center\">\r\n                    <table width=\"90%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                      <tbody><tr>\r\n                        <td height=\"35\"><br></td>\r\n                      </tr>\r\n                      <!--logo-->\r\n                      <tr>\r\n                        <td style=\"vertical-align:top;font-size:0;\" align=\"center\">\r\n                          \r\n                        <br></td>\r\n                      </tr>\r\n                      <!--end logo-->\r\n                      <tr>\r\n                        <td height=\"40\"><br></td>\r\n                      </tr>\r\n                      <!--headline-->\r\n                      <tr>\r\n                        <td style=\"font-family: \'Open Sans\', Arial, sans-serif; font-size: 22px;color:#414a51;font-weight: bold;\" align=\"center\">Hello Unknown<br></td>\r\n                      </tr>\r\n                      <!--end headline-->\r\n                      <tr>\r\n                        <td style=\"text-align:center;vertical-align:top;font-size:0;\" align=\"center\">\r\n                          <table width=\"40\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                            <tbody><tr>\r\n                              <td style=\" border-bottom:3px solid #0087ff;\" height=\"20\"><br></td>\r\n                            </tr>\r\n                          </tbody></table>\r\n                        </td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td height=\"20\"><br></td>\r\n                      </tr>\r\n                      <!--content-->\r\n                      <tr>\r\n                        <td style=\"font-family: \'Open sans\', Arial, sans-serif; color:#7f8c8d; font-size:16px; line-height: 28px;\" align=\"left\"><div><br></div><div>Thanks For joining us. <br></div><div>Please use the below code to verify your email address.<br></div><div><br></div><div>Your email verification code is:<font size=\"6\"><b> 1247185014</b></font></div></td>\r\n                      </tr>\r\n                      <!--end content-->\r\n                      <tr>\r\n                        <td height=\"40\"><br></td>\r\n                      </tr>\r\n              \r\n                    </tbody></table>\r\n                  </td>\r\n                </tr>\r\n                <tr>\r\n                  <td style=\"border-bottom-left-radius:6px;border-bottom-right-radius:6px;\" height=\"45\" bgcolor=\"#f4f4f4\" align=\"center\">\r\n                    <table width=\"90%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                      <tbody><tr>\r\n                        <td height=\"10\"><br></td>\r\n                      </tr>\r\n                      <!--preference-->\r\n                      <tr>\r\n                        <td class=\"preference-link\" style=\"font-family: \'Open sans\', Arial, sans-serif; color:#95a5a6; font-size:14px;\" align=\"center\">\r\n                          © 2022 AppDevs . All Rights Reserved. \r\n                        </td>\r\n                      </tr>\r\n                      <!--end preference-->\r\n                      <tr>\r\n                        <td height=\"10\"><br></td>\r\n                      </tr>\r\n                    </tbody></table>\r\n                  </td>\r\n                </tr>\r\n              </tbody></table>\r\n            </td>\r\n          </tr>\r\n        </tbody></table>\r\n      </td>\r\n    </tr>\r\n    <tr>\r\n      <td height=\"60\"><br></td>\r\n    </tr>\r\n  </tbody></table></p>', '2023-01-11 06:38:12', '2023-01-11 06:38:12'),
(21, NULL, NULL, 'smtp', 'Haraz Alyawm noreply@appdevs.net', 'asd', 'Please verify your email address', '<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">\r\n  <!--[if !mso]><!-->\r\n  <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">\r\n  <!--<![endif]-->\r\n  <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">\r\n  <title></title>\r\n  <style type=\"text/css\">\r\n.ReadMsgBody { width: 100%; background-color: #ffffff; }\r\n.ExternalClass { width: 100%; background-color: #ffffff; }\r\n.ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div { line-height: 100%; }\r\nhtml { width: 100%; }\r\nbody { -webkit-text-size-adjust: none; -ms-text-size-adjust: none; margin: 0; padding: 0; }\r\ntable { border-spacing: 0; table-layout: fixed; margin: 0 auto;border-collapse: collapse; }\r\ntable table table { table-layout: auto; }\r\n.yshortcuts a { border-bottom: none !important; }\r\nimg:hover { opacity: 0.9 !important; }\r\na { color: #0087ff; text-decoration: none; }\r\n.textbutton a { font-family: \'open sans\', arial, sans-serif !important;}\r\n.btn-link a { color:#FFFFFF !important;}\r\n\r\n@media only screen and (max-width: 480px) {\r\nbody { width: auto !important; }\r\n*[class=\"table-inner\"] { width: 90% !important; text-align: center !important; }\r\n*[class=\"table-full\"] { width: 100% !important; text-align: center !important; }\r\n/* image */\r\nimg[class=\"img1\"] { width: 100% !important; height: auto !important; }\r\n}\r\n</style>\r\n\r\n\r\n\r\n  <p><table width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" bgcolor=\"#414a51\" align=\"center\">\r\n    <tbody><tr>\r\n      <td height=\"50\"><br></td>\r\n    </tr>\r\n    <tr>\r\n      <td style=\"text-align:center;vertical-align:top;font-size:0;\" align=\"center\">\r\n        <table cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n          <tbody><tr>\r\n            <td width=\"600\" align=\"center\">\r\n              <!--header-->\r\n              <table class=\"table-inner\" width=\"95%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                <tbody><tr>\r\n                  <td style=\"border-top-left-radius:6px; border-top-right-radius:6px;text-align:center;vertical-align:top;font-size:0;\" bgcolor=\"#0087ff\" align=\"center\">\r\n                    <table width=\"90%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                      <tbody><tr>\r\n                        <td height=\"20\"><br></td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td style=\"font-family: \'Open sans\', Arial, sans-serif; color:#FFFFFF; font-size:16px; font-weight: bold;\" align=\"center\"><div align=\"center\"><a href=\"https://premium.appdevs.net/xpay/admin/dashboard\" class=\"sidebar__main-logo\"><img src=\"https://premium.appdevs.net/xpay/assets/images/logoIcon/light_logo.png\" alt=\"image\"></a><br></div></td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td height=\"20\"><br></td>\r\n                      </tr>\r\n                    </tbody></table>\r\n                  </td>\r\n                </tr>\r\n              </tbody></table>\r\n              <!--end header-->\r\n              <table class=\"table-inner\" width=\"95%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\">\r\n                <tbody><tr>\r\n                  <td style=\"text-align:center;vertical-align:top;font-size:0;\" bgcolor=\"#FFFFFF\" align=\"center\">\r\n                    <table width=\"90%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                      <tbody><tr>\r\n                        <td height=\"35\"><br></td>\r\n                      </tr>\r\n                      <!--logo-->\r\n                      <tr>\r\n                        <td style=\"vertical-align:top;font-size:0;\" align=\"center\">\r\n                          \r\n                        <br></td>\r\n                      </tr>\r\n                      <!--end logo-->\r\n                      <tr>\r\n                        <td height=\"40\"><br></td>\r\n                      </tr>\r\n                      <!--headline-->\r\n                      <tr>\r\n                        <td style=\"font-family: \'Open Sans\', Arial, sans-serif; font-size: 22px;color:#414a51;font-weight: bold;\" align=\"center\">Hello Unknown<br></td>\r\n                      </tr>\r\n                      <!--end headline-->\r\n                      <tr>\r\n                        <td style=\"text-align:center;vertical-align:top;font-size:0;\" align=\"center\">\r\n                          <table width=\"40\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                            <tbody><tr>\r\n                              <td style=\" border-bottom:3px solid #0087ff;\" height=\"20\"><br></td>\r\n                            </tr>\r\n                          </tbody></table>\r\n                        </td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td height=\"20\"><br></td>\r\n                      </tr>\r\n                      <!--content-->\r\n                      <tr>\r\n                        <td style=\"font-family: \'Open sans\', Arial, sans-serif; color:#7f8c8d; font-size:16px; line-height: 28px;\" align=\"left\"><div><br></div><div>Thanks For joining us. <br></div><div>Please use the below code to verify your email address.<br></div><div><br></div><div>Your email verification code is:<font size=\"6\"><b> 521272087</b></font></div></td>\r\n                      </tr>\r\n                      <!--end content-->\r\n                      <tr>\r\n                        <td height=\"40\"><br></td>\r\n                      </tr>\r\n              \r\n                    </tbody></table>\r\n                  </td>\r\n                </tr>\r\n                <tr>\r\n                  <td style=\"border-bottom-left-radius:6px;border-bottom-right-radius:6px;\" height=\"45\" bgcolor=\"#f4f4f4\" align=\"center\">\r\n                    <table width=\"90%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                      <tbody><tr>\r\n                        <td height=\"10\"><br></td>\r\n                      </tr>\r\n                      <!--preference-->\r\n                      <tr>\r\n                        <td class=\"preference-link\" style=\"font-family: \'Open sans\', Arial, sans-serif; color:#95a5a6; font-size:14px;\" align=\"center\">\r\n                          © 2022 AppDevs . All Rights Reserved. \r\n                        </td>\r\n                      </tr>\r\n                      <!--end preference-->\r\n                      <tr>\r\n                        <td height=\"10\"><br></td>\r\n                      </tr>\r\n                    </tbody></table>\r\n                  </td>\r\n                </tr>\r\n              </tbody></table>\r\n            </td>\r\n          </tr>\r\n        </tbody></table>\r\n      </td>\r\n    </tr>\r\n    <tr>\r\n      <td height=\"60\"><br></td>\r\n    </tr>\r\n  </tbody></table></p>', '2023-01-11 22:55:52', '2023-01-11 22:55:52'),
(22, NULL, NULL, 'smtp', 'Haraz Alyawm noreply@appdevs.net', 'frranad1@gmail.com', 'Please verify your email address', '<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">\r\n  <!--[if !mso]><!-->\r\n  <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">\r\n  <!--<![endif]-->\r\n  <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">\r\n  <title></title>\r\n  <style type=\"text/css\">\r\n.ReadMsgBody { width: 100%; background-color: #ffffff; }\r\n.ExternalClass { width: 100%; background-color: #ffffff; }\r\n.ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div { line-height: 100%; }\r\nhtml { width: 100%; }\r\nbody { -webkit-text-size-adjust: none; -ms-text-size-adjust: none; margin: 0; padding: 0; }\r\ntable { border-spacing: 0; table-layout: fixed; margin: 0 auto;border-collapse: collapse; }\r\ntable table table { table-layout: auto; }\r\n.yshortcuts a { border-bottom: none !important; }\r\nimg:hover { opacity: 0.9 !important; }\r\na { color: #0087ff; text-decoration: none; }\r\n.textbutton a { font-family: \'open sans\', arial, sans-serif !important;}\r\n.btn-link a { color:#FFFFFF !important;}\r\n\r\n@media only screen and (max-width: 480px) {\r\nbody { width: auto !important; }\r\n*[class=\"table-inner\"] { width: 90% !important; text-align: center !important; }\r\n*[class=\"table-full\"] { width: 100% !important; text-align: center !important; }\r\n/* image */\r\nimg[class=\"img1\"] { width: 100% !important; height: auto !important; }\r\n}\r\n</style>\r\n\r\n\r\n\r\n  <p><table width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" bgcolor=\"#414a51\" align=\"center\">\r\n    <tbody><tr>\r\n      <td height=\"50\"><br></td>\r\n    </tr>\r\n    <tr>\r\n      <td style=\"text-align:center;vertical-align:top;font-size:0;\" align=\"center\">\r\n        <table cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n          <tbody><tr>\r\n            <td width=\"600\" align=\"center\">\r\n              <!--header-->\r\n              <table class=\"table-inner\" width=\"95%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                <tbody><tr>\r\n                  <td style=\"border-top-left-radius:6px; border-top-right-radius:6px;text-align:center;vertical-align:top;font-size:0;\" bgcolor=\"#0087ff\" align=\"center\">\r\n                    <table width=\"90%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                      <tbody><tr>\r\n                        <td height=\"20\"><br></td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td style=\"font-family: \'Open sans\', Arial, sans-serif; color:#FFFFFF; font-size:16px; font-weight: bold;\" align=\"center\"><div align=\"center\"><a href=\"https://premium.appdevs.net/xpay/admin/dashboard\" class=\"sidebar__main-logo\"><img src=\"https://premium.appdevs.net/xpay/assets/images/logoIcon/light_logo.png\" alt=\"image\"></a><br></div></td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td height=\"20\"><br></td>\r\n                      </tr>\r\n                    </tbody></table>\r\n                  </td>\r\n                </tr>\r\n              </tbody></table>\r\n              <!--end header-->\r\n              <table class=\"table-inner\" width=\"95%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\">\r\n                <tbody><tr>\r\n                  <td style=\"text-align:center;vertical-align:top;font-size:0;\" bgcolor=\"#FFFFFF\" align=\"center\">\r\n                    <table width=\"90%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                      <tbody><tr>\r\n                        <td height=\"35\"><br></td>\r\n                      </tr>\r\n                      <!--logo-->\r\n                      <tr>\r\n                        <td style=\"vertical-align:top;font-size:0;\" align=\"center\">\r\n                          \r\n                        <br></td>\r\n                      </tr>\r\n                      <!--end logo-->\r\n                      <tr>\r\n                        <td height=\"40\"><br></td>\r\n                      </tr>\r\n                      <!--headline-->\r\n                      <tr>\r\n                        <td style=\"font-family: \'Open Sans\', Arial, sans-serif; font-size: 22px;color:#414a51;font-weight: bold;\" align=\"center\">Hello Unknown<br></td>\r\n                      </tr>\r\n                      <!--end headline-->\r\n                      <tr>\r\n                        <td style=\"text-align:center;vertical-align:top;font-size:0;\" align=\"center\">\r\n                          <table width=\"40\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                            <tbody><tr>\r\n                              <td style=\" border-bottom:3px solid #0087ff;\" height=\"20\"><br></td>\r\n                            </tr>\r\n                          </tbody></table>\r\n                        </td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td height=\"20\"><br></td>\r\n                      </tr>\r\n                      <!--content-->\r\n                      <tr>\r\n                        <td style=\"font-family: \'Open sans\', Arial, sans-serif; color:#7f8c8d; font-size:16px; line-height: 28px;\" align=\"left\"><div><br></div><div>Thanks For joining us. <br></div><div>Please use the below code to verify your email address.<br></div><div><br></div><div>Your email verification code is:<font size=\"6\"><b> 1337667377</b></font></div></td>\r\n                      </tr>\r\n                      <!--end content-->\r\n                      <tr>\r\n                        <td height=\"40\"><br></td>\r\n                      </tr>\r\n              \r\n                    </tbody></table>\r\n                  </td>\r\n                </tr>\r\n                <tr>\r\n                  <td style=\"border-bottom-left-radius:6px;border-bottom-right-radius:6px;\" height=\"45\" bgcolor=\"#f4f4f4\" align=\"center\">\r\n                    <table width=\"90%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                      <tbody><tr>\r\n                        <td height=\"10\"><br></td>\r\n                      </tr>\r\n                      <!--preference-->\r\n                      <tr>\r\n                        <td class=\"preference-link\" style=\"font-family: \'Open sans\', Arial, sans-serif; color:#95a5a6; font-size:14px;\" align=\"center\">\r\n                          © 2022 AppDevs . All Rights Reserved. \r\n                        </td>\r\n                      </tr>\r\n                      <!--end preference-->\r\n                      <tr>\r\n                        <td height=\"10\"><br></td>\r\n                      </tr>\r\n                    </tbody></table>\r\n                  </td>\r\n                </tr>\r\n              </tbody></table>\r\n            </td>\r\n          </tr>\r\n        </tbody></table>\r\n      </td>\r\n    </tr>\r\n    <tr>\r\n      <td height=\"60\"><br></td>\r\n    </tr>\r\n  </tbody></table></p>', '2023-01-12 00:02:57', '2023-01-12 00:02:57'),
(23, NULL, NULL, 'smtp', 'Haraz Alyawm noreply@appdevs.net', 'frranad1@gmail.com', 'Please verify your email address', '<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">\r\n  <!--[if !mso]><!-->\r\n  <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">\r\n  <!--<![endif]-->\r\n  <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">\r\n  <title></title>\r\n  <style type=\"text/css\">\r\n.ReadMsgBody { width: 100%; background-color: #ffffff; }\r\n.ExternalClass { width: 100%; background-color: #ffffff; }\r\n.ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div { line-height: 100%; }\r\nhtml { width: 100%; }\r\nbody { -webkit-text-size-adjust: none; -ms-text-size-adjust: none; margin: 0; padding: 0; }\r\ntable { border-spacing: 0; table-layout: fixed; margin: 0 auto;border-collapse: collapse; }\r\ntable table table { table-layout: auto; }\r\n.yshortcuts a { border-bottom: none !important; }\r\nimg:hover { opacity: 0.9 !important; }\r\na { color: #0087ff; text-decoration: none; }\r\n.textbutton a { font-family: \'open sans\', arial, sans-serif !important;}\r\n.btn-link a { color:#FFFFFF !important;}\r\n\r\n@media only screen and (max-width: 480px) {\r\nbody { width: auto !important; }\r\n*[class=\"table-inner\"] { width: 90% !important; text-align: center !important; }\r\n*[class=\"table-full\"] { width: 100% !important; text-align: center !important; }\r\n/* image */\r\nimg[class=\"img1\"] { width: 100% !important; height: auto !important; }\r\n}\r\n</style>\r\n\r\n\r\n\r\n  <p><table width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" bgcolor=\"#414a51\" align=\"center\">\r\n    <tbody><tr>\r\n      <td height=\"50\"><br></td>\r\n    </tr>\r\n    <tr>\r\n      <td style=\"text-align:center;vertical-align:top;font-size:0;\" align=\"center\">\r\n        <table cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n          <tbody><tr>\r\n            <td width=\"600\" align=\"center\">\r\n              <!--header-->\r\n              <table class=\"table-inner\" width=\"95%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                <tbody><tr>\r\n                  <td style=\"border-top-left-radius:6px; border-top-right-radius:6px;text-align:center;vertical-align:top;font-size:0;\" bgcolor=\"#0087ff\" align=\"center\">\r\n                    <table width=\"90%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                      <tbody><tr>\r\n                        <td height=\"20\"><br></td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td style=\"font-family: \'Open sans\', Arial, sans-serif; color:#FFFFFF; font-size:16px; font-weight: bold;\" align=\"center\"><div align=\"center\"><a href=\"https://premium.appdevs.net/xpay/admin/dashboard\" class=\"sidebar__main-logo\"><img src=\"https://premium.appdevs.net/xpay/assets/images/logoIcon/light_logo.png\" alt=\"image\"></a><br></div></td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td height=\"20\"><br></td>\r\n                      </tr>\r\n                    </tbody></table>\r\n                  </td>\r\n                </tr>\r\n              </tbody></table>\r\n              <!--end header-->\r\n              <table class=\"table-inner\" width=\"95%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\">\r\n                <tbody><tr>\r\n                  <td style=\"text-align:center;vertical-align:top;font-size:0;\" bgcolor=\"#FFFFFF\" align=\"center\">\r\n                    <table width=\"90%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                      <tbody><tr>\r\n                        <td height=\"35\"><br></td>\r\n                      </tr>\r\n                      <!--logo-->\r\n                      <tr>\r\n                        <td style=\"vertical-align:top;font-size:0;\" align=\"center\">\r\n                          \r\n                        <br></td>\r\n                      </tr>\r\n                      <!--end logo-->\r\n                      <tr>\r\n                        <td height=\"40\"><br></td>\r\n                      </tr>\r\n                      <!--headline-->\r\n                      <tr>\r\n                        <td style=\"font-family: \'Open Sans\', Arial, sans-serif; font-size: 22px;color:#414a51;font-weight: bold;\" align=\"center\">Hello Unknown<br></td>\r\n                      </tr>\r\n                      <!--end headline-->\r\n                      <tr>\r\n                        <td style=\"text-align:center;vertical-align:top;font-size:0;\" align=\"center\">\r\n                          <table width=\"40\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                            <tbody><tr>\r\n                              <td style=\" border-bottom:3px solid #0087ff;\" height=\"20\"><br></td>\r\n                            </tr>\r\n                          </tbody></table>\r\n                        </td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td height=\"20\"><br></td>\r\n                      </tr>\r\n                      <!--content-->\r\n                      <tr>\r\n                        <td style=\"font-family: \'Open sans\', Arial, sans-serif; color:#7f8c8d; font-size:16px; line-height: 28px;\" align=\"left\"><div><br></div><div>Thanks For joining us. <br></div><div>Please use the below code to verify your email address.<br></div><div><br></div><div>Your email verification code is:<font size=\"6\"><b> 1227426326</b></font></div></td>\r\n                      </tr>\r\n                      <!--end content-->\r\n                      <tr>\r\n                        <td height=\"40\"><br></td>\r\n                      </tr>\r\n              \r\n                    </tbody></table>\r\n                  </td>\r\n                </tr>\r\n                <tr>\r\n                  <td style=\"border-bottom-left-radius:6px;border-bottom-right-radius:6px;\" height=\"45\" bgcolor=\"#f4f4f4\" align=\"center\">\r\n                    <table width=\"90%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                      <tbody><tr>\r\n                        <td height=\"10\"><br></td>\r\n                      </tr>\r\n                      <!--preference-->\r\n                      <tr>\r\n                        <td class=\"preference-link\" style=\"font-family: \'Open sans\', Arial, sans-serif; color:#95a5a6; font-size:14px;\" align=\"center\">\r\n                          © 2022 AppDevs . All Rights Reserved. \r\n                        </td>\r\n                      </tr>\r\n                      <!--end preference-->\r\n                      <tr>\r\n                        <td height=\"10\"><br></td>\r\n                      </tr>\r\n                    </tbody></table>\r\n                  </td>\r\n                </tr>\r\n              </tbody></table>\r\n            </td>\r\n          </tr>\r\n        </tbody></table>\r\n      </td>\r\n    </tr>\r\n    <tr>\r\n      <td height=\"60\"><br></td>\r\n    </tr>\r\n  </tbody></table></p>', '2023-01-12 00:05:55', '2023-01-12 00:05:55'),
(24, 4, NULL, 'smtp', 'Haraz Alyawm noreply@appdevs.net', 'frranad1@gmail.com', 'Please verify your email address', '<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">\r\n  <!--[if !mso]><!-->\r\n  <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">\r\n  <!--<![endif]-->\r\n  <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">\r\n  <title></title>\r\n  <style type=\"text/css\">\r\n.ReadMsgBody { width: 100%; background-color: #ffffff; }\r\n.ExternalClass { width: 100%; background-color: #ffffff; }\r\n.ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div { line-height: 100%; }\r\nhtml { width: 100%; }\r\nbody { -webkit-text-size-adjust: none; -ms-text-size-adjust: none; margin: 0; padding: 0; }\r\ntable { border-spacing: 0; table-layout: fixed; margin: 0 auto;border-collapse: collapse; }\r\ntable table table { table-layout: auto; }\r\n.yshortcuts a { border-bottom: none !important; }\r\nimg:hover { opacity: 0.9 !important; }\r\na { color: #0087ff; text-decoration: none; }\r\n.textbutton a { font-family: \'open sans\', arial, sans-serif !important;}\r\n.btn-link a { color:#FFFFFF !important;}\r\n\r\n@media only screen and (max-width: 480px) {\r\nbody { width: auto !important; }\r\n*[class=\"table-inner\"] { width: 90% !important; text-align: center !important; }\r\n*[class=\"table-full\"] { width: 100% !important; text-align: center !important; }\r\n/* image */\r\nimg[class=\"img1\"] { width: 100% !important; height: auto !important; }\r\n}\r\n</style>\r\n\r\n\r\n\r\n  <p></p><table width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" bgcolor=\"#414a51\" align=\"center\">\r\n    <tbody><tr>\r\n      <td height=\"50\"><br></td>\r\n    </tr>\r\n    <tr>\r\n      <td style=\"text-align:center;vertical-align:top;font-size:0;\" align=\"center\">\r\n        <table cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n          <tbody><tr>\r\n            <td width=\"600\" align=\"center\"><br>\r\n              <!--end header-->\r\n              <table class=\"table-inner\" width=\"95%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\">\r\n                <tbody><tr>\r\n                  <td style=\"text-align:center;vertical-align:top;font-size:0;\" bgcolor=\"#FFFFFF\" align=\"center\">\r\n                    <table width=\"90%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                      <tbody><tr>\r\n                        <td height=\"35\"><br></td>\r\n                      </tr>\r\n                      <!--logo-->\r\n                      <tr>\r\n                        <td style=\"vertical-align:top;font-size:0;\" align=\"center\">\r\n                          \r\n                        <br></td>\r\n                      </tr>\r\n                      <!--end logo-->\r\n                      <tr>\r\n                        <td height=\"40\"><br></td>\r\n                      </tr>\r\n                      <!--headline-->\r\n                      <tr>\r\n                        <td style=\"font-family: \'Open Sans\', Arial, sans-serif; font-size: 22px;color:#414a51;font-weight: bold;\" align=\"center\">Hello FR<br></td>\r\n                      </tr>\r\n                      <!--end headline-->\r\n                      <tr>\r\n                        <td style=\"text-align:center;vertical-align:top;font-size:0;\" align=\"center\">\r\n                          <table width=\"40\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                            <tbody><tr>\r\n                              <td style=\" border-bottom:3px solid #0087ff;\" height=\"20\"><br></td>\r\n                            </tr>\r\n                          </tbody></table>\r\n                        </td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td height=\"20\"><br></td>\r\n                      </tr>\r\n                      <!--content-->\r\n                      <tr>\r\n                        <td style=\"font-family: \'Open sans\', Arial, sans-serif; color:#7f8c8d; font-size:16px; line-height: 28px;\" align=\"left\"><div><br></div><div>Thanks For joining us. <br></div><div>Please use the below code to verify your email address.<br></div><div><br></div><div>Your email verification code is:<font size=\"6\"><b> 9019</b></font></div></td>\r\n                      </tr>\r\n                      <!--end content-->\r\n                      <tr>\r\n                        <td height=\"40\"><br></td>\r\n                      </tr>\r\n              \r\n                    </tbody></table>\r\n                  </td>\r\n                </tr>\r\n                <tr>\r\n                  <td style=\"border-bottom-left-radius:6px;border-bottom-right-radius:6px;\" height=\"45\" bgcolor=\"#f4f4f4\" align=\"center\">\r\n                    <table width=\"90%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                      <tbody><tr>\r\n                        <td height=\"10\"><br></td>\r\n                      </tr>\r\n                      <!--preference-->\r\n                      <tr>\r\n                        <td class=\"preference-link\" style=\"font-family: \'Open sans\', Arial, sans-serif; color:#95a5a6; font-size:14px;\" align=\"center\">\r\n                          © 2022 Haraj Alyawm. All Rights Reserved. \r\n                        </td>\r\n                      </tr>\r\n                      <!--end preference-->\r\n                      <tr>\r\n                        <td height=\"10\"><br></td>\r\n                      </tr>\r\n                    </tbody></table>\r\n                  </td>\r\n                </tr>\r\n              </tbody></table>\r\n            </td>\r\n          </tr>\r\n        </tbody></table>\r\n      </td>\r\n    </tr>\r\n    <tr>\r\n      <td height=\"60\"><br></td>\r\n    </tr>\r\n  </tbody></table><p></p>', '2023-01-18 01:32:44', '2023-01-18 01:32:44'),
(25, 4, NULL, 'smtp', 'Haraz Alyawm noreply@appdevs.net', 'frranad1@gmail.com', 'Please verify your email address', '<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">\r\n  <!--[if !mso]><!-->\r\n  <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">\r\n  <!--<![endif]-->\r\n  <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">\r\n  <title></title>\r\n  <style type=\"text/css\">\r\n.ReadMsgBody { width: 100%; background-color: #ffffff; }\r\n.ExternalClass { width: 100%; background-color: #ffffff; }\r\n.ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div { line-height: 100%; }\r\nhtml { width: 100%; }\r\nbody { -webkit-text-size-adjust: none; -ms-text-size-adjust: none; margin: 0; padding: 0; }\r\ntable { border-spacing: 0; table-layout: fixed; margin: 0 auto;border-collapse: collapse; }\r\ntable table table { table-layout: auto; }\r\n.yshortcuts a { border-bottom: none !important; }\r\nimg:hover { opacity: 0.9 !important; }\r\na { color: #0087ff; text-decoration: none; }\r\n.textbutton a { font-family: \'open sans\', arial, sans-serif !important;}\r\n.btn-link a { color:#FFFFFF !important;}\r\n\r\n@media only screen and (max-width: 480px) {\r\nbody { width: auto !important; }\r\n*[class=\"table-inner\"] { width: 90% !important; text-align: center !important; }\r\n*[class=\"table-full\"] { width: 100% !important; text-align: center !important; }\r\n/* image */\r\nimg[class=\"img1\"] { width: 100% !important; height: auto !important; }\r\n}\r\n</style>\r\n\r\n\r\n\r\n  <p></p><table width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" bgcolor=\"#414a51\" align=\"center\">\r\n    <tbody><tr>\r\n      <td height=\"50\"><br></td>\r\n    </tr>\r\n    <tr>\r\n      <td style=\"text-align:center;vertical-align:top;font-size:0;\" align=\"center\">\r\n        <table cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n          <tbody><tr>\r\n            <td width=\"600\" align=\"center\"><br>\r\n              <!--end header-->\r\n              <table class=\"table-inner\" width=\"95%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\">\r\n                <tbody><tr>\r\n                  <td style=\"text-align:center;vertical-align:top;font-size:0;\" bgcolor=\"#FFFFFF\" align=\"center\">\r\n                    <table width=\"90%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                      <tbody><tr>\r\n                        <td height=\"35\"><br></td>\r\n                      </tr>\r\n                      <!--logo-->\r\n                      <tr>\r\n                        <td style=\"vertical-align:top;font-size:0;\" align=\"center\">\r\n                          \r\n                        <br></td>\r\n                      </tr>\r\n                      <!--end logo-->\r\n                      <tr>\r\n                        <td height=\"40\"><br></td>\r\n                      </tr>\r\n                      <!--headline-->\r\n                      <tr>\r\n                        <td style=\"font-family: \'Open Sans\', Arial, sans-serif; font-size: 22px;color:#414a51;font-weight: bold;\" align=\"center\">Hello FR<br></td>\r\n                      </tr>\r\n                      <!--end headline-->\r\n                      <tr>\r\n                        <td style=\"text-align:center;vertical-align:top;font-size:0;\" align=\"center\">\r\n                          <table width=\"40\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                            <tbody><tr>\r\n                              <td style=\" border-bottom:3px solid #0087ff;\" height=\"20\"><br></td>\r\n                            </tr>\r\n                          </tbody></table>\r\n                        </td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td height=\"20\"><br></td>\r\n                      </tr>\r\n                      <!--content-->\r\n                      <tr>\r\n                        <td style=\"font-family: \'Open sans\', Arial, sans-serif; color:#7f8c8d; font-size:16px; line-height: 28px;\" align=\"left\"><div><br></div><div>Thanks For joining us. <br></div><div>Please use the below code to verify your email address.<br></div><div><br></div><div>Your email verification code is:<font size=\"6\"><b> 6330</b></font></div></td>\r\n                      </tr>\r\n                      <!--end content-->\r\n                      <tr>\r\n                        <td height=\"40\"><br></td>\r\n                      </tr>\r\n              \r\n                    </tbody></table>\r\n                  </td>\r\n                </tr>\r\n                <tr>\r\n                  <td style=\"border-bottom-left-radius:6px;border-bottom-right-radius:6px;\" height=\"45\" bgcolor=\"#f4f4f4\" align=\"center\">\r\n                    <table width=\"90%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                      <tbody><tr>\r\n                        <td height=\"10\"><br></td>\r\n                      </tr>\r\n                      <!--preference-->\r\n                      <tr>\r\n                        <td class=\"preference-link\" style=\"font-family: \'Open sans\', Arial, sans-serif; color:#95a5a6; font-size:14px;\" align=\"center\">\r\n                          © 2022 Haraj Alyawm. All Rights Reserved. \r\n                        </td>\r\n                      </tr>\r\n                      <!--end preference-->\r\n                      <tr>\r\n                        <td height=\"10\"><br></td>\r\n                      </tr>\r\n                    </tbody></table>\r\n                  </td>\r\n                </tr>\r\n              </tbody></table>\r\n            </td>\r\n          </tr>\r\n        </tbody></table>\r\n      </td>\r\n    </tr>\r\n    <tr>\r\n      <td height=\"60\"><br></td>\r\n    </tr>\r\n  </tbody></table><p></p>', '2023-01-18 01:33:10', '2023-01-18 01:33:10');
INSERT INTO `email_logs` (`id`, `advertiser_id`, `user_type`, `mail_sender`, `email_from`, `email_to`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(26, 4, NULL, 'smtp', 'Haraz Alyawm noreply@appdevs.net', 'frranad1@gmail.com', 'Please verify your email address', '<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">\r\n  <!--[if !mso]><!-->\r\n  <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">\r\n  <!--<![endif]-->\r\n  <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">\r\n  <title></title>\r\n  <style type=\"text/css\">\r\n.ReadMsgBody { width: 100%; background-color: #ffffff; }\r\n.ExternalClass { width: 100%; background-color: #ffffff; }\r\n.ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div { line-height: 100%; }\r\nhtml { width: 100%; }\r\nbody { -webkit-text-size-adjust: none; -ms-text-size-adjust: none; margin: 0; padding: 0; }\r\ntable { border-spacing: 0; table-layout: fixed; margin: 0 auto;border-collapse: collapse; }\r\ntable table table { table-layout: auto; }\r\n.yshortcuts a { border-bottom: none !important; }\r\nimg:hover { opacity: 0.9 !important; }\r\na { color: #0087ff; text-decoration: none; }\r\n.textbutton a { font-family: \'open sans\', arial, sans-serif !important;}\r\n.btn-link a { color:#FFFFFF !important;}\r\n\r\n@media only screen and (max-width: 480px) {\r\nbody { width: auto !important; }\r\n*[class=\"table-inner\"] { width: 90% !important; text-align: center !important; }\r\n*[class=\"table-full\"] { width: 100% !important; text-align: center !important; }\r\n/* image */\r\nimg[class=\"img1\"] { width: 100% !important; height: auto !important; }\r\n}\r\n</style>\r\n\r\n\r\n\r\n  <p></p><table width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" bgcolor=\"#414a51\" align=\"center\">\r\n    <tbody><tr>\r\n      <td height=\"50\"><br></td>\r\n    </tr>\r\n    <tr>\r\n      <td style=\"text-align:center;vertical-align:top;font-size:0;\" align=\"center\">\r\n        <table cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n          <tbody><tr>\r\n            <td width=\"600\" align=\"center\"><br>\r\n              <!--end header-->\r\n              <table class=\"table-inner\" width=\"95%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\">\r\n                <tbody><tr>\r\n                  <td style=\"text-align:center;vertical-align:top;font-size:0;\" bgcolor=\"#FFFFFF\" align=\"center\">\r\n                    <table width=\"90%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                      <tbody><tr>\r\n                        <td height=\"35\"><br></td>\r\n                      </tr>\r\n                      <!--logo-->\r\n                      <tr>\r\n                        <td style=\"vertical-align:top;font-size:0;\" align=\"center\">\r\n                          \r\n                        <br></td>\r\n                      </tr>\r\n                      <!--end logo-->\r\n                      <tr>\r\n                        <td height=\"40\"><br></td>\r\n                      </tr>\r\n                      <!--headline-->\r\n                      <tr>\r\n                        <td style=\"font-family: \'Open Sans\', Arial, sans-serif; font-size: 22px;color:#414a51;font-weight: bold;\" align=\"center\">Hello FR<br></td>\r\n                      </tr>\r\n                      <!--end headline-->\r\n                      <tr>\r\n                        <td style=\"text-align:center;vertical-align:top;font-size:0;\" align=\"center\">\r\n                          <table width=\"40\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                            <tbody><tr>\r\n                              <td style=\" border-bottom:3px solid #0087ff;\" height=\"20\"><br></td>\r\n                            </tr>\r\n                          </tbody></table>\r\n                        </td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td height=\"20\"><br></td>\r\n                      </tr>\r\n                      <!--content-->\r\n                      <tr>\r\n                        <td style=\"font-family: \'Open sans\', Arial, sans-serif; color:#7f8c8d; font-size:16px; line-height: 28px;\" align=\"left\"><div><br></div><div>Thanks For joining us. <br></div><div>Please use the below code to verify your email address.<br></div><div><br></div><div>Your email verification code is:<font size=\"6\"><b> 7488</b></font></div></td>\r\n                      </tr>\r\n                      <!--end content-->\r\n                      <tr>\r\n                        <td height=\"40\"><br></td>\r\n                      </tr>\r\n              \r\n                    </tbody></table>\r\n                  </td>\r\n                </tr>\r\n                <tr>\r\n                  <td style=\"border-bottom-left-radius:6px;border-bottom-right-radius:6px;\" height=\"45\" bgcolor=\"#f4f4f4\" align=\"center\">\r\n                    <table width=\"90%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                      <tbody><tr>\r\n                        <td height=\"10\"><br></td>\r\n                      </tr>\r\n                      <!--preference-->\r\n                      <tr>\r\n                        <td class=\"preference-link\" style=\"font-family: \'Open sans\', Arial, sans-serif; color:#95a5a6; font-size:14px;\" align=\"center\">\r\n                          © 2022 Haraj Alyawm. All Rights Reserved. \r\n                        </td>\r\n                      </tr>\r\n                      <!--end preference-->\r\n                      <tr>\r\n                        <td height=\"10\"><br></td>\r\n                      </tr>\r\n                    </tbody></table>\r\n                  </td>\r\n                </tr>\r\n              </tbody></table>\r\n            </td>\r\n          </tr>\r\n        </tbody></table>\r\n      </td>\r\n    </tr>\r\n    <tr>\r\n      <td height=\"60\"><br></td>\r\n    </tr>\r\n  </tbody></table><p></p>', '2023-01-18 01:37:52', '2023-01-18 01:37:52'),
(27, 4, NULL, 'smtp', 'Haraz Alyawm noreply@appdevs.net', 'frranad1@gmail.com', 'Please verify your email address', '<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">\r\n  <!--[if !mso]><!-->\r\n  <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">\r\n  <!--<![endif]-->\r\n  <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">\r\n  <title></title>\r\n  <style type=\"text/css\">\r\n.ReadMsgBody { width: 100%; background-color: #ffffff; }\r\n.ExternalClass { width: 100%; background-color: #ffffff; }\r\n.ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div { line-height: 100%; }\r\nhtml { width: 100%; }\r\nbody { -webkit-text-size-adjust: none; -ms-text-size-adjust: none; margin: 0; padding: 0; }\r\ntable { border-spacing: 0; table-layout: fixed; margin: 0 auto;border-collapse: collapse; }\r\ntable table table { table-layout: auto; }\r\n.yshortcuts a { border-bottom: none !important; }\r\nimg:hover { opacity: 0.9 !important; }\r\na { color: #0087ff; text-decoration: none; }\r\n.textbutton a { font-family: \'open sans\', arial, sans-serif !important;}\r\n.btn-link a { color:#FFFFFF !important;}\r\n\r\n@media only screen and (max-width: 480px) {\r\nbody { width: auto !important; }\r\n*[class=\"table-inner\"] { width: 90% !important; text-align: center !important; }\r\n*[class=\"table-full\"] { width: 100% !important; text-align: center !important; }\r\n/* image */\r\nimg[class=\"img1\"] { width: 100% !important; height: auto !important; }\r\n}\r\n</style>\r\n\r\n\r\n\r\n  <p></p><table width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" bgcolor=\"#414a51\" align=\"center\">\r\n    <tbody><tr>\r\n      <td height=\"50\"><br></td>\r\n    </tr>\r\n    <tr>\r\n      <td style=\"text-align:center;vertical-align:top;font-size:0;\" align=\"center\">\r\n        <table cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n          <tbody><tr>\r\n            <td width=\"600\" align=\"center\"><br>\r\n              <!--end header-->\r\n              <table class=\"table-inner\" width=\"95%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\">\r\n                <tbody><tr>\r\n                  <td style=\"text-align:center;vertical-align:top;font-size:0;\" bgcolor=\"#FFFFFF\" align=\"center\">\r\n                    <table width=\"90%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                      <tbody><tr>\r\n                        <td height=\"35\"><br></td>\r\n                      </tr>\r\n                      <!--logo-->\r\n                      <tr>\r\n                        <td style=\"vertical-align:top;font-size:0;\" align=\"center\">\r\n                          \r\n                        <br></td>\r\n                      </tr>\r\n                      <!--end logo-->\r\n                      <tr>\r\n                        <td height=\"40\"><br></td>\r\n                      </tr>\r\n                      <!--headline-->\r\n                      <tr>\r\n                        <td style=\"font-family: \'Open Sans\', Arial, sans-serif; font-size: 22px;color:#414a51;font-weight: bold;\" align=\"center\">Hello FR<br></td>\r\n                      </tr>\r\n                      <!--end headline-->\r\n                      <tr>\r\n                        <td style=\"text-align:center;vertical-align:top;font-size:0;\" align=\"center\">\r\n                          <table width=\"40\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                            <tbody><tr>\r\n                              <td style=\" border-bottom:3px solid #0087ff;\" height=\"20\"><br></td>\r\n                            </tr>\r\n                          </tbody></table>\r\n                        </td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td height=\"20\"><br></td>\r\n                      </tr>\r\n                      <!--content-->\r\n                      <tr>\r\n                        <td style=\"font-family: \'Open sans\', Arial, sans-serif; color:#7f8c8d; font-size:16px; line-height: 28px;\" align=\"left\"><div><br></div><div>Thanks For joining us. <br></div><div>Please use the below code to verify your email address.<br></div><div><br></div><div>Your email verification code is:<font size=\"6\"><b> 8386</b></font></div></td>\r\n                      </tr>\r\n                      <!--end content-->\r\n                      <tr>\r\n                        <td height=\"40\"><br></td>\r\n                      </tr>\r\n              \r\n                    </tbody></table>\r\n                  </td>\r\n                </tr>\r\n                <tr>\r\n                  <td style=\"border-bottom-left-radius:6px;border-bottom-right-radius:6px;\" height=\"45\" bgcolor=\"#f4f4f4\" align=\"center\">\r\n                    <table width=\"90%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                      <tbody><tr>\r\n                        <td height=\"10\"><br></td>\r\n                      </tr>\r\n                      <!--preference-->\r\n                      <tr>\r\n                        <td class=\"preference-link\" style=\"font-family: \'Open sans\', Arial, sans-serif; color:#95a5a6; font-size:14px;\" align=\"center\">\r\n                          © 2022 Haraj Alyawm. All Rights Reserved. \r\n                        </td>\r\n                      </tr>\r\n                      <!--end preference-->\r\n                      <tr>\r\n                        <td height=\"10\"><br></td>\r\n                      </tr>\r\n                    </tbody></table>\r\n                  </td>\r\n                </tr>\r\n              </tbody></table>\r\n            </td>\r\n          </tr>\r\n        </tbody></table>\r\n      </td>\r\n    </tr>\r\n    <tr>\r\n      <td height=\"60\"><br></td>\r\n    </tr>\r\n  </tbody></table><p></p>', '2023-01-18 01:41:08', '2023-01-18 01:41:08'),
(28, 4, NULL, 'smtp', 'Haraz Alyawm noreply@appdevs.net', 'frranad1@gmail.com', 'Please verify your email address', '<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">\r\n  <!--[if !mso]><!-->\r\n  <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">\r\n  <!--<![endif]-->\r\n  <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">\r\n  <title></title>\r\n  <style type=\"text/css\">\r\n.ReadMsgBody { width: 100%; background-color: #ffffff; }\r\n.ExternalClass { width: 100%; background-color: #ffffff; }\r\n.ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div { line-height: 100%; }\r\nhtml { width: 100%; }\r\nbody { -webkit-text-size-adjust: none; -ms-text-size-adjust: none; margin: 0; padding: 0; }\r\ntable { border-spacing: 0; table-layout: fixed; margin: 0 auto;border-collapse: collapse; }\r\ntable table table { table-layout: auto; }\r\n.yshortcuts a { border-bottom: none !important; }\r\nimg:hover { opacity: 0.9 !important; }\r\na { color: #0087ff; text-decoration: none; }\r\n.textbutton a { font-family: \'open sans\', arial, sans-serif !important;}\r\n.btn-link a { color:#FFFFFF !important;}\r\n\r\n@media only screen and (max-width: 480px) {\r\nbody { width: auto !important; }\r\n*[class=\"table-inner\"] { width: 90% !important; text-align: center !important; }\r\n*[class=\"table-full\"] { width: 100% !important; text-align: center !important; }\r\n/* image */\r\nimg[class=\"img1\"] { width: 100% !important; height: auto !important; }\r\n}\r\n</style>\r\n\r\n\r\n\r\n  <p></p><table width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" bgcolor=\"#414a51\" align=\"center\">\r\n    <tbody><tr>\r\n      <td height=\"50\"><br></td>\r\n    </tr>\r\n    <tr>\r\n      <td style=\"text-align:center;vertical-align:top;font-size:0;\" align=\"center\">\r\n        <table cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n          <tbody><tr>\r\n            <td width=\"600\" align=\"center\"><br>\r\n              <!--end header-->\r\n              <table class=\"table-inner\" width=\"95%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\">\r\n                <tbody><tr>\r\n                  <td style=\"text-align:center;vertical-align:top;font-size:0;\" bgcolor=\"#FFFFFF\" align=\"center\">\r\n                    <table width=\"90%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                      <tbody><tr>\r\n                        <td height=\"35\"><br></td>\r\n                      </tr>\r\n                      <!--logo-->\r\n                      <tr>\r\n                        <td style=\"vertical-align:top;font-size:0;\" align=\"center\">\r\n                          \r\n                        <br></td>\r\n                      </tr>\r\n                      <!--end logo-->\r\n                      <tr>\r\n                        <td height=\"40\"><br></td>\r\n                      </tr>\r\n                      <!--headline-->\r\n                      <tr>\r\n                        <td style=\"font-family: \'Open Sans\', Arial, sans-serif; font-size: 22px;color:#414a51;font-weight: bold;\" align=\"center\">Hello FR<br></td>\r\n                      </tr>\r\n                      <!--end headline-->\r\n                      <tr>\r\n                        <td style=\"text-align:center;vertical-align:top;font-size:0;\" align=\"center\">\r\n                          <table width=\"40\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                            <tbody><tr>\r\n                              <td style=\" border-bottom:3px solid #0087ff;\" height=\"20\"><br></td>\r\n                            </tr>\r\n                          </tbody></table>\r\n                        </td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td height=\"20\"><br></td>\r\n                      </tr>\r\n                      <!--content-->\r\n                      <tr>\r\n                        <td style=\"font-family: \'Open sans\', Arial, sans-serif; color:#7f8c8d; font-size:16px; line-height: 28px;\" align=\"left\"><div><br></div><div>Thanks For joining us. <br></div><div>Please use the below code to verify your email address.<br></div><div><br></div><div>Your email verification code is:<font size=\"6\"><b> 2071</b></font></div></td>\r\n                      </tr>\r\n                      <!--end content-->\r\n                      <tr>\r\n                        <td height=\"40\"><br></td>\r\n                      </tr>\r\n              \r\n                    </tbody></table>\r\n                  </td>\r\n                </tr>\r\n                <tr>\r\n                  <td style=\"border-bottom-left-radius:6px;border-bottom-right-radius:6px;\" height=\"45\" bgcolor=\"#f4f4f4\" align=\"center\">\r\n                    <table width=\"90%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                      <tbody><tr>\r\n                        <td height=\"10\"><br></td>\r\n                      </tr>\r\n                      <!--preference-->\r\n                      <tr>\r\n                        <td class=\"preference-link\" style=\"font-family: \'Open sans\', Arial, sans-serif; color:#95a5a6; font-size:14px;\" align=\"center\">\r\n                          © 2022 Haraj Alyawm. All Rights Reserved. \r\n                        </td>\r\n                      </tr>\r\n                      <!--end preference-->\r\n                      <tr>\r\n                        <td height=\"10\"><br></td>\r\n                      </tr>\r\n                    </tbody></table>\r\n                  </td>\r\n                </tr>\r\n              </tbody></table>\r\n            </td>\r\n          </tr>\r\n        </tbody></table>\r\n      </td>\r\n    </tr>\r\n    <tr>\r\n      <td height=\"60\"><br></td>\r\n    </tr>\r\n  </tbody></table><p></p>', '2023-01-18 01:49:53', '2023-01-18 01:49:53'),
(29, NULL, NULL, 'smtp', 'Haraz Alyawm noreply@appdevs.net', 'frranad@gmail.com', 'Please verify your email address', '<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">\r\n  <!--[if !mso]><!-->\r\n  <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">\r\n  <!--<![endif]-->\r\n  <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">\r\n  <title></title>\r\n  <style type=\"text/css\">\r\n.ReadMsgBody { width: 100%; background-color: #ffffff; }\r\n.ExternalClass { width: 100%; background-color: #ffffff; }\r\n.ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div { line-height: 100%; }\r\nhtml { width: 100%; }\r\nbody { -webkit-text-size-adjust: none; -ms-text-size-adjust: none; margin: 0; padding: 0; }\r\ntable { border-spacing: 0; table-layout: fixed; margin: 0 auto;border-collapse: collapse; }\r\ntable table table { table-layout: auto; }\r\n.yshortcuts a { border-bottom: none !important; }\r\nimg:hover { opacity: 0.9 !important; }\r\na { color: #0087ff; text-decoration: none; }\r\n.textbutton a { font-family: \'open sans\', arial, sans-serif !important;}\r\n.btn-link a { color:#FFFFFF !important;}\r\n\r\n@media only screen and (max-width: 480px) {\r\nbody { width: auto !important; }\r\n*[class=\"table-inner\"] { width: 90% !important; text-align: center !important; }\r\n*[class=\"table-full\"] { width: 100% !important; text-align: center !important; }\r\n/* image */\r\nimg[class=\"img1\"] { width: 100% !important; height: auto !important; }\r\n}\r\n</style>\r\n\r\n\r\n\r\n  <p></p><table width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" bgcolor=\"#414a51\" align=\"center\">\r\n    <tbody><tr>\r\n      <td height=\"50\"><br></td>\r\n    </tr>\r\n    <tr>\r\n      <td style=\"text-align:center;vertical-align:top;font-size:0;\" align=\"center\">\r\n        <table cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n          <tbody><tr>\r\n            <td width=\"600\" align=\"center\"><br>\r\n              <!--end header-->\r\n              <table class=\"table-inner\" width=\"95%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\">\r\n                <tbody><tr>\r\n                  <td style=\"text-align:center;vertical-align:top;font-size:0;\" bgcolor=\"#FFFFFF\" align=\"center\">\r\n                    <table width=\"90%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                      <tbody><tr>\r\n                        <td height=\"35\"><br></td>\r\n                      </tr>\r\n                      <!--logo-->\r\n                      <tr>\r\n                        <td style=\"vertical-align:top;font-size:0;\" align=\"center\">\r\n                          \r\n                        <br></td>\r\n                      </tr>\r\n                      <!--end logo-->\r\n                      <tr>\r\n                        <td height=\"40\"><br></td>\r\n                      </tr>\r\n                      <!--headline-->\r\n                      <tr>\r\n                        <td style=\"font-family: \'Open Sans\', Arial, sans-serif; font-size: 22px;color:#414a51;font-weight: bold;\" align=\"center\">Hello Unknown<br></td>\r\n                      </tr>\r\n                      <!--end headline-->\r\n                      <tr>\r\n                        <td style=\"text-align:center;vertical-align:top;font-size:0;\" align=\"center\">\r\n                          <table width=\"40\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                            <tbody><tr>\r\n                              <td style=\" border-bottom:3px solid #0087ff;\" height=\"20\"><br></td>\r\n                            </tr>\r\n                          </tbody></table>\r\n                        </td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td height=\"20\"><br></td>\r\n                      </tr>\r\n                      <!--content-->\r\n                      <tr>\r\n                        <td style=\"font-family: \'Open sans\', Arial, sans-serif; color:#7f8c8d; font-size:16px; line-height: 28px;\" align=\"left\"><div><br></div><div>Thanks For joining us. <br></div><div>Please use the below code to verify your email address.<br></div><div><br></div><div>Your email verification code is:<font size=\"6\"><b> 815984603</b></font></div></td>\r\n                      </tr>\r\n                      <!--end content-->\r\n                      <tr>\r\n                        <td height=\"40\"><br></td>\r\n                      </tr>\r\n              \r\n                    </tbody></table>\r\n                  </td>\r\n                </tr>\r\n                <tr>\r\n                  <td style=\"border-bottom-left-radius:6px;border-bottom-right-radius:6px;\" height=\"45\" bgcolor=\"#f4f4f4\" align=\"center\">\r\n                    <table width=\"90%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                      <tbody><tr>\r\n                        <td height=\"10\"><br></td>\r\n                      </tr>\r\n                      <!--preference-->\r\n                      <tr>\r\n                        <td class=\"preference-link\" style=\"font-family: \'Open sans\', Arial, sans-serif; color:#95a5a6; font-size:14px;\" align=\"center\">\r\n                          © 2022 Haraj Alyawm. All Rights Reserved. \r\n                        </td>\r\n                      </tr>\r\n                      <!--end preference-->\r\n                      <tr>\r\n                        <td height=\"10\"><br></td>\r\n                      </tr>\r\n                    </tbody></table>\r\n                  </td>\r\n                </tr>\r\n              </tbody></table>\r\n            </td>\r\n          </tr>\r\n        </tbody></table>\r\n      </td>\r\n    </tr>\r\n    <tr>\r\n      <td height=\"60\"><br></td>\r\n    </tr>\r\n  </tbody></table><p></p>', '2023-01-18 01:54:44', '2023-01-18 01:54:44'),
(30, NULL, NULL, 'smtp', 'Haraz Alyawm noreply@appdevs.net', 'fsd', 'Please verify your email address', '<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">\r\n  <!--[if !mso]><!-->\r\n  <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">\r\n  <!--<![endif]-->\r\n  <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">\r\n  <title></title>\r\n  <style type=\"text/css\">\r\n.ReadMsgBody { width: 100%; background-color: #ffffff; }\r\n.ExternalClass { width: 100%; background-color: #ffffff; }\r\n.ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div { line-height: 100%; }\r\nhtml { width: 100%; }\r\nbody { -webkit-text-size-adjust: none; -ms-text-size-adjust: none; margin: 0; padding: 0; }\r\ntable { border-spacing: 0; table-layout: fixed; margin: 0 auto;border-collapse: collapse; }\r\ntable table table { table-layout: auto; }\r\n.yshortcuts a { border-bottom: none !important; }\r\nimg:hover { opacity: 0.9 !important; }\r\na { color: #0087ff; text-decoration: none; }\r\n.textbutton a { font-family: \'open sans\', arial, sans-serif !important;}\r\n.btn-link a { color:#FFFFFF !important;}\r\n\r\n@media only screen and (max-width: 480px) {\r\nbody { width: auto !important; }\r\n*[class=\"table-inner\"] { width: 90% !important; text-align: center !important; }\r\n*[class=\"table-full\"] { width: 100% !important; text-align: center !important; }\r\n/* image */\r\nimg[class=\"img1\"] { width: 100% !important; height: auto !important; }\r\n}\r\n</style>\r\n\r\n\r\n\r\n  <p></p><table width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" bgcolor=\"#414a51\" align=\"center\">\r\n    <tbody><tr>\r\n      <td height=\"50\"><br></td>\r\n    </tr>\r\n    <tr>\r\n      <td style=\"text-align:center;vertical-align:top;font-size:0;\" align=\"center\">\r\n        <table cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n          <tbody><tr>\r\n            <td width=\"600\" align=\"center\"><br>\r\n              <!--end header-->\r\n              <table class=\"table-inner\" width=\"95%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\">\r\n                <tbody><tr>\r\n                  <td style=\"text-align:center;vertical-align:top;font-size:0;\" bgcolor=\"#FFFFFF\" align=\"center\">\r\n                    <table width=\"90%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                      <tbody><tr>\r\n                        <td height=\"35\"><br></td>\r\n                      </tr>\r\n                      <!--logo-->\r\n                      <tr>\r\n                        <td style=\"vertical-align:top;font-size:0;\" align=\"center\">\r\n                          \r\n                        <br></td>\r\n                      </tr>\r\n                      <!--end logo-->\r\n                      <tr>\r\n                        <td height=\"40\"><br></td>\r\n                      </tr>\r\n                      <!--headline-->\r\n                      <tr>\r\n                        <td style=\"font-family: \'Open Sans\', Arial, sans-serif; font-size: 22px;color:#414a51;font-weight: bold;\" align=\"center\">Hello Unknown<br></td>\r\n                      </tr>\r\n                      <!--end headline-->\r\n                      <tr>\r\n                        <td style=\"text-align:center;vertical-align:top;font-size:0;\" align=\"center\">\r\n                          <table width=\"40\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                            <tbody><tr>\r\n                              <td style=\" border-bottom:3px solid #0087ff;\" height=\"20\"><br></td>\r\n                            </tr>\r\n                          </tbody></table>\r\n                        </td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td height=\"20\"><br></td>\r\n                      </tr>\r\n                      <!--content-->\r\n                      <tr>\r\n                        <td style=\"font-family: \'Open sans\', Arial, sans-serif; color:#7f8c8d; font-size:16px; line-height: 28px;\" align=\"left\"><div><br></div><div>Thanks For joining us. <br></div><div>Please use the below code to verify your email address.<br></div><div><br></div><div>Your email verification code is:<font size=\"6\"><b> 2021608863</b></font></div></td>\r\n                      </tr>\r\n                      <!--end content-->\r\n                      <tr>\r\n                        <td height=\"40\"><br></td>\r\n                      </tr>\r\n              \r\n                    </tbody></table>\r\n                  </td>\r\n                </tr>\r\n                <tr>\r\n                  <td style=\"border-bottom-left-radius:6px;border-bottom-right-radius:6px;\" height=\"45\" bgcolor=\"#f4f4f4\" align=\"center\">\r\n                    <table width=\"90%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                      <tbody><tr>\r\n                        <td height=\"10\"><br></td>\r\n                      </tr>\r\n                      <!--preference-->\r\n                      <tr>\r\n                        <td class=\"preference-link\" style=\"font-family: \'Open sans\', Arial, sans-serif; color:#95a5a6; font-size:14px;\" align=\"center\">\r\n                          © 2022 Haraj Alyawm. All Rights Reserved. \r\n                        </td>\r\n                      </tr>\r\n                      <!--end preference-->\r\n                      <tr>\r\n                        <td height=\"10\"><br></td>\r\n                      </tr>\r\n                    </tbody></table>\r\n                  </td>\r\n                </tr>\r\n              </tbody></table>\r\n            </td>\r\n          </tr>\r\n        </tbody></table>\r\n      </td>\r\n    </tr>\r\n    <tr>\r\n      <td height=\"60\"><br></td>\r\n    </tr>\r\n  </tbody></table><p></p>', '2023-01-18 01:56:45', '2023-01-18 01:56:45'),
(31, 4, NULL, 'smtp', 'Haraz Alyawm noreply@appdevs.net', 'frranad1@gmail.com', 'Please verify your email address', '<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">\r\n  <!--[if !mso]><!-->\r\n  <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">\r\n  <!--<![endif]-->\r\n  <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">\r\n  <title></title>\r\n  <style type=\"text/css\">\r\n.ReadMsgBody { width: 100%; background-color: #ffffff; }\r\n.ExternalClass { width: 100%; background-color: #ffffff; }\r\n.ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div { line-height: 100%; }\r\nhtml { width: 100%; }\r\nbody { -webkit-text-size-adjust: none; -ms-text-size-adjust: none; margin: 0; padding: 0; }\r\ntable { border-spacing: 0; table-layout: fixed; margin: 0 auto;border-collapse: collapse; }\r\ntable table table { table-layout: auto; }\r\n.yshortcuts a { border-bottom: none !important; }\r\nimg:hover { opacity: 0.9 !important; }\r\na { color: #0087ff; text-decoration: none; }\r\n.textbutton a { font-family: \'open sans\', arial, sans-serif !important;}\r\n.btn-link a { color:#FFFFFF !important;}\r\n\r\n@media only screen and (max-width: 480px) {\r\nbody { width: auto !important; }\r\n*[class=\"table-inner\"] { width: 90% !important; text-align: center !important; }\r\n*[class=\"table-full\"] { width: 100% !important; text-align: center !important; }\r\n/* image */\r\nimg[class=\"img1\"] { width: 100% !important; height: auto !important; }\r\n}\r\n</style>\r\n\r\n\r\n\r\n  <p></p><table width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" bgcolor=\"#414a51\" align=\"center\">\r\n    <tbody><tr>\r\n      <td height=\"50\"><br></td>\r\n    </tr>\r\n    <tr>\r\n      <td style=\"text-align:center;vertical-align:top;font-size:0;\" align=\"center\">\r\n        <table cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n          <tbody><tr>\r\n            <td width=\"600\" align=\"center\"><br>\r\n              <!--end header-->\r\n              <table class=\"table-inner\" width=\"95%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\">\r\n                <tbody><tr>\r\n                  <td style=\"text-align:center;vertical-align:top;font-size:0;\" bgcolor=\"#FFFFFF\" align=\"center\">\r\n                    <table width=\"90%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                      <tbody><tr>\r\n                        <td height=\"35\"><br></td>\r\n                      </tr>\r\n                      <!--logo-->\r\n                      <tr>\r\n                        <td style=\"vertical-align:top;font-size:0;\" align=\"center\">\r\n                          \r\n                        <br></td>\r\n                      </tr>\r\n                      <!--end logo-->\r\n                      <tr>\r\n                        <td height=\"40\"><br></td>\r\n                      </tr>\r\n                      <!--headline-->\r\n                      <tr>\r\n                        <td style=\"font-family: \'Open Sans\', Arial, sans-serif; font-size: 22px;color:#414a51;font-weight: bold;\" align=\"center\">Hello FR<br></td>\r\n                      </tr>\r\n                      <!--end headline-->\r\n                      <tr>\r\n                        <td style=\"text-align:center;vertical-align:top;font-size:0;\" align=\"center\">\r\n                          <table width=\"40\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                            <tbody><tr>\r\n                              <td style=\" border-bottom:3px solid #0087ff;\" height=\"20\"><br></td>\r\n                            </tr>\r\n                          </tbody></table>\r\n                        </td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td height=\"20\"><br></td>\r\n                      </tr>\r\n                      <!--content-->\r\n                      <tr>\r\n                        <td style=\"font-family: \'Open sans\', Arial, sans-serif; color:#7f8c8d; font-size:16px; line-height: 28px;\" align=\"left\"><div><br></div><div>Thanks For joining us. <br></div><div>Please use the below code to verify your email address.<br></div><div><br></div><div>Your email verification code is:<font size=\"6\"><b> 2017</b></font></div></td>\r\n                      </tr>\r\n                      <!--end content-->\r\n                      <tr>\r\n                        <td height=\"40\"><br></td>\r\n                      </tr>\r\n              \r\n                    </tbody></table>\r\n                  </td>\r\n                </tr>\r\n                <tr>\r\n                  <td style=\"border-bottom-left-radius:6px;border-bottom-right-radius:6px;\" height=\"45\" bgcolor=\"#f4f4f4\" align=\"center\">\r\n                    <table width=\"90%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                      <tbody><tr>\r\n                        <td height=\"10\"><br></td>\r\n                      </tr>\r\n                      <!--preference-->\r\n                      <tr>\r\n                        <td class=\"preference-link\" style=\"font-family: \'Open sans\', Arial, sans-serif; color:#95a5a6; font-size:14px;\" align=\"center\">\r\n                          © 2022 Haraj Alyawm. All Rights Reserved. \r\n                        </td>\r\n                      </tr>\r\n                      <!--end preference-->\r\n                      <tr>\r\n                        <td height=\"10\"><br></td>\r\n                      </tr>\r\n                    </tbody></table>\r\n                  </td>\r\n                </tr>\r\n              </tbody></table>\r\n            </td>\r\n          </tr>\r\n        </tbody></table>\r\n      </td>\r\n    </tr>\r\n    <tr>\r\n      <td height=\"60\"><br></td>\r\n    </tr>\r\n  </tbody></table><p></p>', '2023-01-18 02:04:07', '2023-01-18 02:04:07');

-- --------------------------------------------------------

--
-- Table structure for table `email_sms_templates`
--

CREATE TABLE `email_sms_templates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `act` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subj` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_body` text COLLATE utf8mb4_unicode_ci,
  `sms_body` text COLLATE utf8mb4_unicode_ci,
  `shortcodes` text COLLATE utf8mb4_unicode_ci,
  `email_status` tinyint(4) NOT NULL DEFAULT '1',
  `sms_status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `email_sms_templates`
--

INSERT INTO `email_sms_templates` (`id`, `act`, `name`, `subj`, `email_body`, `sms_body`, `shortcodes`, `email_status`, `sms_status`, `created_at`, `updated_at`) VALUES
(1, 'PASS_RESET_CODE', 'Password Reset', 'Password Reset', '<div>We have received a request to reset the password for your account on <b>{{time}} .<br></b></div><div>Requested From IP: <b>{{ip}}</b> using <b>{{browser}}</b> on <b>{{operating_system}} </b>.</div><div><br></div><br><div><div><div>Your account recovery code is:&nbsp;&nbsp; <font size=\"6\"><b>{{code}}</b></font></div><div><br></div></div></div><div><br></div><div><font size=\"4\" color=\"#CC0000\">If you do not wish to reset your password, please disregard this message.&nbsp;</font><br></div><br>', 'Your account recovery code is: {{code}}', ' {\"code\":\"Password Reset Code\",\"ip\":\"IP of User\",\"browser\":\"Browser of User\",\"operating_system\":\"Operating System of User\",\"time\":\"Request Time\"}', 1, 1, '2019-09-24 11:04:05', '2021-01-05 12:49:06'),
(2, 'PASS_RESET_DONE', 'Password Reset Confirmation', 'You have Reset your password', '<div><p>\r\n    You have successfully reset your password.</p><p>You changed from&nbsp; IP: <b>{{ip}}</b> using <b>{{browser}}</b> on <b>{{operating_system}}&nbsp;</b> on <b>{{time}}</b></p><p><b><br></b></p><p><font color=\"#FF0000\"><b>If you did not changed that, Please contact with us as soon as possible.</b></font><br></p></div>', 'Your password has been changed successfully', '{\"ip\":\"IP of User\",\"browser\":\"Browser of User\",\"operating_system\":\"Operating System of User\",\"time\":\"Request Time\"}', 1, 1, '2019-09-24 11:04:05', '2020-03-06 22:23:47'),
(3, 'EVER_CODE', 'Email Verification', 'Please verify your email address', '<div><br></div><div>Thanks For joining us. <br></div><div>Please use the below code to verify your email address.<br></div><div><br></div><div>Your email verification code is:<font size=\"6\"><b> {{code}}</b></font></div>', 'Your email verification code is: {{code}}', '{\"code\":\"Verification code\"}', 1, 1, '2019-09-24 11:04:05', '2022-09-28 23:48:53'),
(236, 'OTP', 'OTP Verification', 'OTP Verification', '', '', '{\"code\":\"Verification Code\"}', 1, 1, '2019-09-14 07:14:22', '2021-08-20 17:33:40');

-- --------------------------------------------------------

--
-- Table structure for table `extensions`
--

CREATE TABLE `extensions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `act` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `script` text COLLATE utf8mb4_unicode_ci,
  `shortcode` text COLLATE utf8mb4_unicode_ci,
  `support` text COLLATE utf8mb4_unicode_ci COMMENT 'Help section',
  `status` tinyint(4) DEFAULT NULL COMMENT '1=>enable, 2=>disable	',
  `deleted_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `favourites`
--

CREATE TABLE `favourites` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `advertiser_id` int(11) NOT NULL,
  `advertisement_id` int(11) NOT NULL,
  `qty` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `favourites`
--

INSERT INTO `favourites` (`id`, `advertiser_id`, `advertisement_id`, `qty`, `created_at`, `updated_at`) VALUES
(4, 1, 47, 1, '2022-10-18 14:22:41', '2022-10-18 14:22:41');

-- --------------------------------------------------------

--
-- Table structure for table `feature_ads`
--

CREATE TABLE `feature_ads` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `advertisement_id` int(10) UNSIGNED NOT NULL,
  `ad_type_id` int(10) UNSIGNED NOT NULL COMMENT 'Paid ad types',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `frontends`
--

CREATE TABLE `frontends` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `data_keys` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data_values` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `frontends`
--

INSERT INTO `frontends` (`id`, `data_keys`, `data_values`, `created_at`, `updated_at`) VALUES
(1, 'seo.data', '{\"seo_image\":\"1\",\"social_title\":\"Reference site about Lorem Ipsum\",\"social_description\":\"Reference site about Lorem Ipsum, giving information on its origins, as well as a random Lipsum generator.\",\"keywords\":[\"admin\",\"blog\",\"website\",\"classified\",\"portal\"],\"description\":\"Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown\",\"image\":\"63bd05e3d62051673332195.png\"}', '2022-10-16 09:27:21', '2023-01-10 00:29:56');

-- --------------------------------------------------------

--
-- Table structure for table `gateways`
--

CREATE TABLE `gateways` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alias` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `gateway_parameters` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `supported_currencies` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `crypto` tinyint(4) DEFAULT NULL,
  `extra` text COLLATE utf8mb4_unicode_ci,
  `description` text COLLATE utf8mb4_unicode_ci,
  `input_form` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gateways`
--

INSERT INTO `gateways` (`id`, `name`, `code`, `alias`, `image`, `status`, `gateway_parameters`, `supported_currencies`, `crypto`, `extra`, `description`, `input_form`, `created_at`, `updated_at`) VALUES
(1, 'Paypal', '101', 'Paypal', '5f6f1bd8678601601117144.jpg', 1, '{\"paypal_email\":{\"title\":\"PayPal Email\",\"global\":true,\"value\":\"muhamedhassnmuhamed@gmail.com\"}}', '{\"USD\":\"USD\",\"AUD\":\"AUD\",\"BRL\":\"BRL\",\"CAD\":\"CAD\",\"CHF\":\"CHF\",\"DKK\":\"DKK\",\"EUR\":\"EUR\",\"GBP\":\"GBP\",\"HKD\":\"HKD\",\"INR\":\"INR\",\"JPY\":\"JPY\",\"MXN\":\"MXN\",\"MYR\":\"MYR\",\"NOK\":\"NOK\",\"NZD\":\"NZD\",\"PLN\":\"PLN\",\"SEK\":\"SEK\",\"SGD\":\"SGD\"}', 0, NULL, NULL, NULL, '2019-09-14 07:14:22', '2023-01-20 04:55:06'),
(2, 'Stripe', '103', 'Stripe', '5f6f1d4bc69e71601117515.jpg', 1, '{\"secret_key\":{\"title\":\"Secret Key\",\"global\":true,\"value\":\"pk_test_51L0r39F7YjcJbu9H8O5cDv15w2K4krqWZw6ISQ2yBw85VaYrMC45ofJlIs05NY3lTmqQHONqZvebMIwxPSrHOyrN00Mi5bmGOD\"},\"publishable_key\":{\"title\":\"PUBLISHABLE KEY\",\"global\":true,\"value\":\"pk_test_51L0r39F7YjcJbu9H8O5cDv15w2K4krqWZw6ISQ2yBw85VaYrMC45ofJlIs05NY3lTmqQHONqZvebMIwxPSrHOyrN00Mi5bmGOD\"}}', '{\"USD\":\"USD\",\"AUD\":\"AUD\",\"BRL\":\"BRL\",\"CAD\":\"CAD\",\"CHF\":\"CHF\",\"DKK\":\"DKK\",\"EUR\":\"EUR\",\"GBP\":\"GBP\",\"HKD\":\"HKD\",\"INR\":\"INR\",\"JPY\":\"JPY\",\"MXN\":\"MXN\",\"MYR\":\"MYR\",\"NOK\":\"NOK\",\"NZD\":\"NZD\",\"PLN\":\"PLN\",\"SEK\":\"SEK\",\"SGD\":\"SGD\"}', 0, NULL, NULL, NULL, '2019-09-14 07:14:22', '2023-01-20 04:55:07');

-- --------------------------------------------------------

--
-- Table structure for table `gateway_currencies`
--

CREATE TABLE `gateway_currencies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `symbol` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `method_code` int(11) DEFAULT NULL,
  `gateway_alias` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `min_amount` decimal(24,2) DEFAULT NULL,
  `max_amount` decimal(24,2) DEFAULT NULL,
  `percent_charge` decimal(24,2) DEFAULT NULL,
  `fixed_charge` decimal(24,2) DEFAULT NULL,
  `rate` decimal(24,2) DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gateway_parameter` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `general_settings`
--

CREATE TABLE `general_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sitename` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_sub_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dark` tinyint(4) DEFAULT NULL,
  `cur_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cur_sym` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_from` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sms_api` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `base_color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `secondary_color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `component_color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mail_config` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `sms_config` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `ev` tinyint(4) DEFAULT NULL,
  `en` tinyint(4) DEFAULT NULL,
  `sv` tinyint(4) DEFAULT NULL,
  `sn` tinyint(4) DEFAULT NULL,
  `otp_expiration` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `otp_verification` tinyint(4) DEFAULT NULL,
  `timezone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `force_ssl` tinyint(4) DEFAULT NULL,
  `secure_password` tinyint(4) DEFAULT NULL,
  `agree` tinyint(4) DEFAULT NULL,
  `registration` tinyint(4) DEFAULT NULL,
  `withdraw_status` tinyint(4) DEFAULT NULL,
  `deposit_status` tinyint(4) DEFAULT NULL,
  `kyc_verification` tinyint(4) DEFAULT NULL,
  `devlopment_mode` tinyint(4) DEFAULT NULL,
  `active_template` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_template` text COLLATE utf8mb4_unicode_ci,
  `fiat_currency_api` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `crypto_currency_api` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qr_template` text COLLATE utf8mb4_unicode_ci,
  `sys_version` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cron_run` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `domain_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `apps_settings` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `general_settings`
--

INSERT INTO `general_settings` (`id`, `sitename`, `site_sub_title`, `dark`, `cur_text`, `cur_sym`, `email_from`, `sms_api`, `base_color`, `secondary_color`, `component_color`, `mail_config`, `sms_config`, `ev`, `en`, `sv`, `sn`, `otp_expiration`, `otp_verification`, `timezone`, `force_ssl`, `secure_password`, `agree`, `registration`, `withdraw_status`, `deposit_status`, `kyc_verification`, `devlopment_mode`, `active_template`, `email_template`, `fiat_currency_api`, `crypto_currency_api`, `qr_template`, `sys_version`, `cron_run`, `created_at`, `updated_at`, `domain_name`, `apps_settings`) VALUES
(1, 'Haraz Alyawm title', 'Classified', 0, 'USD', NULL, 'noreply@appdevs.net', 'hi {{name}}, {{message}}', NULL, NULL, NULL, '{\"enc\": \"ssl\", \"host\": \"appdevs.net\", \"name\": \"smtp\", \"port\": \"465\", \"password\": \"QP2fsLk?80Ac\", \"username\": \"noreply@appdevs.net\"}', '{\"from\": \"----------------------\", \"name\": \"clickatell\", \"apiv2_key\": \"-------------------------------\", \"auth_token\": \"---------------------------\", \"account_sid\": \"-----------------------\", \"nexmo_api_key\": \"----------------------\", \"infobip_password\": \"----------------------\", \"infobip_username\": \"--------------\", \"nexmo_api_secret\": \"----------------------\", \"clickatell_api_key\": \"----------------------------\", \"text_magic_username\": \"-----------------------\", \"message_bird_api_key\": \"-------------------\", \"sms_broadcast_password\": \"-----------------------------\", \"sms_broadcast_username\": \"----------------------\"}', 1, 0, 0, 0, NULL, 0, NULL, 0, 0, 0, 1, 0, 0, 0, 0, 'basic', '<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">\r\n  <!--[if !mso]><!-->\r\n  <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">\r\n  <!--<![endif]-->\r\n  <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">\r\n  <title></title>\r\n  <style type=\"text/css\">\r\n.ReadMsgBody { width: 100%; background-color: #ffffff; }\r\n.ExternalClass { width: 100%; background-color: #ffffff; }\r\n.ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div { line-height: 100%; }\r\nhtml { width: 100%; }\r\nbody { -webkit-text-size-adjust: none; -ms-text-size-adjust: none; margin: 0; padding: 0; }\r\ntable { border-spacing: 0; table-layout: fixed; margin: 0 auto;border-collapse: collapse; }\r\ntable table table { table-layout: auto; }\r\n.yshortcuts a { border-bottom: none !important; }\r\nimg:hover { opacity: 0.9 !important; }\r\na { color: #0087ff; text-decoration: none; }\r\n.textbutton a { font-family: \'open sans\', arial, sans-serif !important;}\r\n.btn-link a { color:#FFFFFF !important;}\r\n\r\n@media only screen and (max-width: 480px) {\r\nbody { width: auto !important; }\r\n*[class=\"table-inner\"] { width: 90% !important; text-align: center !important; }\r\n*[class=\"table-full\"] { width: 100% !important; text-align: center !important; }\r\n/* image */\r\nimg[class=\"img1\"] { width: 100% !important; height: auto !important; }\r\n}\r\n</style>\r\n\r\n\r\n\r\n  <p></p><table width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" bgcolor=\"#414a51\" align=\"center\">\r\n    <tbody><tr>\r\n      <td height=\"50\"><br></td>\r\n    </tr>\r\n    <tr>\r\n      <td style=\"text-align:center;vertical-align:top;font-size:0;\" align=\"center\">\r\n        <table cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n          <tbody><tr>\r\n            <td width=\"600\" align=\"center\"><br>\r\n              <!--end header-->\r\n              <table class=\"table-inner\" width=\"95%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\">\r\n                <tbody><tr>\r\n                  <td style=\"text-align:center;vertical-align:top;font-size:0;\" bgcolor=\"#FFFFFF\" align=\"center\">\r\n                    <table width=\"90%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                      <tbody><tr>\r\n                        <td height=\"35\"><br></td>\r\n                      </tr>\r\n                      <!--logo-->\r\n                      <tr>\r\n                        <td style=\"vertical-align:top;font-size:0;\" align=\"center\">\r\n                          \r\n                        <br></td>\r\n                      </tr>\r\n                      <!--end logo-->\r\n                      <tr>\r\n                        <td height=\"40\"><br></td>\r\n                      </tr>\r\n                      <!--headline-->\r\n                      <tr>\r\n                        <td style=\"font-family: \'Open Sans\', Arial, sans-serif; font-size: 22px;color:#414a51;font-weight: bold;\" align=\"center\">Hello {{fullname}}<br></td>\r\n                      </tr>\r\n                      <!--end headline-->\r\n                      <tr>\r\n                        <td style=\"text-align:center;vertical-align:top;font-size:0;\" align=\"center\">\r\n                          <table width=\"40\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                            <tbody><tr>\r\n                              <td style=\" border-bottom:3px solid #0087ff;\" height=\"20\"><br></td>\r\n                            </tr>\r\n                          </tbody></table>\r\n                        </td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td height=\"20\"><br></td>\r\n                      </tr>\r\n                      <!--content-->\r\n                      <tr>\r\n                        <td style=\"font-family: \'Open sans\', Arial, sans-serif; color:#7f8c8d; font-size:16px; line-height: 28px;\" align=\"left\">{{message}}</td>\r\n                      </tr>\r\n                      <!--end content-->\r\n                      <tr>\r\n                        <td height=\"40\"><br></td>\r\n                      </tr>\r\n              \r\n                    </tbody></table>\r\n                  </td>\r\n                </tr>\r\n                <tr>\r\n                  <td style=\"border-bottom-left-radius:6px;border-bottom-right-radius:6px;\" height=\"45\" bgcolor=\"#f4f4f4\" align=\"center\">\r\n                    <table width=\"90%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                      <tbody><tr>\r\n                        <td height=\"10\"><br></td>\r\n                      </tr>\r\n                      <!--preference-->\r\n                      <tr>\r\n                        <td class=\"preference-link\" style=\"font-family: \'Open sans\', Arial, sans-serif; color:#95a5a6; font-size:14px;\" align=\"center\">\r\n                          © 2022 Haraj Alyawm. All Rights Reserved. \r\n                        </td>\r\n                      </tr>\r\n                      <!--end preference-->\r\n                      <tr>\r\n                        <td height=\"10\"><br></td>\r\n                      </tr>\r\n                    </tbody></table>\r\n                  </td>\r\n                </tr>\r\n              </tbody></table>\r\n            </td>\r\n          </tr>\r\n        </tbody></table>\r\n      </td>\r\n    </tr>\r\n    <tr>\r\n      <td height=\"60\"><br></td>\r\n    </tr>\r\n  </tbody></table><p></p>', '14360e0ed85986d6bf9c3aa1a7fd85080000', 'f45ece6d-9f1a-4ed5-841c-647a603d4c0800000', '617569babbeb21635084730.png', NULL, '{\"fiat_cron\":\"2021-10-24T13:28:21.505940Z\",\"crypto_cron\":\"2021-10-24T13:28:16.481555Z\"}', NULL, '2023-01-20 04:53:01', NULL, '{\"google_play_status\":\"on\",\"ios_status\":\"on\",\"play_store_app_link\":\"https:\\/\\/play.google.com\\/store\\/games?hl=en&gl=US&pli=1\",\"ios_app_link\":\"https:\\/\\/www.apple.com\\/iphone\\/\"}');

-- --------------------------------------------------------

--
-- Table structure for table `google_ads`
--

CREATE TABLE `google_ads` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `google_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text_align` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT '0: left to right text align, 1: right to left text align',
  `is_default` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0: not default language, 1: default language',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `name`, `code`, `icon`, `text_align`, `is_default`, `created_at`, `updated_at`) VALUES
(2, 'English', 'en', NULL, '0', 1, '2022-10-19 03:39:11', '2022-10-19 10:46:58'),
(3, 'Arabic', 'ar', NULL, '0', 0, '2022-10-19 09:13:35', '2022-10-19 09:13:35');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `from` int(11) NOT NULL,
  `to` int(11) NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_read` tinyint(4) DEFAULT NULL,
  `deleted_from` tinyint(4) DEFAULT '0',
  `deleted_to` tinyint(4) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `from`, `to`, `message`, `is_read`, `deleted_from`, `deleted_to`, `created_at`, `updated_at`) VALUES
(43, 2, 1, 'hello', 1, 0, 0, '2022-10-21 12:46:13', '2022-10-22 02:31:16'),
(44, 2, 1, 'hyyyy', 1, 0, 0, '2022-10-21 12:46:22', '2022-10-22 02:31:16'),
(45, 2, 1, 'ooooooooo', 1, 0, 0, '2022-10-21 12:46:43', '2022-10-22 02:31:16'),
(46, 2, 1, 'ooooo', 1, 0, 0, '2022-10-21 12:46:49', '2022-10-22 02:31:16'),
(47, 2, 1, 'No problem', 1, 0, 0, '2022-10-21 12:47:09', '2022-10-22 02:31:16'),
(48, 1, 2, 'No problem', 0, 0, 0, '2022-10-22 02:31:08', '2022-10-22 02:31:08'),
(49, 3, 3, 'Is it still available?', 1, 0, 0, '2023-01-12 00:18:08', '2023-01-18 04:10:39'),
(50, 3, 3, 'hello', 1, 0, 0, '2023-01-12 00:26:46', '2023-01-18 04:10:39'),
(51, 3, 3, 'hello', 1, 0, 0, '2023-01-12 00:26:48', '2023-01-18 04:10:39'),
(52, 3, 3, 'Is it still available?', 1, 0, 0, '2023-01-12 00:51:09', '2023-01-18 04:10:39'),
(53, 3, 3, 'Is it still available?', 1, 0, 0, '2023-01-12 00:51:09', '2023-01-18 04:10:39'),
(54, 4, 3, 'Hello', 0, 0, 0, '2023-01-18 04:14:03', '2023-01-18 04:14:03'),
(55, 4, 3, 'Is the price negotiable?', 0, 0, 0, '2023-01-18 04:38:52', '2023-01-18 04:38:52'),
(56, 4, 3, 'hi', 0, 0, 0, '2023-01-18 05:55:04', '2023-01-18 05:55:04'),
(57, 4, 3, 'ji', 0, 0, 0, '2023-01-18 05:55:14', '2023-01-18 05:55:14'),
(58, 4, 3, 'ji', 0, 0, 0, '2023-01-18 05:55:26', '2023-01-18 05:55:26'),
(59, 4, 3, 'asdfsdf', 0, 0, 0, '2023-01-18 05:55:30', '2023-01-18 05:55:30'),
(60, 4, 3, 'hi', 0, 0, 0, '2023-01-18 05:55:42', '2023-01-18 05:55:42'),
(61, 4, 3, 'test', 0, 0, 0, '2023-01-18 06:01:03', '2023-01-18 06:01:03'),
(62, 4, 3, 'test', 0, 0, 0, '2023-01-18 06:03:15', '2023-01-18 06:03:15'),
(63, 4, 3, 'ttttt', 0, 0, 0, '2023-01-18 06:44:39', '2023-01-18 06:44:39'),
(64, 4, 3, 'fsdf', 0, 0, 0, '2023-01-18 06:44:53', '2023-01-18 06:44:53'),
(65, 4, 3, 'test', 0, 0, 0, '2023-01-18 06:56:37', '2023-01-18 06:56:37'),
(66, 4, 3, 'test', 0, 0, 0, '2023-01-18 06:59:07', '2023-01-18 06:59:07');

-- --------------------------------------------------------

--
-- Table structure for table `message_users`
--

CREATE TABLE `message_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `from` int(11) NOT NULL,
  `to` int(11) NOT NULL,
  `is_block` int(11) NOT NULL,
  `is_deleted_from` int(11) DEFAULT NULL,
  `is_deleted_to` int(11) DEFAULT NULL,
  `is_important_from` int(11) DEFAULT NULL,
  `is_important_to` int(11) DEFAULT NULL,
  `date` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `message_users`
--

INSERT INTO `message_users` (`id`, `from`, `to`, `is_block`, `is_deleted_from`, `is_deleted_to`, `is_important_from`, `is_important_to`, `date`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 0, 0, 0, 1, NULL, '2022-10-22 08:31:08', '2022-10-21 11:34:16', '2022-10-22 02:31:08'),
(2, 3, 3, 0, 0, 0, NULL, NULL, '2023-01-12 06:51:09', '2023-01-12 00:18:07', '2023-01-12 00:51:09'),
(3, 4, 3, 0, 0, 0, NULL, NULL, '2023-01-18 12:59:07', '2023-01-18 04:14:02', '2023-01-18 06:59:07');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2019_09_30_123517_create_permission_groups_table', 1),
(4, '2019_09_30_123523_create_permissions_table', 1),
(5, '2019_09_30_123524_create_roles_table', 1),
(6, '2019_09_30_123525_create_group_role_permission_table', 1),
(7, '2019_09_30_123527_create_auths_table', 1),
(8, '2019_10_01_073858_create_admin_users_table', 1),
(9, '2019_10_02_073857_create_users_table', 1),
(10, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(11, '2021_12_05_145431_create_posts_table', 1),
(12, '2021_12_05_150220_create_categories_table', 1),
(13, '2021_12_05_151849_create_user_groups_table', 1),
(14, '2021_12_11_132449_add_about_to_auths_table', 1),
(15, '2021_12_11_132449_add_slug_to_posts_table', 1),
(16, '2022_08_17_130624_create_email_sms_templates_table', 1),
(17, '2022_08_17_134454_create_support_tickets_table', 1),
(18, '2022_08_20_103433_create_business_settings_table', 1),
(19, '2022_08_21_165813_create_currencies_table', 1),
(20, '2022_08_21_180140_create_gateways_table', 1),
(21, '2022_08_21_184425_create_gateway_currencies_table', 1),
(22, '2022_08_23_143449_create_general_settings_table', 1),
(23, '2022_08_25_164813_create_extensions_table', 1),
(24, '2022_08_26_014151_create_frontends_table', 1),
(25, '2022_08_28_114406_add_user_type_support_tickets_table', 1),
(26, '2022_08_28_154757_create_support_messages_table', 1),
(27, '2022_08_28_181841_create_email_logs_table', 1),
(28, '2022_08_28_182346_create_support_attachments_table', 1),
(29, '2022_08_29_010148_create_languages_table', 1),
(30, '2022_08_30_145520_make_name_code_unique_column_in_languages_table', 1),
(31, '2022_09_04_143436_create_cms_pages_table', 1),
(32, '2022_09_07_001536_create_ad_types_table', 1),
(33, '2022_09_07_131656_create_category_items_table', 1),
(34, '2022_09_08_113339_create_cities_table', 1),
(35, '2022_09_08_171118_add_date_fields_to_ad_types_table', 1),
(36, '2022_09_10_190100_create_advertisements_table', 1),
(37, '2022_09_10_190529_create_ad_images_table', 1),
(39, '2022_09_22_025647_create_favourites_table', 1),
(40, '2022_09_24_101917_add_views_to_advertisements_table', 1),
(41, '2022_12_11_132449_add_image_to_auths_table', 1),
(42, '2022_12_11_132499_add_ad_location_to_advertisements_table', 1),
(44, '2019_09_30_123528_create_auth_roles_table', 2),
(45, '2022_09_15_054850_create_advertisers_table', 3),
(46, '2022_10_01_091051_create_ad_complains_table', 4),
(48, '2022_10_02_075238_create_social_media_table', 5),
(49, '2022_10_03_091243_create_user_queries_table', 6),
(50, '2022_10_04_104049_create_messages_table', 7),
(51, '2022_10_05_171737_create_ratings_table', 8),
(52, '2022_10_06_172604_google_id_to_advertisers_table', 9),
(53, '2022_10_09_094708_create_messaged_ads_table', 10),
(54, '2022_10_11_172048_create_feature_ads_table', 11),
(55, '2022_10_20_172744_create_payments_table', 12),
(56, '2022_10_20_160647_create_message_users_table', 13),
(57, '2022_11_13_082254_create_banners_table', 14),
(58, '2022_11_13_123725_create_advertisement_advertiser_table', 15),
(59, '2022_11_14_072605_create_google_ads_table', 16),
(65, '2022_11_21_091647_create_visitor_histories_table', 17),
(75, '2022_11_23_071653_create_advertisement_visitor_interest_table', 18),
(76, '2022_11_23_153520_create_interest_advertisements_table', 19),
(79, '2022_11_23_153520_create_interest_advertisement_table', 20),
(80, '2022_09_08_113339_create_brands_table', 21);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `payment_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payer_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payer_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` double(10,2) DEFAULT NULL,
  `currency` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `payment_id`, `payer_id`, `payer_email`, `amount`, `currency`, `payment_status`, `created_at`, `updated_at`) VALUES
(1, 'PAYID-MNJPLKY61214740L8174225B', 'SNVNZKZE8MDF2', 'sb-h0dsf21602186@personal.example.com', 900.00, 'USD', 'approved', '2022-10-21 13:40:41', '2022-10-21 13:40:41'),
(10, 'ch_3M70ttF7YjcJbu9H1eofJL7T', 'Stripe', NULL, 2000.00, 'usd', 'succeeded', '2022-11-22 12:08:52', '2022-11-22 12:08:52'),
(11, 'ch_3M70wyF7YjcJbu9H0CsbgZWS', 'Stripe', NULL, 2000.00, 'usd', 'succeeded', '2022-11-22 12:12:04', '2022-11-22 12:12:04'),
(12, 'ch_3M71TpF7YjcJbu9H26ZAWqEq', 'Stripe', NULL, 2000.00, 'usd', 'succeeded', '2022-11-22 12:46:01', '2022-11-22 12:46:01'),
(13, 'ch_3M71fNF7YjcJbu9H0OoIsTjO', 'Stripe', NULL, 2000.00, 'usd', 'succeeded', '2022-11-22 12:57:57', '2022-11-22 12:57:57'),
(14, 'ch_3M71nEF7YjcJbu9H0tDkWiK8', 'Stripe', NULL, 1000.00, 'usd', 'succeeded', '2022-11-22 13:06:03', '2022-11-22 13:06:03'),
(15, 'ch_3M71pNF7YjcJbu9H1OG9rAwb', 'Stripe', NULL, 2000.00, 'usd', 'succeeded', '2022-11-22 13:08:16', '2022-11-22 13:08:16'),
(16, 'ch_3M71x4F7YjcJbu9H1VZbfQO0', 'Stripe', NULL, 2000.00, 'usd', 'succeeded', '2022-11-22 13:16:14', '2022-11-22 13:16:14'),
(17, 'ch_3M71zFF7YjcJbu9H1GarpQXn', 'Stripe', NULL, 2000.00, 'usd', 'succeeded', '2022-11-22 13:18:28', '2022-11-22 13:18:28'),
(18, 'ch_3M7DUtF7YjcJbu9H0b0d5GaA', 'Stripe', NULL, 2000.00, 'usd', 'succeeded', '2022-11-23 01:35:56', '2022-11-23 01:35:56'),
(19, 'ch_3M7DbXF7YjcJbu9H0qOizo7k', 'Stripe', NULL, 900.00, 'usd', 'succeeded', '2022-11-23 01:42:48', '2022-11-23 01:42:48');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permission_group_id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `permission_group_id`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'view_permission_group', 'View', 1, 1, NULL, '2022-09-27 23:39:54', '2022-09-27 23:39:54'),
(2, 'add_permission_group', 'Add', 1, 1, NULL, '2022-09-27 23:39:54', '2022-09-27 23:39:54'),
(3, 'edit_permission_group', 'Edit', 1, 1, NULL, '2022-09-27 23:39:54', '2022-09-27 23:39:54'),
(4, 'delete_permission_group', 'Delete', 1, 1, NULL, '2022-09-27 23:39:54', '2022-09-27 23:39:54'),
(5, 'execute_permission_group', 'Execute', 1, 1, NULL, '2022-09-27 23:39:54', '2022-09-27 23:39:54'),
(6, 'view_permission', 'View', 2, 1, NULL, '2022-09-27 23:39:54', '2022-09-27 23:39:54'),
(7, 'add_permission', 'Add', 2, 1, NULL, '2022-09-27 23:39:54', '2022-09-27 23:39:54'),
(8, 'edit_permission', 'Edit', 2, 1, NULL, '2022-09-27 23:39:54', '2022-09-27 23:39:54'),
(9, 'delete_permission', 'Delete', 2, 1, NULL, '2022-09-27 23:39:54', '2022-09-27 23:39:54'),
(10, 'execute_delete_permission', 'Execute', 2, 1, NULL, '2022-09-27 23:39:54', '2022-09-27 23:39:54'),
(11, 'view_role', 'View', 3, 1, NULL, '2022-09-27 23:39:54', '2022-09-27 23:39:54'),
(12, 'add_role', 'Add', 3, 1, NULL, '2022-09-27 23:39:54', '2022-09-27 23:39:54'),
(13, 'edit_role', 'Edit', 3, 1, NULL, '2022-09-27 23:39:54', '2022-09-27 23:39:54'),
(14, 'delete_role', 'Delete', 3, 1, NULL, '2022-09-27 23:39:54', '2022-09-27 23:39:54'),
(16, 'view_dashboard', 'View', 4, 1, NULL, '2022-09-27 23:39:54', '2022-09-27 23:39:54'),
(17, '', 'Add', 4, 1, NULL, '2022-09-27 23:39:54', '2022-09-27 23:39:54'),
(18, '', 'Edit', 4, 1, NULL, '2022-09-27 23:39:54', '2022-09-27 23:39:54'),
(19, '', 'Delete', 4, 1, NULL, '2022-09-27 23:39:54', '2022-09-27 23:39:54'),
(20, 'execute_dashboard', 'Execute', 4, 1, NULL, '2022-09-27 23:39:54', '2022-09-27 23:39:54'),
(21, 'view_admin_user', 'View', 5, 1, NULL, '2022-09-27 23:39:54', '2022-09-27 23:39:54'),
(22, 'add_admin_user', 'Add', 5, 1, NULL, '2022-09-27 23:39:54', '2022-09-27 23:39:54'),
(23, 'edit_admin_user', 'Edit', 5, 1, NULL, '2022-09-27 23:39:54', '2022-09-27 23:39:54'),
(24, 'delete_admin_user', 'Delete', 5, 1, NULL, '2022-09-27 23:39:54', '2022-09-27 23:39:54'),
(25, 'execute_admin_user', 'Execute', 5, 1, NULL, '2022-09-27 23:39:54', '2022-09-27 23:39:54'),
(26, 'view_advertiser', 'View Advertiser', 6, 1, NULL, '2022-10-22 11:53:53', '2022-10-22 11:53:53'),
(27, 'view_ads_reports', 'View ads reports', 7, 1, NULL, '2022-10-22 11:58:57', '2022-10-22 11:58:57'),
(28, 'view_all_ads', 'View all ads', 8, 1, NULL, '2022-10-22 11:59:32', '2022-10-22 12:00:37'),
(29, 'email_manager', 'Email manager', 9, 1, NULL, '2022-10-22 12:04:29', '2022-10-22 12:04:29'),
(30, 'general_settings', 'General Settings', 10, 1, NULL, '2022-10-22 12:05:35', '2022-10-22 12:05:35'),
(31, 'view_city', 'View City', 12, 1, NULL, '2022-10-22 12:11:42', '2022-10-22 12:11:42'),
(32, 'view_ad_type', 'View Ad Package', 13, 1, NULL, '2022-10-22 12:16:45', '2022-10-22 12:16:45'),
(33, 'view_category', 'View', 11, 1, NULL, '2023-01-20 09:29:36', '2023-01-20 09:32:01'),
(34, 'create_category', 'Create', 11, 1, NULL, '2023-01-20 09:30:07', '2023-01-20 09:32:22'),
(35, 'edit_category', 'Edit', 11, 1, NULL, '2023-01-20 09:30:32', '2023-01-20 09:32:39'),
(36, 'status_change_category', 'Status', 11, 1, NULL, '2023-01-20 09:31:00', '2023-01-20 09:32:58'),
(37, 'view_brand', 'View', 14, 1, NULL, '2023-01-20 22:26:40', '2023-01-20 22:26:40'),
(38, 'create_city', 'Create', 12, 1, NULL, '2023-01-20 22:54:03', '2023-01-20 22:54:03');

-- --------------------------------------------------------

--
-- Table structure for table `permission_groups`
--

CREATE TABLE `permission_groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `group_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_groups`
--

INSERT INTO `permission_groups` (`id`, `group_name`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Permission group', 1, NULL, '2022-09-27 23:39:54', '2022-09-27 23:39:54'),
(2, 'Permission', 1, NULL, '2022-09-27 23:39:54', '2022-09-27 23:39:54'),
(3, 'User role', 1, NULL, '2022-09-27 23:39:54', '2022-09-27 23:39:54'),
(4, 'Dashboard', 1, NULL, '2022-09-27 23:39:54', '2022-09-27 23:39:54'),
(5, 'Admin User', 1, NULL, '2022-09-27 23:39:54', '2022-09-27 23:39:54'),
(6, 'Advertisers', 1, NULL, '2022-10-22 11:53:07', '2022-10-22 11:53:07'),
(7, 'Ad Reports', 1, NULL, '2022-10-22 11:58:20', '2022-10-22 11:58:20'),
(8, 'Advertisements', 1, NULL, '2022-10-22 11:59:49', '2022-10-22 11:59:49'),
(9, 'Email Manager', 1, NULL, '2022-10-22 12:04:03', '2022-10-22 12:04:03'),
(10, 'General Settings', 1, NULL, '2022-10-22 12:05:14', '2022-10-22 12:05:14'),
(11, 'Manage Category', 1, NULL, '2022-10-22 12:07:24', '2022-10-22 12:07:24'),
(12, 'Manage City', 1, NULL, '2022-10-22 12:07:35', '2022-10-22 12:07:35'),
(13, 'Manage Ad Package', 1, NULL, '2022-10-22 12:07:57', '2022-10-22 12:07:57'),
(14, 'Manage Brand', 1, NULL, '2023-01-20 22:24:48', '2023-01-20 22:24:48');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `advertiser_id` int(10) UNSIGNED NOT NULL,
  `rating` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`id`, `advertiser_id`, `rating`, `created_at`, `updated_at`) VALUES
(1, 1, 4, '2022-10-05 11:42:30', '2022-10-05 11:42:30'),
(2, 1, 10, '2022-10-05 11:42:30', '2022-10-05 11:42:30'),
(3, 3, 3, '2023-01-12 00:15:53', '2023-01-12 00:15:53');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `created_by` int(11) NOT NULL,
  `edited_by` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role_name`, `status`, `created_by`, `edited_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Super admin', 1, 1, 0, NULL, '2022-09-27 23:38:06', '2022-09-27 23:38:06'),
(3, 'Executive Role', 1, 1, 1, NULL, '2022-10-01 11:21:12', '2023-01-20 10:32:14'),
(4, 'Basic Role', 1, 1, 1, NULL, '2023-01-20 22:28:36', '2023-01-20 22:54:29');

-- --------------------------------------------------------

--
-- Table structure for table `role_permission`
--

CREATE TABLE `role_permission` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `permissions` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_permission`
--

INSERT INTO `role_permission` (`id`, `permissions`, `role_id`, `created_at`, `updated_at`) VALUES
(1, ',view_dashboard,', 1, '2022-09-27 23:39:54', '2022-09-27 23:39:54'),
(2, ',view_category,', 3, '2022-10-01 11:21:12', '2023-01-20 22:23:14'),
(3, ',view_city,create_city,view_brand,', 4, '2023-01-20 22:28:36', '2023-01-20 22:54:29');

-- --------------------------------------------------------

--
-- Table structure for table `social_media`
--

CREATE TABLE `social_media` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `social_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `social_media`
--

INSERT INTO `social_media` (`id`, `title`, `icon`, `social_link`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Facebook', '<i class=\"fab fa-facebook\"></i>', 'https://www.facebook.com/', 1, '2022-10-02 12:56:14', '2023-01-20 04:51:15'),
(2, 'Twitter', '<i class=\"fab fa-twitter\"></i>', 'https://twitter.com/', 1, '2022-10-02 13:10:54', '2023-01-20 04:49:55');

-- --------------------------------------------------------

--
-- Table structure for table `support_attachments`
--

CREATE TABLE `support_attachments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `support_message_id` int(10) UNSIGNED NOT NULL,
  `attachment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `support_messages`
--

CREATE TABLE `support_messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `support_ticket_id` int(10) UNSIGNED NOT NULL COMMENT 'PK support_tickets table',
  `admin_id` int(10) UNSIGNED NOT NULL COMMENT 'PK admin_users table',
  `message` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `support_tickets`
--

CREATE TABLE `support_tickets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL COMMENT 'FK users table',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ticket` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL COMMENT '0: Open, 1: Answered, 2: Replied, 3: Closed',
  `priority` tinyint(4) NOT NULL DEFAULT '0' COMMENT '1 = Low, 2 = medium, 3 = heigh',
  `last_reply` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `auth_id` int(10) UNSIGNED NOT NULL DEFAULT '11' COMMENT 'PK on auths table 11 = Registerd user',
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middle_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alt_mobile_no` varchar(14) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_pic` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_pic_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pic_mime_type` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_type` tinyint(4) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `auth_id`, `first_name`, `middle_name`, `last_name`, `alt_mobile_no`, `designation`, `email`, `password`, `profile_pic`, `profile_pic_url`, `facebook_id`, `pic_mime_type`, `user_type`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 11, 'Test', 'User', 'One', NULL, NULL, 'testuser@gmail.com', '$2y$10$DVSsh3CmzAEj273eUqLviOmhYWirFyK5foSmlSze6DJuc5AELeFty', NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_contacts`
--

CREATE TABLE `user_contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `advertisement_id` int(10) UNSIGNED NOT NULL,
  `message_sender_id` int(10) UNSIGNED NOT NULL,
  `advertiser_id` int(11) NOT NULL,
  `advertisement_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `advertisement_price` double(24,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_contacts`
--

INSERT INTO `user_contacts` (`id`, `advertisement_id`, `message_sender_id`, `advertiser_id`, `advertisement_title`, `advertisement_price`, `created_at`, `updated_at`) VALUES
(1, 34, 2, 1, 'Samsung', 90000.00, '2022-10-14 04:33:32', '2022-10-14 04:33:32'),
(2, 1, 2, 1, 'Samsung', 90000.00, '2022-10-14 04:33:32', '2022-10-14 04:33:32'),
(3, 29, 1, 1, 'Again testing Data', 90000.00, '2022-10-15 11:31:27', '2022-10-15 11:31:27'),
(4, 29, 1, 1, 'Again testing Data', 90000.00, '2022-10-15 11:34:17', '2022-10-15 11:34:17'),
(5, 44, 2, 1, 'Other ad', 90000.00, '2022-10-21 10:56:24', '2022-10-21 10:56:24'),
(6, 44, 2, 1, 'Other ad', 90000.00, '2022-10-21 10:59:33', '2022-10-21 10:59:33'),
(7, 44, 2, 1, 'Other ad', 90000.00, '2022-10-21 11:34:16', '2022-10-21 11:34:16'),
(8, 44, 2, 1, 'Other ad', 90000.00, '2022-10-21 11:34:18', '2022-10-21 11:34:18'),
(9, 94, 3, 3, 'test', 120.00, '2023-01-12 00:18:08', '2023-01-12 00:18:08'),
(10, 94, 3, 3, 'test', 120.00, '2023-01-12 00:26:46', '2023-01-12 00:26:46'),
(11, 94, 3, 3, 'test', 120.00, '2023-01-12 00:26:48', '2023-01-12 00:26:48'),
(12, 94, 3, 3, 'test', 120.00, '2023-01-12 00:27:02', '2023-01-12 00:27:02'),
(13, 94, 3, 3, 'test', 120.00, '2023-01-12 00:51:09', '2023-01-12 00:51:09'),
(14, 94, 3, 3, 'test', 120.00, '2023-01-12 00:51:09', '2023-01-12 00:51:09'),
(15, 120, 4, 3, 'rarar', 499.00, '2023-01-18 04:14:03', '2023-01-18 04:14:03'),
(16, 119, 4, 3, 'test', 97.00, '2023-01-18 04:38:52', '2023-01-18 04:38:52');

-- --------------------------------------------------------

--
-- Table structure for table `user_groups`
--

CREATE TABLE `user_groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` int(11) NOT NULL COMMENT 'PK of Roles table',
  `auth_roles` int(11) NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `group_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1=Active and 0=Inactive',
  `deleted_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_groups`
--

INSERT INTO `user_groups` (`id`, `role_id`, `auth_roles`, `code`, `group_name`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(3, 3, 3, NULL, 'Test user group', 1, '2023-01-20 13:45:25', '2023-01-20 01:45:25', '2023-01-20 01:45:25'),
(4, 4, 1, NULL, 'Basic User Group', 1, '2023-01-21 10:35:40', '2023-01-20 22:35:40', '2023-01-20 22:35:40');

-- --------------------------------------------------------

--
-- Table structure for table `user_queries`
--

CREATE TABLE `user_queries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `attachment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_queries`
--

INSERT INTO `user_queries` (`id`, `name`, `email`, `subject`, `user_message`, `attachment`, `created_at`, `updated_at`) VALUES
(1, 'Muhammad Hannan', 'mdhannan.info@gmail.com', 'Subject', 'Message', NULL, '2022-10-03 03:29:23', '2022-10-03 03:29:23'),
(2, 'test', 'frranad1@gmail.com', 'test', 'test', NULL, '2023-01-14 05:37:55', '2023-01-14 05:37:55');

-- --------------------------------------------------------

--
-- Table structure for table `visitor_histories`
--

CREATE TABLE `visitor_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mac_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `iso_code` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state_name` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lat` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lon` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `timezone` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_ip_view_count` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `visitor_histories`
--

INSERT INTO `visitor_histories` (`id`, `ip_address`, `mac_address`, `iso_code`, `country`, `city`, `state_name`, `lat`, `lon`, `timezone`, `user_ip_view_count`, `created_at`, `updated_at`) VALUES
(7, '::1', '60-18-95-2D-FF-B1', NULL, 'United States', 'New Haven', 'Connecticut', '41.31', '-72.92', NULL, 182, '2023-01-11 22:54:53', '2023-01-11 22:54:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_users_auth_id_foreign` (`auth_id`);

--
-- Indexes for table `advertisements`
--
ALTER TABLE `advertisements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `advertisement_advertiser`
--
ALTER TABLE `advertisement_advertiser`
  ADD PRIMARY KEY (`id`),
  ADD KEY `advertisement_advertiser_advertiser_id_foreign` (`advertiser_id`),
  ADD KEY `advertisement_advertiser_advertisement_id_foreign` (`advertisement_id`);

--
-- Indexes for table `advertisement_interest_advertisement`
--
ALTER TABLE `advertisement_interest_advertisement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `advertisers`
--
ALTER TABLE `advertisers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `advertisers_email_unique` (`email`),
  ADD UNIQUE KEY `advertisers_username_unique` (`username`),
  ADD UNIQUE KEY `advertisers_registration_code_unique` (`registration_code`);

--
-- Indexes for table `ad_complains`
--
ALTER TABLE `ad_complains`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ad_images`
--
ALTER TABLE `ad_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ad_types`
--
ALTER TABLE `ad_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ad_types_title_unique` (`title`);

--
-- Indexes for table `auths`
--
ALTER TABLE `auths`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `auths_email_unique` (`email`),
  ADD UNIQUE KEY `auths_mobile_no_unique` (`mobile_no`),
  ADD UNIQUE KEY `auths_username_unique` (`username`);

--
-- Indexes for table `auth_roles`
--
ALTER TABLE `auth_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `banners_title_unique` (`title`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `brands_title_unique` (`title`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `title` (`title`);

--
-- Indexes for table `category_items`
--
ALTER TABLE `category_items`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `category_items_title_unique` (`title`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cities_title_unique` (`title`);

--
-- Indexes for table `cms_pages`
--
ALTER TABLE `cms_pages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cms_pages_title_unique` (`title`);

--
-- Indexes for table `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_logs`
--
ALTER TABLE `email_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_sms_templates`
--
ALTER TABLE `email_sms_templates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `extensions`
--
ALTER TABLE `extensions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `extensions_name_unique` (`name`),
  ADD UNIQUE KEY `extensions_act_unique` (`act`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `favourites`
--
ALTER TABLE `favourites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `favourites_advertisement_id_index` (`advertisement_id`);

--
-- Indexes for table `feature_ads`
--
ALTER TABLE `feature_ads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `frontends`
--
ALTER TABLE `frontends`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gateways`
--
ALTER TABLE `gateways`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gateway_currencies`
--
ALTER TABLE `gateway_currencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `general_settings`
--
ALTER TABLE `general_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `google_ads`
--
ALTER TABLE `google_ads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `languages_name_unique` (`name`),
  ADD UNIQUE KEY `languages_code_unique` (`code`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message_users`
--
ALTER TABLE `message_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permissions_permission_group_id_foreign` (`permission_group_id`);

--
-- Indexes for table `permission_groups`
--
ALTER TABLE `permission_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_permission`
--
ALTER TABLE `role_permission`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_permission_role_id_foreign` (`role_id`);

--
-- Indexes for table `social_media`
--
ALTER TABLE `social_media`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `social_media_title_unique` (`title`),
  ADD UNIQUE KEY `social_media_icon_unique` (`icon`);

--
-- Indexes for table `support_attachments`
--
ALTER TABLE `support_attachments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `support_messages`
--
ALTER TABLE `support_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `support_tickets`
--
ALTER TABLE `support_tickets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_contacts`
--
ALTER TABLE `user_contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_groups`
--
ALTER TABLE `user_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_queries`
--
ALTER TABLE `user_queries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visitor_histories`
--
ALTER TABLE `visitor_histories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `visitor_histories_ip_address_unique` (`ip_address`),
  ADD UNIQUE KEY `visitor_histories_mac_address_unique` (`mac_address`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `advertisements`
--
ALTER TABLE `advertisements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT for table `advertisement_advertiser`
--
ALTER TABLE `advertisement_advertiser`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `advertisement_interest_advertisement`
--
ALTER TABLE `advertisement_interest_advertisement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `advertisers`
--
ALTER TABLE `advertisers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ad_complains`
--
ALTER TABLE `ad_complains`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ad_images`
--
ALTER TABLE `ad_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT for table `ad_types`
--
ALTER TABLE `ad_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `auths`
--
ALTER TABLE `auths`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `auth_roles`
--
ALTER TABLE `auth_roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `category_items`
--
ALTER TABLE `category_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cms_pages`
--
ALTER TABLE `cms_pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `email_logs`
--
ALTER TABLE `email_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `email_sms_templates`
--
ALTER TABLE `email_sms_templates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=237;

--
-- AUTO_INCREMENT for table `extensions`
--
ALTER TABLE `extensions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `favourites`
--
ALTER TABLE `favourites`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `feature_ads`
--
ALTER TABLE `feature_ads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `frontends`
--
ALTER TABLE `frontends`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `gateways`
--
ALTER TABLE `gateways`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `gateway_currencies`
--
ALTER TABLE `gateway_currencies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `general_settings`
--
ALTER TABLE `general_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `google_ads`
--
ALTER TABLE `google_ads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `message_users`
--
ALTER TABLE `message_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `permission_groups`
--
ALTER TABLE `permission_groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `role_permission`
--
ALTER TABLE `role_permission`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `social_media`
--
ALTER TABLE `social_media`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `support_attachments`
--
ALTER TABLE `support_attachments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `support_messages`
--
ALTER TABLE `support_messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `support_tickets`
--
ALTER TABLE `support_tickets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_contacts`
--
ALTER TABLE `user_contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user_groups`
--
ALTER TABLE `user_groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_queries`
--
ALTER TABLE `user_queries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `visitor_histories`
--
ALTER TABLE `visitor_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD CONSTRAINT `admin_users_auth_id_foreign` FOREIGN KEY (`auth_id`) REFERENCES `auths` (`id`);

--
-- Constraints for table `advertisement_advertiser`
--
ALTER TABLE `advertisement_advertiser`
  ADD CONSTRAINT `advertisement_advertiser_advertisement_id_foreign` FOREIGN KEY (`advertisement_id`) REFERENCES `advertisements` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `advertisement_advertiser_advertiser_id_foreign` FOREIGN KEY (`advertiser_id`) REFERENCES `advertisers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `permissions`
--
ALTER TABLE `permissions`
  ADD CONSTRAINT `permissions_permission_group_id_foreign` FOREIGN KEY (`permission_group_id`) REFERENCES `permission_groups` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_permission`
--
ALTER TABLE `role_permission`
  ADD CONSTRAINT `role_permission_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
