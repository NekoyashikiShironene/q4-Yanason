-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 15, 2024 at 11:08 PM
-- Server version: 10.6.18-MariaDB-0ubuntu0.22.04.1
-- PHP Version: 8.1.2-1ubuntu2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sec1_24`
--

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` varchar(50) NOT NULL,
  `title` varchar(50) NOT NULL,
  `credit` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `title`, `credit`) VALUES
('322236', 'WEB APPLICATION PROGRAMMING', 3),
('322431', 'WEB TECHNOLOGY', 3),
('322372', 'SYSTEMS ANALYSIS AND DESIGN', 3),
('322224', 'DIGITAL LOGIC AND COMPUTER INTERFACING', 3),
('322114', 'STRUCTURED PROGRAMMING', 3),
('322473', 'SOFTWARE DEVELOPMENT AND PROJECT MANAGEMENT', 3);

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `tid` int(11) NOT NULL,
  `ord_id` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`tid`, `ord_id`, `pid`, `quantity`) VALUES
(1, 1, 2, 2),
(2, 1, 3, 5),
(3, 1, 4, 1),
(4, 2, 1, 2),
(5, 2, 3, 4),
(6, 2, 4, 3),
(7, 3, 2, 3),
(8, 3, 4, 5),
(9, 4, 1, 5),
(10, 4, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(255) NOT NULL,
  `mobile` varchar(30) NOT NULL,
  `email` varchar(30) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`username`, `password`, `name`, `address`, `mobile`, `email`) VALUES
('somsak', 'blablabla', 'สมศักดิ์', 'ดาวศุกร์ เสาร์', '08-9446-9939', 's...5@email.kmutnb.ac.th'),
('baramee', 'aafff1', 'บารมี บุญหลาย', '123 ถ.วิภาวดีรังสิต กรุงเทพฯ', '08-9446-9955', 'baramee@gmail.com'),
('metasit', 'm345', 'เมธาสิทธิ์ สอนสั่ง', '98/9 ถ.ศรีจันทร์ จ.ขอนแก่น', '08-4456-9877', 'metasit@outlook.com'),
('4', 'asdasdasdasd', 'สมศักดิ์ สุรเสถียร', 'ดวงจันทร์', ' 08-9446-9912', 'blabla@gmail.com'),
('abc', 'asdasd', 'hello', 'asdasdasd', '08-9446-9933', 'somsak@gmail.com'),
('admin', 'admin', 'admin', 'admin', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `ord_id` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `ord_date` datetime NOT NULL,
  `status` enum('wait','pay','send','cancel') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`ord_id`, `username`, `ord_date`, `status`) VALUES
(1, 'baramee', '2013-07-16 23:25:14', 'wait'),
(2, 'metasit', '2013-02-12 23:25:40', 'pay'),
(3, 'baramee', '2013-12-27 23:26:44', 'send'),
(4, 'metasit', '2013-12-11 23:27:11', 'pay');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `pid` int(13) NOT NULL,
  `pname` varchar(255) NOT NULL,
  `pdetail` text NOT NULL,
  `price` int(4) NOT NULL,
  `remain` int(11) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pid`, `pname`, `pdetail`, `price`, `remain`) VALUES
(1, 'Centrum', 'วิตามินรวมจาก A ถึง Zinc', 350, 3),
(2, 'Caltrate', 'บำรุงกระดูก เสริมวิตามินดี', 760, 1),
(3, 'Ester-C', 'วิตามินซี 500 mg ไม่กัดกระเพาะ', 500, 1),
(4, 'Glucosamine', 'บำรุงข้อต่อ ป้องกันข้อเสื่อม', 1200, 1),
(17, 'PROPOLIZ', 'เม็ดอมบรรเทาอาการเจ็บคอจากธรรมชาติ 100%', 170, 17),
(19, 'asd', 'asd', 19, 11);

-- --------------------------------------------------------

--
-- Table structure for table `p_applying`
--

CREATE TABLE `p_applying` (
  `ord_id` int(11) NOT NULL,
  `promo_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `p_applying`
--

