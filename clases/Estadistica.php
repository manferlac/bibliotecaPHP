<?php
	class Estadistica {
		private $cod_lector;
		private $registro;
		private $fecha;
		private $fecha_devolucion;
		public function Estadistica($registro,$cod_lector,$fecha,$fecha_devolucion){
			$this->registro = $registro;
			$this->cod_lector = $cod_lector;
			$this->fecha = $fecha;
			$this->fecha_devolucion = $fecha_devolucion;
		}
		public function insertar($mysqli){
			$insert = "INSERT INTO tablaestadisticas VALUES('$this->cod_lector','$this->registro','$this->fecha','$this->fecha_devolucion');";
			if($resultado = $mysqli->query($insert)){
				if($resultado==1){
					return true;

				}else{
					return false;					
				}
			}
			return false;
		}
		
		public function actualizar($mysqli){
			$update = "UPDATE tablaestadisticas SET fecha_devolucion='$this->fecha_devolucion' WHERE registro='$this->registro' and co_lector='$this->cod_lector' and fecha_prestamo='$this->fecha';";
			if($mysqli->query($update)){
				if($mysqli->affected_rows>0){
					return true;

				}else{
					return false;					
				}
			}
			return false;
		}
		
		static function porLibro($mysqli,$r){
			$consulta = "select tablalibros.titulo,tablalectores.nombre,DATEDIFF(tablaestadisticas.fecha_devolucion,tablaestadisticas.fecha_prestamo) as dias from tablaprestamos inner join tablalibros on tablaprestamos.registro=tablalibros.registro inner join tablalectores on tablaprestamos.co_lector=tablalectores.co_lector inner join tablaestadisticas on tablaprestamos.registro=tablaestadisticas.registro and tablaprestamos.co_lector=tablaestadisticas.co_lector and  tablaprestamos.fecha=tablaestadisticas.fecha_prestamo where tablaestadisticas.registro = '$r' order by fecha;";
			if ($registros = $mysqli->query($consulta) ){
				while ($registro = $registros->fetch_array())
					printf("<tr><td>%s</td><td>%s</td><td>%s</td></tr>",$registro["titulo"],$registro["nombre"],$registro[2]);
					
				$registros->close();
			}						
		}
				static function porLibroGenerales($mysqli){
			$consulta = "select tablalibros.titulo,count(*) from tablalibros inner join tablaestadisticas on tablalibros.registro=tablaestadisticas.registro;";
			if ($registros = $mysqli->query($consulta) ){
				while ($registro = $registros->fetch_array())
					printf("<tr><td>%s</td><td>%s</td></tr>",$registro["titulo"],$registro[1]);
					
				$registros->close();
			}						
		}
			static function porLector($mysqli,$c){
			$consulta = "select tablalectores.nombre,count(tablalectores.nombre) from tablalectores inner join tablaestadisticas on tablalectores.co_lector=tablaestadisticas.co_lector  where tablaestadisticas.co_lector = '$c' ;";
			if ($registros = $mysqli->query($consulta) ){
				while ($registro = $registros->fetch_array())
					printf("<tr><td>%s</td><td>%s</td></tr>",$registro["nombre"],$registro[1]);
					
				$registros->close();
			}						
		}
		static function porLectorGenerales($mysqli){
			$consulta = "select tablalectores.nombre,count(tablalectores.nombre) from tablalectores inner join tablaestadisticas on tablalectores.co_lector=tablaestadisticas.co_lector;";
			if ($registros = $mysqli->query($consulta) ){
				while ($registro = $registros->fetch_array())
					printf("<tr><td>%s</td><td>%s</td></tr>",$registro["nombre"],$registro[1]);
					
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
		public function getFecha_Devolucion(){
			return $this->fecha_devolucion;	
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
		public function setFecha_Devolucion($fechadevo){
			$this->fecha_devolucion=$fechadevo;	
		}
	}
?>