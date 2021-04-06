CREATE DATABASE ucode_web;

CREATE USER 'alyannoy'@'localhost' IDENTIFIED WITH mysql_native_password BY 'securepass';

GRANT ALL PRIVILEGES ON ucode_web . * TO 'alyannoy'@'localhost';