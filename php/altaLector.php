<?php
	include "funciones.php";
	include "clases/Usuario.php";
	include "clases/Lector.php";
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
                <form name="altaLector" method="post" action="modulos/altaLectorModulo.php">
                    <fieldset> 
                   <legend>Alta de lector</legend>
                 
    				<table>
                        <tr>
                        	<td colspan="3"><?php require "notificacion.php" ?></td>
                        </tr>
                        <tr>
                        	<td><label class="label">Nombre</label></td><td><input class="texto" type="text" name="nombre"/></td>
                            	<td rowspan="7" ><img  height="220px" src="css/img/altalector.png" /></td>
                        </tr>
                        <tr>
                        	<td><label class="label">Apellidos</label></td><td><input class="texto" type="text" name="apellidos"/></td>
                        </tr>
                        <tr>
                        	<td><label class="label">Direccion</label></td><td><input class="texto" type="text" name="direccion"/></td>
                        </tr>
                        <tr>
                        	<td><label class="label">C.Postal</label></td><td><input class="texto" type="text" name="cpostal"/></td>
                        </tr>
                        <tr>
                        	<td><label class="label">Localidad</label></td><td><input class="texto" type="text" name="localidad"/></td>
                        </tr>
                        <tr>
                        	<td><label class="label">Provincia</label></td><td><input class="texto" type="text" name="provincia"/></td>
                        </tr>
                        <tr>
                       		<td><label class="label">Telefono</label></td><td><input class="texto" type="text" name="telefono"/></td>
                        </tr>
                        <tr>
                       		<td><label class="label">Email</label></td><td><input class="texto" type="text" name="email"/></td>
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