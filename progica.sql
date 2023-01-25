-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : mer. 25 jan. 2023 à 17:12
-- Version du serveur :  5.7.34
-- Version de PHP : 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `progica`
--

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20220612203248', '2022-06-12 20:38:30', 531),
('DoctrineMigrations\\Version20220612204400', '2022-06-12 20:45:02', 970),
('DoctrineMigrations\\Version20220614214633', '2022-06-14 21:48:06', 427),
('DoctrineMigrations\\Version20220616140158', '2022-06-16 14:04:24', 355),
('DoctrineMigrations\\Version20220616141317', '2022-06-16 14:44:22', 684),
('DoctrineMigrations\\Version20220616223739', '2022-06-16 22:39:11', 1073),
('DoctrineMigrations\\Version20220617182153', '2022-06-17 18:22:33', 511),
('DoctrineMigrations\\Version20220617184740', '2022-06-17 18:48:24', 401),
('DoctrineMigrations\\Version20220617192114', '2022-06-17 19:22:09', 763),
('DoctrineMigrations\\Version20220619181252', '2022-06-19 18:13:19', 815);

-- --------------------------------------------------------

--
-- Structure de la table `equipement`
--

CREATE TABLE `equipement` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `equipement`
--

INSERT INTO `equipement` (`id`, `name`) VALUES
(25, 'lave-linge'),
(26, 'lave-vaisselle'),
(27, 'climatisation'),
(28, 'télévision');

-- --------------------------------------------------------

--
-- Structure de la table `gite`
--

CREATE TABLE `gite` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` tinytext COLLATE utf8mb4_unicode_ci NOT NULL,
  `surface` int(11) NOT NULL,
  `chambre` int(11) NOT NULL,
  `couchage` int(11) NOT NULL,
  `proprietaire_id` int(11) DEFAULT NULL,
  `tarif_hebdo` double NOT NULL,
  `adresse` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `region_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `gite`
--

INSERT INTO `gite` (`id`, `nom`, `description`, `surface`, `chambre`, `couchage`, `proprietaire_id`, `tarif_hebdo`, `adresse`, `region_id`) VALUES
(83, 'Gite 1', 'Voici le gite numéro 1', 96, 3, 9, 11, 270, '123 Chemin aleatoire Inconnuville', 79),
(84, 'Gite 2', 'Voici le gite numéro 2', 110, 9, 6, 10, 160, '123 Chemin aleatoire Inconnuville', 80),
(85, 'Gite 3', 'Voici le gite numéro 3', 195, 1, 6, 11, 431, '123 Chemin aleatoire Inconnuville', 84),
(86, 'Gite 4', 'Voici le gite numéro 4', 54, 9, 8, 11, 434, '123 Chemin aleatoire Inconnuville', 84),
(87, 'Gite 5', 'Voici le gite numéro 5', 139, 3, 13, 10, 396, '123 Chemin aleatoire Inconnuville', 83),
(88, 'Gite 6', 'Voici le gite numéro 6', 57, 7, 5, 10, 111, '123 Chemin aleatoire Inconnuville', 88),
(89, 'Gite 7', 'Voici le gite numéro 7', 109, 1, 11, 9, 125, '123 Chemin aleatoire Inconnuville', 84),
(90, 'Gite 8', 'Voici le gite numéro 8', 179, 10, 8, 11, 142, '123 Chemin aleatoire Inconnuville', 79),
(91, 'Gite 9', 'Voici le gite numéro 9', 130, 9, 6, 10, 227, '123 Chemin aleatoire Inconnuville', 79),
(92, 'Gite 10', 'Voici le gite numéro 10', 128, 8, 3, 10, 281, '123 Chemin aleatoire Inconnuville', 86),
(93, 'Gite 11', 'Voici le gite numéro 11', 199, 10, 8, 9, 422, '123 Chemin aleatoire Inconnuville', 78),
(94, 'Gite 12', 'Voici le gite numéro 12', 116, 2, 11, 11, 439, '123 Chemin aleatoire Inconnuville', 87),
(95, 'Gite 13', 'Voici le gite numéro 13', 83, 6, 4, 10, 270, '123 Chemin aleatoire Inconnuville', 78),
(96, 'Gite 14', 'Voici le gite numéro 14', 66, 9, 6, 11, 200, '123 Chemin aleatoire Inconnuville', 76),
(97, 'Gite 15', 'Voici le gite numéro 15', 108, 4, 15, 11, 293, '123 Chemin aleatoire Inconnuville', 82),
(98, 'Gite 16', 'Voici le gite numéro 16', 77, 8, 7, 11, 465, '123 Chemin aleatoire Inconnuville', 81),
(99, 'Gite 17', 'Voici le gite numéro 17', 169, 1, 4, 9, 317, '123 Chemin aleatoire Inconnuville', 81),
(100, 'Gite 18', 'Voici le gite numéro 18', 71, 2, 8, 9, 311, '123 Chemin aleatoire Inconnuville', 81),
(101, 'Gite 19', 'Voici le gite numéro 19', 83, 9, 8, 10, 198, '123 Chemin aleatoire Inconnuville', 85);

