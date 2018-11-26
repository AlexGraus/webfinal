<script src="../js/idiomas_ecm_baf.js"></script>
  <?php
  include ("../entidades/conexion.php");
  include ("../entidades/seguimiento.php");
  $cn= new Conexion();
  $controles= Seguimiento::constructorvacio();

  $salida="";
  $query = $controles->mostrarSeguimientos();

  $queryContador=$controles->contadorSeguimiento();
  $resultadoContador=$cn->query($queryContador);
  if($fila = mysqli_fetch_array($resultadoContador)){
    $cantidadTotal = $fila['contador'];
    $cantidadDetalle = $cantidadTotal;
  }

  if(isset($_GET['consulta'])){
    //or nombre LIKE '%".$q."%'"
    $q = $cn->real_escape_string($_GET['consulta']);
    $query = $controles->buscarsegimientoPaciente($q);
  }
  $resultado = $cn->query($query);


		if($resultado->num_rows > 0){
      $salida.='<table id="tabla_ecm" class="display nowrap">
      <thead>
        <tr>

          <th>ID</th>
          <th>Fecha de Examen</th>
          <th>Nombres Apellidos</th>
          <th>DNI</th>
          <th>Fecha de ECM Anormal</th>
          <th>N° HCL</th>
          <th>Procedencia</th>
          <th>Edad</th>
          <th>Fecha de Nacimiento</th>
          <th>Diagnóstico</th>
          <th>Plan Clinico</th>
          <th>Observacion</th>
          <th>HDTE</th>
          <th>BAF</th>
          <th>Informe</th>
          <th>Fecha de Examen</th>
          <th>Resultado</th>
          <th>Descripcion</th>
          <th>Realizado por: </th>
          <th>Supervisado por: </th>
          <th>Patologo</th>
          <th>Fecha de Entrega</th>';
          $c=1;
          if (isset($cantidadTotal)) {
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
          while ($filas = mysqli_fetch_array($resultado)) {
            $salida.='<tr>
              <td> '.$filas['id'].' </td>
              <td> '.$filas['fecha_visita'].' </td>
              <td> '.$filas['nombres_apellidos'].' </td>
              <td> '.$filas['dni'].' </td>
              <td> '.$filas['fecha'].' </td>
              <td> '.$filas['historiaclinica'].' </td>
              <td> '.$filas['centro_origen'].' </td>
              <td> '.$filas['edad'].' </td>
              <td> '.$filas['fecha_nacimiento'].' </td>
              <td> '.$filas['diagnostico'].' </td>
                          <td> '.$filas['plan_clinico'].' </td>
                          <td> '.$filas['observacion'].' </td>
                          <td> '.$filas['fecha_HDTE'].' </td>
                          <td> '.$filas['hacer_BAAF'].' </td>
                          <td> '.$filas['informe'].' </td>
                          <td> '.$filas['fecha_examen'].' </td>
                          <td> '.$filas['resultado'].' </td>
                          <td> '.$filas['descripcion'].' </td>
                          <td> '.$filas['medico_realiza'].' </td>
                          <td> '.$filas['medico_supervisa'].' </td>
                          <td> '.$filas['patologo'].' </td>
                          <td> '.$filas['fecha_entrega'].' </td>
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
          $salida.='<td><a href="detalle_ecm_control.php?id='.$filas['id'].'">Realizar un  nuevo control</a></td>';
          $salida.='</tr>';
          }

          $salida.='
          </tbody>
        </table>';

    }else {
      $salida.= '<p> No se encontraron resultados!!</p>';
    }
    	echo $salida;
  ?>
</script>
