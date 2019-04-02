-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 02, 2019 at 05:57 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.1.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sms`
--

-- --------------------------------------------------------

--
-- Table structure for table `days`
--

CREATE TABLE `days` (
  `id` int(10) UNSIGNED NOT NULL,
  `day_id` int(11) NOT NULL,
  `day` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `days`
--

INSERT INTO `days` (`id`, `day_id`, `day`, `created_at`, `updated_at`) VALUES
(1, 0, 'Monday', NULL, NULL),
(2, 1, 'Tuesday', NULL, NULL),
(3, 2, 'Wednesday', NULL, NULL),
(4, 3, 'Thursday', NULL, NULL),
(5, 4, 'Friday', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE `grades` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `grades`
--

INSERT INTO `grades` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Grade 1', '2019-03-09 23:31:16', '2019-03-09 23:48:48');

-- --------------------------------------------------------

--
-- Table structure for table `hours`
--

CREATE TABLE `hours` (
  `id` int(10) UNSIGNED NOT NULL,
  `hour_id` int(11) NOT NULL,
  `hour` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hours`
--

INSERT INTO `hours` (`id`, `hour_id`, `hour`, `created_at`, `updated_at`) VALUES
(1, 0, '8:00AM - 9:00AM', NULL, NULL),
(2, 1, '9:00AM - 10:00AM', NULL, NULL),
(3, 2, '10:00AM - 11:00AM', NULL, NULL),
(4, 3, '11:00AM - 12:00NN', NULL, NULL),
(5, 4, '1:00PM - 2:00PM', NULL, NULL),
(6, 5, '2:00PM - 3:00PM', NULL, NULL),
(7, 6, '3:00PM - 4:00PM', NULL, NULL),
(8, 7, '4:00PM - 5:00PM', NULL, NULL);

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
(3, '2019_03_02_130333_create_user_groups_table', 1),
(4, '2019_03_02_130834_create_user_groups_relation_table', 1),
(5, '2019_03_03_035029_create_user_groups_table', 2),
(6, '2019_03_03_123555_create_user_details_table', 3),
(7, '2019_03_03_145514_add_user_groups_id_on_user_details_table', 4),
(8, '2019_03_10_064630_create_subjects_table', 5),
(9, '2019_03_10_065006_create_grades_table', 6),
(10, '2019_03_10_145203_create_schoolyears_table', 7),
(11, '2019_03_13_152150_create_sections_table', 8),
(12, '2019_03_13_165744_add_grade_id_to_subjects_table', 9),
(13, '2019_03_15_143448_create_subject_assignments_table', 10),
(14, '2019_03_16_115848_create_schedules_table', 11),
(15, '2019_03_24_091410_create_students_table', 12),
(16, '2019_03_24_134128_change_sex_column_to_gender_on_studens_table', 13),
(17, '2019_03_25_131055_change_mother_tounge_column_spelling_on_students_table', 14),
(18, '2019_03_26_140304_create_days_table', 15),
(19, '2019_03_26_140346_create_hours_table', 15),
(20, '2019_03_31_150806_create_student_classes_table', 16);

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
-- Table structure for table `schedules`
--

CREATE TABLE `schedules` (
  `id` int(10) UNSIGNED NOT NULL,
  `school_year_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `grade_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `day_id` int(11) NOT NULL,
  `time_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `schedules`
--

INSERT INTO `schedules` (`id`, `school_year_id`, `section_id`, `grade_id`, `subject_id`, `user_id`, `day_id`, `time_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 1, 2, 0, 0, '2019-03-23 06:59:43', '2019-03-23 06:59:43'),
(2, 1, 1, 1, 1, 2, 0, 1, '2019-03-23 07:15:06', '2019-03-23 07:15:06');

-- --------------------------------------------------------

--
-- Table structure for table `schoolyears`
--

CREATE TABLE `schoolyears` (
  `id` int(10) UNSIGNED NOT NULL,
  `year` int(11) NOT NULL,
  `is_active` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `schoolyears`
--

INSERT INTO `schoolyears` (`id`, `year`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 2018, 1, '2019-03-11 07:36:36', '2019-03-16 02:24:47'),
(2, 2019, 0, '2019-03-11 08:04:01', '2019-03-16 02:24:47');

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` int(10) UNSIGNED NOT NULL,
  `section` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `grade_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `section`, `grade_id`, `created_at`, `updated_at`) VALUES
