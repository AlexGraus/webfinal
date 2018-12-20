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
					<form role="form" method="get" action="../persistencia/referencia_papvph.php">
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

<?php require_once "scriptsjs.php"; ?>

</body>

</html>
