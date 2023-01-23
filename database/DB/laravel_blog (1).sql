-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 23, 2023 at 02:19 PM
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
-- Database: `laravel_blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(255) NOT NULL,
  `cat_name` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `cat_name`, `created_at`, `updated_at`) VALUES
(7, 'Books', '2022-11-17 10:21:38', '2022-11-18 04:56:50'),
(8, 'Electronics', '2022-11-17 10:21:45', '2022-11-17 10:21:45'),
(9, 'Home & Kitchen', '2022-11-17 10:21:56', '2022-11-17 10:21:56'),
(10, 'Arts, Crafts, & Sewing', '2022-11-17 10:22:08', '2022-11-17 10:22:08');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(255) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` varchar(250) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `first_name`, `last_name`, `email`, `address`, `phone`, `created_at`, `updated_at`) VALUES
(6, 'Peter S.', 'Garvin', 'PeterSGarvin@jourrapide.com', '462, Tulsi Pipe Rd, Lower Parel  Mumbai', '4044713697', '2022-11-17 10:35:32', '2022-11-18 05:46:39'),
(7, 'Cornelius G.', 'Lynch', 'CorneliusGLynch@jourrapide.com', '1st Floor, 1st, Flr Ganpat Villa, Gendigate vadodra', '35.079859', '2022-11-17 10:36:20', '2022-11-18 05:37:07'),
(8, 'Jennifer T.', 'Smith', 'JenniferTSmith@jourrapide.com', 'P-3, New C.i.t. Road, Floor-4, Chittaranjan Avenue vadodra', '91.042731', '2022-11-17 10:37:02', '2022-11-18 05:37:26'),
(13, 'Bou', 'Diarra', 'bou@ibriz.co', 'Liberte 6 Ext', '777420258', '2022-11-19 18:23:52', '2022-11-19 18:23:52');

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
-- Table structure for table `invoice_data`
--

