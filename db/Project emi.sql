CREATE TABLE `Organization` (
  `id` Int PRIMARY KEY,
  `name` varchar,
  `image_url` varchar
);

CREATE TABLE `User` (
  `id` Int PRIMARY KEY,
  `role` ENUM ('ADMIN', 'MANAGER', 'USER'),
  `email` varchar UNIQUE NOT NULL,
  `password` varchar,
  `name` varchar,
  `organization_id` Int
);

CREATE TABLE `Worker` (
  `id` Int PRIMARY KEY,
  `name` varchar NOT NULL,
  `organization_id` Int NOT NULL
);

CREATE TABLE `Device` (
  `id` Int PRIMARY KEY,
  `serial` varchar NOT NULL,
  `organization_id` Int NOT NULL
);

CREATE TABLE `Link` (
  `id` Int PRIMARY KEY,
  `start_datetime` DateTime NOT NULL,
  `end_datetime` DateTime,
  `device_id` Int,
  `worker_id` Int
);

CREATE TABLE `Forum_topic` (
  `id` Int PRIMARY KEY,
  `title` varchar,
  `content` varchar,
  `user_id` Int,
  `created_at` datetime DEFAULT "now()",
  `last_modified` datetime DEFAULT "now()"
);

CREATE TABLE `Forum_answer` (
  `id` Int PRIMARY KEY,
  `topic_id` Int,
  `user_id` Int,
  `content` varchar,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `last_modified` datetime DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE `Forum_vote` (
  `id` Int PRIMARY KEY,
  `topic_id` Int,
  `user_id` Int,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `value` bit
);

ALTER TABLE `Forum_topic` ADD FOREIGN KEY (`user_id`) REFERENCES `User` (`id`);

ALTER TABLE `Forum_answer` ADD FOREIGN KEY (`topic_id`) REFERENCES `Forum_topic` (`id`);

ALTER TABLE `Forum_answer` ADD FOREIGN KEY (`user_id`) REFERENCES `User` (`id`);

ALTER TABLE `Forum_vote` ADD FOREIGN KEY (`topic_id`) REFERENCES `Forum_topic` (`id`);

ALTER TABLE `Forum_vote` ADD FOREIGN KEY (`user_id`) REFERENCES `User` (`id`);

ALTER TABLE `User` ADD FOREIGN KEY (`organization_id`) REFERENCES `Organization` (`id`);

ALTER TABLE `Worker` ADD FOREIGN KEY (`organization_id`) REFERENCES `Organization` (`id`);

ALTER TABLE `Device` ADD FOREIGN KEY (`organization_id`) REFERENCES `Organization` (`id`);

ALTER TABLE `Link` ADD FOREIGN KEY (`device_id`) REFERENCES `Device` (`id`);

ALTER TABLE `Link` ADD FOREIGN KEY (`worker_id`) REFERENCES `Worker` (`id`);
