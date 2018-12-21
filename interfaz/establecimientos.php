<?php
include ('menu.php');
/*
if ($fila['tipo']!="Administrador") {
  echo "<script language='javascript'>window.location='index.php'</script>;";
}*/
 ?>

    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="index.php">
						<em class="fa fa-home"></em>
					</a></li>
				<li class="active"> Registrar Centros de Salud</li>
			</ol>
		</div>
		<!--/.row propio de la pagina-->

		<div class="row">
			<br>
		</div>
		<!--/.row-->
		<div class="panel panel-default">
			<div class="panel-body" >
					<div id="form1" class="col-md-6">
            <form id="fomulario" role="form" method="POST" >
            <div class="panel-heading">Registrar Renaes</div>
						<div class="form-group">
							<label>Codigo Renaes</label>
							<input name="codigo" class="form-control" placeholder="Renaes" required>
						</div>
            <div class="form-group">
              <label>Nombre del Establecimiento</label>
              <?php include ('scriptsbaf.php'); ?>
              <input id="xd" name="nombre" class="form-control" placeholder="Nombre del Establecimiento" onchange="myFunction(this.options[this.selectedIndex].value)" required>
            </div>
            <div class="form-group">
              <label>Provincia</label>
              <input placeholder="Micro Red" class="form-control" value="Trujillo" disabled>
              <input type="hidden" name="provincia"  value="Trujillo">
            </div>
            <div class="form-group">
              <label>Distrito</label>
              <input name="distrito" placeholder="Distrito" class="form-control">
            </div>
            <div class="" align="center">
                  <input name="submit" type="submit" class="btn btn-primary" value="Registrar">
            </div>
                  </form>
				</div>

        <div id="form2" class="col-md-6">
          <form  id="formulario2" role="form" class="form-group" method="GET"  >
          <div class="panel-heading">Centros de Referencia </div>
          <div class="form-group">
            <label>Codigo Renaes</label>
            <input name="renaes" placeholder="Distrito" class="form-control" required>
          </div>
          <div class="form-group">
            <label>Nombre</label>
            <input name="eess" placeholder="Distrito" class="form-control">
          </div>
          <div class="form-group">
            <label>Distrito</label>
            <input name="distritito" placeholder="Distrito" class="form-control">
          </div>
          <div class="" align="center">
                <input name="enviar" type="submit" class="btn btn-return" value="Registrar">
          </div>
          </form>
        </div>

			</div>
		</div>
	</div>
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script src="../js/sweetalert2.min.js"></script>
    <script src="../js/sweetalert2.all.min.js"></script>
	
  	<script>
			$(document).ready(function(){
			$('#formulario2').on('submit',function(e) { 
				 //Don't foget to change the id form
			$.ajax({
				url:'../persistencia/referenciaDAO.php', //===PHP file name====
				data:$(this).serialize(),
				type:'GET',
				success:function(data){
				console.log(data);
				//Success Message == 'Title', 'Message body', Last one leave as it is
				Swal({
					position: 'top-end',
					type: 'success',
					title: 'Establecimiento registrado correctamente!',
					showConfirmButton: false,
					timer: 1500
				})
				$('#formulario2').get(0).reset();
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

<script>
			$(document).ready(function(){
			$('#fomulario').on('submit',function(e) { 
				 //Don't foget to change the id form
			$.ajax({
				url:'../persistencia/establecimientoDAO.php', //===PHP file name====
				data:$(this).serialize(),
				type:'POST',
				success:function(data){
				console.log(data);
				//Success Message == 'Title', 'Message body', Last one leave as it is
				Swal({
					position: 'top-end',
					type: 'success',
					title: 'Establecimiento registrado correctamente!',
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
