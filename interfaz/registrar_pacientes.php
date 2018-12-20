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
				<li class="active"></li>
				Registrar Pacientes
			</ol>
		</div>
		<!--/.row-->

		<div class="row">
			<br>
		</div>
		<!--/.row-->
		<div class="panel panel-default">
			<div class="panel-heading">Registro de Paciente</div>
			<div class="panel-body">
				<div class="col-md-6">
					<form id="fomulario" role="form" method="get" action="../persistencia/PacienteDAO.php" >
						<div class="form-group">
							<label>Nombres y Apellidos</label>
							<input id="nombres" name="nombrespaciente" class="form-control" placeholder="Ingrese Nombres y Apellidos" required>
						</div>
						<div class="form-group">
							<label>DNI</label>
              <?php include_once 'scriptsbaf.php'; ?>
							  <input type="text" id="dni"  name="dni" class="form-control" placeholder="Ingrese DNI" onkeypress="return solonumeros(event)" onpaste="return false" required/>
						</div>
						<div class="form-group">
							<label>Fecha de Nacimiento</label>
							<input  id="fecha"  name="fechapaciente" type="date" class="form-control" min="1940-04-01" required>
						</div>
						<div class="form-group">
							<label>Teléfono</label>
							<input id="tele"  name="telefonopaciente" placeholder="Ingrese teléfono" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Teléfono 2</label>
							<input id="tele"  name="telefonopaciente2" placeholder="Ingrese teléfono" class="form-control" >
						</div>

				</div>
				<div class="col-md-6">
						<div class="form-group">
							<label>Dirección </label>
							<input name="direccionpaciente" placeholder="Ingrese dirección" class="form-control" >
						</div>
						<div class="form-group">
							<label>Historia Clínica </label>
							<input name="historiaclinica" placeholder="Ingrese historia clínica" class="form-control" >
						</div>
						<div class="form-group">
							<label>Grupo Familiar </label>
							<input name="grupofamiliar" placeholder="Ingrese grupo familiar" class="form-control" >
						</div>
						<div class="form-group">
							<label>Seguro</label>
              <select class="form-control" name="sispaciente">
                <option value="SIS">SIS</option>
                <option value="ESSALUD">ESSALUD</option>
                <option value="NO TIENE">NO TIENE</option>
                <option value="MAPFRE">OTRO</option>
              </select>
						</div>
						<input type="submit" class="btn btn-primary"  value ="Registrar">
					</div>

				</form>
			</div>
		</div>

	</div>
	<!--/.main-->


    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

<?php require_once "scriptsjs.php"; ?>
</body>

</html>
