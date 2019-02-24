<?php

	include "../conexion/conexion.inc";
	include "../clases/Lector.php";
	include "../funciones.php";
	session_start();
	require "../conexion/conexion.php";
	
	$lector = new Lector("",$_REQUEST["nombre"],$_REQUEST["apellidos"],$_REQUEST["direccion"],$_REQUEST["cpostal"],$_REQUEST["localidad"],$_REQUEST["provincia"],$_REQUEST["telefono"],$_REQUEST["email"]);
	if($lector->insertar($mysqli)){
			$_SESSION["notificacion"] = "Lector dado de alta en el sistema.";
		}else{
			$_SESSION["notificacion"] = "No ha sido posible dar de alta al lector en el sistema.";
		}
		header("Location:../altaLector.php");
	
	require "../conexion/cerrarConexion.php";
?>