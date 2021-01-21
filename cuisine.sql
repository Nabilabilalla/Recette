CREATE DATABASE cuisine;
USE cuisine;

CREATE USER IF NOT EXISTS 'delice'@'localhost' IDENTIFIED BY 'delice2021';
GRANT ALL ON cuisine.* TO 'delice'@'localhost';