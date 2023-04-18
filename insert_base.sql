USE Canardsound;

INSERT INTO Utilisateurs (nom, prenom, email, mot_de_passe, est_admin)
VALUES
('Dupont', 'Jean', 'jean.dupont@email.com', 'motdepasse1', 0),
('Martin', 'Pierre', 'pierre.martin@email.com', 'motdepasse2', 0),
('Leroy', 'Sophie', 'sophie.leroy@email.com', 'motdepasse3', 0);


INSERT INTO Titres (titre, artiste, url_musique, utilisateur_id)
VALUES
('Californication', 'Red Hot Chili Peppers', '', 1),
('Scar Tissue', 'Red Hot Chili Peppers', '', 1),
('Stolen Dance', 'Milky Chance', '', 2),
('Cocoon', 'Milky Chance', '', 2),
('Teardrop', 'Massive Attack', '', 3),
('Angel', 'Massive Attack', '', 3),
('Come Together', 'The Beatles', '', 1),
('Lucy in the Sky with Diamond', 'The Beatles', '', 1),
('My Friend Dario', 'Vitalic', '', 2),
('Poney Part 1', 'Vitalic', ''; 2);


INSERT INTO CoverAlbum (titre_album, url_image)
VALUES
('Californication', 'img/califonication.jpg'),
('Scar Tissue', 'img/by_the_way.jpg'),
('Stolen Dance', 'img/stolen_dance.jpg'),
('Cocoon', 'img/cocoon.jpg'),
('Teardrop', 'img/teardrop.jpg'),
('Angel', 'img/Angel.jpg'),
('Come Together', 'img/come_together.jpg'),
('Sgt. Peppers Lonely Hearts Club Band', 'img/Sgt_Peppers_Lonely_Hearts_Club_Band.jpg'),
('OK Cowboy', 'img/ok_cowboy.jpg'),
('Flashmob', 'img/flashmob.jpg');