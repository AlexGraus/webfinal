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
				<li class="active"> Referencia Mamografía Bilateral</li>
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
          <form class="" action="../persistencia/referencia_mamografiaDAO.php" method="GET">
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
          <div class="">
              <input type="button" name="search" id="search" value="Buscar" class="btn btn-info form-control">
          </div>
        </div>

 		
			</div>
		</div>

		<div class="panel panel-default">
				<div class="panel-heading">Registrar Ecografía</div>
				<div class="panel-body">
				<div class="col-md-6">
			        
              <div class="form-group">
							<label>Fecha de Referencia</label>
							<input  name="fechareferencia" type="date" class="form-control" required>
						</div>
						
						<div class="form-group">
							<label>Fecha de Ecografía</label>
							<input   name="fechaecografia" type="date" class="form-control" >
						</div>
				</div>
                <div class="col-md-6">
                <div class="form-group">
							<label>Resultado de Ecografía</label>
							<select  class="form-control" name="examenecografia" >
									<option value="No aplica">--------</option>
          						    <option value="BI-RADS 0">BI-RADS 0</option>
                                    <option value="BI-RADS I">BI-RADS I</option>
                                    <option value="BI-RADS II">BI-RADS II</option>
                                    <option value="BI-RADS III">BI-RADS III</option>
                                    <option value="BI-RADS IV">BI-RADS IV</option>
                                    <option value="BI-RADS V">BI-RADS V</option>
                                    <option value="BI-RADS VI">BI-RADS VI</option>
  					 		 </select>
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
		</div>

	<!--/.main
-->
	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script src="../js/buscarfechapaciente.js"></script> 
	<script src="../js/resultados.js"></script>
<?php require_once "scriptsjs.php"; ?>

</body>

</html>
