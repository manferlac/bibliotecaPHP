<?php
	include "funciones.php";
	include "clases/usuario.php";
	session_start();
	
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
            	
                <form name="login" method="POST" action="modulos/loginModulo.php">
                    <fieldset> 
                   <legend>Logeo</legend>
    				<table>
                    	<tr>
                        	<td colspan="3"><?php require "notificacion.php" ?></td>
                        </tr>
                        <tr>
                        	<td><label class="label">Usuario</label></td><td><input class="texto" type="text" value="usuario" name="usuario"/></td>
                            	<td rowspan="7" ><img height="200px" src="css/img/index.png" /></td>
                        </tr>
                        <tr>
                        	<td><label class="label">Password</label></td><td><input class="texto" type="password" value="clave" name="clave"/></td>
                        </tr>                   
                        <tr>
                        	<td colspan="3">
                            	<input class="botones" type="submit" name="enviar" value="Entrar" />
                                <input class="botones" type="reset" name="limpiar" value="Limpiar Campos" />
                            </td>
                        </tr>
                    </table>

                    </fieldset>
                </form>
        	</div>
        </div>
 		<div class="pie">
        <?php
			include "pie.php";
		?>
        </div>
    </div>
</body>
</html>