(1, 'Sample Section1', '1', '2019-03-13 08:10:05', '2019-03-13 08:31:24');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(10) UNSIGNED NOT NULL,
  `lrn` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mother_tounge` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ethnic_group` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `religion` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_street` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_barangay` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_municipality` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_province` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_father` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_mother` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `lrn`, `lname`, `fname`, `mname`, `gender`, `dob`, `mother_tounge`, `ethnic_group`, `religion`, `address_street`, `address_barangay`, `address_municipality`, `address_province`, `parent_father`, `parent_mother`, `created_at`, `updated_at`) VALUES
(1, '123456789123', 'Last Name', 'First Name', 'Middle Name', 'm', '1992-10-11', 'Sample Mother Toung', 'Sample Ethnic Group', 'Catholic', 'Sample Street', 'Sample Barangay', 'Sample Municipality', 'Sample Province', 'Sample Father', 'Sample Mother', '2019-03-25 06:51:18', '2019-03-26 05:01:34');

-- --------------------------------------------------------

--
-- Table structure for table `student_classes`
--

CREATE TABLE `student_classes` (
  `id` int(10) UNSIGNED NOT NULL,
  `school_year_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `grade_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_classes`
--

INSERT INTO `student_classes` (`id`, `school_year_id`, `student_id`, `grade_id`, `section_id`, `created_at`, `updated_at`) VALUES
(2, 1, 1, 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `grade_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `name`, `grade_id`, `created_at`, `updated_at`) VALUES
(1, 'Sample Subject', 1, '2019-03-10 00:45:32', '2019-03-10 01:00:33'),
(2, 'Sample Subject sasas', 1, '2019-03-13 16:09:30', '2019-03-13 16:31:18');

-- --------------------------------------------------------

--
-- Table structure for table `subject_assignments`
--

