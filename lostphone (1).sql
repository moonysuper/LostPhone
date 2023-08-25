-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 25, 2023 at 07:52 PM
-- Server version: 10.1.39-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lostphone`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
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
(13, '2014_10_12_000000_create_users_table', 1),
(14, '2014_10_12_100000_create_password_resets_table', 1),
(15, '2019_08_19_000000_create_failed_jobs_table', 1),
(16, '2019_12_14_000001_create_personal_access_tokens_table', 1);

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 2, 'my-app-token', 'fe194de50cc21e8e9fef0819c3ab82425767480c21c3960e574956c20917e3f3', '[\"*\"]', '2022-08-24 12:24:59', '2022-08-24 10:54:51', '2022-08-24 12:24:59'),
(2, 'App\\Models\\User', 4, 'my-app-token', 'bf181fdacebe9fd2c82dd87e59a5b1b2466c66a7d0ed0086cbc66c50e91a935b', '[\"*\"]', NULL, '2022-08-24 11:31:20', '2022-08-24 11:31:20'),
(3, 'App\\Models\\User', 5, 'my-app-token', 'd86bf7256aaec72993fdfc8f0aa0bb256fccd2b10b7bc6877dadd5ddf6e9d6f4', '[\"*\"]', NULL, '2022-08-24 11:43:55', '2022-08-24 11:43:55'),
(4, 'App\\Models\\User', 5, 'my-app-token', '66e0417ec75a8b2b8e9ff90e2de38d976f84f2e6ee2ecaf0ef327365a698f75d', '[\"*\"]', '2022-08-24 17:45:15', '2022-08-24 12:27:58', '2022-08-24 17:45:15'),
(5, 'App\\Models\\User', 5, 'my-app-token', '4dd603762fe814dd5074bfde92f653a045188dea990e574a6d7c040289d10f09', '[\"*\"]', NULL, '2022-08-24 17:28:58', '2022-08-24 17:28:58'),
(6, 'App\\Models\\User', 5, 'my-app-token', 'e086f47787e78f2b09c9ea76ef21c46c609c34b57eec098ecf94ae3e7746f311', '[\"*\"]', NULL, '2022-08-24 17:29:42', '2022-08-24 17:29:42');

-- --------------------------------------------------------

--
-- Table structure for table `phones`
--

CREATE TABLE `phones` (
  `ID` int(11) NOT NULL,
  `ownerid` int(11) NOT NULL,
  `ownername` text COLLATE utf8_unicode_ci NOT NULL,
  `phone` text COLLATE utf8_unicode_ci NOT NULL,
  `Imei` text COLLATE utf8_unicode_ci NOT NULL,
  `brand` text COLLATE utf8_unicode_ci NOT NULL,
  `model` text COLLATE utf8_unicode_ci NOT NULL,
  `ptheft` text COLLATE utf8_unicode_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `rep_image` text COLLATE utf8_unicode_ci NOT NULL,
  `box_image` text COLLATE utf8_unicode_ci,
  `confirm` tinyint(1) NOT NULL DEFAULT '0',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `phones`
--

INSERT INTO `phones` (`ID`, `ownerid`, `ownername`, `phone`, `Imei`, `brand`, `model`, `ptheft`, `date`, `rep_image`, `box_image`, `confirm`, `updated_at`, `created_at`) VALUES
(1, 1, 'ahmed yassin', '969809964', '123456789012345', 'Apple', 'Iphone 8', 'khartoum mau', '2022-05-27 23:50:09', '1651629959.png', '1651692132.png', 1, '2022-05-27 20:50:09', '2022-05-03 23:05:59'),
(2, 5, 'moony', '0969809964', '123456789012341', 'Apple', 'Iphone 7 plus', 'Khartoum', '2022-05-27 23:50:09', 'test', NULL, 0, '2022-08-24 12:37:31', '2022-08-24 12:37:31'),
(3, 5, 'moony', '0969809964', '123456789012342', 'Apple', 'Iphone 6s', 'Umbada', '2022-05-27 23:50:09', '1661356967.png', '1661356967.png', 0, '2022-08-24 13:02:47', '2022-08-24 13:02:47'),
(4, 5, 'moony', '0969809964', '123456789098765', 'Apple', 'Iphone 6s', 'Umbada', '2022-05-27 23:50:09', '1661361136.png', NULL, 0, '2022-08-24 14:12:16', '2022-08-24 14:12:16');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_as` tinyint(4) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `mobile`, `address`, `role_as`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'moonysuper', 'moonxsuper@gmail.com', NULL, '$2y$10$BnBmxOCTuhFZF0N3TOB5XO4ckBJ1bA4Kkv9Ek83EDf.gETLmE.Lau', '123456789', '123456789', 0, NULL, '2022-05-04 14:41:48', '2022-05-04 14:41:48'),
(2, 'moony', 'admin@info.com', NULL, '$2y$10$0R7h7KAfQLCPLBSgyNEUZuOxs1Py1ZsTaAZ.rAhhMmknp/pyMy6K6', '969809964', 'omdurman', 1, NULL, '2022-05-04 16:08:02', '2022-05-04 16:08:02'),
(5, 'moony', 'moony@mail.com', NULL, '$2y$10$2TZe.46.RiGBH/hs24tPtuO8k1G.sUYuF2t2/cXkd24kwu8AUCmeO', '0902260807', 'om', 0, NULL, '2022-08-24 11:43:55', '2022-08-24 11:43:55');

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
-- Indexes for table `phones`
--
ALTER TABLE `phones`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ownerid` (`ownerid`);

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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `phones`
--
ALTER TABLE `phones`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
