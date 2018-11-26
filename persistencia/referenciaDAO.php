<?php
include ('../entidades/centro_referencia.php');

if (isset($_GET['enviar'])) {
  $codigos=$_GET['renaes'];
  $nombres=$_GET['eess'];
  $provincias=$_GET['distritito'];
  $centro_referencia= new Referencia($codigos,$nombres,$provincias);
  if ($centro_referencia->buscarRepetido($codigos)==1) {
    echo "<script language='javascript'> alert('El Centro de Referencia Ya esta Registrado')</script>";
    echo "<script language='javascript'>window.location='../interfaz/establecimientos.php'</script>;";
  }else {
    $centro_referencia->insertar();
    header("Location: ../interfaz/establecimientos.php");
  }

}else {
  echo "no se puede acceder debido a que no se enviaron datos por el formulario :: GET VACIO";
}

 ?>
