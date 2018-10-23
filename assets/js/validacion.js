function validarLogin() {
var nombreUser, clave, res;
nombreUser=$("nombreUser").val;
clave=$("clave").val;
res=false;
if ((nombreUser=="")||(clave=="")){
	res=false;
}else{
	res=true;
}
}

function validarRegistro(){
	var nombre,apellido,dni,domicilio,nombUser,claveUser;
	nombre=$("nombre").val;
	apellido=$("apellido").val;
	dni=$("dni").val;
	domicilio=$("domicilio").val;
	nombUser=$("user").val;
	claveUser=$("clave").val;
	if((nombre=="")|| (apellido=="")|| (nombreUser=="")|| (claveUser=="")){
		res=false;
	}else{
		res=true;
	}
}

