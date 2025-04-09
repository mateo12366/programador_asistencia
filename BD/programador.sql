-- MySQL Workbench Synchronization
-- Generated: 2025-04-02 17:21
-- Model: New Model
-- Version: 1.0
-- Project: Name of the project
-- Author: mateo garcia

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

CREATE SCHEMA IF NOT EXISTS `programador_asistencias` DEFAULT CHARACTER SET utf8 ;

CREATE TABLE IF NOT EXISTS `programador_asistencias`.`regionales` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `programador_asistencias`.`centros` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(50) NOT NULL,
  `FkIdRegional` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_centros_regionales1_idx` (`FkIdRegional` ASC) VISIBLE,
  CONSTRAINT `fk_centros_regionales1`
    FOREIGN KEY (`FkIdRegional`)
    REFERENCES `programador_asistencias`.`regionales` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `programador_asistencias`.`ambientes` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(50) NULL DEFAULT NULL,
  `FkIdCentro` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_ambientes_centros1_idx` (`FkIdCentro` ASC) VISIBLE,
  CONSTRAINT `fk_ambientes_centros1`
    FOREIGN KEY (`FkIdCentro`)
    REFERENCES `programador_asistencias`.`centros` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `programador_asistencias`.`clases` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `fecha` DATE NOT NULL,
  `hora_inicio` TIME NOT NULL,
  `hora_fin` TIME NOT NULL,
  `Competencia` VARCHAR(50) NOT NULL,
  `FkIdAmbiente` INT(11) NOT NULL,
  `FkIdInstructor` INT(11) NOT NULL,
  `FkIdFicha` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_clases_ambientes1_idx` (`FkIdAmbiente` ASC) VISIBLE,
  INDEX `fk_clases_fichas1_idx` (`FkIdFicha` ASC) VISIBLE,
  INDEX `fk_clases_usuarios1_idx` (`FkIdInstructor` ASC) VISIBLE,
  CONSTRAINT `fk_clases_ambientes1`
    FOREIGN KEY (`FkIdAmbiente`)
    REFERENCES `programador_asistencias`.`ambientes` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_clases_fichas1`
    FOREIGN KEY (`FkIdFicha`)
    REFERENCES `programador_asistencias`.`fichas` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_clases_usuarios1`
    FOREIGN KEY (`FkIdInstructor`)
    REFERENCES `programador_asistencias`.`usuarios` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `programador_asistencias`.`programas_formacion` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(50) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `programador_asistencias`.`fichas` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `codigo` INT(11) NOT NULL,
  `FkIdPrograma` VARCHAR(45) NOT NULL,
  `id_rol` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_fichas_programas_formacion1`
    FOREIGN KEY (`FkIdPrograma`)
    REFERENCES `programador_asistencias`.`programas_formacion` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `programador_asistencias`.`roles` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(50) NOT NULL,
  `lectura` TINYINT(1) NOT NULL,
  `escritura` TINYINT(1) NOT NULL,
  `vista` TINYINT(1) NOT NULL,
  `estado` VARCHAR(25) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `programador_asistencias`.`usuarios` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nombres` VARCHAR(50) NOT NULL,
  `correo` VARCHAR(100) NOT NULL,
  `contrasenia` VARCHAR(45) NOT NULL,
  `FkRol` VARCHAR(45) NOT NULL,
  `FkIdFicha` VARCHAR(45) NOT NULL,
  `estado` VARCHAR(25) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_usuarios_roles1_idx` (`FkRol` ASC) VISIBLE,
  INDEX `fk_usuarios_fichas1_idx` (`FkIdFicha` ASC) VISIBLE,
  CONSTRAINT `fk_usuarios_roles1`
    FOREIGN KEY (`FkRol`)
    REFERENCES `programador_asistencias`.`roles` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_usuarios_fichas1`
    FOREIGN KEY (`FkIdFicha`)
    REFERENCES `programador_asistencias`.`fichas` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `programador_asistencias`.`asistencias` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `estado` VARCHAR(25) NOT NULL,
  `horasInasistencia` INT(11) NULL DEFAULT NULL,
  `FkIdClase` INT(11) NOT NULL,
  `FkIdAprendiz` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_asistencias_usuarios1_idx` (`FkIdAprendiz` ASC) VISIBLE,
  INDEX `fk_asistencias_clases1_idx` (`FkIdClase` ASC) VISIBLE,
  CONSTRAINT `fk_asistencias_usuarios1`
    FOREIGN KEY (`FkIdAprendiz`)
    REFERENCES `programador_asistencias`.`usuarios` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_asistencias_clases1`
    FOREIGN KEY (`FkIdClase`)
    REFERENCES `programador_asistencias`.`clases` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
