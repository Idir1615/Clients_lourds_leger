drop database if exists ns ; 
create database ns; 
use ns;

-- Table Client
CREATE TABLE IF NOT EXISTS Client (
    idclient INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(50) NOT NULL,
    prenom VARCHAR(50) NOT NULL,
    email VARCHAR(50) UNIQUE NOT NULL,
    adresse TEXT NOT NULL
);

-- Table Proprietaire
CREATE TABLE IF NOT EXISTS Proprietaire (
    idproprio INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(50) NOT NULL,
    prenom VARCHAR(50) NOT NULL,
    email VARCHAR(50) UNIQUE NOT NULL,
    adresse TEXT NOT NULL
);

-- Table Appartement
CREATE TABLE IF NOT EXISTS Appartement (
    idappart INT AUTO_INCREMENT PRIMARY KEY,
    adresse TEXT NOT NULL,
    surface DECIMAL(10, 2) NOT NULL,
    designation VARCHAR(50) NOT NULL,
    idproprio INT NOT NULL,
    FOREIGN KEY (idproprio) REFERENCES Proprietaire(idproprio) ON DELETE CASCADE
);

-- Table Location
CREATE TABLE IF NOT EXISTS Location (
    idlocation INT AUTO_INCREMENT PRIMARY KEY,
    dateDebut DATE NOT NULL,
    dateFin DATE,
    description TEXT,
    idappart INT NOT NULL,
    idclient INT NOT NULL,
    FOREIGN KEY (idappart) REFERENCES Appartement(idappart) ON DELETE CASCADE,
    FOREIGN KEY (idclient) REFERENCES Client(idclient) ON DELETE CASCADE
);

-- Table Utilisateur
CREATE TABLE IF NOT EXISTS Utilisateur (
    idutilisateur INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(50) NOT NULL,
    prenom VARCHAR(50) NOT NULL,
    email VARCHAR(50) UNIQUE NOT NULL,
    mdp VARCHAR(255) NOT NULL,
    role ENUM('admin', 'agent', 'client') DEFAULT 'client',
    date_creation DATETIME DEFAULT CURRENT_TIMESTAMP
);


-- cliant
INSERT INTO Client (nom, prenom, email, adresse) VALUES
('Dupont', 'Claire', 'claire.dupont@gmail.com', '12 Rue de la République, Paris'),
('Martin', 'Louis', 'louis.martin@gmail.com', '5 Avenue de l’Opéra, Lyon'),
('Durand', 'Julien', 'julien.durand@gmail.com', '22 Rue Victor Hugo, Marseille'),
('Bernard', 'Anne', 'anne.bernard@gmail.com', '8 Rue Lafayette, Toulouse'),
('Petit', 'Sophie', 'sophie.petit@gmail.com', '14 Boulevard Saint-Michel, Nice'),
('Moreau', 'Thomas', 'thomas.moreau@gmail.com', '3 Rue du Général Leclerc, Bordeaux'),
('Benoit', 'Claire', 'claire.benoit@gmail.com', '11 Rue Jean Jaurès, Lille'),
('Leroy', 'Éric', 'eric.leroy@gmail.com', '7 Rue Nationale, Nantes'),
('Roux', 'Camille', 'camille.roux@gmail.com', '19 Rue de Metz, Strasbourg'),
('Faure', 'Lucas', 'lucas.faure@gmail.com', '25 Rue de Lyon, Grenoble'),
('Lambert', 'Julie', 'julie.lambert@gmail.com', '10 Rue des Alpes, Annecy'),
('Girard', 'Nicolas', 'nicolas.girard@gmail.com', '3 Rue du Lac, Chamonix'),
('Besson', 'Marie', 'marie.besson@gmail.com', '7 Avenue des Neiges, Val d’Isère'),
('Caron', 'Hugo', 'hugo.caron@gmail.com', '9 Rue Mont-Blanc, Megève'),
('Leclerc', 'Emma', 'emma.leclerc@gmail.com', '5 Chemin du Glacier, Tignes'),
('Renaud', 'Paul', 'paul.renaud@gmail.com', '4 Rue des Sports, Les Deux Alpes'),
('Perrin', 'Lucie', 'lucie.perrin@gmail.com', '6 Rue de la Forêt, Briançon'),
('Collet', 'Léo', 'leo.collet@gmail.com', '12 Route des Chalets, Morzine'),
('Rolland', 'Nina', 'nina.rolland@gmail.com', '17 Rue des Sapins, La Clusaz'),
('Noir', 'Maxime', 'maxime.noir@gmail.com', '10 Rue du Jura, Les Rousses'),
('Masson', 'Laura', 'laura.masson@gmail.com', '8 Rue du Mont-Dore, Super-Besse'),
('Giraud', 'Hugo', 'hugo.giraud@gmail.com', '5 Rue du Reposoir, Avoriaz'),
('Baron', 'Alice', 'alice.baron@gmail.com', '11 Avenue des Cimes, Les Arcs'),
('Lemoine', 'Lucas', 'lucas.lemoine@gmail.com', '13 Rue des Pistes, Courchevel'),
('Chevalier', 'Sarah', 'sarah.chevalier@gmail.com', '9 Rue des Sommets, Serre-Chevalier');


