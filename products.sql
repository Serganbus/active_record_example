-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Ноя 04 2015 г., 14:44
-- Версия сервера: 5.5.25
-- Версия PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `test`
--

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `title`, `price`, `discount`, `description`) VALUES
(1, 'Помидор', 57, 5, 'обычный овощной продукт'),
(2, 'Огурцы', 33, 0, 'овощная культура, часто выращивается на огороде'),
(3, 'Арбуз', 15, 0, 'вкусняха еще та. Летом есть ее по-чаще!'),
(4, 'Петрушка', 15, 0, 'за один пучок цена'),
(5, 'Укроп', 15, 0, 'за один пучок цена'),
(6, 'Лимон', 235, 10, 'вид цитрусовых. цена за 1кг'),
(7, 'чеснок', 7, 0, 'поштучно');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
