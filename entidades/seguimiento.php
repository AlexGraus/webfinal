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
        $this->annio=$annio;
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

    public function mostrarSeguimientos(){
      $sql="SELECT se.id, se.fecha_visita,p.nombres_apellidos, p.dni, ecm.fecha, p.historiaclinica, se.centro_origen, p.edad, p.fecha_nacimiento,
      ecm.diagnostico,ecm.plan_clinico, ecm.observacion, ecm.fecha_HDTE, ecm.hacer_BAAF, baf.informe, baf.fecha_examen, baf.resultado, baf.descripcion,
      baf.medico_realiza, baf.medico_supervisa, baf.patologo, baf.fecha_entrega FROM seguimiento as se
      join seguimiento_ecm as ecm on se.ecm_id=ecm.id
      inner JOIN seguimiento_baaf as baf on se.id=baf.seguimiento_id
      join paciente as p on se.dni_paciente=p.dni";
      return  $sql;
    }
    public function buscarsegimientoPaciente($dni)
    {
      $consultaDni="SELECT se.id, se.fecha_visita,p.nombres_apellidos, p.dni, ecm.fecha, p.historiaclinica, se.centro_origen, p.edad, p.fecha_nacimiento,
      ecm.diagnostico,ecm.plan_clinico, ecm.observacion, ecm.fecha_HDTE, ecm.hacer_BAAF, baf.informe, baf.fecha_examen, baf.resultado, baf.descripcion,
      baf.medico_realiza, baf.medico_supervisa, baf.patologo, baf.fecha_entrega FROM seguimiento as se
      inner join seguimiento_ecm as ecm on se.ecm_id=ecm.id
      inner JOIN seguimiento_baaf as baf on se.id=baf.seguimiento_id
      inner join paciente as p on se.dni_paciente=p.dni and p.dni like '%".$dni."%' ";
      return  $consultaDni;
    }
    public function contadorSeguimiento()
    {
      $sql = "SELECT COUNT(cs.seguimiento_id) as contador from control_seguimiento as cs
              inner join seguimiento as s on cs.seguimiento_id=s.id
              GROUP by cs.seguimiento_id ASC LIMIT 1";
       return $sql;
    }
    public function buscarSeguimiento($segCodigo){
      $sql= "SELECT s.descripcion from control_seguimiento as s inner join seguimiento as seg on seg.id=s.seguimiento_id
      where seg.id= $segCodigo";
      return $sql;
    }

  }
?>
