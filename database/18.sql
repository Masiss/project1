-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th1 08, 2022 lúc 12:09 PM
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
  `user_phone` int(10) NOT NULL,
  `note` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `bill`
--

INSERT INTO `bill` (`bill_id`, `user_id`, `user_name`, `user_address`, `user_phone`, `note`) VALUES
(1, 1, 'Bình', 'BRVT,TX.PM', 321321312, 'gsgsdhshsfhf'),
(2, 1, 'Binh', 'PM', 123654789, 'codeoamahoi');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill_detail`
--

CREATE TABLE `bill_detail` (
  `bill_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `bill_detail`
--

INSERT INTO `bill_detail` (`bill_id`, `product_id`, `quantity`, `status`) VALUES
(1, 5, 5, 'đã duyệt'),
(2, 7, 10, 'đã duyệt');

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
(140, '321'),
(149, 'Chó'),
(148, 'Có chó nó làm'),
(139, 'Co deo ma hoi'),
(112, 'ddd'),
(121, 'dqwdqw'),
(125, 'dqwwqeqw'),
(108, 'dsadad'),
(124, 'dwqeqw'),
(145, 'e1e312'),
(146, 'eqeqeqe'),
(126, 'eqweqe'),
(143, 'ewqeqwe'),
(147, 'Masiss'),
(16, 'náiodnóad'),
(119, 'Nguyễn Hữu Bình'),
(129, 'qeqwee'),
(136, 'qqqq'),
(123, 'weqweq'),
(111, 'đấ');

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
  `product_size` varchar(5) NOT NULL,
  `type_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `manufacturer_id`, `product_image`, `price`, `description`, `product_size`, `type_id`) VALUES
(5, '321213', 148, '1641643500.PNG', 3333, 'nf lay di dcm\r\n', 'SSSR2', 65),
(7, 'Có đéo á', 140, '1640670134.PNG', 321321312, 'dsfgă', '123ád', 55);

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
  `level` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `staff`
--

INSERT INTO `staff` (`staff_id`, `staff_name`, `gender`, `staff_email`, `staff_phone`, `staff_birthday`, `staff_password`, `staff_address`, `level`) VALUES
(2, 'Po', 'np2s', 'cocaiqq@hotmail.cc', 987865211, '2012-03-01', 'cocaiqqamanhin', 'Owr dau hoi cai deo gi', 0),
(3, 'Pu', 'np2s', 'dkasm@dnoasd.moasmd', 373927482, '0033-03-03', 'dmasdmapsd', 'mdpaosmdpamd', 0),
(5, 'Binhf', 'Male', 'rw@fasd.ndiosamd', 937382271, '2113-02-01', 'dwqeqeqew', 'dsadadwqe', 0),
(6, 'Pi', 'Female', 'mspodas@fsmdp.dmopasmd', 987865233, '2134-11-19', '123456789', 'fmáodmpá', 0);

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
(1, 'dsadasdas'),
(2, 'dsadasdas'),
(3, 'dsadasdas'),
(4, '3231'),
(5, '3231'),
(6, '3231'),
(7, '3231'),
(8, '3231'),
(9, '3231'),
(10, '3231'),
(11, '3231'),
(12, '3231'),
(13, '3231'),
(14, '3231'),
(15, '3231'),
(16, '3231'),
(17, '3231'),
(18, '3231'),
(19, '3231'),
(20, '3231'),
(21, '3231'),
(22, '3231'),
(23, '3231'),
(24, '3231'),
(25, '3231'),
(26, ''),
(27, ''),
(28, 'dsadwe'),
(29, 'dsadwe'),
(30, ''),
(31, 'dsdads'),
(32, ''),
(33, ''),
(34, ''),
(35, ''),
(36, ''),
(37, ''),
(38, ''),
(39, ''),
(40, 'dasd'),
(41, 'dasd'),
(42, ''),
(43, ''),
(44, ''),
(45, '12311232'),
(46, '12311232'),
(47, '12311232'),
(48, 'dqeqwe'),
(49, 'dqeqwe'),
(50, 'fqweqwe'),
(51, 'wqqwr'),
(52, 'dasdsad'),
(53, 'dsadasdas'),
(54, '111111'),
(55, '231312'),
(56, 'faosmfpasf'),
(57, ''),
(58, ''),
(59, '321'),
(60, 'rqweqeq'),
(61, '2323132'),
(62, 'ffasdsad'),
(63, 'ffasdsad'),
(64, 'wqeewqe'),
(65, '123');

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
  `user_birthday` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `gender`, `user_phone`, `user_address`, `user_email`, `user_password`, `user_birthday`) VALUES
(1, 'Bình', 'nam', 98262818, 'BRVT,TX.PM', 'mailchoivui@hotmail.dog', 'codeoa', '2003-11-01');

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
  MODIFY `bill_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `manufacturer`
--
ALTER TABLE `manufacturer`
  MODIFY `manufacturer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=150;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `staff`
--
ALTER TABLE `staff`
  MODIFY `staff_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `type`
--
ALTER TABLE `type`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`manufacturer_id`) REFERENCES `manufacturer` (`manufacturer_id`),
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`type_id`) REFERENCES `type` (`type_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
