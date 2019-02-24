<?php
	include "../conexion/conexion.inc";
	include "../clases/Libro.php";
	include "../funciones.php";
	session_start();
	require "../conexion/conexion.php";
	
	$libro = new Libro($_REQUEST["registro"]);
	if($libro->existe($mysqli)){
		if($libro->borrar($mysqli)){
				$_SESSION["notificacion"]="libro dado de baja en el sistema.";
			}else{
				$_SESSION["notificacion"]= "No ha sido posible dar de baja al libro";
			}
	}else{
		$_SESSION["notificacion"]= "No existe libro para eliminar".$mysql->error;
	}
	header("Location:../bajalibro.php");
	
	require "../conexion/cerrarConexion.php";

?>