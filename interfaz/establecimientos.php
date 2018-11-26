<?php
include ('menu.php');
 ?>

    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="index.php">
						<em class="fa fa-home"></em>
					</a></li>
				<li class="active"> Registrar Centros de Salud</li>
			</ol>
		</div>
		<!--/.row propio de la pagina-->

		<div class="row">
			<br>
		</div>
		<!--/.row-->
		<div class="panel panel-default">
			<div class="panel-body" >
					<div id="origen" class="col-md-6">
            <form role="form" method="POST" action="../persistencia/establecimientoDAO.php">
            <div class="panel-heading">Registrar Renaes</div>
						<div class="form-group">
							<label>Codigo Renaes</label>
							<input name="codigo" class="form-control" placeholder="Renaes" required>
						</div>
            <div class="form-group">
              <label>Nombre del Establecimiento</label>
              <input name="nombre" class="form-control" placeholder="Nombre del Establecimiento" required>
            </div>
            <div class="form-group">
              <label>Provincia</label>
              <input placeholder="Micro Red" class="form-control" value="Trujillo" disabled>
              <input type="hidden" name="provincia"  value="Trujillo">
            </div>
            <div class="form-group">
              <label>Distrito</label>
              <input name="distrito" placeholder="Distrito" class="form-control">
            </div>
            <div class="" align="center">
                  <input name="submit" type="submit" class="btn btn-primary" value="Registrar">
            </div>
                  </form>
				</div>

        <div id="referencia" class="col-md-6">
          <form role="form" class="form-group" method="GET" action="../persistencia/referenciaDAO.php" >
          <div class="panel-heading">Centros de Referencia </div>
          <div class="form-group">
            <label>Codigo Renaes</label>
            <input name="renaes" placeholder="Distrito" class="form-control" required>
          </div>
          <div class="form-group">
            <label>Nombre</label>
            <input name="eess" placeholder="Distrito" class="form-control">
          </div>
          <div class="form-group">
            <label>Distrito</label>
            <input name="distritito" placeholder="Distrito" class="form-control">
          </div>
          <div class="" align="center">
                <input name="enviar" type="submit" class="btn btn-info" value="Registrar">
          </div>
          </form>
        </div>

			</div>
		</div>
	</div>


<?php require_once "scriptsjs.php"; ?>
</body>
</html>
