<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html">
		<meta charset="utf-8">
 	 	<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="bootstrap-3.3.6-dist/css/bootstrap.css" type="text/css">
		<style>
			body{background-color: lightblue;}
			textarea.noresize{resize:none;}
		</style>
		<title>Compilazione questionario</title>
	</head>
    <body>
    	<div class="container">
    		<div class="row">
    			<div class="col-sm-2"></div>
    			<div class="col-sm-8">
    				<h2>REPORT DELLO STUDENTE</h2>
    			</div>
    			<div class="col-sm-2"></div>
    		</div>
    		<div class="row">
    			<form action="process_question.php" method="post" role="form">
    				<?php
    					//per salvare l'id dell'autovalutazione, da completare
    					//echo "<input type=hidden value=".$POST["id_quest"]."name=\"id_quest\">";
    				?>
    				<?php include 'load_questions.php'?>
    				<div class="row">
    					<div class="col-sm-1"></div>
    					<div class="col-sm-10">
    						<input type="submit" class="btn btn-success btn-block" value="Invia autovalutazione">
    					</div>
    					<div class="col-sm-1"></div>
    				</div>
    			</form>
    			
    		</div>
    		
    	</div>
    </body>
    <script>
    </script>
</html>