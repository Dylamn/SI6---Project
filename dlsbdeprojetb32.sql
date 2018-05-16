-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 16 mai 2018 à 16:00
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
(1, 2, '2017-07-03', 1, '30.00', '', 'RENNES', 'SAINT BRIEUC', 'Lycée ', 'Gare', '23:00', '14:00', '2018-05-15', '2017-07-04', 3, 'petit', 'Picasso', 'Noire'),
(2, 10, '2018-04-18', 1, '5.00', 'Covoit.Wow... SALUT', 'Toi', 'Moi', 'Chiffrer', 'Hash', '17:00', '17h30', '2018-04-20', '2018-04-20', 4, 'Yeah', '9RX', 'Vert'),
(5, 29, '2018-04-12', 1, '5.00', 'Un covoit ! WOW', 'Rennes', 'Nantes', 'Gare de Rennes', 'Mairie de Nantes', '17:00', '19h00', '2018-04-13', '2018-04-13', 3, 'petit', 'Pagani Huayra', 'gris'),
(6, 2, '2018-04-21', 1, '50.00', 'Oui, j\'en fais un ou deux', 'Las Vegas', 'Beijing', 'France', 'Les Caraïbes', '02:01', '03:59', '2020-09-24', '2019-04-02', 500, 'Géantes', 'Bang bus magic', 'Jaune'),
(7, 9, '2018-04-21', 0, '700.00', 'C\'est pas chère', 'Mon paysï', 'Guatemalä-lala', 'là', 'Bâäés', '00:02', '03:02', '2018-05-11', '2018-05-11', 2, 'moyenne', '4L', 'Grise'),
(9, 4, '2018-04-22', 1, '5.00', 'fds', 'YopLaBoom', 'PC', '132132123', '1231123', '01:01', '01:01', '2020-03-02', '2021-03-03', 5, 'Géante', 'Deltaplane', 'noir'),
(10, 13, '2018-04-22', 1, '20.00', 'Oui', 'Paris', 'Rennes', 'Montparnasse', 'Republique', '14:10', '18:30', '2018-04-26', '2018-04-26', 4, 'Oui', 'AudiR8', 'Grise'),
(11, 1, '2018-04-22', 1, '20.00', 'fds', 'Paris', 'Rennes', 'Gare Montparnasse', 'Sainte-Anne', '01:01', '01:03', '2020-03-02', '2021-03-03', 4, 'Oui', 'Audi R8', 'Grise'),
(12, 11, '2018-04-22', 1, '20.00', 'fgds', 'Paris', 'Rennes', 'Gare Montparnasse', 'Sainte-Anne', '01:01', '01:03', '2021-03-03', '2021-03-06', 3, 'Oui', 'BMW m5', 'Grise'),
(13, 32, '2018-04-22', 1, '20.00', 'Hello, world', 'Paris', 'Rennes', 'Gare Montparnasse', 'Sainte-Anne', '13:30', '18:00', '2018-04-25', '2018-04-25', 4, 'Non', 'Lykan', 'Grise'),
(14, 24, '2018-05-11', 1, '20.00', 'ddsq', 'ici', 'la', 'MONDEVERT', 'nowhereSerieux', '12:55', '01:02', '2018-05-10', '2018-07-05', 6, 'Oui', 'Des pieds', 'beige'),
(15, 25, '2018-05-11', 1, '20.00', 'fdsfsd', 'ici', 'la', 'Mairie', 'Time Square', '23:55', '04:02', '2018-05-10', '2018-08-06', 6, 'Trop', 'Yatch', 'Blanc'),
(16, 28, '2018-05-10', 1, '20.00', 'dsqdYO MED', 'Bouzole', 'Las Vegas', 'Village', 'un casino', '22', '01:01', '2018-06-05', '2018-06-06', 50, 'Geantes', 'Boeing 777', 'Bleu'),
(17, 30, '2018-05-10', 1, '20.00', 'dfs', 'La', 'bas', 'ici', 'meme', '04:03', '02:02', '2019-03-02', '2019-03-03', 7, 'Geantes', 'Jambes', 'beige');

-- --------------------------------------------------------

