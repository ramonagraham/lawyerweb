CREATE DATABASE attorney_users;

use attorney_users;

IF NOT EXISTS CREATE TABLE users (
    user_id INT NOT NULL AUTO_INCREMENT,
    firstname VARCHAR(50) NOT NULL,
    lastname VARCHAR(50) NOT NULL,
    username VARCHAR(50) NOT NULL,
    passcode VARCHAR(100) NOT NULL,
    PRIMARY KEY (user_id)   
);

