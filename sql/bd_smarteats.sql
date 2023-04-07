
-- Table des utilisateurs 
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `TYPE` int NOT NULL,
  `MAIL` varchar(100) NOT NULL,
  `PASSWORD` varchar(200) NOT NULL,
  `NOM` varchar(50) NOT NULL,
  `PRENOM` varchar(50) NOT NULL,
  `DATENAISSANCE` date NOT NULL,
  `POIDS` decimal(4,1) NOT NULL,
  `TAILLE_CM` decimal(4,1) NOT NULL,
  `SEXE` char(1) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB;

-- Table des informations nutritionnelles
CREATE TABLE  if not exists info_nutri (
  ID INT NOT NULL AUTO_INCREMENT,
  nom_produit VARCHAR(255) NOT NULL,
  marque VARCHAR(255) NOT NULL,
  code_barres VARCHAR(255) NOT NULL,
  calories INT NOT NULL,
  proteines INT NOT NULL,
  glucides INT NOT NULL,
  graisses INT NOT NULL,
  fibres INT NOT NULL,
  PRIMARY KEY (ID),
  UNIQUE (code_barres)
)engine=innodb;

-- Table des recettes
CREATE TABLE  if not exists recettes (
  ID INT NOT NULL AUTO_INCREMENT,
  nom_recette VARCHAR(255) NOT NULL,
  temps_preparation INT NOT NULL,
  temps_cuisson INT NOT NULL,
  instructions_preparation TEXT NOT NULL,
  liste_ingredients TEXT NOT NULL,
  calories_par_portion INT NOT NULL,
  proteines_par_portion INT NOT NULL,
  glucides_par_portion INT NOT NULL,
  graisses_par_portion INT NOT NULL,
  fibres_par_portion INT NOT NULL,
  PRIMARY KEY (ID)
)engine=innodb;

-- Table des programmes d'exercice
CREATE TABLE  if not exists exercice (
  ID INT NOT NULL AUTO_INCREMENT,
  nom VARCHAR(255) NOT NULL,
  descript TEXT NOT NULL,
  duree INT NOT NULL,
  objectif VARCHAR(255) NOT NULL,
  PRIMARY KEY (ID)
)engine=innodb;



-- Table des favoris
CREATE TABLE  if not exists favoris (
  ID INT NOT NULL AUTO_INCREMENT,
  ID_utilisateur INT NOT NULL,
  ID_recette INT NOT NULL,
  PRIMARY KEY (ID),
  FOREIGN KEY (ID_utilisateur) REFERENCES utilisateurs(ID),
  FOREIGN KEY (ID_recette) REFERENCES recettes(ID)
)engine=innodb;


