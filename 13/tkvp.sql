-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Июн 04 2013 г., 18:41
-- Версия сервера: 5.5.25
-- Версия PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `tkvp`
--

-- --------------------------------------------------------

--
-- Структура таблицы `specialty`
--

CREATE TABLE IF NOT EXISTS `specialty` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) DEFAULT NULL,
  `Budjet` int(11) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Дамп данных таблицы `specialty`
--

INSERT INTO `specialty` (`Id`, `Name`, `Budjet`) VALUES
(8, 'Промышленный шпионаж', 5),
(9, 'Лентяево', 25),
(10, 'Крутотенечка', 2),
(11, 'Бульбовник', 13),
(12, 'Колорадский жук', 999),
(13, 'Тополиный пух', 9);

-- --------------------------------------------------------

--
-- Структура таблицы `specialty_subject`
--

CREATE TABLE IF NOT EXISTS `specialty_subject` (
  `Specialty_Id` int(11) NOT NULL,
  `Subject_Id` int(11) NOT NULL,
  PRIMARY KEY (`Specialty_Id`,`Subject_Id`),
  KEY `Subject_Id` (`Subject_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- СВЯЗИ ТАБЛИЦЫ `specialty_subject`:
--   `Specialty_Id`
--       `specialty` -> `Id`
--   `Subject_Id`
--       `subject` -> `Id`
--

--
-- Дамп данных таблицы `specialty_subject`
--

INSERT INTO `specialty_subject` (`Specialty_Id`, `Subject_Id`) VALUES
(8, 3),
(10, 3),
(11, 3),
(12, 3),
(8, 4),
(9, 4),
(10, 4),
(9, 5),
(11, 5),
(12, 5),
(13, 5),
(11, 6),
(12, 6),
(13, 6);

-- --------------------------------------------------------

--
-- Структура таблицы `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) DEFAULT NULL,
  `Surname` varchar(50) DEFAULT NULL,
  `Specialty_Id` int(11) DEFAULT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `Specialty_Id` (`Specialty_Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- СВЯЗИ ТАБЛИЦЫ `student`:
--   `Specialty_Id`
--       `specialty` -> `Id`
--

--
-- Дамп данных таблицы `student`
--

INSERT INTO `student` (`Id`, `Name`, `Surname`, `Specialty_Id`) VALUES
(1, 'Трололо', 'Иванович', 11);

-- --------------------------------------------------------

--
-- Структура таблицы `student_subject`
--

CREATE TABLE IF NOT EXISTS `student_subject` (
  `Student_Id` int(11) NOT NULL,
  `Subject_Id` int(11) NOT NULL,
  `Mark` smallint(6) NOT NULL,
  PRIMARY KEY (`Student_Id`,`Subject_Id`),
  KEY `Subject_Id` (`Subject_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- СВЯЗИ ТАБЛИЦЫ `student_subject`:
--   `Student_Id`
--       `student` -> `Id`
--   `Subject_Id`
--       `subject` -> `Id`
--

--
-- Дамп данных таблицы `student_subject`
--

INSERT INTO `student_subject` (`Student_Id`, `Subject_Id`, `Mark`) VALUES
(1, 3, 5),
(1, 5, 8),
(1, 6, 9);

-- --------------------------------------------------------

--
-- Структура таблицы `subject`
--

CREATE TABLE IF NOT EXISTS `subject` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Дамп данных таблицы `subject`
--

INSERT INTO `subject` (`Id`, `Name`) VALUES
(3, 'Математика'),
(4, 'Русский язык'),
(5, 'Физика'),
(6, 'Китайский язык');

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `specialty_subject`
--
ALTER TABLE `specialty_subject`
  ADD CONSTRAINT `specialty_subject_ibfk_1` FOREIGN KEY (`Specialty_Id`) REFERENCES `specialty` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `specialty_subject_ibfk_2` FOREIGN KEY (`Subject_Id`) REFERENCES `subject` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`Specialty_Id`) REFERENCES `specialty` (`Id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `student_subject`
--
ALTER TABLE `student_subject`
  ADD CONSTRAINT `student_subject_ibfk_1` FOREIGN KEY (`Student_Id`) REFERENCES `student` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_subject_ibfk_2` FOREIGN KEY (`Subject_Id`) REFERENCES `subject` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
