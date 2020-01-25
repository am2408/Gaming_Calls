-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  sam. 25 jan. 2020 à 10:17
-- Version du serveur :  5.7.26
-- Version de PHP :  7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `gaming_calls`
--

-- --------------------------------------------------------

--
-- Structure de la table `orderline`
--

DROP TABLE IF EXISTS `orderline`;
CREATE TABLE IF NOT EXISTS `orderline` (
  `Order_Id` int(11) NOT NULL,
  `Product_Id` int(11) NOT NULL,
  `Quantity_Ordered` int(200) NOT NULL,
  `PriceEach` double NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `orderline`
--

INSERT INTO `orderline` (`Order_Id`, `Product_Id`, `Quantity_Ordered`, `PriceEach`) VALUES
(1, 2, 1, 42),
(1, 28, 1, 55),
(1, 23, 1, 195),
(2, 24, 1, 15),
(2, 25, 1, 15),
(2, 26, 1, 22.5),
(3, 7, 1, 130),
(4, 27, 1, 175),
(5, 1, 1, 70),
(6, 26, 3, 22.5),
(7, 1, 1, 900),
(7, 33, 1, 500),
(8, 1, 1, 900),
(8, 33, 1, 500),
(9, 1, 2, 900),
(9, 33, 1, 500),
(9, 34, 1, 450),
(10, 1, 1, 900),
(11, 1, 1, 450),
(12, 1, 1, 900),
(13, 1, 1, 699.5),
(14, 33, 1, 379.5),
(15, 1, 1, 699.5),
(16, 1, 1, 1399),
(17, 33, 1, 759),
(18, 34, 1, 225),
(19, 1, 1, 699.5),
(20, 1, 1, 1399);

-- --------------------------------------------------------

--
-- Structure de la table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `User_Id` int(11) NOT NULL,
  `TaxRate` double DEFAULT NULL,
  `TaxAmount` double DEFAULT NULL,
  `TotalAmount` double DEFAULT NULL,
  `CreationTimestamp` datetime DEFAULT NULL,
  `CompleteTimestamp` datetime DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `orders`
--

INSERT INTO `orders` (`Id`, `User_Id`, `TaxRate`, `TaxAmount`, `TotalAmount`, `CreationTimestamp`, `CompleteTimestamp`) VALUES
(14, 9, 20, 7590, 379.5, '2020-01-24 10:36:47', NULL),
(13, 9, 20, 13990, 699.5, '2020-01-23 19:12:39', NULL),
(12, 10, 20, 18000, 900, '2020-01-23 17:03:07', NULL),
(11, 9, 20, 9000, 450, '2020-01-22 11:19:41', NULL),
(10, 1, 20, 18000, 900, '2020-01-20 11:23:34', NULL),
(9, 9, 20, 55000, 2750, '2020-01-17 14:20:09', '2020-01-24 17:17:14'),
(8, 1, 20, 28000, 1400, '2020-01-17 10:36:37', '2020-01-24 14:52:28'),
(15, 9, 20, 13990, 699.5, '2020-01-24 10:38:56', NULL),
(16, 10, 20, 27980, 1399, '2020-01-24 10:40:18', NULL),
(17, 10, 20, 15180, 759, '2020-01-24 10:58:06', NULL),
(18, 9, 20, 4500, 225, '2020-01-24 14:52:28', NULL),
(19, 9, 20, 13990, 699.5, '2020-01-24 17:17:14', NULL),
(20, 10, 20, 27980, 1399, '2020-01-24 17:21:15', '2020-01-24 17:22:34');

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(120) NOT NULL,
  `Photo` varchar(90) NOT NULL,
  `Horseman` varchar(90) DEFAULT NULL,
  `Phone_Left` varchar(90) DEFAULT NULL,
  `Screen` varchar(90) DEFAULT NULL,
  `Phone_Right` varchar(90) DEFAULT NULL,
  `Light` varchar(90) DEFAULT NULL,
  `Logo` varchar(90) DEFAULT NULL,
  `Gpu` varchar(90) DEFAULT NULL,
  `Icon1` varchar(90) DEFAULT NULL,
  `Icon2` varchar(90) DEFAULT NULL,
  `Icon3` varchar(90) DEFAULT NULL,
  `Icon1_Des` varchar(900) DEFAULT NULL,
  `Icon2_Des` varchar(900) DEFAULT NULL,
  `Icon3_Des` varchar(900) DEFAULT NULL,
  `Description` varchar(6553) NOT NULL,
  `QuantityInStock` int(255) NOT NULL,
  `BuyPrice` double NOT NULL,
  `Price` double NOT NULL,
  `Promo` double NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=54 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`Id`, `Name`, `Photo`, `Horseman`, `Phone_Left`, `Screen`, `Phone_Right`, `Light`, `Logo`, `Gpu`, `Icon1`, `Icon2`, `Icon3`, `Icon1_Des`, `Icon2_Des`, `Icon3_Des`, `Description`, `QuantityInStock`, `BuyPrice`, `Price`, `Promo`) VALUES
