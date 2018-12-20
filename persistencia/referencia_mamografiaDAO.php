<?php
      include ('../entidades/ecografia.php');      
      include ('../entidades/referencia_mamografia.php');
      include ('../entidades/controles_mamografia.php');

      $fechareferencia = $_GET['fechareferencia'];
      //DATOS ECOGRAFÍA
      $fechaecografia = $_GET['fechaecografia'];
      $result= $_GET['examenecografia'];	
      $codigoexamen = $_GET['codigo'];


      if(isset($_GET['dnipaciente'])){
        
        //PacientE
            $codigopaciente=$_GET['dnipaciente'];
        //ECOGRAFÍA
            $ecogra = new Ecografia($fechaecografia,$result);
            $uri = $ecogra->insertarEcografia();
        //MAMOGRAFÍA
            $codigoecografia = $ecogra->obtenerUltimo($uri);
            $mamogra = new ReferenciaMamografia($fechareferencia,$codigoecografia,$codigoexamen);
            $link = $mamogra->insertar();


        //Controles/*

            $codigoseguiminetomamografia = $mamogra->obtenerUltimoMamografia($link);

           $ControlesMamogra = new ControlesMamografia($result,$codigoseguiminetomamografia);
            $ControlesMamogra->insertarControl();
           header("Location: ../interfaz/referencia_mamografia.php");
      }else{
         /* $codigoSecurity = $_GET['oculto'];
          $mamograf= new Mamografia($nombreexamen,$fechaexamen,$centroprocedencia,$diagnostico,"","");
          echo $codigoSecurity;
          $validarRegistro = $mamograf->editarMamografia($codigoSecurity);
          header("Location: ../interfaz/seguimiento_mamografia.php");
      */}
      


  
?>