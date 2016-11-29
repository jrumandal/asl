<?php
    include_once(__DIR__."/includes/own/php/all_php.php");
?>
<html>
<body>
<?php 
	if(isset($_GET["professore"])){
		$ins_matricola = $_GET["professore"];
		$result = $conn->query("SELECT s.id_stage, ea.nome, tutoraziendale, attivitasettore
								FROM stage as s, entiaziende as ea
								WHERE s.ID_EnteAzienda = ea.id_enteazienda AND matricolatutorinterno = '$ins_matricola'");

        if($result->num_rows ==0)
            echo "<option>L'insegnante non è assegnata ad alcuna azienda.</option>";
		foreach($result as $record){?>
			<option value="<?=$record["id_stage"]?>">
			    <?=$record["nome"]?> - <?=$record["attivitasettore"]?> - <?=$record["tutoraziendale"]?>
            </option>
		<?php
        }
    }elseif(isset($_GET["id_specializzazione"])){
		$result = $conn->query("SELECT *
                                FROM classi
                                WHERE classi.ID_Specializzazione = ".$_GET["id_specializzazione"]);
		foreach($result as $record){?>
			<option value="<?=$record["ID_Classe"]?>">
			    <?=$record["ID_Classe"]?>
            </option>
        <?php
        }
    }elseif(isset($_GET["id_azienda"])){
		$id_azienda = $_GET["id_azienda"];
		$result = $conn->query("SELECT id_stage, datainizio, datafine
                                FROM informazionistage
                                WHERE id_azienda = $id_azienda");
		foreach($result as $record){?>
			<option value="<?=$record["id_stage"]?>">
			    <?=$record["datainizio"]?> - <?=$record["datafine"]?>
            </option>
		<?php
        }
		
	}elseif(isset($_GET["classe"])){
		$id_classe = $_GET["classe"];
		$result = $conn->query("SELECT 	insegnanti.matricola, nome, cognome
								FROM 	insegnanti, insegna
								WHERE 	insegnanti.Matricola = insegna.Matricola AND
										insegna.id_classe = '$id_classe'");
		foreach($result as $record){?>
			<option value="<?=$record["matricola"]?>"><?=$record["nome"] ." ". $record["cognome"]?></option>
		<?php
        }
		
	}elseif(isset($_GET["classe2"])){
		$id_classe = $_GET["classe2"];
		$result = $conn->query("SELECT 	stud.matricola, stud.nome, stud.cognome
								FROM 	studenti as stud, iscritto as i
								WHERE 	stud.matricola = i.matricola AND
										i.id_classe = '$id_classe'");

		foreach($result as $record){?>
			<option value="<?=$record["matricola"]?>"><?=$record["nome"] ." ". $record["cognome"]?></option>
		<?php
        }
		
		//riempimento degli studenti in amministrazione, solo studenti liberi e disponibili
	}elseif(isset($_GET["classe3"])){
		$id_classe = $_GET["classe3"];

		$result = $conn->query("select  stud.Matricola, stud.Cognome, stud.Nome
                                from    studenti as stud, iscritto as i
                                where   stud.Matricola = i.Matricola AND
                                        i.id_classe = '$id_classe' AND
                                        stud.Matricola not in
                                            (
                                            select stud.Matricola
                                            from studenti as stud
                                            left join partecipa
                                            on stud.Matricola = partecipa.Matricola
                                            where now() < partecipa.DataFine or partecipa.DataInizio = null
                                            )"
                                );

        if($result->num_rows==0)
            echo "<option>Non ci sono studenti disponibili</option>";
		foreach($result as $record){?>
			<option value="<?=$record["Matricola"]?>"><?=$record["Cognome"]." ".$record["Nome"]?></option>
		<?php
        }
	}
	?>
</body>
</html>