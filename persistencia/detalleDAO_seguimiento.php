<?php
        include ("../entidades/control_seguimiento.php");
        include ("../entidades/seguimiento.php");

      $seguimiento = ControlSeguimiento::constructorvacio();
      $codigoSecurity = $_GET['oculto'];
        $fecha_control = $_GET['fecha_control'];
        $descripcion = $_GET['descripcion'];

        $detalle= new ControlSeguimiento($fecha_control, $descripcion, $codigoSecurity);
        $detalle->insertar();

        header("Location: ../interfaz/detalle_ecm_control.php?id=$codigoSecurity");

?>
