-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2016 at 05:12 PM
-- Server version: 5.7.9
-- PHP Version: 5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `movies`
--
CREATE DATABASE IF NOT EXISTS `movies` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `movies`;


CREATE USER 'movies_user'@'localhost' IDENTIFIED BY 'movies';
GRANT ALL PRIVILEGES ON movies.* TO 'movies_user'@'localhost';

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(100) NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(1, 'Action'),
(2, 'Comedy'),
(3, 'Drama'),
(4, 'Romance'),
(5, 'Crime');

-- --------------------------------------------------------

--
-- Table structure for table `movie`
--

DROP TABLE IF EXISTS `movie`;
CREATE TABLE IF NOT EXISTS `movie` (
  `movie_id` int(11) NOT NULL AUTO_INCREMENT,
  `movie_name` varchar(400) NOT NULL,
  `movie_date` year(4) NOT NULL,
  `movie_img` varchar(500) NOT NULL,
  `movie_synopsis` varchar(2000) NOT NULL,
  PRIMARY KEY (`movie_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `movie`
--

INSERT INTO `movie` (`movie_id`, `movie_name`, `movie_date`, `movie_img`, `movie_synopsis`) VALUES
(1, 'DeadPool', 2016, 'photos/deadpool.jpg', 'A former Special Forces operative turned mercenary is subjected to a rogue experiment that leaves him with accelerated healing powers, adopting the alter ego Deadpool.'),
(2, 'Superman: Man of Steel', 2013, 'photos/man_of_steel.jpg', 'Clark Kent, one of the last of an extinguished race disguised as an unremarkable human, is forced to reveal his identity when Earth is invaded by an army of survivors who threaten to bring the planet to the brink of destruction.'),
(3, 'The Martian', 2015, 'photos/martian.jpg', 'An astronaut becomes stranded on Mars after his team assume him dead, and must rely on his ingenuity to find a way to signal to Earth that he is alive.'),
(4, 'Skyfall', 2012, 'photos/skyfall.jpg', 'Bond''s loyalty to M is tested when her past comes back to haunt her. Whilst MI6 comes under attack, 007 must track down and destroy the threat, no matter how personal the cost.'),
(5, '300', 2006, 'photos/300.jpg', 'King Leonidas of Sparta and a force of 300 men fight the Persians at Thermopylae in 480 B.C.'),
(6, 'How to be Single', 2016, 'photos/h_t_b_s.jpg', 'There''s a right way to be single, a wrong way to be single, and then...there''s Alice. And Robin. Lucy. Meg. Tom. David. New York City is full of lonely hearts seeking the right match, be it a love connection, a hook-up, or something in the middle. And somewhere between the teasing texts and one-night stands, what these unmarrieds all have in common is the need to learn how to be single in a world filled with ever-evolving definitions of love. Sleeping around in the city that never sleeps was never so much fun.'),
(7, 'The Interview', 2014, 'photos/interview.jpg', 'ave Skylark and producer Aaron Rapoport run the celebrity tabloid show "Skylark Tonight." When they land an interview with a surprise fan, North Korean dictator Kim Jong-un, they are recruited by the CIA to turn their trip to Pyongyang into an assassination mission.'),
(8, 'Pitch Perfect', 2012, 'photos/pitch_perfect.jpg', 'Beca, a freshman at Barden University, is cajoled into joining The Bellas, her school''s all-girls singing group. Injecting some much needed energy into their repertoire, The Bellas take on their male rivals in a campus competition.'),
(9, '21 Jump Street', 2012, 'photos/21_jump_street.jpg', 'A pair of underachieving cops are sent back to a local high school to blend in and bring down a synthetic drug ring.'),
(10, 'Easy A', 2010, 'photos/easyA.jpg', 'A clean-cut high school student relies on the school''s rumor mill to advance her social and financial standing.'),
(11, 'Gone Girl', 2014, 'photos/gone_girl.jpg', 'With his wife''s disappearance having become the focus of an intense media circus, a man sees the spotlight turned on him when it''s suspected that he may not be innocent.'),
(12, 'WhipLash', 2014, 'photos/whiplash.jpg', 'A promising young drummer enrolls at a cut-throat music conservatory where his dreams of greatness are mentored by an instructor who will stop at nothing to realize a student''s potential'),
(13, 'Room', 2015, 'photos/room.jpg', 'A young boy is raised within the confines of a small shed.'),
(14, 'The Green Mile', 1999, 'photos/green_mile.jpg', 'The lives of guards on Death Row are affected by one of their charges: a black man accused of child murder and rape, yet who has a mysterious gift.'),
(15, 'La vita e bella', 1997, 'photos/la_vita.jpg', 'When an open-minded Jewish librarian and his son become victims of the Holocaust, he uses a perfect mixture of will, humor and imagination to protect his son from the dangers around their camp.');

-- --------------------------------------------------------

--
-- Table structure for table `movie_categories`
--

DROP TABLE IF EXISTS `movie_categories`;
CREATE TABLE IF NOT EXISTS `movie_categories` (
  `movie_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY (`movie_id`,`category_id`),
  KEY `category_id` (`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `movie_categories`
--

INSERT INTO `movie_categories` (`movie_id`, `category_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(1, 2),
(3, 2),
(6, 2),
(7, 2),
(8, 2),
(9, 2),
(10, 2),
(11, 3),
(12, 3),
(13, 3),
(14, 3),
(15, 3),
(6, 4),
(15, 4),
(11, 5),
(14, 5);

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

DROP TABLE IF EXISTS `rating`;
CREATE TABLE IF NOT EXISTS `rating` (
  `movie_rating` int(11) NOT NULL DEFAULT '0',
  `movie_id` int(11) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  PRIMARY KEY (`movie_id`,`user_id`),
  KEY `rating_ibfk_2` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `UserName` varchar(100) NOT NULL,
  `PassWord` varchar(100) NOT NULL,
  PRIMARY KEY (`UserName`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserName`, `PassWord`) VALUES
('babis', '$2y$10$01fgnMcqfzgCWOykoKHwAO1rDW6olqJxUq3GE.PgRoWugqF063yaK'),
('melden', '$2y$10$Hlkl2gRJnacGWzDiHO3h2.03zmRJn3YIu1vgTHXsdF3lDvsdPuGle'),
('Skatopour', '$2y$10$GkDtOkrSXNuJyZBU2jP9fueA2KBySOFcybpXJz6mhfGptQZQEu51e');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `movie_categories`
--
ALTER TABLE `movie_categories`
  ADD CONSTRAINT `movie_categories_ibfk_1` FOREIGN KEY (`movie_id`) REFERENCES `movie` (`movie_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `movie_categories_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`) ON UPDATE CASCADE;

--
-- Constraints for table `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `rating_ibfk_1` FOREIGN KEY (`movie_id`) REFERENCES `movie` (`movie_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rating_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`UserName`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
