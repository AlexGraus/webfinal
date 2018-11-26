<?php
  include_once "conexion.php";
  class ControlSeguimiento{
    protected $id;
    protected $fecha;
    protected $descripcion;
    protected $seguimiento_id;

    function __construct( $fecha, $descripcion, $seguimiento_id, $id= "")
    {
      $this->id=$id;
      $this->$fecha=$fecha;
      $this->descripcion=$descripcion;
      $this->seguimiento_id=$seguimiento_id;
    }
    public static function constructorvacio()
		{
			return new self('','','');
		}

    public function insertar(){
      $db= new Conexion();
      $sql ="INSERT INTO control_seguimiento (fecha, descripcion, seguimiento_id) VALUES ('$this->fecha','$this->descripcion','$this->seguimiento_id')";
      $db->query($sql) ? $mm = "registro correcto"  : $mm = "no se puede registrar :: ENTIDAD";
      echo $mm;
    }

    public function buscarSeguimiento($segCodigo){
      $db= new Conexion();
      $sql= "SELECT s.fecha, s.descripcion from control_seguimiento as s inner join seguimiento as seg on seg.id=s.seguimiento_id
      where seg.id= $segCodigo";
      $result=$db->query($sql);
      return $result;
    }
  }
?>
