DROP DATABASE IF EXISTS ns;
CREATE DATABASE ns;
USE ns;

DROP TABLE IF EXISTS appartement;
CREATE TABLE appartement (
  idappart INT NOT NULL AUTO_INCREMENT,
  adresse TEXT NOT NULL,
  surface DECIMAL(10,2) NOT NULL,
  designation VARCHAR(50) NOT NULL,
  idproprio INT NOT NULL,
  image VARCHAR(255) DEFAULT NULL,
  PRIMARY KEY (idappart),
  KEY idproprio (idproprio)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO appartement (idappart, adresse, surface, designation, idproprio, image) VALUES
(1, '12 Rue des Dunes, Biarritz', 70.00, 'Appartement surf avec vue sur l’océan', 1, 'images/biens/1762444883_Appartement surf.avif,images/biens/1762444883_Appartement surf1.webp'),
(2, '8 Avenue des Plages, Hossegor', 65.00, 'T2 moderne à 200m de la plage', 2, 'images/biens/1762444958_T2 moderne à 200m de la plage.jpg'),
(3, '5 Rue du Port, Lacanau-Océan', 80.00, 'Appartement lumineux pour surfeurs', 3, 'images/biens/1762445086_surfeurs.jpg,images/biens/1762445086_surfeurs1.jpg'),
(4, '3 Allée des Mouettes, Anglet', 55.00, 'Studio en bord de mer', 4, 'images/biens/1762445207_Studio en bord de mer.jpg'),
(5, '14 Rue des Sables, Saint-Jean-de-Luz', 90.00, 'T3 avec terrasse face à la mer', 5, 'images/biens/1762446102_T3 avec terrasse face à la mer 1.jpg,images/biens/1762446102_T3 avec terrasse face à la mer.jpg'),
(6, '10 Rue du Mont-Blanc, Chamonix', 75.00, 'Appartement vue Mont-Blanc', 6, 'images/biens/1762446186_Appartement vue Mont-Blanc.avif,images/biens/1762446186_Appartement vue Mont-Blanc1.avif'),
(7, '22 Route du Col, Tignes', 85.00, 'T3 proche des remontées mécaniques', 7, 'images/biens/1762445945_T3.webp,images/biens/1762445945_T3-2.webp'),
(8, '8 Chemin du Glacier, Les Deux Alpes', 95.00, 'Appartement familial balcon panoramique', 8, 'images/biens/1762446304_Appartement familial balcon panoramique.jpg,images/biens/1762446304_Appartement familial balcon panoramique1.jpg'),
(9, '14 Rue des Chalets, Megève', 120.00, 'Chalet luxueux centre station', 9, NULL),
(10, '19 Rue du Reposoir, Avoriaz', 80.00, 'Studio moderne ski-in ski-out', 10, NULL),
(11, '25 Chemin du Lac, Annecy', 65.00, 'Appartement vue lac et montagne', 11, NULL),
(12, '6 Rue des Gorges, Verdon-sur-Mer', 70.00, 'Appartement pour amateurs de canyoning', 12, NULL),
(13, '9 Rue du Massif, Les Écrins', 90.00, 'T3 idéal pour randonneurs', 13, NULL),
(14, '4 Rue des Forêts, Gérardmer', 75.00, 'Appartement nature près du lac', 14, NULL),
(15, '3 Route du Pic, Cauterets', 85.00, 'Appartement avec accès sentiers de montagne', 15, NULL),
(16, '7 Rue des Airs, Millau', 95.00, 'Appartement proche du viaduc, spot parapente', 16, NULL),
(17, '15 Rue des Falaises, Cassis', 70.00, 'Appartement avec vue sur les calanques', 17, NULL),
(18, '11 Chemin du Rocher, Fontaine-de-Vaucluse', 80.00, 'Appartement pour escalade et kayak', 18, NULL),
(19, '9 Avenue du Ventoux, Bédoin', 85.00, 'Appartement pour cyclistes du Mont Ventoux', 19, NULL),
(20, '17 Rue du Cirque, Gavarnie', 90.00, 'Appartement face aux montagnes', 20, NULL),
(21, '2 Rue du Château, Annecy-le-Vieux', 100.00, 'Appartement calme entre lac et montagne', 21, NULL),
(22, '5 Rue du Bourg, Argelès-sur-Mer', 60.00, 'T2 entre mer et montagne', 22, NULL),
(23, '13 Rue du Lac Bleu, Gérardmer', 70.00, 'Appartement cosy avec cheminée', 23, NULL),
(24, '8 Rue des Pins, Capbreton', 75.00, 'Appartement entre océan et forêt', 24, NULL),
(25, '10 Rue du Village, Morzine', 90.00, 'Appartement typique montagne et nature', 25, NULL),
(26, '247 Rue Gabriel péri', 62.00, 'Vue Défense, et Tour Eiffel', 26, NULL);

DROP TABLE IF EXISTS client;
CREATE TABLE client (
  idclient INT NOT NULL AUTO_INCREMENT,
  nom VARCHAR(50) NOT NULL,
  prenom VARCHAR(50) NOT NULL,
  email VARCHAR(50) NOT NULL,
  adresse TEXT NOT NULL,
  PRIMARY KEY (idclient),
  UNIQUE KEY email (email)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO client (idclient, nom, prenom, email, adresse) VALUES
(1, 'Dupont', 'Claire', 'claire.dupont@gmail.com', '12 Rue de la République, Paris'),
(2, 'Martin', 'Louis', 'louis.martin@gmail.com', '5 Avenue de l’Opéra, Lyon'),
(3, 'Durand', 'Julien', 'julien.durand@gmail.com', '22 Rue Victor Hugo, Marseille'),
(4, 'Bernard', 'Anne', 'anne.bernard@gmail.com', '8 Rue Lafayette, Toulouse'),
(5, 'Petit', 'Sophie', 'sophie.petit@gmail.com', '14 Boulevard Saint-Michel, Nice'),
(6, 'Moreau', 'Thomas', 'thomas.moreau@gmail.com', '3 Rue du Général Leclerc, Bordeaux'),
(7, 'Benoit', 'Claire', 'claire.benoit@gmail.com', '11 Rue Jean Jaurès, Lille'),
(8, 'Leroy', 'Éric', 'eric.leroy@gmail.com', '7 Rue Nationale, Nantes'),
(9, 'Roux', 'Camille', 'camille.roux@gmail.com', '19 Rue de Metz, Strasbourg'),
(10, 'Faure', 'Lucas', 'lucas.faure@gmail.com', '25 Rue de Lyon, Grenoble'),
(11, 'Lambert', 'Julie', 'julie.lambert@gmail.com', '10 Rue des Alpes, Annecy'),
(12, 'Girard', 'Nicolas', 'nicolas.girard@gmail.com', '3 Rue du Lac, Chamonix'),
(13, 'Besson', 'Marie', 'marie.besson@gmail.com', '7 Avenue des Neiges, Val d’Isère'),
(14, 'Caron', 'Hugo', 'hugo.caron@gmail.com', '9 Rue Mont-Blanc, Megève'),
(15, 'Leclerc', 'Emma', 'emma.leclerc@gmail.com', '5 Chemin du Glacier, Tignes'),
(16, 'Renaud', 'Paul', 'paul.renaud@gmail.com', '4 Rue des Sports, Les Deux Alpes'),
(17, 'Perrin', 'Lucie', 'lucie.perrin@gmail.com', '6 Rue de la Forêt, Briançon'),
(18, 'Collet', 'Léo', 'leo.collet@gmail.com', '12 Route des Chalets, Morzine'),
(19, 'Rolland', 'Nina', 'nina.rolland@gmail.com', '17 Rue des Sapins, La Clusaz'),
(20, 'Noir', 'Maxime', 'maxime.noir@gmail.com', '10 Rue du Jura, Les Rousses'),
(21, 'Masson', 'Laura', 'laura.masson@gmail.com', '8 Rue du Mont-Dore, Super-Besse'),
(22, 'Giraud', 'Hugo', 'hugo.giraud@gmail.com', '5 Rue du Reposoir, Avoriaz'),
(23, 'Baron', 'Alice', 'alice.baron@gmail.com', '11 Avenue des Cimes, Les Arcs'),
(24, 'Lemoine', 'Lucas', 'lucas.lemoine@gmail.com', '13 Rue des Pistes, Courchevel'),
(25, 'Chevalier', 'Sarah', 'sarah.chevalier@gmail.com', '9 Rue des Sommets, Serre-Chevalier');

DROP TABLE IF EXISTS location;
CREATE TABLE location (
  idlocation INT NOT NULL AUTO_INCREMENT,
  dateDebut DATE NOT NULL,
  dateFin DATE DEFAULT NULL,
  description TEXT,
  idappart INT NOT NULL,
  idclient INT NOT NULL,
  PRIMARY KEY (idlocation),
  KEY idappart (idappart),
  KEY idclient (idclient)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO location (idlocation, dateDebut, dateFin, description, idappart, idclient) VALUES
(1, '2025-01-05', '2025-03-05', 'Location courte durée', 1, 1),
(2, '2025-02-10', '2025-04-10', 'Location meublée', 2, 2),
(3, '2025-03-01', '2025-05-01', 'Séjour ski familial', 3, 3),
(4, '2025-04-15', '2025-06-15', 'Location saisonnière', 4, 4),
(5, '2025-05-20', '2025-07-20', 'Vacances à la montagne', 5, 5),
(6, '2025-06-01', '2025-08-01', 'Location courte durée', 6, 6),
(7, '2025-07-10', '2025-09-10', 'Séjour estival', 7, 7),
(8, '2025-08-05', '2025-10-05', 'Location meublée', 8, 8),
(9, '2025-09-01', '2025-11-01', 'Séjour longue durée', 9, 9),
(10, '2025-10-10', '2026-01-10', 'Hiver au ski', 10, 10),
(11, '2025-11-01', '2026-02-01', 'Saison de neige', 11, 11),
(12, '2025-11-15', '2026-03-15', 'Location longue durée', 12, 12),
(13, '2025-12-01', '2026-02-28', 'Séjour ski', 13, 13),
(14, '2025-12-15', '2026-04-15', 'Vacances familiales', 14, 14),
(15, '2026-01-01', '2026-05-01', 'Location montagne', 15, 15),
(16, '2026-02-01', '2026-06-01', 'Location meublée', 16, 16),
(17, '2026-03-01', '2026-07-01', 'Séjour printemps', 17, 17),
(18, '2026-04-01', '2026-08-01', 'Location été', 18, 18),
(19, '2026-05-01', '2026-09-01', 'Séjour famille', 19, 19),
(20, '2026-06-01', '2026-10-01', 'Location longue durée', 20, 20),
(21, '2026-07-01', '2026-11-01', 'Saison montagne', 21, 21),
(22, '2026-08-01', '2026-12-01', 'Location meublée', 22, 22),
(23, '2026-09-01', '2027-01-01', 'Vacances d’hiver', 23, 23),
(24, '2026-10-01', '2027-02-01', 'Séjour ski', 24, 24),
(25, '2026-11-01', '2027-03-01', 'Location saisonnière', 25, 25);

DROP TABLE IF EXISTS proprietaire;
CREATE TABLE proprietaire (
  idproprio INT NOT NULL AUTO_INCREMENT,
  nom VARCHAR(50) NOT NULL,
  prenom VARCHAR(50) NOT NULL,
  email VARCHAR(50) NOT NULL,
  adresse TEXT NOT NULL,
  PRIMARY KEY (idproprio),
  UNIQUE KEY email (email)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO proprietaire (idproprio, nom, prenom, email, adresse) VALUES
(1, 'Morel', 'Pierre', 'pierre.morel@gmail.com', '1 Rue des Chalets, Chamonix'),
(2, 'Fontaine', 'Isabelle', 'isabelle.fontaine@gmail.com', '2 Rue du Lac, Annecy'),
(3, 'Clement', 'Jean', 'jean.clement@gmail.com', '3 Rue des Pistes, Megève'),
(4, 'Riviere', 'Sophie', 'sophie.riviere@gmail.com', '4 Rue de la Montagne, Val d’Isère'),
(5, 'Mercier', 'Antoine', 'antoine.mercier@gmail.com', '5 Rue du Glacier, Tignes'),
(6, 'Garnier', 'Claire', 'claire.garnier@gmail.com', '6 Rue des Alpages, Les Deux Alpes'),
(7, 'Blanc', 'Paul', 'paul.blanc@gmail.com', '7 Rue de la Forêt, Morzine'),
(8, 'Lopez', 'Emma', 'emma.lopez@gmail.com', '8 Rue des Sapins, La Clusaz'),
(9, 'Fabre', 'Julien', 'julien.fabre@gmail.com', '9 Rue du Reposoir, Avoriaz'),
(10, 'Henry', 'Lucas', 'lucas.henry@gmail.com', '10 Rue des Cimes, Les Arcs'),
(11, 'Guillet', 'Marie', 'marie.guillet@gmail.com', '11 Rue des Sommets, Courchevel'),
(12, 'Lemoine', 'Thomas', 'thomas.lemoine@gmail.com', '12 Rue du Jura, Les Rousses'),
(13, 'Giraud', 'Camille', 'camille.giraud@gmail.com', '13 Rue du Mont-Dore, Super-Besse'),
(14, 'Bailly', 'Nina', 'nina.bailly@gmail.com', '14 Rue des Chalets, Briançon'),
(15, 'Adam', 'Olivier', 'olivier.adam@gmail.com', '15 Rue du Glacier, Tignes'),
(16, 'Besson', 'Manon', 'manon.besson@gmail.com', '16 Rue des Alpes, Chamonix'),
(17, 'Caron', 'Léa', 'lea.caron@gmail.com', '17 Rue des Sapins, La Clusaz'),
(18, 'Legrand', 'Hugo', 'hugo.legrand@gmail.com', '18 Rue du Reposoir, Avoriaz'),
(19, 'Michel', 'Alice', 'alice.michel@gmail.com', '19 Avenue des Cimes, Les Arcs'),
(20, 'Poirier', 'Maxime', 'maxime.poirier@gmail.com', '20 Rue des Sommets, Serre-Chevalier'),
(21, 'Dupuis', 'Lucie', 'lucie.dupuis@gmail.com', '21 Rue du Mont-Blanc, Megève'),
(22, 'Renard', 'Jules', 'jules.renard@gmail.com', '22 Rue des Sports, Les Deux Alpes'),
(23, 'Marchand', 'Zoé', 'zoe.marchand@gmail.com', '23 Rue de la Forêt, Morzine'),
(24, 'Guillon', 'Eva', 'eva.guillon@gmail.com', '24 Rue des Alpages, Les Saisies'),
(25, 'Colin', 'Noah', 'noah.colin@gmail.com', '25 Rue des Pistes, Val Thorens'),
(26, 'Saadi', 'Aylan', 'aylano@gmail.com', '114 rue Henri Paraquet');

DROP TABLE IF EXISTS utilisateur;
CREATE TABLE utilisateur (
  idutilisateur INT NOT NULL AUTO_INCREMENT,
  nom VARCHAR(50) NOT NULL,
  prenom VARCHAR(50) NOT NULL,
  email VARCHAR(50) NOT NULL,
  mdp VARCHAR(255) NOT NULL,
  role ENUM('admin','agent','client') DEFAULT 'client',
  date_creation DATETIME DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (idutilisateur),
  UNIQUE KEY email (email)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO utilisateur (idutilisateur, nom, prenom, email, mdp, role, date_creation) VALUES
(1, 'Admin', 'Principal', 'admin@ns.com', 'admin123', 'admin', '2025-11-06 16:43:31'),
(2, 'Martin', 'Louis', 'louis.martin@gmail.com', 'mdp123', 'agent', '2025-11-06 16:43:31'),
(3, 'Dupont', 'Claire', 'claire.dupont@gmail.com', 'mdp123', 'client', '2025-11-06 16:43:31'),
(4, 'Durand', 'Julien', 'julien.durand@gmail.com', 'mdp123', 'client', '2025-11-06 16:43:31'),
(5, 'Bernard', 'Anne', 'anne.bernard@gmail.com', 'mdp123', 'agent', '2025-11-06 16:43:31'),
(6, 'Petit', 'Sophie', 'sophie.petit@gmail.com', 'mdp123', 'client', '2025-11-06 16:43:31'),
(7, 'Moreau', 'Thomas', 'thomas.moreau@gmail.com', 'mdp123', 'agent', '2025-11-06 16:43:31'),
(8, 'Benoit', 'Claire', 'claire.benoit@gmail.com', 'mdp123', 'client', '2025-11-06 16:43:31'),
(9, 'Leroy', 'Éric', 'eric.leroy@gmail.com', 'mdp123', 'client', '2025-11-06 16:43:31'),
(10, 'Roux', 'Camille', 'camille.roux@gmail.com', 'mdp123', 'client', '2025-11-06 16:43:31'),
(11, 'Faure', 'Lucas', 'lucas.faure@gmail.com', 'mdp123', 'agent', '2025-11-06 16:43:31'),
(12, 'Lambert', 'Julie', 'julie.lambert@gmail.com', 'mdp123', 'client', '2025-11-06 16:43:31'),
(13, 'Girard', 'Nicolas', 'nicolas.girard@gmail.com', 'mdp123', 'agent', '2025-11-06 16:43:31'),
(14, 'Besson', 'Marie', 'marie.besson@gmail.com', 'mdp123', 'client', '2025-11-06 16:43:31'),
(15, 'Caron', 'Hugo', 'hugo.caron@gmail.com', 'mdp123', 'client', '2025-11-06 16:43:31'),
(16, 'Leclerc', 'Emma', 'emma.leclerc@gmail.com', 'mdp123', 'agent', '2025-11-06 16:43:31'),
(17, 'Renaud', 'Paul', 'paul.renaud@gmail.com', 'mdp123', 'client', '2025-11-06 16:43:31'),
(18, 'Perrin', 'Lucie', 'lucie.perrin@gmail.com', 'mdp123', 'client', '2025-11-06 16:43:31'),
(19, 'Collet', 'Léo', 'leo.collet@gmail.com', 'mdp123', 'client', '2025-11-06 16:43:31'),
(20, 'Rolland', 'Nina', 'nina.rolland@gmail.com', 'mdp123', 'agent', '2025-11-06 16:43:31'),
(21, 'Noir', 'Maxime', 'maxime.noir@gmail.com', 'mdp123', 'client', '2025-11-06 16:43:31'),
(22, 'Masson', 'Laura', 'laura.masson@gmail.com', 'mdp123', 'agent', '2025-11-06 16:43:31'),
(23, 'Giraud', 'Hugo', 'hugo.giraud@gmail.com', 'mdp123', 'client', '2025-11-06 16:43:31'),
(24, 'Baron', 'Alice', 'alice.baron@gmail.com', 'mdp123', 'client', '2025-11-06 16:43:31'),
(25, 'Chevalier', 'Sarah', 'sarah.chevalier@gmail.com', 'mdp123', 'agent', '2025-11-06 16:43:31'),
(26, 'Aylan', 'Saadi', 'aylan@gmail.com', '$2y$10$jotN21yHsRymxbfJ18s6qu5qg50y1swHpETIpoxyh.qipf0Yy6lG6', 'admin', '2025-11-06 17:27:02');
