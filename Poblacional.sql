
-- -----------------------------------------------------
-- Insercion en `rol`
-- -----------------------------------------------------

INSERT INTO `rol`(`nombre`, `descripcion`) VALUES 
("Administrador de Recursos","El encargado de administrar los recursos"),
("Administrador de Usuarios","Administra los tipos de estados y roles de los usuarios"),
("Profesor","El encargado de subir recursos de ambito educativo");

-- -----------------------------------------------------
-- Insercion en `permiso`
-- -----------------------------------------------------

INSERT INTO `permiso`(`alias`, `descripcion`) VALUES ("ac","Administrar comentarios"),
("ar","Administrar recursos"),
("au","Administrar usuarios"),
("erp","Edicion de Recursos Propios"),
("eup","Edicion del Perfil de Usuarios"),
("rc","Realizar Comentarios"),
("rv","Realizar Valorizacion");

-- -----------------------------------------------------
-- Insercion en `contienePermiso`
-- -----------------------------------------------------

INSERT INTO `contienepermiso`(`nombreRol`, `aliasPermiso`) VALUES 
("Administrador de Recursos","ac"),
("Administrador de Recursos","ar"),
("Administrador de Recursos","eup"),
("Administrador de Usuarios","au"),
("Administrador de Usuarios","eup"),
("Profesor","erp"),
("Profesor","rc"),
("Profesor","eup"),
("Profesor","rv");

-- -----------------------------------------------------
-- Insercion en `estadoUsuario`
-- -----------------------------------------------------

INSERT INTO `estadousuario`(`nombre`, `descripcion`) VALUES 
("Alta","El usuario esta dado de alta (en funcionamiento)"),
("Baja","El usuario no cumple con las normas o los requisitos"),
("Pendiente","El usuario en espera de validacion");

-- -----------------------------------------------------
-- Insercion en`usuario`
-- -----------------------------------------------------

INSERT INTO `usuario`(`nombreUsuario`,`clave`,`dni`,`apellido`,`nombre`,`domicilio`,`email`) VALUES 
("adminRecurso","7e6a4309ddf6e8866679f61ace4f621b0e3455ebac2e831a60f13cd1","38365920","navarro","santiago","mzna1 casa 3","santiagonavarro@outlook.com.ar"),
("adminUser","7e6a4309ddf6e8866679f61ace4f621b0e3455ebac2e831a60f13cd1","38044872","barramuño","elizabeth","Las floridas 820","ely-06nqn@hotmail.com"),
("profesor","7e6a4309ddf6e8866679f61ace4f621b0e3455ebac2e831a60f13cd1","12345678","alfonso","luis","amancay 458","ely-06nqn@hotmail.com"),
("profesor1","7e6a4309ddf6e8866679f61ace4f621b0e3455ebac2e831a60f13cd1","13457654","perez","juan","flores 400","ely-06nqn@hotmail.com"),
("profesor2","7e6a4309ddf6e8866679f61ace4f621b0e3455ebac2e831a60f13cd1","56783421","argento","pepe","rosas 588","ely-06nqn@hotmail.com"),
("profesor3","7e6a4309ddf6e8866679f61ace4f621b0e3455ebac2e831a60f13cd1","81239567","santos","tomas","antony 898","ely-06nqn@hotmail.com"),
("profesor4","7e6a4309ddf6e8866679f61ace4f621b0e3455ebac2e831a60f13cd1","98347652","rosas","maria","amancay 678","ely-06nqn@hotmail.com");
-- -----------------------------------------------------
-- Insercion en `tenerEstadoUsuario`
-- -----------------------------------------------------

INSERT INTO `tenerEstadoUsuario`(`nombreUsuario`,`nombreEstadoUsuario`, `fechaInicio`,`hora`) VALUES 
("adminRecurso","Alta","2018-10-28","17:48:01"),
("adminUser","Alta","2018-10-28","17:48:02"),
("profesor","Alta","2018-10-28","17:48:03"),
("profesor1","Alta","2018-09-25","16:42:03"),
("profesor2","Alta","2018-07-15","13:30:00"),
("profesor3","Alta","2018-05-02","22:15:03"),
("profesor4","Alta","2018-10-20","11:50:03");

