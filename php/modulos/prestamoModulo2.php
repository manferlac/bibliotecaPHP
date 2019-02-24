<?php

	include "../conexion/conexion.inc";
	include "../clases/Prestamo.php";
	include "../clases/Libro.php";
	include "../clases/Lector.php";
	include "../funciones.php";
	session_start();
	include "../conexion/conexion.php";

	$lector = new Lector($_REQUEST["cod_lector"]);
	if($lector->buscar($mysqli)){
		print_r($_SESSION);	
		$_SESSION["prestamo"]->setCod_Lector($_REQUEST["cod_lector"]);
		$_SESSION["prestamo"]->setFecha(date("Y-m-j"));
		$_SESSION["lectorPrestamo"] = $lector;
		header("Location:../prestamoNuevo2.php");
	}else{
		$_SESSION["notificacion"] ="No exixte el lector" ;
		header("Location:../prestamoNuevo.php");
	}
	require "../conexion/cerrarConexion.php";
?>