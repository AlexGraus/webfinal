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
				Seguimiento Mamografia
			</ol>
		</div>
		<!--/.row-->

		<div class="row">
			<br>
		</div>
		<!--/.row-->

		<div class="panel panel-default">
			<div class="panel-heading">Buscar seguimiento paciente</div>
			<div class="panel-body">
				<div class="col-md-6">
					<div class="form-group">
							<label for="caja_busqueda">DNI</label>
							<input name="dnipaciente" id="caja_busqueda" class="form-control" placeholder="Buscar DNI">
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
		<!--/.row-->

	<!--/.main-->

	 <!-- JQUERY-->
<?php require_once "scriptsjs.php"; ?>
 <script src="../js/buscarmamografia.js"></script>
</body>

</html>
