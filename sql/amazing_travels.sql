-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  jeu. 10 mai 2018 à 20:01
-- Version du serveur :  10.1.30-MariaDB
-- Version de PHP :  7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `amazing_travels`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `id` int(4) NOT NULL,
  `category` int(3) NOT NULL,
  `content` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(300) NOT NULL,
  `last_author` int(4) NOT NULL,
  `last_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id`, `category`, `content`, `image`, `title`, `description`, `last_author`, `last_date`) VALUES
(3, 2, 'Certains pays recellent d\'un patrimoine culturel, historique et g&eacute;ographique d\'exception : la France fait partie des chefs de file de cette liste.\r\nLa gastronomie, la mode, les monuments, les r&eacute;gions sont quantit&eacute;s d\'&eacute;l&eacute;ments qui font la force du patrimoine fran&ccedil;ais. L\'Hexagone compte des adresses &agrave; visiter &agrave; tout prix : entre terre et mer, nature et ville, tous les go&ucircts s\'y retrouvent.\r\nComme parcourir la France est la garantie d\'un voyage r&eacute;ussi, nous vous proposons la visite d\'adresses incontournables du territoire :\r\nD&eacute;couvrez les secrets et lieux cach&eacute;s de Paris ; l\'atmosph&egrave;re royale de Versailles ; les falaises de Normandie et le Mont Saint-Michel ; la charme m&eacute;diterran&eacute;en de la C&ocirc;te d\'Azur ; la Gironde avec son vignoble, ses dunes et ses plages de sable fin ; les massifs et volcans d\'Auvergne ; Strasbourg avec ses maisons &agrave; colombages, ses tanneries, ses canneaux et sa gastronomie alsacienne.', '', 'Destinations France', 'Faites le tour de la France et de ses adresses incontournables.', 1, '2018-04-16 21:40:04'),
(4, 1, 'En alliant vos idÃ©es et notre expÃ©rience, nous allons concevoir le voyage qui vous correspondra parfaitement et dont vous garderez un souvenir impÃ©rissable. Tels des orfÃ¨vres, nous en soignons chaque facette : vous visiterez les plus belles adresses, utiliserez les transports les plus agrÃ©ables, goÃ»terez Ã  des plats uniques et profiterez d\'hÃ´tels de haut-rang. Si vous dÃ©sirez vivre des expÃ©riences authentiques et insolites, n\'attendez plus... Poussez la porte de notre agence et le voyage commencera ici.', '', 'Circuits sur mesure', 'Concevez votre propre voyage !', 1, '2018-05-10 17:55:07'),
(5, 2, 'Vous rÃªvez d\'Ã©vasion, de parcourir le monde ou de vivre de nouvelles expÃ©riences ? Alors n\'hÃ©sitez plus, laissez vous tenter par nos &quot;destinations internationales&quot; : Parcourez au choix l\'Europe, l\'Afrique, l\'AmÃ©rique, l\'Asie ou l\'OcÃ©anie. Nous vous garantissons des voyages Ã©poustouflants, riches en dÃ©couvertes, qui laisseront en vous un souvenir durable.', '', 'Destinations internationales', 'Laissez vous surprendre par nos destinations les plus originales ! Plus de 200 pays Ã  la carte !', 1, '2018-05-10 17:54:33'),
(6, 1, 'Choisissez le circuit qui vous convient parmi nos sÃ©lections. Si vous souhaitez dÃ©couvrir les diffÃ©rentes saveurs du monde, alors le circuit gastronomie est fait pour vous.&lt;br/&gt;Vous Ãªtes plutÃ´t d\'humeur aventurier(e), optez pour le circuit dÃ©couverte !&lt;br/&gt; Enfin, vous prÃ©fÃ©rez enrichir votre culture gÃ©nÃ©rale alors notre circuit culturel vous tend les bras. &lt;br/&gt;Voyage, culture, ou gastronomie ? N\'attendez plus : nous avons le circuit qu\'il vous faut !', '', 'Circuit thematique', 'DÃ©couvrez des sites d\'exception, ouvrez votre esprit et partagez des moments fabuleux !', 1, '2018-05-10 18:38:03');

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE `category` (
  `id` int(3) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'circuit'),
