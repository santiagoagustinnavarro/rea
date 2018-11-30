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
            $("#clave2").css("background-color", "white");
            $("#clave").css("background-color", "white");
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
            $("#nombre").css("background-color", "white");
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
            $("#apellido").css("background-color", "white");
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
		$("#email").css("background-color", "white");
		res = true && res;
	}
	/** Validacion del nombre de usuario */
    if (usuario === "") {
        $("#nombreUsuario").css("background-color", "rgba(255,0,0,0.3)");
        res = false;
    } else {
        $("#nombreUsuario").css("background-color", "white");
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
        $("#nombreUsuario").css({"background-color": "white"});
    }
    if (clave == "") {
        $("#clave").css({"background-color": "rgba(245,0,0,0.3)"});
        res = false;
    } else {
        //$("#clave").val($.sha224($("#clave").val()));
        $("#clave").css({"background-color": "white"});
    }
    return res;
}
/*********************** VALIDAR EDITAR PERFIL ***************************/
/** Valida los datos del editar perfil y actualiza a el usuario */
function validarPerfil() {
    var nombre, apellido, usuario, email, exp, clave, clave1, clave2, res;
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
            $("#nombre").css("background-color", "white");
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
            $("#apellido").css("background-color", "white");
            res = true && res;
        }
	}
	/** valida el Correo Electronico */
	if(email === ""){
		$("#email").css("background-color", "rgba(255,0,0,0.3)");
        res = false;
	} else if (exp.test(email) == false) {
		$("#email").css("background-color", "rgba(255,0,0,0.3)");
		res=false;
	} else{
		$("#email").css("background-color", "white");
		res = true && res;
	}
	/** Validacion en el nombre de usuario*/
    if (usuario === "") {
        $("#nombreUsuario").css("background-color", "rgba(255,0,0,0.3)");
        res = false;
    } else {
        $("#nombreUsuario").css("background-color", "white");
        res = true && res;
	}
	/** Actualizacion de la clave es Opcional */
	if(clave==""){
        res=false;
        $("#clave").css("background-color", "rgba(255,0,0,0.4)");
    }else{
        $("#clave").css("background-color", "white");
	}
	if (clave1 !== clave2) {
        $("#clave1").css("background-color", "rgba(255,0,0,0.4)");
        $("#clave2").css("background-color", "rgba(255,0,0,0.4)");
        alert("Las claves no coinciden");
        res = false;
	} 
    if (res) {
        $("#clave").val($.sha224($("#clave").val()));
		$("#clave1").val($.sha224($("#clave1").val()));
		$("#clave2").val($.sha224($("#clave2").val()));
	}
	return res;
}
$(document).ready(function () {
	$("#enviarmail").click(function () {
		$('#loading').removeAttr('hidden');
	})
})

/** Valida  meel correo electronico y el mensaje que se le envia al administrador de usuarios */
function validarContacto() {
	var email, exp, desc, res;
	email = $("#email").val();
	exp = new RegExp(/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/);
	desc = $("#mensaje").val();
	res = true;
	if(email === ""){
		$("#email").css("background-color", "rgba(255,0,0,0.3)");
        res = false;
	} else if (exp.test(email) == false) {
		$("#email").css("background-color", "rgba(255,0,0,0.3)");
		res=false;
	} else{
		$("#email").css("background-color", "white");
		res = true && res;
	}
	if(desc===""){
		$("#mensaje").css("background-color", "rgba(255,0,0,0.3)");
        res = false;
	}else{
		$("#mensaje").css("background-color", "white");
		res = true && res;
	}
	return res;
}

