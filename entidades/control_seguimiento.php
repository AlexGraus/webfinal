<?php
  include_once "conexion.php";
  class ControlSeguimiento{
    protected $id;
    protected $fecha;
    protected $descripcion;
    protected $refrencia_ecm_id;

    function __construct( $fecha, $descripcion, $refrencia_ecm_id, $id= "")
    {
      $this->id=$id;
      $this->fecha=$fecha;
      $this->descripcion=$descripcion;
      $this->refrencia_ecm_id=$refrencia_ecm_id;
    }
    public static function constructorvacio()
		{
			return new self('','','');
		}

    public function insertar(){
      $db= new Conexion();
      $sql ="INSERT INTO seguimiento_ecm( fecha_seg, descripcion, referencia_ecm_id)  VALUES ('$this->fecha','$this->descripcion','$this->refrencia_ecm_id')";
      $db->query($sql) ? $mm = "registro correcto"  : $mm = "no se puede registrar :: ENTIDAD";
      echo $mm;
    }

    public function buscarSeguimiento($segCodigo){
      $db= new Conexion();
      $sql= "SELECT s.fecha_seg, s.descripcion from seguimiento_ecm as s inner join referencia_ecm as seg on seg.id=s.referencia_ecm_id
      where seg.id= $segCodigo";
      $result=$db->query($sql);
      return $result;
    }
  }
?>
