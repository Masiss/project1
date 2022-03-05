-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th3 05, 2022 lúc 12:23 PM
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
  `note` text,
  `total` int(11) NOT NULL,
  `create_at` datetime NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `bill`
--

INSERT INTO `bill` (`bill_id`, `user_id`, `user_name`, `user_address`, `user_email`, `user_phone`, `note`, `total`, `create_at`, `status`) VALUES
(73, 1, 'Bình', 'Hafnoying', 'mailchoivui@hotmail.dog', 98262818, '', 592321, '2022-02-24 18:51:27', 1),
(74, 1, 'Bình', 'Hafnoying', 'mailchoivui@hotmail.dog', 98262818, '', 312321, '2022-02-24 19:40:05', 3),
(75, 1, 'Bình', 'Hafnoying', 'mailchoivui@hotmail.dog', 98262818, '', 560000, '2022-02-24 19:58:28', 3),
(76, 1, 'Bình', 'Hafnoying', 'mailchoivui@hotmail.dog', 98262818, '', 312321, '2022-02-25 08:00:16', 1),
(77, 8, 'Poooooo', 'ifjaofmaspofas/oasnfoiasnfpasmp', 'alooooo@foaisnfoas.com', 193758478, '421471249', 340624, '2022-02-26 12:25:36', 1),
(78, 1, 'Bình', 'Hafnoying', 'mailchoivui@hotmail.dog', 98262818, '', 1078303, '2022-03-05 12:15:49', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill_detail`
--

CREATE TABLE `bill_detail` (
  `bill_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `bill_detail`
--

INSERT INTO `bill_detail` (`bill_id`, `product_id`, `quantity`) VALUES
(73, 30, 1),
(73, 37, 1),
(74, 37, 1),
(75, 30, 2),
(76, 37, 1),
(77, 30, 1),
(77, 37, 1),
(78, 30, 1),
(78, 130, 1),
(78, 131, 1),
(78, 126, 1);

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
(244, '312312312'),
(243, 'Blumaan'),
(231, 'By Vilain'),
(230, 'Hanz de Fuko'),
(235, 'Kenvin Murphy'),
(227, 'Lockhart'),
(229, 'Morgan'),
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
  `type_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `manufacturer_id`, `product_image`, `price`, `description`, `product_size`, `type_id`) VALUES
(30, 'Valiant Matte Paste', 228, '1644087180.jfif', 28303, 'ofasdmopas', '4oz', '100'),
(37, 'Morgan Oudh and Amber', 229, '1644261211.jpg', 312321, 'daoids', '4oz', '98'),
(40, 'Lược Tony', 232, '1644436651.jpg', 30000, 'Lược xịn vcl', 'none', '102'),
(126, 'FIFTH SAMPLE POMADE ', 243, '1645879011.5oz_opensmallsize_720x', 450000, 'Switch out your greasy, waxy, and ultra-shiny gels for BluMaan’s NEW 2.5oz jar Fifth Sample Pomade, a high-hold, low shine product created with versatility in mind. Designed for any weather, even humid conditions and sweaty gyms, this pomade will make your hairstyle last all day.', '4oz', '98'),
(127, 'HYBRID CREAM CLAY', 243, '1645879069.jpg', 500000, 'Hybrid Cream Clay is a hand-crafted formula, combining both cream and clay to utilize the best aspects of each. It’s creamy texture provides a smooth, comfortable application and the clay leaves the hair with a natural matte finish. Great for those who want to achieve relaxed and messy styles.', '4oz', '104'),
(128, 'CAVALIER HEAVY CLAY', 243, '1645879166.jpg', 450000, 'BluMaan’s Cavalier Clay works with your hair to create extreme texture and all-day hold. From the classic to the creative, you can count on the Cavalier’s heavy hold to make your hairstyle last all day (or two!) without a need to reapply. Its denser consistency allows it to control coarse, wavy and thick hair. It also nourishes and strengthens your hair with organic oils, natural proteins and amino acids.', '4oz', '104'),
(129, 'CAVALIER HEAVY CLAY', 243, '1645879166.jpg', 500000, 'BluMaan’s Cavalier Clay works with your hair to create extreme texture and all-day hold. From the classic to the creative, you can count on the Cavalier’s heavy hold to make your hairstyle last all day (or two!) without a need to reapply. Its denser consistency allows it to control coarse, wavy and thick hair. It also nourishes and strengthens your hair with organic oils, natural proteins and amino acids.', '4.5oz', '104'),
(130, 'Valiant Matte Paste', 228, '1644087180.jfif', 250000, 'ofasdmopas', '4oz', '100,103'),
(131, 'Valiant Matte Paste', 228, '1644087180.jfif', 350000, 'ofasdmopas', '8oz', '100,103'),
(132, 'Morgan Oudh and Amber', 229, '1644261211.jpg', 500000, 'daoids', '4oz', '98'),
(133, 'Morgan Oudh and Amber', 229, '1644261211.jpg', 250000, 'daoids', '1oz', '98'),
(136, 'Hanz de Fuko Modify Pomade', 230, '1644261306.jpg', 312312, '32313', '2oz', '100'),
(137, 'Hanz de Fuko Modify Pomade', 230, '1644261306.jpg', 500000, '32313', '4oz', '100');

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
(2, 'Po', 'Female', 'cocaiqq@hotmail.cc', 831233233, '2012-03-01', '123', 'alooooooo', 0, '61db3a54ad05c4.225961181641757268'),
(6, 'Pi', 'np2s', 'mspodas@fsmdp.dmopasmd', 987865233, '2134-11-19', '123456789', 'dsadsadaf,dasjdsapd.fasfasd', 0, NULL),
(7, 'Amdó', 'male', 'admin@hot.poi', 937281783, '3013-01-01', '123', 'dksmpđoa', 1, '622354d1ed3eb4.468023021646482641'),
(9, 'Pqe', 'Female', 'mdopsa@dspaod.dasopd', 938371273, '0331-01-01', '1234567', 'fosakdpoasd', 0, '622354d5dd3a06.095739281646482645'),
(10, 'daodads', 'Male', 'dasd@diad.dad', 392812492, '2000-02-03', '123', 'fnsafioasfo', 0, NULL);

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
(103, 'dầu dưỡng'),
(104, 'Clay');

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
(1, 'Bình', 'np2s', 98262818, 'Hafnoying', 'mailchoivui@hotmail.dog', '123', '2003-11-01', '6223544079d280.652934661646482496'),
(2, 'dsad', 'Male', 837382821, 'dioasds', 'dnasd@dsad.cmas', '4103832', '2015-01-01', NULL),
(7, 'dsdpdpm', 'Female', 123452819, 'dasoidaspmd', 'qwety@hotpc.123', '123', '2200-01-31', '6217f81ad5b157.449833661645738010'),
(8, 'Poooooo', 'Female', 193758472, 'fisofiaofifonl,fasihfoaf', 'alooooo@foaisnfoas.com', '123', '1999-03-11', '621a1c821fe0d2.773092191645878402');

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
  ADD KEY `bill_id` (`bill_id`),
  ADD KEY `product_id` (`product_id`);

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
  ADD KEY `manufacturer_id` (`manufacturer_id`);

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
  MODIFY `bill_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT cho bảng `manufacturer`
--
ALTER TABLE `manufacturer`
  MODIFY `manufacturer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=245;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138;

--
-- AUTO_INCREMENT cho bảng `staff`
--
ALTER TABLE `staff`
  MODIFY `staff_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `type`
--
ALTER TABLE `type`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
  ADD CONSTRAINT `bill_detail_ibfk_1` FOREIGN KEY (`bill_id`) REFERENCES `bill` (`bill_id`),
  ADD CONSTRAINT `bill_detail_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`manufacturer_id`) REFERENCES `manufacturer` (`manufacturer_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
