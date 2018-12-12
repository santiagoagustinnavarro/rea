

-- -----------------------------------------------------
-- Table `usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `usuario` (
  `nombreUsuario` VARCHAR(30) NOT NULL,
  `clave` VARCHAR(70) NOT NULL,
  `dni` INT(10) NULL DEFAULT NULL,
  `apellido` VARCHAR(30) NOT NULL,
  `nombre` VARCHAR(30) NOT NULL,
  `domicilio` VARCHAR(50) NULL DEFAULT NULL,
  `email` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`nombreUsuario`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `rol`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `rol` (
  `nombre` VARCHAR(30) NOT NULL,
  `descripcion` VARCHAR(80) NULL DEFAULT NULL,
  PRIMARY KEY (`nombre`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `categoria`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `categoria` (
  `nombre` VARCHAR(30) NOT NULL,
  PRIMARY KEY (`nombre`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tema`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tema` (
  `nombre` VARCHAR(50) NOT NULL,
  `nombreCategoria` VARCHAR(30) NOT NULL,
  PRIMARY KEY (`nombre`),
  INDEX `fk_tema_categoria1_idx` (`nombreCategoria` ASC),
  CONSTRAINT `fk_tema_categoria1`
    FOREIGN KEY (`nombreCategoria`)
    REFERENCES `categoria` (`nombre`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `recurso`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `recurso` (
  `idRecurso` INT NOT NULL AUTO_INCREMENT,
  `titulo` VARCHAR(30) NOT NULL,
  `descripcion` VARCHAR(80) NOT NULL,
  `validado` BIT NOT NULL DEFAULT 0,
  `nombreUsuario` VARCHAR(30) NOT NULL,
  `nombreTema` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`idRecurso`),
  INDEX `fk_recurso_usuario1_idx` (`nombreUsuario` ASC),
  INDEX `fk_recurso_tema1_idx` (`nombreTema` ASC),
  CONSTRAINT `fk_recurso_usuario1`
    FOREIGN KEY (`nombreUsuario`)
    REFERENCES `usuario` (`nombreUsuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_recurso_tema1`
    FOREIGN KEY (`nombreTema`)
    REFERENCES `tema` (`nombre`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `nivel`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `nivel` (
  `nombre` VARCHAR(30) NOT NULL,
  `descripcion` VARCHAR(80) NOT NULL,
  PRIMARY KEY (`nombre`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `estadoUsuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `estadoUsuario` (
  `nombre` VARCHAR(30) NOT NULL,
  `descripcion` VARCHAR(80) NULL DEFAULT NULL,
  PRIMARY KEY (`nombre`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `archivo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `archivo` (
  `idArchivo` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(30) NOT NULL,
  `ruta` VARCHAR(80) NOT NULL,
  `idRecurso` INT NOT NULL,
  PRIMARY KEY (`idArchivo`),
  INDEX `fk_archivo_recurso1_idx` (`idRecurso` ASC),
  CONSTRAINT `fk_archivo_recurso1`
    FOREIGN KEY (`idRecurso`)
    REFERENCES `recurso` (`idRecurso`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tenerEstadoUsuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tenerEstadoUsuario` (
  `hora` TIME NOT NULL,
  `fechaInicio` DATE NOT NULL,
  `nombreUsuario` VARCHAR(30) NOT NULL,
  `nombreEstadoUsuario` VARCHAR(30) NOT NULL,
  `fechaFin` DATE NULL DEFAULT NULL,
  PRIMARY KEY (`hora`, `fechaInicio`),
  INDEX `fk_tenerUsuario_usuario1_idx` (`nombreUsuario` ASC),
  INDEX `fk_tenerUsuario_estadoUsuario1_idx` (`nombreEstadoUsuario` ASC),
  CONSTRAINT `fk_tenerUsuario_usuario1`
    FOREIGN KEY (`nombreUsuario`)
    REFERENCES `usuario` (`nombreUsuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tenerUsuario_estadoUsuario1`
    FOREIGN KEY (`nombreEstadoUsuario`)
    REFERENCES `estadoUsuario` (`nombre`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `comentario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `comentario` (
  `idComentario` INT NOT NULL AUTO_INCREMENT,
  `idRecurso` INT NOT NULL,
  `nombreUsuario` VARCHAR(30) NOT NULL,
  `descripcion` VARCHAR(80) NOT NULL,
  PRIMARY KEY (`idComentario`),
  INDEX `fk_comentario_usuario1_idx` (`nombreUsuario` ASC),
  INDEX `fk_comentario_recurso1_idx` (`idRecurso` ASC),
  CONSTRAINT `fk_comentario_usuario1`
    FOREIGN KEY (`nombreUsuario`)
    REFERENCES `usuario` (`nombreUsuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_comentario_recurso1`
    FOREIGN KEY (`idRecurso`)
    REFERENCES `recurso` (`idRecurso`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `valoracion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `valoracion` (
  `idValoracion` INT NOT NULL AUTO_INCREMENT,
  `puntaje` INT NULL DEFAULT NULL,
  `nombreUsuario` VARCHAR(30) NOT NULL,
  `idRecurso` INT NOT NULL,
  PRIMARY KEY (`idValoracion`),
  INDEX `fk_valoracion_usuario1_idx` (`nombreUsuario` ASC),
  INDEX `fk_valoracion_recurso1_idx` (`idRecurso` ASC),
  CONSTRAINT `fk_valoracion_usuario1`
    FOREIGN KEY (`nombreUsuario`)
    REFERENCES `usuario` (`nombreUsuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_valoracion_recurso1`
    FOREIGN KEY (`idRecurso`)
    REFERENCES `recurso` (`idRecurso`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `poseeNivel`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `poseeNivel` (
  `idRecurso` INT NOT NULL,
  `nombreNivel` VARCHAR(30) NOT NULL,
  PRIMARY KEY (`idRecurso`, `nombreNivel`),
  INDEX `fk_poseeNivel_nivel1_idx` (`nombreNivel` ASC),
  CONSTRAINT `fk_poseeNivel_recurso1`
    FOREIGN KEY (`idRecurso`)
    REFERENCES `recurso` (`idRecurso`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_poseeNivel_nivel1`
    FOREIGN KEY (`nombreNivel`)
    REFERENCES `nivel` (`nombre`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tieneRol`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tieneRol` (
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
    REFERENCES `usuario` (`nombreUsuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tieneRol_rol1`
    FOREIGN KEY (`nombreRol`)
    REFERENCES `rol` (`nombre`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `permiso`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `permiso` (
  `alias` VARCHAR(5) NOT NULL,
  `descripcion` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`alias`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `contienePermiso`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `contienePermiso` (
  `nombreRol` VARCHAR(30) NOT NULL,
  `aliasPermiso` VARCHAR(5) NOT NULL,
  PRIMARY KEY (`nombreRol`, `aliasPermiso`),
  INDEX `fk_contienePermiso_rol1_idx` (`nombreRol` ASC),
  INDEX `fk_contienePermiso_permiso1_idx` (`aliasPermiso` ASC),
  CONSTRAINT `fk_contienePermiso_rol1`
    FOREIGN KEY (`nombreRol`)
    REFERENCES `rol` (`nombre`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_contienePermiso_permiso1`
    FOREIGN KEY (`aliasPermiso`)
    REFERENCES `permiso` (`alias`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tokenRecupera`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tokenRecupera` (
  `nroToken` VARCHAR(70) NOT NULL,
  `nombreUsuario` VARCHAR(30) NOT NULL,
  INDEX `fk_tokenRecupera_usuario1_idx` (`nombreUsuario` ASC),
  PRIMARY KEY (`nroToken`),
  CONSTRAINT `fk_tokenRecupera_usuario1`
    FOREIGN KEY (`nombreUsuario`)
    REFERENCES `usuario` (`nombreUsuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `estadoToken`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `estadoToken` (
  `nombreEstadoToken` VARCHAR(15) NOT NULL,
  `descripcion` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`nombreEstadoToken`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tenerEstadoToken`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tenerEstadoToken` (
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
    REFERENCES `estadoToken` (`nombreEstadoToken`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tenerEstadoToken_tokenRecupera1`
    FOREIGN KEY (`nroToken`)
    REFERENCES `tokenRecupera` (`nroToken`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


