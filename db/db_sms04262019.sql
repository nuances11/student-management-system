-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2019 at 07:08 PM
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
(1, 'Grade 1', '2019-03-09 23:31:16', '2019-03-09 23:48:48'),
(2, 'Grade 2', '2019-04-18 21:04:47', '2019-04-18 21:04:47'),
(3, 'Grade 3', '2019-04-18 21:04:56', '2019-04-18 21:04:56'),
(4, 'Grade 4', '2019-04-18 21:05:03', '2019-04-18 21:05:03'),
(5, 'Grade 5', '2019-04-18 21:13:27', '2019-04-18 21:13:27'),
(6, 'Grade 6', '2019-04-18 21:13:37', '2019-04-18 21:13:37');

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
(20, '2019_03_31_150806_create_student_classes_table', 16),
(21, '2019_04_06_172902_create_teacher_classes_table', 17),
(22, '2019_04_07_144106_create_student_grades_table', 18),
(23, '2019_04_09_122734_change_column_types_on_student_grades_table', 19),
(24, '2019_04_09_124831_change_decimal_types_on_student_grades_table', 20),
(25, '2019_04_09_125050_change_nullable_types_on_student_grades_table', 21),
(26, '2019_04_09_125612_update_types_on_student_grades_table', 22),
(27, '2019_04_19_070539_add_grade_id_to_student_grades_table', 23),
(28, '2019_04_20_173042_add_column_to_user_details_table', 24),
(29, '2019_04_22_165149_add_additional_details_to_student_table', 25),
(30, '2019_04_22_171756_add_is_aeta_column_to_student_table', 26);

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
(1, 1, 1, 1, 1, 2, 0, 0, '2019-04-06 08:18:08', '2019-04-06 08:18:08'),
(2, 1, 1, 1, 1, 2, 1, 0, '2019-04-06 08:18:08', '2019-04-06 08:18:08'),
(3, 1, 1, 1, 1, 2, 2, 0, '2019-04-06 08:18:08', '2019-04-06 08:18:08'),
(4, 1, 1, 1, 1, 2, 0, 1, '2019-04-06 08:18:52', '2019-04-06 08:18:52'),
(5, 1, 1, 1, 1, 2, 1, 1, '2019-04-06 08:18:52', '2019-04-06 08:18:52'),
(6, 1, 1, 1, 1, 2, 2, 1, '2019-04-06 08:18:52', '2019-04-06 08:18:52'),
(7, 1, 2, 2, 3, 2, 0, 0, '2019-04-19 06:14:56', '2019-04-19 06:14:56'),
(8, 1, 2, 2, 3, 2, 1, 1, '2019-04-23 08:46:55', '2019-04-23 08:46:55'),
(9, 1, 2, 2, 3, 2, 3, 1, '2019-04-23 08:46:55', '2019-04-23 08:46:55'),
(10, 1, 2, 2, 3, 2, 3, 2, '2019-04-23 08:47:15', '2019-04-23 08:47:15');

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
(1, 'Sample Section1', '1', '2019-03-13 08:10:05', '2019-03-13 08:31:24'),
(2, 'Sample Section 2', '2', '2019-04-19 00:39:35', '2019-04-19 00:39:35');

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
  `parent_father_age` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `parent_father_occupation` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `parent_mother` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_mother_age` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `siblings` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `siblings_age` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `siblings_details` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `goals` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `has_card` int(11) NOT NULL DEFAULT '0',
  `has_bc` int(11) NOT NULL DEFAULT '0',
  `has_others` int(11) NOT NULL DEFAULT '0',
  `parent_mother_occupation` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `is_aeta` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `lrn`, `lname`, `fname`, `mname`, `gender`, `dob`, `mother_tounge`, `ethnic_group`, `religion`, `address_street`, `address_barangay`, `address_municipality`, `address_province`, `parent_father`, `parent_father_age`, `parent_father_occupation`, `parent_mother`, `parent_mother_age`, `siblings`, `siblings_age`, `siblings_details`, `goals`, `has_card`, `has_bc`, `has_others`, `parent_mother_occupation`, `status`, `is_aeta`, `created_at`, `updated_at`) VALUES
(1, '123456789123', 'Last Name', 'First Name', 'Middle Name', 'm', '1992-10-11', 'Sample Mother Toung', 'Sample Ethnic Group', 'Catholic', 'Sample Street', 'Sample Barangay', 'Sample Municipality', 'Sample Province', 'Sample Father', '', '', 'Sample Mother', '', '', '', '', '', 0, 0, 0, '', '', 0, '2019-03-25 06:51:18', '2019-03-26 05:01:34'),
(2, '123456789125', 'Hansel', 'Grettel', 'Huntsman', 'f', '1992-10-12', 'Tounge', 'asdasdasd', 'dasdasdas', 'dasdas', 'dasdas', 'sdasdasds', 'dasda', 'dasdasdasda', '', '', 'dasdasdas', '', '', '', '', '', 0, 0, 0, '', '', 0, '2019-04-23 06:54:50', '2019-04-23 06:54:50'),
(3, '123456789122', 'Cena', 'John', 'Austine', 'f', '1992-10-11', 'My Tounge', 'Ethnic', 'Religion', 'dasdasdasda', 'sdasdasdas', 'dasdasdas', 'dasdasdasdas', 'dasdasd', '12', 'asdadasd', 'sadasdasdasd', '14', 'a:2:{i:0;s:13:\"dasdasdasdasd\";i:1;s:11:\"adasdasdasd\";}', 'a:2:{i:0;s:2:\"12\";i:1;s:2:\"15\";}', 'a:2:{i:0;s:11:\"dasasdasdas\";i:1;s:12:\"dsadasdasdas\";}', 'dasasdasdasdasdasd', 0, 0, 0, 'sdasdasdas', 'old', 0, '2019-04-23 07:03:23', '2019-04-23 07:03:23'),
(4, '123456789128', 'Cena', 'John', 'Middle', 'm', '1992-10-11', 'asdasdas', 'dasdas', 'dasdasdas', 'dasdas', 'dasdas', 'dasdasdas', 'dasdas', 'dasdasd', '12', 'dsadasdasd', 'dasdasdasd', '34', 'a:2:{i:0;s:9:\"dasdasdsa\";i:1;s:7:\"dasdasd\";}', 'a:2:{i:0;s:2:\"13\";i:1;s:2:\"12\";}', 'a:2:{i:0;s:5:\"sdasd\";i:1;s:7:\"dsadasd\";}', 'asdasdasdasdasd', 1, 1, 1, 'adasdasd', 'new', 1, '2019-04-23 07:12:11', '2019-04-23 08:27:15');

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
(2, 1, 1, 1, 1, NULL, NULL),
(9, 1, 1, 2, 2, '2019-04-19 03:02:27', '2019-04-19 03:02:27');

-- --------------------------------------------------------

--
-- Table structure for table `student_grades`
--

CREATE TABLE `student_grades` (
  `id` int(10) UNSIGNED NOT NULL,
  `school_year_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `grade_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `first_period` decimal(5,2) DEFAULT NULL,
  `second_period` decimal(5,2) DEFAULT NULL,
  `third_period` decimal(5,2) DEFAULT NULL,
  `fourth_period` decimal(5,2) DEFAULT NULL,
  `final_rating` decimal(5,2) DEFAULT NULL,
  `remarks` int(11) DEFAULT NULL,
  `eligibility` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_grades`
