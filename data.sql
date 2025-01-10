CREATE DATABASE xmasGift;
USE xmasGift;

CREATE TABLE cadeau (
    idCadeau INT AUTO_INCREMENT PRIMARY KEY,
    categorieCadeau ENUM('fille','garcon','neutre') NOT NULL,
    nomCadeau VARCHAR(255) NOT NULL,
    prix INT NOT NULL,
    image_url VARCHAR(500)

);

CREATE TABLE user (
    idUser INT AUTO_INCREMENT PRIMARY KEY,
    nomUser VARCHAR(255) NOT NULL,
    mdp VARCHAR(255) NOT NULL,
    depot FLOAT DEFAULT(0)
);

CREATE TABLE depot(
    idDepot INT AUTO_INCREMENT PRIMARY KEY,
    idUser INT,
    montant FLOAT NOT NULL,
    FOREIGN KEY (idUser) REFERENCES user(idUser)
);


-- Insertion des données dans la table cadeau
INSERT INTO cadeau (idCadeau, categorieCadeau, nomCadeau, prix, image_url) VALUES
(51, 'fille', 'Poupée Barbie', 28, '/assets/images/3.jpg'),
(52, 'fille', 'Kit de maquillage', 12, '/assets/images/3.jpg'),
(53, 'fille', 'Journal intime', 8, '/assets/images/3.jpg'),
(54, 'fille', 'Set de bracelets', 15, '/assets/images/3.jpg'),
(55, 'fille', 'Cuisine jouet', 89, '/assets/images/3.jpg'),
(56, 'fille', 'Poupée LOL', 22, '/assets/images/3.jpg'),
(57, 'fille', 'Set de coiffure', 34, '/assets/images/3.jpg'),
(58, 'fille', 'Mallette artiste', 42, '/assets/images/3.jpg'),
(59, 'fille', 'Cheval à bascule', 95, '/assets/images/3.jpg'),
(60, 'fille', 'Kit de perles', 18, '/assets/images/3.jpg'),
(61, 'fille', 'Maison de poupée', 89, '/assets/images/3.jpg'),
(62, 'fille', 'Set de princesse', 32, '/assets/images/3.jpg'),
(63, 'fille', 'Licorne peluche', 28, '/assets/images/3.jpg'),
(64, 'fille', 'Kit création bijoux', 38, '/assets/images/3.jpg'),
(65, 'fille', 'Accessoires cheveux', 7, '/assets/images/3.jpg'),
(66, 'garcon', 'Voiture télécommandée', 42, '/assets/images/3.jpg'),
(67, 'garcon', 'Robot jouet', 65, '/assets/images/3.jpg'),
(68, 'garcon', 'Ballon de foot', 12, '/assets/images/3.jpg'),
(69, 'garcon', 'Set de voitures', 32, '/assets/images/3.jpg'),
(70, 'garcon', 'Pistolet Nerf', 28, '/assets/images/3.jpg'),
(71, 'garcon', 'Jeu de construction', 89, '/assets/images/3.jpg'),
(72, 'garcon', 'Dinosaure articulé', 23, '/assets/images/3.jpg'),
(73, 'garcon', 'Set de super-héros', 45, '/assets/images/3.jpg'),
(74, 'garcon', 'Garage miniature', 78, '/assets/images/3.jpg'),
(75, 'garcon', 'Hélicoptère jouet', 18, '/assets/images/3.jpg'),
(76, 'garcon', 'Set de pirates', 34, '/assets/images/3.jpg'),
(77, 'garcon', 'Camion de pompier', 55, '/assets/images/3.jpg'),
(78, 'garcon', 'Set de policier', 27, '/assets/images/3.jpg'),
(79, 'garcon', 'Train électrique', 95, '/assets/images/3.jpg'),
(80, 'garcon', 'Skateboard', 38, '/assets/images/3.jpg'),
(81, 'neutre', 'Puzzle 100 pièces', 18, '/assets/images/3.jpg'),
(82, 'neutre', 'Jeu de société', 32, '/assets/images/3.jpg'),
(83, 'neutre', 'Livre éducatif', 15, '/assets/images/3.jpg'),
(84, 'neutre', 'Peluche animal', 22, '/assets/images/3.jpg'),
(85, 'neutre', 'Kit de peinture', 28, '/assets/images/3.jpg'),
(86, 'neutre', 'Jeu de cartes', 8, '/assets/images/3.jpg'),
(87, 'neutre', 'Microscope enfant', 65, '/assets/images/3.jpg'),
(88, 'neutre', 'Pâte à modeler', 12, '/assets/images/3.jpg'),
(89, 'neutre', 'Instrument musique', 42, '/assets/images/3.jpg'),
(90, 'neutre', 'Kit jardinage', 25, '/assets/images/3.jpg'),
(91, 'neutre', 'Jumelles enfant', 34, '/assets/images/3.jpg'),
(92, 'neutre', 'Set de magie', 27, '/assets/images/3.jpg'),
(93, 'neutre', 'Globe terrestre', 55, '/assets/images/3.jpg'),
(94, 'neutre', 'Jeu de memory', 13, '/assets/images/3.jpg'),
(95, 'neutre', 'Kit expériences', 45, '/assets/images/3.jpg'),
(96, 'neutre', 'Origami kit', 7, '/assets/images/3.jpg'),
(97, 'neutre', 'Tente de jeu', 78, '/assets/images/3.jpg'),
(98, 'neutre', 'Casse-tête', 23, '/assets/images/3.jpg'),
(99, 'neutre', 'Tableau noir', 38, '/assets/images/3.jpg');


-- Insertion des données dans la table user
INSERT INTO user (nomUser, mdp) VALUES
('Alice', 'password123'),
('Bob', 'securepwd456'),
('Charlie', 'mypassword789'),
('Diane', 'password2024'),
('Eve', 'safeandsecure001');

-- Insertion des données dans la table depot
INSERT INTO depot (idUser, montant) VALUES
(1, 5000), -- Alice
(2, 3000), -- Bob
(3, 2000), -- Charlie
(4, 4000), -- Diane
(5, 3500); -- Eve

SELECT * FROM cadeau
WHERE prix < 50
ORDER BY RAND()
LIMIT 5;

SELECT * FROM (
    (SELECT *      
    FROM cadeau     
    WHERE categorieCadeau = 'fille'     
    ORDER BY RAND()     
    LIMIT 3) 
    UNION ALL 
    (SELECT *      
    FROM cadeau     
    WHERE categorieCadeau = 'garcon'     
    ORDER BY RAND()     
    LIMIT 2) 
    UNION ALL 
    (SELECT *      
    FROM cadeau     
    WHERE categorieCadeau = 'neutre'     
    ORDER BY RAND()     
    LIMIT 4)
) AS subquery
ORDER BY RAND();


