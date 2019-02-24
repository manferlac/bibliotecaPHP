<?php

	include "../conexion/conexion.inc";
	include "../clases/Prestamo.php";
	include "../clases/Libro.php";
	include "../clases/Lector.php";
	include "../clases/Varios.php";
	include "../clases/Estadistica.php";
	include "../funciones.php";
	session_start();
	include "../conexion/conexion.php";

	if($_SESSION["prestamo"]->insertar($mysqli)){
		$duracion = new Varios();
		$duracion->buscar($mysqli);
		$fechadevolucion = strtotime ( "+".$duracion->getDuracion_Prestamo()." day" , strtotime ( $_SESSION["prestamo"]->getFecha()));
		$fechadevolucion = date ( 'Y-m-j' , $fechadevolucion );
		$estadistica = new Estadistica($_SESSION["prestamo"]->getRegistro(),$_SESSION["prestamo"]->getCod_Lector(),$_SESSION["prestamo"]->getFecha(),$fechadevolucion);
		$estadistica->insertar($mysqli);
		$_SESSION["notificacion"] ="Prestamo insertado correctamente";
		limpiarSesionPrestamo();
		header("Location:../prestamos.php");
	}else{
		$_SESSION["notificacion"] ="No ha sido posible insertar el prestamo".$mysqli->error ;
		header("Location:../prestamoNuevo2.php");
	}
	require "../conexion/cerrarConexion.php";
?>