-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 23 avr. 2023 à 17:53
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projet`
--

-- --------------------------------------------------------

--
-- Structure de la table `address`
--

CREATE TABLE `address` (
  `id` int(11) NOT NULL,
  `address_line_1` text NOT NULL,
  `address_line_2` text DEFAULT NULL,
  `postal_code` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`) VALUES
(1, 'admin', '698d51a19d8a121ce581499d7b701668');

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL COMMENT 'clé primaire',
  `title` varchar(255) NOT NULL COMMENT 'le titre de l''article',
  `description` text NOT NULL COMMENT 'le description de l''article',
  `prix` int(11) NOT NULL,
  `category_id` int(11) NOT NULL COMMENT 'clé secondaire pour la table categories'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id`, `title`, `description`, `prix`, `category_id`) VALUES
(24, 'Bague Homme Chic', '*Très cool\r\n*Sa couleur ne change jamais\r\n*Cela dure pour toujours', 120, 11),
(25, 'Anneau parfait femme', '\r\n*Très cool\r\n*Sa couleur ne change jamais\r\n*Cela dure pour toujours', 450, 12),
(27, '10 pièces anneaux femme', '*Très cool\r\n*Sa couleur ne change jamais\r\n*Cela dure pour toujours', 75, 12),
(28, '1 pièce anneau glamour', '*Très cool\r\n*Sa couleur ne change jamais\r\n*Cela dure pour toujours', 30, 12),
(29, '1 pièce Anneau mode design géométrique', '*Très cool\r\n*Sa couleur ne change jamais\r\n*Cela dure pour toujours', 50, 12),
(30, '1 pièce glamour', '*Très cool\r\n*Sa couleur ne change jamais\r\n*Cela dure pour toujours', 54, 12),
(31, '1 pièce serpent argent', '*Très cool\r\n*Sa couleur ne change jamais\r\n*Cela dure pour toujours', 55, 12),
(32, '3 pièces bague', '*Très cool\r\n*Sa couleur ne change jamais\r\n*Cela dure pour toujours', 60, 12),
(33, '15 pièces bague à fruit', '*Très cool\r\n*Sa couleur ne change jamais\r\n*Cela dure pour toujours', 55, 12),
(34, '22 pièces Anneau à détail cœur à fausse perle', '*Très cool\r\n*Sa couleur ne change jamais\r\n*Cela dure pour toujours', 57, 12),
(35, '30 pièce de couleur fleurs', '*Très cool\r\n*Sa couleur ne change jamais\r\n*Cela dure pour toujours', 20, 12),
(36, 'Anneau à detail rond', '*Très cool\r\n*Sa couleur ne change jamais\r\n*Cela dure pour toujours', 20, 12),
(37, 'Anneau à strasse', '*Très cool\r\n*Sa couleur ne change jamais\r\n*Cela dure pour toujours', 45, 12),
(38, 'Anneau avec zircone cubique', '*Très cool\r\n*Sa couleur ne change jamais\r\n*Cela dure pour toujours', 19, 12),
(39, 'Anneau cubique design serpent', '*Très cool\r\n*Sa couleur ne change jamais\r\n*Cela dure pour toujours', 35, 12),
(40, 'bague à coeur design torsadé', '*Très cool\r\n*Sa couleur ne change jamais\r\n*Cela dure pour toujours', 15, 12),
(41, 'Bague à detail papillon', '*Très cool\r\n*Sa couleur ne change jamais\r\n*Cela dure pour toujours', 40, 12),
(42, 'Bague à fleur et feuille', '*Très cool\r\n*Sa couleur ne change jamais\r\n*Cela dure pour toujours', 55, 12),
(43, 'bague avec stasse', '*Très cool\r\n*Sa couleur ne change jamais\r\n*Cela dure pour toujoursv', 62, 12),
(44, 'Bague d\'Anxiété Acier Inoxydable - DIAMONDS', '*Très cool\r\n*Sa couleur ne change jamais\r\n*Cela dure pour toujours', 22, 12),
(45, 'Bague d\'Anxiété Ajustable - SOLAR', '*Très cool\r\n*Sa couleur ne change jamais\r\n*Cela dure pour toujours', 33, 12),
(46, 'Bague d\'Anxiété Ajustable Acier Inoxydable - GALAXIE', '*Très cool\r\n*Sa couleur ne change jamais\r\n*Cela dure pour toujours', 41, 12),
(47, 'bague design serpent', '*Très cool\r\n*Sa couleur ne change jamais\r\n*Cela dure pour toujours', 20, 12),
(48, 'Bague en alliage', '*Très cool\r\n*Sa couleur ne change jamais\r\n*Cela dure pour toujours', 100, 12),
(49, 'Bague minimaliste', '*Très cool\r\n*Sa couleur ne change jamais\r\n*Cela dure pour toujours', 55, 12),
(50, 'bague ouvert bleu', '*Très cool\r\n*Sa couleur ne change jamais\r\n*Cela dure pour toujours', 29, 12),
(52, 'Bague ouverte texturé', '*Très cool\r\n*Sa couleur ne change jamais\r\n*Cela dure pour toujours', 61, 12),
(53, 'Bague rong', '*Très cool\r\n*Sa couleur ne change jamais\r\n*Cela dure pour toujours', 99, 12),
(54, '7 pièce anneau texturé', '*Très cool\r\n*Sa couleur ne change jamais\r\n*Cela dure pour toujours', 111, 11),
(55, 'Anneau holographique', '*Très cool\r\n*Sa couleur ne change jamais\r\n*Cela dure pour toujours', 55, 11),
(56, 'Bague à motif Géometrique', '*Très cool\r\n*Sa couleur ne change jamais\r\n*Cela dure pour toujours', 55, 11),
(57, 'anneau homme minimaliste', '*Très cool\r\n*Sa couleur ne change jamais\r\n*Cela dure pour toujours', 29, 11),
(58, 'Bague avec pierre', '*Très cool\r\n*Sa couleur ne change jamais\r\n*Cela dure pour toujours', 50, 11),
(59, 'Bague en acier inoxydable', '*Très cool\r\n*Sa couleur ne change jamais\r\n*Cela dure pour toujours', 60, 11),
(60, 'Bague haut de gamme', '*Très cool\r\n*Sa couleur ne change jamais\r\n*Cela dure pour toujours', 21, 11),
(61, 'Bague homme gravée', '*Très cool\r\n*Sa couleur ne change jamais\r\n*Cela dure pour toujours', 15, 11),
(62, 'Bague homme minimaliste', '*Très cool\r\n*Sa couleur ne change jamais\r\n*Cela dure pour toujours', 40, 11),
(63, 'Bague homme', '*Très cool\r\n*Sa couleur ne change jamais\r\n*Cela dure pour toujours', 30, 11),
(64, 'Bague ouverte torsadée', '*Très cool\r\n*Sa couleur ne change jamais\r\n*Cela dure pour toujours', 22, 11),
(65, 'Homme 3 pièces anneau', '*Très cool\r\n*Sa couleur ne change jamais\r\n*Cela dure pour toujours', 55, 11),
(66, 'Homme anneau à gamme', '*Très cool\r\n*Sa couleur ne change jamais\r\n*Cela dure pour toujours', 60, 11),
(67, 'Homme anneau avec strass', '*Très cool\r\n*Sa couleur ne change jamais\r\n*Cela dure pour toujours', 28, 11),
(68, 'Homme anneau avec volute', '*Très cool\r\n*Sa couleur ne change jamais\r\n*Cela dure pour toujours', 66, 11),
(69, 'Homme bague 3 pièces chiffre romain', '*Très cool\r\n*Sa couleur ne change jamais\r\n*Cela dure pour toujours', 70, 11),
(70, 'Homme bague gravée', '*Très cool\r\n*Sa couleur ne change jamais\r\n*Cela dure pour toujours', 22, 11);

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `label` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `label`) VALUES
(11, 'Homme'),
(12, 'Femme');

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL COMMENT 'clé primaire',
  `address_id` int(11) DEFAULT NULL COMMENT 'clé etrangére pour la table addresses',
  `frst_name` varchar(255) DEFAULT NULL COMMENT 'prenom',
  `last_name` varchar(255) DEFAULT NULL COMMENT 'nom',
  `email` varchar(255) NOT NULL,
  `password` text NOT NULL COMMENT 'mots de passe crypté'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`id`, `address_id`, `frst_name`, `last_name`, `email`, `password`) VALUES
(1, NULL, 'chiraz', 'chiraz', 'fake@email.com', '098f6bcd4621d373cade4e832627b4f6');

-- --------------------------------------------------------

--
-- Structure de la table `cmd`
--

CREATE TABLE `cmd` (
  `id` int(11) NOT NULL COMMENT 'clé primaire (num)',
  `date` date NOT NULL COMMENT 'la date de passation',
  `address_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `path` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='les image de l''article';

