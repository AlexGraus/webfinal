<?php
	
		include ("../entidades/conexion.php");
		$cn = new Conexion();

		
		$salida = "";
		//$query = "SELECT *FROM paciente";
		
		if(isset($_GET['consulta'])){
			//or nombre LIKE '%".$q."%'"
			$q = $cn->real_escape_string($_GET['consulta']);
			$query = "SELECT nombres_apellidos,historiaclinica FROM paciente  WHERE dni ='".$q."'";
			$resultado = $cn->query($query);
			if($resultado->num_rows > 0){
		
				while($fila = $resultado->fetch_assoc()){
					
					$salida.="
					<div class = 'form-group'>
					<label>Nombres y Apellidos</label>
					<input class='form-control' value ='".$fila['nombres_apellidos']."' disabled>
					</div>
					<div class = 'form-group'>
					<label>Historia Clínica</label>
					<input class='form-control' value ='".$fila['historiaclinica']." ' disabled>
					</div>
					";

				}
		
			}else{
				//$salida.= "ERROR AL MOSTRAR";
			}
		}
		
				
		
		echo $salida;
		?>


