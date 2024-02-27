-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 27, 2024 at 03:59 PM
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
(7, 'Acer', 'Hãng sản xuất laptop nổi tiếng, cung cấp dòng sản phẩm phù hợp cho gaming, văn phòng và đồ họa.');

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

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`user_id`, `product_id`, `number`, `total`) VALUES
(4, 2, 1, '11484000.00');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `total_price` decimal(10,2) DEFAULT NULL,
  `order_date` date DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `total_price`, `order_date`, `address`, `name`, `phone`, `state`) VALUES
(1, NULL, NULL, NULL, 'Thái Bịnh', 'Trần Đức Cường', '0971433911', NULL),
(2, NULL, NULL, NULL, 'Thái Bịnh', 'Trần Đức Cường', '0971433911', NULL),
(3, NULL, NULL, '2024-02-27', '123', 'Trần Đức Cường', '21312123123', NULL),
(4, 4, '33182566.16', '2024-02-27', '3', '1', '2', 'pending'),
(5, 4, '11484000.00', '2024-02-27', 'Thái Bình', 'Trần Đức Cường', '0971433911', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `order_product`
--

CREATE TABLE `order_product` (
  `order_product_id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `number` int(11) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_product`
--

INSERT INTO `order_product` (`order_product_id`, `order_id`, `product_id`, `number`, `price`) VALUES
(3, 5, 2, 1, '11484000.00');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `discount` decimal(5,2) DEFAULT NULL,
  `image_link_1` varchar(255) DEFAULT NULL,
  `image_link_2` varchar(255) DEFAULT NULL,
  `image_link_3` varchar(255) DEFAULT NULL,
  `image_link_4` varchar(255) DEFAULT NULL,
  `number` int(11) DEFAULT NULL,
  `number_buy` int(11) DEFAULT NULL,
  `type_id` int(11) DEFAULT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `purpose_id` int(11) DEFAULT NULL,
  `description1` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `name`, `description`, `price`, `discount`, `image_link_1`, `image_link_2`, `image_link_3`, `image_link_4`, `number`, `number_buy`, `type_id`, `brand_id`, `purpose_id`, `description1`) VALUES
(2, 'Laptop Acer Nitro 5 AN515-58-57QW - Intel Core i5-12450H | RAM 16GB | Nvidia RTX 3050Ti | 15.6 Inch Full HD 144Hz', 'CPU: Intel Core i5 12500H\nRAM: 8GB\nỔ cứng: 512GB SSD\nVGA: NVIDIA RTX3050 4G\nMàn hình: 15.6 inch FHD 144Hz', '14355000.00', '20.00', 'https://res.cloudinary.com/doxa1jpq0/image/upload/v1708857519/acer1_qfezyh.jpg', 'https://res.cloudinary.com/doxa1jpq0/image/upload/v1708858877/acer4_bgznby.jpg', 'https://res.cloudinary.com/doxa1jpq0/image/upload/v1708858877/acer2_qnvx9b.jpg', 'https://res.cloudinary.com/doxa1jpq0/image/upload/v1708858877/acer3_zqcpla.jpg', 50, 35, 1, 7, 3, 'CPU: i511400H2.7GHz\r\nRAM: 8 GBDDR4 2 khe (1 khe 8 GB + 1 khe rời)3200 MHz \r\nỔ cứng: Hỗ trợ thêm 1 khe cắm SSD M.2 PCIe mở rộng (nâng cấp tối đa 1 TB)Hỗ trợ khe cắm HDD SATA (nâng cấp tối đa 2 TB)512 GB SSD NVMe PCIe \r\nMàn hình: 15.6\"Full HD (1920 x 1080) 144Hz\r\nCard màn hình: Card rờiGTX 1650 4GB\r\nCổng kết nối:USB Type-CLAN (RJ45)Jack tai nghe 3.5 mmHDMI3 x USB 3.2 \r\nĐặc biệt: Có đèn bàn phím \r\nHệ điều hành: Windows 11 Home SL \r\nThiết kế: Vỏ nhựa Kích thước, khối lượng: Dài 363.4 mm - Rộng 255 mm - Dày 23.9 mm - Nặng 2.2 kg \r\nThời điểm ra mắt: 2021'),
(3, 'Laptop Acer Nitro 5 AN515-58-57QW - Intel Core i5-12450H | RAM 16GB | Nvidia RTX 3050Ti | 15.6 Inch Full HD 144Hz', '', '12456788.00', '18.00', 'acer1.jpeg', NULL, NULL, NULL, 34, 34, 1, 7, 1, NULL);

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
(3, 'Laptop Gaming', 'Laptop được tối ưu hóa cho trải nghiệm chơi game, có cấu hình mạnh mẽ và khả năng làm mát tốt.');

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
(5, 2, 1, 'sadasdasda', '2024-02-26'),
(11, 2, 1, 'Sản phẩm dùng như lồn đáng giá 1 sao', '2024-02-25'),
(11, 3, 1, 'như vứt', '2024-02-26');

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
(4, 'Tai nghe', 'Thiết bị âm thanh được đeo vào đầu để nghe nhạc hoặc thực hiện cuộc gọi trên máy tính.');

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
(4, 'hoàng ngu', 'ưeq', '1', '2', 'c@1.com', NULL),
(5, '1', NULL, '2', '3', NULL, NULL),
(7, NULL, NULL, '4', '4', NULL, NULL),
(8, NULL, NULL, '5', '5', NULL, NULL),
(9, NULL, NULL, '0971433911', '1', NULL, NULL),
(10, NULL, NULL, '0929562911', '1', NULL, NULL),
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
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `order_product`
--
ALTER TABLE `order_product`
  MODIFY `order_product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `purpose`
--
ALTER TABLE `purpose`
  MODIFY `purpose_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
