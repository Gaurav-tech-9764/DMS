-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 26, 2021 at 11:14 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

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
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Category_Name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Category_description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `Category_Name`, `Category_description`, `created_at`, `updated_at`) VALUES
(4, 'test', 'test', '2021-05-25 01:53:25', '2021-05-25 01:53:25'),
(7, 'bikes', 'these are the bikes', '2021-05-25 06:37:15', '2021-05-25 06:37:15'),
(8, 'Car', 'these are the car', '2021-05-25 06:37:26', '2021-05-25 06:37:26'),
(9, 'sports', 'these are the sport item', '2021-05-25 06:39:44', '2021-05-25 06:39:44'),
(10, 'cycle', 'theis ois the cycle category', '2021-05-26 02:42:32', '2021-05-26 02:42:32');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
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
(4, '2021_05_07_143608_create__role__table', 2),
(5, '2021_05_22_162346_create__category_table', 3),
(6, '2021_05_22_162403_create__products_table', 3),
(7, '2021_05_22_162403_create_products_table', 4);

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Product_Name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Product_description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `Category_id` bigint(20) UNSIGNED NOT NULL,
  `product_price` decimal(8,2) NOT NULL,
  `product_image` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `Product_Name`, `Product_description`, `Category_id`, `product_price`, `product_image`, `created_at`, `updated_at`) VALUES
(33, 'splender', 'hero', 7, '57875.00', 'splender.png', '2021-05-25 06:41:42', '2021-05-25 06:41:42'),
(34, 'passion', 'hero', 7, '86587.00', 'passion.jpg', '2021-05-25 06:42:21', '2021-05-25 06:42:21'),
(35, 'BMW', 'BMW', 8, '336436.00', 'BMW.jpg', '2021-05-25 06:43:28', '2021-05-25 06:43:28'),
(36, 'audi', 'audi', 8, '6986.00', 'audi.jpg', '2021-05-25 06:44:13', '2021-05-25 06:44:13'),
(37, 'hero cycle', 'hero', 10, '68990.00', 'hero cycle.png', '2021-05-26 02:47:45', '2021-05-26 02:47:45'),
(38, 'cycle', 'cycle', 10, '38098.00', 'cycle.png', '2021-05-26 02:48:31', '2021-05-26 02:48:31');

-- --------------------------------------------------------

--
-- Table structure for table `Role`
--

