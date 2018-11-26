<?php
include ('menu.php');
include ('../entidades/paciente.php');
include ('../entidades/control_seguimiento.php');
 ?>

	<!--/.sidebar-->

	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
						<em class="fa fa-home"></em>
					</a></li>
				<li class="active"></li>
				Control ECM y BAFF
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
								$resultados=$pacientes->buscarPacienteECM($id);
						if($fila=mysqli_fetch_array($resultados)){
				?>
						<div class = 'form-group'>
							<label>Nombres y Apellidos</label>
							<input class='form-control' value = '<?php echo $fila['nombres_apellidos'] ?>' disabled>

						</div>

                </div>
				<div class="col-md-6">
				<div class="form-group">
							<label>Diagnostico ECM: </label>
							 <input class="form-control" value = '<?php echo $fila['diagnostico']?>' disabled>
						</div>
				</div>
			<?php }?>

            </div>
        </div>

        <div class="panel panel-default">
		<div class="panel-heading">Nuevo Control</div>
			<div class="panel-body">
				<div class="col-md-4">
				<form id="id_form" role="form" method="get" action = "../persistencia/detalleDAO_seguimiento.php"?>
						<div class="form-group">
							<label>Fecha </label>
							<input type="date" name="fecha_control" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Descripción </label>
							<textarea name="descripcion" rows="5" cols="43"  required></textarea>
						</div>
						<input type="hidden" name="oculto" value=<?php if(isset($_GET['id']))  echo $_GET['id'] ?>>
						<div class="form grup"align="center" >
							<button type="submit" class="btn btn-primary" >Registrar</button> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<a href="control_ecm_baf.php" class="btn btn-return">Regresar</a>
						</div>

                </form>
                </div>
				<div class="col-md-8">
				<table id="ecm_baaf" class="display nowrap">
					<thead>
					<tr>
     					<th scope="col">Fecha de Control</th>
     					<th scope="col">Descripción del Control</th>
					</tr>
					</thead>
					<tbody>
						<?php
								$id = $_GET['id'];
								$controles = ControlSeguimiento::constructorvacio();
								$resultados=$controles->buscarSeguimiento($id);
								while ($filas = mysqli_fetch_array($resultados)) {
								?>
									<tr>
									<td><?php echo $filas['fecha']; ?></td>
									<td><?php echo $filas['descripcion']; ?></td>

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

        <!-- DATATABLES Y BUTTONS-->
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
