<html>
<body>
<?php
	require 'connection.php';
	
	if(isset($_GET["professore"])){
		$ins_matricola = $_GET["professore"];
		$result = $conn->query("SELECT s.id_stage, ea.nome, tutoraziendale, attivitasettore
								FROM stage as s, entiaziende as ea
								WHERE s.ID_EnteAzienda = ea.id_enteazienda AND matricolatutorinterno = '$ins_matricola'");
		
		while($record = $result->fetch_assoc()){
			echo "<option value=".$record["id_stage"].">".$record["nome"]."-".
			$record["attivitasettore"]."-".
			$record["tutoraziendale"]."</option>";
		}

	}elseif(isset($_GET["id_specializzazione"])){
		$result = $conn->query("SELECT * FROM Classi WHERE Classi.ID_Specializzazione = ".$_GET["id_specializzazione"]);
		while($record = $result->fetch_assoc()){
			echo "<option value=".$record["ID_Classe"].">".$record["ID_Classe"]."</option>";
		}
		
	}elseif(isset($_GET["id_azienda"])){
		$id_azienda = $_GET["id_azienda"];
		$result = $conn->query("SELECT id_stage, datainizio, datafine FROM InformazioniStage WHERE id_azienda = $id_azienda");
		while($record = $result->fetch_assoc()){
			echo "<option value=".$record["id_stage"].">".$record["datainizio"] . " - ".$record["datafine"]."</option>";
		}
		
	}elseif(isset($_GET["classe"])){
		$id_classe = $_GET["classe"];
		$result = $conn->query("SELECT 	Insegnanti.matricola, nome, cognome
								FROM 	Insegnanti, Insegna
								WHERE 	Insegnanti.Matricola = Insegna.Matricola AND
										Insegna.id_classe = '$id_classe'");
		while($record = $result->fetch_assoc()){
			echo "<option value=".$record["matricola"].">".$record["nome"] . " ".$record["cognome"]."</option>";
		}
		
	}elseif(isset($_GET["classe2"])){
		$id_classe = $_GET["classe2"];
		$result = $conn->query("SELECT 	Stud.matricola, Stud.nome, Stud.cognome
								FROM 	Studenti as Stud, Iscritto as I
								WHERE 	Stud.matricola = I.matricola AND
										I.id_classe = '$id_classe'");
		while($record = $result->fetch_assoc()){
			echo "<option value=".$record["matricola"].">".$record["nome"] . " ".$record["cognome"]."</option>";
		}
		
		//riempimento degli studenti in amministrazione, solo studenti liberi e disponibili
	}elseif(isset($_GET["classe3"])){
		$id_classe = $_GET["classe3"];
		
		$result = $conn->query("SELECT 	DISTINCT *
								FROM 
									(	SELECT Stud.matricola, Stud.nome, Stud.cognome, I.id_classe 
										FROM Studenti as Stud, Iscritto as I
										WHERE Stud.matricola = I.matricola AND I.id_classe = '$id_classe') as R
								LEFT JOIN Partecipa as P
								ON P.matricola = R.matricola
								WHERE P.matricola IS NULL OR now() > P.datafine
								GROUP BY R.matricola
								ORDER BY R.cognome, R.nome
				");
		while($record = $result->fetch_assoc()){
			echo "<option value=".$record["matricola"].">".$record["cognome"] . " ".$record["nome"]."</option>";
		}
	}
	?>
</body>
</html>