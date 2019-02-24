<?php
	class Libro {
		private $registro;
		private $titulo;
		private $autor;
		private $editorial;
		private $cdu;
		private $localizacion;
		private $estanteria;
		private $balda;
		
		public function Libro($registro,$titulo,$autor,$editorial,$cdu,$localizacion,$estanteria,$balda){

			if(func_num_args()>1){
				$this->registro = $registro;
				$this->titulo = $titulo;
				$this->autor = $autor;
				$this->editorial = $editorial;
				$this->cdu = $cdu;
				$this->localizacion = $localizacion;
				$this->estanteria = $estanteria;
				$this->balda = $balda;
			}else
				$this->registro = $registro;
		}
		public function existe($mysqli){
			$consulta = "SELECT * FROM tablalibros WHERE registro ='$this->registro';";
			if($resultado = $mysqli->query($consulta)){
				if($resultado->num_rows==1){
					return true;

				}else{
					return false;					
				}
			}
			return false;
		}
		static function listadoCompleto($mysqli){
			$consulta = "SELECT registro,titulo,autor FROM tablalibros;";
			if ($registros = $mysqli->query($consulta) ){
				while ($registro = $registros->fetch_array())
					printf("<tr><td>%s</td><td>%s</td><td>%s</td></tr>",$registro["registro"],$registro["titulo"],$registro["autor"]);
					
				$registros->close();
			}						
		}
		static function listadoEspecifico($mysqli,$desde,$hasta){
			$consulta = "SELECT registro,titulo,autor FROM tablalibros where registro BETWEEN ".$desde." and ".$hasta.";";
			if ($registros = $mysqli->query($consulta) ){
				while ($registro = $registros->fetch_array())
					printf("<tr><td>%s</td><td>%s</td><td>%s</td></tr>",$registro["registro"],$registro["titulo"],$registro["autor"]);
					
				$registros->close();
			}						
		}
		public function buscar($mysqli){
			$consulta = "SELECT * FROM tablalibros WHERE registro ='$this->registro';";
			if($resultado = $mysqli->query($consulta)){
				if($resultado->num_rows==1){
					$registro = $resultado->fetch_array();
					$this->registro=$registro["registro"];	
					$this->titulo=$registro["titulo"];	
					$this->autor = $registro["autor"];
					$this->editorial = $registro["editorial"];
					$this->cdu = $registro["CDU"];
					$this->localizacion = $registro["localizacion"];
					$this->estanteria = $registro["estanteria"];
					$this->balda = $registro["balda"];
					return true;
				}		
			}
			return false;							
		}
		
		public function actualizar($mysqli){
			$update = "UPDATE tablalibros SET titulo='$this->titulo', autor='$this->autor', editorial='$this->editorial', CDU='$this->cdu', localizacion='$this->localizacion', estanteria='$this->estanteria', balda='$this->balda' WHERE registro  ='$this->registro';";
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
			$insert = "INSERT INTO tablalibros (titulo,autor,editorial,CDU,localizacion,estanteria,balda) VALUES ('$this->titulo','$this->autor','$this->editorial','$this->cdu','$this->localizacion','$this->estanteria','$this->balda');";
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
			$delete = "DELETE FROM tablalibros WHERE registro = '$this->registro';";
			if($resultado = $mysqli->query($delete)){
				if($resultado==1){
					return true;

				}else{
					return false;					
				}
			}
			return false;
		}
		
		public function getTitulo(){
			return $this->titulo;	
		}
		public function getAutor(){
			return $this->autor;	
		}
		public function getEditorial(){
			return $this->editorial;	
		}
		public function getCdu(){
			return $this->cdu;	
		}
		public function getLocalizacion(){
			return $this->localizacion;	
		}
		public function getEstanteria(){
			return $this->estanteria;	
		}
		public function getBalda(){
			return $this->balda;	
		}
		public function getRegistro(){
			return $this->registro;	
		}

		
	}
?>