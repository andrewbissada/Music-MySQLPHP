-- phpMyAdmin SQL Dump
-- version 4.0.10.18
-- https://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Apr 25, 2017 at 04:18 PM
-- Server version: 5.6.28-76.1-log
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `andrew79_601`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`andrew79`@`localhost` PROCEDURE `numberOfConcertGoers`(OUT `ConcertName` VARCHAR(30), OUT `numberOfConcertGoers` INT)
BEGIN
   SELECT ConcertName, COUNT( * ) AS numberOfConcertGoers
FROM CustomerOrders
INNER JOIN Concerts ON CustomerOrders.ConcertID = Concerts.ConcertID
GROUP BY Concerts.ConcertName;


END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `Albums`
--

CREATE TABLE IF NOT EXISTS `Albums` (
  `AlbumID` int(11) NOT NULL AUTO_INCREMENT,
  `AlbumName` varchar(30) DEFAULT NULL,
  `GenreID` int(11) NOT NULL,
  `ArtistID` int(11) NOT NULL,
  PRIMARY KEY (`AlbumID`),
  KEY `ArtistID` (`ArtistID`),
  KEY `GenreID` (`GenreID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `Albums`
--

INSERT INTO `Albums` (`AlbumID`, `AlbumName`, `GenreID`, `ArtistID`) VALUES
(1, 'Hotel California', 1, 1),
(2, 'Black Album', 1, 2),
(3, 'Blueprint 3', 2, 3),
(4, 'Life After Death', 2, 5),
(5, 'Kind of Blue', 3, 4),
(6, 'Divide', 1, 6),
(7, 'Taylor Swift', 4, 7),
(8, 'Teenage Dream', 4, 8),
(9, '18 Months', 5, 9),
(10, 'Random Access Memories', 5, 10),
(11, 'Tron: Legacy', 5, 10),
(13, 'test album', 1, 1),
(14, 'test', 1, 5),
(15, 'test444', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `Artists`
--

CREATE TABLE IF NOT EXISTS `Artists` (
  `ArtistID` int(11) NOT NULL AUTO_INCREMENT,
  `ArtistName` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`ArtistID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `Artists`
--

INSERT INTO `Artists` (`ArtistID`, `ArtistName`) VALUES
(1, 'The Eagles'),
(2, 'Metallica'),
(3, 'Jay Z'),
(4, 'Miles Davis'),
(5, 'Notorious B.I.G.'),
(6, 'Ed Sheeran'),
(7, 'Taylor Swift'),
(8, 'Katy Perry'),
(9, 'Calvin Harriss'),
(10, 'Daft Punk'),
(13, 'test');

-- --------------------------------------------------------

--
-- Table structure for table `ConcertDetails`
--

CREATE TABLE IF NOT EXISTS `ConcertDetails` (
  `ConcertID` int(11) NOT NULL,
  `ConcertDate` datetime NOT NULL,
  `Cost` decimal(10,0) NOT NULL,
  PRIMARY KEY (`ConcertID`,`ConcertDate`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ConcertDetails`
--

INSERT INTO `ConcertDetails` (`ConcertID`, `ConcertDate`, `Cost`) VALUES
(1, '2017-04-25 14:29:33', '10'),
(1, '2017-04-25 14:29:55', '330'),
(1, '2017-04-25 14:32:22', '59'),
(1, '2017-04-25 14:32:44', '6000'),
(1, '2017-04-26 00:00:00', '100'),
(2, '2017-04-27 00:00:00', '110'),
(3, '0000-00-00 00:00:00', '200'),
(3, '2017-04-30 00:00:00', '89'),
(4, '2017-04-28 00:00:00', '33'),
(5, '2017-05-01 00:00:00', '110');

-- --------------------------------------------------------

--
-- Table structure for table `Concerts`
--

CREATE TABLE IF NOT EXISTS `Concerts` (
  `ConcertName` varchar(30) DEFAULT NULL,
  `ArtistID` int(30) NOT NULL,
  `ConcertID` int(11) NOT NULL AUTO_INCREMENT,
  `VenueID` decimal(11,0) NOT NULL,
  PRIMARY KEY (`ConcertID`),
  KEY `fk_test` (`VenueID`),
  KEY `ArtistID` (`ArtistID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `Concerts`
--

INSERT INTO `Concerts` (`ConcertName`, `ArtistID`, `ConcertID`, `VenueID`) VALUES
('Eagles Reunion Tour', 1, 1, '2'),
('WorldWired Tour', 2, 2, '1'),
('Shape Of You', 6, 3, '2'),
('Magna Carta World Tour', 3, 4, '3'),
('SummerTime Tour', 9, 5, '2'),
('cool', 0, 6, '0'),
('asdf', 2, 8, '2'),
('testtt', 1, 9, '1');

-- --------------------------------------------------------

--
-- Stand-in structure for view `concertsInCity`
--
CREATE TABLE IF NOT EXISTS `concertsInCity` (
`ArtistName` varchar(30)
,`ConcertName` varchar(30)
,`ConcertDate` datetime
,`City` varchar(30)
,`State` varchar(30)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `concertsPerCity`
--
CREATE TABLE IF NOT EXISTS `concertsPerCity` (
`City` varchar(30)
,`State` varchar(30)
,`COUNT( ConcertID )` bigint(21)
);
-- --------------------------------------------------------

--
-- Table structure for table `CustomerOrders`
--

CREATE TABLE IF NOT EXISTS `CustomerOrders` (
  `OrderID` int(11) NOT NULL AUTO_INCREMENT,
  `CustomerName` varchar(30) DEFAULT NULL,
  `ConcertID` int(11) NOT NULL,
  `PurchasePrice` decimal(10,0) NOT NULL,
  `DiscountCode` varchar(30) NOT NULL,
  PRIMARY KEY (`OrderID`),
  KEY `fk_test2` (`ConcertID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `CustomerOrders`
--

INSERT INTO `CustomerOrders` (`OrderID`, `CustomerName`, `ConcertID`, `PurchasePrice`, `DiscountCode`) VALUES
(1, 'John Smith', 4, '120', 'yes'),
(2, 'testcustomer', 4, '23', 'yes'),
(3, 'tet2', 4, '23', 'yes'),
(4, 'concertID1Trigger', 1, '90', 'yes'),
(5, 'Some Guy', 5, '100', 'no'),
(6, 'Some Girl', 5, '100', 'no'),
(7, 'Brittany Smith', 3, '100', 'no'),
(8, 'Shahaj', 2, '100', 'Yes');

--
-- Triggers `CustomerOrders`
--
DROP TRIGGER IF EXISTS `alterPurchasePrice`;
DELIMITER //
CREATE TRIGGER `alterPurchasePrice` BEFORE INSERT ON `CustomerOrders`
 FOR EACH ROW BEGIN
    IF new.DiscountCode = 'yes' THEN
       SET NEW.PurchasePrice 
  = ( SELECT d.cost - 10 AS discount_price
        FROM ConcertDetails d
       WHERE d.concertid = NEW.concertid
    );
    END IF;
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Stand-in structure for view `genreConcertsPerCity`
--
CREATE TABLE IF NOT EXISTS `genreConcertsPerCity` (
`GenreName` varchar(30)
,`City` varchar(30)
,`State` varchar(30)
,`NumberOfConcerts` bigint(21)
);
-- --------------------------------------------------------

--
-- Table structure for table `Genres`
--

CREATE TABLE IF NOT EXISTS `Genres` (
  `GenreID` int(11) NOT NULL AUTO_INCREMENT,
  `GenreName` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`GenreID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `Genres`
--

INSERT INTO `Genres` (`GenreID`, `GenreName`) VALUES
(1, 'Rock'),
(2, 'Hip Hop'),
(3, 'Jazz'),
(4, 'Pop'),
(5, 'Electronic'),
(6, 'Rock 2'),
(7, 'rock3');

-- --------------------------------------------------------

--
-- Table structure for table `Songs`
--

CREATE TABLE IF NOT EXISTS `Songs` (
  `SongID` int(11) NOT NULL AUTO_INCREMENT,
  `SongName` varchar(30) DEFAULT NULL,
  `AlbumID` int(11) NOT NULL,
  PRIMARY KEY (`SongID`),
  KEY `AlbumID` (`AlbumID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `Songs`
--

INSERT INTO `Songs` (`SongID`, `SongName`, `AlbumID`) VALUES
(1, 'Hotel California', 1),
(2, 'Enter Sandman', 2),
(3, 'editedsong2', 3),
(4, 'Sad But True', 2),
(5, 'test', 1),
(6, 'test', 1),
(7, 'test26', 1);

-- --------------------------------------------------------

--
-- Table structure for table `Venues`
--

CREATE TABLE IF NOT EXISTS `Venues` (
  `VenueID` int(11) NOT NULL AUTO_INCREMENT,
  `VenueName` varchar(30) DEFAULT NULL,
  `StreetAddress` varchar(30) NOT NULL DEFAULT '',
  `ZipID` int(11) NOT NULL,
  PRIMARY KEY (`VenueID`),
  KEY `VenueZipID` (`ZipID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `Venues`
--

INSERT INTO `Venues` (`VenueID`, `VenueName`, `StreetAddress`, `ZipID`) VALUES
(1, 'Music Farm', '123 Music Street', 29403),
(2, 'Sparrow', '21 Money Street', 90210),
(3, 'Staples Stadium', '1st Street', 10001);

-- --------------------------------------------------------

--
-- Table structure for table `VenueZip`
--

CREATE TABLE IF NOT EXISTS `VenueZip` (
  `Zip` int(11) NOT NULL AUTO_INCREMENT,
  `City` varchar(30) DEFAULT NULL,
  `State` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`Zip`),
  KEY `VenueID` (`Zip`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=90211 ;

--
-- Dumping data for table `VenueZip`
--

INSERT INTO `VenueZip` (`Zip`, `City`, `State`) VALUES
(10001, 'New York', 'New York'),
(11111, 'someplace', 'somestate'),
(29403, 'Charleston', 'SC'),
(90210, 'Los Angeles', 'California');

-- --------------------------------------------------------

--
-- Structure for view `concertsInCity`
--
DROP TABLE IF EXISTS `concertsInCity`;

CREATE ALGORITHM=UNDEFINED DEFINER=`andrew79`@`localhost` SQL SECURITY DEFINER VIEW `concertsInCity` AS select `Artists`.`ArtistName` AS `ArtistName`,`Concerts`.`ConcertName` AS `ConcertName`,`ConcertDetails`.`ConcertDate` AS `ConcertDate`,`VenueZip`.`City` AS `City`,`VenueZip`.`State` AS `State` from ((((`Artists` join `Concerts` on((`Artists`.`ArtistID` = `Concerts`.`ArtistID`))) join `ConcertDetails` on((`Concerts`.`ConcertID` = `ConcertDetails`.`ConcertID`))) join `Venues` on((`Concerts`.`VenueID` = `Venues`.`VenueID`))) join `VenueZip` on((`Venues`.`ZipID` = `VenueZip`.`Zip`)));

-- --------------------------------------------------------

--
-- Structure for view `concertsPerCity`
--
DROP TABLE IF EXISTS `concertsPerCity`;

CREATE ALGORITHM=UNDEFINED DEFINER=`andrew79`@`localhost` SQL SECURITY DEFINER VIEW `concertsPerCity` AS select `VenueZip`.`City` AS `City`,`VenueZip`.`State` AS `State`,count(`Concerts`.`ConcertID`) AS `COUNT( ConcertID )` from ((`Concerts` join `Venues` on((`Concerts`.`VenueID` = `Venues`.`VenueID`))) join `VenueZip` on((`Venues`.`ZipID` = `VenueZip`.`Zip`))) group by `VenueZip`.`City`;

-- --------------------------------------------------------

--
-- Structure for view `genreConcertsPerCity`
--
DROP TABLE IF EXISTS `genreConcertsPerCity`;

CREATE ALGORITHM=UNDEFINED DEFINER=`andrew79`@`localhost` SQL SECURITY DEFINER VIEW `genreConcertsPerCity` AS select `Genres`.`GenreName` AS `GenreName`,`VenueZip`.`City` AS `City`,`VenueZip`.`State` AS `State`,count(`Concerts`.`ConcertID`) AS `NumberOfConcerts` from (((((`Genres` join `Albums` on((`Genres`.`GenreID` = `Albums`.`GenreID`))) join `Artists` on((`Albums`.`ArtistID` = `Artists`.`ArtistID`))) join `Concerts` on((`Artists`.`ArtistID` = `Concerts`.`ArtistID`))) join `Venues` on((`Concerts`.`VenueID` = `Venues`.`VenueID`))) join `VenueZip` on((`Venues`.`ZipID` = `VenueZip`.`Zip`))) group by `Genres`.`GenreName`,`VenueZip`.`City`;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Albums`
--
ALTER TABLE `Albums`
  ADD CONSTRAINT `Albums_ibfk_1` FOREIGN KEY (`GenreID`) REFERENCES `Genres` (`GenreID`),
  ADD CONSTRAINT `Albums_ibfk_2` FOREIGN KEY (`ArtistID`) REFERENCES `Artists` (`ArtistID`);

--
-- Constraints for table `CustomerOrders`
--
ALTER TABLE `CustomerOrders`
  ADD CONSTRAINT `CustomerOrders_ibfk_1` FOREIGN KEY (`ConcertID`) REFERENCES `Concerts` (`ConcertID`);

--
-- Constraints for table `Songs`
--
ALTER TABLE `Songs`
  ADD CONSTRAINT `Songs_ibfk_1` FOREIGN KEY (`AlbumID`) REFERENCES `Albums` (`AlbumID`);

--
-- Constraints for table `Venues`
--
ALTER TABLE `Venues`
  ADD CONSTRAINT `Venues_ibfk_1` FOREIGN KEY (`ZipID`) REFERENCES `VenueZip` (`Zip`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
