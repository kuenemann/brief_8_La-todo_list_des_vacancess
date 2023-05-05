START TRANSACTION;

DROP DATABASE IF EXISTS task;

CREATE DATABASE IF NOT EXISTS `TODO-LIST-VACANSES`;

USE `TODO-LIST-VACANSES`;

CREATE TABLE IF NOT EXISTS task (
    id INT(10) NOT NULL AUTO_INCREMENT,
    title VARCHAR(50) NOT NULL,
    description VARCHAR(150) NOT NULL,
    important_bool BOOL NOT NULL DEFAULT FALSE,
    PRIMARY KEY (id)
);

INSERT INTO task (title, description)
VALUES (
    'Faire les courses',
    'Acheter du pain, du lait et des œufs au supermarché.'
);


