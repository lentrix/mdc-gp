USE mdc;

DROP TABLE IF EXISTS `gp-users`;

CREATE TABLE `gp-users` (
    `idnum`         INTEGER UNSIGNED PRIMARY KEY,
    `username`      VARCHAR(25) NOT NULL UNIQUE,
    `password`      VARCHAR(255) NOT NULL,
    `last_login`    TIMESTAMP,
    FOREIGN KEY (`idnum`) REFERENCES stud_info(`idnum`)
);