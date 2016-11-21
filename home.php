<?php
$baseurl = "ralphumandal.ddns.net/autoval/";
	session_start();
	if(!isset($_SESSION["login"]))
		header("Location: <?=$baseurl;?>index.php");
	require $baseurl.'connection.php';
?>
<!DOCTYPE HTML>
<html>
	<head>
 	 	<?php require $baseurl.'essentials/head.php';?>
		<title>Home</title>
		<link rel="stylesheet" type="text/css" href="css/main.css" >
	</head>
    <body>
    	<div class="container">
    		<div class="row">
    			<div class="col-md-6 col-md-offset-3"><?php if(isset($GLOBALS["msg"]))echo $GLOBALS["msg"];?></div>
    			<div class="col-sm-6 col-sm-offset-3">
    				<div class="panel panel-info">
    					<div class="panel-heading">
    						<strong>Informazioni utente</strong>
    					</div>
    					<div class="panel-body">
    						<?php 
    							
    							$user = $_SESSION["login"]["user"];
    							$cognome = $_SESSION["login"]["cognome"];
    							$nome = $_SESSION["login"]["nome"];
	    						echo "<div class='col-sm-12'>";
	    						echo "Username: $user";
	    						echo "</div>";
	    						
    							if($_SESSION["login"]["rango"] == "Studente"){
    								
    								$query = "	select s.nome, s.cognome, c.id_classe, i.annoiscrizione, sp.descrizione
	    										from 	studenti as s, iscritto as i, classi as c,specializzazioni as sp
	    										where 	s.matricola = i.matricola and
														c.ID_Classe = i.ID_Classe and
														sp.ID_Specializzazione = c.ID_Specializzazione and
	    												s.nome ='$nome' and 
    													s.cognome = '$cognome'";
    								$result = $conn->query($query);
    								
    								
    								$record = $result->fetch_assoc();
    								
    								echo "<div class='col-sm-12'>";
    								echo "Cognome: $cognome";
    								echo "</div>";
    									
    								echo "<div class='col-sm-12'>";
    								echo "Nome:   $nome";
    								echo "</div>";
    								
    								echo "<div class='col-sm-12'>";
    								echo "Iscritto alla classe: " . $record["id_classe"] . " l'anno " . $record["annoiscrizione"] ."/".($record["annoiscrizione"]+1) ;
    								echo "</div>";
    								
    								echo "<div class='col-sm-12'>";
    								echo "Specializzazione: " . $record["descrizione"];
    								echo "</div>";
    							}
    							
    							echo "<div class='col-sm-12'>";
    							echo "Posizione: " . $_SESSION["login"]["rango"];
    							echo "</div>";
    						?>
    					</div>
    				</div>
				</div>
    		</div>
			<div class="row">
				<div class="col-sm-6 col-sm-offset-3">
					<div class="panel panel-login">
						<div class="panel-heading">
							<div class="row">
								<div class="col-xs-6">
									<a href="#" class="active">Azioni</a>
								</div>
								<div class="col-xs-6">
									<a href="<?=$baseurl;?>logout.php" class="warning" style="color: red">Logout</a>
								</div>								
							</div>
							<hr>
						</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-sm-12">
									<form id="login-form" action="<?=$baseurl;?>action.php" method="post" role="form" style="display: block;">
										<div class="row">
											<div class="col-sm-12" >
												<?php
												if($_SESSION["login"]["rango"]=="Studente"){
													echo "<div class=\"row\"><div class=\" col-xs-10 col-xs-offset-1 \">";
													echo "<input style=\"min-width: 100%;\" type=\"submit\" name=\"btn-view-statistic\" id=\"btn-statistic\" class=\"btn btn-info\" value=\"Statistiche\" disabled>";
													echo "</div></div>";
													
													echo "<br>";
													echo "<div class=\"row\"><div class=\" col-xs-10 col-xs-offset-1 \">";
													echo "<input style=\"min-width: 100%;\" type=\"submit\" name=\"btn-votazione\" id=\"btn-votazione\" class=\"btn btn-success\" value=\" Valuta tirocinio \">";
													echo "</div></div>";
												}else
													if($_SESSION["login"]["rango"]=="Amministratore"){
													//inserimento bottone di aggiunta studenti a tirocinio
														echo "<div class=\"row\"><div class=\" col-xs-10 col-xs-offset-1 \">";
														echo "<input style=\"min-width: 100%;\" type=\"submit\" name=\"btn-add-studente\" id=\"btn-add-studente\" class=\"btn btn-info\" value=\"Aggiungi studente a tirocinio\">";
														echo "</div></div>";
													//inserimento bottono di aggiunta tirocinio	
													
														echo "<br>";
														
														echo "<div class=\"row\"><div class=\"col-xs-10 col-xs-offset-1\">";
														echo "<input style=\"min-width: 100%;\" type=\"submit\" name=\"btn-nuovo-stage\" id=\"btn-nuovo-stage\" class=\"btn btn-success\" value=\"Nuovo tirocinio \">";
														echo "</div></div>";
													}
												?>
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
    <script>
    </script>
</html>