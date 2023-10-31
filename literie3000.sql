CREATE DATABASE literie3000;

USE literie3000;

CREATE TABLE brands (
	id TINYINT PRIMARY KEY AUTO_INCREMENT,
	name VARCHAR(50) NOT NULL
);

CREATE TABLE dimensions (
    id TINYINT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL
);

CREATE TABLE matelas (
    id SMALLINT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL, 
    poster VARCHAR(255),
    prix DECIMAL(6,2) NOT NULL,
    promotion DECIMAL(6,2),
    id_dimension TINYINT,
	id_brand TINYINT,
	FOREIGN KEY (id_brand) REFERENCES brands(id),
	FOREIGN KEY (id_dimension) REFERENCES dimensions(id)
);

INSERT INTO brands 
(name) 
VALUES
("Epeda"),
("Dreamway"),
("Bultex"),
("Dorsoline"),
("MemoryLine");

INSERT INTO dimensions
(name)
VALUES
("90x190"),
("140x190"),
("160x200"),
("180x200"),
("200x200");

INSERT INTO matelas (name, poster, prix, promotion, id_brand, id_dimension) VALUES 
('Matelas Brigitte', 'Brigitte.png', 759, 130, 1, 4),
('Matelas Marine', 'Marine.png', 809, 100, 2, 2),
('Matelas Positive attitude', 'Positive.png', 759, 230, 3, 1),
('Matelas Buro Club', 'Buroclub.png', 1019, 0, 5, 5);










