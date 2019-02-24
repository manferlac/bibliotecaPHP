<?php
	session_start();
	print_r($_SESSION);	
	printf("Ha ocurriendo un error(%s) <br/> Descipci&oacute;n: %s",$_SESSION["errorno"],$_SESSION["error"]);
?>