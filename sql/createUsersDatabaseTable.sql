/**
 * A SQL Script that is responsible for creating our application's database tables
 * if they do not already exist
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

CREATE TABLE IF NOT EXISTS user_profile(
    id int NOT NULL AUTO_INCREMENT,
    display_name varchar(64),
    bio varchar(512),
    registration_date DATETIME,
    quote varchar(128),
    image_file varchar(64),
    user_fk int NOT NULL,
    FOREIGN KEY (user_fk)
    REFERENCES users(id)
    ON DELETE CASCADE,
    PRIMARY KEY(id)
);
