-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 30 Tem 2024, 14:25:43
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
-- Veritabanı: `company`
--

DELIMITER $$
--
-- Yordamlar
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `UpdateEmployeeSalary` ()   BEGIN
    DECLARE CONTINUE HANDLER FOR SQLEXCEPTION
    BEGIN
        ROLLBACK;
    END;

    START TRANSACTION;

    UPDATE employee
    SET salary = salary * 2
    WHERE employee_id = 1;

    COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `UpdateSalaryByEmail` (IN `input_email` VARCHAR(50))   BEGIN
    DECLARE CONTINUE HANDLER FOR SQLEXCEPTION
    BEGIN
        ROLLBACK;
    END;

    START TRANSACTION;

    UPDATE employee
    SET salary = salary * 2
    WHERE email = input_email;

    COMMIT;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `department`
--

CREATE TABLE `department` (
  `department_id` int(10) NOT NULL,
  `department_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `employee`
--

CREATE TABLE `employee` (
  `employee_id` int(10) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `salary` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `employee`
--

INSERT INTO `employee` (`employee_id`, `first_name`, `last_name`, `email`, `salary`) VALUES
(0, 'David', 'Wilson', 'david.wilson@example.com', 28000),
(1, 'John', 'Doe', 'john.doe@example.com', 160000),
(2, 'Jane', 'Smith', 'jane.smith@example.com', 22000),
(3, 'Michael', 'Johnson', 'michael.johnson@example.com', 24000),
(4, 'Emily', 'Davis', 'emily.davis@example.com', 26000);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`department_id`);

--
-- Tablo için indeksler `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employee_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `email_2` (`email`);

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `department`
--
ALTER TABLE `department`
  ADD CONSTRAINT `constraint` FOREIGN KEY (`department_id`) REFERENCES `employee` (`employee_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
