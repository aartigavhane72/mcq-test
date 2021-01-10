-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 09, 2021 at 10:43 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mcq_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `login_msg` text COLLATE utf8mb4_unicode_ci,
  `Question_Bank_DB` text COLLATE utf8mb4_unicode_ci,
  `image` longblob,
  `balance` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `student_fee` int(4) DEFAULT NULL,
  `total_number_of_student` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_number_of_exam` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `institution_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `payment` tinyint(1) DEFAULT NULL,
  `amount` smallint(6) NOT NULL DEFAULT '0',
  `payment_date` date DEFAULT NULL,
  `validity` date DEFAULT NULL,
  `payment_request_id` text COLLATE utf8mb4_unicode_ci,
  `student_limit` int(11) NOT NULL DEFAULT '15',
  `exam_limit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `login_msg`, `Question_Bank_DB`, `image`, `balance`, `student_fee`, `total_number_of_student`, `total_number_of_exam`, `institution_name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `payment`, `amount`, `payment_date`, `validity`, `payment_request_id`, `student_limit`, `exam_limit`) VALUES
(3, 'Admin', ' Contact @ 8858366251 for cash payment', 'db_eccbc87e4b5ce2fe28308fd9f2a7baf3', NULL, '500', 100, '50', '0', 'All Exam Corner', 'adcd@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'g0bouvAng8P5RnzESi02sIdhBhdLhInOtiRmaAOgRtUkIY5aOWogRh76tgr2', '2018-01-20 23:50:39', '2018-02-18 14:38:29', NULL, 0, NULL, NULL, NULL, 15, 0),
(25, 'Aarti', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'aarti@test.com', '$2y$10$tEt/.BTlQeKdLcqdwPt6ueKdpyaiGzZyt6iRmzbwwTT6uvL7OyXoq', '8rkCyJmM0J8KOJSeSIAuJ0DPb3orli7xyQceCXxuLDNQX9XpRKNAFBBMtgtA', '2021-01-09 00:30:54', '2021-01-09 00:30:54', NULL, 0, NULL, '2021-01-24', NULL, 15, 5);

-- --------------------------------------------------------

--
-- Table structure for table `assign`
--

CREATE TABLE `assign` (
  `post` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(10) UNSIGNED NOT NULL,
  `category` varchar(100) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `admin_email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category`, `admin_id`, `admin_email`) VALUES
(1, 'History', 2, ''),
(2, 'Entertainment: Video Games', 2, ''),
(3, 'Science: Gadgets', 2, ''),
(5, 'Geography', 2, ''),
(7, 'Science & Nature', 2, ''),
(9, 'Entertainment: Television', 2, ''),
(11, 'Entertainment: Film', 2, ''),
(13, 'General Knowledge', 2, '');

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE `exam` (
  `examcode` int(10) UNSIGNED NOT NULL,
  `examtitle` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `publish` text COLLATE utf8mb4_unicode_ci,
  `tname` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `random` tinyint(1) NOT NULL DEFAULT '1',
  `examtime` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`examcode`, `examtitle`, `publish`, `tname`, `category`, `random`, `examtime`, `admin_id`, `admin_email`, `created_at`, `updated_at`) VALUES
(1, 'test', 'test', 'test', 'test', 1, '1', '', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `exam_question`
--

CREATE TABLE `exam_question` (
  `id` int(10) UNSIGNED NOT NULL,
  `owner_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `examcode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `question` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `option_A` text COLLATE utf8mb4_unicode_ci,
  `option_B` text COLLATE utf8mb4_unicode_ci,
  `option_C` text COLLATE utf8mb4_unicode_ci,
  `option_D` text COLLATE utf8mb4_unicode_ci,
  `marks` double(8,2) NOT NULL,
  `correct_option` text COLLATE utf8mb4_unicode_ci,
  `correct_answer` text COLLATE utf8mb4_unicode_ci,
  `level` text COLLATE utf8mb4_unicode_ci,
  `solution` text COLLATE utf8mb4_unicode_ci,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `subject` int(1) DEFAULT '1',
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'multiple'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exam_question`
--

INSERT INTO `exam_question` (`id`, `owner_id`, `examcode`, `category`, `question`, `option_A`, `option_B`, `option_C`, `option_D`, `marks`, `correct_option`, `correct_answer`, `level`, `solution`, `remember_token`, `created_at`, `updated_at`, `subject`, `type`) VALUES
(1, '25', '1', 'History', 'King Henry VIII was the second monarch of which European royal house?', 'Tudor', 'York', 'Stuart', 'Lancaster', 1.00, 'A', NULL, 'easy', NULL, NULL, '2021-01-09 01:06:38', '2021-01-09 01:06:38', 1, 'multiple'),
(2, '25', '1', 'Entertainment: Video Games', 'In Overwatch, what is the hero McCrees full name?', 'Jack McCree Morrison', 'Jesse McCree', 'Gabriel Reyes', 'Jamison Deadeye  Fawkes', 1.00, 'B', NULL, 'medium', NULL, NULL, '2021-01-08 19:41:38', '2021-01-08 19:41:38', 1, 'multiple'),
(4, '25', '1', 'Science: Gadgets', 'The Western Electric Model 500 telephone uses tone dialing to dial phone numbers.', 'False', 'True', NULL, NULL, 1.00, 'B', NULL, 'medium', NULL, NULL, '2021-01-08 19:48:51', '2021-01-08 19:48:51', 1, 'multiple'),
(5, '25', '1', 'Geography', 'What is the capital of British Columbia, Canada?', 'Hope', 'Vancouver', 'Victoria', 'Kelowna', 1.00, 'C', NULL, 'medium', NULL, NULL, '2021-01-08 19:49:48', '2021-01-08 19:49:48', 1, 'multiple'),
(6, '25', '1', 'Geography', 'What is radiation measured in?', 'Gray', 'Watt', 'Decibel', 'Kelvin', 1.00, 'A', NULL, 'medium', NULL, NULL, '2021-01-08 19:50:34', '2021-01-08 19:50:34', 1, 'multiple'),
(7, '25', '1', 'Entertainment: Video Games', 'Which of the following characters from the game Overwatch was revealed to be homosexual in December of 2016?', 'Sombra', 'Widowmaker', 'Symmetra', 'Tracer', 1.00, 'A', NULL, 'easy', NULL, NULL, '2021-01-08 19:51:12', '2021-01-08 19:51:12', 1, 'multiple'),
(8, '25', '1', 'Entertainment: Television', 'In Star Trek: The Next Generation, Data is the only android in existence.', 'True', 'False', NULL, NULL, 1.00, 'B', NULL, 'medium', NULL, NULL, '2021-01-08 19:51:41', '2021-01-08 19:51:41', 1, 'multiple'),
(9, '25', '1', 'Entertainment: Video Games', 'Exile; and Revelations were the third and fourth installments of which PC game series?', 'Myst', 'Shivers', 'Doom', 'Tropico', 1.00, 'A', NULL, 'hard', NULL, NULL, '2021-01-08 19:52:26', '2021-01-08 19:52:26', 1, 'multiple'),
(10, '25', '1', 'Entertainment: Film', 'Which 90s comedy cult classic features cameos appearances from Meat Loaf, Alice Cooper and Chris Farley?', 'Wayne\'s World', 'Bill Teds Excellent Adventure', 'Dumb and Dumber', 'Austin Powers: International Man of Mystery', 1.00, 'A', NULL, 'medium', NULL, NULL, '2021-01-08 19:54:11', '2021-01-08 19:54:11', 1, 'multiple'),
(11, '25', '1', 'General Knowledge', 'What is the profession of Elon Musks mom, Maye Musk?', 'Professor', 'Model', 'Biologist', 'Musician', 1.00, 'B', NULL, 'easy', NULL, NULL, '2021-01-08 19:54:51', '2021-01-08 19:54:51', 1, 'multiple');

-- --------------------------------------------------------

--
-- Table structure for table `exam_subject`
--

CREATE TABLE `exam_subject` (
  `subject_id` int(10) UNSIGNED NOT NULL,
  `examcode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2018_01_20_105337_create_admins_table', 2),
(5, '2018_01_21_051956_create_exam_question_table', 3),
(7, '2014_10_12_000000_create_users_table', 4),
(8, '2018_01_26_030323_create_fee_table', 5),
(9, '2018_01_30_162452_create_exam_table', 5),
(10, '2018_02_02_013517_create_examsubject_tabel', 6);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('isc2013008@gmail.com', '$2y$10$GkpBKY4TUAPv0W7wdIm66ecvA40fvPQ4gip2t7bWIbvxYIAcXk5f6', '2018-01-19 17:08:42');

-- --------------------------------------------------------

--
-- Table structure for table `ref_result`
--

CREATE TABLE `ref_result` (
  `id` int(10) UNSIGNED NOT NULL,
  `student_id` varchar(100) NOT NULL,
  `examcode` int(10) UNSIGNED NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ref_result`
--

INSERT INTO `ref_result` (`id`, `student_id`, `examcode`, `created_at`, `updated_at`) VALUES
(2, 'aarti', 1, '2021-01-09', '2021-01-09');

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `id` int(11) NOT NULL,
  `student_id` varchar(100) DEFAULT NULL,
  `ques_id` int(10) UNSIGNED DEFAULT NULL,
  `selected_option` text,
  `givenmarks` double DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `right_wrong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`id`, `student_id`, `ques_id`, `selected_option`, `givenmarks`, `created_at`, `updated_at`, `right_wrong`) VALUES
(10, 'aarti', 1, 'A', 1, '2021-01-09', '2021-01-09', 1),
(11, 'aarti', 13, 'B', 1, '2021-01-09', '2021-01-09', 2),
(12, 'aarti', 2, 'A', 1, '2021-01-09', '2021-01-09', 2),
(13, 'aarti', 4, 'B', 1, '2021-01-09', '2021-01-09', 1),
(14, 'aarti', 5, 'A', 1, '2021-01-09', '2021-01-09', 2),
(15, 'aarti', 6, 'C', 1, '2021-01-09', '2021-01-09', 2),
(16, 'aarti', 7, 'A', 1, '2021-01-09', '2021-01-09', 1),
(17, 'aarti', 8, 'A', 1, '2021-01-09', '2021-01-09', 2),
(18, 'aarti', 9, 'A', 1, '2021-01-09', '2021-01-09', 1),
(19, 'aarti', 10, 'A', 1, '2021-01-09', '2021-01-09', 1),
(20, 'aarti', 11, 'B', 1, '2021-01-09', '2021-01-09', 1);

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `id` int(11) NOT NULL,
  `post` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `student_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` bigint(10) DEFAULT NULL,
  `admin_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin_email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `validity` date DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `student_id`, `name`, `contact`, `admin_id`, `admin_email`, `validity`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 'aarti', 'aarti', 9146328941, NULL, NULL, NULL, '$2y$10$U8M2Wka9UDcAT9vLrZzTn.cZG1aJ4Wbg4685epsoXK1ZwgKE53WbC', 'mLiCbi87BOGScCkaWn16cSXDfND5uLx9S9xJz6HFSkkPh7NDyrk4ZjMBwV5W', '2021-01-09 01:40:33', '2021-01-09 01:40:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`examcode`);

--
-- Indexes for table `exam_question`
--
ALTER TABLE `exam_question`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_subject`
--
ALTER TABLE `exam_subject`
  ADD PRIMARY KEY (`subject_id`);

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
-- Indexes for table `ref_result`
--
ALTER TABLE `ref_result`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_student_id_unique` (`student_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `exam`
--
ALTER TABLE `exam`
  MODIFY `examcode` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `exam_question`
--
ALTER TABLE `exam_question`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `exam_subject`
--
ALTER TABLE `exam_subject`
  MODIFY `subject_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `ref_result`
--
ALTER TABLE `ref_result`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
