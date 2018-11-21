<?php
        include ("../entidades/detallecontrol_pap_ivaa.php");
        include ("../entidades/papivaa.php");


      $seguimiento = Papivaa::vacio();
      $codigoSecurity = $_GET['oculto'];
       $data = $seguimiento->buscarcodigo($codigoSecurity); 

       if ($filas = mysqli_fetch_array($data)) {
            $codigopaciente = $filas['codigopaciente'] ;
           $codigocontrol = $filas['idcontro_pap_iva'];
        }
        $fecha = $_GET['fecha'];
        $descripcion = $_GET['descripcion'];

        $detalle= new DetalleControlPapivaa($codigopaciente,$codigocontrol,$fecha,$descripcion);
        $detalle->insertarExamen();

        header("Location: ../interfaz/detalle_pap_ivaa.php?id=$codigoSecurity");

?>
