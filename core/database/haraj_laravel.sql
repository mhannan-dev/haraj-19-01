-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 29, 2022 at 11:03 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `haraj_laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `auth_id` bigint(20) UNSIGNED NOT NULL,
  `profile_pic` varchar(255) DEFAULT NULL,
  `profile_pic_url` varchar(255) DEFAULT NULL,
  `pic_mime_type` varchar(50) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `first_name`, `last_name`, `designation`, `auth_id`, `profile_pic`, `profile_pic_url`, `pic_mime_type`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Super', 'Admin', 'Super Admin', 1, 'profile_11102022_1665485097.jpg', 'http://localhost/haraj_final/profile/profile_11102022_1665485097.jpg', NULL, 1, NULL, '2022-10-11 04:44:57', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `advertisements`
--

CREATE TABLE `advertisements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `advertiser_id` int(10) UNSIGNED NOT NULL COMMENT 'PK on Advertiser table',
  `category_id` int(10) UNSIGNED NOT NULL COMMENT 'PK on Category table',
  `type_id` int(10) UNSIGNED NOT NULL COMMENT 'PK on Types table',
  `city_id` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'PK on City table',
  `sub_category_id` int(10) UNSIGNED DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `price` decimal(24,2) NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'def.png',
  `description` text NOT NULL,
  `condition` varchar(255) NOT NULL,
  `authenticity` varchar(255) DEFAULT NULL,
  `brand` varchar(255) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL,
  `edition` varchar(255) DEFAULT NULL,
  `year_of_manufacture` varchar(255) DEFAULT NULL,
  `features` varchar(255) DEFAULT NULL,
  `details_informations` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`details_informations`)),
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0 == Pending, 1 == Published, 2 == Sold',
  `is_price_negotiable` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0 == No, 1 == Yes',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `feature_expire_date` timestamp NULL DEFAULT NULL,
  `view_count` int(11) NOT NULL DEFAULT 0,
  `location_embeded_map` text DEFAULT NULL,
  `fuel_type` varchar(300) DEFAULT NULL,
  `is_featured` tinyint(4) DEFAULT 0,
  `ad_type_id` int(11) DEFAULT NULL,
  `meta_tags` varchar(255) NOT NULL,
  `meta_title` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `advertisements`
--

