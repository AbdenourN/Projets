-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 19 jan. 2023 à 22:10
-- Version du serveur : 10.4.22-MariaDB
-- Version de PHP : 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `sae`
--

-- --------------------------------------------------------

--
-- Structure de la table `bos`
--

CREATE TABLE `bos` (
  `BOS_ID` int(11) NOT NULL,
  `Document_ID` int(11) DEFAULT NULL,
  `Status` varchar(20) DEFAULT NULL,
  `BOS_FLAG` tinyint(4) DEFAULT NULL,
  `Personnel_ID` int(11) DEFAULT NULL,
  `Date_modif` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `bos`
--

INSERT INTO `bos` (`BOS_ID`, `Document_ID`, `Status`, `BOS_FLAG`, `Personnel_ID`, `Date_modif`) VALUES
(1, 1, 'Validé', 1, NULL, NULL),
(2, 2, 'Non analysé', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE `commentaire` (
  `Commentaire_ID` int(11) NOT NULL,
  `Visibility_Flag` tinyint(4) DEFAULT NULL,
  `Enseignant_ID` int(11) DEFAULT NULL,
  `Document_ID` int(11) DEFAULT NULL,
  `Personnel_ID` int(11) DEFAULT NULL,
  `Vue_Flag` tinyint(4) DEFAULT NULL,
  `Commentaire` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `commentaire`
--

INSERT INTO `commentaire` (`Commentaire_ID`, `Visibility_Flag`, `Enseignant_ID`, `Document_ID`, `Personnel_ID`, `Vue_Flag`, `Commentaire`) VALUES
(1, 0, NULL, 1, 2, NULL, 'chghgfhfhgf');

-- --------------------------------------------------------

--
-- Structure de la table `document`
--

CREATE TABLE `document` (
  `Document_ID` int(11) NOT NULL,
  `Type` varchar(20) DEFAULT NULL,
  `Student_ID` int(11) DEFAULT NULL,
  `Date_heure` datetime DEFAULT NULL,
  `URL` varchar(200) DEFAULT NULL,
  `Version` int(11) DEFAULT NULL,
  `Document_FLAG` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `document`
--

INSERT INTO `document` (`Document_ID`, `Type`, `Student_ID`, `Date_heure`, `URL`, `Version`, `Document_FLAG`) VALUES
(1, 'BOS', 18, '2023-01-08 10:00:00', 'file/BOS/exemple.pdf', 1, 1),
(2, 'BOS', 45, '2023-01-08 10:00:00', 'file/BOS/exemple.pdf', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `entreprise`
--

CREATE TABLE `entreprise` (
  `Entreprise_ID` int(11) NOT NULL,
  `Nom` varchar(20) DEFAULT NULL,
  `Description` varchar(50) DEFAULT NULL,
  `Adresse` varchar(20) DEFAULT NULL,
  `Lieu` varchar(20) DEFAULT NULL,
  `Telephone` int(11) DEFAULT NULL,
  `Entreprise_FLAG` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

CREATE TABLE `etudiant` (
  `Student_ID` int(11) NOT NULL,
  `Nom` varchar(20) DEFAULT NULL,
  `Prenom` varchar(20) DEFAULT NULL,
  `Mail` varchar(30) DEFAULT NULL,
  `Stage_detention` tinyint(1) DEFAULT NULL,
  `Visibility_flag` tinyint(4) DEFAULT NULL,
  `Entreprise_ID` int(11) DEFAULT NULL,
  `Groupe_ID` int(11) DEFAULT NULL,
  `Personnel_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `etudiant`
--

INSERT INTO `etudiant` (`Student_ID`, `Nom`, `Prenom`, `Mail`, `Stage_detention`, `Visibility_flag`, `Entreprise_ID`, `Groupe_ID`, `Personnel_ID`) VALUES
(0, 'Abed', 'Rayane', 'mail@gmail.com', 1, 1, NULL, 2, NULL),
(1, 'Alili', 'Amney', 'mail@gmail.com', 1, 1, NULL, 1, NULL),
(2, 'Allonsius', 'Ahmed', 'mail@gmail.com', 1, 1, NULL, 2, NULL),
(3, 'Alloune', 'Aymen', 'mail@gmail.com', 0, 1, NULL, 2, NULL),
(4, 'Andriamisa', 'Nayann', 'mail@gmail.com', 1, 1, NULL, 3, NULL),
(5, 'Andriatsahavojaona', 'Ony', 'mail@gmail.com', 0, 1, NULL, 1, NULL),
(6, 'Arrar', 'Riyad', 'mail@gmail.com', 0, 1, NULL, 3, NULL),
(7, 'Aubert', 'Cleante', 'mail@gmail.com', 1, 1, NULL, 3, NULL),
(9, 'Balendran', 'Angela', 'mail@gmail.com', 1, 1, NULL, 2, NULL),
(10, 'Baskaran', 'Sarujan', 'mail@gmail.com', 0, 1, NULL, 1, NULL),
(11, 'Bellagraa', 'Yassine', 'mail@gmail.com', 0, 1, NULL, 3, NULL),
(12, 'Benaissa', 'Younes', 'mail@gmail.com', 1, 1, NULL, 3, NULL),
(13, 'Botseke ongagna', 'Joe', 'mail@gmail.com', 1, 1, NULL, 3, NULL),
(14, 'Boudarga', 'Othman', 'mail@gmail.com', 0, 1, NULL, 1, NULL),
(15, 'Bousserhane', 'Salma', 'mail@gmail.com', 0, 1, NULL, 2, NULL),
(16, 'Boyaval', 'Maxime', 'mail@gmail.com', 1, 1, NULL, 1, NULL),
(17, 'Breville', 'Alexandre', 'mail@gmail.com', 0, 1, NULL, 3, NULL),
(18, 'Buzura', 'Darius', 'mail@gmail.com', 0, 1, NULL, 3, NULL),
(19, 'Caillaud', 'Maxime', 'mail@gmail.com', 1, 1, NULL, 2, NULL),
(20, 'Camara', 'Moustapha', 'mail@gmail.com', 0, 1, NULL, 1, NULL),
(21, 'Chami', 'Bilal', 'mail@gmail.com', 1, 1, NULL, 1, NULL),
(22, 'Chen', 'Patrick', 'mail@gmail.com', 0, 1, NULL, 3, NULL),
(23, 'Cyprien', 'Chrislin', 'mail@gmail.com', 1, 1, NULL, 1, NULL),
(24, 'Da costa gomara ruiz', 'Antoine', 'mail@gmail.com', 1, 1, NULL, 2, NULL),
(25, 'Dia', 'Amadou', 'mail@gmail.com', 0, 1, NULL, 3, NULL),
(26, 'Diabira', 'Sylla', 'mail@gmail.com', 0, 1, NULL, 3, NULL),
(27, 'Diallo', 'Mamadou', 'mail@gmail.com', 1, 1, NULL, 2, NULL),
(28, 'Dovifaaz', 'Mehdi', 'mail@gmail.com', 0, 1, NULL, 3, NULL),
(29, 'Elabasy', 'Amgad', 'mail@gmail.com', 1, 1, NULL, 1, NULL),
(30, 'Elnady', 'Omar', 'mail@gmail.com', 1, 1, NULL, 3, NULL),
(31, 'Essayah', 'Charaf', 'mail@gmail.com', 0, 1, NULL, 1, NULL),
(32, 'Fathi', 'Marie', 'mail@gmail.com', 0, 1, NULL, 3, NULL),
(33, 'Fratila', 'Adriana-mariana', 'mail@gmail.com', 0, 1, NULL, 1, NULL),
(34, 'Gupta', 'Varun', 'mail@gmail.com', 1, 1, NULL, 3, NULL),
(36, 'Hammache', 'Kais', 'mail@gmail.com', 1, 1, NULL, 3, NULL),
(37, 'Haude', 'Auceane', 'mail@gmail.com', 0, 1, NULL, 1, NULL),
(38, 'Hayek', 'Sofiene', 'mail@gmail.com', 1, 1, NULL, 2, NULL),
(39, 'Houmimid', 'Hani', 'mail@gmail.com', 0, 1, NULL, 1, NULL),
(40, 'Huang', 'Frederic', 'mail@gmail.com', 1, 1, NULL, 1, NULL),
(41, 'Huynh', 'Alexandre', 'mail@gmail.com', 1, 1, NULL, 3, NULL),
(42, 'Idier', 'Laetitia', 'mail@gmail.com', 0, 1, NULL, 1, NULL),
(43, 'Jeyaraj', 'Jeyanika', 'mail@gmail.com', 1, 1, NULL, 2, NULL),
(44, 'Jie', 'Juan', 'mail@gmail.com', 1, 1, NULL, 1, NULL),
(45, 'Kanzari', 'Rayan', 'mail@gmail.com', 0, 1, NULL, 3, NULL),
(46, 'Laddada', 'Anis', 'mail@gmail.com', 1, 1, NULL, 1, NULL),
(47, 'Lannuzel', 'Dylan', 'mail@gmail.com', 0, 1, NULL, 2, NULL),
(48, 'Laurent', 'Aicha', 'mail@gmail.com', 1, 1, NULL, 2, NULL),
(49, 'Lazar', 'Mohamed', 'mail@gmail.com', 0, 1, NULL, 1, NULL),
(50, 'Lile', 'Vithia', 'mail@gmail.com', 0, 1, NULL, 3, NULL),
(51, 'Lo', 'Faty', 'mail@gmail.com', 0, 1, NULL, 3, NULL),
(52, 'Luyeye lu mvuala', 'Oceane', 'mail@gmail.com', 0, 1, NULL, 1, NULL),
(53, 'Marrou', 'Ishak', 'mail@gmail.com', 1, 1, NULL, 3, NULL),
(54, 'Mazgar', 'Selma', 'mail@gmail.com', 1, 1, NULL, 2, NULL),
(55, 'Mohammedi', 'Mazigh', 'mail@gmail.com', 1, 1, NULL, 2, NULL),
(56, 'Nejjari', 'Abdenour', 'mail@gmail.com', 1, 1, NULL, 1, NULL),
(57, 'Nguyen', 'Maxime', 'mail@gmail.com', 0, 1, NULL, 3, NULL),
(58, 'Oubella', 'Walid', 'mail@gmail.com', 1, 1, NULL, 3, NULL),
(59, 'Ouyed', 'Neil', 'mail@gmail.com', 1, 1, NULL, 2, NULL),
(60, 'Paillot', 'Jefferson', 'mail@gmail.com', 0, 1, NULL, 3, NULL),
(61, 'Paris', 'Evan', 'mail@gmail.com', 1, 1, NULL, 1, NULL),
(62, 'Pathmaharan', 'Kajanan', 'mail@gmail.com', 1, 1, NULL, 2, NULL),
(64, 'Postic', 'Kevin', 'mail@gmail.com', 0, 1, NULL, 1, NULL),
(65, 'Rachid', 'Amin', 'mail@gmail.com', 1, 1, NULL, 2, NULL),
(66, 'Raveendran', 'Thirisan', 'mail@gmail.com', 1, 1, NULL, 3, NULL),
(67, 'Sadi oufella', 'Kenza', 'mail@gmail.com', 0, 1, NULL, 2, NULL),
(68, 'Salemkour', 'Tinhinane', 'mail@gmail.com', 0, 1, NULL, 1, NULL),
(69, 'Sami', 'Erwann', 'mail@gmail.com', 0, 1, NULL, 1, NULL),
(70, 'Savundrarajan', 'Tharshaan', 'mail@gmail.com', 1, 1, NULL, 1, NULL),
(71, 'Smaoune', 'Oussama', 'mail@gmail.com', 1, 1, NULL, 1, NULL),
(72, 'Soupramaniane', 'Cyril', 'mail@gmail.com', 1, 1, NULL, 1, NULL),
(73, 'Talbi', 'Samir', 'mail@gmail.com', 1, 1, NULL, 2, NULL),
(74, 'Theivendirampillai', 'Thevish', 'mail@gmail.com', 1, 1, NULL, 2, NULL),
(75, 'Tigrini', 'Rayane', 'mail@gmail.com', 0, 1, NULL, 2, NULL),
(76, 'Tlemsani', 'Sofiane', 'mail@gmail.com', 1, 1, NULL, 2, NULL),
(77, 'Topal', 'Mahmut ali', 'mail@gmail.com', 0, 1, NULL, 3, NULL),
(78, 'Vongsavanh', 'Aline', 'mail@gmail.com', 1, 1, NULL, 3, NULL),
(79, 'Zeroual', 'Ilyes', 'mail@gmail.com', 1, 1, NULL, 2, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `formation`
--

CREATE TABLE `formation` (
  `Formation_ID` int(11) NOT NULL,
  `Departement` varchar(20) DEFAULT NULL,
  `Etablissement` varchar(50) DEFAULT NULL,
  `Formation_FLAG` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `groupe`
--

CREATE TABLE `groupe` (
  `Groupe_ID` int(11) NOT NULL,
  `Formation_ID` int(11) DEFAULT NULL,
  `Promotion` varchar(20) DEFAULT NULL,
  `Nom` varchar(30) DEFAULT NULL,
  `Niveau` int(11) DEFAULT NULL,
  `Groupe_FLAG` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `groupe`
--

INSERT INTO `groupe` (`Groupe_ID`, `Formation_ID`, `Promotion`, `Nom`, `Niveau`, `Groupe_FLAG`) VALUES
(1, NULL, '2022-2023', 'Athos', 2, 1),
(2, NULL, '2022-2023', 'Aramis', 2, 1),
(3, NULL, '2022-2023', 'Porthos', 2, 1);

-- --------------------------------------------------------

--
-- Structure de la table `login`
--

CREATE TABLE `login` (
  `Username` varchar(20) NOT NULL,
  `Password` varchar(500) DEFAULT NULL,
  `User_ID` int(11) DEFAULT NULL,
  `Role` tinyint(1) DEFAULT NULL,
  `Connected` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `login`
--

INSERT INTO `login` (`Username`, `Password`, `User_ID`, `Role`, `Connected`) VALUES
('butelle', '$2y$10$NO1jb2P0gfHU.p0RZNJEyuUs1OYyKvb33Dogq5e7sHjjqrrJ.uDZu', 3, 0, 0),
('hebert', '$2y$10$5g4kCq2MFCC2JU90neP4ouCua5C00rUAhYo/n2n8jZggrJnDRfhja', 2, 0, 0),
('zargayouna', '$2y$10$Ng4XSTE61LccYnxpVozy6evL9gWnMmQFHis.DoAtsx6GL7UpPGsMa', 4, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `personnel`
--

CREATE TABLE `personnel` (
  `Personnel_ID` int(11) NOT NULL,
  `Nom` varchar(30) DEFAULT NULL,
  `Prenom` varchar(30) DEFAULT NULL,
  `Mail` varchar(30) DEFAULT NULL,
  `Visibility_flag` tinyint(4) DEFAULT NULL,
  `Role` varchar(20) DEFAULT NULL,
  `Formation_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `personnel`
--

INSERT INTO `personnel` (`Personnel_ID`, `Nom`, `Prenom`, `Mail`, `Visibility_flag`, `Role`, `Formation_ID`) VALUES
(2, 'Hebert', 'David', 'mail@gmail.com', 1, 'Validateur', NULL),
(3, 'Butelle', 'Franck', 'mail@gmail.com', 1, 'Validateur', NULL),
(4, 'Zargayouna', 'Haïfa', 'mail@gmail.com', 1, 'Validateur', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `stage`
--

CREATE TABLE `stage` (
  `Stage_ID` int(11) NOT NULL,
  `Mission` varchar(1000) DEFAULT NULL,
  `Student_ID` int(11) DEFAULT NULL,
  `Personnel_ID` int(11) DEFAULT NULL,
  `Duree` int(11) DEFAULT NULL,
  `Tuteur_ID` int(11) DEFAULT NULL,
  `Gratification` tinyint(1) DEFAULT NULL,
  `Teletravail` int(11) DEFAULT NULL,
  `Stage_FLAG` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `tuteur`
--

CREATE TABLE `tuteur` (
  `Tuteur_ID` int(11) NOT NULL,
  `Nom` varchar(20) DEFAULT NULL,
  `Prenom` varchar(20) DEFAULT NULL,
  `Entreprise_ID` int(11) DEFAULT NULL,
  `Contact` varchar(20) DEFAULT NULL,
  `Tuteur_FLAG` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `bos`
--
ALTER TABLE `bos`
  ADD PRIMARY KEY (`BOS_ID`);

--
-- Index pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`Commentaire_ID`);

--
-- Index pour la table `document`
--
ALTER TABLE `document`
  ADD PRIMARY KEY (`Document_ID`);

--
-- Index pour la table `entreprise`
--
ALTER TABLE `entreprise`
  ADD PRIMARY KEY (`Entreprise_ID`);

--
-- Index pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD PRIMARY KEY (`Student_ID`);

--
-- Index pour la table `formation`
--
ALTER TABLE `formation`
  ADD PRIMARY KEY (`Formation_ID`);

--
-- Index pour la table `groupe`
--
ALTER TABLE `groupe`
  ADD PRIMARY KEY (`Groupe_ID`);

--
-- Index pour la table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`Username`);

--
-- Index pour la table `personnel`
--
ALTER TABLE `personnel`
  ADD PRIMARY KEY (`Personnel_ID`);

--
-- Index pour la table `stage`
--
ALTER TABLE `stage`
  ADD PRIMARY KEY (`Stage_ID`);

--
-- Index pour la table `tuteur`
--
ALTER TABLE `tuteur`
  ADD PRIMARY KEY (`Tuteur_ID`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `bos`
--
ALTER TABLE `bos`
  MODIFY `BOS_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `commentaire`
--
ALTER TABLE `commentaire`
  MODIFY `Commentaire_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `document`
--
ALTER TABLE `document`
  MODIFY `Document_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `entreprise`
--
ALTER TABLE `entreprise`
  MODIFY `Entreprise_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `stage`
--
ALTER TABLE `stage`
  MODIFY `Stage_ID` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