(2, 'sejour');

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE `message` (
  `id` int(6) NOT NULL,
  `creator` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `mail` varchar(40) NOT NULL,
  `subject` varchar(40) NOT NULL,
  `content` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `message`
--

INSERT INTO `message` (`id`, `creator`, `phone`, `mail`, `subject`, `content`) VALUES
(1, 'Testeur', '00000000', 'test@php.com', 'demande_contact', 'Recontactez moi !'),
(2, 'Testeur', '00000000', 'test@php.com', 'demande_contact', 'ffffffff'),
(3, 'ter', '44', 'test@php.com', 'demande_info', 'DDDDD'),
(4, 'ter', '00', '00', 'demande_contact', 'abcd'),
(5, 'Testeur', '00', 'test@php.com', 'demande_contact', 'FF'),
(6, 'AmÃ©lien', '06', 'test@php.com', 'demande_contact', 'gg'),
(7, 'Testeur', '12', 'test@php.com', 'demande_contact', ''),
(8, 'Testeur', '12', 'test@php.com', 'demande_contact', '234'),
(9, 'Testeur', '33', 'test@php.com', 'demande_contact', '234{ty%'),
(10, 'Testeur', '22', 'test@php.com', 'demande_contact', '234 % { '),
(11, 'AmÃ©lien', '0011223344', 'amelien.tyson@gmail.com', 'demande_contact', 'Hello ! How are you ?'),
(12, 'AmÃ©lien', '0011223344', 'amelien.tyson@gmail.com', 'demande_contact', 'Hello ! How are you ?'),
(13, 'AmÃ©lien', '0011223344', 'amelien.tyson@gmail.com', 'demande_contact', 'Hello ! How are you ?'),
(14, 'Hello', '00', 'test@php.com', 'demande_contact', 'OUI OOUI OUI'),
(15, 'Testeur', '00', 'test@php.com', 'demande_contact', 'fff'),
(16, 'dd', '11', 'test@php.com', 'demande_contact', 'dd'),
(17, 'dd', '11', 'test@php.com', 'demande_contact', 'dd'),
(18, 'dd', '11', 'test@php.com', 'demande_contact', 'dd'),
(19, 'dd', '11', 'test@php.com', 'demande_contact', 'dd'),
(20, 'dd', '11', 'test@php.com', 'demande_contact', 'dd'),
(21, 'dd', '11', 'test@php.com', 'demande_contact', 'dd'),
(22, 'dd', '11', 'test@php.com', 'demande_contact', 'dd'),
(27, 'dd', '11', 'test@php.com', 'demande_contact', 'dd'),
(28, 'dd', '11', 'test@php.com', 'demande_contact', 'dd'),
(29, 'dd', '11', 'test@php.com', 'demande_contact', 'dd'),
(30, 'dd', '11', 'test@php.com', 'demande_contact', 'dd'),
(31, 'dd', '11', 'test@php.com', 'demande_contact', 'dd'),
(32, 'dd', '11', 'test@php.com', 'demande_contact', 'dd'),
(33, 'dd', '11', 'test@php.com', 'demande_contact', 'dd'),
(34, 'dd', '11', 'test@php.com', 'demande_contact', 'dd'),
(35, 'dd', '11', 'test@php.com', 'demande_contact', 'dd'),
(36, 'dd', '11', 'test@php.com', 'demande_contact', 'dd'),
(37, 'AmÃ©lien', '00000000', 'test@php.com', 'demande_info', 'T'),
(38, 'AmÃ©lien', '0673000000', 'test@php.com', 'demande_info', 'RR'),
(39, 'Testeur', '00', 'test@php.com', 'demande_contact', 'd'),
(40, 'ter', '00', 'test@php.com', 'demande_contact', 't'),
(41, 'AmÃ©lien', '0673000000', 'test@php.com', 'demande_info', 'RR');

-- --------------------------------------------------------

--
-- Structure de la table `review`
--

CREATE TABLE `review` (
  `id` int(4) NOT NULL,
  `id_article` int(4) NOT NULL,
  `id_user` int(4) NOT NULL,
  `review_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(4) NOT NULL,
  `login` varchar(50) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL,
  `join_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `login`, `first_name`, `last_name`, `email`, `password`, `role`, `join_date`) VALUES
(1, 'AmelienC', 'Amélien', 'COCHER', 'amelien.tyson@gmail.com', 'Volodia0', 'admin', '2018-04-02 17:06:08'),
(2, 'philippe', 'Philippe', 'Bouquet', 'netpresta@gmail.com', 'Phil-2016', 'admin', '2018-05-03 22:42:47'),
(3, 'fatou', 'Fatoumata', 'Seck', 'fatoumata.seck.auditeur@lecnam.net', 'Fatou-2018', 'admin', '2018-05-04 20:19:38');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category` (`category`),
  ADD KEY `id_author` (`last_author`);

--
-- Index pour la table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_article` (`id_article`),
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT pour la table `review`
--
ALTER TABLE `review`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `article_ibfk_1` FOREIGN KEY (`category`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `article_ibfk_2` FOREIGN KEY (`last_author`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `review_ibfk_2` FOREIGN KEY (`id_article`) REFERENCES `article` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
