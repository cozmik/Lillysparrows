-- MySQL Script generated by MySQL Workbench
-- 01/27/16 00:27:12
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema cozdb-lillysparrows
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema cozdb-lillysparrows
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `cozdb-lillysparrows` DEFAULT CHARACTER SET utf8 ;
USE `cozdb-lillysparrows` ;

-- -----------------------------------------------------
-- Table `cozdb-lillysparrows`.`cozdb-categories`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `cozdb-lillysparrows`.`cozdb-categories` ;

CREATE TABLE IF NOT EXISTS `cozdb-lillysparrows`.`cozdb-categories` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `Name` VARCHAR(55) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC),
  UNIQUE INDEX `Name_UNIQUE` (`Name` ASC))
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `cozdb-lillysparrows`.`cozdb-users`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `cozdb-lillysparrows`.`cozdb-users` ;

CREATE TABLE IF NOT EXISTS `cozdb-lillysparrows`.`cozdb-users` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(45) NOT NULL,
  `password` VARCHAR(45) NOT NULL,
  `fName` VARCHAR(45) NOT NULL,
  `lName` VARCHAR(45) NOT NULL,
  `priviledges` INT(11) NOT NULL DEFAULT '0',
  `displayName` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `username_UNIQUE` (`username` ASC),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `cozdb-lillysparrows`.`cozdb-post`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `cozdb-lillysparrows`.`cozdb-post` ;

CREATE TABLE IF NOT EXISTS `cozdb-lillysparrows`.`cozdb-post` (
  `id` INT(11) NOT NULL,
  `postTitle` VARCHAR(50) NOT NULL,
  `author-user` INT(11) NOT NULL,
  `post` LONGTEXT NOT NULL,
  `categoryID` INT(11) NOT NULL,
  `img` VARCHAR(45) NULL DEFAULT NULL,
  `date` DATETIME NOT NULL,
  `status` TINYINT(1) NULL DEFAULT '0' COMMENT 'For published and unpublished',
  `tags` LONGTEXT NULL DEFAULT NULL,
  PRIMARY KEY (`id`, `author-user`, `categoryID`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC),
  INDEX `fk_cozdb-post_cozdb-users_idx` (`author-user` ASC),
  INDEX `fk_cozdb-post_cozdb-categories1_idx` (`categoryID` ASC),
  CONSTRAINT `fk_cozdb-post_cozdb-categories1`
    FOREIGN KEY (`categoryID`)
    REFERENCES `cozdb-lillysparrows`.`cozdb-categories` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_cozdb-post_cozdb-users`
    FOREIGN KEY (`author-user`)
    REFERENCES `cozdb-lillysparrows`.`cozdb-users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `cozdb-lillysparrows`.`cozdb-comments`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `cozdb-lillysparrows`.`cozdb-comments` ;

CREATE TABLE IF NOT EXISTS `cozdb-lillysparrows`.`cozdb-comments` (
  `postID` INT(11) NOT NULL,
  `author` VARCHAR(55) NOT NULL,
  `img` VARCHAR(45) NULL DEFAULT NULL,
  `comment` LONGTEXT NULL DEFAULT NULL,
  PRIMARY KEY (`postID`),
  CONSTRAINT `fk_cozdb-comments_cozdb-post1`
    FOREIGN KEY (`postID`)
    REFERENCES `cozdb-lillysparrows`.`cozdb-post` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `cozdb-lillysparrows`.`cozdb-quotes`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `cozdb-lillysparrows`.`cozdb-quotes` ;

CREATE TABLE IF NOT EXISTS `cozdb-lillysparrows`.`cozdb-quotes` (
  `id` INT(11) NOT NULL,
  `quote` LONGTEXT NOT NULL,
  `post_author` VARCHAR(50) NOT NULL DEFAULT 'Unknown' COMMENT 'The person who originated the quote',
  `date` DATETIME NULL DEFAULT NULL,
  `cozdb-users_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`, `cozdb-users_id`),
  INDEX `fk_cozdb-quotes_cozdb-users1_idx` (`cozdb-users_id` ASC),
  CONSTRAINT `fk_cozdb-quotes_cozdb-users1`
    FOREIGN KEY (`cozdb-users_id`)
    REFERENCES `cozdb-lillysparrows`.`cozdb-users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `cozdb-lillysparrows`.`cozdb-storytitle`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `cozdb-lillysparrows`.`cozdb-storytitle` ;

CREATE TABLE IF NOT EXISTS `cozdb-lillysparrows`.`cozdb-storytitle` (
  `id` INT(11) NOT NULL,
  `title` VARCHAR(100) NOT NULL,
  `image` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `cozdb-lillysparrows`.`cozdb-storyepisode`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `cozdb-lillysparrows`.`cozdb-storyepisode` ;

CREATE TABLE IF NOT EXISTS `cozdb-lillysparrows`.`cozdb-storyepisode` (
  `id` INT(11) NOT NULL,
  `titleID` INT(11) NOT NULL,
  `userID` INT(11) NOT NULL,
  `story` LONGTEXT NOT NULL,
  `image` VARCHAR(45) NULL DEFAULT NULL,
  `episodeTitle` VARCHAR(100) NULL DEFAULT NULL,
  PRIMARY KEY (`titleID`, `userID`, `id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC),
  INDEX `fk_cozdb-storyEpisode_cozdb-storyTitle1_idx` (`titleID` ASC),
  INDEX `fk_cozdb-storyEpisode_cozdb-users1` (`userID` ASC),
  CONSTRAINT `fk_cozdb-storyEpisode_cozdb-storyTitle1`
    FOREIGN KEY (`titleID`)
    REFERENCES `cozdb-lillysparrows`.`cozdb-storytitle` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_cozdb-storyEpisode_cozdb-users1`
    FOREIGN KEY (`userID`)
    REFERENCES `cozdb-lillysparrows`.`cozdb-users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `cozdb-lillysparrows`.`cozdb_subscribers`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `cozdb-lillysparrows`.`cozdb_subscribers` ;

CREATE TABLE IF NOT EXISTS `cozdb-lillysparrows`.`cozdb_subscribers` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(60) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC))
ENGINE = InnoDB;

USE `cozdb-lillysparrows` ;

-- -----------------------------------------------------
-- Placeholder table for view `cozdb-lillysparrows`.`rss_table`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cozdb-lillysparrows`.`rss_table` (`id` INT, `title` INT, `author` INT, `post` INT, `date` INT);

-- -----------------------------------------------------
-- View `cozdb-lillysparrows`.`rss_table`
-- -----------------------------------------------------
DROP VIEW IF EXISTS `cozdb-lillysparrows`.`rss_table` ;
DROP TABLE IF EXISTS `cozdb-lillysparrows`.`rss_table`;
USE `cozdb-lillysparrows`;
CREATE  OR REPLACE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `cozdb-lillysparrows`.`rss_table` AS select `cozdb-lillysparrows`.`cozdb-post`.`id` AS `id`,`cozdb-lillysparrows`.`cozdb-post`.`postTitle` AS `title`,`cozdb-lillysparrows`.`cozdb-users`.`displayName` AS `author`,`cozdb-lillysparrows`.`cozdb-post`.`post` AS `post`,`cozdb-lillysparrows`.`cozdb-post`.`date` AS `date` from (`cozdb-lillysparrows`.`cozdb-post` join `cozdb-lillysparrows`.`cozdb-users`) where (`cozdb-lillysparrows`.`cozdb-post`.`author-user` = `cozdb-lillysparrows`.`cozdb-users`.`id`);

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
