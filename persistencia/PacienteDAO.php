<?php 
	include ('../entidades/paciente.php');
	
	$dni=$_GET['dnipaciente'];
	$nombres_apellidos=$_GET['nombrespaciente'];
	$fecha_nacimiento=$_GET['fechapaciente'];

	//Calcular EDAD
	$cumpleanos = new DateTime($fecha_nacimiento);
    $hoy = new DateTime();
    $anios = $hoy->diff($cumpleanos);
	$edad= $anios->y;


	$direccion=$_GET['direccionpaciente'];
	$telefono=$_GET['telefonopaciente'];
	$grupo_familiar=$_GET['grupofamiliar'];
	$historia = $_GET['historiaclinica'];
	$sis = $_GET['sispaciente'];
	$paciente=new Paciente($dni,$nombres_apellidos,$fecha_nacimiento,$edad,$direccion,$telefono,$grupo_familiar,$historia,$sis,"");
	$resp = $paciente->insertar();

	header ("Location: ../interfaz/registrar_pacientes.php");

?>