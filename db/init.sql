CREATE DATABASE IF NOT EXISTS phplogin;
USE ooplogin;
CREATE TABLE IF NOT EXISTS users(
  usersId int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  usersUid varchar(128) NOT NULL,
  usersEmail varchar(128) NOT NULL,
  usersPwd varchar(128) NOT NULL
);
