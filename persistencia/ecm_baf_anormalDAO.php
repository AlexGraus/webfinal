<?php
  include ('../entidades/paciente.php');
  include ('../entidades/ecm.php');
  include ('../entidades/baf.php');
  include ('../entidades/control_seguimiento.php');
  include ('../entidades/seguimiento.php');

  if (isset($_POST['submit'])) {
    #datos del paciente
    $dni=$_POST['dni'];
    $nombres_apellidos=$_POST['nombres_apellidos'];
    $fecha_nacimiento=$_POST['fecha_nacimiento'];
    $edad=$_POST['edad'];
    $direccion=$_POST['direccion'];
    $telefono=$_POST['telefono'];
    $grupo_familiar=$_POST['grupo_familiar'];

    $paciente=new Paciente($dni,$nombres_apellidos,$fecha_nacimiento,$edad,$direccion,$telefono,$grupo_familiar);
    $resp = $paciente->insertar();
    $resp = json_decode($resp);
    /*  echo "hellooo ". $resp->message . " insertID ". $resp->insertID  ;
    return;
    echo "holaaaaaa";
    */
    #datos del examen ecm
      $fecha=$_POST['fecha'];
      $diagnostico=$_POST['diagnostico'];
      $plan_clinico=$_POST['plan_clinico'];
      $observacion=$_POST['observacion'];
      $fecha_HDTE=$_POST['fecha_HTDE'];
      $hacer_BAAF=$_POST['Si'];

      $ecm= new Ecm($fecha,$diagnostico,$plan_clinico,$observacion,$fecha_HDTE,$hacer_BAAF);
      $resp_ecm=$ecm->insertar();
      $resp_ecm=json_decode($resp_ecm);

    #datos del Seguimiento

        $annio=$_POST['annio'];
        $centro_origen=$_POST['centro_origen'];
        $centro_destino=$_POST['centro_destino'];
        $fecha_visita=$_POST['fecha_visita'];
        $paciente_id=$resp->insertID;
        $ecm_id=$resp_ecm->insertID;
        $hcl=$_POST['hcl'];

        $seguimiento= new Seguimiento($annio,$centro_origen,$centro_destino,$fecha_visita,$paciente_id,$ecm_id,$hcl);
        $resp_segui=$seguimiento->insertar();
        $resp_segui=json_decode($resp_segui);

        //LLenar datos de control_seguimiento
        $decripcion_control=$_POST['decripcion_control'];
        $id_seguimiento=$resp_segui->insertID;
        if ($_POST['decripcion_control']!="") {
          $control= new ControlSeguimiento($decripcion_control,$id_seguimiento);
          $control->insertar();
          header("Location: ../interfaz/ecm_baaf.php");
        }

        if ($hacer_BAAF!="SI") {
            header("Location: ../interfaz/ecm_baaf.php");
        } else {
          #DATOS BAF
          $informe=$_POST['informe'];
          $fecha_examen=$_POST['fecha_examen'];
          $fecha_entrega=$_POST['fecha_entrega'];
          $resultado=$_POST['resultado'];
          $descripcion=$_POST['descripcion'];
          $medico_realiza=$_POST['medico_realiza'];
          $medico_supervisa=$_POST['medico_supervisa'];
          $patalogo=$_POST['patologo'];
          $seguimiento_id=$resp_segui->insertID;

          $baf= new Baf($informe, $fecha_examen, $fecha_entrega, $resultado, $descripcion, $medico_realiza, $medico_supervisa, $patalogo, $seguimiento_id);
          $baf->insertar();
          header("Location: ../interfaz/ecm_baaf.php");
        }


  }else {
    echo "no vale tmr";
  }
?>
