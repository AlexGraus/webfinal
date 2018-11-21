<?php
  include_once "conexion.php";
  class ControlSeguimiento{
    protected $id;
    protected $descripcion;
    protected $seguimiento_id;

    function __construct($descripcion, $seguimiento_id, $id= "")
    {
      $this->id=$id;
      $this->descripcion=$descripcion;
      $this->seguimiento_id=$seguimiento_id;
    }
    public static function constructorvacio()
		{
			return new self('','');
		}

    public function insertar(){
      $db= new Conexion();
      $sql ="INSERT INTO control_seguimiento (descripcion, seguimiento_id) VALUES ('$this->descripcion','$this->seguimiento_id')";
      $db->query($sql) ? $mm = "registro correcto"  : $mm = "no se puede registrar :: ENTIDAD";
      echo $mm;
    }

   
  }
?>
