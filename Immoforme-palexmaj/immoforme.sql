-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 28 nov. 2025 à 13:42
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
-- Base de données : `immoforme`
--

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email_verified` tinyint(1) DEFAULT 0,
  `verification_token` varchar(255) DEFAULT NULL,
  `reset_token` varchar(255) DEFAULT NULL,
  `reset_expire` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `nom`, `prenom`, `email`, `password`, `email_verified`, `verification_token`, `reset_token`, `reset_expire`, `created_at`) VALUES
(5, 'er', 'ef', 'efvreorgpf@za.com', '$2y$10$hYRra.ML34b5FyiIju.JCerjeZzCIxodpsJbnOtVQRMDHhufH9iS2', 0, NULL, NULL, NULL, '2025-11-26 19:19:26'),
(6, 'g', 'eg', 'gerg@fz.vom', '$2y$10$KUj49l1vOKVKm4Cs8wV/8.C7YIyxT51fccRoXUNShorjlsPgRI6q.', 0, NULL, NULL, NULL, '2025-11-26 19:19:52'),
(7, 'er', 'ef', 'regfez@gved.vom', '$2y$10$njcQxNdcPQJBlxLHJ29hyupTe.8Z3slKdZr8li6.YgM4eVPioDnGe', 0, NULL, NULL, NULL, '2025-11-26 19:21:44'),
(8, 'alex', 'pey', 'alex@pey.com', '$2y$10$KItQTQWG5RvRPZvZYPf5DuOs4gAYStn6QLEQ40krehGrwf.HU2Rbe', 0, NULL, NULL, NULL, '2025-11-26 19:30:14'),
(9, 'bfg', 'gtrgtr', 'gtrgtr@jkiogpmler.col', '$2y$10$7O./RvKf2b3YPGDnFLm0Z.dhAiwgijiJpmW2gK0VipBSHB4iGj70W', 0, NULL, NULL, NULL, '2025-11-26 19:37:56'),
(10, '\"y', '(\'(', 'kjhgbjk@rrrr.vghjuk', '$2y$10$BVK2Kbgz8uxJPcl.DGZfCevjAxg6aiiZhro2PCfJOGI5k/yjZECXu', 0, NULL, NULL, NULL, '2025-11-26 19:38:23'),
(14, 'fez', 'ezf', 'a@tfez.fvom', '$2y$10$QCmMT2XjL860VQJKj68jeecJAgIyF9JdpqSy9GYPfaDux0zgdwLhK', 0, NULL, NULL, NULL, '2025-11-27 15:57:35'),
(15, 'h\'', '\'h(\"', 'trhgeth@tzdh.thze', '$2y$10$C8AWBPDU8Tzb3vfu772SAe.qwzcqkU9TnWU7jo0XpwvmVlxeZoFwq', 0, NULL, NULL, NULL, '2025-11-28 10:29:03'),
(16, 'a', 'a', 'a@gmail.com', '$2y$10$EyeYP2OpabkLrRu3dUBPvepd4p4noEwJWUK/JZrhdb/68OMuf2DNy', 0, NULL, NULL, NULL, '2025-11-28 10:42:09'),
(17, 'gegzsgez', 'gze', 'afez@ezgezq.gze', '$2y$10$7a2nJNNFHIu0vpR.Okg8VOExgsCmJJQ6bLW7BvEWbNGTfNPPUuEdy', 0, NULL, NULL, NULL, '2025-11-28 10:50:49'),
(18, 'hgfgh', 'hytgre', 'a@hrtge.tref', '$2y$10$AT8idsgT9CAv3vjc.PQuzOOv3O2JLolsVM2MPXg8M8HLfA.0x9Hga', 0, NULL, NULL, NULL, '2025-11-28 13:18:19'),
(19, 'ytgrefz', 'thrgefd', 'efbz@trh.tr', '$2y$10$RCv9ZFYDBtLVIjZa.afHs.dM4MYymEeV6afS2WK4O3LOxjCGnrIaa', 0, NULL, NULL, NULL, '2025-11-28 13:22:58'),
(20, 'tregrsef', 'tregrf', 'a@etrgzef.egrefzzadefr', '$2y$10$UhNsreecW.cE4512aUUdHOiZcwJa3juocQ64WpPy2uzYKBSkeT3MW', 0, NULL, NULL, NULL, '2025-11-28 13:24:17'),
(21, 'ytrhger', 'ytrhge', 'yhrtger@rtgerfs.rth', '$2y$10$h9wpz2EjGzFlV/1BrJAJaeHHoXhikoebz4HdfK4phDaPc1s1HGMau', 0, NULL, NULL, NULL, '2025-11-28 13:25:14');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
