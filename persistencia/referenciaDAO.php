<?php
include ('../entidades/centro_referencia.php');


  $codigos=$_GET['renaes'];
  $nombres=$_GET['eess'];
  $provincias=$_GET['distritito'];
  $centro_referencia= new Referencia($codigos,$nombres,$provincias);
  if ($centro_referencia->buscarRepetido($codigos)==1) {
    echo "<script language='javascript'> alert('El Centro de Referencia Ya esta Registrado')</script>";
    echo "<script language='javascript'>window.location='../interfaz/establecimientos.php'</script>;";
  }else {
    $centro_referencia->insertar();
    echo $codigos;
    //header("Location: ../interfaz/establecimientos.php");
  }



 ?>
