<?php
include ('menu.php');
 ?>

	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="index.php">
						<em class="fa fa-home"></em>
					</a></li>
				<li class="active">Registro ECM y BAF 	Anormal</li>
			</ol>
	</div>
	<div class="row">
		<br>
	</div>

	<div class="panel panel-default">
		<div class="panel-heading">Buscar Paciente</div>
		<div class="panel-body">
					<div class="col-md-6">
				<form role="form" method="GET" action="../persistencia/ecm_baf_anormalDAO.php">
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
		<div class="panel-heading">Datos Seguimiento</div>
			<div class="panel-body">
				<div class="col-md-6">
					<div class="form-group">
						<label>Año</label>
						<input name="annio"  class="form-control" placeholder="Año">
					</div>
					<div class="form-group">
							<label>Fecha de Visita</label>
							<input name="fecha_visita" type="date" class="form-control" min="1940-04-01" >
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label>Establecimiento Origen</label>
						<select class="form-control" name="centro_origen">
							<?php  include_once ('../entidades/establecimiento.php');
							$centro_origen= Establecimiento::constructorvacio();
							$info=$centro_origen->mostrar();
							while ($filita=$info->fetch_array()) {
							?>
							<option value="<?php echo $filita['nombre']; ?> " > <?php echo $filita['codigo']; ?> - <?php echo $filita['nombre']; ?> -<?php echo $filita['distrito']; ?></option>

							<?php }	?>
						</select>
					</div>
					<div>
						<label>Establecimiento de Atencion</label>
						<select class="form-control" name="centro_destino">
							<?php  include_once ('../entidades/centro_referencia.php');
							$referencia= Referencia::constructorvacio();
							$info=$referencia->mostrar();
							while ($filita=$info->fetch_array()) {
							?>
							<option value="<?php echo $filita['nombre']; ?> " > <?php echo $filita['codigo']; ?> - <?php echo $filita['nombre']; ?> -<?php echo $filita['distrito']; ?></option>

							<?php }	?>
						</select>
					</div>
				</div>
			</div>
	</div>

<div class="panel panel-default">
	<div class="panel-heading">Registrar Examen ECM</div>
	<div class="panel-body">
		<div class="col-md-6">
			<div class="form-group">
				<label>Fecha de ECM Anormal</label>
				<input name="fecha" type="date" class="form-control" min="1940-04-01" required>
			</div>
			<div class="form-group">
				<label>Diagnostico ECM</label>
				<input name="diagnostico"  class="form-control" placeholder="Diagnostico ECM" required>
			</div>
			<div class="form-group">
				<label>Plan Clinico</label>
				<input name="plan_clinico"  class="form-control" placeholder="Plan Clinico" required>
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label>Observacion</label>
				<input name="observacion"  class="form-control" placeholder="Observacion" required>
			</div>
			<div class="form-group">
				<label>Fecha de HTDE</label>
				<input name="fecha_HTDE" type="date" class="form-control" min="1940-04-01">
			</div>
				<div class="form-group">
					<label>¿SE HIZO BAF? </label><br>
					<?php
					include_once 'scriptsbaf.php';
					?>
					<input type="radio" name="radio" value="SI" onclick="si_baf()">Si<br>
					<input type="radio" name="radio" value="NO" onclick="no_baf()">No<br><BR>
				</div>
		</div>
	</div>
</div>

<div class="panel panel-default" id="datos_baf">
	<div class="panel-heading">Registrar Examen BAF</div>
	<div class="panel-body">
		<div class="col-md-6">
			<div class="form-group">
				<label>Informe</label>
				<input name="informe"  class="form-control" placeholder="N° de Informe">
			</div>
			<div class="form-group">
				<label>Fecha de Examen</label>
				<input name="fecha_examen" type="date" class="form-control" min="1940-04-01" >
			</div>
			<div class="form-group">
				<label>Resultado</label>
				<input name="resultado"  class="form-control" placeholder="Resultados del Examen">
			</div>
			<div class="form-group">
				<label>Descripcion</label>
				<input name="descripcion"  class="form-control" placeholder="Descripcion">
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label>Fecha de Entrega</label>
				<input name="fecha_entrega" type="date" class="form-control" min="1940-04-01" >
			</div>
			<div class="form-group">
				<label>Realizado Por</label>
				<input name="medico_realiza"  class="form-control" placeholder="Nombre del Medico">
			</div>
			<div class="form-group">
				<label>Supervisado por</label>
				<input name="medico_supervisa"  class="form-control"  placeholder="Nombre del Medico">
			</div>
			<div class="form-group">
				<label>Patologo</label>
				<input name="patologo"  class="form-control"  placeholder="Nombre del Patologo">
			</div>
		</div>

	</div>
</div>
<div class="panel panel-default">
	<div class="">
		<div class="form-group" align="center" >
			<input type="submit"  name = "submit" class=" btn btn-primary" Value="Registrar">
		</div>
	</div>
	</form>
</div>

</div>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="../js/buscapaciente.js"></script>
<script src="../js/resultados.js"></script>
<?php require_once "scriptsjs.php"; ?>
</body>
</html>
