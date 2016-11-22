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
		$result = $conn->query("SELECT * FROM classi WHERE classi.ID_Specializzazione = ".$_GET["id_specializzazione"]);
		while($record = $result->fetch_assoc()){
			echo "<option value=".$record["ID_Classe"].">".$record["ID_Classe"]."</option>";
		}
		
	}elseif(isset($_GET["id_azienda"])){
		$id_azienda = $_GET["id_azienda"];
		$result = $conn->query("SELECT id_stage, datainizio, datafine FROM informazionistage WHERE id_azienda = $id_azienda");
		while($record = $result->fetch_assoc()){
			echo "<option value=".$record["id_stage"].">".$record["datainizio"] . " - ".$record["datafine"]."</option>";
		}
		
	}elseif(isset($_GET["classe"])){
		$id_classe = $_GET["classe"];
		$result = $conn->query("SELECT 	insegnanti.matricola, nome, cognome
								FROM 	insegnanti, insegna
								WHERE 	insegnanti.Matricola = insegna.Matricola AND
										insegna.id_classe = '$id_classe'");
		while($record = $result->fetch_assoc()){
			echo "<option value=".$record["matricola"].">".$record["nome"] . " ".$record["cognome"]."</option>";
		}
		
	}elseif(isset($_GET["classe2"])){
		$id_classe = $_GET["classe2"];
		$result = $conn->query("SELECT 	stud.matricola, stud.nome, stud.cognome
								FROM 	studenti as stud, iscritto as i
								WHERE 	stud.matricola = i.matricola AND
										i.id_classe = '$id_classe'");
		while($record = $result->fetch_assoc()){
			echo "<option value=".$record["matricola"].">".$record["nome"] . " ".$record["cognome"]."</option>";
		}
		
		//riempimento degli studenti in amministrazione, solo studenti liberi e disponibili
	}elseif(isset($_GET["classe3"])){
		$id_classe = $_GET["classe3"];
		
		$result = $conn->query("SELECT 	DISTINCT *
								FROM 
									(	SELECT stud.matricola, stud.nome, stud.cognome, i.id_classe
										FROM studenti as stud, Iscritto as i
										WHERE stud.matricola = i.matricola AND i.id_classe = '$id_classe') as r
								LEFT JOIN partecipa as p
								ON p.matricola = r.matricola
								WHERE p.matricola IS NULL OR now() > p.datafine
								GROUP BY r.matricola
								ORDER BY r.cognome, r.nome
				");
		while($record = $result->fetch_assoc()){
			echo "<option value=".$record["matricola"].">".$record["cognome"] . " ".$record["nome"]."</option>";
		}
	}
	?>
</body>
</html>