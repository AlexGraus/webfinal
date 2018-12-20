<?php

		include ("../entidades/conexion.php");
		$cn = new Conexion();


		$salida = "";
		//$query = "SELECT *FROM paciente";

			if(isset($_GET['consulta']) && isset($_GET['consulta2'])){
			//or nombre LIKE '%".$q."%'"
			$q = $cn->real_escape_string($_GET['consulta']);
      $q2 = $cn->real_escape_string($_GET['consulta2']);
			$query = "SELECT p.nombres_apellidos, p.edad, ec.id, ec.diagnostico FROM paciente as p
      INNER JOIN examen_ecm as ec on p.dni=ec.paciente_dni
       WHERE p.dni ='".$q."' and ec.referenciar='SI' and ec.annio='".$q2."'";
			$resultado = $cn->query($query);
			if($resultado->num_rows ==1){

				while($fila = $resultado->fetch_assoc()){

					$salida.="
					<div class = 'form-group'>
					<label>Nombres y Apellidos</label>
					<input class='form-control' value ='".$fila['nombres_apellidos']."' disabled>
					</div>
          <div class = 'form-group'>
          <label>Edad</label>
          <input class='form-control' value ='".$fila['edad']."' disabled>
          </div>
          <div class = 'form-group'>
          <input class='hidden' name='id_examen' value ='".$fila['id']." ' >
          </div>
					<div class = 'form-group'>
					<label>Diagnostico Examen</label>
					<input class='form-control' value ='".$fila['diagnostico']." ' disabled>
					</div>
					";
				}

			}else if($resultado->num_rows >1){
			$salida="	<div class = 'form-group'>
								<label>Mensaje</label>
									<input class='form-control' value ='YA TIENE REFERENCIA' disabled>
								</div>"	;
			}
			else {

			}
		}



		echo $salida;
		?>
