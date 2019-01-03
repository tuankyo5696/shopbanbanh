-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th1 02, 2019 lúc 04:39 PM
-- Phiên bản máy phục vụ: 5.7.23
-- Phiên bản PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `banbanh`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill`
--

DROP TABLE IF EXISTS `bill`;
CREATE TABLE IF NOT EXISTS `bill` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `billing_last_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `billing_address_1` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `billing_phone` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ship_to_different_address` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `billing_last_name2` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `billing_address_2` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `billing_phone2` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `order_comments` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(45) COLLATE utf8_unicode_ci DEFAULT '0',
  `gia` varchar(45) COLLATE utf8_unicode_ci DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `bill`
--

INSERT INTO `bill` (`id`, `billing_last_name`, `billing_address_1`, `billing_phone`, `ship_to_different_address`, `billing_last_name2`, `billing_address_2`, `billing_phone2`, `order_comments`, `user_id`, `status`, `gia`) VALUES
(3, 'Chương', 'llq', '113', NULL, '', '', '', '', '13', '0', '0'),
(4, 'Chương', 'llq', '113', NULL, '', '', '', '', '13', '0', '155'),
(5, 'Chương', 'llq', '113', NULL, '12313', '123123', '123123', '123123123', '13', '0', '738'),
(17, 'Phạm Văn A', 'LLQ', '113', NULL, '', '', '', '', '14', '0', '359'),
(16, 'Phạm Văn A', 'LLQ', '113', NULL, '', '', '', '', '14', '0', '369');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill_detail`
--

DROP TABLE IF EXISTS `bill_detail`;
CREATE TABLE IF NOT EXISTS `bill_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ten_sanpham` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_bill` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gia` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `soluong` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=60 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `bill_detail`
--

INSERT INTO `bill_detail` (`id`, `ten_sanpham`, `id_bill`, `gia`, `soluong`) VALUES
(1, 'banner3', '3', '123 ', '1'),
(2, '123123123', '3', '123 ', '1'),
(3, 'Bánh Honey ngon', '3', '35 ', '3'),
(4, '', '4', '', ''),
(5, 'Bánh Honey ngon', '4', '35', '1'),
(6, 'Bánh Tart ngon', '4', '35', '1'),
(7, 'Bánh su kem loại 2 ngon', '4', '50', '1'),
(8, 'Bánh su kem ngon', '4', '35', '1'),
(9, '', '5', '', ''),
(10, 'sản phẩm thử1', '5', '123', '1'),
(11, '123', '5', '123', '1'),
(55, '', '17', '', ''),
(56, 'banner4', '17', '123', '1'),
(57, '123', '17', '123', '1'),
(58, 'sản phẩm thử1', '17', '123', '1'),
(52, 'banner4', '16', '123', '1'),
(54, 'sản phẩm thử1', '16', '123', '1'),
(53, '123', '16', '123', '1'),
(51, '', '16', '', ''),
(26, 'sản phẩm thử1', '10', '123', '1'),
(27, 'banner2', '10', '123', '1'),
(28, 'banner3', '10', '123', '1'),
(29, 'sp1', '10', '123', '1'),
(30, '123123', '10', '123', '1'),
(31, '123123123', '10', '123', '1'),
(32, 'bánh123123', '10', '123', '1'),
(33, 'Bánh cc', '10', '10000', '1'),
(34, '', '11', '', ''),
(35, '123', '11', '123', '1'),
(36, 'sản phẩm thử1', '11', '123', '1'),
(37, '', '12', '', ''),
(38, '123', '12', '123', '1'),
(39, '', '13', '', ''),
(40, '123', '13', '123', '1'),
(41, '', '13', '', ''),
(42, '', '14', '', ''),
(43, 'banner4', '14', '123', '1'),
(44, '123', '14', '123', '1'),
(45, 'sản phẩm thử1', '14', '123', '1'),
(46, '', '15', '', ''),
(47, 'banner4', '15', '123', '1'),
(48, '123', '15', '123', '1'),
(49, 'sản phẩm thử1', '15', '123', '1'),
(50, '', '15', '', ''),
(59, '', '17', '', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` varchar(2000) COLLATE utf8_unicode_ci DEFAULT 'null',
  `id_sanpham` int(11) NOT NULL,
  `user` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `comment`
--

INSERT INTO `comment` (`id`, `content`, `id_sanpham`, `user`) VALUES
(9, 'dfffdf', 46, 13),
(8, 'sản phẩm ngon quá', 41, 13),
(7, 'sản phẩm rất ngon', 43, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `coupon`
--

DROP TABLE IF EXISTS `coupon`;
CREATE TABLE IF NOT EXISTS `coupon` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` int(11) NOT NULL DEFAULT '0',
  `used` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `coupon`
--

INSERT INTO `coupon` (`id`, `code`, `price`, `type`, `used`) VALUES
(1, 'abc', '10', 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_type`
--

DROP TABLE IF EXISTS `product_type`;
CREATE TABLE IF NOT EXISTS `product_type` (
  `id_product_type` int(11) NOT NULL AUTO_INCREMENT,
  `type_name` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted` int(11) DEFAULT '0',
  PRIMARY KEY (`id_product_type`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_type`
--

INSERT INTO `product_type` (`id_product_type`, `type_name`, `deleted`) VALUES
(1, 'Bánh Ngọt', 0),
(2, 'bánh mặn', 1),
(3, 'Bánh Mặn', 0),
(4, 'Bánh Nướng', 0),
(5, 'bánh xe', 1),
(6, '123', 1),
(7, 'bánh bbb', 1),
(8, 'banner', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role`
--

DROP TABLE IF EXISTS `role`;
CREATE TABLE IF NOT EXISTS `role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `role`
--

INSERT INTO `role` (`id`, `name`, `deleted`) VALUES
(1, 'Admin', 0),
(2, 'Mod', 0),
(3, 'Lv1', 0),
(4, 'Lv2', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

DROP TABLE IF EXISTS `sanpham`;
CREATE TABLE IF NOT EXISTS `sanpham` (
  `idsanpham` int(11) NOT NULL AUTO_INCREMENT,
  `tensanpham` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `giatien` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `loaisanpham` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `soluong` int(11) DEFAULT NULL,
  `hinh` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `detail` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted` int(11) DEFAULT '0',
  PRIMARY KEY (`idsanpham`)
) ENGINE=MyISAM AUTO_INCREMENT=49 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`idsanpham`, `tensanpham`, `giatien`, `loaisanpham`, `soluong`, `hinh`, `detail`, `deleted`) VALUES
(1, 'Bánh Cookie ngon', '35000', '1', 10, 'product1.png', NULL, 0),
(2, 'Bánh Honey ngon', '35000', '2', 10, 'product2.png', NULL, 0),
(3, 'Bánh Tart ngon', '35000', '2', 1000, 'Tarts3.png', NULL, 0),
(4, 'Bánh Lemon-Cream ngon', '46000', '1', 1000, 'product3.png', NULL, 0),
(6, 'Bánh su kem ngon', '35000', '1', 1000, 'sukem.png', NULL, 0),
(8, 'Bánh su kem loại 2 ngon', '50000', '6', 123, 'sukem2.png', NULL, 0),
(9, 'Bánh Fruit Cake ngon', '123000', '4', 123, 'product5.png', NULL, 0),
(7, 'Bánh ngọt nhỏ ngon', '100000', '2', 1000, 'product4.png', NULL, 0),

(10, 'Bánh Cookie đen ngon', '25000', '4', 123, 'product6.png', NULL, 0),
(11, 'Bánh ngọt đen ngon', '123000', '4', 123, 'product7.png', NULL, 0),
(12, '123123', '123', '4', 123, 'brand1.png', NULL, 1),

(14, '123123', '123', '4', 123, 'brand1.png', NULL, 1),
(15, '123123', '123', '4', 123, 'brand1.png', NULL, 1),
(16, 'Bánh đậu xanh hạt dưa ngon', '123000', '4', 123, '03-deo-dau-xanh-hat-dua-e1505892838355.png', NULL, 0),
(17, 'Bánh grourmet-cookies', '123000', '4', 123, 'gourmet-cookies-2.png', NULL, 0),
(23, 'Bánh Mì Thơm Giòn', '22000', '4', 54, 'banh-mi-thom-gion.jpg', NULL, 0),
(24, 'Bánh Bông Lan', '65000', '4', 32, 'loai-banh-bong-lan.jpg', NULL, 0),
(19, 'Bánh Cookie ngon', '123000', '8', 123, 'h4slide.png', 'banner1', 0),
(20, 'banner2', '123000', '8', 123, 'h4slide2.png', 'banner2 nè ', 0),
(21, 'banner3', '123000', '8', 123, 'h4slide3.png', 'banner3', 0),
(22, 'banner4', '123000', '8', 123123, 'h4slide4.png', '123123123', 0); 

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted` varchar(45) COLLATE utf8_unicode_ci DEFAULT '0',
  `sdt` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ngaysinh` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `diachi` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `user_name`, `password`, `deleted`, `sdt`, `ngaysinh`, `diachi`, `name`) VALUES
