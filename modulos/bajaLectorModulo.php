<?php
	include "../conexion/conexion.inc";
	include "../clases/Lector.php";
	include "../funciones.php";
	session_start();
	require "../conexion/conexion.php";
	
	$lector = new Lector($_REQUEST["co_lector"]);
	if($lector->existe($mysqli)){
		if($lector->borrar($mysqli)){
				$_SESSION["notificacion"]="Lector dado de baja en el sistema.";
			}else{
				$_SESSION["notificacion"]= "No ha sido posible dar de baja al lector";
			}
	}else{
		$_SESSION["notificacion"]= "No existe lector para modificar";
	}
	header("Location:../bajaLector.php");
	
	require "../conexion/cerrarConexion.php";

?>