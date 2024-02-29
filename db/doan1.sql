-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 29, 2024 at 04:13 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `doan1`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `name`, `password`) VALUES
(1, 'Admin 1', 'adminpass1'),
(2, 'Admin 2', 'adminpass2'),
(3, 'Admin 3', 'adminpass3');

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `brand_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `des` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`brand_id`, `name`, `des`) VALUES
(1, 'ASUS', 'Hãng sản xuất laptop nổi tiếng, cung cấp dòng sản phẩm phù hợp cho gaming, văn phòng và đồ họa.'),
(2, 'MSI', 'Hãng sản xuất laptop chuyên về gaming và đồ họa, cung cấp các dòng sản phẩm cao cấp.'),
(3, 'Dell', 'Hãng sản xuất laptop hàng đầu thế giới, cung cấp dòng sản phẩm đa dạng cho gaming, văn phòng và đồ họa.'),
(4, 'HP', 'Hãng sản xuất laptop và máy tính hàng đầu, cung cấp dòng sản phẩm phù hợp cho gaming, văn phòng và đồ họa.'),
(5, 'Lenovo', 'Hãng sản xuất laptop hàng đầu, cung cấp dòng sản phẩm chất lượng cho gaming, văn phòng và đồ họa.'),
(6, 'Gigabyte', 'Hãng sản xuất laptop chuyên về gaming và đồ họa, cung cấp các dòng sản phẩm cao cấp.'),
(7, 'Acer', 'Hãng sản xuất laptop nổi tiếng, cung cấp dòng sản phẩm phù hợp cho gaming, văn phòng và đồ họa.'),
(8, 'Dareu', NULL),
(9, 'Logitech', NULL),
(10, 'Corsair', NULL),
(11, 'Razer', NULL),
(12, 'Akko', NULL),
(13, 'Sony', NULL),
(14, 'Khác', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `number` int(11) DEFAULT NULL,
  `total` decimal(20,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `total_price` decimal(12,0) DEFAULT NULL,
  `order_date` timestamp NULL DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `total_price`, `order_date`, `address`, `name`, `phone`, `state`) VALUES
(4, 4, '33182566', '2023-02-26 17:00:00', '3', '1', '2', 'pending'),
(5, 4, '11484000', '2023-03-26 17:00:00', 'Thái Bình', 'Trần Đức Cường', '0971433911', 'pending'),
(6, 11, '11484000', '2023-04-27 17:00:00', 'Hoàng Mai, Hà Nội', 'Cường NÈ', '0975667854', 'pending'),
(7, 11, '100000000', '2023-05-27 17:00:00', 'Hà Nội', 'Trần Đức Cường', '0971433911', 'pending'),
(8, 11, '40579350', '2023-06-27 17:00:00', 'Thái Bình', 'Trần Đức Cường', '0971433911', 'pending'),
(9, 11, '111589300', '2023-07-28 17:00:00', 'Đông hưng Thái Bịnh', 'Trần Đức Cường', '0971433911', 'cho_xac_nhan'),
(10, 4, '616550', '2023-08-28 17:00:00', '12312', 'Trần Đức Cường', '21312123123', 'cho_xac_nhan'),
(11, 4, '6165500', '2023-09-28 17:00:00', 'qqqq', 'Trùm Trà Nóng', '0971433911', 'cho_xac_nhan'),
(12, 4, '802811750', '2023-10-28 17:00:00', 'hn', 'Trần Đức Cường', '0971433912', 'cho_xac_nhan'),
(13, 4, '105600000', '2024-01-29 07:48:33', '1', 'a', '1', 'cho_xac_nhan'),


(14, 4, '10450000', '2024-02-29 07:49:21', 'adwd', 'Trần Đức Cường', '21312123123', 'cho_xac_nhan'),
(15, 4, '16419920', '2024-02-29 13:50:44', '1', 'ád', '111', 'cho_xac_nhan');

-- --------------------------------------------------------

--
-- Table structure for table `order_product`
--

CREATE TABLE `order_product` (
  `order_product_id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `number` int(11) DEFAULT NULL,
  `price` decimal(12,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_product`
--

INSERT INTO `order_product` (`order_product_id`, `order_id`, `product_id`, `number`, `price`) VALUES
(3, 5, 2, 1, '11484000'),
(4, 6, 2, 1, '11484000'),
(5, 7, 2, 1, '11484000'),
(6, 7, 5, 1, '16761400'),
(7, 7, 6, 1, '100000000'),
(8, 7, 7, 1, '21667500'),
(9, 7, 8, 1, '19465500'),
(10, 8, 5, 1, '16761400'),
(11, 8, 10, 1, '15350400'),
(12, 8, 21, 1, '1139050'),
(13, 8, 26, 1, '845500'),
(14, 8, 32, 1, '4972500'),
(15, 8, 37, 1, '1510500'),
(16, 9, 6, 1, '105600000'),
(17, 9, 22, 1, '1462800'),
(18, 9, 26, 1, '845500'),
(19, 9, 29, 1, '1161000'),
(20, 9, 34, 1, '2520000'),
(21, 10, 36, 1, '616550'),
(22, 11, 36, 10, '6165500'),
(23, 12, 16, 38, '802195200'),
(24, 12, 36, 1, '616550'),
(25, 13, 6, 1, '105600000'),
(26, 14, 11, 1, '10450000'),
(27, 15, 13, 1, '16419920');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(12,0) DEFAULT NULL,
  `discount` decimal(5,0) DEFAULT NULL,
  `image_link_1` varchar(255) DEFAULT NULL,
  `image_link_2` varchar(255) DEFAULT NULL,
  `image_link_3` varchar(255) DEFAULT NULL,
  `image_link_4` varchar(255) DEFAULT NULL,
  `number` int(11) DEFAULT NULL,
  `number_buy` int(11) DEFAULT NULL,
  `type_id` int(11) DEFAULT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `purpose_id` int(11) DEFAULT NULL,
  `description1` text DEFAULT NULL,
  `active` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `name`, `description`, `price`, `discount`, `image_link_1`, `image_link_2`, `image_link_3`, `image_link_4`, `number`, `number_buy`, `type_id`, `brand_id`, `purpose_id`, `description1`, `active`) VALUES
(2, 'Laptop Acer Nitro 5 AN515-58-57QW - Intel Core i5-12450H | RAM 16GB | Nvidia RTX 3050Ti | 15.6 Inch Full HD 144Hz', 'CPU: Intel Core i5 12500H\nRAM: 8GB\nỔ cứng: 512GB SSD\nVGA: NVIDIA RTX3050 4G\nMàn hình: 15.6 inch FHD 144Hz', '14355000', '20', 'https://res.cloudinary.com/doxa1jpq0/image/upload/v1708857519/acer1_qfezyh.jpg', 'https://res.cloudinary.com/doxa1jpq0/image/upload/v1708858877/acer4_bgznby.jpg', 'https://res.cloudinary.com/doxa1jpq0/image/upload/v1708858877/acer2_qnvx9b.jpg', 'https://res.cloudinary.com/doxa1jpq0/image/upload/v1708858877/acer3_zqcpla.jpg', 50, 35, 1, 7, 3, 'CPU: i511400H2.7GHz\r\nRAM: 8 GBDDR4 2 khe (1 khe 8 GB + 1 khe rời)3200 MHz \r\nỔ cứng: Hỗ trợ thêm 1 khe cắm SSD M.2 PCIe mở rộng (nâng cấp tối đa 1 TB)Hỗ trợ khe cắm HDD SATA (nâng cấp tối đa 2 TB)512 GB SSD NVMe PCIe \r\nMàn hình: 15.6\"Full HD (1920 x 1080) 144Hz\r\nCard màn hình: Card rờiGTX 1650 4GB\r\nCổng kết nối:USB Type-CLAN (RJ45)Jack tai nghe 3.5 mmHDMI3 x USB 3.2 \r\nĐặc biệt: Có đèn bàn phím \r\nHệ điều hành: Windows 11 Home SL \r\nThiết kế: Vỏ nhựa Kích thước, khối lượng: Dài 363.4 mm - Rộng 255 mm - Dày 23.9 mm - Nặng 2.2 kg \r\nThời điểm ra mắt: 2021', 1),
(5, 'Laptop Asus TUF Gaming FX507ZC4-HN095W i5 12500H/16GB/512GB/15.6\"/Nvidia RTX 3050 4GB/Win11', 'CPU: Intel Core i5 12500H\nRAM: 8GB\nỔ cứng: 512GB SSD\nVGA: NVIDIA RTX3050 4G\nMàn hình: 15.6 inch FHD 144Hz', '19490000', '14', 'https://cdn2.cellphones.com.vn/x/media/catalog/product/t/e/text_ng_n_2__3_24.png', 'https://down-vn.img.susercontent.com/file/79ef8c22ec4265702835acdffe0beac4', 'https://down-vn.img.susercontent.com/file/79ef8c22ec4265702835acdffe0beac4', 'https://down-vn.img.susercontent.com/file/96c4b51fe7494bf1012bee78155d6996', 35, 1, 1, 1, 3, 'Màn hình 15.6 inch, 1920 x 1080 Pixels, IPS, 144 Hz, 250 nits, Anti - Glare CPU Intel, Core i5, 12500H RAM 16 GB (2 thanh 8 GB), DDR4, 3200 Ổ cứng SSD 512 GB Đồ họa NVIDIA GeForce RTX 3050 4GB Intel Iris Xe Graphics Hệ điều hành Windows 11 Home Trọng lượng 2.2 kg Kích thước 35.4 x 25.1 x 2.24 ~ 2.49 cm Xuất xứ Trung Quốc Năm ra mắt 2022', 1),
(6, 'Laptop Lenovo Legion 9 16IRX8 83AG0047VN (Core i9-13980HX | 64GB | 2TB | RTX 4090 16GB | 16 inch 3.2K)', 'CPU: Intel Core i9 13800HX\r\nRAM: 32GB, \r\nỔ cứng: 1T SSD\r\nVGA: NVIDIA RTX4090 16G\r\nMàn hình: 16 inch 3.2k 165hz', '120000000', '12', 'https://down-vn.img.susercontent.com/file/vn-11134207-7r98o-lqfrhwekqz823b', 'https://down-vn.img.susercontent.com/file/vn-11134207-7r98o-lqfrhwg8ixiv2e', 'https://down-vn.img.susercontent.com/file/vn-11134207-7r98o-lqfrhweklcya6a', 'https://down-vn.img.susercontent.com/file/vn-11134207-7r98o-lqfrhwekmriq5d', 34, 1, 1, 5, 3, 'aptop Lenovo Legion 9 16IRX8 83AG0047VN (Intel Core i9-13980HX | 64GB | 2TB | RTX 4090 16GB | 16 inch 3.2K | Win 11 | Đen)\r\nCPU: Intel Core i9-13980HX (24 nhân 32 luồng, upto 5.6GHz, 36MB)\r\nRAM: 2x 32GB SO-DIMM DDR5-5600 (Overclock)\r\nỔ cứng: 2x 1TB SSD M.2 2280 PCIe® 4.0x4 NVMe®\r\nVGA: NVIDIA GeForce RTX 4090 16GB GDDR6\r\nMàn hình: 16 inch 3.2K (3200x2000) Mini LED 1200nits Anti-glare, 100% DCI-P3, 100% Adobe® RGB, 100% sRGB, 165Hz\r\nPin: 99.9Wh\r\nCân nặng: 2.56 kg\r\nTính năng: Bảo mật vân tay, bàn phím LED RGB\r\nMàu sắc: Carbon Black\r\nBảo hành : 36 tháng', 1),
(7, 'Laptop MSI Bravo 15 CPU R7-7735HS RAM 16GB DDR5 SSD 512GB  VGA RTX 4060 8GB 15.6 FHD144Hz| Win11 ', 'CPU: AMD Ryzen 7 7735HS \r\n\r\nRAM: 16Gb\r\n\r\nỔ cứng: 1T SSD\r\n\r\nVGA: NVIDIA RTX4080 16G\r\n\r\nMàn hình: 15.6 inch FHD 165hz', '28890000', '25', 'https://down-vn.img.susercontent.com/file/vn-11134207-7r98o-loku0lk0qj8zf2', 'https://down-vn.img.susercontent.com/file/vn-11134207-7r98o-loku0lk0rxtf9c', 'https://down-vn.img.susercontent.com/file/vn-11134207-7r98o-loku0lk0uqyb2b', 'https://down-vn.img.susercontent.com/file/vn-11134207-7r98o-loku0lk10d8323', 23, 100, 1, 2, 3, '•	CPU	AMD Ryzen 7 7735HS 3.2GHz up to 4.75GHz 16MB\r\n•	RAM	16GB (8x2) DDR5 4800MHz (2x SO-DIMM socket, up to 64GB SDRAM)\r\n•	Ổ cứng	512GB NVMe PCIe Gen 4 SSD ( Còn trống 1 slot M.2 NVMe)\r\n•	Card đồ họa	NVIDIA® GeForce RTX™ 4060 8GB Up to 2250MHz Boost Clock 105W Maximum Graphics Power with Dynamic Boost.\r\n•	Màn hình 15.6\" FHD (1920 x 1080) IPS, 144Hz, Thin Bezel, Anti-Glare with 45% NTSC\r\n•	Cổng giao tiếp	1x Type-C (USB3.2 Gen1 / DP)\r\n•	2x Type-A USB 3.2 Gen1\r\n•	1x Type-A USB 2.0\r\n•	1x HDMI™ 2.1 (8K @ 60Hz)\r\n•	1x RJ45\r\n•	1x Mic-in/Headphone-out Combo Jack\r\n•	Audio	2x 2W Speaker\r\n•	Bàn phím	4-Zone RGB\r\n•	Đọc thẻ nhớ	None\r\n•	Chuẩn LAN	Gb LAN\r\n•	Chuẩn WIFI	Wi-Fi 6E (802.11ax)\r\n•	Bluetooth	v5.3\r\n•	Webcam	HD type (30fps@720p)\r\n•	Hệ điều hành	Windows 11 Home\r\n•	Pin	3 Cell 53.5WHr\r\n•	Trọng lượng	2.25 kg\r\n•	Màu sắc	Đen\r\n•	Kích thước	359 x 259 x 24.95 mm\r\n•	Bảo hành chính hãng 24 tháng tại TTBH của MSI\r\n•	Sản phẩm full box đầy đủ phụ kiện từ nhà sản xuất', 1),
(8, 'Dell Gaming G15 5535 (Ryzen 7 - 7840HS RAM 16GB SSD 1TB RTX 4060 6G 15.6-inch FHD 165Hz)', 'CPU: AMD Ryzen 7 7840HS\r\nRAM: 16GB\r\nỔ cứng: 1T SSD\r\nVGA: NVIDIA RTX4060 6G, \r\nMàn hình: 15.6 inch FHD 165hz', '20490000', '20', 'https://down-vn.img.susercontent.com/file/vn-11134207-7r98o-lponjumst1ec3f', 'https://down-vn.img.susercontent.com/file/vn-11134207-7r98o-lponjumsdl5gd3', 'https://down-vn.img.susercontent.com/file/vn-11134207-7r98o-lponjumhyk6x41', 'https://down-vn.img.susercontent.com/file/vn-11134207-7r98o-lponjumry5kp2a', 10, 2, 1, 3, 3, '*Cấu hình chi tiết:\r\n- CPU: Ryzen 7-7840HS; R5 7640HS\r\n- RAM: 16 GB, 2 x 8 GB, DDR5, 4800 MHz -Tối đa 32GB\r\n- Ổ Cứng: 1TB, M.2, PCIe NVMe, SSD-Hỗ trợ lên đến 4 TB (2 khe SSD)\r\n- Màn hình: 15.6\" FHD 165Hz\r\n- VGA: RTX 4060 8GB GDDR6; RTX3050\r\n- Kết nối: HDMI 2.1, 3x USB-A 3.2 Gen 1, 1x USB-C 3.2 Gen 2, Jack 3.5mm (Input & Output)\r\n- Pin: 3 cell - 56 WHr 240W AC Adapter\r\n- Trọng lượng (kg): 2.81 kg\r\n- Hệ điều hành: Windows 11 bản quyền', 1),
(9, 'Laptop Asus Zenbook 14 OLED UM3402YA-KM405W\r\nR5-7530U/16GB/512GB PCIE/14.0 OLED 2.8K/WIN11/ĐEN', 'CPU: R5 7530U\r\nRAM: 16 Gb, \r\nỔ cứng: 512 SSD\r\nVGA: ADM Radein Graphis\r\nMàn hình: 14 inch HDR', '20490000', '8', 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/t/e/text_ng_n_17__4_9.png', 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/t/e/text_ng_n_16__3_10.png', 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/t/e/text_ng_n_11__4_14.png', 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/t/e/text_ng_n_12__4_15.png', 50, 5, 1, 1, 1, 'Loại card đồ họa AMD Radeon Graphics\r\nDung lượng RAM 16GB\r\nLoại RAM LPDDR4X Onboard\r\nỔ cứng 512GB M.2 NVMe PCIe 3.0 SSD\r\nKích thước màn hình 14 inches\r\nCông nghệ màn hình Thời gian phản hồi 0.2ms Độ sáng tối đa 600nits HDR\r\nĐộ phủ màu 100% DCI-P3\r\nDisplay HDR True Black 600 1.07 tỷ màu PANTONE Validated Glossy display Giảm ánh sáng xanh 70% SGS Eye Care Display\r\nPin 75WHrs, 2S2P, 4-cell Li-ion\r\nHệ điều hành Windows 11 Home\r\nĐộ phân giải màn hình  2880 x 1800 pixels\r\n', 1),
(10, 'Laptop Lenovo Yoga Slim 7 14ACN6 82N7008VVN\r\nR7-5800U/8GB/512GB PCIE/14.0 FHD', 'CPU: R5800U\r\nRAM: 8 Gb, \r\nỔ cứng: 512 SSD\r\nVGA: ADM Radein Graphis\r\nMàn hình: 14 inch HDR', '15990000', '4', 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/4/0/40_1_38.jpg', 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/4/4/44_1_40.jpg', 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/4/2/42_1_36.jpg', 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/4/5/45_1_33.jpg', 45, 3, 1, 5, 1, 'Loại card đồ họa AMD Radeon tích hợp\r\nDung lượng RAM 8GB\r\nLoại RAM 8GB LPDDR4x-4266 (Onboard)\r\nSố khe ram Ram onboard, không hỗ trợ nâng cấp\r\nỔ cứng 512 GB SSD M.2 2280 PCIe 3.0x4 NVMe Hỗ trợ tối đa 256GB M.2 2242 SSD hoặc 1TB M.2 2280 SSD\r\nKích thước màn hình 14 inches\r\nCông nghệ màn hình Tấm nền IPS\r\nĐộ sáng 300nits Độ phủ màu 72% NTSC\r\nPin 71Wh\r\nHệ điều hành Windows 11 Home 64\r\nĐộ phân giải màn hình 1920 x 1080 pixels (FullHD)', 1),
(11, 'Laptop Dell Inspiron 15 3520 D5N53\r\nI3-1115G4/8GB/256GB PCIE/15.6 FHD/WIN11/ĐEN/', 'CPU: Intel UHD \r\nRAM: 8 Gb, \r\nỔ cứng: 256 SSD\r\nVGA: Onbroad\r\nMàn hình: 14 inch HDR', '11000000', '5', 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/t/e/text_ng_n_1__3_9.png', 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/t/e/text_ng_n_2__4_8.png', 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/t/e/text_ng_n_4__4_7.png', 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/t/e/text_ng_n_8__3_8.png', 33, 2, 1, 3, 1, 'Loại card đồ họa Intel UHD Graphics\r\nDung lượng RAM 8GB\r\nLoại RAM DDR4\r\nỔ cứng 256 GB, M.2 2230, PCIe NVMe Gen3 x4, SSD\r\nKích thước màn hình 15.6 inches\r\nCông nghệ màn hình Màn hình chống chói\r\nĐộ phủ màu 45% NTSC Độ sáng 220 nits AG, Flat\r\nPin 3-cell, 41 Wh lithium-polymer\r\nHệ điều hành Windows 11 Home\r\nĐộ phân giải màn hình 1920 x 1080 pixels (FullHD)', 1),
(12, 'Laptop HP Envy X360 BF0112TU 7C0N9PA\r\nI5-1230U/16GB/512GB PCIE//13.3 2.8K OLED', 'CPU: I5 1320U\r\nRAM: 16 Gb, \r\nỔ cứng: 512 SSD\r\nVGA: Intel Iris Xe Graphics\r\nMàn hình: 2880x1800', '23450000', '7', 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/h/p/hp-envy-x360-13-bf0112tu-i5-7c0n9pa-3.jpg', 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/h/p/hp-envy-x360-13-bf0112tu-i5-7c0n9pa-1.jpg', 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/h/p/hp-envy-x360-13-bf0112tu-i5-7c0n9pa-2.jpg', 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/h/p/hp-envy-x360-13-bf0112tu-i5-7c0n9pa-12.jpg', 45, 12, 1, 4, 1, 'Loại card đồ họa Intel Iris Xe Graphics\r\nDung lượng RAM 16GB\r\nLoại RAM LPDDR4X (Onboard) 4266 MHz\r\nSố khe ram Không hỗ trợ nâng cấp\r\nỔ cứng 512 GB SSD NVMe PCIe\r\nKích thước màn hình 13.3 inches\r\nPin 4-cell Li-ion, 66 Wh\r\nHệ điều hành Windows 11 Home SL\r\nĐộ phân giải màn hình 2880 x 1800 pixels', 1),
(13, 'Laptop MSI Modern 14 C13M-607VN\r\nI7-1355U/16GB/512GB PCIE/14.0 FHD/WIN11/ĐEN', 'CPU: Intel i7 1355U\r\nRAM: 16 Gb, \r\nỔ cứng: 512 SSD\r\nVGA: Intel UHD\r\nMàn hình: 14 inch FHD', '18659000', '12', 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/t/e/text_ng_n_-_2023-04-27t221511.576.png', 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/t/e/text_ng_n_-_2023-04-27t221530.789.png', 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/t/e/text_ng_n_-_2023-04-27t221546.258.png', 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/t/e/text_ng_n_-_2023-04-27t221602.385.png', 21, 12, 1, 2, 1, 'Loại card đồ họa Intel UHD\r\nDung lượng RAM 16GB\r\nLoại RAM DDR4 3200 MHz\r\nSố khe ram RAM 16GB onboard\r\nKhông hỗ trợ nâng cấp\r\nỔ cứng 512GB M.2 NVMe\r\nKích thước màn hình 14 inches\r\nCông nghệ màn hình \r\nCông nghệ màn hình FHD\r\nĐộ sáng 300 nits\r\nĐộ phủ màu 45% NTSC\r\nPin 65 W, 3-Cell\r\nHệ điều hành Windows 11 Home\r\nĐộ phân giải màn hình 1920 x 1080 pixels (FullHD)', 1),
(14, 'Laptop Acer Aspire 7 A715-76G-59MW\r\nI5-12450H/8GB/512GB PCIE/15.6 FHD 144HZ', 'CPU: I5-12450H\r\nRAM: 32 Gb, \r\nỔ cứng: 512 SSD\r\nVGA: NDIDIA 2050 4Gb\r\nMàn hình: 15.6 FHD', '19990000', '8', 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/t/e/text_ng_n_14__3_3.png', 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/t/e/text_ng_n_15__5_6.png', 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/t/e/text_ng_n_17__4_2.png', 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/t/e/text_ng_n_18__2_2.png', 21, 11, 1, 7, 2, 'Loại card đồ họa NVIDIA GeForce RTX 2050, 4 GB\r\nDung lượng RAM 8GB\r\nLoại RAM DDR4 3200 MHz\r\nSố khe ram 2 khe (1 khe 8 GB + 1 khe rời, nâng cấp tối đa 32 GB)\r\nỔ cứng 512 GB SSD NVMe PCIe (Có thể tháo ra, lắp thanh khác tối đa 1 TB)\r\nKích thước màn hình 15.6 inches\r\nCông nghệ màn hình Acer ComfyView\r\nPin 3-cell Li-ion, 50 Wh\r\nHệ điều hành Windows 11 Home SL\r\nĐộ phân giải màn hình 1920 x 1080 pixels (FullHD)', 1),
(15, 'Laptop Lenovo LOQ 15IRX9 83DV000MVN\r\nI5-13450HX/16GB/512GB PCIE/VGA 6GB RTX 4050/', 'CPU: I5-13450H\r\nRAM: 16 Gb, \r\nỔ cứng: 512 SSD\r\nVGA: NDIDIA 4050 8Gb\r\nMàn hình: 15.6 FHD', '28450000', '9', 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/t/e/text_ng_n_51__1_3.png', 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/t/e/text_ng_n_52__1_2.png', 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/t/e/text_ng_n_54__1_2.png', 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/t/e/text_ng_n_56__1_2.png', 45, 15, 1, 5, 2, 'Loại card đồ họa NVIDIA GeForce RTX 4050 Laptop GPU 6GB GDDR6\r\nDung lượng RAM 16GB\r\nLoại RAM DDR5-4800 SO-DIMM\r\nSố khe ram 2 khe 8GB (Còn trống 1 khe, nâng cấp tối đa 32GB)\r\nỔ cứng 512GB PCIe 4.0 NVMe M.2 SSD\r\nKích thước màn hình 15.6 inches\r\nHệ điều hành Windows 11 Home', 1),
(16, 'Laptop Gigabyte MF F2VN333SH\r\nI5-12450H/8GB/512GB PCIE/VGA 6GB RTX4050/15.6 FHD', 'CPU: I5-12450H\r\nRAM: 32 Gb, \r\nỔ cứng: 512 SSD\r\nVGA: NDIDIA 4050 4Gb\r\nMàn hình: 15.6 FHD', '21990000', '4', 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/l/a/laptop-gigabyte-g5-mf-f2vn333sh-6_1_1.png', 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/l/a/laptop-gigabyte-g5-mf-f2vn333sh_1.png', 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/l/a/laptop-gigabyte-g5-mf-f2vn333sh-1_1.png', 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/l/a/laptop-gigabyte-g5-mf-f2vn333sh-2_1.png', 0, 19, 1, 6, 2, 'Loại card đồ họa\r\n\r\nNvidia Geforce RTX 4050 4GB GDDR6\r\nIntel Iris Xe Graphics\r\nDung lượng RAM\r\n\r\n8GB\r\nLoại RAM\r\n\r\nDDR4-3200Mhz\r\nSố khe ram\r\n\r\n1 khe ram 8GB + 1 khe trống\r\nỔ cứng\r\n\r\n512GB SSD M.2 PCIE G4X4\r\nCòn trống 1 khe SSD M.2\r\nKích thước màn hình\r\n\r\n15.6 inches\r\nPin\r\n\r\n4 Cell 54Whrs\r\nHệ điều hành\r\n\r\nWindows 11\r\nĐộ phân giải màn hình\r\n\r\n1080 x 1920 pixels (FullHD)\r\nCổng giao tiếp\r\n\r\n2x USB3.2 Gen2 (Type-C)\r\n1x USB 2.0 (Type-A)\r\n1x USB3.2 Gen1 (Type-A)\r\n1x Mini DisplayPort 1.4\r\n1x HDMI I™ Output port (with HDCP)\r\n1x 2-in-1 Audio Jack(Headphone / Microphone)\r\n1x Microphone jack\r\n1x RJ-45 LAN port 1x DC-in Jack', 1),
(17, 'Laptop ASUS Zenbook 14 OLED UX3405MA-PP588W\r\nU5-125H/16GB/512GB PCIE/14.0 3K OLED/WIN11', 'CPU: i5-125H\r\nRAM: 16 Gb, \r\nỔ cứng: 512 SSD\r\nVGA: Arc Graphics\r\nMàn hình: 15.6 FHD', '27990000', '5', 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/l/a/laptop-asus-zenbook-14-oled-ux3405ma-pp588w-1.jpg', 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/l/a/laptop-asus-zenbook-14-oled-ux3405ma-pp588w-3.jpg', 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/l/a/laptop-asus-zenbook-14-oled-ux3405ma-pp588w-4.jpg', 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/l/a/laptop-asus-zenbook-14-oled-ux3405ma-pp588w-8.jpg', 22, 11, 1, 1, 2, 'Loại card đồ họa\r\n\r\nIntel® Arc™ Graphics\r\nDung lượng RAM\r\n\r\n16GB\r\nLoại RAM\r\n\r\nLPDDR5X Onboard\r\nỔ cứng\r\n\r\n512GB M.2 NVMe™ PCIe® 4.0 SSD\r\nKích thước màn hình\r\n\r\n14 inches\r\nCông nghệ màn hình\r\n\r\nThời gian phản hồi 0.2ms\r\nĐộ sáng tối đa 600nits HDR\r\nĐộ phủ màu 100% DCI-P3\r\nDisplay HDR True Black 600\r\n1.07 tỷ màu\r\nPANTONE Validated\r\nGlossy display\r\nGiảm ánh sáng xanh 70%\r\nPin\r\n\r\n75WHrs, 2S2P, 4-cell Li-ion\r\nHệ điều hành\r\n\r\nWindows 11 Home\r\nĐộ phân giải màn hình\r\n\r\n2880 x 1800 pixels', 1),
(18, 'Laptop MSI Creator Z16 A11UET-217VN\r\nI7-11800H/32GB/1TB PCIE/VGA 6GB RTX3060/16 QHD', 'CPU: I7-11800H\r\nRAM: 32 Gb, \r\nỔ cứng: 1T SSD\r\nVGA: NDIDIA 3060 6Gb\r\nMàn hình: 2k 120hz', '47990000', '10', 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/_/0/_0003_msi-creator-z16-a11uet-217vn-i7.jpg', 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/_/0/_0000_msi-creator-z16-a11uet-217vn-i7_1_.jpg', 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/_/0/_0001_msi-creator-z16-a11uet-217vn-i7_2_.jpg', 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/_/0/_0002_msi-creator-z16-a11uet-217vn-i7_3_.jpg', 30, 15, 1, 2, 2, 'Loại card đồ họa\r\n\r\nNVIDIA® GeForce RTX™ 3060 Max-Q 6GB\r\nDung lượng RAM\r\n\r\n32GB\r\nLoại RAM\r\n\r\n32GB (16GBx2) DDR4 3200MHz\r\nỔ cứng\r\n\r\n1TB SSD M.2 NVMe PCIe Gen4x4 (Còn trống 1 khe SSD M.2 NVMe PCIe Gen4)\r\nKích thước màn hình\r\n\r\n16 inches\r\nCông nghệ màn hình\r\n\r\nTần số quét 120Hz, DCI-P3 100%\r\nPin\r\n\r\n4 Cell 90WHr\r\nHệ điều hành\r\n\r\nWindows 10 Home SL\r\nĐộ phân giải màn hình\r\n\r\n2560 x 1600 pixels (2K)', 1),
(19, 'Bàn phím cơ có dây Dareu EK87 TKL', NULL, '799000', '20', 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/1/_/1_52_7.png', 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/2/_/2_33_5.png', 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/3/_/3_21_5.png', 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/4/_/4_17_6.png', 50, 40, 3, 8, 4, 'Tương thích\r\n\r\nWindows\r\nCách kết nối\r\n\r\nDây cắm USB\r\nĐộ dài dây / Khoảng cách kết nối\r\n\r\n1.8 m\r\nKích thước bàn phím\r\n\r\nTenkeyless\r\nĐèn nền LED\r\n\r\nCó\r\nHãng sản xuất\r\n\r\nDAREU\r\nTính năng khác\r\n\r\nD switch độ bền lên đến 50 triệu lần nhấn', 1),
(20, 'Bàn phím cơ AKKO Monsgeek MG75 Black & Cyan', NULL, '1099000', '10', 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/b/a/ban-phim-co-akko-monsgeek-mg75-black-cyan-2.png', 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/b/a/ban-phim-co-akko-monsgeek-mg75-black-cyan-4.png', 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/b/a/ban-phim-co-akko-monsgeek-mg75-black-cyan-5.png', 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/b/a/ban-phim-co-akko-monsgeek-mg75-black-cyan-7.png', 34, 12, 3, 12, 4, 'Số phím (bàn phím)\r\n\r\n82 phím\r\nKeycap (bàn phím)\r\n\r\nKeycap Cherry profile / PBT Double-Shot\r\nNút nhấn\r\n\r\nHỗ trợ NKRO / Multimedia / Macro / Khóa phím Win\r\nTương thích\r\n\r\nMacOS, Windows, Linux\r\nKết nối\r\n\r\nDây USB\r\nĐèn LED\r\n\r\nLED đơn sắc (Màu Trắng)\r\nTiện ích\r\n\r\nCấu trúc traymount / Stab Plate-mount (Akko v3 stab với nhiều cải tiến về chất lượng)\r\nCó APP Driver riêng\r\nLayout 75% rất hot hiện nay\r\nHãng sản xuất\r\n\r\nAKKO\r\nTính năng khác\r\n\r\nBàn phím khi kết nối với MacOS: (Ctrl -> Control | Windows -> Command | Alt -> Option, Mojave OS trở lên sẽ điều chỉnh được thứ tự của các phím này)', 1),
(21, 'Bàn phím Bluetooth Logitech Pebble K380S', NULL, '1199000', '5', 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/b/a/ban-phim-bluetooth-logitech-pebble-k380s-8.png', 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/b/a/ban-phim-bluetooth-logitech-pebble-k380s-9.png', 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/b/a/ban-phim-bluetooth-logitech-pebble-k380s-10.png', 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/b/a/ban-phim-bluetooth-logitech-pebble-k380s-11.png', 35, 13, 3, 9, 4, 'Loại bàn phím (bàn phím)\r\n\r\nMini-size\r\nNút nhấn\r\n\r\nHỗ trợ các phím đặc biệt: Hiển thị màn hình, tìm kiếm, quay lại, đọc chính tả bằng giọng nói, menu emoji, chụp màn hình\r\nTương thích\r\n\r\nMacOS, Windows, Linux\r\nKết nối\r\n\r\nBluetooth\r\nĐèn LED\r\n\r\nLED\r\nTiện ích\r\n\r\nCó thể ghép cặp lên đến 3 thiết bị\r\nCông nghệ Bluetooth tiết kiệm năng lượng\r\nHãng sản xuất\r\n\r\nLogitech', 1),
(22, 'Bàn phím cơ không dây AKKO 3068B Plus Prunus Lannesiana', NULL, '1590000', '8', 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/b/a/ban-phim-co-akko-3068b-plus-prunus-lannesiana-1.png', 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/b/a/ban-phim-co-akko-3068b-plus-prunus-lannesiana-9.png', 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/b/a/ban-phim-co-akko-3068b-plus-prunus-lannesiana-8.png', 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/b/a/ban-phim-co-akko-3068b-plus-prunus-lannesiana-7.png', 59, 11, 3, 12, 4, 'Số phím (bàn phím)\r\n\r\n68 phím\r\nKeycap (bàn phím)\r\n\r\nKeycap PBT Double-Shot, ASA profile\r\nNút nhấn\r\n\r\nHỗ trợ NKRO / Multimedia / Macro / Khóa phím Windows\r\nTương thích\r\n\r\nMacOS, Windows, Linux\r\nKết nối\r\n\r\nBluetooth, Dây USB to Type-C\r\nĐèn LED\r\n\r\nLED nền RGB (Backlit, dạng SMT bottom không cấn switch) với nhiều chế độ\r\nTiện ích\r\n\r\nCó lót tiêu âm (FOAM) EVA dày 3.5mm (nằm giữa plate và PCB)\r\nStab pre-lubed và được tinh chỉnh sẵn\r\nHỗ trợ thay nóng switch (hotswap, 5 pin, TTC hotswap socket)\r\nHãng sản xuất\r\n\r\nAKKO\r\nKết nối\r\n\r\nUSB Type C, có thể tháo rời\r\nBluetooth 5.0 (tối đa 3 thiết bị)\r\nWireless 2.4Ghz (1 trong 3)\r\nTính năng khác\r\n\r\nBàn phím AKKO khi kết nối với MacOS: (Ctrl -> Control | Windows -> Command | Alt -> Option, Mojave OS trở lên sẽ điều chỉnh được thứ tự của các phím này)', 1),
(23, 'Bàn phím Gaming Razer Ornata V3 X-Low Profile (RZ03-04470100-R3M1)', NULL, '1399000', '22', 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/i/m/image_15_3.png', 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/i/m/image_18_2.png', 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/i/m/image_16_4.png', 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/i/m/image_19_1.png', 23, 1, 3, 11, 4, 'Loại bàn phím (bàn phím)\r\n\r\nFull-size\r\nSố phím (bàn phím)\r\n\r\n104\r\nKeycap (bàn phím)\r\n\r\nNhựa ABS phủ UV - Low Profile\r\nTương thích\r\n\r\nMacOS, Windows\r\nKết nối\r\n\r\nDây USB\r\nĐèn LED\r\n\r\nRGB 1-zone 16.8M màu\r\nTương thích\r\n\r\nWindows, MacOS\r\nCách kết nối\r\n\r\nDây cắm USB\r\nKích thước bàn phím\r\n\r\nFullsize\r\nĐèn nền LED\r\n\r\nCó\r\nHãng sản xuất\r\n\r\nRazer\r\nKết nối\r\n\r\nUSB\r\nTính năng khác\r\n\r\nKeyswitch: Silent Membrane\r\nThông số kỹ thuật\r\n\r\nThông số kĩ thuật\r\n\r\nLoại bàn phím (bàn phím)\r\n\r\nFull-size\r\nSố phím (bàn phím)\r\n\r\n104\r\nKeycap (bàn phím)\r\n\r\nNhựa ABS phủ UV - Low Profile\r\nKết nối & Tương thích\r\n\r\nTương thích\r\n\r\nMacOS, Windows\r\nThông số kỹ thuật\r\n\r\nKết nối\r\n\r\nDây USB\r\nĐèn LED\r\n\r\nRGB 1-zone 16.8M màu\r\nChất liệu\r\n\r\nNhựa ABS\r\nTương thích\r\n\r\nWindows, MacOS\r\nCách kết nối\r\n\r\nDây cắm USB\r\nKích thước bàn phím\r\n\r\nFullsize\r\nĐèn nền LED\r\n\r\nCó\r\nThông tin hãng\r\n\r\nHãng sản xuất\r\n\r\nRazer\r\nThông số khác\r\n\r\nKết nối\r\n\r\nUSB\r\nTiện ích\r\n\r\nTính năng khác\r\n\r\nKeyswitch: Silent Membrane\r\nTHÔNG BÁO\r\n\r\n\r\nTên công ty (bắt buộc)\r\nTên quý khách (bắt buộc)\r\nSố điện thoại (bắt buộc)\r\nĐịa chỉ email (bắt buộc)\r\nSản phẩm bạn quan tâm:\r\n\r\nSố lượng:\r\n0\r\nNhập ghi chú ...\r\n\r\nNhận thông tin khuyến mãi\r\n\r\n\r\n\r\n\r\n\r\n\r\nTìm sản phẩm để so sánh\r\n\r\nNhập tên sản phẩm muốn so sánh\r\nBàn phím Gaming Asus TUF K1\r\nBàn phím Gaming Asus TUF K1\r\nGiá niêm yết: 990.000\r\n\r\nGiá khuyến mãi: 850.000\r\n\r\n+ Chọn để so sánh\r\nBàn phím Gaming Razer Ornata V3 X-Low Profile (RZ03-04470100-R3M1)\r\nBàn phím Gaming Razer Ornata V3 X-Low Profile (RZ03-04470100-R3M1)\r\nGiá niêm yết: 1.399.000\r\n\r\nGiá khuyến mãi: 790.000\r\n\r\n+ Chọn để so sánh\r\nBàn phím giả cơ Logitech G213 Prodigy RGB Gaming\r\nBàn phím giả cơ Logitech G213 Prodigy RGB Gaming\r\nGiá niêm yết: 1.149.000\r\n\r\nGiá khuyến mãi: 950.000\r\n\r\n+ Chọn để so sánh\r\nBàn phím giả cơ Gaming có dây Rapoo V50S LED \r\nBàn phím giả cơ Gaming có dây Rapoo V50S LED\r\nGiá niêm yết: 399.000\r\n\r\nGiá khuyến mãi: 299.000\r\n\r\n+ Chọn để so sánh\r\n\r\nLên đầu\r\n', 1),
(24, 'Chuột Gaming không dây Logitech G304 Lightspeed\r\n\r\n', NULL, '790000', '4', 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/t/_/t_i_xu_ng_36__2.png', 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/t/_/t_i_xu_ng_37_.png', 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/t/_/t_i_xu_ng_40_.png', 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/t/_/t_i_xu_ng_41__4.png', 33, 21, 2, 9, 4, NULL, 1),
(25, 'Chuột Gaming Razer Basilisk V3 RZ01-04000100-R3M1\r\n', NULL, '990000', '3', 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/_/0/_0003_chu_t_razer_basilisk_v3.jpg', 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/_/0/_0002_httpshybrismediaprod.blob.core.w_2_.jpg', 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/_/0/_0001_httpshybrismediaprod.blob.core.w_1_.jpg', 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/_/0/_0000_httpshybrismediaprod.blob.core.w.jpg', 67, 8, 2, 11, 4, NULL, 1),
(26, 'Chuột Gaming Logitech G502 Hero', NULL, '890000', '5', 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/3/c/3c42e4219bbaa920c07c54784edd6269.jpg', 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/b/a/ba03e617b265b70575b8cc0997635097.jpg', 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/c/h/chuot502den.jpg', 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/f/a/fab763309ba5fd53478e9dda2268c79a.jpg', 22, 2, 2, 9, 4, NULL, 1),
(27, 'Chuột Gaming có dây Asus TUF M3 Gen 2', NULL, '560000', '8', 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/t/u/tuf-m3-gen-2-7.png', 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/t/u/tuf-m3-gen-2-4.png', 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/t/u/tuf-m3-gen-2-3.png', 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/t/u/tuf-m3-gen-2-5.png', 33, 3, 2, 1, 4, NULL, 1),
(28, 'Chuột chơi game không dây Dareu EM911X RGB', NULL, '699000', '12', 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/c/h/chuot-choi-game-khong-day-dareu-em911x-rgb-2.png', 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/c/h/chuot-choi-game-khong-day-dareu-em911x-rgb-3.png', 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/c/h/chuot-choi-game-khong-day-dareu-em911x-rgb-6.png', 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/c/h/chuot-choi-game-khong-day-dareu-em911x-rgb-4.png', 22, 7, 2, 8, 4, NULL, 1),
(29, 'Tai nghe có dây Gaming ASUS ROG Cetra II Core', NULL, '1290000', '10', 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/t/a/tai-nghe-rog-cetra-ii-core_14_.png', 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/t/a/tai-nghe-rog-cetra-ii-core_15_.png', 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/t/a/tai-nghe-rog-cetra-ii-core_16_.png', 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/t/a/tai-nghe-rog-cetra-ii-core_17_.png', 32, 4, 4, 1, 4, NULL, 1),
(30, 'Tai nghe không dây chụp tai Gaming Logitech G435', NULL, '1690000', '10', 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/_/0/_0006_62591_tai_nghe_logitech_g435_lig_2_.jpg', 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/_/0/_0005_62591_tai_nghe_logitech_g435_lig_1_.jpg', 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/_/0/_0004_62591_tai_nghe_logitech_g435_lig.jpg', 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/_/0/_0003_62592_tai_nghe_logitech_g435_lig_3_.jpg', 40, 5, 4, 9, 4, NULL, 1),
(31, 'Tai nghe Gaming Asus Rog Strix Fusion 500', NULL, '1390000', '9', 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/a/s/asus_rog_strix_fusion_500_3.png', 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/a/s/asus_rog_strix_fusion_500_1.png', 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/a/s/asus_rog_strix_fusion_500_5.png', 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/a/s/asus_rog_strix_fusion_500_4.png', 44, 3, 4, 1, 4, NULL, 1),
(32, 'Tai nghe Gaming chụp tai Sony Inzone H9', NULL, '5850000', '15', 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/2/2/22_2_95.jpg', 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/2/5/25_1_96.jpg', 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/2/7/27_2_47.jpg', 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/2/4/24_115.jpg', 56, 3, 4, 13, 4, NULL, 1),
(33, 'Tai nghe không dây Gaming Sony INZONE Buds\r\n', NULL, '4290000', '12', 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/t/a/tai-nghe-khong-day-sony-inzone-buds_15_.png', 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/t/a/tai-nghe-khong-day-sony-inzone-buds_10_.png', 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/t/a/tai-nghe-khong-day-sony-inzone-buds_7_.png', 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/t/a/tai-nghe-khong-day-sony-inzone-buds_9_.png', 12, 2, 4, 13, 4, NULL, 1),
(34, 'Balo Laptop Divoom Pixoo Led BackPack 2022\r\n', NULL, '3000000', '16', 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/f/r/frame_1_68_.png', 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/b/a/balo-laptop-divoom-pixoo-led-backpack-2022-4.jpg', 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/b/a/balo-laptop-divoom-pixoo-led-backpack-2022-3.jpg', 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/b/a/balo-laptop-divoom-pixoo-led-backpack-2022-1.jpg', 21, 11, 5, 14, 4, NULL, 1),
(35, 'Balo laptop Kmore The Wesley Backpack 15.6 inch', NULL, '800000', '5', 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/b/a/balo-1_1.png', 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/b/a/balo-4_1.png', 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/b/a/balo-3_1.png', 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/b/a/balo-6_1.png', 35, 12, 5, 14, 4, NULL, 1),
(36, 'Balo Laptop WiWu Pilot BackPack', NULL, '649000', '5', 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/p/h/photo_2022-01-20_14-19-59.jpg', 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/p/h/photo_2022-01-20_14-20-00.jpg', 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/5/8/58_1_4.jpg', 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/5/9/59_1_5.jpg', 0, 33, 5, 14, 4, NULL, 1),
(37, 'Balo Laptop Tomtoc Slash Flip Backpack 16 inch', NULL, '1590000', '5', 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/1/_/1_578.png', 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/3/_/3_505.png', 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/6/_/6_338.png', 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/8/_/8_154.png', 90, 2, 5, 14, 4, NULL, 1),
(38, 'Balo laptop Tomtoc Premium Waterproof Casual cho MacBook 15-16 inch', NULL, '1590000', '7', 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/1/_/1_75_52.jpg', 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/3/_/3_60_35.jpg', 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/4/_/4_45_37.jpg', 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/2/_/2_69_38.jpg', 25, 5, 5, 14, 4, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `purpose`
--

CREATE TABLE `purpose` (
  `purpose_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `des` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `purpose`
--

INSERT INTO `purpose` (`purpose_id`, `name`, `des`) VALUES
(1, 'Laptop Văn phòng', 'Laptop được thiết kế để sử dụng trong môi trường văn phòng, tập trung vào hiệu suất làm việc và tuổi thọ pin.'),
(2, 'Laptop Đồ họa', 'Laptop chuyên dụng cho công việc đồ họa và sáng tạo, có hiệu suất đồ họa cao và màn hình chất lượng cao.'),
(3, 'Laptop Gaming', 'Laptop được tối ưu hóa cho trải nghiệm chơi game, có cấu hình mạnh mẽ và khả năng làm mát tốt.'),
(4, 'Phụ Kiện', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `rate` int(11) DEFAULT NULL,
  `comment` text DEFAULT NULL,
  `date_review` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`user_id`, `product_id`, `rate`, `comment`, `date_review`) VALUES
(1, 2, 5, 'Sản phẩm rất tốt, đáp ứng đủ nhu cầu gaming của tôi.', '2024-02-20'),
(2, 2, 4, 'Laptop này có thiết kế đẹp và hiệu suất mạnh mẽ.', '2024-02-21'),
(3, 2, 5, 'Màn hình 144Hz thật sự tuyệt vời cho trải nghiệm gaming.', '2024-02-22'),
(4, 2, 1, 'sản phẩm như cứt\r\n', NULL),
(4, 6, 4, 'không ngon lắm', '2024-02-29'),
(4, 10, 5, 'đẹp', '2024-02-29'),
(4, 18, 5, 'ok', '2024-02-29'),
(4, 23, 4, 'dùng được\r\n', '2024-02-29'),
(4, 36, 5, 'Balo dùng rất tốt đáng sử dụng', '2024-02-29'),
(4, 38, 5, 'ok', '2024-02-29'),
(11, 2, 1, 'Sản phẩm dùng như lồn đáng giá 1 sao', '2024-02-25'),
(11, 5, 5, 'tốt', '2024-02-28'),
(11, 7, 5, 'đẹp đáng mua', '2024-02-29'),
(11, 8, 5, 'tốt', '2024-02-29'),
(11, 9, 5, 'ngon\r\n', '2024-02-29');

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `type_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `des` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`type_id`, `name`, `des`) VALUES
(1, 'Laptop', 'Thiết bị máy tính xách tay.'),
(2, 'Chuột', 'Thiết bị nhập liệu cho máy tính, thường được sử dụng để di chuyển con trỏ trên màn hình.'),
(3, 'Bàn phím', 'Thiết bị nhập liệu cho máy tính, được sử dụng để nhập văn bản và các lệnh khác vào máy tính.'),
(4, 'Tai nghe', 'Thiết bị âm thanh được đeo vào đầu để nghe nhạc hoặc thực hiện cuộc gọi trên máy tính.'),
(5, 'Balo Laptop', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `xac_thuc` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `Address`, `phone`, `password`, `email`, `xac_thuc`) VALUES
(1, 'Nguyễn Văn A', '123 Đường ABC, Quận 1, Thành phố Hồ Chí Minh', '0901234567', 'password1', 'nguyenvana@example.com', 'Đã xác thực'),
(2, 'Trần Thị B', '456 Đường XYZ, Quận 2, Thành phố Hồ Chí Minh', '0909876543', 'password2', 'tranthib@example.com', 'Chưa xác thực'),
(3, 'Lê Văn C', '789 Đường MNO, Quận 3, Thành phố Hồ Chí Minh', '0905678901', 'password3', 'levanc@example.com', 'Đã xác thực'),
(4, 'hoang', 'ưeq', '1', '2', 'c@1.com', NULL),
(11, 'Trần Đức Cường', 'Đông Lĩnh, Đông Hưng, Thái Bình', '0971433912', '1', 'cuongtran01092000@gmail.com', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`user_id`,`product_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `order_product`
--
ALTER TABLE `order_product`
  ADD PRIMARY KEY (`order_product_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `type_id` (`type_id`),
  ADD KEY `brand_id` (`brand_id`),
  ADD KEY `purpose_id` (`purpose_id`);

--
-- Indexes for table `purpose`
--
ALTER TABLE `purpose`
  ADD PRIMARY KEY (`purpose_id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`user_id`,`product_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `order_product`
--
ALTER TABLE `order_product`
  MODIFY `order_product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `purpose`
--
ALTER TABLE `purpose`
  MODIFY `purpose_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `order_product`
--
ALTER TABLE `order_product`
  ADD CONSTRAINT `order_product_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`),
  ADD CONSTRAINT `order_product_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`type_id`) REFERENCES `type` (`type_id`),
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`brand_id`) REFERENCES `brand` (`brand_id`),
  ADD CONSTRAINT `product_ibfk_3` FOREIGN KEY (`purpose_id`) REFERENCES `purpose` (`purpose_id`);

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `review_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
