-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sty 23, 2024 at 09:06 PM
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
-- Database: `moja_strona`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kategoria`
--

CREATE TABLE `kategoria` (
  `id` int(11) NOT NULL,
  `matka` int(11) NOT NULL DEFAULT 0,
  `nazwa` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategoria`
--

INSERT INTO `kategoria` (`id`, `matka`, `nazwa`) VALUES
(2, 0, 'Książka'),
(5, 0, 'Pralka'),
(7, 2, 'Pan Tadeusz'),
(8, 5, 'Samsung'),
(9, 8, 'PR-421');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `page_list`
--

CREATE TABLE `page_list` (
  `id` int(11) NOT NULL,
  `page_title` varchar(255) NOT NULL,
  `page_content` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `page_list`
--

INSERT INTO `page_list` (`id`, `page_title`, `page_content`, `status`) VALUES
(2, 'kontakt.html', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n    <meta charset=\"UTF-8\">\r\n    <title>Kontakt</title>\r\n    <style>\r\n        .container {\r\n            width: 80%;\r\n            margin: auto;\r\n            background-color: white;\r\n            padding: 20px;\r\n        }\r\n        form {\r\n            margin-top: 20px;\r\n        }\r\n        label, input, textarea {\r\n            display: block;\r\n            width: 100%;\r\n            margin-bottom: 10px;\r\n        }\r\n        input, textarea {\r\n            padding: 8px;\r\n        }\r\n        input[type=\"submit\"] {\r\n            background-color: #4CAF50;\r\n            color: white;\r\n            border: none;\r\n            padding: 15px 32px;\r\n            text-align: center;\r\n            text-decoration: none;\r\n            display: inline-block;\r\n            font-size: 16px;\r\n            margin: 4px 2px;\r\n            cursor: pointer;\r\n        }\r\n		.menu {\r\n            background-color: #333;\r\n            overflow: hidden;\r\n        }\r\n        .menu a {\r\n            float: left;\r\n            display: block;\r\n            color: white;\r\n            text-align: center;\r\n            padding: 14px 16px;\r\n            text-decoration: none;\r\n        }\r\n        .menu a:hover {\r\n            background-color: #ddd;\r\n            color: black;\r\n        }\r\n        h1, h2 {\r\n            color: #333;\r\n        }\r\n    </style>\r\n</head>\r\n<body>\r\n    <div class=\"container\">\r\n		<div class=\"menu\">\r\n            <a href=\"../index.html\">Home</a>\r\n            <a href=\"azja.html\">Mosty w Azji</a>\r\n            <a href=\"amerykapolnocna.html\">Mosty w Ameryce Północnej</a>\r\n            <a href=\"europa.html\">Mosty w Europie</a>\r\n			<a href=\"galeria.html\">Galeria zdjęć</a>\r\n            <a href=\"kontakt.html\">Kontakt</a>\r\n        </div>\r\n        <h1>Formularz kontaktowy</h1>\r\n        <form action=\"mailto:mail@gmail.com\" method=\"post\" enctype=\"text/plain\">\r\n            <label for=\"name\">Imię:</label>\r\n            <input type=\"text\" id=\"name\" name=\"name\">\r\n\r\n            <label for=\"email\">Email:</label>\r\n            <input type=\"text\" id=\"email\" name=\"email\">\r\n\r\n            <label for=\"message\">Wiadomość:</label>\r\n            <textarea id=\"message\" name=\"message\"></textarea>\r\n\r\n            <input type=\"submit\" value=\"Wyślij\">\r\n        </form>\r\n    </div>\r\n</body>\r\n</html>\r\n', 1),
(3, 'galeria.html', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n    <meta charset=\"UTF-8\">\r\n    <title>Największe mosty świata</title>\r\n    <style>\r\n        #container {\r\n            width: 80%;\r\n            margin: auto;\r\n            background-color: white;\r\n            padding: 20px;\r\n        }\r\n\r\n        .menu {\r\n            background-color: #333;\r\n            overflow: hidden;\r\n        }\r\n        .menu a {\r\n            float: left;\r\n            display: block;\r\n            color: white;\r\n            text-align: center;\r\n            padding: 14px 16px;\r\n            text-decoration: none;\r\n        }\r\n        .menu a:hover {\r\n            background-color: #ddd;\r\n            color: black;\r\n        }\r\n        h1, h2 {\r\n            color: #333;\r\n        }\r\n		\r\n		.bg {\r\n            background-image: url(\'tlo1.png\');\r\n            height: 100%;\r\n            background-position: center;\r\n            background-repeat: no-repeat;\r\n            background-size: cover;\r\n        }\r\n    </style>\r\n</head>\r\n<body>\r\n    <div id=\"container\">\r\n        <div class=\"menu\">\r\n            <a href=\"../index.html\">Home</a>\r\n            <a href=\"azja.html\">Mosty w Azji</a>\r\n            <a href=\"amerykapolnocna.html\">Mosty w Ameryce Północnej</a>\r\n            <a href=\"europa.html\">Mosty w Europie</a>\r\n			<a href=\"galeria.html\">Galeria zdjęć</a>\r\n            <a href=\"kontakt.html\">Kontakt</a>\r\n        </div>\r\n		<h1>Beipan Guanxing</h1>\r\n		<img src=\"../img/galeria_beipan.jpg\" width=\"600\" height=\"600\">\r\n		<h1>Baling River</h1>\r\n		<img src=\"../img/galeria_baling.jpg\" width=\"600\" height=\"600\">\r\n		<h1>Liuguanghe Xiqian</h1>\r\n		<img src=\"../img/galeria_xiqian.jpg\" width=\"600\" height=\"600\">\r\n		<h1>Baluarte</h1>\r\n		<img src=\"../img/galeria_baluarte.jpg\" width=\"600\" height=\"600\">\r\n</body>\r\n</html>\r\n', 1),
(4, 'amerykapolnocna.html', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n    <meta charset=\"UTF-8\">\r\n    <title>Największe mosty świata</title>\r\n    <style>\r\n        #container {\r\n            width: 80%;\r\n            margin: auto;\r\n            background-color: white;\r\n            padding: 20px;\r\n        }\r\n\r\n        .menu {\r\n            background-color: #333;\r\n            overflow: hidden;\r\n        }\r\n        .menu a {\r\n            float: left;\r\n            display: block;\r\n            color: white;\r\n            text-align: center;\r\n            padding: 14px 16px;\r\n            text-decoration: none;\r\n        }\r\n        .menu a:hover {\r\n            background-color: #ddd;\r\n            color: black;\r\n        }\r\n        h1, h2 {\r\n            color: #333;\r\n        }\r\n		\r\n		.bg {\r\n            background-image: url(\'tlo1.png\');\r\n            height: 100%;\r\n            background-position: center;\r\n            background-repeat: no-repeat;\r\n            background-size: cover;\r\n        }\r\n    </style>\r\n</head>\r\n<body>\r\n    <div id=\"container\">\r\n        <div class=\"menu\">\r\n            <a href=\"../index.html\">Home</a>\r\n            <a href=\"azja.html\">Mosty w Azji</a>\r\n            <a href=\"amerykapolnocna.html\">Mosty w Ameryce Północnej</a>\r\n            <a href=\"europa.html\">Mosty w Europie</a>\r\n			<a href=\"galeria.html\">Galeria zdjęć</a>\r\n            <a href=\"kontakt.html\">Kontakt</a>\r\n        </div>\r\n		<h1>Most Atchafalaya Basin</h1>\r\n		<p>\r\n			Most Atchafalaya Basin, znany również jako Louisiana Airborne Memorial Bridge, to para równoległych mostów w amerykańskim stanie Luizjana, pomiędzy Baton Rouge i Lafayette, \r\n			które prowadzą międzystanową nr 10 nad basenem Atchafalaya. O całkowitej długości 96 095 stóp (29 290 m; 18 mil; 29 km) jest trzecim najdłuższym mostem w USA, drugim co do długości w \r\n			systemie międzystanowym i 14. co do długości na świecie pod względem całkowitej długości.\r\n\r\n			Most został oddany do użytku w 1973 r., budowę rozpoczęto w 1971 r. W momencie ukończenia był to drugi najdłuższy most w Stanach Zjednoczonych, po Lake Pontchartrain Causeway Bridge. \r\n			Z mostu znajdują się dwa zjazdy: jedno do Whiskey Bay (Louisiana Highway 975) i drugie do Butte La Rose (LA 3177). Chociaż mosty na większości swojej długości przebiegają równolegle, \r\n			łączą się podczas przekraczania kanału pilotażowego Whiskey Bay i rzeki Atchafalaya. Średnie dzienne natężenie ruchu wynosi (stan na 2015 r.) 30 420 pojazdów.\r\n\r\n			W pobliżu dwóch przepraw przez rzekę często dochodzi do wypadków, ponieważ oba są bardzo wąskie i pozbawione poboczy. Wypadki na moście mogą być problematyczne, ponieważ dorzecze Atchafalaya \r\n			jest słabo zaludnione. W 1999 roku gubernator Mike Foster obniżył dozwoloną prędkość na moście z 70 do 60 mil na godzinę (115 do 95 km/h). W 2003 roku legislatura Luizjany przyjęła nowe przepisy \r\n			ruchu drogowego dla mostu. Dozwolona prędkość dla 18-kołowców została obniżona do 55 mil na godzinę (90 km/h), a podczas przekraczania mostu muszą oni pozostać na prawym pasie.\r\n			<img src=\"../img/most_atchafalya.jpg\" style=\"float:right\" alt=\"Most Atchafalaya Basin\" width=\"300\" height=\"200\">\r\n			<img src=\"../img/most_atchafalya2.jpg\" style=\"float:left\" alt=\"Most Atchafalaya Basin\" width=\"300\" height=\"200\">\r\n			<img src=\"../img/most_atchafalya3.jpg\" style=\"margin:auto\" alt=\"Most Atchafalaya Basin\" width=\"378.3\" height=\"200\">\r\n		</p>\r\n</body>\r\n</html>\r\n', 1),
(5, 'azja.html', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n    <meta charset=\"UTF-8\">\r\n    <title>Największe mosty świata</title>\r\n    <style>\r\n        #container {\r\n            width: 80%;\r\n            margin: auto;\r\n            background-color: white;\r\n            padding: 20px;\r\n        }\r\n\r\n        .menu {\r\n            background-color: #333;\r\n            overflow: hidden;\r\n        }\r\n        .menu a {\r\n            float: left;\r\n            display: block;\r\n            color: white;\r\n            text-align: center;\r\n            padding: 14px 16px;\r\n            text-decoration: none;\r\n        }\r\n        .menu a:hover {\r\n            background-color: #ddd;\r\n            color: black;\r\n        }\r\n        h1, h2 {\r\n            color: #333;\r\n        }\r\n		\r\n		.bg {\r\n            background-image: url(\'tlo1.png\');\r\n            height: 100%;\r\n            background-position: center;\r\n            background-repeat: no-repeat;\r\n            background-size: cover;\r\n        }\r\n    </style>\r\n</head>\r\n<body>\r\n    <div id=\"container\">\r\n        <div class=\"menu\">\r\n            <a href=\"../index.html\">Home</a>\r\n            <a href=\"azja.html\">Mosty w Azji</a>\r\n            <a href=\"amerykapolnocna.html\">Mosty w Ameryce Północnej</a>\r\n            <a href=\"europa.html\">Mosty w Europie</a>\r\n			<a href=\"galeria.html\">Galeria zdjęć</a>\r\n            <a href=\"kontakt.html\">Kontakt</a>\r\n        </div>\r\n		<h3>Most Donhai</h3>\r\n		<p>\r\n			Po przejęciu portu w Rotterdamie w 2003 r., Hongkongu w 2004 r. I Singapuru w 2005 r. , Szanghaj jest teraz, dzięki dynamice Chin, najważniejszym portem na świecie, ale całkowicie \r\n			zatłoczonym przy rocznym wzroście jego 30% ruchu.\r\n			W latach 2000-2001 podjęto decyzję o budowie nowego portu głębinowego na wyspach Yangshan , niedaleko Szanghaju . \r\n			Ten nowy port musi być połączony z dystryktem Guoyuan gigantycznym mostem falującym na otwartym morzu przez co najmniej 32,5 kilometra, zanim osiągnie swój cel, \r\n			aby podążać za płyciznami zdolnymi do podtrzymania fundamentów.<img src=\"../img/most_dongai.jpg\" style=\"float:left\" alt=\"Most Jintang\" width=\"300\" height=\"200\">\r\n			Podczas gdy pierwsze szacunki przewidywały normalny okres od siedmiu do ośmiu lat na to osiągnięcie, prace fundamentowe trwały od 26 czerwca 2002 r. Do 16 września 2003 r. , \r\n			Sama konstrukcja została ukończona 26 maja 2005 r. , Czyli mniej niż trzy lata. po rozpoczęciu prac ustanawiając rekord prędkości w budownictwie pomimo szalejących w regionie wiatrów, pływów i huraganów. \r\n			Same prace wykończeniowe - asfalt, urządzenia sygnalizacyjne i zabezpieczające - zostały zakończone pod koniec listopada 2005 roku .\r\n			Ten cud w chińskim stylu był możliwy dzięki doskonałej organizacji, a przede wszystkim dzięki liczebności i szczególnemu zarządzaniu zatrudnioną siłą roboczą. \r\n			Na tej gigantycznej budowie zatrudnionych było sześć tysięcy pracowników, inżynierów i techników z prowincji Jiangsu , Anhui i Henan . \r\n			Pracowali i mieszkali na moście iw jego wnętrzu, nawet wewnątrz ogromnych metalowych belek - 59  m długości, 6  m szerokości, 3,5  m wysokości - 20 m n.p.m., przemieszczając się wraz z postępem prac. \r\n			Każdemu przysługiwało 3,5  m 2 powierzchni .\r\n			Średnia pensja wynosiła 1000 juanów (około 110 euro), czyli dwa razy więcej niż średnia pensja w branży budowlanej w Chinach . Osamotnieni, żyjąc w stałej wilgotności 100%, \r\n			nie mieli czasu na wydawanie pensji. Ich dzień pracy trwał 12 godzin. Według jednego z kierowników budowy: „Gdybyśmy musieli codziennie zabierać cały personel na ląd, stracilibyśmy dużo czasu na projekcie. \r\n			Było to nie do pogodzenia z oczekiwanymi przez władze miasta opóźnieniami.\r\n			<ul>\r\n			<li>Długość: 32,5  km</li>\r\n			<li>Szerokość: 31,5  m</li>\r\n			<li>Pasy: 6 pasów ruchu + 2 pasy awaryjne.</li>\r\n			<li>Pale (słupy masywne): seria 670 o rozstawie 50  m + 2 pylony.</li>\r\n			<li>Pokład: 670 porcji, z których każda mierzy powierzchnię 4 boisk do siatkówki i waży 1600 ton, z marginesem błędu podczas montażu 5  mm . Do pokrycia go zużyto 100 000 ton asfaltu .</li>\r\n			<li>Główny most wiszący: długość 420  m , wysokość wieży 159  mi wysokość podpokładu 40  m  : wystarczająca, aby pomieścić statki o dowolnym tonażu.</li>\r\n			<li>Szacunkowy koszt początkowy: 400 mln euro, ostateczny koszt 1,1 mld euro.</li>\r\n			</ul>\r\n		</p>\r\n		<h2>Most Runyang</h2>\r\n		<p>\r\n			\r\n		</p>\r\n		<h4>Most Jintang</h4>\r\n		<p>\r\n			Most Jintang jest mostem podwieszonym z przęsłem rozpiętości 620 m (14 w świecie) (fot. 75) [2,13,14]. Poszczególne\r\n			przęsła mostu głównego (żeglownego) mają rozpiętości: 77 +\r\n			<img src=\"../img/jintang1.webp\" style=\"float:right\" alt=\"Most Jintang\" width=\"300\" height=\"200\">\r\n			218 + 620 + 218 + 77 m. Pomost wykonano w postaci skrzynki stalowej wielokomorowej, a pylony betonowe mają wysokość 204 m. Jest jednym z dwóch dużych mostów podwieszonych na mostowej trasie transoceanicznej archipelagu Zhoushan – największej grupy wysp oceanicznych w Chinach.\r\n			Całkowita długość mostu to 26 540 m, z których 18,4 km biegnie nad wodą. Most jest 4. najdłuższym mostem drogowym\r\n			w Chinach po mostach Jiaozhou, Zatoki Hangzhou i Donghai.\r\n			Łączy Ningbo z wyspą Jintang. Ukończony w 2009 r.<br>\r\n			\r\n			\r\n		</p>\r\n</body>\r\n</html>\r\n', 1),
(6, 'europa.html', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n    <meta charset=\"UTF-8\">\r\n    <title>Największe mosty świata</title>\r\n    <style>\r\n        #container {\r\n            width: 80%;\r\n            margin: auto;\r\n            background-color: white;\r\n            padding: 20px;\r\n        }\r\n\r\n        .menu {\r\n            background-color: #333;\r\n            overflow: hidden;\r\n        }\r\n        .menu a {\r\n            float: left;\r\n            display: block;\r\n            color: white;\r\n            text-align: center;\r\n            padding: 14px 16px;\r\n            text-decoration: none;\r\n        }\r\n        .menu a:hover {\r\n            background-color: #ddd;\r\n            color: black;\r\n        }\r\n        h1, h2 {\r\n            color: #333;\r\n        }\r\n		\r\n		.bg {\r\n            background-image: url(\'tlo1.png\');\r\n            height: 100%;\r\n            background-position: center;\r\n            background-repeat: no-repeat;\r\n            background-size: cover;\r\n        }\r\n    </style>\r\n</head>\r\n<body>\r\n    <div id=\"container\">\r\n        <div class=\"menu\">\r\n            <a href=\"../index.html\">Home</a>\r\n            <a href=\"azja.html\">Mosty w Azji</a>\r\n            <a href=\"amerykapolnocna.html\">Mosty w Ameryce Północnej</a>\r\n            <a href=\"europa.html\">Mosty w Europie</a>\r\n			<a href=\"galeria.html\">Galeria zdjęć</a>\r\n            <a href=\"kontakt.html\">Kontakt</a>\r\n        </div>\r\n		<h1>Most Krymski</h1>\r\n		<p>\r\n			Most Krymski, most Kerczeński, most nad Cieśniną Kerczeńską, most przez Cieśninę Kerczeńską – most łączący okupowany przez Rosję Półwysep Krymski z \r\n			Półwyspem Tamańskim poprzez Cieśninę Kerczeńską.\r\n			Most jest częścią nowego odcinka linii kolejowej Bagierowo–Wyszestieblijewska. Połączenie kolejowe do mostu z Półwyspu Tamańskiego rozpoczyna się od stacji Wyszestieblijewska na \r\n			północnokaukaskiej linii kolejowej. Łączna długość nowej linii wynosi 62,74 km, w tym główna trasa: 56,04 km, tory na stacjach: 6,7 km, oraz 16 rozjazdów.\r\n			Połączenie drogowe do mostu po wschodniej stronie bierze początek od trasy M-25 Noworosyjsk–Cieśnina Kerczeńska, a kończy się w rejonie Tuzły na skrzyżowaniu z korytarzem transportowym. \r\n			Długość połączenia wynosi 40 km. Droga obejmuje cztery pasy ruchu o prędkości projektowej 120 km/h. Potencjalne natężenie ruchu przewidziane na rok 2034 w obu kierunkach wynosi nie mniej niż 36 000 \r\n			samochodów dziennie.\r\n			<img src=\"../img/most_krymski.jpg\" style=\"float:right\" alt=\"Most Krymski\" width=\"300\" height=\"200\">\r\n\r\n			Po stronie zachodniej połączenie drogowe z mostem bierze początek od trasy A-150 „Tauryda” Kercz–Sewastopol i kończy się w rejonie twierdzy Kercz, na połączeniu z korytarzem transportowym. \r\n			Długość połączenia wynosi 22 km. Droga obejmuje cztery pasy ruchu o prędkości projektowej 140 km/h. Trasa „Tauryda” w wersji dwupasmowej powinna być oddana do użytku w 2018, a na 2020 przewiduje się \r\n			uruchomienie dwóch kolejnych pasów\r\n			Dane techniczne dotyczące połączenia kolejowego:\r\n			długość obiektu wynosi 40 km\r\n			całkowita długość nowych linii kolejowych wynosi 120 km, w tym 80 km głównej drogi, 22 km torów na stacjach kolejowych.\r\n			Ponadto w fazie projektowania znajduje się infrastruktura kolejowa ze stacji Portowa i Tamań Pasażerski do mostu.\r\n			Budowa i modernizacja połączenia kolejowego po stronie kontynentalnej są w znacznej mierze związane z budową suchego portu w Tamaniu. \r\n			Od bocznicy prowadzącej od portu do mostu będzie potrzebnych tylko 6 km linii kolejowych.\r\n		</p>\r\n		<h2>Most Vasco da Gamy</h2>\r\n		<p>\r\n			Most Vasco da Gamy (port. Ponte Vasco da Gama) – most w Europie, który spina brzeg rzeki Tag w okolicach stolicy Portugalii, Lizbony (w miejscowości Sacavém) z miejscowością Montijo \r\n			po drugiej stronie rzeki. Jego długość wynosi 17,2 km, w tym 0,829 km to przęsło główne, 11,5 km pozostałe przęsła nurtowe oraz 4,8 km to wiadukty dojazdowe i węzły.\r\n			<img src=\"../img/most_vasco.jpg\" style=\"float:left\" alt=\"Most Vasco da Gamy\" width=\"300\" height=\"190\">			\r\n			Most został zbudowany w celu odciążenia ruchu na jedynej działającej wcześniej przeprawie (Most 25 Kwietnia, port. Ponte 25 de Abril) łączącej Lizbonę z terenami po drugiej stronie Tagu oraz z autostradami.\r\n			Most został otwarty dla ruchu samochodowego 29 marca 1998, w czasie odbywających się międzynarodowych targów Expo ’98. Budowlę nazwano imieniem żeglarza Vasco da Gamy w pięćsetną rocznicę \r\n			odkrycia przez niego drogi morskiej z Europy do Indii.\r\n			Most składa się z sześciu pasów ruchu, na których obowiązuje ograniczenie prędkości, tak jak na autostradzie do 120 km/h, wyjątkiem jest jedna sekcja gdzie ograniczenie prędkości wynosi 100 km/h. W deszczowe, wietrzne lub mgliste dni prędkość na moście ograniczona jest do 90 km/h. W przypadku, gdy ruch samochodowy wzrośnie do 52 tys. samochodów na dobę liczba pasów ruchu może być rozbudowana do ośmiu.\r\n			Sekcje mostu\r\n			<ul>\r\n			<li>Północny wjazd – 945 m; połączenie z autostradą A12</li>\r\n			<li>Wiadukt północny – 488 m; 11 sekcji</li>\r\n			<li>Wiadukt „Expo” – 672 m; 12 sekcji</li>\r\n			<li>przęsło główne – rozpiętość pomiędzy pylonami: 420 m; zasięg z każdej strony pylonu: 203 m (łączna długość: 829 m); wysokość pylonów: 150 m; wysokość skrajni żeglownej: 45 m;</li>\r\n			<li>Wiadukt centralny – 6531 m; 80 prefabrykowanych 78 metrowych sekcji; 81 żelbetonowych pali o długości od 45 do 95 m; wysokość od 14 do 30 m</li>\r\n			<li>Wiadukt południowy – 3825 m; 84 prefabrykowanych 45 metrowych sekcji; 85 żelbetonowych pali</li>\r\n			<li>Południowy wjazd – 3895 m; połączenie z autostradą A1</li>\r\n			</ul>\r\n			Na północnej granicy mostu znajdują się bramki, gdzie jest pobierana opłata w wysokości 2.80 euro (stawka w 2018 roku) za samochód osobowy, na południowej granicy brak bramek\r\n		</p>\r\n</body>\r\n</html>\r\n', 1),
(7, 'filmy.html', '<h1 class=\"highlighted-text\"> FILMY: </h1>\r\n<table>\r\n    <tr>\r\n        <th>\r\n            <iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/tMrV9T_zhQs?si=gFQXNJTpyk6gbgsP\" \r\n			title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen>\r\n			</iframe>\r\n        </th>\r\n    </tr>\r\n    <tr>\r\n        <th>\r\n            <iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/BBmT7xcHPyM?si=E6SZFsERlM5ow7-M\" \r\n			title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen>\r\n			</iframe>\r\n        </th>\r\n    </tr>\r\n    <tr>\r\n        <th>\r\n            <iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/_pxAUhWQBqE?si=BmwNxdDRJZRMzd_M\" \r\n			title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen>\r\n			</iframe>\r\n        </th>\r\n    </tr>\r\n</table>', 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `produkt`
--

CREATE TABLE `produkt` (
  `id` int(11) NOT NULL,
  `tytul` varchar(255) NOT NULL,
  `opis` text DEFAULT NULL,
  `data_utworzenia` datetime DEFAULT current_timestamp(),
  `data_modyfikacji` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `data_wygasniecia` datetime DEFAULT NULL,
  `cena_netto` decimal(10,2) NOT NULL,
  `podatek_vat` decimal(5,2) NOT NULL,
  `ilosc_dostepnych_sztuk` int(11) DEFAULT NULL,
  `status_dostepnosci` text NOT NULL,
  `kategoria` varchar(255) DEFAULT NULL,
  `gabaryt_produktu` varchar(255) DEFAULT NULL,
  `zdjecie` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produkt`
--

INSERT INTO `produkt` (`id`, `tytul`, `opis`, `data_utworzenia`, `data_modyfikacji`, `data_wygasniecia`, `cena_netto`, `podatek_vat`, `ilosc_dostepnych_sztuk`, `status_dostepnosci`, `kategoria`, `gabaryt_produktu`, `zdjecie`) VALUES
(4, 'Butelka Wody', 'Woda źródlana.', '2024-01-23 13:21:19', '2024-01-23 21:02:33', '2024-03-04 00:00:00', 4.50, 0.50, 356, 'Dostępny', 'Żywność', '0,5 kg', 'https://img.redro.pl/tapety/butelka-wody-mineralnej-pokryta-kroplami-wody-na-bialym-tle-700-184550071.jpg'),
(5, 'Pomidor', 'Pomidor polski.', '2024-01-23 13:47:51', '2024-01-23 21:02:37', '2024-01-25 00:00:00', 7.99, 3.99, 32, 'Dostępny', 'Żywność', '0,1 kg', 'https://reypol.com.pl/wp-content/uploads/2022/09/pomidor.png'),
(6, 'Masło', 'Masło roślinne.', '2024-01-23 21:00:48', '2024-01-23 21:02:40', '2024-03-11 00:00:00', 9.40, 3.40, 69, 'Dostępny', 'Żywność', '0,2 kg', 'https://fripo.pl/userdata/public/gfx/6856/maslo-roslinne-250-g.jpg');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `kategoria`
--
ALTER TABLE `kategoria`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `page_list`
--
ALTER TABLE `page_list`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `produkt`
--
ALTER TABLE `produkt`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategoria`
--
ALTER TABLE `kategoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `page_list`
--
ALTER TABLE `page_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `produkt`
--
ALTER TABLE `produkt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
