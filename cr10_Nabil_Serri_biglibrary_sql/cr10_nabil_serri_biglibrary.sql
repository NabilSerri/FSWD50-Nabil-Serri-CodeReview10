-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 10, 2018 at 03:17 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cr10_nabil_serri_biglibrary`
--

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `Author_id` int(11) NOT NULL,
  `Author_name` varchar(30) NOT NULL,
  `Author_surname` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`Author_id`, `Author_name`, `Author_surname`) VALUES
(1, 'Wendi', 'Silvano'),
(2, 'Teresa', 'Driscoll'),
(3, 'Vi', 'Keeland'),
(4, 'Michael ', 'Diamond'),
(5, 'Emily ', 'Winfield Martin'),
(6, 'Liane', 'Moriarty'),
(7, 'Michael', 'Crichton'),
(8, 'J.K', 'Rowling'),
(9, 'Howard', 'Waldrop'),
(10, 'Michael', 'Connelly'),
(11, 'Wendi ', 'Silvano');

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `Media_id` int(11) NOT NULL,
  `ISBN_code` int(11) NOT NULL,
  `title` varchar(30) NOT NULL,
  `image` varchar(250) NOT NULL,
  `short_description` mediumtext NOT NULL,
  `type` enum('book','CD','DVD') NOT NULL,
  `status` enum('available','not_available') NOT NULL,
  `publish_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `fk_Authors` int(11) NOT NULL,
  `fk_Publisher` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`Media_id`, `ISBN_code`, `title`, `image`, `short_description`, `type`, `status`, `publish_date`, `fk_Authors`, `fk_Publisher`) VALUES
(2, 2, 'I Am Watching You', 'https://images-na.ssl-images-amazon.com/images/I/51PeVt0WznL.jpg', 'When Ella Longfield overhears two attractive young men flirting with teenage girls on a train, she thinks nothing of it—until she realises they are fresh out of prison and her maternal instinct is put on high alert. But just as she’s decided to call for help, something stops her. The next day, she wakes up to the news that one of the girls—beautiful, green-eyed Anna Ballard—has disappeared.', 'book', 'available', '2018-11-09 12:08:12', 2, 2),
(3, 3, 'Hate Notes', 'https://images-na.ssl-images-amazon.com/images/I/41a2YMkLdkL.jpg', 'It all started with a mysterious blue note sewn into a wedding dress.\r\n\r\nSomething blue.\r\n\r\nI’d gone to sell my own unworn bridal gown at a vintage clothing store. That’s when I found another bride’s “something old.”', 'book', 'available', '2018-11-09 12:08:17', 3, 3),
(4, 4, 'Beastie Boys Book', 'https://images-na.ssl-images-amazon.com/images/I/517mPobgYBL._SX346_BO1,204,203,200_.jpg', 'A panoramic experience that tells the story of Beastie Boys, a book as unique as the band itself—by band members ADROCK and Mike D, with contributions from Amy Poehler, Colson Whitehead, Spike Jonze, Wes Anderson, Luc Sante, and more.\r\n', 'CD', 'not_available', '2018-11-09 12:08:22', 4, 4),
(5, 5, 'The Wonderful Things You Will ', 'https://images-na.ssl-images-amazon.com/images/I/51gEY86ijML._SX474_BO1,204,203,200_.jpg', 'The New York Times bestseller that celebrates the dreams, acceptance, and love that parents have for their children . . . now and forever! \r\n', 'CD', 'not_available', '2018-11-09 12:08:26', 5, 5),
(6, 6, 'Nine Perfect Strangers', 'https://images-na.ssl-images-amazon.com/images/I/51L8BF5PZ3L.jpg', 'Nine people gather at a remote health resort. Some are here to lose weight, some are here to get a reboot on life, some are here for reasons they can’t even admit to themselves. Amidst all of the luxury and pampering, the mindfulness and meditation, they know these ten days might involve some real work. But none of them could imagine just how challenging the next ten days are going to be.\r\n\r\n', 'book', 'available', '2018-11-09 13:07:31', 6, 6),
(7, 7, 'A Case of Need: A Novel', 'https://images-na.ssl-images-amazon.com/images/I/51MCT9rFURL.jpg', 'In the tightly knit world of Boston medicine, the Randall family reigns supreme. When heart surgeon J. D. Randall’s teenage daughter dies during a botched abortion, the medical community threatens to explode. Was it malpractice? A violation of the Hippocratic Oath? Or was Karen Randall murdered in cold blood?\r\n\r\n', 'DVD', 'not_available', '2018-11-09 13:11:47', 7, 7),
(8, 8, 'Harry Potter and the Sorcerer', 'https://images-na.ssl-images-amazon.com/images/I/51U6bQbA8oL.jpg', '\"Turning the envelope over, his hand trembling, Harry saw a purple wax seal bearing a coat of arms; a lion, an eagle, a badger and a snake surrounding a large letter \'H\'.\"\r\n', 'book', 'available', '2018-11-09 13:15:46', 8, 8),
(9, 9, 'Them Bones', 'https://images-na.ssl-images-amazon.com/images/I/51uZ7ug9nhL.jpg', 'Madison Yazoo Leake, of the bombed-out, radiation-ridden twenty-first century, wanted to stop World War Three before it began.\r\n', 'DVD', 'available', '2018-11-09 13:18:59', 9, 9),
(10, 10, 'Dark Sacred Night', 'https://images-na.ssl-images-amazon.com/images/I/419I1kvh7IL.jpg', 'Detective Renée Ballard is working the night beat--known in LAPD slang as \"the late show\"--and returns to Hollywood Station in the early hours to find a stranger rifling through old file cabinets. The intruder is retired detective Harry Bosch, working a cold case that has gotten under his skin.\r\n\r\n', 'DVD', 'not_available', '2018-11-09 13:23:03', 10, 10),
(53, 11, 'Turkey Trouble', 'https://images-na.ssl-images-amazon.com/images/I/51vJ-6d-dDL._SY483_BO1,204,203,200_.jpg', 'Turkey is in trouble. Bad trouble. The kind of trouble where it\'s almost Thanksgiving . . . and you\'re the main\r\ncourse. But Turkey has an idea--what if he doesn\'t look like a turkey? What if he looks like another animal instead?\r\n', 'book', 'not_available', '2018-11-10 13:11:11', 11, 11);

