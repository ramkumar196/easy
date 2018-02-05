-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 05, 2018 at 06:43 AM
-- Server version: 5.7.20-0ubuntu0.16.04.1
-- PHP Version: 7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `easy`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `user_type`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Admin', 'admin@easy.com', '$2y$10$NjhYYqs.cyOTJg1lUqNzQ.w6RJGiHeXvZPT1NVb5FRJw3oFARuqn6', 'A', NULL, NULL, NULL);

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
(3, '2014_10_12_000000_create_admins_table', 2),
(4, '2017_10_22_181149_create_products_table', 3),
(5, '2017_11_12_005451_create_product_category_table', 4),
(6, '2017_11_18_231851_create_variants_table', 5),
(7, '2017_12_28_301356_add_product_new_fields', 6),
(8, '2018_01_01_022001_imagefieldproducts', 7),
(9, '2018_01_01_102001_imagefieldproducts', 8),
(10, '2018_01_01_174610_addnewfieldsvariants', 9),
(11, '2018_01_15_004320_add_user_table', 10),
(12, '2018_01_15_171959_create_order_table', 11),
(13, '2018_01_15_182704_create_wishlist_table', 12),
(14, '2018_01_16_141023_add_product_variant_fields', 13),
(15, '2018_01_18_050313_add_orders_variants_field', 14);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `variants` text COLLATE utf8_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `subtotal` double NOT NULL,
  `total` double NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `product_id`, `variants`, `quantity`, `subtotal`, `total`, `status`, `created_at`, `updated_at`) VALUES
(8, 4, 9, '{"0":{"variant":"{\\"name\\":\\"M\\",\\"addprice\\":\\"333\\",\\"stock\\":\\"3\\"}","variant_name":"Size","variant_id":1},"1":{"variant":"{\\"name\\":\\"1GB\\",\\"addprice\\":\\"67\\",\\"stock\\":\\"88\\"}","variant_name":"RAM","variant_id":2},"2":{"variant":"{\\"name\\":\\"Pink\\",\\"addprice\\":\\"453\\",\\"stock\\":\\"333\\"}","variant_name":"Color","variant_id":3}}', 1, 1207.5, 1207.5, 0, '2018-01-18 09:29:15', '2018-01-18 09:29:15'),
(9, 4, 9, '{"0":{"variant":"{\\"name\\":\\"M\\",\\"addprice\\":\\"333\\",\\"stock\\":\\"3\\"}","variant_name":"Size","variant_id":1},"1":{"variant":"{\\"name\\":\\"1GB\\",\\"addprice\\":\\"67\\",\\"stock\\":\\"88\\"}","variant_name":"RAM","variant_id":2},"2":{"variant":"{\\"name\\":\\"Pink\\",\\"addprice\\":\\"453\\",\\"stock\\":\\"333\\"}","variant_name":"Color","variant_id":3}}', 1, 1207.5, 1207.5, 0, '2018-01-18 09:32:17', '2018-01-18 09:32:17'),
(10, 4, 9, '{"0":{"variant":"{\\"name\\":\\"M\\",\\"addprice\\":\\"333\\",\\"stock\\":\\"3\\"}","variant_name":"Size","variant_id":1},"1":{"variant":"{\\"name\\":\\"2GB\\",\\"addprice\\":\\"78\\",\\"stock\\":\\"78\\"}","variant_name":"RAM","variant_id":2},"2":{"variant":"{\\"name\\":\\"Pink\\",\\"addprice\\":\\"453\\",\\"stock\\":\\"333\\"}","variant_name":"Color","variant_id":3}}', 1, 1229.5, 1229.5, 0, '2018-01-18 09:40:43', '2018-01-18 09:40:43');

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
  `id` int(10) UNSIGNED NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `offer` double NOT NULL,
  `product_photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_photo_2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_photo_3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_photo_4` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `detail_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `store_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `offer_type` int(11) NOT NULL DEFAULT '0',
  `stock` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `stock_status` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `sale_available` int(11) NOT NULL DEFAULT '1',
  `weight` double(8,2) NOT NULL DEFAULT '0.00',
  `shipping_status` int(11) NOT NULL DEFAULT '1',
  `free_shipping` int(11) NOT NULL DEFAULT '1',
  `shipping_charge` double(8,2) NOT NULL DEFAULT '0.00',
  `meta_keywords` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `variants` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'A',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `description`, `price`, `offer`, `product_photo`, `product_photo_2`, `product_photo_3`, `product_photo_4`, `category_id`, `detail_description`, `store_id`, `offer_type`, `stock`, `stock_status`, `sale_available`, `weight`, `shipping_status`, `free_shipping`, `shipping_charge`, `meta_keywords`, `meta_description`, `variants`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Acer Predator Helios 300', 'kshdafjas', 10000, 10, 'product01-1517769902.png', 'product02-1517769151.png', 'product03-1517769151.png', 'product04-1517769152.png', 10, '<p></p><ul style="font-size: 14px;"><li class="_2-riNZ">NVIDIA GeForce GTX 1050Ti for desktop level performance</li><li class="_2-riNZ">128 GB SSD for reduced boot up time and in-game loading</li><li class="_2-riNZ">Optimized Dolby Audio Premium Sound Enhancement</li><li class="_2-riNZ">Dual Fan Cooling with Metal AeroBlade 3D</li><li class="_2-riNZ">Upgradable SSD upto 512 GB, RAM upto 32 GB</li><li class="_2-riNZ">Intel Core i7 Processor (7th Gen)</li><li class="_2-riNZ">8 GB DDR4 RAM</li><li class="_2-riNZ">64 bit Windows 10 Operating System</li><li class="_2-riNZ">1 TB HDD|128 GB SSD</li><li class="_2-riNZ">15.6 inch Display</li></ul><p></p>', 0, 0, 120, 1, 1, 22.56, 1, 1, 0.00, 'Acer Predator Helios 300', 'Acer Predator Helios 300 Core i7 7th Gen - (8 GB/1 TB HDD/128 GB SSD/Windows 10 Home/4 GB Graphics) G3-572 Gaming Laptop  (15.6 inch, Black, 2.7 kg)#OnlyOnFlipkart', '{"0":{"0":{"name":"500-GB","addprice":"12","stock":"10"},"1":{"name":"1-TB","addprice":"11","stock":"3"},"2":{"name":"2-TB","addprice":"34","stock":"56"},"variant_name":"Hard Drive","variant_id":4},"1":{"0":{"name":"4-GB","addprice":"12","stock":"1"},"1":{"name":"8-GB","addprice":"100","stock":"24"},"2":{"name":"16-GB","addprice":"23","stock":"12"},"variant_name":"RAM","variant_id":5}}', 'A', NULL, '2018-02-04 11:12:19', '2018-02-04 13:15:02'),
