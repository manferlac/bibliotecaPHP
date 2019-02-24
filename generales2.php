<?php
	include "conexion/conexion.inc";
	include "clases/Estadistica.php";
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
                <form name="porLector" method="post" action="#">
                    <fieldset> 
                   <legend>Estadisticas generales por lector</legend>
                
                    <table>
                    <tr>
                        	<td colspan="3"><?php require "notificacion.php" ?></td>
                        </tr>
                        <tr>
                        	<table border='1'  align="center">
                            	<tr>
                                	<td>Nombre</td><td>Numero de prestamos</td>								
                                </tr>
                                <tr>
                                <?php
									require "conexion/conexion.php";
										Estadistica::porLectorGenerales($mysqli);	
										
									echo $mysqli->error;
								?>
                                </tr>
							</table>
                        </tr>
                          
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