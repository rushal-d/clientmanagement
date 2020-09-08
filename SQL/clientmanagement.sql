-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 18, 2019 at 02:19 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clientmanagement`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category`, `created_at`, `updated_at`) VALUES
(1, 'High', '2019-07-09 00:26:43', '2019-07-09 00:26:43'),
(2, 'Medium', '2019-07-09 00:28:42', '2019-07-09 00:28:42'),
(3, 'Low', '2019-07-09 00:29:16', '2019-07-09 00:29:16');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `org_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `website` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_person_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notes` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `org_name`, `address`, `phone`, `website`, `contact_person_name`, `email`, `notes`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 'BMP', 'New Road', '984111323', 'bmp@gmail.com', 'rushal', 'dangolrujan@gmail.com', 'aeeeeeeeeeeeeeee', 1, '2019-07-09 01:16:38', '2019-07-09 01:16:38'),
(3, 'MVC', 'new york', '984111323', 'mvc@gmail.com', 'rujan', 'dangolru@gmail.com', 'xoxoxoxoxoxo', 2, '2019-07-09 02:39:05', '2019-07-09 02:39:05'),
(4, 'OOP', 'Washington', '984111323', 'oop@gmail.com', 'Amy', 'oo@gmail.com', 'its ok', 1, '2019-07-09 03:18:09', '2019-07-09 03:18:09'),
(5, 'Nine Nine', 'Brooklyn', '98411116', 'ninenine@gmail.com', 'amy', 'jake@gmail.com', 'okayyyyyy', 2, '2019-07-09 03:53:17', '2019-07-15 22:39:03');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `menu_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parameters` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `route` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `order` int(11) NOT NULL DEFAULT '0',
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `menu_name`, `parameters`, `route`, `display_name`, `parent_id`, `order`, `icon`, `created_at`, `updated_at`) VALUES
(9, 'role.index', NULL, NULL, 'Roles', 46, 3, NULL, '2019-01-02 04:19:13', '2019-01-02 04:47:33'),
(16, 'permission.index', NULL, NULL, 'Permission', 46, 4, NULL, '2019-01-02 04:19:25', '2019-01-02 04:47:33'),
(25, 'user.index', NULL, NULL, 'Users', 46, 2, NULL, '2019-01-02 03:46:06', '2019-01-02 04:47:16'),
(32, 'assignrole.index', NULL, NULL, 'Assign Permission', 46, 5, NULL, '2019-01-02 04:19:48', '2019-01-02 04:47:33'),
(46, '#usermanagement', NULL, NULL, 'User Management', 0, 7, NULL, '2019-01-02 03:41:37', '2019-07-16 23:35:46'),
(47, 'menu-index', NULL, NULL, 'Menu Builder', 46, 6, NULL, '2019-01-02 04:21:43', '2019-01-02 04:22:25'),
(82, 'category.create', NULL, NULL, 'Category', 0, 3, 'fas fa-certificate', '2019-07-16 00:47:35', '2019-07-16 22:35:03'),
(88, 'client.index', NULL, NULL, 'Client', 0, 4, 'fas fa-user', '2019-07-15 23:23:14', '2019-07-16 22:35:03'),
(95, 'servicetype.index', NULL, NULL, 'Service Types', 0, 5, 'fab fa-servicestack', '2019-07-16 00:37:15', '2019-07-16 22:35:03'),
(102, 'service.index', NULL, NULL, 'Services', 0, 6, 'fas fa-award', '2019-07-16 23:34:53', '2019-07-16 23:35:46');

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
(15, '2019_01_01_093925_entrust_setup_tables', 1),
(16, '2019_01_01_094121_alter_permissions_add_additional_fields', 1),
(17, '2019_01_01_100857_create_menus_table', 1),
(18, '2019_07_09_051300_create_categories_table', 2),
(19, '2019_07_09_061752_create_clients_table', 3),
(24, '2019_07_16_061747_create_servicetypes_table', 4),
(25, '2019_07_17_051158_create_services_table', 5),
(26, '2019_07_18_104737_make_columns_nullable', 6);

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `parent_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `order` int(11) NOT NULL DEFAULT '0',
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isURL` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`, `parent_id`, `order`, `icon`, `isURL`) VALUES
(1, 'login', NULL, NULL, '2019-01-02 00:27:35', '2019-01-02 00:31:57', 45, 2, NULL, 1),
(2, 'logout', NULL, NULL, '2019-01-02 00:27:35', '2019-01-02 00:31:58', 45, 3, NULL, 1),
(3, 'register', NULL, NULL, '2019-01-02 00:27:35', '2019-01-02 00:31:58', 45, 4, NULL, 1),
(4, 'password.request', NULL, NULL, '2019-01-02 00:27:35', '2019-01-02 00:31:58', 45, 5, NULL, 1),
(5, 'password.email', NULL, NULL, '2019-01-02 00:27:35', '2019-01-02 00:31:58', 45, 6, NULL, 1),
(6, 'password.reset', NULL, NULL, '2019-01-02 00:27:35', '2019-01-02 00:31:58', 45, 7, NULL, 1),
(7, 'password.update', NULL, NULL, '2019-01-02 00:27:35', '2019-01-02 00:31:58', 45, 8, NULL, 1),
(8, 'home', NULL, NULL, '2019-01-02 00:27:35', '2019-01-02 00:31:58', 0, 4, NULL, 1),
(9, 'role.index', NULL, NULL, '2019-01-02 00:27:35', '2019-01-02 04:21:04', 8, 9, NULL, 1),
(10, 'role.create', NULL, NULL, '2019-01-02 00:27:35', '2019-01-02 04:21:04', 9, 10, NULL, 1),
(11, 'role.store', NULL, NULL, '2019-01-02 00:27:35', '2019-01-02 04:21:04', 9, 11, NULL, 1),
(12, 'role.show', NULL, NULL, '2019-01-02 00:27:35', '2019-01-02 04:21:04', 9, 12, NULL, 1),
(13, 'role.edit', NULL, NULL, '2019-01-02 00:27:35', '2019-01-02 04:21:04', 9, 13, NULL, 1),
(14, 'role.update', NULL, NULL, '2019-01-02 00:27:35', '2019-01-02 04:21:04', 9, 14, NULL, 1),
(15, 'role.destroy', NULL, NULL, '2019-01-02 00:27:35', '2019-01-02 04:21:04', 9, 15, NULL, 1),
(16, 'permission.index', NULL, NULL, '2019-01-02 00:27:35', '2019-01-02 04:21:04', 8, 16, NULL, 1),
(17, 'permission.create', NULL, NULL, '2019-01-02 00:27:36', '2019-01-02 04:21:04', 16, 17, NULL, 1),
(18, 'permission.store', NULL, NULL, '2019-01-02 00:27:36', '2019-01-02 04:21:04', 16, 18, NULL, 1),
(19, 'permission.show', NULL, NULL, '2019-01-02 00:27:36', '2019-01-02 04:21:04', 16, 19, NULL, 1),
(20, 'permission.edit', NULL, NULL, '2019-01-02 00:27:36', '2019-01-02 04:21:04', 16, 20, NULL, 1),
(21, 'permission.update', NULL, NULL, '2019-01-02 00:27:36', '2019-01-02 04:21:04', 16, 21, NULL, 1),
(22, 'permission.destroy', NULL, NULL, '2019-01-02 00:27:36', '2019-01-02 04:21:04', 16, 22, NULL, 1),
(23, 'permission.add', NULL, NULL, '2019-01-02 00:27:36', '2019-01-02 04:21:04', 16, 23, NULL, 1),
(24, 'permission.addmenu', NULL, NULL, '2019-01-02 00:27:36', '2019-01-02 04:21:04', 16, 24, NULL, 1),
(25, 'user.index', NULL, NULL, '2019-01-02 00:27:36', '2019-01-02 04:21:04', 8, 25, NULL, 1),
(26, 'user.create', NULL, NULL, '2019-01-02 00:27:36', '2019-01-02 04:21:04', 25, 26, NULL, 1),
(27, 'user.store', NULL, NULL, '2019-01-02 00:27:36', '2019-01-02 04:21:04', 25, 27, NULL, 1),
(28, 'user.show', NULL, NULL, '2019-01-02 00:27:36', '2019-01-02 04:21:04', 25, 28, NULL, 1),
(29, 'user.edit', NULL, NULL, '2019-01-02 00:27:36', '2019-01-02 04:21:04', 25, 29, NULL, 1),
(30, 'user.update', NULL, NULL, '2019-01-02 00:27:36', '2019-01-02 04:21:04', 25, 30, NULL, 1),
(31, 'user.destroy', NULL, NULL, '2019-01-02 00:27:36', '2019-01-02 04:21:04', 25, 31, NULL, 1),
(32, 'assignrole.index', NULL, NULL, '2019-01-02 00:27:36', '2019-01-02 04:21:04', 8, 32, NULL, 1),
(33, 'assignrole.create', NULL, NULL, '2019-01-02 00:27:36', '2019-01-02 04:21:05', 32, 33, NULL, 1),
(34, 'assignrole.store', NULL, NULL, '2019-01-02 00:27:36', '2019-01-02 04:21:05', 32, 34, NULL, 1),
(35, 'assignrole.show', NULL, NULL, '2019-01-02 00:27:36', '2019-01-02 04:21:05', 32, 35, NULL, 1),
(36, 'assignrole.edit', NULL, NULL, '2019-01-02 00:27:36', '2019-01-02 04:21:05', 32, 36, NULL, 1),
(37, 'assignrole.update', NULL, NULL, '2019-01-02 00:27:36', '2019-01-02 04:21:05', 32, 37, NULL, 1),
(38, 'assignrole.destroy', NULL, NULL, '2019-01-02 00:27:36', '2019-01-02 04:21:05', 32, 38, NULL, 1),
(45, '#always', NULL, NULL, '2019-01-02 00:29:01', '2019-01-02 00:31:57', 0, 3, NULL, 0),
(46, '#usermanagement', NULL, NULL, '2019-01-02 03:40:56', '2019-01-02 04:21:03', 8, 2, NULL, 0),
(47, 'menu-index', NULL, NULL, '2019-01-02 04:20:27', '2019-01-02 04:21:03', 46, 3, NULL, 1),
(48, 'menu-store', NULL, NULL, '2019-01-02 04:20:27', '2019-01-02 04:21:03', 46, 4, NULL, 1),
(49, 'menu-build-menu', NULL, NULL, '2019-01-02 04:20:27', '2019-01-02 04:21:03', 46, 5, NULL, 1),
(50, 'menu-delete', NULL, NULL, '2019-01-02 04:20:27', '2019-01-02 04:21:04', 46, 6, NULL, 1),
(51, 'menu-search', NULL, NULL, '2019-01-02 04:20:27', '2019-01-02 04:21:04', 46, 7, NULL, 1),
(52, 'display-name-store', NULL, NULL, '2019-01-02 04:20:27', '2019-01-02 04:21:04', 46, 8, NULL, 1),
(81, 'category.index', NULL, NULL, '2019-07-15 23:22:57', '2019-07-15 23:22:57', 0, 0, NULL, 1),
(82, 'category.create', NULL, NULL, '2019-07-15 23:22:57', '2019-07-15 23:22:57', 0, 0, NULL, 1),
(83, 'category.store', NULL, NULL, '2019-07-15 23:22:57', '2019-07-15 23:22:57', 0, 0, NULL, 1),
(84, 'category.show', NULL, NULL, '2019-07-15 23:22:57', '2019-07-15 23:22:57', 0, 0, NULL, 1),
(85, 'category.edit', NULL, NULL, '2019-07-15 23:22:57', '2019-07-15 23:22:57', 0, 0, NULL, 1),
(86, 'category.update', NULL, NULL, '2019-07-15 23:22:57', '2019-07-15 23:22:57', 0, 0, NULL, 1),
(87, 'category.destroy', NULL, NULL, '2019-07-15 23:22:57', '2019-07-15 23:22:57', 0, 0, NULL, 1),
(88, 'client.index', NULL, NULL, '2019-07-15 23:22:57', '2019-07-15 23:22:57', 0, 0, NULL, 1),
(89, 'client.create', NULL, NULL, '2019-07-15 23:22:57', '2019-07-15 23:22:57', 0, 0, NULL, 1),
(90, 'client.store', NULL, NULL, '2019-07-15 23:22:57', '2019-07-15 23:22:57', 0, 0, NULL, 1),
(91, 'client.show', NULL, NULL, '2019-07-15 23:22:57', '2019-07-15 23:22:57', 0, 0, NULL, 1),
(92, 'client.edit', NULL, NULL, '2019-07-15 23:22:57', '2019-07-15 23:22:57', 0, 0, NULL, 1),
(93, 'client.update', NULL, NULL, '2019-07-15 23:22:57', '2019-07-15 23:22:57', 0, 0, NULL, 1),
(94, 'client.destroy', NULL, NULL, '2019-07-15 23:22:57', '2019-07-15 23:22:57', 0, 0, NULL, 1),
(95, 'servicetype.index', NULL, NULL, '2019-07-16 00:36:41', '2019-07-16 00:36:41', 0, 0, NULL, 1),
(96, 'servicetype.create', NULL, NULL, '2019-07-16 00:36:41', '2019-07-16 00:36:41', 0, 0, NULL, 1),
(97, 'servicetype.store', NULL, NULL, '2019-07-16 00:36:41', '2019-07-16 00:36:41', 0, 0, NULL, 1),
(98, 'servicetype.show', NULL, NULL, '2019-07-16 00:36:41', '2019-07-16 00:36:41', 0, 0, NULL, 1),
(99, 'servicetype.edit', NULL, NULL, '2019-07-16 00:36:41', '2019-07-16 00:36:41', 0, 0, NULL, 1),
(100, 'servicetype.update', NULL, NULL, '2019-07-16 00:36:41', '2019-07-16 00:36:41', 0, 0, NULL, 1),
(101, 'servicetype.destroy', NULL, NULL, '2019-07-16 00:36:41', '2019-07-16 00:36:41', 0, 0, NULL, 1),
(102, 'service.index', NULL, NULL, '2019-07-16 23:34:39', '2019-07-16 23:34:39', 0, 0, NULL, 1),
(103, 'service.create', NULL, NULL, '2019-07-16 23:34:40', '2019-07-16 23:34:40', 0, 0, NULL, 1),
(104, 'service.store', NULL, NULL, '2019-07-16 23:34:40', '2019-07-16 23:34:40', 0, 0, NULL, 1),
(105, 'service.show', NULL, NULL, '2019-07-16 23:34:40', '2019-07-16 23:34:40', 0, 0, NULL, 1),
(106, 'service.edit', NULL, NULL, '2019-07-16 23:34:40', '2019-07-16 23:34:40', 0, 0, NULL, 1),
(107, 'service.update', NULL, NULL, '2019-07-16 23:34:40', '2019-07-16 23:34:40', 0, 0, NULL, 1),
(108, 'service.destroy', NULL, NULL, '2019-07-16 23:34:40', '2019-07-16 23:34:40', 0, 0, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(38, 1),
(46, 1),
(47, 1),
(48, 1),
(49, 1),
(50, 1),
(51, 1),
(52, 1),
(82, 1),
(88, 1),
(95, 1),
(102, 1);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'Admin', NULL, '2019-01-01 23:26:40', '2019-01-01 23:26:40');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`user_id`, `role_id`) VALUES
(1, 1),
(2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `servicetype_id` int(10) UNSIGNED NOT NULL,
  `recurring_stat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `recurring_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` double(8,2) NOT NULL,
  `notes` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expiry_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `client_id`, `date`, `servicetype_id`, `recurring_stat`, `recurring_type`, `amount`, `notes`, `expiry_date`, `created_at`, `updated_at`) VALUES
