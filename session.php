<?php
	// RIPRENDO SESSIONE o INIZIALIZZA
	session_start();
	
	// SE ESISTE UNA ACCOUNT IN SESSIONE, VUOL DIRE CHE C'E' UN COLLEGAMENTO.
	if(isset($_SESSION["login_user"])){
		$login_user = $_SESSION["login_user"];
		$login_rango = $_SESSION["login_rango"];
		
		require 'conn_sql.php';
	
		// INTERROGO IL DATABASE PER RIPRENDERE IL RANGO DELL'ACCOUNT
		/*
		 $query =   "SELECT 	Ranghi.Nome
					FROM	Accounting, Ranghi
					WHERE 	Accounting.ID_Rango = Ranghi.ID_Rango
					AND		Accounting.User = $login_user"; 
		 
		
		// ESEGUO QUERY
		$result = $conn->query($query);
		
		// ESTRAGGO RISULTATO
		$row = $result->fetch_alloc();
		
		$login_rango = $row["Nome"];
		
		$query = "SELECT * FROM $accouting WHERE $accounting.User = $login_user";
		*/
		
		switch($login_rango){
			case "Studente":
				break;
			case "Professore":
				break;
			case "Azienda":
				break;
			case "Amministratore":
				break;
		}
		
	}