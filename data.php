<?php

		require_once("functions.php");
	
	//Kontrollin kas kasutaja on sisse loginud
	if(!isset($_SESSION["id_from_db"])){
		header("Location: login_sample.php");
		
		
		
	}
	//aadressireal on ?logout=?
	if(isset($_GET["logout"])){
		session_destroy();
		header("Location: login_sample.php");
		
	}

?>

<p>
	Tere, <?=$_SESSION["user_email"]; ?>
	<a href="?logout=1">Logi väljalja</a>
</p>