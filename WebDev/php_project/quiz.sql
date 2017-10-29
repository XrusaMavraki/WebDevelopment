-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2016 at 05:28 PM
-- Server version: 5.7.9
-- PHP Version: 5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quiz`
--
CREATE DATABASE IF NOT EXISTS `quiz` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `quiz`;

CREATE USER 'quiz_user'@'localhost' IDENTIFIED BY 'quiz';
GRANT ALL PRIVILEGES ON quiz.* TO 'quiz_user'@'localhost';

-- --------------------------------------------------------

--
-- Table structure for table `quiz_question`
--

DROP TABLE IF EXISTS `quiz_question`;
CREATE TABLE IF NOT EXISTS `quiz_question` (
  `question_id` int(11) NOT NULL AUTO_INCREMENT,
  `question` varchar(1000) NOT NULL,
  `ans1` varchar(1000) NOT NULL,
  `ans2` varchar(1000) NOT NULL,
  `ans3` varchar(1000) NOT NULL,
  `ans4` varchar(1000) NOT NULL,
  `correct` int(11) NOT NULL,
  PRIMARY KEY (`question_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `quiz_question`
--

INSERT INTO `quiz_question` (`question_id`, `question`, `ans1`, `ans2`, `ans3`, `ans4`, `correct`) VALUES
(1, 'Which US state is named on the label of a Jack Daniels bottle?', 'New York', 'Tennessee', 'Texas', 'Nebraska', 2),
(2, 'Nariyal is the Indian term for which nut?', 'Hazelnut', 'Peanut', 'Coconut', 'Banana', 3),
(3, 'Port Said is in which North African country?', 'Egypt', 'Morocco', 'Sudan', 'Libya', 1),
(4, 'In which year did Henry VIII become King of England?', '1209', '1309', '1409', '1509', 4),
(5, 'Which is the financial centre and main city of Switzerland? ', 'Geneva', 'Zurich', 'Bern', 'Lausanne', 2),
(6, 'What is the alternative common name for a Black Leopard?', 'Panther', 'Puma', 'Cheetah', 'Zebra', 1),
(7, 'The Hyundai car company is (at 2015) founded and based in', 'Russia', 'Japan', 'South Corea', 'China', 3),
(8, 'What is note is produced at the 10th fret for both the highest and lowest pitch strings on a conventionally-tuned standard guitar?', 'A', 'B', 'C', 'D', 4),
(9, 'In which UK cathedral is the Whispering Gallery?', 'St Richards', 'Chester Cathedral', 'Ely Cathedral', 'St Pauls', 4),
(10, 'What does an acrophobic fear?', 'Heights', 'Edges', 'Acrobats', 'Limbs', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
