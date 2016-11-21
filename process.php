<?php
	session_start();
	require 'connection.php';
	if(!isset($_POST["questionario-submit"])||!isset($_SESSION["login"])||!isset($_SESSION["quest"])){
		header("Location: /home.php");
		exit;
	}
?>

<!DOCTYPE HTML>
<html>
	<head>
		<?php 
			require '/essentials/head.php';
		?>
		<title>Compilazione questionario</title>
	</head>
    <body>
    	<div class="container">
    	<?php
			$matricola_studente = $_SESSION["login"]["matricola"];
			$id_stage = $_SESSION["quest"]["id_azienda"];
			$date = Date("Y-m-d");
			
			
			//INSERIMENTO DEL QUESTIONARIO
			$nuovo_quest = $conn->prepare("INSERT INTO Autovalutazioni(Matricola, DataValutazione, ID_Stage) VALUES(?,?,?)");
			$nuovo_quest->bind_param("isi", $matricola_studente, $date, $id_stage);
			$nuovo_quest->execute();
			
			//ESTRAZIONE ID DEL NUOVO QUESTIONARIO CREATO
			$result = $conn->query("SELECT 	id_autovalutazione FROM Autovalutazioni 
									WHERE 	matricola = '$matricola_studente' AND 
											id_stage = '$id_stage' AND datavalutazione = '$date'");
			$record = $result->fetch_assoc();
			$id_quest = $record["id_autovalutazione"];
			
			//calcolo del numero delle domande
			$query = "SELECT COUNT(*) AS n_domande FROM Domande";
			$result = $conn->query($query);
			$row = $result->fetch_assoc();
			//prendo il numero delle domande che sono nel database
			$n_domande = $row["n_domande"];
			
			//controllo sugli input cosicche non ci siano errori spontanei alla modifica dell'html da parte
			//dell'utente
			for($i=1; $i<=$n_domande; $i++)
				if(!isset($_POST["q$i"])){
					die("<div class=\"alert alert-danger\"><strong>Attenzione!</strong> Errore di compilazione questionario. Attendere 5secondi...</div>");
					header("refresh:3; url=new_question.php");
				}
			
			//inserimento delle domande una ad una
			for($i=1; $i<=$n_domande; $i++){
				$query = "SELECT ID_Domanda, Tipivalutazione.Tipo, Tipivalutazione.Descrizione from Tipivalutazione, Domande
							WHERE Domande.Tipo = Tipivalutazione.Tipo AND ID_Domanda = $i
							ORDER BY ID_Domanda";
				$result = $conn->query($query);
				$row = $result->fetch_assoc();
				
				$risposta = $_POST["q$i"];
				
				//preparo l'inserimento
				//se domanda chiusa
				$query_insert_chiuso = "INSERT INTO Vota(ID_Autovalutazione,ID_Domanda,Voto) VALUES(?,?,?)";
				$query_insert_aperto = "INSERT INTO Vota(ID_Autovalutazione,ID_Domanda,Risposta) VALUES(?,?,?)";
				$stmt_chiuso = $conn->prepare($query_insert_chiuso);
				$stmt_chiuso->bind_param("iii", $id_quest, $i, $risposta);
				
				$stmt_aperto = $conn->prepare($query_insert_aperto);
				$stmt_aperto->bind_param("iis", $id_quest, $i, $risposta);
				
				if($row["Tipo"]!="DA"){
					echo $stmt_chiuso->execute();
				}else{
					echo $stmt_aperto->execute();
				}
				
				
			}
			unset($_SESSION["quest"]);
			$GLOBALS["msg"]= "<div class=\"alert alert-success\"><strong>Completato!</strong> Hai completato correttamente il questionario. Attendere 5secondi...</div>";
			
			header("Location: home.php");
		?>
		</div>
	</body>
</html>