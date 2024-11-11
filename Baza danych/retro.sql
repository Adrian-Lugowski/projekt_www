-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Lis 11, 2024 at 11:46 PM
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
-- Database: `retro`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `galeria`
--

CREATE TABLE `galeria` (
  `id` int(11) UNSIGNED NOT NULL,
  `idGry` int(10) UNSIGNED NOT NULL,
  `obrazek` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `galeria`
--

INSERT INTO `galeria` (`id`, `idGry`, `obrazek`) VALUES
(3, 2, 'ps5.png'),
(4, 2, 'ps2.png'),
(5, 2, 'GoW.jpg'),
(6, 2, ''),
(7, 2, ''),
(8, 19, 'Zelda_BOTW_2.jpg'),
(9, 19, 'Zelda_BOTW_1.jpg'),
(10, 19, ''),
(11, 19, ''),
(12, 19, ''),
(13, 21, 'mario_1.png'),
(14, 21, 'mario_2.png'),
(15, 21, 'mario_3.png'),
(16, 21, 'mario_4.png'),
(17, 21, 'mario_5.jpg'),
(18, 22, ''),
(19, 22, ''),
(20, 22, ''),
(21, 22, ''),
(22, 22, '');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `gry`
--

CREATE TABLE `gry` (
  `id` int(10) UNSIGNED NOT NULL,
  `idUzytkownika` int(10) UNSIGNED NOT NULL,
  `nazwa` varchar(50) NOT NULL,
  `obrazek` varchar(50) NOT NULL,
  `opis` text NOT NULL,
  `premiera` date NOT NULL,
  `producent` varchar(50) NOT NULL,
  `wydawca` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `gry`
--

INSERT INTO `gry` (`id`, `idUzytkownika`, `nazwa`, `obrazek`, `opis`, `premiera`, `producent`, `wydawca`) VALUES
(2, 3, 'God of War: Ragnarok  ', 'GoW.jpg', 'gt55t', '2022-11-09', 'Santa Monica Studio', 'Sony Interactive Entertainment'),
(11, 3, 'Super Mario Odyssey', 'MarioOdyssey.jpg', 'Przygotowana z myślą o Nintendo Switch platformówka 3D, będąca kolejną odsłoną popularnej serii z tytułowym hydraulikiem w roli głównej.', '2017-10-27', 'Nintendo', 'Nintendo'),
(14, 3, 'Metal Gear Solid 3: Snake Eater', 'MGS3.jpg', 'Trzecia pełnoprawna odsłona cyklu skradankowych gier akcji firmy Konami.', '2004-11-17', 'Konami', 'Konami'),
(19, 3, 'The Legend of Zelda: Breath of the Wild ', 'Zelda_BOTW.jpg', 'gra', '2017-03-03', 'Nintendo', 'Nintendo'),
(20, 3, 'Super Mario 64', 'mario64.jpg', 'gra platformowa stworzona i wydana przez Nintendo w 1996 roku na konsolę Nintendo 64. W 2006 roku została udostępniona w usłudze Wii Virtual Console. Jest pierwszą grą z Mario osadzoną w grafice 3D.', '1996-09-26', 'Nintendo', 'Nintendo'),
(21, 3, 'Super Mario Bros', 'supermariobros.jpg', 'Super Mario Bros – komputerowa gra platformowa wyprodukowana w 1985 roku przez Nintendo. Powstała ona w celu zdyskontowania popularności gry Mario Bros. z 1983 roku; początkowo wydano ją na konsoli Nintendo Entertainment System (ówcześnie konsola była znana pod nazwą „Famicom”, pod jaką ukazała się w Japonii). W Super Mario Bros. gracz przejmuje kontrolę nad hydraulikiem Mario, którego zadaniem jest ocalenie księżniczki Peach porwanej przez Bowsera. W przypadku gry wieloosobowej w poszukiwaniach Mario towarzyszy Luigi, sterowany przez drugiego gracza.', '1985-09-13', 'Nintendo', 'Nintendo'),
(22, 3, 'Crash Bandicoot ', 'crash_bandicoot.png', 'Szalony naukowiec – Dr. Neo Cortex i jego pomocnik – Dr. Nitrus Brio zamierzają podbić świat przy pomocy zwierząt-mutantów, tworzonych przy pomocy skonstruowanej przez Nitrusa maszyny zwanej Evolvo-Ray. Jednym z tych stworzeń jest Crash – będący jamrajem pasiastym. Aby zwierzęta stały się mu jeszcze bardziej posłuszne, Cortex stworzył także Cortex Vortex – maszynę służącą do prania mózgu. Podczas gdy zły naukowiec podejmuje próbę użycia jej w celu uzyskania kontroli nad Crashem, ten ucieka z laboratorium. Słyszy przy tym jednak, że Cortex planuje porwać samicę jamraja – Tawnę. Uciekając, wpada do wody; budzi się następnie na N. Sanity Beach, gdzie zaczyna się jego przygoda. Musi uratować Tawnę oraz zapobiec zniszczeniu świata.', '1996-11-08', 'Naughty Dog', 'Sony Computer Entertainment America'),
(23, 3, 'Batman', 'bg.jpg', 'Batman', '2000-03-14', 'WB', 'WB'),
(24, 3, 'safsf', 'DzbanSiedlecki.jpg', 'asfaf', '2024-10-31', 'fa', 'fa');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `komentarze`
--

CREATE TABLE `komentarze` (
  `id` int(10) UNSIGNED NOT NULL,
  `idGry` int(10) UNSIGNED NOT NULL,
  `nick` varchar(50) NOT NULL,
  `tresc` text NOT NULL,
  `data` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `konsole`
--

CREATE TABLE `konsole` (
  `id` int(11) UNSIGNED NOT NULL,
  `nazwa` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `konsole`
--

INSERT INTO `konsole` (`id`, `nazwa`) VALUES
(1, 'PlayStation 5'),
(2, 'Nintendo Switch'),
(3, 'Wii U'),
(4, 'PlayStation 2'),
(5, 'Nintendo Entertainment System'),
(6, 'Super Nintendo Entertainment System'),
(7, 'PlayStation'),
(8, 'Nintendo 64'),
(9, 'Xbox'),
(10, 'Xbox 360'),
(11, 'Wii'),
(12, 'PlayStation 3'),
(13, 'PlayStation 4'),
(14, 'GameCube'),
(15, 'Sega Mega Drive');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `konsole_gry`
--

CREATE TABLE `konsole_gry` (
  `id` int(10) UNSIGNED NOT NULL,
  `idGry` int(10) UNSIGNED NOT NULL,
  `idKonsoli` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `konsole_gry`
--

INSERT INTO `konsole_gry` (`id`, `idGry`, `idKonsoli`) VALUES
(4, 11, 2),
(5, 14, 4),
(17, 2, 1),
(23, 19, 2),
(24, 19, 3),
(25, 20, 8),
(27, 21, 5),
(29, 22, 7);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `recenzje`
--

CREATE TABLE `recenzje` (
  `id` int(10) UNSIGNED NOT NULL,
  `idGry` int(10) UNSIGNED NOT NULL,
  `nick` varchar(50) NOT NULL,
  `ocena` int(11) NOT NULL,
  `tresc` text NOT NULL,
  `data` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `recenzje`
--

INSERT INTO `recenzje` (`id`, `idGry`, `nick`, `ocena`, `tresc`, `data`) VALUES
(3, 19, 'Admin', 5, 'Dobra gra', '2024-11-11 19:21:48');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `ulubione`
--

CREATE TABLE `ulubione` (
  `id` int(10) UNSIGNED NOT NULL,
  `idGry` int(10) UNSIGNED NOT NULL,
  `idUzytkownika` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `ulubione`
--

INSERT INTO `ulubione` (`id`, `idGry`, `idUzytkownika`) VALUES
(213, 14, 3),
(228, 19, 3),
(254, 2, 3),
(255, 20, 3),
(256, 21, 3);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownicy`
--

CREATE TABLE `uzytkownicy` (
  `id` int(10) UNSIGNED NOT NULL,
  `login` varchar(50) NOT NULL,
  `haslo` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `rola` varchar(50) NOT NULL,
  `data` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `uzytkownicy`
--

INSERT INTO `uzytkownicy` (`id`, `login`, `haslo`, `email`, `rola`, `data`) VALUES
(2, 'Wojtek', '3674d930489677e62b8dd88e3efdd616', 'wojtek99@gmail.com', '', '2024-10-28 20:44:39'),
(3, 'Admin', 'e64b78fc3bc91bcbc7dc232ba8ec59e0', 'al89261@stud.uph.edu.pl', 'admin', '2024-11-04 22:49:46');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `wideo`
--

CREATE TABLE `wideo` (
  `id` int(10) UNSIGNED NOT NULL,
  `idGry` int(10) UNSIGNED NOT NULL,
  `wideo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wideo`
--

INSERT INTO `wideo` (`id`, `idGry`, `wideo`) VALUES
(3, 19, 'https://www.youtube.com/embed/1rPxiXXxftE?si=aG1Za'),
(4, 19, ''),
(5, 19, ''),
(6, 19, ''),
(7, 19, ''),
(8, 21, 'https://www.youtube.com/embed/7qirrV8w5SQ?si=fZOY5'),
(9, 21, 'https://www.youtube.com/embed/Gx5--eK2k6Y?si=VtGKg'),
(10, 21, 'https://www.youtube.com/embed/Boq3ghiTKHA?si=9M8_c'),
(11, 21, 'https://www.youtube.com/embed/7rIJNT7dCmE?si=D1EfH'),
(12, 21, 'https://www.youtube.com/embed/zLaF9fOqDaQ?si=zuKEm'),
(13, 22, ''),
(14, 22, ''),
(15, 22, ''),
(16, 22, ''),
(17, 22, '');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zgloszenia`
--

CREATE TABLE `zgloszenia` (
  `id` int(10) UNSIGNED NOT NULL,
  `idUzytkownika` int(10) UNSIGNED NOT NULL,
  `tresc` text NOT NULL,
  `data` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `zgloszenia`
--

INSERT INTO `zgloszenia` (`id`, `idUzytkownika`, `tresc`, `data`) VALUES
(1, 3, 'test', '2024-11-04 22:52:26'),
(2, 3, 'test', '2024-11-11 19:23:28'),
(3, 3, 'test', '2024-11-11 19:23:28'),
(4, 3, 'zgłoszenie\r\n', '2024-11-11 19:23:57');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `galeria`
--
ALTER TABLE `galeria`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idGry` (`idGry`);

--
-- Indeksy dla tabeli `gry`
--
ALTER TABLE `gry`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idUzytkownika` (`idUzytkownika`);

--
-- Indeksy dla tabeli `komentarze`
--
ALTER TABLE `komentarze`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idGry` (`idGry`);

--
-- Indeksy dla tabeli `konsole`
--
ALTER TABLE `konsole`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `konsole_gry`
--
ALTER TABLE `konsole_gry`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idGry` (`idGry`),
  ADD KEY `idKonsoli` (`idKonsoli`);

--
-- Indeksy dla tabeli `recenzje`
--
ALTER TABLE `recenzje`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idGry` (`idGry`);

--
-- Indeksy dla tabeli `ulubione`
--
ALTER TABLE `ulubione`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idGry` (`idGry`),
  ADD KEY `idUzytkownika` (`idUzytkownika`);

--
-- Indeksy dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `wideo`
--
ALTER TABLE `wideo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idGry` (`idGry`);

--
-- Indeksy dla tabeli `zgloszenia`
--
ALTER TABLE `zgloszenia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idUzytkownika` (`idUzytkownika`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `galeria`
--
ALTER TABLE `galeria`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `gry`
--
ALTER TABLE `gry`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `komentarze`
--
ALTER TABLE `komentarze`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `konsole`
--
ALTER TABLE `konsole`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `konsole_gry`
--
ALTER TABLE `konsole_gry`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `recenzje`
--
ALTER TABLE `recenzje`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ulubione`
--
ALTER TABLE `ulubione`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=258;

--
-- AUTO_INCREMENT for table `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `wideo`
--
ALTER TABLE `wideo`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `zgloszenia`
--
ALTER TABLE `zgloszenia`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `galeria`
--
ALTER TABLE `galeria`
  ADD CONSTRAINT `galeria_ibfk_1` FOREIGN KEY (`idGry`) REFERENCES `gry` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `gry`
--
ALTER TABLE `gry`
  ADD CONSTRAINT `gry_ibfk_1` FOREIGN KEY (`idUzytkownika`) REFERENCES `uzytkownicy` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `komentarze`
--
ALTER TABLE `komentarze`
  ADD CONSTRAINT `komentarze_ibfk_1` FOREIGN KEY (`idGry`) REFERENCES `gry` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `konsole_gry`
--
ALTER TABLE `konsole_gry`
  ADD CONSTRAINT `konsole_gry_ibfk_1` FOREIGN KEY (`idGry`) REFERENCES `gry` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `konsole_gry_ibfk_2` FOREIGN KEY (`idKonsoli`) REFERENCES `konsole` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `recenzje`
--
ALTER TABLE `recenzje`
  ADD CONSTRAINT `recenzje_ibfk_1` FOREIGN KEY (`idGry`) REFERENCES `gry` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ulubione`
--
ALTER TABLE `ulubione`
  ADD CONSTRAINT `ulubione_ibfk_1` FOREIGN KEY (`idGry`) REFERENCES `gry` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ulubione_ibfk_2` FOREIGN KEY (`idUzytkownika`) REFERENCES `uzytkownicy` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `wideo`
--
ALTER TABLE `wideo`
  ADD CONSTRAINT `wideo_ibfk_1` FOREIGN KEY (`idGry`) REFERENCES `gry` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `zgloszenia`
--
ALTER TABLE `zgloszenia`
  ADD CONSTRAINT `zgloszenia_ibfk_1` FOREIGN KEY (`idUzytkownika`) REFERENCES `uzytkownicy` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
