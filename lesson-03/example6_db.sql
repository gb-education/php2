-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 26 2018 г., 02:55
-- Версия сервера: 5.6.38
-- Версия PHP: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `world`
--

-- --------------------------------------------------------

--
-- Структура таблицы `city`
--

CREATE TABLE `city` (
  `ID` int(11) NOT NULL,
  `Name` varchar(50) DEFAULT NULL,
  `CountryCode` int(11) DEFAULT NULL,
  `Capital` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `city`
--

INSERT INTO `city` (`ID`, `Name`, `CountryCode`, `Capital`) VALUES
(1, 'Vologda', 1, 0),
(2, 'Moscow', 1, 1),
(3, 'Lviv', 2, 0),
(4, 'Kiev', 2, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `country`
--

CREATE TABLE `country` (
  `id` int(11) NOT NULL,
  `Code` int(11) DEFAULT NULL,
  `Name` varchar(50) DEFAULT NULL,
  `Capital` int(11) DEFAULT NULL,
  `Region` varchar(50) DEFAULT NULL,
  `Population` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `country`
--

INSERT INTO `country` (`id`, `Code`, `Name`, `Capital`, `Region`, `Population`) VALUES
(1, 1, 'Russia', 2, 'Europe', 120000),
(2, 2, 'Ukraine', 4, 'Europe', 30000);

-- --------------------------------------------------------

--
-- Структура таблицы `countrylanguage`
--

CREATE TABLE `countrylanguage` (
  `ID` int(11) NOT NULL,
  `Language` varchar(20) DEFAULT NULL,
  `CountryCode` int(11) DEFAULT NULL,
  `IsOfficial` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `countrylanguage`
--

INSERT INTO `countrylanguage` (`ID`, `Language`, `CountryCode`, `IsOfficial`) VALUES
(1, 'ru', 1, 'T'),
(2, 'ua', 2, 'T');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `countrylanguage`
--
ALTER TABLE `countrylanguage`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `city`
--
ALTER TABLE `city`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `country`
--
ALTER TABLE `country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `countrylanguage`
--
ALTER TABLE `countrylanguage`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
