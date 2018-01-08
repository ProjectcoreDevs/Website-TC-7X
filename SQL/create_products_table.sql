CREATE TABLE `products` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`categoryID` INT(11) NOT NULL DEFAULT '0',
	`subCategoryID` INT(11) NOT NULL DEFAULT '0',
	`productLink` VARCHAR(255) NULL DEFAULT NULL,
	`title_fr` VARCHAR(255) NULL DEFAULT NULL,
	`title_en` VARCHAR(255) NULL DEFAULT NULL,
	`title_es` VARCHAR(255) NULL DEFAULT NULL,
	`content_title_fr` VARCHAR(255) NULL DEFAULT NULL,
	`content_title_en` VARCHAR(255) NULL DEFAULT NULL,
	`content_title_es` VARCHAR(255) NULL DEFAULT NULL,
	`content_description_fr` TEXT NULL,
	`content_description_en` TEXT NULL,
	`content_description_es` TEXT NULL,
	`image` VARCHAR(255) NULL DEFAULT NULL,
	`price` VARCHAR(50) NULL DEFAULT NULL,
	`isNew` INT(11) NULL DEFAULT '0',
	`isActif` INT(11) NULL DEFAULT '0',
	`langID` INT(11) NULL DEFAULT '0',
	PRIMARY KEY (`id`),
	INDEX `categoryID` (`categoryID`, `subCategoryID`)
)
COLLATE='utf8_general_ci'
ENGINE=InnoDB;