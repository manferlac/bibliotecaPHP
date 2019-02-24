<?php
	include "conexion/conexion.inc";
	include "clases/Libro.php";
	include "clases/Usuario.php";
	include "funciones.php";
	session_start();


	if(isset($_SESSION["autentificado"]) && $_SESSION["autentificado"]){
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
                <form name="listadoLibros" method="post" action="">
                    <select name="accion">
                    	<option value="todos">Todos</option>
                        <option value="especifico">Especifico</option>
                    </select>
                    <label>Desde</label><input type="text" name="desde" />
                    <label>Hasta</label><input type="text" name="hasta" />
                    <input type="submit" value="Consultar" />
                   	<fieldset> 
                   	<legend>Listado de libros</legend>
                 
    				<table border='1' width="85%" align="center">

                        <tr>
                        	<td><label class="label">Nº Registro</label></td>
                        	<td><label class="label">Titulo</label></td>
                            <td><label class="label">Autor</label></td> 
                        </tr>
                        <?php
							require "conexion/conexion.php";
							if(isset($_REQUEST["accion"]) && $_REQUEST["accion"]=="todos")
                        		Libro::listadoCompleto($mysqli);
							if(isset($_REQUEST["accion"]) && $_REQUEST["accion"]=="especifico")
                        		Libro::listadoEspecifico($mysqli,$_REQUEST["desde"],$_REQUEST["hasta"]);
						?>
                    </table>
					
                    </fieldset>
                </form>
        	</div>
        </div>
 		<div class="pie">		<?php require "pie.php" ?></div>
    </div>
</body>
</html>
<?php
	}else{
	accesoDenegado();
	}
?>