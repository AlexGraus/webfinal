
<?php
	include ('../entidades/paciente.php');
	$idtable=$_GET['tabla_id'];
	$dni=$_GET['dni'];
	$nombres_apellidos=$_GET['nombrespaciente'];
	$fecha_nacimiento=$_GET['fechapaciente'];
	$cumpleanos = new DateTime($fecha_nacimiento);
	$hoy = new DateTime();
	$anios = $hoy->diff($cumpleanos);
	$edad= $anios->y;
	$direccion=$_GET['direccionpaciente'];
	$telefono=$_GET['telefonopaciente'];
	$telefono2=$_GET['telefonopaciente2'];
	$grupo_familiar=$_GET['grupofamiliar'];
	$historia = $_GET['historiaclinica'];
	$sis = $_GET['sispaciente'];
	$long=strlen($dni);

	if ($long==8) {
	//Calcular EDAD
	$paciente=new Paciente($dni,$nombres_apellidos,$fecha_nacimiento,$edad,$direccion,$telefono,$telefono2,$grupo_familiar,$historia,$sis);
	if ($paciente->buscarRepetido($dni)==1 ) {
			if ($idtable=='ECM') {
				echo "<script language='javascript'> alert('El Paciente Ya existe')</script>";
				echo "<script language='javascript'>window.location='../interfaz/examen_ecm.php'</script>;";
			}elseif ($idtable=='MAMA') {
				echo "<script language='javascript'> alert('El Paciente Ya existe')</script>";
				echo "<script language='javascript'>window.location='../interfaz/mamografia.php'</script>;";
			}elseif ($idtable=='VPH') {
				echo "<script language='javascript'> alert('El Paciente Ya existe')</script>";
				echo "<script language='javascript'>window.location='../interfaz/pap_ivaa.php'</script>;";
			}else {
				echo "<script language='javascript'> alert('El Paciente Ya existe')</script>";
				echo "<script language='javascript'>window.location='../interfaz/registrar_pacientes.php'</script>;";
			}
	}else {
		$resp = $paciente->insertar();
		if ($idtable=='ECM') {
			echo "<script language='javascript'>window.location='../interfaz/examen_ecm.php'</script>;";
		}else if ($idtable=='MAMA') {
			echo "<script language='javascript'>window.location='../interfaz/mamografia.php'</script>;";
		}elseif ($idtable=='VPH') {
			echo "<script language='javascript'>window.location='../interfaz/pap_ivaa.php'</script>;";
		}else {
			echo "<script language='javascript'>window.location='../interfaz/registrar_pacientes.php'</script>;";
		}

	}
}else {
	if ($idtable=='ECM') {
		echo "<script language='javascript'> alert('El DNI debe ser igual a 8; intentelo nuevamente')</script>";
		echo "<script language='javascript'>window.location='../interfaz/examen_ecm.php'</script>;";
	}else if ($idtable=='MAMA') {
		echo "<script language='javascript'> alert('El DNI debe ser igual a 8; intentelo nuevamente')</script>";
		echo "<script language='javascript'>window.location='../interfaz/mamografia.php'</script>;";
	}else if ($idtable=='VPH') {
		echo "<script language='javascript'> alert('El DNI debe ser igual a 8; intentelo nuevamente')</script>";
		echo "<script language='javascript'>window.location='../interfaz/pap_ivaa.php'</script>;";
	}else {
		echo "<script language='javascript'> alert('El DNI debe ser igual a 8; intentelo nuevamente')</script>";
		echo "<script language='javascript'>window.location='../interfaz/registrar_pacientes.php'</script>;";
	}
}



?>
