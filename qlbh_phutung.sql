-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2017 at 04:40 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qlbh_phutung`
--

-- --------------------------------------------------------

--
-- Table structure for table `chitiet_giaodich`
--

CREATE TABLE `chitiet_giaodich` (
  `MA_GIAODICH` int(11) NOT NULL,
  `MA_SANPHAM` int(11) NOT NULL,
  `SOLUONG` int(11) NOT NULL,
  `DONGIA_HT` float NOT NULL,
  `THANHTOAN` float NOT NULL,
  `TANGPHAM` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `chitiet_giaodich`
--

INSERT INTO `chitiet_giaodich` (`MA_GIAODICH`, `MA_SANPHAM`, `SOLUONG`, `DONGIA_HT`, `THANHTOAN`, `TANGPHAM`) VALUES
(2, 4, 2, 12.24, 12.24, ''),
(2, 1, 1, 21, 21, ''),
(3, 1, 4, 21, 20.58, 'Áo thun'),
(4, 1, 5, 21, 20.58, 'Áo thun'),
(4, 3, 1, 82, 82, ''),
(5, 1, 3, 21, 20.58, 'Áo thun'),
(5, 5, 1, 20.2, 20.2, ''),
(2, 2, 3, 10, 10, ''),
(2, 2, 3, 10, 10, ''),
(2, 1, 3, 21, 20.58, 'Áo thun'),
(16, 8, 4, 21, 21, ''),
(16, 5, 3, 20.2, 20.2, ''),
(16, 6, 2, 20, 20, ''),
(17, 25, 2, 12.24, 12.24, ''),
(18, 1, 2, 21, 20.58, 'Áo thun'),
(19, 5, 1, 20.2, 19.998, 'Ly thủy tinh'),
(20, 2, 2, 10, 9.8, ''),
(22, 2, 1, 10, 9.8, ''),
(23, 2, 3, 10, 9.8, ''),
(24, 2, 2, 10, 9.8, ''),
(25, 2, 1, 10, 9.8, ''),
(26, 1, 1, 21, 20.58, 'Áo thun'),
(27, 5, 2, 20.2, 19.998, 'Ly thủy tinh'),
(28, 3, 1, 82, 82, ''),
(29, 5, 1, 20.2, 19.998, 'Ly thủy tinh'),
(30, 1, 2, 21, 20.58, 'Áo thun'),
(31, 5, 1, 20.2, 19.998, 'Ly thủy tinh'),
(31, 2, 1, 10, 9.8, ''),
(32, 2, 1, 10, 9.8, ''),
(35, 25, 1, 12.24, 12.24, ''),
(36, 25, 1, 12.24, 12.24, ''),
(38, 2, 2, 10, 9.8, ''),
(39, 25, 1, 12.24, 12.24, ''),
(42, 1, 2, 21, 20.58, 'Áo thun'),
(43, 3, 2, 82, 82, ''),
(44, 25, 1, 12.24, 12.24, ''),
(45, 25, 1, 12.24, 12.24, '');

-- --------------------------------------------------------

--
-- Table structure for table `chitiet_khuyenmai`
--

CREATE TABLE `chitiet_khuyenmai` (
  `MA_KHUYENMAI` int(11) NOT NULL,
  `MA_SANPHAM` int(11) NOT NULL,
  `PHANTRAM_KM` int(11) NOT NULL,
  `TANGPHAM` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `chitiet_khuyenmai`
--

INSERT INTO `chitiet_khuyenmai` (`MA_KHUYENMAI`, `MA_SANPHAM`, `PHANTRAM_KM`, `TANGPHAM`) VALUES
(1, 1, 2, 'Áo thun'),
(3, 2, 2, ''),
(3, 5, 1, 'Ly thủy tinh'),
(3, 8, 3, ''),
(5, 1, 2, ''),
(5, 2, 1, ''),
(5, 5, 2, '');

-- --------------------------------------------------------

--
-- Table structure for table `chitiet_nhap`
--

CREATE TABLE `chitiet_nhap` (
  `MA_PHIEUNHAP` int(11) NOT NULL,
  `MA_SANPHAM` int(11) NOT NULL,
  `SOLUONGNHAP` int(11) NOT NULL,
  `DONGIA_NHAP` float(11,2) DEFAULT '0.00',
  `THANHTIEN` float(11,2) NOT NULL DEFAULT '0.00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `chitiet_nhap`
--

INSERT INTO `chitiet_nhap` (`MA_PHIEUNHAP`, `MA_SANPHAM`, `SOLUONGNHAP`, `DONGIA_NHAP`, `THANHTIEN`) VALUES
(2, 1, 100, 20.00, 2000.00),
(2, 2, 200, 10.00, 2000.00),
(2, 3, 150, 80.00, 12000.00),
(2, 4, 21, 12.00, 252.00),
(2, 5, 100, 20.00, 2000.00),
(2, 6, 30, 20.00, 600.00),
(2, 8, 100, 21.00, 2100.00),
(2, 25, 2, 12.00, 24.00);

--
-- Triggers `chitiet_nhap`
--
DELIMITER $$
CREATE TRIGGER `THANH_TIEN` BEFORE INSERT ON `chitiet_nhap` FOR EACH ROW BEGIN
  DECLARE MA_LOAISP INT; 
 SET NEW.THANHTIEN = NEW.SOLUONGNHAP * NEW.DONGIA_NHAP;


 SET @MA_LOAISP = (SELECT MA_LOAI_SANPHAM FROM sanpham 
                  WHERE MA_SANPHAM = NEW.MA_SANPHAM);


 
 UPDATE sanpham 
 SET SOLUONG_BAN =SOLUONG_BAN + NEW.SOLUONGNHAP
 					WHERE MA_SANPHAM = NEW.MA_SANPHAM;

END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `TONGTIEN_AFTER_INSERT` AFTER INSERT ON `chitiet_nhap` FOR EACH ROW BEGIN
	DECLARE TONG_TT INT;
    SET @TONG_TT = (SELECT SUM(THANHTIEN) FROM chitiet_nhap 					WHERE MA_PHIEUNHAP = NEW.MA_PHIEUNHAP);
 UPDATE phieunhap SET TONG_THANHTIEN = @TONG_TT
 					WHERE MA_PHIEUNHAP = NEW.MA_PHIEUNHAP;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `chucvu`
--

CREATE TABLE `chucvu` (
  `MA_CHUCVU` int(11) NOT NULL,
  `TEN_CHUCVU` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `chucvu`
--

INSERT INTO `chucvu` (`MA_CHUCVU`, `TEN_CHUCVU`) VALUES
(1, 'Admin'),
(2, 'Nhân viên');

-- --------------------------------------------------------

--
-- Table structure for table `dacdiem_kythuat`
--

CREATE TABLE `dacdiem_kythuat` (
  `MA_SANPHAM` int(11) NOT NULL,
  `MA_LOAI_SANPHAM` int(11) NOT NULL,
  `MAU_SAC` varchar(100) DEFAULT NULL,
  `KHOILUONG` int(11) DEFAULT NULL,
  `KICH_THUOC` varchar(50) DEFAULT NULL,
  `CHATLIEU` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `giaodich`
--

CREATE TABLE `giaodich` (
  `MA_GIAODICH` int(11) NOT NULL,
  `TONG_THANHTIEN` float(11,2) DEFAULT NULL,
  `DIACHI_GIAO` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `TRANGTHAI` tinyint(4) DEFAULT '1',
  `NGAY_GIAODICH` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `NGAYLAP_HOADON` date DEFAULT NULL,
  `MA_KHACHHANG` int(11) NOT NULL,
  `MA_HINHTHUC` int(11) NOT NULL,
  `MA_NHANVIEN` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `giaodich`
--

INSERT INTO `giaodich` (`MA_GIAODICH`, `TONG_THANHTIEN`, `DIACHI_GIAO`, `TRANGTHAI`, `NGAY_GIAODICH`, `NGAYLAP_HOADON`, `MA_KHACHHANG`, `MA_HINHTHUC`, `MA_NHANVIEN`) VALUES
(2, 61.74, '97 Man Thiện Quận 9, Hồ Chí Minh', 2, '2017-12-02 19:37:09', '2017-12-02', 1, 1, 13),
(3, 82.32, 'Thanh Khuê Đà Nẵng', 0, '2017-11-29 13:24:58', NULL, 2, 1, NULL),
(4, 184.90, 'Thanh Khuê Đà Nẵng', 1, '2017-11-29 13:25:14', NULL, 2, 1, 13),
(5, 81.94, 'Thanh Khuê Đà Nẵng', 1, '2017-12-10 01:50:43', '2017-12-09', 2, 1, 13),
(16, NULL, 'Đội 18 Thôn 4 Bình Lãnh Thăng Bình Quảng Nam', 0, '2017-12-02 19:30:42', NULL, 3, 1, NULL),
(17, 24.48, 'Đội 18 Thôn 4 Bình Lãnh Thăng Bình Quảng Nam', 2, '2017-12-02 19:32:54', '2017-12-02', 3, 1, 13),
(18, 41.16, 'Đội 18 Thôn 4 Bình Lãnh Thăng Bình Quảng Nam', 1, '2017-12-02 23:51:23', NULL, 3, 2, NULL),
(19, 20.00, 'Đội 18 Thôn 4 Bình Lãnh Thăng Bình Quảng Nam', 1, '2017-12-03 10:09:03', NULL, 3, 2, NULL),
(20, 19.60, 'Đội 18 Thôn 4 Bình Lãnh Thăng Bình Quảng Nam', 1, '2017-12-03 10:11:04', NULL, 3, 2, NULL),
(21, 0.00, 'Đội 18 Thôn 4 Bình Lãnh Thăng Bình Quảng Nam', 1, '2017-12-03 10:11:35', NULL, 3, 2, NULL),
(22, 9.80, 'Đội 18 Thôn 4 Bình Lãnh Thăng Bình Quảng Nam', 1, '2017-12-03 10:52:57', NULL, 3, 2, NULL),
(23, 29.40, 'Đội 18 Thôn 4 Bình Lãnh Thăng Bình Quảng Nam', 1, '2017-12-03 10:53:18', NULL, 3, 2, NULL),
(24, 19.60, 'Đội 18 Thôn 4 Bình Lãnh Thăng Bình Quảng Nam', 1, '2017-12-03 11:16:26', NULL, 3, 2, NULL),
(25, 9.80, 'Đội 18 Thôn 4 Bình Lãnh Thăng Bình Quảng Nam', 1, '2017-12-03 11:16:46', NULL, 3, 2, NULL),
(26, 20.58, 'Đội 18 Thôn 4 Bình Lãnh Thăng Bình Quảng Nam', 1, '2017-12-03 11:21:13', NULL, 3, 2, NULL),
(27, 40.00, 'Đội 18 Thôn 4 Bình Lãnh Thăng Bình Quảng Nam', 1, '2017-12-03 11:21:47', NULL, 3, 2, NULL),
(28, 82.00, 'Đội 18 Thôn 4 Bình Lãnh Thăng Bình Quảng Nam', 1, '2017-12-03 11:22:37', NULL, 3, 2, NULL),
(29, 20.00, 'Đội 18 Thôn 4 Bình Lãnh Thăng Bình Quảng Nam', 1, '2017-12-03 11:27:47', NULL, 3, 2, NULL),
(30, 41.16, 'Đội 18 Thôn 4 Bình Lãnh Thăng Bình Quảng Nam', 1, '2017-12-03 11:30:49', NULL, 3, 2, NULL),
(31, 29.80, 'Đội 18 Thôn 4 Bình Lãnh Thăng Bình Quảng Nam', 1, '2017-12-03 13:26:47', NULL, 3, 2, NULL),
(32, 9.80, 'Đội 18 Thôn 4 Bình Lãnh Thăng Bình Quảng Nam', 1, '2017-12-03 13:28:27', NULL, 3, 2, NULL),
(33, 0.00, 'Đội 18 Thôn 4 Bình Lãnh Thăng Bình Quảng Nam', 1, '2017-12-03 13:31:01', NULL, 3, 2, NULL),
(34, 0.00, 'Đội 18 Thôn 4 Bình Lãnh Thăng Bình Quảng Nam', 1, '2017-12-03 13:32:56', NULL, 3, 2, NULL),
(35, 12.24, 'Đội 18 Thôn 4 Bình Lãnh Thăng Bình Quảng Nam', 1, '2017-12-03 16:46:32', NULL, 3, 1, NULL),
(36, 12.24, 'Đội 18 Thôn 4 Bình Lãnh Thăng Bình Quảng Nam', 1, '2017-12-04 05:06:28', NULL, 3, 2, NULL),
(37, 0.00, 'Đội 18 Thôn 4 Bình Lãnh Thăng Bình Quảng Nam', 1, '2017-12-04 05:15:20', NULL, 3, 2, NULL),
(38, 19.60, 'Đội 18 Thôn 4 Bình Lãnh Thăng Bình Quảng Nam', 1, '2017-12-05 01:56:14', NULL, 3, 2, NULL),
(39, 12.24, 'Đội 18 Thôn 4 Bình Lãnh Thăng Bình Quảng Nam', 1, '2017-12-05 02:00:21', NULL, 3, 2, NULL),
(40, 0.00, 'Đội 18 Thôn 4 Bình Lãnh Thăng Bình Quảng Nam', 1, '2017-12-05 02:09:55', NULL, 3, 2, NULL),
(41, 0.00, 'Đội 18 Thôn 4 Bình Lãnh Thăng Bình Quảng Nam', 1, '2017-12-05 02:10:20', NULL, 3, 2, NULL),
(42, 41.16, 'Đội 18 Thôn 4 Bình Lãnh Thăng Bình Quảng Nam', 1, '2017-12-05 02:16:43', NULL, 3, 2, NULL),
(43, 164.00, 'Đội 18 Thôn 4 Bình Lãnh Thăng Bình Quảng Nam', 1, '2017-12-05 02:17:14', NULL, 3, 2, NULL),
(44, 12.24, 'Đội 18 Thôn 4 Bình Lãnh Thăng Bình Quảng Nam', 1, '2017-12-05 02:21:48', NULL, 3, 2, NULL),
(45, 12.24, 'Đội 18 Thôn 4 Bình Lãnh Thăng Bình Quảng Nam', 1, '2017-12-05 04:00:47', NULL, 3, 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hinhthuc`
--

