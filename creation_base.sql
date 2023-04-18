CREATE DATABASE Canardsound;

USE Canardsound;

CREATE TABLE Utilisateurs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(255) NOT NULL,
    prenom VARCHAR(255) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    mot_de_passe VARCHAR(255) NOT NULL,
    est_admin BOOLEAN DEFAULT 0
);

CREATE TABLE Titres (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titre VARCHAR(255) NOT NULL,
    artiste VARCHAR(255) NOT NULL,
    url_musique VARCHAR(255) NOT NULL,
    utilisateur_id INT,
    FOREIGN KEY (utilisateur_id) REFERENCES Utilisateurs(id)
);

CREATE TABLE CoupsDeCoeur (
    id INT AUTO_INCREMENT PRIMARY KEY,
    utilisateur_id INT,
    titre_id INT,
    FOREIGN KEY (utilisateur_id) REFERENCES Utilisateurs(id),
    FOREIGN KEY (titre_id) REFERENCES Titres(id)
);

CREATE TABLE Signalements (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titre_id INT,
    utilisateur_id INT,
    raison TEXT,
    FOREIGN KEY (titre_id) REFERENCES Titres(id),
    FOREIGN KEY (utilisateur_id) REFERENCES Utilisateurs(id)
);

CREATE TABLE CoverAlbum (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titre_album VARCHAR(255) NOT NULL,
    url_image VARCHAR(255) NOT NULL
);