-- proprietaire 
INSERT INTO Proprietaire (nom, prenom, email, adresse) VALUES
('Morel', 'Pierre', 'pierre.morel@gmail.com', '1 Rue des Chalets, Chamonix'),
('Fontaine', 'Isabelle', 'isabelle.fontaine@gmail.com', '2 Rue du Lac, Annecy'),
('Clement', 'Jean', 'jean.clement@gmail.com', '3 Rue des Pistes, Megève'),
('Riviere', 'Sophie', 'sophie.riviere@gmail.com', '4 Rue de la Montagne, Val d’Isère'),
('Mercier', 'Antoine', 'antoine.mercier@gmail.com', '5 Rue du Glacier, Tignes'),
('Garnier', 'Claire', 'claire.garnier@gmail.com', '6 Rue des Alpages, Les Deux Alpes'),
('Blanc', 'Paul', 'paul.blanc@gmail.com', '7 Rue de la Forêt, Morzine'),
('Lopez', 'Emma', 'emma.lopez@gmail.com', '8 Rue des Sapins, La Clusaz'),
('Fabre', 'Julien', 'julien.fabre@gmail.com', '9 Rue du Reposoir, Avoriaz'),
('Henry', 'Lucas', 'lucas.henry@gmail.com', '10 Rue des Cimes, Les Arcs'),
('Guillet', 'Marie', 'marie.guillet@gmail.com', '11 Rue des Sommets, Courchevel'),
('Lemoine', 'Thomas', 'thomas.lemoine@gmail.com', '12 Rue du Jura, Les Rousses'),
('Giraud', 'Camille', 'camille.giraud@gmail.com', '13 Rue du Mont-Dore, Super-Besse'),
('Bailly', 'Nina', 'nina.bailly@gmail.com', '14 Rue des Chalets, Briançon'),
('Adam', 'Olivier', 'olivier.adam@gmail.com', '15 Rue du Glacier, Tignes'),
('Besson', 'Manon', 'manon.besson@gmail.com', '16 Rue des Alpes, Chamonix'),
('Caron', 'Léa', 'lea.caron@gmail.com', '17 Rue des Sapins, La Clusaz'),
('Legrand', 'Hugo', 'hugo.legrand@gmail.com', '18 Rue du Reposoir, Avoriaz'),
('Michel', 'Alice', 'alice.michel@gmail.com', '19 Avenue des Cimes, Les Arcs'),
('Poirier', 'Maxime', 'maxime.poirier@gmail.com', '20 Rue des Sommets, Serre-Chevalier'),
('Dupuis', 'Lucie', 'lucie.dupuis@gmail.com', '21 Rue du Mont-Blanc, Megève'),
('Renard', 'Jules', 'jules.renard@gmail.com', '22 Rue des Sports, Les Deux Alpes'),
('Marchand', 'Zoé', 'zoe.marchand@gmail.com', '23 Rue de la Forêt, Morzine'),
('Guillon', 'Eva', 'eva.guillon@gmail.com', '24 Rue des Alpages, Les Saisies'),
('Colin', 'Noah', 'noah.colin@gmail.com', '25 Rue des Pistes, Val Thorens');