-- --------------------------------------------------------

--
-- Table structure for table `publisher`
--

CREATE TABLE `publisher` (
  `Publisher_id` int(11) NOT NULL,
  `Publisher_name` varchar(30) NOT NULL,
  `Publisher_adress` varchar(100) NOT NULL,
  `Publisher_size` enum('big','medium','small') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `publisher`
--

INSERT INTO `publisher` (`Publisher_id`, `Publisher_name`, `Publisher_adress`, `Publisher_size`) VALUES
(1, 'Two Lions', 'United States', 'small'),
(2, 'Thomas', 'usa', 'small'),
(3, 'Montlake Romance', 'austria', 'medium'),
(4, 'Spiegel & Grau', 'germany', 'big'),
(5, 'Random House', 'usa', 'medium'),
(6, 'Flatiron Books', 'Australia', 'big'),
(7, 'Open Road Media', 'France', 'medium'),
(8, 'Pottermore Publishing', 'USA', 'big'),
(9, 'Endeavour Venture', 'Romania', 'medium'),
(10, 'Brown Company', 'united kingdom', 'medium'),
(11, 'Two Lions', 'USA', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`Author_id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`Media_id`),
  ADD KEY `fk_Authors` (`fk_Authors`),
  ADD KEY `fk_Publisher` (`fk_Publisher`);

--
-- Indexes for table `publisher`
--
ALTER TABLE `publisher`
  ADD PRIMARY KEY (`Publisher_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `Author_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `Media_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `publisher`
--
ALTER TABLE `publisher`
  MODIFY `Publisher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `media`
--
ALTER TABLE `media`
  ADD CONSTRAINT `media_ibfk_1` FOREIGN KEY (`fk_Authors`) REFERENCES `authors` (`Author_id`),
  ADD CONSTRAINT `media_ibfk_2` FOREIGN KEY (`fk_Publisher`) REFERENCES `publisher` (`Publisher_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