CREATE TABLE `hinhthuc` (
  `MA_HINHTHUC` int(11) NOT NULL,
  `TEN_HINHTHUC` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hinhthuc`
--

INSERT INTO `hinhthuc` (`MA_HINHTHUC`, `TEN_HINHTHUC`) VALUES
(1, 'Tiền Mặt'),
(2, 'PayPal');

-- --------------------------------------------------------

--
-- Table structure for table `khachhang`
--

CREATE TABLE `khachhang` (
  `MA_KHACHHANG` int(11) NOT NULL,
  `HO` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `TEN` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `SDT` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `EMAIL` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `DIACHI` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `MATKHAU` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `GIOITINH` int(11) NOT NULL DEFAULT '0',
  `NGAYSINH` date NOT NULL,
  `TRANGTHAI` int(11) NOT NULL DEFAULT '1',
  `NGAY_TAO` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `khachhang`
--

INSERT INTO `khachhang` (`MA_KHACHHANG`, `HO`, `TEN`, `SDT`, `EMAIL`, `DIACHI`, `MATKHAU`, `GIOITINH`, `NGAYSINH`, `TRANGTHAI`, `NGAY_TAO`) VALUES
(1, 'Full', 'Demo', '0917077024', 'demo@gmail.com', 'KA', '63ee451939ed580ef3c4b6f0109d1fd0', 0, '0000-00-00', 1, '2017-12-02 10:02:46'),
(2, 'Lê Thị ', 'Thương', '0917077050', 'thuongl@gmail.com', 'Thanh Khuê Đà Nẵng', '63ee451939ed580ef3c4b6f0109d1fd0', 1, '1970-01-01', 1, '2017-11-29 03:36:30'),
(3, 'Lê Tiến Tài', 'AK', '0917077025', 'tientai206@gmail.com', 'Đội 18 Thôn 4 Bình Lãnh Thăng Bình Quảng Nam', '63ee451939ed580ef3c4b6f0109d1fd0', 0, '0000-00-00', 1, '2017-12-02 09:57:15'),
(5, 'Mrs', 'Kiara', '0917077052', 'kiara@gmail.com', 'DK', '63ee451939ed580ef3c4b6f0109d1fd0', 1, '2017-02-12', 1, '2017-12-02 10:00:57'),
(6, 'Nguyễn Trần Khôi', 'Nguyên', '0917077051', 'khoinguyen@gmail.com', 'Huyện Đất ĐỔ Bà Rịa Vũng Tàu', '63ee451939ed580ef3c4b6f0109d1fd0', 0, '1970-01-01', 1, '2017-12-02 10:05:08'),
(9, 'Trương Thị Bích', 'Hà', '0917077003', 'bichha@gmail.com', 'Hà Lam, Thăng Bình Quảng Nam', '63ee451939ed580ef3c4b6f0109d1fd0', 1, '1993-12-28', 1, '2017-12-02 12:30:19');

-- --------------------------------------------------------

--
-- Table structure for table `kho`
--

CREATE TABLE `kho` (
  `MA_KHO` int(11) NOT NULL,
  `TEN_KHO` varchar(100) DEFAULT NULL,
  `MA_LOAI_SANPHAM` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kho`
--

INSERT INTO `kho` (`MA_KHO`, `TEN_KHO`, `MA_LOAI_SANPHAM`) VALUES
(1, 'INNOVA', 1),
(2, 'CAMRY', 2),
(3, 'HILUX-TOYOTA', 3),
(4, 'FOCUS-FORD', 5),
(5, 'RANGER-FORD', 4),
(6, 'TRANSIT-FORD', 6),
(7, 'CIVIC-HONDA', 7),
(8, 'FIT-HONDA', 8),
(9, 'DMAX-ISUZU', 9),
(10, 'HILANDER-ISUZU', 10);

-- --------------------------------------------------------

--
-- Table structure for table `khuyenmai`
--

CREATE TABLE `khuyenmai` (
  `MA_KHUYENMAI` int(11) NOT NULL,
  `TEN_KHUYENMAI` varchar(100) NOT NULL,
  `NGAY_BATDAU` date NOT NULL,
  `NGAY_KETTHUC` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `khuyenmai`
--

INSERT INTO `khuyenmai` (`MA_KHUYENMAI`, `TEN_KHUYENMAI`, `NGAY_BATDAU`, `NGAY_KETTHUC`) VALUES
(1, 'Ngày Nhà giáo Việt Nam', '2017-11-01', '2017-12-02'),
(3, 'Giáng sinh', '2017-12-03', '2017-12-08'),
(5, 'Từng Bừng Cùng Lazada', '2017-12-11', '2017-12-31');

-- --------------------------------------------------------

--
-- Table structure for table `loai_sanpham`
--

CREATE TABLE `loai_sanpham` (
  `MA_LOAI_SANPHAM` int(11) NOT NULL,
  `TEN_LOAI_SANPHAM` varchar(50) DEFAULT NULL,
  `MA_NHOM_SANPHAM` int(11) NOT NULL,
  `MA_NHA_CUNGCAP` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `loai_sanpham`
--

INSERT INTO `loai_sanpham` (`MA_LOAI_SANPHAM`, `TEN_LOAI_SANPHAM`, `MA_NHOM_SANPHAM`, `MA_NHA_CUNGCAP`) VALUES
(1, 'INNOVA', 1, 1),
(2, 'RANGER', 1, 1),
(3, 'HILUX', 1, 1),
(4, 'RANGER', 2, 2),
(5, 'FOCUS', 2, 2),
(6, 'TRANSIT', 2, 2),
(7, 'CIVIC', 3, 3),
(8, 'FIT', 3, 3),
(9, 'MAX', 4, 4),
(10, 'HILANDER', 4, 4),
(27, 'RANGER', 7, 4),
(28, 'RANGER', 6, 4);

--
-- Triggers `loai_sanpham`
--
DELIMITER $$
CREATE TRIGGER `AFTER_STGROUP_UPDATE` AFTER INSERT ON `loai_sanpham` FOR EACH ROW BEGIN
 UPDATE nhom_sanpham SET TRANGTHAI = (TRANGTHAI + 1)
 WHERE MA_NHOM_SANPHAM = NEW.MA_NHOM_SANPHAM;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `nhanvien`
--

CREATE TABLE `nhanvien` (
  `MA_NHANVIEN` int(11) NOT NULL,
  `HO` varchar(100) DEFAULT NULL,
  `TEN` varchar(45) DEFAULT NULL,
  `MATKHAU` varchar(45) DEFAULT NULL,
  `SDT` varchar(20) NOT NULL,
  `EMAIL` varchar(45) DEFAULT NULL,
  `DIACHI` text NOT NULL,
  `NGAYSINH` date DEFAULT NULL,
  `HINHANH` varchar(100) DEFAULT NULL,
  `GIOITINH` tinyint(4) DEFAULT NULL,
  `NGAY_TAO` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `MA_CHUCVU` int(11) NOT NULL,
  `TRANGTHAI` tinyint(4) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nhanvien`
--

INSERT INTO `nhanvien` (`MA_NHANVIEN`, `HO`, `TEN`, `MATKHAU`, `SDT`, `EMAIL`, `DIACHI`, `NGAYSINH`, `HINHANH`, `GIOITINH`, `NGAY_TAO`, `MA_CHUCVU`, `TRANGTHAI`) VALUES
(2, 'NGuyễn Trần Khôi', 'Nguyên', '63ee451939ed580ef3c4b6f0109d1fd0', '0917077001', 'khoinguyen@gmail.com', ' Đất Đỏ Bà Rịa Vũng Tàu ', '1970-01-01', NULL, 0, '2017-11-28 09:27:32', 1, 0),
(4, 'Nguyễn Hoàng ', 'Phong', '63ee451939ed580ef3c4b6f0109d1fd0', '0917077002', 'hoangphong@gmail.com', 'Cần Giuộc  ', '1970-01-01', NULL, 0, '2017-11-27 23:41:39', 2, 1),
(11, 'Lê Tiến', '091077001', 'd9b1d7db4cd6e70935368a1efb10e377', '09876543345678', 'tienta0@com.com', 'AGG', '1970-01-01', NULL, 0, '2017-11-28 11:21:52', 2, 0),
(13, 'Lê Thanh ', 'Tuấn', '63ee451939ed580ef3c4b6f0109d1fd0', '0917077008', 'thanhtuan@gmail.com', 'Tân Thới Hiệp, Quận 12, Thành phố Hồ Chí Minh', '2017-01-12', 'avatar/code.png', 0, '2017-12-11 10:43:45', 1, 1),
(14, 'Bùi Thị Miên ', 'An', '63ee451939ed580ef3c4b6f0109d1fd0', '0917077011', 'mienan@gmail.com', 'Tam Xuân Tam Kỳ Quảng Nam', '2017-01-11', 'avatar/Screenshot (19).png', 1, '2017-11-28 09:43:35', 1, 1),
(15, 'Trần Văn ', 'Sỹ', '63ee451939ed580ef3c4b6f0109d1fd0', '0917077012', 'syvan@gmail.com', '113 CA Đà Nẵng,Việt Nam', '1970-01-01', NULL, 0, '2017-11-28 10:04:14', 2, 1),
(16, 'Cao Bá', 'Quát', '63ee451939ed580ef3c4b6f0109d1fd0', '0917077013', 'baquat@gmail.com', 'Bình Đào, Thăng Bình Quảng Nam', '2017-10-11', NULL, 0, '2017-11-28 10:05:49', 1, 1),
(17, 'Ngô Sỹ ', 'Liên', '63ee451939ed580ef3c4b6f0109d1fd0', '0917077015', 'sylien@gmail.com', 'DaKao Quận 1 Thành phố Hồ Chí Minh', '1970-01-01', NULL, 0, '2017-11-28 11:20:48', 2, 1),
(18, 'Lê Thị ', 'Thương', '63ee451939ed580ef3c4b6f0109d1fd0', '0917077017', 'thuongl2@gmail.com', 'Quế Minh Quế Sơn Quảng Nam', '1995-05-09', NULL, 1, '2017-11-28 11:24:46', 1, 1),
(19, 'Nguyễn Trần Khôi', 'AG', 'd9b1d7db4cd6e70935368a1efb10e377', '0917077001222', 'tientai20@com.com', '333', '1970-01-01', NULL, 0, '2017-11-28 12:15:39', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `nha_cungcap`
--

CREATE TABLE `nha_cungcap` (
  `MA_NHA_CUNGCAP` int(11) NOT NULL,
  `TEN_NHA_CUNGCAP` varchar(100) DEFAULT NULL,
  `WEBSITE` varchar(255) NOT NULL,
  `DIACHI_NHA_CUNGCAP` text,
  `SDT` varchar(20) NOT NULL,
  `EMAIL` varchar(45) DEFAULT NULL,
  `TRANGTHAI` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nha_cungcap`
--

INSERT INTO `nha_cungcap` (`MA_NHA_CUNGCAP`, `TEN_NHA_CUNGCAP`, `WEBSITE`, `DIACHI_NHA_CUNGCAP`, `SDT`, `EMAIL`, `TRANGTHAI`) VALUES
(1, 'TNHH TIẾN TÀI', 'www.tientai.com', '92, man thiện, quận 9', '0917073710', 'tientai@gmail.com', 0),
(2, 'TNHH LÊ THƯƠNG', 'www.lethuong.com', '118, man thiện , quận 9', '0965870633', 'lthuong2@gmail.com', 1),
(3, 'TNHH KHÔI NGUYÊN', 'www.khoinguyen.com', '110,phước long, Thủ Đức', '01656963032', 'khoinguyen@gmail.com', 0),
(4, 'TNHH HOÀNG PHONG', 'www.hoangphong.com', '115, mạc đĩnh chi, quận 1', '0991234589', 'hoangphong@gmail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `nhom_sanpham`
--

CREATE TABLE `nhom_sanpham` (
  `MA_NHOM_SANPHAM` int(11) NOT NULL,
  `TEN_NHOM_SANPHAM` varchar(50) DEFAULT NULL,
  `LOGO` varchar(100) DEFAULT NULL,
  `TRANGTHAI` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nhom_sanpham`
--

INSERT INTO `nhom_sanpham` (`MA_NHOM_SANPHAM`, `TEN_NHOM_SANPHAM`, `LOGO`, `TRANGTHAI`) VALUES
(1, 'TOYOTA', NULL, 4),
(2, 'FORD', NULL, 4),
(3, 'HONDA', NULL, 3),
(4, 'ISUZU', NULL, 3),
(6, 'CHEVROLET', NULL, 2),
(7, 'HINO', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `phieunhap`
--

CREATE TABLE `phieunhap` (
  `MA_PHIEUNHAP` int(11) NOT NULL,
  `NGAYLAP_PHIEUNHAP` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `MA_NHANVIEN` int(11) NOT NULL,
  `TONG_THANHTIEN` int(11) NOT NULL DEFAULT '0',
  `MA_NHA_CUNGCAP` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `phieunhap`
--

INSERT INTO `phieunhap` (`MA_PHIEUNHAP`, `NGAYLAP_PHIEUNHAP`, `MA_NHANVIEN`, `TONG_THANHTIEN`, `MA_NHA_CUNGCAP`) VALUES
(2, '2017-11-30 14:20:59', 13, 20976, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `MA_SANPHAM` int(11) NOT NULL,
  `TEN_SANPHAM` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DONGIA_BAN` float(11,2) DEFAULT '0.00',
  `HINH_DAIDIEN` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `DS_HINHANH` text CHARACTER SET utf8 NOT NULL,
  `BAOHANH` tinyint(4) DEFAULT NULL,
  `LOAI` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `SOLUONG_BAN` int(11) DEFAULT '0',
  `NGAY_CAPNHAT` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `MA_LOAI_SANPHAM` int(11) NOT NULL,
  `MA_XUATXU` int(11) NOT NULL,
  `MOTA` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `TRANGTHAI` tinyint(1) NOT NULL DEFAULT '1',
  `VIEW` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`MA_SANPHAM`, `TEN_SANPHAM`, `DONGIA_BAN`, `HINH_DAIDIEN`, `DS_HINHANH`, `BAOHANH`, `LOAI`, `SOLUONG_BAN`, `NGAY_CAPNHAT`, `MA_LOAI_SANPHAM`, `MA_XUATXU`, `MOTA`, `TRANGTHAI`, `VIEW`) VALUES
(1, 'Đèn Hậu Ngoài', 21.00, 'toyota/den-hau1.jpg', '[\"toyota/den-hau2.jpg\",\"toyota/product_201_01.jpg\"]', 6, '1', 100, '2017-12-09 18:50:43', 1, 1, 'Hàng giá rẻ bất ngờ', 1, 0),
(2, 'Két Nước', 10.00, 'toyota/dannong1.jpg', '[\"toyota/dannong2.jpg\"]', 2, '1', 224, '2017-12-02 12:37:09', 1, 3, 'Hành nhập khẩu từ Indonexia', 1, 0),
(3, 'Đèn Sau', 82.00, 'toyota/den-sau-toyota-camry.jpg', '[\"toyota/den-sau-toyota-camry1.jpg\"]', 12, '2', 168, '2017-11-30 04:13:00', 2, 3, 'Hàng giá rẻ', 1, 0),
(4, 'Tapi cửa trước', 12.00, 'toyota/Tapi-cua-truoc-Santafe-Gold.JPG', '[\"toyota/Tapi-cua-truoc-Santafe-Gold1.JPG\"]', 5, '2', 7, '2017-12-02 12:37:09', 2, 1, '', 0, 0),
(5, 'Đèn Cốt', 20.20, 'toyota/camry-2007-hoanthanh-400x35013.jpg', '[]', 2, '1', 98, '2017-12-09 18:50:43', 2, 3, '', 1, 0),
(6, 'Đèn Sau', 20.00, 'toyota/den-sau.jpg', '[\"toyota/den-sau-toyota-camry2.jpg\"]', 6, '2', 30, '2017-11-30 06:15:48', 2, 2, '', 1, 0),
(7, 'Má Dè Sau', 0.00, 'toyota/1CAMRY-2002-_Má-dè-sauLH_-400x375.jpg', '[\"toyota/tai-xe.jpg\"]', 2, '2', 0, '2017-11-30 06:50:32', 2, 2, '', 1, 0),
(8, 'Đèn Pha', 21.00, 'toyota/den-pha-hilux-400x375.jpg', '[\"toyota/den-pha.jpg\"]', 2, '2', 100, '2017-11-30 06:50:44', 3, 7, '', 1, 0),
(9, 'Nắp Cao Bo', 0.00, 'toyota/capo.jpg', '[\"toyota/capo1.jpg\",\"toyota/capo-dewoo.jpg\"]', 2, '2', 0, '2017-11-30 06:14:50', 3, 7, '', 1, 0),
(10, 'Đèn Pha-A', 0.00, 'ford/den-pha-ranger1-2002--400x375.jpg', '[\"ford/den-pha-2014.jpg\"]', 2, '1', 0, '2017-11-30 06:51:07', 4, 5, '', 1, 0),
(11, 'Đèn Pha B', 0.00, 'ford/den-pha-hilux-400x375.jpg', '[\"ford/product_201_0.jpg\"]', 2, '2', 0, '2017-11-30 06:16:21', 4, 2, '', 1, 0),
(12, 'Đèn Xi Nhanh', 0.00, 'ford/XI-NHAN-RANGER-2002-1-400x250.jpg', '[\"ford/den-hau-2010.jpg\"]', 2, '2', 0, '2017-11-30 06:51:38', 4, 3, '', 1, 0),
(13, 'Đèn Sau Ranger', 0.00, 'ford/den-sau-ranger-2009-20111-400x250.jpg', '[\"den-sau-ranger-2009-20111-400x2501.jpg\"]', 1, '1', 0, '2017-11-28 22:57:34', 4, 2, '', 1, 0),
(14, 'Đèn Sau Cốp', 0.00, 'ford/Đèn-lái-sau-Ranger-02-05-1-400x250.jpg', '[\"ford/den-hau.jpg\"]', 2, '2', 0, '2017-11-30 06:56:28', 4, 1, '', 1, 0),
(15, 'Két Nước Turbo', 0.00, 'ford/FOCUS-09-1_6-hoanthanh-400x350.jpg', '[\"DMAX-06-MT-hoanthanh.jpg\",\"FOCUS-09-1_6-hoanthanh-400x3501.jpg\"]', 2, '2', 0, '2017-11-28 23:01:59', 5, 3, '', 1, 0),
(16, 'Cảng Trước Phần Giữa', 0.00, 'ford/TRANSIT-2000-ON_Bảng-cản-trước1_-400x375.jpg', '[\"TRANSIT-2000-ON_B\\u1ea3ng-c\\u1ea3n-tr\\u01b0\\u1edbc1_-400x3751.jpg\"]', 2, '3', 0, '2017-11-28 23:03:54', 6, 7, '', 1, 0),
(17, 'Đèn Trên Gương Chiếu Hậu', 0.00, 'ford/TRANSIT-2000-_Đèn-kính1_-400x375.jpg', '[\"ford/guong-chieu-hau-co-den.jpg\"]', 5, '3', 0, '2017-11-30 07:13:35', 6, 4, '', 1, 0),
(18, 'Đèn Sau', 0.00, 'ford/Đèn-sau-Ford-Transit-2000-450x250-1-400x250.jpg', '[\"ford/den-sau-toyota-camry.jpg\"]', 2, '4', 0, '2017-11-30 06:58:40', 6, 8, '', 1, 0),
(19, 'Đèn Pha', 0.00, 'honda/civic-2009-400x375.jpg', '[\"honda/den-pha-sparks.jpg\"]', 3, '3', 0, '2017-11-30 06:17:12', 7, 8, '', 1, 0),
(20, 'Đèn Pha', 0.00, 'honda/Đèn-phaRHHD-CIVIC-20061--400x375.jpg', '[\"honda/den-pha.jpg\"]', 6, '6', 0, '2017-11-30 06:16:53', 7, 8, '', 1, 0),
(21, 'Khung Xương Dàn Đầu', 0.00, 'honda/xuong-dau-xe-civic-400x250.jpg', '[\"honda/gia.jpg\"]', 4, '4', 0, '2017-11-30 07:11:10', 7, 3, '', 1, 0),
(22, 'Gương Hậu', 0.00, 'honda/guong-hau-06-1-400x250.jpg', '[\"honda/1305901461955107082_574_0.jpg\"]', 2, '2', 0, '2017-11-30 07:12:14', 8, 4, '', 1, 0),
(23, 'Đèn Pha', 0.00, 'isuzu/DEN-PHA-DMAX-14x375.jpg', '[\"isuzu/den-pha.jpg\"]', 2, '3', 0, '2017-11-30 07:12:51', 9, 3, '', 1, 0),
(24, 'Gương Chiếu Hậu', 0.00, 'isuzu/D-MAX_Kính-chiếu-hậu1điện-xi-xi-nhanhLH-RH__-400x375.jpg', '[\"isuzu/den-hau-sau.jpg\"]', 2, '3', 0, '2017-11-30 07:10:49', 9, 3, '', 1, 0),
(25, 'Đèn Pha', 12.24, 'toyota/den-pha-phai-toyota-innova-2009.jpg', '[\"toyota/den-pha-phai-toyota-innova-20091.jpg\"]', 1, '1', 4, '2017-12-02 12:32:54', 1, 1, '', 1, 0),
(26, 'As', 0.00, 'toyota/oplagiangspark.jpg', '[\"toyota/img17612.jpg\"]', 2, 'a', 0, '2017-11-30 07:07:09', 2, 4, '', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `xuatxu`
--

CREATE TABLE `xuatxu` (
  `MA_XUATXU` int(11) NOT NULL,
  `TEN_XUATXU` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `xuatxu`
--

INSERT INTO `xuatxu` (`MA_XUATXU`, `TEN_XUATXU`) VALUES
(1, 'Trung Quốc'),
(2, 'Viêt Nam'),
(3, 'Inđônêxia'),
(4, 'Thái Lan'),
(5, 'Lào'),
(6, 'Singapo'),
(7, 'Hồng Không'),
(8, 'Mỹ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chitiet_giaodich`
--
ALTER TABLE `chitiet_giaodich`
  ADD KEY `fk_chitiet_giaodich_sanpham1_idx` (`MA_SANPHAM`),
  ADD KEY `fk_chitiet_giaodich_giaodich1_idx` (`MA_GIAODICH`);

--
-- Indexes for table `chitiet_khuyenmai`
--
ALTER TABLE `chitiet_khuyenmai`
  ADD PRIMARY KEY (`MA_KHUYENMAI`,`MA_SANPHAM`),
  ADD KEY `fk_chitiet_khuyenmai_khuyenmai1_idx` (`MA_KHUYENMAI`),
  ADD KEY `fk_chitiet_khuyenmai_sanpham1_idx` (`MA_SANPHAM`);

--
-- Indexes for table `chitiet_nhap`
--
ALTER TABLE `chitiet_nhap`
  ADD PRIMARY KEY (`MA_PHIEUNHAP`,`MA_SANPHAM`),
  ADD KEY `fk_chitiet_nhap_sanpham1_idx` (`MA_SANPHAM`),
  ADD KEY `MA_PHIEUNHAP` (`MA_PHIEUNHAP`);

--
-- Indexes for table `chucvu`
--
ALTER TABLE `chucvu`
  ADD PRIMARY KEY (`MA_CHUCVU`);

--
-- Indexes for table `dacdiem_kythuat`
--
ALTER TABLE `dacdiem_kythuat`
  ADD PRIMARY KEY (`MA_SANPHAM`,`MA_LOAI_SANPHAM`),
  ADD KEY `FK__dacdiem_kt_MA_SANPHAM_loai_sanpham` (`MA_LOAI_SANPHAM`);

--
-- Indexes for table `giaodich`
--
ALTER TABLE `giaodich`
  ADD PRIMARY KEY (`MA_GIAODICH`) USING BTREE,
  ADD KEY `fk_giaodich_khachhang1_idx` (`MA_KHACHHANG`),
  ADD KEY `fk_giaodich_hinhthuc1_idx` (`MA_HINHTHUC`),
  ADD KEY `fk_giaodich_nhanvien` (`MA_NHANVIEN`);

--
-- Indexes for table `hinhthuc`
--
ALTER TABLE `hinhthuc`
  ADD PRIMARY KEY (`MA_HINHTHUC`);

--
-- Indexes for table `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`MA_KHACHHANG`);

--
-- Indexes for table `kho`
--
ALTER TABLE `kho`
  ADD PRIMARY KEY (`MA_KHO`) USING BTREE,
  ADD KEY `fk_kho_loai_sanpham1_idx` (`MA_LOAI_SANPHAM`);

--
-- Indexes for table `khuyenmai`
--
ALTER TABLE `khuyenmai`
  ADD PRIMARY KEY (`MA_KHUYENMAI`);

--
-- Indexes for table `loai_sanpham`
--
ALTER TABLE `loai_sanpham`
  ADD PRIMARY KEY (`MA_LOAI_SANPHAM`) USING BTREE,
  ADD KEY `fk_loai_sanpham_nhom_sanpham1_idx` (`MA_NHOM_SANPHAM`),
  ADD KEY `ma_nha_cungcap` (`MA_NHA_CUNGCAP`);

--
-- Indexes for table `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`MA_NHANVIEN`) USING BTREE,
  ADD KEY `fk_nhanvien_chucvu1_idx` (`MA_CHUCVU`);

--
-- Indexes for table `nha_cungcap`
--
ALTER TABLE `nha_cungcap`
  ADD PRIMARY KEY (`MA_NHA_CUNGCAP`);

--
-- Indexes for table `nhom_sanpham`
--
ALTER TABLE `nhom_sanpham`
  ADD PRIMARY KEY (`MA_NHOM_SANPHAM`);

--
-- Indexes for table `phieunhap`
--
ALTER TABLE `phieunhap`
  ADD PRIMARY KEY (`MA_PHIEUNHAP`) USING BTREE,
  ADD KEY `fk_phieunhap_nhanvien1_idx` (`MA_NHANVIEN`),
  ADD KEY `fk_phieunhap_nha_cungcap1_idx` (`MA_NHA_CUNGCAP`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`MA_SANPHAM`) USING BTREE,
  ADD KEY `fk_sanpham_loai_sanpham1_idx` (`MA_LOAI_SANPHAM`),
  ADD KEY `fk_sanpham_xuatxu1_idx` (`MA_XUATXU`);

--
-- Indexes for table `xuatxu`
--
ALTER TABLE `xuatxu`
  ADD PRIMARY KEY (`MA_XUATXU`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chucvu`
--
ALTER TABLE `chucvu`
  MODIFY `MA_CHUCVU` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `giaodich`
--
ALTER TABLE `giaodich`
  MODIFY `MA_GIAODICH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `hinhthuc`
--
ALTER TABLE `hinhthuc`
  MODIFY `MA_HINHTHUC` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `MA_KHACHHANG` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `kho`
--
ALTER TABLE `kho`
  MODIFY `MA_KHO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `khuyenmai`
--
ALTER TABLE `khuyenmai`
  MODIFY `MA_KHUYENMAI` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `loai_sanpham`
--
ALTER TABLE `loai_sanpham`
  MODIFY `MA_LOAI_SANPHAM` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `MA_NHANVIEN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `nha_cungcap`
--
ALTER TABLE `nha_cungcap`
  MODIFY `MA_NHA_CUNGCAP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `nhom_sanpham`
--
ALTER TABLE `nhom_sanpham`
  MODIFY `MA_NHOM_SANPHAM` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `phieunhap`
--
ALTER TABLE `phieunhap`
  MODIFY `MA_PHIEUNHAP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `MA_SANPHAM` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `xuatxu`
--
ALTER TABLE `xuatxu`
  MODIFY `MA_XUATXU` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `chitiet_giaodich`
--
ALTER TABLE `chitiet_giaodich`
  ADD CONSTRAINT `fk_chitiet_giaodich_giaodich1` FOREIGN KEY (`MA_GIAODICH`) REFERENCES `giaodich` (`MA_GIAODICH`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_chitiet_giaodich_sanpham1` FOREIGN KEY (`MA_SANPHAM`) REFERENCES `sanpham` (`MA_SANPHAM`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `chitiet_khuyenmai`
--
ALTER TABLE `chitiet_khuyenmai`
  ADD CONSTRAINT `fk_chitiet_khuyenmai_khuyenmai1` FOREIGN KEY (`MA_KHUYENMAI`) REFERENCES `khuyenmai` (`MA_KHUYENMAI`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_chitiet_khuyenmai_sanpham1` FOREIGN KEY (`MA_SANPHAM`) REFERENCES `sanpham` (`MA_SANPHAM`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `chitiet_nhap`
--
ALTER TABLE `chitiet_nhap`
  ADD CONSTRAINT `fk_chitiet_nhap_sanpham1` FOREIGN KEY (`MA_SANPHAM`) REFERENCES `sanpham` (`MA_SANPHAM`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_chitiet_phieunhap_phieunhap` FOREIGN KEY (`MA_PHIEUNHAP`) REFERENCES `phieunhap` (`MA_PHIEUNHAP`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `dacdiem_kythuat`
--
ALTER TABLE `dacdiem_kythuat`
  ADD CONSTRAINT `FK__dacdiem_kt_MA_SANPHAM_` FOREIGN KEY (`MA_SANPHAM`) REFERENCES `sanpham` (`MA_SANPHAM`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK__dacdiem_kt_MA_SANPHAM_loai_sanpham` FOREIGN KEY (`MA_LOAI_SANPHAM`) REFERENCES `loai_sanpham` (`MA_LOAI_SANPHAM`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `giaodich`
--
ALTER TABLE `giaodich`
  ADD CONSTRAINT `fk_giaodich_hinhthuc1` FOREIGN KEY (`MA_HINHTHUC`) REFERENCES `hinhthuc` (`MA_HINHTHUC`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_giaodich_khachhang1` FOREIGN KEY (`MA_KHACHHANG`) REFERENCES `khachhang` (`MA_KHACHHANG`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_giaodich_nhanvien` FOREIGN KEY (`MA_NHANVIEN`) REFERENCES `nhanvien` (`MA_NHANVIEN`);

--
-- Constraints for table `kho`
--
ALTER TABLE `kho`
  ADD CONSTRAINT `fk_kho_loai_sanpham1` FOREIGN KEY (`MA_LOAI_SANPHAM`) REFERENCES `loai_sanpham` (`MA_LOAI_SANPHAM`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `loai_sanpham`
--
ALTER TABLE `loai_sanpham`
  ADD CONSTRAINT `loai_sanpham_ibfk_1` FOREIGN KEY (`MA_NHOM_SANPHAM`) REFERENCES `nhom_sanpham` (`MA_NHOM_SANPHAM`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ma_nha_cungcap` FOREIGN KEY (`MA_NHA_CUNGCAP`) REFERENCES `nha_cungcap` (`MA_NHA_CUNGCAP`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD CONSTRAINT `fk_nhanvien_chucvu1` FOREIGN KEY (`MA_CHUCVU`) REFERENCES `chucvu` (`MA_CHUCVU`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `phieunhap`
--
ALTER TABLE `phieunhap`
  ADD CONSTRAINT `fk_phieunhap_nha_cungcap1` FOREIGN KEY (`MA_NHA_CUNGCAP`) REFERENCES `nha_cungcap` (`MA_NHA_CUNGCAP`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_phieunhap_nhanvien1` FOREIGN KEY (`MA_NHANVIEN`) REFERENCES `nhanvien` (`MA_NHANVIEN`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `fk_sanpham_loai_sanpham1` FOREIGN KEY (`MA_LOAI_SANPHAM`) REFERENCES `loai_sanpham` (`MA_LOAI_SANPHAM`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_sanpham_xuatxu1` FOREIGN KEY (`MA_XUATXU`) REFERENCES `xuatxu` (`MA_XUATXU`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
