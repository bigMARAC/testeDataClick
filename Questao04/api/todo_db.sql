CREATE DATABASE IF NOT EXISTS `todo_db`;
USE todo_db;
CREATE TABLE IF NOT EXISTS `tasks` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `description` text,
  `priority` int NOT NULL,
  PRIMARY KEY (id)
);