CREATE TABLE `Role` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Roles` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `Role`
--

INSERT INTO `Role` (`id`, `Roles`, `created_at`, `updated_at`) VALUES
(1, 'Admin User', NULL, NULL),
(2, 'Sales User', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Role_id` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Number` int(15) DEFAULT NULL,
  `Designation` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Picture` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_Active` tinyint(1) DEFAULT 1,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `Role_id`, `Number`, `Designation`, `Picture`, `is_Active`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'SuperAdmin@gmail.com', NULL, '$2y$10$luz5Sm4Lr1vSP8u6JdRUZOtv3L3dSnw67NGQOrJt2ZGznrMospOmu', '3', NULL, NULL, NULL, 1, NULL, NULL, NULL),
(2, 'Usertestediting', 'User@gmail.com', NULL, '$2y$10$1TeAyjS.G7Y8fzfdk8qF7uVjdQAxxBqVohgJCDAIBK0hDiUXfBpU2', '2', 98374, 'manager', NULL, 0, NULL, '2021-05-09 12:25:16', '2021-05-18 12:15:35'),
(3, 'user235', 'user2@gmail.com', NULL, '$2y$10$BgnS8ZxK6xNS/8TuBuOl6eR/lyjYdI/PilF.nquFQdDYQs5yKYe6a', '2', 234324, 'tester', NULL, 0, NULL, '2021-05-09 12:25:54', '2021-05-19 00:33:09'),
(4, 'user3inactive', 'user3@gmail.com', NULL, '$2y$10$t4PHrQ6VnvTVRWnNWGHcs.xM51a0LTJyJbpRYraukwfjbg5aE3P4e', '2', 89787, 'L1 Engeeneer', '4.png', 1, NULL, '2021-05-09 12:26:32', '2021-05-21 04:17:56'),
(5, 'user5acive', 'user5@gmail.com', NULL, '$2y$10$LW3Y1/k.0OVz6x./HhEM1O2nVmrUFW.Xhy7HEHs.jE2nu9HTuthru', '1', 34324, 'user', NULL, 1, NULL, '2021-05-10 03:26:30', '2021-05-16 12:28:21'),
(6, 'user6', 'user6@gmail.com', NULL, '$2y$10$auYSgAp0gYeVAc9KWo6E3OIIVSDr84mH3JhjGstKC8n.ukkX0o/qy', '1', 234324, 'usetr', NULL, 1, NULL, '2021-05-10 03:27:05', '2021-05-18 00:14:41'),
(7, 'Gaurav  Nakhale', 'gaurav@gmail.com', NULL, '$2y$10$luz5Sm4Lr1vSP8u6JdRUZOtv3L3dSnw67NGQOrJt2ZGznrMospOmu', '1', 876876, 'manager', '7.png', 1, 'seJZ4Mq1M0KnhDVtZ0OGRS7GRyyuvYmpcyei1el3p3N2NrpYusJSUTU1dDcc', '2021-05-09 11:24:40', '2021-05-22 13:36:21'),
(9, 'test', 'test@gmail.com', NULL, '$2y$10$/vHpIJWsLVfQ3AEFhq8fKO1OqTbVEavZHYiMu.kexrAE7q2ZcXUNq', '2', 7697, 'manger', NULL, 0, NULL, '2021-05-11 00:38:37', '2021-05-17 01:05:56'),
(11, 'test2', 'test2@gmail.com', NULL, '$2y$10$aC.q1rd8OiHwJXhHYj4omOzYaSBKETlbiHqJEdTP2iqrz5f9Z.3k2', '2', NULL, NULL, NULL, 0, NULL, '2021-05-11 00:47:12', '2021-05-11 09:08:11'),
(12, 'testUser', 'testuser@gmail.com', NULL, '$2y$10$3O4IaHob5o5/4jzZ3aOyxeJDLh0iew2EAPw1HWRBuS/YaUIMcf8eG', '2', 2323, 'user', NULL, 0, NULL, '2021-05-11 00:48:28', '2021-05-11 06:39:35'),
(13, 'userfortest', 'usertest@gmail.com', NULL, '$2y$10$/.BksDtqeX6PnjCsWSSezeIn2QXuRmHfgtvS5xEvFDnDtaAiZvdwS', '2', NULL, NULL, NULL, 0, NULL, '2021-05-12 01:22:05', '2021-05-16 11:05:06'),
(14, 'finaluser', 'final@gmail.com', NULL, '$2y$10$LZLm9gEQQZ3pWRoK/ClTseztKd4WpsKy2OJ3rfUBHAaELl1LHENHe', '2', NULL, NULL, NULL, 1, NULL, '2021-05-12 01:23:18', '2021-05-12 01:23:18'),
(15, 'user78', 'user78@gmail.com', NULL, '$2y$10$pFTepzP5YaQQfIKQ4dQKO.6S7ePjWMkCP5PQXMQ13.Rk9JKUaBESK', '2', NULL, NULL, NULL, 0, NULL, '2021-05-13 23:14:17', '2021-05-14 06:41:15'),
(16, 'registertest', 'register@gmail.com', NULL, '$2y$10$3dZRYvm9HhuLkL0EZ7VZ3eTDh2JC8VOu9/zEmsF6o3AIlC3c0U4dK', '2', NULL, NULL, NULL, 1, NULL, '2021-05-14 10:46:34', '2021-05-14 10:46:34'),
(17, 'finaltest', 'final123@gmail.com', NULL, '$2y$10$dob6AyURb/Bd5j0I3VmEzeNU4u68swMd0bGAzuscHiA6NU27az4Am', '2', 78759, 'user', NULL, 1, NULL, '2021-05-14 10:56:03', '2021-05-16 12:57:16'),
(19, 'testregister', 'registertest@gmail.com', NULL, '$2y$10$a6Y6AsT/QeygU3WX52srredNCkk/toz5XdgSCcGeOE8Y.OiFC.0vC', '2', NULL, NULL, NULL, 1, NULL, '2021-05-14 11:44:03', '2021-05-14 11:44:03'),
(20, 'useradd', 'useradd@gmail.com', NULL, '$2y$10$Svo5Yt5Ix2rc1UHi6SbPIefJzg2NInxROfYEZtvl2qwX0rU1j7NAW', '2', NULL, NULL, NULL, 1, NULL, '2021-05-14 11:49:01', '2021-05-14 11:49:01'),
(21, 'testfor msg', 'msg@gmail.com', NULL, '$2y$10$kkODhPw32D.xRnlBDOUfB.KPYlfv9K88yaQrg/mdNqDm0Cn3iYIWu', '2', NULL, NULL, NULL, 1, NULL, '2021-05-14 11:58:11', '2021-05-14 11:58:11'),
(22, 'test', 'test78@gmail.com', NULL, '$2y$10$hcln2RURzCQI/W53FgrfJOKRNfYFrU3P2lnG1hsvUSghvgim8iuLi', '2', NULL, NULL, NULL, 1, NULL, '2021-05-14 12:04:03', '2021-05-14 12:04:03'),
(23, 'addesbye user', 'addeduser@gmail.com', NULL, '$2y$10$LFuRp2ZPS2fTqB6OACwT6.cv0h.JQyQMFcFa6OkRdPYFO31HPNLSW', '2', NULL, NULL, NULL, 1, NULL, '2021-05-14 12:32:12', '2021-05-14 12:32:12'),
(24, 'test', 'testfinal@gmail.com', NULL, '$2y$10$Mnsp.sN/7eJcMyhb1xaWI.MMDFQQi6LUfTocO9CFB8tLUgeb5wDWW', '2', NULL, NULL, NULL, 1, NULL, '2021-05-16 23:29:27', '2021-05-16 23:29:27'),
(25, 'test', 'test123@gmail.com', NULL, '$2y$10$iVzM6CwwRGYGuCFCk1UHh.bt5XfJeVHxR.2DFuywumuORGA3/2D8u', '2', NULL, NULL, NULL, 1, NULL, '2021-05-16 23:36:32', '2021-05-16 23:36:32'),
(26, 'testsample', 'sample@gmail.com', NULL, '$2y$10$4nKXlJbjQ2nEyYskjGasqen/L5kIiySF0O.v1BKCP3mMo/F0k5AkC', '2', NULL, NULL, NULL, 1, NULL, '2021-05-17 00:05:11', '2021-05-17 00:05:11'),
(27, 'final test', 'fina432@gmail.com', NULL, '$2y$10$tPmD6eO97DpgpsywHaWtoO8Aj76ouoPKmo.mqmay65kXUEeSe/Asi', '2', NULL, NULL, NULL, 1, NULL, '2021-05-17 03:01:48', '2021-05-17 03:01:48'),
(29, 'ajax test', 'ajaxtest@gmail.com', NULL, '$2y$10$Lnbvn.vU9uWmeLv8m1pRAuFFtnsWl3eIO7sAleeQka6tajgYtCWBm', '2', NULL, NULL, NULL, 1, NULL, '2021-05-17 05:51:19', '2021-05-17 05:51:19'),
(35, 'test', 'test24@gmail.com', NULL, '$2y$10$ar3Sayol6YKnZMqY0oFKpuT60DgMH9xqiDsf3TjN/2bzH0mFu4JWq', '2', NULL, NULL, NULL, 1, NULL, '2021-05-18 02:29:03', '2021-05-18 02:29:03'),
(36, 'testuser', 'user123@gmail.com', NULL, '$2y$10$3Da6/VTgBq3UZ6HkIK84He5hNEzCtP6Jt2NaDDJlGw8ZaoOtejXkm', '2', NULL, NULL, NULL, 1, NULL, '2021-05-18 05:50:00', '2021-05-18 05:50:00'),
(37, 'test', 'test244@gmail.com', NULL, '$2y$10$imzThxMIoAGHvwZpP6Z27.FU61FEEzwl8UJ0IFip6L6pdpzdVwn5K', '2', NULL, NULL, NULL, 1, NULL, '2021-05-18 14:58:49', '2021-05-18 14:58:49'),
(38, 'test', 'testr@gmail.com', NULL, '$2y$10$DmWOO1mlnD5NuP8zbj.ope2RBabqoNjnp8N9jjgaFkGBlE5zMT12G', '2', NULL, NULL, NULL, 0, NULL, '2021-05-18 15:01:34', '2021-05-24 10:01:32'),
(39, 'lasttest', 'last@gmail.com', NULL, '$2y$10$2QPInXvFGXXF6ycn0c3vB.MaLMtMD5U7waUGcJP7d0qPwE7FK5TzG', '2', NULL, NULL, NULL, 0, NULL, '2021-05-19 00:01:16', '2021-05-24 10:00:26'),
(40, 'last', 'last123@gmail.com', NULL, '$2y$10$iXUcFS2FFRGx03oKlUb/xO8wAmAxDi9uuwnjvaUV.KZfRPhESsD7e', '2', NULL, NULL, NULL, 0, NULL, '2021-05-19 00:03:17', '2021-05-20 07:49:51'),
(41, 'testUPDATE', 'test4667757@gmail.com', NULL, '$2y$10$2eYdYtdZIhK3GjAHzutQ3u7EUW0ZrxXRYrebZQQGUN6sgzKC6HDsm', '2', 987987, 'MANAGER', NULL, 0, NULL, '2021-05-19 01:43:26', '2021-05-24 10:00:06'),
(42, 'testfinaltesttest', 'testfinal9764@gmail.com', NULL, '$2y$10$MJqnGMN7yXQVJx7uFzsZJOGRybKeKR5/R2nCLh30hVgOnikgCPAxG', '2', 787865, 'manager', NULL, 0, NULL, '2021-05-19 07:10:39', '2021-05-24 09:59:47'),
(43, 'latest', 'last1235@gmail.com', NULL, '$2y$10$nDyEVl52msx864tWThTLkuhoIDUOQw.pzLo.nvUfeBYZyloAh8liy', '2', 76976987, 'manager', NULL, 0, NULL, '2021-05-20 01:14:45', '2021-05-24 09:58:50'),
(44, 'last test', 'testlast@gmial.com', NULL, '$2y$10$sIgJRCZuRj2k1U4dIxmT4.Dp7Ubhs2W7dHYCMAPoBliYUpxb1FsOG', '2', NULL, NULL, NULL, 1, NULL, '2021-05-26 02:20:50', '2021-05-26 02:20:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
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
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`Category_id`);

--
-- Indexes for table `Role`
--
ALTER TABLE `Role`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `Role`
--
ALTER TABLE `Role`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`Category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
