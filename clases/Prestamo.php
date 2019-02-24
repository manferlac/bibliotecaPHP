<?php
	class Prestamo {
		private $cod_lector;
		private $registro;
		private $fecha;
		
		public function Prestamo($registro,$cod_lector,$fecha){
			$this->registro = $registro;
			$this->cod_lector = $cod_lector;
			$this->fecha = $fecha;
		}
		public function insertar($mysqli){
			$insert = "INSERT INTO tablaprestamos VALUES('$this->cod_lector','$this->registro','$this->fecha');";
			if($resultado = $mysqli->query($insert)){
				if($resultado==1){
					return true;

				}else{
					return false;					
				}
			}
			return false;
		}
		public function buscar($mysqli){
			$consulta = "SELECT * FROM tablaprestamos WHERE registro='$this->registro';";
			if($resultado = $mysqli->query($consulta)){
				if($resultado->num_rows==1){
					$registro = $resultado->fetch_array();
					$this->registro=$registro["registro"];
					$this->cod_lector=$registro["co_lector"];	
					$this->fecha = $registro["fecha"];
					return true;
				}		
			}
			return false;							
		}
		
		public function borrar($mysqli){
			$delete = "DELETE FROM tablaprestamos WHERE registro='$this->registro' and co_lector='$this->cod_lector' and fecha='$this->fecha';";
			if($resultado = $mysqli->query($delete)){
				if($resultado==1){
					return true;

				}else{
					return false;					
				}
			}
			return false;
		}
		

		static function listadoCompleto($mysqli){
			$consulta = "select tablalibros.titulo,tablalibros.autor,tablalectores.nombre,tablaprestamos.fecha,tablaestadisticas.fecha_devolucion from tablaprestamos inner join tablalibros on tablaprestamos.registro=tablalibros.registro inner join tablalectores on tablaprestamos.co_lector=tablalectores.co_lector inner join tablaestadisticas on tablaprestamos.registro=tablaestadisticas.registro and tablaprestamos.co_lector=tablaestadisticas.co_lector and  tablaprestamos.fecha=tablaestadisticas.fecha_prestamo order by fecha;";
			if ($registros = $mysqli->query($consulta) ){
				while ($registro = $registros->fetch_array())
					printf("<tr><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td></tr>",$registro["titulo"],$registro["autor"],$registro["nombre"],$registro["fecha"],$registro["fecha_devolucion"]);
					
				$registros->close();
			}						
		}
		static function listadoPendienteDevolucion($mysqli){
			$consulta = "select tablalibros.titulo,tablalibros.autor,tablalectores.nombre,tablaprestamos.fecha,tablaestadisticas.fecha_devolucion from tablaprestamos inner join tablalibros on tablaprestamos.registro=tablalibros.registro inner join tablalectores on tablaprestamos.co_lector=tablalectores.co_lector inner join tablaestadisticas on tablaprestamos.registro=tablaestadisticas.registro and tablaprestamos.co_lector=tablaestadisticas.co_lector and  tablaprestamos.fecha=tablaestadisticas.fecha_prestamo where tablaestadisticas.fecha_devolucion <= sysdate() order by tablaestadisticas.fecha_prestamo;";
			if ($registros = $mysqli->query($consulta) ){
				while ($registro = $registros->fetch_array())
					printf("<tr><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td></tr>",$registro["titulo"],$registro["autor"],$registro["nombre"],$registro["fecha"],$registro["fecha_devolucion"]);
					
				$registros->close();
			}						
		}
		static function listadoNoPendienteDevolucion($mysqli){
			$consulta = "select tablalibros.titulo,tablalibros.autor,tablalectores.nombre,tablaprestamos.fecha,tablaestadisticas.fecha_devolucion from tablaprestamos inner join tablalibros on tablaprestamos.registro=tablalibros.registro inner join tablalectores on tablaprestamos.co_lector=tablalectores.co_lector inner join tablaestadisticas on tablaprestamos.registro=tablaestadisticas.registro and tablaprestamos.co_lector=tablaestadisticas.co_lector and  tablaprestamos.fecha=tablaestadisticas.fecha_prestamo where tablaestadisticas.fecha_devolucion >= sysdate() order by tablaestadisticas.fecha_prestamo;";
			if ($registros = $mysqli->query($consulta) ){
				while ($registro = $registros->fetch_array())
					printf("<tr><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td></tr>",$registro["titulo"],$registro["autor"],$registro["nombre"],$registro["fecha"],$registro["fecha_devolucion"]);
					
				$registros->close();
			}						
		}
		public function getRegistro(){
			return $this->registro;	
		}
		public function getCod_Lector(){
			return $this->cod_lector;	
		}
		public function getFecha(){
			return $this->fecha;	
		}
		public function setRegistro($registro){
			$this->registro=$registro;
		}
		public function setCod_Lector($cod_lector){
			$this->cod_lector=$cod_lector;
		}
		public function setFecha($fecha){
			$this->fecha=$fecha;
		}
	}
?>