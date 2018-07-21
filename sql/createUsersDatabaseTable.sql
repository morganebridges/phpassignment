/**
 * Author:  Morgan.Bridges
 * Created: Jul 21, 2018
 */
USE USERS;
CREATE TABLE IF NOT EXISTS users(
    id int NOT NULL AUTO_INCREMENT,
    username varchar(64),
    password varchar(64),
    isActivated TINYINT DEFAULT 0,
    PRIMARY KEY(id)
);