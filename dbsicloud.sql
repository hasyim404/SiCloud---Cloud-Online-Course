-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 30, 2022 at 08:11 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbsicloud`
--

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_course` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi_course` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `nama_course`, `deskripsi_course`, `foto`, `created_at`, `updated_at`) VALUES
(8, 'AWS Academy - Cloud Foundation', 'Berisikan tentang materi dan video dari AWS Academy Cloud Foundation', 'banner-AWS Academy - Cloud Foundation.png', '2022-12-08 05:55:43', '2022-12-08 05:55:43'),
(9, 'AWS Academy - Machine Learning Foundation', 'Berisikan tentang materi dan video dari AWS Academy Cloud Foundation', 'banner-AWS Academy - Machine Learning Foundation.png', '2022-12-08 05:57:58', '2022-12-14 07:08:13'),
(11, 'Testing Course 120 - Update', 'Test Isi Deskripsi Course 120 - Update', NULL, '2022-12-14 06:58:08', '2022-12-14 07:06:55');

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
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isi_feedback` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `nama`, `email`, `isi_feedback`, `course_id`, `created_at`, `updated_at`) VALUES
(3, 'Si Tukang Suruh', 'okeokejek12@gmail.com', 'Harus ini itu dulu', 2, '2022-12-03 10:14:11', '2022-12-03 10:14:23'),
(4, 'Muhammad Ismail', 'muhaisim7@gmail.com', 'Test isi feedback 123', 8, '2022-12-08 11:49:13', '2022-12-08 11:49:13'),
(6, 'Muhammad Ismail', 'muhaisim7@gmail.com', 'Test isi feedback 1122f', 9, '2022-12-08 11:53:05', '2022-12-08 11:53:05'),
(7, 'Muhammad Ismail', 'muhaisim7@gmail.com', 'fghfgfhfgh', 8, '2022-12-11 07:25:28', '2022-12-11 07:25:28');

-- --------------------------------------------------------

--
-- Table structure for table `filemateri`
--

CREATE TABLE `filemateri` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pdfmateri` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `modul_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `filemateri`
--