CREATE TABLE `subject_assignments` (
  `id` int(10) UNSIGNED NOT NULL,
  `school_year_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `grade_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subject_assignments`
--

INSERT INTO `subject_assignments` (`id`, `school_year_id`, `subject_id`, `grade_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 1, 2, '2019-03-15 08:35:33', '2019-03-15 08:35:33'),
(2, 1, 1, 0, 2, '2019-03-15 08:39:26', '2019-03-15 08:39:26');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'admin@admin.com', NULL, '$2y$10$qSzRw3hVXlZrvN3K3IKjI.pq90XHY/fG0LWG5Xt21WdZOE3g6boMC', NULL, '2019-03-02 07:04:01', '2019-03-02 07:04:01'),
(2, 'Susan Wisoky Test', 'grady.alayna@example.net', '2019-03-02 18:34:31', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'VBXHbthEF9', '2019-03-02 18:34:31', '2019-03-04 16:58:31'),
(3, 'Mr. Herbert Balistreri MD', 'zthiel@example.net', '2019-03-02 18:34:31', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', '7wVu0AiUQF', '2019-03-02 18:34:31', '2019-03-02 18:34:31'),
(4, 'Prof. Susan Lowe I', 'cronin.ana@example.net', '2019-03-02 18:34:31', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'AJuIWL72XR', '2019-03-02 18:34:31', '2019-03-02 18:34:31'),
(5, 'Ali Daniel', 'botsford.jayson@example.org', '2019-03-02 18:34:31', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'J23fW1OgAj', '2019-03-02 18:34:31', '2019-03-02 18:34:31'),
(6, 'Gerson Bergnaum', 'jody99@example.org', '2019-03-02 18:34:31', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'FOgLNFVtTA', '2019-03-02 18:34:31', '2019-03-02 18:34:31'),
(7, 'Shanon Connelly', 'rmcdermott@example.com', '2019-03-02 18:34:31', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'z8Yw4WgCNI', '2019-03-02 18:34:31', '2019-03-02 18:34:31'),
(8, 'Isabella Davis', 'johanna16@example.com', '2019-03-02 18:34:31', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', '2UkIptfSAJ', '2019-03-02 18:34:31', '2019-03-02 18:34:31'),
(9, 'Miss Della Skiles DVM', 'graham.wade@example.org', '2019-03-02 18:34:31', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'c1ULLf1PkH', '2019-03-02 18:34:31', '2019-03-02 18:34:31'),
(10, 'Hardy Murray', 'oral73@example.net', '2019-03-02 18:34:31', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'JIaVRztufH', '2019-03-02 18:34:31', '2019-03-02 18:34:31'),
(11, 'Dr. Narciso West', 'swift.rachelle@example.com', '2019-03-02 18:34:31', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'Y0ToeHkjO3', '2019-03-02 18:34:31', '2019-03-02 18:34:31'),
(12, 'Marcellus Zemlak DDS', 'eugene87@example.com', '2019-03-02 18:34:31', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'bCYFwD5nbC', '2019-03-02 18:34:31', '2019-03-02 18:34:31'),
(13, 'Vernice Reichel', 'elyse98@example.net', '2019-03-02 18:34:31', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'jxsNkyIb4o', '2019-03-02 18:34:31', '2019-03-02 18:34:31'),
(14, 'Katheryn Smitham', 'alford.beahan@example.com', '2019-03-02 18:34:31', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'ldfnSAlqfG', '2019-03-02 18:34:31', '2019-03-02 18:34:31'),
(15, 'Kris McGlynn', 'roberts.alice@example.org', '2019-03-02 18:34:31', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'AAWw26Lz2t', '2019-03-02 18:34:31', '2019-03-02 18:34:31'),
(16, 'Anahi Osinski', 'yesenia.wehner@example.net', '2019-03-02 18:34:31', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', '2bprM6ruHX', '2019-03-02 18:34:31', '2019-03-02 18:34:31'),
(17, 'Luther Rippin', 'kulas.richmond@example.org', '2019-03-02 18:34:31', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'zTUqhbNniJ', '2019-03-02 18:34:31', '2019-03-02 18:34:31'),
(18, 'Wendy Zulauf IV', 'tdicki@example.org', '2019-03-02 18:34:31', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'VzvoiLw2kJ', '2019-03-02 18:34:31', '2019-03-02 18:34:31'),
(19, 'Dr. Adriana Kunde', 'kemmerich@example.org', '2019-03-02 18:34:31', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'CDPKXTzUC4', '2019-03-02 18:34:31', '2019-03-02 18:34:31'),
(20, 'Velva Hintz', 'dorian36@example.net', '2019-03-02 18:34:31', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', '8oiNArayMP', '2019-03-02 18:34:31', '2019-03-02 18:34:31'),
(21, 'Dr. Emilia Rosenbaum', 'kassandra91@example.com', '2019-03-02 18:34:31', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'mcOwpuA5fE', '2019-03-02 18:34:31', '2019-03-02 18:34:31'),
(22, 'Sample asas', 'sample@sampleone.com', NULL, '$2y$10$P53sLTKjKf2ppLsR5WgMIe6i6EL80pt8fuuub091BvuSU46lj1mFq', NULL, '2019-03-03 07:24:27', '2019-03-03 07:24:27'),
(23, 'Sample Teacher', 'teacher@sample.com', NULL, '$2y$10$y/yyeXNfkhq3aZVIIk80CONqRZBRU9SrHZgEr4p1O52iONxzVVHjy', NULL, '2019-03-03 07:29:02', '2019-03-03 07:29:02');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_groups_id` int(11) NOT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`id`, `user_id`, `user_groups_id`, `gender`, `address`, `dob`, `image`, `created_at`, `updated_at`) VALUES
(1, 2, 5, 'Female', 'Sample Address Sample', '1992-10-12', '1553610582.png', NULL, '2019-03-26 06:29:42'),
(2, 23, 5, 'Male', 'Sample Teacher', '1992-10-11', '', '2019-03-03 07:29:02', '2019-03-03 07:29:02');

-- --------------------------------------------------------

--
-- Table structure for table `user_groups`
--

CREATE TABLE `user_groups` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_groups`
--

INSERT INTO `user_groups` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(4, 'Admin', 'admin', '2019-03-03 06:13:16', '2019-03-03 06:13:16'),
(5, 'Teacher', 'teacher', '2019-03-03 06:13:34', '2019-03-03 06:13:34'),
(6, 'Registrar', 'registrar', '2019-03-03 06:13:46', '2019-03-03 06:13:46');

-- --------------------------------------------------------

--
-- Table structure for table `user_groups_relation`
--

CREATE TABLE `user_groups_relation` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_groups_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `days`
--
ALTER TABLE `days`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hours`
--
ALTER TABLE `hours`
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
-- Indexes for table `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schoolyears`
--
ALTER TABLE `schoolyears`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_classes`
--
ALTER TABLE `student_classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject_assignments`
--
ALTER TABLE `subject_assignments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_groups`
--
ALTER TABLE `user_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_groups_relation`
--
ALTER TABLE `user_groups_relation`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `days`
--
ALTER TABLE `days`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `grades`
--
ALTER TABLE `grades`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hours`
--
ALTER TABLE `hours`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `schoolyears`
--
ALTER TABLE `schoolyears`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `student_classes`
--
ALTER TABLE `student_classes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `subject_assignments`
--
ALTER TABLE `subject_assignments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_groups`
--
ALTER TABLE `user_groups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_groups_relation`
--
ALTER TABLE `user_groups_relation`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
