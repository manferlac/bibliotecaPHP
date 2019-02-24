<?php
	include "funciones.php";
	include "clases/Usuario.php";
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

                <ul id="menu">
                
                    <li id="us">
                    
                        <a>USUARIOS</a>
                    
                        <ul id="submenu">
                        
                            <li><a href="index.php">Login</a></li>
                        
                        </ul>
                    
                    </li>
                    <li id="libro">
                    
                        <a>LIBROS</a>
                        <ul id="submenu">
                        
                            <li><a href="altaLibro.php">Altas</a></li>
                            <li><a href="bajaLibro.php">Bajas</a></li>
                            <li><a href="modificarLibro.php">Modificaciones</a></li>
                            <li><a href="consultaLibro.php">Consultas</a></li>
                        
                        </ul>
                    
                    </li>
                    <li id="lector">
                    
                        <a>LECTORES</a>
                        <ul id="submenu">
                        
                            <li><a href="altaLector.php">Altas</a></li>
                            <li><a href="bajaLector.php">Bajas</a></li>
                            <li><a href="modificarLector.php">Modificaciones</a></li>
                            <li><a href="consultarLector.php">Consultas</a></li>
                        
                        </ul>
                        
                    </li>
                    <li id="prestamo">
                    
                        <a>PRÉSTAMOS</a>
                        <ul id="submenu">
                        
                            <li><a href="prestamos.php">Prestamos</a></li>
                            <li><a href="duracion.php">Duracion del prestamo</a></li>
                        
                        </ul>
                        
                    </li>
                    <li id="est">
                    
                        <a>ESTADÍSTICAS</a>
                        <ul id="submenu">
                        
                            <li>
                            
                                <a id="asubsubmenu">LIBROS</a>
                            
                                <ul id="subsubmenu">
                                
                                    <li><a href="porLibro.php">Por libro</a></li>
                                    <li><a href="generales1.php">Generales</a></li>
                                
                                </ul>
                            
                            </li>
                            <li>
                            
                                <a id="asubsubmenu">LECTORES</a>
                                
                                <ul id="subsubmenu">
                                
                                    <li><a href="porLector.php">Por lector</a></li>
                                    <li><a href="generales2.php">Generales</a></li>
                                
                                </ul>
                            </li>
                        
                        </ul>
                    
                    </li>
                    <li id="lista">
                    
                        <a>LISTADOS</a>
                        <ul id="submenu">
                        
                            <li><a href="listadoLibros.php">Libros</a></li>
                            <li><a href="listadoPrestamos.php">Prestamos</a></li>
                        
                        </ul>
                        
                    </li>
                
                </ul>
            <div class="formulario">
                <form name="cambiarPassword" method="post" action="modulos/cambiarPassword.php">
                    <fieldset> 
                   <legend>Cambiar Password</legend>
                 
    				<table>
                                            <tr>
                        	<td colspan="3"><?php require "notificacion.php" ?></td>
                        </tr>
                        <tr>
                        	<td><label class="label">Nueva Password</label></td><td><input class="texto" type="password" name="password"/></td>
                            	<td rowspan="7" ><img height="200px" src="css/img/index.png" /></td>
                        </tr>
                        <tr>
                        	<td><label class="label">Repite Password</label></td><td><input class="texto" type="password" name="rpassword"/></td>
                        </tr>
                        <tr>
                        	<td colspan="3">
                            	<input class="botones" type="submit" name="enviar" value="Cambiar" />
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
					require "pie.php"
				?>
        </div>
    </div>
</body>
</html>
<?php
	}else{
		accesoDenegado();
	}
?>