--

INSERT INTO `student_grades` (`id`, `school_year_id`, `subject_id`, `grade_id`, `section_id`, `user_id`, `student_id`, `first_period`, `second_period`, `third_period`, `fourth_period`, `final_rating`, `remarks`, `eligibility`, `created_at`, `updated_at`) VALUES
(9, 1, 1, 1, 1, 2, 1, '90.00', '90.00', '70.00', '75.00', '81.25', NULL, 0, '2019-04-09 05:29:35', '2019-04-09 05:42:06'),
(12, 1, 3, 2, 2, 2, 1, '90.00', '99.00', '78.00', '90.00', '89.25', NULL, 0, '2019-04-19 07:59:31', '2019-04-19 07:59:46');

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
(2, 'Sample Subject sasas', 1, '2019-03-13 16:09:30', '2019-03-13 16:31:18'),
(3, 'Subject Grade 2', 2, '2019-04-19 05:47:16', '2019-04-19 05:47:16');

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
(1, 1, 1, 1, 2, '2019-04-06 08:17:36', '2019-04-06 08:17:36'),
(2, 1, 3, 2, 2, '2019-04-19 05:47:26', '2019-04-19 05:47:26');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_classes`
--

CREATE TABLE `teacher_classes` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, 'Admin', 'admin@admin.com', NULL, '$2y$10$ARK.T43Rc4yQ12Ip/prdjOFAX/QHiWJPKaOxKmHkhpj1FO/391zce', 'orvHpCMM9p1cAbhOpmsBaZK12fK9UpGgL4mEYXafe8ousvXUZWf4XB8Tzduv', '2019-04-03 06:09:52', '2019-04-03 06:09:52'),
(2, 'Sample Teacher', 'teacher@sample.com', NULL, '$2y$10$4Zy6HLGtfZIc0OralyuetuWL7yCNO3dHqV4K9GUkNMEQHcXsUh3sq', 'D50CZx7EUgiiOC9SccaTIkmk3c0scSq31AQSHH4FxBkKvc8XWMDlp2Doi7wC', '2019-04-03 07:10:49', '2019-04-03 07:10:49'),
(3, 'Sample Teacher Second', 'sampleteacher@gmail.com', NULL, '$2y$10$VQrXXtEgCRtM5IQfSOC5zujfbigD4ZXKZx0kVoy.Ii5F4PNN3L45e', NULL, '2019-04-20 09:40:00', '2019-04-20 09:40:00'),
(4, 'dasdasdas', 'samplename@sample.com', NULL, '$2y$10$vv36Oq1MAGQ5xHwIDrRXY.yHG2.d6bw.Auj5FXjlxzbZesGy/1ikW', NULL, '2019-04-20 09:43:24', '2019-04-20 09:43:24');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_groups_id` int(11) NOT NULL,
  `course` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `major` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
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

