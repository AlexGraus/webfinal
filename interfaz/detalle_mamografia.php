<?php
include ('menu.php');
include ('../entidades/paciente.php');
include ('../entidades/controles_mamografia.php');
 ?>

	<!--/.sidebar-->

	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
						<em class="fa fa-home"></em>
					</a> </li>
				<li class="active"></li>
				 Controles de Mamografia
			</ol>
		</div>
		<!--/.row-->

		<div class="row">
			<br>
		</div>
		<!--/.row-->
		<div class="panel panel-default">
		<div class="panel-heading">Paciente</div>
			<div class="panel-body">
				<div class="col-md-6">
				<?php 			$id = $_GET['id'];
								$pacientes = Paciente::constructorvacio();
								$resultados=$pacientes->buscarPacienteMamografia($id);
						if($fila=mysqli_fetch_array($resultados)){
				?>
						<div class = 'form-group'>
							<label>Nombres y Apellidos</label>
							<input class='form-control' value = '<?php echo $fila['nombres_apellidos'] ?>' disabled>

						</div>

                </div>
				<div class="col-md-6">
				<div class="form-group">
							<label>Tipo Examen: </label>
							 <input class="form-control" value = '<?php echo $fila['nombreexamen']?>' disabled>
						</div>
				</div>
			<?php }?>

            </div>
        </div>

        <div class="panel panel-default">
		<div class="panel-heading">Nuevo Control</div>
			<div class="panel-body">
				<div class="col-md-4">
				<form id="id_form" role="form" method="get" action = "../persistencia/detalleDAO_mamografia.php";>
						<div class="form-group">
							<label>Fecha </label>
							<input type="date" name="fecha" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Descripción </label>
							<textarea name="descripcion" rows="5" cols="43" required></textarea>
						</div>
						<input type="hidden" name="oculto" value=<?php if(isset($_GET['id']))  echo $_GET['id'] ?>>
						<div class="form-group" align="center">
							<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-ok"></span> Registrar</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<a href="seguimiento_mamografia.php" class="btn btn-return"> <span class="glyphicon glyphicon-backward"></span>Regresar</a>
						</div>

                </form>
                </div>
				<div class="col-md-8">
				<table id="controles" class="display nowrap">
					<thead>
					<tr>
						<th scope="col">Tipo Examen</th>
     					<th scope="col">Fecha</th>
     					<th scope="col">Descripción</th>
					</tr>
					</thead>
					<tbody>
						<?php
								$id = $_GET['id'];
								$controles = ControlesMamografia::vacio();
								$resultados=$controles->controlesPacienteMamografia($id);
								while ($filas = mysqli_fetch_array($resultados)) {
								?>
									<tr>
									<td><?php echo $filas['nombreexamen']; ?></td>
									<td><?php echo $filas['fechabilateral']; ?></td>
									<td><?php echo $filas['descripcionbilateral']; ?></td>

									</tr>

								<?php
								}
						 ?>
					</tbody>
				</table>

				</div>

            </div>
        </div>



		<!--/.row-->
	</div>
	<!--/.main-->

	 <!-- JQUERY-->
	 <script src="../js/jquery-3.3.1.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.18/r-2.2.2/datatables.min.js"></script>
    <script src="../js/control_ecm_baf.js"></script>
 <!-- <script src="../js/listarseguimientos.js"></script>-->
 		 <!-- DATATABLES Y BUTTONS-->
 <script src="../js/detallecontroles.js"></script>
 <script src="../js/listarseguimientos.js"></script>
 <script src="../js/bootstrap.min.js"></script>
 <script src="../js/chart.min.js"></script>
 <script src="../js/chart-data.js"></script>
 <script src="../js/easypiechart.js"></script>
 <script src="../js/easypiechart-data.js"></script>
 <script src="../js/bootstrap-datepicker.js"></script>
 <script src="../js/custom.js"></script>
</body>

</html>
