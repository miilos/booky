-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Jan 20, 2025 at 05:31 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `it`
--

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `author_id` int(11) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`author_id`, `first_name`, `last_name`) VALUES
(4, 'Robert', 'Džordan'),
(5, 'Patrik', 'Rotfus'),
(6, 'Čarls', 'Dikens'),
(7, 'Stiven', 'King'),
(8, 'Marsel', 'Prust'),
(9, 'Brendon', 'Sanderson'),
(10, 'Alber', 'Kami'),
(11, 'Džejn', 'Ostin'),
(12, 'Fjodor Mihailovič', 'Dostojevski'),
(13, 'Emili', 'Bronte'),
(14, 'Džordž', 'Orvel'),
(15, 'Sali', 'Runi'),
(16, 'Teri', 'Pračet'),
(17, 'Džordž R. R.', 'Martin'),
(18, 'Ursula K.', 'Le Guin'),
(34, 'Anri Bejl', 'Stendal');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `book_id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `summary` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `author_id` int(11) NOT NULL,
  `discount` int(11) DEFAULT NULL,
  `genre` varchar(30) NOT NULL,
  `publisher_id` int(11) NOT NULL,
  `num_pages` int(11) NOT NULL,
  `binding` varchar(5) NOT NULL,
  `pub_year` int(11) NOT NULL,
  `cover_img` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`book_id`, `title`, `summary`, `price`, `author_id`, `discount`, `genre`, `publisher_id`, `num_pages`, `binding`, `pub_year`, `cover_img`) VALUES
(1, 'Zenica sveta', 'Točak vremena se okreće i Doba dolaze i prolaze, ostavljajući sećanja koja postaju legende. Legende blede u mitove, a čak je i mit davno zaboravljen kada se Doba koje ga je iznedrilo ponovo vrati. U Trećem dobu, Dobu proročanstva, Svet i Vreme leže u skladu. Ono što je bilo, što će biti i što jeste još može da padne pod Senku.', 1200.99, 4, 10, 'Epska fantastika', 1, 615, 'mek', 2021, './img/zenica_sveta.jpg'),
(2, 'Veliki lov', 'Druga knjiga u serijalu Točak vremena\r\n\r\nVekovima su putujući zabavljači pripovedali priče o izgubljenom Rogu Valera; legendarnom rogu koji će iz mrtvih podići junake svih Doba. Rog je otkriven - da bi odmah potom bio ukraden, zajedno sa bodežom Šadar Logota, od kojeg zavisi život prijatelja Randa al`Tora, Meta. Monumentalni zadatak pronalaženja i vraćanja svom težinom pada na Randova mlada pleća, jer ako nastavi započeto, ispuniće sudbinu od koje bi žarko želeo da pobegne. Ali potraga za Rogom Valera samo je početak Randovog dugog putovanja u nepoznato...', 1099.99, 4, 0, 'Epska fantastika', 1, 560, 'mek', 2003, './img/veliki_lov.jpg'),
(3, 'Ponovorođeni zmaj', 'Treća knjiga u serijalu Točak vremena.\r\n\r\nPonovorođeni Zmaj – onaj koji je najavljen u davnašnjim proročanstvima kao vođa koji će spasti svet, ali ga pri tome i uništiti; spasilac koji će poludeti i ubiti one koji su mu najdraži – konačno je stigao i pokušava da pobegne od svoje sudbine. U stanju je da dodirne Jednu moć, ali u nemogućnosti da je kontroliše. Bez ikoga je ko bi mogao tome da ga poduči jer već tri hiljade godina niko nije imao tu sposobnost. Rand al\ Tor, Ponovorođeni Zmaj, zna samo da mora da se suoči sa Mračnim. Ali kako?', 1199.99, 4, 0, 'Epska fantastika', 1, 576, 'mek', 2021, './img/ponovorodjeni_zmaj.jpg'),
(4, 'Ime vetra', 'Dobitnik nagrade Quill za najbolji roman epske fantastike.\r\n \r\n„Spasavao sam princeze od usnulih kraljeva mogila. Spalio sam grad Trebon. Proveo sam noć s Felurijankom sačuvavši i život i razum. U uzrastu kada su mene izbacili s Univerziteta većini nije dozvoljeno ni da se upišu. Hodim po mesečini stazama o kojima se drugi plaše da govore po danu. Razgovarah s bogovima, voleh žene i napisah pesme od kojih se putujući pevači rasplaču.\r\n \r\nZovem se Kvout. Možda ste čuli za mene.“', 1299.99, 5, 25, 'Epska fantastika', 1, 712, 'mek', 2011, './img/ime_vetra.jpg'),
(5, 'Strah mudroga', 'Pošto se zamerio jednom moćnom plemiću, Kvout je primoran da napusti Univerzitet i krene u svet u potrazi za srećom. Prepušten sam sebi i bez novca on odlazi u Vintas gde ubrzo biva uvučen u dvorske spletke. Dok pokušava da se dodvori jednom moćnom plemiću, Kvout razotkriva pokušaj ubistva, nalazi suparnika u još jednom ezoteričaru.', 1399.99, 5, NULL, 'Epska fantastika', 1, 896, 'mek', 2012, './img/strah_mudroga.jpg'),
(6, 'Priča o dva grada', 'Pred vama je jedan od, u svetu književnosti, najcitiranijih prikaza duha vremena Francuske revolucije. Kako je ovaj roman važio za najuticajnije shvatanje ove revolucije u anglofonom svetu, možemo ga smatrati i jednim od najvažnijih istorijskih romana. U vreme revolucije, ali i u Dikensovo vreme, često je bilo poređenje engleskog i francuskog društva, te strah da se društvena previranja i krvavi obračuni iz prestonice Francuske mogu preneti i na prestonicu britanske imperije. Tako su i dva grada iz ovog romana upravo Pariz i London.', 999.99, 6, 20, 'Klasici', 4, 360, 'mek', 2023, './img/prica_o_dva_grada.jpg'),
(7, 'Jedna Svanova ljubav', 'Šarl Svan je plejboj i dendi; čovek istančanog ukusa i ljubitelj umetnosti koji se fatalno zaljubljuje u Odetu de Kresi, „ženu na lošem glasu“, uz to prostu, zlu i glupu. Za Svana, ljubav je neodvojiva od ljubomore i strepnje. Da li će uspeti da održi idealizovanu sliku o Odeti, i hoće li ta zanesenost sačuvati njihovu ljubav od propasti?\r\n', 799.99, 8, NULL, 'Klasici', 1, 285, 'tvrd', 2018, './img/jedna_svanova_ljubav.jpg'),
(8, 'Put kraljeva', 'Rošar je svet kamenja i oluja. Neverovatno silni zlehudi orkani šibaju stenje i krš toliko često da su oblikovali kako životno okruženje tako i civilizaciju. Životinje se kriju u ljušturama, drveće uvlači granje a trava se povlači u kameno tle, bez zemljanog pokrivača.\r\n\r\nStoleća su prošla od posrnuća deset svetih viteških redova, zvanih Blistavi vitezovi, ali njihovi ivermačevi i iveroklopi i dalje su tu: mistična sečiva i oklopi koji najobičnije ljude pretvaraju u bezmalo nepobedive ratnike. Ratovi se zarad njih vode – i njima dobijaju.', 1599.99, 9, 20, 'Epska fantastika', 1, 1258, 'mek', 2014, './img/put_kraljeva.jpg'),
(9, 'Reči blistavosti', 'Druga knjiga Arhive olujne svetlosti.\r\n\r\nPre šest godina, Ubica u belom, najamnik tajanstvenih Paršendija, ubio je aletskog kralja baš u noći kada se slavio sporazum između ljudi i Paršendija. Tako su aletski visoki kneževi položili Zavet osvete i pošli u rat.\r\n\r\nSada Ubica u belom opet napada vladare širom Rošara, služeći se svojim zagonetnim moćima da osujeti sve telohranitelje i utekne progoniteljima. Njegova glavna meta je visoki knez Dalinar, za kojeg se smatra da poseduje prava moć aletskog prestola. Njegova vodeća uloga u ratu protiv Paršendija deluje kao dovoljan razlog, ali Ubičin gospodar zapravo ima daleko dublje pobude.', 1399.99, 9, NULL, 'Epska fantastika', 1, 1088, 'mek', 2015, './img/reci_blistavosti.jpg'),
(10, 'Mit o Sizifu', 'Filozofski esej Mit o Sizifu Alber Kami objavljuje iste godine kad i roman Stranac, pa se ove dve knjige često sagledavaju kao tematski komplementarne. Mit o Sizifu, jedan od najčuvenijih egzistencijalističkih tekstova dvadesetog veka, koji počinje postavljanjem filozofskog problema samoubistva, predstavlja analizu nihilizma i prirode apsurda, kao i čovekovog života u apsurdnom univerzumu bez reda i smisla.', 899.99, 10, NULL, 'Filozofija', 9, 126, 'mek', 2020, './img/mit_o_sizifu.jpg'),
(11, 'Normalni ljudi', 'Sali Runi priča priču o dvoje mladih ljudi čiji se životi prepliću kroz godine. Njihov odnos se razvija, puni izazova i promena, dok pokušavaju da razumeju sebe i jedno drugo. Roman istražuje kako ljubav i veze funkcionišu u kontekstu modernih društvenih normi i očekivanja, pružajući čitaocima pronicljive uvide u emotivne borbe mladih generacija.', 1099.99, 15, NULL, 'Drama', 3, 256, 'mek', 2019, './img/normalni_ljudi.jpg'),
(12, 'Gordost i predrasuda', 'Najpopularniji roman Džejn Ostin odvija se početkom XIX veka i slika običaje i naravi porodice Benet. U njihovo susedstvo se doseljava bogati mladi gospodin Bingli, kod koga često u posetu dolazi arogantan ali poželjan plemić Darsi. Bingli se odmah interesuje za Džejn, najstariju ćerku Benetovih, dok Darsi nailazi na niz poteškoća u prilagođavanju lokalnom društvu, i često se sukobljava sa njenom sestrom Elizabet. Kako vreme prolazi, Elizabet uviđa da Darsijev stav prema okolini ima opravdano utemeljenje i zbog toga menja mišljenje o njemu.', 1099.99, 11, NULL, 'Klasici', 1, 376, 'tvrd', 2023, './img/gordost_i_predrasuda.jpg'),
(13, 'Crveno i crno', 'Radnja ovog romana koji je Stendalu doneo svetsku slavu, smeštena je u vreme Burbonske restauracije dvadesetih godina 21 veka, posle Napoleonovog poraza i proterivanja. Roman prati život Žilijena Sorela, zgodnog, mladog i ambicioznog siromašnog provincijalca, sina drvodelje koji želi da nađe sebi značajno mesto u društvu. Vođen Napoleonovim idejama želi da postigne vrtoglav i brz uspeh, ali društvene prilike su se promenile i Napoleonove ideje mu ne pomažu u tome. Žilijen će zatim svoj put ka uspehu pokušati da nađe zavodeći srca vladajućih žena. Da li će u tome uspeti?', 1499.99, 34, NULL, 'Klasici', 4, 484, 'tvrd', 2013, './img/crveno_i_crno.jpg'),
(14, 'Velika očekivanja', 'Jedan od najfascinantnijih romana Čarlsa Dikensa prati siroče Pipa dok iza sebe ostavlja detinjstvo bede i siromaštva nakon što mu je anonimni dobrotvor pružio priliku za gospodski život.\r\n\r\nNapisana 1860. godine, na vrhuncu Dikensove zrelosti, Velika očekivanja takođe otkrivaju piščevo gorko razumevanje činjenice da su naše najdublje moralne dileme rođene iz naših sopstvenih opsesija i iluzija.', 799.99, 6, NULL, 'Klasici', 4, 438, 'mek', 2020, './img/velika_ocekivanja.jpg'),
(17, 'O pisanju', 'Ima razloga zašto je Stiven King jedan od najčitanijih pisaca na svetu: on piše knjige koje vas uvlače u sebe i koje je nemoguće ispustiti iz ruku.\r\n\r\nOva vrhunska knjiga predstavlja svestrani i praktični prikaz spisateljskog zanata. Kingovi saveti utemeljeni su na živopisnim uspomenama iz detinjstva, prvim koracima, mukotrpnom početku karijere, zamalo kobnoj saobraćajnoj nesreći iz 1999. godine i neraskidivoj vezi između pisanja i života.', 799.00, 7, NULL, 'Drama', 2, 280, 'mek', 2018, './img/o_pisanju.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `books_orders`
--

CREATE TABLE `books_orders` (
  `book_order_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books_orders`
--

INSERT INTO `books_orders` (`book_order_id`, `book_id`, `order_id`) VALUES
(1, 4, 1),
(2, 1, 1),
(3, 6, 1),
(4, 4, 2),
(5, 1, 2),
(6, 6, 2),
(7, 7, 2),
(8, 6, 3),
(9, 8, 3),
(10, 7, 3);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `address` varchar(50) NOT NULL,
  `city` varchar(30) NOT NULL,
  `zip` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `total` decimal(10,2) NOT NULL DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `first_name`, `last_name`, `address`, `city`, `zip`, `created_at`, `total`) VALUES
(1, 'Miloš', 'Popović', 'Glavna 21', 'Bačka Topola', 24300, '2025-01-12 15:07:15', 2855.87),
(2, 'Miloš', 'Popović', 'Glavna 21', 'Bačka Topola', 24300, '2025-01-12 15:08:50', 3655.86),
(3, 'Miloš', 'Popović', 'Glavna 21', 'Bačka Topola', 24300, '2025-01-20 17:29:39', 2879.97);

-- --------------------------------------------------------

--
-- Table structure for table `publishers`
--

CREATE TABLE `publishers` (
  `pub_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `publishers`
--

INSERT INTO `publishers` (`pub_id`, `name`) VALUES
(1, 'Laguna'),
(2, 'Vulkan'),
(3, 'Geopoetika'),
(4, 'Kosmos izdavaštvo'),
(9, 'Kontrast izdavaštvo');

-- --------------------------------------------------------

--
-- Table structure for table `user_messages`
--

CREATE TABLE `user_messages` (
  `message_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `message` text NOT NULL,
  `sent_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_messages`
--

INSERT INTO `user_messages` (`message_id`, `name`, `email`, `message`, `sent_at`) VALUES
(1, 'milos', 'milos@gmail.com', 'test', '2025-01-09 15:28:44'),
(2, 'milos', 'milos@gmail.com', 'test poruka', '2025-01-09 15:33:07'),
(3, 'user', 'user@gmail.com', 'poruka', '2025-01-09 15:35:28'),
(4, 'milos', 'user@gmail.com', 'poruka', '2025-01-20 16:17:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`author_id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`book_id`),
  ADD KEY `fk_book_author` (`author_id`),
  ADD KEY `fk_book_publisher` (`publisher_id`);

--
-- Indexes for table `books_orders`
--
ALTER TABLE `books_orders`
  ADD PRIMARY KEY (`book_order_id`),
  ADD KEY `fk_order` (`order_id`),
  ADD KEY `fk_book` (`book_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `publishers`
--
ALTER TABLE `publishers`
  ADD PRIMARY KEY (`pub_id`);

--
-- Indexes for table `user_messages`
--
ALTER TABLE `user_messages`
  ADD PRIMARY KEY (`message_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `author_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `books_orders`
--
ALTER TABLE `books_orders`
  MODIFY `book_order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `publishers`
--
ALTER TABLE `publishers`
  MODIFY `pub_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user_messages`
--
ALTER TABLE `user_messages`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `fk_book_author` FOREIGN KEY (`author_id`) REFERENCES `authors` (`author_id`),
  ADD CONSTRAINT `fk_book_publisher` FOREIGN KEY (`publisher_id`) REFERENCES `publishers` (`pub_id`);

--
-- Constraints for table `books_orders`
--
ALTER TABLE `books_orders`
  ADD CONSTRAINT `fk_book` FOREIGN KEY (`book_id`) REFERENCES `books` (`book_id`),
  ADD CONSTRAINT `fk_order` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
