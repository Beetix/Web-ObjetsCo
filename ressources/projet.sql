-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Dim 10 Mai 2015 à 14:02
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `projet`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE IF NOT EXISTS `articles` (
  `article_id` int(11) NOT NULL AUTO_INCREMENT,
  `utilisateur_id` int(11) NOT NULL,
  `article_titre` varchar(80) NOT NULL,
  `article_stitre` varchar(100) NOT NULL,
  `article_contenu` text NOT NULL,
  `article_date` timestamp NOT NULL,
  PRIMARY KEY (`article_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `articles`
--

INSERT INTO `articles` (`article_id`, `utilisateur_id`, `article_titre`, `article_stitre`, `article_contenu`, `article_date`) VALUES
(1, 1, 'titre_test', 'stitre_test', 'contenu_test', '2015-05-09 22:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

CREATE TABLE IF NOT EXISTS `commentaires` (
  `com_id` int(11) NOT NULL AUTO_INCREMENT,
  `com_date` timestamp NOT NULL,
  `com_contenu` varchar(500) NOT NULL,
  `com_ref_auteur_id` int(11) NOT NULL,
  `com_ref_article_id` int(11) NOT NULL,
  `com_titre` varchar(100) NOT NULL,
  PRIMARY KEY (`com_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `commentaires`
--

INSERT INTO `commentaires` (`com_id`, `com_date`, `com_contenu`, `com_ref_auteur_id`, `com_ref_article_id`, `com_titre`) VALUES
(1, '2015-05-10 06:00:00', 'contenu_test', 1, 1, 'titre_test'),
(3, '2015-05-10 11:49:08', 'com_2_test', 1, 1, 'com_2'),
(4, '2015-05-10 11:54:22', 'com_3_test', 1, 1, 'com_3');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `utilisateur_id` int(11) NOT NULL AUTO_INCREMENT,
  `utilisateur_name` varchar(30) NOT NULL,
  `utilisateur_mdp` varchar(15) NOT NULL,
  `utilisateur_pseudo` varchar(30) NOT NULL,
  `utilisateur_mail` varchar(60) NOT NULL,
  `utilisateur_desc` varchar(800) NOT NULL,
  `webmaster` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`utilisateur_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`utilisateur_id`, `utilisateur_name`, `utilisateur_mdp`, `utilisateur_pseudo`, `utilisateur_mail`, `utilisateur_desc`, `webmaster`) VALUES
(1, 'u_test', 'mdp_test', 'pseudo_test', 'mail@test.com', 'desc_test', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
