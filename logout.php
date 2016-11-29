<?php
    include_once(__DIR__."/includes/own/php/all_php.php");

	session_start();
	if(isset($_SESSION["login"])){
		unset($_SESSION["login"]);
		session_destroy();
	}
	$msg = "<div class='success'>Disconnesso con successo</div>";
	header("Location:".$baseurl." index.php");