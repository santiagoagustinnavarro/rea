<div class="container py-4">
<div class="col-md-6 mx-auto">
<div class="container">
<h1 class="titulo text-secondary">Registro Usuario</h1>
  <form id="registro" method="post" action="usuario/add" >
    <div class="form-group">
			<input type="text" class="form-control" id="nombre" placeholder="Nombre" name="nombre"  required>
</div>
<div class="form-group">
			<input type="text" class="form-control" id="apellido" placeholder="Apellido" name="apellido"  required>
</div>
<div class="form-group">
			<input type="text" class="form-control" id="domicilio" placeholder="Domicilio" name="domicilio">
</div>
<div class="form-group">
			<input type="text" class="form-control" id="dni" placeholder="D.N.I" name="dni">
</div>
<div class="form-group">
			<input type="email" class="form-control" id="email" placeholder="Correo@ejemplo..." name="email"  required>
</div>
			<div class="form-group">
      <input type="text" class="form-control" id="nombreUsuario" placeholder="Nombre Usuario" name="nombreUsuario" required >
    </div>
    <div class="form-group">
      	<input type="password" class="form-control" id="clave" placeholder="Ingrese contraseña" name="clave"  required>
		</div>
		<div class="form-group" id="boton">
			<button type="submit" class="btn btn-success">Enviar</button>
		</div>
  </form>
</div>
</div>
</div>
