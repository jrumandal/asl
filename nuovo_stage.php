<!DOCTYPE html>
<html lang="it">
    <head>
		<?php require '/essentials/head.php';?>
		<!-- Website CSS style -->
		<link rel="stylesheet" type="text/css" href="css/main.css" >

		<!-- Website Font style -->
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
		
		<!-- Google Fonts -->
		<link href='https://fonts.googleapis.com/css?family=Passion+One' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>

		<script>
		$(document).ready(function(){
			$("#id_specializzazione").change(		
				function(){
					$("#classe").load("riempi.php?id_specializzazione="+$(this).val(),
						function(){
							$("#classe").prop("disabled", false);
							$("#professore").load("riempi.php?classe="+$("#classe").val(),
								function(){
									$("#professore").prop("disabled", false);
								}
							);
						}
					);
				}
			);

			$("#classe").change(
				function(){
					$("#professore").load("riempi.php?classe="+$("#classe").val(),
						function(){
							$("#professore").prop("disabled", false);
						}
					);
				}
			);
		});
		</script>
		<title>Index</title>
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-md-offset-3">
					<div class="panel panel-login">
						<div class="panel-heading">
							<div class="row">
								<div class="col-xs-6">
									<a href="#" class="active">Nuovo stage</a>
								</div>
								<div class="col-xs-6">
									<a href="home.php" >Annulla</a>
								</div>
							</div>
							<hr>
						</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-lg-12">
									<form id="" action="admin_process.php" method="post" role="form" style="display: block;">
										<div class="form-group">
											<select class="form-control" name="id_specializzazione" id="id_specializzazione">
												<option value="" selected>Specializzazione</option>
												<?php 
													require 'connection.php';
													$result = $conn->query("SELECT * FROM Specializzazioni");
													while($record = $result->fetch_assoc()){
														echo "<option value=\"".$record["ID_Specializzazione"]."\">".$record["Descrizione"]."</option>";
													}
												?>
											</select>
										</div>
										
										<div class="form-group">
											<select class="form-control" name="classe" id="classe" disabled>
												<option value="" selected>Classe</option>
											</select>
										</div>
										
										<div class="form-group">
											<select class="form-control" name="professore" id="professore" disabled>
												<option value="" selected>Professore tutor</option>
											</select>
										</div>
										
										<div class="form-group">
											<input type="text" class="form-control" value="" id="attivita" name="attivita" placedholder="Settore/Attivita' dell'azienda" required>
										</div>
										
										<div class="form-group">
											<select class="form-control" name="azienda" id="azienda">
												<option value="" selected>Ente/Azienda</option>
												<?php 
													require 'connection.php';
													$result = $conn->query("SELECT * FROM EntiAziende");
													while($record = $result->fetch_assoc()){
														echo "<option value=\"".$record["ID_EnteAzienda"]."\">".$record["Nome"]."</option>";
													}
												?>
											</select>
										</div>
										
										<div class="form-group">
											<input type="text" class="form-control" value="" id="tutoraziendale" name="tutoraziendale" placedholder="Tutor aziendale" required>
										</div>
						
										<div class="form-group">
											<div class="row">
												<div class="col-sm-6 col-sm-offset-3">
													<input type="submit" name="create-stage-submit" class="form-control btn btn-login" value="Apri nuovo stage">
												</div>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>