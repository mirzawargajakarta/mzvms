-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2021 at 12:32 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci3-adminlte3-user-management`
--

-- --------------------------------------------------------

--
-- Table structure for table `tabel_akses`
--

CREATE TABLE `tabel_akses` (
  `id_akses` int(11) NOT NULL,
  `id_profil` int(11) NOT NULL,
  `id_navigasi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_akses`
--

INSERT INTO `tabel_akses` (`id_akses`, `id_profil`, `id_navigasi`) VALUES
(22, 1, 2),
(24, 1, 4),
(30, 1, 3),
(42, 1, 5),
(43, 1, 27),
(44, 1, 28),
(46, 1, 29),
(47, 1, 30),
(50, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tabel_config`
--

CREATE TABLE `tabel_config` (
  `id_config` int(11) NOT NULL,
  `brand` varchar(128) NOT NULL,
  `copyright` varchar(128) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `background` varchar(255) NOT NULL,
  `login_title` varchar(128) NOT NULL,
  `sidebar` varchar(128) NOT NULL,
  `navbar` varchar(128) NOT NULL,
  `brandlogo` varchar(128) NOT NULL,
  `brandcolor` varchar(128) NOT NULL,
  `keywords` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `author` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tabel_config`
--

INSERT INTO `tabel_config` (`id_config`, `brand`, `copyright`, `logo`, `background`, `login_title`, `sidebar`, `navbar`, `brandlogo`, `brandcolor`, `keywords`, `description`, `author`) VALUES
(1, 'Admin Template', 'Tamus D Tahir', '81bdd2aaf7f5b27619839b99e40ee2d5.png', '8f6bd4428540491993635dc8be360986.jpg', 'Admin Template', 'sidebar-light-indigo', 'navbar-dark navbar-indigo', 'navbar-indigo', 'text-white', 'CI3, Bootsrap 4, Admin LTE3', 'Template Admin LTE 3  || Bootsrap 4 || CodeIgniter 3', 'Tamus Tahir || 08114180521');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_icon`
--

CREATE TABLE `tabel_icon` (
  `id_icon` int(11) NOT NULL,
  `icon` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tabel_icon`
--

INSERT INTO `tabel_icon` (`id_icon`, `icon`) VALUES
(66, '	fab fa-accessible-icon'),
(67, '	fas fa-american-sign-language-interpreting'),
(295, '	fas fa-hourglass-half'),
(282, '	fas fa-pencil-alt'),
(18, 'fa fa-server'),
(260, 'fab fa-bluetooth	'),
(261, 'fab fa-bluetooth-b	'),
(139, 'fab fa-youtube	'),
(158, 'far fa-address-book	'),
(160, 'far fa-address-card	'),
(96, 'far fa-arrow-alt-circle-down	'),
(98, 'far fa-arrow-alt-circle-left	'),
(100, 'far fa-arrow-alt-circle-right	'),
(102, 'far fa-arrow-alt-circle-up	'),
(78, 'far fa-bell	'),
(80, 'far fa-bell-slash	'),
(141, 'far fa-building	'),
(22, 'far fa-building'),
(168, 'far fa-calendar	'),
(170, 'far fa-calendar-alt	'),
(174, 'far fa-chart-bar	'),
(1, 'far fa-circle'),
(179, 'far fa-clipboard	'),
(299, 'far fa-clock'),
(217, 'far fa-comment	'),
(219, 'far fa-comment-dots	'),
(222, 'far fa-comments	'),
(181, 'far fa-copy	'),
(183, 'far fa-copyright	'),
(317, 'far fa-credit-card	'),
(186, 'far fa-edit	'),
(189, 'far fa-envelope	'),
(190, 'far fa-envelope-open	'),
(59, 'far fa-eye'),
(61, 'far fa-eye-slash'),
(194, 'far fa-file	'),
(196, 'far fa-file-alt	'),
(116, 'far fa-file-audio	'),
(245, 'far fa-file-code	'),
(118, 'far fa-file-video	'),
(198, 'far fa-folder	'),
(251, 'far fa-folder-open	'),
(224, 'far fa-frown	'),
(240, 'far fa-handshake	'),
(267, 'far fa-hdd'),
(146, 'far fa-hospital	'),
(25, 'far fa-hospital'),
(293, 'far fa-hourglass'),
(64, 'far fa-image'),
(65, 'far fa-images'),
(352, 'far fa-keyboard'),
(312, 'far fa-lightbulb	'),
(212, 'far fa-map	'),
(226, 'far fa-meh	'),
(289, 'far fa-money-bill-alt'),
(347, 'far fa-plus-square	'),
(73, 'far fa-question-circle	'),
(228, 'far fa-smile	'),
(329, 'far fa-user-circle	'),
(257, 'far fa-window-close	'),
(258, 'far fa-window-minimize	'),
(157, 'fas fa-address-book	'),
(159, 'fas fa-address-card	'),
(36, 'fas fa-ambulance'),
(87, 'fas fa-angle-double-down	'),
(88, 'fas fa-angle-double-left	'),
(89, 'fas fa-angle-double-right	'),
(90, 'fas fa-angle-double-up	'),
(91, 'fas fa-angle-down	'),
(92, 'fas fa-angle-left	'),
(93, 'fas fa-angle-right	'),
(94, 'fas fa-angle-up	'),
(161, 'fas fa-archive	'),
(95, 'fas fa-arrow-alt-circle-down	'),
(97, 'fas fa-arrow-alt-circle-left	'),
(99, 'fas fa-arrow-alt-circle-right	'),
(101, 'fas fa-arrow-alt-circle-up	'),
(103, 'fas fa-arrow-circle-down	'),
(104, 'fas fa-arrow-circle-left	'),
(105, 'fas fa-arrow-circle-right	'),
(106, 'fas fa-arrow-circle-up	'),
(107, 'fas fa-arrow-down	'),
(108, 'fas fa-arrow-left	'),
(109, 'fas fa-arrow-right	'),
(110, 'fas fa-arrow-up	'),
(111, 'fas fa-arrows-alt	'),
(68, 'fas fa-assistive-listening-systems	'),
(112, 'fas fa-backward	'),
(162, 'fas fa-balance-scale	'),
(233, 'fas fa-barcode	'),
(306, 'fas fa-battery-empty	'),
(307, 'fas fa-battery-full	'),
(308, 'fas fa-battery-half	'),
(309, 'fas fa-battery-quarter	'),
(310, 'fas fa-battery-three-quarters	'),
(77, 'fas fa-bell	'),
(79, 'fas fa-bell-slash	'),
(163, 'fas fa-birthday-cake	'),
(69, 'fas fa-blind	'),
(164, 'fas fa-book	'),
(301, 'fas fa-book-open'),
(302, 'fas fa-book-reader'),
(165, 'fas fa-briefcase	'),
(140, 'fas fa-building	'),
(21, 'fas fa-building'),
(166, 'fas fa-bullhorn	'),
(167, 'fas fa-calendar	'),
(169, 'fas fa-calendar-alt	'),
(52, 'fas fa-camera'),
(37, 'fas fa-capsules'),
(53, 'fas fa-cart-arrow-down'),
(54, 'fas fa-cart-plus'),
(171, 'fas fa-certificate	'),
(303, 'fas fa-chalkboard'),
(300, 'fas fa-chalkboard-teacher'),
(172, 'fas fa-chart-area	'),
(173, 'fas fa-chart-bar	'),
(175, 'fas fa-chart-line	'),
(176, 'fas fa-chart-pie	'),
(320, 'fas fa-child	'),
(142, 'fas fa-church	'),
(177, 'fas fa-city	'),
(38, 'fas fa-clinic-medical'),
(178, 'fas fa-clipboard	'),
(298, 'fas fa-clock'),
(232, 'fas fa-code	'),
(243, 'fas fa-coffee	'),
(3, 'fas fa-cogs'),
(313, 'fas fa-coins	'),
(216, 'fas fa-comment	'),
(314, 'fas fa-comment-dollar	'),
(33, 'fas fa-comment-dollar'),
(218, 'fas fa-comment-dots	'),
(220, 'fas fa-comment-slash	'),
(221, 'fas fa-comments	'),
(315, 'fas fa-comments-dollar	'),
(180, 'fas fa-copy	'),
(182, 'fas fa-copyright	'),
(316, 'fas fa-credit-card	'),
(184, 'fas fa-cut	'),
(262, 'fas fa-database'),
(263, 'fas fa-desktop'),
(234, 'fas fa-dollar-sign	'),
(235, 'fas fa-donate	'),
(264, 'fas fa-download'),
(185, 'fas fa-edit	'),
(188, 'fas fa-envelope	'),
(187, 'fas fa-envelope-open	'),
(34, 'fas fa-envelope-open-text'),
(191, 'fas fa-eraser	'),
(265, 'fas fa-ethernet'),
(81, 'fas fa-exclamation	'),
(82, 'fas fa-exclamation-circle	'),
(83, 'fas fa-exclamation-triangle	'),
(58, 'fas fa-eye'),
(60, 'fas fa-eye-slash'),
(113, 'fas fa-fast-backward	'),
(114, 'fas fa-fast-forward	'),
(192, 'fas fa-fax	'),
(321, 'fas fa-female	'),
(193, 'fas fa-file	'),
(195, 'fas fa-file-alt	'),
(16, 'fas fa-file-archive'),
(115, 'fas fa-file-audio	'),
(15, 'fas fa-file-audio'),
(244, 'fas fa-file-code	'),
(14, 'fas fa-file-code'),
(17, 'fas fa-file-download'),
(13, 'fas fa-file-excel'),
(12, 'fas fa-file-image'),
(318, 'fas fa-file-invoice	'),
(319, 'fas fa-file-invoice-dollar	'),
(39, 'fas fa-file-medical'),
(40, 'fas fa-file-medical-alt'),
(11, 'fas fa-file-pdf'),
(10, 'fas fa-file-powerpoint'),
(117, 'fas fa-file-video	'),
(9, 'fas fa-file-video'),
(8, 'fas fa-file-word'),
(119, 'fas fa-film	'),
(63, 'fas fa-film'),
(246, 'fas fa-filter	'),
(210, 'fas fa-fire	'),
(247, 'fas fa-fire-extinguisher	'),
(197, 'fas fa-folder	'),
(250, 'fas fa-folder-open	'),
(120, 'fas fa-forward	'),
(223, 'fas fa-frown	'),
(2, 'fas fa-fw fa-tachometer-alt'),
(5, 'fas fa-fw fa-user'),
(4, 'fas fa-fw fa-users'),
(143, 'fas fa-gopuram	'),
(231, 'fas fa-graduation-cap	'),
(236, 'fas fa-hand-holding-heart	'),
(237, 'fas fa-hand-holding-usd	'),
(238, 'fas fa-hands-helping	'),
(239, 'fas fa-handshake	'),
(57, 'fas fa-handshake'),
(266, 'fas fa-hdd'),
(121, 'fas fa-headphones	'),
(268, 'fas fa-headphones'),
(41, 'fas fa-heart'),
(144, 'fas fa-home	'),
(145, 'fas fa-hospital	'),
(42, 'fas fa-hospital'),
(147, 'fas fa-hospital-alt	'),
(44, 'fas fa-hospital-alt'),
(292, 'fas fa-hourglass'),
(294, 'fas fa-hourglass-end'),
(296, 'fas fa-hourglass-start'),
(148, 'fas fa-house-damage	'),
(27, 'fas fa-house-damage'),
(149, 'fas fa-industry	'),
(28, 'fas fa-industry'),
(349, 'fas fa-keyboard'),
(200, 'fas fa-landmark	'),
(269, 'fas fa-laptop'),
(311, 'fas fa-lightbulb	'),
(70, 'fas fa-low-vision	'),
(35, 'fas fa-mail-bulk'),
(322, 'fas fa-male	'),
(211, 'fas fa-map	'),
(213, 'fas fa-map-marked	'),
(214, 'fas fa-map-marked-alt	'),
(202, 'fas fa-marker	'),
(225, 'fas fa-meh	'),
(122, 'fas fa-microphone	'),
(123, 'fas fa-microphone-alt	'),
(124, 'fas fa-microphone-alt-slash	'),
(125, 'fas fa-microphone-slash	'),
(270, 'fas fa-mobile'),
(271, 'fas fa-mobile-alt'),
(290, 'fas fa-money-check'),
(55, 'fas fa-money-check-alt'),
(150, 'fas fa-mosque	'),
(29, 'fas fa-mosque'),
(126, 'fas fa-music	'),
(45, 'fas fa-notes-medical'),
(281, 'fas fa-paint-roller'),
(127, 'fas fa-pause	'),
(128, 'fas fa-pause-circle	'),
(201, 'fas fa-pen	'),
(203, 'fas fa-percent	'),
(204, 'fas fa-phone	'),
(71, 'fas fa-phone-volume	'),
(46, 'fas fa-pills'),
(151, 'fas fa-place-of-worship	'),
(129, 'fas fa-play	'),
(272, 'fas fa-plug'),
(344, 'fas fa-plus	'),
(345, 'fas fa-plus-circle	'),
(346, 'fas fa-plus-square	'),
(273, 'fas fa-power-off'),
(47, 'fas fa-prescription-bottle-alt'),
(274, 'fas fa-print'),
(48, 'fas fa-procedures'),
(254, 'fas fa-project-diagram	'),
(255, 'fas fa-qrcode	'),
(72, 'fas fa-question-circle	'),
(84, 'fas fa-radiation	'),
(85, 'fas fa-radiation-alt	'),
(130, 'fas fa-random	'),
(323, 'fas fa-restroom	'),
(283, 'fas fa-ruler'),
(152, 'fas fa-school	'),
(284, 'fas fa-screwdriver'),
(275, 'fas fa-server'),
(253, 'fas fa-shield-alt	'),
(242, 'fas fa-shoe-prints	'),
(56, 'fas fa-shopping-cart'),
(343, 'fas fa-sign-in-alt	'),
(74, 'fas fa-sign-language	'),
(252, 'fas fa-sitemap	'),
(86, 'fas fa-skull-crossbones	'),
(227, 'fas fa-smile	'),
(131, 'fas fa-stop	'),
(297, 'fas fa-stopwatch'),
(153, 'fas fa-synagogue	'),
(132, 'fas fa-sync-alt	'),
(49, 'fas fa-syringe'),
(277, 'fas fa-tablet'),
(276, 'fas fa-tablet-alt'),
(205, 'fas fa-tag	'),
(206, 'fas fa-tags	'),
(207, 'fas fa-tasks	'),
(7, 'fas fa-th-list'),
(208, 'fas fa-thumbtack	'),
(285, 'fas fa-toolbox'),
(286, 'fas fa-tools'),
(154, 'fas fa-torii-gate	'),
(31, 'fas fa-torii-gate'),
(215, 'fas fa-tree	'),
(287, 'fas fa-truck-pickup'),
(241, 'fas fa-tshirt	'),
(278, 'fas fa-tv'),
(133, 'fas fa-undo-alt	'),
(155, 'fas fa-university	'),
(30, 'fas fa-university'),
(279, 'fas fa-upload'),
(324, 'fas fa-user-alt	'),
(325, 'fas fa-user-alt-slash	'),
(326, 'fas fa-user-astronaut	'),
(327, 'fas fa-user-check	'),
(328, 'fas fa-user-circle	'),
(330, 'fas fa-user-clock	'),
(331, 'fas fa-user-cog	'),
(332, 'fas fa-user-edit	'),
(333, 'fas fa-user-friends	'),
(305, 'fas fa-user-graduate'),
(334, 'fas fa-user-injured	'),
(335, 'fas fa-user-lock	'),
(50, 'fas fa-user-md'),
(336, 'fas fa-user-minus	'),
(51, 'fas fa-user-nurse'),
(337, 'fas fa-user-plus	'),
(338, 'fas fa-user-secret	'),
(339, 'fas fa-user-shield	'),
(340, 'fas fa-user-slash	'),
(341, 'fas fa-user-tag	'),
(342, 'fas fa-user-times	'),
(6, 'fas fa-users-cog'),
(134, 'fas fa-video	'),
(230, 'fas fa-video-slash	'),
(156, 'fas fa-vihara	'),
(135, 'fas fa-volume-down	'),
(136, 'fas fa-volume-mute	'),
(137, 'fas fa-volume-off	'),
(138, 'fas fa-volume-up	'),
(209, 'fas fa-wallet'),
(76, 'fas fa-wheelchair	'),
(348, 'fas fa-wifi	'),
(256, 'fas fa-window-close	'),
(259, 'fas fa-window-minimize	'),
(288, 'fas fa-wrench');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_navigasi`
--

CREATE TABLE `tabel_navigasi` (
  `id_navigasi` int(11) NOT NULL,
  `navigasi` varchar(128) NOT NULL,
  `heading` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `dropdown` int(11) NOT NULL,
  `urutan` int(11) NOT NULL,
  `aktif` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_navigasi`
--

INSERT INTO `tabel_navigasi` (`id_navigasi`, `navigasi`, `heading`, `url`, `icon`, `dropdown`, `urutan`, `aktif`) VALUES
(1, 'Dashboard', '', 'dashboard', 'fas fa-fw fa-tachometer-alt', 0, 1, 'Yes'),
(2, 'Sistem', 'Master Data', '#', 'fas fa-cogs', 0, 2, 'Yes'),
(3, 'Icons', '', 'icon', 'far fa-circle', 2, 1, 'Yes'),
(4, 'Config', '', 'config', 'far fa-circle', 2, 2, 'Yes'),
(5, 'User Management', '', '#', 'fas fa-fw fa-users', 0, 3, 'Yes'),
(27, 'Navigasi', '', 'navigasi', 'far fa-circle', 5, 1, 'Yes'),
(28, 'Profil', '', 'profil', 'far fa-circle', 5, 2, 'Yes'),
(29, 'User', '', 'user', 'far fa-circle', 5, 3, 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_profil`
--

CREATE TABLE `tabel_profil` (
  `id_profil` int(11) NOT NULL,
  `profil` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_profil`
--

INSERT INTO `tabel_profil` (`id_profil`, `profil`) VALUES
(1, 'Superadmin');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_user`
--

CREATE TABLE `tabel_user` (
  `id_user` int(11) NOT NULL,
  `id_profil` int(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_user` varchar(128) NOT NULL,
  `telpon` varchar(50) NOT NULL,
  `aktif` varchar(3) NOT NULL,
  `foto` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_user`
--

INSERT INTO `tabel_user` (`id_user`, `id_profil`, `username`, `password`, `nama_user`, `telpon`, `aktif`, `foto`) VALUES
(3, 1, 'superadmin', '$2y$10$6lNBtShRNVoj7V7JFXkpAul8zAmWf9McH3q8A356P5RTbSivD80Ta', 'Tamus D Tahir', '08114180521', 'Yes', '0ef11ed3ffdac506f08b82ae421e3d5f.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabel_akses`
--
ALTER TABLE `tabel_akses`
  ADD PRIMARY KEY (`id_akses`);

--
-- Indexes for table `tabel_config`
--
ALTER TABLE `tabel_config`
  ADD PRIMARY KEY (`id_config`);

--
-- Indexes for table `tabel_icon`
--
ALTER TABLE `tabel_icon`
  ADD PRIMARY KEY (`id_icon`),
  ADD UNIQUE KEY `icon` (`icon`);

--
-- Indexes for table `tabel_navigasi`
--
ALTER TABLE `tabel_navigasi`
  ADD PRIMARY KEY (`id_navigasi`),
  ADD KEY `id_icon` (`icon`);

--
-- Indexes for table `tabel_profil`
--
ALTER TABLE `tabel_profil`
  ADD PRIMARY KEY (`id_profil`);

--
-- Indexes for table `tabel_user`
--
ALTER TABLE `tabel_user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `id_profil` (`id_profil`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tabel_akses`
--
ALTER TABLE `tabel_akses`
  MODIFY `id_akses` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `tabel_config`
--
ALTER TABLE `tabel_config`
  MODIFY `id_config` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tabel_icon`
--
ALTER TABLE `tabel_icon`
  MODIFY `id_icon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=353;

--
-- AUTO_INCREMENT for table `tabel_navigasi`
--
ALTER TABLE `tabel_navigasi`
  MODIFY `id_navigasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tabel_profil`
--
ALTER TABLE `tabel_profil`
  MODIFY `id_profil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tabel_user`
--
ALTER TABLE `tabel_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tabel_user`
--
ALTER TABLE `tabel_user`
  ADD CONSTRAINT `tabel_user_ibfk_1` FOREIGN KEY (`id_profil`) REFERENCES `tabel_profil` (`id_profil`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
