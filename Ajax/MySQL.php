<?php  
	class MySQL
	{  
		private $conexion;  
		private $total_consultas;  
		public function MySQL(){  
			  if(!isset($this->conexion))
			  {  
			  	// Base de Datos Angel
				$this->conexion = (mysql_connect("200.31.162.28","aderas","Sistemas123")) or die(mysql_error());  
				// Base de Datos Local
				//$this->conexion = (mysql_connect("localhost","root","snakerealmadrid")) or die(mysql_error());
				mysql_select_db("cuponescod",$this->conexion) or die(mysql_error());  
			  }
		}
		
		public function consulta($consulta){  
			  $this->total_consultas++;  
			  $resultado = mysql_query($consulta,$this->conexion);  
			  if(!$resultado)
			  {  
				echo 'MySQL Error: ' . mysql_error();  
				 exit;  
			  }	  
			  return $resultado;   
		}
		
		public function fetch_array($consulta){   
			  return mysql_fetch_array($consulta);  
		}
		
		public function num_rows($consulta){   
			  return mysql_num_rows($consulta);  
		}  
		public function getTotalConsultas(){  
			  return $this->total_consultas;  
		}
	}	
?>  