CREATE DATABASE IF NOT EXISTS emi;
USE emi;
CREATE TABLE IF NOT EXISTS user
(
    user_id              int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
    user_uid             varchar(128)                       NOT NULL,
    user_email           varchar(128)                       NOT NULL,
    user_pwd             varchar(128)                       NOT NULL,
    user_role            ENUM ('admin', 'manager', 'user')  NOT NULL,
    user_organization_id Int
);

CREATE TABLE `organization`
(
    `organization_id`        Int PRIMARY KEY,
    `organization_name`      varchar,
    `organization_image_url` varchar
);

CREATE TABLE `worker`
(
    `worker_id`              Int PRIMARY KEY,
    `worker_firstname`       varchar NOT NULL,
    `worker_lastname`        varchar NOT NULL,
    `worker_code`            varchar NOT NULL,
    `worker_organization_id` Int
);

ALTER TABLE `user`
    ADD FOREIGN KEY (`user_organization_id`) REFERENCES `organization` (`organization_id`);

ALTER TABLE `worker`
    ADD FOREIGN KEY (`worker_organization_id`) REFERENCES `organization` (`organization_id`);
