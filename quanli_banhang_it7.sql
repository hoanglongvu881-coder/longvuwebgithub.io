-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 29, 2026 at 11:41 AM
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
-- Database: `ql_banhang`
--

-- --------------------------------------------------------

--
-- Table structure for table `chitietdonhang`
--

CREATE TABLE `chitietdonhang` (
  `ma_ctdh` int(11) NOT NULL,
  `ma_dh` int(11) NOT NULL,
  `ma_sp` int(11) NOT NULL,
  `soluong` int(11) NOT NULL,
  `dongia` decimal(12,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chitietdonhang`
--

INSERT INTO `chitietdonhang` (`ma_ctdh`, `ma_dh`, `ma_sp`, `soluong`, `dongia`) VALUES
(15, 1, 1, 1, 20900000),
(16, 2, 2, 1, 23400000),
(17, 3, 1, 2, 20900000),
(18, 3, 4, 1, 5490000),
(19, 4, 2, 1, 20800000),
(20, 5, 4, 1, 19900000);

-- --------------------------------------------------------

--
-- Table structure for table `chudegopy`
--

CREATE TABLE `chudegopy` (
  `ma_cdgy` int(11) NOT NULL,
  `ten_cdgy` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chudegopy`
--

INSERT INTO `chudegopy` (`ma_cdgy`, `ten_cdgy`) VALUES
(1, 'Chất lượng sản phẩm'),
(2, 'Giá cả'),
(3, 'Dịch vụ giao hàng'),
(4, 'Chăm sóc khách hàng'),
(5, 'Thanh toán'),
(6, 'Khuyến mãi'),
(7, 'Bảo hành - đổi trả'),
(8, 'Website / Ứng dụng'),
(9, 'Góp ý khác');

-- --------------------------------------------------------

--
-- Table structure for table `donhang`
--

CREATE TABLE `donhang` (
  `ma_dh` int(11) NOT NULL,
  `ma_kh` int(11) NOT NULL,
  `ngaydat` datetime NOT NULL,
  `tongtien` decimal(12,2) NOT NULL,
  `trangthai` int(11) NOT NULL,
  `ma_httt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `donhang`
--

INSERT INTO `donhang` (`ma_dh`, `ma_kh`, `ngaydat`, `tongtien`, `trangthai`, `ma_httt`) VALUES
(1, 1, '2024-12-15 09:30:00', 20900000.00, 1, 1),
(2, 2, '2024-12-16 14:20:00', 23400000.00, 0, 2),
(3, 3, '2024-12-17 18:45:00', 45800000.00, 2, 3),
(4, 1, '2024-12-18 10:10:00', 20800000.00, 3, 5),
(5, 4, '2024-12-19 21:00:00', 19900000.00, 0, 4);

-- --------------------------------------------------------

--
-- Table structure for table `gopy`
--

CREATE TABLE `gopy` (
  `ma_gy` int(11) NOT NULL,
  `hoten_gy` varchar(50) NOT NULL,
  `email_gy` varchar(50) NOT NULL,
  `diachi_gy` varchar(100) NOT NULL,
  `dienthoai_gy` varchar(50) NOT NULL,
  `tieude_gy` varchar(255) NOT NULL,
  `noidung_gy` text NOT NULL,
  `ngay_gy` datetime NOT NULL,
  `ma_cdgy` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gopy`
--

INSERT INTO `gopy` (`ma_gy`, `hoten_gy`, `email_gy`, `diachi_gy`, `dienthoai_gy`, `tieude_gy`, `noidung_gy`, `ngay_gy`, `ma_cdgy`) VALUES
(1, 'Nguyễn Văn An', 'annv@gmail.com', 'Hà Nội', '0901234567', 'Chất lượng sản phẩm rất tốt', 'Tôi đã mua điện thoại và cảm thấy rất hài lòng về chất lượng cũng như đóng gói sản phẩm.', '2024-12-20 09:15:00', 1),
(2, 'Trần Thị Lan', 'lantt@gmail.com', 'TP Hồ Chí Minh', '0912345678', 'Giá sản phẩm hơi cao', 'Giá của một số sản phẩm còn cao so với mặt bằng chung, mong shop có thêm khuyến mãi.', '2024-12-21 14:30:00', 2),
(3, 'Lê Minh Hiền', 'hienlm@gmail.com', 'Đà Nẵng', '0923456789', 'Giao hàng nhanh', 'Shop giao hàng rất nhanh, đóng gói cẩn thận, tôi rất hài lòng.', '2024-12-22 10:45:00', 3),
(4, 'Phạm Thị Dung', 'dungpt@gmail.com', 'Cần Thơ', '0934567890', 'Nhân viên hỗ trợ nhiệt tình', 'Bộ phận chăm sóc khách hàng hỗ trợ rất nhanh và thân thiện.', '2024-12-23 16:20:00', 4),
(5, 'Hoàng Văn Thắng', 'thanghv@gmail.com', 'Hải Phòng', '0945678901', 'Thanh toán tiện lợi', 'Các hình thức thanh toán đa dạng và rất tiện lợi cho khách hàng.', '2024-12-24 08:50:00', 5);

-- --------------------------------------------------------

--
-- Table structure for table `hinhsanpham`
--

CREATE TABLE `hinhsanpham` (
  `ma_hsp` int(11) NOT NULL,
  `tentaptin_hsp` varchar(255) NOT NULL,
  `masp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hinhsanpham`
--

INSERT INTO `hinhsanpham` (`ma_hsp`, `tentaptin_hsp`, `masp`) VALUES
(1, 'samsung_s25_1.jpg', 1),
(3, 'ipad25_1.jpg', 2),
(4, 'dell_xps13_1.jpg', 3),
(5, 'airpods_pro_1.jpg', 4);

-- --------------------------------------------------------

--
-- Table structure for table `hinhthucthanhtoan`
--

CREATE TABLE `hinhthucthanhtoan` (
  `ma_httt` int(11) NOT NULL,
  `ten_httt` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hinhthucthanhtoan`
--

INSERT INTO `hinhthucthanhtoan` (`ma_httt`, `ten_httt`) VALUES
(1, 'Tiền mặt'),
(2, 'Thẻ ATM ngân hàng'),
(3, 'Thẻ VISA, MASTER CARD'),
(4, 'Shipcod'),
(5, 'Ví Momo');

-- --------------------------------------------------------

--
-- Table structure for table `khachhang`
--

CREATE TABLE `khachhang` (
  `ma_kh` int(11) NOT NULL,
  `tendangnhap` varchar(255) NOT NULL,
  `matkhau` varchar(255) NOT NULL,
  `ten_kh` varchar(50) NOT NULL,
  `gioitinh` char(10) NOT NULL,
  `diachi` varchar(100) NOT NULL,
  `dienthoai` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `ngaysinh` datetime NOT NULL,
  `cccd` varchar(50) NOT NULL,
  `makichhoat` varchar(100) NOT NULL,
  `trangthai` int(11) NOT NULL,
  `quantri_kh` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `khachhang`
--

INSERT INTO `khachhang` (`ma_kh`, `tendangnhap`, `matkhau`, `ten_kh`, `gioitinh`, `diachi`, `dienthoai`, `email`, `ngaysinh`, `cccd`, `makichhoat`, `trangthai`, `quantri_kh`) VALUES
(1, 'admin', 'admin123', 'Quản trị viên', 'Nam', 'Hồ Chí Minh', '0999999999', 'hangnt1@gmail.com', '1990-01-01 00:00:00', '001090000000', 'ADMIN001', 1, 1),
(2, 'annv', '123456', 'Nguyễn Văn An', 'Nam', 'TP. Hồ Chí Minh', '0901234567', 'vanan@gmail.com', '1995-05-10 00:00:00', '0179265012', 'ACT001', 1, 0),
(3, 'dungpt', '123456', 'Phạm Thị Dung', 'Nữ', 'Cần Thơ', '0934567890', 'dungpt@gmail.com', '1997-11-30 00:00:00', '091197000004', 'ACT004', 0, 0),
(4, 'hienlm', '123456', 'Lê Minh Hiền', 'Nam', 'Đà Nẵng', '0923456789', 'hienlm@gmail.com', '2000-01-15 00:00:00', '049200000003', 'ACT003', 1, 0),
(5, 'lantt', '123456', 'Trần Thị Lan', 'Nữ', 'TP Hồ Chí Minh', '0912345678', 'lantt@gmail.com', '1998-08-20 00:00:00', '079198000002', 'ACT002', 1, 0),
(12, 'hangnt', '123456', 'Nguyễn Thu Hằng', 'Nữ', 'Hồ Chí Minh', '0987443336', 'hangnt@gmail.com', '2006-05-12 00:00:00', '568656', 'ACT005', 1, 0),
(15, 'hangnt1', '123', 'Nguyễn Thị Thu Hằng', 'Nữ', 'Hồ Chí Minh', '0987443336', 'hangnt1@gmail', '2006-10-12 00:00:00', '0187946213358', 'ACT006', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `khuyenmai`
--

CREATE TABLE `khuyenmai` (
  `ma_km` int(11) NOT NULL,
  `ten_km` varchar(500) NOT NULL,
  `noidung_km` longtext NOT NULL,
  `tungay` datetime NOT NULL,
  `denngay` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `khuyenmai`
--

INSERT INTO `khuyenmai` (`ma_km`, `ten_km`, `noidung_km`, `tungay`, `denngay`) VALUES
(1, 'Khuyến mãi Quốc khánh 2/9', 'Nhân dịp Quốc khánh 2/9, giảm giá tất cả sản phẩm 5%', '2025-09-01 00:00:00', '2025-09-10 00:00:00'),
(2, 'Khuyến mãi 20/10', 'Nhân dịp ngày phụ nữ Việt Nam 20/10, tặng voucher 500k tất cả sản phẩm', '2025-10-01 00:00:00', '2025-10-30 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `loaisanpham`
--

CREATE TABLE `loaisanpham` (
  `ma_lsp` int(11) NOT NULL,
  `ten_lsp` varchar(100) NOT NULL,
  `mota_lsp` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `loaisanpham`
--

INSERT INTO `loaisanpham` (`ma_lsp`, `ten_lsp`, `mota_lsp`) VALUES
(1, 'Điện thoại', 'Các dòng sản phẩm về điện thoại'),
(2, 'Laptop', 'Các dòng sản phẩm về laptop'),
(3, 'Linh phụ kiện', 'Các dòng sản phẩm về linh phụ kiện như Củ sạc, Pin dự phòng, Ốp lưng...'),
(4, 'Máy tính bảng', 'Các dòng sản phẩm về máy tính bảng');

-- --------------------------------------------------------

--
-- Table structure for table `nhasanxuat`
--

CREATE TABLE `nhasanxuat` (
  `ma_nsx` int(11) NOT NULL,
  `ten_nsx` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nhasanxuat`
--

INSERT INTO `nhasanxuat` (`ma_nsx`, `ten_nsx`) VALUES
(1, 'Apple'),
(2, 'Microsoft'),
(3, 'Nokia'),
(4, 'Xiaomi'),
(5, 'Oppo');

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `masp` int(11) NOT NULL,
  `tensp` varchar(225) NOT NULL,
  `soluong` double(10,2) NOT NULL,
  `ngaycapnhat_sp` datetime DEFAULT NULL,
  `gia_sp` int(11) NOT NULL,
  `giacu_sp` int(11) NOT NULL,
  `mota_sp` varchar(1000) NOT NULL,
  `mota_chitiet_sp` text NOT NULL,
  `ma_km` int(11) DEFAULT NULL,
  `ma_lsp` int(11) NOT NULL,
  `ma_nsx` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`masp`, `tensp`, `soluong`, `ngaycapnhat_sp`, `gia_sp`, `giacu_sp`, `mota_sp`, `mota_chitiet_sp`, `ma_km`, `ma_lsp`, `ma_nsx`) VALUES
(1, 'Điện thoại Samsung Galaxy S25 5G 128GB/256GB', 17.00, '2024-12-01 11:20:30', 20900000, 22900000, 'Sản phẩm của Samsung', 'Cấu hình: Qualcomm Snapdragon 8 Elite for Galaxy 8...', NULL, 3, 2),
(2, 'Apple iPad 25 Wifi 256GB', 100.00, '2024-12-12 10:04:45', 20800000, 23400000, 'CPU Dual-core Cortex A9 8GHz', 'Màn hình 9.7 inch, cảm ứng điện dung đa điểm', NULL, 1, 1),
(3, 'Laptop Dell XPS 13 Plus', 25.00, '2024-12-15 09:30:00', 32900000, 35900000, 'Laptop cao cấp của Dell', 'Intel Core i7 Gen 13, RAM 16GB, SSD 512GB, màn hình 13.4 inch', NULL, 2, 2),
(4, 'Tai nghe AirPods Pro Gen 2', 50.00, '2024-12-18 14:10:00', 5490000, 6990000, 'Tai nghe không dây của Apple', 'Chống ồn chủ động, chip H2, sạc MagSafe', NULL, 3, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD PRIMARY KEY (`ma_ctdh`),
  ADD KEY `ma_dh` (`ma_dh`,`ma_sp`) USING BTREE,
  ADD KEY `ma_sp` (`ma_sp`);

--
-- Indexes for table `chudegopy`
--
ALTER TABLE `chudegopy`
  ADD PRIMARY KEY (`ma_cdgy`);

--
-- Indexes for table `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`ma_dh`),
  ADD KEY `ma_kh` (`ma_kh`) USING BTREE,
  ADD KEY `ma_httt` (`ma_httt`) USING BTREE;

--
-- Indexes for table `gopy`
--
ALTER TABLE `gopy`
  ADD PRIMARY KEY (`ma_gy`),
  ADD KEY `ma_cdgy` (`ma_cdgy`) USING BTREE;

--
-- Indexes for table `hinhsanpham`
--
ALTER TABLE `hinhsanpham`
  ADD PRIMARY KEY (`ma_hsp`),
  ADD KEY `ma_sp` (`masp`) USING BTREE;

--
-- Indexes for table `hinhthucthanhtoan`
--
ALTER TABLE `hinhthucthanhtoan`
  ADD PRIMARY KEY (`ma_httt`);

--
-- Indexes for table `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`ma_kh`);

--
-- Indexes for table `khuyenmai`
--
ALTER TABLE `khuyenmai`
  ADD PRIMARY KEY (`ma_km`);

--
-- Indexes for table `loaisanpham`
--
ALTER TABLE `loaisanpham`
  ADD PRIMARY KEY (`ma_lsp`);

--
-- Indexes for table `nhasanxuat`
--
ALTER TABLE `nhasanxuat`
  ADD PRIMARY KEY (`ma_nsx`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`masp`),
  ADD KEY `ma_km` (`ma_km`,`ma_lsp`,`ma_nsx`) USING BTREE,
  ADD KEY `ma_nsx` (`ma_nsx`),
  ADD KEY `ma_lsp` (`ma_lsp`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  MODIFY `ma_ctdh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `chudegopy`
--
ALTER TABLE `chudegopy`
  MODIFY `ma_cdgy` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `donhang`
--
ALTER TABLE `donhang`
  MODIFY `ma_dh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `gopy`
--
ALTER TABLE `gopy`
  MODIFY `ma_gy` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `hinhsanpham`
--
ALTER TABLE `hinhsanpham`
  MODIFY `ma_hsp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `hinhthucthanhtoan`
--
ALTER TABLE `hinhthucthanhtoan`
  MODIFY `ma_httt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `ma_kh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `khuyenmai`
--
ALTER TABLE `khuyenmai`
  MODIFY `ma_km` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `loaisanpham`
--
ALTER TABLE `loaisanpham`
  MODIFY `ma_lsp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `nhasanxuat`
--
ALTER TABLE `nhasanxuat`
  MODIFY `ma_nsx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `masp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD CONSTRAINT `chitietdonhang_ibfk_1` FOREIGN KEY (`ma_sp`) REFERENCES `sanpham` (`masp`),
  ADD CONSTRAINT `chitietdonhang_ibfk_2` FOREIGN KEY (`ma_dh`) REFERENCES `donhang` (`ma_dh`);

--
-- Constraints for table `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `donhang_ibfk_1` FOREIGN KEY (`ma_kh`) REFERENCES `khachhang` (`ma_kh`),
  ADD CONSTRAINT `donhang_ibfk_2` FOREIGN KEY (`ma_httt`) REFERENCES `hinhthucthanhtoan` (`ma_httt`);

--
-- Constraints for table `gopy`
--
ALTER TABLE `gopy`
  ADD CONSTRAINT `gopy_ibfk_1` FOREIGN KEY (`ma_cdgy`) REFERENCES `chudegopy` (`ma_cdgy`);

--
-- Constraints for table `hinhsanpham`
--
ALTER TABLE `hinhsanpham`
  ADD CONSTRAINT `hinhsanpham_ibfk_1` FOREIGN KEY (`masp`) REFERENCES `sanpham` (`masp`);

--
-- Constraints for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`ma_km`) REFERENCES `khuyenmai` (`ma_km`),
  ADD CONSTRAINT `sanpham_ibfk_2` FOREIGN KEY (`ma_lsp`) REFERENCES `loaisanpham` (`ma_lsp`),
  ADD CONSTRAINT `sanpham_ibfk_3` FOREIGN KEY (`ma_nsx`) REFERENCES `nhasanxuat` (`ma_nsx`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
