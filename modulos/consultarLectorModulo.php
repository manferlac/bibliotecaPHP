<?php

	include "../conexion/conexion.inc";
	include "../clases/Lector.php";
	include "../funciones.php";
	session_start();
	require "../conexion/conexion.php";
	
	$lector = new Lector($_REQUEST["co_lector"]);
	if($lector->buscar($mysqli)){
			$_SESSION["lector"] = $lector;
		}else{
			$_SESSION["lector"]="";
			$_SESSION["notificacion"] = "El lector solicitado no existe en el sistema.";
			
			if($_REQUEST["accion"]=="modificar"){
				header("Location:../modificarLector.php");
				return;
			}
		}
		if($_REQUEST["accion"]=="modificar")
			header("Location:../modificarLectorCompleto.php");
		else
			header("Location:../consultarLector.php");
	require "../conexion/cerrarConexion.php";
?>