(2, 'Apple MacBook Air MQD32HN', 'Apple MacBook Air MQD32HN', 70000, 0, 'product01-1517768864.png', 'product02-1517769072.png', 'product03-1517769072.png', 'product04-1517769073.png', 10, '<ul class="a-unordered-list a-vertical a-spacing-none" style="font-size: 13px;"><li><span class="a-list-item">All new 2017 Apple MacBook Air</span></li><li><span class="a-list-item">1.8GHz Intel Core i5 processor</span></li><li><span class="a-list-item">8GB LPDDR3 RAM, 128GB Solid State hard drive</span></li><li><span class="a-list-item">13.3-inch screen, Intel HD Graphics 6000</span></li><li><span class="a-list-item">MacOS Sierra operating system</span></li><li><span class="a-list-item">1.35kg laptop</span></li><li><span class="a-list-item">1440x900 pixels per inch with support for millions of colors, 720p FaceTime HD camera</span></li><li><span class="a-list-item">1 year warranty from manufacturer from date of purchase</span></li></ul>', 0, 0, 100, 1, 1, 45.00, 1, 1, 0.00, 'Apple MacBook Air MQD32HN/A 13.3-inch Laptop 2017', 'Apple MacBook Air MQD32HN/A 13.3-inch Laptop 2017', '{"0":{"0":{"name":"500-GB","addprice":"4500","stock":"122"},"1":{"name":"1-TB","addprice":"120","stock":"12"},"2":{"name":"2-TB","addprice":"120","stock":"12"},"variant_name":"Hard Drive","variant_id":4},"1":{"0":{"name":"4-GB","addprice":"12","stock":"12"},"1":{"name":"8-GB","addprice":"12","stock":"120"},"2":{"name":"16-GB","addprice":"12","stock":"120"},"variant_name":"RAM","variant_id":5}}', 'A', NULL, '2018-02-04 12:17:26', '2018-02-04 13:01:13'),
(3, 'Oricum Boxer-303 Sneakers For Men', 'Oricum Boxer-303 Sneakers For Men', 300, 20, 'product01-1517769651.png', 'product02-1517769652.png', 'product03-1517769652.png', 'product04-1517769652.png', 12, '<div class="HoUsOy" style="font-size: 18px;">General</div><ul style="font-size: 14px;"><li class="_1KuY3T row" style="width: 668px;"><div class="vmXPri col col-3-12" style="vertical-align: top;width: 167px;">Model Name</div><ul class="_3dG3ix col col-9-12" style="vertical-align: top;width: 501px;"><li class="sNqDog">Boxer-303</li></ul></li><li class="_1KuY3T row" style="width: 668px;"><div class="vmXPri col col-3-12" style="vertical-align: top;width: 167px;">Ideal For</div><ul class="_3dG3ix col col-9-12" style="vertical-align: top;width: 501px;"><li class="sNqDog">Men</li></ul></li><li class="_1KuY3T row" style="width: 668px;"><div class="vmXPri col col-3-12" style="vertical-align: top;width: 167px;">Occasion</div><ul class="_3dG3ix col col-9-12" style="vertical-align: top;width: 501px;"><li class="sNqDog">Casual</li></ul></li><li class="_1KuY3T row" style="width: 668px;"><div class="vmXPri col col-3-12" style="vertical-align: top;width: 167px;">Outer Material</div><ul class="_3dG3ix col col-9-12" style="vertical-align: top;width: 501px;"><li class="sNqDog">Canvas</li></ul></li><li class="_1KuY3T row" style="width: 668px;"><div class="vmXPri col col-3-12" style="vertical-align: top;width: 167px;">School Shoe</div><ul class="_3dG3ix col col-9-12" style="vertical-align: top;width: 501px;"><li class="sNqDog">No</li></ul></li></ul>', 0, 0, 10, 1, 1, 1.00, 1, 1, 0.00, 'Oricum Boxer-303 Sneakers For Men', 'Oricum Boxer-303 Sneakers For MenOricum Boxer-303 Sneakers For Men', '{"0":{"0":{"name":"6","addprice":"100","stock":"11"},"1":{"name":"7","addprice":"200","stock":"11"},"2":{"name":"8","addprice":"45","stock":"10"},"3":{"name":"9"},"4":{"name":"10"},"variant_name":"Shoe Size","variant_id":6}}', 'A', NULL, '2018-02-04 13:10:53', '2018-02-04 13:10:53'),
(4, 'Acer Aspire 5 Core i5 8th Gen', 'Acer Aspire 5 Core i5 8th Gen - (8 GB/1 TB HDD/Windows 10 Home/2 GB Graphics) A515-51G Laptop  (15.6 inch, Black, 2.2 kg)', 45000, 10, 'product01-1517771505.png', 'product02-1517771506.png', 'product03-1517771506.png', 'product04-1517771506.png', 10, '<div class="_2UDlNd" style="font-size: 18px;"><div><h1 class="_3eAQiD" style="font-size: inherit;">Acer Aspire 5 Core i5 8th Gen - (8 GB/1 TB HDD/Windows 10 Home/2 GB Graphics) A515-51G Laptop  (15.6 inch, Black, 2.2 kg)</h1></div></div><div style="font-size: 14px;"><div class="_1dlNCg"></div></div>', 0, 0, 10, 1, 1, 45.00, 1, 1, 0.00, 'Acer Aspire 5 Core i5 8th Gen - (8 GB/1 TB HDD/Windows 10 Home/2 GB Graphics) A515-51G Laptop  (15.6 inch, Black, 2.2 kg)', 'Acer Aspire 5 Core i5 8th Gen - (8 GB/1 TB HDD/Windows 10 Home/2 GB Graphics) A515-51G Laptop  (15.6 inch, Black, 2.2 kg)', '{"0":{"0":{"name":"500-GB","stock":"10","addprice":"56"},"1":{"name":"1-TB","addprice":"120","stock":"10"},"2":{"name":"2-TB"},"variant_name":"Hard Drive","variant_id":4},"1":{"0":{"name":"4-GB","addprice":"12","stock":"10"},"1":{"name":"8-GB","addprice":"12","stock":"10"},"2":{"name":"16-GB"},"variant_name":"RAM","variant_id":5}}', 'A', NULL, '2018-02-04 13:41:47', '2018-02-04 13:42:50'),
(5, 'Apple iPhone SE', 'Apple iPhone SE (Space Grey, 32 GB)', 45000, 10, 'product01-1517772008.png', 'product02-1517772008.png', 'product03-1517772009.png', 'product04-1517772009.png', 2, '<div class="_2UDlNd" style="font-size: 18px;"><div><h1 class="_3eAQiD" style="font-size: inherit;">Apple iPhone SE (Space Grey, 32 GB)</h1></div></div><div style="font-size: 14px;"><div class="_1dlNCg"></div></div>', 0, 0, 10, 1, 1, 0.78, 1, 1, 0.00, 'Apple iPhone SE (Space Grey, 32 GB)', 'Apple iPhone SE (Space Grey, 32 GB)', '{"0":{"0":{"name":"1GB","addprice":"1200","stock":"10"},"1":{"name":"2GB","addprice":"1590","stock":"10"},"2":{"name":"3GB","addprice":"1200","stock":"10"},"3":{"name":"4GB","addprice":"1500","stock":"10"},"variant_name":"RAM","variant_id":2}}', 'A', NULL, '2018-02-04 13:50:09', '2018-02-04 13:50:09'),
(6, 'Samsung Galaxy J7 Prime (Black, 32 GB)  (3 GB RAM)', 'Samsung Galaxy J7 Prime (Black, 32 GB)  (3 GB RAM)', 5600, 12, 'product01-1517772596.png', 'product02-1517772597.png', 'product03-1517772597.png', 'product04-1517772597.png', 2, '<p>Samsung Galaxy J7 Prime (Black, 32 GB)  (3 GB RAM)<br/></p>', 0, 0, 19, 1, 1, 124324.00, 1, 1, 0.00, 'Samsung Galaxy J7 Prime (Black, 32 GB)  (3 GB RAM)', 'Samsung Galaxy J7 Prime (Black, 32 GB)  (3 GB RAM)', '{"0":{"0":{"name":"1GB","addprice":"10","stock":"1"},"1":{"name":"2GB","addprice":"4556","stock":"12"},"2":{"name":"3GB","addprice":"456","stock":"19"},"3":{"name":"4GB"},"variant_name":"RAM","variant_id":2}}', 'A', NULL, '2018-02-04 13:59:57', '2018-02-04 13:59:57'),
(7, 'Adidas ASTROLITE M Running Shoes For Men  (Black, Blue)', 'Adidas ASTROLITE M Running Shoes For Men  (Black, Blue)', 2000, 10, 'product01-1517772906.png', 'product02-1517772906.png', 'product03-1517772907.png', 'product04-1517772907.png', 12, '<div class="_2UDlNd" style="font-size: 18px;"><div><h1 class="_3eAQiD" style="font-size: inherit;">Adidas ASTROLITE M Running Shoes For Men  (Black, Blue)</h1></div></div><div style="font-size: 14px;"><div class="_1dlNCg"></div></div>', 0, 0, 12, 1, 1, 11.00, 1, 1, 0.00, 'Adidas ASTROLITE M Running Shoes For Men  (Black, Blue)', 'Adidas ASTROLITE M Running Shoes For Men  (Black, Blue)', '{"0":{"0":{"name":"6","addprice":"100","stock":"120"},"1":{"name":"7","addprice":"100","stock":"11"},"2":{"name":"8","addprice":"190","stock":"19"},"3":{"name":"9","addprice":"19","stock":"11"},"4":{"name":"10"},"variant_name":"Shoe Size","variant_id":6}}', 'A', NULL, '2018-02-04 14:05:07', '2018-02-04 14:05:07'),
(8, 'Puma Hip Hop 5 DP Sneakers For Men  (Blue)', 'Puma Hip Hop 5 DP Sneakers For Men  (Blue)', 5600, 11, 'product01-1517773114.png', 'product02-1517773114.png', 'product03-1517773115.png', 'product04-1517773115.png', 12, '<div class="_2UDlNd" style="font-size: 18px;"><div><h1 class="_3eAQiD" style="font-size: inherit;">Puma Hip Hop 5 DP Sneakers For Men  (Blue)</h1></div></div><div style="font-size: 14px;"><div class="_1dlNCg"></div></div>', 0, 0, 11, 1, 1, 111.00, 1, 1, 0.00, 'Puma Hip Hop 5 DP Sneakers For Men  (Blue)', 'Puma Hip Hop 5 DP Sneakers For Men  (Blue)', '{"0":{"0":{"name":"6","addprice":"14","stock":"11"},"1":{"name":"7","addprice":"11","stock":"11"},"2":{"name":"8","addprice":"11","stock":"11"},"3":{"name":"9","addprice":"11","stock":"11"},"4":{"name":"10","addprice":"11","stock":"11"},"variant_name":"Shoe Size","variant_id":6}}', 'A', NULL, '2018-02-04 14:08:35', '2018-02-04 14:08:35'),
(9, 'Super Matteress Klicker-678', 'Super Matteress Klicker-678 Sneakers For Men  (Multicolor)', 500, 10, 'product01-1517791691.png', 'product02-1517791692.png', 'product03-1517791692.png', 'product04-1517791692.png', 12, '<div class="_2UDlNd" style="font-size: 18px;"><div><h1 class="_3eAQiD" style="font-size: inherit;">Super Matteress Klicker-678 Sneakers For Men  (Multicolor)</h1></div></div><div style="font-size: 14px;"><div class="_1dlNCg"></div></div>', 0, 0, 100, 1, 1, 34.00, 1, 1, 0.00, 'Super Matteress Klicker-678 Sneakers For Men  (Multicolor)', 'Super Matteress Klicker-678 Sneakers For Men  (Multicolor)', '{"0":{"0":{"name":"6","addprice":"100","stock":"1"},"1":{"name":"7","addprice":"120","stock":"11"},"2":{"name":"8","addprice":"120","stock":"12"},"3":{"name":"9","addprice":"130","stock":"12"},"4":{"name":"10","addprice":"123","stock":"10"},"variant_name":"Shoe Size","variant_id":6}}', 'A', NULL, '2018-02-04 19:18:13', '2018-02-04 19:18:13'),
(10, 'Puma Hip Hop 5 DP Sneakers For Men  (Black)', 'Puma Hip Hop 5 DP Sneakers For Men  (Black)', 1000, 10, 'product01-1517791940.png', 'product02-1517791940.png', 'product03-1517791941.png', 'product04-1517791941.png', 12, '<div class="_2UDlNd" style="font-size: 18px;"><div><h1 class="_3eAQiD" style="font-size: inherit;">Puma Hip Hop 5 DP Sneakers For Men  (Black)</h1></div></div><div style="font-size: 14px;"><div class="_1dlNCg"></div></div>', 0, 0, 101, 1, 1, 56.00, 1, 1, 0.00, 'Puma Hip Hop 5 DP Sneakers For Men  (Black)', 'Puma Hip Hop 5 DP Sneakers For Men  (Black)', '{"0":{"0":{"name":"6","addprice":"10","stock":"10"},"1":{"name":"7","addprice":"120","stock":"90"},"2":{"name":"8","addprice":"100","stock":"10"},"3":{"name":"9","addprice":"110","stock":"10"},"4":{"name":"10","addprice":"110","stock":"110"},"variant_name":"Shoe Size","variant_id":6}}', 'A', NULL, '2018-02-04 19:22:21', '2018-02-04 19:22:21');

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `main_category` int(11) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`id`, `category_name`, `main_category`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Electronics', 0, 'A', NULL, '2017-11-18 11:56:23'),
(2, 'Phone', 1, 'A', '2017-11-12 21:00:53', '2017-11-12 21:00:53'),
(3, 'Nokia', 2, 'A', '2017-11-12 21:01:24', '2017-11-12 21:01:24'),
(4, 'Nokia Lumia', 3, 'A', '2017-11-12 21:01:24', '2017-11-12 21:01:24'),
(5, 'Furniture', 0, 'A', '2017-11-12 20:17:52', '2017-11-12 20:17:52'),
(6, 'Toys', 0, 'A', '2017-11-12 20:19:08', '2017-11-12 20:19:08'),
(7, 'Books', 0, 'A', '2017-11-12 20:20:04', '2017-11-12 20:20:04'),
(8, 'Home Appliances', 1, 'A', '2017-11-18 19:50:58', '2017-11-18 19:50:58'),
(9, 'Clothing', 0, 'A', '2017-11-26 18:21:58', '2017-11-26 18:21:58'),
(10, 'Laptops', 1, 'A', '2018-02-04 10:33:05', '2018-02-04 10:33:05'),
(11, 'Mens', 9, 'A', '2018-02-04 13:06:41', '2018-02-04 13:06:41'),
(12, 'Shoes', 11, 'A', '2018-02-04 13:07:00', '2018-02-04 13:07:00'),
(13, 'Samsung', 2, 'A', '2018-02-04 13:44:17', '2018-02-04 13:44:17');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Ram', 'ramkumar@mail.com', '', '$2y$10$rAcgJCRhoz3aVJY/XKneQ.7u4Ug0/h853rp.XPMyAdJBRaoz/27Ke', 'Imr1pTFrLDalKwhKViVbtfj5DSaCx2MFjdVo86WVS71u4vMgEmX3Zu2VuR2Z', '2017-10-15 18:05:37', '2017-10-15 18:05:37'),
(2, 'ram', 'ram111@mailinator.com', '', '$2y$10$43Qihi4pKR.OKRAwfjZTMunSWaIZtqxp9FiSwphEywMuZML6h5Jsu', NULL, '2017-10-22 19:10:17', '2017-10-22 19:10:17'),
(3, 'asdfsd', 'jsgdf@sadfs.com', '3425345453', '$2y$10$V9FgaiRtvO.iWHFdpb74We/0gmTMxKmzSvJ3RPmZyup.4gNuu11ze', NULL, '2018-01-14 19:34:35', '2018-01-14 19:34:35'),
(4, 'ramkumar', 'ram@gmail.com', '7373246886', '$2y$10$O6jwiRxBRv9KoxGKhxqwFug5PD1wGU7DvakdX935M3JuNy5ycIfSu', '3SXFtnYTVAutbkggm7ylNahO94EyxF0myqCdyKEfVcH8uGkcylfxsinIU1cN', '2018-01-15 10:50:41', '2018-01-15 10:50:41');

