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
				Reportes
			</ol>
		</div>
		<!--/.row-->

		<div class="row">
			<br>
		</div>
		<!--/.row-->

		<div class="panel panel-default">
			<div class="panel-heading">Filtrar por Fechas</div>
			<div class="panel-body">
				<div class="col-md-6">
						<div class="form-group">
							<select  class="form-control" id="tiporeporte" >
									<option value="PAP">VPH, PAP Y IVAA</option>
          						    <option value="MMM">MAMOGRAFÍA</option>
                                    <option value="ECM">ECM Y BAF</option>
  					 		 </select>
						</div>
						<div class="form-group">
							<label for="">Fecha Inicio :</label>
							<input class="form-control" type="date" name="caja" id="caja_busqueda" class="" placeholder="Buscar fecha" >
						</div>
                        <div class="form-group">
							<label for="">Fecha Fin   :</label>
							<input class="form-control" type="date" name="caja2" id="caja_busqueda2" class="" placeholder="Buscar fecha" >
						</div>
						<div class="form-group">
							<input class="form-control btn btn-primary btn-lg" type="button" name="search" id="search" value="Buscar" />
						</div>
			
				</div>

			</div>

		</div>

		<div class="panel panel-default">
			<div class="panel-heading">REPORTES</div>
			<div class="panel-body">
				<div class="col-md-12">


						<div id="buscandoCodigo" >

						</div>
				</div>


			</div>

		</div>




		</div>
		<!--/.row-->
	</div>
	<!--/.main-->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
 <script type="text/javascript" src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.10.18/b-1.5.4/b-colvis-1.5.4/b-flash-1.5.4/b-html5-1.5.4/b-print-1.5.4/r-2.2.2/datatables.min.js"></script>


	<script src="../js/buscarfechas.js"></script>


<script src="../js/bootstrap.min.js"></script>
	<script src="../js/chart.min.js"></script>
	<script src="../js/chart-data.js"></script>
	<script src="../js/easypiechart.js"></script>
	<script src="../js/easypiechart-data.js"></script>
	<script src="../js/bootstrap-datepicker.js"></script>
	<script src="../js/custom.js"></script>
</body>

</html>
