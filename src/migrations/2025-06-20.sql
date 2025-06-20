/**
 * Author:  vladyslav
 * Created: 20 Jun 2025
 */

CREATE DATABASE IF NOT EXISTS `journal`;

use journal;

--user table
CREATE TABLE IF NOT EXISTS `user` (
    `id`	TINYINT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `name`	VARCHAR(40) NOT NULL,
    `email`	VARCHAR(20) NOT NULL,
    `date`	DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL
) ENGINE = InnoDB;

ALTER TABLE `user` CHANGE COLUMN `email` `email` VARCHAR(30) NOT NULL;
ALTER TABLE `user` ADD UNIQUE (`email`);

--data for user table
INSERT INTO `user` (`name`, `email`) VALUES('Vladyslav Sokolenko', 'vsokolenko1@gmail.com');

--TRANSACTION TABLE
CREATE TABLE IF NOT EXISTS transaction(
    `id`	mediumint NOT NULL PRIMARY KEY AUTO_INCREMENT,
    userId	tinyint UNSIGNED NOT NULL,
    `amount`	decimal(5,2),
    `check`	smallint NULL,
    `description` varchar(255) NOT NULL,
    `date`	datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY(userId)
	REFERENCES user(id)
        ON DELETE CASCADE
) ENGINE = InnoDB;

INSERT INTO transaction (`userId`, `amount`, `check`, `description`) values (1, 150.43, 7777, 'Transaction 1');