INSERT INTO `p_applying` (`ord_id`, `promo_id`) VALUES
(100001, 1),
(100001, 2),
(100003, 3),
(100004, 2),
(100005, 4);

-- --------------------------------------------------------

--
-- Table structure for table `p_cart`
--

CREATE TABLE `p_cart` (
  `cus_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `p_cart`
--

INSERT INTO `p_cart` (`cus_id`, `prod_id`, `quantity`) VALUES
(1, 1001, 2),
(1, 1009, 1),
(1, 1010, 4),
(2, 1002, 3),
(2, 1007, 1),
(2, 1020, 1),
(3, 1001, 2),
(4, 1005, 1),
(4, 1006, 2),
(4, 1011, 3),
(4, 1012, 4),
(5, 1003, 1),
(5, 1005, 1);

-- --------------------------------------------------------

--
-- Table structure for table `p_customer`
--

CREATE TABLE `p_customer` (
  `cus_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `tel` varchar(10) NOT NULL,
  `address` varchar(255) NOT NULL,
  `gender` tinyint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `p_customer`
--

INSERT INTO `p_customer` (`cus_id`, `username`, `password`, `name`, `tel`, `address`, `gender`) VALUES
(1, 'Pattara', 'Pass1234', 'ภัทรพล ปิ่นทอง', '0812345678', '123 ซอยสุขุมวิท 55, กรุงเทพมหานคร', 1),
(2, 'Siriluck', 'Secure5678', 'ศิริลักษณ์ สมบูรณ์', '0897654321', '88 ถนนพระราม 9, กรุงเทพมหานคร', 0),
(3, 'Anan', 'MyPass7890', 'อานนท์ จันทร์เพ็ญ', '0809876543', '56 หมู่ 2 ต.เชียงรากน้อย อ.สามโคก จ.ปทุมธานี', 1),
(4, 'Natthida', 'Password321', 'ณัฐธิดา รัตนวงศ์', '0871230987', '99 หมู่บ้านสวนหลวง, ชลบุรี', 0),
(5, 'Chatchai', 'Qwerty2021', 'ชาติชาย อินทร์แก้ว', '0823344556', '555/1 หมู่บ้านดอนเมือง, กรุงเทพมหานคร', 1),
(6, 'Somchai', 'abcd1234', 'สมชาย ทองดี', '0861239876', '222 ถนนพหลโยธิน, ปทุมธานี', 1),
(7, 'Wipha', 'secure789', 'วิภา แก้วกาญจนา', '0845674321', '76/2 หมู่บ้านลัดดา, สมุทรปราการ', 0),
(8, 'Arisa', 'welcome123', 'อริสา เจริญสุข', '0834567890', '200/3 หมู่บ้านนารา, ระยอง', 0),
(9, 'Prasit', 'pass4321', 'ประสิทธิ์ นามสกุลดี', '0819987765', '15/9 ถนนเพชรเกษม, เพชรบุรี', 1),
(10, 'Kanokwan', 'hello5678', 'กนกวรรณ มณีรัตน์', '0891234576', '250/4 ซอยลาดพร้าว 101, กรุงเทพมหานคร', 0),
(11, 'xxx_x', 'xxxx', 'ToTo CatDog', '0912345678', 'วงศ์สว่าง City', 1);

-- --------------------------------------------------------

--
-- Table structure for table `p_employee`
--

CREATE TABLE `p_employee` (
  `emp_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `p_employee`
--

INSERT INTO `p_employee` (`emp_id`, `username`, `password`, `name`) VALUES
(1, 'somchai_k', 'password123', 'สมชาย คงทน'),
(2, 'somsri_p', 'pass456', 'สมศรี ประทุม'),
(3, 'wichai_r', 'password789', 'วิชัย รุ่งเรือง'),
(4, 'ratree_s', 'ratree2023', 'ราตรี สวนดอก'),
(5, 'anon_j', 'anon_brown', 'อนันต์ ใจดี');

-- --------------------------------------------------------

--
-- Table structure for table `p_order`
--

CREATE TABLE `p_order` (
  `ord_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  `date_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `p_order`
--

INSERT INTO `p_order` (`ord_id`, `status_id`, `date_time`) VALUES
(100001, 1, '2024-09-22 18:02:06'),
(100002, 1, '2024-09-22 18:04:19'),
(100003, 1, '2024-09-22 18:04:19'),
(100004, 2, '2024-09-22 18:04:19'),
(100005, 2, '2024-09-22 18:04:19'),
(100006, 2, '2024-09-22 18:04:19'),
(100007, 2, '2024-09-22 18:04:19'),
(100008, 1, '2024-09-22 18:04:19'),
(100009, 1, '2024-09-22 18:04:19'),
(100010, 1, '2024-09-22 18:04:19'),
(100011, 2, '2025-09-22 14:35:50');

-- --------------------------------------------------------

--
-- Table structure for table `p_order_item`
--

CREATE TABLE `p_order_item` (
  `item_id` int(11) NOT NULL,
  `ord_id` int(11) NOT NULL,
  `cus_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `p_order_item`
--

INSERT INTO `p_order_item` (`item_id`, `ord_id`, `cus_id`, `prod_id`, `quantity`) VALUES
(1, 100001, 1, 1007, 1),
(2, 100001, 1, 1008, 1),
(3, 100002, 2, 1012, 2),
(4, 100003, 4, 1015, 2),
(5, 100004, 3, 1008, 2),
(6, 100005, 5, 1010, 1),
(7, 100006, 8, 1008, 1),
(8, 100007, 9, 1004, 3),
(9, 100008, 7, 1008, 3),
(10, 100009, 10, 1009, 2),
(11, 100010, 6, 1008, 2),
(12, 100011, 6, 1011, 2);

-- --------------------------------------------------------

--
-- Table structure for table `p_order_log`
--

CREATE TABLE `p_order_log` (
  `ord_id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `date_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `p_order_log`
--

INSERT INTO `p_order_log` (`ord_id`, `emp_id`, `date_time`) VALUES
(100004, 1, '2024-09-22 18:15:17'),
(100005, 4, '2024-09-22 18:15:17'),
(100006, 2, '2024-09-22 18:15:17'),
(100007, 1, '2024-09-22 18:15:17'),
(100007, 5, '2024-09-22 18:15:17');

-- --------------------------------------------------------

--
-- Table structure for table `p_product`
--

CREATE TABLE `p_product` (
  `prod_id` int(11) NOT NULL,
  `prod_name` varchar(50) NOT NULL,
  `category_id` int(11) NOT NULL,
  `brand` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `p_product`
--

INSERT INTO `p_product` (`prod_id`, `prod_name`, `category_id`, `brand`, `description`, `price`, `quantity`) VALUES
(1001, 'Lego City Police Station', 1, 'LEGO', 'Police station with 600 pieces', 2100, 25),
(1002, 'Lego Technic Sports Car', 1, 'LEGO', 'Technic Sports Car model with 800 pieces', 3200, 15),
(1003, 'Lego Ninjago Dragon', 1, 'LEGO', 'Ninjago Dragon set with 350 pieces', 14000, 30),
(1004, 'Lego Friends Tree House', 1, 'LEGO', 'Tree House set with 450 pieces', 1900, 20),
(1005, 'Lego Star Wars Millennium Falcon', 1, 'LEGO', 'Millennium Falcon model with 1000 pieces', 4500, 10),
(1006, 'Barbie Dreamhouse', 2, 'Mattel', 'Barbie Dreamhouse with 3 floors', 7000, 5),
(1007, 'American Girl Doll', 2, 'American Girl', 'American Girl Doll with customizable outfit', 3500, 10),
(1008, 'Disney Princess Elsa', 2, 'Disney', 'Frozen Elsa doll with light-up dress', 900, 35),
(1009, 'LOL Surprise Doll', 2, 'LOL Surprise', 'LOL Surprise Doll with 7 layers of surprises', 550, 50),
(1010, 'Baby Alive Doll', 2, 'Hasbro', 'Baby Alive doll with feeding accessories', 1100, 25),
(1011, 'Gundam RX-78-2 Model Kit', 3, 'Bandai', 'Gundam model kit with detailed parts', 1800, 20),
(1012, 'Star Wars AT-AT Model', 3, 'Revell', 'Star Wars AT-AT model with movable joints', 2900, 12),
(1013, 'Revell Titanic Model', 3, 'Revell', '1/700 scale Titanic model kit', 2200, 8),
(1014, 'Tamiya Ferrari F1 Model', 3, 'Tamiya', 'Ferrari F1 model with realistic decals', 3300, 15),
(1015, 'Metal Earth Eiffel Tower', 3, 'Metal Earth', 'Metal Earth 3D model of the Eiffel Tower', 480, 40),
(1016, 'Catan', 4, 'KOSMOS', 'Classic strategy board game of trading and building', 1600, 20),
(1017, 'Risk', 4, 'Hasbro', 'Board game of global domination', 1250, 18),
(1018, 'Clue', 4, 'Hasbro', 'Classic mystery board game', 900, 30),
(1019, 'Ticket to Ride', 4, 'Days of Wonder', 'Board game of railway adventure across America', 1800, 12),
(1020, 'Pandemic', 4, 'Z-Man Games', 'Cooperative board game where players fight global outbreaks', 1450, 15);

-- --------------------------------------------------------

--
-- Table structure for table `p_product_log`
--

CREATE TABLE `p_product_log` (
  `prod_id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `action_id` int(11) NOT NULL,
  `date_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `p_product_log`
--

INSERT INTO `p_product_log` (`prod_id`, `emp_id`, `action_id`, `date_time`) VALUES
(1001, 1, 1, '2024-09-22 17:54:07'),
(1001, 3, 3, '2024-09-22 17:54:07'),
(1002, 2, 1, '2024-09-22 17:54:07'),
(1002, 3, 3, '2024-09-22 17:54:07'),
(1003, 1, 2, '2024-09-22 17:54:07'),
(1003, 2, 2, '2024-09-22 17:54:07'),
(1004, 2, 1, '2024-09-22 17:54:07'),
(1005, 1, 2, '2024-09-22 17:54:07'),
(1006, 1, 1, '2024-09-22 17:54:07'),
(1007, 3, 3, '2024-09-22 17:54:07');

-- --------------------------------------------------------

--
-- Table structure for table `p_promotion`
--

CREATE TABLE `p_promotion` (
  `promo_id` int(11) NOT NULL,
  `promo_name` varchar(255) DEFAULT NULL,
  `code` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `p_promotion`
--

INSERT INTO `p_promotion` (`promo_id`, `promo_name`, `code`) VALUES
(1, 'Get 15% off purchases over 10000', NULL),
(2, 'New customers get 10% off', NULL),
(3, 'Buy 3 identical items and save 10%', NULL),
(4, '50% Discount', 'DISCNT50');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `std_id` varchar(50) NOT NULL,
  `course_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`std_id`, `course_id`) VALUES
('5001100348', '322236'),
('5001100348', '322114'),
('5001100348', '322224'),
('5001104807', '322236'),
('5001104807', '322431'),
('5001101634', '322236'),
('5001101634', '322431'),
('5001101811', '322236'),
('5001101811', '322224'),
('5001101811', '322114'),
('5001120060', '322372'),
('5001120060', '322114');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `std_id` varchar(50) NOT NULL,
  `std_name` varchar(50) NOT NULL,
  `province` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`std_id`, `std_name`, `province`) VALUES
('5001100348', 'นุชนารถ ขําทอง', 'ขอนแก่น'),
('5001104807', 'มัณฑนา ทองอยู่', 'เลย'),
('5001101634', 'จักรพงศ์ คนล่ํ่ำ', 'กรุงเทพฯ'),
('5001101811', 'นัยนา คําภู', 'ขอนแก่น'),
('5001102962', 'พรเทพ ชัยราชย์', 'อุดรธานี'),
('5001120060', 'มงคล บัวขาว', 'อุบลราชธานี'),
('5001130201', 'ชํานาญ  สุ่มนุช', 'นครราชสีมา');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`tid`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`ord_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `p_applying`
--
ALTER TABLE `p_applying`
  ADD PRIMARY KEY (`ord_id`,`promo_id`);

--
-- Indexes for table `p_cart`
--
ALTER TABLE `p_cart`
  ADD PRIMARY KEY (`cus_id`,`prod_id`),
  ADD KEY `prod_id` (`prod_id`);

--
-- Indexes for table `p_customer`
--
ALTER TABLE `p_customer`
  ADD PRIMARY KEY (`cus_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `p_employee`
--
ALTER TABLE `p_employee`
  ADD PRIMARY KEY (`emp_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `p_order`
--
ALTER TABLE `p_order`
  ADD PRIMARY KEY (`ord_id`);

--
-- Indexes for table `p_order_item`
--
ALTER TABLE `p_order_item`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `cus_id` (`cus_id`),
  ADD KEY `prod_id` (`prod_id`),
  ADD KEY `ord_id` (`ord_id`);

--
-- Indexes for table `p_order_log`
--
ALTER TABLE `p_order_log`
  ADD PRIMARY KEY (`ord_id`,`emp_id`),
  ADD KEY `emp_id` (`emp_id`);

--
-- Indexes for table `p_product`
--
ALTER TABLE `p_product`
  ADD PRIMARY KEY (`prod_id`);

--
-- Indexes for table `p_product_log`
--
ALTER TABLE `p_product_log`
  ADD PRIMARY KEY (`prod_id`,`emp_id`,`date_time`),
  ADD KEY `emp_id` (`emp_id`);

--
-- Indexes for table `p_promotion`
--
ALTER TABLE `p_promotion`
  ADD PRIMARY KEY (`promo_id`),
  ADD UNIQUE KEY `code` (`code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `tid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `ord_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `pid` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `p_customer`
--
ALTER TABLE `p_customer`
  MODIFY `cus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `p_employee`
--
ALTER TABLE `p_employee`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `p_order`
--
ALTER TABLE `p_order`
  MODIFY `ord_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100012;

--
-- AUTO_INCREMENT for table `p_order_item`
--
ALTER TABLE `p_order_item`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `p_product`
--
ALTER TABLE `p_product`
  MODIFY `prod_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1021;

--
-- AUTO_INCREMENT for table `p_promotion`
--
ALTER TABLE `p_promotion`
  MODIFY `promo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `p_applying`
--
ALTER TABLE `p_applying`
  ADD CONSTRAINT `p_applying_ibfk_1` FOREIGN KEY (`ord_id`) REFERENCES `p_order` (`ord_id`);

--
-- Constraints for table `p_cart`
--
ALTER TABLE `p_cart`
  ADD CONSTRAINT `p_cart_ibfk_1` FOREIGN KEY (`cus_id`) REFERENCES `p_customer` (`cus_id`),
  ADD CONSTRAINT `p_cart_ibfk_2` FOREIGN KEY (`prod_id`) REFERENCES `p_product` (`prod_id`);

--
-- Constraints for table `p_order_item`
--
ALTER TABLE `p_order_item`
  ADD CONSTRAINT `p_order_item_ibfk_1` FOREIGN KEY (`cus_id`) REFERENCES `p_customer` (`cus_id`),
  ADD CONSTRAINT `p_order_item_ibfk_2` FOREIGN KEY (`prod_id`) REFERENCES `p_product` (`prod_id`),
  ADD CONSTRAINT `p_order_item_ibfk_3` FOREIGN KEY (`ord_id`) REFERENCES `p_order` (`ord_id`);

--
-- Constraints for table `p_order_log`
--
ALTER TABLE `p_order_log`
  ADD CONSTRAINT `p_order_log_ibfk_1` FOREIGN KEY (`ord_id`) REFERENCES `p_order` (`ord_id`),
  ADD CONSTRAINT `p_order_log_ibfk_2` FOREIGN KEY (`emp_id`) REFERENCES `p_employee` (`emp_id`);

--
-- Constraints for table `p_product_log`
--
ALTER TABLE `p_product_log`
  ADD CONSTRAINT `p_product_log_ibfk_2` FOREIGN KEY (`emp_id`) REFERENCES `p_employee` (`emp_id`),
  ADD CONSTRAINT `p_product_log_ibfk_3` FOREIGN KEY (`prod_id`) REFERENCES `p_product` (`prod_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
