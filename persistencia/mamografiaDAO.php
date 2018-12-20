<?php
      include ('../entidades/mamografiabilateral.php');
      include ('../entidades/paciente.php');
      include ('../entidades/usuario.php');
      //Paciente

        $codigopaciente=$_GET['dnipaciente'];
        $nombreexamen =$_GET['examen'];
        $fechaexamen = $_GET['fechaexamen'];
        $centroprocedencia = $_GET['centroprocedencia'];
        $diagnostico = $_GET['resultados'];

        $referenciar = $_GET['realizar']; 
        $personal = $_GET['personal'];
        $centroreferencia = $_GET['centroreferencia'];

        $mamogra = new Mamografia($nombreexamen,$fechaexamen,$centroprocedencia,$diagnostico,$centroreferencia,$referenciar,$codigopaciente,$personal);

         $mamogra->insertarMamografia();

        header("Location: ../interfaz/mamografia.php");



?>
