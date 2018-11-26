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
				<li class="active">Registrar Mamografía Bilateral</li>
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
					<form role="form" method="get" action="../persistencia/mamografiaDAO.php">
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
							<label>Examen</label>
							<select  class="form-control" name="examen" >
          						<option value="MX. BILATERAL">MX. BILATERAL</option>
  					 		 </select>
						</div>
                        <div class="form-group">
							<label>Fecha de Examen</label>
							<input  name="fechaexamen" type="date" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Centro de Procedencia</label>
							<select name="centroprocedencia" class="form-control" required>
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
							<label>Diagnóstico MX</label>
							<select  class="form-control" name="resultados" >
          						    <option value="BI-RADS 0">BI-RADS 0</option>
                                    <option value="BI-RADS I">BI-RADS I</option>
                                    <option value="BI-RADS II">BI-RADS II</option>
                                    <option value="BI-RADS III">BI-RADS III</option>
                                    <option value="BI-RADS IV">BI-RADS IV</option>
                                    <option value="BI-RADS V">BI-RADS V</option>
                                    <option value="BI-RADS VI">BI-RADS VI</option>
  					 		 </select>
						</div>

						<div class="form-group">
							<label>Fecha de Ecografía</label>
							<input   name="fechaecografia" type="date" class="form-control" required>
						</div>


				</div>

                <div class="col-md-6">
                <div class="form-group">
							<label>Resultado de Ecografía</label>
							<select  class="form-control" name="examenecografia" >
          						    <option value="BI-RADS 0">BI-RADS 0</option>
                                    <option value="BI-RADS I">BI-RADS I</option>
                                    <option value="BI-RADS II">BI-RADS II</option>
                                    <option value="BI-RADS III">BI-RADS III</option>
                                    <option value="BI-RADS IV">BI-RADS IV</option>
                                    <option value="BI-RADS V">BI-RADS V</option>
                                    <option value="BI-RADS VI">BI-RADS VI</option>
  					 		 </select>
						</div>
                        <div class ="form-group">
                        <button type="submit" class="form-control btn btn-info">Registrar</button>
                        </div>
                </div>

				</form>
			</div>



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
