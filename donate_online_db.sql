-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jan 05, 2024 at 03:06 PM
-- Server version: 5.7.39
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `donate_online_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `donate_types`
--

CREATE TABLE `donate_types` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `donate_types`
--

INSERT INTO `donate_types` (`id`, `name`, `deleted_at`) VALUES
(1, 'Mechanic tool', NULL),
(2, 'Food', NULL),
(3, 'Clothes', NULL),
(4, 'Items for children', NULL),
(5, 'Test', '2023-12-24 11:15:14'),
(6, 'Test2', '2023-12-24 11:15:13');

-- --------------------------------------------------------

--
-- Table structure for table `donor_recipient_types`
--

CREATE TABLE `donor_recipient_types` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `donor_recipient_types`
--

INSERT INTO `donor_recipient_types` (`id`, `name`, `deleted_at`) VALUES
(1, 'Community-Based Organizations', NULL),
(2, 'Educational Organizations', NULL),
(3, 'Health Organizations', NULL),
(4, 'Religious Organizations', NULL),
(5, 'Arts and Culture Organizations', NULL),
(6, 'Environmental Organizations', NULL),
(7, 'Social Services Organizations', NULL),
(8, 'Charitable Organizations', NULL),
(9, 'test', '2023-12-24 11:15:06'),
(11, 'Testja', '2023-12-24 11:15:10'),
(12, 'test', '2023-12-24 11:15:08');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(255) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `subtitles` text NOT NULL,
  `date` date NOT NULL,
  `bg_event` text NOT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `user_id`, `name`, `subtitles`, `date`, `bg_event`, `deleted_at`) VALUES
(7, 30, 'สนับสนุนเครื่องกรองน้ำและระบบน้ำดื่ม', 'น้ำนับเป็นสิ่งจำเป็นที่ขาดไปไม่ได้ในชีวิตประจำวัน ด้วยแรงแบ่งปันจากทุกท่าน ทางมูลนิธิฯ ได้ช่วยสนับสนุนเครื่องกรองน้ำและระบบน้ำดื่มให้กับโรงเรียนบ้านห้วยไคร้ อ.ผาขาว จ.เลย หลังจากที่ก่อนหน้านี้แหล่งน้ำส่วนใหญ่ในพื้นที่ไม่ผ่านเกณฑ์คุณภาพที่สามารถดื่มได้\r\n\r\n“ตอนนี้พวกเราไม่ต้องซื้อน้ำดื่ม และไม่ต้องนำน้ำดื่มมาจากบ้านแล้วค่ะ โรงเรียนของพวกเรามีเครื่องกรองน้ำดื่มสะอาด”', '2023-12-31', 'image_event/8ce324b0dfb98ce89335526676e78f3a5f2efd64.webp', NULL),
(8, 30, 'น้องต้นข้าวได้รับการสนับสนุนไก่ไข่ไว้กิน และใช้จำหน่าย', 'จากภาวะโรคระบาดโควิด 19 ทำให้หลายครอบครัวต้องสูญเสียงานประจำ เช่นเดียวกับคุณแม่ของน้อง “ต้นข้าว” เด็กในความอุปการะโครงการฯ...... ที่ต้องตกงาน ทำให้ทั้งครอบครัวขาดรายได้ แต่ด้วยน้ำใจจากทุกท่าน ครอบครัวของน้องต้นข้าวได้รับการสนับสนุนไก่ไข่ เพื่อสามารถเก็บไข่ไว้กิน และใช้จำหน่ายเสริมควบคู่ไปกับขนมจีนรสมือคุณยาย\r\n\r\n“ยายหนูขายขนมจีนนะคะ จานละ 10 บาท มีไข่ต้มเก็บใหม่จากเล้าใบละแค่ 5 บาทค่ะ”', '2024-01-05', 'image_event/8a584c7d410fecb91be62617635dbd4f0d4c1f2d.webp', NULL),
(10, 30, 'การเสริมสร้างทักษะชีวิตที่จำเป็น', 'การฝึกอบรมที่ออกแบบมาเพื่อให้เยาวชนมีการคิดวิเคราะห์ ทักษะการสื่อสาร การแก้ปัญหา การจัดการอารม การสร้างความสัมพันธ์ และทักษะความรับผิดชอบต่อสังคม เราให้ผู้ปกครอง และผู้ดูแลเป็นส่วนหนึ่งของระบบสนับสนุนโดยเฉพาะอย่างยิ่งในระหว่างการฝึกอบรม', '2024-01-12', 'image_event/1ddebe171c3314db8f65d58ea64f7ab77b275bd3.webp', NULL),
(11, 31, 'รายงานผลการดำเนินงานต่างๆ ตามวาระ', 'การฝึกอบรมที่ออกแบบมาเพื่อฝึกทักษะด้านการเกษตรหรือการประกอบอาชีพของเยาวชน และให้การฝึกอบรมเกี่ยวกับการออม การจัดการทางการเงิน และการลงทุน นอกจากนี้เรายังออกแบบโปรแกรมการฝึกงานเพื่อเชื่อมโยงเยาวชนที่ผ่านการฝึกอบรมเข้ากับสถาบันวิชาชีพ กลุ่มธุรกิจ และสถาบันการศึกษา เพื่อใหโอกาสในการดำรงชีวิตและทุนการศึกษา', '2024-01-05', 'image_event/dde1166a48f4d58c965784111995772bf478ee00.webp', NULL),
(12, 31, 'การพัฒนาการทำงานเป็นทีมและทักษะการเป็นผู้นำ', 'การเตรียมให้วัยรุ่นมีทักษะการเป็นผู้นำเพื่อให้พวกเขาสามารถเป็นตัวแทนของชุมชนและจังหวัดของตนในเวทีเยาวชนแห่งชาติและเวทีระดับชาติอื่นๆ เราจัดให้มีสภาเยาวชนในพื้นที่โครงการของเรา เพื่อเสริมสร้างให้พวกเขาสามารถทำงานได้โดยมีเครือข่ายและความร่วมมือที่แข็งแกร่งกับสภาเยาวชนอื่นๆ เพื่อให้พวกเขาสามารถมีส่วนร่วมในการเปลี่ยนแปลงนโยบายการพัฒนา และการดำเนินการกับสถาบันที่เกี่ยวข้องทั้งในระดับจังหวัด ระดับภูมิภาค และระดับประเทศ\r\n\r\n', '2024-01-29', 'image_event/a73d0d0f982d144a7bf9b39c5e62ff39aa05aada.webp', NULL),
(14, 30, 'การฝึกอบรมและการทำการเกษตรแบบธรรมชาติ', 'เราอบรมให้ครอบครัวมีความรู้และทักษะในการผลิตอาหารที่ปลอดภัยและดีต่อสุขภาพ เราฝึกอบรมครอบครัวและเกษตรกรเกี่ยวกับการทำเกษตรธรรมชาติ และการใช้สมุนไพรตามภูมิปัญญาท้องถิ่น และการดูแลรักษาเมล็ดพันธุ์ที่มีความหลากหลาย เราเปิดให้มีการแลกเปลี่ยนแนวทางปฏิบัติที่ดีที่สุดในการทำเกษตรปลอดภัยภายในและระหว่างชุมชนที่เราทำงานด้วย', '2023-12-28', 'image_event/776bc5e444ff6924f80b043c77866690e1a9e764.webp', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `donor_recipient_type_id` int(11) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `donorname` varchar(255) NOT NULL COMMENT 'ชื่อสถานรับบริจาค',
  `salt` varchar(30) NOT NULL,
  `picture` text NOT NULL,
  `subtitles` text NOT NULL,
  `status` varchar(1) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `location` text NOT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `donor_recipient_type_id`, `username`, `password`, `firstname`, `lastname`, `donorname`, `salt`, `picture`, `subtitles`, `status`, `contact`, `location`, `deleted_at`) VALUES
(30, 1, 'user1', '$2y$10$j.o/mQYyvFR7ComYSuUszeMHIrqHtxh3XBdTxR4geOUbbeqtdgMz2', 'ยูสเซอร์', 'ทดสอบ1', 'มูลนิธิร่วมบริจาค A', '7WoYbo1UdK3TntS', 'image_evd/ใบสำคัญแสดงการจดทะเบียน.png', '-', '1', '0923536333', '50 Ngamwongwan Rd, Lat Yao, Chatuchak, Bangkok 10900', NULL),
(31, 2, 'user2', '$2y$10$rmDFzj9Ky87QwIWs/7T.POATTJeu6RJ6hpbzk38PD5S/4WP8rWkKi', 'ยูสเซอร์', 'ทดสอบ2', 'มูลนิธิร่วมบริจาค B', 'qMS3Mf6W51ARRfM', 'image_evd/CTF-800x800.jpg', 'ของขวัญที่ดีที่สุดคือของขวัญที่ผู้ให้เลือกด้วยความปรารถนาดีต่อผู้รับ ของขวัญที่ดีที่สุดของเด็กคนหนึ่งอาจเป็นสิ่งของหรูหราราคาแพง ของเล่นหรือแม้แต่เสื้อผ้าชุดใหม่ แต่ในโลกของเด็กยากไร้ อาจต้องการเพียงโอกาสที่จะช่วยให้ชีวิตพวกเขาเปลี่ยนแปลง เราขอร่วมเป็นส่วนหนึ่งในความเปลี่ยนแปลงนั้น', '1', 'moonnithi_b@gmail.com', '9/1 m5 Phahon Yothin Rd, Khlong Nueng, Khlong Luang District, Pathum Thani 12120', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_donate_types`
--

