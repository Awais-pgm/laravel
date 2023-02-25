-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 25, 2023 at 03:36 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerece`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog_categories`
--

CREATE TABLE `blog_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_description` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_categories`
--

INSERT INTO `blog_categories` (`id`, `category_name`, `category_description`, `created_at`, `updated_at`) VALUES
(1, 'clothes', 'this is blog category for clothes.', '2023-02-15 09:22:26', '2023-02-15 09:22:26'),
(2, 'shoes', 'this is shoes categoy for blog', '2023-02-15 09:23:12', '2023-02-15 09:23:12'),
(3, 'fashion', 'Fashion category for clothes', '2023-02-15 09:23:33', '2023-02-15 09:23:33'),
(4, 'Cameras', 'these cameras are beautiful', '2023-02-15 12:02:54', '2023-02-15 12:02:54'),
(5, 'Cameras', 'these cameras are beautiful', '2023-02-15 12:02:54', '2023-02-15 12:02:54');

-- --------------------------------------------------------

--
-- Table structure for table `blog_posts`
--

CREATE TABLE `blog_posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_description` longtext NOT NULL,
  `post_image` varchar(255) NOT NULL,
  `category_id` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_posts`
--

INSERT INTO `blog_posts` (`id`, `post_title`, `post_description`, `post_image`, `category_id`, `created_at`, `updated_at`) VALUES
(4, 'Camera', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus perspiciatis ratione nesciunt adipisci repellat illo doloremque? Nulla rem, similique recusandae voluptatum quam ducimus perferendis corrupti tenetur quibusdam suscipit eius delectus?\nAut, dolorum enim laboriosam nobis officia illum beatae error maiores iure odio sunt accusamus tempora? Veniam dolorum numquam ducimus neque id dolores fuga, animi cumque rerum rem consectetur inventore perspiciatis?\nVeniam iste assumenda temporibus odit illum unde nesciunt, accusamus consequuntur cumque voluptas eveniet corporis inventore ea atque a architecto dolorum, ratione recusandae tenetur quibusdam saepe? Assumenda in incidunt labore excepturi.\nAperiam facere commodi labore harum voluptas illum ipsa culpa excepturi asperiores cum, aut veniam. Sapiente necessitatibus laborum modi ipsa temporibus, dolore provident dicta sed pariatur obcaecati reiciendis assumenda ea deleniti.\nNemo rem cumque, ipsam, ad iure, voluptatibus vel officiis magnam dicta adipisci ea est. Excepturi natus culpa earum aspernatur, quae iste possimus maiores voluptates in consequuntur voluptate necessitatibus eos pariatur!\nQuasi delectus a voluptatem sit, architecto molestiae veritatis esse soluta nemo nulla deserunt quisquam harum libero saepe possimus aspernatur velit fuga facere officia eius sequi temporibus, doloribus culpa fugiat. Repellendus?\nArchitecto natus error amet! Quibusdam beatae labore officia architecto temporibus voluptatem, doloremque, corrupti eligendi impedit deleniti odit eaque rerum dolor deserunt repellendus, iure natus? Accusantium suscipit natus necessitatibus illo eveniet.\nSequi delectus beatae iusto dignissimos nemo consequatur tempora harum voluptas quisquam, cumque iure odio reprehenderit quis maxime ducimus dolores commodi a distinctio autem earum at! Quae, veritatis. Esse, vero repudiandae.\nDeserunt vero amet facere deleniti similique consectetur labore est minus quasi assumenda aut atque sit nesciunt veniam obcaecati praesentium, provident voluptatibus exercitationem! Nostrum ex voluptatem tempora ipsa doloremque dolore sequi.\nMollitia, id iusto maiores inventore maxime, esse reiciendis hic nostrum est quod vel assumenda odit soluta. Aperiam est alias minus pariatur fugit quasi illo! Sed, quasi aperiam. Unde, facilis beatae.', 'cam1_1676481307.jpg', '5', '2023-02-15 12:15:07', '2023-02-15 12:15:07'),
(7, 'shoes', 'lorem ipsum', 'shoes2_1676572953.jpg', '2', '2023-02-16 13:42:33', '2023-02-16 13:42:33'),
(8, 'shirt', 'death', 'death-6054627_1676573744.jpg', '1', '2023-02-16 13:55:44', '2023-02-16 13:55:44');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_mobile_no` varchar(255) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `product_quantity` varchar(255) NOT NULL,
  `product_price` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category`, `created_at`, `updated_at`, `deleted_at`, `image`, `description`) VALUES
