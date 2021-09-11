-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 07, 2021 at 02:58 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE `announcement` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`id`, `name`, `description`, `status`, `created_at`, `updated_at`) VALUES
(2, 'library', 'Due to unavoidable circumstances, the library of our college remains close for upcoming 5 days.', 1, '2021-09-01 05:19:08', '2021-09-06 04:20:33'),
(3, 'Maintanance', 'Maintainance work', 1, '2021-09-06 04:21:26', '2021-09-06 04:21:26');

-- --------------------------------------------------------

--
-- Table structure for table `batch`
--

CREATE TABLE `batch` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `batch`
--

INSERT INTO `batch` (`id`, `year`, `status`, `created_at`, `updated_at`) VALUES
(1, '2017', 0, '2021-03-12 13:10:58', '2021-09-06 03:51:26'),
(2, '1981', 0, '2021-03-14 07:44:35', '2021-03-14 07:44:35'),
(3, '2021', 1, '2021-03-14 08:00:10', '2021-03-14 08:00:10'),
(4, '2015', 0, '2021-09-07 06:50:13', '2021-09-07 06:50:13'),
(5, '2016', 0, '2021-09-07 07:11:03', '2021-09-07 07:11:03');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `publisher` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isbn` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `pages` int(11) NOT NULL,
  `edition` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `name`, `author`, `publisher`, `isbn`, `price`, `quantity`, `pages`, `edition`, `created_at`, `updated_at`) VALUES
(1, 'Declan Walters', 'Madeson Lang', 'Dolores saepe at ea', 'Omnis qui est deseru', 866, 834, 32, 37, '2021-03-12 13:11:20', '2021-03-12 13:11:20'),
(2, 'Dorian Gill', 'Camille Rodriquez', 'Dignissimos dolorem', 'Pariatur Rerum qui', 556, 76, 59, 40, '2021-03-14 07:48:33', '2021-03-14 07:48:33'),
(3, 'JAVA', 'prajul', 'Id quasi animi et', '12323mn', 800, 80, 800, 89, '2021-03-14 08:01:10', '2021-03-14 08:01:10');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `faculty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`id`, `faculty`, `status`, `created_at`, `updated_at`) VALUES
(1, 'BIM', 1, '2021-03-12 13:11:10', '2021-03-12 13:11:10'),
(2, 'BHM', 1, '2021-03-14 07:44:55', '2021-03-14 07:44:55'),
(3, 'BBM', 0, '2021-03-14 08:00:29', '2021-03-14 08:00:29');

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
-- Table structure for table `fines`
--

