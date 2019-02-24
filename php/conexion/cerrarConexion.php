<?php
	if(!$mysqli->close()){
		$_SESSION["errorno"] = $mysqli->connect_errno;
		$_SESSION["error"] = $mysqli->connect_error;
		header("Location:../error.php");	
	}
?>