(1, 'cameras', '2023-02-03 09:01:11', '2023-02-24 02:16:27', NULL, 'cam1_1675432871.jpg', 'This category holds all the cameras'),
(2, 'Watches', '2023-02-03 09:01:37', '2023-02-03 09:01:37', NULL, 'watch_1675432897.jpg', 'this category holds all the watches'),
(3, 'Glasses', '2023-02-03 09:02:01', '2023-02-03 09:02:01', NULL, 'glasses_1675432921.jpg', 'This category holds all the glasses'),
(4, 'Shoes', '2023-02-03 09:02:23', '2023-02-03 09:02:23', NULL, 'shoes2_1675432943.jpg', 'This category holds all the shoes.'),
(5, 'Tables', '2023-02-03 09:02:54', '2023-02-03 09:02:54', NULL, 'diningtable_1675432974.jpg', 'This category holds all the material stuff'),
(6, 'Beauty', '2023-02-03 09:03:29', '2023-02-03 09:03:29', NULL, 'lipstick_1675433009.jpg', 'This category holds all the beauty stuff');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `comment` longtext DEFAULT NULL,
  `user_id` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `product_id` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_01_18_080854_create_sessions_table', 1),
(7, '2023_01_21_075619_create_categories_table', 1),
(8, '2023_01_21_163548_add_soft_delete_columns_to_categories', 1),
(9, '2023_01_21_192512_create_products_table', 1),
(10, '2023_01_24_094218_add_image_and_description_columns_to_categories', 1),
(11, '2023_01_25_152421_add_category_name_columns_to_products', 1),
(12, '2023_01_26_164403_add_deleted_at_columns_to_products', 1),
(13, '2023_02_03_130135_drop_carts_table', 1),
(14, '2023_02_03_130410_create_carts_table', 1),
(15, '2023_02_03_133209_create_orders_table', 1),
(16, '2023_02_03_133346_create_testings_table', 1),
(18, '2023_02_03_133525_drop_testings_table', 2),
(20, '2023_02_06_135602_add_total_price_columns_to_orders_table', 3),
(21, '2023_02_07_163642_add_delivery_charges_columns_to_orders_table', 4),
(22, '2019_05_03_000001_create_customer_columns', 5),
(23, '2019_05_03_000002_create_subscriptions_table', 5),
(24, '2019_05_03_000003_create_subscription_items_table', 5),
(25, '2023_02_11_203242_add_payment_method_columns_to_orders_table', 6),
(26, '2023_02_12_170731_create_notifications_table', 7),
(27, '2023_02_14_161919_create_comments_table', 8),
(28, '2023_02_14_161933_create_replies_table', 8),
(29, '2023_02_14_171354_add_product_id_columns_to_comments_table', 9),
(30, '2023_02_15_110112_create_slider_details_table', 10),
(31, '2023_02_15_132125_create_blog_categories_table', 11),
(32, '2023_02_15_132138_create_blog_posts_table', 11),
(33, '2023_02_16_105338_create_contact_us_table', 12),
(38, '2023_02_20_110453_create_testimonials_table', 13);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) NOT NULL,
  `type` varchar(255) NOT NULL,
  `notifiable_type` varchar(255) NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_mobile_no` varchar(255) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `product_quantity` varchar(255) NOT NULL,
  `product_price` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `delivery_status` varchar(255) NOT NULL,
  `payment_status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `total_price` varchar(255) DEFAULT NULL,
  `payment_method` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_name`, `user_id`, `user_email`, `user_mobile_no`, `user_address`, `product_name`, `product_id`, `product_quantity`, `product_price`, `product_image`, `delivery_status`, `payment_status`, `created_at`, `updated_at`, `total_price`, `payment_method`) VALUES
(87, 'Muhammad Awais', '5', 'wsiwjiaw@gmail.com', '03007926926', 'Basti roshan din', 'watch', '3', '1', '2300', 'watch_1675433807.jpg', 'processing', 'pending', '2023-02-24 02:17:27', '2023-02-24 02:17:27', '2300', 'COD');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `categories_id` varchar(255) NOT NULL,
  `discount_price` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `category_name` varchar(255) NOT NULL,
  `deleted_at` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `description`, `image`, `price`, `quantity`, `categories_id`, `discount_price`, `created_at`, `updated_at`, `category_name`, `deleted_at`) VALUES
(1, 'Lipstick', 'Red lipstick, Medora', 'lipstick_1675433574.jpg', '600', 54, '6', '300', '2023-02-03 09:12:54', '2023-02-24 02:16:35', 'Beauty', NULL),
(2, 'watch', 'descent watch with white color', 'watch1_1675433744.jpg', '4500', 19, '2', NULL, '2023-02-03 09:15:44', '2023-02-16 09:19:50', 'Watches', NULL),
(3, 'watch', 'this is another watch', 'watch_1675433807.jpg', '2300', 8, '2', NULL, '2023-02-03 09:16:47', '2023-02-24 02:17:27', 'Watches', NULL),
(4, 'Camera', 'sony camera', 'cam1_1675433839.jpg', '6700', 34, '1', NULL, '2023-02-03 09:17:19', '2023-02-03 09:17:19', 'cameras', NULL),
(5, 'camera', 'camera with flash', 'cam2_1675433875.jpg', '6500', 0, '1', NULL, '2023-02-03 09:17:55', '2023-02-03 09:17:55', 'cameras', NULL),
(6, 'shoes', 'very nice shoes', 'shoes2_1675433922.jpg', '7600', 54, '4', NULL, '2023-02-03 09:18:42', '2023-02-03 09:18:42', 'Shoes', NULL),
(7, 'shoes', 'shoes for men', 'shoes_1675433953.jpg', '5600', 4, '4', NULL, '2023-02-03 09:19:13', '2023-02-03 09:19:13', 'Shoes', NULL),
(8, 'glasses', 'glasses, black', 'glasses_1675433994.jpg', '7600', 54, '3', NULL, '2023-02-03 09:19:54', '2023-02-03 09:19:54', 'Glasses', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `replies`
--

CREATE TABLE `replies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `reply` longtext NOT NULL,
  `comment_id` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('dbh4dhTTUvxCnp5MardxhNUicJyD9yVn29nDgtFK', 5, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoidzRsck9YY3pIQlg1aUJXbmVSalpkMXlldFQzTGNhUGFsY2NCWkp0ZyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC92aWV3L2FsbC9vcmRlcnMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTo1O3M6NToiYWxlcnQiO2E6MDp7fX0=', 1677223153);

-- --------------------------------------------------------

--
-- Table structure for table `slider_details`
--

CREATE TABLE `slider_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `heading1` varchar(255) DEFAULT NULL,
  `detail1` longtext DEFAULT NULL,
  `heading2` varchar(255) DEFAULT NULL,
  `detail2` longtext DEFAULT NULL,
  `heading3` varchar(255) DEFAULT NULL,
  `detail3` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `slider_details`
--

INSERT INTO `slider_details` (`id`, `heading1`, `detail1`, `heading2`, `detail2`, `heading3`, `detail3`, `created_at`, `updated_at`) VALUES
(1, 'Every thing is 20% off', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dolorum blanditiis inventore a earum alias consequuntur id officiis molestiae. Tenetur magni cum consequuntur illum. Autem, pariatur odio? Fuga quas sit rem.', 'come here to get discounts', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dolorum blanditiis inventore a earum alias consequuntur id officiis molestiae. Tenetur magni cum consequuntur illum. Autem, pariatur odio? Fuga quas sit rem.', 'it is beautiful to see you here', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dolorum blanditiis inventore a earum alias consequuntur id officiis molestiae. Tenetur magni cum consequuntur illum. Autem, pariatur odio? Fuga quas sit rem.', NULL, '2023-02-15 06:31:10');

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `stripe_id` varchar(255) NOT NULL,
  `stripe_status` varchar(255) NOT NULL,
  `stripe_price` varchar(255) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `trial_ends_at` timestamp NULL DEFAULT NULL,
  `ends_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subscription_items`
--

CREATE TABLE `subscription_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subscription_id` bigint(20) UNSIGNED NOT NULL,
  `stripe_id` varchar(255) NOT NULL,
  `stripe_product` varchar(255) NOT NULL,
  `stripe_price` varchar(255) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `detail` longtext DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `designation`, `name`, `detail`, `image`, `created_at`, `updated_at`) VALUES
(1, 'CEO', 'Muhammad Awais', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse tempore ut rerum itaque asperiores dolorum nulla. Ad, dolor doloribus facere architecto, sed voluptatem, quam ipsum beatae odit blanditiis reprehenderit obcaecati.', 'IMG_4761_1676900586.jpg', NULL, '2023-02-20 08:43:06'),
(2, 'Cheif Exucetiv', 'Ali Haider', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dolorum blanditiis inventore a earum alias consequuntur id officiis molestiae. Tenetur magni cum consequuntur illum. Autem, pariatur odio? Fuga quas sit rem.', 'IMG_4761_1676913051.jpg', '2023-02-20 12:10:51', '2023-02-20 12:10:51'),
(3, 'Manager', 'Muhammad Junaid', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dolorum blanditiis inventore a earum alias consequuntur id officiis molestiae. Tenetur magni cum consequuntur illum. Autem, pariatur odio? Fuga quas sit rem.', 'IMG_4761_1676914987.jpg', '2023-02-20 12:43:07', '2023-02-20 12:43:07');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `usertype` varchar(255) NOT NULL DEFAULT '0',
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `two_factor_secret` text DEFAULT NULL,
  `two_factor_recovery_codes` text DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `stripe_id` varchar(255) DEFAULT NULL,
  `pm_type` varchar(255) DEFAULT NULL,
  `pm_last_four` varchar(4) DEFAULT NULL,
  `trial_ends_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `usertype`, `phone`, `address`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`, `stripe_id`, `pm_type`, `pm_last_four`, `trial_ends_at`) VALUES
(4, 'Muhammad Awais', 'Awaistayyab27@gmail.com', '0', '03007926926', 'Basti roshan din', NULL, '$2y$10$HPjZjwXHTDefSgurJEETx.nlgI3ySQV8a.6aONH4VItZkAABr8Tc.', NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-12 10:41:54', '2023-02-12 10:41:54', NULL, NULL, NULL, NULL),
(5, 'Muhammad Awais', 'wsiwjiaw@gmail.com', '1', '03007926926', 'Basti roshan din', '2023-02-12 10:48:31', '$2y$10$WqtR3QJ8Bg3CsaLuvXJhCuGLCsBBr7UvrutvwNeZIh8IzjiuSEYSu', NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-12 10:43:19', '2023-02-12 10:48:31', NULL, NULL, NULL, NULL),
(6, 'Junaid', 'jarviz3333@gmail.com', '0', '03135002979', 'mureed wala', NULL, '$2y$10$cZ6PHQbQTzjIvpRjn4RvTubXlT58V1sbGY1JZDGl0c.U7jZAiHRwK', NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-12 10:52:12', '2023-02-12 10:52:12', NULL, NULL, NULL, NULL),
(7, 'Muhammad Awais', 'alihaider203472@gmail.com', '0', '03007926926', 'Basti roshan din', NULL, '$2y$10$1PTurwHo715j54VnDr0BTug1073.NZAb8am16.ED/3XUomJn7aEIq', NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-14 05:11:42', '2023-02-14 05:11:42', NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog_categories`
--
ALTER TABLE `blog_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_posts`
--
ALTER TABLE `blog_posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `replies`
--
ALTER TABLE `replies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `slider_details`
--
ALTER TABLE `slider_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subscriptions_stripe_id_unique` (`stripe_id`),
  ADD KEY `subscriptions_user_id_stripe_status_index` (`user_id`,`stripe_status`);

--
-- Indexes for table `subscription_items`
--
ALTER TABLE `subscription_items`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subscription_items_subscription_id_stripe_price_unique` (`subscription_id`,`stripe_price`),
  ADD UNIQUE KEY `subscription_items_stripe_id_unique` (`stripe_id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_stripe_id_index` (`stripe_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog_categories`
--
ALTER TABLE `blog_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `blog_posts`
--
ALTER TABLE `blog_posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=159;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `replies`
--
ALTER TABLE `replies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `slider_details`
--
ALTER TABLE `slider_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subscription_items`
--
ALTER TABLE `subscription_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
