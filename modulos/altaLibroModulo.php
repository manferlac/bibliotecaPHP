<?php

	include "../conexion/conexion.inc";
	include "../clases/Libro.php";
	include "../funciones.php";
	session_start();
	require "../conexion/conexion.php";

	$libro = new Libro("",$_REQUEST["titulo"],$_REQUEST["autor"],$_REQUEST["editorial"],$_REQUEST["cdu"],$_REQUEST["localizacion"],$_REQUEST["estanteria"],$_REQUEST["balda"]);
	if($libro->insertar($mysqli)){
			$_SESSION["notificacion"] = "Libro dado de alta en el sistema.";
		}else{
			$_SESSION["notificacion"] = "No ha sido posible dar de alta al libro en el sistema.";
		}
		header("Location:../altaLibro.php");
	
	require "../conexion/cerrarConexion.php";
?>