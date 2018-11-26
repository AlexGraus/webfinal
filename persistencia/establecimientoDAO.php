<?php
include ('../entidades/establecimiento.php');

if (isset($_POST['submit'])) {
    $codigo=$_POST['codigo'];
    $nombre=$_POST['nombre'];
    $provincia=$_POST['provincia'];
    $distrito=$_POST['distrito'];

    $establecimiento= new Establecimiento($codigo,$nombre,$provincia,$distrito);
    if ($establecimiento->buscarRepetido($codigo)==1) {

        echo "<script language='javascript'> alert('El Centro de Salud Ya esta Registrado')</script>";
        echo "<script language='javascript'>window.location='../interfaz/establecimientos.php'</script>;";
    }else{
        $establecimiento->insertar();
        header("Location: ../interfaz/establecimientos.php");
    }

}else{
    echo "no se puede acceder debido a que no se enviaron datos por el formulario :: POST VACIO";
}
?>
