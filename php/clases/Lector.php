<?php
	class Lector {
		private $co_lector;
		private $nombre;
		private $apellidos;
		private $direccion;
		private $cod_postal;
		private $localidad;
		private $provincia;
		private $telefono;
		private $email;
		
		public function Lector($co_lector,$nombre,$apellidos,$direccion,$cod_postal,$localidad,$provincia,$telefono,$email){

			if(func_num_args()>1){
			$this->co_lector = $co_lector;
			$this->nombre = $nombre;
			$this->apellidos = $apellidos;
			$this->direccion = $direccion;
			$this->cod_postal = $cod_postal;
			$this->localidad = $localidad;
			$this->provincia = $provincia;
			$this->telefono = $telefono;
			$this->email = $email;
			}else
				$this->co_lector = $co_lector;
			
		}
		public function existe($mysqli){
			$consulta = "SELECT co_lector FROM tablalectores WHERE co_lector='$this->co_lector';";
			if($resultado = $mysqli->query($consulta)){
				if($resultado->num_rows==1){
					return true;

				}else{
					return false;					
				}
			}
			return false;
		}
		
		public function buscar($mysqli){
			$consulta = "SELECT * FROM tablalectores WHERE co_lector='$this->co_lector';";
			if($resultado = $mysqli->query($consulta)){
				if($resultado->num_rows==1){
					$registro = $resultado->fetch_array();
					$this->co_lector=$registro["co_lector"];	
					$this->nombre=$registro["nombre"];	
					$this->apellidos = $registro["apellidos"];
					$this->direccion = $registro["direccion"];
					$this->cod_postal = $registro["cod_postal"];
					$this->localidad = $registro["localidad"];
					$this->provincia = $registro["provincia"];
					$this->telefono = $registro["telefono"];
					$this->email = $registro["email"];
					return true;
				}		
			}
			return false;							
		}
		
		public function actualizar($mysqli){
			$update = "UPDATE tablalectores SET nombre='$this->nombre', apellidos='$this->apellidos', direccion='$this->direccion', cod_postal='$this->cod_postal', localidad='$this->localidad', provincia='$this->provincia', telefono='$this->telefono',email='$this->email' WHERE co_lector ='$this->co_lector';";
			if($mysqli->query($update)){
				if($mysqli->affected_rows>0){
					return true;

				}else{
					return false;					
				}
			}
			return false;
		}
						
		public function insertar($mysqli){
			$insert = "INSERT INTO tablalectores (nombre,apellidos,direccion,cod_postal,localidad,provincia,telefono,email) VALUES ('$this->nombre','$this->apellidos','$this->direccion','$this->cod_postal','$this->localidad','$this->provincia','$this->telefono','$this->email');";
			if($resultado = $mysqli->query($insert)){
				if($resultado==1){
					return true;

				}else{
					return false;					
				}
			}
			return false;
		}
		
		public function borrar($mysqli){
			$delete = "DELETE FROM tablalectores WHERE co_lector = '$this->co_lector';";
			if($resultado = $mysqli->query($delete)){
				if($resultado==1){
					return true;

				}else{
					return false;					
				}
			}
			return false;
		}
		public function getCod_Lector(){
			return $this->co_lector;	
		}
		public function getNombre(){
			return $this->nombre;	
		}
		public function getApellidos(){
			return $this->apellidos;	
		}
		public function getDireccion(){
			return $this->direccion;	
		}
		public function getCPostal(){
			return $this->cod_postal;	
		}
		public function getLocalidad(){
			return $this->localidad;	
		}
		public function getProvincia(){
			return $this->provincia;	
		}
		public function getTelefono(){
			return $this->telefono;	
		}
		public function getEmail(){
			return $this->email;	
		}

		
	}
?>