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
            $consulta = "SELECT pap.codigoseguimientopapivaa,p.nombres_apellidos,pap.tipoexamen,pap.resultados,p.edad,p.fecha_nacimiento,p.dni,p.telefono,p.telefono2,pap.fechaexamen, pap.establecimientoreferencia,pap.responsable,   pap.motivoreferencia,pap.referirvph,rp.fechareferencia,rp.procedimiento,rp.resultadoprocedimiento,rp.tratamiento,us.nombre FROM seguimiento_pap_ivaa as pap inner join referencia_papiva as rp on pap.codigoseguimientopapivaa = rp.codigopapiva 
            inner join paciente as p on pap.codigopaciente = p.dni inner join control_pap_iva as co on
             rp.idpapiva = co.codigoseguimientopapivaa 
             inner join usuario us on pap.responsable = us.id
             WHERE pap.tipoexamen = 'VPH' OR pap.tipoexamen='PAP' OR pap.tipoexamen='IVAA'";
            return $consulta;
        }
        public function buscarDni($dni){
            $consultaDni = "SELECT pap.codigoseguimientopapivaa,p.nombres_apellidos,pap.tipoexamen,pap.resultados,p.edad,p.fecha_nacimiento,p.dni,p.telefono,p.telefono2,pap.fechaexamen, pap.establecimientoreferencia,pap.responsable,   pap.motivoreferencia,pap.referirvph,rp.fechareferencia,rp.procedimiento,rp.resultadoprocedimiento,rp.tratamiento,us.nombre FROM seguimiento_pap_ivaa as pap inner join referencia_papiva as rp on pap.codigoseguimientopapivaa = rp.codigopapiva 
            inner join paciente as p on pap.codigopaciente = p.dni inner join control_pap_iva as co on
             rp.idpapiva = co.codigoseguimientopapivaa 
             inner join usuario us on pap.responsable = us.id
             WHERE (pap.tipoexamen = 'VPH' OR pap.tipoexamen='PAP' OR pap.tipoexamen='IVAA') AND p.dni like '%".$dni."%' ";
            return $consultaDni;
        }
        public function buscarPorFechas($fechaInicio,$fechaFin){
            $consultaDni = "SELECT pap.codigoseguimientopapivaa,p.nombres_apellidos,pap.tipoexamen,pap.resultados,p.edad,p.fecha_nacimiento,p.dni,p.telefono,p.telefono2,pap.fechaexamen, pap.establecimientoreferencia,pap.responsable,   pap.motivoreferencia,pap.referirvph,rp.fechareferencia,rp.procedimiento,rp.resultadoprocedimiento,rp.tratamiento,us.nombre FROM seguimiento_pap_ivaa as pap inner join referencia_papiva as rp on pap.codigoseguimientopapivaa = rp.codigopapiva 
            inner join paciente as p on pap.codigopaciente = p.dni inner join control_pap_iva as co on
             rp.idpapiva = co.codigoseguimientopapivaa 
             inner join usuario us on pap.responsable = us.id
             WHERE pap.fechaexamen  BETWEEN '".$fechaInicio."%' AND '".$fechaFin."%' ";
            return $consultaDni;
        }
        #FINAL
        public function controlesPaciente($id){
            $conectar = new Conexion();
            $sql = "SELECT se.tipoexamen,cn.fechacontrol,cn.descripcion FROM seguimiento_pap_ivaa as se inner join referencia_papiva as 
            rp on se.codigoseguimientopapivaa=rp.codigopapiva
             inner join control_pap_iva as co on rp.idpapiva = co.codigoseguimientopapivaa
                inner join controles_pap_ivaa as cn on co.idcontro_pap_iva = cn.idcontrol
                 WHERE se.codigoseguimientopapivaa = $id";
            $result = $conectar->query($sql);
            return $result;
        }
    

        //reportes
     /*   public function mostrarReportes(){
            $consulta = "SELECT pap.codigoseguimientopapivaa,p.nombres_apellidos,p.edad,p.fecha_nacimiento,pap.sispaciente,pap.fechaexamen,pap.fechaentrega,pap.tipoexamen,
			pap.resultados,pap.responsable,pap.procedimientodx,pap.procedimientotto
            FROM seguimiento_pap_ivaa as pap inner join paciente as p
            on pap.codigopaciente = p.dni inner join control_pap_iva as co on pap.codigoseguimientopapivaa = co.codigoseguimientopapivaa";
            return $consulta;
        }
*/
       /* public function buscarPacienteReportes($dni){
            $consultaDni = "SELECT pap.codigoseguimientopapivaa,p.nombres_apellidos,p.edad,p.fecha_nacimiento,pap.sispaciente,pap.fechaexamen,pap.fechaentrega,pap.tipoexamen,
			pap.resultados,pap.responsable,pap.procedimientodx,pap.procedimientotto
            FROM seguimiento_pap_ivaa as pap inner join paciente as p
            on pap.codigopaciente = p.dni inner join control_pap_iva as co on pap.codigoseguimientopapivaa = co.codigoseguimientopapivaa WHERE p.dni like '%".$dni."%' ";
            return $consultaDni;
        }*/
        //Mayor cantidad de Controles
        public function mostrarCantidad(){

           $sql = "SELECT COUNT(idcontrol) as contador FROM controles_pap_ivaa 
           group by idcontrol order BY contador DESC LIMIT 1";
            return $sql;
        }
        public function buscarDetalle($codigoseguimientopapivaa){
            $sql = "SELECT ct.fechacontrol,ct.descripcion from
            controles_pap_ivaa as ct inner join control_pap_iva as c on ct.idcontrol = c.idcontro_pap_iva
            inner join referencia_papiva as rp on c.codigoseguimientopapivaa = rp.idpapiva 
            inner join seguimiento_pap_ivaa as se on rp.codigopapiva = se.codigoseguimientopapivaa
               WHERE se.codigoseguimientopapivaa = $codigoseguimientopapivaa";
             return $sql;
        }
    }
   

?>
