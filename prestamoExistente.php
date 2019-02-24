<?php
	include "funciones.php";
	include "clases/Usuario.php";
	include "clases/Libro.php";
	include "clases/Lector.php";
	include "clases/Varios.php";
	include "clases/Prestamo.php";
	session_start();

	if(isset($_SESSION["autentificado"]) && $_SESSION["autentificado"] ){
		if(isset($_SESSION["libroPrestamo"]) && isset($_SESSION["lectorPrestamo"])){
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/img/favicon.gif" rel="shortcut icon" />
<link rel="stylesheet" type="text/css" href="css/principal.css" />
<link rel="stylesheet" type="text/css" href="css/menu.css" />
<link rel="stylesheet" type="text/css" href="css/formulario.css" />
<title>Biblioteca</title>
</head>
<body>
	<div class="general">
    	<div class="cabezera"></div>
        <div class="cuerpo" style="heigh=350px">

                       	<!-- MENU -->
             <?php require "menu.html"; ?>
            <!-- FIN MENU -->
            <div class="formulario">
                <form name="altalibro" method="post" action="modulos/bajaPrestamoModulo.php">
                    <fieldset> 
                   <legend>Prestamos</legend>
                 
    				<table>
                    <tr>
                        	<td colspan="3"><?php require "notificacion.php" ?></td>
                        </tr>
                        <tr>
                        	<td><label class="label">Registro</label></td><td><input class="texto" type="text" disabled="disabled" name="registro" value="<?php if(isset($_SESSION["prestamo"])) echo $_SESSION["prestamo"]->getRegistro();?>"/>
                            	
                            </td>
                            	<td rowspan="7" ><img src="css/img/prestamo.png" /></td>
                        </tr>
                        <tr>
                        	<td><label class="label">T.libro</label></td><td><input class="texto" disabled="disabled" type="text" name="titulo" value="<?php if(isset($_SESSION["libroPrestamo"])) echo $_SESSION["libroPrestamo"]->getTitulo();?>"/></td>
                        </tr>
                                                                        <tr>
                        	<td><label class="label">Id Lector</label></td><td><input class="texto" disabled="disabled" type="text" name="cod_lector" value="<?php if(isset($_SESSION["lectorPrestamo"])) echo $_SESSION["lectorPrestamo"]->getCod_Lector();?>"/>
                            </td>
                        </tr>
                        <tr>
                        	<td><label class="label">Lector</label></td><td><input class="texto" disabled="disabled" type="text" name="lector" value="<?php if(isset($_SESSION["lectorPrestamo"])) echo $_SESSION["lectorPrestamo"]->getNombre();?>"/>
                           
                            </td>
                        </tr>
                        <tr>
                        	<td><label class="label">Fecha</label></td><td><input disabled="disabled" class="texto" type="text"  value="<?php if(isset($_SESSION["prestamo"])) echo $_SESSION["prestamo"]->getFecha();?>" name="fecha"/></td>
                        </tr>
                                                <tr>
                        	<td><label class="label">Aumento predefinido en dias:</label></td><td><input disabled="disabled" class="texto" type="text"  value="<?php if(isset($_SESSION["duracion"])) echo $_SESSION["duracion"]->getDuracion_Prestamo();?>" name="fecha"/></td>
                        </tr>
                        <tr>
                        	<td colspan="3">
                            	<input class="botones" type="submit" name="eliminar" value="Eliminar" style="width:120px;" />
                                <input class="botones" type="submit" name="duracion" value="Renovar" style="width:150px;" />
                               
                               
                            </td>
                        </tr>
                    </table>

                    </fieldset>
                </form>
        	</div>
        </div>
 	<div class="pie">
        <?php require "pie.php" ?></div>
    </div>
</body>
</html>
<?php
		}else{
			header("Location:../prestamos.php");
		}
	}else{
	accesoDenegado();
	}
?>
