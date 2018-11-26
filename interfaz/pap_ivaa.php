<?php
include ('menu.php');
 ?>
	<!--/.sidebar-->

	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
						<em class="fa fa-home"></em>
					</a></li>
				<li class="active"> Registrar VPH PAP IVAA Anormal</li>
			</ol>
		</div>
		<!--/.row-->

		<div class="row">
			<br>
		</div>
		<!--/.row-->

		<!--/. FORMULARIO PACIENTE-->



		<div class="panel panel-default">
			<div class="panel-heading">Buscar Paciente</div>
			<div class="panel-body">
            <div class="col-md-6">
					<form role="form" method="get" action="../persistencia/pap_ivaaDAO.php">
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
							<label>Tipo de examen</label>
							<select  class="form-control" name="examenes" id="examenes" onchange="mostrarResultados();">
          						<option value="">Seleccionar Examen</option>
  					 		 </select>
						</div>

						<div class="form-group">
							<label>Centro de Referencia</label>
							<select name="establecimientoorigen" class="form-control" required>
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
							<label>Fecha de Examen</label>
							<input  name="fechaexamen" type="date" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Fecha de Entrega</label>
							<input   name="fechaentrega" type="date" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Motivo de Referencia</label>
							<input name="motivoreferencia" placeholder="Motivo de Referencia" class="form-control" required>
						</div>
						<div class="form-group">
							<div class="checkbox">
							<label>
								<input  name="referenciaefectiva" type="checkbox" value="1">Referencia Efectiva
							</label>
							</div>
						</div>

						<div class="form-group">
							<label>Procedimiento Realizado de DX</label>
							<input name="procedimiendodx" placeholder="Procedimiento realizado de DX" class="form-control">
						</div>
						<div class="form-group">
							<label>Procedimiento Realizado de TTO</label>
							<input name="procedimientotto" placeholder="Procedimiento TTO" class="form-control">
						</div>
				</div>
					<div class="col-md-6">

						<div class="form-group">
							<label>Centro que brindó atención</label>
							<select name="establecimientodestino" class="form-control">
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
						<label>Resultados</label>
						<select  name="resultados" id="resultados" class="form-control">

        				  <option value="">Seleccionar Resultado</option>
    					</select>
					</div>
					<div class="form-group">
						<label for="">Responsable</label>
						<input type="text" name="responsable" placeholder="Ingrese Responsable"  class="form-control">
					</div>

					<button type="submit" class="btn btn-primary">Registrar</button>

					</div>
				</div>


				</form>

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
