-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Янв 28 2017 г., 09:40
-- Версия сервера: 5.7.15-9-beget-log
-- Версия PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `mixailp7_chat`
--

-- --------------------------------------------------------

--
-- Структура таблицы `library`
--
-- Создание: Янв 26 2017 г., 12:40
-- Последнее обновление: Янв 27 2017 г., 18:57
--

DROP TABLE IF EXISTS `library`;
CREATE TABLE `library` (
  `id` int(10) NOT NULL,
  `author` varchar(55) NOT NULL,
  `flag` int(1) DEFAULT '0',
  `title` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `library`
--

INSERT INTO `library` (`id`, `author`, `flag`, `title`) VALUES
(58, 'фыав', 0, 'ываф'),
(59, 'admin', 0, 'test'),
(60, '3', 0, '3'),
(61, '4', 0, '4'),
(68, 'мала', 0, 'мала');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `library`
--
ALTER TABLE `library`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `library`
--
ALTER TABLE `library`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