INSERT INTO `user_details` (`id`, `user_id`, `user_groups_id`, `course`, `major`, `gender`, `address`, `dob`, `image`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '', '', 'm', 'n/a', '1970-1-1', '', NULL, NULL),
(2, 2, 3, '', '', 'Female', 'Sample Address', '1992-10-11', '1555783828.png', '2019-04-03 07:10:49', '2019-04-20 10:10:28'),
(3, 3, 3, 'Sample Course', 'Sample Major', 'Male', 'Sample Address', '1992-10-11', '', '2019-04-20 09:40:00', '2019-04-20 09:42:32'),
(4, 4, 3, 'asdsa', 'dasdasd', 'Male', 'dasdasdasd', '1992-10-12', '', '2019-04-20 09:43:24', '2019-04-20 09:43:24');

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
(1, 'Super Admin', 'superadmin', NULL, NULL),
(2, 'Admin', 'admin', NULL, NULL),
(3, 'Teacher', 'teacher', NULL, NULL),
(4, 'Registrar', 'registrar', NULL, NULL);

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
-- Indexes for table `student_grades`
--
ALTER TABLE `student_grades`
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
-- Indexes for table `teacher_classes`
--
ALTER TABLE `teacher_classes`
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `hours`
--
ALTER TABLE `hours`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `schoolyears`
--
ALTER TABLE `schoolyears`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `student_classes`
--
ALTER TABLE `student_classes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `student_grades`
--
ALTER TABLE `student_grades`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `subject_assignments`
--
ALTER TABLE `subject_assignments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `teacher_classes`
--
ALTER TABLE `teacher_classes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_groups`
--
ALTER TABLE `user_groups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_groups_relation`
--
ALTER TABLE `user_groups_relation`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