-- location
INSERT INTO Location (dateDebut, dateFin, description, idappart, idclient) VALUES
('2025-01-05', '2025-03-05', 'Location courte durée', 1, 1),
('2025-02-10', '2025-04-10', 'Location meublée', 2, 2),
('2025-03-01', '2025-05-01', 'Séjour ski familial', 3, 3),
('2025-04-15', '2025-06-15', 'Location saisonnière', 4, 4),
('2025-05-20', '2025-07-20', 'Vacances à la montagne', 5, 5),
('2025-06-01', '2025-08-01', 'Location courte durée', 6, 6),
('2025-07-10', '2025-09-10', 'Séjour estival', 7, 7),
('2025-08-05', '2025-10-05', 'Location meublée', 8, 8),
('2025-09-01', '2025-11-01', 'Séjour longue durée', 9, 9),
('2025-10-10', '2026-01-10', 'Hiver au ski', 10, 10),
('2025-11-01', '2026-02-01', 'Saison de neige', 11, 11),
('2025-11-15', '2026-03-15', 'Location longue durée', 12, 12),
('2025-12-01', '2026-02-28', 'Séjour ski', 13, 13),
('2025-12-15', '2026-04-15', 'Vacances familiales', 14, 14),
('2026-01-01', '2026-05-01', 'Location montagne', 15, 15),
('2026-02-01', '2026-06-01', 'Location meublée', 16, 16),
('2026-03-01', '2026-07-01', 'Séjour printemps', 17, 17),
('2026-04-01', '2026-08-01', 'Location été', 18, 18),
('2026-05-01', '2026-09-01', 'Séjour famille', 19, 19),
('2026-06-01', '2026-10-01', 'Location longue durée', 20, 20),
('2026-07-01', '2026-11-01', 'Saison montagne', 21, 21),
('2026-08-01', '2026-12-01', 'Location meublée', 22, 22),
('2026-09-01', '2027-01-01', 'Vacances d’hiver', 23, 23),
('2026-10-01', '2027-02-01', 'Séjour ski', 24, 24),
('2026-11-01', '2027-03-01', 'Location saisonnière', 25, 25);


-- utilisateur 
INSERT INTO Utilisateur (nom, prenom, email, mdp, role) VALUES
('Admin', 'Principal', 'admin@ns.com', 'admin123', 'admin'),
('Martin', 'Louis', 'louis.martin@gmail.com', 'mdp123', 'agent'),
('Dupont', 'Claire', 'claire.dupont@gmail.com', 'mdp123', 'client'),
('Durand', 'Julien', 'julien.durand@gmail.com', 'mdp123', 'client'),
('Bernard', 'Anne', 'anne.bernard@gmail.com', 'mdp123', 'agent'),
('Petit', 'Sophie', 'sophie.petit@gmail.com', 'mdp123', 'client'),
('Moreau', 'Thomas', 'thomas.moreau@gmail.com', 'mdp123', 'agent'),
('Benoit', 'Claire', 'claire.benoit@gmail.com', 'mdp123', 'client'),
('Leroy', 'Éric', 'eric.leroy@gmail.com', 'mdp123', 'client'),
('Roux', 'Camille', 'camille.roux@gmail.com', 'mdp123', 'client'),
('Faure', 'Lucas', 'lucas.faure@gmail.com', 'mdp123', 'agent'),
('Lambert', 'Julie', 'julie.lambert@gmail.com', 'mdp123', 'client'),
('Girard', 'Nicolas', 'nicolas.girard@gmail.com', 'mdp123', 'agent'),
('Besson', 'Marie', 'marie.besson@gmail.com', 'mdp123', 'client'),
('Caron', 'Hugo', 'hugo.caron@gmail.com', 'mdp123', 'client'),
('Leclerc', 'Emma', 'emma.leclerc@gmail.com', 'mdp123', 'agent'),
('Renaud', 'Paul', 'paul.renaud@gmail.com', 'mdp123', 'client'),
('Perrin', 'Lucie', 'lucie.perrin@gmail.com', 'mdp123', 'client'),
('Collet', 'Léo', 'leo.collet@gmail.com', 'mdp123', 'client'),
('Rolland', 'Nina', 'nina.rolland@gmail.com', 'mdp123', 'agent'),
('Noir', 'Maxime', 'maxime.noir@gmail.com', 'mdp123', 'client'),
('Masson', 'Laura', 'laura.masson@gmail.com', 'mdp123', 'agent'),
('Giraud', 'Hugo', 'hugo.giraud@gmail.com', 'mdp123', 'client'),
('Baron', 'Alice', 'alice.baron@gmail.com', 'mdp123', 'client'),
('Chevalier', 'Sarah', 'sarah.chevalier@gmail.com', 'mdp123', 'agent');


