<?php
        include ("../entidades/control_seguimiento.php");
        include ("../entidades/seguimiento.php");

      $seguimiento = ControlSeguimiento::constructorvacio();
      $codigoSecurity = $_GET['oculto'];
        $fecha = $_GET['fecha_control'];
        $descripcion = $_GET['descripcion'];

        $detalle= new ControlSeguimiento($fecha,$descripcion,$codigoSecurity);
        $detalle->insertar();

        header("Location: ../interfaz/detalle_ecm_control.php?id=$codigoSecurity");

?>
