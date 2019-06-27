-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  Dim 12 août 2018 à 22:58
-- Version du serveur :  10.1.26-MariaDB
-- Version de PHP :  7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `bdformation`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id_admin`, `login`, `mdp`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997');

-- --------------------------------------------------------

--
-- Structure de la table `domaine`
--

CREATE TABLE `domaine` (
  `id_domaine` int(11) NOT NULL,
  `nom_domaine` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `domaine`
--

INSERT INTO `domaine` (`id_domaine`, `nom_domaine`) VALUES
(1, 'Informatique'),
(2, 'Management'),
(3, 'T&eacutel&eacutecommunication');

-- --------------------------------------------------------

--
-- Structure de la table `formation`
--

CREATE TABLE `formation` (
  `id` int(11) NOT NULL,
  `id_domaine` varchar(1000) NOT NULL,
  `intitule` varchar(1000) NOT NULL,
  `id_lieu` varchar(1000) NOT NULL,
  `date` date NOT NULL,
  `duree` varchar(1000) NOT NULL,
  `montant` int(11) NOT NULL,
  `animateur` varchar(1000) NOT NULL,
  `image` varchar(1000) NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `programme` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `formation`
--

INSERT INTO `formation` (`id`, `id_domaine`, `intitule`, `id_lieu`, `date`, `duree`, `montant`, `animateur`, `image`, `description`, `programme`) VALUES
(43, '1', 'JavaScript', '3', '2019-06-24', '2 semaines', 100000, 'M Fall', 'images/html.png', '                    On vous forme pour devenir des techniciens capable        ', 'admin/uploads/L2_Module SystÃ©me UNIX.pdf'),
(44, '3', 'Faisceaux', '2', '2019-03-17', '2 mois', 250000, 'M Preira ', 'images/fibre.jpg', '          On vous forme pour devenir des techniciens     ', 'admin/uploads/L2_Module SystÃ©me UNIX.pdf'),
(46, '2', 'Parler en public', '2', '2020-07-23', '4 semaines', 300000, 'M ONANA', 'images/publique.jpg', '          On vous forme pour devenir des techniciens     ', 'admin/uploads/L2_Module SystÃ©me UNIX.pdf'),
(50, '1', 'Linux', '3', '2019-12-12', '2 semaines', 120000, 'M Preira - M DIENG', 'images/linux.jpg', 'Nous vous formons pour devenir des techniciens capable d\'Ã©voluer dans le milieu professionnel.', 'admin/uploads/L2_Module SystÃ©me UNIX.pdf');

-- --------------------------------------------------------

--
-- Structure de la table `lieu`
--

CREATE TABLE `lieu` (
  `id_lieu` int(11) NOT NULL,
  `nom_lieu` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `lieu`
--

INSERT INTO `lieu` (`id_lieu`, `nom_lieu`) VALUES
(1, 'UCAD'),
(2, 'ESMT'),
(3, 'ESP'),
(4, 'IAM'),
(5, 'EDACY');

-- --------------------------------------------------------

--
-- Structure de la table `participants`
--

CREATE TABLE `participants` (
  `id` int(11) NOT NULL,
  `nom` varchar(1000) NOT NULL,
  `prenom` varchar(1000) NOT NULL,
  `sexe` varchar(1) NOT NULL,
  `mail` varchar(1000) NOT NULL,
  `id_domaine` int(11) NOT NULL,
  `intitule` varchar(1000) NOT NULL,
  `adresse` text NOT NULL,
  `montant` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `participants`
--

INSERT INTO `participants` (`id`, `nom`, `prenom`, `sexe`, `mail`, `id_domaine`, `intitule`, `adresse`, `montant`) VALUES
(53, 'DIOP', 'Abdou', 'F', 'neardiop@gmail.com', 1, 'SÃ©lectionnez', 'GRAND MBAO', 123000),
(54, 'DIOP', 'Ndiane Elabdourahim', 'M', 'neardiop@gmail.com', 1, 'Php', 'GRAND MBAO', 123000),
(55, 'FALL', 'Binta', 'F', 'neardiop@gmail.com', 2, 'Parler en public', 'GRAND MBAO', 300000);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Index pour la table `domaine`
--
ALTER TABLE `domaine`
  ADD PRIMARY KEY (`id_domaine`);

--
-- Index pour la table `formation`
--
ALTER TABLE `formation`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `lieu`
--
ALTER TABLE `lieu`
  ADD PRIMARY KEY (`id_lieu`);

--
-- Index pour la table `participants`
--
ALTER TABLE `participants`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `domaine`
--
ALTER TABLE `domaine`
  MODIFY `id_domaine` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `formation`
--
ALTER TABLE `formation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT pour la table `lieu`
--
ALTER TABLE `lieu`
  MODIFY `id_lieu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `participants`
--
ALTER TABLE `participants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
