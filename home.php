<?php
    include_once(__DIR__."/includes/own/php/all_php.php");
    include_once(__DIR__."/includes/doc_header.php");

	session_start();
	if(!isset($_SESSION["login"]))
		header("Location:".$baseurl."index.php");
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Home</title>
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
                            ?>
    					    <div class='col-sm-12'>
	    					    Username: <?=$user?>
	    					</div>
    						<?php 
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
    							?>
    								<div class='col-sm-12'>
    								    Cognome: <?=$cognome?>
    							    </div>
    									
    								<div class='col-sm-12'>
    								    Nome: <?=$nome?>
    								</div>
    								
    								<div class='col-sm-12'>
    								    Iscritto alla classe: <?=$record["id_classe"]?> l'anno <?=$record["annoiscrizione"]?> <?=$record["annoiscrizione"]+1?>
    								</div>
    								
    								<div class='col-sm-12'>
    								    Specializzazione: <?=$record["descrizione"]?>
    								</div>

                                <?php
                                }
    						?>
                            <div class='col-sm-12'>
							    Posizione: <?=$_SESSION["login"]["rango"]?>
			                </div>
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
												if($_SESSION["login"]["rango"]=="Studente"){?>
													<div class="row">
													    <div class=" col-xs-10 col-xs-offset-1 ">
    													    <input style="min-width: 100%;" type="submit" name="btn-view-statistic" id="btn-statistic" class="btn btn-info" value="Statistiche" disabled>
    													</div>
                                                    </div>

													<br>

                                                    <div class="row">
                                                        <div class=" col-xs-10 col-xs-offset-1 ">
                                                            <input style="min-width: 100%;" type="submit" name="btn-votazione" id="btn-votazione" class="btn btn-success" value=" Valuta tirocinio ">
									                    </div>
                                                    </div>
                                                <?php

                                                }else
													if($_SESSION["login"]["rango"]=="Amministratore"){
													?>

														<div class="row">
														    <div class=" col-xs-10 col-xs-offset-1">
														        <input style="min-width: 100%;" type="submit" name="btn-add-studente" id="btn-add-studente" class="btn btn-info" value="Aggiungi studente a tirocinio">
														    </div>
                                                        </div>

                                                        <br>

                                                        <div class="row">
                                                            <div class="col-xs-10 col-xs-offset-1">
														        <input style="min-width: 100%;" type="submit" name="btn-nuovo-stage" id="btn-nuovo-stage" class="btn btn-success" value="Nuovo tirocinio">
													    	</div>
                                                        </div>
                                                <?php
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