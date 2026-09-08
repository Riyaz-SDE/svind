-- SIVIND — database schema
-- Import this file in phpMyAdmin (http://localhost/phpmyadmin) or run:
--   mysql -u root < database.sql

CREATE DATABASE IF NOT EXISTS `sivind`
  DEFAULT CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci;

USE `sivind`;

CREATE TABLE IF NOT EXISTS `enquiries` (
  `id`          INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name`        VARCHAR(100)  NOT NULL,
  `email`       VARCHAR(255)  NOT NULL,
  `contact`     VARCHAR(30)   NOT NULL,
  `description` TEXT          NOT NULL,
  `ip_address`  VARCHAR(45)   DEFAULT NULL,
  `created_at`  DATETIME      NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `idx_created_at` (`created_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
