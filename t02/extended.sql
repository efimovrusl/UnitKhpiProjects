use ucode_web;

CREATE TABLE IF NOT EXISTS powers (

    id INT(10) AUTO_INCREMENT PRIMARY KEY,
    hero_id INT(10) NOT NULL,
    name VARCHAR(30) NOT NULL,
    points INT NOT NULL,
    type ENUM('attack', 'defense') NOT NULL,

    FOREIGN KEY(hero_id) REFERENCES heroes(id) ON DELETE CASCADE

);

CREATE TABLE IF NOT EXISTS races (

    id INT(10) AUTO_INCREMENT PRIMARY KEY,
    hero_id INT(10) NOT NULL,
    name TEXT NOT NULL,

    FOREIGN KEY(hero_id) REFERENCES heroes(id) ON DELETE CASCADE

);

CREATE TABLE IF NOT EXISTS teams (

    id INT(10) AUTO_INCREMENT PRIMARY KEY,
    hero_id INT(10) NOT NULL,
    name TEXT NOT NULL,

    FOREIGN KEY(hero_id) REFERENCES heroes(id) ON DELETE CASCADE

);


INSERT INTO powers (hero_id, name, type, points) 
VALUES (1, 'bloody fist', 'attack', 110),
(1, 'iron shield', 'defense', 200),
(2, 'bloody fist', 'attack', 150),
(2, 'iron shield', 'defense', 90),
(3, 'bloody fist', 'attack', 300),
(4, 'iron shield', 'defense', 40);


INSERT INTO races (hero_id, name)
VALUES (1, 'Human'),
(2, 'Kree');


INSERT INTO teams (hero_id, name)
VALUES (1, 'Avengers'),
(1, 'Hydra'),
(2, 'Hydra'),
(4, 'Avengers'),
(3, 'Avengers'),
(11, 'Avengers'),
(11, 'Hydra');