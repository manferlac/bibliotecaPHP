<?php
if(isset($_SESSION["autentificado"]) && $_SESSION["autentificado"])
	printf("Sesion iniciada como: %s \n %s",$_SESSION["usuario"]->getUser(),"<a  href='modulos/cerrarSession.php'/>Cerrar sesion</a>");
?>