<?php 	
	include ('../entidades/usuario.php');
	//recuperando valores del formulario
		if (! isset($_SESSION['login'])) {
			session_start();
			$_SESSION['login'] = null;
			$usuario= $_POST["usuario"];
			$password=sha1($_POST["password"]);
			$p1= (string) $usuario;
			$p2= (string) $password;
			$usuario = Usuario::constructorvacio();
			$dato = $usuario->buscar($p1, $p2);

			 $fila = mysqli_fetch_assoc($dato);
			 if (! isset($fila)) {
			 	$_SESSION['login'] = 1;
			 }
			 if (! isset($_SESSION['login'])) {
			 	$_SESSION['login']=$fila['id'];
			 	//echo "CODIGO: ".$_SESSION['login'];
			 	echo "<script language='javascript'>window.location='../interfaz/index.php'</script>;";
			 }else{
			 	//echo "Pirata";
				 unset($_SESSION["login"]);
				 echo "<script language='javascript'> alert('No Tiene Acceso')</script>";
			 	echo "<script language='javascript'>window.location='../login.php'</script>;";
			 }
		}
		else
		echo "<script language='javascript'> alert('No Tiene Acceso')</script>"

 ?>