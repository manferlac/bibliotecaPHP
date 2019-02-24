<?php
	include "../conexion/conexion.inc";
	include "../clases/Libro.php";
	include "../funciones.php";
	session_start();
	require "../conexion/conexion.php";

	$libro = new Libro($_REQUEST["registro"],$_REQUEST["titulo"],$_REQUEST["autor"],$_REQUEST["editorial"],$_REQUEST["cdu"],$_REQUEST["localizacion"],$_REQUEST["estanteria"],$_REQUEST["balda"]);
	if($libro->existe($mysqli)){
		if($libro->actualizar($mysqli)){
			$_SESSION["notificacion"] = "libro modificado satisfactoriamente.";
		}else{
			$_SESSION["errorno"] = $mysqli->connect_errno;
			$_SESSION["error"] = $mysqli->connect_error;
			header("Location:../error.php");	
		}
	}else{
		$_SESSION["notificacion"] = "El libro no existe.";
	}
	header("Location:../modificarlibro.php");
	
	require "../conexion/cerrarConexion.php";
?>