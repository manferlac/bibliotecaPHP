<?php
	include "funciones.php";
	include "clases/Usuario.php";
	include "clases/Prestamo.php";
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
                <form name="altalibro" method="post" action="modulos/prestamoModulo.php">
                    <fieldset> 
                   <legend>Prestamos</legend>
                 
    				<table>
                    <tr>
                        	<td colspan="3"><?php require "notificacion.php" ?></td>
                        </tr>
                        <tr>
                        	<td><label class="label">Registro</label></td><td><input class="texto" type="text" name="registro"/>
                            	
                            </td>
                            	<td rowspan="7" ><img src="css/img/prestamo.png" /></td>
                        </tr>
                        <tr>
                        	<td><label class="label">T.libro</label></td><td><input disabled="disabled" class="texto" type="text" name="titulo"/></td>
                        </tr>
                                                <tr>
                        	<td><label class="label">Id Lector</label></td><td><input disabled="disabled" class="texto" type="text" name="cod_lector"/>
                            </td>
                        </tr>
                        <tr>
                        	<td><label class="label">Lector</label></td><td><input disabled="disabled" class="texto" type="text" name="lector"/>
                            </td>
                        </tr>
                        <tr>
                        	<td><label class="label">Fecha</label></td><td><input class="texto" disabled="disabled" type="text" name="fecha" value="<?php echo date("Y-m-j") ?>"/></td>
                        </tr>
                        <tr>
                        	<td colspan="4">
                            	<input class="botones" type="submit" name="enviar" value="Consultar" style="width:120px;" />
                                <input class="botones" type="reset" name="limpiar" value="Limpiar Campos"style="width:120px;" />
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
	accesoDenegado();
	}
?>