INSERT INTO `advertisements` (`id`, `advertiser_id`, `category_id`, `type_id`, `city_id`, `sub_category_id`, `title`, `slug`, `price`, `image`, `description`, `condition`, `authenticity`, `brand`, `model`, `color`, `edition`, `year_of_manufacture`, `features`, `details_informations`, `status`, `is_price_negotiable`, `created_at`, `updated_at`, `feature_expire_date`, `view_count`, `location_embeded_map`, `fuel_type`, `is_featured`, `ad_type_id`, `meta_tags`, `meta_title`) VALUES
(2, 2, 1, 0, 1, 6, 'Samsung A120', 'samsung-a120', '10000.00', '2022-09-28-1664347655.png', '<b>Samsung A120</b><br>', 'new', 'Original', 'ABC Brand', NULL, 'red', '8th', NULL, NULL, '{\"Memory\": \"12GB\", \"Battery\": \"9000\", \"Display\": \"Amuled\", \"NETWORK\": \"3g\"}', 1, 0, '2022-09-28 00:47:35', '2022-09-28 00:47:35', NULL, 16, '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3746527.452679472!2d90.3443647!3d23.506657!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1664347556295!5m2!1sen!2sbd\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', NULL, NULL, NULL, '', NULL),
(11, 1, 7, 0, 1, 9, 'SDFSDF', 'sdfsdf', '90000.00', '2022-09-29-1664470511.png', 'SDFSDF', 'like new', 'original', 'SDFD', NULL, 'dark-green', '8TH', NULL, NULL, '{\"gear\": \"straight\", \"run_km\": \"9000\", \"edition\": \"8TH\", \"traction\": \"other\", \"body_type\": \"other\", \"engine_cc\": \"129\", \"year_decade\": \"2014-2024\", \"transmission\": \"automatic\", \"year_of_manufacture\": \"2000\"}', 1, 0, '2022-09-29 10:55:11', '2022-10-23 05:42:24', NULL, 202, '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d14607.609605322508!2d90.40309515!3d23.750859549999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1664531703200!5m2!1sen!2sbd\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', '[\"diesel\",\"hybrid\",\"electric\"]', NULL, NULL, '', NULL),
(17, 1, 1, 0, 1, 5, 'Testing Another', 'testing-another', '40000.00', '2022-10-11-1665507707.png', 'Testing Another', 'used', 'Original', 'Brand', NULL, 'yellow', '8th', NULL, NULL, '{\"Memory\": \"128\", \"Battery\": \"9000\", \"Display\": \"Amuled\", \"NETWORK\": \"4G\"}', 1, 0, '2022-10-11 11:01:48', '2022-10-11 11:01:48', NULL, 0, NULL, NULL, NULL, NULL, '', NULL),
(18, 1, 1, 0, 1, 5, 'Abar Testing', 'abar-testing', '90000.00', '2022-10-11-1665508120.png', 'Abar Testing', 'new', 'Original', 'Brand', NULL, 'light-blue', '8th', NULL, NULL, '{\"Memory\": \"128\", \"Battery\": \"9000\", \"Display\": \"Amuled\", \"NETWORK\": \"4G\"}', 2, 0, '2022-10-11 11:08:40', '2022-10-11 11:08:40', NULL, 0, NULL, NULL, NULL, NULL, '', NULL),
(19, 1, 1, 0, 1, 5, 'Abar Testing', 'abar-testing', '90000.00', '2022-10-11-1665508156.png', 'Abar Testing', 'new', 'Original', 'Brand', NULL, 'light-blue', '8th', NULL, NULL, '{\"Memory\": \"128\", \"Battery\": \"9000\", \"Display\": \"Amuled\", \"NETWORK\": \"4G\"}', 1, 0, '2022-10-11 11:09:16', '2022-10-11 11:09:16', NULL, 0, NULL, NULL, NULL, NULL, '', NULL),
(20, 1, 1, 0, 1, 5, 'Abar Testing', 'abar-testing', '90000.00', '2022-10-11-1665508223.png', 'Abar Testing', 'new', 'Original', 'Brand', NULL, 'light-blue', '8th', NULL, NULL, '{\"Memory\": \"128\", \"Battery\": \"9000\", \"Display\": \"Amuled\", \"NETWORK\": \"4G\"}', 1, 0, '2022-10-11 11:10:23', '2022-10-11 11:10:23', NULL, 0, NULL, NULL, NULL, NULL, '', NULL),
(21, 1, 1, 0, 1, 5, 'Abar Testing', 'abar-testing', '90000.00', '2022-10-11-1665509641.png', 'Abar Testing', 'new', 'Original', 'Brand', NULL, 'light-blue', '8th', NULL, NULL, '{\"Memory\": \"128\", \"Battery\": \"9000\", \"Display\": \"Amuled\", \"NETWORK\": \"4G\"}', 2, 0, '2022-10-11 11:34:01', '2022-10-23 05:44:21', NULL, 1, NULL, NULL, NULL, NULL, '', NULL),
(22, 1, 1, 0, 1, 5, 'Abar Testing', 'abar-testing', '90000.00', '2022-10-11-1665510634.png', 'Abar Testing', 'new', 'Original', 'Brand', NULL, 'light-blue', '8th', NULL, NULL, '{\"Memory\": \"128\", \"Battery\": \"9000\", \"Display\": \"Amuled\", \"NETWORK\": \"4G\"}', 1, 0, '2022-10-11 11:50:34', '2022-10-11 11:50:34', NULL, 0, NULL, NULL, NULL, NULL, '', NULL),
(23, 1, 1, 0, 1, 5, 'Product  Test', 'selected-category', '90000.00', '2022-10-11-1665511893.png', 'SELECTED CATEGORY', 'like new', 'Original', 'Brand', NULL, 'brown', '8th', NULL, NULL, '{\"Memory\": \"128\", \"Battery\": \"9000\", \"Display\": \"Amuled\", \"NETWORK\": \"4G\"}', 1, 0, '2022-10-11 12:11:33', '2022-10-11 12:11:33', NULL, 0, NULL, NULL, NULL, NULL, '', NULL),
(24, 1, 1, 0, 1, 5, 'Product testing two', 'selected-category', '90000.00', '2022-10-11-1665511920.png', 'SELECTED CATEGORY', 'like new', 'Original', 'Brand', NULL, 'brown', '8th', NULL, NULL, '{\"Memory\": \"128\", \"Battery\": \"9000\", \"Display\": \"Amuled\", \"NETWORK\": \"4G\"}', 1, 0, '2022-10-11 12:12:00', '2022-10-11 12:12:00', NULL, 0, NULL, NULL, NULL, NULL, '', NULL),
(25, 1, 1, 0, 1, 5, 'Product testing three', 'you-can-upload-up-to-10-photos', '90000.00', '2022-10-11-1665512203.png', 'YOU CAN UPLOAD UP TO 10 PHOTOS', 'used', 'Original', 'ABC Brand', NULL, NULL, '8th', NULL, NULL, '{\"Memory\": \"128\", \"Battery\": \"9000\", \"Display\": \"Amuled\", \"NETWORK\": \"3G\"}', 1, 0, '2022-10-11 12:16:43', '2022-10-11 12:16:43', NULL, 0, NULL, NULL, NULL, NULL, '', NULL),
(26, 1, 1, 0, 1, 5, 'Testing', 'testing', '90000.00', '2022-10-12-1665573535.png', 'Testing', 'like new', 'Original', 'Brand', NULL, 'light-blue', 'Edition', NULL, NULL, '{\"Memory\": \"128\", \"Battery\": \"9000\", \"Display\": \"Amuled\", \"NETWORK\": \"4G\"}', 1, 0, '2022-10-12 05:18:55', '2022-10-12 05:18:55', NULL, 0, NULL, NULL, NULL, NULL, '', NULL),
(27, 1, 1, 0, 1, 5, 'Testing Done', 'testing-done', '90000.00', '2022-10-12-1665588480.png', 'Testing Done', 'new', 'Original', 'Brand', NULL, 'dark-blue', '8th', NULL, NULL, '{\"Memory\": \"128\", \"Battery\": \"9000\", \"Display\": \"Amuled\", \"NETWORK\": \"4G\"}', 1, 0, '2022-10-12 09:28:00', '2022-10-12 09:28:00', NULL, 0, NULL, NULL, NULL, NULL, '', NULL),
(28, 1, 1, 0, 1, 6, 'Testing Payment Data', 'testing-payment-data', '90000.00', '2022-10-12-1665594711.png', 'Testing Payment Data', 'used', 'Original', 'Brand', NULL, 'dark-green', '8th', NULL, NULL, '{\"Memory\": \"128 GB\", \"Battery\": \"9000\", \"Display\": \"Amuled\", \"NETWORK\": \"$G\"}', 2, 0, '2022-10-12 11:11:51', '2022-10-23 05:37:02', NULL, 2, NULL, NULL, NULL, NULL, '', NULL),
(29, 1, 11, 0, 1, NULL, 'Again testing Data', 'again-testing-data', '90000.00', '2022-10-12-1665594980.png', 'Again testing Data', 'used', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 0, '2022-10-12 11:16:20', '2022-10-23 05:37:22', NULL, 20, NULL, NULL, 1, NULL, '', NULL),
(30, 1, 11, 0, 1, NULL, 'Again Testing', 'again-testing', '90000.00', '2022-10-12-1665595306.png', 'Again Testing', 'like new', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2022-10-12 11:21:46', '2022-10-13 11:21:46', NULL, 0, NULL, NULL, 0, NULL, '', NULL),
(31, 1, 1, 0, 1, 5, 'Again testing', 'again-testing', '90000.00', '2022-10-12-1665595398.png', 'Again testing', 'new', 'Original', 'Brand', NULL, 'brown', '8th', NULL, NULL, '{\"Memory\": \"128\", \"Battery\": \"9000\", \"Display\": \"Amuled\", \"NETWORK\": \"4G\"}', 1, 0, '2022-10-12 11:23:18', '2022-10-12 11:23:18', NULL, 0, NULL, NULL, 0, NULL, '', NULL),
(32, 1, 1, 0, 1, 6, 'Samsung Phone', 'samsung-phone', '90000.00', '2022-10-12-1665595710.png', 'Samsung Phone', 'new', 'Original', 'Brand', NULL, 'burgundy', '9th', NULL, NULL, '{\"Memory\": \"128\", \"Battery\": \"9000\", \"Display\": \"Amuled\", \"NETWORK\": \"4g\"}', 1, 0, '2022-10-12 11:28:30', '2022-10-12 11:28:30', NULL, 19, NULL, NULL, 0, NULL, '', NULL),
(33, 1, 1, 0, 1, 6, 'Samsung Phone', 'samsung-phone', '90000.00', '2022-10-12-1665595867.png', 'Samsung Phone', 'new', 'Refurbished', 'Brand', NULL, 'yellow', '9th', NULL, NULL, '{\"Memory\": \"128\", \"Battery\": \"9000\", \"Display\": \"Amuled\", \"NETWORK\": \"$G\"}', 1, 0, '2022-10-12 11:31:07', '2022-10-12 11:31:44', NULL, 3, NULL, NULL, 1, 1, '', NULL),
(34, 1, 1, 0, 1, 6, 'Samsung', 'samsung', '90000.00', '2022-10-13-1665646139.png', 'Samsung', 'new', NULL, 'Brand', NULL, 'light-green', '8th', NULL, NULL, '{\"Memory\": \"128\", \"Battery\": \"9000\", \"Display\": \"Amuled\", \"NETWORK\": \"4G\"}', 1, 0, '2022-10-11 06:00:00', '2022-10-13 01:29:49', '2022-11-17 18:00:00', 11, NULL, NULL, 1, 3, '', NULL),
(35, 1, 1, 0, 1, 6, 'Testing data', 'testing-data', '90000.00', '2022-10-15-1665836235.png', 'Testing data', 'used', 'Original', 'XYZ', NULL, 'dark-blue', '9th', NULL, NULL, '{\"Memory\": \"128\", \"Battery\": \"9000\", \"Display\": \"Amuled\", \"NETWORK\": \"4G\"}', 1, 0, '2022-10-15 06:17:16', '2022-10-15 06:17:16', NULL, 0, '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d14607.604248453179!2d90.38425380000001!3d23.750907299999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1665836173000!5m2!1sen!2sbd\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', NULL, 0, NULL, '', NULL),
(36, 1, 11, 0, 1, NULL, 'Others Category', 'others-category', '90000.00', '2022-10-16-1665901286.png', 'Others Category', 'new', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2022-10-16 00:21:26', '2022-10-16 00:21:26', NULL, 5, NULL, NULL, 0, NULL, '', NULL),
(37, 1, 7, 0, 1, 8, 'Car one', 'car-one', '90000.00', '2022-10-16-1665901427.png', 'Car one', 'used', 'original', 'adsd', NULL, 'dark-blue', NULL, NULL, NULL, '{\"gear\": \"straight\", \"run_km\": \"100000\", \"edition\": null, \"traction\": \"rear wheel drive\", \"body_type\": \"suv4x4\", \"engine_cc\": \"1000\", \"year_decade\": \"1981-1991\", \"transmission\": null, \"year_of_manufacture\": \"2000\"}', 1, 0, '2022-10-16 00:23:47', '2022-10-16 00:23:47', NULL, 2, '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d14607.604248453179!2d90.38425380000001!3d23.750907299999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1665901351099!5m2!1sen!2sbd\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', '[\"diesel\",\"hybrid\",\"electric\"]', 0, NULL, '', NULL),
(38, 1, 11, 0, 1, NULL, 'Electronics', 'electronics', '90000.00', '2022-10-16-1665901769.png', 'Electronics', 'new', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2022-10-16 00:29:29', '2022-10-16 00:29:29', NULL, 0, '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d14607.604248453179!2d90.38425380000001!3d23.750907299999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1665901351099!5m2!1sen!2sbd\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', NULL, 0, NULL, '', NULL),
(39, 1, 7, 0, 1, 8, 'sdfsdf', 'sdfsdf', '90000.00', '2022-10-16-1665902491.png', 'sdfsdf', 'used', NULL, '8jj', NULL, 'dark-blue', NULL, NULL, NULL, '{\"gear\": \"automatic\", \"run_km\": \"9000\", \"edition\": null, \"traction\": \"rear wheel drive\", \"body_type\": \"coupe/Sports\", \"engine_cc\": \"1000\", \"year_decade\": \"1992-2002\", \"transmission\": \"automatic\", \"year_of_manufacture\": \"2000\"}', 1, 0, '2022-10-16 00:41:31', '2022-10-16 00:41:31', NULL, 0, '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d14607.604248453179!2d90.38425380000001!3d23.750907299999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1665901351099!5m2!1sen!2sbd\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', '[\"diesel\",\"octane\",\"other\"]', 0, NULL, '', NULL),
(40, 1, 7, 0, 1, 10, 'আস্ফসদফসদ', 'asfsdfsd', '90000.00', '2022-10-16-1665902669.png', 'সদফসদফ', 'used', 'original', 'Brand', NULL, 'red', '8th', NULL, NULL, '{\"gear\": null, \"run_km\": \"7000\", \"edition\": \"8th\", \"traction\": \"rear wheel drive\", \"body_type\": \"coupe/Sports\", \"engine_cc\": \"1900\", \"year_decade\": \"1992-2002\", \"transmission\": null, \"year_of_manufacture\": \"2000\"}', 1, 0, '2022-10-16 00:44:29', '2022-10-16 00:44:29', NULL, 1, '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d14607.604248453179!2d90.38425380000001!3d23.750907299999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1665901351099!5m2!1sen!2sbd\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', '[\"diesel\",\"electric\",\"octane\"]', 0, NULL, '', NULL),
(41, 1, 11, 0, 1, NULL, 'AAaaaaaa1s', 'aaaaaaaa1s', '9000.00', '2022-10-16-1665902765.png', 'adddd', 'new', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2022-10-16 00:46:05', '2022-10-16 00:46:05', NULL, 0, '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d14607.604248453179!2d90.38425380000001!3d23.750907299999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1665901351099!5m2!1sen!2sbd\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', NULL, 0, NULL, '', NULL),
(42, 1, 11, 0, 1, NULL, 'AAAAAAaaaA', 'aaaaaaaaaa', '90000.00', '2022-10-16-1665902926.png', 'AAAAAAaaaA', 'used', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2022-10-16 00:48:46', '2022-10-16 00:48:46', NULL, 0, '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d14607.604248453179!2d90.38425380000001!3d23.750907299999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1665901351099!5m2!1sen!2sbd\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', NULL, 0, NULL, '', NULL),
(43, 1, 11, 0, 1, NULL, 'General Products', 'general-products', '90000.00', '2022-10-16-1665903124.png', 'General Products', 'new', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2022-10-16 00:52:04', '2022-10-16 00:52:04', NULL, 0, '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d14607.604248453179!2d90.38425380000001!3d23.750907299999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1665901351099!5m2!1sen!2sbd\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', NULL, 0, NULL, '', NULL),
(44, 1, 11, 0, 1, NULL, 'Other ad', 'other-ad', '90000.00', '2022-10-16-1665903215.png', 'Other ad', 'new', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2022-10-16 00:53:35', '2022-10-16 00:53:35', NULL, 10, '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d14607.604248453179!2d90.38425380000001!3d23.750907299999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1665901351099!5m2!1sen!2sbd\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', NULL, 0, NULL, '', NULL),
(45, 1, 11, 0, 1, NULL, 'POST AN AD', 'post-an-ad', '90000.00', '2022-10-16-1665903413.png', 'POST AN AD', 'new', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2022-10-16 00:56:53', '2022-10-16 00:56:53', NULL, 0, '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d14607.604248453179!2d90.38425380000001!3d23.750907299999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1665901351099!5m2!1sen!2sbd\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', NULL, 0, NULL, '', NULL),
(46, 1, 2, 0, 1, 12, 'sdjfhklsd', 'sdjfhklsd', '90000.00', '2022-10-16-1665911008.png', 'sldjfhlsdfh', 'used', 'Original', 'asdfsd', NULL, 'dark-green', NULL, NULL, NULL, NULL, 1, 0, '2022-10-10 18:00:00', '2022-10-16 03:15:41', '2022-11-24 18:00:00', 36, '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d14607.604248453179!2d90.38425380000001!3d23.750907299999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1665901351099!5m2!1sen!2sbd\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', NULL, 1, 1, '', NULL),
(47, 1, 2, 0, 1, 12, 'Walton Freezer', 'walton-freezer', '90000.00', '2022-10-16-1665912299.png', 'Walton Freezer', 'like new', 'Original', 'Walton', NULL, 'brown', NULL, NULL, NULL, '{\"model\": \"AZ200\"}', 2, 0, '2022-10-10 18:00:00', '2022-11-16 11:20:46', '2022-11-24 18:00:00', 10, '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d14607.604248453179!2d90.38425380000001!3d23.750907299999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1665901351099!5m2!1sen!2sbd\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', NULL, 1, 1, '', NULL),
(48, 1, 2, 0, 1, 12, 'Refrigerator', 'refrigerator', '90000.00', '2022-10-16-1665920198.png', 'Refrigerator', 'new', 'Original', 'Brand', NULL, 'brown', NULL, NULL, NULL, '{\"model\": \"SC8\"}', 1, 0, '2022-10-16 05:36:38', '2022-10-16 05:36:38', '2022-11-24 18:00:00', 19, NULL, NULL, 0, NULL, '', NULL),
(49, 1, 16, 0, 1, 17, 'Eye Frame', 'eye-frame', '900.00', '2022-10-16-1665932590.png', 'Eye Frame', 'used', NULL, 'Brand', NULL, NULL, NULL, NULL, NULL, NULL, 2, 0, '2022-10-16 09:03:10', '2022-11-16 11:20:35', NULL, 5, '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d14607.604248453179!2d90.38425380000001!3d23.750907299999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1665932116374!5m2!1sen!2sbd\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', NULL, 0, NULL, '', NULL),
(50, 1, 1, 0, 1, 6, 'Hello', 'hello', '9000.00', '2022-10-20-1666278034.png', 'Hello', 'used', 'Original', 'Brand', NULL, 'brown', '8th', NULL, NULL, '{\"Memory\": \"120\", \"Battery\": \"9000\", \"Display\": \"Amuled\", \"NETWORK\": \"4G\"}', 2, 0, '2022-10-20 09:00:34', '2022-11-16 11:20:26', NULL, 12, '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d14607.604248453179!2d90.38425380000001!3d23.750907299999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1666277971195!5m2!1sen!2sbd\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', NULL, 0, NULL, '', NULL),
(51, 2, 1, 0, 1, 6, 'Product for Paypal testing', 'product-for-paypal-testing', '90000.00', '2022-10-21-1666378894.png', 'Product for Paypal testing', 'used', 'Refurbished', 'Brand', NULL, 'dark-blue', '9th', NULL, NULL, '{\"Memory\": \"128\", \"Battery\": \"8000\", \"Display\": \"Amuled\", \"NETWORK\": \"4g\"}', 1, 0, '2022-10-21 13:01:34', '2022-10-21 13:01:34', NULL, 23, '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d14607.604248453179!2d90.38425380000001!3d23.750907299999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1666378767567!5m2!1sen!2sbd\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', NULL, 0, NULL, '', NULL),
(52, 2, 1, 0, 1, 6, 'Payment testing', 'payment-testing', '89000.00', '2022-10-21-1666379567.png', 'Payment testing', 'used', 'Original', 'Brand', NULL, 'burgundy', '9th', NULL, NULL, '{\"Memory\": \"128\", \"Battery\": \"9000\", \"Display\": \"Amuled\", \"NETWORK\": \"4g\"}', 1, 0, '2022-10-21 13:12:47', '2022-10-21 13:12:47', NULL, 0, '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d14607.604248453179!2d90.38425380000001!3d23.750907299999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1666378767567!5m2!1sen!2sbd\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', NULL, 0, NULL, '', NULL),
(53, 2, 1, 0, 1, 6, 'Against testing PayPal payment', 'against-testing-paypal-payment', '80000.00', '2022-10-21-1666380220.png', 'Against testing PayPal payment', 'new', 'Refurbished', 'Brand', NULL, 'white', '8th', NULL, NULL, '{\"Memory\": \"120\", \"Battery\": \"9000\", \"Display\": \"Amuled\", \"NETWORK\": \"4g\"}', 1, 0, '2022-10-11 18:00:00', '2022-10-21 13:24:09', '2022-10-17 17:59:00', 0, NULL, NULL, 1, 2, '', NULL),
(54, 2, 1, 0, 1, 5, 'asdfsd', 'asdfsd', '90000.00', '2022-10-21-1666380443.png', 'asdfsdf', 'new', 'Original', 'badfsd', NULL, 'burgundy', '9t', NULL, NULL, '{\"Memory\": \"90\", \"Battery\": \"9000\", \"Display\": \"amuled\", \"NETWORK\": \"4g\"}', 1, 0, '2022-10-21 13:27:23', '2022-10-21 13:27:23', NULL, 8, NULL, NULL, 0, NULL, '', NULL),
(55, 2, 1, 0, 1, 6, 'ADAD', 'adad', '90000.00', '2022-10-21-1666380832.png', 'ASDASD', 'used', 'Original', 'JSDFH', NULL, 'light-blue', '9TH', NULL, NULL, '{\"Memory\": \"120\", \"Battery\": \"9000\", \"Display\": \"AMULED\", \"NETWORK\": \"4G\"}', 1, 0, '2022-10-10 18:00:00', '2022-10-21 13:34:33', '2022-10-13 17:59:00', 8, '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d14607.604248453179!2d90.38425380000001!3d23.750907299999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1666378767567!5m2!1sen!2sbd\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', NULL, 1, 1, '', NULL),
(56, 2, 1, 0, 1, 6, 'Final testing', 'final-testing', '90000.00', '2022-10-21-1666381004.png', 'Final testing', 'like new', 'Original', 'ABC brand', NULL, 'brown', '9th', NULL, NULL, '{\"Memory\": \"120\", \"Battery\": \"9000\", \"Display\": \"Super Amuled\", \"NETWORK\": \"$G\"}', 1, 0, '2022-10-10 18:00:00', '2022-10-21 13:37:13', '2022-10-13 17:59:00', 3, '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d14607.604248453179!2d90.38425380000001!3d23.750907299999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1666378767567!5m2!1sen!2sbd\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', NULL, 1, 1, '', NULL),
(57, 2, 1, 0, 1, 6, 'ddaaaa', 'ddaaaa', '90000.00', '2022-10-21-1666381213.png', 'ddaaaa', 'new', 'Original', 'Brand', 'ABC', 'brown', '8th', '2011', NULL, '{\"Memory\": \"1200\", \"Battery\": \"10000\", \"Display\": \"New Amuled\", \"NETWORK\": \"4G\"}', 1, 0, '2022-10-10 18:00:00', '2022-11-17 08:28:49', '2022-10-26 17:59:00', 5, '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d14607.604248453179!2d90.38425380000001!3d23.750907299999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1666378767567!5m2!1sen!2sbd\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', NULL, 1, 1, '', NULL),
(59, 1, 7, 0, 1, 8, 'X Corolla 210ED2000', 'x-corolla-210ed2000', '90000.00', '2022-11-16-1668594023.png', 'Testing data', 'used', 'original', 'X Corolla', '210ED', 'dark-grey', '8th', '2000', NULL, '{\"gear\": \"automatic\", \"run_km\": \"9000\", \"edition\": \"8th\", \"traction\": \"4 wheel drive\", \"body_type\": \"coupe/Sports\", \"engine_cc\": \"3000\", \"year_decade\": \"1981-1991\", \"transmission\": \"automatic\", \"year_of_manufacture\": \"2000\"}', 1, 0, '2022-11-16 04:20:23', '2022-11-17 08:13:59', NULL, 0, NULL, '[\"diesel\",\"cng\",\"octane\",\"lpg\"]', 0, NULL, '', NULL),
(60, 1, 7, 0, 1, 8, 'Brand ABC Model 2000', 'brand-abc-model-2000', '9000.00', '2022-11-19-1668857173.png', 'SEO Data check', 'like new', 'original', 'Brand', 'ABC Model', 'light-blue', '8thq', NULL, NULL, '{\"gear\": \"automatic\", \"run_km\": \"9000\", \"edition\": \"8thq\", \"traction\": \"rear wheel drive\", \"body_type\": \"convertible\", \"engine_cc\": \"27000\", \"year_decade\": \"1992-2002\", \"transmission\": \"automatic\", \"year_of_manufacture\": \"2000\"}', 1, 0, '2022-11-19 05:26:14', '2022-11-19 05:26:14', NULL, 18, NULL, '[\"diesel\",\"cng\",\"hybrid\",\"electric\"]', 0, NULL, 'tag,tag1, tag2', 'Meta title'),
(61, 1, 7, 0, 1, 8, 'Brand one AZ 2000', 'brand-one-az-2000', '80000.00', '2022-11-20-1668945963.png', 'Testing', 'used', 'original', 'Brand one', 'AZ', 'yellow', '9th', NULL, NULL, '{\"gear\": \"direct drive\", \"run_km\": \"9000\", \"edition\": \"9th\", \"traction\": \"rear wheel drive\", \"body_type\": null, \"engine_cc\": \"9000\", \"year_decade\": \"1981-1991\", \"transmission\": \"manual\", \"year_of_manufacture\": \"2000\"}', 1, 0, '2022-11-20 06:06:03', '2022-11-20 06:06:03', NULL, 1, NULL, '[\"diesel\",\"cng\",\"octane\"]', 0, NULL, 'tag1', 'meta title'),
(62, 1, 7, 0, 1, 8, 'Brand AZW 2000', 'brand-azw-2000', '89999.00', '2022-11-20-1668948681.png', 'ADD SOME INFO', 'new', 'refubrished', 'Brand', 'AZW', 'beige', '8th', NULL, NULL, '{\"gear\": \"straight\", \"run_km\": \"17000\", \"edition\": \"8th\", \"traction\": \"rear wheel drive\", \"body_type\": \"mpv\", \"engine_cc\": \"9000\", \"year_decade\": \"1981-1991\", \"transmission\": \"automatic\", \"year_of_manufacture\": \"2000\"}', 1, 0, '2022-11-20 06:51:21', '2022-11-20 06:51:21', NULL, 0, NULL, '[\"diesel\",\"cng\",\"hybrid\"]', 0, NULL, 'Tag1, Tag2', 'Meta Title'),
(63, 1, 7, 0, 1, 8, 'Brand one 2500 2000', 'brand-one-2500-2000', '90000.00', '2022-11-22-1669093703.png', 'Testing stripe', 'used', 'original', 'Brand one', '2500', 'dark-grey', '8th', NULL, NULL, '{\"gear\": null, \"run_km\": \"25000\", \"edition\": \"8th\", \"traction\": \"rear wheel drive\", \"body_type\": \"estate\", \"engine_cc\": \"2500\", \"year_decade\": \"2003-2013\", \"transmission\": \"automatic\", \"year_of_manufacture\": \"2000\"}', 1, 0, '2022-11-21 23:08:23', '2022-11-21 23:08:23', NULL, 1, NULL, '[\"diesel\",\"cng\",\"electric\"]', 0, NULL, 'tag1, tag2', 'Meta title'),
(64, 1, 7, 0, 1, 8, 'Brand A210 2022', 'brand-a210-2022', '85000.00', '2022-11-22-1669101653.png', 'Just testing', 'new', NULL, 'Brand', 'A210', NULL, '15th', NULL, NULL, '{\"gear\": \"automatic\", \"run_km\": \"25000\", \"edition\": \"15th\", \"traction\": \"rear wheel drive\", \"body_type\": \"estate\", \"engine_cc\": \"25000\", \"year_decade\": \"1992-2002\", \"transmission\": \"automatic\", \"year_of_manufacture\": \"2022\"}', 1, 0, '2022-10-10 18:00:00', '2022-11-22 01:55:18', '2022-10-13 17:59:00', 1, NULL, '[\"diesel\",\"cng\",\"lpg\"]', 1, 1, 'tag1, tag2', 'Meta title'),
(65, 1, 7, 0, 1, 8, 'askdfhgsdf hsdflhsdlfk 2000', 'askdfhgsdf-hsdflhsdlfk-2000', '90000.00', '2022-11-22-1669123773.png', 'asdfsdfsd', 'used', 'original', 'askdfhgsdf', 'hsdflhsdlfk', 'dark-blue', '8th', NULL, NULL, '{\"gear\": \"direct drive\", \"run_km\": \"25000\", \"edition\": \"8th\", \"traction\": \"rear wheel drive\", \"body_type\": \"pick-up\", \"engine_cc\": \"2500\", \"year_decade\": \"1992-2002\", \"transmission\": \"manual\", \"year_of_manufacture\": \"2000\"}', 1, 0, '2022-10-10 18:00:00', '2022-11-22 07:59:44', '2022-10-13 17:59:00', 0, NULL, '[\"diesel\",\"cng\"]', 1, 1, 'Tag1, tag2', 'Meta title'),
(66, 1, 7, 0, 1, 8, 'sdfsdf sadfsdf 2000', 'sdfsdf-sadfsdf-2000', '9000.00', '2022-11-22-1669126195.png', 'asdfsdfsdfdsf', 'new', NULL, 'sdfsdf', 'sadfsdf', 'red', '9th', NULL, NULL, '{\"gear\": null, \"run_km\": \"2000\", \"edition\": \"9th\", \"traction\": \"front wheel drive\", \"body_type\": \"mpv\", \"engine_cc\": \"2500\", \"year_decade\": \"2003-2013\", \"transmission\": \"automatic\", \"year_of_manufacture\": \"2000\"}', 1, 0, '2022-10-10 18:00:00', '2022-11-22 08:11:39', '2022-10-13 17:59:00', 1, NULL, '[\"diesel\",\"cng\",\"electric\"]', 1, 1, 'Tag1, Tag2', 'sdafsdfsdf'),
(67, 1, 7, 0, 1, 8, 'Roche Az20 2021', 'roche-az20-2021', '9000.00', '2022-11-22-1669132792.png', 'dummy test', 'used', 'original', 'Roche', 'Az20', 'dark-grey', '9th', NULL, NULL, '{\"gear\": \"automatic\", \"run_km\": \"30000\", \"edition\": \"9th\", \"traction\": \"rear wheel drive\", \"body_type\": \"estate\", \"engine_cc\": \"2500\", \"year_decade\": \"1992-2002\", \"transmission\": null, \"year_of_manufacture\": \"2021\"}', 1, 0, '2022-10-11 18:00:00', '2022-11-22 10:02:16', '2022-10-17 17:59:00', 0, NULL, '[\"diesel\",\"cng\",\"electric\",\"lpg\"]', 1, 2, 'tag1, tag2', 'Meta title dummy'),
(68, 1, 7, 0, 1, 8, 'Roche Az250 2000', 'roche-az250-2000', '3500000.00', '2022-11-22-1669133245.png', 'Again dummy test', 'used', 'original', 'Roche', 'Az250', 'dark-grey', '9th', NULL, NULL, '{\"gear\": \"automatic\", \"run_km\": \"23000\", \"edition\": \"9th\", \"traction\": \"rear wheel drive\", \"body_type\": \"convertible\", \"engine_cc\": \"2500\", \"year_decade\": \"1992-2002\", \"transmission\": null, \"year_of_manufacture\": \"2000\"}', 1, 0, '2022-10-11 06:00:00', '2022-11-22 10:10:08', '2022-10-26 05:00:00', 0, NULL, '[\"diesel\",\"petrol\",\"cng\",\"octane\"]', 1, 3, 'tag2, tag3', 'Meta title'),
(69, 1, 7, 0, 1, 8, 'Brand1 Model 2 20000', 'brand1-model-2-20000', '900000.00', '2022-11-22-1669134100.png', 'Explanation', 'used', 'original', 'Brand1', 'Model 2', NULL, NULL, NULL, NULL, '{\"gear\": \"straight\", \"run_km\": \"250000\", \"edition\": null, \"traction\": \"rear wheel drive\", \"body_type\": \"mpv\", \"engine_cc\": \"2500\", \"year_decade\": \"1992-2002\", \"transmission\": null, \"year_of_manufacture\": \"20000\"}', 1, 0, '2022-10-11 06:00:00', '2022-11-22 10:23:59', '2022-10-26 05:00:00', 0, NULL, '[\"diesel\",\"cng\",\"octane\"]', 1, 3, 'tag', 'meta title'),
(70, 1, 7, 0, 1, 8, 'Brand Brand 2000', 'brand-brand-2000', '8999999.00', '2022-11-22-1669135064.png', 'Testing', 'used', 'refubrished', 'Brand', 'Brand', 'light-blue', '8th', NULL, NULL, '{\"gear\": \"straight\", \"run_km\": \"90000\", \"edition\": \"8th\", \"traction\": \"4 wheel drive\", \"body_type\": \"hatchback\", \"engine_cc\": \"3000\", \"year_decade\": \"1992-2002\", \"transmission\": \"manual\", \"year_of_manufacture\": \"2000\"}', 1, 0, '2022-11-22 10:37:44', '2022-11-22 10:37:44', NULL, 1, NULL, '[\"diesel\",\"cng\"]', 0, NULL, 'tag', 'meta tag'),
(71, 1, 7, 0, 1, 8, 'XVV DLP20 2000', 'xvv-dlp20-2000', '1800000.00', '2022-11-22-1669136432.png', 'ADD SOME INFO', 'new', 'original', 'XVV', 'DLP20', 'burgundy', NULL, NULL, NULL, '{\"gear\": \"direct drive\", \"run_km\": \"35000\", \"edition\": null, \"traction\": \"4 wheel drive\", \"body_type\": \"roadster\", \"engine_cc\": \"3500\", \"year_decade\": \"1992-2002\", \"transmission\": \"manual\", \"year_of_manufacture\": \"2000\"}', 1, 0, '2022-11-22 11:00:32', '2022-11-22 11:00:32', NULL, 0, NULL, '[\"diesel\",\"cng\",\"electric\"]', 0, NULL, 'taqg', 'sadfsdfsdf'),
(72, 1, 7, 0, 1, 8, 'Brand Model Year', 'brand-model-year', '8500000.00', '2022-11-22-1669136886.png', 'ADD SOME INFO', 'used', 'refubrished', 'Brand', 'Model', 'red', '12th', NULL, NULL, '{\"gear\": \"straight\", \"run_km\": \"50000\", \"edition\": \"12th\", \"traction\": \"rear wheel drive\", \"body_type\": \"convertible\", \"engine_cc\": \"3500\", \"year_decade\": \"1992-2002\", \"transmission\": \"manual\", \"year_of_manufacture\": \"Year\"}', 1, 0, '2022-11-22 11:08:06', '2022-11-22 11:08:06', NULL, 1, NULL, '[\"diesel\",\"petrol\",\"cng\"]', 0, NULL, 'Tag1', 'Meta Title'),
(73, 1, 7, 0, 1, 8, 'asdfsdf asdfsdf 2021', 'asdfsdf-asdfsdf-2021', '952000.00', '2022-11-22-1669137598.png', 'sadfsdfd', 'like new', 'original', 'asdfsdf', 'asdfsdf', 'red', '9th', NULL, NULL, '{\"gear\": \"direct drive\", \"run_km\": \"36000\", \"edition\": \"9th\", \"traction\": \"4 wheel drive\", \"body_type\": \"convertible\", \"engine_cc\": \"3600\", \"year_decade\": \"1981-1991\", \"transmission\": \"automatic\", \"year_of_manufacture\": \"2021\"}', 1, 0, '2022-11-22 11:19:58', '2022-11-22 11:19:58', NULL, 0, NULL, '[\"diesel\",\"cng\"]', 0, NULL, 'asdfsdf', 'asdfsdf'),
(74, 1, 7, 0, 1, 8, 'AAA BBB 2000', 'aaa-bbb-2000', '2500000.00', '2022-11-22-1669138125.png', 'asfdfsdf', 'new', 'original', 'AAA', 'BBB', 'beige', '8th', NULL, NULL, '{\"gear\": \"straight\", \"run_km\": \"25000\", \"edition\": \"8th\", \"traction\": \"front wheel drive\", \"body_type\": \"estate\", \"engine_cc\": \"3600\", \"year_decade\": \"1992-2002\", \"transmission\": \"manual\", \"year_of_manufacture\": \"2000\"}', 1, 0, '2022-11-22 11:28:45', '2022-11-22 11:28:45', NULL, 0, NULL, '[\"diesel\",\"cng\",\"hybrid\"]', 0, NULL, 'afsdfsd', 'sdafsdf'),
(75, 1, 7, 0, 1, 8, 'Brand Model 2000', 'brand-model-2000', '564564.00', '2022-11-22-1669138919.png', 'sadfsdf', 'new', 'original', 'Brand', 'Model', NULL, '9th', NULL, NULL, '{\"gear\": \"straight\", \"run_km\": \"600000\", \"edition\": \"9th\", \"traction\": \"4 wheel drive\", \"body_type\": \"estate\", \"engine_cc\": \"2500\", \"year_decade\": \"1992-2002\", \"transmission\": \"automatic\", \"year_of_manufacture\": \"2000\"}', 1, 0, '2022-11-22 11:41:59', '2022-11-22 11:41:59', NULL, 0, NULL, '[\"diesel\",\"cng\"]', 0, NULL, 'sdfsd', 'asdfsdf'),
(76, 1, 7, 0, 1, 8, 'Brand Model 2000', 'brand-model-2000', '564564.00', '2022-11-22-1669138979.png', 'sadfsdf', 'new', 'original', 'Brand', 'Model', NULL, '9th', NULL, NULL, '{\"gear\": \"straight\", \"run_km\": \"600000\", \"edition\": \"9th\", \"traction\": \"4 wheel drive\", \"body_type\": \"estate\", \"engine_cc\": \"2500\", \"year_decade\": \"1992-2002\", \"transmission\": \"automatic\", \"year_of_manufacture\": \"2000\"}', 1, 0, '2022-11-22 11:42:59', '2022-11-22 11:42:59', NULL, 0, NULL, '[\"diesel\",\"cng\",\"lpg\"]', 0, NULL, 'sdfsd', 'asdfsdf'),
(77, 1, 7, 0, 1, 8, 'Brand Model 2000', 'brand-model-2000', '564564.00', '2022-11-22-1669139077.png', 'sadfsdf', 'new', 'original', 'Brand', 'Model', NULL, '9th', NULL, NULL, '{\"gear\": \"straight\", \"run_km\": \"600000\", \"edition\": \"9th\", \"traction\": \"4 wheel drive\", \"body_type\": \"estate\", \"engine_cc\": \"2500\", \"year_decade\": \"1992-2002\", \"transmission\": \"automatic\", \"year_of_manufacture\": \"2000\"}', 1, 0, '2022-11-22 11:44:37', '2022-11-22 11:44:37', NULL, 1, NULL, '[\"diesel\",\"petrol\",\"cng\"]', 0, NULL, 'sdfsd', 'asdfsdf'),
(78, 1, 7, 0, 1, 8, 'asdfsdf asdfsdfd 2000', 'asdfsdf-asdfsdfd-2000', '454644551.00', '2022-11-22-1669139672.png', 'asdfsdf', 'used', 'original', 'asdfsdf', 'asdfsdfd', 'light-green', '8th', NULL, NULL, '{\"gear\": \"straight\", \"run_km\": \"25000\", \"edition\": \"8th\", \"traction\": \"front wheel drive\", \"body_type\": \"estate\", \"engine_cc\": \"3600\", \"year_decade\": \"1981-1991\", \"transmission\": \"other_transmission\", \"year_of_manufacture\": \"2000\"}', 1, 0, '2022-11-22 11:54:32', '2022-11-22 11:54:32', NULL, 0, NULL, '[\"diesel\",\"cng\"]', 0, NULL, 'asfdsd', 'sadfsdf'),
(79, 1, 7, 0, 1, 8, 'sadfsdf asdfsdfd 2000', 'sadfsdf-asdfsdfd-2000', '649995.00', '2022-11-22-1669140164.png', 'asdfdsfd', 'new', 'refubrished', 'sadfsdf', 'asdfsdfd', 'red', '8th', NULL, NULL, '{\"gear\": \"semiautomatic\", \"run_km\": \"25000\", \"edition\": \"8th\", \"traction\": \"front wheel drive\", \"body_type\": \"suv4x4\", \"engine_cc\": \"25000\", \"year_decade\": \"1981-1991\", \"transmission\": \"automatic\", \"year_of_manufacture\": \"2000\"}', 1, 0, '2022-11-22 12:02:44', '2022-11-22 12:02:44', NULL, 7, NULL, '[\"diesel\",\"cng\"]', 0, NULL, 'asfsdf', 'asdfsdf'),
(80, 1, 7, 0, 1, 8, 'sadfsdf asdfsdfd 2000', 'sadfsdf-asdfsdfd-2000', '649995.00', '2022-11-22-1669140385.png', 'asdfdsfd', 'new', 'refubrished', 'sadfsdf', 'asdfsdfd', 'red', '8th', NULL, NULL, '{\"gear\": \"semiautomatic\", \"run_km\": \"25000\", \"edition\": \"8th\", \"traction\": \"front wheel drive\", \"body_type\": \"suv4x4\", \"engine_cc\": \"25000\", \"year_decade\": \"1981-1991\", \"transmission\": \"automatic\", \"year_of_manufacture\": \"2000\"}', 1, 0, '2022-10-11 06:00:00', '2022-11-22 12:08:52', '2022-10-26 05:00:00', 2, NULL, '[\"diesel\",\"cng\"]', 1, 3, 'asfsdf', 'asdfsdf'),
(81, 1, 7, 0, 1, 8, 'Brand My Model 2021', 'brand-my-model-2021', '90000.00', '2022-11-22-1669140693.png', 'asdfsdfds', 'new', 'refubrished', 'Brand', 'My Model', 'dark-grey', '9th', NULL, NULL, '{\"gear\": \"automatic\", \"run_km\": \"36000\", \"edition\": \"9th\", \"traction\": \"rear wheel drive\", \"body_type\": \"convertible\", \"engine_cc\": \"2500\", \"year_decade\": \"1992-2002\", \"transmission\": \"manual\", \"year_of_manufacture\": \"2021\"}', 1, 0, '2022-10-11 06:00:00', '2022-11-22 12:12:04', '2022-10-26 05:00:00', 1, NULL, '[\"diesel\",\"cng\"]', 1, 3, 'Tag1', 'Tag1'),
(82, 1, 7, 0, 1, 8, 'Brand Self Model 2000', 'brand-self-model-2000', '4999998.00', '2022-11-22-1669141496.png', 'sfsdfds', 'new', 'original', 'Brand', 'Self Model', 'brown', '8th', NULL, NULL, '{\"gear\": \"straight\", \"run_km\": \"23000\", \"edition\": \"8th\", \"traction\": \"front wheel drive\", \"body_type\": \"pick-up\", \"engine_cc\": \"2500\", \"year_decade\": \"1992-2002\", \"transmission\": null, \"year_of_manufacture\": \"2000\"}', 1, 0, '2022-11-22 12:24:56', '2022-11-22 12:24:56', NULL, 1, NULL, '[\"diesel\",\"lpg\"]', 0, NULL, 'Tag1', 'Meta Title'),
(83, 1, 7, 0, 1, 8, 'asfds asdfdsf 2022', 'asfds-asdfdsf-2022', '360000.00', '2022-11-22-1669141685.png', 'asdfsdfdfd', 'used', 'original', 'asfds', 'asdfdsf', 'brown', '9th', NULL, NULL, '{\"gear\": \"straight\", \"run_km\": \"25000\", \"edition\": \"9th\", \"traction\": \"rear wheel drive\", \"body_type\": \"roadster\", \"engine_cc\": \"3600\", \"year_decade\": \"1981-1991\", \"transmission\": \"manual\", \"year_of_manufacture\": \"2022\"}', 1, 0, '2022-11-22 12:28:05', '2022-11-22 12:28:05', NULL, 1, NULL, '[\"diesel\",\"cng\",\"electric\"]', 0, NULL, 'sfsdfasf', 'sadfsdf'),
(84, 1, 7, 0, 1, 8, 'asdfds asdfdsf 2009', 'asdfds-asdfdsf-2009', '900000.00', '2022-11-22-1669142427.png', 'asfsdfds', 'used', 'refubrished', 'asdfds', 'asdfdsf', 'light-grey', '8th', NULL, NULL, '{\"gear\": \"straight\", \"run_km\": \"36000\", \"edition\": \"8th\", \"traction\": \"rear wheel drive\", \"body_type\": \"hatchback\", \"engine_cc\": \"3600\", \"year_decade\": \"1981-1991\", \"transmission\": \"manual\", \"year_of_manufacture\": \"2009\"}', 1, 0, '2022-11-22 12:40:27', '2022-11-22 12:40:27', NULL, 0, NULL, '[\"petrol\",\"cng\",\"lpg\"]', 0, NULL, 'asdfds', 'asfsdfds'),
(85, 1, 7, 0, 1, 8, 'asdfsdf sadfsdfds 2015', 'asdfsdf-sadfsdfds-2015', '9000000.00', '2022-11-22-1669142668.png', 'asfsdfds', 'new', 'original', 'asdfsdf', 'sadfsdfds', 'brown', '9th', NULL, NULL, '{\"gear\": \"straight\", \"run_km\": \"25000\", \"edition\": \"9th\", \"traction\": \"front wheel drive\", \"body_type\": \"hatchback\", \"engine_cc\": \"3600\", \"year_decade\": \"1981-1991\", \"transmission\": null, \"year_of_manufacture\": \"2015\"}', 1, 0, '2022-10-11 06:00:00', '2022-11-22 12:46:01', '2022-10-26 05:00:00', 0, NULL, '[\"diesel\",\"cng\"]', 1, 3, 'asfsdf', 'sadfdfd'),
(86, 1, 7, 0, 1, 8, 'fasdfds asfsdf sdfsdfds', 'fasdfds-asfsdf-sdfsdfds', '900000.00', '2022-11-22-1669142867.png', 'asfdsfd', 'used', 'original', 'fasdfds', 'asfsdf', 'dark-blue', '9th', NULL, NULL, '{\"gear\": \"automatic\", \"run_km\": \"25000\", \"edition\": \"9th\", \"traction\": \"rear wheel drive\", \"body_type\": \"pick-up\", \"engine_cc\": \"3600\", \"year_decade\": \"1981-1991\", \"transmission\": \"manual\", \"year_of_manufacture\": \"sdfsdfds\"}', 1, 0, '2022-11-22 12:47:47', '2022-11-22 12:47:47', NULL, 0, NULL, '[\"diesel\",\"cng\"]', 0, NULL, 'safsdsadfsd', 'sfsfdsf'),
(87, 1, 7, 0, 1, 8, 'fasdfds asfsdf sdfsdfds', 'fasdfds-asfsdf-sdfsdfds', '900000.00', '2022-11-22-1669143189.png', 'asfdsfd', 'used', 'original', 'fasdfds', 'asfsdf', 'dark-blue', '9th', NULL, NULL, '{\"gear\": \"automatic\", \"run_km\": \"25000\", \"edition\": \"9th\", \"traction\": \"rear wheel drive\", \"body_type\": \"pick-up\", \"engine_cc\": \"3600\", \"year_decade\": \"1981-1991\", \"transmission\": \"manual\", \"year_of_manufacture\": \"sdfsdfds\"}', 1, 0, '2022-10-11 06:00:00', '2022-11-22 12:57:57', '2022-10-26 05:00:00', 0, NULL, '[\"cng\",\"lpg\"]', 1, 3, 'safsdsadfsd', 'sfsfdsf'),
(88, 1, 7, 0, 1, 8, 'Brand Model 2021', 'brand-model-2021', '95000.00', '2022-11-22-1669143634.png', 'Explanation', 'used', 'original', 'Brand', 'Model', 'light-green', '8th', NULL, NULL, '{\"gear\": \"direct drive\", \"run_km\": \"250000\", \"edition\": \"8th\", \"traction\": \"rear wheel drive\", \"body_type\": \"convertible\", \"engine_cc\": \"25000\", \"year_decade\": \"1992-2002\", \"transmission\": \"automatic\", \"year_of_manufacture\": \"2021\"}', 1, 0, '2022-10-11 18:00:00', '2022-11-22 13:06:03', '2022-10-17 17:59:00', 1, NULL, '[\"diesel\",\"cng\"]', 1, 2, 'Tag1', 'Meta'),
(89, 1, 7, 0, 1, 8, 'Brand Model 2021', 'brand-model-2021', '980000.00', '2022-11-22-1669144074.png', 'safsdf', 'used', 'original', 'Brand', 'Model', 'dark-blue', '80', NULL, NULL, '{\"gear\": null, \"run_km\": \"50000\", \"edition\": \"80\", \"traction\": \"rear wheel drive\", \"body_type\": \"sedan\", \"engine_cc\": \"3600\", \"year_decade\": \"1981-1991\", \"transmission\": \"manual\", \"year_of_manufacture\": \"2021\"}', 1, 0, '2022-10-11 06:00:00', '2022-11-22 13:08:16', '2022-10-26 05:00:00', 2, NULL, '[\"diesel\",\"cng\"]', 1, 3, 'tas', 'sadfsd'),
(90, 1, 7, 0, 1, 8, 'sdfsd asdfsd 2025', 'sdfsd-asdfsd-2025', '960000.00', '2022-11-22-1669144554.png', 'asdfsdfd', 'used', 'original', 'sdfsd', 'asdfsd', 'dark-grey', '8th', NULL, NULL, '{\"gear\": null, \"run_km\": \"25000\", \"edition\": \"8th\", \"traction\": \"front wheel drive\", \"body_type\": \"pick-up\", \"engine_cc\": \"2500\", \"year_decade\": \"1992-2002\", \"transmission\": \"automatic\", \"year_of_manufacture\": \"2025\"}', 1, 0, '2022-10-11 06:00:00', '2022-11-22 13:16:14', '2022-10-26 05:00:00', 0, NULL, '[\"diesel\",\"cng\"]', 1, 3, 'safsd', 'asfsdf'),
(91, 1, 7, 0, 1, 8, 'asdfsd sfsdf 2025', 'asdfsd-sfsdf-2025', '920000.00', '2022-11-22-1669144686.png', 'sdfsdfds', 'used', 'original', 'asdfsd', 'sfsdf', 'brown', '8th', NULL, NULL, '{\"gear\": \"straight\", \"run_km\": \"25000\", \"edition\": \"8th\", \"traction\": \"rear wheel drive\", \"body_type\": \"sedan\", \"engine_cc\": \"2500\", \"year_decade\": \"1981-1991\", \"transmission\": \"automatic\", \"year_of_manufacture\": \"2025\"}', 1, 0, '2022-10-11 06:00:00', '2022-11-22 13:18:28', '2022-10-26 05:00:00', 6, NULL, '[\"diesel\",\"cng\"]', 1, 3, 'sadfds', 'sadfdsf'),
(92, 1, 7, 0, 1, 8, 'AAA BBB 2000', 'aaa-bbb-2000', '900000.00', '2022-11-23-1669188821.png', 'Testing data', 'new', 'original', 'AAA', 'BBB', 'light-green', '9th', NULL, NULL, '{\"gear\": \"straight\", \"run_km\": \"25000\", \"edition\": \"9th\", \"traction\": \"rear wheel drive\", \"body_type\": \"estate\", \"engine_cc\": \"2500\", \"year_decade\": \"1992-2002\", \"transmission\": \"automatic\", \"year_of_manufacture\": \"2000\"}', 1, 0, '2022-10-11 06:00:00', '2022-11-23 01:35:56', '2022-10-26 05:00:00', 4, NULL, '[\"diesel\",\"petrol\",\"cng\"]', 1, 3, 'asdfsdasfsd', 'sdfsdfdf'),
(93, 1, 7, 0, 1, 8, 'ADD SOME INFO Model One 2000', 'add-some-info-model-one-2000', '6546545.00', '2022-11-23-1669189240.png', 'ADD SOME INFO', 'used', 'original', 'ADD SOME INFO', 'Model One', 'brown', '8th', NULL, NULL, '{\"gear\": \"straight\", \"run_km\": \"25000\", \"edition\": \"8th\", \"traction\": \"front wheel drive\", \"body_type\": \"suv4x4\", \"engine_cc\": \"2500\", \"year_decade\": \"1981-1991\", \"transmission\": \"manual\", \"year_of_manufacture\": \"2000\"}', 1, 0, '2022-10-10 18:00:00', '2022-11-23 01:42:48', '2022-10-13 17:59:00', 3, NULL, '[\"diesel\",\"lpg\"]', 1, 1, 'ADD SOME INFO', 'ADD SOME INFO');

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
(1, 2, 1, '2022-11-13 08:35:00', '2022-11-13 08:35:00'),
(5, 17, 1, '2022-11-13 08:57:21', '2022-11-13 08:57:21');

-- --------------------------------------------------------

--
-- Table structure for table `advertisement_interest_advertisement`
--

CREATE TABLE `advertisement_interest_advertisement` (
  `id` int(11) NOT NULL,
  `interest_advertisement_id` int(10) UNSIGNED NOT NULL,
  `mac_address` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `advertisement_interest_advertisement`
--

INSERT INTO `advertisement_interest_advertisement` (`id`, `interest_advertisement_id`, `mac_address`, `ip_address`, `updated_at`, `created_at`) VALUES
(1, 91, 'C4-E9-84-0F-95-F9', '127.0.0.1', '2022-11-23 16:26:46', '2022-11-23 16:26:46'),
(2, 46, 'C4-E9-84-0F-95-F7', '127.0.0.1', '2022-11-23 16:26:54', '2022-11-23 16:26:54'),
(3, 61, 'C4-E9-84-0F-95-F8', '127.0.0.1', '2022-11-23 16:29:29', '2022-11-23 16:29:29');

-- --------------------------------------------------------

--
-- Table structure for table `advertisers`
--

CREATE TABLE `advertisers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `mobile_no` varchar(14) DEFAULT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `provider_id` varchar(255) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `registration_code` int(11) NOT NULL,
  `about` varchar(1000) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0 == Not varified, 1 == Verified',
  `show_mobile_no` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0 == No, 1 == Yes',
  `last_seen` datetime DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `chat_status` tinyint(4) NOT NULL DEFAULT 0,
  `chat_delete_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `advertisers`
--

INSERT INTO `advertisers` (`id`, `first_name`, `last_name`, `mobile_no`, `designation`, `email`, `username`, `password`, `provider_id`, `city_id`, `registration_code`, `about`, `status`, `show_mobile_no`, `last_seen`, `deleted_at`, `created_at`, `updated_at`, `remember_token`, `image`, `avatar`, `chat_status`, `chat_delete_by`) VALUES
(1, 'Muhammad', 'Hannan', '01717121213', NULL, '1mdhannan.info@gmail.com', 'mdhannan.info@gmail.com', '$2y$10$cdACBs/iFbgmXKli/K5PpusSRxcf8kDZLtIm7tcXGgCtsPsAOJ0MC', NULL, 1, 882630, 'Laravel Developer', 1, 1, '2022-11-28 13:37:15', NULL, '2022-09-13 18:00:00', '2022-11-28 07:37:15', NULL, '2022-11-22-1669095354.png', NULL, 1, NULL),
(2, 'Tanvir', 'Ahmed', '01718191912', NULL, 'ahannan.info@gmail.com', 'ahannan.info@gmail.com', '$2y$10$5fNLwnSc8ELo2nXrL.agAuVNw3ft.fcslvuoQ3/JNZzR4gda2HRqe', NULL, 1, 519853, NULL, 1, 1, '2022-10-21 19:40:18', NULL, '2022-10-08 04:14:14', '2022-10-21 13:40:18', NULL, '2022-10-11-1665479537.png', NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ad_complains`
--

CREATE TABLE `ad_complains` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `advertisement_id` int(10) UNSIGNED NOT NULL,
  `complain` varchar(255) NOT NULL,
  `complain_details` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ad_complains`
--

INSERT INTO `ad_complains` (`id`, `advertisement_id`, `complain`, `complain_details`, `created_at`, `updated_at`) VALUES
(1, 4, 'shouldn\'t be on your site', 'Test', '2022-10-01 03:53:14', '2022-10-01 03:53:14'),
(2, 4, 'illegal product', NULL, '2022-10-01 03:56:13', '2022-10-01 03:56:13');

-- --------------------------------------------------------

--
-- Table structure for table `ad_images`
--

CREATE TABLE `ad_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `advertisement_id` int(10) UNSIGNED NOT NULL COMMENT 'PK on advertisements table',
  `images` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ad_images`
--

INSERT INTO `ad_images` (`id`, `advertisement_id`, `images`, `created_at`, `updated_at`) VALUES
(1, 1, '166434748519056.jpg', '2022-09-28 00:44:45', '2022-09-28 00:44:45'),
(2, 1, '166434748573074.jpg', '2022-09-28 00:44:45', '2022-09-28 00:44:45'),
(3, 1, '166434748584686.jpg', '2022-09-28 00:44:45', '2022-09-28 00:44:45'),
(4, 1, '166434748592329.jpg', '2022-09-28 00:44:45', '2022-09-28 00:44:45'),
(5, 1, '166434748561270.jpg', '2022-09-28 00:44:45', '2022-09-28 00:44:45'),
(6, 2, '166434765510827.jpg', '2022-09-28 00:47:35', '2022-09-28 00:47:35'),
(7, 2, '166434765537729.jpg', '2022-09-28 00:47:35', '2022-09-28 00:47:35'),
(8, 2, '166434765592782.jpg', '2022-09-28 00:47:35', '2022-09-28 00:47:35'),
(9, 3, '166435757499611.jpg', '2022-09-28 03:32:54', '2022-09-28 03:32:54'),
(10, 3, '166435757478013.jpg', '2022-09-28 03:32:54', '2022-09-28 03:32:54'),
(11, 3, '166435757432668.jpg', '2022-09-28 03:32:54', '2022-09-28 03:32:54'),
(12, 4, '166437058180825.jpg', '2022-09-28 07:09:41', '2022-09-28 07:09:41'),
(13, 4, '166437058192457.jpg', '2022-09-28 07:09:41', '2022-09-28 07:09:41'),
(14, 7, '166444814264768.jpg', '2022-09-29 04:42:22', '2022-09-29 04:42:22'),
(15, 7, '166444814245398.jpg', '2022-09-29 04:42:22', '2022-09-29 04:42:22'),
(16, 7, '166444814251683.jpg', '2022-09-29 04:42:22', '2022-09-29 04:42:22'),
(17, 8, '166445107537586.jpg', '2022-09-29 05:31:15', '2022-09-29 05:31:15'),
(18, 9, '166445144685479.jpg', '2022-09-29 05:37:26', '2022-09-29 05:37:26'),
(19, 9, '166445144628941.jpg', '2022-09-29 05:37:26', '2022-09-29 05:37:26'),
(20, 10, '166446454971227.jpg', '2022-09-29 09:15:49', '2022-09-29 09:15:49'),
(21, 11, '166447051118422.png', '2022-09-29 10:55:11', '2022-09-29 10:55:11'),
(22, 15, '166550256137456.jpg', '2022-10-11 09:36:01', '2022-10-11 09:36:01'),
(23, 16, '16655029716677.jpg', '2022-10-11 09:42:51', '2022-10-11 09:42:51'),
(24, 17, '166550770811468.jpg', '2022-10-11 11:01:48', '2022-10-11 11:01:48'),
(25, 17, '166550770899811.jpg', '2022-10-11 11:01:48', '2022-10-11 11:01:48'),
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
(109, 93, '166918924076146.jpg', '2022-11-23 01:40:40', '2022-11-23 01:40:40');

-- --------------------------------------------------------

--
-- Table structure for table `ad_types`
--

CREATE TABLE `ad_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `price` double(24,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ad_types`
--

INSERT INTO `ad_types` (`id`, `title`, `slug`, `status`, `created_at`, `updated_at`, `start_date`, `end_date`, `price`) VALUES
(1, 'Featured ad for 3 days', 'featured-ad-for-3-days', 1, '2022-10-11 10:25:14', '2022-10-11 10:39:06', '2022-10-11 00:00:00', '2022-10-13 23:59:00', 900.00),
(2, 'Featured ad for 7 days', 'featured-ad-for-7-days', 1, '2022-10-11 10:41:11', '2022-10-11 10:41:11', '2022-10-12 00:00:00', '2022-10-17 23:59:00', 1000.00),
(3, 'Featured ad for 14 days', 'featured-ad-for-14-days', 1, '2022-10-11 10:43:27', '2022-10-11 10:43:27', '2022-10-11 12:00:00', '2022-10-26 11:00:00', 2000.00);

-- --------------------------------------------------------

--
-- Table structure for table `auths`
--

CREATE TABLE `auths` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `email` varchar(150) NOT NULL,
  `mobile_no` varchar(14) NOT NULL,
  `password` varchar(255) NOT NULL,
  `model_id` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '1 = Admin',
  `gender` tinyint(4) NOT NULL DEFAULT 1,
  `dob` date DEFAULT NULL,
  `about` varchar(500) DEFAULT NULL,
  `facebook_id` bigint(20) DEFAULT NULL,
  `google_id` bigint(20) DEFAULT NULL,
  `activation_code` varchar(255) DEFAULT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `activation_code_expire` datetime DEFAULT NULL,
  `is_first_login` tinyint(4) NOT NULL DEFAULT 1,
  `user_type` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0 = Admin',
  `can_login` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1 = Can login, 0 = Can not login',
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1 = Active, 0 = Inactive',
  `created_by` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `updated_by` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `is_user` tinyint(4) NOT NULL DEFAULT 0 COMMENT '1 == Admin, 0 == User'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `auths`
--

INSERT INTO `auths` (`id`, `first_name`, `last_name`, `username`, `email`, `mobile_no`, `password`, `model_id`, `gender`, `dob`, `about`, `facebook_id`, `google_id`, `activation_code`, `salt`, `activation_code_expire`, `is_first_login`, `user_type`, `can_login`, `status`, `created_by`, `updated_by`, `remember_token`, `created_at`, `updated_at`, `image`, `is_user`) VALUES
(1, 'Muhammad', 'Hannan', 'admin@admin.com', 'admin@admin.com', '01744894492', '$2y$10$yRiqZPnaJo0dEZwapoCbnupdqOX.1fpE12AkgbswRl919vEE3Jrnq', 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 1, 1, 0, 0, NULL, NULL, '2022-10-01 11:26:18', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `auth_roles`
--

CREATE TABLE `auth_roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `auth_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `user_group_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `auth_roles`
--

INSERT INTO `auth_roles` (`id`, `auth_id`, `role_id`, `user_group_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, '2022-09-27 23:39:54', '2022-10-01 11:26:18');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `banner_image` varchar(255) NOT NULL,
  `alt` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
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
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `icon` varchar(1000) DEFAULT NULL,
  `bg_color` varchar(255) NOT NULL DEFAULT '#a3ce71',
  `category_type` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `wheels` varchar(255) DEFAULT NULL,
  `status` tinyint(4) DEFAULT 1 COMMENT '1=Active and 0=Inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `title`, `slug`, `icon`, `bg_color`, `category_type`, `image`, `wheels`, `status`, `created_at`, `updated_at`) VALUES
(1, 0, 'Mobile Phones', 'mobile-phones', '<i class=\"fas fa-mobile-alt\"></i>', '#000000', 'mobiles', '2022-10-01-1664641426.png', NULL, 1, NULL, '2022-10-01 10:23:46'),
(2, 0, 'Electronics', 'electronics', '<i class=\"fas fa-mobile-alt\"></i>', '#000000', 'electronics', '2022-11-16-1668594830.png', NULL, 1, NULL, '2022-11-16 04:33:50'),
(5, 1, 'Vivo', 'vivo', '<i class=\"fas fa-mobile-alt\"></i>', '#f21c1c', 'mobiles', '2022-10-01-1664641631.png', NULL, 1, '2022-09-27 23:48:31', '2022-10-01 10:27:11'),
(6, 1, 'Samsung', 'samsung', '<i class=\"fas fa-mobile-alt\"></i>', '#2de6b8', 'mobiles', '2022-10-01-1664641609.png', NULL, 1, '2022-09-27 23:50:05', '2022-10-01 10:26:49'),
(7, 0, 'Vehicle', 'vehicle', '<i class=\"fas fa-basketball-ball\"></i>', '#e62d2d', 'vehicles', '2022-11-16-1668594779.png', NULL, 1, '2022-09-29 00:42:35', '2022-11-16 04:32:59'),
(8, 7, 'Car', 'car', '<i class=\"fas fa-basketball-ball\"></i>', '#fb5656', 'vehicles', '2022-10-01-1664641459.png', '4', 1, '2022-09-29 00:43:26', '2022-10-01 10:24:19'),
(9, 7, 'Motorbikes', 'motorbikes', '<i class=\"fas fa-basketball-ball\"></i>', '#f83535', 'vehicles', '2022-10-01-1664641658.png', '2', 1, '2022-09-29 05:18:41', '2022-10-01 10:27:38'),
(10, 7, 'Three Wheeler', 'three-wheeler', '<i class=\"fas fa-basketball-ball\"></i>', '#f25a5a', 'vehicles', '2022-10-16-1665903675.png', '3', 1, '2022-09-29 05:22:35', '2022-10-16 01:01:15'),
(11, 0, 'Others', 'others', '<i class=\"fas fa-basketball-ball\"></i>', '#f53d3d', 'general', NULL, NULL, 1, '2022-09-29 10:58:27', '2022-09-29 11:06:00'),
(12, 2, 'Refrigerator', 'refrigerator', '<i class=\"fas fa-basketball-ball\"></i>', '#0c7318', 'electronics', '2022-10-16-1665909024.png', NULL, 1, '2022-10-16 02:30:24', '2022-10-16 02:30:24'),
(14, 0, 'Furniture', 'furniture', '<i class=\"fas fa-basketball-ball\"></i>', '#000000', 'home_and_garden', '2022-10-16-1665913469.png', NULL, 1, '2022-10-16 03:44:29', '2022-10-16 03:44:29'),
(15, 14, 'Home and Living', 'home-and-living', '<i class=\"fas fa-basketball-ball\"></i>', '#e74040', 'home_and_garden', '2022-10-16-1665913502.png', NULL, 1, '2022-10-16 03:45:02', '2022-10-16 03:45:02'),
(16, 0, 'Fashion and Beauty', 'fashion-and-beauty', '<i class=\"fas fa-basketball-ball\"></i>', '#dd2c2c', 'fashion_beauty', '2022-10-16-1665919993.png', NULL, 1, '2022-10-16 05:33:13', '2022-10-16 05:33:13'),
(17, 16, 'Traditional Wear', 'traditional-wear', '<i class=\"fas fa-basketball-ball\"></i>', '#000000', 'fashion_beauty', '2022-10-16-1665920132.png', NULL, 1, '2022-10-16 05:35:32', '2022-10-16 05:35:32');

-- --------------------------------------------------------

--
-- Table structure for table `category_items`
--

CREATE TABLE `category_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0 = Inactive 1 = Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country_id` int(10) UNSIGNED NOT NULL DEFAULT 1 COMMENT '1 = Turkey for now',
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0 = Inactive 1 = Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `country_id`, `title`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Ankara', 'ankara', 1, NULL, NULL),
(2, 1, 'Istanbul', 'istanbul', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cms_pages`
--

CREATE TABLE `cms_pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_tags` varchar(255) DEFAULT NULL,
  `meta_description` mediumtext DEFAULT NULL,
  `description` mediumtext NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0 = Inactive 1 = Active',
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
(2, 'About us', 'about-us', 'about us', NULL, 'about us<br>', '<span style=\"display: inline !important;\">about us</span><br>', 1, 2, NULL, '2022-10-02 08:18:54', '2022-10-02 08:19:49'),
(3, 'Announcements', 'announcements', 'Announcements', NULL, 'Announcements<br>', 'Announcements<br>', 1, 4, NULL, '2022-10-02 08:21:05', '2022-10-02 08:21:05'),
(4, 'Possible problems', 'possible-problems', 'Possible problems', NULL, 'Possible problems<br>', 'Possible problems<br>', 1, 4, NULL, '2022-10-02 08:23:35', '2022-10-02 08:23:35'),
(5, 'Help', 'help', 'Help', NULL, '<span style=\"display: inline !important;\">Help Text</span><br><div><span style=\"display: inline !important;\"><span style=\"display: inline !important;\">Help Text</span><br></span></div><div><span style=\"display: inline !important;\"><span style=\"display: inline !important;\">Help Text</span><br></span></div><div><span style=\"display: inline !important;\"><span style=\"display: inline !important;\">Help Text</span><br></span></div><div><span style=\"display: inline !important;\"><span style=\"display: inline !important;\"><br></span></span></div>', '<span style=\"display: inline !important;\">Help Text</span><br><div><span style=\"display: inline !important;\"><span style=\"display: inline !important;\">Help Text</span><br></span></div><div><span style=\"display: inline !important;\"><span style=\"display: inline !important;\"><span style=\"display: inline !important;\">Help Text</span><br></span></span></div><div><span style=\"display: inline !important;\"><span style=\"display: inline !important;\"><span style=\"display: inline !important;\"><span style=\"display: inline !important;\">Help Text</span><br></span></span></span></div><div><span style=\"display: inline !important;\"><span style=\"display: inline !important;\"><span style=\"display: inline !important;\"><span style=\"display: inline !important;\"><br></span></span></span></span></div>', 1, 4, NULL, '2022-10-16 09:21:44', '2022-10-16 09:21:44');

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE `currencies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `currency_code` varchar(255) NOT NULL,
  `currency_symbol` varchar(255) NOT NULL,
  `currency_fullname` varchar(255) NOT NULL,
  `currency_type` tinyint(4) NOT NULL COMMENT '1 => fiat, 2 => crypto',
  `rate` decimal(28,8) DEFAULT NULL,
  `is_default` tinyint(4) NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1 => active, 0 => inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`id`, `currency_code`, `currency_symbol`, `currency_fullname`, `currency_type`, `rate`, `is_default`, `status`, `created_at`, `updated_at`) VALUES
(1, 'USD', '$', 'USD', 1, '100.00000000', 1, 1, '2022-10-18 23:19:36', '2022-10-18 23:19:36');

-- --------------------------------------------------------

--
-- Table structure for table `email_logs`
--

CREATE TABLE `email_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `advertiser_id` int(10) UNSIGNED DEFAULT NULL COMMENT 'PK users table',
  `user_type` varchar(255) DEFAULT NULL,
  `mail_sender` varchar(255) DEFAULT NULL,
  `email_from` varchar(255) DEFAULT NULL,
  `email_to` varchar(255) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `message` text DEFAULT NULL,
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
(4, 2, NULL, 'smtp', 'AppDevs Solution noreply@appdevs.net', 'ahannan.info@gmail.com', 'Please verify your email address', '<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">\r\n  <!--[if !mso]><!-->\r\n  <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">\r\n  <!--<![endif]-->\r\n  <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">\r\n  <title></title>\r\n  <style type=\"text/css\">\r\n.ReadMsgBody { width: 100%; background-color: #ffffff; }\r\n.ExternalClass { width: 100%; background-color: #ffffff; }\r\n.ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div { line-height: 100%; }\r\nhtml { width: 100%; }\r\nbody { -webkit-text-size-adjust: none; -ms-text-size-adjust: none; margin: 0; padding: 0; }\r\ntable { border-spacing: 0; table-layout: fixed; margin: 0 auto;border-collapse: collapse; }\r\ntable table table { table-layout: auto; }\r\n.yshortcuts a { border-bottom: none !important; }\r\nimg:hover { opacity: 0.9 !important; }\r\na { color: #0087ff; text-decoration: none; }\r\n.textbutton a { font-family: \'open sans\', arial, sans-serif !important;}\r\n.btn-link a { color:#FFFFFF !important;}\r\n\r\n@media only screen and (max-width: 480px) {\r\nbody { width: auto !important; }\r\n*[class=\"table-inner\"] { width: 90% !important; text-align: center !important; }\r\n*[class=\"table-full\"] { width: 100% !important; text-align: center !important; }\r\n/* image */\r\nimg[class=\"img1\"] { width: 100% !important; height: auto !important; }\r\n}\r\n</style>\r\n\r\n\r\n\r\n  <p><table width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" bgcolor=\"#414a51\" align=\"center\">\r\n    <tbody><tr>\r\n      <td height=\"50\"><br></td>\r\n    </tr>\r\n    <tr>\r\n      <td style=\"text-align:center;vertical-align:top;font-size:0;\" align=\"center\">\r\n        <table cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n          <tbody><tr>\r\n            <td width=\"600\" align=\"center\">\r\n              <!--header-->\r\n              <table class=\"table-inner\" width=\"95%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                <tbody><tr>\r\n                  <td style=\"border-top-left-radius:6px; border-top-right-radius:6px;text-align:center;vertical-align:top;font-size:0;\" bgcolor=\"#0087ff\" align=\"center\">\r\n                    <table width=\"90%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                      <tbody><tr>\r\n                        <td height=\"20\"><br></td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td style=\"font-family: \'Open sans\', Arial, sans-serif; color:#FFFFFF; font-size:16px; font-weight: bold;\" align=\"center\"><div align=\"center\"><a href=\"https://premium.appdevs.net/xpay/admin/dashboard\" class=\"sidebar__main-logo\"><img src=\"https://premium.appdevs.net/xpay/assets/images/logoIcon/light_logo.png\" alt=\"image\"></a><br></div></td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td height=\"20\"><br></td>\r\n                      </tr>\r\n                    </tbody></table>\r\n                  </td>\r\n                </tr>\r\n              </tbody></table>\r\n              <!--end header-->\r\n              <table class=\"table-inner\" width=\"95%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\">\r\n                <tbody><tr>\r\n                  <td style=\"text-align:center;vertical-align:top;font-size:0;\" bgcolor=\"#FFFFFF\" align=\"center\">\r\n                    <table width=\"90%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                      <tbody><tr>\r\n                        <td height=\"35\"><br></td>\r\n                      </tr>\r\n                      <!--logo-->\r\n                      <tr>\r\n                        <td style=\"vertical-align:top;font-size:0;\" align=\"center\">\r\n                          \r\n                        <br></td>\r\n                      </tr>\r\n                      <!--end logo-->\r\n                      <tr>\r\n                        <td height=\"40\"><br></td>\r\n                      </tr>\r\n                      <!--headline-->\r\n                      <tr>\r\n                        <td style=\"font-family: \'Open Sans\', Arial, sans-serif; font-size: 22px;color:#414a51;font-weight: bold;\" align=\"center\">Hello Tanvir<br></td>\r\n                      </tr>\r\n                      <!--end headline-->\r\n                      <tr>\r\n                        <td style=\"text-align:center;vertical-align:top;font-size:0;\" align=\"center\">\r\n                          <table width=\"40\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                            <tbody><tr>\r\n                              <td style=\" border-bottom:3px solid #0087ff;\" height=\"20\"><br></td>\r\n                            </tr>\r\n                          </tbody></table>\r\n                        </td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td height=\"20\"><br></td>\r\n                      </tr>\r\n                      <!--content-->\r\n                      <tr>\r\n                        <td style=\"font-family: \'Open sans\', Arial, sans-serif; color:#7f8c8d; font-size:16px; line-height: 28px;\" align=\"left\"><div><br></div><div>Thanks For joining us. <br></div><div>Please use the below code to verify your email address.<br></div><div><br></div><div>Your email verification code is:<font size=\"6\"><b> 519853</b></font></div></td>\r\n                      </tr>\r\n                      <!--end content-->\r\n                      <tr>\r\n                        <td height=\"40\"><br></td>\r\n                      </tr>\r\n              \r\n                    </tbody></table>\r\n                  </td>\r\n                </tr>\r\n                <tr>\r\n                  <td style=\"border-bottom-left-radius:6px;border-bottom-right-radius:6px;\" height=\"45\" bgcolor=\"#f4f4f4\" align=\"center\">\r\n                    <table width=\"90%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                      <tbody><tr>\r\n                        <td height=\"10\"><br></td>\r\n                      </tr>\r\n                      <!--preference-->\r\n                      <tr>\r\n                        <td class=\"preference-link\" style=\"font-family: \'Open sans\', Arial, sans-serif; color:#95a5a6; font-size:14px;\" align=\"center\">\r\n                          © 2022 AppDevs . All Rights Reserved. \r\n                        </td>\r\n                      </tr>\r\n                      <!--end preference-->\r\n                      <tr>\r\n                        <td height=\"10\"><br></td>\r\n                      </tr>\r\n                    </tbody></table>\r\n                  </td>\r\n                </tr>\r\n              </tbody></table>\r\n            </td>\r\n          </tr>\r\n        </tbody></table>\r\n      </td>\r\n    </tr>\r\n    <tr>\r\n      <td height=\"60\"><br></td>\r\n    </tr>\r\n  </tbody></table></p>', '2022-10-08 04:14:14', '2022-10-08 04:14:14');

-- --------------------------------------------------------

--
-- Table structure for table `email_sms_templates`
--

CREATE TABLE `email_sms_templates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `act` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `subj` varchar(255) NOT NULL,
  `email_body` text DEFAULT NULL,
  `sms_body` text DEFAULT NULL,
  `shortcodes` text DEFAULT NULL,
  `email_status` tinyint(4) NOT NULL DEFAULT 1,
  `sms_status` tinyint(4) NOT NULL DEFAULT 1,
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
(4, 'SVER_CODE', 'SMS Verification ', 'Please verify your phone', 'Your phone verification code is: {{code}}', 'Your phone verification code is: {{code}}', '{\"code\":\"Verification code\"}', 0, 1, '2019-09-24 11:04:05', '2020-03-07 13:28:52'),
(5, '2FA_ENABLE', 'Google Two Factor - Enable', 'Google Two Factor Authentication is now  Enabled for Your Account', '<div>You just enabled Google Two Factor Authentication for Your Account.</div><div><br></div><div>Enabled at <b>{{time}} </b>From IP: <b>{{ip}}</b> using <b>{{browser}}</b> on <b>{{operating_system}} </b>.</div>', 'Your verification code is: {{code}}', '{\"ip\":\"IP of User\",\"browser\":\"Browser of User\",\"operating_system\":\"Operating System of User\",\"time\":\"Request Time\"}', 1, 1, '2019-09-24 11:04:05', '2020-03-07 13:42:59'),
(6, '2FA_DISABLE', 'Google Two Factor Disable', 'Google Two Factor Authentication is now  Disabled for Your Account', '<div>You just Disabled Google Two Factor Authentication for Your Account.</div><div><br></div><div>Disabled at <b>{{time}} </b>From IP: <b>{{ip}}</b> using <b>{{browser}}</b> on <b>{{operating_system}} </b>.</div>', 'Google two factor verification is disabled', '{\"ip\":\"IP of User\",\"browser\":\"Browser of User\",\"operating_system\":\"Operating System of User\",\"time\":\"Request Time\"}', 1, 1, '2019-09-24 11:04:05', '2020-03-07 13:43:46'),
(16, 'ADMIN_SUPPORT_REPLY', 'Support Ticket Reply ', 'Reply Support Ticket', '<div><p><span style=\"font-size: 11pt;\" data-mce-style=\"font-size: 11pt;\"><strong>A member from our support team has replied to the following ticket:</strong></span></p><p><b><span style=\"font-size: 11pt;\" data-mce-style=\"font-size: 11pt;\"><strong><br></strong></span></b></p><p><b>[Ticket#{{ticket_id}}] {{ticket_subject}}<br><br>Click here to reply:&nbsp; {{link}}</b></p><p>----------------------------------------------</p><p>Here is the reply : <br></p><p> {{reply}}<br></p></div><div><br></div>', '{{subject}}\r\n\r\n{{reply}}\r\n\r\n\r\nClick here to reply:  {{link}}', '{\"ticket_id\":\"Support Ticket ID\", \"ticket_subject\":\"Subject Of Support Ticket\", \"reply\":\"Reply from Staff/Admin\",\"link\":\"Ticket URL For relpy\"}', 1, 1, '2020-06-08 06:00:00', '2020-05-03 14:24:40'),
(206, 'DEPOSIT_COMPLETE', 'Automated Deposit - Successful', 'Add money Completed Successfully', '<div>Your payment of <b>{{amount}} {{currency}}</b> is via&nbsp; <b>{{method_name}} </b>has been completed Successfully.<b><br></b></div><div><b><br></b></div><div><b>Details of your Deposit :<br></b></div><div><br></div><div>Amount : {{amount}} {{currency}}</div><div>Charge: <font color=\"#000000\">{{charge}} {{method_currency}}</font></div><div><br></div><div>Conversion Rate : 1 {{currency}} = {{rate}} {{method_currency}}</div><div>Payable : {{method_amount}} {{method_currency}} <br></div><div>Paid via :&nbsp; {{method_name}}</div><div><br></div><div>Transaction Number : {{trx}}</div><div><font size=\"5\"><b><br></b></font></div><div><font size=\"5\">Your current Balance is <b>{{post_balance}} {{currency}}</b></font></div><div><br></div><div><br><br><br></div>', '{{amount}} {{currrency}} Deposit successfully by {{gateway_name}}', '{\"trx\":\"Transaction Number\",\"amount\":\"Request Amount By user\",\"charge\":\"Gateway Charge\",\"currency\":\"Site Currency\",\"rate\":\"Conversion Rate\",\"method_name\":\"Deposit Method Name\",\"method_currency\":\"Deposit Method Currency\",\"method_amount\":\"Deposit Method Amount After Conversion\", \"post_balance\":\"Users Balance After this operation\"}', 1, 1, '2020-06-24 06:00:00', '2021-06-30 18:09:23'),
(207, 'DEPOSIT_REQUEST', 'Manual Deposit - User Requested', 'Add money Request Submitted Successfully', '<div>Your Add money request of <b>{{amount}} {{currency}}</b> is via&nbsp; <b>{{method_name}} </b>submitted successfully<b> .<br></b></div><div><b><br></b></div><div><b>Details of your Deposit :<br></b></div><div><br></div><div>Amount : {{amount}} {{currency}}</div><div>Charge: <font color=\"#FF0000\">{{charge}} {{method_currency}}</font></div><div><br></div><div>Conversion Rate : 1 {{currency}} = {{rate}} {{method_currency}}</div><div>Payable : {{method_amount}} {{method_currency}} <br></div><div>Pay via :&nbsp; {{method_name}}</div><div><br></div><div>Transaction Number : {{trx}}</div><div><br></div><div><br></div>', '{{amount}} Deposit requested by {{method}}. Charge: {{charge}} . Trx: {{trx}}\r\n', '{\"trx\":\"Transaction Number\",\"amount\":\"Request Amount By user\",\"charge\":\"Gateway Charge\",\"currency\":\"Site Currency\",\"rate\":\"Conversion Rate\",\"method_name\":\"Deposit Method Name\",\"method_currency\":\"Deposit Method Currency\",\"method_amount\":\"Deposit Method Amount After Conversion\"}', 1, 1, '2020-05-31 06:00:00', '2021-06-30 18:10:02'),
(208, 'DEPOSIT_APPROVE', 'Manual Deposit - Admin Approved', 'Your Deposit is Approved', '<div>Your deposit request of <b>{{amount}} {{currency}}</b> is via&nbsp; <b>{{method_name}} </b>is Approved .<b><br></b></div><div><b><br></b></div><div><b>Details of your Deposit :<br></b></div><div><br></div><div>Amount : {{amount}} {{currency}}</div><div>Charge: <font color=\"#FF0000\">{{charge}} {{currency}}</font></div><div><br></div><div>Conversion Rate : 1 {{currency}} = {{rate}} {{method_currency}}</div><div>Payable : {{method_amount}} {{method_currency}} <br></div><div>Paid via :&nbsp; {{method_name}}</div><div><br></div><div>Transaction Number : {{trx}}</div><div><font size=\"5\"><b><br></b></font></div><div><font size=\"5\">Your current Balance is <b>{{post_balance}} {{currency}}</b></font></div><div><br></div><div><br><br></div>', 'Admin Approve Your {{amount}} {{gateway_currency}} payment request by {{gateway_name}} transaction : {{transaction}}', '{\"trx\":\"Transaction Number\",\"amount\":\"Request Amount By user\",\"charge\":\"Gateway Charge\",\"currency\":\"Site Currency\",\"rate\":\"Conversion Rate\",\"method_name\":\"Deposit Method Name\",\"method_currency\":\"Deposit Method Currency\",\"method_amount\":\"Deposit Method Amount After Conversion\", \"post_balance\":\"Users Balance After this operation\"}', 1, 1, '2020-06-16 06:00:00', '2020-06-14 06:00:00'),
(209, 'DEPOSIT_REJECT', 'Manual Deposit - Admin Rejected', 'Your Deposit Request is Rejected', '<div>Your deposit request of <b>{{amount}} {{currency}}</b> is via&nbsp; <b>{{method_name}} has been rejected</b>.<b><br></b></div><br><div>Transaction Number was : {{trx}}</div><div><br></div><div>if you have any query, feel free to contact us.<br></div><br><div><br><br></div>\r\n\r\n\r\n\r\n{{rejection_message}}', 'Admin Rejected Your {{amount}} {{gateway_currency}} payment request by {{gateway_name}}\r\n\r\n{{rejection_message}}', '{\"trx\":\"Transaction Number\",\"amount\":\"Request Amount By user\",\"charge\":\"Gateway Charge\",\"currency\":\"Site Currency\",\"rate\":\"Conversion Rate\",\"method_name\":\"Deposit Method Name\",\"method_currency\":\"Deposit Method Currency\",\"method_amount\":\"Deposit Method Amount After Conversion\",\"rejection_message\":\"Rejection message\"}', 1, 1, '2020-06-09 06:00:00', '2020-06-14 06:00:00'),
(217, 'SEND_INVOICE_MAIL', 'Send Invoice to mail', 'Invoice Of your payment', 'You have an invoice to pay. Please follow the URL below to successful payment.<br><b>Invoice URL : <a class=\"btn btn--info\" href=\" {{url}}\">Click</a><br><br></b><div>You can also download the invoice via below URL,</div><div><b>Download : <a href=\"{{download_url}}\" class=\"btn btn--info\">Download</a></b><br></div>', NULL, '{\"url\":\"invoice url\",\"download_url\":\"Download link of invoice\"}', 1, 1, '2019-09-14 07:14:22', '2021-06-20 17:55:52'),
(226, 'REQUEST_MONEY', 'Request Money', 'Request Money', '<div>Money Request <b>{{amount}} {{curr_code}}</b> from <b>{{requestor}}</b>&nbsp; at <b>{{time}}</b>.&nbsp;</div><div><br></div><div><b>Requestor Note</b>: {{note}}<br></div>', 'Money Request {{amount}} {{curr_code}} from {{requestor}}  at {{time}}.', '{\"amount\":\"Receive amount\",\"curr_code\":\"currency code\", \"requestor\":\"user name or mail of requestor\",\"time\":\"Request time and date\",\"note\":\"Note from requestor\"}', 1, 1, '2019-09-14 07:14:22', '2021-06-29 22:17:24'),
(227, 'ACCEPT_REQUEST_MONEY_REQUESTOR', 'Accept request money mail to requestor', 'Accept Request Money', '<div>Your Money Request <b>{{amount}} {{curr_code}}</b> to<b> {{to_requested}}</b>&nbsp; has been accepted at <b>{{time}}</b>.&nbsp; Charge: <b>{{charge}}</b> <b>{{curr_code}}</b></div><div>Your new balance is : <b>{{balance}}</b> <b>{{curr_code}}</b></div><div>TrxID : <b>{{trx}}</b><br></div>', 'Money Request {{amount}} {{curr_code}} from {{requestor}}  at {{time}}.', '{\"amount\":\"Request amount\",\"curr_code\":\"currency code\", \"to_requested\":\"Requeted to whom\",\"time\":\"Request time and date\",\"balance\":\"New Balance\",\"trx\":\"Transaction id\",\"charge\":\"money request charge\"}', 1, 1, '2019-09-14 07:14:22', '2021-06-29 23:03:02'),
(228, 'ACCEPT_REQUEST_MONEY', 'Accept request money', 'Accept Request Money', '<div>Your\'ve Accepted Money Request <b>{{amount}} {{curr_code}}</b> from&nbsp;<b> {{requestor}}</b>&nbsp; at <b>{{time}}</b>.&nbsp;</div><div>Your new balance is : <b>{{balance}}</b> <b>{{curr_code}}</b></div><div>TrxID : <b>{{trx}}</b><br></div>', 'Your\'ve Accepted Money Request {{amount}} {{curr_code}} from  {{requestor}}  at {{time}}. \r\nYour new balance is : {{balance}} {{curr_code}}\r\nTrxID : {{trx}}', '{\"amount\":\"Request amount\",\"curr_code\":\"currency code\", \"requestor\":\"Requestor\",\"time\":\"Accept time and date\",\"balance\":\"New Balance\",\"trx\":\"Transaction id\"}', 1, 1, '2019-09-14 07:14:22', '2021-06-29 22:50:39'),
(229, 'GET_INVOICE_PAYMENT', 'Get Invoice Payment', 'Get Invoice Payment', 'Payment <b>{{total_amount}} {{curr_code}}</b>&nbsp; of Invoice <b>#{{invoice_id}} </b>has been received successfully, from <b>{{from_user}}</b> at <b>{{time}}.<br></b><div>You got after charge<b> : {{get_amount}} </b>{{curr_code}} .<br></div><div>Charge : {{charge}} {{curr_code}} .<br>TrxID : {{trx}}.<br><br>Your New Balance is {{post_balance}} {{curr_code}} .<br></div>', 'Payment {{total_amount}} {{curr_code}}  of Invoice #{{invoice_id}} has been received successfully, from {{from_user}} at {{time}}.\r\nYou got after charge : {{get_amount}} {{curr_code}} .\r\nCharge : {{charge}} {{curr_code}} .\r\nTrxID : {{trx}}.\r\n\r\nYour New Balance is {{post_balance}} {{curr_code}} .', '{\"total_amount\":\"invoice total amount\",\"get_amount\":\"get amount after charge\",\"charge\":\"invoice charge\",\"curr_code\":\"currency code\",\"invoice_id\":\"invoice id\",\"time\":\"payment time and date\",\"from_user\":\"from whom get payment\",\"trx\":\"Transaction id\",\"post_balance\":\"post balance\"}', 1, 1, '2019-09-14 07:14:22', '2021-06-30 17:52:12'),
(230, 'PAY_INVOICE_PAYMENT', 'Pay Invoice Payment', 'Pay Invoice Payment', 'Payment <b>{{total_amount}} {{curr_code}}</b>&nbsp; of Invoice <b>#{{invoice_id}} </b>has been&nbsp; successful, to<b> {{to_user}}</b> at <b>{{time}}.<br></b><div><br></div><div>TrxID : {{trx}}.</div><br>Your New Balance is {{post_balance}} {{curr_code}} .', '', '{\"total_amount\":\"invoice total amount\",\"curr_code\":\"currency code\",\"invoice_id\":\"invoice id\",\"time\":\"payment time and date\",\"to_user\":\"to whom pay the payment\",\"trx\":\"Transaction id\",\"post_balance\":\"post balance\"}', 1, 1, '2019-09-14 07:14:22', '2021-06-30 17:53:35'),
(231, 'MONEY_IN', 'Money In', 'Money In', '<div>Cash In <b>{{amount}} {{curr_code}}</b> from <b>{{agent}}</b> successful. <br></div>Your New Balance <b>{{balance}} {{curr_code}}</b>. <div>TrxID <b>{{trx}}</b> at <b>{{time}}</b>.</div>', 'Cash In  {{amount}} {{curr_code}} from {{agent}} successful.\r\nYour New Balance {{balance}} {{curr_code}}. TrxID {{trx}} at {{time}}.', '{\"amount\":\"Cash in amount\",\"curr_code\":\"currency code\", \"agent\":\"Agent user name or mail\",\"trx\":\"transaction id\",\"time\":\"cash in time and date\",\"balance\":\"New Balance\"}', 1, 1, '2019-09-14 07:14:22', '2021-08-09 23:53:02'),
(232, 'MONEY_IN_AGENT', 'Money In  Agent', 'Money In', '<div>Cash In <b>{{amount}} {{curr_code}}</b> to <b>{{user}}</b> successful.&nbsp; Charge {{charge}} {{curr_code}}<br></div><div>Your Remaining Balance <b>{{balance}} {{curr_code}}</b>. </div><div>TrxID <b>{{trx}}</b> at <b>{{time}}</b>.</div>', '<div>Cash in <b>{{amount}} {{curr_code}}</b> to <b>{{user}}</b> successful. <br></div><div>Your Remaining Balance <b>{{balance}} {{curr_code}}</b>. </div><div>TrxID <b>{{trx}}</b> at <b>{{time}}</b>.</div>', '{\"amount\":\"Cash in amount\",\"curr_code\":\"currency code\", \"user\":\"User name or email\",\"trx\":\"transaction id\",\"time\":\"cash in time and date\",\"balance\":\"Remaining Balance\",\"charge\":\"cash in charge\"}', 1, 1, '2019-09-14 07:14:22', '2021-08-09 23:53:14'),
(233, 'MONEY_IN_COMMISSION_AGENT', 'Money In Commission of Agent', 'Cash In Commission', '<div>Commission of <b>{{amount}} {{curr_code}}</b> Cash in received successfully. <br></div><div>Total Commission : {{commission}} {{curr_Code}}<br></div><div>Your New Balance <b>{{balance}} {{curr_code}}</b>. </div><div>TrxID <b>{{trx}}</b> at <b>{{time}}</b>.</div>', '<div>Commission of <b>{{amount}} {{curr_code}}</b> cash in received successfully. <br></div><div>Your New Balance <b>{{balance}} {{curr_code}}</b>. </div><div>TrxID <b>{{trx}}</b> at <b>{{time}}</b>.</div>', '{\"amount\":\"Cash in amount\",\"curr_code\":\"currency code\", \"trx\":\"transaction id\",\"time\":\"cash in time and date\",\"balance\":\"New Balance\",\"commission\":\"Cash in commission to agent\"}', 1, 1, '2019-09-14 07:14:22', '2021-06-30 20:34:27'),
(234, 'PAYMENT_VER_CODE', 'Payment Verification', 'Payment Verification', '<div>Please use below code to verify your payment.<br></div><div><br></div><div>Your payment verification code is:<font size=\"6\"><b> {{code}}</b></font></div>', NULL, '{\"code\":\"Verification code\"}', 1, 1, '2019-09-24 11:04:05', '2021-01-03 11:35:10'),
(235, 'MERCHANT_PAYMENT', 'Merchant Payment', 'Payment Successful.', '<div>Payment <b>{{amount}} {{curr_code}}</b> received from&nbsp;<b>{{</b><span style=\"white-space: nowrap;\"><b style=\"\"><font size=\"3\">customer_name</font></b></span><b>}}</b> successful. <br></div><div>Charge <b>{{charge}} {{curr_code}}</b>, Remaining Balance <b>{{balance}} {{curr_code}}</b>. </div><div>TrxID <b>{{trx}}</b> at <b>{{time}}</b>.</div>', '<div>Payment <b>{{amount}} {{curr_code}}</b> from <b>{{customer_name}}</b> successful. <br></div><div>Charge <b>{{charge}} {{curr_code}}</b>, New Balance  is <b>{{balance}} {{curr_code}}</b>. </div><div>TrxID <b>{{trx}}</b> at <b>{{time}}</b>.</div>', '{\"amount\":\"Payment amount\",\"curr_code\":\"currency code\", \"customer_name\":\"Customer name or mail\",\"charge\":\"Payment charge\",\"trx\":\"transaction id\",\"time\":\"payment time and date\",\"balance\":\"Remaining Balance\"}', 1, 1, '2019-09-14 07:14:22', '2021-08-20 17:33:40'),
(236, 'OTP', 'OTP Verification', 'OTP Verification', '', '', '{\"code\":\"Verification Code\"}', 1, 1, '2019-09-14 07:14:22', '2021-08-20 17:33:40');

-- --------------------------------------------------------

--
-- Table structure for table `extensions`
--

CREATE TABLE `extensions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `act` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `script` text DEFAULT NULL,
  `shortcode` text DEFAULT NULL,
  `support` text DEFAULT NULL COMMENT 'Help section',
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
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
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
  `data_keys` varchar(255) NOT NULL,
  `data_values` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`data_values`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `frontends`
--

INSERT INTO `frontends` (`id`, `data_keys`, `data_values`, `created_at`, `updated_at`) VALUES
(1, 'seo.data', '{\"image\": \"6350e98b361601666247051.png\", \"keywords\": [\"admin\", \"blog\", \"website\", \"classified\", \"portal\"], \"seo_image\": \"1\", \"description\": \"Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown\", \"social_title\": \"Reference site about Lorem Ipsum\", \"social_description\": \"Reference site about Lorem Ipsum, giving information on its origins, as well as a random Lipsum generator.\"}', '2022-10-16 09:27:21', '2022-10-22 01:57:40');

-- --------------------------------------------------------

--
-- Table structure for table `gateways`
--

CREATE TABLE `gateways` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `gateway_parameters` text NOT NULL,
  `supported_currencies` text NOT NULL,
  `crypto` tinyint(4) DEFAULT NULL,
  `extra` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `input_form` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gateways`
--

INSERT INTO `gateways` (`id`, `name`, `code`, `alias`, `image`, `status`, `gateway_parameters`, `supported_currencies`, `crypto`, `extra`, `description`, `input_form`, `created_at`, `updated_at`) VALUES
(1, 'Paypal', '101', 'Paypal', '5f6f1bd8678601601117144.jpg', 1, '{\"paypal_email\":{\"title\":\"PayPal Email\",\"global\":true,\"value\":\"muhamedhassnmuhamed@gmail.com\"}}', '{\"USD\":\"USD\",\"AUD\":\"AUD\",\"BRL\":\"BRL\",\"CAD\":\"CAD\",\"CHF\":\"CHF\",\"DKK\":\"DKK\",\"EUR\":\"EUR\",\"GBP\":\"GBP\",\"HKD\":\"HKD\",\"INR\":\"INR\",\"JPY\":\"JPY\",\"MXN\":\"MXN\",\"MYR\":\"MYR\",\"NOK\":\"NOK\",\"NZD\":\"NZD\",\"PLN\":\"PLN\",\"SEK\":\"SEK\",\"SGD\":\"SGD\"}', 0, NULL, NULL, NULL, '2019-09-14 07:14:22', '2022-10-20 09:01:15'),
(2, 'Stripe', '103', 'Stripe', '5f6f1d4bc69e71601117515.jpg', 1, '{\"secret_key\":{\"title\":\"Secret Key\",\"global\":true,\"value\":\"pk_test_51L0r39F7YjcJbu9H8O5cDv15w2K4krqWZw6ISQ2yBw85VaYrMC45ofJlIs05NY3lTmqQHONqZvebMIwxPSrHOyrN00Mi5bmGOD\"},\"publishable_key\":{\"title\":\"PUBLISHABLE KEY\",\"global\":true,\"value\":\"pk_test_51L0r39F7YjcJbu9H8O5cDv15w2K4krqWZw6ISQ2yBw85VaYrMC45ofJlIs05NY3lTmqQHONqZvebMIwxPSrHOyrN00Mi5bmGOD\"}}', '{\"USD\":\"USD\",\"AUD\":\"AUD\",\"BRL\":\"BRL\",\"CAD\":\"CAD\",\"CHF\":\"CHF\",\"DKK\":\"DKK\",\"EUR\":\"EUR\",\"GBP\":\"GBP\",\"HKD\":\"HKD\",\"INR\":\"INR\",\"JPY\":\"JPY\",\"MXN\":\"MXN\",\"MYR\":\"MYR\",\"NOK\":\"NOK\",\"NZD\":\"NZD\",\"PLN\":\"PLN\",\"SEK\":\"SEK\",\"SGD\":\"SGD\"}', 0, NULL, NULL, NULL, '2019-09-14 07:14:22', '2022-10-12 05:42:09'),
(3, 'PayStack', '107', 'Paystack', '5f7096563dfb71601214038.jpg', 0, '{\"public_key\":{\"title\":\"Public key\",\"global\":true,\"value\":\"sk_test_8c0f6fa0f6d915ec0cd5e1b190ef3e23d68cf0cc\"},\"secret_key\":{\"title\":\"Secret key\",\"global\":true,\"value\":\"sk_test_8c0f6fa0f6d915ec0cd5e1b190ef3e23d68cf0cc\"}}', '{\"USD\":\"USD\",\"NGN\":\"NGN\"}', 0, '{\"callback\":{\"title\": \"Callback URL\",\"value\":\"ipn.Paystack\"},\"webhook\":{\"title\": \"Webhook URL\",\"value\":\"ipn.Paystack\"}}\r\n', NULL, NULL, '2019-09-14 07:14:22', '2022-10-22 02:13:55');

-- --------------------------------------------------------

--
-- Table structure for table `gateway_currencies`
--

CREATE TABLE `gateway_currencies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `currency` varchar(255) DEFAULT NULL,
  `symbol` varchar(255) DEFAULT NULL,
  `method_code` int(11) DEFAULT NULL,
  `gateway_alias` varchar(255) DEFAULT NULL,
  `min_amount` decimal(24,2) DEFAULT NULL,
  `max_amount` decimal(24,2) DEFAULT NULL,
  `percent_charge` decimal(24,2) DEFAULT NULL,
  `fixed_charge` decimal(24,2) DEFAULT NULL,
  `rate` decimal(24,2) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `gateway_parameter` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `general_settings`
--

CREATE TABLE `general_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sitename` varchar(255) DEFAULT NULL,
  `site_sub_title` varchar(255) DEFAULT NULL,
  `dark` tinyint(4) DEFAULT NULL,
  `cur_text` varchar(255) DEFAULT NULL,
  `cur_sym` varchar(255) DEFAULT NULL,
  `email_from` varchar(255) DEFAULT NULL,
  `sms_api` varchar(255) DEFAULT NULL,
  `base_color` varchar(255) DEFAULT NULL,
  `secondary_color` varchar(255) DEFAULT NULL,
  `component_color` varchar(255) DEFAULT NULL,
  `mail_config` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`mail_config`)),
  `sms_config` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`sms_config`)),
  `ev` tinyint(4) DEFAULT NULL,
  `en` tinyint(4) DEFAULT NULL,
  `sv` tinyint(4) DEFAULT NULL,
  `sn` tinyint(4) DEFAULT NULL,
  `otp_expiration` varchar(255) DEFAULT NULL,
  `otp_verification` tinyint(4) DEFAULT NULL,
  `timezone` varchar(255) DEFAULT NULL,
  `force_ssl` tinyint(4) DEFAULT NULL,
  `secure_password` tinyint(4) DEFAULT NULL,
  `agree` tinyint(4) DEFAULT NULL,
  `registration` tinyint(4) DEFAULT NULL,
  `withdraw_status` tinyint(4) DEFAULT NULL,
  `deposit_status` tinyint(4) DEFAULT NULL,
  `kyc_verification` tinyint(4) DEFAULT NULL,
  `devlopment_mode` tinyint(4) DEFAULT NULL,
  `active_template` varchar(255) DEFAULT NULL,
  `email_template` text DEFAULT NULL,
  `fiat_currency_api` varchar(255) DEFAULT NULL,
  `crypto_currency_api` varchar(255) DEFAULT NULL,
  `qr_template` text DEFAULT NULL,
  `sys_version` varchar(255) DEFAULT NULL,
  `cron_run` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `domain_name` varchar(255) DEFAULT NULL,
  `apps_settings` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`apps_settings`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `general_settings`
--

INSERT INTO `general_settings` (`id`, `sitename`, `site_sub_title`, `dark`, `cur_text`, `cur_sym`, `email_from`, `sms_api`, `base_color`, `secondary_color`, `component_color`, `mail_config`, `sms_config`, `ev`, `en`, `sv`, `sn`, `otp_expiration`, `otp_verification`, `timezone`, `force_ssl`, `secure_password`, `agree`, `registration`, `withdraw_status`, `deposit_status`, `kyc_verification`, `devlopment_mode`, `active_template`, `email_template`, `fiat_currency_api`, `crypto_currency_api`, `qr_template`, `sys_version`, `cron_run`, `created_at`, `updated_at`, `domain_name`, `apps_settings`) VALUES
(1, 'AppDevs Solution', 'Quality Mind Development', 0, 'USD', NULL, 'noreply@appdevs.net', 'hi {{name}}, {{message}}', '#23970c', '#2030ac', '#d41616', '{\"enc\": \"ssl\", \"host\": \"appdevs.net\", \"name\": \"smtp\", \"port\": \"465\", \"password\": \"QP2fsLk?80Ac\", \"username\": \"noreply@appdevs.net\"}', '{\"from\": \"----------------------\", \"name\": \"clickatell\", \"apiv2_key\": \"-------------------------------\", \"auth_token\": \"---------------------------\", \"account_sid\": \"-----------------------\", \"nexmo_api_key\": \"----------------------\", \"infobip_password\": \"----------------------\", \"infobip_username\": \"--------------\", \"nexmo_api_secret\": \"----------------------\", \"clickatell_api_key\": \"----------------------------\", \"text_magic_username\": \"-----------------------\", \"message_bird_api_key\": \"-------------------\", \"sms_broadcast_password\": \"-----------------------------\", \"sms_broadcast_username\": \"----------------------\"}', 1, 1, 1, 1, '60', 0, NULL, 1, 1, 0, 1, 1, 1, 1, 0, 'basic', '<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">\r\n  <!--[if !mso]><!-->\r\n  <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">\r\n  <!--<![endif]-->\r\n  <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">\r\n  <title></title>\r\n  <style type=\"text/css\">\r\n.ReadMsgBody { width: 100%; background-color: #ffffff; }\r\n.ExternalClass { width: 100%; background-color: #ffffff; }\r\n.ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div { line-height: 100%; }\r\nhtml { width: 100%; }\r\nbody { -webkit-text-size-adjust: none; -ms-text-size-adjust: none; margin: 0; padding: 0; }\r\ntable { border-spacing: 0; table-layout: fixed; margin: 0 auto;border-collapse: collapse; }\r\ntable table table { table-layout: auto; }\r\n.yshortcuts a { border-bottom: none !important; }\r\nimg:hover { opacity: 0.9 !important; }\r\na { color: #0087ff; text-decoration: none; }\r\n.textbutton a { font-family: \'open sans\', arial, sans-serif !important;}\r\n.btn-link a { color:#FFFFFF !important;}\r\n\r\n@media only screen and (max-width: 480px) {\r\nbody { width: auto !important; }\r\n*[class=\"table-inner\"] { width: 90% !important; text-align: center !important; }\r\n*[class=\"table-full\"] { width: 100% !important; text-align: center !important; }\r\n/* image */\r\nimg[class=\"img1\"] { width: 100% !important; height: auto !important; }\r\n}\r\n</style>\r\n\r\n\r\n\r\n  <p><table width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" bgcolor=\"#414a51\" align=\"center\">\r\n    <tbody><tr>\r\n      <td height=\"50\"><br></td>\r\n    </tr>\r\n    <tr>\r\n      <td style=\"text-align:center;vertical-align:top;font-size:0;\" align=\"center\">\r\n        <table cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n          <tbody><tr>\r\n            <td width=\"600\" align=\"center\">\r\n              <!--header-->\r\n              <table class=\"table-inner\" width=\"95%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                <tbody><tr>\r\n                  <td style=\"border-top-left-radius:6px; border-top-right-radius:6px;text-align:center;vertical-align:top;font-size:0;\" bgcolor=\"#0087ff\" align=\"center\">\r\n                    <table width=\"90%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                      <tbody><tr>\r\n                        <td height=\"20\"><br></td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td style=\"font-family: \'Open sans\', Arial, sans-serif; color:#FFFFFF; font-size:16px; font-weight: bold;\" align=\"center\"><div align=\"center\"><a href=\"https://premium.appdevs.net/xpay/admin/dashboard\" class=\"sidebar__main-logo\"><img src=\"https://premium.appdevs.net/xpay/assets/images/logoIcon/light_logo.png\" alt=\"image\"></a><br></div></td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td height=\"20\"><br></td>\r\n                      </tr>\r\n                    </tbody></table>\r\n                  </td>\r\n                </tr>\r\n              </tbody></table>\r\n              <!--end header-->\r\n              <table class=\"table-inner\" width=\"95%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\">\r\n                <tbody><tr>\r\n                  <td style=\"text-align:center;vertical-align:top;font-size:0;\" bgcolor=\"#FFFFFF\" align=\"center\">\r\n                    <table width=\"90%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                      <tbody><tr>\r\n                        <td height=\"35\"><br></td>\r\n                      </tr>\r\n                      <!--logo-->\r\n                      <tr>\r\n                        <td style=\"vertical-align:top;font-size:0;\" align=\"center\">\r\n                          \r\n                        <br></td>\r\n                      </tr>\r\n                      <!--end logo-->\r\n                      <tr>\r\n                        <td height=\"40\"><br></td>\r\n                      </tr>\r\n                      <!--headline-->\r\n                      <tr>\r\n                        <td style=\"font-family: \'Open Sans\', Arial, sans-serif; font-size: 22px;color:#414a51;font-weight: bold;\" align=\"center\">Hello {{fullname}}<br></td>\r\n                      </tr>\r\n                      <!--end headline-->\r\n                      <tr>\r\n                        <td style=\"text-align:center;vertical-align:top;font-size:0;\" align=\"center\">\r\n                          <table width=\"40\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                            <tbody><tr>\r\n                              <td style=\" border-bottom:3px solid #0087ff;\" height=\"20\"><br></td>\r\n                            </tr>\r\n                          </tbody></table>\r\n                        </td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td height=\"20\"><br></td>\r\n                      </tr>\r\n                      <!--content-->\r\n                      <tr>\r\n                        <td style=\"font-family: \'Open sans\', Arial, sans-serif; color:#7f8c8d; font-size:16px; line-height: 28px;\" align=\"left\">{{message}}</td>\r\n                      </tr>\r\n                      <!--end content-->\r\n                      <tr>\r\n                        <td height=\"40\"><br></td>\r\n                      </tr>\r\n              \r\n                    </tbody></table>\r\n                  </td>\r\n                </tr>\r\n                <tr>\r\n                  <td style=\"border-bottom-left-radius:6px;border-bottom-right-radius:6px;\" height=\"45\" bgcolor=\"#f4f4f4\" align=\"center\">\r\n                    <table width=\"90%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                      <tbody><tr>\r\n                        <td height=\"10\"><br></td>\r\n                      </tr>\r\n                      <!--preference-->\r\n                      <tr>\r\n                        <td class=\"preference-link\" style=\"font-family: \'Open sans\', Arial, sans-serif; color:#95a5a6; font-size:14px;\" align=\"center\">\r\n                          © 2022 AppDevs . All Rights Reserved. \r\n                        </td>\r\n                      </tr>\r\n                      <!--end preference-->\r\n                      <tr>\r\n                        <td height=\"10\"><br></td>\r\n                      </tr>\r\n                    </tbody></table>\r\n                  </td>\r\n                </tr>\r\n              </tbody></table>\r\n            </td>\r\n          </tr>\r\n        </tbody></table>\r\n      </td>\r\n    </tr>\r\n    <tr>\r\n      <td height=\"60\"><br></td>\r\n    </tr>\r\n  </tbody></table></p>', '14360e0ed85986d6bf9c3aa1a7fd85080000', 'f45ece6d-9f1a-4ed5-841c-647a603d4c0800000', '617569babbeb21635084730.png', NULL, '{\"fiat_cron\":\"2021-10-24T13:28:21.505940Z\",\"crypto_cron\":\"2021-10-24T13:28:16.481555Z\"}', NULL, '2022-10-20 08:49:21', 'http://localhost/haraj_final', '{\"ios_status\": \"on\", \"ios_app_link\": \"https://stackoverflow.com/\", \"google_play_status\": \"on\", \"play_store_app_link\": \"https://mzamin.com/\"}');

-- --------------------------------------------------------

--
-- Table structure for table `google_ads`
--

CREATE TABLE `google_ads` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `google_code` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `text_align` varchar(255) NOT NULL DEFAULT '0' COMMENT '0: left to right text align, 1: right to left text align',
  `is_default` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0: not default language, 1: default language',
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
  `message` varchar(255) NOT NULL,
  `is_read` tinyint(4) DEFAULT NULL,
  `deleted_from` tinyint(4) DEFAULT 0,
  `deleted_to` tinyint(4) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `from`, `to`, `message`, `is_read`, `deleted_from`, `deleted_to`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 'Hello', 1, 0, 0, '2022-10-21 11:34:16', '2022-10-22 02:31:16'),
(2, 2, 1, 'Hello', 1, 0, 0, '2022-10-21 11:34:18', '2022-10-22 02:31:16'),
(3, 1, 2, 'hi', 1, 0, 0, '2022-10-21 11:34:48', '2022-10-21 12:47:10'),
(11, 2, 1, 'No problem', 1, 0, 0, '2022-10-21 11:55:35', '2022-10-22 02:31:16'),
(12, 2, 1, 'Ok', 1, 0, 0, '2022-10-21 11:56:28', '2022-10-22 02:31:16'),
(13, 2, 1, 'No problem', 1, 0, 0, '2022-10-21 11:56:35', '2022-10-22 02:31:16'),
(14, 2, 1, 'Ok', 1, 0, 0, '2022-10-21 11:56:46', '2022-10-22 02:31:16'),
(15, 2, 1, 'Ok', 1, 0, 0, '2022-10-21 11:56:51', '2022-10-22 02:31:16'),
(16, 2, 1, 'No problem', 1, 0, 0, '2022-10-21 11:57:06', '2022-10-22 02:31:16'),
(17, 2, 1, 'Hello', 1, 0, 0, '2022-10-21 11:58:12', '2022-10-22 02:31:16'),
(18, 2, 1, 'No problem', 1, 0, 0, '2022-10-21 11:58:21', '2022-10-22 02:31:16'),
(19, 2, 1, 'No problem', 1, 0, 0, '2022-10-21 11:58:28', '2022-10-22 02:31:16'),
(20, 2, 1, 'Ok', 1, 0, 0, '2022-10-21 11:58:50', '2022-10-22 02:31:16'),
(21, 2, 1, 'Hello', 1, 0, 0, '2022-10-21 11:59:08', '2022-10-22 02:31:16'),
(22, 2, 1, 'Hello', 1, 0, 0, '2022-10-21 11:59:15', '2022-10-22 02:31:16'),
(23, 2, 1, 'write msg', 1, 0, 0, '2022-10-21 11:59:52', '2022-10-22 02:31:16'),
(24, 2, 1, 'jhsfhsldfhsdf', 1, 0, 0, '2022-10-21 12:00:05', '2022-10-22 02:31:16'),
(25, 2, 1, 'jhsfhsldfhsdf', 1, 0, 0, '2022-10-21 12:00:10', '2022-10-22 02:31:16'),
(26, 2, 1, 'jhsfhsldfhsdf', 1, 0, 0, '2022-10-21 12:00:41', '2022-10-22 02:31:16'),
(27, 2, 1, 'jhsfhsldfhsdf', 1, 0, 0, '2022-10-21 12:00:59', '2022-10-22 02:31:16'),
(28, 2, 1, 'No problem', 1, 0, 0, '2022-10-21 12:01:10', '2022-10-22 02:31:16'),
(29, 2, 1, 'Hi', 1, 0, 0, '2022-10-21 12:01:56', '2022-10-22 02:31:16'),
(30, 2, 1, 'kjkkjj', 1, 0, 0, '2022-10-21 12:02:13', '2022-10-22 02:31:16'),
(31, 2, 1, 'jiii', 1, 0, 0, '2022-10-21 12:02:33', '2022-10-22 02:31:16'),
(32, 2, 1, 'uuuu', 1, 0, 0, '2022-10-21 12:02:49', '2022-10-22 02:31:16'),
(33, 2, 1, 'haskfhlsdkjfd', 1, 0, 0, '2022-10-21 12:05:00', '2022-10-22 02:31:16'),
(34, 2, 1, 'Ok', 1, 0, 0, '2022-10-21 12:42:10', '2022-10-22 02:31:16'),
(35, 2, 1, 'No problem', 1, 0, 0, '2022-10-21 12:43:28', '2022-10-22 02:31:16'),
(36, 2, 1, 'Ok', 1, 0, 0, '2022-10-21 12:43:35', '2022-10-22 02:31:16'),
(37, 2, 1, 'No problem', 1, 0, 0, '2022-10-21 12:43:42', '2022-10-22 02:31:16'),
(38, 2, 1, 'Ok', 1, 0, 0, '2022-10-21 12:43:49', '2022-10-22 02:31:16'),
(39, 2, 1, 'Ok', 1, 0, 0, '2022-10-21 12:45:46', '2022-10-22 02:31:16'),
(40, 2, 1, 'No problem', 1, 0, 0, '2022-10-21 12:45:50', '2022-10-22 02:31:16'),
(41, 2, 1, 'No problem', 1, 0, 0, '2022-10-21 12:45:59', '2022-10-22 02:31:16'),
(42, 2, 1, 'Ok', 1, 0, 0, '2022-10-21 12:46:09', '2022-10-22 02:31:16'),
(43, 2, 1, 'hello', 1, 0, 0, '2022-10-21 12:46:13', '2022-10-22 02:31:16'),
(44, 2, 1, 'hyyyy', 1, 0, 0, '2022-10-21 12:46:22', '2022-10-22 02:31:16'),
(45, 2, 1, 'ooooooooo', 1, 0, 0, '2022-10-21 12:46:43', '2022-10-22 02:31:16'),
(46, 2, 1, 'ooooo', 1, 0, 0, '2022-10-21 12:46:49', '2022-10-22 02:31:16'),
(47, 2, 1, 'No problem', 1, 0, 0, '2022-10-21 12:47:09', '2022-10-22 02:31:16'),
(48, 1, 2, 'No problem', 0, 0, 0, '2022-10-22 02:31:08', '2022-10-22 02:31:08');

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
(1, 2, 1, 0, 0, 0, 1, NULL, '2022-10-22 08:31:08', '2022-10-21 11:34:16', '2022-10-22 02:31:08');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
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
(79, '2022_11_23_153520_create_interest_advertisement_table', 20);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `payment_id` varchar(255) DEFAULT NULL,
  `payer_id` varchar(255) DEFAULT NULL,
  `payer_email` varchar(255) DEFAULT NULL,
  `amount` double(10,2) DEFAULT NULL,
  `currency` varchar(255) DEFAULT NULL,
  `payment_status` varchar(255) DEFAULT NULL,
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
  `name` varchar(255) NOT NULL,
  `display_name` varchar(255) NOT NULL,
  `permission_group_id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
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
(15, 'execute_role', 'Execute', 3, 1, NULL, '2022-09-27 23:39:54', '2022-09-27 23:39:54'),
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
(32, 'view_ad_type', 'View Ad Type', 13, 1, NULL, '2022-10-22 12:16:45', '2022-10-22 12:16:45');

-- --------------------------------------------------------

--
-- Table structure for table `permission_groups`
--

CREATE TABLE `permission_groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `group_name` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
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
(13, 'Manage Advertisement types', 1, NULL, '2022-10-22 12:07:57', '2022-10-22 12:07:57');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
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
(2, 1, 10, '2022-10-05 11:42:30', '2022-10-05 11:42:30');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_name` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
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
(3, 'User Role', 1, 1, 0, NULL, '2022-10-01 11:21:12', '2022-10-01 11:21:12');

-- --------------------------------------------------------

--
-- Table structure for table `role_permission`
--

CREATE TABLE `role_permission` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `permissions` text NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_permission`
--

INSERT INTO `role_permission` (`id`, `permissions`, `role_id`, `created_at`, `updated_at`) VALUES
(1, ',view_dashboard,', 1, '2022-09-27 23:39:54', '2022-09-27 23:39:54'),
(2, ',view_permission_group,view_permission,view_role,view_dashboard,view_admin_user,', 3, '2022-10-01 11:21:12', '2022-10-01 11:21:12');

-- --------------------------------------------------------

--
-- Table structure for table `social_media`
--

CREATE TABLE `social_media` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `social_link` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `social_media`
--

INSERT INTO `social_media` (`id`, `title`, `icon`, `social_link`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Facebook', '<i class=\"fab fa-facebook\"></i>', 'https://web.facebook.com/profile.php?id=100075711382480', 1, '2022-10-02 12:56:14', '2022-10-02 23:35:53'),
(2, 'Twitter', '<i class=\"fab fa-twitter\"></i>', 'https://web.facebook.com/profile.php?id=100075711382480', 1, '2022-10-02 13:10:54', '2022-10-02 23:36:01');

-- --------------------------------------------------------

--
-- Table structure for table `support_attachments`
--

CREATE TABLE `support_attachments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `support_message_id` int(10) UNSIGNED NOT NULL,
  `attachment` varchar(255) DEFAULT NULL,
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
  `message` text DEFAULT NULL,
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
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `ticket` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL COMMENT '0: Open, 1: Answered, 2: Replied, 3: Closed',
  `priority` tinyint(4) NOT NULL DEFAULT 0 COMMENT '1 = Low, 2 = medium, 3 = heigh',
  `last_reply` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_type` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `auth_id` int(10) UNSIGNED NOT NULL DEFAULT 11 COMMENT 'PK on auths table 11 = Registerd user',
  `first_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) NOT NULL,
  `alt_mobile_no` varchar(14) DEFAULT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `profile_pic` varchar(255) DEFAULT NULL,
  `profile_pic_url` varchar(255) DEFAULT NULL,
  `facebook_id` varchar(255) DEFAULT NULL,
  `pic_mime_type` varchar(50) DEFAULT NULL,
  `user_type` tinyint(4) NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_contacts`
--

CREATE TABLE `user_contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `advertisement_id` int(10) UNSIGNED NOT NULL,
  `message_sender_id` int(10) UNSIGNED NOT NULL,
  `advertiser_id` int(11) NOT NULL,
  `advertisement_title` varchar(255) DEFAULT NULL,
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
(8, 44, 2, 1, 'Other ad', 90000.00, '2022-10-21 11:34:18', '2022-10-21 11:34:18');

-- --------------------------------------------------------

--
-- Table structure for table `user_groups`
--

CREATE TABLE `user_groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` int(11) NOT NULL COMMENT 'PK of Roles table',
  `auth_roles` int(11) NOT NULL,
  `code` varchar(255) DEFAULT NULL,
  `group_name` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1=Active and 0=Inactive',
  `deleted_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_groups`
--

INSERT INTO `user_groups` (`id`, `role_id`, `auth_roles`, `code`, `group_name`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, 'Admin Group', 1, '2022-10-01 23:05:54', '2022-10-01 11:05:54', '2022-10-01 11:05:54');

-- --------------------------------------------------------

--
-- Table structure for table `user_queries`
--

CREATE TABLE `user_queries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `user_message` varchar(255) NOT NULL,
  `attachment` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_queries`
--

INSERT INTO `user_queries` (`id`, `name`, `email`, `subject`, `user_message`, `attachment`, `created_at`, `updated_at`) VALUES
(1, 'Muhammad Hannan', 'mdhannan.info@gmail.com', 'Subject', 'Message', NULL, '2022-10-03 03:29:23', '2022-10-03 03:29:23');

-- --------------------------------------------------------

--
-- Table structure for table `visitor_histories`
--

CREATE TABLE `visitor_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `mac_address` varchar(255) NOT NULL,
  `iso_code` varchar(45) DEFAULT NULL,
  `country` varchar(45) DEFAULT NULL,
  `city` varchar(45) DEFAULT NULL,
  `state_name` varchar(45) DEFAULT NULL,
  `lat` varchar(45) DEFAULT NULL,
  `lon` varchar(45) DEFAULT NULL,
  `timezone` varchar(45) DEFAULT NULL,
  `user_ip_view_count` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `visitor_histories`
--

INSERT INTO `visitor_histories` (`id`, `ip_address`, `mac_address`, `iso_code`, `country`, `city`, `state_name`, `lat`, `lon`, `timezone`, `user_ip_view_count`, `created_at`, `updated_at`) VALUES
(1, '127.0.0.0', 'C4-E9-84-0F-95-F8', NULL, 'United States', 'New Haven', 'Connecticut', '41.31', '-72.92', NULL, 112, '2022-11-21 05:47:39', '2022-11-21 05:47:39');

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `advertisements`
--
ALTER TABLE `advertisements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `advertisement_advertiser`
--
ALTER TABLE `advertisement_advertiser`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `advertisement_interest_advertisement`
--
ALTER TABLE `advertisement_interest_advertisement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `advertisers`
--
ALTER TABLE `advertisers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ad_complains`
--
ALTER TABLE `ad_complains`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ad_images`
--
ALTER TABLE `ad_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `ad_types`
--
ALTER TABLE `ad_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `auths`
--
ALTER TABLE `auths`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `auth_roles`
--
ALTER TABLE `auth_roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `email_logs`
--
ALTER TABLE `email_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `message_users`
--
ALTER TABLE `message_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `permission_groups`
--
ALTER TABLE `permission_groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `role_permission`
--
ALTER TABLE `role_permission`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_contacts`
--
ALTER TABLE `user_contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_groups`
--
ALTER TABLE `user_groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_queries`
--
ALTER TABLE `user_queries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `visitor_histories`
--
ALTER TABLE `visitor_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
