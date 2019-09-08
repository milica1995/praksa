
CREATE DATABASE `network`

CREATE TABLE IF NOT EXISTS `network`.`accounts` 
( `id` INT NOT NULL AUTO_INCREMENT , 
`name` VARCHAR(60) NOT NULL , 
`email` VARCHAR(255) NOT NULL , 
`password` VARCHAR(255) NOT NULL , 
PRIMARY KEY (`id`), 
UNIQUE (`email`)) ENGINE = InnoDB;