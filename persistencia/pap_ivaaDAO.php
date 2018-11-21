<?php
      include ('../entidades/paciente.php');      
      include ('../entidades/papivaa.php');
      include ('../entidades/controlespapivaa.php');

      //Paciente

      $codigopaciente=$_GET['dnipaciente'];

    //PAP E IVAA
        $fechaexamen = $_GET['fechaexamen'];
        $fechaentrega= $_GET['fechaentrega'];	
        $establecimientoreferencia =$_GET['establecimientoorigen'];	
        $establecimientoatencion = $_GET['establecimientodestino'];	
        $responsable = $_GET['responsable'];
        $resultados = $_GET['resultados'];
        $tipoexamen = $_GET['examenes'];
        $motivoreferencia = $_GET['motivoreferencia'];	
        $procedimientotto = $_GET['procedimientotto'];	
        $procedimientodx = $_GET['procedimiendodx'];	
        $referenciaefectiva = $_GET['referenciaefectiva'];	

        $papeivaa = new Papivaa($fechaexamen,$fechaentrega,$establecimientoreferencia,$establecimientoatencion,$responsable, $resultados, $tipoexamen,$motivoreferencia,$procedimientotto,$procedimientodx,$referenciaefectiva,$codigopaciente);
        
        $link = $papeivaa->insertarExamen();
        
    //Controles
         $codigoseguimineto = $papeivaa->obtenerUltimoRegistro($link);
        $control = new ControlesPapivaa($tipoexamen,$codigoseguimineto);
        $control->insertarControl();



    header("Location: ../interfaz/pap_ivaa.php");
  
?>