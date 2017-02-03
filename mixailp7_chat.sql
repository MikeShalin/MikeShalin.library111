-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Фев 03 2017 г., 13:53
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
-- Создание: Фев 03 2017 г., 09:35
-- Последнее обновление: Фев 03 2017 г., 10:38
--

DROP TABLE IF EXISTS `library`;
CREATE TABLE `library` (
  `id` int(10) NOT NULL,
  `author` text NOT NULL,
  `flag` int(1) DEFAULT '0',
  `title` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `library`
--

INSERT INTO `library` (`id`, `author`, `flag`, `title`) VALUES
(7, '2_3', 0, 'Java Script'),
(8, '4', 0, 'Книга 2'),
(9, '4', 0, 'Кавказская пленница'),
(10, '2_4', 0, 'Сказки '),
(13, '3_4_7', 0, 'Карлсон'),
(14, '3_4_9', 0, 'Всегда говори да'),
(15, '1_2', 0, '451 градус по Фаренгейту'),
(16, '2', 0, 'Биография'),
(17, '2_3', 0, 'Иван Васильевич меняет профессию'),
(18, '2_3', 1, 'Морфий'),
(29, '3_4_14', 0, 'Новая книга2'),
(31, '1', 1, '666'),
(32, '15', 1, '446'),
(33, '1', 0, '6666');

-- --------------------------------------------------------

--
-- Структура таблицы `messages`
--
-- Создание: Янв 21 2017 г., 00:20
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE `messages` (
  `id` int(10) UNSIGNED NOT NULL,
  `login` varchar(50) NOT NULL,
  `text` varchar(250) NOT NULL,
  `time` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `messages`
--

INSERT INTO `messages` (`id`, `login`, `text`, `time`) VALUES
(1123, 'Test', 'Test', 1484904159),
(1124, 'Test', '', 1484904183),
(1125, 'Admin', 'Hi', 1485011646),
(1126, 'Admin', 'Привет', 1485156031),
(1127, 'Admin', '', 1485156031),
(1128, 'Михаил Иванович', 'Привет Корчин!', 1485162567),
(1129, 'Корчин', 'Привет Михаил Иванович!', 1485162577),
(1130, 'К', 'Е', 1485323584);

-- --------------------------------------------------------

--
-- Структура таблицы `writer`
--
-- Создание: Фев 03 2017 г., 09:34
-- Последнее обновление: Фев 03 2017 г., 09:45
--

DROP TABLE IF EXISTS `writer`;
CREATE TABLE `writer` (
  `ide` int(10) NOT NULL,
  `name` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `writer`
--

INSERT INTO `writer` (`ide`, `name`) VALUES
(1, 'Рей Брэдбери'),
(2, 'Булгаков'),
(3, 'Достоевский'),
(4, 'Лермонтов '),
(7, 'Карабас'),
(9, 'Джим Керри'),
(13, 'Таракан'),
(14, 'Горький'),
(15, 'Мистер Захар');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `library`
--
ALTER TABLE `library`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `writer`
--
ALTER TABLE `writer`
  ADD PRIMARY KEY (`ide`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `library`
--
ALTER TABLE `library`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT для таблицы `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1131;
--
-- AUTO_INCREMENT для таблицы `writer`
--
ALTER TABLE `writer`
  MODIFY `ide` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
