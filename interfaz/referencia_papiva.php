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
				<li class="active"> REFERENCIA PAP,IVAA O VPH</li>
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
					<form id="formrivaa" role="form" method="GET" >
                        <div class="form-group">
                    <label for="caja_busqueda">DNI</label>
                    <?php include_once 'scriptsbaf.php'; ?>
                        <input type="text" id="caja_busqueda"  name="dnipaciente" class="form-control" placeholder="Buscar DNI" onkeypress="return solonumeros(event)" onpaste="return false" required/>
                    </div>
                    <div id="buscandoCodigo" class="form-group">
                    </div>
                    </div>
                    <div class="col-md-3">
                    <div class="form-group">
                        <label for="caja_busqueda">Año de examen</label>
                        <select id="annio" name="annio" class="form-control">
                        <option value="0">Año</option>
                        <?php
                        $year=date("Y");
                        for($i=$year;$i>=2014;$i--) { echo "<option value='".$i."'>".$i."</option>"; } ?>
                        </select>
                    </div>
                    </div>
					<div class="col-md-2"> <br>
        				  <div class="form-group">
							<button type="button" name="search" id="search" value="Buscar" class="btn btn-primary btn-lg"> <span class="glyphicon glyphicon-search"></span> Registrar</button>
          </div>
        </div>
    

			</div>
		</div>

		<div class="panel panel-default">
				<div class="panel-heading">Registrar Examen</div>
				<div class="panel-body">
				<div class="col-md-6">
                <div class="form-group">
							<label>Fecha de Referencia</label>
							<input  name="fechareferencia" type="date" class="form-control" required>
				</div>
						
                <div class="form-group">
							<label>Procedimiento</label>
							<input name="procedimiento" placeholder="Procedimiento" class="form-control" required>
						</div>
				</div>
		
                <div class="col-md-6">
                    <div class="form-group">
							<label>Resultado del Procedimiento</label>
							<input name="resultadopro" placeholder="Resultado del procedimiento" class="form-control" required>
						</div>
                        <div class="form-group">
							<label>Tratamiento</label>
							<input name="tratamiento" placeholder="Tratamiento" class="form-control" required>
						</div>	
                </div>
				<div class="col-md-12 text-center">
                    <div class ="form-group">
                            <button type="submit" class="btn btn-primary btn-lg"> <span class="glyphicon glyphicon-ok"></span> Registrar</button>
                    </div>
                </div>
				</form>

			</div>
		</div>


	<!--/.main
-->
	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script src="../js/buscarfecha_pap.js"></script>
	<script src="../js/sweetalert2.min.js"></script>
    <script src="../js/sweetalert2.all.min.js"></script>
	<script>
			$(document).ready(function(){
			$('#formrivaa').on('submit',function(e) { 
				 //Don't foget to change the id form
			$.ajax({
				url:'../persistencia/referencia_papvph.php', //===PHP file name====
				data:$(this).serialize(),
				type:'GET',
				success:function(data){
				console.log(data);
				//Success Message == 'Title', 'Message body', Last one leave as it is
				Swal({
					position: 'top-end',
					type: 'success',
					title: 'Examen ECM registrado correctamente!!',
					showConfirmButton: false,
					timer: 1500
				})
        $('#formrivaa').get(0).reset();
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
