<?php
    //pagina non utilizzata in questo progetto. Prego ignorare il file.
	include_once(__DIR__."/includes/own/php/all_php.php");
	
	$specializzazione = intval($_GET["q"]);
	
	$query = "SELECT ID_Classe FROM Classi, Specializzazioni
			  WHERE Classi.ID_Specializzazione = Specializzazioni.ID_Specializzazione AND
					Specializzazioni.ID_Specializzazione = $specializzazione";
	$result = $conn->query($query);
	
	while($row = $result->fetch_assoc()){
		echo "<option value=".$row["ID_Classe"].">".$row["ID_Classe"]."</option>";
	}