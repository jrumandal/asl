<?php 
	if(!isset($_POST["btn-continue"])
			||!isset($_POST["studente"])
			||!isset($_POST["classe"])
			||!isset($_POST["azienda"])
			||!isset($_POST["periodo"])
			||!isset($_POST["attivita"])
			||!isset($_POST["professore"])
			||!isset($_POST["tutoraziendale"])){
		header("Location: /home.php");
		exit;
	}
	
	session_start();
	
	$_SESSION["quest"]["id_azienda"] = $_POST["periodo"];
	
?>
<!DOCTYPE HTML>
<html>
	<head>
		<?php require '/essentials/head.php'?>
		<link rel="stylesheet" type="text/css" href="css/main.css">
  	</head>
  	<body>
  		<div class="container">
			<div class="row">
				<div class="col-md-6 col-md-offset-3">
					<div class="panel panel-login">
						<div class="panel-heading">
							<div class="row">
								<div class="col-xs-6 col-xs3">
									<a href="#" class="active">Questionario</a>
								</div>
							</div>
							<hr>
						</div>
						<div class="row">
							<div class="col-lg-12">
								<form id="" action="/process.php" method="post" role="form">
									<?php require 'load_questions.php';?>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="questionario-submit" id="questionario-submit" class="form-control btn btn-success" value="Invia verdetto!">
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
  	</body>
</html>