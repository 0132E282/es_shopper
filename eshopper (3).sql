-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 10, 2022 lúc 01:48 PM
-- Phiên bản máy phục vụ: 10.4.27-MariaDB
-- Phiên bản PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `eshopper`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill`
--

CREATE TABLE `bill` (
  `id` int(11) NOT NULL,
  `fullName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `creataAt` datetime DEFAULT current_timestamp(),
  `font_number` int(10) NOT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment` int(11) NOT NULL,
  `total_product` int(11) NOT NULL,
  `price_shipper` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `bill`
--

INSERT INTO `bill` (`id`, `fullName`, `email`, `creataAt`, `font_number`, `address`, `payment`, `total_product`, `price_shipper`) VALUES
(59, 'phúc nguyễn', 'nguyenhoangphuc201122@gmail.com', '2022-12-10 18:54:47', 1323423412, 'tan the nhat 129 / q12 / ho chi minh', 3, 0, 0),
(60, 'phúc nguyễn', 'nguyenhoangphuc201122@gmail.com', '2022-12-10 18:55:15', 1323423412, 'tan the nhat 129 / q12 / ho chi minh', 2, 0, 0),
(61, 'phúc nguyễn', 'nguyenhoangphuc201122@gmail.com', '2022-12-10 18:55:40', 1323423412, 'tan the nhat 129 / q12 / ho chi minh', 1, 0, 0),
(62, 'phúc nguyễn', 'nguyenhoangphuc201122@gmail.com', '2022-12-10 19:02:53', 1323423412, 'tan the nhat 129 / q12 / ho chi minh', 2, 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill_cart`
--

CREATE TABLE `bill_cart` (
  `id` int(11) NOT NULL,
  `id_bill` int(11) NOT NULL,
  `count` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `creataAt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `bill_cart`
--

INSERT INTO `bill_cart` (`id`, `id_bill`, `count`, `id_product`, `creataAt`) VALUES
(29, 59, 1, 3, '2022-12-10 11:54:47'),
(30, 59, 1, 5, '2022-12-10 11:54:48'),
(31, 59, 1, 10, '2022-12-10 11:54:48'),
(32, 60, 1, 3, '2022-12-10 11:55:15'),
(33, 60, 1, 5, '2022-12-10 11:55:15'),
(34, 60, 1, 10, '2022-12-10 11:55:15'),
(35, 61, 1, 3, '2022-12-10 11:55:40'),
(36, 61, 1, 5, '2022-12-10 11:55:40'),
(37, 61, 1, 10, '2022-12-10 11:55:40'),
(38, 62, 1, 3, '2022-12-10 12:02:53'),
(39, 62, 1, 5, '2022-12-10 12:02:53'),
(40, 62, 1, 10, '2022-12-10 12:02:53');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `text` varchar(255) NOT NULL,
  `id_product` int(11) NOT NULL,
  `createAt` datetime NOT NULL DEFAULT current_timestamp(),
  `name` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `images_product`
--

CREATE TABLE `images_product` (
  `id` int(11) NOT NULL,
  `photo_url` varchar(500) NOT NULL DEFAULT 'http://localhost/shop_fashion/resources/assets/images/deflau_shop.png	',
  `createAt` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `is_main` double NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `images_product`
--

INSERT INTO `images_product` (`id`, `photo_url`, `createAt`, `id_product`, `is_main`) VALUES
(2, 'http://localhost/shop_fashion/resources/assets/images/deflau_shop.png	', 0, 1, 1),
(3, 'http://localhost/shop_fashion/resources/assets/images/deflau_shop.png	', 0, 2, 1),
(4, 'http://localhost/shop_fashion/resources/assets/images/deflau_shop.png	', 0, 3, 1),
(5, 'http://localhost/shop_fashion/resources/assets/images/deflau_shop.png	', 0, 4, 1),
(6, 'http://localhost/shop_fashion/resources/assets/images/deflau_shop.png	', 0, 6, 1),
(7, 'http://localhost/shop_fashion/resources/assets/images/deflau_shop.png	', 0, 7, 1),
(8, 'http://localhost/shop_fashion/resources/assets/images/deflau_shop.png	', 0, 8, 1),
(9, 'http://localhost/shop_fashion/resources/assets/images/deflau_shop.png	', 0, 9, 1),
(10, 'http://localhost/shop_fashion/resources/assets/images/deflau_shop.png	', 0, 10, 1),
(11, 'http://localhost/shop_fashion/resources/assets/images/deflau_shop.png	', 0, 5, 1),
(12, 'http://localhost/shop_fashion/resources/assets/images/deflau_shop.png	', 0, 12, 1),
(13, 'http://localhost/shop_fashion/resources/assets/images/deflau_shop.png	', 0, 11, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name_product` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'tên sản phẩm',
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'mô tả thông tin sản phẩm',
  `id_styles` int(11) NOT NULL COMMENT 'id loại sản phẩm',
  `price_product` int(11) NOT NULL COMMENT 'giá sản phẩm',
  `count_product` int(11) NOT NULL DEFAULT 0 COMMENT 'số lượng sản phẩm',
  `count_comment` int(11) NOT NULL DEFAULT 0 COMMENT 'số lượng comment',
  `count_like` int(11) NOT NULL DEFAULT 0 COMMENT 'số lượng like',
  `delete_soft` tinyint(1) NOT NULL DEFAULT 0 COMMENT '1 là trạng thái xóa mền',
  `deleteAt` datetime DEFAULT NULL COMMENT 'thời gian xóa mền',
  `createAt` datetime DEFAULT current_timestamp() COMMENT 'thời gian tạo sản phẩm',
  `updateAt` datetime DEFAULT NULL COMMENT 'thời gian update sản phẩm',
  `count_buy` int(11) DEFAULT 0 COMMENT 'số lượng sản phẩm bán',
  `discount` float DEFAULT 0 COMMENT 'giảm giá theo phầm trăm'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `name_product`, `description`, `id_styles`, `price_product`, `count_product`, `count_comment`, `count_like`, `delete_soft`, `deleteAt`, `createAt`, `updateAt`, `count_buy`, `discount`) VALUES
