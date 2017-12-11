-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le :  lun. 11 déc. 2017 à 14:54
-- Version du serveur :  5.6.35
-- Version de PHP :  7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `instant_cafe`
--

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `ID_commande` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `ID_buvette` int(11) NOT NULL,
  `ID_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `ligne_commande`
--

CREATE TABLE `ligne_commande` (
  `ID_commande` int(11) NOT NULL,
  `ID_produit` int(11) NOT NULL,
  `quantite` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `ligne_produit`
--

CREATE TABLE `ligne_produit` (
  `ID_pfh` int(11) NOT NULL,
  `ID_produit` int(11) NOT NULL,
  `quantite` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `pfh`
--

CREATE TABLE `pfh` (
  `ID_pfh` int(11) NOT NULL,
  `nom` varchar(45) NOT NULL,
  `img` varchar(45) DEFAULT NULL,
  `description` varchar(300) DEFAULT NULL,
  `solde` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `ID_produit` int(11) NOT NULL,
  `nom` varchar(45) NOT NULL,
  `img` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `ID_user` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(32) NOT NULL,
  `nom` varchar(45) NOT NULL,
  `prenom` varchar(45) NOT NULL,
  `type` enum('client','admin') NOT NULL,
  `semestre` int(11) DEFAULT NULL,
  `ID_pfh` int(11) DEFAULT NULL,
  `solde` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`ID_user`, `email`, `password`, `nom`, `prenom`, `type`, `semestre`, `ID_pfh`, `solde`) VALUES
(1, 'btexier@intechinfo.fr', 'ok', 'TEXIER', 'Baptiste', 'admin', 2, NULL, 0),
(2, 'balek@intech.fr', 'balek', 'ok', 'ko', 'client', 4, NULL, 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`ID_commande`),
  ADD KEY `ID_buvette` (`ID_buvette`),
  ADD KEY `ID_user` (`ID_user`);

--
-- Index pour la table `ligne_commande`
--
ALTER TABLE `ligne_commande`
  ADD KEY `ID_commande` (`ID_commande`),
  ADD KEY `ID_produit_ligne_commande` (`ID_produit`);

--
-- Index pour la table `ligne_produit`
--
ALTER TABLE `ligne_produit`
  ADD KEY `ID_pfh_on_ligne_produit` (`ID_pfh`),
  ADD KEY `ID_produit_on_ligne_produit` (`ID_produit`);

--
-- Index pour la table `pfh`
--
ALTER TABLE `pfh`
  ADD PRIMARY KEY (`ID_pfh`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`ID_produit`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID_user`),
  ADD KEY `ID_pfh_on_user` (`ID_pfh`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `ID_commande` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `pfh`
--
ALTER TABLE `pfh`
  MODIFY `ID_pfh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `ID_produit` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `ID_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `ID_buvette` FOREIGN KEY (`ID_buvette`) REFERENCES `pfh` (`ID_pfh`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `ID_user` FOREIGN KEY (`ID_user`) REFERENCES `user` (`ID_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `ligne_commande`
--
ALTER TABLE `ligne_commande`
  ADD CONSTRAINT `ID_commande` FOREIGN KEY (`ID_commande`) REFERENCES `commande` (`ID_commande`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `ID_produit_ligne_commande` FOREIGN KEY (`ID_produit`) REFERENCES `produit` (`ID_produit`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `ligne_produit`
--
ALTER TABLE `ligne_produit`
  ADD CONSTRAINT `ID_pfh_on_ligne_produit` FOREIGN KEY (`ID_pfh`) REFERENCES `pfh` (`ID_pfh`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `ID_produit_on_ligne_produit` FOREIGN KEY (`ID_produit`) REFERENCES `produit` (`ID_produit`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `ID_pfh_on_user` FOREIGN KEY (`ID_pfh`) REFERENCES `pfh` (`ID_pfh`) ON DELETE SET NULL ON UPDATE SET NULL;
