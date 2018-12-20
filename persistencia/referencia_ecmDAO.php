<?php
include ('../entidades/examenECM.php');
include ('../entidades/paciente.php');
include ('../entidades/referencia_ecm.php');

$fecha_atencion=$_POST['fecha_atencion'];
$hacer_baf=$_POST['hacer_baf'];
$fecha_examen=$_POST['fecha_examen_baf'];
$especialista=$_POST['medico_especialista'];
$descripcion_muestra=$_POST['descrpcion_muestra'];
$numero_registro=$_POST['num_registro'];
$fecha_resultado=$_POST['fecha_resultado'];
$patalogo=$_POST['patologo'];
$resultado=$_POST['resultado'];
$descripcion_resultado=$_POST['resultado_descripcion'];
$examen_ecm_id=$_POST['id_examen'];

$referencia= new Referencia($fecha_atencion, $hacer_baf, $fecha_examen, $especialista, $descripcion_muestra, $numero_registro, $fecha_resultado, $patalogo,$resultado, $descripcion_resultado, $examen_ecm_id);
$resp = $referencia->insertar();
echo "<script language='javascript'>window.location='../interfaz/registrar_referencia.php'</script>;";
?>