-- appartement 
INSERT INTO Appartement (adresse, surface, designation, idproprio) VALUES
('12 Rue des Dunes, Biarritz', 70.00, 'Appartement surf avec vue sur l’océan', 1),
('8 Avenue des Plages, Hossegor', 65.00, 'T2 moderne à 200m de la plage', 2),
('5 Rue du Port, Lacanau-Océan', 80.00, 'Appartement lumineux pour surfeurs', 3),
('3 Allée des Mouettes, Anglet', 55.00, 'Studio en bord de mer', 4),
('14 Rue des Sables, Saint-Jean-de-Luz', 90.00, 'T3 avec terrasse face à la mer', 5);

-- 🏔️ Ski / Neige / Montagne
('10 Rue du Mont-Blanc, Chamonix', 75.00, 'Appartement vue Mont-Blanc', 6),
('22 Route du Col, Tignes', 85.00, 'T3 proche des remontées mécaniques', 7),
('8 Chemin du Glacier, Les Deux Alpes', 95.00, 'Appartement familial balcon panoramique', 8),
('14 Rue des Chalets, Megève', 120.00, 'Chalet luxueux centre station', 9),
('19 Rue du Reposoir, Avoriaz', 80.00, 'Studio moderne ski-in ski-out', 10),

-- 🥾 Randonnée / Nature / Lacs
('25 Chemin du Lac, Annecy', 65.00, 'Appartement vue lac et montagne', 11),
('6 Rue des Gorges, Verdon-sur-Mer', 70.00, 'Appartement pour amateurs de canyoning', 12),
('9 Rue du Massif, Les Écrins', 90.00, 'T3 idéal pour randonneurs', 13),
('4 Rue des Forêts, Gérardmer', 75.00, 'Appartement nature près du lac', 14),
('3 Route du Pic, Cauterets', 85.00, 'Appartement avec accès sentiers de montagne', 15),

-- 🚴‍♂️ / Parapente / Escalade / Aventure
('7 Rue des Airs, Millau', 95.00, 'Appartement proche du viaduc, spot parapente', 16),
('15 Rue des Falaises, Cassis', 70.00, 'Appartement avec vue sur les calanques', 17),
('11 Chemin du Rocher, Fontaine-de-Vaucluse', 80.00, 'Appartement pour escalade et kayak', 18),
('9 Avenue du Ventoux, Bédoin', 85.00, 'Appartement pour cyclistes du Mont Ventoux', 19),
('17 Rue du Cirque, Gavarnie', 90.00, 'Appartement face aux montagnes', 20),

-- 🌅 Campagne / Détente / Mixte
('2 Rue du Château, Annecy-le-Vieux', 100.00, 'Appartement calme entre lac et montagne', 21),
('5 Rue du Bourg, Argelès-sur-Mer', 60.00, 'T2 entre mer et montagne', 22),
('13 Rue du Lac Bleu, Gérardmer', 70.00, 'Appartement cosy avec cheminée', 23),
('8 Rue des Pins, Capbreton', 75.00, 'Appartement entre océan et forêt', 24),
('10 Rue du Village, Morzine', 90.00, 'Appartement typique montagne et nature', 25);


