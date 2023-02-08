CREATE DATABASE IF NOT EXISTS ooplogin;
USE ooplogin;
CREATE TABLE IF NOT EXISTS users(
  users_id int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  users_uid varchar(128) NOT NULL,
  users_email varchar(128) NOT NULL,
  users_pwd varchar(128) NOT NULL
);