INSERT INTO `filemateri` (`id`, `pdfmateri`, `modul_id`, `created_at`, `updated_at`) VALUES
(32, 'Introduction - Student Guide.pdf', 7, '2022-12-11 06:44:45', '2022-12-11 06:44:45'),
(35, 'Cloud Concepts Overview - Student Guide.pdf', 8, '2022-12-19 06:05:34', '2022-12-19 06:05:34'),
(36, 'Cloud Economics and Billing - Student Guide.pdf', 9, '2022-12-19 06:50:08', '2022-12-19 06:50:08'),
(37, 'AWS Global Infrastructure Overview - Student Guide.pdf', 10, '2022-12-19 06:51:27', '2022-12-19 06:51:27'),
(38, 'AWS Cloud Security - Student Guide.pdf', 11, '2022-12-19 06:52:26', '2022-12-19 06:52:26'),
(39, 'Networking and Content Delivery - Student Guide.pdf', 12, '2022-12-19 06:53:17', '2022-12-19 06:53:17'),
(40, 'Compute - Student Guide.pdf', 13, '2022-12-19 06:54:56', '2022-12-19 06:54:56'),
(41, 'Storage - Student Guide.pdf', 14, '2022-12-19 06:55:46', '2022-12-19 06:55:46'),
(42, 'Databases - Student Guide.pdf', 15, '2022-12-19 06:56:42', '2022-12-19 06:56:42'),
(43, 'Cloud Architecture - Student Guide.pdf', 16, '2022-12-19 06:57:34', '2022-12-19 06:57:34'),
(44, 'Auto Scaling and Monitoring - Student Guide.pdf', 17, '2022-12-19 06:58:38', '2022-12-19 06:58:38'),
(45, 'Welcome to AWS Academy Machine Learning Foundations - Student Guide.pdf', 20, '2022-12-19 07:26:13', '2022-12-19 07:26:13');

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
(11, '2014_10_12_000000_create_users_table', 1),
(12, '2014_10_12_100000_create_password_resets_table', 1),
(13, '2019_08_19_000000_create_failed_jobs_table', 1),
(14, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(15, '2022_11_13_115012_create_course_table', 1),
(16, '2022_11_13_115153_create_feedback_table', 1),
(17, '2022_11_15_155905_create_testimoni_table', 1),
(18, '2022_11_15_160318_create_modul_table', 1),
(19, '2022_11_15_160825_create_filemateri_table', 1),
(20, '2022_11_15_160958_create_videomateri_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `modul`
--

CREATE TABLE `modul` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jdl_modul` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_id` int(11) NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `modul`
--

INSERT INTO `modul` (`id`, `jdl_modul`, `course_id`, `deskripsi`, `created_at`, `updated_at`) VALUES
(7, 'Introduction (AWS Cloud)', 8, 'Pengenalan materi yang akan dibahas pada course AWS Cloud Foundation', '2022-12-08 06:08:30', '2022-12-11 07:26:22'),
(8, 'Modul 1 -  Cloud Concecpts Overview', 8, NULL, '2022-12-08 06:09:04', '2022-12-08 06:09:04'),
(9, 'Modul 2 - Cloud Economics and Billing', 8, NULL, '2022-12-08 06:09:24', '2022-12-08 06:09:24'),
(10, 'Modul 3 - AWS Global Infrastructure Overview', 8, NULL, '2022-12-08 06:09:36', '2022-12-08 06:09:36'),
(11, 'Modul 4 - AWS Cloud Security', 8, NULL, '2022-12-08 06:09:50', '2022-12-08 06:10:02'),
(12, 'Modul 5 - Networking and Content Delivery', 8, NULL, '2022-12-08 06:10:17', '2022-12-08 06:10:17'),
(13, 'Modul 6 - Compute', 8, NULL, '2022-12-08 06:10:29', '2022-12-08 06:10:29'),
(14, 'Modul 7 - Storage', 8, NULL, '2022-12-08 06:10:38', '2022-12-08 06:10:38'),
(15, 'Modul 8 - Databases', 8, NULL, '2022-12-08 06:11:25', '2022-12-08 06:11:25'),
(16, 'Modul 9 - Cloud Architecture', 8, NULL, '2022-12-08 06:11:35', '2022-12-08 06:11:35'),
(17, 'Modul 10 - Auto Scaling and Monitoring', 8, NULL, '2022-12-08 06:11:44', '2022-12-08 06:11:44'),
(19, 'Modul 2 - Introducing Machine Learning', 9, NULL, '2022-12-08 06:15:09', '2022-12-08 06:15:09'),
(20, 'Modul 1 - Welcome to AWS Academy Machine Learning Foundations', 9, NULL, '2022-12-08 06:15:26', '2022-12-08 06:15:26'),
(21, 'Modul 3 - Implementing a Machine Learning pipeline with Amazon SageMaker', 9, NULL, '2022-12-08 06:15:38', '2022-12-08 06:15:38'),
(22, 'Modul 4 - Introducing Forecasting', 9, NULL, '2022-12-08 06:15:51', '2022-12-08 06:15:51'),
(23, 'Modul 5 - Introducing Computer Vision (CV)', 9, NULL, '2022-12-08 06:16:01', '2022-12-08 06:16:01'),
(24, 'Modul 6 - Introducing Natural Language Processing', 9, NULL, '2022-12-08 06:16:11', '2022-12-08 06:16:11'),
(27, 'Testing Judul API1 - Update', 99, NULL, '2022-12-14 05:34:26', '2022-12-14 07:23:12');

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

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(9, 'App\\Models\\User', 18, 'token', 'dd0b6907b420f5c5f54d1cc1e9f951a6e13e1b2d44d8d1c72bea159a3a37f94e', '[\"*\"]', '2022-12-12 21:15:04', NULL, '2022-12-12 21:01:49', '2022-12-12 21:15:04'),
(10, 'App\\Models\\User', 1, 'token', '7b2a38ba506336b30350fd0530228f0ea95bb7b5129912aada57a579b113c887', '[\"*\"]', '2022-12-12 21:15:13', NULL, '2022-12-12 21:03:30', '2022-12-12 21:15:13'),
(11, 'App\\Models\\User', 1, 'token', 'c3e2088ba4fdcfab4bceca342b989b26f692f083e900eae28cfdc72699d24907', '[\"*\"]', '2022-12-19 04:50:19', NULL, '2022-12-13 09:05:41', '2022-12-19 04:50:19'),
(12, 'App\\Models\\User', 18, 'token', 'e7fb8edb30912699d976d6664262d38449241da8cfe01015fb5488a859655a8f', '[\"*\"]', '2022-12-14 06:02:18', NULL, '2022-12-13 09:10:56', '2022-12-14 06:02:18');

-- --------------------------------------------------------

--
-- Table structure for table `testimoni`
--

CREATE TABLE `testimoni` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isi_pesan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `foto` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimoni`
--

INSERT INTO `testimoni` (`id`, `nama`, `email`, `isi_pesan`, `status`, `foto`, `created_at`, `updated_at`) VALUES
(3, 'Julkipli Hasan', 'hasjul@gmail.com', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum, animi doloremque accusantium corrupti, suscipit quo assumenda eaque, eum ipsum tenetur dolores ipsa error quam! Doloribus blanditiis nostrum culpa sapiente vero.', 1, '', '2022-12-02 09:40:16', '2022-12-03 06:46:03'),
(6, 'Odin Temulawak', 'temulawak@gmail.com', 'Benar benar gratis untuk mengakses materinya!', 1, 'pict-temulawak.jpg', '2022-12-03 07:23:42', '2022-12-19 05:20:29'),
(14, 'Muhammad Ismail', 'muhaisim7@gmail.com', 'Wow materi yang di berikan jarang aku temukan sebelumnya, mantap!!', 1, 'pict-sunmali.png', '2022-12-05 10:37:45', '2022-12-19 05:19:54'),
(16, 'Taufik Saripudin', 'taudin@gmail.com', 'Kerreeen', 0, '', '2022-12-11 07:56:30', '2022-12-11 07:56:30');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `f_name` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `l_name` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Pelajar','Mahasiswa','Pekerja','Lainnya') COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` enum('Base','Admin') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Base',
  `isactive` tinyint(1) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `f_name`, `l_name`, `no_telp`, `username`, `email`, `email_verified_at`, `password`, `status`, `foto`, `role`, `isactive`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Muhammad', 'Ismail', '089687601023', 'sunmali', 'muhaisim7@gmail.com', NULL, '$2y$10$vW8u0sHZUNIslDGqU8EaHeeDPILk7i7Ju2dp3KyvGGG52fBXsl8SG', 'Mahasiswa', 'pict-sunmali.png', 'Admin', 1, 'zbRvHgI21bwRer87ai0hbrd0qiNUHPoWyFFG6njV6cFXhianOAJIovkPS6gY', '2022-11-25 09:48:45', '2022-12-18 05:07:19'),
(2, 'Jannah', 'Azizah', '08995588473453', 'jannah', 'jannah@gmail.com', NULL, '$2y$10$xhjr2fV6CQ1/.EIjBO6ZNuYB1XFPWOloeWJOuuS.9QubF5DUFAyIO', 'Pekerja', '', 'Base', 1, NULL, '2022-11-25 10:31:52', '2022-11-25 11:02:57'),
(3, 'Real', 'Admin', '089777448855', 'Administrator', 'admin@admin.com', NULL, '$2y$10$qbl8M5SSILzu50m6oofzMuPsD4QY.7RcPgiUkk4QAJqvaga.PT68C', 'Lainnya', 'pict-Administrator.jpg', 'Admin', 1, NULL, '2022-11-25 10:38:58', '2022-11-29 07:38:50'),
(4, 'Gunawan', 'Wicaksono', '+6289687601023', 'gugun', 'gugun@gmail.com', NULL, '$2y$10$t7IWXst451s8l9U9Uo61z.uUmGtDIzn/VenreLEj9f2AYirBJPvbm', 'Pelajar', NULL, 'Base', 0, NULL, '2022-11-25 11:57:23', '2022-11-27 06:52:09'),
(5, 'Bang', 'Gojek', '08294323457356', 'okeokejek12', 'okeokejek12@gmail.com', NULL, '$2y$10$0Y.skSACcPoQVDQFIePNmeKL8Y2hcpx5KL0UDkiiuB6Ygwd01M8D2', 'Mahasiswa', NULL, 'Base', 1, NULL, '2022-11-27 06:38:47', '2022-11-27 06:52:08'),
(7, 'Ahmad', 'Supriyadi', '088976786786', 'yadi8080', 'yadi8080@gmail.com', NULL, '$2y$10$ehj5eAK6tyBgskyIyFwmluIRnBz81Dh.0qv22oZsDex8qNERfu8s.', 'Pekerja', NULL, 'Base', 1, NULL, '2022-11-28 08:34:19', '2022-11-28 08:41:20'),
(8, 'Jamal', 'Abul', '0855667743453', 'jambul20', 'jambul20@gmail.com', NULL, '$2y$10$Z4eK8aNqjJ7PAwEf4BXne.5nKbfXuqT9nTeDg5.wZVXOg1zl98TCy', 'Lainnya', NULL, 'Base', 0, NULL, '2022-11-28 09:31:21', '2022-11-28 09:31:21'),
(9, 'Komami', 'Munami', '0889989898980', 'Komami', 'Komami@gmail.com', NULL, '$2y$10$ccZ4BHlTVSj.QmDuAFQoI.81B1Fx5wJMplAkVo6UFcWdYtXD6ddnW', 'Pelajar', NULL, 'Base', 0, NULL, '2022-11-28 09:33:43', '2022-11-28 12:04:41'),
(15, 'Abdul', 'Rasyidii', '0899788767866', 'rasdul990', 'rasdul990@gmail.com', NULL, '$2y$10$veEIgZPyuuYMhD5D1/4lrOhCmvD32GhhOfnZdtEwLrmkwX0ImHDfq', 'Lainnya', NULL, 'Base', 1, NULL, '2022-11-28 10:12:45', '2022-11-28 11:51:00'),
(16, 'Odin', 'Temulawak', '0887795865450', 'temulawak', 'temulawak@gmail.com', NULL, '$2y$10$wovYC8N/G9Dm0MvlCLgcmOvO.x87hAZKkqj8R7MbXj8dsUpUvpDfa', 'Mahasiswa', 'pict-temulawak.jpg', 'Admin', 1, NULL, '2022-12-02 05:15:25', '2022-12-06 12:37:52'),
(18, 'Samsudin', 'Maroko', '08945664555555', 'samurko', 'samurko@gmail.com', NULL, '$2y$10$xjv5kZ6o2IwON7VIv5.zp.MJ3XyEsqNaJ1CCFL5SmuQ8d80OomrfW', 'Mahasiswa', 'pict-samurko.jpg', 'Base', 1, NULL, '2022-12-06 12:48:44', '2022-12-12 21:01:38'),
(19, 'Omar', 'Mubarok', '0899855857575', 'omarok20', 'omarok20@gmail.com', NULL, '$2y$10$flbDnqeEv6PnZ/e.6EPtO.71Z7YYofr/7GGQyTkuTmbd9bnDf2J3y', 'Mahasiswa', NULL, 'Base', 0, NULL, '2022-12-12 19:12:04', '2022-12-12 20:54:23');

-- --------------------------------------------------------

--
-- Table structure for table `videomateri`
--

CREATE TABLE `videomateri` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_video` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `video` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `modul_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `videomateri`
--

INSERT INTO `videomateri` (`id`, `nama_video`, `video`, `modul_id`, `created_at`, `updated_at`) VALUES
(14, 'Course Introduction Video (AWS Cloud)', 'https://www.youtube.com/watch?v=t-5gRDXzPXs', 7, '2022-12-11 06:43:28', '2022-12-19 07:05:17'),
(19, 'Course Introduction Video (AWS Machine Learning)', 'https://www.youtube.com/watch?v=Gl2Iuj2RL9s', 20, '2022-12-19 07:41:41', '2022-12-19 07:41:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `filemateri`
--
ALTER TABLE `filemateri`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `modul`
--
ALTER TABLE `modul`
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
-- Indexes for table `testimoni`
--
ALTER TABLE `testimoni`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_no_telp_unique` (`no_telp`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `videomateri`
--
ALTER TABLE `videomateri`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `filemateri`
--
ALTER TABLE `filemateri`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `modul`
--
ALTER TABLE `modul`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `testimoni`
--
ALTER TABLE `testimoni`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `videomateri`
--
ALTER TABLE `videomateri`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
