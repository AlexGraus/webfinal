<?php
      include ('../entidades/ecografia.php');      
      include ('../entidades/mamografiabilateral.php');
      include ('../entidades/controles_mamografia.php');

      //Paciente

      $codigopaciente=$_GET['dnipaciente'];

    //ECOGRAFÍA
        $fechaecografia = $_GET['fechaecografia'];
        $result= $_GET['examenecografia'];	
        $ecogra = new Ecografia($fechaecografia,$result);
        $uri = $ecogra->insertarEcografia();
    //MAMOGRAFÍA

        $nombreexamen =$_GET['examen'];	
        $fechaexamen = $_GET['fechaexamen'];	
        $centroprocedencia = $_GET['centroprocedencia'];
        $diagnostico = $_GET['resultados'];
        $codigoecografia = $ecogra->obtenerUltimo($uri);



        $mamogra = new Mamografia($nombreexamen,$fechaexamen,$centroprocedencia,$diagnostico,$codigoecografia,$codigopaciente);
        
        $link = $mamogra->insertarMamografia();

    //Controles/*
    
         $codigoseguiminetomamografia = $mamogra->obtenerUltimoMamografia($link);

         $ControlesMamogra = new ControlesMamografia($nombreexamen,$codigoseguiminetomamografia);
         $ControlesMamogra->insertarControl();



    header("Location: ../interfaz/mamografia.php");
  
?>