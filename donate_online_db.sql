-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Feb 05, 2024 at 12:32 PM
-- Server version: 5.7.39
-- PHP Version: 8.2.0

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
-- Table structure for table `banks`
--

CREATE TABLE `banks` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banks`
--

INSERT INTO `banks` (`id`, `name`, `deleted_at`) VALUES
(1, 'กสิกรไทย', NULL),
(2, 'กรุงเทพ', NULL),
(3, 'กรุงไทย', NULL),
(4, 'ไทยพาณิชย์', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `donate_types`
--

CREATE TABLE `donate_types` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `picture` text COLLATE utf8mb4_unicode_ci,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `donate_types`
--

INSERT INTO `donate_types` (`id`, `user_id`, `name`, `picture`, `deleted_at`) VALUES
(1, 30, 'Mechanic tool', NULL, NULL),
(2, 30, 'Food', NULL, NULL),
(3, 30, 'Clothes', NULL, NULL),
(4, 31, 'Items for children', NULL, NULL),
(8, 31, 'Test Name of donate 2', NULL, NULL),
(9, 37, 'Money', NULL, NULL),
(11, NULL, 'Test 1', NULL, NULL),
(13, 30, 'test3', NULL, '2024-02-02 23:03:46'),
(14, 40, 'Test Donate Type A', NULL, NULL),
(21, 30, '21test3444', 'image_example_items/Screenshot 2567-02-05 at 17.32.31.png', '2024-02-05 18:06:51'),
(22, 30, 'Box', 'image_example_items/large-storage-box-600x600.jpg', NULL);

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
(16, 'Test Name of donor recipient 2', '2024-01-14 15:04:46'),
(17, 'สนับสนุนเครื่องกรองน้ำและระบบน้ำดื่ม', '2024-01-14 15:09:37'),
(18, 'Test Donor Recipient', '2024-01-15 19:42:59');

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
(14, 30, 'การฝึกอบรมและการทำการเกษตรแบบธรรมชาติ', 'เราอบรมให้ครอบครัวมีความรู้และทักษะในการผลิตอาหารที่ปลอดภัยและดีต่อสุขภาพ เราฝึกอบรมครอบครัวและเกษตรกรเกี่ยวกับการทำเกษตรธรรมชาติ และการใช้สมุนไพรตามภูมิปัญญาท้องถิ่น และการดูแลรักษาเมล็ดพันธุ์ที่มีความหลากหลาย เราเปิดให้มีการแลกเปลี่ยนแนวทางปฏิบัติที่ดีที่สุดในการทำเกษตรปลอดภัยภายในและระหว่างชุมชนที่เราทำงานด้วย', '2023-12-28', 'image_event/776bc5e444ff6924f80b043c77866690e1a9e764.webp', NULL),
(16, 31, 'Test3', 'Test About Event3', '2024-01-17', 'image_event/Screenshot 2567-01-09 at 10.35.51.png', '2024-01-14 14:33:22'),
(17, 33, 'Event 3A2', '-', '2024-01-19', 'image_event/2150691309.jpg', NULL),
(18, 33, 'Event 3B', '-', '2024-01-17', '', '2024-01-15 19:36:48'),
(19, 38, 'Gotham Environment Developmen', 'Gottam เป็นเมืองที่เต็มไปด้วยอาคารทันสมัยและตึกสูงที่สวยงาม เมืองนี้มีความหลากหลายทั้งทางวัฒนธรรมและการบันเทิง กับสถานที่ท่องเที่ยวที่น่าสนใจอย่างสวนสาธารณะที่งดงามและห้างสรรพสินค้าที่ทันสมัย อากาศของ Gottam เต็มไปด้วยพลังงานและความเครียดต่ำ ทำให้มีชีวิตที่สงบสุขและมีความคล่องตัวสูง นักท่องเที่ยวทุกคนต้องพบกับประสบการณ์ที่ไม่เสมือนใครที่ Gottam ได้เสมอ', '2024-01-05', 'image_event/environmental-volunteers-1022925352-b686578cbf714d19803f373a7f61513a.jpg', NULL),
(20, 39, 'Event01', 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx', '2024-02-11', 'image_event/people.jpg', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `bank_id` int(11) DEFAULT NULL,
  `donor_recipient_type_id` int(11) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `donorname` varchar(255) DEFAULT NULL COMMENT 'ชื่อสถานรับบริจาค',
  `salt` varchar(30) NOT NULL,
  `picture` text,
  `subtitles` text,
  `status` varchar(1) NOT NULL DEFAULT '0',
  `contact` varchar(255) DEFAULT NULL,
  `location` text,
  `bank_account_fullname` varchar(255) DEFAULT NULL,
  `bank_account_number` varchar(255) DEFAULT NULL,
  `bank_account_qrcode` text,
  `is_admin` varchar(1) NOT NULL DEFAULT '0',
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `bank_id`, `donor_recipient_type_id`, `username`, `password`, `firstname`, `lastname`, `donorname`, `salt`, `picture`, `subtitles`, `status`, `contact`, `location`, `bank_account_fullname`, `bank_account_number`, `bank_account_qrcode`, `is_admin`, `deleted_at`) VALUES
(30, 1, 1, 'user1', '$2y$10$j.o/mQYyvFR7ComYSuUszeMHIrqHtxh3XBdTxR4geOUbbeqtdgMz2', 'ยูสเซอร์', 'ทดสอบ1', 'มูลนิธิร่วมบริจาค A', '7WoYbo1UdK3TntS', 'image_evd/ใบสำคัญแสดงการจดทะเบียน.png', '-', '1', '0923536333', '50 Ngamwongwan Rd, Lat Yao, Chatuchak, Bangkok 10900', 'ศิวัช โพธาราม', '557-2-16258-5', 'image_qrcode/398845.jpg', '0', NULL),
(31, 3, 2, 'user2', '$2y$10$rmDFzj9Ky87QwIWs/7T.POATTJeu6RJ6hpbzk38PD5S/4WP8rWkKi', 'ยูสเซอร์', 'ทดสอบ2', 'มูลนิธิร่วมบริจาค B', 'qMS3Mf6W51ARRfM', 'image_evd/CTF-800x800.jpg', 'ของขวัญที่ดีที่สุดคือของขวัญที่ผู้ให้เลือกด้วยความปรารถนาดีต่อผู้รับ ของขวัญที่ดีที่สุดของเด็กคนหนึ่งอาจเป็นสิ่งของหรูหราราคาแพง ของเล่นหรือแม้แต่เสื้อผ้าชุดใหม่ แต่ในโลกของเด็กยากไร้ อาจต้องการเพียงโอกาสที่จะช่วยให้ชีวิตพวกเขาเปลี่ยนแปลง เราขอร่วมเป็นส่วนหนึ่งในความเปลี่ยนแปลงนั้น', '1', 'moonnithi_b@gmail.com', '9/1 m5 Phahon Yothin Rd, Khlong Nueng, Khlong Luang District, Pathum Thani 12120', 'วิภาวี กันแก้ว', '557-2-16222-2', 'image_qrcode/398845.jpg', '0', NULL),
(32, NULL, 8, 'admin', '$2y$10$iQq65BQjkWXkgcLN6oNrzexUfBAuNM5DVVKT1PnbfgtdAoNoWjAPC', 'admin', 'admin', '-', 'Uyc7uuhz3Gf504Z', '-', '-', '1', '-', '-', NULL, NULL, NULL, '1', NULL),
(33, 1, 3, 'user3', '$2y$10$b8zwwTqOccOdbfw.4G4XCe90T8EGbyPNyoBbrHK5Ok8Xm3TXelV7S', 'ยูสเซอร์', 'ทดสอบ3', 'มูลนิธิร่วมบริจาค C', 'leXbEJaAtXSfFUa', 'image_evd/dsa.jpeg', '-', '1', 'moonnithi_c@gmail.com', '9/1 m5 Phahon Yothin Rd, Khlong Nueng, Khlong Luang District, Pathum Thani 12120', 'อรชา มหานคร', '557-216-2-123', 'image_qrcode/398845.jpg', '0', NULL),
(37, NULL, 8, 'user4', '$2y$10$RyxO3NaToSB6OJigr3YutOuhYQPU8BvIxAGCF8yt8lj9GdatKLyde', 'ยูสเซอร์', 'ทดสอบ4', 'มูลนิธิร่วมบริจาค E', 'IMtT2HLgzkHoKx6', 'image_evd/398845.jpg', '-', '1', 'moonnithi_b@gmail.com', 'Test Location Address users', NULL, NULL, NULL, '0', NULL),
(38, 1, 6, 'donate_1', '$2y$10$4su9Fv0i2V2czF4R5orFxetHken6Z08851ZFuNfs.B.DRxHunp5qq', 'tanapon', 'kitsangthong', 'ศูนย์บริจาคแห่งเมือง Gottam', 'O3t8JLTc20vZfIH', 'image_evd/เสื้อผ้าเด็ก.jpg', 'Gottam เป็นเมืองที่เต็มไปด้วยอาคารทันสมัยและตึกสูงที่สวยงาม เมืองนี้มีความหลากหลายทั้งทางวัฒนธรรมและการบันเทิง กับสถานที่ท่องเที่ยวที่น่าสนใจอย่างสวนสาธารณะที่งดงามและห้างสรรพสินค้าที่ทันสมัย อากาศของ Gottam เต็มไปด้วยพลังงานและความเครียดต่ำ ทำให้มีชีวิตที่สงบสุขและมีความคล่องตัวสูง นักท่องเที่ยวทุกคนต้องพบกับประสบการณ์ที่ไม่เสมือนใครที่ Gottam ได้เสมอ', '1', '091-772-0909', 'Gottam ถนนหมายเลข 44', 'Gottom Account', '7741-5571-8263', 'image_qrcode/coolcodes_QRcode_t600.jpg', '0', NULL),
(39, 3, 3, 'donate02', '$2y$10$JQn.Yv2x4XfolOWrIWgp2eue75KfFviVp20.c6yNN9N9iWX/AG9JC', 'ทศพล', 'กิจแสงทอง', 'มูลนิธิเพื่อเด็ก จังหวัดสระบุรี', 'CsFEJ142n80ryzZ', 'image_evd/ใบสำคัญแสดงการจดทะเบียน.png', 'มูลนิธิเพื่อเด็ก จังหวัดสระบุรี เป็นองค์กรที่มุ่งมั่นในการส่งเสริมและปกป้องสิทธิของเด็กในพื้นที่นี้ ด้วยการให้การสนับสนุนทางด้านการศึกษา, สุขภาพ, และพัฒนาบุคลิกภาพ เพื่อให้ทุกเด็กโตขึ้นมีโอกาสและประสบการณ์ที่ดีในชีวิต ด้วยทีมงานที่มีความมุ่งหวังและมีประสบการณ์, มูลนิธินี้หวังที่จะเป็นกำลังส่งเสริมแรงงานทางอาชีพของเด็กๆ ในสระบุรี, และผลักดันให้เด็กๆ มีอิทธิพลในชุมชนของตนเอง เพื่อสร้างอนาคตที่ยั่งยืนและมีคุณภาพสำหรับเยาวชนในภาคนี้.', '1', '091-772-4963', '101/9 ตำบล จีนัง อำเภอเมือง จังหวัด สระบุรี', 'มูลนิธิเพื่อเด็ก สระบุรี', '742-1863-9842', 'image_qrcode/fake QR code.png', '0', NULL),
(40, NULL, 7, 'user5', '$2y$10$Sb4krpdh6EefHV5VNDhNBeBgsVUc42hwqE6y6IHZ8U.WNtuEgE1V6', 'user5 f', 'user5 l', 'user5 Donor', 'GXNtYEK92QuN4Mp', 'image_evd/Screenshot 2567-01-25 at 11.21.24.png', 'test desc', '1', 'Test Contact users5', NULL, NULL, NULL, NULL, '0', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_donate_items`
--

