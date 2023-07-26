CREATE DATABASE IF NOT EXISTS test_db;
-- USE bb_market;

-- START TRANSACTION;

-- CREATE TABLE `users` (
--   `id` INT NOT NULL AUTO_INCREMENT,
--   `username` VARCHAR(255) NOT NULL,
--   `age` INT NOT NULL,
--   `tel` VARCHAR(255) NOT NULL,
--   `zip` INT NOT NULL,
--   `addr` VARCHAR(255) NOT NULL,
--   `email` VARCHAR(255) NOT NULL,
--   `pic` VARCHAR(255) NOT NULL,
--   `password` VARCHAR(255) NOT NULL,
--   `delete_flg` TINYINT NOT NULL DEFAULT 0,
--   `login_time` DATETIME NOT NULL,
--   `create_date` DATETIME NOT NULL,
--   `update_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
--   PRIMARY KEY (`id`)
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- CREATE TABLE `category` (
--   `id` INT NOT NULL AUTO_INCREMENT,
--   `name` VARCHAR(255) NOT NULL,
--   `delete_flg` TINYINT NOT NULL DEFAULT 0,
--   `create_date` DATETIME NOT NULL,
--   `update_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
--   PRIMARY KEY (`id`)
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- CREATE TABLE `maker` (
--   `id` INT NOT NULL AUTO_INCREMENT,
--   `name` VARCHAR(255) NOT NULL,
--   `delete_flg` TINYINT NOT NULL DEFAULT 0,
--   `create_date` DATETIME NOT NULL,
--   `update_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
--   PRIMARY KEY (`id`)
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- CREATE TABLE `product` (
--   `id` INT NOT NULL AUTO_INCREMENT,
--   `name` VARCHAR(255) NOT NULL,
--   `maker_id` INT NOT NULL,
--   `category_id` INT NOT NULL,
--   `comment` VARCHAR(255) NOT NULL,
--   `price` INT NOT NULL,
--   `pic1` VARCHAR(255) NOT NULL,
--   `pic2` VARCHAR(255) NOT NULL,
--   `pic3` VARCHAR(255) NOT NULL,
--   `user_id` INT NOT NULL,
--   `delete_flg` TINYINT NOT NULL DEFAULT 0,
--   `create_date` DATETIME NOT NULL,
--   `update_date` timestamp NOT NULL DEFAULT current_timestamp(),
--   PRIMARY KEY (`id`)
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- CREATE TABLE `bord` (
--   `id` INT NOT NULL AUTO_INCREMENT,
--   `sale_user` INT NOT NULL,
--   `product_id` INT NOT NULL,
--   `buy_user` INT NOT NULL,
--   `delete_flg` TINYINT NOT NULL DEFAULT 0,
--   `create_date` DATETIME NOT NULL,
--   `update_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
--   PRIMARY KEY (`id`)
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- CREATE TABLE `message` (
--   `id` INT NOT NULL AUTO_INCREMENT,
--   `bord_id` INT NOT NULL,
--   `send_date` datetime NOT NULL,
--   `to_user` INT NOT NULL,
--   `from_user` INT NOT NULL,
--   `msg` varchar(255) NOT NULL,
--   `delete_flg` TINYINT NOT NULL DEFAULT 0,
--   `create_date` datetime NOT NULL,
--   `update_date` timestamp NOT NULL DEFAULT current_timestamp(),
--   PRIMARY KEY (`id`)
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- CREATE TABLE `like` (
--   `id` INT NOT NULL AUTO_INCREMENT,
--   `product_id` INT NOT NULL,
--   `user_id` INT NOT NULL,
--   `delete_flg` TINYINT NOT NULL DEFAULT 0,
--   `create_date` datetime NOT NULL,
--   `update_flg` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
--   PRIMARY KEY (`id`)
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ALTER TABLE `bord`
--   ADD FOREIGN KEY (`sale_user`) REFERENCES `users`(`id`),
--   ADD FOREIGN KEY (`product_id`) REFERENCES `product`(`id`),
--   ADD FOREIGN KEY (`buy_user`) REFERENCES `users`(`id`);

-- ALTER TABLE `like`
--   ADD FOREIGN KEY (`product_id`) REFERENCES `product`(`id`),
--   ADD FOREIGN KEY (`user_id`) REFERENCES `users`(`id`);

-- ALTER TABLE `message`
--   ADD FOREIGN KEY (`bord_id`) REFERENCES `bord`(`id`),
--   ADD FOREIGN KEY (`to_user`) REFERENCES `users`(`id`),
--   ADD FOREIGN KEY (`from_user`) REFERENCES `users`(`id`);

-- ALTER TABLE `product`
--   ADD FOREIGN KEY (`maker_id`) REFERENCES `maker`(`id`),
--   ADD FOREIGN KEY (`category_id`) REFERENCES `category`(`id`),
--   ADD FOREIGN KEY (`user_id`) REFERENCES `users`(`id`);

-- COMMIT;