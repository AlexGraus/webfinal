<?php
        include ("../entidades/conexion.php");

        $cn = new Conexion();
		$salida = "";
	
		    if(isset($_GET['consulta']) && isset($_GET['consulta2'])){
				//or nombre LIKE '%".$q."%'"
				$q = $cn->real_escape_string($_GET['consulta']);
				$q2 = $cn->real_escape_string($_GET['consulta2']);

				//PRIMER GRÁFICO
				$sql = "SELECT diagnostico, COUNT(diagnostico) as resultados FROM seguimiento_mamografia   
				WHERE  fechaexamen BETWEEN '".$q."%' AND '".$q2."%'  group by diagnostico";
				$resultadosMamografia = $cn->query($sql);
			
				//SEGUNDO GRÁFICO
				$ecm = "SELECT diagnostico as diag, COUNT(diagnostico) as result from examen_ecm
						WHERE fecha_examen BETWEEN '".$q."%' AND '".$q2."%' GROUP BY diagnostico";
				$resultadosEcm = $cn->query($ecm);

				$ivaa = "SELECT resultados as diagIvaa,COUNT(resultados) as resuli FROM seguimiento_pap_ivaa
						WHERE tipoexamen = 'IVAA' and fechaexamen BETWEEN '".$q."%' AND '".$q2."%'	GROUP BY resultados";
				$resultadosivaa = $cn->query($ivaa);

				

				$vph = "SELECT resultados as diagVph,COUNT(resultados) as resulV FROM seguimiento_pap_ivaa
				WHERE tipoexamen = 'VPH' and fechaexamen BETWEEN '".$q."%' AND '".$q2."%'	GROUP BY resultados";
				$resultadosvph = $cn->query($vph);


				$datosMamografia = array();
				
				foreach($resultadosMamografia as $row){
							$datosMamografia[] = $row;
				}

				foreach($resultadosEcm as $fila){
							$datosMamografia[]=$fila;
				}
				foreach($resultadosivaa as $fila){
					$datosMamografia[]=$fila;
				}
				foreach($resultadosvph as $fila){
					$datosMamografia[]=$fila;
				}

				print json_encode($datosMamografia);

			
	
			}else{
				#code
			}
				
	
			
?>

