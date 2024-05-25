-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th5 25, 2024 lúc 03:48 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `mystore`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `fullname` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `forgot_token` varchar(200) DEFAULT NULL,
  `active_token` varchar(200) DEFAULT NULL,
  `status` int(11) DEFAULT 0,
  `create_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `fullname`, `email`, `phone_number`, `image`, `forgot_token`, `active_token`, `status`, `create_at`, `update_at`) VALUES
(1, 'huynhminhtam', '$2y$10$tqvXX4gzPZUfww/BHuYjQ.UfUi1DumrSqPlX8F.4sUX8Y9j5nfBh2', 'Huỳnh Minh Tâm', 'huynhminhtamm2002@gmail.com', '0878100084', '1.png', 'c098b41caad6a4696c71b2f9d407a1a465cec196', NULL, 1, NULL, '2024-05-13 13:45:08'),
(38, 'tuongvy', '$2y$10$GKhCaj/w35160nB3iXite.PlW6Dt.xexQSg4Moi4qSOPPaSuwS77C', 'Nguyễn Thị Tường Vy', 'vyvy@gmail.com', '0989293940', NULL, NULL, NULL, 1, '2024-05-22 11:13:01', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `adminToken`
--

CREATE TABLE `adminToken` (
  `id` int(11) NOT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `token` varchar(200) DEFAULT NULL,
  `create_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `adminToken`
--

INSERT INTO `adminToken` (`id`, `admin_id`, `token`, `create_at`) VALUES
(44, 1, '0c703eea710da0468a1c759e5b16e3bc28b5d943', '2024-05-18 14:39:25'),
(46, 1, 'a6fac9825453463a66c0b8bcc04d37df60f6502f', '2024-05-19 05:27:20'),
(48, 1, 'b0ae758616b0575337a34cb574e1216f2409030b', '2024-05-20 16:54:32'),
(56, 1, '31df60846cb9f6163294051271a558b4a434ee67', '2024-05-24 20:42:10');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `authors`
--

