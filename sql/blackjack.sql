-- phpMyAdmin SQL Dump
-- version 4.7.5
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Май 06 2018 г., 20:56
-- Версия сервера: 5.7.20
-- Версия PHP: 7.1.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `blackjack`
--
CREATE DATABASE IF NOT EXISTS `blackjack` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `blackjack`;

-- --------------------------------------------------------

--
-- Структура таблицы `test`
--
-- Создание: Май 01 2018 г., 22:02
-- Последнее обновление: Май 06 2018 г., 20:53
--

DROP TABLE IF EXISTS `test`;
CREATE TABLE `test` (
  `id` int(11) NOT NULL,
  `colname` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- ССЫЛКИ ТАБЛИЦЫ `test`:
--

--
-- Очистить таблицу перед добавлением данных `test`
--

TRUNCATE TABLE `test`;
--
-- Дамп данных таблицы `test`
--

INSERT INTO `test` (`id`, `colname`) VALUES
(1, 'What'),
(2, 'does'),
(3, 'the'),
(4, 'Fox'),
(5, 'say');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--
-- Создание: Май 06 2018 г., 20:56
-- Последнее обновление: Май 06 2018 г., 20:51
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(64) NOT NULL,
  `email` varchar(64) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- ССЫЛКИ ТАБЛИЦЫ `users`:
--

--
-- Очистить таблицу перед добавлением данных `users`
--

TRUNCATE TABLE `users`;
--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `date`) VALUES
(1, 'root', '$2y$10$lKpEyM9hIhiWuvQHSWBEhOlUcuVwgOIguy4t.s55rM0KkTfY/7F3W', 'adm@test.ru', '2018-05-01 22:32:41'),
(2, 'snipghost', '$2y$10$yC8GeAiLK7OW78CuBkAxyOQyIbUS8/mwjCxaNnITQVnKFR7WgHY9C', 'snipghost@list.ru', '2018-05-01 22:32:41'),
(3, 'ihikaru', '$2y$10$eOQbUmc.ulBW3dieVWlO7Oi3oKbTiSBv7DM1CmV.YrPj7xPNyUXqa', 'ihikaru@inbox.ru', '2018-05-01 22:33:17');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`) USING BTREE,
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `test`
--
ALTER TABLE `test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
