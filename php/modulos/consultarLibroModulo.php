<?php

	include "../conexion/conexion.inc";
	include "../clases/Libro.php";
	include "../funciones.php";
	session_start();
	require "../conexion/conexion.php";
	
	$libro = new Libro($_REQUEST["registro"]);
	if($libro->buscar($mysqli)){
			$_SESSION["libro"] = $libro;
		}else{
			$_SESSION["libro"]="";
			$_SESSION["notificacion"] = "El libro solicitado no existe en el sistema.";
			if($_REQUEST["accion"]=="modificar"){
				header("Location:../modificarLibro.php");
				return;
			}
		}
		if($_REQUEST["accion"]=="modificar")
			header("Location:../modificarlibroCompleto.php");
		else
			header("Location:../consultaLibro.php");
	require "../conexion/cerrarConexion.php";
?>