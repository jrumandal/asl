<?php
	session_start();
	if(isset($_SESSION["login"])){
		unset($_SESSION["login"]);
		session_destroy();
	}
	$msg = "<div class='success'>Disconnesso con successo</div>";
	header("Location: index.php");