(1, 'tuan', '1', '0', NULL, NULL, NULL, 'Tuấn'),
(13, 'abc', ' abc', '0', '113', '1/1/2019', 'llq', 'Chương123123'),
(14, 'abc', '1', '0', '113', '12/11/1212', 'LLQ', 'Phạm Văn A'),
(15, 'abc', 'abc', '0', '113', '1/1/2019', 'llq', 'Chương'),
(16, '1234', '1', '0', '123', '123', '123', 'thuc');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_admin`
--

DROP TABLE IF EXISTS `user_admin`;
CREATE TABLE IF NOT EXISTS `user_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `role` int(11) NOT NULL,
  `deleted` int(11) DEFAULT '0',
  `name` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `avata` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user_admin`
--

INSERT INTO `user_admin` (`id`, `user_name`, `password`, `role`, `deleted`, `name`, `avata`) VALUES
(1, 'chuong', '123123123', 1, 0, NULL, NULL),
(2, 'admin', '123123', 1, 0, NULL, NULL),
(3, 'tuan', '123123123', 2, 1, 'Tuấn', 'JP_5544_ja_hero_2072.png'),
(4, 'tu', '123', 3, 1, 'Test 1', 'banh su.png'),
(5, '123', '123', 4, 1, '123', 'brand1.png'),
(6, '123', '123', 4, 1, '123', 'brand1.png'),
(7, '123', '123', 4, 1, '123', 'brand1.png'),
(8, '123', '123', 4, 1, '123', 'brand1.png'),
(9, '123', '123', 4, 1, '123', 'brand1.png'),
(10, '123', '123', 4, 1, '123', 'brand1.png'),
(11, '123', '123', 4, 1, '123', 'brand1.png'),
(12, '123', '123', 4, 1, '123', 'brand1.png'),
(13, '123', '123', 4, 1, '123', 'brand1.png'),
(14, '123', '123', 4, 1, '123', 'brand1.png'),
(15, '123', '123', 4, 1, '123', 'brand1.png'),
(16, '123', '123', 4, 1, '123', 'brand1.png'),
(17, '123', '123', 4, 1, '123', 'brand1.png'),
(18, '123', '123', 4, 1, '123', 'brand1.png'),
(19, '123', '123', 4, 1, '123', 'brand1.png'),
(20, '123', '123', 4, 1, '123', 'brand1.png');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
