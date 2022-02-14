-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th2 14, 2022 lúc 09:48 PM
-- Phiên bản máy phục vụ: 5.7.33
-- Phiên bản PHP: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `18`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill`
--

CREATE TABLE `bill` (
  `bill_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_address` varchar(300) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_phone` int(10) NOT NULL,
  `note` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `bill`
--

INSERT INTO `bill` (`bill_id`, `user_id`, `user_name`, `user_address`, `user_email`, `user_phone`, `note`) VALUES
(61, 1, 'Bình', 'BRVT,TX.PM', 'mailchoivui@hotmail.dog', 98262818, ''),
(62, 1, 'Bình', 'BRVT,TX.PM', 'mailchoivui@hotmail.dog', 98262818, '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill_detail`
--

CREATE TABLE `bill_detail` (
  `bill_id` int(11) NOT NULL,
  `product_details` json NOT NULL,
  `total` int(11) NOT NULL,
  `create_at` datetime NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `bill_detail`
--

INSERT INTO `bill_detail` (`bill_id`, `product_details`, `total`, `create_at`, `status`) VALUES
(61, '{\"5\": {\"size\": \"4oz\", \"quantity\": 5}, \"38\": {\"size\": \"2oz\", \"quantity\": 1}, \"40\": {\"size\": \"none\", \"quantity\": 1}}', 2342312, '2022-02-14 21:44:20', 'đã hủy'),
(62, '{\"7\": {\"size\": \"4oz\", \"quantity\": 2}, \"30\": {\"size\": \"4oz\", \"quantity\": 1}}', 2946666, '2022-02-14 21:45:55', 'đã duyệt');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `manufacturer`
--

CREATE TABLE `manufacturer` (
  `manufacturer_id` int(11) NOT NULL,
  `manufacturer_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `manufacturer`
--

INSERT INTO `manufacturer` (`manufacturer_id`, `manufacturer_name`) VALUES
(231, 'By Vilain'),
(230, 'Hanz de Fuko'),
(235, 'Kenvin Murphy'),
(227, 'Lockhart'),
(229, 'Morgan'),
(238, 'ok\''),
(232, 'Tony'),
(228, 'Valiant');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `manufacturer_id` int(11) NOT NULL,
  `product_image` varchar(200) NOT NULL,
  `price` int(11) NOT NULL,
  `description` text NOT NULL,
  `product_size` varchar(20) NOT NULL,
  `type_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `manufacturer_id`, `product_image`, `price`, `description`, `product_size`, `type_id`) VALUES
(5, 'Lockhart UWB Goon Grease', 227, '1644086849.jpg', 400000, 'Dung tích: 104g<br /><br /><br /><br /><br /><br /><br /><br /><br />\r\nSản xuất: thủ công tại Mỹ<br /><br /><br /><br /><br /><br /><br /><br /><br />\r\nThương hiệu: LOCKHART\'S AUTHENTIC', '4oz', 98),
(7, 'Lockhart Goon Grease', 227, '1644086882.jpg', 1333333, 'dsfgă', '4oz', 98),
(30, 'Valiant Matte Paste', 228, '1644087180.jfif', 280000, 'ofasdmopas', '4oz', 100),
(37, 'Morgan Oudh and Amber', 229, '1644261211.jpg', 312321, 'daoids', '4oz', 98),
(38, 'Hanz de Fuko Modify Pomade', 230, '1644261306.jpg', 312312, '32313', '2oz', 100),
(40, 'Lược Tony', 232, '1644436651.jpg', 30000, 'Lược xịn vcl', 'none', 102),
(45, '123', 231, '1644869213.PNG', 500000, 'quas ok', '4oz,500ml', 98);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `staff`
--

CREATE TABLE `staff` (
  `staff_id` int(11) NOT NULL,
  `staff_name` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `staff_email` varchar(50) NOT NULL,
  `staff_phone` int(10) NOT NULL,
  `staff_birthday` date NOT NULL,
  `staff_password` varchar(20) NOT NULL,
  `staff_address` text NOT NULL,
  `level` int(1) NOT NULL,
  `token` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `staff`
--

INSERT INTO `staff` (`staff_id`, `staff_name`, `gender`, `staff_email`, `staff_phone`, `staff_birthday`, `staff_password`, `staff_address`, `level`, `token`) VALUES
(2, 'Po', 'Female', 'cocaiqq@hotmail.cc', 831233233, '2012-03-01', 'cocaiqqamanhin', 'Owr dau hoi cai deo gi', 0, '61db3a54ad05c4.225961181641757268'),
(6, 'Pi', 'np2s', 'mspodas@fsmdp.dmopasmd', 987865233, '2134-11-19', '123456789', 'fmáodmpá', 0, NULL),
(7, 'Amdó', 'male', 'admin@hot.poi', 937281783, '3013-01-01', '123', 'dksmpđoa', 1, '620acd9b74eb20.829068241644875163'),
(9, 'Pqe', 'Female', 'mdopsa@dspaod.dasopd', 938371273, '0331-01-01', '1234567', 'fosakdpoasd', 0, '620abaf5f21fa5.664600451644870389');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `type`
--

CREATE TABLE `type` (
  `type_id` int(11) NOT NULL,
  `type_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `type`
--

INSERT INTO `type` (`type_id`, `type_name`) VALUES
(98, 'Pomade'),
(100, 'Wax'),
(101, 'Pre-styler'),
(102, 'Phụ kiện'),
(103, 'dầu dưỡng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `user_phone` int(10) NOT NULL,
  `user_address` varchar(300) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_password` varchar(20) NOT NULL,
  `user_birthday` date NOT NULL,
  `token` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `gender`, `user_phone`, `user_address`, `user_email`, `user_password`, `user_birthday`, `token`) VALUES
(1, 'Bình', 'nam', 98262818, 'BRVT,TX.PM', 'mailchoivui@hotmail.dog', 'codeoa', '2003-11-01', '620abb0a4b7fb4.409889131644870410'),
(2, 'dsad', 'Male', 837382821, 'dioasds', 'dnasd@dsad.cmas', '4103832', '2015-01-01', NULL),
(3, 'Binh', 'on', 987654332, 'HCM', 'dangkychoivui@hotmail.dog', '123', '2000-11-03', '620ab2253856c3.556649001644868133');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`bill_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `bill_detail`
--
ALTER TABLE `bill_detail`
  ADD KEY `bill_id` (`bill_id`);

--
-- Chỉ mục cho bảng `manufacturer`
--
ALTER TABLE `manufacturer`
  ADD PRIMARY KEY (`manufacturer_id`),
  ADD UNIQUE KEY `manufacturer_name` (`manufacturer_name`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `manufacturer_id` (`manufacturer_id`),
  ADD KEY `type_id` (`type_id`);

--
-- Chỉ mục cho bảng `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_id`);

--
-- Chỉ mục cho bảng `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`type_id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bill`
--
ALTER TABLE `bill`
  MODIFY `bill_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT cho bảng `manufacturer`
--
ALTER TABLE `manufacturer`
  MODIFY `manufacturer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=240;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT cho bảng `staff`
--
ALTER TABLE `staff`
  MODIFY `staff_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `type`
--
ALTER TABLE `type`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `bill`
--
ALTER TABLE `bill`
  ADD CONSTRAINT `bill_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Các ràng buộc cho bảng `bill_detail`
--
ALTER TABLE `bill_detail`
  ADD CONSTRAINT `bill_detail_ibfk_1` FOREIGN KEY (`bill_id`) REFERENCES `bill` (`bill_id`);

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`manufacturer_id`) REFERENCES `manufacturer` (`manufacturer_id`),
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`type_id`) REFERENCES `type` (`type_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
