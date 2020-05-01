
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

-- ---------------------------------------------------------------------
-- contract
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `contract`;

CREATE TABLE `contract`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `identifier` VARCHAR(20) DEFAULT '' NOT NULL,
    `amount` BIGINT NOT NULL,
    `details` TEXT,
    `valid_from` DATE NOT NULL,
    `valid_to` DATE,
    `file` BLOB,
    `status` enum('under preparation','done') NOT NULL,
    `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `modified_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `customer_id` INTEGER NOT NULL,
    PRIMARY KEY (`id`),
    UNIQUE INDEX `identifier` (`identifier`),
    INDEX `customer` (`customer_id`),
    CONSTRAINT `contract_ibfk_1`
        FOREIGN KEY (`customer_id`)
        REFERENCES `customer` (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- customer
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `customer`;

CREATE TABLE `customer`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) DEFAULT '' NOT NULL,
    `address` VARCHAR(255) DEFAULT '' NOT NULL,
    `type_id` INTEGER NOT NULL,
    `active` TINYINT(1) NOT NULL,
    PRIMARY KEY (`id`),
    INDEX `type` (`type_id`),
    CONSTRAINT `customer_ibfk_1`
        FOREIGN KEY (`type_id`)
        REFERENCES `type` (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- group
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `group`;

CREATE TABLE `group`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) DEFAULT '' NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- payment
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `payment`;

CREATE TABLE `payment`
(
    `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
    `identifier` VARCHAR(30) DEFAULT '' NOT NULL,
    `bank_name` VARCHAR(255) DEFAULT '' NOT NULL,
    `amount` BIGINT NOT NULL,
    `details` json NOT NULL,
    `contract_id` INTEGER,
    PRIMARY KEY (`id`),
    INDEX `contract` (`contract_id`),
    CONSTRAINT `payment_ibfk_1`
        FOREIGN KEY (`contract_id`)
        REFERENCES `contract` (`id`)
        ON DELETE SET NULL
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- type
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `type`;

CREATE TABLE `type`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) DEFAULT '' NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- user
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `email` VARCHAR(255) DEFAULT '' NOT NULL,
    `password` VARCHAR(255) DEFAULT '' NOT NULL,
    `first_name` VARCHAR(255),
    `last_name` VARCHAR(255),
    `login_counter` INTEGER DEFAULT 0 NOT NULL,
    `deleted` TINYINT(1) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- user_group
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `user_group`;

CREATE TABLE `user_group`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `user_id` INTEGER NOT NULL,
    `group_id` INTEGER NOT NULL,
    PRIMARY KEY (`id`),
    INDEX `user` (`user_id`),
    INDEX `group` (`group_id`),
    CONSTRAINT `user_group_ibfk_1`
        FOREIGN KEY (`user_id`)
        REFERENCES `user` (`id`),
    CONSTRAINT `user_group_ibfk_2`
        FOREIGN KEY (`group_id`)
        REFERENCES `group` (`id`)
) ENGINE=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
