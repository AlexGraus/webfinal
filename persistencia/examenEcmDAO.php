<?php
  include ('../entidades/examenECM.php');
  include ('../entidades/paciente.php');
  include ('../entidades/usuario.php');
    #datos del examen ecm
      $paciente_id=$_GET['dnipaciente'];
      $fecha_examen=$_GET['fecha'];
      $annio=date("Y", strtotime($fecha_examen));
      $centro_origen=$_GET['centro_origen'];
      $diagnostico=$_GET['diagnostico'];
      $descripcion_resultado=$_GET['descripcion_resultado'];
      $refrenciar=$_GET['hacer_baf']; 
      $centro_referencia=$_GET['centro_destino'];
      $obstetra=$_GET['obstetra'];
      $paciente= Paciente::constructorvacio();
      if ($paciente->buscarRepetido($paciente_id)==1) {
        $ecm= new ExamenECM($annio, $fecha_examen, $centro_origen, $diagnostico, $descripcion_resultado, $refrenciar, $centro_referencia, $paciente_id, $obstetra);
        $resp_ecm=$ecm->insertar();
        $resp_ecm=json_decode($resp_ecm);

      #datos del Seguimiento

            header("Location: ../interfaz/examen_ecm.php");

      }else {
        echo "<script language='javascript'> alert('El DNI es incorrecto')</script>";
        echo "<script language='javascript'>window.location='../interfaz/ecm_baaf.php'</script>;";
      }





?>
