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
					<form role="form" method="get" action="../persistencia/pap_ivaaDAO.php">
            <div class="form-group">
							<label for="caja_busqueda">DNI</label>
              <?php include_once 'scriptsbaf.php'; ?>
                <input type="text" id="caja_busqueda"  name="dnipaciente" class="form-control" placeholder="Buscar DNI" onkeypress="return solonumeros(event)" onpaste="return false" required/>
						</div>
						<div id="buscandoCodigo" class="form-group">

						</div>

			</div>
      <div class="col-md-6">
        <br>
        <div align="right">
         <button type="button" name="age" id="age" data-toggle="modal" data-target="#add_data_Modal" class="btn btn-info">Registrar Nuevo</button>
        </div>
      </div>


			</div>
		</div>

		<div class="panel panel-default">
				<div class="panel-heading">Registrar Examen</div>
				<div class="panel-body">
				<div class="col-md-6">
				<div class="form-group">
							<label>Tipo de examen</label>
							<select  class="form-control" name="examenes" id="examenes" onchange="mostrarResultados();">
          						<option value="">Seleccionar Examen</option>
  					 		 </select>
						</div>
						<div class="form-group">
							<label>Fecha de Examen</label>
							<input  name="fechaexamen" type="date" class="form-control" required>
						</div>
						<div class="form-group">
						<label>Resultados</label>
						<select  name="resultados" id="resultados" class="form-control">
        				  <option value="">Seleccionar Resultado</option>
    					</select>
					</div>
          <div class="form-group">
							<label>Centro de Procedencia</label>
							<select name="centroatencion" class="form-control" required>
							<?php  include_once ('../entidades/establecimiento.php');
								$centro_origen= Establecimiento::constructorvacio();
								$info=$centro_origen->mostrar();
								while ($filita=$info->fetch_array()) {
								?>
							<option value = <?php echo $filita['nombre'] ?> > <?php echo $filita['codigo']; ?> - <?php echo $filita['nombre']; ?> -<?php echo $filita['distrito']; ?></option>
							<?php
								}
						    ?>
							</select>
						</div>
		
						
						

						
				</div>
					<div class="col-md-6">
					<div class="form-group">
							<label>Motivo de Referencia</label>
							<input name="motivoreferencia" placeholder="Motivo de Referencia" class="form-control" required>
						</div>
					<div class="form-group">
                  <label for="">Referenciar:</label>
                      <div class="custom-control custom-radio">
                <input type="radio" class="custom-control-input"  name="realizar" value="SI" onclick="mostrar()" required>
                <label class="custom-control-label" for="customControlValidation2">Si</label>
            </div>
            <div class="custom-control custom-radio mb-3">
                <input type="radio" class="custom-control-input" name="realizar" value="NO" onclick="ocultar()" required>
                <label class="custom-control-label" for="customControlValidation3">No</label>
            </div> 

             <input type="hidden" name="personal" value="<?php echo $fila['id']; ?>">

            <div class="form-group">
            <div id="probando" display="none">
                  <label> Establecimiento de Referencia</label>
                  <select   class="form-control" name="centroreferencia">
                  <option value="">---------</option>
                    <?php  include_once ('../entidades/centro_referencia.php');
                    $referencia= Referencia::constructorvacio();
                    $info=$referencia->mostrar();
                    while ($filita=$info->fetch_array()) {
                      ?>
                      <option value="<?php echo $filita['nombre']; ?> " > <?php echo $filita['codigo']; ?> - <?php echo $filita['nombre']; ?> -<?php echo $filita['distrito']; ?></option>
                  <?php }	?>
                </select>
                </div>
             </div>    
				
			
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

    <div id="add_data_Modal" class="modal fade">
     <div class="modal-dialog">
      <div class="modal-content">
       <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" align="center">Registrar Nuevo Paciente</h4>
       </div>
       <div class="modal-body">
        <form  id="insert_form" method="get" action="../persistencia/PacienteDAO.php" >
          <input type="hidden" name="tabla_id" value="VPH" >
          <label>DNI</label>
          <?php include_once 'scriptsbaf.php'; ?>
            <input type="text" id="dni"  name="dni" class="form-control" placeholder="Ingrese DNI" onkeypress="return solonumeros(event)" onpaste="return false" required/>
          <br />
         <label>Nombres y Apellidos</label>
         <input type="text" id="nombres" name="nombrespaciente" class="form-control" placeholder="Ingrese Nombres y Apellidos" required/>
         <br />
           <label>Fecha de Nacimiento</label>
           <input  id="fecha"  name="fechapaciente" type="date" class="form-control" min="1940-04-01" required>
         <br />
           <label>Grupo Familiar </label>
           <input name="grupofamiliar" placeholder="Ingrese grupo familiar" class="form-control" >
         <br />
           <label>Historia Clinica </label>
           <input name="historiaclinica" placeholder="Ingrese historia clinica" class="form-control" >
         <br />
           <label>Seguro</label>
           <select class="form-control" name="sispaciente">
             <option value="SIS">SIS</option>
             <option value="ESSALUD">ESSALUD</option>
             <option value="">MAPFRE</option>
             <option value="NO TIENE">NO TIENE</option>
             <option value="MAPFRE">OTRO</option>
           </select>
         <br />
         <label>Dirección </label>
         <input name="direccionpaciente" placeholder="Ingrese direccion" class="form-control" >
         <br />
         <label>Telefono 1</label>
         <input id="tele"  name="telefonopaciente" placeholder="Ingrese telefono" class="form-control" required>
         <br/>
         <label>Telefono 2</label>
         <input id="tele"  name="telefonopaciente2" placeholder="Ingrese telefono" class="form-control" >
         <br/>
         <input type="submit" name="insert" id="insert" value="Registrar" class="btn btn-success" align="center"/>
        </form>
       </div>
       <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
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
