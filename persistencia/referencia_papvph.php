<?php

    include ('../entidades/referencia_vph.php');      
    include ('../entidades/controlespapivaa.php');



    $fechareferencia = $_GET['fechareferencia'];
    $procedimiento = $_GET['procedimiento'];
    $resultado = $_GET['resultadopro'];
    $tratamiento = $_GET['tratamiento'];
    $codigoexamen = $_GET['codigo'];



    $referenciaPap = new ReferenciaVph($fechareferencia,$procedimiento,$resultado,$tratamiento,$codigoexamen);
    $link = $referenciaPap->insertarReferencia();

    $codigoRefrencia = $referenciaPap->obtenerUltimoPap($link);

    $control = new ControlesPapivaa($procedimiento,$codigoRefrencia);
     $control->insertarControl();

    header("Location: ../interfaz/referencia_papiva.php");



?>