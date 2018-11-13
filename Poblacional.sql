
-- -----------------------------------------------------
-- Insercion en `rol`
-- -----------------------------------------------------

INSERT INTO `rol`(`nombre`, `descripcion`) VALUES 
('Administrador de Recursos','El encargado de administrar los recursos'),
('Administrador de Usuarios','Administra los tipos de estados y roles de los usuarios'),
('Profesor','El encargado de subir recursos de ambito educativo');

-- -----------------------------------------------------
-- Insercion en `permiso`
-- -----------------------------------------------------

INSERT INTO `permiso`(`alias`, `descripcion`) VALUES ('ac','Administrar comentarios'),
('ar','Administrar recursos'),
('au','Administrar usuarios'),
('erp','Edicion de Recursos Propios'),
('eup','Edicion del Perfil de Usuarios'),
('rc','Realizar Comentarios'),
('rv','Realizar Valorizacion');

-- -----------------------------------------------------
-- Insercion en `contienePermiso`
-- -----------------------------------------------------

INSERT INTO `contienepermiso`(`nombreRol`, `aliasPermiso`) VALUES 
('Administrador de Recursos','ac'),
('Administrador de Recursos','ar'),
('Administrador de Recursos','eup'),
('Administrador de Usuarios','au'),
('Administrador de Usuarios','eup'),
('Profesor','erp'),
('Profesor','rc'),
('Profesor','eup'),
('Profesor','rv');

-- -----------------------------------------------------
-- Insercion en `estadoUsuario`
-- -----------------------------------------------------

INSERT INTO `estadousuario`(`nombre`, `descripcion`) VALUES 
('Alta','El usuario esta dado de alta (en funcionamiento)'),
('Baja','El usuario no cumple con las normas o los requisitos'),
('Pendiente','El usuario en espera de validacion');

-- -----------------------------------------------------
-- Insercion en`usuario`
-- -----------------------------------------------------

INSERT INTO `usuario`(`nombreUsuario`,`clave`,`dni`,`apellido`,`nombre`,`domicilio`,`email`) VALUES 
('adminRecurso','7e6a4309ddf6e8866679f61ace4f621b0e3455ebac2e831a60f13cd1','38365920','navarro','santiago','mzna1 casa 3','santiagonavarro@outlook.com.ar'),
('adminUser','7e6a4309ddf6e8866679f61ace4f621b0e3455ebac2e831a60f13cd1','38044872','barramuño','elizabeth','Las floridas 820','ely-06nqn@hotmail.com'),
('profesor','7e6a4309ddf6e8866679f61ace4f621b0e3455ebac2e831a60f13cd1','12345678','alfonso','luis','amancay 458','ely-06nqn@hotmail.com');

-- -----------------------------------------------------
-- Insercion en `tenerEstadoUsuario`
-- -----------------------------------------------------

INSERT INTO `tenerEstadoUsuario`(`nombreUsuario`,`nombreEstadoUsuario`, `fechaInicio`,`hora`) VALUES 
('adminRecurso','Alta','2018-10-28',"17:48:01"),
('adminUser','Alta','2018-10-28',"17:48:02"),
('profesor','Alta','2018-10-28',"17:48:03");

-- -----------------------------------------------------
-- Insercion en `tieneRol`
-- -----------------------------------------------------

INSERT INTO `tieneRol`(`nombreUsuario`,`nombreRol`, `fechaInicio`) VALUES 
('adminRecurso','Administrador de Recursos','2018-10-28'),
('adminUser','Administrador de Usuarios','2018-10-28'),
('profesor','Profesor','2018-10-28');
-- -----------------------------------------------------
-- Insercion en estadoToken`
-- -----------------------------------------------------
INSERT INTO `estadoToken`(`nombreEstadoToken`,`descripcion`) VALUES 
('vencido','El token ya caduco'),
('Pendiente','El token aun no ah sido utilizado'),
('utilizado','el token ya fue utilizado');

-- Generamos el evento para el vencimiento de los tokens--------
CREATE EVENT vencertoken
ON SCHEDULE EVERY 1 DAY DO 
UPDATE tenerEstadoToken SET nombreEstadoToken="vencido";