--
-- Déchargement des données de la table `images`
--

INSERT INTO `images` (`id`, `article_id`, `path`) VALUES
(7, 24, '../images/upload/acb9a6b1c5b4606182d5b543cfaf0e3baee7217ctest-img-4.png'),
(8, 25, '../images/upload/6f9920846edbc98644169674e914bfb9cf4ff79ftest-img-2.png'),
(10, 27, '../images/upload/55adb281fb1df8a47497a9fe52f398002edd70c7image.png'),
(11, 28, '../images/upload/b42c465cc77c2614c20f1 pièce anneau glamour.png'),
(12, 29, '../images/upload/44cd64ecdb6c1c58ba991 pièce Anneau mode design géométrique.png'),
(13, 30, '../images/upload/e5a793907c40a98463801 pièce glamour.png'),
(14, 31, '../images/upload/dc6a7a8681004e30b3aa1 pièce serpent argent.png'),
(15, 32, '../images/upload/410edb5e804e036c7b7f3 pièces bague.png'),
(16, 33, '../images/upload/371e653cd4fd4689f28f15 pièces bague à fruit.png'),
(17, 34, '../images/upload/6b24a6d7dd0bfdd79ba322 pièces Anneau à détail cœur à fausse perle.png'),
(18, 35, '../images/upload/a017ac509cc842334e8d30 pièce de couleur fleurs.png'),
(19, 36, '../images/upload/1fb6cdc07f2a013975b4Anneau à detail rond.png'),
(20, 37, '../images/upload/a2c4e1ad249ff0788462Anneau à strasse.png'),
(21, 38, '../images/upload/9a282fe47fe4e5a518ccAnneau avec zircone cubique.png'),
(22, 39, '../images/upload/d464686d7abb893337c8Anneau cubique design serpent.png'),
(23, 40, '../images/upload/4a2f40c1bab368339d50bague à coeur design torsadé.png'),
(24, 41, '../images/upload/66f64117d6372336990eBague à detail papillon.png'),
(25, 42, '../images/upload/34dbcbcbc9726cebc7d7Bague à fleur et feuille.png'),
(26, 43, '../images/upload/49e8a9dac660544c55cebague avec stasse.png'),
(27, 44, '../images/upload/c963212cdf5a4989a775Bague d\'Anxiété Acier Inoxydable - DIAMONDS.png'),
(28, 45, '../images/upload/25b1599db66a708d72c1Bague d\'Anxiété Ajustable - SOLAR.png'),
(29, 46, '../images/upload/ffcb2ea1c9e72c887792Bague d\'Anxiété Ajustable Acier Inoxydable - GALAXIE.png'),
(30, 47, '../images/upload/4e47c2f05c20bea6764ebague design serpent.png'),
(31, 48, '../images/upload/31cc5294b69194425e10Bague en alliage.png'),
(32, 49, '../images/upload/ef05cf90752e78b5be4fBague minimaliste.png'),
(33, 50, '../images/upload/598bb1f1072b245ef214bague ouvert bleu.png'),
(34, 52, '../images/upload/00f310f24d23b4e9eba2Bague ouverte texturé.png'),
(35, 53, '../images/upload/09f4eb78b081540f3e8eBague rong.png'),
(36, 54, '../images/upload/e5e7764e38ddf2f737f57 pièce anneau texturé.png'),
(37, 55, '../images/upload/510288a032609f47fea4Anneau holographique.png'),
(38, 56, '../images/upload/0f6f0aa4441599930d06Bague à motif Géometrique.png'),
(39, 57, '../images/upload/dd3e25c34e259c094769anneau homme minimaliste.png'),
(40, 58, '../images/upload/a606a95531580524875fBague avec pierre.png'),
(41, 59, '../images/upload/a057eabc457fbb8c3d75Bague en acier inoxydable.png'),
(42, 60, '../images/upload/ae2d73575595f73d70a5Bague haut de gamme.png'),
(43, 61, '../images/upload/aa1488560265dde0174fBague homme gravée.png'),
(44, 62, '../images/upload/5a892a074e078be7da1cBague homme minimaliste.png'),
(45, 63, '../images/upload/d37e5dc33c6bc8befe5fBague homme.png'),
(46, 64, '../images/upload/0de83e7daa07618d8ef1Bague ouverte torsadée.png'),
(47, 65, '../images/upload/bbc2818e1b813d3fc5b6Homme 3 pièces anneau.png'),
(48, 66, '../images/upload/c5eec521216b45ae0ac2Homme anneau à gamme.png'),
(49, 67, '../images/upload/5e11834beceeb246560bHomme anneau avec strass.png'),
(50, 68, '../images/upload/0ff12ed801452d5ed1dfHomme anneau avec volute.png'),
(51, 69, '../images/upload/b65f8f6888482b93e2b9Homme bague 3 pièces chiffre romain.png'),
(52, 70, '../images/upload/a58262ec6bda40e3995cHomme bague gravée.png');

