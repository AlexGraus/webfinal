<script src="../js/reportesfechas.js"></script>
<?php

		include ("../entidades/conexion.php");
		include ("../entidades/controlespapivaa.php");
		include ("../entidades/controles_mamografia.php");

		$cn = new Conexion();
		$salida = "";
		if(isset($_GET['consulta3']) && $_GET['consulta3']=='PAP'){
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
			if(isset($_GET['consulta']) && isset($_GET['consulta2'])){
				//or nombre LIKE '%".$q."%'"
				$q = $cn->real_escape_string($_GET['consulta']);
				$q2 = $cn->real_escape_string($_GET['consulta2']);
			
				$query = $controles->buscarPorFechas($q,$q2);

			}
			
			$resultado = $cn->query($query);
			
			if($resultado->num_rows > 0){
					$salida.='<table id="tablita" class="display nowrap">
					<thead>
						<tr>
							<th>ID</th>
							<th>Nombres y Apellidos</th>
							<th>Edad</th>
							<th>Fecha de Nacimiento</th>
							<th>Dni</th>
							<th>Tipo de Examen</th>
							<th>Resultados</th>
							<th>Fecha de Toma</th>
							<th>Fecha de Entrega</th>
							<th>Telefono</th>
							<th>Telefono 2</th>
							<th>E.S al que se refiere</th>
							<th>Responsable</th>
							<th>Referencia Efectiva</th>
							<th>Motivo de referencia</th>
							<th>Procedimiento DX</th>
							<th>Procedimiento TTO</th>';
							$c = 1;
						if(isset($cantidadTotal)){
							while($cantidadTotal > 0){
								$salida.='<th>Control '.$c.'</th>';
								$cantidadTotal--;
								$c++;
							}
						}
			
					$salida.='	</tr>
						</thead>
					<tbody>';
			
					$descripcion;
					while($filas = mysqli_fetch_array($resultado)){
			
						$salida.='<tr>
							<td> '.$filas['codigoseguimientopapivaa'].' </td>
							<td> '.$filas['nombres_apellidos'].' </td>
							<td> '.$filas['edad'].' </td>
							<td> '.$filas['fecha_nacimiento'].' </td>
							<td> '.$filas['dni'].' </td>
							<td> '.$filas['tipoexamen'].' </td>
							<td> '.$filas['resultados'].' </td>
							<td> '.$filas['fechaexamen'].' </td>
							<td> '.$filas['fechaentrega'].' </td>
							<td> '.$filas['telefono'].' </td>
							<td> '.$filas['telefono2'].' </td>
							<td> '.$filas['establecimientoreferencia'].' </td>
							<td> '.$filas['responsable'].' </td>';
							if(strcmp($filas['referenciaefectiva'],'1')==0){
							 $salida.='	<td> Si</td>';
							}else{
							$salida.='	<td> No</td>';
							}
			
						$salida.='<td> '.$filas['motivoreferencia'].' </td>
							<td> '.$filas['procedimientodx'].' </td>
							<td> '.$filas['procedimientotto'].' </td>';
			
			
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
			
			
			
						$salida.='</tr>';
					}
					$salida.='
					</tbody>
				</table>';
			
				}else{
					$salida.= '<p> No se encontraron resultados!!</p>';
				}	
		}else if(isset($_GET['consulta3']) && $_GET['consulta3']=='MMM'){
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
		if(isset($_GET['consulta']) && isset($_GET['consulta2'])){
			//or nombre LIKE '%".$q."%'"
			$q = $cn->real_escape_string($_GET['consulta']);
			$q2 = $cn->real_escape_string($_GET['consulta2']);
			$query = $controles->buscarPorFechasMamografia($q,$q2);
		
		}
		$resultado = $cn->query($query);

		if($resultado->num_rows > 0){
				$salida.='<table id="tablita" class="display nowrap">
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

				$salida.='	</tr>
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


					$salida.='</tr>';
                }
				$salida.='
				</tbody>
			</table>';

			}else{
				$salida.= '<p> No se encontraron resultados!!</p>';
			}
		}

/*
			

*/



	echo $salida;
?>
