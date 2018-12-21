<?php
    include_once "conexion.php";

    class ControlesMamografia{

        protected $mamografianombre;
        protected $codigoseguimientomamografia;

        function __construct($mamografianombre, $codigoseguimientomamografia){
			       $this->mamografianombre=$mamografianombre;
			          $this->codigoseguimientomamografia=$codigoseguimientomamografia;
        }

		      public static function vacio(){
			         return new self('','');
             }

        public function insertarControl(){
            $db= new Conexion();
            $sql = "INSERT INTO control_mamografia(nombremamografia,codigoreferenciamamografia)
            VALUES ('$this->mamografianombre','$this->codigoseguimientomamografia')";
           return $db->query($sql);
          }

          public function mostrarPreview(){
            $sql ="SELECT sm.idmamografia,sm.fechaexamen,p.nombres_apellidos,sm.nombreexamen,p.historiaclinica,p.dni,sm.centroprocedencia,
            p.edad,p.fecha_nacimiento,sm.diagnostico,ec.fechaecografia,ec.resultado, us.nombre FROM seguimiento_mamografia as sm inner join paciente as p on sm.dnipaciente = p.dni
                inner join referencia_mamografia as rm on sm.idmamografia= rm.idexamen 
                inner join ecografia as ec on rm.idecografia= ec.idecografia
                inner join control_mamografia as cm on rm.idreferencia = cm.codigoreferenciamamografia
                inner join usuario as us on sm.idusuario = us.id
                where sm.nombreexamen = 'MX. BILATERAL'";
            return $sql;
          }
          public function buscarMamografiaDni($dni){
            $consultaDni = "SELECT sm.idmamografia,sm.fechaexamen,p.nombres_apellidos,sm.nombreexamen,p.historiaclinica,p.dni,sm.centroprocedencia,
            p.edad,p.fecha_nacimiento,sm.diagnostico,ec.fechaecografia,ec.resultado, us.nombre FROM seguimiento_mamografia as sm inner join paciente as p on sm.dnipaciente = p.dni
                inner join referencia_mamografia as rm on sm.idmamografia= rm.idexamen 
                inner join ecografia as ec on rm.idecografia= ec.idecografia
                inner join control_mamografia as cm on rm.idreferencia = cm.codigoreferenciamamografia
                inner join usuario as us on sm.idusuario = us.id
                where sm.nombreexamen = 'MX. BILATERAL' AND p.dni like '%".$dni."%' ";
            return $consultaDni;
        }

        public function mostrarCantidadMamografia(){

            $sql = "SELECT COUNT(codigocontrol) as contador FROM controles_bilateral
             group by codigocontrol order BY contador DESC LIMIT 1";
             return $sql;
         }
         public function buscarCodigoSeguimiento($codigoseguimiento){
             $sql = "SELECT cs.fechabilateral,cs.descripcionbilateral FROM controles_bilateral as cs inner join control_mamografia as c on 									cs.codigocontrol = 				c.idcontrol_mamografia inner join referencia_mamografia as rf on c.codigoreferenciamamografia = 						rf.idreferencia inner join seguimiento_mamografia as se on rf.idexamen = se.idmamografia
             where se.idmamografia =  $codigoseguimiento";
              return $sql;
         }

         public function controlesPacienteMamografia($id){
            $conectar = new Conexion();
            $sql = " SELECT se.nombreexamen,cb.fechabilateral,cb.descripcionbilateral FROM  referencia_mamografia as r inner join   seguimiento_mamografia as se on r.idexamen = se.idmamografia inner join control_mamografia as cm on r.idreferencia = cm.codigoreferenciamamografia inner join controles_bilateral as cb on cm.idcontrol_mamografia = cb.codigocontrol
            Where se.idmamografia = $id";
            $result = $conectar->query($sql);
            return $result;
        }


        public function buscarPorFechasMamografia($fechaInicio,$fechaFin){
            $sql="SELECT sm.idmamografia,sm.fechaexamen,p.nombres_apellidos,sm.nombreexamen,p.historiaclinica,p.dni,sm.centroprocedencia,
            p.edad,p.fecha_nacimiento,sm.diagnostico,ec.fechaecografia,ec.resultado, us.nombre FROM seguimiento_mamografia as sm inner join paciente as p on sm.dnipaciente = p.dni
                inner join referencia_mamografia as rm on sm.idmamografia= rm.idexamen 
                inner join ecografia as ec on rm.idecografia= ec.idecografia
                inner join control_mamografia as cm on rm.idreferencia = cm.codigoreferenciamamografia
                inner join usuario as us on sm.idusuario = us.id
                where sm.nombreexamen = 'MX. BILATERAL' AND  sm.fechaexamen BETWEEN '".$fechaInicio."%' AND '".$fechaFin."%' ";
            return $sql;
    }



    }


?>
