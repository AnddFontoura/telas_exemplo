CREATE DATABASE IF NOT EXISTS telas_exemplo;

CREATE TABLE IF NOT EXISTS telas_exemplo.users (
    `id` BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `email` VARCHAR(254) NOT NULL UNIQUE,
    `password` VARCHAR(254) NOT NULL,
    `created_at` DATETIME NOT NULL DEFAULT NOW(),
    `updated_at` DATETIME NOT NULL DEFAULT NOW(),
    `deleted_at` DATETIME
);

CREATE TABLE IF NOT EXISTS telas_exemplo.products (
    `id` BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(254) NOT NULL,
    `sku` VARCHAR(254) NOT NULL,
    `description` VARCHAR(1028),
    `created_at` DATETIME NOT NULL DEFAULT NOW(),
    `updated_at` DATETIME NOT NULL DEFAULT NOW(),
    `deleted_at` DATETIME
);

CREATE TABLE IF NOT EXISTS telas_exemplo.user_settings (
    `id` BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `user_id` BIGINT UNSIGNED NOT NULL,
    `name` VARCHAR(254) NOT NULL,
    `ocupation` VARCHAR(254) NOT NULL,
    `city` VARCHAR(254),
    `state` VARCHAR(2),
    `birthdate` DATE NOT NULL,
    `created_at` DATETIME NOT NULL DEFAULT NOW(),
    `updated_at` DATETIME NOT NULL DEFAULT NOW(),
    `deleted_at` DATETIME,
    INDEX fk_user_settings_user_id (user_id),
    CONSTRAINT fk_user_user_settings FOREIGN KEY (user_id) REFERENCES users(id)
);

--11-04-2023
-- Adiciona campo de imagem
-- Adiciona campo de valor
ALTER TABLE products
ADD image_path VARCHAR(1000) NOT NULL;

