
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

INSERT INTO `usuario`(`nombreUsuario`,`clave`,`dni`,`apellido`,`nombre`,`estudio`,`email`) VALUES 
("adminRecurso","7e6a4309ddf6e8866679f61ace4f621b0e3455ebac2e831a60f13cd1","38365920","navarro","santiago","universidad del comahue","santiago.navarro@est.fi.uncoma.edu.ar"),
("adminUser","7e6a4309ddf6e8866679f61ace4f621b0e3455ebac2e831a60f13cd1","38044872","barramuño","elizabeth","universidad tecnologica Nacional","santiagonavarro@outlook.com.ar"),
("profesor","7e6a4309ddf6e8866679f61ace4f621b0e3455ebac2e831a60f13cd1","12345678","alfonso","luis","universidad del comahue","ely-06nqn@hotmail.com");

-- -----------------------------------------------------
-- Insercion en `tenerEstadoUsuario`
-- -----------------------------------------------------

INSERT INTO `tenerEstadoUsuario`(`nombreUsuario`,`nombreEstadoUsuario`, `fechaInicio`,`hora`) VALUES 
("adminRecurso","Alta","2018-10-28","17:48:01"),
("adminUser","Alta","2018-10-28","17:48:02"),
("profesor","Alta","2018-10-28","17:48:03");


-- -----------------------------------------------------
-- Insercion en `tieneRol`
-- -----------------------------------------------------

INSERT INTO `tieneRol`(`nombreUsuario`,`nombreRol`, `fechaInicio`) VALUES 
("adminRecurso","Administrador de Recursos","2018-10-28"),
("adminUser","Administrador de Usuarios","2018-10-28"),
("profesor","Profesor","2018-10-28");

-- -----------------------------------------------------
-- Insercion en estadoToken`
-- -----------------------------------------------------
INSERT INTO `estadoToken`(`nombreEstadoToken`,`descripcion`) VALUES 
("Vencido","El token ya caduco"),
("Pendiente","El token aun no ah sido utilizado"),
("Utilizado","el token ya fue utilizado");

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
-- Insercion en Categoria`
-- -----------------------------------------------------
INSERT INTO `categoria`(`nombre`,`descripcion`) VALUES 
("Base de datos","Paradigma de BD"),
("Programacion estructural","Programacion basica en secuencia"),
("Programacion orientada a objetos","Paradigma orientado a objetos ");
-- -----------------------------------------------------
-- Insercion en Tema`
-- -----------------------------------------------------
INSERT INTO `tema`(`nombre`,`descripcion`) VALUES 
("Mysql","Lenguaje de BD"),
("MongoDB","Lenguaje de BD"),
("Java","Lenguaje de programacion"),
("Php","Lenguaje de programacion");
-- -----------------------------------------------------
-- Insercion en TenerCategoria`
-- -----------------------------------------------------
INSERT INTO `tenercategoria`(`nombreTema`,`nombreCategoria`) VALUES 
("Mysql","Base de datos"),
("MongoDB","Base de datos"),
("Java","Programacion estructural"),
("Php","Programacion estructural");

-- ----------------------------------------
-- -----------------------------------------------------
-- Insercion en Recurso`
-- -----------------------------------------------------
-- INSERT INTO `recurso`(`idRecurso`,`titulo`,`descripcion`,`nombreUsuario`,`nombreTema`) VALUES 
-- (1,"Programando usando Mysql","Enseñanza de metodos educativos para programar BD en el lenguaje mysql","profesor","Mysql"),
-- (2,"Programando en Java","Enseñanza de nivel basico de java de forma secuencial","profesor","Java"),
-- (3,"Programando usando Php Poo","Enseñanza de metodos educativos para programar en paradigma de objetos en PHP","profesor","Php");


-- ----------------------------------------
-- -----------------------------------------------------
-- Insercion en poseeNivel`
-- -----------------------------------------------------
-- INSERT INTO `poseeNivel`(`nombreNivel`,`idRecurso`) VALUES 
-- ("1º Año",1),
-- ("2º Año",1),
-- ("3º Año",1),
-- ("4º Año",2),
-- ("5º Año",2),
-- ("6º Año",3);
-- ----------------------------------------
-- -----------------------------------------------------
-- Insercion en archivo`
-- -----------------------------------------------------
-- INSERT INTO `archivo`(`nombre`,`ruta`,`idRecurso`) VALUES 
-- ("1erParcial.pdf","assets/upload/1erParcial.pdf",1),
-- ("1erParcial.pdf","assets/upload/1erParcial.pdf",2),
-- ("1erParcial.pdf","assets/upload/1erParcial.pdf",3);

-- ----------------------------------------
-- -----------------------------------------------------
-- Insercion en estadorecurso`
-- -----------------------------------------------------
INSERT INTO `estadorecurso`(`nombre`,`descripcion`) VALUES 
("alta","El recurso esta en estado de alta"),
("baja","El recurso esta dado de baja");
-- Generamos el evento para el vencimiento de los tokens--------
CREATE EVENT vencertoken
ON SCHEDULE EVERY 1 DAY DO 
UPDATE tenerEstadoToken SET nombreEstadoToken="vencido";