-- -----------------------------------------------------
-- Insercion en `tieneRol`
-- -----------------------------------------------------

INSERT INTO `tieneRol`(`nombreUsuario`,`nombreRol`, `fechaInicio`) VALUES 
("adminRecurso","Administrador de Recursos","2018-10-28"),
("adminUser","Administrador de Usuarios","2018-10-28"),
("profesor","Profesor","2018-10-28"),
("profesor1","Profesor","2018-09-25"),
("profesor2","Profesor","2018-07-15"),
("profesor3","Profesor","2018-05-02"),
("profesor4","Profesor","2018-10-20");
-- -----------------------------------------------------
-- Insercion en estadoToken`
-- -----------------------------------------------------
INSERT INTO `estadoToken`(`nombreEstadoToken`,`descripcion`) VALUES 
("vencido","El token ya caduco"),
("Pendiente","El token aun no ah sido utilizado"),
("utilizado","el token ya fue utilizado");

-- -----------------------------------------------------
-- Insercion en nivel`
-- -----------------------------------------------------
INSERT INTO `nivel`(`nombre`,`descripcion`) VALUES 
("1º Año","Primer año del secundario"),
("2º Año","Segundo año del secundario"),
("3º Año","Tercer año del secundario"),
("4º Año","Cuarto año del secundario"),
("5º Año","Quinto año del secundario"),
("6º Año","Sexto año del secundario");
-- -----------------------------------------------------
-- Insercion en Recurso`
-- -----------------------------------------------------
INSERT INTO `recurso`(`idRecurso`,`titulo`,`descripcion`,`nombreUsuario`,`nombreCategoria`) VALUES 
(1,"Programando usando Mysql","Enseñanza de metodos educativos para programar BD en el lenguaje mysql","profesor","Base de datos"),
(2,"Programando en Java","Enseñanza de nivel basico de java de forma secuencial","profesor","Programacion estructural"),
(3,"Programando usando Php Poo","Enseñanza de metodos educativos para programar en paradigma de objetos en PHP","profesor","Programacion orientada a objetos");

-- -----------------------------------------------------
-- Insercion en Categoria`
-- -----------------------------------------------------
INSERT INTO `categoria`(`nombre`) VALUES 
("Base de datos"),
("Programacion estructural"),
("Programacion orientada a objetos");

-- ----------------------------------------
-- -----------------------------------------------------
-- Insercion en Tema`
-- -----------------------------------------------------
INSERT INTO `tema`(`nombre`,`nombreCategoria`) VALUES 
("Mysql","Base de datos"),
("MongoDB","Base de datos"),
("Java","Programacion estructural"),
("Php","Programacion orientada a objetos");

-- ----------------------------------------
-- -----------------------------------------------------
-- Insercion en poseeNivel`
-- -----------------------------------------------------
INSERT INTO `poseeNivel`(`nombreNivel`,`idRecurso`) VALUES 
("1º Año",1),
("2º Año",1),
("3º Año",1),
("4º Año",2),
("5º Año",2),
("6º Año",3);
-- ----------------------------------------
-- -----------------------------------------------------
-- Insercion en archivo`
-- -----------------------------------------------------
INSERT INTO `archivo`(`nombre`,`ruta`,`idRecurso`) VALUES 
("1erParcial.pdf","assets/upload/1erParcial.pdf",1),
("1erParcial.pdf","assets/upload/1erParcial.pdf",2),
("1erParcial.pdf","assets/upload/1erParcial.pdf",3);

-- Generamos el evento para el vencimiento de los tokens--------
CREATE EVENT vencertoken
ON SCHEDULE EVERY 1 DAY DO 
UPDATE tenerEstadoToken SET nombreEstadoToken="vencido";
