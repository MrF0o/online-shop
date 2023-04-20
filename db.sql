-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2023 at 12:24 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projet`
--
CREATE DATABASE IF NOT EXISTS `projet` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `projet`;

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `id` int(11) NOT NULL,
  `address_line_1` text NOT NULL,
  `address_line_2` text DEFAULT NULL,
  `postal_code` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `address`:
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `admins`:
--

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`) VALUES
(1, 'admin', '698d51a19d8a121ce581499d7b701668');

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL COMMENT 'clé primaire',
  `title` varchar(255) NOT NULL COMMENT 'le titre de l''article',
  `description` text NOT NULL COMMENT 'le description de l''article',
  `prix` int(11) NOT NULL,
  `category_id` int(11) NOT NULL COMMENT 'clé secondaire pour la table categories'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `article`:
--   `category_id`
--       `categories` -> `id`
--

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`id`, `title`, `description`, `prix`, `category_id`) VALUES
(24, 'Article 1', 'Suspendisse condimentum magna at posuere accumsan. Donec lorem nunc, vestibulum vel sagittis a, malesuada ut nibh. Integer a lorem lectus. Nulla massa lectus, scelerisque sit amet neque quis, cursus sodales ipsum. Nunc in nisl at justo hendrerit bibendum. Pellentesque bibendum porta nisi et tempor. Nullam leo elit, tempus eget augue eget, maximus porta nulla. Curabitur suscipit tellus vitae ullamcorper pretium. Cras at sapien eu lorem tempus condimentum vitae at risus. Vestibulum ultricies nec tellus eget semper. In in maximus quam. Curabitur pulvinar tincidunt dui, ut maximus augue molestie et. Maecenas pretium nisi eget quam molestie, blandit varius urna semper.', 120, 11),
(25, 'Bague Exemple produit', 'Suspendisse condimentum magna at posuere accumsan. Donec lorem nunc, vestibulum vel sagittis a, malesuada ut nibh. Integer a lorem lectus. Nulla massa lectus, scelerisque sit amet neque quis, cursus sodales ipsum. Nunc in nisl at justo hendrerit bibendum. Pellentesque bibendum porta nisi et tempor. Nullam leo elit, tempus eget augue eget, maximus porta nulla. Curabitur suscipit tellus vitae ullamcorper pretium. Cras at sapien eu lorem tempus condimentum vitae at risus. Vestibulum ultricies nec tellus eget semper. In in maximus quam. Curabitur pulvinar tincidunt dui, ut maximus augue molestie et. Maecenas pretium nisi eget quam molestie, blandit varius urna semper.', 300, 12),
(26, 'Test product', 'Suspendisse condimentum magna at posuere accumsan. Donec lorem nunc, vestibulum vel sagittis a, malesuada ut nibh. Integer a lorem lectus. Nulla massa lectus, scelerisque sit amet neque quis, cursus sodales ipsum. Nunc in nisl at justo hendrerit bibendum. Pellentesque bibendum porta nisi et tempor. Nullam leo elit, tempus eget augue eget, maximus porta nulla. Curabitur suscipit tellus vitae ullamcorper pretium. Cras at sapien eu lorem tempus condimentum vitae at risus. Vestibulum ultricies nec tellus eget semper. In in maximus quam. Curabitur pulvinar tincidunt dui, ut maximus augue molestie et. Maecenas pretium nisi eget quam molestie, blandit varius urna semper.', 35, 12),
(27, 'Article For testing', 'Suspendisse condimentum magna at posuere accumsan. Donec lorem nunc, vestibulum vel sagittis a, malesuada ut nibh. Integer a lorem lectus. Nulla massa lectus, scelerisque sit amet neque quis, cursus sodales ipsum. Nunc in nisl at justo hendrerit bibendum. Pellentesque bibendum porta nisi et tempor. Nullam leo elit, tempus eget augue eget, maximus porta nulla. Curabitur suscipit tellus vitae ullamcorper pretium. Cras at sapien eu lorem tempus condimentum vitae at risus. Vestibulum ultricies nec tellus eget semper. In in maximus quam. Curabitur pulvinar tincidunt dui, ut maximus augue molestie et. Maecenas pretium nisi eget quam molestie, blandit varius urna semper.', 200, 12);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `label` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `categories`:
--

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `label`) VALUES
(11, 'Homme'),
(12, 'Femme'),
(13, 'Bagues Unisexe');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL COMMENT 'clé primaire',
  `address_id` int(11) DEFAULT NULL COMMENT 'clé etrangére pour la table addresses',
  `frst_name` varchar(255) DEFAULT NULL COMMENT 'prenom',
  `last_name` varchar(255) DEFAULT NULL COMMENT 'nom',
  `email` varchar(255) NOT NULL,
  `password` text NOT NULL COMMENT 'mots de passe crypté'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `clients`:
