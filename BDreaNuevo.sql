-- MySQL Script generated by MySQL Workbench
-- Sun Dec  9 20:27:17 2018
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

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
  `clave` VARCHAR(70) NOT NULL,
  `dni` INT(10) NULL DEFAULT NULL,
  `apellido` VARCHAR(30) NOT NULL,
  `nombre` VARCHAR(30) NOT NULL,
  `estudio` VARCHAR(50) NOT NULL,
  `email` VARCHAR(50) NOT NULL,
  `foto` VARCHAR(30) NULL,
  PRIMARY KEY (`nombreUsuario`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Rea`.`rol`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Rea`.`rol` (
  `nombre` VARCHAR(30) NOT NULL,
  `descripcion` VARCHAR(80) NULL DEFAULT NULL,
  PRIMARY KEY (`nombre`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Rea`.`tema`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Rea`.`tema` (
  `nombre` VARCHAR(50) NOT NULL,
  `descripcion` VARCHAR(45) NULL,
  PRIMARY KEY (`nombre`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Rea`.`recurso`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Rea`.`recurso` (
  `idRecurso` INT NOT NULL AUTO_INCREMENT,
  `titulo` VARCHAR(30) NOT NULL,
  `descripcion` VARCHAR(80) NOT NULL,
  `nombreUsuario` VARCHAR(30) NOT NULL,
  `nombreTema` VARCHAR(50) NOT NULL,
  `validado` BIT NULL,
  PRIMARY KEY (`idRecurso`),
  INDEX `fk_recurso_usuario1_idx` (`nombreUsuario` ASC),
  INDEX `fk_recurso_tema1_idx` (`nombreTema` ASC),
  CONSTRAINT `fk_recurso_usuario1`
    FOREIGN KEY (`nombreUsuario`)
    REFERENCES `Rea`.`usuario` (`nombreUsuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_recurso_tema1`
    FOREIGN KEY (`nombreTema`)
    REFERENCES `Rea`.`tema` (`nombre`)
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
-- Table `Rea`.`archivo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Rea`.`archivo` (
  `idArchivo` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(30) NOT NULL,
  `ruta` VARCHAR(80) NOT NULL,
  `idRecurso` INT NOT NULL,
  PRIMARY KEY (`idArchivo`),
  INDEX `fk_archivo_recurso1_idx` (`idRecurso` ASC),
  CONSTRAINT `fk_archivo_recurso1`
    FOREIGN KEY (`idRecurso`)
    REFERENCES `Rea`.`recurso` (`idRecurso`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Rea`.`tenerEstadoUsuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Rea`.`tenerEstadoUsuario` (
  `hora` TIME NOT NULL,
  `fechaInicio` DATE NOT NULL,
  `nombreUsuario` VARCHAR(30) NOT NULL,
  `nombreEstadoUsuario` VARCHAR(30) NOT NULL,
  `fechaFin` DATE NULL DEFAULT NULL,
  PRIMARY KEY (`hora`, `fechaInicio`, `nombreUsuario`, `nombreEstadoUsuario`),
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
  `fecha` DATE NULL,
  `hora` TIME NULL,
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
  `nombre` VARCHAR(50) NOT NULL,
  `descripcion` VARCHAR(45) NULL,
  PRIMARY KEY (`nombre`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Rea`.`poseeNivel`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Rea`.`poseeNivel` (
  `idRecurso` INT NOT NULL,
  `nombreNivel` VARCHAR(30) NOT NULL,
  PRIMARY KEY (`idRecurso`, `nombreNivel`),
  INDEX `fk_poseeNivel_nivel1_idx` (`nombreNivel` ASC),
  CONSTRAINT `fk_poseeNivel_recurso1`
    FOREIGN KEY (`idRecurso`)
    REFERENCES `Rea`.`recurso` (`idRecurso`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_poseeNivel_nivel1`
    FOREIGN KEY (`nombreNivel`)
    REFERENCES `Rea`.`nivel` (`nombre`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Rea`.`tieneRol`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Rea`.`tieneRol` (
  `fechaInicio` DATE NOT NULL,
  `fechaFin` DATE NULL DEFAULT NULL,
  `nombreUsuario` VARCHAR(30) NOT NULL,
  `nombreRol` VARCHAR(30) NOT NULL,
  `hora` TIME NOT NULL,
  PRIMARY KEY (`nombreUsuario`, `nombreRol`, `fechaInicio`, `hora`),
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
-- Table `Rea`.`permiso`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Rea`.`permiso` (
  `alias` VARCHAR(5) NOT NULL,
  `descripcion` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`alias`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Rea`.`contienePermiso`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Rea`.`contienePermiso` (
  `nombreRol` VARCHAR(30) NOT NULL,
  `aliasPermiso` VARCHAR(5) NOT NULL,
  PRIMARY KEY (`nombreRol`, `aliasPermiso`),
  INDEX `fk_contienePermiso_rol1_idx` (`nombreRol` ASC),
  INDEX `fk_contienePermiso_permiso1_idx` (`aliasPermiso` ASC),
  CONSTRAINT `fk_contienePermiso_rol1`
    FOREIGN KEY (`nombreRol`)
    REFERENCES `Rea`.`rol` (`nombre`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_contienePermiso_permiso1`
    FOREIGN KEY (`aliasPermiso`)
    REFERENCES `Rea`.`permiso` (`alias`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Rea`.`tokenRecupera`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Rea`.`tokenRecupera` (
  `nroToken` VARCHAR(70) NOT NULL,
  `nombreUsuario` VARCHAR(30) NOT NULL,
  INDEX `fk_tokenRecupera_usuario1_idx` (`nombreUsuario` ASC),
  PRIMARY KEY (`nroToken`),
  CONSTRAINT `fk_tokenRecupera_usuario1`
    FOREIGN KEY (`nombreUsuario`)
    REFERENCES `Rea`.`usuario` (`nombreUsuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Rea`.`estadoToken`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Rea`.`estadoToken` (
  `nombreEstadoToken` VARCHAR(15) NOT NULL,
  `descripcion` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`nombreEstadoToken`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Rea`.`tenerEstadoToken`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Rea`.`tenerEstadoToken` (
  `nombreEstadoToken` VARCHAR(15) NOT NULL,
  `nroToken` VARCHAR(70) NOT NULL,
  `fechaInicio` DATE NOT NULL,
  `fechaFin` DATE NULL DEFAULT NULL,
  `hora` TIME NOT NULL,
  PRIMARY KEY (`fechaInicio`, `hora`),
  INDEX `fk_tokenRecupera_has_estadoToken_estadoToken1_idx` (`nombreEstadoToken` ASC),
  INDEX `fk_tenerEstadoToken_tokenRecupera1_idx` (`nroToken` ASC),
  CONSTRAINT `fk_tokenRecupera_has_estadoToken_estadoToken1`
    FOREIGN KEY (`nombreEstadoToken`)
    REFERENCES `Rea`.`estadoToken` (`nombreEstadoToken`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tenerEstadoToken_tokenRecupera1`
    FOREIGN KEY (`nroToken`)
    REFERENCES `Rea`.`tokenRecupera` (`nroToken`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Rea`.`tenerCategoria`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Rea`.`tenerCategoria` (
  `nombreTema` VARCHAR(50) NOT NULL,
  `nombreCategoria` VARCHAR(50) NOT NULL,
  INDEX `fk_tenerCategoria_tema1_idx` (`nombreTema` ASC),
  INDEX `fk_tenerCategoria_categoria1_idx` (`nombreCategoria` ASC),
  PRIMARY KEY (`nombreTema`, `nombreCategoria`),
  CONSTRAINT `fk_tenerCategoria_tema1`
    FOREIGN KEY (`nombreTema`)
    REFERENCES `Rea`.`tema` (`nombre`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tenerCategoria_categoria1`
    FOREIGN KEY (`nombreCategoria`)
    REFERENCES `Rea`.`categoria` (`nombre`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Rea`.`estadoValidacion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Rea`.`estadoValidacion` (
  `nombre` VARCHAR(45) NOT NULL,
  `descripcion` VARCHAR(45) NULL,
  PRIMARY KEY (`nombre`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Rea`.`validarRecurso`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Rea`.`validarRecurso` (
  `fecha` DATE NOT NULL,
  `hora` TIME NOT NULL,
  `idRecurso` INT NOT NULL,
  `nombreUsuario` VARCHAR(30) NOT NULL,
  `nombreEstadoValidacion` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`fecha`, `hora`, `nombreEstadoValidacion`, `nombreUsuario`, `idRecurso`),
  INDEX `fk_validar_recurso1_idx` (`idRecurso` ASC),
  INDEX `fk_validar_usuario1_idx` (`nombreUsuario` ASC),
  INDEX `fk_validar_estadoValidacion1_idx` (`nombreEstadoValidacion` ASC),
  CONSTRAINT `fk_validar_recurso1`
    FOREIGN KEY (`idRecurso`)
    REFERENCES `Rea`.`recurso` (`idRecurso`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_validar_usuario1`
    FOREIGN KEY (`nombreUsuario`)
    REFERENCES `Rea`.`usuario` (`nombreUsuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_validar_estadoValidacion1`
    FOREIGN KEY (`nombreEstadoValidacion`)
    REFERENCES `Rea`.`estadoValidacion` (`nombre`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Rea`.`cambiarEstadoUsuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Rea`.`cambiarEstadoUsuario` (
  `fechaInicio` DATE NOT NULL,
  `fechaFin` DATE NULL,
  `hora` TIME NOT NULL,
  `nombreUsuario` VARCHAR(30) NOT NULL,
  `nombreEstadoUsuario` VARCHAR(30) NOT NULL,
  INDEX `fk_cambiarEstadoUsuario_usuario1_idx` (`nombreUsuario` ASC),
  INDEX `fk_cambiarEstadoUsuario_estadoUsuario1_idx` (`nombreEstadoUsuario` ASC),
  PRIMARY KEY (`fechaInicio`, `hora`, `nombreUsuario`, `nombreEstadoUsuario`),
  CONSTRAINT `fk_cambiarEstadoUsuario_usuario1`
    FOREIGN KEY (`nombreUsuario`)
    REFERENCES `Rea`.`usuario` (`nombreUsuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_cambiarEstadoUsuario_estadoUsuario1`
    FOREIGN KEY (`nombreEstadoUsuario`)
    REFERENCES `Rea`.`estadoUsuario` (`nombre`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Rea`.`estadoRecurso`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Rea`.`estadoRecurso` (
  `nombre` VARCHAR(45) NOT NULL,
  `descripcion` VARCHAR(45) NULL,
  PRIMARY KEY (`nombre`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Rea`.`tenerEstadoRecurso`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Rea`.`tenerEstadoRecurso` (
  `hora` TIME NOT NULL,
  `fechaInicio` DATE NOT NULL,
  `fechaFin` DATE NULL,
  `idRecurso` INT NOT NULL,
  `nombreEstadoRecurso` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`hora`, `fechaInicio`, `nombreEstadoRecurso`, `idRecurso`),
  INDEX `fk_tenerEstadoRecurso_recurso1_idx` (`idRecurso` ASC),
  INDEX `fk_tenerEstadoRecurso_estadoRecurso1_idx` (`nombreEstadoRecurso` ASC),
  CONSTRAINT `fk_tenerEstadoRecurso_recurso1`
    FOREIGN KEY (`idRecurso`)
    REFERENCES `Rea`.`recurso` (`idRecurso`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tenerEstadoRecurso_estadoRecurso1`
    FOREIGN KEY (`nombreEstadoRecurso`)
    REFERENCES `Rea`.`estadoRecurso` (`nombre`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Rea`.`cambiarEstadoRecurso`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Rea`.`cambiarEstadoRecurso` (
  `fechaInicio` DATE NOT NULL,
  `fechaFin` DATE NULL,
  `hora` TIME NOT NULL,
  `idRecurso` INT NOT NULL,
  `nombreEstadoRecurso` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`fechaInicio`, `hora`, `idRecurso`, `nombreEstadoRecurso`),
  INDEX `fk_cambiarEstadoRecurso_recurso1_idx` (`idRecurso` ASC),
  INDEX `fk_cambiarEstadoRecurso_estadoRecurso1_idx` (`nombreEstadoRecurso` ASC),
  CONSTRAINT `fk_cambiarEstadoRecurso_recurso1`
    FOREIGN KEY (`idRecurso`)
    REFERENCES `Rea`.`recurso` (`idRecurso`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_cambiarEstadoRecurso_estadoRecurso1`
    FOREIGN KEY (`nombreEstadoRecurso`)
    REFERENCES `Rea`.`estadoRecurso` (`nombre`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Rea`.`estadoComentario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Rea`.`estadoComentario` (
  `nombre` VARCHAR(45) NOT NULL,
  `descripcion` VARCHAR(45) NULL,
  PRIMARY KEY (`nombre`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Rea`.`tenerEstadoComentario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Rea`.`tenerEstadoComentario` (
  `hora` TIME NOT NULL,
  `fechaInicio` DATE NOT NULL,
  `fechaFin` DATE NULL,
  `idComentario` INT NOT NULL,
  `nombreEstadoComentario` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`hora`, `fechaInicio`, `idComentario`, `nombreEstadoComentario`),
  INDEX `fk_tenerEstadoComentario_comentario1_idx` (`idComentario` ASC),
  INDEX `fk_tenerEstadoComentario_estadoComentario1_idx` (`nombreEstadoComentario` ASC),
  CONSTRAINT `fk_tenerEstadoComentario_comentario1`
    FOREIGN KEY (`idComentario`)
    REFERENCES `Rea`.`comentario` (`idComentario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tenerEstadoComentario_estadoComentario1`
    FOREIGN KEY (`nombreEstadoComentario`)
    REFERENCES `Rea`.`estadoComentario` (`nombre`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Rea`.`cambiarEstadoComentario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Rea`.`cambiarEstadoComentario` (
  `hora` TIME NOT NULL,
  `fechaInicio` DATE NOT NULL,
  `fechaFin` DATE NULL,
  `idComentario` INT NOT NULL,
  `nombreEstadoComentario` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`hora`, `fechaInicio`, `nombreEstadoComentario`, `idComentario`),
  INDEX `fk_cambiarEstadoComentario_comentario1_idx` (`idComentario` ASC),
  INDEX `fk_cambiarEstadoComentario_estadoComentario1_idx` (`nombreEstadoComentario` ASC),
  CONSTRAINT `fk_cambiarEstadoComentario_comentario1`
    FOREIGN KEY (`idComentario`)
    REFERENCES `Rea`.`comentario` (`idComentario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_cambiarEstadoComentario_estadoComentario1`
    FOREIGN KEY (`nombreEstadoComentario`)
    REFERENCES `Rea`.`estadoComentario` (`nombre`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
