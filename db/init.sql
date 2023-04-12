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
    `worker_id`       Int PRIMARY KEY,
    `worker_name`     varchar NOT NULL,
    `worker_organization_id` Int     NOT NULL
);

CREATE TABLE `device`
(
    `device_id`              Int PRIMARY KEY,
    `device_serial`          varchar NOT NULL,
    `device_organization_id` Int     NOT NULL
);

CREATE TABLE `link`
(
    `link_id`             Int PRIMARY KEY,
    `link_start_datetime` DateTime NOT NULL,
    `link_end_datetime`   DateTime,
    `link_device_id`      Int,
    `link_worker_id`      Int
);

CREATE TABLE `forum_topic`
(
    `forum_topic_id`            Int PRIMARY KEY,
    `forum_topic_title`         varchar,
    `forum_topic_content`       varchar,
    `forum_topic_user_id`       Int,
    `forum_topic_created_at`    datetime DEFAULT CURRENT_TIMESTAMP,
    `forum_topic_last_modified` datetime DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE `forum_answer`
(
    `forum_answer_id`            Int PRIMARY KEY,
    `forum_answer_topic_id`      Int,
    `forum_answer_user_id`       Int,
    `forum_answer_content`       varchar,
    `forum_answer_created_at`    datetime DEFAULT CURRENT_TIMESTAMP,
    `forum_answer_last_modified` datetime DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE `forum_vote`
(
    `forum_vote_id`         Int PRIMARY KEY,
    `forum_vote_topic_id`   Int,
    `forum_vote_user_id`    Int,
    `forum_vote_created_at` datetime DEFAULT CURRENT_TIMESTAMP,
    `forum_vote_value`      bit
);

ALTER TABLE `forum_topic`
    ADD FOREIGN KEY (`forum_topic_user_id`) REFERENCES `user` (`user_id`);

ALTER TABLE `forum_answer`
    ADD FOREIGN KEY (`forum_answer_topic_id`) REFERENCES `forum_topic` (`forum_topic_id`);

ALTER TABLE `forum_answer`
    ADD FOREIGN KEY (`forum_answer_user_id`) REFERENCES `user` (`user_id`);

ALTER TABLE `forum_vote`
    ADD FOREIGN KEY (`forum_vote_topic_id`) REFERENCES `forum_topic` (`forum_topic_id`);

ALTER TABLE `forum_vote`
    ADD FOREIGN KEY (`forum_vote_user_id`) REFERENCES `user` (`user_id`);

ALTER TABLE `user`
    ADD FOREIGN KEY (`user_organization_id`) REFERENCES `organization` (`organization_id`);

ALTER TABLE `worker`
    ADD FOREIGN KEY (`worker_organization_id`) REFERENCES `organization` (`organization_id`);

ALTER TABLE `device`
    ADD FOREIGN KEY (`device_organization_id`) REFERENCES `organization` (`organization_id`);

ALTER TABLE `link`
    ADD FOREIGN KEY (`link_device_id`) REFERENCES `device` (`device_id`);

ALTER TABLE `link`
    ADD FOREIGN KEY (`link_worker_id`) REFERENCES `worker` (`worker_id`);
