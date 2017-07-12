-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 03 Décembre 2015 à 04:09
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `drycleaning`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE IF NOT EXISTS `articles` (
  `ID_articles` int(11) NOT NULL AUTO_INCREMENT,
  `designation` text NOT NULL,
  `prix` int(11) NOT NULL,
  PRIMARY KEY (`ID_articles`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=59 ;

--
-- Contenu de la table `articles`
--

INSERT INTO `articles` (`ID_articles`, `designation`, `prix`) VALUES
(1, 'Chemise Dry ', 150),
(2, 'Chemise Dry&Press', 250),
(3, 'Chemise Press', 100),
(4, 'Complet', 250),
(5, 'Complet Dry ', 350),
(6, 'Complet Dry&Press', 600),
(7, 'Complet Robe Dry ', 400),
(8, 'Complet Robe Dry&Press', 750),
(9, 'Complet Robe Press', 350),
(10, 'Corsage Dry ', 150),
(11, 'Corsage Dry&Press', 250),
(12, 'Corsage Press', 100),
(13, 'Costume Dry ', 400),
(14, 'Costume Dry&Press', 650),
(15, 'Costume Press', 250),
(16, 'Couvre Lit Dry&Press', 1000),
(17, 'Couvrelit Dry ', 1000),
(18, 'Cravatte Dry ', 100),
(19, 'Cravatte Dry&Press', 150),
(20, 'Cravatte Press', 50),
(21, 'Gilet Dry ', 100),
(22, 'Gilet Dry&Press', 175),
(23, 'Gilet Press', 75),
(24, 'Jeans Dry ', 150),
(25, 'Jeans Dry&Press', 250),
(26, 'Jeans Press', 100),
(27, 'Jupe Dry ', 150),
(28, 'Jupe Dry&Press', 250),
(29, 'Jupe Press', 100),
(30, 'Pantalon Dry ', 150),
(31, 'Pantalon Dry&Press', 250),
(32, 'Pantalon Press', 100),
(33, 'Polo Dry ', 150),
(34, 'Polo Dry&Press', 250),
(35, 'Polo Press', 100),
(36, 'Pull Dry ', 115),
(37, 'Pull Dry&Press', 190),
(38, 'Pull Press', 75),
(39, 'Robe de Mariage Dry ', 1000),
(40, 'Robe de Mariage Dry&Press', 3250),
(41, 'Robe de Mariage Press', 2250),
(42, 'Robe Dry ', 450),
(43, 'Robe Dry&Press', 700),
(44, 'Robe Press', 250),
(45, 'Short Dry ', 125),
(46, 'Short Dry&Press', 225),
(47, 'Short Press', 100),
(48, 'Torge Dry ', 500),
(49, 'Torge Dry&Press', 750),
(50, 'Torge Press', 250),
(51, 'Veste Dry ', 250),
(52, 'Veste Dry&Press', 450),
(53, 'Veste Press', 200);

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE IF NOT EXISTS `client` (
  `ID_client` int(11) NOT NULL AUTO_INCREMENT,
  `nomComplet` text NOT NULL,
  `telephone` int(11) NOT NULL,
  `cinOrnif` text NOT NULL,
  `adresse` text NOT NULL,
  `email` text NOT NULL,
  `dateAjout` date NOT NULL,
  PRIMARY KEY (`ID_client`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Contenu de la table `client`
--

INSERT INTO `client` (`ID_client`, `nomComplet`, `telephone`, `cinOrnif`, `adresse`, `email`, `dateAjout`) VALUES
(1, 'Lev Brouillon', 32059106, '001-292-393-122', 'tabarre', 'lev@gmail.com', '2015-11-27'),
(2, 'Ersnt LOUIS', 31323344, '122-33', 'PV ', 'ersnt@gmail.com', '2015-11-27');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE IF NOT EXISTS `commande` (
  `ID_commande` int(11) NOT NULL,
  `client` int(11) NOT NULL,
  `dateCommande` datetime NOT NULL,
  `statut_commande` text NOT NULL,
  `balance` int(11) NOT NULL,
  `versement` int(11) NOT NULL,
  `memo` text NOT NULL,
  `utilisateur` int(11) NOT NULL,
  `effectif` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `commande`
--

INSERT INTO `commande` (`ID_commande`, `client`, `dateCommande`, `statut_commande`, `balance`, `versement`, `memo`, `utilisateur`, `effectif`) VALUES
(1, 1, '2015-12-01 13:45:53', 'en cours', 0, 0, '', 4, ''),
(2, 1, '2015-12-02 22:07:34', 'en cours', 0, 0, '', 4, '');

-- --------------------------------------------------------

--
-- Structure de la table `detailscommande`
--

CREATE TABLE IF NOT EXISTS `detailscommande` (
  `commande` int(11) NOT NULL,
  `articles` int(11) NOT NULL,
  `quantite` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `detailscommande`
--

INSERT INTO `detailscommande` (`commande`, `articles`, `quantite`) VALUES
(1, 1, 1),
(2, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `systerm`
--

CREATE TABLE IF NOT EXISTS `systerm` (
  `ID_system` int(11) NOT NULL AUTO_INCREMENT,
  `nom_compagnie` text NOT NULL,
  `logo` text NOT NULL,
  `dateajoutEntreprises` date NOT NULL,
  PRIMARY KEY (`ID_system`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `systerm`
--

INSERT INTO `systerm` (`ID_system`, `nom_compagnie`, `logo`, `dateajoutEntreprises`) VALUES
(1, 'St Jacques Dry Cleaning ', 'logodry.png', '2015-11-27');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `ID_users` int(11) NOT NULL AUTO_INCREMENT,
  `nom` text NOT NULL,
  `prenom` text NOT NULL,
  `cinOrnif` text NOT NULL,
  `pseudo` text NOT NULL,
  `password` text NOT NULL,
  `date_ajout` date NOT NULL,
  `statut` text NOT NULL,
  `fonction` text NOT NULL,
  `photouser` text NOT NULL,
  PRIMARY KEY (`ID_users`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`ID_users`, `nom`, `prenom`, `cinOrnif`, `pseudo`, `password`, `date_ajout`, `statut`, `fonction`, `photouser`) VALUES
(1, 'MARCELIN', 'Patrick', '1221', 'Marcelin', '123456', '2015-11-27', 'actif', 'admin', 'Patrick Marcelin.jpg'),
(4, 'jean baptiste ', 'denia', '100200', 'denia01', '123456', '2015-12-01', 'actif', 'caisier(ere)', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
