<?php
  include_once "conexion.php";

  class Ecm{
    protected $id;
    protected $fecha;
    protected $diagnostico;
    protected $plan_clinico;
    protected $observacion;
    protected $fecha_HDTE;
    protected $hacer_BAAF;

    function __construct($fecha, $diagnostico, $plan_clinico, $observacion, $fecha_HDTE, $hacer_BAAF, $id=""){
      $this->id=$id;
      $this->fecha=$fecha;
      $this->diagnostico=$diagnostico;
      $this->plan_clinico=$plan_clinico;
      $this->observacion=$observacion;
      $this->fecha_HDTE=$fecha_HDTE;
      $this->hacer_BAAF=$hacer_BAAF;
    }

    public static function constructorvacio()
    {
        return new self('','','','','','');
    }
    public function insertar(){
      $db= new Conexion();
      $obj= new stdClass();
      $sql =" INSERT INTO seguimiento_ecm (fecha, diagnostico, plan_clinico, observacion, fecha_HDTE, hacer_BAAF)
      VALUES ('$this->fecha','$this->diagnostico','$this->plan_clinico','$this->observacion','$this->fecha_HDTE','$this->hacer_BAAF')";
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