--   `address_id`
--       `address` -> `id`
--

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `address_id`, `frst_name`, `last_name`, `email`, `password`) VALUES
(1, NULL, 'Fathi', 'Helmi', 'fake@email.com', '098f6bcd4621d373cade4e832627b4f6');

-- --------------------------------------------------------

--
-- Table structure for table `cmd`
--

CREATE TABLE `cmd` (
  `id` int(11) NOT NULL COMMENT 'clé primaire (num)',
  `date` date NOT NULL COMMENT 'la date de passation',
  `address_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `cmd`:
--   `address_id`
--       `address` -> `id`
--

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `path` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='les image de l''article';

--
-- RELATIONSHIPS FOR TABLE `images`:
--   `article_id`
--       `article` -> `id`
--

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `article_id`, `path`) VALUES
(7, 24, '../images/upload/acb9a6b1c5b4606182d5b543cfaf0e3baee7217ctest-img-4.png'),
(8, 25, '../images/upload/6f9920846edbc98644169674e914bfb9cf4ff79ftest-img-2.png'),
(9, 26, '../images/upload/298023b8cbcdb05d3228dbd5e0ad74471bf22c21test-img.png'),
(10, 27, '../images/upload/55adb281fb1df8a47497a9fe52f398002edd70c7image.png');

-- --------------------------------------------------------

--
-- Table structure for table `ligne_cmd`
--

CREATE TABLE `ligne_cmd` (
  `id` int(11) NOT NULL COMMENT 'clé primaire',
  `cmd_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Association Ligne-CMD';

--
-- RELATIONSHIPS FOR TABLE `ligne_cmd`:
--   `article_id`
--       `article` -> `id`
--   `cmd_id`
--       `cmd` -> `id`
--

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category` (`category_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `address` (`address_id`);

--
-- Indexes for table `cmd`
--
ALTER TABLE `cmd`
  ADD PRIMARY KEY (`id`),
  ADD KEY `addr` (`address_id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `img` (`article_id`);

--
-- Indexes for table `ligne_cmd`
--
ALTER TABLE `ligne_cmd`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cmd` (`cmd_id`),
  ADD KEY `article` (`article_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'clé primaire', AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'clé primaire', AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cmd`
--
ALTER TABLE `cmd`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'clé primaire (num)';

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `ligne_cmd`
--
ALTER TABLE `ligne_cmd`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'clé primaire';

--
-- Constraints for dumped tables
--

--
-- Constraints for table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `category` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `clients`
--
ALTER TABLE `clients`
  ADD CONSTRAINT `address` FOREIGN KEY (`address_id`) REFERENCES `address` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `cmd`
--
ALTER TABLE `cmd`
  ADD CONSTRAINT `addr` FOREIGN KEY (`address_id`) REFERENCES `address` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `img` FOREIGN KEY (`article_id`) REFERENCES `article` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `ligne_cmd`
--
ALTER TABLE `ligne_cmd`
  ADD CONSTRAINT `article` FOREIGN KEY (`article_id`) REFERENCES `article` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `cmd` FOREIGN KEY (`cmd_id`) REFERENCES `cmd` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;


--
-- Metadata
--
USE `phpmyadmin`;

--
-- Metadata for table address
--

--
-- Metadata for table admins
--

--
-- Metadata for table article
--

--
-- Metadata for table categories
--

--
-- Metadata for table clients
--

--
-- Metadata for table cmd
--

--
-- Metadata for table images
--

--
-- Metadata for table ligne_cmd
--

--
-- Metadata for database projet
--
SET FOREIGN_KEY_CHECKS=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
