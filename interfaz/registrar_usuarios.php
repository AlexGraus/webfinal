<?php
include ('menu.php');
if ($fila['tipo']!="Administrador") {
  echo "<script language='javascript'>window.location='index.php'</script>;";
}
 ?>
  <!--/.----------------------------------------------------------------------------------------->
  <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
						<em class="fa fa-home"></em>
					</a></li>
				<li class="active">Usuarios</li>
			</ol>
		</div>
		<!--/.row-->

		<div class="row">
			<br>
		</div>
		<!--/.row-->
		<div class="panel panel-default">
			<div class="panel-heading">Registro de Usuario</div>
			<div class="panel-body">
				<form role="form" method="POST" enctype="multipart/form-data"  action="../persistencia/usuarioDAO.php" >
				<div class="col-md-6">
						<div class="form-group">
							<label>Nombres y Apellidos</label>
							<input id="name" name="nombre" class="form-control" placeholder="Nombres y Apellidos" required>
						</div>
                        <div class="form-group">
							<label>Email</label>
							<input name="email" placeholder="Email" class="form-control">
						</div>
                        <div class="form-group">
							<label>Tipo de Usuario</label>
							<select name="tipo" class="form-control">
								<option value="Administrador">Administrador</option>
								<option value="Digitador">Digitador</option>
							</select>
						</div>

				        </div>
				    <div class="col-md-6">

                        <div class="form-group">
							<label>Usuario (Dni)</label>
							<input name="usuario" placeholder="DNI" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Contraseña</label>
							<input name="password" placeholder="Ingrese Contraseña" class="form-control" type="password" required>
						</div>
						<input name="submit" type="submit" class="btn btn-primary" value="Registrar">
					</div>

				</form>
			</div>

		</div>

	</div>

<?php require_once "scriptsjs.php"; ?>
</body>
</html>
