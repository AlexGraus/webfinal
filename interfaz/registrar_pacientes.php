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
					<form id="fomulario" role="form" method="GET" >
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
			  <div class="col-md-5">
					</div class="form-control">
						<input type="submit" class="btn btn-primary btn-lg"  value ="Registrar">
					</div>
		
                </div>
				</form>
			</div>
		</div>

	</div>
	<!--/.main-->


    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script src="../js/sweetalert2.min.js"></script>
    <script src="../js/sweetalert2.all.min.js"></script>
	<script>
			$(document).ready(function(){
			$('#fomulario').on('submit',function(e) { 
				 //Don't foget to change the id form
			$.ajax({
				url:'../persistencia/PacienteDAO.php', //===PHP file name====
				data:$(this).serialize(),
				type:'GET',
				success:function(data){
				console.log(data);
				//Success Message == 'Title', 'Message body', Last one leave as it is
				Swal({
					position: 'top-end',
					type: 'success',
					title: 'Paciente registrado correctamente!!!',
					showConfirmButton: false,
					timer: 1500
				})
				$('#fomulario').get(0).reset();
				},
				error:function(data){
				//Error Message == 'Title', 'Message body', Last one leave as it is
				swal("Oops...", "Something went wrong :(", "error");
				}
			});
				e.preventDefault(); //This is to Avoid Page Refresh and Fire the Event "Click"
			});
		});
	</script>
<?php require_once "scriptsjs.php"; ?>
</body>

</html>
