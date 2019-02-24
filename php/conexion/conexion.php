<?php
	@$mysqli = new MySQLi($servidor,$usuario,$clave,$bd);
	if($mysqli->connect_errno){
		$_SESSION["errorno"] = $mysqli->connect_errno;
		$_SESSION["error"] = $mysqli->connect_error;
		header("Location:../error.php");
	}
?>