-- --------------------------------------------------------

--
-- Table structure for table `variants`
--

CREATE TABLE `variants` (
  `id` int(10) UNSIGNED NOT NULL,
  `variant_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `variant_type` int(11) NOT NULL,
  `variant_value` text COLLATE utf8_unicode_ci NOT NULL,
  `product_category_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `variants`
--

INSERT INTO `variants` (`id`, `variant_name`, `variant_type`, `variant_value`, `product_category_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Size', 2, 'S,M,XL', '1', 'A', '2017-11-18 19:12:17', '2018-01-17 22:39:42'),
(2, 'RAM', 1, '1GB,2GB,3GB,4GB', '2', 'A', '2018-01-01 12:34:02', '2018-02-04 13:45:51'),
(3, 'Color', 1, 'Pink,White,Red,Black', '1', 'A', '2018-01-17 22:36:51', '2018-01-17 22:41:10'),
(4, 'Hard Drive', 1, '500-GB,1-TB,2-TB', '10', 'A', '2018-02-04 10:37:27', '2018-02-04 10:37:27'),
(5, 'RAM', 1, '4-GB,8-GB,16-GB', '10', 'A', '2018-02-04 10:38:27', '2018-02-04 10:38:27'),
(6, 'Shoe Size', 1, '6,7,8,9,10', '12', 'A', '2018-02-04 13:08:02', '2018-02-04 13:08:02');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
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
  ADD UNIQUE KEY `products_product_name_unique` (`product_name`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `variants`
--
ALTER TABLE `variants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `variants`
--
ALTER TABLE `variants`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
