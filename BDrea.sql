-- MySQL Script generated by MySQL Workbench
-- 10/24/18 16:06:33
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema Rea
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema Rea
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `Rea` DEFAULT CHARACTER SET utf8 ;
USE `Rea` ;

-- -----------------------------------------------------
-- Table `Rea`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Rea`.`usuario` (
  `nombreUsuario` VARCHAR(30) NOT NULL,
  `clave` VARCHAR(30) NOT NULL,
  `dni` INT(10) NULL,
  `apellido` VARCHAR(30) NOT NULL,
  `nombre` VARCHAR(30) NOT NULL,
  `domicilio` VARCHAR(50) NULL DEFAULT NULL,
  `email` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`nombreUsuario`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Rea`.`rol`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Rea`.`rol` (
  `nombre` VARCHAR(30) NOT NULL,
  `descripcion` VARCHAR(80) NULL DEFAULT NULL,
  `permisos` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`nombre`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Rea`.`estadoRecurso`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Rea`.`estadoRecurso` (
  `nombre` VARCHAR(30) NOT NULL,
  `descripcion` VARCHAR(80) NULL DEFAULT NULL,
  PRIMARY KEY (`nombre`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Rea`.`recurso`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Rea`.`recurso` (
  `idRecurso` INT NOT NULL,
  `titulo` VARCHAR(30) NOT NULL,
  `descripcion` VARCHAR(80) NOT NULL,
  PRIMARY KEY (`idRecurso`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Rea`.`encontrarRecurso`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Rea`.`encontrarRecurso` (
  `fechaRecurso` DATE NOT NULL,
  `horaRecurso` TIME NOT NULL,
  `nombreEstadoRecurso` VARCHAR(30) NOT NULL,
  `idRecurso` INT NOT NULL,
  PRIMARY KEY (`fechaRecurso`, `horaRecurso`),
  INDEX `fk_encontrar_estadoRecurso1_idx` (`nombreEstadoRecurso` ASC),
  INDEX `fk_encontrar_recurso1_idx` (`idRecurso` ASC),
  CONSTRAINT `fk_encontrar_estadoRecurso1`
    FOREIGN KEY (`nombreEstadoRecurso`)
    REFERENCES `Rea`.`estadoRecurso` (`nombre`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_encontrar_recurso1`
    FOREIGN KEY (`idRecurso`)
    REFERENCES `Rea`.`recurso` (`idRecurso`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Rea`.`nivel`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Rea`.`nivel` (
  `nombre` VARCHAR(30) NOT NULL,
  `descripcion` VARCHAR(80) NOT NULL,
  PRIMARY KEY (`nombre`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Rea`.`estadoUsuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Rea`.`estadoUsuario` (
  `nombre` VARCHAR(30) NOT NULL,
  `descripcion` VARCHAR(80) NULL DEFAULT NULL,
  PRIMARY KEY (`nombre`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Rea`.`tipoArchivo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Rea`.`tipoArchivo` (
  `idTipo` INT NOT NULL,
  `extension` VARCHAR(45) NOT NULL,
  `descripcion` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`idTipo`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Rea`.`archivo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Rea`.`archivo` (
  `idArchivo` INT NOT NULL,
  `nombre` VARCHAR(30) NOT NULL,
  `descripcion` VARCHAR(80) NULL DEFAULT NULL,
  `idRecurso` INT NOT NULL,
  `idTipo` INT NOT NULL,
  PRIMARY KEY (`idArchivo`),
  INDEX `fk_archivo_recurso1_idx` (`idRecurso` ASC),
  INDEX `fk_archivo_tipoArchivo1_idx` (`idTipo` ASC),
  CONSTRAINT `fk_archivo_recurso1`
    FOREIGN KEY (`idRecurso`)
    REFERENCES `Rea`.`recurso` (`idRecurso`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_archivo_tipoArchivo1`
    FOREIGN KEY (`idTipo`)
    REFERENCES `Rea`.`tipoArchivo` (`idTipo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Rea`.`tenerUsuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Rea`.`tenerUsuario` (
  `hora` TIME NOT NULL,
  `fecha` DATE NOT NULL,
  `nombreUsuario` VARCHAR(30) NOT NULL,
  `nombreEstadoUsuario` VARCHAR(30) NOT NULL,
  `fechaFin` DATE NULL,
  PRIMARY KEY (`hora`, `fecha`),
  INDEX `fk_tenerUsuario_usuario1_idx` (`nombreUsuario` ASC),
  INDEX `fk_tenerUsuario_estadoUsuario1_idx` (`nombreEstadoUsuario` ASC),
  CONSTRAINT `fk_tenerUsuario_usuario1`
    FOREIGN KEY (`nombreUsuario`)
    REFERENCES `Rea`.`usuario` (`nombreUsuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tenerUsuario_estadoUsuario1`
    FOREIGN KEY (`nombreEstadoUsuario`)
    REFERENCES `Rea`.`estadoUsuario` (`nombre`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Rea`.`comentario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Rea`.`comentario` (
  `idComentario` INT NOT NULL AUTO_INCREMENT,
  `idRecurso` INT NOT NULL,
  `nombreUsuario` VARCHAR(30) NOT NULL,
  `descripcion` VARCHAR(80) NOT NULL,
  PRIMARY KEY (`idComentario`),
  INDEX `fk_comentario_usuario1_idx` (`nombreUsuario` ASC),
  INDEX `fk_comentario_recurso1_idx` (`idRecurso` ASC),
  CONSTRAINT `fk_comentario_usuario1`
    FOREIGN KEY (`nombreUsuario`)
    REFERENCES `Rea`.`usuario` (`nombreUsuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_comentario_recurso1`
    FOREIGN KEY (`idRecurso`)
    REFERENCES `Rea`.`recurso` (`idRecurso`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Rea`.`valoracion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Rea`.`valoracion` (
  `idValoracion` INT NOT NULL AUTO_INCREMENT,
  `puntaje` INT NULL DEFAULT NULL,
  `nombreUsuario` VARCHAR(30) NOT NULL,
  `idRecurso` INT NOT NULL,
  PRIMARY KEY (`idValoracion`),
  INDEX `fk_valoracion_usuario1_idx` (`nombreUsuario` ASC),
  INDEX `fk_valoracion_recurso1_idx` (`idRecurso` ASC),
  CONSTRAINT `fk_valoracion_usuario1`
    FOREIGN KEY (`nombreUsuario`)
    REFERENCES `Rea`.`usuario` (`nombreUsuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_valoracion_recurso1`
    FOREIGN KEY (`idRecurso`)
    REFERENCES `Rea`.`recurso` (`idRecurso`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Rea`.`categoria`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Rea`.`categoria` (
  `nombre` VARCHAR(30) NOT NULL,
  `descripcion` VARCHAR(80) NULL DEFAULT NULL,
  PRIMARY KEY (`nombre`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Rea`.`pertenecerCategoria`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Rea`.`pertenecerCategoria` (
  `idRecurso` INT NOT NULL,
  `nombreCategoria` VARCHAR(30) NOT NULL,
  PRIMARY KEY (`idRecurso`, `nombreCategoria`),
  INDEX `fk_recurso_has_categoria_categoria1_idx` (`nombreCategoria` ASC),
  INDEX `fk_recurso_has_categoria_recurso1_idx` (`idRecurso` ASC),
  CONSTRAINT `fk_recurso_has_categoria_recurso1`
    FOREIGN KEY (`idRecurso`)
    REFERENCES `Rea`.`recurso` (`idRecurso`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_recurso_has_categoria_categoria1`
    FOREIGN KEY (`nombreCategoria`)
    REFERENCES `Rea`.`categoria` (`nombre`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Rea`.`poseeNivel`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Rea`.`poseeNivel` (
  `idRecurso` INT NOT NULL,
  `idNivel` VARCHAR(30) NOT NULL,
  PRIMARY KEY (`idRecurso`, `idNivel`),
  INDEX `fk_poseeNivel_nivel1_idx` (`idNivel` ASC),
  CONSTRAINT `fk_poseeNivel_recurso1`
    FOREIGN KEY (`idRecurso`)
    REFERENCES `Rea`.`recurso` (`idRecurso`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_poseeNivel_nivel1`
    FOREIGN KEY (`idNivel`)
    REFERENCES `Rea`.`nivel` (`nombre`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Rea`.`Tema`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Rea`.`Tema` (
  `nombre` VARCHAR(50) NOT NULL,
  `descripcion` VARCHAR(100) NULL,
  `idRecurso` INT NOT NULL,
  PRIMARY KEY (`nombre`),
  INDEX `fk_Tema_recurso1_idx` (`idRecurso` ASC),
  CONSTRAINT `fk_Tema_recurso1`
    FOREIGN KEY (`idRecurso`)
    REFERENCES `Rea`.`recurso` (`idRecurso`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Rea`.`tieneRol`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Rea`.`tieneRol` (
  `fechaInicio` DATE NOT NULL,
  `fechaFin` DATE NOT NULL,
  `nombreUsuario` VARCHAR(30) NOT NULL,
  `nombreRol` VARCHAR(30) NOT NULL,
  PRIMARY KEY (`nombreUsuario`, `nombreRol`),
  INDEX `fk_tieneRol_usuario1_idx` (`nombreUsuario` ASC),
  INDEX `fk_tieneRol_rol1_idx` (`nombreRol` ASC),
  CONSTRAINT `fk_tieneRol_usuario1`
    FOREIGN KEY (`nombreUsuario`)
    REFERENCES `Rea`.`usuario` (`nombreUsuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tieneRol_rol1`
    FOREIGN KEY (`nombreRol`)
    REFERENCES `Rea`.`rol` (`nombre`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Rea`.`Permiso`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Rea`.`Permiso` (
  `` INT NOT NULL,
  PRIMARY KEY (``))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
