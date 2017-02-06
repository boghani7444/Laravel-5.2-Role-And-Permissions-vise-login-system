-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2016 at 07:47 AM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `role_permission`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2015_03_30_121557_entrust_setup_tables', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE IF NOT EXISTS `permissions` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `route` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `description`, `route`, `created_at`, `updated_at`) VALUES
(1, 'manage_roles', 'Manage roles', '', 'roles', '2016-12-16 06:14:25', '2016-12-16 06:14:25'),
(2, 'create_roles', 'Create roles', '', 'roles/create', '2016-12-16 06:14:25', '2016-12-16 06:14:25'),
(3, 'update_roles', 'Update roles', '', 'roles/{roles}/edit', '2016-12-16 06:14:25', '2016-12-16 06:14:25'),
(4, 'delete_roles', 'Delete roles', '', 'roles/{roles}', '2016-12-16 06:14:25', '2016-12-16 06:14:25'),
(5, 'manage_users', 'Manager users', '', 'users', '2016-12-16 06:14:25', '2016-12-16 06:14:25'),
(6, 'create_users', 'Create users', '', 'users/create', '2016-12-16 06:14:25', '2016-12-16 06:14:25'),
(7, 'update_users', 'Update users', '', 'users/{users}/edit', '2016-12-16 06:14:25', '2016-12-16 06:14:25'),
(8, 'delete_users', 'Delete users', '', 'users/{users}', '2016-12-16 06:14:25', '2016-12-16 06:14:25'),
(9, 'manage_permissions', 'Manage permissions', '', 'permissions', '2016-12-16 06:14:25', '2016-12-16 06:14:25'),
(10, 'create_permissions', 'Create permissions', '', 'permissions/create', '2016-12-16 06:14:25', '2016-12-16 06:14:25'),
(11, 'update_permissions', 'Update permissions', '', 'permissions/{permissions}/edit', '2016-12-16 06:14:25', '2016-12-16 06:14:25'),
(12, 'delete_permissions', 'Delete permissions', '', 'permissions/{permissions}', '2016-12-16 06:14:25', '2016-12-16 06:14:25'),
(13, 'role_permission', 'Manage Panel', '', NULL, '2016-12-19 00:57:25', '2016-12-19 00:57:25');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE IF NOT EXISTS `permission_role` (
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
(9, 2),
(10, 2),
(11, 2),
(12, 2),
(5, 4),
(6, 4),
(7, 4);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `level` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `level`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Administrator', NULL, 10, '2016-12-16 06:14:24', '2016-12-16 06:14:24'),
(2, 'accountant', 'Accountant', '', 5, '2016-12-16 06:14:24', '2016-12-19 00:16:52'),
(3, 'clark', 'Clark', '', 1, '2016-12-16 06:14:24', '2016-12-19 00:17:12'),
(4, 'Teacher', 'Teacher', '', 6, '2016-12-16 23:54:07', '2016-12-16 23:54:07'),
(5, 'parent', 'Parent', '', 7, '2016-12-19 00:23:45', '2016-12-19 00:24:21'),
(6, 'student', 'Student', '', 4, '2016-12-19 00:24:54', '2016-12-19 00:24:54'),
(7, 'school', 'School', 'school', 0, '2016-12-19 01:06:12', '2016-12-19 01:06:12');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE IF NOT EXISTS `role_user` (
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`user_id`, `role_id`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 7);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'admin@admin.com', '$2y$10$.2yyJKjIyvJ6yxLc9MUYOe6r0.o73zVRX7C06D8MrD46Vops6m6QG', '9zruU6kr6X6TIsciSTjfoPGMe0MANtM66PhMZAMvMXhVDwaPLNc2VWNB1Zda', '2016-12-16 06:14:23', '2016-12-19 01:08:15'),
(2, 'Accountant', 'accountant@gmail.com', '$2y$10$VlHjl5RSipWQcJ2G0mxsnOSlbKxD0JdZ/w49J1l6/cFWqWUwug63W', 'BWN866zrplUVN2euBgnJdOAjhRgVE965XxR3BdcSgCR8mSIpsAHc6nJliQLT', '2016-12-16 06:14:23', '2016-12-19 00:20:10'),
(3, 'Clark', 'clark@gmail.com', '$2y$10$7..6We51W5l/x83ada/KiOIHOCvUIjZNMFaXIsDeS0cY7llmGSQBy', 'R3pZMJPWQRSdAof7MN1tWpdxuGwESqpsoH3wfdfiV1JDug0TF4mVgLmFxhjN', '2016-12-16 06:14:23', '2016-12-19 00:20:39'),
(4, 'Teacher', 'teacher@gmail.com', '$2y$10$0ivubnyBT72aN6ysn8ueYuiRpN32ZYSrXjQ15qgw4FWKdmQbDzQ9i', 'xdwMAA2sMz2meGGGIyQ80EQnGzltES4jOMiG4QcZpXB2SBUYYC7oWiJuM5yY', '2016-12-17 00:02:14', '2016-12-19 01:01:14'),
(5, 'Parent', 'parent@gmail.com', '$2y$10$7LnGI5.v8B1ReniP0V.0aeixlRhiiPeHUX.4uhJO1bpwN/NFOZhA.', NULL, '2016-12-19 00:23:14', '2016-12-19 00:23:14'),
(6, 'School', 'school@gmail.com', '$2y$10$jvfngJNg7F8NDjxOWyDpaeWkP7AxYvAo0ECDCsW4nWMjDMktT1sou', NULL, '2016-12-19 01:05:43', '2016-12-19 01:08:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`), ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`), ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`user_id`,`role_id`), ADD KEY `role_user_role_id_foreign` (`role_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
