-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 21, 2020 at 07:06 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `abouts`
--

CREATE TABLE `abouts` (
  `id` int(11) NOT NULL,
  `intro` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `profile_image` varchar(191) DEFAULT NULL,
  `imdb_url` varchar(191) DEFAULT NULL,
  `order` int(191) DEFAULT NULL,
  `is_active` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `abouts`
--

INSERT INTO `abouts` (`id`, `intro`, `description`, `profile_image`, `imdb_url`, `order`, `is_active`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'My Name Is Dipon Rahman, Dhaka Based Director And Cinematographer.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'storage/Abouts/About_1.jpg', 'https://www.google.com/search?q=imdb+rating&oq=imdb+ra&aqs=chrome.2.69i57j0l7.9786j0j7&sourceid=chrome&ie=UTF-8', 1, 1, '2020-09-18 12:46:26', NULL, '2020-09-18 12:52:20', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `avatar`, `email`, `phone`, `password`, `remember_token`, `is_active`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'Admin', 'storage/Admins/Admin_1.jpg', 'admin@admin.com', '018000000000', '$2y$10$vQ36QvDScMUIm1u4L9EiYOHlIBENmpFLAXoRbngDE0.8XWA.dvcHK', 'BxTJCdFoKJVWQqDJKaZkS02qcS8X8qZTner7d7o7ZHboo9rPg9ZMzAsgTAu4', 1, NULL, NULL, '2020-09-16 13:29:30', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `backgrounds`
--

CREATE TABLE `backgrounds` (
  `id` int(11) NOT NULL,
  `section` varchar(191) DEFAULT NULL,
  `banner` varchar(191) DEFAULT NULL,
  `is_active` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `backgrounds`
--

INSERT INTO `backgrounds` (`id`, `section`, `banner`, `is_active`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'home-section', NULL, 1, '2020-09-21 14:45:39', NULL, '2020-09-21 14:45:39', NULL),
(2, 'home-section-video', 'storage/Backgrounds/Background_2.mp4', 1, '2020-09-21 14:45:39', NULL, '2020-09-21 14:45:39', NULL),
(3, 'about-section', NULL, 1, '2020-09-21 14:45:39', NULL, '2020-09-21 14:45:39', NULL),
(4, 'cinematography-section', NULL, 1, '2020-09-21 14:45:39', NULL, '2020-09-21 14:45:39', NULL),
(5, 'still-section', NULL, 1, '2020-09-21 14:45:39', NULL, '2020-09-21 14:45:39', NULL),
(6, 'mention-section', NULL, 1, '2020-09-21 14:45:39', NULL, '2020-09-21 14:45:39', NULL),
(7, 'contact-section', NULL, 1, '2020-09-21 14:45:39', NULL, '2020-09-21 14:45:39', NULL),
(8, 'blog-section', NULL, 1, '2020-09-21 14:45:39', NULL, '2020-09-21 14:45:39', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `base_table`
--

CREATE TABLE `base_table` (
  `id` int(11) NOT NULL,
  `is_active` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `banner` varchar(191) DEFAULT NULL,
  `title` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `url` text DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `is_active` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `banner`, `title`, `description`, `url`, `order`, `is_active`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(5, 'storage/Blogs/Blog_5.jpg', 'Card Title', 'If you have a flight ticket but for some reason you are unable to board your specific flight, we may reschedule your ticket. No matter where you are flight from/to and which airlines.** We can change flights to almost all places on almost all airlines........', 'https://promo-theme.com/spool/gallery/masonry/style-1/', 1, 1, '2020-09-17 12:56:51', NULL, '2020-09-18 09:15:02', NULL),
(6, 'storage/Blogs/Blog_6.jpg', 'Card Title', 'If you have a flight ticket but for some reason you are unable to board your specific flight, we may reschedule your ticket. No matter where you are flight from/to and which airlines.** We can change flights to almost all places on almost all airlines......', 'https://promo-theme.com/spool/gallery/masonry/style-1/', 2, 1, '2020-09-18 09:17:24', NULL, '2020-09-18 09:17:24', NULL),
(7, 'storage/Blogs/Blog_7.jpg', 'Card Title', 'If you have a flight ticket but for some reason you are unable to board your specific flight, we may reschedule your ticket. No matter where you are flight from/to and which airlines.** We can change flights to almost all places on almost all airlines.....', 'https://promo-theme.com/spool/gallery/masonry/style-1/', 3, 1, '2020-09-18 09:18:47', NULL, '2020-09-18 09:21:01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `title` varchar(191) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `is_active` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `order`, `is_active`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(2, 'COMMERCIALS', 2, 1, '2020-09-16 12:32:55', NULL, '2020-09-17 19:33:43', NULL),
(3, 'Naratives', 1, 1, '2020-09-16 12:36:20', NULL, '2020-09-17 19:29:56', NULL),
(5, 'MUSIC VIDEOS', 3, 1, '2020-09-17 19:34:18', NULL, '2020-09-17 19:34:18', NULL),
(6, 'DOCUMENTARIES', 4, 1, '2020-09-17 19:34:40', NULL, '2020-09-17 19:34:40', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cinemas`
--

CREATE TABLE `cinemas` (
  `id` int(11) NOT NULL,
  `title` varchar(191) DEFAULT NULL,
  `banner` varchar(191) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `youtube_id` varchar(191) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `is_active` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cinemas`
--

INSERT INTO `cinemas` (`id`, `title`, `banner`, `order`, `youtube_id`, `category_id`, `is_active`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(3, 'Title', 'storage/Cinemas/Cinema_3.jpg', 12, '07d2dXHYb94', 2, 1, '2020-09-16 13:20:47', NULL, '2020-09-18 10:32:13', NULL),
(4, 'WONDERING HOW TO MAKE YOUR WORK', 'storage/Cinemas/Cinema_4.jpg', 2, '07d2dXHYb94', 2, 1, '2020-09-16 19:39:10', NULL, '2020-09-18 10:31:22', NULL),
(5, 'Change your Existing Video', 'storage/Cinemas/Cinema_5.jpg', 3, '07d2dXHYb94', 5, 1, '2020-09-18 09:02:00', NULL, '2020-09-18 22:06:38', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `inputs`
--

CREATE TABLE `inputs` (
  `id` int(11) NOT NULL,
  `title` varchar(191) DEFAULT NULL,
  `input_design_id` int(11) DEFAULT NULL,
  `required_values` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inputs`
--

INSERT INTO `inputs` (`id`, `title`, `input_design_id`, `required_values`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Basic Input', 1, '[                 \"title\"=>\"Name:\",\r\n                  \"placeholder\"=>\"Enter Name\",\r\n                  \"name\"=>\'name\',\r\n                  \"required\"=>\'1\',\r\n                  \"type\"=>\'text\',\r\n                  \"design\"=>\'1\'\r\n             ]', '2020-08-31 20:35:39', NULL, NULL),
(2, 'Date Time Picker', 7, '[\r\n                  \"title\"=>\"Starting Time:\",\r\n                  \"value\"=>date(\'y-m-d H:i\'),\r\n                  \"name\"=>\'starting_time\',\r\n                  \"id\"=>\'starting_time\',\r\n                  \"required\"=>\'0\',\r\n                  \"design\"=>\'7\'\r\n             ]', '2020-08-31 20:35:39', NULL, NULL),
(3, 'Select Picker', 6, '[\r\n                  \"title\"=>\"Course:\",\r\n                  \"name\"=>\'course_id\',\r\n                  \"data\"=>Courses(),\r\n                  \"required\"=>\'1\',\r\n                  \"design\"=>\'6\'\r\n             ]', '2020-08-31 20:35:39', NULL, NULL),
(4, 'Checkbox Switch', 5, '[\r\n                  \"title\"=>\"Is Active:\",\r\n                  \"name\"=>\'is_active\',\r\n                  \"initial_checked\"=>\'1\',\r\n                  \"design\"=>\'5\'\r\n             ]', '2020-08-31 20:35:39', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mentions`
--

CREATE TABLE `mentions` (
  `id` int(11) NOT NULL,
  `banner` varchar(191) DEFAULT NULL,
  `title` text DEFAULT NULL,
  `url` text DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `is_active` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mentions`
--

INSERT INTO `mentions` (`id`, `banner`, `title`, `url`, `order`, `is_active`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(5, 'storage/Mentions/Mention_5.jpg', 'Change your Existing Video', 'https://www.youtube.com/embed/tyBELcbeT6Y', 1, 1, '2020-09-17 11:49:09', NULL, '2020-09-18 09:23:56', NULL),
(6, 'storage/Mentions/Mention_6.jpg', 'Change your Existing Video', 'https://www.youtube.com/embed/07d2dXHYb94', 3, 1, '2020-09-18 09:26:58', NULL, '2020-09-18 09:36:35', NULL),
(7, 'storage/Mentions/Mention_7.jpg', 'Change your Existing Video', 'https://www.youtube.com/embed/07d2dXHYb94', 2, 1, '2020-09-18 09:27:38', NULL, '2020-09-18 09:35:52', NULL),
(8, 'storage/Mentions/Mention_8.jpg', 'Change your Existing Video', 'https://www.youtube.com/embed/tyBELcbeT6Y', 4, 1, '2020-09-18 10:21:17', NULL, '2020-09-18 10:21:17', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(2, 'App\\User', 1),
(1, 'App\\Admin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'role-list', 'web', '2020-07-17 02:08:58', '2020-07-17 02:08:58'),
(2, 'role-create', 'web', '2020-07-17 02:08:58', '2020-07-17 02:08:58'),
(3, 'push-notification-edit', 'web', '2020-07-17 02:08:58', '2020-07-17 02:08:58'),
(4, 'role-delete', 'web', '2020-07-17 02:08:58', '2020-07-17 02:08:58'),
(5, 'role-view', 'admin', '2020-07-17 02:08:58', '2020-07-17 02:08:58'),
(6, 'role-create', 'admin', '2020-07-17 02:08:58', '2020-07-17 02:08:58'),
(7, 'role-update', 'admin', '2020-07-17 02:08:58', '2020-07-17 02:08:58'),
(8, 'role-delete', 'admin', '2020-07-17 02:08:58', '2020-07-17 02:08:58'),
(9, 'user-list', 'admin', '2020-07-17 02:08:58', '2020-07-17 02:08:58'),
(10, 'user-create', 'admin', '2020-07-17 02:08:58', '2020-07-17 02:08:58'),
(11, 'user-edit', 'admin', '2020-07-17 02:08:58', '2020-07-17 02:08:58'),
(12, 'user-delete', 'admin', '2020-07-17 02:08:58', '2020-07-17 02:08:58'),
(13, 'crud-list', 'admin', '2020-07-17 02:08:58', '2020-07-17 02:08:58'),
(14, 'crud-create', 'admin', '2020-07-17 02:08:58', '2020-07-17 02:08:58'),
(15, 'crud-edit', 'admin', '2020-07-17 02:08:58', '2020-07-17 02:08:58'),
(16, 'crud-delete', 'admin', '2020-07-17 02:08:58', '2020-07-17 02:08:58'),
(17, 'course-list', 'admin', '2020-07-17 02:08:58', '2020-07-17 02:08:58'),
(18, 'course-create', 'admin', '2020-07-17 02:08:58', '2020-07-17 02:08:58'),
(19, 'course-edit', 'admin', '2020-07-17 02:08:58', '2020-07-17 02:08:58'),
(20, 'course-delete', 'admin', '2020-07-17 02:08:58', '2020-07-17 02:08:58'),
(21, 'video-edit', 'web', '2020-07-17 02:08:58', '2020-07-17 02:08:58'),
(22, 'user-view', 'admin', '2020-09-09 22:15:37', '2020-09-09 22:15:37'),
(23, 'user-update', 'admin', '2020-09-09 22:15:37', '2020-09-09 22:15:37'),
(24, 'crud-view', 'admin', '2020-09-09 22:15:37', '2020-09-09 22:15:37'),
(25, 'crud-update', 'admin', '2020-09-09 22:15:38', '2020-09-09 22:15:38'),
(26, 'course-view', 'admin', '2020-09-09 22:15:38', '2020-09-09 22:15:38'),
(27, 'course-update', 'admin', '2020-09-09 22:15:38', '2020-09-09 22:15:38'),
(28, 'role-view', 'web', '2020-09-09 22:20:46', '2020-09-09 22:20:46'),
(29, 'role-update', 'web', '2020-09-09 22:20:46', '2020-09-09 22:20:46'),
(30, 'push-notification-view', 'web', '2020-09-09 22:20:46', '2020-09-09 22:20:46'),
(31, 'push-notification-create', 'web', '2020-09-09 22:20:47', '2020-09-09 22:20:47'),
(32, 'push-notification-update', 'web', '2020-09-09 22:20:47', '2020-09-09 22:20:47'),
(33, 'push-notification-delete', 'web', '2020-09-09 22:20:47', '2020-09-09 22:20:47'),
(34, 'video-view', 'web', '2020-09-09 22:20:47', '2020-09-09 22:20:47'),
(35, 'video-create', 'web', '2020-09-09 22:20:47', '2020-09-09 22:20:47'),
(36, 'video-update', 'web', '2020-09-09 22:20:48', '2020-09-09 22:20:48'),
(37, 'video-delete', 'web', '2020-09-09 22:20:48', '2020-09-09 22:20:48');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin', '2020-07-17 02:09:20', '2020-07-17 02:09:20'),
(2, 'User', 'web', '2020-07-17 02:19:49', '2020-07-17 02:19:49');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 2),
(2, 2),
(3, 2),
(4, 2),
(7, 1),
(8, 1),
(9, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(13, 2),
(14, 2),
(15, 2),
(16, 2),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(7, 1),
(8, 1),
(12, 1),
(14, 1),
(16, 1),
(18, 1),
(20, 1),
(7, 1),
(8, 1),
(23, 1),
(12, 1),
(24, 1),
(14, 1),
(25, 1),
(16, 1),
(26, 1),
(18, 1),
(27, 1),
(20, 1),
(7, 1),
(8, 1),
(23, 1),
(12, 1),
(24, 1),
(14, 1),
(25, 1),
(16, 1),
(26, 1),
(18, 1),
(27, 1),
(20, 1),
(28, 2),
(2, 2),
(29, 2),
(4, 2),
(30, 2),
(31, 2),
(32, 2),
(33, 2),
(34, 2),
(35, 2),
(36, 2),
(37, 2),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(22, 1),
(10, 1),
(23, 1),
(12, 1),
(24, 1),
(14, 1),
(25, 1),
(16, 1),
(26, 1),
(18, 1),
(27, 1),
(20, 1);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `group` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `is_active` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `created_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `group`, `type`, `key`, `value`, `title`, `order`, `is_active`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, NULL, NULL, 'email', 'test@test.com', 'Email', 1, NULL, '2020-09-21 15:47:48', NULL, NULL, NULL),
(2, NULL, NULL, 'email', 'test@test.com', 'Email', 1, NULL, '2020-09-21 15:49:01', NULL, NULL, NULL),
(3, NULL, NULL, 'phone', '+880188888888', 'Phone', 1, NULL, '2020-09-21 15:49:35', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `stills`
--

CREATE TABLE `stills` (
  `id` int(11) NOT NULL,
  `banner` varchar(191) DEFAULT NULL,
  `title` text DEFAULT NULL,
  `url` text DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `is_active` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stills`
--

INSERT INTO `stills` (`id`, `banner`, `title`, `url`, `order`, `is_active`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'storage/Stills/Still_1.jpg', 'Change your Existing Ticket', 'https://www.facebook.com/', 4, 1, '2020-09-17 10:34:47', NULL, '2020-09-18 09:07:07', NULL),
(2, 'storage/Stills/Still_2.jpg', 'Test Category', 'https://www.facebook.com/', 2, 1, '2020-09-17 10:53:55', NULL, '2020-09-17 10:53:55', NULL),
(3, 'storage/Stills/Still_3.jpg', 'Change your Existing Ticket', 'https://www.facebook.com/', 3, 1, '2020-09-17 10:54:27', NULL, '2020-09-18 09:04:52', NULL),
(4, 'storage/Stills/Still_4.jpg', 'Change your Existing Video', 'https://www.facebook.com/', 1, 1, '2020-09-17 10:55:03', NULL, '2020-09-18 09:05:35', NULL),
(5, 'storage/Stills/Still_5.jpg', 'Change your Existing Ticket', 'https://www.facebook.com/', 5, 1, '2020-09-18 09:08:05', NULL, '2020-09-18 09:08:05', NULL),
(6, 'storage/Stills/Still_6.jpg', 'Change your Existing Ticket', 'https://www.facebook.com/', 6, 1, '2020-09-18 09:08:46', NULL, '2020-09-18 09:08:46', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'profile/profile.png',
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active_session` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `firebase_token` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` int(11) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abouts`
--
ALTER TABLE `abouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `backgrounds`
--
ALTER TABLE `backgrounds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `base_table`
--
ALTER TABLE `base_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cinemas`
--
ALTER TABLE `cinemas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inputs`
--
ALTER TABLE `inputs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `input_design_id` (`input_design_id`);

--
-- Indexes for table `mentions`
--
ALTER TABLE `mentions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD KEY `model_has_permissions_permission_id_foreign` (`permission_id`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD KEY `model_has_roles_role_id_foreign` (`role_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD KEY `role_has_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stills`
--
ALTER TABLE `stills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `phone` (`phone`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abouts`
--
ALTER TABLE `abouts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `backgrounds`
--
ALTER TABLE `backgrounds`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `base_table`
--
ALTER TABLE `base_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `cinemas`
--
ALTER TABLE `cinemas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `inputs`
--
ALTER TABLE `inputs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `mentions`
--
ALTER TABLE `mentions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `stills`
--
ALTER TABLE `stills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
