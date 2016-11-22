<?php
        $baseurl = "https://ralphumandal.ddns.net/autoval/";
		session_start();
		if(isset($_SESSION["login"])){
			header('location: '.$baseurl.'home.php');
			exit;
		}
		
		require_once(__DIR__.'/connection.php');

		//controllo sul bottone, nel caso venga premuto la registrazione...
		if(isset($_POST["register-submit"])){
			//estrazione dei dati ricevuti per la registrazione
			$nome = $_POST["name"];
			$cognome = $_POST["surname"];
			$id_specializzazione = $_POST["specializzazione"];
			$id_classe = $_POST["classe"];
			$username = $_POST["username"];
			$password = $_POST["password"];
			$codice_verifica = $_POST["codice_verifica"];
			
			//verifica validita del codice di registrazione
			$result = $conn->query("SELECT * FROM codiciverifica WHERE codice=$codice_verifica");
			
			//verifica se la persona non è registrata
			$result2 = $conn->query("SELECT * FROM studenti WHERE nome=$nome AND cognome=$cognome");
			
			//verifica se l'account non è ancora registrato
			$result3 = $conn->query("SELECT * FROM accounting WHERE user=$username");
			
			

			if($result==true&&$result2==false&&$result3==false){
				$record = $result->fetch_assoc();

				//inizio registrazione se codice non è usato
				if(!$record["usato"]){
					//ACCOUNT
					$stmt = $conn->prepare("INSERT INTO accounting(user, password, id_rango) VALUES(?,?,1);");
					$password = md5($password);
					$stmt->bind_param("ss",$username,$password);
					$stmt->execute();
					
					//STUDENTE
					$stmt = $conn->prepare("INSERT INTO studenti(nome,cognome,user) VALUES(?,?,?)");
					$stmt->bind_param("sss",$nome,$cognome,$username);
					$stmt->execute();

					$result = $conn->query("SELECT matricola FROM studenti WHERE nome='$nome' AND cognome='$cognome'");
					$record = $result->fetch_assoc();

					//ISCRIZIONE ALLA CLASSE
					$stmt = $conn->prepare("INSERT INTO iscritto(matricola,id_classe,annoiscrizione) VALUES(?,?,?)");
					$anno = date("Y");
					$stmt->bind_param("sss",$record["matricola"],$id_classe, $anno);
					$stmt->execute();

					//AGGIORNAMENTO TABELLA DEI CODICI
					$stmt = $conn->prepare("UPDATE codiciverifica SET usato = true WHERE codice=?");
					$stmt->bind_param("s",$codice_verifica);
					$stmt->execute();
					$GLOBALS["msg"] = "<div style='color: green;'>Registrazione effettuata con successo</div>";

				}else{
					$GLOBALS["msg"] = "<div class='alert alert-danger'>Codice gia utilizzato!</div>";
				}
			}else{
				$GLOBALS["msg"] = "<div class='alert alert-danger'>Codice non esistente o l'utente è gia registrato!</div>";
			}
		}
		//se premo login
		else if(isset($_POST["login-submit"])){
			$username = $_POST["username"];
			$password = $_POST["password"];
			$query ="	SELECT *
						FROM accounting, ranghi
						WHERE 	accounting.ID_Rango = ranghi.ID_Rango AND
						user = '$username' AND
						password = md5('$password')";

			//se riscontro dati dalla query
			if($result = $conn->query($query)){
				//se account e password sono corretti
				$n_row = $result->num_rows;
				if($n_row ==1){
					$record = $result->fetch_assoc();

					//CREAZIONE DELLA SESSIONE
					$_SESSION["login"]["user"]=$username;
					//estraggo rango
					$_SESSION["login"]["rango"]=$record["Nome"];
					$_SESSION["login"]["time"]= Date("Y-m-d");


					$result = $conn->query("SELECT * FROM studenti WHERE user = '$username'");
					$record = $result->fetch_assoc();

					$_SESSION["login"]["nome"] = $record["Nome"];
					$_SESSION["login"]["cognome"] = $record["Cognome"];
					$_SESSION["login"]["matricola"] = $record["Matricola"];

					$stmt = $conn->prepare("INSERT INTO accessi(user,logindate) VALUES(?,?)");
					$stmt->bind_param("ss", $_SESSION["login"]["user"], $_SESSION["login"]["time"]);

					$success_login = $stmt->execute();


					header("Location: ".$baseurl."/home.php");
					exit;

				}
			}
			else{
				$GLOBALS["msg"]="<div class='alert alert-danger'>Account o password non validà!</div>";
				
			}
		}
