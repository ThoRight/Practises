-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 14 Ağu 2024, 09:28:27
-- Sunucu sürümü: 10.4.32-MariaDB
-- PHP Sürümü: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `blogdb`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`) VALUES
(1, 'All'),
(2, 'Web'),
(3, 'PHP'),
(4, 'JS');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `comments`
--

INSERT INTO `comments` (`comment_id`, `post_id`, `user_id`, `comment`, `created_at`) VALUES
(119, 257, 3, 'test comment', '2024-08-12 14:56:00'),
(120, 259, 3, 'adsnkasdnkasd', '2024-08-12 15:22:00');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `media`
--

CREATE TABLE `media` (
  `media_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `path` varchar(255) NOT NULL,
  `uploaded_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `media`
--

INSERT INTO `media` (`media_id`, `name`, `path`, `uploaded_at`) VALUES
(14, 'blog.png', 'images/66bb16170c0bf-blog.png', '2024-08-13 08:15:19');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(256) NOT NULL,
  `content` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`content`)),
  `category_id` int(11) NOT NULL,
  `media_id` int(11) NOT NULL,
  `view_count` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `posts`
--

INSERT INTO `posts` (`post_id`, `user_id`, `title`, `content`, `category_id`, `media_id`, `view_count`, `created_at`) VALUES
(240, 1, 'TEST TITLE', '{\"time\":1723466542005,\"blocks\":[{\"id\":\"TZTt_ravak\",\"type\":\"paragraph\",\"data\":{\"text\":\"TEST NEW EDITOR\"}}],\"version\":\"2.30.4\"}', 1, 0, 2, '2024-08-12 12:42:22'),
(241, 1, 'TEST TITLE', '{\"time\":1723468465426,\"blocks\":[{\"id\":\"lrypM3aifc\",\"type\":\"paragraph\",\"data\":{\"text\":\"TEST\"}}],\"version\":\"2.30.4\"}', 1, 0, 0, '2024-08-12 13:14:25'),
(242, 3, 'TEST TITLE', '{\"time\":1723468474950,\"blocks\":[{\"id\":\"VGWWP4-cIJ\",\"type\":\"paragraph\",\"data\":{\"text\":\"adsasdads\"}}],\"version\":\"2.30.4\"}', 1, 0, 0, '2024-08-12 13:14:34'),
(243, 3, 'TEST TITLE', '{\"time\":1723468492649,\"blocks\":[{\"id\":\"a_rmLo_gla\",\"type\":\"paragraph\",\"data\":{\"text\":\"adsasdasd\"}}],\"version\":\"2.30.4\"}', 1, 0, 0, '2024-08-12 13:14:52'),
(244, 3, 'TEST TITLE', '{\"time\":1723468512576,\"blocks\":[{\"id\":\"QUKpWdcIWs\",\"type\":\"paragraph\",\"data\":{\"text\":\"dsaasddas\"}}],\"version\":\"2.30.4\"}', 1, 0, 0, '2024-08-12 13:15:12'),
(245, 1, 'CATEGORY 2', '{\"test\":2}', 1, 0, 3, '2024-08-12 13:17:01'),
(246, 1, 'CATEGORY 2', '{\"test\":2}', 1, 0, 0, '2024-08-12 13:17:37'),
(247, 1, 'CATEGORY 2', '{\"test\":2}', 1, 0, 1, '2024-08-12 13:17:58'),
(248, 3, 'TEST TITLE', '\"{\\\"time\\\":1723468787122,\\\"blocks\\\":[{\\\"id\\\":\\\"sQgmx-pupN\\\",\\\"type\\\":\\\"paragraph\\\",\\\"data\\\":{\\\"text\\\":\\\"etste1231\\\"}}],\\\"version\\\":\\\"2.30.4\\\"}\"', 1, 0, 0, '2024-08-12 13:19:47'),
(249, 3, 'TEST TITLE', '{\"time\":1723468834929,\"blocks\":[{\"id\":\"A58mJHwDPX\",\"type\":\"paragraph\",\"data\":{\"text\":\"test 123123123\"}}],\"version\":\"2.30.4\"}', 1, 0, 0, '2024-08-12 13:20:34'),
(250, 3, 'TEST TITLE', '{\"time\":1723470455403,\"blocks\":[{\"id\":\"FDJeOkcKZb\",\"type\":\"paragraph\",\"data\":{\"text\":\"asdasddasasdsad\"}}],\"version\":\"2.30.4\"}', 1, 0, 0, '2024-08-12 13:47:35'),
(251, 3, 'TEST TITLE', '{\"time\":1723470480637,\"blocks\":[{\"id\":\"4uDJNppiKy\",\"type\":\"paragraph\",\"data\":{\"text\":\"asdasdasdasd\"}}],\"version\":\"2.30.4\"}', 1, 0, 0, '2024-08-12 13:48:00'),
(252, 3, 'TEST TITLE', '{\"time\":1723470543230,\"blocks\":[{\"id\":\"TWV2QdUerK\",\"type\":\"paragraph\",\"data\":{\"text\":\"asdasdadsasd\"}}],\"version\":\"2.30.4\"}', 1, 0, 17, '2024-08-12 13:49:03'),
(253, 3, 'TEST TITLE', '{\"time\":1723470563744,\"blocks\":[{\"id\":\"-NCu0ZSwD0\",\"type\":\"paragraph\",\"data\":{\"text\":\"adsasdasdasd\"}}],\"version\":\"2.30.4\"}', 1, 0, 5, '2024-08-12 13:49:23'),
(255, 3, 'TEST TITLE', '{\"time\":1723474249551,\"blocks\":[{\"id\":\"U_SPQGj6OC\",\"type\":\"image\",\"data\":{\"caption\":\"asdsad\",\"withBorder\":false,\"withBackground\":false,\"stretched\":false,\"file\":{\"url\":\"http://localhost/BlogAndCMS/api/images/66ba213327fce-profile_img.jpg\"}}},{\"id\":\"GkvwfL7fmi\",\"type\":\"image\",\"data\":{\"caption\":\"sdasadasd\",\"withBorder\":false,\"withBackground\":false,\"stretched\":false,\"file\":{\"url\":\"http://localhost/BlogAndCMS/api/images/66ba213a3c923-66ba213327fce-profile_img.jpg\"}}},{\"id\":\"ddnkoLODvV\",\"type\":\"image\",\"data\":{\"caption\":\"sadads\",\"withBorder\":false,\"withBackground\":false,\"stretched\":false,\"file\":{\"url\":\"http://localhost/BlogAndCMS/api/images/66ba2138b869c-66ba213327fce-profile_img.jpg\"}}},{\"id\":\"r8LcWkhdRX\",\"type\":\"paragraph\",\"data\":{\"text\":\"ö\"}},{\"id\":\"z3Bf8TXwQj\",\"type\":\"paragraph\",\"data\":{\"text\":\"ş\"}}],\"version\":\"2.30.4\"}', 1, 0, 1, '2024-08-12 14:50:49'),
(257, 3, 'TEST TITLE', '{\"time\":1723474552636,\"blocks\":[{\"id\":\"MPXP63sh4F\",\"type\":\"paragraph\",\"data\":{\"text\":\"TEST POST\"}},{\"id\":\"V9G6fm-Kbh\",\"type\":\"image\",\"data\":{\"caption\":\"CAPPTION\",\"withBorder\":false,\"withBackground\":false,\"stretched\":false,\"file\":{\"url\":\"http://localhost/BlogAndCMS/api/images/66ba226fa882c-profile_img.jpg\"}}}],\"version\":\"2.30.4\"}', 1, 0, 2, '2024-08-12 14:55:52'),
(258, 3, 'TITLE!!!', '{\"time\":1723475004290,\"blocks\":[{\"id\":\"k8sm5Qty4O\",\"type\":\"paragraph\",\"data\":{\"text\":\"TEST TITLE\"}}],\"version\":\"2.30.4\"}', 1, 0, 1, '2024-08-12 15:03:24'),
(259, 3, 'title', '{\"time\":1723476113847,\"blocks\":[{\"id\":\"8NfFMOLw0v\",\"type\":\"paragraph\",\"data\":{\"text\":\"sadfsadfsadfsadf\"}},{\"id\":\"6niyL-x6yV\",\"type\":\"image\",\"data\":{\"caption\":\"\",\"withBorder\":false,\"withBackground\":false,\"stretched\":false,\"file\":{\"url\":\"http://localhost/BlogAndCMS/api/images/66ba288a46f7b-profile_img.jpg\"}}}],\"version\":\"2.30.4\"}', 1, 0, 0, '2024-08-12 15:21:53'),
(260, 3, '', '{\"time\":1723536939274,\"blocks\":[],\"version\":\"2.30.4\"}', 1, 0, 1, '2024-08-13 08:15:39'),
(263, 3, '', '{\"time\":1723539948372,\"blocks\":[{\"id\":\"ePbYG3X5KK\",\"type\":\"paragraph\",\"data\":{\"text\":\"w\"}},{\"id\":\"zzpyE4mwC7\",\"type\":\"paragraph\",\"data\":{\"text\":\"eqwqweqwe\"}}],\"version\":\"2.30.4\"}', 1, 0, 1, '2024-08-13 09:05:48'),
(264, 3, '', '{\"time\":1723539950831,\"blocks\":[{\"id\":\"fMI2sGjaoh\",\"type\":\"paragraph\",\"data\":{\"text\":\"qweqweqewqwe\"}}],\"version\":\"2.30.4\"}', 1, 0, 2, '2024-08-13 09:05:50'),
(265, 3, '', '{\"time\":1723539953092,\"blocks\":[{\"id\":\"22EW6jl50w\",\"type\":\"paragraph\",\"data\":{\"text\":\"qweqewqweqwe\"}}],\"version\":\"2.30.4\"}', 1, 0, 3, '2024-08-13 09:05:53'),
(266, 3, '', '{\"time\":1723539955614,\"blocks\":[{\"id\":\"LVRlKlLbOQ\",\"type\":\"paragraph\",\"data\":{\"text\":\"qwewqeqweqwe\"}}],\"version\":\"2.30.4\"}', 1, 0, 3, '2024-08-13 09:05:55'),
(267, 3, '', '{\"time\":1723539958054,\"blocks\":[{\"id\":\"26YEShEGz0\",\"type\":\"paragraph\",\"data\":{\"text\":\"qweqwqewqwe\"}}],\"version\":\"2.30.4\"}', 1, 0, 1, '2024-08-13 09:05:58'),
(268, 3, '', '{\"time\":1723539960700,\"blocks\":[{\"id\":\"6V3fzuLRJU\",\"type\":\"paragraph\",\"data\":{\"text\":\"qweqewqewqwqe\"}}],\"version\":\"2.30.4\"}', 1, 0, 1, '2024-08-13 09:06:00'),
(269, 3, 'jsjsjs', '{\"time\":1723539993661,\"blocks\":[{\"id\":\"kwokRJJ6uE\",\"type\":\"paragraph\",\"data\":{\"text\":\"jsjsjsjs\"}}],\"version\":\"2.30.4\"}', 1, 0, 1, '2024-08-13 09:06:33'),
(270, 3, 'jsjsjsjs', '{\"time\":1723540002659,\"blocks\":[{\"id\":\"XdyrMwADOe\",\"type\":\"paragraph\",\"data\":{\"text\":\"jsjsjsjs\"}}],\"version\":\"2.30.4\"}', 1, 0, 2, '2024-08-13 09:06:42'),
(271, 3, 'jsjsjsjs', '{\"time\":1723540008707,\"blocks\":[{\"id\":\"muNtOglufV\",\"type\":\"header\",\"data\":{\"text\":\"jsjsjsjs\",\"level\":1}}],\"version\":\"2.30.4\"}', 1, 0, 2, '2024-08-13 09:06:48'),
(272, 3, 'jsjsjsjs', '{\"time\":1723540013278,\"blocks\":[{\"id\":\"uw_ub5Dt1v\",\"type\":\"header\",\"data\":{\"text\":\"jsjsjsjs\",\"level\":1}}],\"version\":\"2.30.4\"}', 1, 0, 1, '2024-08-13 09:06:53'),
(273, 3, 'jsjsjsjs', '{\"time\":1723540017115,\"blocks\":[{\"id\":\"pZpKxaK7Ml\",\"type\":\"header\",\"data\":{\"text\":\"jsjsjsjs\",\"level\":1}}],\"version\":\"2.30.4\"}', 1, 0, 1, '2024-08-13 09:06:57'),
(274, 3, 'jsjsjsjs', '{\"time\":1723540022484,\"blocks\":[{\"id\":\"0qR9pLTwFo\",\"type\":\"header\",\"data\":{\"text\":\"jsjsjsjs\",\"level\":1}}],\"version\":\"2.30.4\"}', 1, 0, 1, '2024-08-13 09:07:02'),
(275, 3, 'jsjsjsjs', '{\"time\":1723540026483,\"blocks\":[{\"id\":\"B-xSusvupS\",\"type\":\"header\",\"data\":{\"text\":\"jsjsjsjs\",\"level\":1}}],\"version\":\"2.30.4\"}', 1, 0, 1, '2024-08-13 09:07:06'),
(276, 3, 'jsjsjsjs', '{\"time\":1723540030220,\"blocks\":[{\"id\":\"wDVOSh4Ykd\",\"type\":\"header\",\"data\":{\"text\":\"jsjsjsjs\",\"level\":1}}],\"version\":\"2.30.4\"}', 1, 0, 2, '2024-08-13 09:07:10'),
(277, 3, 'jsjsjsjs', '{\"time\":1723540034773,\"blocks\":[{\"id\":\"xN7pybogUz\",\"type\":\"header\",\"data\":{\"text\":\"jsjsjsjs\",\"level\":1}}],\"version\":\"2.30.4\"}', 1, 0, 1, '2024-08-13 09:07:14'),
(278, 3, 'jsjsjsjs', '{\"time\":1723540056587,\"blocks\":[{\"id\":\"RMlfgEJFWG\",\"type\":\"header\",\"data\":{\"text\":\"jsjsjsjs\",\"level\":1}}],\"version\":\"2.30.4\"}', 1, 0, 1, '2024-08-13 09:07:36'),
(279, 3, 'jsjsjsjs', '{\"time\":1723540060892,\"blocks\":[{\"id\":\"wpKGMA5-0X\",\"type\":\"header\",\"data\":{\"text\":\"jsjsjsjs\",\"level\":1}}],\"version\":\"2.30.4\"}', 1, 0, 1, '2024-08-13 09:07:40'),
(280, 3, 'jsjsjsjsjsjsjsjs', '{\"time\":1723540099067,\"blocks\":[{\"id\":\"jxwE1fp4kO\",\"type\":\"header\",\"data\":{\"text\":\"jsjsjsjsjsjsjsjsjsjsjsjs\",\"level\":1}}],\"version\":\"2.30.4\"}', 1, 0, 2, '2024-08-13 09:08:19');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `post_categories`
--

CREATE TABLE `post_categories` (
  `post_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `post_categories`
