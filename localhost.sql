-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Фев 19 2020 г., 01:38
-- Версия сервера: 10.4.8-MariaDB
-- Версия PHP: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `project_2`
--
CREATE DATABASE IF NOT EXISTS `project_2` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `project_2`;

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `parent_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `name`, `parent_id`) VALUES
(1, 'Мужчинам', 0),
(2, 'Женщинам', 0),
(3, 'Детям', 0),
(4, 'Обувь', 1),
(5, 'Куртки', 1),
(6, 'Джинсы', 1),
(7, 'Рюкзаки', 1),
(8, 'Верхняя одежда', 2),
(9, 'Туфли', 2),
(10, 'Шляпки', 2),
(11, 'Игрушки', 3);

-- --------------------------------------------------------

--
-- Структура таблицы `goods`
--

CREATE TABLE `goods` (
  `id` int(11) NOT NULL,
  `pic` varchar(255) NOT NULL,
  `alt` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `price` int(6) NOT NULL,
  `categories_id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `goods`
--

INSERT INTO `goods` (`id`, `pic`, `alt`, `title`, `price`, `categories_id`) VALUES
(1, '1.jpg', 'Синяя куртка', 'Куртка синяя', 5400, 5),
(2, '4.jpg', 'кожанка', 'Кожаная куртка', 22500, 5),
(3, '3.png', 'куртка', 'Куртка с карманом', 9200, 5),
(4, '2.jpg', 'куртка', 'куртка с капюшоном', 6100, 8),
(5, '5.jpg', 'куртка', 'Куртка Casual', 8800, 8),
(6, '6.jpg', 'кожанка', 'Стильная кожаная куртка', 12800, 5),
(7, '7.jpg', 'кеды', 'Кеды серые', 2900, 4),
(8, '8.jpg', 'кеды', 'Кеды черные', 4500, 4),
(9, '9.jpg', 'кеды', 'Кеды Casual', 5900, 9),
(10, '10.jpg', 'кеды', 'Кеды всепогодные', 9200, 9),
(11, '11.jpg', 'джинсы', 'Джинсы', 4800, 6),
(12, '12.jpg', 'джинсы', 'Джинсы голубые', 4200, 6);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `login` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `login`, `password`, `reg_date`) VALUES
(1, 'Aleksey', 'Sokolov', 'alex', '1f32aa4c9a1d2ea010adcf2348166a04', '2020-02-02 14:51:07');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `goods`
--
ALTER TABLE `goods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
