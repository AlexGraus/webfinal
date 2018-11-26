<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>RED DE SALUD - TRUJILLO</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="">

				<div class="" align="center">
					<img src="img/logo.png" height="160" width="200">
				</div>
				<div class="divider"></div>
				<div class="panel-body">
				<?php include_once ('entidades/usuario.php'); ?>
					<form role="form" action="controladores/control.php" method="POST">
						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="Usuario" name="usuario" type="text" autofocus="" required>
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Contraseña" name="password" type="password" required>
							</div>
							  <button type="submit" class="form-control btn btn-info">Ingresar</button>
							</fieldset>
					</form>

				</div>
				<div class="divider"></div> <br>
				<div class="" align="center">
					<img src="img/logominsa.png" alt="" align="left">
					<img src="img/logogeresa.png" alt="" align="right">
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->


<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>
