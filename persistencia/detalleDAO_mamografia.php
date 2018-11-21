<?php
        include ("../entidades/detalle_bilateral.php");
        include ("../entidades/mamografiabilateral.php");

      $seguimiento = Mamografia::vacio();
      $codigoSecurity = $_GET['oculto'];
       $data = $seguimiento->buscarCodigoMamografia($codigoSecurity); 

       if ($filas = mysqli_fetch_array($data)) {
            $codigopaciente = $filas['dnipaciente'] ;
           $codigocontrol = $filas['idcontrol_mamografia'];
        }
        $fecha = $_GET['fecha'];
        $descripcion = $_GET['descripcion'];

        $detalle= new DetalleBilateral($fecha,$descripcion,$codigopaciente,$codigocontrol);
        $detalle->insertarDetalleMamografia();

        header("Location: ../interfaz/detalle_mamografia.php?id=$codigoSecurity");

?>
