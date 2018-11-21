<?php
	include ('../entidades/usuario.php');
	session_start();
	if (!isset($_SESSION['login'])) {
		session_destroy();
		echo "<script language='javascript'>window.location='../login.php'</script>;";
	} else {
		$usuario = Usuario::constructorvacio();
        $dato = $usuario->mostrar($_SESSION['login']);
        $fila = mysqli_fetch_assoc($dato);
	}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Red de salud - Trujillo</title>
	<?php require_once "scripts.php"; ?>
	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
</head>

<body>
	<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span
					 class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span></button>
				<a class="navbar-brand" href="#"><span>Red de salud </span>Admin</a>
			</div>
		</div><!-- /.container-fluid -->
	</nav>
		<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<div class="profile-sidebar">
			<div class="profile-usertitle">
				<div class="profile-usertitle-name"><h6><?php echo $fila['nombre']; ?></h6> </div>
				<div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
			</div>
			<div class="clear"></div>
		</div>
		<div class="divider"></div>
		<form role="search">
			<div class="form-group">
				<!-- /.crear metodo de busqueda en la web -->
				<input type="text" class="form-control" placeholder="Buscar">
			</div>
		</form>
		<ul class="nav menu">
			<li class=""><a href="index.php"><em class="fa fa-dashboard">&nbsp;</em> Inicio</a></li>
			<li class="parent "><a data-toggle="collapse" href="#sub-item-3">
					<em class="fa fa-navicon">&nbsp;</em>Registrar <span data-toggle="collapse" href="#sub-item-3" class="icon pull-right"><em
						 class="fa fa-plus"></em></span>
				</a>
				<ul class="children collapse" id="sub-item-3">
				<li><a class="" href="registrar_pacientes.php">
								<span class="fa fa-arrow-right">&nbsp;</span> Pacientes
						</a></li>
				
					<li><a class="" href="establecimientos.php">
							<span class="fa fa-arrow-right">&nbsp;</span> Establecimientos
							</a></li>

						<li><a class="" href="registrar_usuarios.php">
								<span class="fa fa-arrow-right">&nbsp;</span> Usuarios
						</a></li>
						
				</ul>
			</li>


			<li class="parent "><a data-toggle="collapse" href="#sub-item-2">
					<em class="fa fa-navicon">&nbsp;</em> Examenes<span data-toggle="collapse" href="#sub-item-2" class="icon pull-right"><em
						 class="fa fa-plus"></em></span>
				</a>
				<ul class="children collapse" id="sub-item-2">
					<li><a class="" href="mamografia.php">
							<span class="fa fa-arrow-right">&nbsp;</span> Mamografía
						</a></li>
					<li><a class="" href="ecm_baaf.php">
							<span class="fa fa-arrow-right">&nbsp;</span> ECM Y BAF Anormal
						</a></li>
					<li><a class="" href="pap_ivaa.php">
							<span class="fa fa-arrow-right">&nbsp;</span> VPH,PAP e IVAA Anormal
						</a></li>
				</ul>
			</li>
			<li class="parent "><a data-toggle="collapse" href="#sub-item-1">
					<em class="fa fa-calendar">&nbsp;</em> Control<span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em
						 class="fa fa-plus"></em></span>
				</a>
				<ul class="children collapse" id="sub-item-1">
				<li><a class="" href="seguimiento_mamografia.php">
							<span class="fa fa-arrow-right">&nbsp;</span> Mamografía
						</a></li>
					<li><a class="" href="control_ecm_baf.php">
							<span class="fa fa-arrow-right">&nbsp;</span> ECM Y BAF Anormal
						</a></li>
					<li><a class="" href="seguimiento_pap_ivaa.php">
							<span class="fa fa-arrow-right">&nbsp;</span> VPH,PAP e IVAA Anormal
						</a></li>
				</ul>
			</li>

		
				<li><a href="reportes.php"><em class="fa fa-toggle-off">&nbsp;</em> Reportes</a></li>
				<li><a href="../controladores/cerrar_sesion.php"><em class="fa fa-power-off">&nbsp;</em> Cerrar Sesión</a></li>
		</ul>
	</div>
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="index.php">
						<em class="fa fa-home"></em>
					</a></li>
				<li class="active">ECM Y BAF Anormal</li>
			</ol>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<h2 class="page-header">Registro (ECM BAF) Anormal</h2>
		</div>
	</div>

	<div class="panel panel-default">
		<div class="panel-heading">Datos del Paciente</div>
			<div class="panel-body">
				<div class="col-md-6">
				<form role="form" method="POST" enctype="multipart/form-data"  action="../persistencia/ecm_baf_anormalDAO.php">
						<div class="form-group">
							<label>DNI</label>
							<input name="dni" type="numeric" class="form-control" placeholder="Dni" required>
						</div>
						<div class="form-group">
							<label>Nombres y Apellidos</label>
							<input name="nombres_apellidos" type="text" class="form-control" placeholder="Nombres y Apellidos" required>
						</div>
						<div class="form-group">
							<label>Fecha de Nacimiento</label>
							<input name="fecha_nacimiento" type="date" class="form-control" min="1940-04-01" required>
						</div>
				</div>
					<div class="col-md-3">
						<div class="form-group">
							<label>Edad</label>
							<input name="edad" type="number" class="form-control" placeholder="Edad" required>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label>Grupo Familiar</label>
							<input name="grupo_familiar"  class="form-control" placeholder="Grupo Familiar" required>
						</div>
					</div>
				<div class="col-md-6">
						<div class="form-group">
							<label>Direccion</label>
							<input name="direccion"  class="form-control" placeholder="Direccion" required>
						</div>
				</div>
				<div class="col-md-3">
						<div class="form-group">
							<label>Telefono</label>
							<input name="telefono"  class="form-control" placeholder="Telefono" required>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label>Historia Clinica</label>
							<input name="hcl"  class="form-control" placeholder="Historia Clinica" required>
						</div>
					</div>
			</div>

			<div class="panel-body">
				<div class="panel-heading">Datos de Seguimiento</div>
				<div class="col-md-6">
					<div class="form-group">
						<label>Año</label>
						<input name="annio"  class="form-control" placeholder="Año">
					</div>
					<div class="form-group">
						<label>Fecha de Visita</label>
						<input name="fecha_visita" type="date" class="form-control" min="1940-04-01" >
					</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Establecimiento Origen</label>
							<select class="form-control" name="centro_origen">
								<?php  include_once ('../entidades/establecimiento.php');
								$centro_origen= Establecimiento::constructorvacio();
								$info=$centro_origen->mostrar();
								while ($filita=$info->fetch_array()) {
								?>
								<option value="<?php echo $filita['nombre']; ?> " > <?php echo $filita['nombre']; ?></option>

								<?php }	?>
							</select>
						</div>
						<div class="form-group">
							<label>Micro Red EESS</label>
							<select class="form-control" name="centro_destino">
								<?php  include_once ('../entidades/establecimiento.php');
								$centro_origen= Establecimiento::constructorvacio();
								$info=$centro_origen->mostrar();
								while ($filita=$info->fetch_array()) {
								?>
								<option value="<?php echo $filita['nombre']; ?>"  > <?php echo $filita['nombre']; ?> </option>
								<?php }	?>
							</select>
						</div>

					</div>
			</div>

			<div class="panel-body">
				<div class="panel-heading">Datos del ECM Anormal</div>
				<div class="col-md-6">
					<div class="form-group">
						<label>Fecha de ECM Anormal</label>
						<input name="fecha" type="date" class="form-control" min="1940-04-01" required>
					</div>
					<div class="form-group">
						<label>Diagnostico ECM</label>
						<input name="diagnostico"  class="form-control" placeholder="Diagnostico ECM" required>
					</div>
					<div class="form-group">
						<label>Plan Clinico</label>
						<input name="plan_clinico"  class="form-control" placeholder="Plan Clinico" required>
					</div>
				</div >
				<div class="col-md-6">
					<div class="form-group">
						<label>Observacion</label>
						<input name="observacion"  class="form-control" placeholder="Observacion" required>
					</div>
					<div class="form-group">
						<label>Fecha de HTDE</label>
						<input name="fecha_HTDE" type="date" class="form-control" min="1940-04-01" required>
					</div>
					<?php
					include_once 'scriptsbaf.php';
					?>
					<div class="form-group">
						<label>¿SE HIZO BAF? </label><br>
						<input type="radio" name="Si" value="SI" onclick="si_baf()">Si<br>
						<input type="radio" name="Si" value="NO" onclick="no_baf()">No<br><BR>
					</div>
				</div>
			</div>

