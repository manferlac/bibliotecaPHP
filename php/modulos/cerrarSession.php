<?php

	include "../clases/Usuario.php";
	session_start();

	$usuario = new Usuario($_SESSION["usuario"]);
	if($usuario->cerrarSession()){
		$_SESSION["notificacion"] = "Sesion cerrada correctamente.";
		header("Location:../index.php");
	}else{
		$_SESSION["notificacion"] = "Error al cerrar sesion.";
		header("Location:../index.php");
	}
?>