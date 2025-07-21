-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : lun. 21 juil. 2025 à 13:40
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
-- Base de données : `laravel`
--

-- --------------------------------------------------------

--
-- Structure de la table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `cart`
--

CREATE TABLE `cart` (
  `ID` int(11) NOT NULL,
  `idUser` bigint(11) NOT NULL,
  `idProduct` int(11) NOT NULL,
  `quantite` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `cart`
--

INSERT INTO `cart` (`ID`, `idUser`, `idProduct`, `quantite`) VALUES
(14, 4, 2, 2);

-- --------------------------------------------------------

--
-- Structure de la table `cart_perso`
--

CREATE TABLE `cart_perso` (
  `ID` int(11) NOT NULL,
  `idUser` bigint(11) NOT NULL,
  `idProduct` int(11) NOT NULL,
  `quantite` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `cart_perso`
--

INSERT INTO `cart_perso` (`ID`, `idUser`, `idProduct`, `quantite`) VALUES
(3, 4, 1, 4);

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `ID` int(11) NOT NULL,
  `name` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
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
-- Structure de la table `informations`
--

CREATE TABLE `informations` (
  `ID` int(11) NOT NULL,
  `idUser` bigint(11) NOT NULL,
  `firstname_lastname` varchar(1000) NOT NULL,
  `address` varchar(1000) NOT NULL,
  `postal_code` int(5) NOT NULL,
  `city` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `informations`
--

INSERT INTO `informations` (`ID`, `idUser`, `firstname_lastname`, `address`, `postal_code`, `city`, `country`) VALUES
(2, 4, 'TOTO Tutu', 'Rue de la crete', 74000, 'Annecy', 'France'),
(12, 11, 'TOTO Tutu', 'Rue de la crete', 74000, 'Annecy', 'France');

-- --------------------------------------------------------

--
-- Structure de la table `jobs`
--

CREATE TABLE `jobs` (
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
-- Structure de la table `job_batches`
--

CREATE TABLE `job_batches` (
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
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_07_11_131552_create_personal_access_tokens_table', 2);

-- --------------------------------------------------------

--
-- Structure de la table `order_tracking`
--

CREATE TABLE `order_tracking` (
  `ID` int(11) NOT NULL,
  `idOrder` int(11) NOT NULL,
  `idUser` bigint(11) NOT NULL,
  `idProduct` int(11) DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT 0,
  `quantite` int(11) NOT NULL DEFAULT 1,
  `prix` float NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `order_tracking_perso`
--

CREATE TABLE `order_tracking_perso` (
  `ID` int(11) NOT NULL,
  `idOrder` int(11) NOT NULL,
  `idUser` bigint(11) NOT NULL,
  `idProduct` int(11) DEFAULT NULL,
  `quantite` int(11) NOT NULL DEFAULT 1,
  `prix` float NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `permissions`
--

CREATE TABLE `permissions` (
  `ID` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `permissions`
--

INSERT INTO `permissions` (`ID`, `nom`) VALUES
(1, 'Client'),
(2, 'Admin');

-- --------------------------------------------------------

--
-- Structure de la table `personalized_glasses`
--

CREATE TABLE `personalized_glasses` (
  `ID` int(11) NOT NULL,
  `idUser` bigint(11) NOT NULL,
  `monture` varchar(1000) NOT NULL,
  `couleurmonture` varchar(1000) NOT NULL,
  `verre` varchar(1000) NOT NULL,
  `couleurverre` varchar(1000) NOT NULL,
  `boite` varchar(1000) NOT NULL,
  `couleurboite` varchar(1000) NOT NULL,
  `prix` int(11) NOT NULL DEFAULT 100
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `personalized_glasses`
--

INSERT INTO `personalized_glasses` (`ID`, `idUser`, `monture`, `couleurmonture`, `verre`, `couleurverre`, `boite`, `couleurboite`, `prix`) VALUES
(1, 4, 'Carbone', 'Bleu', 'Minéraux', 'Bleu', 'Pliable', 'Bleu', 100);

-- --------------------------------------------------------

--
-- Structure de la table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` text NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

CREATE TABLE `products` (
  `ID` int(11) NOT NULL,
  `nom` varchar(1000) NOT NULL,
  `description` varchar(200) DEFAULT 'Pas de description',
  `genre` varchar(8) DEFAULT 'Unisexe',
  `taille` varchar(6) DEFAULT 'Petit',
  `forme` varchar(1000) DEFAULT 'Non renseigné',
  `image` text NOT NULL,
  `prix` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`ID`, `nom`, `description`, `genre`, `taille`, `forme`, `image`, `prix`) VALUES
(1, 'Lunette de lucas', 'Pas de description', 'Unisexe', 'Petit', 'Non renseigné', 'assets/exemples/exempleDetail.png', 10),
(2, 'Alalalala', 'Pas de description', 'Unisexe', 'Petit', 'Non renseigné', 'assets/products/2.png', 20),
(3, 'Magnifique', 'Pas de description', 'Unisexe', 'Petit', 'Non renseigné', 'assets/products/3.png', 50),
(4, 'Beautiful', 'Pas de description', 'Unisexe', 'Petit', 'Non renseigné', 'assets/products/4.png', 500),
(5, 'Incroyable', 'Pas de description', 'Unisexe', 'Petit', 'Non renseigné', 'assets/products/5.png', 1000),
(6, 'Aloha', 'Pas de description', 'Unisexe', 'Petit', 'Non renseigné', 'assets/products/6.png', 5),
(8, 'modifviapostman', 'nonnnnnnnnnnnnnnnnnn', 'Homme', 'Moyen', 'Papillon', 'assets/products/687e0799ac485.webp', 20000);

-- --------------------------------------------------------

--
-- Structure de la table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('70H96VJ2OTYuKWKTPfwhaFi2MaiVrmfMr34n3Al8', 1, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiVnIzRGR3ZHRIZnJvcVhxRFc1VExoVmg2NVlYS0t4YVJ1WFFkQk9kNyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9iYWNrb2ZmaWNlL2FjY291bnQiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1753090242),
('LsmyFzw754msR1k55Sf7BguvyLVy4ekVe7GBoCod', 4, '127.0.0.1', 'PostmanRuntime/7.39.1', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiVnVKYlhGY3Nob09KaHpWcmJoYlJKM1hSbkc4TXBGRTRlU1pWNlF4QyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7fXM6MzoidXJsIjthOjE6e3M6ODoiaW50ZW5kZWQiO3M6Nzc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hcGkvcHJvZHVjdC9uZXc/aW1hZ2U9dGVzdC5qcGcmbm9tPXRlc3R2aWFnZXQmcHJpeD0xMTExIjt9fQ==', 1753090458),
('pShdbRUwzkxJvKLueCB3Mj3iTFIPr3JVbROqET3t', NULL, '127.0.0.1', 'PostmanRuntime/7.39.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidDFWbzdhREVwOGhHY29BdTBXSHc3cVF2ZkRoUXU1YzJQazFobkl6RCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hcGkvcHJvZHVjdC9uZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1753083637);

-- --------------------------------------------------------

--
-- Structure de la table `status`
--

CREATE TABLE `status` (
  `ID` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `status`
--

INSERT INTO `status` (`ID`, `nom`) VALUES
(1, 'Attente de traitement'),
(2, 'Préparation'),
(3, 'En cours de livraison'),
(4, 'En retard'),
(5, 'Livré');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `permission` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `permission`) VALUES
(1, 'Toto', 'labiscotte@lol.com', NULL, '$2y$12$br4FzHWGa13NUu1kWZsfE.oHo.UwNMg7rehbQalvJfn8LapPxUH9y', '5v99V3dNthdtipAIy4eoaRovU8MhvLVyA6fxPEWB7YR48pIIwPBw9O02uulj', '2025-07-09 06:46:34', '2025-07-09 06:46:34', 1),
(4, 'LeClient', 'leclient@ol.com', NULL, '$2y$12$AQY2WxibiBQ9z6SZMhFf7eEbWHsG./oG2buPN9p/beyRvZWthX5kC', 'dAxvmz9uKIxNAps7HC70yB4YWSmjYr6dYynh4k8HySbWTrlu0ad9PHXuA8wG', '2025-07-09 07:56:48', '2025-07-09 07:56:48', 0),
(8, 'BetaTest', 'betatest@test.com', NULL, '$2y$12$6vSNCZcTW.Cc/oihHqauIu9bL6ZJCLBQR4IgBJW5Kgwo3DrjSNVn6', NULL, '2025-07-11 06:53:03', '2025-07-11 06:53:03', 0),
(11, 'tessssst', 'testtt@testtt.com', NULL, '$2y$12$hinnfhFUcDN6j42I2DBZ0uAGOVbyB3PONn0UrDCtenvgccmg847Ve', NULL, '2025-07-15 08:07:30', '2025-07-15 08:07:30', 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Index pour la table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Index pour la table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `idUser` (`idUser`),
  ADD KEY `idProduct` (`idProduct`);

--
-- Index pour la table `cart_perso`
--
ALTER TABLE `cart_perso`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `idUser` (`idUser`),
  ADD KEY `idProduct` (`idProduct`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Index pour la table `informations`
--
ALTER TABLE `informations`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `idUser` (`idUser`);

--
-- Index pour la table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Index pour la table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `order_tracking`
--
ALTER TABLE `order_tracking`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `idProduct` (`idProduct`),
  ADD KEY `idUser` (`idUser`) USING BTREE;

--
-- Index pour la table `order_tracking_perso`
--
ALTER TABLE `order_tracking_perso`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `idProduct` (`idProduct`),
  ADD KEY `idUser` (`idUser`) USING BTREE;

--
-- Index pour la table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Index pour la table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `personalized_glasses`
--
ALTER TABLE `personalized_glasses`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `idUser` (`idUser`);

--
-- Index pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Index pour la table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Index pour la table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `cart`
--
ALTER TABLE `cart`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `cart_perso`
--
ALTER TABLE `cart_perso`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `informations`
--
ALTER TABLE `informations`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `order_tracking`
--
ALTER TABLE `order_tracking`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `order_tracking_perso`
--
ALTER TABLE `order_tracking_perso`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `personalized_glasses`
--
ALTER TABLE `personalized_glasses`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `products`
--
ALTER TABLE `products`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `status`
--
ALTER TABLE `status`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`idProduct`) REFERENCES `products` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `cart_perso`
--
ALTER TABLE `cart_perso`
  ADD CONSTRAINT `cart_perso_ibfk_2` FOREIGN KEY (`idUser`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_perso_ibfk_3` FOREIGN KEY (`idProduct`) REFERENCES `personalized_glasses` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `informations`
--
ALTER TABLE `informations`
  ADD CONSTRAINT `informations_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `order_tracking`
--
ALTER TABLE `order_tracking`
  ADD CONSTRAINT `order_tracking_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_tracking_ibfk_2` FOREIGN KEY (`idProduct`) REFERENCES `products` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `order_tracking_perso`
--
ALTER TABLE `order_tracking_perso`
  ADD CONSTRAINT `order_tracking_perso_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_tracking_perso_ibfk_2` FOREIGN KEY (`idProduct`) REFERENCES `personalized_glasses` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `personalized_glasses`
--
ALTER TABLE `personalized_glasses`
  ADD CONSTRAINT `personalized_glasses_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
