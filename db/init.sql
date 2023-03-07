CREATE DATABASE IF NOT EXISTS emi;
USE emi;
CREATE TABLE IF NOT EXISTS users(
  users_id int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  users_uid varchar(128) NOT NULL,
  users_email varchar(128) NOT NULL,
  users_pwd varchar(128) NOT NULL,
  users_role ENUM('admin', 'manager', 'user') NOT NULL
);
