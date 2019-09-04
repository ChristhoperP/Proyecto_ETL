<?php
	class Conexion{
		private $serverName="localhost";
		private $connectionInfo;
		private $link;

		public function __construct($server,$db){
			$this->serverName =$server;
			$this->connectionInfo =array( "Database"=>$db);
			$this->link = sqlsrv_connect( $this->serverName, $this->connectionInfo);
		}

		public function ejecutarConsulta($sql){
			$params = array();
     		$options =  array( "Scrollable" => SQLSRV_CURSOR_STATIC );
			return sqlsrv_query($this->link, $sql,$params,$options);
		}

		public function obtenerFila($resultado){
			return pg_fetch_array($resultado);
		}

		public function cerrarConexion(){
			pg_close($this->link) or die('Error al cerrar conexion');
		}

		public function getLink(){
			return $this->link;
		}

		//no se para que es esta
		public function antiInyeccion($texto){
			return mysqli_real_escape_string($this->link, $texto);
		}
		//tampoco se
		public function ultimoId(){
			return mysqli_insert_id($this->link);
		}
	}
?>