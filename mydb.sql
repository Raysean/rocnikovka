-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Počítač: 127.0.0.1
-- Vytvořeno: Stř 06. dub 2016, 18:46
-- Verze serveru: 5.6.20
-- Verze PHP: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databáze: `mydb`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `obory`
--

CREATE TABLE IF NOT EXISTS `obory` (
`Id` tinyint(2) NOT NULL,
  `Nazev` varchar(45) NOT NULL,
  `DelkaStudia` tinyint(1) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Vypisuji data pro tabulku `obory`
--

INSERT INTO `obory` (`Id`, `Nazev`, `DelkaStudia`) VALUES
(1, 'Informační Technologie', 4),
(2, 'Automechanik', 3),
(3, 'Elektrotechnika', 4);

-- --------------------------------------------------------

--
-- Struktura tabulky `studenti`
--

CREATE TABLE IF NOT EXISTS `studenti` (
`Id` tinyint(3) NOT NULL,
  `Jmeno` varchar(20) NOT NULL,
  `Prijmeni` varchar(30) NOT NULL,
  `Obory_Id` tinyint(2) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Vypisuji data pro tabulku `studenti`
--

INSERT INTO `studenti` (`Id`, `Jmeno`, `Prijmeni`, `Obory_Id`) VALUES
(2, 'David', 'Hardy', 1),
(3, 'Pavel', 'Nový', 2),
(4, 'Petr', 'Holý', 3);

--
-- Klíče pro exportované tabulky
--

--
-- Klíče pro tabulku `obory`
--
ALTER TABLE `obory`
 ADD PRIMARY KEY (`Id`);

--
-- Klíče pro tabulku `studenti`
--
ALTER TABLE `studenti`
 ADD PRIMARY KEY (`Id`), ADD KEY `fk_Studenti_Obory_idx` (`Obory_Id`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `obory`
--
ALTER TABLE `obory`
MODIFY `Id` tinyint(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pro tabulku `studenti`
--
ALTER TABLE `studenti`
MODIFY `Id` tinyint(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- Omezení pro exportované tabulky
--

--
-- Omezení pro tabulku `studenti`
--
ALTER TABLE `studenti`
ADD CONSTRAINT `fk_Studenti_Obory` FOREIGN KEY (`Obory_Id`) REFERENCES `obory` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
