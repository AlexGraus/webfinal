<?php
	include_once "conexion.php";
	class Usuario{
		protected $id;
		protected $nombre;
		protected $email;
		protected $tipo;
		protected $usuario;
		protected $password;

		function __construct($nombre, $email, $tipo, $usuario, $password, $id= "")
		{
			$this->id=$id;
			$this->nombre=strtoupper($nombre);
			$this->email=$email;
			$this->usuario=$usuario;
			$this->password=$password;
			$this->tipo=$tipo;
		}

		public static function constructorvacio()
		{
			return new self('','','','','');
		}


		public function insertar()
		{
			$db= new Conexion();
			$sql = "INSERT INTO usuario (nombre, email, usuario, password,tipo) VALUES ('$this->nombre','$this->email','$this->usuario' ,'$this->password','$this->tipo')";
			$db->query($sql) ? $mm = "registro correcto"  : $mm = "no se puede registrar :: ENTIDAD";
			echo $mm;
		}

		public function editar($id)
		{
			$db= new Conexion();
			$sql="UPDATE nombre SET nombre='$this->nombre' WHERE id = ".$id;
			$db->query($sql) ? $mm = "Edicion correcto"  : $mm = "no se puede Actualizar";
			echo $mm;
		}

		public function eliminar()
		{
			# code...
		}

		public function buscar($usuario, $password)
		{
			$db= new Conexion();
			$sql="SELECT * FROM usuario WHERE usuario = '$usuario' and password = '$password' ";
			$resultado = $db->query($sql);
			return $resultado;
		}

		public function mostrar($id)
		{
			$db= new Conexion();
			$sql="SELECT * FROM usuario WHERE id = '$id' ";
			$resultado = $db->query($sql);
			return $resultado;
		}
		public function buscarRepetido($usuario){
			$db= new Conexion();
			$sql="SELECT * FROM usuario WHERE usuario = '$usuario' ";
			$resultado=$db->query($sql);
			if (mysqli_num_rows($resultado) >0 ) {
				return 1;
			} else {
				return 0;
			}
		}


		public function mostrartodos()
		{
			$db= new Conexion();
			$sql="SELECT * FROM usuario";
			$resultado = $db->query($sql);
			return $resultado;
		}

	}
 ?>
