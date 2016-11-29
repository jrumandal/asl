<?php
    //aggiornamento effettuato, questo non serve piu


	//CONNESSIONE AL DATABASE
	$servername = "localhost";
	$account = "root";
	//$password = "admin";
	$password = "=RAnGLph*=1_";
	//$password = ")R4nGLph})1?";
	//$password = "AsPr1ce_";
	$db = "asl";

	//$conn = new mysqli($servername, $account, $password, $db);
	$conn = new mysqli($servername, $account, $password, $db);

	//se non stabilisce la connessione avverti
	if($conn->connect_error)
		die("<div class=\"alert alert-warning\"><strong>Attenzione!</strong> Errore di connessione al database. $conn->connect_error</div>");
    $baseurl = "https://ralphumandal.ddns.net/autoval/";