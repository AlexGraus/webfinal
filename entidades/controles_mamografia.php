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
            $sql = "INSERT INTO control_mamografia(nombremamografia,codigoseguimientomamografia)
            VALUES ('$this->mamografianombre','$this->codigoseguimientomamografia')";
           return $db->query($sql);
          }

          public function mostrarPreview(){
            $sql ="SELECT S.idmamografia,s.fechaexamen,p.nombres_apellidos,s.nombreexamen,p.historiaclinica,p.dni,s.centroprocedencia,
            p.edad,p.fecha_nacimiento,s.diagnostico,e.fechaecografia,e.resultado FROM seguimiento_mamografia as s inner join paciente as p on s.dnipaciente = p.dni
                                        inner join ecografia e on s.idecografia = e.idecografia
                                        inner join control_mamografia as ct on s.idmamografia = ct.codigoseguimientomamografia
                                        where s.nombreexamen = 'MX. BILATERAL'";
            return $sql;
          }
          public function buscarMamografiaDni($dni){
            $consultaDni = "SELECT S.idmamografia,s.fechaexamen,p.nombres_apellidos,s.nombreexamen,p.historiaclinica,p.dni,s.centroprocedencia,
            p.edad,p.fecha_nacimiento,s.diagnostico,e.fechaecografia,e.resultado FROM seguimiento_mamografia as s inner join paciente as p on s.dnipaciente = p.dni
                                        inner join ecografia e on s.idecografia = e.idecografia
                                        inner join control_mamografia as ct on s.idmamografia = ct.codigoseguimientomamografia
                                        where s.nombreexamen = 'MX. BILATERAL' AND p.dni like '%".$dni."%' ";
            return $consultaDni;
        }

        public function mostrarCantidadMamografia(){

            $sql = "SELECT COUNT(codigocontrol) as contador FROM controles_bilateral
             group by codigocontrol order BY contador DESC LIMIT 1";
             return $sql;
         }
         public function buscarCodigoSeguimiento($codigoseguimiento){
             $sql = "SELECT cs.descripcionbilateral FROM controles_bilateral as cs inner join control_mamografia as c on cs.codigocontrol = c.idcontrol_mamografia
             where c.codigoseguimientomamografia =  $codigoseguimiento";
              return $sql;
         }

         public function controlesPacienteMamografia($id){
            $conectar = new Conexion();
            $sql = " SELECT se.nombreexamen,cb.fechabilateral,cb.descripcionbilateral FROM  seguimiento_mamografia as se inner join control_mamografia as cm on se.idmamografia = cm.codigoseguimientomamografia inner join controles_bilateral as cb on cm.idcontrol_mamografia = cb.codigocontrol
            Where se.idmamografia =$id";
            $result = $conectar->query($sql);
            return $result;
        }
    
         
         

    }


?>