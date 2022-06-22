-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 24, 2019 at 11:39 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `boxmovie`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin'),
(2, 'test', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `name` varchar(15) NOT NULL,
  `subject` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `text` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `name`, `subject`, `email`, `text`) VALUES
(66, 'Milos', 'Pozdrav', 'milos@email.com', 'najbolji ste od svihhh!'),
(67, 'Marko', 'Odlicni ste', 'marko@marko.com', 'Odlicni ste, svaka cast!'),
(68, 'Nikola', 'Film', 'nikola@gmail.com', 'Da li imate film \"Aladdin\" ?');

-- --------------------------------------------------------

--
-- Table structure for table `movie`
--

CREATE TABLE `movie` (
  `id` int(100) NOT NULL,
  `title` varchar(255) NOT NULL,
  `year` int(4) NOT NULL,
  `rating` float NOT NULL,
  `genre` varchar(50) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `movie`
--

INSERT INTO `movie` (`id`, `title`, `year`, `rating`, `genre`, `img`) VALUES
(34, 'Ten things I hate about you', 2014, 7.6, 'drama', 'ten-things.jpg'),
(35, 'Zookeeper', 2011, 5.2, 'comedy', 'zookeeper.jpg'),
(36, 'Side Effects', 2013, 7.1, 'thriller', 'side-effects.jpg'),
(40, 'Piranhas', 2019, 6.6, 'drama', 'piranhas.jpg'),
(41, 'Tel Aviv on Fire', 2018, 7.2, 'comedy', 'tel-aviv-on-fire.jpg'),
(42, 'Crawl', 2019, 6.8, 'thriller', 'crawl.jpg'),
(45, 'The Farewell', 2019, 8.1, 'comedy', 'the-firewell.jpg'),
(46, 'The Nightingale', 2018, 6.3, 'thriller', 'nightingale.jpg'),
(47, 'Inception', 2010, 8.8, 'action', 'inception.jpg'),
(48, 'The Intouchables', 2011, 8.5, 'comedy', 'the-intouchables.jpg'),
(54, 'Warrior', 2011, 8.9, 'drama', 'warrior.jpg'),
(55, 'Life Is Beautiful', 1997, 9.3, 'comedy', 'life-is-beautiful.jpg'),
(58, 'The Shawshank Redemption', 1994, 9.4, 'drama', 'shawshank-redemption.jpg'),
(61, 'The Professional', 1994, 8.4, 'crime', 'the-professional.jpg'),
(62, 'The Green Mile', 1999, 9.7, 'crime', 'green-mile.jpg'),
(63, 'Dora and the Lost City of Gold', 2019, 6.8, 'action', 'dora.jpg'),
(65, '47 Meters Down', 2019, 5.3, 'drama', '47-meters-down.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `movie_url`
--

CREATE TABLE `movie_url` (
  `id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `url` varchar(255) NOT NULL,
  `description` varchar(4000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `movie_url`
--

INSERT INTO `movie_url` (`id`, `movie_id`, `url`, `description`) VALUES
(21, 34, 'https://www.youtube.com/embed/R2GH5rFuj3I', 'He is then shown around the school by Michael, who will become his best friend.'),
(22, 35, 'https://www.youtube.com/embed/krvwtRbK5nM', 'A group of zoo animals decide to break their code of silence in order to help their lovable zookeeper find love, without opting to leave his current job for something more illustrious.'),
(23, 36, 'https://www.youtube.com/embed/EFEou3MBLi4', 'Emily Taylor, despite being reunited with her husband from prison.'),
(24, 40, 'https://www.youtube.com/embed/C41N5rBbjrQ', 'A gang of teenage boys stalk the streets of Naples armed with hand guns and AK-47s to do their mob bosses\' bidding.'),
(25, 41, 'https://www.youtube.com/embed/P_jzyeVhbpw', 'Salam, an inexperienced young Palestinian man, becomes a writer on a popular soap opera after a chance meeting with an Israeli soldier. '),
(26, 42, 'https://www.youtube.com/embed/H6MLJG0RdDE', 'Against all logic, the competitive swimmer, Haley, drives into the mouth of a furiously destructive Category 5 hurricane on a collision course with her hometown of Florida, to check in on her estranged father, Dave. '),
(28, 45, 'https://www.youtube.com/embed/RofpAjqwMa8', 'A headstrong Chinese-American woman returns to China when her beloved grandmother is diagnosed with terminal cancer. '),
(29, 46, 'https://www.youtube.com/embed/YuP8g_GQIgI', 'Set in 1825, Clare, a young Irish convict woman, chases a British officer through the rugged Tasmanian wilderness, bent on revenge for a terrible act of violence he committed against her family.'),
(30, 47, 'https://www.youtube.com/embed/8hP9D6kZseM', 'Dom Cobb is a skilled thief, the absolute best in the dangerous art of extraction, stealing valuable secrets from deep within the subconscious during the dream state, when the mind is at its most vulnerable. '),
(31, 48, 'https://www.youtube.com/embed/34WIbmXkewU', 'In Paris, the aristocratic and intellectual Philippe is a quadriplegic millionaire who is interviewing candidates for the position of his carer, with his red-haired secretary Magalie.'),
(32, 54, 'https://www.youtube.com/embed/kY7HcUACs58', 'Two brothers face the fight of a lifetime - and the wreckage of their broken family - within the brutal, high-stakes world of Mixed Martial Arts (MMA) fighting'),
(33, 55, 'https://www.youtube.com/embed/8CTjcVr9Iao', 'In 1930s Italy, a carefree Jewish book keeper named Guido starts a fairy tale life by courting and marrying a lovely woman from a nearby city.'),
(36, 58, 'https://www.youtube.com/embed/6hB3S9bIaco', 'Chronicles the experiences of a formerly successful banker as a prisoner in the gloomy jailhouse of Shawshank after being found guilty of a crime he did not commit.'),
(38, 61, 'https://www.youtube.com/embed/jawVxq1Iyl0', 'Mathilda, a 12-year-old girl, is reluctantly taken in by LÃ©on, a professional assassin, after her family is murdered.'),
(39, 62, 'https://www.youtube.com/embed/Ki4haFrqSrw', 'The lives of guards on Death Row are affected by one of their charges: a black man accused of child murder and rape, yet who has a mysterious gift.'),
(40, 63, 'https://www.youtube.com/embed/gUTtJjV852c', 'Dora, a teenage explorer, leads her friends on an adventure to save her parents and solve the mystery behind a lost city of gold.'),
(41, 65, 'https://www.youtube.com/embed/ddYSGGJAKOk', 'Four teen girls diving in a ruined underwater city quickly learn they\'ve entered the territory of the deadliest shark species in the claustrophobic labyrinth of submerged caves.');

-- --------------------------------------------------------

--
-- Table structure for table `preview`
--

CREATE TABLE `preview` (
  `movie_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` varchar(50) NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `preview`
--

INSERT INTO `preview` (`movie_id`, `user_id`, `date`, `time`) VALUES
(65, 11, '24.10.2019.', '23:38:00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `city` varchar(30) DEFAULT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `first_name`, `last_name`, `email`, `phone`, `city`, `address`) VALUES
(11, 'nikola123', '111', 'Nikola', 'Petrovic', 'nikola@gmail.com', '064/123-22-22', 'Beograd', 'Milutina Milankovica 45'),
(13, 'mirkoBg', 'mirko', 'Mirko', 'Vasic', 'vaske@gmail.com', '069/231-23-13', 'Beograd', 'Bul. Zorana Djindjica'),
(23, 'mikibg89', '123', 'Mihailo', 'Mirkovic', 'miki@gmail.com', '063/127-44-33', 'Nis', 'Sremska 12c'),
(24, 'majazemun', 'maja123', 'Marija', 'Andjelkovic', 'maja@email.com', '064/345-44-12', 'Beograd', 'Bul. Zorana Djindjica 23'),
(25, 'noname', '123', 'Marko', 'Maslakovic', 'mare@mare.com', '069/456-99-08', 'Beograd', 'Milutina Minakovica 19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `movie_url`
--
ALTER TABLE `movie_url`
  ADD PRIMARY KEY (`id`),
  ADD KEY `movie_id` (`movie_id`);

--
-- Indexes for table `preview`
--
ALTER TABLE `preview`
  ADD PRIMARY KEY (`movie_id`,`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `movie`
--
ALTER TABLE `movie`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `movie_url`
--
ALTER TABLE `movie_url`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `movie_url`
--
ALTER TABLE `movie_url`
  ADD CONSTRAINT `movie_url_ibfk_1` FOREIGN KEY (`movie_id`) REFERENCES `movie` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `preview`
--
ALTER TABLE `preview`
  ADD CONSTRAINT `preview_ibfk_1` FOREIGN KEY (`movie_id`) REFERENCES `movie` (`id`),
  ADD CONSTRAINT `preview_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
