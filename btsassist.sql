-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 02 juin 2022 à 15:16
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `btsassist`
--

DELIMITER $$
--
-- Procédures
--
DROP PROCEDURE IF EXISTS `getEmailCorrespond`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `getEmailCorrespond` (IN `p_email` VARCHAR(100))  BEGIN
	SELECT * 
    FROM utilisateurs
    WHERE email = p_email;
END$$

DROP PROCEDURE IF EXISTS `getListeBts`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `getListeBts` ()  BEGIN
	SELECT *
    FROM bts
    ORDER BY id_bts ASC;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `id_article` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `contenu` text NOT NULL,
  `date_creation` datetime NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `image_article` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_article`)
) ENGINE=MyISAM AUTO_INCREMENT=67 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id_article`, `titre`, `contenu`, `date_creation`, `id_utilisateur`, `image_article`) VALUES
(65, 'Nouvel exercice !', 'Bonjour, j\'ai mit en ligne un nouvel exercice de math pour les BTS SIO, entrainez-vous !', '2022-05-24 09:27:16', 28, NULL),
(63, 'Bienvenue !', 'Bonjour à tous et bienvenue sur le site web BtsAssist', '2022-04-06 14:08:55', 28, NULL),
(66, 'Vacances !', 'C\'est les vacances ! Profitez tous bien de vos vacances mais pensez à travailler vos cours sur le site !', '2022-05-24 11:48:34', 28, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `bts`
--

DROP TABLE IF EXISTS `bts`;
CREATE TABLE IF NOT EXISTS `bts` (
  `id_bts` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(255) NOT NULL,
  PRIMARY KEY (`id_bts`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `bts`
--

INSERT INTO `bts` (`id_bts`, `libelle`) VALUES
(2, 'BTS MCO'),
(3, 'BTS NDRC'),
(1, 'BTS SIO');

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

DROP TABLE IF EXISTS `commentaires`;
CREATE TABLE IF NOT EXISTS `commentaires` (
  `id_commentaire` int(11) NOT NULL AUTO_INCREMENT,
  `contenu` text NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `date_creation` datetime NOT NULL,
  `id_article` int(11) NOT NULL,
  PRIMARY KEY (`id_commentaire`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `commentaires`
--

INSERT INTO `commentaires` (`id_commentaire`, `contenu`, `id_utilisateur`, `date_creation`, `id_article`) VALUES
(36, 'Merci bonne vacances à vous aussi', 27, '2022-05-24 14:14:43', 66);

-- --------------------------------------------------------

--
-- Structure de la table `cours`
--

DROP TABLE IF EXISTS `cours`;
CREATE TABLE IF NOT EXISTS `cours` (
  `id_cours` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `contenu` varchar(255) NOT NULL,
  `id_matiere_bts` int(11) NOT NULL,
  PRIMARY KEY (`id_cours`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `cours`
--

INSERT INTO `cours` (`id_cours`, `titre`, `contenu`, `id_matiere_bts`) VALUES
(18, 'Chapitre 3 : Modèle entité association', '16.pdf', 7),
(19, 'Chapitre 4 : MySQL', '19.pdf', 7),
(6, 'Chapitre 1 : HTML / CSS', '10.pdf', 7),
(20, 'Chapitre 1 : Numération', '20.pdf', 1),
(15, 'Chapitre 2 : PHP', '15.pdf', 7);

-- --------------------------------------------------------

--
-- Structure de la table `exercices`
--

DROP TABLE IF EXISTS `exercices`;
CREATE TABLE IF NOT EXISTS `exercices` (
  `id_exercice` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `id_cours` int(11) NOT NULL,
  PRIMARY KEY (`id_exercice`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `exercices`
--

INSERT INTO `exercices` (`id_exercice`, `titre`, `id_cours`) VALUES
(9, 'Exercice d\'entrainement au PHP', 15);

-- --------------------------------------------------------

--
-- Structure de la table `matieres_bts`
--

DROP TABLE IF EXISTS `matieres_bts`;
CREATE TABLE IF NOT EXISTS `matieres_bts` (
  `id_matiere_bts` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(255) NOT NULL,
  `id_bts` int(11) NOT NULL,
  `id_option` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_matiere_bts`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `matieres_bts`
--

INSERT INTO `matieres_bts` (`id_matiere_bts`, `libelle`, `id_bts`, `id_option`) VALUES
(1, 'Mathématiques SIO', 1, NULL),
(3, 'Culture générale et expression MCO', 2, NULL),
(4, 'Anglais SIO', 1, NULL),
(5, 'Anglais MCO', 2, NULL),
(6, 'Culture économique juridique et managériale SIO', 1, NULL),
(7, 'Développement informatique', 1, 1),
(8, 'Système et réseaux', 1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `notes`
--

DROP TABLE IF EXISTS `notes`;
CREATE TABLE IF NOT EXISTS `notes` (
  `id_note` int(11) NOT NULL AUTO_INCREMENT,
  `note` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `id_exercice` int(11) NOT NULL,
  `date_note` datetime DEFAULT NULL,
  PRIMARY KEY (`id_note`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `notes`
--

INSERT INTO `notes` (`id_note`, `note`, `id_utilisateur`, `id_exercice`, `date_note`) VALUES
(17, 8, 27, 9, '2022-05-24 12:29:34'),
(16, 5, 27, 9, '2022-05-24 12:29:34'),
(15, 8, 27, 9, '2022-05-24 12:29:34'),
(14, 10, 27, 9, '2022-05-24 12:29:34');

-- --------------------------------------------------------

--
-- Structure de la table `options`
--

DROP TABLE IF EXISTS `options`;
CREATE TABLE IF NOT EXISTS `options` (
  `id_option` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(255) NOT NULL,
  `id_bts` int(11) NOT NULL,
  PRIMARY KEY (`id_option`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `options`
--

INSERT INTO `options` (`id_option`, `libelle`, `id_bts`) VALUES
(1, 'SLAM', 1),
(2, 'SISR', 1);

-- --------------------------------------------------------

--
-- Structure de la table `questions`
--

DROP TABLE IF EXISTS `questions`;
CREATE TABLE IF NOT EXISTS `questions` (
  `id_question` int(11) NOT NULL AUTO_INCREMENT,
  `question` varchar(255) NOT NULL,
  `id_exercice` int(11) NOT NULL,
  PRIMARY KEY (`id_question`)
) ENGINE=MyISAM AUTO_INCREMENT=91 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `questions`
--

INSERT INTO `questions` (`id_question`, `question`, `id_exercice`) VALUES
(89, 'A quoi correspond l\'opérateur || ?', 9),
(88, 'Quelle est la commande qui permet d\'inclure un fichier dans un autre ?', 9),
(87, 'Quel est le moyen correct de créer une fonction en PHP?', 9),
(86, 'Par quel moyen afficher du texte en php ?', 9),
(85, ' Quel est le moyen correct de commencer un commentaire sur une seule ligne?', 9),
(84, 'Les variables en PHP commencent avec...?', 9),
(83, 'Que signifie un point-virgule?', 9),
(90, 'Quelle fonction crée un cookie ?', 9),
(82, ' Quelle extension est l\'extension de fichier PHP correcte?', 9),
(81, 'Que signifie PHP?', 9);

-- --------------------------------------------------------

--
-- Structure de la table `reponses`
--

DROP TABLE IF EXISTS `reponses`;
CREATE TABLE IF NOT EXISTS `reponses` (
  `id_reponse` int(11) NOT NULL AUTO_INCREMENT,
  `reponse` varchar(255) NOT NULL,
  `statut` int(11) NOT NULL,
  `id_question` int(11) NOT NULL,
  PRIMARY KEY (`id_reponse`)
) ENGINE=MyISAM AUTO_INCREMENT=361 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `reponses`
--

INSERT INTO `reponses` (`id_reponse`, `reponse`, `statut`, `id_question`) VALUES
(349, 'include', 1, 88),
(350, 'included', 0, 88),
(351, 'in', 0, 88),
(352, 'inside', 0, 88),
(353, 'au OU logique', 1, 89),
(354, 'au ET logique', 0, 89),
(355, 'au XOR logique', 0, 89),
(356, 'n\'existe pas', 0, 89),
(357, 'setcookie()', 1, 90),
(358, 'set_cookie()', 0, 90),
(359, 'set()', 0, 90),
(360, 'cookie()', 0, 90),
(348, 'myFunction()', 0, 87),
(347, 'new myFunction', 0, 87),
(346, 'create myFunction()', 0, 87),
(345, 'function myFunction()', 1, 87),
(343, 'dire', 0, 86),
(344, 'print', 0, 86),
(342, 'text', 0, 86),
(341, 'echo', 1, 86),
(340, '/', 0, 85),
(339, '!!', 0, 85),
(338, '#', 0, 85),
(337, '//', 1, 85),
(336, '&', 0, 84),
(335, 'var', 0, 84),
(334, 'variable', 0, 84),
(333, '$', 1, 84),
(332, 'Le début de PHP bloc de script', 0, 83),
(331, 'La fin de PHP déclaration et instruction', 0, 83),
(330, 'Le début de PHP déclaration et instruction', 0, 83),
(329, 'La fin de PHP bloc de script', 1, 83),
(328, 'html', 0, 82),
(327, 'pxp', 0, 82),
(326, 'cpp', 0, 82),
(325, 'php', 1, 82),
(324, 'Preprocessed Hypertext Page', 0, 81),
(323, 'Hypertext Transfer Protocol', 0, 81),
(322, 'Personal Home Page', 0, 81),
(321, 'PHP: Hypertext Preprocessor', 1, 81);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `id_role` int(11) NOT NULL DEFAULT '1',
  `mention_legale` tinyint(1) NOT NULL,
  `date_creation` datetime NOT NULL,
  `token` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`id_utilisateur`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id_utilisateur`, `nom`, `prenom`, `pseudo`, `email`, `mdp`, `avatar`, `id_role`, `mention_legale`, `date_creation`, `token`) VALUES
(10, 'loris', 'loris', 'loris', 'loris@test.fr', '$2y$10$F3MOi/mIJgQvYoV8I1LHZuElrGnpGlpmEy.y0Dj279Whw/j2lCt9K', '10.png', 3, 1, '2021-12-06 12:19:47', 'LywuMSmvGRW5GNwvij95D3LrYIaMIPBd6Cn6WBtG6mBcX8ZtRvyrV5QrRdMl'),
(29, 'admin', 'admin', 'admin', 'admin@gmail.com', '$2y$10$QwLyriD8ugWo28WplkQZTuV0z9TrTo.RdtycfTQ.SfEqafmT0HoTW', NULL, 3, 1, '2022-04-12 09:42:09', NULL),
(27, 'eleve', 'eleve', 'eleve', 'eleve@gmail.com', '$2y$10$vlTouUMqajmeAkqexUlP7OUmP55pG6mzzTE3c2oho.stNQ0bzWVG6', NULL, 1, 1, '2022-04-12 09:39:54', NULL),
(28, 'professeur', 'professeur', 'professeur', 'professeur@gmail.com', '$2y$10$jSyUdYdagChxDcMBjt2CcOQNk8N.PIH3DsATHRKPMeQaZSjrmO0Ai', NULL, 2, 1, '2022-04-12 09:41:07', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
