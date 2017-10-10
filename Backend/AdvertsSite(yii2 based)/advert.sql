-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Час створення: Лип 14 2017 р., 15:10
-- Версія сервера: 10.1.16-MariaDB
-- Версія PHP: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База даних: `yii2.local`
--

-- --------------------------------------------------------

--
-- Структура таблиці `advert`
--

CREATE TABLE `advert` (
  `idadvert` int(11) NOT NULL,
  `price` mediumint(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `fk_agent_detail` mediumint(11) NOT NULL,
  `bedroom` smallint(1) NOT NULL,
  `livingroom` smallint(1) NOT NULL,
  `parking` smallint(1) NOT NULL,
  `kitchen` smallint(1) NOT NULL,
  `general_image` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `location` varchar(30) NOT NULL,
  `hot` smallint(1) NOT NULL,
  `sold` smallint(1) NOT NULL,
  `type` varchar(50) NOT NULL,
  `recommend` smallint(1) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `advert`
--
ALTER TABLE `advert`
  ADD PRIMARY KEY (`idadvert`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `advert`
--
ALTER TABLE `advert`
  MODIFY `idadvert` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
