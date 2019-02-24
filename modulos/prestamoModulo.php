<?php

	include "../conexion/conexion.inc";
	include "../clases/Prestamo.php";
	include "../clases/Varios.php";
	include "../clases/Libro.php";
	include "../clases/Lector.php";
	include "../funciones.php";
	session_start();
	include "../conexion/conexion.php";
	$libro = new Libro($_REQUEST["registro"]);
	if($libro->buscar($mysqli)){	
		$Prestamo = new Prestamo($_REQUEST["registro"],"","");
		if($Prestamo->buscar($mysqli)){
			$_SESSION["libroPrestamo"] =$libro ;
			$_SESSION["prestamo"] = $Prestamo;
			$lector = new Lector($_SESSION["prestamo"]->getCod_Lector());
			$lector->buscar($mysqli);
			$_SESSION["lectorPrestamo"] =$lector;
			$duracion = new Varios();
			$duracion->buscar($mysqli);
			$_SESSION["duracion"] =$duracion;
			header("Location:../prestamoExistente.php");
		}else{
			$_SESSION["libroPrestamo"] =$libro ;
			$_SESSION["prestamo"] = $Prestamo;
			header("Location:../prestamoNuevo.php");
		}
	}else{
		$_SESSION["notificacion"] ="No exixte el libro" ;
		header("Location:../prestamos.php");
	}
	require "../conexion/cerrarConexion.php";
?>