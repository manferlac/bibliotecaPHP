<?php
	// conectamos con la bd
	include "../conexion/conexion.inc";
	include "../clases/Usuario.php";
	include "../funciones.php";
	session_start();
	require "../conexion/conexion.php";
	
	$usuario = new Usuario($_REQUEST["usuario"],$_REQUEST["clave"]);
	if($usuario->comprobarLogin($mysqli)){
		$_SESSION["autentificado"] = true;
		$_SESSION["usuario"] = $usuario;
		$_SESSION["notificacion"] = "Usuario logueado correctamente";
	}else{	
		$_SESSION["notificacion"] = "Error, usuario o clave no validos.";		
	}
	header("Location:../index.php");
	
	require "../cerrarConexion.php";
		
?>