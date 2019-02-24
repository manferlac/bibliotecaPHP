<?php
	class Usuario {
		private $user;
		private $password;
		
		public function Usuario($user,$password){
			$this->user = $user;
			if(func_num_args()>1)
				$this->password = $password;

		}				
		public function comprobarLogin($mysqli){
			$consulta = "select user from usuarios where user='$this->user' and password='$this->password';";
			if($resultado = $mysqli->query($consulta)){
				if($resultado->num_rows==1){
					return true;

				}else{
					return false;					
				}
			}
			return false;

		}
		public function cambiarPassword($mysqli,$nuevaClave){
		$update = "UPDATE usuarios set password='$nuevaClave';";
			if($mysqli->query($update)){
				if($mysqli->affected_rows>0){
					return true;

				}else{
					return false;					
				}
			}
			return false;
		}
		public function cerrarSession(){
			session_unset();
			session_destroy();
			return true;
		}
		
		public function getUser(){
			return $this->user;	
		}
	}

?>