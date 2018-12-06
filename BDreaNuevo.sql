
-- -----------------------------------------------------
-- Table `usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `usuario` (
  `nombreUsuario` VARCHAR(30) NOT NULL,
  `clave` VARCHAR(70) NOT NULL,
  `dni` INT(10) NULL DEFAULT NULL,
  `apellido` VARCHAR(30) NOT NULL,
  `nombre` VARCHAR(30) NOT NULL,
  `estudio` VARCHAR(50) NOT NULL,
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
-- Table `tema`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tema` (
  `nombre` VARCHAR(50) NOT NULL,
  `descripcion` VARCHAR(45) NULL,
  PRIMARY KEY (`nombre`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `recurso`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `recurso` (
  `idRecurso` INT NOT NULL AUTO_INCREMENT,
  `titulo` VARCHAR(30) NOT NULL,
  `descripcion` VARCHAR(80) NOT NULL,
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
  PRIMARY KEY (`hora`, `fechaInicio`, `nombreUsuario`, `nombreEstadoUsuario`),
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
  `fecha` DATE NULL,
  `hora` TIME NULL,
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
-- Table `categoria`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `categoria` (
  `nombre` VARCHAR(50) NOT NULL,
  `descripcion` VARCHAR(45) NULL,
  PRIMARY KEY (`nombre`))
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


-- -----------------------------------------------------
-- Table `tenerCategoria`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tenerCategoria` (
  `nombreTema` VARCHAR(50) NOT NULL,
  `nombreCategoria` VARCHAR(50) NOT NULL,
  INDEX `fk_tenerCategoria_tema1_idx` (`nombreTema` ASC),
  INDEX `fk_tenerCategoria_categoria1_idx` (`nombreCategoria` ASC),
  PRIMARY KEY (`nombreTema`, `nombreCategoria`),
  CONSTRAINT `fk_tenerCategoria_tema1`
    FOREIGN KEY (`nombreTema`)
    REFERENCES `tema` (`nombre`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tenerCategoria_categoria1`
    FOREIGN KEY (`nombreCategoria`)
    REFERENCES `categoria` (`nombre`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `estadoValidacion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `estadoValidacion` (
  `nombre` VARCHAR(45) NOT NULL,
  `descripcion` VARCHAR(45) NULL,
  PRIMARY KEY (`nombre`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `validarRecurso`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `validarRecurso` (
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
    REFERENCES `recurso` (`idRecurso`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_validar_usuario1`
    FOREIGN KEY (`nombreUsuario`)
    REFERENCES `usuario` (`nombreUsuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_validar_estadoValidacion1`
    FOREIGN KEY (`nombreEstadoValidacion`)
    REFERENCES `estadoValidacion` (`nombre`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cambiarEstadoUsuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cambiarEstadoUsuario` (
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
    REFERENCES `usuario` (`nombreUsuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_cambiarEstadoUsuario_estadoUsuario1`
    FOREIGN KEY (`nombreEstadoUsuario`)
    REFERENCES `estadoUsuario` (`nombre`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `estadoRecurso`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `estadoRecurso` (
  `nombre` VARCHAR(45) NOT NULL,
  `descripcion` VARCHAR(45) NULL,
  PRIMARY KEY (`nombre`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tenerEstadoRecurso`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tenerEstadoRecurso` (
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
    REFERENCES `recurso` (`idRecurso`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tenerEstadoRecurso_estadoRecurso1`
    FOREIGN KEY (`nombreEstadoRecurso`)
    REFERENCES `estadoRecurso` (`nombre`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cambiarEstadoRecurso`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cambiarEstadoRecurso` (
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
    REFERENCES `recurso` (`idRecurso`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_cambiarEstadoRecurso_estadoRecurso1`
    FOREIGN KEY (`nombreEstadoRecurso`)
    REFERENCES `estadoRecurso` (`nombre`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `estadoComentario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `estadoComentario` (
  `nombre` VARCHAR(45) NOT NULL,
  `descripcion` VARCHAR(45) NULL,
  PRIMARY KEY (`nombre`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tenerEstadoComentario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tenerEstadoComentario` (
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
    REFERENCES `comentario` (`idComentario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tenerEstadoComentario_estadoComentario1`
    FOREIGN KEY (`nombreEstadoComentario`)
    REFERENCES `estadoComentario` (`nombre`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cambiarEstadoComentario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cambiarEstadoComentario` (
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
    REFERENCES `comentario` (`idComentario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_cambiarEstadoComentario_estadoComentario1`
    FOREIGN KEY (`nombreEstadoComentario`)
    REFERENCES `estadoComentario` (`nombre`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


