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
					<li><a class="" href="mamografia.php">
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
	<!--/.sidebar-->

	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
						<em class="fa fa-home"></em>
					</a></li>
				<li class="active">Mamografía Bilateral</li>
			</ol>
		</div>
		<!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Registrar Mamografía Bilateral</h1>
			</div>
		</div>
		<!--/.row-->

		<!--/. FORMULARIO PACIENTE-->



		<div class="panel panel-default">
			<div class="panel-heading">Buscar Paciente</div>
			<div class="panel-body">
            <div class="col-md-6">
					<form role="form" method="get" action="../persistencia/mamografiaDAO.php">
						<div class="form-group">
							<label for="caja_busqueda">DNI</label>
							<input name="dnipaciente" id="caja_busqueda" class="form-control" placeholder="Buscar DNI" required>
						</div>
						<div id="buscandoCodigo" class="form-group">

						</div>

			</div>



			</div>
		</div>
				
		<div class="panel panel-default">
				<div class="panel-heading">Registrar Examen</div>
				<div class="panel-body">
				<div class="col-md-6">
			        	<div class="form-group">
							<label>Examen</label>
							<select  class="form-control" name="examen" >
          						<option value="MX. BILATERAL">MX. BILATERAL</option>
  					 		 </select>
						</div>
                        <div class="form-group">
							<label>Fecha de Examen</label>
							<input  name="fechaexamen" type="date" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Centro de Procedencia</label>
							<select name="centroprocedencia" class="form-control" required>
							<?php  include_once ('../entidades/establecimiento.php');
								$centro_origen= Establecimiento::constructorvacio();
								$info=$centro_origen->mostrar();
								while ($filita=$info->fetch_array()) {
								?>
							<option value = <?php echo $filita['nombre'] ?> > <?php echo $filita['nombre']?> </option>
							<?php
								}
						    ?>
							</select>
						</div>
                        <div class="form-group">
							<label>Diagnóstico MX</label>
							<select  class="form-control" name="resultados" >
          						    <option value="BI-RADS 0">BI-RADS 0</option>
                                    <option value="BI-RADS I">BI-RADS I</option>
                                    <option value="BI-RADS II">BI-RADS II</option>
                                    <option value="BI-RADS III">BI-RADS III</option>
                                    <option value="BI-RADS IV">BI-RADS IV</option>
                                    <option value="BI-RADS V">BI-RADS V</option>
                                    <option value="BI-RADS VI">BI-RADS VI</option>
  					 		 </select>
						</div>
						
						<div class="form-group">
							<label>Fecha de Ecografía</label>
							<input   name="fechaecografia" type="date" class="form-control" required>
						</div>
						

				</div>

                <div class="col-md-6">
                <div class="form-group">
							<label>Resultado de Ecografía</label>
							<select  class="form-control" name="examenecografia" >
          						    <option value="BI-RADS 0">BI-RADS 0</option>
                                    <option value="BI-RADS I">BI-RADS I</option>
                                    <option value="BI-RADS II">BI-RADS II</option>
                                    <option value="BI-RADS III">BI-RADS III</option>
                                    <option value="BI-RADS IV">BI-RADS IV</option>
                                    <option value="BI-RADS V">BI-RADS V</option>
                                    <option value="BI-RADS VI">BI-RADS VI</option>
  					 		 </select>
						</div>
                        <div class ="form-group">
                        <button type="submit" class="form-control btn btn-info">Registrar</button>
                        </div>
                </div>

				</form>
			</div>



			</div>
		</div>



	</div>
	<!--/.main
-->
	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script src="../js/buscapaciente.js"></script>
	<script src="../js/resultados.js"></script>
<?php require_once "scriptsjs.php"; ?>

</body>

</html>
