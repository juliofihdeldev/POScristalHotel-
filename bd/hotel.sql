-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Dim 16 Juillet 2017 à 18:26
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `hotel`
--

-- --------------------------------------------------------

--
-- Structure de la table `activites`
--

CREATE TABLE `activites` (
  `ID_activites` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `titre` text NOT NULL,
  `description` text NOT NULL,
  `photo` text NOT NULL,
  `etat` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `activites`
--

INSERT INTO `activites` (`ID_activites`, `id_users`, `titre`, `description`, `photo`, `etat`) VALUES
(1, 1, 'Karaoke Night', 'Mon fils', '1499904687_1449512489_julio.jpg', 'show'),
(2, 1, 'Yoga For All', 'Un article sur julio jean fils', '1499904691_1449512489_julio.jpg', 'show'),
(3, 1, 'Museums & Galleries Tour ', 'Mon ancien patron', '1499904839_1449199004_Patrick Marcelin.jpg', 'show'),
(4, 1, 'Cooking Classes', 'Some event', '1499904903_1449514211_Happy_Hour_sm.jpg', 'show');

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE `articles` (
  `ID_articles` int(11) NOT NULL,
  `designation` text NOT NULL,
  `prix` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Structure de la table `chambres`
--

CREATE TABLE `chambres` (
  `ID` int(11) NOT NULL,
  `designation` text NOT NULL,
  `prix` double NOT NULL,
  `rabais` double NOT NULL,
  `etoile` int(11) NOT NULL,
  `des` text NOT NULL,
  `avantage` text NOT NULL,
  `lit` text NOT NULL,
  `size` double NOT NULL,
  `statut` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `chambres`
--

INSERT INTO `chambres` (`ID`, `designation`, `prix`, `rabais`, `etoile`, `des`, `avantage`, `lit`, `size`, `statut`) VALUES
(1, 'm', 22, 0, 0, 'm', 'TV', 'Simple', 22, 0),
(2, 'omlm', 120, 0, 0, 'mll', 'TV', 'Simple', 100, 0),
(3, 'kn', 199, 0, 0, 'n', 'TV', 'Simple', 10, 0),
(4, 'Chambres moment ', 500, 0, 0, 'nk', 'TV', 'Simple', 90, 0),
(5, 'mm', 90, 0, 0, 'mm', 'TV', 'Simple', 99, 0),
(6, 'good addd', 1200, 0, 0, 'no add', 'Securite', 'Double', 120, 0),
(7, 'mk', 100, 0, 0, 'k', 'Securite', 'Simple', 90, 0),
(8, 'Chambre simple', 1200, 0, 0, 'Vue sur mer', 'Securite', 'Simple', 80, 0),
(9, 'oj', 12, 0, 0, 'o', 'WIFI', 'Simple', 100, 0),
(10, 'oj', 12, 0, 0, 'o', 'TV', 'Simple', 100, 0),
(11, 'oj', 12, 0, 0, 'o', 'Sale de bain', 'Simple', 100, 0),
(12, 'oj', 12, 0, 0, 'o', 'Securite', 'Simple', 100, 0),
(13, 'kkk', 12, 0, 0, 'k', 'salde', 'Double', 220, 0),
(14, 'ma chambrem', 3000, 0, 0, 'suit', 'sale de bain ,vue sur la mer', 'Simple', 20, 0);

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `ID_client` int(11) NOT NULL,
  `nomComplet` text NOT NULL,
  `telephone` int(11) NOT NULL,
  `cinOrnif` text NOT NULL,
  `adresse` text NOT NULL,
  `email` text NOT NULL,
  `dateAjout` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `client`
--

INSERT INTO `client` (`ID_client`, `nomComplet`, `telephone`, `cinOrnif`, `adresse`, `email`, `dateAjout`) VALUES
(2, 'Hean chaeles', 31155251, '', 'delmas', 'julio,fils@gmail.com', '2015-12-21'),
(4, 'farah perrin', 37056863, '', 'thomassin', '', '2015-12-22'),
(5, 'google', 31155999, '', 'delmas', '', '2015-12-23'),
(6, 'yahoo', 21123234, '', 'Petion ville', '', '2015-12-23'),
(7, 'belle', 23322332, '', 'delmas', '', '2015-12-23'),
(8, 'belle', 23322332, '', 'delmas', '', '2015-12-23'),
(9, 'hh', 0, 'h', 'h', 'h', '2015-12-23'),
(10, 'knk', 0, 'nkn', 'knk', 'nkn', '2015-12-23'),
(11, 'knk', 0, 'nkn', 'knk', 'nkn', '2015-12-23'),
(12, 'belle', 0, '', 'ml', 'lj', '2015-12-23'),
(13, 'lopes', 31155999, '', 'logicien', 'julio@yahoo.fr', '2015-12-24');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `ID_commande` int(11) NOT NULL,
  `client` int(11) NOT NULL,
  `dateCommande` datetime NOT NULL,
  `statut_commande` text NOT NULL,
  `balance` int(11) NOT NULL DEFAULT '0',
  `versement` int(11) NOT NULL DEFAULT '0',
  `exporation` date DEFAULT NULL,
  `memo` varchar(120) NOT NULL DEFAULT 'none',
  `utilisateur` int(11) NOT NULL,
  `effectif` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `commande`
--

INSERT INTO `commande` (`ID_commande`, `client`, `dateCommande`, `statut_commande`, `balance`, `versement`, `exporation`, `memo`, `utilisateur`, `effectif`) VALUES
(1, 2, '2017-07-13 16:25:53', 'en cours', 0, 0, NULL, 'none', 1, 'oui');

-- --------------------------------------------------------

--
-- Structure de la table `detailscommande`
--

CREATE TABLE `detailscommande` (
  `ID_details_commande` int(11) NOT NULL,
  `commande` int(11) NOT NULL,
  `chambres` int(11) NOT NULL,
  `quantite` int(11) NOT NULL,
  `description` text NOT NULL,
  `dateEntrer` datetime NOT NULL,
  `dateSortie` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `detailscommande`
--

INSERT INTO `detailscommande` (`ID_details_commande`, `commande`, `chambres`, `quantite`, `description`, `dateEntrer`, `dateSortie`) VALUES
(14, 1, 1, 1, 'onn', '2017-07-07 12:00:00', '2017-07-01 12:00:00'),
(17, 2, 5, 1, 'kk', '2017-06-09 13:01:00', '2017-07-10 14:01:00');

-- --------------------------------------------------------

--
-- Structure de la table `images`
--

CREATE TABLE `images` (
  `ID_images` int(11) NOT NULL,
  `path` text NOT NULL,
  `chambres` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `retrait`
--

CREATE TABLE `retrait` (
  `ID_retrait` int(11) NOT NULL,
  `motif` text NOT NULL,
  `retrait` int(11) NOT NULL,
  `date_retrait` date NOT NULL,
  `users` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `systerm`
--

CREATE TABLE `systerm` (
  `ID_system` int(11) NOT NULL,
  `nom_compagnie` text NOT NULL,
  `adresse` text NOT NULL,
  `telephone` text NOT NULL,
  `email` text NOT NULL,
  `logo` text NOT NULL,
  `dateajoutEntreprises` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `ID_users` int(11) NOT NULL,
  `nom` text NOT NULL,
  `prenom` text NOT NULL,
  `cinOrnif` text NOT NULL,
  `pseudo` text NOT NULL,
  `password` text NOT NULL,
  `date_ajout` date NOT NULL,
  `statut` text NOT NULL,
  `fonction` text NOT NULL,
  `photouser` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`ID_users`, `nom`, `prenom`, `cinOrnif`, `pseudo`, `password`, `date_ajout`, `statut`, `fonction`, `photouser`) VALUES
(1, 'MARCELIN', 'Patrick', '1221', 'admin', '123456', '2015-11-27', 'actif', 'admin', '1449589485_julio.jpg'),
(3, 'jean fils', 'julio', '', 'julio', '123456', '2015-12-19', 'actif', 'caissier(ere)', '1450565142_1991058.png');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `activites`
--
ALTER TABLE `activites`
  ADD PRIMARY KEY (`ID_activites`);

--
-- Index pour la table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`ID_articles`);

--
-- Index pour la table `chambres`
--
ALTER TABLE `chambres`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`ID_client`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`ID_commande`);

--
-- Index pour la table `detailscommande`
--
ALTER TABLE `detailscommande`
  ADD PRIMARY KEY (`ID_details_commande`);

--
-- Index pour la table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`ID_images`);

--
-- Index pour la table `retrait`
--
ALTER TABLE `retrait`
  ADD PRIMARY KEY (`ID_retrait`);

--
-- Index pour la table `systerm`
--
ALTER TABLE `systerm`
  ADD PRIMARY KEY (`ID_system`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID_users`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `activites`
--
ALTER TABLE `activites`
  MODIFY `ID_activites` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `articles`
--
ALTER TABLE `articles`
  MODIFY `ID_articles` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
--
-- AUTO_INCREMENT pour la table `chambres`
--
ALTER TABLE `chambres`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `ID_client` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `ID_commande` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `detailscommande`
--
ALTER TABLE `detailscommande`
  MODIFY `ID_details_commande` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT pour la table `images`
--
ALTER TABLE `images`
  MODIFY `ID_images` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `retrait`
--
ALTER TABLE `retrait`
  MODIFY `ID_retrait` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `systerm`
--
ALTER TABLE `systerm`
  MODIFY `ID_system` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `ID_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
