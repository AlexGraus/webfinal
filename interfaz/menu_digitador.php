<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link  rel = "shortcut icon"  href = "../img/favicon.ico"  type = "image /x-icon" >
	<title>Red de salud - Trujillo</title>
	<?php require_once "scripts.php"; ?>
	<!--Custom Font-->
  	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.18/r-2.2.2/datatables.min.css"/>
  	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.10.18/b-1.5.4/b-colvis-1.5.4/b-flash-1.5.4/b-html5-1.5.4/b-print-1.5.4/r-2.2.2/datatables.min.css"/>
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	<link rel="stylesheet" href="../css/sweetalert2.min.css">
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
	        <img src="../img/principal.png" alt="">

	      </div>
	  </div><!-- /.container-fluid -->
	</nav>
	  <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
	    <div class="profile-sidebar">
	      <div class="profile-usertitle">
					<div class="profile-usertitle-status"><?php echo $fila['tipo']; ?> &nbsp;&nbsp;<span class="indicator label-success" ></span>Online</div>
	        <div class="profile-usertitle-status"><span class="fa fa-xl fa-user-md color-red"  >&nbsp;</span><?php echo $fila['nombre']; ?> </div>
	      </div>
	      <div class="clear"></div>
	    </div>
	    <div class="divider"></div>
	  <ul class="nav menu">
	        <li class="active"><a href="index.php"><em class="fa fa-home">&nbsp;</em> Inicio</a></li>
	        <li ><a href="registrar_pacientes.php"><em class="fa fa-female">&nbsp;</em> Registrar Paciente</a></li>
	        <li class="parent "><a data-toggle="collapse" href="#sub-item-1">
	            <em class="fa fa-heartbeat">&nbsp;</em> Examenes<span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em
	               class="fa fa-plus"></em></span>
	          </a>
	          <ul class="children collapse" id="sub-item-1">
	            <li><a class="" href="referencia_mamografia.php">
	                <span class="fa fa-arrow-right">&nbsp;</span> Mamografía
	              </a></li>
	            <li><a class="" href="ecm_baaf.php">
	                <span class="fa fa-arrow-right">&nbsp;</span> ECM Y BAF Anormal
	              </a></li>
	            <li><a class="" href="referencia_papiva.php">
	                <span class="fa fa-arrow-right">&nbsp;</span> PAP e IVAA Anormal
	              </a></li>
	          </ul>
	        </li>
	        <li class="parent "><a data-toggle="collapse" href="#sub-item-2">
	            <em class="fa fa-pencil-square-o">&nbsp;</em> Seguimiento<span data-toggle="collapse" href="#sub-item-2" class="icon pull-right"><em
	               class="fa fa-plus"></em></span>
	          </a>
	          <ul class="children collapse" id="sub-item-2">
	            <li><a class="" href="seguimiento_mamografia.php">
	                <span class="fa fa-arrow-right">&nbsp;</span> Mamografía
	              </a></li>
	            <li><a class="" href="control_ecm_baf.php">
	                <span class="fa fa-arrow-right">&nbsp;</span> ECM Y BAF Anormal
	              </a></li>
	            <li><a class="" href="seguimiento_pap_ivaa.php">
	                <span class="fa fa-arrow-right">&nbsp;</span> PAP e IVAA Anormal
	              </a></li>
	          </ul>
	        </li>
						<li id="idreporte"><a href="reportes.php"><em class="fa fa-line-chart">&nbsp;</em> Reportes</a></li>
	          <li><a href="../controladores/cerrar_sesion.php"><em class="fa fa-power-off">&nbsp;</em> Cerrar Sesión</a></li>
	      </ul>
	</div>
