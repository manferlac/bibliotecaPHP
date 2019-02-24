<?php
	include "clases/Usuario.php";
	include "clases/Lector.php";
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
                <form name="altalibro" method="post" action="modulos/consultarLectorModulo.php">
                    <fieldset> 
                   <legend>Consulta de lector</legend>
                 
    				<table>
                                            <tr>
                        	<td colspan="3"><?php require "notificacion.php" ?></td>
                        </tr>
                                                <tr>
                       		<td><label class="label">Id Lector</label></td><td><input class="texto" type="text" name="co_lector" value="<?php if(isset($_SESSION["lector"]) && $_SESSION["lector"]!="" )  echo $_SESSION["lector"]->getCod_Lector();?>"/></td>
                        </tr>
                        <tr>
                        	<td><label class="label">Nombre</label></td><td><input class="texto" type="text" name="nombre" disabled="disabled" value="<?php if(isset($_SESSION["lector"]) && $_SESSION["lector"]!="" )  echo $_SESSION["lector"]->getNombre();?>"/></td>
                            	<td rowspan="7" ><a href="consultarLectorModulo.php"><img  height="220px" src="css/img/busqueda.png" /></a></td>
                        </tr>
                        <tr>
                        	<td><label class="label">Apellidos</label></td><td><input class="texto" disabled="disabled" type="text" name="apellidos" value="<?php if(isset($_SESSION["lector"]) && $_SESSION["lector"]!="" )  echo $_SESSION["lector"]->getApellidos();?>"/></td>
                        </tr>
                        <tr>
                        	<td><label class="label">Direccion</label></td><td><input class="texto" disabled="disabled" type="text" name="direccion" value="<?php if(isset($_SESSION["lector"]) && $_SESSION["lector"]!="" )  echo $_SESSION["lector"]->getDireccion();?>"/></td>
                        </tr>
                        <tr>
                        	<td><label class="label">C.Postal</label></td><td><input class="texto" disabled="disabled" type="text" name="cpostal" value="<?php if(isset($_SESSION["lector"]) && $_SESSION["lector"]!="" )  echo $_SESSION["lector"]->getCPostal();?>"/></td>
                        </tr>
                        <tr>
                        	<td><label class="label">Localidad</label></td><td><input class="texto" disabled="disabled" type="text" name="localidad"  value="<?php if(isset($_SESSION["lector"]) && $_SESSION["lector"]!="" )  echo $_SESSION["lector"]->getLocalidad();?>"/></td>
                        </tr>
                        <tr>
                        	<td><label class="label">Provincia</label></td><td><input class="texto" disabled="disabled" type="text" name="provincia" value="<?php if(isset($_SESSION["lector"]) && $_SESSION["lector"]!="" )  echo $_SESSION["lector"]->getProvincia();?>"/></td>
                        </tr>
                        <tr>
                       		<td><label class="label">Telefono</label></td><td><input class="texto" disabled="disabled" type="text" name="telefono" value="<?php if(isset($_SESSION["lector"]) && $_SESSION["lector"]!="" )  echo $_SESSION["lector"]->getTelefono();?>"/></td>
                        </tr>
                                                                        <tr>
                       		<td><label class="label">Email</label></td><td><input class="texto" disabled="disabled" type="text" name="email" value="<?php if(isset($_SESSION["lector"]) && $_SESSION["lector"]!="" )  echo $_SESSION["lector"]->getEmail();?>"/></td>
                        </tr>
                        <tr>
                        	<td colspan="3">
                            	<input class="botones" type="submit" name="enviar" value="Consultar" />
                                <input class="botones" type="reset" name="limpiar" value="Limpiar Campos" />
                            </td>
                        </tr>
                    </table>

                    </fieldset>
                </form>
        	</div>
        </div>
 		<div class="pie">
			<?php require "pie.php";
				if(isset($_SESSION["lector"]))
					$_SESSION["lector"]="";
			 ?></div>
    	</div>
</body>
</html>
<?php
	}else{
		accesoDenegado();
	}
?>