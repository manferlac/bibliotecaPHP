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
	if(isset($_REQUEST["eliminar"])){
		if($_SESSION["prestamo"]->borrar($mysqli)){

			$estadistica = new Estadistica($_SESSION["prestamo"]->getRegistro(),$_SESSION["prestamo"]->getCod_Lector(),$_SESSION["prestamo"]->getFecha(),date("Y-m-j"));
			$estadistica->actualizar($mysqli);
			$_SESSION["notificacion"] ="Prestamo borrado correctamente.Estadisticas actualizadas.";
			limpiarSesionPrestamo();
			header("Location:../prestamos.php");
		}else{
			$_SESSION["notificacion"] ="No ha sido posible borrar el prestamo." ;
			header("Location:../prestamoNuevo2.php");
		}
	}else{
		$duracion = new Varios();
		$duracion->buscar($mysqli);
		$fechadevolucion = strtotime ( "+".$duracion->getDuracion_Prestamo()." day" , strtotime ( $_SESSION["prestamo"]->getFecha()));
		$fechadevolucion = date ( 'Y-m-j' , $fechadevolucion );
			$estadistica = new Estadistica($_SESSION["prestamo"]->getRegistro(),$_SESSION["prestamo"]->getCod_Lector(),$_SESSION["prestamo"]->getFecha(),$fechadevolucion);
		if($estadistica->actualizar($mysqli)){
			$_SESSION["notificacion"] ="Prestamo modificado correctamente.Estadisticas actualizadas.";
			limpiarSesionPrestamo();
			header("Location:../prestamos.php");
		}else{
			$_SESSION["notificacion"] ="No ha sido posible modificado el prestamo.".$mysqli->error ;
			header("Location:../prestamoNuevo2.php");
		}		
	}
	require "../conexion/cerrarConexion.php";
?>