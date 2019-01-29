-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 20, 2017 at 10:37 PM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `besocial`
--

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

CREATE TABLE IF NOT EXISTS `friends` (
  `id` int(10) unsigned NOT NULL,
  `user_id` int(11) NOT NULL,
  `friend_id` int(11) NOT NULL,
  `accepted` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `friends`
--

INSERT INTO `friends` (`id`, `user_id`, `friend_id`, `accepted`, `created_at`, `updated_at`) VALUES
(7, 2, 1, 1, NULL, NULL),
(8, 3, 1, 1, NULL, NULL),
(10, 3, 2, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `likeables`
--

CREATE TABLE IF NOT EXISTS `likeables` (
  `id` int(10) unsigned NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `likeable_id` int(11) NOT NULL,
  `likeable_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `likeables`
--

INSERT INTO `likeables` (`id`, `user_id`, `likeable_id`, `likeable_type`, `created_at`, `updated_at`) VALUES
(1, 1, 13, 'App\\Status', '2017-06-11 20:47:09', '2017-06-11 20:47:09'),
(2, 1, 18, 'App\\Status', '2017-06-11 20:48:35', '2017-06-11 20:48:35'),
(3, 1, 15, 'App\\Status', '2017-06-11 20:49:55', '2017-06-11 20:49:55'),
(4, 3, 26, 'App\\Status', '2017-06-11 21:04:57', '2017-06-11 21:04:58'),
(5, 1, 6, 'App\\Status', '2017-06-11 21:09:17', '2017-06-11 21:09:17'),
(7, 2, 22, 'App\\Status', '2017-06-12 18:51:07', '2017-06-12 18:51:07'),
(8, 2, 30, 'App\\Status', '2017-06-20 01:28:00', '2017-06-20 01:28:00');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(9, '2017_04_16_195625_create_users_table', 1),
(10, '2017_04_21_110318_create_todolists_table', 1),
(11, '2017_04_28_132430_create_profiles_table', 1),
(12, '2017_05_01_035821_create_friends_table', 1),
(16, '2017_05_01_191320_create_categories_table', 3),
(17, '2017_05_01_193717_create_category_todolist_table', 4),
(18, '2017_05_11_124516_create_tasks_table', 5),
(19, '2017_05_20_044305_create_statuses_table', 6),
(20, '2017_05_22_105944_create_likeables_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `statuses`
--

CREATE TABLE IF NOT EXISTS `statuses` (
  `id` int(10) unsigned NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `body` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `statuses`
--

INSERT INTO `statuses` (`id`, `user_id`, `parent_id`, `body`, `created_at`, `updated_at`) VALUES
(1, 2, NULL, ' hello Believe', '2017-05-20 05:21:23', '2017-05-20 05:21:23'),
(2, 1, NULL, 'God i soooooooooooooooooo love you', '2017-05-20 05:35:25', '2017-05-20 05:35:25'),
(5, 2, NULL, 'omg this works', '2017-05-20 17:27:06', '2017-05-20 17:27:06'),
(6, 2, NULL, 'hello', '2017-05-21 22:44:36', '2017-05-21 22:44:36'),
(13, 2, 6, 'right', '2017-05-22 08:06:00', '2017-05-22 08:06:00'),
(14, 2, 11, 'hello', '2017-05-22 08:06:47', '2017-05-22 08:06:47'),
(15, 2, 2, 'nice one', '2017-05-22 08:08:46', '2017-05-22 08:08:46'),
(18, 2, 6, 'try to rep you', '2017-05-22 08:24:57', '2017-05-22 08:24:57'),
(19, 2, 1, 'XUP NA HOW U DEY', '2017-05-22 08:26:22', '2017-05-22 08:26:22'),
(21, 3, 20, 'hey purzin', '2017-05-22 08:59:09', '2017-05-22 08:59:10'),
(22, 3, 1, 'OgaBelieve!!!', '2017-05-22 09:14:32', '2017-05-22 09:14:32'),
(23, 3, 2, 'nice one loveth', '2017-05-22 09:54:54', '2017-05-22 09:54:54'),
(24, 2, 2, 'hmmm deji be warned', '2017-06-04 19:02:15', '2017-06-04 19:02:15'),
(25, 3, NULL, 'hellooo i''m deji by name', '2017-06-11 19:18:16', '2017-06-11 19:18:16'),
(26, 1, 25, 'so nice to meet you deji', '2017-06-11 19:18:57', '2017-06-11 19:18:57'),
(27, 3, 25, 'thanks love', '2017-06-11 19:19:26', '2017-06-11 19:19:27'),
(28, 1, 2, 'booom', '2017-06-11 19:45:05', '2017-06-11 19:45:05'),
(29, 1, NULL, '#latePost', '2017-06-11 20:37:12', '2017-06-11 20:37:12'),
(30, 1, 29, 'hello', '2017-06-11 20:37:25', '2017-06-11 20:37:25');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'avatar.jpg',
  `remember_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password`, `first_name`, `last_name`, `location`, `avatar`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'love@gmail.com', 'love', '$2y$10$.X6knw.6VWJNsKfSE9c2K.5wo0.aQlMf4PldE7JVOlBlijPGJjrky', 'Loveth', 'Owonikoko', 'ikeja lagos', 'avatar.jpg', 'riMAUTG0u0aFoHONTtrpdVjGkUkxzsdA6UGeKMaIbGF4SztUwuyU7WbX0cXy', '2017-05-02 22:07:28', '2017-05-19 09:03:03'),
(2, 'dapo@gmail.com', 'Believe', '$2y$10$OxqmXeyRim0RY3F4PITcBeG4/0L4yuScelvN8OGwQQxSziGiPhNDe', 'Dapo', 'Michaels', 'Magboro Akeran', 'avatar.jpg', '5xeEMk3b3L38Hr1jOVGhN9tPPuWoysBCz3eGbNK6qbuH278yQLHOPVpkyiCG', '2017-05-03 09:02:31', '2017-06-11 19:14:01'),
(3, 'deji@gmail.com', 'Dxtrim', '$2y$10$XbsZJeaPbCXqlDDVUArKoe5Lw2qC68axo4t5NdUf9UmZHmmCx1492', 'Abimbola', 'Ayodeji', 'Ikeja Lagos', 'avatar.jpg', 'gctHt5FbBl4uhsPgbj55SdtKLzsaZap44Pz20b9JTjCYMzcS8Gw8SsV2Leye', '2017-05-03 09:02:56', '2017-05-22 12:38:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `friends`
--
ALTER TABLE `friends`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `likeables`
--
ALTER TABLE `likeables`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `friends`
--
ALTER TABLE `friends`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `likeables`
--
ALTER TABLE `likeables`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
