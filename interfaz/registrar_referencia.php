<?php
include ('menu.php');
 ?>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
  <div class="row">
    <ol class="breadcrumb">
      <li><a href="index.php">
          <em class="fa fa-home"></em>
        </a></li>
      <li class="active">Registro de Referencia de Pacientes</li>
    </ol>
</div>
<div class="row">
  <br>
</div>
<div class="panel panel-default">
  <div class="panel-heading">Buscar examen Paciente</div>
  <div class="panel-body">
        <div class="col-md-3">
          <form class="" action="../persistencia/referencia_ecmDAO.php" method="POST">  
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
        <div class="col-md-3">
          <label for="caja_busqueda">Fecha de Atencion Referencia</label>
          <div class="form-group">
            <input name="fecha_atencion" type="date" class="form-control" min="2010-04-01" >
          </div>
          <div class="form-group">
            <label>¿SE HIZO BAAF? </label> <br>
          <?php
          include_once 'scriptsbaf.php';
          ?>
          <input type="radio" name="hacer_baf" value="SI" onclick="mostrar()">Si &nbsp;&nbsp;
          <input type="radio" name="hacer_baf" value="NO" onclick="ocultar()">No<br><BR>
          </div>
        </div>

  </div>
</div>
<div class="panel panel-default" >
	<div class="panel-heading">Datos de la Refencia del paciente</div>

  <div class="panel-body" id="probando">
		<div class="col-md-6">
      <div class="form-group">
        <label>Fecha de Examen BAAF</label>
        <input name="fecha_examen_baf" type="date" class="form-control" min="2010-04-01" >
      </div>
      <div class="form-group">
        <label>Nombre de Especialista</label>
        <input name="medico_especialista"  class="form-control" placeholder="Nombre del Medico">
      </div>
      <div class="form-group">
        <label>Descripcion de la muestra</label>
        <textarea name="descrpcion_muestra" rows="3" cols="6" class="form-control" placeholder="Observacion" required></textarea>
      </div>
    	<div class="form-group">
				<label>N° Registro</label>
				<input name="num_registro"  class="form-control" placeholder="N° Registro">
			</div>
		</div>
		<div class="col-md-6">
      <div class="form-group">
        <label>Fecha de Entrega de Resultado</label>
        <input name="fecha_resultado" type="date" class="form-control" min="1940-04-01" >
      </div>
      <div class="form-group">
        <label>Nombre de Patologo Especialista</label>
        <input name="patologo"  class="form-control"  placeholder="Nombre del Patologo">
      </div>
      <div class="form-group">
        <label>Resultado</label>
        <input name="resultado"  class="form-control" placeholder="Resultados del Examen">
      </div>
      <div class="form-group">
        <label>Descripcion del Resultado</label>
      <textarea name="resultado_descripcion" rows="3" cols="6" class="form-control" placeholder="Observacion" required></textarea>
      </div>
		</div>

	</div>
  <div class="form-group" >
    <input type="submit"  class="btn btn-primary form-control"value="Registrar" algin="center">
  </div>
</div>

</form>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="../js/buscarexamenpaciente.js"></script>
<?php require_once "scriptsjs.php"; ?>
</body>
</html>
