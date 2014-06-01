SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

DROP SCHEMA IF EXISTS `bdaca_proj_grupo1` ;
CREATE SCHEMA IF NOT EXISTS `bdaca_proj_grupo1` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `bdaca_proj_grupo1` ;

-- -----------------------------------------------------
-- Table `bdaca_proj_grupo1`.`country`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bdaca_proj_grupo1`.`country` ;

CREATE  TABLE IF NOT EXISTS `bdaca_proj_grupo1`.`country` (
  `id` INT NOT NULL ,
  `name` VARCHAR(60) NOT NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `idPaís_UNIQUE` (`id` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bdaca_proj_grupo1`.`city`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bdaca_proj_grupo1`.`city` ;

CREATE  TABLE IF NOT EXISTS `bdaca_proj_grupo1`.`city` (
  `id` INT NOT NULL ,
  `name` VARCHAR(50) NULL ,
  `country_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_city_country1` (`country_id` ASC) ,
  CONSTRAINT `fk_city_country1`
    FOREIGN KEY (`country_id` )
    REFERENCES `bdaca_proj_grupo1`.`country` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bdaca_proj_grupo1`.`user`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bdaca_proj_grupo1`.`user` ;

CREATE  TABLE IF NOT EXISTS `bdaca_proj_grupo1`.`user` (
  `id` INT UNSIGNED NOT NULL ,
  `name` VARCHAR(50) NOT NULL ,
  `username` VARCHAR(45) NULL ,
  `password` VARCHAR(45) NOT NULL ,
  `email` VARCHAR(150) NOT NULL ,
  `site` VARCHAR(150) NULL ,
  `city_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `username_UNIQUE` (`name` ASC) ,
  UNIQUE INDEX `email_UNIQUE` (`email` ASC) ,
  INDEX `fk_user_city1` (`city_id` ASC) ,
  CONSTRAINT `fk_user_city1`
    FOREIGN KEY (`city_id` )
    REFERENCES `bdaca_proj_grupo1`.`city` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB, 
COMMENT = '							' ;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
