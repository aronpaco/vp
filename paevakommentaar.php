päeva kommentaaride tabel:
CREATE TABLE `if22_aron_paco_vunk`.`vp_daycomment_new` (`id` INT(11) NOT NULL AUTO_INCREMENT , `comment` VARCHAR(140) NOT NULL , `grade` INT(2) NOT NULL , `added` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , `deleted` DATETIME NULL , PRIMARY KEY (`id`, `deleted`)) ENGINE = InnoDB;

