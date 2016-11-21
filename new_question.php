<?php
	session_start();
	require 'connection.php';
	
	if(isset($_SESSION["login"])){
		$result = $conn->query("SELECT id_classe FROM Iscritto, Studenti WHERE Studenti.matricola = Iscritto.matricola AND Studenti.matricola =" .$_SESSION["login"]["matricola"]. "");
		$record = $result->fetch_assoc();
		
		if(isset($_SESSION["quest"]))
			unset($_SESSION["quest"]);
	}else
		header("Loaction: index.php");
?>
<!DOCTYPE HTML>
<html>
	<head>
		<?php require '/essentials/head.php'?>
		<link rel="stylesheet" type="text/css" href="css/main.css" >
		<script>
			$(document).ready(function(){
				$("#azienda").change(		
					function(){
						$("#id_stage").prop("disabled", false);
						$("#id_stage").load("riempi.php?id_azienda="+$(this).val(),
							function(){
								$.get("riempi2.php?id_stage="+$("#id_stage").val(), function(result) {
								    $('#attivita').val(result);
								});

								$.get("riempi2.php?id_stage2="+$("#id_stage").val(), function(result) {
								    $('#professore').val(result);
								});

								$.get("riempi2.php?id_stage3="+$("#id_stage").val(), function(result) {
								    $('#tutoraziendale').val(result);
								});
							}
						);
					}
				);

				$("periodo").change(
					function(){
						$.get("riempi2.php?id_stage="+$("#id_stage").val(), function(result) {
						    $('#attivita').val(result);
						});

						$.get("riempi2.php?id_stage2="+$("#id_stage").val(), function(result) {
						    $('#professore').val(result);
						});

						$.get("riempi2.php?id_stage3="+$("#id_stage").val(), function(result) {
						    $('#tutoraziendale').val(result);
						});   
					}
				);
			});

		</script>
  	</head>
  	<body>
  		<div class="container">
  			<div class="row">
	  			<div class="col-xs-12">
	  				<form role="form" method="post" action="new_question2.php">
	  					<div class="row">
		  					<div class="panel panel-info">
		  						<div class="panel-heading ">
		  							<div class="row col-xl-12">
		  								<div class="col-xs-12 col-md-4 col-md-offset-4">INFORMAZIONI STAGE</div>
		  							</div>
								</div>
								<div class="panel panel-body">
									<div class="form-group">
										<label for="studente">Alunno/a: </label>
										<input type="text" class="form-control" value="<?php echo $_SESSION["login"]["nome"] . " " . $_SESSION["login"]["cognome"];?>" id="studente" name="studente" readonly>
									</div>
									<div class="form-group">
										<label for="classe">Della classe: </label>
										<input type="text" class="form-control" value="<?php echo $record["id_classe"];?>" id="classe" name="classe" readonly>
									</div>
									
									<div class="form-group">
										<select class="form-control" name="azienda" id="azienda">
											<option value="" selected>Ente o Azienda a cui hai partecipato</option>
											<?php 
											
												// RITORNA SOLO LE AZIENDE A CUI NON HA ANCORA VALUTATO
												$result = $conn->query("SELECT *
																		FROM 	(SELECT Partecipa.*, entiaziende.id_enteazienda as id_azienda, entiaziende.nome as azienda_nome
																				FROM 	Stage, Partecipa, EntiAziende
																				WHERE 	Stage.id_stage = Partecipa.id_stage AND
																						EntiAziende.id_enteazienda = Stage.id_enteazienda) AS R
															
																		LEFT JOIN
																				(SELECT A.ID_Autovalutazione, Matricola, A.ID_Stage 
																				FROM Vota, Autovalutazioni as A 
																				WHERE Vota.ID_Autovalutazione = A.ID_Autovalutazione
																				GROUP BY A.ID_Autovalutazione) AS T
																		ON R.matricola = T.matricola
																		WHERE ID_Autovalutazione IS NULL AND
																		R.matricola = ".$_SESSION["login"]["matricola"]);
												
												while($record = $result->fetch_assoc()){
													echo "<option value=\"".$record["id_azienda"]."\">".$record["azienda_nome"]."</option>";
												}
											?>
										</select>
									</div>
									<div class="form-group">
										<select class="form-control" name="periodo" id="id_stage" required disabled>
											<option value="" selected>Periodo</option>
										</select>
									</div>
									
									<div class="form-group">
										<label for="attivita">Attivita': </label>
										<input type="text" class="form-control" value="" id="attivita" name="attivita" readyonly>
									</div>
									
									<div class="form-group">
										<label for="professore">Tutor Interno: </label>
										<input type="text" class="form-control" value="" id="professore" name="professore" readonly>
									</div>
									
									<div class="form-group">
										<label for="tutoraziendale">Tutor Aziendale: </label>
										<input type="text" class="form-control" value="" name="tutoraziendale" id="tutoraziendale" readyonly>
									</div>
									
									<div class="form-group">
										<input type="submit" class="btn btn-success" value="Continua" name="btn-continue" id="btn-continue">
									</div>
								</div>			
			  				</div>
		  				</div>
	  				</form>
	  			</div>
  			</div>
  		</div>
  	</body>
</html>