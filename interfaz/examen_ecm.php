<?php
include ('menu.php');
 ?>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="index.php">
						<em class="fa fa-home"></em>
					</a></li>
				<li class="active">Registro de atencion ECM</li>
			</ol>
	</div>
	<div class="row">
		<br>
	</div>

	<div class="panel panel-default">
		<div class="panel-heading">Buscar Paciente</div>
		<div class="panel-body">
					<div class="col-md-6">
				<form role="form" method="GET" action="../persistencia/examenEcmDAO.php">
          <div class="form-group">
            <label for="caja_busqueda">DNI</label>
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
	<div class="panel-heading">Registrar Examen ECM</div>
	<div class="panel-body">
		<div class="col-md-6">
			<div class="form-group">
				<label>Fecha de examen </label>
				<input name="fecha" type="date" class="form-control" min="1940-04-01" required>
			</div>
      <div class="form-group">
        <label>Centro de origen del paciente</label>
        <select class="form-control" name="centro_origen">
          <?php  include_once ('../entidades/establecimiento.php');
          $centro_origen= Establecimiento::constructorvacio();
          $info=$centro_origen->mostrar();
          while ($filita=$info->fetch_array()) {
          ?>
          <option value="<?php echo $filita['nombre']; ?> " > <?php echo $filita['codigo']; ?> - <?php echo $filita['nombre']; ?> -<?php echo $filita['distrito']; ?></option>

          <?php }	?>
        </select>
      </div>
			<div class="form-group">
				<label>Diagnostico</label>
				<select class="form-control" name="diagnostico" >
          <?php
          include_once 'scriptsbaf.php';
          ?>
          <option value="NORMAL">NORMAL</option>
          <option value="ANORMAL NO TUMORAL"> ANORMAL NO TUMORAL</option>
          <option value="ANORMAL TUMORAL" >ANORMAL TUMORAL</option>
          <option value="SOPECHA DE CANCER" >SOPECHA DE CANCER</option>
        </select>
			</div>

		</div>
		<div class="col-md-6">
      <div class="form-group">
        <label>Descripcion del Diagnostico</label>
        <textarea name="descripcion_resultado" rows="3" cols="6" class="form-control" placeholder="Descripcion del Diagnostico" required></textarea>
      </div>
      <div class="">
        <label for="">Referenciar:</label>
        <input type="radio" name="hacer_baf" value="SI" onclick="mostrar()">Si &nbsp;&nbsp;
        <input type="radio" name="hacer_baf" value="NO" onclick="ocultar()">No<br><BR>
      </div> <br>
      <div id="probando" display="none">
        <label> Establecimiento de Referencia</label>
        <select   class="form-control" name="centro_destino">
          <?php  include_once ('../entidades/centro_referencia.php');
          $referencia= Referencia::constructorvacio();
          $info=$referencia->mostrar();
          while ($filita=$info->fetch_array()) {
            ?>
            <option value="<?php echo $filita['nombre']; ?> " > <?php echo $filita['codigo']; ?> - <?php echo $filita['nombre']; ?> -<?php echo $filita['distrito']; ?></option>
        <?php }	?>
      </select>
    </div>
    <div class="">
      <input type="hidden" name="obstetra" value="<?php echo $fila['id']; ?>">
    </div>
		</div>
	</div>
</div>


<div class="panel panel-default">
	<div class="">
		<div class="form-group" align="center" >
			<input type="submit"  name = "submit" class=" btn btn-primary" Value="Registrar">
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
      <input type="hidden" name="tabla_id" value="ECM" >
      <label>DNI</label>
      <?php include_once 'scriptsbaf.php'; ?>
      <input type="text" id="dni"  name="dni" class="form-control" placeholder="Ingrese DNI" onkeypress="return solonumeros(event)" onpaste="return false" required/>
      <br />
     <label>Nombres y Apellidos</label>
     <input type="text" id="nombres" name="nombrespaciente" class="form-control" placeholder="Ingrese Nombres y Apellidos" required/>
     <br />
       <label>Fecha de Nacimiento</label>
       <input  id="fecha"  name="fechapaciente" type="date" class="form-control" min="1960-04-01"  required>
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

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="../js/buscapaciente.js"></script>
<?php require_once "scriptsjs.php"; ?>
</body>
</html>
