<?php

		include ("../entidades/conexion.php");
		$cn = new Conexion();


		$salida = "";
		//$query = "SELECT *FROM paciente";

			if(isset($_GET['consulta']) && isset($_GET['consulta2'])){
			//or nombre LIKE '%".$q."%'"
			$q = $cn->real_escape_string($_GET['consulta']);
      $q2 = $cn->real_escape_string($_GET['consulta2']);
			$query = "SELECT p.nombres_apellidos,sm.tipoexamen,sm.resultados,sm.codigoseguimientopapivaa from paciente as p inner join seguimiento_pap_ivaa 			as sm 
			on p.dni= sm.codigopaciente
            where p.dni = '".$q."' and sm.referirvph = 'Si' and YEAR(sm.fechaexamen) = '".$q2."'";
			$resultado = $cn->query($query);
			if($resultado->num_rows ==1){

                
            

				while($fila = $resultado->fetch_assoc()){

					$salida.="
					<div class = 'form-group'>
					<label>Nombres y Apellidos</label>
					<input class='form-control' value ='".$fila['nombres_apellidos']."' disabled>
					</div>
          
          <div class = 'form-group'>
          <input class='hidden' name='codigo' value ='".$fila['codigoseguimientopapivaa']."'>
		  </div>
		 			 <div class = 'form-group'>
					<label>Tipo de Examen</label>
					<input class='form-control' name='tipoexam'  value ='".$fila['tipoexamen']." ' disabled>
					</div>
					<div class = 'form-group'>
					<label>Resultado de Examen</label>
					<input class='form-control' value ='".$fila['resultados']." ' disabled>
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
