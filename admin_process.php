<?php
	include_once(__DIR__."/includes/own/php/all_php.php");
	session_start();
	if(isset($_SESSION["login"])){
		if($_SESSION["login"]["rango"]=="Amministratore"){
			// se admin preme creazione dello stage
			if(isset($_POST["create-stage-submit"])){
				$id_specializzazione = $_POST["id_specializzazione"];
				$id_classe = $_POST["classe"];
				$ins_matricola = $_POST["professore"];
				$attivita = $_POST["attivita"];
				$id_azienda = $_POST["azienda"];
				$tutoraziendale = $_POST["tutoraziendale"];

				
				//creazione dello stage
				$stmt = $conn->prepare("INSERT INTO stage(ID_EnteAzienda,AttivitaSettore,MatricolaTutorInterno,TutorAziendale)
								VALUES(?,?,?,?)");
				$stmt->bind_param("isis",$id_azienda,$attivita,$ins_matricola,$tutoraziendale);
				
				$stmt->execute();
				
				$GLOBALS["msg"] = "<div class=\"success\">Stage inizializzato con successo</div>";

				// se admin preme aggiunta di studenti nello stage
			}elseif(isset($_POST["add-studente-submit"])){
				$stud_matricola = $_POST["studente"];
				$id_stage = $_POST["stage"];
				$datainizio = date("Y-m-d",strtotime($_POST["datainizio"]));
				$datafine = date("Y-m-d",strtotime($_POST["datafine"]));
				
				echo $stud_matricola.$id_stage.$datainizio.$datafine;
				$query = "INSERT INTO partecipa(Matricola, ID_Stage, DataInizio, DataFine)
				VALUES($stud_matricola,$id_stage,'$datainizio','$datafine')";
				
				echo var_dump($conn->query($query));
				

				$GLOBALS["msg"] = "<div class=\"success\">Studente inserito con successo</div>";

			}
            header('location: '.$base_url.'home.php');
		}else{
			$GLOBALS["msg"] ="<div class=\"danger\">Non hai i permetti adatti per inserire un nuovo stage</div>";
        }
        header('location: '.$base_url.'home.php');
	}else{
		header('location: '.$base_url.'home.php');
	}
	