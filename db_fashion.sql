-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 16, 2020 lúc 10:19 AM
-- Phiên bản máy phục vụ: 10.4.6-MariaDB
-- Phiên bản PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `db_fashion`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `cate_id` int(10) UNSIGNED NOT NULL,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `cate_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cate_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `cate_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`cate_id`, `meta_keywords`, `cate_name`, `cate_desc`, `cate_slug`, `created_at`, `updated_at`) VALUES
(1, 'Áo thun nam chất lượng cao', 'ÁO THUN NAM', 'Mô tả áo thun nam', 'áo thun nam', NULL, NULL),
(2, '', 'ÁO SƠ MI NAM', 'Mô tả áo sơ mi nam', 'áo sơ mi nam', NULL, NULL),
(3, '', 'QUẦN JEAN NAM', 'Mô tả quần jean nam', 'quần jean nam', NULL, NULL),
(4, '', 'QUẦN TÂY NAM', 'Mô tả quần tây nam', 'quần tây nam', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
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
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_02_28_064452_vp_user', 1),
(5, '2020_03_03_134926_category', 2),
(6, '2020_03_09_062137_vp_product', 3),
(7, '2020_03_16_124422_vp_customer', 4),
(8, '2020_03_20_134105_vp_posts', 5),
(9, '2020_03_23_123313_vp_orders', 6),
(10, '2020_03_23_124908_vp_orders_detail', 7),
(11, '2020_03_25_043026_vp_promotions', 8),
(12, '2020_03_30_124303_vp_slide', 9),
(13, '2020_04_14_194902_vp_brand', 10),
(14, '2020_04_18_194815_vp_sizes', 11);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time_code` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `address`, `email_verified_at`, `password`, `remember_token`, `code`, `time_code`, `created_at`, `updated_at`) VALUES
(1, 'Sang Lê', 'adminsang@gmail.com', '1696947248', 'Đồng Nai', NULL, '$2y$10$ijPc1spoRzLe7lYCgx4Lg.EvwJz4qHK7ZydDbr5sXNGwyfIOs2U/G', 'EujLIn4bYgTOXDE7cnUI1jruqxzYeMxLLiKlpw3ZPISn45dJ6HbdrGcm8X1e', '$2y$10$AKiKjzSNXetOGfVztKFyfu88F0s9hmZaRptv49DyCiRzAtlTMqmB.', '2020-04-09 14:32:15', '2020-03-29 06:22:22', '2020-04-09 14:32:15'),
(2, 'Sang Lê', 'admin@gmail.com', '1696947248', 'Đồng Nai', NULL, '$2y$10$9l/5sPQGkB9OemSsQrWmO.d6YKJWXTabwDT5ndWHTe0B4IP3jVHZK', NULL, '$2y$10$Cn1mzdfU/r336maMvaZOOuGO1cRB/.R1XcVFQOnl8GNZZwoFpPtxu', '2020-04-09 14:14:13', '2020-03-29 06:45:48', '2020-04-09 14:14:13'),
(4, 'Sang Lê', 'admintam@gmail.com', '1696947248', 'Đồng Nai', NULL, '$2y$10$u0uMbPmRAs118rXBNdl9/.wtZbCHFgi24PwJrSiuJhrrEwk74aGdC', '5KzCL4masZT0xiOcuowyKTnUIq1KZCMeo0UhgXHrMXlVsR65wDsOUqN4dOLd', NULL, NULL, '2020-03-29 06:50:55', '2020-03-29 06:50:55'),
(5, 'Sang Lê', 'lesang0169@gmail.com', '1696947248', 'Đồng Nai', NULL, '$2y$10$IPu/2QmbtbSs2irRsMsYqe.r6U3dFcnrFBwe3xYiminkdjslShjHq', NULL, '$2y$10$..K6WqlvmP2RzkwKu4OJyOaHS.ME.ZXgJCeDLnDGtYUQFsVhOHUn6', '2020-04-09 15:32:49', '2020-04-09 14:33:18', '2020-04-09 15:32:49'),
(6, 'Sang Lê', 'lesan0169@gmail.com', '0377411130', 'Bình Dương', NULL, '$2y$10$flJPxQINr5M3mYD7bFndsek09timCLsOWAZ2kcuVBvGR5XYg5vDQS', '1GdlVzqLazIKgHsJSHSJaL8kcHf5J84DlAM6i8yVllkKP2vd1kRPiW0JrUdz', '$2y$10$DhxAdrNkSs3Zf5ZFDurvCOIlt1sRjZR1urLrJut0B9EDaya5lIUCW', '2020-04-09 15:49:42', '2020-04-09 15:37:44', '2020-04-11 05:49:02'),
(7, 'Sang Lê', 'tamht298@gmail.com', '1696947248', 'Đồng Nai', NULL, '$2y$10$ZK9h.kNHG.I8uXHb0a6TAeZaKYP.hNC9XKVTmU9rlDaY6XyhEFKNG', NULL, NULL, NULL, '2020-05-05 14:43:06', '2020-05-05 14:43:06'),
(8, 'tan', 'trantan5984979999@gmail.com', '0987654321234', 'bd', NULL, '$2y$10$FMgYTJYnikTuERAAKVFklOY9Tpq7E4zdeaYKvyVAG7LdBL3f7lfn6', NULL, NULL, NULL, '2020-05-06 08:56:33', '2020-05-06 08:56:33');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vp_brand`
--

CREATE TABLE `vp_brand` (
  `brand_id` int(10) UNSIGNED NOT NULL,
  `brand_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `vp_brand`
--

INSERT INTO `vp_brand` (`brand_id`, `brand_name`, `brand_slug`, `brand_status`, `created_at`, `updated_at`) VALUES
(2, 'Giordano', 'giordano', 1, NULL, NULL),
(3, 'OEM', 'oem', 1, NULL, NULL),
(4, 'Kojiba', 'kojiba', 1, NULL, NULL),
(5, 'VICERO', 'vicero', 1, NULL, NULL),
(6, 'Zenko', 'zenko', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vp_comment`
--

CREATE TABLE `vp_comment` (
  `com_id` int(10) UNSIGNED NOT NULL,
  `com_content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `com_product` int(10) UNSIGNED NOT NULL,
  `com_user` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `vp_comment`
--

INSERT INTO `vp_comment` (`com_id`, `com_content`, `com_product`, `com_user`, `created_at`, `updated_at`) VALUES
(6, 'Áo đẹp', 20, 1, '2020-04-28 12:15:05', '2020-04-28 12:15:05');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vp_customer`
--

CREATE TABLE `vp_customer` (
  `cus_id` int(10) UNSIGNED NOT NULL,
  `cus_Hokhachhang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cus_Tenkhachhang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cus_Sodienthoai` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cus_Diachi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cus_Email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cus_Note` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cus_Password` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `cus_Remember_Token` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `vp_customer`
--

INSERT INTO `vp_customer` (`cus_id`, `cus_Hokhachhang`, `cus_Tenkhachhang`, `cus_Sodienthoai`, `cus_Diachi`, `cus_Email`, `cus_Note`, `cus_Password`, `cus_Remember_Token`, `created_at`, `updated_at`) VALUES
(27, 'Le Minh', 'Hung', '0238423', 'Đồng Nai', 'sprol878@gmail.com', 'asfsdg', '', NULL, '2020-04-11 15:11:35', '2020-04-11 15:11:35'),
(28, 'Le Minh', 'Tiến', '03274346', 'Đồng Nai', 'sprol878@gmail.com', 'sfsdgdg', '', NULL, '2020-04-11 15:13:05', '2020-04-11 15:13:05'),
(29, 'Le Minh', 'Hoàng', '016334354674', 'Đồng Nai', 'lesang0169@gmail.com', 'afsdgd', '', NULL, '2020-04-12 14:02:49', '2020-04-12 14:02:49'),
(31, 'Nguyễn', 'Jony', '0832736435', 'New York', 'lesang0169@gmail.com', 'sdasfdg', '', NULL, '2020-04-12 14:23:46', '2020-04-12 14:23:46'),
(32, 'Le Minh', 'Phúc', '0237435346', 'Nha Trang', 'lesang0169@gmail.com', 'scdsgdhfsdf', '', NULL, '2020-04-12 14:30:00', '2020-04-12 14:30:00'),
(33, 'Lê Thị', 'Thu', '02834735436', 'Hà Nội', 'lesang0169@gmail.com', 'sfsdfdsg', '', NULL, '2020-04-12 14:32:21', '2020-04-12 14:32:21'),
(34, 'Le Minh', 'Sang', '1696947248', 'Đồng Nai', 'sprol878@gmail.com', 'ssdf', '', NULL, '2020-04-17 13:46:53', '2020-04-17 13:46:53'),
(35, 'Lê Hoàng', 'Trung', '02384375464', 'Đồng Nai', 'letrung34@gmail.com', 'Giao hàng nhanh', '', NULL, '2020-04-27 08:28:49', '2020-04-27 08:28:49'),
(36, 'Lee Min', 'Hoo', '0384735656', 'Đồng Nai', 'sprol878@gmail.com', 'cssdg', '', NULL, '2020-04-27 09:07:30', '2020-04-27 09:07:30'),
(37, 'sf', 'gdf', '01237235', 'TP.HCM', 'lesan0169@gmail.com', 'adsafsdg sdg', '', NULL, '2020-04-27 13:26:06', '2020-04-27 13:26:06'),
(38, 'Nguyễn', 'Tuân', '02732453657', 'Đồng Nai', 'lesang0169@gmail.com', 'sfdszdvgdfh', '', NULL, '2020-04-28 12:15:56', '2020-04-28 12:15:56');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vp_orders`
--

CREATE TABLE `vp_orders` (
  `or_id` int(10) UNSIGNED NOT NULL,
  `or_Ngaydat` date NOT NULL,
  `or_Tongtien` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `or_Trangthai` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `or_Payment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `or_Customer` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `vp_orders`
--

INSERT INTO `vp_orders` (`or_id`, `or_Ngaydat`, `or_Tongtien`, `or_Trangthai`, `or_Payment`, `or_Customer`, `created_at`, `updated_at`) VALUES
(9, '2020-04-11', '6,000,000.00', '', 'on', 27, '2020-04-11 15:11:35', '2020-04-11 15:11:35'),
(10, '2020-04-11', '150,000.00', '', 'on', 28, '2020-04-11 15:13:05', '2020-04-11 15:13:05'),
(11, '2020-04-12', '3,000,000.00', '', 'on', 29, '2020-04-12 14:02:49', '2020-04-12 14:02:49'),
(13, '2020-04-12', '150,000.00', '', 'on', 31, '2020-04-12 14:23:46', '2020-04-12 14:23:46'),
(14, '2020-04-12', '0.00', '', 'on', 32, '2020-04-12 14:30:00', '2020-04-12 14:30:00'),
(15, '2020-04-12', '90,000.00', '', 'on', 33, '2020-04-12 14:32:21', '2020-04-12 14:32:21'),
(16, '2020-04-17', '200,000.00', '', 'on', 34, '2020-04-17 13:46:53', '2020-04-17 13:46:53'),
(17, '2020-04-27', '20.00', '', 'on', 35, '2020-04-27 08:28:49', '2020-04-27 08:28:49'),
(18, '2020-04-27', '50.00', '', 'on', 36, '2020-04-27 09:07:30', '2020-04-27 09:07:30'),
(19, '2020-04-27', '50.00', '', 'on', 37, '2020-04-27 13:26:06', '2020-04-27 13:26:06'),
(20, '2020-04-28', '25.00', '', 'on', 38, '2020-04-28 12:15:56', '2020-04-28 12:15:56');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vp_orders_detail`
--

CREATE TABLE `vp_orders_detail` (
  `detail_id` int(10) UNSIGNED NOT NULL,
  `detail_Đonvigia` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail_Soluong` int(11) NOT NULL,
  `detail_Product` int(10) UNSIGNED NOT NULL,
  `detail_Order` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `vp_orders_detail`
--

INSERT INTO `vp_orders_detail` (`detail_id`, `detail_Đonvigia`, `detail_Soluong`, `detail_Product`, `detail_Order`, `created_at`, `updated_at`) VALUES
(14, '20', 1, 18, 17, '2020-04-27 08:28:49', '2020-04-27 08:28:49'),
(17, '25', 1, 20, 20, '2020-04-28 12:15:56', '2020-04-28 12:15:56');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vp_posts`
--

CREATE TABLE `vp_posts` (
  `pos_id` int(10) UNSIGNED NOT NULL,
  `pos_Mabaiviet` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pos_Tieudebaiviet` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pos_Noidungbaiviet` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pos_Hinhanh` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pos_Ngaytao` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `vp_posts`
--

INSERT INTO `vp_posts` (`pos_id`, `pos_Mabaiviet`, `pos_Tieudebaiviet`, `pos_Noidungbaiviet`, `pos_Hinhanh`, `pos_Ngaytao`, `created_at`, `updated_at`) VALUES
(3, 'bv01', 'Sản phẫm mới', '<p>Le Minh Sang</p>', '4.0.jpeg', '2020-03-20', '2020-03-20 07:56:09', '2020-03-21 06:29:52');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vp_product`
--

CREATE TABLE `vp_product` (
  `pro_id` int(10) UNSIGNED NOT NULL,
  `pro_Tensanpham` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pro_Thuonghieu` int(10) UNSIGNED NOT NULL,
  `pro_Gia` int(11) NOT NULL,
  `pro_Hinhanh` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pro_Giamgia` int(11) NOT NULL,
  `pro_Khuyenmai` tinyint(4) NOT NULL,
  `pro_Nhommau` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pro_Kichthuoc` int(10) UNSIGNED NOT NULL,
  `pro_Soluong` int(11) NOT NULL,
  `pro_Mota` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pro_Trangthai` tinyint(4) NOT NULL,
  `pro_featured` tinyint(4) NOT NULL,
  `pro_cate` int(10) UNSIGNED NOT NULL,
  `pro_promotion` int(10) UNSIGNED NOT NULL,
  `pro_thumnails` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pro_thumnails1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `vp_product`
--

INSERT INTO `vp_product` (`pro_id`, `pro_Tensanpham`, `pro_Thuonghieu`, `pro_Gia`, `pro_Hinhanh`, `pro_Giamgia`, `pro_Khuyenmai`, `pro_Nhommau`, `pro_Kichthuoc`, `pro_Soluong`, `pro_Mota`, `pro_Trangthai`, `pro_featured`, `pro_cate`, `pro_promotion`, `pro_thumnails`, `pro_thumnails1`, `created_at`, `updated_at`) VALUES
(18, 'Áo thun nam Hàn Quốc form rộng in hình Pin yếu hay Tim yếu, vải dày mịn mát', 2, 20, '5f47bc936c1f2a1835bd265042907870.jpg', 18, 0, 'Trắng, Đen', 4, 1, '<p>dsfsdgshfd dgdsdfh</p>', 1, 1, 1, 0, '87ded55d788aba73b9dbf5aae8223cdb.jpg', '888c39c9a75f70cc139a9b47f76d04e3.jpg', '2020-04-21 07:35:43', '2020-04-24 14:06:23'),
(20, 'Áo thun nam Khatoco A2MN548R2-THMA002-1911-N', 3, 25, '5b9b0b4a1aef66e1baec833fcab88054.jpg', 23, 0, 'Xanh', 1, 2, '<p>sdfsdv qwrf</p>', 1, 1, 1, 0, '', '', '2020-04-28 12:13:24', '2020-04-28 12:13:24'),
(21, 'Áo Sơ Mi Nam Trắng cúc trắng dài tay thương hiệu đẳng cấp', 4, 30, '888c39c9a75f70cc139a9b47f76d04e3.jpg', 0, 0, 'Trắng cúc trắng', 2, 1, '<p>sdfsdgvs sdfsdg</p>', 1, 1, 2, 0, '', '', '2020-05-01 14:01:53', '2020-05-01 14:01:53');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vp_promotions`
--

CREATE TABLE `vp_promotions` (
  `prom_id` int(10) UNSIGNED NOT NULL,
  `prom_Tieude` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prom_Mota` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vp_sizes`
--

CREATE TABLE `vp_sizes` (
  `size_id` int(10) UNSIGNED NOT NULL,
  `size_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `vp_sizes`
--

INSERT INTO `vp_sizes` (`size_id`, `size_name`, `size_slug`, `size_status`, `created_at`, `updated_at`) VALUES
(1, 'M', 'm', 1, NULL, NULL),
(2, 'L', 'l', 1, NULL, NULL),
(3, 'XS', 'xs', 1, NULL, NULL),
(4, 'S', 's', 1, NULL, NULL),
(5, 'XL', 'xl', 1, NULL, NULL),
(6, 'XXL', 'xxl', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vp_slide`
--

CREATE TABLE `vp_slide` (
  `id` int(10) UNSIGNED NOT NULL,
  `links` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `images` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `vp_slide`
--

INSERT INTO `vp_slide` (`id`, `links`, `images`, `created_at`, `updated_at`) VALUES
(1, '', 'images (1).jpg', NULL, NULL),
(2, '', 'images (2).jpg', NULL, NULL),
(3, '', 'images (3).jpg', NULL, NULL),
(4, '', 'images (4).jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vp_users`
--

CREATE TABLE `vp_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` tinyint(4) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `vp_users`
--

INSERT INTO `vp_users` (`id`, `email`, `password`, `level`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'sprol878@gmail.com', '$2y$10$pQD8Dz3dSL7ma0Z5w25onuxbd7AjJ.aEuFiJMHX9fpVSqXVto7vXu', 1, 'OkgZUwYxqVbi9kvltrryTF84zmh4YaCDTiDhCPExjJX6pxNCMN8DkRiBZjMY', NULL, NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cate_id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `code` (`code`);

--
-- Chỉ mục cho bảng `vp_brand`
--
ALTER TABLE `vp_brand`
  ADD PRIMARY KEY (`brand_id`);

--
-- Chỉ mục cho bảng `vp_comment`
--
ALTER TABLE `vp_comment`
  ADD PRIMARY KEY (`com_id`),
  ADD KEY `vp_comment_com_product_foreign` (`com_product`),
  ADD KEY `com_user` (`com_user`);

--
-- Chỉ mục cho bảng `vp_customer`
--
ALTER TABLE `vp_customer`
  ADD PRIMARY KEY (`cus_id`);

--
-- Chỉ mục cho bảng `vp_orders`
--
ALTER TABLE `vp_orders`
  ADD PRIMARY KEY (`or_id`),
  ADD KEY `vp_orders_or_customer_foreign` (`or_Customer`);

--
-- Chỉ mục cho bảng `vp_orders_detail`
--
ALTER TABLE `vp_orders_detail`
  ADD PRIMARY KEY (`detail_id`),
  ADD KEY `vp_orders_detail_detail_product_foreign` (`detail_Product`),
  ADD KEY `vp_orders_detail_detail_order_foreign` (`detail_Order`);

--
-- Chỉ mục cho bảng `vp_posts`
--
ALTER TABLE `vp_posts`
  ADD PRIMARY KEY (`pos_id`);

--
-- Chỉ mục cho bảng `vp_product`
--
ALTER TABLE `vp_product`
  ADD PRIMARY KEY (`pro_id`),
  ADD KEY `vp_product_pro_cate_foreign` (`pro_cate`),
  ADD KEY `pro_promotion` (`pro_promotion`),
  ADD KEY `pro_Thuonghieu` (`pro_Thuonghieu`),
  ADD KEY `pro_Kichthuoc` (`pro_Kichthuoc`);

--
-- Chỉ mục cho bảng `vp_promotions`
--
ALTER TABLE `vp_promotions`
  ADD PRIMARY KEY (`prom_id`);

--
-- Chỉ mục cho bảng `vp_sizes`
--
ALTER TABLE `vp_sizes`
  ADD PRIMARY KEY (`size_id`);

--
-- Chỉ mục cho bảng `vp_slide`
--
ALTER TABLE `vp_slide`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `vp_users`
--
ALTER TABLE `vp_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `cate_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `vp_brand`
--
ALTER TABLE `vp_brand`
  MODIFY `brand_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `vp_comment`
--
ALTER TABLE `vp_comment`
  MODIFY `com_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `vp_customer`
--
ALTER TABLE `vp_customer`
  MODIFY `cus_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT cho bảng `vp_orders`
--
ALTER TABLE `vp_orders`
  MODIFY `or_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `vp_orders_detail`
--
ALTER TABLE `vp_orders_detail`
  MODIFY `detail_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `vp_posts`
--
ALTER TABLE `vp_posts`
  MODIFY `pos_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `vp_product`
--
ALTER TABLE `vp_product`
  MODIFY `pro_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `vp_promotions`
--
ALTER TABLE `vp_promotions`
  MODIFY `prom_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `vp_sizes`
--
ALTER TABLE `vp_sizes`
  MODIFY `size_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `vp_slide`
--
ALTER TABLE `vp_slide`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `vp_users`
--
ALTER TABLE `vp_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `vp_comment`
--
ALTER TABLE `vp_comment`
  ADD CONSTRAINT `vp_comment_com_product_foreign` FOREIGN KEY (`com_product`) REFERENCES `vp_product` (`pro_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `vp_comment_ibfk_1` FOREIGN KEY (`com_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `vp_orders`
--
ALTER TABLE `vp_orders`
  ADD CONSTRAINT `vp_orders_or_customer_foreign` FOREIGN KEY (`or_Customer`) REFERENCES `vp_customer` (`cus_id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `vp_orders_detail`
--
ALTER TABLE `vp_orders_detail`
  ADD CONSTRAINT `vp_orders_detail_detail_order_foreign` FOREIGN KEY (`detail_Order`) REFERENCES `vp_orders` (`or_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `vp_orders_detail_detail_product_foreign` FOREIGN KEY (`detail_Product`) REFERENCES `vp_product` (`pro_id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `vp_product`
--
ALTER TABLE `vp_product`
  ADD CONSTRAINT `vp_product_pro_cate_foreign` FOREIGN KEY (`pro_cate`) REFERENCES `categories` (`cate_id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `vp_promotions`
--
ALTER TABLE `vp_promotions`
  ADD CONSTRAINT `vp_promotions_ibfk_1` FOREIGN KEY (`prom_id`) REFERENCES `vp_product` (`pro_promotion`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
