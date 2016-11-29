<?php
    include_once(__DIR__."/includes/own/php/all_php.php");
    include_once(__DIR__."/includes/doc_header.php");
?>

<!DOCTYPE html>
<html lang="it">
    <head>
		<script>
		$(document).ready(function(){
			$("#id_specializzazione").change(		
				function(){
					$("#classe").load("riempi.php?id_specializzazione="+$(this).val(),
						function(){
							$("#classe").prop("disabled", false);
							$("#studente").load("riempi.php?classe3="+$("#classe").val(),
								function(){
									$("#studente").prop("disabled", false);
								}
							);
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
					$("#studente").load("riempi.php?classe3="+$("#classe").val(),
						function(){
							$("#studente").prop("disabled", false);
							$("#professore").load("riempi.php?classe="+$("#classe").val(),
								function(){
									$("#professore").prop("disabled", false);
									$("#stage").load("riempi.php?professore="+$("#professore").val(),
										function(){
											$("#stage").prop("disabled", false);
										});
								}
							);
						}
					);
				}
			);

			$("#professore").change(
				function(){
					$("#stage").load("riempi.php?professore="+$("#professore").val(),
						function(){
							$("#stage").prop("disabled", false);
					});
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
                                                    $result = $conn->query("SELECT * FROM specializzazioni");
													foreach($result as $record){    ?>
														<option value="<?=$record["ID_Specializzazione"]?>"><?=$record["Descrizione"]?></option>
												<?php
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
											<select class="form-control" name="studente" id="studente" disabled>
												<option value="" selected>Studente</option>
											</select>
										</div>

										<div class="form-group">
											<select class="form-control" name="professore" id="professore" disabled>
												<option value="" selected>Professore tutor</option>
											</select>
										</div>

										<div class="form-group">
											<select class="form-control" name="stage" id="stage" disabled>
												<option value="" selected>Stage</option>
											</select>
										</div>

										<div class="form-group">
											<label for="datainiziale">Data iniziale:</label>
											<input type="date" class="form-control" value="" min="<?= date("Y-m-d");?>" id="datainizio" name="datainizio" placedholder="Data iniziale" required>
										</div>

										<div class="form-group">
											<label for="datainiziale">Data finale:</label>
											<input type="date" class="form-control" value=""  id="datafine" name="datafine" placedholder="Data finale" required>
										</div>

										<div class="form-group">
											<div class="row">
												<div class="col-sm-6 col-sm-offset-3">
													<input type="submit" name="add-studente-submit" class="form-control btn btn-login" value="Inserisci studente in stage">
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