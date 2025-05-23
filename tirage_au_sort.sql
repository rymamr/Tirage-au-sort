-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : ven. 23 mai 2025 à 17:42
-- Version du serveur : 10.11.11-MariaDB-0+deb12u1
-- Version de PHP : 8.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `amiarr`
--

-- --------------------------------------------------------

--
-- Structure de la table `assurer`
--

CREATE TABLE `assurer` (
  `idcours` int(11) NOT NULL,
  `id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `PFX_cache`
--

CREATE TABLE `PFX_cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `PFX_cache`
--

INSERT INTO `PFX_cache` (`key`, `value`, `expiration`) VALUES
('raniach876@gmail.com|127.0.0.1', 'i:1;', 1744373060),
('raniach876@gmail.com|127.0.0.1:timer', 'i:1744373060;', 1744373060),
('rymaraima@gmail.com|127.0.0.1', 'i:1;', 1744373049),
('rymaraima@gmail.com|127.0.0.1:timer', 'i:1744373049;', 1744373049);

-- --------------------------------------------------------

--
-- Structure de la table `PFX_cache_locks`
--

CREATE TABLE `PFX_cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `PFX_classes`
--

CREATE TABLE `PFX_classes` (
  `idclasse` int(11) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `niveau` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `PFX_classes`
--

INSERT INTO `PFX_classes` (`idclasse`, `nom`, `niveau`) VALUES
(1, 'BTS SIO', '1ère Année'),
(2, 'BTS SIO', '2 ème Année'),
(3, 'NDRC', '1ère Année'),
(4, 'NDRC', '2 ème Année');

-- --------------------------------------------------------

--
-- Structure de la table `PFX_cours`
--

CREATE TABLE `PFX_cours` (
  `idcours` int(11) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `date_heure` datetime NOT NULL,
  `idmatiere` int(11) NOT NULL,
  `idclasse` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `PFX_cours`
--

INSERT INTO `PFX_cours` (`idcours`, `nom`, `date_heure`, `idmatiere`, `idclasse`) VALUES
(1, 'Programmation orientée objet', '2024-12-10 01:53:31', 1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `PFX_failed_jobs`
--

CREATE TABLE `PFX_failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `PFX_interrogations`
--

CREATE TABLE `PFX_interrogations` (
  `idinterro` int(11) NOT NULL,
  `date_heure` datetime NOT NULL,
  `duree` int(11) NOT NULL,
  `commentaire` varchar(250) NOT NULL,
  `id` bigint(20) UNSIGNED NOT NULL,
  `idcours` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `PFX_jobs`
--

CREATE TABLE `PFX_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `PFX_job_batches`
--

CREATE TABLE `PFX_job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `PFX_matieres`
--

CREATE TABLE `PFX_matieres` (
  `idmatiere` int(11) NOT NULL,
  `nom` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `PFX_matieres`
--

INSERT INTO `PFX_matieres` (`idmatiere`, `nom`) VALUES
(1, 'SLAM'),
(2, 'Cybersécurité'),
(3, 'CEJM'),
(4, 'ANGLAIS');

-- --------------------------------------------------------

--
-- Structure de la table `PFX_migrations`
--

CREATE TABLE `PFX_migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `PFX_migrations`
--

INSERT INTO `PFX_migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1);

-- --------------------------------------------------------

--
-- Structure de la table `PFX_password_reset_tokens`
--

CREATE TABLE `PFX_password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `PFX_password_reset_tokens`
--

INSERT INTO `PFX_password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('raniach876@gmail.com', '$2y$12$Ah7dVCbKOg2nAn.CtGyJautsxtl.xFUx2hKOXWq.WeTWeHjxcV9z6', '2024-11-20 13:40:21');

-- --------------------------------------------------------

--
-- Structure de la table `PFX_roles`
--

CREATE TABLE `PFX_roles` (
  `idrole` int(11) NOT NULL,
  `typerole` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `PFX_roles`
--

INSERT INTO `PFX_roles` (`idrole`, `typerole`) VALUES
(1, 'Gestionnaire'),
(2, 'Formateur'),
(3, 'Apprenant');

-- --------------------------------------------------------

--
-- Structure de la table `PFX_sessions`
--

CREATE TABLE `PFX_sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `PFX_sessions`
--

INSERT INTO `PFX_sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('6PZsTKd54Myubz0vgSsuCuRTGdy6ZPdl21Y5GGLv', NULL, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64; rv:128.0) Gecko/20100101 Firefox/128.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiZFQ5WEdLQ01NOXNBYkxOZmNPWjVSb2NrTUQycXJQS0NPR2I5Rm0zdCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9pbnRlcnJvZ2F0aW9ucyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6MzoidXJsIjthOjE6e3M6ODoiaW50ZW5kZWQiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXNoYm9hcmQiO319', 1744373030);

-- --------------------------------------------------------

--
-- Structure de la table `PFX_users`
--

CREATE TABLE `PFX_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `idclasse` int(11) DEFAULT NULL,
  `idrole` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `PFX_users`
--

INSERT INTO `PFX_users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `idclasse`, `idrole`) VALUES
(1, 'amiarr', 'amiarr@saintjo.org', '2024-12-09 23:55:40', '$2y$12$86yLBkdGGm81r8IXCs.Bo.QV04J0zY61RCfRoGtln6HOQcRQMjD6O', NULL, '2024-12-09 23:55:40', '2024-12-09 23:04:07', 2, 3),
(2, 'dirila', 'dirila@saintjo.org', '2024-12-10 00:06:26', '$2y$10$CUjf6JPHjbJxZmfqlwpR.O6Xe1iDkWb9chfJlnWE0nTRGHgqxJuxO', NULL, '2024-12-10 00:06:26', '2024-12-10 00:06:26', 2, 3),
(3, 'keffalan', 'keffalan@saintjo.org', '2024-12-10 00:08:10', '$2y$10$QOHRDnBNT1MyvTu/dBJClO9f4ERH1cY/9cvA0HMqPqH83t1MvACEO', NULL, '2024-12-10 00:08:10', '2024-12-10 00:08:10', 2, 3),
(4, 'lambardn', 'lambardn@saintjo.org', '2024-12-10 00:12:34', '$2y$10$kVxrl.c9Jzo9b4cvQqoTsOk/Zu9JSynFAWIfh.JfMekdN5U.jPrne', NULL, '2024-12-10 00:10:38', '2024-12-10 00:10:38', 2, 3),
(5, 'mussetc', 'mussetc@saintjo.org', '2024-12-10 00:13:49', '$2y$10$tzPcRCJCOo2tIzqk1uaR1O2oLGEkF75EnRHqJ1SisLJRTpvKThTBK', NULL, '2024-12-10 00:13:49', '2024-12-10 00:13:49', 2, 3),
(6, 'ouhimmoui', 'ouhimmoui@saintjo.org', '2024-12-10 00:15:23', '$2y$10$Lj9gRrRtTl8.hwN9lClEsORqNfJwt17FnzcHUHBPSJp5WpxWPFHOG', NULL, '2024-12-10 00:15:23', '2024-12-10 00:15:23', 2, 3),
(7, 'clocharda', 'clocharda@saintjo.org', '2024-12-10 00:24:34', '$2y$12$BENlOhQ6YavWDFHN5ulVaO2iXuKEalMRFURrR6Zs6XsV14ibO683m', NULL, '2024-12-10 00:19:34', '2024-12-09 23:24:00', NULL, 2),
(8, 'henrij', 'henrij@saintjo.org', '2024-12-10 00:25:49', '$2y$12$YMSglW5PRTG.vSWXyH9DrecKT/Fgf.YpumaRGEr7QtXeOsQ2G8LQG', NULL, '2024-12-10 00:25:49', '2024-12-13 09:02:53', NULL, 2),
(9, 'jublinjf', 'jublinjf@saintjo.org', '2024-12-10 00:28:29', '$2y$12$iB16fGRhehKmJ1oSUt.aqORqUNBEfqJ9Jbjj2X9PFbVq6T3HDn3Oq', NULL, '2024-12-10 00:28:29', '2024-12-11 19:16:27', NULL, 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `assurer`
--
ALTER TABLE `assurer`
  ADD PRIMARY KEY (`idcours`,`id`),
  ADD KEY `assurer_PFX_users0_FK` (`id`);

--
-- Index pour la table `PFX_cache`
--
ALTER TABLE `PFX_cache`
  ADD PRIMARY KEY (`key`);

--
-- Index pour la table `PFX_cache_locks`
--
ALTER TABLE `PFX_cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Index pour la table `PFX_classes`
--
ALTER TABLE `PFX_classes`
  ADD PRIMARY KEY (`idclasse`);

--
-- Index pour la table `PFX_cours`
--
ALTER TABLE `PFX_cours`
  ADD PRIMARY KEY (`idcours`),
  ADD KEY `PFX_cours_PFX_matieres_FK` (`idmatiere`),
  ADD KEY `PFX_cours_PFX_classes0_FK` (`idclasse`);

--
-- Index pour la table `PFX_failed_jobs`
--
ALTER TABLE `PFX_failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pfx_failed_jobs_uuid_unique` (`uuid`);

--
-- Index pour la table `PFX_interrogations`
--
ALTER TABLE `PFX_interrogations`
  ADD PRIMARY KEY (`idinterro`),
  ADD KEY `PFX_interrogations_PFX_users_FK` (`id`),
  ADD KEY `PFX_interrogations_PFX_cours0_FK` (`idcours`);

--
-- Index pour la table `PFX_jobs`
--
ALTER TABLE `PFX_jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pfx_jobs_queue_index` (`queue`);

--
-- Index pour la table `PFX_job_batches`
--
ALTER TABLE `PFX_job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `PFX_matieres`
--
ALTER TABLE `PFX_matieres`
  ADD PRIMARY KEY (`idmatiere`);

--
-- Index pour la table `PFX_migrations`
--
ALTER TABLE `PFX_migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `PFX_password_reset_tokens`
--
ALTER TABLE `PFX_password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Index pour la table `PFX_roles`
--
ALTER TABLE `PFX_roles`
  ADD PRIMARY KEY (`idrole`);

--
-- Index pour la table `PFX_sessions`
--
ALTER TABLE `PFX_sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pfx_sessions_user_id_index` (`user_id`),
  ADD KEY `pfx_sessions_last_activity_index` (`last_activity`);

--
-- Index pour la table `PFX_users`
--
ALTER TABLE `PFX_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pfx_users_email_unique` (`email`),
  ADD KEY `PFX_users_PFX_classes_FK` (`idclasse`),
  ADD KEY `PFX_users_PFX_roles0_FK` (`idrole`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `PFX_classes`
--
ALTER TABLE `PFX_classes`
  MODIFY `idclasse` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `PFX_cours`
--
ALTER TABLE `PFX_cours`
  MODIFY `idcours` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `PFX_failed_jobs`
--
ALTER TABLE `PFX_failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `PFX_interrogations`
--
ALTER TABLE `PFX_interrogations`
  MODIFY `idinterro` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `PFX_jobs`
--
ALTER TABLE `PFX_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `PFX_matieres`
--
ALTER TABLE `PFX_matieres`
  MODIFY `idmatiere` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `PFX_migrations`
--
ALTER TABLE `PFX_migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `PFX_roles`
--
ALTER TABLE `PFX_roles`
  MODIFY `idrole` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `PFX_users`
--
ALTER TABLE `PFX_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `assurer`
--
ALTER TABLE `assurer`
  ADD CONSTRAINT `assurer_PFX_cours_FK` FOREIGN KEY (`idcours`) REFERENCES `PFX_cours` (`idcours`),
  ADD CONSTRAINT `assurer_PFX_users0_FK` FOREIGN KEY (`id`) REFERENCES `PFX_users` (`id`);

--
-- Contraintes pour la table `PFX_cours`
--
ALTER TABLE `PFX_cours`
  ADD CONSTRAINT `PFX_cours_PFX_classes0_FK` FOREIGN KEY (`idclasse`) REFERENCES `PFX_classes` (`idclasse`),
  ADD CONSTRAINT `PFX_cours_PFX_matieres_FK` FOREIGN KEY (`idmatiere`) REFERENCES `PFX_matieres` (`idmatiere`);

--
-- Contraintes pour la table `PFX_interrogations`
--
ALTER TABLE `PFX_interrogations`
  ADD CONSTRAINT `PFX_interrogations_PFX_cours0_FK` FOREIGN KEY (`idcours`) REFERENCES `PFX_cours` (`idcours`),
  ADD CONSTRAINT `PFX_interrogations_PFX_users_FK` FOREIGN KEY (`id`) REFERENCES `PFX_users` (`id`);

--
-- Contraintes pour la table `PFX_users`
--
ALTER TABLE `PFX_users`
  ADD CONSTRAINT `PFX_users_PFX_classes_FK` FOREIGN KEY (`idclasse`) REFERENCES `PFX_classes` (`idclasse`),
  ADD CONSTRAINT `PFX_users_PFX_roles0_FK` FOREIGN KEY (`idrole`) REFERENCES `PFX_roles` (`idrole`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
