-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 02 Lut 2019, 23:28
-- Wersja serwera: 10.1.25-MariaDB
-- Wersja PHP: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `sip`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `stacje`
--

CREATE TABLE `stacje` (
  `id` int(11) NOT NULL,
  `siec` text COLLATE utf8_polish_ci NOT NULL,
  `x` float NOT NULL,
  `y` float NOT NULL,
  `cena` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `stacje`
--

INSERT INTO `stacje` (`id`, `siec`, `x`, `y`, `cena`) VALUES
(11, 'BP', 18.5763, 54.3781, 4.76),
(12, 'BP', 18.6023, 54.3378, 4.76),
(13, 'Circle K Express', 18.5978, 54.3368, 4.64),
(14, 'LOTOS', 18.6285, 54.3377, 4.66),
(15, 'ORLEN', 18.6357, 54.3332, 4.84),
(16, 'OPTIMA', 18.6341, 54.3267, 4.85),
(17, 'Shell', 18.6295, 54.3146, 4.71),
(18, 'ORLEN', 18.5613, 54.3089, 4.84),
(19, 'BP', 18.5484, 54.3242, 4.76),
(20, 'MOYA', 18.5355, 54.3266, 4.77),
(21, 'Carrefour', 18.5954, 54.3508, 4.49),
(22, 'BP', 18.5841, 54.3581, 4.76),
(23, 'LOTOS', 18.6277, 54.3713, 4.66),
(24, 'Circle K Express', 18.6337, 54.3785, 4.64),
(25, 'LOTOS', 18.6813, 54.3494, 4.66),
(26, 'LOTOS', 18.6686, 54.3455, 4.66),
(27, 'LOTOS', 18.6217, 54.393, 4.66),
(28, 'Shell', 18.5917, 54.4009, 4.71),
(29, 'ORLEN', 18.5787, 54.3966, 4.84),
(30, 'LUKOIL', 18.5209, 54.3758, 4.65);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `stacje`
--
ALTER TABLE `stacje`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `stacje`
--
ALTER TABLE `stacje`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
