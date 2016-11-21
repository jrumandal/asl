<?php
	if(isset($_POST["btn-statistic"])){
		header("Location: statistics.php");
		exit;
	}elseif(isset($_POST["btn-votazione"])){
		header("Location: new_question.php");
		exit;
	}elseif(isset($_POST["btn-nuovo-stage"])){
		header("Location: nuovo_stage.php");
		exit;
	}elseif(isset($_POST["btn-add-studente"])){
		header("Location: aggiungi_studente.php");
		exit;
	}