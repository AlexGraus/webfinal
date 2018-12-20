<?php
include ('menu.php');
 ?>
	<!--/.sidebar-->
  <!--/.----------------------------------------------------------------------------------------->
  <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="index.php">
						<em class="fa fa-home"></em>
					</a></li>
				<li class="active">Seguimiento de Pacientes con Referencia ECM</li>
			</ol>
	</div>
	<div class="row">
		<br>
	</div>
  <div class="panel panel-default">
    <div class="panel-heading">Buscar Paciente</div>
    <div class="panel-body">
        <div class="col-md-6">
					<div class="form-group">
							<label for="caja_busqueda">DNI</label>
              <?php include_once 'scriptsbaf.php'; ?>
                <input type="text" id="caja_busqueda"  name="dnipaciente" class="form-control" placeholder="Buscar DNI" onkeypress="return solonumeros(event)" onpaste="return false" required/>
						</div>
      </div>

    </div>

  </div>
	<div class="panel panel-default">
		<div class="panel-heading">Seguimientos</div>
		<div class="panel-body">
		<div class="col-md-12">
					<div id="buscandoCodigo" class="form-group">

					</div>
		 </div>


		</div>
	</div>

  </div>

	
			 <!-- DATATABLES Y BUTTONS-->

<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.18/r-2.2.2/datatables.min.js"></script>
<?php require_once "scriptsjs.php"; ?>
<script src="../js/buscarseguimiento.js"></script>  
</body>
</html>
