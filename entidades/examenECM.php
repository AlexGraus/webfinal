<?php
  include_once "conexion.php";

  class ExamenECM{
    protected $id;
    protected $annio;
    protected $fecha_examen;
    protected $centro_origen;
    protected $diagnostico;
    protected $descripcion_resultado;
    protected $refrenciar;
    protected $centro_referencia;
    protected $paciente_id;
    protected $obstetra;

    function __construct($annio,$fecha_examen,$centro_origen, $diagnostico, $descripcion_resultado, $refrenciar, $centro_referencia, $paciente_id, $obstetra, $id=""){
      $this->id=$id;
      $this->annio=$annio;
      $this->fecha_examen=$fecha_examen;
      $this->centro_origen=$centro_origen;
      $this->diagnostico=$diagnostico;
      $this->descripcion_resultado=$descripcion_resultado;
      $this->refrenciar=$refrenciar;
      $this->centro_referencia=$centro_referencia;
      $this->paciente_id=$paciente_id;
      $this->obstetra=$obstetra;
    }

    public static function constructorvacio()
    {
        return new self('','','','','','','','','');
    }
    public function insertar(){
      $db= new Conexion();
      $obj= new stdClass();
      $sql ="INSERT INTO examen_ecm(annio, fecha_examen, centro_origen, diagnostico, descripcion_diagnostico, referenciar, centro_referencia, paciente_dni, usuario_id)
       VALUES ('$this->annio','$this->fecha_examen','$this->centro_origen','$this->diagnostico','$this->descripcion_resultado','$this->refrenciar','$this->centro_referencia','$this->paciente_id','$this->obstetra')";
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
      $sql="SELECT re.id, p.nombres_apellidos, p.dni, ec.fecha_examen, p.historiaclinica, ec.centro_origen, p.fecha_nacimiento, p.edad, ec.diagnostico,
      ec.descripcion_diagnostico, ec.referenciar, ec.centro_referencia, re.fecha_atencion, re.hacer_baf, re.fecha_examen_ref, re.especialista, re.descripcion_muestra,
       re.numero_registro, re.fecha_resultado, re.patologo, re.resultado, re.descripcion_resultado, u.nombre
       FROM examen_ecm as ec
          INNER JOIN referencia_ecm as re  on re.examen_ecm_id=ec.id
          INNER JOIN paciente as p on p.dni=ec.paciente_dni
          INNER JOIN usuario as u on u.id=ec.usuario_id"; 
      return  $sql;
    }
    public function buscarsegimientoPaciente($dni)
    {
      $consultaDni="SELECT re.id, p.nombres_apellidos, p.dni, ec.fecha_examen, p.historiaclinica, ec.centro_origen, p.fecha_nacimiento, p.edad, ec.diagnostico,
      ec.descripcion_diagnostico, ec.referenciar, ec.centro_referencia, re.fecha_atencion,re.hacer_baf, re.fecha_examen_ref, re.especialista, re.descripcion_muestra,
       re.numero_registro, re.fecha_resultado, re.patologo, re.resultado, re.descripcion_resultado, u.nombre
       FROM examen_ecm as ec
          INNER JOIN referencia_ecm as re  on re.examen_ecm_id=ec.id
          INNER JOIN paciente as p on p.dni=ec.paciente_dni
          INNER JOIN usuario as u on u.id=ec.usuario_id and p.dni like '%".$dni."%' ";
      return  $consultaDni;
    }
    public function contadorSeguimiento() #busca el total de controles
    {
      $sql = "SELECT COUNT(ecm.id) as contador FROM seguimiento_ecm as ecm
              INNER JOIN referencia_ecm  as ref on ref.id=ecm.referencia_ecm_id
              GROUP BY ref.id ASC";
       return $sql;
    }
    public function buscarSeguimiento($segCodigo){
      $sql= "SELECT ref.id, se.fecha_seg, se.descripcion from seguimiento_ecm as se
      inner join referencia_ecm as ref on se.referencia_ecm_id=ref.id
      where ref.id= $segCodigo";
      return $sql;
    }
 public function mostrarSeguimientosFechas($fechaInicio,$fechaFin){
      $sql="SELECT re.id, p.nombres_apellidos, p.dni, ec.fecha_examen, p.historiaclinica, ec.centro_origen, p.fecha_nacimiento, p.edad, ec.diagnostico,
      ec.descripcion_diagnostico, ec.referenciar, ec.centro_referencia, re.fecha_atencion,re.hacer_baf, re.fecha_examen_ref, re.especialista, re.descripcion_muestra,
       re.numero_registro, re.fecha_resultado, re.patologo, re.resultado, re.descripcion_resultado, u.nombre
       FROM examen_ecm as ec
          INNER JOIN referencia_ecm as re  on re.examen_ecm_id=ec.id
          INNER JOIN paciente as p on p.dni=ec.paciente_dni
          INNER JOIN usuario as u on u.id=ec.usuario_id and ec.fecha_examen BETWEEN '".$fechaInicio."%' AND '".$fechaFin."%'";
      return  $sql;
    }


  }
?>
