<?php
include ('menu.php');
/*
??
if ($fila['tipo']!="Administrador") {
  echo "<script language='javascript'>window.location='index.php'</script>;";
}*/
 ?>
  <!--/.----------------------------------------------------------------------------------------->
  <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
						<em class="fa fa-home"></em>
					</a></li>
				<li class="active">Usuarios</li>
			</ol>
		</div>
		<!--/.row-->

		<div class="row">
			<br>
		</div>
		<!--/.row-->
		<div class="panel panel-default">
			<div class="panel-heading">Registro de Usuario</div>
			<div class="panel-body">
				<form id="fomulario" role="form" method="POST" enctype="multipart/form-data" >
				<div class="col-md-6">
						<div class="form-group">
							<label>Nombres y Apellidos</label>
							<input id="name" name="nombre" class="form-control" placeholder="Nombres y Apellidos" required>
						</div>
                        <div class="form-group">
							<label>Email</label>
							<input name="email" placeholder="Email" class="form-control">
						</div>
                        <div class="form-group">
							<label>Tipo de Usuario</label>
							<select name="tipo" class="form-control">
								<option value="Administrador">Coordinador</option>
								<option value="Digitador">Obstetra</option>
							</select>
						</div>

				        </div>
				    <div class="col-md-6">

                        <div class="form-group">
							<label>Usuario (Dni)</label>
							<input name="usuario" placeholder="DNI" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Contraseña</label>
							<input name="password" placeholder="Ingrese Contraseña" class="form-control" type="password" required>
						</div>
						<input  type="submit"  class="btn btn-primary btn-lg" value="Registrar">
					</div>

				</form>
			</div>

		</div>

	</div>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script src="../js/sweetalert2.min.js"></script>
    <script src="../js/sweetalert2.all.min.js"></script>
	<script>
			$(document).ready(function(){
			$('#fomulario').on('submit',function(e) { 
				 //Don't foget to change the id form
			$.ajax({
				url:'../persistencia/usuarioDAO.php', //===PHP file name====
				data:$(this).serialize(),
				type:'POST',
				success:function(data){
				console.log(data);
				//Success Message == 'Title', 'Message body', Last one leave as it is
				Swal({
					position: 'top-end',
					type: 'success',
					title: 'Usuario registrado correctamente!!',
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
