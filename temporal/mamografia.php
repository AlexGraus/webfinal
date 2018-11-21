<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>ECM ANORMAL Y BAFF</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">

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
		<?php 
        //include_once ('control.php');
        session_start();
        include_once "entidades/usuario.php";
        $usuario = Usuario::constructorvacio();
        $dato = $usuario->mostrar($_SESSION['login']);
        $fila = mysqli_fetch_assoc($dato);
    	?>
		<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<div class="profile-sidebar">
			<div class="profile-usertitle">
				<div class="profile-usertitle-name"><h5><?php echo $fila['nombre']; ?></h5> </div>
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
			<li><a href="widgets.php"><em class="fa fa-calendar">&nbsp;</em> Seguimiento</a></li>
			<li class="parent "><a data-toggle="collapse" href="#sub-item-1">
					<em class="fa fa-navicon">&nbsp;</em> Registros <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em
						 class="fa fa-plus"></em></span>
				</a>
				<ul class="children collapse" id="sub-item-1">
					<li><a class="" href="mamografia.php">
							<span class="fa fa-arrow-right">&nbsp;</span> Mamografía
						</a></li>
					<li><a class="" href="ecmybaff.php">
							<span class="fa fa-arrow-right">&nbsp;</span> ECM Anormal y BAF
						</a></li>
					<li><a class="" href="papyivaa.php">
							<span class="fa fa-arrow-right">&nbsp;</span> PAP e IVAA Anormal
						</a></li>
				</ul>
			</li>
			<li class="parent "><a data-toggle="collapse" href="#sub-item-2">
					<em class="fa fa-navicon">&nbsp;</em>Reportes <span data-toggle="collapse" href="#sub-item-2" class="icon pull-right"><em
						 class="fa fa-plus"></em></span>
				</a>
				<ul class="children collapse" id="sub-item-2">
					<li><a class="" href="establecimiento.php">
							<span class="fa fa-arrow-right">&nbsp;</span> Establecimientos
						</a>
					</li>
				</ul>
			</li>
			<li><a href="elements.php"><em class="fa fa-toggle-off">&nbsp;</em> Reportes</a></li>
			<li><a href="login.php"><em class="fa fa-power-off">&nbsp;</em> Cerrar Sesión</a></li>
		</ul>
		</div>
		<!--/.sidebar-->

	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
			<li><a href="index.php">
						<em class="fa fa-home"></em>
					</a></li>
				<li class="active">Mamografía</li>
			</ol>
		</div>
		<!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Registrar Mamografía Bilateral</h1>
			</div>
		</div>
		<!--/.row-->

			
	</div>
	<!--/.main-->


	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/custom.js"></script>

</body>

</html>