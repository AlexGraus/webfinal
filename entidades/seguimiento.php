<?php
  include_once "conexion.php";

  class Seguimiento{
    protected $id;
    protected $annio;
    protected $centro_origen;
    protected $centro_destino;
    protected $fecha_visita;
    protected $paciente_id;
    protected $ecm_id;
    protected $hcl;

    function __construct($annio, $centro_origen, $centro_destino, $fecha_visita, $paciente_id, $ecm_id, $hcl, $id=""){
        $this->id=$id;
        $this->annio=$annio;
        $this->centro_origen=$centro_origen;
        $this->centro_destino=$centro_destino;
        $this->fecha_visita=$fecha_visita;
        $this->paciente_id=$paciente_id;
        $this->ecm_id=$ecm_id;
        $this->hcl=$hcl;
    }

    public static function constructorvacio()
    {
        return new self('','','','','','','');
    }

    public function insertar(){
      $db= new Conexion();
      $obj= new stdClass();
      $sql = "INSERT INTO seguimiento (annio, centro_origen, centro_destino, fecha_visita, paciente_id, ecm_id, hcl)
      VALUES ('$this->annio','$this->centro_origen','$this->centro_destino', '$this->fecha_visita', '$this->paciente_id', '$this->ecm_id','$this->hcl')";
      if ($db->query($sql)) {
        $obj->message = "registro correcto";
        $obj->insertID = $db->insert_id;
      } else {
        $obj->message = "no se puede registrar :: ENTIDAD";
        $obj->insertID = null;
      }
      return json_encode($obj);
    }

    public function mostrarReportesEcmBaf(){
      "SELECT se.id,pa.nombres_apellidos,pa.edad,pa.fecha_nacimiento,ecm.diagnostico,ecm.plan_clinico,baaf.fecha_examen,
      baaf.fecha_entrega,baaf.resultado,baaf.descripcion,baaf.medico_realiza
       FROM seguimiento as se inner join seguimiento_ecm as ecm on se.ecm_id = ecm.id
          inner join seguimiento_baaf as baaf on se.id = baaf.seguimiento_id 
                inner join paciente as pa on pa.id = se.paciente_id";
        
    }


  }
?>
