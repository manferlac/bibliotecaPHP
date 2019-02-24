<?php
	include "funciones.php";
	include "clases/Usuario.php";
	include "clases/Libro.php";
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
                <form name="altalibro" method="post" action="modulos/altaLibroModulo.php">
                    <fieldset> 
                   <legend>Alta de libros</legend>
                 
    				<table>
                        <tr>
                        	<td colspan="3"><?php require "notificacion.php" ?></td>
                        </tr>
                        <tr>
                        	<td><label class="label">CDU</label></td><td><input class="texto" type="text" name="cdu"/></td>
                            	<td rowspan="7" ><img height="230px" src="css/img/altalibro.png" /></td>
                        </tr>
                        <tr>
                        	<td><label class="label">Titulo</label></td><td><input class="texto" type="text" name="titulo"/></td>
                        </tr>
                        <tr>
                        	<td><label class="label">Autor</label></td><td><input class="texto" type="text" name="autor"/></td>
                        </tr>
                        <tr>
                        	<td><label class="label">Editorial</label></td><td><input class="texto" type="text" name="editorial"/></td>
                        </tr>
                        <tr>
                        	<td><label class="label">Localizacion</label></td><td><input class="texto" type="text" name="localizacion"/></td>
                        </tr>
                        <tr>
                        	<td><label class="label">Estanteria</label></td><td><input class="texto" type="text" name="estanteria"/></td>
                        </tr>
                        <tr>
                       		<td><label class="label">Balda</label></td><td><input class="texto" type="text" name="balda"/></td>
                        </tr>
                        <tr>
                        	<td colspan="3">
                            	<input class="botones" type="submit" name="enviar" value="Dar Alta" />
                                <input class="botones" type="reset" name="limpiar" value="Limpiar Campos" />
                            </td>
                        </tr>
                    </table>

                    </fieldset>
                </form>
        	</div>
        </div>
 		<div class="pie">
       		<?php require "pie.php" ?>
        </div>
    </div>
</body>
</html>
<?php
	}else{
	accesoDenegado();
	}
?>