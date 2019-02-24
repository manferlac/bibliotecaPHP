<?php

	include "../conexion/conexion.inc";
	include "../clases/Usuario.php";
	include "../funciones.php";
	session_start();
	require "../conexion/conexion.php";
	
	$usuario = new Usuario($_SESSION["usuario"]);
	if($_REQUEST["password"]==$_REQUEST["rpassword"]){
		if($usuario->cambiarPassword($mysqli,$_REQUEST["password"]))
			$_SESSION["notificacion"] = "Contraseña cambiada satisfactoriamente.";
		else{
			$_SESSION["errorno"] = $mysqli->connect_errno;
			$_SESSION["error"] = $mysqli->connect_error;
			header("Location:../error.php");
		}
	}else{
		$_SESSION["notificacion"] ="Error, las contraseñas no coinciden.";
	}
	header("Location:../password.php");
	
	if(!$mysqli->close()){
		$_SESSION["errorno"] = $mysqli->connect_errno;
		$_SESSION["error"] = $mysqli->connect_error;
		header("Location:../error.php");	
	}
?>