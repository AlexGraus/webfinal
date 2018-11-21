<?php
include_once "conexion.php";
class Paciente
{
    protected $id;
    protected $dni;
    protected $nombres_apellidos;
    protected $fecha_nacimiento;
    protected $edad;
    protected $direccion;
    protected $telefono;
    protected $grupo_familiar;
    protected $historiaclinica;
    protected $sis;


    function __construct($dni,$nombres_apellidos,$fecha_nacimiento,$edad,$direccion,$telefono, $grupo_familiar,$historiaclinica,$sis){
        $this->id="";
        $this->dni=$dni;
        $this->nombres_apellidos=$nombres_apellidos;
        $this->fecha_nacimiento=$fecha_nacimiento;
        $this->edad=$edad;
        $this->direccion=$direccion;
        $this->telefono=$telefono;
        $this->grupo_familiar=$grupo_familiar;
        $this->historiaclinica = $historiaclinica;
        $this->sis = $sis;
    }

    public static function constructorvacio()
    {
        return new self('','','','','','','','','');
    }

    public function insertar()
    {
        $db= new Conexion();
        $obj = new stdClass();
        $sql = "INSERT INTO paciente(dni, nombres_apellidos, fecha_nacimiento, edad, direccion, telefono, grupo_familiar,historiaclinica,sis)
         VALUES ('$this->dni','$this->nombres_apellidos',' $this->fecha_nacimiento', '$this->edad', '$this->direccion',
          ' $this->telefono','$this->grupo_familiar','$this->historiaclinica','$this->sis')";
        if($db->query($sql)){
          $obj->message = "registro correcto";
          $obj->insertID = $db->insert_id;
        }else{
          $obj->message = "no se puede registrar :: ENTIDAD";
          $obj->insertID = null;
        };
        return json_encode($obj);
    }

    public function editar()
    {
        # code...
    }

    public function eliminar()
    {
        # code...
    }

    public function buscar($id)
    {
        # code...
    }

    public function buscarPorDni($dni){
        $db = new Conexion();
        $sql = "SELECT *FROM paciente WHERE dni = '.$dni.'";
        $result = $db->query($sql);
        return $result;
    }
    public function insertarPaciente()
    {
        $db= new Conexion();
        $sql = "INSERT INTO paciente(dni, nombres_apellidos, fecha_nacimiento, edad, direccion, telefono, grupo_familiar) VALUES ('$this->dni','$this->nombres_apellidos',' $this->fecha_nacimiento', '$this->edad', '$this->direccion', ' $this->telefono','$this->grupo_familiar')";
        $db->query($sql);
        return $db;
    }

    public function obtenerUltimoRegistro($url){
        $data = $url->insert_id;
        return $data;
    }

    public function buscarPacienteControles($id){
        $conectar = new Conexion();
        $sql = "SELECT p.nombres_apellidos,se.tipoexamen FROM seguimiento_pap_ivaa as se inner join paciente as p on se.codigopaciente = p.dni
        WHERE se.codigoseguimientopapivaa = $id";
        $result = $conectar->query($sql);
        return $result;
    }
    
    public function buscarPacienteMamografia($id){
        $conectar = new Conexion();
        $sql = "SELECT p.nombres_apellidos,se.nombreexamen FROM seguimiento_mamografia as se inner join paciente as p on se.dnipaciente = p.dni
        WHERE se.idmamografia = $id";
        $result = $conectar->query($sql);
        return $result;
    }


}

?>
