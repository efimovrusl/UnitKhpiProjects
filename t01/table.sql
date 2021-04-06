use ucode_web;

CREATE TABLE IF NOT EXISTS heroes (

    id INT(10) AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) UNIQUE NOT NULL,
    description TEXT NOT NULL,
    race VARCHAR(10) DEFAULT 'human' NOT NULL,
    class_role ENUM('tankman', 'healer', 'dps') NOT NULL

);