<?php
include_once "conexion.php";

    class ControlesPapivaa{

        protected $codigoseguimientopapivaa;
        protected $nombreexamen;


        function __construct($nombreexamen,$codigoseguimientopapivaa){
            $this->nombreexamen = $nombreexamen;
            $this->codigoseguimientopapivaa = $codigoseguimientopapivaa;
        }
        public static function vacio()
        {
            return new self('','');
        }

        public function insertarControl(){
            $conect = new Conexion();
            $rsInsertarControl = "INSERT INTO control_pap_iva(nombreexamen,codigoseguimientopapivaa) VALUES('$this->nombreexamen','$this->codigoseguimientopapivaa')";
            $conect->query($rsInsertarControl);
        }


        public function obtenerUltimoRegistro($conector){
            $id=$conector->insert_id;
            return $id;
        }

        public function mostrar(){
            $consulta = "SELECT pap.codigoseguimientopapivaa, p.nombres_apellidos,p.edad,p.fecha_nacimiento,p.dni,
            pap.tipoexamen,pap.fechaexamen,pap.fechaentrega,pap.resultados, pap.establecimientoreferencia,pap.responsable,pap.referenciaefectiva,
            pap.motivoreferencia,pap.procedimientodx,pap.procedimientotto FROM seguimiento_pap_ivaa as pap inner join paciente as p on pap.codigopaciente = p.dni inner join control_pap_iva as co on
             pap.codigoseguimientopapivaa = co.codigoseguimientopapivaa WHERE pap.tipoexamen = 'VPH' OR pap.tipoexamen='PAP' OR pap.tipoexamen='IVAA'";
            return $consulta;
        }
        public function buscarDni($dni){
            $consultaDni = "SELECT pap.codigoseguimientopapivaa, p.nombres_apellidos,p.edad,p.fecha_nacimiento,p.dni,
            pap.tipoexamen,pap.fechaexamen,pap.fechaentrega,pap.resultados, pap.establecimientoreferencia,pap.responsable,pap.referenciaefectiva,
            pap.motivoreferencia,pap.procedimientodx,pap.procedimientotto FROM seguimiento_pap_ivaa as pap inner join paciente as p on pap.codigopaciente = p.dni inner join control_pap_iva as co on
             pap.codigoseguimientopapivaa = co.codigoseguimientopapivaa WHERE (pap.tipoexamen = 'VPH' OR pap.tipoexamen='PAP' OR pap.tipoexamen='IVAA') AND p.dni like '%".$dni."%' ";
            return $consultaDni;
        }
        public function buscarPorFechas($fechaInicio,$fechaFin){
            $consultaDni = "SELECT pap.codigoseguimientopapivaa, p.nombres_apellidos,p.edad,p.fecha_nacimiento,p.dni,
            pap.tipoexamen,pap.fechaexamen,pap.fechaentrega,pap.resultados, pap.establecimientoreferencia,pap.responsable,pap.referenciaefectiva,
            pap.motivoreferencia,pap.procedimientodx,pap.procedimientotto FROM seguimiento_pap_ivaa as pap inner join paciente as p on pap.codigopaciente = p.dni inner join control_pap_iva as co on
             pap.codigoseguimientopapivaa = co.codigoseguimientopapivaa WHERE pap.fechaexamen  BETWEEN '".$fechaInicio."%' AND '".$fechaFin."%' ";
            return $consultaDni;
        }

        public function controlesPaciente($id){
            $conectar = new Conexion();
            $sql = "SELECT co.nombreexamen,cn.fechacontrol,cn.descripcion FROM seguimiento_pap_ivaa as se
            inner join control_pap_iva as co on se.codigoseguimientopapivaa = co.codigoseguimientopapivaa
            inner join controles_pap_ivaa as cn on co.idcontro_pap_iva = cn.idcontrol
             WHERE SE.codigoseguimientopapivaa = $id";
            $result = $conectar->query($sql);
            return $result;
        }
    

        //reportes
        public function mostrarReportes(){
            $consulta = "SELECT pap.codigoseguimientopapivaa,p.nombres_apellidos,p.edad,p.fecha_nacimiento,pap.sispaciente,pap.fechaexamen,pap.fechaentrega,pap.tipoexamen,
			pap.resultados,pap.responsable,pap.procedimientodx,pap.procedimientotto
            FROM seguimiento_pap_ivaa as pap inner join paciente as p
            on pap.codigopaciente = p.dni inner join control_pap_iva as co on pap.codigoseguimientopapivaa = co.codigoseguimientopapivaa";
            return $consulta;
        }

        public function buscarPacienteReportes($dni){
            $consultaDni = "SELECT pap.codigoseguimientopapivaa,p.nombres_apellidos,p.edad,p.fecha_nacimiento,pap.sispaciente,pap.fechaexamen,pap.fechaentrega,pap.tipoexamen,
			pap.resultados,pap.responsable,pap.procedimientodx,pap.procedimientotto
            FROM seguimiento_pap_ivaa as pap inner join paciente as p
            on pap.codigopaciente = p.dni inner join control_pap_iva as co on pap.codigoseguimientopapivaa = co.codigoseguimientopapivaa WHERE p.dni like '%".$dni."%' ";
            return $consultaDni;
        }
        //Mayor cantidad de Controles
        public function mostrarCantidad(){

           $sql = "SELECT COUNT(idcontrol) as contador FROM controles_pap_ivaa 
           group by idcontrol order BY contador DESC LIMIT 1";
            return $sql;
        }
        public function buscarDetalle($codigoseguimientopapivaa){
            $sql = "SELECT ct.descripcion from controles_pap_ivaa as ct inner join control_pap_iva as c on ct.idcontrol = c.idcontro_pap_iva 
            WHERE c.codigoseguimientopapivaa = $codigoseguimientopapivaa";
             return $sql;
        }
    }
   

?>