-- --------------------------------------------------------

--
-- Structure de la table `gite_equipement`
--

CREATE TABLE `gite_equipement` (
  `gite_id` int(11) NOT NULL,
  `equipement_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `gite_equipement`
--

INSERT INTO `gite_equipement` (`gite_id`, `equipement_id`) VALUES
(83, 26),
(84, 26),
(85, 25),
(86, 28),
(87, 27),
(88, 26),
(89, 27),
(90, 27),
(91, 26),
(92, 27),
(93, 26),
(94, 27),
(95, 25),
(96, 26),
(97, 27),
(98, 27),
(99, 28),
(100, 25),
(101, 28);

-- --------------------------------------------------------

--
-- Structure de la table `messenger_messages`
--

CREATE TABLE `messenger_messages` (
  `id` bigint(20) NOT NULL,
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `headers` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue_name` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `available_at` datetime NOT NULL,
  `delivered_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `region`
--

CREATE TABLE `region` (
  `id` int(11) NOT NULL,
  `nom` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `region`
--

INSERT INTO `region` (`id`, `nom`) VALUES
(76, 'Auvergne-Rhône-Alpes'),
(77, 'Bourgogne-Franche-Comté'),
(78, 'Bretagne'),
(79, 'Centre-Val de Loire'),
(80, 'Corse'),
(81, 'Grand Est'),
(82, 'Hauts-de-France'),
(83, 'Île-de-France'),
(84, 'Normandie'),
(85, 'Nouvelle-Aquitaine'),
(86, 'Occitanie'),
(87, 'Pays de la Loire'),
(88, 'Provence-Alpes-Côte d\'Azur');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` int(11) DEFAULT NULL,
  `profile` longtext COLLATE utf8mb4_unicode_ci,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `username`, `roles`, `password`, `email`, `phone`, `profile`, `start_time`, `end_time`) VALUES
(9, 'Pierre', '[\"ROLE_USER\"]', '$2y$13$f4uMpK.ames.QtasM7mFDurBwAqBQZIP8s.psG.pucexN8AaBbIKi', 'pierre@doe.com', NULL, NULL, NULL, NULL),
(10, 'Paul', '[\"ROLE_USER\"]', '$2y$13$TjgI4f1gqymaehoP.40qLe5/BIJ0esshmBToPuaFsBGBu3k1tDMC6', 'paul@doe.com', NULL, NULL, NULL, NULL),
(11, 'Jacques', '[\"ROLE_USER\"]', '$2y$13$633Sk9ZRYZZ7orEts7UC9Oas0zE.9AeGQ4tq6s9ch0d5Po8gqH0ty', 'jacques@doe.com', NULL, NULL, NULL, NULL),
(12, 'admin', '[\"ROLE_ADMIN\"]', '$2y$13$0y1Pi6/EiZpSzvQPCi5DZOF6atLua8Os6j62Pp/Qo0a7Ynpq/adDe', 'admin@admin.com', NULL, NULL, NULL, NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `equipement`
--
ALTER TABLE `equipement`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `gite`
--
ALTER TABLE `gite`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_B638C92C76C50E4A` (`proprietaire_id`),
  ADD KEY `IDX_B638C92C98260155` (`region_id`);

--
-- Index pour la table `gite_equipement`
--
ALTER TABLE `gite_equipement`
  ADD PRIMARY KEY (`gite_id`,`equipement_id`),
  ADD KEY `IDX_56A3B31A652CAE9B` (`gite_id`),
  ADD KEY `IDX_56A3B31A806F0F5C` (`equipement_id`);

--
-- Index pour la table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  ADD KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  ADD KEY `IDX_75EA56E016BA31DB` (`delivered_at`);

--
-- Index pour la table `region`
--
ALTER TABLE `region`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D649F85E0677` (`username`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `equipement`
--
ALTER TABLE `equipement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT pour la table `gite`
--
ALTER TABLE `gite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT pour la table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `region`
--
ALTER TABLE `region`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `gite`
--
ALTER TABLE `gite`
  ADD CONSTRAINT `FK_B638C92C76C50E4A` FOREIGN KEY (`proprietaire_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FK_B638C92C98260155` FOREIGN KEY (`region_id`) REFERENCES `region` (`id`);

--
-- Contraintes pour la table `gite_equipement`
--
ALTER TABLE `gite_equipement`
  ADD CONSTRAINT `FK_56A3B31A652CAE9B` FOREIGN KEY (`gite_id`) REFERENCES `gite` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_56A3B31A806F0F5C` FOREIGN KEY (`equipement_id`) REFERENCES `equipement` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