CREATE TABLE `fines` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `amount` int(11) NOT NULL,
  `date` date NOT NULL,
  `transaction_id` bigint(20) UNSIGNED NOT NULL,
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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_02_27_085433_create_books_table', 1),
(5, '2021_02_27_090015_create_students_table', 1),
(6, '2021_02_27_090649_create_fines_table', 1),
(7, '2021_02_27_092132_create_transactions_table', 1),
(8, '2021_02_27_180431_create_announcement_table', 1),
(9, '2021_03_04_133955_create_batch_table', 1),
(10, '2021_03_04_144623_add_columns_to_batch_table', 1),
(11, '2021_03_04_152920_add_column_to_transactions_table', 1),
(12, '2021_03_04_174009_add_columns_to_fines_table', 1),
(13, '2021_03_08_040637_create_faculty_table', 1),
(14, '2021_03_08_114907_add_columns_to_students_table', 1);

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
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch_id` bigint(20) UNSIGNED NOT NULL,
  `faculty_id` bigint(20) UNSIGNED NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `email`, `batch_id`, `faculty_id`, `password`, `status`, `phone`, `created_at`, `updated_at`) VALUES
(1, 'Tyler Morrison', 'xyjivot@mailinator.com', 1, 1, 'Pa$$w0rd!', 1, '+1 (155) 351-4275', '2021-03-12 13:11:30', '2021-03-12 13:11:30'),
(2, 'Phillip Shaffer', 'belyse@mailinator.com', 1, 1, 'Pa$$w0rd!', 0, '+1 (297) 607-4773', '2021-03-14 07:45:04', '2021-03-14 07:45:04'),
(3, 'mukesh Mandal', 'prajul@gmail.com', 1, 1, 'qwertyy', 0, '+9779814948102', '2021-03-14 07:45:44', '2021-03-14 07:45:44'),
(4, 'Amaya Kinney', 'nyqitosew@mailinator.com', 2, 2, 'Pa$$w0rd!', 1, '+1 (113) 791-4411', '2021-03-14 07:45:53', '2021-03-14 07:45:53'),
(5, 'Harper Booth', 'samak@mailinator.com', 2, 1, 'Pa$$w0rd!', 1, '+1 (743) 964-4112', '2021-03-14 07:46:02', '2021-03-14 07:46:02'),
(6, 'Kyla Lester', 'toruvy@mailinator.com', 3, 2, 'Pa$$w0rd!', 1, '+1 (667) 362-6067', '2021-03-14 08:01:20', '2021-03-14 08:01:20');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `book_id` bigint(20) UNSIGNED NOT NULL,
  `batch_id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `return_date` date NOT NULL,
  `renew_data` date DEFAULT NULL,
  `issue_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `student_id`, `user_id`, `book_id`, `batch_id`, `status`, `return_date`, `renew_data`, `issue_date`, `created_at`, `deleted_at`, `updated_at`) VALUES
(1, 1, 'Admin', 1, 1, 1, '2021-03-19', '2021-03-12', '2021-03-12', '2021-03-12 13:11:47', NULL, '2021-03-12 13:15:13'),
(2, 3, 'Admin', 3, 1, 1, '1984-01-05', NULL, '2021-03-14', '2021-03-14 10:37:32', NULL, '2021-03-14 10:37:32'),
(3, 3, 'Admin', 1, 1, 1, '2019-04-01', NULL, '2021-03-14', '2021-03-14 10:45:41', NULL, '2021-03-14 10:45:41'),
(4, 2, 'Admin', 3, 1, 0, '1991-12-28', NULL, '2021-03-14', '2021-03-14 10:47:21', NULL, '2021-03-14 10:47:21'),
(5, 5, 'Admin', 3, 2, 0, '2018-06-22', NULL, '2021-03-15', '2021-03-14 21:57:57', NULL, '2021-03-14 21:57:57'),
(6, 5, 'Admin', 3, 2, 0, '2002-03-11', NULL, '2021-03-15', '2021-03-14 22:06:30', NULL, '2021-03-14 22:06:30'),
(7, 6, 'Admin', 2, 1, 0, '1991-01-12', NULL, '2021-03-15', '2021-03-14 22:07:43', NULL, '2021-03-14 22:07:43'),
(8, 2, 'Admin', 3, 2, 0, '1997-07-09', NULL, '2021-03-15', '2021-03-14 22:09:47', NULL, '2021-03-14 22:09:47'),
(9, 4, 'Admin', 3, 1, 0, '2019-07-15', NULL, '2021-03-15', '2021-03-14 22:10:40', NULL, '2021-03-14 22:10:40'),
(10, 3, 'Admin', 2, 2, 0, '2021-03-18', NULL, '2021-03-16', '2021-03-16 11:07:56', NULL, '2021-03-16 11:07:56'),
(11, 3, 'principle', 2, 2, 0, '2021-03-25', NULL, '2021-03-18', '2021-03-18 12:45:11', NULL, '2021-03-18 12:45:11'),
(12, 3, 'Admin', 3, 1, 0, '2021-03-24', NULL, '2021-03-23', '2021-03-23 10:37:42', NULL, '2021-03-23 10:37:42'),
(13, 1, 'Admin', 1, 3, 0, '2021-09-06', NULL, '2021-09-01', '2021-09-01 09:12:40', NULL, '2021-09-01 09:12:40'),
(14, 6, 'Admin', 1, 3, 0, '2021-09-06', NULL, '2021-09-01', '2021-09-01 09:13:14', NULL, '2021-09-01 09:13:14');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@admin.com', NULL, '$2y$10$LG9cD1EmTzdn.VUK9oCjzu3G9czKoro.X89qw7K6vEi6paMnmwfLK', NULL, '2021-03-12 13:10:30', '2021-03-12 13:10:30'),
(2, 'principle', 'mukesh123@gmail.com', NULL, '$2y$10$9IwR6AAKsqoNSdWm0tWe9.nNz.jyejlW47f3hAOeGpehgv3XcVbIO', NULL, '2021-03-18 12:44:44', '2021-03-18 12:44:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `batch`
--
ALTER TABLE `batch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `fines`
--
ALTER TABLE `fines`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fines_transaction_id_foreign` (`transaction_id`);

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
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `students_batch_id_foreign` (`batch_id`),
  ADD KEY `students_faculty_id_foreign` (`faculty_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transactions_student_id_foreign` (`student_id`),
  ADD KEY `transactions_book_id_foreign` (`book_id`),
  ADD KEY `transactions_batch_id_foreign` (`batch_id`);

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
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `batch`
--
ALTER TABLE `batch`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fines`
--
ALTER TABLE `fines`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `fines`
--
ALTER TABLE `fines`
  ADD CONSTRAINT `fines_transaction_id_foreign` FOREIGN KEY (`transaction_id`) REFERENCES `transactions` (`id`);

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_batch_id_foreign` FOREIGN KEY (`batch_id`) REFERENCES `batch` (`id`),
  ADD CONSTRAINT `students_faculty_id_foreign` FOREIGN KEY (`faculty_id`) REFERENCES `faculty` (`id`);

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_batch_id_foreign` FOREIGN KEY (`batch_id`) REFERENCES `batch` (`id`),
  ADD CONSTRAINT `transactions_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`),
  ADD CONSTRAINT `transactions_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
