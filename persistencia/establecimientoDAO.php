<?php
include ('../entidades/establecimiento.php');

if (isset($_POST['submit'])) {

    $nombre=$_POST['nombre'];
    $micro_Red=$_POST['micro_Red'];

    $establecimiento= new Establecimiento($nombre,$micro_Red);
    if ($establecimiento->buscarRepetido($nombre)==1) {
        echo "<script language='javascript'> alert('El Usuario Ya existe  Intente Con Otro')</script>";
        echo "<script language='javascript'>window.location='../interfaz/establecimientos.php'</script>;";
    }else{
        $establecimiento->insertar();
        header("Location: ../interfaz/establecimientos.php");
    }

}else{
    echo "no se puede acceder debido a que no se enviaron datos por el formulario :: POST VACIO";
}
?>