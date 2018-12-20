<script src="../js/reportesfechas.js"></script>
<?php

		include ("../entidades/conexion.php");
		include ("../entidades/controlespapivaa.php");
		include ("../entidades/controles_mamografia.php");
		include ("../entidades/examenECM.php");

		$cn = new Conexion();
		$salida = "";
		if(isset($_GET['consulta3']) && $_GET['consulta3']=='PAP'){
			$controles = ControlesPapivaa::vacio();

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
						
					$salida.='	</tr>
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
						<th>Diagnóstico</th>
						<th>HC/BOL</th>
						<th>DNI</th>
						<th>Procedencia</th>
						<th>Edad</th>
						<th>Fecha de Nacimiento</th>
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
						<td> '.$filas['diagnostico'].' </td>
						<td> '.$filas['historiaclinica'].' </td>
						<td> '.$filas['dni'].' </td>
						<td> '.$filas['centroprocedencia'].' </td>
						<td> '.$filas['edad'].' </td>
						<td> '.$filas['fecha_nacimiento'].' </td>
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
		}else if (isset($_GET['consulta3']) && $_GET['consulta3']=='ECM') {

			$controles=ExamenECM::constructorvacio();
			$salida="";
			$query=$controles->mostrarSeguimientos();
			$queryContador=$controles->contadorSeguimiento();
			$resultadoContador=$cn->query($queryContador);
			if ($fila = mysqli_fetch_array($resultadoContador)) {
				$cantidadTotal=$fila['contador'];
				$cantidadDetalle=$cantidadTotal;
			}
			if (isset($_GET['consulta']) && isset($_GET['consulta2'])) {
				$q = $cn->real_escape_string($_GET['consulta']);
				$q2 = $cn->real_escape_string($_GET['consulta2']);
				$query=$controles->mostrarSeguimientosFechas($q,$q2);
			}
			$resultado=$cn->query($query);
			if($resultado->num_rows > 0){
	      $salida.='<table id="tablita" class="display nowrap">
				<thead>
	        <tr>
	          <th>ID</th>
	          <th >DNI</th>
	          <th>Nombres Apellidos</th>
	          <th>N° HCL</th>
	          <th>Fecha de ECM</th>
	          <th >Diaganostico</th>
	          <th>Fecha de Nacimiento</th>
	          <th>Edad</th>
	          <th>Centro Origen</th>
	          <th>Descripcion de Diagnositco</th>
	          <th>Referencia</th>
	          <th>Centro de Referencia</th>
	          <th>Fecha de Atencion Referencia</th>
	          <th>Se Hizo BAF:</th>
	          <th>Fecha BAF:</th>
	          <th>Especialista: </th>
	          <th >Descripcion de la muestra: </th>
	          <th>N° Registro</th>
	          <th>Fecha Resultado</th>
	          <th>Patologo</th>
	          <th>Resultado</th>
	          <th>Descripcion Resultados</th>
	          <th>Obstetra</th>';
	          $c=1;
	          if (isset($cantidadTotal)) {
	            while($cantidadTotal > 0){
	              $salida.='<th>Fecha Seguimiento: '.$c.'</th>
	              <th>Descripcion Seguimiento: '.$c.'</th>';
	              $cantidadTotal--;
	              $c++;
	            }
	          }

	          $salida.='</tr>
	            </thead>
	          <tbody>';

						$descripcion;
	          while ($filas = mysqli_fetch_array($resultado)) {
	            if ($filas['diagnostico']=='ANORMAL NO TUMORAL') {
	            $bgcolor='23FF00';
	            }else if ($filas['diagnostico']=='ANORMAL TUMORAL') {
	            $bgcolor='FF0000';
	          }else if ($filas['diagnostico']=='SOSPECHA DE CANCER') {
	            $bgcolor='FFC100';
	          }
	          else {
	            $bgcolor='000000';
	          }
	            $salida.='<tr>
	              <td> '.$filas['id'].' </td>
	              <td > '.$filas['dni'].' </td>
	              <td> '.$filas['nombres_apellidos'].' </td>
	              <td> '.$filas['historiaclinica'].' </td>
	              <td> '.$filas['fecha_examen'].' </td>
	              <td bgcolor="#'.$bgcolor.'"> <font color="#" font-size:50px> '.$filas['diagnostico'].' </font> </td>
	              <td> '.$filas['fecha_nacimiento'].' </td>
	              <td > '.$filas['edad'].' </td>
	              <td> '.$filas['centro_origen'].' </td>
	                          <td> '.$filas['descripcion_diagnostico'].' </td>
	                          <td> '.$filas['referenciar'].' </td>
	                          <td> '.$filas['centro_referencia'].' </td>
	                          <td> '.$filas['fecha_atencion'].' </td>
	                          <td> '.$filas['hacer_baf'].' </td>
	                          <td> '.$filas['fecha_examen_ref'].' </td>
	                          <td> '.$filas['especialista'].' </td>
	                          <td> '.$filas['descripcion_muestra'].' </td>
	                          <td> '.$filas['numero_registro'].' </td>
	                          <td> '.$filas['fecha_resultado'].' </td>
	                          <td> '.$filas['patologo'].' </td>
	                          <td> '.$filas['resultado'].' </td>
	                          <td> '.$filas['descripcion_resultado'].' </td>
	                          <td> '.$filas['nombre'].' </td>
	                          ';
														$codigoseguir = $filas['id'];
									          $queryDetalle = $controles ->buscarSeguimiento($codigoseguir);
									          $resultadoDetalle = $cn->query($queryDetalle);

									            $cantidadFilas =  $resultadoDetalle->num_rows;
									            if(isset($cantidadDetalle)){
									              $detalle = $cantidadDetalle-$cantidadFilas;
									            }

									            if($resultadoDetalle->num_rows > 0){
									              while($fila = mysqli_fetch_array($resultadoDetalle)){
									                $cantidadFilas--;
									                $salida.=' <td> '.$fila['fecha_seg'].' </td>
									                <td> '.$fila['descripcion'].' </td>';
									                if($cantidadFilas == 0){
									                  while($detalle >0){
									                    $salida.='<td> </td>
									                    <td> </td>';
									                    $detalle--;
									                  }
									                }
									              }
									            }else{
									              if(isset($cantidadDetalle)){
									                $local = $cantidadDetalle;
									                while($local > 0){
									                  $salida.='<td> </td> ';
									                  $local--;
									                }
									              }
									            }
						$salida.='</tr>';
						}
						$salida.='
						</tbody>
					</table>';
					}else {
				$salida.= '<p> No se encontraron resultados!!</p>';
			}

		}


/*


*/



	echo $salida;
?>
