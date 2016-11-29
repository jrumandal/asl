<?php
include_once(__DIR__."/includes/own/php/all_php.php");
if(isset($_GET["id_stage"])){
	$id_stage = $_GET["id_stage"];

	$result = $conn->query("SELECT attivita FROM InformazioniStage WHERE id_stage = $id_stage GROUP BY id_stage");
	$record = $result->fetch_assoc();
	echo $record["attivita"];
}elseif(isset($_GET["id_stage2"])){
	$id_stage = $_GET["id_stage2"];

	$result = $conn->query("SELECT ins_nome, ins_cognome FROM InformazioniStage WHERE id_stage = $id_stage GROUP BY id_stage");
	$record = $result->fetch_assoc();
	echo $record["ins_nome"] . " " . $record["ins_cognome"];
}elseif(isset($_GET["id_stage3"])){
	$id_stage = $_GET["id_stage3"];

	$result = $conn->query("SELECT tutoraziendale FROM InformazioniStage WHERE id_stage = $id_stage GROUP BY id_stage");
	$record = $result->fetch_assoc();
	echo $record["tutoraziendale"];
}