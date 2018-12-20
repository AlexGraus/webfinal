<?php
  include_once "conexion.php";


  class ReferenciaVph{


    protected $fechareferencia;
    protected $procedimiento;
    protected $resultadoprocedimiento;
    protected $tratamiento;
    protected $codigopapiva;

    function __construct($fechareferencia,$procedimiento,$resultadoprocedimiento,$tratamiento,$codigopapiva){
        $this->fechareferencia=$fechareferencia;
        $this->procedimiento=$procedimiento;
        $this->resultadoprocedimiento=$resultadoprocedimiento;
        $this->tratamiento=$tratamiento;
        $this->codigopapiva=$codigopapiva;

    }
    public static function vacio(){
        return new self('','','','','');
    }

    public function insertarReferencia(){
        $db= new Conexion();
        $sql ="INSERT INTO referencia_papiva(fechareferencia, 
        procedimiento, resultadoprocedimiento, tratamiento, codigopapiva) VALUES
       ('$this->fechareferencia','$this->procedimiento','$this->resultadoprocedimiento','$this->tratamiento','$this->codigopapiva')";
        $db->query($sql) ? $mm = "registro correcto"  : $mm = "no se puede registrar :: ENTIDAD";
       return $db;
    }

    public function obtenerUltimoPap($conector){
        $id=$conector->insert_id;
        return $id;
    }

        

  }


?>