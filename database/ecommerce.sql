-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 14, 2020 at 07:20 PM
-- Server version: 10.3.13-MariaDB
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
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `thumbnail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `description`, `slug`, `thumbnail`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Mens Collection', '<p>asdas</p>', 'mens-collection', 'images/itmsh01326ltindigols-11580269319.jpg', NULL, '2020-01-28 22:41:59', '2020-01-28 22:41:59'),
(2, 'Shoes', '<p>sssssssssssss</p>', 'shoes', 'images/Masorini-Mesh-Men-Shoes-Casual-Breathable-Men-Sneakers-Mens-Fashion-Shoe-For-Male-Footwear-Spring-Autumn1580269329.jpg', NULL, '2020-01-28 22:42:09', '2020-01-28 22:42:09'),
(3, 'Women Collection', '<p>Women Collection</p>', 'women-collection', 'images/21581672302.jpg', NULL, '2020-02-14 04:25:02', '2020-02-14 04:25:02'),
(4, 'Ladies Shoes', '<p>shoes</p>', 'ladies-shoes', 'images/choose1581672340.jpg', NULL, '2020-02-14 04:25:40', '2020-02-14 04:25:40'),
(5, 'Product 2', '<p>asdas</p>', 'product-2', 'images/choose1581672598.jpg', NULL, '2020-02-14 04:29:58', '2020-02-14 04:29:58');

-- --------------------------------------------------------

--
-- Table structure for table `category_parent`
--

CREATE TABLE `category_parent` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category_parent`
--

