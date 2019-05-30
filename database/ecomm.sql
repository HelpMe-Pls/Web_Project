-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 22, 2019 lúc 04:48 PM
-- Phiên bản máy phục vụ: 10.1.38-MariaDB
-- Phiên bản PHP: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `ecomm`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `product_id`, `quantity`) VALUES
(16, 18, 7, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `cat_slug` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `name`, `cat_slug`) VALUES
(1, 'HeadPhone1', 'laptops'),
(2, 'HeadPhone', 'desktop-pc');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `details`
--

CREATE TABLE `details` (
  `id` int(11) NOT NULL,
  `sales_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `details`
--

INSERT INTO `details` (`id`, `sales_id`, `product_id`, `quantity`) VALUES
(38, 24, 3, 3),
(39, 25, 4, 3),
(40, 26, 3, 2),
(41, 26, 4, 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `slug` varchar(200) NOT NULL,
  `price` double NOT NULL,
  `photo` varchar(200) NOT NULL,
  `date_view` date NOT NULL,
  `counter` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `description`, `slug`, `price`, `photo`, `date_view`, `counter`) VALUES
(3, 1, 'Inspiron A', '<p>- Led RGB 16,8 triá»‡u m&agrave;u tuá»³ chá»‰nh c&oacute; tháº©m má»¹ cao v&agrave; c&aacute; t&iacute;nh ri&ecirc;ng.</p>\r\n\r\n<p>- Äá»‡m Ä‘áº§u l&agrave;m báº±ng váº£i Ä‘&agrave;n há»“i c&oacute; thá»ƒ Ä‘iá»u chá»‰nh, ph&acirc;n bá»‘ Ä‘á»u khá»‘i lÆ°á»£ng tai nghe, loáº¡i bá» táº¥t cáº£ c&aacute;c Ä‘iá»ƒm g&acirc;y &aacute;p lá»±c.</p>\r\n\r\n<p>- Microphone lá»c á»“n m&ocirc;i trÆ°á»ng v&agrave; khá»­ m&eacute;o giá»ng n&oacute;i; c&oacute; thá»ƒ k&eacute;o d&agrave;i v&agrave; thu gá»n.</p>\r\n\r\n<p>- Äá»‡m tai tho&aacute;ng kh&iacute;, thiáº¿t káº¿ sá»­ dá»¥ng c&aacute;c cháº¥t liá»‡u Ä‘Æ°á»£c sá»­ dá»¥ng trong thá»ƒ thao chuy&ecirc;n nghiá»‡p.</p>\r\n', 'inspiron', 599, 'inspiron_1558495668.jpg', '2019-05-22', 9),
(4, 1, 'Corsair HS70 Wireless White', '<p>- Driver giá»‘ng vá»›i c&aacute;c tai nghe Ä‘á»i cao cá»§a Steelseries, cho chi tiáº¿t cao, &acirc;m thanh c&acirc;n báº±ng v&agrave; Ä‘á»™ m&eacute;o cá»±c tháº¥p.</p>\r\n\r\n<p>- Giáº£ láº­p &acirc;m thanh v&ograve;m DTS 7.1 sá»‘ng Ä‘á»™ng.</p>\r\n\r\n<p>- Led RGB 16,8 triá»‡u m&agrave;u tuá»³ chá»‰nh c&oacute; tháº©m má»¹ cao v&agrave; c&aacute; t&iacute;nh ri&ecirc;ng.</p>\r\n\r\n<p>- Äá»‡m Ä‘áº§u l&agrave;m báº±ng váº£i Ä‘&agrave;n há»“i c&oacute; thá»ƒ Ä‘iá»u chá»‰nh, ph&acirc;n bá»‘ Ä‘á»u khá»‘i lÆ°á»£ng tai nghe, loáº¡i bá» táº¥t cáº£ c&aacute;c Ä‘iá»ƒm g&acirc;y &aacute;p lá»±c.</p>\r\n\r\n<p>- Microphone lá»c á»“n m&ocirc;i trÆ°á»ng v&agrave; khá»­ m&eacute;o giá»ng n&oacute;i; c&oacute; thá»ƒ k&eacute;o d&agrave;i v&agrave; thu gá»n.</p>\r\n\r\n<p>- Äá»‡m tai tho&aacute;ng kh&iacute;, thiáº¿t káº¿ sá»­ dá»¥ng c&aacute;c cháº¥t liá»‡u Ä‘Æ°á»£c sá»­ dá»¥ng trong thá»ƒ thao chuy&ecirc;n nghiá»‡p.</p>\r\n', 'corsair-hs70-wireless-white', 399, 'corsair-hs70-wireless-white_1558495638.jpg', '2019-05-22', 4),
(5, 1, 'SteelSeries Arctis 5 ', '<p>- Driver giá»‘ng vá»›i c&aacute;c tai nghe Ä‘á»i cao cá»§a Steelseries, cho chi tiáº¿t cao, &acirc;m thanh c&acirc;n báº±ng v&agrave; Ä‘á»™ m&eacute;o cá»±c tháº¥p.</p>\r\n\r\n<p>- Giáº£ láº­p &acirc;m thanh v&ograve;m DTS 7.1 sá»‘ng Ä‘á»™ng.</p>\r\n\r\n<p>- Led RGB 16,8 triá»‡u m&agrave;u tuá»³ chá»‰nh c&oacute; tháº©m má»¹ cao v&agrave; c&aacute; t&iacute;nh ri&ecirc;ng.</p>\r\n\r\n<p>- Äá»‡m Ä‘áº§u l&agrave;m báº±ng váº£i Ä‘&agrave;n há»“i c&oacute; thá»ƒ Ä‘iá»u chá»‰nh, ph&acirc;n bá»‘ Ä‘á»u khá»‘i lÆ°á»£ng tai nghe, loáº¡i bá» táº¥t cáº£ c&aacute;c Ä‘iá»ƒm g&acirc;y &aacute;p lá»±c.</p>\r\n\r\n<p>- Microphone lá»c á»“n m&ocirc;i trÆ°á»ng v&agrave; khá»­ m&eacute;o giá»ng n&oacute;i; c&oacute; thá»ƒ k&eacute;o d&agrave;i v&agrave; thu gá»n.</p>\r\n\r\n<p>- Äá»‡m tai tho&aacute;ng kh&iacute;, thiáº¿t káº¿ sá»­ dá»¥ng c&aacute;c cháº¥t liá»‡u Ä‘Æ°á»£c sá»­ dá»¥ng trong thá»ƒ thao chuy&ecirc;n nghiá»‡p.</p>\r\n', 'steelseries-arctis-5', 339, 'steelseries-arctis-5_1558495687.jpg', '2018-07-09', 3),
(7, 2, 'Space Grey', '<p>- Driver giá»‘ng vá»›i c&aacute;c tai nghe Ä‘á»i cao cá»§a Steelseries, cho chi tiáº¿t cao, &acirc;m thanh c&acirc;n báº±ng v&agrave; Ä‘á»™ m&eacute;o cá»±c tháº¥p.</p>\r\n\r\n<p>- Giáº£ láº­p &acirc;m thanh v&ograve;m DTS 7.1 sá»‘ng Ä‘á»™ng.</p>\r\n\r\n<p>- Led RGB 16,8 triá»‡u m&agrave;u tuá»³ chá»‰nh c&oacute; tháº©m má»¹ cao v&agrave; c&aacute; t&iacute;nh ri&ecirc;ng.</p>\r\n\r\n<p>- Äá»‡m Ä‘áº§u l&agrave;m báº±ng váº£i Ä‘&agrave;n há»“i c&oacute; thá»ƒ Ä‘iá»u chá»‰nh, ph&acirc;n bá»‘ Ä‘á»u khá»‘i lÆ°á»£ng tai nghe, loáº¡i bá» táº¥t cáº£ c&aacute;c Ä‘iá»ƒm g&acirc;y &aacute;p lá»±c.</p>\r\n\r\n<p>- Microphone lá»c á»“n m&ocirc;i trÆ°á»ng v&agrave; khá»­ m&eacute;o giá»ng n&oacute;i; c&oacute; thá»ƒ k&eacute;o d&agrave;i v&agrave; thu gá»n.</p>\r\n\r\n<p>- Äá»‡m tai tho&aacute;ng kh&iacute;, thiáº¿t káº¿ sá»­ dá»¥ng c&aacute;c cháº¥t liá»‡u Ä‘Æ°á»£c sá»­ dá»¥ng trong thá»ƒ thao chuy&ecirc;n nghiá»‡p.</p>\r\n', 'space-grey', 619, 'space-grey_1558495680.jpg', '2019-05-22', 1),
(8, 2, 'Gaming Eaglend F2ENC Noise Reduction', '<p>Gaming Eaglend F2ENC Noise Reduction</p>\r\n', 'gaming-eaglend-f2enc-noise-reduction', 549.99, 'gaming-eaglend-f2enc-noise-reduction_1558495646.jpg', '2019-05-22', 3),
(12, 2, 'Hyper X cloud II KHX-HSCP-RD', '<p>HyperX, má»™t bá»™ pháº­n thuá»™c&nbsp;<a href=\"https://phongvu.vn/searchpves/kingston?utm_source=SEO\" target=\"_blank\">Kingston</a>&nbsp;Technology vá»«a qua Ä‘&atilde; giá»›i thiá»‡u&nbsp;<a href=\"https://phongvu.vn/tai-nghe-904.cat?utm_source=SEO\" target=\"_blank\">tai nghe</a>&nbsp;HyperX Cloud II, báº£n n&acirc;ng cáº¥p cá»§a HyperX Cloud trÆ°á»›c Ä‘&acirc;y. HyperX Cloud II Ä‘Æ°á»£c trang bá»‹ bá»™ Ä‘iá»u khiá»ƒn &acirc;m thanh má»›i vá»›i kháº£ nÄƒng táº¡o ra hiá»‡u á»©ng &acirc;m thanh giáº£ láº­p 7.1, bá»• sung th&ecirc;m v&agrave;o nhá»¯ng t&iacute;nh nÄƒng v&agrave; Æ°u Ä‘iá»ƒm Ä‘&atilde; c&oacute; tr&ecirc;n phi&ecirc;n báº£n&nbsp;<a href=\"https://phongvu.vn/tai-nghe-904.cat?utm_source=SEO\" target=\"_blank\">tai nghe</a>&nbsp;HyperX Cloud Ä‘á»i Ä‘áº§u.</p>\r\n\r\n<p>ÄÆ°á»£c thiáº¿t káº¿ bá»Ÿi c&aacute;c ká»¹ sÆ° &acirc;m thanh cá»§a HyperX, bá»™ Ä‘iá»u khiá»ƒn &acirc;m thanh Ä‘&egrave;n ná»n&nbsp;<a href=\"https://phongvu.vn/lcd-led-tivi-1275.cat?utm_source=SEO\" target=\"_blank\">LED</a>&nbsp;cho hiá»‡u á»©ng &acirc;m thanh giáº£ láº­p pháº§n cá»©ng 7.1 (kh&ocirc;ng Ä‘&ograve;i há»i driver) mic c&oacute; thá»ƒ th&aacute;o rá»i Ä‘i k&egrave;m trong há»™p sáº£n pháº©m. Game thá»§ c&oacute; thá»ƒ báº­t/táº¯t cháº¿ Ä‘á»™ &acirc;m thanh giáº£ láº­p 7.1 chá»‰ vá»›i má»™t n&uacute;t báº¥m Ä‘á»ƒ k&iacute;ch hoáº¡t loáº¡t&nbsp;<a href=\"https://phongvu.vn/loa-905.cat?utm_source=SEO\" target=\"_blank\">loa</a>&nbsp;áº£o v&agrave; tÄƒng tráº£i nghiá»‡m &acirc;m thanh khi chÆ¡i game, xem phim h&agrave;nh Ä‘á»™ng. Bá»™ Ä‘iá»u khiá»ƒn Ä‘i k&egrave;m HyperX Cloud II Ä‘Æ°á»£c t&iacute;ch há»£p cá»•ng&nbsp;<a href=\"https://phongvu.vn/usb-565.cat??utm_source=SEO\" target=\"_blank\">USB</a>&nbsp;gi&uacute;p káº¿t ná»‘i vá»›i cáº£&nbsp;<a href=\"https://phongvu.vn/buildpc/?utm_source=SEO\" target=\"_blank\">PC</a>&nbsp;láº«n Mac Ä‘á»ƒ khuáº¿ch Ä‘áº¡i &acirc;m thanh cÅ©ng nhÆ° giá»ng n&oacute;i. B&ecirc;n cáº¡nh Ä‘&oacute;, cá»•ng 3.5mm truyá»n thá»‘ng Ä‘Æ°á»£c nh&agrave; sáº£n xuáº¥t khuyáº¿n c&aacute;o sá»­ dá»¥ng cho PS4 v&agrave; Xbox One hay báº¥t ká»³ thiáº¿t bá»‹ giáº£i tr&iacute; n&agrave;o kh&aacute;c.</p>\r\n', 'hyper-x-cloud-ii-khx-hscp-rd', 749.99, 'hyper-x-cloud-ii-khx-hscp-rd_1558495654.jpg', '2019-05-20', 1),
(17, 1, 'Hyper X cloud III KHX-HSCP-RD', '<p>HyperX, má»™t bá»™ pháº­n thuá»™c&nbsp;<a href=\"https://phongvu.vn/searchpves/kingston?utm_source=SEO\" target=\"_blank\">Kingston</a>&nbsp;Technology vá»«a qua Ä‘&atilde; giá»›i thiá»‡u&nbsp;<a href=\"https://phongvu.vn/tai-nghe-904.cat?utm_source=SEO\" target=\"_blank\">tai nghe</a>&nbsp;HyperX Cloud II, báº£n n&acirc;ng cáº¥p cá»§a HyperX Cloud trÆ°á»›c Ä‘&acirc;y. HyperX Cloud II Ä‘Æ°á»£c trang bá»‹ bá»™ Ä‘iá»u khiá»ƒn &acirc;m thanh má»›i vá»›i kháº£ nÄƒng táº¡o ra hiá»‡u á»©ng &acirc;m thanh giáº£ láº­p 7.1, bá»• sung th&ecirc;m v&agrave;o nhá»¯ng t&iacute;nh nÄƒng v&agrave; Æ°u Ä‘iá»ƒm Ä‘&atilde; c&oacute; tr&ecirc;n phi&ecirc;n báº£n&nbsp;<a href=\"https://phongvu.vn/tai-nghe-904.cat?utm_source=SEO\" target=\"_blank\">tai nghe</a>&nbsp;HyperX Cloud Ä‘á»i Ä‘áº§u.</p>\r\n', 'hyper-x-cloud-iii-khx-hscp-rd', 49.99, 'hyper-x-cloud-iii-khx-hscp-rd_1558495660.jpg', '2018-05-12', 1),
(18, 2, 'Sades Xpower plus - SA706S', '<p>Tai nghe Sades Xpower plus - SA706S c&oacute; pháº§n vá» l&agrave;m tá»« nhá»±a cá»©ng, gi&uacute;p cho sáº£n pháº©m trá»Ÿ n&ecirc;n cháº¯c cháº¯n v&agrave; cá»©ng c&aacute;p, kh&oacute; bá»‹ g&atilde;y vá»¡. Pháº§n quai tai nghe c&oacute; Ä‘á»™ Ä‘&agrave;n há»“i tá»‘t, c&oacute; thá»ƒ Ä‘iá»u ch&igrave;nh cho vá»«a vá»›i Ä‘áº§u cá»§a ngÆ°á»i d&ugrave;ng. Pháº§n tr&ecirc;n Ä‘áº§u c&oacute; lá»›p Ä‘á»‡m gi&uacute;p cho ngÆ°á»i d&ugrave;ng kh&ocirc;ng c&oacute; cáº£m gi&aacute;c Ä‘au hay kh&oacute; chá»‹u khi sá»­ dá»¥ng l&acirc;u.<br />\r\nThiáº¿t káº¿ khá»e khoáº¯n, c&aacute; t&iacute;nh, kiá»ƒu d&aacute;ng gaming, m&agrave;u Ä‘en vá»›i há»a tiáº¿t m&agrave;u xanh dÆ°Æ¡ng táº¡o n&ecirc;n cáº£m gi&aacute;c m&aacute;t máº» v&agrave; ná»•i báº­t. Pháº§n earcup Ä‘Æ°á»£c trang bá»‹ Ä‘&egrave;n LED l&agrave;m cho sáº£n pháº©m Ä‘Æ°á»£c báº¯t máº¯t hÆ¡n.<br />\r\nPháº§n tai nghe cÅ©ng Ä‘Æ°á»£c trang bá»‹ lá»›p Ä‘á»‡m d&agrave;y vá»«a gi&uacute;p c&aacute;ch &acirc;m tá»‘t vá»«a chá»‘ng Ä‘au má»i cho ngÆ°á»i sá»­ dá»¥ng.</p>\r\n', 'sades-xpower-plus-sa706s', 79.99, 'sades-xpower-plus-sa706s_1558495674.jpg', '2018-05-12', 2),
(19, 2, 'SteelSeries Arctis 5', '<p>- Driver giá»‘ng vá»›i c&aacute;c tai nghe Ä‘á»i cao cá»§a Steelseries, cho chi tiáº¿t cao, &acirc;m thanh c&acirc;n báº±ng v&agrave; Ä‘á»™ m&eacute;o cá»±c tháº¥p.</p>\r\n\r\n<p>- Giáº£ láº­p &acirc;m thanh v&ograve;m DTS 7.1 sá»‘ng Ä‘á»™ng. - Led RGB 16,8 triá»‡u m&agrave;u tuá»³ chá»‰nh c&oacute; tháº©m má»¹ cao v&agrave; c&aacute; t&iacute;nh ri&ecirc;ng.</p>\r\n\r\n<p>- Äá»‡m Ä‘áº§u l&agrave;m báº±ng váº£i Ä‘&agrave;n há»“i c&oacute; thá»ƒ Ä‘iá»u chá»‰nh, ph&acirc;n bá»‘ Ä‘á»u khá»‘i lÆ°á»£ng tai nghe, loáº¡i bá» táº¥t cáº£ c&aacute;c Ä‘iá»ƒm g&acirc;y &aacute;p lá»±c. - Microphone lá»c á»“n m&ocirc;i trÆ°á»ng v&agrave; khá»­ m&eacute;o giá»ng n&oacute;i; c&oacute; thá»ƒ k&eacute;o d&agrave;i v&agrave; thu gá»n. - Äá»‡m tai tho&aacute;ng kh&iacute;, thiáº¿t káº¿ sá»­ dá»¥ng c&aacute;c cháº¥t liá»‡u Ä‘Æ°á»£c sá»­ dá»¥ng trong thá»ƒ thao chuy&ecirc;n nghiá»‡p.</p>\r\n', 'steelseries-arctis-5', 99.99, 'steelseries-arctis-5_1558495696.jpg', '2019-05-19', 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `pay_id` varchar(50) NOT NULL,
  `sales_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `sales`
--

INSERT INTO `sales` (`id`, `user_id`, `pay_id`, `sales_date`) VALUES
(24, 21, 'PAY-2D4BA62828C090FEDCD26F7D46AE55E9', '2019-05-22'),
(25, 21, 'PAY-B61696FD06DF5386BF3FCEF56B5ABCA7', '2019-05-22'),
(26, 21, 'PAY-6763357EAE2D2890494EC4120F5C0609', '2019-05-22');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(60) NOT NULL,
  `type` int(1) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `contact_info` varchar(100) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `status` int(1) NOT NULL,
  `activate_code` varchar(15) NOT NULL,
  `reset_code` varchar(15) NOT NULL,
  `created_on` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `type`, `firstname`, `lastname`, `address`, `contact_info`, `photo`, `status`, `activate_code`, `reset_code`, `created_on`) VALUES
(1, 'admin@admin.com', '$2y$10$.cCviKGEn6hZZB5DnSzq/O565N2nhNw7bg02uSJReNvWsgVOAbboy', 1, 'Hieu', 'Nguyen', '', '', 'admin.png', 1, '', '', '2018-05-01'),
(16, 'kerikuni12@gmail.com', '$2y$10$0QJcehlV/.Na9WfpqS4fAe10uSy7IW3zSX2UZgLEyZvxj7iHXAEDi', 0, 'hieu', 'nguyen', 'Ã dfs', 'sdfsdf', 'Avatar.png', 1, '', '', '2019-05-21'),
(21, 'tailieust25@gmail.com', '$2y$10$nm2L2Q6RRXrZXdT/I2uI2ehGYdx.SDUj/Mh8Mj4X3L.V5REfNGYx.', 0, 'nguyen', 'hieu', '', '', '', 1, 'gfPEO4YKRcBx', '', '2019-05-22');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `details`
--
ALTER TABLE `details`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `details`
--
ALTER TABLE `details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

--Add products.review
ALTER TABLE `products` ADD `review` LONGTEXT CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL AFTER `counter`;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