(9, 5, '2019-07-18', 4, 'Yes', '1', 90000.00, NULL, '2020-07-18', '2019-07-18 00:19:32', '2019-07-18 01:30:18'),
(10, 1, '2019-07-18', 3, 'No', NULL, 90000.00, 'design a website for the company', NULL, '2019-07-18 00:19:59', '2019-07-18 00:19:59');

-- --------------------------------------------------------

--
-- Table structure for table `servicetypes`
--

CREATE TABLE `servicetypes` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `servicetypes`
--

INSERT INTO `servicetypes` (`id`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Web Hosting', 'This section is for web hosting.', '2019-07-16 23:52:46', '2019-07-16 23:52:46'),
(3, 'Web Designing', 'Thisssssssssssssssssssssssssssss', '2019-07-18 00:17:30', '2019-07-18 00:17:30'),
(4, 'Mobile App Developement', 'Mobile', '2019-07-18 00:17:55', '2019-07-18 00:17:55');

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
(1, 'BMP Infology', 'bmp@bmpinfology.com', NULL, '$2y$10$6O3rASyZ2cCHjatm.gf4buHUO7fXvyIpFCPxmlWvlmMNFA9ws4u3C', 'F5uqpyRLHlehqtUtAFYWy50fSgDzelRz6ZZPcljjSUHC6Ntr5qIf3kL2BneB', '2019-01-02 00:18:20', '2019-01-02 04:54:51'),
(2, 'Shree', 'shree@bmpinfology.com', NULL, '$2y$10$/oYB4p96Db9oz0KHY79.VOgvr2kgtUkRkdC83..VAmPm3datl64sO', NULL, '2019-01-02 00:18:55', '2019-01-02 00:18:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `clients_category_id_foreign` (`category_id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
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
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `services_client_id_foreign` (`client_id`),
  ADD KEY `services_servicetype_id_foreign` (`servicetype_id`);

--
-- Indexes for table `servicetypes`
--
ALTER TABLE `servicetypes`
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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `servicetypes`
--
ALTER TABLE `servicetypes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `clients`
--
ALTER TABLE `clients`
  ADD CONSTRAINT `clients_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `services`
--
ALTER TABLE `services`
  ADD CONSTRAINT `services_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`),
  ADD CONSTRAINT `services_servicetype_id_foreign` FOREIGN KEY (`servicetype_id`) REFERENCES `servicetypes` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
