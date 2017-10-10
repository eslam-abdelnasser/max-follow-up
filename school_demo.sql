-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 03, 2017 at 04:37 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school_demo`
--

-- --------------------------------------------------------

--
-- Table structure for table `about-description`
--

CREATE TABLE `about-description` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `meta_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lang_id` int(10) UNSIGNED NOT NULL,
  `about_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `about-description`
--

INSERT INTO `about-description` (`id`, `title`, `description`, `meta_title`, `meta_description`, `lang_id`, `about_id`, `created_at`, `updated_at`) VALUES
(1, 'Arabic Title', '<p>Arabic Desccription</p>', 'Arabic meta Title', 'Arabic meta Description', 1, 1, '2017-09-28 17:41:04', '2017-09-28 17:41:50'),
(2, 'Enligh Title', '<p>English Description</p>', 'English Meta Title', 'english meta desctiption', 2, 1, '2017-09-28 17:41:04', '2017-09-28 17:41:50');

-- --------------------------------------------------------

--
-- Table structure for table `about-us`
--

CREATE TABLE `about-us` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `about-us`
--

INSERT INTO `about-us` (`id`, `created_at`, `updated_at`) VALUES
(1, '2017-09-28 17:41:04', '2017-09-28 17:41:04');

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `id` int(10) UNSIGNED NOT NULL,
  `home_page_status` enum('0','1') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`id`, `home_page_status`, `status`, `image_url`, `created_at`, `updated_at`) VALUES
(1, '1', '1', 'NzsGmH.jpg', '2017-09-27 16:21:20', '2017-09-27 16:21:20');

-- --------------------------------------------------------

--
-- Table structure for table `activities_description`
--

CREATE TABLE `activities_description` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lang_id` int(10) UNSIGNED NOT NULL,
  `activity_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activities_description`
--

INSERT INTO `activities_description` (`id`, `title`, `description`, `slug`, `meta_title`, `meta_description`, `lang_id`, `activity_id`, `created_at`, `updated_at`) VALUES
(1, 'Arabic Title', 'ara', 'Arabic Title', 'Arabic meta Title', 'Arabic meta Description', 1, 1, '2017-09-27 16:21:20', '2017-09-27 16:21:20'),
(2, 'Enligh Title', 'eme', 'Enligh Title', 'English Meta Title', 'english meta desctiption', 2, 1, '2017-09-27 16:21:20', '2017-09-27 16:21:20');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `job_title`, `password`, `remember_token`, `created_at`, `updated_at`, `image_url`, `phone`, `facebook`, `linkedin`) VALUES
(1, 'Ahmed', 'ahmed@nesthub.net', 'software dev', '$2y$10$.42kg7/U2ibZOu1Pb71.mOpjycj/xSrMAbn/Oubzp0TaJCb1c4jqS', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `admin_role`
--

CREATE TABLE `admin_role` (
  `admin_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admission_roles`
--

CREATE TABLE `admission_roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `lang_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admission_roles`
--

INSERT INTO `admission_roles` (`id`, `title`, `description`, `lang_id`, `created_at`, `updated_at`) VALUES
(1, 'Arabic Title', '<p>asdasdasdasd</p>', 1, '2017-10-03 11:06:49', '2017-10-03 11:06:49'),
(2, 'Enligh Title', '<p>asdasdasdasd</p>', 2, '2017-10-03 11:06:49', '2017-10-03 11:06:49'),
(3, 'Arabic Titleasdas', '<p>asfewreqrqwrqwrq</p>', 1, '2017-10-03 11:07:03', '2017-10-03 11:07:03'),
(4, 'aaaaaaaaaaa', '<p>safqerqqeqweqweqwesa</p>', 2, '2017-10-03 11:07:03', '2017-10-03 11:07:03');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(10) UNSIGNED NOT NULL,
  `home_page_status` enum('0','1') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `home_page_status`, `status`, `image_url`, `created_at`, `updated_at`) VALUES
(1, '1', '1', 'iR1gfm.jpg', '2017-10-01 19:54:21', '2017-10-01 19:54:21');

-- --------------------------------------------------------

--
-- Table structure for table `blogs_description`
--

