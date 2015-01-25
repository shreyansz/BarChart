DROP DATABASE IF EXISTS eshdb;
CREATE DATABASE eshdb;
use eshdb;

CREATE TABLE schools (
name VARCHAR(255) NOT NULL,
ben INT NOT NULL,
PRIMARY KEY(name,ben) 
);

CREATE TABLE school_purchases (
ben INT NOT NULL,
bandwidth INT NOT NULL,
measure CHAR(1) NOT NULL,
cost INT NOT NULL
);