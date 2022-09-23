-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 23, 2022 at 02:30 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tork_inc_assesment_db`
--

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
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_09_22_144501_create_test_questions_table', 1),
(6, '2022_09_22_144645_create_question_options_table', 1),
(7, '2022_09_22_144748_create_user_answers_table', 1),
(8, '2022_09_22_144945_create_user_test_results_table', 1);

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `question_options`
--

CREATE TABLE `question_options` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question_id` int(11) NOT NULL,
  `option_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `option_title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `question_options`
--

INSERT INTO `question_options` (`id`, `question_id`, `option_name`, `option_title`, `created_at`, `updated_at`) VALUES
(1, 1, 'a', '24', NULL, NULL),
(2, 1, 'b', '25', NULL, NULL),
(3, 1, 'c', '28', NULL, NULL),
(4, 1, 'd', '30', NULL, NULL),
(5, 2, 'a', '15', NULL, NULL),
(6, 2, 'b', '15', NULL, NULL),
(7, 2, 'c', '16', NULL, NULL),
(8, 2, 'd', '4', NULL, NULL),
(13, 4, 'a', 'true', NULL, NULL),
(14, 4, 'b', 'false', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `test_questions`
--

CREATE TABLE `test_questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question_number` int(11) NOT NULL,
  `question_title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `correct_option` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `test_questions`
--

INSERT INTO `test_questions` (`id`, `question_number`, `question_title`, `correct_option`, `type`, `created_at`, `updated_at`) VALUES
(1, 1, 'What 20 addition 5 ? ', 'b', 'radio', NULL, NULL),
(2, 2, 'What 20 subtract 5 ? ', '{\"0\":\"a\",\"1\":\"b\"}', 'check', NULL, NULL),
(4, 4, '20 divide 5 is 4', 'a', 'boolean', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department_id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `department_id`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'azim', 1, 'userb@gmail.com', NULL, '$2y$10$ZQbcv7EIA9fgD7iPQkH94O91WcDt8b.3Q1AWsIC3TqQtQPxgHcDAS', NULL, '2022-09-22 10:19:50', '2022-09-22 10:19:50'),
(3, 'azim1', 1, 'userc@gmail.com', NULL, '$2y$10$qBdQIhkOSUS7GBVEVkYDB.ajXlk6hIrCGOEwGweB0Uqef1WG1JIvy', NULL, '2022-09-22 13:15:23', '2022-09-22 13:15:23'),
(4, 'azim2', 1, 'userd@gmail.com', NULL, '$2y$10$7JG/Xe3uX0MMCqiVWN1O9OQvUayCNLdZmz89ClbtXQ7/YHEy1fosq', NULL, '2022-09-22 13:15:41', '2022-09-22 13:15:41'),
(5, 'azim3', 2, 'usere@gmail.com', NULL, '$2y$10$cFxUDFITvJnGzM3cvEIkK.A.DC7d23rbxxdQWbBHXaM5VSNCuCp56', NULL, '2022-09-22 13:15:55', '2022-09-22 13:15:55'),
(6, 'azim4', 2, 'userf@gmail.com', NULL, '$2y$10$AYmfuwqIC/6Ei1rof701uu7taKHGePOWbEwJZP7smX9La4CV2Ogga', NULL, '2022-09-22 13:16:08', '2022-09-22 13:16:08'),
(7, 'azim5', 2, 'userg@gmail.com', NULL, '$2y$10$cpxerqNBxdjGryorSbaiyetRRqltbER7xfgH4cuyprGzRDVqH6CvS', NULL, '2022-09-22 13:16:16', '2022-09-22 13:16:16'),
(8, 'user10', 2, 'user10@gmail.com', NULL, '$2y$10$7VP.KdASrrf5i.i9QWHODepNAcAYvkHqo/rtEO./jsLOo91jq07W2', NULL, '2022-09-22 17:37:29', '2022-09-22 17:37:29'),
(9, 'Azim', 2, 'user11@gmail.com', NULL, '$2y$10$rijD2BvdjW1W5NLxBDmHsODoeSTDey/bLtA4CxaPNqR8hfQki3B5q', NULL, '2022-09-22 17:56:42', '2022-09-22 17:56:42');

-- --------------------------------------------------------

--
-- Table structure for table `user_answers`
--

CREATE TABLE `user_answers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `option_id` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_correct` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_answers`
--

INSERT INTO `user_answers` (`id`, `user_id`, `question_id`, `option_id`, `is_correct`, `created_at`, `updated_at`) VALUES
(1, 9, 1, '\"b\"', 1, '2022-09-22 18:27:59', '2022-09-22 18:27:59'),
(2, 9, 2, '\"a,b\"', 1, '2022-09-22 18:27:59', '2022-09-22 18:27:59'),
(3, 9, 4, '\"a\"', 1, '2022-09-22 18:27:59', '2022-09-22 18:27:59'),
(4, 2, 1, '\"b\"', 1, '2022-09-22 18:28:22', '2022-09-22 18:28:22'),
(5, 2, 2, '\"b\"', 0, '2022-09-22 18:28:22', '2022-09-22 18:28:22'),
(6, 2, 4, '\"b\"', 0, '2022-09-22 18:28:22', '2022-09-22 18:28:22'),
(7, 3, 1, '\"b\"', 1, '2022-09-22 18:28:46', '2022-09-22 18:28:46'),
(8, 3, 2, '\"a,b\"', 1, '2022-09-22 18:28:46', '2022-09-22 18:28:46'),
(9, 3, 4, 'null', NULL, '2022-09-22 18:28:46', '2022-09-22 18:28:46'),
(10, 5, 1, '\"b\"', 1, '2022-09-22 18:29:09', '2022-09-22 18:29:09'),
(11, 5, 2, '\"a\"', 0, '2022-09-22 18:29:09', '2022-09-22 18:29:09'),
(12, 5, 4, '\"a\"', 1, '2022-09-22 18:29:09', '2022-09-22 18:29:09'),
(13, 6, 1, '\"c\"', 0, '2022-09-22 18:29:35', '2022-09-22 18:29:35'),
(14, 6, 2, '\"c\"', 0, '2022-09-22 18:29:35', '2022-09-22 18:29:35'),
(15, 6, 4, '\"b\"', 0, '2022-09-22 18:29:35', '2022-09-22 18:29:35'),
(16, 7, 1, '\"b\"', 1, '2022-09-22 18:30:18', '2022-09-22 18:30:18'),
(17, 7, 2, '\"a,b\"', 1, '2022-09-22 18:30:18', '2022-09-22 18:30:18'),
(18, 7, 4, '\"b\"', 0, '2022-09-22 18:30:18', '2022-09-22 18:30:18');

-- --------------------------------------------------------

--
-- Table structure for table `user_test_results`
--

CREATE TABLE `user_test_results` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_department_id` int(11) NOT NULL,
  `total_questions` int(11) NOT NULL,
  `attempted` int(11) NOT NULL,
  `correct_answer` int(11) NOT NULL,
  `wrong_answer` int(11) NOT NULL,
  `total_score` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_test_results`
--

INSERT INTO `user_test_results` (`id`, `user_id`, `user_department_id`, `total_questions`, `attempted`, `correct_answer`, `wrong_answer`, `total_score`, `created_at`, `updated_at`) VALUES
(1, 9, 2, 3, 3, 3, 0, 0.75, '2022-09-22 18:27:59', '2022-09-22 18:27:59'),
(2, 2, 1, 3, 3, 1, 2, 0.15, '2022-09-22 18:28:22', '2022-09-22 18:28:22'),
(3, 3, 1, 3, 2, 2, 0, 0.50, '2022-09-22 18:28:46', '2022-09-22 18:28:46'),
(4, 5, 2, 3, 3, 2, 1, 0.45, '2022-09-22 18:29:09', '2022-09-22 18:29:09'),
(5, 6, 2, 3, 3, 0, 3, -0.15, '2022-09-22 18:29:35', '2022-09-22 18:29:35'),
(6, 7, 2, 3, 3, 2, 1, 0.45, '2022-09-22 18:30:18', '2022-09-22 18:30:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `question_options`
--
ALTER TABLE `question_options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test_questions`
--
ALTER TABLE `test_questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_answers`
--
ALTER TABLE `user_answers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_test_results`
--
ALTER TABLE `user_test_results`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `question_options`
--
ALTER TABLE `question_options`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `test_questions`
--
ALTER TABLE `test_questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user_answers`
--
ALTER TABLE `user_answers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `user_test_results`
--
ALTER TABLE `user_test_results`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
