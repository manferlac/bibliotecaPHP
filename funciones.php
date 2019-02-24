<?php
	function cerrarSession(){
		session_unset();
		session_destroy();
	}
	function limpiarSession(){
		session_unset();	
	}
	
	function variablesSesion(){
		print_r($_SESSION);	
	}
	
	function accesoDenegado(){
	$_SESSION["notificacion"] = "Acceso Denegado.<br/>Sesion no iniciada, recuerda iniciar sesion para poder acceder al sistema de gestion.";	
	header("Location:index.php");
	}
	function limpiarSesionPrestamo(){
		if(isset($_SESSION["libroPrestamo"]))
			unset($_SESSION["libroPrestamo"]);
		if(isset($_SESSION["prestamo"]))
			unset($_SESSION["prestamo"]);
		if(isset($_SESSION["duracion"]))
			unset($_SESSION["duracion"]);
		if(isset($_SESSION["lectorPrestamo"]))
			unset($_SESSION["lectorPrestamo"]);
		
	}
?>