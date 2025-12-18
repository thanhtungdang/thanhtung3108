-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2025 at 09:12 AM
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
-- Database: `duanquanao`
--

-- --------------------------------------------------------

--
-- Table structure for table `binhluan`
--

CREATE TABLE `binhluan` (
  `id` int(11) NOT NULL,
  `noidung` varchar(255) NOT NULL,
  `iduser` int(11) NOT NULL,
  `idpro` int(11) NOT NULL,
  `ngaybinhluan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `binhluan`
--

INSERT INTO `binhluan` (`id`, `noidung`, `iduser`, `idpro`, `ngaybinhluan`) VALUES
(1, 'Áo đẹp, size chuẩn!', 1, 1, '10:00 12/12/2025'),
(2, 'Giao hàng nhanh, đóng gói cẩn thận.', 2, 5, '15:30 13/12/2025'),
(3, 'Chất liệu vải rất mát, đá bóng sướng.', 3, 24, '09:00 16/12/2025'),
(4, 'Mọi người nên mua tăng 1 size nhé.', 4, 13, '11:20 16/12/2025');

-- --------------------------------------------------------

--
-- Table structure for table `chitiethoadon`
--

CREATE TABLE `chitiethoadon` (
  `id` int(11) NOT NULL,
  `id_hoadon` int(11) NOT NULL,
  `id_sanpham` int(11) NOT NULL,
  `size` varchar(50) NOT NULL,
  `soluong` int(11) NOT NULL,
  `gia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chitiethoadon`
--

INSERT INTO `chitiethoadon` (`id`, `id_hoadon`, `id_sanpham`, `size`, `soluong`, `gia`) VALUES
(1, 1, 1, 'M', 1, 2800000),
(2, 1, 16, 'Free Size', 2, 550000),
(3, 2, 5, 'L', 1, 3200000),
(4, 3, 24, 'M', 1, 3500000),
(5, 3, 27, 'Free Size', 1, 450000),
(6, 4, 2, 'S', 1, 2800000),
(7, 4, 13, 'S', 1, 2900000),
(8, 5, 1, 'L', 2, 2800000),
(9, 5, 25, 'S', 1, 1800000),
(10, 6, 26, 'XL', 1, 2200000);

-- --------------------------------------------------------

--
-- Table structure for table `danhmuc`
--

CREATE TABLE `danhmuc` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `deleted` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `danhmuc`
--

INSERT INTO `danhmuc` (`id`, `name`, `deleted`) VALUES
(1, 'Match Kits 24/25', 0),
(2, 'Training Wear', 0),
(3, 'Barca Lifestyle', 0),
(4, 'Accessories', 0),
(5, 'Memorabilia & Gifts', 0);

-- --------------------------------------------------------

--
-- Table structure for table `giohang`
--

CREATE TABLE `giohang` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_sanpham` int(11) NOT NULL,
  `size` varchar(50) NOT NULL,
  `soluong` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `giohang`
--

INSERT INTO `giohang` (`id`, `id_user`, `id_sanpham`, `size`, `soluong`) VALUES
(1, 1, 17, 'Size 5', 1),
(2, 3, 22, 'Free Size', 5);

-- --------------------------------------------------------

--
-- Table structure for table `hoadon`
--

CREATE TABLE `hoadon` (
  `id` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `tenkhachhang` varchar(255) NOT NULL,
  `diachi` varchar(255) NOT NULL,
  `sdt` varchar(12) NOT NULL,
  `ngaygiodat` datetime NOT NULL DEFAULT current_timestamp(),
  `tongtien` int(11) NOT NULL,
  `pttt` int(11) NOT NULL COMMENT '0:COD, 1:Bank',
  `trangthai` int(11) NOT NULL DEFAULT 0 COMMENT '0:Mới, 1:Đang xử lý, 2:Đang giao, 3:Đã giao, 4:Hủy'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hoadon`
--

INSERT INTO `hoadon` (`id`, `id_user`, `tenkhachhang`, `diachi`, `sdt`, `ngaygiodat`, `tongtien`, `pttt`, `trangthai`) VALUES
(1, 1, 'Nguyễn Văn Culer', '123 Mỹ Đình, HN', '0911111111', '2025-12-10 09:00:00', 3900000, 1, 4),
(2, 2, 'Lionel Messi', 'District 1, HCMC', '0922222222', '2025-12-15 14:00:00', 3200000, 0, 3),
(3, 3, 'Pedri González', 'Tenerife, Spain', '0933333333', '2025-12-16 08:30:00', 3950000, 1, 2),
(4, 4, 'Pablo Gavi', 'La Masia, BCN', '0944444444', '2025-12-16 10:15:00', 5800000, 0, 1),
(5, 5, 'Frenkie De Jong', 'Camp Nou, BCN', '0955555555', '2025-12-17 11:00:00', 7400000, 1, 0),
(6, 1, 'Nguyễn Văn Culer', 'Cầu Giấy, HN', '0911111111', '2025-12-17 12:45:00', 2200000, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `nguoidung`
--

CREATE TABLE `nguoidung` (
  `id` int(11) NOT NULL,
  `user` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(50) DEFAULT NULL,
  `tel` varchar(50) DEFAULT NULL,
  `role` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nguoidung`
--

INSERT INTO `nguoidung` (`id`, `user`, `pass`, `email`, `address`, `tel`, `role`) VALUES
(1, 'culer_vn', '123', 'fan@gmail.com', 'Hanoi, Vietnam', '0911111111', 0),
(2, 'messi10', '123', 'leo@gmail.com', 'Rosario, Argentina', '0922222222', 0),
(3, 'pedri8', '123', 'pedri@barca.com', 'Canary Islands', '0933333333', 0),
(4, 'gavi6', '123', 'gavi@barca.com', 'Seville, Spain', '0944444444', 0),
(5, 'frenkie21', '123', 'frenkie@barca.com', 'Amsterdam, Netherlands', '0955555555', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `size` varchar(100) NOT NULL DEFAULT 'S, M, L, XL',
  `img` varchar(255) DEFAULT NULL,
  `mota` varchar(255) DEFAULT NULL,
  `luotxem` int(11) NOT NULL DEFAULT 0,
  `iddm` int(11) NOT NULL,
  `deleted` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`id`, `name`, `price`, `size`, `img`, `mota`, `luotxem`, `iddm`, `deleted`) VALUES
(1, 'FC Barcelona Home Kit 24/25', 2800000, 'S, M, L, XL', 'image/694368ae6d486_HJ4590-456_415227879_D_A_1X1_e3028dab-beb3-4a47-a7bc-0783a5f75462.avif', 'Áo đấu sân nhà kỷ niệm 125 năm thành lập CLB.', 1500, 1, 0),
(2, 'FC Barcelona Away Kit 24/25', 2800000, 'S, M, L, XL', 'image/694368ce6473a_HJ4603-784_431735711_D_A_1X1_4ebdb94b-be58-4c4a-bceb-d3900f4fdc4f.webp', 'Áo đấu sân khách màu đen sang trọng.', 1200, 1, 0),
(3, 'FC Barcelona Third Kit 24/25', 2800000, 'S, M, L, XL', 'image/694368f077c45__GP20998.webp', 'Áo đấu thứ 3 màu xanh dạ quang.', 900, 1, 0),
(4, 'Lewandowski 9 - Home Shirt', 3200000, 'S, M, L, XL', 'image/694369153c869_81oLMzXR9qL._AC_UY1000_.jpg', 'Áo đấu sân nhà in tên Lewandowski số 9.', 800, 1, 0),
(5, 'Lamine Yamal 19 - Home Shirt', 3200000, 'S, M, L, XL', 'image/6943693d50da4_lamineyamal-ucl_7c9afdfb-cfe5-43ff-bf30-b74e4e5b837b.webp', 'Áo đấu thần đồng Lamine Yamal.', 2000, 1, 0),
(8, 'Nike Barca Strike Drill Top', 1800000, 'S, M, L, XL', 'image/69436979ddf2a_FCBarcelonaStrikeMen_sNikeDri-FITSoccerDrillTopFN9834-717_2000x.webp', 'Áo dài tay tập luyện công nghệ Dri-FIT.', 600, 2, 0),
(9, 'Nike Barca Training Pants', 1500000, 'S, M, L, XL', 'image/694369a977627_VO250917A51522_med.webp', 'Quần dài tập luyện co giãn.', 500, 2, 0),
(12, 'Barca Crest T-Shirt', 850000, 'S, M, L, XL', 'image/694369ed3e2d2_BLM1TB24P_1.webp', 'Áo phông cotton basic in logo CLB.', 1000, 3, 0),
(13, 'Nike Tech Fleece Hoodie', 2900000, 'S, M, L, XXL', 'image/69436a22aee5c_HQ1829-411-VPSRH001.webp', 'Áo khoác nỉ cao cấp Tech Fleece.', 800, 3, 0),
(16, 'Barca Fan Scarf', 550000, 'Free Size', 'image/69436a44f3442_unnamed_5f961503-282b-4c1b-b7e9-416fb39cce60.webp', 'Khăn quàng cổ động viên truyền thống.', 2000, 4, 0),
(17, 'Nike Barca Prestige Ball', 750000, 'Size 5', 'image/69436a6ab955a_DX4611-455_1.webp', 'Bóng đá size 5 in logo Barca.', 600, 4, 0),
(18, 'Barca Snapback Cap', 650000, 'Free Size', 'image/69436a9007423_700x1060-BLM3GBLP-2.webp', 'Mũ lưỡi trai xanh tím than.', 900, 4, 0),
(19, 'Nike Heritage Backpack', 1100000, 'Free Size', 'image/69436ac837db4_HV2229-455_Y_FA25_EQUIPMENT_PHSFP001.jpg', 'Balo đựng đồ thể thao tiện dụng.', 400, 4, 0),
(21, 'Camp Nou 3D Model', 1200000, 'Free Size', 'image/69436af467897_resize-6b-1.webp', 'Mô hình sân vận động Camp Nou lắp ghép 3D.', 150, 5, 0),
(22, 'Barca Keyring Metal', 250000, 'Free Size', 'image/69436b1a0acb2_unnamed_ed655574-f1af-4a4a-bd45-dad32d9a6610.webp', 'Móc khóa kim loại logo CLB.', 1200, 5, 0),
(23, 'Ter Stegen 1 - GK Kit', 2900000, 'S, M, L, XL', 'image/69436b3da5658_terstegen-ucl.webp', 'Áo đấu thủ môn màu xanh lá cây.', 450, 1, 0),
(24, 'Barca Retro 2011 Final Wembley', 3500000, 'S, M, L, XL', 'image/69436be2c9c79_Barcelona-2011-Champions-League-Final-Shirt-Retro.webp', 'Áo đấu phiên bản chung kết C1 2011.', 3000, 5, 0),
(25, 'Barca Kids Home Kit', 1800000, 'XS, S, M', 'image/69436bffe005d_BARC_A_KIDS_C1_LK_07_2559.webp', 'Bộ quần áo thi đấu cho trẻ em.', 700, 1, 0),
(26, 'Nike Windrunner Jacket', 2200000, 'S, M, L, XL', 'image/69436c46d058f_HM3120-594_1.webp', 'Áo khoác gió thể thao chống nước.', 1100, 2, 0),
(27, 'Barca Metal Water Bottle', 450000, 'Free Size', 'image/69436c6a622d6_75640_1.webp', 'Bình nước giữ nhiệt in logo.', 300, 4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `sanpham_size`
--

CREATE TABLE `sanpham_size` (
  `id` int(11) NOT NULL,
  `id_sanpham` int(11) NOT NULL,
  `size` varchar(50) NOT NULL,
  `soluong` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sanpham_size`
--

INSERT INTO `sanpham_size` (`id`, `id_sanpham`, `size`, `soluong`) VALUES
(79, 1, 'S', 10),
(80, 1, 'M', 20),
(81, 1, 'L', 15),
(82, 1, 'XL', 5),
(83, 2, 'S', 8),
(84, 2, 'M', 12),
(85, 2, 'L', 10),
(86, 2, 'XL', 2),
(87, 3, 'S', 5),
(88, 3, 'M', 10),
(89, 3, 'L', 8),
(90, 3, 'XL', 5),
(91, 4, 'S', 10),
(92, 4, 'M', 11),
(93, 4, 'L', 20),
(94, 4, 'XL', 30),
(95, 5, 'S', 15),
(96, 5, 'M', 25),
(97, 5, 'L', 20),
(98, 5, 'XL', 10),
(99, 8, 'S', 5),
(100, 8, 'M', 10),
(101, 8, 'L', 10),
(102, 8, 'XL', 5),
(103, 9, 'S', 5),
(104, 9, 'M', 10),
(105, 9, 'L', 10),
(106, 9, 'XL', 5),
(107, 12, 'S', 20),
(108, 12, 'M', 30),
(109, 12, 'L', 20),
(110, 12, 'XL', 10),
(111, 13, 'S', 5),
(112, 13, 'M', 8),
(113, 13, 'L', 8),
(114, 13, 'XXL', 35),
(115, 16, 'Free Size', 50),
(116, 17, 'Size 5', 30),
(117, 18, 'Free Size', 40),
(118, 19, 'Free Size', 20),
(119, 21, 'Free Size', 10),
(120, 22, 'Free Size', 100),
(121, 23, 'S', 5),
(122, 23, 'M', 5),
(123, 23, 'L', 5),
(124, 23, 'XL', 2),
(125, 24, 'S', 3),
(126, 24, 'M', 3),
(127, 24, 'L', 2),
(128, 24, 'XL', 1),
(129, 25, 'XS', 10),
(130, 25, 'S', 10),
(131, 25, 'M', 10),
(132, 26, 'S', 8),
(133, 26, 'M', 12),
(134, 26, 'L', 10),
(135, 26, 'XL', 5),
(136, 27, 'Free Size', 50);

-- --------------------------------------------------------

--
-- Table structure for table `taikhoan`
--

CREATE TABLE `taikhoan` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `user` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `tel` varchar(20) DEFAULT NULL,
  `role` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `taikhoan`
--

INSERT INTO `taikhoan` (`id`, `name`, `user`, `pass`, `email`, `address`, `tel`, `role`) VALUES
(1, 'Administrator', 'admin', '123', 'admin@barcastore.com', 'Barcelona HQ', '0999999999', 1),
(2, 'Nhân Viên Kho', 'staff1', '123', 'kho@barcastore.com', 'Warehouse A', '0888888888', 1),
(3, 'Quản Lý Cửa Hàng', 'manager', '123', 'hansi@barcastore.com', 'Camp Nou Office', '0777777777', 1),
(4, 'CSKH Online', 'support', '123', 'hotline@barcastore.com', 'Call Center', '19001000', 1),
(6, 'Wang22', 'abc22', '123', 'ADCC@gmail.com', 'Hải Phòng3', '0993333332', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `binhluan`
--
ALTER TABLE `binhluan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_binhluan_user` (`iduser`),
  ADD KEY `fk_binhluan_product` (`idpro`);

--
-- Indexes for table `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cthd_hoadon` (`id_hoadon`),
  ADD KEY `fk_cthd_sanpham` (`id_sanpham`);

--
-- Indexes for table `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `giohang`
--
ALTER TABLE `giohang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_giohang_user` (`id_user`),
  ADD KEY `fk_giohang_sanpham` (`id_sanpham`);

--
-- Indexes for table `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_hoadon_user` (`id_user`);

--
-- Indexes for table `nguoidung`
--
ALTER TABLE `nguoidung`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lk_sanpham_danhmuc` (`iddm`);

--
-- Indexes for table `sanpham_size`
--
ALTER TABLE `sanpham_size`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_size_sanpham` (`id_sanpham`);

--
-- Indexes for table `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `binhluan`
--
ALTER TABLE `binhluan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `giohang`
--
ALTER TABLE `giohang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `nguoidung`
--
ALTER TABLE `nguoidung`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `sanpham_size`
--
ALTER TABLE `sanpham_size`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;

--
-- AUTO_INCREMENT for table `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `binhluan`
--
ALTER TABLE `binhluan`
  ADD CONSTRAINT `fk_binhluan_product` FOREIGN KEY (`idpro`) REFERENCES `sanpham` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_binhluan_user` FOREIGN KEY (`iduser`) REFERENCES `nguoidung` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD CONSTRAINT `fk_cthd_hoadon` FOREIGN KEY (`id_hoadon`) REFERENCES `hoadon` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_cthd_sanpham` FOREIGN KEY (`id_sanpham`) REFERENCES `sanpham` (`id`);

--
-- Constraints for table `giohang`
--
ALTER TABLE `giohang`
  ADD CONSTRAINT `fk_giohang_sanpham` FOREIGN KEY (`id_sanpham`) REFERENCES `sanpham` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_giohang_user` FOREIGN KEY (`id_user`) REFERENCES `taikhoan` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `lk_sanpham_danhmuc` FOREIGN KEY (`iddm`) REFERENCES `danhmuc` (`id`);

--
-- Constraints for table `sanpham_size`
--
ALTER TABLE `sanpham_size`
  ADD CONSTRAINT `fk_size_sanpham` FOREIGN KEY (`id_sanpham`) REFERENCES `sanpham` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
