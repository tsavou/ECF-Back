CREATE DATABASE literie3000;

USE literie3000;

-- CREATE TABLE dimensions (
--     id INT PRIMARY KEY AUTO_INCREMENT,
--     name VARCHAR(100) NOT NULL
-- );

CREATE TABLE matelas (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL, 
    marque VARCHAR(100),
    dimensions VARCHAR(10),
    poster VARCHAR(255) NOT NULL,
    prix INT NOT NULL,
    promotion INT 
);

INSERT INTO matelas (name, marque, dimensions, poster, prix, promotion) VALUES 
('Matelas Brigitte', 'Epeda', '90x190', '../public/assets/img/poster/Brigitte.png', 759, 130),
('Matelas Marine', 'Dreamway', '140x90', '../public/assets/img/poster/Marine.png', 809, 100),
('Matelas Positive attitude', 'Bultex', '160x200', '../public/assets/img/poster/Positive.png', 759, 230),
('Matelas Buro Club', 'Epeda', '180x200', '../public/assets/img/poster/Buroclub.png', 1019, 0)


-- INSERT INTO dimensions (name) VALUES 
-- ('90x190'),
-- ('140x90'),
-- ('160x200'),
-- ('180x200'),
-- ('200x200');







