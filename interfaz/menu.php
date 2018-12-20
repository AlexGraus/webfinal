
<?php
	include ('../entidades/usuario.php');
	session_start();
	if (!isset($_SESSION['login'])) {
		session_destroy();
		echo "<script language='javascript'>window.location='../login.php'</script>;";
	} else {
		$usuario = Usuario::constructorvacio();
        $dato = $usuario->mostrar($_SESSION['login']);
        $fila = mysqli_fetch_assoc($dato);
	}
	if ($fila['tipo']=="Cordinador") {
		include ('menu_admin.php');
	}
	else {
		include ('menu_digitador.php');
	}
?>
