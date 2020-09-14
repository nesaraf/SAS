-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2019 at 07:41 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `supermarket`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'fashion', '2019-01-28 08:18:47', '2019-01-28 08:18:47'),
(2, 'electronics', '2019-03-04 05:17:01', '2019-03-04 05:17:01'),
(3, 'Groceries', '2019-03-25 02:36:09', '2019-03-25 02:36:09'),
(4, 'supplements', '2019-04-08 03:49:27', '2019-04-08 03:49:27');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `last_name`, `company`, `phone`, `email`, `address`, `created_at`, `updated_at`) VALUES
(1, 'Shams', 'Ali', 'private', '335456345353', 'ahmad2014nisar@gmail.com', 'some where', NULL, NULL),
(2, 'Ahmad', 'Kazemi', 'iiit', '9876755', 'ah@gmail.com', 'gothapathna', NULL, NULL),
(3, 'Kodjo', 'Mawli', 'Student', '9999999999', 'romualdlevent@gmail.com', 'IIIT hostel', '2019-04-01 20:04:00', '2019-04-01 20:04:00');

-- --------------------------------------------------------

--
-- Table structure for table `emps`
--

CREATE TABLE `emps` (
  `id` int(10) UNSIGNED NOT NULL,
  `fname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fathername` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `degree` varchar(199) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `emps`
--

INSERT INTO `emps` (`id`, `fname`, `lname`, `fathername`, `dob`, `phone`, `mobile`, `email`, `position`, `degree`, `created_at`, `updated_at`) VALUES
(1, 'Nesar', 'Ahmad', 'Ali', '2019-04-16', '7438888657', '7438888657', 'ahmad@gmail.com', 'It manager', '12th grade', '2019-04-01 22:31:17', '2019-04-02 11:39:22'),
(3, 'Jane', 'Doe', 'james', '2019-05-02', '7545453237', '7545445549', 'johndoe@gmail.com', 'branch manager', '12th grade', '2019-04-02 10:54:21', '2019-04-02 11:40:14'),
(4, 'Jalal', 'Jalali', 'Shams', '1970-02-03', '7656577876', '7656577876', 'jalali@gmail.com', 'Staff', '12th grade', '2019-04-17 03:56:53', '2019-04-17 03:56:53');

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
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2018_01_27_073950_create_customers_table', 1),
(3, '2018_01_27_074016_create_products_table', 1),
(4, '2018_01_27_074039_create_categories_table', 1),
(5, '2018_02_06_055747_create_units_table', 1),
(6, '2018_02_07_065243_create_sales_table', 1),
(7, '2018_02_07_065541_create_sales_details_table', 1),
(8, '2018_08_01_100904_create_users_table', 1),
(9, '2018_08_04_091526_create_numbers_table', 1),
(11, '2019_03_28_070604_create__emps_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `numbers`
--

CREATE TABLE `numbers` (
  `id` int(10) UNSIGNED NOT NULL,
  `number` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `barcode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `commercial_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `exp_date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `purchase_price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sales_price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `manufaturer` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL DEFAULT '0',
  `unit_id` int(11) NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `barcode`, `name`, `commercial_name`, `category_id`, `exp_date`, `purchase_price`, `sales_price`, `manufaturer`, `amount`, `unit_id`, `image`, `created_at`, `updated_at`) VALUES
(2, '98879676', 'Honey', 'dfasf', 1, '2019-03-12', '233', '9', 'kjh', 57, 1, 'Honey.jpeg', '2019-03-03 20:53:32', '2019-04-08 22:59:25'),
(3, '2324', 'CocaCola', 'CocaCola', 3, '2019-04-30', '23', '24', 'cocacola company', 56, 2, 'cocacola.jpg', '2019-04-01 11:16:49', '2019-04-08 22:59:25'),
(4, '87787879', 'trousers', 'levis cotton trousers for men', 1, '2019-04-27', '788', '900', 'Levis', 23, 1, 'trousers.jpg', '2019-04-08 03:11:24', '2019-04-08 03:11:24'),
(7, '098765', 'anything', 'testdata', 2, '2020-04-14', '788', '799', 'Johnson ltd', 32, 1, '109381-1400x875.jpg', '2019-04-08 05:39:13', '2019-04-09 01:47:07');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(10) UNSIGNED NOT NULL,
  `bill_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_id` int(11) NOT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `bill_no`, `customer_id`, `date`, `total`, `created_at`, `updated_at`) VALUES
(1, 'IV19-1', 1, '01-04-2019', '48', '2019-04-01 11:26:29', '2019-04-01 11:26:29'),
(2, 'IV19-2', 1, '01-04-2019', '24', '2019-04-01 11:57:18', '2019-04-01 11:57:18'),
(3, 'IV19-3', 1, '05-04-2019', '3534', '2019-04-05 11:59:59', '2019-04-05 11:59:59'),
(4, 'IV19-4', 1, '05-04-2019', '3534', '2019-04-05 12:06:05', '2019-04-05 12:06:05'),
(5, 'IV19-5', 3, '08-04-2019', '3534', '2019-04-08 03:44:30', '2019-04-08 03:44:30'),
(6, 'IV19-6', 1, '08-04-2019', '3534', '2019-04-08 05:43:29', '2019-04-08 05:43:29'),
(7, 'IV19-7', 1, '09-04-2019', '3534', '2019-04-08 22:59:25', '2019-04-08 22:59:25');

-- --------------------------------------------------------

--
-- Table structure for table `sales_details`
--

CREATE TABLE `sales_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `sales_id` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int(11) NOT NULL,
  `customer_id` int(23) NOT NULL,
  `quantity` int(11) NOT NULL,
  `unit_price` double(15,2) NOT NULL,
  `total_price` double(15,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales_details`
--

INSERT INTO `sales_details` (`id`, `sales_id`, `product_id`, `customer_id`, `quantity`, `unit_price`, `total_price`, `created_at`, `updated_at`) VALUES
(1, 'IV19-3', 2, 1, 2, 9.00, 18.00, NULL, NULL),
(2, 'IV19-4', 2, 1, 5, 9.00, 45.00, NULL, NULL),
(3, 'IV19-4', 3, 1, 5, 24.00, 120.00, NULL, NULL),
(4, 'IV19-4', 2, 1, 5, 9.00, 45.00, NULL, NULL),
(5, 'IV19-6', 3, 1, 6, 24.00, 144.00, NULL, NULL),
(6, 'IV19-6', 2, 1, 2, 9.00, 18.00, NULL, NULL),
(7, 'IV19-7', 2, 1, 3, 9.00, 27.00, NULL, NULL),
(8, 'IV19-7', 3, 1, 4, 24.00, 96.00, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'box', '2019-01-28 08:21:19', '2019-01-28 08:21:19'),
(2, 'Bottle', '2019-03-25 02:39:52', '2019-03-25 02:39:52'),
(3, 'pairs', '2019-04-08 03:11:51', '2019-04-08 03:11:51');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `empID` int(191) NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int(11) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `empID`, `email`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(13, 1, 'ahmad@gmail.com', '$2y$10$btiv3wBSumfLhwSFDzdxAuzvbsgGkeeDNP0l7rH5DMDcncyvDCwNm', 1, 'druH86s0KSb4Amz0KkzgZ7vViyhmmnk4LMXzRle3FPkh0atdFZmMenbgl9Wo', '2019-04-08 22:08:10', '2019-04-08 22:08:10'),
(14, 3, 'johndoe@gmail.com', '$2y$10$btiv3wBSumfLhwSFDzdxAuzvbsgGkeeDNP0l7rH5DMDcncyvDCwNm', 0, 'oAE2bQAthzddiexFrNI7jCatZnFqibiOTEhqBxLhbKCLcgj4ycIT8lUUS8KD', '2019-04-08 22:28:10', '2019-04-08 22:28:10'),
(15, 4, 'jalali@gmail.com', '$2y$10$M/vJ6/Budum6Q69yQfQFGuCMuZ6jqIjfP4iri24zCxEXF/E87r0IW', 2, 'eRqt60zk1YhsWAvShKeradbA5kgZNNNVGzzxvdeKtoqcTA1n97bAU6MwNsfZ', '2019-04-17 03:57:34', '2019-04-17 03:57:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emps`
--
ALTER TABLE `emps`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `emps_fathername_unique` (`fathername`),
  ADD UNIQUE KEY `emps_phone_unique` (`phone`),
  ADD UNIQUE KEY `emps_mobile_unique` (`mobile`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `numbers`
--
ALTER TABLE `numbers`
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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales_details`
--
ALTER TABLE `sales_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `emps`
--
ALTER TABLE `emps`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `numbers`
--
ALTER TABLE `numbers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sales_details`
--
ALTER TABLE `sales_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
