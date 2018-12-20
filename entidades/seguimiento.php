<?php
  include_once "conexion.php";

  class Seguimiento{
    protected $id;
    protected $annio;
    protected $centro_origen;
    protected $centro_referencia;
    protected $fecha_visita;
    protected $ecm_id;
    protected $dni_paciente;

    function __construct($annio, $centro_origen, $centro_referencia, $fecha_visita, $ecm_id,  $dni_paciente, $id=""){
        $this->id=$id;
        $this->annio=strtoupper($annio);
        $this->centro_origen=$centro_origen;
        $this->centro_referencia=$centro_referencia;
        $this->fecha_visita=$fecha_visita;
        $this->ecm_id=$ecm_id;
        $this->dni_paciente=$dni_paciente;
    }

    public static function constructorvacio()
    {
        return new self('','','','','','');
    }

    public function insertar(){
      $db= new Conexion();
      $obj= new stdClass();
      $sql = "INSERT INTO seguimiento (annio, centro_origen, centro_referencia, fecha_visita, ecm_id, dni_paciente)
      VALUES ('$this->annio','$this->centro_origen','$this->centro_referencia', '$this->fecha_visita', '$this->ecm_id','$this->dni_paciente')";
      if ($db->query($sql)) {
        $obj->message = "registro correcto";
        $obj->insertID = $db->insert_id;
      } else {
        $obj->message = "no se puede registrar :: ENTIDAD";
        $obj->insertID = null;
      }
      return json_encode($obj);
    }


  }
?>
