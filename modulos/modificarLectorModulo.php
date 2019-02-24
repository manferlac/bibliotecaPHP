<?php
	include "../conexion/conexion.inc";
	include "../clases/Lector.php";
	include "../funciones.php";
	session_start();
	require "../conexion/conexion.php";

	$lector = new Lector($_REQUEST["co_lector"],$_REQUEST["nombre"],$_REQUEST["apellidos"],$_REQUEST["direccion"],$_REQUEST["cpostal"],$_REQUEST["localidad"],$_REQUEST["provincia"],$_REQUEST["telefono"],$_REQUEST["email"]);
	if($lector->existe($mysqli)){
		if($lector->actualizar($mysqli)){
			$_SESSION["notificacion"] = "Lector modificado satisfactoriamente.";
		}else{
			$_SESSION["errorno"] = $mysqli->connect_errno;
			$_SESSION["error"] = $mysqli->connect_error;
			header("Location:../error.php");	
		}
	}else{
		$_SESSION["notificacion"] = "El lector no existe.";
	}
	header("Location:../modificarLector.php");
	
	require "../conexion/cerrarConexion.php";
?>