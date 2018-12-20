<?php
  include_once "conexion.php";

  class Referencia{
    protected $id;
    protected $fecha_atencion;
    protected $hacer_baf;
    protected $fecha_examen;
    protected $especialista;
    protected $descripcion_muestra;
    protected $numero_registro;
    protected $fecha_resultado;
    protected $patalogo;
    protected $resultado;
    protected $descripcion_resultado;
    protected $examen_ecm_id;

    function __construct($fecha_atencion, $hacer_baf, $fecha_examen, $especialista, $descripcion_muestra, $numero_registro, $fecha_resultado, $patalogo,$resultado, $descripcion_resultado, $examen_ecm_id, $id=""){
      $this->id=$id;
      $this->fecha_atencion=$fecha_atencion;
      $this->hacer_baf=$hacer_baf;
      $this->fecha_examen=$fecha_examen;
      $this->especialista=$especialista;
      $this->descripcion_muestra=$descripcion_muestra;
      $this->numero_registro=$numero_registro;
      $this->fecha_resultado=$fecha_resultado;
      $this->patalogo=$patalogo;
      $this->resultado=$resultado;
      $this->descripcion_resultado=$descripcion_resultado;
      $this->examen_ecm_id=$examen_ecm_id;
    }

    public static function constructorvacio()
    {
        return new self('','','','','','','','','','','');
    }

    public function insertar(){
        $db= new Conexion();
        $sql ="INSERT INTO referencia_ecm (fecha_atencion, hacer_baf, fecha_examen_ref, especialista, descripcion_muestra, numero_registro, fecha_resultado, patologo, resultado, descripcion_resultado, examen_ecm_id)
        VALUES ('$this->fecha_atencion','$this->hacer_baf','$this->fecha_examen','$this->especialista','$this->descripcion_muestra','$this->numero_registro','$this->fecha_resultado','$this->patalogo','$this->resultado','$this->descripcion_resultado','$this->examen_ecm_id')";
        $db->query($sql) ? $mm = "registro correcto"  : $mm = "no se puede registrar :: ENTIDAD";
        echo $mm;
    }

  }
?>