?>
<!DOCTYPE html>
<html lang="it">

    <head>
		<?php require_once __DIR__.'/essentials/head.php';?>

		<!-- Website CSS style -->
		<link rel="stylesheet" type="text/css" href="css/main.css" >

		<!-- Website Font style -->
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">

		<!-- Google Fonts -->
		<link href='https://fonts.googleapis.com/css?family=Passion+One' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>

		<script>
			$(document).ready(function(){
				//AJAX riempimento classe alla selezione della specializzazione
				$("#specializzazione").change(function(){
					$("#classe").load("riempi.php?id_specializzazione="+$("#specializzazione").val());
				});

				$("#codice_verifica").tooltip();
			});
			
			//script per form tabellare
			$(function() {
				$('#login-form-link').click(function(e) {
					$("#login-form").delay(100).fadeIn(100);
					$("#register-form").fadeOut(100);
					$('#register-form-link').removeClass('active');
					$(this).addClass('active');
					e.preventDefault();
				});
				$('#register-form-link').click(function(e) {
					$("#register-form").delay(100).fadeIn(100);
					$("#login-form").fadeOut(100);
					$('#login-form-link').removeClass('active');
					$(this).addClass('active');
					e.preventDefault();
				});
			});
		</script>
		<title>Index</title>
	</head>
	<body>
		<div class="container">
				<div class="col-md-6 col-md-offset-3"><?php if(isset($GLOBALS["msg"]))echo $GLOBALS["msg"];?></div>
				<div class="row">
					<div class="col-md-6 col-md-offset-3">
						<div class="panel panel-login">
							<div class="panel-heading">
								<div class="row">
									<div class="col-xs-6">
										<a href="#" class="active" id="login-form-link">Login</a>
									</div>
									<div class="col-xs-6">
										<a href="#" id="register-form-link">Registrazione</a>
									</div>
								</div>
								<hr>
							</div>
							<div class="panel-body">
								<div class="row">
									<div class="col-lg-12">
										<form id="login-form" method="post" role="form" style="display: block;">
											<div class="form-group">
												<input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Username" value="" required>
											</div>
										<div class="form-group">
											<input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password" required>
										</div>
										<!--div class="form-group text-center">
											<input type="checkbox" tabindex="3" class="" name="remember" id="remember">
											<label for="remember"> Ricordami</label>
										</div-->
										<div class="form-group">
											<div class="row">
												<div class="col-sm-6 col-sm-offset-3">
													<input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Log In">
												</div>
											</div>
										</div>
										
									</form>
									<form id="register-form"  method="post" role="form" style="display: none;">
										<div class="form-group">
											<input type="text" name="name" id="name" tabindex="1" class="form-control" placeholder="Nome" value="" required>
										</div>
										<div class="form-group">
											<input type="text" name="surname" id="surname" tabindex="2" class="form-control" placeholder="Cognome" value="" required>
										</div>
										<div class="form-group">
												<select class="form-control" name="specializzazione" id="specializzazione" tabindex="3">
													<option value="" selected>Specializzazione</option>
													<?php
                                                        require_once(__DIR__.'/connection.php');

														$result = $conn->query("SELECT * FROM specializzazioni");
                                                        foreach($result as $record)
														//while($record = $result->fetch_assoc())
                                                            echo '<option value="' . $record["ID_Specializzazione"].'">'.$record["Descrizione"].'</option>';
													?>
												</select>
										</div>
										<div class="form-group">
												<select class="form-control" name="classe" id="classe" tabindex="3" required>
												</select>
										</div>
										<div class="form-group">
											<input type="text" name="username" id="username" tabindex="4" class="form-control" placeholder="Username" value="" required>
										</div>
										<div class="form-group" >
											<input type="password" name="password" id="password" tabindex="5" class="form-control" placeholder="Password" required>
										</div>
										<div class="form-group">
											<input type="password" name="confirm-password" id="confirm-password" tabindex="6" class="form-control" placeholder="Conferma Password" required>
										</div>
										<div class="form-group" >
											<input type="password" name="codice_verifica" id="codice_verifica" title="Se non e' in tuo possesso, richiedila in segreteria" tabindex="7" class="form-control" placeholder="Codice univoco di autenticazione" required>
										</div>
										<div class="form-group">
											<div class="row">
												<div class="col-sm-6 col-sm-offset-3">
													<input type="submit" name="register-submit" id="register-submit" tabindex="8" class="form-control btn btn-register" value="Registrati ora">
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