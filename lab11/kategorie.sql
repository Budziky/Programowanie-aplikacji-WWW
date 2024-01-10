-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sty 10, 2024 at 10:08 AM
-- Wersja serwera: 10.4.32-MariaDB
-- Wersja PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kategorie`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kategorie`
--

CREATE TABLE `kategorie` (
  `id` int(11) NOT NULL,
  `matka` int(11) NOT NULL DEFAULT 0,
  `nazwa` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategorie`
--

INSERT INTO `kategorie` (`id`, `matka`, `nazwa`) VALUES
(1, 0, 'Patyk'),
(2, 0, 'Patyk'),
(3, 0, 'Patyk'),
(4, 0, ''),
(5, 0, ''),
(6, 0, 'Kamień'),
(7, 0, 'Płaski'),
(8, 0, 'Płaski'),
(9, 0, 'Płaski');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `produkty`
--

CREATE TABLE `produkty` (
  `id` int(11) NOT NULL,
  `tytul` varchar(255) NOT NULL,
  `opis` text DEFAULT NULL,
  `data_utworzenia` datetime DEFAULT NULL,
  `data_modyfikacji` datetime DEFAULT NULL,
  `data_wygasniecia` datetime DEFAULT NULL,
  `cena_netto` decimal(10,2) DEFAULT NULL,
  `podatek_vat` decimal(5,2) DEFAULT NULL,
  `ilosc_sztuk` int(11) DEFAULT NULL,
  `status_dostepnosci` varchar(50) DEFAULT NULL,
  `kategoria` varchar(100) DEFAULT NULL,
  `gabaryt_produktu` varchar(100) DEFAULT NULL,
  `zdjecie` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produkty`
--

INSERT INTO `produkty` (`id`, `tytul`, `opis`, `data_utworzenia`, `data_modyfikacji`, `data_wygasniecia`, `cena_netto`, `podatek_vat`, `ilosc_sztuk`, `status_dostepnosci`, `kategoria`, `gabaryt_produktu`, `zdjecie`) VALUES
(1, 'Kamień', 'Duży Kamień', '2024-01-10 10:07:19', NULL, NULL, 30.00, 21.00, 1, 'Duży', 'Natura', '10', 'https://www.google.com/url?sa=i&url=https%3A%2F%2Fpiaseczno.eu%2Fkamien-pamieci-kpt-art-fryderyka-hauscha%2F&psig=AOvVaw1wUpzjWb0nqP7wDgdF1rpS&ust=1704963929441000&source=images&cd=vfe&opi=89978449&ved=0CBIQjRxqFwoTCJi1w9270oMDFQAAAAAdAAAAABAD'),
(2, 'Kamień', 'Duży Kamień', '2024-01-10 10:07:33', NULL, NULL, 30.00, 21.00, 1, 'Duży', 'Natura', '10', 'https://www.google.com/url?sa=i&url=https%3A%2F%2Fpiaseczno.eu%2Fkamien-pamieci-kpt-art-fryderyka-hauscha%2F&psig=AOvVaw1wUpzjWb0nqP7wDgdF1rpS&ust=1704963929441000&source=images&cd=vfe&opi=89978449&ved=0CBIQjRxqFwoTCJi1w9270oMDFQAAAAAdAAAAABAD');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `kategorie`
--
ALTER TABLE `kategorie`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `produkty`
--
ALTER TABLE `produkty`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategorie`
--
ALTER TABLE `kategorie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `produkty`
--
ALTER TABLE `produkty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
