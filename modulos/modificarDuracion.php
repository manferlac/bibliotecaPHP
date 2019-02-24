<?php
	include "../conexion/conexion.inc";
	include "../clases/Varios.php";
	session_start();
	require "../conexion/conexion.php";

	$duracion = new Varios();
	$duracion->setDuracion_Prestamo($_REQUEST["duracion"]);
		if($duracion->actualizar($mysqli))
			$_SESSION["notificacion"] = "Duracion modificada satisfactoriamente.";
		else
			$_SESSION["notificacion"] = "Error al modificar la duracion de un prestamo.";
		
	header("Location:../duracion.php");
	
	require "../conexion/cerrarConexion.php";
?>