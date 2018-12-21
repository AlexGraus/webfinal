
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
						<div class="row no-padding"><em class="	glyphicon fa-xl glyphicon-list-alt color-red"></em>
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
						<div class="row no-padding"><em class="glyphicon fa-xl glyphicon-edit color-red"></em>
							<div class="large"><?php  echo $fila['cantidad']; ?></div>
							<div class="text-muted"><?php  echo $fila['tipoexamen']; ?> </div>
						</div>
					</div>
				</div>
				<?php if($fila=mysqli_fetch_array($cantidad)){?>

				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-red panel-widget ">
						<div class="row no-padding"><em class="glyphicon fa-xl glyphicon-edit color-red"></em>
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
						<div class="row no-padding"><em class="glyphicon fa-xl glyphicon-edit color-red"></em>
							<div class="large"><?php  echo $fila['cantidad'];?></div>
							<div class="text-muted"><?php  echo $fila['tipoexamen'];?></div>
						</div>
					</div>
				</div>
				<?php }?>
						<?php }?>


						<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-red panel-widget ">
						<div class="row no-padding"><em class="fa fa-xl fa-book color-red"></em>

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
						<div class="row no-padding"><em class="fa fa-xl fa-female color-blue"></em>
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
			<div class="panel-heading">Filtrar por Fechas</div>
			<div class="panel-body">
				<div class="col-md-3">
						<div class="form-group">
							<label for="">Fecha Inicio :</label>
							<input class="form-control" type="date" name="caja" id="caja_busqueda" class="" placeholder="Buscar fecha" >
						</div>
                       

				</div>
				<div class="col-md-3">
				<div class="form-group">
							<label for="">Fecha Fin   :</label>
							<input class="form-control" type="date" name="caja2" id="caja_busqueda2" class="" placeholder="Buscar fecha" >
						</div>
					
				</div>
				<div class="col-md-3">
					<div class="form-group">
							<label for=""></label>
							<input class="form-control btn btn-return " type="button" name="search" id="search" value="Buscar" />
					</div>
				</div>

			</div>

		</div>


		<div class="panel panel-default">
				<div class="panel-heading">Estadísticas</div>
				<div class="panel-body">
				<div class = "row">
				<div class="col-md-5">
					<div class="form-group" >
						<label for=""  class="form-group">Diagnosticos Mamografia</label>
						<canvas id="myChart">HOLA</canvas>
					</div>
				</div>

				<div class="col-md-5">
					<div class="form-group">
						<label    for="" >Diagnosticos ECM</label>
						<canvas  id="myChart2" ></canvas>
					</div>
				</div>
				</div>
				<div class = "row">
				<div class="col-md-5">
					<div class="form-group">
						<label   for="" >Diagnosticos IVAA</label>
						<canvas  id="myChart3" ></canvas>
					</div>
				</div>
				<div class="col-md-5">
					<div class="form-group">
						<label   for="" >Diagnosticos VPH</label>
						<canvas  id="myChart4" ></canvas>
					</div>
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
