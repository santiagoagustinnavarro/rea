/*********************** VALIDAR REGISTRO ***************************/
/** Valida los datos del registro que completo el usuario */
function validarRegistro() {
    var nombre, apellido, usuario, clave, email, exp, clave2, res;
    nombre = $("#nombre").val();
	apellido = $("#apellido").val();
	email = $("#email").val();
	exp = new RegExp(/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/);
    usuario = $("#nombreUsuario").val();
    clave = $("#clave").val();
    clave2 = $("#clave2").val();
	res = true;
	/** Validacion de las Claves */
    if (clave2 !== clave) {
        $("#clave").css("background-color", "rgba(255,0,0,0.3)");
        $("#clave2").css("background-color", "rgba(255,0,0,0.3)");
        alert("las claves no coinciden");
        res = false;
    } else {
        if (clave === "") {
            $("#clave2").css("background-color", "rgba(255,0,0,0.3)");
            $("#clave").css("background-color", "rgba(255,0,0,0.3)");
            res = false;
        } else {
            $("#clave2").css("background-color", "inherit");
            $("#clave").css("background-color", "inherit");
            res = true;
        }
	}
	/** Validacion del nombre */
    if (nombre === "") {
        $("#nombre").css("background-color", "rgba(255,0,0,0.3)");
        res = false;
    } else {
        if (!isNaN(nombre)) {
            $("#nombre").css("background-color", "rgba(255,0,0,0.3)");
            res = false;
        } else {
            $("#nombre").css("background-color", "inherit");
            res = res && true;
        }
	}
	/** Validacion del apellido */
    if (apellido === "") {
        $("#apellido").css("background-color", "rgba(255,0,0,0.3)");
        res = false;
    } else {
        if (!isNaN(apellido)) {
            $("#apellido").css("background-color", "rgba(255,0,0,0.3)");
            res = false;
        } else {
            $("#apellido").css("background-color", "inherit");
            res = true && res;
        }
	}
	/** Falta validar Correo Electronico */
	if(email === ""){
		$("#email").css("background-color", "rgba(255,0,0,0.3)");
        res = false;
	} else if (exp.test(email) == false) {
		$("#email").css("background-color", "rgba(255,0,0,0.3)");
		res=false;
	} else{
		$("#email").css("background-color", "inherit");
		res = true && res;
	}
	/** Validacion del nombre de usuario */
    if (usuario === "") {
        $("#nombreUsuario").css("background-color", "rgba(255,0,0,0.3)");
        res = false;
    } else {
        $("#nombreUsuario").css("background-color", "inherit");
        res = true && res;
    }
    if (res) {
        $("#clave").val($.sha224($("#clave").val()));
        $("#clave2").val($.sha224($("#clave2").val()));
    }
    return res;
}
/*********************** VALIDAR INGRESO ***************************/
/** Verifica que el usuario y la clave sean los correctos */
function validarIngreso() {
    var usuario, clave, res;
    usuario = $("#nombreUsuario").val();
    clave = $("#clave").val();
    res = true;
    if (usuario == "") {
        $("#nombreUsuario").css({"background-color": "rgba(245,0,0,0.3)"});
        res = false;
    } else {
        $("#nombreUsuario").css({"background-color": "inherit"});
    }
    if (clave == "") {
        $("#clave").css({"background-color": "rgba(245,0,0,0.3)"});
        res = false;
    } else {
        //$("#clave").val($.sha224($("#clave").val()));
        $("#clave").css({"background-color": "inherit"});
    }
    return res;
}
/*********************** VALIDAR EDITAR PERFIL ***************************/
/** Valida los datos del editar perfil y actualiza a el usuario */
function validarPerfil() {
    var nombre, apellido, usuario, clave, email, exp, clave1, clave2, res;
    nombre = $("#nombre").val();
	apellido = $("#apellido").val();
	email = $("#email").val();
	exp = new RegExp(/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/);
    usuario = $("#nombreUsuario").val();
	clave = $("#clave").val();
	clave1 = $("#clave1").val();
    clave2 = $("#clave2").val();
	res = true;
	/** Validacion del nombre */
    if (nombre === "") {
        $("#nombre").css("background-color", "rgba(255,0,0,0.3)");
        res = false;
    } else {
        if (!isNaN(nombre)) {
            $("#nombre").css("background-color", "rgba(255,0,0,0.3)");
            res = false;
        } else {
            $("#nombre").css("background-color", "inherit");
            res = res && true;
        }
	}
	/** Validacion del apellido */
    if (apellido === "") {
        $("#apellido").css("background-color", "rgba(255,0,0,0.3)");
        res = false;
    } else {
        if (!isNaN(apellido)) {
            $("#apellido").css("background-color", "rgba(255,0,0,0.3)");
            res = false;
        } else {
            $("#apellido").css("background-color", "inherit");
            res = true && res;
        }
	}
	/** Falta validar Correo Electronico */
	if(email === ""){
		$("#email").css("background-color", "rgba(255,0,0,0.3)");
        res = false;
	} else if (exp.test(email) == false) {
		$("#email").css("background-color", "rgba(255,0,0,0.3)");
		res=false;
	} else{
		$("#email").css("background-color", "inherit");
		res = true && res;
	}
	/** Validacion del nombre de usuario */
    if (usuario === "") {
        $("#nombreUsuario").css("background-color", "rgba(255,0,0,0.3)");
        res = false;
    } else {
        $("#nombreUsuario").css("background-color", "inherit");
        res = true && res;
    }
    if (res) {
        $("#clave").val($.sha224($("#clave").val()));
        $("#clave2").val($.sha224($("#clave2").val()));
	}
	
	return res;
}
