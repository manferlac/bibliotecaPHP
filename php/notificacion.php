<?php
if(isset($_SESSION["notificacion"])){
	printf("<div class='notificacion'>%s</div>",$_SESSION["notificacion"]);
	$_SESSION["notificacion"]="";
}
?>