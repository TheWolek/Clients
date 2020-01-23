-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 23 Sty 2020, 15:31
-- Wersja serwera: 10.1.35-MariaDB
-- Wersja PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `clients`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `clients`
--

CREATE TABLE `clients` (
  `ID` int(11) NOT NULL,
  `imie_Nazwisko` varchar(128) COLLATE utf8_bin NOT NULL,
  `data_wizyty` date NOT NULL,
  `numer_farby` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Zrzut danych tabeli `clients`
--

INSERT INTO `clients` (`ID`, `imie_Nazwisko`, `data_wizyty`, `numer_farby`) VALUES
(1, 'syla', '2020-01-23', '233+12%'),
(2, 'kamil', '2020-01-20', '244'),
(3, 'kamila', '2020-01-23', '2746'),
(4, 'test', '2020-01-24', '3333'),
(5, 'Test', '2020-01-23', '1. 12342 ./213412 %12\r\n2. t4ts32 /12 %1\r\n3. 42r354 %12 / 9');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `clients_backup`
--

CREATE TABLE `clients_backup` (
  `ID` int(11) NOT NULL DEFAULT '0',
  `imie_Nazwisko` varchar(128) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `data_wizyty` date NOT NULL,
  `numer_farby` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `clients_backup`
--

INSERT INTO `clients_backup` (`ID`, `imie_Nazwisko`, `data_wizyty`, `numer_farby`) VALUES
(1, 'syla', '2020-01-23', '233+12%'),
(2, 'kamil', '2020-01-20', '244'),
(3, 'kamila', '2020-01-23', '2746'),
(4, 'test', '2020-01-24', '3333'),
(5, 'Test', '2020-01-23', '1. 12342 ./213412 %12\r\n2. t4ts32 /12 %1\r\n3. 42r354 %12 / 9');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `clients`
--
ALTER TABLE `clients`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
