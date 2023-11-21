-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 21, 2023 at 03:59 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_daily_reports`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_11_02_154217_create_permission_tables', 1),
(6, '2023_11_03_065938_create_reports_table', 2),
(7, '2023_11_03_070245_create_settings_table', 2),
(9, '2023_11_03_072336_add_description_to_reports', 3),
(11, '2023_11_03_121025_create_tasks_table', 4),
(12, '2023_11_21_033743_add_on_delete_to_tasks_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_permissions`
--

INSERT INTO `model_has_permissions` (`permission_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 2),
(2, 'App\\Models\\User', 2),
(3, 'App\\Models\\User', 2),
(4, 'App\\Models\\User', 2),
(1, 'App\\Models\\User', 3),
(2, 'App\\Models\\User', 3),
(3, 'App\\Models\\User', 3),
(4, 'App\\Models\\User', 3);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 2),
(2, 'App\\Models\\User', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Create Reports', 'web', '2023-11-03 20:52:01', '2023-11-03 20:52:01'),
(2, 'View Reports', 'web', '2023-11-03 20:52:14', '2023-11-03 20:52:14'),
(3, 'Update Reports', 'web', '2023-11-03 20:52:26', '2023-11-03 20:52:26'),
(4, 'Delete Reports', 'web', '2023-11-03 20:52:31', '2023-11-03 20:52:31'),
(5, 'View Permissions', 'web', NULL, NULL),
(6, 'Update Permissions', 'web', NULL, NULL),
(7, 'Create Permissions', 'web', NULL, NULL),
(8, 'Delete Permissions', 'web', NULL, NULL),
(9, 'View Settings', 'web', NULL, NULL),
(10, 'Update Settings', 'web', NULL, NULL),
(11, 'Create Settings', 'web', NULL, NULL),
(12, 'Delete Settings', 'web', NULL, NULL),
(13, 'View Roles', 'web', NULL, NULL),
(14, 'Update Roles', 'web', NULL, NULL),
(15, 'Create Roles', 'web', NULL, NULL),
(16, 'Delete Roles', 'web', NULL, NULL),
(17, 'View Users', 'web', NULL, NULL),
(18, 'Update Users', 'web', NULL, NULL),
(19, 'Create Users', 'web', NULL, NULL),
(20, 'Delete Users', 'web', NULL, NULL),
(21, 'Create Tasks', 'web', '2023-11-20 20:07:37', '2023-11-20 20:08:02'),
(22, 'View Tasks', 'web', '2023-11-20 20:08:23', '2023-11-20 20:08:23'),
(23, 'Update Tasks', 'web', '2023-11-20 20:08:30', '2023-11-20 20:08:30'),
(24, 'Delete Tasks', 'web', '2023-11-20 20:08:35', '2023-11-20 20:08:35');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 1, 'auth-token', '9c9790cbffc6592f22da9d7dbbbf37287d83c6cb606fb33d8c0f5928ace03410', '[\"*\"]', '2023-11-03 22:27:18', NULL, '2023-11-03 22:14:57', '2023-11-03 22:27:18'),
(2, 'App\\Models\\User', 1, 'myAppToken', 'b8e622da714c7c8314681ced0633d902f6e1f463549baa214da3d45d124fce6b', '[\"*\"]', '2023-11-05 20:55:29', NULL, '2023-11-03 23:03:10', '2023-11-05 20:55:29'),
(3, 'App\\Models\\User', 1, 'myAppToken', '7e71fcd798085b6079c43fc23ed3dfa8a01d60c7d343cf2a2acd60455ad57b72', '[\"*\"]', NULL, NULL, '2023-11-03 23:31:22', '2023-11-03 23:31:22'),
(4, 'App\\Models\\User', 1, 'myAppToken', '3474b8180bf80033f21f13da9ab33c88e6fc0b704cd3847d8945440bd125fa8e', '[\"*\"]', NULL, NULL, '2023-11-03 23:33:25', '2023-11-03 23:33:25'),
(5, 'App\\Models\\User', 1, 'myAppToken', '95a1f56b5cf312fe41806e59303921bd929f0f53cecf156f3283910a5cd4aa96', '[\"*\"]', NULL, NULL, '2023-11-04 19:48:37', '2023-11-04 19:48:37'),
(6, 'App\\Models\\User', 1, 'myAppToken', '02e63a8da89abb51fdcb2b4464f0992a505ac9153b7c58b22fc79fa4d8894265', '[\"*\"]', NULL, NULL, '2023-11-04 19:49:39', '2023-11-04 19:49:39'),
(7, 'App\\Models\\User', 1, 'myAppToken', 'd2046cc3c111464c06af51b58fcf31bfef02c73302c7c64d4295ae3799525863', '[\"*\"]', NULL, NULL, '2023-11-04 20:14:53', '2023-11-04 20:14:53'),
(8, 'App\\Models\\User', 1, 'myAppToken', '7f626f7f5ee016098c14949f1ccf83bf8d448a4967a06f412f656f10aecec8e1', '[\"*\"]', NULL, NULL, '2023-11-04 20:16:15', '2023-11-04 20:16:15'),
(9, 'App\\Models\\User', 1, 'myAppToken', '695952c8ce4e7e9bde96cbffa52fb3facf98faff71a8f5c55fd2a20551fbaa4c', '[\"*\"]', NULL, NULL, '2023-11-04 21:02:43', '2023-11-04 21:02:43'),
(10, 'App\\Models\\User', 1, 'myAppToken', 'a50ff7479b4180124c004c8d553b2c38d3c256202a37c518b9cf385f77b148cd', '[\"*\"]', '2023-11-06 08:03:36', NULL, '2023-11-05 20:55:46', '2023-11-06 08:03:36'),
(11, 'App\\Models\\User', 1, 'myAppToken', 'b319192ec5efce820c7e5aa82268a36d57f5d3dcc1f3ee0ddfe71b9473c57e1c', '[\"*\"]', NULL, NULL, '2023-11-05 23:00:43', '2023-11-05 23:00:43'),
(12, 'App\\Models\\User', 1, 'myAppToken', 'b8bc888c615a7945d859e4830b44f03d649caa809d5f27909e766aa0d157ceef', '[\"*\"]', '2023-11-05 23:05:44', NULL, '2023-11-05 23:05:41', '2023-11-05 23:05:44'),
(13, 'App\\Models\\User', 1, 'myAppToken', '29155b182f6b4f425f1ead80e37c6c71029d87b0bc61bc823d3911857499d362', '[\"*\"]', '2023-11-05 23:20:33', NULL, '2023-11-05 23:20:31', '2023-11-05 23:20:33'),
(14, 'App\\Models\\User', 1, 'myAppToken', '3a25e0839cb05fda18098920cb57a759e83d27332707ac9676563e5f5f8b573e', '[\"*\"]', '2023-11-05 23:25:59', NULL, '2023-11-05 23:25:57', '2023-11-05 23:25:59'),
(15, 'App\\Models\\User', 1, 'myAppToken', 'ec9b26d32bcd92dec97eb643af14a53e34c34a267767e55d955006a275ad4fb4', '[\"*\"]', '2023-11-05 23:28:07', NULL, '2023-11-05 23:28:06', '2023-11-05 23:28:07'),
(16, 'App\\Models\\User', 1, 'myAppToken', '79c3c18c17b6f4b1315054c3d8c58515d8f1fea4fe7f8cd06aefa6a4d0fe5844', '[\"*\"]', '2023-11-05 23:29:21', NULL, '2023-11-05 23:29:20', '2023-11-05 23:29:21'),
(17, 'App\\Models\\User', 1, 'myAppToken', '8839dd888fdcf7c449ae8dce06650bf29a9a6eae489c5a39412c5209b2424c1e', '[\"*\"]', '2023-11-05 23:49:07', NULL, '2023-11-05 23:49:05', '2023-11-05 23:49:07'),
(18, 'App\\Models\\User', 1, 'myAppToken', '8ff133f7f3be92dddf14a3ee34fa73f0cf963ce6efaa2b71d3f2b4ca3892d221', '[\"*\"]', '2023-11-05 23:51:32', NULL, '2023-11-05 23:51:29', '2023-11-05 23:51:32'),
(19, 'App\\Models\\User', 1, 'myAppToken', 'ddb0f32397df6d31255151bf47f70b7026c93a1ab3a3ffdf74fc6803bf060ae1', '[\"*\"]', '2023-11-05 23:55:02', NULL, '2023-11-05 23:54:56', '2023-11-05 23:55:02'),
(20, 'App\\Models\\User', 1, 'myAppToken', '07069337dc690ed20e821abb506863fed5887387d3f12f989fb552c83ac9cbbd', '[\"*\"]', '2023-11-05 23:57:31', NULL, '2023-11-05 23:57:28', '2023-11-05 23:57:31'),
(21, 'App\\Models\\User', 1, 'myAppToken', 'a89668793975a53684756a21efa671dc33b8fd395555090e8fc70a04c042251a', '[\"*\"]', '2023-11-06 00:20:25', NULL, '2023-11-06 00:20:22', '2023-11-06 00:20:25'),
(22, 'App\\Models\\User', 1, 'myAppToken', '70b48e6c83ea58c2f074afe50f2077f1fa486f3ef4607abf8db87345e34e6bc8', '[\"*\"]', '2023-11-06 01:15:24', NULL, '2023-11-06 01:15:21', '2023-11-06 01:15:24'),
(23, 'App\\Models\\User', 1, 'myAppToken', '137fb760c98ababd6ab6c8f784aaee7ae7f1f5d4c967bb00808c4fdf9d2597a5', '[\"*\"]', '2023-11-06 01:17:37', NULL, '2023-11-06 01:17:35', '2023-11-06 01:17:37'),
(24, 'App\\Models\\User', 1, 'myAppToken', '9f615603bf1f4b84d8889eb51b303700eeb1d352b52f0d145dfd5960fd68dc76', '[\"*\"]', '2023-11-06 01:19:15', NULL, '2023-11-06 01:19:13', '2023-11-06 01:19:15'),
(25, 'App\\Models\\User', 1, 'myAppToken', '97900f0f91b42dc07f90a2847aef97d89770c90c0afd6ae6815929ee25bf8d00', '[\"*\"]', NULL, NULL, '2023-11-06 01:20:21', '2023-11-06 01:20:21'),
(26, 'App\\Models\\User', 1, 'myAppToken', '2a843b174f78e225ca0224cbd4cd409aaaa1d5162ab74b877cdb5b01cc5ca66c', '[\"*\"]', NULL, NULL, '2023-11-06 01:22:34', '2023-11-06 01:22:34'),
(27, 'App\\Models\\User', 1, 'myAppToken', 'b1f5b06992a802751eb736c76d17431a21499f59a2073788fa6ade46229e2a02', '[\"*\"]', '2023-11-06 01:23:05', NULL, '2023-11-06 01:22:59', '2023-11-06 01:23:05'),
(28, 'App\\Models\\User', 1, 'myAppToken', 'e2a6328d87d4e47a1970c3c313430354a9537107a08fa390f00da5b909140f97', '[\"*\"]', NULL, NULL, '2023-11-06 03:40:51', '2023-11-06 03:40:51'),
(29, 'App\\Models\\User', 1, 'myAppToken', 'd83e91b507ef82e253bc514f5b1d4a518e697ceebbf711e3cc1525e5a88a4b44', '[\"*\"]', '2023-11-06 04:12:58', NULL, '2023-11-06 03:48:33', '2023-11-06 04:12:58'),
(30, 'App\\Models\\User', 1, 'myAppToken', '5a91b0f9f3f123690f400c936665a79ff9431d9c873b9180712b6d7b59fce760', '[\"*\"]', '2023-11-06 04:45:34', NULL, '2023-11-06 04:44:19', '2023-11-06 04:45:34'),
(31, 'App\\Models\\User', 1, 'myAppToken', '52d77c6ee7f25012b1e7b6537785503ec2216d11ea685607650b2aa1499b335a', '[\"*\"]', '2023-11-06 09:10:46', NULL, '2023-11-06 05:23:00', '2023-11-06 09:10:46'),
(32, 'App\\Models\\User', 1, 'myAppToken', 'dbad950fdcae5e3404b92054fc12817c3145f170755ddd3c6f59c8f9b0950071', '[\"*\"]', '2023-11-06 09:22:08', NULL, '2023-11-06 09:16:24', '2023-11-06 09:22:08'),
(33, 'App\\Models\\User', 1, 'myAppToken', 'febf3d22d09866abb97012a14f88ff9f80c14811bcd1e8ba8ada926655c5af98', '[\"*\"]', '2023-11-06 10:29:21', NULL, '2023-11-06 09:28:02', '2023-11-06 10:29:21'),
(34, 'App\\Models\\User', 1, 'myAppToken', '7670d0f38f550d33fe6acf5bf7022ea2b38d4531aa4a22b7ac437c89e3abfb1a', '[\"*\"]', '2023-11-06 10:43:05', NULL, '2023-11-06 10:37:34', '2023-11-06 10:43:05'),
(35, 'App\\Models\\User', 1, 'myAppToken', '2f482d0021500ad3c2488e1a16a23a28c4863104b8f3861fc55254bfc8fdcfec', '[\"*\"]', '2023-11-06 12:20:01', NULL, '2023-11-06 11:19:44', '2023-11-06 12:20:01');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` bigint UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `type` enum('Morning','Afternoon') COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `date`, `type`, `user_id`, `created_at`, `updated_at`) VALUES
(2, '2023-11-03', 'Morning', 1, '2023-11-03 06:03:37', '2023-11-03 06:03:37'),
(3, '2023-11-03', 'Morning', 1, '2023-11-04 01:31:03', '2023-11-04 01:31:03'),
(4, '2023-11-06', 'Morning', 1, '2023-11-06 06:25:24', '2023-11-06 06:25:24'),
(6, '2023-11-05', 'Afternoon', 1, '2023-11-06 06:45:22', '2023-11-06 07:39:29'),
(7, '2023-11-21', 'Morning', 1, '2023-11-20 19:24:19', '2023-11-20 19:24:19');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'web', '2023-11-02 23:27:39', '2023-11-02 23:27:39'),
(2, 'User', 'web', '2023-11-03 20:52:57', '2023-11-03 20:52:57');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 2),
(2, 2),
(3, 2),
(4, 2),
(21, 2),
(22, 2),
(23, 2),
(24, 2);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `server` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name`, `logo`, `server`, `created_at`, `updated_at`) VALUES
(1, 'Daily Report DISKOMINFO', 'reports/01HEC02J4YGR0E9K4TY2G73WYH.png', 'http://127.0.0.1:8000/', '2023-11-03 18:45:03', '2023-11-03 18:45:03');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` bigint UNSIGNED NOT NULL,
  `division` enum('Umum','Publik','E-Gov') COLLATE utf8mb4_unicode_ci NOT NULL,
  `task` enum('No Task','Belum','Selesai') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'No Task',
  `description` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `report_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
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
(1, 'Admin', 'admin@gmail.com', '2023-11-02 23:27:38', '$2y$12$YD33pi9lVDFLZ4twfvqbEOrTYyD0hAKz.A7xhCW.yJbfhKJ44dHC2', 'rAxd9IEM0FPd9qfZkCvSzb2HidwTGcfd3d6J19Jrm3m4HcwEytxR3uDAcH4b', '2023-11-02 23:27:39', '2023-11-02 23:27:39'),
(2, 'User Baru', 'user@gmail.com', '2023-11-04 03:53:15', '$2y$12$PvJ9agqUw4ffYDzeCBhfJ.EeIkul6DwLU1RjROWt15aWh/sIHhiL6', NULL, '2023-11-03 20:53:31', '2023-11-03 20:53:31'),
(3, 'User', 'user10@gmail.com', '2023-11-08 09:32:28', '$2y$12$/FV.kkl1JVmbm7kjZcQ4u.zykhAyUoe5UEdaKJxJRg6m.vYX7bL7.', NULL, '2023-11-08 02:33:25', '2023-11-20 20:11:23');

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
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reports_user_id_foreign` (`user_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `report_id` (`report_id`);

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
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reports`
--
ALTER TABLE `reports`
  ADD CONSTRAINT `reports_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_ibfk_1` FOREIGN KEY (`report_id`) REFERENCES `reports` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
