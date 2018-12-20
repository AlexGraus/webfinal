<script src="../js/idiomas_ecm_baf.js"></script>
  <?php
  include ("../entidades/conexion.php");
  include ("../entidades/examenECM.php");
  $cn= new Conexion();

  $controles= ExamenECM::constructorvacio(); 

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

          $salida.='<th>Realizar un nuevo Seguimiento</th>	</tr>
            </thead>
          <tbody>';

          $descripcion;
          while ($filas = mysqli_fetch_array($resultado)) {
          if ($filas['diagnostico']=='ANORMAL NO TUMORAL') {
            $bgcolor='23FF00';
            }else if ($filas['diagnostico']=='ANORMAL TUMORAL') {
            $bgcolor='FFD200';
          }else if ($filas['diagnostico']=='SOSPECHA DE CANCER') {
            $bgcolor='FF9B00';
          }
          else {
            $bgcolor='FF9B00';
          }
            $salida.='<tr>
              <td> '.$filas['id'].' </td>
              <td > '.$filas['dni'].' </td>
              <td> '.$filas['nombres_apellidos'].' </td>
              <td> '.$filas['historiaclinica'].' </td>
              <td> '.$filas['fecha_examen'].' </td>
              <td bgcolor="#'.$bgcolor.'"> '.$filas['diagnostico'].' </td>
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
          $salida.='<td><a href="detalle_ecm_control.php?id='.$filas['id'].'">Realizar un  nuevo Seguimiento</a></td>';
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

