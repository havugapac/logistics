-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 07, 2019 at 08:22 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hr`
--

-- --------------------------------------------------------

--
-- Table structure for table `airtimes`
--

CREATE TABLE `airtimes` (
  `air_id` int(4) NOT NULL,
  `worker_id` int(4) NOT NULL,
  `month` varchar(10) NOT NULL,
  `year` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `airtimes`
--

INSERT INTO `airtimes` (`air_id`, `worker_id`, `month`, `year`) VALUES
(1, 3, '07', '2019'),
(2, 1, '07', '2019'),
(3, 27, '07', '2019'),
(4, 29, '07', '2019'),
(5, 31, '07', '2019'),
(6, 3, '08', '2019'),
(7, 1, '08', '2019'),
(8, 31, '08', '2019'),
(9, 31, '09', '2019'),
(10, 3, '09', '2019');

-- --------------------------------------------------------

--
-- Table structure for table `ap_car`
--

CREATE TABLE `ap_car` (
  `apc_id` int(4) NOT NULL,
  `worker_id` int(4) NOT NULL,
  `car_id` int(4) NOT NULL,
  `dato` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ap_item`
--

CREATE TABLE `ap_item` (
  `ap_id` int(11) NOT NULL,
  `itemname` varchar(100) NOT NULL,
  `qnty` int(100) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `is_read` int(100) NOT NULL,
  `ptimess` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ap_item`
--

INSERT INTO `ap_item` (`ap_id`, `itemname`, `qnty`, `user_id`, `is_read`, `ptimess`) VALUES
(2, '4', 6, '1', 1, '2019-08-15 01:21:18'),
(3, '3', 4, '3', 1, '2019-08-15 01:21:18'),
(4, '6', 3, '27', 1, '2019-08-15 01:21:18'),
(5, '7', 7, '1', 1, '2019-08-15 02:14:32'),
(6, '2', 6, '1', 1, '2019-08-15 02:26:18'),
(7, '3', 3, '1', 1, '2019-08-15 02:21:23'),
(8, '6', 1, '1', 1, '2019-08-15 02:38:45'),
(9, '5', 8, '1', 1, '2019-08-15 02:50:03'),
(10, '6', 4, '1', 1, '2019-08-15 02:58:38'),
(11, '5', 8, '1', 1, '2019-08-15 02:59:44'),
(12, '2', 3, '1', 1, '2019-08-15 03:00:33');

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `car_id` int(4) NOT NULL,
  `car_model` varchar(20) NOT NULL,
  `plate_nber` varchar(20) NOT NULL,
  `akazi` varchar(10) NOT NULL,
  `datee` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`car_id`, `car_model`, `plate_nber`, `akazi`, `datee`) VALUES
(1, 'prado', 'rac345', 'traveling', ''),
(2, 'rava4', 'rad123', 'traveling', ''),
(3, 'rangerover', 'rac432', 'traveling', ''),
(5, 'gikeri', 'rac438', 'done', 'Fri-16-Aug-2019'),
(6, 'Audi', 'RAA455X', 'traveling', 'Fri-16-Aug-2019'),
(7, 'MAZDA', 'RAA459X', 'done', 'Fri-16-Aug-2019'),
(8, 'aline', 'rac4312', 'traveling', 'Mon-26-Aug-2019');

-- --------------------------------------------------------

--
-- Table structure for table `contracts`
--

CREATE TABLE `contracts` (
  `contract_id` int(200) NOT NULL,
  `worker_id` int(60) NOT NULL,
  `contract` varchar(255) NOT NULL,
  `user_id` int(20) NOT NULL,
  `status` varchar(40) NOT NULL,
  `timess` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contracts`
--

INSERT INTO `contracts` (`contract_id`, `worker_id`, `contract`, `user_id`, `status`, `timess`) VALUES
(1, 1, '15285061_10154799517028833_3015201235725199157_n.jpg', 0, 'normal', '2019-07-05 15:33:56'),
(5, 1, '20170914_162754.jpg', 1, 'normal', '2019-07-05 15:40:31'),
(6, 45, '20170919_140439.jpg', 1, 'normal', '2019-07-05 22:56:31'),
(7, 45, '20170922_140407.jpg', 1, 'normal', '2019-07-05 22:57:03'),
(8, 49, '20170915_132310.jpg', 0, 'normal', '2019-07-06 16:46:52'),
(9, 49, '20170915_132310.jpg', 0, 'normal', '2019-07-06 16:47:31'),
(10, 49, '15285061_10154799517028833_3015201235725199157_n.jpg', 1, 'normal', '2019-07-06 16:54:06'),
(11, 1, 'IMG-20190510-WA0010.jpg', 1, 'normal', '2019-07-07 23:07:25'),
(12, 49, '20171016_124727.jpg', 1, 'normal', '2019-07-08 10:30:47'),
(13, 49, '20171016_124727.jpg', 1, 'normal', '2019-07-08 10:30:48');

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `ID` int(11) NOT NULL,
  `District_Name` varchar(20) NOT NULL,
  `prov_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`ID`, `District_Name`, `prov_id`) VALUES
(1, 'Gicumbi', 4),
(2, 'Burera', 4),
(3, 'Rulindo', 4),
(4, 'Gakenke', 4),
(5, 'Musanze', 4),
(6, 'Bugesera', 2),
(7, 'Gatsibo', 2),
(8, 'Kayonza', 2),
(9, 'Kirehe', 2),
(10, 'Ngoma', 2),
(11, 'Nyagatare', 2),
(12, 'Rwamagana', 2),
(13, 'Gasabo', 1),
(14, 'Kicukiro', 1),
(15, 'Nyarugenge', 1),
(16, 'Gisagara', 5),
(17, 'Huye', 5),
(18, 'Kamonyi', 5),
(19, 'Muhanga', 5),
(20, 'Nyamagabe', 5),
(21, 'Nyanza', 5),
(22, 'Nyaruguru', 5),
(23, 'Ruhango', 5),
(24, 'Karongi', 3),
(25, 'Ngororero', 3),
(26, 'Nyabihu', 3),
(27, 'Nyamasheke', 3),
(28, 'Rubavu', 3),
(29, 'Rusizi', 3),
(30, 'Rutsiro', 3);

-- --------------------------------------------------------

--
-- Table structure for table `functions`
--

CREATE TABLE `functions` (
  `f_id` int(60) NOT NULL,
  `worker_id` int(20) NOT NULL,
  `functions` varchar(60) NOT NULL,
  `net_salary` varchar(60) NOT NULL,
  `type` varchar(60) NOT NULL,
  `user_id` int(20) NOT NULL,
  `status` varchar(40) NOT NULL,
  `timess` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `dates` varchar(66) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `functions`
--

INSERT INTO `functions` (`f_id`, `worker_id`, `functions`, `net_salary`, `type`, `user_id`, `status`, `timess`, `dates`) VALUES
(1, 1, 'CEO', '300000', 'admin', 1, 'normal', '2019-08-20 06:11:53', ''),
(3, 3, 'recieptionist', '300000', 'driver', 1, 'normal', '2019-08-17 09:06:39', ''),
(9, 9, 'worker', '5990', 'employee', 1, 'normal', '2019-08-14 11:00:13', '03/07/2019'),
(23, 27, 'public relation', '50000', 'logistic', 1, 'normal', '2019-08-14 11:38:31', ''),
(24, 28, 'Gutwara', '40000', 'employee', 1, 'normal', '2019-08-16 17:11:27', '16/08/2019'),
(25, 29, 'cleaner', '20000', 'employee', 1, 'normal', '2019-08-16 17:54:16', '16/08/2019'),
(26, 31, 'Gutwara', '2122', 'driver', 1, 'normal', '2019-08-16 18:04:54', '16/08/2019'),
(27, 32, 'cleaners', '15000', 'employee', 1, 'normal', '2019-08-17 09:18:15', '17/08/2019'),
(28, 31, 'veto', '200000', 'employee', 1, 'normal', '2019-08-25 08:04:57', '25/08/2019');

-- --------------------------------------------------------

--
-- Table structure for table `given_items`
--

CREATE TABLE `given_items` (
  `given_id` int(4) NOT NULL,
  `worker_id` int(4) NOT NULL,
  `item_id` int(4) NOT NULL,
  `quantity` varchar(10) NOT NULL,
  `confirmation` text NOT NULL,
  `month` varchar(100) NOT NULL,
  `year` varchar(100) NOT NULL,
  `date` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `given_items`
--

INSERT INTO `given_items` (`given_id`, `worker_id`, `item_id`, `quantity`, `confirmation`, `month`, `year`, `date`) VALUES
(10, 2, 2, '', '', '', '', ''),
(11, 1, 5, '', 'yes', '', '', ''),
(14, 1, 7, '2', '', '', '', ''),
(16, 1, 10, '2', '', 'Aug', '2019', ''),
(18, 29, 3, '1', '', 'Aug', '2019', ''),
(19, 31, 5, '3', '', 'Aug', '2019', ''),
(20, 29, 4, '3', '', '', '', 'Fri-16-Aug-2019'),
(21, 3, 5, '2', '', '', '', 'Sat-17-Aug-2019'),
(24, 1, 12, '5', '', 'Aug', '2019', 'Tue-20-Aug-2019'),
(25, 31, 15, '5', '', 'Aug', '2019', 'Mon-26-Aug-2019'),
(26, 1, 15, '2', 'yes', 'Aug', '2019', 'Mon-26-Aug-2019'),
(27, 31, 14, '4', '', 'Aug', '2019', 'Mon-26-Aug-2019'),
(28, 3, 3, '3', 'no', 'Sep', '2019', 'Tue-03-Sep-2019'),
(29, 1, 9, '3', 'no', 'Sep', '2019', 'Tue-03-Sep-2019'),
(30, 1, 2, '2', 'no', 'Sep', '2019', 'Tue-03-Sep-2019'),
(31, 1, 15, '4', 'no', 'Sep', '2019', 'Tue-03-Sep-2019'),
(32, 27, 1, '5', 'no', 'Sep', '2019', 'Tue-03-Sep-2019');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `item_id` int(4) NOT NULL,
  `item_name` varchar(25) NOT NULL,
  `item_number` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`item_id`, `item_name`, `item_number`) VALUES
(1, 'flash disk 8gb', 25),
(2, 'laptops hp', 16),
(3, 'multisockets', 18),
(4, 'cars', 24),
(5, 'iki', 73),
(6, 'muzee', 0),
(7, 'inka', 5),
(8, 'kuki', 8),
(9, 'munzee', 2),
(10, 'inkia', 3),
(11, 'inkia', 5),
(12, 'yewe', 23),
(13, 'trse', 32),
(14, 'dfg', 19),
(15, 'water', 189);

-- --------------------------------------------------------

--
-- Table structure for table `outoforder`
--

CREATE TABLE `outoforder` (
  `out_id` int(4) NOT NULL,
  `item_id` int(4) NOT NULL,
  `item_numb` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `provinces`
--

CREATE TABLE `provinces` (
  `ID` int(11) NOT NULL,
  `Provincename` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `provinces`
--

INSERT INTO `provinces` (`ID`, `Provincename`) VALUES
(1, 'Kigali City'),
(2, 'Eastern'),
(3, 'Western'),
(4, 'Northern'),
(5, 'Southern');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `req_id` int(5) NOT NULL,
  `worker_id` varchar(100) NOT NULL,
  `red_title` varchar(100) NOT NULL,
  `content` varchar(1000) NOT NULL,
  `status` varchar(10) NOT NULL,
  `date1` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sector`
--

CREATE TABLE `sector` (
  `ID` int(11) NOT NULL,
  `sector_name` varchar(20) NOT NULL,
  `dist_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sector`
--

INSERT INTO `sector` (`ID`, `sector_name`, `dist_id`) VALUES
(1, 'Bukure', 1),
(2, 'Bwisige', 1),
(3, 'Byumba', 1),
(4, 'Cyumba', 1),
(5, 'Giti', 1),
(6, 'Kaniga', 1),
(7, 'Manyagiro', 1),
(8, 'Miyove', 1),
(9, 'Kageyo', 1),
(10, 'Mukarange', 1),
(11, 'Muko', 1),
(12, 'Mutete', 1),
(13, 'Nyamiyaga', 1),
(14, 'Rubaya', 1),
(15, 'Rukomo', 1),
(16, 'Rushaki', 1),
(17, 'Rutare', 1),
(18, 'Ruvune', 1),
(19, 'Rwamiko', 1),
(20, 'Shangasha', 1),
(21, 'Nyankenke', 1),
(22, 'Bugwe', 2),
(23, 'Butaro', 2),
(24, 'Cyanika', 2),
(25, 'Cyeru', 2),
(26, 'Gahunga', 2),
(27, 'Gatebe', 2),
(28, 'Gitovu', 2),
(29, 'Kagogo', 2),
(30, 'Kinoni', 2),
(31, 'Kinyababa', 2),
(32, 'Kivuye', 2),
(33, 'Nemba', 2),
(34, 'Rugarama', 2),
(35, 'Rugendabari', 2),
(36, 'Ruhunde', 2),
(37, 'Rusarabuge', 2),
(38, 'Rwerere', 2),
(39, 'Base', 3),
(40, 'Burega', 3),
(41, 'Bushoki', 3),
(42, 'Buyoga', 3),
(43, 'Cyinzuki', 3),
(44, 'Cyungo', 3),
(45, 'Kinihira', 3),
(46, 'Kisaro', 3),
(47, 'Masoro', 3),
(48, 'Mbogo', 3),
(49, 'Murambi', 3),
(50, 'Ngoma', 3),
(51, 'Ntarabana', 3),
(52, 'Rukozo', 3),
(53, 'Rusiga', 3),
(54, 'Shyorongi', 3),
(55, 'Tumba', 3),
(56, 'Busengo', 4),
(57, 'Coko', 4),
(58, 'Cyabingo', 4),
(59, 'Gakenke', 4),
(60, 'Gashenyi', 4),
(61, 'Mugunga', 4),
(62, 'Janja', 4),
(63, 'Kamubuga', 4),
(64, 'Karambo', 4),
(65, 'Kivuruga', 4),
(66, 'Mataba', 4),
(67, 'Minazi', 4),
(68, 'Muhondo', 4),
(69, 'Muyongwe', 4),
(70, 'Muzo', 4),
(71, 'Nemba', 4),
(72, 'Ruli', 4),
(73, 'Rusasa', 4),
(74, 'Rushaki', 4),
(75, 'Busoro', 5),
(76, 'Cyuve', 5),
(77, 'Gacaca', 5),
(78, 'Gashaki', 5),
(79, 'Gataraga', 5),
(80, 'Kimonyi', 5),
(81, 'Kinigi', 5),
(82, 'Muhoza', 5),
(83, 'Muko', 5),
(84, 'Musanze', 5),
(85, 'Nkotsi', 5),
(86, 'Nyange', 5),
(87, 'Remera', 5),
(88, 'Rwaza', 5),
(89, 'Shingiro', 5),
(90, 'Gashora', 6),
(91, 'Juru', 6),
(92, 'Kamabuye', 6),
(93, 'Ntarama', 6),
(94, 'Mareba', 6),
(95, 'Mayange', 6),
(96, 'Musenyi', 6),
(97, 'Mwogo', 6),
(98, 'Ngeruka', 6),
(99, 'Nyamata', 6),
(100, 'Nyarugenge', 6),
(101, 'Rilima', 6),
(102, 'Ruhuha', 6),
(103, 'Rweru', 6),
(104, 'Syara', 6),
(105, 'Gasange', 7),
(106, 'Gatsibo', 7),
(107, 'Gitoki', 7),
(108, 'Kabarore', 7),
(109, 'Kageyo', 7),
(110, 'Kiramuruzi', 7),
(111, 'Kiziguro', 7),
(112, 'Muhura', 7),
(113, 'Murambi', 7),
(114, 'Ngarama', 7),
(115, 'Nyagihanga', 7),
(116, 'Remera', 7),
(117, 'Rugarama', 7),
(118, 'Rwimbogo', 7),
(119, 'Gahini', 8),
(120, 'Kabare', 8),
(121, 'Kabarondo', 8),
(122, 'Mukarange', 8),
(123, 'Murama', 8),
(124, 'Murundi', 8),
(125, 'Mwiri', 8),
(126, 'Ndego', 8),
(127, 'Nyamirama', 8),
(128, 'Rukara', 8),
(129, 'Ruramira', 8),
(130, 'Rwikwavu', 8),
(131, 'Gahara', 9),
(132, 'Gatore', 9),
(133, 'Kigina', 9),
(134, 'Kirehe', 9),
(135, 'Mahama', 9),
(136, 'Mpanga', 9),
(137, 'Musaza', 9),
(138, 'Mushikiri', 9),
(139, 'Nasho', 9),
(140, 'Nyamugari', 9),
(141, 'Nyarubuye', 9),
(142, 'Kigarama', 9),
(143, 'Gashanda', 10),
(144, 'Jarama', 10),
(145, 'Kazo', 10),
(146, 'Kibungo', 10),
(147, 'Mugesera', 10),
(148, 'Murama', 10),
(149, 'Mutenderi', 10),
(150, 'Remera', 10),
(151, 'Rukira', 10),
(152, 'Rukumberi', 10),
(153, 'Rurenge', 10),
(154, 'Sake', 10),
(155, 'Zaza', 10),
(156, 'Karembo', 10),
(157, 'Gatunda', 11),
(158, 'Kiyombe', 11),
(159, 'Karama', 11),
(160, 'Karangazi', 11),
(161, 'Katabagemu', 11),
(162, 'Matimba', 11),
(163, 'Mimuli', 11),
(164, 'Mukama', 11),
(165, 'Musheli', 11),
(166, 'Nyagatare', 11),
(167, 'Rukomo', 11),
(168, 'Rwempasha', 11),
(169, 'Rwimiyaga', 11),
(170, 'Tabagwe', 11),
(171, 'Fumbwe', 12),
(172, 'Gahengeri', 12),
(173, 'Gishari', 12),
(174, 'Karenge', 12),
(175, 'Kigabiro', 12),
(176, 'Muhazi', 12),
(177, 'Munyaga', 12),
(178, 'Munyiginya', 12),
(179, 'Musha', 12),
(180, 'Muyumbu', 12),
(181, 'Mwulire', 12),
(182, 'Nyakariro', 12),
(183, 'Nzige', 12),
(184, 'Rubona', 12),
(185, 'Bumbogo', 13),
(186, 'Gatsata', 13),
(187, 'Jali', 13),
(188, 'Gikomero', 13),
(189, 'Gisozi', 13),
(190, 'Jabana', 13),
(191, 'Kinyinya', 13),
(192, 'Ndera', 13),
(193, 'Nduba', 13),
(194, 'Rusororo', 13),
(195, 'Rutunga', 13),
(196, 'Kacyiru', 13),
(197, 'Kimihurura', 13),
(198, 'Kimironko', 13),
(199, 'Remera', 13),
(200, 'Gahanga', 14),
(201, 'Gatenga', 14),
(202, 'Gikondo', 14),
(203, 'Kagarama', 14),
(204, 'Kanombe', 14),
(205, 'Kicukiro', 14),
(206, 'Kigarama', 14),
(207, 'Masaka', 14),
(208, 'Niboye', 14),
(209, 'Nyarugunga', 14),
(210, 'Gitega', 15),
(211, 'Kanyinya', 15),
(212, 'Kigali', 15),
(213, 'Kimisagara', 15),
(214, 'Mageragere', 15),
(215, 'Muhima', 15),
(216, 'Nyakabanda', 15),
(217, 'Nyamirambo', 15),
(218, 'Rwezamenyo', 15),
(219, 'Nyarugenge', 15),
(220, 'Gikonko', 16),
(221, 'Gishubi', 16),
(222, 'Kansi', 16),
(223, 'Kibilizi', 16),
(224, 'Kigeme', 16),
(225, 'Mamba', 16),
(226, 'Muganza', 16),
(227, 'Mugombwa', 16),
(228, 'Mukindo', 16),
(229, 'Musha', 16),
(230, 'Ndora', 16),
(231, 'Nyanza', 16),
(232, 'Save', 16),
(233, 'Gishanvu', 17),
(234, 'Karama', 17),
(235, 'Kigoma', 17),
(236, 'Kinazi', 17),
(237, 'Maramba', 17),
(238, 'Mbazi', 17),
(239, 'Mukura', 17),
(240, 'Ngoma', 17),
(241, 'Ruhashya', 17),
(242, 'Rusatira', 17),
(243, 'Rwaniro', 17),
(244, 'Simbi', 17),
(245, 'Tumba', 17),
(246, 'Huye', 17),
(247, 'Gacurabwenge', 18),
(248, 'Karama', 18),
(249, 'Kayenzi', 18),
(250, 'Kayumbu', 18),
(251, 'Mugina', 18),
(252, 'Musambira', 18),
(253, 'Ngamba', 18),
(254, 'Nyamiyaga', 18),
(255, 'Nyarubaka', 18),
(256, 'Rugarika', 18),
(257, 'Rukoma', 18),
(258, 'Runda', 18),
(259, 'Cyeza', 19),
(260, 'Kabacuzi', 19),
(261, 'Kibangu', 19),
(262, 'Kiyumba', 19),
(263, 'Muhanga', 19),
(264, 'Mushishiro', 19),
(265, 'Nyabinoni', 19),
(266, 'Nyamabuye', 19),
(267, 'Nyarusange', 19),
(268, 'Rongi', 19),
(269, 'Rugendabari', 19),
(270, 'Shyogwe', 19),
(271, 'Buruhukiro', 20),
(272, 'Cyanika', 20),
(273, 'Gatare', 20),
(274, 'Kaduha', 20),
(275, 'Kamegeli', 20),
(276, 'Kibirizi', 20),
(277, 'Kibumbwe', 20),
(278, 'Kitabi', 20),
(279, 'Mbazi', 20),
(280, 'Mugano', 20),
(281, 'Musange', 20),
(282, 'Musebeya', 20),
(283, 'Mushubi', 20),
(284, 'Nkomane', 20),
(285, 'Gasaka', 20),
(286, 'Tare', 20),
(287, 'Uwinkingi', 20),
(288, 'Busasamana', 21),
(289, 'Busoro', 21),
(290, 'Cyabakamyi', 21),
(291, 'Kibirizi', 21),
(292, 'Kigoma', 21),
(293, 'Mukingo', 21),
(294, 'Rwabicuma', 21),
(295, 'Muyira', 21),
(296, 'Ntyazo', 21),
(297, 'Nyagisozi', 21),
(298, 'Cyahinda', 22),
(299, 'Busanze', 22),
(300, 'Kibeho', 22),
(301, 'Mata', 22),
(302, 'Munini', 22),
(303, 'Kivu', 22),
(304, 'Ngera', 22),
(305, 'Ngoma', 22),
(306, 'Nyabimata', 22),
(307, 'Nyagisozi', 22),
(308, 'Ruheru', 22),
(309, 'Muganza', 22),
(310, 'Ruramba', 22),
(311, 'Rusenge', 22),
(312, 'Bweramana', 23),
(313, 'Byimana', 23),
(314, 'Kabagari', 23),
(315, 'Kinazi', 23),
(316, 'Kinihira', 23),
(317, 'Mbuye', 23),
(318, 'Mwendo', 23),
(319, 'Ntongwe', 23),
(320, 'Ruhango', 23),
(321, 'Bwishyura', 24),
(322, 'Gishari', 24),
(323, 'Gishyita', 24),
(324, 'Gisovu', 24),
(325, 'Gitesi', 24),
(326, 'Kareba', 24),
(327, 'Murambi', 24),
(328, 'Mubuga', 24),
(329, 'Mutuntu', 24),
(330, 'Ndayishimiye', 24),
(331, 'Rugabano', 24),
(332, 'Ruganda', 24),
(333, 'Rwankuba', 24),
(334, 'Tumba', 24),
(335, 'Bwira', 25),
(336, 'Gatumba', 25),
(337, 'Hindiro', 25),
(338, 'Kabaya', 25),
(339, 'Kageyo', 25),
(340, 'Kavumu', 25),
(341, 'Matyazo', 25),
(342, 'Muhanda', 25),
(343, 'Muhororo', 25),
(344, 'Ndaro', 25),
(345, 'Ngororero', 25),
(346, 'Nyange', 25),
(347, 'Sovu', 25),
(348, 'Bigogwe', 26),
(349, 'Jenda', 26),
(350, 'Jomba', 26),
(351, 'Kabatwa', 26),
(352, 'Karago', 26),
(353, 'Kintobo', 26),
(354, 'Mukamira', 26),
(355, 'Muringa', 26),
(356, 'Rambura', 26),
(357, 'Rugera', 26),
(358, 'Rurembo', 26),
(359, 'Shyira', 26),
(360, 'Bushekeri', 27),
(361, 'Bushenge', 27),
(362, 'Cyato', 27),
(363, 'Gihombo', 27),
(364, 'Kagano', 27),
(365, 'Kanjongo', 27),
(366, 'Karambi', 27),
(367, 'Karengera', 27),
(368, 'Kirimbi', 27),
(369, 'Macuba', 27),
(370, 'Mahembe', 27),
(371, 'Nyabitekeri', 27),
(372, 'Rangiro', 27),
(373, 'Ruharambuga', 27),
(374, 'Shangi', 27),
(375, 'Bugeshi', 28),
(376, 'Busasamana', 28),
(377, 'Cyanzarwe', 28),
(378, 'Gisenyi', 28),
(379, 'Kanama', 28),
(380, 'Kanzenze', 28),
(381, 'Mudende', 28),
(382, 'Nyakiliba', 28),
(383, 'Nyamyumba', 28),
(384, 'Nyundo', 28),
(385, 'Rubavu', 28),
(386, 'Rugerero', 28),
(387, 'Bugarama', 29),
(388, 'Butare', 29),
(389, 'Bweyeye', 29),
(390, 'Gikundanvura', 29),
(391, 'Gashonga', 29),
(392, 'Giheke', 29),
(393, 'Gihundwe', 29),
(394, 'Gitambi', 29),
(395, 'Kamembe', 29),
(396, 'Muganza', 29),
(397, 'Mururu', 29),
(398, 'Nkanka', 29),
(399, 'Nkombo', 29),
(400, 'Nkungu', 29),
(401, 'Nyakabuye', 29),
(402, 'Nyakarenzo', 29),
(403, 'Nzahaha', 29),
(404, 'Rwimbogo', 29),
(405, 'Boneza', 30),
(406, 'Gihango', 30),
(407, 'Kigeyo', 30),
(408, 'Kivumu', 30),
(409, 'Manihira', 30),
(410, 'Mukura', 30),
(411, 'Murunda', 30),
(412, 'Musasa', 30),
(413, 'Mushonyi', 30),
(414, 'Mushubati', 30),
(415, 'Nyabirasi', 30),
(416, 'Ruhango', 30),
(417, 'Rusebeya', 30);

-- --------------------------------------------------------

--
-- Table structure for table `traveling`
--

CREATE TABLE `traveling` (
  `travel_id` int(4) NOT NULL,
  `driver_id` int(4) NOT NULL,
  `car_id` int(5) NOT NULL,
  `worker_id` int(4) NOT NULL,
  `datee` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `traveling`
--

INSERT INTO `traveling` (`travel_id`, `driver_id`, `car_id`, `worker_id`, `datee`) VALUES
(2, 3, 1, 1, 'Mon-26-Aug-2019'),
(3, 31, 8, 31, 'Mon-26-Aug-2019'),
(4, 31, 6, 3, 'Tue-03-Sep-2019');

-- --------------------------------------------------------

--
-- Table structure for table `worker`
--

CREATE TABLE `worker` (
  `worker_id` int(60) NOT NULL,
  `f_name` varchar(100) NOT NULL,
  `l_name` varchar(100) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `dob` varchar(20) NOT NULL,
  `m_status` varchar(20) NOT NULL,
  `province` int(20) NOT NULL,
  `district` int(20) NOT NULL,
  `sector` int(20) NOT NULL,
  `cell` varchar(60) NOT NULL,
  `recret_date` varchar(60) NOT NULL,
  `edu_level` varchar(60) NOT NULL,
  `nid` varchar(60) NOT NULL,
  `account` varchar(60) NOT NULL,
  `bank` varchar(60) NOT NULL,
  `phone` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `code` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL,
  `photo` varchar(200) NOT NULL DEFAULT 'user.PNG',
  `status` varchar(60) NOT NULL,
  `user_id` int(60) NOT NULL,
  `timess` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `driving` varchar(20) NOT NULL,
  `airmonth` varchar(10) NOT NULL,
  `airyear` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `worker`
--

INSERT INTO `worker` (`worker_id`, `f_name`, `l_name`, `gender`, `dob`, `m_status`, `province`, `district`, `sector`, `cell`, `recret_date`, `edu_level`, `nid`, `account`, `bank`, `phone`, `email`, `code`, `password`, `photo`, `status`, `user_id`, `timess`, `driving`, `airmonth`, `airyear`) VALUES
(1, 'Aline', 'Giza', 'Female', '1-2-2018', 'single', 1, 1, 1, 'cell', '29-02-2018', 'A0', '199299832896325', '08972424442', 'bk', '078323231       ', 'irali@gamail.com            ', 'WK1641', 'aline ', 'cazorla.jpg ', 'normal', 1, '2019-08-26 09:23:40', '', '08', '2019'),
(3, 'Habimana', 'claude', 'Male', '7 June, 2019', 'Single', 1, 13, 185, 'kiyovu', '', 'Prof', '1199480017040044', '0050023656356347', 'BPR', '0782382732', 'ndabaptiste3@gmail.com', 'WK0937', 'pastor', 'user.png', 'normal', 1, '2019-09-03 09:39:26', 'yes', '09', '2019'),
(9, 'NIZEYIMANA', 'claude', 'Male', '13 June, 2019', 'Single', 2, 6, 90, 'Nyakabungo', '', 'Prof', '1967846537642757', '5578648764764', 'BPR', '0786216288', 'plac333@yahoo.fr', 'WK8695', '1111', 'user.png', 'blocked', 1, '2019-08-16 17:50:33', '', '', ''),
(27, 'Habimana', 'James', 'Male', '12 June, 2019', 'Single', 1, 13, 185, 'Bikumba', '', 'A0', '12222123323232', '556370108910168', 'BPR', '0782382732 ', 'haba@yahoo.fr ', 'WK1566', '1111 ', 'user.png', 'normal', 1, '2019-08-20 07:26:45', '', '08', '2019'),
(28, 'messi', 'teta', 'Male', '2000-12-12', 'Single', 1, 13, 197, 'kagitumba', '2009-02-09', 'Under Primary', '1718787381388833', '766565', 'BK', '0798987886', 'habinezac15@gmail.com', 'WK0664', '1111', 'user.png', 'blocked', 1, '2019-08-25 08:18:29', 'no', '', ''),
(29, 'sd', 'axsdf', 'Female', '0078-02-26', 'Maried', 3, 25, 346, 'sadwegf', '2004-05-12', 'Primary', '1111119919991919', '18188198191991', 'bk', '782400445', 'habinezac15@gmail.com', 'WK7492', 'm81!vPBF', 'user.png', 'blocked', 1, '2019-08-26 08:00:12', 'no', '08', '2019'),
(31, 'wilo', 'pac', 'Female', '2012-12-10', 'Maried', 1, 14, 209, 'asdfgh', '', 'S1', '1718786381388833', '13311', 'bk', '782400445', 'habinezac15@gmail.com', 'WK2055', 'mqkxgIQa', 'user.png', 'normal', 1, '2019-09-03 10:03:26', 'yes', '09', '2019'),
(32, 'sdfghj', 'werty', 'Male', '2091-12-02', 'Single', 2, 8, 124, 'sdfgh', '2001-01-07', 'PhD', '1234556677777777', '23436', 'bk', '0786543219', 'sxcfse@rtgrh5.gtyy', 'WK3636', '50l!ZLG?', 'user.png', 'blocked', 1, '2019-08-17 09:19:48', 'no', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `airtimes`
--
ALTER TABLE `airtimes`
  ADD PRIMARY KEY (`air_id`);

--
-- Indexes for table `ap_car`
--
ALTER TABLE `ap_car`
  ADD PRIMARY KEY (`apc_id`);

--
-- Indexes for table `ap_item`
--
ALTER TABLE `ap_item`
  ADD PRIMARY KEY (`ap_id`);

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`car_id`);

--
-- Indexes for table `contracts`
--
ALTER TABLE `contracts`
  ADD PRIMARY KEY (`contract_id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `provID` (`prov_id`);

--
-- Indexes for table `functions`
--
ALTER TABLE `functions`
  ADD PRIMARY KEY (`f_id`);

--
-- Indexes for table `given_items`
--
ALTER TABLE `given_items`
  ADD PRIMARY KEY (`given_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `outoforder`
--
ALTER TABLE `outoforder`
  ADD PRIMARY KEY (`out_id`);

--
-- Indexes for table `provinces`
--
ALTER TABLE `provinces`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`req_id`);

--
-- Indexes for table `traveling`
--
ALTER TABLE `traveling`
  ADD PRIMARY KEY (`travel_id`);

--
-- Indexes for table `worker`
--
ALTER TABLE `worker`
  ADD PRIMARY KEY (`worker_id`),
  ADD UNIQUE KEY `username` (`code`),
  ADD UNIQUE KEY `nid` (`nid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `airtimes`
--
ALTER TABLE `airtimes`
  MODIFY `air_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `ap_car`
--
ALTER TABLE `ap_car`
  MODIFY `apc_id` int(4) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ap_item`
--
ALTER TABLE `ap_item`
  MODIFY `ap_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `car_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `contracts`
--
ALTER TABLE `contracts`
  MODIFY `contract_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `functions`
--
ALTER TABLE `functions`
  MODIFY `f_id` int(60) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `given_items`
--
ALTER TABLE `given_items`
  MODIFY `given_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `item_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `outoforder`
--
ALTER TABLE `outoforder`
  MODIFY `out_id` int(4) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `provinces`
--
ALTER TABLE `provinces`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `req_id` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `traveling`
--
ALTER TABLE `traveling`
  MODIFY `travel_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `worker`
--
ALTER TABLE `worker`
  MODIFY `worker_id` int(60) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
