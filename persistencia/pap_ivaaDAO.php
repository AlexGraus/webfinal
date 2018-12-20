<?php
      include ('../entidades/papivaa.php');

      //Paciente

      $codigopaciente=$_GET['dnipaciente'];

    //PAP E IVAA
        $fechaexamen = $_GET['fechaexamen'];
        $establecimientoreferencia =$_GET['centroreferencia'];
        $establecimientoatencion = $_GET['centroatencion'];
        $referenciar = $_GET['realizar'];
        $resultados = $_GET['resultados'];
        $tipoexamen = $_GET['examenes'];
        $motivoreferencia = $_GET['motivoreferencia'];
        $personal = $_GET['personal'];

        $papeivaa = new Papivaa($fechaexamen,$establecimientoreferencia,$establecimientoatencion,
        $personal,$resultados,$tipoexamen, $motivoreferencia,$referenciar,$codigopaciente);

        $link = $papeivaa->insertarExamen();


       header("Location: ../interfaz/pap_ivaa.php");



?>