CREATE TABLE `user_donate_types` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `donate_type_id` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_donate_types`
--

INSERT INTO `user_donate_types` (`id`, `user_id`, `donate_type_id`, `deleted_at`) VALUES
(4, 30, 1, NULL),
(5, 30, 2, NULL),
(6, 30, 3, NULL),
(7, 30, 4, NULL),
(8, 31, 3, NULL),
(9, 31, 4, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `donate_types`
--
ALTER TABLE `donate_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donor_recipient_types`
--
ALTER TABLE `donor_recipient_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD UNIQUE KEY `PRIMARY_ID` (`id`) USING BTREE,
  ADD KEY `donor_recipient_type_id` (`donor_recipient_type_id`) USING BTREE;

--
-- Indexes for table `user_donate_types`
--
ALTER TABLE `user_donate_types`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `donate_type_id` (`donate_type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `donate_types`
--
ALTER TABLE `donate_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `donor_recipient_types`
--
ALTER TABLE `donor_recipient_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `user_donate_types`
--
ALTER TABLE `user_donate_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`donor_recipient_type_id`) REFERENCES `donor_recipient_types` (`id`);

--
-- Constraints for table `user_donate_types`
--
ALTER TABLE `user_donate_types`
  ADD CONSTRAINT `user_donate_types_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `user_donate_types_ibfk_2` FOREIGN KEY (`donate_type_id`) REFERENCES `donate_types` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