CREATE TABLE `blogs_description` (
  `id` int(10) UNSIGNED NOT NULL,
  `auther_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lang_id` int(10) UNSIGNED NOT NULL,
  `blog_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs_description`
--

INSERT INTO `blogs_description` (`id`, `auther_name`, `title`, `description`, `slug`, `meta_title`, `meta_description`, `lang_id`, `blog_id`, `created_at`, `updated_at`) VALUES
(1, 'ahmed', 'Arabic Title', '<p>asdasdsa dasdasdasdas</p>\r\n<p>asfasfsafasfa</p>', 'Arabic Title', 'Arabic meta Title', 'Arabic meta Description', 1, 1, '2017-10-01 19:54:21', '2017-10-01 19:54:21'),
(2, 'ahmed', 'english title', '<p>sadsadasdasfer</p>\r\n<p>ytryrtyrtyrtuyiu</p>', 'english title', 'English Meta Title', 'english meta desctiption', 2, 1, '2017-10-01 19:54:21', '2017-10-01 19:54:21');

-- --------------------------------------------------------

--
-- Table structure for table `careers`
--

CREATE TABLE `careers` (
  `id` int(10) UNSIGNED NOT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `career_descriptions`
--

CREATE TABLE `career_descriptions` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lang_id` int(10) UNSIGNED NOT NULL,
  `career_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contact-emails`
--

CREATE TABLE `contact-emails` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci,
  `seen` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL,
  `seen_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact-emails`
--

INSERT INTO `contact-emails` (`id`, `name`, `phone_number`, `email`, `subject`, `message`, `seen`, `seen_by`, `created_at`, `updated_at`) VALUES
(1, 'ahmed', '01113758376', 'ahmed@nesthub.net', 'no', 'asd sadasd asdasdnasdsadsad asdas  asd asdasda sd  asd asd as d', '1', 1, '2017-10-03 11:33:12', '2017-10-03 11:33:25');

-- --------------------------------------------------------

--
-- Table structure for table `education_levels`
--

CREATE TABLE `education_levels` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `lang_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `education_levels`
--

INSERT INTO `education_levels` (`id`, `title`, `description`, `lang_id`, `created_at`, `updated_at`) VALUES
(1, 'ahmed', 'adsasdasdsadas\r\nd asdsad asd sad asd \r\nasd asd asd asd asfsads ad', 2, NULL, NULL),
(2, 'mohamed', 'asdsadrtertrtret\r\nerterterterteryeyretert\r\nertert\r\nerterterter\r\nte\r\nrt\r\nert\r\nerte\r\nrt\r\nert\r\nert\r\nret\r\nrt', 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` int(10) UNSIGNED NOT NULL,
  `question` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lang_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` int(10) UNSIGNED NOT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL,
  `home_page_status` enum('0','1') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gallery-description`
--

CREATE TABLE `gallery-description` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lang_id` int(10) UNSIGNED NOT NULL,
  `gallery_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `general-setting`
--

CREATE TABLE `general-setting` (
  `id` int(10) UNSIGNED NOT NULL,
  `site_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_ar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_description` text COLLATE utf8mb4_unicode_ci,
  `site_keywords` text COLLATE utf8mb4_unicode_ci,
  `google_analytics_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_analytics_script` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `general-setting`
--

INSERT INTO `general-setting` (`id`, `site_url`, `email`, `phone`, `address_ar`, `address_en`, `site_description`, `site_keywords`, `google_analytics_id`, `google_analytics_script`, `created_at`, `updated_at`) VALUES
(1, 'ahmed.com', 'ahmed@nesthub.net', '233213121', 'asdsads', 'sadsadsdad', 'assadsadasd', 'sadasdsadas', 'dsaddsadsdad', 'sadasdsaas', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `laboratories`
--

CREATE TABLE `laboratories` (
  `id` int(10) UNSIGNED NOT NULL,
  `home_page_status` enum('0','1') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `laboratories`
--

INSERT INTO `laboratories` (`id`, `home_page_status`, `status`, `image_url`, `created_at`, `updated_at`) VALUES
(1, '1', '1', '4moscV.jpg', '2017-09-27 15:13:38', '2017-09-27 15:13:38');

-- --------------------------------------------------------

--
-- Table structure for table `laboratory_description`
--

CREATE TABLE `laboratory_description` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lang_id` int(10) UNSIGNED NOT NULL,
  `laboratory_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `laboratory_description`
--

INSERT INTO `laboratory_description` (`id`, `title`, `description`, `slug`, `meta_title`, `meta_description`, `lang_id`, `laboratory_id`, `created_at`, `updated_at`) VALUES
(1, 'Arabic Title', 'ara', 'Arabic Title', 'Arabic meta Title', 'Arabic meta Description', 1, 1, '2017-09-27 15:13:38', '2017-09-27 15:13:38'),
(2, 'Enligh Title', 'en', 'Enligh Title', 'English Meta Title', 'english meta desctiption', 2, 1, '2017-09-27 15:13:38', '2017-09-27 15:13:38');

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` int(10) UNSIGNED NOT NULL,
  `label` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `label`, `status`, `name`, `created_at`, `updated_at`) VALUES
(1, 'ar', '1', 'Arabic', '2017-09-27 13:56:59', '2017-09-27 13:57:14'),
(2, 'en', '1', 'English', '2017-09-27 13:57:25', '2017-09-27 13:57:25');

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gallery_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_08_21_021801_create_admins_table', 1),
(4, '2017_09_17_111411_entrust_setup_tables', 1),
(5, '2017_09_17_120535_create_languages_table', 1),
(6, '2017_09_17_142824_add_columns_phone_social_links_admin_table', 1),
(7, '2017_09_19_110520_create_services_table', 1),
(8, '2017_09_19_110900_create_service_description_table', 1),
(9, '2017_09_19_141143_create_faqs_tabel', 1),
(10, '2017_09_21_100317_create_blogs_table', 1),
(11, '2017_09_21_100636_create_blogs_description_table', 1),
(12, '2017_09_22_192259_create_career_table', 1),
(13, '2017_09_22_192357_create_career_description_table', 1),
(14, '2017_09_24_101013_create_galleries_table', 1),
(15, '2017_09_24_101111_create_gallery_description_table', 1),
(16, '2017_09_24_101302_create_media_table', 1),
(17, '2017_09_24_172324_create_slider_table', 1),
(18, '2017_09_24_172408_create_slider_description_table', 1),
(19, '2017_09_25_080637_create_about_us_table', 1),
(20, '2017_09_25_080814_create_about_us_description_table', 1),
(21, '2017_09_25_094131_create_socials_table', 1),
(22, '2017_09_25_094220_create_general_setting_table', 1),
(23, '2017_09_26_205521_create_new_table', 1),
(24, '2017_09_26_205537_create_teacher_table', 1),
(25, '2017_09_26_205602_create_activity_table', 1),
(26, '2017_09_26_205636_create_laboratory_table', 1),
(27, '2017_09_26_205800_create_laboratorydescription_table', 1),
(28, '2017_09_26_205910_create_activitydescription_table', 1),
(29, '2017_09_26_205947_create_teacherdescription_table', 1),
(30, '2017_09_26_210020_create_newdescription_table', 1),
(31, '2017_09_27_151452_create_subject_table', 1),
(32, '2017_09_27_151538_create_subject_description_table', 1),
(33, '2017_09_28_194922_create_education_level_table', 2),
(34, '2017_09_28_195346_create_admission_roles_table', 2),
(35, '2017_09_28_200101_create_supervisors_table', 2),
(36, '2017_10_03_131431_create_contact-emails', 3);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(10) UNSIGNED NOT NULL,
  `home_page_status` enum('0','1') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `home_page_status`, `status`, `image_url`, `created_at`, `updated_at`) VALUES
(1, '1', '1', 'Zyyqd3.jpg', '2017-09-27 15:15:37', '2017-09-27 15:15:37');

-- --------------------------------------------------------

--
-- Table structure for table `news_description`
--

CREATE TABLE `news_description` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lang_id` int(10) UNSIGNED NOT NULL,
  `new_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news_description`
--

INSERT INTO `news_description` (`id`, `title`, `description`, `slug`, `meta_title`, `meta_description`, `lang_id`, `new_id`, `created_at`, `updated_at`) VALUES
(1, 'Arabic Title', 'ara', 'Arabic Title', 'Arabic meta Title', 'Arabic meta Description', 1, 1, '2017-09-27 15:15:37', '2017-09-27 15:15:37'),
(2, 'Enligh Title', 'en', 'Enligh Title', 'English Meta Title', 'english meta desctiption', 2, 1, '2017-09-27 15:15:38', '2017-09-27 15:15:38');

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
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'admins.index', 'show admins table', 'Admin will be able to see all system admins', '2017-10-03 11:26:45', '2017-10-03 11:26:45'),
(2, 'admins.create', 'Create new admins', 'Admin will be able to Create new admins', '2017-10-03 11:26:45', '2017-10-03 11:26:45'),
(3, 'admins.show', 'Show Spacific admins Data', 'Admin will be able to see spacific admins profile', '2017-10-03 11:26:45', '2017-10-03 11:26:45'),
(4, 'admins.edit', 'Edit admins Data', 'Admin will be able to Edit admins Data', '2017-10-03 11:26:45', '2017-10-03 11:26:45'),
(5, 'admins.destroy', 'Delete admins Data', 'Admin will be able to Delete admins Data', '2017-10-03 11:26:45', '2017-10-03 11:26:45'),
(6, 'roles.index', 'show roles table', 'Admin will be able to see all system roles', '2017-10-03 11:26:45', '2017-10-03 11:26:45'),
(7, 'roles.create', 'Create new roles', 'Admin will be able to Create new roles', '2017-10-03 11:26:45', '2017-10-03 11:26:45'),
(8, 'roles.show', 'Show Spacific roles Data', 'Admin will be able to see spacific roles profile', '2017-10-03 11:26:45', '2017-10-03 11:26:45'),
(9, 'roles.edit', 'Edit roles Data', 'Admin will be able to Edit roles Data', '2017-10-03 11:26:45', '2017-10-03 11:26:45'),
(10, 'roles.destroy', 'Delete roles Data', 'Admin will be able to Delete roles Data', '2017-10-03 11:26:46', '2017-10-03 11:26:46'),
(11, 'languages.index', 'show languages table', 'Admin will be able to see all system languages', '2017-10-03 11:26:46', '2017-10-03 11:26:46'),
(12, 'languages.create', 'Create new languages', 'Admin will be able to Create new languages', '2017-10-03 11:26:46', '2017-10-03 11:26:46'),
(13, 'languages.show', 'Show Spacific languages Data', 'Admin will be able to see spacific languages profile', '2017-10-03 11:26:46', '2017-10-03 11:26:46'),
(14, 'languages.edit', 'Edit languages Data', 'Admin will be able to Edit languages Data', '2017-10-03 11:26:46', '2017-10-03 11:26:46'),
(15, 'languages.destroy', 'Delete languages Data', 'Admin will be able to Delete languages Data', '2017-10-03 11:26:46', '2017-10-03 11:26:46'),
(16, 'services.index', 'show services table', 'Admin will be able to see all system services', '2017-10-03 11:26:46', '2017-10-03 11:26:46'),
(17, 'services.create', 'Create new services', 'Admin will be able to Create new services', '2017-10-03 11:26:46', '2017-10-03 11:26:46'),
(18, 'services.show', 'Show Spacific services Data', 'Admin will be able to see spacific services profile', '2017-10-03 11:26:46', '2017-10-03 11:26:46'),
(19, 'services.edit', 'Edit services Data', 'Admin will be able to Edit services Data', '2017-10-03 11:26:46', '2017-10-03 11:26:46'),
(20, 'services.destroy', 'Delete services Data', 'Admin will be able to Delete services Data', '2017-10-03 11:26:46', '2017-10-03 11:26:46'),
(21, 'teachers.index', 'show teachers table', 'Admin will be able to see all system teachers', '2017-10-03 11:26:46', '2017-10-03 11:26:46'),
(22, 'teachers.create', 'Create new teachers', 'Admin will be able to Create new teachers', '2017-10-03 11:26:46', '2017-10-03 11:26:46'),
(23, 'teachers.show', 'Show Spacific teachers Data', 'Admin will be able to see spacific teachers profile', '2017-10-03 11:26:46', '2017-10-03 11:26:46'),
(24, 'teachers.edit', 'Edit teachers Data', 'Admin will be able to Edit teachers Data', '2017-10-03 11:26:46', '2017-10-03 11:26:46'),
(25, 'teachers.destroy', 'Delete teachers Data', 'Admin will be able to Delete teachers Data', '2017-10-03 11:26:46', '2017-10-03 11:26:46'),
(26, 'news.index', 'show news table', 'Admin will be able to see all system news', '2017-10-03 11:26:46', '2017-10-03 11:26:46'),
(27, 'news.create', 'Create new news', 'Admin will be able to Create new news', '2017-10-03 11:26:46', '2017-10-03 11:26:46'),
(28, 'news.show', 'Show Spacific news Data', 'Admin will be able to see spacific news profile', '2017-10-03 11:26:46', '2017-10-03 11:26:46'),
(29, 'news.edit', 'Edit news Data', 'Admin will be able to Edit news Data', '2017-10-03 11:26:46', '2017-10-03 11:26:46'),
(30, 'news.destroy', 'Delete news Data', 'Admin will be able to Delete news Data', '2017-10-03 11:26:46', '2017-10-03 11:26:46'),
(31, 'laboratories.index', 'show laboratories table', 'Admin will be able to see all system laboratories', '2017-10-03 11:26:46', '2017-10-03 11:26:46'),
(32, 'laboratories.create', 'Create new laboratories', 'Admin will be able to Create new laboratories', '2017-10-03 11:26:46', '2017-10-03 11:26:46'),
(33, 'laboratories.show', 'Show Spacific laboratories Data', 'Admin will be able to see spacific laboratories profile', '2017-10-03 11:26:46', '2017-10-03 11:26:46'),
(34, 'laboratories.edit', 'Edit laboratories Data', 'Admin will be able to Edit laboratories Data', '2017-10-03 11:26:46', '2017-10-03 11:26:46'),
(35, 'laboratories.destroy', 'Delete laboratories Data', 'Admin will be able to Delete laboratories Data', '2017-10-03 11:26:46', '2017-10-03 11:26:46'),
(36, 'activities.index', 'show activities table', 'Admin will be able to see all system activities', '2017-10-03 11:26:46', '2017-10-03 11:26:46'),
(37, 'activities.create', 'Create new activities', 'Admin will be able to Create new activities', '2017-10-03 11:26:46', '2017-10-03 11:26:46'),
(38, 'activities.show', 'Show Spacific activities Data', 'Admin will be able to see spacific activities profile', '2017-10-03 11:26:46', '2017-10-03 11:26:46'),
(39, 'activities.edit', 'Edit activities Data', 'Admin will be able to Edit activities Data', '2017-10-03 11:26:46', '2017-10-03 11:26:46'),
(40, 'activities.destroy', 'Delete activities Data', 'Admin will be able to Delete activities Data', '2017-10-03 11:26:46', '2017-10-03 11:26:46'),
(41, 'galleries.index', 'show galleries table', 'Admin will be able to see all system galleries', '2017-10-03 11:26:46', '2017-10-03 11:26:46'),
(42, 'galleries.create', 'Create new galleries', 'Admin will be able to Create new galleries', '2017-10-03 11:26:47', '2017-10-03 11:26:47'),
(43, 'galleries.show', 'Show Spacific galleries Data', 'Admin will be able to see spacific galleries profile', '2017-10-03 11:26:47', '2017-10-03 11:26:47'),
(44, 'galleries.edit', 'Edit galleries Data', 'Admin will be able to Edit galleries Data', '2017-10-03 11:26:47', '2017-10-03 11:26:47'),
(45, 'galleries.destroy', 'Delete galleries Data', 'Admin will be able to Delete galleries Data', '2017-10-03 11:26:47', '2017-10-03 11:26:47'),
(46, 'slider.index', 'show slider table', 'Admin will be able to see all system slider', '2017-10-03 11:26:47', '2017-10-03 11:26:47'),
(47, 'slider.create', 'Create new slider', 'Admin will be able to Create new slider', '2017-10-03 11:26:47', '2017-10-03 11:26:47'),
(48, 'slider.show', 'Show Spacific slider Data', 'Admin will be able to see spacific slider profile', '2017-10-03 11:26:47', '2017-10-03 11:26:47'),
(49, 'slider.edit', 'Edit slider Data', 'Admin will be able to Edit slider Data', '2017-10-03 11:26:47', '2017-10-03 11:26:47'),
(50, 'slider.destroy', 'Delete slider Data', 'Admin will be able to Delete slider Data', '2017-10-03 11:26:47', '2017-10-03 11:26:47'),
(51, 'faqs.index', 'show faqs table', 'Admin will be able to see all system faqs', '2017-10-03 11:26:47', '2017-10-03 11:26:47'),
(52, 'faqs.create', 'Create new faqs', 'Admin will be able to Create new faqs', '2017-10-03 11:26:47', '2017-10-03 11:26:47'),
(53, 'faqs.show', 'Show Spacific faqs Data', 'Admin will be able to see spacific faqs profile', '2017-10-03 11:26:47', '2017-10-03 11:26:47'),
(54, 'faqs.edit', 'Edit faqs Data', 'Admin will be able to Edit faqs Data', '2017-10-03 11:26:47', '2017-10-03 11:26:47'),
(55, 'faqs.destroy', 'Delete faqs Data', 'Admin will be able to Delete faqs Data', '2017-10-03 11:26:47', '2017-10-03 11:26:47'),
(56, 'socials.index', 'show socials table', 'Admin will be able to see all system socials', '2017-10-03 11:26:47', '2017-10-03 11:26:47'),
(57, 'socials.create', 'Create new socials', 'Admin will be able to Create new socials', '2017-10-03 11:26:47', '2017-10-03 11:26:47'),
(58, 'socials.show', 'Show Spacific socials Data', 'Admin will be able to see spacific socials profile', '2017-10-03 11:26:47', '2017-10-03 11:26:47'),
(59, 'socials.edit', 'Edit socials Data', 'Admin will be able to Edit socials Data', '2017-10-03 11:26:47', '2017-10-03 11:26:47'),
(60, 'socials.destroy', 'Delete socials Data', 'Admin will be able to Delete socials Data', '2017-10-03 11:26:47', '2017-10-03 11:26:47'),
(61, 'supervisors.index', 'show supervisors table', 'Admin will be able to see all system supervisors', '2017-10-03 11:26:47', '2017-10-03 11:26:47'),
(62, 'supervisors.create', 'Create new supervisors', 'Admin will be able to Create new supervisors', '2017-10-03 11:26:47', '2017-10-03 11:26:47'),
(63, 'supervisors.show', 'Show Spacific supervisors Data', 'Admin will be able to see spacific supervisors profile', '2017-10-03 11:26:47', '2017-10-03 11:26:47'),
(64, 'supervisors.edit', 'Edit supervisors Data', 'Admin will be able to Edit supervisors Data', '2017-10-03 11:26:47', '2017-10-03 11:26:47'),
(65, 'supervisors.destroy', 'Delete supervisors Data', 'Admin will be able to Delete supervisors Data', '2017-10-03 11:26:47', '2017-10-03 11:26:47'),
(66, 'supervisors.destroy.all', 'Delete supervisors Data', 'Admin will be able to Delete supervisors Data', '2017-10-03 11:26:47', '2017-10-03 11:26:47'),
(67, 'education-levels.index', 'show education-levels table', 'Admin will be able to see all system education-levels', '2017-10-03 11:26:47', '2017-10-03 11:26:47'),
(68, 'education-levels.create', 'Create new education-levels', 'Admin will be able to Create new education-levels', '2017-10-03 11:26:47', '2017-10-03 11:26:47'),
(69, 'education-levels.show', 'Show Spacific education-levels Data', 'Admin will be able to see spacific education-levels profile', '2017-10-03 11:26:47', '2017-10-03 11:26:47'),
(70, 'education-levels.edit', 'Edit education-levels Data', 'Admin will be able to Edit education-levels Data', '2017-10-03 11:26:47', '2017-10-03 11:26:47'),
(71, 'education-levels.destroy', 'Delete education-levels Data', 'Admin will be able to Delete education-levels Data', '2017-10-03 11:26:47', '2017-10-03 11:26:47'),
(72, 'education-levels.destroy.all', 'Delete education-levels Data', 'Admin will be able to Delete education-levels Data', '2017-10-03 11:26:47', '2017-10-03 11:26:47'),
(73, 'admission-roles.index', 'show admission-roles table', 'Admin will be able to see all system admission-roles', '2017-10-03 11:26:47', '2017-10-03 11:26:47'),
(74, 'admission-roles.create', 'Create new admission-roles', 'Admin will be able to Create new admission-roles', '2017-10-03 11:26:48', '2017-10-03 11:26:48'),
(75, 'admission-roles.show', 'Show Spacific admission-roles Data', 'Admin will be able to see spacific admission-roles profile', '2017-10-03 11:26:48', '2017-10-03 11:26:48'),
(76, 'admission-roles.edit', 'Edit admission-roles Data', 'Admin will be able to Edit admission-roles Data', '2017-10-03 11:26:48', '2017-10-03 11:26:48'),
(77, 'admission-roles.destroy', 'Delete admission-roles Data', 'Admin will be able to Delete admission-roles Data', '2017-10-03 11:26:48', '2017-10-03 11:26:48'),
(78, 'admission-roles.destroy.all', 'Delete admission-roles Data', 'Admin will be able to Delete admission-roles Data', '2017-10-03 11:26:48', '2017-10-03 11:26:48'),
(79, 'socials.destroy.all', 'Delete socials Data', 'Admin will be able to Delete socials Data', '2017-10-03 11:26:48', '2017-10-03 11:26:48'),
(80, 'services.destroy.all', 'Delete services Data', 'Admin will be able to Delete services Data', '2017-10-03 11:26:48', '2017-10-03 11:26:48'),
(81, 'teachers.destroy.all', 'Delete teachers Data', 'Admin will be able to Delete teachers Data', '2017-10-03 11:26:48', '2017-10-03 11:26:48'),
(82, 'news.destroy.all', 'Delete news Data', 'Admin will be able to Delete news Data', '2017-10-03 11:26:48', '2017-10-03 11:26:48'),
(83, 'laboratories.destroy.all', 'Delete laboratories Data', 'Admin will be able to Delete laboratories Data', '2017-10-03 11:26:48', '2017-10-03 11:26:48'),
(84, 'activities.destroy.all', 'Delete activities Data', 'Admin will be able to Delete activities Data', '2017-10-03 11:26:48', '2017-10-03 11:26:48'),
(85, 'galleries.destroy.all', 'Delete galleries Data', 'Admin will be able to Delete galleries Data', '2017-10-03 11:26:48', '2017-10-03 11:26:48'),
(86, 'sliders.index', 'show sliders table', 'Admin will be able to see all system sliders', '2017-10-03 11:26:48', '2017-10-03 11:26:48'),
(87, 'sliders.create', 'Create new sliders', 'Admin will be able to Create new sliders', '2017-10-03 11:26:48', '2017-10-03 11:26:48'),
(88, 'sliders.show', 'Show Spacific sliders Data', 'Admin will be able to see spacific sliders profile', '2017-10-03 11:26:48', '2017-10-03 11:26:48'),
(89, 'sliders.edit', 'Edit sliders Data', 'Admin will be able to Edit sliders Data', '2017-10-03 11:26:48', '2017-10-03 11:26:48'),
(90, 'sliders.destroy', 'Delete sliders Data', 'Admin will be able to Delete sliders Data', '2017-10-03 11:26:48', '2017-10-03 11:26:48'),
(91, 'Album.create', 'Create new Album', 'Admin will be able to Create new Album', '2017-10-03 11:26:48', '2017-10-03 11:26:48'),
(92, 'Album.show', 'Show Spacific Album Data', 'Admin will be able to see spacific Album profile', '2017-10-03 11:26:48', '2017-10-03 11:26:48'),
(93, 'blogs.index', 'show blogs table', 'Admin will be able to see all system blogs', '2017-10-03 11:26:48', '2017-10-03 11:26:48'),
(94, 'blogs.create', 'Create new blogs', 'Admin will be able to Create new blogs', '2017-10-03 11:26:48', '2017-10-03 11:26:48'),
(95, 'blogs.show', 'Show Spacific blogs Data', 'Admin will be able to see spacific blogs profile', '2017-10-03 11:26:48', '2017-10-03 11:26:48'),
(96, 'blogs.edit', 'Edit blogs Data', 'Admin will be able to Edit blogs Data', '2017-10-03 11:26:48', '2017-10-03 11:26:48'),
(97, 'blogs.destroy', 'Delete blogs Data', 'Admin will be able to Delete blogs Data', '2017-10-03 11:26:48', '2017-10-03 11:26:48'),
(98, 'blogs.destroy.all', 'Delete blogs Data', 'Admin will be able to Delete blogs Data', '2017-10-03 11:26:49', '2017-10-03 11:26:49'),
(99, 'careers.index', 'show careers table', 'Admin will be able to see all system careers', '2017-10-03 11:26:49', '2017-10-03 11:26:49'),
(100, 'careers.create', 'Create new careers', 'Admin will be able to Create new careers', '2017-10-03 11:26:49', '2017-10-03 11:26:49'),
(101, 'careers.show', 'Show Spacific careers Data', 'Admin will be able to see spacific careers profile', '2017-10-03 11:26:49', '2017-10-03 11:26:49'),
(102, 'careers.edit', 'Edit careers Data', 'Admin will be able to Edit careers Data', '2017-10-03 11:26:49', '2017-10-03 11:26:49'),
(103, 'careers.destroy', 'Delete careers Data', 'Admin will be able to Delete careers Data', '2017-10-03 11:26:49', '2017-10-03 11:26:49'),
(104, 'careers.destroy.all', 'Delete careers Data', 'Admin will be able to Delete careers Data', '2017-10-03 11:26:49', '2017-10-03 11:26:49'),
(105, 'contact-us.index', 'show contact-us table', 'Admin will be able to see all system contact-us', '2017-10-03 11:26:49', '2017-10-03 11:26:49'),
(106, 'contact-us.create', 'Create new contact-us', 'Admin will be able to Create new contact-us', '2017-10-03 11:26:49', '2017-10-03 11:26:49'),
(107, 'contact-us.show', 'Show Spacific contact-us Data', 'Admin will be able to see spacific contact-us profile', '2017-10-03 11:26:49', '2017-10-03 11:26:49'),
(108, 'contact-us.edit', 'Edit contact-us Data', 'Admin will be able to Edit contact-us Data', '2017-10-03 11:26:49', '2017-10-03 11:26:49'),
(109, 'contact-us.destroy', 'Delete contact-us Data', 'Admin will be able to Delete contact-us Data', '2017-10-03 11:26:49', '2017-10-03 11:26:49'),
(110, 'contact-us.destroy.all', 'Delete contact-us Data', 'Admin will be able to Delete contact-us Data', '2017-10-03 11:26:49', '2017-10-03 11:26:49'),
(111, 'permission.index', 'show permission table', 'Admin will be able to see all system permission', '2017-10-03 11:26:49', '2017-10-03 11:26:49'),
(112, 'permission.edit', 'Edit permission Data', 'Admin will be able to Edit permission Data', '2017-10-03 11:26:49', '2017-10-03 11:26:49'),
(113, 'permission.destroyRelation', 'Delete permission Data', 'Admin will be able to Delete permission Data', '2017-10-03 11:26:49', '2017-10-03 11:26:49'),
(114, 'role.destroyRelation', 'Delete role Data', 'Admin will be able to Delete role Data', '2017-10-03 11:26:49', '2017-10-03 11:26:49'),
(115, 'admin.about.index', 'show admin table', 'Admin will be able to see all system admin', '2017-10-03 11:26:49', '2017-10-03 11:26:49'),
(116, 'unisharp.lfm.show', 'Show Spacific unisharp Data', 'Admin will be able to see spacific unisharp profile', '2017-10-03 11:26:49', '2017-10-03 11:26:49');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `service-description`
--

CREATE TABLE `service-description` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lang_id` int(10) UNSIGNED NOT NULL,
  `service_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service-description`
--

INSERT INTO `service-description` (`id`, `title`, `description`, `slug`, `meta_title`, `meta_description`, `lang_id`, `service_id`, `created_at`, `updated_at`) VALUES
(1, 'Arabic Title', 'Arabic meta Title', 'Arabic Title', '<p>Arabi asdsadasaf afasfasfasfsaf</p>', 'Arabic meta Description', 1, 1, '2017-10-01 19:49:56', '2017-10-01 19:49:56'),
(2, 'Enligh Title', 'english meta title', 'Enligh Title', '<p>asfsafasf afasf asfa sfasfasfasfasfas</p>', 'english meta desctiption', 2, 1, '2017-10-01 19:49:56', '2017-10-01 19:49:56');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(10) UNSIGNED NOT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home_page_status` enum('0','1') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `icon`, `home_page_status`, `status`, `image_url`, `created_at`, `updated_at`) VALUES
(1, 'asdsada', '1', '1', 'KaxDBg.jpg', '2017-10-01 19:49:56', '2017-10-01 19:49:56');

-- --------------------------------------------------------

--
-- Table structure for table `slider-description`
--

CREATE TABLE `slider-description` (
  `id` int(10) UNSIGNED NOT NULL,
  `title_first` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_second` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `slider_id` int(10) UNSIGNED NOT NULL,
  `lang_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `slider-description`
--

INSERT INTO `slider-description` (`id`, `title_first`, `title_second`, `description`, `slider_id`, `lang_id`, `created_at`, `updated_at`) VALUES
(1, 'Arabic title', 'second title', '<p>arabic description</p>', 1, 1, '2017-10-03 11:49:40', '2017-10-03 11:49:40'),
(2, 'english first title', 'english second title', '<p>english description</p>', 1, 2, '2017-10-03 11:49:40', '2017-10-03 11:49:40');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` int(10) UNSIGNED NOT NULL,
  `slider_url` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slider_image` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `slider_url`, `slider_image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'dasdasd', 'xfIoeD.jpg', '1', '2017-10-03 11:49:40', '2017-10-03 11:49:40');

