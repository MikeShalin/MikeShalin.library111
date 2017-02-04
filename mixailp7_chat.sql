-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Фев 04 2017 г., 20:10
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
-- Структура таблицы `book`
--
-- Создание: Фев 04 2017 г., 16:07
-- Последнее обновление: Фев 04 2017 г., 17:09
--

DROP TABLE IF EXISTS `book`;
CREATE TABLE `book` (
  `book__id` int(10) NOT NULL,
  `book__title` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `book`
--

INSERT INTO `book` (`book__id`, `book__title`) VALUES
(26, 'Сказка про волка'),
(27, 'Новая книга');

-- --------------------------------------------------------

--
-- Структура таблицы `library`
--
-- Создание: Фев 04 2017 г., 16:09
-- Последнее обновление: Фев 04 2017 г., 17:09
--

DROP TABLE IF EXISTS `library`;
CREATE TABLE `library` (
  `writerId` int(10) NOT NULL,
  `bookId` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `library`
--

INSERT INTO `library` (`writerId`, `bookId`) VALUES
(2, 26),
(3, 26),
(4, 26),
(2, 27),
(3, 27),
(4, 27);

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
-- Создание: Фев 04 2017 г., 16:07
-- Последнее обновление: Фев 04 2017 г., 14:11
--

DROP TABLE IF EXISTS `writer`;
CREATE TABLE `writer` (
  `writer__id` int(10) NOT NULL,
  `writer__name` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `writer`
--

INSERT INTO `writer` (`writer__id`, `writer__name`) VALUES
(1, 'Рей Брэдбери'),
(2, 'Булгаков'),
(3, 'Достоевский'),
(4, 'Лермонтов '),
(14, 'Горький');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`book__id`);

--
-- Индексы таблицы `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `writer`
--
ALTER TABLE `writer`
  ADD PRIMARY KEY (`writer__id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `book`
--
ALTER TABLE `book`
  MODIFY `book__id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT для таблицы `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1131;
--
-- AUTO_INCREMENT для таблицы `writer`
--
ALTER TABLE `writer`
  MODIFY `writer__id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
