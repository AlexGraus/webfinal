
<?php
include ('menu.php');
 ?>

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
      <br>
		</div>
		<!--/.row-->
<!--/ crear metodos para mostrar estadisticas de digitacion en los diferentes examenes de seguimiento-->
		<div class="panel panel-default">
		<div class="panel-heading">Registros Totales</div>
		<div class="panel panel-container">
			<div class="row">
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-teal panel-widget border-right">
						<div class="row no-padding"><em class="fa fa-xl fa-users color-red"></em>
						<?php
							include ('../entidades/extras.php');
							$extra = Contador::vacio();
							$cantidad = $extra->contadorMamografia();
							if ($fila=mysqli_fetch_array($cantidad)){?>

							<div class="large"><?php echo $fila['cantidad']?></div>
							<?php }?>
							<div class="text-muted">Mamografía Bilateral</div>
						</div>
					</div>
				</div>

				
				<?php
					//include ('../entidades/extras.php');
				//	$extra = Contador::vacio();
					$cantidad = $extra->contadorPapIvaa();
					while ($fila=mysqli_fetch_array($cantidad)){

				?>
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-red panel-widget ">
						<div class="row no-padding"><em class="fa fa-xl fa-users color-red"></em>
							<div class="large"><?php  echo $fila['cantidad']; ?></div>
							<div class="text-muted"><?php  echo $fila['tipoexamen']; ?> </div>
						</div>
					</div>
				</div>
				<?php if($fila=mysqli_fetch_array($cantidad)){?>
	
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-red panel-widget ">
						<div class="row no-padding"><em class="fa fa-xl fa-users color-red"></em>
							<div class="large"><?php  echo $fila['cantidad'];?></div>
							<div class="text-muted"><?php  echo $fila['tipoexamen'];?></div>
						</div>
					</div>
				</div>
						 <?php }
						 if($fila=mysqli_fetch_array($cantidad)){
						 ?>
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-red panel-widget ">
						<div class="row no-padding"><em class="fa fa-xl fa-users color-red"></em>
							<div class="large"><?php  echo $fila['cantidad'];?></div>
							<div class="text-muted"><?php  echo $fila['tipoexamen'];?></div>
						</div>
					</div>
				</div>
				<?php }?>
						<?php }?>


						<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-red panel-widget ">
						<div class="row no-padding"><em class="fa fa-xl fa-users color-red"></em>

						 <?php $cantidad = $extra->contadorECM();
						 if($fila=mysqli_fetch_array($cantidad)){?>
							<div class="large"><?php echo $fila['cantidad']?></div>
						 <?php }?>
							<div class="text-muted">ECM</div>
						</div>
					</div>
				</div>
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-red panel-widget ">
						<div class="row no-padding"><em class="fa fa-xl fa-users color-blue"></em>
						 <?php  $cantidad = $extra->contardorPacientes(); 
						 if($fila=mysqli_fetch_array($cantidad)){?>
							<div class="large"><?php echo $fila['cantidad']?></div>
						 <?php }?>
							<div class="text-muted">Pacientes</div>
						</div>
					</div>
				</div>				
			</div>
			</div>
<!--/ crear metodos para mostrar estadisticas de digitacion en los diferentes examenes de seguimiento-->
<!--/ .Row-->
		</div>
		
		<div class="panel panel-default">
				<div class="panel-heading">Estadísticas</div>
				<div class="panel-body">
				<div class="col-md-6">
					<div class="form-group">
						<label for="">Resultados Mamografía</label>
						<canvas id="myChart" ></canvas>
						
						
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label for="">Resultados ECM</label>

						<canvas id="myChart2" ></canvas>
						
					</div>
				</div>
				</div>
		</div>
	
		<!--/.row-->

	</div>
	<script src="../js/jquery-3.3.1.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>

<script src="../js/Chart.min.js"></script>
<script src="../js/graficosreports.js"></script>


</body>
</html>
