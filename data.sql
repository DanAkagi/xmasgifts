CREATE DATABASE xmasGift;
USE xmasGift;

CREATE TABLE cadeau (
    idCadeau INT AUTO_INCREMENT PRIMARY KEY,
    categorieCadeau VARCHAR(255) NOT NULL,
    nomCadeau VARCHAR(255) NOT NULL,
    prix INT NOT NULL, 
    
);

CREATE TABLE user (
    idUser INT AUTO_INCREMENT PRIMARY KEY,
    nomUser VARCHAR(255) NOT NULL,
    mdp VARCHAR(255) NOT NULL,
    depot FLOAT  NOT NULL
);

CREATE TABLE depot(
    idDepot INT AUTO_INCREMENT PRIMARY KEY,
    idUser INT,
    montant FLOAT NOT NULL,
    FOREIGN KEY (idUser) REFERENCES user(idUser)
);


-- Insertion des données dans la table cadeau
INSERT INTO cadeau (categorieCadeau, nomCadeau, prix) VALUES
('neutre', 'Puzzle 3D', 250),
('neutre', 'Casque Bluetooth', 1200),
('garcon', 'Roman fantastique', 300),
('fille', 'Bracelet en argent', 800),
('fille', 'Vase moderne', 500);

-- Insertion des données dans la table user
INSERT INTO user (nomUser, mdp, depot) VALUES
('Alice', 'password123', 0),
('Bob', 'securepwd456', 0),
('Charlie', 'mypassword789', 0),
('Diane', 'password2024', 0),
('Eve', 'safeandsecure001', 0);

-- Insertion des données dans la table depot
INSERT INTO depot (idUser, montant) VALUES
(1, 5000), -- Alice
(2, 3000), -- Bob
(3, 2000), -- Charlie
(4, 4000), -- Diane
(5, 3500); -- Eve
