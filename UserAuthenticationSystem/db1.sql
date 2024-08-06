-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 06 Ağu 2024, 10:02:06
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
-- Veritabanı: `db1`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `token` varchar(250) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `token`) VALUES
(1, 'username1', 'email1@gmail.com', '$2y$10$N4qV0r8QioRwC', '0'),
(2, 'username2', 'email2@gmail.com', '$2y$10$AssArWal6CbDn', '0'),
(5, 'username3', 'email3@gmail.com', '$2y$10$MUkTq1Vg91ta4', '0'),
(6, 'test1', 'test1@gmail.com', '$2y$10$m42gE0SeUaATY', '0'),
(7, 'test123', 'test123@gmail.com', '$2y$10$YfGeaWh/egmbC', '0'),
(8, 'testtest', 'testtest@gmail.com', '$2y$10$Wv9miTouPAofZ', '0'),
(9, '123123', 'asd22222211@asd.com', '$2y$10$Tt791Rz5xugfy', '0'),
(15, 'register123', 'register123@gmail.com', '$2y$10$xAyZhOuUVDi6Q', '0'),
(16, 'test', 'test@gmail.com', '$2y$10$JF/du3PAgJGtO', '0'),
(17, 'asd asd', 'asdasd1@gmail.com', '$2y$10$gNaJ.PqmCyJxf', '0'),
(19, 'test12345', 'test12345@gmail.com', '$2y$10$pI1bXbPwRm/r2', '0'),
(20, 'testacc', 'testacc@gmail.com', '$2y$10$vDnKzzpFsQQA0jOxZFlgRuhqr6OMDBruCNdEqMdg4sXelQyyjM2Km', '0');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
