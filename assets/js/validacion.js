/*********************** VALIDAR REGISTRO ***************************/
/** Valida los datos del registro que completo el usuario */
function validarRegistro() {
	var nombre, apellido, usuario, clave, email, exp, est, claveconf, res;
    nombre = $("#nombre").val();
	apellido = $("#apellido").val();
	email = $("#email").val();
	exp = new RegExp(/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/);
	usuario = $("#nombreUsuario").val();
	est = $("#estudio").val();
    clave = $("#clave").val();
    claveconf = $("#claveconf").val();
	res = true;
	/** Validacion de las Claves */
    if (claveconf !== clave) {
        $("#clave").css("background-color", "rgba(255,0,0,0.3)");
        $("#claveconf").css("background-color", "rgba(255,0,0,0.3)");
        alert("las claves no coinciden");
        res = false;
    } else {
        if (clave === "") {
            $("#claveconf").css("background-color", "rgba(255,0,0,0.3)");
            $("#clave").css("background-color", "rgba(255,0,0,0.3)");
            res = false;
        } else {
            $("#claveconf").css("background-color", "white");
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
	/** Valida la universidad o terciario en donde estudian o estudiaron los usuarios */
	if (est === "") {
        $("#estudio").css("background-color", "rgba(255,0,0,0.3)");
        res = false;
    } else {
        if (!isNaN(est)) {
            $("#estudio").css("background-color", "rgba(255,0,0,0.3)");
            res = false;
        } else {
            $("#estudio").css("background-color", "white");
            res = res && true;
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
        $("#clave").val($.md5($("#clave").val()));
        $("#claveconf").val($.md5($("#claveconf").val()));
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
        //$("#clave").val($.md5($("#clave").val()));
        $("#clave").css({"background-color": "white"});
    }
    return res;
}
/*********************** VALIDAR EDITAR PERFIL ***************************/
/** Valida los datos del editar perfil y actualiza a el usuario */
function validarPerfil() {
	var nombre, apellido, usuario, email, exp, clave, clave, claveconf, est, res;
    nombre = $("#nombre").val();
	apellido = $("#apellido").val();
	email = $("#email").val();
	exp = new RegExp(/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/);
	usuario = $("#nombreUsuario").val();
	est = $("#estudio").val();
	clave = $("#clave").val();
	//clave = $("#clave").val();
	claveconf = $("#claveconf").val();
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
	/** Valida la universidad o terciario en donde estudian o estudiaron los usuarios */
	if (est === "") {
        $("#estudio").css("background-color", "rgba(255,0,0,0.3)");
        res = false;
    } else {
        if (!isNaN(est)) {
            $("#estudio").css("background-color", "rgba(255,0,0,0.3)");
            res = false;
        } else {
            $("#estudio").css("background-color", "white");
            res = res && true;
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
	if (clave !== claveconf) {
        $("#clave").css("background-color", "rgba(255,0,0,0.4)");
        $("#claveconf").css("background-color", "rgba(255,0,0,0.4)");
        alert("Las claves no coinciden");
        res = false;
	} 
    if (res) {
        $("#clave").val($.md5($("#clave").val()));
		//$("#clave").val($.md5($("#clave").val()));
		$("#claveconf").val($.md5($("#claveconf").val()));
	}
	return res;
}
$(document).ready(function () {
	$("#enviarmail").click(function () {
		$('#loading').removeAttr('hidden');
	})
})
/*********************** VALIDAR CONTACTO ***************************/
/** Valida el correo electronico y el mensaje que se le envia al administrador de usuarios */
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

