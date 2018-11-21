<?php

	class Conexion extends mysqli
	{

		private $servidor='localhost';
		private $basededatos='smsmama';
		private $usuario='root';
		private $clave='';

		public function __construct()
		{
			parent:: __construct($this->servidor, $this->usuario, $this->clave, $this->basededatos);
			$this->set_charset('utf-8');
			$this->connect_errno ? die('error en la conexion' . mysqli_connect_errno()): $m = "conectado";
		}
	}
?>