(1, 'Asus ROG Phone II', 'rog2.png', 'horseman.png', 'phone_left.png', 'screen.png', 'phone_right.png', 'light.png', 'logo.png', 'gpu.png', 'icon1.png', 'icon2.png', 'icon3.png', 'Snapdragon 855 Plus', 'Ecran AMOLED de 120Hz/1ms avec technologie HDR et Delta-E < 1', 'Batterie colossale de 6000 mAh avec technologie ROG HyperCharge', 'Le ROG Phone II franchit une étape de plus dans l\'évolution de l\'univers des jeux mobiles. Il délivre en effet des performances élevées sans interruption grâce à un véritable arsenal de composants surpuissants  : le SoC Qualcomm Snapdragon 855 Plus le plus rapide du marché, une mémoire de 12 Go, une batterie colossale de 6 000 mAh et GameCool II, le système de refroidissement à chambre à vapeur 3D qui a amplement fait ses preuves. Son écran AMOLED ultrarapide de 120 Hz/1 ms propose un affichage HDR (10-bits), une précision des couleurs évaluée à Delta-E < 1 ainsi qu\'une latence tactile ultra-bas pour garder l\'avantage sur tous vos jeux mobiles. Rappelant l\'emblématique design du ROG Phone I, le port de rechargement positionné sur le côté vous aide à exercer un contrôle complet et sans entrave de votre appareil notamment lorsque vous utilisez les gâchettes AirTriggers II, le système de vibrations Dual Surroundings, les haut-parleurs avants, le jack audio de 3,5 mm ainsi que le quadruple microphone avec annulateur de bruit. Parmi les accessoires inédits en option, les TwinView Dock II et la manette ROG Kunai ont fait une apparition fracassante sur la scène du jeu mobile. Jouer sur son smartphone n\'a jamais été aussi épique !', 500, 500, 1399, 699.5),
(33, 'Xiaomi Black Shark 2 Pro', 'shark2.jpg', 'horseman.png', 'phone_left.png', NULL, 'phone_right.png', NULL, 'logo.png', 'gpu.png', 'icon1.png', 'icon2.png', 'icon3.png', 'Snapdragon 855 Plus', 'Master Touch ! Précision ultra élevée, tactile de 0,3 mm pour pro gaming DC Dimming 2.0. Écran AMOLED premium avec protection oculaire avancée !', 'La capacité de 4000 mAh de la batterie du Black Shark 2 Pro permet des sessions de jeu ininterrompues de plusieurs heures.', 'Inspiré par les lignes pures des supercars de F1, le Black Shark 2 Pro est conçu de manière ergonomique à partir de matériaux premium, idéal pour les longues sessions de jeu.Le tout nouvel éclairage RGB « Shark Eyes » composé de deux bandes RGB au dos de l’appareil, offre une expérience de jeu incroyablement immersive.Lancez les applis et les jeux plus rapidement que jamais avec la technologie de stockage haute vitesse UFS 3.0, qui se targue d’offrir des vitesses de transfert de fichiers jusque 82 % plus élevées.En association avec les optimisations de jeu puissantes de Black Shark, vous profiterez d’un gain de performances de jeu globales de 27%. Les optimisations tactiles de Black Shark permettent d’obtenir des temps de réactions plus courts et une expérience de jeu plus fluide. La vitesse de rapport de réponse de 240 Hz* réduit les temps de réponse à seulement 34,7 ms, soit 100 % plus rapide que les autres écrans de smartphone. Avec le Black Shark 2 Pro, vous serez la gâchette la plus rapide sur le champ de bataille.', 500, 300, 759, 379.5),
(34, 'Nubia Phone RED Magic 3S', 'nub3.jpg', 'horseman.png', 'phone_left.png', NULL, 'phone_right.png', NULL, 'logo.png', 'gpu.png', 'icon1.png', 'icon2.png', 'icon3.png', 'Qualcomm Snapdragon 855 + / Adreno 640', 'Écran AMOLED 90 Hz (Écran large de 6,65 pouces)', 'Batterie 5000mAh + 18W de charge rapide', 'Encore peu connue du grand public, la marque Nubia a pourtant déjà présenté plusieurs innovations originales comme son smartphones à deux écrans ou encore sa montre connectée avec un écran flexible qui s’enroule autour du poignet. Le fabricant est également un habitué du smartphone gaming avec sa gamme de Red Magic : le dernier en date était le Red Magic 3 sorti en mai dernier.\r\n\r\nNubia lui a apporté quelques améliorations pour produire le Red Magic 3S, la version pro du modèle précédent. Ici pas de chichis, Nubia veut ce qu’il y a de mieux pour le gaming et équipe son tout dernier smartphone de ce qui se fait de mieux aujourd’hui.', 500, 200, 450, 225);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(120) NOT NULL,
  `LastName` varchar(120) NOT NULL,
  `Email` varchar(120) NOT NULL,
  `Pseudo` varchar(20) DEFAULT NULL,
  `Password` varchar(120) NOT NULL,
  `Address` varchar(360) NOT NULL,
  `City` varchar(120) NOT NULL,
  `Zip` varchar(11) NOT NULL,
  `Role` varchar(11) NOT NULL,
  `Role_Plan` int(11) DEFAULT NULL,
  `CreationTimestamp` datetime NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`Id`, `FirstName`, `LastName`, `Email`, `Pseudo`, `Password`, `Address`, `City`, `Zip`, `Role`, `Role_Plan`, `CreationTimestamp`) VALUES
(1, 'Abmane', 'Oussoul', 'namaskar619@gmail.com', 'admin', '$2y$11$1cf67a5dea60152ac284fu.dmjXduH4H4JEW7C3vmtO/PI1mx9cAa', '05 avenue du nord', 'Paris', '75010', 'admin', NULL, '2019-12-26 16:53:31'),
(9, 'Abdoul', 'MADEC', 'abdoul.m2408@gmail.com', 'AM2408', '$2y$11$67d19bc1925b6bb17b55eu473LpZftr9a7xC27HJWFpU0Ivq/l7km', '53 rue des marais', 'SEVRAN', '93270', 'pro', 10, '2020-01-16 11:44:45'),
(10, 'Sidh', 'KHAN', 'sidh2408@gmail.com', 'Sidh', '$2y$11$7e06af135024cd832eb11Os33ncryHulqPMYuixtkSZ8Z0s7raFNW', '01 avenue nord', 'Karachi', '75010', 'user', NULL, '2020-01-22 14:03:40');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
