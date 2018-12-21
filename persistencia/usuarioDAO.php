<?php
include ('../entidades/usuario.php');



    $nombre=$_POST['nombre'];
    $email=$_POST['email'];
    $tipo=$_POST['tipo'];
    $user=$_POST['usuario'];
    $password=sha1($_POST['password']);

    $usuario= new Usuario($nombre,$email,$tipo,$user,$password);
    if ($usuario->buscarRepetido($user)==1) {
        echo "<script language='javascript'> alert('El Usuario Ya existe  Intente Con Otro')</script>";
        echo "<script language='javascript'>window.location='../interfaz/registrar_usuarios.php'</script>;";
    } else {
        $usuario->insertar();
        header("Location: ../interfaz/registrar_usuarios.php");
    }


?>