INSERT INTO `category_parent` (`id`, `parent_id`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 1, 2, NULL, NULL),
(2, 3, 4, NULL, NULL),
(3, 1, 5, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `category_product`
--

CREATE TABLE `category_product` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category_product`
--

INSERT INTO `category_product` (`id`, `category_id`, `product_id`, `created_at`, `updated_at`) VALUES
(2, 2, 2, NULL, NULL),
(3, 1, 1, NULL, NULL),
(4, 2, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `state_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name`, `state_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Athmuqam', 1, NULL, NULL, NULL),
(2, 'Bagh', 1, NULL, NULL, NULL),
(3, 'Bhimber', 1, NULL, NULL, NULL),
(4, 'Hattian', 1, NULL, NULL, NULL),
(5, 'Haveli', 1, NULL, NULL, NULL),
(6, 'Khuiratta', 1, NULL, NULL, NULL),
(7, 'Kotli', 1, NULL, NULL, NULL),
(8, 'Mangla', 1, NULL, NULL, NULL),
(9, 'Mirpur', 1, NULL, NULL, NULL),
(10, 'Muzaffarabad', 1, NULL, NULL, NULL),
(11, 'Neelam', 1, NULL, NULL, NULL),
(12, 'Palandri', 1, NULL, NULL, NULL),
(13, 'Poonch', 1, NULL, NULL, NULL),
(14, 'Rawalakot', 1, NULL, NULL, NULL),
(15, 'Sudhnoti', 1, NULL, NULL, NULL),
(16, 'Amir chah', 2, NULL, NULL, NULL),
(17, 'Awaran', 2, NULL, NULL, NULL),
(18, 'Barkhan', 2, NULL, NULL, NULL),
(19, 'Bela', 2, NULL, NULL, NULL),
(20, 'Bhag', 2, NULL, NULL, NULL),
(21, 'Chaman', 2, NULL, NULL, NULL),
(22, 'Chitkan', 2, NULL, NULL, NULL),
(23, 'Dalbandin', 2, NULL, NULL, NULL),
(24, 'Dera Allah Yar', 2, NULL, NULL, NULL),
(25, 'Dera Bugti', 2, NULL, NULL, NULL),
(26, 'Dera Murad Jamali', 2, NULL, NULL, NULL),
(27, 'Dhadar', 2, NULL, NULL, NULL),
(28, 'Duki', 2, NULL, NULL, NULL),
(29, 'Gaddani', 2, NULL, NULL, NULL),
(30, 'Gwadar', 2, NULL, NULL, NULL),
(31, 'Harnai', 2, NULL, NULL, NULL),
(32, 'Hub', 2, NULL, NULL, NULL),
(33, 'Jiwani', 2, NULL, NULL, NULL),
(34, 'Kalat', 2, NULL, NULL, NULL),
(35, 'Kharan', 2, NULL, NULL, NULL),
(36, 'Khuzdar', 2, NULL, NULL, NULL),
(37, 'Kohlu', 2, NULL, NULL, NULL),
(38, 'Loralai', 2, NULL, NULL, NULL),
(39, 'Mach', 2, NULL, NULL, NULL),
(40, 'Mastung', 2, NULL, NULL, NULL),
(41, 'Nushki', 2, NULL, NULL, NULL),
(42, 'Ormara', 2, NULL, NULL, NULL),
(43, 'Pasni', 2, NULL, NULL, NULL),
(44, 'Pishin', 2, NULL, NULL, NULL),
(45, 'Quetta', 2, NULL, NULL, NULL),
(46, 'Sibi', 2, NULL, NULL, NULL),
(47, 'Sohbatpur', 2, NULL, NULL, NULL),
(48, 'Surab', 2, NULL, NULL, NULL),
(49, 'Turbat', 2, NULL, NULL, NULL),
(50, 'Usta Muhammad', 2, NULL, NULL, NULL),
(51, 'Uthal', 2, NULL, NULL, NULL),
(52, 'Wadh', 2, NULL, NULL, NULL),
(53, 'Winder', 2, NULL, NULL, NULL),
(54, 'Zehri', 2, NULL, NULL, NULL),
(55, 'Zhob', 2, NULL, NULL, NULL),
(56, 'Ziarat', 2, NULL, NULL, NULL),
(57, '\'Abdul Hakim', 3, NULL, NULL, NULL),
(58, 'Ahmadpur East', 3, NULL, NULL, NULL),
(59, 'Ahmadpur Lumma', 3, NULL, NULL, NULL),
(60, 'Ahmadpur Sial', 3, NULL, NULL, NULL),
(61, 'Ahmedabad', 3, NULL, NULL, NULL),
(62, 'Alipur', 3, NULL, NULL, NULL),
(63, 'Alipur Chatha', 3, NULL, NULL, NULL),
(64, 'Arifwala', 3, NULL, NULL, NULL),
(65, 'Attock', 3, NULL, NULL, NULL),
(66, 'Baddomalhi', 3, NULL, NULL, NULL),
(67, 'Bagh', 3, NULL, NULL, NULL),
(68, 'Bahawalnagar', 3, NULL, NULL, NULL),
(69, 'Bahawalpur', 3, NULL, NULL, NULL),
(70, 'Bai Pheru', 3, NULL, NULL, NULL),
(71, 'Basirpur', 3, NULL, NULL, NULL),
(72, 'Begowala', 3, NULL, NULL, NULL),
(73, 'Bhakkar', 3, NULL, NULL, NULL),
(74, 'Bhalwal', 3, NULL, NULL, NULL),
(75, 'Bhawana', 3, NULL, NULL, NULL),
(76, 'Bhera', 3, NULL, NULL, NULL),
(77, 'Bhopalwala', 3, NULL, NULL, NULL),
(78, 'Burewala', 3, NULL, NULL, NULL),
(79, 'Chak Azam Sahu', 3, NULL, NULL, NULL),
(80, 'Chak Jhumra', 3, NULL, NULL, NULL),
(81, 'Chak Sarwar Shahid', 3, NULL, NULL, NULL),
(82, 'Chakwal', 3, NULL, NULL, NULL),
(83, 'Chawinda', 3, NULL, NULL, NULL),
(84, 'Chichawatni', 3, NULL, NULL, NULL),
(85, 'Chiniot', 3, NULL, NULL, NULL),
(86, 'Chishtian Mandi', 3, NULL, NULL, NULL),
(87, 'Choa Saidan Shah', 3, NULL, NULL, NULL),
(88, 'Chuhar Kana', 3, NULL, NULL, NULL),
(89, 'Chunian', 3, NULL, NULL, NULL),
(90, 'Dajal', 3, NULL, NULL, NULL),
(91, 'Darya Khan', 3, NULL, NULL, NULL),
(92, 'Daska', 3, NULL, NULL, NULL),
(93, 'Daud Khel', 3, NULL, NULL, NULL),
(94, 'Daultala', 3, NULL, NULL, NULL),
(95, 'Dera Din Panah', 3, NULL, NULL, NULL),
(96, 'Dera Ghazi Khan', 3, NULL, NULL, NULL),
(97, 'Dhanote', 3, NULL, NULL, NULL),
(98, 'Dhonkal', 3, NULL, NULL, NULL),
(99, 'Dijkot', 3, NULL, NULL, NULL),
(100, 'Dina', 3, NULL, NULL, NULL),
(101, 'Dinga', 3, NULL, NULL, NULL),
(102, 'Dipalpur', 3, NULL, NULL, NULL),
(103, 'Dullewala', 3, NULL, NULL, NULL),
(104, 'Dunga Bunga', 3, NULL, NULL, NULL),
(105, 'Dunyapur', 3, NULL, NULL, NULL),
(106, 'Eminabad', 3, NULL, NULL, NULL),
(107, 'Faisalabad', 3, NULL, NULL, NULL),
(108, 'Faqirwali', 3, NULL, NULL, NULL),
(109, 'Faruka', 3, NULL, NULL, NULL),
(110, 'Fateh Jang', 3, NULL, NULL, NULL),
(111, 'Fatehpur', 3, NULL, NULL, NULL),
(112, 'Fazalpur', 3, NULL, NULL, NULL),
(113, 'Ferozwala', 3, NULL, NULL, NULL),
(114, 'Fort Abbas', 3, NULL, NULL, NULL),
(115, 'Garh Maharaja', 3, NULL, NULL, NULL),
(116, 'Ghakar', 3, NULL, NULL, NULL),
(117, 'Ghurgushti', 3, NULL, NULL, NULL),
(118, 'Gojra', 3, NULL, NULL, NULL),
(119, 'Gujar Khan', 3, NULL, NULL, NULL),
(120, 'Gujranwala', 3, NULL, NULL, NULL),
(121, 'Gujrat', 3, NULL, NULL, NULL),
(122, 'Hadali', 3, NULL, NULL, NULL),
(123, 'Hafizabad', 3, NULL, NULL, NULL),
(124, 'Harnoli', 3, NULL, NULL, NULL),
(125, 'Harunabad', 3, NULL, NULL, NULL),
(126, 'Hasan Abdal', 3, NULL, NULL, NULL),
(127, 'Hasilpur', 3, NULL, NULL, NULL),
(128, 'Haveli', 3, NULL, NULL, NULL),
(129, 'Hazro', 3, NULL, NULL, NULL),
(130, 'Hujra Shah Muqim', 3, NULL, NULL, NULL),
(131, 'Isa Khel', 3, NULL, NULL, NULL),
(132, 'Jahanian', 3, NULL, NULL, NULL),
(133, 'Jalalpur Bhattian', 3, NULL, NULL, NULL),
(134, 'Jalalpur Jattan', 3, NULL, NULL, NULL),
(135, 'Jalalpur Pirwala', 3, NULL, NULL, NULL),
(136, 'Jalla Jeem', 3, NULL, NULL, NULL),
(137, 'Jamke Chima', 3, NULL, NULL, NULL),
(138, 'Jampur', 3, NULL, NULL, NULL),
(139, 'Jand', 3, NULL, NULL, NULL),
(140, 'Jandanwala', 3, NULL, NULL, NULL),
(141, 'Jandiala Sherkhan', 3, NULL, NULL, NULL),
(142, 'Jaranwala', 3, NULL, NULL, NULL),
(143, 'Jatoi', 3, NULL, NULL, NULL),
(144, 'Jauharabad', 3, NULL, NULL, NULL),
(145, 'Jhang', 3, NULL, NULL, NULL),
(146, 'Jhawarian', 3, NULL, NULL, NULL),
(147, 'Jhelum', 3, NULL, NULL, NULL),
(148, 'Kabirwala', 3, NULL, NULL, NULL),
(149, 'Kahna Nau', 3, NULL, NULL, NULL),
(150, 'Kahror Pakka', 3, NULL, NULL, NULL),
(151, 'Kahuta', 3, NULL, NULL, NULL),
(152, 'Kalabagh', 3, NULL, NULL, NULL),
(153, 'Kalaswala', 3, NULL, NULL, NULL),
(154, 'Kaleke', 3, NULL, NULL, NULL),
(155, 'Kalur Kot', 3, NULL, NULL, NULL),
(156, 'Kamalia', 3, NULL, NULL, NULL),
(157, 'Kamar Mashani', 3, NULL, NULL, NULL),
(158, 'Kamir', 3, NULL, NULL, NULL),
(159, 'Kamoke', 3, NULL, NULL, NULL),
(160, 'Kamra', 3, NULL, NULL, NULL),
(161, 'Kanganpur', 3, NULL, NULL, NULL),
(162, 'Karampur', 3, NULL, NULL, NULL),
(163, 'Karor Lal Esan', 3, NULL, NULL, NULL),
(164, 'Kasur', 3, NULL, NULL, NULL),
(165, 'Khairpur Tamewali', 3, NULL, NULL, NULL),
(166, 'Khanewal', 3, NULL, NULL, NULL),
(167, 'Khangah Dogran', 3, NULL, NULL, NULL),
(168, 'Khangarh', 3, NULL, NULL, NULL),
(169, 'Khanpur', 3, NULL, NULL, NULL),
(170, 'Kharian', 3, NULL, NULL, NULL),
(171, 'Khewra', 3, NULL, NULL, NULL),
(172, 'Khundian', 3, NULL, NULL, NULL),
(173, 'Khurianwala', 3, NULL, NULL, NULL),
(174, 'Khushab', 3, NULL, NULL, NULL),
(175, 'Kot Abdul Malik', 3, NULL, NULL, NULL),
(176, 'Kot Addu', 3, NULL, NULL, NULL),
(177, 'Kot Mithan', 3, NULL, NULL, NULL),
(178, 'Kot Moman', 3, NULL, NULL, NULL),
(179, 'Kot Radha Kishan', 3, NULL, NULL, NULL),
(180, 'Kot Samaba', 3, NULL, NULL, NULL),
(181, 'Kotli Loharan', 3, NULL, NULL, NULL),
(182, 'Kundian', 3, NULL, NULL, NULL),
(183, 'Kunjah', 3, NULL, NULL, NULL),
(184, 'Lahore', 3, NULL, NULL, NULL),
(185, 'Lalamusa', 3, NULL, NULL, NULL),
(186, 'Lalian', 3, NULL, NULL, NULL),
(187, 'Liaqatabad', 3, NULL, NULL, NULL),
(188, 'Liaqatpur', 3, NULL, NULL, NULL),
(189, 'Lieah', 3, NULL, NULL, NULL),
(190, 'Liliani', 3, NULL, NULL, NULL),
(191, 'Lodhran', 3, NULL, NULL, NULL),
(192, 'Ludhewala Waraich', 3, NULL, NULL, NULL),
(193, 'Mailsi', 3, NULL, NULL, NULL),
(194, 'Makhdumpur', 3, NULL, NULL, NULL),
(195, 'Makhdumpur Rashid', 3, NULL, NULL, NULL),
(196, 'Malakwal', 3, NULL, NULL, NULL),
(197, 'Mamu Kanjan', 3, NULL, NULL, NULL),
(198, 'Mananwala Jodh Singh', 3, NULL, NULL, NULL),
(199, 'Mandi Bahauddin', 3, NULL, NULL, NULL),
(200, 'Mandi Sadiq Ganj', 3, NULL, NULL, NULL),
(201, 'Mangat', 3, NULL, NULL, NULL),
(202, 'Mangla', 3, NULL, NULL, NULL),
(203, 'Mankera', 3, NULL, NULL, NULL),
(204, 'Mian Channun', 3, NULL, NULL, NULL),
(205, 'Miani', 3, NULL, NULL, NULL),
(206, 'Mianwali', 3, NULL, NULL, NULL),
(207, 'Minchinabad', 3, NULL, NULL, NULL),
(208, 'Mitha Tiwana', 3, NULL, NULL, NULL),
(209, 'Multan', 3, NULL, NULL, NULL),
(210, 'Muridke', 3, NULL, NULL, NULL),
(211, 'Murree', 3, NULL, NULL, NULL),
(212, 'Mustafabad', 3, NULL, NULL, NULL),
(213, 'Muzaffargarh', 3, NULL, NULL, NULL),
(214, 'Nankana Sahib', 3, NULL, NULL, NULL),
(215, 'Narang', 3, NULL, NULL, NULL),
(216, 'Narowal', 3, NULL, NULL, NULL),
(217, 'Noorpur Thal', 3, NULL, NULL, NULL),
(218, 'Nowshera', 3, NULL, NULL, NULL),
(219, 'Nowshera Virkan', 3, NULL, NULL, NULL),
(220, 'Okara', 3, NULL, NULL, NULL),
(221, 'Pakpattan', 3, NULL, NULL, NULL),
(222, 'Pasrur', 3, NULL, NULL, NULL),
(223, 'Pattoki', 3, NULL, NULL, NULL),
(224, 'Phalia', 3, NULL, NULL, NULL),
(225, 'Phularwan', 3, NULL, NULL, NULL),
(226, 'Pind Dadan Khan', 3, NULL, NULL, NULL),
(227, 'Pindi Bhattian', 3, NULL, NULL, NULL),
(228, 'Pindi Gheb', 3, NULL, NULL, NULL),
(229, 'Pirmahal', 3, NULL, NULL, NULL),
(230, 'Qadirabad', 3, NULL, NULL, NULL),
(231, 'Qadirpur Ran', 3, NULL, NULL, NULL),
(232, 'Qila Disar Singh', 3, NULL, NULL, NULL),
(233, 'Qila Sobha Singh', 3, NULL, NULL, NULL),
(234, 'Quaidabad', 3, NULL, NULL, NULL),
(235, 'Rabwah', 3, NULL, NULL, NULL),
(236, 'Rahim Yar Khan', 3, NULL, NULL, NULL),
(237, 'Raiwind', 3, NULL, NULL, NULL),
(238, 'Raja Jang', 3, NULL, NULL, NULL),
(239, 'Rajanpur', 3, NULL, NULL, NULL),
(240, 'Rasulnagar', 3, NULL, NULL, NULL),
(241, 'Rawalpindi', 3, NULL, NULL, NULL),
(242, 'Renala Khurd', 3, NULL, NULL, NULL),
(243, 'Rojhan', 3, NULL, NULL, NULL),
(244, 'Saddar Gogera', 3, NULL, NULL, NULL),
(245, 'Sadiqabad', 3, NULL, NULL, NULL),
(246, 'Safdarabad', 3, NULL, NULL, NULL),
(247, 'Sahiwal', 3, NULL, NULL, NULL),
(248, 'Samasatta', 3, NULL, NULL, NULL),
(249, 'Sambrial', 3, NULL, NULL, NULL),
(250, 'Sammundri', 3, NULL, NULL, NULL),
(251, 'Sangala Hill', 3, NULL, NULL, NULL),
(252, 'Sanjwal', 3, NULL, NULL, NULL),
(253, 'Sarai Alamgir', 3, NULL, NULL, NULL),
(254, 'Sarai Sidhu', 3, NULL, NULL, NULL),
(255, 'Sargodha', 3, NULL, NULL, NULL),
(256, 'Shadiwal', 3, NULL, NULL, NULL),
(257, 'Shahkot', 3, NULL, NULL, NULL),
(258, 'Shahpur City', 3, NULL, NULL, NULL),
(259, 'Shahpur Saddar', 3, NULL, NULL, NULL),
(260, 'Shakargarh', 3, NULL, NULL, NULL),
(261, 'Sharqpur', 3, NULL, NULL, NULL),
(262, 'Shehr Sultan', 3, NULL, NULL, NULL),
(263, 'Shekhupura', 3, NULL, NULL, NULL),
(264, 'Shujaabad', 3, NULL, NULL, NULL),
(265, 'Sialkot', 3, NULL, NULL, NULL),
(266, 'Sillanwali', 3, NULL, NULL, NULL),
(267, 'Sodhra', 3, NULL, NULL, NULL),
(268, 'Sohawa', 3, NULL, NULL, NULL),
(269, 'Sukheke', 3, NULL, NULL, NULL),
(270, 'Talagang', 3, NULL, NULL, NULL),
(271, 'Tandlianwala', 3, NULL, NULL, NULL),
(272, 'Taunsa', 3, NULL, NULL, NULL),
(273, 'Taxila', 3, NULL, NULL, NULL),
(274, 'Tibba Sultanpur', 3, NULL, NULL, NULL),
(275, 'Toba Tek Singh', 3, NULL, NULL, NULL),
(276, 'Tulamba', 3, NULL, NULL, NULL),
(277, 'Uch', 3, NULL, NULL, NULL),
(278, 'Vihari', 3, NULL, NULL, NULL),
(279, 'Wah', 3, NULL, NULL, NULL),
(280, 'Warburton', 3, NULL, NULL, NULL),
(281, 'Wazirabad', 3, NULL, NULL, NULL),
(282, 'Yazman', 3, NULL, NULL, NULL),
(283, 'Zafarwal', 3, NULL, NULL, NULL),
(284, 'Zahir Pir', 3, NULL, NULL, NULL),
(285, 'Adilpur', 4, NULL, NULL, NULL),
(286, 'Badah', 4, NULL, NULL, NULL),
(287, 'Badin', 4, NULL, NULL, NULL),
(288, 'Bagarji', 4, NULL, NULL, NULL),
(289, 'Bakshshapur', 4, NULL, NULL, NULL),
(290, 'Bandhi', 4, NULL, NULL, NULL),
(291, 'Berani', 4, NULL, NULL, NULL),
(292, 'Bhan', 4, NULL, NULL, NULL),
(293, 'Bhiria City', 4, NULL, NULL, NULL),
(294, 'Bhiria Road', 4, NULL, NULL, NULL),
(295, 'Bhit Shah', 4, NULL, NULL, NULL),
(296, 'Bozdar', 4, NULL, NULL, NULL),
(297, 'Bulri', 4, NULL, NULL, NULL),
(298, 'Chak', 4, NULL, NULL, NULL),
(299, 'Chambar', 4, NULL, NULL, NULL),
(300, 'Chohar Jamali', 4, NULL, NULL, NULL),
(301, 'Chor', 4, NULL, NULL, NULL),
(302, 'Dadu', 4, NULL, NULL, NULL),
(303, 'Daharki', 4, NULL, NULL, NULL),
(304, 'Daro', 4, NULL, NULL, NULL),
(305, 'Darya Khan Mari', 4, NULL, NULL, NULL),
(306, 'Daulatpur', 4, NULL, NULL, NULL),
(307, 'Daur', 4, NULL, NULL, NULL),
(308, 'Dhoronaro', 4, NULL, NULL, NULL),
(309, 'Digri', 4, NULL, NULL, NULL),
(310, 'Diplo', 4, NULL, NULL, NULL),
(311, 'Dokri', 4, NULL, NULL, NULL),
(312, 'Faqirabad', 4, NULL, NULL, NULL),
(313, 'Gambat', 4, NULL, NULL, NULL),
(314, 'Garello', 4, NULL, NULL, NULL),
(315, 'Garhi Khairo', 4, NULL, NULL, NULL),
(316, 'Garhi Yasin', 4, NULL, NULL, NULL),
(317, 'Gharo', 4, NULL, NULL, NULL),
(318, 'Ghauspur', 4, NULL, NULL, NULL),
(319, 'Ghotki', 4, NULL, NULL, NULL),
(320, 'Golarchi', 4, NULL, NULL, NULL),
(321, 'Guddu', 4, NULL, NULL, NULL),
(322, 'Gulistan-E-Jauhar', 4, NULL, NULL, NULL),
(323, 'Hala', 4, NULL, NULL, NULL),
(324, 'Hingorja', 4, NULL, NULL, NULL),
(325, 'Hyderabad', 4, NULL, NULL, NULL),
(326, 'Islamkot', 4, NULL, NULL, NULL),
(327, 'Jacobabad', 4, NULL, NULL, NULL),
(328, 'Jam Nawaz Ali', 4, NULL, NULL, NULL),
(329, 'Jam Sahib', 4, NULL, NULL, NULL),
(330, 'Jati', 4, NULL, NULL, NULL),
(331, 'Jhol', 4, NULL, NULL, NULL),
(332, 'Jhudo', 4, NULL, NULL, NULL),
(333, 'Johi', 4, NULL, NULL, NULL),
(334, 'Kadhan', 4, NULL, NULL, NULL),
(335, 'Kambar', 4, NULL, NULL, NULL),
(336, 'Kandhra', 4, NULL, NULL, NULL),
(337, 'Kandiari', 4, NULL, NULL, NULL),
(338, 'Kandiaro', 4, NULL, NULL, NULL),
(339, 'Karachi', 4, NULL, NULL, NULL),
(340, 'Karampur', 4, NULL, NULL, NULL),
(341, 'Kario Ghanwar', 4, NULL, NULL, NULL),
(342, 'Karoondi', 4, NULL, NULL, NULL),
(343, 'Kashmor', 4, NULL, NULL, NULL),
(344, 'Kazi Ahmad', 4, NULL, NULL, NULL),
(345, 'Keti Bandar', 4, NULL, NULL, NULL),
(346, 'Khadro', 4, NULL, NULL, NULL),
(347, 'Khairpur', 4, NULL, NULL, NULL),
(348, 'Khairpur Nathan Shah', 4, NULL, NULL, NULL),
(349, 'Khandh Kot', 4, NULL, NULL, NULL),
(350, 'Khanpur', 4, NULL, NULL, NULL),
(351, 'Khipro', 4, NULL, NULL, NULL),
(352, 'Khoski', 4, NULL, NULL, NULL),
(353, 'Khuhra', 4, NULL, NULL, NULL),
(354, 'Khyber', 4, NULL, NULL, NULL),
(355, 'Kot Diji', 4, NULL, NULL, NULL),
(356, 'Kot Ghulam Mohammad', 4, NULL, NULL, NULL),
(357, 'Kotri', 4, NULL, NULL, NULL),
(358, 'Kumb', 4, NULL, NULL, NULL),
(359, 'Kunri', 4, NULL, NULL, NULL),
(360, 'Lakhi', 4, NULL, NULL, NULL),
(361, 'Larkana', 4, NULL, NULL, NULL),
(362, 'Madeji', 4, NULL, NULL, NULL),
(363, 'Matiari', 4, NULL, NULL, NULL),
(364, 'Matli', 4, NULL, NULL, NULL),
(365, 'Mehar', 4, NULL, NULL, NULL),
(366, 'Mehrabpur', 4, NULL, NULL, NULL),
(367, 'Miro Khan', 4, NULL, NULL, NULL),
(368, 'Mirpur Bathoro', 4, NULL, NULL, NULL),
(369, 'Mirpur Khas', 4, NULL, NULL, NULL),
(370, 'Mirpur Mathelo', 4, NULL, NULL, NULL),
(371, 'Mirpur Sakro', 4, NULL, NULL, NULL),
(372, 'Mirwah', 4, NULL, NULL, NULL),
(373, 'Mithi', 4, NULL, NULL, NULL),
(374, 'Moro', 4, NULL, NULL, NULL),
(375, 'Nabisar', 4, NULL, NULL, NULL),
(376, 'Nasarpur', 4, NULL, NULL, NULL),
(377, 'Nasirabad', 4, NULL, NULL, NULL),
(378, 'Naudero', 4, NULL, NULL, NULL),
(379, 'Naukot', 4, NULL, NULL, NULL),
(380, 'Naushahro Firoz', 4, NULL, NULL, NULL),
(381, 'Nawabshah', 4, NULL, NULL, NULL),
(382, 'Oderolal Station', 4, NULL, NULL, NULL),
(383, 'Pacca Chang', 4, NULL, NULL, NULL),
(384, 'Padidan', 4, NULL, NULL, NULL),
(385, 'Pano Aqil', 4, NULL, NULL, NULL),
(386, 'Perumal', 4, NULL, NULL, NULL),
(387, 'Phulji', 4, NULL, NULL, NULL),
(388, 'Pirjo Goth', 4, NULL, NULL, NULL),
(389, 'Piryaloi', 4, NULL, NULL, NULL),
(390, 'Pithoro', 4, NULL, NULL, NULL),
(391, 'Radhan', 4, NULL, NULL, NULL),
(392, 'Rajo Khanani', 4, NULL, NULL, NULL),
(393, 'Ranipur', 4, NULL, NULL, NULL),
(394, 'Ratodero', 4, NULL, NULL, NULL),
(395, 'Rohri', 4, NULL, NULL, NULL),
(396, 'Rustam', 4, NULL, NULL, NULL),
(397, 'Saeedabad', 4, NULL, NULL, NULL),
(398, 'Sakrand', 4, NULL, NULL, NULL),
(399, 'Samaro', 4, NULL, NULL, NULL),
(400, 'Sanghar', 4, NULL, NULL, NULL),
(401, 'Sann', 4, NULL, NULL, NULL),
(402, 'Sarhari', 4, NULL, NULL, NULL),
(403, 'Sehwan', 4, NULL, NULL, NULL),
(404, 'Setharja', 4, NULL, NULL, NULL),
(405, 'Shah Dipalli', 4, NULL, NULL, NULL),
(406, 'Shahdadkot', 4, NULL, NULL, NULL),
(407, 'Shahdadpur', 4, NULL, NULL, NULL),
(408, 'Shahpur Chakar', 4, NULL, NULL, NULL),
(409, 'Shahpur Jahania', 4, NULL, NULL, NULL),
(410, 'Shikarpur', 4, NULL, NULL, NULL),
(411, 'Sinjhoro', 4, NULL, NULL, NULL),
(412, 'Sita Road', 4, NULL, NULL, NULL),
(413, 'Sobhodero', 4, NULL, NULL, NULL),
(414, 'Sujawal', 4, NULL, NULL, NULL),
(415, 'Sukkur', 4, NULL, NULL, NULL),
(416, 'Talhar', 4, NULL, NULL, NULL),
(417, 'Tando Adam', 4, NULL, NULL, NULL),
(418, 'Tando Allah Yar', 4, NULL, NULL, NULL),
(419, 'Tando Bagho', 4, NULL, NULL, NULL),
(420, 'Tando Ghulam Ali', 4, NULL, NULL, NULL),
(421, 'Tando Jam', 4, NULL, NULL, NULL),
(422, 'Tando Jan Mohammad', 4, NULL, NULL, NULL),
(423, 'Tando Mitha Khan', 4, NULL, NULL, NULL),
(424, 'Tando Muhammad Khan', 4, NULL, NULL, NULL),
(425, 'Tangwani', 4, NULL, NULL, NULL),
(426, 'Thano Bula Khan', 4, NULL, NULL, NULL),
(427, 'Thari Mirwah', 4, NULL, NULL, NULL),
(428, 'Tharushah', 4, NULL, NULL, NULL),
(429, 'Thatta', 4, NULL, NULL, NULL),
(430, 'Ther I', 4, NULL, NULL, NULL),
(431, 'Ther I Mohabat', 4, NULL, NULL, NULL),
(432, 'Thul', 4, NULL, NULL, NULL),
(433, 'Ubauro', 4, NULL, NULL, NULL),
(434, 'Umarkot', 4, NULL, NULL, NULL),
(435, 'Warah', 4, NULL, NULL, NULL),
(436, 'Ulimang', 5, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phonecode` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `code`, `name`, `phonecode`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'PK', 'Pakistan', 92, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(10) UNSIGNED NOT NULL,
  `billing_firstName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `billing_lastName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `billing_address1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `billing_address2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `billing_country` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `billing_state` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `billing_city` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `billing_zip` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `shipping_firstName` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `shipping_lastName` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `shipping_address1` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `shipping_address2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `shipping_country` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `shipping_state` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `shipping_zip` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `billing_firstName`, `billing_lastName`, `phone`, `email`, `billing_address1`, `billing_address2`, `billing_country`, `billing_state`, `billing_city`, `billing_zip`, `shipping_firstName`, `shipping_lastName`, `shipping_address1`, `shipping_address2`, `shipping_country`, `shipping_state`, `shipping_zip`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'asdasd', 'asdasda', '0300786098', 'admin@admin.com', 'asdasd', 'asdas', 'Pakistan', 'Punjab', 'Faisalabad', '54000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-28 23:09:29', '2020-01-28 23:09:29', NULL),
(2, 'asdasd', 'asdasda', '300786098', 'admin@admin.com', 'asdasd', 'asdas', 'Pakistan', 'Punjab', 'Faisalabad', '54000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-28 23:34:12', '2020-01-28 23:34:12', NULL),
(3, 'asdasd', 'asdasda', '300786098', 'admin@admin.com', 'asdasd', 'asdas', 'Pakistan', 'Punjab', 'Faisalabad', '54000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-02-04 16:34:11', '2020-02-04 16:34:11', NULL),
(4, 'asdasd', 'asdasda', '300786098', 'admin@admin.com', 'asdasd', 'asdas', 'Pakistan', 'Punjab', 'Lahore', '54000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-02-14 12:01:31', '2020-02-14 12:01:31', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2020_01_02_135742_create_profiles_table', 1),
(4, '2020_01_02_135826_create_products_table', 1),
(5, '2020_01_02_135920_create_orders_table', 1),
(6, '2020_01_02_140008_create_payments_table', 1),
(7, '2020_01_02_140133_create_roles_table', 1),
(8, '2020_01_02_143746_create_categories_table', 1),
(9, '2020_01_03_121131_create_category_product_table', 1),
(10, '2020_01_03_122255_create_category_parent_table', 1),
(11, '2020_01_05_143633_create_countries_table', 1),
(12, '2020_01_05_143658_create_cities_table', 1),
(13, '2020_01_05_144147_create_states_table', 1),
(14, '2020_01_07_175700_create_customer', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `qty` int(10) UNSIGNED NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(10) UNSIGNED NOT NULL,
  `payment_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `product_id`, `qty`, `status`, `price`, `payment_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 1, 'Complete', 1170, 0, '2020-01-28 23:09:29', '2020-01-28 23:09:29', NULL),
(2, 2, 1, 1, 'Complete', 1170, 0, '2020-01-28 23:34:12', '2020-01-28 23:34:12', NULL),
(3, 2, 2, 1, 'Complete', 1560, 0, '2020-01-28 23:34:12', '2020-01-28 23:34:12', NULL),
(4, 3, 2, 1, 'Complete', 1560, 0, '2020-02-04 16:34:11', '2020-02-04 16:34:11', NULL),
(5, 4, 1, 1, 'Complete', 1170, 0, '2020-02-14 12:01:31', '2020-02-14 12:01:31', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `options` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `discount` tinyint(1) NOT NULL,
  `discount_price` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `thumbnail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `featured` tinyint(1) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `options` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `slug`, `description`, `price`, `discount`, `discount_price`, `thumbnail`, `featured`, `status`, `options`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Shoes', 'shoes', '<p>ssssssss</p>', 1170, 22, '0', 'images/Spring-Summer-Men-Shoes-Breathable-Mens-Shoes-Casual-Fashion-Low-Lace-up-Canvas-Shoes-Flats-Zapatillas1580269354.jpg', 1, 1, NULL, '2020-01-28 22:42:34', '2020-02-14 13:17:15', NULL),
(2, 'Mens Collection', 'mens-collection', '<p>adadas</p>', 1560, 22, '2000', 'images/nishat-linen-kids-2018-281580272430.jpg', 0, 1, NULL, '2020-01-28 23:33:50', '2020-01-28 23:33:50', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `firstName` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lastName` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address1` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `address2` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thumbnail` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `state_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `city_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `user_id`, `firstName`, `lastName`, `address1`, `address2`, `phone`, `slug`, `thumbnail`, `country_id`, `state_id`, `city_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'farid', 'alvi', NULL, NULL, NULL, '1', NULL, 0, 0, 0, '2020-01-28 22:40:52', '2020-01-28 22:40:52', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'customer', 'Customer Role', '2020-01-28 22:40:51', '2020-01-28 22:40:51', NULL),
(2, 'admin', 'Admin Role', '2020-01-28 22:40:51', '2020-01-28 22:40:51', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `country_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `name`, `country_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Azad kashmir', 1, NULL, NULL, NULL),
(2, 'Balochistan', 1, NULL, NULL, NULL),
(3, 'Fata', 1, NULL, NULL, NULL),
(4, 'Gilgit–baltistan', 1, NULL, NULL, NULL),
(5, 'Islamabad capital territory', 1, NULL, NULL, NULL),
(6, 'Khyber Pakhtunkhwa', 1, NULL, NULL, NULL),
(7, 'Punjab', 1, NULL, NULL, NULL),
(8, 'Sindh', 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `email`, `password`, `status`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, 'admin@admin.com', '$2y$10$570NmLP9VYe95an.vhsESODyeh.TaN.QomTVD6HNGx0hGLJ1G32ZW', 1, '5tfzj8sHOlzQgkyFopSU6yITFHVVa0C6FpwxSdvmCQW2kNYGftTlWYTYTOv2', '2020-01-28 22:40:51', '2020-01-28 22:40:51', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_parent`
--
ALTER TABLE `category_parent`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_product`
--
ALTER TABLE `category_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cities_id_index` (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `countries_id_index` (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `profiles_user_id_foreign` (`user_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`),
  ADD KEY `states_id_index` (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `category_parent`
--
ALTER TABLE `category_parent`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `category_product`
--
ALTER TABLE `category_product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=437;
--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `profiles`
--
ALTER TABLE `profiles`
  ADD CONSTRAINT `profiles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
