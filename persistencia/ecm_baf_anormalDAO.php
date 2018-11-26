<?php
  include ('../entidades/ecm.php');
  include ('../entidades/baf.php');
  include ('../entidades/control_seguimiento.php');
  include ('../entidades/seguimiento.php');


    #datos del examen ecm
      $fecha=$_GET['fecha'];
      $diagnostico=$_GET['diagnostico'];
      $plan_clinico=$_GET['plan_clinico'];
      $observacion=$_GET['observacion'];
      $fecha_HDTE=$_GET['fecha_HTDE'];
      $hacer_BAAF=$_GET['radio'];

      $ecm= new Ecm($fecha,$diagnostico,$plan_clinico,$observacion,$fecha_HDTE,$hacer_BAAF);
      $resp_ecm=$ecm->insertar();
      $resp_ecm=json_decode($resp_ecm);

    #datos del Seguimiento
        $annio=$_GET['annio'];
        $centro_origen=$_GET['centro_origen'];
        $centro_referencia=$_GET['centro_destino'];
        $fecha_visita=$_GET['fecha_visita'];
        $ecm_id=$resp_ecm->insertID;
        $dni_paciente=$_GET['dnipaciente'];;

        $seguimiento= new Seguimiento($annio,$centro_origen,$centro_referencia,$fecha_visita,$ecm_id,$dni_paciente);
        $resp_segui=$seguimiento->insertar();
        $resp_segui=json_decode($resp_segui);

        //LLenar datos de control_seguimiento
  /*      $decripcion_control=$_GET['decripcion_control'];
        $id_seguimiento=$resp_segui->insertID;
        if ($_GET['decripcion_control']!="") {
          $control= new ControlSeguimiento($decripcion_control,$id_seguimiento);
          $control->insertar();
          header("Location: ../interfaz/ecm_baaf.php");
        }
*/
        if ($hacer_BAAF!="SI") {
            header("Location: ../interfaz/ecm_baaf.php");
        } else {
          #DATOS BAF
          $informe=$_GET['informe'];
          $fecha_examen=$_GET['fecha_examen'];
          $fecha_entrega=$_GET['fecha_entrega'];
          $resultado=$_GET['resultado'];
          $descripcion=$_GET['descripcion'];
          $medico_realiza=$_GET['medico_realiza'];
          $medico_supervisa=$_GET['medico_supervisa'];
          $patalogo=$_GET['patologo'];
          $seguimiento_id=$resp_segui->insertID;

          $baf= new Baf($informe, $fecha_examen, $fecha_entrega, $resultado, $descripcion, $medico_realiza, $medico_supervisa, $patalogo, $seguimiento_id);
          $baf->insertar();
          header("Location: ../interfaz/ecm_baaf.php");
        }



?>
