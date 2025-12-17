-- phpMyAdmin SQL Dump
-- Host: 127.0.0.1
-- Generation Time: Current Time
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fcbarcelona_store`
--
CREATE DATABASE IF NOT EXISTS `fcbarcelona_store` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `fcbarcelona_store`;

-- --------------------------------------------------------

--
-- 1. Bảng `categories` (Danh mục sản phẩm)
-- Dựa trên menu của store.fcbarcelona.com
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `categories` (`id`, `name`, `description`) VALUES
(1, 'Match Kits', 'Áo đấu chính thức sân nhà, sân khách'),
(2, 'Training', 'Đồ tập luyện, áo khoác, quần dài'),
(3, 'Barça Lifestyle', 'Thời trang hàng ngày, áo phông, hoodie'),
(4, 'Accessories', 'Phụ kiện: Mũ, khăn, bóng, balo');

-- --------------------------------------------------------

--
-- 2. Bảng `products` (Sản phẩm)
-- Dữ liệu mẫu lấy từ store FC Barcelona
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL COMMENT 'Giá tính theo USD hoặc quy đổi',
  `image` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `created_at` timestamp DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `fk_products_category` (`category_id`),
  CONSTRAINT `fk_products_category` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `products` (`id`, `name`, `price`, `image`, `description`, `category_id`) VALUES
(1, 'FC Barcelona Home Kit 24/25', 150.00, 'home_kit_2425.jpg', 'Áo đấu sân nhà mùa giải 2024/25, công nghệ Dri-FIT ADV.', 1),
(2, 'FC Barcelona Away Kit 24/25', 140.00, 'away_kit_2425.jpg', 'Áo đấu sân khách màu đen sang trọng.', 1),
(3, 'FC Barcelona Third Kit', 140.00, 'third_kit.jpg', 'Áo đấu thứ 3 màu xanh ngọc.', 1),
(4, 'Barça Training Top', 65.00, 'training_top.jpg', 'Áo tập luyện dài tay chính hãng Nike.', 2),
(5, 'Pre-Match Academy Shirt', 50.00, 'pre_match.jpg', 'Áo khởi động trước trận đấu.', 2),
(6, 'Barça Crest T-Shirt', 35.00, 'crest_tshirt.jpg', 'Áo phông cotton in logo CLB lớn.', 3),
(7, 'Nike Windrunner Jacket', 110.00, 'windrunner.jpg', 'Áo khoác gió thể thao thiết kế cổ điển.', 3),
(8, 'Barça Scarf', 25.00, 'scarf.jpg', 'Khăn quàng cổ truyền thống Blaugrana.', 4),
(9, 'Heritage Backpack', 45.00, 'backpack.jpg', 'Balo đựng laptop và đồ tập.', 4),
(10, 'Camp Nou Ball', 30.00, 'ball.jpg', 'Bóng đá size 5 in họa tiết sân Camp Nou.', 4);

-- --------------------------------------------------------

--
-- 3. Bảng `users` (Người dùng)
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `role` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0: User, 1: Admin',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `users` (`id`, `username`, `password`, `full_name`, `email`, `address`, `phone`, `role`) VALUES
(1, 'admin', '123', 'Super Admin', 'admin@fcbarcelona.com', 'Camp Nou, Barcelona', '000000000', 1),
(2, 'lewandowski', '123', 'Robert Lewandowski', 'lewy9@gmail.com', 'Warsaw, Poland', '0988888888', 0),
(3, 'pedri', '123', 'Pedri González', 'pedri8@gmail.com', 'Canary Islands, Spain', '0977777777', 0),
(4, 'gavi', '123', 'Pablo Gavi', 'gavi6@gmail.com', 'Seville, Spain', '0966666666', 0),
(5, 'yamal', '123', 'Lamine Yamal', 'yamal19@gmail.com', 'Barcelona, Spain', '0955555555', 0);

-- --------------------------------------------------------

--
-- 4. Bảng `cart` (Giỏ hàng - Có thêm Size)
-- Mỗi user có giỏ hàng riêng
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `size` varchar(10) NOT NULL DEFAULT 'M' COMMENT 'S, M, L, XL, XXL',
  PRIMARY KEY (`id`),
  KEY `fk_cart_user` (`user_id`),
  KEY `fk_cart_product` (`product_id`),
  CONSTRAINT `fk_cart_product` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk_cart_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dữ liệu mẫu: User Lewandowski (id=2) đang chọn mua đồ
--
INSERT INTO `cart` (`user_id`, `product_id`, `quantity`, `size`) VALUES
(2, 1, 1, 'L'),     -- Mua 1 áo sân nhà size L
(2, 8, 2, 'OneSize'); -- Mua 2 khăn quàng cổ

-- --------------------------------------------------------

--
-- 5. Bảng `orders` (Hóa đơn)
-- Lưu lịch sử đơn hàng
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `total_money` decimal(10,2) NOT NULL,
  `order_date` datetime NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '0: Pending, 1: Shipping, 2: Completed, 3: Cancelled',
  `shipping_address` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_orders_user` (`user_id`),
  CONSTRAINT `fk_orders_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `orders` (`id`, `user_id`, `total_money`, `order_date`, `status`, `shipping_address`) VALUES
(1, 3, 205.00, '2024-05-10 10:00:00', 2, 'Canary Islands, Spain'),
(2, 4, 65.00, '2024-05-12 14:30:00', 1, 'Seville, Spain');

-- --------------------------------------------------------

--
-- 6. Bảng `order_details` (Chi tiết hóa đơn)
-- Lưu chi tiết từng món đã mua trong quá khứ (bao gồm cả size)
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `size` varchar(10) NOT NULL DEFAULT 'M',
  PRIMARY KEY (`id`),
  KEY `fk_od_order` (`order_id`),
  KEY `fk_od_product` (`product_id`),
  CONSTRAINT `fk_od_order` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk_od_product` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dữ liệu chi tiết cho đơn hàng số 1 (của Pedri)
--
INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `quantity`, `price`, `size`) VALUES
(1, 1, 1, 1, 150.00, 'M'), -- 1 Áo Home Kit
(2, 1, 5, 1, 50.00, 'M'),  -- 1 Áo Pre-Match
(3, 1, 10, 1, 5.00, 'N/A'); -- (Giả sử mua thêm móc khóa/phụ kiện nhỏ)

--
-- Dữ liệu chi tiết cho đơn hàng số 2 (của Gavi)
--
INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `quantity`, `price`, `size`) VALUES
(4, 2, 4, 1, 65.00, 'S'); -- 1 Áo Training Top

-- --------------------------------------------------------

--
-- 7. Bảng `reviews` (Bình luận/Đánh giá)
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL DEFAULT 5,
  `comment` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `fk_reviews_user` (`user_id`),
  KEY `fk_reviews_product` (`product_id`),
  CONSTRAINT `fk_reviews_product` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk_reviews_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `reviews` (`user_id`, `product_id`, `rating`, `comment`) VALUES
(3, 1, 5, 'Visca el Barca! Áo rất đẹp và thoáng mát.'),
(5, 4, 4, 'Chất lượng tốt nhưng size hơi rộng so với mình.');

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;