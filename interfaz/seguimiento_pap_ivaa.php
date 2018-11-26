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
				Seguimiento PAP IVA VHP
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
	</div>
	<!--/.main-->

	 <!-- JQUERY-->
	 <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <!-- DATATABLES Y BUTTONS-->

 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
 <script type="text/javascript" src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.10.18/b-1.5.4/b-colvis-1.5.4/b-flash-1.5.4/b-html5-1.5.4/b-print-1.5.4/r-2.2.2/datatables.min.js"></script>
        <!--CAMBIO DE IDIOMA Y SELECCIÓN DEL ID-->
	<script src="../js/listarseguimientos.js"></script>


	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/chart.min.js"></script>
	<script src="../js/chart-data.js"></script>
	<script src="../js/easypiechart.js"></script>
	<script src="../js/easypiechart-data.js"></script>
	<script src="../js/bootstrap-datepicker.js"></script>
	<script src="../js/custom.js"></script>
</body>

</html>
