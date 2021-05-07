-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 07 mai 2021 à 11:46
-- Version du serveur :  10.4.17-MariaDB
-- Version de PHP : 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `chatapp`
--

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

CREATE TABLE `messages` (
  `msg_id` int(11) NOT NULL,
  `incoming_msg_id` int(255) NOT NULL,
  `outgoing_msg_id` int(255) NOT NULL,
  `msg` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`msg_id`, `incoming_msg_id`, `outgoing_msg_id`, `msg`) VALUES
(1, 962865673, 259842904, 'salut'),
(2, 259842904, 962865673, 'ça va ou quoi '),
(3, 259842904, 1439391653, 'wesh'),
(4, 962865673, 375655793, 'salut'),
(5, 375655793, 1439391653, 'ezfze'),
(6, 375655793, 1439391653, 'salut*'),
(7, 375655793, 1439391653, 'mais quel gogole'),
(8, 375655793, 1439391653, 'c\'est toi la gogole'),
(9, 1439391653, 375655793, 'nan c\'est toi'),
(10, 375655793, 1439391653, 'mais t\'es une gamine en vrai'),
(11, 1439391653, 375655793, 'j\'avoue, surtout qu\'on est la même personne, trop chelou'),
(12, 375655793, 1439391653, 'vas-y tu m\'as soulé');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `unique_id` int(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`user_id`, `unique_id`, `fname`, `lname`, `email`, `password`, `img`, `status`) VALUES
(1, 962865673, 'Maud', 'Gautier', 'gautier.maud01@gmail.com', '4c4770bf15255be4b5d69ff6d7981ac0', '1620138804IMG_0165.jpeg', 'Active now'),
(2, 259842904, 'Loicia', 'Saint Felix', 'loicia.saintfelix@hetic.net', '4c4770bf15255be4b5d69ff6d7981ac0', '1620138903maud gautier.jpg', 'Offline now'),
(3, 1439391653, 'Loïcia', 'Saint-Félix', 'saint-felix_loicia@hotmail.fr', '4b805fbcec5d0b3c7eb5c4a093d489d8', '16201606905aedc3397cf6e532c09a7c9f07ccabbb.jpg', 'En ligne'),
(4, 375655793, 'Amanda', 'Saint-Félix', 'saintfelix.loicia@gmail.com', '4b805fbcec5d0b3c7eb5c4a093d489d8', '1620163757b92bcb88bd_50157864_premier-neurone-artificiel.jpg', 'Active now');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`msg_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `messages`
--
ALTER TABLE `messages`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
