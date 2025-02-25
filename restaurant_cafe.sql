-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 02 fév. 2025 à 18:20
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `restaurant_cafe`
--

-- --------------------------------------------------------

--
-- Structure de la table `commander`
--

CREATE TABLE `commander` (
  `id` int(11) NOT NULL,
  `plat` varchar(255) NOT NULL,
  `nombre` int(11) NOT NULL,
  `client_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `commander`
--

INSERT INTO `commander` (`id`, `plat`, `nombre`, `client_name`) VALUES
(24, 'baguette viande', 1, 'zaineb'),
(25, 'Pizza tomate fromage', 2, 'zaineb'),
(26, 'baguette poulet', 15, ''),
(27, 'baguette poulet', 15, '');

-- --------------------------------------------------------

--
-- Structure de la table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `categorie` varchar(255) DEFAULT NULL,
  `category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `menu`
--

INSERT INTO `menu` (`id`, `name`, `price`, `categorie`, `category`) VALUES
(32, 'Salade de legume', 11.00, NULL, 'salade'),
(33, 'pizza margritta ', 11.00, NULL, 'pizza'),
(35, 'tunisian salad', 6.00, NULL, 'salade'),
(36, 'mixed salade', 7.00, NULL, 'salade'),
(37, ' assiette frite', 4.00, NULL, 'salade'),
(38, 'Salade verte', 5.00, NULL, 'salade'),
(39, 'Salade de riz', 7.00, NULL, 'salade'),
(40, 'Pizza margherita', 10.00, NULL, 'pizza'),
(41, 'Pizza tomate fromage', 9.00, NULL, 'pizza'),
(42, 'Pizza quatre fromages', 12.00, NULL, 'pizza'),
(43, 'Pizza pesto poulet', 15.00, NULL, 'pizza'),
(44, 'sandwich jambon', 7.00, NULL, 'sandwich'),
(45, 'sandwich omelette ', 6.00, NULL, 'sandwich'),
(46, 'sandwich merguez', 6.00, NULL, 'sandwich'),
(47, 'sandwich poulet', 7.00, NULL, 'sandwich'),
(48, 'baguette poulet', 7.00, NULL, 'baguette'),
(49, 'baguette thon', 6.00, NULL, 'baguette'),
(50, 'baguette viande', 8.00, NULL, 'baguette'),
(51, 'tacos poulet', 8.00, NULL, 'tacos'),
(52, 'tacos thon', 7.00, NULL, 'tacos'),
(53, 'tacos formage', 6.00, NULL, 'tacos'),
(54, 'Espresso', 2.00, NULL, 'café'),
(56, 'café allongé', 3.00, NULL, 'café'),
(57, 'Café au lait', 2.00, NULL, 'café'),
(58, 'Cappuccino', 2.00, NULL, 'café'),
(59, 'Café frappé à la noisette', 4.00, NULL, 'boissons froides'),
(60, 'Cocktail ', 6.00, NULL, 'boissons froides'),
(61, 'Thé glacé menthe citron', 4.00, NULL, 'boissons froides'),
(62, 'jus frais', 7.00, NULL, 'boissons froides'),
(63, 'pancake', 7.00, NULL, 'desserts'),
(64, 'crepe', 7.00, NULL, 'desserts'),
(65, 'croissant', 2.00, NULL, 'desserts'),
(66, 'gateaux', 3.00, NULL, 'desserts');

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE `reservation` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `reservation`
--

INSERT INTO `reservation` (`id`, `name`, `date`, `time`) VALUES
(1, 'zeinrb', '2025-01-20', '11:00:00'),
(4, 'jnblj', '0000-00-00', '05:35:00'),
(8, 'zeinrb', '2025-01-02', '12:00:00'),
(9, 'pizza italiano', '5434-03-31', '05:05:00');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `email`, `password`) VALUES
(1, 'zainebsaket100@gmail.com', 'zaineb123');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `commander`
--
ALTER TABLE `commander`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `commander`
--
ALTER TABLE `commander`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT pour la table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT pour la table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
