-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2023 at 11:42 PM
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
-- Database: `user_management`
--

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_06_15_132101_create_user_age_catigeries_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `registration_id` bigint(20) UNSIGNED NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Phone` bigint(20) DEFAULT NULL,
  `Location` varchar(255) DEFAULT NULL,
  `Date_Of_Birth` date DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`registration_id`, `Name`, `Email`, `Phone`, `Location`, `Date_Of_Birth`, `Password`, `created_at`, `updated_at`) VALUES
(43, 'Brenna Miranda', 'fyrom@mailinator.com', 1234567890, 'Pune', '1994-11-17', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', '2023-06-20 14:08:57', '2023-06-20 14:08:57'),
(44, 'Desiree Meadows', 'hiqa@mailinator.com', 1234567890, 'Hyderabad', '1972-02-13', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', '2023-06-20 14:09:07', '2023-06-20 14:09:07'),
(45, 'Olga Mercer', 'wymi@mailinator.com', 1234567890, 'Mumbai', '1997-09-14', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', '2023-06-20 14:09:20', '2023-06-20 14:09:20'),
(46, 'Cooper Massey', 'mihyforyj@mailinator.com', 1234567890, 'Delhi', '1997-03-20', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', '2023-06-20 14:09:31', '2023-06-20 14:09:31'),
(51, 'Zachary Levine', 'hugojuno@mailinator.com', 1234567890, 'Hyderabad', '1991-02-09', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', '2023-06-20 14:10:31', '2023-06-20 14:10:31'),
(52, 'Howard Daniels', 'maqypyxu@mailinator.com', 1234567890, 'Ahmedabad', '1986-07-12', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', '2023-06-20 14:10:41', '2023-06-20 14:10:41'),
(53, 'Wylie Holman', 'lytosuha@mailinator.com', 1234567890, 'Pune', '2016-12-24', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', '2023-06-20 14:11:23', '2023-06-20 14:11:23'),
(54, 'Alfreda Buchanan', 'nulocibij@mailinator.com', 1234567890, 'Lucknow', '1978-02-08', '1a059e69b3892a6f69a5b777b050d448', '2023-06-20 15:01:27', '2023-06-20 15:01:27');

-- --------------------------------------------------------

--
-- Table structure for table `user_age_categories`
--

CREATE TABLE `user_age_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `age_category` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_age_categories`
--

INSERT INTO `user_age_categories` (`id`, `user_id`, `age_category`, `age`, `created_at`, `updated_at`) VALUES
(36, 43, 'ADULT', 28, '2023-06-20 14:08:57', '2023-06-20 14:08:57'),
(37, 44, 'ADULT', 51, '2023-06-20 14:09:07', '2023-06-20 14:09:07'),
(38, 45, 'ADULT', 25, '2023-06-20 14:09:20', '2023-06-20 14:09:20'),
(39, 46, 'ADULT', 26, '2023-06-20 14:09:31', '2023-06-20 14:09:31'),
(44, 51, 'ADULT', 32, '2023-06-20 14:10:31', '2023-06-20 14:10:31'),
(45, 52, 'ADULT', 36, '2023-06-20 14:10:41', '2023-06-20 14:10:41'),
(46, 53, 'MINOR', 6, '2023-06-20 14:11:23', '2023-06-20 14:11:23'),
(47, 54, 'ADULT', 45, '2023-06-20 15:01:27', '2023-06-20 15:01:27');

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
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`registration_id`),
  ADD UNIQUE KEY `users_email_unique` (`Email`);

--
-- Indexes for table `user_age_categories`
--
ALTER TABLE `user_age_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_age_categories_user_id_foreign` (`user_id`);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `registration_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `user_age_categories`
--
ALTER TABLE `user_age_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user_age_categories`
--
ALTER TABLE `user_age_categories`
  ADD CONSTRAINT `user_age_categories_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`registration_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
