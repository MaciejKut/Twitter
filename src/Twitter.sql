-- phpMyAdmin SQL Dump
-- version 4.6.5.2deb1+deb.cihar.com~xenial.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Czas generowania: 14 Sty 2017, 21:43
-- Wersja serwera: 5.7.16-0ubuntu0.16.04.1
-- Wersja PHP: 7.0.13-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `Twitter`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Comment`
--

CREATE TABLE `Comment` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_post` int(11) NOT NULL,
  `creation_date` datetime DEFAULT NULL,
  `text` varchar(144) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `Comment`
--

INSERT INTO `Comment` (`id`, `id_user`, `id_post`, `creation_date`, `text`) VALUES
(1, 9, 25, '2017-01-14 02:59:29', 'Autor to User5 a id posta to 25'),
(2, 9, 25, '2017-01-14 03:07:43', 'xxxxxxxxxx'),
(3, 9, 25, '2017-01-14 03:07:47', 'xxxxxxxxxx'),
(4, 9, 26, '2017-01-14 03:14:56', 'dksalfjdlkafjkljdl;kajf'),
(5, 9, 26, '2017-01-14 03:15:31', 'dksalfjdlkafjkljdl;kajf'),
(6, 9, 26, '2017-01-14 03:19:15', 'dksalfjdlkafjkljdl;kajf'),
(7, 9, 26, '2017-01-14 03:20:35', 'fdafadadfa'),
(8, 9, 26, '2017-01-14 03:22:23', 'fdafadadfa'),
(9, 9, 26, '2017-01-14 03:24:11', 'fdafadadfa'),
(10, 9, 24, '2017-01-14 03:40:03', 'Ciekawe czy zadziała w tym miejscu'),
(11, 13, 26, '2017-01-14 03:42:29', 'Coś dopiszę to co będzie'),
(12, 13, 26, '2017-01-14 03:45:26', 'Coś dopiszę to co będzie'),
(13, 13, 24, '2017-01-14 03:45:57', 'Dupa Dupa cycki jeszcze 35minut baterii'),
(14, 13, 27, '2017-01-14 05:47:06', 'gfgsdfgsfsf'),
(15, 21, 28, '2017-01-14 21:35:48', 'Fajny tekst nic dodać nic ująć'),
(16, 21, 26, '2017-01-14 21:36:08', 'To dopiero głupia sprawa hahahahah'),
(17, 9, 29, '2017-01-14 21:41:33', 'też się cieszę\r\n'),
(18, 9, 29, '2017-01-14 21:41:44', 'ale to już chyba choroba ....'),
(19, 9, 29, '2017-01-14 21:42:00', 'piszę sam do siebie jeszcze to komentuję i sprawia mi to przyjemność');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Meesages`
--

CREATE TABLE `Meesages` (
  `id` int(11) NOT NULL,
  `sender` int(11) DEFAULT NULL,
  `reciver` int(11) DEFAULT NULL,
  `creation_date` datetime DEFAULT NULL,
  `text` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `meesage_subject` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `Meesages`
--

INSERT INTO `Meesages` (`id`, `sender`, `reciver`, `creation_date`, `text`, `status`, `meesage_subject`) VALUES
(1, 9, 2, '2017-01-14 05:26:48', 'druga wiadomość do abc', 0, NULL),
(2, 13, 9, '2017-01-14 05:44:57', 'Pierwsza wiadomość ', 1, NULL),
(3, 13, 9, '2017-01-14 05:45:09', 'Druga wiadomość', 1, NULL),
(4, 13, 9, '2017-01-14 05:45:19', 'trzecia wiadomość', 1, NULL),
(5, 9, 5, '2017-01-14 13:32:38', 'Pierwsza wiadomość wysłana do szymek@szymek.pl', 0, NULL),
(6, 9, 5, '2017-01-14 13:47:59', 'No można różne rzeczy wypisywać grunt to się nie wkurzyć', 0, ''),
(7, 9, 13, '2017-01-14 13:49:59', 'Kocham Cię', 0, 'List miłosny'),
(8, 13, 7, '2017-01-14 14:30:33', 'Standardowy tekst deva', 0, 'Dupa Dupa cycki'),
(9, NULL, NULL, NULL, NULL, 1, NULL),
(10, 21, 9, '2017-01-14 21:37:02', 'Sprawdzamy czy działa  to że się ładują wiadomości ', 1, 'Nowa wiad 1'),
(11, 21, 9, '2017-01-14 21:40:44', 'No i teraz ostateczna wersja sprawdzamy ', 0, 'Dupa  2 wiadomość'),
(12, 21, 13, '2017-01-14 21:41:03', 'Ciekawe czy to zadziała', 0, 'Do Ani też napiszę');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `meesages_users`
--

CREATE TABLE `meesages_users` (
  `id` int(11) NOT NULL,
  `meesage_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Tweet`
--

CREATE TABLE `Tweet` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `text` varchar(144) DEFAULT NULL,
  `creationDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `Tweet`