-- --------------------------------------------------------

--
-- Table structure for table `socials`
--

CREATE TABLE `socials` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `socials`
--

INSERT INTO `socials` (`id`, `name`, `url`, `icon`, `status`, `created_at`, `updated_at`) VALUES
(1, 'facebook', 'ahmed.com', 'asdda', '1', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(10) UNSIGNED NOT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home_page_status` enum('0','1') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `status`, `image_url`, `home_page_status`, `created_at`, `updated_at`) VALUES
(1, '1', 'maWq2C.jpg', '1', '2017-09-27 14:01:27', '2017-09-27 14:01:27');

-- --------------------------------------------------------

--
-- Table structure for table `subject_description`
--

CREATE TABLE `subject_description` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lang_id` int(10) UNSIGNED NOT NULL,
  `subject_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subject_description`
--

INSERT INTO `subject_description` (`id`, `title`, `description`, `slug`, `meta_title`, `meta_description`, `lang_id`, `subject_id`, `created_at`, `updated_at`) VALUES
(1, 'Arabic Title', 'ara', 'Arabic Title', 'Arabic meta Title', 'Arabic meta Description', 1, 1, '2017-09-27 14:01:27', '2017-09-27 14:01:27'),
(2, 'english title', 'ene', 'english title', 'english meta title', 'english meta description', 2, 1, '2017-09-27 14:01:27', '2017-09-27 14:01:27');

-- --------------------------------------------------------

--
-- Table structure for table `supervisors`
--

CREATE TABLE `supervisors` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `lang_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `supervisors`
--

INSERT INTO `supervisors` (`id`, `title`, `description`, `lang_id`, `created_at`, `updated_at`) VALUES
(11, 'aaaaaaaaaaaa', '<p>sssssssssssssssssssss</p>', 1, '2017-10-03 10:55:02', '2017-10-03 10:55:02'),
(12, 'dddddddddddddddd', '<p>ffffffffffffffffffff</p>', 2, '2017-10-03 10:55:02', '2017-10-03 10:55:02');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(10) UNSIGNED NOT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `status`, `image_url`, `subject_id`, `created_at`, `updated_at`) VALUES
(4, '1', 'HgPEC3.jpg', 1, '2017-09-27 14:05:55', '2017-09-27 14:05:55');

-- --------------------------------------------------------

--
-- Table structure for table `teachers_description`
--

CREATE TABLE `teachers_description` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lang_id` int(10) UNSIGNED NOT NULL,
  `teacher_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teachers_description`
--

INSERT INTO `teachers_description` (`id`, `name`, `job_title`, `lang_id`, `teacher_id`, `created_at`, `updated_at`) VALUES
(1, 'ahmed', 'asdas', 1, 4, '2017-09-27 14:05:56', '2017-09-27 14:05:56'),
(2, 'mohamed', 'erert', 2, 4, '2017-09-27 14:05:56', '2017-09-27 14:05:56');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about-description`
--
ALTER TABLE `about-description`
  ADD PRIMARY KEY (`id`),
  ADD KEY `about_description_lang_id_foreign` (`lang_id`),
  ADD KEY `about_description_about_id_foreign` (`about_id`);

--
-- Indexes for table `about-us`
--
ALTER TABLE `about-us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `activities_description`
--
ALTER TABLE `activities_description`
  ADD PRIMARY KEY (`id`),
  ADD KEY `activities_description_lang_id_foreign` (`lang_id`),
  ADD KEY `activities_description_activity_id_foreign` (`activity_id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `admin_role`
--
ALTER TABLE `admin_role`
  ADD PRIMARY KEY (`admin_id`,`role_id`),
  ADD KEY `admin_role_role_id_foreign` (`role_id`);

--
-- Indexes for table `admission_roles`
--
ALTER TABLE `admission_roles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admission_roles_lang_id_foreign` (`lang_id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs_description`
--
ALTER TABLE `blogs_description`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blogs_description_lang_id_foreign` (`lang_id`),
  ADD KEY `blogs_description_blog_id_foreign` (`blog_id`);

--
-- Indexes for table `careers`
--
ALTER TABLE `careers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `career_descriptions`
--
ALTER TABLE `career_descriptions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `career_descriptions_lang_id_foreign` (`lang_id`),
  ADD KEY `career_descriptions_career_id_foreign` (`career_id`);

--
-- Indexes for table `contact-emails`
--
ALTER TABLE `contact-emails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `education_levels`
--
ALTER TABLE `education_levels`
  ADD PRIMARY KEY (`id`),
  ADD KEY `education_levels_lang_id_foreign` (`lang_id`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `faqs_lang_id_foreign` (`lang_id`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery-description`
--
ALTER TABLE `gallery-description`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gallery_description_lang_id_foreign` (`lang_id`),
  ADD KEY `gallery_description_gallery_id_foreign` (`gallery_id`);

--
-- Indexes for table `general-setting`
--
ALTER TABLE `general-setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laboratories`
--
ALTER TABLE `laboratories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laboratory_description`
--
ALTER TABLE `laboratory_description`
  ADD PRIMARY KEY (`id`),
  ADD KEY `laboratory_description_lang_id_foreign` (`lang_id`),
  ADD KEY `laboratory_description_laboratory_id_foreign` (`laboratory_id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD KEY `media_gallery_id_foreign` (`gallery_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news_description`
--
ALTER TABLE `news_description`
  ADD PRIMARY KEY (`id`),
  ADD KEY `news_description_lang_id_foreign` (`lang_id`),
  ADD KEY `news_description_new_id_foreign` (`new_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `service-description`
--
ALTER TABLE `service-description`
  ADD PRIMARY KEY (`id`),
  ADD KEY `service_description_lang_id_foreign` (`lang_id`),
  ADD KEY `service_description_service_id_foreign` (`service_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider-description`
--
ALTER TABLE `slider-description`
  ADD PRIMARY KEY (`id`),
  ADD KEY `slider_description_slider_id_foreign` (`slider_id`),
  ADD KEY `slider_description_lang_id_foreign` (`lang_id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `socials`
--
ALTER TABLE `socials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject_description`
--
ALTER TABLE `subject_description`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subject_description_lang_id_foreign` (`lang_id`),
  ADD KEY `subject_description_subject_id_foreign` (`subject_id`);

--
-- Indexes for table `supervisors`
--
ALTER TABLE `supervisors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `supervisors_lang_id_foreign` (`lang_id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teachers_subject_id_index` (`subject_id`);

--
-- Indexes for table `teachers_description`
--
ALTER TABLE `teachers_description`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teachers_description_lang_id_foreign` (`lang_id`),
  ADD KEY `teachers_description_teacher_id_foreign` (`teacher_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about-description`
--
ALTER TABLE `about-description`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `about-us`
--
ALTER TABLE `about-us`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `activities_description`
--
ALTER TABLE `activities_description`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `admission_roles`
--
ALTER TABLE `admission_roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `blogs_description`
--
ALTER TABLE `blogs_description`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `careers`
--
ALTER TABLE `careers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `career_descriptions`
--
ALTER TABLE `career_descriptions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `contact-emails`
--
ALTER TABLE `contact-emails`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `education_levels`
--
ALTER TABLE `education_levels`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `gallery-description`
--
ALTER TABLE `gallery-description`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `general-setting`
--
ALTER TABLE `general-setting`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `laboratories`
--
ALTER TABLE `laboratories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `laboratory_description`
--
ALTER TABLE `laboratory_description`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `news_description`
--
ALTER TABLE `news_description`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `service-description`
--
ALTER TABLE `service-description`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `slider-description`
--
ALTER TABLE `slider-description`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `socials`
--
ALTER TABLE `socials`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `subject_description`
--
ALTER TABLE `subject_description`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `supervisors`
--
ALTER TABLE `supervisors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `teachers_description`
--
ALTER TABLE `teachers_description`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `about-description`
--
ALTER TABLE `about-description`
  ADD CONSTRAINT `about_description_about_id_foreign` FOREIGN KEY (`about_id`) REFERENCES `about-us` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `about_description_lang_id_foreign` FOREIGN KEY (`lang_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `activities_description`
--
ALTER TABLE `activities_description`
  ADD CONSTRAINT `activities_description_activity_id_foreign` FOREIGN KEY (`activity_id`) REFERENCES `activities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `activities_description_lang_id_foreign` FOREIGN KEY (`lang_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `admin_role`
--
ALTER TABLE `admin_role`
  ADD CONSTRAINT `admin_role_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `admin_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `admission_roles`
--
ALTER TABLE `admission_roles`
  ADD CONSTRAINT `admission_roles_lang_id_foreign` FOREIGN KEY (`lang_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `blogs_description`
--
ALTER TABLE `blogs_description`
  ADD CONSTRAINT `blogs_description_blog_id_foreign` FOREIGN KEY (`blog_id`) REFERENCES `blogs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `blogs_description_lang_id_foreign` FOREIGN KEY (`lang_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `career_descriptions`
--
ALTER TABLE `career_descriptions`
  ADD CONSTRAINT `career_descriptions_career_id_foreign` FOREIGN KEY (`career_id`) REFERENCES `careers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `career_descriptions_lang_id_foreign` FOREIGN KEY (`lang_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `education_levels`
--
ALTER TABLE `education_levels`
  ADD CONSTRAINT `education_levels_lang_id_foreign` FOREIGN KEY (`lang_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `faqs`
--
ALTER TABLE `faqs`
  ADD CONSTRAINT `faqs_lang_id_foreign` FOREIGN KEY (`lang_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `gallery-description`
--
ALTER TABLE `gallery-description`
  ADD CONSTRAINT `gallery_description_gallery_id_foreign` FOREIGN KEY (`gallery_id`) REFERENCES `galleries` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `gallery_description_lang_id_foreign` FOREIGN KEY (`lang_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `laboratory_description`
--
ALTER TABLE `laboratory_description`
  ADD CONSTRAINT `laboratory_description_laboratory_id_foreign` FOREIGN KEY (`laboratory_id`) REFERENCES `laboratories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `laboratory_description_lang_id_foreign` FOREIGN KEY (`lang_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `media`
--
ALTER TABLE `media`
  ADD CONSTRAINT `media_gallery_id_foreign` FOREIGN KEY (`gallery_id`) REFERENCES `galleries` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `news_description`
--
ALTER TABLE `news_description`
  ADD CONSTRAINT `news_description_lang_id_foreign` FOREIGN KEY (`lang_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `news_description_new_id_foreign` FOREIGN KEY (`new_id`) REFERENCES `news` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `service-description`
--
ALTER TABLE `service-description`
  ADD CONSTRAINT `service_description_lang_id_foreign` FOREIGN KEY (`lang_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `service_description_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `slider-description`
--
ALTER TABLE `slider-description`
  ADD CONSTRAINT `slider_description_lang_id_foreign` FOREIGN KEY (`lang_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `slider_description_slider_id_foreign` FOREIGN KEY (`slider_id`) REFERENCES `sliders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subject_description`
--
ALTER TABLE `subject_description`
  ADD CONSTRAINT `subject_description_lang_id_foreign` FOREIGN KEY (`lang_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `subject_description_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `supervisors`
--
ALTER TABLE `supervisors`
  ADD CONSTRAINT `supervisors_lang_id_foreign` FOREIGN KEY (`lang_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `teachers_description`
--
ALTER TABLE `teachers_description`
  ADD CONSTRAINT `teachers_description_lang_id_foreign` FOREIGN KEY (`lang_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `teachers_description_teacher_id_foreign` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
