
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

-- ---------------------------------------------------------------------
-- degressif
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `degressif_products`;

CREATE TABLE `degressif_products`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `product_id` INTEGER NOT NULL,
    `ref` VARCHAR(255),
    `tranchemin` FLOAT,
    `tranchemax` FLOAT,
    `prix` FLOAT,
    `prix2` FLOAT,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id`),
    INDEX `product_id` (`product_id`),
    INDEX `product_id_tranches` (`product_id`, `tranchemin`, `tranchemax`),
    INDEX `ref_id_tranches` (`ref`, `tranchemin`, `tranchemax`),
    CONSTRAINT `fk_product_id`
        FOREIGN KEY (`product_id`)
        REFERENCES `product` (`id`)
        ON UPDATE NO ACTION
        ON DELETE NO ACTION
) ENGINE=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
