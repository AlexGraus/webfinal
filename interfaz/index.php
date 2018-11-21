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
			<li class="active"><a href="index.php"><em class="fa fa-dashboard">&nbsp;</em> Inicio</a></li>
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
	<!--/.sidebar-->
  <!--/.----------------------------------------------------------------------------------------->
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="index.php">
						<em class="fa fa-home"></em>
					</a></li>
				<li class="active">Inicio</li>
			</ol>
		</div>
		<!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<h2 class="page-header">Registros Totales</h2>
			</div>
		</div>
		<!--/.row-->
<!--/ crear metodos para mostrar estadisticas de digitacion en los diferentes examenes de seguimiento-->
		<div class="panel panel-container">
			<div class="row">
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-teal panel-widget border-right">
						<div class="row no-padding"><em class="fa fa-xl fa-users color-blue"></em>
							<div class="large">120</div>
							<div class="text-muted">Mamografía Bilateral</div>
						</div>
					</div>
				</div>
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-blue panel-widget border-right">
						<div class="row no-padding"><em class="fa fa-xl fa-users color-orange"></em>
							<div class="large">52</div>
							<div class="text-muted">ECM Anormal</div>
						</div>
					</div>
				</div>
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-orange panel-widget border-right">
						<div class="row no-padding"><em class="fa fa-xl fa-users color-teal"></em>
							<div class="large">24</div>
							<div class="text-muted">BAFF</div>
						</div>
					</div>
				</div>
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-red panel-widget ">
						<div class="row no-padding"><em class="fa fa-xl fa-users color-red"></em>
							<div class="large">80</div>
							<div class="text-muted">PAP</div>
						</div>
					</div>
				</div>
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-red panel-widget ">
						<div class="row no-padding"><em class="fa fa-xl fa-users color-red"></em>
							<div class="large">50</div>
							<div class="text-muted">IVAA Anormal</div>
						</div>
					</div>
				</div>

			</div>
<!--/ crear metodos para mostrar estadisticas de digitacion en los diferentes examenes de seguimiento-->
<!--/ .Row-->
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						Control
						<ul class="pull-right panel-settings panel-button-tab-right">
							<li class="dropdown"><a class="pull-right dropdown-toggle" data-toggle="dropdown" href="#">
									<em class="fa fa-cogs"></em>
								</a>
								<ul class="dropdown-menu dropdown-menu-right">
									<li>
										<ul class="dropdown-settings">
											<li><a href="#">
													<em class="fa fa-cog"></em>
												</a></li>
											<li class="divider"></li>
											<li><a href="#">
													<em class="fa fa-cog"></em>
												</a></li>
											<li class="divider"></li>
											<li><a href="#">
													<em class="fa fa-cog"></em>
												</a></li>
										</ul>
									</li>
								</ul>
							</li>
						</ul>
						<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
					<div class="panel-body">
						<div class="canvas-wrapper">
							<canvas class="main-chart" id="line-chart" height="200" width="600"></canvas>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--/.row-->

	</div>

<?php require_once "scriptsjs.php"; ?>

</body>
</html>