-- --------------------------------------------------------

--
-- Structure de la table `ligne_cmd`
--

CREATE TABLE `ligne_cmd` (
  `id` int(11) NOT NULL COMMENT 'clé primaire',
  `cmd_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Association Ligne-CMD';

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category` (`category_id`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `address` (`address_id`);

--
-- Index pour la table `cmd`
--
ALTER TABLE `cmd`
  ADD PRIMARY KEY (`id`),
  ADD KEY `addr` (`address_id`);

--
-- Index pour la table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `img` (`article_id`);

--
-- Index pour la table `ligne_cmd`
--
ALTER TABLE `ligne_cmd`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cmd` (`cmd_id`),
  ADD KEY `article` (`article_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `address`
--
ALTER TABLE `address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'clé primaire', AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'clé primaire', AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `cmd`
--
ALTER TABLE `cmd`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'clé primaire (num)';

--
-- AUTO_INCREMENT pour la table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT pour la table `ligne_cmd`
--
ALTER TABLE `ligne_cmd`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'clé primaire';

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `category` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `clients`
--
ALTER TABLE `clients`
  ADD CONSTRAINT `address` FOREIGN KEY (`address_id`) REFERENCES `address` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `cmd`
--
ALTER TABLE `cmd`
  ADD CONSTRAINT `addr` FOREIGN KEY (`address_id`) REFERENCES `address` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `img` FOREIGN KEY (`article_id`) REFERENCES `article` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Contraintes pour la table `ligne_cmd`
--
ALTER TABLE `ligne_cmd`
  ADD CONSTRAINT `article` FOREIGN KEY (`article_id`) REFERENCES `article` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `cmd` FOREIGN KEY (`cmd_id`) REFERENCES `cmd` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