CREATE TABLE `invoice_data` (
  `id` int(255) NOT NULL,
  `invoice_number` varchar(255) DEFAULT NULL,
  `client_id` varchar(255) DEFAULT NULL,
  `sub_total` varchar(255) DEFAULT NULL,
  `tex` varchar(255) DEFAULT NULL,
  `tax_amount` varchar(255) DEFAULT NULL,
  `Discount_amount` varchar(255) DEFAULT NULL,
  `total_amount` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `shhiping` varchar(255) DEFAULT NULL,
  `disscount` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoice_data`
--

INSERT INTO `invoice_data` (`id`, `invoice_number`, `client_id`, `sub_total`, `tex`, `tax_amount`, `Discount_amount`, `total_amount`, `created_at`, `updated_at`, `shhiping`, `disscount`) VALUES
(187, '#0001', '6', '30.00', '18', '5.29', '29.40', '44.69', '2022-12-02 12:26:18', '2022-12-02 12:26:18', '10', '2'),
(188, '#000188', '7', '20.00', '18', '3.53', '19.60', '33.13', '2022-12-02 12:26:30', '2022-12-02 12:26:30', '10', '2'),
(189, '#000189', '6', '1440.00', '18', '254.02', '1411.20', '1675.22', '2023-01-20 09:30:58', '2023-01-20 09:30:58', '10', '2');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_details`
--

CREATE TABLE `invoice_details` (
  `id` int(255) NOT NULL,
  `invoice_data_id` varchar(255) DEFAULT NULL,
  `product_id` varchar(255) DEFAULT NULL,
  `qty` varchar(255) DEFAULT NULL,
  `total` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoice_details`
--

INSERT INTO `invoice_details` (`id`, `invoice_data_id`, `product_id`, `qty`, `total`, `created_at`, `updated_at`) VALUES
(271, '187', '27', '1', '30', '2022-12-02 12:26:18', '2022-12-02 12:26:18'),
(272, '188', '26', '1', '20', '2022-12-02 12:26:30', '2022-12-02 12:26:30'),
(273, '189', '29', '3', '1440', '2023-01-20 09:30:58', '2023-01-20 09:30:58');

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
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

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
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(255) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content` longtext DEFAULT NULL,
  `auther` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `auther`, `image`, `date`, `created_at`, `updated_at`) VALUES
(4, 'Dolor itaque sed ame', 'Aliquid quasi quasi  Aliquid quasi quasi', 'Deserunt in ipsa de', '1674470571.png', '2023-08-03', '2023-01-23 08:27:16', '2023-01-23 10:42:51'),
(6, 'housetohome Dummy Blog post', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomized words which look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there  anything', 'viral', '1674469501.webp', '2023-01-27', '2023-01-23 10:25:01', '2023-01-23 10:25:01'),
(7, 'Dummy Blog post', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from  BC, making it over years old. Richard McClintock,', 'Hemant Patel', '1674469695.png', '2023-01-26', '2023-01-23 10:28:15', '2023-01-23 10:28:15'),
(8, 'Dummy Blog post test', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries', 'Hemant Patel', '1674469843.png', '2023-01-26', '2023-01-23 10:30:43', '2023-01-23 10:30:43'),
(9, 'Hello world!', 'Welcome to WordPress. This is your first post. Edit or delete it, then start writing!', 'Hemant Patel', '1674469966.png', '2023-01-26', '2023-01-23 10:32:46', '2023-01-23 10:32:46'),
(10, 'Selecting hosted blogging software', 'When you start a new blog, one of your most important decisions is choosing what blogging software to use. You also need to decide what type of blogger you be. Is there a certain niche that would be a great fit to match your interests and expertise? Whether you re a new blogger or looking to switch blogging platforms, the range of blogging tools and options you find here can give you a head start on your search for your blogging software and blog niche match.', 'admin', '1674470825.png', '2023-01-28', '2023-01-23 10:47:05', '2023-01-23 10:47:05');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(255) NOT NULL,
  `cat_id` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `quantity` varchar(255) DEFAULT NULL,
  `amount` varchar(255) DEFAULT NULL,
  `rate` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `cat_id`, `name`, `description`, `quantity`, `amount`, `rate`, `image`, `created_at`, `updated_at`) VALUES
(26, '7', 'Check the book’s Best-Seller Ranking', 'Check the book’s Best-Seller Ranking', '100', '2000', '20', NULL, '2022-11-17 10:23:02', '2022-11-17 10:23:02'),
(27, '7', 'Jungle Scout’s Free Estimator Tool', 'Jungle Scout’s Free Estimator Tool', '300', '9000', '30', NULL, '2022-11-17 10:23:29', '2022-11-17 10:23:29'),
(28, '8', 'Passive Components', 'Passive Components', '500', '25000', '50', NULL, '2022-11-17 10:24:26', '2022-11-17 10:24:26'),
(29, '8', 'Electromechanical', 'Electromechanical', '800', '384000', '480', NULL, '2022-11-17 10:24:54', '2022-11-17 10:24:54'),
(30, '9', 'SIDE & END TABLES', 'SIDE & END TABLES', '600', '120000', '200', NULL, '2022-11-17 10:26:02', '2022-11-17 10:26:02'),
(31, '10', 'Soft Tape Measure Double Scale Body Sewing', 'Soft Tape Measure Double Scale Body Sewing', '1000', '20000', '20', NULL, '2022-11-17 10:33:58', '2022-11-17 10:33:58');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(255) NOT NULL,
  `text` varchar(255) DEFAULT NULL,
  `disscount` varchar(255) DEFAULT NULL,
  `shipping` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `company_address` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `dakar` varchar(250) DEFAULT NULL,
  `senegal` varchar(250) DEFAULT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `company_phone` varchar(255) DEFAULT NULL,
  `company_mobile` varchar(255) DEFAULT NULL,
  `company_email` varchar(255) DEFAULT NULL,
  `d_logo` varchar(255) DEFAULT NULL,
  `d_title` varchar(255) DEFAULT NULL,
  `footer_text` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `text`, `disscount`, `shipping`, `created_at`, `updated_at`, `company_address`, `logo`, `dakar`, `senegal`, `company_name`, `company_phone`, `company_mobile`, `company_email`, `d_logo`, `d_title`, `footer_text`) VALUES
(1, '18', '2', '10', '2022-11-14 14:47:49', '2022-11-23 08:26:30', '149VDN sacré coeur 3', '1668880026.png', 'Dakar Dakar', 'Senegal', 'Ibriz', '221338224258', '+221 33 822 42 58', 'sales@ibriz.co', '1668880026.png', 'Ibriz CRM App', 'Copyright © 2021-2022 Ibriz. All rights reserved.');

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
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_admin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `is_admin`) VALUES
(1, 'Super', 'admin@gmail.com', NULL, '$2y$10$DLI1aONNjIjY3fjNpqtDZ.CqCGkh3NMvPCq.Ss/4QAEhhScqI0mpy', '7nnDOfQ0Xi0Yc3aaAM4DChVBapxmNNDQiyL6E3ggz96ywgmGTI39PDxJgFzm', '2022-11-10 23:18:31', '2022-11-10 23:18:31', NULL),
(2, 'demo', 'demo@gmail.com', NULL, '$2y$10$tHK8DyG7cElIpxY018d2qu.PofnbjulzNsPHR0s5.s30PaPDtnH.e', NULL, '2023-01-23 06:39:17', '2023-01-23 06:39:17', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `invoice_data`
--
ALTER TABLE `invoice_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice_details`
--
ALTER TABLE `invoice_details`
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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
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
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoice_data`
--
ALTER TABLE `invoice_data`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=190;

--
-- AUTO_INCREMENT for table `invoice_details`
--
ALTER TABLE `invoice_details`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=274;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
