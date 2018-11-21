<?php
  include_once "conexion.php";

  class Baf{
    protected $id;
    protected $informe;
    protected $fecha_examen;
    protected $fecha_entrega;
    protected $resultado;
    protected $descripcion;
    protected $medico_realiza;
    protected $medico_supervisa;
    protected $patalogo;
    protected $seguimiento_id;

    function __construct($informe, $fecha_examen, $fecha_entrega, $resultado, $descripcion, $medico_realiza, $medico_supervisa, $patalogo, $seguimiento_id, $id=""){
      $this->id=$id;
      $this->informe=$informe;
      $this->fecha_examen=$fecha_examen;
      $this->fecha_entrega=$fecha_entrega;
      $this->resultado=$resultado;
      $this->descripcion=$descripcion;
      $this->medico_realiza=$medico_realiza;
      $this->medico_supervisa=$medico_supervisa;
      $this->patalogo=$patalogo;
      $this->seguimiento_id=$seguimiento_id;
    }

    public static function constructorvacio()
    {
        return new self('','','','','','','','','');
    }

    public function insertar(){
        $db= new Conexion();
        $sql ="INSERT INTO seguimiento_baaf (informe, fecha_examen, fecha_entrega, resultado, descripcion, medico_realiza, medico_supervisa, patologo, seguimiento_id)
        VALUES ('$this->informe','$this->fecha_examen','$this->fecha_entrega','$this->resultado','$this->descripcion','$this->medico_realiza','$this->medico_supervisa','$this->patalogo','$this->seguimiento_id')";
        $db->query($sql) ? $mm = "registro correcto"  : $mm = "no se puede registrar :: ENTIDAD";
        echo $mm;
    }

  }
?>
