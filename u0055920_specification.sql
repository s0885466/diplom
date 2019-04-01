-- phpMyAdmin SQL Dump
-- version 4.4.15.10
-- https://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Апр 01 2019 г., 19:01
-- Версия сервера: 5.7.23-24
-- Версия PHP: 5.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `u0055920_specification`
--

-- --------------------------------------------------------

--
-- Структура таблицы `tb_category`
--

CREATE TABLE IF NOT EXISTS `tb_category` (
  `id` int(11) NOT NULL,
  `gost` varchar(30) NOT NULL,
  `title` varchar(100) NOT NULL,
  `img` varchar(50) NOT NULL,
  `short_description` varchar(150) NOT NULL,
  `type_id` int(11) NOT NULL,
  `link` varchar(30) NOT NULL,
  `material` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `tb_category`
--

INSERT INTO `tb_category` (`id`, `gost`, `title`, `img`, `short_description`, `type_id`, `link`, `material`) VALUES
(1, 'ГОСТ 19903-2015', 'Лист ГОСТ 19903-2015', 'img/sheet/gost19903.jpg', 'Настоящий стандарт распространяется на листовой горячекатаный прокат (далее - прокат) шириной 500 мм и более, изготовляемый в листах толщиной от 0,4 м', 2, 'cat/sheet/1', 'Ст3кп2 ГОСТ 14637-89*'),
(2, 'ГОСТ 19904-90', 'Лист ГОСТ 19904-90', 'img/sheet/gost19904.jpg', 'Настоящий стандарт распространяется на листовой холоднокатаный прокат шириной 500 мм и более, изготовляемый в листах толщиной от 0,35 до 5,00 мм, руло', 2, 'cat/sheet/2', 'Ст3кп2 ГОСТ 14637-89*'),
(3, 'ГОСТ 8568-77', 'Ступени из листа ГОСТ 8568-77', 'img/sheet/gost8568.jpg', 'Настоящий стандарт распространяется на стальные горячекатаные с односторонним ромбическим и чечевичным рифлением листы общего назначения.', 2, 'cat/sheet/3', 'Ст3пс2 ГОСТ 380-2005'),
(4, 'ГОСТ 8568-77', 'Покрытие из листа ГОСТ 8568-77', 'img/cover/gost8568.jpg', 'Листы стальные с ромбическим и чечевичным рифлением для обшивки строительных площадок', 3, 'cat/cover/1', 'Ст3пс2 ГОСТ 380-2005'),
(5, 'ГОСТ 8240-97', 'Швеллер ГОСТ 8240-97', 'img/structural_section/gost8240.jpg', 'Швеллер — стандартный профиль конструктивных элементов из чёрного проката, имеющего «П»-образное сечение. Используется в качестве опорной конструкции ', 1, 'cat/structural_section/1', 'Ст3пс2 ГОСТ 535-2005'),
(6, 'ГОСТ 8509-93', 'Уголок ГОСТ 8509-93', 'img/structural_section/gost8509.jpg', 'Уголо́к — является катаным, тянутым или гнутым профилем, один из базовых элементов металлических конструкций. Уголок представляет собой балку Г-образн', 1, 'cat/structural_section/2', 'Ст3пс2 ГОСТ 535-2005'),
(7, 'ГОСТ 103-2006', 'Полоса ГОСТ 103-2006 для отбортовки', 'img/structural_section/gost103.jpg', 'Полоса стальная горячекатаная для отбортовки площадок обслуживания', 1, 'cat/structural_section/3', 'Ст3кп2 ГОСТ 535-2005'),
(8, 'ГОСТ 8732-78', 'Труба ГОСТ 8732-78', 'img/structural_section/gost8732.jpg', 'Настоящий стандарт распространяется на горячедеформированные бесшовные стальные трубы общего назначения, изготовляемые по наружному диаметру, толщине ', 1, 'cat/structural_section/4', 'Ст4сп ГОСТ 8731-74'),
(9, 'ГОСТ 9467-75*', 'Электроды ГОСТ 9467-75', 'img/electrode/gost9467.jpg', 'Электроды покрытые металлические для ручной дуговой сварки', 4, 'cat/electrode/1', '-'),
(10, 'ГОСТ 2590-2006', 'Круг ГОСТ 2590-2006', 'img/structural_section/gost2590.jpg', 'Настоящий стандарт распространяется на сортовой стальной горячекатаный прокат круглого сечения (далее - прокат) диаметром от 5 до 270 мм включительно,', 1, 'cat/structural_section/5', 'Ст3кп2 ГОСТ 535-2005');

-- --------------------------------------------------------

--
-- Структура таблицы `tb_element`
--

CREATE TABLE IF NOT EXISTS `tb_element` (
  `id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `gost_id` int(3) NOT NULL,
  `material_id` int(11) NOT NULL,
  `weight` float NOT NULL,
  `note` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `tb_element`
--

INSERT INTO `tb_element` (`id`, `cat_id`, `name`, `gost_id`, `material_id`, `weight`, `note`) VALUES
(1, 5, 'Швеллер 8У', 5, 5, 7.05, 'м'),
(2, 5, 'Швеллер 10У', 5, 5, 8.59, 'м'),
(3, 5, 'Швеллер 12У', 5, 5, 10.4, 'м'),
(4, 5, 'Швеллер 14У', 5, 5, 12.3, 'м'),
(5, 5, 'Швеллер 16У', 5, 5, 14.2, 'м'),
(6, 5, 'Швеллер 18У', 5, 5, 16.3, 'м'),
(7, 5, 'Швеллер 20У', 5, 5, 17.4, 'м'),
(8, 5, 'Швеллер 22У', 5, 5, 21, 'м'),
(9, 5, 'Швеллер 24У', 5, 5, 24, 'м'),
(10, 5, 'Швеллер 30У', 5, 5, 31.8, 'м'),
(11, 6, 'Уголок 32x32x3', 6, 6, 1.46, 'м'),
(12, 6, 'Уголок 50x50x5', 6, 6, 3.77, 'м'),
(13, 6, 'Уголок 75x75x5', 6, 6, 5.8, 'м'),
(14, 7, 'Полоса 4x140-B', 7, 7, 4.4, 'м'),
(15, 7, 'Полоса 5x140-B', 7, 7, 5.5, 'м'),
(16, 7, 'Полоса 6x140-B', 7, 7, 6.59, 'м'),
(17, 7, 'Полоса 7x140-B', 7, 7, 7.69, 'м'),
(18, 8, 'Труба 57x2,5', 8, 8, 3.36, 'м'),
(19, 8, 'Труба 76x3', 8, 8, 5.4, 'м'),
(20, 8, 'Труба 89x3', 8, 8, 6.36, 'м'),
(21, 8, 'Труба 108x4,5', 8, 8, 11.49, 'м'),
(22, 8, 'Труба 133x4', 8, 8, 12.72, 'м'),
(23, 8, 'Труба 159x4,5', 8, 8, 17.15, 'м'),
(24, 1, 'Лист', 1, 1, 7.85, 'шт'),
(26, 3, 'Лист ромб. В-ПН-', 3, 3, 8.375, 'шт'),
(27, 9, 'Электроды Э42А', 9, 9, 1, 'кг'),
(28, 9, 'Электроды Э50А', 9, 9, 1, 'кг'),
(35, 2, 'Лист', 2, 2, 7.85, 'шт'),
(38, 4, 'Лист ромб. В-ПН-4,0', 4, 4, 33.5, 'м²'),
(39, 10, 'Круг 8', 10, 10, 0.395, 'м'),
(40, 10, 'Круг 10', 10, 10, 0.617, 'м'),
(41, 10, 'Круг 12', 10, 10, 0.888, 'м'),
(42, 10, 'Круг 14', 10, 10, 1.208, 'м');

-- --------------------------------------------------------

--
-- Структура таблицы `tb_pivot`
--

CREATE TABLE IF NOT EXISTS `tb_pivot` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `elem_id` int(11) NOT NULL,
  `gost` varchar(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `amount` double NOT NULL,
  `material` varchar(30) NOT NULL,
  `weight` double NOT NULL,
  `all_weight` double NOT NULL,
  `note` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=81 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `tb_pivot`
--

INSERT INTO `tb_pivot` (`id`, `user_id`, `cat_id`, `elem_id`, `gost`, `name`, `amount`, `material`, `weight`, `all_weight`, `note`) VALUES
(1, 13, 5, 2, 'ГОСТ 8240-97', 'Швеллер 10У', 1.2, 'Ст3пс2 ГОСТ 535-2005', 8.59, 10.308, 'м'),
(4, 13, 2, 25, 'ГОСТ 19904-2015', 'Лист 10x200x250', 25, 'Ст3кп2 ГОСТ 14637-89*', 3.925, 98.125, 'шт'),
(5, 13, 1, 24, 'ГОСТ 19903-2015', 'Лист 10x100x100', 5, 'Ст3кп2 ГОСТ 14637-89*', 0.785, 3.925, 'шт'),
(11, 25, 1, 24, 'ГОСТ 19903-2015', 'Лист 10x100x100', 78, 'Ст3кп2 ГОСТ 14637-89*', 0.78, 60.8, 'шт'),
(12, 13, 9, 27, 'ГОСТ 9467-75*', 'Электроды Э42А', 5, '-', 1, 5, 'кг'),
(13, 13, 5, 7, 'ГОСТ 8240-97', 'Швеллер 20У', 5, 'Ст3пс2 ГОСТ 535-2005', 17.4, 87, 'м'),
(14, 28, 1, 24, 'ГОСТ 19903-2015', 'Лист 3x1200x2400', 15, 'Ст3кп2 ГОСТ 14637-89*', 67.824, 1017.36, 'шт'),
(15, 28, 8, 19, 'ГОСТ 8732-78', 'Труба 76x3', 200, 'Ст4сп ГОСТ 8731-74', 5.4, 1080, 'м'),
(16, 28, 9, 28, 'ГОСТ 9467-75*', 'Электроды Э50А', 10, '-', 1, 10, 'кг'),
(17, 13, 5, 5, 'ГОСТ 8240-97', 'Швеллер 16У', 3, 'Ст3пс2 ГОСТ 535-2005', 14.2, 42.6, 'м'),
(18, 28, 5, 4, 'ГОСТ 8240-97', 'Швеллер 14У', 88, 'Ст3пс2 ГОСТ 535-2005', 12.3, 1082.4, 'м'),
(19, 33, 5, 4, 'ГОСТ 8240-97', 'Швеллер 14У', 1.1, 'Ст3пс2 ГОСТ 535-2005', 12.3, 13.53, 'м'),
(20, 33, 6, 11, 'ГОСТ 8509-93', 'Уголок 32x32x3', 2, 'Ст3пс2 ГОСТ 535-2005', 1.46, 2.92, 'м'),
(21, 33, 7, 15, 'ГОСТ 103-2006', 'Полоса 5x140-B', 1.2, 'Ст3кп2 ГОСТ 535-2005', 5.5, 6.6, 'м'),
(22, 34, 5, 2, 'ГОСТ 8240-97', 'Швеллер 10У', 1, 'Ст3пс2 ГОСТ 535-2005', 8.59, 8.6, 'м'),
(23, 34, 6, 12, 'ГОСТ 8509-93', 'Уголок 50x50x5', 0.2, 'Ст3пс2 ГОСТ 535-2005', 3.77, 0.8, 'м'),
(25, 35, 9, 27, 'ГОСТ 9467-75*', 'Электроды Э42А', 3, '-', 1, 3, 'кг'),
(26, 35, 6, 11, 'ГОСТ 8509-93', 'Уголок 32x32x3', 15, 'Ст3пс2 ГОСТ 535-2005', 1.46, 21.9, 'м'),
(28, 37, 5, 4, 'ГОСТ 8240-97', 'Швеллер 14У', 0.7, 'Ст3пс2 ГОСТ 535-2005', 12.3, 8.6, 'м'),
(29, 37, 5, 7, 'ГОСТ 8240-97', 'Швеллер 20У', 1.6, 'Ст3пс2 ГОСТ 535-2005', 17.4, 27.8, 'м'),
(30, 37, 6, 12, 'ГОСТ 8509-93', 'Уголок 50x50x5', 20, 'Ст3пс2 ГОСТ 535-2005', 3.77, 75.4, 'м'),
(31, 37, 9, 27, 'ГОСТ 9467-75*', 'Электроды Э42А', 0.5, '-', 1, 0.5, 'кг'),
(32, 35, 4, 38, 'ГОСТ 8568-77', 'Лист ромб. В-ПН-4,0', 55, 'Ст3пс2 ГОСТ 380-2005', 33.5, 1842.5, 'м²'),
(33, 35, 3, 26, 'ГОСТ 8568-77', 'Лист ромб. В-ПН- 6x200x600', 63, 'Ст3пс2 ГОСТ 380-2005', 6.03, 379.89, 'шт'),
(34, 35, 5, 1, 'ГОСТ 8240-97', 'Швеллер 8У', 0.9, 'Ст3пс2 ГОСТ 535-2005', 7.05, 6.3, 'м'),
(35, 35, 7, 15, 'ГОСТ 103-2006', 'Полоса 5x140-B', 1.1, 'Ст3кп2 ГОСТ 535-2005', 5.5, 6, 'м'),
(39, 40, 5, 2, 'ГОСТ 8240-97', 'Швеллер 10У', 40, 'Ст3пс2 ГОСТ 535-2005', 8.59, 343.6, 'м'),
(40, 40, 7, 14, 'ГОСТ 103-2006', 'Полоса 4x140-B', 12, 'Ст3кп2 ГОСТ 535-2005', 4.4, 52.8, 'м'),
(41, 40, 6, 12, 'ГОСТ 8509-93', 'Уголок 50x50x5', 30, 'Ст3пс2 ГОСТ 535-2005', 3.77, 113.1, 'м'),
(42, 40, 6, 11, 'ГОСТ 8509-93', 'Уголок 32x32x3', 13.5, 'Ст3пс2 ГОСТ 535-2005', 1.46, 19.7, 'м'),
(43, 40, 6, 13, 'ГОСТ 8509-93', 'Уголок 75x75x5', 7, 'Ст3пс2 ГОСТ 535-2005', 5.8, 40.6, 'м'),
(44, 40, 3, 26, 'ГОСТ 8568-77', 'Лист ромб. В-ПН- 4x340x600', 1, 'Ст3пс2 ГОСТ 380-2005', 6.83, 6.8, 'шт'),
(45, 40, 4, 38, 'ГОСТ 8568-77', 'Лист ромб. В-ПН-4,0', 8, 'Ст3пс2 ГОСТ 380-2005', 33.5, 268, 'м²'),
(46, 40, 3, 26, 'ГОСТ 8568-77', 'Лист ромб. В-ПН- 4x500x1000', 1, 'Ст3пс2 ГОСТ 380-2005', 16.75, 16.8, 'шт'),
(47, 40, 1, 24, 'ГОСТ 19903-2015', 'Лист 10x200x200', 6, 'Ст3кп2 ГОСТ 14637-89*', 3.14, 18.8, 'шт'),
(48, 40, 1, 24, 'ГОСТ 19903-2015', 'Лист 5x30x30', 5, 'Ст3кп2 ГОСТ 14637-89*', 0.04, 0.2, 'шт'),
(49, 40, 1, 24, 'ГОСТ 19903-2015', 'Лист 5x80x500', 2, 'Ст3кп2 ГОСТ 14637-89*', 1.57, 3.1, 'шт'),
(50, 41, 8, 19, 'ГОСТ 8732-78', 'Труба 76x3', 1.2, 'Ст4сп ГОСТ 8731-74', 5.4, 6.5, 'м'),
(51, 41, 1, 24, 'ГОСТ 19903-2015', 'Лист 10x200x200', 15, 'Ст3кп2 ГОСТ 14637-89*', 3.14, 47.1, 'шт'),
(52, 42, 1, 24, 'ГОСТ 19903-2015', 'Лист 10x100x100', 15, 'Ст3кп2 ГОСТ 14637-89*', 0.78, 11.8, 'шт'),
(53, 42, 5, 7, 'ГОСТ 8240-97', 'Швеллер 20У', 1.8, 'Ст3пс2 ГОСТ 535-2005', 17.4, 31.3, 'м'),
(54, 48, 6, 11, 'ГОСТ 8509-93', 'Уголок 32x32x3', 2, 'Ст3пс2 ГОСТ 535-2005', 1.46, 2.9, 'м'),
(55, 48, 6, 13, 'ГОСТ 8509-93', 'Уголок 75x75x5', 2, 'Ст3пс2 ГОСТ 535-2005', 5.8, 11.6, 'м'),
(56, 48, 8, 20, 'ГОСТ 8732-78', 'Труба 89x3', 5, 'Ст4сп ГОСТ 8731-74', 6.36, 31.8, 'м'),
(57, 25, 2, 35, 'ГОСТ 19904-90', 'Лист 10x200x300', 6, 'Ст3кп2 ГОСТ 14637-89*', 4.71, 28.3, 'шт'),
(58, 25, 6, 12, 'ГОСТ 8509-93', 'Уголок 50x50x5', 6.7, 'Ст3пс2 ГОСТ 535-2005', 3.77, 25.3, 'м'),
(59, 54, 10, 40, 'ГОСТ 2590-2006', 'Круг 10', 0.3, 'Ст3кп2 ГОСТ 535-2005', 0.62, 0.2, 'м'),
(62, 61, 4, 38, 'ГОСТ 8568-77', 'Лист ромб. В-ПН-4,0', 6.7, 'Ст3пс2 ГОСТ 380-2005', 33.5, 224.4, 'м²'),
(63, 61, 10, 40, 'ГОСТ 2590-2006', 'Круг 10', 5, 'Ст3кп2 ГОСТ 535-2005', 0.617, 3.1, 'м'),
(64, 65, 5, 2, 'ГОСТ 8240-97', 'Швеллер 10У', 6, 'Ст3пс2 ГОСТ 535-2005', 8.59, 51.5, 'м'),
(66, 65, 1, 24, 'ГОСТ 19903-2015', 'Лист 10x200x300', 15, 'Ст3кп2 ГОСТ 14637-89*', 4.71, 70.65, 'шт'),
(67, 66, 5, 2, 'ГОСТ 8240-97', 'Швеллер 10У', 15, 'Ст3пс2 ГОСТ 535-2005', 8.59, 128.85, 'м'),
(68, 66, 6, 12, 'ГОСТ 8509-93', 'Уголок 50x50x5', 5.5, 'Ст3пс2 ГОСТ 535-2005', 3.77, 20.7, 'м'),
(69, 66, 9, 27, 'ГОСТ 9467-75*', 'Электроды Э42А', 0.4, '-', 1, 0.4, 'кг'),
(70, 35, 10, 39, 'ГОСТ 2590-2006', 'Круг 8', 1.1, 'Ст3кп2 ГОСТ 535-2005', 0.395, 0.4345, 'м'),
(71, 35, 4, 38, 'ГОСТ 8568-77', 'Лист ромб. В-ПН-4,0', 1, 'Ст3пс2 ГОСТ 380-2005', 33.5, 33.5, 'м²'),
(72, 35, 5, 2, 'ГОСТ 8240-97', 'Швеллер 10У', 5, 'Ст3пс2 ГОСТ 535-2005', 8.59, 42.95, 'м'),
(73, 35, 5, 4, 'ГОСТ 8240-97', 'Швеллер 14У', 10, 'Ст3пс2 ГОСТ 535-2005', 12.3, 123, 'м'),
(74, 35, 5, 5, 'ГОСТ 8240-97', 'Швеллер 16У', 8, 'Ст3пс2 ГОСТ 535-2005', 14.2, 113.6, 'м'),
(75, 160, 1, 24, 'ГОСТ 19903-2015', 'Лист 10x200x300', 15.3, 'Ст3кп2 ГОСТ 14637-89*', 4.71, 72.063, 'шт'),
(76, 160, 5, 2, 'ГОСТ 8240-97', 'Швеллер 10У', 5, 'Ст3пс2 ГОСТ 535-2005', 8.59, 42.95, 'м'),
(77, 160, 5, 3, 'ГОСТ 8240-97', 'Швеллер 12У', 3, 'Ст3пс2 ГОСТ 535-2005', 10.4, 31.2, 'м'),
(78, 160, 6, 12, 'ГОСТ 8509-93', 'Уголок 50x50x5', 15, 'Ст3пс2 ГОСТ 535-2005', 3.77, 56.55, 'м'),
(79, 160, 6, 11, 'ГОСТ 8509-93', 'Уголок 32x32x3', 15, 'Ст3пс2 ГОСТ 535-2005', 1.46, 21.9, 'м'),
(80, 160, 4, 38, 'ГОСТ 8568-77', 'Лист ромб. В-ПН-4,0', 2.4, 'Ст3пс2 ГОСТ 380-2005', 33.5, 80.4, 'м²');

-- --------------------------------------------------------

--
-- Структура таблицы `tb_type`
--

CREATE TABLE IF NOT EXISTS `tb_type` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `link` varchar(30) NOT NULL,
  `title` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `tb_type`
--

INSERT INTO `tb_type` (`id`, `name`, `link`, `title`) VALUES
(1, 'Профиль', 'cat/structural_section', 'Профиль из стальных конструкций'),
(2, 'Лист', 'cat/sheet', 'Листовой прокат различной толщины и формы'),
(3, 'Покрытие', 'cat/cover', 'Покрытие для строительных площадок из листа'),
(4, 'Электроды', 'cat/electrode', 'Сварочные электроды различных марок');

-- --------------------------------------------------------

--
-- Структура таблицы `tb_users`
--

CREATE TABLE IF NOT EXISTS `tb_users` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(32) NOT NULL,
  `permission` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=174 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `tb_users`
--

INSERT INTO `tb_users` (`id`, `name`, `email`, `password`, `permission`) VALUES
(35, 'admin', '0885466@gmail.com', 'f108c5307613a1e006d31352ea5ca522', 1),
(66, 'diplom.itmo', 'diplom.itmo@yandex.ru', '58fee92c87b0f5c88bb270bb3f8b25c7', 0),
(67, 'RobertBlupt', '1test@life-hacki.ru', '954de906b4c854711e930cab23713132', 0),
(68, 'gasprokem', 'romapotrashkin@yandex.ru', '558ad6e18fb7492d37fa092c569d99f3', 0),
(69, 'ThomasVak', 'murtdswd@yandex.com', '773335aaa1c642859ffdc804f94d70a0', 0),
(70, 'Richardphece', 'yansidor97@mail.ru', '148e09d4d558fec3cdae6c3082f850f5', 0),
(71, 'Marvincrela', 'scherbakovahristina89@mail.ru', '13e445b82e512b0e2ad63565545c4caf', 0),
(72, 'kuffarkem', 'nocchaetranaz1972@yandex.ru', 'f44e6e09728728c9c0eadd195de62621', 0),
(73, 'Patrickgem', 'ih.rearbeitsagentur@gmail.com', '6d02c5695a5ecdccf2828ec08a75694e', 0),
(74, 'evroopkem', 'willcanate1974@yandex.ru', '11b884b6131afefc2569163a7bbf84ee', 0),
(75, 'Timothyapory', 'ty5gh@yandex.com', '281d7687233f7f171e023a0c9854fdd6', 0),
(76, 'Normaflies', 'savants@econika-tehno.ru', '58557c5a27648462711108c8270318d7', 0),
(77, 'ArchieLow', 'robiwilly7@gmail.com', '15ad0a504f41d14914149f5c2e72ffa5', 0),
(78, 'telecokem', 'alvirapotapkina@yandex.ru', '547fd423ff6f6466b925cb64a938dcae', 0),
(79, 'Edwardslete', 'khaydaralikas9@mail.ru', 'bd7ecf33a1a13740eefc25ec8d02442c', 0),
(80, 'Geroslin', 'feranos@bigmir.net', 'ead68f83f1ebc36bac052ea057e172b9', 0),
(81, 'ZacharyBop', 'natuly.sid@mail.ru', 'f826442ae9bb347cf93a6d254bf94f42', 0),
(82, 'franPymn', 'gold.ma.n.wor.d.de.l.e.ve.r.y.', '881f4f2aa6e2f1693e9fed33ab863fcd', 0),
(83, 'AlexisSip', 'stnslvkovalevskiy@gmail.com', '59bcbdc597e74adff9e0a5985e8c759a', 0),
(84, 'belarukem', 'potorankova@yandex.ru', 'de0f49b17e7733149fecf11a614286a9', 0),
(85, 'petryashcok', 'vaclav_kuba.634@yahoo.com', '47d48f3ed1c4a8358cfb273cf80b6a6f', 0),
(86, 'Rakusmedepyday', 'nazar.travkin.80@mail.ru', '290a274ab43e49e3897c05f6983028a8', 0),
(87, 'Kayorlaubs', 'andriychenko.rus@mail.ru', '8d7c6015153f4371b84a81673cde9bab', 0),
(88, 'Sigmorbiopy', 'rostislav.chernykh.76@mail.ru', 'ca1eed7473cc64a96a259a2aa38a6ff3', 0),
(89, 'TornPayomojag', 'tolik.kozyrev.8181@mail.ru', '451de55fee9d4900984911734caec34c', 0),
(90, 'ShawnWoxia', 'andreyka.kokhalskiy@mail.ru', 'd04348bb3a87c90f2e009cc0a28c76d3', 0),
(91, 'Hengleysweardy', 'bronislav.skulanov@mail.ru', '83d185803579e9c33dd78d029f6a6e8c', 0),
(92, 'HamilCoeda', 'lnya.chumarov@mail.ru', 'cd0008325a017359bdfd69163678d2cf', 0),
(93, 'Rendellwem', 'nazar.kudiy@mail.ru', 'f81abe4b76955212165a806a3cd00bfb', 0),
(94, 'Juliogug', 'fedoroffiva5hcka@yandex.ru', '581d5d28f3664485f986b1fca1d1c7ad', 0),
(95, 'DanAcert', 'borislav.savlayev@mail.ru', '952a974ec822f38fd7e041e653dcddf7', 0),
(96, 'UmulLoulsotte', 'zakurenov.miroslav@mail.ru', '0b262a331f069caf7818a4a974ebdcd4', 0),
(97, 'KarryptoambIlkY', 'ladeev.andrey@mail.ru', 'ae72514fd7c7171b6a0526493063cb58', 0),
(98, 'Goosescetade', 'fpolukazakov@mail.ru', '7f014ae39aaf77bc9825c6717a09d4e4', 0),
(99, 'HaukeTifsbloff', 'stepan_veber@mail.ru', '8f272325cc96b9e34f5dfa9899374824', 0),
(100, 'GiacomoDoguncego', 'rosseev.boris@mail.ru', '8da27ece61a0ff77cd6fc33c2ae78f5e', 0),
(101, 'GunockElighig', 'yagryutenkov@mail.ru', 'c56f7ec973111d296f7608e6a176133a', 0),
(102, 'SigmorViguils', 'kirya.krugletskiy@mail.ru', '240482a9410f9f9c22750126d813325b', 0),
(103, 'Svenhishown', 'tsymbalov.mark@mail.ru', 'ff5c25821e350cfd68bde091c0742efe', 0),
(104, 'Gorokhepfleedy', 'lnya.zernayev@mail.ru', '17c6a56692c48a58571ea91b6c8b0b52', 0),
(105, 'FadiPreok', 'srednikov.kostya@mail.ru', '394d9932d75df7ce5b1668cf55abfac5', 0),
(106, 'SvenLourb', 'platon.appin@mail.ru', '66fb63467e62a5d9052fa90861914add', 0),
(107, 'KadokCon', 'garik.sinkevich.84@mail.ru', 'e32e0e13f117a20321bf9fc7580ff14d', 0),
(108, 'ArmonMib', 'bronislav.karaulnyy@mail.ru', 'e3ede0dcb73eef14d03d53c8a6f7837a', 0),
(109, 'Mannigclontanny', 'oreshko.albert@mail.ru', 'f0386088be49fd69524224be98cc7224', 0),
(110, 'IngvarIncexom', 'baganov.matyusha@mail.ru', 'c24f48f8f426ab44dde99c6ebe02d3bf', 0),
(111, 'Bossroult', 'garik.dutikova@mail.ru', '4266baa9432d2fad1b44a61d7720cdfd', 0),
(112, 'Kapotthcergo', 'bogdan.dzhurik@mail.ru', '8bfcde95756a517b41fa98ecae38f128', 0),
(113, 'UgocicAbeple', 'danil_terenchev@mail.ru', 'a148185fb66c24075d94e44f8274c3e2', 0),
(114, 'Kadokwah', 'ptr.buryanov@mail.ru', '92754e52b7d679a1f0bdc7eb9b38ddc5', 0),
(115, 'BerekSlurpappy', 'vasilevskiy_bogdan89@mail.ru', '3ca897a1e684ab0de066ff4aa5a90397', 0),
(116, 'BerekPLegeni', 'britov.igorek@mail.ru', '66b40456f00bee8531df979c6e88225f', 0),
(117, 'Arthurmon', 'sergei.popov8080@mail.ru', 'dd009ea324c5dbe1d9b7572bc307390d', 0),
(118, 'ArokkhAdannaw', 'rysik.andrey@mail.ru', 'ff512efbb3a9d6dc6ed57cec95389735', 0),
(119, 'Dimitarcam', 'kseryanin@mail.ru', '8d88e14b84a833bc3c01f3a2dc53cd0a', 0),
(120, 'SilvioGOF', 'trofim.belyayev.91@mail.ru', '3c45ffaf465375636c8bbd56731c1bcf', 0),
(121, 'IngvarHegulky', 'lakhno2020@mail.ru', '3ff5fd0e638d6379b6a8780897136766', 0),
(122, 'FadiPreok', 'vladilen.deligoydin@mail.ru', '394d9932d75df7ce5b1668cf55abfac5', 0),
(123, 'AnktosShoudiono', 'slizkoukhiy.valera@mail.ru', 'df0191e0f88df855740f3068be762516', 0),
(124, 'SvenLourb', 'viter_tolya@mail.ru', '66fb63467e62a5d9052fa90861914add', 0),
(125, 'Patrickgem', 'ihr.earbeitsagentur@gmail.com', '6d02c5695a5ecdccf2828ec08a75694e', 0),
(126, 'Malirdiomb', 'krutchenko.den@mail.ru', '5fcdf58f11c7ea56422bd27d29730049', 0),
(127, 'Mannigclontanny', 'tukhmanov.toni@mail.ru', 'f0386088be49fd69524224be98cc7224', 0),
(128, 'IngvarIncexom', 'kleshovb84@mail.ru', 'c24f48f8f426ab44dde99c6ebe02d3bf', 0),
(129, 'Bossroult', 'avstriyakov.maks@mail.ru', '4266baa9432d2fad1b44a61d7720cdfd', 0),
(130, 'BramtoxAbnoro', 'peduraru.danil@mail.ru', '26669b6eaf1a8af0b4313b3ade2f118b', 0),
(131, 'IvanAnase', 'valera.kyarginskiy@mail.ru', '1a1f56abcf1893c41ac5700b1c5d6539', 0),
(132, 'Kadokwah', 'psenkov.lavrentiy@mail.ru', '92754e52b7d679a1f0bdc7eb9b38ddc5', 0),
(133, 'BerekSlurpappy', 'kaklyukhin.tima@mail.ru', '3ca897a1e684ab0de066ff4aa5a90397', 0),
(134, 'BerekPLegeni', 'grintsevich.anatoliy@mail.ru', '66b40456f00bee8531df979c6e88225f', 0),
(135, 'ArokkhAdannaw', 'shashin-lenechka@mail.ru', 'ff512efbb3a9d6dc6ed57cec95389735', 0),
(136, 'CruzExereSuef', 'vladilen.lotsman@mail.ru', 'f16b54f30e682fe5f84b734002282295', 0),
(137, 'ZarkosFem', 'borislav.dubitskiy@mail.ru', '6e6e657c99e1384bd2552a47046e89b0', 0),
(138, 'Jackfeatt', 'mark.gandilyan@mail.ru', '648724dd417f21b6a1b65b3a35d510a2', 0),
(139, 'NemrokMub', 'rostislav.filippov.92@mail.ru', 'd6be78be5bc834b6f960cd2edab5293c', 0),
(140, 'Mitchmor', 'albert.zalesnov@mail.ru', '5e0e212a7712628a52f8cf3d2bbb364c', 0),
(141, 'MiltenVoraruimi', 'zhora.plyashnikov@mail.ru', '95a99c146f3191e76fba8986d965c7ac', 0),
(142, 'GoranKak', 'tume.vitya@mail.ru', '29a45fa2babcc8519e62541574bfd3b6', 0),
(143, 'Arokkhlew', 'fakhrutdinov.vyacheslav@mail.r', 'bdfccfbe48ea42a9109cec70353b8ac4', 0),
(144, 'Goraneageway', 'robert.vorkin@mail.ru', '6feb11d6164ce8943e4d3a15ee23fa46', 0),
(145, 'IvanAnase', 'ilya.gubanov.2020@mail.ru', '1a1f56abcf1893c41ac5700b1c5d6539', 0),
(146, 'JarockZer', 'stas-golopolosov@mail.ru', '7f1f12fed144835b6cd60a3a7fa583b5', 0),
(147, 'KipplerMag', 'voldykov.gerasim@mail.ru', 'adb116d6ed4cbf69402b03053a5951b6', 0),
(148, 'Enzodonydiund', 'slavik.tsebinoga@mail.ru', 'd83f645a4d7b1d616454890ac6ff309c', 0),
(149, 'EusebioEffopleve', 'efeodotev@mail.ru', 'c563e3c90279879fd66c8b83e590f7aa', 0),
(150, 'UmulOutliva', 'stas.guytar@mail.ru', 'd0d384a3bea7a252c1978cc0a4c4e9ca', 0),
(151, 'Kipplerdrerank', 'verzilov.genrikh@mail.ru', '65df27d747cbff8e51bc89019c69966e', 0),
(152, 'VolkarDYNGEAGUE', 'ivan.korobko.76@mail.ru', 'ca930b9da2e62e97735a218278bee18e', 0),
(153, 'Falksmats', 'bbalmazov@mail.ru', 'dd2e6e6e31be843c7fef42dae0ae5283', 0),
(154, 'Grubuzalkarry', 'budinov.anatoliy@mail.ru', '93a2798f6448ef2528476093b09d4a1f', 0),
(155, 'NorrisBit', 'lesha.gaponnikov@mail.ru', 'beeff558b062757217091fc3221aa2f4', 0),
(156, 'Kliffblued', 'andryusha.gutor@mail.ru', '7c56d0721b8ea40aad203d67b33db140', 0),
(157, 'Armonseali', 'vitya.kaydanovich@mail.ru', '3c610cde4fa55980764e0156de5b824a', 0),
(158, 'MiltenVof', 'gerasim.vodolazhenko@mail.ru', '56c02c82c5999d265065ad72e22a512d', 0),
(159, 'Mamukeldewly', 'slavik.shanskov@mail.ru', '9ac4cc58319b278db6e74cd9dac71bb4', 0),
(160, 'litcup', 'lithium696.cup@mail.ru', 'c1a7ff5c8b9315a97315837dbb17852c', 0),
(161, 'litcup', 'lithium696.cup@gmail.com', 'ddd31bf4166cd781d4f76ab00412e776', 0),
(162, 'MasonKem', 'adam.prokopovich.95@mail.ru', '2539070bd2034b6fff04c3b9b6636626', 0),
(163, 'RiordianRer', 'boris.neplokh@mail.ru', '7b1737af8f41da47147783b81103a9be', 0),
(164, 'WenzelHar', 'kolokhov.boris@mail.ru', '5187479ae97a2f7809d88156d1ecb6a7', 0),
(165, 'BrontobbTefeJeato', 'lyubishin_sasha@mail.ru', 'f380d4358654081ab5da0d93b99e71f5', 0),
(166, 'Taklarfum', 'petrishin_2020@mail.ru', '22be4b7cc8a7160606373cc8deaf46ba', 0),
(167, 'MiltenClurrible', 'pyergin@mail.ru', '0ebc44e8523b4df5fbe437316aefde8f', 0),
(168, 'YugulEmapy', 'slava.chekaldin@mail.ru', '348839c0a114c13baa3d0cdad43ac0ab', 0),
(169, 'KelvinBrimmep', 'tishenkov.vladilen@mail.ru', 'a7d64fd37a4dd36f1ae1179c73e43a69', 0),
(170, 'KalanUseroto', 'piksaykin.tolik@mail.ru', '38dd8848578fb4a03f9b089239181a9f', 0),
(171, 'Kasimjum', 'platon.mevius@mail.ru', 'e821c96ab7d58642d9243e56e2eedf4e', 0),
(172, 'Riordianwem', 'namatevs.robert@mail.ru', 'f81abe4b76955212165a806a3cd00bfb', 0),
(173, 'MilokToppy', 'dima_stanovoy@mail.ru', '7382c4c393dff3c6d7f74c3584211e5e', 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `tb_category`
--
ALTER TABLE `tb_category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `elem_id` (`title`);

--
-- Индексы таблицы `tb_element`
--
ALTER TABLE `tb_element`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `tb_pivot`
--
ALTER TABLE `tb_pivot`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `tb_type`
--
ALTER TABLE `tb_type`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `tb_category`
--
ALTER TABLE `tb_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT для таблицы `tb_element`
--
ALTER TABLE `tb_element`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT для таблицы `tb_pivot`
--
ALTER TABLE `tb_pivot`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=81;
--
-- AUTO_INCREMENT для таблицы `tb_type`
--
ALTER TABLE `tb_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=174;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