(1, 'Áo Khoác Nữ Basic Thun Gân Chéo WOK 2026', 'Áo khoác chất liệu thun gân chéo thời trang, có điểm nhấn đường diễu đánh bông trên thân. Chất liệu thun cotton thông thoáng nhưng vẫn dày dặn đủ giữ ấm. Áo có 2 túi bụng thân trước và túi băng ngang bên trong tiện lợi, an toàn đựng đồ. Chi tiết logo sili', 1, 629000, 13, 0, 0, 0, '2022-12-04 14:22:03', '2022-12-04 20:24:14', '2022-12-04 14:22:03', 12, 0),
(2, 'Áo Thun Nữ Relax Fit Minions In Surprised WTS 2211', 'Mẫu áo thun nằm trong BST Minions với họa tiết kết hợp in dẻo và in cao ngộ nghĩnh, dễ thương phù hợp để mặc cặp đôi hoặc cho cả gia đình.', 1, 299000, 0, 0, 0, 0, '2022-12-04 14:33:25', '2022-12-04 20:37:07', '2022-12-04 14:33:25', 0, 0),
(3, 'Áo Thun Nữ Relax Fix Minions In Explore WTS 2212', 'Mẫu áo thun nằm trong BST Minions với họa tiết hình in dễ thương và thông điệp DON’T BE A BORE, EXPLORE.', 1, 299000, 0, 0, 0, 0, '2022-12-04 14:33:25', '2022-12-04 20:37:07', '2022-12-04 14:33:25', 56, 0),
(4, 'Áo Thun Nữ Cổ Tròn Slim Fit Basic WTS 2231', 'Áo thun cổ tròn basic vải đốm, form áo dễ mặc dễ phối đồ với bộ màu đa dạng cho bạn lựa chọn. Sản phẩm có thể mix&match với đa dạng các bottom khác nhau tạo phong cách năng động hơn.', 1, 139000, 13, 12, 122, 0, '2022-12-04 14:37:55', '2022-12-04 20:38:50', '2022-12-04 14:37:55', 0, 0),
(5, 'Áo Polo Nữ Pique Slim Fit Phối Bo Cổ WPO 2024', '', 1, 379000, 12, 123, 12, 0, '2022-12-04 14:40:23', '2022-12-04 20:41:00', '2022-12-04 14:40:23', 22, 0),
(6, 'Áo Kiểu Nữ Sơ Mi Caro WBL 2015', 'Áo có chi tiết xẻ sườn, lệch tà trước sau cùng điểm nhấn dây rút ở tay áo thời trang, nặng động.', 1, 499000, 12, 12, 1233, 0, '2022-12-04 14:41:36', '2022-12-04 20:42:21', '2022-12-04 14:41:36', 0, 0),
(7, 'Áo Sơ Mi Nam Cổ Danton Relax In Trước Ngực MSH 1016', 'Áo Sơ Mi Nam Cổ Danton Relax In Trước Ngực MSH 1016.  Áo sơ mi cổ danton trẻ trung, in thông điệp FLOW OF REALITY với bố cục lạ mắt trước ngực. Hệ nút kim loại cao cấp, tạo sự mạnh mẽ và năng động cho sản phẩm.', 2, 499000, 123, 11, 333, 0, NULL, '2022-12-04 20:44:42', NULL, 0, 0),
(8, 'Áo Thun Nam Regular Fit Minions In Always Iconic MTS 1214', 'Mẫu áo thun nam thuộc BST Minions mới nhất với hình in “ALWAYS ICONIC” nổi bật với nét ngộ nghĩnh, dễ thương. Form dáng gọn gàng, thoải mái. Dễ dàng phối với nhiều loại bottom.', 2, 299000, 23, 122, 11, 0, NULL, '2022-12-04 20:45:43', NULL, 0, 0),
(9, 'Áo Thun Nam Cổ Tròn Slim Fit Basic MTS 1231', 'Áo thun cổ tròn basic vải đốm, form áo dễ mặc dễ phối đồ với bộ màu đa dạng cho bạn lựa chọn. Sản phẩm có thể mix&match với đa dạng các bottom khác nhau tạo phong cách năng động hơn.', 2, 159000, 123, 1233, 12, 0, NULL, '2022-12-04 20:47:20', NULL, 0, 0),
(10, 'Áo Sơ Mi Nam Flannel Caro Phối MSH 1015', 'Áo sơ mi phối 2 caro tinh tế, lạ mắt. Áo xẻ sườn và nhãn phản quang đính thân dưới tạo điểm nhấn. Sản phẩm có thể mặc riêng với bottom hoặc khoác ngoài với áo thun bên trong.', 2, 579000, 12, 33, 22, 0, NULL, '2022-12-04 20:48:09', NULL, 123, 0),
(11, 'Áo Thun Nam Regular Fit Basic MTS 1216', 'Áo thun với chất liệu 100% Cotton co giãn nhẹ, form Regular thoải mái nhưng không bó sát cơ thể, giúp người mặc trông gọn gàng và khỏe khoắn. Thiết kế tối giản phù hợp mix & match tạo nhiều outfit đa dạng.', 2, 125300, 123, 123, 123, 0, NULL, '2022-12-04 20:49:27', NULL, 0, 0),
(12, 'Áo Thun Nam Cổ Tim Slim Fit Basic MTS 1230', 'Áo thun cổ tim basic vải đốm, form áo dễ mặc dễ phối đồ với bộ màu đa dạng cho bạn lựa chọn.', 2, 159000, 12, 123, 123, 0, NULL, '2022-12-04 20:50:35', NULL, 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `styles_product`
--

CREATE TABLE `styles_product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `photo_url` varchar(500) NOT NULL DEFAULT 'http://localhost/shop_fashion/resources/assets/images/deflau_shop.png',
  `createAt` datetime NOT NULL DEFAULT current_timestamp(),
  `count_product` int(11) NOT NULL COMMENT 'số lượng sản phẩm'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `styles_product`
--

INSERT INTO `styles_product` (`id`, `name`, `photo_url`, `createAt`, `count_product`) VALUES
(1, 'thời trang nữ ', 'http://localhost/shop_fashion/resources/assets/images/deflau_shop.png', '2022-12-04 19:52:21', 21),
(2, 'thời trang nam', 'http://localhost/shop_fashion/resources/assets/images/deflau_shop.png', '2022-12-04 19:58:26', 12),
(3, 'thời trang trẻ em', 'http://localhost/shop_fashion/resources/assets/images/deflau_shop.png', '2022-12-04 19:58:26', 44),
(4, 'đồng phục/đồ đôi ', 'http://localhost/shop_fashion/resources/assets/images/deflau_shop.png', '2022-12-04 20:00:19', 22),
(5, 'trang sức', 'http://localhost/shop_fashion/resources/assets/images/deflau_shop.png', '2022-12-04 20:04:57', 111),
(6, 'áo khoác', 'http://localhost/shop_fashion/resources/assets/images/deflau_shop.png', '2022-12-04 20:21:23', 14);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `password` varchar(40) NOT NULL,
  `coin` int(11) NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `createAt` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `font_number` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'quền admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `last_name`, `username`, `first_name`, `password`, `coin`, `gender`, `createAt`, `status`, `font_number`, `email`, `fullname`, `is_admin`) VALUES
(26, 'phúc', 'hoangphuc01975', 'nguyễn', '123', 0, 0, 0, 0, 1323423412, 'nguyenhoangphuc201122@gmail.com', 'phúc nguyễn', 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `bill_cart`
--
ALTER TABLE `bill_cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_bill` (`id_bill`),
  ADD KEY `id_product` (`id_product`);

--
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_product` (`id_product`);

--
-- Chỉ mục cho bảng `images_product`
--
ALTER TABLE `images_product`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `styles_product` (`id`,`name_product`),
  ADD KEY `id_styles` (`id_styles`);

--
-- Chỉ mục cho bảng `styles_product`
--
ALTER TABLE `styles_product`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bill`
--
ALTER TABLE `bill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT cho bảng `bill_cart`
--
ALTER TABLE `bill_cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `images_product`
--
ALTER TABLE `images_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `styles_product`
--
ALTER TABLE `styles_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `bill`
--
ALTER TABLE `bill`
  ADD CONSTRAINT `bill_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);

--
-- Các ràng buộc cho bảng `bill_cart`
--
ALTER TABLE `bill_cart`
  ADD CONSTRAINT `bill_cart_ibfk_1` FOREIGN KEY (`id_bill`) REFERENCES `bill` (`id`),
  ADD CONSTRAINT `bill_cart_ibfk_2` FOREIGN KEY (`id_product`) REFERENCES `product` (`id`);

--
-- Các ràng buộc cho bảng `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `product` (`id`);

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`id_styles`) REFERENCES `styles_product` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
