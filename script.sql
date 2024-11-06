CREATE TABLE Realisateur (
    id_realisateur INT PRIMARY KEY,
    nom VARCHAR(50),
    prenom VARCHAR(50)
);

CREATE TABLE Film (
    id_film INT PRIMARY KEY,
    Titre VARCHAR(50),
    Duree INT,
    Annee_de_sortie DATE,
    id_realisateur INT,
    FOREIGN KEY (id_realisateur) REFERENCES Realisateur(id_realisateur)
);

CREATE TABLE Acteur (
    id_Acteur INT PRIMARY KEY,
    nom VARCHAR(50),
    prenom VARCHAR(50),
    role BOOLEAN, 
    Date_naissance DATE
);

CREATE TABLE Utilisateur (
    id_utilisateur INT PRIMARY KEY,
    nom VARCHAR(50),
    prenom VARCHAR(50),
    email VARCHAR(100),
    mot_de_passe VARCHAR(50),
    role VARCHAR(50)
);

CREATE TABLE Jouer (
    id_film INT,
    id_Acteur INT,
    PRIMARY KEY (id_film, id_Acteur),
    FOREIGN KEY (id_film) REFERENCES Film(id_film),
    FOREIGN KEY (id_Acteur) REFERENCES Acteur(id_Acteur)
);

CREATE TABLE Favorie (
    id_film INT,
    id_utilisateur INT,
    PRIMARY KEY (id_film, id_utilisateur),
    FOREIGN KEY (id_film) REFERENCES Film(id_film),
    FOREIGN KEY (id_utilisateur) REFERENCES Utilisateur(id_utilisateur)
);

----1----
SELECT Titre, Annee_de_sortie FROM Film ORDER BY Annee_de_sortie DESC;
----2----
SELECT Acteur.nom, Acteur.prenom FROM Acteur JOIN Jouer ON Acteur.id_Acteur = Jouer.id_Acteur WHERE Jouer.id_film = 1 AND Acteur.role = 1;  -- 1 pour le rôle principal
---3----
SELECT Film.Titre, Film.Annee_de_sortie FROM Film JOIN Jouer ON Film.id_film = Jouer.id_film WHERE Jouer.id_Acteur = 1;
----4----
INSERT INTO Film (id_film, Titre, Duree, Annee_de_sortie, id_realisateur) VALUES (5, 'spedyy', 120, '2023-01-01', 2);
----5----
INSERT INTO Acteur (id_Acteur, nom, prenom, role, Date_naissance) VALUES (6, 'aym', 'maf', 1, '1990-01-01');
----6----
UPDATE Film SET Titre = 'sommaire', Duree = 130 WHERE id_film = 1;
---7---
DELETE FROM Acteur WHERE id_Acteur = 1;
---8---
SELECT nom, prenom, Date_naissance FROM Acteur ORDER BY id_Acteur DESC LIMIT 3;
----9---
SELECT Titre, Annee_de_sortie FROM Film ORDER BY Annee_de_sortie ASC LIMIT 1;
---10---
SELECT nom, prenom, Date_naissance FROM Acteur ORDER BY Date_naissance DESC LIMIT 1;
---11---
SELECT COUNT(*) AS Nombre_de_films FROM Film WHERE YEAR(Annee_de_sortie) = 1990;
----12--
SELECT COUNT(DISTINCT id_Acteur) AS Nombre_acteurs FROM Jouer WHERE id_film = 1;




