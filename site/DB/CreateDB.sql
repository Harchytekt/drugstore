CREATE DATABASE IF NOT EXISTS Drugstore
CHARACTER SET utf8
COLLATE utf8_general_ci;
USE Drugstore

CREATE TABLE IF NOT EXISTS Users (
    user_id INT(5) NOT NULL AUTO_INCREMENT,
    lastname VARCHAR(100) NOT NULL,
    firstname VARCHAR(100) NOT NULL,
    username VARCHAR(100) NOT NULL,
    password VARCHAR(128) NOT NULL,
    mail VARCHAR(125) NOT NULL,
    active INT(1) NOT NULL DEFAULT 1,
    CONSTRAINT pk_Users PRIMARY KEY(user_id),
    CONSTRAINT UC_Users UNIQUE (username, mail)
)
ENGINE = INNODB;

CREATE TABLE IF NOT EXISTS Medicines (
    medicine_id INT(5) NOT NULL AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    dosage VARCHAR(15) NOT NULL,
    contraindications VARCHAR(500) NOT NULL,
    noticeLink VARCHAR(100) NOT NULL,
    CONSTRAINT pk_Medicines PRIMARY KEY(medicine_id)
)
ENGINE = INNODB;

CREATE TABLE IF NOT EXISTS Lists (
    list_id INT(5) NOT NULL AUTO_INCREMENT,
    user_id INT(5),
    medicine_id INT(5),
    CONSTRAINT pk_Lists PRIMARY KEY(list_id),
    CONSTRAINT fk_lists_user_id_users FOREIGN KEY (user_id) REFERENCES Users(user_id),
    CONSTRAINT fk_lists_medicine_id_medicines FOREIGN KEY (medicine_id) REFERENCES Medicines(medicine_id)
)
ENGINE = INNODB;
