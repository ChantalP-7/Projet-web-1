create database stampee;

Create table membre (
    id int not null AUTO_INCREMENT,
    prenom VARCHAR(45) not null,
    nom VARCHAR(45) not null,    
    courriel VARCHAR(45) not null,
    telephone VARCHAR(45),
    username VARCHAR(45) not null UNIQUE,
    password VARCHAR(255) not null,
    PRIMARY KEY (id),
    UNIQUE KEY username_unique (username)
)

CREATE TABLE IF NOT EXISTS `timbre` (
    `id` int NOT NULL AUTO_INCREMENT,
    `lot` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    `nom` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    `datePublication` date NOT NULL,
    `idImage` int not NULL,
    `idPays` int not NULL,
    `idEtat` int not NULL,
    `idCouleur` int not NULL,
    `idFormat` int not NULL,
    `idMembre` int NOT NULL,
    PRIMARY KEY (`id`),
    KEY `idImage` (`idImage`),  
    KEY `idPaysOrigine` (`idPaysOrigine`),  
    KEY `idCouleur` (`idCouleur`),  
    KEY `idEtat` (`idCondition`),  
    KEY `idFormat` (`idDimension`),  
    KEY `idMembre` (`idMembre`),  
    CONSTRAINT `timbre_ibfk_1` FOREIGN KEY (`idImage`) REFERENCES `image` (`id`),
    CONSTRAINT `timbre_ibfk_2` FOREIGN KEY (`idPays`) REFERENCES `pays` (`id`),
    CONSTRAINT `timbre_ibfk_3` FOREIGN KEY (`idCouleur`) REFERENCES `couleur` (`id`),
    CONSTRAINT `timbre_ibfk_4` FOREIGN KEY (`idEtat`) REFERENCES `etat` (`id`),
    CONSTRAINT `timbre_ibfk_5` FOREIGN KEY (`idFormat`) REFERENCES `format` (`id`),
    CONSTRAINT `timbre_ibfk_6` FOREIGN KEY (`idMembre`) REFERENCES `membre` (`id`)
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
    CONSTRAINT `enchere_ibfk_7` FOREIGN KEY (`idTimbre`) REFERENCES `timbre` (`id`)
)

CREATE TABLE IF NOT EXISTS `mise` (
    `id` int  not null AUTO_INCREMENT,
    `prix` double NOT NULL,
    `date` date NOT NULL,     
    `idMembre` int NOT NULL,
    `idEnchere` int NOT NULL,
    PRIMARY KEY (`id`),
    KEY `idMembre` (`idMembre`),
    KEY `idEnchere` (`idEnchere`),
    PRIMARY KEY (`idMembre`),
    PRIMARY KEY (`idEnchere`),
    CONSTRAINT `miseEnchere_ibfk_8` FOREIGN KEY (`idMembre`) REFERENCES `membre` (`id`),
    CONSTRAINT `miseEnchere_ibfk_9` FOREIGN KEY (`idEnchere`) REFERENCES `enchere` (`id`)
)

CREATE TABLE favori (
    KEY `idMembre` (`idMembre`),
    KEY `idEnchere` (`idEnchere`),
    CONSTRAINT `favori_ibfk_12` FOREIGN KEY (`idMembre`) REFERENCES `membre` (`id`),
    CONSTRAINT `favori_ibfk_13` FOREIGN KEY (`idEnchere`) REFERENCES `enchere` (`id`)
)

CREATE TABLE pays (
    id int not null AUTO_INCREMENT,
    pays VARCHAR(45) not null,
    PRIMARY KEY (`id`),
)

CREATE TABLE couleur (
    id int not null AUTO_INCREMENT,
    couleur VARCHAR(45) not null,
    PRIMARY KEY (`id`),
)

CREATE TABLE format (
    id int not null AUTO_INCREMENT,
    format VARCHAR(45) not null,
    PRIMARY KEY (`id`),
)

CREATE TABLE etat (
    id int not null AUTO_INCREMENT,
    etat VARCHAR(45) not null,
    PRIMARY KEY (`id`),
)

CREATE TABLE imageTimbre (
    id int not null AUTO_INCREMENT,
    image VARCHAR(255) not null,
    PRIMARY KEY (`id`),
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
  CONSTRAINT `enchereMembre_ibfk_10` FOREIGN KEY (`idMembre`) REFERENCES `membre` (`id`),
CONSTRAINT `enchereMembre_ibfk_11` FOREIGN KEY (`idEnchre`) REFERENCES `enchere` (`id`)
)