-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 15 mai 2018 à 21:20
-- Version du serveur :  5.7.19
-- Version de PHP :  5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `dlsbdeprojetb32`
--

-- --------------------------------------------------------

--
-- Structure de la table `covoiturage`
--

DROP TABLE IF EXISTS `covoiturage`;
CREATE TABLE IF NOT EXISTS `covoiturage` (
  `numCo` int(11) NOT NULL AUTO_INCREMENT,
  `numMembre` int(11) NOT NULL,
  `dateDepot` date NOT NULL,
  `etat` int(1) NOT NULL DEFAULT '0',
  `prix` decimal(5,2) NOT NULL DEFAULT '0.00',
  `description` varchar(30) NOT NULL,
  `villeDepart` varchar(30) NOT NULL,
  `villeArrive` varchar(30) NOT NULL,
  `pointDepart` varchar(30) NOT NULL,
  `pointArrive` varchar(30) NOT NULL,
  `heureDepart` varchar(30) NOT NULL,
  `heureArrive` varchar(30) NOT NULL,
  `jourDepart` date NOT NULL,
  `jourArrive` date NOT NULL,
  `nbPlaces` int(5) NOT NULL,
  `placeBagage` varchar(30) NOT NULL,
  `voiture` varchar(30) NOT NULL,
  `couleur` varchar(30) NOT NULL,
  PRIMARY KEY (`numCo`),
  KEY `fkM` (`numMembre`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `covoiturage`
--

INSERT INTO `covoiturage` (`numCo`, `numMembre`, `dateDepot`, `etat`, `prix`, `description`, `villeDepart`, `villeArrive`, `pointDepart`, `pointArrive`, `heureDepart`, `heureArrive`, `jourDepart`, `jourArrive`, `nbPlaces`, `placeBagage`, `voiture`, `couleur`) VALUES
(1, 2, '2017-07-03', 1, '30.00', '', 'RENNES', 'SAINT BRIEUC', 'Lycée ', 'Gare', '23:00:00', '14:00:00', '2018-05-15', '2017-07-04', 3, 'petit', 'Picasso', 'Noire'),
(2, 10, '2018-04-18', 1, '5.00', 'Covoit.Wow... SALUT', 'Toi', 'Moi', 'Chiffrer', 'Hash', '17:00:00', '17h30:00', '2018-04-20', '2018-04-20', 4, 'Yeah', '9RX', 'Vert'),
(5, 29, '2018-04-12', 1, '5.00', 'Un covoit ! WOW', 'Rennes', 'Nantes', 'Gare de Rennes', 'Mairie de Nantes', '17:00:00', '19h00:00', '2018-04-13', '2018-04-13', 3, 'petit', 'Pagani Huayra', 'gris'),
(6, 2, '2018-04-21', 1, '50.00', 'Oui, j\'en fais un ou deux', 'Las Vegas', 'Beijing', 'France', 'Les Caraïbes', '02:01:00', '03:59:00', '2020-09-24', '2019-04-02', 500, 'Géantes', 'Bang bus magic', 'Jaune'),
(7, 9, '2018-04-21', 0, '700.00', 'C\'est pas chère', 'Mon paysï', 'Guatemalä-lala', 'là', 'Bâäés', '00:02:00', '03:02:00', '2018-05-11', '2018-05-11', 2, 'moyenne', '4L', 'Grise'),
(9, 4, '2018-04-22', 1, '5.00', 'fds', 'YopLaBoom', 'PC', '132132123', '1231123', '01:01:00', '01:01:00', '2020-03-02', '2021-03-03', 5, 'Géante', 'Deltaplane', 'noir'),
(10, 13, '2018-04-22', 1, '20.00', 'Oui', 'Paris', 'Rennes', 'Montparnasse', 'Republique', '14:10:00', '18:30:00', '2018-04-26', '2018-04-26', 4, 'Oui', 'AudiR8', 'Grise'),
(11, 1, '2018-04-22', 1, '20.00', 'fds', 'Paris', 'Rennes', 'Gare Montparnasse', 'Sainte-Anne', '01:01:00', '01:03:00', '2020-03-02', '2021-03-03', 4, 'Oui', 'Audi R8', 'Grise'),
(12, 11, '2018-04-22', 1, '20.00', 'fgds', 'Paris', 'Rennes', 'Gare Montparnasse', 'Sainte-Anne', '01:01:00', '01:03:00', '2021-03-03', '2021-03-06', 3, 'Oui', 'BMW m5', 'Grise'),
(13, 32, '2018-04-22', 1, '20.00', 'Hello, world', 'Paris', 'Rennes', 'Gare Montparnasse', 'Sainte-Anne', '13:30:00', '18:00:00', '2018-04-25', '2018-04-25', 4, 'Non', 'Lykan', 'Grise'),
(14, 24, '2018-05-11', 1, '20.00', 'ddsq', 'ici', 'la', 'MONDEVERT', 'nowhereSerieux', '12:55', '01:02', '2018-05-10', '2018-07-05', 6, 'Oui', 'Des pieds', 'beige'),
(15, 25, '2018-05-11', 1, '20.00', 'fdsfsd', 'ici', 'la', 'Mairie', 'Time Square', '23:55', '04:02', '2018-05-10', '2018-08-06', 6, 'Trop', 'Yatch', 'Blanc'),
(16, 28, '2018-05-10', 1, '20.00', 'dsqdYO MED', 'Bouzole', 'Las Vegas', 'Village', 'un casino', '22:00', '01:01', '2018-06-05', '2018-06-06', 50, 'Geantes', 'Boeing 777', 'Bleu'),
(17, 30, '2018-05-10', 1, '20.00', 'dfs', 'La', 'bas', 'ici', 'meme', '04:03', '02:02', '2019-03-02', '2019-03-03', 7, 'Geantes', 'Jambes', 'beige');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `covoiturage`
--
ALTER TABLE `covoiturage`
  ADD CONSTRAINT `fkM` FOREIGN KEY (`numMembre`) REFERENCES `membre` (`numMembre`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