<div class="panel-body" id="datos_baf">
	<div class="panel-heading">Datos del BAF</div>
	<div class="col-md-6">
		<div class="form-group">
			<label>Informe</label>
			<input name="informe"  class="form-control" placeholder="N° de Informe">
		</div>
		<div class="form-group">
			<label>Resultado</label>
			<input name="resultado"  class="form-control" placeholder="Resultados del Examen">
		</div>
		<div class="form-group">
			<label>Descripcion</label>
			<input name="descripcion"  class="form-control" placeholder="Descripcion">
		</div>
		<div class="form-group">
			<label>Fecha de Examen</label>
			<input name="fecha_examen" type="date" class="form-control" min="1940-04-01" >
		</div>
	</div >
	<div class="col-md-6">
		<div class="form-group">
			<label>Fecha de Entrega</label>
			<input name="fecha_entrega" type="date" class="form-control" min="1940-04-01" >
		</div>
		<div class="form-group">
			<label>Realizado Por</label>
			<input name="medico_realiza"  class="form-control" placeholder="Nombre del Medico">
		</div>
		<div class="form-group">
			<label>Supervisado por</label>
			<input name="medico_supervisa"  class="form-control"  placeholder="Nombre del Medico">
		</div>
		<div class="form-group">
			<label>Patologo</label>
			<input name="patologo"  class="form-control"  placeholder="Nombre del Patologo">
		</div>

	</div >

</div>

<div class="panel-body">
	<div class="panel-heading">Datos de Control Seguimiento Paciente</div>
	<div class="col-md-6">
		<div class="form-group">
			<label>Descripcion de Control</label>
			<textarea name="decripcion_control" rows="5" cols="60" class="form-control"></textarea>
		</div>
	</div>
	<div class="col-md-6">
		<br>
		<br>
		<br>
			<input type="submit" name="submit" value="Registrar" class="btn btn-primary">
	</div>
</div>

	</form>
</div>

<?php require_once "scriptsjs.php"; ?>
</body>
</html>
