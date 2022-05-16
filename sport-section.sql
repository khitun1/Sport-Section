-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 16 2022 г., 07:11
-- Версия сервера: 10.3.13-MariaDB
-- Версия PHP: 7.1.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `sport-section`
--


-- --------------------------------------------------------

--
-- Структура таблицы `children`
--

CREATE TABLE `children` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'ID',
  `first_name_child` varchar(255) NOT NULL COMMENT 'Имя',
  `last_name_child` varchar(255) NOT NULL COMMENT 'Фамилия',
  `birthday` date NOT NULL COMMENT 'Дата рождения',
  `picture_url` text NOT NULL COMMENT 'Ссылка на изображение',
  `id_class` int(10) UNSIGNED NOT NULL COMMENT 'ID группы'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `children`
--

INSERT INTO `children` (`id`, `first_name_child`, `last_name_child`, `birthday`, `picture_url`, `id_class`) VALUES
(1, 'Антон', 'Говорухин', '2022-02-01', '', 1),
(2, 'Иван', 'Хитун', '2022-02-02', '', 1),
(3, 'sdf', 'sdf', '2022-03-05', '', 1),
(6, 'вап', 'пав', '2022-03-01', '', 51),
(7, 'ewq', 'qwe', '2022-03-02', '', 33);

-- --------------------------------------------------------

--
-- Структура таблицы `class`
--

CREATE TABLE `class` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'ID',
  `class` varchar(255) NOT NULL COMMENT 'Группа',
  `id_user` int(10) UNSIGNED NOT NULL COMMENT 'ID пользователя'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `class`
--

INSERT INTO `class` (`id`, `class`, `id_user`) VALUES
(1, '255', 1),
(33, '609_91', 2),
(51, '609_09', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `payment`
--

CREATE TABLE `payment` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'ID',
  `month` varchar(20) NOT NULL COMMENT 'Месяц',
  `year` year(4) NOT NULL COMMENT 'Год',
  `payment` int(10) DEFAULT NULL COMMENT 'Оплата',
  `id_children` int(10) UNSIGNED NOT NULL COMMENT 'ID ребёнка'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `payment`
--

INSERT INTO `payment` (`id`, `month`, `year`, `payment`, `id_children`) VALUES
(1, 'Июнь', 2014, 222, 1),
(2, 'Май', 2014, 10, 1),
(3, 'Июнь', 2015, 444, 1),
(4, 'Июнь', 2014, 33, 6),
(5, 'Июнь', 2014, 1000, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `plan`
--

CREATE TABLE `plan` (
  `id` int(10) NOT NULL COMMENT 'ID',
  `month` varchar(255) NOT NULL COMMENT 'Месяц',
  `year` int(10) NOT NULL COMMENT 'Год',
  `plan` int(10) NOT NULL COMMENT 'Плановая оплата',
  `id_class` int(10) UNSIGNED NOT NULL COMMENT 'ID группы'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `plan`
--

INSERT INTO `plan` (`id`, `month`, `year`, `plan`, `id_class`) VALUES
(1, 'Июнь', 2014, 10000, 1),
(5, 'Май', 2014, 20000, 1),
(6, 'Июнь', 2015, 15000, 1),
(7, 'Июнь', 2014, 4000, 51);

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'ID пользователя',
  `first_name` varchar(255) NOT NULL COMMENT 'Имя ',
  `last_name` varchar(255) NOT NULL COMMENT 'Фамилия',
  `login` varchar(255) NOT NULL COMMENT 'Логин',
  `md5password` varchar(255) NOT NULL COMMENT 'Пароль',
  `is_admin` int(10) UNSIGNED DEFAULT 0 COMMENT 'Права'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `login`, `md5password`, `is_admin`) VALUES
(1, 'Дмитрий', 'Кузин', 'kda', '12345', 0),
(2, 'Иван', 'Хитун', 'khitun1', 'qwerty1', 0),
(3, 'Евгений', 'Белоусов', 'belousov', '54321', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `visit`
--

CREATE TABLE `visit` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'ID',
  `date` date NOT NULL COMMENT 'Дата',
  `visit` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Посещение',
  `id_children` int(10) UNSIGNED NOT NULL COMMENT 'ID ребёнка'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `visit`
--

INSERT INTO `visit` (`id`, `date`, `visit`, `id_children`) VALUES
(1, '2022-03-01', 1, 1),
(2, '2022-03-02', 1, 2),
(3, '2022-03-02', 1, 6),
(4, '2022-03-02', 1, 1),
(5, '2022-03-08', 0, 7);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `children`
--
ALTER TABLE `children`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_class` (`id_class`) USING BTREE;

--
-- Индексы таблицы `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Индексы таблицы `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_children` (`id_children`);

--
-- Индексы таблицы `plan`
--
ALTER TABLE `plan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_class` (`id_class`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `visit`
--
ALTER TABLE `visit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_children` (`id_children`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `children`
--
ALTER TABLE `children`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'ID', AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `class`
--
ALTER TABLE `class`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'ID', AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT для таблицы `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'ID', AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `plan`
--
ALTER TABLE `plan`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'ID', AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'ID пользователя', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `visit`
--
ALTER TABLE `visit`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'ID', AUTO_INCREMENT=6;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `children`
--
ALTER TABLE `children`
  ADD CONSTRAINT `children_ibfk_1` FOREIGN KEY (`id_class`) REFERENCES `class` (`id`);

--
-- Ограничения внешнего ключа таблицы `class`
--
ALTER TABLE `class`
  ADD CONSTRAINT `class_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);

--
-- Ограничения внешнего ключа таблицы `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`id_children`) REFERENCES `children` (`id`);

--
-- Ограничения внешнего ключа таблицы `plan`
--
ALTER TABLE `plan`
  ADD CONSTRAINT `plan_ibfk_1` FOREIGN KEY (`id_class`) REFERENCES `class` (`id`);

--
-- Ограничения внешнего ключа таблицы `visit`
--
ALTER TABLE `visit`
  ADD CONSTRAINT `visit_ibfk_1` FOREIGN KEY (`id_children`) REFERENCES `children` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
