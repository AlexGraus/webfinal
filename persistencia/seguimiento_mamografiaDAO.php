<script src="../js/idiomas_mamografia.js"></script>
<?php

		include ("../entidades/conexion.php");
		include ("../entidades/controles_mamografia.php");
		$cn = new Conexion();
		$controles = ControlesMamografia::vacio();


		$salida = "";
		$query = $controles->mostrarPreview();


		//Traer contador de controles
		
		$queryContador = $controles ->mostrarCantidadMamografia(); 
		$resultadoContador = $cn->query($queryContador);
		if($fila = mysqli_fetch_array($resultadoContador)){
			$cantidadTotal = $fila['contador'];
			$cantidadDetalle = $cantidadTotal;
		}
		//Fin


		if(isset($_GET['consulta'])){
			//or nombre LIKE '%".$q."%'"
			$q = $cn->real_escape_string($_GET['consulta']);
			$query = $controles->buscarMamografiaDni($q);
		}
		$resultado = $cn->query($query);

		if($resultado->num_rows > 0){
				$salida.='<table id="newTable" class="display nowrap">
				<thead>
					<tr>
					
						<th>ID</th>
						<th>Fecha de Examen</th>
						<th>Nombres Apellidos</th>
						<th>Examen</th>
						<th>HC/BOL</th>
						<th>DNI</th>
						<th>Procedencia</th>
						<th>Edad</th>
						<th>Fecha de Nacimiento</th>
						<th>Diagnóstico</th>
						<th>Fecha de Ecografía</th>
						<th>Resultado de Ecografía</th>';
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
						<td> '.$filas['idmamografia'].' </td>
						<td> '.$filas['fechaexamen'].' </td>
						<td> '.$filas['nombres_apellidos'].' </td>
						<td> '.$filas['nombreexamen'].' </td>
						<td> '.$filas['historiaclinica'].' </td>
						<td> '.$filas['dni'].' </td>
						<td> '.$filas['centroprocedencia'].' </td>
						<td> '.$filas['edad'].' </td>
						<td> '.$filas['fecha_nacimiento'].' </td>
						<td> '.$filas['diagnostico'].' </td>
                        <td> '.$filas['fechaecografia'].' </td>
                        <td> '.$filas['resultado'].' </td>
                        ';
						//Buscar Detalle
						$codigoseguir = $filas['idmamografia'];
						$queryDetalle = $controles ->buscarCodigoSeguimiento($codigoseguir); 
						$resultadoDetalle = $cn->query($queryDetalle);

						//Resultado de la consulta
						$cantidadFilas =  $resultadoDetalle->num_rows;
						if(isset($cantidadDetalle)){
							$detalle = $cantidadDetalle-$cantidadFilas;
						}
						
						if($resultadoDetalle->num_rows > 0){
							while($fila = mysqli_fetch_array($resultadoDetalle)){
								$cantidadFilas--;
								$salida.='<td> '.$fila['descripcionbilateral'].'  </td>';
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
					
						$salida.='<td><a href="detalle_mamografia.php?id='.$filas['idmamografia'].'">Realizar un  nuevo control</a></td>';
	
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

