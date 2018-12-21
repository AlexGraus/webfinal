<?php
    include ("conexion.php");

    $cn = new Conexion();

    $sql = "SELECT diagnostico, COUNT(diagnostico) as resultados FROM seguimiento_mamografia group by diagnostico";
    $resultadosMamografia = $cn->query($sql);


    $ecm = "SELECT diagnostico as diag, COUNT(diagnostico) as result from examen_ecm GROUP BY diagnostico";
    $resultadosEcm = $cn->query($ecm);

    $datosMamografia = array();

    foreach($resultadosMamografia as $row){
        $datosMamografia[] = $row;
    }

    foreach($resultadosEcm as $fila){
        $datosMamografia[]=$fila;
    }
    print json_encode($datosMamografia);



?>