CREATE TABLE `user_donate_items` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `req_user_id` int(11) DEFAULT NULL COMMENT 'ผู้ร้องขอจากทางเว็บไซต์',
  `donate_type_id` int(11) DEFAULT NULL,
  `status` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT '0=รอยืนยัน // 1=ยืนยัน // 2=ไม่ผ่าน',
  `donor_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'ชื่อผู้บริจาค',
  `donor_tel` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'ชื่อผู้บริจาค',
  `donor_contact` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'ชื่อผู้บริจาค',
  `donor_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'ชื่อผู้บริจาค',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'ชื่อสิ่งของ',
  `picture` text COLLATE utf8mb4_unicode_ci,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_donate_items`
--

INSERT INTO `user_donate_items` (`id`, `user_id`, `req_user_id`, `donate_type_id`, `status`, `donor_email`, `donor_tel`, `donor_contact`, `donor_name`, `name`, `picture`, `created_at`, `deleted_at`) VALUES
(44, 31, NULL, 3, '1', NULL, NULL, NULL, 'ทดสอบ ผู้บริจาค AA', 'เสื้อกันหนาว 3 ตัว', 'image_items/Screenshot 2567-01-14 at 13.24.54.png', '2024-01-14 13:25:46', NULL),
(45, 31, NULL, 4, '1', NULL, NULL, NULL, 'ทดสอบ ผู้บริจาค AA', 'ผ้าอ้อมเด็ก 10 ผืน', 'image_items/Screenshot 2567-01-14 at 13.25.24.png', '2024-01-14 13:25:46', NULL),
(46, 30, NULL, 2, '1', NULL, NULL, NULL, 'ไม่ประสงค์ออกนาม', 'บะหมี่กึ่งสำเร็จรูป 4 ลัง', 'image_items/Screenshot 2567-01-14 at 13.27.14.png', '2024-01-14 13:27:23', NULL),
(47, NULL, NULL, 1, '1', NULL, NULL, NULL, 'ทดสอบ ผู้บริจาค ABC', 'ชุดไขควง 5 ชุด', 'image_items/Screenshot 2567-01-14 at 15.17.16.png', '2024-01-14 15:18:00', NULL),
(48, 33, 33, 3, '1', NULL, NULL, NULL, 'ทดสอบ ผู้บริจาค ABC', 'เสื้อแขนยาว 2 ตัว', 'image_items/Screenshot 2567-01-14 at 13.24.54.png', '2024-01-14 15:18:00', NULL),
(51, 33, NULL, 2, '1', NULL, NULL, NULL, 'ไม่ประสงค์ออกนาม', 'ปลากระป๋อง 4 แพ็ค', 'image_items/Screenshot 2567-01-14 at 16.26.16.png', '2024-01-14 16:26:32', NULL),
(52, 30, 30, 9, '1', NULL, NULL, NULL, 'นาย ศิวัช โพธาราม', 'เงินสด 1000 บาท', 'image_items/414736249_1532555087539446_5810396954905457136_n.jpg', '2024-01-14 16:35:21', NULL),
(53, 33, NULL, 3, '1', NULL, NULL, NULL, 'ไม่ประสงค์ออกนาม', 'เสื้อยืด 5 ตัว', 'image_items/Screenshot 2567-01-14 at 13.24.54.png', '2024-01-15 19:33:05', NULL),
(54, 33, NULL, 2, '1', NULL, NULL, NULL, 'ไม่ประสงค์ออกนาม', 'หมูสด 8 กิโล', NULL, '2024-01-15 19:33:05', NULL),
(55, 30, 30, 9, '1', NULL, NULL, NULL, 'ทดสอบ ผู้บริจาค ABCD', 'เงินสด 10000 บาท', 'image_items/414736249_1532555087539446_5810396954905457136_n.jpg', '2024-01-15 19:34:18', NULL),
(56, 30, NULL, 4, '1', NULL, NULL, NULL, 'นาย ธนพล กิจแสงทอง', 'เสื้อผ้าเด็ก 1 ชุด', 'image_items/เสื้อผ้าเด็ก.jpg', '2024-01-20 20:20:33', NULL),
(57, 31, NULL, 4, '1', NULL, NULL, NULL, 'ไม่ประสงค์ออกนาม', 'เสื้อผ้าสำหรับเด็ก 1 ชุด', 'image_items/เสื้อผ้าเด็ก.jpg', '2024-01-20 20:41:56', NULL),
(58, 39, 39, 4, '1', NULL, NULL, NULL, 'ธนพล กิจแสงทอง', 'เสื้อผ้าสำหรับเด็ก 1 ชุด', 'image_items/เสื้อผ้าเด็ก.jpg', '2024-01-20 21:04:03', NULL),
(59, 38, 38, 1, '1', NULL, NULL, NULL, 'ธนพล กิจแสงทอง', 'อุปกรณ์การช่าง 1 ชุด', 'image_items/mechanic tool sets.jpg', '2024-01-20 21:06:58', NULL),
(60, 38, NULL, 1, '1', NULL, NULL, NULL, 'ธนพล กิจแสงทอง', 'อุปกรณ์การช่าง 1 ชุด', 'image_items/mechanic tool sets.jpg', '2024-01-20 21:14:02', NULL),
(61, 38, 38, 1, '1', NULL, NULL, NULL, 'ไม่ประสงค์ออกนาม', 'อุปกรณ์การช่าง 1 ชุด', 'image_items/mechanic tool sets.jpg', '2024-01-20 21:16:31', NULL),
(62, 38, 38, 1, '1', NULL, NULL, NULL, 'ไม่ประสงค์ออกนาม', 'อุปกรณ์การช่าง 3 3 ชุด', 'image_items/mechanic tool sets.jpg', '2024-01-20 21:18:43', NULL),
(63, 38, NULL, 1, '1', NULL, NULL, NULL, 'ไม่ประสงค์ออกนาม', 'อุปกรณ์การช่าง 69 6 ชุด', 'image_items/mechanic tool sets.jpg', '2024-01-20 21:27:07', NULL),
(64, 39, NULL, 4, '1', NULL, NULL, NULL, 'ไม่ประสงค์ออกนาม', 'เสื้อผ้าเด็ก 1 ชุด', 'image_items/เครื่องแบบ ชุดปกติขาว.png', '2024-01-27 21:50:13', NULL),
(65, NULL, NULL, 2, '1', NULL, NULL, NULL, 'นาย พูวะดน กิจแสงทอง', 'นมสำหรับเด็ก 1 กล่อง', 'image_items/นมสำหรับเด็ก.png', '2024-01-27 22:08:26', NULL),
(66, NULL, NULL, 3, '1', 'souppy.ttr@gmail.com', '0642594699', '@LINE: ss999', 'ไม่ประสงค์ออกนาม', 'บริจาค A 2 ชิ้น', NULL, '2024-02-03 00:56:31', NULL),
(67, 31, 31, 2, '1', 'souppy.ttr@gmail.com', '0642594699', '@LINE: ss999', 'ไม่ประสงค์ออกนาม', 'บริจาค AA 1 ตัว', NULL, '2024-02-03 00:56:31', NULL),
(68, 31, 31, 14, '1', 'sivuch999@gmail.com', '0642594699', '@LINE: ss999', 'ทดสอบ ผู้บริจาค ABC', 'เงินสด 1 บาท', NULL, '2024-02-03 01:12:50', NULL),
(69, NULL, NULL, NULL, '1', 'souppy@gmail.com', '0642594322', '@LINE: ss123', 'ไม่ประสงค์ออกนาม', 'เสื้อกันหนาว 2 ตัว', NULL, '2024-02-03 02:07:19', NULL),
(70, NULL, NULL, NULL, '1', 'souppy@gmail.com', '0642594322', '@LINE: ss123', 'ไม่ประสงค์ออกนาม', 'มาม่า 4 แพ็ค', NULL, '2024-02-03 02:07:19', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banks`
--
ALTER TABLE `banks`
  ADD PRIMARY KEY (`id`);

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
  ADD KEY `donor_recipient_type_id` (`donor_recipient_type_id`) USING BTREE,
  ADD KEY `bank_id` (`bank_id`);

--
-- Indexes for table `user_donate_items`
--
ALTER TABLE `user_donate_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `req_user_id` (`req_user_id`),
  ADD KEY `donate_type_id` (`donate_type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banks`
--
ALTER TABLE `banks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `donate_types`
--
ALTER TABLE `donate_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `donor_recipient_types`
--
ALTER TABLE `donor_recipient_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `user_donate_items`
--
ALTER TABLE `user_donate_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

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
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`donor_recipient_type_id`) REFERENCES `donor_recipient_types` (`id`),
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`bank_id`) REFERENCES `banks` (`id`);

--
-- Constraints for table `user_donate_items`
--
ALTER TABLE `user_donate_items`
  ADD CONSTRAINT `user_donate_items_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `user_donate_items_ibfk_2` FOREIGN KEY (`req_user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `user_donate_items_ibfk_3` FOREIGN KEY (`donate_type_id`) REFERENCES `donate_types` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
