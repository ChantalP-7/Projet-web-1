create database stampee;

Create table utilisateur (
    id int not null AUTO_INCREMENT,
    prenom VARCHAR(45),
    nom VARCHAR(45),
    nomUtilisateur VARCHAR(45),
    courriel VARCHAR(45),
    password VARCHAR(45),
    idRole int not null,
    PRIMARY KEY (id),
    UNIQUE KEY courriel_unique (courriel),
    KEY `idRole` (`idRole`),
CONSTRAINT `utilisateur_ibfk_1` FOREIGN KEY (`idRole`) REFERENCES `role` (`id`)
)

CREATE TABLE IF NOT EXISTS `membre` (
    `id` int NOT NULL AUTO_INCREMENT,
    `pseudonyme` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    `telephone` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    `idUtilisateur` int NOT NULL,
    PRIMARY KEY (`id`),
    KEY `idUtilisateur` (`idUtilisateur`),
    CONSTRAINT `membre_ibfk_1` FOREIGN KEY (`idUtilisateur`) REFERENCES `utilisateur` (`id`)
)

CREATE TABLE IF NOT EXISTS `admin` (
    `id` int NOT NULL AUTO_INCREMENT,
    `nom` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    `telephone` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    `idUtilisateur` int NOT NULL,
    PRIMARY KEY (`id`),
    KEY `idUtilisateur` (`idUtilisateur`),
    CONSTRAINT `admin_ibfk_2` FOREIGN KEY (`idUtilisateur`) REFERENCES `utilisateur` (`id`)
)

CREATE TABLE IF NOT EXISTS `timbre` (
    `id` int NOT NULL AUTO_INCREMENT,
    `lot` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    `nom` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    `datePublication` date NOT NULL,
    `PaysOrigine` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `couleur` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `image` BLOB DEFAULT NULL,
    `condition` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `dimension` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `certifie` TINYINT DEFAULT NULL,
    `idMembre` int NOT NULL
    PRIMARY KEY (`id`),
    KEY `idMembre` (`idMembre`),  
    CONSTRAINT `timbre_ibfk_1` FOREIGN KEY (`idMembre`) REFERENCES `membre` (`id`)
)

CREATE TABLE IF NOT EXISTS `enchere` (
    `id` int NOT NULL AUTO_INCREMENT,
    `dateDebut` date NOT NULL,
    `dateFin` date NOT NULL,
    `prixPlancher` double NOT NULL,
    `CoupDeCoeurLord` TINYINT DEFAULT NULL,
    `actif` TINYINT NOT NULL,    
    `idTimbre` int NOT NULL
    PRIMARY KEY (`id`),
    KEY `idTimbre` (`idTimbre`),  
    CONSTRAINT `enchere_ibfk_1` FOREIGN KEY (`idTimbre`) REFERENCES `timbre` (`id`)
)

CREATE TABLE IF NOT EXISTS `miseEnchere` (
    `id` int  not null AUTO_INCREMENT,
    `prixMise` double NOT NULL,
    `dateMise` date NOT NULL,     
    `idMembre` int NOT NULL,
    `idEnchere` int NOT NULL,
    PRIMARY KEY (`id`),
    KEY `idMembre` (`idMembre`),
    KEY `idEnchere` (`idEnchere`),
    CONSTRAINT `enchereMembre_ibfk_1` FOREIGN KEY (`idMembre`) REFERENCES `membre` (`id`),
    CONSTRAINT `enchereMembre_ibfk_2` FOREIGN KEY (`idEnchere`) REFERENCES `enchere` (`id`)
)

CREATE TABLE IF NOT EXISTS `commentaire` (
  `id` int NOT NULL AUTO_INCREMENT,
  `commentaire` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `etoiles` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dateCommentaire` date NOT NULL,
  `idMembre` int NOT NULL,
  `idEnchere` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idMembre` (`idMembre`),
  KEY `idEnchere` (`idEnchere`),
  CONSTRAINT `enchereMembre_ibfk_1` FOREIGN KEY (`idMembre`) REFERENCES `membre` (`id`),
CONSTRAINT `enchereMembre_ibfk_2` FOREIGN KEY (`idEnchre`) REFERENCES `enchere` (`id`)
)