<?php
	class Varios {
		private $duracion_prestamo;
		public function Prestamo(){
			
		}
		public function buscar($mysqli){
			$consulta = "SELECT * FROM varios limit 0,1;";
			if($resultado = $mysqli->query($consulta)){
				if($resultado->num_rows==1){
					$registro = $resultado->fetch_array();
					$this->duracion_prestamo=$registro["duracion_prestamo"];	
					return true;
				}		
			}
			return false;							
		}
		
		public function actualizar($mysqli){
			$update = "UPDATE varios SET duracion_prestamo='$this->duracion_prestamo';";
			if($mysqli->query($update)){
				if($mysqli->affected_rows>0){
					return true;

				}else{
					return false;					
				}
			}
			return false;
		}
						
	
		public function getDuracion_Prestamo(){
			return $this->duracion_prestamo;	
		}
		public function setDuracion_Prestamo($duracion){
			$this->duracion_prestamo=$duracion;	
		}
		
	}
?>