--

INSERT INTO `Tweet` (`id`, `userId`, `text`, `creationDate`) VALUES
(1, 2, 'Some kind of text less than 144 signs', '2017-01-12 00:00:00'),
(2, 2, 'Some 11111111111less than 144 signs', '2017-01-12 00:00:00'),
(3, 2, 'Some ki2222222222222 144 signs', '2017-01-12 00:00:00'),
(4, 2, 'Some 333333333333 than 144 signs', '2017-01-12 00:00:00'),
(5, 3, 'Some 33311111111111less than 144 signs', '2017-01-12 00:00:00'),
(6, 3, 'Some 333ki2222222222222 144 signs', '2017-01-12 00:00:00'),
(7, 3, 'S33ome 333333333333 than 144 signs', '2017-01-12 00:00:00'),
(8, 2, 'Ciekawe czy zadziała za drugim razem', '2017-01-13 00:00:00'),
(9, 2, 'Kocham moją żonę ', '2017-01-13 00:00:00'),
(10, 2, 'Kocham moich synków', '2017-01-13 00:00:00'),
(11, 2, 'Dodałem place holder ', '2017-01-13 00:00:00'),
(12, 3, 'Ciekawe czy zadziała rejestrowanie nowego użytkownika :)', '2017-01-13 00:00:00'),
(16, 7, 'Ciekawe czy się doda użytkownika aaa', '2017-01-13 00:00:00'),
(17, 8, 'Dupa Dupa cycki', '2017-01-13 00:00:00'),
(18, 2, 'Tweet sprawdzający sortowanie ', '2017-01-13 20:59:32'),
(19, 2, 'No i teraz kolejny dodałem DATETIME', '2017-01-13 20:59:45'),
(20, 4, 'Ciekawe czy sortowanie dalej działa', '2017-01-13 21:23:52'),
(21, 4, 'Kolejny tweet dla sprawdzenia\r\n', '2017-01-13 21:40:03'),
(22, 4, 'Udało się zrobić stronę wyświetlającą post', '2017-01-13 22:38:13'),
(23, 4, '15 po 11 zrobiłem stronę modyfikacji użytkownika', '2017-01-13 23:14:54'),
(24, 9, 'Nowy user Maciej Kutzmann', '2017-01-14 01:30:01'),
(25, 15, 'dodałem przekierowanie po zarejestrowaniu nowego usera', '2017-01-14 01:53:44'),
(26, 9, 'ok zrobiłem push a teraz kolejenerzeczy wyświetlenie komentarzy pod postami', '2017-01-14 02:23:43'),
(27, 13, 'ggrrtsgfsdg', '2017-01-14 05:46:39'),
(28, 13, 'Ok zatrzymałem się na konstruowaniu zapytań. Doczytać', '2017-01-14 06:16:31'),
(29, 21, 'Skończyłem tego tweetera :) ale ulga ', '2017-01-14 21:36:29');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Users`
--

CREATE TABLE `Users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `hashed_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `Users`
--

INSERT INTO `Users` (`id`, `email`, `name`, `hashed_password`) VALUES
(2, 'abc@abc.pl', 'Maciej 789', '$2y$10$GhSNuQSMeLJc1781F/hiAOKD9Yu751qcBdiNHXyZ5FtEL/xhCM/2m'),
(3, 'abc123@abc123.pl', 'Maciej', '$2y$10$U6hM/RxnYlTEQGUreqeka.TpYXorPq290.GeNEqZz.ZsON2dKtP2O'),
(4, 'kamil.kutzmann@gmail.com', 'Kamil Łamignat', '$2y$10$gV8YknHV1vBAHgMDYBzSLew/Eejq9WprEN/2xqLohZwa7748qZT2O'),
(5, 'szymek@szymek.pl', 'Szymek', '$2y$10$4e2uXznd2n5FIhekwoBnAeoDb5OopfJTyKdNl2lc.DLJeaQSIXMSe'),
(6, 'adkaj@dlakfj.pl', 'Anida', '$2y$10$GLoD9/dYQkJhJBbK8kORXe1/8ofBFCGcr74o3qy7XNMLK84f6io6q'),
(7, 'aaa@aaa.pl', 'aaa', '$2y$10$NnsNh9Fb87TKeLhZnT0JGuYfdNK/f05rksTEc9UZudtvCYhw4IInq'),
(8, 'ania@ania.pl', 'Ania', '$2y$10$H3PFhtbqRpTfDQQrzmIKJe6ir4p93hL4PgRETx1jiPIS.SkAljO.S'),
(9, 'maciej.kutzmann@gmail.com', 'Maciej Kutzmann', '$2y$10$VigKxUEZzYAyqMTISQXqBOWeKBOd1R6jVLiILpAY3lrZI4Bgh1tOG'),
(10, 'xxx@xxx.pl', 'XXXXXXX', '$2y$10$0ARBOSI1DDiBNf5NPyG1B.qv/ZZkyUGrIjkiXRYrv52MSFGr7597i'),
(11, 'user2@user2.pl', 'user2', '$2y$10$RTdSfcRWGSHdiE1oDyuVnOZHQKG5h/MGi.r8LDyx8NgopO5q1duuC'),
(12, 'fdaksdj@cdafkd.pl', 'cccc', '$2y$10$zIxSIHzdTbqdiYkgIuDuiOtkDL7rswzm0JP0FHbqoJ6LSoxG.ou6q'),
(13, 'ania.kutzmann@gmail.com', 'Ania Kutzmann', '$2y$10$6Goe3HDVaImTK2gxja8Cxeba/Mq28JJYP155f5xSRXAmRSNWV2pb6'),
(14, 'user4@user4.pl', 'kjfdalkjl', '$2y$10$qRu9d8tgifaVOZGy3EKApuY9Z4iNtoQdgAdwr3DaQWuCxWgr3moF.'),
(15, 'user5@user5.pl', 'User5', '$2y$10$GyNbTv0fnr66ttXN1B0z.elTZto1mkqO3Xst.bfOPS0ChYL2Q3S7O'),
(21, 'user66@user66.pl', 'user66', '$2y$10$feX9nVTe3Cpc7yYSLUrqC.0JsSsflteOSXebkzg28CH5SXyagjmhu');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `Comment`
--
ALTER TABLE `Comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_post` (`id_post`);

--
-- Indexes for table `Meesages`
--
ALTER TABLE `Meesages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meesages_users`
--
ALTER TABLE `meesages_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `meesage_id` (`meesage_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `Tweet`
--
ALTER TABLE `Tweet`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `Comment`
--
ALTER TABLE `Comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT dla tabeli `Meesages`
--
ALTER TABLE `Meesages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT dla tabeli `meesages_users`
--
ALTER TABLE `meesages_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT dla tabeli `Tweet`
--
ALTER TABLE `Tweet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT dla tabeli `Users`
--
ALTER TABLE `Users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `Comment`
--
ALTER TABLE `Comment`
  ADD CONSTRAINT `Comment_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `Users` (`id`),
  ADD CONSTRAINT `Comment_ibfk_2` FOREIGN KEY (`id_post`) REFERENCES `Tweet` (`id`);

--
-- Ograniczenia dla tabeli `meesages_users`
--
ALTER TABLE `meesages_users`
  ADD CONSTRAINT `meesages_users_ibfk_1` FOREIGN KEY (`meesage_id`) REFERENCES `Meesages` (`id`),
  ADD CONSTRAINT `meesages_users_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `Users` (`id`);

--
-- Ograniczenia dla tabeli `Tweet`
--
ALTER TABLE `Tweet`
  ADD CONSTRAINT `Tweet_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `Users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