CREATE TABLE `authors` (
  `id` int(11) NOT NULL,
  `author_name` varchar(50) NOT NULL,
  `status` int(11) DEFAULT 1,
  `create_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `authors`
--

INSERT INTO `authors` (`id`, `author_name`, `status`, `create_at`, `update_at`) VALUES
(3, 'Nam Cao', 1, '2024-05-13 16:54:16', '2024-05-14 17:01:26'),
(4, 'Thạch Lam', 1, '2024-05-13 16:54:16', '2024-05-13 16:54:16'),
(5, 'Nguyễn Tuân', 1, '2024-05-13 16:54:16', '2024-05-13 16:54:16'),
(6, 'Ngô Tất Tố', 1, '2024-05-13 16:54:16', '2024-05-13 16:54:16'),
(7, 'Vũ Trọng Phụng', 1, '2024-05-13 16:54:16', '2024-05-13 16:54:16'),
(8, 'Thanh Tịnh', 1, '2024-05-13 16:54:16', '2024-05-13 16:54:16'),
(9, 'Nguyên Hồng', 1, '2024-05-13 16:54:16', '2024-05-13 16:54:16'),
(10, 'Đoàn giỏi', 1, '2024-05-13 16:54:16', '2024-05-13 16:54:16'),
(11, 'Nguyễn Công Hoan', 1, '2024-05-13 16:54:16', '2024-05-13 16:54:16'),
(12, 'Tô Hoài', 1, '2024-05-13 16:54:16', '2024-05-13 16:54:16'),
(23, 'Khoa CNTT', 1, '2024-05-18 10:23:04', NULL),
(24, 'Paulo Coelho', 1, '2024-05-18 13:36:23', NULL),
(25, 'Antoine de Saint-Exupéry', 1, '2024-05-18 15:01:29', NULL),
(26, 'Dân gian', 1, '2024-05-18 15:02:48', NULL),
(27, 'Nguyễn Công Kiệt', 1, '2024-05-18 15:05:29', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `brands`
--

CREATE TABLE `brands` (
  `id` int(11) NOT NULL,
  `brand_name` varchar(50) DEFAULT NULL,
  `status` int(11) DEFAULT 0,
  `create_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `brands`
--

INSERT INTO `brands` (`id`, `brand_name`, `status`, `create_at`, `update_at`) VALUES
(1, 'Thiên Long', 1, '2024-05-24 20:55:17', NULL),
(2, 'Casio', 1, '2024-05-24 20:55:17', '2024-05-25 10:16:38');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `custommer_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `create_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `custommers`
--

CREATE TABLE `custommers` (
  `id` int(11) NOT NULL,
  `fullname` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL,
  `forgot_token` varchar(200) DEFAULT NULL,
  `active_token` varchar(200) DEFAULT NULL,
  `status` int(11) DEFAULT 0,
  `create_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `genres`
--

CREATE TABLE `genres` (
  `id` int(11) NOT NULL,
  `genre_name` varchar(50) NOT NULL,
  `status` int(11) DEFAULT 1,
  `create_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `genres`
--

INSERT INTO `genres` (`id`, `genre_name`, `status`, `create_at`, `update_at`) VALUES
(3, 'Sách thiếu nhi', 1, '2024-05-13 16:58:09', '2024-05-13 15:33:44'),
(4, 'Sách tâm lý', 1, '2024-05-13 16:58:16', '2024-05-13 16:58:09'),
(5, 'Sách tôn giáo', 1, '2024-05-13 16:58:21', '2024-05-13 16:58:09'),
(6, 'Sách văn hoá, xã hội', 1, '2024-05-13 16:58:26', '2024-05-13 16:58:09'),
(7, 'Sách tiểu sử', 1, '2024-05-13 16:58:28', '2024-05-13 16:58:09'),
(8, 'Sách kinh dị', 1, '2024-05-13 16:58:29', '2024-05-13 16:58:09'),
(9, 'Sách tiểu thuyết', 1, '2024-05-13 16:58:31', '2024-05-14 13:12:21'),
(11, 'Truyện linh ta linh tinh', 1, '2024-05-14 06:12:44', '2024-05-14 12:11:20'),
(13, 'Giáo trình công nghệ thông tin', 1, '2024-05-18 10:22:48', NULL),
(14, 'Sách văn học', 1, '2024-05-18 11:28:01', '2024-05-18 15:06:33'),
(15, 'Kinh tế', 1, '2024-05-18 11:28:10', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `image` varchar(200) DEFAULT NULL,
  `type` varchar(20) DEFAULT NULL,
  `status` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `images`
--

INSERT INTO `images` (`id`, `image`, `type`, `status`) VALUES
(2, '2.jpg', 'slider', 1),
(3, '3.jpg', 'slider', 1),
(4, '4.png', 'slider', 0),
(5, '1716047376.jpg', 'slider', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `inventory`
--

CREATE TABLE `inventory` (
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `inventory_log`
--

CREATE TABLE `inventory_log` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `change_quantity` int(11) DEFAULT NULL,
  `purchase_price` double DEFAULT NULL,
  `create_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `slug` mediumtext DEFAULT NULL,
  `title` mediumtext DEFAULT NULL,
  `description` mediumtext DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `create_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `news`
--

INSERT INTO `news` (`id`, `slug`, `title`, `description`, `type`, `image`, `status`, `create_at`, `update_at`) VALUES
(11, 'bai-viet-3', 'Bài viết 3', '<h2>Bài viết 1</h2>', 'new', NULL, 1, '2024-05-25 15:50:30', '2024-05-25 15:58:02');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `order_date` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `total_price` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `subtotal` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_step`
--

CREATE TABLE `order_step` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `create_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `origins`
--

CREATE TABLE `origins` (
  `id` int(11) NOT NULL,
  `country_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `origins`
--

INSERT INTO `origins` (`id`, `country_name`) VALUES
(1, 'Việt Nam');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `slug` varchar(200) DEFAULT NULL,
  `title` varchar(50) DEFAULT NULL,
  `product_type_id` int(11) DEFAULT NULL,
  `genre_id` int(11) DEFAULT NULL,
  `author_id` int(11) DEFAULT NULL,
  `publisher_id` int(11) DEFAULT NULL,
  `ISBN` varchar(50) DEFAULT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `origin_id` int(11) DEFAULT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `description` mediumtext DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `discount` double DEFAULT NULL,
  `stock_quantity` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT 0,
  `create_at` timestamp NULL DEFAULT NULL,
  `update_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `slug`, `title`, `product_type_id`, `genre_id`, `author_id`, `publisher_id`, `ISBN`, `product_name`, `origin_id`, `brand_id`, `description`, `image`, `price`, `discount`, `stock_quantity`, `status`, `create_at`, `update_at`) VALUES
(3, 'tat-den', 'Tắt đèn', 1, 9, 6, NULL, NULL, NULL, NULL, NULL, '<p>Tắt đèn</p>', NULL, 90000, 90000, NULL, 1, NULL, '2024-05-23 07:37:40'),
(4, 'leu-chong', 'Lều Chõng', 1, 9, 6, NULL, NULL, NULL, NULL, NULL, '<p>Lều Chõng</p>', '1716046451.jpeg', 90000, 90000, NULL, 1, NULL, '2024-05-24 13:49:55'),
(5, 'song-mon', 'Sống Mòn', 1, 9, 3, NULL, NULL, NULL, NULL, NULL, '&#60;p&#62;Sống Mòn&#60;/p&#62;', '', 90000, 90000, NULL, 1, NULL, '2024-05-18 04:20:08'),
(6, 'dat-rung-phuong-nam', 'Đất rừng phương nam', 1, 9, 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL),
(7, 'so-do', 'Số đỏ', 1, 14, 7, NULL, NULL, NULL, NULL, NULL, '<p>Số đỏ</p>', '1716025212.jpg', 10000, 10000, NULL, 1, NULL, '2024-05-18 06:01:57'),
(8, 'vo-de', 'Vỡ Đê', 1, 9, 7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL),
(9, 'de-men-phieu-luu-ky', 'Dế mèn phiêu lưu ký', 1, 9, 12, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL),
(65, 'chi-pheo', 'Chí phèo', 1, 14, 3, NULL, NULL, NULL, NULL, NULL, '<p><strong>THÔNG TIN CHI TIẾT</strong></p><p>Nhà xuất bản: NXB Thanh Niên</p><p>Ngày xuất bản: 16/04/2024</p><p>Nhà phát hành: AZ Việt Nam</p><p>Kích thước: 12.0 x 19.0 x 1.0 cm</p><p>Số trang: 120 trang</p><p>Trọng lượng: 300 gram</p>', '1716025075.jpg', 900000, 900000, NULL, 1, '2024-05-18 04:37:55', '2024-05-18 05:45:08'),
(66, 'nha-gia-kim', 'Nhà giả kim', 1, 14, 24, NULL, NULL, NULL, NULL, NULL, '<p>Nhà giả kim</p>', '1716032236.jpg', 90000, 80000, NULL, 1, '2024-05-18 06:37:16', '2024-05-18 09:07:03'),
(67, 'hoang-tu-be', 'Hoàng tử bé', 1, 3, 25, NULL, NULL, NULL, NULL, NULL, '<p>Hoàng tử bé</p>', '1716037282.jpg', 900000, 900000, NULL, 1, '2024-05-18 08:01:22', '2024-05-18 08:01:41'),
(68, 'so-dua', 'Sọ dừa', 1, 3, 26, NULL, NULL, NULL, NULL, NULL, '<p>Sọ dừa</p>', '1716037465.jpeg', 80000, 80000, NULL, 1, '2024-05-18 08:04:25', '2024-05-18 09:06:33'),
(69, 'nhung-giac-mo-xanh', 'Những giấc mơ xanh', 1, 3, 27, NULL, NULL, NULL, NULL, NULL, '<p>Những giấc mơ xanh</p>', '1716037564.jpg', 900000, 900000, NULL, 1, '2024-05-18 08:06:04', '2024-05-18 08:07:16'),
(81, 'but-bi-do', NULL, 2, NULL, NULL, NULL, NULL, 'Bút bi đỏ', 1, 1, '<p>đỏ lè đỏ lét</p>', '1716627873.jpg', 50000, 50000, NULL, 1, '2024-05-24 14:34:05', '2024-05-25 09:04:33');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_types`
--

CREATE TABLE `product_types` (
  `id` int(11) NOT NULL,
  `product_type` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `product_types`
--

INSERT INTO `product_types` (`id`, `product_type`) VALUES
(1, 'Sách'),
(2, 'Văn phòng phẩm');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `publishers`
--

CREATE TABLE `publishers` (
  `id` int(11) NOT NULL,
  `publisher_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `publishers`
--

INSERT INTO `publishers` (`id`, `publisher_name`) VALUES
(1, 'Vũ sáng tác'),
(2, 'Hoàng Dũng sáng tác');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `shipping_addresses`
--

CREATE TABLE `shipping_addresses` (
  `address_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `address` int(11) NOT NULL,
  `city` int(11) NOT NULL,
  `province` int(11) NOT NULL,
  `country` int(11) NOT NULL,
  `zip_code` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `adminToken`
--
ALTER TABLE `adminToken`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_id` (`admin_id`);

--
-- Chỉ mục cho bảng `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `custommer_id` (`custommer_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `custommers`
--
ALTER TABLE `custommers`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `inventory`
--
ALTER TABLE `inventory`
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `inventory_log`
--
ALTER TABLE `inventory_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Chỉ mục cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `order_step`
--
ALTER TABLE `order_step`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_id` (`admin_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Chỉ mục cho bảng `origins`
--
ALTER TABLE `origins`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `author_id` (`author_id`),
  ADD KEY `genre_id` (`genre_id`),
  ADD KEY `product_type_id` (`product_type_id`),
  ADD KEY `brand_id` (`brand_id`),
  ADD KEY `origin_id` (`origin_id`);

--
-- Chỉ mục cho bảng `product_types`
--
ALTER TABLE `product_types`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `publishers`
--
ALTER TABLE `publishers`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `shipping_addresses`
--
ALTER TABLE `shipping_addresses`
  ADD PRIMARY KEY (`address_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT cho bảng `adminToken`
--
ALTER TABLE `adminToken`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT cho bảng `authors`
--
ALTER TABLE `authors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT cho bảng `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `custommers`
--
ALTER TABLE `custommers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `genres`
--
ALTER TABLE `genres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `inventory_log`
--
ALTER TABLE `inventory_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `order_step`
--
ALTER TABLE `order_step`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `origins`
--
ALTER TABLE `origins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT cho bảng `product_types`
--
ALTER TABLE `product_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `publishers`
--
ALTER TABLE `publishers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `adminToken`
--
ALTER TABLE `adminToken`
  ADD CONSTRAINT `admintoken_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`id`);

--
-- Các ràng buộc cho bảng `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`custommer_id`) REFERENCES `custommers` (`id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Các ràng buộc cho bảng `inventory`
--
ALTER TABLE `inventory`
  ADD CONSTRAINT `inventory_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Các ràng buộc cho bảng `inventory_log`
--
ALTER TABLE `inventory_log`
  ADD CONSTRAINT `inventory_log_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `custommers` (`id`);

--
-- Các ràng buộc cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Các ràng buộc cho bảng `order_step`
--
ALTER TABLE `order_step`
  ADD CONSTRAINT `order_step_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`id`),
  ADD CONSTRAINT `order_step_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`);

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `authors` (`id`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`genre_id`) REFERENCES `genres` (`id`),
  ADD CONSTRAINT `products_ibfk_3` FOREIGN KEY (`product_type_id`) REFERENCES `product_types` (`id`),
  ADD CONSTRAINT `products_ibfk_4` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`),
  ADD CONSTRAINT `products_ibfk_5` FOREIGN KEY (`origin_id`) REFERENCES `origins` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
