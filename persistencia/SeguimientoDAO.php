<script src="../js/idiomas.js"></script>
<?php

		include ("../entidades/conexion.php");
		include ("../entidades/controlespapivaa.php");
		$cn = new Conexion();
		$controles = ControlesPapivaa::vacio();


		$salida = "";
		$query = $controles->mostrar();


		//Traer contador de controles
		
		$queryContador = $controles ->mostrarCantidad(); 
		$resultadoContador = $cn->query($queryContador);
		if($fila = mysqli_fetch_array($resultadoContador)){
			$cantidadTotal = $fila['contador'];
			$cantidadDetalle = $cantidadTotal;
		}
		//Fin


		if(isset($_GET['consulta'])){
			//or nombre LIKE '%".$q."%'"
			$q = $cn->real_escape_string($_GET['consulta']);
			$query = $controles->buscarDni($q);
		}
		$resultado = $cn->query($query);

		if($resultado->num_rows > 0){
				$salida.='<table id="myTable" class="display nowrap">
				<thead>
					<tr>
						<th>ID</th>
						<th>Nombres y Apellidos</th>
						<th>Tipo de Examen</th>
						<th>Resultados</th>
						<th>Edad</th>
						<th>Fecha de Nacimiento</th>
						<th>Dni</th>
						<th>Teléfono</th>
						<th>Teléfono 2</th>
						<th>Fecha de Toma</th>
						<th>E.S al que se refiere</th>
						<th>Responsable</th>
						<th>Referencia</th>
						<th>Motivo de referencia</th>
						<th>Fecha de Referencia </th>
						<th>Procedimiento </th>
						<th>Resultado Procedimiento</th>
						<th>Tratamiento </th>';
						$c = 1;
					if(isset($cantidadTotal)){
						while($cantidadTotal > 0){
							$salida.='<th>Control '.$c.'</th>';
							$cantidadTotal--;
							$c++;
						}
					}
					
				$salida.='<th>Realizar un nuevo control</th>	</tr>
					</thead>
				<tbody>';

				$descripcion;
				while($filas = mysqli_fetch_array($resultado)){
					$salida.='<tr>
						<td> '.$filas['codigoseguimientopapivaa'].' </td>
						<td> '.$filas['nombres_apellidos'].' </td>
						<td> '.$filas['tipoexamen'].' </td>
						<td> '.$filas['resultados'].' </td>
						<td> '.$filas['edad'].' </td>
						<td> '.$filas['fecha_nacimiento'].' </td>
						<td> '.$filas['dni'].' </td>
						<td> '.$filas['telefono'].' </td>
						<td> '.$filas['telefono2'].' </td>
						<td> '.$filas['fechaexamen'].' </td>
						<td> '.$filas['establecimientoreferencia'].' </td>
						<td> '.$filas['responsable'].' </td>';

					$salida.='
						<td> '.$filas['referirvph'].' </td>
						<td> '.$filas['motivoreferencia'].' </td>
						<td> '.$filas['fechareferencia'].' </td>
						<td> '.$filas['procedimiento'].' </td>
						<td> '.$filas['resultadoprocedimiento'].' </td>
						<td> '.$filas['tratamiento'].' </td>';
						
						
						//Buscar Detalle
						$codigoseguir = $filas['codigoseguimientopapivaa'];
						$queryDetalle = $controles ->buscarDetalle($codigoseguir); 
						$resultadoDetalle = $cn->query($queryDetalle);

						//Resultado de la consulta
						$cantidadFilas =  $resultadoDetalle->num_rows;
						if(isset($cantidadDetalle)){
							$detalle = $cantidadDetalle-$cantidadFilas;
						}
						


						if($resultadoDetalle->num_rows > 0){
							while($fila = mysqli_fetch_array($resultadoDetalle)){
								$cantidadFilas--;
								$salida.='<td> '.$fila['descripcion'].'  </td>';
								if($cantidadFilas == 0){
									while($detalle >0){
										$salida.='<td>   </td>';
										$detalle--;
									}
								}
							}
						}else{
							if(isset($cantidadDetalle)){
								$local = $cantidadDetalle;
								while($local > 0){
									$salida.='<td></td>';
									$local--;
								}
							}
						}
					
						$salida.='<td><a href="detalle_pap_ivaa.php?id='.$filas['codigoseguimientopapivaa'].'">Realizar un  nuevo control</a></td>';
	
					$salida.='</tr>';
                }
				$salida.='
				</tbody>
			</table>';

			}else{
				$salida.= '<p> No se encontraron resultados!!</p>';
			}
	echo $salida;
?>