--
-- Structure de la table `inscription`
--

DROP TABLE IF EXISTS `inscription`;
CREATE TABLE IF NOT EXISTS `inscription` (
  `idCo` int(11) NOT NULL,
  `idMembre` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `membre`
--

DROP TABLE IF EXISTS `membre`;
CREATE TABLE IF NOT EXISTS `membre` (
  `numMembre` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `classe` varchar(6) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `identifiant` varchar(10) NOT NULL,
  `mdp` varchar(50) NOT NULL,
  `deleteallow` int(1) NOT NULL DEFAULT '0',
  `numPrivilege` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`numMembre`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `membre`
--

INSERT INTO `membre` (`numMembre`, `nom`, `prenom`, `classe`, `email`, `identifiant`, `mdp`, `deleteallow`, `numPrivilege`) VALUES
(1, 'GUERIN', 'Ludovic', '', 'guerin.l@lyceedelasalle.fr', 'guerin.l', '21232f297a57a5a743894a0e4a801fc3', 0, 1),
(2, 'AGENAIS', 'Alban', 'SIO1', 'agenais.a@lyceedelasalle.fr', 'agenais.a', 'a62fc9df5e586ba53544cc1d554dd81e', 0, 0),
(3, 'BAUDRY', 'Alan', 'SIO1', 'baudry.a@lyceedelasalle.fr', 'baudry.a', 'c0078c72fe2da6b8d5c1ea0472ee2c66', 0, 0),
(4, 'BELLEC', 'Kéven', 'SIO1', 'bellec.k@lyceedelasalle.fr', 'bellec.k', 'f295d016aeda3845b11d61841d01d5de', 0, 0),
(5, 'BERTHELOT', 'Corentin', 'SIO1', 'berthelo.3@lyceedelasalle.fr', 'berthelo.3', '8fc34bd2336671ffe824ab3d0cb77bbc', 0, 0),
(6, 'BLANCARD', 'Orlane', 'SIO1', 'blancard.o@lyceedelasalle.fr', 'blancard.o', '5ff787072f074babb3b6723a267384d4', 0, 0),
(7, 'CANBOLAT', 'Oguzhan', 'SIO1', 'canbolat.o@lyceedelasalle.fr', 'canbolat.o', '7d0b097182e6d611680121dd9584da86', 0, 0),
(8, 'COLLEU', 'Elven', 'SIO1', 'colleu.e@lyceedelasalle.fr', 'colleu.e', '6c72debbdcc93f3a4035bfe0d25fa6f7', 0, 0),
(9, 'COUILLARD', 'Théo', 'SIO1', 'couillar.t@lyceedelasalle.fr', 'couillar.t', 'f5bf806549798e5c5714edba951c02c6', 0, 0),
(10, 'DERRIEN', 'Ronan', 'SIO1', 'derrien.r@lyceedelasalle.fr', 'derrien.r', '5126589a31523b84a1caece24d34fb1e', 0, 0),
(11, 'DUMAS', 'Benjamin', 'SIO1', 'dumas.b@lyceedelasalle.fr', 'dumas.b', '3ae090490a6fc1cc902dfb32088aeadd', 0, 0),
(12, 'EPS', 'Erwan', 'SIO1', 'eps.e@lyceedelasalle.fr', 'eps.e', '63f9dba79cf7afcb230b649471f8893e', 0, 0),
(13, 'GERMAIN', 'François', 'SIO1', 'germain.f@lyceedelasalle.fr', 'germain.f', '3b4d3bebeccd560e762dcb29e9c033b3', 0, 0),
(14, 'HAMON', 'Amandine', 'SIO1', 'hamon.a1@lyceedelasalle.fr', 'hamon.a1', '24cc69404c647d5d143d033551a8fd75', 0, 0),
(15, 'JALLU', 'Pierre-Thomas', 'SIO1', 'jallu.p@lyceedelasalle.fr', 'jallu.p', 'c92b8c50e560d7a5fb4254e7270e9ca2', 0, 0),
(16, 'JAMET', 'Naël', 'SIO1', 'jamet.n@lyceedelasalle.fr', 'jamet.n', 'f5ac5f94d3ace98e99125e6135710876', 0, 0),
(17, 'LE FLOCH', 'Vincent', 'SIO1', 'lefloch.v@lyceedelasalle.fr', 'lefloch.v', '9907166c7987a4a3d99f620f515911b0', 0, 0),
(18, 'LELU', 'Awen', 'SIO1', 'lelu.a@lyceedelasalle.fr', 'lelu.a', 'b8c72dcd5d945c635d3f546ed8c2a5e6', 0, 0),
(19, 'LEPAGE', 'Antoine', 'SIO1', 'lepage.a@lyceedelasalle.fr', 'lepage.a', '8a6e7118061398820a4649140d03e551', 0, 0),
(20, 'LEPEIGNEUL', 'Brice', 'SIO1', 'lepeigne.b@lyceedelasalle.fr', 'lepeigne.b', '1fc48b76577f07121812b22aa5b2117d', 0, 0),
(21, 'LERAY', 'Jérémie', 'SIO1', 'leray.j@lyceedelasalle.fr', 'leray.j', '3d9156bb0b681af3fe1058727d823e76', 0, 0),
(22, 'LE SAINT', 'Clément', 'SIO1', 'lesaint.c@lyceedelasalle.fr', 'lesaint.c', 'a3c8cfed97150e5c56adaeb699704d4b', 0, 0),
(23, 'MENTEC', 'Olivier', 'SIO1', 'mentec.o@lyceedelasalle.fr', 'mentec.o', '70437d5837467c874bb3ad42b64dee15', 0, 0),
(24, 'PERRON-SYLVESTRE', 'Hugo', 'SIO1', 'perronsy.h@lyceedelasalle.fr', 'perronsy.h', '41fbc42666f75da0a19ebaa522b0f6ea', 0, 0),
(25, 'PIEKACZ', 'Jérémie', 'SIO1', 'piekacz.j@lyceedelasalle.fr', 'piekacz.j', '1f05113153ba8cdd1298b43ce1c1a709', 0, 0),
(26, 'PIERA', 'Théo', 'SIO1', 'piera.t@lyceedelasalle.fr', 'piera.t', 'adab3d5e8c4e779d0918a8b0db1a2901', 0, 0),
(27, 'RIQUIER', 'Thomas', 'SIO1', 'riquier.t@lyceedelasalle.fr', 'riquier.t', '8f3d37ee5556c0844edfcd719f2189f3', 0, 0),
(28, 'SAUVEE', 'Florian', 'SIO1', 'sauvee.f@lyceedelasalle.fr', 'sauvee.f', 'd57cda2fadeb24237c05bac9648cd6a1', 0, 0),
(29, 'SOURDIN', 'Maxime', 'SIO1', 'sourdin.m@lyceedelasalle.fr', 'sourdin.m', '1f9314e30c910a3dffe4741d0c05552f', 0, 0),
(30, 'SOURDRILLE', 'Kelian', 'SIO1', 'sourdril.k@lyceedelasalle.fr', 'sourdril.k', '9373331d7b25a108be9df028fdf73fe6', 0, 0),
(31, 'TRICARD', 'Florian', 'SIO1', 'tricard.f@lyceedelasalle.fr', 'tricard.f', '43e0abd3e67a5750f9aa9bd5a57348fd', 0, 0),
(32, 'VALLEE', 'Dylan', 'SIO1', 'vallee.d@lyceedelasalle.fr', 'vallee.d', '920962202795fb513965b8926a28578d', 0, 0);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `nbannonces_en_attente`
-- (Voir ci-dessous la vue réelle)
--
DROP VIEW IF EXISTS `nbannonces_en_attente`;
CREATE TABLE IF NOT EXISTS `nbannonces_en_attente` (
`annonces` bigint(21)
);

-- --------------------------------------------------------

--
-- Structure de la vue `nbannonces_en_attente`
--
DROP TABLE IF EXISTS `nbannonces_en_attente`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `nbannonces_en_attente`  AS  select count(0) AS `annonces` from `covoiturage` where (`covoiturage`.`etat` = 0) ;

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
