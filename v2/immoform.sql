-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 05 déc. 2025 à 15:10
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `immoform`
--

-- --------------------------------------------------------

--
-- Structure de la table `agence`
--

CREATE TABLE `agence` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `adresse1` varchar(100) NOT NULL,
  `adresse2` varchar(100) DEFAULT NULL,
  `ville` varchar(50) NOT NULL,
  `code_postal` varchar(10) NOT NULL,
  `telephone` varchar(15) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `en_ligne` tinyint(1) NOT NULL,
  `date_debut_contrat` date DEFAULT NULL,
  `date_fin_contrat` date DEFAULT NULL,
  `statut_contrat` varchar(20) NOT NULL,
  `region` varchar(100) NOT NULL,
  `type_agence` varchar(50) NOT NULL,
  `nom_reseau` varchar(100) DEFAULT NULL,
  `secteur_activite` varchar(50) DEFAULT NULL,
  `nb_agents` int(11) DEFAULT NULL,
  `nb_transactions_annuelles` int(11) DEFAULT NULL,
  `commentaires` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `conseil`
--

CREATE TABLE `conseil` (
  `id` int(11) NOT NULL,
  `id_demande` int(11) NOT NULL,
  `titre` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `duree` int(11) NOT NULL,
  `date_heure_conseil` datetime NOT NULL,
  `cout` int(11) NOT NULL,
  `commentaires` text DEFAULT NULL,
  `supports` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `conseil_formateur`
--

CREATE TABLE `conseil_formateur` (
  `id` int(11) NOT NULL,
  `id_conseil` int(11) NOT NULL,
  `id_formateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telephone` varchar(20) DEFAULT NULL,
  `fonction` varchar(50) DEFAULT NULL,
  `preference_contact` varchar(30) DEFAULT NULL,
  `commentaires` text DEFAULT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`id`, `nom`, `prenom`, `email`, `telephone`, `fonction`, `preference_contact`, `commentaires`, `password`) VALUES
(1, 'blet', 'keenan', 'root@gmail.com', '0603668193', 'admin', 'jsp', 'jsp', '0'),
(2, 'Blet', 'Keenan', 'roo0t@gmail.com', NULL, NULL, NULL, NULL, '$2y$10$z8J830iSGh8Wi.lGj6nUdeLGPK/sig8mFgfCbcIMJOdQ7.93glUFm');

-- --------------------------------------------------------

--
-- Structure de la table `contact_agence`
--

CREATE TABLE `contact_agence` (
  `id` int(11) NOT NULL,
  `id_contact` int(11) NOT NULL,
  `id_agence` int(11) NOT NULL,
  `type_relation` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `demande_conseil`
--

CREATE TABLE `demande_conseil` (
  `id` int(11) NOT NULL,
  `id_agence` int(11) NOT NULL,
  `id_contact` int(11) NOT NULL,
  `type_conseil` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `date_demande` date NOT NULL,
  `statut` varchar(50) NOT NULL,
  `id_formateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `formateur`
--

CREATE TABLE `formateur` (
  `id` int(11) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `telephone` varchar(20) DEFAULT NULL,
  `specialite` varchar(100) DEFAULT NULL,
  `experience` int(11) DEFAULT NULL,
  `certifications` text DEFAULT NULL,
  `commentaires` text DEFAULT NULL,
  `date_debut_collab` date NOT NULL,
  `date_fin_collab` date DEFAULT NULL,
  `actif` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `formation_en_ligne`
--

CREATE TABLE `formation_en_ligne` (
  `id` int(11) NOT NULL,
  `titre` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `duree` int(11) NOT NULL,
  `niveau` varchar(30) NOT NULL,
  `secteur` varchar(50) NOT NULL,
  `date_heure_formation` datetime NOT NULL,
  `url` varchar(200) NOT NULL,
  `id_formateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `formation_presentiel`
--

CREATE TABLE `formation_presentiel` (
  `id` int(11) NOT NULL,
  `titre` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `duree` int(11) NOT NULL,
  `niveau` varchar(30) NOT NULL,
  `secteur` varchar(50) NOT NULL,
  `date_debut` datetime NOT NULL,
  `date_fin` datetime NOT NULL,
  `horaires` varchar(50) NOT NULL,
  `adresse` varchar(150) NOT NULL,
  `ville` varchar(50) NOT NULL,
  `code_postal` varchar(10) NOT NULL,
  `capacite` int(11) NOT NULL,
  `materiel` text DEFAULT NULL,
  `cout` int(11) NOT NULL,
  `modalite_inscription` text DEFAULT NULL,
  `commentaires` text DEFAULT NULL,
  `supports` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `formation_presentiel_formateur`
--

CREATE TABLE `formation_presentiel_formateur` (
  `id` int(11) NOT NULL,
  `id_formation` int(11) NOT NULL,
  `id_formateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `inscription`
--

CREATE TABLE `inscription` (
  `id` int(11) NOT NULL,
  `id_agence` int(11) NOT NULL,
  `id_contact` int(11) NOT NULL,
  `id_formation_en_ligne` int(11) DEFAULT NULL,
  `id_formation_presentiel` int(11) DEFAULT NULL,
  `date_inscription` date NOT NULL,
  `statut_inscription` varchar(30) NOT NULL,
  `mode_paiement` varchar(30) NOT NULL,
  `statut_paiement` varchar(30) NOT NULL,
  `montant_paye` int(11) NOT NULL,
  `commentaires` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `agence`
--
ALTER TABLE `agence`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `conseil`
--
ALTER TABLE `conseil`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_demande` (`id_demande`);

--
-- Index pour la table `conseil_formateur`
--
ALTER TABLE `conseil_formateur`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_conseil` (`id_conseil`),
  ADD KEY `id_formateur` (`id_formateur`);

--
-- Index pour la table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `contact_agence`
--
ALTER TABLE `contact_agence`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_contact` (`id_contact`),
  ADD KEY `id_agence` (`id_agence`);

--
-- Index pour la table `demande_conseil`
--
ALTER TABLE `demande_conseil`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_agence` (`id_agence`),
  ADD KEY `id_contact` (`id_contact`),
  ADD KEY `id_formateur` (`id_formateur`);

--
-- Index pour la table `formateur`
--
ALTER TABLE `formateur`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `formation_en_ligne`
--
ALTER TABLE `formation_en_ligne`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_formateur` (`id_formateur`);

--
-- Index pour la table `formation_presentiel`
--
ALTER TABLE `formation_presentiel`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `formation_presentiel_formateur`
--
ALTER TABLE `formation_presentiel_formateur`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_formation` (`id_formation`),
  ADD KEY `id_formateur` (`id_formateur`);

--
-- Index pour la table `inscription`
--
ALTER TABLE `inscription`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_agence` (`id_agence`),
  ADD KEY `id_contact` (`id_contact`),
  ADD KEY `id_formation_en_ligne` (`id_formation_en_ligne`),
  ADD KEY `id_formation_presentiel` (`id_formation_presentiel`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `agence`
--
ALTER TABLE `agence`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `conseil`
--
ALTER TABLE `conseil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `conseil_formateur`
--
ALTER TABLE `conseil_formateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `contact_agence`
--
ALTER TABLE `contact_agence`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `demande_conseil`
--
ALTER TABLE `demande_conseil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `formateur`
--
ALTER TABLE `formateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `formation_en_ligne`
--
ALTER TABLE `formation_en_ligne`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `formation_presentiel`
--
ALTER TABLE `formation_presentiel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `formation_presentiel_formateur`
--
ALTER TABLE `formation_presentiel_formateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `inscription`
--
ALTER TABLE `inscription`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `conseil`
--
ALTER TABLE `conseil`
  ADD CONSTRAINT `conseil_ibfk_1` FOREIGN KEY (`id_demande`) REFERENCES `demande_conseil` (`id`);

--
-- Contraintes pour la table `conseil_formateur`
--
ALTER TABLE `conseil_formateur`
  ADD CONSTRAINT `conseil_formateur_ibfk_1` FOREIGN KEY (`id_conseil`) REFERENCES `conseil` (`id`),
  ADD CONSTRAINT `conseil_formateur_ibfk_2` FOREIGN KEY (`id_formateur`) REFERENCES `formateur` (`id`);

--
-- Contraintes pour la table `contact_agence`
--
ALTER TABLE `contact_agence`
  ADD CONSTRAINT `contact_agence_ibfk_1` FOREIGN KEY (`id_contact`) REFERENCES `contact` (`id`),
  ADD CONSTRAINT `contact_agence_ibfk_2` FOREIGN KEY (`id_agence`) REFERENCES `agence` (`id`);

--
-- Contraintes pour la table `demande_conseil`
--
ALTER TABLE `demande_conseil`
  ADD CONSTRAINT `demande_conseil_ibfk_1` FOREIGN KEY (`id_agence`) REFERENCES `agence` (`id`),
  ADD CONSTRAINT `demande_conseil_ibfk_2` FOREIGN KEY (`id_contact`) REFERENCES `contact` (`id`),
  ADD CONSTRAINT `demande_conseil_ibfk_3` FOREIGN KEY (`id_formateur`) REFERENCES `formateur` (`id`);

--
-- Contraintes pour la table `formation_en_ligne`
--
ALTER TABLE `formation_en_ligne`
  ADD CONSTRAINT `formation_en_ligne_ibfk_1` FOREIGN KEY (`id_formateur`) REFERENCES `formateur` (`id`);

--
-- Contraintes pour la table `formation_presentiel_formateur`
--
ALTER TABLE `formation_presentiel_formateur`
  ADD CONSTRAINT `formation_presentiel_formateur_ibfk_1` FOREIGN KEY (`id_formation`) REFERENCES `formation_presentiel` (`id`),
  ADD CONSTRAINT `formation_presentiel_formateur_ibfk_2` FOREIGN KEY (`id_formateur`) REFERENCES `formateur` (`id`);

--
-- Contraintes pour la table `inscription`
--
ALTER TABLE `inscription`
  ADD CONSTRAINT `inscription_ibfk_1` FOREIGN KEY (`id_agence`) REFERENCES `agence` (`id`),
  ADD CONSTRAINT `inscription_ibfk_2` FOREIGN KEY (`id_contact`) REFERENCES `contact` (`id`),
  ADD CONSTRAINT `inscription_ibfk_3` FOREIGN KEY (`id_formation_en_ligne`) REFERENCES `formation_en_ligne` (`id`),
  ADD CONSTRAINT `inscription_ibfk_4` FOREIGN KEY (`id_formation_presentiel`) REFERENCES `formation_presentiel` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