--

INSERT INTO `post_categories` (`post_id`, `category_id`) VALUES
(242, 2),
(242, 3),
(243, 2),
(244, 2),
(248, 2),
(248, 3),
(249, 2),
(249, 3),
(250, 2),
(250, 3),
(251, 3),
(252, 1),
(252, 2),
(252, 3),
(253, 1),
(253, 2),
(253, 3),
(253, 4),
(255, 1),
(257, 1),
(257, 2),
(257, 3),
(257, 4),
(258, 1),
(258, 4),
(259, 1),
(259, 2),
(259, 3),
(260, 1),
(263, 1),
(264, 1),
(265, 1),
(266, 1),
(267, 1),
(268, 1),
(269, 1),
(269, 4),
(270, 1),
(270, 4),
(271, 1),
(271, 4),
(272, 1),
(272, 4),
(273, 1),
(273, 4),
(274, 1),
(274, 4),
(275, 1),
(275, 4),
(276, 1),
(276, 4),
(277, 1),
(277, 4),
(278, 1),
(278, 4),
(279, 1),
(279, 4),
(280, 1),
(280, 4);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `post_media`
--

CREATE TABLE `post_media` (
  `post_id` int(11) NOT NULL,
  `media_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `about` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`user_id`, `fullname`, `email`, `city`, `username`, `password`, `role`, `about`, `created_at`) VALUES
(1, 'John Doe', 'johndoe@example.com', 'İstanbul', 'johndoe', '$2y$10$prLQ1MOxV44EyftDAto54.VhTNZoiCniryAiFiw0Omb6sorNM.xiW', 'admin', 'I am a software developer.', '2024-08-07 10:04:41'),
(3, 'Murat Erbilici', 'fener.muro.1907@gmail.com', 'Ankara', 'test123', '$2y$10$rKOgvkDGlRsT9lBML/dL5eLt3b6kI6oOVyGXUwQqK5Bs0EtJiUUCC', 'admin', 'asdasdadsdas', '2024-08-07 10:38:42'),
(4, 'Murat Erbilici', 'fener.mussro.1907@gmail.com', 'Ankara', 'test1234', '$2y$10$VuM4vFN37ZW0B3NAF1Oh3uO8zlffngZKPRcEpTPd.ejl4ju16elju', 'user', 'asd', '2024-08-07 12:02:18'),
(5, 'test111', 'asdasdas@gmail.com', 'İstanbul', 'test111', '$2y$10$OyADiGgQMFUc/VXjHN1A4OdVacK8Pky1lphca.lcXMOtqrVaG2yqS', 'user', 'test111', '2024-08-10 11:13:02');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Tablo için indeksler `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `comments_ibfk_1` (`post_id`),
  ADD KEY `comments_ibfk_2` (`user_id`);

--
-- Tablo için indeksler `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`media_id`);

--
-- Tablo için indeksler `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `posts_ibfk_1` (`category_id`),
  ADD KEY `posts_ibfk_2` (`user_id`);

--
-- Tablo için indeksler `post_categories`
--
ALTER TABLE `post_categories`
  ADD PRIMARY KEY (`post_id`,`category_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Tablo için indeksler `post_media`
--
ALTER TABLE `post_media`
  ADD KEY `media_id` (`media_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- Tablo için AUTO_INCREMENT değeri `media`
--
ALTER TABLE `media`
  MODIFY `media_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Tablo için AUTO_INCREMENT değeri `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=281;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`post_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `posts_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `post_categories`
--
ALTER TABLE `post_categories`
  ADD CONSTRAINT `post_categories_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `post_categories_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `posts` (`post_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `post_media`
--
ALTER TABLE `post_media`
  ADD CONSTRAINT `post_media_ibfk_1` FOREIGN KEY (`media_id`) REFERENCES `media` (`media_id`),
  ADD CONSTRAINT `post_media_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `posts` (`post_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
